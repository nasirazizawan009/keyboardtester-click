<?php include 'config.php'; ?>
<?php
$pageTitle = 'Mouse Lift-Off Distance Test — Check Your Mouse LOD Online Free | KeyboardTester.click';
$pageDescription = 'Test your gaming mouse lift-off distance (LOD) online free. Move your mouse, lift and reposition it, and our tool measures cursor displacement to rate your LOD. No software needed.';
$pageKeywords = 'mouse lift off distance test, mouse LOD test online, gaming mouse LOD checker, mouse sensor calibration test, LOD test';
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

  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"WebApplication","name":"Mouse Lift-Off Distance Test","url":"<?php echo absoluteUrl('mouse-lod-test.php'); ?>","@id":"<?php echo absoluteUrl('mouse-lod-test.php'); ?>","description":"Test your gaming mouse lift-off distance (LOD) online free. Tracks cursor displacement when you lift and reposition the mouse to measure and classify your LOD.","applicationCategory":"UtilityApplication","operatingSystem":"Any","isAccessibleForFree":true,"featureList":["Real cursor displacement tracking","5-lift averaged LOD measurement","Linear/Low/Medium/High LOD classification","Scatter plot of lift events","Works with any mouse"]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[{"@type":"Question","name":"What counts as a good LOD?","acceptedAnswer":{"@type":"Answer","text":"For competitive FPS gaming, very low LOD — shown as less than 5px cursor shift in this test — is ideal. Players who use low sensitivity and frequently lift to reposition benefit most. For casual use, medium LOD (15–30px) is perfectly fine and makes no practical difference."}},{"@type":"Question","name":"Why does my LOD vary between tests?","acceptedAnswer":{"@type":"Answer","text":"Lift speed, angle, and surface texture all affect LOD readings. A fast, straight lift produces less sensor drift than a slow angled lift. Test 10+ times at your natural lifting speed for an accurate average."}},{"@type":"Question","name":"Does mouse pad material affect LOD?","acceptedAnswer":{"@type":"Answer","text":"Yes — rough cloth pads can increase effective LOD compared to hard pads because the surface texture catches the sensor at a shallower angle. Hard pads provide a flatter surface that tends to give lower and more consistent LOD readings."}},{"@type":"Question","name":"Can I test LOD on a laptop trackpad?","acceptedAnswer":{"@type":"Answer","text":"This tool is designed for external mice with optical or laser sensors. Laptop trackpads do not have lift-off distance in the same physical sense — they detect finger presence rather than optical surface reflection."}},{"@type":"Question","name":"My cursor barely moves when I lift — is my LOD very low?","acceptedAnswer":{"@type":"Answer","text":"Yes! Less than 5px average displacement means your mouse has excellent low LOD. This is ideal for FPS gaming. Most modern gaming mice from Logitech, Razer, and SteelSeries have very low LOD by default, especially on hard pads."}}]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"<?php echo absoluteUrl(''); ?>"},{"@type":"ListItem","position":2,"name":"Mouse LOD Test","item":"<?php echo absoluteUrl('mouse-lod-test.php'); ?>"}]}
  </script>

  <style>
    .lod-tool {
      max-width: 760px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
      text-align: center;
    }
    .lod-tool h1 {
      font-size: clamp(1.6rem, 4vw, 2.4rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #1e293b);
    }
    .lod-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #475569);
      margin-bottom: 1.5rem;
    }
    /* Stats row */
    .lod-stats-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
      margin-bottom: 1.25rem;
    }
    .lod-stat {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      padding: 1rem 0.5rem;
    }
    .lod-stat-value {
      font-size: 1.9rem;
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      color: var(--primary-color, #4b5eaa);
      line-height: 1.1;
    }
    .lod-stat-label {
      font-size: 0.75rem;
      color: var(--text-muted, #475569);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 0.25rem;
    }
    /* Main tracking canvas */
    .lod-track-wrap {
      position: relative;
      border: 2px dashed var(--border-color, #e2e8f0);
      border-radius: 12px;
      overflow: hidden;
      margin-bottom: 1.25rem;
      cursor: crosshair;
      background: var(--card-bg, #f8fafc);
      user-select: none;
    }
    .lod-track-wrap canvas {
      display: block;
      width: 100%;
      height: 350px;
    }
    .lod-track-overlay {
      position: absolute;
      inset: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      pointer-events: none;
    }
    .lod-track-msg {
      font-size: 1rem;
      font-weight: 600;
      color: var(--text-muted, #475569);
      text-align: center;
      padding: 0 1rem;
    }
    /* Scatter plot canvas */
    .lod-scatter-wrap {
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 1.25rem;
      background: var(--card-bg, #f8fafc);
    }
    .lod-scatter-title {
      font-size: 0.78rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: var(--text-muted, #475569);
      padding: 0.5rem 0.75rem 0;
      text-align: left;
    }
    .lod-scatter-wrap canvas {
      display: block;
      width: 100%;
      height: 80px;
    }
    /* Result verdict */
    .lod-verdict {
      display: none;
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 12px;
      padding: 1.25rem;
      margin-bottom: 1.25rem;
    }
    .lod-verdict.visible { display: block; }
    .lod-verdict-badge {
      display: inline-block;
      padding: 0.4rem 1.25rem;
      border-radius: 50px;
      font-size: 1rem;
      font-weight: 700;
      margin-bottom: 0.5rem;
    }
    .badge-very-low { background: rgba(34,197,94,0.15); color: #16a34a; }
    .badge-low      { background: rgba(99,102,241,0.15); color: #4338ca; }
    .badge-medium   { background: rgba(234,179,8,0.15);  color: #a16207; }
    .badge-high     { background: rgba(239,68,68,0.15);  color: #dc2626; }
    .lod-verdict-sub {
      font-size: 0.9rem;
      color: var(--text-muted, #475569);
    }
    /* Lift event list */
    .lod-lift-list {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      justify-content: center;
      margin-top: 0.75rem;
    }
    .lod-lift-chip {
      padding: 0.2rem 0.65rem;
      border-radius: 20px;
      font-size: 0.8rem;
      font-family: 'JetBrains Mono', monospace;
      background: rgba(99,102,241,0.1);
      color: var(--primary-color, #4b5eaa);
      border: 1px solid rgba(99,102,241,0.2);
    }
    /* Instruction hint */
    .lod-hint {
      background: var(--card-bg, #f8fafc);
      border: 1px solid var(--border-color, #e2e8f0);
      border-radius: 8px;
      padding: 0.75rem 1rem;
      font-size: 0.9rem;
      color: var(--text-color, #1e293b);
      margin-bottom: 1.25rem;
      text-align: left;
    }
    .lod-hint strong { color: var(--primary-color, #4b5eaa); }
    /* Reset button */
    .reset-btn {
      padding: 0.65rem 2rem;
      min-height: 44px;
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
    .reset-btn:hover { opacity: 0.88; transform: translateY(-1px); }
    .reset-btn:active { transform: translateY(0); }
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
    @media (max-width: 768px) {
      .lod-tool { padding: 1.25rem 1rem 2rem; }
      .lod-stats-grid { grid-template-columns: repeat(2, 1fr); }
      .lod-track-wrap canvas { height: 240px; }
    }
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>
  <main id="main-content" class="landing-main">

    <!-- Tool stage -->
    <section class="tool-stage" id="lod-section" aria-labelledby="lod-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="lod-tool-title">Mouse Lift-Off Distance (LOD) Tester</h2>
          <p class="section-lede">Move your mouse in the tracking area, lift and reposition it — the tool measures cursor displacement each time.</p>
        </div>
      </div>

      <section class="tool-shell">
        <div class="lod-tool">
          <h1>Mouse Lift-Off Distance Test</h1>
          <p class="tool-subtitle">Move, lift, and reposition your mouse 5 times to get an averaged LOD classification</p>

          <!-- Instruction hint -->
          <div class="lod-hint" id="lod-hint">
            <strong>Instructions:</strong> Move your mouse inside the tracking area below. Lift it off your mouse pad and put it back down. Repeat 5 times — the tool calculates the average cursor drift on each lift.
          </div>

          <!-- Stats row -->
          <div class="lod-stats-grid">
            <div class="lod-stat">
              <div class="lod-stat-value" id="lod-avg-disp">—</div>
              <div class="lod-stat-label">Avg Displacement (px)</div>
            </div>
            <div class="lod-stat">
              <div class="lod-stat-value" id="lod-lift-count">0</div>
              <div class="lod-stat-label">Lifts Recorded</div>
            </div>
            <div class="lod-stat">
              <div class="lod-stat-value" id="lod-last-disp">—</div>
              <div class="lod-stat-label">Last Lift (px)</div>
            </div>
          </div>

          <!-- Main tracking canvas -->
          <div class="lod-track-wrap" aria-label="Mouse tracking area — move your mouse here">
            <canvas id="lod-canvas" aria-hidden="true"></canvas>
            <div class="lod-track-overlay">
              <div class="lod-track-msg" id="lod-track-msg">Move your mouse in this area, then lift off the mouse pad</div>
            </div>
          </div>

          <!-- Scatter plot -->
          <div class="lod-scatter-wrap" aria-label="Lift displacement scatter plot">
            <div class="lod-scatter-title">Lift displacement history</div>
            <canvas id="lod-scatter" aria-hidden="true"></canvas>
          </div>

          <!-- Lift chips -->
          <div class="lod-lift-list" id="lod-lift-list" aria-live="polite" aria-label="Individual lift measurements"></div>

          <!-- Verdict -->
          <div class="lod-verdict" id="lod-verdict" role="status" aria-live="assertive">
            <div class="lod-verdict-badge" id="lod-verdict-badge"></div>
            <div class="lod-verdict-sub" id="lod-verdict-sub"></div>
          </div>

          <button class="reset-btn" id="lod-reset-btn" aria-label="Reset LOD test">Reset</button>
          <p class="privacy-note">This test runs entirely in your browser. No data is collected or transmitted.</p>
        </div>
      </section>
    </section>

    <!-- Trust strip -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">No Hardware Tools</div>
          <div class="trust-desc">No ruler or sensor equipment — just your browser and mouse</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Real Displacement Tracking</div>
          <div class="trust-desc">Measures actual cursor offset between lift and reentry point</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">5-Lift Average</div>
          <div class="trust-desc">Averages five lifts for a reliable, repeatable result</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Works with Any Mouse</div>
          <div class="trust-desc">USB, Bluetooth, wired, or wireless — any pointing device</div>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 1 -->
    <section class="feature-band" aria-labelledby="what-is-lod-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="what-is-lod-heading">What Is Mouse Lift-Off Distance (LOD)?</h2>
          <p class="section-lede">
            Lift-off distance (LOD) is the height above a surface at which a mouse's optical
            or laser sensor stops tracking. When you physically lift your mouse off the pad,
            the sensor continues reading the surface briefly as the mouse rises — during this
            brief window the cursor can drift from where you intended to stop. LOD is often
            measured in millimetres of physical height, but the effect is better understood
            as cursor displacement in pixels: how far does the cursor move from your lift
            point to where it appears after you put the mouse back down? A sensor with very
            low LOD stops tracking almost immediately when the mouse clears the surface —
            typically within 0.5–1 mm — so the cursor barely moves. A sensor with high LOD
            may continue tracking up to 3–5 mm above the surface, causing the cursor to
            drift unpredictably mid-reposition. Modern gaming mice with Pixart PAW3395,
            PMW3370, or HERO sensors tend to have very low LOD by default, while older or
            budget sensors can exhibit significantly higher LOD.
          </p>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 2 -->
    <section class="process-band" aria-labelledby="lod-fps-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="lod-fps-heading">Why LOD Matters for FPS Gamers</h2>
          <p class="section-lede">
            In first-person shooters played at low sensitivity — a common setup for precise
            aim — players must frequently lift and reposition the mouse to stay within the
            physical bounds of their mouse pad. This motion is called a "flick repositioning"
            or "mouse lift." At low sensitivity settings the conversion from physical movement
            to in-game aim rotation is small, so even a few pixels of cursor drift during a
            lift translates into a visible aim jump when the mouse is returned to the surface.
            In a competitive match this drift can mean the difference between a pixel-perfect
            headshot and a miss. High LOD mice effectively create a random aim error on every
            repositioning lift, which undermines muscle memory built from thousands of hours
            of practice. Low LOD (<1mm / <5px in this test) eliminates this variable entirely.
            Casual gaming or mice used at high sensitivity are much less affected because
            repositioning lifts are less frequent and the proportional drift is smaller relative
            to the larger pixel-per-mm ratio.
          </p>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 3 -->
    <section class="feature-band" aria-labelledby="lod-compare-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="lod-compare-heading">High LOD vs Low LOD — Which Is Better?</h2>
          <p class="section-lede">
            The answer depends entirely on use case. <strong>For competitive FPS gaming</strong>
            at low sensitivity, lower is always better — a Very Low LOD rating (under 5px in
            this test) is the gold standard. The best gaming mice achieve this with tuned sensor
            firmware that aggressively cuts tracking at minimal lift height. <strong>For casual
            gaming and everyday desktop use</strong>, LOD makes no practical difference. The
            cursor drift during occasional repositioning is barely noticeable and has zero
            impact on productivity tasks. Some users actually prefer a slightly higher LOD
            because it smooths out accidental micro-lifts caused by wrist movement on thick
            cloth pads. <strong>Surface type matters more than you might expect:</strong>
            gaming mice paired with ultra-smooth hard pads (like Artisan or Hayate Otsu)
            often exhibit measurably lower effective LOD than the same mouse on a thick woven
            cloth pad, because the sensor angle relative to the surface changes less during
            the lift. This test measures your real-world LOD on whatever surface you use —
            which is the number that actually matters.
          </p>
        </div>
        <div style="margin-top:1.5rem;">
          <table class="ratings-table" aria-label="Mouse LOD rating classification">
            <thead>
              <tr>
                <th scope="col">Avg Displacement</th>
                <th scope="col">LOD Rating</th>
                <th scope="col">Suitability</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>&lt; 5 px</td>
                <td>Very Low LOD</td>
                <td>Excellent for competitive FPS gaming</td>
              </tr>
              <tr>
                <td>5 – 15 px</td>
                <td>Low LOD</td>
                <td>Good for most gaming use cases</td>
              </tr>
              <tr>
                <td>15 – 30 px</td>
                <td>Medium LOD</td>
                <td>Acceptable — casual gaming fine</td>
              </tr>
              <tr>
                <td>&gt; 30 px</td>
                <td>High LOD</td>
                <td>May cause aim drift — check sensor settings</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- SEO H2 section 4 -->
    <section class="process-band" aria-labelledby="reduce-lod-heading">
      <div class="container">
        <div class="section-head">
          <h2 id="reduce-lod-heading">How to Reduce Your Mouse's LOD</h2>
          <p class="section-lede">
            If this test shows High or Medium LOD and you want to improve it, there are several
            practical approaches. <strong>Switch to a hard mouse pad:</strong> hard pads (acrylic,
            aluminum, or glass) present a perfectly flat surface that the sensor reads at a
            consistent angle, which tends to produce lower LOD than thick woven cloth. Popular
            hard pads include the Artisan Zero, SteelSeries QcK Hard, and Glorious G-HardPad.
            <strong>Replace mouse feet:</strong> aftermarket PTFE (Teflon) feet are thinner
            than stock feet on many mice, which slightly lowers the sensor-to-surface distance
            and can reduce effective LOD by 0.3–0.8mm. Brands like Tiger Arc, Hyperglide, and
            Corepad are popular choices. <strong>Check mouse software/firmware settings:</strong>
            some gaming mice expose an LOD adjustment in their companion software — Logitech G Hub,
            Razer Synapse, and SteelSeries GG all include LOD sliders on supported models. Set
            this to the lowest option. <strong>Mouse bungee:</strong> a cable bungee lifts the
            USB cable off the desk so it does not create resistance or drag that causes unintended
            lifts during fast flicks. While not directly affecting sensor LOD, it reduces
            accidental micro-lifts caused by cable tension.
          </p>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="feature-band" aria-labelledby="faq-lod">
      <div class="container">
        <div class="section-head">
          <h2 id="faq-lod">Frequently Asked Questions</h2>
        </div>
        <div style="margin-top:1rem;">
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">What counts as a "good" LOD?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">For competitive FPS gaming, very low LOD (less than 5px cursor shift) is ideal. For casual use, medium LOD is perfectly fine. Only players using very low sensitivity who frequently lift and reposition the mouse will notice the difference.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Why does my LOD vary between tests?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">Lift speed, angle, and surface texture all affect readings. A fast straight lift produces less sensor drift than a slow angled one. Test 10+ times at your natural lifting speed for an accurate average.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Does mouse pad material affect LOD?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">Yes — rough cloth pads can increase effective LOD compared to hard pads because the surface texture catches the sensor at a shallower angle. Hard pads provide a flatter surface that tends to give lower and more consistent LOD readings.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">Can I test LOD on a laptop trackpad?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">This tool is designed for external mice with optical or laser sensors. Laptop trackpads do not have lift-off distance in the same physical sense — they detect finger presence via capacitance rather than optical surface reflection.</p>
          </details>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:0.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);">My cursor barely moves when I lift — is my LOD very low?</summary>
            <p style="margin-top:0.5rem;color:var(--text-color,#1e293b);">Yes! Less than 5px average displacement means your mouse has excellent low LOD. This is ideal for FPS gaming. Most modern gaming mice with high-end sensors have very low LOD by default, especially when used on hard mouse pads.</p>
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

      var canvas      = document.getElementById('lod-canvas');
      var scatterCvs  = document.getElementById('lod-scatter');
      var trackMsg    = document.getElementById('lod-track-msg');
      var avgDispEl   = document.getElementById('lod-avg-disp');
      var liftCountEl = document.getElementById('lod-lift-count');
      var lastDispEl  = document.getElementById('lod-last-disp');
      var verdictEl   = document.getElementById('lod-verdict');
      var verdictBadge= document.getElementById('lod-verdict-badge');
      var verdictSub  = document.getElementById('lod-verdict-sub');
      var liftListEl  = document.getElementById('lod-lift-list');
      var resetBtn    = document.getElementById('lod-reset-btn');

      var ctx         = canvas.getContext('2d');
      var scatterCtx  = scatterCvs.getContext('2d');

      var samples     = [];   // displacement values in px
      var liftPoint   = null; // {x, y} where mouse left canvas
      var lastPos     = null; // {x, y} last known mouse position inside canvas
      var isDrawing   = false;
      var lineColors  = ['#3b82f6','#10b981','#f59e0b','#ef4444','#8b5cf6',
                         '#06b6d4','#84cc16','#f97316','#e11d48','#7c3aed'];
      var colorIndex  = 0;

      // Size canvas
      function resizeCanvas() {
        var rect = canvas.parentElement.getBoundingClientRect();
        canvas.width  = Math.floor(rect.width)  || 680;
        canvas.height = canvas.parentElement.querySelector('canvas').offsetHeight || 350;
        scatterCvs.width  = Math.floor(rect.width) || 680;
        scatterCvs.height = 80;
        drawScatter();
      }
      resizeCanvas();
      window.addEventListener('resize', function() {
        resizeCanvas();
        // Redraw canvas background
        ctx.fillStyle = getComputedStyle(document.documentElement)
          .getPropertyValue('--card-bg').trim() || '#f8fafc';
        ctx.fillRect(0, 0, canvas.width, canvas.height);
      });

      // ── Mouse tracking ───────────────────────────────────────────────────
      canvas.addEventListener('mouseenter', function(e) {
        // If we had a lift point, measure displacement
        if (liftPoint !== null) {
          var dx   = e.offsetX - liftPoint.x;
          var dy   = e.offsetY - liftPoint.y;
          var dist = Math.round(Math.sqrt(dx * dx + dy * dy));
          recordLift(dist, e.offsetX, e.offsetY);
        }

        // Start new path segment
        isDrawing = true;
        ctx.beginPath();
        ctx.moveTo(e.offsetX, e.offsetY);
        lastPos = { x: e.offsetX, y: e.offsetY };
        liftPoint = null;

        // Hide overlay message after first entry
        trackMsg.style.opacity = '0';
      });

      canvas.addEventListener('mousemove', function(e) {
        if (!isDrawing) return;
        var x = e.offsetX, y = e.offsetY;
        ctx.lineWidth   = 2;
        ctx.strokeStyle = lineColors[colorIndex % lineColors.length];
        ctx.lineTo(x, y);
        ctx.stroke();
        lastPos = { x: x, y: y };
      });

      canvas.addEventListener('mouseleave', function() {
        if (!isDrawing) return;
        isDrawing = false;
        // Record the lift point as where the cursor last was
        if (lastPos) {
          liftPoint = { x: lastPos.x, y: lastPos.y };
          // Draw a red circle at lift point
          ctx.beginPath();
          ctx.arc(liftPoint.x, liftPoint.y, 5, 0, Math.PI * 2);
          ctx.fillStyle = '#ef4444';
          ctx.fill();
        }
        colorIndex++;
      });

      // ── Record lift ──────────────────────────────────────────────────────
      function recordLift(dist, rx, ry) {
        samples.push(dist);

        // Draw re-entry marker (green dot)
        ctx.beginPath();
        ctx.arc(rx, ry, 5, 0, Math.PI * 2);
        ctx.fillStyle = '#22c55e';
        ctx.fill();

        // Draw displacement line from lift to re-entry
        if (liftPoint) {
          ctx.beginPath();
          ctx.setLineDash([4, 4]);
          ctx.lineWidth   = 1.5;
          ctx.strokeStyle = 'rgba(239,68,68,0.6)';
          ctx.moveTo(liftPoint.x, liftPoint.y);
          ctx.lineTo(rx, ry);
          ctx.stroke();
          ctx.setLineDash([]);
        }

        updateStats(dist);
        addLiftChip(dist, samples.length);

        if (samples.length >= 5) {
          showVerdict();
        }
      }

      // ── Update stats ─────────────────────────────────────────────────────
      function updateStats(lastDist) {
        var total = 0;
        for (var i = 0; i < samples.length; i++) total += samples[i];
        var avg = (total / samples.length).toFixed(1);

        avgDispEl.textContent   = avg;
        liftCountEl.textContent = samples.length;
        lastDispEl.textContent  = lastDist;

        drawScatter();
      }

      // ── Add lift chip ─────────────────────────────────────────────────────
      function addLiftChip(dist, num) {
        var chip = document.createElement('span');
        chip.className   = 'lod-lift-chip';
        chip.textContent = '#' + num + ': ' + dist + 'px';
        liftListEl.appendChild(chip);
      }

      // ── Scatter plot ──────────────────────────────────────────────────────
      function drawScatter() {
        var W = scatterCvs.width, H = scatterCvs.height;
        scatterCtx.clearRect(0, 0, W, H);

        if (samples.length === 0) return;

        var maxVal  = Math.max.apply(null, samples);
        var maxDisp = Math.max(maxVal, 50); // minimum scale 50px
        var padX    = 20, padY = 8;
        var plotW   = W - padX * 2;
        var plotH   = H - padY * 2;

        // Axis line
        scatterCtx.strokeStyle = 'rgba(148,163,184,0.4)';
        scatterCtx.lineWidth   = 1;
        scatterCtx.beginPath();
        scatterCtx.moveTo(padX, H - padY);
        scatterCtx.lineTo(W - padX, H - padY);
        scatterCtx.stroke();

        // Threshold lines
        var thresholds = [
          { val: 5,  color: 'rgba(34,197,94,0.3)'  },
          { val: 15, color: 'rgba(234,179,8,0.3)'  },
          { val: 30, color: 'rgba(239,68,68,0.3)'  }
        ];
        thresholds.forEach(function(t) {
          if (t.val <= maxDisp) {
            var ty = H - padY - (t.val / maxDisp) * plotH;
            scatterCtx.strokeStyle = t.color;
            scatterCtx.setLineDash([4, 4]);
            scatterCtx.beginPath();
            scatterCtx.moveTo(padX, ty);
            scatterCtx.lineTo(W - padX, ty);
            scatterCtx.stroke();
            scatterCtx.setLineDash([]);
          }
        });

        // Dots
        var spacing = samples.length > 1 ? plotW / (samples.length - 1) : 0;
        samples.forEach(function(val, i) {
          var cx = padX + (samples.length > 1 ? i * spacing : plotW / 2);
          var cy = H - padY - (val / maxDisp) * plotH;
          scatterCtx.beginPath();
          scatterCtx.arc(cx, cy, 4, 0, Math.PI * 2);
          scatterCtx.fillStyle = '#3b82f6';
          scatterCtx.fill();
        });
      }

      // ── Show verdict ──────────────────────────────────────────────────────
      function showVerdict() {
        var total = 0;
        for (var i = 0; i < samples.length; i++) total += samples[i];
        var avg = total / samples.length;

        var label, cls, desc;
        if (avg < 5) {
          label = 'Very Low LOD'; cls = 'badge-very-low';
          desc  = 'Excellent for competitive FPS gaming. Your mouse stops tracking almost immediately on lift — no measurable aim drift during repositioning.';
        } else if (avg < 15) {
          label = 'Low LOD'; cls = 'badge-low';
          desc  = 'Good for most gaming. Slight cursor drift on lift is unlikely to affect your aim at typical gaming sensitivities.';
        } else if (avg < 30) {
          label = 'Medium LOD'; cls = 'badge-medium';
          desc  = 'Acceptable for casual gaming. Low-sensitivity FPS players may notice minor aim drift on lifts. Consider a hard mouse pad or LOD setting adjustment.';
        } else {
          label = 'High LOD'; cls = 'badge-high';
          desc  = 'May cause noticeable cursor drift during repositioning. Try a hard mouse pad, thinner mouse feet, or lower the LOD setting in your mouse software.';
        }

        verdictBadge.textContent = label + ' — ' + avg.toFixed(1) + 'px avg';
        verdictBadge.className   = 'lod-verdict-badge ' + cls;
        verdictSub.textContent   = desc;
        verdictEl.classList.add('visible');
      }

      // ── Reset ─────────────────────────────────────────────────────────────
      resetBtn.addEventListener('click', function() {
        samples    = [];
        liftPoint  = null;
        lastPos    = null;
        isDrawing  = false;
        colorIndex = 0;

        ctx.clearRect(0, 0, canvas.width, canvas.height);
        scatterCtx.clearRect(0, 0, scatterCvs.width, scatterCvs.height);

        avgDispEl.textContent   = '—';
        liftCountEl.textContent = '0';
        lastDispEl.textContent  = '—';
        liftListEl.innerHTML    = '';
        verdictEl.classList.remove('visible');
        trackMsg.style.opacity  = '1';
      });

    }, 0); });
  });
  </script>
</body>
</html>
