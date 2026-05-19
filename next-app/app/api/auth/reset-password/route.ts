import { NextResponse } from "next/server";
import { z } from "zod";
import { hashPassword, signAccessToken, verifyResetToken, authCookies } from "@/lib/auth";
import { connectMongo } from "@/lib/mongodb";
import { UserModel } from "@/models/User";

const ResetSchema = z.object({
  resetToken: z.string().min(10),
  newPassword: z.string().min(8)
});

export async function POST(request: Request) {
  const body = await request.json().catch(() => null);
  const parsed = ResetSchema.safeParse(body);

  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid reset payload" }, { status: 400 });
  }

  let userId: string;
  try {
    userId = await verifyResetToken(parsed.data.resetToken);
  } catch {
    return NextResponse.json({ error: "Invalid or expired reset token" }, { status: 401 });
  }

  await connectMongo();
  const user = await UserModel.findById(userId);
  if (!user) {
    return NextResponse.json({ error: "User not found" }, { status: 404 });
  }

  user.passwordHash = await hashPassword(parsed.data.newPassword);
  user.passwordResetRequired = false;
  await user.save();

  const token = await signAccessToken({
    sub: String(user._id),
    role: user.role,
    name: user.name,
    email: user.email,
    phone: user.phone
  });

  const response = NextResponse.json({ success: true });
  response.cookies.set(authCookies.accessToken, token, {
    httpOnly: true,
    sameSite: "lax",
    secure: process.env.NODE_ENV === "production",
    path: "/",
    maxAge: 60 * 60 * 24 * 2
  });

  return response;
}
