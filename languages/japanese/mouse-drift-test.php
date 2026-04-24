<?php
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'マウスドリフトテスト - アイドル時のセンサー揺れを検出';
$pageDescription = '無料のマウスドリフトテスト。10秒〜3分のポインタサンプリングでアイドル時のカーソルドリフトとセンサーの揺れを検出します。ブラウザ完結。';
$pageKeywords = 'マウス ドリフト テスト, カーソル ドリフト, センサー 揺れ, mouse drift test';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/mouse-drift-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-drift-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero"><div class="container landing-hero-grid">
      <div class="hero-copy">
        <p class="hero-kicker">マウス診断</p>
        <h1 class="hero-title">マウスドリフトテスト - センサーの揺れを検出</h1>
        <p class="hero-lede">マウスに触れていないのにカーソルが動く？ドリフトテストは10〜180秒の間、すべてのポインタイベントを取得し、合計ドリフト量、最大ジッタ、合否判定を表示します。</p>
        <div class="hero-actions">
          <a class="landing-btn landing-btn-primary" href="#mouse-drift-test">テスト開始</a>
          <a class="landing-btn landing-btn-ghost" href="#guidelines">使い方</a>
        </div>
        <div class="hero-badges"><span class="hero-badge">ピクセル単位</span><span class="hero-badge">10秒〜3分</span><span class="hero-badge">合否判定</span></div>
      </div>
    </div></section>
    <section class="tool-stage" id="mouse-drift-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">メインツール</p><h2>マウスドリフトテスト</h2><p class="section-lede">マウスを離してスタートを押してください。</p></div></div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-drift-tool.php'; ?></section>
    </section>
    <section id="guidelines" class="guidelines-section"><div class="container">
      <div class="section-head"><h2>ドリフトの見つけ方</h2></div>
      <div class="guidelines-grid">
        <div class="guideline-card"><h3>1. 手を離す</h3><p>マウスに触れない。</p></div>
        <div class="guideline-card"><h3>2. 開始</h3><p>時間を選んで待つ。</p></div>
        <div class="guideline-card"><h3>3. 判定を読む</h3><p>0 px = 完璧、&lt;5 = 正常。</p></div>
        <div class="guideline-card"><h3>4. 対処</h3><p>実マウスパッド、加速オフ。</p></div>
      </div>
    </div></section>
  </main>
  <?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body></html>
