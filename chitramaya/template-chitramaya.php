<?php
/**
 * Template Name: Chithramaya Creatives
 * Template Post Type: page
 * Description: Full-page enterprise portfolio landing for Chithramaya Creatives.
 */
// Bypass WordPress header/footer entirely — full design control
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chithramaya Creatives — Photography Studio</title>
  <meta name="description" content="Chithramaya Creatives — Ad shoots, baby photography, and visual storytelling from Thalam Studio, Kerala. Every image is made to be felt.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/chitramaya')); ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-chitramaya.css">
</head>
<body>
  <?php get_template_part('template-parts/global-nav'); ?>

  <section class="hero section-illusion-wrapper" id="hero">
    <div class="graphic-orb orb-lg color-cyan orb-pos-tl"></div>
    <div class="graphic-orb orb-md color-magenta orb-pos-br"></div>

    <div class="hero-content">
      <h1 class="hero-brand-name">
        <span class="brand-heavy"><?php echo esc_html( get_field('home_hero_title_1') ?: 'CHITHRAMAYA' ); ?></span>
        <span class="brand-elegant"><?php echo esc_html( get_field('home_hero_title_2') ?: 'Creatives' ); ?></span>
      </h1>
      <div class="hero-pills">
        <span class="hero-pill desktop-only-pill">Commercial</span>
        <span class="hero-pill desktop-only-pill">Portraits</span>
        <span class="hero-pill desktop-only-pill">Podcast</span>
        <a href="#services" class="hero-pill hero-pill-link">All services
          <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke="currentColor" stroke-width="2" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" /></svg>
        </a>
      </div>

      <p class="hero-intro">
        We capture, curate, and craft visual experiences for brands and families that demand perfection.
      </p>

      <a href="#contact" class="btn-compound">
        Book a call
        <div class="btn-compound-icon">
            <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: currentColor;"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
      </a>
    </div>
  </section>

  <section class="manifesto" id="about">
    <div>
      <div class="manifesto-label"><?php echo esc_html( get_field('home_manifesto_label') ?: 'OUR CREED' ); ?></div>
      <h2 class="manifesto-text"><?php echo wp_kses_post( get_field('home_manifesto_headline') ?: 'Every photograph is a physical argument that the world is worth feeling.' ); ?></h2>
    </div>
    <div>
      <p class="manifesto-body"><?php echo wp_kses_post( get_field('home_manifesto_body') ?: 'We believe every image should do more than inform — it should stay with you. Through deliberate lighting, medium-format capture, and restrained post-production, we craft photographs that your audience does not just look at — they feel. Each commission begins with a single question: what must this image make someone experience?' ); ?></p>
      <div class="manifesto-stats">
        <div class="stat-box"><div class="stat-num">340+</div><div class="stat-label">Campaigns</div></div>
        <div class="stat-box"><div class="stat-num">20 YR</div><div class="stat-label">Experience</div></div>
        <div class="stat-box"><div class="stat-num">96%</div><div class="stat-label">Retention</div></div>
        <div class="stat-box"><div class="stat-num">3 YR</div><div class="stat-label">Expansion</div></div>
      </div>
    </div>
  </section>

  <section class="thalam-ad" id="thalam">
    <div class="thalam-ad-content">
      <div>
        <div class="thalam-ad-eyebrow">THALAM STUDIO</div>
        <h2 class="thalam-ad-headline">SPACE TO<br>CREATE.</h2>
        <p style="font-family: var(--font-sans); font-size: clamp(1rem, 1.5vw, 1.2rem); font-weight: 400; line-height: 1.6; color: rgba(255,255,255,0.7); max-width: 480px; margin-top: 1.5rem;">A true space to create means zero friction between your idea and its execution. We've prepared the seamless cyclorama, set the lighting, and curated the amenities—giving you the ultimate blank canvas to focus entirely on your craft.</p>
      </div>
      <div class="thalam-ad-right">
        <ul class="thalam-list">
          <li><span class="thalam-list-num">01</span><span class="thalam-list-text">Wide Cyclorama Wall</span></li>
          <li><span class="thalam-list-num">02</span><span class="thalam-list-text">Complete Light Setup</span></li>
          <li><span class="thalam-list-num">03</span><span class="thalam-list-text">Baby Shoot Amenities</span></li>
        </ul>
        <a href="<?php echo home_url('/thalam-studio'); ?>" class="thalam-ad-cta">
          Explore Thalam Studio
          <span>→</span>
        </a>
      </div>
    </div>
  </section>

  <!-- SERVICES -->
  <section class="services" id="services">
    <div class="section-header services-header">
      <h2 class="section-title">Services</h2>
    </div>

    <!-- 01: Brand & Corporate Photography -->
    <div class="service-item">
      <div class="service-item-header">
        <span class="service-num">01 // Brand &amp; Corporate</span>
        <h3 class="service-title"><?php echo esc_html( get_field('home_service_1_title') ?: 'Executive & Corporate' ); ?></h3>
      </div>
      <div class="service-item-content">
        <p class="service-desc"><?php echo wp_kses_post( get_field('home_service_1_desc') ?: 'Your people are your most credible asset. We photograph executive portraits, team sessions, corporate events, and office environments that build immediate trust across every platform.' ); ?></p>
        <ul class="service-list">
          <li>Executive Headshots</li>
          <li>Team &amp; Website Photography</li>
          <li>Corporate Events</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/corporate')); ?>" class="service-btn">Explore Corporate</a>
      </div>
    </div>

    <!-- 02: Commercial Photography -->
    <div class="service-item">
      <div class="service-item-header">
        <span class="service-num">02 // Commercial</span>
        <h3 class="service-title"><?php echo esc_html( get_field('home_service_2_title') ?: 'Commercial Production' ); ?></h3>
      </div>
      <div class="service-item-content">
        <p class="service-desc"><?php echo wp_kses_post( get_field('home_service_2_desc') ?: 'Every frame has a job. We deliver OOH campaigns, e-commerce catalogues, fashion, food, and lifestyle photography in close collaboration with your brief and your team.' ); ?></p>
        <ul class="service-list">
          <li>OOH &amp; Billboard Campaigns</li>
          <li>E-Commerce Catalogues</li>
          <li>Food, Fashion &amp; Lifestyle</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/commercial')); ?>" class="service-btn">Explore Commercial</a>
      </div>
    </div>

    <!-- 03: Events & Portrait Photography -->
    <div class="service-item">
      <div class="service-item-header">
        <span class="service-num">03 // Events &amp; Portrait</span>
        <h3 class="service-title"><?php echo esc_html( get_field('home_service_3_title') ?: 'Events & Portraiture' ); ?></h3>
      </div>
      <div class="service-item-content">
        <p class="service-desc"><?php echo wp_kses_post( get_field('home_service_3_desc') ?: 'These moments happen only once. We archive maternity, newborn, toddler milestones, weddings, and multi-generational family ceremonies — studio-styled, outdoor, or at home.' ); ?></p>
        <ul class="service-list">
          <li>Baby &amp; Maternity Sessions</li>
          <li>Wedding Photography</li>
          <li>Family Portraits</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/events')); ?>" class="service-btn">Explore Events</a>
      </div>
    </div>

    <!-- 04: Podcast & Interview Production -->
    <div class="service-item">
      <div class="service-item-header">
        <span class="service-num">04 // Podcast &amp; Interview</span>
        <h3 class="service-title"><?php echo esc_html( get_field('home_service_4_title') ?: 'Podcast Production' ); ?></h3>
      </div>
      <div class="service-item-content">
        <p class="service-desc"><?php echo wp_kses_post( get_field('home_service_4_desc') ?: 'A microphone alone does not build an audience. We provide the studio, multi-camera setup, audio production, and branding assets to make your show look and sound market-ready.' ); ?></p>
        <ul class="service-list">
          <li>Studio &amp; Production</li>
          <li>Content Editing &amp; Distribution</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/podcast')); ?>" class="service-btn">Explore Podcast</a>
      </div>
    </div>
  </section>

  <!-- PROCESS -->
  <section class="process" id="process">
    <div class="section-header"><h2 class="section-title">Methodology</h2></div>
    <div class="process-steps">
      <div class="process-step"><div class="step-num">01</div><h3 class="step-title">Brief &amp; Discovery</h3><p class="step-desc">We spend the first week understanding your audience's psychology, competitive landscape, and the emotional response required.</p></div>
      <div class="process-step"><div class="step-num">02</div><h3 class="step-title">Lighting & Setup</h3><p class="step-desc">Every shoot has a deliberate lighting plan drawn from the mood and quality we need to draw from the subject.</p></div>
      <div class="process-step"><div class="step-num">03</div><h3 class="step-title">Capture &amp; Selection</h3><p class="step-desc">Shooting in medium format. From several hundred exposures, we select fewer than fifteen. Curation is vital.</p></div>
      <div class="process-step"><div class="step-num">04</div><h3 class="step-title">Final Delivery</h3><p class="step-desc">Assets delivered as uncompressed TIFF masters alongside web-optimised versions with verified metadata.</p></div>
    </div>
  </section>

  <section class="testimonial" id="testimonials">
    <div class="testimonial-label">Client Voice</div>
    <div>
      <blockquote class="testimonial-quote"><?php echo wp_kses_post( get_field('home_testi_quote') ?: '"When we received the product photographs, our e-commerce team went silent. You could see the weight of the glass, the coolness of the metal. No CGI. We increased conversion on that product page by 34% within a month."' ); ?></blockquote>
      <p class="testimonial-author"><?php echo esc_html( get_field('home_testi_author') ?: '— Priya Sundaram, Creative Director · Maison Kaur' ); ?></p>
    </div>
  </section>

  <section class="cta-banner" id="contact">
    <div class="cta-banner-content">
      <h2 class="cta-banner-title"><?php echo wp_kses_post( get_field('home_cta_title') ?: 'START THE PROJECT.' ); ?></h2>
      <a href="#" class="btn-compound" data-trigger="booking">>Speak to a Creative Director
  <div class="btn-compound-icon">
      <svg viewBox="0 0 24 24" style="width: 20px; height: 20px; fill: currentColor;"><path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
  </div>
</a>
    </div>
  </section>

  <?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
