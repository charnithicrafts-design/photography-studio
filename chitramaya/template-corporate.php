<?php
/**
 * Template Name: Pillar — Corporate Brand (No-Photo Brutalist)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brand & Corporate Photography — Chithramaya</title>
  <meta name="description" content="Visual authority engineered for B2B. Zero friction. Absolute precision.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/corporate-brand')); ?>">
  <?php wp_head(); ?>
  
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-corporate.css">
</head>
<body style="background: var(--color-light); color: var(--color-dark);">
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- HERO SECTION WITH NO PHOTOS -->
  <section class="corp-hero section-illusion-wrapper">
    <div class="graphic-orb orb-lg color-cyan orb-pos-tl"></div>
    <div class="graphic-orb orb-md color-magenta orb-pos-br"></div>

    <div class="corp-hero-content">
      <h1 class="corp-hero-h1">Brand &<br>Corporate</h1>
      
      <div class="corp-hero-meta">
        <p class="corp-hero-sub brut-protect-overflow">Visual authority engineered for B2B. Zero friction. Absolute precision.</p>
        <a href="#book" class="btn-compound" data-trigger="booking">Commission a Project
  <div class="btn-compound-icon">
      <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: currentColor;"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </div>
</a>
      </div>
    </div>
  </section>

  <!-- TRUSTED BY (BRUTALIST MARQUEE) -->
  <section class="brut-marquee">
    <div class="brut-marquee-title">Trusted By Corporate Leaders</div>
    <div class="brut-marquee-logos">
      <span>Google</span>
      <span>Deloitte</span>
      <span>McKinsey</span>
      <span>Salesforce</span>
      <span>Oracle</span>
    </div>
  </section>

  <!-- NO-PHOTO SERVICES ACCORDION -->
  <section class="services-wrapper">
    <div class="services-grid">
      
      <div class="services-left">
        <h2 class="services-intro-title">SERVICES —</h2>
        <p class="services-intro-text">Your first impression is your only impression.</p>
        <p class="services-intro-text">We arm your executive and marketing teams with assets that demand respect and close deals.</p>
      </div>

      <div class="services-right">
        <div class="b-accordion">
          
          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="true">
              <span><span class="b-accordion-num">01</span> Executive Portraits</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Executive headshots</li>
                <li>Website photography</li>
                <li>Team photography</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">02</span> Environmental Portraits</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Company lifestyle pictures</li>
                <li>Corporate video</li>
                <li>Company profile video</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">03</span> Product & Cinematic</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Product photography</li>
                <li>Brand Ads / videos</li>
                <li>TVC</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">04</span> Event Coverage</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Corporate events</li>
                <li>Marketing events</li>
                <li>Seminars</li>
                <li>Conferences</li>
                <li>Product launches</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">05</span> Workplace & Infra</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Infrastructure</li>
                <li>Ambiance</li>
                <li>Operational environment</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- IMPACT OF PROFESSIONAL ASSETS -->
  <section class="brut-impact">
    <h2 class="brut-impact-title brut-protect-overflow">The Impact of Professional Assets</h2>
    <div class="brut-impact-grid">
      <div class="impact-card">
        <span class="impact-num">01</span>
        <h3 class="impact-header">Consistency</h3>
        <p class="impact-desc">Maintain a cohesive, professional image across all channels and locations. Build visual trust with unwavering consistency.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">02</span>
        <h3 class="impact-header">Speed</h3>
        <p class="impact-desc">Fast turnarounds meeting demanding corporate timelines. Deliver assets quickly without compromising visual excellence.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">03</span>
        <h3 class="impact-header">Quality</h3>
        <p class="impact-desc">High-definition, professional photography capturing authenticity and professionalism. Premium assets for high-stakes business.</p>
      </div>
    </div>
  </section>

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Ready to Humanize Your Brand?</h2>
    <a href="#book" class="btn-compound" data-trigger="booking">Commission a Project
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
