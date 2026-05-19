import { NextResponse } from "next/server";
import { z } from "zod";
import { connectMongo } from "@/lib/mongodb";
import { ContactLeadModel } from "@/models/ContactLead";

const ContactSchema = z.object({
  name: z.string().min(2),
  email: z.string().email(),
  phone: z.string().min(8),
  message: z.string().min(3)
});

export async function POST(request: Request) {
  const body = await request.json().catch(() => null);
  const parsed = ContactSchema.safeParse(body);

  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid contact payload" }, { status: 400 });
  }

  await connectMongo();
  await ContactLeadModel.create(parsed.data);

  return NextResponse.json({ success: true });
}
