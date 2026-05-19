import { NextResponse } from "next/server";
import { z } from "zod";
import { requireAdmin } from "@/lib/admin-guard";
import { connectMongo } from "@/lib/mongodb";
import { PortfolioModel } from "@/models/Portfolio";

const QuerySchema = z.object({
  limit: z.coerce.number().int().min(1).max(200).default(50),
  q: z.string().optional()
});

const CreateSchema = z.object({
  title: z.string().min(2),
  slug: z.string().min(2),
  summary: z.string().optional(),
  description: z.string().optional(),
  minInvestment: z.coerce.number().nonnegative().default(0),
  expectedReturn: z.coerce.number().nonnegative().default(0),
  status: z.enum(["active", "inactive"]).default("active")
});

export async function GET(request: Request) {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  const url = new URL(request.url);
  const parsed = QuerySchema.safeParse({
    limit: url.searchParams.get("limit") ?? undefined,
    q: url.searchParams.get("q") ?? undefined
  });

  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid query" }, { status: 400 });
  }

  await connectMongo();
  const filter: Record<string, unknown> = {};
  if (parsed.data.q) {
    filter.$or = [
      { title: { $regex: parsed.data.q, $options: "i" } },
      { slug: { $regex: parsed.data.q, $options: "i" } }
    ];
  }

  const items = await PortfolioModel.find(filter)
    .sort({ updatedAt: -1, createdAt: -1 })
    .limit(parsed.data.limit)
    .lean();

  return NextResponse.json({ items });
}

export async function POST(request: Request) {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  const body = await request.json().catch(() => null);
  const parsed = CreateSchema.safeParse(body);
  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid payload" }, { status: 400 });
  }

  await connectMongo();
  const exists = await PortfolioModel.findOne({ slug: parsed.data.slug });
  if (exists) {
    return NextResponse.json({ error: "Slug already exists" }, { status: 409 });
  }

  const created = await PortfolioModel.create(parsed.data);
  return NextResponse.json({ success: true, item: created }, { status: 201 });
}
