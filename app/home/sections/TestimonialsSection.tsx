import { Testimonial } from "../content";

type TestimonialsSectionProps = {
  testimonials: Testimonial[];
  testimonialIndex: number;
  onPrev: () => void;
  onNext: () => void;
};

export function TestimonialsSection({
  testimonials,
  testimonialIndex,
  onPrev,
  onNext
}: TestimonialsSectionProps) {
  return (
    <section id="testimonials" className="neo-section section-reveal">
      <div className="container">
        <div className="neo-section-head">
          <p className="neo-kicker">Testimonials</p>
          <h2>Trusted by operators and investors</h2>
        </div>

        <div className="neo-testimonial-shell">
          <article className="neo-testimonial-card">
            <p>{testimonials[testimonialIndex].quote}</p>
            <h3>{testimonials[testimonialIndex].name}</h3>
            <span>{testimonials[testimonialIndex].role}</span>
          </article>
          <div className="neo-testimonial-controls">
            <button type="button" onClick={onPrev}>Previous</button>
            <button type="button" onClick={onNext}>Next</button>
          </div>
        </div>
      </div>
    </section>
  );
}
