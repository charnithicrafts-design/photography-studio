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
    .hero { position: relative; min-height: 90vh; display: flex; align-items: center; justify-content: center; padding: 6rem 3rem; text-align: center; background: #E5E5E5; color: var(--text-dark); }
    .hero-content { position: relative; z-index: 10; max-width: 1000px; }
    .hero-title { font-size: clamp(3rem, 7vw, 6.5rem); font-weight: 900; letter-spacing: -0.03em; line-height: 1; margin-bottom: 1.5rem; text-transform: uppercase; }
    .hero-desc { font-size: 1.2rem; line-height: 1.6; color: #404040; margin-bottom: 3rem; max-width: 600px; margin-inline: auto; font-family: var(--font-serif); font-style: italic; }
    .hero-btn { display: inline-block; padding: 1rem 3rem; background: var(--text-dark); color: #fff; text-transform: uppercase; font-weight: 700; font-size: 0.85rem; letter-spacing: 0.1em; text-decoration: none; transition: 0.3s; }
    .hero-btn:hover { background: var(--accent); }
    
    /* MASONRY GALLERY */
    .gallery-section { padding: 5rem 3rem; background: var(--bg-light); }
    .masonry-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1rem; }
    .masonry-item { position: relative; overflow: hidden; background: #000; aspect-ratio: 3/4; }
    .masonry-item img { width: 100%; height: 100%; object-fit: cover; opacity: 0.8; transition: opacity 0.4s, transform 0.6s; }
    .masonry-item:hover img { opacity: 1; transform: scale(1.05); }
    .masonry-caption { position: absolute; bottom: 0; left: 0; width: 100%; padding: 2rem; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); color: #fff; }
    .masonry-caption h3 { font-size: 1.5rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem; }
    .masonry-caption p { font-family: var(--font-serif); font-style: italic; font-size: 1rem; color: #d4d4d4; }
    
    @media (max-width: 768px) {
      .hero { padding: 6rem 1.5rem; }
      .gallery-section { padding: 3rem 1.5rem; }
      .nav { padding: 1.5rem; }
    }
  </style>
</head>
<body>
  <nav>
    <a href="<?php echo home_url('/'); ?>" class="nav-logo">Chitramaya Creatives</a>
    <div class="nav-book"><a href="#" data-trigger="booking">Book Campaign ↓</a></div>
  </nav>

  <section class="hero">
    <div class="hero-content">
      <h1 class="hero-title">Purpose-Driven Visuals.<br>Engineered to Convert.</h1>
      <p class="hero-desc">Capturing, enhancing, and delivering high-quality images that align seamlessly with your marketing goals.</p>
      <a href="#" class="hero-btn" data-trigger="booking">Book a Commercial Campaign</a>
    </div>
  </section>

  <section class="gallery-section">
    <div class="masonry-grid">
      <!-- Item 1 -->
      <div class="masonry-item">
        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?auto=format&fit=crop&w=800&q=80" alt="Product Photography">
        <div class="masonry-caption">
          <h3>Product & E-Commerce</h3>
          <p>Clean, clinical, and tactile.</p>
        </div>
      </div>
      <!-- Item 2 -->
      <div class="masonry-item">
        <img src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2?auto=format&fit=crop&w=800&q=80" alt="Food Lifestyle">
        <div class="masonry-caption">
          <h3>Food & Lifestyle</h3>
          <p>Aspirational real-life scenarios.</p>
        </div>
      </div>
      <!-- Item 3 -->
      <div class="masonry-item">
        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=800&q=80" alt="Architecture">
        <div class="masonry-caption">
          <h3>Architecture & 360</h3>
          <p>Cinematic walkthroughs & timelapses.</p>
        </div>
      </div>
    </div>
  </section>

  <?php wp_footer(); ?>
</body>
</html>
