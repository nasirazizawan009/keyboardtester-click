<?php
// Japanese Latency Checker Tool - レイテンシーチェッカー
?>

<div class="kbt-tool kbt-latency-tool" id="latency-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>レイテンシーテスト</h3>
      <p>テストがアクティブな間、任意のキーを押してください。各キー入力の処理遅延を推定します。</p>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="latency-start">テスト開始</button>
        <button class="kbt-tool-button" id="latency-stop" disabled>停止</button>
        <button class="kbt-tool-button ghost" id="latency-clear">クリア</button>
      </div>
      <div class="kbt-tool-status" id="latency-status">ステータス: 準備完了</div>
    </div>
    <div class="kbt-tool-card">
      <h3>結果</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>現在</span><strong id="latency-current">-- ms</strong></div>
        <div class="kbt-tool-stat"><span>平均</span><strong id="latency-avg">-- ms</strong></div>
        <div class="kbt-tool-stat"><span>最速</span><strong id="latency-min">-- ms</strong></div>
        <div class="kbt-tool-stat"><span>最遅</span><strong id="latency-max">-- ms</strong></div>
        <div class="kbt-tool-stat"><span>サンプル</span><strong id="latency-count">0</strong></div>
      </div>
      <div class="kbt-tool-log" id="latency-log">開始を押してからキーを押してサンプルを取得してください。</div>
    </div>
  </div>
</div>

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
  const countEl = document.getElementById('latency-count');
  const logEl = document.getElementById('latency-log');

  if (!startBtn || !stopBtn || !clearBtn) return;

  let active = false;
  let samples = [];

  function updateStats(value) {
    if (typeof value === 'number') {
      currentEl.textContent = `${value.toFixed(2)} ms`;
    }
    if (samples.length === 0) {
      avgEl.textContent = '-- ms';
      minEl.textContent = '-- ms';
      maxEl.textContent = '-- ms';
      countEl.textContent = '0';
      return;
    }
    const avg = samples.reduce((a, b) => a + b, 0) / samples.length;
    avgEl.textContent = `${avg.toFixed(2)} ms`;
    minEl.textContent = `${Math.min(...samples).toFixed(2)} ms`;
    maxEl.textContent = `${Math.max(...samples).toFixed(2)} ms`;
    countEl.textContent = samples.length;
  }

  function addLog(text) {
    const entry = document.createElement('div');
    entry.textContent = text;
    logEl.prepend(entry);
    while (logEl.children.length > 10) {
      logEl.removeChild(logEl.lastChild);
    }
  }

  function handleKey(event) {
    if (!active) return;
    const now = performance.now();
    let latency = now - event.timeStamp;
    if (!Number.isFinite(latency)) {
      latency = 0;
    }
    latency = Math.max(0, latency);
    samples.push(latency);
    updateStats(latency);
    addLog(`${event.code || event.key}: ${latency.toFixed(2)} ms`);
  }

  startBtn.addEventListener('click', function () {
    active = true;
    statusEl.textContent = 'ステータス: テスト中（キーを押してください）';
    startBtn.disabled = true;
    stopBtn.disabled = false;
    logEl.textContent = '';
  });

  stopBtn.addEventListener('click', function () {
    active = false;
    statusEl.textContent = 'ステータス: 停止';
    startBtn.disabled = false;
    stopBtn.disabled = true;
  });

  clearBtn.addEventListener('click', function () {
    samples = [];
    updateStats();
    currentEl.textContent = '-- ms';
    logEl.textContent = '開始を押してからキーを押してサンプルを取得してください。';
  });

  document.addEventListener('keydown', handleKey);
});
</script>
