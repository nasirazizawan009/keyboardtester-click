<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = '모니터 밝기 테스트 - 11단계 보정 사다리';
$pageDescription = '무료 온라인 모니터 밝기 테스트. 11단계 그레이스케일 사다리로 밝기, 대비, 감마 잘못된 구성 감지.';
$pageKeywords = '모니터 밝기 테스트, 밝기 보정';
?>
<!DOCTYPE html>
<html lang="ko"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/brightness-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('brightness-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">디스플레이 보정</p>
<h1 class="hero-title">모니터 밝기 테스트 - 11단계 보정 사다리</h1>
<p class="hero-lede">모니터가 검정에서 흰색으로 균일한 진행을 표시하는지 확인. 10% 단위 11단계로 잘못된 구성 노출.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#brightness-test">시작</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/brightness-test/brightness-test-hero.jpg'); ?>" width="1280" height="720" alt="모니터 밝기 테스트" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="brightness-test"><div class="container tool-stage-header"><div><h2>모니터 밝기 테스트</h2><p class="section-lede">검정에서 흰색까지 11단계. 모두 구별 가능 = 건강.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/brightness-tool.php'; ?></section></section>
<?php $currentTool = 'brightness'; $__ls = __DIR__ . '/sections/tools-list-ko.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
