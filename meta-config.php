<?php
/**
 * SEO Meta Configuration for KeyboardTester.Click
 * Titles are keyword-first for CTR (the matched search term leads the SERP listing).
 * "Free" kept as a benefit word; "Open Source" lives in descriptions/body, not titles.
 * Titles: aim 50-60 visible chars. Descriptions: 145-165 chars. Primary keyword early.
 */
return [
    // ============================================
    // CORE PAGES
    // ============================================
    'index.php' => [
        'title' => 'Keyboard Tester Online - Test Every Key Free, No Download',
        'description' => 'Free online keyboard tester - press any key and watch it light up instantly. Spot stuck keys, ghosting, key chatter and dead keys. No download, no signup.',
        'keywords' => 'keyboard tester, keyboard test, key test, keyboard checker, test keyboard online, online keyboard tester, free key tester, stuck key detector',
        'og_image' => 'images/keyboard/hero-keyboard-test-1400.png'
    ],
    'about-us.php' => [
        'title' => 'About KeyboardTester.click - Free Hardware Test Tools',
        'description' => 'KeyboardTester.Click is a free, open source suite of browser-based tools to test keyboards, mice, webcams, and audio devices. No downloads or sign-ups required.',
        'keywords' => 'about keyboard tester, free open source testing tools, keyboardtester.click, online device testing',
        'og_image' => 'images/shared/keyboard-and-mouse.png'
    ],
    'privacy-policy.php' => [
        'title' => 'Privacy Policy - KeyboardTester.Click',
        'description' => 'Read our privacy policy. KeyboardTester.Click runs all tests locally in your browser. No personal data is collected or stored on our servers. Last updated April 2026.',
        'keywords' => 'privacy policy, data privacy, keyboard tester privacy, no data collection',
        'og_image' => 'images/shared/keyboard-and-mouse.png'
    ],
    'disclaimer.php' => [
        'title' => 'Disclaimer - KeyboardTester.Click',
        'description' => 'Disclaimer for KeyboardTester.Click. Our free open source online testing tools are for informational purposes. Review terms before using our keyboard and mouse testers.',
        'keywords' => 'disclaimer, terms of use, keyboard tester disclaimer, testing tools terms',
        'og_image' => 'images/shared/keyboard-and-mouse.png'
    ],
    'feedback.php' => [
        'title' => 'Contact & Feedback - KeyboardTester.Click',
        'description' => 'Send feedback to improve KeyboardTester.Click. Report bugs, suggest features, or ask questions about our free open source keyboard and mouse testing tools.',
        'keywords' => 'feedback, contact us, keyboard tester feedback, report bugs, feature requests',
        'og_image' => 'images/shared/keyboard-and-mouse.png'
    ],
    'resources.php' => [
        'title' => 'Submit Device Testing Tools | KeyboardTester.Click',
        'description' => 'Submit useful keyboard, mouse, monitor, webcam, microphone, audio, and gamepad testing tools to our curated device testing directory for review and inclusion.',
        'keywords' => 'submit device testing tool, awesome device testing tools, keyboard tester directory, hardware testing tools',
        'og_image' => 'images/shared/keyboard-and-mouse.png'
    ],
    'tools.php' => [
        'title' => 'All Free Online Testing Tools - Keyboard, Mouse & More',
        'description' => 'Explore all free testing tools: keyboard tester, mouse tester, webcam test, mic test, screen test, typing speed, gamepad tester, and more. No download needed.',
        'keywords' => 'free online testing tools, keyboard tester, mouse tester, device testing online'
    ],

    // ============================================
    // KEYBOARD TESTING TOOLS
    // ============================================
    'keyboard_typing_test.php' => [
        'title' => 'Typing Speed Test - Free WPM & Accuracy Test Online',
        'description' => 'Free open source typing speed test to measure WPM and accuracy. Practice typing online with real-time stats. No download required. Improve your typing skills today.',
        'keywords' => 'typing speed test, open source typing test, WPM test, typing test online, free typing test, keyboard speed test',
        'og_image' => 'images/keyboard/typing-test-og.png'
    ],
    'latency-checker.php' => [
        'title' => 'Keyboard Latency Test - Free Input Lag & Delay Checker',
        'description' => 'Free keyboard latency test - measure real input lag in milliseconds with jitter, consistency, best/worst samples and mouse-click latency mode. No install.',
        'keywords' => 'keyboard latency test, keyboard delay test, input delay test, keyboard response time test, keyboard input lag test, mouse click latency test',
        'og_image' => 'images/keyboard/latency-checker-og.png'
    ],

    // Language Keyboard Testers
    'keyboard_tester_arabic.php' => [
        'title' => 'Arabic Keyboard Tester - Test Every Key Online Free',
        'description' => 'Free open source Arabic keyboard tester to check Arabic key layout and functionality. Test all keys online with visual feedback. No download required. RTL supported.',
        'keywords' => 'arabic keyboard tester, open source keyboard tester, test arabic keyboard, arabic key layout, online arabic keyboard'
    ],
    'keyboard_tester_french.php' => [
        'title' => 'French Keyboard Tester - AZERTY Layout Test Online',
        'description' => 'Free open source French keyboard tester for AZERTY layout. Test accented keys and special characters online. Visual feedback for every key. No download needed.',
        'keywords' => 'french keyboard tester, open source keyboard tester, AZERTY keyboard test, test french keyboard, french key layout'
    ],
    'keyboard_tester_german.php' => [
        'title' => 'German Keyboard Tester - QWERTZ Layout Test Online',
        'description' => 'Free open source German keyboard tester for QWERTZ layout. Test umlauts and special keys online. No download required. Perfect for testing German keyboard layouts.',
        'keywords' => 'german keyboard tester, open source keyboard tester, QWERTZ keyboard test, test german keyboard, german key layout'
    ],
    'keyboard_tester_spanish.php' => [
        'title' => 'Spanish Keyboard Tester - Test Ñ & Accent Keys Online',
        'description' => 'Free open source Spanish keyboard tester to check the Spanish layout and special characters like Ñ and accented vowels. Test all keys online. No download needed.',
        'keywords' => 'spanish keyboard tester, open source keyboard tester, test spanish keyboard, spanish key layout, teclado espanol test'
    ],
    'keyboard_tester_portuguese.php' => [
        'title' => 'Portuguese Keyboard Tester - PT Layout Test Online',
        'description' => 'Free open source Portuguese keyboard tester for PT-BR and PT-PT layouts. Test accented characters, cedilla, and special keys online with real-time feedback. No download required.',
        'keywords' => 'portuguese keyboard tester, open source keyboard tester, test portuguese keyboard, PT keyboard layout, teclado portugues'
    ],
    'keyboard_tester_russian.php' => [
        'title' => 'Russian Keyboard Tester - Cyrillic Layout Test Online',
        'description' => 'Free open source Russian keyboard tester for Cyrillic layout. Test all Russian keys online with real-time visual feedback for every keypress. No download needed.',
        'keywords' => 'russian keyboard tester, open source keyboard tester, cyrillic keyboard test, test russian keyboard, russian key layout'
    ],
    'keyboard_tester_japanese.php' => [
        'title' => 'Japanese Keyboard Tester - JIS Layout Test Online',
        'description' => 'Free open source Japanese keyboard tester for JIS layout. Test all keys including Kana, Romaji, and special characters online. Visual feedback for every keypress. No download required.',
        'keywords' => 'japanese keyboard tester, open source keyboard tester, JIS keyboard test, test japanese keyboard, kana keyboard'
    ],
    'keyboard_tester_korean_index.php' => [
        'title' => 'Korean Keyboard Tester - Hangul Layout Test Online',
        'description' => 'Free open source Korean keyboard tester for Hangul layout. Test Korean characters and key functionality online with real-time visual highlights. No download required.',
        'keywords' => 'korean keyboard tester, open source keyboard tester, hangul keyboard test, test korean keyboard, korean key layout'
    ],
    'keyboard_tester_different_languages.php' => [
        'title' => 'Multi-Language Keyboard Tester - All Layouts Online',
        'description' => 'Free open source multi-language keyboard tester supporting all major layouts: QWERTY, AZERTY, QWERTZ, Cyrillic, Arabic, Hangul, and more. Test any keyboard online. No download needed.',
        'keywords' => 'multi-language keyboard tester, open source keyboard tester, international keyboard test, all keyboard layouts'
    ],

    // ============================================
    // MOUSE TESTING TOOLS
    // ============================================
    'mouse-test.php' => [
        'title' => 'Mouse Tester - Free Click, Scroll & Button Test Online',
        'description' => 'Free mouse tester to check all buttons and scroll wheel. Test left, right, and middle click instantly in your browser. Works with any USB or wireless mouse. No download needed.',
        'keywords' => 'mouse tester, open source mouse tester, online mouse test, test mouse buttons, scroll wheel test, click tester',
        'og_image' => 'images/mouse/mouse-test-guide-1200.png'
    ],
    'mouse_speed_tester.php' => [
        'title' => 'Click Speed Test (CPS) - Free Clicks Per Second Tester',
        'description' => 'Free click speed test to measure clicks per second (CPS). Test your clicking speed with timed challenges. No download required. Track your best score.',
        'keywords' => 'click speed test, open source CPS test, clicks per second, mouse click speed, click counter',
        'og_image' => 'images/mouse/click-speed-test-og.png'
    ],
    'mouse_sensitivity_DPI_tester.php' => [
        'title' => 'DPI Analyzer - Test Your Real Mouse DPI Free Online',
        'description' => 'Free mouse DPI analyzer - measure your true DPI in seconds with a ruler test. Check, compare and calculate eDPI for gaming. In-browser, no download.',
        'keywords' => 'dpi analyzer, mouse dpi tester, mouse dpi checker, dpi test, dpi checker, dpi analyzer online, edpi calculator',
        'og_image' => 'images/mouse/dpi-tester-og.png'
    ],
    'mouse-trail.php' => [
        'title' => 'Mouse Trail Test - Visualize Cursor Movement Online',
        'description' => 'Free open source mouse trail tester to visualize cursor movement and tracking accuracy. Test mouse precision online with no download needed. See your cursor path drawn in real time.',
        'keywords' => 'mouse trail test, open source mouse trail, cursor tracking, mouse precision test, cursor movement test',
        'og_image' => 'images/mouse/mouse-trail-og.png'
    ],
    'ghost-click-detector.php' => [
        'title' => 'Ghost Click Detector - Free Mouse Double Click Test',
        'description' => 'Use a free mouse ghost click detector to check if one press creates extra rapid clicks. Test left, right, and middle buttons with switch-bounce timing.',
        'keywords' => 'ghost click detector, mouse double click test, double click test, mouse switch bounce test, mouse chatter test, right click double click test',
        'og_image' => 'images/mouse/ghost-click-og.png'
    ],

    // ============================================
    // AUDIO & VIDEO TESTING TOOLS
    // ============================================
    'mic-tester.php' => [
        'title' => 'Mic Test - Free Online Microphone Tester for Calls',
        'description' => 'Free microphone tester to check audio quality and volume levels. Record and playback samples instantly. No download required. Works on all devices.',
        'keywords' => 'microphone tester, open source mic test, mic test online, test microphone, audio quality test, voice recorder',
        'og_image' => 'images/audio/mic-tester-og.png'
    ],
    'headphone_speaker_tester_index.php' => [
        'title' => 'Headphone & Speaker Test - Free Stereo Channel Check',
        'description' => 'Free open source headphone and speaker tester. Check left and right audio channels, stereo balance, and frequency response. Test audio output online with no download. Works on all devices.',
        'keywords' => 'headphone test, open source speaker tester, audio channel test, stereo test, left right audio',
        'og_image' => 'images/audio/headphone-test-og.png'
    ],
    'webcamtesterindex.php' => [
        'title' => 'Webcam Test - Free Online Camera Test (No Download)',
        'description' => 'Free webcam tester to check video quality and camera functionality. Take test snapshots before meetings. No download required. Works instantly in your browser.',
        'keywords' => 'webcam tester, open source webcam test, camera test online, test webcam, video quality test, webcam check',
        'og_image' => 'images/camera/webcam-test-og.png'
    ],
    'backlight-bleed-test.php' => [
        'title' => 'Backlight Bleed Test - Free Monitor Light Leak Check',
        'description' => 'Free open source backlight bleed test online. Check your LCD monitor for backlight bleeding, IPS glow, and clouding with a full-screen black display. Adjustable brightness — no download required.',
        'keywords' => 'backlight bleed test, open source monitor test, backlight bleed test online, IPS glow test, monitor bleed check, LCD backlight bleeding test',
        'og_image' => 'images/screen-test/hero.webp'
    ],
    'screentestindex.php' => [
        'title' => 'Screen Test - Monitor Test for Color, Pixels & Backlight',
        'description' => 'Free open source screen tester to detect dead pixels, stuck pixels, and display issues. Check your monitor with full-screen solid colors across 8 test screens. No download needed.',
        'keywords' => 'screen tester, monitor test online, screen test, pixel test, display test online, color test',
        'og_image' => 'images/screen/screen-test-og.png'
    ],

    // ============================================
    // UTILITY TOOLS
    // ============================================
    'auto-password-generator.php' => [
        'title' => 'Password Generator - Free Strong Random Passwords',
        'description' => 'Free open source password generator to create strong, secure passwords. Customize length and character types. No download needed. Passwords are generated locally and never leave your browser.',
        'keywords' => 'password generator, open source password generator, secure password, strong password creator, random password',
        'og_image' => 'images/utility/password-gen-og.png'
    ],
    'ocr-tool.php' => [
        'title' => 'OCR Tool - Free Image to Text Converter Online',
        'description' => 'Free open source OCR tool to extract text from images and screenshots. Upload a photo and convert it to editable text instantly. Supports multiple languages. No download or sign-up needed.',
        'keywords' => 'OCR tool, open source OCR, image to text, extract text from image, optical character recognition',
        'og_image' => 'images/utility/ocr-tool-og.png'
    ],
    'QR_code_generator_scanner.php' => [
        'title' => 'QR Code Generator - Create Free QR Codes Online',
        'description' => 'Free open source QR code generator to create custom QR codes for URLs, text, WiFi, and contacts. Download your QR code as an image instantly. No sign-up required. Works on all devices.',
        'keywords' => 'QR code generator, open source QR generator, create QR code, QR code maker, free QR generator',
        'og_image' => 'images/utility/qr-generator-og.png'
    ],
    'qr-code-reader.php' => [
        'title' => 'QR Code Reader - Scan & Decode QR From Image Online',
        'description' => 'Free open source QR code reader to scan and decode QR codes from image uploads. Extract URLs, text, and contact info instantly in your browser. No app or download required.',
        'keywords' => 'QR code reader, open source QR scanner, QR scanner online, scan QR code, decode QR code',
        'og_image' => 'images/utility/qr-reader-og.png'
    ],

    // ============================================
    // WHATSAPP TOOLS
    // ============================================
    'whatsapp-link-generator.php' => [
        'title' => 'WhatsApp Link Generator - Free wa.me Chat Links',
        'description' => 'Free open source WhatsApp link generator to create direct chat links without saving contacts. Generate a wa.me link in seconds — perfect for business pages and customer support. No download needed.',
        'keywords' => 'WhatsApp link generator, open source WhatsApp tool, create WhatsApp link, WhatsApp chat link, wa.me generator',
        'og_image' => 'images/whatsapp/wa-link-og.png'
    ],
    'whatsapp-Brand-link-generator.php' => [
        'title' => 'WhatsApp QR Generator - Free Business Chat QR Code',
        'description' => 'Free open source WhatsApp QR code generator for businesses. Create a branded chat link and downloadable QR code in seconds. Customers scan to open chat directly. No download required.',
        'keywords' => 'WhatsApp QR generator, open source WhatsApp tool, business WhatsApp link, WhatsApp QR code, branded chat link',
        'og_image' => 'images/whatsapp/wa-qr-og.png'
    ],
    'whatsapp-sentiment-analyzer.php' => [
        'title' => 'WhatsApp Sentiment Analyzer - Free AI Chat Tone Report',
        'description' => 'Analyze WhatsApp chats or any text with a deeper AI tone report. Review sentiment, speaker patterns, red flags, green flags, hidden signals, and reply options.',
        'keywords' => 'WhatsApp sentiment analyzer, chat analysis, text sentiment analyzer, AI message tone analyzer, conversation sentiment',
        'og_image' => 'images/whatsapp-sentiment/hero.png'
    ],

    // ============================================
    // NEW TOOLS (April 2026)
    // ============================================
    'polling-rate-test.php' => [
        'title' => 'Mouse Polling Rate Test - Check Mouse Hz Online Free',
        'description' => 'Free open source mouse polling rate test. Check if your gaming mouse runs at 125Hz, 500Hz, 1000Hz or higher. Move your mouse to see live Hz readings. No download needed.',
        'keywords' => 'mouse polling rate test, open source mouse tester, mouse hz test, polling rate checker, check mouse hz online, 1000hz mouse test',
        'og_image' => 'images/mouse/hero.webp'
    ],
    'refresh-rate-test.php' => [
        'title' => 'Monitor Refresh Rate Test - Check Hz Online Free',
        'description' => 'Free open source monitor refresh rate test. Check if your display runs at 60Hz, 144Hz, 240Hz or higher. Detects your real refresh rate automatically in seconds. No download needed.',
        'keywords' => 'monitor refresh rate test online, open source monitor test, check monitor hz online, refresh rate test, 144hz monitor test, display hz test',
        'og_image' => 'images/screen-test/hero.webp'
    ],
    'touch-screen-test.php' => [
        'title' => 'Touch Screen Test - Multi-Touch & Ghost Touch Check',
        'description' => 'Free open source touch screen test online. Check for dead zones, ghost touches, and multi-touch support on phone, tablet, or laptop. Draw fingers to paint the screen. No app needed.',
        'keywords' => 'touch screen test online, open source touch test, touchscreen tester, test touch screen online, multi touch test, ghost touch test',
        'og_image' => 'images/screen-test/hero.webp'
    ],
    'gamepad-test.php' => [
        'title' => 'Gamepad Tester - Controller Buttons & Stick Drift Test',
        'description' => 'Free open source gamepad tester online. Test PS5, Xbox, Switch, and PC controller buttons, analog stick drift, triggers, and vibration. Works in browser. No download needed.',
        'keywords' => 'gamepad tester online, open source controller test, stick drift test online, ps5 controller test, xbox controller test online',
        'og_image' => 'images/mouse/hero.webp'
    ],
    'color-test.php' => [
        'title' => 'Monitor Color Test - Free Screen Color Check Online',
        'description' => 'Free open source monitor color test online. Check color accuracy, gradient banding, contrast, and backlight uniformity on any screen. Fullscreen color panels. No download needed.',
        'keywords' => 'monitor color test online, open source screen test, screen color test, display color calibration test, color banding test monitor, LCD color test',
        'og_image' => 'images/screen-test/hero.webp'
    ],

    // ============================================
    // SEO INTENT CLUSTER PAGES (v17.2.28–v17.2.31)
    // ============================================
    'spacebar-test.php' => [
        'title' => 'Spacebar Test - Free Spacebar Counter & Speed Test',
        'description' => 'Free open source spacebar test and counter. Measure your spacebar speed in 5, 10, or 30 second timed modes. See your clicks per second rating. No download needed.',
        'keywords' => 'spacebar test, open source spacebar counter, spacebar speed test, spacebar clicker, spacebar counter online',
        'og_image' => 'images/keyboard/hero-keyboard-test-1400.png'
    ],
    'reaction-time-test.php' => [
        'title' => 'Reaction Time Test - Free Click Reflex Test Online',
        'description' => 'Free open source reaction time test online. Click as fast as you can when the screen turns green. Get your average reaction time in milliseconds over 5 attempts. No download needed.',
        'keywords' => 'reaction time test online, open source reaction test, reflex test, click reaction time, response time test online',
        'og_image' => 'images/keyboard/hero-keyboard-test-1400.png'
    ],
    'dead-pixel-test.php' => [
        'title' => 'Dead Pixel Test - Free Online Monitor Pixel Checker',
        'description' => 'Free open source dead pixel test online. Detect dead, stuck, and hot pixels on your monitor or laptop screen using full-screen solid color tests. No download or install required.',
        'keywords' => 'dead pixel test, open source dead pixel test, dead pixel checker, screen pixel test, stuck pixel test online',
        'og_image' => 'images/screen-test/hero.webp'
    ],
    'stuck-pixel-test.php' => [
        'title' => 'Stuck Pixel Test - Free Fixer & Detector Online',
        'description' => 'Free open source stuck pixel test and fixer. Detect stuck pixels on your monitor with full-screen colors and attempt to fix them with rapid flashing. No download required.',
        'keywords' => 'stuck pixel test, open source pixel test, stuck pixel fix, fix stuck pixels online, pixel repair tool',
        'og_image' => 'images/screen-test/hero.webp'
    ],
    'keyboard-ghosting-test.php' => [
        'title' => 'Keyboard Ghosting Test - Free Anti-Ghosting Check',
        'description' => 'Free open source keyboard ghosting test online. Detect which key combinations your keyboard blocks with simultaneous keypress testing. Essential for gaming keyboards. No download needed.',
        'keywords' => 'keyboard ghosting test, open source keyboard test, anti-ghosting test, n-key rollover test, keyboard rollover check',
        'og_image' => 'images/keyboard/hero-keyboard-test-1400.png'
    ],
    'n-key-rollover-test.php' => [
        'title' => 'N-Key Rollover Test - Free NKRO Checker Online',
        'description' => 'Free open source N-key rollover test online. Check if your keyboard supports NKRO or 6KRO with a simultaneous multi-key press test. Essential for gaming. No download needed.',
        'keywords' => 'n-key rollover test, open source NKRO test, keyboard rollover test, NKRO check online, keyboard anti-ghosting test',
        'og_image' => 'images/keyboard/hero-keyboard-test-1400.png'
    ],
    'stuck-key-test.php' => [
        'title' => 'Stuck Key Test - Free Jammed Keyboard Key Checker',
        'description' => 'Free open source stuck key test online. Detect jammed, repeating, or unresponsive keyboard keys with a live visual key map. No download or sign-up required.',
        'keywords' => 'stuck key test, open source keyboard test, jammed key test, keyboard stuck key checker, repeating key test',
        'og_image' => 'images/keyboard/hero-keyboard-test-1400.png'
    ],
    'scroll-wheel-test.php' => [
        'title' => 'Scroll Wheel Test - Free Mouse Scroll Checker Online',
        'description' => 'Free open source scroll wheel test online. Check if your mouse scroll wheel works correctly with up, down, left, and right scroll detection. No download needed.',
        'keywords' => 'scroll wheel test, open source mouse test, mouse scroll test, scroll wheel checker, mouse wheel test online',
        'og_image' => 'images/mouse/mouse-test-guide-1200.png'
    ],
    'double-click-test.php' => [
        'title' => 'Double Click Test - Mouse Switch Bounce Checker Online',
        'description' => 'Free double click test for mouse switch bounce. Log suspicious rapid intervals, check left/right/middle buttons, and export timing evidence in your browser.',
        'keywords' => 'double click test, mouse double click detector, ghost click test, mouse switch bounce test, mouse chatter test',
        'og_image' => 'images/mouse/ghost-click-og.png'
    ],
    'black-screen-test.php' => [
        'title' => 'Black Screen Test - Free Monitor Black Level Check',
        'description' => 'Free open source black screen test online. Check your monitor\'s black levels, contrast, and dead pixels using a full-screen black display. No download or app needed.',
        'keywords' => 'black screen test, open source screen test, monitor black level test, full screen black test, contrast test online',
        'og_image' => 'images/screen-test/hero.webp'
    ],
    'white-screen-test.php' => [
        'title' => 'White Screen Test - Free Bright Screen & Pixel Check',
        'description' => 'Free open source white screen test online. Check for dead pixels, backlight uniformity, and bright spots using a full-screen white display. No download needed.',
        'keywords' => 'white screen test, open source screen test, monitor white test, dead pixel check, bright screen test online',
        'og_image' => 'images/screen-test/hero.webp'
    ],
    'camera-resolution-test.php' => [
        'title' => 'Camera Resolution Test - Free Webcam Quality Check',
        'description' => 'Free open source camera resolution test online. Check your webcam\'s actual resolution, frame rate, and video quality in real time. No download or plugin needed.',
        'keywords' => 'camera resolution test, open source webcam test, webcam resolution check, test camera resolution online, webcam quality test',
        'og_image' => 'images/camera/webcam-test-og.png'
    ],
    'scan-qr-from-image.php' => [
        'title' => 'Scan QR From Image - Free QR Code Scanner Online',
        'description' => 'Free open source QR code scanner. Upload any image to instantly decode QR codes online. No camera required. Works with screenshots, photos, and files. No download needed.',
        'keywords' => 'scan QR from image, open source QR scanner, QR code image scanner, decode QR from photo, QR code reader online',
        'og_image' => 'images/utility/qr-reader-og.png'
    ],
    'screenshot-to-text.php' => [
        'title' => 'Screenshot to Text - Free OCR Image Converter Online',
        'description' => 'Free open source screenshot to text converter online. Upload a screenshot and instantly extract editable text using OCR. Supports multiple languages. No download or account needed.',
        'keywords' => 'screenshot to text, open source OCR tool, image to text online, screenshot OCR, extract text from screenshot',
        'og_image' => 'images/utility/ocr-tool-og.png'
    ],
    'photo-to-text.php' => [
        'title' => 'Photo to Text - Free Image to Text OCR Online',
        'description' => 'Free open source photo to text converter. Upload any image or photo and extract editable text with OCR technology instantly in your browser. No download or sign-up required.',
        'keywords' => 'photo to text, open source OCR, image to text converter, extract text from photo, picture to text online',
        'og_image' => 'images/utility/ocr-tool-og.png'
    ],
    'test-my-mic.php' => [
        'title' => 'Test My Mic - Free Online Microphone Test',
        'description' => 'Free open source mic test online. Instantly check if your microphone is working, measure volume levels, and hear playback. No download required. Works on all devices.',
        'keywords' => 'test my mic, open source mic test, microphone test online, check microphone, mic not working test',
        'og_image' => 'images/audio/mic-tester-og.png'
    ],
    'webcam-not-working-test.php' => [
        'title' => 'Webcam Not Working? Free Camera Diagnostic Test',
        'description' => 'Free open source webcam not working test. Diagnose why your camera won\'t start — check permissions, hardware, and video feed in your browser. No download needed.',
        'keywords' => 'webcam not working test, open source webcam test, fix webcam online, camera not working test, webcam troubleshooter',
        'og_image' => 'images/camera/webcam-test-og.png'
    ],
    'left-right-speaker-test.php' => [
        'title' => 'Left Right Speaker Test - Free Audio Channel Check',
        'description' => 'Free open source left right speaker test online. Check if your left and right audio channels are working correctly with individual channel playback. No download needed.',
        'keywords' => 'left right speaker test, open source audio test, left right audio channel test, speaker balance test, stereo channel test',
        'og_image' => 'images/audio/headphone-test-og.png'
    ],
    'stereo-test.php' => [
        'title' => 'Stereo Test - Free Left/Right Audio Channel Check',
        'description' => 'Free open source stereo test online. Verify left and right audio channel balance, stereo separation, and headphone stereo output. No download or sign-up required.',
        'keywords' => 'stereo test, open source audio test, stereo audio test online, left right stereo check, headphone stereo test',
        'og_image' => 'images/audio/headphone-test-og.png'
    ],
    'microphone-volume-test.php' => [
        'title' => 'Microphone Volume Test - Free Mic Level Check Online',
        'description' => 'Free open source microphone volume test online. Measure your mic input level, detect low volume, and check if your microphone is picking up audio. No download needed.',
        'keywords' => 'microphone volume test, open source mic test, mic level test online, check microphone volume, microphone sensitivity test',
        'og_image' => 'images/audio/mic-tester-og.png'
    ],
    'take-picture-with-webcam.php' => [
        'title' => 'Take a Picture With Webcam - Free Online Photo Tool',
        'description' => 'Free open source webcam photo tool. Take a picture with your webcam instantly in your browser. No app, no download, no sign-up. Download your snapshot in one click.',
        'keywords' => 'take picture with webcam, open source webcam tool, webcam photo online, take photo webcam, webcam snapshot tool',
        'og_image' => 'images/camera/webcam-test-og.png'
    ],

    // ============================================
    // NEW TOOLS (April 2026 — Wave 2)
    // ============================================
    'key-repeat-rate-test.php' => [
        'title' => 'Key Repeat Rate Test - Check Keyboard Repeat Speed',
        'description' => 'Test your keyboard key repeat rate and initial delay online free. Measure repeat Hz and delay ms, compare to gaming benchmarks. No download needed.',
        'keywords' => 'keyboard repeat rate test, key repeat delay test, keyboard repeat speed, key repeat hz test',
        'og_image' => 'images/keyboard/hero.png',
    ],
    'typing-rhythm-test.php' => [
        'title' => 'Typing Rhythm Test - Visualize Your Keystroke Timing',
        'description' => 'Analyze your typing rhythm online free. See a heatmap of your inter-keystroke timing patterns and get a rhythm consistency score. No download needed.',
        'keywords' => 'typing rhythm test, typing fingerprint test, typing consistency test, keystroke timing test',
        'og_image' => 'images/keyboard/hero.png',
    ],
    'keyboard-sound-test.php' => [
        'title' => 'Keyboard Sound Test - Linear, Tactile or Clicky Switch',
        'description' => 'Analyze your mechanical keyboard switch sound online free. Our mic-based FFT analyzer classifies your switches as linear, tactile, or clicky instantly. No download needed.',
        'keywords' => 'keyboard sound test, mechanical keyboard sound analyzer, keyboard switch sound test, is my keyboard too loud',
        'og_image' => 'images/keyboard/hero.png',
    ],
    'pwm-flicker-test.php' => [
        'title' => 'PWM Flicker Test - Check Monitor Backlight Flicker',
        'description' => 'Test your monitor for PWM backlight flicker online free. Select frequency, go fullscreen, film with your phone to detect eye-strain-causing PWM dimming. No software needed.',
        'keywords' => 'PWM flicker test, monitor backlight flicker test, does my monitor have PWM, monitor eye strain test',
        'og_image' => 'images/screen-test/hero.png',
    ],
    'mouse-lod-test.php' => [
        'title' => 'Mouse Lift-Off Distance Test - Check Your Mouse LOD',
        'description' => 'Test your gaming mouse lift-off distance (LOD) online free. Move, lift and reposition your mouse and our tool measures cursor displacement to rate your LOD. No software needed.',
        'keywords' => 'mouse lift off distance test, mouse LOD test online, gaming mouse LOD checker, mouse sensor calibration',
        'og_image' => 'images/mouse/hero.png',
    ],

    // ============================================
    // FUN TOOLS
    // ============================================
    'luckywheeltoolindex.php' => [
        'title' => 'Lucky Wheel Spinner - Free Random Picker Wheel',
        'description' => 'Free open source lucky wheel spinner for random selections and decisions. Add your own options, customize colors, and spin to pick a winner. No download needed. Fair and fun random picker.',
        'keywords' => 'lucky wheel, open source wheel spinner, random picker, spin wheel, decision maker, random selector',
        'og_image' => 'images/fun/lucky-wheel-og.png'
    ],
];
?>
