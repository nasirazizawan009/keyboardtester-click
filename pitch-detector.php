<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Online Pitch Detector - Find Your Singing Note (Hz, Note, Cents) | KeyboardTester.click';
$pageDescription = 'Free online pitch detector. Sing or play into your microphone and instantly see the frequency in Hz, the nearest musical note (C0-C8), the octave, and how many cents sharp or flat you are. Real-time scrolling pitch graph, peak hold, and noise threshold. Browser-based, no install.';
$pageKeywords = 'pitch detector, online pitch detector, voice pitch test, what note am i singing, vocal pitch monitor, pitch finder online, free pitch detector';
$pageOgImage = 'images/pitch-detector/hero.jpg';
$pageOgImageAlt = 'Pitch detector tool - sing into mic to detect note and frequency';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('pitch_detector', [['name'=>'Home','url'=>'/'],['name'=>'Pitch Detector','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-pitch-detector.php'; ?>
<section class="tool-stage" id="pitch-detector">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Pitch Detector</h2><p class="section-lede">Press Start, allow microphone access, and sing or play any note. The detector reports the live frequency in Hz, the nearest musical note (across the full piano range C0&ndash;C8), and how many cents sharp or flat you are. A scrolling graph keeps the last 10&nbsp;seconds of pitch history.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/pitch_detector_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Live Hz + note</div><div class="trust-desc">Real-time autocorrelation</div></div>
<div class="trust-item"><div class="trust-title">Cents accuracy</div><div class="trust-desc">-50 to +50 from perfect</div></div>
<div class="trust-item"><div class="trust-title">Pitch history</div><div class="trust-desc">10-second scrolling graph</div></div>
<div class="trust-item"><div class="trust-title">No download</div><div class="trust-desc">Browser only</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/pitch-detector.php'; ?>
<?php $currentTool = 'audio'; include 'includes/related-tools.php'; ?>
<?php include 'help/pitch-detector.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
