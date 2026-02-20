<?php
/**
 * Sitemap Generator for keyboardtester.click
 *
 * Scans all .php pages and outputs sitemap.xml
 * Excludes: includes/, admin/, tools/, help/, test pages, config files
 *
 * Usage:
 *   CLI: php generate-sitemap.php
 *   Web: https://keyboardtester.click/generate-sitemap.php?key=YOUR_SECRET_KEY
 */

// Security: Require key for web access
$secretKey = 'kbt-sitemap-2026';
if (php_sapi_name() !== 'cli') {
    if (!isset($_GET['key']) || $_GET['key'] !== $secretKey) {
        http_response_code(403);
        die('Access denied. Use CLI or provide valid key.');
    }
}

// Configuration
$baseUrl = 'https://keyboardtester.click';
$rootDir = __DIR__;
$outputFile = $rootDir . '/sitemap.xml';

// Directories to exclude
$excludeDirs = [
    'includes',
    'admin',
    'tools',
    'help',
    'assets',
    'docs',
    'blog',  // WordPress has its own sitemap
    'temp',
    'cache',
    '_old',
    '_backup',
    '.claude',
    'node_modules',
    'vendor'
];

// Files to exclude (patterns)
$excludePatterns = [
    '/^test-/',
    '/^debug-/',
    '/^fix-/',
    '/^clear-/',
    '/^ftp-/',
    '/^tmp_/',
    '/^deploy-/',
    '/^generate-sitemap\.php$/',
    '/^config\.php$/',
    '/^meta-config\.php$/',
    '/^seo-config\.php$/',
    '/^modular-utils\.php$/',
    '/^sitemap\.php$/',
    '/^send_email\.php$/',
    '/^send_feedback\.php$/',
    '/^favicon\.php$/',
    '/^header\.php$/',
    '/^footer\.php$/',
    '/\.py$/',
    '/_tool\.php$/',  // Tool implementation files
    '/tester_tool\.php$/',
    '/^test_.*\.php$/',  // Files starting with test_
    // Legacy redirect pages (these redirect to /languages/*)
    '/^keyboard_tester_arabic\.php$/',
    '/^keyboard_tester_russian\.php$/',
    '/^keyboard_tester_spanish\.php$/',
    '/^keyboard_tester_french\.php$/',
    '/^keyboard_tester_french_v2\.php$/',
    '/^keyboard_tester_german\.php$/',
    '/^keyboard_tester_portuguese\.php$/',
    '/^keyboard_tester_japanese\.php$/',
    '/^keyboard_tester_korean_index\.php$/',
    // Tool implementation files (not index pages)
    '/^luckywheeltool\.php$/',
    '/^screentesttool\.php$/',
    '/^webcamtestertool\.php$/',
    '/^headphone_speaker_tester_tool\.php$/',
];

// Define page priorities and change frequencies
$pageConfig = [
    // Homepage
    'index.php' => ['priority' => '1.0', 'changefreq' => 'weekly'],

    // Pillar/Hub pages (high priority)
    'mouse-and-keyboard-test-tools.php' => ['priority' => '0.95', 'changefreq' => 'weekly'],

    // Main tools (high priority)
    'mouse-test.php' => ['priority' => '0.9', 'changefreq' => 'weekly'],
    'keyboard_typing_test.php' => ['priority' => '0.9', 'changefreq' => 'weekly'],
    'ghost-click-detector.php' => ['priority' => '0.85', 'changefreq' => 'weekly'],
    'mouse_speed_tester.php' => ['priority' => '0.85', 'changefreq' => 'weekly'],
    'mouse_sensitivity_DPI_tester.php' => ['priority' => '0.85', 'changefreq' => 'weekly'],
    'latency-checker.php' => ['priority' => '0.85', 'changefreq' => 'weekly'],
    'mic-tester.php' => ['priority' => '0.85', 'changefreq' => 'weekly'],

    // Secondary tools
    'mouse-trail.php' => ['priority' => '0.8', 'changefreq' => 'monthly'],
    'screentestindex.php' => ['priority' => '0.8', 'changefreq' => 'monthly'],
    'webcamtesterindex.php' => ['priority' => '0.8', 'changefreq' => 'monthly'],
    'headphone_speaker_tester_index.php' => ['priority' => '0.8', 'changefreq' => 'monthly'],

    // Utility tools
    'QR_code_generator_scanner.php' => ['priority' => '0.75', 'changefreq' => 'monthly'],
    'qr-code-reader.php' => ['priority' => '0.75', 'changefreq' => 'monthly'],
    'ocr-tool.php' => ['priority' => '0.75', 'changefreq' => 'monthly'],
    'auto-password-generator.php' => ['priority' => '0.75', 'changefreq' => 'monthly'],

    // WhatsApp tools
    'whatsapp-link-generator.php' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    'whatsapp-Brand-link-generator.php' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    'whatsapp-sentiment-analyzer.php' => ['priority' => '0.7', 'changefreq' => 'monthly'],

    // Other tools
    'luckywheeltoolindex.php' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    'keyboard_tester_different_languages.php' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    'tools.php' => ['priority' => '0.8', 'changefreq' => 'weekly'],

    // Info pages
    'about-us.php' => ['priority' => '0.6', 'changefreq' => 'monthly'],
    'privacy-policy.php' => ['priority' => '0.5', 'changefreq' => 'yearly'],
    'disclaimer.php' => ['priority' => '0.5', 'changefreq' => 'yearly'],
    'feedback.php' => ['priority' => '0.5', 'changefreq' => 'yearly'],
];

// Language pages configuration
$languagePages = [
    'languages/arabic/' => ['priority' => '0.85', 'changefreq' => 'weekly'],
    'languages/russian/' => ['priority' => '0.85', 'changefreq' => 'weekly'],
    'languages/spanish/' => ['priority' => '0.85', 'changefreq' => 'weekly'],
    'languages/french/' => ['priority' => '0.85', 'changefreq' => 'weekly'],
    'languages/german/' => ['priority' => '0.85', 'changefreq' => 'weekly'],
    'languages/portuguese/' => ['priority' => '0.8', 'changefreq' => 'weekly'],
    'languages/japanese/' => ['priority' => '0.8', 'changefreq' => 'weekly'],
    'languages/korean/' => ['priority' => '0.8', 'changefreq' => 'weekly'],
];

// Category pages
$categoryPages = [
    'pages/tools.php' => ['priority' => '0.8', 'changefreq' => 'weekly'],
    'pages/category-keyboard.php' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    'pages/category-mouse.php' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    'pages/category-audio-video.php' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    'pages/category-utilities.php' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    'pages/category-language-keyboards.php' => ['priority' => '0.7', 'changefreq' => 'monthly'],
];

/**
 * Check if file should be excluded
 */
function sitemap_shouldExclude($filename, $excludePatterns) {
    foreach ($excludePatterns as $pattern) {
        if (preg_match($pattern, $filename)) {
            return true;
        }
    }
    return false;
}

/**
 * Get file modification date
 */
function sitemap_getLastMod($filepath) {
    if (file_exists($filepath)) {
        return date('Y-m-d', filemtime($filepath));
    }
    return date('Y-m-d');
}

/**
 * Generate URL entry
 */
function sitemap_generateUrlEntry($loc, $lastmod, $changefreq, $priority) {
    return "  <url>\n" .
           "    <loc>{$loc}</loc>\n" .
           "    <lastmod>{$lastmod}</lastmod>\n" .
           "    <changefreq>{$changefreq}</changefreq>\n" .
           "    <priority>{$priority}</priority>\n" .
           "  </url>\n";
}

// Start building sitemap
$urls = [];

// Add root PHP pages
$files = glob($rootDir . '/*.php');
foreach ($files as $file) {
    $filename = basename($file);

    // Skip excluded files
    if (sitemap_shouldExclude($filename, $excludePatterns)) {
        continue;
    }

    // Get config or use defaults
    $config = $pageConfig[$filename] ?? ['priority' => '0.6', 'changefreq' => 'monthly'];

    // Handle index.php specially (use root URL)
    if ($filename === 'index.php') {
        $url = $baseUrl . '/';
    } else {
        $url = $baseUrl . '/' . $filename;
    }

    $urls[] = [
        'loc' => $url,
        'lastmod' => sitemap_getLastMod($file),
        'changefreq' => $config['changefreq'],
        'priority' => $config['priority']
    ];
}

// Add language pages
foreach ($languagePages as $path => $config) {
    $fullPath = $rootDir . '/' . $path . 'index.php';
    if (file_exists($fullPath)) {
        $urls[] = [
            'loc' => $baseUrl . '/' . $path,
            'lastmod' => sitemap_getLastMod($fullPath),
            'changefreq' => $config['changefreq'],
            'priority' => $config['priority']
        ];
    }
}

// Add category pages
foreach ($categoryPages as $path => $config) {
    $fullPath = $rootDir . '/' . $path;
    if (file_exists($fullPath)) {
        $urls[] = [
            'loc' => $baseUrl . '/' . $path,
            'lastmod' => sitemap_getLastMod($fullPath),
            'changefreq' => $config['changefreq'],
            'priority' => $config['priority']
        ];
    }
}

// Add keyboard tester directory (main tool)
$keyboardTesterDir = $rootDir . '/tools/keyboard-tester/index.php';
if (file_exists($keyboardTesterDir)) {
    $urls[] = [
        'loc' => $baseUrl . '/tools/keyboard-tester/',
        'lastmod' => sitemap_getLastMod($keyboardTesterDir),
        'changefreq' => 'weekly',
        'priority' => '0.95'
    ];
}

// Add blog (WordPress handles its own sitemap, but we include the main page)
$blogIndex = $rootDir . '/blog/index.php';
if (file_exists($blogIndex)) {
    $urls[] = [
        'loc' => $baseUrl . '/blog/',
        'lastmod' => sitemap_getLastMod($blogIndex),
        'changefreq' => 'weekly',
        'priority' => '0.7'
    ];
}

// Sort URLs by priority (highest first)
usort($urls, function($a, $b) {
    return floatval($b['priority']) <=> floatval($a['priority']);
});

// Generate XML
$xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($urls as $url) {
    $xml .= sitemap_generateUrlEntry(
        htmlspecialchars($url['loc']),
        $url['lastmod'],
        $url['changefreq'],
        $url['priority']
    );
}

$xml .= '</urlset>' . "\n";

// Write to file
$result = file_put_contents($outputFile, $xml);

if ($result !== false) {
    $urlCount = count($urls);
    $message = "Sitemap generated successfully!\n";
    $message .= "File: {$outputFile}\n";
    $message .= "URLs: {$urlCount}\n";
    $message .= "Size: " . number_format($result) . " bytes\n";

    if (php_sapi_name() === 'cli') {
        echo $message;
        echo "\nURLs included:\n";
        foreach ($urls as $url) {
            echo "  [{$url['priority']}] {$url['loc']}\n";
        }
    } else {
        header('Content-Type: text/plain');
        echo $message;
    }
} else {
    $error = "Error: Could not write sitemap to {$outputFile}";
    if (php_sapi_name() === 'cli') {
        echo $error . "\n";
        exit(1);
    } else {
        http_response_code(500);
        echo $error;
    }
}
