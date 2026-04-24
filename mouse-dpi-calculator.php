<?php include 'config.php'; ?>
<?php
$pageTitle = 'Mouse DPI Calculator & Sensitivity Converter - Free Online | KeyboardTester.click';
$pageDescription = 'Measure true mouse DPI from pixels per inch and convert sensitivity between DPI values so your aim feels identical. Game presets for Valorant, CS2, Apex, Fortnite, Overwatch with cm/360° and recommended eDPI.';
$pageKeywords = 'mouse dpi calculator, sensitivity converter, edpi calculator, dpi conversion, cm per 360, valorant sens, cs2 sensitivity, mouse dpi test';
$pageOgImage = 'images/mouse-dpi-calculator/mouse-dpi-calculator-hero.jpg';
$pageOgImageAlt = 'Mouse DPI calculator';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('mouse_dpi_calc', [['name'=>'Home','url'=>'/'],['name'=>'Mouse DPI Calculator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-mouse-dpi-calculator.php'; ?>
<section class="tool-stage" id="mouse-dpi-calculator">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Mouse DPI Calculator &amp; Sensitivity Converter</h2><p class="section-lede">Measure your real mouse DPI by dragging a known distance, or convert your in-game sensitivity to a new DPI without breaking muscle memory. Game presets (Valorant, CS2, Apex, Fortnite, Overwatch) include cm/360° and recommended eDPI.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/mouse_dpi_calculator_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Drag to measure</div><div class="trust-desc">Live pixel tracking on the pad</div></div>
<div class="trust-item"><div class="trust-title">Manual entry</div><div class="trust-desc">Pixels + inches input supported</div></div>
<div class="trust-item"><div class="trust-title">Advertised vs real</div><div class="trust-desc">See sensor accuracy at a glance</div></div>
<div class="trust-item"><div class="trust-title">Browser only</div><div class="trust-desc">No download, no install</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/mouse-dpi-calculator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/mouse-dpi-calculator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
