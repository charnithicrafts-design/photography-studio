<?php
/**
 * Template Name: Maternity & Bump-to-Baby
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maternity & Bump-to-Baby — Chithramaya</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,400&family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
<style>
  /* 1. BASE */
  :root {
    --bg-light: #f9f6f0;
    --text-dark: #1a1a1a;
    --accent-warm: #c48b5e;
    --font-sans: 'Inter', sans-serif;
    --font-serif: 'EB Garamond', serif;
  }
  body { background: var(--bg-light); color: var(--text-dark); }
  
  /* 2. HERO */
  .hero { position: relative; height: 100vh; display: flex; flex-direction: column; justify-content: center; padding: 4rem 2rem; overflow: hidden; background: #0a0806; color: #fff; }
  .hero-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.6; filter: saturate(0.8) contrast(1.1); }
  .hero-content { position: relative; z-index: 2; max-width: 800px; margin: 0 auto; text-align: center; }
  .hero-title { font-family: var(--font-serif); font-size: clamp(3rem, 8vw, 6rem); line-height: 1; margin-bottom: 1rem; font-style: italic; }
  .hero-desc { font-size: clamp(1rem, 2vw, 1.25rem); max-width: 600px; color: rgba(255,255,255,0.8); margin: 0 auto 2rem; }
  .hero-btn { display: inline-block; padding: 1rem 2rem; background: transparent; border: 1px solid rgba(255,255,255,0.3); color: #fff; text-decoration: none; text-transform: uppercase; letter-spacing: 0.1em; transition: 0.3s; cursor: pointer; font-family: inherit; font-size: 0.9rem; }
  .hero-btn:hover { background: #fff; color: #000; }

  /* 3. MANIFESTO */
  .manifesto { padding: 10rem 2rem; text-align: center; max-width: 900px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; }
  .manifesto-label { font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent-warm); margin-bottom: 2rem; display: block; }
  .manifesto h2 { font-family: var(--font-serif); font-size: clamp(2.5rem, 5vw, 4rem); font-style: italic; font-weight: 400; line-height: 1.2; color: var(--text-dark); text-transform: none; margin-bottom: 2rem; }
  .manifesto p { font-size: 1.1rem; line-height: 1.8; color: #555; max-width: 500px; }

  /* 4. DUAL PANE - STUDIO VS OUTDOOR */
  .dual-pane { display: flex; flex-direction: column; height: auto; }
  .pane { position: relative; padding: 4rem 2rem; min-height: 60vh; display: flex; flex-direction: column; justify-content: flex-end; overflow: hidden; color: #fff; cursor: pointer; }
  .pane-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease, filter 0.8s ease; filter: brightness(0.7); }
  .pane-content { position: relative; z-index: 2; }
  .pane-subtitle { font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 0.5rem; color: var(--accent-warm); display: block; }
  .pane-title { font-family: var(--font-serif); font-size: 3rem; font-style: italic; line-height: 1; margin-bottom: 1rem; }
  .pane-desc { max-width: 400px; line-height: 1.6; opacity: 1; transform: translateY(0); transition: 0.4s ease; }
  
  @media (hover: hover) and (pointer: fine) {
    .pane-desc { opacity: 0; transform: translateY(10px); }
    .pane:hover .pane-img { transform: scale(1.05); filter: brightness(0.9); }
    .pane:hover .pane-desc { opacity: 1; transform: translateY(0); }
  }

  @media(min-width: 768px) {
    .dual-pane { flex-direction: row; height: 85vh; }
    .pane { flex: 1; transition: flex 0.6s cubic-bezier(0.25, 1, 0.5, 1); min-height: 100%; }
    .pane:hover { flex: 1.5; }
  }

  /* 5. STANDARD SECTIONS */
  .info-section { display: grid; grid-template-columns: 1fr; gap: 4rem; padding: 6rem 2rem; max-width: 1400px; margin: 0 auto; align-items: center; }
  .info-section:not(.reverse) .info-content { justify-self: start; }
  .info-section.reverse .info-content { order: 1; justify-self: end; }
  .info-section.reverse .info-img-wrapper { order: 2; }
  .info-img-wrapper { position: relative; aspect-ratio: 4/5; overflow: hidden; }
  .info-img { width: 100%; height: 100%; object-fit: cover; }
  .info-content { max-width: 500px; padding: 0 2rem; }
  .info-title { font-family: var(--font-serif); font-size: 3rem; font-style: italic; margin-bottom: 1.5rem; line-height: 1.1; }
  .info-desc { font-size: 1.1rem; line-height: 1.8; color: #555; }
  
  @media(min-width: 768px) {
    .info-section { grid-template-columns: 1fr 1fr; }
  }

  /* 6. BOOKING JOURNEY CTA */
  .booking-journey { padding: 8rem 2rem; background: var(--text-dark); color: #fff; text-align: center; }
  .booking-journey h2 { font-family: var(--font-serif); font-size: clamp(2.5rem, 6vw, 4rem); font-style: italic; margin-bottom: 4rem; }
  .timeline { display: flex; flex-direction: column; gap: 2rem; max-width: 900px; margin: 0 auto 4rem; text-align: left; }
  .timeline-step { display: flex; gap: 2rem; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1.5rem; }
  .step-num { font-size: 0.8rem; letter-spacing: 0.1em; color: var(--accent-warm); }
  .step-text { font-size: 1.1rem; }
  
  @media(min-width: 768px) {
    .timeline { flex-direction: row; gap: 1rem; text-align: center; }
    .timeline-step { flex-direction: column; gap: 1rem; flex: 1; align-items: center; border-top: none; border-left: 1px solid rgba(255,255,255,0.1); padding-top: 0; padding-left: 1.5rem; }
    .timeline-step:first-child { border-left: none; padding-left: 0; }
  }

  /* 7. EMPATHETIC BRUTALISM BENTO BOXES */
  .bento-wrapper { width: 100%; display: grid; gap: 1rem; }
  .bento-item { overflow: hidden; border: 4px solid #111; box-shadow: 8px 8px 0px #111; background: #fff; }
  .bento-item img { width: 100%; height: 100%; object-fit: cover; display: block; filter: saturate(0.9); transition: 0.4s ease; }
  .bento-item:hover img { filter: saturate(1.1); transform: scale(1.02); }

  .bento-2 { grid-template-columns: 3fr 2fr; height: 500px; }
  .bento-2 .bento-item:nth-child(1) { grid-column: 1; grid-row: 1; }
  .bento-2 .bento-item:nth-child(2) { grid-column: 2; grid-row: 1; }

  .bento-3 { grid-template-columns: 2fr 1fr; grid-template-rows: 1fr 1fr; height: 600px; }
  .bento-3 .bento-item:nth-child(1) { grid-column: 1; grid-row: 1 / 3; }
  .bento-3 .bento-item:nth-child(2) { grid-column: 2; grid-row: 1; }
  .bento-3 .bento-item:nth-child(3) { grid-column: 2; grid-row: 2; }

  @media(max-width: 768px) {
    .bento-2, .bento-3 { grid-template-columns: 1fr; grid-template-rows: auto; height: auto; }
    .bento-2 .bento-item, .bento-3 .bento-item { grid-column: 1 !important; grid-row: auto !important; aspect-ratio: 4/3; }
    .bento-item { box-shadow: 4px 4px 0px #111; }
  }

</style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>

<main class="maternity-page">
  <!-- HERO -->
  <section class="hero">
    <img class="hero-img" src="<?php echo esc_url( get_field('pillar_hero_bg_url') ?: 'https://images.unsplash.com/photo-1654894811904-d17107a20c29?auto=format&fit=crop&w=2000&q=80' ); ?>" alt="Maternity Hero">
    <div class="hero-content">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'The Genesis of Your <em>Legacy</em>.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'There is a sacred quiet that comes with pregnancy. It is the feeling of holding a whole new world inside you. Before they are a person you can hold in your arms, they are a seed of wonder growing in the secret, safe sanctuary of your own heart.' ); ?></p>
      <button class="hero-btn" data-trigger="booking">Preserve Your Legacy</button>
    </div>
  </section>

  <!-- MANIFESTO -->
  <section class="manifesto">
    <span class="manifesto-label">The Seed of Wonder</span>
    <h2>Like a seed in the earth, you are growing in silence, shielded by love, ready to meet the sun.</h2>
    <p>Your body is doing holy work. We are here to archive its breathtaking power.</p>
  </section>

  <!-- DUAL PANE -->
  <section class="dual-pane">
    <!-- Studio -->
    <div class="pane">
      <img class="pane-img" src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1542385151-efd9000785a0?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Studio Maternity">
      <div class="pane-content">
        <span class="pane-subtitle">01 // The Sanctuary</span>
        <h3 class="pane-title">Studio Style</h3>
        <p class="pane-desc"><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'Art themed sessions crafted to capture the quiet power and beauty of your journey.' ); ?></p>
      </div>
    </div>
    <!-- Outdoor -->
    <div class="pane">
      <img class="pane-img" src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1705746401414-8bae063ee19f?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Outdoor Maternity">
      <div class="pane-content">
        <span class="pane-subtitle">02 // The Location</span>
        <h3 class="pane-title">Outdoor Style</h3>
        <p class="pane-desc"><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'Location oriented sessions celebrating the organic blossoming of motherhood in beautiful, natural light.' ); ?></p>
      </div>
    </div>
  </section>

  <!-- FAMILY & BABY SHOWER -->
  <section class="info-section">
    <div class="bento-wrapper bento-2">
      <div class="bento-item">
        <img src="https://images.unsplash.com/photo-1760328249117-18488466e34c?auto=format&fit=crop&w=800&q=80" alt="Generational Family Gathering">
      </div>
      <div class="bento-item">
        <img src="https://plus.unsplash.com/premium_photo-1677654190250-e9a946a29a5a?auto=format&fit=crop&w=600&q=80" alt="Baby Shower Decor Details">
      </div>
    </div>
    <div class="info-content">
      <h3 class="info-title">Family Portraits & Baby Shower</h3>
      <p class="info-desc"><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'A return ticket to the fleeting season of becoming. Joyful, documentary-style coverage of your baby shower and generational family portraits, capturing the community waiting to welcome your child.' ); ?></p>
    </div>
  </section>

  <!-- BUMP TO BABY -->
  <section class="info-section reverse">
    <div class="bento-wrapper bento-3">
      <div class="bento-item">
        <img src="https://images.unsplash.com/photo-1569952524646-705a421e054c?auto=format&fit=crop&w=800&q=80" alt="Maternity Bump Portrait">
      </div>
      <div class="bento-item">
        <img src="https://images.unsplash.com/photo-1605988178022-c85ec62c7267?auto=format&fit=crop&w=600&q=80" alt="Newborn Details Hands">
      </div>
      <div class="bento-item">
        <img src="https://images.unsplash.com/photo-1715433485680-9adc962bbcbc?auto=format&fit=crop&w=600&q=80" alt="Parents Holding Newborn">
      </div>
    </div>
    <div class="info-content">
      <h3 class="info-title">Bump to Baby</h3>
      <p class="info-desc"><?php echo wp_kses_post( get_field('pillar_sec4_desc') ?: 'A cohesive visual story spanning your pregnancy through to your newborn’s first weeks. We preserve the seamless transition from brave anticipation to joyous arrival.' ); ?></p>
    </div>
  </section>

  <!-- CTA / JOURNEY -->
  <section class="booking-journey">
    <h2>The Journey to Your Archive</h2>
    <div class="timeline">
      <div class="timeline-step">
        <span class="step-num">01</span>
        <span class="step-text">Initial Consultation & Vision</span>
      </div>
      <div class="timeline-step">
        <span class="step-num">02</span>
        <span class="step-text">Wardrobe & Location Styling</span>
      </div>
      <div class="timeline-step">
        <span class="step-num">03</span>
        <span class="step-text">The Cinematic Shoot</span>
      </div>
      <div class="timeline-step">
        <span class="step-num">04</span>
        <span class="step-text">The Heirloom Reveal</span>
      </div>
    </div>
    <button class="hero-btn" data-trigger="booking" style="border-color: #fff; color: #fff;">Begin the Consultation</button>
  </section>
</main>
<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
