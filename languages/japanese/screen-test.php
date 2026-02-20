<?php
/**
 * Japanese Screen Tester - スクリーンテスター
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'スクリーンテスター - ドット抜け＆画面チェック';
$pageDescription = 'モニターのドット抜け、色むら、画面の問題を検出。様々な色でスクリーンをテスト。';
$pageKeywords = 'スクリーンテスト, ドット抜け, デッドピクセル, モニターテスト, 画面チェック';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('screentestindex.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/screen-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('screentestindex.php'); ?>">

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
        "name": "ドット抜けとは何ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "ドット抜け（デッドピクセル）は、モニター上で正常に表示されないピクセルのことです。常に点灯、消灯、または固定色で表示されます。"
        }
      },
      {
        "@type": "Question",
        "name": "どうやってドット抜けを見つけますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "様々な単色の背景で画面全体を表示し、異常なピクセルがないか確認します。"
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
          <h1 id="hero-title">スクリーンテスター</h1>
          <p class="hero-lede">モニターのドット抜けや色むらを検出。様々な色でスクリーンをチェック。</p>
          <div class="hero-ctas">
            <a href="#screen-test" class="landing-btn landing-btn-primary">テスト開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="screen-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">スクリーンテスター</h2>
          <p class="section-lede">色を選択して画面全体をテスト。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="screen-test" class="tool-shell">
        <?php include __DIR__ . '/tools/screen-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">ドット抜け検出</div>
          <div class="trust-desc">デッドピクセル確認</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">色テスト</div>
          <div class="trust-desc">RGB各色チェック</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">全画面</div>
          <div class="trust-desc">画面全体表示</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">簡単操作</div>
          <div class="trust-desc">ワンクリック</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">画面診断</p>
          <h2 id="feature-title">モニターの問題を検出</h2>
          <p class="section-lede">ドット抜けや色の問題を見つけましょう。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>単色テスト</h3>
            <p>赤、緑、青、白、黒でテスト。</p>
          </article>
          <article class="landing-feature-card">
            <h3>全画面表示</h3>
            <p>画面全体を単色で表示。</p>
          </article>
          <article class="landing-feature-card">
            <h3>ドット抜け検出</h3>
            <p>異常なピクセルを発見。</p>
          </article>
          <article class="landing-feature-card">
            <h3>色むらチェック</h3>
            <p>均一性を確認。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'screen-test'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>スクリーンテストの方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 色を選択</h3>
            <p>テストする色を選択。</p>
          </div>
          <div class="guideline-card">
            <h3>2. 全画面表示</h3>
            <p>全画面ボタンをクリック。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 画面を確認</h3>
            <p>異常なピクセルを探す。</p>
          </div>
          <div class="guideline-card">
            <h3>4. 各色でテスト</h3>
            <p>複数の色で確認。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
