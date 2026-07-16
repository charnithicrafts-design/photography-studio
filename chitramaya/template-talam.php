<?php
/**
 * Template Name: Thalam Studio
 * Template Post Type: page
 * Description: Full-page utilitarian production hub landing for Thalam Studio.
 */
// Bypass WordPress header/footer entirely — full design control
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thalam Studio — Ad Shoots &amp; Baby Photography</title>
  <meta name="description" content="Thalam Studio — Chitramaya's production house for ad shoots, baby &amp; newborn photography, and commercial sessions. Book your studio date in .">
  <link rel="canonical" href="<?php echo esc_url(home_url('/thalam-studio')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,400;0,700;1,400&family=IBM+Plex+Sans:wght@400;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --black: var(--wp--preset--color--thalam-black, #0A0A0A);
      --white: var(--wp--preset--color--thalam-white, #F2F0EB);
      --mid-grey: var(--wp--preset--color--thalam-mid-grey, #888885);
      --light-grey: #DDDBD7; --rule: 1px solid #222; --rule-light: 1px solid #333;
      --accent: var(--wp--preset--color--thalam-accent, #E8FF00);
      --font-mono: var(--wp--preset--font-family--ibm-plex-mono, 'IBM Plex Mono', monospace);
      --font-sans: var(--wp--preset--font-family--ibm-plex-sans, 'IBM Plex Sans', sans-serif);
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
    .service-row { display: grid; grid-template-columns: 80px 1fr 1fr 1fr 200px; align-items: stretch; border-bottom: var(--rule); transition: background 0.15s; cursor: pointer; }
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

    /* WHATSAPP */
    .whatsapp-fab { position: fixed; bottom: 2rem; right: 2rem; z-index: 999; display: flex; align-items: center; gap: 0.75rem; background: #25D366; color: #fff; text-decoration: none; padding: 0.85rem 1.5rem 0.85rem 1.1rem; border-radius: 50px; font-family: var(--font-mono); font-size: 0.8rem; font-weight: 700; letter-spacing: 0.06em; box-shadow: 0 4px 24px rgba(37,211,102,0.35); transition: transform 0.25s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.25s ease; animation: waDrift 4s ease-in-out infinite; }
    .whatsapp-fab:hover { transform: scale(1.07) translateY(-2px); box-shadow: 0 8px 32px rgba(37,211,102,0.5); animation: none; }
    .whatsapp-fab svg { width: 22px; height: 22px; fill: #fff; flex-shrink: 0; }
    @keyframes waDrift { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }

    @media (max-width: 768px) {
      .hero { grid-template-columns: 1fr; }
      .hero-right { display: none; }
      .service-row { grid-template-columns: 60px 1fr 200px; }
      .service-specs { display: none; }
      .whatsapp-fab span { display: none; }
      .whatsapp-fab { padding: 0.9rem; border-radius: 50%; }
    }
  </style>
</head>
<body>

  <div class="system-bar">
    <span>[ Thalam Studio — Ad Shoots · Baby Photography · Operational ]</span>
    <span> · WhatsApp: +91 98765 43210</span>
  </div>

  <nav>
    <div class="nav-meta"><?php echo home_url('/thalam-studio'); ?></div>
    <a href="<?php echo home_url('/thalam-studio'); ?>" class="nav-logo">Thalam Studio</a>
    <div class="nav-book"><a href="#booking">Book a Session ↓</a></div>
  </nav>

  <section class="hero" id="hero">
    <div class="hero-left">
      <div>
        <div class="hero-tag">Production Hub // </div>
        <h1 class="hero-headline">We<br><span class="accent-word">Execute.</span><br>You<br>Deliver.</h1>
      </div>
      <div class="hero-body">
        <p>Thalam is the operational studio of Chitramaya Creatives — specialising in ad shoots and baby photography. Controlled light. Real moments. Zero friction from brief to delivery.</p>
        <div class="hero-ctas">
          <a href="#services" class="btn-primary">View All Services →</a>
          <a href="#booking" class="btn-ghost">Book a Session →</a>
        </div>
      </div>
    </div>
    <div class="hero-right">
      <img class="hero-img"
        src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=1600&q=90&auto=format&fit=crop"
        alt="Wide-angle view of a professional photography studio workspace with multiple light setups — Thalam Studio, .">
      <div class="hero-img-caption">Thalam Studio · </div>
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
      <h2>Service Directory // 4 Active</h2>
      <span>All inclusive of editing &amp; licensing</span>
    </div>

    <!-- Ad Shoots -->
    <div class="service-row" id="service-ad-shoots">
      <div class="service-index">01</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?w=800&q=90&auto=format&fit=crop"
          alt="Commercial ad shoot with professional studio lighting — Thalam Studio ad photography, .">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Ad Shoots</h3>
        <div class="service-tags"><span class="service-tag">Commercial</span><span class="service-tag">Brand Campaigns</span><span class="service-tag">Product Ads</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Concept-to-delivery production</li>
          <li>Art direction included</li>
          <li>Studio + location options</li>
          <li>Social &amp; print formats</li>
          <li>48h turnaround available</li>
        </ul>
      </div>
      <div class="service-action">
        <div><div class="service-price">Starting From</div><div class="service-price-val">&#8377;25,000</div></div>
        <a href="#booking" class="service-cta" id="cta-ad-shoots">Book Ad Shoot →</a>
      </div>
    </div>

    <!-- Baby Photography -->
    <div class="service-row" id="service-baby">
      <div class="service-index">02</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=800&q=90&auto=format&fit=crop"
          alt="Soft-lit newborn baby photography session in studio — Thalam Studio baby photography, .">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Baby &amp; Newborn</h3>
        <div class="service-tags"><span class="service-tag">Newborn</span><span class="service-tag">Milestone Sessions</span><span class="service-tag">First Year</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Controlled, soft studio lighting</li>
          <li>Safe, temperature-regulated space</li>
          <li>Props &amp; wraps included</li>
          <li>Parents welcome on set</li>
          <li>Private online gallery</li>
        </ul>
      </div>
      <div class="service-action">
        <div><div class="service-price">Starting From</div><div class="service-price-val">&#8377;12,000</div></div>
        <a href="#booking" class="service-cta" id="cta-baby">Book Baby Session →</a>
      </div>
    </div>

    <!-- Industrial -->
    <div class="service-row" id="service-industrial">
      <div class="service-index">03</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?w=800&q=90&auto=format&fit=crop"
          alt="Heavy industrial manufacturing environment — Thalam Studio industrial photography service.">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Industrial</h3>
        <div class="service-tags"><span class="service-tag">Factory Floors</span><span class="service-tag">Machinery</span><span class="service-tag">Zero-Disruption</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Full-day factory documentation</li>
          <li>No-disruption shooting protocol</li>
          <li>Safety-compliant crew gear</li>
          <li>800–1200 raw images</li>
          <li>150 edited finals in 48h</li>
        </ul>
      </div>
      <div class="service-action">
        <div><div class="service-price">Starting From</div><div class="service-price-val">&#8377;45,000</div></div>
        <a href="#booking" class="service-cta" id="cta-industrial">Book Industrial →</a>
      </div>
    </div>

    <!-- Weddings -->
    <div class="service-row" id="service-weddings">
      <div class="service-index">04</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1606800052052-a08af7148866?w=800&q=90&auto=format&fit=crop"
          alt="An intimate documentary wedding moment — Thalam Studio wedding photography, .">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Weddings</h3>
        <div class="service-tags"><span class="service-tag">Documentary</span><span class="service-tag">Unobtrusive</span><span class="service-tag">High Volume</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>8–12 hour full-day coverage</li>
          <li>2 photographers + 1 second</li>
          <li>600+ edited finals</li>
          <li>Private AI-powered gallery</li>
          <li>Printed album option</li>
        </ul>
      </div>
      <div class="service-action">
        <div><div class="service-price">Starting From</div><div class="service-price-val">&#8377;80,000</div></div>
        <a href="#booking" class="service-cta" id="cta-weddings">Book Weddings →</a>
      </div>
    </div>
  </section>

  <div class="gallery-strip">
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1565439390234-5b4308a0653d?w=600&q=80&auto=format&fit=crop" alt="Close-up of industrial welding sparks — Thalam Studio industrial photography sample."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1556761175-b413da4baf72?w=600&q=80&auto=format&fit=crop" alt="Corporate team in a meeting room — Thalam Studio corporate photography sample."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=600&q=80&auto=format&fit=crop" alt="Wedding couple at the altar — Thalam Studio wedding photography sample."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80&auto=format&fit=crop" alt="Open-plan office with natural daylight — Thalam Studio corporate space photography."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1535957998253-26ae1ef29506?w=600&q=80&auto=format&fit=crop" alt="Macro of industrial metal gears — Thalam Studio industrial close-up photography."></div>
  </div>

  <section class="trust" id="trust">
    <div class="trust-left">
      <div class="trust-label">// Verified Client Telemetry</div>
      <div class="testimonials">
        <div class="testi-item"><p class="testi-quote">"Delivered 1,200 edited assets in 48 hours flat. Zero disruption to the factory floor. The images are razor sharp — our procurement team used them in an international tender document."</p><p class="testi-source">— Ravi Krishnamurthy, GM Operations · Apex Precision Mfg.</p></div>
        <div class="testi-item"><p class="testi-quote">"We had 600 people at our annual summit. Thalam covered every panel, every session, every meal. We had the press-ready gallery in our inbox before midnight."</p><p class="testi-source">— Shruti Menon, Head of Marketing · GlobalTech Summit</p></div>
        <div class="testi-item"><p class="testi-quote">"They captured every moment without us even knowing they were there. When we saw the gallery, we saw our entire wedding as we actually felt it — not posed, not performed."</p><p class="testi-source">— Anjali &amp; Rohan Pillai · Wedding Clients</p></div>
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
        <?php wp_nonce_field('thalam_booking', 'thalam_nonce'); ?>
        <input type="hidden" name="action" value="thalam_booking">
        <div class="form-row">
          <div class="form-field"><label class="form-label" for="form-name">Full Name</label><input class="form-input" id="form-name" name="name" type="text" placeholder="Your name" required></div>
          <div class="form-field"><label class="form-label" for="form-org">Organisation</label><input class="form-input" id="form-org" name="organisation" type="text" placeholder="Company / Studio"></div>
        </div>
        <div class="form-field"><label class="form-label" for="form-service">Service Required</label>
          <select class="form-select" id="form-service" name="service" required>
            <option value="">Select a service</option>
            <option value="ad-shoots">Ad Shoot / Commercial</option>
            <option value="baby">Baby &amp; Newborn Photography</option>
            <option value="industrial">Industrial Documentation</option>
            <option value="events">Corporate Event Coverage</option>
            <option value="weddings">Wedding Photography</option>
          </select>
        </div>
        <div class="form-row">
          <div class="form-field"><label class="form-label" for="form-date">Preferred Date</label><input class="form-input" id="form-date" name="date" type="date" required></div>
          <div class="form-field"><label class="form-label" for="form-location">Location / City</label><input class="form-input" id="form-location" name="location" type="text" placeholder="e.g. " required></div>
        </div>
        <div class="form-field"><label class="form-label" for="form-email">Email Address</label><input class="form-input" id="form-email" name="email" type="email" placeholder="you@company.com" required></div>
        <button type="submit" class="form-submit"><span>Send Enquiry</span><span>→</span></button>
      </form>
    </div>
  </section>

  <footer>
    <div class="footer-col">
      <div class="footer-col-label">Thalam Studio</div>
      <p>Ad shoots, baby photography, and commercial production in .</p>
    </div>
    <div class="footer-col">
      <div class="footer-col-label">Contact</div>
      <a href="https://wa.me/919876543210?text=Hi%2C%20I%27d%20like%20to%20book%20a%20session%20at%20Thalam%20Studio." target="_blank" rel="noopener">WhatsApp Us ↗</a>
      <a href="mailto:studio@thalam.in">studio@thalam.in</a>
      <p>, India</p>
    </div>
    <div class="footer-col" style="border-right:none;">
      <div class="footer-col-label">Part of</div>
      <a href="<?php echo home_url('/'); ?>" style="color:var(--white);font-weight:700;">Chitramaya Creatives ↗</a>
      <p style="margin-top:0.5rem;">The portfolio &amp; editorial brand behind Thalam Studio.</p>
    </div>
  </footer>
  <div class="footer-bottom">
    <p>&copy; <?php echo date('Y'); ?> Thalam Studio. A Chitramaya Creatives Company.</p>
    <a href="<?php echo home_url('/'); ?>" class="footer-chitramaya-link">← Chitramaya Creatives</a>
  </div>

  <!-- WHATSAPP FLOATING CTA -->
  <a href="https://wa.me/919876543210?text=Hi%2C%20I%27d%20like%20to%20book%20a%20session%20at%20Thalam%20Studio."
    class="whatsapp-fab" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    <span>Chat with us</span>
  </a>

  <?php wp_footer(); ?>
</body>
</html>
