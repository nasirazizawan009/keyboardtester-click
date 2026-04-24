<?php
/**
 * Japanese localized landing page for bass-test
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-ja.php'; if (file_exists($__c)) include $__c;
$pageTitle = 'ベーステスト - サブウーファー用 20 Hz から 200 Hz スイープ';
$pageDescription = '無料オンラインベーステスト。20 Hz から 200 Hz の周波数スイープと ISO ベースプリセットで、サブウーファー、スタジオモニター、ヘッドフォンを検証します。インストール不要。';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <link rel="alternate" hreflang="ja" href="<?php echo absoluteUrl('languages/japanese/bass-test.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('bass-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-ja.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">オーディオ診断</p>
          <h1 class="hero-title">ベーステスト - サブウーファー & 20-200 Hz スイープ</h1>
          <p class="hero-lede">サブウーファー、スタジオモニター、ヘッドフォンが低域を正確に再生するか確認します。20-200 Hz スイープ、ISO 1/3 オクターブプリセット、またはホールドモード。純粋な正弦波で明確に診断。</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#bass-test">テストを開始</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">すべてのツール</a>
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="bass-test">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">オーディオ診断</p>
          <h2>ベーステスト</h2>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/../../tools/bass_test_tool.php'; ?></section>
    </section>
  </main>
  <?php $__f = __DIR__ . '/footer-ja.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
