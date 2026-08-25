<?php
/**
 * Template Name: Thalam Studio
 * Template Post Type: page
 * Description: Full-page utilitarian production hub landing for Thalam Studio.
 */
// Bypass WordPress header/footer entirely — full design control
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thalam Studio — Ad Shoots &amp; Baby Photography</title>
  <meta name="description" content="Thalam Studio — Chithramaya's production house for ad shoots, baby &amp; newborn photography, and commercial sessions. Book your studio date in .">
  <link rel="canonical" href="<?php echo esc_url(home_url('/thalam-studio')); ?>">

  <!-- SEO: Structured Data (JSON-LD) — Local Business Entity ID Card -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "Thalam Studio",
    "image": "<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/og-thalam.jpg",
    "@id": "<?php echo esc_url( home_url('/thalam-studio') ); ?>#business",
    "url": "<?php echo esc_url( home_url('/thalam-studio') ); ?>",
    "telephone": "+91-8098014123",
    "priceRange": "$$$",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Salai Road, Near Bombay Dyeing",
      "addressLocality": "Tiruchirappalli",
      "addressRegion": "Tamil Nadu",
      "postalCode": "620018",
      "addressCountry": "IN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 10.827388663646731,
      "longitude": 78.68519161657615
    },
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday", "Tuesday", "Wednesday",
        "Thursday", "Friday", "Saturday"
      ],
      "opens": "09:00",
      "closes": "20:00"
    },
    "sameAs": [
      "https://www.instagram.com/chithramaya_creatives/"
    ]
  }
  </script>

  <!-- Non-render-blocking font load (Rankability: removes font stall from LCP critical path) -->
  <noscript>
    </noscript>

  <?php wp_head(); ?>
  
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-thalam.css">
</head>
<body>
<?php get_template_part('template-parts/global-nav'); ?>

  <!--<div class="system-bar">
    <span>[ Thalam Studio — Ad Shoots · Baby Photography · Operational ]</span>
    <span> · WhatsApp: +91 80980 14123</span>
  </div>-->



  <section class="hero section-illusion-wrapper" id="hero">
    <div class="graphic-orb orb-lg color-cyan orb-pos-tl"></div>
    <div class="graphic-orb orb-md color-magenta orb-pos-br"></div>

    <img class="hero-img"
      src="<?php echo esc_url( get_field('thalam_hero_img_url') ?: 'https://images.unsplash.com/photo-1664817550969-5e76adc4a3fe?w=2400&q=90&auto=format&fit=crop' ); ?>"
      alt="Top-down view of professional photography gear, Sony Alpha and Canon lenses — Thalam Studio."
      loading="eager">
    <div class="hero-overlay"></div>
    <div class="hero-content">
      <span class="hero-tag"><?php echo esc_html( get_field('thalam_hero_tag') ?: 'Thalam Studio' ); ?></span>
      <h1 class="hero-headline"><?php echo wp_kses_post( get_field('thalam_hero_headline') ?: 'A sanctuary for light, space, and creative <span class="accent-word">precision.</span>' ); ?></h1>
      <div class="hero-body">
        <p><?php echo wp_kses_post( get_field('thalam_hero_body') ?: 'A purpose-built, 2,400 sq ft production environment engineered for high-volume e-commerce, commercial ad shoots, and precision tabletop photography. Located in the heart of Thillai Nagar, Trichy.' ); ?></p>
        <div class="hero-ctas">
          <a href="#" class="btn-pill-dark" data-trigger="booking">Book The Studio</a>
          <a href="#services" class="btn-pill-light">View Capabilities</a>
        </div>
      </div>
    </div>
  </section>

  <div class="status-grid">
    <div class="status-item"><div class="status-dot"></div><div class="status-text"><?php echo wp_kses_post( get_field('thalam_status_1') ?: 'Location: <strong>Prime Thillai Nagar, Trichy</strong>' ); ?></div></div>
    <div class="status-item"><div class="status-dot"></div><div class="status-text"><?php echo wp_kses_post( get_field('thalam_status_2') ?: 'Space: <strong>2,400 sq ft · Sound-Treated</strong>' ); ?></div></div>
    <div class="status-item"><div class="status-dot"></div><div class="status-text"><?php echo wp_kses_post( get_field('thalam_status_3') ?: 'Format: <strong>Medium Format · Full Frame Cinema</strong>' ); ?></div></div>
    <div class="status-item"><div class="status-dot"></div><div class="status-text"><?php echo wp_kses_post( get_field('thalam_status_4') ?: 'Lighting: <strong>Profoto & Aputure Ecosystem</strong>' ); ?></div></div>
  </div>

  <section class="services" id="services">
    <div class="services-header">
      <h2><?php echo esc_html( get_field('thalam_services_title') ?: 'Service Directory // 5 Active' ); ?></h2>
      <span>All inclusive of editing &amp; licensing</span>
    </div>

    <!-- Ad Shoots -->
    <div class="service-row" id="service-ad-shoots">
      <div class="service-index">01</div>
      <div class="service-img-cell">
        <img src="<?php echo esc_url( get_field('thalam_service_1_img') ?: 'https://images.unsplash.com/photo-1758613655304-48776efb25d8?w=800&h=600&q=90&auto=format&fit=crop' ); ?>"
          alt="Professional photographer shooting a model in a high-end studio setting — Thalam Studio ad photography.">
      </div>
      <div class="service-info">
        <div><h3 class="service-name"><?php echo esc_html( get_field('thalam_service_1_title') ?: 'Ad Shoots' ); ?></h3>
        <div class="service-tags"><span class="service-tag">Commercial</span><span class="service-tag">Brand Campaigns</span><span class="service-tag">Product Ads</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Concept-to-delivery production</li>
          <li>Art direction included</li>
          <li>Studio + location options</li>
          <li>Social &amp; print formats</li>
          <li>Cinematic lighting ecosystem</li>
        </ul>
      </div>
      <div class="service-action">
        <a href="#" class="service-cta" id="cta-ad-shoots" data-trigger="booking">Explore Capabilities →</a>
      </div>
    </div>

    <!-- Baby Photography -->
    <div class="service-row" id="service-baby">
      <div class="service-index">02</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=800&h=600&q=90&auto=format&fit=crop"
          alt="Soft-lit newborn baby photography session in studio — Thalam Studio baby photography, .">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Baby &amp; Newborn</h3>
        <div class="service-tags"><span class="service-tag">Newborn</span><span class="service-tag">Milestone Sessions</span><span class="service-tag">First Year</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Controlled, soft studio lighting</li>
          <li>Safe, temperature-regulated space</li>
          <li>Props &amp; wraps included</li>
          <li>Parents welcome on set</li>
          <li>Private online gallery</li>
        </ul>
      </div>
      <div class="service-action">
        <a href="<?php echo esc_url(home_url('/maternity')); ?>" class="service-cta" id="cta-baby">View The Journey →</a>
      </div>
    </div>

    <!-- Podcast & Interview -->
    <div class="service-row" id="service-podcast">
      <div class="service-index">03</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1664555182325-e2323f836760?w=800&h=600&q=90&auto=format&fit=crop"
          alt="Professional podcast microphone setup in studio — Thalam Studio podcast and interview recording.">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Podcast &amp; Interview</h3>
        <div class="service-tags"><span class="service-tag">Video Podcasts</span><span class="service-tag">Interviews</span><span class="service-tag">Live Streams</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Multi-cam 4K setup</li>
          <li>Sound-treated environment</li>
          <li>Broadcast-quality audio</li>
          <li>Set design &amp; styling</li>
          <li>Live switching capability</li>
        </ul>
      </div>
      <div class="service-action">
        <a href="#" class="service-cta" id="cta-podcast" data-trigger="booking">Explore Capabilities →</a>
      </div>
    </div>

    <!-- Product Photography -->
    <div class="service-row" id="service-product">
      <div class="service-index">04</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1698943510859-e97dc93127e9?w=800&h=600&q=90&auto=format&fit=crop&crop=bottom"
          alt="Minimalist product photography setup — Thalam Studio product shoots.">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Product Photography</h3>
        <div class="service-tags"><span class="service-tag">E-Commerce</span><span class="service-tag">Tabletop</span><span class="service-tag">Styling</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>High-volume e-commerce</li>
          <li>Creative tabletop staging</li>
          <li>Precision macro lighting</li>
          <li>Custom background colors</li>
          <li>Retouching &amp; clipping paths</li>
        </ul>
      </div>
      <div class="service-action">
        <a href="#" class="service-cta" id="cta-product" data-trigger="booking">Explore Capabilities →</a>
      </div>
    </div>

    <!-- Food & Beverage -->
    <div class="service-row" id="service-food">
      <div class="service-index">05</div>
      <div class="service-img-cell">
        <img src="https://images.unsplash.com/photo-1728910156510-77488f19b152?w=800&h=600&q=90&auto=format&fit=crop"
          alt="High-end culinary photography — Thalam Studio food and beverage.">
      </div>
      <div class="service-info">
        <div><h3 class="service-name">Food &amp; Beverage</h3>
        <div class="service-tags"><span class="service-tag">Culinary Arts</span><span class="service-tag">Menu Shoots</span><span class="service-tag">Props</span></div></div>
      </div>
      <div class="service-specs">
        <ul class="spec-list">
          <li>Food styling assistance</li>
          <li>Extensive prop library</li>
          <li>Appetizing lighting setups</li>
          <li>Action shots (pours, splashes)</li>
          <li>Social &amp; menu formats</li>
        </ul>
      </div>
      <div class="service-action">
        <a href="#" class="service-cta" id="cta-food" data-trigger="booking">Explore Capabilities →</a>
      </div>
    </div>
  </section>

  <!-- STUDIO CAPABILITIES -->
  <section class="studio-capabilities">
    <h2 class="cap-title">A meticulously designed sanctuary for <em>creative excellence</em>.</h2>
    <p class="cap-desc">Engineered for infinite adaptability with industry-leading lighting grids, dedicated client lounges, and an expansive aesthetic that elevates every production.</p>
  </section>

  <div class="gallery-strip">
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1606814893907-c2e42943c91f?w=800&q=90&auto=format&fit=crop" alt="Woman in white hijab in grayscale — Thalam Studio fine-art portraiture."></div>
    <div class="gallery-strip-item"><img src="<?php echo content_url('themes/chitramaya/assets/img/wedding-staircase.jpg'); ?>" alt="A bride and groom standing on a staircase — Thalam Studio wedding photography."></div>
    <div class="gallery-strip-item"><img src="<?php echo content_url('themes/chitramaya/assets/img/maternity-newborn.jpg'); ?>" alt="A woman holding a newborn baby in her arms — Thalam Studio maternity and newborn."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1656633702381-939966720da4?w=800&q=90&auto=format&fit=crop" alt="A baby sleeping peacefully on a blanket — Thalam Studio newborn photography."></div>
    <div class="gallery-strip-item"><img src="https://images.unsplash.com/photo-1577897113176-6888367369bf?w=800&q=90&auto=format&fit=crop" alt="A family of three sitting together for a portrait — Thalam Studio family photography."></div>
  </div>

  <section class="trust" id="trust">
    <div class="trust-left">
      <div class="trust-label">// Verified Client Telemetry</div>
      <div class="testimonials">
        <div class="testi-item"><p class="testi-quote">"We walked in with a rough concept and walked out with a national-grade campaign. The way they manipulate light and space in that studio makes the impossible look effortless."</p><p class="testi-source">— Commercial Ad Client</p></div>
        <div class="testi-item"><p class="testi-quote">"As a new mother, I was so anxious. But the studio was a warm, quiet sanctuary. I didn't just get beautiful photos; I felt completely safe and cared for."</p><p class="testi-source">— Maternity & Newborn Client</p></div>
        <div class="testi-item"><p class="testi-quote">"When we saw the gallery, we didn't just see pictures; we relived the exact emotions of that day. They gave us our memories back, preserved in breathtaking cinematic quality."</p><p class="testi-source">— Wedding Documentation Client</p></div>
      </div>
    </div>
    <div class="trust-right">
      <div class="kpi-item"><div class="kpi-val">Prime<span>.</span></div><div class="kpi-label">Thillai Nagar Location</div></div>
      <div class="kpi-item"><div class="kpi-val">2.4k<span>sq ft</span></div><div class="kpi-label">Shooting Area & Lounge</div></div>
      <div class="kpi-item"><div class="kpi-val">100<span>%</span></div><div class="kpi-label">Controlled Lighting & Sound</div></div>
      <div class="kpi-item"><div class="kpi-val">12<span>yr</span></div><div class="kpi-label">Production Pedigree</div></div>
    </div>
  </section>

  <section class="booking" id="booking">
    <div class="booking-left">
      <h2><?php echo wp_kses_post( get_field('thalam_booking_headline') ?: 'Book a<br><span>Session</span>' ); ?></h2>
      <p><?php echo wp_kses_post( get_field('thalam_booking_body') ?: 'Fill in the brief on the right and we will respond within 4 business hours with availability, crew allocation, and a formal quote. No obligations.' ); ?></p>
    </div>
    <div class="booking-right">
      <form id="booking-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <?php wp_nonce_field('thalam_booking', 'thalam_nonce'); ?>
        <input type="hidden" name="action" value="thalam_booking">
        <div class="form-row">
          <div class="form-field"><label class="form-label" for="form-name">Full Name</label><input class="form-input" id="form-name" name="name" type="text" placeholder="Your name" required></div>
          <div class="form-field"><label class="form-label" for="form-org">Organisation</label><input class="form-input" id="form-org" name="organisation" type="text" placeholder="Company / Studio"></div>
        </div>
        <div class="form-field"><label class="form-label" for="form-service">Service Required</label>
          <select class="form-select" id="form-service" name="service" required>
            <option value="">Select a service</option>
            <option value="ad-shoots">Ad Shoot / Commercial</option>
            <option value="baby">Baby &amp; Newborn Photography</option>
            <option value="podcast">Podcast &amp; Interview</option>
            <option value="product">Product Photography</option>
            <option value="food">Food &amp; Beverage</option>
          </select>
        </div>
        <div class="form-row">
          <div class="form-field"><label class="form-label" for="form-date">Preferred Date</label><input class="form-input" id="form-date" name="date" type="date" required></div>
          <div class="form-field"><label class="form-label" for="form-location">Location / City</label><input class="form-input" id="form-location" name="location" type="text" placeholder="e.g. " required></div>
        </div>
        <div class="form-field"><label class="form-label" for="form-email">Email Address</label><input class="form-input" id="form-email" name="email" type="email" placeholder="you@company.com" required></div>
        <button type="submit" class="form-submit"><span>Send Enquiry</span><span>→</span></button>
      </form>
    </div>
  </section>

  <footer class="thalam-footer">
    <div class="footer-col">
      <div class="footer-col-label">Thalam Studio</div>
      <p>Ad shoots, baby photography, and commercial production in .</p>
    </div>
    <div class="footer-col">
      <div class="footer-col-label">Contact</div>
      <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20book%20a%20session%20at%20Thalam%20Studio." target="_blank" rel="noopener">WhatsApp Us ↗</a>
      <a href="mailto:studio@thalam.in">studio@thalam.in</a>
      <p>, India</p>
    </div>
    <div class="footer-col" style="border-right:none;">
      <div class="footer-col-label">Part of</div>
      <a href="<?php echo home_url('/'); ?>" style="color:var(--text-dark);font-weight:700;">Chithramaya Creatives ↗</a>
      <p style="margin-top:0.5rem;">The portfolio &amp; editorial brand behind Thalam Studio.</p>
    </div>
  </footer>
  <div class="footer-bottom">
    <p>&copy; <?php echo date('Y'); ?> Thalam Studio. A Chithramaya Creatives Company.</p>
    <a href="<?php echo home_url('/'); ?>" class="footer-chitramaya-link">← Chithramaya Creatives</a>
  </div>

  <?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
