import { NextResponse } from "next/server";
import { z } from "zod";
import { connectMongo } from "@/lib/mongodb";
import { hashPassword } from "@/lib/auth";
import { UserModel } from "@/models/User";

const BootstrapSchema = z.object({
  name: z.string().min(2),
  email: z.string().email(),
  phone: z.string().min(8),
  password: z.string().min(8)
});

export async function POST(request: Request) {
  const secret = request.headers.get("x-bootstrap-secret");
  if (!secret || secret !== process.env.ADMIN_BOOTSTRAP_SECRET) {
    return NextResponse.json({ error: "Unauthorized bootstrap request" }, { status: 401 });
  }

  const body = await request.json().catch(() => null);
  const parsed = BootstrapSchema.safeParse(body);
  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid payload" }, { status: 400 });
  }

  await connectMongo();

  const existing = await UserModel.findOne({
    $or: [{ email: parsed.data.email.toLowerCase() }, { phone: parsed.data.phone }]
  });

  if (existing) {
    return NextResponse.json({ error: "User already exists" }, { status: 409 });
  }

  const user = await UserModel.create({
    name: parsed.data.name,
    email: parsed.data.email.toLowerCase(),
    phone: parsed.data.phone,
    passwordHash: await hashPassword(parsed.data.password),
    role: "admin",
    passwordResetRequired: false,
    status: "active"
  });

  return NextResponse.json({
    success: true,
    user: {
      id: String(user._id),
      name: user.name,
      role: user.role
    }
  });
}
