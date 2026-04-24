<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = '마우스 드래그 클릭 테스트 - CPS 및 버스트 피크';
$pageDescription = '무료 온라인 마우스 드래그 클릭 테스트. 드래그 클릭 CPS, 버스트 피크, 총 클릭 수를 측정. Minecraft PvP용.';
$pageKeywords = '드래그 클릭 테스트, drag click CPS, Minecraft drag click';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/mouse-drag-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drag-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">드래그 클릭 테스터</p>
          <h1 class="hero-title">마우스 드래그 클릭 테스트 - CPS 및 버스트 피크</h1>
          <p class="hero-lede">드래그 클릭 CPS, 버스트 피크, 총 클릭 수를 5초, 10초, 30초 세션으로 측정. Minecraft PvP에 최적.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-drag-test">테스트 시작</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">사용 방법</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">라이브 CPS 카운터</span>
            <span class="hero-badge">버스트 피크</span>
            <span class="hero-badge">타임라인 그래프</span>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <img src="<?php echo url('images/mouse-drag-test/mouse-drag-test-hero.jpg'); ?>" width="1280" height="720" alt="마우스 드래그 클릭 테스트" loading="eager" decoding="async" fetchpriority="high">
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="mouse-drag-test">
      <div class="container tool-stage-header">
        <div><p class="section-kicker">메인 도구</p><h2>드래그 클릭 테스터</h2><p class="section-lede">버튼을 가능한 한 빠르게 클릭하거나 손가락으로 드래그하세요.</p></div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drag-tool.php'; ?></section>
    </section>
    <?php $currentTool = 'mouse-drag'; $__ls = __DIR__ . '/sections/tools-list-ko.php'; if (file_exists($__ls)) include $__ls; ?>
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>드래그 클릭 테스트 사용 방법</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. 세션 구성</h3><p>시간 선택 후 시작.</p></div>
          <div class="guideline-card"><h3>2. 클릭 또는 드래그</h3><p>손가락을 30-45도 각도로 드래그.</p></div>
          <div class="guideline-card"><h3>3. 결과 확인</h3><p>평균 CPS, 피크, 200ms 버스트 피크.</p></div>
          <div class="guideline-card"><h3>4. 기술 조정</h3><p>각도나 마우스 변경 후 재테스트.</p></div>
        </div>
      </div>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
