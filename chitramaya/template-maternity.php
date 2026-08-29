<?php
/**
 * Template Name: Maternity & Bump-to-Baby
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maternity & Bump-to-Baby — Chithramaya</title>
  <?php wp_head(); ?>

  <link rel="stylesheet" media="print" onload="this.media='all'" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-maternity.css">
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>

<main class="maternity-page">
  <!-- HERO -->
  <section class="hero section-illusion-wrapper">
    <div class="graphic-orb orb-lg color-cyan orb-pos-tl"></div>
    <div class="graphic-orb orb-md color-magenta orb-pos-br"></div>

    <img class="hero-img" src="<?php echo esc_url( get_field('pillar_hero_bg_url') ?: 'https://images.unsplash.com/photo-1654894811904-d17107a20c29?auto=format&fit=crop&w=2000&q=80' ); ?>" alt="Maternity Hero">
    <div class="hero-content">
      <h1 class="hero-title"><?php echo wp_kses_post( get_field('pillar_hero_title') ?: 'The Genesis of Your <em>Legacy</em>.' ); ?></h1>
      <p class="hero-desc"><?php echo wp_kses_post( get_field('pillar_hero_desc') ?: 'There is a sacred quiet that comes with pregnancy. It is the feeling of holding a whole new world inside you. Before they are a person you can hold in your arms, they are a seed of wonder growing in the secret, safe sanctuary of your own heart.' ); ?></p>
      <button class="hero-btn" data-trigger="booking">Book your session.</button>
    </div>
  </section>

  <!-- MANIFESTO -->
  <section class="maternity-manifesto">
    <span class="manifesto-label">Before they arrive.</span>
    <h2>There's a very short window when it looks exactly like this. We photograph it carefully.</h2>
    <p>Your body is doing holy work. We are here to archive its breathtaking power.</p>
  </section>

  <!-- DUAL PANE -->
  <section class="dual-pane">
    <!-- Studio -->
    <a href="<?php echo esc_url(home_url('/thalam-studio')); ?>" class="pane" style="text-decoration:none; color:inherit;">
      <img class="pane-img" src="<?php echo esc_url( get_field('pillar_sec1_img') ?: 'https://images.unsplash.com/photo-1542385151-efd9000785a0?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Studio Maternity">
      <div class="pane-content">
        <span class="pane-subtitle">01 // The Sanctuary</span>
        <h3 class="pane-title">Studio Style</h3>
        <p class="pane-desc"><?php echo wp_kses_post( get_field('pillar_sec1_desc') ?: 'Art themed sessions crafted to capture the quiet power and beauty of your journey.' ); ?></p>
      </div>
    </a>
    <!-- Outdoor -->
    <div class="pane">
      <img class="pane-img" src="<?php echo esc_url( get_field('pillar_sec2_img') ?: 'https://images.unsplash.com/photo-1705746401414-8bae063ee19f?auto=format&fit=crop&w=1200&q=80' ); ?>" alt="Outdoor Maternity">
      <div class="pane-content">
        <span class="pane-subtitle">02 // The Location</span>
        <h3 class="pane-title">Outdoor Style</h3>
        <p class="pane-desc"><?php echo wp_kses_post( get_field('pillar_sec2_desc') ?: 'Location oriented sessions celebrating the organic blossoming of motherhood in beautiful, natural light.' ); ?></p>
      </div>
    </div>
  </section>

  <!-- FAMILY & BABY SHOWER -->
  <section class="info-section">
    <div class="bento-wrapper bento-2">
      <div class="bento-item">
        <img src="https://images.unsplash.com/photo-1760328249117-18488466e34c?auto=format&fit=crop&w=800&q=80" alt="Generational Family Gathering">
      </div>
      <div class="bento-item">
        <img src="https://plus.unsplash.com/premium_photo-1677654190250-e9a946a29a5a?auto=format&fit=crop&w=600&q=80" alt="Baby Shower Decor Details">
      </div>
    </div>
    <div class="info-content">
      <h3 class="info-title">Family Portraits & Baby Shower</h3>
      <p class="info-desc"><?php echo wp_kses_post( get_field('pillar_sec3_desc') ?: 'A return ticket to the fleeting season of becoming. Joyful, documentary-style coverage of your baby shower and generational family portraits, capturing the community waiting to welcome your child.' ); ?></p>
    </div>
  </section>

  <!-- BUMP TO BABY -->
  <section class="info-section reverse">
    <div class="bento-wrapper bento-3">
      <div class="bento-item">
        <img src="https://images.unsplash.com/photo-1569952524646-705a421e054c?auto=format&fit=crop&w=800&q=80" alt="Maternity Bump Portrait">
      </div>
      <div class="bento-item">
        <img src="https://images.unsplash.com/photo-1605988178022-c85ec62c7267?auto=format&fit=crop&w=600&q=80" alt="Newborn Details Hands">
      </div>
      <div class="bento-item">
        <img src="https://images.unsplash.com/photo-1715433485680-9adc962bbcbc?auto=format&fit=crop&w=600&q=80" alt="Parents Holding Newborn">
      </div>
    </div>
    <div class="info-content">
      <h3 class="info-title">Bump to Baby</h3>
      <p class="info-desc"><?php echo wp_kses_post( get_field('pillar_sec4_desc') ?: 'A cohesive visual story spanning your pregnancy through to your newborn’s first weeks. We preserve the seamless transition from brave anticipation to joyous arrival.' ); ?></p>
    </div>
  </section>

  <!-- CTA / JOURNEY -->
  <section class="booking-journey">
    <h2>The Journey to Your Archive</h2>
    <div class="timeline">
      <div class="timeline-step">
        <span class="step-num">01</span>
        <span class="step-text">Initial Consultation & Vision</span>
      </div>
      <div class="timeline-step">
        <span class="step-num">02</span>
        <span class="step-text">Wardrobe & Location Styling</span>
      </div>
      <div class="timeline-step">
        <span class="step-num">03</span>
        <span class="step-text">The Cinematic Shoot</span>
      </div>
      <div class="timeline-step">
        <span class="step-num">04</span>
        <span class="step-text">The Heirloom Reveal</span>
      </div>
    </div>
    <button class="hero-btn" data-trigger="booking" style="border-color: #fff; color: #fff;">Begin the Consultation</button>
  </section>
</main>
<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
