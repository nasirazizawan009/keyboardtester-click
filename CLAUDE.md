# KeyboardTester.Click - Project Guide

**Version:** 17.2.45 (April 2026)

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

## Recent Update (v17.2.38)

### Blog Header Light-Mode Fix (March 31, 2026)
- **Problem:** Blog at `keyboardtester.click/blogs/` had invisible site title in light mode
- **Root cause:** `kbt-blog-style.php` MU plugin was written for Astra theme (`.ast-primary-header`, `.main-header-bar`, etc.) but blog now runs Bloghash theme (`#bloghash-header`, `#masthead`, `.bloghash-logo`)
- **Fix:** Updated `kbt-blog-style.php` to add Bloghash-specific selectors for header background and site title color alongside the existing Astra selectors
- **Also fixed:** JS selector updated to include `#bloghash-header, #masthead` in addition to Astra selectors
- **Deleted:** `kbt-header-fix.php` from mu-plugins (conflicted with dark-header approach — it was trying to make text dark in light mode, but dark background is the correct fix)
- **Deployed:** `/blogs/wp-content/mu-plugins/kbt-blog-style.php`

### /blog/ → /blogs/ Redirect (March 31, 2026)
- Added `RewriteRule ^blog(/.*)?$ /blogs$1 [R=301,L]` in `.htaccess`
- Removed old WordPress catch-all block for `/blog/`
- Replaced `/blog/index.php` on server with PHP 301 redirect (nginx was serving the file directly, bypassing .htaccess)
- Sub-paths like `/blog/post-name/` redirect correctly via .htaccess
- Root `/blog/` redirect was initially delayed by nginx upstream cache (now cleared)

### Twitter/X Removed (March 31, 2026)
- User confirmed no Twitter account — removed all Twitter/X references from the site
- `config.php`: removed `'twitter'` from `$socialLinks` array
- `includes/schema.php`: removed `https://x.com/keyboardtester` from `sameAs`, added YouTube and Facebook
- `luckywheeltool.php`: removed "Follow us on Twitter" CTA, updated blog link to `/blogs/`
- `tools/mouse_speed_tester_tool_guideline.php`: removed "Follow us on X" CTA, updated blog link to `/blogs/`
- Footer already had no Twitter icon (GitHub, GitLab, YouTube, Facebook only)

## Recent Update (v17.2.39)

### Google Indexing API Setup (April 2, 2026)
- **Problem:** Only ~37 of 213 sitemap pages indexed by Google. Sitemap "Couldn't fetch" is a confirmed Google-side bug.
- **Solution:** Set up Google Indexing API to submit crawl requests directly to Google, bypassing sitemap discovery.

#### Infrastructure Created
- `submit-google-indexing.py` — reads all URLs from `sitemap.xml`, submits each via Indexing API (200/day quota)
- `setup-google-indexing.ps1` — one-time setup script: installs gcloud, creates GCP project, enables API, generates service account credentials
- `google-credentials.json` — service account key (gitignored via `*credential*` pattern, DO NOT COMMIT)
- `google-indexing-setup.txt` — stores project ID and service account email for reference
- `submit-google-indexing-log.txt` — auto-generated log of all submission runs

#### GCP Project Details
- **Project ID:** kbt-indexing-4659
- **Service Account:** kbt-indexing-sa@kbt-indexing-4659.iam.gserviceaccount.com
- **API:** Web Search Indexing API (indexing.googleapis.com)
- **GSC Permission:** Service account added as Owner on keyboardtester.click property

#### First Submission Run (April 2, 2026)
- **200 URLs submitted** — all HTTP 200, zero errors
- **13 URLs remaining** (hit daily quota) — submit next day with:
  ```
  python submit-google-indexing.py --offset 200
  ```
- Expected: Google crawls submitted pages within 24–48 hours; indexed count in GSC should rise from ~37

#### How to Re-run / Resubmit
```bash
# Submit all 213 URLs (first 200 today, then run again tomorrow for remaining 13)
python submit-google-indexing.py

# Resume from a specific offset
python submit-google-indexing.py --offset 200

# Dry run (see URLs without submitting)
python submit-google-indexing.py --dry-run

# After adding new pages to sitemap, just run again — it re-submits everything
python submit-google-indexing.py
```

#### Quota
- Default: 200 requests/day per GCP project (free, no billing needed)
- To increase: Google Cloud Console → APIs & Services → Indexing API → Quotas

#### Dependencies
```bash
pip install google-auth requests
```

## Recent Update (v17.2.40)

### Bing Webmaster Tools — Full Integration (April 3, 2026)

#### Bing Webmaster API Connection
- Created `submit-bing-indexing.py` — reads all URLs from `sitemap.xml`, submits via Bing URL Submission API
- API Key: stored in `submit-bing-indexing.py` (DO NOT COMMIT to public repos)
- Daily quota: 10,000 URLs/day (vs Google's 200/day)
- Batch size: 500 URLs per request (all 213 submitted in a single batch)
- **First submission run:** 213/213 URLs submitted, 0 errors (April 3, 2026)
- Log saved to: `submit-bing-indexing-log.txt`

#### How to Re-run Bing Submission
```bash
python submit-bing-indexing.py            # Submit all URLs
python submit-bing-indexing.py --dry-run  # Preview without submitting
```

#### Sitemap Registered in Bing
- Submitted `https://keyboardtester.click/sitemap.xml` via Bing Webmaster API (`SubmitFeed` endpoint)
- Previously Bing had no sitemap registered — was crawling via link discovery only

#### Bing Webmaster Audit Results (April 3, 2026)
Pulled via Bing Webmaster API — last 90 days:

| Metric | Count | Status |
|--------|-------|--------|
| Pages Crawled | 1,925 | Good |
| In Index | 5,043 | Good |
| 2xx OK | 7,756 | Good |
| 301 Redirects | 2,040 | Expected (www→non-www, legacy URLs) |
| 4xx Errors | 22 | Fixed (see below) |
| 5xx Errors | 15 | Transient — no PHP syntax errors found |
| Blocked by robots.txt | 0 | Good |
| Malware | 0 | Good |

#### Traffic Insight (Bing, last 30 days)
- "keyboard tester": 7,079 impressions, 5 clicks, avg position 9 → **0.07% CTR (very low)**
- Root cause: title lacked urgency; `| KBT` suffix was wasted space

#### Fixes Applied

**1. CTR Fix — `meta-config.php`**
- `index.php` title changed from `Keyboard Tester Online - Free Key Test Tool | KBT` → `Free Keyboard Tester Online – Test Every Key Instantly`
- `index.php` description rewritten to be action-first: starts with "Press any key and watch it highlight instantly"
- Adds "N-key rollover" for technical/gamer audience, mentions specific browsers (Chrome, Firefox, Edge)

**2. 4xx Reduction — `.htaccess`**
- Added `ErrorDocument 404 /404.html` — ensures Bing sees a proper HTML 404 (not Apache default error page)
- Added redirects for likely-hit legacy URL patterns:
  - `lucky-wheel.php` → `luckywheeltoolindex.php`
  - `lucky-wheel-tool.php` → `luckywheeltoolindex.php`
  - `screen-test-online.php` → `screentestindex.php`
  - `webcam-tester-online.php` → `webcamtesterindex.php`
  - `free-keyboard-tester.php` → `/`
  - `keyboard-test.php` → `/`

**3. 5xx Errors — Monitoring**
- All PHP files pass `php -l` syntax check — no syntax errors
- `GetCrawlIssues` API returned empty (no specific pages flagged)
- Likely transient server errors or hosting restarts — no action needed
- If 5xx count persists after next audit, check cPanel error logs

#### Bing API Endpoints That Work (for reference)
| Endpoint | Method | Purpose |
|----------|--------|---------|
| `SubmitUrlbatch` | POST | Submit URLs for crawling |
| `SubmitFeed` | POST | Register sitemap |
| `GetCrawlSettings` | GET | Crawl rate settings |
| `GetCrawlStats` | GET | Crawl health stats by date |
| `GetQueryStats` | GET | Search query performance |
| `GetPageStats` | GET | Per-page traffic data |
| `GetBlockedUrls` | GET | URLs blocked from index |
| `GetCrawlIssues` | GET | Specific crawl issue list |
| `GetUrlTrafficInfo` | GET | Click/impression data for a URL |

Endpoints that return 404 (not available in this API version): `GetSites`, `GetSiteInfo`, `AddSitemap`, `GetSitemaps`

## Recent Update (v17.2.44)

### PageSpeed Performance Fixes (April 2026)
Addressed all actionable issues from Google PageSpeed Insights (mobile + desktop audit).

#### Fix 1 — LCP Element Render Delay (3,030ms → near 0ms)
**Root cause:** `tools/keyboard_tester_english.php` inline `<script>` block (37KB, 700+ lines) ran synchronously in the body, blocking first paint. 55+ DOM queries + `KeyboardCatProgress` constructor ran before the LCP image could paint.

**Fix:** Wrapped the entire IIFE in `requestAnimationFrame(function(){ setTimeout(fn, 0); })`. This defers all keyboard initialization to AFTER the first paint frame.

**Files changed:** `tools/keyboard_tester_english.php`

#### Fix 2 — CLS 0.189 (Space Grotesk font swap)
**Root cause:** 238 tool pages loaded Space Grotesk + JetBrains Mono as a render-blocking `<link rel="stylesheet">` with `display=swap`. This caused layout shifts AND blocked first paint.

**Fix:** Changed all 238 pages from sync `rel="stylesheet"` to async preload with `display=optional`:
```html
<link rel="preload" as="style" href="...?display=optional" onload="this.onload=null;this.rel='stylesheet'">
```

Also added `@font-face` metric overrides to `head-common.php` critical CSS for Space Grotesk (Arial fallback) and JetBrains Mono (Courier New fallback) to prevent CLS when fonts swap.

**Files changed:** 238 tool/language PHP files, `includes/head-common.php`

#### Fix 3 — Minify CSS (2 KiB savings)
Created `assets/css/index-modern.min.css` (minified version). Updated `index.php` to use it.

**Files changed:** `assets/css/index-modern.min.css` (new), `index.php`

#### Fix 4 — AdSense Main-Thread Blocking
Improved AdSense loading in `head-common.php`:
- Increased delay from 2s to 3s after `window.load`
- Added `requestIdleCallback` wrapper so AdSense loads during browser idle time (reduces forced reflow impact)

**Files changed:** `includes/head-common.php`

#### What remains (third-party, cannot fix)
- AdSense forced reflows (`show_ads_impl_fy2021.js`) — Google's code
- FundingChoices unused JS (68 KiB) — Google consent platform
- Clarity cache TTL (1 day) — Microsoft's CDN setting

## Recent Update (v17.2.43)

### Full Multilingual Localization — All 7 New Tools in All 8 Languages (April 2026)

All tools on the site are now available in all 8 supported languages. Users selecting a language from the dropdown now have access to every tool including the 7 new tools added in v17.2.42.

#### Architecture: Shared Renderer System
Rather than 56 standalone files, a shared PHP renderer per tool lives in `includes/lang-tool-pages/`. Each file contains a `$langData` array with all 8 language translations and generates the full HTML page. Thin 4-line wrapper pages in each language folder set `$lang` and include the renderer.

**Renderer files (`includes/lang-tool-pages/`):**
- `spacebar-test.php` — Spacebar counter with 5s/10s/30s modes
- `reaction-time-test.php` — Reaction time state machine (5 states)
- `polling-rate-test.php` — Mouse Hz measurement via performance.now()
- `refresh-rate-test.php` — Monitor refresh rate via rAF trimmed-mean
- `touch-screen-test.php` — Touch/ghost test with Pointer Events API
- `gamepad-test.php` — Gamepad API with drift detection + vibration
- `color-test.php` — 14 color panels with fullscreen API

**Wrapper page pattern (4 lines):**
```php
<?php
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-es.php';
$lang = 'es';
include __DIR__ . '/../../includes/lang-tool-pages/spacebar-test.php';
```

#### Pages Created: 56 Total (7 tools × 8 languages)
All exist at `languages/{language}/{tool}.php`:

| Tool | es | ar | fr | de | ja | ko | pt | ru |
|------|----|----|----|----|----|----|----|----|
| spacebar-test.php | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| reaction-time-test.php | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| polling-rate-test.php | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| refresh-rate-test.php | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| touch-screen-test.php | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| gamepad-test.php | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |
| color-test.php | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ | ✓ |

#### Language Features
- **RTL support:** Arabic pages automatically get `dir="rtl"` on the `<html>` element
- **Hreflang:** Every localized page includes all 9 hreflang tags (en + 8 languages + x-default)
- **Canonical URLs:** Each page has a self-referencing canonical via `absoluteUrl()`
- **JS strings:** Dynamic UI text injected via `json_encode()` for safe escaping
- **Locale-specific text:** All buttons, status messages, ratings, and SEO content translated

#### Updated Infrastructure
- **8 tools-list files** (`languages/{lang}/sections/tools-list-{code}.php`) — 7 new tool cards added to each
- **sitemap.xml** — 56 new URLs added (total: 278 URLs)
- **submit-indexnow.php** — 56 new URLs added
- **deploy-latest.py** — All 56 wrapper pages + 7 renderers + 8 tools-list files added

## Recent Update (v17.2.42)

### 5 New Tool Pages Built — April 2026

Built and deployed 5 new standalone testing tools following the existing site pattern (spacebar-test.php / reaction-time-test.php template).

| # | Tool | File | SEO Focus |
|---|------|------|-----------|
| 01 | Mouse Polling Rate Test | `polling-rate-test.php` | mouse hz test, polling rate checker |
| 02 | Monitor Refresh Rate Test | `refresh-rate-test.php` | monitor refresh rate test online, 144hz test |
| 03 | Touch Screen Test | `touch-screen-test.php` | touch screen test online, ghost touch test |
| 04 | Gamepad / Controller Test | `gamepad-test.php` | gamepad tester online, stick drift test |
| 05 | Monitor Color Test | `color-test.php` | monitor color test online, screen color test |

#### Each Tool Includes
- Full PHP page following site template (config.php, seo-meta.php, head-common.php, header/footer)
- Scoped CSS using CSS vars (--primary-color, --card-bg, --border-color, etc.)
- Vanilla JS with no external API calls
- Privacy notice: "This test runs entirely in your browser. No data is collected."
- 4 SEO H2 content sections per tool
- Trust strip with 4 benefit cards
- JSON-LD WebApplication schema
- Reset button and where applicable Stop button
- Internal cross-links to related tools
- Mobile-responsive layout

#### Technical Implementation Notes
- **polling-rate-test.php**: Uses `performance.now()` delta between `mousemove` events, rolling 60-sample window, Hz bar capped at 1000Hz scale
- **refresh-rate-test.php**: Uses `requestAnimationFrame` loop for 3 seconds, 5% trimmed-mean, snaps to standard Hz values (60/75/120/144/165/240/360+), calculates jitter via std deviation
- **touch-screen-test.php**: Uses Pointer Events API (`pointerdown/move/up/cancel`), draws colored trails per unique pointerId on canvas, ghost touch detector via 10-second countdown
- **gamepad-test.php**: Uses HTML5 Gamepad API with `requestAnimationFrame` polling loop, visualizes analog sticks on canvas with dead-zone circle, drift detector (threshold 0.05), vibration via `dual-rumble`
- **color-test.php**: 14 test panels (8 solid, 4 gradient, 1 color ramp, 1 checkerboard), Fullscreen API, keyboard navigation (arrow keys + F), canvas-drawn spectrum ramp and checkerboard pattern

#### Files Updated
- `footer.php` — added 5 new tools to "More Tools" section
- `sitemap.xml` — added 5 new URLs (total now ~220)
- `meta-config.php` — added SEO metadata for all 5 new pages
- `includes/components/tools-list.php` — added 5 new tool cards to the grid
- `submit-indexnow.php` — added 5 new URLs for IndexNow submission
- `deploy-latest.py` — added all 5 new files + sitemap/submit-indexnow/tools-list to upload list

#### Deployment & Indexing
- Deployed via FTP: 138 files, 0 failures
- Bing: 222 URLs submitted, 0 errors via URL Submission API
- Google Indexing API: submitted (running)

## Recent Update (v17.2.41)

### SEO Audit Implementation — April 2026 (24-Issue Report)

Full implementation of the April 2026 SEO audit report. All 24 issues addressed except #21/#22 (URL renames — too risky, already handled via intent cluster pages) and #24 (canonical already correct via seo-meta.php).

#### Section 1 — Title Tags Fixed (#01–#06)
| Page | Old Title | New Title |
|------|-----------|-----------|
| `index.php` | Keyboard Tester Online - Free Key Test Tool \| KBT | Free Online Keyboard Tester — Ghosting Check, Heatmap & Latency \| KeyboardTester.click |
| `keyboard-ghosting-test.php` | Keyboard Ghosting Test Online \| Check Blocked Key Combos | Keyboard Ghosting Test — Anti-Ghosting & N-Key Rollover Check Online \| KeyboardTester.click |
| `ghost-click-detector.php` | Ghost Click Detector Online \| KeyboardTester.click | Double Click Test — Mouse Ghost Click Detector Online Free \| KeyboardTester.click |
| `screentestindex.php` | Screen Tester for Dead Pixels Online \| KeyboardTester.click | Dead Pixel Test & Screen Tester Online — Free Monitor Check \| KeyboardTester.click |
| `stuck-key-test.php` | Stuck Key Test Online \| Check Repeating or Jammed Keyboard Keys | Stuck Key Test — Check Jammed or Repeating Keyboard Keys \| KeyboardTester.click |
| `latency-checker.php` | Input Latency Checker Online \| KeyboardTester.click | Keyboard Latency Checker — Test Input Lag Online Free \| KeyboardTester.click |

#### Section 2 — H1/H2 Tags Fixed (#07–#11)
- `keyboard-ghosting-test.php` hero H1: "Keyboard Ghosting Test Online" → "Keyboard Ghosting Test"
- `ghost-click-detector.php` H2: "Ghost Click Detector" → "Double Click Test — Mouse Ghost Click Detector"
- `screentestindex.php` H2: "Screen Tester" → "Dead Pixel Test & Screen Tester"
- `stuck-key-test.php` hero H1: "Stuck Key Test Online" → "Stuck Key Test"
- `latency-checker.php` H2: "Latency Checker" → "Keyboard Latency Checker"

#### Section 3 — Meta Descriptions Fixed (#12–#14)
Updated descriptions for: `keyboard-ghosting-test.php`, `ghost-click-detector.php`, `screentestindex.php`, `latency-checker.php`, `n-key-rollover-test.php`, `mic-tester.php`
- All now lead with the primary keyword in first sentence
- Added "No download", "browser-based", "free" signals per report guidance

#### Section 4 — Page Content Added (#15–#17)
- `help/seo-content/ghost-click.php`: Added "What Causes Mouse Double Clicking?" section with Omron/Huano switch explanation
- `help/seo-content/screen-tester.php`: Added "Dead Pixel Test" H2 section at top
- `help/seo-content/keyboard-ghosting-test.php`: Added "How to Use This Keyboard Ghosting Test" section before FAQ

#### Section 5 — New Pages Created (#18–#19)
- **`spacebar-test.php`** — Spacebar counter with 5s/10s/30s timer, speed ratings table, SEO content. Targets "spacebar test" + "spacebar counter" (MEDIUM competition, trending via TikTok)
- **`reaction-time-test.php`** — Click-when-green reflex tester, 5-attempt average, ms ratings. Targets "reaction time test online" (MEDIUM competition)
- **`double-click-test.php`** — Already existed from v17.2.30 wave

#### Section 6 — URL Changes (#21–#22)
- **SKIPPED** — `screentestindex.php` rename to `dead-pixel-test.php` skipped: already indexed, `dead-pixel-test.php` intent cluster page exists and handles this keyword. Renaming would lose GSC authority.
- **SKIPPED** — Underscore URL changes (LOW priority per report, requires extensive redirect chain)

#### Section 7 — Anchor Text Updated (#23)
`footer.php` anchor text changes (href unchanged, only visible text updated):
- "Keyboard Tester" → "Free Keyboard Tester"
- "Click Speed Test" → "Click Speed Test (CPS)"
- "Screen Tester" → "Dead Pixel Test"
- "Mic Tester" → "Microphone Test Online"
- "Webcam Tester" → "Webcam Test Online"
- "Ghost Click Detector" → "Double Click Test"

#### Section 8 — Canonical Tags (#24)
- **No change needed** — `seo-meta.php` already generates self-referencing canonicals for all pages. Report's suggestion to point homepage canonical to `/tools/keyboard-tester/` was rejected (homepage IS the canonical keyboard tester page).

#### Keywords to Avoid (Appendix B — noted in project)
Per audit: DO NOT optimize for: keyboard tester, keyboard tester online, typing speed test, WPM test, CPS test, click speed test, dead pixel test, QR code generator, password generator — all dominated by 5+ year authority sites.

#### Sitemap & Indexing
- `sitemap.xml` regenerated — now includes `spacebar-test.php` and `reaction-time-test.php` (total: 215 URLs)
- `submit-indexnow.php` updated with new URLs
- Google Indexing API submitted all new/changed pages
- Bing URL Submission API submitted all new/changed pages

## Recent Update (v17.2.45)

### Site-Wide Contrast Fixes — Dark & Light Mode (April 2026)

#### Root Cause (Critical)
Dark-mode CSS variable overrides in `index-modern.css` were scoped to `html.dark-theme .landing-page` — but the same variables (`--landing-surface`, `--landing-muted`, `--landing-ink`, `--landing-border`) are used by shared components (`.guidelines.landing-guide`, `.seo-article.seo-faq`) that appear on non-landing pages like `tools/keyboard-tester/`.

On non-landing pages in dark mode:
- `--landing-surface` stayed at `#ffffff` (light default) while dark overlays applied
- `--landing-muted` stayed at `#5b6472` (light default) → rendered ~1.7:1 on mixed-mode backgrounds → WCAG fail
- Card headings (`--landing-ink: #111827`) rendered as dark text on mixed gray → low contrast

#### Files Fixed

**`assets/css/index-modern.css`:**
- Moved `--landing-surface`, `--landing-ink`, `--landing-text`, `--landing-muted`, `--landing-border` overrides to `html.dark-theme` global scope (no longer scoped to `.landing-page`)
- Kept `--landing-bg`, `--landing-accent-hover`, `--landing-grid` in `.landing-page` scope (page-layout-specific)
- Changed `.guidelines.landing-guide .help-card` dark bg: `rgba(15,23,42,0.6)` → `rgba(148,163,184,0.07)` (was same as parent = invisible, now slightly lighter with visible border)
- Changed `.guidelines.landing-guide .help-accordion details` dark bg: `rgba(15,23,42,0.55)` → `rgba(148,163,184,0.06)` (same fix)
- Changed `.seo-article.seo-faq details` dark bg: same fix

**`assets/css/global.css`:**
- `.help-card { background: var(--bg-color) }` → `var(--surface)` — in dark mode cards were darker (`#0f172a`) than parent container (`#1e293b`), creating inverted visual hierarchy
- `.help-accordion details` — same fix

**`assets/css/index-modern.min.css`** — regenerated from index-modern.css  
**`assets/css/global.min.css`** — regenerated from global.css (also fixes long-standing outdated-since-March-29 issue)  

**`includes/components/tools-list-styles.php`:**
- `.tool-card-link { color: #0ea5e9 }` → `#0369a1` — `#0ea5e9` on white card bg = 2.74:1 (fails WCAG AA); `#0369a1` = 9.7:1 (passes AAA)

#### Affected Pages (all now fixed)
- All pages using `.guidelines.landing-guide` on non-landing-page bodies (e.g. `tools/keyboard-tester/`, other tool pages)
- All pages using `.seo-article.seo-faq` FAQ accordions
- All pages showing the tools list grid
- The index.php landing page (dark mode variables now more precisely scoped but behavior unchanged)

#### WCAG Compliance After Fix
- Accordion body text: `#94a3b8` on `#0f172a` ≈ 6.8:1 ✓ (was ~1.7:1 on non-landing pages)
- Accordion headings: `#e5e7eb` on dark surface ≈ 13:1 ✓ (was ~4:1)
- Help card text: `var(--text-color)/#e2e8f0` on `var(--surface)/#1e293b` ≈ 9:1 ✓
- Tool card links: `#0369a1` on white ≈ 9.7:1 ✓ (was 2.74:1)

## Social & Contact
- YouTube: https://www.youtube.com/@KeyboardTester-dot-click
- Facebook: https://www.facebook.com/keyboardtester.click
- GitHub: https://github.com/nasirazizawan009/keyboardtester-click
- GitLab: https://gitlab.com/nasirazizawan/keyboardtester.click
- Email: support@keyboardtester.click
