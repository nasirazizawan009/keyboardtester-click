<?php
/**
 * Korean Mouse DPI Tester - DPI 테스터
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = 'DPI 테스터 - 무료 온라인 마우스 DPI 및 감도 테스트';
$pageDescription = '마우스 DPI와 감도를 무료로 테스트하세요. 실시간 피드백으로 마우스의 정확한 DPI 값을 측정합니다.';
$pageKeywords = 'DPI 테스트, 마우스 DPI, 마우스 감도, 마우스 민감도, DPI 측정';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&family=Noto+Sans+KR:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "DPI란 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "DPI(Dots Per Inch)는 마우스를 1인치 이동할 때 커서가 화면에서 이동하는 픽셀 수를 나타냅니다. DPI가 높을수록 마우스가 더 민감하게 반응합니다."
        }
      },
      {
        "@type": "Question",
        "name": "이 도구로 DPI를 어떻게 측정하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "마우스를 이동한 실제 거리(cm 또는 인치)를 입력하고, 트랙 영역에서 해당 거리만큼 마우스를 드래그하세요. 이동한 픽셀 수를 기반으로 DPI가 계산됩니다."
        }
      },
      {
        "@type": "Question",
        "name": "적절한 DPI 설정은 어느 정도인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "용도에 따라 다릅니다. 일반 사용은 800-1200 DPI, 정밀 작업은 400-800 DPI, 빠른 게임은 1600-3200 DPI가 일반적입니다."
        }
      },
      {
        "@type": "Question",
        "name": "마우스 DPI를 변경할 수 있나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "대부분의 게이밍 마우스는 DPI 조절 버튼이 있으며, 마우스 소프트웨어나 드라이버를 통해 DPI를 변경할 수 있습니다."
        }
      }
    ]
  }
  </script>

  <style>
    body { font-family: 'Noto Sans KR', 'Space Grotesk', sans-serif; }
  </style>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-ko.php'; ?>

  <main id="main-content" class="landing-main">
    <!-- Hero Section -->
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">DPI 테스터</h1>
          <p class="hero-lede">마우스의 DPI와 감도를 정확하게 측정하세요. 실시간 피드백으로 빠르게 결과를 확인할 수 있습니다.</p>
          <div class="hero-ctas">
            <a href="#dpi-test" class="landing-btn landing-btn-primary">테스트 시작</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">사용 방법</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Tool Section -->
    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">주요 테스터</p>
          <h2 id="tool-stage-title">DPI 테스터</h2>
          <p class="section-lede">아래 도구를 사용하여 마우스 DPI를 측정하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="dpi-test" class="tool-shell">
        <?php include __DIR__ . '/tools/dpi-tester-tool.php'; ?>
      </section>
    </section>

    <!-- Trust Strip -->
    <section class="trust-strip" aria-label="주요 기능">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">실시간 피드백</div>
          <div class="trust-desc">즉시 결과 확인</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">빠른 초기화</div>
          <div class="trust-desc">바로 다시 테스트</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">브라우저 기반</div>
          <div class="trust-desc">설치 불필요</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">DPI 전용</div>
          <div class="trust-desc">정밀 측정</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">DPI 및 감도</p>
          <h2 id="feature-title">DPI 테스트에 필요한 모든 것</h2>
          <p class="section-lede">집중적인 테스트를 실행하고 몇 초 안에 결과를 확인하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>집중 분석</h3>
            <p>실시간 업데이트로 DPI와 감도를 추적합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>즉각적인 결과</h3>
            <p>테스트하는 동안 실시간으로 변화를 확인합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>간단한 조작</h3>
            <p>몇 초 만에 시작, 중지, 초기화할 수 있습니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>반복 테스트</h3>
            <p>여러 번 테스트하여 빠르게 비교합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Process Steps -->
    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">간단한 워크플로우</p>
            <h2 id="process-title">DPI를 측정하는 세 단계</h2>
          </div>
          <p class="section-lede">아래의 간단한 단계를 따라 테스트하고 결과를 확인하세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>거리 입력</h3>
            <p>마우스를 이동할 물리적 거리를 입력합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>마우스 드래그</h3>
            <p>가이드를 따라 마우스를 드래그하여 보정합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>결과 확인</h3>
            <p>DPI 및 감도 통계를 확인하고 필요시 재테스트합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'dpi-tester'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>DPI 테스터 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 거리 설정</h3>
            <p>마우스 패드에서 이동할 실제 거리(cm 또는 인치)를 입력하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 측정 시작</h3>
            <p>"측정 시작" 버튼을 클릭하여 트랙 영역을 활성화하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 마우스 드래그</h3>
            <p>트랙 영역에서 마우스 버튼을 누른 채로 입력한 거리만큼 드래그하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. DPI 확인</h3>
            <p>이동한 픽셀 수와 계산된 DPI 값을 확인하세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
