import Link from "next/link";
import { getLegacyHomeData } from "@/lib/legacy-content";
import PublicFrame from "@/components/PublicFrame";

export default async function BlogListPage() {
  const content = await getLegacyHomeData().catch(() => null);
  const blogs = content?.blogs || [];

  return (
    <PublicFrame>
      <main className="main">
        <div className="site-breadcrumb" style={{ background: "url(/assets/frontend/img/pictures/breadcrumb.jpg)" }}>
          <div className="container">
            <div className="site-breadcrumb-wpr">
              <h2 className="breadcrumb-title">Latest Blog</h2>
              <ul className="breadcrumb-menu clearfix">
                <li><a href="/">Home</a></li>
                <li className="active">Latest Blog</li>
              </ul>
            </div>
          </div>
        </div>

        <div className="blog-area de-padding">
          <div className="container">
            <div className="blog-wpr grid-3">
              {blogs.map((item) => (
                <div key={item.slug} className="blog-box">
                  <div className="blog-pic">
                    <img src={item.image || "/assets/frontend/img/logo/aboutbg.jpg"} alt="no image" />
                  </div>
                  <div className="blog-desc">
                    <div className="blog-bottom">
                      <h5>{item.title}</h5>
                      <p>{item.summary}</p>
                      <Link href={`/${item.slug}/`} className="blog-btn">
                        Read More
                        <i className="ti-arrow-top-right" />
                      </Link>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </main>
    </PublicFrame>
  );
}
