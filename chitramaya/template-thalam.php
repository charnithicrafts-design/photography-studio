<?php
/**
 * Template Name: Thalam Studio
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thalam Studio — Chithramaya</title>
  <?php wp_head(); ?>
</head>
<body>

  <?php get_template_part('template-parts/global-nav'); ?>

  <main class="site-main">
    
    <!-- BENTO HERO -->
    <section class="hero-bento">
      <div class="bento-hero-wrapper">
        <div class="bento-hero-main">
          <div class="bento-hero-label">[ PRODUCTION FACILITY ]</div>
          <h1 class="bento-hero-title">The Space for<br>the Story.</h1>
          <p class="bento-hero-desc">
            A purpose-built studio in Trichy for broadcast audio, portraiture, and commercial sets.
          </p>
          <div class="bento-hero-cta">
            <a href="#tour" class="btn-primary" data-trigger="booking">
              Tour Thalam Studio
              <span class="btn-primary-icon">
                <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </span>
            </a>
          </div>
        </div>

        <div class="bento-hero-side">
          <div>
            <div class="bento-side-label">Facility Capabilities</div>
            <div class="bento-tag-cloud" style="margin-top: 16px;">
              <span class="bento-tag">Podcast Suite</span>
              <span class="bento-tag">Commercial Sets</span>
              <span class="bento-tag">Controlled Light</span>
              <span class="bento-tag">Baby Studio</span>
              <span class="bento-tag">Maternity</span>
            </div>
          </div>
          <div class="bento-proof-note">
            <span class="bento-proof-dot"></span>
            <span>Fully Equipped · Trichy, TN</span>
          </div>
        </div>
      </div>
    </section>

    <!-- CAPABILITIES SECTION (Standard Service Cards) -->
    <section class="canvas-section" style="padding: 100px 5%;">
      <div class="section-intro" style="margin-bottom: 60px;">
        <h2 style="font-family: var(--font-display); font-size: 3rem; color: var(--color-dark); margin-bottom: 24px;">Built for production.</h2>
        <p style="font-family: var(--font-primary); font-size: 1.2rem; color: var(--color-dark); max-width: 600px; opacity: 0.8; line-height: 1.6;">
          We designed Thalam Studio to be a versatile blank canvas that adapts to the specific technical and creative needs of any shoot.
        </p>
      </div>

      <div class="service-cards-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 32px;">
        
        <div class="service-card" style="background: var(--color-white); padding: 40px; border-radius: var(--radius-md); box-shadow: 0 4px 24px rgba(0,0,0,0.04);">
          <div class="service-card-tags" style="display: flex; gap: 8px; margin-bottom: 24px;">
            <span class="tag" style="background: var(--color-canvas); color: var(--color-dark); padding: 4px 10px; font-size: 10px; font-family: var(--font-primary); text-transform: uppercase; border-radius: 100px; font-weight: 500;">Commercial</span>
          </div>
          <h3 style="font-family: var(--font-serif); font-size: 2rem; color: var(--color-dark); margin-bottom: 16px;">Ad Shoots & Campaigns</h3>
          <p style="font-family: var(--font-primary); font-size: 1rem; color: var(--color-dark); opacity: 0.8; line-height: 1.6;">Full lighting grid, wide infinity walls, and complete environmental control for high-end fashion, product, and commercial shoots.</p>
        </div>

        <div class="service-card" style="background: var(--color-white); padding: 40px; border-radius: var(--radius-md); box-shadow: 0 4px 24px rgba(0,0,0,0.04);">
          <div class="service-card-tags" style="display: flex; gap: 8px; margin-bottom: 24px;">
            <span class="tag" style="background: var(--color-canvas); color: var(--color-dark); padding: 4px 10px; font-size: 10px; font-family: var(--font-primary); text-transform: uppercase; border-radius: 100px; font-weight: 500;">Audio / Video</span>
          </div>
          <h3 style="font-family: var(--font-serif); font-size: 2rem; color: var(--color-dark); margin-bottom: 16px;">Broadcast Podcast Suite</h3>
          <p style="font-family: var(--font-primary); font-size: 1rem; color: var(--color-dark); opacity: 0.8; line-height: 1.6;">Acoustically treated environment equipped with multi-cam setups and broadcast-grade mics. Just sit down and talk.</p>
        </div>

        <div class="service-card" style="background: var(--color-white); padding: 40px; border-radius: var(--radius-md); box-shadow: 0 4px 24px rgba(0,0,0,0.04);">
          <div class="service-card-tags" style="display: flex; gap: 8px; margin-bottom: 24px;">
            <span class="tag" style="background: var(--color-canvas); color: var(--color-dark); padding: 4px 10px; font-size: 10px; font-family: var(--font-primary); text-transform: uppercase; border-radius: 100px; font-weight: 500;">Portraiture</span>
          </div>
          <h3 style="font-family: var(--font-serif); font-size: 2rem; color: var(--color-dark); margin-bottom: 16px;">Baby & Maternity Sets</h3>
          <p style="font-family: var(--font-primary); font-size: 1rem; color: var(--color-dark); opacity: 0.8; line-height: 1.6;">Comfortable, temperature-controlled, private sessions with an extensive prop room and soft, highly flattering light setups.</p>
        </div>

      </div>
    </section>

    <!-- CAMPAIGN CTA -->
    <section class="global-cta">
      <h2 class="global-cta-title brut-protect-overflow">Come see the space.</h2>
      <a href="#book" class="btn-primary" data-trigger="booking">
        Tour Thalam Studio
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
