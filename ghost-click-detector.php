<?php include 'config.php'; ?>
<?php
$pageTitle = 'Ghost Click Detector - Mouse Double Click Test Online | KeyboardTester.click';
$pageDescription = 'Test if your mouse double-clicks from one press. Free ghost click detector logs left, right, and middle clicks, switch-bounce timing, and suspicious intervals.';
$pageKeywords = 'ghost click detector, mouse double click test, double click test, mouse switch bounce test, mouse chatter test, right click double click test';
$pageOgImage = 'images/ghost-click/hero.png';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/includes/seo-meta.php'; ?>
  <?php include 'includes/head-common.php'; ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>

  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <!-- Structured Data (JSON-LD) -->
  <?php
  include_once __DIR__ . '/includes/schema.php';
  echo generateToolPageSchema('ghost_click', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Ghost Click Detector', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-ghost-click-detector.php'; ?>

    <section class="tool-stage" id="ghost-click-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tester</p>
          <h2 id="tool-stage-title">Mouse Double Click Test and Ghost Click Detector</h2>
          <p class="section-lede">Click normally to see whether your mouse sends suspicious rapid duplicate events from the left, right, or middle button.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="ghost-click-detector" class="tool-shell">
        <?php include 'tools/ghost_click_detector_tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Single-click check</div>
          <div class="trust-desc">Built for unwanted repeats</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Advanced timing</div>
          <div class="trust-desc">80 to 300 ms thresholds</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Button filters</div>
          <div class="trust-desc">Left, right, and middle</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Private test</div>
          <div class="trust-desc">Runs in your browser</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Double-click issues</p>
          <h2 id="feature-title">Find Mouse Chatter, Switch Bounce, and Ghost Clicks</h2>
          <p class="section-lede">A useful test should show timing evidence, not only a click count. This detector logs suspicious intervals and separates normal clicking from possible hardware bounce.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Suspicious interval log</h3>
            <p>See the exact timing between clicks and which ones were flagged.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Button-specific testing</h3>
            <p>Check left, right, middle, or all buttons in one session.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Adjustable thresholds</h3>
            <p>Use strict 80 ms bounce detection or looser timing for noisy mice.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Exportable evidence</h3>
            <p>Download a short report before contacting support or testing another PC.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="process-title">How to Check for Ghost Clicks</h2>
          </div>
          <p class="section-lede">Use deliberate single-clicks. If rapid duplicate intervals appear repeatedly, the mouse switch may be bouncing.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/ghost-click/step-1.png'); ?>" alt="Ghost click detector step 1 - choose a mouse button and start the double click test" loading="lazy" width="600" height="400" decoding="async">
            </div>
            <div class="step-number">01</div>
            <h3>Choose a button</h3>
            <p>Select all buttons or isolate the left, middle, or right mouse button.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/ghost-click/step-2.png'); ?>" alt="Ghost click test step 2 - single click normally to detect duplicate mouse events" loading="lazy" width="600" height="407" decoding="async">
            </div>
            <div class="step-number">02</div>
            <h3>Single-click normally</h3>
            <p>Avoid intentional double-clicking so suspicious intervals are meaningful.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/ghost-click/step-3.png'); ?>" alt="Ghost click test results - review suspicious interval timing and export a report" loading="lazy" width="600" height="399" decoding="async">
            </div>
            <div class="step-number">03</div>
            <h3>Review the timing</h3>
            <p>Look at suspicious rate, fastest interval, and the event log before deciding.</p>
          </article>
        </div>
      </div>
    </section>

    <?php $intentClusterTool = 'mouse'; $currentTool = 'ghost-click'; include 'includes/components/intent-cluster-links.php'; ?>
    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/seo-content/ghost-click.php'; ?>
    <?php $currentTool = 'ghost-click'; include 'includes/related-tools.php'; ?>
    <?php include 'help/ghost-click-detector.php'; ?>
  <?php $toolBlogSlug = 'ghost-click-detector-fix-double-clicking.php'; include __DIR__ . '/includes/components/tool-blog-cta.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
