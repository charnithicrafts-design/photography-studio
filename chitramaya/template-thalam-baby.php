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
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;1,400&family=Inter:wght@300;400;700;900&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
  <style>
    /* 1. BASE (Mobile First) */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --bg-dark: #0a0806;
      --bg-light: #f9f6f0;
      --accent-warm: #c48b5e;
      --text-light: #fdfbf7;
      --text-muted: rgba(253,251,247,0.6);
      --font-sans: 'Inter', sans-serif;
      --font-serif: 'EB Garamond', serif;
    }
    body { background: var(--bg-dark); color: var(--text-light); font-family: var(--font-sans); -webkit-font-smoothing: antialiased; }

    /* 2. LAYOUT & MODULES */
    
    /* HERO */
    .hero { position: relative; display: flex; flex-direction: column; justify-content: flex-end; min-height: 100vh; overflow: hidden; padding: 3rem 1.5rem; }
    
    /* The Background: An emotional connection using a warm, moody Unsplash image and a deep gradient */
    .hero-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center 30%; filter: saturate(0.8) contrast(1.1); }
    .hero-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(10,8,6,0.3) 0%, rgba(10,8,6,0.8) 60%, rgba(10,8,6,1) 100%); }
    
    .hero-content { position: relative; z-index: 2; max-width: 800px; }
    .hero-eyebrow { font-size: 0.65rem; letter-spacing: 0.3em; text-transform: uppercase; color: var(--accent-warm); margin-bottom: 1.5rem; display: block; }
    .hero-headline { font-weight: 900; font-size: clamp(3rem, 12vw, 6.5rem); line-height: 0.9; letter-spacing: -0.04em; margin-bottom: 1.5rem; text-transform: uppercase; }
    .hero-desc { font-family: var(--font-serif); font-size: clamp(1.2rem, 5vw, 1.8rem); line-height: 1.5; color: var(--text-muted); font-style: italic; max-width: 600px; }

    /* MANIFESTO */
    .manifesto { padding: 6rem 1.5rem; display: flex; flex-direction: column; gap: 2rem; background: var(--bg-dark); }
    .manifesto-title { font-weight: 900; font-size: clamp(2rem, 8vw, 4rem); letter-spacing: -0.03em; text-transform: uppercase; line-height: 1; }
    .manifesto-body { font-size: 1rem; line-height: 1.8; color: var(--text-muted); max-width: 500px; }

    /* JOURNEY ACCORDION */
    .journey { padding: 4rem 1.5rem; background: var(--bg-light); color: #1a1a1a; display: flex; flex-direction: column; gap: 3rem; }
    .journey-header { margin-bottom: 2rem; }
    .journey-header h2 { font-weight: 900; font-size: clamp(2.5rem, 10vw, 5rem); letter-spacing: -0.04em; text-transform: uppercase; line-height: 0.9; }
    .journey-layout { display: flex; flex-direction: column; gap: 2rem; }
    .journey-accordion { display: flex; flex-direction: column; }
    .journey-card { border-top: 1px solid rgba(0,0,0,0.1); }
    .journey-card:last-child { border-bottom: 1px solid rgba(0,0,0,0.1); }
    .journey-card-toggle { width: 100%; text-align: left; background: none; border: none; padding: 1.5rem 0; cursor: pointer; font-family: inherit; color: inherit; }
    .journey-card-step { font-size: 0.65rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--accent-warm); margin-bottom: 0.5rem; display: block; }
    .journey-card-title { font-family: var(--font-serif); font-style: italic; font-size: 2rem; transition: color 0.3s ease; }
    .journey-card.is-active .journey-card-title, .journey-card-toggle:hover .journey-card-title { color: var(--accent-warm); }
    
    .journey-card-content { max-height: 0; overflow: hidden; opacity: 0; transition: max-height 0.4s ease, opacity 0.4s ease; }
    .journey-card.is-active .journey-card-content { max-height: 1200px; opacity: 1; padding-bottom: 1.5rem; }
    .journey-card-desc { font-size: 0.9rem; line-height: 1.6; color: rgba(0,0,0,0.6); margin-bottom: 1.5rem; max-width: 400px; }
    .journey-card-img-mobile { width: 100%; height: auto; aspect-ratio: 4/3; object-fit: cover; border-radius: 4px; }
    
    .journey-gallery { display: none; }

    /* DESKTOP OVERRIDES */
    @media (min-width: 992px) {
      :root {
        --container-pad: max(4rem, calc((100vw - 1440px) / 2));
      }
      .hero { padding: 6rem var(--container-pad); }
      .manifesto { padding: 5rem var(--container-pad); flex-direction: row; gap: 6rem; align-items: flex-start; justify-content: space-between; }
      .manifesto-body { font-size: 1.15rem; }
      .journey { padding: 8rem var(--container-pad); }
      .journey-layout { display: grid; grid-template-columns: 1fr 1.2fr; gap: 6rem; align-items: stretch; }
      .journey-card-img-mobile { display: none; }
      .journey-gallery { display: block; position: relative; width: 100%; min-height: 600px; }
      .journey-gallery-img { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; opacity: 0; transition: opacity 0.6s ease; }
      .journey-gallery-img.is-active { opacity: 1; z-index: 1; }
    }
  </style>
</head>
<body>

  <?php get_template_part('template-parts/global-nav'); ?>

  <section class="hero">
    <!-- Using a highly emotional, tactile image of a mother and newborn -->
    <?php 
      $hero_bg_image = get_field('hero_bg_image');
      $hero_bg_url = get_field('hero_bg_url');
      
      $bg_src = 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=2400&q=80';
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
      <div class="journey-accordion">
        <?php 
        $steps = get_field('journey_steps');
        if ( $steps ) : 
          foreach( $steps as $index => $step ) : 
            $is_active = ($index === 0) ? 'is-active' : '';
        ?>
            <div class="journey-card <?php echo $is_active; ?>" data-index="<?php echo $index; ?>">
              <button class="journey-card-toggle">
                <span class="journey-card-step"><?php echo esc_html( $step['step_label'] ); ?></span>
                <h3 class="journey-card-title"><?php echo esc_html( $step['title'] ); ?></h3>
              </button>
              <div class="journey-card-content">
                <p class="journey-card-desc"><?php echo wp_kses_post( $step['description'] ); ?></p>
                <?php if ( !empty($step['step_image']['url']) ) : ?>
                  <img class="journey-card-img-mobile" src="<?php echo esc_url($step['step_image']['url']); ?>" alt="<?php echo esc_attr($step['title']); ?>">
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; 
        else : ?>
          <!-- FALLBACK ACCORDION CARDS (If ACF is empty) -->
          <div class="journey-card is-active" data-index="0">
            <button class="journey-card-toggle">
              <span class="journey-card-step">01 — Maternity</span>
              <h3 class="journey-card-title">The Prelude.</h3>
            </button>
            <div class="journey-card-content">
              <p class="journey-card-desc">Studio or location-oriented sessions that honor the quiet power and anticipation of motherhood.</p>
              <img class="journey-card-img-mobile" src="https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=1200&q=80" alt="Maternity Placeholder">
            </div>
          </div>
          <div class="journey-card" data-index="1">
            <button class="journey-card-toggle">
              <span class="journey-card-step">02 — Newborn</span>
              <h3 class="journey-card-title">The Arrival.</h3>
            </button>
            <div class="journey-card-content">
              <p class="journey-card-desc">Intimate, art-directed studio sessions or house visits within the first critical weeks.</p>
              <img class="journey-card-img-mobile" src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=1200&q=80" alt="Newborn Placeholder">
            </div>
          </div>
          <div class="journey-card" data-index="2">
            <button class="journey-card-toggle">
              <span class="journey-card-step">03 — Toddler</span>
              <h3 class="journey-card-title">The Milestone.</h3>
            </button>
            <div class="journey-card-content">
              <p class="journey-card-desc">Capturing the chaotic, beautiful energy of their first year. Unscripted, outdoors, or styled flawlessly.</p>
              <img class="journey-card-img-mobile" src="https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=1200&q=80" alt="Toddler Placeholder">
            </div>
          </div>
        <?php endif; ?>
      </div>
      
      <div class="journey-gallery">
        <?php 
        if ( $steps ) :
          foreach( $steps as $index => $step ) : 
            $is_active = ($index === 0) ? 'is-active' : '';
            if ( !empty($step['step_image']['url']) ) :
        ?>
              <img class="journey-gallery-img <?php echo $is_active; ?>" data-index="<?php echo $index; ?>" src="<?php echo esc_url($step['step_image']['url']); ?>" alt="<?php echo esc_attr($step['title']); ?>">
            <?php else : ?>
              <!-- Fallback placeholder if no image uploaded -->
              <img class="journey-gallery-img <?php echo $is_active; ?>" data-index="<?php echo $index; ?>" src="https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=1200&q=80" alt="Placeholder">
        <?php 
            endif;
          endforeach; 
        else : ?>
          <!-- FALLBACK GALLERY IMAGES -->
          <img class="journey-gallery-img is-active" data-index="0" src="https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=1200&q=80" alt="Maternity Placeholder">
          <img class="journey-gallery-img" data-index="1" src="https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=1200&q=80" alt="Newborn Placeholder">
          <img class="journey-gallery-img" data-index="2" src="https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=1200&q=80" alt="Toddler Placeholder">
        <?php endif; 
        ?>
      </div>
    </div>
  </section>

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
