<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Webcam Mirror Online - Use Your Camera as a Virtual Mirror | KeyboardTester.click';
$pageDescription = 'Free online webcam mirror. Use your laptop or USB camera as a real-time virtual mirror in the browser, with horizontal flip, brightness and contrast sliders, rule-of-thirds grid, snapshot download, and fullscreen mode. No install, nothing uploaded.';
$pageKeywords = 'webcam mirror, online mirror, use webcam as mirror, virtual mirror online, browser mirror, free online mirror, webcam mirror app, mirror camera online';
$pageOgImage = 'images/webcam-mirror/hero.jpg';
$pageOgImageAlt = 'Webcam mirror online - turn your camera into a virtual mirror';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('webcam_mirror', [['name'=>'Home','url'=>'/'],['name'=>'Webcam Mirror','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-webcam-mirror.php'; ?>
<section class="tool-stage" id="webcam-mirror-tool">
<div class="container tool-stage-header"><div><p class="section-kicker">Live mirror tool</p><h2>Webcam Mirror</h2><p class="section-lede">Mirror your webcam in the browser for makeup, posture, and pre-call framing checks. Toggle the horizontal flip, adjust brightness and contrast, drop on a rule-of-thirds grid, and capture a snapshot &mdash; nothing leaves your device.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">How to use it</a></div></div>
<section class="tool-shell"><?php include 'tools/webcam_mirror_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">Mirror flip</div><div class="trust-desc">Acts like a real mirror</div></div>
<div class="trust-item"><div class="trust-title">Brightness &amp; contrast</div><div class="trust-desc">See yourself in any light</div></div>
<div class="trust-item"><div class="trust-title">Snapshot ready</div><div class="trust-desc">Download a PNG instantly</div></div>
<div class="trust-item"><div class="trust-title">Stays in browser</div><div class="trust-desc">No uploads, no recording</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/webcam-mirror.php'; ?>
<?php $currentTool = 'webcam'; include 'includes/related-tools.php'; ?>
<?php include 'help/webcam-mirror.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
