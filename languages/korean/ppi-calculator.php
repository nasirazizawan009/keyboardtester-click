<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'PPI 계산기 - 해상도로부터 인치당 픽셀 계산';
$pageDescription = '무료 온라인 PPI 계산기. 해상도와 대각선 크기로 PPI, 도트 피치, 화면 비율, 총 메가픽셀을 즉시 계산합니다.';
$pageKeywords = 'PPI 계산기, 인치당 픽셀, 모니터 DPI, 화면 밀도';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">디스플레이 계산기</p>
        <h1 class="hero-title">PPI 계산기 - 인치당 픽셀</h1>
        <p class="hero-lede">해상도와 대각선 크기를 입력하면 PPI, 도트 피치, 화면 비율, 총 메가픽셀이 바로 나옵니다. 모니터·노트북·스마트폰 프리셋 포함.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#ppi-calculator">PPI 계산</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">사용법</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">PPI + 도트 피치</span><span class="hero-badge">화면 비율</span><span class="hero-badge">Retina</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="ppi-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">기본 도구</p><h2>PPI 계산기</h2><p class="section-lede">해상도 + 대각선 → 즉시 PPI.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/ppi-calculator-tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
