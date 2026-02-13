<?php
/**
 * Korean Password Generator - 비밀번호 생성기
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = '비밀번호 생성기 - 무료 온라인 강력한 비밀번호 생성';
$pageDescription = '무료 온라인 비밀번호 생성기로 강력하고 안전한 비밀번호를 만드세요. 길이, 문자 유형을 사용자 정의할 수 있습니다.';
$pageKeywords = '비밀번호 생성기, 비밀번호 만들기, 강력한 비밀번호, 랜덤 비밀번호, 보안 비밀번호';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('tools/password_generator.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/password-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('tools/password_generator.php'); ?>">

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
        "name": "강력한 비밀번호는 어떻게 만드나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "강력한 비밀번호는 최소 12자 이상이어야 하며, 소문자, 대문자, 숫자, 기호를 모두 포함해야 합니다. 이 도구를 사용하면 자동으로 이러한 조건을 충족하는 비밀번호를 생성할 수 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "생성된 비밀번호가 저장되나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "아니요, 모든 비밀번호 생성은 브라우저에서만 이루어지며 어디에도 저장되거나 전송되지 않습니다. 완전히 안전하게 사용할 수 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "비밀번호 길이는 얼마가 좋나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "일반적으로 16자 이상의 비밀번호를 권장합니다. 길이가 길수록 무차별 대입 공격에 대한 저항력이 높아집니다."
        }
      },
      {
        "@type": "Question",
        "name": "비밀번호 강도는 어떻게 계산되나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "비밀번호 강도는 길이와 사용된 문자 유형의 다양성을 기반으로 계산됩니다. 더 긴 비밀번호와 더 많은 문자 유형을 사용할수록 강도가 높아집니다."
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
          <h1 id="hero-title">비밀번호 생성기</h1>
          <p class="hero-lede">강력하고 안전한 비밀번호를 즉시 생성하세요. 길이와 문자 유형을 사용자 정의할 수 있습니다.</p>
          <div class="hero-ctas">
            <a href="#password-gen" class="landing-btn landing-btn-primary">생성 시작</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">사용 방법</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Trust Strip -->
    <section class="trust-strip" aria-label="주요 기능">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">완전 무작위</div>
          <div class="trust-desc">예측 불가능한 생성</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">사용자 정의</div>
          <div class="trust-desc">길이 및 문자 설정</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">브라우저 기반</div>
          <div class="trust-desc">저장/전송 없음</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">강도 표시</div>
          <div class="trust-desc">비밀번호 평가</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">보안 도구</p>
          <h2 id="feature-title">안전한 비밀번호 생성에 필요한 모든 것</h2>
          <p class="section-lede">사용자 정의 옵션으로 원하는 비밀번호를 생성하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>길이 설정</h3>
            <p>6자에서 64자까지 원하는 길이로 설정합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>문자 유형</h3>
            <p>소문자, 대문자, 숫자, 기호를 선택합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>강도 분석</h3>
            <p>생성된 비밀번호의 강도를 자동으로 평가합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>간편 복사</h3>
            <p>한 번의 클릭으로 비밀번호를 복사합니다.</p>
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
            <h2 id="process-title">비밀번호 생성 세 단계</h2>
          </div>
          <p class="section-lede">아래의 간단한 단계를 따라 강력한 비밀번호를 만드세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>설정 선택</h3>
            <p>원하는 길이와 포함할 문자 유형을 선택합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>비밀번호 생성</h3>
            <p>생성 버튼을 클릭하여 무작위 비밀번호를 만듭니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>복사 및 사용</h3>
            <p>생성된 비밀번호를 복사하여 필요한 곳에 사용합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tool Section -->
    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">주요 도구</p>
          <h2 id="tool-stage-title">비밀번호 생성기</h2>
          <p class="section-lede">아래 도구를 사용하여 강력한 비밀번호를 생성하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="password-gen" class="tool-shell">
        <?php include __DIR__ . '/tools/password-generator-tool.php'; ?>
      </section>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'password-generator'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>비밀번호 생성기 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 길이 설정</h3>
            <p>보안을 위해 최소 16자 이상의 비밀번호를 권장합니다.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 문자 유형 선택</h3>
            <p>모든 문자 유형(소문자, 대문자, 숫자, 기호)을 포함하면 더 강력한 비밀번호가 됩니다.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 강도 확인</h3>
            <p>"강함"으로 표시될 때까지 설정을 조정하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 안전하게 저장</h3>
            <p>비밀번호 관리자를 사용하여 생성된 비밀번호를 안전하게 저장하세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
