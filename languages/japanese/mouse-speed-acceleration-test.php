<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'マウスアクセラレーションテスト - 遅い振り vs 速い振り';
$pageDescription = '無料のマウスアクセラレーションテスト。同じ物理距離をゆっくり・速くスワイプしたピクセル数を比較し、Windowsポインタ加速や内部ファームウェア加速を検出します。';
$pageKeywords = 'マウス アクセラレーション テスト, Windows ポインタ加速, mouse acceleration test';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/mouse-speed-acceleration-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-speed-acceleration-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">マウス診断</p>
        <h1 class="hero-title">マウスアクセラレーションテスト</h1>
        <p class="hero-lede">Windowsやマウスのファームウェアが気づかぬうちに加速を加え、エイムの一貫性を崩していませんか？同じ物理距離をゆっくり・速く振って、速度でピクセル数が増えれば加速オン。正確な「速/遅」比を表示します。</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-accel-test">テスト開始</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">使い方</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">ピクセル単位</span><span class="hero-badge">比率で判定</span><span class="hero-badge">インストール不要</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-accel-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">メインツール</p><h2>マウスアクセラレーションテスト</h2><p class="section-lede">同じ距離をゆっくり→素早く。</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-accel-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>加速の検出手順</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. ゆっくり</h3><p>約2秒。</p></div>
        <div class="guideline-card"><h3>2. 素早く</h3><p>同距離を0.5秒以内。</p></div>
        <div class="guideline-card"><h3>3. 比率を読む</h3><p>1.00 = 完璧、&gt;1.15 = 加速。</p></div>
        <div class="guideline-card"><h3>4. 無効化</h3><p>「ポインタの精度を高める」をオフ。</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
