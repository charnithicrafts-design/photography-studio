<?php
/**
 * Template Name: Pillar — Corporate & Brand (Z-Pattern Brutalist)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Corporate & Brand Photography — Chitramaya Creatives</title>
  <meta name="description" content="Presenting a strong, authentic visual identity. From the boardroom to the production floor, we document the reality of your corporate culture.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/corporate-brand')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --font-sans: 'Inter', sans-serif;
      --border-raw: 4px solid #111;
      --bg-raw: #FFFFFF; /* Pure White for Corporate starkness */
      --text-dark: #111;
      --accent: #A96F44;
    }
    
    body { font-family: var(--font-sans); background: var(--bg-raw); color: var(--text-dark); -webkit-font-smoothing: antialiased; overflow-x: hidden; }
    
    /* NAV */
    nav { position: fixed; top: 0; width: 100%; padding: 1.5rem; display: flex; justify-content: space-between; align-items: center; z-index: 100; background: var(--bg-raw); border-bottom: var(--border-raw); }
    .nav-logo { font-weight: 900; font-size: 1.5rem; text-transform: uppercase; letter-spacing: -0.05em; color: var(--text-dark); text-decoration: none; }
    
    /* STICKY VERTICAL NAV */
    .local-pillar-nav { position: fixed; right: 2rem; top: 50%; transform: translateY(-50%); z-index: 50; mix-blend-mode: difference; }
    .local-pillar-nav ul { list-style: none; display: flex; flex-direction: column; gap: 1.5rem; }
    .local-pillar-nav a { display: block; width: 12px; height: 12px; border-radius: 50%; border: 2px solid #fff; background: transparent; transition: 0.3s; position: relative; }
    .local-pillar-nav a:hover, .local-pillar-nav a.active { background: #fff; transform: scale(1.3); }
    @media (max-width: 1024px) { .local-pillar-nav { display: none; } }

    /* HERO */
    .hero-container { padding: 8rem 2rem 4rem; max-width: 1600px; margin: 0 auto; display: grid; gap: 2rem; border-bottom: var(--border-raw); }
    @media (min-width: 1024px) {
      .hero-container { grid-template-columns: repeat(12, 1fr); align-items: end; padding: 10rem 4rem 6rem; }
      .hero-card { grid-column: 1 / 7; }
      .hero-img-wrapper { grid-column: 8 / 13; }
    }
    
    .hero-card { margin-bottom: 2rem; }
    .hero-title { font-weight: 900; font-size: clamp(3rem, 6vw, 6rem); text-transform: uppercase; line-height: 0.9; letter-spacing: -0.04em; margin-bottom: 1.5rem; color: var(--text-dark); }
    .hero-desc { font-weight: 700; font-size: 1.25rem; line-height: 1.5; color: var(--text-dark); border-top: 2px solid #111; padding-top: 1rem; }
    
    .hero-img-wrapper img { width: 100%; height: auto; border: var(--border-raw); display: block; box-shadow: 16px 16px 0px #111; }
    
    /* MANIFESTO / LOGO FARM */
    .manifesto { padding: 6rem 2rem; background: var(--text-dark); color: #fff; border-bottom: var(--border-raw); text-align: center; }
    .manifesto-inner { max-width: 1200px; margin: 0 auto; display: grid; gap: 4rem; }
    .manifesto h2 { font-weight: 900; font-size: clamp(2.5rem, 4vw, 4rem); text-transform: uppercase; line-height: 0.9; letter-spacing: -0.02em; }
    
    .logo-grid { display: flex; flex-wrap: wrap; justify-content: center; gap: 4rem; align-items: center; opacity: 0.7; }
    .logo-grid h3 { font-size: 1.5rem; font-weight: 900; letter-spacing: -0.02em; }
    
    /* Z-PATTERN BRUTALIST GRID */
    .services-container { padding: 6rem 2rem; max-width: 1600px; margin: 0 auto; display: flex; flex-direction: column; gap: 8rem; }
    
    .service-row { display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center; }
    
    @media (min-width: 1024px) {
      .services-container { padding: 8rem 4rem; gap: 12rem; }
      .service-row { grid-template-columns: repeat(12, 1fr); gap: 2rem; }
      
      .service-img { grid-column: 1 / 8; }
      .service-card { grid-column: 9 / 13; }
      
      .service-row:nth-child(even) .service-img { grid-column: 6 / 13; grid-row: 1; }
      .service-row:nth-child(even) .service-card { grid-column: 1 / 5; grid-row: 1; }
    }
    
    .service-img img { width: 100%; height: auto; display: block; border: var(--border-raw); box-shadow: 16px 16px 0px #111; }
    @media (min-width: 1024px) {
      .service-row:nth-child(even) .service-img img { box-shadow: -16px 16px 0px #111; }
    }
    
    .service-card { background: var(--bg-raw); display: flex; flex-direction: column; }
    
    .service-title { font-weight: 900; font-size: clamp(2.5rem, 4vw, 4rem); text-transform: uppercase; line-height: 0.9; letter-spacing: -0.05em; color: var(--text-dark); margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: var(--border-raw); }
    .service-desc { font-size: 1.15rem; line-height: 1.5; margin-bottom: 2rem; font-weight: 700; color: var(--text-dark); }
    
    .service-deliv { margin-bottom: 2.5rem; }
    .service-deliv ul { list-style: none; border-top: 2px solid #111; }
    .service-deliv li { padding: 1rem 0; border-bottom: 2px solid #111; font-weight: 900; text-transform: uppercase; font-size: 0.95rem; letter-spacing: -0.02em; display: flex; justify-content: space-between; color: var(--text-dark); }
    .service-deliv li::after { content: '+'; font-weight: 900; color: var(--accent); }
    
    .service-cta { display: block; width: 100%; padding: 1.5rem; text-align: center; border: var(--border-raw); background: var(--text-dark); color: #fff; font-weight: 900; font-size: 1.25rem; text-transform: uppercase; letter-spacing: -0.02em; text-decoration: none; transition: 0.1s; }
    .service-cta:active { transform: translateY(4px); box-shadow: none; }
    .service-cta:hover { background: var(--accent); box-shadow: 4px 4px 0px #111; }

    @media (max-width: 768px) {
      .service-img img { box-shadow: 8px 8px 0px #111; }
      .hero-img-wrapper img { box-shadow: 8px 8px 0px #111; }
    }
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
      <li><a href="#service-5" aria-label="Go to Service 5"></a></li>
    </ul>
  </nav>

  <!-- HERO -->
  <section class="hero-container">
    <div class="hero-card">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'Strong and<br>Authentic<br>Identity.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'A comprehensive range of services designed to humanize your brand and build profound trust with your clients and stakeholders. We document the reality of your corporate culture.' ); ?></p>
    </div>
    <div class="hero-img-wrapper">
      <img src="<?php echo esc_url( get_field('pillar_hero_img') ?: 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Corporate Brand Hero">
    </div>
  </section>

  <!-- MANIFESTO / LOGO FARM -->
  <section class="manifesto">
    <div class="manifesto-inner">
      <h2>Trusted by Corporate Leaders</h2>
      <div class="logo-grid">
        <h3>GOOGLE</h3>
        <h3>DELOITTE</h3>
        <h3>MCKINSEY</h3>
        <h3>SALESFORCE</h3>
        <h3>ORACLE</h3>
      </div>
    </div>
  </section>

  <!-- Z-PATTERN BRUTALIST GRID -->
  <section class="services-container">
    
    <!-- 01: EXECUTIVE HEADSHOTS -->
    <article class="service-row" id="service-1">
      <div class="service-img">
        <img src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1556157382-97eda2d62296?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Executive Headshots">
      </div>
      <div class="service-card">
        <h3 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec1_title') ?: 'Executive Headshots' ); ?></h3>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'Humanize the brand by showcasing team members with professional, authentic portraits designed for company websites and platforms like LinkedIn.' ); ?></p>
        <div class="service-deliv">
          <?php 
            $deliv_1 = get_field('pillar_sec1_deliverables') ?: "C-Suite Portraits\nLinkedIn Optimization\nStudio Backgrounds\nEnvironmental Portraits";
            $deliv_1_arr = array_filter(array_map('trim', explode("\n", $deliv_1)));
          ?>
          <ul>
            <?php foreach($deliv_1_arr as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <a href="#" class="service-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec1_cta_text') ?: 'Book Headshots' ); ?></a>
      </div>
    </article>

    <!-- 02: CULTURE & WORKSPACE -->
    <article class="service-row" id="service-2">
      <div class="service-img">
        <img src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Culture and Workspace">
      </div>
      <div class="service-card">
        <h3 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec2_title') ?: 'Culture & Workspace' ); ?></h3>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'Environmental and lifestyle portraits capturing staff in their natural workspace, effectively reflecting the company’s culture and operational environment.' ); ?></p>
        <div class="service-deliv">
          <?php 
            $deliv_2 = get_field('pillar_sec2_deliverables') ?: "Candid Operations\nTeam Interactions\nFacility Lifestyle\nBrand Authenticity";
            $deliv_2_arr = array_filter(array_map('trim', explode("\n", $deliv_2)));
          ?>
          <ul>
            <?php foreach($deliv_2_arr as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <a href="#" class="service-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec2_cta_text') ?: 'Book Culture Shoot' ); ?></a>
      </div>
    </article>

    <!-- 03: CORPORATE EVENTS -->
    <article class="service-row" id="service-3">
      <div class="service-img">
        <img src="<?php echo esc_url( get_field('pillar_sec3_img') ?: 'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Corporate Events">
      </div>
      <div class="service-card">
        <h3 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec3_title') ?: 'Corporate Events' ); ?></h3>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'Ensure that important moments from conferences, seminars, and product launches are professionally documented.' ); ?></p>
        <div class="service-deliv">
          <?php 
            $deliv_3 = get_field('pillar_sec3_deliverables') ?: "Keynote Speakers\nNetworking Candid\nAward Ceremonies\nSponsor Branding";
            $deliv_3_arr = array_filter(array_map('trim', explode("\n", $deliv_3)));
          ?>
          <ul>
            <?php foreach($deliv_3_arr as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <a href="#" class="service-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec3_cta_text') ?: 'Book Event Coverage' ); ?></a>
      </div>
    </article>

    <!-- 04: INFRASTRUCTURE -->
    <article class="service-row" id="service-4">
      <div class="service-img">
        <img src="<?php echo esc_url( get_field('pillar_sec4_img') ?: 'https://images.unsplash.com/photo-1531973576160-7125cd663d86?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Infrastructure">
      </div>
      <div class="service-card">
        <h3 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec4_title') ?: 'Infrastructure' ); ?></h3>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec4_desc') ?: 'Office and workplace photography highlighting the organization’s infrastructure and operational environment to build credibility.' ); ?></p>
        <div class="service-deliv">
          <?php 
            $deliv_4 = get_field('pillar_sec4_deliverables') ?: "Architectural Exteriors\nOffice Interiors\nIndustrial Facilities\nRetail Spaces";
            $deliv_4_arr = array_filter(array_map('trim', explode("\n", $deliv_4)));
          ?>
          <ul>
            <?php foreach($deliv_4_arr as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <a href="#" class="service-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec4_cta_text') ?: 'Book Infrastructure' ); ?></a>
      </div>
    </article>

    <!-- 05: PRODUCT & CINEMATIC -->
    <article class="service-row" id="service-5">
      <div class="service-img">
        <img src="<?php echo esc_url( get_field('pillar_sec5_img') ?: 'https://images.unsplash.com/photo-1637250067262-758c5b8fb18c?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Product and Cinematic">
      </div>
      <div class="service-card">
        <h3 class="service-title"><?php echo wp_kses_post( get_field('pillar_sec5_title') ?: 'Product Launches' ); ?></h3>
        <p class="service-desc"><?php echo wp_kses_post( get_field('pillar_sec5_desc') ?: 'High-quality product photography and cinematic profile videos tailored for marketing campaigns and investor relations.' ); ?></p>
        <div class="service-deliv">
          <?php 
            $deliv_5 = get_field('pillar_sec5_deliverables') ?: "Product Launches\nCorporate Documentaries\nBrand Anthem Videos\nE-Commerce Assets";
            $deliv_5_arr = array_filter(array_map('trim', explode("\n", $deliv_5)));
          ?>
          <ul>
            <?php foreach($deliv_5_arr as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <a href="#" class="service-cta" data-trigger="booking"><?php echo esc_html( get_field('pillar_sec5_cta_text') ?: 'Book Launch Shoot' ); ?></a>
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
