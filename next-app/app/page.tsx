"use client";

import { FormEvent, useMemo, useState } from "react";

const services = [
  {
    title: "Investment and Portfolio Advisory",
    description: "Goal-oriented financial guidance with practical planning, allocation strategy, and disciplined monitoring.",
    icon: "bi bi-pie-chart",
    highlight: "Portfolio decisions",
    category: "investment"
  },
  {
    title: "Bank Seized Property Advisory",
    description: "End-to-end guidance for bank auction properties with legal checks, valuation support, and bid planning.",
    icon: "bi bi-bank",
    highlight: "Auction-ready screening",
    category: "property"
  },
  {
    title: "Distressed Asset Opportunity Research",
    description: "Location and market analysis to identify high-potential seized assets with practical investment upside.",
    icon: "bi bi-search",
    highlight: "Opportunity mapping",
    category: "property"
  },
  {
    title: "EV Charging Station Planning",
    description: "Site selection, demand forecasting, and setup advisory for commercially viable EV charging stations.",
    icon: "bi bi-ev-station",
    highlight: "Site feasibility",
    category: "ev"
  },
  {
    title: "EV Infra Partnership Support",
    description: "Support for vendor coordination, operational readiness, and scalable EV infrastructure execution.",
    icon: "bi bi-lightning-charge",
    highlight: "Partner coordination",
    category: "ev"
  },
  {
    title: "Business Opportunity Consulting",
    description: "Strategic support to evaluate and execute high-potential opportunities across real assets and growth sectors.",
    icon: "bi bi-briefcase",
    highlight: "Growth planning",
    category: "investment"
  }
];

const serviceFilters = [
  { key: "all", label: "All" },
  { key: "investment", label: "Investment" },
  { key: "property", label: "Seized Property" },
  { key: "ev", label: "EV Charging" }
];

const stats = [
  { value: "1K+", label: "Auction Leads Reviewed" },
  { value: "250+", label: "Property Opportunities" },
  { value: "80+", label: "EV Sites Evaluated" },
  { value: "24/7", label: "Advisory Support" }
];

const verticals = [
  {
    key: "property",
    title: "Bank Seized Properties",
    note: "Asset opportunity advisory",
    summary: "We help investors and businesses evaluate auction assets with legal, valuation, and bid strategy discipline.",
    points: ["Title-risk and documentation review", "Location viability and resale potential", "Bid planning with downside protection"]
  },
  {
    key: "ev",
    title: "EV Power Charging Stations",
    note: "Infrastructure growth advisory",
    summary: "We support charging-station planning from demand analysis to deployment strategy for sustainable returns.",
    points: ["Traffic and power-readiness assessment", "Capex and operational feasibility mapping", "Execution and partner coordination support"]
  }
];

const processSteps = [
  {
    step: "01",
    title: "Discovery",
    summary: "We map your goals, ticket size, risk appetite, and timeline before any recommendation.",
    details: ["Requirement brief", "Budget and risk mapping", "Objective alignment"]
  },
  {
    step: "02",
    title: "Validation",
    summary: "We perform legal, commercial, and location-level viability checks to de-risk decisions.",
    details: ["Compliance checks", "Market and demand analysis", "Feasibility and downside view"]
  },
  {
    step: "03",
    title: "Execution",
    summary: "We support bidding or deployment with practical action plans and implementation guidance.",
    details: ["Bid or launch strategy", "Partner coordination", "Post-decision optimization"]
  }
];

const testimonials = [
  {
    quote: "They helped us evaluate a bank seized property from legal risk to bidding strategy with full clarity.",
    name: "Amit Sharma",
    role: "Property Investor"
  },
  {
    quote: "Our EV charging station plan became practical only after their site and demand assessment process.",
    name: "Nisha Jain",
    role: "EV Business Operator"
  },
  {
    quote: "Strong execution support from property shortlist to on-ground EV partnership decisions.",
    name: "Rahul Mehta",
    role: "Business Owner"
  }
];

const snapshots = [
  {
    title: "Bank Auction Asset Turnaround",
    segment: "Seized Property",
    problem: "Investor had a high-potential auction target but unclear legal/documentation risk.",
    action: "We performed document screening, valuation mapping, and bid strategy simulation.",
    outcome: "Client entered with a clear downside boundary and stronger decision confidence."
  },
  {
    title: "EV Charging Corridor Setup",
    segment: "EV Infrastructure",
    problem: "Business team wanted expansion but lacked location and demand confidence.",
    action: "We assessed traffic, power readiness, and commercial viability with phased rollout planning.",
    outcome: "Execution plan improved capital discipline and reduced deployment uncertainty."
  }
];

const blogs = [
  {
    title: "How To Evaluate Bank Seized Properties Before Bidding",
    summary: "A practical checklist for title review, legal status, location potential, and realistic value assessment."
  },
  {
    title: "Top Factors For Profitable EV Charging Station Locations",
    summary: "Learn demand, traffic, power availability, and commercial viability metrics before finalizing a site."
  },
  {
    title: "Combining Distressed Property Assets With EV Infra Growth",
    summary: "Why investors are exploring asset-backed opportunities linked to future-ready EV infrastructure."
  }
];

export default function HomePage() {
  const [aboutTab, setAboutTab] = useState(verticals[0].key);
  const [serviceFilter, setServiceFilter] = useState("all");
  const [testimonialIndex, setTestimonialIndex] = useState(0);
  const [activeProcess, setActiveProcess] = useState(0);
  const [enquirySent, setEnquirySent] = useState(false);

  const activeVertical = verticals.find((item) => item.key === aboutTab) || verticals[0];
  const filteredServices = useMemo(
    () => services.filter((service) => serviceFilter === "all" || service.category === serviceFilter),
    [serviceFilter]
  );
  const activeTestimonial = testimonials[testimonialIndex];

  const handleEnquirySubmit = (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    setEnquirySent(true);
  };

  return (
    <main className="landing-page">
      <header className="landing-header">
        <div className="container landing-header-row">
          <a href="#home" className="landing-logo">
            <img src="/assets/frontend/img/logo/logo.png" alt="PMSWALA" />
          </a>
          <nav className="landing-nav" aria-label="Main navigation">
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#why-us">Why Us</a>
            <a href="#blog">Blog</a>
            <a href="#testimonials">Testimonials</a>
            <a href="#contact">Contact</a>
          </nav>
          <a href="#contact" className="landing-cta">Get Started</a>
        </div>
      </header>

      <section id="home" className="landing-hero">
        <div className="container landing-hero-grid">
          <div className="landing-hero-copy">
            <p className="landing-eyebrow">Investment Advisory with Asset and EV Opportunity Expertise</p>
            <h1>Build growth with smart investments, seized assets, and EV charging opportunities.</h1>
            <p className="landing-lead">
              PMSWALA offers financial and investment advisory services, and also works on bank seized properties
              and EV power charging station opportunities. We combine due diligence, analysis, and execution support.
            </p>
            <div className="landing-hero-actions">
              <a href="#services" className="landing-btn-primary">Explore Services</a>
              <a href="#about" className="landing-btn-secondary">Know More</a>
            </div>
            <div className="landing-tag-list">
              <span>Portfolio Advisory</span>
              <span>Bank Auction Expertise</span>
              <span>EV Infra Planning</span>
              <span>Compliance Support</span>
            </div>
          </div>

          <aside className="landing-hero-panel" aria-label="Quick highlights">
            <h3>Service Snapshot</h3>
            <p>Structured advisory across investments, distressed property assets, and future-ready EV infrastructure projects.</p>
            <div className="landing-mini-metrics">
              <div>
                <strong>100+</strong>
                <span>Bank Auction Cases / Quarter</span>
              </div>
              <div>
                <strong>60+</strong>
                <span>EV Site Reviews / Year</span>
              </div>
              <div>
                <strong>Pan India</strong>
                <span>Coverage For Asset Screening</span>
              </div>
            </div>
            <a href="#contact" className="landing-btn-primary landing-btn-block">Book Consultation</a>
          </aside>
        </div>
      </section>

      <section className="landing-marquee" aria-label="Trust indicators">
        <div className="container">
          <p>Bank Auction Advisory</p>
          <p>Legal and Valuation Support</p>
          <p>Distressed Asset Research</p>
          <p>EV Charging Planning</p>
          <p>Project Execution Support</p>
          <p>Long-Term Value Creation</p>
        </div>
      </section>

      <section id="about" className="landing-section landing-about-section">
        <div className="container landing-about-layout">
          <div className="landing-about-copy">
            <p className="landing-eyebrow">About Us</p>
            <h2>Advisory that connects undervalued assets with future-ready infrastructure</h2>
            <p className="landing-section-intro">
              Focused advisory for property investors, business owners, and EV infrastructure partners who need a clearer decision path.
            </p>
            <p>
              PMSWALA is a business-first advisory brand helping clients make high-conviction decisions across
              investment planning, bank seized properties, and EV charging infrastructure.
            </p>
            <p>
              Our focus is not just recommendations. We help reduce execution risk through research, due diligence,
              and practical decision support.
            </p>
            <div className="landing-about-chips">
              <span>Investor-Focused</span>
              <span>Execution-Led</span>
              <span>Risk-Controlled</span>
              <span>Scalable Strategy</span>
            </div>
            <div className="landing-stat-strip">
              {stats.map((item) => (
                <div key={item.label} className="landing-stat-pill">
                  <strong>{item.value}</strong>
                  <span>{item.label}</span>
                </div>
              ))}
            </div>
          </div>

          <div className="landing-about-panel">
            <div className="landing-tablist" role="tablist" aria-label="About verticals">
              {verticals.map((item) => (
                <button
                  key={item.key}
                  type="button"
                  className={`landing-tab ${aboutTab === item.key ? "active" : ""}`}
                  role="tab"
                  aria-selected={aboutTab === item.key}
                  onClick={() => setAboutTab(item.key)}
                >
                  {item.title}
                </button>
              ))}
            </div>

            <div className="landing-about-detail" role="tabpanel">
              <p className="landing-about-note">{activeVertical.note}</p>
              <h3>{activeVertical.title}</h3>
              <p>{activeVertical.summary}</p>
              <ul className="landing-about-list">
                {activeVertical.points.map((point) => (
                  <li key={point}>{point}</li>
                ))}
              </ul>
              <div className="landing-about-audience">
                <span>Investors</span>
                <span>Business Owners</span>
                <span>Developers</span>
                <span>Infra Partners</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="services" className="landing-section landing-section-alt">
        <div className="container">
          <div className="landing-services-layout">
            <div className="landing-section-head landing-services-copy">
              <p className="landing-eyebrow">Our Services</p>
              <h2>Advisory paths built around investment decisions, seized assets, and EV growth</h2>
              <p>
                Instead of listing generic offerings, we organize our work around the actual decisions clients need to make:
                screen the opportunity, reduce risk, and move forward with confidence.
              </p>
            </div>
            <aside className="landing-service-feature">
              <span className="landing-service-feature-label">Choose your path</span>
              <h3>{filteredServices.length} active service paths</h3>
              <p>Use the filters below to switch between investment, seized property, and EV infrastructure advice.</p>
              <div className="landing-service-feature-metrics">
                <div>
                  <strong>3</strong>
                  <span>Core advisory tracks</span>
                </div>
                <div>
                  <strong>6</strong>
                  <span>Focused service options</span>
                </div>
                <div>
                  <strong>1</strong>
                  <span>Clear decision workflow</span>
                </div>
              </div>
              <ul>
                <li>Risk checks before money moves</li>
                <li>Actionable next steps instead of broad advice</li>
                <li>Support across both asset and EV opportunity tracks</li>
              </ul>
            </aside>
          </div>
          <div className="landing-service-toolbar" role="tablist" aria-label="Service categories">
            {serviceFilters.map((filter) => (
              <button
                key={filter.key}
                type="button"
                className={`landing-filter-chip ${serviceFilter === filter.key ? "active" : ""}`}
                onClick={() => setServiceFilter(filter.key)}
              >
                {filter.label}
              </button>
            ))}
          </div>
          <div className="landing-service-grid">
            {filteredServices.map((service) => (
              <article key={service.title} className="landing-service-row">
                <div className="landing-service-card-top">
                  <i className={service.icon} aria-hidden="true" />
                  <span className="landing-service-badge">{service.highlight}</span>
                </div>
                <h3>{service.title}</h3>
                <p>{service.description}</p>
                <div className="landing-service-card-footer">
                  <span>Interactive advisory</span>
                  <a href="#contact">Explore</a>
                </div>
              </article>
            ))}
          </div>
        </div>
      </section>

      <section id="why-us" className="landing-section">
        <div className="container landing-why-layout">
          <div className="landing-why-copy">
            <p className="landing-eyebrow">Why Choose Us</p>
            <h2>Decision clarity from screening to execution</h2>
            <div className="landing-why-banner">
              <span>Screen</span>
              <span>Validate</span>
              <span>Execute</span>
            </div>
            <div className="landing-why-points">
              <div>
                <strong>Cross-domain advisory</strong>
                <span>Combining assets and EV infrastructure in one strategic model.</span>
              </div>
              <div>
                <strong>Due diligence first</strong>
                <span>We validate risk before recommendations move into execution.</span>
              </div>
              <div>
                <strong>Execution support</strong>
                <span>We stay involved after strategy so plans do not stall at intent.</span>
              </div>
              <div>
                <strong>Transparent communication</strong>
                <span>Clear updates throughout the project lifecycle.</span>
              </div>
            </div>
          </div>
          <aside className="landing-why-panel">
            <h3>Engagement snapshot</h3>
            <p>
              If your need is investment advice, a bank-seized asset review, or EV charging station setup,
              we build a structured route from analysis to execution.
            </p>
            <a href="#contact" className="landing-btn-secondary">Talk to an Expert</a>
          </aside>
        </div>
      </section>

      <section className="landing-section landing-process-section">
        <div className="container">
          <div className="landing-section-head">
            <p className="landing-eyebrow">How We Work</p>
            <h2>Simple execution framework</h2>
          </div>
          <div className="landing-process-layout">
            <div className="landing-process-steps" role="tablist" aria-label="Process steps">
              {processSteps.map((item, index) => (
                <button
                  key={item.step}
                  type="button"
                  className={`landing-process-step ${index === activeProcess ? "active" : ""}`}
                  onClick={() => setActiveProcess(index)}
                >
                  <span>{item.step}</span>
                  {item.title}
                </button>
              ))}
            </div>
            <article className="landing-process-summary">
              <span className="landing-step">{processSteps[activeProcess].step}</span>
              <h3>{processSteps[activeProcess].title}</h3>
              <p>{processSteps[activeProcess].summary}</p>
              <ul>
                {processSteps[activeProcess].details.map((detail) => (
                  <li key={detail}>{detail}</li>
                ))}
              </ul>
            </article>
          </div>
        </div>
      </section>

      <section className="landing-section landing-case-section">
        <div className="container">
          <div className="landing-section-head">
            <p className="landing-eyebrow">Business Snapshot</p>
            <h2>How strategy turns into practical outcomes</h2>
            <p>Representative examples of how PMSWALA supports decision quality before execution.</p>
          </div>
          <div className="landing-snapshot-list">
            {snapshots.map((item) => (
              <article key={item.title} className="landing-snapshot">
                <span className="landing-case-pill">{item.segment}</span>
                <h3>{item.title}</h3>
                <p><strong>Problem:</strong> {item.problem}</p>
                <p><strong>Action:</strong> {item.action}</p>
                <p><strong>Outcome:</strong> {item.outcome}</p>
              </article>
            ))}
          </div>
        </div>
      </section>

      <section id="blog" className="landing-section">
        <div className="container">
          <div className="landing-section-head">
            <p className="landing-eyebrow">Our Blog</p>
            <h2>Checkout our latest news and articles</h2>
          </div>
          <div className="landing-blog-list">
            {blogs.map((item) => (
              <article key={item.title} className="landing-blog-row">
                <h3>{item.title}</h3>
                <p>{item.summary}</p>
              </article>
            ))}
          </div>
        </div>
      </section>

      <section id="testimonials" className="landing-section landing-section-alt">
        <div className="container">
          <div className="landing-section-head">
            <p className="landing-eyebrow">Testimonials</p>
            <h2>What investors say about us</h2>
          </div>

          <div className="landing-testimonial-layout">
            <article className="landing-testimonial-panel">
              <p className="landing-quote">&ldquo;{activeTestimonial.quote}&rdquo;</p>
              <h3>{activeTestimonial.name}</h3>
              <p>{activeTestimonial.role}</p>
            </article>
            <div className="landing-testimonial-controls">
              <button type="button" onClick={() => setTestimonialIndex((index) => (index - 1 + testimonials.length) % testimonials.length)}>
                Prev
              </button>
              <button type="button" onClick={() => setTestimonialIndex((index) => (index + 1) % testimonials.length)}>
                Next
              </button>
              <div className="landing-testimonial-dots">
                {testimonials.map((item, index) => (
                  <button
                    key={item.name}
                    type="button"
                    className={index === testimonialIndex ? "active" : ""}
                    onClick={() => setTestimonialIndex(index)}
                    aria-label={`Show testimonial ${index + 1}`}
                  />
                ))}
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="contact" className="landing-section">
        <div className="container landing-contact-layout">
          <div className="landing-contact-copy">
            <p className="landing-eyebrow">Contact</p>
            <h2>Get Consultation</h2>
            <p>
              Share your bank seized property or EV charging project requirement. We will help you with
              feasibility, risk checks, and execution planning.
            </p>
            <form className="landing-form" onSubmit={handleEnquirySubmit}>
              <label htmlFor="name">Name</label>
              <input id="name" name="name" type="text" placeholder="Enter your name" required />
              <label htmlFor="email">Email</label>
              <input id="email" name="email" type="email" placeholder="Enter your email" required />
              <label htmlFor="priority">I am interested in</label>
              <select id="priority" name="priority" required defaultValue="">
                <option value="" disabled>Select service priority</option>
                <option value="investment">Investment and Portfolio Advisory</option>
                <option value="property">Bank Seized Property Advisory</option>
                <option value="ev">EV Charging Station / EV Infra</option>
                <option value="other">Other Business Consulting</option>
              </select>
              <label htmlFor="message">Message</label>
              <textarea id="message" name="message" rows={4} placeholder="Tell us about your requirement" required />
              <button type="submit" className="landing-btn-primary">Send Enquiry</button>
              {enquirySent ? <p className="landing-form-success">Thanks. Our team will contact you shortly.</p> : null}
            </form>
          </div>
          <aside className="landing-contact-panel">
            <h3>Connect with us</h3>
            <p><strong>Phone:</strong> +91 89825 29261</p>
            <p><strong>Email:</strong> support@pmswala.com</p>
            <p><strong>Location:</strong> India</p>
            <div className="landing-contact-tags">
              <span>Property Advisory</span>
              <span>EV Infrastructure</span>
              <span>Rapid Response</span>
            </div>
            <a href="https://api.whatsapp.com/send?phone=918982529261&text=Welcome%20to%20PMSWala" className="landing-btn-primary">
              Chat on WhatsApp
            </a>
          </aside>
        </div>
      </section>

      <section className="landing-section landing-section-alt landing-faq">
        <div className="container">
          <p className="landing-eyebrow">FAQ</p>
          <h2>Common questions</h2>
          <div className="landing-faq-list">
            <details>
              <summary>Do you only deal in bank seized properties?</summary>
              <p>No. Bank seized properties and EV charging stations are services we offer as well, along with broader advisory services.</p>
            </details>
            <details>
              <summary>Can you support complete EV charging project planning?</summary>
              <p>Yes, from site shortlisting and feasibility to execution support and partnership guidance.</p>
            </details>
            <details>
              <summary>How do you reduce risk in seized property purchases?</summary>
              <p>Through structured legal verification, valuation checks, and practical bid strategy support.</p>
            </details>
          </div>
        </div>
      </section>

      <a href="#contact" className="landing-mobile-cta" aria-label="Book consultation">
        Book Consultation
      </a>
    </main>
  );
}
