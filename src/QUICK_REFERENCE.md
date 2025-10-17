# Quick Reference Card — Ravandeh Studio

## 🎯 Most Common Tasks

### Change Site Name
**File:** `/data/config.ts`
```typescript
siteName: {
  en: "Your Name",
  fa: "نام شما"
}
```

### Add Collection
**File:** `/data/config.ts` (in collectionsData)
```typescript
{
  id: "my-collection",
  title: {en: "...", fa: "..."},
  description: {en: "...", fa: "..."},
  year: 2025,
  pieces: 10,
  imageQuery: "art type"
}
```

### Add Artist
**File:** `/data/config.ts` (in artistsData)
```typescript
{
  id: "artist-name",
  name: {en: "...", fa: "..."},
  bio: {en: "...", fa: "..."},
  specialty: {en: "...", fa: "..."},
  imageQuery: "portrait"
}
```

### Update Contact Info
**File:** `/data/config.ts`
```typescript
contact: {
  email: "your@email.com",
  instagram: "your.handle",
  twitter: "yourhandle",
  website: "yoursite.com"
}
```

---

## 📁 File Locations

| What | Where |
|------|-------|
| Site name, hero text | `/data/config.ts` |
| Collections | `/data/config.ts` (collectionsData) |
| Artists | `/data/config.ts` (artistsData) |
| Colors & styling | `/styles/globals.css` |
| Deployment | `/workflows/deploy.yml` |
| Domain | `/CNAME` |

---

## 🔗 Quick Links (GitHub)

Replace `YOUR-USERNAME` with your GitHub username:

- **Edit all content**: `github.com/YOUR-USERNAME/ravandeh-studio/edit/main/data/config.ts`
- **Check deployment**: `github.com/YOUR-USERNAME/ravandeh-studio/actions`
- **View site**: `YOUR-USERNAME.github.io/ravandeh-studio`

---

## ⚡ Deployment

1. Edit file on GitHub
2. Commit changes
3. Wait 2-5 minutes
4. Refresh site (Ctrl+Shift+R)

**Check status**: Actions tab (green ✅ = success)

---

## 🌐 Language Toggle

- **Default**: English
- **Switch**: Click "فا" button in navigation
- **RTL**: Automatically applied for Persian
- **Font**: Vazirmatn for Persian, system fonts for English

---

## 🌓 Theme Toggle

- **Default**: Light mode (or system preference)
- **Switch**: Click moon/sun icon in navigation
- **Saved**: User preference stored in browser
- **Both**: All components support light & dark

---

## ✅ JSON Rules

1. Use double quotes: `"text"`
2. Add commas between items
3. NO comma after last item
4. Match brackets: `{...}` and `[...]`
5. Validate at: jsonlint.com

**Example:**
```json
[
  { "item": "one" },
  { "item": "two" }
]
```

---

## 🚨 Troubleshooting

| Problem | Solution |
|---------|----------|
| Site not updating | Check Actions tab, wait 5-10 min |
| JSON error | Validate at jsonlint.com |
| Persian not showing | Check Vazirmatn font loading |
| Dark mode not working | Clear localStorage, refresh |
| Images not loading | Check Unsplash URLs |

---

## 📱 Test Checklist

- [ ] Desktop browser (Chrome, Firefox, Safari)
- [ ] Mobile browser (iOS Safari, Android Chrome)
- [ ] English language
- [ ] Persian language (RTL)
- [ ] Light mode
- [ ] Dark mode
- [ ] All sections load
- [ ] All links work
- [ ] Navigation smooth scroll
- [ ] Contact info correct

---

## 🎨 Design Tokens

### Curves
- Small: `rounded-[28px]`
- Medium: `rounded-[36px]`
- Large: `rounded-[44px]`

### Colors (Light Mode)
- Text: `#1a1a1a`
- Secondary: `#6b6b6b`
- Background: `white`

### Colors (Dark Mode)
- Text: `white`
- Secondary: `gray-300`
- Background: `gray-950`

### Gradients
- Primary: `from-blue-500 to-purple-500`
- Accent: `from-purple-500 to-pink-500`

---

## 📚 Documentation

- **Full Guide**: [GITHUB_EDITING_GUIDE.md](./docs/GITHUB_EDITING_GUIDE.md)
- **Quick Start**: [QUICKSTART.md](./docs/QUICKSTART.md)
- **Site Name**: [SITE_NAME_UPDATE.md](./docs/SITE_NAME_UPDATE.md)
- **Deployment**: [DEPLOYMENT.md](./docs/DEPLOYMENT.md)
- **Design**: [RAVANDEH_UI_UX_PROMPT_APPLE.md](./docs/RAVANDEH_UI_UX_PROMPT_APPLE.md)
- **Persian Guide**: [OWNER_GUIDE_FA.md](./docs/OWNER_GUIDE_FA.md)

---

## 💡 Pro Tips

1. **Make small changes**: Edit one thing at a time
2. **Validate JSON**: Always check before committing
3. **Keep backups**: Copy content before major edits
4. **Test both languages**: Switch to Persian after changes
5. **Clear cache**: Use Ctrl+Shift+R to see updates

---

## 🆘 Get Help

1. Check [GITHUB_EDITING_GUIDE.md](./docs/GITHUB_EDITING_GUIDE.md)
2. Review Actions tab for errors
3. Validate JSON at jsonlint.com
4. Open Issue on GitHub
5. Revert to previous version if needed

---

**Remember**: All changes are saved in Git history. You can always undo! ✨
