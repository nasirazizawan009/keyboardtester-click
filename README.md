# KeyboardTester.click

A comprehensive online testing platform for keyboards, mice, audio devices, and various utility tools. Available in 9 languages with a modern, responsive design.

**Live Site:** [https://www.keyboardtester.click](https://www.keyboardtester.click)

---

## Features

### Keyboard Tools
- **Keyboard Tester** - Test all keyboard keys with visual feedback and color-coded status
- **Typing Test** - Measure typing speed (WPM) and accuracy
- **Latency Checker** - Test input latency and reaction time

### Mouse Tools
- **Mouse Tester** - Test mouse buttons (left, right, middle) and scroll wheel
- **Click Speed Test** - Measure clicks per second (CPS)
- **Ghost Click Detector** - Detect unintended double clicks or ghost clicks
- **DPI Tester** - Test and measure mouse sensitivity/DPI
- **Mouse Trail** - Visualize mouse movement patterns

### Audio & Video Tools
- **Microphone Tester** - Test microphone input with visual feedback
- **Headphone/Speaker Tester** - Test left/right audio channels
- **Webcam Tester** - Test webcam with preview and settings
- **Screen Tester** - Test monitor for dead pixels and color accuracy

### Utility Tools
- **QR Code Generator** - Create QR codes from text or URLs
- **QR Code Reader** - Scan and decode QR codes from images
- **OCR Tool** - Extract text from images using optical character recognition
- **Password Generator** - Generate secure random passwords
- **WhatsApp Link Generator** - Create direct WhatsApp chat links
- **Lucky Wheel** - Random selection spinner tool

---

## Supported Languages

| Language | Code | Keyboard Layout |
|----------|------|-----------------|
| English | en | QWERTY (US/UK) |
| Spanish | es | QWERTY (Spanish) |
| French | fr | AZERTY |
| German | de | QWERTZ |
| Portuguese | pt | QWERTY (Portuguese) |
| Russian | ru | ЙЦУКЕН (Cyrillic) |
| Arabic | ar | Arabic (RTL) |
| Japanese | ja | Japanese (Romaji/Kana) |
| Korean | ko | Korean (Hangul) |

Each language version includes:
- Fully translated UI
- Native keyboard layouts
- Localized tool pages
- RTL support for Arabic

---

## Project Structure

```
keyboardtester.click/
├── index.php                    # Homepage
├── config.php                   # Site configuration
├── meta-config.php              # SEO meta configuration
│
├── assets/
│   └── css/
│       ├── global.css           # Global styles
│       ├── index-modern.css     # Modern landing page styles
│       ├── keyboard-tool.css    # Keyboard tester styles
│       └── category-pages.css   # Category page styles
│
├── images/
│   ├── keyboard/                # Keyboard-related images
│   ├── mouse/                   # Mouse-related images
│   └── shared/                  # Shared images (logo, etc.)
│
├── includes/
│   ├── head-common.php          # Common head elements
│   ├── header.php               # Site header
│   ├── footer.php               # Site footer
│   └── components/
│       └── tools-list.php       # Tools listing component
│
├── tools/
│   ├── keyboard-tester/         # Main keyboard tester
│   └── *.php                    # Tool components
│
├── languages/
│   ├── spanish/
│   │   ├── index.php            # Spanish homepage
│   │   ├── config-es.php        # Spanish config
│   │   ├── header-es.php        # Spanish header
│   │   ├── footer-es.php        # Spanish footer
│   │   ├── tools/               # Tool components (Spanish)
│   │   ├── sections/            # Page sections (Spanish)
│   │   └── *.php                # Individual tool pages
│   │
│   ├── korean/                  # Korean version
│   ├── arabic/                  # Arabic version (RTL)
│   ├── french/                  # French version
│   ├── german/                  # German version
│   ├── portuguese/              # Portuguese version
│   ├── russian/                 # Russian version
│   └── japanese/                # Japanese version
│
├── pages/
│   ├── tools.php                # All tools page
│   ├── category-keyboard.php    # Keyboard tools category
│   ├── category-mouse.php       # Mouse tools category
│   ├── category-audio-video.php # Audio/Video tools category
│   └── category-utilities.php   # Utility tools category
│
├── blog/
│   └── index.php                # Blog hub page
│
├── help/
│   ├── keyboard-tester.php      # Keyboard tester help
│   └── brief-keyboard-tester.php
│
├── api/
│   └── send-feedback.php        # Feedback API endpoint
│
├── robots.txt                   # Search engine crawl rules
├── sitemap.xml                  # Main sitemap
├── sitemap-index.xml            # Sitemap index
├── languages-sitemap.xml        # Language pages sitemap
├── keyboard-sitemap.xml         # Keyboard tools sitemap
├── mouse-sitemap.xml            # Mouse tools sitemap
└── utilities-sitemap.xml        # Utility tools sitemap
```

---

## Technology Stack

- **Backend:** PHP 7.4+
- **Frontend:** HTML5, CSS3, JavaScript (ES6+)
- **Styling:** Custom CSS with CSS Variables for theming
- **Icons:** Font Awesome, Custom SVG
- **Fonts:** Google Fonts (Space Grotesk, JetBrains Mono)
- **Libraries:**
  - QRCode.js - QR code generation
  - jsQR - QR code reading
  - Tesseract.js - OCR processing
  - Canvas API - Visual feedback

---

## Features Highlights

### Dark/Light Theme
- System preference detection
- Manual toggle option
- Persistent preference storage

### Responsive Design
- Mobile-first approach
- Tablet and desktop optimized
- Touch-friendly interfaces

### Accessibility
- ARIA labels and roles
- Keyboard navigation support
- Screen reader compatible
- High contrast support

### SEO Optimized
- Semantic HTML structure
- Open Graph meta tags
- JSON-LD structured data
- XML sitemaps
- Hreflang tags for multilingual

### Performance
- WebP image format support
- Responsive images with srcset
- Lazy loading for images
- Minified CSS/JS assets

---

## Local Development

### Requirements
- PHP 7.4 or higher
- Web server (Apache/Nginx) or XAMPP/WAMP
- Modern web browser

### Setup
1. Clone the repository:
   ```bash
   git clone https://gitlab.com/nasirazizawan/keyboardtester.click.git
   ```

2. Configure your web server to point to the project directory

3. Update `config.php` with your local settings:
   ```php
   define('SITE_URL', 'http://localhost/kbt');
   ```

4. Access the site at `http://localhost/kbt`

---

## Deployment

The site is deployed to cPanel hosting via FTP. Deployment scripts are available locally but not included in the repository for security reasons.

### Manual Deployment
1. Upload files via FTP to the web root
2. Ensure proper file permissions (644 for files, 755 for directories)
3. Clear any caching if enabled

---

## SEO & Sitemaps

The site uses a structured sitemap index with separate sitemaps for:
- **page-sitemap.xml** - Main pages and categories
- **keyboard-sitemap.xml** - Keyboard-related tools
- **mouse-sitemap.xml** - Mouse-related tools
- **utilities-sitemap.xml** - Utility tools
- **languages-sitemap.xml** - All language versions and localized tools

Submit `sitemap-index.xml` to Google Search Console for indexing.

---

## Browser Support

| Browser | Version |
|---------|---------|
| Chrome | 80+ |
| Firefox | 75+ |
| Safari | 13+ |
| Edge | 80+ |
| Opera | 67+ |

---

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-tool`)
3. Commit your changes (`git commit -am 'Add new tool'`)
4. Push to the branch (`git push origin feature/new-tool`)
5. Create a Pull Request

---

## License

This project is proprietary software. All rights reserved.

---

## Contact

- **Website:** [keyboardtester.click](https://www.keyboardtester.click)
- **Feedback:** Use the feedback form on the website
- **Repository:** [GitLab](https://gitlab.com/nasirazizawan/keyboardtester.click)

---

## Changelog

### 2026-02-13
- Added Spanish language tools (15 tools)
- Added Korean language tools (15 tools)
- Added Arabic language tools with RTL support (15 tools)
- Updated sitemaps with 45+ new URLs
- Improved robots.txt with additional bot rules
- Added blog hub page
- Added WebP image variants for performance
- Fixed QR generator/reader across all languages

### Previous Updates
- Initial release with English version
- Added 8 language keyboard layouts
- Implemented dark/light theme
- Added comprehensive tool suite

---

**Made with care for testers worldwide**
