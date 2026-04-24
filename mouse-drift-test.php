<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Mouse Drift Test - Detect Sensor Jitter at Rest | KeyboardTester.click';
$pageDescription = 'Free mouse drift test. Detect idle cursor drift and sensor jitter by sampling pointer events for 30 seconds while the mouse sits still. Works in your browser, no install.';
$pageKeywords = 'mouse drift test, cursor drift, mouse sensor jitter, idle mouse movement, mouse drift detector, sensor noise test';
$pageOgImage = 'blog/images/mouse-jpg.jpg';
$pageOgImageAlt = 'Mouse drift test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('mouse_drift', [['name'=>'Home','url'=>'/'],['name'=>'Mouse Drift Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-mouse-drift-test.php'; ?>
<section class="tool-stage" id="mouse-drift-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Mouse Drift Test</h2><p class="section-lede">Place your hand off the mouse, press Start, and wait 30 seconds. The tool samples every pointer event and reports total drift, max delta, and movement count.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/mouse_drift_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Pixel-accurate</div><div class="trust-desc">Samples every PointerEvent from the browser</div></div>
<div class="trust-item"><div class="trust-title">Configurable</div><div class="trust-desc">10s, 30s, 60s, or 3-min runs</div></div>
<div class="trust-item"><div class="trust-title">Pass / fail verdict</div><div class="trust-desc">Zero pixels = perfect sensor</div></div>
<div class="trust-item"><div class="trust-title">Browser only</div><div class="trust-desc">No driver install, no upload</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/mouse-drift-test.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/mouse-drift-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
