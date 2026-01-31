# Site Structure Documentation

## New Organized Structure

Your site has been reorganized for maximum SEO performance and easy maintenance.

### Directory Structure

```
kbt/
├── config.php (global configuration)
├── index.php (home page)
├── sitemap.php (dynamic XML sitemap for search engines)
│
├── includes/
│   ├── head-common.php (Bootstrap, CSS, fonts, theme)
│   ├── header.php (navigation menu)
│   ├── footer.php (footer links)
│   ├── components/
│   │   ├── tools-list.php (related tools grid)
│   │   └── breadcrumbs.php (SEO breadcrumb navigation)
│   └── nav/
│
├── assets/
│   ├── css/ (all stylesheets)
│   │   ├── global.css (global styles)
│   │   ├── keyboard-tool.css
│   │   ├── mouse-tool.css
│   │   └── etc.
│   ├── js/ (all scripts)
│   │   ├── theme.js (dark/light mode)
│   │   └── common.js
│   └── images/
│
├── pages/ (static/listing pages)
│   ├── tools.php (master tools directory page)
│   ├── about.php
│   ├── privacy-policy.php
│   └── disclaimer.php
│
├── tools/ (tool pages with organized sections)
│   ├── keyboard-tester/
│   │   ├── index.php (main page)
│   │   └── sections/
│   │       ├── seo-hero.php (H1, description, features)
│   │       ├── tool-display.php (actual keyboard tester tool)
│   │       └── guidelines.php (how to use)
│   │
│   ├── mouse-tester/
│   │   └── (same structure)
│   │
│   └── [other-tools]/
│
├── languages/ (language-specific versions)
│   ├── arabic/
│   │   └── index.php
│   ├── russian/
│   │   └── index.php
│   ├── spanish/
│   │   └── index.php
│   ├── french/
│   │   └── index.php
│   ├── portuguese/
│   │   └── index.php
│   ├── japanese/
│   │   └── index.php
│   ├── german/
│   │   └── index.php
│   └── korean/
│       └── index.php
│
├── blog/ (WordPress blog - unchanged)
├── DMB/ (DMB system - unchanged)
└── api/ (API endpoints)
```

## Page Structure Template

Every page follows this SEO-optimized structure:

```php
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags (title, description, keywords) -->
    <!-- Canonical URL -->
    <!-- Language Alternatives (hreflang) -->
    <!-- Open Graph meta tags -->
    <?php include 'includes/head-common.php'; ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <!-- Breadcrumbs (SEO navigation) -->
    <?php include 'includes/components/breadcrumbs.php'; ?>
    
    <!-- SEO Hero Section (H1, description, features) -->
    
    <!-- Main Tool -->
    
    <!-- Related Tools List -->
    <?php include 'includes/components/tools-list.php'; ?>
    
    <!-- Guidelines/FAQ -->
    
    <?php include 'includes/footer.php'; ?>
</body>
</html>
```

## Key Features

### ✅ SEO Optimization

- **Proper Heading Hierarchy**: H1 on each page, H2/H3 for sections
- **Meta Tags**: Title, description, keywords optimized for search engines
- **Canonical URLs**: Prevent duplicate content issues
- **Schema Markup**: JSON-LD for FAQ, breadcrumbs, etc.
- **Breadcrumbs**: For navigation and user experience
- **Language Alternatives**: hreflang tags for international versions
- **Open Graph**: For social media sharing

### ✅ Easy Crawling

- **Sitemap.php**: Dynamic XML sitemap at `/sitemap.php`
- **Clear URL Structure**: `/tools/keyboard-tester/`, `/languages/arabic/`
- **Internal Linking**: Tools list on every tool page
- **Proper Navigation**: Header with links to all major sections
- **Robots.txt**: Configured for optimal crawling

### ✅ Organization

- **Separated Concerns**: Header, footer, navigation are separate
- **Reusable Components**: Tools list, breadcrumbs are modular
- **Tool Sections**: Each tool has organized sections (hero, tool, guidelines)
- **Language Support**: Dedicated folder for language-specific versions

### ✅ Performance

- **Modular Loading**: Include only what you need
- **CSS Organization**: Separate stylesheets per tool
- **Proper Caching**: Cache-friendly URLs and structure
- **Fast Crawling**: Clean, organized code structure

## Adding New Tools

To add a new tool:

1. Create folder: `tools/[tool-name]/`
2. Create sections folder: `tools/[tool-name]/sections/`
3. Create files:
   - `sections/seo-hero.php` (H1, description, features)
   - `sections/tool-display.php` (the tool itself)
   - `sections/guidelines.php` (how to use)
   - `index.php` (main page - use template from keyboard-tester)
4. Update `includes/components/tools-list.php` to include new tool
5. Update `pages/tools.php` with new tool card
6. Submit sitemap to Google Search Console

## Updating for Search Engines

1. **Submit Sitemap**: Add `sitemap.php` to Google Search Console
2. **Update robots.txt**: Already configured
3. **Schema Markup**: Use JSON-LD for rich snippets
4. **Internal Linking**: Tools list on every page
5. **Mobile Friendly**: Responsive design included

## URLs After Reorganization

| Page | Old URL | New URL |
|------|---------|---------|
| Keyboard Tester | `/keyboard_tester_english.php` | `/tools/keyboard-tester/` |
| Keyboard Tester (Arabic) | `/keyboard_tester_arabic.php` | `/languages/arabic/` |
| Tools Directory | `/tools.php` | `/pages/tools.php` |
| Main Page | `/index.php` | `/` (same) |

Note: Old URLs still work via redirects if configured in .htaccess
