import { Service } from "../content";

type ServicesSectionProps = {
  services: Service[];
};

export function ServicesSection({ services }: ServicesSectionProps) {
  return (
    <section id="services" className="neo-section section-reveal">
      <div className="container">
        <div className="neo-section-head">
          <p className="neo-kicker">Services</p>
          <h2>Conversion-focused strategic services</h2>
        </div>

        <div className="neo-service-grid">
          {services.map((service) => (
            <article key={service.title} className="neo-service-card">
              <div className="neo-service-media">
                <img src={service.image} alt={service.title} loading="lazy" />
              </div>
              <div className="neo-service-body">
                <i className={service.icon} aria-hidden="true" />
                <h3>{service.title}</h3>
                <p>{service.description}</p>
                <a href="#contact">Discuss Project</a>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
