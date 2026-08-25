# Walkthrough — Git Merge & Live Deployment to `/sample-design`

## Changes & Operations Completed

### 1. Git Branch Merge
- Committed local design tweaks on `layered-design`.
- Checked out `master` branch and fast-forward merged `layered-design` cleanly (`Updating 62d52d9..99e6252`).

### 2. Live FTP Deployment
- Created dedicated `/sample-design/` directory on `chithramaya.charnithi.com`.
- Uploaded `design.html` as `sample-design/index.html` and `sample-design.html`.
- Uploaded all high-resolution WebP and PNG assets (`artistic-photo.webp`, `artistic-photo.png`, `camera.webp`, `camera.png`).
- Synced theme template to `wp-content/themes/chitramaya/design.html`.

---

## Live Endpoint Verification

- **Live URL**: [`https://chithramaya.charnithi.com/sample-design`](https://chithramaya.charnithi.com/sample-design)
- **Status**: `200 OK` (Content-Length: 45,379 bytes)
- **Fallback URL**: [`https://chithramaya.charnithi.com/sample-design.html`](https://chithramaya.charnithi.com/sample-design.html) (`200 OK`)

---

## Git Commit Summary
- `99e6252` (master): `style(manifesto): refine quote text for creative artistic direction`
- `1bacf43`: `style(manifesto): add engraving effect — diagonal hatching, inset depth shadows, carved text-shadow`
- `030d88a`: `fix(ux): architectural CTA relocation inside hero stage + dark inverted manifesto block for right column contrast`
- `216873c`: `fix(ux): integrate pitch CTA 'WE CLICK — EXPLORE THE DUALITY' and balance right column whitespace with Studio Philosophy graphic card`
- `0f5544f`: `fix(ux): eliminate 168px negative space void, harmonize column padding and card gaps on 8pt grid`
- `9eced16`: `refactor(design): purge explicit money/art labels, add subtle intro rules & footer ghost watermark`
