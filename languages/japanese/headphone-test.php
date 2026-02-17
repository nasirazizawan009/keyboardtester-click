<?php
/**
 * Japanese Headphone/Speaker Tester - ヘッドホン・スピーカーテスター
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'ヘッドホン・スピーカーテスター - オーディオ出力を確認';
$pageDescription = 'ヘッドホンとスピーカーの左右チャンネル、音質、周波数応答をテスト。オーディオ出力を確認しましょう。';
$pageKeywords = 'ヘッドホンテスト, スピーカーテスト, オーディオテスト, 左右チャンネル, 音質確認';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('headphone_speaker_tester_index.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/headphone-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('headphone_speaker_tester_index.php'); ?>">

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
        "name": "ヘッドホンの左右を確認するには？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "左チャンネルと右チャンネルのテストボタンを押して、音が正しい側から聞こえるか確認してください。"
        }
      },
      {
        "@type": "Question",
        "name": "スピーカーもテストできますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、ヘッドホンだけでなくスピーカーのテストにも使用できます。"
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
          <h1 id="hero-title">ヘッドホン・スピーカーテスター</h1>
          <p class="hero-lede">オーディオ出力の左右チャンネルと音質をテスト。</p>
          <div class="hero-ctas">
            <a href="#headphone-test" class="landing-btn landing-btn-primary">テスト開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="headphone-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">オーディオテスター</h2>
          <p class="section-lede">左右チャンネルを個別にテスト。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="headphone-test" class="tool-shell">
        <?php include __DIR__ . '/tools/headphone-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">左右テスト</div>
          <div class="trust-desc">チャンネル確認</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">周波数テスト</div>
          <div class="trust-desc">音域確認</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">ステレオ</div>
          <div class="trust-desc">バランス確認</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">即時再生</div>
          <div class="trust-desc">ワンクリック</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">オーディオ診断</p>
          <h2 id="feature-title">オーディオ出力を完全テスト</h2>
          <p class="section-lede">ヘッドホンとスピーカーの全機能を確認。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>左右チャンネル</h3>
            <p>ステレオ出力を確認。</p>
          </article>
          <article class="landing-feature-card">
            <h3>周波数テスト</h3>
            <p>様々な周波数をテスト。</p>
          </article>
          <article class="landing-feature-card">
            <h3>バランス確認</h3>
            <p>左右のバランスを確認。</p>
          </article>
          <article class="landing-feature-card">
            <h3>音質診断</h3>
            <p>オーディオ品質をテスト。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'headphone-test'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>オーディオテストの方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 接続確認</h3>
            <p>デバイスを接続。</p>
          </div>
          <div class="guideline-card">
            <h3>2. 左チャンネル</h3>
            <p>左側の音を確認。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 右チャンネル</h3>
            <p>右側の音を確認。</p>
          </div>
          <div class="guideline-card">
            <h3>4. 周波数テスト</h3>
            <p>様々な音域を確認。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
