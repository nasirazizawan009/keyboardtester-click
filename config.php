<?php
/**
 * KeyboardTester.Click - Site Configuration
 * Automatically detects localhost vs live site and sets URLs accordingly
 * Include this file at the top of every page: <?php include 'config.php'; ?>
 */

// Detect environment - more robust for cPanel
$httpHost = $_SERVER['HTTP_HOST'] ?? '';
$serverAddr = $_SERVER['SERVER_ADDR'] ?? '';

$isLocalhost = (
    strpos($httpHost, 'localhost') !== false ||
    strpos($httpHost, '127.0.0.1') !== false ||
    strpos($httpHost, '::1') !== false ||
    $serverAddr === '127.0.0.1'
);

// Set base URLs based on environment
if ($isLocalhost) {
    // Local development
    $baseUrl = '/kbt/';
    $siteUrl = 'http://localhost/kbt/';
    $blogUrl = '/kbt/blog/';
} else {
    // Live site - Canonical: https://keyboardtester.click (non-www)
    $baseUrl = '/';
    $siteUrl = 'https://keyboardtester.click/';
    $blogUrl = 'https://keyboardtester.click/blog/';
}

// Site information
$siteName = 'KeyboardTester.Click';
$siteDescription = 'Free online keyboard and mouse testing tools';
$siteEmail = 'support@keyboardtester.click';
$siteYear = date('Y');

// Social links
$socialLinks = [
    'twitter' => 'https://x.com/keyboardtester',
    'github' => 'https://github.com/nasirazizawan009/keyboardtester-click',
    'gitlab' => 'https://gitlab.com/nasirazizawan/keyboardtester.click'
];

// Amazon affiliate links (by region)
$amazonLinks = [
    'keyboard' => [
        'en' => 'https://www.amazon.com/s?k=keyboard',
        'fr' => 'https://www.amazon.fr/s?k=clavier',
        'de' => 'https://www.amazon.de/s?k=tastatur',
        'es' => 'https://www.amazon.es/s?k=teclado',
        'jp' => 'https://www.amazon.co.jp/s?k=keyboard',
    ],
    'mouse' => [
        'en' => 'https://www.amazon.com/s?k=mouse',
        'fr' => 'https://www.amazon.fr/s?k=souris',
        'de' => 'https://www.amazon.de/s?k=maus',
        'es' => 'https://www.amazon.es/s?k=raton',
        'jp' => 'https://www.amazon.co.jp/s?k=mouse',
    ]
];

/**
 * Generate a URL that works on both localhost and live site
 * @param string $path - The path relative to site root (e.g., 'mouse-test.html', 'about-us.html')
 * @return string - Full URL
 */
function url($path = '') {
    global $baseUrl;
    // Remove leading slash if present
    $path = ltrim($path, '/');
    return $baseUrl . $path;
}

/**
 * Generate absolute URL (always uses full domain for SEO/canonical)
 * @param string $path - The path relative to site root
 * @return string - Full absolute URL
 */
function absoluteUrl($path = '') {
    global $siteUrl;
    $path = ltrim($path, '/');
    return $siteUrl . $path;
}

/**
 * Normalize the current request path into the site's preferred canonical path.
 * Handles legacy aliases, .html fallbacks, and /index.php entry points.
 *
 * @param string $requestUri
 * @return string Canonical path relative to site root, or empty string for homepage.
 */
function canonicalizeRequestPath($requestUri = '') {
    global $baseUrl;

    $requestPath = parse_url((string) $requestUri, PHP_URL_PATH) ?? (string) $requestUri;
    $requestPath = ltrim($requestPath, '/');
    $basePath = trim((string) $baseUrl, '/');

    if ($basePath !== '' && strpos($requestPath, $basePath) === 0) {
        $requestPath = substr($requestPath, strlen($basePath));
    }

    $requestPath = ltrim($requestPath, '/');
    if ($requestPath === '' || $requestPath === 'index.php' || $requestPath === 'index.html') {
        return '';
    }

    if (preg_match('~^languages/([a-z-]+)/index\.(php|html)$~i', $requestPath, $matches)) {
        return 'languages/' . strtolower($matches[1]) . '/';
    }

    $requestPath = preg_replace('~/index\.(php|html)$~i', '/', $requestPath);
    $requestPathLower = strtolower($requestPath);

    $legacyMap = [
        'about.php' => 'about-us.php',
        'contact.php' => 'feedback.php',
        'ghost-click-detector.html' => 'ghost-click-detector.php',
        'headphone-speaker-tester.php' => 'headphone_speaker_tester_index.php',
        'keyboard-tester.php' => 'tools/keyboard-tester/',
        'keyboard-typing-test.php' => 'keyboard_typing_test.php',
        'keyboard_tester_arabic.php' => 'languages/arabic/',
        'keyboard_tester_english.php' => 'tools/keyboard-tester/',
        'keyboard_tester_french.php' => 'languages/french/',
        'keyboard_tester_french_v2.php' => 'languages/french/',
        'keyboard_tester_german.php' => 'languages/german/',
        'keyboard_tester_japanese.php' => 'languages/japanese/',
        'keyboard_tester_korean_index.php' => 'languages/korean/',
        'keyboard_tester_portuguese.php' => 'languages/portuguese/',
        'keyboard_tester_russian.php' => 'languages/russian/',
        'keyboard_tester_spanish.php' => 'languages/spanish/',
        'mouse-sensitivity-dpi-tester.php' => 'mouse_sensitivity_DPI_tester.php',
        'mouse-speed-tester.php' => 'mouse_speed_tester.php',
        'mouse_speed_tester.html' => 'mouse_speed_tester.php',
        'privacy.php' => 'privacy-policy.php',
        'qr-code-generator.php' => 'QR_code_generator_scanner.php',
        'screen-tester.php' => 'screentestindex.php',
        'sitemap-index.xml' => 'sitemap.xml',
        'tools.php' => 'pages/tools.php',
        'webcam-tester.php' => 'webcamtesterindex.php',
        'whatsapp-brand-link-generator.php' => 'whatsapp-Brand-link-generator.php',
    ];

    if (isset($legacyMap[$requestPathLower])) {
        return $legacyMap[$requestPathLower];
    }

    if (substr($requestPathLower, -5) === '.html') {
        $phpCandidate = substr($requestPath, 0, -5) . '.php';
        if (is_file(__DIR__ . '/' . $phpCandidate)) {
            return canonicalizeRequestPath($phpCandidate);
        }
    }

    return $requestPath;
}

/**
 * Generate the preferred canonical URL for a request or path.
 *
 * @param string $requestUri
 * @return string
 */
function canonicalUrl($requestUri = '') {
    $canonicalPath = canonicalizeRequestPath($requestUri);
    return $canonicalPath === '' ? absoluteUrl('') : absoluteUrl($canonicalPath);
}

/**
 * Get blog URL
 * @param string $path - Optional path within blog
 * @return string
 */
function blogUrl($path = '') {
    global $blogUrl;
    $path = ltrim($path, '/');
    return $blogUrl . $path;
}

/**
 * Check if current page matches a given path
 * @param string $path - Path to check
 * @return bool
 */
function isCurrentPage($path) {
    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
    $checkPage = basename($path, '.php');
    $checkPage = basename($checkPage, '.html');
    return $currentPage === $checkPage;
}

/**
 * Get Amazon link for a product category and language
 * @param string $category - 'keyboard' or 'mouse'
 * @param string $lang - Language code (en, fr, de, es, jp)
 * @return string
 */
function amazonLink($category, $lang = 'en') {
    global $amazonLinks;
    return $amazonLinks[$category][$lang] ?? $amazonLinks[$category]['en'];
}

// Define common page links (use direct .php paths for reliable localhost + live)
$pages = [
    'home' => url(''),
    'mouse_test' => url('mouse-test.php'),
    'mouse_trail' => url('mouse-trail.php'),
    'scroll_wheel_test' => url('scroll-wheel-test.php'),
    'double_click_test' => url('double-click-test.php'),
    'keyboard_typing' => url('keyboard_typing_test.php'),
    'click_speed' => url('mouse_speed_tester.php'),
    'ghost_click' => url('ghost-click-detector.php'),
    'dpi_tester' => url('mouse_sensitivity_DPI_tester.php'),
    'screen_test' => url('screentestindex.php'),
    'black_screen_test' => url('black-screen-test.php'),
    'white_screen_test' => url('white-screen-test.php'),
    'dead_pixel_test' => url('dead-pixel-test.php'),
    'stuck_pixel_test' => url('stuck-pixel-test.php'),
    'stuck_key_test' => url('stuck-key-test.php'),
    'mic_test' => url('mic-tester.php'),
    'test_my_mic' => url('test-my-mic.php'),
    'microphone_volume_test' => url('microphone-volume-test.php'),
    'webcam_test' => url('webcamtesterindex.php'),
    'camera_resolution_test' => url('camera-resolution-test.php'),
    'webcam_not_working_test' => url('webcam-not-working-test.php'),
    'take_picture_with_webcam' => url('take-picture-with-webcam.php'),
    'headphone_test' => url('headphone_speaker_tester_index.php'),
    'left_right_speaker_test' => url('left-right-speaker-test.php'),
    'stereo_test' => url('stereo-test.php'),
    'qr_generator' => url('QR_code_generator_scanner.php'),
    'qr_reader' => url('qr-code-reader.php'),
    'scan_qr_from_image' => url('scan-qr-from-image.php'),
    'ocr_tool' => url('ocr-tool.php'),
    'screenshot_to_text' => url('screenshot-to-text.php'),
    'photo_to_text' => url('photo-to-text.php'),
    'password_gen' => url('auto-password-generator.php'),
    'whatsapp_link' => url('whatsapp-link-generator.php'),
    'whatsapp_brand' => url('whatsapp-Brand-link-generator.php'),
    'lucky_wheel' => url('luckywheeltoolindex.php'),
    'latency_check' => url('latency-checker.php'),
    'keyboard_ghosting' => url('keyboard-ghosting-test.php'),
    'n_key_rollover' => url('n-key-rollover-test.php'),
    'about' => url('about-us.php'),
    'privacy' => url('privacy-policy.php'),
    'disclaimer' => url('disclaimer.php'),
    'feedback' => url('feedback.php'),
    'blog' => blogUrl(),
];

// Language keyboard pages
$keyboardLanguages = [
    'en' => ['url' => url(''), 'name' => 'English', 'native' => 'English', 'flag' => 'flags/uk_flag.svg'],
    'ar' => ['url' => url('languages/arabic/'), 'name' => 'Arabic', 'native' => 'العربية', 'flag' => 'flags/arabic_flag.svg'],
    'fr' => ['url' => url('languages/french/'), 'name' => 'French', 'native' => 'Français', 'flag' => 'flags/french_flag.svg'],
    'de' => ['url' => url('languages/german/'), 'name' => 'German', 'native' => 'Deutsch', 'flag' => 'flags/german_flag.svg'],
    'es' => ['url' => url('languages/spanish/'), 'name' => 'Spanish', 'native' => 'Español', 'flag' => 'flags/spanish_flag.svg'],
    'pt' => ['url' => url('languages/portuguese/'), 'name' => 'Portuguese', 'native' => 'Português', 'flag' => 'flags/Portugal_flag.svg'],
    'ru' => ['url' => url('languages/russian/'), 'name' => 'Russian', 'native' => 'Русский', 'flag' => 'flags/russian_flag.svg'],
    'ja' => ['url' => url('languages/japanese/'), 'name' => 'Japanese', 'native' => '日本語', 'flag' => 'flags/japan_flag.svg'],
    'ko' => ['url' => url('languages/korean/'), 'name' => 'Korean', 'native' => '한국어', 'flag' => 'flags/korean_flag.svg'],
];
