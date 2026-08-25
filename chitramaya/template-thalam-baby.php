<?php
/**
 * Template Name: Thalam Baby & Maternity
 * Template Post Type: page
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thalam Studio — Baby & Maternity</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,400&family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
  <?php wp_head(); ?>
  
  <link rel="stylesheet" media="print" onload="this.media='all'" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-thalam-baby.css">
</head>
<body>

  <?php get_template_part('template-parts/global-nav'); ?>

  <section class="hero section-illusion-wrapper">
    <div class="graphic-orb orb-lg color-cyan orb-pos-tl"></div>
    <div class="graphic-orb orb-md color-magenta orb-pos-br"></div>

    <!-- Using a highly emotional, tactile image of a mother and newborn -->
    <?php 
      $hero_bg_image = get_field('hero_bg_image');
      $hero_bg_url = get_field('hero_bg_url');
      
      $bg_src = 'https://images.unsplash.com/photo-1753705745770-6ceefc22ed33?auto=format&fit=crop&w=2400&q=80';
      $bg_alt = 'Mother gently holding newborn baby';
      
      if ( $hero_bg_image && isset($hero_bg_image['url']) ) {
          $bg_src = $hero_bg_image['url'];
          $bg_alt = $hero_bg_image['alt'] ?: 'Hero background';
      } elseif ( $hero_bg_url ) {
          $bg_src = $hero_bg_url;
          $bg_alt = 'Hero background';
      }
    ?>
    <img src="<?php echo esc_url( $bg_src ); ?>" alt="<?php echo esc_attr( $bg_alt ); ?>" class="hero-img">
    
    <!-- The gradient overlay creates the emotional transition from the image into the brutalist layout -->
    <div class="hero-overlay"></div>
    
    <div class="hero-content">
      <span class="hero-eyebrow">Thalam Studio</span>
      <h1 class="hero-headline"><?php echo wp_kses_post( get_field('hero_headline') ?: 'The Weight of a<br>Real Moment.' ); ?></h1>
      <p class="hero-desc"><?php echo esc_html( get_field('hero_desc') ?: 'They are only this small for a second. We archive the magic, the chaos, and the delicate art of your family\'s beginning.' ); ?></p>
    </div>
  </section>

  <section class="manifesto">
    <h2 class="manifesto-title">Every Breath<br>is a<br>Masterpiece.</h2>
    <div class="manifesto-body">
      <p>We don’t just take photographs. We construct art around the most fragile, fleeting moments of your life. From the quiet anticipation of maternity to the unpredictable joy of a toddler's first steps, Thalam Studio is a space designed to capture the soul of your growing family.</p>
      <br>
      <p>No stiff poses. No artificial smiles. Just the raw, tactile truth of your love, framed in light.</p>
    </div>
  </section>

  <section class="journey">
    <div class="journey-header">
      <h2><?php echo wp_kses_post( get_field('journey_heading') ?: 'The Archive<br>of You.' ); ?></h2>
    </div>
    
    <div class="journey-layout">
      <?php 
      // Manually construct the steps array from the 4 flat ACF field groups (or defaults)
      $steps = array(
        array(
          'label' => get_field('step_1_label') ?: '01 — Maternity',
          'title' => get_field('step_1_title') ?: 'The Prelude.',
          'description' => get_field('step_1_description') ?: 'Studio or location-oriented sessions that honor the quiet power and anticipation of motherhood.',
          'image' => get_field('step_1_image'),
          'fallback_image' => 'https://plus.unsplash.com/premium_photo-1664053453708-ec77b643c533?auto=format&fit=crop&w=1200&q=80'
        ),
        array(
          'label' => get_field('step_2_label') ?: '02 — Newborn',
          'title' => get_field('step_2_title') ?: 'The Arrival.',
          'description' => get_field('step_2_description') ?: 'Intimate, art-directed studio sessions or house visits within the first critical weeks.',
          'image' => get_field('step_2_image'),
          'fallback_image' => 'https://plus.unsplash.com/premium_photo-1665787379772-0581473a0d94?auto=format&fit=crop&w=1200&q=80'
        ),
        array(
          'label' => get_field('step_3_label') ?: '03 — Toddler',
          'title' => get_field('step_3_title') ?: 'The Milestone.',
          'description' => get_field('step_3_description') ?: 'Capturing the chaotic, beautiful energy of their first year. Unscripted, outdoors, or styled flawlessly.',
          'image' => get_field('step_3_image'),
          'fallback_image' => 'https://plus.unsplash.com/premium_photo-1664355811153-408074237f94?auto=format&fit=crop&w=1200&q=80'
        ),
        array(
          'label' => get_field('step_4_label') ?: '04 — Bump to Baby',
          'title' => get_field('step_4_title') ?: 'The Tapestry.',
          'description' => get_field('step_4_description') ?: 'A seamless, documentary-style archiving of your entire journey. Because you shouldn\'t have to choose which memory to keep.',
          'image' => get_field('step_4_image'),
          'fallback_image' => 'https://plus.unsplash.com/premium_photo-1661741017786-e098fb1fb7f3?auto=format&fit=crop&w=1200&q=80'
        )
      );
      ?>
      <div class="journey-accordion">
        <?php foreach( $steps as $index => $step ) : $is_active = ($index === 0) ? 'is-active' : ''; ?>
          <div class="journey-card <?php echo $is_active; ?>" data-index="<?php echo $index; ?>">
            <button class="journey-card-toggle">
              <div>
                <span class="journey-card-step"><?php echo esc_html( $step['label'] ); ?></span>
                <h3 class="journey-card-title"><?php echo esc_html( $step['title'] ); ?></h3>
              </div>
              <span class="journey-card-icon">+</span>
            </button>
            <div class="journey-card-content">
              <p class="journey-card-desc"><?php echo wp_kses_post( $step['description'] ); ?></p>
              <?php if ( !empty($step['image']['url']) ) : ?>
                <img class="journey-card-img-mobile" src="<?php echo esc_url($step['image']['url']); ?>" alt="<?php echo esc_attr($step['title']); ?>">
              <?php else : ?>
                <img class="journey-card-img-mobile" src="<?php echo esc_url($step['fallback_image']); ?>" alt="Placeholder">
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      
      <div class="journey-gallery">
        <?php foreach( $steps as $index => $step ) : $is_active = ($index === 0) ? 'is-active' : ''; ?>
          <?php if ( !empty($step['image']['url']) ) : ?>
            <img class="journey-gallery-img <?php echo $is_active; ?>" data-index="<?php echo $index; ?>" src="<?php echo esc_url($step['image']['url']); ?>" alt="<?php echo esc_attr($step['title']); ?>">
          <?php else : ?>
            <!-- Fallback placeholder if no image uploaded -->
            <img class="journey-gallery-img <?php echo $is_active; ?>" data-index="<?php echo $index; ?>" src="<?php echo esc_url($step['fallback_image']); ?>" alt="Placeholder">
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php 
    // Plant the garden: The tactile masonry gallery
    get_template_part('template-parts/gallery-masonry'); 
    
    // The centerpiece: The art-themed showcase
    get_template_part('template-parts/content-art-showcase'); 
  ?>

<?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const cards = document.querySelectorAll('.journey-card');
      const galleryImgs = document.querySelectorAll('.journey-gallery-img');
      
      cards.forEach(card => {
        const toggle = card.querySelector('.journey-card-toggle');
        toggle.addEventListener('click', () => {
          // If already active, do nothing (keeps at least one open)
          if(card.classList.contains('is-active')) return;
          
          const index = card.getAttribute('data-index');
          
          // Deactivate all
          cards.forEach(c => c.classList.remove('is-active'));
          galleryImgs.forEach(img => img.classList.remove('is-active'));
          
          // Activate clicked
          card.classList.add('is-active');
          const targetImg = document.querySelector(`.journey-gallery-img[data-index="${index}"]`);
          if(targetImg) targetImg.classList.add('is-active');
        });
      });
    });
  </script>
</body>
</html>
