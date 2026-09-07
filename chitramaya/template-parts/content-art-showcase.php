<?php
/**
 * Template part for displaying the Art-Themed Showcase (Editorial Bento Redesign)
 */

$raw_heading = get_field('art_showcase_heading') ?: 'Not Just a Photo.<br>An Archive of Art.';
$heading = str_replace(array('<br>', '<br/>', '<br />'), '<span class="headline-gap"></span>', $raw_heading);
$image = get_field('art_showcase_image');
$image_url = get_field('art_showcase_image_url') ?: 'https://images.unsplash.com/photo-1765267566923-4ce452dd9b02?w=1200&q=90&auto=format&fit=crop';

$final_image_url = ($image && is_array($image)) ? $image['sizes']['large'] : $image_url;
?>

<section class="thalam-art-showcase">
  <div class="art-bento-container">
    <div class="art-bento-card">
      
      <!-- Left: Editorial Storytelling & Craft Proof Points -->
      <div class="art-bento-content">
        <div class="art-section-label">[ THE CRAFT BEHIND THE ARCHIVE ]</div>
        <h2 class="art-headline"><?php echo wp_kses_post($heading); ?></h2>
        
        <p class="art-lead">
          We don't rush through generic poses or force artificial smiles. Inside Thalam Studio, we sculpt painterly portraits that capture the quiet reverence of new life—created with museum-grade patience to outlive phone screens and social feeds.
        </p>

        <div class="art-craft-grid">
          <div class="art-craft-item">
            <span class="art-craft-num">01</span>
            <div class="art-craft-text">
              <h4 class="art-craft-title">Whisper-Quiet Ambient Light</h4>
              <p class="art-craft-desc">Continuous, soft cinematic light. Zero jarring strobes or blinding flashes around sensitive infant eyes.</p>
            </div>
          </div>

          <div class="art-craft-item">
            <span class="art-craft-num">02</span>
            <div class="art-craft-text">
              <h4 class="art-craft-title">Climate-Controlled Sanctuary</h4>
              <p class="art-craft-desc">Calibrated to a gentle 26&deg;C warmth so newborns stay deep in comfortable, undisturbed sleep.</p>
            </div>
          </div>

          <div class="art-craft-item">
            <span class="art-craft-num">03</span>
            <div class="art-craft-text">
              <h4 class="art-craft-title">Museum Archival Inks</h4>
              <p class="art-craft-desc">Printed on 100% cotton rag heirloom paper with pigment inks guaranteed to resist fading for a century.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Tactile Framed Portrait -->
      <div class="art-bento-media">
        <div class="art-media-frame">
          <img src="<?php echo esc_url($final_image_url); ?>" alt="Thalam Studio Fine Art Newborn Portrait" loading="lazy" class="img-tactile" />
          <div class="art-media-caption">
            <span class="caption-dot"></span>
            <span>Documentary &amp; Fine Art &middot; Thalam Studio, Trichy</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
