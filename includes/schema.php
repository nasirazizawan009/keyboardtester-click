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
        'isAccessibleForFree' => true,
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
