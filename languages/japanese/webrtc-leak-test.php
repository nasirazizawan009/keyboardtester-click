<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'WebRTCリークテスト - VPN IPリーク検出';
$pageDescription = '無料オンラインWebRTCリークテスト。VPN使用中でもブラウザ経由でIPアドレスのリークを検出。IPv4、IPv6、ローカルIP。';
$pageKeywords = 'WebRTCリークテスト, VPN leak, IPリーク';
?>
<!DOCTYPE html>
<html lang="ja"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('webrtc-leak-test.php'); ?>">
<link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/webrtc-leak-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('webrtc-leak-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">プライバシー診断</p>
<h1 class="hero-title">WebRTCリークテスト - VPN IPリーク検出</h1>
<p class="hero-lede">VPN接続中でもブラウザがWebRTC経由で実際のIPをリークしているか確認。IPv4、IPv6、ローカルネットワークを検出。</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#webrtc-leak-test">開始</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/webrtc-leak-test/webrtc-leak-test-hero.jpg'); ?>" width="1280" height="720" alt="WebRTCリークテスト" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="webrtc-leak-test"><div class="container tool-stage-header"><div><h2>WebRTCリークテスト</h2><p class="section-lede">スキャン開始で公開されるIPを表示。</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/webrtc-leak-tool.php'; ?></section></section>
<?php $currentTool = 'webrtc-leak'; $__ls = __DIR__ . '/sections/tools-list-ja.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
