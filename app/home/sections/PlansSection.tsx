import { Plan } from "../content";

type PlansSectionProps = {
  plans: Plan[];
};

export function PlansSection({ plans }: PlansSectionProps) {
  return (
    <section id="plans" className="neo-section neo-plans section-reveal">
      <div className="container">
        <div className="neo-section-head">
          <p className="neo-kicker">Investment Plans</p>
          <h2>Premium advisory plans built for growth</h2>
        </div>

        <div className="neo-plan-grid">
          {plans.map((plan) => (
            <article key={plan.name} className={`neo-plan-card ${plan.recommended ? "recommended" : ""}`}>
              {plan.recommended ? <p className="neo-plan-badge">Recommended</p> : null}
              <h3>{plan.name}</h3>
              <p className="neo-price">{plan.price}<span>{plan.period}</span></p>
              <p className="neo-plan-desc">{plan.description}</p>
              <ul>
                {plan.points.map((point) => (
                  <li key={point}>{point}</li>
                ))}
              </ul>
              <a href="#contact" className="neo-btn neo-btn-primary">Choose Plan</a>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
