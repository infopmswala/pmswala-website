import type { Metadata } from "next";
import { LegalChrome } from "../legal/LegalChrome";

export const metadata: Metadata = {
  title: "Privacy Policy | PMSWALA",
  description: "Privacy Policy for PMSWALA website and enquiry forms"
};

const privacySections = [
  {
    id: "using-pmswala-as-customer",
    title: "Using pmswala as a Customer",
    points: [
      "For first-time visitors:",
      "We collect technical data regarding your interaction with our Services.",
      "This includes information such as pages visited, IP address, device identifiers, operating system details, browser information, and cookies.",
      "We utilize this data to analyze website usage and enhance our services."
    ]
  },
  {
    id: "using-pmswala-as-registered-user",
    title: "Using pmswala as a Registered User",
    points: [
      "If you have provided your email or phone number, you are a registered user.",
      "Additional information may be requested to access certain features.",
      "You have the option to utilize Social Login, granting access to your name and email.",
      "We collect technical data on your interaction with the Services.",
      "This data is used for various purposes including responding to queries, delivering notices, offering products or services, market research, and enforcing agreements."
    ]
  },
  {
    id: "how-we-use-your-data",
    title: "How We Use Your Data",
    points: [
      "Your contact information is used to send updates.",
      "It may also be used to verify your identity.",
      "We employ cloud-based tools for various business functions, ensuring data security standards are upheld."
    ]
  },
  {
    id: "permitted-disclosures",
    title: "Permitted Disclosures",
    points: [
      "Your information may be disclosed for regulatory compliance, with your prior consent, or for the provision of services to authorized vendors."
    ]
  },
  {
    id: "access-your-information",
    title: "Access Your Information",
    points: [
      "You have the right to request a readable copy of your stored personal information."
    ]
  },
  {
    id: "security-practices",
    title: "Security Practices",
    points: [
      "We adhere to industry best practices for data security.",
      "Safeguard your account by keeping your password secure."
    ]
  },
  {
    id: "transmission-of-information",
    title: "Transmission of Information",
    points: [
      "Your data is transmitted using HTTPS protocol for encryption."
    ]
  },
  {
    id: "our-legal-obligation",
    title: "Our Legal Obligation",
    points: [
      "We comply with the (Indian) Information Technology Act, 2000 and its provisions."
    ]
  },
  {
    id: "changes-to-this-privacy-policy",
    title: "Changes to this Privacy Policy",
    points: [
      "This policy is updated periodically without prior notice.",
      "It is your responsibility to review and agree to any changes."
    ]
  }
];

export default function PrivacyPage() {
  return (
    <LegalChrome activeSection="privacy">
      <section className="neo-section neo-legal-header section-reveal">
        <div className="container">
          <p className="neo-kicker">Legal</p>
          <h1>Privacy Policy</h1>
          <p className="neo-muted-copy">
            Upon signing up for our Services or providing personal information for any other purpose, you acknowledge and agree to the terms outlined in this Privacy Policy.
          </p>
          <p className="neo-muted-copy">
            This policy explains the types of information we gather, why we collect it, how it is used, who receives it, and the safeguards used to protect it. For details, contact info@pmswala.com.
          </p>
          <p className="neo-muted-copy">
            For the purpose of this policy, personal information means any data that can identify you personally.
          </p>
          <span className="neo-legal-meta">Last Updated: May 29, 2026</span>
        </div>
      </section>

      <section className="neo-section section-reveal" style={{ paddingTop: 24 }}>
        <div className="container neo-legal-grid">
          <aside className="neo-legal-toc" aria-label="Privacy table of contents">
            <h2>In This Document</h2>
            <ol>
              {privacySections.map((section) => (
                <li key={section.id}>
                  <a href={`#${section.id}`}>{section.title}</a>
                </li>
              ))}
            </ol>
          </aside>

          <div className="neo-legal-stack">
            {privacySections.map((section) => (
              <article key={section.id} id={section.id} className="neo-legal-block">
                <h2>{section.title}</h2>
                <ul>
                  {section.points.map((point) => (
                    <li key={point}>{point}</li>
                  ))}
                </ul>
              </article>
            ))}

            <article className="neo-legal-block">
              <h2>Disagreement with Policy</h2>
              <p>
                If you disagree with this Privacy Policy or its updates, please cease using our Services and
                contact us.
              </p>
            </article>

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
