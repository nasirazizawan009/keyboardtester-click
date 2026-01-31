<?php
/**
 * SEO Tool Configuration
 * Central location for all tool metadata, keywords, and SEO information
 */

// Tool Configuration with SEO Data
$toolsConfig = [
    'mouse_test' => [
        'name' => 'Mouse Tester',
        'path' => 'mouse-test.php',
        'category' => 'mouse',
        'icon' => '🖱️',
        'title' => 'Mouse Tester - Test Your Mouse Buttons & Scroll | KeyboardTester.click',
        'description' => 'Test your mouse buttons, scroll wheel, and functionality with our free online mouse tester. Check left-click, right-click, middle-click, and scroll performance instantly.',
        'keywords' => 'mouse tester, test mouse, mouse button test, scroll test, online mouse test, click tester, mouse functionality test',
        'og_image' => '/images/og/mouse-test-og.jpg',
        'og_description' => 'Free online mouse tester to check all your mouse buttons and scroll functionality. Test left, right, middle clicks and more.',
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
        'title' => 'Online Keyboard Tester - Test Every Key | KeyboardTester.click',
        'description' => 'Test every key on your keyboard instantly. Perfect for diagnosing stuck keys, checking new keyboards, or verifying repairs. Works with all keyboard types.',
        'keywords' => 'keyboard tester, test keyboard, online keyboard test, keyboard key test, stuck key detector, keyboard functionality test, free keyboard tester',
        'og_image' => '/images/og/keyboard-tester-og.jpg',
        'og_description' => 'Free online keyboard tester to check every key. Identify stuck keys, test special keys like Caps Lock, and verify keyboard functionality.',
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
        'title' => 'Click Speed Test - Measure Your Clicking Speed (CPS) | KeyboardTester.click',
        'description' => 'Measure your clicking speed in clicks per second (CPS). Challenge yourself and track improvements over time. Perfect for gamers and speed enthusiasts.',
        'keywords' => 'click speed test, CPS test, mouse click speed, clicking speed, click counter, online click test, gaming speed test',
        'og_image' => '/images/og/click-speed-og.jpg',
        'og_description' => 'Test your clicking speed in CPS (clicks per second). Perfect for competitive gamers and those wanting to improve their clicking speed.',
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
        'title' => 'Typing Speed Test - Measure WPM & Accuracy | KeyboardTester.click',
        'description' => 'Measure your typing speed in words per minute (WPM). Track accuracy, identify weak keys, and improve your typing skills with our free online test.',
        'keywords' => 'typing speed test, WPM test, typing test, keyboard speed test, typing accuracy test, free typing test online',
        'og_image' => '/images/og/typing-speed-og.jpg',
        'og_description' => 'Free typing speed test to measure WPM (words per minute) and accuracy. Perfect for improving typing skills.',
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
        'title' => 'Ghost Click Detector - Find Phantom Clicks | KeyboardTester.click',
        'description' => 'Detect unwanted double-clicks and phantom clicks. Essential for identifying mouse hardware issues before they affect your work or gaming.',
        'keywords' => 'ghost click detector, double click detector, phantom click test, mouse double click, mouse hardware test',
        'og_image' => '/images/og/ghost-click-og.jpg',
        'og_description' => 'Detect phantom clicks and double-clicks in your mouse. Identify hardware issues before they impact gaming or work.',
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
        'title' => 'Mouse DPI Tester - Adjust Mouse Sensitivity | KeyboardTester.click',
        'description' => 'Test and adjust your mouse sensitivity settings. Find your ideal DPI for gaming, design work, or everyday use.',
        'keywords' => 'mouse DPI tester, DPI test, mouse sensitivity test, mouse cursor test, gaming mouse DPI',
        'og_image' => '/images/og/dpi-tester-og.jpg',
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
        'title' => 'Screen Tester - Test For Dead Pixels & Display Issues | KeyboardTester.click',
        'description' => 'Test your monitor for dead pixels, color accuracy, and display uniformity. Essential when buying new screens or troubleshooting issues.',
        'keywords' => 'screen tester, dead pixel test, monitor test, display test, pixel test, stuck pixel test, monitor checker',
        'og_image' => '/images/og/screen-test-og.jpg',
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
        'title' => 'Microphone Tester - Test Your Mic Quality | KeyboardTester.click',
        'description' => 'Test your mic quality, adjust volume levels, and fix audio issues. Record samples to check clarity before important calls or streams.',
        'keywords' => 'microphone tester, test microphone, mic test, audio test, microphone quality test, voice recorder',
        'og_image' => '/images/og/mic-tester-og.jpg',
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
        'title' => 'Headphone & Speaker Tester - Test Audio Channels | KeyboardTester.click',
        'description' => 'Test audio channels, frequency response, and stereo balance. Check left/right channels, bass, treble, and sound quality instantly.',
        'keywords' => 'headphone test, speaker test, audio test, stereo test, left right audio test, frequency response test',
        'og_image' => '/images/og/headphone-test-og.jpg',
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
        'title' => 'Webcam Tester - Test Your Camera Online | KeyboardTester.click',
        'description' => 'Check your camera video quality, take test snapshots, and switch between multiple cameras. Verify everything works before meetings.',
        'keywords' => 'webcam tester, camera test, web camera test, video quality test, online webcam test',
        'og_image' => '/images/og/webcam-test-og.jpg',
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
        'title' => 'QR Code Generator - Create Custom QR Codes | KeyboardTester.click',
        'description' => 'Create custom QR codes for URLs, text, WiFi credentials, or contact info. Download instantly or share directly.',
        'keywords' => 'QR code generator, create QR code, QR code maker, QR code creator, free QR generator',
        'og_image' => '/images/og/qr-generator-og.jpg',
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
        'title' => 'QR Code Scanner - Scan and Decode QR Codes | KeyboardTester.click',
        'description' => 'Scan and decode QR codes using your camera. Extract URLs, text, and contact information from any QR code.',
        'keywords' => 'QR code scanner, scan QR code, QR decoder, QR code reader, online QR scanner',
        'og_image' => '/images/og/qr-scanner-og.jpg',
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
        'title' => 'OCR Text Extractor - Extract Text From Images | KeyboardTester.click',
        'description' => 'Extract text from images instantly. Convert scanned documents, screenshots, or photos into editable text with high accuracy.',
        'keywords' => 'OCR tool, text extraction, document scanner, image to text, screenshot OCR',
        'og_image' => '/images/og/ocr-tool-og.jpg',
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
        'title' => 'Password Generator - Create Strong Secure Passwords | KeyboardTester.click',
        'description' => 'Create strong, secure passwords with customizable length and character types. Improve your online security instantly.',
        'keywords' => 'password generator, strong password generator, secure password creator, online password maker',
        'og_image' => '/images/og/password-gen-og.jpg',
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
        'title' => 'WhatsApp Link Generator - Create Direct Chat Links | KeyboardTester.click',
        'description' => 'Create direct WhatsApp chat links without saving contacts. Perfect for customer support, marketing, or quick communication.',
        'keywords' => 'WhatsApp link generator, create WhatsApp link, WhatsApp chat link, direct WhatsApp message',
        'og_image' => '/images/og/whatsapp-link-og.jpg',
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
        'title' => 'WhatsApp QR Code Creator - Generate Business QR Codes | KeyboardTester.click',
        'description' => 'Generate WhatsApp chat links and QR codes for your business. Let customers contact you instantly by scanning.',
        'keywords' => 'WhatsApp QR generator, WhatsApp QR code, business WhatsApp QR, QR code generator',
        'og_image' => '/images/og/whatsapp-qr-og.jpg',
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
        'title' => 'Keyboard Latency Checker - Test Input Latency | KeyboardTester.click',
        'description' => 'Test your keyboard\'s input latency. Measure the delay between key presses and screen updates for gaming optimization.',
        'keywords' => 'keyboard latency, input latency test, keyboard response time, gaming latency test',
        'og_image' => '/images/og/latency-checker-og.jpg',
        'og_description' => 'Measure keyboard input latency and response time for gaming optimization.',
        'features' => [
            'Real-time latency measurement',
            'Key press timing analysis',
            'Average latency calculation',
            'Gaming optimization',
            'Performance tracking'
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
