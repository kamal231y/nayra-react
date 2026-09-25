# Nyra Event Photography - React Website

This project has been converted from a multi-page PHP website into a high-performance **React + Vite** Single Page Application (SPA).

---

## 🚀 Getting Started

### 1. Run Development Server
```bash
npm run dev
```
Open [http://localhost:3000](http://localhost:3000) in your browser. Any changes you make will update instantly with Fast Refresh (HMR).

### 2. Build for Production
```bash
npm run build
```
Generates production-optimized static files in the `dist/` folder.

### 3. Preview Production Build
```bash
npm run preview
```

---

## 📂 Project Structure

```
nayra/
├── public/                    # Static assets (images, banners, logos, manifests, favicons)
│   └── assets/
│       ├── img/
│       │   ├── banner/        # Hero banner slides (b1.webp - b8.webp)
│       │   ├── gallery/       # All 9 category shoot collections (270+ photos)
│       │   ├── service/       # Service cards preview covers
│       │   ├── about/         # Team & studio images
│       │   └── logo/          # Studio logo
│       └── css/
├── src/
│   ├── components/
│   │   ├── Navbar.jsx         # Responsive desktop navbar + mobile offcanvas drawer
│   │   ├── Footer.jsx         # Google reviews, Google Maps embed, footer links
│   │   ├── BannerSlider.jsx   # Auto-playing hero carousel with dot indicators
│   │   ├── PhotoCarousel.jsx  # Touch/swipe enabled celebration slider (Swiper)
│   │   ├── MarqueeStrip.jsx   # Infinite animated marquee strip
│   │   ├── Lightbox.jsx       # Interactive image viewer with Prev/Next, Esc, and counters
│   │   ├── FloatingActions.jsx# Floating Call, WhatsApp, and Instagram FABs
│   │   └── ScrollToTop.jsx    # Restores scroll to top on page navigation
│   ├── pages/
│   │   ├── Home.jsx           # Landing page with banner, marquee, about, services, philosophy
│   │   ├── About.jsx          # Dedicated About Us & studio stats
│   │   ├── GalleryPage.jsx    # Dynamic gallery with instant Lightbox for all shoot categories
│   │   ├── FAQ.jsx            # Interactive accordion FAQ
│   │   └── Contact.jsx        # Studio address, map, and WhatsApp enquiry form
│   ├── data/
│   │   ├── galleries.js       # Auto-cataloged image index for all 9 shoot categories
│   │   └── services.js        # Services list metadata
│   ├── styles/
│   │   └── custom.css         # Studio typography (Fraunces & Jost), color palette, responsive styles
│   ├── App.jsx                # Router setup & layout shell
│   └── main.jsx               # Application entry point
├── php_backup/                # Safe backup of all original PHP files
├── index.html                 # HTML entry point with CDN fonts & icons
├── vite.config.js             # Vite configuration
└── package.json               # Dependencies and scripts
```

---

## 📸 Supported Shoot Routes

- `/` - Home
- `/about` - About Us
- `/gallery` - Main Portfolio Gallery
- `/wedding-shoot` - Wedding Shoot (37 photos)
- `/pre-wedding` - Pre Wedding Shoot (46 photos)
- `/bday-shoot` - Birthday Shoot (12 photos)
- `/haldi-shoot` - Haldi Shoot (8 photos)
- `/mehndi` - Mehndi Shoot (29 photos)
- `/engagement` - Ring Ceremony Shoot (43 photos)
- `/corporate` - Corporate Event Shoot (13 photos)
- `/ecommerce` - Ecommerce Shoot (12 photos)
- `/faq` - FAQ
- `/contact` - Contact & WhatsApp Booking Form
*(All legacy `.php` URLs automatically redirect to their respective React routes)*

