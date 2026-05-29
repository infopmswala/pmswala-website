"use client";

import { FormEvent, useEffect, useState } from "react";
import {
  aboutContent,
  aboutTimeline,
  brandName,
  contactContent,
  featuresContent,
  featureCards,
  footerContent,
  headerContent,
  heroContent,
  heroStats,
  navLinks,
  plansContent,
  plans,
  roadmapContent,
  roadmap,
  servicesContent,
  services,
  testimonialsContent,
  testimonials
} from "./home/content";
import { AboutSection } from "./home/sections/AboutSection";
import { ContactSection } from "./home/sections/ContactSection";
import { FeaturesSection } from "./home/sections/FeaturesSection";
import { FooterSection } from "./home/sections/FooterSection";
import { HeaderSection } from "./home/sections/HeaderSection";
import { HeroSection } from "./home/sections/HeroSection";
import { PlansSection } from "./home/sections/PlansSection";
import { RoadmapSection } from "./home/sections/RoadmapSection";
import { ServicesSection } from "./home/sections/ServicesSection";
import { TestimonialsSection } from "./home/sections/TestimonialsSection";

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

      <HeaderSection
        brandName={brandName}
        headerContent={headerContent}
        navLinks={navLinks}
        activeSection={activeSection}
        mobileOpen={mobileOpen}
        onToggleMobile={() => setMobileOpen((open) => !open)}
        onCloseMobile={() => setMobileOpen(false)}
      />
      <HeroSection heroStats={heroStats} heroContent={heroContent} />
      <FeaturesSection featureCards={featureCards} featuresContent={featuresContent} />
      <AboutSection brandName={brandName} aboutContent={aboutContent} aboutTimeline={aboutTimeline} />
      <ServicesSection servicesContent={servicesContent} services={services} />
      <PlansSection plansContent={plansContent} plans={plans} />
      <RoadmapSection roadmapContent={roadmapContent} roadmap={roadmap} />
      <TestimonialsSection
        testimonialsContent={testimonialsContent}
        testimonials={testimonials}
        testimonialIndex={testimonialIndex}
        onSelect={setTestimonialIndex}
        onPrev={() => setTestimonialIndex((prev) => (prev - 1 + testimonials.length) % testimonials.length)}
        onNext={() => setTestimonialIndex((prev) => (prev + 1) % testimonials.length)}
      />
      <ContactSection contactContent={contactContent} enquirySent={enquirySent} onSubmit={handleEnquirySubmit} />
      <FooterSection brandName={brandName} footerContent={footerContent} />
    </main>
  );
}

