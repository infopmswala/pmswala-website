import { NextResponse } from "next/server";
import { z } from "zod";
import { requireAdmin } from "@/lib/admin-guard";
import { connectMongo } from "@/lib/mongodb";
import { UserModel } from "@/models/User";

const QuerySchema = z.object({
  page: z.coerce.number().int().min(1).default(1),
  limit: z.coerce.number().int().min(1).max(100).default(20),
  q: z.string().optional()
});

export async function GET(request: Request) {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  const url = new URL(request.url);
  const parsed = QuerySchema.safeParse({
    page: url.searchParams.get("page") ?? undefined,
    limit: url.searchParams.get("limit") ?? undefined,
    q: url.searchParams.get("q") ?? undefined
  });

  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid query" }, { status: 400 });
  }

  await connectMongo();

  const skip = (parsed.data.page - 1) * parsed.data.limit;
  const filter: Record<string, unknown> = {};
  if (parsed.data.q) {
    filter.$or = [
      { name: { $regex: parsed.data.q, $options: "i" } },
      { email: { $regex: parsed.data.q, $options: "i" } },
      { phone: { $regex: parsed.data.q, $options: "i" } }
    ];
  }

  const [items, total] = await Promise.all([
    UserModel.find(filter)
      .sort({ createdAt: -1 })
      .skip(skip)
      .limit(parsed.data.limit)
      .select("name email phone role status kycStatus passwordResetRequired createdAt")
      .lean(),
    UserModel.countDocuments(filter)
  ]);

  return NextResponse.json({
    items,
    pagination: {
      page: parsed.data.page,
      limit: parsed.data.limit,
      total,
      pages: Math.ceil(total / parsed.data.limit)
    }
  });
}
