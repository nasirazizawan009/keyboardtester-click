<?php
/**
 * Korean QR Code Reader - QR 코드 리더
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = 'QR 코드 리더 - 무료 온라인 QR 코드 스캔';
$pageDescription = '무료 온라인 QR 코드 리더로 이미지에서 QR 코드를 스캔하세요. 브라우저에서 안전하게 디코딩됩니다.';
$pageKeywords = 'QR 코드 리더, QR 코드 스캔, QR 스캐너, QR 디코더';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-code-reader.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/qr-reader.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-code-reader.php'); ?>">

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
        "name": "QR 코드 리더는 어떻게 사용하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "QR 코드가 포함된 이미지를 업로드하고 '디코딩' 버튼을 클릭하면 QR 코드의 내용이 표시됩니다."
        }
      },
      {
        "@type": "Question",
        "name": "업로드한 이미지는 서버에 저장되나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "아니요, 모든 처리는 브라우저에서 로컬로 진행됩니다. 이미지가 서버로 전송되지 않습니다."
        }
      },
      {
        "@type": "Question",
        "name": "어떤 이미지 형식을 지원하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "JPG, PNG, GIF, WebP 등 대부분의 이미지 형식을 지원합니다."
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
          <h1 id="hero-title">QR 코드 리더</h1>
          <p class="hero-lede">이미지에서 QR 코드를 스캔하세요. 브라우저에서 안전하게 디코딩됩니다.</p>
          <div class="hero-ctas">
            <a href="#qr-reader" class="landing-btn landing-btn-primary">QR 코드 스캔</a>
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
          <h2 id="tool-stage-title">QR 코드 리더</h2>
          <p class="section-lede">아래 도구를 사용하여 QR 코드를 스캔하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="qr-reader" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-reader-tool.php'; ?>
      </section>
    </section>

    <!-- Trust Strip -->
    <section class="trust-strip" aria-label="주요 기능">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">실시간 결과</div>
          <div class="trust-desc">즉시 디코딩</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">개인정보 보호</div>
          <div class="trust-desc">로컬 처리</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">브라우저 기반</div>
          <div class="trust-desc">설치 불필요</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">복사 기능</div>
          <div class="trust-desc">결과 쉽게 복사</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">QR 스캔</p>
          <h2 id="feature-title">QR 코드 리더에 필요한 모든 것</h2>
          <p class="section-lede">이미지를 업로드하고 QR 코드 내용을 확인하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3">이미지 업로드</h3>
            <p>다양한 이미지 형식 지원</p>
          </article>
          <article class="landing-feature-card">
            <h3>빠른 디코딩</h3>
            <p>몇 초 만에 QR 코드 해석</p>
          </article>
          <article class="landing-feature-card">
            <h3>결과 복사</h3>
            <p>한 번의 클릭으로 복사</p>
          </article>
          <article class="landing-feature-card">
            <h3>안전한 처리</h3>
            <p>브라우저에서만 처리</p>
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
            <h2 id="process-title">QR 코드를 스캔하는 세 단계</h2>
          </div>
          <p class="section-lede">아래의 간단한 단계를 따라 QR 코드를 스캔하세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>이미지 업로드</h3>
            <p>QR 코드가 포함된 이미지를 선택합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>디코딩</h3>
            <p>디코딩 버튼을 클릭하여 QR 코드를 해석합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>결과 확인</h3>
            <p>디코딩된 내용을 확인하고 복사합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'qr-reader'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>QR 코드 리더 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 이미지 선택</h3>
            <p>파일 선택 버튼을 클릭하여 QR 코드가 포함된 이미지를 선택하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 디코딩 실행</h3>
            <p>"디코딩" 버튼을 클릭하여 QR 코드를 해석하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 결과 확인</h3>
            <p>오른쪽 텍스트 영역에서 디코딩된 내용을 확인하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 결과 복사</h3>
            <p>"복사" 버튼을 클릭하여 결과를 클립보드에 복사하세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
