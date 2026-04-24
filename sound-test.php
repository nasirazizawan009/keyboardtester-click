<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Sound Test - Speaker & Headphone Channel Test Online | KeyboardTester.click';
$pageDescription = 'Free online sound test. Verify left, right, and both stereo channels, sweep from 100 Hz to 10 kHz to check speaker range, and confirm headphone wiring with a beep-per-channel test.';
$pageKeywords = 'sound test online, speaker test, headphone channel test, left right audio test, stereo test, audio sweep test';
$pageOgImage = 'blog/images/headphones-jpg.jpg';
$pageOgImageAlt = 'Sound test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('sound_test', [['name'=>'Home','url'=>'/'],['name'=>'Sound Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-sound-test.php'; ?>
<section class="tool-stage" id="sound-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Sound Test</h2><p class="section-lede">Play left-only, right-only, or both channels to verify wiring. Then sweep 100 Hz → 10 kHz to hear the usable frequency range of your speakers or headphones.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/sound_test_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Left / right / both</div><div class="trust-desc">Verify stereo wiring</div></div>
<div class="trust-item"><div class="trust-title">Auto ping-pong</div><div class="trust-desc">Alternates L & R</div></div>
<div class="trust-item"><div class="trust-title">Frequency sweep</div><div class="trust-desc">100 Hz to 10 kHz</div></div>
<div class="trust-item"><div class="trust-title">Volume</div><div class="trust-desc">0-100%</div></div>
</div></section>
<?php $intentClusterTool = 'audio'; $currentTool = 'audio'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/sound-test.php'; ?>
<?php $currentTool = 'audio'; include 'includes/related-tools.php'; ?>
<?php include 'help/sound-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
