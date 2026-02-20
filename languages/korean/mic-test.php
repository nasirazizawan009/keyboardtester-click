<?php
/**
 * Korean Mic Tester - 마이크 테스터
 */
include __DIR__ . '/../../config.php';

$pageTitle = '마이크 테스터 - 무료 온라인 마이크 테스트';
$pageDescription = '무료 온라인 마이크 테스터로 마이크 입력을 테스트하세요. 실시간 피드백과 빠른 초기화 기능을 제공합니다.';
$pageKeywords = '마이크 테스트, 마이크 테스터, 오디오 테스트, 녹음 테스트, 마이크 확인';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mic-tester.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/mic-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mic-tester.php'); ?>">

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
        "name": "마이크 테스트는 어떻게 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "'마이크 시작' 버튼을 클릭하고 브라우저의 마이크 권한을 허용하세요. 그런 다음 마이크에 대고 말하면 레벨 미터에서 입력을 확인할 수 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "마이크 테스트에서 내 음성이 녹음되나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "아니요, 이 테스트는 브라우저에서만 실행되며 오디오가 녹음되거나 서버로 전송되지 않습니다."
        }
      },
      {
        "@type": "Question",
        "name": "마이크가 작동하지 않으면 어떻게 해야 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "브라우저 설정에서 마이크 권한을 확인하세요. 또한 시스템 설정에서 올바른 마이크가 선택되어 있는지 확인하세요."
        }
      },
      {
        "@type": "Question",
        "name": "레벨 미터가 움직이지 않는 이유는 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "마이크가 음소거되어 있거나 입력 볼륨이 너무 낮을 수 있습니다. 시스템 오디오 설정을 확인해 보세요."
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
          <h1 id="hero-title">마이크 테스터</h1>
          <p class="hero-lede">마이크 입력을 실시간으로 테스트하세요. 실시간 피드백으로 빠르게 결과를 확인할 수 있습니다.</p>
          <div class="hero-ctas">
            <a href="#mic-test" class="landing-btn landing-btn-primary">테스트 시작</a>
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
          <h2 id="tool-stage-title">마이크 테스터</h2>
          <p class="section-lede">아래 도구를 사용하여 마이크를 테스트하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="mic-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mic-test-tool.php'; ?>
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
          <div class="trust-title">마이크 입력 전용</div>
          <div class="trust-desc">정밀 측정</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">마이크 입력</p>
          <h2 id="feature-title">마이크 테스트에 필요한 모든 것</h2>
          <p class="section-lede">집중적인 테스트를 실행하고 몇 초 안에 결과를 확인하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>집중 분석</h3>
            <p>실시간 업데이트로 마이크 입력을 추적합니다.</p>
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
            <h2 id="process-title">마이크를 테스트하는 세 단계</h2>
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
            <h3>마이크에 말하기</h3>
            <p>레벨을 모니터링하기 위해 마이크에 대고 말합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>결과 확인</h3>
            <p>마이크 입력 통계를 확인하고 필요시 재테스트합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'mic-test'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>마이크 테스터 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 권한 허용</h3>
            <p>"마이크 시작" 버튼을 클릭하고 브라우저의 마이크 권한 요청을 허용하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 마이크에 말하기</h3>
            <p>마이크에 대고 말하여 레벨 미터가 반응하는지 확인하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 레벨 확인</h3>
            <p>현재 레벨과 최대값을 확인하여 마이크가 올바르게 작동하는지 확인하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 테스트 중지</h3>
            <p>테스트가 끝나면 "중지" 버튼을 클릭하여 마이크 접근을 종료하세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
