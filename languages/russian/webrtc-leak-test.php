<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ru.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'Тест утечки WebRTC - Детектор утечки IP через VPN';
$pageDescription = 'Бесплатный тест утечек WebRTC: обнаруживает утечки IP через браузер даже при активном VPN. Проверяет IPv4, IPv6, mDNS и STUN. Быстро, приватно, мгновенно.';
$pageKeywords = 'тест утечки WebRTC, VPN leak, утечка IP';
?>
<!DOCTYPE html>
<html lang="ru"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('webrtc-leak-test.php'); ?>">
<link rel="alternate" hreflang="ru" href="<?php echo absoluteUrl('languages/russian/webrtc-leak-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('webrtc-leak-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ru.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">Диагностика приватности</p>
<h1 class="hero-title">Тест утечки WebRTC - Детектор утечки IP через VPN</h1>
<p class="hero-lede">Проверьте, не утекает ли реальный IP через WebRTC даже при подключении к VPN. Обнаруживает IPv4, IPv6 и локальную сеть.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#webrtc-leak-test">Начать</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/webrtc-leak-test/webrtc-leak-test-hero.jpg'); ?>" width="1280" height="720" alt="Тест утечки WebRTC" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="webrtc-leak-test"><div class="container tool-stage-header"><div><h2>Тест утечки WebRTC</h2><p class="section-lede">Начать сканирование чтобы увидеть открытые IP.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/webrtc-leak-tool.php'; ?></section></section>
<?php $currentTool = 'webrtc-leak'; $__ls = __DIR__ . '/sections/tools-list-ru.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ru.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
