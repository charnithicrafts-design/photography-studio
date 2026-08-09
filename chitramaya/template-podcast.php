<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-podcast.css">
<?php
/**
 * Template Name: Pillar — Podcast & Interview (Brutalist)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Podcast & Interview — Chithramaya</title>
  <meta name="description" content="A comprehensive content creation environment combining pristine audio, cinematic multi-camera visuals, and cohesive branding.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/podcast-interview')); ?>">
  <?php wp_head(); ?>
  
</head>
<body style="background: var(--color-light); color: var(--color-dark);">
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- HERO SECTION (NO PHOTOS) -->
  <section class="corp-hero section-illusion-wrapper">
    <div class="graphic-orb orb-lg color-cyan orb-pos-tl"></div>
    <div class="graphic-orb orb-md color-magenta orb-pos-br"></div>

    <div class="corp-hero-content">
      <h1 class="corp-hero-h1">Podcast &<br>Interview.</h1>
      
      <div class="corp-hero-meta">
        <p class="corp-hero-sub brut-protect-overflow">A comprehensive content creation environment combining pristine audio, cinematic multi-camera visuals, and cohesive branding.</p>
        <a href="#book" class="btn-compound" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border: 2px solid var(--color-accent);">>Step Into Thalam
  <div class="btn-compound-icon">
      <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: currentColor;"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </div>
</a>
      </div>
    </div>
  </section>

  <!-- ACCORDION SERVICES -->
  <section class="services-wrapper">
    <div class="services-grid">
      
      <div class="services-left">
        <h2 class="services-intro-title">SERVICES —</h2>
        <p class="services-intro-text">The Broadcast Standard.</p>
        <p class="services-intro-text">A pristine environment engineered for uncompromised audio and cinematic multi-camera visuals.</p>
      </div>

      <div class="services-right">
        <div class="b-accordion">
          
          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="true">
              <span><span class="b-accordion-num">01</span> Studio & Production</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <p class="b-accordion-desc">Focusing on a well-equipped environment with technical support to ensure smooth recording and high production quality.</p>
              <ul class="b-accordion-list">
                <li>Acoustically Treated Space</li>
                <li>Multi-Camera 4K Setups</li>
                <li>Professional Studio Lighting</li>
                <li>Live Switching & Monitoring</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">02</span> Content & Media</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <p class="b-accordion-desc">Emphasizing the creation, editing, and distribution of podcast material to maximize your reach and audience engagement.</p>
              <ul class="b-accordion-list">
                <li>Full-Length Video Editing</li>
                <li>Audio Mastering & Mixing</li>
                <li>Short-Form Clip Extraction</li>
                <li>Platform Distribution Assets</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">03</span> Photography & Branding</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <p class="b-accordion-desc">Complementing the production by delivering high-quality visuals and a cohesive brand identity for your show.</p>
              <ul class="b-accordion-list">
                <li>Cover Art Photography</li>
                <li>Host & Guest Portraits</li>
                <li>Show Visual Identity</li>
                <li>Promotional Assets</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- IMPACT SECTION -->
  <section class="brut-impact">
    <h2 class="brut-impact-title brut-protect-overflow">The Power of High-Fidelity</h2>
    <div class="brut-impact-grid">
      <div class="impact-card">
        <span class="impact-num">01</span>
        <h3 class="impact-header">Authority</h3>
        <p class="impact-desc">Elevate your brand perception with broadcast-quality visuals and sound that immediately establish trust.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">02</span>
        <h3 class="impact-header">Engagement</h3>
        <p class="impact-desc">Capture and retain your audience's attention across all platforms with professionally paced, multi-cam edits.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">03</span>
        <h3 class="impact-header">Velocity</h3>
        <p class="impact-desc">Turn a single studio recording session into a month's worth of multi-channel promotional content.</p>
      </div>
    </div>
  </section>

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Start Broadcasting</h2>
    <a href="#book" class="btn-compound" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border: 2px solid var(--color-accent);">>Book The Studio
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
