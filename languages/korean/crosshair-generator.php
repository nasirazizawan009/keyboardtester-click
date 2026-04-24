<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;
$pageTitle = '크로스헤어 생성기 - CS2·Valorant용 맞춤 크로스헤어 제작';
$pageDescription = '무료 온라인 크로스헤어 생성기. 실시간 미리보기로 맞춤 크로스헤어 제작, PNG 내보내기, CS2 콘솔 명령 또는 Valorant 설정값 복사 지원.';
$pageKeywords = '크로스헤어 생성기, crosshair, CS2 크로스헤어, Valorant 크로스헤어';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">크로스헤어 도구</p>
        <h1 class="hero-title">크로스헤어 생성기 - 맞춤 크로스헤어 제작</h1>
        <p class="hero-lede">실시간 미리보기로 크로스헤어를 제작하세요. 프로 프리셋(s1mple, TenZ)을 사용하거나 모양·색상·두께·길이·간격·중앙점·아웃라인 등 모든 요소를 세부 조정할 수 있습니다. 투명 PNG 다운로드와 CS2 콘솔 명령 복사 지원.</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#crosshair-generator">생성기 열기</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">사용법</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">실시간 미리보기</span><span class="hero-badge">CS2 명령</span><span class="hero-badge">Valorant 값</span><span class="hero-badge">투명 PNG</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="crosshair-generator">
      <div class="container tool-stage-header"><div><p class="section-kicker">기본 도구</p><h2>크로스헤어 생성기</h2><p class="section-lede">옵션을 조절하고 CS2, Valorant, PNG로 내보내기.</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/crosshair-generator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>크로스헤어 적용 방법</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. 프리셋 선택</h3><p>프로 프리셋에서 시작해 조정.</p></div>
        <div class="guideline-card"><h3>2. 미리보기 조정</h3><p>모양·색상·아웃라인 즉시 반영.</p></div>
        <div class="guideline-card"><h3>3. 내보내기</h3><p>PNG 또는 CS2 명령 복사.</p></div>
        <div class="guideline-card"><h3>4. 게임에 적용</h3><p>콘솔(~)에 붙여넣거나 Valorant에 입력.</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
