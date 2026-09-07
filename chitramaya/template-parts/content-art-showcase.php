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
  <div class="art-bento-grid">
    
    <!-- Left: Editorial Storytelling & Craft Badges -->
    <div class="art-bento-content">
      <div class="baby-section-label">[ THE THALAM ARCHIVE ]</div>
      <h2 class="art-block-title">Not just a photograph.<br>An heirloom crafted to outlive screens.</h2>
      
      <p class="art-block-desc">
        We don’t rush through generic poses or force artificial smiles. Inside Thalam Studio, we sculpt painterly portraits that capture the quiet reverence of new life—crafted with whisper-quiet continuous light, gentle 26&deg;C warmth, and museum-grade cotton rag prints designed to be held fifty years from today.
      </p>

      <div class="art-spec-pills">
        <span class="art-spec-pill">Whisper-Quiet Ambient Light</span>
        <span class="art-spec-pill">26&deg;C Climate Sanctuary</span>
        <span class="art-spec-pill">100-Year Archival Inks</span>
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
