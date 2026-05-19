import { connectMongo } from "@/lib/mongodb";
import { PageModel } from "@/models/Page";

export async function getPublicPagesBySource(source: "blog" | "service" | "information", limit = 20) {
  await connectMongo();
  return PageModel.find({ source, status: "active" })
    .sort({ updatedAt: -1, createdAt: -1 })
    .limit(limit)
    .select("source title slug summary image createdAt")
    .lean();
}

export async function getPageBySlug(slug: string) {
  await connectMongo();
  return PageModel.findOne({ slug, status: "active" })
    .select("source title slug summary contentHtml image createdAt")
    .lean();
}
