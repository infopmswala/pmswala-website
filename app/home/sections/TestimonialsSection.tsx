import { Testimonial, TestimonialsContent } from "../content";

type TestimonialsSectionProps = {
  testimonialsContent: TestimonialsContent;
  testimonials: Testimonial[];
  testimonialIndex: number;
  onSelect: (index: number) => void;
  onPrev: () => void;
  onNext: () => void;
};

export function TestimonialsSection({
  testimonialsContent,
  testimonials,
  testimonialIndex,
  onSelect,
  onPrev,
  onNext
}: TestimonialsSectionProps) {
  const activeTestimonial = testimonials[testimonialIndex];

  return (
    <section id="testimonials" className="neo-section section-reveal">
      <div className="container">
        <div className="neo-section-head">
          <p className="neo-kicker">{testimonialsContent.kicker}</p>
          <h2>{testimonialsContent.title}</h2>
        </div>

        <div className="neo-testimonial-shell">
          <article className="neo-testimonial-card">
            <div className="neo-testimonial-quote-mark" aria-hidden="true">"</div>
            <p>{activeTestimonial.quote}</p>
            <div className="neo-testimonial-meta">
              <div className="neo-testimonial-badge" aria-hidden="true">
                {activeTestimonial.name.charAt(0)}
              </div>
              <div>
                <h3>{activeTestimonial.name}</h3>
                <span>{activeTestimonial.role}</span>
              </div>
            </div>
          </article>

          <div className="neo-testimonial-dots" role="tablist" aria-label="Select testimonial">
            {testimonials.map((item, index) => {
              const isActive = index === testimonialIndex;

              return (
                <button
                  key={item.name}
                  type="button"
                  role="tab"
                  aria-selected={isActive}
                  aria-label={`Show testimonial from ${item.name}`}
                  className={isActive ? "is-active" : ""}
                  onClick={() => onSelect(index)}
                />
              );
            })}
          </div>

          <div className="neo-testimonial-controls">
            <button type="button" onClick={onPrev} aria-label={testimonialsContent.prevLabel}>
              {testimonialsContent.prevLabel}
            </button>
            <button type="button" onClick={onNext} aria-label={testimonialsContent.nextLabel}>
              {testimonialsContent.nextLabel}
            </button>
          </div>
        </div>
      </div>
    </section>
  );
}
