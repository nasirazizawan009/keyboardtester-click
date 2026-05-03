<?php
/**
 * Keyboard Tester - Main Page
 * Organized structure: Header → SEO/Hero → Tool → Tools List → Guidelines → Footer
 */

include __DIR__ . '/../../config.php';

// Set breadcrumbs for this page
$breadcrumbs = [
    ['label' => 'Tools', 'url' => url('pages/all-tools.php')],
    ['label' => 'Keyboard Tester', 'url' => '']
];

// Set meta tags
$pageTitle = 'Keyboard Tester — Test All Keys, N-Key Rollover & Ghosting Online | KeyboardTester.click';
$pageDescription = 'Free online keyboard tester — test every key, detect ghosting, check N-key rollover, measure key latency in milliseconds. Works with mechanical, membrane, and laptop keyboards. No install, open source.';
$pageKeywords = 'keyboard tester, keyboard test, online keyboard test, keyboard checker, test all keys, keyboard ghosting test, n-key rollover test, keyboard latency test, mechanical keyboard tester, keyboard response time';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../../includes/seo-meta.php'; ?>
    
    <!-- Common Head -->
    <?php include __DIR__ . '/../../includes/head-common.php'; ?>

    <!-- Tool-specific Styles (async) -->
    <script>loadCSS('<?php echo url('assets/css/keyboard-tool.min.css'); ?>');</script>
    <noscript><link rel="stylesheet" href="<?php echo url('assets/css/keyboard-tool.min.css'); ?>"></noscript>
</head>
<body>
    <!-- Header Navigation -->
    <?php include __DIR__ . '/../../includes/header.php'; ?>
    
    <!-- Breadcrumbs -->
    <?php include __DIR__ . '/../../includes/components/breadcrumbs.php'; ?>
    
    <!-- SEO Hero Section with H1 & Description -->
    <?php include __DIR__ . '/sections/seo-hero.php'; ?>
    
    <!-- Main Content -->
    <main class="tool-main-container">
        <!-- Tool Display -->
        <?php include __DIR__ . '/sections/tool-display.php'; ?>
        
        <!-- Related Tools List -->
        <?php $currentTool = 'keyboard-tester'; include __DIR__ . '/../../includes/components/tools-list.php'; ?>
    </main>
    
    <!-- Guidelines & FAQ -->
    <?php include __DIR__ . '/sections/guidelines.php'; ?>
    
    <!-- Footer -->
    <?php include __DIR__ . '/../../includes/footer.php'; ?>
    
    <style>
        .tool-main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 20px;
        }
    </style>
</body>
</html>

