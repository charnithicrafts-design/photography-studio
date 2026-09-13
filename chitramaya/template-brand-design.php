<?php
/**
 * Template Name: Pillar — Brand Design (No-Photo Brutalist)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brand Design — Chithramaya</title>
  <meta name="description" content="Identity engineered for impact. We build visual systems that command attention and define your core.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/brand-design/')); ?>">
  <?php wp_head(); ?>
  
  <link rel="stylesheet" media="print" onload="this.media='all'" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-brand-design.compiled.css?ver=<?php echo filemtime(get_stylesheet_directory() . '/assets/css/pages/template-brand-design.compiled.css'); ?>">
</head>
<body style="background: var(--color-light); color: var(--color-dark);">
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- COMPACT BENTO HERO -->
  <section class="bento-hero-section">
    <div class="bento-hero-grid">
      
      <!-- Primary Action Card -->
      <div class="bento-hero-main">
        <div class="bento-hero-header">
          <span class="bento-hero-badge">— 04 / BRAND DESIGN & VISUAL DIRECTION</span>
          <h1 class="bento-hero-h1">Brand design<br>with a pulse.</h1>
          <p class="bento-hero-sub">We build the visual identity systems that make you unforgettable — from typography and color architecture to complete brand guidelines.</p>
        </div>
        <div class="bento-hero-actions">
          <a href="#book" class="btn-primary" data-trigger="booking">
            Commission a Project
            <span class="btn-primary-icon">
              <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
          </a>
        </div>
      </div>

      <!-- Secondary Discipline Proof Card -->
      <div class="bento-hero-side">
        <div>
          <div class="bento-side-label">Identity Disciplines</div>
          <div class="bento-tag-cloud" style="margin-top: 16px;">
            <span class="bento-tag">Visual Identity</span>
            <span class="bento-tag">Logo Systems</span>
            <span class="bento-tag">Type Architecture</span>
            <span class="bento-tag">Brand Books</span>
            <span class="bento-tag">Collateral Design</span>
          </div>
        </div>
        <div class="bento-proof-note">
          <span class="bento-proof-dot"></span>
          <span>Scalable Identity Systems · Digital & Print</span>
        </div>
      </div>

    </div>
  </section>



  <!-- NO-PHOTO SERVICES ACCORDION -->
  <section class="services-wrapper">
    <div class="services-grid">
      
      <div class="services-left">
        <h2 class="services-intro-title">SERVICES —</h2>
        <p class="services-intro-text">Consistency builds trust.</p>
        <p class="services-intro-text">We forge tangible visual assets that enforce your market positioning across every touchpoint.</p>
      </div>

      <div class="services-right">
        <div class="b-accordion">
          
          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="true">
              <span><span class="b-accordion-num">01</span> Core Identity</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Logo design</li>
                <li>Brand identity</li>
                <li>Brand guidelines</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">02</span> Physical Presence</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Product design</li>
                <li>Installations design</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">03</span> Campaign & Outreach</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Marketing collaterals</li>
                <li>Illustrative posters</li>
                <li>OOH campaign design</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- IMPACT OF PROFESSIONAL ASSETS -->
  <section class="brut-impact">
    <h2 class="brut-impact-title brut-protect-overflow">The Value of Identity</h2>
    <div class="brut-impact-grid">
      <div class="impact-card">
        <span class="impact-num">01</span>
        <h3 class="impact-header">Instant Connection</h3>
        <p class="impact-desc">Your identity is your first handshake. We engineer visual assets that instantly connect with your audience and leave a memorable mark.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">02</span>
        <h3 class="impact-header">Absolute Trust</h3>
        <p class="impact-desc">A unified design system proves your reliability. We forge a cohesive visual language that builds deep, unwavering trust across every touchpoint.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">03</span>
        <h3 class="impact-header">Market Authority</h3>
        <p class="impact-desc">Aesthetic dictates value. We elevate your brand's visual presence so you can confidently command market leadership and premium pricing.</p>
      </div>
    </div>
  </section>

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Visual identity with a pulse.</h2>
    <a href="#book" class="btn-primary" data-trigger="booking">
      Let's make something unforgettable.
      <span class="btn-primary-icon">
        <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </span>
    </a>
  </section>

<script>
  // Simple Vanilla JS for the Brutalist Services Accordion
  document.addEventListener('DOMContentLoaded', () => {
    const accordions = document.querySelectorAll('.b-accordion-btn');
    accordions.forEach(btn => {
      btn.addEventListener('click', () => {
        const isExpanded = btn.getAttribute('aria-expanded') === 'true';
        // Close all others
        accordions.forEach(b => b.setAttribute('aria-expanded', 'false'));
        // Toggle current
        btn.setAttribute('aria-expanded', !isExpanded);
      });
    });
  });
</script>

<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
