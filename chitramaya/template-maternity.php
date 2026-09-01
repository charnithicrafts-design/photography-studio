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
  <?php wp_head(); ?>
</head>
<body>

  <?php get_template_part('template-parts/global-nav'); ?>

  <main class="site-main">
    
    <!-- BENTO HERO -->
    <section class="hero-bento">
      <div class="bento-hero-wrapper">
        <div class="bento-hero-main">
          <div class="bento-hero-label">[ BUMP TO BABY ]</div>
          <h1 class="bento-hero-title">Before Everything<br>Changes.</h1>
          <p class="bento-hero-desc">
            Quiet, beautiful portraits documenting the wait.
          </p>
          <div class="bento-hero-cta">
            <a href="#book" class="btn-primary" data-trigger="booking">
              Book a session
              <span class="btn-primary-icon">
                <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </span>
            </a>
          </div>
        </div>

        <div class="bento-hero-side">
          <div>
            <div class="bento-side-label">Session Focus</div>
            <div class="bento-tag-cloud" style="margin-top: 16px;">
              <span class="bento-tag">Studio Maternity</span>
              <span class="bento-tag">Outdoor Art Themes</span>
              <span class="bento-tag">Bump-to-Baby</span>
              <span class="bento-tag">Family Anticipation</span>
            </div>
          </div>
          <div class="bento-proof-note">
            <span class="bento-proof-dot"></span>
            <span>Documentary & Fine Art</span>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTENT GRID PLACEHOLDER -->
    <section class="canvas-section" style="padding: 100px 5%; min-height: 50vh;">
      <div class="section-intro" style="text-align: center;">
        <h2 style="font-family: var(--font-display); font-size: 2.5rem; color: var(--color-dark); margin-bottom: 24px;">Honoring the wait.</h2>
        <p style="font-family: var(--font-primary); font-size: 1.125rem; color: var(--color-dark); opacity: 0.8; max-width: 600px; margin: 0 auto; line-height: 1.6;">
          Your journey into motherhood is a deeply personal, brief chapter. We provide a calm, supportive environment to create timeless portraits of this powerful transformation.
        </p>
      </div>
    </section>

    <!-- CAMPAIGN CTA -->
    <section class="global-cta">
      <h2 class="global-cta-title brut-protect-overflow">Let's document the wait.</h2>
      <a href="#book" class="btn-primary" data-trigger="booking">
        Book a session
        <span class="btn-primary-icon">
          <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </a>
    </section>

  </main>

  <?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
