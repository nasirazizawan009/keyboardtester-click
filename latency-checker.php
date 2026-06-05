<?php include 'config.php'; ?>
<?php
$pageTitle = 'Keyboard Latency Test - Free Input Lag & Delay Checker';
$pageDescription = 'Free keyboard latency test - measure real input lag in milliseconds with jitter, consistency, best/worst samples and mouse-click latency mode. No install.';
$pageKeywords = 'keyboard latency test, keyboard latency checker, input lag test, input latency test, key press delay test, keyboard response time test, keyboard delay test, keyboard test latency, mouse latency test, mouse click latency test, online latency test';
$pageOgImage = 'images/latency-checker/hero.png';
?>
<?php
if (empty($_GET['lang']) || $_GET['lang'] === 'en') {
  $kbtTemplateToolId = 'latency-checker';
  require __DIR__ . '/includes/render-english-tool-page.php';
  return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/includes/seo-meta.php'; ?>
  <?php include 'includes/head-common.php'; ?>

  <link rel="preconnect" href="https://fonts.googleapis.com" media="(min-width: 769px)">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'" media="(min-width: 769px)">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" media="(min-width: 769px)"></noscript>

  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.min.css'); ?>">

  <!-- Structured Data (JSON-LD) -->
  <?php
  include_once __DIR__ . '/includes/schema.php';
  echo generateToolPageSchema('latency_checker', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Keyboard and Mouse Latency Test', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-latency-checker.php'; ?>
    <?php include __DIR__ . '/includes/components/tool-category-strip.php'; ?>

    <section class="tool-stage" id="latency-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Keyboard and Mouse Latency Checker</h2>
          <p class="section-lede">Start the test, capture key presses or mouse clicks, and compare current, average, jitter, best, and worst input-delay samples.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="latency-checker" class="tool-shell">
        <?php include 'tools/latency_checker_tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Keyboard MS test</div>
          <div class="trust-desc">See the exact key pressed</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Mouse latency mode</div>
          <div class="trust-desc">Capture click response samples</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Jitter and consistency</div>
          <div class="trust-desc">Spot noisy input spikes</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Honest limits</div>
          <div class="trust-desc">Browser timing, clearly explained</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Input Response Time</p>
          <h2 id="feature-title">Check Keyboard Input Delay, Mouse Click Latency, and Jitter</h2>
          <p class="section-lede">Capture browser input-event samples, compare average keyboard MS or mouse click delay, and spot inconsistent response times on the same machine.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Last key display</h3>
            <p>See the pressed key or mouse button in a large live input panel while samples are recorded.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Keyboard and mouse modes</h3>
            <p>Switch between keydown samples and mouse-click samples without leaving the latency checker.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Jitter and sample graph</h3>
            <p>Use standard deviation, consistency labels, and recent-sample bars to find spikes.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Private browser test</h3>
            <p>Timing runs locally in your browser and does not upload your input data.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="process-title">How to Test Keyboard Latency Online</h2>
          </div>
          <p class="section-lede">Start the test, repeat the same key or mouse click, and compare millisecond samples for consistency.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/latency-checker/step-1.png'); ?>" alt="Input latency checker step 1 - open response time tester" loading="lazy" width="600" height="399" decoding="async">
            </div>
            <div class="step-number">01</div>
            <h3>Start the latency test</h3>
            <p>Focus the page and begin from the live tool panel.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/latency-checker/step-2.png'); ?>" alt="Latency test step 2 - press keys to measure response time" loading="lazy" width="600" height="400" decoding="async">
            </div>
            <div class="step-number">02</div>
            <h3>Press keys or click the pad</h3>
            <p>Use consistent key presses or mouse clicks to collect enough samples.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/latency-checker/step-3.png'); ?>" alt="Input latency results - millisecond response time display" loading="lazy" width="600" height="400" decoding="async">
            </div>
            <div class="step-number">03</div>
            <h3>Compare delay and jitter</h3>
            <p>Watch the average, best, worst, jitter, graph, and sample count before retesting.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="latency-reference" aria-labelledby="latency-reference-title" style="padding:60px 20px;background:var(--bg-secondary);">
      <div class="container" style="max-width:1000px;margin:0 auto;">
        <div class="section-head">
          <p class="section-kicker">Reference</p>
          <h2 id="latency-reference-title">What is a good keyboard latency?</h2>
          <p class="section-lede">Use this table to interpret your latency reading. Lower is better — but the threshold for "good" depends on what you use the keyboard for.</p>
        </div>
        <div class="latency-table-wrap" style="overflow-x:auto;margin-top:24px;">
          <table style="width:100%;border-collapse:collapse;font-size:0.95rem;">
            <thead>
              <tr style="background:var(--surface);border-bottom:2px solid var(--accent-primary);">
                <th style="text-align:left;padding:12px 16px;">Use case</th>
                <th style="text-align:left;padding:12px 16px;">Target latency</th>
                <th style="text-align:left;padding:12px 16px;">Typical hardware</th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Competitive esports (FPS, fighting games)</strong></td><td style="padding:12px 16px;">&lt; 5 ms</td><td style="padding:12px 16px;">Wired mechanical with fast switches (red/silver linear)</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Casual gaming</strong></td><td style="padding:12px 16px;">5–10 ms</td><td style="padding:12px 16px;">Most wired mechanical or quality membrane keyboards</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Office typing &amp; productivity</strong></td><td style="padding:12px 16px;">10–20 ms</td><td style="padding:12px 16px;">Wired or 2.4 GHz wireless keyboards</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Bluetooth / casual wireless</strong></td><td style="padding:12px 16px;">15–30 ms</td><td style="padding:12px 16px;">Bluetooth keyboards (slotted polling adds delay)</td></tr>
              <tr><td style="padding:12px 16px;"><strong>Concerning / failing hardware</strong></td><td style="padding:12px 16px;">&gt; 40 ms consistent</td><td style="padding:12px 16px;">Worn switches, USB hub bottleneck, or driver issue (see how to <a href="https://keyboardtester.click/blog/keyboard-not-typing-lagging-sticky-fix-clean-guide.php">fix keyboard delay</a>)</td></tr>
            </tbody>
          </table>
        </div>
        <div style="margin-top:32px;padding:16px 20px;background:var(--surface);border-left:4px solid var(--accent-primary);border-radius:6px;">
          <strong>Note on browser-based latency measurement:</strong> this tool measures the time from JavaScript input events to page processing - a subset of the full input chain. It does NOT include exact switch actuation, USB polling packet timing, monitor refresh delay, or switch debounce. For absolute hardware specs, dedicated tools like NVIDIA LDAT measure photon-to-event timing. For comparing keyboards or mouse clicks on the same machine, browser timing is useful and repeatable.
        </div>
      </div>
    </section>

    <?php
      $currentTool = 'latency';
      $relatedToolsTitle = 'Related Mouse and Input Latency Tools';
      $relatedToolsIntro = 'Continue with mouse click checks, polling-rate tests, reaction timing, and keyboard diagnostics.';
      include 'includes/related-tools.php';
    ?>
    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/latency-checker.php'; ?>
  <?php $toolBlogSlug = 'input-latency-checker-keyboard-mouse-delay.php'; include __DIR__ . '/includes/components/tool-blog-cta.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
