import { NextResponse } from "next/server";
import { z } from "zod";
import { requireAdmin } from "@/lib/admin-guard";
import { connectMongo } from "@/lib/mongodb";
import { PaymentTransactionModel } from "@/models/PaymentTransaction";

const QuerySchema = z.object({
  legacyUserId: z.coerce.number().int().positive().optional(),
  status: z.enum(["pending", "completed", "failed"]).optional(),
  limit: z.coerce.number().int().min(1).max(200).default(50)
});

const PatchSchema = z.object({
  id: z.string().min(8),
  paymentStatus: z.enum(["pending", "completed", "failed"])
});

export async function GET(request: Request) {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  const url = new URL(request.url);
  const parsed = QuerySchema.safeParse({
    legacyUserId: url.searchParams.get("legacyUserId") ?? undefined,
    status: url.searchParams.get("status") ?? undefined,
    limit: url.searchParams.get("limit") ?? undefined
  });

  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid query" }, { status: 400 });
  }

  await connectMongo();

  const filter: Record<string, unknown> = {};
  if (parsed.data.legacyUserId) filter.legacyUserId = parsed.data.legacyUserId;
  if (parsed.data.status) filter.paymentStatus = parsed.data.status;

  const items = await PaymentTransactionModel.find(filter)
    .sort({ createdAt: -1 })
    .limit(parsed.data.limit)
    .lean();

  return NextResponse.json({ items });
}

export async function PATCH(request: Request) {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  const body = await request.json().catch(() => null);
  const parsed = PatchSchema.safeParse(body);
  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid payload" }, { status: 400 });
  }

  await connectMongo();
  const updated = await PaymentTransactionModel.findByIdAndUpdate(
    parsed.data.id,
    { $set: { paymentStatus: parsed.data.paymentStatus } },
    { new: true }
  ).lean();

  if (!updated) {
    return NextResponse.json({ error: "Transaction not found" }, { status: 404 });
  }

  return NextResponse.json({ success: true, item: updated });
}
