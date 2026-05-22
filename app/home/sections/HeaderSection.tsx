import { NavLink } from "../content";

type HeaderSectionProps = {
  brandName: string;
  navLinks: NavLink[];
  activeSection: string;
  mobileOpen: boolean;
  onToggleMobile: () => void;
  onCloseMobile: () => void;
};

export function HeaderSection({
  brandName,
  navLinks,
  activeSection,
  mobileOpen,
  onToggleMobile,
  onCloseMobile
}: HeaderSectionProps) {
  return (
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
              onClick={onCloseMobile}
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
            onClick={onToggleMobile}
            aria-label="Toggle navigation"
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
