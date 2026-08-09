<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-brand-design.css">
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
  <link rel="canonical" href="<?php echo esc_url(home_url('/brand-design')); ?>">
  <?php wp_head(); ?>
  
</head>
<body style="background: var(--color-light); color: var(--color-dark);">
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- HERO SECTION WITH NO PHOTOS -->
  <section class="corp-hero section-illusion-wrapper">
    <div class="graphic-orb orb-lg color-cyan orb-pos-tl"></div>
    <div class="graphic-orb orb-md color-magenta orb-pos-br"></div>

    <div class="corp-hero-content">
      <h1 class="corp-hero-h1">Brand<br>Design</h1>
      
      <div class="corp-hero-meta">
        <p class="corp-hero-sub brut-protect-overflow">Identity engineered for impact. We build visual systems that command attention and define your core.</p>
        <a href="#book" class="btn-compound" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border: 2px solid var(--color-accent);">>Commission a Project
  <div class="btn-compound-icon">
      <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: currentColor;"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </div>
</a>
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
    <h2 class="global-cta-title brut-protect-overflow">Ready to Define Your Identity?</h2>
    <a href="#book" class="btn-compound" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border: 2px solid var(--color-accent);">>Commission a Project
  <div class="btn-compound-icon">
      <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: currentColor;"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </div>
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
