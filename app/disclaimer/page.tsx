import type { Metadata } from "next";
import { LegalChrome } from "../legal/LegalChrome";

export const metadata: Metadata = {
  title: "Disclaimer | PMSWALA",
  description: "Website disclaimer for PMSWALA services and usage"
};

const disclaimerSections = [
  {
    id: "acceptance-and-modification",
    title: "Acceptance and Modification",
    body:
      "You agree and understand that the information and material contained in this website imply and constitute your consent to these terms. You also agree that PMSwala can modify or alter the terms and conditions of the use of this service without any liability."
  },
  {
    id: "investment-use-and-no-warranty",
    title: "Investment Use and No Warranty",
    body:
      "Users are advised to use the data for informational purposes only and rely on their own judgment while making investment decisions. Investments discussed or recommended may not be suitable for all investors. PMSwala does not warranty the electronic content's timeliness, accuracy, or quality."
  },
  {
    id: "proprietary-rights",
    title: "Proprietary Rights",
    body:
      "All proprietary rights in information received remain the property of PMSwala. Website content cannot be copied, reproduced, republished, uploaded, posted, transmitted, or distributed for non-personal use without prior permission from PMSwala. PMSwala may terminate accounts of subscribers/customers who violate proprietary rights and may take legal action."
  },
  {
    id: "limitation-of-liability",
    title: "Limitation of Liability",
    body:
      "PMSwala and its owners/affiliates are not liable for damages caused by any performance, failure of performance, error, omission, interruption, deletion, defect, delay in transmission or operations, computer virus, communications line failure, and unauthorized access to personal accounts. PMSwala is not responsible for technical failure or malfunctioning of software, delays of any kind, or non-receipt of registration details or emails."
  },
  {
    id: "linked-sites-and-profile-information",
    title: "Linked Sites and Profile Information",
    body:
      "PMSwala is not responsible for content of linked sites. By providing access to other websites, PMSwala is neither recommending nor endorsing linked content. Information gathered from your profile may be used to enhance website experience. PMSwala will not rent or sell profile data to third parties, but may disclose information in good faith for necessary credit checks and collection of payments."
  },
  {
    id: "jurisdiction-and-eligibility",
    title: "Jurisdiction and Eligibility",
    body:
      "This website is for transactions carried out within the territorial jurisdiction of India and all such transactions are governed by Indian laws. Non-Resident Indians (NRIs) and Foreign Nationals accessing this website and transacting must verify their eligibility independently. PMSwala undertakes no responsibility for such pre-eligibility or qualification."
  },
  {
    id: "contact",
    title: "Contact",
    body:
      "For feedback or concerns, kindly contact support@pmswala.com."
  }
];

export default function DisclaimerPage() {
  return (
    <LegalChrome activeSection="disclaimer">
      <section className="neo-section neo-legal-header section-reveal">
        <div className="container">
          <p className="neo-kicker">Legal</p>
          <h1>Disclaimer</h1>
          <p className="neo-muted-copy">
            By accessing and using this website, you acknowledge and agree to this disclaimer and related legal terms.
          </p>
          <span className="neo-legal-meta">Last Updated: May 29, 2026</span>
        </div>
      </section>

      <section className="neo-section section-reveal" style={{ paddingTop: 24 }}>
        <div className="container neo-legal-grid">
          <aside className="neo-legal-toc" aria-label="Disclaimer table of contents">
            <h2>In This Document</h2>
            <ol>
              {disclaimerSections.map((section) => (
                <li key={section.id}>
                  <a href={`#${section.id}`}>{section.title}</a>
                </li>
              ))}
            </ol>
          </aside>

          <div className="neo-legal-stack">
            {disclaimerSections.map((section) => (
              <article key={section.id} id={section.id} className="neo-legal-block">
                <h2>{section.title}</h2>
                <p>
                  {section.id === "contact" ? (
                    <>
                      For feedback or concerns, kindly contact{" "}
                      <a href="mailto:support@pmswala.com">support@pmswala.com</a>.
                    </>
                  ) : (
                    section.body
                  )}
                </p>
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
