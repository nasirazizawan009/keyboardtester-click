<?php
/**
 * Korean Mouse Trail - 마우스 트레일
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ko.php';

$pageTitle = '마우스 트레일 - 이모지 트레일 어드벤처';
$pageDescription = '재미있는 이모지 트레일 게임을 즐겨보세요. 마우스를 움직여 다양한 이모지로 트레일을 만들 수 있습니다.';
$pageKeywords = '마우스 트레일, 이모지 게임, 마우스 게임, 트레일 만들기, 재미있는 게임';
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="ko" href="<?php echo url('languages/korean/mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-trail.php'); ?>">

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
        "name": "이모지 트레일 게임은 어떻게 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "게임 영역 위에서 마우스를 움직이면 이모지 트레일이 생성됩니다. 드롭다운 메뉴에서 원하는 이모지를 선택할 수 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "트레일을 지우려면 어떻게 하나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "'트레일 지우기' 버튼을 클릭하면 모든 트레일이 지워지고 새로 시작할 수 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "어떤 이모지를 사용할 수 있나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "반짝임, 불, 별, 태양, 달, 하트, 번개, 눈송이, 로켓, 무지개 등 10가지 이모지를 선택할 수 있습니다."
        }
      },
      {
        "@type": "Question",
        "name": "모바일에서도 사용할 수 있나요?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "이 게임은 마우스 움직임을 기반으로 하므로 데스크톱에서 가장 잘 작동합니다. 모바일에서는 터치 움직임으로 제한된 기능을 사용할 수 있습니다."
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
          <h1 id="hero-title">이모지 트레일 어드벤처</h1>
          <p class="hero-lede">마우스를 움직여 재미있는 이모지 트레일을 만들어보세요. 다양한 이모지로 창의적인 패턴을 그릴 수 있습니다.</p>
          <div class="hero-ctas">
            <a href="#trail-game" class="landing-btn landing-btn-primary">게임 시작</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">게임 방법</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Tool Section -->
    <section class="tool-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">게임</p>
          <h2 id="tool-stage-title">이모지 트레일 어드벤처</h2>
          <p class="section-lede">아래 게임 영역에서 마우스를 움직여보세요.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">게임 팁 보기</a>
        </div>
      </div>
      <section id="trail-game" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-trail-tool.php'; ?>
      </section>
    </section>

    <!-- Trust Strip -->
    <section class="trust-strip" aria-label="주요 기능">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">다양한 이모지</div>
          <div class="trust-desc">10가지 선택</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">실시간 생성</div>
          <div class="trust-desc">즉각적인 트레일</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">브라우저 기반</div>
          <div class="trust-desc">설치 불필요</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">간단한 조작</div>
          <div class="trust-desc">마우스만 사용</div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">재미있는 게임</p>
          <h2 id="feature-title">이모지 트레일로 즐기는 창의적인 경험</h2>
          <p class="section-lede">마우스를 움직여 다양한 패턴과 디자인을 만들어보세요.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>다양한 이모지</h3>
            <p>반짝임, 불, 별, 하트 등 10가지 이모지를 선택할 수 있습니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>실시간 피드백</h3>
            <p>마우스 움직임에 따라 즉시 트레일이 생성됩니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>간편한 초기화</h3>
            <p>버튼 하나로 트레일을 지우고 다시 시작합니다.</p>
          </article>
          <article class="landing-feature-card">
            <h3>점수 시스템</h3>
            <p>움직임 패턴에 따라 점수가 계산됩니다.</p>
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
            <h2 id="process-title">게임을 즐기는 세 단계</h2>
          </div>
          <p class="section-lede">아래의 간단한 단계를 따라 이모지 트레일을 만들어보세요.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>이모지 선택</h3>
            <p>드롭다운 메뉴에서 원하는 이모지를 선택합니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>마우스 움직이기</h3>
            <p>게임 영역에서 마우스를 움직여 트레일을 만듭니다.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>창의적 패턴 만들기</h3>
            <p>다양한 패턴과 디자인을 만들어보세요.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Tools List -->
    <?php $currentTool = 'mouse-trail'; include __DIR__ . '/sections/tools-list-ko.php'; ?>

    <!-- Guidelines -->
    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">게임 가이드</p>
          <h2>이모지 트레일 게임 방법</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 이모지 선택</h3>
            <p>드롭다운 메뉴에서 반짝임, 불, 별 등 원하는 이모지를 선택하세요.</p>
          </div>
          <div class="guideline-card">
            <h3>2. 트레일 만들기</h3>
            <p>게임 영역 위에서 마우스를 움직이면 선택한 이모지로 트레일이 생성됩니다.</p>
          </div>
          <div class="guideline-card">
            <h3>3. 점수 확인</h3>
            <p>움직임 패턴에 따라 점수가 계산됩니다. 원이나 지그재그로 높은 점수를 얻으세요.</p>
          </div>
          <div class="guideline-card">
            <h3>4. 다시 시작</h3>
            <p>"트레일 지우기" 버튼을 클릭하면 모든 트레일이 지워지고 새로 시작할 수 있습니다.</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ko.php'; ?>
</body>
</html>
