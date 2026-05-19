import Link from "next/link";
import { getPublicPagesBySource } from "@/lib/public-data";

export default async function BlogListPage() {
  const blogs = await getPublicPagesBySource("blog", 50);

  return (
    <main className="container">
      <h1>Blog</h1>
      {blogs.length === 0 ? <p>No blog posts migrated yet.</p> : null}
      <div className="cards">
        {blogs.map((item) => (
          <article key={item.slug} className="card">
            <h2>
              <Link href={`/blog/${item.slug}`}>{item.title}</Link>
            </h2>
            <p>{item.summary || "No summary available."}</p>
          </article>
        ))}
      </div>
    </main>
  );
}
