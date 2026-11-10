<?php
/**
 * Template Name: Pillar — Events & Portrait (Brutalist Accordion)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events & Portrait Photography — Chithramaya</title>
  <meta name="description" content="Preserving your family's most meaningful moments with genuine warmth and pure emotion.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/events-portrait/')); ?>">
  <?php wp_head(); ?>
  
  <link rel="stylesheet" media="print" onload="this.media='all'" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-events.compiled.css?ver=<?php echo filemtime(get_stylesheet_directory() . '/assets/css/pages/template-events.compiled.css'); ?>">
</head>
<body style="background: var(--color-light); color: var(--color-dark);">
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- COMPACT BENTO HERO -->
  <section class="bento-hero-section">
    <div class="bento-hero-grid">
      
      <!-- Primary Action Card -->
      <div class="bento-hero-main">
        <div class="bento-hero-header">
          <span class="bento-hero-badge">— 03 / EVENTS & PORTRAITS</span>
          <h1 class="bento-hero-h1">The moments<br>people want to live again.</h1>
          <p class="bento-hero-sub">Weddings. Birthdays. Milestones. The ones you'll look at in 20 years and remember exactly how it felt.</p>
        </div>
        <div class="bento-hero-actions">
          <a href="#book" class="btn-primary" data-trigger="booking">
            Tell us about your day.
            <span class="btn-primary-icon">
              <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
          </a>
        </div>
      </div>

      <!-- Secondary Discipline Proof Card -->
      <div class="bento-hero-side">
        <div>
          <div class="bento-side-label">Session Disciplines</div>
          <div class="bento-tag-cloud" style="margin-top: 16px;">
            <span class="bento-tag">Family Portraits</span>
            <span class="bento-tag">Weddings</span>
            <span class="bento-tag">Baby & Newborn</span>
            <span class="bento-tag">Maternity Art</span>
            <span class="bento-tag">Milestone Days</span>
          </div>
        </div>
        <div class="bento-proof-note">
          <span class="bento-proof-dot"></span>
          <span>Documentary Style · Authentic Moments</span>
        </div>
      </div>

    </div>
  </section>

  <!-- ACCORDION SERVICES WITH LANDSCAPE PHOTOS -->
  <section class="services-wrapper">
    <div class="services-grid">
      
      <div class="services-left">
        <h2 class="services-intro-title">SERVICES —</h2>
        <p class="services-intro-text">Your Family's Story.</p>
        <p class="services-intro-text">We honor the quiet, intimate moments and the grand celebrations that shape your lives.</p>
      </div>

      <div class="services-right">
        <div class="b-accordion">
          
          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="true">
              <span><span class="b-accordion-num">01</span> The Anticipation</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <div class="b-accordion-content-wrapper">
                <img src="https://images.unsplash.com/photo-1586102728466-46b99b3bc411?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600" alt="The Anticipation" class="b-accordion-img">
                <div class="b-accordion-details">
                  <p class="b-accordion-desc">Honoring the quiet, beautiful moments before your family grows.</p>
                  <ul class="b-accordion-list">
                    <li>Studio & Outdoor Art-Themed Maternity</li>
                    <li>Bump-to-Baby Journeys</li>
                    <li>Family Portraits (Baby Shower)</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">02</span> The Arrival</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <div class="b-accordion-content-wrapper">
                <img src="https://images.unsplash.com/photo-1757691723728-76c52b7e2a02?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600" alt="The Arrival" class="b-accordion-img">
                <div class="b-accordion-details">
                  <p class="b-accordion-desc">Capturing the fleeting, irreplaceable first moments of your baby.</p>
                  <ul class="b-accordion-list">
                    <li>Newborn & Infant (Studio & House Visit)</li>
                    <li>Toddler (Outdoor & Studio)</li>
                    <li>1st Birthday Celebrations</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">03</span> The Union</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <div class="b-accordion-content-wrapper">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio/img-035.jpg" alt="The Union" class="b-accordion-img">
                <div class="b-accordion-details">
                  <p class="b-accordion-desc">A deeply emotional and joyous celebration of two families becoming one.</p>
                  <ul class="b-accordion-list">
                    <li>Pre/Post Wedding Photography</li>
                    <li>Destination Weddings</li>
                    <li>Bespoke Song Creation</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">04</span> The Legacy</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <div class="b-accordion-content-wrapper">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/portfolio/port-6.jpg" alt="The Legacy" class="b-accordion-img">
                <div class="b-accordion-details">
                  <p class="b-accordion-desc">Preserving your cultural traditions and family bonds for generations to come.</p>
                  <ul class="b-accordion-list">
                    <li>Cultural Milestones (Sastiyabthapoorthi, Upanayanam)</li>
                    <li>Cultural Milestones (Sadhabishegam, Ayushomam)</li>
                    <li>Grand Family Portraits (Studio, House Visit, Outdoor)</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- IMPACT SECTION -->
  <section class="brut-impact">
    <h2 class="brut-impact-title brut-protect-overflow">Make The Moment Unmissable</h2>
    <div class="brut-impact-grid">
      <div class="impact-card">
        <span class="impact-num">01</span>
        <h3 class="impact-header">Quiet Observation</h3>
        <p class="impact-desc">We stay in the background and watch closely &mdash; capturing natural moments without interrupting your family or staging forced poses.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">02</span>
        <h3 class="impact-header">Real Emotion</h3>
        <p class="impact-desc">The unprompted laughs, quiet traditions, and genuine hugs &mdash; documented exactly as they felt in the room.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">03</span>
        <h3 class="impact-header">Photos That Last</h3>
        <p class="impact-desc">Finished portraits and printed albums you will look back on twenty years from now and still feel the same warmth.</p>
      </div>
    </div>
  </section>

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">The moments you'll remember in twenty years.</h2>
    <a href="#book" class="btn-primary" data-trigger="booking">
      Tell us about your day.
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
