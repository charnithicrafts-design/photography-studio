<?php
/**
 * Template Name: Talam Studio
 * Template Post Type: page
 * Description: Full-page utilitarian production hub landing for Talam Studio.
 */
// Bypass WordPress header/footer entirely — full design control
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Talam Studio — Photography Production House</title>
  <meta name="description" content="Talam Studio is a full-service photography production house specialising in industrial, corporate events, and wedding coverage. Book your session.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/talam-studio')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,400;0,700;1,400&family=IBM+Plex+Sans:wght@400;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --black: #0A0A0A; --white: #F2F0EB; --mid-grey: #888885;
      --light-grey: #DDDBD7; --rule: 1px solid #222; --rule-light: 1px solid #333;
      --accent: #E8FF00; --font-mono: 'IBM Plex Mono', monospace; --font-sans: 'IBM Plex Sans', sans-serif;
    }
    html { scroll-behavior: smooth; }
    body { background: var(--black); color: var(--white); font-family: var(--font-mono); -webkit-font-smoothing: antialiased; overflow-x: hidden; }

    .system-bar { background: var(--accent); color: var(--black); padding: 0.5rem 2rem; font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; display: flex; justify-content: space-between; font-weight: 700; }
    nav { position: sticky; top: 0; z-index: 100; background: var(--black); border-bottom: var(--rule); display: grid; grid-template-columns: 1fr auto 1fr; align-items: center; padding: 0 2rem; height: 60px; }
    .nav-meta { font-size: 0.68rem; letter-spacing: 0.14em; color: var(--mid-grey); text-transform: uppercase; }
    .nav-logo { text-align: center; font-weight: 700; font-size: 1rem; letter-spacing: 0.06em; text-transform: uppercase; text-decoration: none; color: var(--white); }
    .nav-book { text-align: right; }
    .nav-book a { display: inline-block; background: var(--accent); color: var(--black); font-family: var(--font-mono); font-weight: 700; font-size: 0.72rem; letter-spacing: 0.14em; text-transform: uppercase; text-decoration: none; padding: 0.6rem 1.4rem; transition: background 0.2s; }
    .nav-book a:hover { background: var(--white); }

    .hero { display: grid; grid-template-columns: 1fr 1fr; min-height: calc(100vh - 80px); border-bottom: var(--rule); }
    .hero-left { padding: 4rem 3rem; display: flex; flex-direction: column; justify-content: space-between; border-right: var(--rule); }
    .hero-tag { font-size: 0.68rem; letter-spacing: 0.22em; color: var(--mid-grey); text-transform: uppercase; border: var(--rule-light); display: inline-block; padding: 0.4rem 0.8rem; margin-bottom: 3rem; }
    .hero-headline { font-weight: 700; font-size: clamp(3rem, 7vw, 7.5rem); line-height: 0.9; letter-spacing: -0.04em; text-transform: uppercase; }
    .hero-headline .accent-word { color: var(--accent); }
    .hero-body { margin-top: 3rem; }
    .hero-body p { font-size: 0.9rem; line-height: 1.8; color: var(--mid-grey); max-width: 420px; margin-bottom: 2.5rem; }
    .hero-ctas { display: flex; flex-direction: column; gap: 0.75rem; }
    .btn-primary { display: inline-flex; align-items: center; justify-content: space-between; background: var(--accent); color: var(--black); font-family: var(--font-mono); font-weight: 700; font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; padding: 1.1rem 1.75rem; transition: background 0.2s; }
    .btn-primary:hover { background: var(--white); }
    .btn-ghost { display: inline-flex; align-items: center; justify-content: space-between; border: var(--rule-light); color: var(--white); font-family: var(--font-mono); font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; padding: 1.1rem 1.75rem; transition: all 0.2s; }
    .btn-ghost:hover { border-color: var(--white); background: rgba(255,255,255,0.04); }
    .hero-right { position: relative; overflow: hidden; }
    .hero-img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(80%) brightness(0.7) contrast(1.15); transition: filter 0.5s ease; }
    .hero-right:hover .hero-img { filter: grayscale(40%) brightness(0.8) contrast(1.1); }
    .hero-img-caption { position: absolute; bottom: 2rem; right: 2rem; font-size: 0.65rem; letter-spacing: 0.14em; text-transform: uppercase; color: rgba(255,255,255,0.4); }

    .status-grid { display: grid; grid-template-columns: repeat(4, 1fr); border-bottom: var(--rule); }
    .status-item { padding: 1.5rem 2rem; border-right: var(--rule); display: flex; align-items: center; gap: 0.75rem; }
    .status-item:last-child { border-right: none; }
    .status-dot { width: 8px; height: 8px; background: var(--accent); border-radius: 50%; animation: pulse 2s ease-in-out infinite; }
    @keyframes pulse { 0%,100% { opacity:1; transform:scale(1); } 50% { opacity:0.4; transform:scale(0.8); } }
    .status-text { font-size: 0.7rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--mid-grey); }
    .status-text strong { color: var(--white); }

    .services { border-bottom: var(--rule); }
    .services-header { display: flex; justify-content: space-between; align-items: center; padding: 2rem; border-bottom: var(--rule); }
    .services-header h2 { font-weight: 700; font-size: 0.72rem; letter-spacing: 0.22em; text-transform: uppercase; color: var(--mid-grey); }
    .services-header span { font-size: 0.68rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--mid-grey); }
    .service-row { display: grid; grid-template-columns: 80px 1fr 1fr 1fr 200px; align-items: stretch; border-bottom: var(--rule); transition: background 0.15s; }
    .service-row:hover { background: rgba(232,255,0,0.03); }
    .service-row:last-child { border-bottom: none; }
    .service-index { padding: 2.5rem 2rem; font-size: 0.7rem; letter-spacing: 0.14em; color: var(--mid-grey); border-right: var(--rule); display: flex; align-items: center; }
    .service-img-cell { border-right: var(--rule); overflow: hidden; height: 220px; }
    .service-img-cell img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%) brightness(0.6) contrast(1.2); transition: filter 0.4s ease, transform 0.5s ease; }
    .service-row:hover .service-img-cell img { filter: grayscale(60%) brightness(0.75) contrast(1.1); transform: scale(1.05); }
    .service-info { padding: 2.5rem 2rem; border-right: var(--rule); display: flex; flex-direction: column; justify-content: space-between; }
    .service-name { font-weight: 700; font-size: 1.5rem; letter-spacing: -0.03em; text-transform: uppercase; line-height: 1; margin-bottom: 1rem; }
    .service-tags { display: flex; flex-wrap: wrap; gap: 0.5rem; }
    .service-tag { font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase; border: var(--rule-light); padding: 0.3rem 0.6rem; color: var(--mid-grey); }
    .service-specs { padding: 2.5rem 2rem; border-right: var(--rule); }
    .spec-list { list-style: none; }
    .spec-list li { font-size: 0.8rem; line-height: 2.2; color: var(--mid-grey); padding-left: 1.2rem; position: relative; }
    .spec-list li::before { content: '+'; position: absolute; left: 0; color: var(--accent); }
    .service-action { padding: 2.5rem 2rem; display: flex; flex-direction: column; justify-content: space-between; }
    .service-price { font-size: 0.7rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--mid-grey); margin-bottom: 0.3rem; }
    .service-price-val { font-weight: 700; font-size: 1.3rem; letter-spacing: -0.02em; color: var(--white); }
    .service-cta { display: flex; align-items: center; justify-content: space-between; background: transparent; border: var(--rule-light); color: var(--white); font-family: var(--font-mono); font-size: 0.72rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; padding: 0.9rem 1rem; transition: all 0.2s; }
    .service-cta:hover { background: var(--accent); color: var(--black); border-color: var(--accent); }

    .trust { display: grid; grid-template-columns: 1fr 1fr; border-bottom: var(--rule); }
    .trust-left { padding: 4rem 3rem; border-right: var(--rule); }
    .trust-label { font-size: 0.68rem; letter-spacing: 0.22em; text-transform: uppercase; color: var(--mid-grey); margin-bottom: 2rem; }
    .testimonials { display: flex; flex-direction: column; gap: 2.5rem; }
    .testi-item { border-left: 2px solid var(--accent); padding-left: 1.5rem; }
    .testi-quote { font-size: 0.9rem; line-height: 1.7; color: var(--light-grey); margin-bottom: 0.75rem; font-family: var(--font-sans); }
    .testi-source { font-size: 0.68rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--mid-grey); }
    .trust-right { display: grid; grid-template-columns: 1fr 1fr; }
    .kpi-item { padding: 3rem 2.5rem; border-right: var(--rule); border-bottom: var(--rule); }
    .kpi-item:nth-child(2n) { border-right: none; }
    .kpi-item:nth-child(3), .kpi-item:nth-child(4) { border-bottom: none; }
    .kpi-val { font-weight: 700; font-size: 3rem; letter-spacing: -0.06em; line-height: 1; color: var(--white); }
    .kpi-val span { color: var(--accent); }
    .kpi-label { font-size: 0.7rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--mid-grey); margin-top: 0.75rem; }

    .gallery-strip { display: grid; grid-template-columns: repeat(5, 1fr); height: 300px; border-bottom: var(--rule); }
    .gallery-strip-item { overflow: hidden; border-right: var(--rule); }
    .gallery-strip-item:last-child { border-right: none; }
    .gallery-strip-item img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%) brightness(0.55) contrast(1.3); transition: filter 0.4s ease, transform 0.5s ease; }
    .gallery-strip-item:hover img { filter: grayscale(20%) brightness(0.8) contrast(1.1); transform: scale(1.08); }

    .booking { display: grid; grid-template-columns: 1fr 1fr; border-bottom: var(--rule); }
    .booking-left { padding: 5rem 3rem; border-right: var(--rule); }
    .booking-left h2 { font-weight: 700; font-size: clamp(2rem, 4vw, 4rem); letter-spacing: -0.04em; text-transform: uppercase; line-height: 0.95; margin-bottom: 2rem; }
    .booking-left h2 span { color: var(--accent); }
    .booking-left p { font-size: 0.85rem; line-height: 1.8; color: var(--mid-grey); max-width: 380px; }
    .booking-right { padding: 5rem 3rem; }
    .form-field { margin-bottom: 1.5rem; }
    .form-label { display: block; font-size: 0.65rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--mid-grey); margin-bottom: 0.5rem; }
    .form-input, .form-select { width: 100%; background: transparent; border: none; border-bottom: var(--rule-light); color: var(--white); font-family: var(--font-mono); font-size: 0.9rem; padding: 0.75rem 0; outline: none; transition: border-color 0.2s; appearance: none; }
    .form-input:focus, .form-select:focus { border-color: var(--accent); }
    .form-select option { background: #111; color: var(--white); }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    .form-submit { margin-top: 2.5rem; display: flex; align-items: center; justify-content: space-between; width: 100%; background: var(--accent); color: var(--black); border: none; font-family: var(--font-mono); font-weight: 700; font-size: 0.82rem; letter-spacing: 0.14em; text-transform: uppercase; padding: 1.25rem 2rem; cursor: pointer; transition: background 0.2s; }
    .form-submit:hover { background: var(--white); }

    footer { display: grid; grid-template-columns: 1fr 1fr 1fr; border-top: var(--rule); }
    .footer-col { padding: 3rem 2rem; border-right: var(--rule); }
    .footer-col:last-child { border-right: none; }
    .footer-col-label { font-size: 0.65rem; letter-spacing: 0.22em; text-transform: uppercase; color: var(--mid-grey); margin-bottom: 1.5rem; }
    .footer-col p, .footer-col a { display: block; font-size: 0.8rem; line-height: 2; color: var(--mid-grey); text-decoration: none; transition: color 0.2s; }
    .footer-col a:hover { color: var(--white); }
    .footer-bottom { border-top: var(--rule); padding: 1.25rem 2rem; display: flex; justify-content: space-between; align-items: center; }
    .footer-bottom p { font-size: 0.68rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--mid-grey); }
    .footer-chitramaya-link { font-size: 0.68rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; color: var(--accent); }
  </style>
</head>
<body>
  <div class="system-bar">
    <span>[ Talam Studio — Production Hub · Operational ]</span>
    <span>Enquiries: +91 98765 43210 · studio@talam.in</span>
  </div>

  <nav>
    <div class="nav-meta"><?php echo home_url('/talam-studio'); ?></div>
    <a href="<?php echo home_url('/talam-studio'); ?>" class="nav-logo">Talam Studio</a>
    <div class="nav-book"><a href="#booking">Book a Session ↓</a></div>
  </nav>

  <section class="hero" id="hero">
    <div class="hero-left">
      <div>
        <div class="hero-tag">Production Hub // Est. 2012</div>
        <h1 class="hero-headline">We<br><span class="accent-word">Execute.</span><br>You<br>Deliver.</h1>
      </div>
      <div class="hero-body">
        <p>Talam is the operational engine of Chitramaya Creatives. No creative briefs. No mood boards. If you know what you need — industrial documentation, event coverage, wedding — we deploy, capture, and deliver with zero friction.</p>
        <div class="hero-ctas">
          <a href="#services" class="btn-primary">View All Services →</a>
          <a href="#booking" class="btn-ghost">Book a Session →</a>
        </div>
      </div>
    </div>
    <div class="hero-right">
      <img class="hero-img"
        src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=1600&q=90&auto=format&fit=crop"
        alt="Wide-angle view of a professional photography studio workspace with multiple light setups, tripods, and cameras — demonstrating the operational scale and technical capability of Talam Studio, Mumbai.">
      <div class="hero-img-caption">Talam Studio · Primary Bay · Mumbai</div>
    </div>
  </section>

  <div class="status-grid">
    <div class="status-item"><div class="status-dot"></div><div class="status-text"><strong>3 Sessions</strong> Active Today</div></div>
    <div class="status-item"><div class="status-dot"></div><div class="status-text">Delivery: <strong>&lt;48 Hours</strong></div></div>
    <div class="status-item"><div class="status-dot"></div><div class="status-text">Next Available: <strong>July 18</strong></div></div>
    <div class="status-item"><div class="status-dot"></div><div class="status-text">Format: <strong>Medium Format · Full Frame</strong></div></div>
  </div>

  <section class="services" id="services">
    <div class="services-header">
      <h2>Service Directory // 3 Active</h2>
      <span>All inclusive of editing & licensing</span>
    </div>
    <div class="service-row">
      <div class="service-index">01</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=800&q=90&auto=format&fit=crop"
          alt="Heavy industrial manufacturing environment with workers operating precision machinery under dramatic overhead lighting — Talam Studio industrial photography and documentation service.">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Industrial</h3><div class="service-tags"><span class="service-tag">Factory Floors</span><span class="service-tag">Machinery</span><span class="service-tag">Zero-Disruption</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Full-day factory documentation</li><li>No-disruption shooting protocol</li><li>Safety-compliant crew gear</li><li>800–1200 raw images</li><li>150 edited finals in 48h</li>
        </ul>
      </div>
      <div class="service-action">
        <div><div class="service-price">Starting From</div><div class="service-price-val">₹45,000</div></div>
        <a href="#booking" class="service-cta">Book Industrial →</a>
      </div>
    </div>
    <div class="service-row">
      <div class="service-index">02</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=800&q=90&auto=format&fit=crop"
          alt="Large corporate conference with a packed auditorium, stage lights and keynote speaker — Talam Studio corporate event photography and real-time coverage service.">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Events</h3><div class="service-tags"><span class="service-tag">Corporate Summits</span><span class="service-tag">Brand Activations</span><span class="service-tag">Real-time</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>2-person crew deployment</li><li>Same-day selects (20 images)</li><li>Full gallery within 24 hours</li><li>Press & social media formats</li><li>On-site tethered review</li>
        </ul>
      </div>
      <div class="service-action">
        <div><div class="service-price">Starting From</div><div class="service-price-val">₹35,000</div></div>
        <a href="#booking" class="service-cta">Book Events →</a>
      </div>
    </div>
    <div class="service-row">
      <div class="service-index">03</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?w=800&q=90&auto=format&fit=crop"
          alt="An intimate documentary wedding moment — a couple sharing a quiet unposed exchange in beautiful natural light, showcasing Talam Studio's emotional and unobtrusive wedding photography style.">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Weddings</h3><div class="service-tags"><span class="service-tag">Documentary</span><span class="service-tag">Unobtrusive</span><span class="service-tag">High Volume</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>8–12 hour full-day coverage</li><li>2 photographers + 1 second</li><li>600+ edited finals</li><li>Private AI-powered gallery</li><li>Printed album option</li>
        </ul>
      </div>
      <div class="service-action">
        <div><div class="service-price">Starting From</div><div class="service-price-val">₹80,000</div></div>
        <a href="#booking" class="service-cta">Book Weddings →</a>
      </div>
    </div>
  </section>

  <div class="gallery-strip">
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1565439390234-5b4308a0653d?w=600&q=80&auto=format&fit=crop" alt="Close-up of industrial welding sparks in a factory — industrial photography portfolio sample by Talam Studio."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?w=600&q=80&auto=format&fit=crop" alt="Corporate team in a meeting room with large glass windows — corporate event photography portfolio sample by Talam Studio."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80&auto=format&fit=crop" alt="Wedding couple at the altar with warm ceremony lighting — documentary wedding photography portfolio sample by Talam Studio."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80&auto=format&fit=crop" alt="Open-plan tech office with natural daylight and team members working — corporate space photography by Talam Studio."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1535957998253-26ae1ef29506?w=600&q=80&auto=format&fit=crop" alt="Macro of industrial metal gears and components showing surface texture and precision — Talam Studio industrial close-up photography."></div>
  </div>

  <section class="trust" id="trust">
    <div class="trust-left">
      <div class="trust-label">// Verified Client Telemetry</div>
      <div class="testimonials">
        <div class="testi-item"><p class="testi-quote">"Delivered 1,200 edited assets in 48 hours flat. Zero disruption to the factory floor. The images are razor sharp — our procurement team used them in an international tender document."</p><p class="testi-source">— Ravi Krishnamurthy, GM Operations · Apex Precision Mfg.</p></div>
        <div class="testi-item"><p class="testi-quote">"We had 600 people at our annual summit. Talam covered every panel, every session, every meal. We had the press-ready gallery in our inbox before midnight."</p><p class="testi-source">— Shruti Menon, Head of Marketing · GlobalTech Summit</p></div>
        <div class="testi-item"><p class="testi-quote">"They captured every moment without us even knowing they were there. When we saw the gallery, we saw our entire wedding as we actually felt it — not posed, not performed."</p><p class="testi-source">— Anjali & Rohan Pillai · Wedding Clients</p></div>
      </div>
    </div>
    <div class="trust-right">
      <div class="kpi-item"><div class="kpi-val">1.2k<span>+</span></div><div class="kpi-label">Assets per project avg.</div></div>
      <div class="kpi-item"><div class="kpi-val">48<span>h</span></div><div class="kpi-label">Max turnaround</div></div>
      <div class="kpi-item"><div class="kpi-val">98<span>%</span></div><div class="kpi-label">On-time delivery rate</div></div>
      <div class="kpi-item"><div class="kpi-val">12<span>yr</span></div><div class="kpi-label">Production experience</div></div>
    </div>
  </section>

  <section class="booking" id="booking">
    <div class="booking-left">
      <h2>Book a<br><span>Session</span></h2>
      <p>Fill in the brief on the right and we will respond within 4 business hours with availability, crew allocation, and a formal quote. No obligations.</p>
    </div>
    <div class="booking-right">
      <form id="booking-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <?php wp_nonce_field('talam_booking', 'talam_nonce'); ?>
        <input type="hidden" name="action" value="talam_booking">
        <div class="form-row">
          <div class="form-field"><label class="form-label" for="form-name">Full Name</label><input class="form-input" id="form-name" name="name" type="text" placeholder="Your name" required></div>
          <div class="form-field"><label class="form-label" for="form-org">Organisation</label><input class="form-input" id="form-org" name="organisation" type="text" placeholder="Company / Studio"></div>
        </div>
        <div class="form-field"><label class="form-label" for="form-service">Service Required</label>
          <select class="form-select" id="form-service" name="service" required>
            <option value="">Select a service</option>
            <option value="industrial">Industrial Documentation</option>
            <option value="events">Corporate Event Coverage</option>
            <option value="weddings">Wedding Photography</option>
          </select>
        </div>
        <div class="form-row">
          <div class="form-field"><label class="form-label" for="form-date">Preferred Date</label><input class="form-input" id="form-date" name="date" type="date" required></div>
          <div class="form-field"><label class="form-label" for="form-location">Location / City</label><input class="form-input" id="form-location" name="location" type="text" placeholder="e.g. Mumbai" required></div>
        </div>
        <div class="form-field"><label class="form-label" for="form-email">Email Address</label><input class="form-input" id="form-email" name="email" type="email" placeholder="you@company.com" required></div>
        <button type="submit" class="form-submit"><span>Send Enquiry</span><span>→</span></button>
      </form>
    </div>
  </section>

  <footer>
    <div class="footer-col">
      <div class="footer-col-label">Talam Studio</div>
      <p>The production engine of Chitramaya Creatives. Industrial, Events, Weddings.</p>
    </div>
    <div class="footer-col">
      <div class="footer-col-label">Contact</div>
      <a href="mailto:studio@talam.in">studio@talam.in</a>
      <a href="tel:+919876543210">+91 98765 43210</a>
      <p>Mumbai, Maharashtra</p>
    </div>
    <div class="footer-col" style="border-right:none;">
      <div class="footer-col-label">Part of</div>
      <a href="<?php echo home_url('/'); ?>" style="color:var(--white);font-weight:700;">Chitramaya Creatives ↗</a>
      <p style="margin-top:0.5rem;">The portfolio & editorial brand behind Talam Studio.</p>
    </div>
  </footer>
  <div class="footer-bottom">
    <p>© <?php echo date('Y'); ?> Talam Studio. A Chitramaya Creatives Company.</p>
    <a href="<?php echo home_url('/'); ?>" class="footer-chitramaya-link">← Chitramaya Creatives</a>
  </div>
  <?php wp_footer(); ?>
</body>
</html>
