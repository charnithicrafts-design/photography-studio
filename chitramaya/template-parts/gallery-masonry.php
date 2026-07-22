<?php
/**
 * Template part for displaying the Tactile Masonry Garden (Newborn Gallery)
 */

$masonry_gallery = get_field('baby_masonry_gallery');

// Hardcoded fallback Unsplash URLs based on our emotional archetypes (Fragile Scale, Quiet Chaos, Exhausted Peace, Details)
$fallback_images = [
    'https://images.unsplash.com/photo-1519689680058-324335c77eba?w=800&q=90&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1519340333755-56e9c1d04579?w=800&q=90&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=800&q=90&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1544126592-807ade215a0b?w=800&q=90&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1511289081-d06dda19034d?w=800&q=90&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?w=800&q=90&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1542037104-58e376043640?w=800&q=90&auto=format&fit=crop',
    'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?w=800&q=90&auto=format&fit=crop'
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
                echo '<img src="' . esc_url($url) . '" alt="Emotional Newborn Photography Archive" loading="lazy" />';
                echo '</div>';
            }
        }
        ?>
    </div>
</section>
