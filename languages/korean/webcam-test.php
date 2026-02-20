<?php
/**
 * Korean Webcam Tester - 웹캠 테스터
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = '웹캠 테스터 - 무료 온라인 웹캠 테스트';
$pageDescription = '무료 온라인 웹캠 테스터로 웹캠 품질을 테스트하세요. 실시간 피드백과 스냅샷 기능을 제공합니다.';
$pageKeywords = '웹캠 테스트, 웹캠 테스터, 카메라 테스트, 비디오 테스트, 온라인 웹캠';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('webcamtesterindex.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/webcam-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('webcamtesterindex.php'); ?>">

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
        "name": "웹캠 테스트는 어떻게 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "'웹캠 시작' 버튼을 클릭하고 브라우저의 카메라 권한을 허용하세요. 그런 다음 미리보기에서 웹캠 영상을 확인할 수 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "웹캠 테스트에서 내 영상이 녹화되나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "아니요, 이 테스트는 브라우저에서만 실행되며 비디오가 녹화되거나 서버로 전송되지 않습니다."
        }
      },
      {
        "@type": "Question",
        "name": "웹캠이 작동하지 않으면 어떻게 해야 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "브라우저 설정에서 카메라 권한을 확인하세요. 또한 시스템 설정에서 올바른 카메라가 선택되어 있는지 확인하세요."
        }
      },
      {
        "@type": "Question",
        "name": "스냅샷은 어떻게 찍나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "웹캠이 활성화된 상태에서 '스냅샷 촬영' 버튼을 클릭하면 현재 프레임이 캡처됩니다. 여러 장의 스냅샷을 찍고 한 번에 다운로드할 수 있습니다."
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
          <h1 id="hero-title">웹캠 테스터</h1>
          <p class="hero-lede">웹캠 품질을 실시간으로 테스트하세요. 해상도, 프레임 레이트를 확인하고 스냅샷을 캡처할 수 있습니다.</p>
          <div class="hero-ctas">
            <a href="#webcam-test" class="landing-btn landing-btn-primary">테스트 시작</a>
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
          <h2 id="tool-stage-title">웹캠 테스터</h2>
          <p class="section-lede">아래 도구를 사용하여 웹캠을 테스트하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="webcam-test" class="tool-shell">
        <?php include __DIR__ . '/tools/webcam-test-tool.php'; ?>
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
          <div class="trust-title">스냅샷 기능</div>
          <div class="trust-desc">이미지 캡처 및 저장</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">브라우저 기반</div>
          <div class="trust-desc">설치 불필요</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">다중 카메라</div>
          <div class="trust-desc">여러 카메라 지원</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">웹캠 품질</p>
          <h2 id="feature-title">웹캠 테스트에 필요한 모든 것</h2>
          <p class="section-lede">집중적인 테스트를 실행하고 몇 초 안에 결과를 확인하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>집중 분석</h3>
            <p>실시간 업데이트로 웹캠 품질을 추적합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>즉각적인 결과</h3>
            <p>테스트하는 동안 실시간으로 변화를 확인합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>간단한 조작</h3>
            <p>몇 초 만에 시작, 중지, 캡처할 수 있습니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>해상도 감지</h3>
            <p>실제 해상도와 프레임 레이트를 확인합니다.</p>
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
            <h2 id="process-title">웹캠을 테스트하는 세 단계</h2>
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
            <h3>카메라 접근 허용</h3>
            <p>브라우저에서 카메라 권한을 허용하고 미리보기를 확인합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>결과 확인</h3>
            <p>웹캠 품질 정보를 확인하고 필요시 스냅샷을 촬영합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'webcam-test'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>웹캠 테스터 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 권한 허용</h3>
            <p>"웹캠 시작" 버튼을 클릭하고 브라우저의 카메라 권한 요청을 허용하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 미리보기 확인</h3>
            <p>웹캠이 활성화되면 실시간 비디오 미리보기가 표시됩니다.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 정보 확인</h3>
            <p>해상도, 프레임 레이트, 화면 비율 등의 웹캠 정보를 확인하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 스냅샷 촬영</h3>
            <p>"스냅샷 촬영" 버튼을 클릭하여 이미지를 캡처하고 다운로드할 수 있습니다.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
