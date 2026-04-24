<?php
/**
 * Japanese Mouse DPI Calculator
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;

$pageTitle = 'マウスDPI計算機 - 本当のDPIをオンラインで測定';
$pageDescription = '無料のマウスDPI計算機。パッド上をドラッグするか、ピクセルとインチを手入力して本当のDPIを測定。公称DPIと実測DPIを比較できます。';
$pageKeywords = 'マウスDPI計算機, 実DPI, マウスDPI測定, true dpi calculator';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <meta name="keywords" content="<?php echo $pageKeywords; ?>">

  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/mouse-dpi-calculator.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-dpi-calculator.php'); ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>

  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">ゲーム感度計算機</p>
          <h1 class="hero-title">マウスDPI計算機 - 本当のDPIを測定</h1>
          <p class="hero-lede">マウスの実DPIを確認しましょう。既知の物理距離をドラッグ（または値を直接入力）すると、ピクセル÷インチで実DPIを算出します。センサーのズレを検出し、公称値と比較できます。</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#mouse-dpi-calculator">DPIを測定</a>
            <a class="landing-btn landing-btn-ghost" href="#guidelines">使い方</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">ドラッグ測定</span>
            <span class="hero-badge">ピクセル+インチ入力</span>
            <span class="hero-badge">公称 vs 実測</span>
          </div>
        </div>
      </div>
    </section>

    <section class="tool-stage" id="mouse-dpi-calculator">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">メインツール</p>
          <h2>マウスDPI計算機</h2>
          <p class="section-lede">ピクセルとインチを入力するか、パッド上でドラッグして測定。</p>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/tools/mouse-dpi-calculator-tool.php'; ?></section>
    </section>

    <section id="guidelines" class="guidelines-section">
      <div class="container">
        <div class="section-head"><h2>DPIの計算方法</h2></div>
        <div class="guidelines-grid">
          <div class="guideline-card"><h3>1. 加速をオフ</h3><p>測定前にWindowsの「ポインタの精度を高める」を無効化。</p></div>
          <div class="guideline-card"><h3>2. 定規を用意</h3><p>マウスパッドの横に定規を置きます。</p></div>
          <div class="guideline-card"><h3>3. 10cmまたは4インチ移動</h3><p>ボタンを押し続けながら直線移動。</p></div>
          <div class="guideline-card"><h3>4. DPIを比較</h3><p>公称DPIを入力し、ズレ幅を確認。</p></div>
        </div>
      </div>
    </section>
  </main>

  <?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
