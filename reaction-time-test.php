<?php include 'config.php'; ?>
<?php
$pageTitle = 'Reaction Time Test — Check Your Reflexes Online Free | KeyboardTester.click';
$pageDescription = 'Free reaction time test online. Click when the color changes. Measure your reflex speed in milliseconds. Useful for gaming performance. No download needed.';
$pageKeywords = 'reaction time test, reflex test online, reaction speed test, gaming reaction time';
$pageOgImage = 'images/mouse/hero.png';
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
    /* Reaction Time Tool — scoped styles */
    #reaction-box {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 320px;
      border-radius: 12px;
      cursor: pointer;
      user-select: none;
      transition: background-color 0.1s ease;
      background: #6b7280;
      color: #fff;
      text-align: center;
      padding: 2rem;
      width: 100%;
      box-sizing: border-box;
    }
    #reaction-box.state-waiting {
      background: #6b7280;
    }
    #reaction-box.state-get-ready {
      background: #374151;
    }
    #reaction-box.state-too-early {
      background: #dc2626;
    }
    #reaction-box.state-go {
      background: #16a34a;
    }
    #reaction-box.state-result {
      background: #2563eb;
    }
    .reaction-box-text {
      font-size: 2rem;
      font-weight: 700;
      line-height: 1.25;
      pointer-events: none;
    }
    .reaction-box-sub {
      font-size: 1rem;
      font-weight: 400;
      margin-top: 0.5rem;
      opacity: 0.85;
      pointer-events: none;
    }
    .reaction-result-time {
      font-size: 3.5rem;
      font-weight: 800;
      line-height: 1;
      pointer-events: none;
    }
    .reaction-result-label {
      font-size: 1rem;
      margin-top: 0.25rem;
      opacity: 0.85;
      pointer-events: none;
    }

    /* History & stats */
    .reaction-stats-row {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      margin-top: 1.5rem;
    }
    .reaction-stat-card {
      flex: 1 1 120px;
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--card-border, rgba(15,23,42,0.1));
      border-radius: 8px;
      padding: 0.75rem 1rem;
      text-align: center;
    }
    html.dark-theme .reaction-stat-card,
    [data-theme="dark"] .reaction-stat-card {
      background: rgba(255,255,255,0.05);
      border-color: rgba(255,255,255,0.12);
    }
    .reaction-stat-card .stat-val {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--accent-color, #2563eb);
    }
    .reaction-stat-card .stat-label {
      font-size: 0.75rem;
      color: var(--text-muted, #6b7280);
      margin-top: 0.2rem;
    }
    .reaction-history {
      margin-top: 1.25rem;
    }
    .reaction-history h4 {
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--text-muted, #6b7280);
      text-transform: uppercase;
      letter-spacing: 0.06em;
      margin-bottom: 0.5rem;
    }
    .reaction-history-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      gap: 0.5rem;
      flex-wrap: wrap;
    }
    .reaction-history-list li {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--card-border, rgba(15,23,42,0.1));
      border-radius: 6px;
      padding: 0.35rem 0.75rem;
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--text-color, #0f172a);
    }
    html.dark-theme .reaction-history-list li,
    [data-theme="dark"] .reaction-history-list li {
      background: rgba(255,255,255,0.05);
      border-color: rgba(255,255,255,0.12);
      color: #e2e8f0;
    }
    .reaction-try-again {
      margin-top: 1.5rem;
      display: flex;
      justify-content: center;
    }

    /* Ratings table */
    .reaction-ratings-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
    }
    .reaction-ratings-table th,
    .reaction-ratings-table td {
      padding: 0.65rem 1rem;
      text-align: left;
      border-bottom: 1px solid var(--card-border, rgba(15,23,42,0.08));
      font-size: 0.92rem;
    }
    .reaction-ratings-table th {
      font-weight: 600;
      background: var(--card-bg, #f1f5f9);
      color: var(--text-color, #0f172a);
    }
    html.dark-theme .reaction-ratings-table th,
    [data-theme="dark"] .reaction-ratings-table th {
      background: rgba(255,255,255,0.06);
      color: #e2e8f0;
    }
    html.dark-theme .reaction-ratings-table td,
    [data-theme="dark"] .reaction-ratings-table td {
      color: #cbd5e1;
    }
    .rating-badge {
      display: inline-block;
      padding: 0.15rem 0.55rem;
      border-radius: 4px;
      font-size: 0.78rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }
    .badge-elite   { background: #fef08a; color: #713f12; }
    .badge-pro     { background: #bbf7d0; color: #14532d; }
    .badge-avg     { background: #bfdbfe; color: #1e3a8a; }
    .badge-slow    { background: #fed7aa; color: #7c2d12; }
    .badge-rest    { background: #fecaca; color: #7f1d1d; }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">

    <!-- Hero -->
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">Reflex Speed</p>
          <h1 class="hero-title">Reaction Time Test</h1>
          <p class="hero-lede">Click the moment the box turns green. Measure your reflex speed in milliseconds — free and instant, no download needed.</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#reaction-tool">Start test</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">Browse all tools</a>
          </div>
          <div class="hero-badges">
            <span class="hero-badge">Millisecond precision</span>
            <span class="hero-badge">Last 5 results</span>
            <span class="hero-badge">Browser based</span>
          </div>
          <div class="hero-metrics">
            <div class="metric-card">
              <span class="metric-value">ms</span>
              <span class="metric-label">Precision</span>
            </div>
            <div class="metric-card">
              <span class="metric-value">5</span>
              <span class="metric-label">Saved results</span>
            </div>
            <div class="metric-card">
              <span class="metric-value">Free</span>
              <span class="metric-label">No signup</span>
            </div>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <img src="<?php echo url('images/mouse/hero.png'); ?>" alt="Reaction time test — measure your reflex speed in milliseconds online" loading="eager">
          </div>
          <div class="hero-stack">
            <div class="mini-card">
              <div class="mini-title">Real-time timing</div>
              <p>Measures the exact moment you click after the signal appears.</p>
            </div>
            <div class="mini-card">
              <div class="mini-title">Track your average</div>
              <p>Last 5 attempts averaged so you can see improvement over runs.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tool Stage -->
    <section class="tool-stage" id="reaction-tool" aria-labelledby="reaction-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="reaction-tool-title">Reaction Time Test</h2>
          <p class="section-lede">Click the box to start, then click again the instant it turns green.</p>
        </div>
      </div>
      <section class="tool-shell" aria-label="Reaction time test tool">
        <div class="kbt-tool" id="reaction-tool-widget">

          <!-- Main clickable box -->
          <div id="reaction-box" class="state-waiting" role="button" tabindex="0" aria-label="Reaction time test area — click to start">
            <div>
              <div class="reaction-box-text" id="reaction-box-text">Click to Start</div>
              <div class="reaction-box-sub" id="reaction-box-sub">Tap the box to begin a round</div>
            </div>
          </div>

          <!-- Stats row (hidden until there are results) -->
          <div id="reaction-stats" style="display:none;">
            <div class="reaction-stats-row">
              <div class="reaction-stat-card">
                <div class="stat-val" id="stat-last">--</div>
                <div class="stat-label">Last (ms)</div>
              </div>
              <div class="reaction-stat-card">
                <div class="stat-val" id="stat-best">--</div>
                <div class="stat-label">Best (ms)</div>
              </div>
              <div class="reaction-stat-card">
                <div class="stat-val" id="stat-avg">--</div>
                <div class="stat-label">Average (ms)</div>
              </div>
              <div class="reaction-stat-card">
                <div class="stat-val" id="stat-count">0</div>
                <div class="stat-label">Attempts</div>
              </div>
            </div>

            <div class="reaction-history" id="reaction-history-wrap">
              <h4>Last 5 results</h4>
              <ul class="reaction-history-list" id="reaction-history-list"></ul>
            </div>
          </div>

        </div>
      </section>
    </section>

    <!-- Trust strip -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Millisecond accuracy</div>
          <div class="trust-desc">Timestamps captured with Date.now()</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Early-click guard</div>
          <div class="trust-desc">Penalises clicking before the signal</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Rolling average</div>
          <div class="trust-desc">Tracks your last 5 attempts</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Browser based</div>
          <div class="trust-desc">No installs or signups needed</div>
        </div>
      </div>
    </section>

    <!-- Feature band -->
    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">Reflex Measurement</p>
          <h2 id="feature-title">Why Test Your Reaction Time?</h2>
          <p class="section-lede">Knowing your baseline reaction speed helps you track improvement for gaming, sport, or general health.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Gaming edge</h3>
            <p>Faster reflexes mean quicker responses in FPS and battle-royale games.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Benchmark yourself</h3>
            <p>Compare your result against average and pro-level reaction speed ranges.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Track improvement</h3>
            <p>Run multiple rounds and watch your average drop as you warm up.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Spot fatigue</h3>
            <p>A slow score after a long session is a useful signal to take a break.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Process band -->
    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="process-title">How to Use the Reaction Time Test</h2>
          </div>
          <p class="section-lede">Three steps — click to start, wait for green, click as fast as you can.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse/step-1.png'); ?>" alt="Reaction time test step 1 - click the grey box to begin" loading="lazy">
            </div>
            <div class="step-number">01</div>
            <h3>Click to start</h3>
            <p>Tap the grey box to enter the waiting state.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse/step-2.png'); ?>" alt="Reaction time test step 2 - wait for the green signal" loading="lazy">
            </div>
            <div class="step-number">02</div>
            <h3>Wait for green</h3>
            <p>After a random delay the box turns bright green — click immediately.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse/step-3.png'); ?>" alt="Reaction time test step 3 - review your millisecond result" loading="lazy">
            </div>
            <div class="step-number">03</div>
            <h3>See your time</h3>
            <p>Your reaction time in milliseconds appears instantly.</p>
          </article>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>

    <!-- SEO content -->
    <section class="content-band" aria-labelledby="good-reaction-heading">
      <div class="container content-prose">

        <h2 id="good-reaction-heading">What Is a Good Reaction Time?</h2>
        <p>
          The average human reaction time to a visual stimulus is around <strong>200–250 milliseconds</strong>.
          This is the baseline for most adults under normal, rested conditions. Trained gamers and athletes
          frequently score in the <strong>150–200 ms</strong> range thanks to practice and heightened focus.
          Elite esports professionals can sometimes dip below 150 ms in ideal conditions. Keep in mind that
          browser-based measurements add a small amount of overhead compared to native hardware timing, so
          scores here may read 10–20 ms higher than a dedicated peripheral benchmark.
        </p>
        <p>
          Factors that affect your score include time of day, caffeine intake, screen refresh rate, mouse
          and monitor latency, and general fatigue. Always do several warm-up rounds before comparing your
          average against the table below.
        </p>

        <h2>Reaction Time Ratings</h2>
        <table class="reaction-ratings-table" aria-label="Reaction time rating scale">
          <thead>
            <tr>
              <th>Time (ms)</th>
              <th>Rating</th>
              <th>Notes</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Under 150 ms</td>
              <td><span class="rating-badge badge-elite">Elite</span></td>
              <td>Top-tier esports and professional athlete level</td>
            </tr>
            <tr>
              <td>150–200 ms</td>
              <td><span class="rating-badge badge-pro">Pro Gamer</span></td>
              <td>Well above average — consistent competitive performance</td>
            </tr>
            <tr>
              <td>200–250 ms</td>
              <td><span class="rating-badge badge-avg">Average</span></td>
              <td>Normal range for a healthy, rested adult</td>
            </tr>
            <tr>
              <td>250–300 ms</td>
              <td><span class="rating-badge badge-slow">Slow</span></td>
              <td>Below average — try warming up or reducing distractions</td>
            </tr>
            <tr>
              <td>300 ms+</td>
              <td><span class="rating-badge badge-rest">Take a break</span></td>
              <td>Fatigue or distraction is likely affecting your score</td>
            </tr>
          </tbody>
        </table>

      </div>
    </section>

    <?php $currentTool = 'reaction'; include 'includes/related-tools.php'; ?>

  </main>

  <?php include 'footer.php'; ?>

  <script>
  (function () {
    'use strict';

    var box       = document.getElementById('reaction-box');
    var boxText   = document.getElementById('reaction-box-text');
    var boxSub    = document.getElementById('reaction-box-sub');
    var statsWrap = document.getElementById('reaction-stats');
    var statLast  = document.getElementById('stat-last');
    var statBest  = document.getElementById('stat-best');
    var statAvg   = document.getElementById('stat-avg');
    var statCount = document.getElementById('stat-count');
    var histList  = document.getElementById('reaction-history-list');

    // State constants
    var STATE_WAITING   = 'waiting';
    var STATE_GET_READY = 'get-ready';
    var STATE_TOO_EARLY = 'too-early';
    var STATE_GO        = 'go';
    var STATE_RESULT    = 'result';

    var state     = STATE_WAITING;
    var timer     = null;
    var goTime    = null;
    var results   = [];   // stores up to 5 ms values

    function setState(s) {
      state = s;
      // Remove all state classes, add new one
      box.className = '';
      box.classList.add('state-' + s);
    }

    function setBoxContent(main, sub) {
      boxText.textContent = main;
      boxSub.textContent  = sub !== undefined ? sub : '';
    }

    function updateStats() {
      if (results.length === 0) {
        statsWrap.style.display = 'none';
        return;
      }
      statsWrap.style.display = '';
      var last = results[results.length - 1];
      var best = Math.min.apply(null, results);
      var avg  = Math.round(results.reduce(function (a, b) { return a + b; }, 0) / results.length);

      statLast.textContent  = last;
      statBest.textContent  = best;
      statAvg.textContent   = avg;
      statCount.textContent = results.length;

      // Rebuild history list (last 5, newest first)
      histList.innerHTML = '';
      var shown = results.slice(-5).reverse();
      shown.forEach(function (ms, idx) {
        var li = document.createElement('li');
        li.textContent = ms + ' ms';
        if (idx === 0) li.style.borderColor = 'var(--accent-color, #2563eb)';
        histList.appendChild(li);
      });
    }

    function startWaiting() {
      setState(STATE_WAITING);
      setBoxContent('Click to Start', 'Tap the box to begin a round');
    }

    function startGetReady() {
      setState(STATE_GET_READY);
      setBoxContent('Wait for green\u2026', 'Do not click yet!');
      var delay = 2000 + Math.random() * 3000;
      timer = setTimeout(function () {
        if (state !== STATE_GET_READY) return; // aborted
        goTime = Date.now();
        setState(STATE_GO);
        setBoxContent('CLICK NOW!', '');
      }, delay);
    }

    function handleClick() {
      if (state === STATE_WAITING) {
        startGetReady();
        return;
      }

      if (state === STATE_GET_READY) {
        // Too early
        clearTimeout(timer);
        timer = null;
        setState(STATE_TOO_EARLY);
        setBoxContent('Too early!', 'Click to try again');
        return;
      }

      if (state === STATE_GO) {
        var elapsed = Date.now() - goTime;
        goTime = null;
        if (results.length >= 5) results.shift(); // keep max 5
        results.push(elapsed);
        updateStats();

        setState(STATE_RESULT);
        // Show result inside the box
        boxText.innerHTML = '<span class="reaction-result-time">' + elapsed + ' ms</span>';
        boxSub.innerHTML  = '<span class="reaction-result-label">Click to try again</span>';
        return;
      }

      if (state === STATE_TOO_EARLY || state === STATE_RESULT) {
        // Reset to waiting
        startWaiting();
        return;
      }
    }

    // Click handler
    box.addEventListener('click', handleClick);

    // Keyboard support (Enter / Space)
    box.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        handleClick();
      }
    });

    // Initialise
    startWaiting();
  }());
  </script>

</body>
</html>
