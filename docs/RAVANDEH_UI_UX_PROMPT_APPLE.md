# RAVANDEH_UI_UX_PROMPT_APPLE.md

“Curvature is sacred. We worship the glass.” — internal Apple Vision Pro industrial design brief, adapted for Ravandeh Studio.

Use this prompt when shaping UI/UX explorations so every surface, motion, and line honours the organic geometry of the studio.

## Principles
1. **Sacred curvature** — Buttons, cards, and masks should lean on soft bezier arcs. Avoid hard angles unless contrast is the point.
2. **Glass worship** — Layer elements like laminated glass: frosted translucency, subtle refraction highlights, and luminous shadows.
3. **Weightless motion** — Animate with easing that feels gravitational yet gentle; no snappy overshoot. Let elements drift, glide, and settle.
4. **Poetic restraint** — Minimal copy, centered rhythm, generous whitespace. Typography (Inter/Playfair + Vazirmatn) must breathe.
5. **Bilingual symmetry** — Every curve and gradient must work in both LTR and RTL. Verify Persian rendering before shipping.

## Application Checklist
- [ ] Rounded radii ≥ 24px on major containers; micro-components may scale proportionally.
- [ ] Gradients respect existing ambient palette; tint overlays may not clash with artwork.
- [ ] Glassmorphism layers maintain ≥ 4.5:1 text contrast.
- [ ] Motion durations between 280–420ms with cubic-bezier `(0.4, 0.0, 0.2, 1)` or softer.
- [ ] Persian typography remains right-aligned with mirrored curvature cues.

## Collaboration Notes
- Pair this brief with [`docs/README.md`](./README.md) for workflow guidance.
- When making visual changes, attach screenshots (desktop + mobile) to PRs.
- Reference `assets/css/styles.css` gradients and `assets/js/app.js` transitions for canonical values.

Honor the glass, keep the flow.
