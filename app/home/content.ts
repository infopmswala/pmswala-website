export type NavLink = {
  label: string;
  href: string;
  id: string;
};

export type HeroStat = {
  value: string;
  label: string;
};

export type FeatureCard = {
  icon: string;
  title: string;
  copy: string;
  tone: "emerald" | "blue";
};

export type Service = {
  title: string;
  description: string;
  image: string;
  icon: string;
};

export type AboutTimelineItem = {
  year: string;
  title: string;
  text: string;
};

export type Plan = {
  name: string;
  price: string;
  period: string;
  description: string;
  points: string[];
  recommended: boolean;
};

export type RoadmapItem = {
  year: string;
  title: string;
  label: string;
  summary: string;
};

export type Testimonial = {
  quote: string;
  name: string;
  role: string;
};

export type LinkItem = {
  label: string;
  href: string;
};

export type HeroContent = {
  kicker: string;
  title: string;
  description: string;
  primaryCta: LinkItem;
  secondaryCta: LinkItem;
  panelImage: string;
  panelImageAlt: string;
  panelTitle: string;
  panelDescription: string;
  panelTags: string[];
};

export type SectionHeadingContent = {
  kicker: string;
  title: string;
};

export type AboutContent = {
  title: string;
  description: string;
  image: string;
  imageAlt: string;
};

export type ServicesContent = SectionHeadingContent & {
  cardCtaLabel: string;
};

export type PlansContent = SectionHeadingContent & {
  recommendedLabel: string;
  cardCtaLabel: string;
};

export type RoadmapContent = SectionHeadingContent & {
  description: string;
  ariaLabel: string;
};

export type TestimonialsContent = SectionHeadingContent & {
  prevLabel: string;
  nextLabel: string;
};

export type ContactServiceOption = {
  value: string;
  label: string;
};

export type ContactContent = SectionHeadingContent & {
  description: string;
  mapImage: string;
  mapImageAlt: string;
  nameLabel: string;
  namePlaceholder: string;
  emailLabel: string;
  emailPlaceholder: string;
  serviceLabel: string;
  servicePlaceholder: string;
  serviceOptions: ContactServiceOption[];
  messageLabel: string;
  messagePlaceholder: string;
  submitLabel: string;
  successMessage: string;
};

export type HeaderContent = {
  logoImage: string;
  homeHref: string;
  ctaLabel: string;
  ctaHref: string;
  navAriaLabel: string;
  menuAriaLabel: string;
};

export type SocialLink = {
  href: string;
  ariaLabel: string;
  iconClass: string;
};

export type FooterContent = {
  description: string;
  companyHeading: string;
  companyLinks: LinkItem[];
  contactHeading: string;
  phone: string;
  email: string;
  country: string;
  newsletterHeading: string;
  newsletterText: string;
  newsletterPlaceholder: string;
  newsletterAriaLabel: string;
  newsletterButtonLabel: string;
  socialLinks: SocialLink[];
};

export const brandName = "PMSWALA";

export const navLinks: NavLink[] = [
  { label: "Home", href: "#home", id: "home" },
  { label: "Features", href: "#features", id: "features" },
  { label: "About", href: "#about", id: "about" },
  { label: "Services", href: "#services", id: "services" },
  { label: "Plans", href: "#plans", id: "plans" },
  { label: "Roadmap", href: "#roadmap", id: "roadmap" },
  { label: "Contact", href: "#contact", id: "contact" }
];

export const headerContent: HeaderContent = {
  logoImage: "/assets/frontend/img/logo/logo.png",
  homeHref: "#home",
  ctaLabel: "Invest Now",
  ctaHref: "https://pmswalaweb.firebaseapp.com/",
  navAriaLabel: "Main navigation",
  menuAriaLabel: "Toggle navigation"
};

export const heroContent: HeroContent = {
  kicker: "Innovation on Every Charge",
  title: "Future-ready EV Infrastructure and Investment Intelligence.",
  description:
    "We design profitable EV charging growth and investor-grade decision systems for founders, operators, and institutions building the next energy economy.",
  primaryCta: {
    label: "View Plans",
    href: "#plans"
  },
  secondaryCta: {
    label: "Explore Services",
    href: "#services"
  },
  panelImage: "/assets/frontend/img/ui/banner.jpg",
  panelImageAlt: "EV futuristic visual",
  panelTitle: "Investor-Grade Command Layer",
  panelDescription: "Premium insights for EV operations, seized assets, and strategic deployment decisions.",
  panelTags: ["AI Feasibility", "Risk Control", "Multi-City Ready"]
};

export const featuresContent: SectionHeadingContent = {
  kicker: "Platform Features",
  title: "Built for EV-tech startups and serious investors"
};

export const heroStats: HeroStat[] = [
  { value: "15K+", label: "Charging Sessions" },
  { value: "98%", label: "Platform Uptime" },
  { value: "4.9/5", label: "Investor Confidence" },
  { value: "12", label: "Operational Cities" }
];

export const featureCards: FeatureCard[] = [
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

export const services: Service[] = [
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

export const aboutTimeline: AboutTimelineItem[] = [
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

export const aboutContent: AboutContent = {
  title: "From advisory roots to EV-tech execution leadership",
  description:
    "We combine startup speed with institutional clarity. The mission is simple: help clients make sharper infrastructure and capital decisions with confidence, transparency, and long-term value.",
  image: "/assets/frontend/img/about.jpg",
  imageAlt: "Strategy discussion"
};

export const servicesContent: ServicesContent = {
  kicker: "Services",
  title: "Conversion-focused strategic services",
  cardCtaLabel: "Discuss Project"
};

export const plans: Plan[] = [
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

export const plansContent: PlansContent = {
  kicker: "Investment Plans",
  title: "Premium advisory plans built for growth",
  recommendedLabel: "Recommended",
  cardCtaLabel: "Choose Plan"
};

export const roadmap: RoadmapItem[] = [
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

export const roadmapContent: RoadmapContent = {
  kicker: "Roadmap",
  title: "What we built over the last five years",
  description:
    "A clear growth path showing how PMSWALA moved from advisory foundations to a more complete execution, assets, and EV strategy platform.",
  ariaLabel: "PMSWALA growth path roadmap"
};

export const testimonials: Testimonial[] = [
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

export const testimonialsContent: TestimonialsContent = {
  kicker: "Testimonials",
  title: "Trusted by operators and investors",
  prevLabel: "Previous",
  nextLabel: "Next"
};

export const contactContent: ContactContent = {
  kicker: "Contact",
  title: "Build your next EV growth chapter",
  description:
    "Share your project goals. Our team will design an execution-focused plan for infrastructure and investment outcomes.",
  mapImage: "/assets/frontend/img/ui/track-illustration1.png",
  mapImageAlt: "Map visual",
  nameLabel: "Name",
  namePlaceholder: "Your full name",
  emailLabel: "Email",
  emailPlaceholder: "name@company.com",
  serviceLabel: "Service Interest",
  servicePlaceholder: "Select a service",
  serviceOptions: [
    { value: "ev", label: "EV Charging Advisory" },
    { value: "investment", label: "Investment Strategy" },
    { value: "asset", label: "Seized Asset Intelligence" }
  ],
  messageLabel: "Message",
  messagePlaceholder: "Tell us what you are building",
  submitLabel: "Send Enquiry",
  successMessage: "Thank you. Our team will contact you shortly."
};

export const footerContent: FooterContent = {
  description: "Premium EV-tech, investment intelligence, and execution advisory for next-generation growth.",
  companyHeading: "Company",
  companyLinks: [
    { label: "About", href: "#about" },
    { label: "Services", href: "#services" },
    { label: "Roadmap", href: "#roadmap" },
    { label: "Terms & Conditions", href: "/terms" },
    { label: "Privacy Policy", href: "/privacy" },
    { label: "Disclaimer", href: "/disclaimer" },
    { label: "User Agreement", href: "/user-agreement" },
    { label: "Contact", href: "#contact" }
  ],
  contactHeading: "Contact",
  phone: "+91 72249 59561",
  email: "infopmswala@gmail.com",
  country: "India",
  newsletterHeading: "Newsletter",
  newsletterText: "Get EV-tech and investment insights monthly.",
  newsletterPlaceholder: "Enter email",
  newsletterAriaLabel: "Email",
  newsletterButtonLabel: "Subscribe",
  socialLinks: [
    { href: "https://www.linkedin.com", ariaLabel: "LinkedIn", iconClass: "bi bi-linkedin" },
    { href: "https://www.instagram.com", ariaLabel: "Instagram", iconClass: "bi bi-instagram" },
    { href: "https://www.youtube.com", ariaLabel: "YouTube", iconClass: "bi bi-youtube" }
  ]
};
