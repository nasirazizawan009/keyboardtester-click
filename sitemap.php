<?php
/**
 * Dynamic XML Sitemap
 * Automatically generated for search engine crawling
 */

include 'config.php';

header('Content-Type: application/xml; charset=UTF-8');

// Last modified date for sitemap entries
$lastmod = date('Y-m-d');

// Define all pages and tools (absolute URLs for live + localhost)
$pages = [
    // Main pages
    ['url' => absoluteUrl(''), 'priority' => '1.0', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('pages/tools.php'), 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('tools/keyboard-tester/'), 'priority' => '0.95', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('pages/category-keyboard.php'), 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('pages/category-mouse.php'), 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('pages/category-audio-video.php'), 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('pages/category-utilities.php'), 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('pages/category-language-keyboards.php'), 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('about-us.php'), 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('privacy-policy.php'), 'priority' => '0.6', 'changefreq' => 'yearly'],
    ['url' => absoluteUrl('disclaimer.php'), 'priority' => '0.6', 'changefreq' => 'yearly'],
    ['url' => absoluteUrl('feedback.php'), 'priority' => '0.6', 'changefreq' => 'yearly'],
    // Keyboard tools
    ['url' => absoluteUrl('keyboard_typing_test.php'), 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('latency-checker.php'), 'priority' => '0.85', 'changefreq' => 'monthly'],

    // Mouse tools
    ['url' => absoluteUrl('mouse-test.php'), 'priority' => '0.9', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('mouse_speed_tester.php'), 'priority' => '0.85', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('ghost-click-detector.php'), 'priority' => '0.85', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('mouse_sensitivity_DPI_tester.php'), 'priority' => '0.85', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('mouse-trail.php'), 'priority' => '0.8', 'changefreq' => 'monthly'],

    // Display, webcam, audio
    ['url' => absoluteUrl('screentestindex.php'), 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('webcamtesterindex.php'), 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('mic-tester.php'), 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('headphone_speaker_tester_index.php'), 'priority' => '0.8', 'changefreq' => 'monthly'],

    // Utilities
    ['url' => absoluteUrl('QR_code_generator_scanner.php'), 'priority' => '0.75', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('qr-code-reader.php'), 'priority' => '0.75', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('ocr-tool.php'), 'priority' => '0.75', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('auto-password-generator.php'), 'priority' => '0.75', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('whatsapp-link-generator.php'), 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('whatsapp-Brand-link-generator.php'), 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('whatsapp-sentiment-analyzer.php'), 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => absoluteUrl('luckywheeltoolindex.php'), 'priority' => '0.7', 'changefreq' => 'monthly'],

    // Language versions
    ['url' => absoluteUrl('languages/arabic/'), 'priority' => '0.85', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('languages/russian/'), 'priority' => '0.85', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('languages/spanish/'), 'priority' => '0.85', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('languages/french/'), 'priority' => '0.85', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('languages/portuguese/'), 'priority' => '0.8', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('languages/japanese/'), 'priority' => '0.8', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('languages/german/'), 'priority' => '0.85', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('languages/korean/'), 'priority' => '0.8', 'changefreq' => 'weekly'],
    ['url' => absoluteUrl('keyboard_tester_different_languages.php'), 'priority' => '0.7', 'changefreq' => 'weekly'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($pages as $page):
    echo '    <url>' . "\n";
    echo '        <loc>' . htmlspecialchars($page['url']) . '</loc>' . "\n";
    echo '        <lastmod>' . $lastmod . '</lastmod>' . "\n";
    echo '        <changefreq>' . $page['changefreq'] . '</changefreq>' . "\n";
    echo '        <priority>' . $page['priority'] . '</priority>' . "\n";
    echo '    </url>' . "\n";
endforeach;

echo '</urlset>';
?>
