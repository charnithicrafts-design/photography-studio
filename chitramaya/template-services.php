<?php
/**
 * Template Name: Global Services Layout
 */
// Bypass WordPress FSE header/footer entirely for full design control
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Architecture — Chitramaya & Thalam Studio</title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php get_template_part('template-parts/global-nav'); ?>

<main id="primary" class="site-main services-page">
    
    <header class="services-header">
        <h1 class="brut-massive-text">OUR ARCHITECTURE</h1>
    </header>

    <div class="services-ecosystem">
        <?php 
        $has_services = false;
        
        // Loop through the 5 statically allocated Horizontals
        for ($h = 1; $h <= 5; $h++) :
            $title = get_field("h{$h}_title");
            
            // If the horizontal has no title, skip it
            if (!$title) continue;
            
            $has_services = true;
            $headline = get_field("h{$h}_headline");
            $manifesto = get_field("h{$h}_manifesto");
        ?>
            
            <style>
                .service-action-link {
                    display: inline-block;
                    margin-top: 2rem;
                    padding: 1rem 2rem;
                    border: 1px solid var(--color-dark);
                    font-family: var(--font-mono);
                    font-size: 0.85rem;
                    text-transform: uppercase;
                    letter-spacing: 0.15em;
                    color: var(--color-dark);
                    text-decoration: none;
                    transition: all 0.3s ease;
                }
                .service-action-link:hover {
                    background: var(--color-dark);
                    color: var(--color-light);
                }
                /* Ensure body has dark mode if it's the black background */
                .services-page {
                    background-color: #12100E;
                    color: #F7F5F0;
                }
                .services-page .service-action-link {
                    border-color: #F7F5F0;
                    color: #F7F5F0;
                }
                .services-page .service-action-link:hover {
                    background: #F7F5F0;
                    color: #12100E;
                }
            </style>
            
            <section class="service-horizontal">
                <div class="horizontal-intro">
                    <h2 class="brut-huge-text"><?php echo esc_html($title); ?></h2>
                    <?php if ($headline) : ?><h3 class="horizontal-headline"><?php echo esc_html($headline); ?></h3><?php endif; ?>
                    <?php if ($manifesto) : ?><p class="horizontal-manifesto"><?php echo esc_html($manifesto); ?></p><?php endif; ?>
                    
                    <a href="<?php echo esc_url( get_field("h{$h}_link") ?: '#' ); ?>" class="service-action-link">Explore Architecture &rarr;</a>
                </div>

                <div class="verticals-grid">
                    <?php 
                    // Loop through the 6 statically allocated Verticals for this Horizontal
                    for ($v = 1; $v <= 6; $v++) :
                        $v_title = get_field("h{$h}_v{$v}_title");
                        
                        // If the vertical has no title, skip it
                        if (!$v_title) continue;
                        
                        $v_desc = get_field("h{$h}_v{$v}_desc");
                    ?>
                        <div class="vertical-item">
                            <h4 class="vertical-title"><?php echo esc_html($v_title); ?></h4>
                            <?php if ($v_desc) : ?>
                                <p class="vertical-desc"><?php echo esc_html($v_desc); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </section>

        <?php endfor; ?>
        
        <?php if (!$has_services) : ?>
            <p>No services architected yet. Configure them in the WordPress backend.</p>
        <?php endif; ?>
    </div>

</main>

<?php get_template_part('template-parts/global-footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
