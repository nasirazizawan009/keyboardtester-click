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
            'email' => 'support@keyboardtester.click',
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
                'url' => $base . 'pages/tools.php'
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
            'name' => 'Ghost Click Detector',
            'description' => 'Free ghost click detector to find phantom clicks and double-click issues. Diagnose mouse hardware problems.',
            'url' => 'ghost-click-detector.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Phantom click detection',
                'Double-click issue finder',
                'Click timing analysis',
                'Hardware issue diagnosis'
            ]
        ],
        'double_click_test' => [
            'name' => 'Double Click Test',
            'description' => 'Free online double click test to inspect suspicious rapid click intervals and possible mouse switch bounce.',
            'url' => 'double-click-test.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Rapid click interval logging',
                'Fast click flagging',
                'Resettable click history',
                'Browser-based mouse check'
            ]
        ],
        'dpi_tester' => [
            'name' => 'Mouse DPI Tester',
            'description' => 'Free mouse DPI and sensitivity tester. Measure and optimize your mouse settings for gaming or work.',
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
            'name' => 'Keyboard Latency Checker',
            'description' => 'Free keyboard latency checker to measure input delay and response time.',
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

    // Homepage FAQs
    $faqs = getToolFAQs('keyboard_tester');
    if (!empty($faqs)) {
        $output .= schemaFAQ($faqs);
    }

    return $output;
}
?>
