<?php
/**
 * Template Name: Design Comparison Preview
 * Template Post Type: page
 * Description: Side-by-side design comparison between Option 1 (Editorial Action with NN/g 680px measure) and Option 2 (Minimalist Brutalist Monolith matching agency reference).
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Pillars Direction — Chithramaya Creatives Review</title>
  <meta name="robots" content="noindex, nofollow">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/pages/template-design-preview.css?ver=<?php echo filemtime(get_stylesheet_directory() . '/assets/css/pages/template-design-preview.css'); ?>">
</head>
<body class="mode-single">

  <!-- ==============================================================================
       STICKY COMPARISON CONTROL BAR (Client Review Mode)
       ============================================================================== -->
  <header class="preview-control-bar" role="banner">
    <div class="preview-meta">
      <span class="preview-badge">Client Review</span>
      <span class="preview-title">Homepage Service Pillars Direction</span>
    </div>

    <div class="preview-switch-group" role="tablist" aria-label="Design variant selector">
      <button type="button" class="preview-switch-btn active" id="btn-opt-1" role="tab" aria-selected="true" aria-controls="option-1-view">
        Option 1: Editorial Action (680px)
      </button>
      <button type="button" class="preview-switch-btn" id="btn-opt-2" role="tab" aria-selected="false" aria-controls="option-2-view">
        Option 2: Brutalist Monolith (Reference)
      </button>
      <button type="button" class="preview-switch-btn" id="btn-opt-both" role="tab" aria-selected="false">
        Compare Both (Stacked)
      </button>
    </div>

    <div class="preview-hint">Tap to switch styles &amp; compare line length and reading speed</div>
  </header>

  <!-- ==============================================================================
       OPTION 1: HIGH-CONTRAST EDITORIAL ACTION
       Stanford Web Credibility & Nielsen Norman Group 680px Optimal Reading Measure
       ============================================================================== -->
  <main id="option-1-view" class="design-view-section is-active" role="tabpanel" aria-labelledby="btn-opt-1">
    
    <div class="option-intro-banner">
      <div class="option-intro-tag">Direction 01 — Editorial Action (NN/g Measure)</div>
      <h1 class="option-intro-heading">High-Contrast Editorial Action</h1>
      <p class="option-intro-desc">
        Engineered per Nielsen Norman Group typography guidelines (strict ≤680px reading line-length) and Stanford Web Credibility research. Front-loaded 5–7 word impression headline with punchy prose and explicit action links.
      </p>
    </div>

    <section class="editorial-layout-split">
      
      <!-- LEFT COLUMN: MONEY-BASED SERVICES (NAVY #171E4A) -->
      <div class="editorial-col-money">
        <div class="editorial-measure-wrapper">

          <!-- 01 BRAND & CORPORATE -->
          <article class="editorial-card" id="opt1-corporate">
            <div class="editorial-card-num">— 01 / BRAND &amp; CORPORATE</div>
            <h2 class="editorial-card-title">Brand &amp; Corporate Photography</h2>
            <div class="editorial-impact-headline">Executive portraits that build market credibility.</div>
            <p class="editorial-card-body">
              We photograph the people, spaces, and moments that make your business credible. Executive portraits that actually look like the person. Team shoots people want to be in. Corporate events documented like they matter — because they do.
            </p>
            <a href="/corporate-brand/" class="editorial-cta-link" aria-label="Explore Corporate &amp; Executive Photography work">
              Explore Corporate &amp; Executive Work ↗
            </a>
          </article>

          <!-- 02 COMMERCIAL -->
          <article class="editorial-card" id="opt1-commercial">
            <div class="editorial-card-num">— 02 / COMMERCIAL</div>
            <h2 class="editorial-card-title">Commercial Photography</h2>
            <div class="editorial-impact-headline">Products and spaces documented to sell.</div>
            <p class="editorial-card-body">
              Products, spaces, food, fashion. We shoot what you're selling and make people actually want it. Whether it's an advertising campaign, an architectural space, or a catalog, the frame is always doing a commercial job.
            </p>
            <a href="/commercial/" class="editorial-cta-link" aria-label="Explore Commercial Photography Campaigns">
              Explore Commercial Campaigns ↗
            </a>
          </article>

          <!-- 04 PODCAST & PRODUCTION -->
          <article class="editorial-card" id="opt1-podcast">
            <div class="editorial-card-num">— 04 / PODCAST &amp; PRODUCTION</div>
            <h2 class="editorial-card-title">Podcast &amp; Interview Production</h2>
            <div class="editorial-impact-headline">Broadcast acoustic rooms and 4K cinema.</div>
            <p class="editorial-card-body">
              We set up the room. You bring the conversation. Broadcast-grade Shure SM7B audio, cinema 4K multi-camera angles, and acoustic isolation in Trichy. One good recording session becomes a month of edited, branded, publish-ready content.
            </p>
            <a href="/podcast-interview/" class="editorial-cta-link" aria-label="Book Podcast Studio &amp; Production">
              Book Studio &amp; Production ↗
            </a>
          </article>

        </div>
      </div>

      <!-- RIGHT COLUMN: ART-BASED SERVICES (OFF-WHITE #F7F4ED) -->
      <div class="editorial-col-art">
        <div class="editorial-measure-wrapper">

          <!-- 03 EVENTS & HERITAGE -->
          <article class="editorial-card" id="opt1-events">
            <div class="editorial-card-num">— 03 / EVENTS &amp; PORTRAIT</div>
            <h2 class="editorial-card-title">Events &amp; Heritage Portraiture</h2>
            <div class="editorial-impact-headline">Documentary heritage for generations to remember.</div>
            <p class="editorial-card-body">
              The moments you'll look at in 20 years and remember exactly how it felt. Unobtrusive, documentary observation for milestone weddings, sacred rituals, and generational family heritage across South India.
            </p>
            <nav class="service-links-cluster" aria-label="Events &amp; Portrait sub-verticals" style="margin-top: 12px; padding-top: 14px; border-top: 1px solid rgba(23,30,74,0.12); display: flex; flex-direction: column; gap: 8px;">
              <a href="/events-portrait/" class="service-cta-link" style="font-weight: 700; color: #171E4A; text-decoration: none;">Events &amp; Weddings ↗</a>
              <a href="/maternity/" class="service-cta-link" style="font-weight: 700; color: #171E4A; text-decoration: none;">Maternity &amp; Bump-to-Baby ↗</a>
              <a href="/thalam-baby/" class="service-cta-link" style="font-weight: 700; color: #171E4A; text-decoration: none;">Baby &amp; Infant Art ↗</a>
            </nav>
          </article>

          <!-- 05 BRAND DESIGN -->
          <article class="editorial-card" id="opt1-design">
            <div class="service-badge" style="align-self: flex-start; background: #171E4A; color: #FFF; font-size: 0.625rem; font-weight: 800; letter-spacing: 0.12em; text-transform: uppercase; padding: 4px 8px; border-radius: 4px;">Evolving Studio Service</div>
            <div class="editorial-card-num">— 05 / BRAND DESIGN</div>
            <h2 class="editorial-card-title">Brand Design &amp; Visual Systems</h2>
            <div class="editorial-impact-headline">Distinctive wordmarks and memorable visual systems.</div>
            <p class="editorial-card-body">
              Where visual identity meets artistic strategy. We build distinctive typographic systems, wordmarks, and art direction that define your brand essence — giving your business a face people remember.
            </p>
            <a href="/brand-design/" class="editorial-cta-link" aria-label="Collaborate on Brand Identity Design">
              Collaborate on Brand Identity ↗
            </a>
          </article>

          <!-- THALAM BILLBOARD -->
          <div class="manifesto-block thalam-billboard" style="background: #FAB417; border-radius: 14px; padding: 36px 32px; color: #171E4A; display: flex; flex-direction: column; gap: 14px;">
            <div class="manifesto-label" style="font-family: var(--mono); font-size: 0.6875rem; font-weight: 800; letter-spacing: 0.15em; text-transform: uppercase; opacity: 0.8;">[ THALAM STUDIO, TRICHY ]</div>
            <h3 style="font-family: var(--display); font-size: 1.75rem; font-weight: 700; line-height: 1.15;">We set the room.<br>You bring the story.</h3>
            <div class="editorial-impact-headline" style="color: #171E4A; padding-bottom: 0;">Purpose-built 2,400 sq ft production suite.</div>
            <p style="font-family: var(--font-primary); font-size: 0.9375rem; line-height: 1.6; opacity: 0.9;">
              A purpose-built production environment in Thillai Nagar engineered for broadcast audio, precision strobe lighting, and commercial sets.
            </p>
            <a href="/thalam-studio/" class="btn-primary" style="align-self: flex-start; background: #171E4A; color: #FFF; padding: 12px 24px; border-radius: 50px; text-decoration: none; font-weight: 700; font-size: 0.875rem; margin-top: 6px;">
              Step into Thalam &rarr;
            </a>
          </div>

        </div>
      </div>

    </section>
  </main>

  <div class="stacked-divider" aria-hidden="true"></div>

  <!-- ==============================================================================
       OPTION 2: MINIMALIST BRUTALIST MONOLITH
       Matches the Agency Reference Image: Multi-Column Strip, Hairlines, 5-7 Words
       ============================================================================== -->
  <main id="option-2-view" class="design-view-section" role="tabpanel" aria-labelledby="btn-opt-2">
    
    <div class="option-intro-banner">
      <div class="option-intro-tag">Direction 02 — Brutalist Monolith (Reference Match)</div>
      <h1 class="option-intro-heading">Minimalist Brutalist Monolith</h1>
      <p class="option-intro-desc">
        Faithful to the agency reference design: horizontal multi-column architectural grid with hairline dividers, vertical rotated [WHAT WE DO] side tag, prominent numerals, and exact 5–7 word punchy work impact statements.
      </p>
    </div>

    <section class="brutalist-duality-split">
      
      <!-- LEFT HALF: MONEY / B2B COMMERCIAL (NAVY #171E4A) -->
      <div class="brutalist-half-money">
        
        <div class="brutalist-half-header">
          <span class="brutalist-half-label">[ B2B COMMERCIAL &amp; PRODUCTION ]</span>
          <span style="font-family: var(--mono); font-size: 0.6875rem; color: rgba(255,255,255,0.4); text-transform: uppercase;">01 — 04</span>
        </div>

        <div class="brutalist-row-container">
          
          <!-- Vertical Rotated Section Tag -->
          <div class="brutalist-side-tag" aria-hidden="true">
            <span class="brutalist-side-tag-text">WHAT WE DO</span>
          </div>

          <!-- 3 Columns Side-by-Side: 01, 02, 04 -->
          <div class="brutalist-cols-grid">
            
            <!-- 01 BRAND & CORPORATE -->
            <a href="/corporate-brand/" class="brutalist-col-cell" id="opt2-cell-01">
              <div>
                <div class="brutalist-cell-num">01</div>
                <h3 class="brutalist-cell-title">BRAND &amp;<br>CORPORATE</h3>
                <p class="brutalist-cell-statement">
                  EXECUTIVE PORTRAITS THAT BUILD MARKET CREDIBILITY.
                </p>
              </div>
              <div class="brutalist-cell-footer">
                <span class="brutalist-cell-arrow" aria-hidden="true">↗</span>
              </div>
            </a>

            <!-- 02 COMMERCIAL WORK -->
            <a href="/commercial/" class="brutalist-col-cell" id="opt2-cell-02">
              <div>
                <div class="brutalist-cell-num">02</div>
                <h3 class="brutalist-cell-title">COMMERCIAL<br>CAMPAIGNS</h3>
                <p class="brutalist-cell-statement">
                  PRODUCTS AND SPACES DOCUMENTED TO SELL.
                </p>
              </div>
              <div class="brutalist-cell-footer">
                <span class="brutalist-cell-arrow" aria-hidden="true">↗</span>
              </div>
            </a>

            <!-- 04 PODCAST & INTERVIEW -->
            <a href="/podcast-interview/" class="brutalist-col-cell" id="opt2-cell-04">
              <div>
                <div class="brutalist-cell-num">04</div>
                <h3 class="brutalist-cell-title">PODCAST &amp;<br>PRODUCTION</h3>
                <p class="brutalist-cell-statement">
                  BROADCAST ACOUSTIC ROOMS AND 4K CINEMA.
                </p>
              </div>
              <div class="brutalist-cell-footer">
                <span class="brutalist-cell-arrow" aria-hidden="true">↗</span>
              </div>
            </a>

          </div>
        </div>

      </div>

      <!-- RIGHT HALF: CULTURAL & HUMAN ART (OFF-WHITE #F7F4ED) -->
      <div class="brutalist-half-art">
        
        <div class="brutalist-half-header">
          <span class="brutalist-half-label">[ HERITAGE &amp; HUMAN STORIES ]</span>
          <span style="font-family: var(--mono); font-size: 0.6875rem; color: rgba(23,30,74,0.4); text-transform: uppercase;">03 — 05</span>
        </div>

        <div class="brutalist-row-container">
          
          <!-- Vertical Rotated Section Tag -->
          <div class="brutalist-side-tag" aria-hidden="true">
            <span class="brutalist-side-tag-text">HERITAGE &amp; ART</span>
          </div>

          <!-- 2 Columns Side-by-Side: 03, 05 -->
          <div class="brutalist-cols-grid">
            
            <!-- 03 EVENTS & PORTRAIT -->
            <div class="brutalist-col-cell" id="opt2-cell-03" style="cursor: default;">
              <div>
                <div class="brutalist-cell-num">03</div>
                <h3 class="brutalist-cell-title">EVENTS &amp;<br>HERITAGE</h3>
                <p class="brutalist-cell-statement">
                  DOCUMENTARY HERITAGE FOR GENERATIONS TO REMEMBER.
                </p>
                <nav class="brutalist-sublinks-stack" aria-label="Events sub-links">
                  <a href="/events-portrait/" class="brutalist-sublink-entry">
                    <span>03.1 Weddings</span>
                    <span>↗</span>
                  </a>
                  <a href="/maternity/" class="brutalist-sublink-entry">
                    <span>03.2 Maternity</span>
                    <span>↗</span>
                  </a>
                  <a href="/thalam-baby/" class="brutalist-sublink-entry">
                    <span>03.3 Infant Art</span>
                    <span>↗</span>
                  </a>
                </nav>
              </div>
              <div class="brutalist-cell-footer">
                <span class="brutalist-cell-arrow" style="color: #35A248;" aria-hidden="true">↗</span>
              </div>
            </div>

            <!-- 05 BRAND DESIGN -->
            <a href="/brand-design/" class="brutalist-col-cell" id="opt2-cell-05">
              <div>
                <div style="font-family: var(--mono); font-size: 0.625rem; font-weight: 800; letter-spacing: 0.14em; text-transform: uppercase; color: #35A248; margin-bottom: 6px;">[ EVOLVING ]</div>
                <div class="brutalist-cell-num">05</div>
                <h3 class="brutalist-cell-title">BRAND<br>DESIGN</h3>
                <p class="brutalist-cell-statement">
                  DISTINCTIVE WORDMARKS AND MEMORABLE VISUAL SYSTEMS.
                </p>
              </div>
              <div class="brutalist-cell-footer">
                <span class="brutalist-cell-arrow" aria-hidden="true">↗</span>
              </div>
            </a>

          </div>
        </div>

        <!-- Thalam Billboard in Brutalist Row -->
        <a href="/thalam-studio/" class="brutalist-thalam-fullwidth" id="opt2-thalam">
          <div>
            <div class="brutalist-thalam-label">[ THALAM STUDIO, TRICHY ]</div>
            <h3 class="brutalist-thalam-title">WE SET THE ROOM. YOU BRING THE STORY.</h3>
            <p class="brutalist-thalam-statement">
              PURPOSE-BUILT 2,400 SQ FT PRODUCTION SUITE.
            </p>
          </div>
          <div class="brutalist-thalam-cta">
            <span>STEP INTO THALAM</span>
            <span style="font-size: 1.25rem;">→</span>
          </div>
        </a>

      </div>

    </section>
  </main>

  <!-- ==============================================================================
       INTERACTIVE SWITCHER SCRIPT
       ============================================================================== -->
  <script>
    (function() {
      const btn1 = document.getElementById('btn-opt-1');
      const btn2 = document.getElementById('btn-opt-2');
      const btnBoth = document.getElementById('btn-opt-both');
      const view1 = document.getElementById('option-1-view');
      const view2 = document.getElementById('option-2-view');

      function setActive(btn) {
        [btn1, btn2, btnBoth].forEach(b => {
          b.classList.remove('active');
          b.setAttribute('aria-selected', 'false');
        });
        btn.classList.add('active');
        btn.setAttribute('aria-selected', 'true');
      }

      function showOption(opt) {
        document.body.classList.remove('mode-stacked');
        if (opt === 1) {
          setActive(btn1);
          view1.classList.add('is-active');
          view2.classList.remove('is-active');
        } else if (opt === 2) {
          setActive(btn2);
          view2.classList.add('is-active');
          view1.classList.remove('is-active');
        } else if (opt === 'both') {
          setActive(btnBoth);
          document.body.classList.add('mode-stacked');
          view1.classList.add('is-active');
          view2.classList.add('is-active');
        }
        window.scrollTo({ top: 0, behavior: 'smooth' });
      }

      btn1.addEventListener('click', () => showOption(1));
      btn2.addEventListener('click', () => showOption(2));
      btnBoth.addEventListener('click', () => showOption('both'));

      // Check URL param or hash
      const params = new URLSearchParams(window.location.search);
      if (params.get('option') === '2' || window.location.hash === '#option2') {
        showOption(2);
      } else if (params.get('option') === 'both' || window.location.hash === '#both') {
        showOption('both');
      }
    })();
  </script>

  <?php get_template_part('template-parts/global-footer'); ?>
  <?php wp_footer(); ?>
</body>
</html>
