<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Bandwidth Calculator - File Size vs Speed in Mbps / Gbps | KeyboardTester.click';
$pageDescription = 'Free bandwidth calculator. Convert file size + connection speed into transfer time (or the reverse: find the speed needed to transfer a file in a target window). Unit toggles for KB/MB/GB/TB and Kbps/Mbps/Gbps. Handles the common "MB vs Mbps" mistake automatically.';
$pageKeywords = 'bandwidth calculator, data transfer calculator, mbps to mb/s, file size to time, upload time calculator, network speed calculator';
$pageOgImage = 'images/bandwidth-calculator/hero.jpg';
$pageOgImageAlt = 'Bandwidth calculator - fiber ethernet cables, file size and speed math';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('bandwidth_calc', [['name'=>'Home','url'=>'/'],['name'=>'Bandwidth Calculator','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-bandwidth-calculator.php'; ?>
<section class="tool-stage" id="bandwidth-calculator">
<div class="container tool-stage-header"><div><p class="section-kicker">Calculator</p><h2>Bandwidth Calculator</h2><p class="section-lede">Three ways to solve the same equation: size &divide; speed = time. Enter any two, and the calculator derives the third. Handles the common "MB vs Mbps" bits-vs-bytes trap automatically, and includes unit toggles for KB/MB/GB/TB (file size) and Kbps/Mbps/Gbps (bandwidth). Presets for common home and enterprise links.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">Read guide</a></div></div>
<section class="tool-shell"><?php include 'tools/bandwidth_calc_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">3 modes</div><div class="trust-desc">Solve time / size / speed</div></div>
<div class="trust-item"><div class="trust-title">Unit toggles</div><div class="trust-desc">KB/MB/GB/TB & bps scale</div></div>
<div class="trust-item"><div class="trust-title">MB vs Mbps</div><div class="trust-desc">Auto bits/bytes math</div></div>
<div class="trust-item"><div class="trust-title">Link presets</div><div class="trust-desc">DSL to 10 GbE</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/bandwidth-calculator.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/bandwidth-calculator.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
