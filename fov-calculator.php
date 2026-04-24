<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free FoV Calculator - Convert FoV Across Games & Aspect Ratios | KeyboardTester.click';
$pageDescription = 'Free field of view calculator. Convert horizontal, vertical, and diagonal FoV between 4:3, 16:9, 21:9 and 32:9 for CS2, Valorant, Apex, CoD, Fortnite and other FPS games.';
$pageKeywords = 'fov calculator, field of view calculator, hfov vfov converter, fov conversion, cs2 fov, apex fov, cod fov calculator';
$pageOgImage = 'images/fov-calculator/fov-calculator-hero.jpg';
$pageOgImageAlt = 'FoV calculator';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('fov_calc', [['name'=>'Home','url'=>'/'],['name'=>'FoV Calculator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-fov-calculator.php'; ?>
<section class="tool-stage" id="fov-calculator">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>FoV Calculator</h2><p class="section-lede">Convert horizontal, vertical and diagonal field of view across any aspect ratio. Includes presets for CS2, Valorant, Apex, CoD and Fortnite.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/fov_calculator_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">H / V / Diagonal</div><div class="trust-desc">All three FoV formats converted</div></div>
<div class="trust-item"><div class="trust-title">Any aspect ratio</div><div class="trust-desc">4:3, 16:10, 16:9, 21:9, 32:9</div></div>
<div class="trust-item"><div class="trust-title">Game presets</div><div class="trust-desc">CS2, Valorant, Apex, CoD, Fortnite</div></div>
<div class="trust-item"><div class="trust-title">Browser only</div><div class="trust-desc">No download, pure trig</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/fov-calculator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/fov-calculator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
