<?php
/**
 * Template Name: Talam Studio (Utilitarian Brutalism)
 * Template Post Type: page
 * Description: Rigid, utilitarian, F-pattern layout with strict vertical columns, optimized for rapid conversion.
 */
get_header(); ?>

<main id="primary" class="site-main brut-container talam-ui">
    <!-- Header / USP Bar -->
    <header class="talam-header brut-border-bottom" style="padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; background: var(--color-black); color: var(--color-white);">
        <h1 style="font-size: 1.5rem; font-family: var(--font-mono); font-weight: 700; margin: 0; text-transform: uppercase;">
            Talam Studio // Logistics & Capture
        </h1>
        <div style="font-size: 0.9rem; opacity: 0.8;">[ Operational Protocol: Active ]</div>
    </header>

    <!-- Rapid Conversion Service Grid (F-Pattern) -->
    <div class="brut-grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
        
        <!-- Service 1: Industrial -->
        <section class="talam-column brut-border-right brut-border-bottom" style="padding: 2rem;">
            <div style="height: 250px; border: var(--border-stark); margin-bottom: 2rem; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1565439390234-5b4308a0653d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="Wide angle shot of heavy manufacturing machinery and factory floor, demonstrating industrial photography capabilities."
                     style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%);">
            </div>
            <h2 style="font-size: 1.5rem; font-family: var(--font-mono); border-bottom: var(--border-stark); padding-bottom: 1rem; margin-top: 0;">
                01. Industrial
            </h2>
            <ul style="list-style-type: none; padding: 0; margin: 1.5rem 0; line-height: 2;">
                <li>+ Factory Floors Documentation</li>
                <li>+ Heavy Machinery Rendering</li>
                <li>+ Zero-Interference Protocol</li>
            </ul>
            <a href="#book-industrial" class="brut-btn brut-btn-mono">Deploy Unit -></a>
        </section>

        <!-- Service 2: Corporate Events -->
        <section class="talam-column brut-border-right brut-border-bottom" style="padding: 2rem;">
            <div style="height: 250px; border: var(--border-stark); margin-bottom: 2rem; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="Massive corporate summit stage with keynote speaker and large audience, highlighting event coverage scale."
                     style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%);">
            </div>
            <h2 style="font-size: 1.5rem; font-family: var(--font-mono); border-bottom: var(--border-stark); padding-bottom: 1rem; margin-top: 0;">
                02. Events
            </h2>
            <ul style="list-style-type: none; padding: 0; margin: 1.5rem 0; line-height: 2;">
                <li>+ Brand Activations</li>
                <li>+ Corporate Summits</li>
                <li>+ Real-time Image Delivery</li>
            </ul>
            <a href="#book-events" class="brut-btn brut-btn-mono">Deploy Unit -></a>
        </section>

        <!-- Service 3: Weddings -->
        <section class="talam-column brut-border-bottom" style="padding: 2rem;">
            <div style="height: 250px; border: var(--border-stark); margin-bottom: 2rem; overflow: hidden;">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                     alt="Documentary style wedding photograph capturing a raw, unposed emotional moment between guests."
                     style="width: 100%; height: 100%; object-fit: cover; filter: grayscale(100%);">
            </div>
            <h2 style="font-size: 1.5rem; font-family: var(--font-mono); border-bottom: var(--border-stark); padding-bottom: 1rem; margin-top: 0;">
                03. Weddings
            </h2>
            <ul style="list-style-type: none; padding: 0; margin: 1.5rem 0; line-height: 2;">
                <li>+ Unobtrusive Documentary</li>
                <li>+ High-Volume Image Processing</li>
                <li>+ Secure AI Client Gallery</li>
            </ul>
            <a href="#book-weddings" class="brut-btn brut-btn-mono">Deploy Unit -></a>
        </section>

    </div>

    <!-- Social Proof / Trust Signals Grid -->
    <section class="talam-trust" style="padding: 2rem; background: #f0f0f0;">
        <h3 style="font-size: 1rem; margin-bottom: 2rem;">[ Verified Client Telemetry ]</h3>
        <div class="brut-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
            <div style="border-left: 2px solid var(--color-black); padding-left: 1rem;">
                <p style="font-weight: 700;">"Delivered 1,200 edited assets in 48 hours. Flawless execution."</p>
                <span style="font-size: 0.8rem;">- Global Tech Summit Lead</span>
            </div>
            <div style="border-left: 2px solid var(--color-black); padding-left: 1rem;">
                <p style="font-weight: 700;">"Zero disruption to the factory floor. The images are razor sharp."</p>
                <span style="font-size: 0.8rem;">- Apex Manufacturing</span>
            </div>
            <div style="border-left: 2px solid var(--color-black); padding-left: 1rem;">
                <p style="font-weight: 700;">"They captured every moment without us even knowing they were there."</p>
                <span style="font-size: 0.8rem;">- A. & J. (Wedding Clients)</span>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
