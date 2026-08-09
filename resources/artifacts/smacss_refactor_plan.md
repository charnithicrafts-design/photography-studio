# SMACSS Architecture & CSS Refactor Plan

## Goal Description
The current theme suffers from CSS fragmentation: massive `<style>` blocks are hardcoded into the `<head>` of individual PHP templates, and inline `style="..."` attributes are scattered throughout the markup. This violates the DRY principle, bloats HTML payloads, and makes global design system updates difficult.

To resolve this, we will refactor the entire theme's CSS to align with **SMACSS (Scalable and Modular Architecture for CSS)**. We will eliminate inline CSS, extract component styles into a modular stylesheet system, and ensure only truly *critical* CSS (variables, resets) remains in the `<head>` for rapid initial rendering.

## User Review Required
> [!WARNING]
> This is a structural overhaul of the theme's CSS delivery. It will involve creating new directories and modifying how CSS is loaded across all 11 templates.
> **Please review the proposed directory structure and the separation of Critical vs. Modular CSS before I execute the script.**

## Proposed Architecture

We will adopt a modular design system inside the theme:

```text
chitramaya/
├── assets/
│   └── css/
│       ├── base/
│       │   └── critical.css       (Variables, Typography, Reset - Injected into <head>)
│       ├── layout/
│       │   └── grid.css           (Global layout wrappers, sections)
│       └── modules/
│           ├── hero.css           (Hero sections, graphic orbs)
│           ├── buttons.css        (btn-compound, brut-btn)
│           ├── accordion.css      (Services accordion)
│           └── cards.css          (Impact stats, testimonials)
├── style.css                      (The Hub: imports layout and modules)
```

## Proposed Changes

### 1. Eliminate Inline CSS
All inline `style="..."` attributes will be replaced with modifier classes (SMACSS state/module variations).
- **Example:** `<div class="graphic-orb" style="top: -10%; left: -5%;">` becomes `<div class="graphic-orb orb-pos-1">`.
- **Example:** `<a style="background:var(--accent)...">` becomes `<a class="btn-compound btn-accent">`.

### 2. Isolate Critical CSS in the `<head>`
We will extract the `:root` variables, fundamental typography sizes (`clamp()`), and global resets into a single `critical.css` file. 
- In our templates (or `functions.php`), we will strictly inline *only* this `critical.css` to guarantee a flash-of-unstyled-content (FOUC) free load.

### 3. Modularize Component CSS
We will parse all 11 `template-*.php` files and strip out their bulky `<style>` tags.
- The CSS inside these tags (e.g., `.services`, `.manifesto`, `.process-step`) will be migrated into modular files in `assets/css/modules/`.
- `style.css` will be transformed into a SMACSS hub that utilizes `@import url('assets/css/modules/hero.css');` to cleanly load the design system.

### 4. Automated Extraction & Injection Script
Because manually migrating CSS from 11 distinct PHP files is error-prone, I will write a highly targeted Python AST script (`smacss_refactor.py`) that:
1. Extracts all `<style>...</style>` content from the templates.
2. Strips inline styles and maps them to utility classes.
3. Automatically writes the unified rules to the new `assets/css/` modular system.
4. Rewrites the `<head>` of all templates to load only the critical CSS and link to `style.css`.

## Verification Plan
### Automated Tests
- Syntax check on all generated `.css` files.
- Regex validation to ensure 0 instances of `style=` remain in the `template-*.php` files.

### Manual Verification
- Deploy the updated theme locally.
- Inspect the source code of `http://localhost:8080/commercial` to verify the `<head>` contains only critical CSS and no inline styles exist on the DOM elements.
- Verify visual parity remains intact (or is improved) without any broken layouts.
