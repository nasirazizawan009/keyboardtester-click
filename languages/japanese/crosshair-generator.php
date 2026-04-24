<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'クロスヘア・ジェネレーター - CS2・Valorant対応のカスタムクロスヘア';
$pageDescription = '無料オンラインのクロスヘア・ジェネレーター。ライブプレビューでカスタムクロスヘアを作成、PNGダウンロード、CS2コンソールコマンドやValorant設定値のコピーに対応。';
$pageKeywords = 'クロスヘア ジェネレーター, crosshair, CS2 クロスヘア, Valorant クロスヘア';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/crosshair-generator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('crosshair-generator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">クロスヘアツール</p>
        <h1 class="hero-title">クロスヘア・ジェネレーター - カスタムクロスヘア作成</h1>
        <p class="hero-lede">ライブプレビューでクロスヘアを作成。プロのプリセット（s1mple、TenZ）を使うか、形・色・太さ・長さ・ギャップ・ドット・アウトラインまですべて調整可能。透過PNGダウンロード、CS2コンソールコマンドコピーに対応。</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#crosshair-generator">ジェネレーターを開く</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">使い方</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">ライブプレビュー</span><span class="hero-badge">CS2コマンド</span><span class="hero-badge">Valorant値</span><span class="hero-badge">透過PNG</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="crosshair-generator">
      <div class="container tool-stage-header"><div><p class="section-kicker">メインツール</p><h2>クロスヘア・ジェネレーター</h2><p class="section-lede">パラメータを調整し、CS2・Valorant・PNGにエクスポート。</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/crosshair-generator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>クロスヘアの適用方法</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. プリセットを選ぶ</h3><p>プロプリセットから調整開始。</p></div>
        <div class="guideline-card"><h3>2. プレビューで調整</h3><p>形・色・アウトラインをリアルタイム。</p></div>
        <div class="guideline-card"><h3>3. エクスポート</h3><p>PNGまたはCS2コマンドをコピー。</p></div>
        <div class="guideline-card"><h3>4. ゲームに適用</h3><p>コンソール（~）に貼り付け、またはValorantに入力。</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
