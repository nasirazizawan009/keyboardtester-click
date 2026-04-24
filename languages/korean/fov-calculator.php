<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'FoV 계산기 - 게임 간 시야각 변환';
$pageDescription = '무료 온라인 FoV 계산기. 4:3, 16:9, 21:9, 32:9 사이에서 수평·수직·대각 시야각을 변환하세요. CS2, Valorant, Apex, CoD, Fortnite 프리셋 포함.';
$pageKeywords = 'FoV 계산기, 시야각 변환, hfov vfov, fov cs2, fov apex';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">게이밍 감도 계산기</p>
        <h1 class="hero-title">FoV 계산기 - 시야각 변환</h1>
        <p class="hero-lede">4:3, 16:9, 21:9, 32:9 사이에서 수평·수직·대각 시야각을 변환합니다. CS2, Valorant, Apex, CoD, Fortnite 프리셋으로 게임과 모니터를 바꿔도 동일한 수직 감각을 유지하세요.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#fov-calculator">FoV 변환</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">사용법</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">H / V / 대각</span><span class="hero-badge">모든 화면 비율</span><span class="hero-badge">게임 프리셋</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="fov-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">기본 도구</p><h2>FoV 계산기</h2><p class="section-lede">프리셋을 고르거나 FoV와 화면 비율을 입력하세요.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/fov-calculator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>FoV 변환 방법</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. 게임 선택</h3><p>프리셋이 형식과 비율을 설정.</p></div>
        <div class="guideline-card"><h3>2. FoV 입력</h3><p>현재 값을 입력.</p></div>
        <div class="guideline-card"><h3>3. 표 확인</h3><p>형식·비율별 동일한 FoV.</p></div>
        <div class="guideline-card"><h3>4. 적용</h3><p>새 게임에 값을 복사.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
