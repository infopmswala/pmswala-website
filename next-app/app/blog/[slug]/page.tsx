import { notFound } from "next/navigation";
import { getPageBySlug } from "@/lib/public-data";

export default async function BlogDetailPage({ params }: { params: { slug: string } }) {
  const page = await getPageBySlug(params.slug);
  if (!page || page.source !== "blog") {
    notFound();
  }

  return (
    <main className="container">
      <h1>{page.title}</h1>
      <p>{page.summary}</p>
      <article dangerouslySetInnerHTML={{ __html: page.contentHtml || "" }} />
    </main>
  );
}
