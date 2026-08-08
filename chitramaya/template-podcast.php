<?php
/**
 * Template Name: Pillar — Podcast & Interview (Brutalist)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Podcast & Interview — Chithramaya</title>
  <meta name="description" content="A comprehensive content creation environment combining pristine audio, cinematic multi-camera visuals, and cohesive branding.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/podcast-interview')); ?>">
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

    .b-accordion-desc { font-size: 1.1rem; font-family: var(--font-sans); line-height: 1.6; color: var(--color-dark); opacity: 0.9; margin-bottom: 1.5rem; font-weight: 500; max-width: 600px; }
    .b-accordion-list { list-style: none; padding: 0; margin: 0; display: grid; gap: 1rem; }
    @media (min-width: 768px) { .b-accordion-list { grid-template-columns: 1fr 1fr; } }
    .b-accordion-list li { font-size: var(--type-step-1); font-family: var(--font-sans, 'Inter', sans-serif); font-weight: 500; color: var(--color-dark); opacity: 0.9; border-left: 2px solid var(--color-accent); padding-left: 1.5rem; }

    /* IMPACT SECTION */
    .brut-impact { padding: 8rem 1.5rem; max-width: 1600px; margin: 0 auto; border-top: 2px solid var(--color-dark); border-bottom: 2px solid var(--color-dark); background: var(--color-light); }
    .brut-impact-title { font-size: clamp(2rem, 5vw, 5rem); font-family: var(--font-sans); font-weight: 900; text-transform: uppercase; letter-spacing: -0.04em; text-align: center; margin: 0 auto 6rem auto; max-width: 1200px; line-height: 1; color: var(--color-dark); }
    .brut-impact-grid { display: grid; grid-template-columns: 1fr; gap: 4rem; max-width: 1200px; margin: 0 auto; }
    @media (min-width: 992px) { .brut-impact-grid { grid-template-columns: repeat(3, 1fr); } }
    .impact-card { display: flex; flex-direction: column; gap: 1rem; }
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

  <!-- HERO SECTION (NO PHOTOS) -->
  <section class="corp-hero">
    <div class="corp-hero-content">
      <h1 class="corp-hero-h1">Podcast &<br>Interview.</h1>
      
      <div class="corp-hero-meta">
        <p class="corp-hero-sub brut-protect-overflow">A comprehensive content creation environment combining pristine audio, cinematic multi-camera visuals, and cohesive branding.</p>
        <a href="#book" class="brut-btn" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border: 2px solid var(--color-accent);">Step Into Thalam</a>
      </div>
    </div>
  </section>

  <!-- ACCORDION SERVICES -->
  <section class="services-wrapper">
    <div class="services-grid">
      
      <div class="services-left">
        <h2 class="services-intro-title">SERVICES —</h2>
        <p class="services-intro-text">The Broadcast Standard.</p>
        <p class="services-intro-text">A pristine environment engineered for uncompromised audio and cinematic multi-camera visuals.</p>
      </div>

      <div class="services-right">
        <div class="b-accordion">
          
          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="true">
              <span><span class="b-accordion-num">01</span> Studio & Production</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <p class="b-accordion-desc">Focusing on a well-equipped environment with technical support to ensure smooth recording and high production quality.</p>
              <ul class="b-accordion-list">
                <li>Acoustically Treated Space</li>
                <li>Multi-Camera 4K Setups</li>
                <li>Professional Studio Lighting</li>
                <li>Live Switching & Monitoring</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">02</span> Content & Media</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <p class="b-accordion-desc">Emphasizing the creation, editing, and distribution of podcast material to maximize your reach and audience engagement.</p>
              <ul class="b-accordion-list">
                <li>Full-Length Video Editing</li>
                <li>Audio Mastering & Mixing</li>
                <li>Short-Form Clip Extraction</li>
                <li>Platform Distribution Assets</li>
              </ul>
            </div>
          </div>

          <div class="b-accordion-group">
            <button class="b-accordion-btn" aria-expanded="false">
              <span><span class="b-accordion-num">03</span> Photography & Branding</span>
              <span class="b-accordion-icon">+</span>
            </button>
            <div class="b-accordion-panel">
              <p class="b-accordion-desc">Complementing the production by delivering high-quality visuals and a cohesive brand identity for your show.</p>
              <ul class="b-accordion-list">
                <li>Cover Art Photography</li>
                <li>Host & Guest Portraits</li>
                <li>Show Visual Identity</li>
                <li>Promotional Assets</li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </div>
  </section>

  <!-- IMPACT SECTION -->
  <section class="brut-impact">
    <h2 class="brut-impact-title brut-protect-overflow">The Power of High-Fidelity</h2>
    <div class="brut-impact-grid">
      <div class="impact-card">
        <span class="impact-num">01</span>
        <h3 class="impact-header">Authority</h3>
        <p class="impact-desc">Elevate your brand perception with broadcast-quality visuals and sound that immediately establish trust.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">02</span>
        <h3 class="impact-header">Engagement</h3>
        <p class="impact-desc">Capture and retain your audience's attention across all platforms with professionally paced, multi-cam edits.</p>
      </div>
      <div class="impact-card">
        <span class="impact-num">03</span>
        <h3 class="impact-header">Velocity</h3>
        <p class="impact-desc">Turn a single studio recording session into a month's worth of multi-channel promotional content.</p>
      </div>
    </div>
  </section>

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Start Broadcasting</h2>
    <a href="#book" class="brut-btn" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border: 2px solid var(--color-accent);">Book The Studio</a>
  </section>

<script>
  // Simple Vanilla JS for the Brutalist Services Accordion
  document.addEventListener('DOMContentLoaded', () => {
    const accordions = document.querySelectorAll('.b-accordion-btn');
    accordions.forEach(btn => {
      btn.addEventListener('click', () => {
        const isExpanded = btn.getAttribute('aria-expanded') === 'true';
        // Close all others
        accordions.forEach(b => b.setAttribute('aria-expanded', 'false'));
        // Toggle current
        btn.setAttribute('aria-expanded', !isExpanded);
      });
    });
  });
</script>

<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
