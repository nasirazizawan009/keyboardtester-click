<?php
/**
 * Standard SEO meta tags for all pages.
 * Uses per-page overrides when provided.
 */

include_once __DIR__ . '/../config.php';

$metaConfig = [];
if (file_exists(__DIR__ . '/../meta-config.php')) {
    $metaConfig = include __DIR__ . '/../meta-config.php';
}

$toolsConfig = [];
if (file_exists(__DIR__ . '/../seo-config.php')) {
    include __DIR__ . '/../seo-config.php';
}

$pageFile = basename($_SERVER['PHP_SELF']);
$meta = $metaConfig[$pageFile] ?? [];

$toolMeta = null;
if (!empty($toolsConfig)) {
    foreach ($toolsConfig as $tool) {
        if (!empty($tool['path']) && basename($tool['path']) === $pageFile) {
            $toolMeta = $tool;
            break;
        }
    }
}

function seoHumanizePage($fileName) {
    $name = preg_replace('/\.(php|html)$/i', '', $fileName);
    $name = str_replace(['-', '_'], ' ', $name);
    $name = preg_replace('/\s+/', ' ', $name);
    $name = trim($name);
    return $name === '' ? 'Home' : ucwords($name);
}

$defaultTitle = $siteName . ' | ' . seoHumanizePage($pageFile);
$title = $pageTitle ?? $meta['title'] ?? ($toolMeta['title'] ?? $defaultTitle);
$description = $pageDescription ?? $meta['description'] ?? ($toolMeta['description'] ?? $siteDescription);
$keywords = $pageKeywords ?? $meta['keywords'] ?? ($toolMeta['keywords'] ?? '');
$author = $pageAuthor ?? $meta['author'] ?? $siteName;
$robots = $pageRobots ?? $meta['robots'] ?? 'index, follow';

// Build canonical URL - always absolute, HTTPS, non-www
$requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?? '';
$requestPath = ltrim($requestPath, '/');
$basePath = ltrim($baseUrl, '/');
if ($basePath !== '' && strpos($requestPath, $basePath) === 0) {
    $requestPath = substr($requestPath, strlen($basePath));
}
$requestPath = ltrim($requestPath, '/');

// Normalize: index.php -> root, remove query strings
if ($requestPath === 'index.php' || $requestPath === 'index.html') {
    $requestPath = '';
}
// Remove trailing index.php from paths like /languages/korean/index.php
$requestPath = preg_replace('~/index\.(php|html)$~', '/', $requestPath);

// Build canonical from page override, meta config, or request path
$canonical = $pageCanonical ?? $meta['canonical'] ?? null;
if (!$canonical) {
    $canonical = $requestPath === '' ? absoluteUrl('') : absoluteUrl($requestPath);
}

// Ensure canonical is always absolute URL with correct format
if ($canonical && !preg_match('~^https?://~i', $canonical)) {
    $canonical = absoluteUrl(ltrim($canonical, '/'));
}

// Force HTTPS and non-www in canonical (safety check)
$canonical = preg_replace('~^http://~i', 'https://', $canonical);
$canonical = preg_replace('~^(https?://)www\.~i', '$1', $canonical);

$ogImage = $pageOgImage ?? $meta['og_image'] ?? ($toolMeta['og_image'] ?? 'images/shared/keyboard-and-mouse.png');
if ($ogImage && !preg_match('~^https?://~i', $ogImage)) {
    $localPath = __DIR__ . '/../' . ltrim($ogImage, '/');
    if (!file_exists($localPath)) {
        $ogImage = 'images/shared/keyboard-and-mouse.png';
    }
    $ogImage = absoluteUrl(ltrim($ogImage, '/'));
}

$ogTitle = $pageOgTitle ?? $title;
$ogDescription = $pageOgDescription ?? $description;
$ogType = $pageOgType ?? 'website';
$ogUrl = $pageOgUrl ?? $canonical;
$ogImageAlt = $pageOgImageAlt ?? ($title . ' preview');
$twitterCard = $pageTwitterCard ?? 'summary_large_image';

?>
    <!-- Google Search Console Verification -->
    <meta name="google-site-verification" content="onILKj31lZD-N2oSgtXNpKZnKJZi1oK0N_yMWIP71_4">

    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
<?php if (!empty($keywords)): ?>
    <meta name="keywords" content="<?php echo htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8'); ?>">
<?php endif; ?>
    <meta name="author" content="<?php echo htmlspecialchars($author, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="robots" content="<?php echo htmlspecialchars($robots, ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">

    <meta property="og:type" content="<?php echo htmlspecialchars($ogType, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($ogUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($ogTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($ogDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image:alt" content="<?php echo htmlspecialchars($ogImageAlt, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?>">
<?php if (!empty($pageOgLocale)): ?>
    <meta property="og:locale" content="<?php echo htmlspecialchars($pageOgLocale, ENT_QUOTES, 'UTF-8'); ?>">
<?php endif; ?>

    <meta name="twitter:card" content="<?php echo htmlspecialchars($twitterCard, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:url" content="<?php echo htmlspecialchars($ogUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($ogTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($ogDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="twitter:image:alt" content="<?php echo htmlspecialchars($ogImageAlt, ENT_QUOTES, 'UTF-8'); ?>">
