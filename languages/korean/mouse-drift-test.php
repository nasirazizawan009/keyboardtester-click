<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = '마우스 드리프트 테스트 - 센서 지터 감지';
$pageDescription = '무료 온라인 마우스 드리프트 테스트. 10초부터 3분까지 포인터 이벤트를 샘플링해 유휴 상태 커서 움직임과 센서 지터를 감지합니다.';
$pageKeywords = '마우스 드리프트 테스트, 커서 드리프트, 센서 지터, mouse drift test';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">마우스 진단</p>
        <h1 class="hero-title">마우스 드리프트 테스트 - 센서 지터 감지</h1>
        <p class="hero-lede">마우스를 만지지 않았는데 커서가 움직이나요? 드리프트 테스트는 10~180초 동안 모든 포인터 이벤트를 샘플링하여 총 드리프트, 최대 점프, 합격/불합격 판정을 제공합니다.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-drift-test">테스트 시작</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">사용법</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">픽셀 단위</span><span class="hero-badge">10초~3분</span><span class="hero-badge">합격/불합격</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-drift-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">기본 도구</p><h2>마우스 드리프트 테스트</h2><p class="section-lede">마우스를 그대로 두고 시작을 누르세요.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drift-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>드리프트 찾는 법</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. 손 떼기</h3><p>마우스를 만지지 마세요.</p></div>
        <div class="guideline-card"><h3>2. 시작</h3><p>시간 선택 후 대기.</p></div>
        <div class="guideline-card"><h3>3. 판정 확인</h3><p>0 px = 완벽, &lt;5 = 정상.</p></div>
        <div class="guideline-card"><h3>4. 수정</h3><p>실제 패드 사용, 가속 해제.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
