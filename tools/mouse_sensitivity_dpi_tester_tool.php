<?php
// Mouse DPI / Sensitivity Tester tool v2.0
// Features: DPI tester with multi-run avg + deviation, eDPI calculator, sensitivity converter
// Beginner / Advanced mode toggle
?>

<style>
/* ── DPI Tool v2 ─────────────────────────────────────────────────── */
.dpi-v2 { font-family: var(--font-sans, 'Space Grotesk', 'Inter Fallback', -apple-system, sans-serif); }

/* Tabs */
.dpi-tabs {
  display: flex; gap: 6px;
  background: var(--surface, #f1f5f9);
  border-radius: 11px; padding: 6px; margin-bottom: 20px;
}
.dpi-tab-btn {
  flex: 1; padding: 10px 10px; border-radius: 7px;
  border: 1.5px solid var(--border-color, #cbd5e1);
  background: var(--card-bg, #fff); color: var(--text-muted, #64748b);
  font-size: .82rem; font-weight: 600; cursor: pointer;
  transition: background .15s, color .15s, border-color .15s, box-shadow .15s;
  white-space: nowrap;
}
.dpi-tab-btn:hover:not(.active) {
  border-color: var(--primary-color, #0ea5e9);
  color: var(--primary-color, #0ea5e9);
}
.dpi-tab-btn.active {
  background: var(--primary-color, #0ea5e9); color: #fff;
  border-color: var(--primary-color, #0ea5e9);
  box-shadow: 0 2px 8px rgba(14,165,233,.35);
}
.dpi-panel { display: none; }
.dpi-panel.active { display: block; }

/* Grid */
.dpi-grid {
  display: grid; grid-template-columns: 1fr 1fr; gap: 16px;
}
@media (max-width: 640px) { .dpi-grid { grid-template-columns: 1fr; } }

/* Card */
.dpi-card {
  background: var(--card-bg, #fff);
  border: 1px solid var(--border-color, #e2e8f0);
  border-radius: 10px; padding: 18px;
}
.dpi-card-title {
  font-size: .78rem; font-weight: 700; letter-spacing: .06em;
  text-transform: uppercase; color: var(--text-muted, #64748b);
  margin: 0 0 14px;
}

/* Field */
.dpi-field { margin-bottom: 13px; }
.dpi-field label {
  display: block; font-size: .8rem; font-weight: 500;
  color: var(--text-muted, #64748b); margin-bottom: 5px;
}
.dpi-field label small { font-weight: 400; font-size: .73rem; }
.dpi-inline { display: flex; gap: 8px; align-items: stretch; }
.dpi-input, .dpi-select {
  padding: 8px 10px;
  border: 1.5px solid var(--border-color, #e2e8f0);
  border-radius: 7px;
  background: var(--bg-color, #f8fafc);
  color: var(--text-color, #1e293b);
  font-size: .9rem; font-family: inherit;
  transition: border-color .15s;
}
.dpi-input:focus, .dpi-select:focus {
  outline: none; border-color: var(--primary-color, #0ea5e9);
}
.dpi-input { flex: 1; min-width: 0; }
.dpi-input.full { width: 100%; box-sizing: border-box; }
.dpi-select { min-width: 90px; }

/* Buttons */
.dpi-actions { display: flex; gap: 8px; margin-top: 14px; flex-wrap: wrap; }
.dpi-btn {
  padding: 9px 16px; border: none; border-radius: 7px;
  font-size: .85rem; font-weight: 600; cursor: pointer; font-family: inherit;
  transition: opacity .15s, background .15s, box-shadow .15s;
}
.dpi-btn.primary { background: var(--primary-color, #0ea5e9); color: #fff; }
.dpi-btn.primary:hover:not(:disabled) { opacity: .9; }
.dpi-btn.primary.measuring { background: #22c55e; cursor: default; }
.dpi-btn.ghost {
  background: transparent;
  border: 1.5px solid var(--border-color, #e2e8f0);
  color: var(--text-color, #1e293b);
}
.dpi-btn.ghost:hover { background: var(--surface, #f1f5f9); }
.dpi-btn:disabled { opacity: .55; cursor: not-allowed; }

/* Track area */
.dpi-track {
  border: 2px dashed var(--border-color, #cbd5e1);
  border-radius: 8px; height: 118px;
  display: flex; align-items: center; justify-content: center;
  text-align: center; color: var(--text-muted, #94a3b8);
  font-size: .82rem; cursor: crosshair; user-select: none;
  margin-bottom: 14px; position: relative; overflow: hidden;
  transition: border-color .2s, box-shadow .2s;
}
.dpi-track.t-ready {
  border-style: solid; border-color: var(--primary-color, #0ea5e9);
  color: var(--primary-color, #0ea5e9);
}
.dpi-track.t-active {
  border-style: solid; border-color: #22c55e;
  color: #22c55e; font-weight: 600;
  animation: dpiPulse 1.5s ease-in-out infinite;
}
@keyframes dpiPulse {
  0%,100% { box-shadow: 0 0 0 3px rgba(34,197,94,.2); }
  50%      { box-shadow: 0 0 0 7px rgba(34,197,94,.07); }
}
.dpi-pbar {
  position: absolute; bottom: 0; left: 0; height: 3px;
  background: linear-gradient(90deg,#22c55e,#4ade80);
  transition: width .06s; border-radius: 0 2px 2px 0;
}

/* Stats grid */
.dpi-stats { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
.dpi-stat {
  background: var(--surface, #f8fafc);
  border: 1px solid var(--border-color, #e2e8f0);
  border-radius: 7px; padding: 10px 12px;
}
.dpi-stat-label {
  display: block; font-size: .7rem; color: var(--text-muted, #64748b);
  margin-bottom: 3px; text-transform: uppercase; letter-spacing: .04em;
}
.dpi-stat-value {
  font-size: 1.15rem; font-weight: 700; color: var(--heading-color, #0f172a);
}
.dpi-stat.s-primary .dpi-stat-value { color: var(--primary-color, #0ea5e9); font-size: 1.4rem; }
.dpi-stat.s-good    .dpi-stat-value { color: #22c55e; }
.dpi-stat.s-warn    .dpi-stat-value { color: #f59e0b; }
.dpi-stat.s-bad     .dpi-stat-value { color: #ef4444; }

/* Run chips */
.dpi-runs { margin-top: 12px; }
.dpi-runs-lbl {
  font-size: .72rem; color: var(--text-muted, #64748b);
  text-transform: uppercase; letter-spacing: .05em; margin-bottom: 6px;
}
.dpi-chip-row { display: flex; gap: 6px; flex-wrap: wrap; }
.dpi-chip {
  background: var(--surface, #f1f5f9);
  border: 1px solid var(--border-color, #e2e8f0);
  border-radius: 5px; padding: 4px 8px; font-size: .74rem;
  color: var(--text-color, #374151);
}
.dpi-chip.c-avg {
  background: var(--primary-color, #0ea5e9); color: #fff;
  border-color: transparent; font-weight: 600;
}

/* Mode toggle */
.dpi-mode-row { display: flex; justify-content: flex-end; margin-bottom: 12px; }
.dpi-mode-toggle {
  display: flex; gap: 3px;
  background: var(--surface, #f1f5f9); border-radius: 7px; padding: 3px;
}
.dpi-mode-btn {
  padding: 5px 12px; border: none; border-radius: 5px;
  font-size: .74rem; font-weight: 500; cursor: pointer; font-family: inherit;
  background: transparent; color: var(--text-muted, #64748b);
  transition: background .15s, color .15s;
}
.dpi-mode-btn.active {
  background: var(--card-bg, #fff); color: var(--text-color, #1e293b);
  box-shadow: 0 1px 2px rgba(0,0,0,.08);
}
.dpi-adv-section { display: none; }
.dpi-adv-section.shown { display: block; }

/* eDPI */
.dpi-result-big {
  text-align: center; padding: 20px 10px;
  background: var(--surface, #f8fafc);
  border-radius: 10px; margin: 14px 0;
}
.dpi-result-big .val {
  font-size: 3rem; font-weight: 800; line-height: 1;
  color: var(--primary-color, #0ea5e9);
}
.dpi-result-big .lbl {
  font-size: .75rem; color: var(--text-muted, #64748b);
  margin-top: 5px; text-transform: uppercase; letter-spacing: .07em;
}
.dpi-pro-table { width: 100%; border-collapse: collapse; font-size: .78rem; margin-top: 10px; }
.dpi-pro-table th {
  text-align: left; padding: 6px 8px; font-weight: 600;
  color: var(--text-muted, #64748b); text-transform: uppercase;
  letter-spacing: .04em; font-size: .68rem;
  border-bottom: 1px solid var(--border-color, #e2e8f0);
}
.dpi-pro-table td {
  padding: 6px 8px; color: var(--text-color, #374151);
  border-bottom: 1px solid var(--border-color, #e2e8f0);
}
.dpi-pro-table tr.t-match td {
  background: rgba(14,165,233,.08); color: var(--primary-color, #0ea5e9); font-weight: 600;
}

/* Converter */
.dpi-conv-result {
  background: var(--surface, #f1f5f9); border-radius: 8px;
  padding: 14px 16px; margin-top: 14px;
  border-left: 3px solid var(--primary-color, #0ea5e9);
}
.dpi-conv-formula {
  font-size: .72rem; color: var(--text-muted, #94a3b8);
  font-family: 'JetBrains Mono', 'Courier New', monospace; margin-bottom: 6px;
}
.dpi-conv-val { font-size: 1.7rem; font-weight: 700; color: var(--primary-color, #0ea5e9); }
.dpi-conv-sub { font-size: .75rem; color: var(--text-muted, #64748b); margin-top: 2px; }

/* Tip box */
.dpi-tip {
  font-size: .78rem; line-height: 1.6; color: var(--text-color, #374151);
}
.dpi-tip strong { color: var(--heading-color, #0f172a); }
.dpi-code-block {
  background: var(--surface, #f1f5f9); border-radius: 6px;
  padding: 9px 13px; font-family: 'JetBrains Mono', monospace;
  font-size: .78rem; color: var(--text-color, #374151); margin: 8px 0;
}

/* Privacy */
.dpi-privacy {
  text-align: center; font-size: .71rem; color: var(--text-muted, #94a3b8);
  margin-top: 16px; padding-top: 12px;
  border-top: 1px solid var(--border-color, #e2e8f0);
}

/* Session Log */
.dpi-log-section { margin-top: 20px; }
.dpi-log-header {
  display: flex; align-items: center; justify-content: space-between;
  margin-bottom: 8px;
}
.dpi-log-box {
  background: var(--surface, #f8fafc);
  border: 1px solid var(--border-color, #e2e8f0);
  border-radius: 8px; padding: 10px 14px;
  max-height: 200px; overflow-y: auto;
  font-family: 'JetBrains Mono', 'Courier New', monospace;
  font-size: .73rem; line-height: 1.6;
}
.dpi-log-empty {
  color: var(--text-muted, #94a3b8); text-align: center;
  padding: 10px 0; margin: 0;
}
.dpi-log-entry {
  padding: 3px 0; border-bottom: 1px solid var(--border-color, #e2e8f0);
  color: var(--text-color, #374151);
}
.dpi-log-entry:last-child { border-bottom: none; }
.dpi-log-ts { color: var(--text-muted, #94a3b8); }
.dpi-log-dpi { color: var(--primary-color, #0ea5e9); font-weight: 700; }
.dpi-log-good { color: #22c55e; }
.dpi-log-warn { color: #f59e0b; }
.dpi-log-bad  { color: #ef4444; }
</style>

<div class="kbt-tool dpi-v2" id="dpi-tool">

  <!-- ── Tabs ───────────────────────────────────────────────── -->
  <div class="dpi-tabs" role="tablist" aria-label="DPI tool sections">
    <button class="dpi-tab-btn active" role="tab" aria-selected="true"  data-panel="dpi-p-test">DPI Test</button>
    <button class="dpi-tab-btn"        role="tab" aria-selected="false" data-panel="dpi-p-edpi">eDPI Calculator</button>
    <button class="dpi-tab-btn"        role="tab" aria-selected="false" data-panel="dpi-p-conv">Sens Converter</button>
  </div>

  <!-- ── Tab 1: DPI Test ─────────────────────────────────────── -->
  <div class="dpi-panel active" id="dpi-p-test" role="tabpanel">

    <div class="dpi-mode-row" aria-label="Mode selector">
      <div class="dpi-mode-toggle">
        <button class="dpi-mode-btn active" data-mode="basic">Basic</button>
        <button class="dpi-mode-btn"        data-mode="advanced">Advanced</button>
      </div>
    </div>

    <div class="dpi-grid">

      <!-- Setup card -->
      <div class="dpi-card">
        <p class="dpi-card-title">1 — Setup</p>

        <div class="dpi-field">
          <label for="dpi-distance">Physical distance you will move the mouse</label>
          <div class="dpi-inline">
            <input class="dpi-input" id="dpi-distance" type="number" min="1" max="100" step="0.5" value="10" aria-label="Distance value">
            <select class="dpi-select" id="dpi-unit" aria-label="Distance unit">
              <option value="cm" selected>cm</option>
              <option value="in">inches</option>
            </select>
          </div>
        </div>

        <div class="dpi-field">
          <label for="dpi-expected">
            Expected DPI <small>(optional — enables deviation &amp; accuracy rating)</small>
          </label>
          <input class="dpi-input full" id="dpi-expected" type="number" min="100" max="32000" step="100" placeholder="e.g. 800" aria-label="Expected DPI">
        </div>

        <!-- Advanced-only options -->
        <div class="dpi-adv-section" id="dpi-adv">
          <div class="dpi-field">
            <label for="dpi-axis">Restrict measurement axis</label>
            <select class="dpi-select" id="dpi-axis" style="width:100%" aria-label="Axis selector">
              <option value="both" selected>Any direction (recommended)</option>
              <option value="x">Horizontal only (X-axis)</option>
              <option value="y">Vertical only (Y-axis)</option>
            </select>
          </div>
        </div>

        <div class="dpi-actions">
          <button class="dpi-btn primary" id="dpi-start">&#9654; Start Measuring</button>
          <button class="dpi-btn ghost"   id="dpi-reset">Reset All</button>
        </div>

        <p style="font-size:.74rem;color:var(--text-muted);margin-top:10px;line-height:1.5">
          <strong>Tip:</strong> Use a ruler on your desk. Mark start &amp; end, then drag through the track area while pressing your mouse button.
          Each drag = one run. Up to 5 runs are averaged automatically.
        </p>
      </div>

      <!-- Track + results card -->
      <div class="dpi-card">
        <p class="dpi-card-title">2 — Track &amp; Results</p>

        <div class="dpi-track" id="dpi-track" aria-label="DPI tracking area — click and drag here">
          <span id="dpi-track-msg">Press Start, then drag here</span>
          <div class="dpi-pbar" id="dpi-pbar" style="width:0%"></div>
        </div>

        <div class="dpi-stats">
          <div class="dpi-stat">
            <span class="dpi-stat-label">Pixels moved</span>
            <span class="dpi-stat-value" id="dpi-pixels">0 px</span>
          </div>
          <div class="dpi-stat s-primary" id="dpi-main-stat">
            <span class="dpi-stat-label">Estimated DPI</span>
            <span class="dpi-stat-value" id="dpi-result">--</span>
          </div>
          <div class="dpi-stat" id="dpi-dev-stat" style="display:none">
            <span class="dpi-stat-label">Deviation</span>
            <span class="dpi-stat-value" id="dpi-dev">--</span>
          </div>
          <div class="dpi-stat" id="dpi-acc-stat" style="display:none">
            <span class="dpi-stat-label">Accuracy</span>
            <span class="dpi-stat-value" id="dpi-acc">--</span>
          </div>
        </div>

        <!-- Run history -->
        <div class="dpi-runs" id="dpi-runs" style="display:none" aria-live="polite">
          <p class="dpi-runs-lbl">Run history (drag to add more)</p>
          <div class="dpi-chip-row" id="dpi-chips"></div>
        </div>
      </div>

    </div><!-- /dpi-grid -->

    <p class="dpi-privacy">&#128274; This test runs entirely in your browser — no data is collected or transmitted.</p>

    <!-- ── Session Log ──────────────────────────────────────────── -->
    <div class="dpi-log-section" id="dpi-log-section">
      <div class="dpi-log-header">
        <p class="dpi-card-title" style="margin:0">Session Log</p>
        <button class="dpi-btn ghost" id="dpi-log-download" style="font-size:.74rem;padding:5px 12px" disabled>&#11015; Download Log (.txt)</button>
      </div>
      <div class="dpi-log-box" id="dpi-log-box">
        <p class="dpi-log-empty" id="dpi-log-empty">No runs recorded yet. Complete a DPI test to start logging.</p>
        <div id="dpi-log-entries"></div>
      </div>
    </div>

  </div>

  <!-- ── Tab 2: eDPI Calculator ──────────────────────────────── -->
  <div class="dpi-panel" id="dpi-p-edpi" role="tabpanel">
    <div class="dpi-grid">

      <div class="dpi-card">
        <p class="dpi-card-title">Your Settings</p>

        <div class="dpi-field">
          <label for="edpi-dpi">Mouse DPI</label>
          <input class="dpi-input full" id="edpi-dpi" type="number" min="100" max="32000" step="100" value="800" placeholder="e.g. 800">
        </div>
        <div class="dpi-field">
          <label for="edpi-sens">In-game sensitivity</label>
          <input class="dpi-input full" id="edpi-sens" type="number" min="0.01" max="100" step="0.01" value="1.5" placeholder="e.g. 1.5">
        </div>
        <div class="dpi-field">
          <label for="edpi-game">Game (for pro comparison)</label>
          <select class="dpi-select" id="edpi-game" style="width:100%">
            <option value="">— Any / Custom —</option>
            <option value="cs2">CS2 / CS:GO</option>
            <option value="valorant">Valorant</option>
            <option value="apex">Apex Legends</option>
            <option value="fortnite">Fortnite</option>
            <option value="overwatch">Overwatch 2</option>
          </select>
        </div>

        <div class="dpi-result-big" id="edpi-result-box">
          <div class="val" id="edpi-val">1200</div>
          <div class="lbl">eDPI — Effective DPI</div>
        </div>
        <p class="dpi-tip">
          <strong>Formula:</strong> eDPI = Mouse DPI &times; In-game Sensitivity<br>
          eDPI lets you compare sensitivity fairly across different DPI settings and games.
        </p>
      </div>

      <div class="dpi-card">
        <p class="dpi-card-title">Pro Range Comparison</p>
        <p class="dpi-tip" style="margin-bottom:10px">Your eDPI is highlighted in the table below.</p>
        <table class="dpi-pro-table" aria-label="eDPI range comparison">
          <thead>
            <tr><th>eDPI Range</th><th>Level</th><th>Common for</th></tr>
          </thead>
          <tbody id="edpi-tbody">
            <tr data-min="0"    data-max="400">   <td>200 – 400</td>  <td>Ultra Low</td>  <td>Pro FPS (S1mple, sh1ro)</td></tr>
            <tr data-min="400"  data-max="800">   <td>400 – 800</td>  <td>Low</td>        <td>Competitive FPS / Valorant pros</td></tr>
            <tr data-min="800"  data-max="1600">  <td>800 – 1600</td> <td>Medium</td>     <td>General gaming, casual FPS</td></tr>
            <tr data-min="1600" data-max="3200">  <td>1600 – 3200</td><td>High</td>       <td>MOBA / RTS players</td></tr>
            <tr data-min="3200" data-max="999999"><td>3200+</td>       <td>Very High</td>  <td>Office, design, casual</td></tr>
          </tbody>
        </table>
        <p style="font-size:.7rem;color:var(--text-muted);margin-top:8px">
          Most pro FPS players use 200–800 eDPI for maximum precision.
        </p>
      </div>

    </div>
    <p class="dpi-privacy">&#128274; All calculations happen locally in your browser.</p>
  </div>

  <!-- ── Tab 3: Sensitivity Converter ────────────────────────── -->
  <div class="dpi-panel" id="dpi-p-conv" role="tabpanel">
    <div class="dpi-grid">

      <div class="dpi-card">
        <p class="dpi-card-title">Current Setup</p>
        <div class="dpi-field">
          <label for="conv-old-dpi">Current DPI</label>
          <input class="dpi-input full" id="conv-old-dpi" type="number" min="100" max="32000" step="100" value="400" placeholder="e.g. 400">
        </div>
        <div class="dpi-field">
          <label for="conv-old-sens">Current in-game sensitivity</label>
          <input class="dpi-input full" id="conv-old-sens" type="number" min="0.01" max="100" step="0.01" value="2.0" placeholder="e.g. 2.0">
        </div>

        <p class="dpi-card-title" style="margin-top:14px">Target Setup</p>
        <div class="dpi-field">
          <label for="conv-new-dpi">New DPI (after changing mouse)</label>
          <input class="dpi-input full" id="conv-new-dpi" type="number" min="100" max="32000" step="100" value="800" placeholder="e.g. 800">
        </div>

        <div class="dpi-conv-result" id="conv-result-box">
          <p class="dpi-conv-formula" id="conv-formula">new_sens = (400 &times; 2.0) / 800</p>
          <div class="dpi-conv-val" id="conv-val">1.0000</div>
          <p class="dpi-conv-sub">New sensitivity — same muscle memory, different DPI</p>
        </div>
      </div>

      <div class="dpi-card">
        <p class="dpi-card-title">How It Works</p>
        <p class="dpi-tip">
          The converter keeps your <strong>eDPI constant</strong>, so the same physical arm/wrist movement always moves your in-game view the same distance — even after you change DPI.
        </p>
        <div class="dpi-code-block">new_sens = (old_DPI &times; old_sens) / new_DPI</div>
        <p class="dpi-tip" style="margin-top:10px">
          <strong>Example:</strong> 400 DPI at 2.0 sens → 800 DPI at 1.0 sens.<br>
          Both have eDPI = 800. Your aim feels identical.
        </p>
        <p class="dpi-tip" style="margin-top:10px">
          <strong>When to use this:</strong><br>
          &bull; Switching to a new mouse with a different DPI<br>
          &bull; Matching a pro player's feel at your DPI<br>
          &bull; Cross-game consistency (same cm/360°)
        </p>
        <p class="dpi-tip" style="margin-top:10px;color:var(--text-muted)">
          <em>Note: This keeps eDPI equal. In-game sens multipliers vary per game — verify the feel with the DPI Test tab after adjusting.</em>
        </p>
      </div>

    </div>
    <p class="dpi-privacy">&#128274; All calculations happen locally in your browser.</p>
  </div>

</div><!-- /dpi-v2 -->

<script>
(function () {
'use strict';

/* ── Tab switcher ──────────────────────────────────────────── */
var tabBtns   = document.querySelectorAll('.dpi-tab-btn');
var tabPanels = document.querySelectorAll('.dpi-panel');
tabBtns.forEach(function (btn) {
  btn.addEventListener('click', function () {
    tabBtns.forEach(function (b) { b.classList.remove('active'); b.setAttribute('aria-selected','false'); });
    tabPanels.forEach(function (p) { p.classList.remove('active'); });
    btn.classList.add('active');
    btn.setAttribute('aria-selected','true');
    var panel = document.getElementById(btn.dataset.panel);
    if (panel) panel.classList.add('active');
  });
});

/* ── Mode toggle (Basic / Advanced) ──────────────────────── */
var modeBtns = document.querySelectorAll('.dpi-mode-btn');
var advSec   = document.getElementById('dpi-adv');
modeBtns.forEach(function (btn) {
  btn.addEventListener('click', function () {
    modeBtns.forEach(function (b) { b.classList.remove('active'); });
    btn.classList.add('active');
    if (advSec) advSec.classList.toggle('shown', btn.dataset.mode === 'advanced');
  });
});

/* ── DPI Test ─────────────────────────────────────────────── */
var distEl    = document.getElementById('dpi-distance');
var unitEl    = document.getElementById('dpi-unit');
var expEl     = document.getElementById('dpi-expected');
var axisEl    = document.getElementById('dpi-axis');
var startBtn  = document.getElementById('dpi-start');
var resetBtn  = document.getElementById('dpi-reset');
var track     = document.getElementById('dpi-track');
var trackMsg  = document.getElementById('dpi-track-msg');
var pbar      = document.getElementById('dpi-pbar');
var pixelsEl  = document.getElementById('dpi-pixels');
var resultEl  = document.getElementById('dpi-result');
var devStat   = document.getElementById('dpi-dev-stat');
var devEl     = document.getElementById('dpi-dev');
var accStat   = document.getElementById('dpi-acc-stat');
var accEl     = document.getElementById('dpi-acc');
var runsEl    = document.getElementById('dpi-runs');
var chipsEl   = document.getElementById('dpi-chips');

var active   = false;
var tracking = false;
var totalPx  = 0;
var lastX    = 0;
var lastY    = 0;
var runs     = [];
var MAX_RUNS = 5;

function getAxis()   { return axisEl ? axisEl.value : 'both'; }
function getInches() {
  var d = parseFloat(distEl.value);
  return (!d || d <= 0) ? 0 : (unitEl.value === 'cm' ? d / 2.54 : d);
}
function calcDPI(px) {
  var inches = getInches();
  return inches > 0 ? px / inches : 0;
}
function accuracy(devPct) {
  if (devPct <= 2)  return { label: 'Excellent ✓', cls: 's-good' };
  if (devPct <= 5)  return { label: 'Good ✓',      cls: 's-good' };
  if (devPct <= 10) return { label: 'Fair',         cls: 's-warn' };
  return                   { label: 'Poor',         cls: 's-bad'  };
}

function refreshDisplay() {
  pixelsEl.textContent = Math.round(totalPx) + ' px';
  var dpi = calcDPI(totalPx);
  resultEl.textContent = dpi ? Math.round(dpi) + ' DPI' : '--';

  var exp = parseFloat(expEl.value);
  if (dpi && exp > 0) {
    var devPct = Math.abs((dpi - exp) / exp * 100);
    var sign   = dpi >= exp ? '+' : '-';
    devEl.textContent = sign + devPct.toFixed(1) + '%';
    var rate = accuracy(devPct);
    accEl.textContent = rate.label;
    accStat.className = 'dpi-stat ' + rate.cls;
    devStat.style.display = 'block';
    accStat.style.display = 'block';
  } else {
    devStat.style.display = 'none';
    accStat.style.display = 'none';
  }

  /* progress bar: estimate based on expected DPI; fallback 800 */
  var expDpi = parseFloat(expEl.value) || 800;
  var inches = getInches() || 4;
  var target = expDpi * inches;
  pbar.style.width = Math.min(100, (totalPx / target) * 100) + '%';
}

function renderChips() {
  chipsEl.innerHTML = '';
  var sum = 0;
  runs.forEach(function (r, i) {
    var chip = document.createElement('span');
    chip.className = 'dpi-chip';
    chip.textContent = 'Run ' + (i + 1) + ': ' + Math.round(r) + ' DPI';
    chipsEl.appendChild(chip);
    sum += r;
  });
  if (runs.length > 1) {
    var avg = document.createElement('span');
    avg.className = 'dpi-chip c-avg';
    avg.textContent = 'Avg: ' + Math.round(sum / runs.length) + ' DPI';
    chipsEl.appendChild(avg);
  }
  runsEl.style.display = runs.length ? 'block' : 'none';
}

function setActive(on) {
  active = on;
  if (on) {
    startBtn.textContent = '⏺ Measuring…';
    startBtn.classList.add('measuring');
    startBtn.disabled = true;
    track.classList.add('t-ready');
    track.classList.remove('t-active');
    trackMsg.textContent = 'Hold mouse button + drag across your measured distance';
  } else {
    startBtn.textContent = '▶ Start Measuring';
    startBtn.classList.remove('measuring');
    startBtn.disabled = false;
    track.classList.remove('t-ready', 't-active');
    trackMsg.textContent = 'Press Start, then drag here';
    pbar.style.width = '0%';
  }
}

startBtn.addEventListener('click', function () {
  if (runs.length >= MAX_RUNS) runs = [];
  totalPx = 0;
  refreshDisplay();
  setActive(true);
});

resetBtn.addEventListener('click', function () {
  tracking = false; totalPx = 0; runs = [];
  refreshDisplay(); renderChips(); setActive(false);
  devStat.style.display = 'none'; accStat.style.display = 'none';
});

track.addEventListener('pointerdown', function (e) {
  if (!active) return;
  tracking = true; totalPx = 0;
  lastX = e.clientX; lastY = e.clientY;
  track.setPointerCapture(e.pointerId);
  track.classList.add('t-active');
  refreshDisplay();
});

track.addEventListener('pointermove', function (e) {
  if (!tracking) return;
  var dx = e.clientX - lastX;
  var dy = e.clientY - lastY;
  var axis = getAxis();
  var delta = axis === 'x' ? Math.abs(dx) : axis === 'y' ? Math.abs(dy) : Math.hypot(dx, dy);
  totalPx += delta;
  lastX = e.clientX; lastY = e.clientY;
  refreshDisplay();
});

function endDrag() {
  if (!tracking) return;
  tracking = false;
  track.classList.remove('t-active');
  var dpi = calcDPI(totalPx);
  if (dpi > 0) {
    runs.push(dpi);
    renderChips();
    addLogEntry(dpi, runs.length);
    if (runs.length < MAX_RUNS) {
      totalPx = 0;
      refreshDisplay();
      trackMsg.textContent = 'Run ' + (runs.length + 1) + ' of ' + MAX_RUNS + ' — drag again ↔';
    } else {
      setActive(false);
      trackMsg.textContent = 'All runs done — see average above';
    }
  }
}
track.addEventListener('pointerup',          endDrag);
track.addEventListener('lostpointercapture', endDrag);

distEl.addEventListener('input',  refreshDisplay);
unitEl.addEventListener('change', refreshDisplay);
expEl.addEventListener('input',   refreshDisplay);

/* ── eDPI Calculator ───────────────────────────────────────── */
var edpiDpiEl  = document.getElementById('edpi-dpi');
var edpiSensEl = document.getElementById('edpi-sens');
var edpiValEl  = document.getElementById('edpi-val');
var edpiTbody  = document.getElementById('edpi-tbody');

function updateEdpi() {
  var dpi  = parseFloat(edpiDpiEl.value)  || 0;
  var sens = parseFloat(edpiSensEl.value) || 0;
  var edpi = dpi * sens;
  edpiValEl.textContent = edpi > 0 ? Math.round(edpi) : '--';
  if (edpiTbody) {
    Array.from(edpiTbody.rows).forEach(function (row) {
      var min = parseFloat(row.dataset.min);
      var max = parseFloat(row.dataset.max);
      row.classList.toggle('t-match', edpi >= min && edpi < max);
    });
  }
}
if (edpiDpiEl)  edpiDpiEl.addEventListener('input',  updateEdpi);
if (edpiSensEl) edpiSensEl.addEventListener('input',  updateEdpi);
updateEdpi();

/* ── Sensitivity Converter ─────────────────────────────────── */
var cOldDpi  = document.getElementById('conv-old-dpi');
var cOldSens = document.getElementById('conv-old-sens');
var cNewDpi  = document.getElementById('conv-new-dpi');
var cFormula = document.getElementById('conv-formula');
var cVal     = document.getElementById('conv-val');

function updateConv() {
  var od = parseFloat(cOldDpi.value)  || 0;
  var os = parseFloat(cOldSens.value) || 0;
  var nd = parseFloat(cNewDpi.value)  || 0;
  if (od && os && nd) {
    cFormula.innerHTML = 'new_sens = (' + od + ' &times; ' + os + ') / ' + nd;
    cVal.textContent   = ((od * os) / nd).toFixed(4);
  } else {
    cVal.textContent = '--';
  }
}
if (cOldDpi)  cOldDpi.addEventListener('input',  updateConv);
if (cOldSens) cOldSens.addEventListener('input',  updateConv);
if (cNewDpi)  cNewDpi.addEventListener('input',   updateConv);
updateConv();

/* ── Session Log ─────────────────────────────────────────────── */
var logData        = [];
var logEntriesEl   = document.getElementById('dpi-log-entries');
var logEmptyEl     = document.getElementById('dpi-log-empty');
var logDlBtn       = document.getElementById('dpi-log-download');

function lpad(n) { return (n < 10 ? '0' : '') + n; }
function nowStr() {
  var d = new Date();
  return lpad(d.getHours()) + ':' + lpad(d.getMinutes()) + ':' + lpad(d.getSeconds());
}

function addLogEntry(dpi, runNum) {
  var ts   = nowStr();
  var dist = parseFloat(distEl.value) || 0;
  var unit = unitEl ? unitEl.value : 'cm';
  var exp  = parseFloat(expEl.value) || 0;
  var devStr = '', devCls = '';
  if (exp > 0) {
    var devPct = Math.abs((dpi - exp) / exp * 100);
    var sign   = dpi >= exp ? '+' : '-';
    devStr = sign + devPct.toFixed(1) + '%';
    devCls = devPct <= 5 ? 'dpi-log-good' : devPct <= 10 ? 'dpi-log-warn' : 'dpi-log-bad';
  }
  var entry = { ts: ts, run: runNum, dpi: Math.round(dpi), dist: dist, unit: unit,
                exp: exp > 0 ? exp + ' DPI' : 'N/A', devStr: devStr, devCls: devCls };
  logData.push(entry);

  var row = document.createElement('div');
  row.className = 'dpi-log-entry';
  var devPart = devStr ? ' | Dev: <span class="' + devCls + '">' + devStr + '</span>' : '';
  row.innerHTML = '<span class="dpi-log-ts">[' + ts + ']</span> ' +
    'Run #' + runNum + ' &#8212; ' +
    '<span class="dpi-log-dpi">' + entry.dpi + ' DPI</span>' +
    ' | ' + dist + '\u202f' + unit +
    ' | Expected: ' + entry.exp +
    devPart;
  logEntriesEl.appendChild(row);
  var box = document.getElementById('dpi-log-box');
  if (box) box.scrollTop = box.scrollHeight;

  if (logEmptyEl) logEmptyEl.style.display = 'none';
  if (logDlBtn)   logDlBtn.disabled = false;
}

if (logDlBtn) {
  logDlBtn.addEventListener('click', function () {
    var lines = [
      'KeyboardTester.click \u2014 Mouse DPI Session Log',
      'URL: https://keyboardtester.click/mouse_sensitivity_DPI_tester.php',
      'Generated: ' + new Date().toLocaleString(),
      '',
      '--- RUNS ---'
    ];
    logData.forEach(function (e) {
      lines.push('[' + e.ts + '] Run #' + e.run +
        ' \u2014 ' + e.dpi + ' DPI' +
        ' | Distance: ' + e.dist + ' ' + e.unit +
        ' | Expected: ' + e.exp +
        (e.devStr ? ' | Deviation: ' + e.devStr : ''));
    });
    lines.push('', '--- END OF LOG ---');
    var blob = new Blob([lines.join('\r\n')], { type: 'text/plain' });
    var url  = URL.createObjectURL(blob);
    var a    = document.createElement('a');
    a.href = url;
    a.download = 'dpi-log-' + new Date().toISOString().slice(0, 10) + '.txt';
    a.click();
    URL.revokeObjectURL(url);
  });
}

})();
</script>
