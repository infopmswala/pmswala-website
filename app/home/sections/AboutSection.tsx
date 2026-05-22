import { AboutTimelineItem } from "../content";

type AboutSectionProps = {
  brandName: string;
  aboutTimeline: AboutTimelineItem[];
};

export function AboutSection({ brandName, aboutTimeline }: AboutSectionProps) {
  return (
    <section id="about" className="neo-section neo-about section-reveal">
      <div className="container neo-about-grid">
        <div>
          <div className="neo-section-head">
            <p className="neo-kicker">About {brandName}</p>
            <h2>From advisory roots to EV-tech execution leadership</h2>
          </div>
          <p className="neo-muted-copy">
            We combine startup speed with institutional clarity. The mission is simple: help clients make sharper
            infrastructure and capital decisions with confidence, transparency, and long-term value.
          </p>
          <img src="/assets/frontend/img/about.jpg" alt="Strategy discussion" className="neo-about-image" />
        </div>

        <div className="neo-timeline">
          {aboutTimeline.map((item) => (
            <article key={item.year} className="neo-timeline-item">
              <p className="neo-year-pill">{item.year}</p>
              <h3>{item.title}</h3>
              <p>{item.text}</p>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
