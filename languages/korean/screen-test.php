<?php
/**
 * Korean Screen Tester - 화면 테스터
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = '화면 테스터 - 무료 온라인 모니터 픽셀 테스트';
$pageDescription = '무료 온라인 화면 테스터로 데드 픽셀과 스턱 픽셀을 찾으세요. 실시간 피드백과 빠른 초기화 기능을 제공합니다.';
$pageKeywords = '화면 테스트, 모니터 테스트, 데드 픽셀, 스턱 픽셀, 픽셀 테스트';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('screentestindex.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/screen-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('screentestindex.php'); ?>">

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
        "name": "데드 픽셀이란 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "데드 픽셀은 더 이상 켜지지 않는 픽셀로, 모든 색상에서 검은 점으로 나타납니다. 하드웨어 결함으로 인해 발생합니다."
        }
      },
      {
        "@type": "Question",
        "name": "스턱 픽셀이란 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "스턱 픽셀은 한 색상(빨강, 초록, 파랑)에 고정된 픽셀입니다. 데드 픽셀과 달리 때로는 수리가 가능합니다."
        }
      },
      {
        "@type": "Question",
        "name": "화면 테스트는 어떻게 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "미리보기를 클릭하여 전체 화면 모드로 전환하고 다양한 색상을 순환하면서 비정상적인 픽셀을 찾으세요."
        }
      },
      {
        "@type": "Question",
        "name": "새 모니터를 구매할 때 확인해야 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "네, 새 모니터를 구매하면 반품 기간 내에 픽셀 결함을 확인하는 것이 좋습니다."
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
          <h1 id="hero-title">화면 테스터</h1>
          <p class="hero-lede">모니터의 데드 픽셀과 스턱 픽셀을 찾으세요. 실시간 피드백으로 빠르게 결과를 확인할 수 있습니다.</p>
          <div class="hero-ctas">
            <a href="#screen-test" class="landing-btn landing-btn-primary">테스트 시작</a>
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
          <h2 id="tool-stage-title">화면 테스터</h2>
          <p class="section-lede">아래 도구를 사용하여 모니터를 테스트하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="screen-test" class="tool-shell">
        <?php include __DIR__ . '/tools/screen-test-tool.php'; ?>
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
          <div class="trust-title">픽셀 문제 전용</div>
          <div class="trust-desc">정밀 감지</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">픽셀 문제</p>
          <h2 id="feature-title">화면 테스트에 필요한 모든 것</h2>
          <p class="section-lede">집중적인 테스트를 실행하고 몇 초 안에 결과를 확인하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>집중 분석</h3>
            <p>실시간 업데이트로 픽셀 문제를 추적합니다.</p>
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
            <h2 id="process-title">화면을 테스트하는 세 단계</h2>
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
            <h3>색상 순환</h3>
            <p>전체 화면에서 다양한 색상을 순환합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>결과 확인</h3>
            <p>픽셀 문제 통계를 확인하고 필요시 재테스트합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'screen-test'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>화면 테스터 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 화면 청소</h3>
            <p>테스트 전에 극세사 천으로 화면을 깨끗이 닦으세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 전체 화면 시작</h3>
            <p>미리보기 영역을 클릭하여 전체 화면 테스트 모드로 진입하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 색상 순환</h3>
            <p>화살표 키 또는 클릭으로 8가지 색상을 모두 확인하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 픽셀 확인</h3>
            <p>각 색상에서 비정상적인 점이나 색상 불균일을 찾으세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
