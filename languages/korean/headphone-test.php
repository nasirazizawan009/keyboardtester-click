<?php
/**
 * Korean Headphone/Speaker Tester - 헤드폰/스피커 테스터
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = '헤드폰 테스터 - 무료 온라인 스피커 및 헤드폰 테스트';
$pageDescription = '무료 온라인 헤드폰 및 스피커 테스터로 오디오 출력을 테스트하세요. 채널 테스트, 주파수 스위프, 저음/고음 테스트를 제공합니다.';
$pageKeywords = '헤드폰 테스트, 스피커 테스트, 오디오 테스트, 채널 테스트, 주파수 테스트';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('tools/headphone_speaker_tester.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/headphone-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('tools/headphone_speaker_tester.php'); ?>">

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
        "name": "헤드폰 테스트는 어떻게 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "빠른 채널 테스트에서 왼쪽, 오른쪽 또는 스테레오 버튼을 클릭하여 각 채널이 올바르게 작동하는지 확인하세요. 오디오 테스트 섹션에서 다양한 주파수를 테스트할 수 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "주파수 스위프란 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "주파수 스위프는 20Hz에서 20kHz까지 점진적으로 주파수를 변경하여 헤드폰이나 스피커가 전체 가청 범위를 재생할 수 있는지 테스트합니다."
        }
      },
      {
        "@type": "Question",
        "name": "저음 테스트는 왜 필요한가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "저음 테스트(100Hz)는 헤드폰이나 스피커가 저주파 사운드를 얼마나 잘 재생하는지 확인합니다. 베이스 성능을 평가하는 데 유용합니다."
        }
      },
      {
        "@type": "Question",
        "name": "밸런스 테스트는 무엇을 확인하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "밸런스 테스트는 왼쪽과 오른쪽 채널을 번갈아 재생하여 두 채널이 동일한 볼륨과 품질로 소리를 출력하는지 확인합니다."
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
          <h1 id="hero-title">헤드폰 및 스피커 테스터</h1>
          <p class="hero-lede">헤드폰과 스피커의 오디오 출력을 테스트하세요. 채널 테스트, 주파수 스위프, 저음/고음 테스트를 제공합니다.</p>
          <div class="hero-ctas">
            <a href="#headphone-test" class="landing-btn landing-btn-primary">테스트 시작</a>
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
          <h2 id="tool-stage-title">헤드폰/스피커 테스터</h2>
          <p class="section-lede">아래 도구를 사용하여 오디오 장치를 테스트하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="headphone-test" class="tool-shell">
        <?php include __DIR__ . '/tools/headphone-test-tool.php'; ?>
      </section>
    </section>

    <!-- Trust Strip -->
    <section class="trust-strip" aria-label="주요 기능">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">채널 테스트</div>
          <div class="trust-desc">왼쪽/오른쪽 확인</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">주파수 스위프</div>
          <div class="trust-desc">전체 범위 테스트</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">브라우저 기반</div>
          <div class="trust-desc">설치 불필요</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">시각화</div>
          <div class="trust-desc">실시간 오디오 표시</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">오디오 테스트</p>
          <h2 id="feature-title">헤드폰 테스트에 필요한 모든 것</h2>
          <p class="section-lede">다양한 테스트로 오디오 장치의 성능을 확인하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>채널 테스트</h3>
            <p>왼쪽, 오른쪽, 스테레오 채널을 개별적으로 테스트합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>주파수 테스트</h3>
            <p>저음, 중음, 고음 주파수 응답을 확인합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>밸런스 테스트</h3>
            <p>양쪽 채널의 균형을 확인합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>화이트 노이즈</h3>
            <p>전체 스펙트럼 노이즈로 스피커를 테스트합니다.</p>
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
            <h2 id="process-title">헤드폰을 테스트하는 세 단계</h2>
          </div>
          <p class="section-lede">아래의 간단한 단계를 따라 오디오 장치를 테스트하세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>장치 연결</h3>
            <p>테스트할 헤드폰이나 스피커를 연결합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>테스트 선택</h3>
            <p>채널 테스트 또는 오디오 테스트 중 원하는 것을 선택합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>결과 확인</h3>
            <p>소리가 올바르게 재생되는지 확인하고 필요시 다른 테스트를 수행합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'headphone-test'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>헤드폰 테스터 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 볼륨 조절</h3>
            <p>테스트 전에 시스템 볼륨과 도구 내 볼륨을 편안한 수준으로 설정하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 채널 테스트</h3>
            <p>왼쪽, 오른쪽, 스테레오 버튼을 클릭하여 각 채널이 올바르게 작동하는지 확인하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 주파수 테스트</h3>
            <p>저음, 중음, 고음 테스트를 실행하여 헤드폰의 주파수 응답을 확인하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 밸런스 확인</h3>
            <p>밸런스 테스트로 양쪽 채널의 볼륨이 균등한지 확인하세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
