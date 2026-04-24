<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free FPS Test - Browser & Monitor Frame Rate Checker | KeyboardTester.click';
$pageDescription = 'Free FPS test. Measures your browser and monitor frame rate in real time using requestAnimationFrame. Shows current, average, min, and max FPS plus a 1% lows metric.';
$pageKeywords = 'fps test, frame rate test, monitor fps, browser fps, 60hz 120hz 144hz test, 1% lows';
$pageOgImage = 'blog/images/gaming-jpg.jpg';
$pageOgImageAlt = 'FPS test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('fps_test', [['name'=>'Home','url'=>'/'],['name'=>'FPS Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-fps-test.php'; ?>
<section class="tool-stage" id="fps-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>FPS Test</h2><p class="section-lede">Live frame rate measurement via the browser's rAF clock. Reports current FPS, average, min, max, and 1% low — plus detects whether your display runs at 60, 120, 144, 165 or 240 Hz.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/fps_test_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Live FPS</div><div class="trust-desc">Updates every frame</div></div>
<div class="trust-item"><div class="trust-title">Avg / min / max</div><div class="trust-desc">Running stats</div></div>
<div class="trust-item"><div class="trust-title">1% low</div><div class="trust-desc">The stutter metric</div></div>
<div class="trust-item"><div class="trust-title">Refresh rate detect</div><div class="trust-desc">60 / 120 / 144 / 240 Hz</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/fps-test.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/fps-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
