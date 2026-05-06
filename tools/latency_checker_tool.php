<?php
// Latency Checker tool (standalone)
?>

<div class="kbt-tool kbt-latency-tool" id="latency-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>Input latency test</h3>
      <p>Choose keyboard or mouse mode, start the test, and repeat the same input for a clean comparison.</p>
      <div class="latency-mode-switch" role="group" aria-label="Latency test mode">
        <button type="button" class="latency-mode is-active" data-latency-mode="keyboard">Keyboard</button>
        <button type="button" class="latency-mode" data-latency-mode="mouse">Mouse click</button>
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="latency-start">Start test</button>
        <button class="kbt-tool-button" id="latency-stop" disabled>Stop</button>
        <button class="kbt-tool-button ghost" id="latency-clear">Clear</button>
      </div>
      <div class="kbt-tool-status" id="latency-status">Status: Ready</div>
      <div class="latency-last-input" aria-live="polite">
        <span class="latency-last-label">Last input</span>
        <strong id="latency-last-input">Press Start</strong>
        <small id="latency-last-detail">Keyboard mode is selected.</small>
      </div>
      <div class="latency-click-pad" id="latency-click-pad" hidden>
        <strong>Click here for mouse samples</strong>
        <span>Use left, middle, or right click inside this pad.</span>
      </div>
      <div class="latency-target-row">
        <label for="latency-target">Target samples</label>
        <select id="latency-target" class="kbt-tool-select">
          <option value="10">10</option>
          <option value="20" selected>20</option>
          <option value="50">50</option>
        </select>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>Results</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>Current</span><strong id="latency-current">-- ms</strong></div>
        <div class="kbt-tool-stat"><span>Average</span><strong id="latency-avg">-- ms</strong></div>
        <div class="kbt-tool-stat"><span>Best</span><strong id="latency-min">-- ms</strong></div>
        <div class="kbt-tool-stat"><span>Worst</span><strong id="latency-max">-- ms</strong></div>
        <div class="kbt-tool-stat"><span>Jitter</span><strong id="latency-jitter">-- ms</strong></div>
        <div class="kbt-tool-stat"><span>Consistency</span><strong id="latency-consistency">--</strong></div>
        <div class="kbt-tool-stat"><span>Samples</span><strong id="latency-count">0</strong></div>
      </div>
      <div class="latency-progress" aria-label="Sample progress">
        <span id="latency-progress-label">0 / 20 samples</span>
        <div class="latency-progress-track"><span id="latency-progress-fill"></span></div>
      </div>
      <div class="latency-bars" id="latency-bars" aria-label="Latency sample graph"></div>
      <div class="kbt-tool-log" id="latency-log">Press Start and then press keys to capture samples.</div>
    </div>
  </div>

  <div class="latency-quick-tools" aria-labelledby="latency-quick-tools-title">
    <div>
      <p class="section-kicker">Related input checks</p>
      <h3 id="latency-quick-tools-title">Test the rest of your input chain</h3>
    </div>
    <div class="latency-quick-grid">
      <button type="button" class="latency-quick-card" data-latency-mode-jump="mouse">
        <strong>Mouse Click Latency</strong>
        <span>Switch this tester to mouse-click input delay.</span>
      </button>
      <a class="latency-quick-card" href="<?php echo url('mouse-test.php'); ?>">
        <strong>Mouse Tester</strong>
        <span>Check left, middle, right, and scroll input.</span>
      </a>
      <a class="latency-quick-card" href="<?php echo url('polling-rate-test.php'); ?>">
        <strong>Mouse Polling Rate</strong>
        <span>Measure live mouse Hz for 125, 500, or 1000 Hz checks.</span>
      </a>
      <a class="latency-quick-card" href="<?php echo url('reaction-time-test.php'); ?>">
        <strong>Reaction Time Test</strong>
        <span>Separate human reflex delay from device delay.</span>
      </a>
    </div>
  </div>
</div>

<style>
.kbt-latency-tool .latency-mode-switch {
  display: inline-flex;
  gap: 0.35rem;
  padding: 0.25rem;
  margin: 0.6rem 0 0.85rem;
  border: 1px solid var(--landing-border);
  border-radius: 999px;
  background: rgba(15, 23, 42, 0.05);
}

.kbt-latency-tool .latency-mode {
  border: 0;
  border-radius: 999px;
  padding: 0.5rem 0.85rem;
  background: transparent;
  color: var(--landing-muted);
  font-weight: 800;
  cursor: pointer;
}

.kbt-latency-tool .latency-mode.is-active {
  background: var(--landing-accent);
  color: #08111f;
}

.latency-last-input {
  display: grid;
  gap: 0.35rem;
  min-height: 158px;
  margin-top: 1rem;
  padding: 1rem;
  border: 1px solid rgba(14, 165, 233, 0.22);
  border-radius: 16px;
  background: linear-gradient(135deg, rgba(14, 165, 233, 0.12), rgba(16, 185, 129, 0.08));
}

.latency-last-label,
.latency-last-input small,
.latency-target-row label,
.latency-progress span {
  color: var(--landing-muted);
  font-weight: 700;
}

.latency-last-input strong {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 74px;
  padding: 0.5rem 0.75rem;
  border-radius: 14px;
  border: 1px solid rgba(15, 23, 42, 0.14);
  background: rgba(255, 255, 255, 0.72);
  color: var(--landing-ink);
  font-family: 'JetBrains Mono', Consolas, monospace;
  font-size: clamp(1.35rem, 4vw, 2.75rem);
  line-height: 1;
  overflow-wrap: anywhere;
}

.latency-click-pad {
  display: grid;
  place-items: center;
  gap: 0.35rem;
  min-height: 132px;
  margin-top: 1rem;
  border: 2px dashed rgba(14, 165, 233, 0.45);
  border-radius: 16px;
  background: rgba(14, 165, 233, 0.07);
  color: var(--landing-ink);
  text-align: center;
  cursor: crosshair;
  user-select: none;
}

.latency-click-pad span {
  color: var(--landing-muted);
  font-size: 0.95rem;
}

.latency-target-row {
  display: grid;
  grid-template-columns: minmax(0, 1fr) 104px;
  align-items: center;
  gap: 0.75rem;
  margin-top: 1rem;
}

.latency-progress {
  display: grid;
  gap: 0.45rem;
  margin-top: 1rem;
}

.latency-progress-track {
  height: 10px;
  overflow: hidden;
  border-radius: 999px;
  background: rgba(15, 23, 42, 0.09);
}

.latency-progress-track span {
  display: block;
  width: 0%;
  height: 100%;
  border-radius: inherit;
  background: linear-gradient(90deg, var(--landing-accent), var(--landing-accent-2));
  transition: width 0.18s ease;
}

.latency-bars {
  display: flex;
  align-items: end;
  gap: 0.28rem;
  min-height: 72px;
  margin-top: 1rem;
  padding: 0.6rem;
  border: 1px solid var(--landing-border);
  border-radius: 14px;
  background: rgba(15, 23, 42, 0.035);
}

.latency-bars span {
  flex: 1 1 8px;
  min-width: 5px;
  max-width: 18px;
  height: 8px;
  border-radius: 999px 999px 0 0;
  background: var(--landing-accent);
}

.latency-quick-tools {
  display: grid;
  gap: 1rem;
  padding: 1.25rem 1.4rem;
  border: 1px solid var(--landing-border);
  border-radius: 18px;
  background: rgba(255, 255, 255, 0.72);
  box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
}

.latency-quick-tools h3 {
  margin: 0;
}

.latency-quick-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
  gap: 0.9rem;
}

.latency-quick-card {
  display: grid;
  gap: 0.35rem;
  min-height: 118px;
  padding: 1rem;
  border: 1px solid var(--landing-border);
  border-radius: 14px;
  background: var(--landing-surface);
  color: var(--landing-ink);
  text-align: left;
  text-decoration: none;
  cursor: pointer;
}

.latency-quick-card:hover,
.latency-quick-card:focus-visible {
  border-color: var(--landing-accent);
  background: rgba(14, 165, 233, 0.08);
}

.latency-quick-card span {
  color: var(--landing-muted);
  font-size: 0.92rem;
  line-height: 1.45;
}

html.dark-theme .latency-last-input strong,
[data-theme="dark"] .latency-last-input strong,
html.dark-theme .latency-quick-tools,
[data-theme="dark"] .latency-quick-tools,
html.dark-theme .latency-quick-card,
[data-theme="dark"] .latency-quick-card {
  background: rgba(15, 23, 42, 0.65);
}

@media (max-width: 640px) {
  .latency-target-row {
    grid-template-columns: 1fr;
  }

  .latency-last-input {
    min-height: 136px;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const startBtn = document.getElementById('latency-start');
  const stopBtn = document.getElementById('latency-stop');
  const clearBtn = document.getElementById('latency-clear');
  const statusEl = document.getElementById('latency-status');
  const currentEl = document.getElementById('latency-current');
  const avgEl = document.getElementById('latency-avg');
  const minEl = document.getElementById('latency-min');
  const maxEl = document.getElementById('latency-max');
  const jitterEl = document.getElementById('latency-jitter');
  const consistencyEl = document.getElementById('latency-consistency');
  const countEl = document.getElementById('latency-count');
  const logEl = document.getElementById('latency-log');
  const lastInputEl = document.getElementById('latency-last-input');
  const lastDetailEl = document.getElementById('latency-last-detail');
  const clickPad = document.getElementById('latency-click-pad');
  const modeBtns = Array.from(document.querySelectorAll('[data-latency-mode]'));
  const modeJumpBtns = Array.from(document.querySelectorAll('[data-latency-mode-jump]'));
  const targetSelect = document.getElementById('latency-target');
  const progressLabel = document.getElementById('latency-progress-label');
  const progressFill = document.getElementById('latency-progress-fill');
  const barsEl = document.getElementById('latency-bars');

  if (!startBtn || !stopBtn || !clearBtn) return;

  let active = false;
  let samples = [];
  let mode = 'keyboard';

  function getTargetCount() {
    const value = Number.parseInt(targetSelect.value, 10);
    return Number.isFinite(value) ? value : 20;
  }

  function formatInputName(event) {
    if (event.type === 'pointerdown') {
      const names = ['Left click', 'Middle click', 'Right click', 'Button ' + event.button];
      return names[event.button] || `Button ${event.button}`;
    }

    if (event.key === ' ') return 'Space';
    if (event.key && event.key.length === 1) return event.key.toUpperCase();
    return event.code || event.key || 'Key';
  }

  function inputDetail(event, latency) {
    if (event.type === 'pointerdown') {
      return `${event.pointerType || 'mouse'} input - ${latency.toFixed(2)} ms`;
    }
    return `${event.code || event.key || 'Keyboard'} - ${latency.toFixed(2)} ms`;
  }

  function setMode(nextMode) {
    const normalizedMode = nextMode === 'mouse' ? 'mouse' : 'keyboard';
    const changed = normalizedMode !== mode;
    mode = normalizedMode;
    modeBtns.forEach((btn) => {
      btn.classList.toggle('is-active', btn.dataset.latencyMode === mode);
    });
    clickPad.hidden = mode !== 'mouse';
    if (changed) {
      samples = [];
      currentEl.textContent = '-- ms';
      updateStats();
    }
    statusEl.textContent = active
      ? `Status: Testing ${mode === 'mouse' ? 'mouse clicks' : 'keyboard keys'}`
      : 'Status: Ready';
    lastInputEl.textContent = active ? 'Waiting...' : 'Press Start';
    lastDetailEl.textContent = mode === 'mouse'
      ? 'Mouse click mode is selected.'
      : 'Keyboard mode is selected.';
    logEl.textContent = active
      ? mode === 'mouse' ? 'Click inside the mouse pad to capture samples.' : 'Press keys to capture samples.'
      : 'Press Start and then capture samples.';
  }

  function updateStats(value) {
    if (typeof value === 'number') {
      currentEl.textContent = `${value.toFixed(2)} ms`;
    }
    if (samples.length === 0) {
      avgEl.textContent = '-- ms';
      minEl.textContent = '-- ms';
      maxEl.textContent = '-- ms';
      jitterEl.textContent = '-- ms';
      consistencyEl.textContent = '--';
      countEl.textContent = '0';
      progressLabel.textContent = `0 / ${getTargetCount()} samples`;
      progressFill.style.width = '0%';
      barsEl.textContent = '';
      return;
    }
    const avg = samples.reduce((a, b) => a + b, 0) / samples.length;
    const variance = samples.reduce((sum, item) => sum + Math.pow(item - avg, 2), 0) / samples.length;
    const jitter = Math.sqrt(variance);
    const spread = Math.max(...samples) - Math.min(...samples);
    const consistency = jitter <= 1 ? 'Excellent' : jitter <= 3 ? 'Good' : jitter <= 8 ? 'Variable' : 'Noisy';
    const target = getTargetCount();

    avgEl.textContent = `${avg.toFixed(2)} ms`;
    minEl.textContent = `${Math.min(...samples).toFixed(2)} ms`;
    maxEl.textContent = `${Math.max(...samples).toFixed(2)} ms`;
    jitterEl.textContent = `${jitter.toFixed(2)} ms`;
    consistencyEl.textContent = consistency;
    countEl.textContent = samples.length;
    progressLabel.textContent = `${Math.min(samples.length, target)} / ${target} samples`;
    progressFill.style.width = `${Math.min(samples.length / target, 1) * 100}%`;
    renderBars(spread);
  }

  function renderBars(spread) {
    const recent = samples.slice(-24);
    const max = Math.max(...recent, 1);
    barsEl.textContent = '';
    recent.forEach((sample) => {
      const bar = document.createElement('span');
      bar.style.height = `${Math.max(8, (sample / max) * 60)}px`;
      bar.title = `${sample.toFixed(2)} ms`;
      if (spread > 8 && sample === Math.max(...samples)) {
        bar.style.background = '#ef4444';
      }
      barsEl.appendChild(bar);
    });
  }

  function addLog(text) {
    if (samples.length === 1) {
      logEl.textContent = '';
    }
    const entry = document.createElement('div');
    entry.textContent = text;
    logEl.prepend(entry);
    while (logEl.children.length > 10) {
      logEl.removeChild(logEl.lastChild);
    }
  }

  function recordEvent(event) {
    if (!active) return;
    const now = performance.now();
    let latency = now - event.timeStamp;
    if (!Number.isFinite(latency)) {
      latency = 0;
    }
    latency = Math.max(0, latency);
    samples.push(latency);
    updateStats(latency);
    const name = formatInputName(event);
    lastInputEl.textContent = name;
    lastDetailEl.textContent = inputDetail(event, latency);
    addLog(`${name}: ${latency.toFixed(2)} ms`);
  }

  function handleKey(event) {
    if (mode !== 'keyboard') return;
    recordEvent(event);
  }

  function handlePointer(event) {
    if (mode !== 'mouse') return;
    event.preventDefault();
    recordEvent(event);
  }

  startBtn.addEventListener('click', function () {
    active = true;
    statusEl.textContent = mode === 'mouse' ? 'Status: Testing mouse clicks' : 'Status: Testing keyboard keys';
    lastInputEl.textContent = 'Waiting...';
    lastDetailEl.textContent = mode === 'mouse' ? 'Click inside the mouse pad.' : 'Press any key.';
    startBtn.disabled = true;
    stopBtn.disabled = false;
    logEl.textContent = mode === 'mouse' ? 'Click inside the mouse pad to capture samples.' : 'Press keys to capture samples.';
  });

  stopBtn.addEventListener('click', function () {
    active = false;
    statusEl.textContent = 'Status: Stopped';
    startBtn.disabled = false;
    stopBtn.disabled = true;
  });

  clearBtn.addEventListener('click', function () {
    samples = [];
    updateStats();
    currentEl.textContent = '-- ms';
    lastInputEl.textContent = active ? 'Waiting...' : 'Press Start';
    lastDetailEl.textContent = mode === 'mouse' ? 'Mouse click mode is selected.' : 'Keyboard mode is selected.';
    logEl.textContent = mode === 'mouse'
      ? 'Press Start and then click inside the mouse pad to capture samples.'
      : 'Press Start and then press keys to capture samples.';
  });

  modeBtns.forEach((btn) => {
    btn.addEventListener('click', function () {
      setMode(btn.dataset.latencyMode);
    });
  });

  modeJumpBtns.forEach((btn) => {
    btn.addEventListener('click', function () {
      setMode(btn.dataset.latencyModeJump);
      document.getElementById('latency-checker').scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });

  targetSelect.addEventListener('change', function () {
    updateStats();
  });

  document.addEventListener('keydown', handleKey);
  clickPad.addEventListener('pointerdown', handlePointer);
  clickPad.addEventListener('contextmenu', function (event) {
    event.preventDefault();
  });
  setMode('keyboard');
  updateStats();
});
</script>
