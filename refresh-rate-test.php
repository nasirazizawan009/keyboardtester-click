<?php include 'config.php'; ?>
<?php
$pageTitle = 'Monitor Refresh Rate Test — Check Hz Online Free | KeyboardTester.click';
$pageDescription = 'Free monitor refresh rate test. Check if your display runs at 60Hz, 144Hz, 240Hz or higher. Detects your real Hz automatically in seconds. No download needed.';
$pageKeywords = 'monitor refresh rate test online, check monitor hz online, refresh rate test, 144hz monitor test';
$pageOgImage = 'images/screen-test/hero.webp';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/includes/seo-meta.php'; ?>
  <?php include 'includes/head-common.php'; ?>

  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <!-- Structured Data (JSON-LD) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebApplication",
    "name": "Monitor Refresh Rate Test",
    "url": "<?php echo absoluteUrl('refresh-rate-test.php'); ?>",
    "description": "<?php echo htmlspecialchars($pageDescription); ?>",
    "applicationCategory": "UtilitiesApplication",
    "operatingSystem": "Any",
    "isAccessibleForFree": true,
    "browserRequirements": "Requires JavaScript",
    "offers": {
      "@type": "Offer",
      "price": "0",
      "priceCurrency": "USD"
    }
  }
  </script>

  <style>
    .refresh-tool {
      max-width: 640px;
      margin: 0 auto;
      padding: 2rem 1rem;
      text-align: center;
    }
    .hz-display {
      font-size: 5rem;
      font-weight: 700;
      color: var(--heading-color, #1e293b);
      line-height: 1;
      margin-bottom: 1.5rem;
      font-variant-numeric: tabular-nums;
      letter-spacing: -2px;
    }
    .stats-row {
      display: flex;
      gap: 1rem;
      justify-content: center;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
    }
    .stat-card {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      padding: 0.75rem 1.25rem;
      min-width: 130px;
    }
    .stat-label {
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: var(--text-muted, #475569);
      margin-bottom: 0.25rem;
    }
    .stat-value {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--heading-color, #1e293b);
      font-variant-numeric: tabular-nums;
    }
    .progress-track {
      background: var(--border-color, #e2e8f0);
      border-radius: 999px;
      height: 8px;
      width: 100%;
      overflow: hidden;
      margin-bottom: 1.25rem;
    }
    .progress-fill {
      height: 100%;
      width: 0%;
      background: var(--primary-color, #4b5eaa);
      border-radius: 999px;
      transition: width 0.1s linear;
    }
    .hz-result-box {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--primary-color, #4b5eaa);
      border-radius: 12px;
      padding: 1.25rem;
      margin-bottom: 1.25rem;
      display: none;
    }
    .hz-result-box h3 {
      margin: 0 0 0.4rem;
      font-size: 1rem;
      color: var(--text-muted, #475569);
      font-weight: 500;
    }
    .display-class {
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--primary-color, #4b5eaa);
    }
    .status-msg {
      color: var(--text-muted, #475569);
      font-size: 0.9rem;
      margin-bottom: 1.25rem;
      min-height: 1.4em;
    }
    .btn-row {
      display: flex;
      gap: 0.75rem;
      justify-content: center;
      margin-bottom: 1.25rem;
      flex-wrap: wrap;
    }
    .rr-btn {
      padding: 0.65rem 1.5rem;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      border: 2px solid transparent;
      transition: opacity 0.2s, background 0.2s;
    }
    .rr-btn-primary {
      background: var(--primary-color, #4b5eaa);
      color: #fff;
      border-color: var(--primary-color, #4b5eaa);
    }
    .rr-btn-primary:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }
    .rr-btn-ghost {
      background: transparent;
      color: var(--heading-color, #1e293b);
      border-color: var(--border-color, #e2e8f0);
    }
    .rr-btn-ghost:hover {
      border-color: var(--primary-color, #4b5eaa);
    }
    .privacy-note {
      font-size: 0.78rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.25rem;
    }
    .internal-links {
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
      margin-top: 0.5rem;
    }
    .internal-links a {
      color: var(--primary-color, #6366f1);
      font-size: 0.85rem;
      text-decoration: none;
    }
    .internal-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">

    <section class="tool-stage" id="refresh-rate-stage" aria-labelledby="refresh-rate-h1">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Display diagnostics</p>
          <h1 id="refresh-rate-h1">Monitor Refresh Rate Test</h1>
          <p class="section-lede">Find out if your monitor is actually running at 60Hz, 144Hz, 240Hz, or higher — in 3 seconds.</p>
        </div>
      </div>

      <section class="tool-shell">
        <div class="refresh-tool">

          <div class="hz-display" id="detected-hz">-- Hz</div>

          <div class="stats-row">
            <div class="stat-card">
              <div class="stat-label">Live FPS</div>
              <div class="stat-value" id="live-fps">-- fps</div>
            </div>
            <div class="stat-card">
              <div class="stat-label">Jitter</div>
              <div class="stat-value" id="jitter-ms">-- ms</div>
            </div>
            <div class="stat-card">
              <div class="stat-label">Frames Measured</div>
              <div class="stat-value" id="frame-count">0</div>
            </div>
          </div>

          <div class="progress-track">
            <div class="progress-fill" id="progress-bar"></div>
          </div>

          <div class="hz-result-box" id="hz-result-box">
            <h3>Display Classification</h3>
            <div class="display-class" id="display-class"></div>
          </div>

          <p class="status-msg" id="status-msg">Click Start to measure your refresh rate</p>

          <div class="btn-row">
            <button class="rr-btn rr-btn-primary" id="start-btn" onclick="startTest()">Start Test</button>
            <button class="rr-btn rr-btn-ghost" onclick="resetTest()">Reset</button>
          </div>

          <p class="privacy-note">This test runs entirely in your browser. No data is collected.</p>

          <div class="internal-links">
            <a href="<?php echo url('dead-pixel-test.php'); ?>">Dead Pixel Test</a>
            <a href="<?php echo url('color-test.php'); ?>">Monitor Color Test</a>
          </div>

        </div>
      </section>
    </section>

    <!-- Trust strip -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Auto-detects Hz</div>
          <div class="trust-desc">No settings to configure</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Works on any monitor</div>
          <div class="trust-desc">60Hz, 144Hz, 240Hz and above</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Takes just 3 seconds</div>
          <div class="trust-desc">Results in moments</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">No install needed</div>
          <div class="trust-desc">Runs fully in browser</div>
        </div>
      </div>
    </section>

    <!-- SEO content sections -->
    <section class="feature-band" aria-labelledby="what-is-refresh-rate">
      <div class="container">
        <div class="section-head">
          <h2 id="what-is-refresh-rate">What Is Monitor Refresh Rate?</h2>
        </div>
        <div style="max-width:720px;margin:0 auto;color:var(--text-muted,#94a3b8);line-height:1.7;">
          <p>Refresh rate is how many times per second your monitor redraws its image, measured in Hz (Hertz). A 60Hz monitor redraws the screen 60 times every second. A 144Hz monitor redraws it 144 times per second, producing noticeably smoother motion and less motion blur.</p>
          <p style="margin-top:1rem;">Higher refresh rate means smoother visuals, especially during fast motion like gaming, scrolling, or video playback. For everyday office work the difference between 60Hz and 75Hz is subtle, but when gaming competitively the jump to 144Hz or 240Hz is immediately noticeable.</p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="hz-comparison">
      <div class="container">
        <div class="section-head">
          <h2 id="hz-comparison">60Hz vs 144Hz vs 240Hz — What Should Gamers Use?</h2>
        </div>
        <div style="max-width:720px;margin:0 auto;color:var(--text-muted,#94a3b8);line-height:1.7;">
          <ul style="padding-left:1.4rem;">
            <li><strong style="color:var(--heading-color,#f1f5f9)">60Hz</strong> — Standard for office work, web browsing, and general use.</li>
            <li style="margin-top:0.5rem;"><strong style="color:var(--heading-color,#f1f5f9)">75Hz</strong> — Budget upgrade; slightly smoother than 60Hz at minimal cost.</li>
            <li style="margin-top:0.5rem;"><strong style="color:var(--heading-color,#f1f5f9)">144Hz</strong> — Sweet spot for competitive gaming. Makes a clear difference in CS2, Valorant, and Apex Legends.</li>
            <li style="margin-top:0.5rem;"><strong style="color:var(--heading-color,#f1f5f9)">165Hz / 180Hz</strong> — Mid-premium tier; noticeable step up from 144Hz for fast-twitch gameplay.</li>
            <li style="margin-top:0.5rem;"><strong style="color:var(--heading-color,#f1f5f9)">240Hz+</strong> — Esports and pro gaming. Marginal gains over 144Hz for most players but meaningful for elite competitors.</li>
            <li style="margin-top:0.5rem;"><strong style="color:var(--heading-color,#f1f5f9)">360Hz+</strong> — Ultra-competitive tier. Used by professional esports players where every millisecond counts.</li>
          </ul>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="lower-than-spec">
      <div class="container">
        <div class="section-head">
          <h2 id="lower-than-spec">Why Does This Tool Show Lower Than My Monitor Specs?</h2>
        </div>
        <div style="max-width:720px;margin:0 auto;color:var(--text-muted,#94a3b8);line-height:1.7;">
          <p>If your 144Hz monitor tests at 60Hz here, your display is not running at its maximum refresh rate. Windows often defaults new monitors to 60Hz even when the hardware supports more.</p>
          <p style="margin-top:1rem;">To fix it: <strong style="color:var(--heading-color,#f1f5f9)">Settings &rsaquo; Display &rsaquo; Advanced display &rsaquo; Choose refresh rate &rsaquo; select the highest available option.</strong></p>
          <p style="margin-top:1rem;">Other possible causes: a cable that does not support the target refresh rate (e.g., HDMI 1.4 caps at 60Hz at 1080p), an outdated GPU driver, or a display override set in your GPU control panel.</p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="enable-144hz">
      <div class="container">
        <div class="section-head">
          <h2 id="enable-144hz">How to Enable 144Hz on Windows 11</h2>
        </div>
        <div style="max-width:720px;margin:0 auto;color:var(--text-muted,#94a3b8);line-height:1.7;">
          <ol style="padding-left:1.4rem;">
            <li>Right-click the desktop and select <strong style="color:var(--heading-color,#f1f5f9)">Display settings</strong>.</li>
            <li style="margin-top:0.5rem;">Scroll down and click <strong style="color:var(--heading-color,#f1f5f9)">Advanced display</strong>.</li>
            <li style="margin-top:0.5rem;">Under <em>Choose a refresh rate</em>, select <strong style="color:var(--heading-color,#f1f5f9)">144Hz</strong> (or the highest option listed).</li>
          </ol>
          <p style="margin-top:1rem;"><strong style="color:var(--heading-color,#f1f5f9)">Cable requirements:</strong> HDMI 2.0 or DisplayPort 1.2 (or higher) is required to run 1080p or 1440p at 144Hz. If 144Hz does not appear in the list, try a different cable or port type.</p>
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php $currentTool = 'refresh-rate'; include 'includes/related-tools.php'; ?>

  </main>

  <?php include 'footer.php'; ?>

  <script>
    let frameTimestamps = [], rafId = null, isRunning = false, startTime = null, detectedHz = null;
    const SAMPLE_DURATION_MS = 3000;

    function startTest() {
      frameTimestamps = []; isRunning = true; startTime = null; detectedHz = null;
      document.getElementById('status-msg').textContent = 'Measuring... please wait 3 seconds';
      document.getElementById('hz-result-box').style.display = 'none';
      document.getElementById('start-btn').disabled = true;
      rafId = requestAnimationFrame(measureFrame);
    }

    function measureFrame(timestamp) {
      if (!startTime) startTime = timestamp;
      frameTimestamps.push(timestamp);
      const elapsed = timestamp - startTime;
      const pct = Math.min((elapsed / SAMPLE_DURATION_MS) * 100, 100);
      document.getElementById('progress-bar').style.width = pct + '%';
      document.getElementById('frame-count').textContent = frameTimestamps.length;
      if (frameTimestamps.length >= 2) {
        const recent = frameTimestamps.slice(-10);
        const avgDelta = (recent[recent.length-1] - recent[0]) / (recent.length - 1);
        const liveFps = Math.round(1000 / avgDelta);
        document.getElementById('live-fps').textContent = liveFps + ' fps';
      }
      if (elapsed < SAMPLE_DURATION_MS) {
        rafId = requestAnimationFrame(measureFrame);
      } else {
        calculateResults();
      }
    }

    function calculateResults() {
      isRunning = false;
      const frames = frameTimestamps;
      if (frames.length < 10) {
        document.getElementById('status-msg').textContent = 'Not enough data. Try again.';
        document.getElementById('start-btn').disabled = false;
        return;
      }
      const deltas = [];
      for (let i = 1; i < frames.length; i++) deltas.push(frames[i] - frames[i-1]);
      deltas.sort((a,b) => a - b);
      const trim = Math.floor(deltas.length * 0.05);
      const trimmed = deltas.slice(trim, deltas.length - trim);
      const avgDelta = trimmed.reduce((a,b)=>a+b,0) / trimmed.length;
      const rawHz = 1000 / avgDelta;
      const standards = [24,30,48,60,75,90,100,120,144,165,180,240,280,360,480,500,1000];
      let snapped = rawHz;
      for (const s of standards) { if (Math.abs(rawHz - s) < 3) { snapped = s; break; } }
      detectedHz = Math.round(rawHz);
      const mean = avgDelta;
      const variance = trimmed.reduce((s,d)=>s+Math.pow(d-mean,2),0)/trimmed.length;
      const jitter = Math.sqrt(variance).toFixed(2);
      document.getElementById('detected-hz').textContent = snapped + ' Hz';
      document.getElementById('jitter-ms').textContent = jitter + ' ms';
      document.getElementById('hz-result-box').style.display = 'block';
      document.getElementById('status-msg').textContent = 'Test complete! Results below.';
      document.getElementById('start-btn').disabled = false;
      let cls = '';
      if (snapped >= 240) cls = 'Pro gaming / Esports';
      else if (snapped >= 144) cls = 'High-refresh gaming';
      else if (snapped >= 75) cls = 'Smooth gaming';
      else cls = 'Standard display';
      document.getElementById('display-class').textContent = cls;
    }

    function stopTest() { if (rafId) cancelAnimationFrame(rafId); isRunning = false; document.getElementById('start-btn').disabled = false; }

    function resetTest() {
      stopTest();
      frameTimestamps = []; startTime = null; detectedHz = null;
      document.getElementById('detected-hz').textContent = '-- Hz';
      document.getElementById('live-fps').textContent = '-- fps';
      document.getElementById('jitter-ms').textContent = '-- ms';
      document.getElementById('frame-count').textContent = '0';
      document.getElementById('progress-bar').style.width = '0%';
      document.getElementById('hz-result-box').style.display = 'none';
      document.getElementById('status-msg').textContent = 'Click Start to measure your refresh rate';
    }
  </script>
</body>
</html>
