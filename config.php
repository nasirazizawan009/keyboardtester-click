<?php
/**
 * KeyboardTester.Click - Site Configuration
 * Automatically detects localhost vs live site and sets URLs accordingly
 * Include this file at the top of every page: <?php include 'config.php'; ?>
 */

// Detect environment - more robust for cPanel
$isLocalhost = (
    strpos($_SERVER['HTTP_HOST'], 'localhost') !== false ||
    strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false ||
    strpos($_SERVER['HTTP_HOST'], '::1') !== false ||
    $_SERVER['SERVER_ADDR'] === '127.0.0.1'
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
    'keyboard_typing' => url('keyboard_typing_test.php'),
    'click_speed' => url('mouse_speed_tester.php'),
    'ghost_click' => url('ghost-click-detector.php'),
    'dpi_tester' => url('mouse_sensitivity_DPI_tester.php'),
    'screen_test' => url('screentestindex.php'),
    'mic_test' => url('mic-tester.php'),
    'webcam_test' => url('webcamtesterindex.php'),
    'headphone_test' => url('headphone_speaker_tester_index.php'),
    'qr_generator' => url('QR_code_generator_scanner.php'),
    'qr_reader' => url('qr-code-reader.php'),
    'ocr_tool' => url('ocr-tool.php'),
    'password_gen' => url('auto-password-generator.php'),
    'whatsapp_link' => url('whatsapp-link-generator.php'),
    'whatsapp_brand' => url('whatsapp-Brand-link-generator.php'),
    'lucky_wheel' => url('luckywheeltoolindex.php'),
    'latency_check' => url('latency-checker.php'),
    'about' => url('about-us.php'),
    'privacy' => url('privacy-policy.php'),
    'disclaimer' => url('disclaimer.php'),
    'feedback' => url('feedback.php'),
    'blog' => blogUrl(),
];

// Language keyboard pages
$keyboardLanguages = [
    'en' => ['url' => url(''), 'name' => 'English', 'native' => 'English', 'flag' => 'flags/uk_flag.svg'],
    'ar' => ['url' => url('keyboard_tester_arabic.php'), 'name' => 'Arabic', 'native' => 'العربية', 'flag' => 'flags/arabic_flag.svg'],
    'fr' => ['url' => url('keyboard_tester_french.php'), 'name' => 'French', 'native' => 'Français', 'flag' => 'flags/french_flag.svg'],
    'de' => ['url' => url('keyboard_tester_german.php'), 'name' => 'German', 'native' => 'Deutsch', 'flag' => 'flags/german_flag.svg'],
    'es' => ['url' => url('keyboard_tester_spanish.php'), 'name' => 'Spanish', 'native' => 'Español', 'flag' => 'flags/spanish_flag.svg'],
    'pt' => ['url' => url('keyboard_tester_portuguese.php'), 'name' => 'Portuguese', 'native' => 'Português', 'flag' => 'flags/Portugal_flag.svg'],
    'ru' => ['url' => url('keyboard_tester_russian.php'), 'name' => 'Russian', 'native' => 'Русский', 'flag' => 'flags/russian_flag.svg'],
    'ja' => ['url' => url('keyboard_tester_japanese.php'), 'name' => 'Japanese', 'native' => '日本語', 'flag' => 'flags/japan_flag.svg'],
    'ko' => ['url' => url('keyboard_tester_korean_index.php'), 'name' => 'Korean', 'native' => '한국어', 'flag' => 'flags/korean_flag.svg'],
];
