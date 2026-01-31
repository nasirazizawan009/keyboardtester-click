<?php
/**
 * KeyboardTester.Click - Common Head Includes
 * Include this file in the <head> section of all pages
 * Usage: <?php include 'includes/head-common.php'; ?>
 */

// Determine base path (works for both root and subdirectories)
$basePath = '';
if (strpos($_SERVER['PHP_SELF'], '/tools/') !== false) {
    $basePath = '../';
}
?>
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto+Mono:wght@400;500&display=swap" rel="stylesheet">

<!-- Framework (Bootstrap 5) -->
<link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Global Styles -->
<link rel="stylesheet" href="<?php echo $basePath; ?>assets/css/global.css">

<!-- Theme Script (load early to prevent flash) -->
<script src="<?php echo $basePath; ?>assets/js/theme.js"></script>

<!-- Bootstrap JS (defer for performance) -->
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Favicon -->
<?php if (file_exists(__DIR__ . '/../favicon.php')): ?>
    <?php include __DIR__ . '/../favicon.php'; ?>
<?php else: ?>
    <link rel="icon" type="image/png" href="<?php echo $basePath; ?>navigation.png">
<?php endif; ?>

<!-- Mobile Theme Color -->
<meta name="theme-color" content="#4b5eAA">
