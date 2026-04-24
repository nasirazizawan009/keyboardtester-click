<?php
$dm_labels = $dm_labels ?? [];
$L = array_merge([
  'aria' => 'Decibel meter using microphone.',
  'instruction' => 'Press Start to use your microphone for live dB SPL measurement. Browser readings are RELATIVE - real SPL needs hardware calibration. Useful for comparing relative loudness, not absolute reference.',
  'start' => 'Start meter', 'stop' => 'Stop',
  'current' => 'Current dB', 'peak' => 'Peak dB', 'average' => 'Average dB',
  'permission_denied' => 'Microphone access denied. Allow microphone in browser settings.',
  'no_mic' => 'No microphone detected.',
], $dm_labels);
?>
<div class="dm-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="dm-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>
  <div class="dm-controls">
    <button type="button" class="dm-btn dm-btn-primary" id="dm-toggle"><?php echo htmlspecialchars($L['start'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>
  <div class="dm-display">
    <div class="dm-current" id="dm-current">--</div>
    <div class="dm-unit">dB SPL (relative)</div>
    <div class="dm-meter-bar"><div class="dm-meter-fill" id="dm-bar"></div></div>
  </div>
  <div class="dm-stats">
    <div class="dm-stat"><span class="dm-label"><?php echo htmlspecialchars($L['peak'], ENT_QUOTES, 'UTF-8'); ?></span><span class="dm-value" id="dm-peak">--</span></div>
    <div class="dm-stat"><span class="dm-label"><?php echo htmlspecialchars($L['average'], ENT_QUOTES, 'UTF-8'); ?></span><span class="dm-value" id="dm-avg">--</span></div>
  </div>
  <div class="dm-status" id="dm-status"></div>
</div>
<style>
  .dm-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .dm-tester *{ box-sizing:border-box; }
  .dm-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .dm-controls { display:flex; gap:10px; justify-content:center; }
  .dm-btn { padding:10px 24px; border-radius:999px; border:1px solid transparent; font-weight:700; cursor:pointer; }
  .dm-btn-primary { background:#db2777; color:#fff; }
  .dm-btn-primary.dm-active { background:#dc2626; }
  .dm-display { background:var(--surface,#0f172a); padding:30px; border-radius:12px; text-align:center; color:#fff; }
  .dm-current { font-size:5rem; font-weight:800; font-variant-numeric:tabular-nums; line-height:1; color:#db2777; }
  .dm-unit { font-size:0.9rem; color:#94a3b8; margin-top:8px; }
  .dm-meter-bar { margin-top:20px; height:30px; background:#1e293b; border-radius:6px; overflow:hidden; }
  .dm-meter-fill { height:100%; background:linear-gradient(to right, #16a34a 0%, #facc15 60%, #dc2626 100%); width:0%; transition:width 0.05s; }
  .dm-stats { display:grid; grid-template-columns:repeat(2,1fr); gap:8px; padding:10px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  .dm-stat { display:flex; flex-direction:column; align-items:center; padding:8px; }
  .dm-label { font-size:0.72rem; color:var(--text-muted,#64748b); font-weight:600; letter-spacing:0.04em; text-transform:uppercase; }
  .dm-value { font-size:1.6rem; font-weight:800; color:var(--text-color,#0f172a); font-variant-numeric:tabular-nums; }
  .dm-status { padding:10px; text-align:center; color:#dc2626; font-weight:600; min-height:20px; }
</style>
<script>
(function(){
  var toggleBtn = document.getElementById('dm-toggle');
  var currentEl = document.getElementById('dm-current');
  var peakEl = document.getElementById('dm-peak');
  var avgEl = document.getElementById('dm-avg');
  var barEl = document.getElementById('dm-bar');
  var statusEl = document.getElementById('dm-status');
  var ctx, analyser, mic, raf, running = false;
  var peak = -Infinity, samples = [], stream;

  function start() {
    statusEl.textContent = '';
    if (!navigator.mediaDevices) { statusEl.textContent = 'No microphone API'; return; }
    navigator.mediaDevices.getUserMedia({audio:true}).then(function(s){
      stream = s;
      ctx = new (window.AudioContext || window.webkitAudioContext)();
      analyser = ctx.createAnalyser();
      analyser.fftSize = 2048;
      mic = ctx.createMediaStreamSource(s);
      mic.connect(analyser);
      running = true;
      toggleBtn.textContent = 'Stop'; toggleBtn.classList.add('dm-active');
      loop();
    }).catch(function(e){
      statusEl.textContent = 'Microphone access denied: ' + e.message;
    });
  }
  function stop() {
    running = false;
    cancelAnimationFrame(raf);
    if (stream) stream.getTracks().forEach(function(t){t.stop();});
    if (ctx) ctx.close();
    toggleBtn.textContent = 'Start meter'; toggleBtn.classList.remove('dm-active');
  }
  function loop() {
    if (!running) return;
    var data = new Uint8Array(analyser.fftSize);
    analyser.getByteTimeDomainData(data);
    var sum = 0;
    for (var i = 0; i < data.length; i++) {
      var v = (data[i] - 128) / 128;
      sum += v * v;
    }
    var rms = Math.sqrt(sum / data.length);
    var db = rms > 0 ? 20 * Math.log10(rms) + 90 : 0;
    db = Math.max(0, Math.min(120, db));
    currentEl.textContent = db.toFixed(1);
    if (db > peak) peak = db;
    peakEl.textContent = peak.toFixed(1);
    samples.push(db);
    if (samples.length > 100) samples.shift();
    var avg = samples.reduce(function(a,b){return a+b;}, 0) / samples.length;
    avgEl.textContent = avg.toFixed(1);
    barEl.style.width = (db / 120 * 100) + '%';
    raf = requestAnimationFrame(loop);
  }
  toggleBtn.addEventListener('click', function(){ if (running) stop(); else start(); });
})();
</script>
