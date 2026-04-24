<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = '모니터 대비 테스트 - 체커보드 보정';
$pageDescription = '무료 온라인 모니터 대비 테스트. 체커보드 옆 50% 회색으로 대비와 감마 잘못된 구성 감지.';
$pageKeywords = '모니터 대비 테스트, 대비 보정';
?>
<!DOCTYPE html>
<html lang="ko"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/contrast-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('contrast-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">디스플레이 보정</p>
<h1 class="hero-title">모니터 대비 테스트 - 체커보드 보정</h1>
<p class="hero-lede">검정-흰색 체커보드와 50% 회색 솔리드로 대비 보정 확인. 눈을 가늘게 뜨면 체커보드 평균이 회색과 일치해야 합니다.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#contrast-test">시작</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/contrast-test/contrast-test-hero.jpg'); ?>" width="1280" height="720" alt="모니터 대비 테스트" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="contrast-test"><div class="container tool-stage-header"><div><h2>모니터 대비 테스트</h2><p class="section-lede">눈을 가늘게 뜨세요. 체커보드는 회색과 같아 보여야 합니다.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/contrast-tool.php'; ?></section></section>
<?php $currentTool = 'contrast'; $__ls = __DIR__ . '/sections/tools-list-ko.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
