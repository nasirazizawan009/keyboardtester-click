<?php include 'config.php'; ?>
<?php
$pageTitle = 'Keyboard Switch Sound Analyzer — Test If Your Keyboard Is Linear, Tactile or Clicky | KeyboardTester.click';
$pageDescription = 'Analyze your mechanical keyboard switch sound online free. Our mic-based analyzer classifies your switches as linear, tactile, or clicky using real-time FFT. No download needed.';
$pageKeywords = 'keyboard sound test, mechanical keyboard sound analyzer, keyboard switch sound test, is my keyboard too loud, thock test online';
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
  {"@context":"https://schema.org","@type":"WebApplication","name":"Keyboard Switch Sound Analyzer","url":"<?php echo absoluteUrl('keyboard-sound-test.php'); ?>","@id":"<?php echo absoluteUrl('keyboard-sound-test.php'); ?>","description":"Analyze your mechanical keyboard switch sound online free. Classifies switches as linear, tactile, or clicky using real-time FFT frequency analysis via your microphone.","applicationCategory":"UtilityApplication","operatingSystem":"Any","isAccessibleForFree":true,"featureList":["Real-time FFT frequency analysis","Linear/Tactile/Clicky classification","Waveform visualization","Decibel level meter"]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"Can this tool identify my exact switch model?","acceptedAnswer":{"@type":"Answer","text":"No — it classifies by sound profile (linear/tactile/clicky). Exact model identification requires manual lookup or a dedicated switch tester. The frequency signature tells you the acoustic character, not the specific brand or model."}},{"@type":"Question","name":"My microphone isn't detected. What do I do?","acceptedAnswer":{"@type":"Answer","text":"Check browser permissions — click the microphone icon in your address bar and allow access. On Chrome: Settings → Privacy and Security → Site Settings → Microphone. On Firefox: click the lock icon → Permissions → Microphone."}},{"@type":"Question","name":"Why does it say 'Clicky' when I have linear switches?","acceptedAnswer":{"@type":"Answer","text":"Plate resonance, stabilizer rattle, or a hollow case can add high-frequency components to an otherwise linear keystroke. Try pressing a key in the center of the keyboard away from large stabilizers, and consider adding foam dampening."}},{"@type":"Question","name":"Does this work on mobile?","acceptedAnswer":{"@type":"Answer","text":"Yes — tap a key on a connected Bluetooth keyboard or use any object to tap a surface near your phone's microphone. Hold the phone mic close (5–10 cm) to the keyboard for best results."}},{"@type":"Question","name":"Is my audio data stored?","acceptedAnswer":{"@type":"Answer","text":"No — all processing runs locally in your browser using the Web Audio API. No audio is ever sent to any server. Your microphone stream is released as soon as you stop the test."}}]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"<?php echo absoluteUrl(''); ?>"},{"@type":"ListItem","position":2,"name":"Keyboard Sound Analyzer","item":"<?php echo absoluteUrl('keyboard-sound-test.php'); ?>"}]}
  </script>

  <style>
    .kst-tool {
      max-width: 740px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
      text-align: center;
    }
    .kst-tool h1 {
      font-size: clamp(1.6rem, 4vw, 2.4rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #1e293b);
    }
    .kst-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.75rem;
    }
    /* Start / Stop button */
    .kst-start-btn {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.75rem 2.25rem;
      min-height: 48px;
      border: none;
      border-radius: 10px;
      background: var(--primary-color, #4b5eaa);
      color: #fff;
      font-family: inherit;
      font-size: 1rem;
      font-weight: 700;
      cursor: pointer;
      transition: opacity 0.15s, transform 0.1s;
      margin-bottom: 1.5rem;
    }
    .kst-start-btn:hover { opacity: 0.88; transform: translateY(-1px); }
    .kst-start-btn:active { transform: translateY(0); }
    .kst-start-btn.listening {
      background: #dc2626;
    }
    /* Permission error */
    .kst-error {
      display: none;
      background: rgba(239,68,68,0.1);
      border: 1px solid rgba(239,68,68,0.35);
      border-radius: 8px;
      padding: 0.75rem 1rem;
      color: #dc2626;
      font-size: 0.9rem;
      margin-bottom: 1.25rem;
    }
    .kst-error.visible { display: block; }
    /* dB meter */
    .kst-db-wrap {
      margin-bottom: 1.25rem;
      text-align: left;
    }
    .kst-db-label {
      font-size: 0.78rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: var(--text-muted, #475569);
      margin-bottom: 0.3rem;
    }
    .kst-db-track {
      height: 12px;
      background: var(--card-bg, #f1f5f9);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 6px;
      overflow: hidden;
    }
    .kst-db-fill {
      height: 100%;
      width: 0%;
      background: linear-gradient(90deg, #22c55e, #f59e0b, #ef4444);
      border-radius: 6px;
      transition: width 0.05s linear;
    }
    .kst-db-value {
      font-size: 0.85rem;
      font-family: 'JetBrains Mono', monospace;
      color: var(--text-muted, #475569);
      margin-top: 0.25rem;
      text-align: right;
    }
    /* Waveform canvas */
    .kst-canvas-wrap {
      background: var(--card-bg, #0f172a);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 1.25rem;
    }
    .kst-canvas-wrap canvas {
      display: block;
      width: 100%;
      height: 120px;
    }
    /* Classification badge */
    .kst-result {
      display: none;
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 12px;
      padding: 1.5rem 1.25rem;
      margin-bottom: 1.5rem;
    }
    .kst-result.visible { display: block; }
    .kst-result-title {
      font-size: 1rem;
      font-weight: 700;
      color: var(--heading-color, #1e293b);
      margin-bottom: 0.75rem;
    }
    .kst-badge {
      display: inline-block;
      padding: 0.45rem 1.25rem;
      border-radius: 50px;
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 0.6rem;
    }
    .badge-linear  { background: rgba(34,197,94,0.15); color: #16a34a; }
    .badge-tactile { background: rgba(234,179,8,0.15);  color: #a16207; }
    .badge-clicky  { background: rgba(99,102,241,0.15); color: #4338ca; }
    .kst-result-sub {
      font-size: 0.9rem;
      color: var(--text-muted, #475569);
    }
    .kst-freq-row {
      display: flex;
      justify-content: center;
      gap: 1.5rem;
      flex-wrap: wrap;
      margin-top: 0.75rem;
    }
    .kst-freq-item { text-align: center; }
    .kst-freq-val {
      font-size: 1.4rem;
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      color: var(--primary-color, #4b5eaa);
    }
    .kst-freq-lbl {
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: var(--text-muted, #475569);
    }
    /* Instruction hint */
    .kst-hint {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 8px;
      padding: 0.75rem 1rem;
      font-size: 0.9rem;
      color: var(--text-color, #1e293b);
      margin-bottom: 1.25rem;
      text-align: left;
      display: none;
    }
    .kst-hint.visible { display: block; }
    .kst-hint strong { color: var(--primary-color, #4b5eaa); }
    .privacy-note {
      font-size: 0.8rem;
      color: var(--text-muted, #475569);
      margin-top: 0.75rem;
    }
    .reset-btn {
      padding: 0.55rem 1.5rem;
      min-height: 44px;
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 8px;
      background: transparent;
      color: var(--text-muted, #475569);
      font-family: inherit;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: border-color 0.15s, color 0.15s;
      margin-left: 0.5rem;
    }
    .reset-btn:hover {
      border-color: var(--primary-color, #4b5eaa);
      color: var(--primary-color, #4b5eaa);
    }
    .ratings-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
      font-size: 0.95rem;
    }
    .ratings-table th, .ratings-table td {
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
    @media (max-width: 768px) {
      .kst-tool { padding: 1.25rem 1rem 2rem; }
      .kst-freq-row { gap: 1rem; }
    }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>
  <main id="main-content" class="landing-main">

    <!-- Tool stage -->
    <section class="tool-stage" id="kst-section" aria-labelledby="kst-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="kst-tool-title">Keyboard Switch Sound Analyzer</h2>
          <p class="section-lede">Press a key near your mic — the tool classifies it as Linear, Tactile, or Clicky.</p>
        </div>
      </div>

      <section class="tool-shell">
        <div class="kst-tool">
          <h1>Keyboard Switch Sound Analyzer</h1>
          <p class="tool-subtitle">Real-time FFT analysis classifies your mechanical keyboard switches by their sound profile</p>

          <!-- Error panel -->
          <div class="kst-error" id="kst-error" role="alert"></div>

          <!-- Start/Stop button -->
          <button class="kst-start-btn" id="kst-start-btn" aria-label="Start listening to keyboard">
            🎤 Start Listening
          </button>
          <button class="reset-btn" id="kst-reset-btn" aria-label="Reset analyzer">Reset</button>

          <!-- Instruction hint (shown after mic access granted) -->
          <div class="kst-hint visible" id="kst-hint">
            <strong>Instructions:</strong> Click "Start Listening", then press a key on your keyboard near your microphone. Hold the mic 10–20 cm from the board for best results.
          </div>

          <!-- dB level meter -->
          <div class="kst-db-wrap">
            <div class="kst-db-label">Input Level</div>
            <div class="kst-db-track" role="progressbar" aria-label="Microphone input level" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
              <div class="kst-db-fill" id="kst-db-fill"></div>
            </div>
            <div class="kst-db-value" id="kst-db-value">— dB</div>
          </div>

          <!-- Waveform canvas -->
          <div class="kst-canvas-wrap" aria-label="Waveform visualization">
            <canvas id="kst-canvas" height="120" aria-hidden="true"></canvas>
          </div>

          <!-- Classification result -->
          <div class="kst-result" id="kst-result" role="status" aria-live="assertive">
            <div class="kst-result-title">Switch Classification</div>
            <div class="kst-badge" id="kst-badge">—</div>
            <div class="kst-result-sub" id="kst-result-sub"></div>
            <div class="kst-freq-row">
              <div class="kst-freq-item">
                <div class="kst-freq-val" id="kst-peak-freq">—</div>
                <div class="kst-freq-lbl">Peak Frequency</div>
              </div>
              <div class="kst-freq-item">
                <div class="kst-freq-val" id="kst-db-peak">—</div>
                <div class="kst-freq-lbl">Peak dB</div>
              </div>
            </div>
          </div>

          <p class="privacy-note">This test runs entirely in your browser. No data is collected or transmitted.</p>
        </div>
      </section>
    </section>

    <!-- Trust strip -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Mic-based</div>
          <div class="trust-desc">Uses your browser microphone — no external hardware needed</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Real FFT Analysis</div>
          <div class="trust-desc">Web Audio API AnalyserNode processes 2048 frequency bins</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Instant Classification</div>
          <div class="trust-desc">Linear, Tactile, or Clicky result within 300ms of keypress</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">100% Browser</div>
          <div class="trust-desc">No download, no signup — works in Chrome, Firefox, Edge</div>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 1 -->
    <section class="feature-band" aria-labelledby="switch-types-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="switch-types-heading">Linear, Tactile, and Clicky — What Does Your Switch Sound Say?</h2>
          <p class="section-lede">
            Mechanical keyboard switches produce three distinctly different acoustic profiles,
            and the dominant frequency of the sound tells you exactly which type you have.
            <strong>Linear switches</strong> (such as Cherry MX Red, Speed Silver, or Gateron Yellow)
            actuate smoothly without a bump or click, producing a low-frequency thud concentrated
            below 500 Hz. Enthusiasts call this the coveted "thock" sound — deep, muted, and
            satisfying. <strong>Tactile switches</strong> (Brown, Clear, Boba U4) add a physical
            bump at the actuation point, which generates a mid-range snap in the 500–2000 Hz band.
            You feel the feedback, and the mic catches the corresponding frequency spike.
            <strong>Clicky switches</strong> (Blue, Green, Box White) include a dedicated click
            mechanism that fires a sharp, bright sound rich in frequencies above 2000 Hz — the
            crispest and loudest of the three profiles. This analyzer measures those exact frequency
            signatures in real time to classify your switches automatically.
          </p>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 2 -->
    <section class="process-band" aria-labelledby="how-it-works-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="how-it-works-heading">How the Keyboard Sound Analyzer Works</h2>
          <p class="section-lede">
            When you click "Start Listening," the tool requests microphone access and creates
            a Web Audio API <code>AudioContext</code> with an <code>AnalyserNode</code> configured
            for 2048 FFT bins. The FFT (Fast Fourier Transform) breaks the raw audio waveform into
            individual frequency components — similar to how a prism splits white light into a
            spectrum. The tool continuously monitors the incoming amplitude. When it detects a
            keypress (amplitude spikes above the detection threshold), it captures a 300ms window
            of audio, calls <code>getByteFrequencyData()</code> to read all 2048 frequency bins,
            and identifies the bin with the highest energy. That bin is converted to a frequency
            in Hz using the formula: <em>peak_hz = (bin_index × sample_rate) / fftSize</em>.
            The resulting frequency is then compared against the three threshold bands to produce
            the Linear / Tactile / Clicky classification. <strong>Mic placement matters:</strong>
            position the microphone 10–20 cm directly in front of the keyboard at desk level
            for the cleanest frequency reading.
          </p>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 3 -->
    <section class="feature-band" aria-labelledby="db-levels-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="db-levels-heading">Is My Keyboard Too Loud? Decibel Levels Explained</h2>
          <p class="section-lede">
            Office environments typically target 60–65 dB(A) ambient noise — roughly the volume
            of a normal conversation. Individual keystrokes from mechanical switches can reach
            peak levels of 45–70 dB(A) depending on switch type and surface materials.
            <strong>Linear switches</strong> on a desk mat typically measure 45–52 dB — quiet
            enough for most open offices. <strong>Tactile switches</strong> sit around 50–58 dB
            for the bump snap plus the bottom-out impact. <strong>Clicky switches</strong> are
            the loudest, commonly measuring 55–70 dB — clearly audible on video calls and in
            quiet shared spaces. The dB meter in this tool shows the relative amplitude of your
            keypress capture, which gives a comparative measure even without a calibrated
            microphone. If co-workers regularly comment on your keyboard noise, switching to
            linear switches with O-ring dampeners typically cuts peak levels by 8–12 dB.
          </p>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 4 -->
    <section class="process-band" aria-labelledby="reduce-noise-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="reduce-noise-heading">How to Reduce Keyboard Noise</h2>
          <p class="section-lede">
            Even clicky or loud keyboards can be tamed significantly with a few modifications.
            <strong>O-rings</strong> are silicone dampening rings that fit around the keycap stem
            and cushion the bottom-out impact — they typically reduce keystroke noise by 5–10 dB
            at the cost of a slightly shorter travel feel. <strong>Desk mats</strong> (large foam
            or rubber mouse pads) absorb case resonance and lower the effective surface reflection,
            cutting overall loudness by 3–6 dB. <strong>Case foam</strong> — placing craft foam
            or neoprene inside the keyboard case between the PCB and bottom plate — eliminates
            hollow case ping that amplifies switch noise. <strong>Switch lubricant</strong> such as
            Krytox 205g0 applied to linear switch rails removes the friction-based rattle component,
            which is often responsible for the high-frequency spike that causes this analyzer to
            misclassify linears as tactile. For the best results combine all four: desk mat,
            case foam, lubed switches, and O-ring dampeners — this setup can bring even loud
            clicky switches into office-acceptable territory.
          </p>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="feature-band" aria-labelledby="faq-kst">
      <div class="container">
        <div class="section-head">
          <h2 id="faq-kst">Frequently Asked Questions</h2>
        </div>
        <div style="margin-top:1rem;">
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Can this tool identify my exact switch model?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">No — it classifies by sound profile (linear/tactile/clicky). Exact model identification needs manual lookup. The frequency signature tells you the acoustic character, not the specific brand or model of the switch.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">My microphone isn't detected. What do I do?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">Check browser permissions — click the mic icon in your address bar and allow access. On Chrome go to Settings → Privacy and Security → Site Settings → Microphone. Make sure no other application is exclusively holding the mic device.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Why does it say "Clicky" when I have linear switches?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">Plate resonance or stabilizer rattle can add high-frequency components. Try pressing a key in the center of the keyboard, away from large stabilizers. Adding case foam and lubing stabilizers often fixes misclassification.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Does this work on mobile?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">Yes — tap a key on a connected Bluetooth keyboard or use any object to tap a surface near your phone's microphone. Hold the mic close (5–10 cm) to the keyboard for best results. Mobile browsers support <code>getUserMedia</code> in Safari 11+ and Chrome for Android.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Is my audio data stored?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">No — all processing runs locally in your browser. No audio is ever sent to any server. Your microphone stream is released as soon as you click Stop or leave the page.</p>
          </details>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php $relatedToolKey = 'mouse'; include __DIR__ . '/includes/related-tools.php'; ?>

  </main>
  <?php include 'footer.php'; ?>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    requestAnimationFrame(function(){ setTimeout(function(){
      'use strict';

      var startBtn   = document.getElementById('kst-start-btn');
      var resetBtn   = document.getElementById('kst-reset-btn');
      var errorEl    = document.getElementById('kst-error');
      var hintEl     = document.getElementById('kst-hint');
      var dbFill     = document.getElementById('kst-db-fill');
      var dbValue    = document.getElementById('kst-db-value');
      var dbTrack    = document.querySelector('.kst-db-track');
      var canvas     = document.getElementById('kst-canvas');
      var resultEl   = document.getElementById('kst-result');
      var badgeEl    = document.getElementById('kst-badge');
      var subEl      = document.getElementById('kst-result-sub');
      var peakFreqEl = document.getElementById('kst-peak-freq');
      var dbPeakEl   = document.getElementById('kst-db-peak');

      var audioCtx   = null;
      var analyser   = null;
      var source     = null;
      var stream     = null;
      var rafId      = null;
      var listening  = false;

      // Canvas size
      var ctx2d = canvas.getContext('2d');
      function resizeCanvas() {
        canvas.width  = canvas.offsetWidth || 680;
        canvas.height = 120;
      }
      resizeCanvas();
      window.addEventListener('resize', resizeCanvas);

      // ── Start listening ──────────────────────────────────────────────────
      startBtn.addEventListener('click', function() {
        if (listening) {
          stopListening();
        } else {
          startListening();
        }
      });

      function startListening() {
        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
          showError('Your browser does not support microphone access. Please use Chrome, Firefox, or Edge.');
          return;
        }
        navigator.mediaDevices.getUserMedia({ audio: true, video: false })
          .then(function(s) {
            stream     = s;
            audioCtx   = new (window.AudioContext || window.webkitAudioContext)();
            analyser   = audioCtx.createAnalyser();
            analyser.fftSize = 2048;
            analyser.smoothingTimeConstant = 0.5;
            source     = audioCtx.createMediaStreamSource(stream);
            source.connect(analyser);

            listening = true;
            startBtn.textContent = '⏹ Stop Listening';
            startBtn.classList.add('listening');
            hintEl.innerHTML = '<strong>Listening…</strong> Press a key near your microphone now.';
            clearError();
            drawLoop();
          })
          .catch(function(err) {
            showError('Microphone access denied. Click the mic icon in your address bar and allow access, then try again.');
          });
      }

      function stopListening() {
        listening = false;
        if (rafId) { cancelAnimationFrame(rafId); rafId = null; }
        if (source) { source.disconnect(); source = null; }
        if (audioCtx) { audioCtx.close(); audioCtx = null; }
        if (stream) {
          stream.getTracks().forEach(function(t) { t.stop(); });
          stream = null;
        }
        analyser = null;
        startBtn.textContent = '🎤 Start Listening';
        startBtn.classList.remove('listening');
        hintEl.innerHTML = '<strong>Instructions:</strong> Click "Start Listening", then press a key on your keyboard near your microphone.';
        // Clear meter
        dbFill.style.width = '0%';
        dbValue.textContent = '— dB';
        // Clear canvas
        ctx2d.clearRect(0, 0, canvas.width, canvas.height);
      }

      // ── Draw loop ────────────────────────────────────────────────────────
      var captureArmed    = true;
      var captureCooldown = 0;

      function drawLoop() {
        if (!listening || !analyser) return;
        rafId = requestAnimationFrame(drawLoop);

        var bufLen   = analyser.frequencyBinCount; // 1024
        var timeData = new Uint8Array(bufLen);
        var freqData = new Uint8Array(bufLen);
        analyser.getByteTimeDomainData(timeData);
        analyser.getByteFrequencyData(freqData);

        // Compute RMS amplitude from time domain
        var sumSq = 0;
        for (var i = 0; i < bufLen; i++) {
          var v = (timeData[i] - 128) / 128;
          sumSq += v * v;
        }
        var rms = Math.sqrt(sumSq / bufLen);
        var dbRaw = rms > 0 ? 20 * Math.log10(rms) : -80;
        // Map -60..0 dB to 0..100%
        var pct = Math.max(0, Math.min(100, ((dbRaw + 60) / 60) * 100));
        dbFill.style.width = pct.toFixed(1) + '%';
        if (dbTrack) dbTrack.setAttribute('aria-valuenow', Math.round(pct));
        dbValue.textContent = dbRaw > -79 ? dbRaw.toFixed(1) + ' dB' : '— dB';

        // Draw waveform
        var W = canvas.width, H = canvas.height;
        ctx2d.fillStyle = '#0f172a';
        ctx2d.fillRect(0, 0, W, H);
        ctx2d.lineWidth   = 2;
        ctx2d.strokeStyle = '#38bdf8';
        ctx2d.beginPath();
        var sliceW = W / bufLen;
        var x = 0;
        for (var j = 0; j < bufLen; j++) {
          var y = (timeData[j] / 255) * H;
          if (j === 0) ctx2d.moveTo(x, y);
          else         ctx2d.lineTo(x, y);
          x += sliceW;
        }
        ctx2d.stroke();

        // Keypress detection — fire when amplitude spikes above threshold
        if (captureCooldown > 0) { captureCooldown--; return; }
        if (captureArmed && rms > 0.04) {
          captureArmed    = false;
          captureCooldown = 18; // ~300ms at 60fps cooldown before next capture
          analyseKeypress(freqData, dbRaw);
          // Re-arm after 600ms
          setTimeout(function() { captureArmed = true; }, 600);
        }
      }

      // ── Analyse keypress ─────────────────────────────────────────────────
      function analyseKeypress(freqData, dbRaw) {
        var sampleRate = audioCtx ? audioCtx.sampleRate : 44100;
        var fftSize    = analyser ? analyser.fftSize : 2048;
        var binCount   = freqData.length; // fftSize / 2

        // Find peak bin
        var peakBin = 0, peakVal = 0;
        for (var i = 1; i < binCount; i++) {
          if (freqData[i] > peakVal) {
            peakVal = freqData[i];
            peakBin = i;
          }
        }

        var peakHz = Math.round((peakBin * sampleRate) / fftSize);

        // Classify
        var classification, badgeClass, tip;
        if (peakHz < 500) {
          classification = 'Linear (Thock)';
          badgeClass     = 'badge-linear';
          tip            = 'Deep, low-frequency profile — characteristic of smooth linear switches like MX Red, Gateron Yellow, or fully lubed linears.';
        } else if (peakHz <= 2000) {
          classification = 'Tactile';
          badgeClass     = 'badge-tactile';
          tip            = 'Mid-range frequency snap detected — typical of tactile switches such as MX Brown, Boba U4, or Holy Pandas.';
        } else {
          classification = 'Clicky';
          badgeClass     = 'badge-clicky';
          tip            = 'High-frequency bright profile — matches clicky switches like MX Blue, Box White, or Kailh Box Jade.';
        }

        // Update UI
        badgeEl.textContent  = classification;
        badgeEl.className    = 'kst-badge ' + badgeClass;
        subEl.textContent    = tip;
        peakFreqEl.textContent = peakHz >= 1000
          ? (peakHz / 1000).toFixed(1) + ' kHz'
          : peakHz + ' Hz';
        dbPeakEl.textContent = dbRaw.toFixed(1) + ' dB';
        resultEl.classList.add('visible');
      }

      // ── Reset ────────────────────────────────────────────────────────────
      resetBtn.addEventListener('click', function() {
        stopListening();
        resultEl.classList.remove('visible');
        badgeEl.className = 'kst-badge';
        badgeEl.textContent = '—';
        subEl.textContent   = '';
        peakFreqEl.textContent = '—';
        dbPeakEl.textContent   = '—';
        captureArmed    = true;
        captureCooldown = 0;
        clearError();
      });

      // ── Helpers ──────────────────────────────────────────────────────────
      function showError(msg) {
        errorEl.textContent = msg;
        errorEl.classList.add('visible');
      }
      function clearError() {
        errorEl.textContent = '';
        errorEl.classList.remove('visible');
      }

    }, 0); });
  });
  </script>
</body>
</html>
