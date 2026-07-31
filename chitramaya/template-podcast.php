<?php
/**
 * Template Name: Pillar — Podcast & Interview (Vibrant Brutalism)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Podcast & Interview — Thalam Studio</title>
  <meta name="description" content="A comprehensive content creation environment combining pristine audio, cinematic multi-camera visuals, and cohesive branding.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/podcast-interview')); ?>">
  <?php wp_head(); ?>
  <style>
    /* OVERFLOW PROTECTION */
    .brut-protect-overflow { overflow-wrap: break-word; word-wrap: break-word; hyphens: auto; max-width: 100vw; }

    /* HERO SECTION (Sunlit Creativity) */
    .podcast-hero {
      position: relative;
      min-height: 100vh;
      width: 100vw;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 4rem 1.5rem;
      background-image: linear-gradient(to bottom, rgba(10,17,40,0.1) 0%, rgba(10,17,40,0.85) 100%), url('https://unsplash.com/photos/SgxTZZKAcTg/download?w=2400');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .podcast-hero-content { position: relative; z-index: 2; max-width: 1200px; }
    
    .podcast-hero-h1 { font-size: var(--type-step-5); font-weight: 900; line-height: 0.95; text-transform: uppercase; letter-spacing: -0.04em; margin-bottom: 1.5rem; color: #FDFBF7; }
    .podcast-hero-sub { font-size: var(--type-step-1); line-height: 1.5; color: rgba(255, 255, 255, 0.9); max-width: 700px; margin-bottom: 3rem; }

    @media (min-width: 992px) { .podcast-hero { padding: 6rem 4rem; } }

    /* VIBRANT COLOR BLOCKS */
    .color-block { padding: 6rem 1.5rem; width: 100%; border-bottom: 2px solid rgba(0,0,0,0.1); }
    @media (min-width: 992px) { .color-block { padding: 10rem 4rem; } }

    /* Emotion: Warmth / Acoustic Perfection */
    .block-golden { background-color: #E3DAC9; color: #111111; }
    
    /* Emotion: Velocity / High-Energy */
    .block-vibrant { background-color: #FF6B6B; color: #FFFFFF; }
    
    /* Emotion: Clarity / Premium Identity */
    .block-white { background-color: #FDFBF7; color: #111111; }

    .block-inner { display: grid; gap: 3rem; max-width: 1600px; margin: 0 auto; }
    @media (min-width: 992px) {
      .block-inner { grid-template-columns: 1fr 1fr; gap: 6rem; align-items: center; }
      /* Alternate Grid Direction */
      .block-vibrant .block-inner .block-text { order: 2; }
      .block-vibrant .block-inner .block-img-wrapper { order: 1; }
    }

    .block-img-wrapper { width: 100%; background: #111; overflow: hidden; border: 4px solid currentColor; }
    .block-img { width: 100%; height: auto; display: block; object-fit: contain; filter: grayscale(10%); transition: transform 0.6s ease; }
    .block-img-wrapper:hover .block-img { transform: scale(1.02); filter: grayscale(0%); }

    .block-text { display: flex; flex-direction: column; gap: 1.5rem; }
    
    .block-label { font-family: var(--font-mono, monospace); font-size: var(--type-step-0); font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; opacity: 0.8; }
    .block-header { font-size: var(--type-step-4); font-weight: 900; text-transform: uppercase; letter-spacing: -0.04em; line-height: 1; margin-bottom: 1rem; }
    .block-copy { font-size: var(--type-step-1); line-height: 1.6; max-width: 600px; opacity: 0.9; }

    /* GLOBAL CTA */
    .global-cta { padding: 8rem 1.5rem; text-align: center; background: #A96F44; color: #FDFBF7; }
    .global-cta-title { font-size: var(--type-step-4); font-weight: 900; text-transform: uppercase; letter-spacing: -0.04em; margin-bottom: 3rem; }
    .brut-btn-dark { display: inline-block; padding: 1rem 3rem; font-size: var(--type-step-0); font-weight: 900; text-transform: uppercase; letter-spacing: 0.05em; text-decoration: none; border: 2px solid #111111; background: #111111; color: #FDFBF7; transition: all 0.3s; }
    .brut-btn-dark:hover { background: transparent; color: #111111; }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- HERO SECTION -->
  <section class="podcast-hero">
    <div class="podcast-hero-content">
      <h1 class="podcast-hero-h1 brut-protect-overflow">Podcast &<br>Interview.</h1>
      <p class="podcast-hero-sub brut-protect-overflow">A comprehensive content creation environment combining pristine audio, cinematic multi-camera visuals, and cohesive branding.</p>
      <div>
        <a href="#production" class="brut-btn" style="background:var(--color-accent); color:var(--color-dark); border-color:var(--color-accent);">Step Into Thalam</a>
      </div>
    </div>
  </section>

  <!-- 01 STUDIO & PRODUCTION (GOLDEN) -->
  <section class="color-block block-golden" id="production">
    <div class="block-inner">
      <div class="block-text">
        <div class="block-label">01 // The Playground</div>
        <h2 class="block-header brut-protect-overflow">Studio & Production</h2>
        <p class="block-copy">Focusing on a well-equipped environment with technical support to ensure smooth recording and high production quality. Step into Thalam—a meticulously engineered physical space equipped with professional lighting and multi-camera setups.</p>
      </div>
      <div class="block-img-wrapper">
        <img src="https://unsplash.com/photos/pPxJTtxfV1A/download?w=1600" alt="Studio Microphone" class="block-img">
      </div>
    </div>
  </section>

  <!-- 02 CONTENT & MEDIA (VIBRANT) -->
  <section class="color-block block-vibrant" id="media">
    <div class="block-inner">
      <div class="block-text">
        <div class="block-label">02 // The Amplifier</div>
        <h2 class="block-header brut-protect-overflow">Content & Media</h2>
        <p class="block-copy">Emphasizing the creation, editing, and distribution of podcast material, helping clients maximize reach and engagement. Our pipeline ensures your content meets the exacting standards of modern digital audiences.</p>
      </div>
      <div class="block-img-wrapper">
        <img src="https://unsplash.com/photos/25OWIrAtGMM/download?w=1600" alt="Editing Content" class="block-img">
      </div>
    </div>
  </section>

  <!-- 03 PHOTOGRAPHY & BRANDING (WHITE) -->
  <section class="color-block block-white" id="branding">
    <div class="block-inner">
      <div class="block-text">
        <div class="block-label">03 // The Authority</div>
        <h2 class="block-header brut-protect-overflow">Photography & Branding</h2>
        <p class="block-copy">Complementing the production by delivering high-quality visuals, promotional assets, and a cohesive brand identity, ensuring that the podcast not only sounds professional but looks visually compelling and market-ready.</p>
      </div>
      <div class="block-img-wrapper">
        <img src="https://unsplash.com/photos/HENZpJ-KWg0/download?w=1600" alt="Branding & Visuals" class="block-img">
      </div>
    </div>
  </section>

  <!-- FINAL CTA (CAMEL) -->
  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Start Broadcasting</h2>
    <a href="#book" class="brut-btn-dark" data-trigger="booking">Step Into The Studio</a>
  </section>

<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
