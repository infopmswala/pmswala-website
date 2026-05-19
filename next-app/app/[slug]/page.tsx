import { notFound } from "next/navigation";
import { getPageBySlug } from "@/lib/public-data";

export default async function SlugPage({ params }: { params: { slug: string } }) {
  const reserved = new Set(["about-us", "blog", "contact-us", "api"]);
  if (reserved.has(params.slug)) {
    notFound();
  }

  const page = await getPageBySlug(params.slug);
  if (!page) {
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
