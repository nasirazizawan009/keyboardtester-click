<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = '블랙 레벨 테스트 - 블랙 크러시 감지기';
$pageDescription = '무료 온라인 블랙 레벨 테스트. 32개 거의 검은 패치로 그림자 디테일 확인.';
$pageKeywords = '블랙 레벨 테스트, 블랙 크러시';
?>
<!DOCTYPE html>
<html lang="ko"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('black-level-test.php'); ?>">
<link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/black-level-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('black-level-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>"></head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy"><p class="hero-kicker">디스플레이 보정</p>
<h1 class="hero-title">블랙 레벨 테스트 - 블랙 크러시 감지기</h1>
<p class="hero-lede">32개 거의 검은 패치로 그림자 디테일 확인. 낮은 값이 보이지 않으면 모니터가 블랙을 크러시하고 있습니다.</p>
<div class="hero-actions"><a class="landing-btn landing-btn-primary" href="#black-level-test">시작</a></div></div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/black-level-test/black-level-test-hero.jpg'); ?>" width="1280" height="720" alt="블랙 레벨 테스트" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="black-level-test"><div class="container tool-stage-header"><div><h2>블랙 레벨 테스트</h2><p class="section-lede">보이는 패치 1-32 카운트.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/black-level-tool.php'; ?></section></section>
<?php $currentTool = 'black-level'; $__ls = __DIR__ . '/sections/tools-list-ko.php'; if (file_exists($__ls)) include $__ls; ?>
</main>
<?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
