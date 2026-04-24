<?php include 'config.php'; ?>
<?php
$pageTitle = 'PWM Flicker Test Online — Check If Your Monitor Has Backlight Flicker | KeyboardTester.click';
$pageDescription = 'Test your monitor for PWM backlight flicker online free. Select flicker frequency, go fullscreen, and film with your phone to detect eye-strain-causing PWM dimming. No software needed.';
$pageKeywords = 'PWM flicker test, monitor backlight flicker test, does my monitor have PWM, monitor eye strain test, PWM free monitor test';
$pageOgImage = 'images/screen-test/hero.png';
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
  {"@context":"https://schema.org","@type":"WebApplication","name":"PWM Flicker Test","url":"<?php echo absoluteUrl('pwm-flicker-test.php'); ?>","@id":"<?php echo absoluteUrl('pwm-flicker-test.php'); ?>","description":"Test your monitor for PWM backlight flicker online. Select a flicker frequency, go fullscreen, and film with your phone camera to detect eye-strain-causing PWM dimming.","applicationCategory":"UtilityApplication","operatingSystem":"Any","isAccessibleForFree":true,"featureList":["5 selectable flicker frequencies (60–960Hz)","Fullscreen canvas flicker test","Phone camera filming method","Banding detection guide","PWM result badge"]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"What phone camera settings work best for the PWM flicker test?","acceptedAnswer":{"@type":"Answer","text":"Use your phone's standard camera app (not portrait mode). Disable auto-exposure if possible — on iPhone enable manual exposure by tapping and locking AE/AF. On Android enable Pro mode. Lower shutter speed (e.g. 1/120s) makes banding more visible."}},{"@type":"Question","name":"I see banding at 60Hz but not 120Hz — does that mean my monitor uses 60Hz PWM?","acceptedAnswer":{"@type":"Answer","text":"Yes — if banding appears at a specific frequency, that matches your monitor's PWM frequency. PWM banding is most visible in your camera feed when the test frequency matches or is a harmonic of the monitor's actual PWM frequency."}},{"@type":"Question","name":"My screen is always maximum brightness — does PWM still apply?","acceptedAnswer":{"@type":"Answer","text":"PWM dimming is typically only active below maximum brightness. At 100% brightness most monitors switch to continuous DC dimming. Test at 50–75% brightness for the most accurate results."}},{"@type":"Question","name":"Can this tool detect PWM automatically?","acceptedAnswer":{"@type":"Answer","text":"The manual phone camera filming method is most reliable because it directly captures photons from the panel. Automatic webcam detection is experimental and requires a high-framerate camera (120fps+) which most laptop webcams do not have."}},{"@type":"Question","name":"Is PWM harmful?","acceptedAnswer":{"@type":"Answer","text":"For most people, no. Sensitive individuals — particularly those prone to migraines, photosensitivity, or eye strain — may experience discomfort at PWM frequencies below 1000Hz, especially during long work sessions. Choosing a PWM-free or high-frequency (>1000Hz) monitor eliminates this risk entirely."}}]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"<?php echo absoluteUrl(''); ?>"},{"@type":"ListItem","position":2,"name":"PWM Flicker Test","item":"<?php echo absoluteUrl('pwm-flicker-test.php'); ?>"}]}
  </script>

  <style>
    .pwm-tool {
      max-width: 720px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
      text-align: center;
    }
    .pwm-tool h1 {
      font-size: clamp(1.6rem, 4vw, 2.4rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #1e293b);
    }
    .pwm-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.75rem;
    }
    /* Frequency selector */
    .freq-selector {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-bottom: 1.5rem;
    }
    .freq-btn {
      padding: 0.55rem 1.1rem;
      min-height: 44px;
      border: 2px solid var(--border-color, #e2e8f0);
      border-radius: 6px;
      background: transparent;
      color: var(--text-muted, #475569);
      font-family: 'JetBrains Mono', monospace;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: border-color 0.15s, color 0.15s, background 0.15s;
    }
    .freq-btn:hover {
      border-color: var(--primary-color, #4b5eaa);
      color: var(--primary-color, #4b5eaa);
    }
    .freq-btn.active {
      border-color: var(--primary-color, #4b5eaa);
      background: var(--primary-color, #4b5eaa);
      color: #fff;
    }
    /* Main action button */
    .pwm-start-btn {
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
      margin-bottom: 1.25rem;
    }
    .pwm-start-btn:hover { opacity: 0.88; transform: translateY(-1px); }
    .pwm-start-btn:active { transform: translateY(0); }
    .pwm-start-btn.running { background: #dc2626; }
    /* Preview canvas (non-fullscreen) */
    .pwm-preview-wrap {
      border: 2px dashed var(--border-color, #e2e8f0);
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 1.25rem;
      position: relative;
      background: #000;
      height: 180px;
    }
    .pwm-preview-wrap canvas {
      display: block;
      width: 100%;
      height: 100%;
    }
    .pwm-preview-label {
      position: absolute;
      bottom: 8px;
      left: 0;
      right: 0;
      text-align: center;
      font-size: 0.8rem;
      color: rgba(255,255,255,0.6);
      pointer-events: none;
    }
    /* Instruction card */
    .pwm-instructions {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      padding: 1rem 1.25rem;
      text-align: left;
      margin-bottom: 1.25rem;
      font-size: 0.9rem;
      color: var(--text-color, #1e293b);
    }
    .pwm-instructions ol {
      margin: 0.5rem 0 0;
      padding-left: 1.25rem;
      color: var(--text-color, #1e293b);
    }
    .pwm-instructions li { margin-bottom: 0.4rem; }
    /* Current Hz display */
    .pwm-hz-display {
      font-size: clamp(2.5rem, 8vw, 4rem);
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      color: var(--primary-color, #4b5eaa);
      line-height: 1;
      margin-bottom: 0.25rem;
    }
    .pwm-hz-sub {
      font-size: 0.9rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.5rem;
    }
    /* Result panel */
    .pwm-result {
      display: none;
      border-radius: 12px;
      padding: 1.25rem;
      margin-bottom: 1.5rem;
    }
    .pwm-result.visible { display: block; }
    .pwm-result.detected {
      background: rgba(239,68,68,0.08);
      border: 1px solid rgba(239,68,68,0.3);
    }
    .pwm-result.not-detected {
      background: rgba(34,197,94,0.08);
      border: 1px solid rgba(34,197,94,0.3);
    }
    .pwm-result-badge {
      font-size: 1.1rem;
      font-weight: 700;
      margin-bottom: 0.4rem;
    }
    .pwm-result.detected .pwm-result-badge { color: #dc2626; }
    .pwm-result.not-detected .pwm-result-badge { color: #16a34a; }
    .pwm-result-sub {
      font-size: 0.9rem;
      color: var(--text-color, #1e293b);
    }
    /* Banding feedback buttons */
    .pwm-feedback {
      display: none;
      gap: 0.75rem;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 1.25rem;
    }
    .pwm-feedback.visible { display: flex; }
    .pwm-feedback-btn {
      padding: 0.6rem 1.5rem;
      min-height: 44px;
      border: 2px solid var(--border-color, #e2e8f0);
      border-radius: 8px;
      background: transparent;
      font-family: inherit;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: border-color 0.15s, background 0.15s, color 0.15s;
      color: var(--text-color, #1e293b);
    }
    .pwm-feedback-btn:hover { border-color: var(--primary-color, #4b5eaa); }
    .pwm-feedback-btn.banding-yes {
      border-color: #dc2626;
      color: #dc2626;
    }
    .pwm-feedback-btn.banding-no {
      border-color: #16a34a;
      color: #16a34a;
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
    .privacy-note {
      font-size: 0.8rem;
      color: var(--text-muted, #475569);
      margin-top: 0.75rem;
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
    /* Fullscreen canvas overlay */
    #pwm-fullscreen-canvas {
      display: none;
      position: fixed;
      inset: 0;
      z-index: 99999;
      cursor: pointer;
    }
    /* Persistence-of-vision wheel */
    .pov-wrap {
      display: flex;
      justify-content: center;
      margin-bottom: 1.25rem;
    }
    .pov-wrap canvas {
      border-radius: 50%;
      border: 2px solid var(--border-color, #e2e8f0);
    }
    @media (max-width: 768px) {
      .pwm-tool { padding: 1.25rem 1rem 2rem; }
      .freq-selector { gap: 0.4rem; }
    }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>
  <main id="main-content" class="landing-main">

    <!-- Tool stage -->
    <section class="tool-stage" id="pwm-section" aria-labelledby="pwm-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="pwm-tool-title">PWM Flicker Test</h2>
          <p class="section-lede">Select a frequency, go fullscreen, then film your screen with your phone.</p>
        </div>
      </div>

      <section class="tool-shell">
        <div class="pwm-tool">
          <h1>PWM Flicker Test Online</h1>
          <p class="tool-subtitle">Check if your monitor uses PWM backlight dimming — a common cause of eye strain and headaches</p>

          <!-- Frequency selector -->
          <div class="freq-selector" role="group" aria-label="Select test frequency">
            <button class="freq-btn active" data-hz="60"  aria-pressed="true">60 Hz</button>
            <button class="freq-btn" data-hz="120" aria-pressed="false">120 Hz</button>
            <button class="freq-btn" data-hz="240" aria-pressed="false">240 Hz</button>
            <button class="freq-btn" data-hz="480" aria-pressed="false">480 Hz</button>
            <button class="freq-btn" data-hz="960" aria-pressed="false">960 Hz</button>
          </div>

          <!-- Current Hz display -->
          <div class="pwm-hz-display" id="pwm-hz-display" aria-live="polite">60 Hz</div>
          <div class="pwm-hz-sub">Selected test frequency</div>

          <!-- Preview canvas -->
          <div class="pwm-preview-wrap" aria-label="Flicker preview (not fullscreen)">
            <canvas id="pwm-preview-canvas" aria-hidden="true"></canvas>
            <div class="pwm-preview-label">Preview — click "Start Flicker Test" for fullscreen</div>
          </div>

          <!-- Persistence-of-vision wheel -->
          <div class="pov-wrap" aria-label="Persistence-of-vision color wheel">
            <canvas id="pwm-wheel-canvas" width="140" height="140" aria-hidden="true"></canvas>
          </div>

          <!-- Start button -->
          <div>
            <button class="pwm-start-btn" id="pwm-start-btn" aria-label="Start fullscreen PWM flicker test">
              ▶ Start Flicker Test (Fullscreen)
            </button>
            <button class="reset-btn" id="pwm-reset-btn" aria-label="Reset PWM test">Reset</button>
          </div>

          <!-- Instructions -->
          <div class="pwm-instructions" id="pwm-instructions">
            <strong>How to test:</strong>
            <ol>
              <li>Set your monitor to 50–75% brightness (PWM is inactive at 100%).</li>
              <li>Select a frequency above and click "Start Flicker Test".</li>
              <li>Open your phone's camera app and point it at the screen.</li>
              <li>Look for <strong>horizontal dark bands</strong> moving across the camera image.</li>
              <li>If you see bands, tap "I See Banding" below. If not, tap "No Banding".</li>
            </ol>
          </div>

          <!-- Feedback buttons (shown after test runs for ≥3s) -->
          <div class="pwm-feedback" id="pwm-feedback" role="group" aria-label="Did you see banding?">
            <button class="pwm-feedback-btn" id="pwm-yes-btn" aria-label="I see banding — PWM detected">
              ⚠ I See Banding
            </button>
            <button class="pwm-feedback-btn" id="pwm-no-btn" aria-label="No banding — PWM not detected">
              ✓ No Banding
            </button>
          </div>

          <!-- Result panel -->
          <div class="pwm-result" id="pwm-result" role="status" aria-live="assertive">
            <div class="pwm-result-badge" id="pwm-result-badge"></div>
            <div class="pwm-result-sub" id="pwm-result-sub"></div>
          </div>

          <p class="privacy-note">This test runs entirely in your browser. No data is collected or transmitted.</p>
        </div>
      </section>
    </section>

    <!-- Fullscreen canvas (outside tool-shell so it can cover everything) -->
    <canvas id="pwm-fullscreen-canvas" aria-label="Full screen PWM flicker test — click or press Escape to exit" tabindex="0"></canvas>

    <!-- Trust strip -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">No Software</div>
          <div class="trust-desc">Runs entirely in your browser — nothing to install</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Works at Any Brightness</div>
          <div class="trust-desc">Test at 50–75% brightness where PWM is most active</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Phone Camera Method</div>
          <div class="trust-desc">Most reliable detection method — no special equipment needed</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">100% Free</div>
          <div class="trust-desc">No signup, no download, no limits on retesting</div>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 1 -->
    <section class="feature-band" aria-labelledby="what-is-pwm-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="what-is-pwm-heading">What Is PWM Dimming and Why Does It Cause Eye Strain?</h2>
          <p class="section-lede">
            PWM (Pulse Width Modulation) is a method monitors use to control brightness by rapidly
            switching the backlight on and off at a fixed frequency. Rather than continuously
            reducing the light output, the monitor flickers the backlight hundreds of times per
            second — if you choose 50% brightness with 240Hz PWM, the light is actually 100%
            on for half the time and completely off for the other half, cycling 240 times every
            second. To the conscious eye this looks like a smooth dimmed image, but the visual
            cortex and eye muscles are still processing each individual flash. Approximately
            30% of LCD monitors on the market use PWM dimming below 1000 Hz. The alternative —
            DC dimming — reduces actual current to the backlight LEDs, producing a steady,
            flicker-free light at all brightness levels. OLED panels use a different approach
            but can also exhibit PWM at low brightness. If you experience headaches, eye fatigue,
            blurry text, or difficulty focusing after long screen sessions, PWM flicker from
            your monitor could be a contributing factor.
          </p>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 2 -->
    <section class="process-band" aria-labelledby="how-to-use-pwm-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="how-to-use-pwm-heading">How to Use This PWM Flicker Test</h2>
          <p class="section-lede">
            The test uses a fast-alternating black-and-white canvas running in fullscreen mode.
            Your monitor's PWM frequency creates an interference pattern with the camera's
            rolling shutter or frame rate — when frequencies align, dark horizontal bands appear
            in the camera preview. <strong>Step 1:</strong> Reduce your monitor brightness to
            50–75% (PWM is generally only active below maximum). <strong>Step 2:</strong> Select
            a test frequency that matches common PWM frequencies — 60Hz, 120Hz, and 240Hz cover
            the vast majority of consumer monitors. <strong>Step 3:</strong> Click "Start Flicker
            Test" and the tool goes fullscreen. <strong>Step 4:</strong> Open your phone's camera
            app and aim it at your monitor from about 30–50 cm away. <strong>Step 5:</strong>
            Look for dark horizontal bands moving slowly through the camera image — this is the
            interference pattern between the camera's shutter and the PWM cycle. Bands that
            move slowly or appear stationary indicate a frequency match. No bands means your
            monitor likely does not use PWM at that frequency. Try all five frequencies for a
            complete test.
          </p>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 3 -->
    <section class="feature-band" aria-labelledby="pwm-symptoms-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="pwm-symptoms-heading">PWM Symptoms: Headaches, Eye Fatigue, and Blurry Text</h2>
          <p class="section-lede">
            The sensitivity to PWM flicker varies significantly between individuals. Research
            suggests that people with a history of migraines, photosensitivity, or visual
            stress disorders are more likely to notice discomfort from PWM frequencies below
            1000 Hz. Common reported symptoms include frontal headaches that worsen after
            2–3 hours of screen use, a feeling of eye strain or dryness, difficulty reading
            small text (perceived blurriness caused by micro-saccades triggered by the flicker),
            and general fatigue. Many sufferers do not connect these symptoms to their monitor
            because the flicker is invisible to the naked eye under normal conditions. A simple
            diagnostic is to test the same workflow on a laptop OLED screen (which typically
            uses high-frequency PWM or DC dimming) and compare symptoms. If you feel significantly
            better on one display, the PWM profile of your primary monitor is likely a factor.
          </p>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 4 -->
    <section class="process-band" aria-labelledby="pwm-free-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="pwm-free-heading">How to Find a PWM-Free Monitor</h2>
          <p class="section-lede">
            When shopping for a PWM-free monitor, look for displays explicitly certified as
            <strong>"Flicker-Free"</strong> by VESA or the manufacturer. ASUS, BenQ, LG, and
            Dell publish PWM specifications in their monitor technical datasheets — search for
            the monitor model followed by "PWM frequency" or look up the panel on RTINGS.com
            which measures backlight flicker directly with a photodiode. <strong>DC dimming</strong>
            is the gold standard — monitors using DC dimming control brightness by adjusting
            LED current rather than switching, producing zero flicker at any brightness level.
            <strong>OLED monitors</strong> often use high-frequency PWM (1000Hz+) which is
            generally imperceptible, though some users still report sensitivity. IPS panels
            from reputable brands in the "business" segment (targeting office productivity)
            are more likely to implement DC dimming than gaming-oriented TN or VA panels
            which prioritize response time. If you currently own a PWM monitor and cannot
            upgrade, keeping brightness at 100% eliminates PWM on most models, and using
            software like f.lux or Night Light to reduce color temperature at night avoids
            the need to lower hardware brightness.
          </p>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="feature-band" aria-labelledby="faq-pwm">
      <div class="container">
        <div class="section-head">
          <h2 id="faq-pwm">Frequently Asked Questions</h2>
        </div>
        <div style="margin-top:1rem;">
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">What phone camera settings work best?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">Use your phone's standard camera app (not portrait mode). Disable auto-exposure if possible — on iPhone tap and hold to lock AE/AF. On Android enable Pro mode and lower the shutter speed to 1/120s. This makes banding more visible at lower PWM frequencies.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">I see banding at 60Hz but not 120Hz — does that mean my monitor uses 60Hz PWM?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">Yes — if banding appears at a specific frequency, that matches your monitor's PWM frequency. Banding is most visible when the test frequency matches or is a harmonic of the monitor's actual PWM cycle.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">My screen is at maximum brightness — does PWM still apply?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">PWM is typically only active below maximum brightness. At 100% most monitors switch to continuous DC dimming. Test at 50–75% brightness for the most accurate results.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Can this tool detect PWM automatically?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">The manual filming method is most reliable. Automatic webcam detection is experimental and requires a camera capable of 120fps+, which most laptop webcams do not support. The phone camera method is accessible to everyone.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Is PWM harmful?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">For most people no. Sensitive individuals — those prone to migraines or photosensitivity — may experience eye strain at PWM frequencies below 1000Hz, especially during long work sessions. Choosing a flicker-free or OLED display eliminates this risk.</p>
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

      var freqBtns       = document.querySelectorAll('.freq-btn');
      var hzDisplay      = document.getElementById('pwm-hz-display');
      var startBtn       = document.getElementById('pwm-start-btn');
      var resetBtn       = document.getElementById('pwm-reset-btn');
      var feedbackEl     = document.getElementById('pwm-feedback');
      var yesBandingBtn  = document.getElementById('pwm-yes-btn');
      var noBandingBtn   = document.getElementById('pwm-no-btn');
      var resultEl       = document.getElementById('pwm-result');
      var resultBadgeEl  = document.getElementById('pwm-result-badge');
      var resultSubEl    = document.getElementById('pwm-result-sub');
      var previewCanvas  = document.getElementById('pwm-preview-canvas');
      var fsCanvas       = document.getElementById('pwm-fullscreen-canvas');
      var wheelCanvas    = document.getElementById('pwm-wheel-canvas');

      var previewCtx = previewCanvas.getContext('2d');
      var fsCtx      = fsCanvas.getContext('2d');
      var wheelCtx   = wheelCanvas.getContext('2d');

      var selectedHz    = 60;
      var running       = false;
      var rafId         = null;
      var startTime     = 0;
      var feedbackShown = false;
      var wheelAngle    = 0;

      // Resize preview canvas
      function resizePreview() {
        previewCanvas.width  = previewCanvas.offsetWidth  || 640;
        previewCanvas.height = previewCanvas.offsetHeight || 180;
      }
      resizePreview();
      window.addEventListener('resize', resizePreview);

      // ── Frequency selector ───────────────────────────────────────────────
      freqBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
          if (running) return;
          freqBtns.forEach(function(b) {
            b.classList.remove('active');
            b.setAttribute('aria-pressed', 'false');
          });
          btn.classList.add('active');
          btn.setAttribute('aria-pressed', 'true');
          selectedHz = parseInt(btn.dataset.hz, 10);
          hzDisplay.textContent = selectedHz + ' Hz';
        });
      });

      // ── Persistence-of-vision wheel draw ─────────────────────────────────
      var segmentColors = ['#ef4444','#f97316','#eab308','#22c55e','#3b82f6','#8b5cf6'];
      var numSegments   = segmentColors.length;

      function drawWheel(angle) {
        var W = wheelCanvas.width, H = wheelCanvas.height;
        var cx = W / 2, cy = H / 2, r = Math.min(cx, cy) - 4;
        var segAngle = (Math.PI * 2) / numSegments;
        for (var i = 0; i < numSegments; i++) {
          wheelCtx.beginPath();
          wheelCtx.moveTo(cx, cy);
          wheelCtx.arc(cx, cy, r, angle + i * segAngle, angle + (i + 1) * segAngle);
          wheelCtx.closePath();
          wheelCtx.fillStyle = segmentColors[i];
          wheelCtx.fill();
        }
      }
      drawWheel(0);

      // ── Main rAF loop ────────────────────────────────────────────────────
      var isBlack         = true;
      var frameCount      = 0;
      var framePeriod     = 1; // frames per half-cycle; recalculated on start

      function computeFramePeriod(hz) {
        // rAF runs at ~60fps. Period of 1 half-cycle in frames = 60/(2*hz) = 30/hz
        return Math.max(1, Math.round(30 / hz));
      }

      function drawPreviewFlicker() {
        var W = previewCanvas.width, H = previewCanvas.height;
        previewCtx.fillStyle = isBlack ? '#000' : '#fff';
        previewCtx.fillRect(0, 0, W, H);
      }

      function loop(ts) {
        if (!running) return;
        rafId = requestAnimationFrame(loop);

        frameCount++;
        if (frameCount % framePeriod === 0) {
          isBlack = !isBlack;
        }

        // Draw preview
        drawPreviewFlicker();

        // Draw fullscreen canvas if in fullscreen
        if (document.fullscreenElement === fsCanvas) {
          fsCanvas.width  = window.screen.width;
          fsCanvas.height = window.screen.height;
          fsCtx.fillStyle = isBlack ? '#000' : '#fff';
          fsCtx.fillRect(0, 0, fsCanvas.width, fsCanvas.height);
        }

        // Spin wheel
        wheelAngle += 0.04;
        drawWheel(wheelAngle);

        // Show feedback buttons after 3 seconds
        if (!feedbackShown && (ts - startTime) > 3000) {
          feedbackShown = true;
          feedbackEl.classList.add('visible');
        }
      }

      // ── Start / stop ─────────────────────────────────────────────────────
      startBtn.addEventListener('click', function() {
        if (running) {
          stopTest();
        } else {
          startTest();
        }
      });

      function startTest() {
        running       = true;
        frameCount    = 0;
        feedbackShown = false;
        framePeriod   = computeFramePeriod(selectedHz);
        startTime     = performance.now();

        startBtn.textContent = '⏹ Stop Test';
        startBtn.classList.add('running');
        resultEl.classList.remove('visible', 'detected', 'not-detected');
        feedbackEl.classList.remove('visible');
        yesBandingBtn.classList.remove('banding-yes');
        noBandingBtn.classList.remove('banding-no');

        // Request fullscreen on the canvas
        if (fsCanvas.requestFullscreen) {
          fsCanvas.style.display = 'block';
          fsCanvas.requestFullscreen().catch(function() {
            // Fullscreen denied — run in preview mode only
          });
        } else if (fsCanvas.webkitRequestFullscreen) {
          fsCanvas.style.display = 'block';
          fsCanvas.webkitRequestFullscreen();
        }

        rafId = requestAnimationFrame(loop);
      }

      function stopTest() {
        running = false;
        if (rafId) { cancelAnimationFrame(rafId); rafId = null; }
        startBtn.textContent = '▶ Start Flicker Test (Fullscreen)';
        startBtn.classList.remove('running');

        // Exit fullscreen
        if (document.fullscreenElement || document.webkitFullscreenElement) {
          if (document.exitFullscreen) document.exitFullscreen();
          else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
        }
        fsCanvas.style.display = 'none';

        // Clear preview
        var W = previewCanvas.width, H = previewCanvas.height;
        previewCtx.fillStyle = '#000';
        previewCtx.fillRect(0, 0, W, H);
      }

      // Exit fullscreen on canvas click or Escape
      fsCanvas.addEventListener('click', function() {
        stopTest();
      });
      document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && running) {
          stopTest();
        }
      });
      document.addEventListener('fullscreenchange', function() {
        if (!document.fullscreenElement && running) {
          stopTest();
        }
      });

      // ── Feedback buttons ─────────────────────────────────────────────────
      yesBandingBtn.addEventListener('click', function() {
        yesBandingBtn.classList.add('banding-yes');
        noBandingBtn.classList.remove('banding-no');
        showResult(true);
        stopTest();
      });

      noBandingBtn.addEventListener('click', function() {
        noBandingBtn.classList.add('banding-no');
        yesBandingBtn.classList.remove('banding-yes');
        showResult(false);
        stopTest();
      });

      function showResult(bandingDetected) {
        if (bandingDetected) {
          resultBadgeEl.textContent = '⚠ PWM Likely Detected at ' + selectedHz + ' Hz';
          resultSubEl.textContent   = 'Your monitor appears to use PWM backlight dimming at or near ' + selectedHz + ' Hz. Consider switching to a flicker-free (DC dimming) monitor to reduce eye strain.';
          resultEl.classList.add('visible', 'detected');
          resultEl.classList.remove('not-detected');
        } else {
          resultBadgeEl.textContent = '✓ No PWM Detected at ' + selectedHz + ' Hz';
          resultSubEl.textContent   = 'No banding visible at ' + selectedHz + ' Hz. Try other frequencies to be thorough. If all frequencies show no banding your monitor is likely flicker-free or uses high-frequency PWM (>1000Hz) which is generally harmless.';
          resultEl.classList.add('visible', 'not-detected');
          resultEl.classList.remove('detected');
        }
      }

      // ── Reset ────────────────────────────────────────────────────────────
      resetBtn.addEventListener('click', function() {
        stopTest();
        resultEl.classList.remove('visible', 'detected', 'not-detected');
        feedbackEl.classList.remove('visible');
        yesBandingBtn.classList.remove('banding-yes');
        noBandingBtn.classList.remove('banding-no');
        resultBadgeEl.textContent = '';
        resultSubEl.textContent   = '';
        wheelAngle = 0;
        drawWheel(0);
      });

    }, 0); });
  });
  </script>
</body>
</html>
