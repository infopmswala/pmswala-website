import PublicFrame from "@/components/PublicFrame";
import ContactForm from "@/components/ContactForm";
import { getLegacySiteData } from "@/lib/legacy-content";

export default async function ContactPage() {
  const site = await getLegacySiteData().catch(() => ({ settings: null, informationPages: [] }));

  return (
    <PublicFrame>
      <main className="main">
        <div className="site-breadcrumb" style={{ background: "url(/assets/frontend/img/contact.jpg)" }}>
          <div className="container">
            <div className="site-breadcrumb-wpr">
              <h2 className="breadcrumb-title">Contact Us</h2>
              <ul className="breadcrumb-menu clearfix">
                <li><a href="/">Home</a></li>
                <li className="active">Contact Us</li>
              </ul>
            </div>
          </div>
        </div>

        <div className="contact-area de-padding">
          <div className="container">
            <div className="contact-wpr">
              <div className="row g-5">
                <div className="col-xl-4">
                  <div className="contact-sdebar">
                    <div className="contact-up-title">
                      <h2 className="heading-1">Get in Touch</h2>
                      <p className="mb-0">Send us your details and we will get back to you shortly.</p>
                    </div>
                    <div className="addr-home">
                      <div className="addr-box">
                        <div className="addr-box-single">
                          <div className="addr-icon"><i className="icofont-google-map" /></div>
                          <div className="addr-desc">
                            <h5>Location</h5>
                            <p className="mb-0">{site.settings?.address || ""}</p>
                          </div>
                        </div>
                        <div className="addr-box-single">
                          <div className="addr-icon"><i className="icofont-phone" /></div>
                          <div className="addr-desc">
                            <h5>Make a Call</h5>
                            <a href={`tel:${site.settings?.phone || ""}`}>{site.settings?.phone || ""}</a>
                          </div>
                        </div>
                        <div className="addr-box-single">
                          <div className="addr-icon"><i className="icofont-email" /></div>
                          <div className="addr-desc">
                            <h5>Our Email</h5>
                            <a href={`mailto:${site.settings?.email || ""}`}>{site.settings?.email || ""}</a>
                            {site.settings?.emailTwo ? <a href={`mailto:${site.settings.emailTwo}`}>{site.settings.emailTwo}</a> : null}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="col-xl-8">
                  <div className="contact-home pl-30">
                    <ContactForm />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        {site.settings?.about ? (
          <div className="g-map-area">
            <div className="g-map--wrapper text-center">
              <iframe
                src={site.settings.about}
                width="100%"
                height="450"
                style={{ border: 0 }}
                loading="lazy"
                referrerPolicy="no-referrer-when-downgrade"
              />
            </div>
          </div>
        ) : null}
      </main>
    </PublicFrame>
  );
}
