<?php
/**
 * Template Name: Chitramaya Creatives
 * Template Post Type: page
 * Description: Full-page enterprise portfolio landing for Chitramaya Creatives.
 */
// Bypass WordPress header/footer entirely — full design control
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chitramaya Creatives — Photography Studio</title>
  <meta name="description" content="Chitramaya Creatives — Ad shoots, baby photography, and visual storytelling from Thalam Studio, Kerala. Every image is made to be felt.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/chitramaya')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=EB+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --black: var(--wp--preset--color--chitramaya-black, #080808);
      --white: var(--wp--preset--color--chitramaya-white, #F5F4F0);
      --warm-grey: var(--wp--preset--color--chitramaya-warm-grey, #B8B5B0);
      --accent: var(--wp--preset--color--chitramaya-accent, #C8A96E);
      --border: 1px solid rgba(255,255,255,0.12);
      --font-sans: var(--wp--preset--font-family--inter, 'Inter', sans-serif);
      --font-serif: 'EB Garamond', serif;
    }
    html { scroll-behavior: smooth; }
    body { background: var(--black); color: var(--white); font-family: var(--font-sans); -webkit-font-smoothing: antialiased; overflow-x: hidden; }

    /* NAV */
    nav { position: fixed; top: 0; left: 0; right: 0; z-index: 100; display: flex; justify-content: space-between; align-items: center; padding: 1.5rem 3rem; }
    .nav-logo { font-weight: 900; font-size: 0.9rem; letter-spacing: 0.18em; text-transform: uppercase; text-decoration: none; color: var(--white); }
    .nav-links { display: flex; gap: 2.5rem; list-style: none; align-items: center; }
    .nav-links a { font-size: 0.8rem; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; color: var(--warm-grey); transition: color 0.2s; }
    .nav-links a:hover { color: var(--white); }
    .nav-thalam-pill { display: inline-flex; align-items: center; gap: 0.5rem; background: var(--accent); color: var(--black) !important; padding: 0.45rem 1.1rem; font-size: 0.72rem !important; font-weight: 700; letter-spacing: 0.14em !important; text-transform: uppercase; text-decoration: none; transition: background 0.2s, transform 0.2s !important; }
    .nav-thalam-pill:hover { background: var(--white) !important; transform: translateY(-1px); color: var(--black) !important; }

    /* HERO */
    .hero { position: relative; height: 100vh; width: 100%; overflow: hidden; cursor: crosshair; }
    .hero-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 25%; filter: brightness(0.55) contrast(1.08) saturate(0.85); transform: scale(1.04); transition: transform 12s cubic-bezier(0.25,0.46,0.45,0.94), filter 1.2s ease; }
    .hero.loaded .hero-img { transform: scale(1.0); }
    .hero-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(8,8,8,1) 0%, rgba(8,8,8,0.0) 45%), linear-gradient(to right, rgba(8,8,8,0.5) 0%, transparent 55%); }
    .hero-grain { position: absolute; inset: 0; opacity: 0.04; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E"); pointer-events: none; }
    .hero-cursor-glow { position: absolute; width: 400px; height: 400px; border-radius: 50%; background: radial-gradient(circle, rgba(200,169,110,0.08) 0%, transparent 70%); pointer-events: none; transform: translate(-50%, -50%); transition: opacity 0.3s; opacity: 0; }
    .hero-brand { position: absolute; top: 50%; left: 3rem; transform: translateY(-50%); display: flex; flex-direction: column; gap: 1.2rem; }
    .hero-brand-name { font-family: var(--font-sans); font-weight: 900; font-size: clamp(3.5rem, 8vw, 9rem); line-height: 0.88; letter-spacing: -0.05em; text-transform: uppercase; }
    .hero-brand-name em { display: block; font-family: var(--font-serif); font-style: italic; font-weight: 400; font-size: 0.52em; color: var(--accent); letter-spacing: 0.02em; line-height: 1.5; text-transform: none; }
    .hero-corner { position: absolute; bottom: 3.5rem; right: 3rem; text-align: right; display: flex; flex-direction: column; gap: 1.5rem; align-items: flex-end; }
    .hero-fragment { font-family: var(--font-serif); font-style: italic; font-size: clamp(1rem, 1.6vw, 1.4rem); color: rgba(245,244,240,0.55); line-height: 1.6; max-width: 260px; }
    .hero-insta { display: inline-flex; align-items: center; gap: 0.6rem; text-decoration: none; font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: rgba(245,244,240,0.4); transition: color 0.3s; }
    .hero-insta:hover { color: var(--accent); }
    .hero-insta svg { width: 14px; height: 14px; fill: currentColor; }
    .hero-scroll { position: absolute; bottom: 3.5rem; left: 3rem; display: flex; flex-direction: column; align-items: flex-start; gap: 0.75rem; }
    .scroll-line { width: 1px; height: 60px; background: linear-gradient(to bottom, var(--accent), transparent); animation: scrollAnim 2.5s ease-in-out infinite; }
    .scroll-label { font-size: 0.65rem; letter-spacing: 0.3em; text-transform: uppercase; color: rgba(245,244,240,0.3); writing-mode: vertical-rl; transform: rotate(180deg); }
    @keyframes scrollAnim { 0%,100% { opacity:1; transform:scaleY(1) translateY(0); } 50% { opacity:0.2; transform:scaleY(0.4) translateY(-10px); } }

    /* MANIFESTO */
    .manifesto { padding: 8rem 3rem; display: grid; grid-template-columns: 1fr 1fr; gap: 6rem; align-items: center; border-top: var(--border); }
    .manifesto-label { font-size: 0.72rem; letter-spacing: 0.22em; text-transform: uppercase; color: var(--accent); margin-bottom: 2rem; }
    .manifesto-text { font-family: var(--font-serif); font-size: clamp(2rem, 3.5vw, 3.2rem); line-height: 1.25; }
    .manifesto-body { font-size: 1rem; line-height: 1.8; color: var(--warm-grey); margin-bottom: 3rem; }
    .manifesto-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; border-top: var(--border); padding-top: 2.5rem; }
    .stat-num { font-weight: 900; font-size: 2.5rem; letter-spacing: -0.04em; }
    .stat-label { font-size: 0.78rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--warm-grey); margin-top: 0.25rem; }

    /* THALAM AD SECTION */
    .thalam-ad { position: relative; height: 100vh; overflow: hidden; display: flex; align-items: flex-end; border-top: var(--border); }
    .thalam-ad-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 35%; filter: brightness(0.35) contrast(1.15) saturate(0.7); transform: scale(1.03); transition: transform 10s ease, filter 0.6s ease; }
    .thalam-ad:hover .thalam-ad-bg { transform: scale(1.0); filter: brightness(0.5) contrast(1.1) saturate(0.85); }
    .thalam-ad-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(8,8,8,1) 0%, rgba(8,8,8,0.15) 55%), linear-gradient(to right, rgba(8,8,8,0.6) 0%, transparent 60%); }
    .thalam-ad-corner { position: absolute; top: 3rem; right: 3rem; font-size: 0.65rem; letter-spacing: 0.22em; text-transform: uppercase; color: rgba(245,244,240,0.3); text-align: right; }
    .thalam-ad-content { position: relative; padding: 0 3rem 5rem; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: flex-end; width: 100%; }
    .thalam-ad-eyebrow { font-size: 0.68rem; letter-spacing: 0.28em; text-transform: uppercase; color: var(--accent); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem; }
    .thalam-ad-eyebrow::before { content: ''; display: inline-block; width: 28px; height: 1px; background: var(--accent); }
    .thalam-ad-headline { font-family: var(--font-sans); font-weight: 900; font-size: clamp(3.5rem, 7vw, 8rem); line-height: 0.88; letter-spacing: -0.04em; text-transform: uppercase; }
    .thalam-ad-headline em { display: block; font-family: var(--font-serif); font-style: italic; font-weight: 400; color: var(--accent); font-size: 0.65em; letter-spacing: 0; }
    .thalam-ad-right { display: flex; flex-direction: column; gap: 2.5rem; justify-content: flex-end; }
    .thalam-ad-services { display: grid; grid-template-columns: 1fr 1fr; gap: 0; border: var(--border); }
    .thalam-service-chip { padding: 1.25rem 1.5rem; border-right: var(--border); border-bottom: var(--border); }
    .thalam-service-chip:nth-child(2n) { border-right: none; }
    .thalam-service-chip:nth-last-child(-n+2) { border-bottom: none; }
    .thalam-service-chip-label { font-size: 0.65rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--accent); margin-bottom: 0.4rem; }
    .thalam-service-chip-title { font-weight: 700; font-size: 1rem; letter-spacing: -0.02em; text-transform: uppercase; }
    .thalam-ad-cta { display: inline-flex; align-items: center; justify-content: space-between; gap: 2rem; background: var(--accent); color: var(--black); text-decoration: none; padding: 1.35rem 2rem; font-weight: 700; font-size: 0.82rem; letter-spacing: 0.14em; text-transform: uppercase; transition: background 0.25s, transform 0.25s; }
    .thalam-ad-cta:hover { background: var(--white); transform: translateX(4px); }
    .thalam-ad-cta-arrow { font-size: 1.2rem; transition: transform 0.25s; }
    .thalam-ad-cta:hover .thalam-ad-cta-arrow { transform: translateX(6px); }

    /* TACTILE GRID */
    .tactile-section { padding: 0 3rem 8rem; }
    .section-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 3rem; padding-bottom: 1.5rem; border-bottom: var(--border); }
    .section-title { font-weight: 900; font-size: clamp(2rem, 4vw, 4rem); letter-spacing: -0.03em; text-transform: uppercase; line-height: 1; }
    .section-link { font-size: 0.78rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--accent); text-decoration: none; border-bottom: 1px solid var(--accent); padding-bottom: 2px; }
    .tactile-grid { display: grid; grid-template-columns: 1.6fr 1fr; grid-template-rows: auto auto; gap: 0.75rem; }
    .tactile-item { position: relative; overflow: hidden; cursor: pointer; }
    .tactile-item:nth-child(1) { grid-row: 1 / 3; height: 85vh; }
    .tactile-item:nth-child(2) { height: 40vh; }
    .tactile-item:nth-child(3) { height: 44vh; }
    .tactile-img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.7s cubic-bezier(0.25,0.46,0.45,0.94), filter 0.4s ease; filter: brightness(0.75) saturate(0.9); }
    .tactile-item:hover .tactile-img { transform: scale(1.06); filter: brightness(0.88) saturate(1.1); }
    .tactile-caption { position: absolute; bottom: 0; left: 0; right: 0; padding: 2.5rem 2rem 1.5rem; background: linear-gradient(to top, rgba(8,8,8,0.9), transparent); transform: translateY(100%); transition: transform 0.4s ease; }
    .tactile-item:hover .tactile-caption { transform: translateY(0); }
    .tactile-caption h3 { font-family: var(--font-serif); font-style: italic; font-size: 1.3rem; margin-bottom: 0.4rem; }
    .tactile-caption p { font-size: 0.75rem; letter-spacing: 0.1em; text-transform: uppercase; color: var(--warm-grey); }
    .tactile-cta { display: inline-block; margin-top: 0.8rem; font-size: 0.72rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--accent); text-decoration: none; border-bottom: 1px solid var(--accent); }

    /* SERVICES */
    .services { border-top: var(--border); border-bottom: var(--border); display: grid; grid-template-columns: repeat(3, 1fr); }
    .service-item { padding: 4rem 3rem; border-right: var(--border); transition: background 0.3s; }
    .service-item:last-child { border-right: none; }
    .service-item:hover { background: rgba(200,169,110,0.06); }
    .service-num { font-size: 0.7rem; letter-spacing: 0.22em; color: var(--accent); text-transform: uppercase; margin-bottom: 2rem; display: block; }
    .service-title { font-weight: 900; font-size: 1.8rem; letter-spacing: -0.03em; text-transform: uppercase; margin-bottom: 1.25rem; line-height: 1; }
    .service-desc { font-size: 0.9rem; line-height: 1.75; color: var(--warm-grey); margin-bottom: 2.5rem; }
    .service-btn { display: inline-flex; align-items: center; gap: 0.75rem; font-size: 0.75rem; letter-spacing: 0.14em; text-transform: uppercase; text-decoration: none; color: var(--white); border-bottom: 1px solid rgba(255,255,255,0.25); padding-bottom: 4px; transition: all 0.2s; }
    .service-btn:hover { color: var(--accent); border-color: var(--accent); }
    .service-btn::after { content: '→'; transition: transform 0.2s; }
    .service-btn:hover::after { transform: translateX(4px); }

    /* PROCESS */
    .process { padding: 8rem 3rem; }
    .process-steps { display: grid; grid-template-columns: repeat(4, 1fr); margin-top: 5rem; border-top: var(--border); }
    .process-step { padding: 3rem 2.5rem 3rem 0; border-right: var(--border); }
    .process-step:last-child { border-right: none; padding-left: 2.5rem; padding-right: 0; }
    .process-step:not(:first-child) { padding-left: 2.5rem; }
    .step-num { font-weight: 900; font-size: 4rem; color: rgba(200,169,110,0.15); line-height: 1; margin-bottom: 1.5rem; letter-spacing: -0.04em; }
    .step-title { font-weight: 700; font-size: 1.1rem; text-transform: uppercase; margin-bottom: 1rem; }
    .step-desc { font-size: 0.88rem; line-height: 1.75; color: var(--warm-grey); }

    /* TESTIMONIAL */
    .testimonial { padding: 8rem 3rem; border-top: var(--border); display: grid; grid-template-columns: 1fr 2fr; gap: 6rem; align-items: center; }
    .testimonial-label { font-size: 0.72rem; letter-spacing: 0.22em; text-transform: uppercase; color: var(--accent); }
    .testimonial-quote { font-family: var(--font-serif); font-size: clamp(1.6rem, 2.5vw, 2.4rem); line-height: 1.4; font-style: italic; }
    .testimonial-author { margin-top: 2.5rem; font-size: 0.8rem; letter-spacing: 0.12em; text-transform: uppercase; color: var(--warm-grey); }

    /* CTA BANNER */
    .cta-banner { position: relative; height: 65vh; overflow: hidden; display: flex; align-items: center; justify-content: center; text-align: center; flex-direction: column; gap: 3rem; }
    .cta-banner-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 40%; filter: brightness(0.3) contrast(1.2); }
    .cta-banner-content { position: relative; }
    .cta-banner-title { font-weight: 900; font-size: clamp(3rem, 7vw, 8rem); letter-spacing: -0.04em; text-transform: uppercase; line-height: 0.9; }
    .cta-banner-title em { font-family: var(--font-serif); font-style: italic; color: var(--accent); }
    .cta-banner-btn { position: relative; display: inline-flex; align-items: center; gap: 1rem; text-decoration: none; background: var(--accent); color: var(--black); padding: 1.25rem 3rem; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.14em; text-transform: uppercase; transition: all 0.3s; }
    .cta-banner-btn:hover { background: var(--white); }

    /* FOOTER */
    footer { padding: 3rem; border-top: var(--border); display: flex; justify-content: space-between; align-items: center; }
    footer p { font-size: 0.78rem; color: var(--warm-grey); letter-spacing: 0.1em; }
    .footer-thalam { display: flex; align-items: center; gap: 1rem; }
    .footer-thalam span { font-size: 0.72rem; letter-spacing: 0.14em; text-transform: uppercase; color: var(--warm-grey); }
    .footer-thalam a { font-size: 0.78rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; text-decoration: none; color: var(--accent); border-bottom: 1px solid var(--accent); padding-bottom: 2px; }

    /* WHATSAPP */
    .whatsapp-fab { position: fixed; bottom: 2rem; right: 2rem; z-index: 999; display: flex; align-items: center; gap: 0.75rem; background: #25D366; color: #fff; text-decoration: none; padding: 0.85rem 1.5rem 0.85rem 1.1rem; border-radius: 50px; font-size: 0.8rem; font-weight: 700; letter-spacing: 0.06em; box-shadow: 0 4px 24px rgba(37,211,102,0.35); transition: transform 0.25s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.25s ease; animation: waDrift 4s ease-in-out infinite; }
    .whatsapp-fab:hover { transform: scale(1.07) translateY(-2px); box-shadow: 0 8px 32px rgba(37,211,102,0.5); animation: none; }
    .whatsapp-fab svg { width: 22px; height: 22px; fill: #fff; flex-shrink: 0; }
    @keyframes waDrift { 0%,100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }

    /* RESPONSIVE */
    @media (max-width: 768px) {
      nav { padding: 1.5rem; }
      .nav-links { gap: 1.5rem; }
      .hero-brand { left: 1.5rem; }
      .hero-brand-name { font-size: clamp(2.8rem, 14vw, 5rem); }
      .hero-corner { right: 1.5rem; bottom: 2.5rem; }
      .hero-scroll { left: 1.5rem; }
      .thalam-ad-content { grid-template-columns: 1fr; padding: 0 1.5rem 4rem; gap: 2rem; }
      .thalam-ad-services { grid-template-columns: 1fr; }
      .thalam-service-chip { border-right: none; }
      .whatsapp-fab span { display: none; }
      .whatsapp-fab { padding: 0.9rem; border-radius: 50%; }
    }
  </style>
</head>
<body>
  <nav>
    <a href="<?php echo home_url('/'); ?>" class="nav-logo">Chitramaya Creatives</a>
    <ul class="nav-links">
      <li><a href="#work">Work</a></li>
      <li><a href="#process">Process</a></li>
      <li><a href="#contact">Commission</a></li>
      <li><a href="#thalam" class="nav-thalam-pill">Thalam Studio ↗</a></li>
    </ul>
  </nav>

  <!-- HERO — show, don't tell -->
  <section class="hero" id="hero">
    <div class="hero-cursor-glow" id="hero-glow"></div>
    <img class="hero-img"
      src="https://images.unsplash.com/photo-1750645438141-7deb206e17f6?w=2400&q=90&auto=format&fit=crop"
      alt="Fine-art studio portrait with vibrant abstract paint — Chitramaya Creatives"
      loading="eager"
      onload="this.closest('.hero').classList.add('loaded')">
    <div class="hero-overlay"></div>
    <div class="hero-grain"></div>
    <div class="hero-brand">
      <h1 class="hero-brand-name">Chitra<br>maya<em>Creatives</em></h1>
    </div>
    <div class="hero-corner">
      <p class="hero-fragment">Light, texture,<br>and the weight<br>of a real moment.</p>
      <a href="https://www.instagram.com/chithramaya_creatives" target="_blank" rel="noopener" class="hero-insta">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        @chithramaya_creatives
      </a>
    </div>
    <div class="hero-scroll">
      <div class="scroll-line"></div>
      <span class="scroll-label">Scroll</span>
    </div>
  </section>

  <!-- MANIFESTO -->
  <section class="manifesto" id="about">
    <div>
      <div class="manifesto-label">Chitramaya Creatives — Our Creed</div>
      <h2 class="manifesto-text">Every photograph is a physical argument that the world is worth feeling.</h2>
    </div>
    <div>
      <p class="manifesto-body">Founded on the belief that the greatest failure of digital photography is its inability to replicate touch, Chitramaya Creatives engineers each image to overcome that limitation. Through rigorous light architecture, uncompressed medium-format capture, and obsessive post-production restraint, we produce photographs that your audience does not just look at — they experience.</p>
      <div class="manifesto-stats">
        <div><div class="stat-num">340+</div><div class="stat-label">Campaigns Delivered</div></div>
        <div><div class="stat-num">12yr</div><div class="stat-label">Visual Authority</div></div>
        <div><div class="stat-num">96%</div><div class="stat-label">Client Retention</div></div>
        <div><div class="stat-num">3</div><div class="stat-label">National Awards</div></div>
      </div>
    </div>
  </section>

  <!-- THALAM STUDIO AD SECTION -->
  <section class="thalam-ad" id="thalam">
    <img class="thalam-ad-bg"
      src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=2400&q=90&auto=format&fit=crop"
      alt="Professional studio set with dramatic lighting — Thalam Studio, Chitramaya Creatives"
      loading="lazy">
    <div class="thalam-ad-overlay"></div>
    <div class="thalam-ad-corner">Thalam Studio — Chitramaya Production Hub</div>
    <div class="thalam-ad-content">
      <div>
        <div class="thalam-ad-eyebrow">Studio. Story. Shoot.</div>
        <h2 class="thalam-ad-headline">Your <em>brand,</em> lit right.</h2>
      </div>
      <div class="thalam-ad-right">
        <div class="thalam-ad-services">
          <div class="thalam-service-chip">
            <div class="thalam-service-chip-label">Ad Shoots</div>
            <div class="thalam-service-chip-title">Commercial</div>
          </div>
          <div class="thalam-service-chip">
            <div class="thalam-service-chip-label">First Year</div>
            <div class="thalam-service-chip-title">Baby Sessions</div>
          </div>
          <div class="thalam-service-chip">
            <div class="thalam-service-chip-label">Controlled Light</div>
            <div class="thalam-service-chip-title">Product Shoots</div>
          </div>
          <div class="thalam-service-chip">
            <div class="thalam-service-chip-label">Podcast Studio</div>
            <div class="thalam-service-chip-title">Book a Date</div>
          </div>
        </div>
        <a href="<?php echo home_url('/thalam-studio'); ?>" class="thalam-ad-cta">
          <span>Book the Studio</span>
          <span class="thalam-ad-cta-arrow">→</span>
        </a>
      </div>
    </div>
  </section>

  <!-- TACTILE WORK GRID -->
  <section class="tactile-section" id="work">
    <div class="section-header">
      <h2 class="section-title">Selected Work</h2>
      <a href="#" class="section-link">View Full Archive</a>
    </div>
    <div class="tactile-grid">
      <div class="tactile-item">
        <img class="tactile-img"
          src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=1600&q=90&auto=format&fit=crop"
          alt="High-contrast studio portrait of a woman lit by a single dramatic sidelight, revealing every facial texture and emotional depth — Brand Identity Campaign for Heritage Label Co. by Chitramaya Creatives.">
        <div class="tactile-caption">
          <h3>Heritage Label Co. — Identity</h3>
          <p>Portrait · Brand Campaign · 2024</p>
          <a href="#" class="tactile-cta">View Case Study →</a>
        </div>
      </div>
      <div class="tactile-item">
        <img class="tactile-img"
          src="https://images.unsplash.com/photo-1570913149827-d2ac84ab3f9a?w=1200&q=90&auto=format&fit=crop"
          alt="Macro photograph of a freshly cut apple where moisture and fruit fibre are rendered with extraordinary tactile realism — Product Photography for Orchard Collective by Chitramaya Creatives.">
        <div class="tactile-caption">
          <h3>Orchard Collective — Product</h3>
          <p>Macro · E-Commerce · 2024</p>
          <a href="#" class="tactile-cta">View Case Study →</a>
        </div>
      </div>
      <div class="tactile-item">
        <img class="tactile-img"
          src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1200&q=90&auto=format&fit=crop"
          alt="Brutalist concrete interior with raking natural light casting hard geometric shadows — Architectural documentation for Forma Studio by Chitramaya Creatives.">
        <div class="tactile-caption">
          <h3>Forma Studio — Architecture</h3>
          <p>Architectural · Editorial · 2023</p>
          <a href="#" class="tactile-cta">View Case Study →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section class="services" id="services">
    <div class="service-item">
      <span class="service-num">01 // Service</span>
      <h3 class="service-title">Ad Shoots</h3>
      <p class="service-desc">Commercial photography that sells. Conceived, lit, and delivered from Thalam Studio — with the art direction, brand alignment, and production value your campaign demands.</p>
      <a href="<?php echo home_url('/thalam-studio'); ?>#booking" class="service-btn">Book an Ad Shoot</a>
    </div>
    <div class="service-item">
      <span class="service-num">02 // Service</span>
      <h3 class="service-title">Baby &amp; Newborn</h3>
      <p class="service-desc">The first year passes in a breath. Our baby sessions at Thalam Studio are crafted to capture weight, warmth, and the particular softness of new life — before it changes.</p>
      <a href="<?php echo home_url('/thalam-studio'); ?>#booking" class="service-btn">Book a Baby Session</a>
    </div>
    <div class="service-item">
      <span class="service-num">03 // Service</span>
      <h3 class="service-title">Editorial &amp; Portfolio</h3>
      <p class="service-desc">For brands, artists, and creative directors who need a visual partner that understands narrative. We treat each commission as a short film — with intention, conflict, and resolution.</p>
      <a href="#contact" class="service-btn">Commission Editorial Work</a>
    </div>
  </section>

  <!-- PROCESS -->
  <section class="process" id="process">
    <div class="section-header"><h2 class="section-title">How We Work</h2></div>
    <div class="process-steps">
      <div class="process-step"><div class="step-num">01</div><h3 class="step-title">Brief &amp; Discovery</h3><p class="step-desc">We spend the first week understanding your audience's psychology, competitive landscape, and the specific emotional response your images must trigger. No camera is touched until this is complete.</p></div>
      <div class="process-step"><div class="step-num">02</div><h3 class="step-title">Light Architecture</h3><p class="step-desc">Every shoot has a designed lighting plan based on the tactile quality we need to extract from the subject. We treat the studio as a precision instrument, not a backdrop.</p></div>
      <div class="process-step"><div class="step-num">03</div><h3 class="step-title">Capture &amp; Selection</h3><p class="step-desc">Shooting in medium format. From several hundred exposures, we select fewer than fifteen. Ruthless curation is the most important part of our creative process.</p></div>
      <div class="process-step"><div class="step-num">04</div><h3 class="step-title">Delivery &amp; Licensing</h3><p class="step-desc">Final assets delivered as uncompressed TIFF masters alongside web-optimised versions with verified alt-text metadata for your SEO team. Full licensing documentation included.</p></div>
    </div>
  </section>

  <!-- TESTIMONIAL -->
  <section class="testimonial" id="testimonials">
    <div class="testimonial-label">Client Voice</div>
    <div>
      <blockquote class="testimonial-quote">"When we received the product photographs, our e-commerce team went silent. You could see the weight of the glass, the coolness of the metal. No filter. No CGI. We increased conversion on that product page by 34% within a month."</blockquote>
      <p class="testimonial-author">— Priya Sundaram, Creative Director · Maison Kaur</p>
    </div>
  </section>

  <!-- CTA BANNER -->
  <section class="cta-banner" id="contact">
    <img class="cta-banner-img"
      src="https://images.unsplash.com/photo-1452457807411-4979b707c5be?w=2400&q=80&auto=format&fit=crop"
      alt="A dark dramatic photography studio with a single powerful light source — the Chitramaya Creatives commission environment.">
    <div class="cta-banner-content">
      <h2 class="cta-banner-title">Start a<br><em>Commission</em></h2>
    </div>
    <a href="mailto:hello@chitramaya.com" class="cta-banner-btn">Speak to a Creative Director</a>
  </section>

  <!-- FOOTER -->
  <footer>
    <p>© <?php echo date('Y'); ?> Chitramaya Creatives. All rights reserved.</p>
    <div class="footer-thalam">
      <span>Ad shoots · Baby photography · Studio bookings</span>
      <a href="<?php echo home_url('/thalam-studio'); ?>">Thalam Studio →</a>
    </div>
  </footer>

  <!-- WHATSAPP FLOATING CTA -->
  <a href="https://wa.me/919876543210?text=Hi%2C%20I%27m%20interested%20in%20booking%20a%20session%20at%20Chitramaya%20Creatives."
    class="whatsapp-fab" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
    <span>Chat with us</span>
  </a>

  <script>
    const hero = document.getElementById('hero');
    const glow = document.getElementById('hero-glow');
    if (hero && glow) {
      hero.addEventListener('mousemove', (e) => {
        const rect = hero.getBoundingClientRect();
        glow.style.left = (e.clientX - rect.left) + 'px';
        glow.style.top = (e.clientY - rect.top) + 'px';
        glow.style.opacity = '1';
      });
      hero.addEventListener('mouseleave', () => { glow.style.opacity = '0'; });
    }
  </script>
  <?php wp_footer(); ?>
</body>
</html>
