<?php
/**
 * Template Name: Chithramaya Creatives
 * Template Post Type: page
 * Description: Full-page portfolio landing for Chithramaya Creatives.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chithramaya Creatives — Photography Studio</title>
  <meta name="description" content="Chithramaya Creatives — Commercial photography, brand photography, events, and visual storytelling from Trichy, Tamil Nadu.">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-chitramaya.css?ver=<?php echo filemtime(get_stylesheet_directory() . '/assets/css/pages/template-chitramaya.css'); ?>">
</head>
<body>
<!-- =====================================================
             SECTION 0: HERO (WE CLICK — 3D Interlocked Composition)
             ===================================================== -->
        <div class="hero-viewport" id="hero">
            <?php get_template_part('template-parts/global-nav'); ?>
            
            <!-- Spacer to maintain flex layout since global-nav is position: fixed -->
            <div style="height: clamp(54px, 7vh, 70px); width: 100%; flex-shrink: 0;"></div>

            <div class="hero-stage-container">
                <div class="composition-box">
                    <div class="text-top-left">WE</div>
                    <div class="photo-foreground-cutout">
                        <picture>
                            <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/artistic-photo.webp" type="image/webp">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/artistic-photo.png" alt="Chithramaya Creative Portrait" class="artistic-cutout-img" />
                        </picture>
                    </div>
                    <div class="text-bottom-right">
                        <span class="click-text">CLICK</span>
                        <div class="camera-icon-wrapper">
                            <picture>
                                <source srcset="<?php echo get_stylesheet_directory_uri(); ?>/camera.webp" type="image/webp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/camera.png" alt="Camera" class="camera-icon-img" />
                            </picture>
                        </div>
                    </div>
                </div>
            <!-- CTA is now INSIDE the hero stage — clear separation from section below -->
            <div class="hero-cta-inline">
                <div class="cta-pill-group">
                    <a href="#services" class="cta-main-btn">Let's make something.</a>
                    <a href="#services" class="cta-arrow-btn cta-bounce">↓</a>
                </div>
            </div>
            </div>

        </div>

        <!-- =====================================================
             SECTION 1–5: DUALITY SPLIT — MONEY (DARK) vs ART (WHITE)
             ===================================================== -->
        <section class="duality-section" id="services">

            <!-- ═══════════ LEFT COLUMN: MONEY-BASED SERVICES ═══════════ -->
            <div class="col-money">

                <!-- 01 BRAND & CORPORATE PHOTOGRAPHY -->
                <article class="dark-card service-card" id="brand-corporate">
                    <div class="service-number">— 01 / BRAND &amp; CORPORATE</div>
                    <h3 class="service-title">Brand &amp; Corporate Photography</h3>
                    <p class="service-text-block">
                        We photograph the people, spaces, and moments that make your business credible. Executive portraits that actually look like the person. Team shoots people want to be in. Corporate events documented like they matter — because they do.
                    </p>
                    <a href="/corporate-brand/" class="service-cta" aria-label="Explore Corporate &amp; Executive Photography work">Explore Corporate &amp; Executive Work ↗</a>
                </article>

                <!-- 02 COMMERCIAL PHOTOGRAPHY -->
                <article class="dark-card service-card" id="commercial">
                    <div class="service-number">— 02 / COMMERCIAL</div>
                    <h3 class="service-title">Commercial Photography</h3>
                    <p class="service-text-block">
                        Products, spaces, food, fashion. We shoot what you're selling and make people actually want it. Whether it's an advertising campaign, an architectural space, or a catalog, the frame is always doing a commercial job.
                    </p>
                    <a href="/commercial/" class="service-cta" aria-label="Explore Commercial Photography Campaigns">Explore Commercial Campaigns ↗</a>
                </article>

                <!-- 04 PODCAST & INTERVIEW PRODUCTION -->
                <article class="dark-card service-card" id="podcast">
                    <div class="service-number">— 04 / PODCAST &amp; PRODUCTION</div>
                    <h3 class="service-title">Podcast &amp; Interview Production</h3>
                    <p class="service-text-block">
                        We set up the room. You bring the conversation. Broadcast-grade Shure SM7B audio, cinema 4K multi-camera angles, and acoustic isolation in Trichy. One good recording session becomes a month of edited, branded, publish-ready content.
                    </p>
                    <a href="/podcast-interview/" class="service-cta" aria-label="Book Podcast Studio &amp; Production">Book Studio &amp; Production ↗</a>
                </article>
            </div>

            <!-- ═══════════ RIGHT COLUMN: ART-BASED SERVICES ═══════════ -->
            <div class="col-art">

                <!-- 03 EVENTS & PORTRAIT PHOTOGRAPHY -->
                <article class="white-card service-card" id="events-portraits">
                    <div class="service-number">— 03 / EVENTS &amp; PORTRAIT</div>
                    <h3 class="service-title">Events &amp; Heritage Portraiture</h3>
                    <p class="service-text-block">
                        The moments you'll look at in 20 years and remember exactly how it felt. Unobtrusive, documentary observation for milestone weddings, sacred rituals, and generational family heritage across South India.
                    </p>
                    <nav class="service-links-cluster" aria-label="Events &amp; Portrait sub-verticals">
                        <a href="/events-portrait/" class="service-cta-link" aria-label="Events &amp; Weddings photography">Events &amp; Weddings ↗</a>
                        <a href="/maternity/" class="service-cta-link" aria-label="Maternity &amp; Bump-to-Baby photography">Maternity &amp; Bump-to-Baby ↗</a>
                        <a href="/thalam-baby/" class="service-cta-link" aria-label="Baby &amp; Infant Art photography">Baby &amp; Infant Art ↗</a>
                    </nav>
                </article>

                <!-- 05 BRAND DESIGN (EVOLVING SERVICE) -->
                <article class="white-card service-card" id="brand-design">
                    <div class="service-badge">EVOLVING STUDIO SERVICE</div>
                    <div class="service-number">— 05 / BRAND DESIGN</div>
                    <h3 class="service-title">Brand Design &amp; Visual Systems</h3>
                    <p class="service-text-block">
                        Where visual identity meets artistic strategy. We build distinctive typographic systems, wordmarks, and art direction that define your brand essence — giving your business a face people remember.
                    </p>
                    <a href="/brand-design/" class="service-cta" aria-label="Collaborate on Brand Identity Design">Collaborate on Brand Identity ↗</a>
                </article>

                <!-- THALAM STUDIO BILLBOARD ADVERTISEMENT -->
                <div class="manifesto-block thalam-billboard">
                    <div class="manifesto-label">[ THALAM STUDIO, TRICHY ]</div>
                    <div class="manifesto-quote">
                        We set the room.<br>You bring the story.
                    </div>
                    <p class="manifesto-desc">
                        A purpose-built 2,400 sq ft production environment in Thillai Nagar engineered for broadcast audio, precision strobe lighting, and commercial sets.
                    </p>
                    <a href="/thalam-studio/" class="btn-primary">Step into Thalam &rarr;</a>
                </div>
            </div>
        </section>

        <!-- =====================================================
             SPLIT DIVIDER
             ===================================================== -->
        <div class="split-divider" aria-hidden="true">
            <div class="split-divider-left"></div>
            <div class="split-divider-right"></div>
        </div>

        <!-- =====================================================
             WORKFLOW PIPELINE SECTION
             ===================================================== -->
        <section class="pipeline-section" id="pipeline">
            <div class="pipeline-label">[ STRUCTURAL WORKFLOW ]</div>
            <h2 class="pipeline-heading">HOW WE<br>WORK.</h2>

            <div class="pipeline-steps">
                <div class="step">
                    <div class="step-marker">01</div>
                    <div class="step-title">Initial Consultation</div>
                    <div class="step-desc">We listen first. What do you need this to feel like?</div>
                </div>
                <div class="step">
                    <div class="step-marker">02</div>
                    <div class="step-title">Creative Brief</div>
                    <div class="step-desc">We build the frame together — mood, direction, timeline, scope.</div>
                </div>
                <div class="step">
                    <div class="step-marker">03</div>
                    <div class="step-title">Execution</div>
                    <div class="step-desc">We show up. We shoot. We don't leave until it's right.</div>
                </div>
                <div class="step">
                    <div class="step-marker">04</div>
                    <div class="step-title">Post-Production</div>
                    <div class="step-desc">Every frame gets the same attention as the first one.</div>
                </div>
                <div class="step">
                    <div class="step-marker">05</div>
                    <div class="step-title">Final Delivery</div>
                    <div class="step-desc">You get everything. Every format. Every right. No chasing.</div>
                </div>
            </div>
        </section>

        <!-- =====================================================
             GLOBAL FOOTER
             ===================================================== -->
        <?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
