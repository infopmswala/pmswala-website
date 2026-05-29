import { HeaderContent, NavLink } from "../content";

type HeaderSectionProps = {
  brandName: string;
  headerContent: HeaderContent;
  navLinks: NavLink[];
  activeSection: string;
  mobileOpen: boolean;
  onToggleMobile: () => void;
  onCloseMobile: () => void;
};

export function HeaderSection({
  brandName,
  headerContent,
  navLinks,
  activeSection,
  mobileOpen,
  onToggleMobile,
  onCloseMobile
}: HeaderSectionProps) {
  return (
    <header className="neo-header">
      <div className="container neo-header-row">
        <a href={headerContent.homeHref} className="neo-logo">
          <img src={headerContent.logoImage} alt={brandName} />
          <span>{brandName}</span>
        </a>

        <nav className={`neo-nav ${mobileOpen ? "open" : ""}`} aria-label={headerContent.navAriaLabel}>
          {navLinks.map((item) => (
            <a
              key={item.id}
              href={item.href}
              className={activeSection === item.id ? "active" : ""}
              onClick={onCloseMobile}
            >
              {item.label}
            </a>
          ))}
        </nav>

        <div className="neo-header-cta-wrap">
          <a href={headerContent.ctaHref} className="neo-btn neo-btn-primary">{headerContent.ctaLabel}</a>
          <button
            type="button"
            className="neo-menu-btn"
            onClick={onToggleMobile}
            aria-label={headerContent.menuAriaLabel}
            aria-expanded={mobileOpen}
          >
            <span />
            <span />
          </button>
        </div>
      </div>
    </header>
  );
}
