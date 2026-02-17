# KeyboardTester.Click - Free Online Hardware Testing Tools

[![Website](https://img.shields.io/badge/Website-keyboardtester.click-blue?style=for-the-badge)](https://keyboardtester.click)
[![Tools](https://img.shields.io/badge/Tools-20+-green?style=for-the-badge)](https://keyboardtester.click/pages/tools.php)
[![Languages](https://img.shields.io/badge/Languages-8-orange?style=for-the-badge)](https://keyboardtester.click)
[![License](https://img.shields.io/badge/License-MIT-yellow?style=for-the-badge)](LICENSE)

A comprehensive suite of **free, open-source testing tools** for keyboards, mice, screens, webcams, microphones, and more. No downloads required - test your hardware directly in the browser.

**Live Site:** [https://keyboardtester.click](https://keyboardtester.click)

---

## Features

- **100% Free & Open Source** - Use, modify, and distribute
- **No Registration** - No accounts, no downloads
- **Privacy First** - All tests run locally in your browser
- **Mobile Friendly** - Works on desktop, tablet, and mobile
- **Multi-Language** - Available in 8 languages

---

## Quick Start

### Prerequisites
- PHP 7.4+ (or XAMPP/WAMP/MAMP)
- Web server (Apache/Nginx)

### Installation

1. **Clone the repository**
```bash
git clone https://github.com/nasirazizawan009/keyboardtester-click.git
cd keyboardtester-click
```

2. **Configure your settings**
```bash
cp config.example.php config.php
# Edit config.php with your domain/settings
```

3. **Set up on local server (XAMPP)**
```bash
# Copy to htdocs folder
# Access at http://localhost/keyboardtester-click
```

4. **Deploy to production** (Optional)
```bash
cp deploy.example.py deploy.py
# Edit deploy.py with your FTP credentials (keep private!)
python deploy.py
```

---

## Available Tools

### Keyboard Tools
| Tool | File | Live Demo |
|------|------|-----------|
| **Keyboard Tester** | `index.php` | [Try Now](https://keyboardtester.click) |
| **Typing Speed Test** | `keyboard_typing_test.php` | [Try Now](https://keyboardtester.click/keyboard_typing_test.php) |
| **Latency Checker** | `latency-checker.php` | [Try Now](https://keyboardtester.click/latency-checker.php) |

### Mouse Tools
| Tool | File | Live Demo |
|------|------|-----------|
| **Mouse Tester** | `mouse-test.php` | [Try Now](https://keyboardtester.click/mouse-test.php) |
| **Click Speed Test** | `mouse_speed_tester.php` | [Try Now](https://keyboardtester.click/mouse_speed_tester.php) |
| **DPI Tester** | `mouse_sensitivity_DPI_tester.php` | [Try Now](https://keyboardtester.click/mouse_sensitivity_DPI_tester.php) |
| **Ghost Click Detector** | `ghost-click-detector.php` | [Try Now](https://keyboardtester.click/ghost-click-detector.php) |
| **Mouse Trail** | `mouse-trail.php` | [Try Now](https://keyboardtester.click/mouse-trail.php) |

### Display & Camera
| Tool | File | Live Demo |
|------|------|-----------|
| **Screen Test** | `screentestindex.php` | [Try Now](https://keyboardtester.click/screentestindex.php) |
| **Webcam Test** | `webcamtesterindex.php` | [Try Now](https://keyboardtester.click/webcamtesterindex.php) |

### Audio Tools
| Tool | File | Live Demo |
|------|------|-----------|
| **Microphone Test** | `mic-tester.php` | [Try Now](https://keyboardtester.click/mic-tester.php) |
| **Headphone/Speaker Test** | `headphone_speaker_tester_index.php` | [Try Now](https://keyboardtester.click/headphone_speaker_tester_index.php) |

### Utility Tools
| Tool | File | Live Demo |
|------|------|-----------|
| **QR Code Generator** | `QR_code_generator_scanner.php` | [Try Now](https://keyboardtester.click/QR_code_generator_scanner.php) |
| **QR Code Reader** | `qr-code-reader.php` | [Try Now](https://keyboardtester.click/qr-code-reader.php) |
| **OCR Tool** | `ocr-tool.php` | [Try Now](https://keyboardtester.click/ocr-tool.php) |
| **Password Generator** | `auto-password-generator.php` | [Try Now](https://keyboardtester.click/auto-password-generator.php) |
| **WhatsApp Link Generator** | `whatsapp-link-generator.php` | [Try Now](https://keyboardtester.click/whatsapp-link-generator.php) |
| **Lucky Wheel** | `luckywheeltoolindex.php` | [Try Now](https://keyboardtester.click/luckywheeltoolindex.php) |

---

## Project Structure

```
keyboardtester-click/
├── index.php                 # Main keyboard tester (homepage)
├── config.example.php        # Configuration template
├── header.php                # Site header
├── footer.php                # Site footer
├── assets/
│   ├── css/                  # Stylesheets
│   └── js/                   # JavaScript files
├── includes/
│   ├── head-common.php       # Common head elements
│   ├── seo-meta.php          # SEO meta tags
│   └── schema.php            # Structured data
├── tools/                    # Language-specific keyboard testers
│   ├── keyboard_tester_english.php
│   ├── keyboard_tester_spanish.php
│   └── ...
├── languages/                # Localized versions
│   ├── spanish/
│   ├── french/
│   ├── german/
│   ├── arabic/
│   ├── portuguese/
│   ├── russian/
│   ├── japanese/
│   └── korean/
├── pages/                    # Category pages
├── help/                     # Help documentation
└── flags/                    # Country flag SVGs
```

---

## Supported Languages

| Language | Folder | Live Site |
|----------|--------|-----------|
| English | Root | [keyboardtester.click](https://keyboardtester.click) |
| Spanish | `languages/spanish/` | [/languages/spanish/](https://keyboardtester.click/languages/spanish/) |
| French | `languages/french/` | [/languages/french/](https://keyboardtester.click/languages/french/) |
| German | `languages/german/` | [/languages/german/](https://keyboardtester.click/languages/german/) |
| Portuguese | `languages/portuguese/` | [/languages/portuguese/](https://keyboardtester.click/languages/portuguese/) |
| Russian | `languages/russian/` | [/languages/russian/](https://keyboardtester.click/languages/russian/) |
| Arabic | `languages/arabic/` | [/languages/arabic/](https://keyboardtester.click/languages/arabic/) |
| Japanese | `languages/japanese/` | [/languages/japanese/](https://keyboardtester.click/languages/japanese/) |
| Korean | `languages/korean/` | [/languages/korean/](https://keyboardtester.click/languages/korean/) |

---

## Configuration

### config.php

Copy `config.example.php` to `config.php` and update:

```php
// Your domain
$siteUrl = 'https://yourdomain.com/';
$siteName = 'Your Site Name';
$siteEmail = 'contact@yourdomain.com';
```

### IndexNow (Search Engine Submission)

1. Copy `submit-indexnow.example.php` to `submit-indexnow.php`
2. Get your IndexNow key from [Bing Webmaster Tools](https://www.bing.com/webmasters)
3. Update the configuration
4. Create a key file containing your key

---

## Why Use KeyboardTester.Click?

### For Gamers
- Test keyboard response time and latency
- Verify all keys work before competitive matches
- Check mouse DPI and click speed

### For New Hardware
- Verify all keys work on a new keyboard
- Test mouse buttons and scroll wheel
- Check for dead pixels on new monitors

### For Troubleshooting
- Identify stuck or non-responsive keys
- Detect ghost clicks on mice
- Test microphone and webcam functionality

---

## Contributing

Contributions are welcome!

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/new-tool`)
3. Commit changes (`git commit -am 'Add new tool'`)
4. Push (`git push origin feature/new-tool`)
5. Open a Pull Request

### Reporting Issues
- [Open an issue](https://github.com/nasirazizawan009/keyboardtester-click/issues)
- [Feedback form](https://keyboardtester.click/feedback.php)

---

## License

This project is licensed under the **MIT License** - see [LICENSE](LICENSE) for details.

You are free to:
- Use commercially
- Modify
- Distribute
- Use privately

---

## Links

- **Website:** [https://keyboardtester.click](https://keyboardtester.click)
- **All Tools:** [https://keyboardtester.click/pages/tools.php](https://keyboardtester.click/pages/tools.php)
- **Blog:** [https://keyboardtester.click/blog/](https://keyboardtester.click/blog/)
- **About:** [https://keyboardtester.click/about-us.php](https://keyboardtester.click/about-us.php)

---

## Support

If you find this project helpful:
- Star this repository
- Share with others
- [Report bugs or request features](https://github.com/nasirazizawan009/keyboardtester-click/issues)

---

Made with care by [Nasir Aziz](https://github.com/nasirazizawan009)
