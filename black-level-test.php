<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Online Black Level Test - Crushed Blacks Detector | KeyboardTester.click';
$pageDescription = 'Free online black level test. Check whether your monitor crushes shadow detail with 32 near-black patches. Detect incorrect black-level mapping and gamma issues.';
$pageKeywords = 'black level test, crushed blacks test, near-black test, monitor shadow test';
$pageOgImage = 'images/black-level-test/black-level-test-hero.jpg';
$pageOgImageAlt = 'Black level test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('black_level', [['name'=>'Home','url'=>'/'],['name'=>'Black Level Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-black-level-test.php'; ?>
<section class="tool-stage" id="black-level-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Black Level Test</h2><p class="section-lede">Count visible patches 1-32 on black background. All visible = healthy. Missing low = crushed blacks.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/black_level_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">32 shadow steps</div><div class="trust-desc">RGB 1 through 32 patches</div></div>
<div class="trust-item"><div class="trust-title">Detects crushed blacks</div><div class="trust-desc">Common GPU output bug</div></div>
<div class="trust-item"><div class="trust-title">Fullscreen mode</div><div class="trust-desc">Dim room recommended</div></div>
<div class="trust-item"><div class="trust-title">Browser only</div><div class="trust-desc">No download</div></div>
</div></section>
<?php $intentClusterTool = 'display'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/black-level-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/black-level-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
