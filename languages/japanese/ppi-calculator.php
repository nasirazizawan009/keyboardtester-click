<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'PPI計算機 - 解像度から1インチあたりピクセルを算出';
$pageDescription = '無料のPPI計算機。解像度と対角サイズから、PPI、ドットピッチ、アスペクト比、総メガピクセル数を計算します。モニター・ノート・スマホのプリセット付き。';
$pageKeywords = 'PPI 計算機, ピクセル密度, モニター DPI, スクリーン 密度';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/ppi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('ppi-calculator.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">ディスプレイ計算機</p>
        <h1 class="hero-title">PPI計算機 - 1インチあたりピクセル</h1>
        <p class="hero-lede">解像度と対角サイズを入力すると、PPI、ドットピッチ、アスペクト比、総メガピクセルを即時算出。モニター・ノート・スマホのプリセット付き。</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#ppi-calculator">PPIを計算</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">使い方</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">PPI + ドットピッチ</span><span class="hero-badge">アスペクト比</span><span class="hero-badge">Retina</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="ppi-calculator">
      <div class="container tool-stage-header"><div><p class="section-kicker">メインツール</p><h2>PPI計算機</h2><p class="section-lede">解像度 + 対角 → 瞬時にPPI。</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/ppi-calculator-tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
