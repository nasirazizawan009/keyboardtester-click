<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Online Ruler - Actual Size on Screen in cm & Inches | KeyboardTester.click';
$pageDescription = 'Free online ruler in actual size. Measure objects directly on your screen in centimeters, millimeters, and inches. Calibrate with a credit card or your monitor DPI for true 1:1 scale on any laptop, desktop, tablet, or phone.';
$pageKeywords = 'online ruler, screen ruler, actual size ruler, online ruler cm inches, ruler online free, virtual ruler, on-screen ruler, mm ruler online';
$pageOgImage = 'images/online-ruler/hero.jpg';
$pageOgImageAlt = 'Online ruler - actual size cm and inch ruler on screen with credit card calibration';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('online_ruler', [['name'=>'Home','url'=>'/'],['name'=>'Online Ruler','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-online-ruler.php'; ?>
<section class="tool-stage" id="online-ruler">
<div class="container tool-stage-header"><div><p class="section-kicker">Utility</p><h2>Online Ruler</h2><p class="section-lede">An actual-size ruler that lives on your screen. Calibrate once with a credit card or your monitor DPI, then measure anything you can hold up to the display in centimeters, millimeters, or inches.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/online_ruler_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Credit-card calibration</div><div class="trust-desc">ISO 85.6 x 54 mm reference</div></div>
<div class="trust-item"><div class="trust-title">cm + inches</div><div class="trust-desc">Both scales, switchable</div></div>
<div class="trust-item"><div class="trust-title">Vertical mode</div><div class="trust-desc">Rotate 90 degrees on demand</div></div>
<div class="trust-item"><div class="trust-title">Saved settings</div><div class="trust-desc">Calibration persists locally</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/online-ruler.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/online-ruler.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
