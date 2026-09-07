<?php
/**
 * Template part for displaying the Art-Themed Showcase (Editorial Bento Redesign)
 */

$raw_heading = get_field('art_showcase_heading') ?: 'Not Just a Photo.<br>An Archive of Art.';
$image = get_field('art_showcase_image');
$image_url = get_field('art_showcase_image_url') ?: 'https://images.unsplash.com/photo-1765267566923-4ce452dd9b02?w=1200&q=90&auto=format&fit=crop';

$final_image_url = ($image && is_array($image)) ? $image['sizes']['large'] : $image_url;
?>

<section class="thalam-art-showcase">
  <div class="art-bento-grid">
    
    <!-- Left: Editorial Storytelling & Craft Badges -->
    <div class="art-bento-content">
      <div class="baby-section-label">[ THE THALAM ARCHIVE ]</div>
      <h2 class="art-block-title"><?php echo wp_kses_post($raw_heading); ?></h2>
      
      <p class="art-block-desc">
        The studio moves at the pace of a newborn’s breath. Soft warmth, unbroken quiet, and unhurried hours where you can simply hold your baby and watch the world slow down.
      </p>

      <div class="art-craft-grid">
        <div class="art-craft-item">
          <span class="art-craft-num">01</span>
          <div class="art-craft-text">
            <h4 class="art-craft-title">Whisper-Soft Light</h4>
            <p class="art-craft-desc">A painterly wash of continuous light that traces tiny eyelashes and curled fingers—soft as morning through a window, so sleep stays unbroken.</p>
          </div>
        </div>

        <div class="art-craft-item">
          <span class="art-craft-num">02</span>
          <div class="art-craft-text">
            <h4 class="art-craft-title">Cocoon Warmth &amp; Stillness</h4>
            <p class="art-craft-desc">A space kept gently warm and quiet, letting tiny shoulders relax and breathing settle into the deepest, undisturbed sleep.</p>
          </div>
        </div>

        <div class="art-craft-item">
          <span class="art-craft-num">03</span>
          <div class="art-craft-text">
            <h4 class="art-craft-title">Art Made to Be Held</h4>
            <p class="art-craft-desc">Heavy museum cotton paper and timeless pigment with real weight in your hands. An heirloom your child will hold decades from now when looking back at where they began.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Right: Tactile Media Portrait -->
    <div class="art-bento-media">
      <div class="art-img-wrap">
        <img src="<?php echo esc_url($final_image_url); ?>" alt="Thalam Studio Fine Art Newborn Portrait" loading="lazy" class="img-tactile" />
      </div>
    </div>

  </div>
</section>
