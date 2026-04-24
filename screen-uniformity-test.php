<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Screen Uniformity Test - Check Panel Backlight & Clouding | KeyboardTester.click';
$pageDescription = 'Free screen uniformity test. Fullscreen gray, red, green, blue, or white for spotting LCD clouding, IPS glow, backlight bleed, and dark-corner uniformity issues across the panel.';
$pageKeywords = 'screen uniformity test, monitor uniformity, lcd clouding test, ips glow test, backlight uniformity, panel uniformity checker';
$pageOgImage = 'blog/images/gaming-jpg.jpg';
$pageOgImageAlt = 'Screen uniformity test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('screen_uniformity', [['name'=>'Home','url'=>'/'],['name'=>'Screen Uniformity Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-screen-uniformity-test.php'; ?>
<section class="tool-stage" id="screen-uniformity-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Screen Uniformity Test</h2><p class="section-lede">Pick a color and brightness level, enter fullscreen, and look for dark corners, brighter edges, clouds, or IPS glow on your monitor. Different colors reveal different uniformity issues.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/screen_uniformity_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Mid-gray</div><div class="trust-desc">Clouding reveal</div></div>
<div class="trust-item"><div class="trust-title">Near-black</div><div class="trust-desc">IPS glow + bleed</div></div>
<div class="trust-item"><div class="trust-title">Primary colors</div><div class="trust-desc">Tint drift by region</div></div>
<div class="trust-item"><div class="trust-title">Brightness slider</div><div class="trust-desc">0–100% continuous</div></div>
</div></section>
<?php $intentClusterTool = 'screen'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/screen-uniformity-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/screen-uniformity-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
