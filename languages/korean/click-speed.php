<?php
/**
 * Korean Click Speed Test - 클릭 속도 테스트
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = '클릭 속도 테스트 - 무료 온라인 마우스 클릭 속도 측정';
$pageDescription = '무료 온라인 클릭 속도 테스트로 마우스 클릭 속도를 측정하세요. 실시간 피드백과 빠른 초기화 기능을 제공합니다.';
$pageKeywords = '클릭 속도 테스트, 마우스 속도 테스트, CPS 테스트, 클릭 테스트, 마우스 클릭 속도';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse_speed_tester.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse_speed_tester.php'); ?>">

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
        "name": "클릭 속도 테스트란 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "클릭 속도 테스트는 일정 시간 동안 마우스를 얼마나 빨리 클릭할 수 있는지 측정하는 도구입니다. 결과는 분당 클릭 수(CPM)로 표시됩니다."
        }
      },
      {
        "@type": "Question",
        "name": "좋은 클릭 속도는 어느 정도인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "평균적인 클릭 속도는 분당 약 100-150 클릭입니다. 200 이상이면 빠른 편이고, 300 이상이면 매우 빠른 것으로 간주됩니다."
        }
      },
      {
        "@type": "Question",
        "name": "클릭 속도를 향상시키려면 어떻게 해야 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "꾸준한 연습, 편안한 마우스 그립, 반응이 빠른 마우스 사용이 도움이 됩니다. 버터플라이 클릭이나 지터 클릭 같은 기술도 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "이 테스트는 어떤 기기에서 사용할 수 있나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "이 테스트는 데스크톱, 노트북, 태블릿, 스마트폰 등 모든 브라우저 기반 기기에서 사용할 수 있습니다."
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
          <h1 id="hero-title">클릭 속도 테스트</h1>
          <p class="hero-lede">마우스 클릭 속도를 측정하고 실시간으로 결과를 확인하세요. 빠르고 간편한 무료 온라인 테스트입니다.</p>
          <div class="hero-ctas">
            <a href="#click-speed-test" class="landing-btn landing-btn-primary">테스트 시작</a>
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
          <h2 id="tool-stage-title">클릭 속도 테스트</h2>
          <p class="section-lede">아래 도구를 사용하여 클릭 속도를 측정하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="click-speed-test" class="tool-shell">
        <?php include __DIR__ . '/tools/click-speed-tool.php'; ?>
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
          <div class="trust-title">정확한 측정</div>
          <div class="trust-desc">클릭 속도 전용</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">클릭 속도</p>
          <h2 id="feature-title">클릭 속도 테스트에 필요한 모든 것</h2>
          <p class="section-lede">집중적인 테스트를 실행하고 몇 초 안에 결과를 확인하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>집중 분석</h3>
            <p>실시간 업데이트로 클릭 속도를 추적합니다.</p>
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
            <h2 id="process-title">클릭 속도를 테스트하는 세 단계</h2>
          </div>
          <p class="section-lede">아래의 간단한 단계를 따라 테스트하고 결과를 확인하세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>테스트 시작</h3>
            <p>도구를 열고 테스트할 준비를 합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>빠르게 클릭</h3>
            <p>테스트 영역 안에서 최대한 빠르게 클릭합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>결과 확인</h3>
            <p>클릭 속도 통계를 확인하고 필요시 재테스트합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'click-speed'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>클릭 속도 테스트 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 시간 선택</h3>
            <p>드롭다운에서 테스트 시간(1초, 10초, 30초, 60초)을 선택하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 클릭 영역 클릭</h3>
            <p>녹색 테두리 영역을 클릭하여 테스트를 시작하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 최대한 빠르게</h3>
            <p>시간이 끝날 때까지 최대한 빠르게 클릭하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 결과 확인</h3>
            <p>테스트가 끝나면 분당 클릭 수(CPM)와 재미있는 메시지를 확인하세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
