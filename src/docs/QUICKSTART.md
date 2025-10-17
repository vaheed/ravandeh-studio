# Quick Start Guide — Ravandeh Studio

Welcome to your new Ravandeh Studio website! This guide will help you get started quickly.

## 🎨 What You Have

A beautiful, bilingual art gallery website featuring:
- **Liquid Glass UI**: Apple-inspired curved design with transparency effects
- **Bilingual Support**: English and Persian (فارسی) with RTL layout
- **Responsive Design**: Perfect on mobile, tablet, and desktop
- **Smooth Animations**: Hardware-accelerated transitions and effects
- **Art Collections**: 3 curated collections ready to showcase
- **Artist Profiles**: 3 artist showcases with portraits and bios

## 📁 Project Structure

```
ravandeh.studio/
├── App.tsx                    # Main application
├── components/                # React components
│   ├── LanguageContext.tsx    # Bilingual system
│   ├── Navigation.tsx         # Top navigation bar
│   ├── Hero.tsx              # Landing section
│   ├── Collections.tsx        # Art collections grid
│   ├── Artists.tsx           # Artist profiles
│   ├── About.tsx             # About section
│   ├── Contact.tsx           # Contact section
│   └── Footer.tsx            # Footer
├── data/                      # Content (EDIT THESE!)
│   ├── collections.json       # Your art collections
│   └── artists.json          # Your artists
├── docs/                      # Documentation
│   ├── README.md
│   ├── RAVANDEH_UI_UX_PROMPT_APPLE.md
│   ├── OWNER_GUIDE_FA.md     # Persian guide
│   ├── DEPLOYMENT.md
│   └── QUICKSTART.md         # This file
├── styles/
│   └── globals.css           # Global styles
└── CNAME                     # Custom domain config
```

## ✏️ How to Edit Content

### Update Collections

Edit `/data/collections.json`:

```json
{
  "id": "your-collection-id",
  "title": {
    "en": "Collection Name",
    "fa": "نام مجموعه"
  },
  "description": {
    "en": "Description...",
    "fa": "توضیحات..."
  },
  "year": 2025,
  "pieces": 10,
  "imageQuery": "abstract art"
}
```

### Update Artists

Edit `/data/artists.json`:

```json
{
  "id": "artist-name",
  "name": {
    "en": "Artist Name",
    "fa": "نام هنرمند"
  },
  "bio": {
    "en": "Biography...",
    "fa": "بیوگرافی..."
  },
  "specialty": {
    "en": "Specialty",
    "fa": "تخصص"
  },
  "imageQuery": "artist portrait"
}
```

**Important**: Always provide both English and Persian text!

## 🎨 Design Customization

### Change Colors

Edit `/styles/globals.css` - look for gradient colors:
- `from-blue-500` → Your color
- `to-purple-500` → Your color
- `via-pink-50` → Your color

### Adjust Curves

Change rounded corners in components:
- `rounded-[28px]` → Small curves
- `rounded-[36px]` → Medium curves (default cards)
- `rounded-[44px]` → Large curves (hero section)

### Modify Animations

Components use Motion for animations. Adjust in component files:
- `duration: 0.8` → Speed of animation
- `delay: 0.2` → Delay before animation starts
- `ease: [0.4, 0, 0.2, 1]` → Apple-like easing curve

## 🌐 Language Toggle

Users can switch between English and Persian by clicking the language button in the navigation.

**How it works**:
- Context provider manages language state
- `t()` function translates text objects: `{en: "Hello", fa: "سلام"}`
- RTL layout automatically applied for Persian
- Vazirmatn font loaded for Persian text

## 🚀 Deployment

### Quick Deploy to GitHub Pages

1. Create GitHub repository
2. Push your code:
   ```bash
   git init
   git add .
   git commit -m "Initial commit"
   git remote add origin https://github.com/yourusername/ravandeh-studio.git
   git push -u origin main
   ```
3. Enable GitHub Pages in repository settings
4. Your site is live! 🎉

See [DEPLOYMENT.md](./DEPLOYMENT.md) for detailed deployment guides.

## 🔧 Common Tasks

### Add a New Collection

1. Open `/data/collections.json`
2. Copy an existing collection object
3. Paste at the end (before the closing `]`)
4. Update all fields with new data
5. Don't forget the comma between objects!

Example:
```json
[
  {...existing collection...},
  {...existing collection...},
  {
    "id": "new-collection",
    "title": {"en": "New Collection", "fa": "مجموعه جدید"},
    ...
  }
]
```

### Change Hero Text

Edit `/components/Hero.tsx`:
- Look for `heroTitle` and `heroSubtitle`
- Update the English and Persian text

### Update Contact Information

Edit `/components/Contact.tsx`:
- Update email addresses
- Update social media links
- Change contact methods

### Add New Section

1. Create new component in `/components/YourSection.tsx`
2. Import in `/App.tsx`
3. Add to the `<main>` section

## 📱 Testing

### Test Locally

If you have a local server:
```bash
python -m http.server 8000
# Or use any static file server
```

### Test Checklist

- [ ] English language works
- [ ] Persian language works
- [ ] RTL layout correct in Persian
- [ ] All images load
- [ ] Navigation scrolls smoothly
- [ ] Animations are smooth (60fps)
- [ ] Mobile responsive
- [ ] Hover effects work
- [ ] Contact links work

## 🎯 Next Steps

1. **Customize Content**: Update collections and artists with your real data
2. **Add Images**: Replace Unsplash images with your own (requires developer help)
3. **Customize Colors**: Match your brand colors in CSS
4. **Deploy**: Get your site live on GitHub Pages
5. **Domain**: Point your custom domain to the site
6. **SEO**: Add meta tags for better search visibility

## 📚 Documentation

- **Design Philosophy**: See [RAVANDEH_UI_UX_PROMPT_APPLE.md](./RAVANDEH_UI_UX_PROMPT_APPLE.md)
- **Persian Guide**: See [OWNER_GUIDE_FA.md](./OWNER_GUIDE_FA.md)
- **Deployment**: See [DEPLOYMENT.md](./DEPLOYMENT.md)
- **Full README**: See [README.md](./README.md)

## 🆘 Getting Help

### Common Issues

**Q: Images not loading?**
A: Check the image URLs in the component files. Unsplash images are temporary.

**Q: Persian text looks wrong?**
A: Make sure Vazirmatn font is loading. Check browser console for font errors.

**Q: Animations choppy?**
A: Reduce animation complexity or duration. Check browser performance.

**Q: Layout broken?**
A: Check for missing closing tags in JSON files. Use a JSON validator.

### Need Developer Help?

Tasks that may need a developer:
- Uploading custom images
- Complex layout changes
- Adding new interactive features
- Performance optimization
- Advanced SEO setup

## 🎨 Design Tips

### Apple-Inspired Design Rules

1. **Curves are sacred**: Never use sharp corners
2. **Breathing room**: Give content space (generous padding)
3. **Glass effects**: Use transparency and blur
4. **Smooth motion**: All animations should feel natural
5. **Typography**: Keep it clean and readable

### Content Tips

1. **Images**: Use high-quality, cohesive imagery
2. **Text**: Keep descriptions concise but meaningful
3. **Bilingual**: Always provide both languages
4. **Consistency**: Maintain same tone across all content

## ✨ Features Breakdown

### Navigation
- Sticky glass header
- Smooth scroll to sections
- Language toggle
- Mobile-responsive

### Hero Section
- Full-screen landing
- Gradient glass card
- Parallax background
- Animated scroll indicator

### Collections
- Grid layout (1-3 columns responsive)
- Glass cards with hover effects
- Image zoom on hover
- Bilingual content

### Artists
- Portrait-focused design
- Specialty badges
- Detailed bios
- Hover lift effects

### About
- Values showcase
- Icon animations
- Story section
- Mission statement

### Contact
- Multiple contact methods
- Social links
- Glass card design
- Call-to-action

### Footer
- Social icons
- Copyright
- Additional links
- Minimal design

## 🚀 Performance

Current optimizations:
- ✅ Lazy loaded images
- ✅ Hardware-accelerated animations
- ✅ Optimized fonts (subset)
- ✅ Minimal dependencies
- ✅ Responsive images
- ✅ Smooth scrolling

Target metrics:
- Load time: < 2 seconds
- FPS: 60fps animations
- Bundle size: < 500KB
- Mobile-friendly: 100% responsive

---

**Enjoy your new website!** 🎨✨

For detailed guides in Persian, see [OWNER_GUIDE_FA.md](./OWNER_GUIDE_FA.md)
