<?php
/**
 * Template Name: Pillar — Commercial (Lookbook Grid)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Commercial Photography — Chitramaya</title>
  <meta name="description" content="Commercial photography focuses on creating impactful visuals for business use, with the primary goal of selling, promoting, or marketing products, services, and brands.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/commercial')); ?>">
  <?php wp_head(); ?>
  <style>
    :root {
      --color-dark: #0a0a0a;
      --color-accent: #A96F44;
    }
    
    /* OVERFLOW PROTECTION FOR MOBILE */
    .brut-protect-overflow {
      overflow-wrap: break-word;
      word-wrap: break-word;
      hyphens: auto;
      max-width: 100vw;
    }

    /* HERO SECTION BEST PRACTICES (Cinematic Full-Bleed) */
    .corp-hero {
      position: relative;
      min-height: 100vh;
      width: 100vw;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 4rem 1.5rem;
      background-image: linear-gradient(to bottom, rgba(10,17,40,0.3) 0%, rgba(10,17,40,0.95) 100%), url('https://unsplash.com/photos/_QL_w3kTg1U/download?w=2400');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .corp-hero-content {
      position: relative;
      z-index: 2;
      max-width: 1200px;
    }

    .corp-hero-h1 {
      font-size: var(--type-step-5);
      font-weight: 900;
      line-height: 0.95;
      text-transform: uppercase;
      letter-spacing: -0.04em;
      margin-bottom: 1.5rem;
      color: var(--color-light);
    }

    .corp-hero-sub {
      font-size: var(--type-step-1);
      line-height: 1.5;
      color: rgba(255, 255, 255, 0.9);
      max-width: 700px;
      margin-bottom: 3rem;
    }

    @media (min-width: 992px) {
      .corp-hero {
        padding: 6rem 4rem;
      }
    }

    /* BRUTALIST ASYMMETRICAL LOOKBOOK */
    .lookbook-container {
      padding: 6rem 1.5rem;
      max-width: 1600px;
      margin: 0 auto;
    }
    
    .lookbook-section {
      display: flex;
      flex-direction: column;
      gap: 3rem;
      margin-bottom: 8rem;
    }
    .lookbook-section:last-child {
      margin-bottom: 0;
    }

    .lookbook-img-wrapper {
      width: 100%;
      background: var(--color-dark);
      overflow: hidden;
    }

    .lookbook-img {
      width: 100%;
      height: auto;
      display: block;
      filter: grayscale(15%) contrast(1.1);
      transition: transform 0.8s ease, filter 0.8s ease;
    }
    .lookbook-img-wrapper:hover .lookbook-img {
      transform: scale(1.03);
      filter: grayscale(0%) contrast(1);
    }

    .lookbook-content {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .lookbook-number {
      font-family: var(--font-mono, monospace);
      font-size: var(--type-step-5);
      font-weight: 900;
      color: var(--color-accent);
      opacity: 0.8;
      line-height: 0.8;
      letter-spacing: -0.05em;
    }

    .lookbook-header {
      font-size: var(--type-step-3);
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: -0.03em;
      line-height: 1;
      color: var(--color-dark);
      margin-bottom: 1rem;
    }

    .lookbook-copy {
      font-size: var(--type-step-0);
      line-height: 1.6;
      color: #333;
      margin-bottom: 2rem;
      max-width: 600px;
    }

    .lookbook-deliverables {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      border-left: 4px solid var(--color-accent);
      padding-left: 1.5rem;
    }
    .lookbook-deliverables span {
      font-size: var(--type-step-1);
      font-weight: 700;
      letter-spacing: -0.01em;
      color: var(--color-dark);
      line-height: 1.2;
    }

    /* DESKTOP ASYMMETRICAL GRID */
    @media (min-width: 992px) {
      .lookbook-container {
        padding: 10rem 4rem;
      }
      .lookbook-section {
        display: grid;
        grid-template-columns: 7fr 4fr;
        gap: 6rem;
        align-items: center;
        margin-bottom: 12rem;
      }

      /* Pillar Odd: Image Left, Text Right */
      .lookbook-section:nth-child(odd) {
        grid-template-columns: 7fr 4fr;
      }

      /* Pillar Even: Text Left, Image Right */
      .lookbook-section:nth-child(even) {
        grid-template-columns: 4fr 7fr;
        gap: 8rem;
      }
      .lookbook-section:nth-child(even) .lookbook-img-wrapper {
        order: 2;
      }
      .lookbook-section:nth-child(even) .lookbook-content {
        order: 1;
      }
    }

    .brut-impact { padding: 8rem 1.5rem; max-width: 1400px; margin: 0 auto; border-top: 2px solid var(--text-dark); border-bottom: 2px solid var(--text-dark); }
    .brut-impact-title { font-size: var(--type-step-4); font-weight: 900; text-transform: uppercase; letter-spacing: -0.04em; text-align: center; margin-bottom: 6rem; line-height: 1; }
    .brut-impact-grid { display: grid; grid-template-columns: 1fr; gap: 4rem; }
    @media (min-width: 992px) { .brut-impact-grid { grid-template-columns: repeat(3, 1fr); } }
    .impact-card { display: flex; flex-direction: column; gap: 1rem; }
    .impact-num { font-size: var(--type-step-5); font-weight: 900; color: var(--color-accent); opacity: 0.9; line-height: 0.8; margin-bottom: 1rem; }
    .impact-header { font-size: var(--type-step-2); font-weight: 900; text-transform: uppercase; letter-spacing: -0.03em; }
    .impact-desc { font-size: var(--type-step-0); line-height: 1.6; color: #333; }

    .brut-pipeline { padding: 8rem 1.5rem; text-align: center; background: var(--color-light); }
    .brut-pipeline-title { font-size: var(--type-step-4); font-weight: 900; text-transform: uppercase; letter-spacing: -0.04em; margin-bottom: 2rem; }
    .brut-pipeline-desc { font-size: var(--type-step-1); max-width: 600px; margin: 0 auto 4rem; color: #333; line-height: 1.5; }

    /* GLOBAL CTA */
    .global-cta { padding: 8rem 1.5rem; text-align: center; background: var(--color-dark); color: var(--color-light); }
    .global-cta-title { font-size: var(--type-step-4); font-weight: 900; text-transform: uppercase; letter-spacing: -0.04em; margin-bottom: 3rem; }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- HERO SECTION WITH BEST PRACTICES -->
  <section class="corp-hero">
    <div class="corp-hero-content">
      <h1 class="corp-hero-h1 brut-protect-overflow">Commercial.</h1>
      <p class="corp-hero-sub brut-protect-overflow">Commercial photography focuses on creating impactful visuals for business use, with the primary goal of selling, promoting, or marketing products, services, and brands.</p>
      <div>
        <a href="#book" class="brut-btn" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border-color:var(--color-accent);">Commission a Project</a>
      </div>
    </div>
  </section>

  <div class="lookbook-container">
    <!-- 01 // OOH & E-COMMERCE -->
    <article class="lookbook-section" id="service-1">
      <div class="lookbook-img-wrapper">
        <img src="https://unsplash.com/photos/gqMGjomMxCw/download?w=1600" alt="OOH & E-Commerce" class="lookbook-img">
      </div>
      <div class="lookbook-content">
        <div class="lookbook-number">01</div>
        <h2 class="lookbook-header brut-protect-overflow">OOH &<br>E-Commerce</h2>
        <p class="lookbook-copy">Purpose-driven visuals engineered to influence perception across billboards and digital catalogs.</p>
        <div class="lookbook-deliverables brut-protect-overflow">
          <span>OOH marketing collaterals</span>
          <span>E-commerce website catalogue pictures</span>
          <span>Product photography</span>
        </div>
      </div>
    </article>

    <!-- 02 // FOOD & LIFESTYLE -->
    <article class="lookbook-section" id="service-2">
      <div class="lookbook-img-wrapper">
        <img src="https://unsplash.com/photos/mkm_Qkke2No/download?w=1600" alt="Food & Lifestyle" class="lookbook-img">
      </div>
      <div class="lookbook-content">
        <div class="lookbook-number">02</div>
        <h2 class="lookbook-header brut-protect-overflow">Food &<br>Lifestyle</h2>
        <p class="lookbook-copy">Showcasing products in authentic, real-life scenarios that drive immediate consumer desire.</p>
        <div class="lookbook-deliverables brut-protect-overflow">
          <span>Food photography</span>
          <span>Lifestyle photography</span>
        </div>
      </div>
    </article>

    <!-- 03 // ARCHITECTURE & SPATIAL -->
    <article class="lookbook-section" id="service-3">
      <div class="lookbook-img-wrapper">
        <img src="https://unsplash.com/photos/2d4lAQAlbDA/download?w=1600" alt="Architecture & Spatial" class="lookbook-img">
      </div>
      <div class="lookbook-content">
        <div class="lookbook-number">03</div>
        <h2 class="lookbook-header brut-protect-overflow">Architecture<br>& Spatial</h2>
        <p class="lookbook-copy">Capturing scale and progress, from pristine architectural forms to civil construction timelapses.</p>
        <div class="lookbook-deliverables brut-protect-overflow">
          <span>Architecture photography</span>
          <span>Civil construction timelapse</span>
          <span>Cinematic walkthrough & 360</span>
        </div>
      </div>
    </article>

    <!-- 04 // FASHION, PR & CAMPAIGNS -->
    <article class="lookbook-section" id="service-4">
      <div class="lookbook-img-wrapper">
        <img src="https://unsplash.com/photos/aHcQk7dqVrI/download?w=1600" alt="Fashion, PR & Campaigns" class="lookbook-img">
      </div>
      <div class="lookbook-content">
        <div class="lookbook-number">04</div>
        <h2 class="lookbook-header brut-protect-overflow">Fashion &<br>Campaigns</h2>
        <p class="lookbook-copy">High-end visual storytelling tailored for magazines, social campaigns, and personal branding.</p>
        <div class="lookbook-deliverables brut-protect-overflow">
          <span>Fashion photography</span>
          <span>Personal branding</span>
          <span>Social media campaigns</span>
          <span>PR campaigns</span>
          <span>Content Creation</span>
        </div>
      </div>
    </article>
  </div>

  <!-- IMPACT OF PROFESSIONAL ASSETS -->
  <section class="brut-impact">
    <h2 class="brut-impact-title brut-protect-overflow">Purpose-Driven Influence</h2>
    <div class="brut-impact-grid">
      <div class="impact-card">
        <span class="impact-num">01</span>
        <h3 class="impact-header">Conversion</h3>
        <p class="impact-desc">High-impact visuals scientifically designed to capture attention and accelerate the path to purchase.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">02</span>
        <h3 class="impact-header">Velocity</h3>
        <p class="impact-desc">Fast, scalable content pipelines delivering campaign-ready assets at the speed of modern retail.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">03</span>
        <h3 class="impact-header">Aesthetics</h3>
        <p class="impact-desc">Uncompromising artistic direction that elevates your product above the noise of a saturated market.</p>
      </div>
    </div>
  </section>

  <!-- HOW WE WORK -->
  <section class="brut-pipeline">
    <h2 class="brut-pipeline-title brut-protect-overflow">The Production Pipeline</h2>
    <p class="brut-pipeline-desc">From initial art direction and moodboarding to final high-end post-production, our rigorous pipeline ensures your creative brief is executed flawlessly.</p>
    <a href="#pipeline" class="brut-btn" style="background:var(--color-accent); color:var(--color-dark); border-color:var(--color-accent);">Explore Our Pipeline</a>
  </section>

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Ready to Drive Engagement?</h2>
    <a href="#book" class="brut-btn" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border-color:var(--color-accent);">Commission a Project</a>
  </section>

<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
