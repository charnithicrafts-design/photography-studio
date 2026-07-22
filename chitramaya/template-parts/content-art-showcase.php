<?php
/**
 * Template part for displaying the Art-Themed Showcase
 */

$heading = get_field('art_showcase_heading') ?: 'NOT JUST A PHOTO.<br>AN ARCHIVE OF ART.';
$image = get_field('art_showcase_image');
$image_url = get_field('art_showcase_image_url') ?: 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?w=1200&q=90&auto=format&fit=crop';

$final_image_url = ($image && is_array($image)) ? $image['sizes']['large'] : $image_url;
?>

<section class="thalam-art-showcase">
    <div class="art-split-layout">
        <div class="art-text-pane">
            <h2 class="art-headline"><?php echo wp_kses_post($heading); ?></h2>
        </div>
        <div class="art-image-pane">
            <img src="<?php echo esc_url($final_image_url); ?>" alt="Thalam Studio Art Direction" loading="lazy" />
        </div>
    </div>
</section>
