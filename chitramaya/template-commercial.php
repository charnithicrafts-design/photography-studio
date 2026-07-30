<?php
/**
 * Template Name: Pillar — Commercial
 * Template Post Type: page
 * Description: The comprehensive pillar page for Commercial Photography.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commercial Photography — Chitramaya Creatives</title>
  <meta name="description" content="Purpose-Driven Visuals. Engineered to Convert. High-quality images that align seamlessly with your marketing goals.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/commercial')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=EB+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --bg-light: #F9F9F9;
      --text-dark: #0A0A0A;
      --accent: #B35E26;
      --font-sans: 'Inter', sans-serif;
      --font-serif: 'EB Garamond', serif;
    }
    body { font-family: var(--font-sans); background: var(--bg-light); color: var(--text-dark); overflow-x: hidden; }
    
    /* NAV */
    nav { position: fixed; top: 0; width: 100%; padding: 1.5rem 3rem; display: flex; justify-content: space-between; align-items: center; z-index: 100; mix-blend-mode: difference; color: #fff; }
    .nav-logo { font-weight: 900; letter-spacing: -0.02em; text-decoration: none; color: inherit; font-size: 1.25rem; }
    .nav-book a { text-decoration: none; color: inherit; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; }
    
    /* HERO */
    .hero { position: relative; min-height: 90vh; display: flex; align-items: center; justify-content: center; padding: 6rem 3rem; text-align: center; background: center/cover no-repeat; color: #ffffff; }
    .hero::before { content: ''; position: absolute; inset: 0; background: rgba(0, 0, 0, 0.65); z-index: 1; }
    .hero-content { position: relative; z-index: 10; max-width: 1000px; }
    .hero-title { font-size: clamp(3rem, 7vw, 6.5rem); font-weight: 900; letter-spacing: -0.03em; line-height: 1; margin-bottom: 1.5rem; text-transform: uppercase; word-wrap: break-word; }
    .hero-desc { font-size: 1.2rem; line-height: 1.6; color: #e5e5e5; margin-bottom: 3rem; max-width: 600px; margin-inline: auto; font-family: var(--font-serif); font-style: italic; }
    .hero-btn { display: inline-block; padding: 1rem 3rem; background: #ffffff; color: var(--text-dark); text-transform: uppercase; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; border-radius: 2px; }
    .hero-btn:hover { background: var(--accent); color: #ffffff; }
    
    /* MASONRY GALLERY */
    .gallery-section { padding: 8rem 3rem; background: var(--bg-light); max-width: 1400px; margin: 0 auto; }
    .gallery-header { text-align: center; margin-bottom: 4rem; }
    .gallery-header h2 { font-size: clamp(2rem, 4vw, 3rem); font-weight: 900; text-transform: uppercase; letter-spacing: -0.02em; }
    
    .masonry-grid { display: grid; grid-template-columns: 1fr; gap: 2rem; }
    @media(min-width: 768px) { .masonry-grid { grid-template-columns: repeat(2, 1fr); } }
    @media(min-width: 1024px) {
      .masonry-grid { grid-template-columns: repeat(3, 1fr); grid-auto-rows: 400px; }
      .masonry-item:nth-child(1) { grid-column: span 2; grid-row: span 2; } /* Large feature */
      .masonry-item:nth-child(2) { grid-column: span 1; grid-row: span 1; }
      .masonry-item:nth-child(3) { grid-column: span 1; grid-row: span 1; }
      .masonry-item:nth-child(4) { grid-column: span 1; grid-row: span 1; }
      .masonry-item:nth-child(5) { grid-column: span 2; grid-row: span 1; } /* Wide feature */
    }
    
    .masonry-item { position: relative; overflow: hidden; background: #000; height: 100%; cursor: pointer; border-radius: 4px; }
    .masonry-item img { width: 100%; height: 100%; object-fit: cover; opacity: 0.8; transition: opacity 0.4s, transform 0.6s; }
    .masonry-item:hover img { opacity: 1; transform: scale(1.05); }
    .masonry-caption { position: absolute; bottom: 0; left: 0; width: 100%; padding: 3rem 2rem 2rem; background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); color: #fff; }
    .masonry-caption h3 { font-size: 1.5rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem; letter-spacing: -0.02em; }
    .masonry-caption p { font-family: var(--font-serif); font-style: italic; font-size: 1.1rem; color: #d4d4d4; }
    
    /* MANIFESTO & FINAL CTA */
    .manifesto { padding: 8rem 3rem; background: #fff; text-align: center; }
    .manifesto-inner { max-width: 900px; margin: 0 auto; }
    .manifesto h2 { font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; text-transform: uppercase; letter-spacing: -0.03em; margin-bottom: 2rem; line-height: 1.1; }
    .manifesto p { font-size: 1.25rem; line-height: 1.8; color: #404040; }
    
    .final-cta { padding: 10rem 3rem; text-align: center; background: var(--text-dark); color: #fff; }
    .final-cta h2 { font-size: clamp(2.5rem, 5vw, 4.5rem); font-weight: 900; text-transform: uppercase; margin-bottom: 1.5rem; letter-spacing: -0.03em; }
    .final-cta p { font-size: 1.2rem; color: #a3a3a3; margin-bottom: 3rem; font-family: var(--font-serif); font-style: italic; }
    .final-cta .hero-btn { background: #fff; color: var(--text-dark); }
    .final-cta .hero-btn:hover { background: var(--accent); color: #fff; }

    @media (max-width: 768px) {
      .hero { padding: 6rem 1.5rem; }
      .manifesto { padding: 5rem 1.5rem; }
      .gallery-section { padding: 5rem 1.5rem; }
      .final-cta { padding: 6rem 1.5rem; }
      .nav { padding: 1.5rem; }
    }
    
    /* SLIDE-OUT DRAWERS */
    .drawer-overlay { position: fixed; inset: 0; background: rgba(9,9,11,0.6); z-index: 99998; opacity: 0; pointer-events: none; transition: 0.4s ease; backdrop-filter: blur(4px); }
    .drawer-overlay.active { opacity: 1; pointer-events: all; }
    
    .drawer-panel { position: fixed; top: 0; right: -100%; width: 100%; max-width: 500px; height: 100vh; background: #fff; color: var(--text-dark); z-index: 99999; transition: right 0.5s cubic-bezier(0.25, 1, 0.5, 1); overflow-y: auto; padding: 5rem 3rem 4rem; display: flex; flex-direction: column; }
    .drawer-panel.active { right: 0; box-shadow: -10px 0 40px rgba(0,0,0,0.1); }
    
    .drawer-close { position: absolute; top: 1.5rem; right: 1.5rem; background: var(--bg-light); color: var(--text-dark); border: none; width: 40px; height: 40px; border-radius: 50%; font-size: 1.2rem; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center; }
    .drawer-close:hover { background: var(--text-dark); color: #fff; }
    
    .drawer-title { font-size: 2.5rem; font-weight: 900; line-height: 1.1; text-transform: uppercase; letter-spacing: -0.03em; margin-bottom: 1.5rem; }
    .drawer-desc { font-size: 1.05rem; line-height: 1.7; color: #404040; margin-bottom: 2.5rem; }
    
    .drawer-list { list-style: none; padding: 0; margin-bottom: auto; }
    .drawer-list li { padding: 1rem 0; border-top: 1px solid var(--bg-light); font-size: 0.95rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; display: flex; justify-content: space-between; }
    .drawer-list li::after { content: '→'; color: var(--accent); }
    
    .drawer-cta { margin-top: 3rem; display: inline-flex; align-items: center; justify-content: center; padding: 1.25rem 2rem; background: var(--text-dark); color: #fff; text-transform: uppercase; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; width: 100%; border-radius: 2px; }
    .drawer-cta:hover { background: var(--accent); }
    
    .masonry-item { cursor: pointer; }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>


  <section class="hero" style="background-image: url('<?php echo esc_url( get_field('pillar_hero_img') ?: 'https://images.unsplash.com/photo-1594035910387-fea47794261f?auto=format&fit=crop&w=2000&q=80' ); ?>');">
    <div class="hero-content">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'Influence<br>Perception.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'We don\'t just capture what a product looks like; we capture how it feels to own it. High-impact commercial imagery designed to disrupt the market and create undeniable emotional connection.' ); ?></p>
      <a href="#" class="hero-btn" data-trigger="booking">Book a Commercial Campaign</a>
    </div>
  </section>

  <section class="manifesto">
    <div class="manifesto-inner">
      <h2><?php echo wp_kses_post( get_field('pillar_manifesto_title') ?: "A photograph isn't just an image.<br>It's a revenue engine." ); ?></h2>
      <p><?php echo wp_kses_post( get_field('pillar_manifesto_desc') ?: "In the commercial space, aesthetics mean nothing without strategy. Your visuals must arrest scrolling fingers, communicate instant value, and effortlessly guide the consumer toward conversion. We engineer every pixel to drive your bottom line." ); ?></p>
    </div>
  </section>

  <section class="gallery-section">
    <div class="gallery-header">
      <h2>Commercial Verticals</h2>
    </div>
    <div class="masonry-grid">
      <!-- Item 1 -->
      <div class="masonry-item" id="service-1" style="scroll-margin-top: 100px;" data-drawer="drawer-1">
        <img src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80' ); ?>" alt="Product Photography">
        <div class="masonry-caption">
          <h3><?php echo wp_kses_post( get_field('pillar_sec1_title') ?: 'Product & E-Commerce' ); ?></h3>
          <p><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'Elevating the clinical into the coveted.' ); ?></p>
        </div>
      </div>
      <!-- Item 2 -->
      <div class="masonry-item" id="service-2" style="scroll-margin-top: 100px;" data-drawer="drawer-2">
        <img src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1460353581641-37baddab0fa2?auto=format&fit=crop&w=800&q=80' ); ?>" alt="Food Lifestyle">
        <div class="masonry-caption">
          <h3><?php echo wp_kses_post( get_field('pillar_sec2_title') ?: 'Food & Lifestyle' ); ?></h3>
          <p><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'Crafting the taste before the first bite.' ); ?></p>
        </div>
      </div>
      <!-- Item 3 -->
      <div class="masonry-item" id="service-3" style="scroll-margin-top: 100px;" data-drawer="drawer-3">
        <img src="<?php echo esc_url( get_field('pillar_sec3_img') ?: 'https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&w=800&q=80' ); ?>" alt="Fashion Editorial">
        <div class="masonry-caption">
          <h3><?php echo wp_kses_post( get_field('pillar_sec3_title') ?: 'Fashion & Editorial' ); ?></h3>
          <p><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'Weaving narratives that dictate the culture.' ); ?></p>
        </div>
      </div>
      <!-- Item 4 -->
      <div class="masonry-item" id="service-4" style="scroll-margin-top: 100px;" data-drawer="drawer-4">
        <img src="<?php echo esc_url( get_field('pillar_sec4_img') ?: 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80' ); ?>" alt="Architecture">
        <div class="masonry-caption">
          <h3><?php echo wp_kses_post( get_field('pillar_sec4_title') ?: 'Architecture & Spaces' ); ?></h3>
          <p><?php echo wp_kses_post( get_field('pillar_sec4_desc') ?: 'Capturing the soul of physical environments.' ); ?></p>
        </div>
      </div>
      <!-- Item 5 -->
      <div class="masonry-item" id="service-5" style="scroll-margin-top: 100px;" data-drawer="drawer-5">
        <img src="<?php echo esc_url( get_field('pillar_sec5_img') ?: 'https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=800&q=80' ); ?>" alt="Social Media">
        <div class="masonry-caption">
          <h3><?php echo wp_kses_post( get_field('pillar_sec5_title') ?: 'Campaigns & Social PR' ); ?></h3>
          <p><?php echo wp_kses_post( get_field('pillar_sec5_desc') ?: 'Visuals engineered to disrupt the endless scroll.' ); ?></p>
        </div>
      </div>
    </div>
  </section>

  <section class="final-cta">
    <h2>Ready to dominate<br>your market?</h2>
    <p>Let's build a visual campaign that actively converts.</p>
    <a href="#" class="hero-btn" data-trigger="booking">Start a Project</a>
  </section>
  <!-- DRAWERS -->
  <div class="drawer-overlay" id="drawerOverlay"></div>

  <!-- Drawer 1 -->
  <aside class="drawer-panel" id="drawer-1">
    <button class="drawer-close">&times;</button>
    <h2 class="drawer-title"><?php echo wp_kses_post( get_field('pillar_sec1_title') ?: 'Product & E-Commerce' ); ?></h2>
    <p class="drawer-desc"><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'Elevating the clinical into the coveted. We transform everyday objects into obsessions through meticulous control of light, shadow, and texture. Whether for your direct-to-consumer storefront or global distribution, our high-resolution imagery removes hesitation and drives immediate add-to-cart actions.' ); ?></p>
    <?php 
      $deliv_1 = get_field('pillar_sec1_deliverables') ?: "Studio White-Background\nStylized Product Groupings\nMacro Texture Shots\nE-Commerce Optimization";
      $deliv_1_arr = array_filter(array_map('trim', explode("\n", $deliv_1)));
    ?>
    <ul class="drawer-list">
      <?php foreach($deliv_1_arr as $item): ?>
      <li><?php echo esc_html($item); ?></li>
      <?php endforeach; ?>
    </ul>
    <a href="#" class="drawer-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec1_cta_text') ?: 'Book Product Photography' ); ?></a>
  </aside>

  <!-- Drawer 2 -->
  <aside class="drawer-panel" id="drawer-2">
    <button class="drawer-close">&times;</button>
    <h2 class="drawer-title"><?php echo wp_kses_post( get_field('pillar_sec2_title') ?: 'Food & Lifestyle' ); ?></h2>
    <p class="drawer-desc"><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'Crafting the taste before the first bite. We create aspirational scenarios that place your consumer exactly where they want to be. Through vibrant styling, dynamic lighting, and authentic human interaction, we make your culinary or lifestyle brand deeply visceral.' ); ?></p>
    <?php 
      $deliv_2 = get_field('pillar_sec2_deliverables') ?: "Professional Food Styling\nAction Shots (Pouring/Sizzling)\nImmersive Lifestyle Context\nMenu Imagery";
      $deliv_2_arr = array_filter(array_map('trim', explode("\n", $deliv_2)));
    ?>
    <ul class="drawer-list">
      <?php foreach($deliv_2_arr as $item): ?>
      <li><?php echo esc_html($item); ?></li>
      <?php endforeach; ?>
    </ul>
    <a href="#" class="drawer-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec2_cta_text') ?: 'Book Lifestyle Photography' ); ?></a>
  </aside>

  <!-- Drawer 3 -->
  <aside class="drawer-panel" id="drawer-3">
    <button class="drawer-close">&times;</button>
    <h2 class="drawer-title"><?php echo wp_kses_post( get_field('pillar_sec3_title') ?: 'Fashion & Editorial' ); ?></h2>
    <p class="drawer-desc"><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'Weaving narratives that dictate the culture. We produce bold, attitude-driven portraiture and lookbooks that command attention. From studio setups to dynamic on-location shoots, we capture the movement, fabric, and soul of your collection.' ); ?></p>
    <?php 
      $deliv_3 = get_field('pillar_sec3_deliverables') ?: "Seasonal Lookbooks\nHigh-End Editorial Storytelling\nModel Casting & Styling\nOn-Location Shoots";
      $deliv_3_arr = array_filter(array_map('trim', explode("\n", $deliv_3)));
    ?>
    <ul class="drawer-list">
      <?php foreach($deliv_3_arr as $item): ?>
      <li><?php echo esc_html($item); ?></li>
      <?php endforeach; ?>
    </ul>
    <a href="#" class="drawer-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec3_cta_text') ?: 'Book Fashion Photography' ); ?></a>
  </aside>

  <!-- Drawer 4 -->
  <aside class="drawer-panel" id="drawer-4">
    <button class="drawer-close">&times;</button>
    <h2 class="drawer-title"><?php echo wp_kses_post( get_field('pillar_sec4_title') ?: 'Architecture & Spaces' ); ?></h2>
    <p class="drawer-desc"><?php echo wp_kses_post( get_field('pillar_sec4_desc') ?: 'Capturing the soul of physical environments. We translate brick, mortar, and steel into cinematic, immersive experiences. Ideal for premium real estate and hospitality, we use advanced perspective control to showcase the true scale and intent of your spaces.' ); ?></p>
    <?php 
      $deliv_4 = get_field('pillar_sec4_deliverables') ?: "Interior & Exterior Twilight\nPerspective Correction\n360 Walkthroughs\nDrone & Aerials";
      $deliv_4_arr = array_filter(array_map('trim', explode("\n", $deliv_4)));
    ?>
    <ul class="drawer-list">
      <?php foreach($deliv_4_arr as $item): ?>
      <li><?php echo esc_html($item); ?></li>
      <?php endforeach; ?>
    </ul>
    <a href="#" class="drawer-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec4_cta_text') ?: 'Book Architectural Photography' ); ?></a>
  </aside>

  <!-- Drawer 5 -->
  <aside class="drawer-panel" id="drawer-5">
    <button class="drawer-close">&times;</button>
    <h2 class="drawer-title"><?php echo wp_kses_post( get_field('pillar_sec5_title') ?: 'Campaigns & Social PR' ); ?></h2>
    <p class="drawer-desc"><?php echo wp_kses_post( get_field('pillar_sec5_desc') ?: 'Visuals engineered to disrupt the endless scroll. In a world of fleeting attention, we produce high-impact aesthetic assets that spark conversation, increase shareability, and turn passive scrollers into active brand advocates.' ); ?></p>
    <?php 
      $deliv_5 = get_field('pillar_sec5_deliverables') ?: "Social Media Content Banks\nAesthetic Flatlays\nPR Coverage\nShort-Form Stop Motion";
      $deliv_5_arr = array_filter(array_map('trim', explode("\n", $deliv_5)));
    ?>
    <ul class="drawer-list">
      <?php foreach($deliv_5_arr as $item): ?>
      <li><?php echo esc_html($item); ?></li>
      <?php endforeach; ?>
    </ul>
    <a href="#" class="drawer-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec5_cta_text') ?: 'Book Campaign Photography' ); ?></a>
  </aside>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const cards = document.querySelectorAll('.masonry-item');
      const drawers = document.querySelectorAll('.drawer-panel');
      const overlay = document.getElementById('drawerOverlay');
      const closeBtns = document.querySelectorAll('.drawer-close');

      function closeAllDrawers() {
        drawers.forEach(d => d.classList.remove('active'));
        if(overlay) overlay.classList.remove('active');
        document.body.style.overflow = '';
      }

      cards.forEach(card => {
        card.addEventListener('click', () => {
          const targetId = card.getAttribute('data-drawer');
          if(!targetId) return;
          const drawer = document.getElementById(targetId);
          if (drawer) {
            drawer.classList.add('active');
            if(overlay) overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
          }
        });
      });

      closeBtns.forEach(btn => {
        btn.addEventListener('click', closeAllDrawers);
      });

      if(overlay) overlay.addEventListener('click', closeAllDrawers);
      
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeAllDrawers();
      });
    });
  </script>

<?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
