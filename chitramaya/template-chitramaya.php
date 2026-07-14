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
        header.wp-block-template-part, footer.wp-block-template-part { display: none !important; }
        .chitramaya-marquee {
            white-space: nowrap;
            overflow: hidden;
            border-bottom: var(--border-stark);
            padding: 1rem 0;
            background: var(--color-black);
            color: var(--color-accent);
        }
        .marquee-content {
            display: inline-block;
            animation: marquee 20s linear infinite;
            font-size: 1.5rem;
            text-transform: uppercase;
            font-weight: 700;
        }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main id="primary" class="site-main brut-container">

    <div class="chitramaya-marquee">
        <div class="marquee-content">
            CHITHRAMAYA CREATIVES &nbsp;&nbsp;&nbsp; // &nbsp;&nbsp;&nbsp; WE CRAFT VISUAL LEGACIES &nbsp;&nbsp;&nbsp; // &nbsp;&nbsp;&nbsp; CHITHRAMAYA CREATIVES &nbsp;&nbsp;&nbsp; // &nbsp;&nbsp;&nbsp; WE CRAFT VISUAL LEGACIES &nbsp;&nbsp;&nbsp; // &nbsp;&nbsp;&nbsp; 
        </div>
    </div>

    <!-- Screen-filling typography section (Dumbar/Godmother style) -->
    <section class="chitramaya-hero brut-border-bottom" style="min-height: 90vh; display: flex; flex-direction: column; justify-content: space-between; padding: 2rem;">
        <nav style="display: flex; justify-content: space-between; align-items: center; text-transform: uppercase; font-weight: 600;">
            <div>Chithramaya Creatives (Artist)</div>
            <div><a href="/talam-studio" style="color: var(--color-black); text-decoration: none; border-bottom: 2px solid var(--color-black);">[ Switch to Talam Studio ]</a></div>
        </nav>
        <div style="margin-top: 4rem;">
            <h1 class="brut-massive-text">
                Visual<br>
                Legacies<br>
                <span class="brut-accent-bg" style="display: inline-block; padding: 0 1rem; color: var(--color-black); margin-top: 1rem;">Forged</span>
            </h1>
        </div>
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-end; margin-top: 4rem; gap: 2rem;">
            <p style="font-size: clamp(1.2rem, 3vw, 2rem); max-width: 800px; margin: 0; font-weight: 500; line-height: 1.3;">
                Chithramaya Creatives is an exclusive, narrative-driven photography atelier dedicated to capturing the unvarnished emotion and undeniable authority of your most critical moments.
            </p>
            <a href="#explore" class="brut-btn" style="white-space: nowrap;">Enter Narrative ↓</a>
        </div>
    </section>

    <!-- Narrative flow simulation -->
    <section id="explore" class="chitramaya-horizontal-flow" style="display: flex; flex-wrap: wrap; width: 100%;">
        <article style="flex: 1 1 33.33%; min-width: 300px; padding: 4rem 2rem; border-right: var(--border-stark); border-bottom: var(--border-stark);">
            <div style="font-size: 4rem; font-weight: 700; margin-bottom: 2rem;">[01]</div>
            <h2 class="brut-large-text">Narrative Dissonance</h2>
            <p style="font-size: 1.5rem; margin-top: 2rem; line-height: 1.6;">We don't just document; we direct visual arcs that provoke raw emotion. Photography is not about capturing light, it is about capturing the absence of it.</p>
        </article>
        
        <article style="flex: 1 1 33.33%; min-width: 300px; padding: 4rem 2rem; border-right: var(--border-stark); border-bottom: var(--border-stark); background-color: var(--color-black); color: var(--color-white);">
            <div style="font-size: 4rem; font-weight: 700; margin-bottom: 2rem; color: var(--color-accent);">[02]</div>
            <h2 class="brut-large-text">Uncompromising Aesthetic</h2>
            <p style="font-size: 1.5rem; margin-top: 2rem; line-height: 1.6;">High-contrast, uncompromising quality reserved for those who demand art, not just pictures. Every frame is a declaration.</p>
        </article>

        <article style="flex: 1 1 33.33%; min-width: 300px; padding: 4rem 2rem; border-bottom: var(--border-stark); background-color: var(--color-accent); color: var(--color-black);">
            <div style="font-size: 4rem; font-weight: 700; margin-bottom: 2rem;">[03]</div>
            <h2 class="brut-large-text">The Master's Touch</h2>
            <p style="font-size: 1.5rem; margin-top: 2rem; line-height: 1.6;">Helmed by visionary curation, ensuring your story is not merely seen, but deeply felt and remembered for generations.</p>
            <div style="margin-top: 3rem;">
                <a href="https://www.instagram.com/chithramaya_creatives" target="_blank" class="brut-btn" style="width: 100%; text-align: center;">View Instagram ↗</a>
            </div>
        </article>
    </section>

    <!-- Massive Imagery -->
    <section class="brut-border-bottom" style="padding: 2rem;">
        <img src="https://images.unsplash.com/photo-1542038784456-1ea8e935640e?q=80&w=2070&auto=format&fit=crop" style="width: 100%; height: 60vh; object-fit: cover; filter: grayscale(100%) contrast(120%); border: var(--border-stark); display: block;" alt="Photography Authority" />
    </section>
</main>

<?php wp_footer(); ?>
</body>
</html>
