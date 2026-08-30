---
# ==============================================================================
# PART I: MACHINE-READABLE DESIGN TOKENS (The Coloring Book Heavy Borders)
# ==============================================================================
schema_version: "1.0.0"
brand: "Chithramaya Creatives"
design_system: "Warm Editorial Brutalism"

palette:
  canvas_primary:
    name: "Chithramaya Off-White"
    hex: "#F7F4ED"
    rgb: "247, 244, 237"
    role: "Primary background for all brand pages"
  canvas_elevated:
    name: "Pure White"
    hex: "#FFFFFF"
    rgb: "255, 255, 255"
    role: "Elevated cards, white service blocks, crisp surfaces"
  structure_dark:
    name: "Chithramaya Navy"
    hex: "#171E4A"
    rgb: "23, 30, 74"
    role: "Primary text, headers, navigation, dark duality column"
  action_vibrant:
    name: "Chithramaya Green"
    hex: "#35A248"
    rgb: "53, 162, 72"
    role: "Primary CTAs, action points, active hover indicators"
  energy_highlight:
    name: "Chithramaya Yellow"
    hex: "#FAB417"
    rgb: "250, 180, 23"
    role: "Quote blocks, social application cards, creative spark"
  emotion_accent:
    name: "Chithramaya Red"
    hex: "#9B1C26"
    rgb: "155, 28, 38"
    role: "Wordmark mark, urgent highlights"

thalam_palette:
  studio_dark:
    name: "Thalam Charcoal"
    hex: "#1C1917"
    rgb: "28, 25, 23"
    role: "Physical facility dark studio mood (Thalam pages only)"
  studio_camel:
    name: "Thalam Camel"
    hex: "#A96F44"
    rgb: "169, 111, 68"
    role: "Warm leather, baby portraiture warmth"
  studio_golden:
    name: "Thalam Golden Light"
    hex: "#E3DAC9"
    rgb: "227, 218, 201"
    role: "Studio interior ambient tone"
  studio_stone:
    name: "Thalam Stone"
    hex: "#57534E"
    rgb: "87, 83, 78"
    role: "Technical equipment specs and metadata"

typography:
  primary:
    family: "Lato"
    fallback: "sans-serif"
    weights: [400, 700, 900]
    usage: "Body text, UI labels, buttons, navigation"
  editorial:
    family: "Roboto Slab"
    fallback: "serif"
    weights: [400, 700]
    usage: "Display headings, hero composition text, card titles, quotes"
  tamil:
    family: "Noto Sans Tamil"
    fallback: "sans-serif"
    weights: [400, 700]
    usage: "Tamil language headlines and editorial content"

scale:
  display_hero: "clamp(3rem, 26cqw, 16rem)"
  h1: "clamp(2rem, 5vw, 5rem)"
  h2: "clamp(1.5rem, 3.5vw, 2.5rem)"
  h3: "clamp(1.25rem, 2.2vw, 1.75rem)"
  body_large: "18px"
  body_base: "15px"
  body_small: "14px"
  label_tag: "12px"
  metadata: "11px"

spatial_grid_8pt:
  xs: "8px"
  sm: "12px"
  md: "16px"
  lg: "24px"
  xl: "32px"
  xxl: "48px"
  section_y: "clamp(60px, 8vw, 120px)"
  section_x: "clamp(24px, 6vw, 80px)"

borders_and_elevation:
  card_radius: "0px" # Raw brutalist edges
  pill_radius: "40px" # Organic contrast for interactive pills
  border_subtle_light: "1px solid rgba(23, 30, 74, 0.12)"
  border_subtle_dark: "1px solid rgba(255, 255, 255, 0.12)"
  border_brand_navy: "2px solid #171E4A"
  shadow_card: "0 12px 40px rgba(23, 30, 74, 0.08)"
  shadow_pill: "0 6px 20px rgba(0, 0, 0, 0.06)"

contrast_matrix:
  on_off_white:
    text_primary: "#171E4A"
    text_muted: "rgba(23, 30, 74, 0.60)"
    border: "rgba(23, 30, 74, 0.12)"
  on_navy:
    text_primary: "#FFFFFF"
    text_muted: "rgba(255, 255, 255, 0.70)"
    border: "rgba(255, 255, 255, 0.12)"
    accent: "#35A248"
  on_green:
    text_primary: "#FFFFFF"
    border: "rgba(255, 255, 255, 0.30)"
  on_yellow:
    text_primary: "#171E4A"
    border: "rgba(23, 30, 74, 0.15)"
---

# 🎨 PART II: HUMAN-READABLE AESTHETIC INTENT

## 1. The Philosophy of Warm Editorial Brutalism

Chithramaya Creatives does not build SaaS dashboards or generic corporate templates. We build digital galleries with physical presence.

- **Zero Artificial Gimmicks:** No neon glowing blobs, no floating fake cards, no generic blurred glassmorphism.
- **Physical Weight:** Hard, unrounded architectural borders (`0px` radius) for structural cards, contrasted with smooth organic pills (`40px`) strictly for human interaction points.
- **Generous Spatial Rhythm:** Content breathes on an 8pt spatial grid. When in doubt, increase negative space. The space around a photograph is as important as the frame itself.

---

## 2. The Duality Architecture

The Chithramaya homepage is structured around a fundamental creative truth: **Every commercial studio lives at the intersection of Market Value and Human Storytelling.**

```
┌──────────────────────────────────────┬──────────────────────────────────────┐
│       LEFT: COMMERCIAL / MONEY       │          RIGHT: HUMAN / ART          │
├──────────────────────────────────────┼──────────────────────────────────────┤
│ Background: Chithramaya Navy         │ Background: Chithramaya Off-White    │
│ Card Surfaces: Translucent Navy (5%) │ Card Surfaces: Crisp Pure White      │
│ Accent: Chithramaya Green            │ Accent: Deep Navy & Warm Tones       │
│ Disciplines:                         │ Disciplines:                         │
│ • 01 Brand & Corporate Photography   │ • 03 Events & Portrait Photography   │
│ • 02 Commercial Photography          │ • 05 Brand Design (Evolving System)  │
│ • 04 Podcast & Studio Production     │ • Studio Manifesto & Philosophy      │
└──────────────────────────────────────┴──────────────────────────────────────┘
```

---

## 3. The Art of the Reveal (Product Presentation)

When presenting work, components, or campaign launches, follow Steve Jobs’ iPod principle:
> *"Code provides the utility. The presentation provides the luxury."*

1. **Lead with the Human Feeling:** Skip technical jargon (e.g., "50MP sensor with 4K recording"). State the emotional reality: *"The ones you'll look at in 20 years and remember exactly how it felt."*
2. **The 3-Second Visual Hook:** In digital layouts, compose frames that are recognizable before the logo is even seen. Use bold color blocks (Solid Green, Solid Yellow, Navy Outline) to establish instantaneous identity.
3. **The Collaborative CTA:** CTAs are invitations to co-create, not transactions:
   - `Let's make something.`
   - `Bring us the story. →`
   - `Tell us about your day.`
