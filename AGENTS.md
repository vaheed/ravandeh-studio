# Ravandeh Studio Guidelines

This document captures the working agreement for the entire repository.

## Design & Content
- Treat the site as an art-book experience: minimalist layouts, centered rhythm, poetic copy, and generous whitespace.
- Always keep English (`en`) as the default language and Persian (`fa`) fully localised via `assets/js/i18n.js`.
- Use the existing data sources in `/data/*.json` for dynamic artwork and artist details. Do not hardcode gallery content in HTML.
- Maintain smooth transitions, hover reveals, and the ambient gradients/organic shapes already defined in the CSS.
- Typography rules: Inter/Playfair (or equivalent) for English, Vazirmatn for Persian. Keep Persian right-to-left layout.

## Code & Tooling
- Only vanilla HTML, CSS, and JavaScript are permitted for runtime features. Development scripts may use Node.js utilities.
- Update both locales whenever text keys change or new keys are added.
- Run `npm run lint`, `npm test`, and `npm run build` before committing. The CI pipeline relies on these scripts.
- Keep hero/shop CTA links and their UTM parameters intact.

## Documentation & Ops
- When behaviour or usage changes, update `README.md` and the changelog following Keep a Changelog style.
- New instructions for adding artworks or artists must live in documentation (README or dedicated guides) in both languages when possible.
- Honour accessibility: maintain keyboard focus states, alt text, and readable contrast.
