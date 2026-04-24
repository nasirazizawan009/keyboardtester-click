<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = '마우스 가속 테스트 - 느린 스와이프 vs 빠른 스와이프';
$pageDescription = '무료 온라인 마우스 가속 테스트. 같은 물리 거리를 느리고 빠르게 스와이프해 Windows 포인터 가속이나 펌웨어 가속을 감지합니다.';
$pageKeywords = '마우스 가속 테스트, Windows 포인터 가속, mouse acceleration test';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">마우스 진단</p>
        <h1 class="hero-title">마우스 가속 테스트</h1>
        <p class="hero-lede">Windows나 마우스 펌웨어가 몰래 가속을 넣어 에임 일관성을 깨고 있지는 않나요? 같은 물리 거리를 느리게, 그 다음 빠르게 스와이프하세요. 속도에 따라 픽셀이 늘어나면 가속이 적용 중입니다. 정확한 빠름/느림 비율을 보여줍니다.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-accel-test">테스트 시작</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">사용법</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">픽셀 단위</span><span class="hero-badge">비율 판정</span><span class="hero-badge">설치 불필요</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-accel-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">기본 도구</p><h2>마우스 가속 테스트</h2><p class="section-lede">같은 거리를 느리게, 그 다음 빠르게.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-accel-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>가속 감지 방법</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. 느린 스와이프</h3><p>약 2초.</p></div>
        <div class="guideline-card"><h3>2. 빠른 스와이프</h3><p>같은 거리, 0.5초 이내.</p></div>
        <div class="guideline-card"><h3>3. 비율 확인</h3><p>1.00 = 완벽, &gt;1.15 = 가속.</p></div>
        <div class="guideline-card"><h3>4. 해제</h3><p>"포인터 정확도 향상" 끄기.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
