<?php
/**
 * Template Name: Chitramaya Narrative (Neo-Brutalism)
 * Template Post Type: page
 * Description: Horizontal, narrative-driven flow with screen-filling text blocks.
 */
get_header(); ?>

<main id="primary" class="site-main brut-container">
    <!-- Screen-filling typography section (Dumbar/Godmother style) -->
    <section class="chitramaya-hero" style="min-height: 100vh; display: flex; align-items: center; padding: 2rem;">
        <h1 class="brut-massive-text">
            Chitramaya<br>
            Narrative<br>
            Vision
        </h1>
    </section>

    <!-- Horizontal flow simulation -->
    <section class="chitramaya-horizontal-flow" style="display: flex; overflow-x: auto; min-height: 100vh; border-top: var(--border-stark);">
        <article style="min-width: 100vw; padding: 2rem; border-right: var(--border-stark);">
            <h2 class="brut-massive-text" style="font-size: 5vw;">Emotion</h2>
            <!-- High-res photography placeholder -->
        </article>
        <article style="min-width: 100vw; padding: 2rem; border-right: var(--border-stark);">
            <h2 class="brut-massive-text" style="font-size: 5vw;">Authority</h2>
            <!-- High-res photography placeholder -->
        </article>
    </section>
</main>

<?php get_footer(); ?>
