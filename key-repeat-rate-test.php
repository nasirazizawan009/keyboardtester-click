<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Key Repeat Rate & Delay Tester — Keyboard Repeat Speed Online | KeyboardTester.click';
$pageDescription = 'Free key repeat rate and delay tester online. Measure your keyboard initial delay and repeat speed in Hz. Compare to gaming benchmarks instantly. No download needed.';
$pageKeywords = 'keyboard repeat rate test, key repeat delay test online, keyboard repeat speed, key repeat hz test, keyboard repeat settings';
$pageOgImage = 'images/keyboard/hero-keyboard-test-1400.png';
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
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"WebApplication","name":"Key Repeat Rate & Delay Tester","url":"<?php echo absoluteUrl('key-repeat-rate-test.php'); ?>","description":"Free online keyboard repeat rate and delay tester. Measure initial delay and repeat speed in Hz compared to gaming benchmarks.","applicationCategory":"UtilityApplication","operatingSystem":"Any","isAccessibleForFree":true,"featureList":["Initial delay measurement in milliseconds","Repeat rate measurement in Hz","Live oscilloscope bar chart","Gaming vs typing benchmark comparison","Instant results, no download"]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"What is key repeat rate?","acceptedAnswer":{"@type":"Answer","text":"Key repeat rate is how many times per second a held key fires repeat events after the initial delay. It is measured in Hz (events per second). Most keyboards default to 30 Hz; gaming keyboards can reach 50 Hz or higher."}},{"@type":"Question","name":"What is key repeat delay?","acceptedAnswer":{"@type":"Answer","text":"Key repeat delay (also called repeat delay) is the time between the first keydown event and the second one when you hold a key. It is typically 200–1000 ms and controls how long you must hold a key before it starts repeating."}},{"@type":"Question","name":"What is the optimal repeat rate for gaming?","acceptedAnswer":{"@type":"Answer","text":"For gaming, a repeat delay of 200–250 ms and a repeat rate of 30–50 Hz is generally considered optimal. Lower delay means keys start repeating faster; higher Hz means faster repetition once started."}},{"@type":"Question","name":"How do I change key repeat speed in Windows?","acceptedAnswer":{"@type":"Answer","text":"Open Control Panel → Keyboard → Speed tab. Drag the 'Repeat delay' slider left to shorten the delay and drag the 'Repeat rate' slider right to increase speed. Click OK and test in the text box provided."}},{"@type":"Question","name":"Does this test work on all keyboards?","acceptedAnswer":{"@type":"Answer","text":"Yes. The tester works on any USB, PS/2, Bluetooth, or wireless keyboard connected to a computer running a modern browser. It reads standard browser keydown events — no special drivers required."}}]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"<?php echo absoluteUrl(''); ?>"},{"@type":"ListItem","position":2,"name":"Key Repeat Rate Tester","item":"<?php echo absoluteUrl('key-repeat-rate-test.php'); ?>"}]}
  </script>
  <style>
    .krr-tool {
      max-width: 720px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
      text-align: center;
    }
    .krr-tool h1 {
      font-size: clamp(1.6rem, 4vw, 2.4rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #1e293b);
    }
    .krr-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.5rem;
    }
    .krr-key-area {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 130px;
      border: 2px dashed var(--border-color, #e2e8f0);
      border-radius: 12px;
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--text-muted, #475569);
      margin-bottom: 1.5rem;
      cursor: default;
      user-select: none;
      transition: border-color 0.15s, background 0.15s;
      background: transparent;
    }
    .krr-key-area.active {
      border-style: solid;
      border-color: var(--primary-color, #4b5eaa);
      background: rgba(99,102,241,0.06);
      color: var(--heading-color, #1e293b);
    }
    .krr-stats-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
      margin-bottom: 1.5rem;
    }
    .krr-stat {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      padding: 1rem 0.5rem;
    }
    .krr-stat-value {
      font-size: 1.9rem;
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      color: var(--primary-color, #4b5eaa);
      line-height: 1.1;
    }
    .krr-stat-label {
      font-size: 0.75rem;
      color: var(--text-muted, #475569);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 0.25rem;
    }
    /* Oscilloscope bar chart */
    .krr-chart-wrap {
      background: var(--card-bg, #f1f5f9);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      padding: 0.75rem 1rem;
      margin-bottom: 1.5rem;
      overflow: hidden;
    }
    .krr-chart-title {
      font-size: 0.8rem;
      color: var(--text-muted, #475569);
      text-align: left;
      margin-bottom: 0.4rem;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }
    .krr-bars {
      display: flex;
      align-items: flex-end;
      gap: 3px;
      height: 60px;
      overflow: hidden;
    }
    .krr-bar {
      flex: 1;
      min-width: 6px;
      background: var(--primary-color, #4b5eaa);
      border-radius: 2px 2px 0 0;
      transition: height 0.05s;
    }
    .krr-verdict {
      display: none;
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      padding: 1rem 1.25rem;
      margin-bottom: 1.5rem;
      text-align: left;
    }
    .krr-verdict.visible { display: block; }
    .krr-verdict-title {
      font-size: 1rem;
      font-weight: 700;
      color: var(--heading-color, #1e293b);
      margin-bottom: 0.5rem;
    }
    .krr-verdict-row {
      display: flex;
      justify-content: space-between;
      font-size: 0.9rem;
      color: var(--text-color, #1e293b);
      padding: 0.25rem 0;
      border-bottom: 1px solid var(--border-color, #e2e8f0);
    }
    .krr-verdict-row:last-child { border-bottom: none; }
    .krr-verdict-badge {
      font-weight: 700;
      padding: 0.1rem 0.5rem;
      border-radius: 4px;
      font-size: 0.8rem;
    }
    .badge-good { background: rgba(34,197,94,0.15); color: #16a34a; }
    .badge-ok { background: rgba(234,179,8,0.15); color: #a16207; }
    .badge-slow { background: rgba(239,68,68,0.15); color: #dc2626; }
    .krr-reset-btn {
      padding: 0.65rem 2rem;
      border: none;
      border-radius: 8px;
      background: var(--primary-color, #4b5eaa);
      color: #fff;
      font-family: inherit;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: opacity 0.15s, transform 0.1s;
      min-height: 44px;
    }
    .krr-reset-btn:hover { opacity: 0.88; transform: translateY(-1px); }
    .privacy-note {
      font-size: 0.8rem;
      color: var(--text-muted, #475569);
      margin-top: 1rem;
    }
    .ratings-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
      font-size: 0.95rem;
    }
    .ratings-table th,
    .ratings-table td {
      padding: 0.6rem 0.9rem;
      text-align: left;
      border-bottom: 1px solid var(--border-color, #e2e8f0);
    }
    .ratings-table th {
      font-weight: 600;
      color: var(--heading-color, #1e293b);
      background: var(--card-bg, #f1f5f9);
    }
    .ratings-table td { color: var(--text-color, #1e293b); }
    .ratings-table tr:last-child td { border-bottom: none; }
    @media (max-width: 480px) {
      .krr-stats-grid { grid-template-columns: repeat(2, 1fr); }
      .krr-tool { padding: 1.25rem 1rem 2rem; }
    }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>
  <main id="main-content" class="landing-main">

    <!-- Tool stage -->
    <section class="tool-stage" id="krr-tool-section" aria-labelledby="krr-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="krr-tool-title">Key Repeat Rate & Delay Tester</h2>
          <p class="section-lede">Hold any key to measure initial delay and repeat speed.</p>
        </div>
      </div>
      <section class="tool-shell">
        <div class="krr-tool">
          <h1>Key Repeat Rate & Delay Tester</h1>
          <p class="tool-subtitle">Hold any key — the tool measures initial delay (ms) and repeat rate (Hz)</p>

          <!-- Key hold area -->
          <div class="krr-key-area" id="krr-key-area" role="status" aria-live="polite" aria-label="Hold any key to start test">
            Hold any key to start the measurement
          </div>

          <!-- Stats -->
          <div class="krr-stats-grid">
            <div class="krr-stat">
              <div class="krr-stat-value" id="krr-delay">—</div>
              <div class="krr-stat-label">Initial Delay (ms)</div>
            </div>
            <div class="krr-stat">
              <div class="krr-stat-value" id="krr-hz">—</div>
              <div class="krr-stat-label">Repeat Rate (Hz)</div>
            </div>
            <div class="krr-stat">
              <div class="krr-stat-value" id="krr-events">0</div>
              <div class="krr-stat-label">Repeat Events</div>
            </div>
          </div>

          <!-- Oscilloscope bar chart -->
          <div class="krr-chart-wrap" aria-label="Keydown event timing chart">
            <div class="krr-chart-title">Key event timeline</div>
            <div class="krr-bars" id="krr-bars" aria-hidden="true"></div>
          </div>

          <!-- Verdict panel -->
          <div class="krr-verdict" id="krr-verdict" role="status" aria-live="assertive">
            <div class="krr-verdict-title">Your Keyboard Results</div>
            <div class="krr-verdict-row">
              <span>Initial Delay</span>
              <span id="krr-v-delay"></span>
            </div>
            <div class="krr-verdict-row">
              <span>Repeat Rate</span>
              <span id="krr-v-hz"></span>
            </div>
            <div class="krr-verdict-row">
              <span>Gaming Rating</span>
              <span id="krr-v-badge" class="krr-verdict-badge"></span>
            </div>
          </div>

          <button class="krr-reset-btn" id="krr-reset" aria-label="Reset key repeat test">Reset</button>
          <p class="privacy-note">This test runs entirely in your browser. No data is collected.</p>
        </div>
      </section>
    </section>

    <!-- Trust strip -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Millisecond precision</div>
          <div class="trust-desc">Uses performance.now() for sub-ms timing accuracy</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Gaming benchmarks</div>
          <div class="trust-desc">Compares your settings to optimal gaming thresholds</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Live bar chart</div>
          <div class="trust-desc">Visualise every keydown event as it fires</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Browser based</div>
          <div class="trust-desc">No install, no signup — works in any modern browser</div>
        </div>
      </div>
    </section>

    <!-- SEO content -->
    <section class="feature-band" aria-labelledby="what-is-krr">
      <div class="container">
        <div class="section-head">
          <h2 id="what-is-krr">What Is Key Repeat Rate?</h2>
          <p class="section-lede">
            Key repeat rate is the number of keydown events your keyboard sends per second
            while a key is held down, measured in Hz (events per second). When you hold the
            letter "A", your OS first fires one event, pauses for the initial delay period,
            then starts firing repeated events at the repeat rate. A 30 Hz rate means
            30 repeat keydowns every second. Most operating systems default to 31 Hz, but
            gaming keyboards and custom firmware can push this to 50 Hz or higher, giving
            you faster key response in games that poll for held keys.
          </p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="gaming-vs-typing">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Settings guide</p>
            <h2 id="gaming-vs-typing">Gaming vs Typing Optimal Settings</h2>
          </div>
          <p class="section-lede">Different use-cases call for different repeat settings.</p>
        </div>
        <div style="margin-top:1.5rem;">
          <table class="ratings-table" aria-label="Key repeat rate benchmarks">
            <thead>
              <tr>
                <th scope="col">Setting</th>
                <th scope="col">Gaming Optimal</th>
                <th scope="col">Typing Optimal</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Initial Delay</td>
                <td>200–250 ms (Very Short)</td>
                <td>400–500 ms (Short–Medium)</td>
              </tr>
              <tr>
                <td>Repeat Rate</td>
                <td>30–50 Hz (Fast–Very Fast)</td>
                <td>20–31 Hz (Medium)</td>
              </tr>
              <tr>
                <td>Effect</td>
                <td>Immediate key action in games</td>
                <td>Fewer accidental repeats while typing</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="how-to-change">
      <div class="container">
        <div class="section-head">
          <h2 id="how-to-change">How to Change Key Repeat Speed in Windows &amp; Mac</h2>
          <p class="section-lede">
            <strong>Windows:</strong> Open Control Panel → Keyboard → Speed tab. Drag
            "Repeat delay" left (shorter) and "Repeat rate" right (faster). Click OK and
            test in the text box. Changes take effect immediately without rebooting.
          </p>
          <p class="section-lede" style="margin-top:0.75rem;">
            <strong>macOS:</strong> Go to System Settings → Keyboard. Use the "Key Repeat Rate"
            slider (Slow to Fast) and the "Delay Until Repeat" slider (Long to Short). Power
            users can go further with <code>defaults write NSGlobalDomain KeyRepeat -int 1</code>
            in Terminal for sub-OS repeat rates.
          </p>
          <p class="section-lede" style="margin-top:0.75rem;">
            <strong>Linux:</strong> Use <code>xset r rate &lt;delay_ms&gt; &lt;rate_hz&gt;</code>
            — for example <code>xset r rate 200 50</code> sets a 200 ms delay and 50 Hz repeat rate.
          </p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="why-matters">
      <div class="container">
        <div class="section-head">
          <h2 id="why-matters">Why Repeat Delay Matters for Gamers</h2>
          <p class="section-lede">
            In many games, movement keys or menu navigation rely on the OS key-repeat mechanism.
            A long initial delay means your character hesitates before continuously moving.
            A low delay of 200 ms or less eliminates that pause. Meanwhile, a high repeat rate
            ensures that held-key actions fire as often as the game loop polls for input, reducing
            missed frames in fast-paced scenarios. Competitive FPS and RTS players typically set
            delay to the minimum (200 ms) and rate to the maximum allowed by their OS or keyboard
            firmware (up to 50 Hz on Windows, higher with custom firmware).
          </p>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="feature-band" aria-labelledby="faq-krr">
      <div class="container">
        <div class="section-head">
          <h2 id="faq-krr">Frequently Asked Questions</h2>
        </div>
        <div class="landing-feature-grid" style="margin-top:1rem;">
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">What is a good key repeat delay?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">For gaming, 200–250 ms is optimal. For everyday typing, 400–500 ms prevents accidental repeats. The Windows minimum via Control Panel is 250 ms; macOS can go to ~15 ms via Terminal commands.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Why does my key repeat rate show lower than expected?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">Browser keydown events are throttled by the OS repeat rate setting, not the hardware rate. If your OS is set to 30 Hz, this tool will show ~30 Hz regardless of your keyboard's hardware capability.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Does key repeat rate affect gaming performance?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">It depends on the game. Games that use key-repeat events for movement (many platformers, menus, typing games) benefit from higher rates. Games that poll raw input state every frame are unaffected.</p>
          </details>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php $currentTool = 'key-repeat-rate'; include 'includes/related-tools.php'; ?>
    <?php $toolBlogSlug = 'keyboard-shortcuts-windows-mac-linux-complete-cheat-sheet.php'; include __DIR__ . '/includes/components/tool-blog-cta.php'; ?>

  </main>
  <?php include 'footer.php'; ?>
  <script>
  requestAnimationFrame(function(){ setTimeout(function(){
    'use strict';
    var keyArea = document.getElementById('krr-key-area');
    var delayEl = document.getElementById('krr-delay');
    var hzEl    = document.getElementById('krr-hz');
    var eventsEl= document.getElementById('krr-events');
    var barsEl  = document.getElementById('krr-bars');
    var verdict = document.getElementById('krr-verdict');
    var vDelay  = document.getElementById('krr-v-delay');
    var vHz     = document.getElementById('krr-v-hz');
    var vBadge  = document.getElementById('krr-v-badge');
    var resetBtn= document.getElementById('krr-reset');

    var pressTime  = 0;
    var firstRepeat= 0;
    var delays     = [];
    var eventTimes = [];
    var MAX_BARS   = 40;
    var barData    = [];
    var measuring  = false;

    // Pre-populate bars
    for (var i = 0; i < MAX_BARS; i++) {
      var bar = document.createElement('div');
      bar.className = 'krr-bar';
      bar.style.height = '2px';
      barsEl.appendChild(bar);
      barData.push(bar);
    }

    document.addEventListener('keydown', function(e) {
      var now = performance.now();

      if (!measuring) {
        // First keydown — start measurement
        measuring = true;
        pressTime = now;
        firstRepeat = 0;
        delays = [];
        eventTimes = [];
        keyArea.classList.add('active');
        keyArea.textContent = 'Holding "' + (e.key.length === 1 ? e.key.toUpperCase() : e.key) + '" — keep holding…';
        return;
      }

      if (e.repeat) {
        eventTimes.push(now);
        eventsEl.textContent = eventTimes.length;

        if (firstRepeat === 0) {
          // First repeat — calculate initial delay
          firstRepeat = now;
          var initDelay = Math.round(firstRepeat - pressTime);
          delayEl.textContent = initDelay;
          vDelay.textContent = initDelay + ' ms';
        }

        if (eventTimes.length >= 2) {
          // Calculate intervals between repeat events
          var intervals = [];
          for (var i = 1; i < eventTimes.length; i++) {
            intervals.push(eventTimes[i] - eventTimes[i-1]);
          }
          var avgInterval = intervals.reduce(function(a,b){return a+b;},0) / intervals.length;
          var hz = Math.round(1000 / avgInterval);
          hzEl.textContent = hz;
          vHz.textContent = hz + ' Hz';

          // Update verdict when we have 5+ events
          if (eventTimes.length >= 5) {
            showVerdict(parseInt(delayEl.textContent, 10) || 0, hz);
          }
        }

        // Update bar chart — shift left, add new bar
        var height = Math.min(60, Math.max(4, 60 - (eventTimes.length > 1 ?
          (eventTimes[eventTimes.length-1] - eventTimes[eventTimes.length-2]) / 2 : 30)));
        shiftBars(height);
      }
    });

    document.addEventListener('keyup', function() {
      if (measuring) {
        measuring = false;
        pressTime = 0;
        keyArea.classList.remove('active');
        keyArea.textContent = 'Hold any key to start again';
      }
    });

    function shiftBars(height) {
      for (var i = 0; i < barData.length - 1; i++) {
        barData[i].style.height = barData[i+1].style.height;
      }
      barData[barData.length - 1].style.height = Math.round(height) + 'px';
    }

    function showVerdict(delay, hz) {
      var delayGood  = delay <= 300;
      var delaySlow  = delay > 500;
      var hzGood     = hz >= 28;
      var hzSlow     = hz < 20;

      var overallGood = delayGood && hzGood;
      var overallSlow = delaySlow || hzSlow;

      vBadge.textContent = overallGood ? 'Gaming-Ready' : (overallSlow ? 'Below Average' : 'Average');
      vBadge.className   = 'krr-verdict-badge ' + (overallGood ? 'badge-good' : (overallSlow ? 'badge-slow' : 'badge-ok'));
      verdict.classList.add('visible');
    }

    resetBtn.addEventListener('click', function() {
      measuring   = false;
      pressTime   = 0;
      firstRepeat = 0;
      delays      = [];
      eventTimes  = [];
      delayEl.textContent  = '—';
      hzEl.textContent     = '—';
      eventsEl.textContent = '0';
      keyArea.classList.remove('active');
      keyArea.textContent = 'Hold any key to start the measurement';
      verdict.classList.remove('visible');
      for (var i = 0; i < barData.length; i++) {
        barData[i].style.height = '2px';
      }
    });
  }, 0); });
  </script>
</body>
</html>
