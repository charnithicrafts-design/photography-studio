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
      --text-light: #F7F5F0;
      --accent: #E5A97A;
      --font-sans: 'Inter', sans-serif;
      --font-serif: 'EB Garamond', serif;
    }
    body { font-family: var(--font-sans); background: var(--bg-dark); color: var(--text-light); overflow-x: hidden; }
    
    /* NAV */
    nav { position: fixed; top: 0; width: 100%; padding: 1.5rem 3rem; display: flex; justify-content: space-between; align-items: center; z-index: 100; mix-blend-mode: difference; color: #fff; }
    .nav-logo { font-weight: 900; letter-spacing: -0.02em; text-decoration: none; color: inherit; font-size: 1.25rem; }
    .nav-book a { text-decoration: none; color: inherit; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; }
    
    /* HERO */
    .hero { position: relative; min-height: 100vh; display: flex; align-items: center; padding: 6rem 3rem; background: url('https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=2000&q=80') center/cover no-repeat; }
    .hero::before { content: ''; position: absolute; inset: 0; background: linear-gradient(to right, rgba(18,16,14,0.9) 0%, rgba(18,16,14,0.4) 100%); }
    .hero-content { position: relative; z-index: 10; max-width: 800px; }
    .hero-title { font-family: var(--font-serif); font-size: clamp(4rem, 8vw, 8rem); font-style: italic; line-height: 0.9; margin-bottom: 2rem; font-weight: 400; color: var(--accent); }
    .hero-desc { font-size: 1.25rem; line-height: 1.6; color: #e5e5e5; margin-bottom: 3rem; max-width: 500px; font-weight: 300; }
    .hero-btn { display: inline-block; padding: 1.25rem 3rem; background: var(--accent); color: var(--bg-dark); text-transform: uppercase; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.15em; text-decoration: none; transition: 0.3s; }
    .hero-btn:hover { background: #fff; }
    
    /* STORY SECTIONS */
    .story-section { padding: 8rem 3rem; }
    .story-row { display: flex; align-items: center; gap: 5rem; margin-bottom: 10rem; }
    .story-row:nth-child(even) { flex-direction: row-reverse; }
    
    .story-img-wrapper { flex: 1; position: relative; }
    .story-img-wrapper img { width: 100%; height: auto; object-fit: cover; aspect-ratio: 4/3; }
    .story-img-wrapper::after { content: ''; position: absolute; top: 2rem; left: 2rem; right: -2rem; bottom: -2rem; border: 1px solid rgba(255,255,255,0.1); z-index: -1; }
    .story-row:nth-child(even) .story-img-wrapper::after { left: -2rem; right: 2rem; }
    
    .story-content { flex: 1; }
    .story-title { font-size: 2.5rem; font-family: var(--font-serif); font-style: italic; color: var(--accent); margin-bottom: 1.5rem; }
    .story-desc { font-size: 1.1rem; line-height: 1.8; color: #a3a3a3; }
    
    @media (max-width: 768px) {
      .hero, .story-section { padding: 4rem 1.5rem; }
      .story-row, .story-row:nth-child(even) { flex-direction: column; gap: 3rem; margin-bottom: 6rem; }
      .story-img-wrapper::after { display: none; }
    }
  </style>
</head>
<body>
  <nav>
    <a href="<?php echo home_url('/'); ?>" class="nav-logo">Chitramaya Creatives</a>
    <div class="nav-book"><a href="#" data-trigger="booking">Reserve Date ↓</a></div>
  </nav>

  <section class="hero">
    <div class="hero-content">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'The Grand<br>Heirloom.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'An intimate, unscripted archiving of your most significant cultural milestones. Because you shouldn’t have to choose which memory to keep.' ); ?></p>
      <a href="#" class="hero-btn" data-trigger="booking">Reserve Your Date</a>
    </div>
  </section>

  <section class="story-section">
    <!-- Story 1 -->
    <div class="story-row">
      <div class="story-img-wrapper">
        <img src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Weddings">
      </div>
      <div class="story-content">
        <h2 class="story-title"><?php echo wp_kses_post( get_field('pillar_sec1_title') ?: 'Weddings & Destination' ); ?></h2>
        <p class="story-desc"><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'Pre/post wedding documentation and destination coverage. We approach your wedding not as an event, but as a cinematic narrative that demands the highest level of storytelling.' ); ?></p>
      </div>
    </div>

    <!-- Story 2 -->
    <div class="story-row">
      <div class="story-img-wrapper">
        <img src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1529156069898-49953eb1b5ce?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Cultural Milestones">
      </div>
      <div class="story-content">
        <h2 class="story-title"><?php echo wp_kses_post( get_field('pillar_sec2_title') ?: 'Cultural Milestones' ); ?></h2>
        <p class="story-desc"><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'Respectful, comprehensive archiving of Sastiyabthapoorthi, Upanayanam, and Sadhabishegam. Documenting generations coming together with authenticity and grace.' ); ?></p>
      </div>
    </div>

    <!-- Story 3 -->
    <div class="story-row">
      <div class="story-img-wrapper">
        <img src="<?php echo esc_url( get_field('pillar_sec3_img') ?: 'https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Family Portraits">
      </div>
      <div class="story-content">
        <h2 class="story-title"><?php echo wp_kses_post( get_field('pillar_sec3_title') ?: 'The Grand Portrait' ); ?></h2>
        <p class="story-desc"><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'Studio or house-visit art-themed family portraits designed to hang on your walls for the next fifty years.' ); ?></p>
      </div>
    </div>
  </section>

  <?php wp_footer(); ?>
</body>
</html>
