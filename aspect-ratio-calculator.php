<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Aspect Ratio Calculator - Find Width, Height, or Ratio | KeyboardTester.click';
$pageDescription = 'Free aspect ratio calculator. Enter any two of width, height, or ratio and the tool resolves the third. Includes common presets like 16:9, 21:9, 4:3, 32:9, and simplifies to lowest terms.';
$pageKeywords = 'aspect ratio calculator, screen ratio calculator, 16:9 calculator, resize calculator, image aspect calculator';
$pageOgImage = 'blog/images/gaming-jpg.jpg';
$pageOgImageAlt = 'Aspect ratio calculator';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('aspect_calc', [['name'=>'Home','url'=>'/'],['name'=>'Aspect Ratio Calculator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-aspect-ratio-calculator.php'; ?>
<section class="tool-stage" id="aspect-ratio-calculator">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Aspect Ratio Calculator</h2><p class="section-lede">Type any two of width, height, or ratio. The tool solves for the third and also reports the simplified ratio.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/aspect_calc_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Solve for any side</div><div class="trust-desc">Width, height, or ratio</div></div>
<div class="trust-item"><div class="trust-title">Simplified ratio</div><div class="trust-desc">Reduces to lowest integer terms</div></div>
<div class="trust-item"><div class="trust-title">Presets</div><div class="trust-desc">16:9, 21:9, 4:3, 32:9, 1:1</div></div>
<div class="trust-item"><div class="trust-title">Live</div><div class="trust-desc">Updates as you type</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/aspect-ratio-calculator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/aspect-ratio-calculator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
