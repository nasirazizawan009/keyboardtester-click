<?php
/**
 * Japanese DPI Tester - マウスDPIテスター
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'マウスDPIテスター - マウス感度を測定';
$pageDescription = 'マウスのDPI（ドット/インチ）を測定・確認。正確な感度設定のためのテストツール。';
$pageKeywords = 'DPIテスター, マウスDPI, マウス感度, DPI測定, マウス設定';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/dpi-tester.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>">

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
        "name": "DPIとは何ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "DPI（ドット/インチ）は、マウスを1インチ動かしたときにカーソルが移動するピクセル数を表します。"
        }
      },
      {
        "@type": "Question",
        "name": "ゲームに最適なDPIは？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "ゲームジャンルによりますが、FPSゲームでは400-800 DPI、MOBAでは800-1600 DPIが一般的です。"
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
          <h1 id="hero-title">マウスDPIテスター</h1>
          <p class="hero-lede">マウスのDPIを測定して最適な感度設定を見つけましょう。</p>
          <div class="hero-ctas">
            <a href="#dpi-test" class="landing-btn landing-btn-primary">テスト開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="dpi-tester-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">DPIテスター</h2>
          <p class="section-lede">マウスを動かしてDPIを計算。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="dpi-test" class="tool-shell">
        <?php include __DIR__ . '/tools/dpi-tester-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">DPI計算</div>
          <div class="trust-desc">正確な測定</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">感度分析</div>
          <div class="trust-desc">詳細データ</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">ゲーム向け</div>
          <div class="trust-desc">最適設定</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">即時結果</div>
          <div class="trust-desc">リアルタイム</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">感度測定</p>
          <h2 id="feature-title">マウスDPIを正確に把握</h2>
          <p class="section-lede">ゲームや作業に最適な設定を見つけましょう。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>DPI計算</h3>
            <p>正確なDPI値を測定。</p>
          </article>
          <article class="landing-feature-card">
            <h3>距離追跡</h3>
            <p>マウス移動距離を計測。</p>
          </article>
          <article class="landing-feature-card">
            <h3>設定推奨</h3>
            <p>最適なDPI設定を提案。</p>
          </article>
          <article class="landing-feature-card">
            <h3>詳細分析</h3>
            <p>移動データを分析。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'dpi-tester'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>DPIテストの方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 距離を設定</h3>
            <p>測定距離を入力。</p>
          </div>
          <div class="guideline-card">
            <h3>2. マウスを動かす</h3>
            <p>指定距離を移動。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 結果を確認</h3>
            <p>計算されたDPIを見る。</p>
          </div>
          <div class="guideline-card">
            <h3>4. 設定を調整</h3>
            <p>最適なDPIに変更。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
