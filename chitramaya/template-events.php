<?php
/**
 * Template Name: Pillar — Events & Portrait
 * Template Post Type: page
 * Description: The comprehensive pillar page for Weddings, Heirlooms, and Cultural Milestones.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events & Portrait Photography — Chitramaya Creatives</title>
  <meta name="description" content="An intimate, unscripted archiving of your most significant cultural milestones.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/events-portrait')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=EB+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --bg-dark: #12100E;
      --bg-light: #1A1816;
      --text-light: #F7F5F0;
      --mid-grey: #a3a3a3;
      --accent: #E5A97A;
      --rule: 1px solid rgba(255,255,255,0.1);
      --font-sans: 'Inter', sans-serif;
      --font-serif: 'EB Garamond', serif;
    }
    body { font-family: var(--font-sans); background: var(--bg-dark); color: var(--text-light); overflow-x: hidden; }
    
    /* NAV */
    nav { position: fixed; top: 0; width: 100%; padding: 1.5rem 3rem; display: flex; justify-content: space-between; align-items: center; z-index: 100; mix-blend-mode: difference; color: #fff; border-bottom: var(--rule); background: var(--bg-dark); mix-blend-mode: normal; }
    .nav-logo { font-weight: 900; letter-spacing: -0.02em; text-decoration: none; color: inherit; font-size: 1.25rem; }
    
    /* HERO */
    .hero { position: relative; min-height: 80vh; display: flex; flex-direction: column; justify-content: center; padding: 8rem 2rem 4rem; border-bottom: var(--rule); }
    .hero-content { max-width: 800px; margin: 0 auto; text-align: center; }
    .hero-tag { display: inline-block; font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent); margin-bottom: 2rem; }
    .hero-title { font-family: var(--font-serif); font-size: clamp(3rem, 6vw, 6rem); font-style: italic; line-height: 1; margin-bottom: 1.5rem; color: var(--text-light); }
    .hero-desc { font-size: 1.1rem; line-height: 1.6; color: var(--mid-grey); max-width: 600px; margin: 0 auto 3rem; }
    .hero-btn { display: inline-block; padding: 1rem 2rem; border: 1px solid var(--accent); color: var(--accent); text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.15em; text-decoration: none; transition: 0.3s; }
    .hero-btn:hover { background: var(--accent); color: var(--bg-dark); }
    
    /* SERVICES GRID */
    .services { border-bottom: var(--rule); }
    .services-header { padding: 2rem; border-bottom: var(--rule); display: flex; justify-content: space-between; align-items: center; }
    .services-header h2, .services-header span { font-size: 0.72rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--mid-grey); }
    
    .service-row { display: grid; grid-template-columns: 1fr; border-bottom: var(--rule); }
    .service-row:last-child { border-bottom: none; }
    
    .service-index { display: none; }
    .service-img-cell { height: 250px; overflow: hidden; }
    .service-img-cell img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(20%); transition: transform 0.6s ease; }
    .service-info { padding: 2rem; display: flex; flex-direction: column; justify-content: center; }
    .service-name { font-family: var(--font-serif); font-size: 2.5rem; font-style: italic; margin-bottom: 1rem; color: var(--accent); }
    .service-tags { display: flex; flex-wrap: wrap; gap: 0.5rem; }
    .service-tag { font-size: 0.65rem; border: 1px solid rgba(255,255,255,0.2); padding: 0.3rem 0.6rem; border-radius: 50px; text-transform: uppercase; letter-spacing: 0.1em; color: var(--mid-grey); }
    .service-specs { padding: 2rem; border-top: var(--rule); }
    .spec-list { list-style: none; }
    .spec-list li { font-size: 0.9rem; line-height: 2; color: var(--text-light); padding-left: 1.5rem; position: relative; }
    .spec-list li::before { content: '—'; position: absolute; left: 0; color: var(--accent); }
    .service-action { padding: 2rem; border-top: var(--rule); display: flex; align-items: center; }
    .service-cta { display: inline-block; padding: 1rem 2rem; border: 1px solid rgba(255,255,255,0.2); color: var(--text-light); text-decoration: none; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.15em; transition: 0.3s; width: 100%; text-align: center; }
    .service-cta:hover { background: var(--accent); color: var(--bg-dark); border-color: var(--accent); }
    
    /* TABLET & DESKTOP */
    @media (min-width: 768px) {
      .services-header { padding: 2rem 4rem; }
      .service-index { display: flex; padding: 3rem; border-right: var(--rule); align-items: center; justify-content: center; font-size: 0.8rem; letter-spacing: 0.2em; color: var(--mid-grey); }
      .service-img-cell { height: auto; border-right: var(--rule); }
      .service-row:hover .service-img-cell img { transform: scale(1.05); }
      .service-info { padding: 3rem; border-right: var(--rule); border-top: none; }
      .service-specs { padding: 3rem; border-right: var(--rule); border-top: none; }
      .service-action { padding: 3rem; border-top: none; }
    }

    @media (min-width: 1024px) {
      .service-row { grid-template-columns: 80px 1fr 1fr 1fr 200px; scroll-margin-top: 100px; }
      .service-cta { width: auto; }
    }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>

  <section class="hero">
    <div class="hero-content">
      <span class="hero-tag">Events & Portrait</span>
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'The Grand Heirloom.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'An intimate, unscripted archiving of your most significant cultural milestones. Because you shouldn’t have to choose which memory to keep.' ); ?></p>
      <a href="#services" class="hero-btn">View Capabilities</a>
    </div>
  </section>

  <section class="services" id="services">
    <div class="services-header">
      <h2>Service Directory // 3 Active</h2>
      <span>All inclusive of editing &amp; licensing</span>
    </div>

    <!-- Weddings & Destination -->
    <div class="service-row" id="service-weddings">
      <div class="service-index">01</div>
      <div class="service-img-cell">
        <img src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Weddings & Destination">
      </div>
      <div class="service-info">
        <div>
          <h3 class="service-name"><?php echo wp_kses_post( get_field('pillar_sec1_title') ?: 'Weddings' ); ?></h3>
          <div class="service-tags"><span class="service-tag">Destination</span><span class="service-tag">Documentary</span><span class="service-tag">Cinematic</span></div>
        </div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Pre &amp; Post wedding documentation</li>
          <li>Unobtrusive cinematic narrative</li>
          <li>2+ lead photographers</li>
          <li>Comprehensive event archiving</li>
        </ul>
      </div>
      <div class="service-action">
        <a href="#" class="service-cta" data-trigger="booking">Explore Capabilities →</a>
      </div>
    </div>

    <!-- Cultural Milestones -->
    <div class="service-row" id="service-cultural">
      <div class="service-index">02</div>
      <div class="service-img-cell">
        <img src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1519340333755-56e9c1d04579?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Cultural Milestones">
      </div>
      <div class="service-info">
        <div>
          <h3 class="service-name"><?php echo wp_kses_post( get_field('pillar_sec2_title') ?: 'Milestones' ); ?></h3>
          <div class="service-tags"><span class="service-tag">Sastiyabthapoorthi</span><span class="service-tag">Upanayanam</span><span class="service-tag">Authentic</span></div>
        </div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Respectful, traditional archiving</li>
          <li>Multi-generational focus</li>
          <li>High-volume candid capture</li>
          <li>Premium album integration</li>
        </ul>
      </div>
      <div class="service-action">
        <a href="#" class="service-cta" data-trigger="booking">Explore Capabilities →</a>
      </div>
    </div>

    <!-- The Grand Portrait -->
    <div class="service-row" id="service-portrait">
      <div class="service-index">03</div>
      <div class="service-img-cell">
        <img src="<?php echo esc_url( get_field('pillar_sec3_img') ?: 'https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="The Grand Portrait">
      </div>
      <div class="service-info">
        <div>
          <h3 class="service-name"><?php echo wp_kses_post( get_field('pillar_sec3_title') ?: 'Portraits' ); ?></h3>
          <div class="service-tags"><span class="service-tag">Heirloom</span><span class="service-tag">Studio</span><span class="service-tag">House Visit</span></div>
        </div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Art-themed family portraits</li>
          <li>Thalam Studio or house-visit</li>
          <li>Fine-art print delivery</li>
          <li>Engineered to last 50+ years</li>
        </ul>
      </div>
      <div class="service-action">
        <a href="#" class="service-cta" data-trigger="booking">Explore Capabilities →</a>
      </div>
    </div>
  </section>

<?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
