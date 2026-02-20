<?php
/**
 * Korean Latency Checker - 지연 시간 검사기
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = '지연 시간 검사기 - 무료 온라인 키보드 지연 테스트';
$pageDescription = '무료 온라인 지연 시간 검사기로 키보드 입력 지연을 측정하세요. 실시간 지연 시간 통계를 제공합니다.';
$pageKeywords = '지연 시간 테스트, 키보드 지연, 입력 지연, 레이턴시 테스트, 반응 속도';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('tools/latency_checker.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/latency-checker.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('tools/latency_checker.php'); ?>">

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
        "name": "지연 시간이란 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "지연 시간(레이턴시)은 키보드 키를 누른 시점부터 컴퓨터가 해당 입력을 처리하는 데 걸리는 시간입니다. 낮은 지연 시간은 더 빠른 반응성을 의미합니다."
        }
      },
      {
        "@type": "Question",
        "name": "좋은 지연 시간은 얼마인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "일반적으로 1ms 미만의 지연 시간이 우수하다고 간주됩니다. 게이밍 키보드는 더 낮은 지연 시간을 목표로 합니다."
        }
      },
      {
        "@type": "Question",
        "name": "이 테스트는 어떻게 작동하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "브라우저의 이벤트 타임스탬프와 현재 시간을 비교하여 키 입력이 처리되는 데 걸린 시간을 측정합니다."
        }
      },
      {
        "@type": "Question",
        "name": "결과에 영향을 미치는 요인은 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "키보드 하드웨어, USB 폴링 레이트, 시스템 부하, 브라우저 성능 등이 측정된 지연 시간에 영향을 줄 수 있습니다."
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
          <h1 id="hero-title">지연 시간 검사기</h1>
          <p class="hero-lede">키보드 입력 지연 시간을 측정하세요. 현재, 평균, 최소, 최대 지연 시간을 실시간으로 확인할 수 있습니다.</p>
          <div class="hero-ctas">
            <a href="#latency-test" class="landing-btn landing-btn-primary">테스트 시작</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">사용 방법</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Tool Section -->
    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">주요 도구</p>
          <h2 id="tool-stage-title">지연 시간 검사기</h2>
          <p class="section-lede">아래 도구를 사용하여 키보드 지연 시간을 측정하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="latency-test" class="tool-shell">
        <?php include __DIR__ . '/tools/latency-checker-tool.php'; ?>
      </section>
    </section>

    <!-- Trust Strip -->
    <section class="trust-strip" aria-label="주요 기능">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">실시간 측정</div>
          <div class="trust-desc">즉각적인 피드백</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">통계 분석</div>
          <div class="trust-desc">평균/최소/최대</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">브라우저 기반</div>
          <div class="trust-desc">설치 불필요</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">샘플 로그</div>
          <div class="trust-desc">키별 기록</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">입력 지연</p>
          <h2 id="feature-title">키보드 지연 시간 측정에 필요한 모든 것</h2>
          <p class="section-lede">키를 눌러 입력 지연 시간을 측정하고 통계를 확인하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>실시간 측정</h3>
            <p>각 키 입력의 지연 시간을 즉시 확인합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>통계 분석</h3>
            <p>평균, 최소, 최대 지연 시간을 자동으로 계산합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>샘플 로그</h3>
            <p>각 키 입력의 기록을 확인할 수 있습니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>간단한 조작</h3>
            <p>시작, 중지, 지우기를 간편하게 할 수 있습니다.</p>
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
            <h2 id="process-title">지연 시간 테스트 세 단계</h2>
          </div>
          <p class="section-lede">아래의 간단한 단계를 따라 키보드 지연 시간을 측정하세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>테스트 시작</h3>
            <p>테스트 시작 버튼을 클릭합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>키 입력</h3>
            <p>여러 키를 눌러 샘플을 수집합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>결과 확인</h3>
            <p>통계와 로그를 확인하고 분석합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'latency-checker'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>지연 시간 검사기 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 테스트 시작</h3>
            <p>"테스트 시작" 버튼을 클릭하여 측정을 시작하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 키 입력</h3>
            <p>다양한 키를 눌러 충분한 샘플을 수집하세요. 더 많은 샘플이 정확한 평균을 제공합니다.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 결과 분석</h3>
            <p>평균 지연 시간이 낮을수록 키보드 반응성이 좋은 것입니다.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 비교 테스트</h3>
            <p>다른 키보드나 설정으로 테스트하여 성능을 비교해 보세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
