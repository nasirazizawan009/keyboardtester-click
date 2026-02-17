<?php
/**
 * Japanese Mic Tester - マイクテスター
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'マイクテスター - マイク入力を確認';
$pageDescription = 'マイクの入力レベル、音質、動作を確認。オンラインでマイクをテストしましょう。';
$pageKeywords = 'マイクテスター, マイクテスト, マイク確認, オーディオ入力, マイク診断';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mic-tester.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/mic-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mic-tester.php'); ?>">

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
        "name": "マイクをテストするには？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "「テスト開始」ボタンをクリックし、マイクへのアクセスを許可してから話しかけてください。"
        }
      },
      {
        "@type": "Question",
        "name": "マイクが検出されない場合は？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "マイクが正しく接続されているか確認し、ブラウザの設定でマイクアクセスが許可されているか確認してください。"
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
          <h1 id="hero-title">マイクテスター</h1>
          <p class="hero-lede">マイクの入力レベルと音質をオンラインでテスト。</p>
          <div class="hero-ctas">
            <a href="#mic-test" class="landing-btn landing-btn-primary">テスト開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mic-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">マイクテスター</h2>
          <p class="section-lede">マイクに話しかけて入力を確認。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="mic-test" class="tool-shell">
        <?php include __DIR__ . '/tools/mic-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">入力レベル</div>
          <div class="trust-desc">リアルタイム表示</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">音質確認</div>
          <div class="trust-desc">クリアな音声</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">デバイス選択</div>
          <div class="trust-desc">複数マイク対応</div>
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
          <p class="section-kicker">オーディオ入力</p>
          <h2 id="feature-title">マイク機能を完全テスト</h2>
          <p class="section-lede">マイクの性能を詳細に確認。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>入力レベル</h3>
            <p>音量レベルを視覚化。</p>
          </article>
          <article class="landing-feature-card">
            <h3>波形表示</h3>
            <p>リアルタイム波形を表示。</p>
          </article>
          <article class="landing-feature-card">
            <h3>デバイス選択</h3>
            <p>使用するマイクを選択。</p>
          </article>
          <article class="landing-feature-card">
            <h3>録音テスト</h3>
            <p>録音して再生確認。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mic-test'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>マイクテストの方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. アクセス許可</h3>
            <p>マイクアクセスを許可。</p>
          </div>
          <div class="guideline-card">
            <h3>2. マイク選択</h3>
            <p>使用するデバイスを選択。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 話しかける</h3>
            <p>マイクに向かって話す。</p>
          </div>
          <div class="guideline-card">
            <h3>4. レベル確認</h3>
            <p>入力レベルを確認。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
