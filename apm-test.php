<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free APM Test - Actions Per Minute Counter for RTS & MOBA | KeyboardTester.click';
$pageDescription = 'Free APM test. Counts keyboard and mouse actions per minute live while you play. Shows peak APM, average APM, and per-second bar — ideal for StarCraft, DotA, League of Legends, and other RTS / MOBA players.';
$pageKeywords = 'apm test, actions per minute, starcraft apm, moba apm counter, rts apm test, apm meter';
$pageOgImage = 'blog/images/gaming-jpg.jpg';
$pageOgImageAlt = 'APM test counter';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('apm_test', [['name'=>'Home','url'=>'/'],['name'=>'APM Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-apm-test.php'; ?>
<section class="tool-stage" id="apm-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>APM Test</h2><p class="section-lede">Click Start, then tap the pad or keyboard as fast as you would in-game. The counter tracks every keystroke and click over a rolling one-minute window and shows live APM, peak, and session average.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/apm_test_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Live APM</div><div class="trust-desc">Rolling 60-second window</div></div>
<div class="trust-item"><div class="trust-title">Peak APM</div><div class="trust-desc">Your fastest burst</div></div>
<div class="trust-item"><div class="trust-title">Total actions</div><div class="trust-desc">Every click + keystroke</div></div>
<div class="trust-item"><div class="trust-title">Browser only</div><div class="trust-desc">Nothing uploaded</div></div>
</div></section>
<?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/apm-test.php'; ?>
<?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
<?php include 'help/apm-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
