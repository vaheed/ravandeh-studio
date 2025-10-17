# استودیو رَوَنده | Ravandeh Studio

A bilingual (EN/FA) art gallery website with Apple-inspired liquid glass design, featuring light/dark mode and fully responsive layout.

یک وب‌سایت گالری هنری دوزبانه (انگلیسی/فارسی) با طراحی شیشه‌ای مایع الهام‌گرفته از اپل، دارای حالت روشن/تاریک و طرح کاملاً واکنش‌گرا.

---

## ✨ Features / ویژگی‌ها

- 🎨 **Liquid Glass UI** — Apple-inspired curved design with organic shapes
- 🌓 **Dark Mode** — Seamless light/dark theme switching
- 🌐 **Bilingual** — Full English/Persian (RTL) support
- 📱 **Responsive** — Perfect on mobile, tablet, and desktop
- ⚡ **Fast** — Optimized performance with smooth 60fps animations
- 🎭 **Art-Focused** — Gallery-style layout for showcasing collections
- 🔧 **Easy to Edit** — Update content directly from GitHub

---

## 🚀 Quick Start

### View Your Site

After deployment, your site will be available at:
```
https://YOUR-USERNAME.github.io/ravandeh-studio/
```

Or with custom domain:
```
https://ravandeh.studio
```

### Edit Content

**All content can be edited from GitHub!** No coding needed.

1. **Site Text & Info**: Edit `/data/config.ts`
2. **Collections**: Edit `/data/config.ts` (collectionsData array)
3. **Artists**: Edit `/data/config.ts` (artistsData array)

👉 **See full guide**: [GITHUB_EDITING_GUIDE.md](./docs/GITHUB_EDITING_GUIDE.md)

---

## 📁 Project Structure

```
ravandeh.studio/
├── data/
│   └── config.ts              ← EDIT ALL CONTENT HERE (site, collections, artists)
├── components/                 ← React components (advanced)
├── styles/globals.css          ← Colors and styling (advanced)
├── docs/                       ← Documentation
│   ├── GITHUB_EDITING_GUIDE.md  ← How to edit from GitHub
│   ├── QUICKSTART.md
│   └── README.md
└── .github/workflows/
    └── deploy.yml              ← Auto-deployment to GitHub Pages
```

---

## 🎨 Features Breakdown

### Dark Mode
- Toggle between light and dark themes
- Automatic system preference detection
- Saves user preference in browser
- Smooth transitions between themes

### Navigation
- Sticky glass header
- Language toggle (EN ⇄ FA)
- Theme toggle (Light ⇄ Dark)
- Smooth scroll to sections
- Mobile responsive

### Collections Section
- Grid layout (1-3 columns)
- Glass morphism cards
- Hover zoom effects
- Bilingual titles & descriptions

### Artists Section
- Portrait-focused design
- Specialty badges
- Detailed bios in both languages
- Interactive hover states

### About Section
- Values showcase with icons
- Studio story
- Mission statement
- Animated cards

### Contact Section
- Multiple contact methods
- Social media links
- Call-to-action button
- Email integration

---

## 🔧 How to Edit

### Option 1: Direct GitHub Editing (Recommended)

1. Go to your repository on GitHub
2. Navigate to the file you want to edit
3. Click the pencil icon (✏️)
4. Make changes
5. Click "Commit changes"
6. Wait 2-5 minutes for deployment

### Option 2: Clone and Edit Locally

```bash
git clone https://github.com/YOUR-USERNAME/ravandeh-studio.git
cd ravandeh-studio

# Make your edits

git add .
git commit -m "Updated content"
git push origin main
```

---

## 📝 Common Editing Tasks

### Change Site Name

Edit `/data/config.ts`:
```typescript
export const siteConfig = {
  siteName: {
    en: "Your Studio Name",
    fa: "نام استودیو شما"
  },
  ...
}
```

### Add New Collection

Edit `/data/config.ts` (in collectionsData array):
```typescript
export const collectionsData = [
  ...
  {
    id: "your-collection",
    title: {
      en: "Collection Name",
      fa: "نام مجموعه"
    },
    description: {
      en: "Description...",
      fa: "توضیحات..."
    },
    year: 2025,
    pieces: 12,
    imageQuery: "abstract art"
  }
];
```

### Update Contact Information

Edit `/data/config.ts`:
```typescript
export const siteConfig = {
  ...
  contact: {
    email: "your@email.com",
    instagram: "your.instagram",
    twitter: "yourtwitter",
    website: "your-website.com"
  }
}
```

---

## 🎨 Customization

### Change Colors

Edit `/styles/globals.css` and search for:
- Gradients: `from-blue-500`, `to-purple-500`
- Text colors: `text-[#1a1a1a]`
- Background: `bg-white`, `dark:bg-gray-950`

### Adjust Curves

Change rounded corners in components:
- `rounded-[28px]` — Small curves
- `rounded-[36px]` — Medium curves
- `rounded-[44px]` — Large curves

---

## 🚀 Deployment

### GitHub Pages (Automatic)

This site automatically deploys to GitHub Pages when you push to the `main` branch.

**Setup:**

1. Go to repository Settings → Pages
2. Set Source to "GitHub Actions"
3. Push any change to trigger deployment

**Check deployment status:**
- Go to "Actions" tab in your repository
- See latest workflow run
- ✅ Green = Successfully deployed
- ❌ Red = Failed (check logs)

### Custom Domain

1. Update `/CNAME` file with your domain:
   ```
   ravandeh.studio
   ```

2. In your domain registrar, add DNS records:
   ```
   A     @     185.199.108.153
   A     @     185.199.109.153
   A     @     185.199.110.153
   A     @     185.199.111.153
   CNAME www   YOUR-USERNAME.github.io
   ```

3. Wait 24-48 hours for DNS propagation

---

## 📱 Testing

### Desktop
- Chrome, Firefox, Safari, Edge (latest versions)
- Test both light and dark modes
- Test English and Persian languages

### Mobile
- iOS Safari 14+
- Android Chrome 90+
- Test portrait and landscape orientations

### Checklist
- [ ] All sections load properly
- [ ] Images display correctly
- [ ] Navigation works (smooth scroll)
- [ ] Language toggle works
- [ ] Dark mode toggle works
- [ ] RTL layout works in Persian
- [ ] Links open correctly
- [ ] Mobile responsive

---

## 🆘 Troubleshooting

### Site Not Updating

1. Check Actions tab for deployment status
2. Wait 5-10 minutes after commit
3. Clear browser cache (Ctrl+Shift+R)
4. Check if GitHub Pages is enabled in Settings

### JSON Syntax Error

1. Validate at https://jsonlint.com/
2. Check for missing commas
3. Check for extra commas after last item
4. Ensure all quotes are double quotes `""`

### Dark Mode Not Working

1. Check browser console for errors
2. Verify ThemeContext is wrapping App
3. Clear localStorage: `localStorage.clear()`
4. Check if `dark:` classes are applied

### Persian Text Not Displaying

1. Verify Vazirmatn font is loading
2. Check `dir="rtl"` is applied to HTML
3. Ensure Persian text uses proper Unicode
4. Check browser supports Persian fonts

---

## 📚 Documentation

- **[GitHub Editing Guide](./docs/GITHUB_EDITING_GUIDE.md)** — Edit content from GitHub
- **[Quick Start](./docs/QUICKSTART.md)** — Get started quickly
- **[Design Guide](./docs/RAVANDEH_UI_UX_PROMPT_APPLE.md)** — Design philosophy
- **[Owner Guide (Persian)](./docs/OWNER_GUIDE_FA.md)** — راهنمای فارسی
- **[Deployment Guide](./docs/DEPLOYMENT.md)** — Deployment options

---

## 🛠️ Tech Stack

- **React** — UI framework
- **Tailwind CSS** — Styling
- **Motion** — Animations
- **Lucide React** — Icons
- **TypeScript** — Type safety
- **GitHub Pages** — Hosting

---

## 📄 License

© 2025 Ravandeh Studio. All rights reserved.

---

## 💬 Support

Need help? Check these resources:

1. **[GitHub Editing Guide](./docs/GITHUB_EDITING_GUIDE.md)** — Step-by-step instructions
2. **GitHub Issues** — Report bugs or ask questions
3. **Actions Tab** — Check deployment status and logs

---

## 🌟 Credits

- **Design Philosophy**: Apple-inspired liquid glass UI
- **Fonts**: System fonts + Vazirmatn for Persian
- **Icons**: Lucide React
- **Animations**: Motion (Framer Motion)

---

**Happy Creating! / خلاقانه باشید! 🎨✨**
