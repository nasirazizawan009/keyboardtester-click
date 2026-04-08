<?php include 'config.php'; ?>
<?php
$pageTitle = 'Backlight Bleed Test — Check Monitor for Light Leak Online Free | KeyboardTester.click';
$pageDescription = 'Free backlight bleed test online. Check your LCD monitor for backlight bleeding, IPS glow, and clouding with a full-screen black display. Adjustable brightness and multiple dark shades — no download required.';
$pageKeywords = 'backlight bleed test, backlight bleed test online, IPS glow test, monitor bleed check, LCD backlight bleeding test';
$pageOgImage = 'images/screen-test/hero.webp';
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
  echo generateToolPageSchema('backlight_bleed_test', [
      ['name' => 'Home', 'url' => '/'],
      ['name' => 'Backlight Bleed Test', 'url' => '']
  ]);
  ?>

  <style>
/* ── Backlight Bleed Tool ──────────────────────────────────────────── */
.bleed-tool {
  max-width: 820px;
  margin: 0 auto;
  padding: 1.5rem 1.5rem 2.5rem;
}

/* Preview area */
.bleed-preview-wrap {
  position: relative;
  width: 100%;
  aspect-ratio: 16 / 9;
  border-radius: 14px;
  overflow: hidden;
  background: #000;
  box-shadow: 0 8px 40px rgba(0,0,0,0.5);
  margin-bottom: 1.5rem;
  cursor: pointer;
}

.bleed-preview-label {
  position: absolute;
  bottom: 0.75rem;
  left: 50%;
  transform: translateX(-50%);
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.18);
  color: rgba(255,255,255,0.7);
  font-size: 0.78rem;
  font-weight: 600;
  letter-spacing: 0.05em;
  padding: 0.3rem 0.85rem;
  border-radius: 999px;
  pointer-events: none;
  white-space: nowrap;
}

/* Controls panel */
.bleed-controls {
  background: var(--card-bg, #fff);
  border: 1px solid var(--card-border, #e2e8f0);
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  display: flex;
  flex-wrap: wrap;
  gap: 1.25rem;
  align-items: center;
  margin-bottom: 1.5rem;
}

.bleed-control-group {
  display: flex;
  flex-direction: column;
  gap: 0.4rem;
  flex: 1;
  min-width: 160px;
}

.bleed-control-label {
  font-size: 0.78rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--text-muted, #475569);
}

/* Brightness slider */
.bleed-brightness-row {
  display: flex;
  align-items: center;
  gap: 0.6rem;
}

.bleed-brightness-slider {
  flex: 1;
  appearance: none;
  -webkit-appearance: none;
  height: 4px;
  border-radius: 2px;
  background: var(--border-color, #e2e8f0);
  outline: none;
  cursor: pointer;
}

.bleed-brightness-slider::-webkit-slider-thumb {
  appearance: none;
  -webkit-appearance: none;
  width: 16px;
  height: 16px;
  border-radius: 50%;
  background: var(--primary-color, #4b5eaa);
  cursor: pointer;
  box-shadow: 0 1px 4px rgba(0,0,0,0.2);
}

.bleed-brightness-slider::-moz-range-thumb {
  width: 16px;
  height: 16px;
  border-radius: 50%;
  border: none;
  background: var(--primary-color, #4b5eaa);
  cursor: pointer;
}

.bleed-brightness-val {
  font-size: 0.82rem;
  font-weight: 700;
  font-family: 'JetBrains Mono', monospace;
  color: var(--text-color, #1e293b);
  min-width: 2.8rem;
  text-align: right;
}

/* Color buttons */
.bleed-colors {
  display: flex;
  gap: 0.5rem;
  align-items: center;
}

.bleed-color-btn {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  border: 2px solid transparent;
  cursor: pointer;
  transition: border-color 0.15s, transform 0.12s;
  flex-shrink: 0;
  position: relative;
}

.bleed-color-btn:hover {
  transform: scale(1.12);
}

.bleed-color-btn.active {
  border-color: var(--primary-color, #4b5eaa);
  box-shadow: 0 0 0 2px rgba(75,94,170,0.3);
}

.bleed-color-btn[data-color="#000000"] { background: #000; border-color: #334155; }
.bleed-color-btn[data-color="#111111"] { background: #111; border-color: #475569; }
.bleed-color-btn[data-color="#000033"] { background: #000033; border-color: #1e3a5f; }
.bleed-color-btn[data-color="#1a0000"] { background: #1a0000; border-color: #4b1515; }

.bleed-color-btn.active { border-color: #60a5fa !important; box-shadow: 0 0 0 2px rgba(96,165,250,0.35); }

.bleed-color-hint {
  font-size: 0.75rem;
  color: var(--text-muted, #475569);
  margin-top: 0.25rem;
}

/* Fullscreen button */
.bleed-fs-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.65rem 1.3rem;
  background: var(--primary-color, #4b5eaa);
  color: #fff;
  border: none;
  border-radius: 8px;
  font-family: inherit;
  font-size: 0.9rem;
  font-weight: 700;
  cursor: pointer;
  transition: background 0.15s, transform 0.12s;
  white-space: nowrap;
  flex-shrink: 0;
}

.bleed-fs-btn:hover {
  background: #3d4e94;
  transform: translateY(-1px);
}

.bleed-fs-btn svg {
  width: 16px;
  height: 16px;
  stroke: currentColor;
  fill: none;
  stroke-width: 2;
  stroke-linecap: round;
  stroke-linejoin: round;
}

/* Quick guide */
.bleed-guide {
  background: var(--card-bg, #fff);
  border: 1px solid var(--card-border, #e2e8f0);
  border-radius: 14px;
  padding: 1.25rem 1.5rem;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 1rem;
}

.bleed-guide-step {
  display: flex;
  gap: 0.75rem;
  align-items: flex-start;
}

.bleed-guide-num {
  flex-shrink: 0;
  width: 26px;
  height: 26px;
  border-radius: 50%;
  background: var(--primary-color, #4b5eaa);
  color: #fff;
  font-size: 0.75rem;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-top: 0.05rem;
}

.bleed-guide-text {
  font-size: 0.85rem;
  color: var(--text-color, #1e293b);
  line-height: 1.5;
}

.bleed-guide-text strong {
  display: block;
  font-weight: 700;
  color: var(--heading-color, #1e293b);
  margin-bottom: 0.15rem;
}

/* ── Fullscreen overlay ────────────────────────────────────────────── */
.bleed-fs-overlay {
  display: none;
  position: fixed;
  inset: 0;
  z-index: 9999;
  background: #000;
}

.bleed-fs-overlay.active {
  display: block;
}

/* Floating control bar */
.bleed-fs-bar {
  position: fixed;
  bottom: 1.5rem;
  left: 50%;
  transform: translateX(-50%);
  z-index: 10000;
  background: rgba(10,12,20,0.92);
  border: 1px solid rgba(255,255,255,0.14);
  border-radius: 14px;
  padding: 0.7rem 1.25rem;
  display: flex;
  align-items: center;
  gap: 1rem;
  flex-wrap: wrap;
  justify-content: center;
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  transition: opacity 0.4s ease, transform 0.4s ease;
  white-space: nowrap;
}

.bleed-fs-bar.hidden {
  opacity: 0;
  pointer-events: none;
  transform: translateX(-50%) translateY(8px);
}

.bleed-fs-bar .bleed-control-label {
  color: rgba(255,255,255,0.55);
}

.bleed-fs-bar .bleed-brightness-slider {
  background: rgba(255,255,255,0.18);
  width: 110px;
}

.bleed-fs-bar .bleed-brightness-val {
  color: #e2e8f0;
}

.bleed-fs-exit-btn {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  padding: 0.45rem 1rem;
  background: rgba(239,68,68,0.18);
  border: 1px solid rgba(239,68,68,0.4);
  color: #fca5a5;
  border-radius: 7px;
  font-family: inherit;
  font-size: 0.82rem;
  font-weight: 700;
  cursor: pointer;
  transition: background 0.15s;
}

.bleed-fs-exit-btn:hover {
  background: rgba(239,68,68,0.3);
}

.bleed-fs-hint {
  font-size: 0.73rem;
  color: rgba(255,255,255,0.4);
}

/* Comparison table */
.bleed-compare-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.92rem;
  margin-top: 1.25rem;
}

.bleed-compare-table th {
  padding: 0.65rem 1rem;
  background: var(--card-bg, #fff);
  border: 1px solid var(--card-border, #e2e8f0);
  font-weight: 700;
  color: var(--heading-color, #1e293b);
  text-align: left;
}

.bleed-compare-table td {
  padding: 0.6rem 1rem;
  border: 1px solid var(--card-border, #e2e8f0);
  color: var(--text-color, #1e293b);
  vertical-align: top;
}

.bleed-compare-table tr:nth-child(even) td {
  background: rgba(15,23,42,0.03);
}

html.dark-theme .bleed-compare-table tr:nth-child(even) td {
  background: rgba(255,255,255,0.03);
}

/* FAQ */
.bleed-faq {
  margin-top: 1.25rem;
  display: grid;
  gap: 0.75rem;
}

.bleed-faq details {
  border: 1px solid var(--card-border, #e2e8f0);
  border-radius: 10px;
  padding: 0.9rem 1.1rem;
  background: var(--card-bg, #fff);
}

.bleed-faq summary {
  font-weight: 600;
  cursor: pointer;
  list-style: none;
  color: var(--heading-color, #1e293b);
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 1rem;
}

.bleed-faq summary::-webkit-details-marker { display: none; }

.bleed-faq summary::after {
  content: '+';
  font-size: 1.1rem;
  color: var(--text-muted, #475569);
  flex-shrink: 0;
}

.bleed-faq details[open] summary::after { content: '−'; }

.bleed-faq details p {
  margin: 0.65rem 0 0;
  color: var(--text-color, #1e293b);
  line-height: 1.65;
  font-size: 0.93rem;
}

/* Privacy note */
.bleed-privacy {
  font-size: 0.8rem;
  color: var(--text-muted, #475569);
  text-align: center;
  margin-top: 0.75rem;
}

@media (max-width: 600px) {
  .bleed-controls { gap: 0.9rem; }
  .bleed-control-group { min-width: 140px; }
  .bleed-fs-bar { gap: 0.6rem; padding: 0.6rem 0.9rem; }
  .bleed-fs-bar .bleed-brightness-slider { width: 80px; }
  .bleed-compare-table { font-size: 0.8rem; }
  .bleed-compare-table th, .bleed-compare-table td { padding: 0.5rem 0.65rem; }
}
  </style>
</head>
<body class="landing-page">
  <?php include 'header.php'; ?>

  <main id="main-content" class="landing-main">

    <!-- ── Tool Stage ────────────────────────────────────────────────── -->
    <section class="tool-stage" id="backlight-bleed-tool" aria-labelledby="tool-stage-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Monitor diagnostics</p>
          <h1 id="tool-stage-title">Backlight Bleed Test</h1>
          <p class="section-lede">Check your monitor for light leakage, IPS glow, and clouding using a full-screen dark display.</p>
        </div>
        <div class="tool-stage-actions">
          <a class="landing-btn landing-btn-ghost" href="#what-is-bleed">Learn about backlight bleed</a>
        </div>
      </div>

      <div class="tool-shell">
        <div class="bleed-tool">

          <!-- Preview area -->
          <div class="bleed-preview-wrap" id="bleed-preview" role="img" aria-label="Dark monitor preview — click to enter fullscreen">
            <div class="bleed-preview-label">Click preview or press Enter Fullscreen →</div>
          </div>

          <!-- Controls -->
          <div class="bleed-controls" role="group" aria-label="Backlight bleed test controls">

            <!-- Brightness -->
            <div class="bleed-control-group">
              <span class="bleed-control-label">Brightness</span>
              <div class="bleed-brightness-row">
                <input
                  type="range"
                  class="bleed-brightness-slider"
                  id="bleed-brightness"
                  min="0.8"
                  max="1.5"
                  step="0.05"
                  value="1.0"
                  aria-label="Adjust display brightness"
                  aria-valuemin="0.8"
                  aria-valuemax="1.5"
                  aria-valuenow="1.0"
                >
                <span class="bleed-brightness-val" id="bleed-brightness-val" aria-live="polite">1.0×</span>
              </div>
              <p class="bleed-color-hint">Raise to reveal subtle edge glow</p>
            </div>

            <!-- Color select -->
            <div class="bleed-control-group">
              <span class="bleed-control-label">Test Color</span>
              <div class="bleed-colors" role="group" aria-label="Select test color">
                <button class="bleed-color-btn active" data-color="#000000" aria-label="Pure black" aria-pressed="true" title="Pure Black (#000)"></button>
                <button class="bleed-color-btn" data-color="#111111" aria-label="Dark gray" aria-pressed="false" title="Dark Gray (#111)"></button>
                <button class="bleed-color-btn" data-color="#000033" aria-label="Dark blue" aria-pressed="false" title="Dark Blue (#000033)"></button>
                <button class="bleed-color-btn" data-color="#1a0000" aria-label="Dark red" aria-pressed="false" title="Dark Red (#1a0000)"></button>
              </div>
              <p class="bleed-color-hint">Keys 1–4 switch colors in fullscreen</p>
            </div>

            <!-- Fullscreen button -->
            <button class="bleed-fs-btn" id="bleed-fs-btn" aria-label="Enter fullscreen backlight bleed test">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"/></svg>
              Enter Fullscreen
            </button>

          </div>

          <!-- Quick guide -->
          <div class="bleed-guide" aria-label="Quick start guide">
            <div class="bleed-guide-step">
              <div class="bleed-guide-num" aria-hidden="true">1</div>
              <div class="bleed-guide-text">
                <strong>Dim your room</strong>
                Turn off room lights — bleed is much harder to see in bright environments.
              </div>
            </div>
            <div class="bleed-guide-step">
              <div class="bleed-guide-num" aria-hidden="true">2</div>
              <div class="bleed-guide-text">
                <strong>Enter fullscreen</strong>
                Press the button above or click the preview. The screen fills with pure black.
              </div>
            </div>
            <div class="bleed-guide-step">
              <div class="bleed-guide-num" aria-hidden="true">3</div>
              <div class="bleed-guide-text">
                <strong>Inspect edges &amp; corners</strong>
                Look for bright patches, haze, or uneven glow. Raise brightness to reveal subtle bleed.
              </div>
            </div>
          </div>

          <p class="bleed-privacy">This test runs entirely in your browser. No data is collected or uploaded.</p>
        </div>
      </div>
    </section>

    <!-- ── Fullscreen overlay ─────────────────────────────────────────── -->
    <div class="bleed-fs-overlay" id="bleed-fs-overlay" role="region" aria-label="Fullscreen backlight bleed test — press Escape to exit">
      <!-- Floating control bar -->
      <div class="bleed-fs-bar" id="bleed-fs-bar" role="toolbar" aria-label="Fullscreen controls">
        <div style="display:flex;align-items:center;gap:0.5rem;">
          <span class="bleed-control-label">Brightness</span>
          <input
            type="range"
            class="bleed-brightness-slider"
            id="bleed-brightness-fs"
            min="0.8"
            max="1.5"
            step="0.05"
            value="1.0"
            aria-label="Adjust fullscreen brightness"
          >
          <span class="bleed-brightness-val" id="bleed-brightness-val-fs">1.0×</span>
        </div>

        <div class="bleed-colors" role="group" aria-label="Select test color">
          <button class="bleed-color-btn active" data-color="#000000" aria-label="Pure black" title="1 — Pure Black"></button>
          <button class="bleed-color-btn" data-color="#111111" aria-label="Dark gray" title="2 — Dark Gray"></button>
          <button class="bleed-color-btn" data-color="#000033" aria-label="Dark blue" title="3 — Dark Blue"></button>
          <button class="bleed-color-btn" data-color="#1a0000" aria-label="Dark red" title="4 — Dark Red"></button>
        </div>

        <span class="bleed-fs-hint">↑↓ brightness · 1–4 colors · Esc exit</span>

        <button class="bleed-fs-exit-btn" id="bleed-fs-exit" aria-label="Exit fullscreen">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><path d="M18 6L6 18M6 6l12 12"/></svg>
          Exit
        </button>
      </div>
    </div>

    <!-- ── Trust strip ────────────────────────────────────────────────── -->
    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <div class="trust-item">
          <div class="trust-title">Full Screen Mode</div>
          <div class="trust-desc">Covers the entire panel for an accurate check</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Adjustable Brightness</div>
          <div class="trust-desc">Reveal subtle bleed invisible at default levels</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">Multiple Dark Shades</div>
          <div class="trust-desc">Pure black, dark gray, dark blue, dark red</div>
        </div>
        <div class="trust-item">
          <div class="trust-title">No Download</div>
          <div class="trust-desc">Runs entirely in your browser</div>
        </div>
      </div>
    </section>

    <!-- ── What Is Backlight Bleed? ───────────────────────────────────── -->
    <section class="feature-band" aria-labelledby="what-is-bleed">
      <div class="container">
        <div class="section-head">
          <h2 id="what-is-bleed">What Is Backlight Bleed?</h2>
          <p class="section-lede">
            LCD monitors work by shining a powerful backlight through a liquid-crystal layer.
            When the crystals fail to fully block light near the edges or corners of the panel,
            that light "bleeds" through and appears as bright patches on dark screens.
            Backlight bleed is most visible in dim rooms on black backgrounds, and its severity
            can range from invisible to severe.
          </p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Why it happens</h3>
            <p>The backlight assembly sits behind the LCD layer and is held in place by a metal chassis. Slight gaps or uneven clamping pressure allow light to escape around the edges — a manufacturing tolerance issue common to all LCD panels.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Which panels are affected</h3>
            <p>All LCD technologies — TN, IPS, and VA — can exhibit backlight bleed. IPS panels also produce a separate issue called IPS glow. VA panels are generally better at blocking light but can show "clouding" instead.</p>
          </article>
          <article class="landing-feature-card">
            <h3>When it matters most</h3>
            <p>Backlight bleed is most noticeable during dark movie scenes, full-screen gaming at night, and any workflow involving dark UI themes. On a bright desktop it is usually invisible.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Can it be fixed?</h3>
            <p>Minor bleed often softens as a panel warms up and after a few months of use. Severe bleed rarely improves on its own. Loosening the bezel screws slightly sometimes helps — but that voids most warranties.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ── How to Use ─────────────────────────────────────────────────── -->
    <section class="process-band" aria-labelledby="how-to-use-bleed">
      <div class="container">
        <div class="section-head split">
          <div>
            <p class="section-kicker">Simple workflow</p>
            <h2 id="how-to-use-bleed">How to Use This Backlight Bleed Test</h2>
          </div>
          <p class="section-lede">Run a complete bleed inspection in under two minutes with no software install.</p>
        </div>
        <div class="process-grid">
          <article class="process-card">
            <div class="step-number">01</div>
            <h3>Prepare your environment</h3>
            <p>Turn off room lights or close blinds. Even moderate ambient light can mask backlight bleed that would be obvious in a darker room. Let your monitor warm up for two minutes at normal brightness.</p>
          </article>
          <article class="process-card">
            <div class="step-number">02</div>
            <h3>Enter fullscreen and inspect</h3>
            <p>Click "Enter Fullscreen" to fill the entire panel with pure black. Slowly scan the edges and all four corners. Bright or hazy patches near the frame are backlight bleed. Center cloudiness is VA clouding.</p>
          </article>
          <article class="process-card">
            <div class="step-number">03</div>
            <h3>Adjust brightness and switch colors</h3>
            <p>Raise the brightness slider to surface subtle bleed invisible at 1.0×. Press keys 1–4 to switch shades — dark blue and dark red can reveal different bleed characteristics than pure black. Use Escape or Exit to leave fullscreen.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ── Comparison table ───────────────────────────────────────────── -->
    <section class="feature-band" aria-labelledby="bleed-comparison">
      <div class="container">
        <div class="section-head">
          <h2 id="bleed-comparison">Backlight Bleed vs IPS Glow vs Clouding</h2>
          <p class="section-lede">These three display issues look similar but have different causes, locations, and severity profiles. Understanding which one you have helps you decide whether to keep the panel or request a return.</p>
        </div>
        <div style="overflow-x:auto;">
          <table class="bleed-compare-table" aria-label="Comparison of backlight bleed, IPS glow, and clouding">
            <thead>
              <tr>
                <th scope="col">Issue</th>
                <th scope="col">Where it appears</th>
                <th scope="col">Changes with viewing angle?</th>
                <th scope="col">Panel types</th>
                <th scope="col">Severity range</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Backlight bleed</strong></td>
                <td>Edges and corners, often as bright rectangular patches</td>
                <td>No — fixed regardless of angle</td>
                <td>All LCD (TN, IPS, VA)</td>
                <td>Minor (normal) to severe (RMA territory)</td>
              </tr>
              <tr>
                <td><strong>IPS glow</strong></td>
                <td>Corners, as a diffuse silver-white haze or shimmer</td>
                <td>Yes — shifts dramatically when you tilt your head</td>
                <td>IPS and IPS-variant (Nano IPS, AHVA)</td>
                <td>Inherent to technology — unavoidable, varies by panel</td>
              </tr>
              <tr>
                <td><strong>Clouding / Dirty Screen Effect</strong></td>
                <td>Center or spread across the panel as irregular dark patches</td>
                <td>Minimal — mostly viewing-angle independent</td>
                <td>Primarily VA panels</td>
                <td>Minor to severe — varies widely between units</td>
              </tr>
            </tbody>
          </table>
        </div>
        <p style="margin-top:1rem;font-size:0.9rem;color:var(--text-muted,#475569);">
          <strong>Testing tip:</strong> IPS glow is easiest to detect by sitting at your normal viewing distance, then leaning slowly to the left and right. If the corner haze shifts, it is IPS glow. If it stays fixed, it is backlight bleed.
        </p>
      </div>
    </section>

    <!-- ── Is my bleed normal? ────────────────────────────────────────── -->
    <section class="feature-band" aria-labelledby="bleed-normal">
      <div class="container">
        <div class="section-head">
          <h2 id="bleed-normal">Is My Backlight Bleed Normal?</h2>
          <p class="section-lede">Some degree of backlight bleed is present in nearly every LCD monitor. The question is whether yours falls within an acceptable range or crosses into actionable territory.</p>
        </div>
        <div class="landing-feature-grid">
          <article class="landing-feature-card">
            <h3>Minor bleed (normal)</h3>
            <p>Small patches of light at one or two corners that are only visible in a completely dark room at maximum brightness. Invisible during typical desktop use. Within industry-standard tolerances — no action required.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Moderate bleed</h3>
            <p>Noticeable glow along one or more edges at normal brightness settings. Distracting during dark movie scenes or gaming at night. Whether to act depends on personal sensitivity and the return policy window.</p>
          </article>
          <article class="landing-feature-card">
            <h3>Severe bleed (consider RMA)</h3>
            <p>Bright bands visible even at moderate ambient light, covering more than a few centimeters of screen edge. Clearly distracting during normal use. Most manufacturers consider this a manufacturing defect eligible for replacement.</p>
          </article>
          <article class="landing-feature-card">
            <h3>When to request a return</h3>
            <p>Act within the return window if bleed is visible at normal brightness with room lights on. Document with photos taken in a dimmed room. Check your retailer's dead/stuck pixel policy — most cover obvious bleed under the same terms.</p>
          </article>
        </div>
      </div>
    </section>

    <!-- ── FAQ ───────────────────────────────────────────────────────── -->
    <section class="feature-band" aria-labelledby="bleed-faq-title">
      <div class="container">
        <div class="section-head">
          <h2 id="bleed-faq-title">Frequently Asked Questions</h2>
        </div>
        <div class="bleed-faq" role="list">
          <details>
            <summary>Does every LCD monitor have backlight bleed?</summary>
            <p>Nearly all LCD monitors have some level of backlight bleed. The backlight assembly physically cannot achieve a perfect seal against the panel's edges. The amount varies enormously between manufacturing batches, models, and even individual units of the same model. OLED panels have no backlight and therefore have no backlight bleed — though they can suffer from other issues like burn-in.</p>
          </details>
          <details>
            <summary>Why can I only see the bleed in a dark room?</summary>
            <p>Backlight bleed is most visible when the surrounding environment is darker than the leaked light. In normal room lighting, ambient brightness overwhelms the faint edge glow and makes it effectively invisible. Testing in a dim room with the screen showing a pure black background gives you the worst-case scenario, which is the standard way to evaluate bleed severity.</p>
          </details>
          <details>
            <summary>Will backlight bleed get worse over time?</summary>
            <p>In most cases, bleed does not worsen significantly over a monitor's lifespan. Some users report slight improvement in the first few weeks as the panel settles. Physical damage to the bezel, overtightened screws, or mounting the panel in a non-standard orientation can sometimes make existing bleed slightly worse.</p>
          </details>
          <details>
            <summary>Can I reduce backlight bleed without returning the monitor?</summary>
            <p>A few things sometimes help without voiding the warranty: lowering display brightness, using a bias light behind the monitor (reduces contrast perception), and ensuring nothing is pressing against the bezel. Some users carefully loosen the display screws by a quarter turn — this sometimes redistributes pressure and reduces bleed, but it voids the warranty and carries risk of physical damage.</p>
          </details>
          <details>
            <summary>Does the brightness slider in this tool affect my actual monitor brightness?</summary>
            <p>No. The brightness slider uses a CSS filter applied by your browser, making the test screen appear brighter without changing your monitor's hardware backlight level. This helps reveal subtle bleed that might be present at higher brightness levels without requiring you to enter your monitor's on-screen display settings. For the most accurate test, also run the check at your monitor's actual brightness setting.</p>
          </details>
        </div>
      </div>
    </section>

    <?php $intentClusterTool = 'screen'; $currentTool = 'screen'; include 'includes/components/intent-cluster-links.php'; ?>
    <?php include 'includes/components/tools-list.php'; ?>
    <?php $currentTool = 'backlight-bleed-test'; include 'includes/related-tools.php'; ?>

  </main>

  <?php include 'footer.php'; ?>

  <script>
  (function () {
    'use strict';

    // ── State ────────────────────────────────────────────────────────────
    var currentColor = '#000000';
    var currentBrightness = 1.0;
    var inFullscreen = false;
    var hideTimer = null;

    // ── DOM ──────────────────────────────────────────────────────────────
    var preview     = document.getElementById('bleed-preview');
    var overlay     = document.getElementById('bleed-fs-overlay');
    var fsBar       = document.getElementById('bleed-fs-bar');
    var fsBtn       = document.getElementById('bleed-fs-btn');
    var exitBtn     = document.getElementById('bleed-fs-exit');
    var sliderMain  = document.getElementById('bleed-brightness');
    var sliderFs    = document.getElementById('bleed-brightness-fs');
    var valMain     = document.getElementById('bleed-brightness-val');
    var valFs       = document.getElementById('bleed-brightness-val-fs');
    var colorBtnsMain = document.querySelectorAll('.bleed-controls .bleed-color-btn');
    var colorBtnsFs   = document.querySelectorAll('.bleed-fs-bar .bleed-color-btn');

    // ── Apply color ───────────────────────────────────────────────────────
    function applyColor(color) {
      currentColor = color;
      // Preview
      preview.style.background = color;
      // Overlay
      overlay.style.background = color;
      // Sync both sets of buttons
      [colorBtnsMain, colorBtnsFs].forEach(function (group) {
        group.forEach(function (btn) {
          var active = btn.dataset.color === color;
          btn.classList.toggle('active', active);
          btn.setAttribute('aria-pressed', active ? 'true' : 'false');
        });
      });
    }

    // ── Apply brightness ──────────────────────────────────────────────────
    function applyBrightness(val) {
      currentBrightness = val;
      var filterStr = 'brightness(' + val + ')';
      overlay.style.filter = filterStr;
      preview.style.filter = filterStr;
      var label = val.toFixed(2).replace(/0$/, '') + '×';
      valMain.textContent = label;
      valFs.textContent  = label;
      sliderMain.value = val;
      sliderFs.value   = val;
      sliderMain.setAttribute('aria-valuenow', val);
      sliderFs.setAttribute('aria-valuenow', val);
    }

    // ── Enter fullscreen ──────────────────────────────────────────────────
    function enterFullscreen() {
      inFullscreen = true;
      overlay.classList.add('active');
      applyColor(currentColor);
      applyBrightness(currentBrightness);
      showControls();

      // Request native fullscreen on overlay
      var el = overlay;
      if (el.requestFullscreen) {
        el.requestFullscreen().catch(function () {});
      } else if (el.webkitRequestFullscreen) {
        el.webkitRequestFullscreen();
      } else if (el.mozRequestFullScreen) {
        el.mozRequestFullScreen();
      } else if (el.msRequestFullscreen) {
        el.msRequestFullscreen();
      }
    }

    // ── Exit fullscreen ───────────────────────────────────────────────────
    function exitFullscreen() {
      inFullscreen = false;
      overlay.classList.remove('active');
      clearTimeout(hideTimer);

      if (document.fullscreenElement || document.webkitFullscreenElement ||
          document.mozFullScreenElement || document.msFullscreenElement) {
        if (document.exitFullscreen) {
          document.exitFullscreen().catch(function () {});
        } else if (document.webkitExitFullscreen) {
          document.webkitExitFullscreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    }

    // ── Auto-hide controls ────────────────────────────────────────────────
    function showControls() {
      fsBar.classList.remove('hidden');
      clearTimeout(hideTimer);
      hideTimer = setTimeout(function () {
        fsBar.classList.add('hidden');
      }, 3000);
    }

    // ── Event: brightness sliders ─────────────────────────────────────────
    sliderMain.addEventListener('input', function () {
      applyBrightness(parseFloat(this.value));
    });

    sliderFs.addEventListener('input', function () {
      applyBrightness(parseFloat(this.value));
      showControls();
    });

    // ── Event: color buttons ──────────────────────────────────────────────
    colorBtnsMain.forEach(function (btn) {
      btn.addEventListener('click', function () {
        applyColor(this.dataset.color);
      });
    });

    colorBtnsFs.forEach(function (btn) {
      btn.addEventListener('click', function () {
        applyColor(this.dataset.color);
        showControls();
      });
    });

    // ── Event: enter fullscreen ───────────────────────────────────────────
    fsBtn.addEventListener('click', enterFullscreen);
    preview.addEventListener('click', enterFullscreen);

    // ── Event: exit fullscreen ────────────────────────────────────────────
    exitBtn.addEventListener('click', exitFullscreen);

    // ── Fullscreen change (Esc key / browser UI exit) ─────────────────────
    function onFsChange() {
      var isNativeFs = !!(document.fullscreenElement || document.webkitFullscreenElement ||
                         document.mozFullScreenElement || document.msFullscreenElement);
      if (!isNativeFs && inFullscreen) {
        exitFullscreen();
      }
    }

    document.addEventListener('fullscreenchange', onFsChange);
    document.addEventListener('webkitfullscreenchange', onFsChange);
    document.addEventListener('mozfullscreenchange', onFsChange);
    document.addEventListener('MSFullscreenChange', onFsChange);

    // ── Mouse move → show controls ────────────────────────────────────────
    overlay.addEventListener('mousemove', function () {
      if (inFullscreen) showControls();
    });

    overlay.addEventListener('touchstart', function () {
      if (inFullscreen) showControls();
    }, { passive: true });

    // ── Keyboard shortcuts ────────────────────────────────────────────────
    var colors = ['#000000', '#111111', '#000033', '#1a0000'];

    document.addEventListener('keydown', function (e) {
      if (!inFullscreen) return;

      switch (e.key) {
        case '1': applyColor(colors[0]); showControls(); break;
        case '2': applyColor(colors[1]); showControls(); break;
        case '3': applyColor(colors[2]); showControls(); break;
        case '4': applyColor(colors[3]); showControls(); break;
        case 'ArrowUp':
          e.preventDefault();
          applyBrightness(Math.min(1.5, Math.round((currentBrightness + 0.05) * 100) / 100));
          showControls();
          break;
        case 'ArrowDown':
          e.preventDefault();
          applyBrightness(Math.max(0.8, Math.round((currentBrightness - 0.05) * 100) / 100));
          showControls();
          break;
        case 'Escape':
          exitFullscreen();
          break;
      }
    });

    // ── Initial state ─────────────────────────────────────────────────────
    applyColor('#000000');

  })();
  </script>

</body>
</html>
