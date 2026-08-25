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
  <link rel="canonical" href="<?php echo esc_url(home_url('/events-portrait')); ?>">
  <?php wp_head(); ?>
  
  <link rel="stylesheet" media="print" onload="this.media='all'" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-events.css">
</head>
<body style="background: var(--color-light); color: var(--color-dark);">
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- HERO SECTION (NO PHOTOS) -->
  <section class="corp-hero section-illusion-wrapper">
    <div class="graphic-orb orb-lg color-cyan orb-pos-tl"></div>
    <div class="graphic-orb orb-md color-magenta orb-pos-br"></div>

    <div class="corp-hero-content">
      <h1 class="corp-hero-h1">Events &<br>Portrait.</h1>
      
      <div class="corp-hero-meta">
        <p class="corp-hero-sub brut-protect-overflow">Preserving your family's most meaningful moments with genuine warmth and pure emotion.</p>
        <a href="#book" class="btn-compound" data-trigger="booking">Begin Your Story
  <div class="btn-compound-icon">
      <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: currentColor;"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </div>
</a>
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
    <h2 class="brut-impact-title brut-protect-overflow">A Lasting Legacy</h2>
    <div class="brut-impact-grid">
      <div class="impact-card">
        <span class="impact-num">01</span>
        <h3 class="impact-header">Authentic Connection</h3>
        <p class="impact-desc">We document every event by focusing on the real, unfiltered emotions and genuine connections between your loved ones.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">02</span>
        <h3 class="impact-header">Honoring Traditions</h3>
        <p class="impact-desc">Deep respect and understanding of your family's unique traditions, ensuring your beautiful heritage is celebrated.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">03</span>
        <h3 class="impact-header">A Lasting Legacy</h3>
        <p class="impact-desc">Creating timeless, heartfelt portraits that will hang on the walls of your family's home for decades.</p>
      </div>
    </div>
  </section>

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Ready to Preserve Your Legacy?</h2>
    <a href="#book" class="btn-compound" data-trigger="booking">Reserve Your Date
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
