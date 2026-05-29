import type { Metadata } from "next";
import { LegalChrome } from "../legal/LegalChrome";
import { PrintAgreementButton } from "./PrintAgreementButton";

export const metadata: Metadata = {
  title: "User Agreement | PMSWALA",
  description: "Purchaser Services Agreement for PMSWALA users"
};

const agreementHtml = `
  <p style="text-align:center;"><strong>PURCHASER SERVICES AGREEMENT</strong></p>
  <p>This purchaser services agreement ("Agreement") is executed on _____________ at Hyderabad by and between:</p>

  <p>I "_______________________________", holding PAN card "__________________" residing at "______________________________________________________________________" (hereinafter referred to as the "Purchaser", which expression shall, unless repugnant to the context or meaning thereof, be deemed to mean and include its successors and permitted assigns / his/her heirs, successors, administrators, executors and permitted assigns, as applicable), of the FIRST PART;</p>

  <p><strong>AND</strong></p>

  <p>"Capsure Wealth Advisory", incorporated pursuant to section 12(1) of the Limited Liability Partnership Act 2008, and having its registered office at "502, Jain Sadguru Image's Capital Park, Capital Park Road, VIP Hills, Madhapur, Hyderabad, Telangana - 500081" (hereinafter referred to as "PMSWALA" which expression shall, unless repugnant to the context or meaning thereof, mean and include its successors and assigns), of the SECOND PART;</p>

  <p><strong>WHEREAS:</strong></p>
  <p>A. PMSWALA operates an online technology platform at www.pmswala.com ("Platform"), and is engaged in the business of providing advisory services in respect of various asset classes after making thorough due diligence.</p>
  <p>B. The Investor has approached PMSWALA to avail advisory services relating to future investments and thereafter PMSWALA has informed and made aware about various asset classes to invest wherein desired return can be provided.</p>
  <p>C. The investor after reviewing various investment proposal portfolios under PMSWALA has decided to enter into this investment agreement with the company so as to avail advisory services of the company in respect of their investment.</p>
  <p>D. In view of the aforesaid and to record the terms discussed between both parties, the parties have decided to enter into this Agreement.</p>

  <p><strong>NOW THEREFORE THE PARTIES HERETO AGREE AS FOLLOWS:</strong></p>

  <h2>1. DEFINITIONS AND INTERPRETATION</h2>
  <h3>1.1 Definitions</h3>
  <p>In this Agreement, the following capitalized words shall have the following meanings:</p>
  <p><strong>"Agreement":</strong> Means this Agreement as may be amended from time to time in accordance with its terms.</p>
  <p><strong>"Business Day":</strong> Means following:</p>
  <p>(a) for determining when a notice, consent or other communication is given, a day that is not a Sunday or public holiday in the place to which the notice, consent or other communication is sent.</p>
  <p>(b) for any other purpose, a day (other than a Sunday or public holiday) on which banks are open for general banking business in Hyderabad.</p>
  <p><strong>"Investment":</strong> Means the amount of money that the investor will be investing in various asset classes as per suitability and risk profile.</p>
  <p><strong>"Tenure of Investment":</strong> Means the period for which the investor shall invest the amount.</p>

  <h3>1.2 Other Terms</h3>
  <p>Other terms may be defined elsewhere in the text of this Agreement and, unless otherwise indicated, shall have such meaning throughout this Agreement.</p>

  <h3>1.3 Interpretation</h3>
  <p>In this Agreement, unless otherwise specified:</p>
  <p>(a) headings, sections, parts and paragraphs are for ease of reference only and do not affect interpretation of this Agreement.</p>
  <p>(b) references to this Agreement or any other document shall be construed as references to that document as amended, varied, novated, supplemented or replaced from time to time.</p>
  <p>(c) references to any recital, clause, paragraph or annexure are to those contained in this Agreement and annexures form an integral part of this Agreement.</p>
  <p>(d) reference to any law includes all relevant subordinate instruments and any law which replaces, re-enacts, amends or consolidates such law.</p>
  <p>(e) no term of the Agreement is to be read against a party because the term was first proposed or drafted by that party.</p>
  <p>(f) the words "include" and "including" are illustrative and do not limit the generality of preceding words.</p>

  <h2>2. Investment</h2>
  <p>The Investor has assessed various asset classes after discussion with the Company and has decided to invest in PMSWALA for the following portfolio:</p>

  <table>
    <tbody>
      <tr><td>Investment Details</td><td>Particulars</td></tr>
      <tr><td>Name of the Portfolio</td><td></td></tr>
      <tr><td>Investment Amount</td><td></td></tr>
      <tr><td>Return on Investment</td><td></td></tr>
      <tr><td>Investment Tenure</td><td></td></tr>
      <tr><td>Lock-In Tenure on Investment</td><td></td></tr>
      <tr><td>Maturity Date</td><td></td></tr>
      <tr><td>Maturity Amount</td><td></td></tr>
    </tbody>
  </table>

  <p>The Investment Amount is made through online transfer approved by the Reserve Bank of India (RBI), as agreed by both parties.</p>
  <p>Amounts withdrawn before maturity will be subject to a premature withdrawal deduction of 2% of the investment amount.</p>

  <h2>3. Investment Purpose and Tenure</h2>
  <p>The investment shall be made into various asset classes to provide maximum return to the investor and at all times the funds invested shall be used for legitimate purposes only. The tenure of the investment shall be based on the investor-selected portfolio from the date of receipt of funds. The Investment Amount shall be utilized by the Company for the following purposes:</p>
  <p>(1) To identify investment areas as per investor preference and invest funds accordingly.</p>
  <p>(2) To focus on asset classes that provide security to investment and have a good return track record.</p>

  <h2>4. Nature of the Investment</h2>
  <p>The investment made by the investor shall be in the form of debt only on PMSWALA and the investor will be solely responsible for deployment of funds into various asset classes. The investor shall not have any right or claim to equity shares of the Company or ownership in the Company.</p>

  <h2>5. Terms of the Investment</h2>
  <p>(a) <strong>Return on Investment:</strong> Overall return on the investment shall be payable annually. Return shall be paid at completion of the investment tenure.</p>
  <p>(b) <strong>Lock-in Period:</strong> Investment shall be locked in for a minimum period of 6 (six) months to 1 (one) year from receipt of funds depending upon the portfolio, and the investor cannot apply for premature withdrawal during lock-in.</p>
  <p>(c) <strong>Liquidation Preference:</strong> In the event of liquidation or sale of the Company, the Investor shall be entitled to receive first proceeds up to the Investment Amount before distributions to holders of common shares.</p>
  <p>(d) <strong>Voting Rights:</strong> The Investor shall not have voting rights, which are entitled only to equity holders.</p>
  <p>(e) <strong>Conversion into Equity:</strong> Investment made by the investor shall not be converted into equity shares of the Company.</p>
  <p>(f) <strong>Premature Repayment/Closure:</strong> Premature repayment or closure by the Company is possible and shall be intimated to the investor. Return shall be adjusted as per tenure of investment made.</p>

  <h2>6. Use of Funds</h2>
  <p>The Investment Amount shall be used solely for the purposes stated under this Agreement.</p>

  <h2>7. Events of Default</h2>
  <p>The occurrence of one or more of the following shall be an Event of Default:</p>
  <p>(i) When the Company fails to pay, when due, any investment amount to the investor, whether at stated maturity;</p>
  <p>(ii) Any committed return, fee, or other amount due hereunder after the due date.</p>

  <h2>8. Fees and Charges of the Company</h2>
  <p>The Company levies the following advisory fees on returns generated for clients:</p>

  <table>
    <tbody>
      <tr><td>Expected Returns to Investor (%)</td><td>Advisory Fees (%)</td></tr>
      <tr><td>Returns in the range of 13-15%</td><td>2%</td></tr>
      <tr><td>Returns in the range of 16-20%</td><td>3.5%</td></tr>
      <tr><td>Returns in the range of 21-22%</td><td>5%</td></tr>
    </tbody>
  </table>

  <p>The advisory fees shall be levied on returns generated for the client in respect of their investment with the Company. The Company does not levy any other fees and charges in respect of services.</p>

  <h2>9. General Provisions</h2>
  <h3>9.1 Variation</h3>
  <p>No variation of this Agreement shall be binding unless recorded in writing and executed by relevant parties.</p>

  <h3>9.2 Severability</h3>
  <p>If any provision is invalid, unenforceable or prohibited by law, such provision shall be inoperative and remainder of this Agreement shall remain valid and binding.</p>

  <h3>9.3 Force Majeure</h3>
  <p>Obligations of any party shall be suspended while such party is prevented or hindered from compliance due to causes beyond reasonable control. The affected party shall provide prompt written notice and parties shall discuss remedial actions within stipulated timelines.</p>
  <p>Force Majeure includes:</p>
  <p>(a) acts of God, including fire, storms, floods, earthquake, lightning;</p>
  <p>(b) war, hostilities, terrorist acts, riots, civil commotion, adverse governmental action, embargoes, sabotage, explosions;</p>
  <p>(c) strikes, lockouts or industrial action;</p>
  <p>(d) other events beyond reasonable control of affected party.</p>

  <h3>9.4 Notices</h3>
  <p>Any notice or communication under this Agreement shall be in writing and signed by or on behalf of the issuing party and served by permitted means as specified in this Agreement.</p>

  <h3>9.5 Governing Law and Dispute Resolution</h3>
  <p>This Agreement shall be governed by laws of India and courts at Hyderabad shall have exclusive jurisdiction.</p>
  <p>Any dispute shall be referred to a sole arbitrator appointed by the Lender only. Place of arbitration shall be Hyderabad and proceedings governed by the Arbitration and Conciliation Act, 1996, in English language. The award shall be binding, subject to applicable law.</p>

  <p><strong>IN WITNESS WHEREOF</strong> both parties have executed this Agreement on the day, month and year first above written.</p>

  <table>
    <tbody>
      <tr>
        <td><strong>For COMPANY</strong></td>
        <td><strong>For INVESTOR</strong></td>
      </tr>
      <tr>
        <td><br /><br /><br /><br />(Authorized Signatory)</td>
        <td><br /><br /><br /><br />(Investor Signature)</td>
      </tr>
      <tr>
        <td>Company Name: Capsure Wealth Advisory</td>
        <td>Investor Name:</td>
      </tr>
      <tr>
        <td>Designation: Director</td>
        <td>Designation: Investor</td>
      </tr>
      <tr>
        <td>Date:</td>
        <td>Date:</td>
      </tr>
    </tbody>
  </table>
`;

export default function UserAgreementPage() {
  return (
    <LegalChrome activeSection="agreement">
      <section className="neo-section neo-legal-header section-reveal">
        <div className="container">
          <p className="neo-kicker">Legal</p>
          <h1>User Agreement</h1>
          <p className="neo-muted-copy">
            Purchaser Services Agreement between investor and PMSWALA for advisory and investment-related services.
          </p>
          <span className="neo-legal-meta">Last Updated: May 29, 2026</span>
          <PrintAgreementButton />
        </div>
      </section>

      <section className="neo-section section-reveal" style={{ paddingTop: 24 }}>
        <div className="container">
          <article className="neo-legal-block neo-legal-document" dangerouslySetInnerHTML={{ __html: agreementHtml }} />
        </div>
      </section>
    </LegalChrome>
  );
}
