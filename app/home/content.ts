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
