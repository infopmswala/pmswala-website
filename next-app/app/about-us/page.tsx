import { getLegacyHomeData } from "@/lib/legacy-content";
import PublicFrame from "@/components/PublicFrame";

export default async function AboutUsPage() {
  const content = await getLegacyHomeData().catch(() => null);

  return (
    <PublicFrame>
      <main className="main">
        <div className="site-breadcrumb" style={{ background: "url(/assets/frontend/img/aboutbg.jpg)" }}>
          <div className="container" style={{ marginTop: 20 }}>
            <div className="site-breadcrumb-wpr">
              <h2 className="breadcrumb-title">About Us</h2>
              <ul className="breadcrumb-menu clearfix">
                <li><a href="/">Home</a></li>
                <li className="active">About Us</li>
              </ul>
            </div>
          </div>
        </div>

        {content?.about ? (
          <div className="about-area-2 pt-100">
            <div className="container">
              <div className="about-wpr-2 grid-2">
                <div className="about-left-2">
                  <div className="about-left-pics-2 pos-rel">
                    <img src={content.about.image || "/assets/frontend/img/logo/aboutbg.jpg"} className="about-2-1" alt="no image" />
                    <div className="about-exp-yr pos-rel">
                      <div className="about-exp">
                        <h2 className="heading-2">3+</h2>
                        <h5 className="heading-5 mb-0">Years Experience</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div className="about-right-2 pl-30">
                  <div className="about-right-up mb-30">
                    <span className="hero-sub-title mb-20">
                      <span><img src="/assets/frontend/img/favicon.png" style={{ height: 30 }} alt="fav" /></span>
                      {content.about.title}
                    </span>
                    <h2 className="heading-1 mb-0">{content.about.subTitle}</h2>
                  </div>
                  <div className="mb-30" dangerouslySetInnerHTML={{ __html: content.about.description }} />
                </div>
              </div>
            </div>
          </div>
        ) : null}

        <div className="cta-area hero-overlay hero-bg de-pt cta-btm" style={{ background: "url(/assets/frontend/img/logo/aboutbg.jpg)" }}>
          <div className="container">
            <div className="cta-wpr grid-2">
              <div className="cta-left">
                <span className="hero-sub-title wh mb-20">
                  <span><img src="/assets/frontend/img/favicon.png" style={{ height: 30 }} alt="fav" /></span>
                  Get Consultation
                </span>
                <h2 className="heading-1 mb-0">Building your digital dream <br /> projects with us</h2>
              </div>
              <div className="cta-right center-right">
                <a href="/contact-us" className="btn-1 btn-md">Contact Us</a>
              </div>
            </div>
          </div>
        </div>

        {content?.stats?.length ? (
          <div className="counter-area counter-top-minus">
            <div className="container">
              <div className="counter-wpr hero-bg" style={{ backgroundImage: "url(/assets/frontend/img/shape/shape-1.png)" }}>
                <div className="counter-1 grid-4">
                  {content.stats.map((item) => (
                    <div key={item.title} className="fun-fact">
                      <div className="counter-icon"><i className={item.icon} /></div>
                      <div className="counter">
                        <div className="timer" data-to={item.timer} data-speed="2000" />
                        <div className="operator">{item.operator}</div>
                      </div>
                      <span className="medium">{item.title}</span>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          </div>
        ) : null}

        {content?.why ? (
          <div className="faq-area pos-rel de-padding">
            <div className="container">
              <div className="faq-wpr">
                <div className="row">
                  <div className="col-xl-6">
                    <div className="faq-pics pr-60">
                      <div className="faq-pic-2">
                        <img src={content.why.image || "/assets/frontend/img/logo/aboutbg.jpg"} alt="no image" width="100%" height="350" />
                      </div>
                    </div>
                  </div>
                  <div className="col-xl-6">
                    <div className="course-accordion">
                      <span className="hero-sub-title mb-20">
                        <span><img src="/assets/frontend/img/favicon.png" style={{ height: 30 }} alt="fav" /></span>
                        {content.why.title}
                      </span>
                      <h2 className="heading-1 mb-30">{content.why.subTitle}</h2>
                      <div dangerouslySetInnerHTML={{ __html: content.why.description }} />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        ) : null}

        <div className="container-fluid bg-dark de-padding mt-5 pb-5">
          <div className="container">
            <h2 className="pb-3 pt-2 text-center mb-5 text-white">Our History</h2>
            <div className="row align-items-center how-it-works">
              <div className="col-2 text-center bottom"><div className="circle">2021</div></div>
              <div className="col-6"><p>Company was established to offer specialized portfolio management services to a wide range of investors. We generates income by facilitating client investments. The firm's minimum investment requirement is modest to accommodate small investors. Minimum 25Lakh</p></div>
            </div>
            <div className="row timeline"><div className="col-2"><div className="corner top-right" /></div><div className="col-8"><hr /></div><div className="col-2"><div className="corner left-bottom" /></div></div>
            <div className="row align-items-center justify-content-end how-it-works"><div className="col-6 text-right"><p>As a consequence of its continuous expansion, the corporation raised the maximum investment threshold to 5Cr by 2022. This strengthens the company's foundation and instills trust among wealthy individuals and institutional investors who desire to allocate larger amounts of funds.</p></div><div className="col-2 text-center full"><div className="circle">2022</div></div></div>
            <div className="row timeline"><div className="col-2"><div className="corner right-bottom" /></div><div className="col-8"><hr /></div><div className="col-2"><div className="corner top-left" /></div></div>
            <div className="row align-items-center how-it-works"><div className="col-2 text-center top"><div className="circle">2023</div></div><div className="col-6"><p>As a consequence of its continuous expansion, the corporation raised the maximum investment threshold to 5Cr by 2022. This strengthens the company's foundation and instills trust among wealthy individuals and institutional investors who desire to allocate larger amounts of funds.</p></div></div>
            <div className="row timeline"><div className="col-2"><div className="corner top-right" /></div><div className="col-8"><hr /></div><div className="col-2"><div className="corner left-bottom" /></div></div>
            <div className="row align-items-center justify-content-end how-it-works"><div className="col-6 text-right"><p>We have a plan with a group of analysts and financial advisors to attain a total fund size of RS 20 Cr+ by May 2024</p></div><div className="col-2 text-center full"><div className="circle">2024</div></div></div>
            <div className="row timeline mb-5"><div className="col-2" /><div className="col-8"><hr /></div><div className="col-2"><div className="corner top-left" /></div></div>
          </div>
        </div>

        {content?.testimonials?.length ? (
          <div className="review-area bg de-padding pos-rel">
            <div className="container container-stage">
              <div className="review-wpr">
                <div className="row g-0 align-items-center">
                  <div className="col-xl-5">
                    <div className="review-left">
                      <div className="review-left-content pos-rel">
                        <div className="review-left-title-arrow">
                          <h2 className="heading-5">What our client <br /> says</h2>
                          <div className="review-slider-ico">
                            <div className="swiper-button-next" />
                            <div className="swiper-button-prev" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="col-xl-7">
                    <div className="reveiw-wpr review-sldr swiper">
                      <div className="swiper-wrapper">
                        {content.testimonials.map((item, index) => (
                          <div key={`${item.name}-${index}`} className="swiper-slide">
                            <div className="review-single">
                              <img src="/assets/frontend/img/quote.png" className="qu-01" alt="" />
                              <h5 className="heading-5">{item.name}</h5>
                              <p>{item.message}</p>
                              <span>{item.role}</span>
                            </div>
                          </div>
                        ))}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        ) : null}

        {content?.faqs?.length ? (
          <div className="faq-area pos-rel de-padding">
            <div className="container">
              <div className="faq-wpr">
                <div className="row">
                  <div className="col-xl-6 m-auto">
                    <div className="faq-pics pr-60 grid-2">
                      <div className="faq-pic-1 pos-rel">
                        <img src="/assets/frontend/img/logo/about-1.jpg" alt="no image" style={{ height: 200 }} />
                        <img src="/assets/frontend/img/dot/faq-dot.png" className="faq-dot up-move" alt="no image" />
                      </div>
                      <div className="faq-pic-2" />
                      <div className="faq-pic-3" />
                      <div className="faq-pic-4 pos-rel">
                        <img src="/assets/frontend/img/logo/about-2.jpg" alt="no image" style={{ height: 200 }} />
                      </div>
                    </div>
                  </div>
                  <div className="col-xl-6">
                    <div className="course-accordion">
                      <span className="hero-sub-title mb-20">
                        <span><img src="/assets/frontend/img/favicon.png" style={{ height: 30 }} alt="fav" /></span>
                        FAQS
                      </span>
                      <h2 className="heading-1">Got Questions ?</h2>
                      <p className="mb-30">
                        If you have any other questions - please get in touch at <a href="mailto:info@pmswala.com"> info@pmswala.com</a>
                      </p>
                      <div className="accordion" id="accordionExample">
                        {content.faqs.map((item, index) => (
                          <div key={`${item.question}-${index}`} className="accordion-item">
                            <h2 className="accordion-header" id={`heading${index}`}>
                              <button
                                className="accordion-button collapsed"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target={`#collapse${index}`}
                                aria-expanded="false"
                                aria-controls={`collapse${index}`}
                              >
                                {item.question}
                              </button>
                            </h2>
                            <div
                              id={`collapse${index}`}
                              className="accordion-collapse collapse"
                              aria-labelledby={`heading${index}`}
                              data-bs-parent="#accordionExample"
                            >
                              <div className="accordion-body">
                                <p className="mb-0">{item.answer}</p>
                              </div>
                            </div>
                          </div>
                        ))}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        ) : null}
      </main>
    </PublicFrame>
  );
}
