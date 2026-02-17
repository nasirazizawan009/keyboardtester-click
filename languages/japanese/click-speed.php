<?php
/**
 * Japanese Click Speed Test - クリック速度テスト
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'クリック速度テスト - CPS（毎秒クリック数）を測定';
$pageDescription = 'マウスのクリック速度を測定。CPS（毎秒クリック数）を計測して、あなたのクリック速度を確認しましょう。';
$pageKeywords = 'クリック速度テスト, CPSテスト, クリックスピード, マウスクリック測定, クリックカウンター';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-test.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/click-speed.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-test.php'); ?>">

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
        "name": "CPSとは何ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPSはClicks Per Second（毎秒クリック数）の略で、1秒間にどれだけ速くクリックできるかを測定します。"
        }
      },
      {
        "@type": "Question",
        "name": "平均的なCPSはどれくらいですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "平均的なCPSは6〜8程度です。プロゲーマーは10以上のCPSを達成することもあります。"
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
          <h1 id="hero-title">クリック速度テスト</h1>
          <p class="hero-lede">CPSを測定してあなたのクリック速度を確認。ゲーマー向けの正確な測定ツール。</p>
          <div class="hero-ctas">
            <a href="#click-speed-test" class="landing-btn landing-btn-primary">テスト開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="click-speed-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">クリック速度テスト</h2>
          <p class="section-lede">できるだけ速くクリックしてCPSを測定。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="click-speed-test" class="tool-shell">
        <?php include __DIR__ . '/tools/click-speed-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">CPS測定</div>
          <div class="trust-desc">毎秒クリック数</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">正確性</div>
          <div class="trust-desc">精密な計測</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">タイマー</div>
          <div class="trust-desc">時間選択可能</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">統計</div>
          <div class="trust-desc">結果分析</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">速度テスト</p>
          <h2 id="feature-title">クリック速度を向上させよう</h2>
          <p class="section-lede">あなたのクリック能力を測定・分析。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>CPS計測</h3>
            <p>正確なクリック速度を測定。</p>
          </article>
          <article class="landing-feature-card">
            <h3>時間設定</h3>
            <p>テスト時間をカスタマイズ。</p>
          </article>
          <article class="landing-feature-card">
            <h3>記録追跡</h3>
            <p>ベストスコアを保存。</p>
          </article>
          <article class="landing-feature-card">
            <h3>即時結果</h3>
            <p>リアルタイムでフィードバック。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'click-speed'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>クリック速度テストの方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 時間を選択</h3>
            <p>テスト時間を設定。</p>
          </div>
          <div class="guideline-card">
            <h3>2. クリック開始</h3>
            <p>エリアをクリック。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 速くクリック</h3>
            <p>できるだけ速く。</p>
          </div>
          <div class="guideline-card">
            <h3>4. 結果確認</h3>
            <p>CPSを確認。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
