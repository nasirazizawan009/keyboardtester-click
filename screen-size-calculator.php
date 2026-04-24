<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Screen Size Calculator - Diagonal, Width, Height | KeyboardTester.click';
$pageDescription = 'Free screen size calculator. Enter aspect ratio + any one of diagonal, width, or height and the tool computes the other two in inches and centimeters. Ideal for monitor, TV, or laptop shopping.';
$pageKeywords = 'screen size calculator, monitor size calculator, tv size calculator, diagonal to width calculator, inches to cm screen';
$pageOgImage = 'blog/images/gaming-jpg.jpg';
$pageOgImageAlt = 'Screen size calculator';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('screen_size_calc', [['name'=>'Home','url'=>'/'],['name'=>'Screen Size Calculator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-screen-size-calculator.php'; ?>
<section class="tool-stage" id="screen-size-calculator">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Screen Size Calculator</h2><p class="section-lede">Pick an aspect ratio, then enter a diagonal, width, or height. The tool resolves the other two dimensions in inches and centimeters.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/screen_size_calc_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Diagonal / width / height</div><div class="trust-desc">Solve from any one input</div></div>
<div class="trust-item"><div class="trust-title">Inches + centimeters</div><div class="trust-desc">Both units, side by side</div></div>
<div class="trust-item"><div class="trust-title">Area</div><div class="trust-desc">Compare TVs at a glance</div></div>
<div class="trust-item"><div class="trust-title">Live</div><div class="trust-desc">Updates as you type</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/screen-size-calculator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/screen-size-calculator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
