<?php
/**
 * Template Name: Pillar — Events & Portrait (Z-Pattern Brutalist)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events & Portrait — Chitramaya Creatives</title>
  <link rel="canonical" href="<?php echo esc_url(home_url('/events-portrait')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --font-sans: 'Inter', sans-serif;
      --border-raw: 4px solid #111;
      --bg-raw: #F2F0EB;
      --text-dark: #111;
    }
    
    body { font-family: var(--font-sans); background: var(--bg-raw); color: var(--text-dark); -webkit-font-smoothing: antialiased; overflow-x: hidden; }
    
    /* NAV */
    nav { position: fixed; top: 0; width: 100%; padding: 1.5rem; display: flex; justify-content: space-between; align-items: center; z-index: 100; background: var(--bg-raw); border-bottom: var(--border-raw); }
    .nav-logo { font-weight: 900; font-size: 1.5rem; text-transform: uppercase; letter-spacing: -0.05em; color: var(--text-dark); text-decoration: none; }
    
    /* HERO */
    .hero-container { padding: 8rem 2rem 4rem; max-width: 1600px; margin: 0 auto; display: grid; gap: 2rem; border-bottom: var(--border-raw); }
    @media (min-width: 1024px) {
      .hero-container { grid-template-columns: repeat(12, 1fr); align-items: end; padding: 10rem 4rem 6rem; }
      .hero-card { grid-column: 1 / 6; }
      .hero-img-wrapper { grid-column: 7 / 13; }
    }
    
    .hero-card { margin-bottom: 2rem; }
    .hero-title { font-weight: 900; font-size: clamp(3rem, 6vw, 6rem); text-transform: uppercase; line-height: 0.9; letter-spacing: -0.04em; margin-bottom: 1.5rem; color: var(--text-dark); }
    .hero-desc { font-weight: 700; font-size: 1.25rem; line-height: 1.5; color: var(--text-dark); border-top: 2px solid #111; padding-top: 1rem; }
    
    .hero-img-wrapper img { width: 100%; height: auto; border: var(--border-raw); display: block; box-shadow: 16px 16px 0px #111; }
    
    /* MANIFESTO */
    .manifesto { padding: 6rem 2rem; background: var(--bg-raw); border-bottom: var(--border-raw); }
    .manifesto-inner { max-width: 1200px; margin: 0 auto; display: grid; gap: 2rem; }
    @media (min-width: 1024px) { .manifesto-inner { grid-template-columns: 1fr 1fr; align-items: center; } }
    .manifesto h2 { font-weight: 900; font-size: clamp(3rem, 5vw, 4.5rem); text-transform: uppercase; line-height: 0.9; letter-spacing: -0.02em; }
    .manifesto p { font-size: clamp(1.2rem, 2vw, 1.5rem); line-height: 1.4; font-weight: 700; }
    
    /* Z-PATTERN BRUTALIST GRID (Law of Proximity + Negative Space) */
    .services-container { padding: 6rem 2rem; max-width: 1600px; margin: 0 auto; display: flex; flex-direction: column; gap: 8rem; }
    
    .service-row { display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center; }
    
    @media (min-width: 1024px) {
      .services-container { padding: 8rem 4rem; gap: 12rem; }
      .service-row { grid-template-columns: repeat(12, 1fr); gap: 2rem; }
      
      /* Image spans 7 cols, Text spans 4 cols. 1 col of micro negative space */
      .service-img { grid-column: 1 / 8; }
      .service-card { grid-column: 9 / 13; }
      
      /* Alternating Z-Pattern */
      .service-row:nth-child(even) .service-img { grid-column: 6 / 13; grid-row: 1; }
      .service-row:nth-child(even) .service-card { grid-column: 1 / 5; grid-row: 1; }
    }
    
    /* The Art (Uncropped, Original Ratio) */
    .service-img img { width: 100%; height: auto; display: block; border: var(--border-raw); box-shadow: 16px 16px 0px #111; }
    @media (min-width: 1024px) {
      .service-row:nth-child(even) .service-img img { box-shadow: -16px 16px 0px #111; }
    }
    
    /* The Truth (Honest Brutalist Card) */
    .service-card { background: var(--bg-raw); display: flex; flex-direction: column; }
    
    .service-title { font-weight: 900; font-size: clamp(3rem, 4vw, 4.5rem); text-transform: uppercase; line-height: 0.9; letter-spacing: -0.05em; color: var(--text-dark); margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: var(--border-raw); }
    .service-desc { font-size: 1.15rem; line-height: 1.5; margin-bottom: 2rem; font-weight: 700; color: var(--text-dark); }
    
    .service-deliv { margin-bottom: 2.5rem; }
    .service-deliv ul { list-style: none; border-top: 2px solid #111; }
    .service-deliv li { padding: 1rem 0; border-bottom: 2px solid #111; font-weight: 900; text-transform: uppercase; font-size: 0.95rem; letter-spacing: -0.02em; display: flex; justify-content: space-between; color: var(--text-dark); }
    .service-deliv li::after { content: '+'; font-weight: 900; }
    
    .service-cta { display: block; width: 100%; padding: 1.5rem; text-align: center; border: var(--border-raw); background: var(--text-dark); color: #fff; font-weight: 900; font-size: 1.25rem; text-transform: uppercase; letter-spacing: -0.02em; text-decoration: none; transition: 0.1s; }
    .service-cta:active { transform: translateY(4px); box-shadow: none; }
    .service-cta:hover { background: #000; box-shadow: 4px 4px 0px #111; }

    @media (max-width: 768px) {
      .service-img img { box-shadow: 8px 8px 0px #111; }
      .hero-img-wrapper img { box-shadow: 8px 8px 0px #111; }
    }
    
    /* STICKY VERTICAL NAV */
    .local-pillar-nav { position: fixed; right: 2rem; top: 50%; transform: translateY(-50%); z-index: 50; mix-blend-mode: difference; }
    .local-pillar-nav ul { list-style: none; display: flex; flex-direction: column; gap: 1.5rem; }
    .local-pillar-nav a { display: block; width: 12px; height: 12px; border-radius: 50%; border: 2px solid #fff; background: transparent; transition: 0.3s; position: relative; }
    .local-pillar-nav a:hover, .local-pillar-nav a.active { background: #fff; transform: scale(1.3); }
    @media (max-width: 1024px) { .local-pillar-nav { display: none; } }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- STICKY VERTICAL NAV -->
  <nav class="local-pillar-nav" aria-label="Section Navigation">
    <ul>
      <li><a href="#service-1" aria-label="Go to Service 1"></a></li>
      <li><a href="#service-2" aria-label="Go to Service 2"></a></li>
      <li><a href="#service-3" aria-label="Go to Service 3"></a></li>
      <li><a href="#service-4" aria-label="Go to Service 4"></a></li>
    </ul>
  </nav>

  <!-- HERO -->
  <section class="hero-container">
    <div class="hero-card">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'Mastering<br>the Unseen.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'We do not merely document; we elevate reality into a masterpiece. From the sacred fires of an Upanayanam to the surreal anticipation of maternity, we weave creative narratives into the very fabric of your legacy.' ); ?></p>
    </div>
    <div class="hero-img-wrapper">
      <img src="<?php echo esc_url( get_field('pillar_hero_img') ?: get_stylesheet_directory_uri() . '/images/events-portrait/cultural.jpg' ); ?>" alt="Chitramaya Hero">
    </div>
  </section>

  <!-- MANIFESTO -->
  <section class="manifesto">
    <div class="manifesto-inner">
      <h2><?php echo wp_kses_post( get_field('pillar_manifesto_title') ?: 'Your legacy, painted in light.' ); ?></h2>
      <p><?php echo wp_kses_post( get_field('pillar_manifesto_desc') ?: 'True portraiture transcends the ordinary. It is about capturing the invisible—the profound reverence of a Sadhabishegam, the chaotic joy of a toddler, or the deep spiritual bond of a Sastiyabthapoorthi. At Chitramaya, we apply an editorial, cinematic eye to your cultural milestones.' ); ?></p>
    </div>
  </section>

  <!-- Z-PATTERN BRUTALIST GRID -->
  <section class="services-container">
    
    <!-- 01: MATERNITY -->
    <article class="service-row" id="service-1">
      <div class="service-img">
        <img src="<?php echo esc_url( get_field('pillar_sec1_img') ?: get_stylesheet_directory_uri() . '/images/events-portrait/maternity.jpg' ); ?>" alt="Maternity Portrait">
      </div>
      <div class="service-card">
        <h3 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec1_title') ?: 'Maternity' ); ?></h3>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'The quiet magnitude of creation. We document the transformative journey of motherhood with profound reverence.' ); ?></p>
        <div class="service-deliv">
          <?php 
            $deliv_1 = get_field('pillar_sec1_deliverables') ?: "Studio Art-Themed Sessions\nLocation Oriented Magic\nBump to Baby Journeys\nThe Village Awaits";
            $deliv_1_arr = array_filter(array_map('trim', explode("\n", $deliv_1)));
          ?>
          <ul>
            <?php foreach($deliv_1_arr as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <a href="#" class="service-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec1_cta_text') ?: 'Book Maternity' ); ?></a>
      </div>
    </article>

    <!-- 02: NEWBORN -->
    <article class="service-row" id="service-2">
      <div class="service-img">
        <img src="<?php echo esc_url( get_field('pillar_sec2_img') ?: get_stylesheet_directory_uri() . '/images/events-portrait/baby.jpg' ); ?>" alt="Newborn Portrait">
      </div>
      <div class="service-card">
        <h3 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec2_title') ?: 'Newborn' ); ?></h3>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'The fleeting poetry of the beginning. We craft timeless, art-themed portraits to preserve the fragile beauty of your newest chapter.' ); ?></p>
        <div class="service-deliv">
          <?php 
            $deliv_2 = get_field('pillar_sec2_deliverables') ?: "1st Birthday Celebrations\nNewborn Art-Themed Shoots\nInfant & Toddler Home Visits\nToddler Outdoor Style";
            $deliv_2_arr = array_filter(array_map('trim', explode("\n", $deliv_2)));
          ?>
          <ul>
            <?php foreach($deliv_2_arr as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <a href="#" class="service-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec2_cta_text') ?: 'Book Baby' ); ?></a>
      </div>
    </article>

    <!-- 03: CULTURAL -->
    <article class="service-row" id="service-3">
      <div class="service-img">
        <img src="<?php echo esc_url( get_field('pillar_sec3_img') ?: get_stylesheet_directory_uri() . '/images/events-portrait/cultural.jpg' ); ?>" alt="Cultural Milestones">
      </div>
      <div class="service-card">
        <h3 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec3_title') ?: 'Cultural' ); ?></h3>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'Anchoring your lineage in cinematic light. We orchestrate grand portraits and document deeply sacred cultural milestones with a creative perspective.' ); ?></p>
        <div class="service-deliv">
          <?php 
            $deliv_3 = get_field('pillar_sec3_deliverables') ?: "Sastiyabthapoorthi & Sadhabishegam\nUpanayanam & Ayushomam\nGrand Family Portraits\nBaby Showers";
            $deliv_3_arr = array_filter(array_map('trim', explode("\n", $deliv_3)));
          ?>
          <ul>
            <?php foreach($deliv_3_arr as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <a href="#" class="service-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec3_cta_text') ?: 'Book Event' ); ?></a>
      </div>
    </article>

    <!-- 04: WEDDINGS -->
    <article class="service-row" id="service-4">
      <div class="service-img">
        <img src="<?php echo esc_url( get_field('pillar_sec4_img') ?: get_stylesheet_directory_uri() . '/images/events-portrait/wedding.jpg' ); ?>" alt="Cinematic Weddings">
      </div>
      <div class="service-card">
        <h3 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec4_title') ?: 'Weddings' ); ?></h3>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec4_desc') ?: 'The epic romance of your defining day. From quiet pre-wedding intimacy to the grand spectacle of a destination celebration.' ); ?></p>
        <div class="service-deliv">
          <?php 
            $deliv_4 = get_field('pillar_sec4_deliverables') ?: "Destination Weddings\nPre/Post Wedding Magic\nCustom Song Creation\nEditorial Coverage";
            $deliv_4_arr = array_filter(array_map('trim', explode("\n", $deliv_4)));
          ?>
          <ul>
            <?php foreach($deliv_4_arr as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <a href="#" class="service-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec4_cta_text') ?: 'Book Wedding' ); ?></a>
      </div>
    </article>

  </section>

<?php get_template_part('template-parts/global-footer'); ?>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            document.querySelectorAll('.local-pillar-nav a').forEach(link => link.classList.remove('active'));
            const id = entry.target.getAttribute('id');
            const activeLink = document.querySelector(`.local-pillar-nav a[href="#${id}"]`);
            if(activeLink) activeLink.classList.add('active');
          }
        });
      }, { threshold: 0.5 });
      
      document.querySelectorAll('.service-row').forEach(row => {
        observer.observe(row);
      });
    });
  </script>
  
  <?php wp_footer(); ?>
</body>
</html>
