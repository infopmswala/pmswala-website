import { NextResponse } from "next/server";
import { z } from "zod";
import { requireAdmin } from "@/lib/admin-guard";
import { connectMongo } from "@/lib/mongodb";
import { PageModel } from "@/models/Page";

const QuerySchema = z.object({
  source: z.enum(["service", "blog", "information"]).optional(),
  limit: z.coerce.number().int().min(1).max(200).default(50)
});

const CreateSchema = z.object({
  source: z.enum(["service", "blog", "information"]),
  title: z.string().min(2),
  slug: z.string().min(2),
  summary: z.string().optional(),
  contentHtml: z.string().optional(),
  image: z.string().optional(),
  status: z.enum(["active", "inactive"]).default("active")
});

export async function GET(request: Request) {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  const url = new URL(request.url);
  const parsed = QuerySchema.safeParse({
    source: url.searchParams.get("source") ?? undefined,
    limit: url.searchParams.get("limit") ?? undefined
  });

  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid query" }, { status: 400 });
  }

  await connectMongo();
  const filter: Record<string, unknown> = {};
  if (parsed.data.source) filter.source = parsed.data.source;

  const items = await PageModel.find(filter)
    .sort({ updatedAt: -1 })
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
  const exists = await PageModel.findOne({ slug: parsed.data.slug });
  if (exists) {
    return NextResponse.json({ error: "Slug already exists" }, { status: 409 });
  }

  const created = await PageModel.create(parsed.data);
  return NextResponse.json({ success: true, item: created }, { status: 201 });
}
