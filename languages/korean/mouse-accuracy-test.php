<?php
/**
 * Korean Mouse Accuracy Test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ko.php'; if (file_exists($__c)) include $__c;

$pageTitle = '마우스 정확도 테스트 - 온라인 에임 트레이너';
$pageDescription = '무료 온라인 마우스 정확도 테스트. 명중률, 평균 픽셀 오차, 타깃당 반응 시간을 측정하세요. 실제 데이터로 DPI와 감도를 보정하세요.';
$pageKeywords = '마우스 정확도 테스트, 에임 트레이너, aim trainer';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo absoluteUrl('languages/korean/mouse-accuracy-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-accuracy-test.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ko.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">에임 트레이너</p>
          <h1 class="hero-title" id="hero-title">마우스 정확도 테스트 - 에임 트레이너</h1>
          <p class="hero-lede">클릭 정확도, 평균 픽셀 오차, 타깃당 반응 시간을 측정합니다. 실제 데이터로 DPI와 감도를 보정하세요.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-accuracy-test">테스트 시작</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">사용 방법</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">픽셀 정밀도</span>
            <span class="hero-badge">반응 시간</span>
            <span class="hero-badge">DPI 보정</span>
          </div>
          <div class="hero-metrics">
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">에임 트레이너</span></div>
            <div class="metric-card"><span class="metric-value">3</span><span class="metric-label">타깃 크기</span></div>
            <div class="metric-card"><span class="metric-value">0</span><span class="metric-label">설치 불필요</span></div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <picture>
              <img src="<?php echo url('blog/images/keyboard-ghosting-mechanical-rgb-hero.jpg'); ?>" width="1280" height="720" alt="마우스 정확도 테스트 - 에임 트레이너" loading="eager" decoding="async" fetchpriority="high">
            </picture>
          </div>
          <div class="hero-stack">
            <div class="mini-card"><div class="mini-title">실제 에임 데이터</div><p>세션별 명중률과 평균 오차 추적.</p></div>
            <div class="mini-card"><div class="mini-title">DPI 루프</div><p>테스트, DPI 변경, 재테스트 - 정밀도 변화 확인.</p></div>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-accuracy-test" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">에임 트레이너</p>
          <h2 id="tool-stage-title">에임 트레이너</h2>
          <p class="section-lede">가능한 한 빠르고 정확하게 모든 타깃을 클릭하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">팁 보기</a>
        </div>
      </div>
      <section id="mouse-accuracy-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-accuracy-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="정확도 테스트 사용 방법">
      <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">픽셀 정밀도</div><div class="trust-desc">각 클릭을 타깃 중심부터 측정</div></div>
        <div class="trust-item"><div class="trust-title">반응 시간</div><div class="trust-desc">타깃 출현부터 클릭까지 밀리초</div></div>
        <div class="trust-item"><div class="trust-title">DPI 보정</div><div class="trust-desc">객관적 데이터로 설정 비교</div></div>
        <div class="trust-item"><div class="trust-title">로컬 및 가입 불필요</div><div class="trust-desc">다운로드 및 추적 없음</div></div>
      </div>
    </section>

    <?php $currentTool = 'mouse-accuracy'; $__ls = __DIR__ . '/sections/tools-list-ko.php'; if (file_exists($__ls)) include $__ls; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>정확도 테스트 사용 방법</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. 세션 구성</h3><p>시간(30초/60초/120초)과 타깃 크기를 선택.</p></div>
          <div class="guideline-card"><h3>2. 각 타깃 클릭</h3><p>녹색 타깃을 즉시 클릭.</p></div>
          <div class="guideline-card"><h3>3. 결과 확인</h3><p>명중률, 평균 오차, 시간.</p></div>
          <div class="guideline-card"><h3>4. 조정 및 반복</h3><p>DPI나 감도를 변경하고 다시 테스트.</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-ko.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
