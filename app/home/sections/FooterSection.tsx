type FooterSectionProps = {
  brandName: string;
};

export function FooterSection({ brandName }: FooterSectionProps) {
  return (
    <footer className="neo-footer">
      <div className="container neo-footer-grid">
        <div>
          <h3>{brandName}</h3>
          <p>Premium EV-tech, investment intelligence, and execution advisory for next-generation growth.</p>
          <div className="neo-socials">
            <a href="https://www.linkedin.com" aria-label="LinkedIn"><i className="bi bi-linkedin" /></a>
            <a href="https://www.instagram.com" aria-label="Instagram"><i className="bi bi-instagram" /></a>
            <a href="https://www.youtube.com" aria-label="YouTube"><i className="bi bi-youtube" /></a>
          </div>
        </div>

        <div>
          <h4>Company</h4>
          <a href="#about">About</a>
          <a href="#services">Services</a>
          <a href="#roadmap">Roadmap</a>
          <a href="#contact">Contact</a>
        </div>

        <div>
          <h4>Contact</h4>
          <p>+91 89825 29261</p>
          <p>support@pmswala.com</p>
          <p>India</p>
        </div>

        <div>
          <h4>Newsletter</h4>
          <p>Get EV-tech and investment insights monthly.</p>
          <form className="neo-newsletter" onSubmit={(event) => event.preventDefault()}>
            <input type="email" placeholder="Enter email" aria-label="Email" required />
            <button type="submit">Subscribe</button>
          </form>
        </div>
      </div>
    </footer>
  );
}
