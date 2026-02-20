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
            'https://x.com/keyboardtester'
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
        'name' => 'KeyboardTester.Click',
        'alternateName' => 'Keyboard Tester',
        'url' => 'https://keyboardtester.click/',
        'description' => 'Free online keyboard and mouse testing tools',
        'inLanguage' => 'en',
        'publisher' => [
            '@type' => 'Organization',
            'name' => 'KeyboardTester.Click',
            'url' => 'https://keyboardtester.click/'
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
    if ($screenshot && !preg_match('~^https?://~i', $screenshot)) {
        $screenshot = absoluteUrl(ltrim($screenshot, '/'));
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
        'offers' => [
            '@type' => 'Offer',
            'price' => '0',
            'priceCurrency' => 'USD'
        ],
        'provider' => [
            '@type' => 'Organization',
            'name' => 'KeyboardTester.Click',
            'url' => 'https://keyboardtester.click/'
        ]
    ];

    if (!empty($tool['features'])) {
        $data['featureList'] = $tool['features'];
    }

    if ($screenshot) {
        $data['screenshot'] = $screenshot;
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
            'url' => '',
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
            'description' => 'Free online mouse tester to check all buttons, scroll wheel, and click functionality. Test left, right, middle clicks and side buttons.',
            'url' => 'mouse-test.php',
            'category' => 'UtilityApplication',
            'screenshot' => 'images/mouse/mouse-test-guide-1200.png',
            'features' => [
                'Left, right, middle click detection',
                'Scroll wheel testing',
                'Side button testing',
                'Click counter',
                'Double-click detection'
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
            'description' => 'Free online microphone tester to check audio quality and volume levels. Record and playback samples.',
            'url' => 'mic-tester.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Real-time mic testing',
                'Audio level visualization',
                'Sample recording',
                'Volume adjustment'
            ]
        ],
        'webcam_tester' => [
            'name' => 'Online Webcam Tester',
            'description' => 'Free online webcam tester to check video quality and camera functionality. Take test snapshots.',
            'url' => 'webcamtesterindex.php',
            'category' => 'UtilityApplication',
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
            'features' => [
                'Dead pixel detection',
                'Stuck pixel finder',
                'Color accuracy testing',
                'Full-screen test modes'
            ]
        ],
        'headphone_tester' => [
            'name' => 'Headphone & Speaker Tester',
            'description' => 'Free headphone and speaker tester to check left/right audio channels and stereo balance.',
            'url' => 'headphone_speaker_tester_index.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Left/right channel testing',
                'Stereo balance check',
                'Audio quality test',
                'Frequency range test'
            ]
        ],
        'qr_generator' => [
            'name' => 'QR Code Generator',
            'description' => 'Free QR code generator to create custom QR codes for URLs, text, WiFi, and contacts.',
            'url' => 'QR_code_generator_scanner.php',
            'category' => 'UtilityApplication',
            'features' => [
                'URL QR codes',
                'Text QR codes',
                'WiFi QR codes',
                'Contact QR codes',
                'Download options'
            ]
        ],
        'qr_reader' => [
            'name' => 'QR Code Reader',
            'description' => 'Free online QR code reader to scan and decode QR codes using camera or image upload.',
            'url' => 'qr-code-reader.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Camera scanning',
                'Image upload',
                'URL extraction',
                'Text decoding'
            ]
        ],
        'ocr_tool' => [
            'name' => 'OCR Text Extractor',
            'description' => 'Free online OCR tool to extract text from images and screenshots.',
            'url' => 'ocr-tool.php',
            'category' => 'UtilityApplication',
            'features' => [
                'Image text extraction',
                'Screenshot OCR',
                'Multi-language support',
                'Copy to clipboard'
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
        'mouse_tester' => [
            ['question' => 'How do I test my mouse buttons online?', 'answer' => 'Click inside the tester, then press left, middle, and right buttons. Each press updates the counter and highlight.'],
            ['question' => 'How do I test my mouse scroll wheel?', 'answer' => 'Scroll up and down and watch the direction indicator and count to confirm consistent wheel input.'],
            ['question' => 'Can I test double click issues?', 'answer' => 'Yes. Rapidly click the button and watch the counter for unexpected extra clicks indicating hardware issues.'],
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
            ['question' => 'Why is my microphone not working in the tester?', 'answer' => 'Check browser permissions, ensure the correct microphone is selected, and verify the mic is not muted in system settings.'],
            ['question' => 'How do I test my microphone quality?', 'answer' => 'Record a sample, listen to playback, and check for clarity, background noise, and volume levels.'],
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

    // WebApplication for main keyboard tester
    $keyboardTester = getToolSchemaData('keyboard_tester');
    if ($keyboardTester) {
        $output .= schemaWebApplication($keyboardTester);
    }

    // Homepage breadcrumb (just Home)
    $output .= schemaBreadcrumbs([
        ['name' => 'Home', 'url' => '']
    ]);

    // Homepage FAQs
    $faqs = getToolFAQs('keyboard_tester');
    if (!empty($faqs)) {
        $output .= schemaFAQ($faqs);
    }

    return $output;
}
?>
