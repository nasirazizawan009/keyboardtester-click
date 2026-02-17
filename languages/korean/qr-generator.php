<?php
/**
 * Korean QR Code Generator - QR 코드 생성기
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = 'QR 코드 생성기 - 무료 온라인 QR 코드 만들기';
$pageDescription = '무료 온라인 QR 코드 생성기로 텍스트, URL 등을 QR 코드로 변환하세요. 실시간 미리보기와 다운로드 기능을 제공합니다.';
$pageKeywords = 'QR 코드 생성기, QR 코드 만들기, QR 생성, 무료 QR 코드';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('QR_code_generator_scanner.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/qr-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('QR_code_generator_scanner.php'); ?>">

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
        "name": "QR 코드란 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "QR 코드(Quick Response Code)는 스마트폰 카메라로 스캔하면 텍스트, URL, 연락처 등의 정보를 빠르게 읽을 수 있는 2차원 바코드입니다."
        }
      },
      {
        "@type": "Question",
        "name": "어떤 내용으로 QR 코드를 만들 수 있나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "웹사이트 URL, 텍스트 메시지, 이메일 주소, 전화번호, Wi-Fi 정보 등 다양한 내용으로 QR 코드를 생성할 수 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "생성된 QR 코드를 저장할 수 있나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "네, '다운로드' 버튼을 클릭하면 생성된 QR 코드를 PNG 이미지로 저장할 수 있습니다."
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
          <h1 id="hero-title">QR 코드 생성기</h1>
          <p class="hero-lede">텍스트, URL 등을 QR 코드로 변환하세요. 실시간 미리보기와 다운로드 기능을 제공합니다.</p>
          <div class="hero-ctas">
            <a href="#qr-generator" class="landing-btn landing-btn-primary">QR 코드 생성</a>
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
          <h2 id="tool-stage-title">QR 코드 생성기</h2>
          <p class="section-lede">아래 도구를 사용하여 QR 코드를 생성하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="qr-generator" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-generator-tool.php'; ?>
      </section>
    </section>

    <!-- Trust Strip -->
    <section class="trust-strip" aria-label="주요 기능">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">실시간 미리보기</div>
          <div class="trust-desc">즉시 결과 확인</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">빠른 생성</div>
          <div class="trust-desc">몇 초 만에 완료</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">브라우저 기반</div>
          <div class="trust-desc">설치 불필요</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">무료 다운로드</div>
          <div class="trust-desc">PNG 이미지 저장</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">QR 생성</p>
          <h2 id="feature-title">QR 코드 생성에 필요한 모든 것</h2>
          <p class="section-lede">간단한 입력으로 QR 코드를 생성하고 다운로드하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>다양한 입력</h3>
            <p>텍스트, URL, 연락처 등 다양한 형식 지원</p>
          </article>
          <article class="landing-feature-card">
            <h3>크기 선택</h3>
            <p>필요에 맞는 크기로 QR 코드 생성</p>
          </article>
          <article class="landing-feature-card">
            <h3>즉시 다운로드</h3>
            <p>PNG 형식으로 바로 저장</p>
          </article>
          <article class="landing-feature-card">
            <h3>개인정보 보호</h3>
            <p>모든 처리가 브라우저에서 진행</p>
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
            <h2 id="process-title">QR 코드를 생성하는 세 단계</h2>
          </div>
          <p class="section-lede">아래의 간단한 단계를 따라 QR 코드를 만드세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>내용 입력</h3>
            <p>텍스트 또는 URL을 입력합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>생성 클릭</h3>
            <p>생성 버튼을 클릭하여 QR 코드를 만듭니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>다운로드</h3>
            <p>다운로드 버튼으로 이미지를 저장합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'qr-generator'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>QR 코드 생성기 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 내용 입력</h3>
            <p>텍스트 상자에 QR 코드로 변환할 텍스트나 URL을 입력하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 크기 선택</h3>
            <p>드롭다운에서 원하는 QR 코드 크기를 선택하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>3. QR 코드 생성</h3>
            <p>"생성" 버튼을 클릭하면 오른쪽에 QR 코드가 표시됩니다.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 이미지 저장</h3>
            <p>"다운로드" 버튼을 클릭하여 QR 코드를 PNG 파일로 저장하세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
