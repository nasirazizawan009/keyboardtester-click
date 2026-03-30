# KeyboardTester.Click - Project Guide

**Version:** 17.2.37 (March 2026)

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

#### Sitemap "Couldn't fetch" Error (Ongoing since Sept 2025) — DO NOT INVESTIGATE FURTHER
Google Search Console shows "Couldn't fetch" for `sitemap.xml` despite the file being accessible:
- **Verified working:** `curl -I https://keyboardtester.click/sitemap.xml` returns HTTP 200
- **All 213 sitemap URLs return HTTP 200** (verified March 30, 2026)
- **File is valid XML:** Properly formatted with correct schema
- **CSP headers removed:** `.htaccess` unsets Content-Security-Policy for sitemap files
- **Workarounds tried (all failed):**
  - Resubmitting sitemap multiple times (including March 30, 2026 — still "Couldn't fetch")
  - Deleting and re-adding sitemap
  - Using full URL vs relative path
  - Waiting for DNS propagation
  - Removing CSP headers for sitemap
- **Status:** Unresolved — confirmed Google-side issue, not a site problem
- **Impact:** Pages still get indexed via links and IndexNow, just not via sitemap
- **ACTION:** Do NOT spend more time on this. It is a Google crawler bug.

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

## Recent Update (v17.2.27)

### Multilingual Keyboard Encoding Fix
- Fixed mojibake/garbled text issues in language keyboard tools
- Verified UTF-8 content for Arabic, Russian, Korean, and Japanese layouts
- Confirmed keyboard labels and UI strings render correctly after encoding cleanup

### Cat Progress Module in All Language Keyboards
- Reusable cat progress module now integrated in all language keyboard tool sections
- Uses shared component: `includes/components/keyboard-cat-progress.php`
- Uses shared assets:
  - `assets/css/keyboard-cat-progress.css`
  - `assets/js/keyboard-cat-progress.js`
- Totals are language-aware (Japanese remains 109 keys; other language layouts use 104 where configured)
- Cat progress state now updates and resets with each keyboard session in every language tool

### Cat Progress Message Localization (Feb 2026)
- Cat progress text is now locale-aware across all keyboard pages (English + all language keyboards)
- Shared module supports `locale` option and localized packs for:

## Recent Update (v17.2.28)

### SEO Intent Cluster Pages
- Added search-intent entry pages that reuse existing live tools instead of duplicating tool logic
- New pages target tighter keyword clusters:
  - `dead-pixel-test.php`
  - `stuck-pixel-test.php`
  - `keyboard-ghosting-test.php`
  - `n-key-rollover-test.php`
  - `camera-resolution-test.php`
  - `scan-qr-from-image.php`
  - `screenshot-to-text.php`
- Shared intent cluster config lives in `includes/seo-clusters.php`
- Shared sibling-linking component lives in `includes/components/intent-cluster-links.php`
- Shared variant page renderer lives in `includes/render-tool-intent-page.php`

### Accuracy Fixes for SEO and Schema
- Corrected QR reader descriptions to match the current image-upload workflow
- Corrected microphone SEO/schema text to match the current live meter and peak-level tool
- Corrected OCR and QR generator schema features so search metadata does not promise unavailable features
  - `en`, `ar`, `fr`, `de`, `ja`, `ko`, `pt`, `ru`, `es`
- Localized fields include:
  - milestone pop-up messages
  - mood/status text
  - treats label
  - completion message
- Locale is passed from each keyboard tool initializer when creating `KeyboardCatProgress`

## Recent Update (v17.2.29)

### Second-Wave Intent Cluster Pages
- Added another 4 search-intent entry pages that reuse the existing live tools:
  - `stuck-key-test.php`
  - `test-my-mic.php`
  - `webcam-not-working-test.php`
  - `photo-to-text.php`
- Extended `includes/seo-clusters.php` so the keyboard, mic, webcam, and OCR hubs can cross-link these variants
- Added page-specific schema, FAQs, and supporting SEO content for each new intent page

## Recent Update (v17.2.30)

### Third-Wave Intent Cluster Pages
- Added another 4 search-intent entry pages that reuse the existing live tools:
  - `black-screen-test.php`
  - `white-screen-test.php`
  - `scroll-wheel-test.php`
  - `double-click-test.php`
- Extended the shared cluster system so screen and mouse hub pages cross-link these variants
- Added page-specific schema, FAQs, and supporting SEO content for each new intent page

### Accuracy and Preset Improvements
- Corrected the main mouse tester SEO/schema copy so it only claims supported inputs: left, middle, right, and scroll
- Added safe preset support to `screentesttool.php` so intent pages can start on the correct default color without changing existing page behavior

## Recent Update (v17.2.31)

### Fourth-Wave Intent Cluster Pages
- Added 4 more search-intent entry pages around existing audio/video tools:
  - `left-right-speaker-test.php`
  - `stereo-test.php`
  - `microphone-volume-test.php`
  - `take-picture-with-webcam.php`
- Extended the shared cluster system so audio-output, mic, and webcam hubs can cross-link these variants
- Added page-specific schema, FAQs, and supporting SEO content for each new intent page

### Audio Hub SEO Upgrade
- Upgraded `headphone_speaker_tester_index.php` from a standalone tool page into a proper cluster hub
- Added supporting SEO content and related-tools internal linking for the headphone/speaker tool

### Hub and Discovery Updates
- Main `mic-tester.php` now includes the intent-cluster section like the other updated hubs
- Updated internal linking across keyboard, mic, webcam, and OCR SEO content to point into the new variants
- Updated `generate-sitemap.php`, `submit-indexnow.php`, and `config.php` for the new URLs

## Recent Update (v17.2.32)

### OCR Runtime Fix
- Fixed the OCR production failure by allowing `https://cdn.jsdelivr.net` in CSP `connect-src`
- Root cause: Tesseract.js loaded from jsDelivr, but runtime OCR asset fetches were blocked by the old CSP
- Verified locally and on production with a real browser OCR upload test returning `HELLO 123`

### Localized Phase-5 Intent Pages
- Added a shared localized intent-page system:
  - `includes/localized-intent-pages.php`
  - `includes/render-localized-intent-page.php`
  - `includes/components/localized-intent-links.php`
- Rolled out 16 localized cluster pages across `es`, `de`, `pt`, and `ar` using existing live tools:
  - `dead-pixel-test.php`
  - `microphone-volume-test.php`
  - `camera-resolution-test.php`
  - `scan-qr-from-image.php`
- Added localized internal cluster links on the corresponding `screen-test`, `mic-test`, `webcam-test`, and `qr-reader` hub pages
- Extended sitemap and IndexNow discovery to read localized intent URLs from the shared config

## Recent Update (v17.2.33)

### Session Handoff (March 18, 2026)
- OCR is fixed locally and live
- Root cause was CSP: `tesseract.js` runtime fetches from jsDelivr were blocked until `.htaccess` added `https://cdn.jsdelivr.net` to `connect-src`
- Production OCR verification passed with a real browser upload run on `ocr-tool.php`, returning extracted text `HELLO 123`

### Phase-5 Final State
- Localized phase-5 rollout is live for `es`, `de`, `pt`, and `ar`
- Added 16 localized intent pages total:
  - `dead-pixel-test.php`
  - `microphone-volume-test.php`
  - `camera-resolution-test.php`
  - `scan-qr-from-image.php`
- Shared localized system now lives in:
  - `includes/localized-intent-pages.php`
  - `includes/render-localized-intent-page.php`
  - `includes/components/localized-intent-links.php`

### Important Deployment Note
- After the initial phase-5 deploy, the localized wrapper pages were live, but the reused localized tool partials also needed syncing to ensure production matched local behavior
- Synced localized tool partials for `screen`, `mic`, `webcam`, and `qr-reader` across:
  - `languages/spanish/tools/*`
  - `languages/german/tools/*`
  - `languages/portuguese/tools/*`
  - `languages/arabic/tools/*`
- This mattered because the Portuguese `camera-resolution-test.php` initially reported `640x480` in the fake-device browser check until the localized tool partials were re-uploaded

### Production Verification Completed
- New localized pages render live with exactly `1` `h1`
- Localized cluster-link sections render live on the new pages and the updated hub pages
- Live `sitemap.xml` includes the new localized URLs
- Live `submit-indexnow.php` submission returned HTTP `200` and included the new localized URLs
- Localized permission-flow verification passed:
  - German mic volume page reached `Status: Hoert zu` then `Status: Gestoppt`
  - Portuguese camera resolution page reached `Ativa`, then `Nao Iniciada`, and reported `1280x720`

### Small Infrastructure Fix
- `config.php` now safely handles CLI runs without assuming `$_SERVER['HTTP_HOST']` and `$_SERVER['SERVER_ADDR']` always exist
- This removes noisy warnings during CLI sitemap generation and other maintenance scripts

## Recent Update (v17.2.34)

### Phase-6 Localized Intent Rollout
- Extended the shared localized intent system to the remaining 4 languages:
  - French
  - Russian
  - Japanese
  - Korean
- Added 16 localized intent wrapper pages total:
  - `dead-pixel-test.php`
  - `microphone-volume-test.php`
  - `camera-resolution-test.php`
  - `scan-qr-from-image.php`
- Added localized cluster-link sections on the corresponding `screen-test`, `mic-test`, `webcam-test`, and `qr-reader` hub pages for all 4 languages
- Kept the shared localized catalog split cleanly by loading:
  - `includes/localized-intent-pages-phase6.php`
  - `includes/localized-intent-pages-phase6-russian.php`
  - `includes/localized-intent-pages-phase6-japanese.php`
  - `includes/localized-intent-pages-phase6-korean.php`
  from `includes/localized-intent-pages.php`

### Verification Completed Locally
- `php -l` passed for:
  - `includes/localized-intent-pages.php`
  - `includes/localized-intent-pages-phase6.php`
  - `includes/render-localized-intent-page.php`
  - new phase-6 wrappers and updated hub pages
- `getLocalizedIntentUrlEntries()` now returns `4` localized intent URLs for each of:
  - `french`
  - `russian`
  - `japanese`
  - `korean`
- `php generate-sitemap.php` now includes the new phase-6 URLs in `sitemap.xml`

### Sitemap Generator Fix
- While verifying phase 6, `generate-sitemap.php` was found to emit malformed protocol-relative URLs like `//mouse-test.php` for non-localized entries
- Root cause:
  - loading localized intent config pulled in `config.php`
  - `config.php` also defines `$baseUrl`
  - that collided with the sitemap generator's own `$baseUrl`
- Fix:
  - renamed the generator variable to `\$sitemapBaseUrl`
  - updated sitemap normalization to use the renamed variable
  - regenerated `sitemap.xml`

### Best Next Starting Point
- Deploy the new phase-6 pages plus the updated localized tool partials for:
  - `languages/french/tools/*`
  - `languages/russian/tools/*`
  - `languages/japanese/tools/*`
  - `languages/korean/tools/*`
- After deploy, verify on production:
  - each new localized page renders with exactly `1` `h1`
  - each updated hub page shows the localized cluster-link section
  - live `sitemap.xml` contains the new localized URLs
  - live `submit-indexnow.php` includes the new localized URLs

## Google AdSense (March 2026)
- **Publisher ID:** `ca-pub-7056306765580248`
- **Integration:** Auto ads via single `<script async>` tag in `includes/head-common.php`
- **Scope:** All pages site-wide (loaded via shared head include)
- **CSP:** `.htaccess` updated to allow AdSense domains (`pagead2.googlesyndication.com`, `adservice.google.com`, `googleads.g.doubleclick.net`, etc.)

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

## Recent Update (v17.2.35)

### Image Overhaul (March 29, 2026)
- Replaced all AI-generated and SVG wireframe images across 20 tools with real Pexels stock photos
- All images from Pexels.com (free license, no attribution required)
- 81 unique photos downloaded, 130+ image files (PNG + WebP)
- No image repeats across pages
- Updated alt text for SEO on all hero and step images
- Created `assets/css/global.min.css` (minified version of global.css)

### Performance Fixes (March 29, 2026)
- Delayed AdSense loading to 2s after window.load (reduces main-thread blocking)
- Added `fundingchoicesmessages.google.com` to CSP (fixes AdSense consent error)
- Optimized hero image delivery: 560w variant for 1x desktop screens (saves ~14KB)

### DPI Tester UX Fix (March 29, 2026)
- "Start measure" button now shows "Measuring..." with green highlight when active
- Track area gets green pulsing border animation when measurement is active
- Fixed pointer tracking with `lostpointercapture` instead of `pointerleave`

### Semrush Audit Fixes (March 29, 2026)
- **24 broken images fixed:** Created `hero.png`/`step-*.png` in screen-test, mouse, mic-test, webcam-test, headphone-test dirs
- **357 blocked resources fixed:** Updated `robots.txt` to allow `/assets/css/`, `/assets/js/`, `/assets/images/` crawling
- **63 hreflang errors fixed:** Converted all `url()` to `absoluteUrl()` in hreflang tags across 128 language files
- **53 structured data errors fixed:** Replaced `offers` block with `isAccessibleForFree: true` in WebApplication schema
- **llms.txt created:** Added LLM-friendly site description for AI search engines
- **test-my-mic.php unblocked:** Fixed robots.txt `Disallow: /test-` rule that was blocking this page

### Social Links (March 29, 2026)
- Added YouTube channel link to footer: https://www.youtube.com/@KeyboardTester-dot-click
- Added Facebook page link to footer: https://www.facebook.com/keyboardtester.click
- Footer social icons now use official brand-colored SVG logos (GitHub white, GitLab orange, YouTube red, Facebook blue)

## Recent Update (v17.2.36)

### Semrush/GSC Audit Fixes — Deployed (March 30, 2026)
All fixes from the Semrush audit were completed, committed (commit `dfd6016`), and deployed via FTP.

#### What was fixed:
- **63 hreflang errors:** All 128 language tool pages converted hreflang `url()` → `absoluteUrl()` so Google sees full `https://keyboardtester.click/...` URLs instead of relative paths
- **53 structured data errors:** Replaced invalid `offers` block in `includes/schema.php` with `isAccessibleForFree: true` (Google's preferred format for free tools)
- **357 blocked resources:** `robots.txt` updated to explicitly allow `/assets/css/`, `/assets/js/`, `/assets/images/` so Googlebot can render pages properly
- **404 fixed:** Added `click-speed-test.php` → `mouse_speed_tester.php` redirect in `.htaccess`
- **test-my-mic.php unblocked:** Changed `Disallow: /test-` to specific paths (`/test-ftp`, `/test-upload`, etc.)
- **Privacy policy:** Updated with full AdSense data disclosure (GDPR/FTC compliance)

#### Sitemap Status (as of March 30, 2026):
- **213 URLs** in `sitemap.xml` — all return HTTP 200 ✓
- **IndexNow submitted** successfully (HTTP 200, 200 URLs) ✓
- **Google Search Console "Couldn't fetch" error:** ONGOING (Google-side issue)
  - Sitemap returns 200 to all other crawlers/curl
  - GSC has shown this error continuously since Sept 2025
  - Pages ARE still being indexed via links and IndexNow
  - No technical fix exists — Google's crawler intermittently fails to fetch it
  - **Do NOT waste time re-investigating this — it is a known Google bug**

#### GSC Coverage Summary (as of March 30, 2026):
- **Indexed:** ~37 pages
- **Not indexed:** ~26 pages
  - 12 pages with redirect (old URLs like `keyboard_tester_spanish.php`) — expected, these are legacy
  - 9 pages crawled but not indexed — content quality issue, not a technical bug
  - Others: discovered-not-crawled (need more internal links/authority)
- Google has only discovered ~63 of the 213 sitemap URLs

#### Next SEO priorities:
- Build internal links to undiscovered pages
- Improve content depth on "crawled but not indexed" pages
- Consider submitting pages manually via GSC URL inspection for high-priority pages

## Recent Update (v17.2.37)

### Bing Webmaster Tools — Meta Description Fix (March 31, 2026)
Bing flagged 49 URLs with meta descriptions that were too short (Bing target: 150–160 characters).

#### Root Cause
Language pages (French, German, Spanish, Portuguese, Arabic, Korean, Japanese, Russian) had very short descriptions (60–95 characters). Several English main tool pages were also under 130 characters.

#### Pages Fixed (42 total, commit `26786cd`)
All descriptions extended to provide full page summaries with key features and no-install messaging.

| Language | Files updated |
|----------|--------------|
| English | `ghost-click-detector.php`, `latency-checker.php`, `about-us.php`, `mouse_speed_tester.php`, `qr-code-reader.php`, `keyboard_typing_test.php`, `QR_code_generator_scanner.php` |
| French | `webcam-test.php`, `qr-reader.php` |
| German | `mouse-test.php`, `latency-checker.php`, `webcam-test.php`, `ocr-tool.php` |
| Spanish | `mouse-trail.php`, `qr-generator.php`, `qr-reader.php`, `ocr-tool.php`, `webcam-test.php` |
| Portuguese | `ocr-tool.php` |
| Arabic | `ocr-tool.php`, `typing-test.php`, `password-generator.php`, `dpi-tester.php`, `qr-reader.php`, `headphone-test.php`, `latency-checker.php`, `ghost-click.php` |
| Korean | `latency-checker.php`, `webcam-test.php`, `mic-test.php`, `mouse-trail.php`, `headphone-test.php` |
| Japanese | `mouse-test.php`, `webcam-test.php`, `qr-generator.php`, `typing-test.php`, `latency-checker.php`, `mouse-trail.php`, `password-generator.php` |
| Russian | `qr-generator.php`, `webcam-test.php`, `latency-checker.php` |

#### Remaining Bing-Flagged URLs (not a technical fix needed)
- `www.keyboardtester.click/*` URLs — these 301 redirect to non-www. Bing follows the redirect; once it re-crawls the canonical non-www pages, the warnings should clear automatically.
- `.html` URLs (`ghost-click-detector.html`, `keyboard_typing_test.html`, `mouse_speed_tester.html`) — `.htaccess` already redirects `.html` → `.php`. Bing will clear these after re-crawl.

#### Note on Non-Latin Languages
- Arabic characters count as ~2 bytes each in UTF-8, Korean/Japanese as ~3 bytes. The 150-char recommendation applies to visible characters, not bytes.
- For CJK (Japanese/Korean): aim for 60–80 actual characters — this conveys the same information density as 150 Latin chars.
- Descriptions were extended to be substantively longer than before, which should satisfy Bing's check regardless of exact byte count.

## Social & Contact
- Twitter/X: https://x.com/keyboardtester
- YouTube: https://www.youtube.com/@KeyboardTester-dot-click
- Facebook: https://www.facebook.com/keyboardtester.click
- GitHub: https://github.com/nasirazizawan009/keyboardtester-click
- GitLab: https://gitlab.com/nasirazizawan/keyboardtester.click
- Email: support@keyboardtester.click
