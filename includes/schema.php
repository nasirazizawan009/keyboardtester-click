<?php
/**
 * JSON-LD Schema Markup Generator
 * Centralized schema generation for SEO structured data
 *
 * Usage:
 *   include 'includes/schema.php';
 *   echo schemaOrganization();
 *   echo schemaWebSite();
 *   echo schemaWebApplication($toolData);
 *   echo schemaBreadcrumbs($breadcrumbs);
 *   echo schemaFAQ($faqs);
 */

// Ensure config is loaded
if (!function_exists('absoluteUrl')) {
    include_once __DIR__ . '/../config.php';
}

/**
 * Output a JSON-LD script block
 */
function schemaBlock($data) {
    return '<script type="application/ld+json">' . "\n" .
           json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) .
           "\n</script>\n";
}

/**
 * Organization Schema - Use on every page (sitewide)
 * Establishes brand identity for Google Knowledge Panel
 */
function schemaOrganization() {
    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'KeyboardTester.Click',
        'url' => 'https://keyboardtester.click/',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => absoluteUrl('images/shared/keyboard-and-mouse.png'),
            'width' => 512,
            'height' => 512
        ],
        'description' => 'Free online tools to test keyboards, mice, webcams, microphones, and screens. No downloads required.',
        'foundingDate' => '2024',
        'sameAs' => [
            'https://gitlab.com/nasirazizawan/keyboardtester.click',
            'https://github.com/nasirazizawan009/keyboardtester-click',
            'https://www.youtube.com/@KeyboardTester-dot-click',
            'https://www.facebook.com/keyboardtester.click'
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'contactType' => 'customer support',
            'url' => absoluteUrl('feedback.php'),
            'availableLanguage' => ['English', 'Arabic', 'Spanish', 'French', 'German', 'Portuguese', 'Russian', 'Japanese', 'Korean']
        ]
    ];
    return schemaBlock($data);
}

/**
 * WebSite Schema - Use on homepage
 * Enables sitelinks search box in Google
 */
function schemaWebSite() {
    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        '@id' => 'https://keyboardtester.click/#website',
        'name' => 'KeyboardTester.Click',
        'alternateName' => ['Keyboard Tester', 'KBT', 'KeyboardTester'],
        'url' => 'https://keyboardtester.click/',
        'description' => 'Free online tools to test keyboards, mice, screens, audio, and more — no download required.',
        'inLanguage' => 'en',
        'publisher' => [
            '@type' => 'Organization',
            '@id' => 'https://keyboardtester.click/#organization',
            'name' => 'KeyboardTester.Click',
            'url' => 'https://keyboardtester.click/'
        ]
    ];
    return schemaBlock($data);
}

/**
 * Site Navigation Schema - Use on homepage only
 * Tells Google the main tools/categories for sitelinks
 */
function schemaSiteNavigation() {
    $base = 'https://keyboardtester.click/';
    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'ItemList',
        'name' => 'KeyboardTester.Click — Free Online Testing Tools',
        'description' => 'Test keyboards, mice, screens, audio, and more — free, browser-based, no download required.',
        'url' => $base,
        'itemListElement' => [
            [
                '@type' => 'SiteNavigationElement',
                'position' => 1,
                'name' => 'Keyboard Tester',
                'description' => 'Test every key on your keyboard — ghosting check, heatmap, and N-key rollover',
                'url' => $base
            ],
            [
                '@type' => 'SiteNavigationElement',
                'position' => 2,
                'name' => 'Typing Speed Test',
                'description' => 'Measure your typing speed and accuracy in words per minute (WPM)',
                'url' => $base . 'keyboard_typing_test.php'
            ],
            [
                '@type' => 'SiteNavigationElement',
                'position' => 3,
                'name' => 'Mouse Test',
                'description' => 'Test all mouse buttons, scroll wheel, and pointer accuracy online',
                'url' => $base . 'mouse-test.php'
            ],
            [
                '@type' => 'SiteNavigationElement',
                'position' => 4,
                'name' => 'Click Speed Test',
                'description' => 'Measure your clicks per second (CPS) and reaction time',
                'url' => $base . 'mouse_speed_tester.php'
            ],
            [
                '@type' => 'SiteNavigationElement',
                'position' => 5,
                'name' => 'Dead Pixel Test',
                'description' => 'Test your monitor for dead, stuck, or hot pixels online',
                'url' => $base . 'screentestindex.php'
            ],
            [
                '@type' => 'SiteNavigationElement',
                'position' => 6,
                'name' => 'Microphone Test',
                'description' => 'Test your microphone online — check if your mic is working',
                'url' => $base . 'mic-tester.php'
            ],
            [
                '@type' => 'SiteNavigationElement',
                'position' => 7,
                'name' => 'Webcam Test',
                'description' => 'Test your webcam online — check video feed and resolution',
                'url' => $base . 'webcamtesterindex.php'
            ],
            [
                '@type' => 'SiteNavigationElement',
                'position' => 8,
                'name' => 'All Tools',
                'description' => 'Browse all free online testing tools — keyboards, mice, screens, audio, and utilities',
                'url' => $base . 'pages/all-tools.php'
            ]
        ]
    ];
    return schemaBlock($data);
}

/**
 * WebApplication Schema - Use on tool pages
 *
 * @param array $tool Tool configuration with keys:
 *   - name: Tool name
 *   - description: Tool description
 *   - url: Tool URL (relative or absolute)
 *   - category: Application category (default: UtilityApplication)
 *   - features: Array of feature strings
 *   - screenshot: Screenshot image path (optional)
 */
function schemaWebApplication($tool) {
    $url = isset($tool['url']) ? $tool['url'] : '';
    if ($url && !preg_match('~^https?://~i', $url)) {
        $url = absoluteUrl(ltrim($url, '/'));
    }

    $screenshot = isset($tool['screenshot']) ? $tool['screenshot'] : null;
    $screenshotMeta = null;
    if ($screenshot && !preg_match('~^https?://~i', $screenshot)) {
        $screenshotMeta = getLocalImageMeta($screenshot);
        $screenshot = $screenshotMeta['url'] ?? absoluteUrl(ltrim($screenshot, '/'));
    }

    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'WebApplication',
        'name' => $tool['name'] ?? 'Testing Tool',
        'description' => $tool['description'] ?? '',
        'url' => $url,
        'applicationCategory' => $tool['category'] ?? 'UtilityApplication',
        'operatingSystem' => 'Any',
        'browserRequirements' => 'Requires JavaScript',
        'isAccessibleForFree' => true,
        'offers' => [
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'USD',
            'availability' => 'https://schema.org/InStock',
            'description' => 'Free to use — no account or download required'
        ],
        'provider' => [
            '@type' => 'Organization',
            '@id' => 'https://keyboardtester.click/#organization',
            'name' => 'KeyboardTester.Click',
            'url' => 'https://keyboardtester.click/'
        ]
    ];

    if (!empty($tool['features'])) {
        $data['featureList'] = $tool['features'];
    }

    if ($screenshot) {
        $data['screenshot'] = $screenshot;
        $data['image'] = $screenshotMeta !== null
            ? array_filter([
                '@type' => 'ImageObject',
                'url' => $screenshot,
                'width' => $screenshotMeta['width'] ?? null,
                'height' => $screenshotMeta['height'] ?? null,
            ])
            : $screenshot;
    }

    return schemaBlock($data);
}

/**
 * BreadcrumbList Schema - Use on all pages
 *
 * @param array $breadcrumbs Array of breadcrumb items:
 *   [['name' => 'Home', 'url' => '/'], ['name' => 'Tools', 'url' => '/tools.php'], ...]
 *   Last item should have empty url for current page
 */
function schemaBreadcrumbs($breadcrumbs) {
    $items = [];
    $position = 1;

    foreach ($breadcrumbs as $crumb) {
        $item = [
            '@type' => 'ListItem',
            'position' => $position,
            'name' => $crumb['name']
        ];

        // Add URL for all except current page (last item with empty url)
        if (!empty($crumb['url'])) {
            $url = $crumb['url'];
            if (!preg_match('~^https?://~i', $url)) {
                $url = absoluteUrl(ltrim($url, '/'));
            }
            $item['item'] = $url;
        }

        $items[] = $item;
        $position++;
    }

    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $items
    ];

    return schemaBlock($data);
}

/**
 * FAQPage Schema - Use on pages with FAQ content
 *
 * @param array $faqs Array of FAQ items:
 *   [['question' => 'How do I...?', 'answer' => 'You can...'], ...]
 */
function schemaFAQ($faqs) {
    $items = [];

    foreach ($faqs as $faq) {
        $items[] = [
            '@type' => 'Question',
            'name' => $faq['question'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['answer']
            ]
        ];
    }

    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $items
    ];

    return schemaBlock($data);
}

/**
 * SoftwareApplication Schema - Alternative for downloadable tools
 * (Not used currently, but available for future)
 */
function schemaSoftwareApplication($app) {
    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'SoftwareApplication',
        'name' => $app['name'] ?? '',
        'description' => $app['description'] ?? '',
        'applicationCategory' => $app['category'] ?? 'UtilityApplication',
        'operatingSystem' => $app['os'] ?? 'Web Browser',
        'offers' => [
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'USD'
        ]
    ];
    return schemaBlock($data);
}

/**
 * HowTo Schema - For step-by-step guides
 *
 * @param array $howto HowTo configuration:
 *   - name: Title of the how-to
 *   - description: Brief description
 *   - steps: Array of ['name' => 'Step title', 'text' => 'Step description']
 *   - totalTime: ISO 8601 duration (e.g., 'PT5M' for 5 minutes)
 */
function schemaHowTo($howto) {
    $steps = [];
    $position = 1;

    foreach ($howto['steps'] as $step) {
        $steps[] = [
            '@type' => 'HowToStep',
            'position' => $position,
            'name' => $step['name'],
            'text' => $step['text']
        ];
        $position++;
    }

    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'HowTo',
        'name' => $howto['name'] ?? '',
        'description' => $howto['description'] ?? '',
        'step' => $steps
    ];

    if (!empty($howto['totalTime'])) {
        $data['totalTime'] = $howto['totalTime'];
    }

    return schemaBlock($data);
}

// ============================================
// PREDEFINED TOOL SCHEMAS
// ============================================

/**
 * Get predefined schema data for known tools
 */
function getToolSchemaData($toolKey) {
    $tools = [
        'keyboard_tester' => [
            'name' => 'Online Keyboard Tester',
            'description' => 'Free online keyboard tester to check every key, detect stuck keys, test ghosting, and verify keyboard functionality. Works with all keyboard types and layouts.',
            'url' => '/',
            'category' => 'UtilityApplication',
            'screenshot' => 'images/keyboard/hero-keyboard-test-1400.png',
            'features' => [
                'Test every keyboard key',
                'Detect stuck or broken keys',
                'Test keyboard ghosting',
                'Multiple layout support (QWERTY, AZERTY, Dvorak, Colemak)',
                'Key press history tracking',
                'Real-time visual feedback'
            ]
        ],
        'mouse_tester' => [
            'name' => 'Online Mouse Tester',
            'description' => 'Free online mouse tester to check left, right, middle clicks and scroll wheel functionality in your browser.',
            'url' => 'mouse-test.php',
            'category' => 'UtilityApplication',
            'screenshot' => 'images/mouse/mouse-tester-workstation-1400.png',
            'features' => [
                'Left, right, and middle click detection',
                'Scroll wheel testing',
                'Live button status',
                'Click counters'
            ]
        ],
        'mouse_accuracy' => [
            'name' => 'Online Mouse Accuracy Test',
            'description' => 'Free online mouse accuracy test and aim trainer. Measure click accuracy, average pixel error, and reaction time on every target.',
            'url' => 'mouse-accuracy-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Hit percentage measurement',
                'Average pixel error per click',
                'Reaction time per target',
                'Configurable session length and target size'
            ]
        ],
        'mouse_drag' => [
            'name' => 'Mouse Drag Click Test',
            'description' => 'Free online mouse drag click test. Measure drag-click CPS, peak burst rate, and total clicks. Built for Minecraft PvP and competitive clicking.',
            'url' => 'mouse-drag-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Average CPS calculation',
                'Peak CPS tracking',
                '200ms drag burst detection',
                'Live click timeline graph'
            ]
        ],
        'right_click_cps' => [
            'name' => 'Right Click CPS Test',
            'description' => 'Free right click CPS test. Measure right-mouse-button clicks per second with browser context menu suppressed.',
            'url' => 'right-click-cps-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Right-click only tracking',
                'Peak CPS measurement',
                'Context menu suppression',
                'Local best score storage'
            ]
        ],
        'keyboard_double_click' => [
            'name' => 'Keyboard Double Click Test',
            'description' => 'Free keyboard chatter detector. Find keys that register twice from a single press with configurable threshold.',
            'url' => 'keyboard-double-click-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Per-key chatter statistics',
                'Configurable 30-150ms threshold',
                'Minimum gap tracking',
                'OS key repeat filtering'
            ]
        ],
        'keyboard_polling_rate' => [
            'name' => 'Keyboard Polling Rate Test',
            'description' => 'Free keyboard polling rate test. Estimate keyboard Hz using browser auto-repeat timing measurement.',
            'url' => 'keyboard-polling-rate-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Auto-repeat interval sampling',
                'Average and minimum interval',
                'Estimated Hz calculation',
                'Live sample counter'
            ]
        ],
        'monitor_gamma' => [
            'name' => 'Monitor Gamma Test',
            'description' => 'Free online monitor gamma test using stripe-blend pattern. Visually measure your monitor gamma against the sRGB 2.2 target.',
            'url' => 'monitor-gamma-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Stripe-blend visual pattern',
                'Adjustable gamma slider 1.0-3.0',
                'Fullscreen mode',
                'sRGB 2.2 target reference'
            ]
        ],
        'monitor_ghosting' => [
            'name' => 'Monitor Ghosting Test',
            'description' => 'Free online monitor ghosting test. Detect pixel response time issues with adjustable-speed moving box on multiple color backgrounds.',
            'url' => 'monitor-ghosting-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Adjustable speed 100-3000 px/sec',
                'Multiple box and background colors',
                'Fullscreen mode',
                'Detects overdrive overshoot'
            ]
        ],
        'black_level' => [
            'name' => 'Black Level Test',
            'description' => 'Free online black level / crushed blacks test. Check whether your monitor preserves shadow detail with 32 near-black patches.',
            'url' => 'black-level-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                '32 near-black patches RGB 1-32',
                'Fullscreen mode',
                'Detects limited RGB range',
                'Detects crushed shadows'
            ]
        ],
        'white_level' => [
            'name' => 'White Level Test',
            'description' => 'Free online white level / clipped highlights test. Check whether your monitor preserves highlight detail with 32 near-white patches.',
            'url' => 'white-level-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                '32 near-white patches RGB 223-254',
                'Fullscreen mode',
                'Detects HDR/contrast clipping',
                'Detects loss of highlight detail'
            ]
        ],
        'brightness' => [
            'name' => 'Monitor Brightness Test',
            'description' => 'Free online monitor brightness test. 11-step grayscale ladder reveals brightness, contrast, and gamma misconfiguration.',
            'url' => 'brightness-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                '11-step calibration ladder 0-100%',
                'Fullscreen mode',
                'Detects brightness misconfiguration',
                'Detects gamma issues'
            ]
        ],
        'contrast' => [
            'name' => 'Monitor Contrast Test',
            'description' => 'Free online monitor contrast test. Black-and-white checkerboard beside 50% gray reveals contrast and gamma misconfiguration.',
            'url' => 'contrast-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Checkerboard pattern vs solid gray',
                'Squint test for visual match',
                'Detects gamma calibration issues',
                'Fullscreen mode'
            ]
        ],
        'webrtc_leak' => [
            'name' => 'WebRTC Leak Test',
            'description' => 'Free WebRTC leak test. Detect IP address leaks through your browser even when using a VPN. Checks IPv4, IPv6, and local IPs.',
            'url' => 'webrtc-leak-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'IPv4 detection',
                'IPv6 detection',
                'Local network IP detection',
                'VPN bypass check'
            ]
        ],
        'mouse_dpi_calc' => [
            'name' => 'Mouse DPI Calculator',
            'description' => 'Free mouse DPI calculator. Measure your real mouse DPI by dragging a known physical distance or entering pixels and inches manually. Verify advertised vs true sensor DPI.',
            'url' => 'mouse-dpi-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Drag-to-measure pixel tracking',
                'Manual pixel + inch input',
                'Advertised vs real DPI comparison',
                'cm and inch unit support'
            ]
        ],
        'fov_calc' => [
            'name' => 'FoV Calculator',
            'description' => 'Free field of view calculator. Convert horizontal, vertical and diagonal FoV across 4:3, 16:9, 21:9 and 32:9 aspect ratios for CS2, Valorant, Apex, CoD and other FPS games.',
            'url' => 'fov-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Horizontal / vertical / diagonal conversion',
                'All common aspect ratios',
                'Game presets (CS2, Valorant, Apex, CoD, Fortnite, Overwatch)',
                'Hor+ scaling (matches modern FPS engines)'
            ]
        ],
        'crosshair_gen' => [
            'name' => 'Crosshair Generator',
            'description' => 'Free crosshair generator. Design a custom crosshair with live preview, download PNG overlay, and copy CS2 console command or Valorant settings values.',
            'url' => 'crosshair-generator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Live canvas preview',
                'CS2 console command export',
                'Valorant settings values',
                'Transparent PNG overlay download',
                'Pro presets (s1mple, TenZ, Valorant default)'
            ]
        ],
        'mouse_drift' => [
            'name' => 'Mouse Drift Test',
            'description' => 'Free mouse drift test. Detect idle cursor drift and sensor jitter by sampling pointer events for up to 3 minutes while the mouse sits still.',
            'url' => 'mouse-drift-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Pixel-accurate pointer sampling',
                'Configurable 10s to 3-min runs',
                'Pass/fail drift verdict',
                'Total drift + max delta + sample count'
            ]
        ],
        'mouse_accel' => [
            'name' => 'Mouse Acceleration Test',
            'description' => 'Free mouse acceleration test. Compare pixel travel on a slow vs fast swipe of the same physical distance to detect Windows pointer acceleration or firmware-level sensor acceleration.',
            'url' => 'mouse-speed-acceleration-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Slow vs fast swipe comparison',
                'Pixel / speed / duration breakdown',
                'Fast/slow ratio verdict',
                'Catches OS and driver acceleration'
            ]
        ],
        'ppi_calc' => [
            'name' => 'PPI Calculator',
            'description' => 'Free pixels-per-inch calculator. Compute PPI, dot pitch, aspect ratio and total megapixels for any display from resolution and diagonal size.',
            'url' => 'ppi-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'PPI from resolution + diagonal',
                'Dot pitch in millimeters',
                'Auto aspect ratio',
                'Retina / density tier classification',
                'Built-in monitor, laptop and phone presets'
            ]
        ],
        'aspect_calc' => [
            'name' => 'Aspect Ratio Calculator',
            'description' => 'Free aspect ratio calculator. Type any two of width, height, or ratio. Auto-simplifies to lowest integer terms and renders a live preview.',
            'url' => 'aspect-ratio-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Solve for width, height, or ratio',
                'Auto-simplify to lowest integer terms',
                'Decimal and colon forms',
                'Orientation detection',
                'Live scaled preview box'
            ]
        ],
        'screen_size_calc' => [
            'name' => 'Screen Size Calculator',
            'description' => 'Free screen size calculator. Enter aspect ratio plus any one of diagonal, width, or height and the tool computes the other two in inches and centimeters, plus visible area.',
            'url' => 'screen-size-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Diagonal / width / height solver',
                'Inches and cm units',
                'Visible area in square inches and cm',
                'All common aspect ratios (16:9, 21:9, 4:3, 32:9)'
            ]
        ],
        'view_dist_calc' => [
            'name' => 'Viewing Distance Calculator',
            'description' => 'Free viewing distance calculator. Enter screen size and resolution to get THX, SMPTE, and 4K UHD optimal viewing distances for TVs and monitors.',
            'url' => 'viewing-distance-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'THX immersive (36° FoV) recommendation',
                'SMPTE cinema (30° FoV) recommendation',
                '4K / 8K resolving-limit distance',
                'Feet and meters output'
            ]
        ],
        'fps_test' => [
            'name' => 'FPS Test',
            'description' => 'Free FPS test. Measures browser frame rate live using requestAnimationFrame. Reports current, average, min, max, 1% low, and infers display refresh rate.',
            'url' => 'fps-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Live FPS via requestAnimationFrame',
                'Avg, min, max, and 1% low metrics',
                'Display refresh-rate inference (60 / 120 / 144 / 165 / 240 Hz)',
                'Frame-count and uptime counters'
            ]
        ],
        'resolution_test' => [
            'name' => 'Screen Resolution Test',
            'description' => 'Free screen resolution test. Reports display resolution (CSS and native), device pixel ratio, color depth, color gamut, viewport size, orientation, and aspect ratio.',
            'url' => 'resolution-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Native pixel resolution (CSS x DPR)',
                'Device pixel ratio',
                'Color depth and color gamut',
                'Viewport and orientation',
                'Live updates on resize'
            ]
        ],
        'apm_test' => [
            'name' => 'APM Test',
            'description' => 'Free actions-per-minute test. Counts every keystroke and mouse click over a rolling 60-second window for RTS, MOBA, and esports training.',
            'url' => 'apm-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Live APM on a 60-second rolling window',
                'Peak APM tracking',
                'Session average',
                'Clicks vs key-press split',
                'StarCraft/DotA/LoL tier reference'
            ]
        ],
        'mouse_spin' => [
            'name' => 'Mouse Spin Test',
            'description' => 'Free mouse spin test. Counts full 360-degree rotations over a fixed time window, reports peak spins-per-second and direction (clockwise or counter-clockwise).',
            'url' => 'mouse-spin-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Cumulative angle tracking via pointermove',
                'Peak spins-per-second',
                '15 / 30 / 60 second rounds',
                'Direction indicator (CW / CCW)'
            ]
        ],
        'burn_in' => [
            'name' => 'OLED Burn-In Test',
            'description' => 'Free OLED and plasma burn-in test. Cycle solid colors, fine checkerboard, and scrolling pixel-refresher patterns fullscreen to detect image retention.',
            'url' => 'burn-in-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                '8-color solid cycle (WKRGB + CMY)',
                'Fine checkerboard for stuck subpixels',
                'Scrolling pixel refresher for OLED recovery',
                'Auto-advance timers + fullscreen'
            ]
        ],
        'color_range' => [
            'name' => 'Color Range Test',
            'description' => 'Free color range test. Detect whether your display is running Full RGB (0-255) or Limited / TV range (16-235) via near-black and near-white patch grids.',
            'url' => 'color-range-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                '32 near-black patches (RGB 0-31)',
                '32 near-white patches (RGB 224-255)',
                'Continuous 0-255 ramp',
                'Fullscreen toggle'
            ]
        ],
        'screen_uniformity' => [
            'name' => 'Screen Uniformity Test',
            'description' => 'Free screen uniformity test. Fullscreen gray, black, white, or primary colors with adjustable brightness to reveal LCD clouding, IPS glow, backlight bleed, and tint drift.',
            'url' => 'screen-uniformity-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Mid-gray, near-black, white, RGB primaries',
                '0-100% brightness slider',
                'Fullscreen with arrow-key brightness control',
                'Reveals clouding, IPS glow, bleed, tint drift'
            ]
        ],
        'sound_test' => [
            'name' => 'Sound Test',
            'description' => 'Free online sound test. Verify left, right, and both stereo channels, ping-pong A/B, and sweep 100 Hz to 10 kHz to check the usable frequency range of any speaker or headphone.',
            'url' => 'sound-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Left / right / both / ping-pong channels',
                'Frequency slider 40 Hz to 12 kHz',
                'Log sweep 100 Hz to 10 kHz',
                'Volume control 0-100%'
            ]
        ],
        'bass_test' => [
            'name' => 'Bass Test',
            'description' => 'Free online bass test. Sweep 20 Hz to 200 Hz, step through ISO bass presets, or hold a single tone to verify subwoofers, studio monitors, and bass-capable headphones.',
            'url' => 'bass-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Log sweep 20 Hz to 200 Hz',
                'ISO 1/3-octave bass presets',
                'Hold-a-tone mode',
                'Sub-bass (20-40 Hz) indicator'
            ]
        ],
        'frequency_response' => [
            'name' => 'Frequency Response Test',
            'description' => 'Free online frequency response and hearing test. Sweep 20 Hz to 20 kHz to find your personal audible range and check speaker/headphone roll-off.',
            'url' => 'frequency-response-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Log sweep 20 Hz to 20 kHz',
                'Hearing-limit logger',
                'Manual tone slider',
                'Age-typical ceiling estimate'
            ]
        ],
        'accelerometer_test' => [
            'name' => 'Accelerometer Test',
            'description' => 'Free online accelerometer test. Live X/Y/Z acceleration in m/s² with tilt-ball visualizer, shake counter, and peak-g tracking using the DeviceMotion API.',
            'url' => 'accelerometer-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Live X/Y/Z readout in m/s²',
                'Tilt-ball visualizer',
                'Shake detection counter',
                'Peak acceleration tracking'
            ]
        ],
        'gyroscope_test' => [
            'name' => 'Gyroscope Test',
            'description' => 'Free online gyroscope test. Live alpha/beta/gamma rotation readout with 3D orientation cube, compass ring, and calibrate-to-zero using the DeviceOrientation API.',
            'url' => 'gyroscope-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Alpha / beta / gamma readout',
                '3D cube orientation mirror',
                'Compass ring for alpha heading',
                'Calibrate-to-zero reference'
            ]
        ],
        'vibration_test' => [
            'name' => 'Vibration Test',
            'description' => 'Free online vibration test. Test phone Vibration API with pattern presets and gamepad rumble with per-motor intensity sliders in a single browser tool.',
            'url' => 'vibration-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Phone Vibration API patterns',
                'Custom ms-pattern input',
                'Gamepad dual-rumble test',
                'Weak/strong motor sliders'
            ]
        ],
        'gamertag_generator' => [
            'name' => 'Gamertag Generator',
            'description' => 'Free gamertag generator. Random gamer names in 6 styles (edgy, funny, cute, pro, fantasy, cyber) with length limits for Xbox, PSN, Steam, and Discord.',
            'url' => 'gamertag-generator.php',
            'category' => 'UtilityApplication',
            'features' => [
                '6 style presets',
                'Length limit (Xbox/PSN/Steam/Discord)',
                'One-click copy to clipboard',
                'Favorites saved in browser'
            ]
        ],
        'guild_name_generator' => [
            'name' => 'Guild Name Generator',
            'description' => 'Free guild name generator for MMO clans, WoW guilds, FFXIV Free Companies, Destiny clans, and Discord servers. 6 themes across 5 naming templates.',
            'url' => 'guild-name-generator.php',
            'category' => 'UtilityApplication',
            'features' => [
                '6 themes (fantasy, sci-fi, dark, noble, rogue, mythic)',
                '5 templates (Order of, House of, The Xs, etc.)',
                'Length limits for WoW/FFXIV/Destiny/Discord',
                'Favorites saved in browser'
            ]
        ],
        'auditory_reaction_time' => [
            'name' => 'Auditory Reaction Time Test',
            'description' => 'Free auditory reaction time test. Measure response to a sound cue in milliseconds using Web Audio API. 5-round average, best/worst tracking, false-start detection.',
            'url' => 'auditory-reaction-time-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Web Audio precise timing',
                '5-round average, best, worst',
                'Random 1.5-4 second delay',
                'False-start detection'
            ]
        ],
        'frame_skipping_test' => [
            'name' => 'Frame Skipping Test',
            'description' => 'Free frame skipping test. Detects dropped frames using requestAnimationFrame timestamp analysis. Auto-calibrates to your refresh rate, logs each stutter event.',
            'url' => 'frame-skipping-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Auto-calibrates refresh rate',
                'Per-frame delta logging',
                'Jitter (stddev) metric',
                'Moving bar visual reference'
            ]
        ],
        'surround_sound_test' => [
            'name' => 'Surround Sound Test',
            'description' => 'Free surround sound test. 5.1 and 7.1 channel walk-around to verify speaker wiring and placement. Graceful stereo-panning fallback for headphones.',
            'url' => 'surround-sound-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                '5.1 and 7.1 channel support',
                'Walk-around or per-channel test',
                'Web Audio channel merger',
                'Stereo panning fallback'
            ]
        ],
        'cpu_stress_test' => [
            'name' => 'CPU Stress Test',
            'description' => 'Free CPU stress test. Multi-threaded WebWorker SHA-256 busy loop to load every logical core and report ops/sec. Configurable thread count and duration.',
            'url' => 'cpu-stress-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Multi-threaded WebWorkers',
                'SHA-256 benchmark loop',
                'Per-thread ops/sec',
                'Thermal throttle detection'
            ]
        ],
        'gpu_stress_test' => [
            'name' => 'GPU Stress Test',
            'description' => 'Free GPU stress test using a heavy WebGL2 Mandelbrot fragment shader. Reports FPS, stability, GPU vendor/renderer, and detects software rendering fallback.',
            'url' => 'gpu-stress-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'WebGL2 Mandelbrot shader',
                'Live FPS and 1s rolling average',
                'Minimum FPS tracking',
                'GPU vendor / renderer detection'
            ]
        ],
        'ai_gpu_test' => [
            'name' => 'AI GPU Test',
            'description' => 'Free AI GPU test for WebGPU, WebGL2, WebNN, browser hardware acceleration, software-rendering fallback detection, and safe matrix compute benchmarking.',
            'url' => 'ai-gpu-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'WebGPU adapter and compute check',
                'WebGL2 graphics acceleration check',
                'WebNN browser AI API detection',
                'Matrix multiplication benchmark',
                'AI readiness score'
            ]
        ],
        'memory_test' => [
            'name' => 'Memory Test',
            'description' => 'Free browser memory test. Live heap stats via performance.memory on Chrome/Edge, allocation stressor in configurable chunks, safe abort before OOM.',
            'url' => 'memory-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Live performance.memory readout',
                'Allocation stress in 10 MB chunks',
                'Auto-abort at 85% of heap limit',
                'Heap growth graph'
            ]
        ],
        'ram_latency_calc' => [
            'name' => 'RAM Latency Calculator',
            'description' => 'Free RAM latency calculator. Convert CAS latency (CL) and memory speed (MT/s) to nanoseconds. Compare DDR4 vs DDR5 kits, presets for DDR4-3200 CL16, DDR5-6000 CL30 and more.',
            'url' => 'ram-latency-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'CAS latency to nanoseconds',
                'Side-by-side kit compare',
                'DDR4 and DDR5 presets',
                'Reverse solve for target CL'
            ]
        ],
        'bandwidth_calc' => [
            'name' => 'Bandwidth Calculator',
            'description' => 'Free bandwidth calculator. Convert file size and connection speed to transfer time, or reverse-solve for required speed. Handles bits-vs-bytes math automatically.',
            'url' => 'bandwidth-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                '3-way solver (time/size/speed)',
                'KB/MB/GB/TB unit toggles',
                'Kbps/Mbps/Gbps unit toggles',
                'Common link presets'
            ]
        ],
        'download_time_calc' => [
            'name' => 'Download Time Calculator',
            'description' => 'Free download time calculator. Estimate how long games, movies, and backups take at your connection speed. 15+ file presets, realistic overhead (85%), slow-path and theoretical estimates.',
            'url' => 'download-time-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                '15+ file-size presets',
                'Theoretical + realistic + slow estimates',
                'Hh Mm Ss output',
                'Common link presets'
            ]
        ],
        'raid_calc' => [
            'name' => 'RAID Calculator',
            'description' => 'Free RAID calculator for RAID 0, 1, 5, 6, 10, 50, and 60. Usable capacity, fault tolerance, read/write speed multipliers, and side-by-side level comparison.',
            'url' => 'raid-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                '7 RAID levels (0, 1, 5, 6, 10, 50, 60)',
                'Usable capacity + parity overhead',
                'Fault tolerance (drives that can fail)',
                'Read + write speed multipliers'
            ]
        ],
        'ttk_calc' => [
            'name' => 'TTK Calculator',
            'description' => 'Free time-to-kill calculator for FPS games. Bullets to kill, TTK in milliseconds, body vs head comparison, armor handling, and presets for CS2, Valorant, Apex, and Call of Duty.',
            'url' => 'ttk-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'TTK in milliseconds',
                'Body vs headshot side by side',
                'Armor and damage drop-off',
                'Weapon presets for major FPS games'
            ]
        ],
        'minecraft_circle' => [
            'name' => 'Minecraft Circle Generator',
            'description' => 'Free Minecraft circle generator. Plot pixel circles, filled discs, thick rings, and 3D sphere layers from radius 1 to 256. PNG export for second-screen reference.',
            'url' => 'minecraft-circle-generator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Outline / filled / thick / sphere modes',
                'Radius 1-256 blocks',
                'Block count per layer + sphere total',
                'PNG download for in-game reference'
            ]
        ],
        'monitor_sharpness_test' => [
            'name' => 'Monitor Sharpness Test',
            'description' => 'Free monitor sharpness test. Lagom-style 1px pixel grid, multi-size text samples in serif/sans/mono, color-fringing blocks, and an RGB sub-pixel ruler. Browser-based, no install.',
            'url' => 'monitor-sharpness-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                '1px Lagom-style pixel grid',
                'Text clarity at 8 sizes x 3 fonts',
                'Color fringing detection',
                'Sub-pixel layout ruler'
            ]
        ],
        'pitch_detector' => [
            'name' => 'Pitch Detector',
            'description' => 'Free online pitch detector. Sing or play into your microphone to see live frequency in Hz, the nearest musical note (C0-C8), octave, and cents sharp or flat. Real-time autocorrelation, scrolling pitch graph, peak hold, noise threshold.',
            'url' => 'pitch-detector.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Live frequency detection (Hz)',
                'Nearest note across full piano range C0-C8',
                'Cents accuracy (-50 to +50)',
                '10-second scrolling pitch graph',
                'Peak hold (last 2 seconds)',
                'Adjustable noise threshold'
            ]
        ],
        'webcam_mirror' => [
            'name' => 'Webcam Mirror',
            'description' => 'Free online webcam mirror. Use your camera as a virtual mirror in the browser with horizontal flip, brightness/contrast sliders, rule-of-thirds grid, snapshot download, and fullscreen mode. Nothing uploaded.',
            'url' => 'webcam-mirror.php',
            'category' => 'MultimediaApplication',
            'features' => [
                'Live camera preview with horizontal mirror flip',
                'Brightness and contrast sliders (0-200%)',
                'Rule-of-thirds grid overlay',
                'PNG snapshot download and fullscreen mode'
            ]
        ],
        'hearing_age_test' => [
            'name' => 'Hearing Age Test (Mosquito Tone)',
            'description' => 'Free hearing age test. 12-step high-frequency hearing screening from 8 kHz to 22 kHz including the 17.4 kHz mosquito tone, with a manual fine-tune slider and safety-capped volume.',
            'url' => 'hearing-age-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                '12 frequencies from 8 kHz to 22 kHz',
                'Includes 17.4 kHz mosquito tone',
                'Manual fine-tune slider',
                'Volume safety cap (-20 dBFS)'
            ]
        ],
        'online_ruler' => [
            'name' => 'Online Ruler',
            'description' => 'Free online ruler in actual size on screen. Measure objects in centimeters, millimeters, and inches. Calibrate with a credit card (ISO ID-1, 85.6 x 54 mm) or by entering monitor DPI. Calibration persists in localStorage.',
            'url' => 'online-ruler.php',
            'category' => 'UtilityApplication',
            'features' => [
                'SVG ruler in true cm and inches',
                'Credit-card drag calibration (ISO ID-1)',
                'Direct DPI input + common presets (96, 109, 119, 120, 144, 163, 216, 264)',
                'Vertical / horizontal orientation toggle',
                'cm only / inch only / both views',
                'Calibration saved per browser'
            ]
        ],
        'ai_assistant' => [
            'name' => 'KBT AI Assistant',
            'description' => 'Free AI chat assistant that helps you pick the right hardware diagnostic tool, explains test results, and walks through keyboard, mouse, screen, and audio diagnostics in 8 languages.',
            'url' => 'ai-assistant.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Plain-language hardware troubleshooting',
                '8 languages (EN, ES, FR, DE, JA, KO, PT, AR)',
                'Links directly to the right test tool',
                'Explains test results in context',
                'No account, rate-limited to prevent abuse'
            ]
        ],
        'edpi_calc' => [
            'name' => 'eDPI Calculator',
            'description' => 'Free eDPI calculator. Calculate effective DPI (DPI x sensitivity) and cm/360 for CS2, Valorant, Apex, Overwatch and other FPS games.',
            'url' => 'edpi-calculator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'eDPI calculation',
                'cm/360 conversion',
                'Yaw multiplier config',
                'Per-game presets'
            ]
        ],
        'decibel_meter' => [
            'name' => 'Decibel Meter',
            'description' => 'Free online decibel meter. Live dB SPL measurement using your microphone. Peak and rolling average tracking.',
            'url' => 'decibel-meter.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Live dB SPL reading',
                'Peak tracking',
                'Rolling average over 100 samples',
                'Visual meter bar'
            ]
        ],
        'click_speed' => [
            'name' => 'Click Speed Test (CPS Test)',
            'description' => 'Free click speed test to measure clicks per second (CPS). Test your clicking speed with timed challenges.',
            'url' => 'mouse_speed_tester.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Clicks per second (CPS) measurement',
                'Multiple duration options',
                'Real-time click counter',
                'Performance tracking'
            ]
        ],
        'typing_speed' => [
            'name' => 'Typing Speed Test',
            'description' => 'Free typing speed test to measure WPM (words per minute) and accuracy. Improve your typing skills with real-time feedback.',
            'url' => 'keyboard_typing_test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'WPM calculation',
                'Accuracy percentage',
                'Real-time feedback',
                'Multiple test durations'
            ]
        ],
        'ghost_click' => [
            'name' => 'Free Mouse Ghost Click Detector',
            'description' => 'Free ghost click detector and mouse double click test with left, right, and middle button timing logs, suspicious interval flags, and exportable switch-bounce evidence.',
            'url' => 'ghost-click-detector.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Mouse double-click detection',
                'Left, right, and middle button filters',
                'Adjustable switch-bounce thresholds',
                'Exportable click timing report'
            ]
        ],
        'double_click_test' => [
            'name' => 'Double Click Test',
            'description' => 'Free online double click test to inspect suspicious rapid click intervals, possible mouse switch bounce, and left, right, or middle button chatter.',
            'url' => 'double-click-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Rapid click interval logging',
                'Adjustable fast-click flagging',
                'Button-specific click history',
                'Browser-based mouse switch check'
            ]
        ],
        'dpi_tester' => [
            'name' => 'Mouse DPI Tester & Checker',
            'description' => 'Free mouse DPI tester and checker to measure actual DPI online, compare repeated runs, calculate eDPI, and tune sensitivity.',
            'url' => 'mouse_sensitivity_DPI_tester.php',
            'category' => 'UtilityApplication',
            'features' => [
                'DPI measurement',
                'Sensitivity testing',
                'Cursor tracking',
                'Gaming optimization'
            ]
        ],
        'mouse_trail' => [
            'name' => 'Mouse Trail Test',
            'description' => 'Free mouse trail tester to visualize cursor movement and tracking accuracy. Test mouse precision.',
            'url' => 'mouse-trail.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Cursor movement visualization',
                'Precision tracking',
                'Trail customization'
            ]
        ],
        'mic_tester' => [
            'name' => 'Online Microphone Tester',
            'description' => 'Free online microphone tester to check microphone access, live input levels, and peak volume in your browser.',
            'url' => 'mic-tester.php',
            'category' => 'UtilityApplication',
            'screenshot' => 'images/mic-test/microphone-test-live-input-check-1400.png',
            'features' => [
                'Real-time mic testing',
                'Live audio level meter',
                'Peak level tracking',
                'Browser-based permission check'
            ]
        ],
        'webcam_tester' => [
            'name' => 'Online Webcam Tester',
            'description' => 'Free online webcam tester to check video quality and camera functionality. Take test snapshots.',
            'url' => 'webcamtesterindex.php',
            'category' => 'UtilityApplication',
            'screenshot' => 'images/webcam-test/webcam-test-camera-preview-1400.png',
            'features' => [
                'Real-time video feed',
                'Snapshot capture',
                'Camera switching',
                'Resolution display'
            ]
        ],
        'screen_tester' => [
            'name' => 'Screen Tester (Dead Pixel Test)',
            'description' => 'Free online screen tester to detect dead pixels, stuck pixels, and display issues.',
            'url' => 'screentestindex.php',
            'category' => 'UtilityApplication',
            'screenshot' => 'images/screen-test/screen-tester-monitor-inspection-1400.png',
            'features' => [
                'Dead pixel detection',
                'Stuck pixel finder',
                'Full-screen color cycling',
                'Panel inspection tips'
            ]
        ],
        'black_screen_test' => [
            'name' => 'Black Screen Test',
            'description' => 'Free online black screen test to inspect monitors for backlight bleed, glow, and bright display defects.',
            'url' => 'black-screen-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Full black screen mode',
                'Backlight bleed inspection',
                'Bright defect checking',
                'Browser-based display test'
            ]
        ],
        'white_screen_test' => [
            'name' => 'White Screen Test',
            'description' => 'Free online white screen test to spot stuck pixels, tint, dust, and panel uniformity issues.',
            'url' => 'white-screen-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Full white screen mode',
                'Stuck pixel checking',
                'Uniformity inspection',
                'Browser-based display test'
            ]
        ],
        'headphone_tester' => [
            'name' => 'Headphone & Speaker Tester',
            'description' => 'Free headphone and speaker tester to check left/right audio channels and stereo balance.',
            'url' => 'headphone_speaker_tester_index.php',
            'category' => 'UtilityApplication',
            'screenshot' => 'images/headphone-test/speaker-headphone-test-stereo-preview-1400.png',
            'features' => [
                'Left/right channel testing',
                'Stereo balance check',
                'Audio quality test',
                'Frequency range test'
            ]
        ],
        'left_right_speaker_test' => [
            'name' => 'Left Right Speaker Test',
            'description' => 'Free online left right speaker test to verify stereo channel mapping on speakers and headphones.',
            'url' => 'left-right-speaker-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Isolated left channel playback',
                'Isolated right channel playback',
                'Stereo mapping verification',
                'Browser-based audio output test'
            ]
        ],
        'stereo_test' => [
            'name' => 'Stereo Test',
            'description' => 'Free online stereo test to check left and right audio channels, balance, and headphone or speaker output.',
            'url' => 'stereo-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Stereo playback',
                'Left/right channel checks',
                'Balance testing',
                'Frequency and noise tests'
            ]
        ],
        'qr_generator' => [
            'name' => 'QR Code Generator',
            'description' => 'Free QR code generator to create custom QR codes for URLs and text in your browser.',
            'url' => 'QR_code_generator_scanner.php',
            'category' => 'UtilityApplication',
            'features' => [
                'URL QR codes',
                'Text QR codes',
                'Size selection',
                'PNG download'
            ]
        ],
        'qr_reader' => [
            'name' => 'QR Code Reader',
            'description' => 'Free online QR code reader to scan and decode QR codes from uploaded images in your browser.',
            'url' => 'qr-code-reader.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Image upload',
                'Browser-side decoding',
                'URL extraction',
                'Text decoding'
            ]
        ],
        'ocr_tool' => [
            'name' => 'OCR Text Extractor',
            'description' => 'Free online OCR tool to extract text from images and screenshots in your browser.',
            'url' => 'ocr-tool.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Image text extraction',
                'Screenshot OCR',
                'Browser-based processing',
                'Editable text output'
            ]
        ],
        'backlight_bleed_test' => [
            'name' => 'Backlight Bleed Test',
            'description' => 'Free online backlight bleed test to check LCD monitors for backlight bleeding, IPS glow, and clouding using a full-screen dark display.',
            'url' => 'backlight-bleed-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Full-screen pure black display',
                'Adjustable brightness filter',
                'Four dark test shades (black, dark gray, dark blue, dark red)',
                'Auto-hiding floating controls in fullscreen',
                'Keyboard shortcuts for fast testing'
            ]
        ],
        'dead_pixel_test' => [
            'name' => 'Dead Pixel Test',
            'description' => 'Free online dead pixel test to inspect monitors, laptops, and displays for black pixels that never light up.',
            'url' => 'dead-pixel-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Full-screen color screens',
                'Dead pixel inspection',
                'Monitor and laptop support',
                'Browser-based testing'
            ]
        ],
        'stuck_pixel_test' => [
            'name' => 'Stuck Pixel Test',
            'description' => 'Free online stuck pixel test to find red, green, blue, or white pixels that stay lit on a display.',
            'url' => 'stuck-pixel-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'RGB color screens',
                'Stuck pixel detection',
                'Hot pixel checking',
                'Full-screen test mode'
            ]
        ],
        'keyboard_ghosting' => [
            'name' => 'Keyboard Ghosting Test',
            'description' => 'Free online keyboard ghosting test to check blocked key combinations and anti-ghosting limits.',
            'url' => 'keyboard-ghosting-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Multi-key combo testing',
                'Ghosting detection',
                'Live key highlight feedback',
                'Gaming keyboard checks'
            ]
        ],
        'n_key_rollover' => [
            'name' => 'N-Key Rollover Test',
            'description' => 'Free online N-key rollover test to check how many simultaneous key presses your keyboard supports.',
            'url' => 'n-key-rollover-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Simultaneous key press testing',
                'NKRO and 6KRO checks',
                'Live rollover feedback',
                'Keyboard matrix troubleshooting'
            ]
        ],
        'stuck_key_test' => [
            'name' => 'Stuck Key Test',
            'description' => 'Free online stuck key test to check repeating, jammed, or unresponsive keyboard keys in the browser.',
            'url' => 'stuck-key-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Single-key verification',
                'Repeating key troubleshooting',
                'Live key highlight feedback',
                'Keyboard issue diagnosis'
            ]
        ],
        'test_my_mic' => [
            'name' => 'Test My Mic',
            'description' => 'Free online mic check to verify browser microphone access and confirm live voice input quickly.',
            'url' => 'test-my-mic.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Quick microphone check',
                'Live input meter',
                'Peak level tracking',
                'Browser permission troubleshooting'
            ]
        ],
        'microphone_volume_test' => [
            'name' => 'Microphone Volume Test',
            'description' => 'Free online microphone volume test to check current input level and peak mic volume in the browser.',
            'url' => 'microphone-volume-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Live mic level meter',
                'Peak volume tracking',
                'Browser permission check',
                'No recording or upload'
            ]
        ],
        'camera_resolution_test' => [
            'name' => 'Camera Resolution Test',
            'description' => 'Free online camera resolution test to verify the live video size your webcam delivers in the browser.',
            'url' => 'camera-resolution-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Resolution presets',
                'Live video preview',
                'Device switching',
                'Snapshot comparison'
            ]
        ],
        'webcam_not_working' => [
            'name' => 'Webcam Not Working Test',
            'description' => 'Free webcam troubleshooting test to check browser access, live preview, and camera detection when your webcam is not working.',
            'url' => 'webcam-not-working-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Camera permission check',
                'Live webcam preview',
                'Device detection',
                'Resolution and status readout'
            ]
        ],
        'take_picture_with_webcam' => [
            'name' => 'Take Picture With Webcam',
            'description' => 'Free online webcam snapshot tool to preview your camera, take pictures, and download webcam images in the browser.',
            'url' => 'take-picture-with-webcam.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Live webcam preview',
                'Snapshot capture',
                'Multiple image downloads',
                'Camera and resolution selection'
            ]
        ],
        'scroll_wheel_test' => [
            'name' => 'Scroll Wheel Test',
            'description' => 'Free online scroll wheel test to verify mouse wheel direction, wheel clicks, and inconsistent scrolling.',
            'url' => 'scroll-wheel-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Scroll up/down detection',
                'Scroll counter',
                'Live direction readout',
                'Middle click support'
            ]
        ],
        'scan_qr_from_image' => [
            'name' => 'Scan QR From Image',
            'description' => 'Free online tool to scan QR codes from uploaded screenshots, photos, and saved images.',
            'url' => 'scan-qr-from-image.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Screenshot upload',
                'Photo-based QR decoding',
                'Local browser processing',
                'Instant text and URL output'
            ]
        ],
        'screenshot_to_text' => [
            'name' => 'Screenshot to Text',
            'description' => 'Free online screenshot to text converter that extracts editable text from uploaded screen captures.',
            'url' => 'screenshot-to-text.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Screenshot OCR',
                'Browser-based text extraction',
                'Editable output',
                'PNG and JPG support'
            ]
        ],
        'photo_to_text' => [
            'name' => 'Photo to Text',
            'description' => 'Free online photo to text converter that extracts editable text from uploaded phone photos and document images.',
            'url' => 'photo-to-text.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Photo OCR',
                'Receipt and label text extraction',
                'Browser-based processing',
                'Editable text output'
            ]
        ],
        'password_generator' => [
            'name' => 'Password Generator',
            'description' => 'Free password generator to create strong, secure passwords with customizable options.',
            'url' => 'auto-password-generator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Customizable length',
                'Character type selection',
                'Strength indicator',
                'One-click copy'
            ]
        ],
        'latency_checker' => [
            'name' => 'Keyboard Latency Test',
            'description' => 'Free keyboard latency test to check input delay, key response time, and browser event lag in milliseconds.',
            'url' => 'latency-checker.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Latency measurement',
                'Response time tracking',
                'Gaming optimization',
                'Real-time feedback'
            ]
        ],
        'whatsapp_link' => [
            'name' => 'WhatsApp Link Generator',
            'description' => 'Free WhatsApp link generator to create direct chat links without saving contacts.',
            'url' => 'whatsapp-link-generator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Direct chat links',
                'Pre-filled messages',
                'No contact saving',
                'QR code generation'
            ]
        ],
        'whatsapp_qr' => [
            'name' => 'WhatsApp QR Generator',
            'description' => 'Free WhatsApp QR code generator for businesses to create branded chat QR codes.',
            'url' => 'whatsapp-Brand-link-generator.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Business QR codes',
                'Branded links',
                'Custom messages',
                'Download options'
            ]
        ],
        'whatsapp_sentiment' => [
            'name' => 'WhatsApp Sentiment Analyzer',
            'description' => 'Free WhatsApp sentiment analyzer to understand message tone and emotion.',
            'url' => 'whatsapp-sentiment-analyzer.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Sentiment analysis',
                'Emotion detection',
                'Privacy-first',
                'Local processing'
            ]
        ],
        'lucky_wheel' => [
            'name' => 'Lucky Wheel Spinner',
            'description' => 'Free lucky wheel spinner for random selections and decisions.',
            'url' => 'luckywheeltoolindex.php',
            'category' => 'GameApplication',
            'features' => [
                'Customizable options',
                'Random selection',
                'Visual spinning',
                'Sound effects'
            ]
        ]
    ];

    return $tools[$toolKey] ?? null;
}

/**
 * Predefined FAQ data for tools
 */
function getToolFAQs($toolKey) {
    $faqs = [
        'keyboard_tester' => [
            ['question' => 'How do I test my keyboard online?', 'answer' => 'Click inside the tester and press any key. The key highlights on the visual keyboard and appears in key history.'],
            ['question' => 'Why does a key not register in the keyboard tester?', 'answer' => 'Make sure the page is focused, press the key firmly, and confirm your OS language matches the selected layout.'],
            ['question' => 'Can I test keyboard ghosting or multiple key presses?', 'answer' => 'Yes. Press several keys together to see which keys register and identify ghosting issues.'],
            ['question' => 'Does the keyboard tester work with different layouts?', 'answer' => 'Yes. You can switch between QWERTY, AZERTY, Dvorak, and Colemak, plus Windows or Mac labels.'],
            ['question' => 'Do I need a keyboard tester download?', 'answer' => 'No. The keyboard tester runs in your browser, so there is no app, extension, or installer to download. Open the page, focus the tester, and press each key to confirm it registers.'],
            ['question' => 'Can I use this as a laptop keyboard tester?', 'answer' => 'Yes. It works with built-in laptop keyboards as long as the browser receives the key event. Some laptop Fn shortcuts are handled by keyboard firmware or the operating system, so test those by checking whether brightness, volume, function keys, or navigation outputs behave as expected.'],
            ['question' => 'Does this work as a Windows keyboard tester or Mac keyboard tester?', 'answer' => 'Yes. The tester works on Windows, macOS, Linux, and Chromebook in modern browsers. Use the OS selector to switch labels between Windows and Mac so Ctrl, Command, Option, Alt, and system keys are easier to identify.'],
            ['question' => 'Can I use this keyboard tester for 60 percent keyboards?', 'answer' => 'Yes. Press the normal keys first, then test your 60 percent keyboard Fn-layer combinations for arrows, function keys, Delete, Home, End, Page Up, and Page Down. The Fn key itself may not appear because most compact keyboards process it internally.'],
            ['question' => 'Can I test a gaming keyboard online?', 'answer' => 'Yes. Use it as a gaming keyboard tester by checking WASD, Shift, Ctrl, Space, number keys, and the key combinations you use in-game. For deeper checks, use the ghosting and latency tools linked from the tester.'],
            ['question' => 'Is the keyboard test private?', 'answer' => 'Yes. Testing runs entirely in your browser and does not upload any data to our servers.']
        ],
        'latency_checker' => [
            ['question' => 'What is input latency?', 'answer' => 'Input latency is the delay between pressing a key or moving a mouse and seeing the result on screen. It is the sum of USB polling delay, OS processing, application handling, GPU render, and monitor refresh. Competitive gaming targets under 20 ms end-to-end.'],
            ['question' => 'How accurate is this browser-based latency checker?', 'answer' => 'The tool measures the time between the keydown event and the JavaScript event loop processing it, which captures OS and browser latency but not monitor or USB polling latency. Use it for relative comparisons (keyboard A vs keyboard B on the same machine), not absolute hardware specs.'],
            ['question' => 'What is a good keyboard latency?', 'answer' => 'Wired gaming keyboards typically measure 1-8 ms. Wireless 2.4 GHz is usually 3-10 ms. Bluetooth can spike to 30+ ms. Office-grade keyboards often report 10-20 ms under browser timing.'],
            ['question' => 'Why does my wireless keyboard show higher latency?', 'answer' => 'Wireless protocols add radio-link overhead. Most 2.4 GHz gaming dongles keep the extra latency under 5 ms. Bluetooth HID runs on slotted polling and can add 10-30 ms, which is why competitive players still prefer wired.'],
            ['question' => 'Can this replace a dedicated latency tester?', 'answer' => 'No. Hardware testers like the Nvidia LDAT or the Logitech Latency Tool measure photon-to-event timing with microsecond accuracy. This browser tool measures a subset of the chain - useful for directional comparison rather than forensic measurement.']
        ],
        'mouse_tester' => [
            ['question' => 'How do I test my mouse buttons online?', 'answer' => 'Click inside the tester, then press left, middle, and right buttons. Each press updates the counter and highlight.'],
            ['question' => 'How do I test my mouse scroll wheel?', 'answer' => 'Scroll up and down and watch the direction indicator and count to confirm consistent wheel input.'],
            ['question' => 'Can I test double click issues?', 'answer' => 'For double click problems, use the dedicated double click test page that logs suspiciously fast click intervals.'],
            ['question' => 'Does the mouse tester work on laptops and touchpads?', 'answer' => 'Yes, it works with trackpads, but external mice give the most accurate results.'],
            ['question' => 'Is the mouse test private?', 'answer' => 'Yes. All testing runs in your browser and does not upload data.']
        ],
        'click_speed' => [
            ['question' => 'What is CPS in click speed testing?', 'answer' => 'CPS stands for Clicks Per Second. It measures how many times you can click the mouse button in one second.'],
            ['question' => 'What is a good CPS score?', 'answer' => 'Average users click 5-7 CPS. Gamers often reach 8-12 CPS. Professional clickers can exceed 15 CPS.'],
            ['question' => 'How do I improve my click speed?', 'answer' => 'Practice regularly, use proper finger positioning, and consider a gaming mouse with a lower actuation force.']
        ],
        'typing_speed' => [
            ['question' => 'What is a good typing speed (WPM)?', 'answer' => 'Average typing speed is 40 WPM. Professional typists reach 65-75 WPM. Expert typists can exceed 100 WPM.'],
            ['question' => 'How is WPM calculated?', 'answer' => 'WPM is calculated by dividing the number of characters typed by 5 (average word length), then dividing by time in minutes.'],
            ['question' => 'How can I improve my typing speed?', 'answer' => 'Practice touch typing, maintain proper posture, use all fingers, and practice regularly with typing tests.']
        ],
        'mic_tester' => [
            ['question' => 'Why is my microphone not working in the tester?', 'answer' => 'Check browser permissions, make sure the correct microphone is active in your system settings, and verify the mic is not muted.'],
            ['question' => 'How do I test my microphone online?', 'answer' => 'Allow microphone access, speak normally, and confirm the live level meter and peak indicator respond to your voice.'],
            ['question' => 'Is the microphone test private?', 'answer' => 'Yes. Audio is processed locally in your browser and never uploaded to our servers.']
        ],
        'webcam_tester' => [
            ['question' => 'Why is my webcam not showing in the tester?', 'answer' => 'Check browser permissions, ensure no other app is using the camera, and try selecting a different camera if multiple are available.'],
            ['question' => 'How do I test webcam quality?', 'answer' => 'Look at the live preview for clarity, color accuracy, and frame rate. Take a snapshot to check static image quality.'],
            ['question' => 'Is the webcam test private?', 'answer' => 'Yes. Video is processed locally and never uploaded. Snapshots stay in your browser until you download them.']
        ],
        'screen_tester' => [
            ['question' => 'How do I find dead pixels on my monitor?', 'answer' => 'Use solid color test screens (red, green, blue, white, black) and look closely for pixels that don\'t match the background color.'],
            ['question' => 'What is a stuck pixel vs a dead pixel?', 'answer' => 'Dead pixels are always black. Stuck pixels are always lit in one color (red, green, or blue).'],
            ['question' => 'Can stuck pixels be fixed?', 'answer' => 'Sometimes. Try pixel-fixing tools that rapidly flash colors. Dead pixels usually cannot be fixed.']
        ],
        'headphone_tester' => [
            ['question' => 'How do I test left and right speakers online?', 'answer' => 'Use the browser audio tester and play isolated left and right channel sounds to confirm each side maps correctly.'],
            ['question' => 'Can I test headphones and speakers on the same page?', 'answer' => 'Yes. The audio output tool works for headphones, speakers, and many external audio devices as long as the browser can play sound.'],
            ['question' => 'Does this audio test upload sound?', 'answer' => 'No. The test generates playback in your browser and does not upload audio data.']
        ],
        'left_right_speaker_test' => [
            ['question' => 'How do I know if left and right speakers are swapped?', 'answer' => 'Play isolated left and right channel sounds and check whether audio comes from the matching side. If it does not, your channels are swapped somewhere in the chain.'],
            ['question' => 'Can I use this left right speaker test with headphones?', 'answer' => 'Yes. It works with headphones, speakers, and many external audio interfaces that the browser can use for playback.'],
            ['question' => 'What should I do if only one side plays?', 'answer' => 'Check cable seating, output device selection, balance settings, and whether the problem follows the device on another computer.']
        ],
        'stereo_test' => [
            ['question' => 'What does a stereo test check?', 'answer' => 'A stereo test checks whether both audio channels play correctly, whether left and right mapping is accurate, and whether output sounds balanced.'],
            ['question' => 'Can this help with stereo balance problems?', 'answer' => 'Yes. You can compare both sides and use the left/right channel tests plus balance playback to spot uneven output.'],
            ['question' => 'Do I need headphones for a stereo test?', 'answer' => 'Headphones give the clearest result, but the page also works with speakers if your setup has proper stereo output.']
        ],
        'black_screen_test' => [
            ['question' => 'What is a black screen test used for?', 'answer' => 'A black screen test helps you inspect backlight bleed, bright spots, IPS glow, and other defects that show up more clearly on a dark background.'],
            ['question' => 'Can a black screen help me find dead pixels?', 'answer' => 'It can help with bright or hot defects, but dead pixels are often easier to confirm by comparing black, white, and RGB screens.'],
            ['question' => 'Does this black screen run full screen?', 'answer' => 'Yes. Start the tester and switch into full-screen mode for a cleaner monitor inspection view.']
        ],
        'white_screen_test' => [
            ['question' => 'What is a white screen test used for?', 'answer' => 'A white screen test helps you spot stuck pixels, color tint, dust, and panel uniformity problems on bright backgrounds.'],
            ['question' => 'Why is white useful for monitor testing?', 'answer' => 'A full white screen makes tiny colored dots, dirt, and uneven brightness easier to see than a busy desktop wallpaper.'],
            ['question' => 'Can I use this white screen on a laptop or phone?', 'answer' => 'Yes. The browser-based white screen works on laptops, external monitors, and many mobile displays.']
        ],
        'qr_reader' => [
            ['question' => 'Can I read a QR code from an image file?', 'answer' => 'Yes. Upload the image containing the QR code and the browser decoder will try to extract the text or link.'],
            ['question' => 'Does this QR code reader use my camera?', 'answer' => 'No. This version of the QR reader is designed for uploaded images rather than live camera scanning.'],
            ['question' => 'Is the QR image uploaded to your server?', 'answer' => 'No. The QR image is processed locally in your browser for privacy-focused decoding.']
        ],
        'ocr_tool' => [
            ['question' => 'What kinds of images work best with OCR?', 'answer' => 'Sharp screenshots, photos, and scans with clear text and good contrast usually produce the best results.'],
            ['question' => 'Can I extract text from a screenshot?', 'answer' => 'Yes. Upload the screenshot, run OCR, and review the extracted text in the result area.'],
            ['question' => 'Does OCR processing happen in the browser?', 'answer' => 'Yes. The OCR tool runs in your browser after you upload the image.']
        ],
        'backlight_bleed_test' => [
            ['question' => 'What is backlight bleed?', 'answer' => 'Backlight bleed occurs when the backlight on an LCD monitor leaks through the edges or corners of the panel, creating bright patches on dark screens. It is a manufacturing tolerance issue present to some degree in nearly all LCD monitors.'],
            ['question' => 'How do I test for backlight bleed?', 'answer' => 'Enter fullscreen mode to fill the entire panel with a pure black screen. Dim the room lights and look for bright or hazy patches near the edges and corners. Raise the brightness slider to reveal subtle bleed.'],
            ['question' => 'What is the difference between backlight bleed and IPS glow?', 'answer' => 'Backlight bleed appears as fixed bright patches near the panel edges regardless of viewing angle. IPS glow is a silver-white shimmer that appears in the corners and shifts when you change your viewing angle. Backlight bleed affects all LCD types; IPS glow is specific to IPS panels.'],
            ['question' => 'Is some backlight bleed normal?', 'answer' => 'Yes. Minor backlight bleed visible only in a dark room at maximum brightness is within normal manufacturing tolerances. Severe bleed visible at normal brightness with ambient lighting may be eligible for a replacement under the manufacturer warranty.'],
            ['question' => 'Does the brightness slider change my monitor settings?', 'answer' => 'No. The brightness slider uses a CSS filter applied in your browser and does not change your monitor\'s hardware backlight level. It helps reveal subtle bleed by making the test screen appear brighter without touching your display settings.']
        ],
        'dead_pixel_test' => [
            ['question' => 'How do I test for dead pixels online?', 'answer' => 'Open the full-screen tester, switch through solid colors, and look for pixels that remain black on every screen.'],
            ['question' => 'What does a dead pixel look like?', 'answer' => 'A dead pixel usually appears as a tiny black dot that does not light up even on bright color screens.'],
            ['question' => 'Can I use this dead pixel test on a laptop?', 'answer' => 'Yes. The browser-based test works on laptop displays, external monitors, and many mobile screens.']
        ],
        'stuck_pixel_test' => [
            ['question' => 'What is a stuck pixel?', 'answer' => 'A stuck pixel is a pixel or sub-pixel that stays lit in one color, such as red, green, blue, or white.'],
            ['question' => 'How do I check for stuck pixels?', 'answer' => 'Switch through black, white, and RGB color screens and look for dots that remain the same color while the background changes.'],
            ['question' => 'Can a stuck pixel fix itself?', 'answer' => 'Sometimes. Some stuck pixels respond to time or pixel exercise methods, though results vary.']
        ],
        'keyboard_ghosting' => [
            ['question' => 'How do I test keyboard ghosting online?', 'answer' => 'Open the keyboard tester and press several keys together. If a held key does not light up, you have found a blocked combination.'],
            ['question' => 'What keys should I use in a ghosting test?', 'answer' => 'Test the real combos you use, such as WASD with Shift or Space, plus any shortcuts that often fail.'],
            ['question' => 'Is ghosting the same as rollover?', 'answer' => 'They are related but different. Ghosting focuses on failed or blocked combinations, while rollover focuses on how many keys can register together.']
        ],
        'n_key_rollover' => [
            ['question' => 'What is NKRO?', 'answer' => 'NKRO stands for N-key rollover, meaning a keyboard can register many simultaneous key presses independently.'],
            ['question' => 'How do I test rollover?', 'answer' => 'Hold more and more keys at the same time while watching the live key map to see when inputs stop appearing.'],
            ['question' => 'Is 6KRO enough for gaming?', 'answer' => 'For many games, yes, but some players and combinations benefit from higher rollover or better anti-ghosting support.']
        ],
        'stuck_key_test' => [
            ['question' => 'How do I test a stuck keyboard key online?', 'answer' => 'Open the keyboard tester, press the problem key several times, and check whether it highlights, repeats unexpectedly, or fails to release.'],
            ['question' => 'Can this help with repeating keys?', 'answer' => 'Yes. A repeating key often shows up as rapid repeated input or a key that appears to stay active longer than expected.'],
            ['question' => 'What causes a stuck key?', 'answer' => 'Common causes include debris, liquid damage, worn switches, damaged membranes, or a hardware fault in the keyboard matrix.']
        ],
        'test_my_mic' => [
            ['question' => 'How do I test my mic quickly?', 'answer' => 'Click start, allow microphone access, speak normally, and watch the live meter and peak indicator respond to your voice.'],
            ['question' => 'Does this page record my voice?', 'answer' => 'No. This mic check is designed for live browser-level input confirmation, not recording or uploading audio.'],
            ['question' => 'Why does my mic show no activity?', 'answer' => 'Check browser permission, verify the mic is not muted, and confirm the correct input device is active in your system settings.']
        ],
        'microphone_volume_test' => [
            ['question' => 'How do I test microphone volume online?', 'answer' => 'Start the live mic meter, allow permission, speak at your normal volume, and watch the current level plus peak value.'],
            ['question' => 'What is a good microphone volume?', 'answer' => 'You want visible input activity without clipping or constant silence. The right level depends on your voice, mic, and meeting or recording app settings.'],
            ['question' => 'Does this page record audio?', 'answer' => 'No. It is designed for live volume checking only and does not record or upload your voice.']
        ],
        'camera_resolution_test' => [
            ['question' => 'How do I test webcam resolution online?', 'answer' => 'Allow camera access, choose a resolution preset, and compare the live preview with the reported output dimensions.'],
            ['question' => 'Why does my webcam look blurry at 1080p?', 'answer' => 'Resolution is only one factor. Lighting, focus, compression, and sensor quality also affect sharpness.'],
            ['question' => 'Can I compare multiple webcams?', 'answer' => 'Yes. Switch between available devices in the same browser session and review the reported resolution values.']
        ],
        'double_click_test' => [
            ['question' => 'How do I run a double click test online?', 'answer' => 'Start the detector, click naturally in the test area, and review whether suspiciously fast click intervals appear in the log.'],
            ['question' => 'What does a fast double click mean?', 'answer' => 'A fast interval can point to deliberate user double clicking or possible mouse switch bounce, so you should repeat the test several times for confirmation.'],
            ['question' => 'Does this prove my mouse is broken?', 'answer' => 'Not by itself. It helps surface suspicious click timing, but you should retest on another system and compare with normal use before deciding the switch is faulty.']
        ],
        'ghost_click' => [
            ['question' => 'How do I test for mouse ghost clicks online?', 'answer' => 'Start the detector, choose the mouse button you suspect, and single-click normally. Repeated suspicious intervals on the same button can indicate mouse chatter or switch bounce.'],
            ['question' => 'Which ghost click threshold should I use?', 'answer' => 'Use 150 ms first for a balanced test. Use 80 ms for stricter switch-bounce evidence and 250 ms or 300 ms only for broader troubleshooting.'],
            ['question' => 'Can this test check right-click and middle-click issues?', 'answer' => 'Yes. The detector can isolate left, right, or middle mouse buttons and export a timing report for the session.']
        ],
        'webcam_not_working' => [
            ['question' => 'How do I check if my webcam is working?', 'answer' => 'Allow camera access, confirm the preview appears, and review the device and resolution information shown by the browser.'],
            ['question' => 'Why is my webcam not working in the browser?', 'answer' => 'The most common causes are blocked permission, another app using the camera, or the wrong webcam being selected.'],
            ['question' => 'Can this help if my webcam is black or blank?', 'answer' => 'Yes. A black preview or missing feed can indicate permission, device, cable, or hardware problems that this live test helps isolate.']
        ],
        'take_picture_with_webcam' => [
            ['question' => 'Can I take a picture with my webcam in the browser?', 'answer' => 'Yes. Start the webcam, preview the feed, click the snapshot button, and download the captured image.'],
            ['question' => 'Does this webcam snapshot tool upload my photos?', 'answer' => 'No. Snapshots stay in your browser until you choose to download them.'],
            ['question' => 'Can I take more than one webcam picture?', 'answer' => 'Yes. The tool supports multiple snapshots in one session and can download them afterward.']
        ],
        'scroll_wheel_test' => [
            ['question' => 'How do I test my scroll wheel online?', 'answer' => 'Move the wheel up and down inside the test area and watch the scroll counter plus direction status update in real time.'],
            ['question' => 'Can this page detect reverse or jumpy scrolling?', 'answer' => 'Yes. Inconsistent counts or unexpected direction changes can reveal encoder problems or software settings that need checking.'],
            ['question' => 'Does the scroll wheel test also check middle click?', 'answer' => 'Yes. You can press the wheel as a middle click in the same mouse test panel.']
        ],
        'scan_qr_from_image' => [
            ['question' => 'Can I scan a QR code from a screenshot?', 'answer' => 'Yes. Upload the screenshot file and the tool will try to decode the QR locally in your browser.'],
            ['question' => 'Does this QR scanner need camera access?', 'answer' => 'No. This page is built for saved screenshots, photos, and downloaded QR images.'],
            ['question' => 'What should I do if the QR image does not decode?', 'answer' => 'Try a sharper screenshot or crop closer to the QR code so the decoder can read it more easily.']
        ],
        'screenshot_to_text' => [
            ['question' => 'Can I extract text from a screenshot online?', 'answer' => 'Yes. Upload the screenshot and the OCR tool will convert visible text into editable output.'],
            ['question' => 'What screenshots work best for OCR?', 'answer' => 'Sharp screenshots with clear text and a clean background usually produce the best OCR output.'],
            ['question' => 'Why should I crop the screenshot before OCR?', 'answer' => 'Tighter crops remove extra UI noise and often improve recognition accuracy.']
        ],
        'photo_to_text' => [
            ['question' => 'Can I convert a photo to text online?', 'answer' => 'Yes. Upload a phone photo or document image and the OCR tool will extract the readable text in your browser.'],
            ['question' => 'What photos work best for OCR?', 'answer' => 'Sharp, well-lit photos with clear contrast between text and background usually give the best results.'],
            ['question' => 'Can I use this for receipts or labels?', 'answer' => 'Yes. Receipts, labels, signs, and printed documents are common photo-to-text OCR use cases.']
        ],
        'mouse_dpi_calc' => [
            ['question' => 'How do I calculate my mouse DPI?', 'answer' => 'DPI equals pixel movement divided by physical inches moved. Drag inside the pad a known distance (for example 4 inches), release, and the tool computes true DPI automatically.'],
            ['question' => 'Is the advertised DPI of my mouse accurate?', 'answer' => 'Not always. Cheaper sensors can deviate 5-15% from their advertised DPI. Flagship gaming sensors like PAW3395 or HERO usually stay within 1%.'],
            ['question' => 'Should I disable mouse acceleration before measuring DPI?', 'answer' => 'Yes. Turn off Enhance pointer precision on Windows and set pointer speed to the middle notch, otherwise the OS distorts the measurement.'],
            ['question' => 'Is the mouse DPI calculator private?', 'answer' => 'Yes. All calculation happens in your browser. No pointer data is uploaded.']
        ],
        'fov_calc' => [
            ['question' => 'How do I convert horizontal FoV to vertical FoV?', 'answer' => 'Use the formula vFoV = 2 * arctan(tan(hFoV/2) / aspect_ratio). The calculator does this automatically - just enter your hFoV, aspect ratio, and read vFoV from the table.'],
            ['question' => 'Which games use horizontal FoV vs vertical?', 'answer' => 'CS2, Valorant, Fortnite and Unreal-engine games use horizontal. Apex Legends, Overwatch and Quake/idTech games use vertical. Call of Duty asks for 4:3 horizontal (Hor+ scaled).'],
            ['question' => 'What is Hor+ scaling?', 'answer' => 'Hor+ keeps vertical FoV constant as the screen widens, extending the horizontal view on ultrawide monitors. This is the standard in modern FPS games and the scaling this calculator uses.'],
            ['question' => 'Does ultrawide 21:9 give a FoV advantage?', 'answer' => 'Yes. With Hor+ scaling, a 21:9 monitor shows more horizontal peripheral view than 16:9 for the same vertical FoV, helping you spot flanks earlier.']
        ],
        'crosshair_gen' => [
            ['question' => 'How do I apply the generated crosshair in CS2?', 'answer' => 'Open the CS2 developer console with the tilde key (~), paste the copied console command, and press Enter. Add the command to autoexec.cfg so it loads every match.'],
            ['question' => 'Can I use this for Valorant?', 'answer' => 'Yes. The Valorant panel shows the exact values (color RGB, outline, center dot, inner line thickness/length/offset) to punch into Settings > Crosshair in Valorant.'],
            ['question' => 'Does the PNG overlay have a transparent background?', 'answer' => 'Yes. The downloaded PNG has a fully transparent background so it works as an overlay in OBS or crosshair utilities like HudSight.'],
            ['question' => 'Which crosshair do CS2 pros use?', 'answer' => 'Most CS2 pros use small static crosshairs (style 4) with thickness 1, outline on, and bright green (0,255,0). s1mple and NiKo are good starting presets.']
        ],
        'mouse_drift' => [
            ['question' => 'What is mouse drift?', 'answer' => 'Mouse drift is unwanted cursor movement when your hand is not touching the mouse. The sensor incorrectly reports motion from surface noise, firmware bugs, or damaged optics.'],
            ['question' => 'How long should I run the drift test?', 'answer' => '30 seconds is enough to spot obvious drift. Run 3 minutes to detect slow, intermittent drift that only shows up occasionally.'],
            ['question' => 'Why does my mouse drift on a glass desk?', 'answer' => 'Optical sensors need a textured surface to track contrast. Glass and very glossy desks lack texture, which causes the sensor to misread motion. Use a proper mousepad.'],
            ['question' => 'Is any drift at all a problem?', 'answer' => 'No. A few pixels of noise over 60 seconds is normal electronic noise. Only be concerned when total drift exceeds 25 pixels on a good mousepad with acceleration disabled.']
        ],
        'mouse_accel' => [
            ['question' => 'How do I detect mouse acceleration?', 'answer' => 'Swipe the same physical distance on the pad slowly then quickly. If the fast swipe reports more on-screen pixels than the slow one, acceleration is being applied somewhere (Windows, driver, or firmware).'],
            ['question' => 'What ratio means acceleration is on?', 'answer' => 'A fast/slow pixel ratio between 0.95 and 1.05 is linear (no acceleration). A ratio over 1.15 means meaningful acceleration. Ratios above 1.3 indicate aggressive OS or driver acceleration.'],
            ['question' => 'How do I turn off Windows mouse acceleration?', 'answer' => 'Open Control Panel > Mouse > Pointer Options and uncheck Enhance pointer precision. Set pointer speed to the 6/11 notch for a 1:1 response.'],
            ['question' => 'Does disabling acceleration help my aim?', 'answer' => 'Yes. Aim relies on muscle memory that ties hand distance to crosshair distance. Acceleration breaks that link, so every FPS pro plays with it off.']
        ],
        'ppi_calc' => [
            ['question' => 'How do I calculate pixels per inch?', 'answer' => 'Take the square root of (width² + height²) to get the diagonal in pixels, then divide by the diagonal size in inches. The tool does this live as you change any field.'],
            ['question' => 'What PPI counts as Retina or high-DPI?', 'answer' => 'Apple considers roughly 220 PPI for laptops and 300 PPI for phones as Retina. Above that, individual pixels are not distinguishable at normal viewing distance.'],
            ['question' => 'Is PPI the same as DPI?', 'answer' => 'Not quite. PPI is pixels per inch on a display, DPI is dots per inch in print. The math is identical but the output medium differs.'],
            ['question' => 'Why does my 4K 32-inch monitor feel less sharp than 4K 27-inch?', 'answer' => 'Because the 32-inch spreads the same 3840x2160 across a bigger area, so PPI drops from ~163 to ~138. Sit further back or accept softer text.']
        ],
        'aspect_calc' => [
            ['question' => 'How do I calculate aspect ratio?', 'answer' => 'Aspect ratio is width divided by height. For 1920x1080: 1920/1080 = 1.7778, which simplifies to 16:9 by dividing both sides by the greatest common divisor (120).'],
            ['question' => 'What is the aspect ratio of a 4K monitor?', 'answer' => 'Standard 4K (3840x2160) is 16:9 — the same as 1080p and 1440p. Ultrawide 4K (5120x2160) is 21:9, and super-ultrawide (7680x2160) is 32:9.'],
            ['question' => 'How do I resize an image without distortion?', 'answer' => 'Keep the aspect ratio constant. If you scale height from 1080 to 720, multiply width by the same factor: 1920 * (720/1080) = 1280. The calculator does this automatically.'],
            ['question' => 'Is 16:10 better than 16:9 for work?', 'answer' => '16:10 gives ~11% more vertical space at the same width, useful for code and documents. 16:9 is better for video content since most media is mastered at that ratio.']
        ],
        'screen_size_calc' => [
            ['question' => 'How wide is a 55-inch TV?', 'answer' => 'A 55-inch 16:9 TV is 47.9 inches wide and 27.0 inches tall (121.7 cm x 68.6 cm). A 55-inch 21:9 ultrawide is 50.6 inches wide and 21.7 inches tall.'],
            ['question' => 'Is screen size measured diagonally?', 'answer' => 'Yes. All TV and monitor sizes advertised (e.g. 27-inch, 55-inch) are the length of the visible diagonal, measured corner to corner.'],
            ['question' => 'How do I convert screen diagonal to width?', 'answer' => 'Multiply diagonal by aspect_w / sqrt(aspect_w^2 + aspect_h^2). For 16:9 that factor is 16/sqrt(337) ≈ 0.8716. So 55 inch diagonal * 0.8716 = 47.94 inches wide.'],
            ['question' => 'What aspect ratio is my TV?', 'answer' => 'Almost all TVs since 2007 are 16:9. Recent ultrawide monitors are 21:9. Phones in portrait are typically 9:16 or 9:19.5.']
        ],
        'fps_test' => [
            ['question' => 'How do I test my FPS in the browser?', 'answer' => 'Click Start. The tool uses requestAnimationFrame to count frames per second. Keep the tab focused — browsers throttle background tabs to 30 FPS or less.'],
            ['question' => 'What is 1% low FPS?', 'answer' => '1% low is the average frame rate of the slowest 1% of frames over your run. It represents the stutter floor — what gameplay actually feels like during the worst hitches.'],
            ['question' => 'Why does my FPS cap at 60?', 'answer' => 'Because your monitor refresh rate is 60 Hz. The browser cannot render faster than your display updates. Enable higher refresh in Windows Display Settings > Advanced.'],
            ['question' => 'Does this measure game FPS?', 'answer' => 'No. This measures browser frame rate. Actual in-game FPS depends on the game engine and GPU. Most games have their own FPS overlay (Steam, GeForce Experience, RTSS).']
        ],
        'resolution_test' => [
            ['question' => 'What is my screen resolution?', 'answer' => 'The tool shows both your CSS screen resolution and your native physical resolution (CSS × device pixel ratio). Most browsers report CSS pixels by default for text rendering consistency.'],
            ['question' => 'What is device pixel ratio?', 'answer' => 'Device pixel ratio (DPR) is how many physical pixels the browser uses to render one CSS pixel. DPR 1 is standard, 2 is Retina / HiDPI, 3 is common on high-end phones.'],
            ['question' => 'Why does my 4K monitor show 2560x1440?', 'answer' => 'Because Windows display scaling (125% or 150%) reduces the reported CSS resolution. The tool also shows native resolution, which multiplies the CSS value by DPR to reveal the true pixel count.'],
            ['question' => 'What is the color gamut of my display?', 'answer' => 'The tool queries CSS media queries for color-gamut support and reports sRGB, DCI-P3, or Rec. 2020. Most laptops and phones since 2020 support DCI-P3.']
        ],
        'apm_test' => [
            ['question' => 'What is a good APM for StarCraft II?', 'answer' => 'Gold players average 100-140 APM, Platinum 150-200, Diamond 200-250, Masters 250-350, and pros 300-450 sustained with peaks over 600.'],
            ['question' => 'What counts as an action?', 'answer' => 'Every mouse click (left, middle, right) and every non-modifier keystroke. Shift, Control, Alt, Meta on their own do not count — matching how in-game APM counters work.'],
            ['question' => 'How is APM different from CPS?', 'answer' => 'CPS (clicks per second) measures raw mouse speed. APM measures every input per minute including keyboard. APM is the RTS and MOBA benchmark; CPS is the Minecraft PvP benchmark.'],
            ['question' => 'Does high APM equal skill?', 'answer' => 'Raw speed helps but effective APM (meaningful inputs) matters more. Pros often have high raw APM from hotkey drills but only 40-60% of actions are strictly useful.']
        ],
        'mouse_spin' => [
            ['question' => 'How does the mouse spin test count rotations?', 'answer' => 'It treats the pad center as an origin, computes the angle from center to your cursor on every pointer event, and sums the angular deltas (wrapped into ±180 degrees). Every 360 degrees of accumulated rotation equals one full spin.'],
            ['question' => 'What is a good spin count?', 'answer' => 'Over a 30-second round: under 10 is casual, 10-20 is average, 20-40 is fast, and 40 or more is very fast (usually high-DPI fingertip grip).'],
            ['question' => 'Why did my spin count plateau?', 'answer' => 'Most likely you exceeded your mouse sensor maximum tracking speed (IPS). Cheap optical sensors stop reporting motion past 50-100 IPS, which caps your spin rate.'],
            ['question' => 'Clockwise or counter-clockwise matters?', 'answer' => 'Only for the label on screen. Both directions count the same toward the total spin tally.']
        ],
        'burn_in' => [
            ['question' => 'How do I tell burn-in from image retention?', 'answer' => 'Run the full color cycle at fullscreen for 10-30 minutes. If the ghost fades away, it was temporary image retention. If it remains, it is permanent burn-in.'],
            ['question' => 'Does the scrolling refresher actually fix OLED burn-in?', 'answer' => 'It helps short-term image retention by exercising every pixel evenly. It does not and cannot fix permanent burn-in where subpixel emitters have degraded.'],
            ['question' => 'How long should I run the refresher?', 'answer' => 'Four to eight hours for mild retention. This is similar to what an OLED TV does during its overnight pixel-refresh cycle.'],
            ['question' => 'Which content causes OLED burn-in?', 'answer' => 'Static high-contrast elements displayed for long periods: taskbars, news tickers, game HUDs, channel logos. Varying the content and lowering brightness prevents it.']
        ],
        'color_range' => [
            ['question' => 'Why are my blacks crushed on HDMI?', 'answer' => 'Your PC is outputting Full RGB but your TV is expecting Limited (16-235), or vice versa. Pick one standard and set both devices to match.'],
            ['question' => 'How do I set Full RGB range?', 'answer' => 'NVIDIA: Control Panel > Change Resolution > Output dynamic range = Full. AMD: Radeon Software > Display > Color Range = Full. Match the TV setting (HDMI Black Level, RGB Range).'],
            ['question' => 'Should I use Full or Limited RGB?', 'answer' => 'Full on PC monitors (they expect every pixel value). Limited only if you connect a PC to a TV specifically designed for video content. Always match both ends.'],
            ['question' => 'Does color range affect gaming?', 'answer' => 'Yes. Wrong range causes crushed shadows (hiding enemies in dark corners) or washed-out highlights (losing detail in sky / explosions).']
        ],
        'screen_uniformity' => [
            ['question' => 'What is IPS glow and is it a defect?', 'answer' => 'IPS glow is a cool blue / purple glow visible at oblique viewing angles in dark content. It shifts as you move. All IPS panels have some — it is not a defect.'],
            ['question' => 'What is backlight bleed?', 'answer' => 'Backlight bleed is harsh white or yellow light leaking along the panel edges on dark content. Unlike IPS glow, it stays fixed regardless of viewing angle. Severe bleed is usually covered by warranty.'],
            ['question' => 'What is clouding?', 'answer' => 'Clouding is milky, cloud-shaped patches of uneven brightness visible at mid-gray. Most common on VA panels. Minor clouding is normal; severe clouding is a QC defect.'],
            ['question' => 'Why test at multiple brightness levels?', 'answer' => 'Some uniformity issues only appear in a specific brightness band. A panel clean at 80 percent may show clouding at 40 percent. Test at 20, 50, and 80 percent.']
        ],
        'sound_test' => [
            ['question' => 'How do I test left and right speakers?', 'answer' => 'Set the channel to Left only — sound should only come from the left speaker or left ear. Repeat with Right only. Use Both to verify stereo output. Ping-pong mode alternates L / R automatically.'],
            ['question' => 'Why is my left channel silent in Both mode?', 'answer' => 'Almost always a wiring issue — TRS jack not fully seated, worn cable, or wrong channel mapping on Bluetooth. If Left only plays correctly but Both does not, the hardware side is at fault.'],
            ['question' => 'Are sine tones safe for my ears?', 'answer' => 'At moderate volume, yes. Sine tones sound louder than music at the same amplitude, so start at 20-30 percent system volume and increase slowly. Stop immediately if ringing occurs.'],
            ['question' => 'What does the sweep test?', 'answer' => 'It ramps logarithmically from 100 Hz to 10 kHz over 8 seconds. You hear where your speakers roll off at the low end (sub-bass they cannot reproduce) and where tweeters fade at the top.']
        ],
        'bass_test' => [
            ['question' => 'What frequency range does this bass test cover?', 'answer' => 'From 20 Hz (the lower limit of human hearing) up to 200 Hz (where bass meets the lower midrange). The full sweep walks that range logarithmically, and the step presets hit the ISO 1/3-octave bass centres: 20, 25, 31, 40, 50, 63, 80, 100, 125, 160, and 200 Hz.'],
            ['question' => 'Why does my laptop not play the 20-40 Hz tones?', 'answer' => 'Most laptop, phone, and earbud drivers are physically too small to move enough air below roughly 60-80 Hz. Silence at 20-40 Hz on those devices is expected, not a defect. A subwoofer or a full-range studio monitor is required to hear sub-bass cleanly.'],
            ['question' => 'Can this test damage my speakers?', 'answer' => 'Only if you run high volume for extended periods. Low-frequency sine waves demand a lot of driver excursion, and past the driver limit they can distort or bottom out. Start at 20-30 percent volume, listen for distortion or cone clack, and stop increasing volume the moment either appears.'],
            ['question' => 'What is the difference between bass and sub-bass?', 'answer' => 'Sub-bass is 20-40 Hz — frequencies you feel more than hear, reproduced cleanly only by subwoofers or full-range monitors. Bass is roughly 40-120 Hz, where kick drums and bass guitars live. Upper bass (120-200 Hz) starts to blend into lower midrange and is easy for almost any speaker.'],
            ['question' => 'Do I need a subwoofer to pass this test?', 'answer' => 'No. You need a subwoofer to pass the sub-bass portion (below 40 Hz). Full-range studio monitors, large bookshelf speakers, and bass-capable over-ear headphones can reproduce most of the 40-200 Hz range without one.']
        ],
        'frequency_response' => [
            ['question' => 'What frequency range does this hearing test cover?', 'answer' => 'From 20 Hz (the lower edge of human hearing) up to 20 kHz (the upper edge). The sweep ramps logarithmically so equal portions of the readout represent equal ratios of frequency, matching how audio engineers chart speaker response.'],
            ['question' => 'Why can I only hear up to 14 kHz?', 'answer' => 'Human hearing loses high-frequency range with age. Healthy 20-year-olds reach 18-20 kHz; 30-year-olds ~17 kHz; 40-year-olds ~15 kHz; 60+ ~11 kHz. A 14 kHz ceiling is normal for the mid-30s to 40s range, or it can indicate hardware roll-off.'],
            ['question' => 'Why is the low end silent on my laptop?', 'answer' => 'Most laptop, phone, and earbud drivers are physically too small to reproduce frequencies below 60-80 Hz. Silence at 20-40 Hz on those devices is expected, not a hearing problem. Use over-ear headphones or full-range monitors to test the true low end.'],
            ['question' => 'Is the test safe for my hearing?', 'answer' => 'At moderate volume, yes. High-frequency sine tones above 10 kHz can be damagingly loud without feeling loud. Start at 20-30 percent volume, stop if the tone becomes uncomfortable, and never run this test around children or pets whose hearing extends further than yours.']
        ],
        'accelerometer_test' => [
            ['question' => 'What does a healthy accelerometer read when flat?', 'answer' => 'Laid flat screen-up, a healthy accelerometer reads approximately X ≈ 0, Y ≈ 0, Z ≈ +9.8 m/s² (gravity). Tilting the device smoothly shifts gravity between the axes.'],
            ['question' => 'Why does my desktop show "not supported"?', 'answer' => 'Most desktops and laptops have no accelerometer hardware. A few convertible laptops do, but the test is designed for phones and tablets, which all ship with a 3-axis inertial measurement unit (IMU).'],
            ['question' => 'Why does iOS need permission for motion?', 'answer' => 'Since iOS 13, Safari gates DeviceMotionEvent behind an explicit user tap to prevent covert motion-based fingerprinting. Our Start button calls DeviceMotionEvent.requestPermission(), which is the only way to ask.'],
            ['question' => 'What does the shake counter detect?', 'answer' => 'It counts events where total linear acceleration (with gravity removed) exceeds 15 m/s², with a 250 ms lockout to avoid counting a single shake as many. Brisk hand-shakes will trigger it; sitting the device on a desk will not.']
        ],
        'gyroscope_test' => [
            ['question' => 'What do alpha, beta, and gamma mean?', 'answer' => 'Alpha is rotation around the vertical axis (0-360° compass heading). Beta is front-to-back tilt (-180 to 180°, zero when flat). Gamma is left-to-right tilt (-90 to 90°, zero when flat).'],
            ['question' => 'What is the difference between gyroscope and accelerometer?', 'answer' => 'Accelerometer measures linear acceleration (including gravity). Gyroscope measures angular velocity. Modern phones fuse both (plus the magnetometer) to report drift-free orientation, which is what this test reads.'],
            ['question' => 'Why does alpha stay at 0 on my tablet?', 'answer' => 'Alpha requires a magnetometer (compass chip). Many tablets and most laptops lack one, so alpha reports 0 or never updates. Beta and gamma rely only on the gyroscope and work on every phone.'],
            ['question' => 'What does Calibrate to zero do?', 'answer' => 'It captures the current orientation as the new reference point so the cube reads 0/0/0 from that position. Useful when the device is sitting in a mount or holder and you want to measure rotation relative to that start.']
        ],
        'vibration_test' => [
            ['question' => 'Why does the phone tab say not supported?', 'answer' => 'navigator.vibrate() is supported on Android in Chrome, Firefox, and Samsung Internet. iOS Safari has never shipped it, so iPhones and iPads will show the "not supported" warning. Use an Android device for phone vibration testing.'],
            ['question' => 'What is dual-rumble on a gamepad?', 'answer' => 'Xbox and PlayStation controllers have two internal motors: a strong motor with a large eccentric weight (low-frequency bass rumble, felt in the palms) and a weak motor with a smaller weight (high-frequency buzz, felt in the fingertips). Games blend the two for different effects.'],
            ['question' => 'Why does my controller show no rumble support?', 'answer' => 'Chrome and Firefox only expose vibrationActuator on controllers that report the dual-rumble HID descriptor. Wired Xbox and official DualShock over USB usually work. Bluetooth can drop the descriptor, and cheap third-party controllers may have no rumble hardware at all.'],
            ['question' => 'Can I damage my controller with 100 percent rumble?', 'answer' => 'Not in a minute or two of testing. Prolonged rumble for tens of minutes can wear the motor brushes or battery faster than normal play, but brief tests are fine. If the rumble sounds rattly or loose, the motor weight may have come unseated and the controller needs service.']
        ],
        'ai_assistant' => [
            ['question' => 'Is the KBT AI assistant free?', 'answer' => 'Yes. The assistant is free, requires no account, and has no paywall. A rate limit of 12 messages per minute per visitor exists only to keep the service fast and prevent abuse — it resets every minute.'],
            ['question' => 'Which AI model powers the assistant?', 'answer' => 'The assistant runs on a Groq-hosted large language model. Groq provides sub-second inference speeds on open LLMs, which is why answers arrive in about a second. The model is not GPT-4 or Claude Opus — it is a mid-sized LLM tuned for fast, focused responses within our hardware-testing domain.'],
            ['question' => 'What languages does the AI assistant support?', 'answer' => 'Eight languages: English, Spanish, French, German, Japanese, Korean, Portuguese, and Arabic. Tap the 🌐 button in the chat header to switch. Tool links in the AI responses automatically route to the localized version of the site where available.'],
            ['question' => 'Is the conversation private?', 'answer' => 'Yes. Chat history is stored only in your browser localStorage — reloading the page clears it. Messages are sent to the Groq API for generation but are not used for training, and we do not log chat content server-side. The only server data kept is a per-session rate-limit counter that resets every minute.'],
            ['question' => 'What can the AI assistant help me with?', 'answer' => 'It is scoped to hardware testing on KeyboardTester.click: picking the right diagnostic tool based on your symptom, explaining technical terms like ghosting or N-key rollover, interpreting test results, and routing you to the correct test page. It will decline off-topic questions (politics, coding, homework, general trivia) — for those, a general AI chatbot like ChatGPT or Claude is a better fit.'],
            ['question' => 'Does the AI replace the test tools themselves?', 'answer' => 'No. The tools are the actual diagnostic. The AI assistant is a guide layer on top — it tells you which test to run and what the numbers mean, but the testing itself happens in the browser-based tools (keyboard tester, mouse tester, screen tester, etc.).']
        ],
        'gamertag_generator' => [
            ['question' => 'Are the generated names unique to me?', 'answer' => 'They are randomly generated on your device and not stored on our servers, but the word pools are shared. Two users generating at the same time could coincidentally land on the same name. Always check availability on your target platform before committing.'],
            ['question' => 'Will these names pass Xbox and PSN filters?', 'answer' => 'Most will. The pools are curated to avoid profanity and trademarked terms. If a specific name is rejected, try a slight variation (swap the noun, remove the number, or pick a different style).'],
            ['question' => 'What is the Xbox gamertag character limit?', 'answer' => 'Xbox Live caps gamertags at 12 characters, allowing letters, numbers, and spaces. PSN allows 3-16 characters with letters, numbers, underscore, and hyphen. Steam allows 2-32 characters. Discord allows 2-32 lowercase characters, period, and underscore.'],
            ['question' => 'Where are my favorites stored?', 'answer' => 'In your browser\'s localStorage. They are not sent to any server and will stay on this device until you clear site data or press Clear favorites. They will not sync between devices or browsers.']
        ],
        'guild_name_generator' => [
            ['question' => 'What character limits do MMO guilds use?', 'answer' => 'World of Warcraft guilds allow 2-24 characters (letters, apostrophes, spaces). FFXIV Free Companies are 4-20 characters (letters, digits only). Destiny 2 clans allow up to 32 characters. Discord servers allow up to 100 characters with full Unicode.'],
            ['question' => 'Will the generator produce trademarked names?', 'answer' => 'The word pools are hand-curated to avoid major trademarked IP, but a random combination could still resemble something official. Always run the generated name past your platform\'s name checker before setting up the guild.'],
            ['question' => 'Can I generate names for non-MMO games?', 'answer' => 'Yes. The same templates work for Destiny 2 clans, Rainbow Six tactics teams, Division 2 clans, Call of Duty clans, and Discord servers. Pick the theme that matches your game\'s tone and adjust max length to fit the platform.'],
            ['question' => 'How are the templates different?', 'answer' => '"Order of the X" and "House of X" lean formal and fantasy. "The Xs" is short and modern. "Adjective + Noun" is the generic two-word standard. "X of Y" is evocative and works well for raid guilds. Pick "Mix it up" to roll across all of them.']
        ],
        'auditory_reaction_time' => [
            ['question' => 'Why is my auditory reaction time faster than my visual?', 'answer' => 'Sound processing takes fewer neural steps than vision. The brainstem handles basic auditory detection before the signal even reaches the cortex, and the auditory cortex is just 2-3 synapses deep. Vision goes retina -> optic nerve -> LGN -> V1 cortex, which is why healthy adults typically test 20-40 ms faster on auditory than visual.'],
            ['question' => 'Why are my times all around 250 ms on Bluetooth headphones?', 'answer' => 'Bluetooth SBC / AAC codecs add 150-250 ms of latency between the browser and your ears. Your actual reaction time is whatever you measure minus that latency. For fair results, use wired headphones or a wired 3.5 mm speaker connection.'],
            ['question' => 'What is a good score on this test?', 'answer' => '140-180 ms is very fast (e-sports pro range). 180-220 ms is above-average. 220-280 ms is the typical adult range. 300+ ms suggests fatigue, sleep deprivation, wireless audio latency, or hearing loss in the test-tone frequency range.'],
            ['question' => 'Why does the test require clicking first?', 'answer' => 'Browsers gate audio playback behind a user gesture to prevent pages from auto-playing sound. The first click arms the Web Audio context so subsequent beeps fire instantly.']
        ],
        'frame_skipping_test' => [
            ['question' => 'How does the test detect a skipped frame?', 'answer' => 'It measures the timestamp delta between each requestAnimationFrame callback. After a 1-second calibration to learn your refresh rate, any frame whose delta exceeds 1.5 times the expected interval is counted as a skip. The number of skipped frames equals round(delta / expected) - 1.'],
            ['question' => 'What counts as "normal" skipping?', 'answer' => '0-3 skips in a 15-second run is normal. Browser garbage collection, background tasks, and compositor events can occasionally steal a frame. 10+ skips suggests a real issue: a background CPU task, a browser extension hooking into every frame, or thermal throttling.'],
            ['question' => 'Why does Firefox show huge jitter?', 'answer' => 'Firefox rounds performance.now() timestamps to 1 ms by default under privacy.resistFingerprinting, which introduces artificial jitter. Check about:config and disable resistFingerprinting for accurate measurement, or use Chrome / Edge which do not round.'],
            ['question' => 'Do I need to run the test full-screen?', 'answer' => 'No, but keep the browser tab focused and visible. Browsers throttle requestAnimationFrame in hidden or minimized tabs, which will show as severe "skipping" that is just the throttle, not a real display issue.']
        ],
        'surround_sound_test' => [
            ['question' => 'Why does only front L/R play on my 5.1 setup?', 'answer' => 'Most browsers only expose 2-channel output via Web Audio, even if your sound card supports 8. When the test detects max 2 channels, it falls back to stereo panning to simulate positioning. For real discrete-channel testing, use the OS sound control panel (Windows Sound -> Configure Speakers -> Test) or your AV receiver\'s built-in tone generator.'],
            ['question' => 'What is the LFE / subwoofer channel?', 'answer' => 'LFE stands for Low-Frequency Effects. It is the .1 of 5.1 or 7.1 and is typically routed to a subwoofer with a crossover around 80 Hz. The test plays a 60 Hz tone through the LFE channel. If your sub is miswired or muted, this is where you catch it.'],
            ['question' => 'How do I tell if my rears are wired correctly?', 'answer' => 'Use the walk-around mode and watch which physical speaker lights up for each channel. FL, FR, C, SUB should move through the front of the room; RL, RR should move to the rears. If rear L/R are reversed, Dolby upmix rotations will feel backwards in movies. Fix by swapping cables at the receiver or remapping in your audio control panel.'],
            ['question' => 'Should I use this with Windows Sonic or Dolby Atmos for Headphones enabled?', 'answer' => 'No. Turn off virtual surround features when testing raw channels. Windows Sonic / Dolby Atmos / DTS Headphone:X are post-processing layers that re-mix multichannel audio into stereo HRTF, which will confuse a channel-identification test.']
        ],
        'cpu_stress_test' => [
            ['question' => 'Is it safe to run a browser CPU stress test?', 'answer' => 'Yes on stock hardware. Modern CPUs throttle their clock speed before temperature damage, and the OS will kill the browser tab before the system freezes. If your laptop gets uncomfortably hot, stop the test. Never disable thermal protection in BIOS/UEFI for a browser benchmark.'],
            ['question' => 'Why does my per-thread rate vary?', 'answer' => 'On hybrid CPUs (Intel 12th-gen+, Apple Silicon, mobile SoCs) not all cores run at the same clock speed. Performance cores hit 3-5 GHz; efficiency cores run at 2-3 GHz. Spawning one worker per logical core will show performance cores at roughly 2x the ops/sec of efficiency cores, by design.'],
            ['question' => 'How does this compare to Cinebench or Geekbench?', 'answer' => 'It does not compare directly. Native benchmarks use hand-tuned SIMD and compiler-optimized loops that are much faster than JavaScript SubtleCrypto. The numbers here are only meaningful across runs on the same machine and browser, which is exactly what you need to spot thermal throttling or a regression.'],
            ['question' => 'Why does the test use SHA-256?', 'answer' => 'SHA-256 is hardware-accelerated on every modern CPU via SHA-NI (Intel) or dedicated instructions on ARM/Apple Silicon. It saturates the execution units without being bottlenecked by memory bandwidth, and it produces output that cannot be cached or optimized away, giving a predictable compute-bound load.']
        ],
        'gpu_stress_test' => [
            ['question' => 'Why is my GPU vendor shown as "hidden"?', 'answer' => 'Chrome redacts WEBGL_debug_renderer_info by default as an anti-fingerprinting measure. Firefox does the same under privacy.resistFingerprinting. To see the real vendor/renderer, visit chrome://gpu in Chrome or look up your GPU in the OS hardware panel.'],
            ['question' => 'What does "SwiftShader" or "llvmpipe" mean?', 'answer' => 'Those are software WebGL renderers that run on the CPU when hardware acceleration is unavailable. If you see them in the renderer string, your browser is not actually using your GPU. Re-enable hardware acceleration in browser settings and update your GPU driver to restore real performance.'],
            ['question' => 'Can I damage my GPU with this test?', 'answer' => 'On stock hardware, no. GPUs throttle their clock and voltage well before thermal damage, and modern drivers monitor junction temperature. On manually overclocked GPUs, sustained load (10+ minutes) can expose an unstable clock that was fine on short benchmarks. Stop if you see artifacts, crashes, or driver resets.'],
            ['question' => 'Why do my FPS drop 30-50% after 30 seconds?', 'answer' => 'Thermal throttling. The GPU is hitting its thermal envelope and dropping clock speed to stay cool. Laptops show this dramatically; desktops with good cooling usually hold steady. If you want steady numbers, improve airflow, re-paste the GPU if it is 3+ years old, or run shorter bursts.']
        ],
        'ai_gpu_test' => [
            ['question' => 'What is an AI GPU test?', 'answer' => 'An AI GPU test checks whether your browser can use GPU acceleration for AI-style workloads. This page detects WebGPU, WebGL2, WebNN, software rendering fallback, and runs a safe matrix multiplication benchmark because matrix math is central to local AI inference.'],
            ['question' => 'Is WebGPU required for browser AI?', 'answer' => 'Not always, but WebGPU is the most important browser API for modern GPU compute. Without WebGPU, many local AI demos fall back to WebAssembly or WebGL and can be much slower.'],
            ['question' => 'What does WebNN support mean?', 'answer' => 'WebNN is an emerging browser API for neural network acceleration through CPU, GPU, or NPU backends. It is useful when available, but many production browser AI tools still use WebGPU or WebAssembly fallbacks.'],
            ['question' => 'Is the GFLOPS number comparable to native CUDA or 3DMark?', 'answer' => 'No. The number includes browser, WebGPU, and JavaScript overhead, so it is best for comparing repeated browser runs on the same machine. Native benchmarks remain better for full hardware ranking.'],
            ['question' => 'Why does the test say software rendering?', 'answer' => 'Software rendering means the browser is using a CPU renderer such as SwiftShader or llvmpipe instead of the actual GPU. Enable hardware acceleration and update GPU drivers before trusting performance results.']
        ],
        'memory_test' => [
            ['question' => 'Why is "heap limit" different from my system RAM?', 'answer' => 'The heap limit is per-browser-tab, not per-system. Chrome desktop typically caps tabs at 4 GB regardless of whether you have 16 GB or 128 GB of system RAM, to prevent one tab from consuming the entire machine. Mobile browsers cap much lower (256-512 MB).'],
            ['question' => 'Is this a replacement for MemTest86?', 'answer' => 'No. This tool measures browser heap behavior, not hardware RAM stability. No JavaScript can access memory directly or test DIMM integrity. For real RAM testing (bad modules, XMP stability, overclock validation) use MemTest86 as a bootable USB, which runs outside any OS.'],
            ['question' => 'Why doesn\'t Firefox / Safari show heap stats?', 'answer' => 'performance.memory is a non-standard Chrome API. Firefox and Safari do not expose it to protect against memory-based fingerprinting. The tool falls back to tracking only what it has allocated itself, capped at 300 MB as a safety.'],
            ['question' => 'What does "Release & GC" actually do?', 'answer' => 'It drops all references to the allocated chunks, making them eligible for garbage collection. The browser\'s GC runs on its own schedule, usually within a few seconds. You should see Used heap drop without doing anything else. If it does not drop, the chunks were tenured into old-generation memory and the GC will reclaim them later.']
        ],
        'ram_latency_calc' => [
            ['question' => 'Why do DDR5 kits have such high CL numbers?', 'answer' => 'CL is in clock cycles, and DDR5 runs cycles much faster than DDR4. DDR5-6000 cycles at 6000 MT/s = 0.333 ns per cycle, so CL30 x 0.333 = 10 ns - the same access time as DDR4-3200 CL16. The cycle count is misleading in isolation; always convert to ns.'],
            ['question' => 'Is lower ns always better?', 'answer' => 'Usually yes for gaming and latency-sensitive workloads. For bandwidth-heavy workloads (rendering, compilation, video encode), higher MT/s with slightly higher ns can win because peak throughput matters more than single-access time. DDR5-7200 CL36 (10 ns) beats DDR5-6000 CL30 (10 ns) in multi-threaded benchmarks despite the tied latency.'],
            ['question' => 'What is the sweet spot for Ryzen 7000 / 9000?', 'answer' => 'DDR5-6000 CL30 with EXPO. It lands at 10 ns, runs Infinity Fabric at a 1:1 ratio (UCLK = MEMCLK), and is well-supported by most motherboards. Pushing beyond 6200 MT/s on AM5 often forces a half-speed IF mode that kills the gains.'],
            ['question' => 'What does the reverse-solve mode do?', 'answer' => 'Given a target access latency (say, 9 ns) and a memory speed (say, 7200 MT/s), it calculates the CL you would need (27). Useful when tuning manual timings: if you can hit CL 27 at 7200, you have beaten the classic 10 ns mark.']
        ],
        'bandwidth_calc' => [
            ['question' => 'Why does my 100 MB file take 8 seconds on 100 Mbps?', 'answer' => 'MB is megabytes; Mbps is megabits per second. 1 byte = 8 bits. 100 MB = 800 megabits. 800 megabits / 100 Mbps = 8 seconds. The bits-vs-bytes confusion is the #1 source of "my Internet is slow" complaints that are actually correct math.'],
            ['question' => 'Why is the real download slower than the calculator says?', 'answer' => 'Real transfers lose 5-15% to TCP/IP overhead, more for high-latency or lossy links. The calculator reports 100% efficient transfer. For realistic estimates, multiply by 1.15 for HTTPS, 1.3-1.5 for VPN, and 2x+ for cellular or congested Wi-Fi.'],
            ['question' => 'Does this handle KB vs KiB correctly?', 'answer' => 'The calculator uses binary KB (1 KB = 1024 bytes) because that is what Windows and most file managers display. If you need strict decimal (1 KB = 1000), the number will be off by ~2.4% per power of 1000 - noticeable only at TB scale.'],
            ['question' => 'Why don\'t LAN transfers match the calculator on gigabit?', 'answer' => 'They often do, actually. Modern NICs and SMB drivers routinely hit 95-98% of gigabit line rate on a wired local network. If you are seeing much less, the bottleneck is disk speed (a slow 5400-rpm HDD cannot feed gigabit) or a cheap switch dropping to 100 Mbps on one port.']
        ],
        'download_time_calc' => [
            ['question' => 'Which of the three numbers should I trust?', 'answer' => 'The realistic estimate (85% of theoretical). That matches what HTTPS downloads from a good CDN typically deliver. The theoretical is best-case and rarely matches reality; the slow-path is a pessimistic bound for congested evenings or distant servers.'],
            ['question' => 'Why do modern AAA games take 200 GB?', 'answer' => 'Uncompressed 4K textures, multiple language audio tracks installed by default, pre-rendered cutscenes at high bitrate, and multiplayer assets. Games trade disk space for load-time performance - decompressing on load would use too much CPU/GPU time.'],
            ['question' => 'Is Wi-Fi a bottleneck on gigabit Internet?', 'answer' => 'Often yes. Wi-Fi 5 tops out around 400-600 Mbps in good conditions. Wi-Fi 6 can deliver 600-900 Mbps to a single client. A wired Ethernet connection avoids the uncertainty. If you are on gigabit and downloads stall at 400 Mbps, blame the Wi-Fi before blaming your ISP.'],
            ['question' => 'How can I speed up an actual download?', 'answer' => 'Use wired Ethernet, pause other devices streaming, switch Steam/Epic download region to a less-congested server, use 1.1.1.1 or 8.8.8.8 DNS, and turn off VPN. For game clients specifically, check for a client-side download speed cap (Steam has one in Settings > Downloads).']
        ],
        'raid_calc' => [
            ['question' => 'Is RAID 5 still safe with large drives?', 'answer' => 'For drives 8 TB or larger, most storage engineers now recommend RAID 6 over RAID 5. The reason is rebuild time: reconstructing a failed drive from parity can take 24-48 hours on a large array, during which a second drive failure would be catastrophic. RAID 6 tolerates a second failure mid-rebuild.'],
            ['question' => 'What is the difference between RAID 10 and RAID 5?', 'answer' => 'RAID 10 mirrors data across pairs, then stripes those pairs, delivering excellent random I/O performance but consuming 50% of raw capacity. RAID 5 stripes with a single parity drive, giving better capacity efficiency (~83% on 6 drives) but slower writes due to the parity write penalty. RAID 10 for database and VM workloads; RAID 5 for bulk storage.'],
            ['question' => 'Does RAID replace backups?', 'answer' => 'No. RAID protects against physical drive failure within its parity budget. It does not protect against ransomware, accidental deletion, filesystem corruption, fire, flood, or theft - all of which can affect every drive in the array at once. Always maintain separate backups on top of RAID, following the 3-2-1 rule.'],
            ['question' => 'What is the minimum number of drives for each RAID level?', 'answer' => 'RAID 0 and RAID 1 need 2 drives. RAID 5 needs 3. RAID 6 needs 4. RAID 10 needs 4 (and always an even number). RAID 50 needs at least 6 (two groups of 3). RAID 60 needs at least 8 (two groups of 4). More drives give you more capacity and often better performance, but also more opportunities for a drive to fail.']
        ],
        'ttk_calc' => [
            ['question' => 'How is TTK calculated exactly?', 'answer' => 'Bullets to kill = ceiling of target HP divided by effective per-bullet damage. TTK = (bullets-to-kill minus one) times milliseconds between shots. The first bullet has a TTK of zero because it lands immediately; we only add travel time for subsequent bullets. A one-shot-kill weapon has TTK = 0 ms.'],
            ['question' => 'Why are the CS2 AK-47 numbers different with and without armor?', 'answer' => 'CS2 Kevlar reduces damage taken by about 22% on bullets to the chest. The AK-47 deals 36 damage unarmored but only around 27 damage against a Kevlar-helmet target, changing a 3-shot kill into a 4-shot kill. Our calculator models this with the armor percentage field.'],
            ['question' => 'What headshot multiplier should I enter for my game?', 'answer' => 'CS2 and most Source-engine games use 4x for rifles. Valorant uses 3.5x on most weapons. Apex Legends uses 2x on most weapons. Call of Duty modern titles are around 1.3-1.5x. Overwatch hero multipliers vary from 1x (no headshot) to 2x. Check your game\'s wiki for the exact number per weapon.'],
            ['question' => 'Does TTK matter more than DPS?', 'answer' => 'For competitive duels, TTK matters more because it determines who wins a same-time trade. DPS matters for sustained engagement across multiple targets. The calculator shows both so you can compare weapons that have similar DPS but very different TTK, which is a common balance pattern.']
        ],
        'minecraft_circle' => [
            ['question' => 'Why do small Minecraft circles look jagged?', 'answer' => 'A circle in a grid is always an approximation. Small circles (radius under 8) have so few blocks that every step of the approximation is visually obvious. Above radius 10 the shape reads as round; above radius 30 the stair-stepping is barely noticeable at normal gameplay distance.'],
            ['question' => 'How do I build a perfect sphere?', 'answer' => 'Use sphere layer mode. Set offset to -R (bottom of the sphere) and build that disc. Increment offset by 1, move up one block in game, and build the next layer. Continue until offset = +R. The generator shows the "Sphere total" block count so you know how many you need to mine before starting.'],
            ['question' => 'Can I make a half sphere (dome)?', 'answer' => 'Yes. Use sphere layer mode starting at offset 0 (equator) and increment up to +R. That gives you the top half of a sphere, which is a dome. For a bowl shape, run offsets -R to 0. Our tool plays only one slice at a time so you can verify each layer before placing blocks.'],
            ['question' => 'What is the maximum radius the tool supports?', 'answer' => 'Radius 256 blocks. That produces a 513 x 513 disc with up to ~206,000 blocks in filled mode, or a 71 million block solid sphere. The algorithm is fast enough to render instantly at any radius in that range; your in-game build time will be the real limit.']
        ],
        'monitor_sharpness_test' => [
            ['question' => 'Why does the 1px pixel grid look like wavy bands instead of solid grey?', 'answer' => 'You are not running at the panel native resolution, your OS scaling is set to a fractional value (125% or 150%), or your browser zoom is not 100%. Each of those breaks the 1:1 mapping between drawn pixels and physical pixels, which is why the grid moires. Set browser zoom to 100% (Ctrl+0), use a round OS scaling value (100% or 200%), and confirm you are at native resolution.'],
            ['question' => 'What is the correct "Sharpness" setting on my monitor?', 'answer' => 'Neutral. Most monitors have a 0-100 sharpness slider where 0 or 5 is the neutral pass-through value and anything higher applies edge enhancement that creates halos around text. Use this test to find the value where the 1px checker patterns look uniform mid-grey at arm length and text edges have no halo - that is neutral.'],
            ['question' => 'Why do I see red and blue halos around text on my OLED monitor?', 'answer' => 'OLEDs often use a non-standard sub-pixel layout (PenTile, RWBG, or QD-OLED triangular) instead of the RGB stripe LCDs use. Sub-pixel font anti-aliasing (ClearType on Windows, sub-pixel rendering on Linux) is tuned for RGB stripe and produces visible color fringing on these panels. The fix is to disable sub-pixel rendering and use grayscale anti-aliasing only - macOS does this automatically on Retina, Windows requires re-tuning ClearType.'],
            ['question' => 'Does this replace the Lagom LCD sharpness test?', 'answer' => 'It serves the same purpose. Lagom is a static image with a single sharpness pattern; this tool draws the patterns dynamically at your device pixel ratio so they remain pixel-perfect on HiDPI displays where a static image would be upscaled. It also adds multi-size text samples, color fringing blocks, and a sub-pixel ruler that the original Lagom page does not include.']
        ],
        'pitch_detector' => [
            ['question' => 'How accurate is browser-based pitch detection?', 'answer' => 'Plus or minus 1-3 cents on a clean sustained note, which beats the resolution of human hearing. Accuracy degrades on breathy, very low (under 80 Hz), or very high (over 2 kHz) sources because the autocorrelation window has fewer cycles to lock onto. For sung vowels in the 100-1000 Hz range, the detector is solidly tuner-grade.'],
            ['question' => 'Why does the note jump up an octave when I sing low?', 'answer' => 'Low voices and bass instruments often have a stronger second harmonic than fundamental, and autocorrelation can briefly latch onto the harmonic instead. Sing slightly louder, move 15-30 cm closer to the mic, and use sustained vowels like "ah" or "oo" to strengthen the fundamental.'],
            ['question' => 'What is the difference between Hz and cents?', 'answer' => 'Hz is the absolute frequency (vibrations per second). Cents is a relative measure of how far you are from the nearest semitone, on a scale where 100 cents equals one semitone. The detector reports both: Hz tells you what frequency you are producing; cents tells you whether that frequency lines up with standard tuning (A4 = 440 Hz).'],
            ['question' => 'Is my voice uploaded anywhere?', 'answer' => 'No. All audio processing happens in your browser via the Web Audio API. The mic stream feeds directly into a local AnalyserNode and the autocorrelation runs on your CPU. Nothing is sent to our servers and nothing is recorded.']
        ],
        'webcam_mirror' => [
            ['question' => 'Is this webcam mirror really free, and does it upload my video?', 'answer' => 'Yes. The tool is free, runs entirely in your browser via getUserMedia, and never sends the video to a server. The MediaStream stays local and is destroyed when you close the tab or click Stop.'],
            ['question' => 'Why is the mirror flip on by default?', 'answer' => 'A raw camera feed shows you not-mirrored, which feels wrong for grooming, makeup, and posture work because raising your right hand looks like raising your left on screen. Mirror mode flips the preview horizontally so it behaves exactly like a wall mirror. You can toggle it off any time.'],
            ['question' => 'Can I use this on a phone or tablet?', 'answer' => 'Yes. Any modern mobile browser (Chrome, Safari, Edge, Firefox) on an HTTPS page supports getUserMedia. Tap Start mirror, allow camera access, and prop the device on a stand to use it as a vanity or fitting mirror.'],
            ['question' => 'Does the snapshot include the mirror flip and the brightness/contrast adjustments?', 'answer' => 'Yes. The snapshot is rendered through a canvas with the same horizontal flip and the same CSS-style brightness and contrast filter, so the saved PNG matches what you saw on screen.']
        ],
        'hearing_age_test' => [
            ['question' => 'Is this hearing age test medically accurate?', 'answer' => 'No. This is a screening tool, not a clinical audiogram. A real audiogram is conducted in a sound-treated booth with calibrated equipment at speech frequencies (250 Hz to 8 kHz). This online test focuses on extended-high frequencies (8 kHz to 22 kHz) on uncalibrated consumer hardware, so the result is approximate. Use it as a fun curiosity check; if you suspect real hearing loss, see an audiologist.'],
            ['question' => 'Why do headphones matter so much for this test?', 'answer' => 'Most laptop speakers, phone speakers, and cheap earbuds roll off sharply above 14-16 kHz - the driver simply cannot reproduce frequencies that high. If you fail to hear 17 kHz on a laptop speaker, that is the speaker, not your ears. Wired over-ear or in-ear headphones with a known frequency response give the most honest result.'],
            ['question' => 'What is the mosquito tone?', 'answer' => 'The mosquito tone is a 17,400 Hz sine wave. It got its name from the Mosquito anti-loitering device, deployed in UK shops from 2005 onward because the tone was painful to teenagers but inaudible to most adults over 25. It is the classic informal age test: if you can clearly hear 17.4 kHz through quality headphones at moderate volume, your high-frequency hearing is younger than the average 25-year-old\'s.'],
            ['question' => 'Will Bluetooth or wireless headphones affect my result?', 'answer' => 'Yes, often dramatically. SBC and AAC Bluetooth codecs apply a low-pass filter above 16-20 kHz to save bandwidth, so your wireless headphones may be silently cutting the very frequencies the test depends on. For accurate hearing-age results use wired 3.5mm or wired USB-C headphones. If you only have Bluetooth, expect your result to skew older than reality.']
        ],
        'online_ruler' => [
            ['question' => 'Why does the online ruler look smaller or bigger than my real ruler?', 'answer' => 'Pixel size varies by display. A 96 DPI office monitor has pixels roughly three times wider than an iPad Retina display, so a fixed-pixel ruler will look correct on one screen and wrong on another. Calibrate using the credit-card overlay: drag the right-hand handle until the dark card matches a real ISO ID-1 card (85.6 x 54 mm) sitting on your screen, then click Save. The ruler will be accurate for that browser and zoom level until you change them.'],
            ['question' => 'How accurate is credit-card calibration?', 'answer' => 'Very accurate. Credit cards, debit cards, and government IDs are manufactured to ISO/IEC 7810 ID-1 with a tolerance under 0.1 mm, so any card from any wallet is the same size. After calibration the ruler holds within roughly 0.5 mm, which is sufficient for sewing, woodworking layout, model-making, school assignments, and verifying that printable PDFs are rendering at 1:1 scale.'],
            ['question' => 'Does browser zoom affect the online ruler?', 'answer' => 'Yes. Browser zoom of anything other than 100% multiplies every rendered pixel and breaks the calibration. Press Ctrl+0 (Windows) or Cmd+0 (Mac) to reset to 100%, then recalibrate. The same applies to Windows display scaling and macOS "More Space" mode -- if you change either, recalibrate. The tool stores your pixelsPerMm in localStorage so it stays accurate between sessions as long as nothing below the page changes.'],
            ['question' => 'Can I use the online ruler on a phone or tablet?', 'answer' => 'Yes, and credit-card calibration is even more important on mobile. Phone DPIs vary widely (300-500+ depending on model) and the DPI presets in the dropdown are mostly desktop values, so they will not be correct for your specific phone. Use a real card to calibrate once and the setting will be remembered. The drag handle works with touch, and the vertical orientation toggle is useful for phones held in portrait.']
        ],
        'view_dist_calc' => [
            ['question' => 'How far should I sit from a 55-inch 4K TV?', 'answer' => 'THX recommends about 6 feet (for 36 degree FoV), SMPTE recommends about 7 feet (30 degree FoV). Beyond 7 feet you stop benefiting from 4K resolution at that size.'],
            ['question' => 'Does 4K matter at my couch distance?', 'answer' => 'Only if you sit within roughly 1.5 screen heights. For an 8 foot viewing distance, 4K shows visible benefit on 65 inch and larger panels. On smaller screens from that distance, 4K is indistinguishable from 1080p.'],
            ['question' => 'What is the THX recommended viewing distance?', 'answer' => 'THX recommends a 36 degree horizontal field of view, which is immersive like a cinema. Distance = screen width / 2 / tan(18 degrees). For a 55 inch 16:9 TV that is about 5.7 feet.'],
            ['question' => 'How close is too close to a monitor?', 'answer' => 'Stay outside arm distance divided by 1.6 to avoid eye tracking strain. For a 27 inch monitor that is roughly 22 to 28 inches. Closer than that and you constantly move your eyes side to side.']
        ],
        'edpi_calc' => [
            ['question' => 'How do I calculate eDPI?', 'answer' => 'eDPI equals mouse DPI multiplied by in-game sensitivity. For example 800 DPI at 0.5 sensitivity gives 400 eDPI.'],
            ['question' => 'What is a good eDPI for CS2 or Valorant?', 'answer' => 'Most CS2 and Valorant pros play between 200 and 400 eDPI. Apex Legends pros use 800-1600 eDPI because of the faster look speed.'],
            ['question' => 'What is cm/360?', 'answer' => 'cm/360 is the physical mouse distance needed for a full 360-degree in-game turn. It is derived from eDPI and the game yaw multiplier.'],
            ['question' => 'Can I compare eDPI across games?', 'answer' => 'Yes, but only if you also match yaw multipliers. Valorant uses 0.07 while Source engine games use 0.022, which changes cm/360 for the same eDPI.']
        ],
        'dpi_tester' => [
            ['question' => 'How do I test my mouse DPI online?', 'answer' => 'Place a real ruler under your mouse, set the known distance in the tool, then drag the mouse exactly that distance in a straight line. The tool measures the cursor pixel travel and divides by your physical distance to calculate true DPI. Repeat 3 times and average the results for best accuracy.'],
            ['question' => 'What is a good DPI for gaming?', 'answer' => 'Most competitive FPS pros use 400 to 800 DPI for precision. MOBA and RTS players use 800 to 1200 DPI. Casual gamers and productivity users do well at 800 to 1600 DPI. Higher-resolution displays (1440p, 4K) often need 1600 to 2400 DPI to traverse the screen comfortably.'],
            ['question' => 'Why does my measured DPI differ from my mouse advertised DPI?', 'answer' => 'Three common causes: (1) Windows pointer speed multiplier — set it to the 6th notch (no enhancement) for accurate measurement; (2) "Enhance pointer precision" enabled — turn this OFF; (3) software-stepped DPI in your gaming mouse driver — set the mouse to native sensor DPI (typically 400, 800, 1600 step values).'],
            ['question' => 'What is DPI vs CPI in mouse specifications?', 'answer' => 'DPI (Dots Per Inch) and CPI (Counts Per Inch) measure the same thing — how many pixel movements the cursor reports per inch of physical mouse travel. "CPI" is technically more accurate (mice count, they do not draw dots), but "DPI" is the industry-standard term used by virtually all manufacturers.'],
            ['question' => 'Can I check DPI without a ruler?', 'answer' => 'You need some known reference distance. A credit card (85.6mm wide), a US dollar bill (155.96mm long), or any object with documented dimensions works. The tool uses your physical reference to calibrate. Without any physical reference, browser-based DPI measurement is impossible because pixels do not have a fixed real-world size.'],
            ['question' => 'Does this DPI test work on a laptop touchpad?', 'answer' => 'Touchpads do not have a meaningful DPI in the same sense as mice — they use absolute positioning with acceleration curves applied by the OS. The tool will produce a number, but it will not match anything published by the laptop manufacturer. Use the tool with an external mouse for meaningful results.']
        ],
        'qr_generator' => [
            ['question' => 'How do I generate a QR code online for free?', 'answer' => 'Type or paste your text, URL, phone number, or email into the QR generator. The QR code is created instantly in your browser. Right-click the generated image and choose Save Image As, or use the download button to save as PNG. No signup or watermark.'],
            ['question' => 'What can I encode in a QR code?', 'answer' => 'Anything that fits in text: website URLs, plain text, phone numbers (tel:), email addresses (mailto:), Wi-Fi credentials, vCards, calendar events, app store links, and more. Maximum capacity depends on data type — typically 2,953 bytes (alphanumeric) or 7,089 numeric digits.'],
            ['question' => 'Are QR codes generated by this tool free to use commercially?', 'answer' => 'Yes. QR codes themselves are an open ISO standard (ISO/IEC 18004) and free to use commercially. The QR codes you generate here have no licensing or attribution requirement and can be printed on products, business cards, packaging, or marketing materials.'],
            ['question' => 'Do generated QR codes ever expire?', 'answer' => 'No. The QR code itself is just a visual encoding of the data — it never expires. However, if the QR code points to a URL, that URL may go offline. For long-term use, point QR codes at stable URLs or your own domain rather than third-party shorteners.'],
            ['question' => 'Is my data sent anywhere when I generate a QR code?', 'answer' => 'No. The QR code is generated entirely in your browser using client-side JavaScript. The text you enter is never sent to any server. You can verify this by opening browser dev tools and watching the network tab while you type.'],
            ['question' => 'Can I customize colors or add a logo to the QR code?', 'answer' => 'The basic generator produces standard black-on-white QR codes that scan reliably with any reader. For colored or logo-overlaid QR codes, ensure high contrast (avoid light colors on white backgrounds) and keep the logo small (under 20% of code area) to avoid breaking scan reliability.']
        ],
        'password_generator' => [
            ['question' => 'How do I generate a strong password?', 'answer' => 'Use this tool to generate a password of at least 16 characters mixing uppercase, lowercase, numbers, and symbols. Longer is always better — a 20-character random password takes trillions of years to brute force, while an 8-character password can fall in hours. Click the regenerate button until you get one you can save.'],
            ['question' => 'What makes a password strong?', 'answer' => 'Length matters more than complexity. A 16-character random password is exponentially stronger than an 8-character one with symbols. Avoid dictionary words, names, dates, and reused patterns from other sites. The strongest passwords look random because they are random — generated, not invented.'],
            ['question' => 'Is this password generator safe?', 'answer' => 'Yes. The password is generated entirely in your browser using JavaScript with the Web Crypto API for true randomness. Nothing is sent to any server. We cannot see, log, or recover your generated password — and neither can anyone else. Always copy the password into a password manager before closing the tab.'],
            ['question' => 'Should I use a different password for every site?', 'answer' => 'Yes — and it is the single most important security habit. If one site is breached and your password leaks, attackers will try the same email-and-password combo on every other major service (this is called credential stuffing). Use a password manager to make this practical: one strong master password, unique generated passwords for everything else.'],
            ['question' => 'How long should my password be?', 'answer' => 'Minimum 12 characters for low-stakes accounts, 16 for important accounts (email, banking, password manager), and 20+ for your password manager master password. Most modern password generators default to 16-20 characters, which is a good balance between security and the rare cases you need to type it manually.'],
            ['question' => 'Can I generate passwords without symbols?', 'answer' => 'Yes — use the symbol toggle to exclude special characters. Some legacy systems do not accept symbols (e.g. older banking sites or Wi-Fi WPA networks). For these cases, generate a longer alphanumeric-only password (24+ characters) to compensate for the smaller character set.']
        ]
    ];

    return $faqs[$toolKey] ?? [];
}

/**
 * Generate complete schema for a tool page
 * Returns Organization + WebApplication + Breadcrumb + FAQ schemas combined
 */
function generateToolPageSchema($toolKey, $breadcrumbs = null) {
    $output = '';

    // Always include Organization
    $output .= schemaOrganization();

    // Get tool data and generate WebApplication
    $toolData = getToolSchemaData($toolKey);
    if ($toolData) {
        $output .= schemaWebApplication($toolData);
    }

    // Add breadcrumbs if provided
    if ($breadcrumbs) {
        $output .= schemaBreadcrumbs($breadcrumbs);
    }

    // Add FAQs if available
    $faqs = getToolFAQs($toolKey);
    if (!empty($faqs)) {
        $output .= schemaFAQ($faqs);
    }

    return $output;
}

/**
 * Generate homepage schema
 * Returns Organization + WebSite + WebApplication + Breadcrumb + FAQ schemas
 */
function generateHomepageSchema() {
    $output = '';

    // Organization schema
    $output .= schemaOrganization();

    // WebSite schema (homepage only)
    $output .= schemaWebSite();

    // Site navigation schema — tells Google the key tools/categories for sitelinks
    $output .= schemaSiteNavigation();

    // WebApplication for main keyboard tester
    $keyboardTester = getToolSchemaData('keyboard_tester');
    if ($keyboardTester) {
        $output .= schemaWebApplication($keyboardTester);
    }

    // Homepage breadcrumb (just Home)
    $output .= schemaBreadcrumbs([
        ['name' => 'Home', 'url' => '/']
    ]);

    // Homepage FAQs. Keep these aligned with help/keyboard-tester.php.
    $faqs = [
        [
            'question' => 'How do I test every key on my keyboard?',
            'answer' => 'Focus the tester, press each physical key once, and confirm the matching key highlights on the visual keyboard. Use the key history to spot keys that repeat, miss, or send a different input than expected.'
        ],
        [
            'question' => 'What do the Advanced Options do?',
            'answer' => 'Advanced Options add session statistics, a press-frequency heatmap, sound feedback, guided Test All Keys mode, exportable reports, ghost-click monitoring, and latency checks. Use them when you need evidence, troubleshooting detail, or a deeper gaming-keyboard check.'
        ],
        [
            'question' => 'How should advanced users run a Pro Test?',
            'answer' => 'Open Advanced Options, start Test All Keys, press each key and important shortcut, review Statistics and Heatmap for missed or repeated inputs, run Ghost Click with your hands off the keyboard, sample Latency on the same device, then Export the report. It is a browser-level diagnostic, so use it for troubleshooting evidence and comparisons rather than lab hardware certification.'
        ],
        [
            'question' => 'Why does a key not register in the keyboard tester?',
            'answer' => 'First click inside the tester, then press the key firmly again. If it still does not appear, check your OS keyboard layout, browser focus, and whether another app is intercepting the shortcut. If only one physical key fails, the switch, membrane, or laptop keyboard cable may need cleaning or repair.'
        ],
        [
            'question' => 'Can this detect stuck, repeating, or chattering keys?',
            'answer' => 'Yes. A stuck or chattering key often appears as repeated entries in the key history, a key that stays highlighted too long, or several rapid inputs from one press. Test the problem key slowly, then compare it with nearby keys.'
        ],
        [
            'question' => 'Can I test keyboard ghosting and N-key rollover?',
            'answer' => 'Yes. Hold the combinations you actually use, such as WASD with Shift, Ctrl, Space, or number keys. If a held key does not light up, the keyboard may have a rollover limit or a blocked matrix combination.'
        ],
        [
            'question' => 'Why are Fn, media keys, or Print Screen different?',
            'answer' => 'Some keys are handled by the keyboard firmware or operating system before the browser receives them. Fn usually does not send a browser event, some media keys are intercepted by the OS, and Print Screen can be blocked for security reasons.'
        ],
        [
            'question' => 'Does the tester work with laptops, Mac keyboards, and compact keyboards?',
            'answer' => 'Yes. It works with built-in laptop keyboards, USB keyboards, Bluetooth keyboards, Mac keyboards, and compact layouts in modern browsers. For compact keyboards, test the normal keys first, then test Fn-layer outputs like arrows, Delete, Home, End, and function keys.'
        ],
        [
            'question' => 'Is the keyboard test private and does it need a download?',
            'answer' => 'No download or sign-up is needed. The keyboard test runs in your browser and the key test data is not uploaded to our server.'
        ]
    ];
    $output .= schemaFAQ($faqs);

    return $output;
}
?>
