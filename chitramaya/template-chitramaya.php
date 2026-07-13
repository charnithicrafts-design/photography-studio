<?php
/**
 * Template Name: Chitramaya Narrative (Neo-Brutalism)
 * Template Post Type: page
 * Description: Horizontal, narrative-driven flow with screen-filling text blocks.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        /* Specific page overrides to bypass WP's layout container */
        body { margin: 0; padding: 0; }
        .wp-site-blocks { padding: 0 !important; max-width: 100% !important; margin: 0 !important; }
        /* Hide twenty twenty five headers */
        header.wp-block-template-part, footer.wp-block-template-part { display: none !important; }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main id="primary" class="site-main brut-container">
    <!-- Screen-filling typography section (Dumbar/Godmother style) -->
    <section class="chitramaya-hero brut-border-bottom" style="min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between; padding: 2rem;">
        <nav style="display: flex; justify-content: space-between; align-items: center; text-transform: uppercase; font-weight: 600;">
            <div>Chitramaya (Artist)</div>
            <div><a href="/talam-studio" style="color: var(--color-black); text-decoration: none;">[ Switch to Talam Studio ]</a></div>
        </nav>
        <div>
            <h1 class="brut-massive-text">
                Vision<br>
                Without<br>
                <span class="brut-accent-bg" style="display: inline-block; padding: 0 1rem; color: var(--color-black);">Compromise</span>
            </h1>
        </div>
        <div style="align-self: flex-end; width: 100%; text-align: right;">
            <a href="#explore" class="brut-btn">Enter Narrative ↓</a>
        </div>
    </section>

    <!-- Narrative flow simulation -->
    <section id="explore" class="chitramaya-horizontal-flow" style="display: flex; flex-wrap: wrap; width: 100%;">
        <article style="flex: 1 1 50%; min-width: 300px; padding: 4rem 2rem; border-right: var(--border-stark); border-bottom: var(--border-stark);">
            <h2 class="brut-large-text">Emotion</h2>
            <p style="font-size: 1.5rem; max-width: 500px; margin-top: 2rem;">Photography is not about capturing light, it is about capturing the absence of it. We design narrative arcs through visual dissonance.</p>
        </article>
        <article style="flex: 1 1 50%; min-width: 300px; padding: 4rem 2rem; border-bottom: var(--border-stark); background-color: var(--color-black); color: var(--color-white);">
            <h2 class="brut-large-text">Authority</h2>
            <p style="font-size: 1.5rem; max-width: 500px; margin-top: 2rem; opacity: 0.8;">The master's touch leaves no room for hesitation. Every frame is a declaration.</p>
            <div style="margin-top: 4rem;">
                <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?q=80&w=2070&auto=format&fit=crop" style="width: 100%; filter: grayscale(100%) contrast(120%); border: var(--border-stark); display: block;" alt="Photography Authority" />
            </div>
        </article>
    </section>
</main>

<?php wp_footer(); ?>
</body>
</html>
