<?php
/**
 * Template Name: Thalam Baby
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thalam Baby — Chithramaya</title>
  <?php wp_head(); ?>
</head>
<body>

  <?php get_template_part('template-parts/global-nav'); ?>

  <main class="site-main">
    
    <!-- BENTO HERO -->
    <section class="hero-bento">
      <div class="bento-hero-wrapper">
        <div class="bento-hero-main">
          <div class="bento-hero-label">[ FIRST YEAR ]</div>
          <h1 class="bento-hero-title">They Grow So<br>Fast.</h1>
          <p class="bento-hero-desc">
            From newborn curled-up sleep to the first messy cake smash.
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
              <span class="bento-tag">Newborn</span>
              <span class="bento-tag">Infant Milestones</span>
              <span class="bento-tag">1st Birthday</span>
              <span class="bento-tag">Toddler Portraits</span>
            </div>
          </div>
          <div class="bento-proof-note">
            <span class="bento-proof-dot"></span>
            <span>House Visits & Studio</span>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTENT GRID PLACEHOLDER -->
    <section class="canvas-section" style="padding: 100px 5%; min-height: 50vh;">
      <div class="section-intro" style="text-align: center;">
        <h2 style="font-family: var(--font-display); font-size: 2.5rem; color: var(--color-dark); margin-bottom: 24px;">The First Chapter.</h2>
        <p style="font-family: var(--font-primary); font-size: 1.125rem; color: var(--color-dark); opacity: 0.8; max-width: 600px; margin: 0 auto; line-height: 1.6;">
          Children change entirely in their first twelve months. We safely and patiently photograph these fleeting stages—from the delicate newborn days to the chaotic joy of their first birthday.
        </p>
      </div>
    </section>

    <!-- CAMPAIGN CTA -->
    <section class="global-cta">
      <h2 class="global-cta-title brut-protect-overflow">Capture the first chapter.</h2>
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
