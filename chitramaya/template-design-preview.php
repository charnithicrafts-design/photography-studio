<?php
/**
 * Template Name: Design Comparison Preview
 * Template Post Type: page
 * Description: Side-by-side design comparison between Option 1 (Editorial Action) and Option 2 (Minimalist Brutalist) for client review.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Design Comparison Preview — Chithramaya Creatives</title>
  <meta name="robots" content="noindex, nofollow">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-design-preview.css?ver=<?php echo filemtime(get_stylesheet_directory() . '/assets/css/pages/template-design-preview.css'); ?>">
</head>
<body>

  <!-- ==============================================================================
       STICKY COMPARISON CONTROL BAR (Client Review Mode)
       ============================================================================== -->
  <header class="preview-control-bar" role="banner">
    <div class="preview-meta">
      <span class="preview-badge">Client Review</span>
      <span class="preview-title">Service Pillars Direction</span>
    </div>

    <div class="preview-switch-group" role="tablist" aria-label="Design variant selector">
      <button type="button" class="preview-switch-btn active" id="btn-opt-1" role="tab" aria-selected="true" aria-controls="option-1-view">
        Option 1: Editorial Action
      </button>
      <button type="button" class="preview-switch-btn" id="btn-opt-2" role="tab" aria-selected="false" aria-controls="option-2-view">
        Option 2: Brutalist Minimalist
      </button>
    </div>

    <div class="preview-hint">Tap buttons to toggle between styles</div>
  </header>

  <!-- ==============================================================================
       OPTION 1: HIGH-CONTRAST EDITORIAL ACTION
       ============================================================================== -->
  <main id="option-1-view" class="design-view-section is-active" role="tabpanel" aria-labelledby="btn-opt-1">
    
    <div class="option-intro-banner">
      <div class="option-intro-tag">Direction 01 / Selected Default</div>
      <h1 class="option-intro-heading">High-Contrast Editorial Action</h1>
      <p class="option-intro-desc">
        Tight, high-conviction editorial storytelling with explicit action text in brand accent green. Designed for commercial authority and instant reading clarity.
      </p>
    </div>

    <section class="duality-section" style="margin-top: 0;">
      
      <!-- LEFT COLUMN: MONEY-BASED SERVICES (NAVY #171E4A) -->
      <div class="col-money">

        <!-- 01 BRAND & CORPORATE PHOTOGRAPHY -->
        <article class="dark-card service-card" id="opt1-brand-corporate">
          <div class="service-number">— 01 / BRAND &amp; CORPORATE</div>
          <h2 class="service-title">Brand &amp; Corporate Photography</h2>
          <p class="service-text-block">
            We photograph the people, spaces, and moments that make your business credible. Executive portraits that actually look like the person. Team shoots people want to be in. Corporate events documented like they matter — because they do.
          </p>
          <a href="/corporate-brand/" class="service-cta" aria-label="Explore Corporate &amp; Executive Photography work">Explore Corporate &amp; Executive Work ↗</a>
        </article>

        <!-- 02 COMMERCIAL PHOTOGRAPHY -->
        <article class="dark-card service-card" id="opt1-commercial">
          <div class="service-number">— 02 / COMMERCIAL</div>
          <h2 class="service-title">Commercial Photography</h2>
          <p class="service-text-block">
            Products, spaces, food, fashion. We shoot what you're selling and make people actually want it. Whether it's an advertising campaign, an architectural space, or a catalog, the frame is always doing a commercial job.
          </p>
          <a href="/commercial/" class="service-cta" aria-label="Explore Commercial Photography Campaigns">Explore Commercial Campaigns ↗</a>
        </article>

        <!-- 04 PODCAST & INTERVIEW PRODUCTION -->
        <article class="dark-card service-card" id="opt1-podcast">
          <div class="service-number">— 04 / PODCAST &amp; PRODUCTION</div>
          <h2 class="service-title">Podcast &amp; Interview Production</h2>
          <p class="service-text-block">
            We set up the room. You bring the conversation. Broadcast-grade Shure SM7B audio, cinema 4K multi-camera angles, and acoustic isolation in Trichy. One good recording session becomes a month of edited, branded, publish-ready content.
          </p>
          <a href="/podcast-interview/" class="service-cta" aria-label="Book Podcast Studio &amp; Production">Book Studio &amp; Production ↗</a>
        </article>
      </div>

      <!-- RIGHT COLUMN: ART-BASED SERVICES (OFF-WHITE #F7F4ED) -->
      <div class="col-art">

        <!-- 03 EVENTS & PORTRAIT PHOTOGRAPHY -->
        <article class="white-card service-card" id="opt1-events-portraits">
          <div class="service-number">— 03 / EVENTS &amp; PORTRAIT</div>
          <h2 class="service-title">Events &amp; Heritage Portraiture</h2>
          <p class="service-text-block">
            The moments you'll look at in 20 years and remember exactly how it felt. Unobtrusive, documentary observation for milestone weddings, sacred rituals, and generational family heritage across South India.
          </p>
          <nav class="service-links-cluster" aria-label="Events &amp; Portrait sub-verticals">
            <a href="/events-portrait/" class="service-cta-link" aria-label="Events &amp; Weddings photography">Events &amp; Weddings ↗</a>
            <a href="/maternity/" class="service-cta-link" aria-label="Maternity &amp; Bump-to-Baby photography">Maternity &amp; Bump-to-Baby ↗</a>
            <a href="/thalam-baby/" class="service-cta-link" aria-label="Baby &amp; Infant Art photography">Baby &amp; Infant Art ↗</a>
          </nav>
        </article>

        <!-- 05 BRAND DESIGN (EVOLVING SERVICE) -->
        <article class="white-card service-card" id="opt1-brand-design">
          <div class="service-badge">EVOLVING STUDIO SERVICE</div>
          <div class="service-number">— 05 / BRAND DESIGN</div>
          <h2 class="service-title">Brand Design &amp; Visual Systems</h2>
          <p class="service-text-block">
            Where visual identity meets artistic strategy. We build distinctive typographic systems, wordmarks, and art direction that define your brand essence — giving your business a face people remember.
          </p>
          <a href="/brand-design/" class="service-cta" aria-label="Collaborate on Brand Identity Design">Collaborate on Brand Identity ↗</a>
        </article>

        <!-- THALAM STUDIO BILLBOARD ADVERTISEMENT -->
        <div class="manifesto-block thalam-billboard">
          <div class="manifesto-label">[ THALAM STUDIO, TRICHY ]</div>
          <div class="manifesto-quote">
            We set the room.<br>You bring the story.
          </div>
          <p class="manifesto-desc">
            A purpose-built 2,400 sq ft production environment in Thillai Nagar engineered for broadcast audio, precision strobe lighting, and commercial sets.
          </p>
          <a href="/thalam-studio/" class="btn-primary">Step into Thalam &rarr;</a>
        </div>
      </div>
    </section>
  </main>

  <!-- ==============================================================================
       OPTION 2: MINIMALIST BRUTALIST MONOLITH (Reference Image Match)
       ============================================================================== -->
  <main id="option-2-view" class="design-view-section" role="tabpanel" aria-labelledby="btn-opt-2">
    
    <div class="option-intro-banner">
      <div class="option-intro-tag">Direction 02 / Brutalist Minimalist</div>
      <h1 class="option-intro-heading">Minimalist Brutalist Monolith</h1>
      <p class="option-intro-desc">
        Inspired by the agency reference design: prominent accent numerals (01–05), tight 2-line uppercase statements, floating corner arrows, and full-card touch targets.
      </p>
    </div>

    <section class="duality-section" style="margin-top: 0;">
      
      <!-- LEFT COLUMN: MONEY-BASED SERVICES (NAVY #171E4A) -->
      <div class="col-money">

        <!-- 01 BRAND & CORPORATE -->
        <a href="/corporate-brand/" class="brutalist-card" id="opt2-brand-corporate" aria-label="01 Brand &amp; Corporate Photography">
          <div class="brutalist-header">
            <div class="brutalist-num">01</div>
            <h2 class="brutalist-title">Brand &amp; Corporate</h2>
          </div>
          <p class="brutalist-statement">
            Executive portraits, team visuals, and corporate video engineered to build brand credibility.
          </p>
          <div class="brutalist-arrow-box">
            <span class="brutalist-arrow" aria-hidden="true">↗</span>
          </div>
        </a>

        <!-- 02 COMMERCIAL -->
        <a href="/commercial/" class="brutalist-card" id="opt2-commercial" aria-label="02 Commercial Photography">
          <div class="brutalist-header">
            <div class="brutalist-num">02</div>
            <h2 class="brutalist-title">Commercial Work</h2>
          </div>
          <p class="brutalist-statement">
            Products, architectural spaces, food, and high-impact advertising campaigns built to sell.
          </p>
          <div class="brutalist-arrow-box">
            <span class="brutalist-arrow" aria-hidden="true">↗</span>
          </div>
        </a>

        <!-- 04 PODCAST & INTERVIEW -->
        <a href="/podcast-interview/" class="brutalist-card" id="opt2-podcast" aria-label="04 Podcast &amp; Interview Production">
          <div class="brutalist-header">
            <div class="brutalist-num">04</div>
            <h2 class="brutalist-title">Podcast Production</h2>
          </div>
          <p class="brutalist-statement">
            Broadcast-grade Shure SM7B audio, 4K multi-camera video, and acoustic isolation in Trichy.
          </p>
          <div class="brutalist-arrow-box">
            <span class="brutalist-arrow" aria-hidden="true">↗</span>
          </div>
        </a>
      </div>

      <!-- RIGHT COLUMN: ART-BASED SERVICES (OFF-WHITE #F7F4ED) -->
      <div class="col-art">

        <!-- 03 EVENTS & HERITAGE PORTRAITURE -->
        <article class="brutalist-card" id="opt2-events-portraits" style="cursor: default;">
          <div class="brutalist-header">
            <div class="brutalist-num">03</div>
            <h2 class="brutalist-title">Events &amp; Heritage</h2>
          </div>
          <p class="brutalist-statement">
            Documentary observation for milestone weddings, sacred rituals, and generational family heritage.
          </p>
          <nav class="brutalist-sublinks" aria-label="Events sub-verticals">
            <a href="/events-portrait/" class="brutalist-sublink-item">
              <span>03.1 Events &amp; Weddings</span>
              <span class="brutalist-sublink-arrow">↗</span>
            </a>
            <a href="/maternity/" class="brutalist-sublink-item">
              <span>03.2 Maternity &amp; Baby</span>
              <span class="brutalist-sublink-arrow">↗</span>
            </a>
            <a href="/thalam-baby/" class="brutalist-sublink-item">
              <span>03.3 Infant Art &amp; House Visit</span>
              <span class="brutalist-sublink-arrow">↗</span>
            </a>
          </nav>
        </article>

        <!-- 05 BRAND DESIGN -->
        <a href="/brand-design/" class="brutalist-card" id="opt2-brand-design" aria-label="05 Brand Design &amp; Visual Systems">
          <div class="brutalist-header">
            <span class="brutalist-badge">Evolving</span>
            <div class="brutalist-num">05</div>
            <h2 class="brutalist-title">Brand Design</h2>
          </div>
          <p class="brutalist-statement">
            Distinctive wordmarks, typography systems, and art direction that define brand essence.
          </p>
          <div class="brutalist-arrow-box">
            <span class="brutalist-arrow" aria-hidden="true">↗</span>
          </div>
        </a>

        <!-- THALAM STUDIO BILLBOARD ADVERTISEMENT -->
        <div class="manifesto-block thalam-billboard">
          <div class="manifesto-label">[ THALAM STUDIO, TRICHY ]</div>
          <div class="manifesto-quote">
            We set the room.<br>You bring the story.
          </div>
          <p class="manifesto-desc">
            A purpose-built 2,400 sq ft production environment in Thillai Nagar engineered for broadcast audio, precision strobe lighting, and commercial sets.
          </p>
          <a href="/thalam-studio/" class="btn-primary">Step into Thalam &rarr;</a>
        </div>
      </div>
    </section>
  </main>

  <!-- ==============================================================================
       INTERACTION SCRIPT — TABS
       ============================================================================== -->
  <script>
    (function() {
      const btn1 = document.getElementById('btn-opt-1');
      const btn2 = document.getElementById('btn-opt-2');
      const view1 = document.getElementById('option-1-view');
      const view2 = document.getElementById('option-2-view');

      function switchView(target) {
        if (target === 1) {
          btn1.classList.add('active');
          btn1.setAttribute('aria-selected', 'true');
          btn2.classList.remove('active');
          btn2.setAttribute('aria-selected', 'false');
          view1.classList.add('is-active');
          view2.classList.remove('is-active');
        } else {
          btn2.classList.add('active');
          btn2.setAttribute('aria-selected', 'true');
          btn1.classList.remove('active');
          btn1.setAttribute('aria-selected', 'false');
          view2.classList.add('is-active');
          view1.classList.remove('is-active');
        }
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }

      btn1.addEventListener('click', () => switchView(1));
      btn2.addEventListener('click', () => switchView(2));

      // Support URL hash (?option=2 or #option2)
      if (window.location.search.includes('option=2') || window.location.hash === '#option2') {
        switchView(2);
      }
    })();
  </script>

  <?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
