<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Minecraft Circle Generator - Pixel Circle & Sphere Plotter | KeyboardTester.click';
$pageDescription = 'Free Minecraft circle generator. Plot perfect pixel circles, filled discs, thick rings, and 3D sphere layers at any block radius (1-256). Copy layouts for building round towers, domes, and Redstone contraptions. Interactive grid with block-count preview. Browser-based, no install.';
$pageKeywords = 'minecraft circle generator, pixel circle, minecraft sphere generator, round tower minecraft, block circle plotter, minecraft dome builder';
$pageOgImage = 'images/minecraft-circle-generator/hero.jpg';
$pageOgImageAlt = 'Minecraft circle generator - pixel circle plotter for block builders';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('minecraft_circle', [['name'=>'Home','url'=>'/'],['name'=>'Minecraft Circle Generator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-minecraft-circle-generator.php'; ?>
<section class="tool-stage" id="minecraft-circle-generator">
<div class="container tool-stage-header"><div><p class="section-kicker">Gaming utility</p><h2>Minecraft Circle Generator</h2><p class="section-lede">Plot perfect pixel circles and filled discs at any radius from 1 to 256 blocks. Switch between outline, filled, thick ring, and 3D sphere-layer modes for domes and round towers. Counts total blocks, shows diameter, and renders the full grid below so you can copy the pattern layer by layer in-game.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">Read guide</a></div></div>
<section class="tool-shell"><?php include 'tools/minecraft_circle_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">1-256 radius</div><div class="trust-desc">From tiny accents to mega builds</div></div>
<div class="trust-item"><div class="trust-title">4 modes</div><div class="trust-desc">Outline / filled / thick / sphere</div></div>
<div class="trust-item"><div class="trust-title">Block count</div><div class="trust-desc">Know how many to mine</div></div>
<div class="trust-item"><div class="trust-title">PNG export</div><div class="trust-desc">Save + print reference</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/minecraft-circle-generator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/minecraft-circle-generator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
