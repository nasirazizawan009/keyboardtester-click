<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ar.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'اختبار تسرب WebRTC - كاشف تسرب IP عبر VPN';
$pageDescription = 'اختبار تسرب WebRTC مجاني: يكتشف تسرب عنوان IP عبر المتصفح حتى مع VPN نشط. يفحص IPv4 وIPv6 وmDNS وSTUN. سريع وخاص وفوري في المتصفح.';
$pageKeywords = 'اختبار تسرب WebRTC, VPN leak, تسرب IP';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('webrtc-leak-test.php'); ?>">
<link rel="alternate" hreflang="ar" href="<?php echo absoluteUrl('languages/arabic/webrtc-leak-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('webrtc-leak-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ar.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">تشخيص الخصوصية</p>
<h1 class="hero-title">اختبار تسرب WebRTC - كاشف تسرب IP عبر VPN</h1>
<p class="hero-lede">تحقق مما إذا كان متصفحك يسرب عنوان IP الحقيقي عبر WebRTC، حتى عند الاتصال بـ VPN. يكشف IPv4 و IPv6 والشبكة المحلية.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#webrtc-leak-test">ابدأ</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/webrtc-leak-test/webrtc-leak-test-hero.jpg'); ?>" width="1280" height="720" alt="اختبار تسرب WebRTC" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="webrtc-leak-test"><div class="container tool-stage-header"><div><h2>اختبار تسرب WebRTC</h2><p class="section-lede">ابدأ المسح لرؤية IPs المكشوفة.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/webrtc-leak-tool.php'; ?></section></section>
<?php $currentTool = 'webrtc-leak'; $__ls = __DIR__ . '/sections/tools-list-ar.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ar.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
