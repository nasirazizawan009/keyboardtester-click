<?php
/**
 * Korean OCR Tool - OCR 도구
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = 'OCR 도구 - 무료 온라인 이미지 텍스트 추출';
$pageDescription = '무료 온라인 OCR 도구로 이미지에서 텍스트를 추출하세요. 브라우저에서 안전하게 처리되며 한국어와 영어를 지원합니다.';
$pageKeywords = 'OCR 도구, 이미지 텍스트 추출, 텍스트 인식, 광학 문자 인식, 이미지 변환';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ocr-tool.php'); ?>">

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
        "name": "OCR이란 무엇인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "OCR(광학 문자 인식)은 이미지, 스캔된 문서 또는 사진에서 텍스트를 인식하고 추출하는 기술입니다. 이 도구를 사용하면 이미지의 텍스트를 복사 및 편집 가능한 형식으로 변환할 수 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "어떤 이미지 형식을 지원하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "JPG, PNG 등 대부분의 일반적인 이미지 형식을 지원합니다. 최상의 결과를 위해 텍스트가 선명하고 대비가 좋은 이미지를 사용하세요."
        }
      },
      {
        "@type": "Question",
        "name": "이미지가 서버로 전송되나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "아니요, 모든 처리는 브라우저에서 로컬로 이루어집니다. 이미지가 서버로 전송되거나 저장되지 않으므로 완전히 안전합니다."
        }
      },
      {
        "@type": "Question",
        "name": "한국어 텍스트도 인식하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "네, 이 도구는 한국어와 영어 텍스트를 모두 인식합니다. 혼합된 텍스트도 처리할 수 있습니다."
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
          <h1 id="hero-title">OCR 도구</h1>
          <p class="hero-lede">이미지에서 텍스트를 추출하세요. 한국어와 영어를 지원하며 브라우저에서 안전하게 처리됩니다.</p>
          <div class="hero-ctas">
            <a href="#ocr-tool" class="landing-btn landing-btn-primary">추출 시작</a>
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
          <h2 id="tool-stage-title">OCR 도구</h2>
          <p class="section-lede">아래 도구를 사용하여 이미지에서 텍스트를 추출하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="ocr-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/ocr-tool.php'; ?>
      </section>
    </section>

    <!-- Trust Strip -->
    <section class="trust-strip" aria-label="주요 기능">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">한국어 지원</div>
          <div class="trust-desc">한글 텍스트 인식</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">브라우저 기반</div>
          <div class="trust-desc">서버 전송 없음</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">간편 복사</div>
          <div class="trust-desc">추출 텍스트 복사</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">다양한 형식</div>
          <div class="trust-desc">JPG, PNG 지원</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">텍스트 추출</p>
          <h2 id="feature-title">이미지에서 텍스트를 추출하는 쉬운 방법</h2>
          <p class="section-lede">업로드하고 추출하면 바로 사용할 수 있습니다.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>다국어 지원</h3>
            <p>한국어와 영어 텍스트를 모두 인식합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>로컬 처리</h3>
            <p>이미지가 브라우저에서만 처리되어 안전합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>진행 상황 표시</h3>
            <p>처리 진행률을 실시간으로 확인합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>간편한 사용</h3>
            <p>파일 선택 후 한 번의 클릭으로 추출합니다.</p>
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
            <h2 id="process-title">텍스트 추출 세 단계</h2>
          </div>
          <p class="section-lede">아래의 간단한 단계를 따라 이미지에서 텍스트를 추출하세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>이미지 업로드</h3>
            <p>텍스트가 포함된 이미지 파일을 선택합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>텍스트 추출</h3>
            <p>추출 버튼을 클릭하고 처리를 기다립니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>결과 사용</h3>
            <p>추출된 텍스트를 복사하여 필요한 곳에 사용합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'ocr-tool'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>OCR 도구 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 이미지 선택</h3>
            <p>텍스트가 포함된 JPG 또는 PNG 이미지를 선택하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 이미지 품질</h3>
            <p>최상의 결과를 위해 선명하고 대비가 좋은 이미지를 사용하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 처리 대기</h3>
            <p>추출 버튼을 클릭하면 진행 상황이 표시됩니다. 완료까지 기다려주세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 결과 복사</h3>
            <p>추출이 완료되면 복사 버튼을 클릭하여 텍스트를 복사하세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
