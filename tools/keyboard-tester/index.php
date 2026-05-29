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
$pageTitle = 'N-Key Rollover & Anti-Ghosting Test - Check Every Key';
$pageDescription = 'Free N-key rollover (NKRO) and anti-ghosting test. Press multiple keys at once to see how many your keyboard registers, find blocked key combos, and check key latency. No install needed.';
$pageKeywords = 'n-key rollover test, nkro test, anti-ghosting test, keyboard ghosting test, key rollover checker, simultaneous key press test, keyboard latency test, mechanical keyboard rollover';
?>

<?php
if (empty($_GET['lang']) || $_GET['lang'] === 'en') {
    $pageOgImage = $pageOgImage ?? 'images/keyboard/hero-keyboard-test-1400.png';
    $pageOgImageAlt = $pageOgImageAlt ?? 'Online keyboard tester showing a full keyboard diagnostic workspace';
    $kbtTemplateToolId = 'keyboard-home';
    $kbtTemplateSchemaKey = 'keyboard_tester';
    $kbtTemplateToolInclude = 'tools/keyboard-tester/sections/tool-display.php';
    $kbtTemplateStageId = 'keyboard-stage';
    $kbtTemplateShellId = 'keyboard-tester';
    $kbtTemplateToolTitle = 'N-Key Rollover & Ghosting Test';
    $kbtTemplateToolLede = 'Test every key, check keyboard ghosting, review N-key rollover, and use Advanced Options or Pro Test diagnostics in the same browser workspace.';
    $kbtTemplateSeoContentInclude = 'tools/keyboard-tester/sections/guidelines.php';
    $kbtTemplateBlogSlug = 'how-to-test-keyboard-online.php';
    require __DIR__ . '/../../includes/render-english-tool-page.php';
    return;
}
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
    <?php include __DIR__ . '/../../includes/components/tool-category-strip.php'; ?>

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
