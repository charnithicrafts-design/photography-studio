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
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700;900&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --bg-pure: #ffffff;
      --bg-alt: #f4f4f5;
      --text-main: #09090b;
      --text-muted: #71717a;
      --accent: #ea580c; /* vibrant orange for brand design */
      --font-display: 'Space Grotesk', sans-serif;
      --font-body: 'Inter', sans-serif;
    }
    body { font-family: var(--font-body); background: var(--bg-pure); color: var(--text-main); overflow-x: hidden; -webkit-font-smoothing: antialiased; }
    
    /* HERO: Full Width Background */
    .hero { min-height: 90vh; display: flex; align-items: center; justify-content: flex-start; padding: 10rem 3rem 4rem; position: relative; overflow: hidden; background: url('https://images.unsplash.com/photo-1497215728101-856f4ea42174?auto=format&fit=crop&w=2000&q=80') center/cover no-repeat; }
    
    /* Creative Blue/White Overlay */
    .hero::before { content: ''; position: absolute; inset: 0; background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.75) 40%, rgba(14, 165, 233, 0.4) 100%); pointer-events: none; z-index: 1; }
    
    .hero-content-left { position: relative; z-index: 10; display: flex; flex-direction: column; align-items: flex-start; max-width: 800px; }
    .hero-eyebrow { font-family: var(--font-display); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.2em; color: var(--accent); margin-bottom: 2rem; font-weight: 700; }
    .hero-title { font-family: var(--font-display); font-size: clamp(2.5rem, 7vw, 6.5rem); font-weight: 900; line-height: 0.95; letter-spacing: -0.04em; text-transform: uppercase; margin-bottom: 2rem; word-wrap: break-word; overflow-wrap: break-word; hyphens: auto; color: var(--text-main); }
    .hero-desc { font-size: clamp(1.1rem, 2vw, 1.3rem); line-height: 1.6; color: var(--text-muted); max-width: 600px; font-weight: 400; margin-bottom: 3rem; }
    
    .hero-cta { display: inline-flex; align-items: center; justify-content: center; padding: 1.25rem 3rem; background: var(--text-main); color: var(--bg-pure); text-transform: uppercase; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; font-family: var(--font-display); border-radius: 2px; }
    .hero-cta:hover { background: var(--accent); transform: translateY(-2px); box-shadow: 0 10px 20px rgba(234,88,12,0.2); }
    
    /* MANIFESTO */
    .manifesto { padding: 6rem 3rem; background: var(--bg-alt); }
    .manifesto-inner { max-width: 1200px; margin: 0 auto; display: flex; flex-direction: column; gap: 2rem; }
    @media(min-width: 992px) { .manifesto-inner { flex-direction: row; align-items: flex-start; gap: 6rem; } }
    .manifesto-title { font-family: var(--font-display); font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 700; line-height: 1.1; letter-spacing: -0.02em; flex: 1; }
    .manifesto-copy { flex: 1.5; font-size: 1.1rem; line-height: 1.8; color: var(--text-muted); }
    
    /* SERVICES LIST (Editorial Alternating) */
    .services-section { padding: 10rem 3rem; max-width: 1400px; margin: 0 auto; display: flex; flex-direction: column; gap: 8rem; }
    
    .service-row { display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center; cursor: pointer; }
    @media(min-width: 992px) { 
        .service-row { grid-template-columns: 1fr 1fr; gap: 6rem; } 
        .service-row:nth-child(even) .service-content { order: -1; }
    }
    
    .service-img-wrap { width: 100%; aspect-ratio: 4/3; overflow: hidden; position: relative; background: var(--bg-alt); }
    .service-img-wrap img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(30%); transition: transform 1s cubic-bezier(0.25, 1, 0.5, 1), filter 0.5s; }
    .service-row:hover .service-img-wrap img { transform: scale(1.03); filter: grayscale(0%); }
    
    .service-content { position: relative; padding: 2rem 0; z-index: 2; }
    .service-num { font-family: var(--font-display); font-size: 6rem; font-weight: 900; color: var(--bg-alt); position: absolute; top: -3rem; left: -1rem; z-index: -1; line-height: 1; }
    @media(min-width: 992px) { .service-num { font-size: 9rem; top: -4.5rem; left: -3rem; } }
    
    .service-title { font-family: var(--font-display); font-size: clamp(2.2rem, 4vw, 3.5rem); font-weight: 900; text-transform: uppercase; letter-spacing: -0.03em; margin-bottom: 1.5rem; transition: color 0.3s; line-height: 1.1; }
    .service-row:hover .service-title { color: var(--accent); }
    .service-desc { font-size: 1.1rem; color: var(--text-muted); line-height: 1.8; max-width: 500px; margin-bottom: 2rem; }
    
    .service-action { font-family: var(--font-display); font-size: 0.85rem; text-transform: uppercase; font-weight: 700; letter-spacing: 0.1em; color: var(--text-main); display: inline-flex; align-items: center; gap: 0.5rem; }
    .service-action::after { content: '→'; transition: transform 0.3s; }
    .service-row:hover .service-action::after { transform: translateX(5px); color: var(--accent); }
    
    /* SLIDE-OUT DRAWERS */
    .drawer-overlay { position: fixed; inset: 0; background: rgba(9,9,11,0.6); z-index: 99998; opacity: 0; pointer-events: none; transition: 0.4s ease; backdrop-filter: blur(4px); }
    .drawer-overlay.active { opacity: 1; pointer-events: all; }
    
    .drawer-panel { position: fixed; top: 0; right: -100%; width: 100%; max-width: 500px; height: 100vh; background: var(--bg-pure); z-index: 99999; transition: right 0.5s cubic-bezier(0.25, 1, 0.5, 1); overflow-y: auto; padding: 5rem 3rem 4rem; display: flex; flex-direction: column; }
    .drawer-panel.active { right: 0; box-shadow: -10px 0 40px rgba(0,0,0,0.1); }
    
    .drawer-close { position: absolute; top: 1.5rem; right: 1.5rem; background: var(--bg-alt); color: var(--text-main); border: none; width: 40px; height: 40px; border-radius: 50%; font-size: 1.2rem; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center; }
    .drawer-close:hover { background: var(--text-main); color: var(--bg-pure); }
    
    .drawer-title { font-family: var(--font-display); font-size: 2.5rem; font-weight: 900; line-height: 1.1; text-transform: uppercase; letter-spacing: -0.03em; margin-bottom: 1.5rem; color: var(--text-main); }
    .drawer-desc { font-size: 1.05rem; line-height: 1.7; color: var(--text-muted); margin-bottom: 2.5rem; }
    
    .drawer-list { list-style: none; padding: 0; margin-bottom: auto; }
    .drawer-list li { padding: 1rem 0; border-top: 1px solid var(--bg-alt); font-size: 0.95rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; display: flex; justify-content: space-between; }
    .drawer-list li::after { content: '→'; color: var(--accent); }
    
    .drawer-cta { margin-top: 3rem; display: block; text-align: center; padding: 1.25rem; background: var(--text-main); color: var(--bg-pure); font-family: var(--font-display); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; }
    .drawer-cta:hover { background: var(--accent); }
  </style>
</head>
<body>

  <?php get_template_part('template-parts/global-nav'); ?>

  <section class="hero">
    <div class="hero-content-left">
      <div class="hero-eyebrow">The Art of Identity</div>
      <h1 class="hero-title">Designing Your<br>Core Essence.</h1>
      <p class="hero-desc">Before your audience reads a single word, they feel exactly who you are. We weave your deepest values into colors, typography, and textures, crafting an identity that speaks directly to the heart and refuses to be forgotten.</p>
      <a href="#services" class="hero-cta" data-trigger="booking">Start a Project</a>
    </div>
  </section>

  <section class="manifesto">
    <div class="manifesto-inner">
      <h2 class="manifesto-title">Every detail is a silent promise.</h2>
      <p class="manifesto-copy">Trust isn't demanded; it is quietly earned through consistency. From the satisfying weight of your packaging to the deliberate hue of your digital presence, your brand lives entirely in the minds of those who experience it. We don't just build logos—we craft the profound feeling of reliability that lingers long after the first glance.</p>
    </div>
  </section>

    <section id="services" class="services-section">
      <!-- 01 -->
      <article class="service-row" data-drawer="drawer-1">
        <div class="service-img-wrap">
          <img src="https://images.unsplash.com/photo-1581291518633-83b4ebd1d83e?auto=format&fit=crop&w=1200&q=80" alt="Tactile Sketching">
        </div>
        <div class="service-content">
          <div class="service-num">01</div>
          <h3 class="service-title">Logo & Brand Identity</h3>
          <p class="service-desc">The anchor of your ecosystem. We begin with raw, tactile exploration to find the mark that perfectly distills your ethos. Clean, memorable, and instantly recognizable.</p>
          <span class="service-action">View Deliverables</span>
        </div>
      </article>

      <!-- 02 -->
      <article class="service-row" data-drawer="drawer-2">
        <div class="service-img-wrap">
          <img src="https://images.unsplash.com/photo-1558655146-d09347e92766?auto=format&fit=crop&w=1200&q=80" alt="Print Mockups">
        </div>
        <div class="service-content">
          <div class="service-num">02</div>
          <h3 class="service-title">Product & Packaging</h3>
          <p class="service-desc">We engineer tactile designs that turn unboxing into a profound emotional experience, selecting materials that speak volumes before the product is even revealed.</p>
          <span class="service-action">View Deliverables</span>
        </div>
      </article>

      <!-- 03 -->
      <article class="service-row" data-drawer="drawer-3">
        <div class="service-img-wrap">
          <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=1200&q=80" alt="Strategy Team">
        </div>
        <div class="service-content">
          <div class="service-num">03</div>
          <h3 class="service-title">Marketing Collaterals</h3>
          <p class="service-desc">Pitch decks, brochures, and digital assets engineered to persuade and close. We align your messaging with powerful visual hierarchy.</p>
          <span class="service-action">View Deliverables</span>
        </div>
      </article>

      <!-- 04 -->
      <article class="service-row" data-drawer="drawer-4">
        <div class="service-img-wrap">
          <img src="https://images.unsplash.com/photo-1449824913935-59a10b8d2000?auto=format&fit=crop&w=1200&q=80" alt="Urban Environment">
        </div>
        <div class="service-content">
          <div class="service-num">04</div>
          <h3 class="service-title">OOH & Installations</h3>
          <p class="service-desc">Billboards and environmental design that disrupt the physical space, creating undeniable presence in the real world.</p>
          <span class="service-action">View Deliverables</span>
        </div>
      </article>

      <!-- 05 -->
      <article class="service-row" data-drawer="drawer-5">
        <div class="service-img-wrap">
          <img src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=1200&q=80" alt="Design Workspace">
        </div>
        <div class="service-content">
          <div class="service-num">05</div>
          <h3 class="service-title">Brand Guidelines</h3>
          <p class="service-desc">The strict rulebook that protects your visual equity for decades to come. We define the typography, palette, and voice that sustains your authority.</p>
          <span class="service-action">View Deliverables</span>
        </div>
      </article>
  </section>

  <!-- DRAWERS -->
  <div class="drawer-overlay" id="drawerOverlay"></div>

  <!-- Drawer 1 -->
  <aside class="drawer-panel" id="drawer-1">
    <button class="drawer-close">&times;</button>
    <h2 class="drawer-title">Logo & Brand Identity</h2>
    <p class="drawer-desc">We develop timeless logos, comprehensive color palettes, and typographic systems that form the core DNA of your company.</p>
    <ul class="drawer-list">
      <li>Primary Logo Design</li>
      <li>Typography Selection</li>
      <li>Color Architecture</li>
      <li>Visual Motif Creation</li>
    </ul>
    <a href="#" class="drawer-cta" data-trigger="booking">Start a Project</a>
  </aside>

  <!-- Drawer 2 -->
  <aside class="drawer-panel" id="drawer-2">
    <button class="drawer-close">&times;</button>
    <h2 class="drawer-title">Product & Packaging</h2>
    <p class="drawer-desc">Packaging is the physical manifestation of your brand. We design boxes, labels, and physical goods that demand to be held.</p>
    <ul class="drawer-list">
      <li>Box & Label Design</li>
      <li>Material Sourcing Consultation</li>
      <li>Unboxing Experience Flow</li>
      <li>3D Mockups</li>
    </ul>
    <a href="#" class="drawer-cta" data-trigger="booking">Start a Project</a>
  </aside>

  <!-- Drawer 3 -->
  <aside class="drawer-panel" id="drawer-3">
    <button class="drawer-close">&times;</button>
    <h2 class="drawer-title">Marketing Collaterals</h2>
    <p class="drawer-desc">Your sales tools need to look as expensive as the deals you’re closing. We create highly persuasive editorial designs.</p>
    <ul class="drawer-list">
      <li>Pitch Decks & Presentations</li>
      <li>Company Profiles</li>
      <li>Digital & Print Brochures</li>
      <li>Business Cards</li>
    </ul>
    <a href="#" class="drawer-cta" data-trigger="booking">Start a Project</a>
  </aside>

  <!-- Drawer 4 -->
  <aside class="drawer-panel" id="drawer-4">
    <button class="drawer-close">&times;</button>
    <h2 class="drawer-title">OOH & Installations</h2>
    <p class="drawer-desc">Command attention in the real world. We design high-impact billboards, retail spaces, and experiential event installations.</p>
    <ul class="drawer-list">
      <li>Billboard & Hoarding Design</li>
      <li>Exhibition Booths</li>
      <li>Event Signage</li>
      <li>Wayfinding Systems</li>
    </ul>
    <a href="#" class="drawer-cta" data-trigger="booking">Start a Project</a>
  </aside>

  <!-- Drawer 5 -->
  <aside class="drawer-panel" id="drawer-5">
    <button class="drawer-close">&times;</button>
    <h2 class="drawer-title">Brand Guidelines</h2>
    <p class="drawer-desc">A brand is only as strong as its enforcement. We deliver comprehensive brand bibles that dictate exactly how your identity should be used.</p>
    <ul class="drawer-list">
      <li>Logo Usage Rules</li>
      <li>Tone of Voice Guidelines</li>
      <li>Photography Style Guide</li>
      <li>Digital Asset Libraries</li>
    </ul>
    <a href="#" class="drawer-cta" data-trigger="booking">Start a Project</a>
  </aside>

  <?php get_template_part('template-parts/global-booking'); ?>
  <?php get_template_part('template-parts/global-footer'); ?>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const cards = document.querySelectorAll('.service-row');
      const drawers = document.querySelectorAll('.drawer-panel');
      const overlay = document.getElementById('drawerOverlay');
      const closeBtns = document.querySelectorAll('.drawer-close');

      function closeAllDrawers() {
        drawers.forEach(d => d.classList.remove('active'));
        overlay.classList.remove('active');
        document.body.style.overflow = '';
      }

      cards.forEach(card => {
        card.addEventListener('click', () => {
          const targetId = card.getAttribute('data-drawer');
          const drawer = document.getElementById(targetId);
          if (drawer) {
            drawer.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
          }
        });
      });

      closeBtns.forEach(btn => {
        btn.addEventListener('click', closeAllDrawers);
      });

      overlay.addEventListener('click', closeAllDrawers);
      
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeAllDrawers();
      });
    });
  </script>
</body>
</html>
