<?php
/**
 * Template Name: Chitramaya Narrative (Neo-Brutalism)
 * Template Post Type: page
 * Description: Horizontal, enterprise UX portfolio flow with screen-filling text blocks and tactile images.
 */
get_header(); ?>

<main id="primary" class="site-main brut-container">
    <!-- Hero Section: Clear USP & Frictionless CTA -->
    <section class="chitramaya-hero brut-border-bottom" style="min-height: 90vh; display: flex; flex-direction: column; justify-content: space-between; padding: 2rem;">
        <div>
            <h1 class="brut-massive-text">
                Chitramaya<br>
                Creatives
            </h1>
            <p style="font-size: 1.5rem; max-width: 600px; margin-top: 2rem; font-weight: 700; line-height: 1.4;">
                We don't just capture images. We engineer visual authority through unapologetic emotion, rigorous process, and tactile aesthetics.
            </p>
        </div>
        <div>
            <a href="#process" class="brut-btn">Explore The Process ↓</a>
        </div>
    </section>

    <!-- Case Study Section (Horizontal Scroll Simulation) -->
    <section id="process" class="chitramaya-horizontal-flow" style="display: flex; flex-wrap: nowrap; overflow-x: auto; min-height: 100vh;">
        
        <!-- Step 1: The Problem -->
        <article style="min-width: 100vw; padding: 2rem; display: flex; flex-direction: column; justify-content: center; border-right: var(--border-stark);">
            <div style="max-width: 800px;">
                <span class="talam-ui" style="display: block; margin-bottom: 1rem; color: var(--color-accent);">01 // The Problem</span>
                <h2 class="brut-huge-text" style="margin-bottom: 2rem;">Digital<br>Apathy</h2>
                <p style="font-size: 1.25rem; line-height: 1.6;">
                    Modern audiences are desensitized to polished, artificial perfection. The challenge was to break through the endless digital scroll by forcing the viewer to <em>feel</em> the texture of the subject—to create a photograph so viscerally real that it borders on the tactile.
                </p>
            </div>
        </article>

        <!-- Step 2: The Tactile Result -->
        <article style="min-width: 100vw; padding: 2rem; display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; align-items: center; border-right: var(--border-stark);">
            <div>
                <span class="talam-ui" style="display: block; margin-bottom: 1rem; color: var(--color-accent);">02 // The Result</span>
                <h2 class="brut-huge-text" style="margin-bottom: 2rem;">Tactile<br>Reality</h2>
                <p style="font-size: 1.25rem; line-height: 1.6; max-width: 500px; margin-bottom: 2rem;">
                    By manipulating harsh studio lighting and leveraging uncompressed medium-format sensors, we extracted every ounce of physical texture from the subject. The result is an image you don't just see—you can feel the grit, the fabric, and the breath.
                </p>
                <a href="/contact" class="brut-btn">Commission A Study</a>
            </div>
            <div style="height: 80vh; overflow: hidden; border: var(--border-stark);">
                <!-- Tactile Image Placeholder with Perfect SEO Alt Tag -->
                <img src="https://images.unsplash.com/photo-1517429128955-67ff5c1e29da?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" 
                     alt="High-contrast black and white portrait demonstrating intense tactile texture, sharp focus on facial details, and emotional gravity, captured by Chitramaya Creatives."
                     class="img-tactile" style="height: 100%;">
            </div>
        </article>

    </section>
</main>

<?php get_footer(); ?>
