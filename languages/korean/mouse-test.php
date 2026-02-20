<?php
/**
 * Korean Mouse Tester - 마우스 테스터
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = '마우스 테스터 - 무료 온라인 마우스 클릭 테스트';
$pageDescription = '마우스 버튼과 스크롤 휠을 무료로 테스트하세요. 왼쪽, 가운데, 오른쪽 클릭 및 스크롤 기능을 확인합니다.';
$pageKeywords = '마우스 테스터, 마우스 테스트, 클릭 테스트, 스크롤 테스트, 마우스 버튼 테스트';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-test.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/mouse-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-test.php'); ?>">

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
        "name": "온라인으로 마우스 버튼을 테스트하는 방법은?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "테스터 안을 클릭한 다음 왼쪽, 가운데, 오른쪽 버튼을 누르세요. 각 클릭은 카운터와 하이라이트를 업데이트합니다."
        }
      },
      {
        "@type": "Question",
        "name": "마우스 스크롤 휠을 테스트하는 방법은?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "위아래로 스크롤하고 방향 표시기와 카운트를 확인하여 휠 입력이 일관되는지 확인하세요."
        }
      },
      {
        "@type": "Question",
        "name": "더블 클릭 문제를 테스트할 수 있나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "네. 버튼을 빠르게 클릭하고 카운터에서 예상치 못한 추가 클릭이 있는지 확인하세요."
        }
      },
      {
        "@type": "Question",
        "name": "마우스 테스트는 비공개인가요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "모든 테스트는 브라우저에서 실행되며 데이터를 업로드하지 않습니다."
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
          <h1 id="hero-title">마우스 테스터</h1>
          <p class="hero-lede">마우스 버튼과 스크롤 휠을 실시간으로 테스트하세요. 모든 입력을 정확하게 확인합니다.</p>
          <div class="hero-ctas">
            <a href="#mouse-test" class="landing-btn landing-btn-primary">테스트 시작</a>
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
          <h2 id="tool-stage-title">마우스 테스터</h2>
          <p class="section-lede">아래 도구를 사용하여 클릭, 스크롤 및 상태를 확인하세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">빠른 팁 보기</a>
        </div>
      </div>
      <section id="mouse-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-test-tool.php'; ?>
      </section>
    </section>

    <!-- Trust Strip -->
    <section class="trust-strip" aria-label="주요 기능">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">버튼 정확도</div>
          <div class="trust-desc">왼쪽, 가운데, 오른쪽 클릭 추적</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">스크롤 상태</div>
          <div class="trust-desc">휠 방향 + 실시간 카운트</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">즉각적인 피드백</div>
          <div class="trust-desc">모든 동작에 대한 실시간 상태</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">로컬 실행</div>
          <div class="trust-desc">다운로드나 가입 불필요</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">마우스 진단</p>
          <h2 id="feature-title">마우스를 확인하는 데 필요한 모든 것</h2>
          <p class="section-lede">단일 패널에서 클릭, 스크롤 및 반응성을 확인하세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>버튼 테스트</h3>
            <p>정확한 카운터로 왼쪽, 가운데, 오른쪽 클릭을 추적합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>스크롤 진단</h3>
            <p>스크롤 휠 입력과 방향을 즉시 확인합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>상태 표시</h3>
            <p>각 입력에 대한 실시간 누름/해제 상태를 확인합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>원클릭 초기화</h3>
            <p>한 번의 동작으로 카운트를 지우고 다시 시작합니다.</p>
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
            <h2 id="process-title">마우스를 테스트하는 세 단계</h2>
          </div>
          <p class="section-lede">1분 이내에 전체 점검을 실행하고 모든 입력을 확인하세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>클릭하여 시작</h3>
            <p>왼쪽, 가운데, 오른쪽 클릭을 사용하여 반응을 확인합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>스크롤하여 테스트</h3>
            <p>휠을 돌려 방향과 카운트를 확인합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>초기화 및 반복</h3>
            <p>조정 후 카운터를 지우고 다시 테스트합니다.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'mouse-test'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">사용 가이드</p>
          <h2>마우스 테스터 사용 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 테스트 영역 클릭</h3>
            <p>캔버스 안에서 마우스 버튼을 클릭하여 테스트를 시작하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 모든 버튼 테스트</h3>
            <p>왼쪽, 가운데(휠), 오른쪽 버튼을 각각 테스트하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 스크롤 테스트</h3>
            <p>휠을 위아래로 스크롤하여 스크롤 기능을 확인하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 결과 확인</h3>
            <p>각 동작의 카운터와 상태를 확인하여 마우스가 정상인지 확인하세요.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
