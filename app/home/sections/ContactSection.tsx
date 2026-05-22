import { FormEvent } from "react";

type ContactSectionProps = {
  enquirySent: boolean;
  onSubmit: (event: FormEvent<HTMLFormElement>) => void;
};

export function ContactSection({ enquirySent, onSubmit }: ContactSectionProps) {
  return (
    <section id="contact" className="neo-section neo-contact section-reveal">
      <div className="container neo-contact-grid">
        <div>
          <div className="neo-section-head">
            <p className="neo-kicker">Contact</p>
            <h2>Build your next EV growth chapter</h2>
          </div>
          <p className="neo-muted-copy">
            Share your project goals. Our team will design an execution-focused plan for infrastructure and investment outcomes.
          </p>
          <div className="neo-map-card" aria-hidden="true">
            <img src="/assets/frontend/img/ui/track-illustration1.png" alt="Map visual" />
          </div>
        </div>

        <form className="neo-form" onSubmit={onSubmit}>
          <label htmlFor="name">Name</label>
          <input id="name" name="name" placeholder="Your full name" required />
          <label htmlFor="email">Email</label>
          <input id="email" name="email" type="email" placeholder="name@company.com" required />
          <label htmlFor="service">Service Interest</label>
          <select id="service" name="service" required defaultValue="">
            <option value="" disabled>Select a service</option>
            <option value="ev">EV Charging Advisory</option>
            <option value="investment">Investment Strategy</option>
            <option value="asset">Seized Asset Intelligence</option>
          </select>
          <label htmlFor="message">Message</label>
          <textarea id="message" name="message" rows={4} placeholder="Tell us what you are building" required />
          <button type="submit" className="neo-btn neo-btn-primary">Send Enquiry</button>
          {enquirySent ? <p className="neo-form-success">Thank you. Our team will contact you shortly.</p> : null}
        </form>
      </div>
    </section>
  );
}
