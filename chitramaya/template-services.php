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
        <?php if ( have_rows('service_horizontals') ) : ?>
            <?php while ( have_rows('service_horizontals') ) : the_row(); 
                $title = get_sub_field('horizontal_title');
                $headline = get_sub_field('headline');
                $manifesto = get_sub_field('manifesto');
            ?>
                
                <section class="service-horizontal">
                    <div class="horizontal-intro">
                        <h2 class="brut-huge-text"><?php echo esc_html($title); ?></h2>
                        <h3 class="horizontal-headline"><?php echo esc_html($headline); ?></h3>
                        <p class="horizontal-manifesto"><?php echo esc_html($manifesto); ?></p>
                    </div>

                    <?php if ( have_rows('verticals') ) : ?>
                        <div class="verticals-grid">
                            <?php while ( have_rows('verticals') ) : the_row(); 
                                $v_title = get_sub_field('title');
                                $v_desc = get_sub_field('description');
                            ?>
                                <div class="vertical-item">
                                    <h4 class="vertical-title"><?php echo esc_html($v_title); ?></h4>
                                    <?php if ($v_desc) : ?>
                                        <p class="vertical-desc"><?php echo esc_html($v_desc); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </section>

            <?php endwhile; ?>
        <?php else : ?>
            <p>No services architected yet. Configure them in the WordPress backend.</p>
        <?php endif; ?>
    </div>

</main>

<?php
get_footer();
