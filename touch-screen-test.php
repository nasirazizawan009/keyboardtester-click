<?php include 'config.php'; ?>
<?php
$pageTitle = 'Touch Screen Test — Multi-Touch, Dead Zone & Ghost Touch Online Free | KeyboardTester.click';
$pageDescription = 'Free touch screen test online. Check for dead zones, ghost touches and multi-touch support on phone, tablet or laptop. Draw fingers to paint the screen. No app needed.';
$pageKeywords = 'touch screen test online, touchscreen tester, test touch screen online, multi touch test online, ghost touch test';
$pageOgImage = 'images/screen-test/hero.webp';
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
    /* Touch Screen Test Tool — embedded scoped styles */
    .touch-tool {
      max-width: 720px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
      text-align: center;
    }

    .touch-tool h1 {
      font-size: clamp(1.75rem, 4vw, 2.5rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #1e293b);
    }

    .touch-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.75rem;
    }

    /* Stat bar */
    .touch-stats {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 1.25rem;
      flex-wrap: wrap;
    }

    .touch-stat {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 8px;
      padding: 0.6rem 1.25rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-width: 110px;
    }

    .touch-stat .stat-val {
      font-size: 1.75rem;
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      color: var(--primary-color, #4b5eaa);
      line-height: 1;
    }

    .touch-stat .stat-lbl {
      font-size: 0.72rem;
      color: var(--text-muted, #475569);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 0.25rem;
    }

    /* Canvas */
    #touch-canvas {
      display: block;
      width: 100%;
      height: 300px;
      border: 2px dashed var(--border-color, #e2e8f0);
      border-radius: 12px;
      touch-action: none;
      cursor: crosshair;
      margin-bottom: 1.25rem;
      background: var(--card-bg, rgba(241,245,249,0.8));
    }

    #touch-canvas.has-input {
      border-style: solid;
      border-color: var(--primary-color, #4b5eaa);
    }

    /* Controls */
    .touch-controls {
      display: flex;
      justify-content: center;
      gap: 0.75rem;
      flex-wrap: wrap;
      margin-bottom: 1.25rem;
    }

    .touch-controls button {
      padding: 0.55rem 1.35rem;
      border: 2px solid var(--border-color, #e2e8f0);
      border-radius: 8px;
      background: transparent;
      color: var(--text-muted, #475569);
      font-family: inherit;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: border-color 0.15s, color 0.15s, background 0.15s;
    }

    .touch-controls button:hover {
      border-color: var(--primary-color, #4b5eaa);
      color: var(--primary-color, #4b5eaa);
    }

    .touch-controls button:focus-visible {
      outline: 2px solid var(--primary-color, #4b5eaa);
      outline-offset: 2px;
    }

    #ghost-test-btn.ghost-running {
      border-color: #f87171;
      color: #f87171;
      pointer-events: none;
    }

    /* Ghost panel */
    #ghost-panel {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      padding: 1rem 1.5rem;
      margin-bottom: 1.25rem;
      font-size: 0.95rem;
      color: var(--text-muted, #475569);
    }

    #ghost-status {
      font-size: 1.05rem;
      font-weight: 600;
      color: var(--heading-color, #1e293b);
      margin-bottom: 0.35rem;
    }

    #ghost-status.ghost-ok    { color: #22c55e; }
    #ghost-status.ghost-warn  { color: #f87171; }

    #ghost-countdown {
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: var(--primary-color, #4b5eaa);
    }

    /* Privacy / tip notes */
    .privacy-note,
    .tip-note {
      font-size: 0.83rem;
      color: var(--text-muted, #475569);
      margin-top: 0.5rem;
      margin-bottom: 0;
    }

    .tip-note {
      font-weight: 500;
    }

    @media (max-width: 480px) {
      .touch-tool {
        padding: 1.25rem 1rem 2rem;
      }
      .touch-stats {
        gap: 0.6rem;
      }
      .touch-stat {
        min-width: 90px;
        padding: 0.5rem 0.85rem;
      }
      #touch-canvas {
        height: 260px;
      }
    }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">

    <!-- ── Tool stage ──────────────────────────────────────────────────── -->
    <section class="tool-stage" id="touch-screen-test-tool" aria-labelledby="touch-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="touch-tool-title">Touch Screen Tester</h2>
          <p class="section-lede">Draw with fingers, check dead zones, and detect ghost touches — all in one place.</p>
        </div>
      </div>

      <section id="touch-tester" class="tool-shell" aria-label="Touch screen test tool">
        <div class="touch-tool">
          <h1>Touch Screen Test</h1>
          <p class="tool-subtitle">Draw with your fingers to test for dead zones. Works on phone, tablet and touch laptops.</p>

          <!-- Stat bar -->
          <div class="touch-stats" role="status" aria-live="polite" aria-label="Touch statistics">
            <div class="touch-stat">
              <span class="stat-val" id="active-touches">0</span>
              <span class="stat-lbl">Active Fingers</span>
            </div>
            <div class="touch-stat">
              <span class="stat-val" id="max-simultaneous">0</span>
              <span class="stat-lbl">Max Simultaneous</span>
            </div>
            <div class="touch-stat">
              <span class="stat-val" id="total-touches">0</span>
              <span class="stat-lbl">Total Touches</span>
            </div>
          </div>

          <!-- Canvas -->
          <canvas id="touch-canvas" aria-label="Touch drawing area — draw with fingers or mouse to test the screen surface"></canvas>

          <!-- Buttons -->
          <div class="touch-controls" role="group" aria-label="Touch test controls">
            <button id="clear-btn" aria-label="Clear the canvas">Clear Canvas</button>
            <button id="ghost-test-btn" aria-label="Start 10-second ghost touch test">Ghost Touch Test (10s)</button>
            <button id="reset-btn" aria-label="Reset all stats and canvas">Reset All</button>
          </div>

          <!-- Ghost touch status (hidden until test starts) -->
          <div id="ghost-panel" style="display:none;" role="status" aria-live="assertive">
            <div id="ghost-status">Do NOT touch the screen...</div>
            <div>Countdown: <span id="ghost-countdown">10</span>s</div>
          </div>

          <p class="privacy-note">This test runs entirely in your browser. No data is collected.</p>
          <p class="tip-note">For best results, open this page on your phone or tablet.</p>
        </div>
      </section>
    </section>

    <!-- ── Trust strip ─────────────────────────────────────────────────── -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Tests dead zones</div>
          <div class="trust-desc">Draw across the entire surface to expose unresponsive areas</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Ghost touch detection</div>
          <div class="trust-desc">10-second idle test flags phantom inputs automatically</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Multi-touch support</div>
          <div class="trust-desc">Counts simultaneous finger contacts in real time</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Works on any device</div>
          <div class="trust-desc">Phone, tablet, or touch laptop — no app needed</div>
        </div>
      </div>
    </section>

    <!-- ── SEO content ─────────────────────────────────────────────────── -->
    <section class="feature-band" aria-labelledby="how-to-test-title">
      <div class="container">
        <div class="section-head">
          <h2 id="how-to-test-title">How to Test Your Touch Screen</h2>
          <p class="section-lede">
            Draw with your finger across the entire screen surface. Any area where no trail appears is
            a dead zone. Cover all four corners and edges as these areas most commonly develop dead zones
            after screen damage. A uniform colour trail from corner to corner means the digitizer is
            responding correctly across the full display area.
          </p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Cover the corners first</h3>
            <p>Corners take the most physical stress. Swipe diagonally through each corner to confirm all four edges respond.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Slow and steady strokes</h3>
            <p>Draw slowly so you can see exactly where the trail stops or skips, rather than fast swipes that are hard to read.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Remove screen protectors</h3>
            <p>A poorly adhered or thick screen protector can create air-gap dead zones. Test with and without it to compare.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Repeat after cleaning</h3>
            <p>Moisture or grime on the glass can create false negatives. Dry the screen thoroughly and retest before drawing conclusions.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="ghost-touch-title">
      <div class="container">
        <div class="section-head">
          <h2 id="ghost-touch-title">What Are Ghost Touches?</h2>
          <p class="section-lede">
            Ghost touches are inputs your screen registers without you touching it. Common causes include a
            damaged digitizer, water damage, a faulty screen protector, or electromagnetic interference from
            a nearby charger or cable. Use the <strong>Ghost Touch Test</strong> above to check for 10 seconds
            without touching the screen. If touches appear on the canvas while your hands are clear of the
            display, the digitizer is generating phantom input.
          </p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Cracked digitizer</h3>
            <p>A damaged digitizer layer often sends continuous phantom signals in the cracked region, even when the LCD panel looks intact.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Water or humidity damage</h3>
            <p>Liquid bridging internal circuits can cause erratic phantom taps. Allow the device to dry completely and retest.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Charger interference</h3>
            <p>Cheap third-party chargers generate electrical noise that travels through the ground path and interferes with the capacitive layer.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Faulty screen protector</h3>
            <p>Tempered glass protectors with trapped air bubbles or conductive adhesive can disrupt the capacitive field and create ghost events.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="multi-touch-title">
      <div class="container">
        <div class="section-head">
          <h2 id="multi-touch-title">Multi-Touch Test</h2>
          <p class="section-lede">
            Place multiple fingers simultaneously on the screen. Most smartphones support 5–10 touch points.
            Tablets typically support 10 or more. The <strong>Max Simultaneous</strong> counter above shows the
            highest number of contacts recognised at once. If your device only registers 2 fingers, apps
            requiring pinch-to-zoom or multi-finger gestures may not work correctly.
          </p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>What most devices support</h3>
            <p>Modern Android and iOS phones typically support 5 to 10 simultaneous touch points. Budget devices often stop at 5.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Why it matters for apps</h3>
            <p>Piano and instrument apps, drawing apps, and multi-player touch games all require 4 or more simultaneous inputs to work as intended.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Pinch-to-zoom minimum</h3>
            <p>Pinch gestures require at least 2 registered contacts. If your device misses one, zoom and rotate gestures will feel broken or reversed.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Touch laptop note</h3>
            <p>Windows touch laptops and convertibles typically support 10 touch points but can vary by manufacturer and driver version.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="repair-title">
      <div class="container">
        <div class="section-head">
          <h2 id="repair-title">Should I Repair or Replace a Faulty Touch Screen?</h2>
          <p class="section-lede">
            If dead zones cover less than 10% of the screen and are in a non-critical area, repair is usually
            worth it. If ghost touches are frequent and affect usability — triggering random taps, scrolls, or
            app launches — screen replacement is recommended. Always test a repaired screen with this tool
            before leaving the repair shop to confirm all areas respond and no ghost touches remain.
          </p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Before authorising repair</h3>
            <p>Use this tool to document the exact location of dead zones so you can verify the same area is fixed after the repair.</p>
          </article>
          <article class="landing-feature-card">
            <h3>After repair verification</h3>
            <p>Run the full-surface draw test, multi-touch test, and 10-second ghost test in the shop before you hand over payment.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Digitizer vs full assembly</h3>
            <p>Some repair shops only replace the glass layer, not the digitizer beneath. Confirm the digitizer is also replaced if ghost touches persist post-repair.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Related: Dead Pixel Test</h3>
            <p>A faulty screen replacement can also introduce dead pixels. After any screen repair, also run our <a href="<?php echo url('screentestindex.php'); ?>">Dead Pixel Test</a> to check the LCD panel.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ── Related tools ───────────────────────────────────────────────── -->
    <?php include 'includes/components/tools-list.php'; ?>
    <?php $currentTool = 'touch-screen'; include 'includes/related-tools.php'; ?>

  </main>

  <?php include 'footer.php'; ?>

  <script>
  (function () {
    'use strict';

    var canvas = document.getElementById('touch-canvas');
    var ctx    = canvas.getContext('2d');

    var activePointers   = new Map();
    var maxSimultaneous  = 0;
    var totalTouches     = 0;
    var ghostCheckActive = false;
    var ghostTouchDetected = false;
    var ghostTimer       = null;

    var COLORS = [
      '#E74C3C', '#3498DB', '#2ECC71', '#F39C12', '#9B59B6',
      '#1ABC9C', '#E67E22', '#34495E', '#E91E63', '#00BCD4'
    ];

    // ── Canvas sizing ────────────────────────────────────────────────────
    function resizeCanvas() {
      var rect = canvas.getBoundingClientRect();
      canvas.width  = rect.width;
      canvas.height = rect.height;
    }
    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    // ── Pointer events ───────────────────────────────────────────────────
    canvas.addEventListener('pointerdown', function (e) {
      e.preventDefault();
      canvas.setPointerCapture(e.pointerId);

      if (ghostCheckActive) {
        ghostTouchDetected = true;
      }

      var color = COLORS[activePointers.size % COLORS.length];
      activePointers.set(e.pointerId, { x: e.offsetX, y: e.offsetY, color: color });

      totalTouches++;
      var count = activePointers.size;
      if (count > maxSimultaneous) { maxSimultaneous = count; }

      updateStats();
      canvas.classList.add('has-input');

      // Draw starting dot with finger number label
      ctx.beginPath();
      ctx.arc(e.offsetX, e.offsetY, 16, 0, Math.PI * 2);
      ctx.fillStyle = color;
      ctx.fill();
      ctx.fillStyle = 'white';
      ctx.font = 'bold 12px sans-serif';
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillText(String(count), e.offsetX, e.offsetY);
    });

    canvas.addEventListener('pointermove', function (e) {
      e.preventDefault();
      var ptr = activePointers.get(e.pointerId);
      if (!ptr) { return; }

      ctx.beginPath();
      ctx.moveTo(ptr.x, ptr.y);
      ctx.lineTo(e.offsetX, e.offsetY);
      ctx.strokeStyle = ptr.color;
      ctx.lineWidth   = 6;
      ctx.lineCap     = 'round';
      ctx.stroke();

      ptr.x = e.offsetX;
      ptr.y = e.offsetY;
    });

    canvas.addEventListener('pointerup', function (e) {
      activePointers.delete(e.pointerId);
      updateStats();
    });

    canvas.addEventListener('pointercancel', function (e) {
      activePointers.delete(e.pointerId);
      updateStats();
    });

    // ── Stats display ────────────────────────────────────────────────────
    function updateStats() {
      document.getElementById('active-touches').textContent    = activePointers.size;
      document.getElementById('max-simultaneous').textContent  = maxSimultaneous;
      document.getElementById('total-touches').textContent     = totalTouches;
    }

    // ── Clear canvas ─────────────────────────────────────────────────────
    function clearCanvas() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      activePointers.clear();
      canvas.classList.remove('has-input');
      updateStats();
    }

    // ── Ghost touch test ─────────────────────────────────────────────────
    function startGhostTest() {
      ghostCheckActive   = true;
      ghostTouchDetected = false;

      var panel       = document.getElementById('ghost-panel');
      var statusEl    = document.getElementById('ghost-status');
      var countdownEl = document.getElementById('ghost-countdown');
      var ghostBtn    = document.getElementById('ghost-test-btn');

      panel.style.display = 'block';
      statusEl.textContent = 'Do NOT touch the screen...';
      statusEl.className   = '';
      ghostBtn.disabled    = true;
      ghostBtn.classList.add('ghost-running');

      var countdown = 10;
      countdownEl.textContent = countdown;

      ghostTimer = setInterval(function () {
        countdown--;
        countdownEl.textContent = countdown;

        if (countdown <= 0) {
          clearInterval(ghostTimer);
          ghostTimer         = null;
          ghostCheckActive   = false;
          ghostBtn.disabled  = false;
          ghostBtn.classList.remove('ghost-running');

          if (ghostTouchDetected) {
            statusEl.textContent = 'Ghost touches detected! Screen may be faulty.';
            statusEl.className   = 'ghost-warn';
          } else {
            statusEl.textContent = 'No ghost touches detected. Screen looks healthy.';
            statusEl.className   = 'ghost-ok';
          }
        }
      }, 1000);
    }

    // ── Reset all ────────────────────────────────────────────────────────
    function resetAll() {
      if (ghostTimer) {
        clearInterval(ghostTimer);
        ghostTimer = null;
      }
      clearCanvas();
      maxSimultaneous    = 0;
      totalTouches       = 0;
      ghostCheckActive   = false;
      ghostTouchDetected = false;

      updateStats();

      var panel    = document.getElementById('ghost-panel');
      var ghostBtn = document.getElementById('ghost-test-btn');
      panel.style.display = 'none';
      ghostBtn.disabled   = false;
      ghostBtn.classList.remove('ghost-running');
    }

    // ── Button bindings ──────────────────────────────────────────────────
    document.getElementById('clear-btn').addEventListener('click', clearCanvas);
    document.getElementById('ghost-test-btn').addEventListener('click', startGhostTest);
    document.getElementById('reset-btn').addEventListener('click', resetAll);

  }());
  </script>
</body>
</html>
