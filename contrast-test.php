<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Online Monitor Contrast Test - Checkerboard Calibration | KeyboardTester.click';
$pageDescription = 'Free online monitor contrast test. Checkerboard pattern beside 50% gray reveals contrast and gamma issues. Works for LCD, LED, OLED and projector setups.';
$pageKeywords = 'monitor contrast test, contrast calibration, checkerboard test';
$pageOgImage = 'images/contrast-test/contrast-test-hero.jpg';
$pageOgImageAlt = 'Monitor contrast test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('contrast', [['name'=>'Home','url'=>'/'],['name'=>'Contrast Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-contrast-test.php'; ?>
<section class="tool-stage" id="contrast-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Contrast Test</h2><p class="section-lede">Squint or step back. Checkerboard average should equal solid gray.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/contrast_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Checkerboard pattern</div><div class="trust-desc">Black + white 50/50 mix</div></div>
<div class="trust-item"><div class="trust-title">50% gray reference</div><div class="trust-desc">RGB 128 solid</div></div>
<div class="trust-item"><div class="trust-title">Reveals gamma</div><div class="trust-desc">Mismatch = miscalibration</div></div>
<div class="trust-item"><div class="trust-title">Browser only</div><div class="trust-desc">No download</div></div>
</div></section>
<?php $intentClusterTool = 'display'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/contrast-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/contrast-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
