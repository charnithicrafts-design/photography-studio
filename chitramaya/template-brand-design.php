<?php
/**
 * Template Name: Pillar — Brand Design
 * Template Post Type: page
 * Description: The comprehensive pillar page for Brand Design.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brand Design — Chitramaya Creatives</title>
  <meta name="description" content="Identity is a strategic weapon. We don't just design graphics; we architect lasting recognition.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/brand-design')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --bg: #FAFAFA;
      --text: #111111;
      --accent: #FF3300;
      --font-display: 'Space Grotesk', sans-serif;
      --font-body: 'Inter', sans-serif;
    }
    body { font-family: var(--font-body); background: var(--bg); color: var(--text); overflow-x: hidden; }
    
    /* NAV */
    nav { position: fixed; top: 0; width: 100%; padding: 1.5rem 3rem; display: flex; justify-content: space-between; align-items: center; z-index: 100; mix-blend-mode: difference; color: #fff; }
    .nav-logo { font-weight: 700; font-family: var(--font-display); text-decoration: none; color: inherit; font-size: 1.25rem; letter-spacing: -0.05em; text-transform: uppercase; }
    .nav-book a { text-decoration: none; color: inherit; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; }
    
    /* HERO */
    .hero { position: relative; min-height: 90vh; display: flex; align-items: center; padding: 6rem 3rem; background: var(--text); color: var(--bg); overflow: hidden; }
    .hero-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0.15; filter: grayscale(40%) contrast(1.2); mix-blend-mode: luminosity; pointer-events: none; z-index: 1; }
    .hero-content { position: relative; z-index: 10; max-width: 1000px; }
    .hero-title { font-family: var(--font-display); font-size: clamp(3rem, 9vw, 8rem); font-weight: 700; letter-spacing: -0.05em; line-height: 0.9; margin-bottom: 2rem; text-transform: uppercase; }
    .hero-desc { font-size: 1.25rem; line-height: 1.5; color: #999; margin-bottom: 3rem; max-width: 600px; font-weight: 400; }
    .hero-btn { display: inline-flex; align-items: center; justify-content: center; padding: 1.25rem 3rem; background: var(--accent); color: #fff; text-transform: uppercase; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; font-family: var(--font-display); }
    .hero-btn:hover { background: #fff; color: var(--text); }
    
    /* CARD GRID LAYOUT (UX Laws applied) */
    .services-container { padding: 6rem 3rem; max-width: 1400px; margin: 0 auto; }
    .cards-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; }
    
    .service-card { display: flex; flex-direction: column; background: #fff; border: 1px solid rgba(0,0,0,0.05); }
    .card-img-wrapper { position: relative; width: 100%; aspect-ratio: 16/9; overflow: hidden; }
    .card-img-wrapper img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; }
    .service-card:hover .card-img-wrapper img { transform: scale(1.05); }
    
    .card-content { padding: 3rem; flex-grow: 1; display: flex; flex-direction: column; }
    .card-label { font-family: var(--font-display); font-size: 0.85rem; font-weight: 700; color: var(--accent); margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 0.1em; }
    .card-title { font-family: var(--font-display); font-size: 2.2rem; font-weight: 700; line-height: 1.1; margin-bottom: 1.5rem; letter-spacing: -0.03em; text-transform: uppercase; }
    .card-desc { font-size: 1rem; line-height: 1.6; color: #555; margin-bottom: 2rem; }
    
    .card-list { list-style: none; margin-top: auto; padding-top: 2rem; border-top: 1px solid rgba(0,0,0,0.1); }
    .card-list li { font-size: 0.95rem; line-height: 1.6; color: var(--text); padding-left: 1.5rem; position: relative; margin-bottom: 0.75rem; }
    .card-list li::before { content: '→'; position: absolute; left: 0; color: var(--accent); font-weight: 700; }
    .card-list strong { color: var(--text); font-weight: 600; }
    
    .card-action { margin-top: 2rem; }
    .card-cta { display: inline-flex; padding: 1rem 2rem; background: transparent; border: 1px solid var(--text); color: var(--text); text-transform: uppercase; font-family: var(--font-display); font-weight: 700; font-size: 0.8rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; }
    .card-cta:hover { background: var(--text); color: #fff; }
    
    /* SLIDE-OUT DRAWERS (UX & UI Fixes) */
    .service-drawer-overlay { position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 99998; opacity: 0; pointer-events: none; transition: 0.4s ease; }
    .service-drawer-overlay.active { opacity: 1; pointer-events: all; backdrop-filter: blur(5px); }
    
    .service-drawer { position: fixed; top: 0; right: -100%; width: 100%; max-width: 600px; height: 100vh; background: var(--bg); color: var(--text); z-index: 99999; transition: right 0.4s cubic-bezier(0.25, 1, 0.5, 1); overflow-y: auto; padding: 5rem 3rem 4rem; box-shadow: none; border-left: 1px solid rgba(0,0,0,0.1); }
    .service-drawer.active { right: 0; box-shadow: -10px 0 30px rgba(0,0,0,0.1); }
    
    /* Highly accessible close button */
    .drawer-close { position: absolute; top: 1.5rem; right: 1.5rem; background: var(--text); color: var(--bg); border: none; font-family: var(--font-display); font-weight: 700; font-size: 0.8rem; letter-spacing: 0.1em; cursor: pointer; text-transform: uppercase; padding: 0.75rem 1.25rem; border-radius: 4px; transition: 0.3s; z-index: 999999; }
    .drawer-close:hover { background: var(--accent); color: #fff; }
    
    .drawer-title { font-family: var(--font-display); font-size: clamp(2rem, 5vw, 3.2rem); font-weight: 900; line-height: 1; text-transform: uppercase; letter-spacing: -0.04em; margin-bottom: 2.5rem; border-bottom: 2px solid var(--accent); padding-bottom: 1.5rem; color: var(--accent); }
    .drawer-grid { display: flex; flex-direction: column; gap: 2.5rem; margin-bottom: 3rem; }
    .drawer-manifesto p { font-size: 1.1rem; line-height: 1.7; color: #444; }
    .drawer-deliverables ul { list-style: none; padding: 0; }
    .drawer-deliverables li { font-size: 1rem; line-height: 1.8; color: var(--text); padding-left: 1.5rem; position: relative; margin-bottom: 0.5rem; }
    .drawer-deliverables li::before { content: '→'; position: absolute; left: 0; color: var(--accent); font-weight: 700; }
    
    .drawer-cta { display: inline-block; padding: 1.25rem 2.5rem; background: var(--accent); color: #fff; text-transform: uppercase; font-family: var(--font-display); font-weight: 700; font-size: 0.85rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; border-radius: 2px; }
    .drawer-cta:hover { background: var(--text); color: #fff; }
    
    .card-list a.drawer-trigger { 
      display: flex; 
      justify-content: space-between; 
      align-items: center; 
      color: inherit; 
      text-decoration: none; 
      transition: 0.3s; 
      cursor: pointer; 
      padding: 0.25rem 0;
    }
    .card-list a.drawer-trigger::after {
      content: '+ Explore';
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      font-weight: 700;
      color: var(--accent);
      opacity: 0.8;
      transition: 0.3s;
    }
    .card-list a.drawer-trigger:hover { color: var(--accent); }
    .card-list a.drawer-trigger:hover::after { opacity: 1; transform: translateX(5px); }
    
    @media (max-width: 1024px) {
      .cards-grid { grid-template-columns: 1fr; gap: 3rem; }
      .services-container { padding: 4rem 1.5rem; }
      .card-content { padding: 2rem; }
    }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>


  <section class="hero">
    <img class="hero-img" src="<?php echo esc_url( get_field('pillar_hero_bg_url') ?: 'https://images.unsplash.com/photo-1632062549850-44a0a6eede16?auto=format&fit=crop&w=2000&q=80' ); ?>" alt="Branding & Value">
    <div class="hero-content">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'Identity is a Strategic Weapon.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'From broadcast-grade podcast production to comprehensive brand design. We don’t just capture images; we architect lasting recognition.' ); ?></p>
      <a href="#" class="hero-btn" data-trigger="booking">Discuss Your Brand</a>
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
