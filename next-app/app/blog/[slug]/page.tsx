import { notFound } from "next/navigation";
import { getPageBySlug } from "@/lib/public-data";
import { getLegacyPageBySlug } from "@/lib/legacy-content";
import PublicFrame from "@/components/PublicFrame";

export default async function BlogDetailPage({ params }: { params: { slug: string } }) {
  const page = (await getPageBySlug(params.slug)) || (await getLegacyPageBySlug(params.slug));
  if (!page || page.source !== "blog") {
    notFound();
  }

  return (
    <PublicFrame>
      <main className="main">
        <div className="site-breadcrumb" style={{ background: "url(/assets/frontend/img/pictures/breadcrumb.jpg)" }}>
          <div className="container">
            <div className="site-breadcrumb-wpr">
              <h2 className="breadcrumb-title">{page.title}</h2>
              <ul className="breadcrumb-menu clearfix">
                <li><a href="/">Home</a></li>
                <li><a href="/blog/">Blog</a></li>
                <li className="active">{page.title}</li>
              </ul>
            </div>
          </div>
        </div>

        <div className="blog-single-area bg de-padding">
          <div className="container">
            <div className="blog-single-wpr">
              <div className="row ps g-5">
                <div className="col-xl-8 m-auto">
                  <div className="theme-single blog-single">
                    <div className="theme-pic">
                      <img src={page.image || "/assets/frontend/img/logo/aboutbg.jpg"} className="big-pic" alt="thumb" />
                    </div>
                    <div className="theme-info p-50">
                      <div className="theme-desc">
                        <h2 className="heading-2">{page.title}</h2>
                        <div className="mb-30" dangerouslySetInnerHTML={{ __html: page.contentHtml || page.summary || "" }} />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </PublicFrame>
  );
}
