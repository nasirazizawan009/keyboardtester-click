# KeyboardTester.Click - Project Guide

**Version:** 17.2.26 (February 2026)

## Project Overview
A comprehensive suite of free online testing tools for keyboards, mice, screens, audio, and utilities. The site is multilingual with support for 8 languages.

**Live Site:** https://keyboardtester.click
**GitHub:** https://github.com/nasirazizawan009/keyboardtester-click
**Domain:** keyboardtester.click (non-www canonical)

## Tech Stack
- **Backend:** PHP (no framework)
- **Frontend:** HTML, CSS, JavaScript (vanilla)
- **Blog:** WordPress (in `/blog/`)
- **Hosting:** cPanel with FTP deployment
- **Local Dev:** XAMPP on Windows

## Directory Structure
```
kbt/
├── assets/
│   ├── css/           # Stylesheets (global.css, index-modern.css)
│   └── js/            # JavaScript files (theme.js)
├── blog/              # WordPress blog (manage separately)
├── flags/             # Country flag SVGs
├── help/              # Brief help pages for each tool
├── images/            # Tool images organized by category
├── includes/          # Shared PHP components
│   ├── head-common.php
│   ├── seo-meta.php
│   ├── schema.php
│   └── related-tools.php
├── languages/         # Multilingual pages
│   ├── arabic/
│   ├── french/
│   ├── german/
│   ├── japanese/
│   ├── korean/
│   ├── portuguese/
│   ├── russian/
│   └── spanish/
├── pages/             # Category/listing pages
└── tools/             # Language-specific keyboard testers
```

## Key Configuration Files
- `config.php` - Site URLs, environment detection, helper functions
- `meta-config.php` - SEO meta configurations
- `seo-config.php` - SEO settings
- `.htaccess` - URL rewrites, caching, security headers

## Main Tools (Root Directory)
| Tool | File |
|------|------|
| Keyboard Tester | `index.php` |
| Typing Test | `keyboard_typing_test.php` |
| Mouse Test | `mouse-test.php` |
| Click Speed | `mouse_speed_tester.php` |
| Ghost Click Detector | `ghost-click-detector.php` |
| DPI Tester | `mouse_sensitivity_DPI_tester.php` |
| Mouse Trail | `mouse-trail.php` |
| Latency Checker | `latency-checker.php` |
| Screen Test | `screentestindex.php` |
| Webcam Test | `webcamtesterindex.php` |
| Mic Test | `mic-tester.php` |
| Headphone Test | `headphone_speaker_tester_index.php` |
| QR Generator | `QR_code_generator_scanner.php` |
| QR Reader | `qr-code-reader.php` |
| OCR Tool | `ocr-tool.php` |
| Password Generator | `auto-password-generator.php` |
| WhatsApp Link | `whatsapp-link-generator.php` |
| WhatsApp Brand | `whatsapp-Brand-link-generator.php` |
| Lucky Wheel | `luckywheeltoolindex.php` |

## Deployment

### FTP Credentials
- **Server:** ftp.keyboardtester.click
- **User:** nasir@keyboardtester.click
- **Path:** / (root)

### Deploy Scripts
- `deploy-latest.py` - Deploy recent changes
- `deploy-to-cpanel.py` - Full deployment
- `deploy-indexnow.py` - Deploy IndexNow files only
- `deploy-languages.py` - Deploy language pages

### Quick Deploy Command
```bash
python deploy-latest.py
```

## SEO & Indexing

### IndexNow (Bing/Yandex)
- **Key File:** `3714fa0124eb471586614d7b875b96fe.txt`
- **Submit Script:** `submit-indexnow.php`
- **Submit URL:** `https://keyboardtester.click/submit-indexnow.php?key=kbt-submit-2024`

### Sitemap
- **Location:** `sitemap.xml`
- **Generator:** `generate-sitemap.php`

### Google Search Console
- **Domain Property:** keyboardtester.click (verified via DNS TXT record)
- **URL Prefix Properties:**
  - https://keyboardtester.click/ (canonical)
  - https://www.keyboardtester.click/ (redirects to non-www)
- **Console URL:** https://search.google.com/search-console

### Bing Webmaster Tools
- **URL:** https://www.bing.com/webmasters

### Known Issues

#### Sitemap "Couldn't fetch" Error (Ongoing since Sept 2025)
Google Search Console shows "Couldn't fetch" for `sitemap.xml` despite the file being accessible:
- **Verified working:** `curl -I https://keyboardtester.click/sitemap.xml` returns HTTP 200
- **File is valid XML:** Properly formatted with correct schema
- **CSP headers removed:** `.htaccess` unsets Content-Security-Policy for sitemap files
- **Workarounds tried:**
  - Resubmitting sitemap multiple times
  - Deleting and re-adding sitemap
  - Using full URL vs relative path
  - Waiting for DNS propagation
- **Status:** Unresolved - appears to be a Google-side issue
- **Impact:** Pages still get indexed via links and IndexNow, just not via sitemap

#### www vs non-www Canonical Issue (Resolved Feb 2026)
- **Problem:** Google indexed 21 pages under www.keyboardtester.click, only 1 under non-www
- **Cause:** Site was initially indexed with www before 301 redirects were configured
- **Solution:**
  1. Added Domain property in GSC (covers all URL variations)
  2. DNS TXT record verification via cPanel Zone Editor
  3. Submitted sitemap to Domain property
  4. 301 redirects from www to non-www already in place
- **Expected resolution:** 2-4 weeks for Google to consolidate indexed pages

## Common Tasks

### Add a New Tool Page
1. Create PHP file in root directory
2. Include `config.php` at top
3. Include `header.php` and `footer.php`
4. Add to `submit-indexnow.php` URL list
5. Add to `sitemap.xml`
6. Deploy with `python deploy-latest.py`

### Add Tool to New Language
1. Create file in `languages/{lang}/` directory
2. Follow existing pattern (e.g., `languages/spanish/mouse-test.php`)
3. Update language index page
4. Add URLs to `submit-indexnow.php`
5. Deploy

### Update Sitemap & Submit to Search Engines
```bash
python deploy-indexnow.py
# Then visit: https://keyboardtester.click/submit-indexnow.php?key=kbt-submit-2024
```

## Environment Detection
The site auto-detects localhost vs production in `config.php`:
- **Localhost:** Uses `/kbt/` base path
- **Production:** Uses `/` base path

Use the `url()` function for all internal links:
```php
<?php echo url('mouse-test.php'); ?>
```

## Important Notes
- Always use `config.php` helper functions for URLs
- Blog directory (`/blog/`) is WordPress - manage separately
- Don't commit FTP credentials to public repos
- Test locally before deploying to production
- Run IndexNow submission after adding new pages

## Recent Features (v17.2.26)

### Cat Progress Animation
- Gamification feature encouraging users to test all keys
- Cat chases mouse across progress bar
- Treats at milestones: 10, 20, 30, 40, 50, 60, 70, 80, 90, 103 keys
- Cat changes color with hue-rotate animation when eating treats
- Final trophy reward at 103 keys (all testable keys)
- Location: `tools/keyboard_tester_english.php`

### Mobile Keyboard Support
- Dedicated input field triggers mobile device keyboard
- Visual QWERTY layout shows pressed keys
- Separate tracking for mobile keys (42 total)
- Mobile-specific treat milestones: 4, 8, 13, 17, 21, 25, 29, 34, 38, 42
- Responsive design: hidden on desktop, visible on mobile (≤768px)

### PrintScreen Key Disabled
- PrintScreen cannot be captured by browsers (OS-level key)
- Displayed with "N/A" badge and disabled styling
- Total testable keys: 103 (excluding PrintScreen)

## Google Search Console Setup (Feb 2026)

### Properties
1. **keyboardtester.click** (Domain property) - Primary, shows all data
2. **https://keyboardtester.click/** (URL prefix) - Non-www only
3. **https://www.keyboardtester.click/** (URL prefix) - Historical data

### Verification Method
- Domain property verified via DNS TXT record
- TXT record added in cPanel → Zone Editor → DNS Records
- Record: `google-site-verification=XXXXXX`

### Canonical Configuration
- **Preferred:** `https://keyboardtester.click` (non-www, HTTPS)
- **Redirects:** www → non-www (301 in .htaccess)
- **Canonical tags:** All pages use non-www URLs
- **Sitemap:** Uses non-www URLs

## Structured Data / Schema Fixes (Feb 2026)

### Duplicate FAQPage Schema Fix
- **Issue:** GSC flagged "Duplicate field 'FAQPage'" on `mouse-and-keyboard-test-tools.php`
- **Cause:** Page had BOTH JSON-LD FAQPage schema (`<script type="application/ld+json">`) AND microdata FAQPage (`itemscope itemtype="https://schema.org/FAQPage"`) on the FAQ HTML
- **Fix:** Removed microdata attributes from the HTML FAQ section, kept JSON-LD only (Google's preferred format)
- **Rule:** Never use both JSON-LD and microdata for the same schema type on the same page. Always prefer JSON-LD.
- **Only affected page:** `mouse-and-keyboard-test-tools.php` (all other pages use JSON-LD only)

### BreadcrumbList Invalid itemListElement Fix
- **Issue:** GSC flagged "Invalid object type for field 'itemListElement'" on pages using `includes/components/breadcrumbs.php`
- **Cause:** Microdata breadcrumbs used `itemtype="https://schema.org/Thing"` instead of `"https://schema.org/ListItem"`, and were missing `itemprop="itemListElement"` wrappers and `position` meta tags
- **Fix:** Rewrote microdata in `includes/components/breadcrumbs.php` to use proper `ListItem` type, `itemListElement` wrappers, and `position` meta tags
- **Affected pages:** `tools/keyboard-tester/index.php`, `pages/category-*.php` (5 category pages)

## PageSpeed Optimizations (Feb 2026)

### Font Loading Strategy (Critical - Read Before Changing)

**Current approach: Async loading + font metric overrides = no render-blocking AND no CLS**

```html
<!-- In head-common.php critical CSS: -->
@font-face{font-family:'Inter Fallback';src:local('Arial');
  size-adjust:107.06%;ascent-override:90.49%;descent-override:22.56%;line-gap-override:0%}
body{font-family:Inter,'Inter Fallback',-apple-system,...}

<!-- Font CSS loaded async (non-render-blocking): -->
<link rel="preload" as="style" href="...Inter...&display=optional" onload="this.onload=null;this.rel='stylesheet'">
```

**Why this works:**
1. 'Inter Fallback' @font-face (Arial with metric overrides) matches Inter's exact line height/width
2. Page renders immediately with fallback font that has IDENTICAL metrics to Inter
3. When Inter loads async, text swaps but NO layout shift (same metrics)
4. If Inter doesn't load (first visit, slow network), fallback looks identical in layout

**CRITICAL: Things that BREAK font loading (DO NOT DO):**
- `media="print" onload="this.media='all'"` for font CSS — breaks `display=optional` because @font-face isn't known at first render. When media changes to "all", browser discovers fonts late, downloads them, and swaps ALL text → massive CLS (caused 0.649 CLS)
- Render-blocking `<link rel="stylesheet">` for font CSS — fixes CLS but blocks FCP/LCP by 750ms+ per font, PageSpeed flags as render-blocking resource
- `@import url(fonts.googleapis.com/...)` inside `<style>` blocks — blocks entire style block until fonts download, causes chain loading

**Preconnect rules:**
- `fonts.googleapis.com` → NO crossorigin (CSS requests are non-CORS)
- `fonts.gstatic.com` → YES crossorigin (font file requests are CORS)

### CLS Prevention
- `contain: layout style` on major sections (.landing-main, .tool-stage, .tool-shell)
- `min-height` on tool containers to reserve space
- Critical CSS inline in `<head>` for above-fold content
- Pre-render CSS in keyboard_tester_english.php for keyboard container height
- Font metric overrides ('Inter Fallback') prevent CLS from font swap

### Forced Reflow Prevention
- **theme.js v2.2:** Disabled DEBUG mode, wrapped `getComputedStyle` in `requestAnimationFrame`
- **keyboard scaling:** Added 16ms debounce to ResizeObserver
- Used nested `requestAnimationFrame` for batch read/write operations
- **Clarity analytics:** Delayed 4s after window.load to avoid initial reflow

### Network Optimization
- Preconnect to fonts.googleapis.com (non-CORS), fonts.gstatic.com (CORS), cdn.jsdelivr.net
- DNS-prefetch for analytics domains (clarity.ms, googletagmanager.com)
- keyboard-tool.css and index-modern.css loaded via `<link rel="preload" as="style" onload>`
- Bootstrap and global.css loaded via `loadCSS()` JS function

### Non-Composited Animation Fix
- `.key` transition changed from `all` to `transform, box-shadow` only
- Added `will-change: transform` for GPU layer promotion

#### CSP Updates (.htaccess)
```
script-src: Added https://*.clarity.ms, https://www.google-analytics.com
font-src: Added https://fonts.googleapis.com
img-src: Added blob:
connect-src: Added https://*.google-analytics.com
worker-src: Added 'self' blob:
```

### Files Modified for Performance
| File | Changes |
|------|---------|
| `includes/head-common.php` | Async font loading, metric overrides, preconnect fix |
| `index.php` | Critical CSS, async JetBrains Mono, Clarity delay, image sizes |
| `tools/keyboard_tester_english.php` | Removed @import, pre-render CSS, debounced ResizeObserver |
| `assets/js/theme.js` | v2.2 - disabled debug, optimized reflow |
| `assets/css/global.css` | Scoped .key transitions, body transition |
| `assets/css/keyboard-tool.css` | Scoped .key transitions, will-change |
| `assets/css/index-modern.css` | Added containment, fixed contrast |
| `includes/related-tools.php` | Fixed link contrast ratio |
| `footer.php` | Removed freewebsubmission.com script (CSP violation) |
| `.htaccess` | Updated CSP for Clarity/GA |

### Known Performance Limitations
- **Bootstrap unused CSS (31KB):** Requires PurgeCSS build tool to fix
- **CSS/JS minification:** Requires build step (global.css ~2KB savings, inline JS ~2.4KB)
- **Hero image:** 42.8KB WebP could save ~15KB with better compression/responsive sizing
- **Forced reflow:** ~150ms total from keyboard scaling JS (already debounced, further reduction needs architecture change)

## Social & Contact
- Twitter/X: https://x.com/keyboardtester
- GitHub: https://github.com/nasirazizawan009/keyboardtester-click
- GitLab: https://gitlab.com/nasirazizawan/keyboardtester.click
- Email: support@keyboardtester.click
