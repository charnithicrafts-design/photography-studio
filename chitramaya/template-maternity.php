<?php
/**
 * Template Name: Maternity & Bump-to-Baby
 * Template Post Type: page
 * Description: Editorial maternity and bump-to-baby portraiture — Chithramaya Creatives.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maternity &amp; Bump-to-Baby — Chithramaya</title>
  <meta name="description" content="Quiet, beautiful maternity and bump-to-baby portraiture in Trichy. Archiving the sacred wait and the miraculous arrival.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/maternity/')); ?>">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-maternity.compiled.css?ver=<?php echo filemtime(get_stylesheet_directory() . '/assets/css/pages/template-maternity.compiled.css'); ?>">
</head>
<body class="maternity-page">

  <?php get_template_part('template-parts/global-nav'); ?>

  <main class="site-main">
    
    <!-- =====================================================
         SECTION 0: BENTO HERO
         ===================================================== -->
    <section class="bento-hero-section">
      <div class="bento-hero-grid">
        <div class="bento-hero-main">
          <div class="bento-hero-header">
            <span class="bento-hero-badge">— Bump to Baby</span>
            <h1 class="bento-hero-h1">Before Everything<br>Changes.</h1>
            <p class="bento-hero-sub">
              Quiet, beautiful portraits documenting the wait. We preserve the holy, fleeting season of pregnancy with fine-art dignity.
            </p>
          </div>
          <div class="bento-hero-actions">
            <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20book%20a%20Maternity%20Session%20with%20Chithramaya." target="_blank" rel="noopener noreferrer" class="btn-primary" data-trigger="booking">
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
            <span>Documentary &amp; Fine Art · Trichy</span>
          </div>
        </div>
      </div>
    </section>

    <!-- =====================================================
         SECTION 1: POETIC MANIFESTO
         ===================================================== -->
    <section class="maternity-manifesto-section">
      <div class="manifesto-card">
        <div class="maternity-section-label">[ BEFORE THEY ARRIVE ]</div>
        <h2 class="manifesto-headline">There's a very short window when it looks exactly like this. We photograph it carefully.</h2>
        <p class="manifesto-lead">Your body is doing holy work. We are here to archive its breathtaking power with tenderness, patience, and controlled cinematic light.</p>
      </div>
    </section>

    <!-- =====================================================
         SECTION 2: DUAL PANE (STUDIO VS OUTDOOR)
         ===================================================== -->
    <section class="maternity-dual-section">
      <div class="maternity-dual-grid">
        
        <!-- Studio Style -->
        <article class="maternity-pane-card">
          <div class="pane-media">
            <img class="img-tactile" src="https://images.unsplash.com/photo-1542385151-efd9000785a0?auto=format&fit=crop&w=1200&q=80" alt="Studio Maternity Portrait in Thalam Studio" loading="lazy">
          </div>
          <div class="pane-content">
            <span class="pane-num">01 // THE SANCTUARY</span>
            <h3 class="pane-title">Studio Style</h3>
            <p class="pane-desc">Art-themed sessions crafted inside Thalam Studio to capture the quiet power and sculptural beauty of your journey in controlled, flattering soft light.</p>
          </div>
        </article>

        <!-- Outdoor Style -->
        <article class="maternity-pane-card">
          <div class="pane-media">
            <img class="img-tactile" src="https://images.unsplash.com/photo-1705746401414-8bae063ee19f?auto=format&fit=crop&w=1200&q=80" alt="Outdoor Maternity Photography in Natural Light" loading="lazy">
          </div>
          <div class="pane-content">
            <span class="pane-num">02 // THE LOCATION</span>
            <h3 class="pane-title">Outdoor Style</h3>
            <p class="pane-desc">Location-oriented sessions celebrating the organic blossoming of motherhood in golden morning warmth and gentle, breezy natural landscapes.</p>
          </div>
        </article>

      </div>
    </section>

    <!-- =====================================================
         SECTION 3: FAMILY & BABY SHOWER
         ===================================================== -->
    <section class="maternity-bento-section">
      <div class="maternity-bento-grid">
        <div class="maternity-bento-images bento-2-images">
          <div class="bento-img-wrap">
            <img src="https://images.unsplash.com/photo-1760328249117-18488466e34c?auto=format&fit=crop&w=800&q=80" alt="Generational Family Gathering" loading="lazy" class="img-tactile">
          </div>
          <div class="bento-img-wrap">
            <img src="https://plus.unsplash.com/premium_photo-1677654190250-e9a946a29a5a?auto=format&fit=crop&w=600&q=80" alt="Baby Shower Decor Details" loading="lazy" class="img-tactile">
          </div>
        </div>
        <div class="maternity-bento-content">
          <div class="maternity-section-label">[ COMMUNITY &amp; HERITAGE ]</div>
          <h3 class="maternity-block-title">Family Portraits &amp; Baby Shower</h3>
          <p class="maternity-block-desc">
            A return ticket to the fleeting season of becoming. Joyful, documentary-style coverage of your baby shower (Valaikaappu / Seemantham) and generational family portraits, capturing the community waiting to welcome your child.
          </p>
        </div>
      </div>
    </section>

    <!-- =====================================================
         SECTION 4: BUMP TO BABY PROGRESSION
         ===================================================== -->
    <section class="maternity-bento-section reverse">
      <div class="maternity-bento-grid">
        <div class="maternity-bento-images bento-3-images">
          <div class="bento-img-wrap">
            <img src="https://images.unsplash.com/photo-1569952524646-705a421e054c?auto=format&fit=crop&w=800&q=80" alt="Maternity Bump Portrait" loading="lazy" class="img-tactile">
          </div>
          <div class="bento-img-wrap">
            <img src="https://images.unsplash.com/photo-1605988178022-c85ec62c7267?auto=format&fit=crop&w=600&q=80" alt="Newborn Details Hands" loading="lazy" class="img-tactile">
          </div>
          <div class="bento-img-wrap">
            <img src="https://images.unsplash.com/photo-1715433485680-9adc962bbcbc?auto=format&fit=crop&w=600&q=80" alt="Parents Holding Newborn" loading="lazy" class="img-tactile">
          </div>
        </div>
        <div class="maternity-bento-content">
          <div class="maternity-section-label">[ THE UNBROKEN STORY ]</div>
          <h3 class="maternity-block-title">Bump to Baby Journey</h3>
          <p class="maternity-block-desc">
            A cohesive visual story spanning your pregnancy through to your newborn’s first weeks. We preserve the seamless transition from brave anticipation to joyous arrival in a matching heirloom suite.
          </p>
        </div>
      </div>
    </section>

    <!-- =====================================================
         SECTION 5: 4-STEP ARCHIVE JOURNEY
         ===================================================== -->
    <section class="maternity-timeline-section">
      <div class="timeline-container">
        <div class="maternity-section-label">[ THE PROCESS ]</div>
        <h2 class="timeline-title">The Journey to Your Archive</h2>
        
        <div class="timeline-grid">
          <div class="timeline-card">
            <span class="timeline-num">01</span>
            <h4 class="timeline-step-title">Initial Consultation &amp; Vision</h4>
            <p class="timeline-step-desc">We discuss your trimester comfort, styling preferences, and preferred setting (studio vs natural outdoor).</p>
          </div>
          <div class="timeline-card">
            <span class="timeline-num">02</span>
            <h4 class="timeline-step-title">Wardrobe &amp; Styling</h4>
            <p class="timeline-step-desc">Guidance on comfortable, sculptural gowns, natural textures, and palettes that highlight the baby bump.</p>
          </div>
          <div class="timeline-card">
            <span class="timeline-num">03</span>
            <h4 class="timeline-step-title">The Unhurried Shoot</h4>
            <p class="timeline-step-desc">A relaxed, peaceful pace with ample breaks. Zero rushed poses. Only gentle guidance in flattering soft light.</p>
          </div>
          <div class="timeline-card">
            <span class="timeline-num">04</span>
            <h4 class="timeline-step-title">The Heirloom Reveal</h4>
            <p class="timeline-step-desc">Private viewing gallery followed by handcrafted prints and museum-grade keepsake albums.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- =====================================================
         SECTION 6: GBP SERVICES & PRICING
         ===================================================== -->
    <section class="maternity-services-section">
      <div class="services-container">
        <div class="maternity-section-label">[ Studio Services ]</div>
        <h2 class="services-title">Choose Your Archive</h2>
        
        <div class="services-grid">
          
          <!-- Service 1 -->
          <div class="service-card">
            <h4 class="service-name">The Maternity Session</h4>
            <div class="service-tags">
              <span class="service-tag">Studio Sanctuary</span>
              <span class="service-tag-connector">or</span>
              <span class="service-tag">Natural Outdoor</span>
            </div>
            <p class="service-desc">Held wherever you feel most at ease. An unhurried session crafted around your comfort, preserving the quiet power and sculptural beauty of your pregnancy.</p>
            <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20discuss%20The%20Maternity%20Session." target="_blank" rel="noopener noreferrer" class="service-cta" data-trigger="booking">
              Tell us about your session &rarr;
            </a>
          </div>

          <!-- Service 2 -->
          <div class="service-card premium-card">
            <div class="premium-badge">Most Booked</div>
            <h4 class="service-name">The Bump-to-Baby Archive</h4>
            <div class="service-tags">
              <span class="service-tag">Maternity</span>
              <span class="service-tag-connector">+</span>
              <span class="service-tag">Newborn Suite</span>
            </div>
            <p class="service-desc">The complete narrative across both chapters. Includes your maternity portrait session and a gentle, unhurried newborn shoot once your baby arrives.</p>
            <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20build%20my%20Bump-to-Baby%20Archive." target="_blank" rel="noopener noreferrer" class="service-cta premium-cta" data-trigger="booking">
              Build your archive &rarr;
            </a>
          </div>

          <!-- Service 3 -->
          <div class="service-card">
            <h4 class="service-name">Baby Shower &amp; Events</h4>
            <div class="service-tags">
              <span class="service-tag">Valaikaappu</span>
              <span class="service-tag-connector">&amp;</span>
              <span class="service-tag">Celebrations</span>
            </div>
            <p class="service-desc">Joyful, documentary-style coverage of your blessing ceremony, Seemantham, and the generational community waiting to welcome your child.</p>
            <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20discuss%20event%20coverage%20for%20my%20Baby%20Shower." target="_blank" rel="noopener noreferrer" class="service-cta" data-trigger="booking">
              Tell us about your event &rarr;
            </a>
          </div>

        </div>
      </div>
    </section>

    <!-- =====================================================
         SECTION 7: CAMPAIGN YELLOW PRE-FOOTER
         ===================================================== -->
    <section class="global-cta">
      <h2 class="global-cta-title brut-protect-overflow">Let's document the wait.</h2>
      <p class="global-cta-sub">
        Quiet, sculptural portraits honoring your journey before everything changes.
      </p>
      <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20discuss%20a%20Maternity%20portrait%20session." target="_blank" rel="noopener noreferrer" class="btn-primary" data-trigger="booking">
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
