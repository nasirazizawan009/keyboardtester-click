<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Screen Resolution Test - Live Detect Resolution, DPR, Color Depth | KeyboardTester.click';
$pageDescription = 'Free screen resolution test. Detects your display resolution, device pixel ratio, color depth, viewport size, and orientation live in the browser — no install, no scripts, no uploads.';
$pageKeywords = 'screen resolution test, what is my resolution, device pixel ratio, dpr test, color depth test, viewport size checker';
$pageOgImage = 'blog/images/gaming-jpg.jpg';
$pageOgImageAlt = 'Screen resolution test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('resolution_test', [['name'=>'Home','url'=>'/'],['name'=>'Screen Resolution Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-resolution-test.php'; ?>
<section class="tool-stage" id="resolution-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Screen Resolution Test</h2><p class="section-lede">Reads every display property the browser exposes — screen width/height, viewport, device pixel ratio, color depth, color gamut, orientation, and more — and updates live as you resize the window.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/resolution_test_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Native resolution</div><div class="trust-desc">Physical pixels × DPR</div></div>
<div class="trust-item"><div class="trust-title">Viewport</div><div class="trust-desc">Browser window size</div></div>
<div class="trust-item"><div class="trust-title">Color depth</div><div class="trust-desc">Bits per pixel</div></div>
<div class="trust-item"><div class="trust-title">Live updates</div><div class="trust-desc">Refreshes on resize</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/resolution-test.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/resolution-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
