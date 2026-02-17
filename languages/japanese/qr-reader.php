<?php
/**
 * Japanese QR Code Reader - QRコードリーダー
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'QRコードリーダー - 画像からQRコードを読み取り';
$pageDescription = '画像からQRコードを読み取り、デコードするツール。ブラウザ内でローカルに処理。';
$pageKeywords = 'QRコードリーダー, QRコードスキャナー, QRコード読み取り, QRデコード, QRコード解析';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('qr-code-reader.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/qr-reader.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('qr-code-reader.php'); ?>">

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
        "name": "QRコードを読み取るには？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "QRコードを含む画像をアップロードし、デコードボタンをクリックしてください。"
        }
      },
      {
        "@type": "Question",
        "name": "どの画像形式に対応していますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "PNG、JPG、GIF、BMPなど、一般的な画像形式に対応しています。"
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
          <h1 id="hero-title">QRコードリーダー</h1>
          <p class="hero-lede">画像からQRコードを読み取り、内容をデコード。プライバシーを保護したローカル処理。</p>
          <div class="hero-ctas">
            <a href="#qr-reader" class="landing-btn landing-btn-primary">読み取り開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="qr-reader-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">QRコードリーダー</h2>
          <p class="section-lede">QRコードを含む画像をアップロードしてデコード。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="qr-reader" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-reader-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">即時デコード</div>
          <div class="trust-desc">高速処理</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">多形式対応</div>
          <div class="trust-desc">PNG, JPG, GIF</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">ローカル処理</div>
          <div class="trust-desc">プライバシー保護</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">コピー機能</div>
          <div class="trust-desc">結果をコピー</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">QRコード読み取り</p>
          <h2 id="feature-title">画像からQRコードをデコード</h2>
          <p class="section-lede">アップロードした画像からQRコードの内容を抽出。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>画像アップロード</h3>
            <p>ドラッグ＆ドロップ対応。</p>
          </article>
          <article class="landing-feature-card">
            <h3>即座にデコード</h3>
            <p>高速なQRコード認識。</p>
          </article>
          <article class="landing-feature-card">
            <h3>テキスト抽出</h3>
            <p>URL、テキストを抽出。</p>
          </article>
          <article class="landing-feature-card">
            <h3>クリップボードコピー</h3>
            <p>結果を簡単にコピー。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-reader'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>QRコード読み取りの方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 画像選択</h3>
            <p>QRコード画像をアップロード。</p>
          </div>
          <div class="guideline-card">
            <h3>2. プレビュー確認</h3>
            <p>アップロードした画像を確認。</p>
          </div>
          <div class="guideline-card">
            <h3>3. デコード</h3>
            <p>デコードボタンをクリック。</p>
          </div>
          <div class="guideline-card">
            <h3>4. 結果をコピー</h3>
            <p>抽出された内容をコピー。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
