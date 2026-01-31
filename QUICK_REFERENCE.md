# 📋 SEO & MODULAR REQUIREMENTS - QUICK REFERENCE

## 🎯 One Page Overview

This is your **quick reference guide** for making your project modular with complete SEO compliance.

---

## 🏗️ Page Structure (Copy This Pattern)

```php
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- TITLE: 50-60 chars with keyword -->
  <title>Tool Name - Action Verb | KeyboardTester.click</title>
  
  <!-- META: 150-160 chars, starts strong, keyword in first 120 chars -->
  <meta name="description" content="Your tool description with primary and secondary keywords...">
  
  <!-- KEYWORDS: 5-8 comma-separated terms -->
  <meta name="keywords" content="keyword1, keyword2, keyword3, keyword4, keyword5">
  
  <!-- SOCIAL MEDIA -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Tool Name - Action Verb">
  <meta property="og:description" content="Short compelling description for social sharing">
  <meta property="og:image" content="/images/og/tool-name-og.jpg">
  <meta property="og:url" content="<?php echo url('tool-name.php'); ?>">
  
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Tool Name">
  <meta name="twitter:description" content="Test your tool efficiently">
  <meta name="twitter:image" content="/images/og/tool-name-og.jpg">
  
  <!-- OTHER ESSENTIALS -->
  <link rel="canonical" href="<?php echo absoluteUrl('tool-name.php'); ?>">
  <link rel="icon" type="image/x-icon" href="navigation.png">
  
  <!-- STRUCTURED DATA (JSON-LD) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "Tool Name",
    "description": "Your tool description for schema.org",
    "applicationCategory": "UtilitiesApplication",
    "operatingSystem": "Any",
    "url": "<?php echo absoluteUrl('tool-name.php'); ?>",
    "image": "/images/og/tool-name-og.jpg",
    "offers": {"@type": "Offer", "price": "0", "priceCurrency": "USD"},
    "aggregateRating": {"@type": "AggregateRating", "ratingValue": "4.8", "ratingCount": "1000+"}
  }
  </script>
  
  <style>
    /* Your CSS here */
  </style>
</head>
<body>
  <!-- 1. HEADER -->
  <?php include 'header.php'; ?>

  <!-- 2. MAIN TOOL -->
  <main>
    <section class="tool-section">
      <h1>🎯 Tool Name</h1>
      <p>1-2 sentence description of what the tool does.</p>
      
      <!-- YOUR TOOL UI HERE -->
    </section>
  </main>

  <!-- 3. GUIDELINES -->
  <section id="guidelines">
    <?php include 'tools/tool-name-guidelines.php'; ?>
  </section>

  <!-- 4. TOOLS LIST -->
  <?php include 'tools.php'; ?>

  <!-- 5. FOOTER -->
  <?php include 'footer.php'; ?>

  <script>
    // Guard help button
    const helpButton = document.getElementById('help-button');
    if (helpButton) {
      helpButton.addEventListener('click', () => {
        const guidelines = document.getElementById('guidelines');
        if (guidelines) guidelines.scrollIntoView({ behavior: 'smooth' });
      });
    }

    // Guard theme toggle
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
      themeToggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        document.documentElement.setAttribute('data-theme', currentTheme === 'dark' ? 'light' : 'dark');
      });
    }
  </script>
</body>
</html>
```

---

## 📖 Guidelines File Structure

```php
<div class="guidelines" id="guidelines">
  <h2>📜 Help & Guidelines</h2>
  <p>Welcome text...</p>
  
  <h3>🛠️ How to Use</h3>
  <ul>
    <li>Step 1...</li>
    <li>Step 2...</li>
  </ul>
  
  <h3>✨ Features</h3>
  <ul>
    <li>Feature 1...</li>
    <li>Feature 2...</li>
  </ul>
  
  <h3>❓ FAQs</h3>
  <p><strong>Q: Question?</strong><br>A: Answer...</p>
  
  <h3>💡 Tips & Tricks</h3>
  <ul>
    <li>Tip 1...</li>
  </ul>
</div>
```

---

## 🖼️ Image Requirements

**RULE: Every image MUST have alt text**

```html
<!-- ❌ WRONG -->
<img src="test.jpg">
<img src="test.jpg" alt="image">

<!-- ✅ RIGHT -->
<img src="mouse-test-interface.jpg" alt="Mouse Tester interface showing left-click counter and test area">

<!-- For SVG -->
<svg viewBox="0 0 100 100">
  <title>Mouse Button Layout</title>
  <desc>Diagram showing positions of left, middle, and right mouse buttons</desc>
</svg>
```

**Image Checklist:**
- ✅ Size: Use max-width: 100% for responsiveness
- ✅ Format: WebP with JPEG fallback
- ✅ Naming: `[tool-name]-[description].jpg`
- ✅ OG Images: 1200x630px in `/images/og/`
- ✅ All images have descriptive alt text (3-15 words)

---

## 📊 Heading Hierarchy

**RULE: One H1, proper H2→H3 sequence, never skip levels**

```html
<!-- ❌ WRONG -->
<h1>Tool</h1>
<h2>Section</h2>
<h4>Subsection</h4>  <!-- Skipped H3 -->

<!-- ✅ RIGHT -->
<h1>Mouse Tester</h1>
<h2>How to Use</h2>
<h3>Left Click Test</h3>
<h3>Right Click Test</h3>
<h2>Troubleshooting</h2>
<h3>Left-click not working</h3>
```

---

## 🎨 SEO Meta Tags (Copy This Exactly)

### Title Tag
- **Length:** 50-60 characters
- **Format:** `Primary Keyword - Action Verb | Domain`
- **Examples:**
  - ✅ Mouse Tester - Test Your Mouse Buttons & Scroll | KeyboardTester.click
  - ✅ QR Code Generator - Create Free QR Codes Online | KeyboardTester.click
  - ✅ Typing Speed Test - Measure Your WPM & Accuracy | KeyboardTester.click

### Meta Description
- **Length:** 150-160 characters (Google shows ~155 on desktop, ~120 on mobile)
- **Content:** First 120 chars should include primary keyword, compelling, action-oriented
- **Examples:**
  - ✅ "Test your mouse buttons, scroll wheel, and functionality with our free online mouse tester. Check left-click, right-click, middle-click, and scroll performance instantly."
  - ✅ "Generate free QR codes for URLs, text, WiFi, and more. Download high-resolution QR codes instantly. No registration required. Works on all devices."

### Keywords Meta Tag
- **Count:** 5-8 comma-separated terms
- **Format:** Primary keyword first, then secondary, long-tail
- **Example:** `mouse tester, test mouse, mouse button test, click test, mouse functionality`

### Social Tags (og:)
```html
<meta property="og:type" content="website">
<meta property="og:title" content="Tool Name - Short Description">
<meta property="og:description" content="One line compelling description">
<meta property="og:image" content="/images/og/tool-name-og.jpg">
<meta property="og:url" content="https://keyboardtester.click/tool-name.php">
```

### Twitter Tags
```html
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Tool Name">
<meta name="twitter:description" content="One line description">
<meta name="twitter:image" content="/images/og/tool-name-og.jpg">
```

---

## ✅ Checklist (Before Publishing Each Page)

- [ ] Title: 50-60 chars, includes primary keyword
- [ ] Description: 150-160 chars, keyword in first 120 chars
- [ ] Keywords: 5-8 comma-separated terms
- [ ] og:title and og:description present
- [ ] og:image: 1200x630px image in /images/og/
- [ ] Canonical URL points to main page
- [ ] H1 heading: One per page, matches title
- [ ] H2 headings: 2-4 main sections
- [ ] H3 headings: Under each H2, proper hierarchy
- [ ] All images have alt text (3-15 words, descriptive)
- [ ] Guidelines file included (tools/[name]-guidelines.php)
- [ ] Header included (header.php)
- [ ] Tools list included (tools.php)
- [ ] Footer included (footer.php)
- [ ] JSON-LD structured data present
- [ ] Twitter card meta tags present
- [ ] Favicon present
- [ ] JavaScript guards on header controls (help button, theme toggle)
- [ ] Responsive design (works on mobile/tablet/desktop)
- [ ] Theme toggle works (light/dark mode)
- [ ] All links working
- [ ] No console errors
- [ ] Lighthouse SEO score 90+

---

## 📁 File Naming Convention

**Main Pages:**
- `mouse-test.php` ✅
- `keyboard_typing_test.php` ✅
- `qr-code-reader.php` ✅

**Guidelines Files:**
- `tools/mouse-test-guidelines.php` ✅
- `tools/keyboard-typing-guidelines.php` ✅
- `tools/qr-code-reader-guidelines.php` ✅

**OG Images (1200x630px):**
- `/images/og/mouse-test-og.jpg` ✅
- `/images/og/keyboard-typing-og.jpg` ✅
- `/images/og/qr-code-reader-og.jpg` ✅

---

## 🎯 Tools List (All Pages To Update)

**Keyboard Tools (9):**
- keyboard_typing_test.php
- keyboard_tester_arabic.php
- keyboard_tester_different_languages.php
- keyboard_tester_french.php
- keyboard_tester_german.php
- keyboard_tester_japanese.php
- keyboard_tester_korean_index.php
- keyboard_tester_portuguese.php
- keyboard_tester_russian.php
- keyboard_tester_spanish.php

**Mouse Tools (5):**
- mouse-test.php
- mouse_speed_tester.php
- mouse_sensitivity_DPI_tester.php
- mouse-trail-index.php
- click_speed_test.php

**Testing Tools (8):**
- ghost-click-detector.php
- mic-tester.php
- headphone_speaker_tester_index.php
- webcamtesterindex.php
- screentestindex.php
- latency-checker.php
- luckywheeltoolindex.php
- qr-code-reader.php

**Utility Tools (4):**
- QR_code_generator_scanner.php
- ocr-tool.php
- auto-password-generator.php
- whatsapp-link-generator.php
- whatsapp-Brand-link-generator.php
- whatsapp-sentiment-analyzer.php

**Total: 20+ pages to update**

---

## 💡 Common SEO Mistakes to Avoid

❌ **DON'T:**
- Use multiple H1s per page
- Skip heading levels (H2 → H4)
- Write title/description for Google instead of users
- Copy same description for multiple pages
- Forget alt text on images
- Use generic alt text ("image", "picture")
- Stuff keywords into description
- Make title too short (under 30 chars) or too long (over 70 chars)

✅ **DO:**
- Write for users first, SEO second
- Make each page unique
- Use descriptive, natural-sounding alt text
- Include primary keyword in title
- Front-load keyword in description
- Create compelling descriptions that drive clicks
- Test on different browsers and devices
- Run Lighthouse audit regularly

---

## 🚀 Quick Implementation (5 Steps Per Tool)

1. **Copy Template**
   - Open `mouse-test-modular-example.php`
   - Save as `your-tool.php`

2. **Update Meta Tags**
   - Title (50-60 chars)
   - Description (150-160 chars)
   - Keywords (5-8 terms)
   - og:* tags

3. **Update Content**
   - H1 heading
   - Intro paragraph
   - Tool UI code
   - Image alt text

4. **Create Guidelines**
   - Copy `tools/mouse-test-guidelines.php`
   - Save as `tools/your-tool-guidelines.php`
   - Update sections with your content

5. **Test**
   - Open page in browser
   - Check mobile responsiveness
   - Run Lighthouse audit
   - Verify all links working

---

## 📞 Reference Files

- **Complete Example:** `mouse-test-modular-example.php`
- **Guidelines Template:** `tools/mouse-test-guidelines.php`
- **Implementation Guide:** `IMPLEMENTATION_GUIDE.md`
- **Architecture Docs:** `MODULAR_STRUCTURE.md`

---

**Last Updated:** 2024  
**Status:** Ready to Implement  
**Version:** 1.0
