<?php
$content = file_get_contents('/home/charlie/.gemini/antigravity-cli/brain/e66caf5a-bdb3-450f-b3bf-2b54396c6fd4/scratch/golden.php');

$replacements = [
    // Hero
    "https://images.unsplash.com/photo-1664817550969-5e76adc4a3fe?w=2400&q=90&auto=format&fit=crop" => "<?php echo esc_url( get_field('thalam_hero_img_url') ?: 'https://images.unsplash.com/photo-1664817550969-5e76adc4a3fe?w=2400&q=90&auto=format&fit=crop' ); ?>",
    "<span class=\"hero-tag\">Thalam Studio</span>" => "<span class=\"hero-tag\"><?php echo esc_html( get_field('thalam_hero_tag') ?: 'Thalam Studio' ); ?></span>",
    "<h1 class=\"hero-headline\">A sanctuary for light, space, and creative <span class=\"accent-word\">precision.</span></h1>" => "<h1 class=\"hero-headline\"><?php echo wp_kses_post( get_field('thalam_hero_headline') ?: 'A sanctuary for light, space, and creative <span class=\"accent-word\">precision.</span>' ); ?></h1>",
    "<p>A purpose-built, 2,400 sq ft production environment engineered for high-volume e-commerce, commercial ad shoots, and precision tabletop photography.</p>" => "<p><?php echo wp_kses_post( get_field('thalam_hero_body') ?: 'A purpose-built, 2,400 sq ft production environment engineered for high-volume e-commerce, commercial ad shoots, and precision tabletop photography.' ); ?></p>",
    
    // Status Grid
    "<strong>3 Sessions</strong> Active Today" => "<?php echo wp_kses_post( get_field('thalam_status_1') ?: '<strong>3 Sessions</strong> Active Today' ); ?>",
    "Delivery: <strong>&lt;48 Hours</strong>" => "<?php echo wp_kses_post( get_field('thalam_status_2') ?: 'Delivery: <strong>&lt;48 Hours</strong>' ); ?>",
    "Next Available: <strong>July 18</strong>" => "<?php echo wp_kses_post( get_field('thalam_status_3') ?: 'Next Available: <strong>July 18</strong>' ); ?>",
    "Format: <strong>Medium Format · Full Frame</strong>" => "<?php echo wp_kses_post( get_field('thalam_status_4') ?: 'Format: <strong>Medium Format · Full Frame</strong>' ); ?>",
    
    // Services Title
    "<h2>Service Directory // 4 Active</h2>" => "<h2><?php echo esc_html( get_field('thalam_services_title') ?: 'Service Directory // 4 Active' ); ?></h2>",
    
    // Services Images & Titles (Ad Shoots)
    "https://images.unsplash.com/photo-1758613655304-48776efb25d8?w=800&q=90&auto=format&fit=crop" => "<?php echo esc_url( get_field('thalam_service_1_img') ?: 'https://images.unsplash.com/photo-1758613655304-48776efb25d8?w=800&q=90&auto=format&fit=crop' ); ?>",
    "<h3 class=\"service-name\">Ad Shoots</h3>" => "<h3 class=\"service-name\"><?php echo esc_html( get_field('thalam_service_1_title') ?: 'Ad Shoots' ); ?></h3>",
    "&#8377;25,000" => "<?php echo wp_kses_post( get_field('thalam_service_1_price') ?: '&#8377;25,000' ); ?>",
    
    // Booking
    "<h2>Book a<br><span>Session</span></h2>" => "<h2><?php echo wp_kses_post( get_field('thalam_booking_headline') ?: 'Book a<br><span>Session</span>' ); ?></h2>",
    "<p>Fill in the brief on the right and we will respond within 4 business hours with availability, crew allocation, and a formal quote. No obligations.</p>" => "<p><?php echo wp_kses_post( get_field('thalam_booking_body') ?: 'Fill in the brief on the right and we will respond within 4 business hours with availability, crew allocation, and a formal quote. No obligations.' ); ?></p>"
];

// Clean up the keys and values to avoid executing PHP tags
$safe_replacements = [];
foreach ($replacements as $key => $val) {
    // Just mapping them, the string itself will be injected into the HTML content, which is fine
    $safe_replacements[$key] = $val;
}

foreach ($safe_replacements as $search => $replace) {
    $content = str_replace($search, $replace, $content);
}

file_put_contents('/home/charlie/Games/Projects/chitramaya/chitramaya/template-thalam.php', $content);
echo "Injected ACF fields into golden template and saved as template-thalam.php\n";
