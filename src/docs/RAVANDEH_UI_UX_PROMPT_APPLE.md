# Ravandeh Studio — UI/UX Creative Brief
## Apple-Inspired Liquid Glass Design Language

---

## Design Philosophy

**Curvature is sacred** — every edge must breathe. This is not just a website; it's a living exhibition space sculpted from light, glass, and motion.

### Core Principles

1. **Organic Curvature**
   - Rounded edges: 28–44px (never sharp corners)
   - Inspired by Apple's physical product design
   - Every element feels sculpted, not drawn
   - Curves should suggest natural forms — pebbles, water drops, organic shapes

2. **Liquid Glass Material System**
   - Subtle transparency (backdrop-blur with 10-20% opacity overlays)
   - Layered depth: multiple glass planes with varying blur intensities
   - Gradient reflections that shift with scroll or hover
   - Frosted glass effect on cards and panels
   - Light refraction illusions using gradients and shadows

3. **Motion Physics**
   - Apple-like easing curves: `cubic-bezier(0.4, 0.0, 0.2, 1)`
   - Inertia scroll behavior (smooth momentum)
   - Fade transitions: elements appear/disappear like fog
   - Parallax effects: subtle depth-of-field simulation
   - All animations hardware-accelerated (GPU-optimized)
   - Duration: 400-800ms for major transitions, 200-400ms for micro-interactions

4. **Art-Driven Layout**
   - White space is sacred (breathing room between elements)
   - Asymmetric balance inspired by gallery curation
   - Content reveals progressively as you scroll
   - Typography as sculpture: generous leading, subtle weights
   - Images float within glass containers

5. **Material Depth**
   - Soft shadows: 0 8px 32px rgba(0,0,0,0.08)
   - Elevated layers use multiple shadow depths
   - Reflection overlays on glass surfaces
   - Depth-of-field blur on background elements

---

## Typography System

- **Primary Font**: SF Pro Display aesthetic (system-ui fallback)
- **Persian Font**: Vazir-Matn (properly kerned for Farsi)
- **Hierarchy**:
  - Hero: 3.5–5rem, light weight (200-300)
  - Section Titles: 2–3rem, medium weight (400-500)
  - Body: 1–1.125rem, regular weight (400)
  - Captions: 0.875rem, light weight (300)
- **Line Height**: 1.6–1.8 for readability
- **Letter Spacing**: -0.02em for display text, 0 for body

---

## Color Palette

### Light Mode (Default)
- **Background**: Pure white with subtle warm gradient
- **Glass Surfaces**: rgba(255, 255, 255, 0.7) with blur
- **Text Primary**: #1a1a1a
- **Text Secondary**: #6b6b6b
- **Accent**: Soft gradients (blue-purple-pink range)
- **Shadows**: rgba(0, 0, 0, 0.06-0.12)

### Dark Mode (Optional)
- **Background**: Deep charcoal (#0a0a0a) with subtle gradient
- **Glass Surfaces**: rgba(30, 30, 30, 0.7) with blur
- **Text Primary**: #f5f5f5
- **Text Secondary**: #a0a0a0
- **Accent**: Brighter gradients with neon undertones
- **Glow**: Subtle halo effects on glass edges

---

## Component Specifications

### Hero Section
- Full viewport height (100vh)
- Large curved glass card floating in center
- Parallax background with subtle gradient mesh
- Title with liquid gradient text effect
- Smooth scroll indicator (animated curve)

### Collection/Artist Cards
- Rounded corners: 32-44px
- Glass morphism: backdrop-blur-lg + gradient overlay
- Hover: lift effect (translateY -8px) + shadow expansion
- Image aspect ratio: 4:3 or 3:4 (organic, not rigid)
- Content padding: generous (32-48px)

### Navigation
- Sticky header with glass blur background
- Language toggle: smooth flip animation
- Menu items: hover underline with liquid animation
- Mobile: slide-in drawer with curved edges

### Gallery Lightbox
- Full-screen curved modal
- Image centered with reflection effect
- Background: deep blur + dark overlay
- Close button: floating glass circle
- Navigation: gesture-friendly curved arrows

### Footer
- Minimal, centered layout
- Soft divider line (gradient fade)
- Social icons in glass bubbles
- Copyright in light text

---

## Interaction Patterns

1. **Scroll Reveal**
   - Elements fade in with slight upward motion
   - Stagger animations (100-200ms delay between items)
   - Parallax on background elements

2. **Hover States**
   - Scale: 1.02–1.05 (subtle expansion)
   - Shadow intensifies
   - Gradient shifts or brightens
   - Cursor: custom pointer with glow effect (optional)

3. **Click/Tap Feedback**
   - Ripple effect from touch point
   - Brief scale down (0.98) then spring back
   - Haptic-like visual bounce

4. **Loading States**
   - Skeleton screens with shimmer gradient
   - Blur-to-focus transition when content loads
   - No harsh spinners — use organic pulsing

---

## Responsive Behavior

- **Mobile (< 768px)**: Single column, larger touch targets, simplified glass effects
- **Tablet (768-1024px)**: Two-column grid, medium glass blur
- **Desktop (1024-1440px)**: Three-column grid, full glass effects
- **Large (> 1440px)**: Max-width container (1440px), extra padding

---

## Performance Guidelines

- **Bundle Size**: < 500KB total (optimized images, minified assets)
- **Animation FPS**: Maintain 60fps (use transform/opacity only)
- **Image Optimization**: WebP format, lazy loading, blur placeholders
- **Font Loading**: Swap strategy, subset fonts for EN/FA
- **Glass Effects**: Use CSS backdrop-filter (with fallbacks)

---

## Bilingual (EN/FA) Support

- **Default**: English (LTR)
- **Toggle**: Smooth transition with animated mirror flip
- **RTL Support**: Proper Vazir-Matn rendering, mirrored layout
- **Text Storage**: JSON files with `{en: "...", fa: "..."}` structure
- **Direction Attribute**: `<html dir="rtl">` when Persian active

---

## Inspiration References

- **Apple.com**: Product pages with glass cards and smooth scrolling
- **Linear.app**: Minimalist interface with subtle gradients
- **Stripe.com**: Grid layouts with floating elements
- **Squarespace Demo (Nevins)**: Art-forward layout, generous white space
- **iOS 18 Design Language**: Frosted glass, soft shadows, organic curves

---

## Technical Implementation Notes

- Use CSS custom properties for theme tokens
- Hardware-accelerated animations: `will-change: transform`
- Intersection Observer for scroll reveals
- Prefers-reduced-motion support for accessibility
- Semantic HTML5 for SEO and accessibility
- Open Graph meta tags for social sharing

---

**Remember**: Every pixel is intentional. Every curve tells a story. This is not just a gallery — it's an experience sculpted from light.
