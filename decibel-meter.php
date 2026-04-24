<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Online Decibel Meter - Live dB SPL via Microphone | KeyboardTester.click';
$pageDescription = 'Free online decibel meter using your microphone. Live dB SPL reading, peak tracking, rolling average. Browser-based, no install, measures ambient noise levels.';
$pageKeywords = 'decibel meter, dB meter online, sound level meter, SPL meter';
$pageOgImage = 'images/decibel-meter/decibel-meter-hero.jpg';
$pageOgImageAlt = 'Decibel meter';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('decibel_meter', [['name'=>'Home','url'=>'/'],['name'=>'Decibel Meter','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-decibel-meter.php'; ?>
<section class="tool-stage" id="decibel-meter">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Decibel Meter</h2><p class="section-lede">Press Start and allow microphone. Live dB reading, peak, and average update in real time.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/decibel_meter_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Live dB reading</div><div class="trust-desc">Real-time updates</div></div>
<div class="trust-item"><div class="trust-title">Peak tracker</div><div class="trust-desc">Highest dB recorded</div></div>
<div class="trust-item"><div class="trust-title">Rolling average</div><div class="trust-desc">Last 100 samples</div></div>
<div class="trust-item"><div class="trust-title">No download</div><div class="trust-desc">Browser only</div></div>
</div></section>
<?php $intentClusterTool = 'audio'; $currentTool = 'mic'; include 'includes/components/intent-cluster-links.php'; ?>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/decibel-meter.php'; ?>
<?php $currentTool = 'mic'; include 'includes/related-tools.php'; ?>
<?php include 'help/decibel-meter.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
