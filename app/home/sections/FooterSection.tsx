import { FooterContent } from "../content";

type FooterSectionProps = {
  brandName: string;
  footerContent: FooterContent;
};

export function FooterSection({ brandName, footerContent }: FooterSectionProps) {
  return (
    <footer className="neo-footer">
      <div className="container neo-footer-grid">
        <div>
          <h3>{brandName}</h3>
          <p>{footerContent.description}</p>
          <div className="neo-socials">
            {footerContent.socialLinks.map((link) => (
              <a key={link.ariaLabel} href={link.href} aria-label={link.ariaLabel}>
                <i className={link.iconClass} />
              </a>
            ))}
          </div>
        </div>

        <div>
          <h4>{footerContent.companyHeading}</h4>
          {footerContent.companyLinks.map((link) => (
            <a key={link.href} href={link.href}>{link.label}</a>
          ))}
        </div>

        <div>
          <h4>{footerContent.contactHeading}</h4>
          <p>{footerContent.phone}</p>
          <p>{footerContent.email}</p>
          <p>{footerContent.country}</p>
        </div>
      </div>
    </footer>
  );
}
