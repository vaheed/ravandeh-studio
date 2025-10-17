# Ravandeh Studio — Documentation Hub

Welcome to the canonical documentation for **Ravandeh Studio**. This site is a minimalist, bilingual (English + فارسی) art-book experience rendered entirely with static HTML, CSS, and JavaScript.

## ✨ Highlights / ویژگی‌ها
- Liquid-glass hero with parallax motion, animated EN↔FA mirror toggle, and rotating bilingual quotes.
- Curved glass cards for collections, artists, and shop sections sourced from `/data/*.json` (no hardcoded gallery content).
- Responsive depth-of-field lightbox with accessible keyboard controls and mirrored captions.
- Fully responsive (320px → 4K), auto light/dark gradients, smooth hover reveals, and preserved typography (Inter/Playfair + Vazirmatn).

## 🚀 Quick start / شروع سریع
1. **Install dependencies / نصب وابستگی‌ها**
   ```bash
   npm install
   ```
2. **Local preview / پیش‌نمایش محلی**
   Serve the repository root with any static server (مثلاً `npx serve .`).
3. **Language toggle / تغییر زبان**
   All texts live in `assets/js/i18n.js`. Update both `en` and `fa` blocks together. The animated toggle mirrors the active/target language automatically.

## 🛠️ Development Workflow / چرخه توسعه
- Run linting, tests, and build before every commit:
  ```bash
  npm run lint
  npm test
  npm run build
  ```
- The build script outputs a `dist/` folder (used by CI) while leaving the original files untouched.
- CI (see `.github/workflows/pages.yml`) installs dependencies, runs the commands above, uploads `dist/`, and publishes to GitHub Pages automatically.

## 🖼️ Managing data-driven content / مدیریت محتوای داده‌محور
### Collections / مجموعه‌ها
- File: `data/collections.json`
- Each collection supports the following fields:
  - `slug`: unique identifier.
  - `title`, `summary`, `description`: provide both English (`en`) and Persian (`fa`).
  - `meta`: array of objects with bilingual `label` and `value` for edition stats.
  - `palette`: up to three hex colours used to tint the glass card.
  - `items`: array with `image`, bilingual `title` + `caption`, and optional bilingual `alt` text. These feed the gallery lightbox.
- Images live under `assets/images/artworks/<collection>/`. Optimise for responsive loading.

### Artists / هنرمندان
- File: `data/artists.json`
- Fields per artist:
  - `name`, bilingual `role`, `bio`.
  - `highlights`: array of bilingual callouts displayed as glass pills.
  - `links`: label + URL (UTM parameters are enforced automatically).
  - `avatar`: image path; provide square or 4:5 assets for best results.

## 🌐 i18n tips / نکات دوزبانه
- Keep English (`en`) as default, Persian (`fa`) mirrored with Vazirmatn typography.
- When adding keys to `assets/js/i18n.js`, update both locales and ensure natural phrasing (not literal translation).
- The animated toggle reads `language_short` from each locale; keep them concise (e.g., `EN`, `فا`).

## 📄 Documentation index / فهرست مستندات
- [`OWNER_GUIDE_FA.md`](./OWNER_GUIDE_FA.md): راهنمای کامل برای مالک سایت به فارسی.
- [`RAVANDEH_SITE_PROMPT.md`](./RAVANDEH_SITE_PROMPT.md): guardrails for contributors and automation.
- [`RAVANDEH_UI_UX_PROMPT_APPLE.md`](./RAVANDEH_UI_UX_PROMPT_APPLE.md): Apple-inspired UI/UX brief (“Curvature is sacred…”).

## 📦 Versioning & release process / نسخه‌دهی
- Changes must be recorded in `CHANGELOG.md` using Keep a Changelog format.
- Update documentation in this folder whenever behaviour, setup, or content workflows change.
- Use the PR checklist in `.github/PULL_REQUEST_TEMPLATE.md` to confirm lint/test/build runs and documentation updates.

## ☁️ Deployment / استقرار
- `.github/workflows/pages.yml` installs dependencies, runs lint/test/build, uploads `dist/`, and deploys to GitHub Pages.
- Custom domains are configured via `CNAME`. Adjust if you host on a different URL.
- No build frameworks or external runtimes are required—pure HTML/CSS/JS.

جریان را ادامه دهید — استودیو رَوَنده کنار شماست.
