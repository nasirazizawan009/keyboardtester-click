<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-pt.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Teste de Vazamento WebRTC - Detector de Vazamento IP via VPN';
$pageDescription = 'Teste de vazamento WebRTC gratuito: detecta vazamentos de IP via navegador mesmo com VPN ativa. Verifica IPv4, IPv6, mDNS e STUN. Rápido, privado, instantâneo.';
$pageKeywords = 'teste vazamento WebRTC, VPN leak, vazamento IP';
?>
<!DOCTYPE html>
<html lang="pt"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('webrtc-leak-test.php'); ?>">
<link rel="alternate" hreflang="pt" href="<?php echo absoluteUrl('languages/portuguese/webrtc-leak-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('webrtc-leak-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-pt.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Diagnostico de Privacidade</p>
<h1 class="hero-title">Teste de Vazamento WebRTC - Detector de Vazamento IP via VPN</h1>
<p class="hero-lede">Verifique se seu navegador vaza seu IP real via WebRTC, mesmo conectado a uma VPN. Detecta IPv4, IPv6 e rede local.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#webrtc-leak-test">Iniciar</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/webrtc-leak-test/webrtc-leak-test-hero.jpg'); ?>" width="1280" height="720" alt="Teste de vazamento WebRTC" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="webrtc-leak-test"><div class="container tool-stage-header"><div><h2>Teste de Vazamento WebRTC</h2><p class="section-lede">Iniciar scan para ver IPs expostos.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/webrtc-leak-tool.php'; ?></section></section>
<?php $currentTool = 'webrtc-leak'; $__ls = __DIR__ . '/sections/tools-list-pt.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-pt.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
