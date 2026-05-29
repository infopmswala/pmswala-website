import { RoadmapContent, RoadmapItem } from "../content";

type RoadmapSectionProps = {
  roadmapContent: RoadmapContent;
  roadmap: RoadmapItem[];
};

export function RoadmapSection({ roadmapContent, roadmap }: RoadmapSectionProps) {
  return (
    <section id="roadmap" className="neo-section neo-roadmap section-reveal">
      <div className="container">
        <div className="neo-section-head neo-roadmap-head">
          <p className="neo-kicker">{roadmapContent.kicker}</p>
          <h2>{roadmapContent.title}</h2>
          <p>{roadmapContent.description}</p>
        </div>

        <div className="neo-roadmap-board" aria-label={roadmapContent.ariaLabel}>
          {roadmap.map((item, index) => (
            <article
              key={item.year}
              className={`neo-roadmap-milestone ${index % 2 === 0 ? "is-right" : "is-left"}`}
            >
              <div className="neo-roadmap-pin" aria-hidden="true">
                <span>{item.year}</span>
              </div>
              <div className="neo-roadmap-block">
                <p className="neo-roadmap-label">{item.label}</p>
                <h3>{item.title}</h3>
                <p>{item.summary}</p>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
