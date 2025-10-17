# Ravandeh Studio — Documentation Hub

Welcome to the canonical documentation for **Ravandeh Studio**. This site is a minimalist, bilingual (English + فارسی) art-book experience rendered entirely with static HTML, CSS, and JavaScript.

## ✨ Highlights / ویژگی‌ها
- Immersive hero with animated poetry, responsive gradients, and bilingual typography.
- Curated collections and artist profiles sourced from `/data/*.json` (no hardcoded gallery content).
- Fully responsive (320px → 4K), auto light/dark theming, smooth hover reveals, and accessible keyboard controls.
- English uses Inter + Playfair Display; Persian uses Vazirmatn with right-to-left layout.

## 🚀 Quick start / شروع سریع
1. **Install dependencies / نصب وابستگی‌ها**
   ```bash
   npm install
   ```
2. **Local preview / پیش‌نمایش محلی**
   Serve the repository root with any static server (مثلاً `npx serve .`).
3. **Language toggle / تغییر زبان**
   All texts live in `assets/js/i18n.js`. Update both `en` and `fa` blocks together.

## 🛠️ Development Workflow / چرخه توسعه
- Run linting, tests, and build before every commit:
  ```bash
  npm run lint
  npm test
  npm run build
  ```
- The build script outputs a `dist/` folder (used by CI) while leaving the original files untouched.
- CI (see `.github/workflows/pages.yml`) installs dependencies, runs the commands above, uploads `dist/`, and publishes to GitHub Pages automatically.

## 🖼️ Adding new artwork / افزودن آثار جدید
1. Place images inside `assets/images/artworks/<collection-name>/` (both JPEG/PNG/WebP supported).
2. Update `data/collections.json`:
   - Add or edit collection objects with `title`, `description`, and `items` (each `item` has `image`, `title`, `caption`).
   - Provide both English (`en`) and Persian (`fa`) text fields.
3. (Optional) Update `data/artists.json` for new collaborators.
4. The front-end automatically renders the new data with hover captions, modal poetry, and translations—no HTML edits required.

## 🌐 i18n tips / نکات دوزبانه
- Keep English (`en`) as default, Persian (`fa`) mirrored with Vazirmatn typography.
- When adding keys to `assets/js/i18n.js`, update both locales and ensure the meaning feels native, not a literal translation.
- Use the same keys for CTA links so UTM parameters remain intact.

## 📄 Documentation index / فهرست مستندات
- [`OWNER_GUIDE_FA.md`](./OWNER_GUIDE_FA.md): راهنمای کامل برای مالک سایت به فارسی.
- [`RAVANDEH_SITE_PROMPT.md`](./RAVANDEH_SITE_PROMPT.md): guardrails for contributors and automation.
- [`RAVANDEH_UI_UX_PROMPT_APPLE.md`](./RAVANDEH_UI_UX_PROMPT_APPLE.md): Apple-inspired UI/UX brief (“Curvature is sacred…”).

## 📦 Versioning & release process / نسخه‌دهی
- Changes must be recorded in `CHANGELOG.md` using Keep a Changelog format.
- Update documentation in this folder whenever behaviour, setup, or content workflows change.
- Use the PR checklist in `.github/PULL_REQUEST_TEMPLATE.md` to confirm lint/test/build runs and documentation updates.

## ☁️ Deployment / استقرار
- The repository already includes `.github/workflows/pages.yml` for GitHub Pages.
- Custom domains are configured via `CNAME`. Adjust if you host on a different URL.
- No build frameworks or external runtimes are required—pure HTML/CSS/JS.

جریان را ادامه دهید — استودیو رَوَنده کنار شماست.
