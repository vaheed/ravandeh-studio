# Ravandeh Studio

A bilingual (EN/FA) art gallery website featuring liquid glass UI design inspired by Apple's design language.

## Features

- 🎨 Organic curved design with 28-44px rounded edges
- 💎 Liquid glass morphism with layered transparency
- 🌊 Smooth Apple-like animations and physics
- 🌐 Bilingual support (English/Persian) with perfect RTL
- 📱 Fully responsive (mobile to 4K)
- ⚡ Optimized performance (<500KB bundle size)
- 🎭 Art-driven layout for collections and artists

## Design Philosophy

**Curvature is sacred** — every edge breathes. This website is a living exhibition space sculpted from light, glass, and motion.

### Core Principles

1. **Organic Curvature**: Rounded edges inspired by natural forms
2. **Liquid Glass UI**: Subtle transparency, layered blur, gradient reflections
3. **Motion Physics**: Apple-like easing, inertia scroll, fade transitions
4. **Art-Driven Layout**: Like a gallery, not a tech site
5. **Bilingual Excellence**: EN/FA with perfect Vazir-Matn RTL support

## Project Structure

```
ravandeh.studio/
├── App.tsx                    # Main application component
├── components/                # Reusable React components
│   ├── Hero.tsx
│   ├── Collections.tsx
│   ├── Artists.tsx
│   ├── Navigation.tsx
│   └── LanguageToggle.tsx
├── data/                      # Content data
│   ├── collections.json
│   └── artists.json
├── docs/                      # Documentation
│   ├── README.md
│   ├── RAVANDEH_UI_UX_PROMPT_APPLE.md
│   └── OWNER_GUIDE_FA.md
└── styles/
    └── globals.css            # Global styles and design tokens
```

## Technology Stack

- **React**: UI framework
- **Tailwind CSS**: Utility-first styling
- **Motion**: Apple-like animations
- **Unsplash**: High-quality imagery
- **TypeScript/TSX**: Type-safe components

## Getting Started

This project is built for static deployment on GitHub Pages or similar platforms.

### Development

1. Edit content in `/data/collections.json` and `/data/artists.json`
2. Modify design tokens in `/styles/globals.css`
3. Update components in `/components` directory
4. Test bilingual support with the language toggle

### Content Management

All text content is stored in JSON files with this structure:

```json
{
  "title": {
    "en": "English Title",
    "fa": "عنوان فارسی"
  }
}
```

### Styling Guidelines

- Use organic curves: `rounded-[28px]` to `rounded-[44px]`
- Glass effect: `backdrop-blur-xl bg-white/70`
- Animations: Always use Motion for smooth transitions
- Avoid: font-size, font-weight, line-height Tailwind classes (use default typography)

## Deployment

### GitHub Pages

1. Push to your repository
2. Enable GitHub Pages in settings
3. Set source to main branch
4. Add CNAME file with `ravandeh.studio`

### Custom Domain

Create a `CNAME` file in the root with your domain:

```
ravandeh.studio
```

## Performance

- Target: <500KB total bundle size
- Images: Lazy loaded from Unsplash
- Animations: 60fps hardware-accelerated
- Fonts: Subset and optimized

## Accessibility

- Semantic HTML5 structure
- ARIA labels for interactive elements
- Keyboard navigation support
- Reduced motion support for animations
- High contrast text on glass surfaces

## Browser Support

- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Mobile: iOS 14+, Android Chrome 90+

## License

© 2025 Ravandeh Studio. All rights reserved.

## Support

For questions about content updates, see `/docs/OWNER_GUIDE_FA.md`

For design philosophy, see `/docs/RAVANDEH_UI_UX_PROMPT_APPLE.md`
