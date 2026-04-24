<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Mouse Drag Click Test — CPS, Burst Rate, Flick Detection | KeyboardTester.click';
$pageDescription = 'Free online mouse drag click test. Measure drag-click CPS, peak burst rate, and total clicks in 5, 10 or 30 second sessions. Perfect for Minecraft PvP and competitive clicking.';
$pageKeywords = 'mouse drag click test, drag click CPS, drag click speed, Minecraft drag click, burst CPS test';
$pageOgImage = 'images/mouse-drag-test/mouse-drag-test-hero.jpg';
$pageOgImageAlt = 'Gaming desk setup used for mouse drag-click CPS testing';
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
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
  <?php
  include_once __DIR__ . '/includes/schema.php';
  echo generateToolPageSchema('mouse_drag', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Mouse Drag Click Test', 'url' => '']
  ]);
  ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {"@type":"Question","name":"What is drag clicking?","acceptedAnswer":{"@type":"Answer","text":"Drag clicking is a technique where you slide a finger across the mouse button, using the friction to make the button oscillate and trigger multiple click events from one physical motion. It can produce 30-60 CPS in short bursts compared to 10-14 CPS from normal clicking."}},
      {"@type":"Question","name":"What is a good drag click CPS?","acceptedAnswer":{"@type":"Answer","text":"A competitive drag-click peak is 30+ CPS in a 200ms burst. Average CPS over a 10-second session of 20+ is strong. Under 15 peak CPS usually means the mouse is debouncing clicks at hardware level."}},
      {"@type":"Question","name":"Is drag clicking bad for your mouse?","acceptedAnswer":{"@type":"Answer","text":"Drag-clicking accelerates switch wear. A mouse rated for 20 million clicks can develop chatter within 6-12 months under heavy drag-click use. Use the ghost click detector periodically to monitor switch health."}},
      {"@type":"Question","name":"Which mice are best for drag clicking?","acceptedAnswer":{"@type":"Answer","text":"Mice with Huano switches (Bloody A70, Glorious Model O series), some Razer models (Viper), and specific SteelSeries mice drag-click well. Most office mice and older Logitech gaming mice debounce the burst at firmware level, capping CPS around 10-12."}},
      {"@type":"Question","name":"Is this drag click test free?","acceptedAnswer":{"@type":"Answer","text":"Yes, completely free. Runs in your browser, no signup, no download. Best score is saved locally on your device only."}}
    ]
  }
  </script>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>
  <main id="main-content" class="landing-main">
    <?php include 'help/brief-mouse-drag-test.php'; ?>
    <section class="tool-stage" id="mouse-drag-test" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Mouse Drag Click Test</h2>
          <p class="section-lede">Click or drag a finger across the arena. We track CPS, bursts, and timeline.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View tips</a>
        </div>
      </div>
      <section id="mouse-drag-tool" class="tool-shell">
        <?php include 'tools/mouse_drag_tool.php'; ?>
      </section>
    </section>
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item"><div class="trust-title">Live CPS + peak</div><div class="trust-desc">Average and peak clicks per second update in real time</div></div>
        <div class="trust-item"><div class="trust-title">Drag burst detection</div><div class="trust-desc">Separate metric for 200ms burst peaks</div></div>
        <div class="trust-item"><div class="trust-title">Click timeline graph</div><div class="trust-desc">Visual feedback on pattern consistency</div></div>
        <div class="trust-item"><div class="trust-title">Runs local</div><div class="trust-desc">No downloads, no signup, no tracking</div></div>
      </div>
    </section>
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Click diagnostics</p>
          <h2 id="feature-title">Everything you need to benchmark your drag click</h2>
          <p class="section-lede">Three metrics instead of one CPS number — so you can tell dragging from jittering from butterfly.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card"><h3>Average CPS</h3><p>Total clicks divided by session length — the headline number.</p></article>
          <article class="landing-feature-card"><h3>Peak CPS</h3><p>Highest sustained CPS during the session. Shows your real ceiling.</p></article>
          <article class="landing-feature-card"><h3>Drag burst peak</h3><p>Max clicks in any 200ms window times 5. Drag-click signature.</p></article>
          <article class="landing-feature-card"><h3>Timeline graph</h3><p>60-bucket histogram showing exactly when your clicks clustered.</p></article>
        </div>
      </div>
    </section>
    <?php $intentClusterTool = 'mouse'; $currentTool = 'mouse'; include 'includes/components/intent-cluster-links.php'; ?>
    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/seo-content/mouse-drag-test.php'; ?>
    <?php $currentTool = 'mouse'; include 'includes/related-tools.php'; ?>
    <?php include 'help/mouse-drag-test.php'; ?>
  </main>
  <?php include 'footer.php'; ?>
</body>
</html>
