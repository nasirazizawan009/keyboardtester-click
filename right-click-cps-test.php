<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Right Click CPS Test — Right Mouse Button Speed Benchmark | KeyboardTester.click';
$pageDescription = 'Free online right click CPS test. Measure right-mouse-button clicks per second in 5, 10 or 30 second sessions. Browser context menu suppressed for clean counts.';
$pageKeywords = 'right click CPS test, right click speed test, right mouse CPS, right click benchmark';
$pageOgImage = 'images/right-click-cps-test/right-click-cps-test-hero.jpg';
$pageOgImageAlt = 'Gaming mouse used for right-click CPS testing';
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
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
  <?php
  include_once __DIR__ . '/includes/schema.php';
  echo generateToolPageSchema('right_click_cps', [['name'=>'Home','url'=>'/'],['name'=>'Right Click CPS Test','url'=>'']]);
  ?>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[
    {"@type":"Question","name":"What is a right click CPS test?","acceptedAnswer":{"@type":"Answer","text":"A right click CPS test measures how many times you can click the right mouse button per second. It suppresses the browser context menu so every right-click counts cleanly. Useful for Minecraft PvP blocking, FPS ADS tapping, and mouse right-switch diagnostics."}},
    {"@type":"Question","name":"What is a good right click CPS?","acceptedAnswer":{"@type":"Answer","text":"Normal right-click CPS is 8-12 sustained. 12-15 is good. 15+ is competitive. Your right CPS is usually 10-20 percent lower than your left CPS because most people have less fine motor control on the middle finger."}},
    {"@type":"Question","name":"Why is my right click slower than left?","acceptedAnswer":{"@type":"Answer","text":"Three possible reasons: 1) Your middle finger has less fine motor control than index. 2) Your right switch may be debouncing longer than the left. 3) Vendor software may have right-click locked to a macro or disabled. Run the ghost click detector to rule out hardware issues."}},
    {"@type":"Question","name":"Is this right click CPS test free?","acceptedAnswer":{"@type":"Answer","text":"Yes. Runs in your browser, no signup, no download. Best score saved locally on your device only."}}
  ]}
  </script>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>
  <main id="main-content" class="landing-main">
    <?php include 'help/brief-right-click-cps-test.php'; ?>
    <section class="tool-stage" id="right-click-cps-test" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div><p class="section-kicker">Primary tool</p><h2 id="tool-stage-title">Right Click CPS Test</h2><p class="section-lede">Right-click in the arena as fast as you can. Browser context menu is suppressed.</p></div>
        <div class="tool-stage-actions"><a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a></div>
      </div>
      <section id="right-click-cps-tool" class="tool-shell"><?php include 'tools/right_click_cps_tool.php'; ?></section>
    </section>
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">Right-click only</div><div class="trust-desc">Left and middle clicks are ignored</div></div>
        <div class="trust-item"><div class="trust-title">Peak CPS tracked</div><div class="trust-desc">Your highest CPS during the session is recorded</div></div>
        <div class="trust-item"><div class="trust-title">No context menu</div><div class="trust-desc">Browser right-click menu is suppressed in the arena</div></div>
        <div class="trust-item"><div class="trust-title">Runs local</div><div class="trust-desc">No downloads, no signup, no tracking</div></div>
      </div>
    </section>
    <?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/seo-content/right-click-cps-test.php'; ?>
    <?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
    <?php include 'help/right-click-cps-test.php'; ?>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
