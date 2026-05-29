import { FormEvent } from "react";
import { ContactContent } from "../content";

type ContactSectionProps = {
  contactContent: ContactContent;
  enquirySent: boolean;
  onSubmit: (event: FormEvent<HTMLFormElement>) => void;
};

export function ContactSection({ contactContent, enquirySent, onSubmit }: ContactSectionProps) {
  return (
    <section id="contact" className="neo-section neo-contact section-reveal">
      <div className="container neo-contact-grid">
        <div>
          <div className="neo-section-head">
            <p className="neo-kicker">{contactContent.kicker}</p>
            <h2>{contactContent.title}</h2>
          </div>
          <p className="neo-muted-copy">{contactContent.description}</p>
          <div className="neo-map-card" aria-hidden="true">
            <img src={contactContent.mapImage} alt={contactContent.mapImageAlt} />
          </div>
        </div>

        <form className="neo-form" onSubmit={onSubmit}>
          <label htmlFor="name">{contactContent.nameLabel}</label>
          <input id="name" name="name" placeholder={contactContent.namePlaceholder} required />
          <label htmlFor="email">{contactContent.emailLabel}</label>
          <input id="email" name="email" type="email" placeholder={contactContent.emailPlaceholder} required />
          <label htmlFor="service">{contactContent.serviceLabel}</label>
          <select id="service" name="service" required defaultValue="">
            <option value="" disabled>{contactContent.servicePlaceholder}</option>
            {contactContent.serviceOptions.map((option) => (
              <option key={option.value} value={option.value}>{option.label}</option>
            ))}
          </select>
          <label htmlFor="message">{contactContent.messageLabel}</label>
          <textarea id="message" name="message" rows={4} placeholder={contactContent.messagePlaceholder} required />
          <button type="submit" className="neo-btn neo-btn-primary">{contactContent.submitLabel}</button>
          {enquirySent ? <p className="neo-form-success">{contactContent.successMessage}</p> : null}
        </form>
      </div>
    </section>
  );
}
