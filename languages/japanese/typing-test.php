<?php
/**
 * Japanese Typing Test - タイピング速度テスト
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'タイピング速度テスト - WPMを測定';
$pageDescription = 'タイピング速度と精度を測定。WPM（1分間の単語数）であなたのタイピングスキルを確認。';
$pageKeywords = 'タイピングテスト, タイピング速度, WPM測定, タイピング練習, キーボードテスト';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo url('keyboard_typing_test.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo url('languages/japanese/typing-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo url('keyboard_typing_test.php'); ?>">

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
        "name": "WPMとは何ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "WPM（Words Per Minute）は、1分間に入力できる単語数を表すタイピング速度の指標です。"
        }
      },
      {
        "@type": "Question",
        "name": "平均的なタイピング速度は？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "一般的な平均は40-50 WPMです。プロのタイピストは80 WPM以上を達成します。"
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
          <h1 id="hero-title">タイピング速度テスト</h1>
          <p class="hero-lede">タイピング速度と精度を測定。あなたのWPMを確認しましょう。</p>
          <div class="hero-ctas">
            <a href="#typing-test" class="landing-btn landing-btn-primary">テスト開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="typing-test-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">タイピングテスト</h2>
          <p class="section-lede">表示されるテキストをできるだけ速く正確に入力。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="typing-test" class="tool-shell">
        <?php include __DIR__ . '/tools/typing-test-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">WPM測定</div>
          <div class="trust-desc">速度を計測</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">精度表示</div>
          <div class="trust-desc">正確性を確認</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">難易度選択</div>
          <div class="trust-desc">レベル調整可能</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">即時結果</div>
          <div class="trust-desc">リアルタイム表示</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">タイピング練習</p>
          <h2 id="feature-title">タイピングスキルを向上</h2>
          <p class="section-lede">速度と精度を測定して上達を目指そう。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>速度測定</h3>
            <p>WPMで速度を表示。</p>
          </article>
          <article class="landing-feature-card">
            <h3>精度計算</h3>
            <p>正確性をパーセントで表示。</p>
          </article>
          <article class="landing-feature-card">
            <h3>難易度設定</h3>
            <p>簡単、普通、難しいを選択。</p>
          </article>
          <article class="landing-feature-card">
            <h3>時間設定</h3>
            <p>テスト時間を選択。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'typing-test'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>タイピングテストの方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 設定を選択</h3>
            <p>難易度と時間を選ぶ。</p>
          </div>
          <div class="guideline-card">
            <h3>2. テスト開始</h3>
            <p>開始ボタンをクリック。</p>
          </div>
          <div class="guideline-card">
            <h3>3. テキスト入力</h3>
            <p>表示文を入力。</p>
          </div>
          <div class="guideline-card">
            <h3>4. 結果確認</h3>
            <p>WPMと精度を確認。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
