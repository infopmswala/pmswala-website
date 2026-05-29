import { HeroContent, HeroStat } from "../content";

type HeroSectionProps = {
  heroStats: HeroStat[];
  heroContent: HeroContent;
};

export function HeroSection({ heroStats, heroContent }: HeroSectionProps) {
  return (
    <section id="home" className="neo-hero section-reveal">
      <div className="container neo-hero-grid">
        <div className="neo-hero-copy">
          <p className="neo-kicker">{heroContent.kicker}</p>
          <h1>{heroContent.title}</h1>
          <p>{heroContent.description}</p>
          <div className="neo-hero-actions">
            <a href={heroContent.primaryCta.href} className="neo-btn neo-btn-primary">{heroContent.primaryCta.label}</a>
            <a href={heroContent.secondaryCta.href} className="neo-btn neo-btn-ghost">{heroContent.secondaryCta.label}</a>
          </div>
          <div className="neo-stat-grid">
            {heroStats.map((item) => (
              <article key={item.label} className="neo-stat-card">
                <strong>{item.value}</strong>
                <span>{item.label}</span>
              </article>
            ))}
          </div>
        </div>

        <aside className="neo-hero-panel">
          <img src={heroContent.panelImage} alt={heroContent.panelImageAlt} />
          <div className="neo-hero-panel-content">
            <h3>{heroContent.panelTitle}</h3>
            <p>{heroContent.panelDescription}</p>
            <div className="neo-tag-list">
              {heroContent.panelTags.map((tag) => (
                <span key={tag}>{tag}</span>
              ))}
            </div>
          </div>
        </aside>
      </div>
    </section>
  );
}
