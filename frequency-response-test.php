<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Frequency Response & Hearing Test 20 Hz–20 kHz | KeyboardTester.click';
$pageDescription = 'Free online frequency response and hearing test. Sweep 20 Hz to 20 kHz to find your personal audible range, test speaker and headphone response, and map hearing roll-off. Browser-based, no install.';
$pageKeywords = 'frequency response test, hearing test online, 20 hz to 20 khz sweep, audible frequency range, hearing range test, headphone frequency test';
$pageOgImage = 'images/frequency-response-test/hero.jpg';
$pageOgImageAlt = 'Frequency response test - full-range 20 Hz to 20 kHz sine sweep';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('frequency_response', [['name'=>'Home','url'=>'/'],['name'=>'Frequency Response Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-frequency-response-test.php'; ?>
<section class="tool-stage" id="frequency-response-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Frequency Response Test</h2><p class="section-lede">Sweep 20 Hz to 20 kHz to map your personal hearing range and check how cleanly your speakers or headphones reproduce every band &mdash; from sub-bass to air.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/frequency_response_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">20 Hz to 20 kHz</div><div class="trust-desc">Full audible range</div></div>
<div class="trust-item"><div class="trust-title">Log sweep</div><div class="trust-desc">10 to 60 seconds</div></div>
<div class="trust-item"><div class="trust-title">Hearing limits</div><div class="trust-desc">Log lower and upper bounds</div></div>
<div class="trust-item"><div class="trust-title">Manual slider</div><div class="trust-desc">Hold any specific Hz</div></div>
</div></section>
<?php $intentClusterTool = 'audio-output'; $currentTool = 'audio'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/frequency-response-test.php'; ?>
<?php $currentTool = 'audio'; include 'includes/related-tools.php'; ?>
<?php include 'help/frequency-response-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
