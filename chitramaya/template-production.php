<?php
/**
 * Template Name: Pillar — Production & Brand Design
 * Template Post Type: page
 * Description: The comprehensive pillar page for Podcast Production and Brand Design.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Production & Brand Design — Chitramaya Creatives</title>
  <meta name="description" content="From broadcast-grade podcast production to comprehensive brand design. We architect lasting recognition.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/production-brand-design')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --bg: #FAFAFA;
      --text: #111111;
      --accent: #FF3300;
      --font-display: 'Space Grotesk', sans-serif;
      --font-body: 'Inter', sans-serif;
    }
    body { font-family: var(--font-body); background: var(--bg); color: var(--text); overflow-x: hidden; }
    
    /* NAV */
    nav { position: fixed; top: 0; width: 100%; padding: 1.5rem 3rem; display: flex; justify-content: space-between; align-items: center; z-index: 100; mix-blend-mode: difference; color: #fff; }
    .nav-logo { font-weight: 700; font-family: var(--font-display); text-decoration: none; color: inherit; font-size: 1.25rem; letter-spacing: -0.05em; text-transform: uppercase; }
    .nav-book a { text-decoration: none; color: inherit; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; }
    
    /* HERO */
    .hero { position: relative; min-height: 90vh; display: flex; align-items: center; padding: 6rem 3rem; background: var(--text); color: var(--bg); overflow: hidden; }
    .hero-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.15; filter: grayscale(40%) contrast(1.2); mix-blend-mode: luminosity; pointer-events: none; z-index: 1; }
    .hero-content { position: relative; z-index: 10; max-width: 1000px; }
    .hero-title { font-family: var(--font-display); font-size: clamp(3rem, 9vw, 8rem); font-weight: 700; letter-spacing: -0.05em; line-height: 0.9; margin-bottom: 2rem; text-transform: uppercase; }
    .hero-desc { font-size: 1.25rem; line-height: 1.5; color: #999; margin-bottom: 3rem; max-width: 600px; font-weight: 400; }
    .hero-btn { display: inline-flex; align-items: center; justify-content: center; padding: 1.25rem 3rem; background: var(--accent); color: #fff; text-transform: uppercase; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; font-family: var(--font-display); }
    .hero-btn:hover { background: #fff; color: var(--text); }
    
    /* CARD GRID LAYOUT (UX Laws applied) */
    .services-container { padding: 6rem 3rem; max-width: 1400px; margin: 0 auto; }
    .cards-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; }
    
    .service-card { display: flex; flex-direction: column; background: #fff; border: 1px solid rgba(0,0,0,0.05); }
    .card-img-wrapper { position: relative; width: 100%; aspect-ratio: 16/9; overflow: hidden; }
    .card-img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; }
    .service-card:hover .card-img-wrapper img { transform: scale(1.05); }
    
    .card-content { padding: 3rem; flex-grow: 1; display: flex; flex-direction: column; }
    .card-label { font-family: var(--font-display); font-size: 0.85rem; font-weight: 700; color: var(--accent); margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 0.1em; }
    .card-title { font-family: var(--font-display); font-size: 2.2rem; font-weight: 700; line-height: 1.1; margin-bottom: 1.5rem; letter-spacing: -0.03em; text-transform: uppercase; }
    .card-desc { font-size: 1rem; line-height: 1.6; color: #555; margin-bottom: 2rem; }
    
    .card-list { list-style: none; margin-top: auto; padding-top: 2rem; border-top: 1px solid rgba(0,0,0,0.1); }
    .card-list li { font-size: 0.95rem; line-height: 1.6; color: var(--text); padding-left: 1.5rem; position: relative; margin-bottom: 0.75rem; }
    .card-list li::before { content: '→'; position: absolute; left: 0; color: var(--accent); font-weight: 700; }
    .card-list strong { color: var(--text); font-weight: 600; }
    
    .card-action { margin-top: 2rem; }
    .card-cta { display: inline-flex; padding: 1rem 2rem; background: transparent; border: 1px solid var(--text); color: var(--text); text-transform: uppercase; font-family: var(--font-display); font-weight: 700; font-size: 0.8rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; }
    .card-cta:hover { background: var(--text); color: #fff; }
    
    @media (max-width: 1024px) {
      .cards-grid { grid-template-columns: 1fr; gap: 3rem; }
      .services-container { padding: 4rem 1.5rem; }
      .card-content { padding: 2rem; }
    }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>


  <section class="hero">
    <img class="hero-img" src="<?php echo esc_url( get_field('pillar_hero_bg_url') ?: 'https://images.unsplash.com/photo-1632062549850-44a0a6eede16?auto=format&fit=crop&w=2000&q=80' ); ?>" alt="Branding & Value">
    <div class="hero-content">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'Identity is a Strategic Weapon.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'From broadcast-grade podcast production to comprehensive brand design. We don’t just capture images; we architect lasting recognition.' ); ?></p>
      <a href="#" class="hero-btn" data-trigger="booking">Discuss Your Brand</a>
    </div>
  </section>

  <section class="services-container">
    <div class="cards-grid">
      <!-- BRAND DESIGN -->
      <div class="service-card">
        <div class="card-img-wrapper">
          <img src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1614036634955-ae5e90f9b9eb?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Brand Design">
        </div>
        <div class="card-content">
          <span class="card-label">01 // Brand Design</span>
          <h2 class="card-title">Architecting Lasting Recognition.</h2>
          <p class="card-desc">Brand design is the strategic process of creating visual elements that define a company’s identity and communicate its core values. By translating a brand’s mission and vision into tangible visual assets, we ensure a cohesive and meaningful representation across all touchpoints.</p>
          <ul class="card-list">
            <li>Logo design &amp; Brand identity</li>
            <li>Product design &amp; Tactile packaging</li>
            <li>Marketing collaterals &amp; Illustrative posters</li>
            <li>OOH campaign &amp; Installations design</li>
            <li>Comprehensive Brand guidelines</li>
          </ul>
          <div class="card-action">
            <a href="#" class="card-cta" data-trigger="booking">Start a Project &rarr;</a>
          </div>
        </div>
      </div>

      <!-- PODCAST PRODUCTION -->
      <div class="service-card">
        <div class="card-img-wrapper">
          <img src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1485579149621-3123dd979885?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Podcast Production">
        </div>
        <div class="card-content">
          <span class="card-label">02 // Podcast & Interview</span>
          <h2 class="card-title">Comprehensive Content Creation.</h2>
          <p class="card-desc">Podcast and interview services have evolved into comprehensive content solutions that seamlessly combine audio, visual, and branding elements. Using professional lighting, multi-camera setups, and refined post-production, we craft broadcast-grade output.</p>
          <ul class="card-list">
            <li><strong>Studio &amp; Production:</strong> A well-equipped environment with technical support for broadcast-grade recording (facilitated at Thalam).</li>
            <li><strong>Content &amp; Media:</strong> Creation, editing, and distribution strategies to maximize reach.</li>
            <li><strong>Photography &amp; Branding:</strong> High-quality visuals to ensure your podcast looks market-ready.</li>
          </ul>
          <div class="card-action">
            <a href="#" class="card-cta" data-trigger="booking">Book Production &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
