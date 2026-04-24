<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free OLED Burn-In Test - Check Screen for Image Retention | KeyboardTester.click';
$pageDescription = 'Free OLED and plasma burn-in test. Cycle through full-color, checkerboard, and scrolling patterns fullscreen to spot image retention, dead subpixels, and burn-in ghosts on your display.';
$pageKeywords = 'oled burn in test, plasma burn in test, screen burn in checker, image retention test, oled ghosting test, display burn in';
$pageOgImage = 'blog/images/gaming-jpg.jpg';
$pageOgImageAlt = 'OLED burn-in test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('burn_in', [['name'=>'Home','url'=>'/'],['name'=>'OLED Burn-In Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-burn-in-test.php'; ?>
<section class="tool-stage" id="burn-in-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>OLED Burn-In Test</h2><p class="section-lede">Pick a mode and press Fullscreen. Solid colors reveal retention; checkerboard exposes dead subpixels; scroll mode is a pixel-refresher that helps restore freshness on OLED.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/burn_in_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Solid color cycle</div><div class="trust-desc">White / black / R / G / B</div></div>
<div class="trust-item"><div class="trust-title">Checkerboard</div><div class="trust-desc">Spots stuck subpixels</div></div>
<div class="trust-item"><div class="trust-title">Scroll mode</div><div class="trust-desc">OLED pixel refresher</div></div>
<div class="trust-item"><div class="trust-title">Fullscreen</div><div class="trust-desc">Zero UI interference</div></div>
</div></section>
<?php $intentClusterTool = 'screen'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/burn-in-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/burn-in-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
