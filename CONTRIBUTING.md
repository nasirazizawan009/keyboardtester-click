# Contributing to KeyboardTester.click

Thank you for your interest in contributing! This is a PHP/JS project with no build step — contributions are straightforward.

## Ways to Contribute

- **Bug reports** — open an issue describing the problem and steps to reproduce
- **Tool improvements** — improve accuracy, UX, or accessibility of existing tools
- **New tools** — add browser-based hardware testing tools that fit the site's scope
- **Translations** — improve or add language support (see `/languages/`)
- **SEO content** — improve help pages in `/help/seo-content/`
- **Performance** — improve PageSpeed scores, reduce CLS, LCP, or blocking resources

## Getting Started

### Prerequisites
- PHP 7.4+ (XAMPP or similar for local dev)
- A web browser

### Local Setup

```bash
git clone https://github.com/nasirazizawan009/keyboardtester-click.git
cd keyboardtester-click
```

Open XAMPP (or any PHP server) and point it to the project folder.

```
http://localhost/keyboardtester-click/
```

No database, no composer, no npm — just PHP and static files.

### Configuration

```bash
cp .env.example .env
# Edit .env with your own FTP/API credentials if you need to deploy
```

The site auto-detects `localhost` vs production via `config.php` — no manual switching needed.

## Project Structure

```
kbt/
├── assets/css/         # Stylesheets
├── assets/js/          # JavaScript
├── includes/           # Shared PHP components (header, footer, SEO)
├── languages/          # Multilingual pages (ar, fr, de, es, pt, ru, ja, ko)
├── tools/              # Embedded tool partials
├── help/               # Brief help / SEO content pages
├── images/             # Tool images
├── flags/              # Country flag SVGs
└── *.php               # Root-level tool pages
```

## Adding a New Tool

1. Create `your-tool-name.php` in the root directory
2. Include `config.php`, `seo-meta.php`, `head-common.php`, `header.php`, `footer.php`
3. Follow the existing tool template (see `spacebar-test.php` as a clean example)
4. Add to `includes/components/tools-list.php`
5. Add to `sitemap.xml` and `submit-indexnow.php`

## Adding a Language Translation

1. Create `languages/{lang}/your-tool.php`
2. Follow the 4-line wrapper pattern:
   ```php
   <?php
   include __DIR__ . '/../../config.php';
   include __DIR__ . '/config-{lang}.php';
   $lang = '{lang}';
   include __DIR__ . '/../../includes/lang-tool-pages/your-tool.php';
   ```
3. Add translations to `includes/lang-tool-pages/your-tool.php` under the `$langData` array

## Code Style

- **PHP**: no framework, plain includes, `htmlspecialchars()` for all output
- **CSS**: uses CSS custom properties (`--primary-color`, `--card-bg`, etc.) — no preprocessors
- **JS**: vanilla ES5-compatible JavaScript — no bundlers, no transpilers
- **No jQuery**, no React, no npm dependencies in the frontend

## Pull Request Guidelines

1. Fork the repo and create a branch: `git checkout -b feature/my-improvement`
2. Keep changes focused — one PR per feature/fix
3. Test locally on both desktop and mobile (or use Chrome DevTools)
4. Check that dark mode still looks correct
5. Submit the PR with a clear description of what changed and why

## Deployment Note

This project deploys via FTP to a cPanel shared host. The `deploy-latest.py` script handles uploads. Maintainers handle all production deployments — contributors only need to submit PRs.

## License

By contributing, you agree that your contributions will be licensed under the project's [MIT License](LICENSE).
