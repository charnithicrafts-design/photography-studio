<?php
/**
 * Template Name: Chithramaya Creatives
 * Template Post Type: page
 * Description: Full-page portfolio landing for Chithramaya Creatives.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chithramaya Creatives — Photography Studio</title>
  <meta name="description" content="Chithramaya Creatives — Commercial photography, brand photography, events, and visual storytelling from Trichy, Tamil Nadu.">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-chitramaya.compiled.css?ver=<?php echo filemtime(get_stylesheet_directory() . '/assets/css/pages/template-chitramaya.compiled.css'); ?>">
</head>
<body>
<!-- =====================================================
             SECTION 0: HERO (WE CLICK — 3D Interlocked Composition)
             ===================================================== -->
        <div class="hero-viewport" id="hero">
            <?php get_template_part('template-parts/global-nav'); ?>
            
            <!-- Spacer to maintain flex layout since global-nav is position: fixed -->
            <div style="height: clamp(54px, 7vh, 70px); width: 100%; flex-shrink: 0;"></div>

            <div class="hero-stage-container">
                <div class="composition-box">
                    <div class="text-top-left">WE</div>
                    <div class="photo-foreground-cutout">
                        <picture>
                            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/artistic-photo.webp" type="image/webp">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/artistic-photo.png" alt="Chithramaya Creative Portrait" class="artistic-cutout-img" />
                        </picture>
                    </div>
                    <div class="text-bottom-right">
                        <span class="click-text">CLICK</span>
                        <div class="camera-icon-wrapper">
                            <picture>
                                <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/camera.webp" type="image/webp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/camera.png" alt="Camera" class="camera-icon-img" />
                            </picture>
                        </div>
                    </div>
                </div>
            <!-- CTA is now INSIDE the hero stage — clear separation from section below -->
            <div class="hero-cta-inline">
                <div class="cta-pill-group">
                    <a href="#services" class="cta-main-btn">Let's make something.</a>
                    <a href="#services" class="cta-arrow-btn cta-bounce">↓</a>
                </div>
            </div>
            </div>

        </div>

        <!-- =====================================================
             SECTION 1–5: DUALITY SPLIT — MONEY (DARK) vs ART (WHITE)
             ===================================================== -->
        <section class="brutalist-monolith-wrapper" id="services" aria-label="Services and Studios Monolith">

      <!-- TOP SUB-HEADER BAR -->
      <div class="brutalist-meta-bar">
        <div class="brutalist-meta-left"><span class="meta-tag">[ WHAT WE DO ]</span></div>
        <div class="brutalist-meta-right">
          <span>INDEX: 01 &mdash; 05</span>
        </div>
      </div>

      <!-- COMPACT SERVICE RIBBON: ALL 5 COLUMNS DARK (UNIFIED COMMON REGION) -->
      <div class="brutalist-ribbon-container">
        <div class="brutalist-ribbon-grid">

          <!-- 01 BRAND & CORPORATE -->
          <a href="/corporate-brand/" class="brutalist-card-unit" id="opt2-cell-01">
            <div class="unit-top">
              <div class="unit-num-row"><span class="unit-num">01</span></div>
              <h3 class="unit-title">Brand &amp;<br>Corporate</h3>
              <p class="unit-statement">Executive portraits that build market credibility.</p>
            </div>
            <div class="unit-bottom"><span class="unit-arrow">↗</span></div>
          </a>

          <!-- 02 COMMERCIAL CAMPAIGNS -->
          <a href="/commercial/" class="brutalist-card-unit" id="opt2-cell-02">
            <div class="unit-top">
              <div class="unit-num-row"><span class="unit-num">02</span></div>
              <h3 class="unit-title">Commercial<br>Campaigns</h3>
              <p class="unit-statement">Products and spaces documented to sell.</p>
            </div>
            <div class="unit-bottom"><span class="unit-arrow">↗</span></div>
          </a>

          <!-- 03 PODCAST & PRODUCTION -->
          <a href="/podcast-interview/" class="brutalist-card-unit" id="opt2-cell-03">
            <div class="unit-top">
              <div class="unit-num-row"><span class="unit-num">03</span></div>
              <h3 class="unit-title">Podcast &amp;<br>Production</h3>
              <p class="unit-statement">Broadcast acoustic rooms and 4K cinema.</p>
            </div>
            <div class="unit-bottom"><span class="unit-arrow">↗</span></div>
          </a>

          <!-- 04 EVENTS & HERITAGE (dark, pills styled for dark bg) -->
          <a href="/events-portrait/" class="brutalist-card-unit" id="opt2-cell-04">
            <div class="unit-top">
              <div class="unit-num-row"><span class="unit-num">04</span></div>
              <h3 class="unit-title">Events &amp;<br>Portraiture</h3>
              <p class="unit-statement">Documentary for generations to remember.</p>
              <div class="unit-subpills">
                <span class="subpill">Weddings ↗</span>
                <span class="subpill">Maternity ↗</span>
                <span class="subpill">Infant Art ↗</span>
              </div>
            </div>
            <div class="unit-bottom"><span class="unit-arrow">↗</span></div>
          </a>

          <!-- 05 BRAND DESIGN -->
          <a href="/brand-design/" class="brutalist-card-unit" id="opt2-cell-05">
            <div class="unit-top">
              <div class="unit-num-row">
                <span class="unit-num">05</span>
                <span class="unit-evolving-inline">[ Evolving ]</span>
              </div>
              <h3 class="unit-title">Brand<br>Design</h3>
              <p class="unit-statement">Distinctive wordmarks and visual systems.</p>
            </div>
            <div class="unit-bottom"><span class="unit-arrow">↗</span></div>
          </a>

        </div>
      </div>

      <!-- BILLBOARD: HEADLINE LEFT / DESC+CTA GROUPED RIGHT (LAW OF PROXIMITY) -->
      <div class="brutalist-billboard-section">
        <div class="billboard-left">
          <span class="billboard-eyebrow">[ THALAM STUDIO, TRICHY ]</span>
          <h2 class="billboard-headline">
            We set the room.<br>
            You bring the story.
          </h2>
        </div>
        <div class="billboard-right">
          <p class="billboard-desc">
            A purpose-built production environment for broadcast audio, portraiture, and commercial shoots.
          </p>
          <a href="/thalam-studio/" class="billboard-cta-btn">
            Step into Thalam &rarr;
          </a>
        </div>
      </div>
    </section>

        <!-- =====================================================
             WORKFLOW PIPELINE SECTION
             ===================================================== -->
        <section class="pipeline-section" id="pipeline">
            <div class="pipeline-label">[ STRUCTURAL WORKFLOW ]</div>
            <h2 class="pipeline-heading">HOW WE<br>WORK.</h2>

            <div class="pipeline-steps">
                <div class="step">
                    <div class="step-marker">01</div>
                    <div class="step-title">Initial Consultation</div>
                    <div class="step-desc">We listen first. What do you need this to feel like?</div>
                </div>
                <div class="step">
                    <div class="step-marker">02</div>
                    <div class="step-title">Creative Brief</div>
                    <div class="step-desc">We build the frame together — mood, direction, timeline, scope.</div>
                </div>
                <div class="step">
                    <div class="step-marker">03</div>
                    <div class="step-title">Execution</div>
                    <div class="step-desc">We show up. We shoot. We don't leave until it's right.</div>
                </div>
                <div class="step">
                    <div class="step-marker">04</div>
                    <div class="step-title">Post-Production</div>
                    <div class="step-desc">Every frame gets the same attention as the first one.</div>
                </div>
                <div class="step">
                    <div class="step-marker">05</div>
                    <div class="step-title">Final Delivery</div>
                    <div class="step-desc">You get everything. Every format. Every right. No chasing.</div>
                </div>
            </div>
        </section>

        <!-- =====================================================
             GLOBAL FOOTER
             ===================================================== -->
        <?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
