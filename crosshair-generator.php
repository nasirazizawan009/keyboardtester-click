<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Crosshair Generator - Custom Crosshair Maker & CS2 / Valorant Config | KeyboardTester.click';
$pageDescription = 'Free crosshair generator. Design a custom crosshair with live preview, download PNG overlay, and copy ready-to-paste CS2 console command or Valorant settings for your game.';
$pageKeywords = 'crosshair generator, custom crosshair maker, cs2 crosshair, valorant crosshair generator, crosshair overlay, crosshair png';
$pageOgImage = 'images/crosshair-generator/crosshair-generator-hero.jpg';
$pageOgImageAlt = 'Crosshair generator';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('crosshair_gen', [['name'=>'Home','url'=>'/'],['name'=>'Crosshair Generator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-crosshair-generator.php'; ?>
<section class="tool-stage" id="crosshair-generator">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Crosshair Generator</h2><p class="section-lede">Design a custom crosshair with live preview. Download PNG overlay, copy CS2 console command, or read the Valorant settings values.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/crosshair_generator_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Live canvas preview</div><div class="trust-desc">See every change instantly</div></div>
<div class="trust-item"><div class="trust-title">CS2 config string</div><div class="trust-desc">Paste into developer console</div></div>
<div class="trust-item"><div class="trust-title">Valorant settings</div><div class="trust-desc">Exact values to match</div></div>
<div class="trust-item"><div class="trust-title">PNG overlay export</div><div class="trust-desc">Transparent background</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/crosshair-generator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/crosshair-generator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
