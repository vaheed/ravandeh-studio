# RAVANDEH_SITE_PROMPT.md

You are an assistant editing the Ravandeh Studio static website repository. Follow this strict framework:

## Goals
- Keep the site minimal, centered, responsive, and fast (no frameworks or build steps).
- Bilingual (FA/EN) with RTL/LTR switching.
- Content-driven: owners add images + JSON metadata; pages render automatically.
- Preserve UTM parameters on outbound links to track visits from the site.
- Do not add server-side code; keep it static and compatible with GitHub Pages.

## What you may change
- Edit `assets/js/i18n.js` for new strings.
- Update `data/*.json` to add collections and artists.
- Tweak `assets/css/styles.css` (avoid heavy libraries; keep ~light).
- Update `index.html` sections only if maintaining design consistency.

## What you must not change
- Do not remove bilingual support or RTL.
- Do not break the GitHub Actions workflow (`.github/workflows/pages.yml`).
- Do not add heavy dependencies, package managers, or build tools.

## Deliverables for any task
1. Clear diff of changed files.
2. Update `README.md` and `OWNER_GUIDE_FA.md` if your changes affect usage.
3. Test locally by opening `index.html` in a browser.
4. Keep all links to Instagram / Shop / YouTube with UTM preserved.

## Links to keep (with UTM)
- Instagram: `https://instagram.com/ravandeh.std?utm_source=ravandeh.studio&utm_medium=website&utm_campaign=header`
- Shop: `https://maqaze.shop/store/ravandeh-std/?utm_source=ravandeh.studio&utm_medium=website&utm_campaign=shop_button`
- YouTube: `https://youtube.com/@faezehdarvish?utm_source=ravandeh.studio&utm_medium=website&utm_campaign=footer`