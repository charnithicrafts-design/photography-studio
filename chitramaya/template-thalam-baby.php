<?php
/**
 * Template Name: Thalam Baby & Maternity
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thalam Studio — Baby & Maternity</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,400&family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    /* 1. BASE (Mobile First) */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --bg-dark: #0a0806;
      --bg-light: #f9f6f0;
      --accent-warm: #c48b5e;
      --text-light: #fdfbf7;
      --text-muted: rgba(253,251,247,0.6);
      --font-sans: 'Inter', sans-serif;
      --font-serif: 'EB Garamond', serif;
    }
    body { background: var(--bg-dark); color: var(--text-light); font-family: var(--font-sans); -webkit-font-smoothing: antialiased; }

    /* 2. LAYOUT & MODULES */
    
    /* HERO */
    .hero { position: relative; display: flex; flex-direction: column; justify-content: flex-end; min-height: 100vh; overflow: hidden; padding: 3rem 1.5rem; }
    
    /* The Background: An emotional connection using a warm, moody Unsplash image and a deep gradient */
    .hero-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 30%; filter: saturate(0.8) contrast(1.1); }
    .hero-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(10,8,6,0.3) 0%, rgba(10,8,6,0.8) 60%, rgba(10,8,6,1) 100%); }
    
    .hero-content { position: relative; z-index: 2; max-width: 800px; }
    .hero-eyebrow { font-size: 0.65rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--accent-warm); margin-bottom: 1.5rem; display: block; }
    .hero-headline { font-weight: 900; font-size: clamp(3rem, 12vw, 6.5rem); line-height: 0.9; letter-spacing: -0.04em; margin-bottom: 1.5rem; text-transform: uppercase; }
    .hero-desc { font-family: var(--font-serif); font-size: clamp(1.2rem, 5vw, 1.8rem); line-height: 1.5; color: var(--text-muted); font-style: italic; max-width: 600px; }

    /* MANIFESTO */
    .manifesto { padding: 6rem 1.5rem; display: flex; flex-direction: column; gap: 2rem; background: var(--bg-dark); }
    .manifesto-title { font-weight: 900; font-size: clamp(2rem, 8vw, 4rem); letter-spacing: -0.03em; text-transform: uppercase; line-height: 1; }
    .manifesto-body { font-size: 1rem; line-height: 1.8; color: var(--text-muted); max-width: 500px; }

    /* JOURNEY GRID */
    .journey { padding: 4rem 1.5rem; background: var(--bg-light); color: #1a1a1a; display: flex; flex-direction: column; gap: 3rem; }
    .journey-header { margin-bottom: 2rem; }
    .journey-header h2 { font-weight: 900; font-size: clamp(2.5rem, 10vw, 5rem); letter-spacing: -0.04em; text-transform: uppercase; line-height: 0.9; }
    .journey-grid { display: flex; flex-direction: column; gap: 2rem; }
    .journey-card { border-top: 1px solid rgba(0,0,0,0.1); padding-top: 1.5rem; }
    .journey-card-step { font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent-warm); margin-bottom: 0.5rem; display: block; }
    .journey-card-title { font-family: var(--font-serif); font-style: italic; font-size: 2rem; margin-bottom: 1rem; }
    .journey-card-desc { font-size: 0.9rem; line-height: 1.6; color: rgba(0,0,0,0.6); }

    /* DESKTOP OVERRIDES */
    @media (min-width: 992px) {
      .hero { padding: 6rem 4rem; }
      .manifesto { padding: 10rem 4rem; flex-direction: row; gap: 6rem; align-items: flex-start; justify-content: space-between; }
      .manifesto-body { font-size: 1.15rem; }
      .journey { padding: 8rem 4rem; }
      .journey-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 3rem; }
    }
  </style>
</head>
<body>

  <?php get_template_part('template-parts/global-nav'); ?>

  <section class="hero">
    <!-- Using a highly emotional, tactile image of a mother and newborn -->
    <?php 
      $hero_bg_image = get_field('hero_bg_image');
      $hero_bg_url = get_field('hero_bg_url');
      
      $bg_src = 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=2400&q=80';
      $bg_alt = 'Mother gently holding newborn baby';
      
      if ( $hero_bg_image && isset($hero_bg_image['url']) ) {
          $bg_src = $hero_bg_image['url'];
          $bg_alt = $hero_bg_image['alt'] ?: 'Hero background';
      } elseif ( $hero_bg_url ) {
          $bg_src = $hero_bg_url;
          $bg_alt = 'Hero background';
      }
    ?>
    <img src="<?php echo esc_url( $bg_src ); ?>" alt="<?php echo esc_attr( $bg_alt ); ?>" class="hero-img">
    
    <!-- The gradient overlay creates the emotional transition from the image into the brutalist layout -->
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
      <span class="hero-eyebrow">Thalam Studio</span>
      <h1 class="hero-headline"><?php echo wp_kses_post( get_field('hero_headline') ?: 'The Weight of a<br>Real Moment.' ); ?></h1>
      <p class="hero-desc"><?php echo esc_html( get_field('hero_desc') ?: 'They are only this small for a second. We archive the magic, the chaos, and the delicate art of your family\'s beginning.' ); ?></p>
    </div>
  </section>

  <section class="manifesto">
    <h2 class="manifesto-title">Every Breath<br>is a<br>Masterpiece.</h2>
    <div class="manifesto-body">
      <p>We don’t just take photographs. We construct art around the most fragile, fleeting moments of your life. From the quiet anticipation of maternity to the unpredictable joy of a toddler's first steps, Thalam Studio is a space designed to capture the soul of your growing family.</p>
      <br>
      <p>No stiff poses. No artificial smiles. Just the raw, tactile truth of your love, framed in light.</p>
    </div>
  </section>

  <section class="journey">
    <div class="journey-header">
      <h2><?php echo wp_kses_post( get_field('journey_heading') ?: 'The Archive<br>of You.' ); ?></h2>
    </div>
    <div class="journey-grid">
      <?php 
      $steps = get_field('journey_steps');
      if ( $steps ) : 
        foreach( $steps as $step ) : ?>
          <div class="journey-card">
            <span class="journey-card-step"><?php echo esc_html( $step['step_label'] ); ?></span>
            <h3 class="journey-card-title"><?php echo esc_html( $step['title'] ); ?></h3>
            <p class="journey-card-desc"><?php echo wp_kses_post( $step['description'] ); ?></p>
          </div>
        <?php endforeach; 
      else : ?>
        <div class="journey-card">
          <span class="journey-card-step">01 — Maternity</span>
          <h3 class="journey-card-title">The Prelude.</h3>
          <p class="journey-card-desc">Studio or location-oriented sessions that honor the quiet power and anticipation of motherhood.</p>
        </div>
        <div class="journey-card">
          <span class="journey-card-step">02 — Newborn</span>
          <h3 class="journey-card-title">The Arrival.</h3>
          <p class="journey-card-desc">Intimate, art-directed studio sessions or house visits within the first critical weeks. We handle the aesthetics; you handle the cuddles.</p>
        </div>
        <div class="journey-card">
          <span class="journey-card-step">03 — Toddler</span>
          <h3 class="journey-card-title">The Milestone.</h3>
          <p class="journey-card-desc">Capturing the chaotic, beautiful energy of their first year. Unscripted, outdoors, or styled flawlessly in our studio.</p>
        </div>
        <div class="journey-card">
          <span class="journey-card-step">04 — Bump to Baby</span>
          <h3 class="journey-card-title">The Tapestry.</h3>
          <p class="journey-card-desc">A seamless, documentary-style archiving of your entire journey. Because you shouldn't have to choose which memory to keep.</p>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <?php wp_footer(); ?>
</body>
</html>
