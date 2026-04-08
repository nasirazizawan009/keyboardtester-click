<?php include 'config.php'; ?>
<?php
$pageTitle = 'Gamepad Tester — Test Controller Buttons, Stick Drift & Triggers Online | KeyboardTester.click';
$pageDescription = 'Free gamepad tester online. Test PS5, Xbox, Switch and PC controller buttons, analog stick drift, triggers and vibration. Works in browser. No download needed.';
$pageKeywords = 'gamepad tester online, controller test online, stick drift test online, ps5 controller test, xbox controller test online';
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
    /* Gamepad Tester — scoped styles */
    .gamepad-tool {
      max-width: 720px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
    }

    .gamepad-tool h1 {
      font-size: clamp(1.75rem, 4vw, 2.5rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #1e293b);
    }

    .gamepad-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.5rem;
    }

    /* Connection banner */
    .connection-banner {
      padding: 0.75rem 1.25rem;
      border-radius: 10px;
      background: rgba(99, 102, 241, 0.1);
      border: 1px solid var(--border-color, #e2e8f0);
      margin-bottom: 1rem;
      color: var(--text-muted, #475569);
      font-size: 0.95rem;
    }

    .connection-banner.connected {
      background: rgba(34, 197, 94, 0.1);
      border-color: #22c55e;
      color: #22c55e;
    }

    /* Controller info row */
    #controller-info {
      display: flex;
      gap: 1.5rem;
      flex-wrap: wrap;
      margin-bottom: 1rem;
      font-size: 0.9rem;
      color: var(--text-color, #1e293b);
    }

    /* Buttons section */
    .buttons-section {
      margin-bottom: 1.75rem;
    }

    .buttons-section h3,
    .sticks-section h3,
    .vibration-section h3 {
      font-size: 1rem;
      font-weight: 600;
      color: var(--heading-color, #1e293b);
      margin-bottom: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .buttons-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .gamepad-btn {
      width: 60px;
      height: 40px;
      border-radius: 8px;
      border: 1.5px solid var(--border-color, #e2e8f0);
      background: var(--card-bg, #f8fafc);
      font-size: 0.75rem;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.1s, border-color 0.1s, transform 0.1s, color 0.1s;
      color: var(--text-muted, #475569);
      font-family: inherit;
      cursor: default;
      user-select: none;
    }

    .gamepad-btn.active {
      background: var(--primary-color, #4b5eaa);
      border-color: var(--primary-color, #4b5eaa);
      color: #fff;
      transform: scale(1.1);
    }

    /* Sticks section */
    .sticks-section {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 1.75rem;
    }

    .stick-group {
      text-align: center;
    }

    .stick-group canvas {
      display: block;
      margin: 0 auto 0.5rem;
      border-radius: 50%;
      background: rgba(30, 41, 59, 0.6);
      border: 1px solid var(--border-color, #e2e8f0);
    }

    .stick-group div {
      font-size: 0.85rem;
      color: var(--text-muted, #475569);
      margin-bottom: 0.2rem;
      font-family: 'JetBrains Mono', monospace;
    }

    /* Vibration section */
    .vibration-section {
      margin-bottom: 1.75rem;
    }

    .vibration-section .vib-btns {
      display: flex;
      gap: 0.75rem;
      flex-wrap: wrap;
    }

    .vib-btn {
      padding: 0.5rem 1.25rem;
      border: 1.5px solid var(--border-color, #e2e8f0);
      border-radius: 8px;
      background: var(--card-bg, #f8fafc);
      color: var(--text-muted, #475569);
      font-family: inherit;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: border-color 0.15s, color 0.15s, background 0.15s;
    }

    .vib-btn:hover {
      border-color: var(--primary-color, #4b5eaa);
      color: var(--primary-color, #4b5eaa);
    }

    .vib-btn:active {
      background: var(--primary-color, #4b5eaa);
      border-color: var(--primary-color, #4b5eaa);
      color: #fff;
    }

    /* Reset button */
    #reset-btn {
      display: block;
      padding: 0.6rem 1.75rem;
      border: none;
      border-radius: 8px;
      background: var(--primary-color, #4b5eaa);
      color: #fff;
      font-family: inherit;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      transition: opacity 0.15s, transform 0.1s;
      margin-bottom: 1.25rem;
    }

    #reset-btn:hover {
      opacity: 0.88;
      transform: translateY(-1px);
    }

    #reset-btn:active {
      transform: translateY(0);
    }

    /* Privacy note */
    .privacy-note {
      font-size: 0.82rem;
      color: var(--text-muted, #475569);
    }

    /* Internal links */
    .gamepad-internal-links {
      margin-top: 1rem;
      font-size: 0.9rem;
      color: var(--text-muted, #475569);
    }

    .gamepad-internal-links a {
      color: var(--primary-color, #4b5eaa);
      text-decoration: none;
      font-weight: 600;
    }

    .gamepad-internal-links a:hover {
      text-decoration: underline;
    }

    @media (max-width: 480px) {
      .gamepad-btn {
        width: 52px;
        height: 36px;
        font-size: 0.68rem;
      }

      .sticks-section {
        gap: 1.25rem;
      }

      .gamepad-tool {
        padding: 1.25rem 1rem 2rem;
      }
    }
  </style>

  <!-- Structured Data (JSON-LD) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebApplication",
    "name": "Gamepad Tester",
    "url": "https://keyboardtester.click/gamepad-test.php",
    "description": "Free browser-based gamepad tester. Test PS5, Xbox, Switch and PC controller buttons, analog stick drift, triggers and vibration without any download.",
    "applicationCategory": "UtilitiesApplication",
    "operatingSystem": "Any",
    "isAccessibleForFree": true,
    "offers": {
      "@type": "Offer",
      "price": "0",
      "priceCurrency": "USD"
    },
    "publisher": {
      "@type": "Organization",
      "name": "KeyboardTester.Click",
      "url": "https://keyboardtester.click/"
    },
    "featureList": [
      "Test all 17 standard gamepad buttons",
      "Analog stick drift detection",
      "Left and right trigger testing",
      "Vibration / rumble motor test",
      "Works with PS5 DualSense, PS4 DualShock, Xbox, Switch Pro, and generic USB/Bluetooth gamepads",
      "No download or installation required"
    ]
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "https://keyboardtester.click/"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "Gamepad Tester",
        "item": "https://keyboardtester.click/gamepad-test.php"
      }
    ]
  }
  </script>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "How do I use the online gamepad tester?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Connect your controller via USB or Bluetooth, then open this page and press any button. The browser activates the Gamepad API and starts detecting all inputs automatically. Buttons light up when pressed, analog sticks show live position on a canvas, and drift is calculated in real time."
        }
      },
      {
        "@type": "Question",
        "name": "Which controllers work with this gamepad tester?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Any controller that exposes itself via the browser Gamepad API will work. This includes PS5 DualSense, PS4 DualShock 4, Xbox One and Xbox Series X/S controllers (wired or with the Xbox Wireless Adapter), Nintendo Switch Pro Controller, and most generic USB or Bluetooth gamepads."
        }
      },
      {
        "@type": "Question",
        "name": "How do I know if my controller has stick drift?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Leave both analog sticks completely untouched. If the position dots move away from the center on their own, your controller has drift. A magnitude value above 0.05 when the sticks are at rest is a reliable indicator of drift. The tool shows the live drift magnitude and flags it as 'DRIFT!' when it exceeds the threshold."
        }
      },
      {
        "@type": "Question",
        "name": "Why is the vibration test not working?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Vibration requires the Gamepad Haptics API (navigator.getGamepads()[n].vibrationActuator), which is supported in Chrome and Edge on Windows and Android. It is not supported in Firefox or Safari. If vibration does not work, also check that vibration is enabled in your OS or console settings."
        }
      }
    ]
  }
  </script>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">

    <!-- Hero -->
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Controller Diagnostics</p>
          <h1 class="hero-title">Gamepad Tester</h1>
          <p class="hero-lede">Connect your controller and press any button to start. Tests all buttons, analog sticks, triggers, and vibration motors. Works with PS5, Xbox, Switch, and generic gamepads — no download needed.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#gamepad-tool">Start gamepad test</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">Browse all tools</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Works with PS5/Xbox/Switch</span>
            <span class="hero-badge">Detects stick drift</span>
            <span class="hero-badge">Browser based</span>
          </div>
          <div class="hero-metrics">
            <div class="metric-card">
              <span class="metric-value">17</span>
              <span class="metric-label">Buttons tested</span>
            </div>
            <div class="metric-card">
              <span class="metric-value">Live</span>
              <span class="metric-label">Drift detection</span>
            </div>
            <div class="metric-card">
              <span class="metric-value">Free</span>
              <span class="metric-label">No download</span>
            </div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <img src="<?php echo url('images/mouse/hero.webp'); ?>" alt="Gamepad tester — test controller buttons and stick drift online" loading="eager">
          </div>
          <div class="hero-stack">
            <div class="mini-card">
              <div class="mini-title">Stick drift detection</div>
              <p>Live magnitude reading flags drift before it gets worse, with a clear OK or DRIFT! indicator.</p>
            </div>
            <div class="mini-card">
              <div class="mini-title">Vibration test included</div>
              <p>Fire weak, medium, or strong rumble to confirm both light and heavy motors are working.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tool Stage -->
    <section class="tool-stage" id="gamepad-tool" aria-labelledby="gamepad-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="gamepad-tool-title">Gamepad Tester</h2>
          <p class="section-lede">Connect your controller, press any button to activate, and test every input in real time.</p>
        </div>
      </div>

      <section class="tool-shell" aria-label="Gamepad test tool">
        <div class="gamepad-tool">
          <h1>Gamepad Tester</h1>
          <p class="tool-subtitle">Connect your controller and press any button to start. Works with PS5, Xbox, Switch, and PC gamepads.</p>

          <!-- Connection status -->
          <div id="connection-status" class="connection-banner">Connect your controller and press any button</div>
          <div id="controller-info" style="display:none;">
            <span>Controller: <b id="controller-name">--</b></span>
            <span>Buttons: <b id="button-count">--</b></span>
            <span>Axes: <b id="axis-count">--</b></span>
          </div>

          <!-- Buttons grid -->
          <div class="buttons-section">
            <h3>Buttons</h3>
            <div class="buttons-grid" id="buttons-grid">
              <!-- Populated by JS -->
            </div>
          </div>

          <!-- Analog sticks -->
          <div class="sticks-section">
            <div class="stick-group">
              <h3>Left Stick</h3>
              <canvas id="left-stick-canvas" width="120" height="120" aria-label="Left analog stick position"></canvas>
              <div>X: <span id="left-x">0.000</span></div>
              <div>Y: <span id="left-y">0.000</span></div>
              <div>Drift: <span id="left-drift-val">0.000</span> — <b id="left-drift-status" style="color:#2ECC71">OK</b></div>
            </div>
            <div class="stick-group">
              <h3>Right Stick</h3>
              <canvas id="right-stick-canvas" width="120" height="120" aria-label="Right analog stick position"></canvas>
              <div>X: <span id="right-x">0.000</span></div>
              <div>Y: <span id="right-y">0.000</span></div>
              <div>Drift: <span id="right-drift-val">0.000</span> — <b id="right-drift-status" style="color:#2ECC71">OK</b></div>
            </div>
          </div>

          <!-- Vibration test -->
          <div class="vibration-section">
            <h3>Vibration / Rumble Test</h3>
            <div class="vib-btns">
              <button class="vib-btn" onclick="testVibration(0.3)">Weak</button>
              <button class="vib-btn" onclick="testVibration(0.6)">Medium</button>
              <button class="vib-btn" onclick="testVibration(1.0)">Strong</button>
            </div>
          </div>

          <!-- Reset -->
          <button id="reset-btn" aria-label="Reset gamepad tester">Reset</button>

          <p class="privacy-note">This test runs entirely in your browser. No data is collected.</p>

          <!-- Internal links -->
          <p class="gamepad-internal-links">
            Also test your <a href="<?php echo url('mouse-test.php'); ?>">Mouse Buttons</a> or check your <a href="<?php echo url('latency-checker.php'); ?>">Input Latency</a>.
          </p>
        </div>
      </section>
    </section>

    <!-- Trust strip -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Works with PS5/Xbox/Switch</div>
          <div class="trust-desc">All major controller brands supported</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Detects stick drift</div>
          <div class="trust-desc">Live magnitude reading with OK/DRIFT flag</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Tests all 17 buttons</div>
          <div class="trust-desc">Face, shoulder, trigger, D-pad, and Home</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">No download needed</div>
          <div class="trust-desc">Runs entirely in your browser</div>
        </div>
      </div>
    </section>

    <!-- SEO section 1: How to use -->
    <section class="feature-band" aria-labelledby="how-to-use-heading">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Getting started</p>
          <h2 id="how-to-use-heading">How to Use the Gamepad Tester</h2>
          <p class="section-lede">Connect via USB or Bluetooth, press any button to activate in the browser, and all inputs light up in real time.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Connect your controller</h3>
            <p>Plug in via USB or pair via Bluetooth. The browser will detect it automatically once you press any button on the controller.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Test buttons and triggers</h3>
            <p>Every button lights up when pressed. Analog triggers (LT/RT) show partial values between 0 and 100% when held halfway.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Check analog sticks</h3>
            <p>The canvas circles show the exact stick position. Leave sticks untouched to check for drift at rest.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Compatible controllers</h3>
            <p>Works with PS5 DualSense, PS4 DualShock 4, Xbox One, Xbox Series X/S, Nintendo Switch Pro Controller, and generic USB/Bluetooth gamepads.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- SEO section 2: Stick drift test -->
    <section class="process-band" aria-labelledby="stick-drift-heading">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Drift diagnostics</p>
            <h2 id="stick-drift-heading">Stick Drift Test</h2>
          </div>
          <p class="section-lede">A drift reading above 0.05 at rest is a reliable sign your joystick potentiometer is wearing out.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>Rest both sticks</h3>
            <p>Take your thumbs completely off both analog sticks and leave the controller flat on a surface.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>Watch the position dot</h3>
            <p>If the dot drifts away from the centre circle on its own, input is being registered without you touching the stick.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>Read the drift value</h3>
            <p>A magnitude value above <strong>0.05</strong> when untouched indicates drift. PS5 DualSense and PS4 DualShock controllers are particularly prone after 200–400 hours of use.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- SEO section 3: How to fix stick drift -->
    <section class="feature-band" aria-labelledby="fix-drift-heading">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Controller repair guide</p>
          <h2 id="fix-drift-heading">How to Fix Stick Drift</h2>
          <p class="section-lede">Try these steps from easiest to most involved before buying a replacement controller.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>1. Compressed air</h3>
            <p>Blow short bursts of compressed air around the base of the stick to dislodge any dust or debris that may be affecting the potentiometer.</p>
          </article>
          <article class="landing-feature-card">
            <h3>2. Isopropyl alcohol</h3>
            <p>Dampen a cotton swab with 70% isopropyl alcohol and gently clean around the stick base. Rotate the stick while cleaning to reach all contact points.</p>
          </article>
          <article class="landing-feature-card">
            <h3>3. Recalibrate</h3>
            <p>PS5: Settings &rarr; Accessories &rarr; Controllers &rarr; Calibrate. Xbox: check the Xbox Accessories app for axis calibration. Some PCs offer controller calibration in Device Manager.</p>
          </article>
          <article class="landing-feature-card">
            <h3>4. Replace the module</h3>
            <p>If drift persists after cleaning and calibration, the joystick potentiometer module itself needs replacing. Third-party modules cost &pound;5–&pound;15 and a repair shop typically charges &pound;15–&pound;30 for the job.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- SEO section 4: Vibration test -->
    <section class="feature-band" aria-labelledby="vibration-heading">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Rumble motor check</p>
          <h2 id="vibration-heading">Vibration / Rumble Test</h2>
          <p class="section-lede">Use the vibration buttons to confirm both the light and heavy rumble motors are still working correctly.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Weak vibration</h3>
            <p>Tests the smaller high-frequency rumble motor. Used for subtle effects like rain or distant explosions in games.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Medium vibration</h3>
            <p>A balanced test of both motors together. Good for checking general rumble health with a single press.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Strong vibration</h3>
            <p>Fires both motors at full power for 500 ms. If you feel nothing, check vibration is enabled in your OS or console settings first.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Browser support note</h3>
            <p>Vibration requires the Gamepad Haptics API. It works in Chrome and Edge on Windows and Android. Firefox and Safari do not support it — buttons will appear to do nothing in those browsers.</p>
          </article>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php $currentTool = 'gamepad'; include 'includes/related-tools.php'; ?>

  </main>

  <?php include 'footer.php'; ?>

  <script>
  (function () {
    'use strict';

    var controllers = {};
    var rafId = null;
    var isPolling = false;
    var DRIFT_THRESHOLD = 0.05;

    // Create button elements
    var BUTTON_LABELS = ['A/\u2715','B/\u25CB','X/\u25A1','Y/\u25B3','LB','RB','LT','RT','Select','Start','L3','R3','D\u2191','D\u2193','D\u2190','D\u2192','Home'];
    var grid = document.getElementById('buttons-grid');
    BUTTON_LABELS.forEach(function (label, i) {
      var div = document.createElement('div');
      div.className = 'gamepad-btn';
      div.id = 'btn-' + i;
      div.textContent = label;
      grid.appendChild(div);
    });

    window.addEventListener('gamepadconnected', function (e) {
      controllers[e.gamepad.index] = e.gamepad;
      document.getElementById('connection-status').textContent = 'Controller connected!';
      document.getElementById('connection-status').className = 'connection-banner connected';
      document.getElementById('controller-info').style.display = 'flex';
      document.getElementById('controller-name').textContent = e.gamepad.id.substring(0, 50);
      document.getElementById('button-count').textContent = e.gamepad.buttons.length;
      document.getElementById('axis-count').textContent = e.gamepad.axes.length;
      if (!isPolling) startPolling();
    });

    window.addEventListener('gamepaddisconnected', function (e) {
      delete controllers[e.gamepad.index];
      if (Object.keys(controllers).length === 0) {
        stopPolling();
        document.getElementById('connection-status').textContent = 'Controller disconnected. Reconnect and press a button.';
        document.getElementById('connection-status').className = 'connection-banner';
        document.getElementById('controller-info').style.display = 'none';
      }
    });

    function startPolling() {
      isPolling = true;
      rafId = requestAnimationFrame(pollGamepads);
    }

    function stopPolling() {
      isPolling = false;
      if (rafId) cancelAnimationFrame(rafId);
    }

    function pollGamepads() {
      var gamepads = navigator.getGamepads ? navigator.getGamepads() : [];
      for (var i = 0; i < gamepads.length; i++) {
        var gp = gamepads[i];
        if (!gp) continue;
        updateButtons(gp.buttons);
        updateAxes(gp.axes);
        updateDrift(gp.axes);
      }
      if (isPolling) rafId = requestAnimationFrame(pollGamepads);
    }

    function updateButtons(buttons) {
      buttons.forEach(function (btn, i) {
        var el = document.getElementById('btn-' + i);
        if (!el) return;
        var pressed = btn.pressed || btn.value > 0.1;
        el.classList.toggle('active', pressed);
        if (btn.value > 0 && btn.value < 1) {
          el.dataset.value = Math.round(btn.value * 100) + '%';
        }
      });
    }

    function updateAxes(axes) {
      if (axes.length >= 2) {
        document.getElementById('left-x').textContent = axes[0].toFixed(3);
        document.getElementById('left-y').textContent = axes[1].toFixed(3);
        drawStick('left-stick-canvas', axes[0], axes[1]);
      }
      if (axes.length >= 4) {
        document.getElementById('right-x').textContent = axes[2].toFixed(3);
        document.getElementById('right-y').textContent = axes[3].toFixed(3);
        drawStick('right-stick-canvas', axes[2], axes[3]);
      }
    }

    function drawStick(canvasId, x, y) {
      var c = document.getElementById(canvasId);
      if (!c) return;
      var ctx = c.getContext('2d');
      var cx = c.width / 2, cy = c.height / 2, r = cx - 8;
      ctx.clearRect(0, 0, c.width, c.height);
      // Outer ring
      ctx.beginPath();
      ctx.arc(cx, cy, r, 0, Math.PI * 2);
      ctx.strokeStyle = '#555';
      ctx.lineWidth = 1.5;
      ctx.stroke();
      // Cross-hairs
      ctx.strokeStyle = '#444';
      ctx.lineWidth = 0.5;
      ctx.beginPath();
      ctx.moveTo(cx - r, cy);
      ctx.lineTo(cx + r, cy);
      ctx.stroke();
      ctx.beginPath();
      ctx.moveTo(cx, cy - r);
      ctx.lineTo(cx, cy + r);
      ctx.stroke();
      // Dead-zone circle
      ctx.beginPath();
      ctx.arc(cx, cy, r * 0.1, 0, Math.PI * 2);
      ctx.strokeStyle = 'rgba(231,76,60,0.4)';
      ctx.lineWidth = 1;
      ctx.stroke();
      // Position dot
      var dotX = cx + x * r, dotY = cy + y * r;
      ctx.beginPath();
      ctx.arc(dotX, dotY, 6, 0, Math.PI * 2);
      ctx.fillStyle = '#3498DB';
      ctx.fill();
    }

    function updateDrift(axes) {
      if (axes.length >= 2) {
        var mag = Math.sqrt(axes[0] * axes[0] + axes[1] * axes[1]);
        document.getElementById('left-drift-val').textContent = mag.toFixed(3);
        var isDrift = mag > DRIFT_THRESHOLD;
        document.getElementById('left-drift-status').textContent = isDrift ? 'DRIFT!' : 'OK';
        document.getElementById('left-drift-status').style.color = isDrift ? '#E74C3C' : '#2ECC71';
      }
      if (axes.length >= 4) {
        var mag2 = Math.sqrt(axes[2] * axes[2] + axes[3] * axes[3]);
        document.getElementById('right-drift-val').textContent = mag2.toFixed(3);
        var isDrift2 = mag2 > DRIFT_THRESHOLD;
        document.getElementById('right-drift-status').textContent = isDrift2 ? 'DRIFT!' : 'OK';
        document.getElementById('right-drift-status').style.color = isDrift2 ? '#E74C3C' : '#2ECC71';
      }
    }

    window.testVibration = function (intensity) {
      var gamepads = navigator.getGamepads ? navigator.getGamepads() : [];
      for (var i = 0; i < gamepads.length; i++) {
        var gp = gamepads[i];
        if (!gp || !gp.vibrationActuator) continue;
        gp.vibrationActuator.playEffect('dual-rumble', {
          startDelay: 0,
          duration: 500,
          weakMagnitude: intensity,
          strongMagnitude: intensity
        });
      }
    };

    document.getElementById('reset-btn').addEventListener('click', function () {
      BUTTON_LABELS.forEach(function (_, i) {
        var el = document.getElementById('btn-' + i);
        if (el) el.classList.remove('active');
      });
      ['left-x', 'left-y', 'right-x', 'right-y'].forEach(function (id) {
        document.getElementById(id).textContent = '0.000';
      });
      ['left-drift-val', 'right-drift-val'].forEach(function (id) {
        document.getElementById(id).textContent = '0.000';
      });
      ['left-drift-status', 'right-drift-status'].forEach(function (id) {
        var el = document.getElementById(id);
        el.textContent = 'OK';
        el.style.color = '#2ECC71';
      });
      ['left-stick-canvas', 'right-stick-canvas'].forEach(function (id) {
        var c = document.getElementById(id);
        var ctx = c.getContext('2d');
        ctx.clearRect(0, 0, c.width, c.height);
        drawStick(id, 0, 0);
      });
    });

    // Draw initial centered sticks on page load
    drawStick('left-stick-canvas', 0, 0);
    drawStick('right-stick-canvas', 0, 0);

  }());
  </script>

</body>
</html>
