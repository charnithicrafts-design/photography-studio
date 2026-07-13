<?php
/**
 * Template Name: Talam Studio (Utilitarian Brutalism)
 * Template Post Type: page
 * Description: Rigid, utilitarian, F-pattern layout with strict vertical columns.
 */
get_header(); ?>

<main id="primary" class="site-main brut-container">
    <!-- Strict F-Pattern / Wireframe Header (Balenciaga/XXIX style) -->
    <header class="talam-header brut-border-bottom" style="padding: 1rem;">
        <h1 style="font-size: 2rem; text-transform: uppercase; margin: 0;">Talam Studio // Commercial Services</h1>
    </header>

    <!-- Rigid vertical columns with 1px borders -->
    <div class="brut-grid" style="grid-template-columns: repeat(3, 1fr); min-height: calc(100vh - 60px);">
        
        <section class="talam-column brut-border-right" style="padding: 1rem;">
            <h2 style="text-transform: uppercase; font-size: 1rem; border-bottom: var(--border-stark); padding-bottom: 0.5rem; margin-top: 0;">Industrial</h2>
            <ul style="list-style-type: none; padding: 0; margin-top: 1rem; line-height: 1.5;">
                <li>Factory Floors</li>
                <li>Product Assembly</li>
                <li>Heavy Machinery</li>
            </ul>
        </section>

        <section class="talam-column brut-border-right" style="padding: 1rem;">
            <h2 style="text-transform: uppercase; font-size: 1rem; border-bottom: var(--border-stark); padding-bottom: 0.5rem; margin-top: 0;">Weddings</h2>
            <ul style="list-style-type: none; padding: 0; margin-top: 1rem; line-height: 1.5;">
                <li>Documentary Coverage</li>
                <li>Ceremonial</li>
                <li>Portraits</li>
            </ul>
        </section>

        <section class="talam-column" style="padding: 1rem;">
            <h2 style="text-transform: uppercase; font-size: 1rem; border-bottom: var(--border-stark); padding-bottom: 0.5rem; margin-top: 0;">Events</h2>
            <ul style="list-style-type: none; padding: 0; margin-top: 1rem; line-height: 1.5;">
                <li>Corporate Summits</li>
                <li>Brand Activations</li>
                <li>Live Performances</li>
            </ul>
        </section>

    </div>
</main>

<?php get_footer(); ?>
