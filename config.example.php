<?php
/**
 * KeyboardTester.Click - Site Configuration (EXAMPLE)
 *
 * Copy this file to config.php and update with your values
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
    // Local development - UPDATE THIS for your setup
    $baseUrl = '/your-folder/';
    $siteUrl = 'http://localhost/your-folder/';
    $blogUrl = '/your-folder/blog/';
} else {
    // Live site - UPDATE THIS with your domain
    $baseUrl = '/';
    $siteUrl = 'https://yourdomain.com/';
    $blogUrl = 'https://yourdomain.com/blog/';
}

// Site information - UPDATE THESE
$siteName = 'Your Site Name';
$siteDescription = 'Your site description';
$siteEmail = 'contact@yourdomain.com';
$siteYear = date('Y');

// Social links - UPDATE THESE
$socialLinks = [
    'twitter' => 'https://x.com/yourusername',
    'github' => 'https://github.com/yourusername'
];

/**
 * Generate a URL that works on both localhost and live site
 * @param string $path - The path relative to site root
 * @return string - Full URL
 */
function url($path = '') {
    global $baseUrl;
    $path = ltrim($path, '/');
    return $baseUrl . $path;
}

/**
 * Generate absolute URL (for SEO/canonical)
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

// Define common page links
$pages = [
    'home' => url(''),
    'mouse_test' => url('mouse-test.php'),
    'keyboard_typing' => url('keyboard_typing_test.php'),
    // Add more pages as needed
];
