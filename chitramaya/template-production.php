<?php
/**
 * Template Name: Pillar — Production & Brand Design
 * Template Post Type: page
 * Description: The comprehensive pillar page for Podcast Production and Brand Design.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Production & Brand Design — Chithramaya Creatives</title>
  <meta name="description" content="From broadcast-grade podcast production to comprehensive brand design. We architect lasting recognition.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/production-brand-design')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-production.css">
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>


  <section class="hero section-illusion-wrapper">
    <div class="graphic-orb orb-lg color-cyan orb-pos-tl"></div>
    <div class="graphic-orb orb-md color-magenta orb-pos-br"></div>

    <img class="hero-img" src="<?php echo esc_url( get_field('pillar_hero_bg_url') ?: 'https://images.unsplash.com/photo-1632062549850-44a0a6eede16?auto=format&fit=crop&w=2000&q=80' ); ?>" alt="Branding & Value">
    <div class="hero-content">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'Identity is a Strategic Weapon.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'From broadcast-grade podcast production to comprehensive brand design. We don’t just capture images; we architect lasting recognition.' ); ?></p>
      <a href="#" class="btn-compound" data-trigger="booking">>Discuss Your Brand
  <div class="btn-compound-icon">
      <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: currentColor;"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </div>
</a>
    </div>
  </section>

  <section class="services-container">
    <div class="cards-grid">
      <!-- BRAND DESIGN -->
      <div class="service-card">
        <div class="card-img-wrapper">
          <img src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1614036634955-ae5e90f9b9eb?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Brand Design">
        </div>
        <div class="card-content">
          <span class="card-label">01 // Brand Design</span>
          <h2 class="card-title">Architecting Lasting Recognition.</h2>
          <p class="card-desc">Brand design is the strategic process of creating visual elements that define a company’s identity and communicate its core values. By translating a brand’s mission and vision into tangible visual assets, we ensure a cohesive and meaningful representation across all touchpoints.</p>
          <ul class="card-list">
            <li><a href="#" class="drawer-trigger" data-drawer="drawer-logo">Logo design &amp; Brand identity</a></li>
            <li><a href="#" class="drawer-trigger" data-drawer="drawer-product">Product design &amp; Tactile packaging</a></li>
            <li><a href="#" class="drawer-trigger" data-drawer="drawer-marketing">Marketing collaterals &amp; Illustrative posters</a></li>
            <li><a href="#" class="drawer-trigger" data-drawer="drawer-ooh">OOH campaign &amp; Installations design</a></li>
            <li><a href="#" class="drawer-trigger" data-drawer="drawer-guidelines">Comprehensive Brand guidelines</a></li>
          </ul>
          <div class="card-action">
            <a href="#" class="card-cta" data-trigger="booking">Start a Project &rarr;</a>
          </div>
        </div>
      </div>

      <!-- PODCAST PRODUCTION -->
      <div class="service-card">
        <div class="card-img-wrapper">
          <img src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1485579149621-3123dd979885?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Podcast Production">
        </div>
        <div class="card-content">
          <span class="card-label">02 // Podcast & Interview</span>
          <h2 class="card-title">Comprehensive Content Creation.</h2>
          <p class="card-desc">Podcast and interview services have evolved into comprehensive content solutions that seamlessly combine audio, visual, and branding elements. Using professional lighting, multi-camera setups, and refined post-production, we craft broadcast-grade output.</p>
          <ul class="card-list">
            <li><a href="#" class="drawer-trigger" data-drawer="drawer-studio">Studio &amp; Production</a></li>
            <li><a href="#" class="drawer-trigger" data-drawer="drawer-content">Content &amp; Media Strategy</a></li>
            <li><a href="#" class="drawer-trigger" data-drawer="drawer-podcast-branding">Photography &amp; Branding</a></li>
          </ul>
          <div class="card-action">
            <a href="#" class="card-cta" data-trigger="booking">Book Production &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_template_part('template-parts/drawer-brand-services'); ?>

<?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const triggers = document.querySelectorAll('.drawer-trigger');
      const overlay = document.querySelector('.service-drawer-overlay');
      const closeBtns = document.querySelectorAll('.drawer-close');
      const drawers = document.querySelectorAll('.service-drawer');
      
      function closeAllDrawers() {
        drawers.forEach(d => d.classList.remove('active'));
        if (overlay) overlay.classList.remove('active');
        document.body.style.overflow = '';
        const header = document.querySelector('.site-header');
        if (header) {
            header.style.opacity = '1';
            header.style.pointerEvents = 'auto';
            header.style.transition = 'opacity 0.3s ease';
        }
      }
      
      triggers.forEach(trigger => {
        trigger.addEventListener('click', function(e) {
          e.preventDefault();
          const targetId = this.getAttribute('data-drawer');
          const targetDrawer = document.getElementById(targetId);
          
          if (targetDrawer) {
            closeAllDrawers(); // Ensure any open drawer is closed
            targetDrawer.classList.add('active');
            if (overlay) overlay.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
            const header = document.querySelector('.site-header');
            if (header) {
                header.style.opacity = '0';
                header.style.pointerEvents = 'none';
                header.style.transition = 'opacity 0.3s ease';
            }
          }
        });
      });
      
      closeBtns.forEach(btn => {
        btn.addEventListener('click', closeAllDrawers);
      });
      
      if (overlay) {
        overlay.addEventListener('click', closeAllDrawers);
      }
      
      // Hook the drawer CTAs to close the drawer before opening the booking modal
      const drawerCtas = document.querySelectorAll('.drawer-cta[data-trigger="booking"]');
      drawerCtas.forEach(cta => {
        cta.addEventListener('click', function(e) {
            // Let the global booking.js handle the modal, just close the drawer
            closeAllDrawers();
        });
      });
    });
  </script>
</body>
</html>
