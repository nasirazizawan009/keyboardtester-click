<?php
/**
 * Korean Mouse DPI Calculator
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;

$pageTitle = '마우스 DPI 계산기 - 실제 DPI를 온라인으로 측정';
$pageDescription = '무료 마우스 DPI 계산기. 패드 위에서 드래그하거나 픽셀과 인치를 수동 입력해 실제 DPI를 측정하세요. 공인 DPI와 실제 센서 DPI를 비교합니다.';
$pageKeywords = '마우스 DPI 계산기, 실제 DPI, 마우스 DPI 측정, true dpi calculator';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">게이밍 감도 계산기</p>
          <h1 class="hero-title">마우스 DPI 계산기 - 실제 DPI를 측정하세요</h1>
          <p class="hero-lede">마우스의 실제 DPI를 확인하세요. 일정한 물리적 거리를 드래그하거나 값을 직접 입력하면 픽셀/인치 기준의 실 DPI를 계산합니다. 센서 오차를 확인하고 공인 값과 비교하세요.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-dpi-calculator">DPI 측정</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">사용법</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">드래그 측정</span>
            <span class="hero-badge">픽셀 + 인치 입력</span>
            <span class="hero-badge">공인 vs 실제 DPI</span>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-dpi-calculator">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">기본 도구</p>
          <h2>마우스 DPI 계산기</h2>
          <p class="section-lede">픽셀과 인치를 입력하거나 패드에서 드래그해 측정하세요.</p>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-dpi-calculator-tool.php'; ?></section>
    </section>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>DPI 계산 방법</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. 가속 해제</h3><p>측정 전 Windows의 "포인터 정확도 향상"을 끕니다.</p></div>
          <div class="guideline-card"><h3>2. 자 준비</h3><p>마우스패드 옆에 자를 둡니다.</p></div>
          <div class="guideline-card"><h3>3. 10cm 또는 4인치 드래그</h3><p>버튼을 누른 채 직선으로 이동.</p></div>
          <div class="guideline-card"><h3>4. DPI 비교</h3><p>공인 DPI를 입력하고 편차를 확인.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
