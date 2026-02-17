<?php
/**
 * Japanese Webcam Tester - ウェブカメラテスター
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'ウェブカメラテスター - カメラ動作確認';
$pageDescription = 'ウェブカメラの動作、画質、設定を確認。オンラインでカメラをテストしましょう。';
$pageKeywords = 'ウェブカメラテスト, カメラテスト, カメラ確認, ビデオテスト, ウェブカメラ診断';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('webcamtesterindex.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/webcam-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('webcamtesterindex.php'); ?>">

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
        "name": "ウェブカメラをテストするには？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "「テスト開始」をクリックし、カメラへのアクセスを許可してください。映像が表示されれば正常に動作しています。"
        }
      },
      {
        "@type": "Question",
        "name": "カメラが検出されない場合は？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "カメラが正しく接続されているか確認し、ブラウザの設定でカメラアクセスが許可されているか確認してください。"
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
          <h1 id="hero-title">ウェブカメラテスター</h1>
          <p class="hero-lede">ウェブカメラの動作と画質を確認。オンラインでカメラをテスト。</p>
          <div class="hero-ctas">
            <a href="#webcam-test" class="landing-btn landing-btn-primary">テスト開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="webcam-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">ウェブカメラテスター</h2>
          <p class="section-lede">カメラアクセスを許可して映像を確認。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="webcam-test" class="tool-shell">
        <?php include __DIR__ . '/tools/webcam-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">映像確認</div>
          <div class="trust-desc">リアルタイムプレビュー</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">解像度表示</div>
          <div class="trust-desc">画質情報</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">デバイス選択</div>
          <div class="trust-desc">複数カメラ対応</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">プライバシー</div>
          <div class="trust-desc">ローカル処理</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">カメラ診断</p>
          <h2 id="feature-title">ウェブカメラを完全テスト</h2>
          <p class="section-lede">カメラの動作と画質を詳細に確認。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>映像プレビュー</h3>
            <p>リアルタイムで映像を確認。</p>
          </article>
          <article class="landing-feature-card">
            <h3>解像度表示</h3>
            <p>カメラの解像度を表示。</p>
          </article>
          <article class="landing-feature-card">
            <h3>デバイス切替</h3>
            <p>複数カメラを切り替え。</p>
          </article>
          <article class="landing-feature-card">
            <h3>スナップショット</h3>
            <p>画像をキャプチャして保存。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'webcam-test'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>ウェブカメラテストの方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. アクセス許可</h3>
            <p>カメラアクセスを許可。</p>
          </div>
          <div class="guideline-card">
            <h3>2. カメラ選択</h3>
            <p>使用するカメラを選択。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 映像確認</h3>
            <p>プレビューで確認。</p>
          </div>
          <div class="guideline-card">
            <h3>4. 画質チェック</h3>
            <p>解像度と品質を確認。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
