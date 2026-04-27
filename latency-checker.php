<?php include 'config.php'; ?>
<?php
$pageTitle = 'Keyboard Latency Test — Measure Input Lag in Milliseconds | KeyboardTester.click';
$pageDescription = 'Free keyboard latency test online. Measure key-press delay, input lag, and response time in milliseconds. Compare gaming, office, mechanical, and wireless keyboards. No install, browser-based.';
$pageKeywords = 'keyboard latency test, keyboard latency checker, input lag test, input latency test, key press delay test, keyboard response time test, keyboard delay test, keyboard test latency, mouse latency test, online latency test';
$pageOgImage = 'images/latency-checker/hero.png';
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
  echo generateToolPageSchema('latency_checker', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Latency Checker', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-latency-checker.php'; ?>

    <section class="tool-stage" id="latency-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Keyboard Latency Checker</h2>
          <p class="section-lede">Use the live tool below to complete your test.</p>
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
          <div class="trust-title">Live feedback</div>
          <div class="trust-desc">See results instantly</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Quick reset</div>
          <div class="trust-desc">Run another test fast</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Browser based</div>
          <div class="trust-desc">No installs or signups</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Focused checks</div>
          <div class="trust-desc">Built for input latency</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Input Response Time</p>
          <h2 id="feature-title">Measure Keyboard and Mouse Latency</h2>
          <p class="section-lede">Capture live input samples, compare average delay, and spot inconsistent response times.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Focused insights</h3>
            <p>Track input latency with live updates.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Instant results</h3>
            <p>See changes as you test in real time.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Simple controls</h3>
            <p>Start, stop, and reset in seconds.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Repeatable tests</h3>
            <p>Compare multiple runs quickly.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="process-title">How to Test Input Latency Online</h2>
          </div>
          <p class="section-lede">Start the test, press keys or click, and compare the live millisecond results.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/latency-checker/step-1.png'); ?>" alt="Input latency checker step 1 - open response time tester" loading="lazy" width="600" height="399" decoding="async">
            </div>
            <div class="step-number">01</div>
            <h3>Start the test</h3>
            <p>Open the tool and prepare to begin.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/latency-checker/step-2.png'); ?>" alt="Latency test step 2 - press keys to measure response time" loading="lazy" width="600" height="400" decoding="async">
            </div>
            <div class="step-number">02</div>
            <h3>Press keys or click</h3>
            <p>to measure response time.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/latency-checker/step-3.png'); ?>" alt="Input latency results - millisecond response time display" loading="lazy" width="600" height="400" decoding="async">
            </div>
            <div class="step-number">03</div>
            <h3>Review results</h3>
            <p>Check your input latency stats and retest if needed.</p>
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
              <tr><td style="padding:12px 16px;"><strong>Concerning / failing hardware</strong></td><td style="padding:12px 16px;">&gt; 40 ms consistent</td><td style="padding:12px 16px;">Worn switches, USB hub bottleneck, or driver issue</td></tr>
            </tbody>
          </table>
        </div>
        <div style="margin-top:32px;padding:16px 20px;background:var(--surface);border-left:4px solid var(--accent-primary);border-radius:6px;">
          <strong>Note on browser-based latency measurement:</strong> this tool measures the time from JavaScript <code>keydown</code> event to processing — a subset of the full input chain. It does NOT include USB polling delay (typically 1ms at 1000Hz, 8ms at 125Hz), monitor refresh delay, or switch debounce. For absolute hardware specs, dedicated tools like NVIDIA LDAT measure photon-to-event timing. For comparing keyboards on the same machine, browser timing is reliable and repeatable.
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/latency-checker.php'; ?>
  <?php $toolBlogSlug = 'input-latency-checker-keyboard-mouse-delay.php'; include __DIR__ . '/includes/components/tool-blog-cta.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
