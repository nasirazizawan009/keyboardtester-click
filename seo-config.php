<?php
/**
 * SEO Tool Configuration
 * Central location for all tool metadata, keywords, and SEO information
 * Optimized titles (50-60 chars) and descriptions (145-160 chars)
 */

// Tool Configuration with SEO Data
$toolsConfig = [
    'mouse_test' => [
        'name' => 'Mouse Tester',
        'path' => 'mouse-test.php',
        'category' => 'mouse',
        'icon' => '🖱️',
        'title' => 'Mouse Tester Online - Free Click & Scroll Test | KBT',
        'description' => 'Free online mouse tester to check all buttons and scroll wheel. Test left, right, middle click and side buttons instantly. No download needed.',
        'keywords' => 'mouse tester, online mouse test, test mouse buttons, scroll wheel test, click tester, free mouse test',
        'og_image' => 'images/mouse/mouse-test-guide-1200.png',
        'og_description' => 'Free online mouse tester to check all buttons and scroll functionality. Test left, right, middle clicks instantly.',
        'features' => [
            'Left, right, middle click detection',
            'Scroll wheel testing',
            'Mouse movement tracking',
            'Click counter',
            'Double-click detection'
        ]
    ],
    'keyboard_tester' => [
        'name' => 'Keyboard Tester',
        'path' => 'index.php',
        'category' => 'keyboard',
        'icon' => '⌨️',
        'title' => 'Keyboard Tester Online - Free Key Test Tool | KBT',
        'description' => 'Free online keyboard tester to check every key instantly. Test stuck keys, ghosting, and key response with no download. Works on all devices and browsers.',
        'keywords' => 'keyboard tester, online keyboard test, test keyboard keys, free key tester, stuck key detector',
        'og_image' => 'images/keyboard/hero-keyboard-test-1400.png',
        'og_description' => 'Free online keyboard tester to check every key. Identify stuck keys, test ghosting, and verify keyboard functionality.',
        'features' => [
            'Test every individual key',
            'Caps Lock, Num Lock, Scroll Lock detection',
            'Function key testing (F1-F12)',
            'Special character detection',
            'Key press history',
            'Color-coded feedback'
        ]
    ],
    'click_speed' => [
        'name' => 'Click Speed Test',
        'path' => 'mouse_speed_tester.php',
        'category' => 'mouse',
        'icon' => '⚡',
        'title' => 'Click Speed Test - Free CPS Test Online | KBT',
        'description' => 'Free click speed test to measure clicks per second (CPS). Test your clicking speed with timed challenges. No download required. Track your best score.',
        'keywords' => 'click speed test, CPS test, clicks per second, mouse click speed, click counter, gaming speed test',
        'og_image' => 'images/mouse/click-speed-test-og.png',
        'og_description' => 'Test your clicking speed in CPS (clicks per second). Perfect for competitive gamers and speed enthusiasts.',
        'features' => [
            'Multiple duration options',
            'Clicks per second (CPS) measurement',
            'Fun remarks based on performance',
            'Real-time click counter',
            'Performance tracking'
        ]
    ],
    'keyboard_typing' => [
        'name' => 'Typing Speed Test',
        'path' => 'keyboard_typing_test.php',
        'category' => 'keyboard',
        'icon' => '⚡',
        'title' => 'Typing Speed Test - Free WPM Test Online | KBT',
        'description' => 'Free typing speed test to measure WPM and accuracy. Practice typing online with real-time stats. No download required. Improve your typing skills today.',
        'keywords' => 'typing speed test, WPM test, typing test online, free typing test, keyboard speed test, typing accuracy',
        'og_image' => 'images/keyboard/typing-test-og.png',
        'og_description' => 'Free typing speed test to measure WPM (words per minute) and accuracy. Improve your typing skills.',
        'features' => [
            'WPM (Words Per Minute) calculation',
            'Accuracy percentage',
            'Weak key identification',
            'Timed tests',
            'Performance statistics'
        ]
    ],
    'ghost_click' => [
        'name' => 'Ghost Click Detector',
        'path' => 'ghost-click-detector.php',
        'category' => 'mouse',
        'icon' => '👻',
        'title' => 'Ghost Click Detector - Find Phantom Clicks | KBT',
        'description' => 'Free ghost click detector to find phantom and double clicks. Diagnose mouse hardware issues online with no download. Essential for gaming mice testing.',
        'keywords' => 'ghost click detector, phantom click test, double click test, mouse hardware test, gaming mouse check',
        'og_image' => 'images/mouse/ghost-click-og.png',
        'og_description' => 'Detect phantom clicks and double-clicks in your mouse. Identify hardware issues before they impact gaming.',
        'features' => [
            'Double-click detection',
            'Phantom click identification',
            'Click timing analysis',
            'Detailed click logs',
            'Hardware issue diagnosis'
        ]
    ],
    'dpi_tester' => [
        'name' => 'Mouse DPI Tester',
        'path' => 'mouse_sensitivity_DPI_tester.php',
        'category' => 'mouse',
        'icon' => '🎯',
        'title' => 'Mouse DPI Tester - Test Sensitivity Online | KBT',
        'description' => 'Free mouse DPI and sensitivity tester. Measure your mouse sensitivity, calculate DPI, and optimize settings for gaming. No download needed.',
        'keywords' => 'mouse DPI tester, mouse sensitivity test, DPI calculator, gaming mouse test, cursor speed test',
        'og_image' => 'images/mouse/dpi-tester-og.png',
        'og_description' => 'Test and optimize your mouse DPI and sensitivity for gaming, design work, or general use.',
        'features' => [
            'DPI sensitivity testing',
            'Mouse movement tracking',
            'Cursor distance measurement',
            'Sensitivity adjustment',
            'Performance analysis'
        ]
    ],
    'screen_test' => [
        'name' => 'Screen Tester',
        'path' => 'screentestindex.php',
        'category' => 'screen',
        'icon' => '🖥️',
        'title' => 'Screen Tester - Dead Pixel Test Online | KBT',
        'description' => 'Free online screen tester to detect dead pixels, stuck pixels, and display issues. Test your monitor with solid colors. No download needed.',
        'keywords' => 'screen tester, dead pixel test, monitor test, pixel test, display test online, stuck pixel finder',
        'og_image' => 'images/screen/screen-test-og.png',
        'og_description' => 'Free online screen test for dead pixels, color accuracy, and display issues across all devices.',
        'features' => [
            'Dead pixel detection',
            'Color accuracy testing',
            'Display uniformity check',
            'Contrast testing',
            'Screen resolution display'
        ]
    ],
    'mic_test' => [
        'name' => 'Microphone Tester',
        'path' => 'mic-tester.php',
        'category' => 'audio',
        'icon' => '🎤',
        'title' => 'Microphone Tester Online - Free Mic Test | KBT',
        'description' => 'Free online microphone tester to check audio quality and volume levels. Record and playback samples instantly. No download required. Works on all devices.',
        'keywords' => 'microphone tester, mic test online, test microphone, audio quality test, voice recorder, mic check',
        'og_image' => 'images/audio/mic-tester-og.png',
        'og_description' => 'Test microphone quality, record samples, and fix audio issues with our free online mic tester.',
        'features' => [
            'Real-time microphone testing',
            'Audio level visualization',
            'Sample recording',
            'Volume adjustment',
            'Audio quality analysis'
        ]
    ],
    'headphone_test' => [
        'name' => 'Headphone & Speaker Tester',
        'path' => 'headphone_speaker_tester_index.php',
        'category' => 'audio',
        'icon' => '🎧',
        'title' => 'Headphone & Speaker Test - Audio Channel Test | KBT',
        'description' => 'Free headphone and speaker tester to check left/right channels and stereo balance. Test audio output online with no download. Works on all devices.',
        'keywords' => 'headphone test, speaker test, audio channel test, stereo test, left right audio, sound check',
        'og_image' => 'images/audio/headphone-test-og.png',
        'og_description' => 'Test headphones and speakers for channel balance, frequency response, and audio quality.',
        'features' => [
            'Left/right channel testing',
            'Frequency response analysis',
            'Audio balance check',
            'Bass and treble testing',
            'Stereo alignment verification'
        ]
    ],
    'webcam_test' => [
        'name' => 'Webcam Tester',
        'path' => 'webcamtesterindex.php',
        'category' => 'camera',
        'icon' => '📹',
        'title' => 'Webcam Tester Online - Free Camera Test | KBT',
        'description' => 'Free online webcam tester to check video quality and camera functionality. Take test snapshots before meetings. No download required. Works instantly.',
        'keywords' => 'webcam tester, camera test online, test webcam, video quality test, webcam check, camera test',
        'og_image' => 'images/camera/webcam-test-og.png',
        'og_description' => 'Test your webcam quality, take snapshots, and verify camera functionality before important video calls.',
        'features' => [
            'Real-time video feed',
            'Snapshot capture',
            'Camera switching',
            'Video quality analysis',
            'Resolution display'
        ]
    ],
    'qr_generator' => [
        'name' => 'QR Code Generator',
        'path' => 'QR_code_generator_scanner.php',
        'category' => 'utility',
        'icon' => '📱',
        'title' => 'QR Code Generator - Create QR Codes Free | KBT',
        'description' => 'Free QR code generator to create custom QR codes for URLs, text, WiFi, and contacts. Download instantly with no sign-up. Works on all devices.',
        'keywords' => 'QR code generator, create QR code, QR code maker, free QR generator, custom QR code',
        'og_image' => 'images/utility/qr-generator-og.png',
        'og_description' => 'Generate custom QR codes for URLs, text, WiFi, and contact info. Download or share instantly.',
        'features' => [
            'URL QR codes',
            'Text QR codes',
            'WiFi QR codes',
            'Contact information QR codes',
            'Download and sharing options'
        ]
    ],
    'qr_scanner' => [
        'name' => 'QR Code Scanner',
        'path' => 'qr-code-reader.php',
        'category' => 'utility',
        'icon' => '🔍',
        'title' => 'QR Code Reader - Scan QR Codes Online Free | KBT',
        'description' => 'Free online QR code reader to scan and decode QR codes using camera or image upload. Extract URLs and text instantly. No app download required.',
        'keywords' => 'QR code reader, QR scanner online, scan QR code, decode QR code, QR code decoder',
        'og_image' => 'images/utility/qr-reader-og.png',
        'og_description' => 'Scan QR codes with your camera and decode URLs, text, and contact information instantly.',
        'features' => [
            'Real-time QR scanning',
            'QR code decoding',
            'URL extraction',
            'Contact information parsing',
            'Text extraction'
        ]
    ],
    'ocr_tool' => [
        'name' => 'OCR Text Extractor',
        'path' => 'ocr-tool.php',
        'category' => 'utility',
        'icon' => '📄',
        'title' => 'OCR Tool - Extract Text From Images Free | KBT',
        'description' => 'Free online OCR tool to extract text from images and screenshots. Convert image to text instantly with no download. Supports multiple languages.',
        'keywords' => 'OCR tool, image to text, extract text from image, optical character recognition, screenshot OCR',
        'og_image' => 'images/utility/ocr-tool-og.png',
        'og_description' => 'Extract text from images and documents using AI-powered OCR technology.',
        'features' => [
            'Image text recognition',
            'Document scanning',
            'Multi-language support',
            'Text extraction accuracy',
            'Download extracted text'
        ]
    ],
    'password_gen' => [
        'name' => 'Password Generator',
        'path' => 'auto-password-generator.php',
        'category' => 'utility',
        'icon' => '🔐',
        'title' => 'Password Generator - Free Secure Password Tool | KBT',
        'description' => 'Free password generator to create strong, secure passwords. Customize length and character types. No download needed. Passwords never leave your browser.',
        'keywords' => 'password generator, secure password, strong password creator, random password, password maker',
        'og_image' => 'images/utility/password-gen-og.png',
        'og_description' => 'Generate strong, secure passwords with customizable options for maximum security.',
        'features' => [
            'Customizable password length',
            'Character type selection',
            'Multiple password generation',
            'Copy to clipboard',
            'Password strength indicator'
        ]
    ],
    'whatsapp_link' => [
        'name' => 'WhatsApp Link Generator',
        'path' => 'whatsapp-link-generator.php',
        'category' => 'whatsapp',
        'icon' => '💬',
        'title' => 'WhatsApp Link Generator - Create Chat Links | KBT',
        'description' => 'Free WhatsApp link generator to create direct chat links without saving contacts. Perfect for business and customer support. No download needed.',
        'keywords' => 'WhatsApp link generator, create WhatsApp link, WhatsApp chat link, wa.me generator, direct message',
        'og_image' => 'images/whatsapp/wa-link-og.png',
        'og_description' => 'Generate WhatsApp chat links instantly without saving contacts. Perfect for business and marketing.',
        'features' => [
            'Direct chat link generation',
            'No contact saving required',
            'QR code generation',
            'Link sharing options',
            'Multi-device support'
        ]
    ],
    'whatsapp_qr' => [
        'name' => 'WhatsApp QR Creator',
        'path' => 'whatsapp-Brand-link-generator.php',
        'category' => 'whatsapp',
        'icon' => '📲',
        'title' => 'WhatsApp QR Generator - Business Chat QR | KBT',
        'description' => 'Free WhatsApp QR code generator for businesses. Create branded chat links and QR codes. Customers scan to start chatting. No download required.',
        'keywords' => 'WhatsApp QR generator, business WhatsApp link, WhatsApp QR code, branded chat link',
        'og_image' => 'images/whatsapp/wa-qr-og.png',
        'og_description' => 'Create WhatsApp QR codes for your business. Customers scan to instantly start chatting.',
        'features' => [
            'WhatsApp QR code generation',
            'Business link creation',
            'Branding options',
            'QR code customization',
            'Download and print options'
        ]
    ],
    'latency_check' => [
        'name' => 'Keyboard Latency Checker',
        'path' => 'latency-checker.php',
        'category' => 'keyboard',
        'icon' => '⏱️',
        'title' => 'Keyboard Latency Checker - Test Input Delay | KBT',
        'description' => 'Free keyboard latency checker to measure input delay. Test response time for gaming and typing. Browser-based, no download. Get accurate latency readings.',
        'keywords' => 'keyboard latency, input latency test, response time test, gaming latency checker, input delay',
        'og_image' => 'images/keyboard/latency-checker-og.png',
        'og_description' => 'Measure keyboard input latency and response time for gaming optimization.',
        'features' => [
            'Real-time latency measurement',
            'Key press timing analysis',
            'Average latency calculation',
            'Gaming optimization',
            'Performance tracking'
        ]
    ],
    'mouse_trail' => [
        'name' => 'Mouse Trail Test',
        'path' => 'mouse-trail.php',
        'category' => 'mouse',
        'icon' => '✨',
        'title' => 'Mouse Trail Test - Track Cursor Movement | KBT',
        'description' => 'Free mouse trail tester to visualize cursor movement and tracking accuracy. Test mouse precision online with no download. Perfect for gaming setup.',
        'keywords' => 'mouse trail test, cursor tracking, mouse precision test, cursor movement test, mouse accuracy',
        'og_image' => 'images/mouse/mouse-trail-og.png',
        'og_description' => 'Visualize mouse movement trails and test cursor precision for gaming and design work.',
        'features' => [
            'Mouse movement visualization',
            'Cursor precision tracking',
            'Trail customization',
            'Movement analysis',
            'Export options'
        ]
    ],
    'whatsapp_sentiment' => [
        'name' => 'WhatsApp Sentiment Analyzer',
        'path' => 'whatsapp-sentiment-analyzer.php',
        'category' => 'whatsapp',
        'icon' => '😊',
        'title' => 'WhatsApp Sentiment Analyzer - Chat Analysis | KBT',
        'description' => 'Free WhatsApp sentiment analyzer to understand message tone and emotion. Analyze chat conversations locally. No data uploaded. Privacy-first tool.',
        'keywords' => 'WhatsApp sentiment analyzer, chat analysis, message tone analyzer, conversation sentiment',
        'og_image' => 'images/whatsapp/wa-sentiment-og.png',
        'og_description' => 'Analyze WhatsApp chat sentiment and understand message tone with privacy-first analysis.',
        'features' => [
            'Sentiment analysis',
            'Emotion detection',
            'Privacy-first processing',
            'Conversation insights',
            'Message tone analysis'
        ]
    ],
    'lucky_wheel' => [
        'name' => 'Lucky Wheel',
        'path' => 'luckywheeltoolindex.php',
        'category' => 'fun',
        'icon' => '🎡',
        'title' => 'Lucky Wheel Spinner - Free Random Picker | KBT',
        'description' => 'Free lucky wheel spinner for random selections and decisions. Customize options and spin to pick. No download needed. Fun and fair random picker.',
        'keywords' => 'lucky wheel, random picker, spin wheel, decision maker, random selector, wheel of fortune',
        'og_image' => 'images/fun/lucky-wheel-og.png',
        'og_description' => 'Spin the lucky wheel for random selections. Perfect for games, decisions, and giveaways.',
        'features' => [
            'Customizable options',
            'Fair random selection',
            'Visual spinning wheel',
            'Sound effects',
            'Share results'
        ]
    ]
];

/**
 * Function to get tool metadata
 */
function getTool($toolKey) {
    global $toolsConfig;
    return $toolsConfig[$toolKey] ?? null;
}

/**
 * Function to get SEO meta tags for a page
 */
function getPageMeta($toolKey) {
    $tool = getTool($toolKey);
    if (!$tool) return null;

    return [
        'title' => $tool['title'],
        'description' => $tool['description'],
        'keywords' => $tool['keywords'],
        'og_title' => $tool['name'],
        'og_description' => $tool['og_description'],
        'og_image' => $tool['og_image'],
        'og_url' => url($tool['path'])
    ];
}

?>
