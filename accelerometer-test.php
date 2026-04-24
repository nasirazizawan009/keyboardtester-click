<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Accelerometer Test - Phone & Tablet Motion Sensor Check | KeyboardTester.click';
$pageDescription = 'Free online accelerometer test for phones and tablets. Live X/Y/Z acceleration readout in m/s2, shake counter, and tilt visualizer using the DeviceMotion API. Browser-based, no app install.';
$pageKeywords = 'accelerometer test, phone accelerometer check, tablet motion sensor test, devicemotion api, m/s2 readout, shake test';
$pageOgImage = 'images/mouse/hero.png';
$pageOgImageAlt = 'Accelerometer test - live X Y Z acceleration readout';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('accelerometer_test', [['name'=>'Home','url'=>'/'],['name'=>'Accelerometer Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-accelerometer-test.php'; ?>
<section class="tool-stage" id="accelerometer-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Accelerometer Test</h2><p class="section-lede">Live X, Y, and Z acceleration in m/s&sup2;, a tilt-ball visualizer, a shake counter, and peak tracking &mdash; everything you need to verify a phone or tablet motion sensor without installing an app.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/accelerometer_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Live X/Y/Z</div><div class="trust-desc">60 Hz sensor readout</div></div>
<div class="trust-item"><div class="trust-title">Tilt ball</div><div class="trust-desc">Visual orientation check</div></div>
<div class="trust-item"><div class="trust-title">Shake counter</div><div class="trust-desc">Detects fast motion events</div></div>
<div class="trust-item"><div class="trust-title">Peak tracking</div><div class="trust-desc">Max recorded g-force</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/accelerometer-test.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/accelerometer-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
