<?php include 'config.php'; ?>
<?php
$pageTitle = 'Mouse DPI Tester & Checker - Measure DPI Online | KeyboardTester.click';
$pageDescription = 'Use this free mouse DPI tester to check actual DPI with a ruler-distance test. Compare runs, calculate eDPI, and tune mouse sensitivity for gaming.';
$pageKeywords = 'mouse dpi test, dpi test, dpi checker, mouse dpi checker, dpi analyzer, check my mouse dpi, mouse sensitivity test, dpi finder, dpi tester online, mouse dpi calculator, test mouse dpi online';
$pageOgImage = 'images/mouse-dpi/hero.png';
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
  echo generateToolPageSchema('dpi_tester', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Mouse DPI Tester & Checker', 'url' => '']
  ]);
  ?>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">
    <?php include 'help/brief-mouse-sensitivity-dpi-tester.php'; ?>

    <section class="tool-stage" id="dpi-stage" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="tool-stage-title">Mouse DPI Tester & eDPI Calculator</h2>
          <p class="section-lede">Enter a known distance, move the mouse through the track area, and compare measured DPI across repeated runs.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#guidelines">View quick tips</a>
        </div>
      </div>
      <section id="mouse-sensitivity-dpi-tester" class="tool-shell">
        <?php include 'tools/mouse_sensitivity_dpi_tester_tool.php'; ?>
      </section>
    </section>

    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">DPI checker</div>
          <div class="trust-desc">Measure actual DPI online</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">eDPI calculator</div>
          <div class="trust-desc">Match mouse and game sensitivity</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Browser based</div>
          <div class="trust-desc">No installs or signups</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Focused checks</div>
          <div class="trust-desc">Built for DPI and sensitivity</div>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="feature-title">
      <div class="container">
        <div class="section-head">
          <p class="section-kicker">DPI and Sensitivity</p>
          <h2 id="feature-title">Measure Actual Mouse DPI From Real Movement</h2>
          <p class="section-lede">Check whether your configured DPI matches real cursor movement, then use the result for gaming sensitivity and eDPI tuning.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Ruler-distance test</h3>
            <p>Use a known physical distance instead of guessing from software settings.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Run comparison</h3>
            <p>Repeat the movement and compare results to reduce one-off measurement errors.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Gaming sensitivity</h3>
            <p>Use measured DPI with in-game sensitivity to calculate a consistent eDPI.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Private browser test</h3>
            <p>Mouse movement is measured locally in your browser with no signup.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="process-title">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="process-title">How to Check Mouse DPI Online</h2>
          </div>
          <p class="section-lede">Disable pointer acceleration, enter a real distance, move the mouse in a straight line, then repeat the test and average the result.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse-dpi/step-1.png'); ?>" alt="Mouse DPI sensitivity test step 1 - start calibration" loading="lazy" width="600" height="400" decoding="async">
            </div>
            <div class="step-number">01</div>
            <h3>Set the distance</h3>
            <p>Use a ruler, credit card, or another object with a known width.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse-dpi/step-2.png'); ?>" alt="Mouse DPI test step 2 - move cursor to calibrate sensitivity" loading="lazy" width="600" height="400" decoding="async">
            </div>
            <div class="step-number">02</div>
            <h3>Move in a straight line</h3>
            <p>Drag the mouse exactly that distance across the test area.</p>
          </article>
          <article class="process-card">
            <div class="process-media">
              <img src="<?php echo url('images/mouse-dpi/step-3.png'); ?>" alt="Mouse DPI test results - sensitivity measurement display" loading="lazy" width="600" height="461" decoding="async">
            </div>
            <div class="step-number">03</div>
            <h3>Average the result</h3>
            <p>Run three or more tests and use the average as your real DPI.</p>
          </article>
        </div>
      </div>
    </section>

    <section class="dpi-reference" aria-labelledby="dpi-reference-title" style="padding:60px 20px;background:var(--bg-secondary);">
      <div class="container" style="max-width:1000px;margin:0 auto;">
        <div class="section-head">
          <p class="section-kicker">Reference</p>
          <h2 id="dpi-reference-title">Recommended DPI by use case</h2>
          <p class="section-lede">Run the DPI test above to see your current setting, then compare to what works best for your activity. Lower DPI = more precise small movements; higher DPI = faster cursor traversal.</p>
        </div>
        <div class="dpi-table-wrap" style="overflow-x:auto;margin-top:24px;">
          <table style="width:100%;border-collapse:collapse;font-size:0.95rem;">
            <thead>
              <tr style="background:var(--surface);border-bottom:2px solid var(--accent-primary);">
                <th style="text-align:left;padding:12px 16px;">Use case</th>
                <th style="text-align:left;padding:12px 16px;">Recommended DPI</th>
                <th style="text-align:left;padding:12px 16px;">Why</th>
              </tr>
            </thead>
            <tbody>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Competitive FPS (CS, Valorant)</strong></td><td style="padding:12px 16px;">400 – 800</td><td style="padding:12px 16px;">Pro players favor low DPI for precise micro-adjustments and consistent muscle memory. Most pros use 400 or 800.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>MOBA / RTS</strong></td><td style="padding:12px 16px;">800 – 1200</td><td style="padding:12px 16px;">Balanced — fast enough for map travel, precise enough for unit selection.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Casual gaming &amp; productivity</strong></td><td style="padding:12px 16px;">800 – 1600</td><td style="padding:12px 16px;">Comfortable for everyday use on a typical desktop monitor.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>4K monitor / multi-monitor</strong></td><td style="padding:12px 16px;">1600 – 2400</td><td style="padding:12px 16px;">Higher pixel count means you need more DPI to traverse the screen without dragging the mouse repeatedly.</td></tr>
              <tr style="border-bottom:1px solid var(--border);"><td style="padding:12px 16px;"><strong>Graphic design &amp; CAD</strong></td><td style="padding:12px 16px;">1200 – 2400</td><td style="padding:12px 16px;">Mid-to-high DPI gives precision for fine work; many designers also use a tablet.</td></tr>
              <tr><td style="padding:12px 16px;"><strong>Gaming on a 27"+ 4K display</strong></td><td style="padding:12px 16px;">1600 – 3200</td><td style="padding:12px 16px;">Modern gaming mice support up to 26000 DPI but most players never exceed 3200 even on big screens.</td></tr>
            </tbody>
          </table>
        </div>
        <div style="margin-top:32px;padding:16px 20px;background:var(--surface);border-left:4px solid var(--accent-primary);border-radius:6px;">
          <strong>How to read your DPI test result:</strong> if the DPI shown by this tool differs significantly from your mouse's advertised DPI, the cause is usually (a) Windows pointer speed multiplier (set to "6th notch" / no enhancement for accurate measurement), (b) "Enhance pointer precision" enabled (turn it OFF for consistent DPI), or (c) the mouse is reporting a software-stepped DPI rather than its native sensor DPI.
        </div>
      </div>
    </section>

    <?php include 'includes/components/tools-list.php'; ?>
    <?php include 'help/seo-content/mouse-dpi.php'; ?>
    <?php $currentTool = 'dpi'; include 'includes/related-tools.php'; ?>
    <?php include 'help/mouse-sensitivity-dpi-tester.php'; ?>
  <?php $toolBlogSlug = 'mouse-dpi-tester-measure-sensitivity.php'; include __DIR__ . '/includes/components/tool-blog-cta.php'; ?>
  </main>

  <?php include 'footer.php'; ?>
</body>
</html>
