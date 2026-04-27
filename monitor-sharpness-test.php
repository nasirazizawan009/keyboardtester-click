<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Monitor Sharpness Test - Online Text Clarity & Pixel Test | KeyboardTester.click';
$pageDescription = 'Free monitor sharpness test online. Check text clarity, color fringing, sub-pixel layout, and pixel-grid moire on your display. Lagom-style sharpness pattern, multi-size text samples, and full-screen mode. Browser-based, no install.';
$pageKeywords = 'monitor sharpness test, text clarity test, screen sharpness test online, lagom sharpness test, color fringing test, sub-pixel test, monitor text test';
$pageOgImage = 'images/monitor-sharpness-test/hero.jpg';
$pageOgImageAlt = 'Monitor sharpness test - close-up of pixels and text on a computer display';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('monitor_sharpness_test', [['name'=>'Home','url'=>'/'],['name'=>'Monitor Sharpness Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-monitor-sharpness-test.php'; ?>
<section class="tool-stage" id="monitor-sharpness-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Display quality</p><h2>Monitor Sharpness Test</h2><p class="section-lede">Render Lagom-style 1px pixel-grid patterns, multi-size text samples in three font families, color-fringing blocks, and an RGB sub-pixel ruler to evaluate how sharply your monitor reproduces fine detail. Toggle dark mode and full-screen any pattern to inspect under real viewing conditions &mdash; all in the browser, no install.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">How to read results</a></div></div>
<section class="tool-shell"><?php include 'tools/monitor_sharpness_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">1px pixel grid</div><div class="trust-desc">Lagom-style sharpness pattern</div></div>
<div class="trust-item"><div class="trust-title">Multi-size text</div><div class="trust-desc">12-64 px in 3 font families</div></div>
<div class="trust-item"><div class="trust-title">Color fringing</div><div class="trust-desc">Spot chromatic aberration</div></div>
<div class="trust-item"><div class="trust-title">Sub-pixel ruler</div><div class="trust-desc">RGB stripe reveals layout</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/monitor-sharpness-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/monitor-sharpness-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
