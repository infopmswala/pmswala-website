import { NextResponse } from "next/server";
import { z } from "zod";
import { connectMongo } from "@/lib/mongodb";
import { PaymentTransactionModel } from "@/models/PaymentTransaction";

const QuerySchema = z.object({
  legacyUserId: z.coerce.number().int().positive(),
  limit: z.coerce.number().int().min(1).max(100).default(20)
});

export async function GET(request: Request) {
  const url = new URL(request.url);
  const parsed = QuerySchema.safeParse({
    legacyUserId: url.searchParams.get("legacyUserId"),
    limit: url.searchParams.get("limit") ?? undefined
  });

  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid query" }, { status: 400 });
  }

  await connectMongo();
  const items = await PaymentTransactionModel.find({ legacyUserId: parsed.data.legacyUserId })
    .sort({ createdAt: -1 })
    .limit(parsed.data.limit)
    .lean();

  return NextResponse.json({ items });
}
