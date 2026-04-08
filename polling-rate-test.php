<?php include 'config.php'; ?>
<?php
$pageTitle = 'Mouse Polling Rate Test — Check Mouse Hz Online Free | KeyboardTester.click';
$pageDescription = 'Free mouse polling rate test online. Check if your gaming mouse runs at 125Hz, 500Hz, 1000Hz or higher. Move your mouse to see live Hz readings. No download needed.';
$pageKeywords = 'mouse polling rate test, mouse hz test, polling rate checker, check mouse hz online';
$pageOgImage = 'images/mouse/hero.webp';
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

  <style>
    /* Polling Rate Test Tool — embedded styles */
    .polling-tool {
      max-width: 720px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
      text-align: center;
    }

    .polling-tool h1 {
      font-size: clamp(1.75rem, 4vw, 2.5rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #1e293b);
    }

    .polling-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.75rem;
    }

    /* Stat cards */
    .stat-cards {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 0.75rem;
      margin-bottom: 1.5rem;
    }

    .stat-card {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      padding: 1rem 0.5rem;
      text-align: center;
    }

    .stat-card .stat-value {
      font-size: clamp(1.3rem, 3vw, 2rem);
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      color: var(--primary-color, #4b5eaa);
      line-height: 1.1;
      margin-bottom: 0.25rem;
    }

    .stat-card .stat-label {
      font-size: 0.72rem;
      color: var(--text-muted, #475569);
      text-transform: uppercase;
      letter-spacing: 0.06em;
    }

    /* Hz progress bar */
    .hz-bar-wrap {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 999px;
      height: 12px;
      margin-bottom: 0.6rem;
      overflow: hidden;
    }

    .hz-bar-fill {
      height: 100%;
      width: 0%;
      border-radius: 999px;
      background: linear-gradient(90deg, #3b82f6, #6366f1);
      transition: width 0.15s ease;
    }

    .hz-bar-labels {
      display: flex;
      justify-content: space-between;
      font-size: 0.7rem;
      color: var(--text-muted, #475569);
      margin-bottom: 0.75rem;
      padding: 0 2px;
    }

    /* Rating display */
    .hz-rating {
      font-size: 1.05rem;
      font-weight: 600;
      color: #22c55e;
      margin-bottom: 1.25rem;
      min-height: 1.6rem;
    }

    /* Test zone */
    .test-zone {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 200px;
      border: 2px dashed var(--border-color, #e2e8f0);
      border-radius: 12px;
      margin-bottom: 1.25rem;
      cursor: crosshair;
      user-select: none;
      transition: border-color 0.2s, background 0.2s;
      background: transparent;
    }

    .test-zone.running {
      border-style: solid;
      border-color: #22c55e;
      background: rgba(34, 197, 94, 0.05);
      animation: pulse-border 1.5s ease-in-out infinite;
    }

    @keyframes pulse-border {
      0%, 100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
      50%       { box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.18); }
    }

    .test-zone #status {
      font-size: 1rem;
      font-weight: 600;
      color: var(--text-muted, #475569);
      pointer-events: none;
      text-align: center;
      padding: 0 1rem;
    }

    .test-zone.running #status {
      color: var(--heading-color, #1e293b);
    }

    /* Action buttons */
    .action-btns {
      display: flex;
      justify-content: center;
      gap: 0.75rem;
      margin-bottom: 1.25rem;
      flex-wrap: wrap;
    }

    .action-btn {
      padding: 0.6rem 1.6rem;
      border: none;
      border-radius: 8px;
      font-family: inherit;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      transition: opacity 0.15s, transform 0.1s;
    }

    .action-btn:hover {
      opacity: 0.88;
      transform: translateY(-1px);
    }

    .action-btn:active {
      transform: translateY(0);
    }

    .action-btn:disabled {
      opacity: 0.4;
      cursor: not-allowed;
      transform: none;
    }

    .btn-start {
      background: var(--primary-color, #4b5eaa);
      color: #fff;
    }

    .btn-stop {
      background: #f87171;
      color: #fff;
    }

    .btn-reset {
      background: transparent;
      color: var(--text-muted, #475569);
      border: 2px solid var(--border-color, #e2e8f0);
    }

    .btn-reset:hover {
      border-color: var(--text-muted, #475569);
      color: var(--heading-color, #1e293b);
    }

    /* Privacy notice */
    .privacy-notice {
      font-size: 0.8rem;
      color: var(--text-muted, #475569);
      margin-bottom: 0.75rem;
    }

    /* DPI link */
    .related-link {
      font-size: 0.9rem;
      color: var(--text-muted, #475569);
    }

    .related-link a {
      color: var(--primary-color, #4b5eaa);
      text-decoration: none;
      font-weight: 600;
    }

    .related-link a:hover {
      text-decoration: underline;
    }

    /* Polling rate table */
    .polling-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
      font-size: 0.95rem;
    }

    .polling-table th,
    .polling-table td {
      padding: 0.6rem 0.9rem;
      text-align: left;
      border-bottom: 1px solid var(--border-color, #e2e8f0);
    }

    .polling-table th {
      font-weight: 600;
      color: var(--heading-color, #1e293b);
      background: var(--card-bg, #f1f5f9);
    }

    .polling-table td {
      color: var(--text-color, #1e293b);
    }

    .polling-table tr:last-child td {
      border-bottom: none;
    }

    @media (max-width: 560px) {
      .stat-cards {
        grid-template-columns: repeat(2, 1fr);
      }
      .polling-tool {
        padding: 1.25rem 1rem 2rem;
      }
    }

    @media (max-width: 340px) {
      .stat-cards {
        grid-template-columns: 1fr 1fr;
      }
    }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">

    <!-- ── Tool stage ─────────────────────────────────────────────────── -->
    <section class="tool-stage" id="polling-rate-test-tool" aria-labelledby="polling-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="polling-tool-title">Mouse Polling Rate Test</h2>
          <p class="section-lede">Move your mouse in the test zone to measure live Hz readings.</p>
        </div>
      </div>

      <section id="polling-tester" class="tool-shell">
        <div class="polling-tool">
          <h1>Mouse Polling Rate Test</h1>
          <p class="tool-subtitle">Click Start, then move your mouse in circles inside the test zone</p>

          <!-- Stat cards -->
          <div class="stat-cards" role="group" aria-label="Polling rate statistics">
            <div class="stat-card">
              <div class="stat-value" id="live-hz" aria-live="polite" aria-label="Live Hz">-- Hz</div>
              <div class="stat-label">Live Hz</div>
            </div>
            <div class="stat-card">
              <div class="stat-value" id="avg-hz" aria-live="polite" aria-label="Average Hz">-- Hz</div>
              <div class="stat-label">Average Hz</div>
            </div>
            <div class="stat-card">
              <div class="stat-value" id="peak-hz" aria-live="polite" aria-label="Peak Hz">-- Hz</div>
              <div class="stat-label">Peak Hz</div>
            </div>
            <div class="stat-card">
              <div class="stat-value" id="sample-count" aria-live="polite" aria-label="Sample count">0</div>
              <div class="stat-label">Samples</div>
            </div>
          </div>

          <!-- Hz progress bar -->
          <div class="hz-bar-wrap" aria-hidden="true">
            <div class="hz-bar-fill" id="hz-bar"></div>
          </div>
          <div class="hz-bar-labels" aria-hidden="true">
            <span>0</span>
            <span>250Hz</span>
            <span>500Hz</span>
            <span>1000Hz</span>
          </div>

          <!-- Rating -->
          <div class="hz-rating" id="rating" aria-live="polite">Move mouse to begin</div>

          <!-- Test zone -->
          <div
            class="test-zone"
            id="test-zone"
            role="application"
            aria-label="Mouse movement test area — move your mouse here"
          >
            <span id="status">Click Start and move your mouse here in circles</span>
          </div>

          <!-- Action buttons -->
          <div class="action-btns">
            <button class="action-btn btn-start" id="start-btn" aria-label="Start polling rate test">Start</button>
            <button class="action-btn btn-stop" id="stop-btn" aria-label="Stop polling rate test" disabled>Stop</button>
            <button class="action-btn btn-reset" id="reset-btn" aria-label="Reset polling rate test">Reset</button>
          </div>

          <!-- Privacy notice -->
          <p class="privacy-notice">This test runs entirely in your browser. No data is collected.</p>

          <!-- Related tool link -->
          <p class="related-link">Also check your <a href="<?php echo url('mouse_sensitivity_DPI_tester.php'); ?>">Mouse DPI Test</a> for full mouse hardware analysis.</p>
        </div>
      </section>
    </section>

    <!-- ── Trust strip ────────────────────────────────────────────────── -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Live readings</div>
          <div class="trust-desc">See Hz update in real time as you move the mouse</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Peak tracking</div>
          <div class="trust-desc">Captures the highest Hz burst your mouse achieves</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Browser based</div>
          <div class="trust-desc">No software installs or signups required</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">All mice supported</div>
          <div class="trust-desc">Works with wired, wireless, and gaming mice</div>
        </div>
      </div>
    </section>

    <!-- ── SEO content ────────────────────────────────────────────────── -->
    <section class="feature-band" aria-labelledby="what-is-polling-title">
      <div class="container">
        <div class="section-head">
          <h2 id="what-is-polling-title">What Is Mouse Polling Rate?</h2>
          <p class="section-lede">
            Mouse polling rate is how frequently your mouse sends position data to the computer, measured in Hz (reports per second).
            At 125Hz it reports every 8ms. At 1000Hz, every 1ms. At 8000Hz, every 0.125ms.
            Higher polling rate means smoother cursor movement and faster response — critical for competitive gaming.
            A higher Hz value reduces the gap between physical mouse movement and what appears on screen, giving you
            more accurate aim and less perceivable input lag in fast-paced games.
          </p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="polling-guide-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Quick reference</p>
            <h2 id="polling-guide-title">Polling Rate Guide</h2>
          </div>
          <p class="section-lede">Understand what your Hz reading means for your use case.</p>
        </div>
        <div class="landing-feature-grid" style="margin-top:1.5rem;">
          <table class="polling-table" aria-label="Mouse polling rate guide by Hz value">
            <thead>
              <tr>
                <th scope="col">Polling Rate</th>
                <th scope="col">Response Time</th>
                <th scope="col">Best For</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>125Hz</td>
                <td>8ms</td>
                <td>Standard office mouse — adequate for everyday desktop use.</td>
              </tr>
              <tr>
                <td>250Hz</td>
                <td>4ms</td>
                <td>Mid-range mice — noticeable improvement over 125Hz for casual gaming.</td>
              </tr>
              <tr>
                <td>500Hz</td>
                <td>2ms</td>
                <td>Gaming standard — smooth tracking for most competitive players.</td>
              </tr>
              <tr>
                <td>1000Hz</td>
                <td>1ms</td>
                <td>Competitive gaming — recommended for FPS and MOBA players.</td>
              </tr>
              <tr>
                <td>4000–8000Hz</td>
                <td>&lt;0.25ms</td>
                <td>Ultra-premium gaming mice — maximum smoothness, sub-millisecond response.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="lower-hz-title">
      <div class="container">
        <div class="section-head">
          <h2 id="lower-hz-title">Why Does My Mouse Show Lower Than Expected Hz?</h2>
          <p class="section-lede">
            Browser-based tests measure the Hz your browser receives, which may be 10–20% lower than hardware polling rate
            due to JavaScript event processing overhead and OS input scheduling. This is normal and does not indicate
            a hardware problem. For exact hardware-level measurements, use your mouse manufacturer's companion software:
            Logitech G Hub, Razer Synapse, Corsair iCUE, or SteelSeries GG all provide precise polling rate readouts.
            This browser test is best used to compare mice against each other or to verify a general polling rate tier
            (125Hz vs 500Hz vs 1000Hz).
          </p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="change-hz-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Settings guide</p>
            <h2 id="change-hz-title">How to Change Mouse Polling Rate</h2>
          </div>
          <p class="section-lede">Most gaming mice let you adjust polling rate via software or a hardware button.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>Use companion software</h3>
            <p>Gaming mice from Logitech, Razer, Corsair, and SteelSeries include desktop software (G Hub, Synapse, iCUE, GG) with polling rate sliders. Select 500Hz or 1000Hz for best gaming performance.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>Check the underside button</h3>
            <p>Some gaming mice (especially budget models) have a small button on the underside that cycles through preset polling rates. Check your mouse manual for the sequence.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>Office mice are fixed</h3>
            <p>Standard office and laptop mice are typically fixed at 125Hz with no way to change the polling rate. Upgrading to a gaming mouse is the only option if higher Hz is needed.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ── Related tools ──────────────────────────────────────────────── -->
    <?php include 'includes/components/tools-list.php'; ?>
    <?php $currentTool = 'polling-rate'; include 'includes/related-tools.php'; ?>

  </main>

  <?php include 'footer.php'; ?>

  <script>
  (function () {
    'use strict';

    var readings = [], lastTime = null, isRunning = false, peakHz = 0, totalReadings = 0;

    var startBtn   = document.getElementById('start-btn');
    var stopBtn    = document.getElementById('stop-btn');
    var resetBtn   = document.getElementById('reset-btn');
    var testZone   = document.getElementById('test-zone');
    var statusEl   = document.getElementById('status');

    function startTest() {
      isRunning = true;
      readings = []; lastTime = null; peakHz = 0; totalReadings = 0;
      statusEl.textContent = 'Move your mouse in circles...';
      testZone.classList.add('running');
      testZone.addEventListener('mousemove', onMouseMove);
      startBtn.disabled = true;
      stopBtn.disabled = false;
    }

    function stopTest() {
      isRunning = false;
      testZone.removeEventListener('mousemove', onMouseMove);
      testZone.classList.remove('running');
      statusEl.textContent = 'Test stopped. Click Start to retest.';
      startBtn.disabled = false;
      stopBtn.disabled = true;
    }

    function onMouseMove(e) {
      var now = performance.now();
      if (lastTime !== null) {
        var delta = now - lastTime;
        if (delta > 0 && delta < 100) {
          var hz = Math.round(1000 / delta);
          readings.push(hz);
          if (readings.length > 60) readings.shift();
          totalReadings++;
          if (hz > peakHz) peakHz = hz;
          updateDisplay(hz);
        }
      }
      lastTime = now;
    }

    function updateDisplay(currentHz) {
      var sum = 0;
      for (var i = 0; i < readings.length; i++) sum += readings[i];
      var avg = Math.round(sum / readings.length);

      document.getElementById('live-hz').textContent    = currentHz + ' Hz';
      document.getElementById('avg-hz').textContent     = avg + ' Hz';
      document.getElementById('peak-hz').textContent    = peakHz + ' Hz';
      document.getElementById('sample-count').textContent = totalReadings;

      var pct = Math.min((avg / 1000) * 100, 100);
      document.getElementById('hz-bar').style.width = pct + '%';

      var rating = '';
      if (avg >= 8000)      rating = 'Ultra (8000Hz)';
      else if (avg >= 4000) rating = 'High-end (4000Hz)';
      else if (avg >= 1000) rating = 'Gaming (1000Hz)';
      else if (avg >= 500)  rating = 'Standard (500Hz)';
      else if (avg >= 250)  rating = 'Mid (250Hz)';
      else                  rating = 'Basic (125Hz)';

      document.getElementById('rating').textContent = rating;
    }

    function resetTest() {
      stopTest();
      readings = []; lastTime = null; peakHz = 0; totalReadings = 0;

      document.getElementById('live-hz').textContent     = '-- Hz';
      document.getElementById('avg-hz').textContent      = '-- Hz';
      document.getElementById('peak-hz').textContent     = '-- Hz';
      document.getElementById('sample-count').textContent = '0';
      document.getElementById('hz-bar').style.width      = '0%';
      document.getElementById('rating').textContent      = 'Move mouse to begin';
      statusEl.textContent = 'Click Start and move your mouse here in circles';

      startBtn.disabled = false;
      stopBtn.disabled  = true;
    }

    startBtn.addEventListener('click', startTest);
    stopBtn.addEventListener('click', stopTest);
    resetBtn.addEventListener('click', resetTest);

    // initialise stop button state
    stopBtn.disabled = true;
  }());
  </script>
</body>
</html>
