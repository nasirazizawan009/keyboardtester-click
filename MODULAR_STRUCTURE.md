# KeyboardTester.Click - Modular Project Structure

## Architecture Overview

### 1. **Modular File Organization**

Each tool follows this pattern:

```
├── tools/
│   ├── [tool-name]-tool.php        # Tool UI/functionality
│   └── [tool-name]-guidelines.php  # Help & guidelines content
├── [tool-name].php                 # Main wrapper (includes all components)
└── [tool-name]-index.php           # Alternative index version if needed
```

### 2. **Page Structure Template**

Every page follows this symmetric structure:

```
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- SEO Meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="...">
  <meta name="keywords" content="...">
  <meta name="author" content="KeyboardTester.Click">
  
  <!-- Open Graph Tags (Social Media) -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="...">
  <meta property="og:description" content="...">
  <meta property="og:image" content="...">
  <meta property="og:url" content="...">
  
  <!-- Twitter Card Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="...">
  <meta name="twitter:description" content="...">
  <meta name="twitter:image" content="...">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="...">
  
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="navigation.png">
  
  <!-- CSS -->
  <style>...</style>
</head>
<body>
  <!-- 1. SHARED HEADER -->
  <?php include 'header.php'; ?>

  <!-- 2. TOOL CONTENT (Main Tool UI) -->
  <main>
    <?php include 'tools/[tool-name]-tool.php'; ?>
  </main>

  <!-- 3. GUIDELINES/HELP (Separate Modular File) -->
  <section id="guidelines">
    <?php include 'tools/[tool-name]-guidelines.php'; ?>
  </section>

  <!-- 4. TOOLS LIST (Shared Across All Pages) -->
  <?php include 'tools.php'; ?>

  <!-- 5. SHARED FOOTER -->
  <?php include 'footer.php'; ?>

  <!-- JavaScript -->
  <script>...</script>
</body>
</html>
```

### 3. **SEO Best Practices**

#### Heading Hierarchy
- **H1**: One per page - Tool name (e.g., "Keyboard Tester")
- **H2**: Main sections (e.g., "How to Use", "Features")
- **H3**: Subsections (e.g., "Special Keys Testing", "FAQs")

#### Meta Tags Required
- `description`: 150-160 characters, compelling, with keywords
- `keywords`: 5-10 relevant keywords
- `og:image`: 1200x630px social media preview
- `canonical`: Prevent duplicate content issues

#### Image Alt Text
- All `<img>` tags must have `alt="descriptive text"`
- All `<svg>` should have `<title>` and `<desc>`
- Alt text should be descriptive, not just "image"

### 4. **Guidelines File Structure**

**File: tools/[tool-name]-guidelines.php**

```php
<div class="guidelines" id="guidelines">
  <h2>📜 Help & Guidelines</h2>
  <p>Welcome to the [Tool Name]! Here's how to use it effectively:</p>

  <h3>🛠️ How to Use</h3>
  <!-- Instructions -->

  <h3>🔍 Features</h3>
  <!-- Feature details -->

  <h3>❓ FAQs</h3>
  <!-- Common questions -->

  <h3>💡 Tips & Tricks</h3>
  <!-- Additional tips -->
</div>
```

### 5. **Config.php Updates**

Centralized tool mapping with SEO data:

```php
$tools = [
  'mouse_test' => [
    'name' => 'Mouse Tester',
    'url' => url('mouse-test.php'),
    'description' => 'Test all mouse buttons...',
    'keywords' => 'mouse tester, click test...',
    'category' => 'mouse',
    'icon' => '🖱️',
    'og_image' => url('images/mouse-test-og.jpg'),
  ],
  // ... more tools
];
```

### 6. **Image Organization**

```
├── images/
│   ├── og/               # OpenGraph social media images (1200x630)
│   │   ├── mouse-test-og.jpg
│   │   ├── keyboard-tester-og.jpg
│   │   └── ...
│   ├── icons/            # Tool icons
│   │   ├── mouse.svg
│   │   ├── keyboard.svg
│   │   └── ...
│   └── screenshots/      # Tool demonstrations
│       └── ...
```

### 7. **CSS Organization**

Modular CSS files:
- `css/base.css` - Global styles
- `css/components.css` - Reusable components
- `css/tools.css` - Tool-specific styles
- `css/responsive.css` - Mobile/responsive

### 8. **File Naming Convention**

- **Main files**: `[tool-name].php` (e.g., `mouse-test.php`)
- **Tool component**: `tools/[tool-name]-tool.php`
- **Guidelines**: `tools/[tool-name]-guidelines.php`
- **Index versions**: `[tool-name]-index.php` (for index-style pages)

### 9. **Symmetry Checklist**

Every tool should have:
- ✅ H1 title (tool name)
- ✅ Tool description paragraph
- ✅ Main H2 section for tool UI
- ✅ Guidelines section with H2 "Help & Guidelines"
- ✅ Consistent CSS styling
- ✅ SEO meta tags
- ✅ Social media meta tags
- ✅ Canonical URLs
- ✅ Image alt text

### 10. **Implementation Priority**

1. **Phase 1**: Create modular guidelines files
2. **Phase 2**: Add comprehensive SEO meta tags
3. **Phase 3**: Add image alt text and labels
4. **Phase 4**: Fix heading hierarchy
5. **Phase 5**: Create unified CSS (optional cleanup)

## Example: Mouse Test Modular Structure

### File: mouse-test.php (Main Wrapper)
```php
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Test your mouse buttons, scroll wheel, and functionality...">
  <!-- ... other meta tags ... -->
</head>
<body>
  <?php include 'header.php'; ?>
  <main>
    <?php include 'tools/mouse-test-tool.php'; ?>
  </main>
  <?php include 'tools/mouse-test-guidelines.php'; ?>
  <?php include 'tools.php'; ?>
  <?php include 'footer.php'; ?>
</body>
</html>
```

### File: tools/mouse-test-tool.php (Tool UI)
```php
<section class="tool-section">
  <h1>🖱️ Mouse Tester</h1>
  <p>Test all mouse buttons, scroll wheel, and movement detection.</p>
  
  <!-- Tool UI -->
  <div class="mouse-tester">
    <!-- ... tool content ... -->
  </div>
</section>
```

### File: tools/mouse-test-guidelines.php (Help)
```php
<section class="guidelines" id="guidelines">
  <h2>📜 Help & Guidelines</h2>
  
  <h3>🛠️ How to Use</h3>
  <p>Click any mouse button...</p>
  
  <h3>❓ FAQs</h3>
  <!-- ... -->
</section>
```

## Benefits of This Structure

1. **Modularity**: Reusable components, easy to maintain
2. **Consistency**: Same structure across all tools
3. **SEO**: Proper heading hierarchy, meta tags, alt text
4. **Performance**: Can load guidelines separately if needed
5. **Accessibility**: Proper structure for screen readers
6. **Scalability**: Easy to add new tools following the pattern
