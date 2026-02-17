<?php
/**
 * Japanese QR Code Generator - QRコード生成器
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'QRコード生成器 - 無料でQRコードを作成';
$pageDescription = 'テキストやURLからQRコードを無料で生成。カスタマイズ可能なサイズでダウンロード可能。';
$pageKeywords = 'QRコード生成, QRコード作成, QRコードメーカー, QRコードジェネレーター, 無料QRコード';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('QR_code_generator_scanner.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/qr-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('QR_code_generator_scanner.php'); ?>">

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
        "name": "QRコードとは何ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "QRコード（Quick Response Code）は、スマートフォンなどでスキャンして情報を読み取れる二次元バーコードです。"
        }
      },
      {
        "@type": "Question",
        "name": "生成したQRコードは保存できますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、生成したQRコードはPNG形式でダウンロードできます。"
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
          <h1 id="hero-title">QRコード生成器</h1>
          <p class="hero-lede">テキストやURLからQRコードを即座に生成。無料でダウンロード可能。</p>
          <div class="hero-ctas">
            <a href="#qr-generator" class="landing-btn landing-btn-primary">生成開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="qr-generator-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">QRコード生成器</h2>
          <p class="section-lede">テキストまたはURLを入力してQRコードを生成。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="qr-generator" class="tool-shell">
        <?php include __DIR__ . '/tools/qr-generator-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">即時生成</div>
          <div class="trust-desc">ワンクリック</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">サイズ選択</div>
          <div class="trust-desc">カスタマイズ可能</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">ダウンロード</div>
          <div class="trust-desc">PNG形式</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">無料</div>
          <div class="trust-desc">制限なし</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">QRコード作成</p>
          <h2 id="feature-title">簡単にQRコードを生成</h2>
          <p class="section-lede">テキスト、URL、その他の情報をQRコードに変換。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>URL変換</h3>
            <p>WebサイトURLをQRコードに。</p>
          </article>
          <article class="landing-feature-card">
            <h3>テキスト変換</h3>
            <p>任意のテキストをエンコード。</p>
          </article>
          <article class="landing-feature-card">
            <h3>サイズ調整</h3>
            <p>用途に合わせたサイズ。</p>
          </article>
          <article class="landing-feature-card">
            <h3>即座にダウンロード</h3>
            <p>生成後すぐに保存。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'qr-generator'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>QRコード生成の方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. テキスト入力</h3>
            <p>URLまたはテキストを入力。</p>
          </div>
          <div class="guideline-card">
            <h3>2. サイズ選択</h3>
            <p>希望のサイズを選択。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 生成ボタン</h3>
            <p>QRコードを生成。</p>
          </div>
          <div class="guideline-card">
            <h3>4. ダウンロード</h3>
            <p>PNGとして保存。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
