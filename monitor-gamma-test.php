<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Monitor Gamma Test - sRGB 2.2 Calibration Check | KeyboardTester.click';
$pageDescription = 'Free online monitor gamma test. Visually measure your screen\'s gamma using the classic stripe-blend pattern, targeting sRGB 2.2. Fast, precise, browser-based.';
$pageKeywords = 'monitor gamma test, gamma calibration, sRGB 2.2 test, display gamma';
$pageOgImage = 'images/monitor-gamma-test/monitor-gamma-test-hero.jpg';
$pageOgImageAlt = 'Monitor gamma calibration test';
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
  <?php include_once __DIR__ . '/includes/schema.php'; echo generateToolPageSchema('monitor_gamma', [['name'=>'Home','url'=>'/'],['name'=>'Monitor Gamma Test','url'=>'']]); ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>
  <main id="main-content" class="landing-main">
    <?php include 'help/brief-monitor-gamma-test.php'; ?>
    <section class="tool-stage" id="monitor-gamma-test">
      <div class="container tool-stage-header"><div><p class="section-kicker">Primary tool</p><h2>Monitor Gamma Test</h2><p class="section-lede">Adjust the slider until stripes blend with solid gray. The slider value is your gamma.</p></div><div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div></div>
      <section class="tool-shell"><?php include 'tools/monitor_gamma_tool.php'; ?></section>
    </section>
    <section class="trust-strip"><div class="container trust-grid">
      <div class="trust-item"><div class="trust-title">sRGB 2.2 target</div><div class="trust-desc">Standard for PC monitors</div></div>
      <div class="trust-item"><div class="trust-title">Visual match</div><div class="trust-desc">Squint, slide, blend</div></div>
      <div class="trust-item"><div class="trust-title">Fullscreen mode</div><div class="trust-desc">Maximum accuracy</div></div>
      <div class="trust-item"><div class="trust-title">No download</div><div class="trust-desc">Browser only</div></div>
    </div></section>
    <?php $intentClusterTool = 'display'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/seo-content/monitor-gamma-test.php'; ?>
    <?php $currentTool = 'screen'; include 'includes/related-tools.php'; ?>
    <?php include 'help/monitor-gamma-test.php'; ?>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
