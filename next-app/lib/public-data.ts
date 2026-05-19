import { connectMongo } from "@/lib/mongodb";
import { PageModel } from "@/models/Page";

export type PublicPage = {
  source: "blog" | "service" | "information";
  title: string;
  slug: string;
  summary?: string;
  contentHtml?: string;
  image?: string;
  createdAt?: Date;
};

export async function getPublicPagesBySource(source: "blog" | "service" | "information", limit = 20): Promise<PublicPage[]> {
  await connectMongo();
  return (await PageModel.find({ source, status: "active" })
    .sort({ updatedAt: -1, createdAt: -1 })
    .limit(limit)
    .select("source title slug summary image createdAt")
    .lean()) as unknown as PublicPage[];
}

export async function getPageBySlug(slug: string): Promise<PublicPage | null> {
  await connectMongo();
  return (await PageModel.findOne({ slug, status: "active" })
    .select("source title slug summary contentHtml image createdAt")
    .lean()) as unknown as PublicPage | null;
}
