<?php
/**
 * Japanese Latency Checker - レイテンシーチェッカー
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'レイテンシーチェッカー - 入力遅延を測定';
$pageDescription = 'マウスとキーボードの入力遅延（レイテンシー）を測定。システムの応答速度を確認しましょう。';
$pageKeywords = 'レイテンシーチェッカー, 入力遅延, 遅延測定, システム応答, 入力テスト';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('latency-checker.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/latency-checker.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('latency-checker.php'); ?>">

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
        "name": "入力レイテンシーとは何ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "入力レイテンシーとは、キーを押してから画面に反映されるまでの遅延時間のことです。"
        }
      },
      {
        "@type": "Question",
        "name": "低いレイテンシーは重要ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、特にゲームでは低いレイテンシーが反応速度に大きく影響します。"
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
          <h1 id="hero-title">レイテンシーチェッカー</h1>
          <p class="hero-lede">入力遅延を正確に測定。システムの応答速度を確認。</p>
          <div class="hero-ctas">
            <a href="#latency-test" class="landing-btn landing-btn-primary">テスト開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="latency-checker-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">レイテンシーチェッカー</h2>
          <p class="section-lede">クリックまたはキー入力でレイテンシーを測定。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="latency-test" class="tool-shell">
        <?php include __DIR__ . '/tools/latency-checker-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">遅延測定</div>
          <div class="trust-desc">ミリ秒単位</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">正確性</div>
          <div class="trust-desc">高精度計測</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">平均値</div>
          <div class="trust-desc">統計分析</div>
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
          <p class="section-kicker">遅延診断</p>
          <h2 id="feature-title">入力遅延を正確に把握</h2>
          <p class="section-lede">システムの応答性能を測定。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>遅延測定</h3>
            <p>正確な遅延時間を計測。</p>
          </article>
          <article class="landing-feature-card">
            <h3>平均計算</h3>
            <p>複数回の平均値を表示。</p>
          </article>
          <article class="landing-feature-card">
            <h3>履歴記録</h3>
            <p>測定履歴を保存。</p>
          </article>
          <article class="landing-feature-card">
            <h3>比較分析</h3>
            <p>結果を比較。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'latency-checker'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>レイテンシーテストの方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. テスト開始</h3>
            <p>開始ボタンをクリック。</p>
          </div>
          <div class="guideline-card">
            <h3>2. 合図を待つ</h3>
            <p>色の変化を待機。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 素早く反応</h3>
            <p>できるだけ速くクリック。</p>
          </div>
          <div class="guideline-card">
            <h3>4. 結果確認</h3>
            <p>遅延時間を確認。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
