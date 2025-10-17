# Ravandeh Studio Theme - Installation Guide

## Quick Start (5 Minutes)

### Step 1: Install Theme

**Option A: Via WordPress Admin (Recommended)**
1. Download the theme ZIP file
2. Go to WordPress Admin → `Appearance` → `Themes` → `Add New`
3. Click `Upload Theme`
4. Choose the ZIP file and click `Install Now`
5. Click `Activate`

**Option B: Via FTP**
1. Extract the theme ZIP file
2. Upload the `ravandeh-studio` folder to `/wp-content/themes/`
3. Go to WordPress Admin → `Appearance` → `Themes`
4. Find "Ravandeh Studio" and click `Activate`

### Step 2: Configure Theme Settings

1. Go to `Ravandeh Options` in the WordPress sidebar
2. Fill in your bilingual content:
   ```
   Site Name (EN): Ravandeh Studio
   Site Name (FA): استودیو رَوَنده
   
   Hero Title (EN): Where Art Meets Light
   Hero Title (FA): جایی که هنر با نور ملاقات می‌کند
   
   [Continue with other fields...]
   ```
3. Click `Save Settings`

### Step 3: Set Homepage

1. Create a new page called "Home"
2. Go to `Settings` → `Reading`
3. Select "A static page" for homepage
4. Choose "Home" from dropdown
5. Click `Save Changes`

### Step 4: Compile CSS (Important!)

```bash
# Navigate to theme directory
cd /path/to/wordpress/wp-content/themes/ravandeh-studio

# Install Node.js dependencies
npm install

# Build production CSS
npm run build:css
```

**Alternative: Use Pre-compiled CSS**
If you can't run npm commands, the theme includes a pre-compiled CSS file. Just make sure `tailwind-compiled.css` exists in the `assets/css/` folder.

### Step 5: Add Sample Content

#### Create an Artist

1. Go to `Artists` → `Add New`
2. Fill in:
   - Title: "Sara Mohebi"
   - Content: Brief biography in English
   - Meta Fields:
     - Name (Persian): "سارا محبی"
     - Bio (Persian): Persian biography
     - Specialty (EN): "Digital Art & Calligraphy"
     - Specialty (FA): "هنر دیجیتال و خوشنویسی"
3. Set Featured Image (artist photo)
4. Click `Publish`

#### Create a Collection

1. Go to `Collections` → `Add New`
2. Fill in:
   - Title: "Ethereal Forms"
   - Content: Collection description in English
   - Meta Fields:
     - Title (Persian): "فرم‌های اثیری"
     - Description (Persian): Persian description
     - Year: 2024
     - Number of Pieces: 12
3. Set Featured Image (collection image)
4. Click `Publish`

## Advanced Configuration

### Customize Colors

1. Go to `Appearance` → `Customize`
2. Navigate to `Ravandeh Colors`
3. Change:
   - Primary Color (default: #6366f1)
   - Accent Color (default: #8b5cf6)
4. Click `Publish`

### Add Custom Logo

1. Go to `Appearance` → `Customize` → `Site Identity`
2. Click `Select Logo`
3. Upload your logo (recommended: 250x60px PNG with transparency)
4. Adjust cropping
5. Click `Publish`

### Setup Navigation Menu

1. Go to `Appearance` → `Menus`
2. Create a new menu called "Primary Menu"
3. Add pages/links you want
4. Assign to "Primary Menu" location
5. Click `Save Menu`

### Configure Permalinks

1. Go to `Settings` → `Permalinks`
2. Select "Post name" (recommended)
3. Click `Save Changes`

This will create nice URLs like:
- `yourdomain.com/artists/sara-mohebi/`
- `yourdomain.com/collections/ethereal-forms/`

### Setup Social Media

1. Go to `Ravandeh Options`
2. Scroll to "Contact Information"
3. Fill in:
   - Email: hello@ravandeh.studio
   - Instagram: ravandeh.studio
   - Twitter: ravandehstudio
4. Click `Save Settings`

Social icons will automatically appear in the footer and contact section.

## Development Setup

### For Developers

```bash
# Clone or download theme
cd /path/to/wordpress/wp-content/themes/ravandeh-studio

# Install dependencies
npm install

# Development mode (watches for changes)
npm run dev:css

# Production build (minified)
npm run build:css
```

### Customizing Tailwind

1. Edit `tailwind.config.js` to add your custom colors, fonts, etc.
2. Add custom styles to `assets/css/custom.css`
3. Rebuild CSS: `npm run build:css`

### Adding Custom JavaScript

1. Edit `assets/js/main.js`
2. Your changes will be automatically loaded

### Creating Child Theme (Recommended for Customization)

```php
/* In child theme's style.css */
/*
Theme Name: Ravandeh Studio Child
Template: ravandeh-studio
*/

/* In child theme's functions.php */
<?php
function ravandeh_child_enqueue_styles() {
    wp_enqueue_style('ravandeh-parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('ravandeh-child-style', get_stylesheet_uri(), array('ravandeh-parent-style'));
}
add_action('wp_enqueue_scripts', 'ravandeh_child_enqueue_styles');
```

## Troubleshooting

### CSS Not Loading / Styles Look Broken

**Problem**: Tailwind CSS not compiled
**Solution**:
```bash
cd wp-content/themes/ravandeh-studio
npm install
npm run build:css
```

Then clear your browser cache and WordPress cache.

### Custom Post Types Not Showing

**Problem**: WordPress permalinks not refreshed
**Solution**:
1. Go to `Settings` → `Permalinks`
2. Click `Save Changes` (don't change anything)
3. Check if Artists and Collections pages now work

### Language Toggle Not Working

**Problem**: JavaScript errors or cookie issues
**Solution**:
1. Check browser console for errors (F12)
2. Make sure cookies are enabled
3. Clear browser cache
4. Try incognito/private mode

### Dark Mode Not Persisting

**Problem**: Cookies not being saved
**Solution**:
1. Check if cookies are enabled in browser
2. Make sure site is using HTTPS (cookies may be blocked on HTTP)
3. Clear all cookies for your site and try again

### Images Not Displaying

**Problem**: Missing featured images or incorrect paths
**Solution**:
1. Make sure you've set featured images for all artists/collections
2. Check file permissions (should be 644 for files)
3. Regenerate thumbnails using a plugin like "Regenerate Thumbnails"

### 404 Errors on Single Pages

**Problem**: Permalinks not configured
**Solution**:
1. Go to `Settings` → `Permalinks`
2. Click `Save Changes`
3. Try accessing the page again

## Migration from React Version

If you're migrating from the React version of Ravandeh Studio:

1. **Export Content**: Save all your content from the React app
2. **Install WordPress Theme**: Follow installation steps above
3. **Import Content**:
   - Manually add artists and collections using the WordPress admin
   - Or use WordPress import tools
4. **Configure Settings**: Set all theme options to match your React app
5. **Test**: Check all pages and functionality

## Server Requirements

- **PHP**: 7.4 or higher (8.0+ recommended)
- **MySQL**: 5.7 or higher
- **WordPress**: 6.0 or higher
- **Memory**: 128MB minimum (256MB+ recommended)
- **Upload Size**: 32MB minimum (for images)

### Checking PHP Version

Add this to a temporary PHP file and access it via browser:
```php
<?php phpinfo(); ?>
```

Or use WP-CLI:
```bash
wp cli info
```

## Performance Optimization

### Enable Caching

**Recommended Plugins**:
- WP Rocket (Premium)
- W3 Total Cache (Free)
- WP Super Cache (Free)

### Image Optimization

**Recommended Plugins**:
- Smush (Free/Premium)
- ShortPixel (Free/Premium)
- EWWW Image Optimizer (Free)

### CDN Setup

For better performance worldwide:
1. Sign up for Cloudflare (free)
2. Point your domain to Cloudflare
3. Enable caching and minification

### Database Optimization

Use plugins like:
- WP-Optimize
- WP-Sweep

## Security

### Essential Security Measures

1. **Keep Updated**: Always update WordPress, theme, and plugins
2. **Use Strong Passwords**: For admin accounts
3. **Install Security Plugin**: 
   - Wordfence Security
   - Sucuri Security
   - iThemes Security

4. **Enable SSL**: Use HTTPS (free with Let's Encrypt)
5. **Limit Login Attempts**: Use a plugin to prevent brute force attacks
6. **Regular Backups**: Use UpdraftPlus or similar

## Support Resources

- **Theme Documentation**: Read this file and README.md
- **WordPress Codex**: https://codex.wordpress.org
- **WordPress Support Forums**: https://wordpress.org/support/
- **Stack Overflow**: Tag questions with `wordpress`

## Need Help?

If you're still having issues:

1. Check the README.md file
2. Search WordPress support forums
3. Contact: hello@ravandeh.studio

---

**Next Steps After Installation:**

1. ✅ Theme installed and activated
2. ✅ CSS compiled
3. ✅ Settings configured
4. ✅ Homepage set
5. ✅ Sample content added
6. 🎉 Your site is ready!

Visit your site and enjoy your new Ravandeh Studio theme!
