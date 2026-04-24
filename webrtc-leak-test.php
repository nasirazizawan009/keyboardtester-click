<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free WebRTC Leak Test - VPN IP Leak Detector | KeyboardTester.click';
$pageDescription = 'Free online WebRTC leak test. Detect IP address leaks through your browser even while using a VPN. Checks IPv4, IPv6, mDNS and STUN. Fast, instant, private.';
$pageKeywords = 'WebRTC leak test, VPN leak test, IP leak detector, WebRTC IP test';
$pageOgImage = 'images/webrtc-leak-test/webrtc-leak-test-hero.jpg';
$pageOgImageAlt = 'WebRTC leak test';
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
<?php include 'includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
<?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('webrtc_leak', [['name'=>'Home','url'=>'/'],['name'=>'WebRTC Leak Test','url'=>'']]); ?>
</head>
<body class="landing-page">
<?php include 'header.php'; ?>
<main id="main-content" class="landing-main">
<?php include 'help/brief-webrtc-leak-test.php'; ?>
<section class="tool-stage" id="webrtc-leak-test">
<div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>WebRTC Leak Test</h2><p class="section-lede">Click Start scan to see what IP addresses your browser exposes via WebRTC.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
<section class="tool-shell"><?php include 'tools/webrtc_leak_tool.php'; ?></section>
</section>
<section class="trust-strip"><div class="container trust-grid">
<div class="trust-item"><div class="trust-title">IPv4 + IPv6 check</div><div class="trust-desc">Both protocols scanned</div></div>
<div class="trust-item"><div class="trust-title">Local IP detection</div><div class="trust-desc">Reveals network topology</div></div>
<div class="trust-item"><div class="trust-title">VPN bypass check</div><div class="trust-desc">Real IP vs VPN IP</div></div>
<div class="trust-item"><div class="trust-title">Browser only</div><div class="trust-desc">No download, no signup</div></div>
</div></section>
<?php include 'includes/components/tools-list.php'; ?>
<?php include 'help/seo-content/webrtc-leak-test.php'; ?>
<?php $currentTool = 'webrtc-leak'; include 'includes/related-tools.php'; ?>
<?php include 'help/webrtc-leak-test.php'; ?>
</main>
<?php include 'footer.php'; ?>
</body></html>
