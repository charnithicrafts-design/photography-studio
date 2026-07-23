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
    .hero { position: relative; min-height: 90vh; display: flex; align-items: center; padding: 6rem 3rem; background: var(--text); color: var(--bg); }
    .hero-content { position: relative; z-index: 10; max-width: 1000px; }
    .hero-title { font-family: var(--font-display); font-size: clamp(3rem, 9vw, 8rem); font-weight: 700; letter-spacing: -0.05em; line-height: 0.9; margin-bottom: 2rem; text-transform: uppercase; }
    .hero-desc { font-size: 1.25rem; line-height: 1.5; color: #999; margin-bottom: 3rem; max-width: 600px; font-weight: 400; }
    .hero-btn { display: inline-flex; align-items: center; justify-content: center; padding: 1.25rem 3rem; background: var(--accent); color: #fff; text-transform: uppercase; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; font-family: var(--font-display); }
    .hero-btn:hover { background: #fff; color: var(--text); }
    
    /* GRID LAYOUT */
    .feature-section { padding: 8rem 3rem; }
    .feature-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 4rem; }
    
    .feature-card { display: flex; flex-direction: column; }
    .feature-img-wrapper { position: relative; overflow: hidden; margin-bottom: 2rem; aspect-ratio: 16/9; background: #000; }
    .feature-img-wrapper img { width: 100%; height: 100%; object-fit: cover; opacity: 0.8; transition: 0.5s; }
    .feature-card:hover .feature-img-wrapper img { opacity: 1; transform: scale(1.03); }
    .feature-number { font-family: var(--font-display); font-size: 1rem; font-weight: 700; color: var(--accent); margin-bottom: 0.5rem; display: block; }
    .feature-title { font-family: var(--font-display); font-size: 2rem; font-weight: 700; text-transform: uppercase; line-height: 1.1; margin-bottom: 1rem; letter-spacing: -0.03em; }
    .feature-desc { font-size: 1.1rem; line-height: 1.6; color: #555; }
    
    @media (max-width: 768px) {
      .hero, .feature-section { padding: 5rem 1.5rem; }
      .feature-grid { grid-template-columns: 1fr; gap: 3rem; }
    }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>
  <nav>
    <a href="<?php echo home_url('/'); ?>" class="nav-logo">Chitramaya</a>
    <div class="nav-book"><a href="#" data-trigger="booking">Discuss Brand ↓</a></div>
  </nav>

  <section class="hero">
    <div class="hero-content">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'Identity is a Strategic Weapon.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'From broadcast-grade podcast production to comprehensive brand design. We don’t just capture images; we architect lasting recognition.' ); ?></p>
      <a href="#" class="hero-btn" data-trigger="booking">Discuss Your Brand</a>
    </div>
  </section>

  <section class="feature-section">
    <div class="feature-grid">
      <!-- 1 -->
      <div class="feature-card">
        <div class="feature-img-wrapper">
          <img src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Podcast Production">
        </div>
        <span class="feature-number">01 // PRODUCTION</span>
        <h2 class="feature-title"><?php echo wp_kses_post( get_field('pillar_sec1_title') ?: 'Podcast & Interview' ); ?></h2>
        <p class="feature-desc"><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'Multi-camera setups and professional audio engineering for creators and entrepreneurs looking to build a strong media presence.' ); ?></p>
      </div>
      
      <!-- 2 -->
      <div class="feature-card">
        <div class="feature-img-wrapper">
          <img src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1544126592-807ade215a0b?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Brand Identity">
        </div>
        <span class="feature-number">02 // DESIGN</span>
        <h2 class="feature-title"><?php echo wp_kses_post( get_field('pillar_sec2_title') ?: 'Brand Identity' ); ?></h2>
        <p class="feature-desc"><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'Logo creation, typography, and color palettes that translate your mission into tangible visual assets. Building cohesive ecosystems.' ); ?></p>
      </div>

      <!-- 3 -->
      <div class="feature-card">
        <div class="feature-img-wrapper">
          <img src="<?php echo esc_url( get_field('pillar_sec3_img') ?: 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="OOH Campaigns">
        </div>
        <span class="feature-number">03 // STRATEGY</span>
        <h2 class="feature-title"><?php echo wp_kses_post( get_field('pillar_sec3_title') ?: 'Marketing & OOH' ); ?></h2>
        <p class="feature-desc"><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'Illustrative posters, out-of-home campaign design, and comprehensive brand guidelines ensuring consistency across all touchpoints.' ); ?></p>
      </div>
    </div>
  </section>

  <?php wp_footer(); ?>
</body>
</html>
