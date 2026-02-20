# Internal Linking Map - KeyboardTester.click

## Overview
This document outlines the internal linking strategy for improving SEO authority flow across tool pages.

## Tool Categories

### Input Device Tools
- **Keyboard Tester** (`index.php`) - Main keyboard testing
- **Mouse Tester** (`mouse-test.php`) - Button and scroll testing
- **Microphone Tester** (`mic-tester.php`) - Audio input testing

### Mouse Diagnostic Tools
- **Ghost Click Detector** (`ghost-click-detector.php`) - Double-click issues
- **Mouse DPI Tester** (`mouse_sensitivity_DPI_tester.php`) - Sensitivity testing
- **Click Speed Test** (`mouse_speed_tester.php`) - CPS measurement
- **Mouse Trail** (`mouse-trail.php`) - Movement visualization

### Audio Tools
- **Microphone Tester** (`mic-tester.php`) - Input testing
- **Headphone/Speaker Tester** (`headphone_speaker_tester_index.php`) - Output testing

## Related Tools Map

Each page shows 5 related tools based on category relevance:

| Page | Related Tools (in order) |
|------|-------------------------|
| Keyboard Tester | Mouse, Typing Speed, Latency, Mic, Ghost Click |
| Mouse Tester | Ghost Click, DPI, CPS, Mouse Trail, Keyboard, Latency |
| Ghost Click Detector | Mouse, DPI, CPS, Mouse Trail, Latency |
| Mouse DPI Tester | Mouse, Ghost Click, CPS, Mouse Trail, Latency |
| Click Speed Test | Ghost Click, Mouse, DPI, Typing Speed, Latency |
| Mic Tester | Headphone, Webcam, Keyboard, Latency, Typing |

## Contextual Internal Links

### Ghost Click SEO Content
- Links to: Mouse Tester (3x), Mouse DPI, Click Speed

### Mouse DPI SEO Content
- Links to: Mouse Tester (2x), Ghost Click, Click Speed

### Click Speed SEO Content
- Links to: Mouse Tester, Ghost Click, Mouse DPI

### Mouse Test SEO Content
- Links to: Ghost Click (2x), Mouse DPI (2x)

### Keyboard Tester SEO Content
- Links to: Mouse Tester, Mic Tester

### Mic Tester SEO Content
- Links to: Headphone/Speaker, Keyboard, Mouse Tester

## Link Format Guidelines

### Anchor Text Examples
- `test keyboard keys online`
- `test mouse buttons and scroll`
- `detect phantom mouse clicks`
- `check mouse DPI and sensitivity`
- `measure clicks per second`
- `test microphone input online`

### Link Placement Rules
1. Place contextual links naturally within paragraphs
2. Use descriptive anchor text (not "click here")
3. Limit to 2-4 contextual links per article
4. Related Tools section adds 5 more links at bottom

## Components

### `/includes/related-tools.php`
Dynamic component that:
- Auto-detects current page
- Shows 5 contextually related tools
- Uses keyword-rich anchor text
- Includes short descriptions
- Fully crawlable `<a href="">` links

### Integration
Add to each main page before the help guide:
```php
<?php $currentTool = 'tool-key'; include 'includes/related-tools.php'; ?>
```

Tool keys: `keyboard`, `mouse`, `ghost-click`, `dpi`, `cps`, `mic`

## Files Modified

### New Files
- `includes/related-tools.php` - Related tools component

### Updated SEO Content Files
- `help/seo-content/ghost-click.php` - +4 internal links
- `help/seo-content/mouse-dpi.php` - +4 internal links
- `help/seo-content/click-speed.php` - +3 internal links
- `help/seo-content/mouse-test.php` - +4 internal links
- `help/seo-content/keyboard-tester.php` - +3 internal links
- `help/seo-content/mic-tester.php` - +3 internal links

### Updated Main Pages
- `index.php` - Added related-tools include
- `mouse-test.php` - Added related-tools include
- `ghost-click-detector.php` - Added related-tools include
- `mouse_sensitivity_DPI_tester.php` - Added related-tools include
- `mouse_speed_tester.php` - Added related-tools include
- `mic-tester.php` - Added related-tools include

## SEO Benefits

1. **Authority Flow** - Links pass PageRank between related pages
2. **User Engagement** - Visitors discover more tools
3. **Crawlability** - Search engines follow internal links
4. **Topical Clusters** - Mouse tools link together, keyboard tools link together
5. **Anchor Text Signals** - Descriptive text helps rankings

## Maintenance

When adding new tools:
1. Add entry to `$allTools` array in `related-tools.php`
2. Add relationships in `$relatedToolsMap` array
3. Add script name mapping in `$scriptToKey` array
4. Add contextual links in SEO content file
5. Update this documentation
