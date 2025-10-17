# Ravandeh Studio

Apple-inspired, liquid-glass portfolio for Ravandeh Studio’s bilingual postcard editions. The site is a static experience powered by vanilla HTML, CSS, and JavaScript with data-driven content.

## Overview
- Curved hero with liquid glass mock-up, animated bilingual toggle, and parallax motion.
- Organic glass cards for collections, artists, and shop callouts fed by `data/*.json`.
- Accessible lightbox gallery with depth-of-field reflections and translated captions.

## Getting started
1. Install dependencies:
   ```bash
   npm install
   ```
2. Serve the project root with any static server for local preview (for example `npx serve .`).
3. Toggle between English and Persian via the animated language button (defaults to English).

## Quality checks
Run these before committing:
```bash
npm run lint
npm test
npm run build
```

## Documentation
The full bilingual documentation (including localisation tips and Apple-inspired UI brief) lives in [`docs/README.md`](./docs/README.md). Additional guides:
- [`docs/OWNER_GUIDE_FA.md`](./docs/OWNER_GUIDE_FA.md)
- [`docs/RAVANDEH_SITE_PROMPT.md`](./docs/RAVANDEH_SITE_PROMPT.md)
- [`docs/RAVANDEH_UI_UX_PROMPT_APPLE.md`](./docs/RAVANDEH_UI_UX_PROMPT_APPLE.md)

Stay in the flow — update both locales when editing copy.
