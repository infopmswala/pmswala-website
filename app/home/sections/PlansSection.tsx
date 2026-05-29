import { Plan, PlansContent } from "../content";

type PlansSectionProps = {
  plansContent: PlansContent;
  plans: Plan[];
};

export function PlansSection({ plansContent, plans }: PlansSectionProps) {
  return (
    <section id="plans" className="neo-section neo-plans section-reveal">
      <div className="container">
        <div className="neo-section-head">
          <p className="neo-kicker">{plansContent.kicker}</p>
          <h2>{plansContent.title}</h2>
        </div>

        <div className="neo-plan-grid">
          {plans.map((plan) => (
            <article key={plan.name} className={`neo-plan-card ${plan.recommended ? "recommended" : ""}`}>
              {plan.recommended ? <p className="neo-plan-badge">{plansContent.recommendedLabel}</p> : null}
              <h3>{plan.name}</h3>
              <p className="neo-price">{plan.price}<span>{plan.period}</span></p>
              <p className="neo-plan-desc">{plan.description}</p>
              <ul>
                {plan.points.map((point) => (
                  <li key={point}>{point}</li>
                ))}
              </ul>
              <a href="#contact" className="neo-btn neo-btn-primary">{plansContent.cardCtaLabel}</a>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
