import type { Metadata } from "next";
import { LegalChrome } from "../legal/LegalChrome";

export const metadata: Metadata = {
  title: "Terms and Conditions | PMSWALA",
  description: "Terms and Conditions for PMSWALA website and advisory services"
};

const termsSections = [
  {
    id: "introduction",
    title: "Introduction",
    body: "The terms presented here, alongside the disclaimer and privacy policy, serve as the agreement governing visitors' use of the Capsure Wealth Advisory website (www.pmswala.com). By accessing, viewing, or using this site, visitors acknowledge having read, understood, and agreed to these terms. If you do not wish to be bound by these terms, please refrain from using this site. Continued access or use of this site or any service on it signifies acceptance of these terms and conditions. These terms and conditions are subject to change without notice at the sole discretion of pmswala.com. Amendments to these terms will be communicated to visitors by posting them on this website."
  },
  {
    id: "registration",
    title: "Registration",
    body: "Users of this website must register their profile with pmswala.com and create their account by providing the necessary information."
  },
  {
    id: "scope-of-the-terms-and-conditions",
    title: "Scope of the Terms and Conditions",
    body: "These terms, as amended by pmswala.com, establish the basis for visitors' use of this website and provide information about the services offered by pmswala.com, including data aggregation of Asset Management Companies and information on financial products and services for Individual Users."
  },
  {
    id: "acceptance-of-terms-of-use",
    title: "Acceptance of Terms of Use",
    body: "This Agreement is an electronic contract that establishes the legally binding terms visitors must accept to use the Website."
  },
  {
    id: "links-to-third-party-websites",
    title: "Links to Third-party Websites",
    body: "Visitors agree not to hold pmswala.com responsible for the content or operation of third-party sites linked to this website. A hyperlink from this website to another does not imply endorsement by pmswala.com. Visitors are solely responsible for determining the extent to which they may use content from linked websites."
  },
  {
    id: "use-of-the-website",
    title: "Use of the Website",
    body: "Visitors are prohibited from using this website in a manner that causes damage, impairs accessibility, or is unlawful, illegal, fraudulent, or harmful. Use for marketing purposes without express written consent is prohibited. Visitors are responsible for suitable computer equipment and software for access. Personal, non-commercial use of this website and its services is permitted. Creating links to this website requires prior written consent. Misuse may result in account suspension without notification."
  },
  {
    id: "intellectual-property-rights",
    title: "Intellectual Property Rights",
    body: "All information, text, tools, and data format on this website are the exclusive properties of pmswala.com. Visitors may only view information on this website. They or their Financial Advisors are not permitted to print, copy, download, or store it for commercial purposes."
  },
  {
    id: "indemnification",
    title: "Indemnification",
    body: "Visitors agree to indemnify pmswala.com against any losses, damages, costs, or liabilities arising from breach of these terms and conditions."
  },
  {
    id: "assignment",
    title: "Assignment",
    body: "Rights granted to visitors and obligations incurred under these terms and conditions are personal and may not be transferred to any third party. pmswala.com may, at any time, subcontract obligations or transfer rights without consent."
  },
  {
    id: "variation-of-these-terms-and-conditions",
    title: "Variation of these Terms and Conditions",
    body: "pmswala.com reserves the right to vary these terms and conditions at its discretion. Visitors' continued use implies acceptance of amended terms."
  },
  {
    id: "unauthorized-use",
    title: "Unauthorized Use",
    body: "Visitors are responsible for their use of the website. Unauthorized use may lead to legal action. Website use may be monitored, tracked, and recorded."
  },
  {
    id: "access-to-the-website",
    title: "Access to the Website",
    body: "pmswala.com reserves the right to withdraw or amend services without notice. pmswala.com is not liable for any website unavailability."
  },
  {
    id: "entire-agreement",
    title: "Entire Agreement",
    body: "These terms and conditions, together with the Privacy Policy and Disclaimer, constitute the entire agreement between pmswala.com and visitors in relation to website use, superseding previous agreements."
  },
  {
    id: "severability",
    title: "Severability",
    body: "If any part of these terms and conditions is deemed unlawful, void, or unenforceable, that part will be deemed severable and will not affect the validity and enforceability of any remaining provisions."
  },
  {
    id: "waiver",
    title: "Waiver",
    body: "pmswala.com's failure to exercise any right or remedy does not constitute waiver of that right."
  },
  {
    id: "applicable-laws",
    title: "Applicable Laws",
    body: "These terms and conditions will be governed by and construed in accordance with Indian laws, and any disputes relating to them will be subject to the non-exclusive jurisdiction of the Courts of Telangana, India."
  },
  {
    id: "term",
    title: "Term",
    body: "This Agreement is for an indefinite term. Either pmswala.com or the Visitor can terminate this Agreement for any reason, subject to fulfilling all contractual and statutory obligations."
  }
];

export default function TermsPage() {
  return (
    <LegalChrome activeSection="terms">
      <section className="neo-section neo-legal-header section-reveal">
        <div className="container">
          <p className="neo-kicker">Legal</p>
          <h1>Terms and Conditions</h1>
          <p className="neo-muted-copy">
            These terms govern your use of www.pmswala.com and related services.
          </p>
          <span className="neo-legal-meta">Last Updated: May 29, 2026</span>
        </div>
      </section>

      <section className="neo-section section-reveal" style={{ paddingTop: 24 }}>
        <div className="container neo-legal-grid">
          <aside className="neo-legal-toc" aria-label="Terms table of contents">
            <h2>In This Document</h2>
            <ol>
              {termsSections.map((section) => (
                <li key={section.id}>
                  <a href={`#${section.id}`}>{section.title}</a>
                </li>
              ))}
            </ol>
          </aside>

          <div className="neo-legal-stack">
            {termsSections.map((section) => (
              <article key={section.id} id={section.id} className="neo-legal-block">
                <h2>{section.title}</h2>
                <p>{section.body}</p>
              </article>
            ))}

            <a href="/" className="neo-legal-back" aria-label="Back to homepage">
              <i className="bi bi-arrow-left" aria-hidden="true" />
              Back to Homepage
            </a>
          </div>
        </div>
      </section>

    </LegalChrome>
  );
}
