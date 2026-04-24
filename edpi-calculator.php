<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free eDPI Calculator - Effective DPI for Gaming | KeyboardTester.click';
$pageDescription = 'Free eDPI calculator. Compute effective DPI (DPI × sensitivity) and cm/360 for CS2, Valorant, Apex, Overwatch and other FPS games. Includes yaw-multiplier presets.';
$pageKeywords = 'eDPI calculator, effective DPI, gaming sensitivity calculator, cm 360 calculator';
$pageOgImage = 'images/edpi-calculator/edpi-calculator-hero.jpg';
$pageOgImageAlt = 'eDPI calculator';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('edpi_calc', [['name'=>'Home','url'=>'/'],['name'=>'eDPI Calculator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-edpi-calculator.php'; ?>
<section class="tool-stage" id="edpi-calculator">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>eDPI Calculator</h2><p class="section-lede">Enter DPI and in-game sensitivity. We calculate eDPI and cm/360.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/edpi_calculator_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">eDPI</div><div class="trust-desc">DPI x sensitivity</div></div>
<div class="trust-item"><div class="trust-title">cm/360</div><div class="trust-desc">Physical swipe distance</div></div>
<div class="trust-item"><div class="trust-title">Yaw configurable</div><div class="trust-desc">Per-game multipliers</div></div>
<div class="trust-item"><div class="trust-title">Browser only</div><div class="trust-desc">No download</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/edpi-calculator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/edpi-calculator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
