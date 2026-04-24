<?php
// keyboard_double_click_tool.php
// Detects key chatter: the same key registering 2+ presses within a short interval.

$kdc_labels = $kdc_labels ?? [];
$L = array_merge([
  'aria_arena' => 'Keyboard chatter detector. Press keys individually to find chattering keys.',
  'start' => 'Start listening', 'stop' => 'Stop', 'reset' => 'Reset',
  'threshold' => 'Chatter threshold',
  'status_idle' => 'Idle', 'status_listening' => 'Listening',
  'col_key' => 'Key', 'col_total' => 'Total presses', 'col_chatter' => 'Chatter events', 'col_min_gap' => 'Min gap (ms)',
  'tip_listen' => 'Press Start, then press each key ONCE slowly. Any key that registers twice will show chatter events below.',
  'no_chatter' => 'No chatter detected yet. Keep pressing keys.',
  'chatter_detected' => 'CHATTERING - this key double-registers',
], $kdc_labels);
?>
<div class="kdc-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria_arena'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="kdc-controls">
    <div class="kdc-field">
      <label for="kdc-threshold"><?php echo htmlspecialchars($L['threshold'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="kdc-threshold">
        <option value="30">30ms (strict)</option>
        <option value="50" selected>50ms (standard)</option>
        <option value="80">80ms (loose)</option>
        <option value="150">150ms (very loose)</option>
      </select>
    </div>
    <button type="button" class="kdc-btn kdc-btn-primary" id="kdc-start"><?php echo htmlspecialchars($L['start'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" class="kdc-btn kdc-btn-ghost" id="kdc-reset"><?php echo htmlspecialchars($L['reset'], ENT_QUOTES, 'UTF-8'); ?></button>
    <div class="kdc-status" id="kdc-status"><?php echo htmlspecialchars($L['status_idle'], ENT_QUOTES, 'UTF-8'); ?></div>
  </div>
  <div class="kdc-tip" id="kdc-tip"><?php echo htmlspecialchars($L['tip_listen'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="kdc-table-wrap">
    <table class="kdc-table" aria-live="polite">
      <thead>
        <tr>
          <th><?php echo htmlspecialchars($L['col_key'], ENT_QUOTES, 'UTF-8'); ?></th>
          <th><?php echo htmlspecialchars($L['col_total'], ENT_QUOTES, 'UTF-8'); ?></th>
          <th><?php echo htmlspecialchars($L['col_chatter'], ENT_QUOTES, 'UTF-8'); ?></th>
          <th><?php echo htmlspecialchars($L['col_min_gap'], ENT_QUOTES, 'UTF-8'); ?></th>
        </tr>
      </thead>
      <tbody id="kdc-tbody">
        <tr class="kdc-empty"><td colspan="4"><?php echo htmlspecialchars($L['no_chatter'], ENT_QUOTES, 'UTF-8'); ?></td></tr>
      </tbody>
    </table>
  </div>
</div>
<style>
  .kdc-tester { display: flex; flex-direction: column; gap: 14px; max-width: 1100px; margin: 0 auto; padding: 14px; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; }
  .kdc-tester * { box-sizing: border-box; }
  .kdc-controls { display: flex; flex-wrap: wrap; gap: 10px; align-items: end; padding: 10px 14px; background: var(--surface, #f1f5f9); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .kdc-field { display: flex; flex-direction: column; gap: 4px; }
  .kdc-field label { font-size: 0.68rem; text-transform: uppercase; letter-spacing: 0.03em; font-weight: 600; color: var(--text-muted, #64748b); }
  .kdc-field select { padding: 7px 10px; border-radius: 8px; border: 1px solid var(--border-color, #cbd5e1); background: var(--surface, #fff); font: inherit; font-size: 0.9rem; }
  .kdc-btn { padding: 8px 18px; border-radius: 999px; border: 1px solid transparent; font-weight: 700; font-size: 0.9rem; cursor: pointer; }
  .kdc-btn-primary { background: #2563eb; color: #fff; }
  .kdc-btn-primary:hover { transform: translateY(-1px); }
  .kdc-btn-primary.kdc-active { background: #dc2626; }
  .kdc-btn-ghost { background: var(--surface, #fff); color: var(--text-color, #0f172a); border-color: var(--border-color, #cbd5e1); }
  .kdc-btn-ghost:hover { background: var(--border-color, #e2e8f0); }
  .kdc-status { margin-left: auto; padding: 6px 14px; border-radius: 999px; background: var(--border-color, #e2e8f0); font-weight: 700; font-size: 0.82rem; color: var(--text-color, #0f172a); }
  .kdc-status.kdc-on { background: #dcfce7; color: #15803d; }
  .kdc-tip { padding: 12px 16px; background: var(--surface, #f0f9ff); border: 1px solid #bae6fd; border-left: 4px solid #0ea5e9; border-radius: 10px; font-size: 0.95rem; color: var(--text-color, #0f172a); }
  .kdc-table-wrap { overflow-x: auto; background: var(--surface, #fff); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; }
  .kdc-table { width: 100%; border-collapse: collapse; font-size: 0.95rem; }
  .kdc-table th { background: var(--surface, #f8fafc); text-align: left; padding: 10px 14px; border-bottom: 1px solid var(--border-color, #e2e8f0); font-weight: 700; font-size: 0.82rem; letter-spacing: 0.03em; text-transform: uppercase; color: var(--text-muted, #64748b); }
  .kdc-table td { padding: 10px 14px; border-bottom: 1px solid var(--border-color, #f1f5f9); font-variant-numeric: tabular-nums; }
  .kdc-table tr.kdc-chatter td { background: rgba(220,38,38,0.08); color: #991b1b; font-weight: 700; }
  .kdc-table tr.kdc-chatter td:first-child::after { content: ' - CHATTER'; color: #dc2626; font-size: 0.72rem; }
  .kdc-table tr.kdc-empty td { text-align: center; color: var(--text-muted, #64748b); padding: 24px; }
  .kdc-table td:first-child { font-family: 'JetBrains Mono', monospace; font-weight: 700; }
</style>
<script>
(function () {
  'use strict';
  var startBtn = document.getElementById('kdc-start'), resetBtn = document.getElementById('kdc-reset');
  var thresholdSel = document.getElementById('kdc-threshold');
  var statusEl = document.getElementById('kdc-status');
  var tbody = document.getElementById('kdc-tbody');
  var listening = false;
  var keys = {}; // key -> { total, chatter, minGap, lastTs }

  function keyLabel(e) {
    if (e.code) return e.code;
    return e.key || 'Unknown';
  }

  function onKeyDown(e) {
    if (!listening) return;
    if (e.repeat) return; // ignore OS key repeat
    var k = keyLabel(e);
    var now = performance.now();
    var threshold = parseInt(thresholdSel.value, 10);
    if (!keys[k]) keys[k] = { total: 0, chatter: 0, minGap: null, lastTs: 0 };
    var rec = keys[k];
    if (rec.lastTs) {
      var gap = now - rec.lastTs;
      if (rec.minGap === null || gap < rec.minGap) rec.minGap = gap;
      if (gap < threshold) rec.chatter++;
    }
    rec.total++;
    rec.lastTs = now;
    render();
  }

  function render() {
    var rows = Object.keys(keys).sort(function (a, b) { return (keys[b].chatter || 0) - (keys[a].chatter || 0); });
    if (!rows.length) {
      tbody.innerHTML = '<tr class="kdc-empty"><td colspan="4">' + tbody.querySelector('.kdc-empty td').textContent + '</td></tr>';
      return;
    }
    tbody.innerHTML = '';
    rows.forEach(function (k) {
      var r = keys[k];
      var tr = document.createElement('tr');
      if (r.chatter > 0) tr.classList.add('kdc-chatter');
      tr.innerHTML = '<td>' + k + '</td><td>' + r.total + '</td><td>' + r.chatter + '</td><td>' + (r.minGap !== null ? Math.round(r.minGap) : '-') + '</td>';
      tbody.appendChild(tr);
    });
  }

  function start() {
    if (listening) { stop(); return; }
    listening = true;
    startBtn.textContent = 'Stop';
    startBtn.classList.add('kdc-active');
    statusEl.textContent = 'Listening';
    statusEl.classList.add('kdc-on');
  }
  function stop() {
    listening = false;
    startBtn.textContent = 'Start listening';
    startBtn.classList.remove('kdc-active');
    statusEl.textContent = 'Idle';
    statusEl.classList.remove('kdc-on');
  }
  function reset() {
    keys = {};
    render();
  }

  window.addEventListener('keydown', onKeyDown);
  startBtn.addEventListener('click', start);
  resetBtn.addEventListener('click', reset);
})();
</script>
