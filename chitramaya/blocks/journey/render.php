<?php
/**
 * Baby Journey Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

// Load values and assign defaults.
$heading = get_field('journey_heading') ?: 'The Archive<br>of You.';
$steps = get_field('journey_steps');

if (!$steps) {
    // Provide some default placeholder data if empty
    $steps = [
        ['step_label' => '01 — Maternity', 'title' => 'The Prelude.', 'description' => 'Studio or location-oriented sessions.'],
        ['step_label' => '02 — Newborn', 'title' => 'The Arrival.', 'description' => 'Intimate, art-directed studio sessions.']
    ];
}
?>
<section class="journey">
    <div class="journey-header">
        <h2><?php echo wp_kses_post($heading); ?></h2>
    </div>
    <div class="journey-grid">
        <?php foreach ($steps as $step): ?>
            <div class="journey-card">
                <span class="journey-card-step"><?php echo esc_html($step['step_label']); ?></span>
                <h3 class="journey-card-title"><?php echo esc_html($step['title']); ?></h3>
                <p class="journey-card-desc"><?php echo esc_html($step['description']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
