import { NextResponse } from "next/server";
import { z } from "zod";
import { requireAdmin } from "@/lib/admin-guard";
import { connectMongo } from "@/lib/mongodb";
import { PortfolioModel } from "@/models/Portfolio";

const UpdateSchema = z.object({
  title: z.string().min(2).optional(),
  slug: z.string().min(2).optional(),
  summary: z.string().optional(),
  description: z.string().optional(),
  minInvestment: z.coerce.number().nonnegative().optional(),
  expectedReturn: z.coerce.number().nonnegative().optional(),
  status: z.enum(["active", "inactive"]).optional()
});

export async function PATCH(request: Request, { params }: { params: { id: string } }) {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  const body = await request.json().catch(() => null);
  const parsed = UpdateSchema.safeParse(body);
  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid payload" }, { status: 400 });
  }

  await connectMongo();

  if (parsed.data.slug) {
    const duplicate = await PortfolioModel.findOne({ slug: parsed.data.slug, _id: { $ne: params.id } });
    if (duplicate) {
      return NextResponse.json({ error: "Slug already exists" }, { status: 409 });
    }
  }

  const updated = await PortfolioModel.findByIdAndUpdate(
    params.id,
    { $set: parsed.data },
    { new: true }
  ).lean();

  if (!updated) {
    return NextResponse.json({ error: "Portfolio not found" }, { status: 404 });
  }

  return NextResponse.json({ success: true, item: updated });
}

export async function DELETE(_request: Request, { params }: { params: { id: string } }) {
  const guard = await requireAdmin();
  if (!guard.ok) return guard.response;

  await connectMongo();
  const deleted = await PortfolioModel.findByIdAndDelete(params.id).lean();
  if (!deleted) {
    return NextResponse.json({ error: "Portfolio not found" }, { status: 404 });
  }

  return NextResponse.json({ success: true });
}
