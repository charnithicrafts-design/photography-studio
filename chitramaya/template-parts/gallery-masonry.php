<?php
/**
 * Template part for displaying the Tactile Masonry Garden (Newborn Gallery)
 */

$masonry_gallery = get_field('baby_masonry_gallery');

// Curated editorial newborn portraits (Fragile Scale, Quiet Sanctuary, Exhausted Peace, Macro Details)
$fallback_images = [
    'https://images.unsplash.com/photo-1552819289-e14fbbcea868?w=800&q=90&auto=format&fit=crop', // Sleeping newborn in white linen wrap
    'https://images.unsplash.com/photo-1582486225644-aeacf6aa0b1b?w=800&q=90&auto=format&fit=crop', // Parent holding tiny baby hand
    'https://images.unsplash.com/photo-1510632233616-88025944e960?w=800&q=90&auto=format&fit=crop', // Peaceful newborn sleep in warm studio light
    'https://images.unsplash.com/photo-1511948374796-056e8f289f34?w=800&q=90&auto=format&fit=crop', // Soft natural portrait wrapped in cozy blanket
    'https://images.unsplash.com/photo-1596034640116-a68045d257fe?w=800&q=90&auto=format&fit=crop', // Calm infant resting on organic cotton
    'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=800&q=90&auto=format&fit=crop', // Tiny newborn feet macro detail
    'https://images.unsplash.com/photo-1605988178022-c85ec62c7267?w=800&q=90&auto=format&fit=crop', // Delicate fingers holding parent's finger
    'https://images.unsplash.com/photo-1715433485680-9adc962bbcbc?w=800&q=90&auto=format&fit=crop'  // Parents cradling newborn in ambient light
];
?>

<section class="thalam-masonry-garden">
    <div class="masonry-container">
        <?php 
        if ( $masonry_gallery && is_array($masonry_gallery) ) {
            foreach ( $masonry_gallery as $image ) {
                echo '<div class="masonry-item">';
                echo '<img src="' . esc_url($image['sizes']['large']) . '" alt="' . esc_attr($image['alt']) . '" loading="lazy" />';
                echo '</div>';
            }
        } else {
            // Output fallback garden
            foreach ( $fallback_images as $url ) {
                echo '<div class="masonry-item">';
                echo '<img src="' . esc_url($url) . '" alt="Thalam Studio" loading="lazy" />';
                echo '</div>';
            }
        }
        ?>
    </div>
</section>
