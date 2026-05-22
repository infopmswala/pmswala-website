import { RoadmapItem } from "../content";

type RoadmapSectionProps = {
  roadmap: RoadmapItem[];
};

export function RoadmapSection({ roadmap }: RoadmapSectionProps) {
  return (
    <section id="roadmap" className="neo-section neo-roadmap section-reveal">
      <div className="container">
        <div className="neo-section-head neo-roadmap-head">
          <p className="neo-kicker">Roadmap</p>
          <h2>What we built over the last five years</h2>
          <p>
            A clear growth path showing how PMSWALA moved from advisory foundations to a more
            complete execution, assets, and EV strategy platform.
          </p>
        </div>

        <div className="neo-roadmap-board" aria-label="PMSWALA growth path roadmap">
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
