<?php
/**
 * Template Name: Maternity & Bump-to-Baby
 * Template Post Type: page
 */
get_header();
?>
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
  .manifesto { padding: 8rem 2rem; text-align: center; max-width: 800px; margin: 0 auto; }
  .manifesto h2 { font-family: var(--font-serif); font-size: clamp(2rem, 5vw, 3.5rem); font-style: italic; font-weight: 400; line-height: 1.3; color: var(--text-dark); }

  /* 4. DUAL PANE - STUDIO VS OUTDOOR */
  .dual-pane { display: flex; flex-direction: column; height: auto; }
  .pane { position: relative; padding: 4rem 2rem; min-height: 60vh; display: flex; flex-direction: column; justify-content: flex-end; overflow: hidden; color: #fff; cursor: pointer; }
  .pane-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease, filter 0.8s ease; filter: brightness(0.7); }
  .pane-content { position: relative; z-index: 2; }
  .pane-subtitle { font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 0.5rem; color: var(--accent-warm); display: block; }
  .pane-title { font-family: var(--font-serif); font-size: 3rem; font-style: italic; line-height: 1; margin-bottom: 1rem; }
  .pane-desc { opacity: 0; transform: translateY(10px); transition: 0.4s ease; max-width: 400px; line-height: 1.6; }
  
  .pane:hover .pane-img { transform: scale(1.05); filter: brightness(0.9); }
  .pane:hover .pane-desc { opacity: 1; transform: translateY(0); }

  @media(min-width: 768px) {
    .dual-pane { flex-direction: row; height: 85vh; }
    .pane { flex: 1; transition: flex 0.6s cubic-bezier(0.25, 1, 0.5, 1); min-height: 100%; }
    .pane:hover { flex: 1.5; }
  }

  /* 5. STANDARD SECTIONS */
  .info-section { display: grid; grid-template-columns: 1fr; gap: 4rem; padding: 6rem 2rem; max-width: 1400px; margin: 0 auto; align-items: center; }
  .info-section.reverse { direction: rtl; }
  .info-section.reverse > * { direction: ltr; }
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

</style>

<main class="maternity-page">
  <!-- HERO -->
  <section class="hero">
    <img class="hero-img" src="<?php echo esc_url( get_field('pillar_hero_bg_url') ?: 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=2000&q=80' ); ?>" alt="Maternity Hero">
    <div class="hero-content">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'The Art of <em>Anticipation</em>.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'Documenting the most profound transformation of your life. A cinematic celebration of motherhood, from the first flutter to the grand arrival.' ); ?></p>
      <button class="hero-btn" data-trigger="booking">Preserve Your Legacy</button>
    </div>
  </section>

  <!-- MANIFESTO -->
  <section class="manifesto">
    <h2>Your body is writing a legacy. We are here to archive it with the reverence it deserves.</h2>
  </section>

  <!-- DUAL PANE -->
  <section class="dual-pane">
    <!-- Studio -->
    <div class="pane">
      <img class="pane-img" src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1544126592-807ade215a0b?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Studio Maternity">
      <div class="pane-content">
        <span class="pane-subtitle">01 // The Studio</span>
        <h3 class="pane-title"><?php echo wp_kses_post( get_field('pillar_sec1_title') ?: 'Art-Themed Portraiture' ); ?></h3>
        <p class="pane-desc"><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'Sculpted by light. Fine-art editorial portraiture in our private Thalam studio, designed to capture power and vulnerability.' ); ?></p>
      </div>
    </div>
    <!-- Outdoor -->
    <div class="pane">
      <img class="pane-img" src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Outdoor Maternity">
      <div class="pane-content">
        <span class="pane-subtitle">02 // The Location</span>
        <h3 class="pane-title"><?php echo wp_kses_post( get_field('pillar_sec2_title') ?: 'Bathed in Nature' ); ?></h3>
        <p class="pane-desc"><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'Ethereal, location-oriented sessions that capture your glow at golden hour in sweeping natural environments.' ); ?></p>
      </div>
    </div>
  </section>

  <!-- FAMILY & BABY SHOWER -->
  <section class="info-section">
    <div class="info-img-wrapper">
      <img class="info-img" src="<?php echo esc_url( get_field('pillar_sec3_img') ?: 'https://images.unsplash.com/photo-1511895426328-dc8714191300?auto=format&fit=crop&w=800&q=80' ); ?>" alt="Baby Shower">
    </div>
    <div class="info-content">
      <h3 class="info-title"><?php echo wp_kses_post( get_field('pillar_sec3_title') ?: 'The Village Awaits' ); ?></h3>
      <p class="info-desc"><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'Joyful, documentary-style coverage of your baby shower and generational family portraits. We capture the overwhelming support and anticipation of the community waiting to welcome your child.' ); ?></p>
    </div>
  </section>

  <!-- BUMP TO BABY -->
  <section class="info-section reverse">
    <div class="info-img-wrapper">
      <img class="info-img" src="<?php echo esc_url( get_field('pillar_sec4_img') ?: 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=800&q=80' ); ?>" alt="Bump to Baby">
    </div>
    <div class="info-content">
      <h3 class="info-title"><?php echo wp_kses_post( get_field('pillar_sec4_title') ?: 'Bump to Baby' ); ?></h3>
      <p class="info-desc"><?php echo wp_kses_post( get_field('pillar_sec4_desc') ?: 'The complete journey. A cohesive visual story spanning your pregnancy through to your newborn’s first weeks. We preserve the seamless transition from anticipation to arrival.' ); ?></p>
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

<?php get_footer(); ?>
