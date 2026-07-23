<?php
/**
 * Template Name: Portfolio Archive
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Archive - Chitramaya Creatives</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <!-- The Global Nav -->
    <?php get_template_part('template-parts/global-nav'); ?>

    <main id="primary" class="site-main portfolio-archive-page">
        
        <header class="portfolio-header">
            <h1 class="brut-massive-text">THE ARCHIVE</h1>
        </header>

        <section class="portfolio-grid">
            <?php
            $args = array(
                'post_type'      => 'chitramaya_project',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC'
            );
            $portfolio_query = new WP_Query( $args );

            if ( $portfolio_query->have_posts() ) :
                while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post(); 
                    $post_id = get_the_ID();
                    $client = get_field('project_client', $post_id);
                    $year = get_field('project_year', $post_id);
                    $brief = get_field('project_brief', $post_id);
                    $gallery = get_field('project_gallery', $post_id);
                    
                    $categories = get_the_terms($post_id, 'project_category');
                    $cat_name = ($categories && !is_wp_error($categories)) ? $categories[0]->name : 'Selected Work';
            ?>
                
                <article class="portfolio-project">
                    <div class="project-meta">
                        <div class="project-info">
                            <h2 class="project-title"><?php the_title(); ?></h2>
                            <p class="project-details">
                                <span class="project-category"><?php echo esc_html($cat_name); ?></span>
                                <?php if($year): ?><span class="project-year"> // <?php echo esc_html($year); ?></span><?php endif; ?>
                            </p>
                        </div>
                        
                        <div class="project-manifesto">
                            <p><?php echo esc_html($brief); ?></p>
                            
                            <div class="project-credits">
                                <?php for($i=1; $i<=3; $i++): 
                                    $role = get_field("credit_{$i}_role", $post_id);
                                    $name = get_field("credit_{$i}_name", $post_id);
                                    if ($role && $name):
                                ?>
                                    <div class="credit-row">
                                        <span class="credit-role"><?php echo esc_html($role); ?>:</span>
                                        <span class="credit-name"><?php echo esc_html($name); ?></span>
                                    </div>
                                <?php endif; endfor; ?>
                            </div>
                        </div>
                    </div>

                    <?php if($gallery): ?>
                        <div class="project-gallery-grid">
                            <?php foreach( $gallery as $image_id ): 
                                // Since we seeded using WP core IDs, get the URL
                                $image_url = wp_get_attachment_image_url($image_id, 'large');
                                if(!$image_url) continue;
                            ?>
                                <div class="grid-item">
                                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" />
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </article>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<div style="padding: 4rem 1.5rem;"><p>No projects found in the archive.</p></div>';
            endif;
            ?>
        </section>

    </main>

    <?php get_template_part('template-parts/global-footer'); ?>
    <?php wp_footer(); ?>
</body>
</html>
