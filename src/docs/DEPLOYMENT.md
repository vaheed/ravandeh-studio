# Deployment Guide — Ravandeh Studio

This guide explains how to deploy your Ravandeh Studio website to various platforms.

## GitHub Pages Deployment

### Prerequisites
- GitHub account
- Git installed locally
- Repository created on GitHub

### Step-by-Step Instructions

1. **Initialize Git Repository** (if not already done)
   ```bash
   git init
   git add .
   git commit -m "Initial commit: Ravandeh Studio"
   ```

2. **Connect to GitHub**
   ```bash
   git remote add origin https://github.com/yourusername/ravandeh-studio.git
   git branch -M main
   git push -u origin main
   ```

3. **Enable GitHub Pages**
   - Go to your repository on GitHub
   - Click **Settings** → **Pages**
   - Under "Source", select **main** branch
   - Click **Save**
   - Your site will be available at: `https://yourusername.github.io/ravandeh-studio/`

4. **Custom Domain Setup** (Optional)
   - In your repository, create a file named `CNAME` in the root
   - Add your domain: `ravandeh.studio`
   - In your domain registrar, add these DNS records:
     ```
     Type: A
     Name: @
     Value: 185.199.108.153
     
     Type: A
     Name: @
     Value: 185.199.109.153
     
     Type: A
     Name: @
     Value: 185.199.110.153
     
     Type: A
     Name: @
     Value: 185.199.111.153
     
     Type: CNAME
     Name: www
     Value: yourusername.github.io
     ```

### GitHub Actions Workflow (Automated Deployment)

Create `.github/workflows/deploy.yml`:

```yaml
name: Deploy to GitHub Pages

on:
  push:
    branches: [ main ]
  workflow_dispatch:

permissions:
  contents: read
  pages: write
  id-token: write

jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v3
      
      - name: Setup Pages
        uses: actions/configure-pages@v3
      
      - name: Upload artifact
        uses: actions/upload-pages-artifact@v2
        with:
          path: '.'
      
      - name: Deploy to GitHub Pages
        id: deployment
        uses: actions/deploy-pages@v2
```

## Netlify Deployment

### Quick Deploy

1. **Via Netlify Drop**
   - Visit [netlify.com/drop](https://app.netlify.com/drop)
   - Drag and drop your project folder
   - Your site is live!

2. **Via Git Integration**
   - Push your code to GitHub
   - Go to [Netlify](https://app.netlify.com)
   - Click **New site from Git**
   - Connect your repository
   - Build settings:
     - Build command: (leave empty for static site)
     - Publish directory: `/` or `.`
   - Click **Deploy site**

### Custom Domain on Netlify

1. Go to **Site settings** → **Domain management**
2. Click **Add custom domain**
3. Enter `ravandeh.studio`
4. Follow DNS configuration instructions
5. Enable HTTPS (automatic with Let's Encrypt)

## Vercel Deployment

### Quick Deploy

1. **Install Vercel CLI** (optional)
   ```bash
   npm i -g vercel
   ```

2. **Deploy via CLI**
   ```bash
   vercel
   ```

3. **Or Deploy via Dashboard**
   - Go to [vercel.com](https://vercel.com)
   - Click **New Project**
   - Import from GitHub
   - Select your repository
   - Click **Deploy**

### Custom Domain on Vercel

1. Go to your project → **Settings** → **Domains**
2. Add `ravandeh.studio`
3. Configure DNS records as instructed
4. SSL is automatically provisioned

## Static File Hosting (Alternative)

### AWS S3 + CloudFront

1. Create S3 bucket
2. Enable static website hosting
3. Upload files
4. Create CloudFront distribution
5. Point domain to CloudFront URL

### Cloudflare Pages

1. Connect GitHub repository
2. Build settings:
   - Build command: (none)
   - Build output directory: `/`
3. Deploy
4. Custom domain automatically configured if using Cloudflare DNS

## Performance Optimization

### Before Deployment

- ✅ Images optimized (WebP format)
- ✅ Minified CSS/JS (handled by build tools)
- ✅ Lazy loading implemented
- ✅ Fonts subset and optimized

### Post-Deployment Checklist

- [ ] Test on mobile devices
- [ ] Test RTL (Persian) layout
- [ ] Verify all images load
- [ ] Check animations performance (60fps)
- [ ] Test bilingual switching
- [ ] Verify custom domain SSL
- [ ] Submit to search engines
- [ ] Set up analytics (optional)

## CDN Configuration

For faster global delivery, configure CDN:

### Cloudflare (Recommended)

1. Sign up at [cloudflare.com](https://cloudflare.com)
2. Add your domain
3. Update nameservers
4. Enable:
   - Auto Minify (JS, CSS, HTML)
   - Brotli compression
   - HTTP/3
   - Rocket Loader (optional)

### Caching Headers

Add to your hosting configuration:

```
Cache-Control: public, max-age=31536000, immutable (for images/fonts)
Cache-Control: public, max-age=3600 (for HTML)
```

## Monitoring

### Analytics Options

- **Google Analytics**: Full-featured analytics
- **Plausible**: Privacy-friendly, lightweight
- **Fathom**: Simple, GDPR compliant
- **Cloudflare Analytics**: Built-in if using Cloudflare

### Uptime Monitoring

- **UptimeRobot**: Free uptime monitoring
- **Pingdom**: Comprehensive monitoring
- **StatusCake**: Free tier available

## Troubleshooting

### Site Not Loading

- Check DNS propagation: [whatsmydns.net](https://www.whatsmydns.net)
- Verify CNAME/A records are correct
- Clear browser cache
- Wait 24-48 hours for full DNS propagation

### Images Not Displaying

- Check Unsplash URLs are accessible
- Verify CORS settings
- Check browser console for errors

### RTL Layout Issues

- Ensure `<html dir="rtl">` is applied
- Verify Vazirmatn font is loading
- Check CSS for hardcoded left/right values

### Performance Issues

- Enable CDN
- Compress images further
- Remove unused CSS/JS
- Enable browser caching

## Security

### Best Practices

- ✅ HTTPS enabled (via hosting provider)
- ✅ Security headers configured
- ✅ No API keys exposed in frontend
- ✅ Regular dependency updates

### Recommended Headers

Add these to your hosting configuration:

```
X-Frame-Options: DENY
X-Content-Type-Options: nosniff
Referrer-Policy: strict-origin-when-cross-origin
Permissions-Policy: geolocation=(), microphone=(), camera=()
```

## Backup

### Regular Backups

- Keep Git repository up to date
- Export content data monthly
- Store images in separate backup
- Document any custom configurations

## Support

If you encounter deployment issues:

1. Check hosting provider documentation
2. Review browser console for errors
3. Test locally first: `python -m http.server 8000`
4. Contact hosting support

---

**Congratulations!** Your Ravandeh Studio site is now live. 🎨✨

For content updates, see [OWNER_GUIDE_FA.md](./OWNER_GUIDE_FA.md)
