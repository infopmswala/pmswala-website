import { NextResponse } from "next/server";
import { z } from "zod";
import { connectMongo } from "@/lib/mongodb";
import { PageModel } from "@/models/Page";

const ParamsSchema = z.object({
  slug: z.string().min(1)
});

export async function GET(_request: Request, context: { params: { slug: string } }) {
  const parsed = ParamsSchema.safeParse(context.params);
  if (!parsed.success) {
    return NextResponse.json({ error: "Invalid slug" }, { status: 400 });
  }

  await connectMongo();
  const page = await PageModel.findOne({ slug: parsed.data.slug, status: "active" })
    .select("source title slug summary contentHtml image")
    .lean();

  if (!page) {
    return NextResponse.json({ error: "Page not found" }, { status: 404 });
  }

  return NextResponse.json({
    resolved: true,
    item: page
  });
}
