<?php
/**
 * Japanese OCR Tool - OCRツール
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'OCRツール - 画像からテキストを抽出';
$pageDescription = '画像からテキストを抽出するOCR（光学文字認識）ツール。日本語と英語に対応。';
$pageKeywords = 'OCR, 文字認識, 画像からテキスト, テキスト抽出, 光学文字認識';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/ocr-tool.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('ocr-tool.php'); ?>">

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
        "name": "OCRとは何ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "OCR（光学文字認識）は、画像内のテキストを認識してデジタルテキストに変換する技術です。"
        }
      },
      {
        "@type": "Question",
        "name": "日本語も認識できますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、このツールは日本語と英語の両方を認識できます。"
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
          <h1 id="hero-title">OCRツール</h1>
          <p class="hero-lede">画像からテキストを抽出。日本語と英語に対応したOCRツール。</p>
          <div class="hero-ctas">
            <a href="#ocr-tool" class="landing-btn landing-btn-primary">開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="ocr-tool-section" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">OCRツール</h2>
          <p class="section-lede">画像をアップロードしてテキストを抽出。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="ocr-tool" class="tool-shell">
        <?php include __DIR__ . '/tools/ocr-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">日本語対応</div>
          <div class="trust-desc">高精度認識</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">英語対応</div>
          <div class="trust-desc">多言語サポート</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">高速処理</div>
          <div class="trust-desc">即座に抽出</div>
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
          <p class="section-kicker">文字認識</p>
          <h2 id="feature-title">画像からテキストを抽出</h2>
          <p class="section-lede">高精度なOCR技術で文字を認識。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>日本語認識</h3>
            <p>日本語テキストを正確に抽出。</p>
          </article>
          <article class="landing-feature-card">
            <h3>多言語対応</h3>
            <p>英語も同時に認識可能。</p>
          </article>
          <article class="landing-feature-card">
            <h3>高精度</h3>
            <p>Tesseract.jsによる認識。</p>
          </article>
          <article class="landing-feature-card">
            <h3>簡単操作</h3>
            <p>ドラッグ＆ドロップ対応。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'ocr-tool'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>OCRツールの使い方</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 画像アップロード</h3>
            <p>テキストを含む画像を選択。</p>
          </div>
          <div class="guideline-card">
            <h3>2. 言語選択</h3>
            <p>日本語か英語を選択。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 認識開始</h3>
            <p>抽出ボタンをクリック。</p>
          </div>
          <div class="guideline-card">
            <h3>4. テキストコピー</h3>
            <p>抽出結果をコピー。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
