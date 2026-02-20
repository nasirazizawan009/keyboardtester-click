<?php
/**
 * Japanese Mouse Trail - マウストレイル
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'マウストレイル - カーソル追跡ゲーム';
$pageDescription = 'マウスカーソルを追跡する楽しいビジュアルエフェクト。マウスの動きを確認しながら遊べるツール。';
$pageKeywords = 'マウストレイル, カーソル追跡, マウスエフェクト, マウスゲーム, カーソルテスト';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/mouse-trail.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('mouse-trail.php'); ?>">

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
        "name": "マウストレイルとは何ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "マウストレイルは、カーソルの動きに追従するビジュアルエフェクトです。マウスの動きを視覚的に確認できます。"
        }
      },
      {
        "@type": "Question",
        "name": "どのように使いますか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "エリア内でマウスを動かすと、絵文字がカーソルを追いかけます。トレイルの種類を変更することもできます。"
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
          <h1 id="hero-title">マウストレイル</h1>
          <p class="hero-lede">カーソルを追跡する楽しいビジュアルエフェクト。マウスを動かして遊ぼう。</p>
          <div class="hero-ctas">
            <a href="#mouse-trail" class="landing-btn landing-btn-primary">開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-trail-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">マウストレイル</h2>
          <p class="section-lede">エリア内でマウスを動かしてみてください。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="mouse-trail" class="tool-shell">
        <?php include __DIR__ . '/tools/mouse-trail-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">トレイル効果</div>
          <div class="trust-desc">視覚エフェクト</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">カスタマイズ</div>
          <div class="trust-desc">多彩な種類</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">滑らかさ</div>
          <div class="trust-desc">スムーズ動作</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">楽しい</div>
          <div class="trust-desc">遊び心満載</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">ビジュアルエフェクト</p>
          <h2 id="feature-title">楽しいマウストレイル体験</h2>
          <p class="section-lede">様々なトレイルエフェクトを楽しもう。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>絵文字トレイル</h3>
            <p>楽しい絵文字が追いかける。</p>
          </article>
          <article class="landing-feature-card">
            <h3>種類選択</h3>
            <p>様々なトレイルタイプ。</p>
          </article>
          <article class="landing-feature-card">
            <h3>スムーズ</h3>
            <p>滑らかなアニメーション。</p>
          </article>
          <article class="landing-feature-card">
            <h3>マウス確認</h3>
            <p>動作も同時にテスト。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'mouse-trail'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>マウストレイルの遊び方</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. トレイル選択</h3>
            <p>好きなタイプを選ぶ。</p>
          </div>
          <div class="guideline-card">
            <h3>2. マウスを動かす</h3>
            <p>エリア内で動かす。</p>
          </div>
          <div class="guideline-card">
            <h3>3. エフェクト確認</h3>
            <p>追跡効果を楽しむ。</p>
          </div>
          <div class="guideline-card">
            <h3>4. カスタマイズ</h3>
            <p>別のタイプを試す。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
