<?php
/**
 * Template Name: Pillar — Corporate Brand (No-Photo Brutalist)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brand & Corporate Photography — Chithramaya</title>
  <meta name="description" content="Visual authority engineered for B2B. Zero friction. Absolute precision.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/corporate-brand')); ?>">
  <?php wp_head(); ?>
  <style>
    /* OVERFLOW PROTECTION FOR MOBILE */
    .brut-protect-overflow { overflow-wrap: break-word; word-wrap: break-word; hyphens: auto; max-width: 100vw; }

    /* NO-PHOTO HERO SECTION (SPLIT COMPOSITION) */
    .corp-hero {
      position: relative; min-height: 80vh; width: 100vw; display: flex; flex-direction: column; justify-content: center;
      padding: 8rem 1.5rem 6rem; background: var(--color-light); color: var(--color-dark); border-bottom: 2px solid var(--color-dark);
    }
    .corp-hero-content { 
      position: relative; z-index: 2; width: 100%; max-width: 1600px; margin: 0 auto;
      display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-end; gap: 4rem;
    }
    .corp-hero-h1 { 
      font-size: clamp(3rem, 9vw, 9rem); font-family: var(--font-sans, 'Inter', sans-serif); 
      font-weight: 900; line-height: 0.85; text-transform: uppercase; letter-spacing: -0.04em; color: inherit; margin: 0; word-break: normal;
    }
    .corp-hero-meta { max-width: 450px; text-align: left; }
    .corp-hero-sub { font-size: var(--type-step-1); font-family: var(--font-sans, 'Inter', sans-serif); font-weight: 500; line-height: 1.5; color: var(--color-dark); opacity: 0.8; margin-bottom: 3rem; }
    
    @media (min-width: 992px) { .corp-hero { padding: 10rem 4rem 6rem; } }

    /* BRUTALIST SERVICES ACCORDION GRID */
    .services-wrapper { padding: 8rem 1.5rem; max-width: 1600px; margin: 0 auto; background: var(--color-light); color: var(--color-dark); }
    .services-grid { display: grid; gap: 4rem; }
    @media (min-width: 992px) { .services-grid { grid-template-columns: 1fr 2fr; gap: 8rem; align-items: start; } }

    /* Left Column */
    .services-intro-title { font-size: var(--type-step-3); font-family: var(--font-serif, 'Cormorant Garamond', serif); font-weight: 400; text-transform: uppercase; margin-bottom: 2rem; border-bottom: 2px solid var(--color-dark); padding-bottom: 0.5rem; }
    .services-intro-text { font-size: var(--type-step-0); font-family: var(--font-sans, 'Inter', sans-serif); font-weight: 500; line-height: 1.6; color: var(--color-dark); margin-bottom: 2rem; }

    /* Right Column (Accordion) */
    .b-accordion { border-top: 2px solid var(--color-dark); }
    .b-accordion-group { border-bottom: 2px solid var(--color-dark); }
    .b-accordion-btn { 
      width: 100%; background: transparent; border: none; padding: 2rem 0; display: flex; justify-content: space-between; align-items: center; cursor: pointer; 
      font-size: clamp(1.25rem, 3vw, 2.5rem); font-family: var(--font-sans, 'Inter', sans-serif); font-weight: 700; text-transform: uppercase; letter-spacing: -0.02em; color: var(--color-dark); transition: color 0.2s; 
    }
    .b-accordion-btn:hover { color: var(--color-accent); }
    .b-accordion-btn[aria-expanded="true"] { color: var(--color-accent); }
    .b-accordion-num { font-weight: 400; opacity: 1; margin-right: 1.5rem; color: var(--color-accent); font-family: var(--font-sans); }
    .b-accordion-icon { font-size: 2rem; font-weight: 300; transition: transform 0.3s ease; }
    .b-accordion-btn[aria-expanded="true"] .b-accordion-icon { transform: rotate(45deg); }

    .b-accordion-panel { display: none; padding: 0 0 2.5rem 0; overflow: hidden; }
    .b-accordion-btn[aria-expanded="true"] + .b-accordion-panel { display: block; animation: slideDown 0.3s ease forwards; }
    @keyframes slideDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }

    .b-accordion-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem; }
    .b-accordion-list li { font-size: var(--type-step-1); font-family: var(--font-sans, 'Inter', sans-serif); font-weight: 500; color: var(--color-dark); opacity: 0.9; border-left: 2px solid var(--color-accent); padding-left: 1.5rem; }

    /* BRUTALIST MARKETING BLOCKS */
    .brut-marquee { padding: 4rem 1.5rem; background: var(--color-dark); color: var(--color-light); text-align: center; overflow: hidden; }
    .brut-marquee-title { font-size: 1rem; font-family: var(--font-sans); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; opacity: 0.5; margin-bottom: 3rem; }
    .brut-marquee-logos { display: flex; flex-wrap: wrap; justify-content: center; gap: 3rem; align-items: center; }
    .brut-marquee-logos span { font-size: clamp(2rem, 4vw, 4rem); font-family: var(--font-sans); font-weight: 900; letter-spacing: -0.03em; text-transform: uppercase; }

    .brut-impact { padding: 8rem 1.5rem; max-width: 1600px; margin: 0 auto; border-top: 2px solid var(--color-dark); border-bottom: 2px solid var(--color-dark); background: var(--color-light); }
    .brut-impact-title { font-size: clamp(2rem, 5vw, 5rem); font-family: var(--font-sans); font-weight: 900; text-transform: uppercase; letter-spacing: -0.04em; text-align: center; margin-bottom: 6rem; line-height: 1; color: var(--color-dark); }
    .brut-impact-grid { display: grid; grid-template-columns: 1fr; gap: 4rem; }
    @media (min-width: 992px) { .brut-impact-grid { grid-template-columns: repeat(3, 1fr); } }
    .impact-card { display: flex; flex-direction: column; gap: 1rem; padding: 2rem; border: 2px solid var(--color-dark); }
    .impact-num { font-size: var(--type-step-5); font-family: var(--font-sans); font-weight: 900; color: var(--color-accent); line-height: 0.8; margin-bottom: 1rem; }
    .impact-header { font-size: var(--type-step-2); font-family: var(--font-sans); font-weight: 900; letter-spacing: -0.02em; text-transform: uppercase; color: var(--color-dark); }
    .impact-desc { font-size: 1.1rem; font-family: var(--font-sans); line-height: 1.6; color: var(--color-dark); opacity: 0.8; }

    /* GLOBAL CTA */
    .global-cta { padding: 10rem 1.5rem; text-align: center; background: var(--color-dark); color: var(--color-light); }
    .global-cta-title { font-size: clamp(3rem, 8vw, 6rem); font-family: var(--font-sans); font-weight: 900; letter-spacing: -0.04em; text-transform: uppercase; margin-bottom: 4rem; }
  </style>
</head>
<body style="background: var(--color-light); color: var(--color-dark);">
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- HERO SECTION WITH NO PHOTOS -->
  <section class="corp-hero">
    <div class="corp-hero-content">
      <h1 class="corp-hero-h1">Brand &<br>Corporate</h1>
      
      <div class="corp-hero-meta">
        <p class="corp-hero-sub brut-protect-overflow">Visual authority engineered for B2B. Zero friction. Absolute precision.</p>
        <a href="#book" class="brut-btn" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border: 2px solid var(--color-accent);">Commission a Project</a>
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

  <!-- NO-PHOTO SERVICES ACCORDION -->
  <section class="services-wrapper">
    <div class="services-grid">
      
      <div class="services-left">
        <h2 class="services-intro-title">SERVICES —</h2>
        <p class="services-intro-text">Your first impression is your only impression.</p>
        <p class="services-intro-text">We arm your executive and marketing teams with assets that demand respect and close deals.</p>
      </div>

      <div class="services-right">
        <div class="b-accordion">
          
          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">01</span> Executive Portraits</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Executive headshots</li>
                <li>Website photography</li>
                <li>Team photography</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">02</span> Environmental Portraits</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Company lifestyle pictures</li>
                <li>Corporate video</li>
                <li>Company profile video</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">03</span> Product & Cinematic</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Product photography</li>
                <li>Brand Ads / videos</li>
                <li>TVC</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">04</span> Event Coverage</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Corporate events</li>
                <li>Marketing events</li>
                <li>Seminars</li>
                <li>Conferences</li>
                <li>Product launches</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">05</span> Workplace & Infra</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <ul class="b-accordion-list">
                <li>Infrastructure</li>
                <li>Ambiance</li>
                <li>Operational environment</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

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

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Ready to Humanize Your Brand?</h2>
    <a href="#book" class="brut-btn" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border: 2px solid var(--color-accent);">Commission a Project</a>
  </section>

<script>
  // Simple Vanilla JS for the Brutalist Services Accordion
  document.addEventListener('DOMContentLoaded', () => {
    const accordions = document.querySelectorAll('.b-accordion-btn');
    accordions.forEach(btn => {
      btn.addEventListener('click', () => {
        const isExpanded = btn.getAttribute('aria-expanded') === 'true';
        // Optional: close all others
        // accordions.forEach(b => b.setAttribute('aria-expanded', 'false'));
        btn.setAttribute('aria-expanded', !isExpanded);
      });
    });
  });
</script>

<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
