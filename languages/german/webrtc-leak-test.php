<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-de.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'WebRTC-Leak-Test - VPN IP-Leak-Detektor';
$pageDescription = 'Kostenloser WebRTC-Lecktest: Erkennt IP-Lecks über den Browser selbst mit aktivem VPN. Prüft IPv4, IPv6, mDNS und STUN. Schnell, privat und sofort im Browser.';
$pageKeywords = 'WebRTC leak test, VPN leak, IP leak';
?>
<!DOCTYPE html>
<html lang="de"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('webrtc-leak-test.php'); ?>">
<link rel="alternate" hreflang="de" href="<?php echo absoluteUrl('languages/german/webrtc-leak-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('webrtc-leak-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-de.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Datenschutz-Diagnose</p>
<h1 class="hero-title">WebRTC-Leak-Test - VPN IP-Leak-Detektor</h1>
<p class="hero-lede">Pruefe ob dein Browser deine echte IP via WebRTC durchlaesst, sogar mit VPN-Verbindung. Erkennt IPv4, IPv6 und lokales Netzwerk.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#webrtc-leak-test">Starten</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/webrtc-leak-test/webrtc-leak-test-hero.jpg'); ?>" width="1280" height="720" alt="WebRTC-Leak-Test" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="webrtc-leak-test"><div class="container tool-stage-header"><div><h2>WebRTC-Leak-Test</h2><p class="section-lede">Scan starten um exponierte IPs zu sehen.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/webrtc-leak-tool.php'; ?></section></section>
<?php $currentTool = 'webrtc-leak'; $__ls = __DIR__ . '/sections/tools-list-de.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-de.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
