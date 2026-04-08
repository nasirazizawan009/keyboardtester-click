<?php include 'config.php'; ?>
<?php
$pageTitle = 'Spacebar Test — How Fast Can You Press the Spacebar? | KeyboardTester.click';
$pageDescription = 'Free spacebar test online. Count how many times you can press the spacebar in 5, 10 or 30 seconds. Spacebar counter with instant results. No download needed.';
$pageKeywords = 'spacebar test, spacebar counter, spacebar speed test, how fast can you press spacebar';
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
    /* Spacebar Test Tool — embedded styles */
    .spacebar-tool {
      max-width: 680px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
      text-align: center;
    }

    .spacebar-tool h1 {
      font-size: clamp(1.75rem, 4vw, 2.5rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #1e293b);
    }

    .spacebar-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.75rem;
    }

    /* Duration selector */
    .duration-selector {
      display: flex;
      justify-content: center;
      gap: 0.5rem;
      margin-bottom: 1.75rem;
    }

    .dur-btn {
      padding: 0.45rem 1.2rem;
      border: 2px solid var(--border-color, #e2e8f0);
      border-radius: 6px;
      background: transparent;
      color: var(--text-muted, #475569);
      font-family: inherit;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: border-color 0.15s, color 0.15s, background 0.15s;
    }

    .dur-btn:hover {
      border-color: var(--primary-color, #4b5eaa);
      color: var(--primary-color, #4b5eaa);
    }

    .dur-btn.active {
      border-color: var(--primary-color, #4b5eaa);
      background: var(--primary-color, #4b5eaa);
      color: #fff;
    }

    /* Count display */
    .count-display {
      font-size: clamp(4rem, 14vw, 7rem);
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      line-height: 1;
      color: var(--primary-color, #4b5eaa);
      margin-bottom: 0.25rem;
      transition: transform 0.05s ease;
    }

    .count-display.bump {
      transform: scale(1.08);
    }

    .timer-display {
      font-size: 1.5rem;
      font-weight: 600;
      font-family: 'JetBrains Mono', monospace;
      color: var(--text-muted, #475569);
      margin-bottom: 1.5rem;
    }

    .timer-display.urgent {
      color: #f87171;
    }

    /* Press area */
    .press-area {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 120px;
      border: 2px dashed var(--border-color, #e2e8f0);
      border-radius: 12px;
      margin-bottom: 1.5rem;
      cursor: pointer;
      user-select: none;
      transition: border-color 0.15s, background 0.15s;
      background: transparent;
      width: 100%;
      font-family: inherit;
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--text-muted, #475569);
      outline: none;
    }

    .press-area:hover,
    .press-area:focus {
      border-color: var(--primary-color, #4b5eaa);
      background: rgba(99, 102, 241, 0.06);
      color: var(--heading-color, #1e293b);
    }

    .press-area.running {
      border-style: solid;
      border-color: var(--primary-color, #4b5eaa);
      background: rgba(99, 102, 241, 0.08);
      color: var(--heading-color, #1e293b);
    }

    .press-area.done {
      border-color: #22c55e;
      background: rgba(34, 197, 94, 0.06);
      color: #22c55e;
      cursor: default;
    }

    /* Result panel */
    .result-panel {
      display: none;
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 12px;
      padding: 1.5rem 1.25rem;
      margin-bottom: 1.5rem;
    }

    .result-panel.visible {
      display: block;
    }

    .result-headline {
      font-size: 1.3rem;
      font-weight: 700;
      color: var(--heading-color, #1e293b);
      margin-bottom: 0.75rem;
    }

    .result-stats {
      display: flex;
      justify-content: center;
      gap: 2rem;
      flex-wrap: wrap;
      margin-bottom: 0.75rem;
    }

    .stat-item {
      text-align: center;
    }

    .stat-value {
      font-size: 1.8rem;
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      color: var(--primary-color, #4b5eaa);
    }

    .stat-label {
      font-size: 0.8rem;
      color: var(--text-muted, #475569);
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    .result-rating {
      font-size: 1rem;
      font-weight: 600;
      color: #22c55e;
      margin-top: 0.5rem;
    }

    /* Reset button */
    .reset-btn {
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
    }

    .reset-btn:hover {
      opacity: 0.88;
      transform: translateY(-1px);
    }

    .reset-btn:active {
      transform: translateY(0);
    }

    /* Ratings table */
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

    .ratings-table td {
      color: var(--text-color, #1e293b);
    }

    .ratings-table tr:last-child td {
      border-bottom: none;
    }

    @media (max-width: 480px) {
      .result-stats {
        gap: 1.2rem;
      }
      .spacebar-tool {
        padding: 1.25rem 1rem 2rem;
      }
    }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">

    <!-- ── Tool stage ─────────────────────────────────────────────────── -->
    <section class="tool-stage" id="spacebar-test-tool" aria-labelledby="spacebar-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="spacebar-tool-title">Spacebar Speed Test</h2>
          <p class="section-lede">Press the spacebar as fast as you can and see your score.</p>
        </div>
      </div>

      <section id="spacebar-tester" class="tool-shell">
        <div class="spacebar-tool">
          <h1>Spacebar Test</h1>
          <p class="tool-subtitle">Choose a duration, then press <kbd>Space</kbd> to start</p>

          <!-- Duration selector -->
          <div class="duration-selector" role="group" aria-label="Select test duration">
            <button class="dur-btn" data-seconds="5" aria-pressed="false">5s</button>
            <button class="dur-btn active" data-seconds="10" aria-pressed="true">10s</button>
            <button class="dur-btn" data-seconds="30" aria-pressed="false">30s</button>
          </div>

          <!-- Count & timer displays -->
          <div class="count-display" id="sb-count" aria-live="polite" aria-label="Spacebar press count">0</div>
          <div class="timer-display" id="sb-timer" aria-live="polite" aria-label="Time remaining">10.0s</div>

          <!-- Clickable / keyboard press area -->
          <button
            class="press-area"
            id="sb-press-area"
            aria-label="Press spacebar here or click to start test"
            tabindex="0"
          >
            Click here or press <kbd style="
              display:inline-block;
              padding:0.15em 0.5em;
              border:1px solid currentColor;
              border-radius:4px;
              font-size:0.85em;
              margin-left:0.3em;
            ">SPACEBAR</kbd> to start
          </button>

          <!-- Result panel (hidden until test ends) -->
          <div class="result-panel" id="sb-result" role="status" aria-live="assertive">
            <div class="result-headline" id="sb-result-title">Test Complete!</div>
            <div class="result-stats">
              <div class="stat-item">
                <div class="stat-value" id="sb-final-count">0</div>
                <div class="stat-label">Presses</div>
              </div>
              <div class="stat-item">
                <div class="stat-value" id="sb-final-kps">0.0</div>
                <div class="stat-label">Per Second</div>
              </div>
            </div>
            <div class="result-rating" id="sb-rating"></div>
          </div>

          <!-- Reset -->
          <button class="reset-btn" id="sb-reset-btn" aria-label="Reset spacebar test">Reset</button>
        </div>
      </section>
    </section>

    <!-- ── Trust strip ────────────────────────────────────────────────── -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Instant results</div>
          <div class="trust-desc">See your score the moment time ends</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">3 time modes</div>
          <div class="trust-desc">5, 10, or 30 second challenges</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Browser based</div>
          <div class="trust-desc">No installs or signups needed</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Quick reset</div>
          <div class="trust-desc">Retry as many times as you like</div>
        </div>
      </div>
    </section>

    <!-- ── SEO content ────────────────────────────────────────────────── -->
    <section class="feature-band" aria-labelledby="what-is-title">
      <div class="container">
        <div class="section-head">
          <h2 id="what-is-title">What Is a Spacebar Test?</h2>
          <p class="section-lede">
            A spacebar test measures how many times you can press the spacebar key within
            a fixed time window — typically 5, 10, or 30 seconds. The result is expressed
            as a raw press count and a presses-per-second (PPS) rate, giving you a clear
            benchmark of your key-tapping speed. Gamers use it to warm up, typists use it
            to check finger stamina, and everyone else uses it just for the fun of competing
            against themselves or friends.
          </p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="how-to-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="how-to-title">How to Use the Spacebar Speed Test</h2>
          </div>
          <p class="section-lede">Three steps and you have your score.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>Pick a duration</h3>
            <p>Select 5, 10, or 30 seconds depending on how long you want the challenge to run.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>Press the spacebar</h3>
            <p>Hit the spacebar — or click the button — to start the countdown, then keep pressing as fast as you can.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>Read your score</h3>
            <p>When time runs out your total presses and presses-per-second are shown instantly. Hit Reset to try again.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="ratings-title">
      <div class="container">
        <div class="section-head">
          <h2 id="ratings-title">Spacebar Speed Ratings</h2>
          <p class="section-lede">
            How does your presses-per-second score compare? Use this table as a general
            benchmark — scores vary by keyboard type and test duration.
          </p>
        </div>
        <div class="landing-feature-grid" style="margin-top:1.5rem;">
          <table class="ratings-table" aria-label="Spacebar speed ratings by presses per second">
            <thead>
              <tr>
                <th scope="col">Speed (presses/sec)</th>
                <th scope="col">Rating</th>
                <th scope="col">What it means</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Under 5</td>
                <td>Beginner</td>
                <td>Casual pace — try pressing with the thumb only and keep it relaxed.</td>
              </tr>
              <tr>
                <td>5 – 8</td>
                <td>Average</td>
                <td>Solid everyday speed. Most regular typists land here.</td>
              </tr>
              <tr>
                <td>8 – 12</td>
                <td>Fast</td>
                <td>Above average. You have good rhythm and key feel.</td>
              </tr>
              <tr>
                <td>12 – 15</td>
                <td>Pro</td>
                <td>Excellent. Competitive gamers and fast typists reach this range.</td>
              </tr>
              <tr>
                <td>15 +</td>
                <td>Amazing!</td>
                <td>Elite territory. Very few people sustain this rate for 10 seconds or more.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- ── Related tools ──────────────────────────────────────────────── -->
    <?php include 'includes/components/tools-list.php'; ?>
    <?php $currentTool = 'spacebar'; include 'includes/related-tools.php'; ?>

  </main>

  <?php include 'footer.php'; ?>

  <script>
  (function () {
    'use strict';

    // ── State ────────────────────────────────────────────────────────────
    var count       = 0;
    var duration    = 10;     // seconds chosen by user
    var timeLeft    = 10;     // tenths of a second × 10
    var running     = false;
    var finished    = false;
    var intervalId  = null;

    // ── DOM refs ─────────────────────────────────────────────────────────
    var countEl      = document.getElementById('sb-count');
    var timerEl      = document.getElementById('sb-timer');
    var pressArea    = document.getElementById('sb-press-area');
    var resultPanel  = document.getElementById('sb-result');
    var finalCount   = document.getElementById('sb-final-count');
    var finalKps     = document.getElementById('sb-final-kps');
    var ratingEl     = document.getElementById('sb-rating');
    var resultTitle  = document.getElementById('sb-result-title');
    var resetBtn     = document.getElementById('sb-reset-btn');
    var durBtns      = document.querySelectorAll('.dur-btn');

    // ── Duration selector ────────────────────────────────────────────────
    durBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        if (running) return;
        durBtns.forEach(function (b) {
          b.classList.remove('active');
          b.setAttribute('aria-pressed', 'false');
        });
        btn.classList.add('active');
        btn.setAttribute('aria-pressed', 'true');
        duration = parseInt(btn.dataset.seconds, 10);
        resetState();
      });
    });

    // ── Spacebar / click handling ─────────────────────────────────────────
    document.addEventListener('keydown', function (e) {
      if (e.code === 'Space') {
        e.preventDefault();
        handlePress();
      }
    });

    pressArea.addEventListener('click', function () {
      handlePress();
    });

    // Prevent accidental double-fire from pressing Space while pressArea is focused
    pressArea.addEventListener('keydown', function (e) {
      if (e.code === 'Space') {
        e.preventDefault();
        handlePress();
      }
    });

    function handlePress() {
      if (finished) return;

      if (!running) {
        startTest();
      }

      count++;
      updateCountDisplay();
    }

    // ── Start test ───────────────────────────────────────────────────────
    function startTest() {
      running   = true;
      timeLeft  = duration * 10; // work in tenths of a second for smooth display
      pressArea.classList.add('running');
      pressArea.textContent = 'Keep pressing the spacebar!';

      intervalId = setInterval(function () {
        timeLeft--;
        updateTimerDisplay();

        if (timeLeft <= 0) {
          endTest();
        }
      }, 100);
    }

    // ── End test ─────────────────────────────────────────────────────────
    function endTest() {
      clearInterval(intervalId);
      running  = false;
      finished = true;

      pressArea.classList.remove('running');
      pressArea.classList.add('done');
      pressArea.textContent = 'Test complete!';

      var kps    = count / duration;
      var rating = getRating(kps);

      finalCount.textContent  = count;
      finalKps.textContent    = kps.toFixed(1);
      ratingEl.textContent    = rating;
      resultTitle.textContent = 'Test Complete!';

      resultPanel.classList.add('visible');
    }

    // ── Rating logic ─────────────────────────────────────────────────────
    function getRating(kps) {
      if (kps >= 15)  return 'Amazing! — Elite level spacebar speed!';
      if (kps >= 12)  return 'Pro — Excellent performance!';
      if (kps >= 8)   return 'Fast — Well above average!';
      if (kps >= 5)   return 'Average — Solid everyday speed.';
      return 'Beginner — Keep practising!';
    }

    // ── Display helpers ──────────────────────────────────────────────────
    function updateCountDisplay() {
      countEl.textContent = count;
      // Brief scale-up animation
      countEl.classList.remove('bump');
      void countEl.offsetWidth; // reflow to restart animation
      countEl.classList.add('bump');
    }

    function updateTimerDisplay() {
      var secs   = Math.ceil(timeLeft / 10);
      var tenths = timeLeft % 10;
      timerEl.textContent = secs + '.' + tenths + 's';

      if (timeLeft <= 30) { // last 3 seconds
        timerEl.classList.add('urgent');
      }
    }

    // ── Reset ────────────────────────────────────────────────────────────
    resetBtn.addEventListener('click', function () {
      resetState();
    });

    function resetState() {
      clearInterval(intervalId);
      count    = 0;
      timeLeft = duration * 10;
      running  = false;
      finished = false;

      countEl.textContent  = '0';
      timerEl.textContent  = duration + '.0s';
      timerEl.classList.remove('urgent');

      pressArea.classList.remove('running', 'done');
      pressArea.innerHTML =
        'Click here or press <kbd style="display:inline-block;padding:0.15em 0.5em;' +
        'border:1px solid currentColor;border-radius:4px;font-size:0.85em;margin-left:0.3em;">' +
        'SPACEBAR</kbd> to start';

      resultPanel.classList.remove('visible');
    }
  }());
  </script>
</body>
</html>
