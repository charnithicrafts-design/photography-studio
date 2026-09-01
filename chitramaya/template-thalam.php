<?php
/**
 * Template Name: Thalam Studio
 * Template Post Type: page
 * Description: Production facility landing for Thalam Studio — Chithramaya Creatives.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thalam Studio — Production Facility | Chithramaya</title>
  <meta name="description" content="Thalam Studio — Chithramaya's purpose-built 2,400 sq ft production house in Trichy for ad shoots, broadcast podcasts, commercial sets, and portraiture.">
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

  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-thalam.css">
</head>
<body class="thalam-page">

  <?php get_template_part('template-parts/global-nav'); ?>

  <main class="site-main">
    
    <!-- =====================================================
         SECTION 0: BENTO HERO
         ===================================================== -->
    <section class="bento-hero-section">
      <div class="bento-hero-grid">
        <div class="bento-hero-main">
          <div class="bento-hero-header">
            <span class="bento-hero-badge">— PRODUCTION FACILITY</span>
            <h1 class="bento-hero-h1">The Space for<br>the Story.</h1>
            <p class="bento-hero-sub">
              A purpose-built 2,400 sq ft production environment in Trichy engineered for broadcast audio, precision lighting, commercial sets, and portraiture.
            </p>
          </div>
          <div class="bento-hero-actions">
            <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20tour%20and%20book%20a%20session%20at%20Thalam%20Studio." target="_blank" rel="noopener noreferrer" class="btn-primary" data-trigger="booking">
              Tour Thalam Studio
              <span class="btn-primary-icon">
                <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
              </span>
            </a>
          </div>
        </div>

        <div class="bento-hero-side">
          <div>
            <div class="bento-side-label">Facility Capabilities</div>
            <div class="bento-tag-cloud" style="margin-top: 16px;">
              <span class="bento-tag">Podcast Suite</span>
              <span class="bento-tag">Commercial Sets</span>
              <span class="bento-tag">Controlled Light</span>
              <span class="bento-tag">Baby Studio</span>
              <span class="bento-tag">Maternity</span>
            </div>
          </div>
          <div class="bento-proof-note">
            <span class="bento-proof-dot"></span>
            <span>2,400 sq ft · Thillai Nagar, Trichy</span>
          </div>
        </div>
      </div>
    </section>

    <!-- =====================================================
         SECTION 1: STATUS TELEMETRY BAR
         ===================================================== -->
    <section class="thalam-telemetry-bar">
      <div class="telemetry-grid">
        <div class="telemetry-item">
          <span class="telemetry-dot"></span>
          <span class="telemetry-text">Location: <strong>Prime Thillai Nagar, Trichy</strong></span>
        </div>
        <div class="telemetry-item">
          <span class="telemetry-dot"></span>
          <span class="telemetry-text">Space: <strong>2,400 sq ft · Sound-Treated</strong></span>
        </div>
        <div class="telemetry-item">
          <span class="telemetry-dot"></span>
          <span class="telemetry-text">Format: <strong>Medium Format · Cinema 4K</strong></span>
        </div>
        <div class="telemetry-item">
          <span class="telemetry-dot"></span>
          <span class="telemetry-text">Lighting: <strong>Profoto &amp; Aputure Ecosystem</strong></span>
        </div>
      </div>
    </section>

    <!-- =====================================================
         SECTION 2: 5 PRODUCTION DISCIPLINES
         ===================================================== -->
    <section class="thalam-services-section">
      <div class="thalam-section-header">
        <div class="thalam-section-label">[ DISCIPLINE DIRECTORY ]</div>
        <h2 class="thalam-section-title">Five specialized production zones.</h2>
        <p class="thalam-section-sub">Engineered for commercial brands, broadcast creators, and private family milestones.</p>
      </div>

      <div class="thalam-services-list">

        <!-- 01 Ad Shoots -->
        <article class="thalam-service-row">
          <div class="thalam-service-num">01</div>
          <div class="thalam-service-media">
            <img src="https://images.unsplash.com/photo-1758613655304-48776efb25d8?w=800&h=600&q=90&auto=format&fit=crop"
              alt="Professional photographer shooting a model in studio setting — Thalam Studio ad photography." loading="lazy" class="img-tactile">
          </div>
          <div class="thalam-service-content">
            <div class="thalam-service-tags">
              <span class="tag">Commercial</span>
              <span class="tag">Brand Campaigns</span>
              <span class="tag">Product Ads</span>
            </div>
            <h3 class="thalam-service-name">Ad Shoots &amp; Campaigns</h3>
            <p class="thalam-service-desc">Complete environmental control with wide infinity cyc walls, overhead softboxes, and full concept-to-delivery support.</p>
            <ul class="thalam-spec-list">
              <li>Concept-to-delivery production</li>
              <li>Art direction &amp; styling support</li>
              <li>Studio &amp; location flexibility</li>
              <li>Profoto lighting ecosystem</li>
            </ul>
            <div class="thalam-service-action">
              <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20discuss%20an%20Ad%20Shoot%20at%20Thalam%20Studio." target="_blank" rel="noopener noreferrer" class="btn-primary" data-trigger="booking">
                Discuss Commercial Shoot →
              </a>
            </div>
          </div>
        </article>

        <!-- 02 Baby & Newborn -->
        <article class="thalam-service-row">
          <div class="thalam-service-num">02</div>
          <div class="thalam-service-media">
            <img src="https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=800&h=600&q=90&auto=format&fit=crop"
              alt="Soft-lit newborn baby photography session — Thalam Studio baby photography." loading="lazy" class="img-tactile">
          </div>
          <div class="thalam-service-content">
            <div class="thalam-service-tags">
              <span class="tag">Newborn</span>
              <span class="tag">Milestone Sessions</span>
              <span class="tag">First Year</span>
            </div>
            <h3 class="thalam-service-name">Baby &amp; Newborn Studio</h3>
            <p class="thalam-service-desc">A private, climate-controlled sanctuary designed specifically for babies, mothers, and delicate newborn sessions.</p>
            <ul class="thalam-spec-list">
              <li>Controlled, gentle, non-jarring light</li>
              <li>Safe, temperature-regulated private suite</li>
              <li>Curated prop &amp; wrap collection</li>
              <li>Private online archival gallery</li>
            </ul>
            <div class="thalam-service-action">
              <a href="<?php echo esc_url(home_url('/thalam-baby')); ?>" class="btn-primary">
                View Baby &amp; Newborn Sessions →
              </a>
            </div>
          </div>
        </article>

        <!-- 03 Podcast & Interview -->
        <article class="thalam-service-row">
          <div class="thalam-service-num">03</div>
          <div class="thalam-service-media">
            <img src="https://images.unsplash.com/photo-1664555182325-e2323f836760?w=800&h=600&q=90&auto=format&fit=crop"
              alt="Professional podcast microphone setup in studio — Thalam Studio podcast and interview recording." loading="lazy" class="img-tactile">
          </div>
          <div class="thalam-service-content">
            <div class="thalam-service-tags">
              <span class="tag">Video Podcasts</span>
              <span class="tag">Interviews</span>
              <span class="tag">Live Streams</span>
            </div>
            <h3 class="thalam-service-name">Broadcast Podcast Suite</h3>
            <p class="thalam-service-desc">Acoustically isolated environment equipped with multi-cam 4K cinema cameras, broadcast Shure mics, and live switching.</p>
            <ul class="thalam-spec-list">
              <li>Multi-camera 4K cinema capture</li>
              <li>Acoustically isolated, sound-treated room</li>
              <li>Broadcast-grade audio recording</li>
              <li>Customizable set backdrops &amp; practical lights</li>
            </ul>
            <div class="thalam-service-action">
              <a href="<?php echo esc_url(home_url('/podcast-interview')); ?>" class="btn-primary">
                Explore Podcast Suite →
              </a>
            </div>
          </div>
        </article>

        <!-- 04 Product Photography -->
        <article class="thalam-service-row">
          <div class="thalam-service-num">04</div>
          <div class="thalam-service-media">
            <img src="https://images.unsplash.com/photo-1698943510859-e97dc93127e9?w=800&h=600&q=90&auto=format&fit=crop"
              alt="Minimalist product photography setup — Thalam Studio product shoots." loading="lazy" class="img-tactile">
          </div>
          <div class="thalam-service-content">
            <div class="thalam-service-tags">
              <span class="tag">E-Commerce</span>
              <span class="tag">Tabletop</span>
              <span class="tag">Macro</span>
            </div>
            <h3 class="thalam-service-name">Product &amp; Tabletop</h3>
            <p class="thalam-service-desc">Precision lighting for jewelry, cosmetics, packaging, and high-volume e-commerce catalogs with color-accurate calibration.</p>
            <ul class="thalam-spec-list">
              <li>Precision macro &amp; tabletop staging</li>
              <li>Color-accurate studio lighting</li>
              <li>Custom acrylic &amp; textured backgrounds</li>
              <li>High-volume commercial turnarounds</li>
            </ul>
            <div class="thalam-service-action">
              <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20discuss%20Product%20Photography%20at%20Thalam%20Studio." target="_blank" rel="noopener noreferrer" class="btn-primary" data-trigger="booking">
                Discuss Product Shoot →
              </a>
            </div>
          </div>
        </article>

        <!-- 05 Food & Beverage -->
        <article class="thalam-service-row">
          <div class="thalam-service-num">05</div>
          <div class="thalam-service-media">
            <img src="https://images.unsplash.com/photo-1728910156510-77488f19b152?w=800&h=600&q=90&auto=format&fit=crop"
              alt="High-end culinary photography — Thalam Studio food and beverage." loading="lazy" class="img-tactile">
          </div>
          <div class="thalam-service-content">
            <div class="thalam-service-tags">
              <span class="tag">Culinary Arts</span>
              <span class="tag">Menu Shoots</span>
              <span class="tag">Action Splits</span>
            </div>
            <h3 class="thalam-service-name">Food &amp; Beverage</h3>
            <p class="thalam-service-desc">Sensory food imagery with specialized styling surfaces, lighting for liquids and steam, and menu-ready formats.</p>
            <ul class="thalam-spec-list">
              <li>Food styling &amp; prep space</li>
              <li>Extensive rustic &amp; modern prop library</li>
              <li>High-speed capture for pours &amp; splashes</li>
              <li>Social, print &amp; menu asset suites</li>
            </ul>
            <div class="thalam-service-action">
              <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20discuss%20Food%20Photography%20at%20Thalam%20Studio." target="_blank" rel="noopener noreferrer" class="btn-primary" data-trigger="booking">
                Discuss Food Shoot →
              </a>
            </div>
          </div>
        </article>

      </div>
    </section>

    <!-- =====================================================
         SECTION 3: ARCHITECTURAL GALLERY STRIP
         ===================================================== -->
    <section class="thalam-gallery-section">
      <div class="thalam-gallery-header">
        <div class="thalam-section-label">[ STUDIO ARCHIVE ]</div>
        <h2 class="thalam-section-title">Created inside these walls.</h2>
      </div>
      <div class="thalam-gallery-strip">
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1606814893907-c2e42943c91f?w=800&q=90&auto=format&fit=crop" alt="Fine-art portraiture — Thalam Studio." loading="lazy">
        </div>
        <div class="gallery-item">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/wedding-staircase.jpg" alt="Wedding portraiture — Thalam Studio." onerror="this.src='https://images.unsplash.com/photo-1519741497674-611481863552?w=800&q=90&auto=format&fit=crop'" loading="lazy">
        </div>
        <div class="gallery-item">
          <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/img/maternity-newborn.jpg" alt="Maternity and newborn portrait — Thalam Studio." onerror="this.src='https://images.unsplash.com/photo-1544126592-807ade215a0b?w=800&q=90&auto=format&fit=crop'" loading="lazy">
        </div>
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1656633702381-939966720da4?w=800&q=90&auto=format&fit=crop" alt="Baby sleeping peacefully — Thalam Studio." loading="lazy">
        </div>
        <div class="gallery-item">
          <img src="https://images.unsplash.com/photo-1577897113176-6888367369bf?w=800&q=90&auto=format&fit=crop" alt="Family sitting together for portrait — Thalam Studio." loading="lazy">
        </div>
      </div>
    </section>

    <!-- =====================================================
         SECTION 4: VERIFIED TELEMETRY & TRUST
         ===================================================== -->
    <section class="thalam-trust-section">
      <div class="thalam-trust-header">
        <div class="thalam-section-label">[ VERIFIED CLIENT TELEMETRY ]</div>
        <h2 class="thalam-trust-title">What creators and families experience.</h2>
      </div>
      
      <div class="thalam-testimonials-grid">
        <blockquote class="testi-card">
          <p class="testi-quote">"We walked in with a rough concept and walked out with a national-grade campaign. The way they manipulate light and space in that studio makes the impossible look effortless."</p>
          <cite class="testi-author">— Commercial Ad Client</cite>
        </blockquote>
        <blockquote class="testi-card">
          <p class="testi-quote">"As a new mother, I was so anxious. But the studio was a warm, quiet sanctuary. I didn't just get beautiful photos; I felt completely safe and cared for."</p>
          <cite class="testi-author">— Maternity &amp; Newborn Client</cite>
        </blockquote>
        <blockquote class="testi-card">
          <p class="testi-quote">"When we saw the gallery, we didn't just see pictures; we relived the exact emotions of that day. They gave us our memories back, preserved in breathtaking cinematic quality."</p>
          <cite class="testi-author">— Heritage Portrait Client</cite>
        </blockquote>
      </div>
    </section>

    <!-- =====================================================
         SECTION 5: CAMPAIGN YELLOW PRE-FOOTER (SINGLE TERMINAL CTA)
         ===================================================== -->
    <section class="global-cta">
      <h2 class="global-cta-title brut-protect-overflow">Ready to bring your project into the room?</h2>
      <p class="global-cta-sub">
        Tell us about your shoot date, commercial brief, or portrait session. We reply within 4 business hours with availability, crew allocation, and a formal quote.
      </p>
      <a href="https://wa.me/918098014123?text=Hi%2C%20I%27d%20like%20to%20tour%20and%20book%20a%20session%20at%20Thalam%20Studio." target="_blank" rel="noopener noreferrer" class="btn-primary" data-trigger="booking">
        Tour Thalam Studio
        <span class="btn-primary-icon">
          <svg viewBox="0 0 24 24" style="width: 18px; height: 18px; fill: none; stroke: currentColor; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </span>
      </a>
    </section>

  </main>

  <?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
