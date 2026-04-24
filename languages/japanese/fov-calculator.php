<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'FoV計算機 - ゲーム間で視野角を変換';
$pageDescription = '無料のFoV計算機。4:3・16:9・21:9・32:9の間で水平・垂直・対角視野角を変換。CS2、Valorant、Apex、CoD、Fortnite向けプリセット付き。';
$pageKeywords = 'FoV 計算機, 視野角, hfov vfov, fov cs2, fov apex';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/fov-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('fov-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">ゲーム感度計算機</p>
        <h1 class="hero-title">FoV計算機 - 視野角を変換</h1>
        <p class="hero-lede">4:3・16:9・21:9・32:9の間で水平・垂直・対角視野角を変換。CS2、Valorant、Apex、CoD、Fortnite向けプリセットで、ゲームやモニターを変えても同じ垂直の感覚を維持できます。</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#fov-calculator">FoVを変換</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">使い方</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">H / V / 対角</span><span class="hero-badge">全アスペクト比</span><span class="hero-badge">ゲームプリセット</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="fov-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">メインツール</p><h2>FoV計算機</h2><p class="section-lede">プリセットを選ぶか、FoVとアスペクト比を入力。</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/fov-calculator-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>FoVの変換手順</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. ゲームを選ぶ</h3><p>プリセットが形式と比率を設定。</p></div>
        <div class="guideline-card"><h3>2. FoVを入力</h3><p>現在の値を入力。</p></div>
        <div class="guideline-card"><h3>3. 表を読む</h3><p>形式・比率ごとの等価FoV。</p></div>
        <div class="guideline-card"><h3>4. 新しいゲームへ</h3><p>値をコピーして設定。</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
