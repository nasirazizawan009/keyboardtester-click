<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = '모니터 고스팅 테스트 - 픽셀 응답 시간';
$pageDescription = '무료 온라인 모니터 고스팅 테스트. 움직이는 박스로 픽셀 응답 시간 문제 감지.';
$pageKeywords = '모니터 고스팅 테스트, 픽셀 응답 시간';
?>
<!DOCTYPE html>
<html lang="ko"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('monitor-ghosting-test.php'); ?>">
<link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/monitor-ghosting-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('monitor-ghosting-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">디스플레이 진단</p>
<h1 class="hero-title">모니터 고스팅 테스트 - 픽셀 응답 시간</h1>
<p class="hero-lede">픽셀 응답 시간 문제 감지. 박스가 컬러 배경 위를 이동; 잔상이나 색 번짐 = 고스팅.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#monitor-ghosting-test">시작</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/monitor-ghosting-test/monitor-ghosting-test-hero.jpg'); ?>" width="1280" height="720" alt="모니터 고스팅 테스트" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="monitor-ghosting-test"><div class="container tool-stage-header"><div><h2>모니터 고스팅 테스트</h2><p class="section-lede">움직이는 박스를 보세요. 뒤에 잔상 = 고스팅.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/monitor-ghosting-tool.php'; ?></section></section>
<?php $currentTool = 'monitor-ghosting'; $__ls = __DIR__ . '/sections/tools-list-ko.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
