<?php
/**
 * Template Name: Pillar — Events & Portrait (Monumental Z-Pattern)
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events & Portrait Photography — Chitramaya</title>
  <meta name="description" content="Preserving the human milestone with a cinematic, deeply emotional editorial eye.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/events-portrait')); ?>">
  <?php wp_head(); ?>
  <style>
    :root {
      --color-dark: #0a0a0a; /* Stark Brutalist Dark */
      --color-accent: #A96F44; /* Chitramaya Camel */
    }

    /* OVERFLOW PROTECTION FOR MOBILE */
    .brut-protect-overflow {
      overflow-wrap: break-word;
      word-wrap: break-word;
      hyphens: auto;
      max-width: 100vw;
    }

    /* HERO SECTION (Cinematic Full-Bleed) */
    .events-hero {
      position: relative;
      min-height: 100vh;
      width: 100vw;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      padding: 4rem 1.5rem;
      background-image: linear-gradient(to bottom, rgba(10,17,40,0.2) 0%, rgba(10,17,40,0.9) 100%), url('https://unsplash.com/photos/wDKS844Aeqw/download?w=2400');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .events-hero-content {
      position: relative;
      z-index: 2;
      max-width: 1200px;
    }

    .events-hero-h1 {
      font-size: var(--type-step-5);
      font-weight: 900;
      line-height: 0.95;
      text-transform: uppercase;
      letter-spacing: -0.04em;
      margin-bottom: 1.5rem;
      color: var(--color-light);
    }

    .events-hero-sub {
      font-size: var(--type-step-1);
      line-height: 1.5;
      color: rgba(255, 255, 255, 0.9);
      max-width: 700px;
      margin-bottom: 3rem;
    }

    @media (min-width: 992px) {
      .events-hero {
        padding: 6rem 4rem;
      }
    }

    /* MONUMENTAL Z-PATTERN GALLERY */
    .monumental-container {
      padding: 8rem 1.5rem;
      max-width: 1600px;
      margin: 0 auto;
    }
    
    .monumental-section {
      display: flex;
      flex-direction: column;
      gap: 3rem;
      margin-bottom: 8rem;
    }
    .monumental-section:last-child {
      margin-bottom: 0;
    }

    .monumental-img-wrapper {
      width: 100%;
      background: var(--color-dark);
      overflow: hidden;
      aspect-ratio: 4/5;
    }

    /* ZERO NEGATIVE LENS - 100% PURE PHOTOGRAPHY */
    .monumental-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.8s ease;
    }
    .monumental-img-wrapper:hover .monumental-img {
      transform: scale(1.03);
    }

    .monumental-content {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .monumental-chapter {
      font-family: var(--font-mono, monospace);
      font-size: var(--type-step-0);
      font-weight: 700;
      color: var(--color-accent);
      text-transform: uppercase;
      letter-spacing: 0.1em;
      margin-bottom: 1rem;
    }

    .monumental-header {
      font-size: var(--type-step-4);
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: -0.04em;
      line-height: 1;
      color: var(--color-dark);
      margin-bottom: 1rem;
    }

    .monumental-copy {
      font-size: var(--type-step-1);
      line-height: 1.6;
      color: #333;
      margin-bottom: 3rem;
      max-width: 600px;
    }

    .monumental-deliverables {
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }
    .monumental-deliverables span {
      font-size: var(--type-step-1);
      font-weight: 700;
      letter-spacing: -0.01em;
      color: var(--color-dark);
      line-height: 1.2;
      border-bottom: 1px solid rgba(0,0,0,0.1);
      padding-bottom: 0.5rem;
    }
    .monumental-deliverables span:last-child {
      border-bottom: none;
    }

    /* DESKTOP Z-PATTERN GRID */
    @media (min-width: 992px) {
      .monumental-container {
        padding: 12rem 4rem;
      }
      .monumental-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 6rem;
        align-items: center;
        margin-bottom: 16rem; /* Massive emotional breathing room */
      }
      
      .monumental-img-wrapper {
        aspect-ratio: 3/4; /* Elegant portrait crop */
      }

      /* Odd: Image Left, Text Right */
      .monumental-section:nth-child(odd) .monumental-img-wrapper {
        order: 1;
      }
      .monumental-section:nth-child(odd) .monumental-content {
        order: 2;
        padding-left: 2rem;
      }

      /* Even: Image Right, Text Left */
      .monumental-section:nth-child(even) .monumental-img-wrapper {
        order: 2;
      }
      .monumental-section:nth-child(even) .monumental-content {
        order: 1;
        padding-right: 2rem;
      }
    }

    /* GLOBAL CTA */
    .global-cta { padding: 8rem 1.5rem; text-align: center; background: var(--color-dark); color: var(--color-light); }
    .global-cta-title { font-size: var(--type-step-4); font-weight: 900; text-transform: uppercase; letter-spacing: -0.04em; margin-bottom: 3rem; }
  </style>
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>

  <!-- HERO SECTION -->
  <section class="events-hero">
    <div class="events-hero-content">
      <h1 class="events-hero-h1 brut-protect-overflow">Events &<br>Portrait.</h1>
      <p class="events-hero-sub brut-protect-overflow">Preserving the human milestone with a cinematic, deeply emotional editorial eye.</p>
      <div>
        <a href="#book" class="brut-btn" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border-color:var(--color-accent);">Begin Your Story</a>
      </div>
    </div>
  </section>

  <!-- MONUMENTAL GALLERY -->
  <div class="monumental-container">
    
    <!-- CHAPTER 01 -->
    <article class="monumental-section" id="service-1">
      <div class="monumental-img-wrapper">
        <img src="https://unsplash.com/photos/-G2iJF_aUws/download?w=1600" alt="The Anticipation (Maternity)" class="monumental-img">
      </div>
      <div class="monumental-content">
        <div class="monumental-chapter">Chapter 01</div>
        <h2 class="monumental-header brut-protect-overflow">The Anticipation</h2>
        <p class="monumental-copy">Honoring the quiet, profound moments before life changes forever.</p>
        <div class="monumental-deliverables brut-protect-overflow">
          <span>Studio & Outdoor Art-Themed Maternity</span>
          <span>Bump-to-Baby Journeys</span>
          <span>Family Portraits (Baby Shower)</span>
        </div>
      </div>
    </article>

    <!-- CHAPTER 02 -->
    <article class="monumental-section" id="service-2">
      <div class="monumental-img-wrapper">
        <img src="https://unsplash.com/photos/KAUHsfTbQB0/download?w=1600" alt="The Arrival (Baby)" class="monumental-img">
      </div>
      <div class="monumental-content">
        <div class="monumental-chapter">Chapter 02</div>
        <h2 class="monumental-header brut-protect-overflow">The Arrival</h2>
        <p class="monumental-copy">Capturing the fleeting, irreplaceable first milestones of a new life.</p>
        <div class="monumental-deliverables brut-protect-overflow">
          <span>Newborn & Infant (Studio & House Visit)</span>
          <span>Toddler (Outdoor & Studio)</span>
          <span>1st Birthday Celebrations</span>
        </div>
      </div>
    </article>

    <!-- CHAPTER 03 -->
    <article class="monumental-section" id="service-3">
      <div class="monumental-img-wrapper">
        <img src="https://unsplash.com/photos/VUlpFpZea_w/download?w=1600" alt="The Union (Wedding)" class="monumental-img">
      </div>
      <div class="monumental-content">
        <div class="monumental-chapter">Chapter 03</div>
        <h2 class="monumental-header brut-protect-overflow">The Union</h2>
        <p class="monumental-copy">A cinematic, deeply emotional documentation of two families becoming one.</p>
        <div class="monumental-deliverables brut-protect-overflow">
          <span>Pre/Post Wedding Photography</span>
          <span>Destination Weddings</span>
          <span>Bespoke Song Creation</span>
        </div>
      </div>
    </article>

    <!-- CHAPTER 04 -->
    <article class="monumental-section" id="service-4">
      <div class="monumental-img-wrapper">
        <img src="https://unsplash.com/photos/kwKy9Rrm16o/download?w=1600" alt="The Legacy (Family)" class="monumental-img">
      </div>
      <div class="monumental-content">
        <div class="monumental-chapter">Chapter 04</div>
        <h2 class="monumental-header brut-protect-overflow">The Legacy</h2>
        <p class="monumental-copy">Preserving cultural heritage and generational bonds for the decades to come.</p>
        <div class="monumental-deliverables brut-protect-overflow">
          <span>Cultural Milestones (Sastiyabthapoorthi, Upanayanam)</span>
          <span>Cultural Milestones (Sadhabishegam, Ayushomam)</span>
          <span>Grand Family Portraits (Studio, House Visit, Outdoor)</span>
        </div>
      </div>
    </article>

  </div>

  <section class="global-cta">
    <h2 class="global-cta-title brut-protect-overflow">Ready to Preserve Your Legacy?</h2>
    <a href="#book" class="brut-btn" data-trigger="booking" style="background:var(--color-accent); color:var(--color-dark); border-color:var(--color-accent);">Reserve Your Date</a>
  </section>

<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
