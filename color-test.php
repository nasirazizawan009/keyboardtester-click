<?php include 'config.php'; ?>
<?php
$pageTitle = 'Monitor Color Test — Screen Color Calibration & Display Check Online Free | KeyboardTester.click';
$pageDescription = 'Free monitor color test online. Check color accuracy, gradient banding, contrast and backlight uniformity on any screen. Fullscreen color panels. No download needed.';
$pageKeywords = 'monitor color test online, screen color test, display color calibration test, color banding test monitor';
$pageOgImage = 'images/screen-test/hero.webp';
$pageOgImageAlt = 'Monitor color test tool showing fullscreen color panels for display calibration';
$currentTool = 'color-test';
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
  echo generateToolPageSchema('screen_tester', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Monitor Color Test', 'url' => '']
  ]);
  ?>

  <style>
    /* Color Test Tool Styles */
    .color-test-wrap {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      padding: 1.5rem;
    }
    #color-test-panel {
      position: relative;
      width: 100%;
      height: 400px;
      background: #000000;
      border-radius: 10px;
      overflow: hidden;
      cursor: pointer;
      border: 2px solid var(--border-color, #e2e8f0);
      box-shadow: 0 4px 24px rgba(0,0,0,0.4);
    }
    #ramp-canvas {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      display: none;
    }
    /* Controls overlay (only visible in fullscreen) */
    #controls-overlay {
      display: none;
      position: absolute;
      bottom: 0; left: 0; right: 0;
      background: rgba(0,0,0,0.6);
      backdrop-filter: blur(4px);
      padding: 0.75rem 1rem;
      align-items: center;
      gap: 0.75rem;
      flex-wrap: wrap;
      justify-content: center;
    }
    #controls-overlay .ctrl-btn {
      background: rgba(255,255,255,0.15);
      border: 1px solid rgba(255,255,255,0.3);
      color: #fff;
      padding: 0.4rem 0.9rem;
      border-radius: 6px;
      cursor: pointer;
      font-size: 0.85rem;
      transition: background 0.15s;
    }
    #controls-overlay .ctrl-btn:hover {
      background: rgba(255,255,255,0.28);
    }
    #controls-overlay .fs-test-name {
      color: #fff;
      font-weight: 600;
      font-size: 0.95rem;
      flex: 1;
      text-align: center;
    }
    /* Info bar */
    .color-info-bar {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      flex-wrap: wrap;
    }
    .color-test-name {
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--heading-color, #1e293b);
      min-width: 120px;
    }
    .color-test-counter {
      font-size: 0.9rem;
      color: var(--text-muted, #475569);
      font-variant-numeric: tabular-nums;
    }
    .color-nav-btns {
      display: flex;
      gap: 0.5rem;
      margin-left: auto;
      flex-wrap: wrap;
    }
    .color-btn {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      color: var(--heading-color, #1e293b);
      padding: 0.45rem 1rem;
      border-radius: 6px;
      cursor: pointer;
      font-size: 0.88rem;
      transition: background 0.15s, border-color 0.15s;
    }
    .color-btn:hover {
      background: var(--primary-color, #4b5eaa);
      border-color: var(--primary-color, #4b5eaa);
      color: #fff;
    }
    .color-btn-fs {
      background: var(--primary-color, #4b5eaa);
      border-color: var(--primary-color, #4b5eaa);
      color: #fff;
    }
    .color-btn-fs:hover {
      opacity: 0.85;
    }
    /* Quick selector */
    .quick-select-label {
      font-size: 0.82rem;
      color: var(--text-muted, #475569);
      margin-bottom: 0.3rem;
    }
    #quick-btns {
      display: flex;
      flex-wrap: wrap;
      gap: 0.4rem;
    }
    .quick-btn {
      padding: 0.3rem 0.65rem;
      font-size: 0.78rem;
      border-radius: 5px;
      border: 1px solid var(--border-color, #e2e8f0);
      background: var(--card-bg, #f8fafc);
      color: var(--heading-color, #1e293b);
      cursor: pointer;
      transition: background 0.13s, border-color 0.13s;
    }
    .quick-btn:hover, .quick-btn.active {
      background: var(--primary-color, #4b5eaa);
      border-color: var(--primary-color, #4b5eaa);
      color: #fff;
    }
    /* Notice */
    .color-notice {
      font-size: 0.8rem;
      color: var(--text-muted, #475569);
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 6px;
      padding: 0.55rem 0.85rem;
    }
    /* Fullscreen panel adjustments */
    #color-test-panel:fullscreen,
    #color-test-panel:-webkit-full-screen,
    #color-test-panel:-moz-full-screen {
      height: 100vh;
      width: 100vw;
      border-radius: 0;
      border: none;
      cursor: none;
    }
    @media (max-width: 600px) {
      #color-test-panel { height: 240px; }
      .color-nav-btns { margin-left: 0; }
    }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">

    <section class="tool-stage" id="color-tool" aria-labelledby="color-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Screen diagnostics</p>
          <h1 id="color-tool-title">Monitor Color Test</h1>
          <p class="section-lede">Cycle through 14 color panels to check color accuracy, gradient banding, backlight uniformity, and contrast.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#what-to-look-for">View testing tips</a>
        </div>
      </div>

      <section class="tool-shell" aria-label="Monitor color test tool">
        <div class="color-test-wrap">

          <!-- Main color panel -->
          <div id="color-test-panel" role="button" aria-label="Color test panel — click or press arrow keys to advance">
            <canvas id="ramp-canvas" aria-hidden="true"></canvas>
            <!-- Fullscreen controls overlay -->
            <div id="controls-overlay" role="toolbar" aria-label="Fullscreen controls">
              <button class="ctrl-btn" onclick="prevTest()" aria-label="Previous test">&#8592; Prev</button>
              <span class="fs-test-name" id="fs-test-name">Pure Black</span>
              <button class="ctrl-btn" onclick="nextTest()" aria-label="Next test">Next &#8594;</button>
              <button class="ctrl-btn" onclick="toggleFullscreen()" aria-label="Exit fullscreen">&#x26F6; Exit</button>
            </div>
          </div>

          <!-- Info bar -->
          <div class="color-info-bar">
            <span class="color-test-name" id="test-name">Pure Black</span>
            <span class="color-test-counter" id="test-counter">1/14</span>
            <div class="color-nav-btns">
              <button class="color-btn" onclick="prevTest()" aria-label="Previous color test">&#8592; Previous</button>
              <button class="color-btn" onclick="nextTest()" aria-label="Next color test">Next &#8594;</button>
              <button class="color-btn color-btn-fs" onclick="toggleFullscreen()" aria-label="Enter fullscreen mode">&#x26F6; Fullscreen (press F)</button>
              <button class="color-btn" onclick="showTest(0)" aria-label="Reset to first test">Reset</button>
            </div>
          </div>

          <!-- Quick selector -->
          <div>
            <p class="quick-select-label">Jump to a test:</p>
            <div id="quick-btns" role="group" aria-label="Quick test selector"></div>
          </div>

          <!-- Browser notice -->
          <p class="color-notice">
            <strong>Tip:</strong> Press <kbd>F</kbd> to go fullscreen, <kbd>→</kbd> / <kbd>Space</kbd> for next, <kbd>←</kbd> for previous.
            Click anywhere on the panel to advance. For accurate results, dim room lighting and let your monitor warm up for 15 minutes.
          </p>

        </div>
      </section>
    </section>

    <!-- Trust strip -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">14 color tests</div>
          <div class="trust-desc">Solids, gradients, ramps & patterns</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Fullscreen mode</div>
          <div class="trust-desc">Edge-to-edge panel inspection</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Works on any display</div>
          <div class="trust-desc">Monitor, laptop, tablet or TV</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">No download needed</div>
          <div class="trust-desc">Runs entirely in your browser</div>
        </div>
      </div>
    </section>

    <!-- SEO Content -->
    <section class="feature-band" id="what-to-look-for" aria-labelledby="look-for-title">
      <div class="container">
        <div class="section-head">
          <h2 id="look-for-title">What to Look for During the Color Test</h2>
          <p class="section-lede">Each test panel targets a specific display defect. Here is what to watch for on each one.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Pure Black</h3>
            <p>Look for grey or light patches, especially near the edges and corners. Bright spots indicate backlight bleed — light leaking through the LCD panel where it should be blocked.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Pure White</h3>
            <p>Check for uneven tinting across the panel. Yellow or pink patches in corners or at the edges suggest poor backlighting or failing LEDs. A uniform white is expected on a healthy display.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Red / Green / Blue</h3>
            <p>Look for uneven brightness across the panel (called uniformity). Areas that appear brighter or darker than the rest suggest uneven backlighting or local dimming issues.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Gradient Tests</h3>
            <p>Watch for visible bands or steps instead of smooth transitions — this is called color banding. It indicates a 6-bit panel that uses dithering to simulate colors it cannot display natively.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="banding-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <h2 id="banding-title">What Is Color Banding?</h2>
          </div>
          <p class="section-lede">Color banding occurs when a monitor cannot display smooth gradients, producing visible steps or stripes instead of a continuous transition.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">6-bit TN</div>
            <h3>Budget panels</h3>
            <p>6-bit TN panels display only 262,144 true colors and use dithering to simulate more. Gradient tests almost always show visible banding on these displays.</p>
          </article>
          <article class="process-card">
            <div class="step-number">8-bit IPS/VA</div>
            <h3>Mid-range panels</h3>
            <p>8-bit IPS and VA panels display 16.7 million true colors. Gradients usually appear smooth, though slight banding can still appear on low-quality units in very dark tones.</p>
          </article>
          <article class="process-card">
            <div class="step-number">10-bit HDR</div>
            <h3>Professional / HDR panels</h3>
            <p>10-bit HDR panels display over 1 billion colors. Gradients are always perfectly smooth. Color banding on these displays would indicate a driver or GPU output issue, not a panel defect.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="bleed-title">
      <div class="container">
        <div class="section-head">
          <h2 id="bleed-title">Backlight Bleed vs IPS Glow</h2>
          <p class="section-lede">Both appear during the Pure Black test but have different causes and different implications for your display.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Backlight Bleed</h3>
            <p>Bright white or light-coloured patches at the edges or corners of a pure black screen. Caused by physical gaps in the panel assembly that allow backlight to leak through. Severe bleed may qualify for a warranty replacement.</p>
          </article>
          <article class="landing-feature-card">
            <h3>IPS Glow</h3>
            <p>A silver or golden shimmer visible only at extreme viewing angles near the corners of an IPS display. This is a normal characteristic of the IPS panel technology, not a manufacturing defect, and is not covered by warranties.</p>
          </article>
          <article class="landing-feature-card">
            <h3>How to Test</h3>
            <p>Select the Pure Black test panel and view it in a dimly lit or dark room. Backlight bleed is visible head-on; IPS glow appears only when you tilt or look at the screen from the side at a shallow angle.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Warranty Claim</h3>
            <p>Document bleed patches in a photo taken head-on in a dark room. Most manufacturers consider bleed a defect only if it is visible under normal use conditions. Extreme bleed that is distracting during everyday use is typically covered.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="calibration-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <h2 id="calibration-title">Monitor Calibration After This Test</h2>
          </div>
          <p class="section-lede">If colors look inaccurate, these steps will help you improve display quality.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>Use your monitor's OSD</h3>
            <p>Access the On-Screen Display menu (usually a button on the monitor bezel). Adjust color temperature (try 6500K for standard use), brightness, and contrast to match what you see in the test panels.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>Windows / macOS calibration</h3>
            <p>Both operating systems include a built-in display calibration wizard. On Windows, search for "Calibrate display color." On macOS, go to System Settings → Displays → Color → Calibrate.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>Hardware colorimeter</h3>
            <p>For professional or color-critical work, use a hardware colorimeter such as a Datacolor Spyder or X-Rite i1Display. These devices measure the actual light output and create a custom ICC color profile for your specific panel.</p>
          </article>
        </div>

        <div style="margin-top: 2rem; display: flex; gap: 1rem; flex-wrap: wrap;">
          <p style="color: var(--text-muted, #475569); font-size: 0.9rem;">
            Also useful:
            <a href="<?php echo url('screentestindex.php'); ?>" style="color: var(--primary-color, #4b5eaa);">Dead Pixel Test</a>
            &mdash; check for dead and stuck pixels using fullscreen solid colors.
            &nbsp;|&nbsp;
            <a href="<?php echo url('refresh-rate-test.php'); ?>" style="color: var(--primary-color, #4b5eaa);">Refresh Rate Test</a>
            &mdash; measure your monitor's actual refresh rate.
          </p>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'includes/related-tools.php'; ?>

  </main>

  <?php include 'footer.php'; ?>

  <script>
  (function() {
    var COLOR_TESTS = [
      { name: 'Pure Black',      type: 'solid',    bg: '#000000' },
      { name: 'Pure White',      type: 'solid',    bg: '#FFFFFF' },
      { name: 'Pure Red',        type: 'solid',    bg: '#FF0000' },
      { name: 'Pure Green',      type: 'solid',    bg: '#00FF00' },
      { name: 'Pure Blue',       type: 'solid',    bg: '#0000FF' },
      { name: '50% Grey',        type: 'solid',    bg: '#808080' },
      { name: 'Dark Grey',       type: 'solid',    bg: '#404040' },
      { name: 'Light Grey',      type: 'solid',    bg: '#C0C0C0' },
      { name: 'Red Gradient',    type: 'gradient', from: '#000000', to: '#FF0000' },
      { name: 'Green Gradient',  type: 'gradient', from: '#000000', to: '#00FF00' },
      { name: 'Blue Gradient',   type: 'gradient', from: '#000000', to: '#0000FF' },
      { name: 'White Gradient',  type: 'gradient', from: '#000000', to: '#FFFFFF' },
      { name: 'Color Ramp',      type: 'ramp' },
      { name: 'Grid Pattern',    type: 'pattern' },
    ];
    var currentIndex = 0;

    var testPanel  = document.getElementById('color-test-panel');
    var rampCanvas = document.getElementById('ramp-canvas');

    function updateQuickBtns() {
      var btns = document.querySelectorAll('.quick-btn');
      btns.forEach(function(btn, i) {
        btn.classList.toggle('active', i === currentIndex);
      });
    }

    function showTest(index) {
      currentIndex = index;
      var test = COLOR_TESTS[index];
      document.getElementById('test-name').textContent = test.name;
      document.getElementById('test-counter').textContent = (index + 1) + '/' + COLOR_TESTS.length;
      var fsName = document.getElementById('fs-test-name');
      if (fsName) fsName.textContent = test.name;
      rampCanvas.style.display = 'none';
      testPanel.style.background = '';
      if (test.type === 'solid') {
        testPanel.style.background = test.bg;
      } else if (test.type === 'gradient') {
        testPanel.style.background = 'linear-gradient(to right, ' + test.from + ', ' + test.to + ')';
      } else if (test.type === 'ramp') {
        rampCanvas.style.display = 'block';
        drawColorRamp();
      } else if (test.type === 'pattern') {
        rampCanvas.style.display = 'block';
        drawCheckerboard();
      }
      updateQuickBtns();
    }

    function drawColorRamp() {
      rampCanvas.width  = rampCanvas.offsetWidth  || testPanel.offsetWidth;
      rampCanvas.height = rampCanvas.offsetHeight || testPanel.offsetHeight;
      var ctx = rampCanvas.getContext('2d');
      var gradient = ctx.createLinearGradient(0, 0, rampCanvas.width, 0);
      var stops = [
        'hsl(0,100%,50%)', 'hsl(60,100%,50%)', 'hsl(120,100%,50%)',
        'hsl(180,100%,50%)', 'hsl(240,100%,50%)', 'hsl(300,100%,50%)', 'hsl(360,100%,50%)'
      ];
      stops.forEach(function(c, i) { gradient.addColorStop(i / (stops.length - 1), c); });
      ctx.fillStyle = gradient;
      ctx.fillRect(0, 0, rampCanvas.width, rampCanvas.height);
      var bw = ctx.createLinearGradient(0, 0, rampCanvas.width, 0);
      bw.addColorStop(0, 'black');
      bw.addColorStop(1, 'white');
      ctx.fillStyle = bw;
      ctx.fillRect(0, rampCanvas.height / 2, rampCanvas.width, rampCanvas.height / 2);
    }

    function drawCheckerboard() {
      rampCanvas.width  = rampCanvas.offsetWidth  || testPanel.offsetWidth;
      rampCanvas.height = rampCanvas.offsetHeight || testPanel.offsetHeight;
      var ctx = rampCanvas.getContext('2d');
      var size = 20;
      for (var x = 0; x < rampCanvas.width; x += size) {
        for (var y = 0; y < rampCanvas.height; y += size) {
          ctx.fillStyle = ((x / size + y / size) % 2 === 0) ? '#000' : '#FFF';
          ctx.fillRect(x, y, size, size);
        }
      }
    }

    function nextTest() { showTest((currentIndex + 1) % COLOR_TESTS.length); }
    function prevTest() { showTest((currentIndex - 1 + COLOR_TESTS.length) % COLOR_TESTS.length); }

    document.addEventListener('keydown', function(e) {
      if (e.code === 'ArrowRight' || e.code === 'Space') { e.preventDefault(); nextTest(); }
      if (e.code === 'ArrowLeft') prevTest();
      if (e.code === 'KeyF') toggleFullscreen();
    });

    testPanel.addEventListener('click', nextTest);

    function toggleFullscreen() {
      if (!document.fullscreenElement) {
        testPanel.requestFullscreen().catch(function(err) { console.log('Fullscreen error:', err); });
      } else {
        document.exitFullscreen();
      }
    }

    document.addEventListener('fullscreenchange', function() {
      var isFS = !!document.fullscreenElement;
      document.getElementById('controls-overlay').style.display = isFS ? 'flex' : 'none';
      // Redraw canvas-based tests after resize
      if (isFS) {
        setTimeout(function() {
          var test = COLOR_TESTS[currentIndex];
          if (test.type === 'ramp') drawColorRamp();
          if (test.type === 'pattern') drawCheckerboard();
        }, 300);
      }
    });

    // Initial render
    showTest(0);

    // Generate quick-select buttons
    var quickBtns = document.getElementById('quick-btns');
    COLOR_TESTS.forEach(function(test, i) {
      var btn = document.createElement('button');
      btn.textContent = test.name;
      btn.className = 'quick-btn';
      if (i === 0) btn.classList.add('active');
      btn.onclick = function() { showTest(i); };
      quickBtns.appendChild(btn);
    });

    // Expose for inline onclick attributes in controls overlay
    window.nextTest = nextTest;
    window.prevTest = prevTest;
    window.toggleFullscreen = toggleFullscreen;
  })();
  </script>
</body>
</html>
