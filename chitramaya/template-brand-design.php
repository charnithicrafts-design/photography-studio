<?php
/**
 * Template Name: Pillar — Brand Design (Vibrant Brutalism)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brand Design — Chitramaya Creatives</title>
  <meta name="description" content="Brand design is a strategic process. We translate your mission and vision into tangible visual assets that define your identity across every touchpoint.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/brand-design')); ?>">
  <?php wp_head(); ?>
  <style>
    /* OVERFLOW PROTECTION */
    .brut-protect-overflow { overflow-wrap: break-word; word-wrap: break-word; hyphens: auto; max-width: 100vw; }

    /* HERO SECTION (Stark White / High Impact) */
    .brand-hero {
      position: relative;
      min-height: 100vh;
      width: 100vw;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 4rem 1.5rem;
      background-image: linear-gradient(to bottom, rgba(253,251,247,0.6) 0%, rgba(253,251,247,1) 100%), url('https://images.unsplash.com/photo-1654309184038-f9b689cfbdcb?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      color: #111111;
      border-bottom: 4px solid #111;
    }

    .brand-hero-content { position: relative; z-index: 2; max-width: 1400px; }
    
    .brand-hero-h1 { font-size: clamp(3rem, 10vw, 8rem); font-weight: 900; line-height: 0.95; text-transform: uppercase; letter-spacing: -0.04em; margin-bottom: 1.5rem; }
    .brand-hero-sub { font-size: var(--type-step-1); line-height: 1.5; color: #444; max-width: 800px; margin-bottom: 3rem; }

    @media (min-width: 992px) { .brand-hero { padding: 6rem 4rem; } }

    /* VIBRANT COLOR BLOCKS (Elegant Spacing) */
    .color-block { padding: 6rem 1.5rem; width: 100%; border-bottom: 4px solid #111; }
    @media (min-width: 992px) { .color-block { padding: 10rem 4rem; } }

    /* PILLAR 01: Core Identity */
    .block-identity { background-color: #ea580c; color: #111111; }
    
    /* PILLAR 02: Physical Presence */
    .block-physical { background-color: #A96F44; color: #FDFBF7; }
    
    /* PILLAR 03: Campaign & Distribution */
    .block-campaign { background-color: #FDFBF7; color: #111111; }

    .block-inner { display: grid; gap: 3rem; max-width: 1600px; margin: 0 auto; }
    @media (min-width: 992px) {
      .block-inner { grid-template-columns: 1fr 1fr; gap: 6rem; align-items: center; }
      /* Alternate Grid Direction */
      .block-physical .block-inner .block-text { order: 2; }
      .block-physical .block-inner .block-img-wrapper { order: 1; }
    }

    .block-img-wrapper { width: 100%; background: #111; overflow: hidden; border: 4px solid currentColor; }
    .block-img { width: 100%; height: auto; display: block; object-fit: contain; transition: transform 0.6s ease; }
    .block-img-wrapper:hover .block-img { transform: scale(1.02); }

    .block-text { display: flex; flex-direction: column; gap: 1.5rem; }
    
    .block-label { font-family: var(--font-mono, monospace); font-size: var(--type-step-4); font-weight: 900; line-height: 1; opacity: 0.2; }
    .block-header { font-size: var(--type-step-4); font-weight: 900; text-transform: uppercase; letter-spacing: -0.03em; line-height: 1; margin-bottom: 1rem; }
    .block-copy { font-size: var(--type-step-1); line-height: 1.6; max-width: 600px; font-weight: 600; margin-bottom: 2rem; }

    .deliverables-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0; }
    .deliverable { font-size: var(--type-step-1); font-weight: 900; text-transform: uppercase; letter-spacing: -0.02em; padding: 1rem 0; border-bottom: 2px solid currentColor; }
    .deliverable:first-child { border-top: 2px solid currentColor; }
    .deliverable::before { content: '→'; display: inline-block; margin-right: 1.5rem; }

    /* GLOBAL CTA */
    .global-cta { padding: 8rem 1.5rem; text-align: center; background: #111; color: #FDFBF7; }
    .global-cta-title { font-size: var(--type-step-4); font-weight: 900; text-transform: uppercase; letter-spacing: -0.04em; margin-bottom: 1.5rem; }
    .global-cta-sub { font-size: var(--type-step-1); max-width: 600px; margin: 0 auto 3rem; color: rgba(253,251,247,0.8); line-height: 1.6; }
    .brut-btn-light { display: inline-block; padding: 1.5rem 4rem; font-size: var(--type-step-0); font-weight: 900; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border: 2px solid #FDFBF7; background: transparent; color: #FDFBF7; transition: all 0.3s; }
    .brut-btn-light:hover { background: #FDFBF7; color: #111; }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- HERO SECTION -->
  <section class="brand-hero">
    <div class="brand-hero-content">
      <h1 class="brand-hero-h1 brut-protect-overflow">Architecting<br>Core Values.</h1>
      <p class="brand-hero-sub brut-protect-overflow">Brand design is a strategic process. We translate your mission and vision into tangible visual assets that define your identity across every touchpoint.</p>
    </div>
  </section>

  <!-- 01 CORE IDENTITY (ORANGE) -->
  <section class="color-block block-identity" id="identity">
    <div class="block-inner">
      <div class="block-text">
        <div class="block-label">01</div>
        <h2 class="block-header brut-protect-overflow">Core Identity</h2>
        <p class="block-copy">Developing visual elements that define your company’s identity and communicate its core values.</p>
        <ul class="deliverables-list">
          <li class="deliverable">Logo Design</li>
          <li class="deliverable">Brand Identity</li>
          <li class="deliverable">Brand Guidelines</li>
        </ul>
      </div>
      <div class="block-img-wrapper">
        <img src="https://images.unsplash.com/photo-1508599589920-14cfa1c1fe4d?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600" alt="Brand Identity" class="block-img">
      </div>
    </div>
  </section>

  <!-- 02 PHYSICAL PRESENCE (CAMEL) -->
  <section class="color-block block-physical" id="physical">
    <div class="block-inner">
      <div class="block-text">
        <div class="block-label">02</div>
        <h2 class="block-header brut-protect-overflow">Physical Presence</h2>
        <p class="block-copy">Translating your mission into tangible assets that create a lasting physical impression.</p>
        <ul class="deliverables-list">
          <li class="deliverable">Product Design</li>
          <li class="deliverable">Installations Design</li>
        </ul>
      </div>
      <div class="block-img-wrapper">
        <img src="https://images.unsplash.com/photo-1574367157590-3454fe866961?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600" alt="Physical Presence" class="block-img">
      </div>
    </div>
  </section>

  <!-- 03 CAMPAIGN & DISTRIBUTION (WHITE) -->
  <section class="color-block block-campaign" id="campaign">
    <div class="block-inner">
      <div class="block-text">
        <div class="block-label">03</div>
        <h2 class="block-header brut-protect-overflow">Campaign & Distribution</h2>
        <p class="block-copy">Consistently applying your visual appeal across platforms to build trust and reinforce positioning.</p>
        <ul class="deliverables-list">
          <li class="deliverable">Marketing Collaterals</li>
          <li class="deliverable">Illustrative Posters</li>
          <li class="deliverable">OOH Campaign Design</li>
        </ul>
      </div>
      <div class="block-img-wrapper">
        <img src="https://images.unsplash.com/photo-1636247498175-d2a8d052c2b0?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600" alt="Campaign Distribution" class="block-img">
      </div>
    </div>
  </section>

  <!-- FINAL CTA (BLACK) -->
  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Consistency Builds Trust.</h2>
    <p class="global-cta-sub">A well-executed brand design enhances visual appeal, reinforces positioning, and creates a lasting impression in the minds of your audience.</p>
    <a href="#book" class="brut-btn-light" data-trigger="booking">Start a Project</a>
  </section>

<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
