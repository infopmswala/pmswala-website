// PMSWALA — shared interactions
document.addEventListener('DOMContentLoaded', () => {

  /* Mobile nav */
  const toggle = document.querySelector('.nav-toggle');
  const links = document.querySelector('.nav-links');
  if (toggle && links) {
    toggle.addEventListener('click', () => {
      links.classList.toggle('open');
      toggle.setAttribute('aria-expanded', links.classList.contains('open'));
    });
    links.querySelectorAll('a').forEach(a => a.addEventListener('click', () => links.classList.remove('open')));
  }

  /* Scroll reveal */
  const revealEls = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window && revealEls.length) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
    }, { threshold: .15 });
    revealEls.forEach(el => io.observe(el));
  } else {
    revealEls.forEach(el => el.classList.add('in'));
  }

  /* FAQ accordion */
  document.querySelectorAll('.faq-item').forEach(item => {
    const q = item.querySelector('.faq-q');
    if (!q) return;
    q.addEventListener('click', () => {
      const wasOpen = item.classList.contains('open');
      item.closest('.faq-list').querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
      if (!wasOpen) item.classList.add('open');
    });
  });

  /* Contact form (static demo) */
  const form = document.getElementById('enquiry-form');
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      document.getElementById('form-success')?.classList.add('show');
      form.reset();
    });
  }

  /* Testimonial carousel */
  const slides = document.querySelectorAll('.t-slide');
  if (slides.length > 1) {
    let idx = 0;
    const show = (n) => slides.forEach((s, i) => s.style.display = i === n ? 'block' : 'none');
    show(0);
    document.querySelector('.t-next')?.addEventListener('click', () => { idx = (idx + 1) % slides.length; show(idx); });
    document.querySelector('.t-prev')?.addEventListener('click', () => { idx = (idx - 1 + slides.length) % slides.length; show(idx); });
  }

  /* Animated stat counters */
  const stats = document.querySelectorAll('[data-count]');
  if ('IntersectionObserver' in window && stats.length) {
    const animate = (el) => {
      const target = parseFloat(el.getAttribute('data-count'));
      const suffix = el.getAttribute('data-suffix') || '';
      const decimals = el.getAttribute('data-decimals') ? parseInt(el.getAttribute('data-decimals')) : 0;
      let start = 0;
      const dur = 1200;
      const t0 = performance.now();
      const step = (t) => {
        const p = Math.min((t - t0) / dur, 1);
        const val = start + (target - start) * (1 - Math.pow(1 - p, 3));
        el.textContent = val.toFixed(decimals) + suffix;
        if (p < 1) requestAnimationFrame(step);
      };
      requestAnimationFrame(step);
    };
    const so = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { animate(e.target); so.unobserve(e.target); } });
    }, { threshold: .4 });
    stats.forEach(s => so.observe(s));
  }

  /* EMI Calculator */
  const loanAmt = document.getElementById('emi-amount');
  const loanRate = document.getElementById('emi-rate');
  const loanTenure = document.getElementById('emi-tenure');
  if (loanAmt && loanRate && loanTenure) {
    const amountOut = document.getElementById('emi-amount-val');
    const rateOut = document.getElementById('emi-rate-val');
    const tenureOut = document.getElementById('emi-tenure-val');
    const emiOut = document.getElementById('emi-monthly');
    const principalOut = document.getElementById('emi-principal');
    const interestOut = document.getElementById('emi-interest');
    const totalOut = document.getElementById('emi-total');

    const fmt = (n) => '₹' + Math.round(n).toLocaleString('en-IN');

    const calc = () => {
      const P = parseFloat(loanAmt.value);
      const annualRate = parseFloat(loanRate.value);
      const years = parseFloat(loanTenure.value);
      const r = annualRate / 12 / 100;
      const n = years * 12;
      const emi = r === 0 ? P / n : (P * r * Math.pow(1 + r, n)) / (Math.pow(1 + r, n) - 1);
      const total = emi * n;
      const interest = total - P;

      amountOut.textContent = fmt(P);
      rateOut.textContent = annualRate.toFixed(1) + '%';
      tenureOut.textContent = years + ' yrs';
      emiOut.textContent = fmt(emi);
      principalOut.textContent = fmt(P);
      interestOut.textContent = fmt(interest);
      totalOut.textContent = fmt(total);
    };

    [loanAmt, loanRate, loanTenure].forEach(el => el.addEventListener('input', calc));
    calc();
  }

  /* Property search (demo — surfaces a friendly confirmation) */
  const propSearch = document.getElementById('property-search-form');
  if (propSearch) {
    propSearch.addEventListener('submit', (e) => {
      e.preventDefault();
      const box = document.getElementById('property-search-result');
      if (box) {
        box.classList.add('show');
        box.textContent = 'Searching listings that match your criteria — our team will also send a curated shortlist to your email within 24 hours.';
      }
    });
  }

  /* Site visit scheduler (static demo) */
  const visitForm = document.getElementById('visit-form');
  if (visitForm) {
    visitForm.addEventListener('submit', (e) => {
      e.preventDefault();
      document.getElementById('visit-success')?.classList.add('show');
      visitForm.reset();
    });
  }
});
