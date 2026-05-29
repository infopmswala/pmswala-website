import { FeatureCard, SectionHeadingContent } from "../content";

type FeaturesSectionProps = {
  featureCards: FeatureCard[];
  featuresContent: SectionHeadingContent;
};

export function FeaturesSection({ featureCards, featuresContent }: FeaturesSectionProps) {
  return (
    <section id="features" className="neo-section section-reveal">
      <div className="container">
        <div className="neo-section-head">
          <p className="neo-kicker">{featuresContent.kicker}</p>
          <h2>{featuresContent.title}</h2>
        </div>

        <div className="neo-feature-bento">
          {featureCards.map((item, index) => (
            <article key={item.title} className={`neo-feature-card tone-${item.tone} span-${(index % 3) + 1}`}>
              <i className={item.icon} aria-hidden="true" />
              <h3>{item.title}</h3>
              <p>{item.copy}</p>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
