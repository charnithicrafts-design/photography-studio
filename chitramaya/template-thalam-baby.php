<?php
/**
 * Template Name: Thalam Baby
 * Template Post Type: page
 * Description: Editorial newborn, baby, and milestone portraiture — Chithramaya Creatives.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thalam Baby — Newborn &amp; Infant Portraiture | Chithramaya</title>
  <meta name="description" content="Artful newborn, infant, and first-year milestone photography in Trichy. Gentle, patient, and timeless sessions at Thalam Studio or at home.">
  <link rel="canonical" href="<?php echo esc_url(home_url('/thalam-baby')); ?>">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-thalam-baby.css">
</head>
<body class="thalam-baby-page">

  <?php get_template_part('template-parts/global-nav'); ?>

  <main class="site-main">
    
    <!-- =====================================================
         SECTION 0: BENTO HERO
         ===================================================== -->
    <section class="bento-hero-section">
      <div class="bento-hero-grid">
        <div class="bento-hero-main">
          <div class="bento-hero-header">
            <span class="bento-hero-badge">— FIRST YEAR</span>
            <h1 class="bento-hero-h1">They Grow So<br>Fast.</h1>
            <p class="bento-hero-sub">
              From newborn curled-up sleep to the first messy cake smash. We gently archive your child's fleeting early seasons with unhurried patience.
            </p>
          </div>
          <div class="bento-hero-actions">
            <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20book%20a%20Baby%20or%20Newborn%20Session%20with%20Thalam%20Studio." target="_blank" rel="noopener noreferrer" class="btn-primary" data-trigger="booking">
              Book a session
              <span class="btn-primary-icon">
                <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </span>
            </a>
          </div>
        </div>

        <div class="bento-hero-side">
          <div>
            <div class="bento-side-label">Session Focus</div>
            <div class="bento-tag-cloud" style="margin-top: 16px;">
              <span class="bento-tag">Newborn</span>
              <span class="bento-tag">Infant Milestones</span>
              <span class="bento-tag">1st Birthday</span>
              <span class="bento-tag">Toddler Portraits</span>
            </div>
          </div>
          <div class="bento-proof-note">
            <span class="bento-proof-dot"></span>
            <span>House Visits &amp; Studio · Trichy</span>
          </div>
        </div>
      </div>
    </section>

    <!-- =====================================================
         SECTION 1: THE ARCHIVE OF YOU (JOURNEY ACCORDION)
         ===================================================== -->
    <section class="baby-journey-section">
      <div class="baby-journey-container">
        
        <div class="baby-journey-header">
          <div class="baby-section-label">[ THE ARCHIVE OF YOU ]</div>
          <h2 class="baby-journey-title">Four chapters of your child's beginnings.</h2>
          <p class="baby-journey-sub">A seamless, documentary-style archiving of your entire first year. Because you shouldn't have to choose which memory to keep.</p>
        </div>

        <?php 
        $steps = array(
          array(
            'num' => '01',
            'label' => '01 — Maternity',
            'title' => 'The Prelude.',
            'description' => 'Studio or location-oriented sessions that honor the quiet power and anticipation of motherhood before the arrival.',
            'image' => 'https://plus.unsplash.com/premium_photo-1664053453708-ec77b643c533?auto=format&fit=crop&w=1200&q=80'
          ),
          array(
            'num' => '02',
            'label' => '02 — Newborn',
            'title' => 'The Arrival.',
            'description' => 'Intimate, art-directed studio sessions or house visits within the first critical weeks. Warm, safe, and whisper-quiet.',
            'image' => 'https://plus.unsplash.com/premium_photo-1665787379772-0581473a0d94?auto=format&fit=crop&w=1200&q=80'
          ),
          array(
            'num' => '03',
            'label' => '03 — Toddler',
            'title' => 'The Milestone.',
            'description' => 'Capturing the chaotic, beautiful energy of their first year. Unscripted giggles, wobbly first steps, and cake smash celebrations.',
            'image' => 'https://plus.unsplash.com/premium_photo-1664355811153-408074237f94?auto=format&fit=crop&w=1200&q=80'
          ),
          array(
            'num' => '04',
            'label' => '04 — Bump to Baby',
            'title' => 'The Tapestry.',
            'description' => 'A cohesive visual story spanning pregnancy through to your baby’s first full circle around the sun.',
            'image' => 'https://plus.unsplash.com/premium_photo-1661741017786-e098fb1fb7f3?auto=format&fit=crop&w=1200&q=80'
          )
        );
        ?>

        <div class="baby-journey-grid">
          
          <!-- Left: Interactive Accordion Cards -->
          <div class="journey-accordion-col">
            <?php foreach( $steps as $index => $step ) : $is_active = ($index === 0) ? 'is-active' : ''; ?>
              <div class="journey-step-card <?php echo $is_active; ?>" data-index="<?php echo $index; ?>">
                <button class="journey-step-btn" type="button">
                  <div>
                    <span class="journey-step-badge"><?php echo esc_html( $step['label'] ); ?></span>
                    <h3 class="journey-step-heading"><?php echo esc_html( $step['title'] ); ?></h3>
                  </div>
                  <span class="journey-step-icon">+</span>
                </button>
                <div class="journey-step-body">
                  <p class="journey-step-desc"><?php echo esc_html( $step['description'] ); ?></p>
                  <img class="journey-mobile-img" src="<?php echo esc_url( $step['image'] ); ?>" alt="<?php echo esc_attr( $step['title'] ); ?>" loading="lazy">
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Right: Synced Desktop Gallery Display -->
          <div class="journey-gallery-col">
            <?php foreach( $steps as $index => $step ) : $is_active = ($index === 0) ? 'is-active' : ''; ?>
              <div class="journey-gallery-frame <?php echo $is_active; ?>" data-index="<?php echo $index; ?>">
                <img src="<?php echo esc_url( $step['image'] ); ?>" alt="<?php echo esc_attr( $step['title'] ); ?>" loading="lazy" class="img-tactile">
              </div>
            <?php endforeach; ?>
          </div>

        </div>

      </div>
    </section>

    <!-- =====================================================
         SECTION 2: TACTILE MASONRY GALLERY
         ===================================================== -->
    <?php get_template_part('template-parts/gallery-masonry'); ?>

    <!-- =====================================================
         SECTION 3: ART-THEMED SHOWCASE
         ===================================================== -->
    <?php get_template_part('template-parts/content-art-showcase'); ?>

    <!-- =====================================================
         SECTION 4: CAMPAIGN YELLOW PRE-FOOTER
         ===================================================== -->
    <section class="global-cta">
      <h2 class="global-cta-title brut-protect-overflow">Capture the first chapter.</h2>
      <p class="global-cta-sub">
        Gentle, unhurried baby and milestone sessions in our climate-controlled studio or at home.
      </p>
      <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20discuss%20a%20Baby%20or%20Newborn%20shoot." target="_blank" rel="noopener noreferrer" class="btn-primary" data-trigger="booking">
        Book a session
        <span class="btn-primary-icon">
          <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </a>
    </section>

  </main>

  <?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.journey-step-card');
      const galleryFrames = document.querySelectorAll('.journey-gallery-frame');
      
      cards.forEach(card => {
        const btn = card.querySelector('.journey-step-btn');
        btn.addEventListener('click', () => {
          if(card.classList.contains('is-active')) return;
          
          const index = card.getAttribute('data-index');
          
          cards.forEach(c => c.classList.remove('is-active'));
          galleryFrames.forEach(frame => frame.classList.remove('is-active'));
          
          card.classList.add('is-active');
          const targetFrame = document.querySelector(`.journey-gallery-frame[data-index="${index}"]`);
          if(targetFrame) targetFrame.classList.add('is-active');
        });
      });
    });
  </script>
</body>
</html>
