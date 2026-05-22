"use client";

import { FormEvent, useEffect, useState } from "react";

const brandName = "PMSWALA";

const navLinks = [
  { label: "Home", href: "#home", id: "home" },
  { label: "Features", href: "#features", id: "features" },
  { label: "About", href: "#about", id: "about" },
  { label: "Services", href: "#services", id: "services" },
  { label: "Plans", href: "#plans", id: "plans" },
  { label: "Roadmap", href: "#roadmap", id: "roadmap" },
  { label: "Contact", href: "#contact", id: "contact" }
];

const heroStats = [
  { value: "15K+", label: "Charging Sessions" },
  { value: "98%", label: "Platform Uptime" },
  { value: "4.9/5", label: "Investor Confidence" },
  { value: "12", label: "Operational Cities" }
];

const featureCards = [
  {
    icon: "bi bi-lightning-charge",
    title: "Smart Charge Infrastructure",
    copy: "AI-assisted station planning and utilization tracking for profitable EV corridors.",
    tone: "emerald"
  },
  {
    icon: "bi bi-graph-up-arrow",
    title: "Investor Control Room",
    copy: "Real-time investment visibility, risk signals, and return trends in one premium dashboard.",
    tone: "blue"
  },
  {
    icon: "bi bi-shield-check",
    title: "Compliance and Risk Layer",
    copy: "Automated legal and operational checks to reduce deployment and acquisition uncertainty.",
    tone: "emerald"
  },
  {
    icon: "bi bi-cpu",
    title: "Predictive Demand Engine",
    copy: "Demand heatmaps and behavior modeling for smarter location decisions.",
    tone: "blue"
  },
  {
    icon: "bi bi-geo-alt",
    title: "Geo Intelligence",
    copy: "Map-ready insights for traffic, power feasibility, and station economics.",
    tone: "emerald"
  }
];

const services = [
  {
    title: "EV Charging Venture Advisory",
    description: "Business, infra, and execution advisory to build scalable EV charging operations.",
    image: "/assets/frontend/img/ev-user-upload.png",
    icon: "bi bi-ev-station"
  },
  {
    title: "Bank Seized Asset Intelligence",
    description: "Deep legal-validation and valuation strategy for distressed asset opportunities.",
    image: "/assets/frontend/img/realestate.jpg",
    icon: "bi bi-bank"
  },
  {
    title: "Portfolio and Allocation Strategy",
    description: "Investor-grade capital planning across physical assets and growth sectors.",
    image: "/assets/frontend/img/invest.jpg",
    icon: "bi bi-pie-chart"
  }
];

const aboutTimeline = [
  {
    year: "2022",
    title: "Advisory Foundation",
    text: "Started with focused investment advisory and opportunity screening for high-conviction clients."
  },
  {
    year: "2024",
    title: "Asset + EV Expansion",
    text: "Integrated seized asset intelligence and EV charging strategy into one execution-led platform."
  },
  {
    year: "2026",
    title: "PMSWALA Growth Era",
    text: "Scaling premium EV-tech and investor experiences with stronger operating and analytics systems."
  }
];

const plans = [
  {
    name: "Starter",
    price: "INR 24,999",
    period: "/month",
    description: "For first-stage EV founders and focused investors.",
    points: ["2 strategic consultations", "Basic risk and opportunity report", "Email support"],
    recommended: false
  },
  {
    name: "Growth",
    price: "INR 64,999",
    period: "/month",
    description: "Best for active operators scaling infrastructure and investment decisions.",
    points: ["Full advisory workflow", "Priority feasibility and legal checks", "Dedicated strategy partner"],
    recommended: true
  },
  {
    name: "Enterprise",
    price: "Custom",
    period: "engagement",
    description: "For institutions, funds, and large operators needing end-to-end support.",
    points: ["Portfolio-level strategy", "Multi-city rollout advisory", "Executive reporting layer"],
    recommended: false
  }
];

const roadmap = [
  {
    year: "2021",
    title: "Advisory Foundation Built",
    label: "Starting point",
    summary: "Established PMSWALA with a focused advisory model for investment planning and opportunity screening."
  },
  {
    year: "2022",
    title: "Client Network Expansion",
    label: "Growth phase",
    summary: "Expanded the client base, improved service delivery, and created stronger trust through execution-led support."
  },
  {
    year: "2023",
    title: "Asset Opportunity Advisory Added",
    label: "Capability layer",
    summary: "Added bank-seized property and asset intelligence support to widen the value proposition for investors."
  },
  {
    year: "2024",
    title: "EV Charging Strategy Launch",
    label: "New vertical",
    summary: "Entered the EV charging advisory space with planning, feasibility, and infrastructure guidance for future-ready clients."
  },
  {
    year: "2025",
    title: "Integrated Growth Platform",
    label: "Current stage",
    summary: "Unified investment, asset, and EV services into one stronger PMSWALA growth story with premium digital presence."
  },
  {
    year: "2026",
    title: "Digital Expansion and Stronger Execution",
    label: "Next milestone",
    summary: "Expanded the brand presence with a stronger digital platform, sharper positioning, and a more structured client journey."
  }
];

const testimonials = [
  {
    quote: "PMSWALA made our EV expansion look like a high-confidence operating play, not a gamble.",
    name: "Rajat Khanna",
    role: "Director, VoltRoute Energy"
  },
  {
    quote: "The investor reporting and risk clarity gave our board exactly the confidence we needed.",
    name: "Neha Suri",
    role: "Managing Partner, GreenCap Ventures"
  },
  {
    quote: "They combine startup speed with institutional quality. That is rare in this space.",
    name: "Aman Tiwari",
    role: "CEO, UrbanCharge Network"
  }
];

export default function HomePage() {
  const [activeSection, setActiveSection] = useState("home");
  const [mobileOpen, setMobileOpen] = useState(false);
  const [testimonialIndex, setTestimonialIndex] = useState(0);
  const [enquirySent, setEnquirySent] = useState(false);

  useEffect(() => {
    const sectionIds = navLinks.map((item) => item.id);
    const targets = sectionIds
      .map((id) => document.getElementById(id))
      .filter((el): el is HTMLElement => Boolean(el));

    const observer = new IntersectionObserver(
      (entries) => {
        const visible = entries
          .filter((entry) => entry.isIntersecting)
          .sort((a, b) => b.intersectionRatio - a.intersectionRatio)[0];

        if (visible?.target?.id) {
          setActiveSection(visible.target.id);
        }
      },
      { rootMargin: "-35% 0px -45% 0px", threshold: [0.2, 0.4, 0.7] }
    );

    targets.forEach((el) => observer.observe(el));

    return () => {
      targets.forEach((el) => observer.unobserve(el));
      observer.disconnect();
    };
  }, []);

  const handleEnquirySubmit = (event: FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    setEnquirySent(true);
  };

  return (
    <main className="neo-page">
      <div className="neo-bg-orb orb-one" aria-hidden="true" />
      <div className="neo-bg-orb orb-two" aria-hidden="true" />
      <div className="neo-bg-grid" aria-hidden="true" />

      <header className="neo-header">
        <div className="container neo-header-row">
          <a href="#home" className="neo-logo">
            <img src="/assets/frontend/img/logo/logo.png" alt={brandName} />
            <span>{brandName}</span>
          </a>

          <nav className={`neo-nav ${mobileOpen ? "open" : ""}`} aria-label="Main navigation">
            {navLinks.map((item) => (
              <a
                key={item.id}
                href={item.href}
                className={activeSection === item.id ? "active" : ""}
                onClick={() => setMobileOpen(false)}
              >
                {item.label}
              </a>
            ))}
          </nav>

          <div className="neo-header-cta-wrap">
            <a href="https://pmswalaweb.firebaseapp.com/" className="neo-btn neo-btn-primary">Invest Now</a>
            <button
              type="button"
              className="neo-menu-btn"
              onClick={() => setMobileOpen((open) => !open)}
              aria-label="Toggle navigation"
              aria-expanded={mobileOpen}
            >
              <span />
              <span />
            </button>
          </div>
        </div>
      </header>

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

      <section id="features" className="neo-section section-reveal">
        <div className="container">
          <div className="neo-section-head">
            <p className="neo-kicker">Platform Features</p>
            <h2>Built for EV-tech startups and serious investors</h2>
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

      <section id="about" className="neo-section neo-about section-reveal">
        <div className="container neo-about-grid">
          <div>
            <div className="neo-section-head">
              <p className="neo-kicker">About {brandName}</p>
              <h2>From advisory roots to EV-tech execution leadership</h2>
            </div>
            <p className="neo-muted-copy">
              We combine startup speed with institutional clarity. The mission is simple: help clients make sharper
              infrastructure and capital decisions with confidence, transparency, and long-term value.
            </p>
            <img src="/assets/frontend/img/about.jpg" alt="Strategy discussion" className="neo-about-image" />
          </div>

          <div className="neo-timeline">
            {aboutTimeline.map((item) => (
              <article key={item.year} className="neo-timeline-item">
                <p className="neo-year-pill">{item.year}</p>
                <h3>{item.title}</h3>
                <p>{item.text}</p>
              </article>
            ))}
          </div>
        </div>
      </section>

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

      <section id="roadmap" className="neo-section neo-roadmap section-reveal">
        <div className="container">
          <div className="neo-section-head neo-roadmap-head">
            <p className="neo-kicker">Roadmap</p>
            <h2>What we built over the last five years</h2>
            <p>
              A clear growth path showing how PMSWALA moved from advisory foundations to a more
              complete execution, assets, and EV strategy platform.
            </p>
          </div>

          <div className="neo-roadmap-board" aria-label="PMSWALA growth path roadmap">
            {roadmap.map((item, index) => (
              <article
                key={item.year}
                className={`neo-roadmap-milestone ${index % 2 === 0 ? "is-right" : "is-left"}`}
              >
                <div className="neo-roadmap-pin" aria-hidden="true">
                  <span>{item.year}</span>
                </div>
                <div className="neo-roadmap-block">
                  <p className="neo-roadmap-label">{item.label}</p>
                  <h3>{item.title}</h3>
                  <p>{item.summary}</p>
                </div>
              </article>
            ))}
          </div>
        </div>
      </section>

      <section id="testimonials" className="neo-section section-reveal">
        <div className="container">
          <div className="neo-section-head">
            <p className="neo-kicker">Testimonials</p>
            <h2>Trusted by operators and investors</h2>
          </div>

          <div className="neo-testimonial-shell">
            <article className="neo-testimonial-card">
              <p>{testimonials[testimonialIndex].quote}</p>
              <h3>{testimonials[testimonialIndex].name}</h3>
              <span>{testimonials[testimonialIndex].role}</span>
            </article>
            <div className="neo-testimonial-controls">
              <button
                type="button"
                onClick={() => setTestimonialIndex((prev) => (prev - 1 + testimonials.length) % testimonials.length)}
              >
                Previous
              </button>
              <button
                type="button"
                onClick={() => setTestimonialIndex((prev) => (prev + 1) % testimonials.length)}
              >
                Next
              </button>
            </div>
          </div>
        </div>
      </section>

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

          <form className="neo-form" onSubmit={handleEnquirySubmit}>
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

      <footer className="neo-footer">
        <div className="container neo-footer-grid">
          <div>
            <h3>{brandName}</h3>
            <p>Premium EV-tech, investment intelligence, and execution advisory for next-generation growth.</p>
            <div className="neo-socials">
              <a href="https://www.linkedin.com" aria-label="LinkedIn"><i className="bi bi-linkedin" /></a>
              <a href="https://www.instagram.com" aria-label="Instagram"><i className="bi bi-instagram" /></a>
              <a href="https://www.youtube.com" aria-label="YouTube"><i className="bi bi-youtube" /></a>
            </div>
          </div>

          <div>
            <h4>Company</h4>
            <a href="#about">About</a>
            <a href="#services">Services</a>
            <a href="#roadmap">Roadmap</a>
            <a href="#contact">Contact</a>
          </div>

          <div>
            <h4>Contact</h4>
            <p>+91 89825 29261</p>
            <p>support@pmswala.com</p>
            <p>India</p>
          </div>

          <div>
            <h4>Newsletter</h4>
            <p>Get EV-tech and investment insights monthly.</p>
            <form className="neo-newsletter" onSubmit={(event) => event.preventDefault()}>
              <input type="email" placeholder="Enter email" aria-label="Email" required />
              <button type="submit">Subscribe</button>
            </form>
          </div>
        </div>
      </footer>
    </main>
  );
}

