<?php
/**
 * Japanese Ghost Click Detector - ゴーストクリック検出器
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'ゴーストクリック検出器 - マウスの誤クリックを検出';
$pageDescription = 'マウスのゴーストクリック（誤クリック）を検出。意図しないクリックの問題を診断するツール。';
$pageKeywords = 'ゴーストクリック, マウス診断, 誤クリック検出, マウス問題, ダブルクリック問題';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ghost-click-detector.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/ghost-click.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ghost-click-detector.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "ゴーストクリックとは何ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "ゴーストクリックとは、1回クリックしたのに複数回クリックとして認識される、またはクリックしていないのにクリックが発生する現象です。"
        }
      },
      {
        "@type": "Question",
        "name": "ゴーストクリックの原因は？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "主な原因は、マウスのスイッチの劣化、静電気、ドライバーの問題などです。"
        }
      }
    ]
  }
  </script>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/header-ja.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="hero" aria-labelledby="hero-title">
      <div class="container hero-grid">
        <div class="hero-content">
          <h1 id="hero-title">ゴーストクリック検出器</h1>
          <p class="hero-lede">マウスの誤クリックを検出して問題を診断。ダブルクリック問題を特定。</p>
          <div class="hero-ctas">
            <a href="#ghost-click-test" class="landing-btn landing-btn-primary">テスト開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="ghost-click-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">ゴーストクリック検出器</h2>
          <p class="section-lede">クリックして誤検出を確認。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="ghost-click-test" class="tool-shell">
        <?php include __DIR__ . '/tools/ghost-click-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">誤クリック検出</div>
          <div class="trust-desc">正確な診断</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">時間計測</div>
          <div class="trust-desc">クリック間隔</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">ログ記録</div>
          <div class="trust-desc">詳細履歴</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">問題特定</div>
          <div class="trust-desc">原因分析</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">マウス診断</p>
          <h2 id="feature-title">ゴーストクリックを特定</h2>
          <p class="section-lede">マウスの問題を正確に診断。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>誤クリック検出</h3>
            <p>意図しないクリックを検知。</p>
          </article>
          <article class="landing-feature-card">
            <h3>間隔測定</h3>
            <p>クリック間の時間を計測。</p>
          </article>
          <article class="landing-feature-card">
            <h3>履歴ログ</h3>
            <p>全クリックを記録。</p>
          </article>
          <article class="landing-feature-card">
            <h3>診断レポート</h3>
            <p>問題の詳細を表示。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ghost-click'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>ゴーストクリックのテスト方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. テスト開始</h3>
            <p>検出を開始。</p>
          </div>
          <div class="guideline-card">
            <h3>2. クリックする</h3>
            <p>通常通りクリック。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 結果を確認</h3>
            <p>検出結果を見る。</p>
          </div>
          <div class="guideline-card">
            <h3>4. 問題を特定</h3>
            <p>誤クリックを確認。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
