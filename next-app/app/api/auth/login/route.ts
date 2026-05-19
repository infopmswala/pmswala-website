import { NextResponse } from "next/server";
import { z } from "zod";
import { connectMongo } from "@/lib/mongodb";
import {
  authCookies,
  isLegacyPasswordHash,
  signAccessToken,
  signResetToken,
  verifyPasswordAgainstStoredHash
} from "@/lib/auth";
import { UserModel } from "@/models/User";

const LoginSchema = z.object({
  identity: z.string().min(3),
  password: z.string().min(3)
});

export async function POST(request: Request) {
  const body = await request.json().catch(() => null);
  const parsed = LoginSchema.safeParse(body);

  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid login payload" }, { status: 400 });
  }

  await connectMongo();

  const identity = parsed.data.identity.trim().toLowerCase();
  const user = await UserModel.findOne({
    $or: [{ email: identity }, { phone: parsed.data.identity.trim() }]
  });

  if (!user || user.status !== "active") {
    return NextResponse.json({ error: "Invalid credentials" }, { status: 401 });
  }

  const valid = await verifyPasswordAgainstStoredHash(parsed.data.password, user.passwordHash);
  if (!valid) {
    return NextResponse.json({ error: "Invalid credentials" }, { status: 401 });
  }

  const resetRequired = Boolean(user.passwordResetRequired) || isLegacyPasswordHash(user.passwordHash);
  if (resetRequired) {
    const resetToken = await signResetToken(String(user._id));
    return NextResponse.json({
      requiresPasswordReset: true,
      resetToken,
      user: {
        id: String(user._id),
        name: user.name,
        role: user.role
      }
    });
  }

  const token = await signAccessToken({
    sub: String(user._id),
    role: user.role,
    name: user.name,
    email: user.email,
    phone: user.phone
  });

  const response = NextResponse.json({
    success: true,
    user: {
      id: String(user._id),
      name: user.name,
      role: user.role
    }
  });

  response.cookies.set(authCookies.accessToken, token, {
    httpOnly: true,
    sameSite: "lax",
    secure: process.env.NODE_ENV === "production",
    path: "/",
    maxAge: 60 * 60 * 24 * 2
  });

  return response;
}
