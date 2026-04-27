<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Gyroscope Test - Phone & Tablet Orientation Sensor Check | KeyboardTester.click';
$pageDescription = 'Free online gyroscope test. Live alpha, beta, gamma rotation readout in degrees, 3D cube that mirrors device orientation, and compass ring for alpha. DeviceOrientation API, no app install.';
$pageKeywords = 'gyroscope test, phone gyroscope check, deviceorientation api, alpha beta gamma readout, tablet rotation sensor';
$pageOgImage = 'images/gyroscope-test/hero.jpg';
$pageOgImageAlt = 'Gyroscope test - live alpha beta gamma rotation readout';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('gyroscope_test', [['name'=>'Home','url'=>'/'],['name'=>'Gyroscope Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-gyroscope-test.php'; ?>
<section class="tool-stage" id="gyroscope-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Gyroscope Test</h2><p class="section-lede">Live alpha, beta, and gamma orientation readout with a 3D cube that rotates exactly with your device, a compass ring for alpha, and a calibrate-to-zero button &mdash; verify the rotation sensor without installing an app.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/gyroscope_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Alpha / Beta / Gamma</div><div class="trust-desc">3-axis rotation in degrees</div></div>
<div class="trust-item"><div class="trust-title">3D cube</div><div class="trust-desc">Mirrors your orientation</div></div>
<div class="trust-item"><div class="trust-title">Compass ring</div><div class="trust-desc">Alpha heading indicator</div></div>
<div class="trust-item"><div class="trust-title">Calibrate</div><div class="trust-desc">Zero to current position</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/gyroscope-test.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/gyroscope-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
