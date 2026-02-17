<?php
/**
 * Japanese Mouse Tester - マウステスター
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'マウステスター - クリック＆スクロールテスト無料';
$pageDescription = 'マウスの全ボタン、スクロールホイール、カーソル移動をテスト。マウスの問題を即座に検出します。';
$pageKeywords = 'マウステスター, マウステスト, クリックテスト, スクロールテスト, マウスボタン確認';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-tester.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/mouse-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-tester.php'); ?>">

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
        "name": "マウスのボタンをテストするにはどうすればいいですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "テストエリアで各ボタンをクリックしてください。ツールがどのボタンが押されたかを検出して表示します。"
        }
      },
      {
        "@type": "Question",
        "name": "スクロールホイールもテストできますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、テストエリアで上下にスクロールしてホイールの機能を確認できます。"
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
          <h1 id="hero-title">マウステスター</h1>
          <p class="hero-lede">全ボタン、スクロールホイール、カーソル移動をテスト。問題を即座に検出。</p>
          <div class="hero-ctas">
            <a href="#mouse-test" class="landing-btn landing-btn-primary">テスト開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">マウステスター</h2>
          <p class="section-lede">テストエリアでクリックとスクロールを行ってください。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="mouse-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">全ボタン</div>
          <div class="trust-desc">左、右、中央</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">ホイール</div>
          <div class="trust-desc">上下スクロール</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">カウンター</div>
          <div class="trust-desc">クリック追跡</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">リアルタイム</div>
          <div class="trust-desc">即時レスポンス</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">完全診断</p>
          <h2 id="feature-title">マウスの全機能を確認</h2>
          <p class="section-lede">マウスをテストするためのプロ仕様ツール。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>ボタンテスト</h3>
            <p>左、右、中央ボタンを確認。</p>
          </article>
          <article class="landing-feature-card">
            <h3>スクロールホイール</h3>
            <p>スムーズなスクロールをテスト。</p>
          </article>
          <article class="landing-feature-card">
            <h3>クリックカウンター</h3>
            <p>クリック数を追跡。</p>
          </article>
          <article class="landing-feature-card">
            <h3>ライブ状態</h3>
            <p>即時の視覚フィードバック。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-test'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>マウスのテスト方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. ボタンをクリック</h3>
            <p>各マウスボタンをテスト。</p>
          </div>
          <div class="guideline-card">
            <h3>2. ホイールを使用</h3>
            <p>上下にスクロール。</p>
          </div>
          <div class="guideline-card">
            <h3>3. カーソルを移動</h3>
            <p>スムーズな動きを確認。</p>
          </div>
          <div class="guideline-card">
            <h3>4. 結果を確認</h3>
            <p>カウントと状態を見る。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
