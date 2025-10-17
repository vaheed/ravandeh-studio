# Update Site Name to "استودیو رَوَنده"

Quick guide to update the site name with proper Persian diacritics.

## Current Status ✅

The site name is configured as:
- English: **Ravandeh Studio**
- Persian: **استودیو رَوَنده** (with proper diacritic on "رَ")

## File Already Configured

The name is stored in `/data/site-config.json`:

```json
{
  "siteName": {
    "en": "Ravandeh Studio",
    "fa": "استودیو رَوَنده"
  }
}
```

## Where the Name Appears

The site name from config file is used in:

1. **Navigation Bar** — Top left logo
2. **Footer** — Center text
3. **Hero Section** — Uses tagline from config

## How to Change It

### Option 1: Edit on GitHub

1. Go to: `https://github.com/YOUR-USERNAME/ravandeh-studio/blob/main/data/site-config.json`
2. Click the pencil icon (✏️)
3. Find the `"siteName"` section
4. Change the text:
   ```json
   "siteName": {
     "en": "Your New English Name",
     "fa": "نام جدید فارسی شما"
   }
   ```
5. Commit changes

### Option 2: Copy-Paste Ready Text

If you want to use "استودیو رَوَنده" with diacritic:

```json
"siteName": {
  "en": "Ravandeh Studio",
  "fa": "استودیو رَوَنده"
}
```

Note the diacritic "َ" (fatha) on the "ر" in "رَوَنده".

## Persian Typography Notes

### With Diacritics (More Formal)
```
استودیو رَوَنده
```

### Without Diacritics (Simpler)
```
استودیو روندِه
```

### Alternative Spellings
```
استودیو روَنده   (with fatha on و)
استودیوی روندِه  (with ezafe)
```

Choose the version that best represents your brand!

## Tagline

Also configured in the same file:

```json
"tagline": {
  "en": "Where Art Meets Light",
  "fa": "جایی که هنر با نور ملاقات می‌کند"
}
```

## Testing After Change

After committing:
1. Wait 2-5 minutes for deployment
2. Refresh your site (Ctrl+Shift+R)
3. Toggle to Persian language
4. Check navigation bar and footer
5. Verify text displays correctly in both modes (light/dark)

## RTL Display

The Persian name will automatically:
- Display right-to-left
- Use Vazirmatn font
- Align properly in navigation
- Work in both light and dark modes

## Common Issues

### Diacritic Not Showing

**Problem**: Diacritic mark appears as separate character or doesn't show

**Solution**:
1. Ensure proper Unicode encoding (UTF-8)
2. Copy-paste directly from this file
3. Use a Unicode-aware text editor

### Text Too Long in Navigation

**Problem**: Long names break layout on mobile

**Solution**:
1. Use shorter version on mobile (automatic with `whitespace-nowrap`)
2. Or adjust in `/components/Navigation.tsx`:
   ```tsx
   className="text-sm md:text-lg"
   ```

### Font Not Loading

**Problem**: Persian text shows in wrong font

**Solution**:
1. Check browser console for font errors
2. Verify Vazirmatn font is loading in `/styles/globals.css`
3. Try clearing browser cache

## Need Help?

See [GITHUB_EDITING_GUIDE.md](./GITHUB_EDITING_GUIDE.md) for detailed instructions on editing any content on the site.

---

**Current configured name**: استودیو رَوَنده | Ravandeh Studio ✨
