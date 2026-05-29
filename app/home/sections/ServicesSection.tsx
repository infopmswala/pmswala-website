import { Service, ServicesContent } from "../content";

type ServicesSectionProps = {
  servicesContent: ServicesContent;
  services: Service[];
};

export function ServicesSection({ servicesContent, services }: ServicesSectionProps) {
  return (
    <section id="services" className="neo-section section-reveal">
      <div className="container">
        <div className="neo-section-head">
          <p className="neo-kicker">{servicesContent.kicker}</p>
          <h2>{servicesContent.title}</h2>
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
                <a href="#contact">{servicesContent.cardCtaLabel}</a>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
