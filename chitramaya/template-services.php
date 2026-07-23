<?php
/**
 * Template Name: Global Services Layout
 */
get_header();
?>

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
            
            <section class="service-horizontal">
                <div class="horizontal-intro">
                    <h2 class="brut-huge-text"><?php echo esc_html($title); ?></h2>
                    <?php if ($headline) : ?><h3 class="horizontal-headline"><?php echo esc_html($headline); ?></h3><?php endif; ?>
                    <?php if ($manifesto) : ?><p class="horizontal-manifesto"><?php echo esc_html($manifesto); ?></p><?php endif; ?>
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

<?php
get_footer();
