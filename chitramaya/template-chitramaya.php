<?php
/**
 * Template Name: Chithramaya Creatives
 * Template Post Type: page
 * Description: Full-page enterprise portfolio landing for Chithramaya Creatives.
 */
// Bypass WordPress header/footer entirely — full design control
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chithramaya Creatives — Photography Studio</title>
  <meta name="description" content="Chithramaya Creatives — Ad shoots, baby photography, and visual storytelling from Thalam Studio, Kerala. Every image is made to be felt.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/chitramaya')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --bg-light: #F7F5F2; /* Warm Linen */
      --text-dark: #2A2724; /* Espresso */
      --warm-grey: var(--wp--preset--color--chitramaya-muted, #D6D3D1);
      --accent: #C06547; /* Vibrant Terracotta */
      --border: 1px solid rgba(42,39,36,0.12);
      --font-sans: 'Inter', sans-serif;
      --font-serif: 'Cormorant Garamond', serif;
    }
    html { scroll-behavior: smooth; }
    body { background: var(--bg-light); color: var(--text-dark); font-family: var(--font-sans); -webkit-font-smoothing: antialiased; overflow-x: hidden; }

    /* NAV */
    nav { position: fixed; top: 0; left: 0; right: 0; z-index: 100; display: flex; justify-content: space-between; align-items: center; padding: 1.5rem 3rem; }
    .nav-logo { font-weight: 900; font-size: 0.9rem; letter-spacing: 0.18em; text-transform: uppercase; text-decoration: none; color: var(--text-dark); }
    .nav-links { display: flex; gap: 2.5rem; list-style: none; align-items: center; }
    .nav-links a { font-size: 0.8rem; letter-spacing: 0.12em; text-transform: uppercase; text-decoration: none; color: var(--warm-grey); transition: color 0.2s; }
    .nav-links a:hover { color: var(--text-dark); }
    .nav-thalam-pill { display: inline-flex; align-items: center; gap: 0.5rem; background: var(--accent); color: var(--bg-light) !important; padding: 0.45rem 1.1rem; font-size: 0.72rem !important; font-weight: 700; letter-spacing: 0.14em !important; text-transform: uppercase; text-decoration: none; transition: background 0.2s, transform 0.2s !important; }
    .nav-thalam-pill:hover { background: var(--text-dark) !important; transform: translateY(-1px); color: var(--bg-light) !important; }

    /* HERO - SPACIOUS EDITORIAL PROPORTIONS */
    .hero { position: relative; min-height: 100vh; width: 100%; background-color: var(--bg-light); display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 10vh 0; overflow: hidden; }

    .hero-content { position: relative; z-index: 2; display: flex; flex-direction: column; align-items: center; justify-content: center; width: 100%; max-width: 1600px; padding: 2rem 1rem; text-align: center; gap: 2.5rem; }
    @media (min-width: 992px) { .hero-content { gap: 4rem; padding: 0 1.5rem; } }

    .hero-brand-name { display: flex; align-items: center; justify-content: center; gap: 0.5rem; flex-direction: column; margin: 0; width: 100%; }
    @media (min-width: 992px) { .hero-brand-name { flex-direction: row; gap: 1.5rem; align-items: baseline; } }
    
    .brand-heavy { font-family: var(--font-serif); font-weight: 400; font-size: clamp(2.5rem, 8vw, 8.5rem); letter-spacing: -0.04em; color: var(--text-dark); line-height: 1; text-transform: uppercase; white-space: nowrap; }
    .brand-elegant { font-family: var(--font-serif); font-style: italic; font-weight: 400; font-size: clamp(2.5rem, 8vw, 8.5rem); color: var(--text-dark); line-height: 1; letter-spacing: -0.02em; white-space: nowrap; }

    .hero-subject-img { width: 100%; max-width: 400px; height: 300px; object-fit: cover; border-radius: 32px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); margin: 1rem 0; }
    @media (min-width: 992px) { .hero-subject-img { height: 400px; max-width: 600px; margin: 2rem 0; } }

    .hero-intro { font-family: var(--font-sans); font-size: clamp(1rem, 2vw, 1.3rem); line-height: 1.5; color: var(--text-dark); max-width: 600px; margin: 0 auto; font-weight: 400; }

    .hero-pills { display: none; } /* Hidden on mobile to avoid UX clutter */
    @media (min-width: 992px) { .hero-pills { display: flex; align-items: center; justify-content: center; gap: 1.5rem; flex-wrap: wrap; margin: 0; width: 100%; } }
    
    .hero-pill { border: 1px solid var(--text-dark); color: var(--text-dark); padding: 0.8rem 1.5rem; font-size: 0.85rem; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase; transition: background 0.3s, color 0.3s; border-radius: 50px; }
    .hero-pill-link { display: flex; align-items: center; gap: 0.5rem; text-decoration: none; background: transparent; color: var(--text-dark); }
    .hero-pill-link:hover { background: rgba(42,39,36,0.05); color: var(--text-dark); }
    .hero-pill-link svg { width: 14px; height: 14px; fill: none; }

    /* MANIFESTO (Brutalist Overhaul) */
    .manifesto { padding: 5rem 1.5rem; display: flex; flex-direction: column; gap: 3rem; background-color: var(--bg-light); color: var(--text-dark); }
    .manifesto-label { font-size: 0.65rem; font-family: var(--font-sans); font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem; }
    .manifesto-label::before { content: ''; width: 24px; height: 1px; background: var(--accent); }
    .manifesto-text { font-family: var(--font-serif); font-size: clamp(2rem, 6vw, 4.5rem); font-weight: 400; line-height: 1; letter-spacing: -0.02em; text-transform: none; color: var(--text-dark); max-width: 900px; }
    .manifesto-body { font-family: var(--font-sans); font-size: clamp(1rem, 1.5vw, 1.2rem); font-weight: 400; line-height: 1.6; color: var(--text-dark); margin-bottom: 3rem; max-width: 600px; }
    .manifesto-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 0; border: 1px solid var(--text-dark); border-bottom: none; border-right: none; }
    .stat-box { border-bottom: 1px solid var(--text-dark); border-right: 1px solid var(--text-dark); padding: 2rem; display: flex; flex-direction: column; justify-content: center; }
    .stat-num { font-family: var(--font-sans); font-weight: 900; font-size: clamp(2.5rem, 4vw, 3.5rem); letter-spacing: -0.05em; color: var(--text-dark); line-height: 1; }
    .stat-label { font-family: var(--font-sans); font-weight: 700; font-size: 0.65rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--accent); margin-top: 0.75rem; }

    /* THALAM AD SECTION (Brutalist Overhaul) */
    .thalam-ad { background-color: var(--bg-light); border-top: 1px solid var(--text-dark); padding: 5rem 1.5rem; display: flex; flex-direction: column; gap: 3rem; }
    .thalam-ad-content { display: flex; flex-direction: column; gap: 2.5rem; width: 100%; }
    .thalam-ad-eyebrow { font-size: 0.65rem; font-family: var(--font-sans); font-weight: 700; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.75rem; }
    .thalam-ad-eyebrow::before { content: ''; display: inline-block; width: 24px; height: 1px; background: var(--accent); }
    .thalam-ad-headline { font-family: var(--font-serif); font-weight: 400; font-size: clamp(3.2rem, 8vw, 8rem); line-height: 0.85; letter-spacing: -0.02em; text-transform: none; color: var(--text-dark); }
    .thalam-ad-right { display: flex; flex-direction: column; }
    .thalam-list { list-style: none; display: flex; flex-direction: column; border-top: 1px solid var(--text-dark); margin-bottom: 3rem; padding: 0; }
    .thalam-list li { display: flex; align-items: baseline; gap: 1.5rem; padding: 2rem 0; border-bottom: 1px solid var(--text-dark); color: var(--text-dark); transition: padding-left 0.3s; }
    .thalam-list li:hover { padding-left: 1rem; background: rgba(28,25,23,0.03); }
    .thalam-list-num { font-size: 0.65rem; font-weight: 700; letter-spacing: 0.15em; color: var(--accent); width: 24px; }
    .thalam-list-text { font-family: var(--font-sans); font-weight: 700; font-size: clamp(1.2rem, 2vw, 2rem); letter-spacing: -0.02em; text-transform: uppercase; }
    .thalam-ad-cta { display: inline-flex; align-items: center; gap: 1rem; border: 1px solid var(--accent); background: var(--accent); padding: 1rem 2.5rem; color: var(--bg-light); text-decoration: none; font-weight: 800; font-size: 0.85rem; letter-spacing: 0.1em; text-transform: uppercase; transition: all 0.3s; align-self: flex-start; }
    .thalam-ad-cta:hover { background: transparent; color: var(--accent); }



    /* SERVICES (Brutalist Accordion) */
    .services { border-top: 1px solid var(--text-dark); border-bottom: 1px solid var(--text-dark); display: flex; flex-direction: column; background: var(--bg-light); }
    .services-header { padding: 5rem 1.5rem 2rem; border-bottom: 1px solid var(--text-dark); margin-bottom: 0; color: var(--text-dark); }
    .service-item { display: flex; flex-direction: column; padding: 3rem 1.5rem; border-bottom: 1px solid var(--text-dark); transition: background 0.3s; color: var(--text-dark); }
    .service-item:last-child { border-bottom: none; }
    .service-item:hover { background: rgba(28,25,23,0.03); }
    .service-item-header { display: flex; flex-direction: column; gap: 0.5rem; }
    .service-num { font-size: 0.65rem; font-weight: 800; letter-spacing: 0.2em; color: var(--accent); text-transform: uppercase; }
    .service-title { font-family: var(--font-sans); font-weight: 900; font-size: clamp(2rem, 5vw, 3.5rem); letter-spacing: -0.04em; text-transform: uppercase; line-height: 1; }
    .service-item-content { margin-top: 2rem; display: flex; flex-direction: column; gap: 1.5rem; }
    .service-desc { font-size: 0.95rem; line-height: 1.6; color: var(--text-dark); max-width: 600px; }
    .service-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; border-left: 1px solid var(--text-dark); padding-left: 1.5rem; }
    .service-list li { font-size: 0.85rem; font-weight: 800; letter-spacing: 0.05em; text-transform: uppercase; color: var(--text-dark); }
    .service-btn { display: inline-flex; align-self: flex-start; margin-top: 1rem; align-items: center; gap: 0.75rem; font-size: 0.75rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; color: var(--text-dark); border-bottom: 1px solid var(--text-dark); padding-bottom: 4px; transition: all 0.2s; }
    .service-btn:hover { color: var(--accent); border-color: var(--accent); }

    /* PROCESS (Brutalist Overhaul) */
    .process { padding: 5rem 1.5rem; background: var(--bg-light); border-top: 1px solid var(--text-dark); color: var(--text-dark); }
    .process-steps { display: grid; grid-template-columns: 1fr; gap: 0; margin-top: 3rem; border-top: 1px solid var(--text-dark); }
    .process-step { padding: 3rem 0; border-bottom: 1px solid var(--text-dark); display: flex; flex-direction: column; gap: 1rem; }
    .process-step:last-child { border-bottom: none; }
    .step-num { font-family: var(--font-sans); font-weight: 900; font-size: 3rem; color: var(--text-dark); line-height: 1; letter-spacing: -0.05em; }
    .step-title { font-weight: 900; font-size: 1.5rem; text-transform: uppercase; letter-spacing: -0.02em; }
    .step-desc { font-size: 0.95rem; line-height: 1.6; color: var(--text-dark); max-width: 500px; }

    /* TESTIMONIAL */
    .testimonial { padding: 5rem 1.5rem; border-top: 1px solid var(--text-dark); display: flex; flex-direction: column; gap: 3rem; background: var(--bg-light); color: var(--text-dark); }
    .testimonial-label { font-size: 0.65rem; font-weight: 800; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); }
    .testimonial-quote { font-family: var(--font-sans); font-weight: 900; font-size: clamp(1.8rem, 4vw, 3rem); line-height: 1.2; letter-spacing: -0.03em; text-transform: uppercase; }
    .testimonial-author { margin-top: 2.5rem; font-size: 0.8rem; font-weight: 800; letter-spacing: 0.12em; text-transform: uppercase; color: var(--text-dark); }

    /* CTA BANNER (Brutalist Typography) */
    .cta-banner { position: relative; padding: 8rem 1.5rem; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; background: var(--bg-light); border-top: 1px solid var(--text-dark); overflow: hidden; gap: 3rem; }
    .cta-banner-content { position: relative; z-index: 2; display: flex; flex-direction: column; align-items: center; gap: 2.5rem; width: 100%; }
    .cta-banner-title { font-family: var(--font-serif); font-weight: 400; font-size: clamp(3rem, 10vw, 8rem); letter-spacing: -0.02em; text-transform: none; line-height: 0.9; color: var(--text-dark); width: 100%; }
    .cta-banner-btn { position: relative; z-index: 2; display: inline-flex; align-items: center; background: var(--accent); color: var(--bg-light); border: 1px solid var(--accent); padding: 1.25rem 3rem; font-weight: 800; font-size: 0.9rem; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; transition: all 0.3s; }
    .cta-banner-btn:hover { background: transparent; color: var(--accent); }

    /* RESPONSIVE: DESKTOP OVERRIDES */
    @media (min-width: 992px) {
      .hero-pills { padding: 0 1rem; }
      .hero-portfolio-peek { transform: translateY(45%); }
      .manifesto { padding: 8rem 3rem; display: grid; grid-template-columns: 1fr 1fr; gap: 6rem; align-items: flex-start; max-width: 1400px; margin: 0 auto; }
      .thalam-ad-content { padding: 8rem 3rem; display: grid; grid-template-columns: 1.2fr 1fr; gap: 6rem; align-items: center; max-width: 1400px; margin: 0 auto; }
      .tactile-section { padding: 0 3rem 8rem; }
      .tactile-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem; max-width: 1400px; margin: 0 auto; margin-top: -10vh; z-index: 10; position: relative; align-items: start; }
      .services { padding: 0; }
      .services-header { max-width: 1400px; margin: 0 auto; width: 100%; padding: 8rem 3rem 2rem; border-bottom: 1px solid var(--text-dark); }
      .service-item { display: grid; grid-template-columns: 1.5fr 1fr; gap: 4rem; padding: 5rem 3rem; max-width: 1400px; margin: 0 auto; width: 100%; }
      .service-item-content { margin-top: 0; }
      .process { padding: 8rem 3rem; max-width: 1400px; margin: 0 auto; border-top: none; }
      .process-steps { grid-template-columns: repeat(4, 1fr); border-top: 1px solid var(--text-dark); margin-top: 5rem; }
      .process-step { border-bottom: none; border-right: 1px solid var(--text-dark); padding: 3rem 2.5rem 3rem 0; }
      .process-step:not(:first-child) { padding-left: 2.5rem; }
      .process-step:last-child { border-right: none; padding-right: 0; }
      .testimonial { padding: 8rem 3rem; display: grid; grid-template-columns: 1fr 2fr; gap: 6rem; align-items: center; max-width: 1400px; margin: 0 auto; border-top: none; }

    }
  </style>
</head>
<body>
  <?php get_template_part('template-parts/global-nav'); ?>

  <section class="hero section-illusion-wrapper" id="hero">
    <div class="graphic-orb orb-lg color-cyan" style="top: -10%; left: -5%;"></div>
    <div class="graphic-orb orb-md color-magenta" style="bottom: 10%; right: 10%;"></div>

    <div class="hero-content">
      <h1 class="hero-brand-name">
        <span class="brand-heavy"><?php echo esc_html( get_field('home_hero_title_1') ?: 'CHITHRAMAYA' ); ?></span>
        <span class="brand-elegant"><?php echo esc_html( get_field('home_hero_title_2') ?: 'Creatives' ); ?></span>
      </h1>
      
      <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=800&q=80" alt="Chithramaya Portrait" class="hero-subject-img">

      <div class="hero-pills">
        <span class="hero-pill" style="border-radius: 50px;">Commercial</span>
        <span class="hero-pill" style="border-radius: 50px;">Portraits</span>
        <span class="hero-pill" style="border-radius: 50px;">Podcast</span>
        <a href="#services" class="hero-pill hero-pill-link" style="border-radius: 50px;">All services
          <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" stroke-width="2" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" /></svg>
        </a>
      </div>

      <p class="hero-intro">
        We capture, curate, and craft visual experiences for brands and families that demand perfection.
      </p>

      <a href="#contact" class="btn-compound">
        Book a call
        <div class="btn-compound-icon">
            <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: currentColor;"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
      </a>
    </div>
  </section>

  <section class="manifesto" id="about">
    <div>
      <div class="manifesto-label"><?php echo esc_html( get_field('home_manifesto_label') ?: 'OUR CREED' ); ?></div>
      <h2 class="manifesto-text"><?php echo wp_kses_post( get_field('home_manifesto_headline') ?: 'Every photograph is a physical argument that the world is worth feeling.' ); ?></h2>
    </div>
    <div>
      <p class="manifesto-body"><?php echo wp_kses_post( get_field('home_manifesto_body') ?: 'We believe every image should do more than inform — it should stay with you. Through deliberate lighting, medium-format capture, and restrained post-production, we craft photographs that your audience does not just look at — they feel. Each commission begins with a single question: what must this image make someone experience?' ); ?></p>
      <div class="manifesto-stats">
        <div class="stat-box"><div class="stat-num">340+</div><div class="stat-label">Campaigns</div></div>
        <div class="stat-box"><div class="stat-num">20 YR</div><div class="stat-label">Experience</div></div>
        <div class="stat-box"><div class="stat-num">96%</div><div class="stat-label">Retention</div></div>
        <div class="stat-box"><div class="stat-num">3 YR</div><div class="stat-label">Expansion</div></div>
      </div>
    </div>
  </section>

  <section class="thalam-ad" id="thalam">
    <div class="thalam-ad-content">
      <div>
        <div class="thalam-ad-eyebrow">THALAM STUDIO</div>
        <h2 class="thalam-ad-headline">SPACE TO<br>CREATE.</h2>
        <p style="font-family: var(--font-sans); font-size: clamp(1rem, 1.5vw, 1.2rem); font-weight: 400; line-height: 1.6; color: rgba(255,255,255,0.7); max-width: 480px; margin-top: 1.5rem;">A true space to create means zero friction between your idea and its execution. We've prepared the seamless cyclorama, set the lighting, and curated the amenities—giving you the ultimate blank canvas to focus entirely on your craft.</p>
      </div>
      <div class="thalam-ad-right">
        <ul class="thalam-list">
          <li><span class="thalam-list-num">01</span><span class="thalam-list-text">Wide Cyclorama Wall</span></li>
          <li><span class="thalam-list-num">02</span><span class="thalam-list-text">Complete Light Setup</span></li>
          <li><span class="thalam-list-num">03</span><span class="thalam-list-text">Baby Shoot Amenities</span></li>
        </ul>
        <a href="<?php echo home_url('/thalam-studio'); ?>" class="thalam-ad-cta">
          Explore Thalam Studio
          <span>→</span>
        </a>
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section class="services" id="services">
    <div class="section-header services-header">
      <h2 class="section-title">Services</h2>
    </div>

    <!-- 01: Brand & Corporate Photography -->
    <div class="service-item">
      <div class="service-item-header">
        <span class="service-num">01 // Brand &amp; Corporate</span>
        <h3 class="service-title"><?php echo esc_html( get_field('home_service_1_title') ?: 'Executive & Corporate' ); ?></h3>
      </div>
      <div class="service-item-content">
        <p class="service-desc"><?php echo wp_kses_post( get_field('home_service_1_desc') ?: 'Your people are your most credible asset. We photograph executive portraits, team sessions, corporate events, and office environments that build immediate trust across every platform.' ); ?></p>
        <ul class="service-list">
          <li>Executive Headshots</li>
          <li>Team &amp; Website Photography</li>
          <li>Corporate Events</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/corporate')); ?>" class="service-btn">Explore Corporate</a>
      </div>
    </div>

    <!-- 02: Commercial Photography -->
    <div class="service-item">
      <div class="service-item-header">
        <span class="service-num">02 // Commercial</span>
        <h3 class="service-title"><?php echo esc_html( get_field('home_service_2_title') ?: 'Commercial Production' ); ?></h3>
      </div>
      <div class="service-item-content">
        <p class="service-desc"><?php echo wp_kses_post( get_field('home_service_2_desc') ?: 'Every frame has a job. We deliver OOH campaigns, e-commerce catalogues, fashion, food, and lifestyle photography in close collaboration with your brief and your team.' ); ?></p>
        <ul class="service-list">
          <li>OOH &amp; Billboard Campaigns</li>
          <li>E-Commerce Catalogues</li>
          <li>Food, Fashion &amp; Lifestyle</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/commercial')); ?>" class="service-btn">Explore Commercial</a>
      </div>
    </div>

    <!-- 03: Events & Portrait Photography -->
    <div class="service-item">
      <div class="service-item-header">
        <span class="service-num">03 // Events &amp; Portrait</span>
        <h3 class="service-title"><?php echo esc_html( get_field('home_service_3_title') ?: 'Events & Portraiture' ); ?></h3>
      </div>
      <div class="service-item-content">
        <p class="service-desc"><?php echo wp_kses_post( get_field('home_service_3_desc') ?: 'These moments happen only once. We archive maternity, newborn, toddler milestones, weddings, and multi-generational family ceremonies — studio-styled, outdoor, or at home.' ); ?></p>
        <ul class="service-list">
          <li>Baby &amp; Maternity Sessions</li>
          <li>Wedding Photography</li>
          <li>Family Portraits</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/events')); ?>" class="service-btn">Explore Events</a>
      </div>
    </div>

    <!-- 04: Podcast & Interview Production -->
    <div class="service-item">
      <div class="service-item-header">
        <span class="service-num">04 // Podcast &amp; Interview</span>
        <h3 class="service-title"><?php echo esc_html( get_field('home_service_4_title') ?: 'Podcast Production' ); ?></h3>
      </div>
      <div class="service-item-content">
        <p class="service-desc"><?php echo wp_kses_post( get_field('home_service_4_desc') ?: 'A microphone alone does not build an audience. We provide the studio, multi-camera setup, audio production, and branding assets to make your show look and sound market-ready.' ); ?></p>
        <ul class="service-list">
          <li>Studio &amp; Production</li>
          <li>Content Editing &amp; Distribution</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/podcast')); ?>" class="service-btn">Explore Podcast</a>
      </div>
    </div>
  </section>

  <!-- PROCESS -->
  <section class="process" id="process">
    <div class="section-header"><h2 class="section-title">Methodology</h2></div>
    <div class="process-steps">
      <div class="process-step"><div class="step-num">01</div><h3 class="step-title">Brief &amp; Discovery</h3><p class="step-desc">We spend the first week understanding your audience's psychology, competitive landscape, and the emotional response required.</p></div>
      <div class="process-step"><div class="step-num">02</div><h3 class="step-title">Lighting & Setup</h3><p class="step-desc">Every shoot has a deliberate lighting plan drawn from the mood and quality we need to draw from the subject.</p></div>
      <div class="process-step"><div class="step-num">03</div><h3 class="step-title">Capture &amp; Selection</h3><p class="step-desc">Shooting in medium format. From several hundred exposures, we select fewer than fifteen. Curation is vital.</p></div>
      <div class="process-step"><div class="step-num">04</div><h3 class="step-title">Final Delivery</h3><p class="step-desc">Assets delivered as uncompressed TIFF masters alongside web-optimised versions with verified metadata.</p></div>
    </div>
  </section>

  <section class="testimonial" id="testimonials">
    <div class="testimonial-label">Client Voice</div>
    <div>
      <blockquote class="testimonial-quote"><?php echo wp_kses_post( get_field('home_testi_quote') ?: '"When we received the product photographs, our e-commerce team went silent. You could see the weight of the glass, the coolness of the metal. No CGI. We increased conversion on that product page by 34% within a month."' ); ?></blockquote>
      <p class="testimonial-author"><?php echo esc_html( get_field('home_testi_author') ?: '— Priya Sundaram, Creative Director · Maison Kaur' ); ?></p>
    </div>
  </section>

  <section class="cta-banner" id="contact">
    <div class="cta-banner-content">
      <h2 class="cta-banner-title"><?php echo wp_kses_post( get_field('home_cta_title') ?: 'START THE PROJECT.' ); ?></h2>
      <a href="#" class="cta-banner-btn" data-trigger="booking">Speak to a Creative Director</a>
    </div>
  </section>

  <?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
