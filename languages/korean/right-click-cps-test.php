<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = '오른쪽 클릭 CPS 테스트 - 오른쪽 버튼 속도';
$pageDescription = '무료 온라인 오른쪽 클릭 CPS 테스트. 컨텍스트 메뉴를 억제하고 오른쪽 버튼 CPS 측정. Minecraft PvP와 FPS용.';
$pageKeywords = '오른쪽 클릭 CPS 테스트, right click CPS';
?>
<!DOCTYPE html>
<html lang="ko">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<meta name="keywords" content="<?php echo $pageKeywords; ?>">
<link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/right-click-cps-test.php'); ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('right-click-cps-test.php'); ?>">
<?php include __DIR__ . '/../../includes/head-common.php'; ?>
<link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
<?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
<main id="main-content" class="landing-main">
<section class="landing-hero"><div class="container landing-hero-grid">
<div class="hero-copy">
<p class="hero-kicker">오른쪽 클릭 CPS 테스터</p>
<h1 class="hero-title">오른쪽 클릭 CPS 테스트 - 오른쪽 버튼 속도</h1>
<p class="hero-lede">오른쪽 버튼 클릭/초를 5초, 10초, 30초 세션으로 측정. 브라우저 컨텍스트 메뉴 억제.</p>
<div class="hero-actions">
<a class="landing-btn landing-btn-primary" href="#right-click-cps-test">시작</a>
<a class="landing-btn landing-btn-ghost" href="#guidelines">사용 방법</a>
</div>
<div class="hero-badges"><span class="hero-badge">오른쪽 클릭만</span><span class="hero-badge">피크 CPS</span><span class="hero-badge">컨텍스트 메뉴 오프</span></div>
</div>
<div class="hero-visual"><div class="hero-shot"><img src="<?php echo url('images/right-click-cps-test/right-click-cps-test-hero.jpg'); ?>" width="1280" height="720" alt="오른쪽 클릭 CPS 테스트" loading="eager" decoding="async" fetchpriority="high"></div></div>
</div></section>
<section class="tool-stage" id="right-click-cps-test"><div class="container tool-stage-header"><div><p class="section-kicker">메인 도구</p><h2>오른쪽 클릭 CPS 테스터</h2><p class="section-lede">영역에서 가능한 한 빠르게 오른쪽 클릭.</p></div></div>
<section class="tool-shell"><?php include __DIR__ . '/tools/right-click-cps-tool.php'; ?></section></section>
<?php $currentTool = 'right-click-cps'; $__ls = __DIR__ . '/sections/tools-list-ko.php'; if (file_exists($__ls)) include $__ls; ?>
<section id="guidelines" class="guidelines-section"><div class="container"><div class="section-head"><h2>사용 방법</h2></div>
<div class="guidelines-grid">
<div class="guideline-card"><h3>1. 구성</h3><p>시간 선택.</p></div>
<div class="guideline-card"><h3>2. 빠른 오른쪽 클릭</h3><p>영역에서 오른쪽 클릭.</p></div>
<div class="guideline-card"><h3>3. 결과 확인</h3><p>총 수, CPS, 피크.</p></div>
<div class="guideline-card"><h3>4. 비교</h3><p>왼쪽 CPS와 비교.</p></div>
</div></div></section>
</main>
<?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
