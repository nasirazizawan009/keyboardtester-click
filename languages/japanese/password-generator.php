<?php
/**
 * Japanese Password Generator - パスワード生成器
 */
include __DIR__ . '/../../config.php';
include __DIR__ . '/config-ja.php';

$pageTitle = 'パスワード生成器 - 安全なパスワードを生成';
$pageDescription = '強力で安全なパスワードを無料で自動生成。長さや文字種類（大文字・小文字・数字・記号）をカスタマイズして、あらゆるサービスに対応したセキュアなパスワードを作成できます。';
$pageKeywords = 'パスワード生成, パスワードジェネレーター, 安全なパスワード, パスワード作成, セキュリティ';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('auto-password-generator.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/password-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('auto-password-generator.php'); ?>">

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
        "name": "強いパスワードとは？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "強いパスワードは12文字以上で、大文字、小文字、数字、記号を含むものです。"
        }
      },
      {
        "@type": "Question",
        "name": "生成されたパスワードは安全ですか？",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "はい、パスワードはブラウザ内でローカルに生成され、サーバーに送信されることはありません。"
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
          <h1 id="hero-title">パスワード生成器</h1>
          <p class="hero-lede">強力で安全なパスワードを即座に生成。カスタマイズ可能なオプション。</p>
          <div class="hero-ctas">
            <a href="#password-generator" class="landing-btn landing-btn-primary">生成開始</a>
            <a href="#guidelines" class="landing-btn landing-btn-ghost">使い方</a>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="password-generator-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2 id="tool-stage-title">パスワード生成器</h2>
          <p class="section-lede">オプションを選択してパスワードを生成。</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">ヒントを見る</a>
        </div>
      </div>
      <section id="password-generator" class="tool-shell">
        <?php include __DIR__ . '/tools/password-generator-tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="主な機能">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">高セキュリティ</div>
          <div class="trust-desc">強力な暗号化</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">カスタマイズ</div>
          <div class="trust-desc">柔軟な設定</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">ローカル生成</div>
          <div class="trust-desc">プライバシー保護</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">即時生成</div>
          <div class="trust-desc">ワンクリック</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">セキュリティ</p>
          <h2 id="feature-title">安全なパスワードを生成</h2>
          <p class="section-lede">あなたのアカウントを保護する強力なパスワード。</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>長さ調整</h3>
            <p>8〜64文字で設定可能。</p>
          </article>
          <article class="landing-feature-card">
            <h3>文字種類</h3>
            <p>大文字、小文字、数字、記号。</p>
          </article>
          <article class="landing-feature-card">
            <h3>強度表示</h3>
            <p>パスワードの強さを表示。</p>
          </article>
          <article class="landing-feature-card">
            <h3>コピー機能</h3>
            <p>ワンクリックでコピー。</p>
          </article>
        </div>
      </div>
    </section>

    <?php $currentTool = 'password-generator'; include __DIR__ . '/sections/tools-list-ja.php'; ?>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">使用ガイド</p>
          <h2>パスワード生成の方法</h2>
        </div>
        <div class="guidelines-grid">
          <div class="guideline-card">
            <h3>1. 長さを選択</h3>
            <p>希望の文字数を設定。</p>
          </div>
          <div class="guideline-card">
            <h3>2. 文字種を選択</h3>
            <p>含める文字種類を選択。</p>
          </div>
          <div class="guideline-card">
            <h3>3. 生成ボタン</h3>
            <p>パスワードを生成。</p>
          </div>
          <div class="guideline-card">
            <h3>4. コピーして使用</h3>
            <p>生成されたパスワードをコピー。</p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/footer-ja.php'; ?>
</body>
</html>
