<?php
/**
 * Template Name: Pillar — Corporate & Brand
 * Template Post Type: page
 * Description: The comprehensive pillar page for Brand and Corporate Photography.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Corporate & Brand Photography — Chitramaya Creatives</title>
  <meta name="description" content="Presenting a strong, authentic visual identity. From the boardroom to the production floor, we document the reality of your corporate culture.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/corporate-brand')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=EB+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --bg-light: #FFFFFF;
      --text-dark: #1C1917;
      --warm-grey: #D6D3D1;
      --accent: #A96F44;
      --border: 1px solid rgba(28,25,23,0.12);
      --font-sans: 'Inter', sans-serif;
      --font-serif: 'EB Garamond', serif;
    }
    body { font-family: var(--font-sans); background: var(--bg-light); color: var(--text-dark); overflow-x: hidden; }
    
    /* NAV */
    nav { position: fixed; top: 0; width: 100%; padding: 1.5rem 3rem; display: flex; justify-content: space-between; align-items: center; z-index: 100; mix-blend-mode: difference; color: #fff; }
    .nav-logo { font-weight: 900; letter-spacing: -0.02em; text-decoration: none; color: inherit; font-size: 1.25rem; }
    .nav-book a { text-decoration: none; color: inherit; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; }
    
    /* HERO */
    .hero { position: relative; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 6rem 3rem; text-align: center; background: #F9F9F9; color: #1C1917; }
    .hero-content { position: relative; z-index: 10; max-width: 900px; }
    .hero-title { font-size: clamp(3rem, 8vw, 7rem); font-weight: 900; letter-spacing: -0.04em; line-height: 1; margin-bottom: 2rem; text-transform: uppercase; }
    .hero-title em { font-family: var(--font-serif); font-weight: 400; font-style: italic; color: var(--accent); }
    .hero-desc { font-size: 1.25rem; line-height: 1.6; color: #57534e; margin-bottom: 3rem; max-width: 600px; margin-inline: auto; }
    .hero-btn { display: inline-block; padding: 1rem 2.5rem; background: var(--accent); color: #fff; text-transform: uppercase; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; }
    .hero-btn:hover { background: #1C1917; color: #fff; }
    
    /* CRO MODULES */
    .logo-farm { padding: 4rem 3rem; background: #fff; border-bottom: 1px solid var(--border); text-align: center; }
    .logo-farm-title { font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: #a8a29e; margin-bottom: 2rem; }
    .logo-grid { display: flex; flex-wrap: wrap; justify-content: center; gap: 4rem; align-items: center; opacity: 0.6; filter: grayscale(100%); }
    
    .impact-matrix { padding: 6rem 3rem; background: #F9F9F9; }
    .impact-title { text-align: center; font-size: 2.5rem; font-weight: 900; text-transform: uppercase; margin-bottom: 4rem; letter-spacing: -0.02em; }
    .impact-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 3rem; max-width: 1200px; margin: 0 auto; }
    .impact-card { background: #fff; padding: 3rem 2rem; text-align: center; border: 1px solid var(--border); border-radius: 4px; box-shadow: 0 4px 6px rgba(0,0,0,0.02); transition: 0.3s; }
    .impact-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.05); border-color: var(--accent); }
    .impact-icon { font-size: 2.5rem; color: var(--accent); margin-bottom: 1.5rem; }
    .impact-card h3 { font-size: 1.25rem; font-weight: 900; text-transform: uppercase; margin-bottom: 1rem; }
    .impact-card p { font-size: 1rem; color: #57534e; line-height: 1.6; }

    /* SERVICES GRID REWRITE (CRO EDITORIAL) */
    .services-section { padding: 8rem 3rem; background: var(--bg-light); }
    .services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3rem; max-width: 1400px; margin: 0 auto; }
    .service-card { background: #fff; border: 1px solid var(--border); overflow: hidden; transition: 0.3s; display: flex; flex-direction: column; scroll-margin-top: 100px; }
    .service-card:hover { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(0,0,0,0.08); border-color: var(--accent); }
    .service-image { width: 100%; aspect-ratio: 16/9; object-fit: cover; border-bottom: 1px solid var(--border); }
    .service-content { padding: 2.5rem; display: flex; flex-direction: column; flex-grow: 1; }
    .service-num { font-family: var(--font-serif); font-size: 1.25rem; color: var(--accent); font-style: italic; margin-bottom: 0.5rem; }
    .service-title { font-size: 1.75rem; font-weight: 900; text-transform: uppercase; line-height: 1.1; margin-bottom: 1rem; letter-spacing: -0.02em; }
    .service-desc { font-size: 1rem; color: #57534e; line-height: 1.6; margin-bottom: 2.5rem; flex-grow: 1; }
    .service-btn { align-self: flex-start; padding: 0.75rem 1.5rem; border: 1px solid var(--text-dark); color: var(--text-dark); font-weight: 700; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; }
    .service-card:hover .service-btn { background: var(--text-dark); color: #fff; }
    
    /* MOBILE */
    @media (max-width: 768px) {
      .hero { padding: 6rem 1.5rem; }
      .services-section { padding: 4rem 1.5rem; }
      .impact-grid, .logo-grid { gap: 2rem; }
    }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>


  <section class="hero">
    <div class="hero-content">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'Strong and Authentic<br><em>Visual Identity</em>.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'A comprehensive range of services designed to humanize your brand and build profound trust with your clients and stakeholders.' ); ?></p>
      <a href="#" class="hero-btn" data-trigger="booking">Commission a Corporate Shoot</a>
    </div>
  </section>

  <!-- CRO: LOGO FARM (SOCIAL PROOF) -->
  <section class="logo-farm">
    <div class="logo-farm-title">Trusted By Corporate Leaders</div>
    <div class="logo-grid">
      <h2 style="font-size: 1.5rem; font-weight: 900;">Google</h2>
      <h2 style="font-size: 1.5rem; font-weight: 900;">Deloitte.</h2>
      <h2 style="font-size: 1.5rem; font-weight: 900;">McKinsey</h2>
      <h2 style="font-size: 1.5rem; font-weight: 900;">Salesforce</h2>
      <h2 style="font-size: 1.5rem; font-weight: 900;">ORACLE</h2>
    </div>
  </section>

  <section class="services-section">
    <div class="services-grid">
      <!-- 01 -->
      <div class="service-card" id="service-1">
        <img src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Executive Portrait" class="service-image">
        <div class="service-content">
          <span class="service-num">01</span>
          <h2 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec1_title') ?: 'Executive Headshots' ); ?></h2>
          <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'Humanize the brand by showcasing team members with professional, authentic portraits designed for company websites and platforms like LinkedIn.' ); ?></p>
          <a href="#" class="service-btn" data-trigger="booking">Learn More &rarr;</a>
        </div>
      </div>

      <!-- 02 -->
      <div class="service-card" id="service-2">
        <img src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Corporate Workspace" class="service-image">
        <div class="service-content">
          <span class="service-num">02</span>
          <h2 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec2_title') ?: 'Culture & Workspace' ); ?></h2>
          <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'Environmental and lifestyle portraits capturing staff in their natural workspace or in action, effectively reflecting the company’s culture and work environment.' ); ?></p>
          <a href="#" class="service-btn" data-trigger="booking">Learn More &rarr;</a>
        </div>
      </div>

      <!-- 03 -->
      <div class="service-card" id="service-3">
        <img src="<?php echo esc_url( get_field('pillar_sec3_img') ?: 'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Corporate Events" class="service-image">
        <div class="service-content">
          <span class="service-num">03</span>
          <h2 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec3_title') ?: 'Corporate Events' ); ?></h2>
          <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'Ensure that important moments from conferences, seminars, and product launches are professionally documented.' ); ?></p>
          <a href="#" class="service-btn" data-trigger="booking">Learn More &rarr;</a>
        </div>
      </div>

      <!-- 04 -->
      <div class="service-card" id="service-4">
        <img src="<?php echo esc_url( get_field('pillar_sec4_img') ?: 'https://images.unsplash.com/photo-1531973576160-7125cd663d86?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Infrastructure and Ambiance" class="service-image">
        <div class="service-content">
          <span class="service-num">04</span>
          <h2 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec4_title') ?: 'Infrastructure & Ambiance' ); ?></h2>
          <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec4_desc') ?: 'Office and workplace photography highlighting the organization’s infrastructure and operational environment to build credibility with stakeholders.' ); ?></p>
          <a href="#" class="service-btn" data-trigger="booking">Learn More &rarr;</a>
        </div>
      </div>

      <!-- 05 -->
      <div class="service-card" id="service-5">
        <img src="<?php echo esc_url( get_field('pillar_sec5_img') ?: 'https://images.unsplash.com/photo-1637250067262-758c5b8fb18c?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Product and Cinematic" class="service-image">
        <div class="service-content">
          <span class="service-num">05</span>
          <h2 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec5_title') ?: 'Product & Cinematic' ); ?></h2>
          <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec5_desc') ?: 'High-quality product photography and cinematic profile videos tailored for marketing campaigns and e-commerce platforms.' ); ?></p>
          <a href="#" class="service-btn" data-trigger="booking">Learn More &rarr;</a>
        </div>
      </div>
    </div>
  </section>

  <!-- CRO: PAIN-POINT MATRIX (CONSISTENCY, SPEED, QUALITY) -->
  <section class="impact-matrix">
    <h2 class="impact-title">The Impact of Professional Assets</h2>
    <div class="impact-grid">
      <div class="impact-card">
        <div class="impact-icon">✦</div>
        <h3>Consistency</h3>
        <p>Maintain a cohesive, professional image across all channels and locations. Build visual trust with unwavering consistency.</p>
      </div>
      <div class="impact-card">
        <div class="impact-icon">⚡</div>
        <h3>Speed</h3>
        <p>Fast turnarounds meeting demanding corporate timelines. Deliver assets quickly without compromising visual excellence.</p>
      </div>
      <div class="impact-card">
        <div class="impact-icon">🏆</div>
        <h3>Quality</h3>
        <p>High-definition, professional photography capturing authenticity and professionalism. Premium assets for high-stakes business.</p>
      </div>
    </div>
  </section>

  <!-- HOW WE WORK & PIPELINE -->
  <section class="workflow-teaser" style="padding: 6rem 3rem; background: #fff; text-align: center; border-top: 1px solid var(--border);">
    <h2 style="font-size: 2.5rem; font-weight: 900; margin-bottom: 1.5rem; text-transform: uppercase; letter-spacing: -0.02em;">How We Work</h2>
    <p style="font-size: 1.1rem; color: #57534e; max-width: 600px; margin: 0 auto 2.5rem; line-height: 1.6;">From initial consultation to final delivery, our comprehensive pipeline ensures transparency and builds trust every step of the way.</p>
    <a href="#" class="hero-btn" style="background: var(--text-dark); color: #fff;">Explore Our Pipeline</a>
  </section>

  <!-- UPCOMING SERVICES ANTICIPATION -->
  <section class="upcoming-services" style="padding: 4rem 3rem; background: #F9F9F9; text-align: center;">
    <p style="font-family: var(--font-serif); font-size: 1.1rem; color: var(--accent); font-style: italic;">Anticipate more. Upcoming creative solutions in Brand Design & Advertisement Commercials.</p>
  </section>

<?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
