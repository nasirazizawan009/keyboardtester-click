<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Bass Test — Subwoofer Sweep 20-200 Hz | KeyboardTester.click';
$pageDescription = 'Free online bass test. Sweep 20 Hz to 200 Hz or play individual low-frequency tones to check subwoofers, studio monitors, and bass-capable headphones. Browser-based, no install.';
$pageKeywords = 'bass test online, subwoofer test, low frequency test, bass sweep, 20 Hz to 200 Hz, sub-bass test';
$pageOgImage = 'images/headphone-test/speaker-headphone-test-stereo-preview-1400.png';
$pageOgImageAlt = 'Bass test — low-frequency sweep and sine tones';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('bass_test', [['name'=>'Home','url'=>'/'],['name'=>'Bass Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-bass-test.php'; ?>
<section class="tool-stage" id="bass-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Bass Test</h2><p class="section-lede">Sweep 20 Hz &rarr; 200 Hz, step through ISO bass frequencies, or hold a single tone to verify your subwoofer, studio monitors, or bass-capable headphones.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/bass_test_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">20 - 200 Hz</div><div class="trust-desc">Sub-bass to upper bass</div></div>
<div class="trust-item"><div class="trust-title">Sweep or hold</div><div class="trust-desc">Logarithmic ramp or single tone</div></div>
<div class="trust-item"><div class="trust-title">Sine purity</div><div class="trust-desc">No harmonics, no ambiguity</div></div>
<div class="trust-item"><div class="trust-title">Volume</div><div class="trust-desc">0-100%, safe-start default</div></div>
</div></section>
<?php $intentClusterTool = 'audio-output'; $currentTool = 'audio'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/bass-test.php'; ?>
<?php $currentTool = 'audio'; include 'includes/related-tools.php'; ?>
<?php include 'help/bass-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
