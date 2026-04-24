<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Online Monitor Brightness Test - 11-Step Calibration | KeyboardTester.click';
$pageDescription = 'Free online monitor brightness test. 11-step grayscale ladder reveals brightness, contrast and gamma misconfiguration. Works on LCD, LED and OLED displays.';
$pageKeywords = 'brightness test, monitor brightness calibration, grayscale ladder test, display brightness check';
$pageOgImage = 'images/brightness-test/brightness-test-hero.jpg';
$pageOgImageAlt = 'Monitor brightness test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('brightness', [['name'=>'Home','url'=>'/'],['name'=>'Brightness Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-brightness-test.php'; ?>
<section class="tool-stage" id="brightness-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Brightness Test</h2><p class="section-lede">11 steps from black to white. All distinct = healthy. Merging steps = misconfigured.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/brightness_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">11-step ladder</div><div class="trust-desc">0 to 100% in 10% steps</div></div>
<div class="trust-item"><div class="trust-title">Detects misconfiguration</div><div class="trust-desc">Brightness, contrast, gamma</div></div>
<div class="trust-item"><div class="trust-title">Fullscreen mode</div><div class="trust-desc">Best visibility</div></div>
<div class="trust-item"><div class="trust-title">Browser only</div><div class="trust-desc">No download</div></div>
</div></section>
<?php $intentClusterTool = 'display'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/brightness-test.php'; ?>
<?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
<?php include 'help/brightness-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
