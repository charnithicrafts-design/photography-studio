<?php
/**
 * Template Name: Pillar — Corporate Brand (Editorial Scroll)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brand & Corporate Photography — Chitramaya</title>
  <meta name="description" content="A comprehensive range of services offered to help businesses present a strong and authentic visual identity.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/corporate-brand')); ?>">
  <?php wp_head(); ?>
  <style>
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
      background-image: linear-gradient(to bottom, rgba(10,17,40,0.3) 0%, rgba(10,17,40,0.95) 100%), url('https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=2400&q=80');
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

    /* EDITORIAL SCROLL FRAMEWORK */
    .editorial-section { padding: 6rem 1.5rem; max-width: 1400px; margin: 0 auto; border-bottom: 2px solid var(--text-dark); }
    .editorial-section:last-of-type { border-bottom: none; }

    @media (min-width: 768px) {
      .editorial-section { padding: 8rem 3rem; }
    }

    .editorial-img-wrapper { width: 100%; aspect-ratio: 16/9; overflow: hidden; margin-bottom: 4rem; background: #000; }
    .editorial-img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(15%) contrast(1.1); transition: transform 0.8s ease, filter 0.8s ease; }
    .editorial-img-wrapper:hover .editorial-img { transform: scale(1.02); filter: grayscale(0%) contrast(1); }

    .editorial-content { display: grid; gap: 3rem; }
    @media (min-width: 1024px) {
      .editorial-content { grid-template-columns: 1fr 1fr; gap: 4rem; align-items: start; }
    }

    .editorial-text-col { max-width: 800px; }

    .editorial-header {
      font-size: var(--type-step-4);
      font-weight: 900;
      letter-spacing: -0.04em;
      margin-bottom: 1.5rem;
      text-transform: uppercase;
      line-height: 0.95;
      color: var(--color-dark);
    }

    .editorial-copy {
      font-size: var(--type-step-0);
      font-weight: 400;
      line-height: 1.6;
      color: #333;
    }

    .editorial-deliverables { display: flex; flex-direction: column; gap: 0.5rem; }
    .editorial-deliverables span {
      font-size: var(--type-step-1);
      font-weight: 700;
      letter-spacing: -0.01em;
      color: var(--color-dark);
      line-height: 1.2;
      text-transform: capitalize;
    }

    /* BRUTALIST MARKETING BLOCKS */
    .brut-marquee { padding: 4rem 1.5rem; background: var(--color-dark); color: var(--color-light); text-align: center; overflow: hidden; }
    .brut-marquee-title { font-size: 1rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; opacity: 0.5; margin-bottom: 3rem; }
    .brut-marquee-logos { display: flex; flex-wrap: wrap; justify-content: center; gap: 3rem; align-items: center; }
    .brut-marquee-logos span { font-size: clamp(2rem, 4vw, 4rem); font-weight: 900; letter-spacing: -0.05em; text-transform: uppercase; }

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

    @media (max-width: 768px) {
      .editorial-img-wrapper { aspect-ratio: 4/3; margin-bottom: 2rem; }
    }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- HERO SECTION WITH BEST PRACTICES -->
  <section class="corp-hero">
    <div class="corp-hero-content">
      <h1 class="corp-hero-h1 brut-protect-overflow">Brand &<br>Corporate</h1>
      <p class="corp-hero-sub brut-protect-overflow">A comprehensive range of services offered to help businesses present a strong and authentic visual identity.</p>
      <div>
        <a href="#book" class="brut-btn" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border-color:var(--color-accent);">Commission a Project</a>
      </div>
    </div>
  </section>

  <!-- TRUSTED BY (BRUTALIST MARQUEE) -->
  <section class="brut-marquee">
    <div class="brut-marquee-title">Trusted By Corporate Leaders</div>
    <div class="brut-marquee-logos">
      <span>Google</span>
      <span>Deloitte</span>
      <span>McKinsey</span>
      <span>Salesforce</span>
      <span>Oracle</span>
    </div>
  </section>

  <!-- 01 // EXECUTIVE PORTRAITS -->
  <article class="editorial-section" id="service-1">
    <div class="editorial-img-wrapper">
      <img src="https://images.unsplash.com/photo-1742981365879-7ad5b7e7e4ce?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600" alt="Executive Portrait" class="editorial-img">
    </div>
    <div class="editorial-content">
      <div class="editorial-text-col">
        <h2 class="editorial-header brut-protect-overflow">01 // Executive Portraits</h2>
        <p class="editorial-copy">Designed to humanize the brand by showcasing team members on company websites and platforms like LinkedIn.</p>
      </div>
      <div class="editorial-deliverables brut-protect-overflow">
        <span>Executive headshots</span>
        <span>Website photography</span>
        <span>Team photography</span>
      </div>
    </div>
  </article>

  <!-- 02 // ENVIRONMENTAL PORTRAITS -->
  <article class="editorial-section" id="service-2">
    <div class="editorial-img-wrapper">
      <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1600&q=80" alt="Environmental Portrait" class="editorial-img">
    </div>
    <div class="editorial-content">
      <div class="editorial-text-col">
        <h2 class="editorial-header brut-protect-overflow">02 // Environmental Portraits</h2>
        <p class="editorial-copy">Capturing staff in their natural workspace or in action, effectively reflecting the company’s culture and work environment.</p>
      </div>
      <div class="editorial-deliverables brut-protect-overflow">
        <span>Company lifestyle pictures</span>
        <span>Corporate video</span>
        <span>Company profile video</span>
      </div>
    </div>
  </article>

  <!-- 03 // PRODUCT & CINEMATIC -->
  <article class="editorial-section" id="service-3">
    <div class="editorial-img-wrapper">
      <img src="https://images.unsplash.com/photo-1637250067262-758c5b8fb18c?auto=format&fit=crop&w=1600&q=80" alt="Product Photography" class="editorial-img">
    </div>
    <div class="editorial-content">
      <div class="editorial-text-col">
        <h2 class="editorial-header brut-protect-overflow">03 // Product & Cinematic</h2>
        <p class="editorial-copy">Delivering high-quality images and video tailored for marketing campaigns and e-commerce platforms.</p>
      </div>
      <div class="editorial-deliverables brut-protect-overflow">
        <span>Product photography</span>
        <span>Brand Ads / videos</span>
        <span>TVC</span>
      </div>
    </div>
  </article>

  <!-- 04 // CORPORATE EVENTS -->
  <article class="editorial-section" id="service-4">
    <div class="editorial-img-wrapper">
      <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?auto=format&fit=crop&w=1600&q=80" alt="Corporate Event Coverage" class="editorial-img">
    </div>
    <div class="editorial-content">
      <div class="editorial-text-col">
        <h2 class="editorial-header brut-protect-overflow">04 // Event Coverage</h2>
        <p class="editorial-copy">Ensuring that important moments from conferences, seminars, and product launches are professionally documented.</p>
      </div>
      <div class="editorial-deliverables brut-protect-overflow">
        <span>Corporate events</span>
        <span>Marketing events</span>
        <span>Seminars</span>
        <span>Conferences</span>
        <span>Product launches</span>
      </div>
    </div>
  </article>

  <!-- 05 // OFFICE & WORKPLACE -->
  <article class="editorial-section" id="service-5">
    <div class="editorial-img-wrapper">
      <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1600&q=80" alt="Office Infrastructure" class="editorial-img">
    </div>
    <div class="editorial-content">
      <div class="editorial-text-col">
        <h2 class="editorial-header brut-protect-overflow">05 // Workplace</h2>
        <p class="editorial-copy">Highlighting the organization’s infrastructure, ambiance, and operational environment, helping build trust and credibility.</p>
      </div>
      <div class="editorial-deliverables brut-protect-overflow">
        <span>Infrastructure</span>
        <span>Ambiance</span>
        <span>Operational environment</span>
      </div>
    </div>
  </article>

  <!-- IMPACT OF PROFESSIONAL ASSETS -->
  <section class="brut-impact">
    <h2 class="brut-impact-title brut-protect-overflow">The Impact of Professional Assets</h2>
    <div class="brut-impact-grid">
      <div class="impact-card">
        <span class="impact-num">01</span>
        <h3 class="impact-header">Consistency</h3>
        <p class="impact-desc">Maintain a cohesive, professional image across all channels and locations. Build visual trust with unwavering consistency.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">02</span>
        <h3 class="impact-header">Speed</h3>
        <p class="impact-desc">Fast turnarounds meeting demanding corporate timelines. Deliver assets quickly without compromising visual excellence.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">03</span>
        <h3 class="impact-header">Quality</h3>
        <p class="impact-desc">High-definition, professional photography capturing authenticity and professionalism. Premium assets for high-stakes business.</p>
      </div>
    </div>
  </section>

  <!-- HOW WE WORK -->
  <section class="brut-pipeline">
    <h2 class="brut-pipeline-title brut-protect-overflow">How We Work</h2>
    <p class="brut-pipeline-desc">From initial consultation to final delivery, our comprehensive pipeline ensures transparency and builds trust every step of the way.</p>
    <a href="#pipeline" class="brut-btn" style="background:var(--color-accent); color:var(--color-dark); border-color:var(--color-accent);">Explore Our Pipeline</a>
  </section>

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Ready to Humanize Your Brand?</h2>
    <a href="#book" class="brut-btn" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border-color:var(--color-accent);">Commission a Project</a>
  </section>

<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
