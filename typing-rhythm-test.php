<?php include 'config.php'; ?>
<?php
$pageTitle = 'Free Typing Rhythm Fingerprint Test — Consistency & Bigram Heatmap Online | KeyboardTester.click';
$pageDescription = 'Free typing rhythm test online. Measure your keystroke dwell time, flight time, and get a bigram heatmap showing your fastest and slowest key transitions. No download needed.';
$pageKeywords = 'typing rhythm test, typing fingerprint test, typing consistency test, keystroke dynamics test, bigram timing heatmap';
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
  {"@context":"https://schema.org","@type":"WebApplication","name":"Typing Rhythm Fingerprint Test","url":"<?php echo absoluteUrl('typing-rhythm-test.php'); ?>","description":"Free online typing rhythm test measuring keystroke dwell time, flight time, and bigram transitions with a canvas heatmap and Rhythm Consistency Score.","applicationCategory":"UtilityApplication","operatingSystem":"Any","isAccessibleForFree":true,"featureList":["Keystroke dwell time measurement","Flight time measurement between keys","Bigram heatmap canvas visualization","Rhythm Consistency Score (0–100)","Fastest and slowest transition display"]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"What is typing rhythm?","acceptedAnswer":{"@type":"Answer","text":"Typing rhythm describes the timing pattern of your keystrokes — specifically the dwell time (how long each key is held) and flight time (gap between releasing one key and pressing the next). Consistent rhythm produces even, readable text and is associated with expert typists."}},{"@type":"Question","name":"What is flight time in typing?","acceptedAnswer":{"@type":"Answer","text":"Flight time is the interval between releasing one key and pressing the next. Short, consistent flight times indicate smooth, practiced typing. Long or highly variable flight times suggest hesitation or unfamiliarity with certain key pairs (bigrams)."}},{"@type":"Question","name":"What is a Rhythm Consistency Score?","acceptedAnswer":{"@type":"Answer","text":"The Rhythm Consistency Score (0–100) measures how uniform your inter-key timing is. It is calculated as 100 minus the coefficient of variation of your flight times, clamped to 0–100. A score above 70 is considered good for everyday typing."}},{"@type":"Question","name":"What is a bigram in typing?","acceptedAnswer":{"@type":"Answer","text":"A bigram is any pair of consecutive keys — for example 'th', 'he', 'in'. The heatmap visualises how quickly you transition between common bigrams. Fast bigrams appear in cool colors; slow ones appear in warm colors."}},{"@type":"Question","name":"How can I improve my typing consistency?","acceptedAnswer":{"@type":"Answer","text":"Practice slow, deliberate typing at a steady metronome pace before building speed. Focus on the bigrams your heatmap flags as slow — these are usually awkward same-hand or cross-row combinations that benefit from targeted drill practice."}}]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"<?php echo absoluteUrl(''); ?>"},{"@type":"ListItem","position":2,"name":"Typing Rhythm Test","item":"<?php echo absoluteUrl('typing-rhythm-test.php'); ?>"}]}
  </script>
  <style>
    .trt-tool {
      max-width: 760px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
    }
    .trt-tool h1 {
      font-size: clamp(1.6rem, 4vw, 2.4rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #1e293b);
      text-align: center;
    }
    .trt-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.5rem;
      text-align: center;
    }
    .trt-passage {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      padding: 1rem 1.25rem;
      font-size: 1rem;
      line-height: 1.7;
      color: var(--text-color, #1e293b);
      margin-bottom: 1rem;
      user-select: none;
    }
    .trt-passage .typed-char { color: var(--text-muted, #475569); }
    .trt-passage .cursor-char {
      background: var(--primary-color, #4b5eaa);
      color: #fff;
      border-radius: 2px;
    }
    .trt-input {
      width: 100%;
      min-height: 48px;
      border: 2px solid var(--border-color, #e2e8f0);
      border-radius: 8px;
      padding: 0.75rem 1rem;
      font-family: inherit;
      font-size: 1rem;
      background: transparent;
      color: var(--text-color, #1e293b);
      outline: none;
      box-sizing: border-box;
      transition: border-color 0.15s;
      margin-bottom: 1rem;
    }
    .trt-input:focus { border-color: var(--primary-color, #4b5eaa); }
    .trt-progress-bar-wrap {
      background: var(--card-bg, #e2e8f0);
      border-radius: 4px;
      height: 8px;
      margin-bottom: 1rem;
      overflow: hidden;
    }
    .trt-progress-bar {
      height: 100%;
      background: var(--primary-color, #4b5eaa);
      border-radius: 4px;
      transition: width 0.1s;
      width: 0%;
    }
    .trt-stats-row {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      margin-bottom: 1rem;
    }
    .trt-stat {
      flex: 1;
      min-width: 120px;
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 8px;
      padding: 0.75rem 0.5rem;
      text-align: center;
    }
    .trt-stat-value {
      font-size: 1.6rem;
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      color: var(--primary-color, #4b5eaa);
    }
    .trt-stat-label {
      font-size: 0.75rem;
      color: var(--text-muted, #475569);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 0.2rem;
    }
    .trt-canvas-wrap {
      margin-bottom: 1rem;
    }
    .trt-canvas-label {
      font-size: 0.8rem;
      color: var(--text-muted, #475569);
      margin-bottom: 0.4rem;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }
    #trt-canvas {
      width: 100%;
      border-radius: 8px;
      border: 1px solid var(--border-color, #e2e8f0);
      display: block;
    }
    .trt-results {
      display: none;
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      padding: 1.25rem;
      margin-bottom: 1rem;
    }
    .trt-results.visible { display: block; }
    .trt-results-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: var(--heading-color, #1e293b);
      margin-bottom: 0.75rem;
    }
    .trt-results-row {
      display: flex;
      justify-content: space-between;
      font-size: 0.9rem;
      color: var(--text-color, #1e293b);
      padding: 0.3rem 0;
      border-bottom: 1px solid var(--border-color, #e2e8f0);
    }
    .trt-results-row:last-child { border-bottom: none; }
    .trt-score-badge {
      font-size: 2rem;
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      color: var(--primary-color, #4b5eaa);
      text-align: center;
      margin-bottom: 0.5rem;
    }
    .trt-btn {
      padding: 0.65rem 1.75rem;
      border: none;
      border-radius: 8px;
      background: var(--primary-color, #4b5eaa);
      color: #fff;
      font-family: inherit;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: opacity 0.15s;
      min-height: 44px;
      margin-right: 0.5rem;
    }
    .trt-btn:hover { opacity: 0.88; }
    .trt-btn-outline {
      background: transparent;
      border: 2px solid var(--primary-color, #4b5eaa);
      color: var(--primary-color, #4b5eaa);
    }
    .privacy-note {
      font-size: 0.8rem;
      color: var(--text-muted, #475569);
      margin-top: 1rem;
    }
    @media (max-width: 480px) {
      .trt-tool { padding: 1.25rem 1rem 2rem; }
      .trt-stats-row { flex-direction: column; }
    }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>
  <main id="main-content" class="landing-main">

    <section class="tool-stage" aria-labelledby="trt-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="trt-title">Typing Rhythm Fingerprint Test</h2>
          <p class="section-lede">Type the passage below and see your unique keystroke timing pattern.</p>
        </div>
      </div>
      <section class="tool-shell">
        <div class="trt-tool">
          <h1>Typing Rhythm Fingerprint Test</h1>
          <p class="tool-subtitle">Type the passage — your dwell times, flight times, and bigram heatmap appear as you type</p>

          <!-- Passage display -->
          <div class="trt-passage" id="trt-passage" aria-label="Passage to type" aria-live="polite"></div>

          <!-- Hidden input captures keystrokes -->
          <input
            type="text"
            id="trt-input"
            class="trt-input"
            placeholder="Click here and start typing the passage above…"
            autocomplete="off"
            autocorrect="off"
            autocapitalize="off"
            spellcheck="false"
            aria-label="Type the passage here"
          >

          <!-- Progress -->
          <div class="trt-progress-bar-wrap" role="progressbar" aria-valuemin="0" aria-valuemax="100" id="trt-progress-aria" aria-valuenow="0" aria-label="Typing progress">
            <div class="trt-progress-bar" id="trt-progress"></div>
          </div>

          <!-- Live stats -->
          <div class="trt-stats-row">
            <div class="trt-stat">
              <div class="trt-stat-value" id="trt-chars">0</div>
              <div class="trt-stat-label">Chars typed</div>
            </div>
            <div class="trt-stat">
              <div class="trt-stat-value" id="trt-avg-dwell">—</div>
              <div class="trt-stat-label">Avg Dwell (ms)</div>
            </div>
            <div class="trt-stat">
              <div class="trt-stat-value" id="trt-avg-flight">—</div>
              <div class="trt-stat-label">Avg Flight (ms)</div>
            </div>
            <div class="trt-stat">
              <div class="trt-stat-value" id="trt-score">—</div>
              <div class="trt-stat-label">Consistency</div>
            </div>
          </div>

          <!-- Bigram heatmap canvas -->
          <div class="trt-canvas-wrap">
            <div class="trt-canvas-label">Bigram transition heatmap (cool = fast, warm = slow)</div>
            <canvas id="trt-canvas" width="700" height="200" aria-label="Bigram timing heatmap"></canvas>
          </div>

          <!-- Results panel -->
          <div class="trt-results" id="trt-results" role="status" aria-live="assertive">
            <div class="trt-results-title">Rhythm Fingerprint Results</div>
            <div class="trt-score-badge" id="trt-final-score">—</div>
            <div class="trt-results-row"><span>Rhythm Consistency Score</span><span id="trt-r-score"></span></div>
            <div class="trt-results-row"><span>Avg Dwell Time</span><span id="trt-r-dwell"></span></div>
            <div class="trt-results-row"><span>Avg Flight Time</span><span id="trt-r-flight"></span></div>
            <div class="trt-results-row"><span>Fastest Bigram</span><span id="trt-r-fastest"></span></div>
            <div class="trt-results-row"><span>Slowest Bigram</span><span id="trt-r-slowest"></span></div>
            <div class="trt-results-row"><span>Rating</span><span id="trt-r-rating" style="font-weight:700;"></span></div>
          </div>

          <div style="margin-bottom:0.5rem;">
            <button class="trt-btn" id="trt-reset">Reset</button>
          </div>
          <p class="privacy-note">This test runs entirely in your browser. No data is collected.</p>
        </div>
      </section>
    </section>

    <!-- Trust strip -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Bigram heatmap</div>
          <div class="trust-desc">See which key pairs you type fast and which you hesitate on</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Consistency score</div>
          <div class="trust-desc">Quantified rhythm uniformity on a 0–100 scale</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Dwell & flight times</div>
          <div class="trust-desc">Millisecond precision for every keystroke transition</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Browser only</div>
          <div class="trust-desc">No server, no keystroke logging — fully private</div>
        </div>
      </div>
    </section>

    <!-- SEO content -->
    <section class="feature-band" aria-labelledby="what-is-rhythm">
      <div class="container">
        <div class="section-head">
          <h2 id="what-is-rhythm">What Is Typing Rhythm?</h2>
          <p class="section-lede">
            Typing rhythm refers to the temporal pattern of your keystrokes — how long you
            hold each key (dwell time) and how quickly you move to the next (flight time).
            Expert typists develop a consistent, almost musical rhythm that lets them type
            faster with fewer errors. Unlike raw WPM speed, rhythm consistency describes
            the evenness of your keystrokes over time: a highly consistent typist produces
            the same inter-key intervals on the same bigrams whether typing fast or slow.
          </p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="rhythm-vs-wpm">
      <div class="container">
        <div class="section-head">
          <h2 id="rhythm-vs-wpm">How Rhythm Differs from WPM</h2>
          <p class="section-lede">
            WPM (words per minute) measures raw throughput — how much text you produce.
            Rhythm consistency measures how uniform your timing is regardless of speed.
            Two typists can both achieve 80 WPM, but the one with higher rhythm consistency
            makes fewer typos, recovers faster from errors, and can sustain speed for longer.
            Rhythm is the foundation; WPM is the result. Professional pianists and court
            stenographers develop rhythm consistency scores above 85 on this scale.
          </p>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="fingerprint-reveals">
      <div class="container">
        <div class="section-head">
          <h2 id="fingerprint-reveals">What Your Rhythm Fingerprint Reveals</h2>
          <p class="section-lede">
            The bigram heatmap is your personal typing fingerprint. Warm cells (red/orange)
            show transitions where you consistently slow down — typically cross-hand
            movements you haven't automated, or adjacent-finger bigrams on the same row.
            Cool cells (blue/green) show well-practiced pairs your fingers navigate without
            conscious effort. By identifying your slow bigrams, you can target exactly the
            key pairs that hold your speed back.
          </p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="improve-consistency">
      <div class="container">
        <div class="section-head">
          <h2 id="improve-consistency">How to Improve Typing Consistency</h2>
          <p class="section-lede">
            Slow down first: type at 60–70% of your top speed while maintaining an even
            beat. Use a metronome app and aim to hit one keystroke per beat. After two weeks
            of deliberate practice at a consistent pace, gradually increase the tempo.
            Second, drill your weak bigrams — copy them out in isolation, repeating each
            pair 50 times per session. Third, use a standard finger-to-key mapping (home
            row anchors) to reduce unpredictable reach distances. Consistency gains typically
            show in the heatmap within 5–10 practice sessions.
          </p>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="feature-band" aria-labelledby="faq-trt">
      <div class="container">
        <div class="section-head">
          <h2 id="faq-trt">Frequently Asked Questions</h2>
        </div>
        <div style="margin-top:1rem;">
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Is my keystroke data sent to any server?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">No. All timing measurements happen entirely in JavaScript in your browser tab. Nothing is stored locally or transmitted to any server.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">What score is considered good?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">70+ is good for everyday typists, 80+ is strong, and 90+ is expert level. Beginners typically score 40–60. The score reflects how evenly spaced your keystrokes are, not your speed.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">How many characters do I need to type to see results?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">Results appear after 30+ characters and a full view of the bigram heatmap and final scores after completing the entire passage (~150 characters).</p>
          </details>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php $currentTool = 'typing-rhythm'; include 'includes/related-tools.php'; ?>

  </main>
  <?php include 'footer.php'; ?>
  <script>
  requestAnimationFrame(function(){ setTimeout(function(){
    'use strict';

    var PASSAGE = 'The quick brown fox jumps over the lazy dog near the river bank where tall pine trees stand in silence. Pack my box with five dozen liquor jugs right away.';
    var HOME_KEYS = 'asdfghjklqwertyuiopzxcvbnm';

    var passageEl   = document.getElementById('trt-passage');
    var inputEl     = document.getElementById('trt-input');
    var progressEl  = document.getElementById('trt-progress');
    var progressAria= document.getElementById('trt-progress-aria');
    var charsEl     = document.getElementById('trt-chars');
    var dwellEl     = document.getElementById('trt-avg-dwell');
    var flightEl    = document.getElementById('trt-avg-flight');
    var scoreEl     = document.getElementById('trt-score');
    var resultsEl   = document.getElementById('trt-results');
    var finalScore  = document.getElementById('trt-final-score');
    var rScore      = document.getElementById('trt-r-score');
    var rDwell      = document.getElementById('trt-r-dwell');
    var rFlight     = document.getElementById('trt-r-flight');
    var rFastest    = document.getElementById('trt-r-fastest');
    var rSlowest    = document.getElementById('trt-r-slowest');
    var rRating     = document.getElementById('trt-r-rating');
    var resetBtn    = document.getElementById('trt-reset');
    var canvas      = document.getElementById('trt-canvas');
    var ctx         = canvas.getContext('2d');

    // State
    var keyDownTimes = {};
    var dwellTimes   = [];
    var flightTimes  = [];
    var lastUpTime   = 0;
    var lastUpKey    = '';
    var bigramMap    = {};
    var typedCount   = 0;
    var finished     = false;

    function renderPassage(idx) {
      var html = '';
      for (var i = 0; i < PASSAGE.length; i++) {
        var ch = PASSAGE[i] === ' ' ? '\u00a0' : PASSAGE[i];
        if (i < idx) {
          html += '<span class="typed-char">' + escapeHtml(ch) + '</span>';
        } else if (i === idx) {
          html += '<span class="cursor-char">' + escapeHtml(ch) + '</span>';
        } else {
          html += '<span>' + escapeHtml(ch) + '</span>';
        }
      }
      passageEl.innerHTML = html;
    }

    function escapeHtml(s) {
      return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    renderPassage(0);

    inputEl.addEventListener('keydown', function(e) {
      if (finished) return;
      var now = performance.now();
      var key = e.key;
      keyDownTimes[key] = now;
    });

    inputEl.addEventListener('keyup', function(e) {
      if (finished) return;
      var now = performance.now();
      var key = e.key;

      if (keyDownTimes[key] !== undefined) {
        var dwell = now - keyDownTimes[key];
        dwellTimes.push(dwell);
        delete keyDownTimes[key];

        if (lastUpTime > 0 && lastUpKey !== '' && key.length === 1 && lastUpKey.length === 1) {
          var flight = keyDownTimes[key] !== undefined ? keyDownTimes[key] - lastUpTime : (now - dwell - lastUpTime);
          // flight = time from last keyup to current keydown
          var fd = now - dwell - lastUpTime;
          if (fd > 0 && fd < 2000) {
            flightTimes.push(fd);
            var bigram = (lastUpKey + key).toLowerCase();
            if (!bigramMap[bigram]) bigramMap[bigram] = [];
            bigramMap[bigram].push(fd);
          }
        }

        lastUpTime = now;
        lastUpKey  = key;
      }
    });

    inputEl.addEventListener('input', function() {
      if (finished) return;
      var val = inputEl.value;
      typedCount = val.length;

      // Check passage match
      var matchLen = 0;
      for (var i = 0; i < val.length && i < PASSAGE.length; i++) {
        if (val[i] === PASSAGE[i]) matchLen++;
        else break;
      }

      renderPassage(matchLen);

      var pct = Math.min(100, Math.round((matchLen / PASSAGE.length) * 100));
      progressEl.style.width = pct + '%';
      progressAria.setAttribute('aria-valuenow', pct);
      charsEl.textContent = matchLen;

      // Update live stats
      if (dwellTimes.length > 0) {
        var avgDwell = avg(dwellTimes);
        dwellEl.textContent = Math.round(avgDwell);
      }
      if (flightTimes.length > 0) {
        var avgFlight = avg(flightTimes);
        flightEl.textContent = Math.round(avgFlight);
        var cv = stddev(flightTimes) / avgFlight;
        var consistency = Math.max(0, Math.min(100, Math.round(100 - cv * 100)));
        scoreEl.textContent = consistency;
        updateHeatmap();
      }

      if (matchLen >= PASSAGE.length) {
        finished = true;
        showFinalResults();
      }
    });

    function avg(arr) {
      return arr.reduce(function(a,b){return a+b;},0) / arr.length;
    }

    function stddev(arr) {
      var m = avg(arr);
      var variance = arr.reduce(function(s,v){return s + Math.pow(v-m,2);},0) / arr.length;
      return Math.sqrt(variance);
    }

    function updateHeatmap() {
      var W = canvas.width, H = canvas.height;
      ctx.clearRect(0, 0, W, H);

      var keys = HOME_KEYS.split('');
      var cellW = Math.floor(W / keys.length);

      // Find min/max flight across all bigrams
      var allFlights = [];
      Object.keys(bigramMap).forEach(function(bg) {
        var a = avg(bigramMap[bg]);
        allFlights.push(a);
      });
      if (allFlights.length === 0) return;
      var minF = Math.min.apply(null, allFlights);
      var maxF = Math.max.apply(null, allFlights);

      // Draw cells for each recorded bigram as horizontal bars
      var sorted = Object.keys(bigramMap).sort(function(a,b) {
        return avg(bigramMap[a]) - avg(bigramMap[b]);
      });

      var rowH = Math.floor(H / Math.max(1, sorted.length));
      rowH = Math.max(rowH, 4);
      var y = 0;

      sorted.forEach(function(bg, idx) {
        if (y >= H) return;
        var a = avg(bigramMap[bg]);
        var t = maxF > minF ? (a - minF) / (maxF - minF) : 0;
        // Cool (blue) = fast, warm (red) = slow
        var r = Math.round(t * 220);
        var g = Math.round((1 - Math.abs(t - 0.5) * 2) * 180);
        var b = Math.round((1 - t) * 220);
        ctx.fillStyle = 'rgb(' + r + ',' + g + ',' + b + ')';
        var barW = Math.max(10, Math.round((a / maxF) * (W - 80)));
        ctx.fillRect(0, y, barW, Math.max(rowH - 1, 3));

        ctx.fillStyle = '#fff';
        ctx.font = '11px monospace';
        ctx.fillText(bg, barW + 4, y + rowH - 2);
        y += rowH;
      });
    }

    function showFinalResults() {
      if (flightTimes.length < 2) return;
      var avgD = avg(dwellTimes);
      var avgF = avg(flightTimes);
      var cv   = stddev(flightTimes) / avgF;
      var score = Math.max(0, Math.min(100, Math.round(100 - cv * 100)));

      finalScore.textContent = score;
      rScore.textContent  = score + ' / 100';
      rDwell.textContent  = Math.round(avgD) + ' ms';
      rFlight.textContent = Math.round(avgF) + ' ms';

      // Fastest/slowest bigrams
      var bgEntries = Object.keys(bigramMap).map(function(bg){
        return {bg: bg, avg: avg(bigramMap[bg])};
      }).sort(function(a,b){ return a.avg - b.avg; });

      rFastest.textContent = bgEntries.length > 0 ?
        '"' + bgEntries[0].bg + '" — ' + Math.round(bgEntries[0].avg) + ' ms' : '—';
      rSlowest.textContent = bgEntries.length > 0 ?
        '"' + bgEntries[bgEntries.length-1].bg + '" — ' + Math.round(bgEntries[bgEntries.length-1].avg) + ' ms' : '—';

      rRating.textContent = score >= 85 ? 'Expert' : score >= 70 ? 'Proficient' : score >= 55 ? 'Average' : 'Developing';
      resultsEl.classList.add('visible');
      updateHeatmap();
    }

    resetBtn.addEventListener('click', function() {
      finished    = false;
      typedCount  = 0;
      dwellTimes  = [];
      flightTimes = [];
      bigramMap   = {};
      keyDownTimes= {};
      lastUpTime  = 0;
      lastUpKey   = '';
      inputEl.value = '';
      progressEl.style.width = '0%';
      progressAria.setAttribute('aria-valuenow', 0);
      charsEl.textContent  = '0';
      dwellEl.textContent  = '—';
      flightEl.textContent = '—';
      scoreEl.textContent  = '—';
      resultsEl.classList.remove('visible');
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      renderPassage(0);
      inputEl.focus();
    });

  }, 0); });
  </script>
</body>
</html>
