import { NextResponse } from "next/server";
import { z } from "zod";
import { requireAdmin } from "@/lib/admin-guard";
import { connectMongo } from "@/lib/mongodb";
import { WithdrawalRequestModel } from "@/models/WithdrawalRequest";

const QuerySchema = z.object({
  status: z.enum(["pending", "approved", "rejected"]).optional(),
  limit: z.coerce.number().int().min(1).max(200).default(50)
});

const UpdateSchema = z.object({
  id: z.string().min(8),
  status: z.enum(["pending", "approved", "rejected"]),
  message: z.string().optional()
});

export async function GET(request: Request) {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  const url = new URL(request.url);
  const parsed = QuerySchema.safeParse({
    status: url.searchParams.get("status") ?? undefined,
    limit: url.searchParams.get("limit") ?? undefined
  });

  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid query" }, { status: 400 });
  }

  await connectMongo();
  const filter: Record<string, unknown> = {};
  if (parsed.data.status) filter.status = parsed.data.status;

  const items = await WithdrawalRequestModel.find(filter)
    .sort({ createdAt: -1 })
    .limit(parsed.data.limit)
    .lean();

  return NextResponse.json({ items });
}

export async function PATCH(request: Request) {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  const body = await request.json().catch(() => null);
  const parsed = UpdateSchema.safeParse(body);
  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid payload" }, { status: 400 });
  }

  await connectMongo();

  const updated = await WithdrawalRequestModel.findByIdAndUpdate(
    parsed.data.id,
    {
      $set: {
        status: parsed.data.status,
        message: parsed.data.message || ""
      }
    },
    { new: true }
  ).lean();

  if (!updated) {
    return NextResponse.json({ error: "Withdrawal request not found" }, { status: 404 });
  }

  return NextResponse.json({ success: true, item: updated });
}
