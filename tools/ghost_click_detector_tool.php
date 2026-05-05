<?php
// Ghost Click Detector tool (standalone)
?>

<div class="kbt-tool kbt-ghost-tool" id="ghost-click-tool">
  <style>
    .kbt-ghost-tool {
      --ghost-ink: #0f172a;
      --ghost-muted: #64748b;
      --ghost-line: #dbe4f0;
      --ghost-soft: #f8fafc;
      --ghost-panel: #ffffff;
      --ghost-accent: #0ea5e9;
      --ghost-good: #16a34a;
      --ghost-warn: #d97706;
      --ghost-bad: #dc2626;
      color: var(--ghost-ink);
    }

    .kbt-ghost-tool .ghost-intro {
      display: grid;
      grid-template-columns: minmax(0, 1fr) auto;
      gap: 18px;
      align-items: center;
      padding: 18px;
      margin-bottom: 18px;
      border: 1px solid var(--ghost-line);
      border-radius: 18px;
      background: linear-gradient(135deg, #f8fafc, #eef8ff);
    }

    .kbt-ghost-tool .ghost-intro h3,
    .kbt-ghost-tool .ghost-card-title h3 {
      margin: 0;
      font-size: clamp(1.15rem, 2vw, 1.45rem);
      color: var(--ghost-ink);
    }

    .kbt-ghost-tool .ghost-intro p,
    .kbt-ghost-tool .ghost-card-title p,
    .kbt-ghost-tool .ghost-note {
      margin: 8px 0 0;
      color: var(--ghost-muted);
      line-height: 1.6;
    }

    .kbt-ghost-tool .ghost-status-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 14px;
      border-radius: 999px;
      border: 1px solid rgba(14, 165, 233, 0.25);
      background: #e0f2fe;
      color: #075985;
      font-weight: 800;
      white-space: nowrap;
    }

    .kbt-ghost-tool .ghost-test-grid {
      display: grid;
      grid-template-columns: minmax(0, 1.15fr) minmax(320px, 0.85fr);
      gap: 18px;
    }

    .kbt-ghost-tool .ghost-card {
      border: 1px solid var(--ghost-line);
      border-radius: 18px;
      background: var(--ghost-panel);
      padding: 20px;
      box-shadow: 0 18px 45px rgba(15, 23, 42, 0.07);
    }

    .kbt-ghost-tool .ghost-card-title {
      display: flex;
      justify-content: space-between;
      gap: 16px;
      align-items: flex-start;
      margin-bottom: 18px;
    }

    .kbt-ghost-tool .ghost-control-grid {
      display: grid;
      grid-template-columns: repeat(3, minmax(0, 1fr));
      gap: 12px;
      margin-bottom: 16px;
    }

    .kbt-ghost-tool .ghost-control {
      display: grid;
      gap: 7px;
      font-size: 0.82rem;
      font-weight: 800;
      letter-spacing: 0.04em;
      text-transform: uppercase;
      color: #475569;
    }

    .kbt-ghost-tool .ghost-control select,
    .kbt-ghost-tool .ghost-control input {
      min-height: 44px;
      width: 100%;
      border: 1px solid #cbd5e1;
      border-radius: 12px;
      background: #fff;
      color: var(--ghost-ink);
      font: inherit;
      font-weight: 700;
      text-transform: none;
      letter-spacing: 0;
      padding: 0 12px;
      outline: none;
    }

    .kbt-ghost-tool .ghost-control select:focus,
    .kbt-ghost-tool .ghost-control input:focus,
    .kbt-ghost-tool .ghost-click-area:focus-visible {
      border-color: var(--ghost-accent);
      box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.18);
    }

    .kbt-ghost-tool .ghost-click-area {
      min-height: 240px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 10px;
      border: 2px dashed #9cc7f2;
      border-radius: 22px;
      background:
        radial-gradient(circle at top left, rgba(14, 165, 233, 0.16), transparent 34%),
        linear-gradient(135deg, #eff6ff, #ffffff);
      cursor: pointer;
      user-select: none;
      text-align: center;
      transition: border-color 160ms ease, transform 160ms ease, background 160ms ease;
    }

    .kbt-ghost-tool .ghost-click-area:hover {
      border-color: var(--ghost-accent);
      transform: translateY(-1px);
    }

    .kbt-ghost-tool .ghost-click-area.is-active {
      border-color: var(--ghost-good);
      background:
        radial-gradient(circle at top left, rgba(34, 197, 94, 0.16), transparent 34%),
        linear-gradient(135deg, #f0fdf4, #ffffff);
    }

    .kbt-ghost-tool .ghost-click-area.is-warning {
      border-color: var(--ghost-bad);
      background:
        radial-gradient(circle at top left, rgba(220, 38, 38, 0.16), transparent 34%),
        linear-gradient(135deg, #fff1f2, #ffffff);
    }

    .kbt-ghost-tool .ghost-area-title {
      display: block;
      font-size: clamp(1.25rem, 2.6vw, 2.1rem);
      font-weight: 900;
      color: var(--ghost-ink);
    }

    .kbt-ghost-tool .ghost-area-subtitle {
      display: block;
      max-width: 520px;
      color: var(--ghost-muted);
      font-weight: 700;
      line-height: 1.55;
    }

    .kbt-ghost-tool .ghost-actions {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-top: 16px;
    }

    .kbt-ghost-tool .ghost-button {
      min-height: 46px;
      border: 1px solid #cbd5e1;
      border-radius: 12px;
      background: #fff;
      color: var(--ghost-ink);
      font-weight: 900;
      padding: 0 18px;
      cursor: pointer;
    }

    .kbt-ghost-tool .ghost-button.primary {
      border-color: #0284c7;
      background: #0284c7;
      color: #fff;
    }

    .kbt-ghost-tool .ghost-button:disabled {
      opacity: 0.55;
      cursor: not-allowed;
    }

    .kbt-ghost-tool .ghost-verdict {
      display: grid;
      gap: 6px;
      padding: 16px;
      border-radius: 16px;
      border: 1px solid var(--ghost-line);
      background: var(--ghost-soft);
      margin-bottom: 16px;
    }

    .kbt-ghost-tool .ghost-verdict strong {
      font-size: 1.15rem;
      color: var(--ghost-ink);
    }

    .kbt-ghost-tool .ghost-verdict span {
      color: var(--ghost-muted);
      line-height: 1.55;
    }

    .kbt-ghost-tool .ghost-verdict.clean {
      border-color: rgba(22, 163, 74, 0.28);
      background: #f0fdf4;
    }

    .kbt-ghost-tool .ghost-verdict.watch {
      border-color: rgba(217, 119, 6, 0.28);
      background: #fffbeb;
    }

    .kbt-ghost-tool .ghost-verdict.bad {
      border-color: rgba(220, 38, 38, 0.3);
      background: #fff1f2;
    }

    .kbt-ghost-tool .ghost-stats {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 10px;
    }

    .kbt-ghost-tool .ghost-stat {
      border: 1px solid var(--ghost-line);
      border-radius: 14px;
      background: #fff;
      padding: 13px;
    }

    .kbt-ghost-tool .ghost-stat span {
      display: block;
      color: var(--ghost-muted);
      font-size: 0.86rem;
      font-weight: 800;
      margin-bottom: 4px;
    }

    .kbt-ghost-tool .ghost-stat strong {
      display: block;
      color: var(--ghost-ink);
      font-size: 1.35rem;
      font-weight: 900;
    }

    .kbt-ghost-tool .ghost-progress {
      height: 10px;
      border-radius: 999px;
      background: #e2e8f0;
      overflow: hidden;
      margin: 16px 0;
    }

    .kbt-ghost-tool .ghost-progress span {
      display: block;
      height: 100%;
      width: 0%;
      border-radius: inherit;
      background: linear-gradient(90deg, #0ea5e9, #22c55e);
      transition: width 160ms ease;
    }

    .kbt-ghost-tool .ghost-log {
      min-height: 166px;
      max-height: 260px;
      overflow: auto;
      border: 1px solid #cbd5e1;
      border-radius: 14px;
      background: #0f172a;
      color: #e2e8f0;
      font-family: "JetBrains Mono", Consolas, monospace;
      font-size: 0.88rem;
      line-height: 1.6;
      padding: 12px;
    }

    .kbt-ghost-tool .ghost-log div {
      padding: 5px 0;
      border-bottom: 1px solid rgba(226, 232, 240, 0.09);
    }

    .kbt-ghost-tool .ghost-log .is-suspicious {
      color: #fecaca;
    }

    .kbt-ghost-tool .ghost-log .is-muted {
      color: #94a3b8;
    }

    @media (max-width: 920px) {
      .kbt-ghost-tool .ghost-intro,
      .kbt-ghost-tool .ghost-test-grid,
      .kbt-ghost-tool .ghost-control-grid {
        grid-template-columns: 1fr;
      }

      .kbt-ghost-tool .ghost-status-pill {
        justify-content: center;
      }
    }

    @media (max-width: 560px) {
      .kbt-ghost-tool .ghost-card {
        padding: 16px;
      }

      .kbt-ghost-tool .ghost-stats {
        grid-template-columns: 1fr;
      }

      .kbt-ghost-tool .ghost-button {
        width: 100%;
      }
    }
  </style>

  <div class="ghost-intro">
    <div>
      <h3>Mouse double-click and ghost click diagnostics</h3>
      <p>Click normally, one deliberate press at a time. The tool logs the intervals your browser receives and flags suspicious rapid repeats that can point to switch bounce or mouse chatter.</p>
    </div>
    <div class="ghost-status-pill" id="ghost-session-status">Ready to test</div>
  </div>

  <div class="ghost-test-grid">
    <section class="ghost-card" aria-labelledby="ghost-input-title">
      <div class="ghost-card-title">
        <div>
          <h3 id="ghost-input-title">Test area</h3>
          <p>For the cleanest result, test one mouse button at a time and avoid intentional double-clicking.</p>
        </div>
      </div>

      <div class="ghost-control-grid" aria-label="Ghost click test settings">
        <label class="ghost-control" for="ghost-button-filter">
          Button
          <select id="ghost-button-filter">
            <option value="all">All buttons</option>
            <option value="0">Left only</option>
            <option value="1">Middle only</option>
            <option value="2">Right only</option>
          </select>
        </label>
        <label class="ghost-control" for="ghost-threshold">
          Flag interval
          <select id="ghost-threshold">
            <option value="80">80 ms - strict bounce</option>
            <option value="150" selected>150 ms - recommended</option>
            <option value="250">250 ms - loose check</option>
            <option value="300">300 ms - very loose</option>
          </select>
        </label>
        <label class="ghost-control" for="ghost-target">
          Target clicks
          <input id="ghost-target" type="number" min="10" max="200" step="5" value="30">
        </label>
      </div>

      <div class="ghost-click-area" id="ghost-click-area" tabindex="0" role="button" aria-label="Ghost click test area" aria-describedby="ghost-area-help">
        <span class="ghost-area-title">Start a clean test</span>
        <span class="ghost-area-subtitle" id="ghost-area-help">Press Start, then single-click inside this box. Right-click and middle-click are supported inside the box.</span>
      </div>

      <div class="ghost-actions">
        <button type="button" class="ghost-button primary" id="ghost-start">Start clean test</button>
        <button type="button" class="ghost-button" id="ghost-pause" disabled>Pause</button>
        <button type="button" class="ghost-button" id="ghost-reset">Reset</button>
        <button type="button" class="ghost-button" id="ghost-export" disabled>Export report</button>
      </div>
      <p class="ghost-note">This is a browser-level diagnostic. It cannot see your finger; it flags suspicious click timing that is useful when you are intentionally single-clicking.</p>
    </section>

    <section class="ghost-card" aria-labelledby="ghost-result-title">
      <div class="ghost-card-title">
        <div>
          <h3 id="ghost-result-title">Results</h3>
          <p>Use 30 or more deliberate clicks for a reliable sample.</p>
        </div>
      </div>

      <div class="ghost-verdict" id="ghost-verdict" aria-live="polite">
        <strong>Ready</strong>
        <span>Start the test and click normally to collect a sample.</span>
      </div>

      <div class="ghost-stats">
        <div class="ghost-stat"><span>Total clicks</span><strong id="ghost-total">0</strong></div>
        <div class="ghost-stat"><span>Suspicious</span><strong id="ghost-fast">0</strong></div>
        <div class="ghost-stat"><span>Suspicious rate</span><strong id="ghost-rate">0%</strong></div>
        <div class="ghost-stat"><span>Average interval</span><strong id="ghost-avg">-- ms</strong></div>
        <div class="ghost-stat"><span>Fastest interval</span><strong id="ghost-fastest">-- ms</strong></div>
        <div class="ghost-stat"><span>Last button</span><strong id="ghost-last-button">--</strong></div>
      </div>

      <div class="ghost-progress" aria-label="Sample progress">
        <span id="ghost-progress-bar"></span>
      </div>

      <div class="ghost-log" id="ghost-log" aria-live="polite">
        <div class="is-muted">Press Start and single-click inside the test area.</div>
      </div>
    </section>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const area = document.getElementById('ghost-click-area');
  const startBtn = document.getElementById('ghost-start');
  const pauseBtn = document.getElementById('ghost-pause');
  const resetBtn = document.getElementById('ghost-reset');
  const exportBtn = document.getElementById('ghost-export');
  const buttonFilter = document.getElementById('ghost-button-filter');
  const thresholdSelect = document.getElementById('ghost-threshold');
  const targetInput = document.getElementById('ghost-target');
  const sessionStatus = document.getElementById('ghost-session-status');
  const totalEl = document.getElementById('ghost-total');
  const fastEl = document.getElementById('ghost-fast');
  const rateEl = document.getElementById('ghost-rate');
  const avgEl = document.getElementById('ghost-avg');
  const fastestEl = document.getElementById('ghost-fastest');
  const lastButtonEl = document.getElementById('ghost-last-button');
  const progressBar = document.getElementById('ghost-progress-bar');
  const logEl = document.getElementById('ghost-log');
  const verdictEl = document.getElementById('ghost-verdict');

  if (!area || !startBtn || !pauseBtn || !resetBtn || !exportBtn) return;

  const buttonNames = {
    0: 'Left',
    1: 'Middle',
    2: 'Right'
  };

  const state = {
    active: false,
    paused: false,
    total: 0,
    suspicious: 0,
    intervals: [],
    events: [],
    lastByButton: {},
    lastButton: null,
    startedAt: null
  };

  function threshold() {
    return Number(thresholdSelect.value) || 150;
  }

  function targetClicks() {
    const value = Number(targetInput.value) || 30;
    return Math.min(200, Math.max(10, value));
  }

  function selectedButton() {
    return buttonFilter.value;
  }

  function formatMs(value) {
    return Number.isFinite(value) ? `${value.toFixed(1)} ms` : '-- ms';
  }

  function buttonName(button) {
    return buttonNames[button] || `Button ${button}`;
  }

  function addLog(message, type) {
    if (!logEl) return;
    if (logEl.children.length === 1 && logEl.textContent.includes('Press Start')) {
      logEl.textContent = '';
    }
    const item = document.createElement('div');
    item.textContent = message;
    if (type) item.className = type;
    logEl.prepend(item);
    while (logEl.children.length > 16) {
      logEl.removeChild(logEl.lastChild);
    }
  }

  function setVerdict(mode, title, message) {
    verdictEl.className = `ghost-verdict ${mode || ''}`.trim();
    verdictEl.innerHTML = '';
    const titleEl = document.createElement('strong');
    const messageEl = document.createElement('span');
    titleEl.textContent = title;
    messageEl.textContent = message;
    verdictEl.append(titleEl, messageEl);
  }

  function updateVerdict() {
    const rate = state.total ? (state.suspicious / state.total) * 100 : 0;
    const sampleTarget = targetClicks();

    if (!state.total) {
      setVerdict('', 'Ready', 'Start the test and click normally to collect a sample.');
      return;
    }

    if (state.total < Math.min(10, sampleTarget)) {
      setVerdict('', 'Collecting sample', 'Keep single-clicking. A small sample can look misleading.');
      return;
    }

    if (state.suspicious === 0) {
      setVerdict('clean', 'Clean in this run', 'No suspicious rapid duplicate clicks were detected in this sample.');
      return;
    }

    if (state.suspicious <= 1 && rate < 5) {
      setVerdict('watch', 'One suspicious interval', 'Retest the same button. One event can be user timing, but repeats matter.');
      return;
    }

    if (rate < 12) {
      setVerdict('watch', 'Possible mouse chatter', 'Suspicious repeats appeared. Test the same button again and compare another USB port or computer.');
      return;
    }

    setVerdict('bad', 'Likely switch bounce', 'Many rapid repeats were detected while single-clicking. The mouse switch may be worn or unstable.');
  }

  function updateStats() {
    const avg = state.intervals.length ? state.intervals.reduce((sum, value) => sum + value, 0) / state.intervals.length : NaN;
    const fastest = state.intervals.length ? Math.min.apply(null, state.intervals) : NaN;
    const rate = state.total ? (state.suspicious / state.total) * 100 : 0;
    const progress = Math.min(100, (state.total / targetClicks()) * 100);

    totalEl.textContent = String(state.total);
    fastEl.textContent = String(state.suspicious);
    rateEl.textContent = `${rate.toFixed(1)}%`;
    avgEl.textContent = formatMs(avg);
    fastestEl.textContent = formatMs(fastest);
    lastButtonEl.textContent = state.lastButton === null ? '--' : buttonName(state.lastButton);
    progressBar.style.width = `${progress}%`;
    exportBtn.disabled = state.events.length === 0;
    area.classList.toggle('is-warning', state.suspicious > 1);
    updateVerdict();
  }

  function resetData() {
    state.total = 0;
    state.suspicious = 0;
    state.intervals = [];
    state.events = [];
    state.lastByButton = {};
    state.lastButton = null;
    state.startedAt = new Date();
    logEl.innerHTML = '<div class="is-muted">Test started. Single-click normally inside the area.</div>';
    updateStats();
  }

  function updateSessionUi() {
    area.classList.toggle('is-active', state.active && !state.paused);
    pauseBtn.disabled = !state.active;
    pauseBtn.textContent = state.paused ? 'Resume' : 'Pause';
    startBtn.textContent = state.active ? 'Restart clean test' : 'Start clean test';
    sessionStatus.textContent = !state.active ? 'Ready to test' : state.paused ? 'Paused' : 'Recording clicks';

    const title = area.querySelector('.ghost-area-title');
    const subtitle = area.querySelector('.ghost-area-subtitle');
    if (!title || !subtitle) return;

    if (!state.active) {
      title.textContent = 'Start a clean test';
      subtitle.textContent = 'Press Start, then single-click inside this box. Right-click and middle-click are supported inside the box.';
      return;
    }

    if (state.paused) {
      title.textContent = 'Paused';
      subtitle.textContent = 'Resume when you are ready to continue the same run.';
      return;
    }

    title.textContent = 'Click normally';
    subtitle.textContent = `Recording ${selectedButton() === 'all' ? 'left, middle, and right buttons' : buttonName(Number(selectedButton())) + ' button'} with a ${threshold()} ms flag threshold.`;
  }

  function startTest() {
    state.active = true;
    state.paused = false;
    resetData();
    addLog(`Threshold set to ${threshold()} ms. Target sample: ${targetClicks()} clicks.`, 'is-muted');
    updateSessionUi();
  }

  function resetTest() {
    state.active = false;
    state.paused = false;
    state.startedAt = null;
    state.total = 0;
    state.suspicious = 0;
    state.intervals = [];
    state.events = [];
    state.lastByButton = {};
    state.lastButton = null;
    logEl.innerHTML = '<div class="is-muted">Press Start and single-click inside the test area.</div>';
    updateStats();
    updateSessionUi();
  }

  function recordInput(button, source) {
    if (!state.active) {
      addLog('Press Start before testing.', 'is-muted');
      return;
    }

    if (state.paused) {
      addLog('Test is paused. Resume to record clicks.', 'is-muted');
      return;
    }

    const filter = selectedButton();
    if (filter !== 'all' && Number(filter) !== button) {
      addLog(`Ignored ${buttonName(button)} click because the filter is set to ${buttonName(Number(filter))}.`, 'is-muted');
      return;
    }

    const now = performance.now();
    const previous = state.lastByButton[button] || 0;
    const interval = previous ? now - previous : NaN;
    const isSuspicious = Number.isFinite(interval) && interval <= threshold();
    const eventRecord = {
      number: state.total + 1,
      button: buttonName(button),
      interval: Number.isFinite(interval) ? Number(interval.toFixed(1)) : null,
      suspicious: isSuspicious,
      source: source || 'pointer'
    };

    state.total += 1;
    state.lastButton = button;
    state.lastByButton[button] = now;

    if (Number.isFinite(interval)) {
      state.intervals.push(interval);
    }

    if (isSuspicious) {
      state.suspicious += 1;
    }

    state.events.push(eventRecord);

    if (!Number.isFinite(interval)) {
      addLog(`${buttonName(button)} click recorded.`, 'is-muted');
    } else if (isSuspicious) {
      addLog(`${buttonName(button)} suspicious interval: ${formatMs(interval)}`, 'is-suspicious');
    } else {
      addLog(`${buttonName(button)} interval: ${formatMs(interval)}`);
    }

    updateStats();
  }

  function exportReport() {
    if (!state.events.length) return;

    const lines = [
      'KeyboardTester.click Ghost Click Detector Report',
      `Started: ${state.startedAt ? state.startedAt.toISOString() : new Date().toISOString()}`,
      `Button filter: ${selectedButton() === 'all' ? 'All buttons' : buttonName(Number(selectedButton()))}`,
      `Flag threshold: ${threshold()} ms`,
      `Target clicks: ${targetClicks()}`,
      `Total clicks: ${state.total}`,
      `Suspicious clicks: ${state.suspicious}`,
      `Suspicious rate: ${state.total ? ((state.suspicious / state.total) * 100).toFixed(1) : '0.0'}%`,
      '',
      'Events:',
      ...state.events.map(function (event) {
        return `#${event.number} ${event.button} interval=${event.interval === null ? 'first' : event.interval + ' ms'} suspicious=${event.suspicious ? 'yes' : 'no'}`;
      })
    ];

    const blob = new Blob([lines.join('\n')], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = 'ghost-click-detector-report.txt';
    document.body.appendChild(link);
    link.click();
    link.remove();
    URL.revokeObjectURL(url);
  }

  startBtn.addEventListener('click', startTest);
  pauseBtn.addEventListener('click', function () {
    if (!state.active) return;
    state.paused = !state.paused;
    updateSessionUi();
    addLog(state.paused ? 'Test paused.' : 'Test resumed.', 'is-muted');
  });
  resetBtn.addEventListener('click', resetTest);
  exportBtn.addEventListener('click', exportReport);

  area.addEventListener('pointerdown', function (event) {
    event.preventDefault();
    const button = typeof event.button === 'number' ? event.button : 0;
    recordInput(button, event.pointerType || 'pointer');
  });

  area.addEventListener('contextmenu', function (event) {
    event.preventDefault();
  });

  area.addEventListener('keydown', function (event) {
    if (event.key === 'Enter' || event.key === ' ') {
      event.preventDefault();
      recordInput(0, 'keyboard');
    }
  });

  buttonFilter.addEventListener('change', updateSessionUi);
  thresholdSelect.addEventListener('change', function () {
    updateSessionUi();
    if (state.active) {
      addLog(`Threshold changed to ${threshold()} ms.`, 'is-muted');
      updateStats();
    }
  });
  targetInput.addEventListener('change', function () {
    targetInput.value = targetClicks();
    updateStats();
  });

  resetTest();
});
</script>
