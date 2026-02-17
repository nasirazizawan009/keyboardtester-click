<?php
/**
 * Korean Ghost Click Detector - 고스트 클릭 감지기
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = '고스트 클릭 감지기 - 무료 온라인 마우스 고스트 클릭 테스트';
$pageDescription = '마우스 고스트 클릭(더블 클릭 문제)을 무료로 테스트하세요. 의도치 않은 이중 클릭을 감지하고 마우스 상태를 확인합니다.';
$pageKeywords = '고스트 클릭, 고스트 클릭 테스트, 더블 클릭 문제, 마우스 테스트, 마우스 고장';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ghost-click-detector.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/ghost-click.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ghost-click-detector.php'); ?>">

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
        "name": "고스트 클릭이란 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "고스트 클릭은 한 번 클릭했는데 마우스가 두 번 이상 클릭으로 인식하는 현상입니다. 마우스 스위치의 노후화나 결함으로 인해 발생합니다."
        }
      },
      {
        "@type": "Question",
        "name": "고스트 클릭을 어떻게 테스트하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "테스트 영역에서 평소처럼 클릭하세요. 300ms 미만의 빠른 연속 클릭이 감지되면 고스트 클릭으로 표시됩니다."
        }
      },
      {
        "@type": "Question",
        "name": "고스트 클릭이 발생하면 어떻게 해야 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "고스트 클릭이 자주 발생하면 마우스 드라이버 업데이트, 마우스 청소, 또는 마우스 교체를 고려해 보세요."
        }
      },
      {
        "@type": "Question",
        "name": "이 테스트는 모든 마우스에서 작동하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "네, 유선 마우스, 무선 마우스, 게이밍 마우스 등 모든 종류의 마우스에서 작동합니다."
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
          <h1 id="hero-title">고스트 클릭 감지기</h1>
          <p class="hero-lede">마우스의 고스트 클릭(의도치 않은 더블 클릭)을 감지하세요. 실시간 피드백으로 마우스 상태를 확인합니다.</p>
          <div class="hero-ctas">
            <a href="#ghost-click-test" class="landing-btn landing-btn-primary">테스트 시작</a>
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
          <h2 id="tool-stage-title">고스트 클릭 감지기</h2>
          <p class="section-lede">아래 도구를 사용하여 마우스의 고스트 클릭을 감지하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="ghost-click-test" class="tool-shell">
        <?php include __DIR__ . '/tools/ghost-click-tool.php'; ?>
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
          <div class="trust-title">고스트 클릭 전용</div>
          <div class="trust-desc">정밀 감지</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">고스트 클릭</p>
          <h2 id="feature-title">고스트 클릭 감지에 필요한 모든 것</h2>
          <p class="section-lede">집중적인 테스트를 실행하고 몇 초 안에 결과를 확인하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>집중 분석</h3>
            <p>실시간 업데이트로 고스트 클릭을 추적합니다.</p>
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
            <h2 id="process-title">고스트 클릭을 감지하는 세 단계</h2>
          </div>
          <p class="section-lede">아래의 간단한 단계를 따라 테스트하고 결과를 확인하세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>테스트 시작</h3>
            <p>시작 버튼을 클릭하여 테스트를 시작합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>평소처럼 클릭</h3>
            <p>의도치 않은 더블 클릭을 감지하기 위해 평소처럼 클릭합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>결과 확인</h3>
            <p>고스트 클릭 통계를 확인하고 필요시 재테스트합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'ghost-click'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>고스트 클릭 감지기 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 시작 버튼 클릭</h3>
            <p>"시작" 버튼을 클릭하여 테스트를 활성화하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 테스트 영역에서 클릭</h3>
            <p>테스트 영역 안에서 평소처럼 마우스를 클릭하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 결과 모니터링</h3>
            <p>빠른 클릭(300ms 미만)이 감지되면 고스트 클릭으로 표시됩니다.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 통계 확인</h3>
            <p>총 클릭 수, 빠른 클릭 수, 평균 간격을 확인하여 마우스 상태를 진단하세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
