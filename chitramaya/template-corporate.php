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
    
    /* SERVICES GRID */
    .services-section { padding: 8rem 3rem; background: var(--bg-light); }
    .service-block { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; margin-bottom: 8rem; }
    .service-block:nth-child(odd) .service-content { justify-self: end; }
    .service-block:nth-child(even) .service-content { order: 2; justify-self: start; }
    .service-block:nth-child(even) .service-image { order: 1; }
    
    .service-content { max-width: 500px; }
    .service-num { font-family: var(--font-serif); font-size: 1.5rem; color: var(--accent); font-style: italic; margin-bottom: 1rem; display: block; }
    .service-title { font-size: 3rem; font-weight: 900; text-transform: uppercase; line-height: 1.1; margin-bottom: 1.5rem; letter-spacing: -0.02em; }
    .service-desc { font-size: 1.1rem; color: #57534e; line-height: 1.6; margin-bottom: 2rem; }
    
    .service-image { width: 100%; aspect-ratio: 4/5; object-fit: cover; transition: 0.6s; border-radius: 4px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .service-block:hover .service-image { transform: translateY(-5px); box-shadow: 0 15px 40px rgba(0,0,0,0.1); }
    
    /* MOBILE */
    @media (max-width: 768px) {
      .service-block { grid-template-columns: 1fr; gap: 2rem; }
      .service-block:nth-child(even) { direction: ltr; }
      .hero { padding: 6rem 1.5rem; }
      .services-section { padding: 4rem 1.5rem; }
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

  <section class="services-section">
    <!-- 01 -->
    <div class="service-block">
      <div class="service-content">
        <span class="service-num">01</span>
        <h2 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec1_title') ?: 'Executive<br>Headshots' ); ?></h2>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'Humanize the brand by showcasing team members with professional, authentic portraits designed for company websites and platforms like LinkedIn.' ); ?></p>
      </div>
      <img src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Executive Portrait" class="service-image">
    </div>

    <!-- 02 -->
    <div class="service-block">
      <div class="service-content">
        <span class="service-num">02</span>
        <h2 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec2_title') ?: 'Culture &<br>Workspace' ); ?></h2>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'Environmental and lifestyle portraits capturing staff in their natural workspace or in action, effectively reflecting the company’s culture and work environment.' ); ?></p>
      </div>
      <img src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Corporate Workspace" class="service-image">
    </div>

    <!-- 03 -->
    <div class="service-block">
      <div class="service-content">
        <span class="service-num">03</span>
        <h2 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec3_title') ?: 'Corporate<br>Events' ); ?></h2>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'Ensure that important moments from conferences, seminars, and product launches are professionally documented.' ); ?></p>
      </div>
      <img src="<?php echo esc_url( get_field('pillar_sec3_img') ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Corporate Events" class="service-image">
    </div>

    <!-- 04 -->
    <div class="service-block">
      <div class="service-content">
        <span class="service-num">04</span>
        <h2 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec4_title') ?: 'Infrastructure<br>& Ambiance' ); ?></h2>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec4_desc') ?: 'Office and workplace photography highlighting the organization’s infrastructure and operational environment to build credibility with stakeholders.' ); ?></p>
      </div>
      <img src="<?php echo esc_url( get_field('pillar_sec4_img') ?: 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Infrastructure and Ambiance" class="service-image">
    </div>

    <!-- 05 -->
    <div class="service-block">
      <div class="service-content">
        <span class="service-num">05</span>
        <h2 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec5_title') ?: 'Product &<br>Cinematic' ); ?></h2>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec5_desc') ?: 'High-quality product photography and cinematic profile videos tailored for marketing campaigns and e-commerce platforms.' ); ?></p>
      </div>
      <img src="<?php echo esc_url( get_field('pillar_sec5_img') ?: 'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Product and Cinematic" class="service-image">
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
