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
    :root {
      --bg-light: #f7f5f0;
      --text-dark: #1c1917;
      --accent: #a96f44;
      --mid-grey: rgba(28,25,23,0.4);
      --light-grey: rgba(28,25,23,0.6);
      --rule: 1px solid rgba(28,25,23,0.12);
      --rule-light: 1px solid rgba(28,25,23,0.06);
      --font-mono: var(--wp--preset--font-family--ibm-plex-mono, 'IBM Plex Mono', monospace);
      --font-sans: var(--wp--preset--font-family--ibm-plex-sans, 'IBM Plex Sans', sans-serif);
      --font-serif: 'EB Garamond', serif;
    }
    html { scroll-behavior: smooth; }
    body { background: var(--bg-light); color: var(--text-dark); font-family: var(--font-mono); -webkit-font-smoothing: antialiased; overflow-x: hidden; }

    /* MOBILE-FIRST BASE STYLES */
    .system-bar { background: var(--accent); color: var(--bg-light); padding: 0.5rem 1rem; font-size: 0.6rem; letter-spacing: 0.18em; text-transform: uppercase; display: flex; justify-content: space-between; font-weight: 700; }
    nav { position: sticky; top: 0; z-index: 100; background: var(--bg-light); border-bottom: var(--rule); display: flex; justify-content: space-between; align-items: center; padding: 0 1.25rem; height: 60px; }
    .nav-meta { display: none; }
    .nav-logo { font-family: var(--font-sans); font-weight: 700; font-size: 0.9rem; letter-spacing: 0.06em; text-transform: uppercase; text-decoration: none; color: var(--text-dark); }
    .nav-book { text-align: right; }
    .nav-book a { display: inline-block; background: var(--accent); color: var(--bg-light); font-weight: 700; font-size: 0.65rem; letter-spacing: 0.14em; text-transform: uppercase; text-decoration: none; padding: 0.5rem 1rem; border-radius: 50px; transition: background 0.2s; }

    .hero { position: relative; min-height: calc(100vh - 60px); display: flex; flex-direction: column; background: #1c1917; overflow: hidden; border-bottom: none; padding: 0; }
    .hero-img { position: relative; width: 100%; height: max(400px, 50vh); min-height: 400px; object-fit: cover; z-index: 1; transition: transform 10s ease; order: -1; flex-shrink: 0; }
    .hero:hover .hero-img { transform: scale(1.05); }
    .hero-overlay { display: none; }
    .hero-content { position: relative; z-index: 3; width: 100%; display: flex; flex-direction: column; padding: clamp(4rem, 10vh, 6rem) 1.5rem 4rem; justify-content: center; flex-grow: 1; }
    .hero-tag { font-size: 0.65rem; letter-spacing: 0.22em; color: var(--accent); text-transform: uppercase; margin-bottom: 1.5rem; display: block; }
    .hero-headline { font-family: var(--font-serif); font-weight: 400; font-size: clamp(1.8rem, 8vw, 3rem); line-height: 1.05; letter-spacing: -0.02em; color: #ffffff; }
    .hero-headline .accent-word { font-style: italic; color: var(--accent); }
    .hero-body { margin-top: 1.5rem; }
    .hero-body p { font-family: var(--font-sans); font-size: 0.85rem; line-height: 1.5; color: rgba(255,255,255,0.7); max-width: 100%; margin-bottom: 1.5rem; }
    .hero-ctas { display: flex; flex-direction: column; gap: 0.75rem; }
    .btn-pill-dark { display: inline-flex; align-items: center; justify-content: center; background: var(--accent); color: var(--bg-light); border: 1px solid var(--accent); padding: 0.8rem 1.5rem; border-radius: 50px; font-family: var(--font-sans); font-weight: 600; font-size: 0.8rem; text-decoration: none; transition: all 0.3s ease; }
    .btn-pill-dark:hover { background: #ffffff; color: var(--text-dark); border-color: #ffffff; }
    .btn-pill-light { display: inline-flex; align-items: center; justify-content: center; background: transparent; color: #ffffff; border: 1px solid rgba(255,255,255,0.3); padding: 0.8rem 1.5rem; border-radius: 50px; font-family: var(--font-sans); font-weight: 600; font-size: 0.8rem; text-decoration: none; transition: all 0.3s ease; }
    .btn-pill-light:hover { border-color: #ffffff; background: rgba(255,255,255,0.05); }

    .status-grid { display: grid; grid-template-columns: 1fr 1fr; border-bottom: var(--rule); }
    .status-item { padding: 1.25rem 1.5rem; border-right: var(--rule); border-bottom: var(--rule); display: flex; align-items: center; gap: 0.75rem; }
    .status-item:nth-child(2n) { border-right: none; }
    .status-item:nth-child(3), .status-item:nth-child(4) { border-bottom: none; }
    .status-dot { width: 8px; height: 8px; background: var(--accent); border-radius: 50%; animation: pulse 2s ease-in-out infinite; }
    @keyframes pulse { 0%,100% { opacity:1; transform:scale(1); } 50% { opacity:0.4; transform:scale(0.8); } }
    .status-text { font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--mid-grey); }
    .status-text strong { color: var(--text-dark); }

    .services { border-bottom: var(--rule); }
    .services-header { display: flex; justify-content: space-between; align-items: center; padding: 1.5rem; border-bottom: var(--rule); }
    .services-header h2, .services-header span { font-size: 0.65rem; letter-spacing: 0.22em; text-transform: uppercase; color: var(--mid-grey); }
    
    .service-row { display: grid; grid-template-columns: 1fr; gap: 1.5rem; padding: 2rem 1.5rem; border-bottom: var(--rule); transition: background 0.15s; }
    .service-index { display: none; }
    .service-img-cell { height: 200px; overflow: hidden; border-radius: 8px; }
    .service-img-cell img { width: 100%; height: 100%; object-fit: cover; }
    .service-info { display: flex; flex-direction: column; gap: 1rem; }
    .service-name { font-family: var(--font-sans); font-weight: 700; font-size: 1.5rem; letter-spacing: -0.03em; text-transform: uppercase; line-height: 1; }
    .service-tags { display: flex; flex-wrap: wrap; gap: 0.5rem; }
    .service-tag { font-size: 0.6rem; letter-spacing: 0.1em; text-transform: uppercase; border: var(--rule-light); border-radius: 50px; padding: 0.3rem 0.8rem; color: var(--mid-grey); }
    .service-specs { display: none; }
    .service-action { display: flex; flex-direction: column; gap: 1.25rem; align-items: flex-start; }
    .service-price { font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--mid-grey); margin-bottom: 0.3rem; }
    .service-price-val { font-family: var(--font-sans); font-weight: 700; font-size: 1.1rem; letter-spacing: -0.02em; color: var(--text-dark); }
    .service-cta { background: transparent; border: var(--rule-light); color: var(--text-dark); font-size: 0.7rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; padding: 0.8rem 1rem; width: 100%; text-align: center; border-radius: 50px; }

    .trust { display: grid; grid-template-columns: 1fr; border-bottom: var(--rule); }
    .trust-left { padding: 3rem 1.5rem; border-bottom: var(--rule); }
    .trust-label { font-size: 0.65rem; letter-spacing: 0.22em; text-transform: uppercase; color: var(--mid-grey); margin-bottom: 2rem; }
    .testimonials { display: flex; flex-direction: column; gap: 2rem; }
    .testi-item { border-left: 2px solid var(--accent); padding-left: 1rem; }
    .testi-quote { font-size: 0.85rem; line-height: 1.6; color: var(--light-grey); margin-bottom: 0.75rem; font-family: var(--font-sans); }
    .testi-source { font-size: 0.65rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--mid-grey); }
    .trust-right { display: grid; grid-template-columns: 1fr 1fr; }
    .kpi-item { padding: 2rem 1.5rem; border-right: var(--rule); border-bottom: var(--rule); }
    .kpi-item:nth-child(2n) { border-right: none; }
    .kpi-item:nth-child(3), .kpi-item:nth-child(4) { border-bottom: none; }
    .kpi-val { font-family: var(--font-sans); font-weight: 700; font-size: 2.25rem; letter-spacing: -0.06em; line-height: 1; color: var(--text-dark); }
    .kpi-val span { color: var(--accent); }
    .kpi-label { font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--mid-grey); margin-top: 0.5rem; }

    .gallery-strip { display: grid; grid-template-columns: 1fr 1fr; height: auto; border-bottom: var(--rule); }
    .gallery-strip-item { overflow: hidden; border-right: var(--rule); border-bottom: var(--rule); height: 150px; }
    .gallery-strip-item:nth-child(n+3) { display: none; }
    .gallery-strip-item img { width: 100%; height: 100%; object-fit: cover; }

    .booking { display: grid; grid-template-columns: 1fr; border-bottom: var(--rule); }
    .booking-left { padding: 4rem 1.5rem; border-bottom: var(--rule); }
    .booking-left h2 { font-family: var(--font-serif); font-weight: 400; font-size: clamp(2rem, 8vw, 4rem); letter-spacing: -0.04em; line-height: 0.95; margin-bottom: 1.5rem; color: var(--text-dark); }
    .booking-left h2 span { font-style: italic; color: var(--accent); }
    .booking-left p { font-family: var(--font-sans); font-size: 0.9rem; line-height: 1.6; color: var(--light-grey); }
    .booking-right { padding: 4rem 1.5rem; }
    .form-field { margin-bottom: 1.5rem; }
    .form-label { display: block; font-size: 0.65rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--mid-grey); margin-bottom: 0.5rem; }
    .form-input, .form-select { width: 100%; background: transparent; border: none; border-bottom: var(--rule-light); color: var(--text-dark); font-family: var(--font-mono); font-size: 0.85rem; padding: 0.75rem 0; outline: none; }
    .form-row { display: grid; grid-template-columns: 1fr; gap: 1.5rem; }
    .form-submit { margin-top: 2rem; width: 100%; background: var(--accent); color: var(--bg-light); border: none; font-weight: 700; font-size: 0.8rem; letter-spacing: 0.14em; text-transform: uppercase; padding: 1.25rem 2rem; cursor: pointer; border-radius: 50px; }

    footer { display: grid; grid-template-columns: 1fr; border-top: var(--rule); }
    .footer-col { padding: 2.5rem 1.5rem; border-bottom: var(--rule); }
    .footer-col:last-child { border-bottom: none; }
    .footer-col-label { font-size: 0.65rem; letter-spacing: 0.22em; text-transform: uppercase; color: var(--mid-grey); margin-bottom: 1.25rem; }
    .footer-col p, .footer-col a { font-size: 0.8rem; line-height: 2; color: var(--mid-grey); text-decoration: none; }
    .footer-bottom { border-top: var(--rule); padding: 1.5rem; display: flex; flex-direction: column; gap: 1rem; align-items: flex-start; }
    .footer-bottom p, .footer-chitramaya-link { font-size: 0.65rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--mid-grey); }

    .whatsapp-fab { position: fixed; bottom: 1.5rem; right: 1.5rem; z-index: 999; display: flex; align-items: center; justify-content: center; background: #25D366; color: #fff; text-decoration: none; padding: 0.9rem; border-radius: 50%; box-shadow: 0 4px 24px rgba(37,211,102,0.35); }
    .whatsapp-fab span { display: none; }
    .whatsapp-fab svg { width: 22px; height: 22px; fill: #fff; }

    /* PROGRESSIVE ENHANCEMENT (TABLET & DESKTOP) */
    @media (min-width: 768px) {
      .system-bar { padding: 0.5rem 2rem; font-size: 0.72rem; }
      nav { display: grid; grid-template-columns: 1fr auto 1fr; padding: 0 2rem; }
      .nav-meta { display: block; }
      .nav-logo { font-size: 1rem; }
      .nav-book a { padding: 0.6rem 1.4rem; font-size: 0.72rem; }
      .nav-book a:hover, .btn-pill-dark:hover { background: var(--accent); color: var(--bg-light); border-color: var(--accent); }

      
      .status-grid { grid-template-columns: repeat(4, 1fr); }
      .status-item { padding: 1.5rem 2rem; border-right: var(--rule); border-bottom: none; }
      .status-text { font-size: 0.7rem; }

      .services-header { padding: 2rem; }
      .services-header h2, .services-header span { font-size: 0.72rem; }
      .service-row { grid-template-columns: 80px 1fr 1fr 1fr 200px; padding: 0; align-items: stretch; gap: 0; cursor: pointer; }
      .service-row:hover { background: rgba(169,111,68,0.08); }
      .service-index { display: flex; padding: 2.5rem 2rem; border-right: var(--rule); font-size: 0.7rem; letter-spacing: 0.14em; }
      .service-img-cell { height: auto; border-right: var(--rule); border-radius: 0; }
      .service-row:hover .service-img-cell img { transform: scale(1.05); }
      .service-info { padding: 2.5rem 2rem; border-right: var(--rule); justify-content: space-between; gap: 0; }
      .service-name { font-size: 1.8rem; margin-bottom: 1rem; }
      .service-tag { font-size: 0.65rem; }
      .service-specs { display: block; padding: 2.5rem 2rem; border-right: var(--rule); }
      .spec-list { list-style: none; }
      .spec-list li { font-size: 0.8rem; line-height: 2.2; color: var(--mid-grey); padding-left: 1.2rem; position: relative; font-family: var(--font-sans); }
      .spec-list li::before { content: '+'; position: absolute; left: 0; color: var(--accent); }
      .service-action { padding: 2.5rem 2rem; justify-content: space-between; gap: 0; }
      .service-price { font-size: 0.7rem; }
      .service-price-val { font-size: 1.5rem; }
      .service-cta { width: auto; padding: 0.9rem 1rem; text-align: left; display: flex; justify-content: space-between; }
      .service-cta:hover { background: var(--accent); color: var(--bg-light); border-color: var(--accent); }

      .trust { grid-template-columns: 1fr 1fr; }
      .trust-left { padding: 4rem 3rem; border-right: var(--rule); border-bottom: none; }
      .trust-label { font-size: 0.68rem; margin-bottom: 2rem; }
      .testi-quote { font-size: 0.9rem; margin-bottom: 0.75rem; }
      .kpi-item { padding: 3rem 2.5rem; }
      .kpi-val { font-size: 3rem; }
      .kpi-label { font-size: 0.7rem; margin-top: 0.75rem; }

      .gallery-strip { grid-template-columns: repeat(5, 1fr); height: 300px; }
      .gallery-strip-item { border-bottom: none; height: auto; }
      .gallery-strip-item:nth-child(n+3) { display: block; }
      .gallery-strip-item:hover img { transform: scale(1.08); }

      .booking { grid-template-columns: 1.2fr 1fr; }
      .booking-left { padding: 5rem 2rem 5rem 8vw; border-right: var(--rule); border-bottom: none; }
      .booking-left h2 { font-size: clamp(3rem, 5vw, 5rem); margin-bottom: 2rem; }
      .booking-left p { font-size: 1rem; max-width: 400px; }
      .booking-right { padding: 5rem 3rem; }
      .form-row { grid-template-columns: 1fr 1fr; }
      .form-input, .form-select { font-size: 0.9rem; transition: border-color 0.2s; }
      .form-input:focus, .form-select:focus { border-color: var(--accent); }
      .form-submit { margin-top: 2.5rem; width: 100%; display: flex; justify-content: center; padding: 1.25rem 2rem; font-size: 0.85rem; }
      .form-submit:hover { background: var(--text-dark); }

      footer { grid-template-columns: 1fr 1fr 1fr; }
      .footer-col { padding: 3rem 2rem; border-right: var(--rule); border-bottom: none; }
      .footer-col-label { font-size: 0.65rem; margin-bottom: 1.5rem; }
      .footer-col p, .footer-col a { font-size: 0.8rem; transition: color 0.2s; }
      .footer-col a:hover { color: var(--text-dark); }
      .footer-bottom { flex-direction: row; justify-content: space-between; align-items: center; padding: 1.25rem 2rem; }
      .footer-bottom p, .footer-chitramaya-link { font-size: 0.68rem; }

      .whatsapp-fab { padding: 0.85rem 1.5rem 0.85rem 1.1rem; border-radius: 50px; gap: 0.75rem; font-size: 0.8rem; transition: transform 0.25s, box-shadow 0.25s ease; animation: waDrift 4s ease-in-out infinite; }
      .whatsapp-fab span { display: inline; }
      .whatsapp-fab:hover { transform: scale(1.07) translateY(-2px); box-shadow: 0 8px 32px rgba(37,211,102,0.5); animation: none; }
    }
  
    /* ULTRA-FLUID DESKTOP HERO */
    @media (min-width: 992px) and (min-height: 600px) {
      .hero { align-items: center; justify-content: flex-start; flex-direction: row; min-height: calc(100vh - 60px); }
      .hero-img { position: absolute; inset: 0; height: 100%; width: 100%; order: 0; }
      .hero-overlay { display: block; position: absolute; inset: 0; background: linear-gradient(to right, rgba(28,25,23,0.9) 0%, rgba(28,25,23,0.4) 50%, transparent 100%); z-index: 2; pointer-events: none; }
      .hero-content { padding: 4rem 3rem 4rem 8vw; max-width: 800px; }
      .hero-headline { font-size: clamp(2.5rem, 4.5vw, 4rem); margin-bottom: 1.5rem; }
      .hero-body { margin-top: 0; }
      .hero-body p { font-size: 1rem; max-width: 480px; margin-bottom: 2.5rem; }
      .hero-ctas { flex-direction: row; }
      .btn-pill-dark, .btn-pill-light { padding: 1rem 2rem; font-size: 0.85rem; }
    }
    
  </style>
</head>
<body>

  <div class="system-bar">
    <span>[ Thalam Studio — Ad Shoots · Baby Photography · Operational ]</span>
    <span> · WhatsApp: +91 98765 43210</span>
  </div>

  <nav>
    <div class="nav-meta"></div>
    <a href="<?php echo home_url('/thalam-studio'); ?>" class="nav-logo">Thalam Studio</a>
    <div class="nav-book"><a href="#booking">Book a Session ↓</a></div>
  </nav>

  <section class="hero" id="hero">
    <img class="hero-img"
      src="<?php echo esc_url( get_field('thalam_hero_img_url') ?: 'https://images.unsplash.com/photo-1664817550969-5e76adc4a3fe?w=2400&q=90&auto=format&fit=crop' ); ?>"
      alt="Top-down view of professional photography gear, Sony Alpha and Canon lenses — Thalam Studio."
      loading="eager">
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <span class="hero-tag"><?php echo esc_html( get_field('thalam_hero_tag') ?: 'Thalam Studio' ); ?></span>
      <h1 class="hero-headline"><?php echo wp_kses_post( get_field('thalam_hero_headline') ?: 'A sanctuary for light, space, and creative <span class="accent-word">precision.</span>' ); ?></h1>
      <div class="hero-body">
        <p><?php echo wp_kses_post( get_field('thalam_hero_body') ?: 'A purpose-built, 2,400 sq ft production environment engineered for high-volume e-commerce, commercial ad shoots, and precision tabletop photography.' ); ?></p>
        <div class="hero-ctas">
          <a href="#booking" class="btn-pill-dark">Book The Studio</a>
          <a href="#services" class="btn-pill-light">View Capabilities</a>
        </div>
      </div>
    </div>
  </section>

  <div class="status-grid">
    <div class="status-item"><div class="status-dot"></div><div class="status-text"><?php echo wp_kses_post( get_field('thalam_status_1') ?: '<strong>3 Sessions</strong> Active Today' ); ?></div></div>
    <div class="status-item"><div class="status-dot"></div><div class="status-text"><?php echo wp_kses_post( get_field('thalam_status_2') ?: 'Delivery: <strong>&lt;48 Hours</strong>' ); ?></div></div>
    <div class="status-item"><div class="status-dot"></div><div class="status-text"><?php echo wp_kses_post( get_field('thalam_status_3') ?: 'Next Available: <strong>July 18</strong>' ); ?></div></div>
    <div class="status-item"><div class="status-dot"></div><div class="status-text"><?php echo wp_kses_post( get_field('thalam_status_4') ?: 'Format: <strong>Medium Format · Full Frame</strong>' ); ?></div></div>
  </div>

  <section class="services" id="services">
    <div class="services-header">
      <h2><?php echo esc_html( get_field('thalam_services_title') ?: 'Service Directory // 4 Active' ); ?></h2>
      <span>All inclusive of editing &amp; licensing</span>
    </div>

    <!-- Ad Shoots -->
    <div class="service-row" id="service-ad-shoots">
      <div class="service-index">01</div>
      <div class="service-img-cell">
        <img src="<?php echo esc_url( get_field('thalam_service_1_img') ?: 'https://images.unsplash.com/photo-1758613655304-48776efb25d8?w=800&q=90&auto=format&fit=crop' ); ?>"
          alt="Professional photographer shooting a model in a high-end studio setting — Thalam Studio ad photography.">
      </div>
      <div class="service-info">
        <div><h3 class="service-name"><?php echo esc_html( get_field('thalam_service_1_title') ?: 'Ad Shoots' ); ?></h3>
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
        <div><div class="service-price">Starting From</div><div class="service-price-val"><?php echo wp_kses_post( get_field('thalam_service_1_price') ?: '&#8377;25,000' ); ?></div></div>
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
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1606814893907-c2e42943c91f?w=800&q=90&auto=format&fit=crop" alt="Woman in white hijab in grayscale — Thalam Studio fine-art portraiture."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1776090188315-c481a5753867?w=800&q=90&auto=format&fit=crop" alt="Vast empty industrial warehouse with overhead lighting — Thalam Studio industrial photography."></div>
    <div class="gallery-strip-item"><img src="<?php echo content_url('themes/chitramaya/assets/img/wedding-staircase.jpg'); ?>" alt="A bride and groom standing on a staircase — Thalam Studio wedding photography."></div>
    <div class="gallery-strip-item"><img src="<?php echo content_url('themes/chitramaya/assets/img/maternity-newborn.jpg'); ?>" alt="A woman holding a newborn baby in her arms — Thalam Studio maternity and newborn."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1656633702381-939966720da4?w=800&q=90&auto=format&fit=crop" alt="A baby sleeping peacefully on a blanket — Thalam Studio newborn photography."></div>
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
      <h2><?php echo wp_kses_post( get_field('thalam_booking_headline') ?: 'Book a<br><span>Session</span>' ); ?></h2>
      <p><?php echo wp_kses_post( get_field('thalam_booking_body') ?: 'Fill in the brief on the right and we will respond within 4 business hours with availability, crew allocation, and a formal quote. No obligations.' ); ?></p>
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
      <a href="<?php echo home_url('/'); ?>" style="color:var(--text-dark);font-weight:700;">Chitramaya Creatives ↗</a>
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
