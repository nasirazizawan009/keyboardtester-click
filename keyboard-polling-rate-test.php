<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Keyboard Polling Rate Test — USB Hz Estimator | KeyboardTester.click';
$pageDescription = 'Free online keyboard polling rate test. Estimate your keyboard Hz using browser auto-repeat timing measurement. Live samples, average interval, minimum gap.';
$pageKeywords = 'keyboard polling rate test, keyboard Hz test, keyboard polling test online';
$pageOgImage = 'images/keyboard-polling-rate-test/keyboard-polling-rate-test-hero.jpg';
$pageOgImageAlt = 'Keyboard polling rate test online';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/includes/seo-meta.php'; ?>
  <link rel="icon" type="image/x-icon" href="navigation.png">
  <?php include 'includes/head-common.php'; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
  <?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('keyboard_polling_rate', [['name'=>'Home','url'=>'/'],['name'=>'Keyboard Polling Rate','url'=>'']]); ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>
  <main id="main-content" class="landing-main">
    <?php include 'help/brief-keyboard-polling-rate-test.php'; ?>
    <section class="tool-stage" id="keyboard-polling-rate-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Keyboard Polling Rate Test</h2><p class="section-lede">Hold any key for 3+ seconds. We sample the auto-repeat interval.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
      <section class="tool-shell"><?php include 'tools/keyboard_polling_rate_tool.php'; ?></section>
    </section>
    <section class="trust-strip"><div class="container trust-grid">
      <div class="trust-item"><div class="trust-title">Live timing</div><div class="trust-desc">Real-time interval averaging</div></div>
      <div class="trust-item"><div class="trust-title">Min interval</div><div class="trust-desc">Fastest gap captured</div></div>
      <div class="trust-item"><div class="trust-title">Auto-repeat sampling</div><div class="trust-desc">Uses OS auto-repeat as proxy</div></div>
      <div class="trust-item"><div class="trust-title">No downloads</div><div class="trust-desc">Browser only, no install</div></div>
    </div></section>
    <?php $intentClusterTool = 'keyboard'; $currentTool = 'keyboard'; include 'includes/components/intent-cluster-links.php'; ?>
    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/seo-content/keyboard-polling-rate-test.php'; ?>
    <?php $currentTool = 'keyboard'; include 'includes/related-tools.php'; ?>
    <?php include 'help/keyboard-polling-rate-test.php'; ?>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
