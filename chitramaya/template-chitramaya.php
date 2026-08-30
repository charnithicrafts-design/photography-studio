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
  <link rel="canonical" href="<?php echo esc_url(home_url('/chitramaya')); ?>">
  <?php wp_head(); ?>
  <link rel="stylesheet" media="print" onload="this.media='all'" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-chitramaya.css">
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
                <article class="dark-card" id="brand-corporate">
                    <div class="service-number">— 01 / BRAND &amp; CORPORATE</div>
                    <h3 class="service-title">Brand &amp; Corporate Photography</h3>
                    <div class="service-tags">
                        <span class="tag tag-dark">Executive Headshots</span>
                        <span class="tag tag-dark">Website Photography</span>
                        <span class="tag tag-dark">Team Photography</span>
                        <span class="tag tag-dark">Corporate Video</span>
                        <span class="tag tag-dark">Company Profile Video</span>
                        <span class="tag tag-dark">Company Lifestyle</span>
                        <span class="tag tag-dark">Product Launches</span>
                        <span class="tag tag-dark">Marketing Events</span>
                        <span class="tag tag-dark">Seminars</span>
                        <span class="tag tag-dark">Corporate Events</span>
                        <span class="tag tag-dark">Conferences</span>
                        <span class="tag tag-dark">Product Photography</span>
                        <span class="tag tag-dark">Brand Ads / Videos</span>
                        <span class="tag tag-dark">TVC</span>
                    </div>
                    <p class="service-text-block">
                        Under the Brand and Corporate Photography category, a comprehensive range of services is offered to help businesses present a strong and authentic visual identity. From polished executive headshots and cohesive team portraits to high-production corporate videos and company profile films, every deliverable is crafted to communicate professionalism, trust, and brand authority — positioning your organisation with clarity and confidence across every visual touchpoint.
                    </p>
                </article>

                <!-- 02 COMMERCIAL PHOTOGRAPHY -->
                <article class="dark-card" id="commercial">
                    <div class="service-number">— 02 / COMMERCIAL</div>
                    <h3 class="service-title">Commercial Photography</h3>
                    <div class="service-tags">
                        <span class="tag tag-dark">OOH Marketing Collaterals</span>
                        <span class="tag tag-dark">E-Commerce Catalogues</span>
                        <span class="tag tag-dark">Food Photography</span>
                        <span class="tag tag-dark">Lifestyle Photography</span>
                        <span class="tag tag-dark">Product Photography</span>
                        <span class="tag tag-dark">Fashion Photography</span>
                        <span class="tag tag-dark">Architecture Photography</span>
                        <span class="tag tag-dark">Civil Construction Timelapse</span>
                        <span class="tag tag-dark">Cinematic Walkthrough</span>
                        <span class="tag tag-dark">360 Photography</span>
                        <span class="tag tag-dark">Social Media Campaigns</span>
                        <span class="tag tag-dark">Personal Branding</span>
                        <span class="tag tag-dark">PR Campaigns</span>
                        <span class="tag tag-dark">Content Creation</span>
                    </div>
                    <p class="service-text-block">
                        Commercial photography focuses on creating impactful visuals for business use, with the primary goal of selling, promoting, or marketing products, services, and brands. From out-of-home advertising and e-commerce catalogues to cinematic architecture walkthroughs and 360 immersive photography, the studio delivers content that captures attention, builds desire, and drives measurable commercial results across all media channels.
                    </p>
                </article>

                <!-- 04 PODCAST & INTERVIEW PRODUCTION -->
                <article class="dark-card" id="podcast">
                    <div class="service-number">— 04 / PODCAST &amp; INTERVIEW PRODUCTION</div>
                    <h3 class="service-title">Podcast &amp; Interview Production</h3>

                    <div class="pillars-grid">
                        <div class="pillar">
                            <div class="pillar-title">[ Studio &amp; Production Services ]</div>
                            <div class="pillar-items">Professional recording studio setup, Multi-camera production, Live streaming, Video podcast production, Sound design &amp; audio post-production, Set design &amp; lighting direction</div>
                        </div>
                        <div class="pillar">
                            <div class="pillar-title">[ Content &amp; Media Services ]</div>
                            <div class="pillar-items">Episode editing &amp; publishing, Graphic design for thumbnails &amp; artwork, Distribution strategy, Branded intros &amp; outros, Short-form content repurposing for social media</div>
                        </div>
                        <div class="pillar">
                            <div class="pillar-title">[ Photography &amp; Branding Services ]</div>
                            <div class="pillar-items">Host &amp; guest headshots, Episode &amp; campaign photography, Brand photography for show identity, Promotional media kits, Behind-the-scenes content</div>
                        </div>
                    </div>

                    <p class="service-text-block">
                        Podcast and interview services offered by professional photography studios have evolved into comprehensive content creation solutions — combining high-quality audio and video production with strategic visual branding. From technically equipped studio setups and multi-camera interview shoots to complete content repurposing and brand photography for show identity, these services empower thought leaders, entrepreneurs, and brands to build lasting audience relationships through powerful storytelling formats.
                    </p>
                </article>
            </div>

            <!-- ═══════════ RIGHT COLUMN: ART-BASED SERVICES ═══════════ -->
            <div class="col-art">

                <!-- 03 EVENTS & PORTRAIT PHOTOGRAPHY -->
                <article class="white-card" id="events-portraits">
                    <div class="service-number">— 03 / EVENTS &amp; PORTRAIT</div>
                    <h3 class="service-title">Events &amp; Portrait Photography</h3>

                    <div class="subcategory">
                        <div class="subcategory-label">Baby Portraits</div>
                        <div class="subcategory-items">1st Birthday · Newborn Art Themed · Infant Art Themed / House Visit · Toddler Outdoor / Studio</div>
                    </div>

                    <div class="subcategory">
                        <div class="subcategory-label">Maternity</div>
                        <div class="subcategory-items">Maternity · Bump to Baby Sessions</div>
                    </div>

                    <div class="subcategory">
                        <div class="subcategory-label">Family Portraits</div>
                        <div class="subcategory-items">Family Portrait Sessions · Individual Portraits</div>
                    </div>

                    <div class="subcategory">
                        <div class="subcategory-label">Wedding</div>
                        <div class="subcategory-items">Pre &amp; Post Wedding · Destination Wedding · Song Creation</div>
                    </div>

                    <div class="subcategory">
                        <div class="subcategory-label">Family Events</div>
                        <div class="subcategory-items">Sastiyabthapoorthi · Upanayanam · Sadhabishegam · Ear Piercing / Ayushomam</div>
                    </div>
                </article>

                <!-- 05 BRAND DESIGN (UPCOMING) -->
                <article class="white-card upcoming-card" id="brand-design">
                    <div class="upcoming-overlay">UPCOMING EVOLVING SOLUTION</div>
                    <div class="service-number">— 05 / BRAND DESIGN</div>
                    <h3 class="service-title">Brand Design</h3>

                    <div class="service-tags">
                        <span class="tag tag-light">Logo Design</span>
                        <span class="tag tag-light">Brand Identity</span>
                        <span class="tag tag-light">Product Design</span>
                        <span class="tag tag-light">Marketing Collaterals</span>
                        <span class="tag tag-light">Illustrative Posters</span>
                        <span class="tag tag-light">OOH Campaign Design</span>
                        <span class="tag tag-light">Installations Design</span>
                        <span class="tag tag-light">Brand Guidelines</span>
                    </div>

                    <p class="service-text-block">
                        An upcoming, evolving design discipline where visual identity meets artistic strategy. Brand Design at Chithramaya Creatives will bridge the gap between commercial clarity and artistic distinctiveness — building brands that aren't just seen, but deeply felt.
                    </p>
                </article>

                <!-- DARK INVERTED MANIFESTO BLOCK — dramatic contrast inside white column -->
                <div class="manifesto-block">
                    <div class="manifesto-label">[ STUDIO DIRECTIVE ]</div>
                    <div class="manifesto-quote">
                        One studio.<br>Two disciplines.<br>Every frame has a purpose.
                    </div>
                    <div class="manifesto-spec-row">
                        <span>FRAME / 35MM</span>
                        <span>ILLUSION / ACTIVE</span>
                    </div>
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
             SITE FOOTER
             ===================================================== -->
        <footer class="site-footer">
            <div class="footer-ghost-text" aria-hidden="true">ARTISTIC ILLUSION</div>
            <div class="footer-content-block">
                <div class="footer-logo">CHITHRAMAYA CREATIVES</div>
                <div class="footer-subline">Visual storytelling with a human pulse.</div>
            </div>
            <a href="mailto:sriramsridharan.designer@gmail.com" class="footer-cta" style="position: relative; z-index: 1;">
                Bring us the story. →
            </a>
            <div class="footer-copy" style="position: relative; z-index: 1;">© 2026 Chithramaya Creatives. All rights reserved. Crafted with vision.</div>
        </footer>
  <?php wp_footer(); ?>
</body>
</html>
