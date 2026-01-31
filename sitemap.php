<?php
/**
 * Dynamic XML Sitemap
 * Automatically generated for search engine crawling
 */

include 'config.php';

header('Content-Type: application/xml; charset=UTF-8');

// Define all pages and tools
$pages = [
    // Main pages
    ['url' => $baseUrl . '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/pages/tools.php', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/pages/about.php', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['url' => $baseUrl . '/pages/privacy-policy.php', 'priority' => '0.6', 'changefreq' => 'yearly'],
    ['url' => $baseUrl . '/pages/disclaimer.php', 'priority' => '0.6', 'changefreq' => 'yearly'],
    
    // Tools
    ['url' => $baseUrl . '/tools/keyboard-tester/', 'priority' => '0.95', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/tools/mouse-tester/', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/tools/webcam-tester/', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/tools/screen-tester/', 'priority' => '0.85', 'changefreq' => 'monthly'],
    ['url' => $baseUrl . '/tools/mic-tester/', 'priority' => '0.8', 'changefreq' => 'monthly'],
    
    // Language versions
    ['url' => $baseUrl . '/languages/arabic/', 'priority' => '0.85', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/languages/russian/', 'priority' => '0.85', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/languages/spanish/', 'priority' => '0.85', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/languages/french/', 'priority' => '0.85', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/languages/portuguese/', 'priority' => '0.8', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/languages/japanese/', 'priority' => '0.8', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/languages/german/', 'priority' => '0.85', 'changefreq' => 'weekly'],
    ['url' => $baseUrl . '/languages/korean/', 'priority' => '0.8', 'changefreq' => 'weekly'],
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($pages as $page):
    echo '    <url>' . "\n";
    echo '        <loc>' . htmlspecialchars($page['url']) . '</loc>' . "\n";
    echo '        <priority>' . $page['priority'] . '</priority>' . "\n";
    echo '        <changefreq>' . $page['changefreq'] . '</changefreq>' . "\n";
    echo '    </url>' . "\n";
endforeach;

echo '</urlset>';
?>