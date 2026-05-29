import { AboutContent, AboutTimelineItem } from "../content";

type AboutSectionProps = {
  brandName: string;
  aboutContent: AboutContent;
  aboutTimeline: AboutTimelineItem[];
};

export function AboutSection({ brandName, aboutContent, aboutTimeline }: AboutSectionProps) {
  return (
    <section id="about" className="neo-section neo-about section-reveal">
      <div className="container neo-about-grid">
        <div>
          <div className="neo-section-head">
            <p className="neo-kicker">About {brandName}</p>
            <h2>{aboutContent.title}</h2>
          </div>
          <p className="neo-muted-copy">{aboutContent.description}</p>
          <img src={aboutContent.image} alt={aboutContent.imageAlt} className="neo-about-image" />
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
