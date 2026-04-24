<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free PPI Calculator - Pixels Per Inch from Resolution & Diagonal | KeyboardTester.click';
$pageDescription = 'Free pixels-per-inch calculator. Enter screen resolution and diagonal size to compute PPI, dot pitch, and total pixel count. Includes presets for common monitor sizes and retina comparison.';
$pageKeywords = 'ppi calculator, pixels per inch calculator, dpi calculator monitor, dot pitch calculator, screen density calculator';
$pageOgImage = 'blog/images/gaming-jpg.jpg';
$pageOgImageAlt = 'PPI calculator';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('ppi_calc', [['name'=>'Home','url'=>'/'],['name'=>'PPI Calculator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-ppi-calculator.php'; ?>
<section class="tool-stage" id="ppi-calculator">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>PPI Calculator</h2><p class="section-lede">Compute pixels per inch, dot pitch, and total megapixels for any display from resolution plus diagonal size.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/ppi_calculator_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">PPI result</div><div class="trust-desc">Pixels per physical inch</div></div>
<div class="trust-item"><div class="trust-title">Dot pitch</div><div class="trust-desc">Microns between pixel centers</div></div>
<div class="trust-item"><div class="trust-title">Aspect ratio</div><div class="trust-desc">Auto-detected</div></div>
<div class="trust-item"><div class="trust-title">Retina comparison</div><div class="trust-desc">Matches Apple's density tiers</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/ppi-calculator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/ppi-calculator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
