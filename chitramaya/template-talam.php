<?php
/**
 * Template Name: Talam Studio (Utilitarian Brutalism)
 * Template Post Type: page
 * Description: Rigid, utilitarian, F-pattern layout with strict vertical columns.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <style>
        body { margin: 0; padding: 0; }
        .wp-site-blocks { padding: 0 !important; max-width: 100% !important; margin: 0 !important; }
        header.wp-block-template-part, footer.wp-block-template-part { display: none !important; }
        
        .talam-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            min-height: 60vh;
        }
        @media (max-width: 900px) {
            .talam-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main id="primary" class="site-main brut-container">
    <!-- Strict F-Pattern / Wireframe Header (Balenciaga/XXIX style) -->
    <header class="talam-header brut-border-bottom" style="padding: 2rem; display: flex; justify-content: space-between; align-items: center; background-color: var(--color-black); color: var(--color-white);">
        <h1 style="font-size: 3rem; text-transform: uppercase; margin: 0; font-weight: 700; letter-spacing: -0.05em;">Talam Studio</h1>
        <div style="font-size: 1.25rem; text-transform: uppercase; font-weight: 600;">
            <a href="/" style="color: var(--color-accent); text-decoration: none;">[ Switch to Chithramaya ]</a>
        </div>
    </header>
    
    <div class="brut-border-bottom" style="padding: 4rem 2rem; background-color: var(--color-white);">
        <h2 class="brut-massive-text" style="font-size: clamp(3rem, 10vw, 10rem);">Precision.<br>Speed. Scale.</h2>
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-end; margin-top: 4rem; gap: 2rem;">
            <p style="font-size: clamp(1.2rem, 3vw, 2rem); max-width: 800px; margin: 0; font-weight: 500; line-height: 1.3;">
                Talam Studio is the commercial backbone for industrial, high-volume weddings, and corporate events. Engineered for rapid delivery and flawless utilitarian execution.
            </p>
            <a href="#" class="brut-btn brut-btn-accent" style="white-space: nowrap;">Access PhotoOwl Gallery →</a>
        </div>
    </div>

    <!-- Rigid vertical columns with stark borders -->
    <div class="talam-grid">
        
        <section class="talam-column brut-border-right brut-border-bottom" style="padding: 3rem 2rem; display: flex; flex-direction: column; justify-content: space-between;">
            <div>
                <h2 style="text-transform: uppercase; font-size: 2rem; border-bottom: var(--border-stark); padding-bottom: 1rem; margin-top: 0; font-weight: 700;">[01] Industrial Scale</h2>
                <p style="font-size: 1.25rem; margin-top: 2rem; line-height: 1.6;">
                    Ready to document heavy machinery, factory floors, and product assemblies with rigid precision and uncompromising safety protocol.
                </p>
                <ul style="list-style-type: square; padding-left: 1.5rem; margin-top: 2rem; font-size: 1.1rem; line-height: 1.8; font-weight: 600;">
                    <li>Factory Floors & Logistics</li>
                    <li>Heavy Machinery Ops</li>
                    <li>Product Assembly Lines</li>
                </ul>
            </div>
            <img src="https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?q=80&w=2070&auto=format&fit=crop" style="width: 100%; filter: grayscale(100%); margin-top: 3rem; border: var(--border-stark);" alt="Industrial" />
        </section>

        <section class="talam-column brut-border-right brut-border-bottom" style="padding: 3rem 2rem; display: flex; flex-direction: column; justify-content: space-between; background-color: var(--color-black); color: var(--color-white);">
            <div>
                <h2 style="text-transform: uppercase; font-size: 2rem; border-bottom: 1.5px solid var(--color-white); padding-bottom: 1rem; margin-top: 0; font-weight: 700; color: var(--color-accent);">[02] High-Velocity</h2>
                <p style="font-size: 1.25rem; margin-top: 2rem; line-height: 1.6;">
                    Powered by our custom PhotoOwl Client Gallery, your media is processed, indexed, and delivered at unmatched speeds.
                </p>
                <ul style="list-style-type: square; padding-left: 1.5rem; margin-top: 2rem; font-size: 1.1rem; line-height: 1.8; font-weight: 600;">
                    <li>High-Volume Documentary</li>
                    <li>Ceremonial Precision</li>
                    <li>Rapid Portrait Turnover</li>
                </ul>
            </div>
            <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?q=80&w=2070&auto=format&fit=crop" style="width: 100%; filter: grayscale(100%); margin-top: 3rem; border: 1.5px solid var(--color-white);" alt="Weddings" />
        </section>

        <section class="talam-column brut-border-bottom" style="padding: 3rem 2rem; display: flex; flex-direction: column; justify-content: space-between;">
            <div>
                <h2 style="text-transform: uppercase; font-size: 2rem; border-bottom: var(--border-stark); padding-bottom: 1rem; margin-top: 0; font-weight: 700;">[03] Utilitarian Execution</h2>
                <p style="font-size: 1.25rem; margin-top: 2rem; line-height: 1.6;">
                    Zero fluff. We capture the metrics that matter for your brand activation or corporate summit. We operate efficiently in the background.
                </p>
                <ul style="list-style-type: square; padding-left: 1.5rem; margin-top: 2rem; font-size: 1.1rem; line-height: 1.8; font-weight: 600;">
                    <li>Corporate Summits</li>
                    <li>Brand Activations</li>
                    <li>Live Performance Indexing</li>
                </ul>
            </div>
            <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=2069&auto=format&fit=crop" style="width: 100%; filter: grayscale(100%); margin-top: 3rem; border: var(--border-stark);" alt="Events" />
        </section>

    </div>
</main>

<?php wp_footer(); ?>
</body>
</html>
