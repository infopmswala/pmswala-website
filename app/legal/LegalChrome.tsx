"use client";

import { ReactNode, useState } from "react";
import { brandName, footerContent, headerContent, type NavLink } from "../home/content";
import { FooterSection } from "../home/sections/FooterSection";
import { HeaderSection } from "../home/sections/HeaderSection";

type LegalChromeProps = {
  activeSection: "terms" | "privacy" | "agreement" | "disclaimer";
  children: ReactNode;
};

const legalNavLinks: NavLink[] = [
  { label: "Home", href: "/", id: "home" },
  { label: "Terms", href: "/terms", id: "terms" },
  { label: "Privacy", href: "/privacy", id: "privacy" },
  { label: "Disclaimer", href: "/disclaimer", id: "disclaimer" },
  { label: "Agreement", href: "/user-agreement", id: "agreement" },
  { label: "Contact", href: "/#contact", id: "contact" }
];

export function LegalChrome({ activeSection, children }: LegalChromeProps) {
  const [mobileOpen, setMobileOpen] = useState(false);

  return (
    <main className="neo-page neo-legal-page">
      <HeaderSection
        brandName={brandName}
        headerContent={headerContent}
        navLinks={legalNavLinks}
        activeSection={activeSection}
        mobileOpen={mobileOpen}
        onToggleMobile={() => setMobileOpen((open) => !open)}
        onCloseMobile={() => setMobileOpen(false)}
      />

      {children}

      <FooterSection brandName={brandName} footerContent={footerContent} />
    </main>
  );
}
