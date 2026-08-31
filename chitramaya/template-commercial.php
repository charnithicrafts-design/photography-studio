<?php
/**
 * Template Name: Pillar — Commercial (No-Photo Brutalist)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commercial Photography — Chithramaya</title>
  <meta name="description" content="Commercial photography from Chithramaya Creatives — turn what you sell into something people actually want to look at.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/commercial')); ?>">
  <?php wp_head(); ?>
  
  <link rel="stylesheet" media="print" onload="this.media='all'" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-commercial.css">
</head>
<body style="background: var(--color-light); color: var(--color-dark);">
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- COMPACT BENTO HERO -->
  <section class="bento-hero-section">
    <div class="bento-hero-grid">
      
      <!-- Primary Action Card -->
      <div class="bento-hero-main">
        <div class="bento-hero-header">
          <span class="bento-hero-badge">— 01 / COMMERCIAL & BRAND PHOTOGRAPHY</span>
          <h1 class="bento-hero-h1">Make it look like<br>it means something.</h1>
          <p class="bento-hero-sub">Products, spaces, food, fashion. We shoot what you're selling and make people actually want it.</p>
        </div>
        <div class="bento-hero-actions">
          <a href="#book" class="btn-primary" data-trigger="booking">
            Make your next launch visual.
            <span class="btn-primary-icon">
              <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
          </a>
        </div>
      </div>

      <!-- Secondary Discipline Proof Card -->
      <div class="bento-hero-side">
        <div>
          <div class="bento-side-label">Studio Disciplines</div>
          <div class="bento-tag-cloud" style="margin-top: 16px;">
            <span class="bento-tag">Products</span>
            <span class="bento-tag">Architecture</span>
            <span class="bento-tag">Fashion</span>
            <span class="bento-tag">Food & Beverage</span>
            <span class="bento-tag">E-Commerce</span>
            <span class="bento-tag">OOH Campaigns</span>
          </div>
        </div>
        <div class="bento-proof-note">
          <span class="bento-proof-dot"></span>
          <span>Trichy & Location · High-Res Master Assets</span>
        </div>
      </div>

    </div>
  </section>

  <!-- NO-PHOTO SERVICES ACCORDION -->
  <section class="services-wrapper">
    <div class="services-grid">
      
      <div class="services-left">
        <h2 class="services-intro-title">SERVICES —</h2>
        <p class="services-intro-text">From clinical studio perfection to authentic real-life scenarios.</p>
        <p class="services-intro-text">We capture, enhance, and deliver purpose-driven imagery that influences consumer perception and drives deep engagement.</p>
      </div>

      <div class="services-right">
        <div class="b-accordion">
          
          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="true">
              <span><span class="b-accordion-num">01</span> OOH & E-Commerce</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>OOH marketing collaterals</li>
                <li>E-commerce website catalogue pictures</li>
                <li>Product photography</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">02</span> Food & Lifestyle</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Food photography</li>
                <li>Lifestyle photography</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">03</span> Architecture & Spatial</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Architecture photography</li>
                <li>Civil construction timelapse</li>
                <li>Cinematic walkthrough & 360</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">04</span> Fashion & Campaigns</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Fashion photography</li>
                <li>Personal branding</li>
                <li>Social media campaigns</li>
                <li>PR campaigns</li>
                <li>Content Creation</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- IMPACT OF PROFESSIONAL ASSETS -->
  <section class="brut-impact">
    <h2 class="brut-impact-title brut-protect-overflow">Purpose-Driven Influence</h2>
    <div class="brut-impact-grid">
      <div class="impact-card">
        <span class="impact-num">01</span>
        <h3 class="impact-header">Collaborative Creation</h3>
        <p class="impact-desc">We work in tight sync with your art directors to meticulously craft visuals that align perfectly with your clearly defined creative brief.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">02</span>
        <h3 class="impact-header">Campaign Velocity</h3>
        <p class="impact-desc">Fast, scalable content pipelines delivering campaign-ready assets at the speed of modern retail.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">03</span>
        <h3 class="impact-header">Market Conversion</h3>
        <p class="impact-desc">Visually compelling and strategically effective assets designed to influence consumer perception, drive deep engagement, and actively sell your product.</p>
      </div>
    </div>
  </section>

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Ready to Drive Engagement?</h2>
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
