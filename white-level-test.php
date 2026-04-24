<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Online White Level Test - Clipped Highlights Detector | KeyboardTester.click';
$pageDescription = 'Free online white level test. Check whether your monitor clips highlights with 32 near-white patches. Detect crushed whites and incorrect contrast settings.';
$pageKeywords = 'white level test, clipped highlights test, near-white test, monitor highlight test';
$pageOgImage = 'images/white-level-test/white-level-test-hero.jpg';
$pageOgImageAlt = 'White level test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('white_level', [['name'=>'Home','url'=>'/'],['name'=>'White Level Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-white-level-test.php'; ?>
<section class="tool-stage" id="white-level-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>White Level Test</h2><p class="section-lede">Count visible patches 223-254 on white background. All visible = healthy. Missing high = clipped highlights.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/white_level_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">32 highlight steps</div><div class="trust-desc">RGB 223-254 patches</div></div>
<div class="trust-item"><div class="trust-title">Detects clipping</div><div class="trust-desc">Contrast and HDR issues</div></div>
<div class="trust-item"><div class="trust-title">Fullscreen mode</div><div class="trust-desc">Best visibility</div></div>
<div class="trust-item"><div class="trust-title">Browser only</div><div class="trust-desc">No download</div></div>
</div></section>
<?php $intentClusterTool = 'display'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/white-level-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/white-level-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
