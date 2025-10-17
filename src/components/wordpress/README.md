# Ravandeh Studio WordPress Theme

![Version](https://img.shields.io/badge/version-1.0.0-blue.svg)
![WordPress](https://img.shields.io/badge/wordpress-6.0+-blue.svg)
![PHP](https://img.shields.io/badge/php-7.4+-purple.svg)
![License](https://img.shields.io/badge/license-GPL--2.0+-green.svg)

A premium WordPress theme featuring Apple-inspired liquid glass design philosophy with glassmorphism effects, smooth animations, and full bilingual EN/FA support with proper RTL layout. Perfect for art galleries, creative studios, and portfolio websites.

## ✨ Features

- **🎨 Glassmorphism Design**: Beautiful glass-like elements with backdrop blur effects
- **🌓 Dark Mode**: Seamless light/dark mode toggle with user preference saving
- **🌍 Bilingual Support**: Full English and Persian (Farsi) support with RTL layout
- **📱 Responsive**: Mobile-first design that works on all devices (320px to 4K)
- **⚡ Performance**: Hardware-accelerated animations for 60fps performance
- **🎭 Custom Post Types**: Artists and Collections with bilingual meta fields
- **🎬 Smooth Animations**: GSAP-powered scroll animations and parallax effects
- **♿ Accessible**: WCAG 2.1 compliant with keyboard navigation support
- **🔍 SEO Optimized**: Clean semantic HTML5 markup
- **🎨 Customizable**: WordPress Customizer integration for easy customization

## 📋 Requirements

- WordPress 6.0 or higher
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Node.js 16+ (for development)

## 🚀 Installation

### Quick Install

1. **Download the theme** from this repository
2. **Upload to WordPress**:
   - Go to `Appearance > Themes > Add New > Upload Theme`
   - Choose the `ravandeh-studio.zip` file
   - Click `Install Now` and then `Activate`

### Manual Install

1. **Download the theme** files
2. **Upload via FTP**:
   - Connect to your server via FTP
   - Navigate to `/wp-content/themes/`
   - Upload the `ravandeh-studio` folder
3. **Activate**:
   - Go to `Appearance > Themes` in WordPress admin
   - Find "Ravandeh Studio" and click `Activate`

## 🔧 Setup & Configuration

### 1. Initial Setup

After activating the theme:

1. Go to `Ravandeh Options` in the WordPress admin sidebar
2. Configure your bilingual content:
   - Site name (EN/FA)
   - Hero section content
   - About section content
   - Contact information
3. Click `Save Settings`

### 2. Set Homepage

1. Go to `Settings > Reading`
2. Select "A static page" for "Your homepage displays"
3. Choose "Home" or create a new page with the "Front Page" template
4. Save changes

### 3. Create Custom Post Types

#### Adding Artists

1. Go to `Artists > Add New`
2. Enter artist name (English) as the title
3. Add artist biography in the content editor
4. Fill in the "Artist Details" meta box:
   - Name (Persian)
   - Bio (Persian)
   - Specialty (English)
   - Specialty (Persian)
5. Set a featured image (artist photo)
6. Publish

#### Adding Collections

1. Go to `Collections > Add New`
2. Enter collection title (English) as the title
3. Add collection description in the content editor
4. Fill in the "Collection Details" meta box:
   - Title (Persian)
   - Description (Persian)
   - Year
   - Number of Pieces
5. Set a featured image (collection image)
6. Publish

### 4. Customize Colors & Branding

1. Go to `Appearance > Customize`
2. Navigate to `Ravandeh Colors`
3. Customize:
   - Primary Color
   - Accent Color
4. Navigate to `Site Identity`
5. Upload your logo
6. Click `Publish`

## 🎨 Compiling Tailwind CSS

The theme uses Tailwind CSS which needs to be compiled for production use.

### Development Setup

```bash
# Navigate to theme directory
cd wp-content/themes/ravandeh-studio

# Install dependencies
npm install

# Create package.json if not exists
npm init -y

# Install Tailwind CSS
npm install -D tailwindcss

# Create Tailwind config
npx tailwindcss init
```

### Compile CSS

```bash
# For development (with watch mode)
npm run dev:css

# For production (minified)
npm run build:css
```

### NPM Scripts

Add these scripts to your `package.json`:

```json
{
  "scripts": {
    "dev:css": "npx tailwindcss -i ./assets/css/tailwind.css -o ./assets/css/tailwind-compiled.css --watch",
    "build:css": "npx tailwindcss -i ./assets/css/tailwind.css -o ./assets/css/tailwind-compiled.css --minify"
  }
}
```

### Tailwind Configuration

Create `tailwind.config.js` in the theme root:

```javascript
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./**/*.php",
    "./template-parts/**/*.php",
    "./inc/**/*.php",
    "./assets/js/**/*.js",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      borderRadius: {
        '4xl': '2.75rem',
      },
    },
  },
  plugins: [],
}
```

## 📝 Content Management

### Bilingual Content

The theme stores bilingual content in two ways:

1. **Theme Options**: Site-wide text like hero titles, section headings
2. **Post Meta**: Individual post data like artist names, collection titles

To edit bilingual content:

1. **Site-wide text**: Go to `Ravandeh Options`
2. **Individual posts**: Edit the post and use the meta boxes

### Language Switching

Users can switch languages using the language toggle button in the navigation. The preference is saved in a cookie for 30 days.

### RTL Support

When Persian (FA) is selected:
- Layout automatically switches to RTL
- Vazirmatn font is applied
- All text alignment is reversed
- Icons and arrows are flipped

## 🎭 Customization

### Custom Logo

1. Go to `Appearance > Customize > Site Identity`
2. Click `Select Logo`
3. Upload your logo (recommended size: 250x60px)
4. Adjust cropping as needed
5. Save

### Hero Background Image

1. Go to `Appearance > Customize > Hero Section`
2. Click `Select Image` under "Hero Background Image"
3. Upload your image (recommended size: 1920x1080px)
4. Save

### Footer Widgets

1. Go to `Appearance > Widgets`
2. Add widgets to:
   - Footer Column 1
   - Footer Column 2
   - Footer Column 3
3. Save

### Custom CSS

For additional styling:

1. Go to `Appearance > Customize > Additional CSS`
2. Add your custom CSS
3. Click `Publish`

## 🔌 Recommended Plugins

- **Contact Form 7**: For contact forms
- **Yoast SEO**: For SEO optimization
- **WP Rocket**: For caching and performance
- **Smush**: For image optimization
- **Wordfence**: For security
- **UpdraftPlus**: For backups

## 🐛 Troubleshooting

### Styles Not Loading

1. Make sure Tailwind CSS is compiled: `npm run build:css`
2. Clear WordPress cache
3. Clear browser cache
4. Check file permissions (should be 644 for files, 755 for folders)

### Language Toggle Not Working

1. Check browser console for JavaScript errors
2. Make sure jQuery is loaded
3. Clear cookies and cache
4. Check that AJAX URL is properly localized

### Custom Post Types Not Showing

1. Go to `Settings > Permalinks`
2. Click `Save Changes` (without changing anything)
3. This will flush the rewrite rules

### Dark Mode Not Persisting

1. Check if cookies are enabled in browser
2. Check cookie path is set to `/`
3. Clear browser cookies and try again

## 📚 File Structure

```
ravandeh-studio/
├── assets/
│   ├── css/
│   │   ├── custom.css          # Custom styles
│   │   ├── tailwind.css        # Tailwind source
│   │   └── admin.css           # Admin styles
│   └── js/
│       └── main.js             # Main JavaScript
├── inc/
│   ├── custom-post-types.php   # CPT definitions
│   ├── theme-options.php       # Theme settings
│   ├── customizer.php          # Customizer settings
│   ├── enqueue-scripts.php     # Asset loading
│   ├── template-functions.php  # Helper functions
│   └── ajax-handlers.php       # AJAX handlers
├── template-parts/
│   ├── content-artist.php      # Artist card template
│   ├── content-collection.php  # Collection card template
│   └── content-none.php        # No content template
├── functions.php               # Theme setup
├── header.php                  # Header template
├── footer.php                  # Footer template
├── front-page.php              # Homepage template
├── index.php                   # Main template
├── single-artist.php           # Single artist template
├── single-collection.php       # Single collection template
├── archive-artist.php          # Artists archive
├── archive-collection.php      # Collections archive
├── style.css                   # Theme header
└── README.md                   # Documentation
```

## 🎓 Development

### Local Development

```bash
# Install dependencies
npm install

# Start development mode
npm run dev:css

# In another terminal, start local WordPress
# (using Local, MAMP, or similar)
```

### Code Standards

- Follow [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- Use proper escaping: `esc_html()`, `esc_url()`, `esc_attr()`
- Prefix all functions with `ravandeh_`
- Use proper nonces for security
- Sanitize all user inputs

## 🤝 Support

For support, please:

1. Check this README first
2. Review the [WordPress Theme Handbook](https://developer.wordpress.org/themes/)
3. Contact hello@ravandeh.studio

## 📄 License

This theme is licensed under the GPL v2 or later.

```
Copyright (C) 2025 Ravandeh Studio

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
```

## 🙏 Credits

- **Design**: Inspired by Apple's glassmorphism design language
- **Fonts**: Vazirmatn by Saber Rastikerdar
- **Icons**: Lucide Icons
- **Animations**: GSAP (GreenSock Animation Platform)
- **Framework**: Tailwind CSS

## 📝 Changelog

### Version 1.0.0 (2025-01-XX)

- Initial release
- Custom post types for Artists and Collections
- Bilingual EN/FA support with RTL layout
- Dark mode toggle
- Glassmorphism design
- GSAP animations
- WordPress Customizer integration
- Theme options page
- Responsive design (320px to 4K)

---

Made with ♥ by [Ravandeh Studio](https://ravandeh.studio)
