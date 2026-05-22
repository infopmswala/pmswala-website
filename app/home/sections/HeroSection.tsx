import { HeroStat } from "../content";

type HeroSectionProps = {
  heroStats: HeroStat[];
};

export function HeroSection({ heroStats }: HeroSectionProps) {
  return (
    <section id="home" className="neo-hero section-reveal">
      <div className="container neo-hero-grid">
        <div className="neo-hero-copy">
          <p className="neo-kicker">Innovation on Every Charge</p>
          <h1>Future-ready EV Infrastructure and Investment Intelligence.</h1>
          <p>
            We design profitable EV charging growth and investor-grade decision systems for founders,
            operators, and institutions building the next energy economy.
          </p>
          <div className="neo-hero-actions">
            <a href="#plans" className="neo-btn neo-btn-primary">View Plans</a>
            <a href="#services" className="neo-btn neo-btn-ghost">Explore Services</a>
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
          <img src="/assets/frontend/img/ui/banner.jpg" alt="EV futuristic visual" />
          <div className="neo-hero-panel-content">
            <h3>Investor-Grade Command Layer</h3>
            <p>Premium insights for EV operations, seized assets, and strategic deployment decisions.</p>
            <div className="neo-tag-list">
              <span>AI Feasibility</span>
              <span>Risk Control</span>
              <span>Multi-City Ready</span>
            </div>
          </div>
        </aside>
      </div>
    </section>
  );
}
