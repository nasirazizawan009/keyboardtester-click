<?php
$st_labels = $st_labels ?? [];
$L = array_merge([
  'aria' => 'Sound test - speaker and headphone channel verification plus frequency sweep',
  'instruction' => 'First time? Your browser will ask for audio permission on the first play. Set your system volume to about 30% before starting — the sine tones can be loud.',
  'channel' => 'Channel',
  'ch_left' => 'Left only',
  'ch_right' => 'Right only',
  'ch_both' => 'Both',
  'ch_pingpong' => 'Ping-pong (alternate L & R)',
  'freq' => 'Frequency',
  'freq_value' => 'Hz',
  'volume' => 'Volume',
  'volume_value' => '%',
  'play' => 'Play',
  'stop' => 'Stop',
  'sweep' => 'Sweep 100 Hz → 10 kHz',
  'now_playing' => 'Now playing',
  'idle' => 'Idle',
  'reference' => 'Tip: if only one side plays when "both" is selected, the problem is wiring (bad cable, bad jack, bad Bluetooth pairing) not software. The ping-pong pattern is the quickest way to A/B test.',
], $st_labels);
?>
<div class="st-tester" role="region" aria-label="<?php echo htmlspecialchars($L['aria'], ENT_QUOTES, 'UTF-8'); ?>">
  <div class="st-tip"><?php echo htmlspecialchars($L['instruction'], ENT_QUOTES, 'UTF-8'); ?></div>

  <div class="st-form">
    <div class="st-field">
      <label for="st-channel"><?php echo htmlspecialchars($L['channel'], ENT_QUOTES, 'UTF-8'); ?></label>
      <select id="st-channel">
        <option value="left"><?php echo htmlspecialchars($L['ch_left'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="right"><?php echo htmlspecialchars($L['ch_right'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="both" selected><?php echo htmlspecialchars($L['ch_both'], ENT_QUOTES, 'UTF-8'); ?></option>
        <option value="pingpong"><?php echo htmlspecialchars($L['ch_pingpong'], ENT_QUOTES, 'UTF-8'); ?></option>
      </select>
    </div>
    <div class="st-field st-field-range">
      <label for="st-freq"><?php echo htmlspecialchars($L['freq'], ENT_QUOTES, 'UTF-8'); ?>: <span id="st-freq-v">440</span> <?php echo htmlspecialchars($L['freq_value'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="range" id="st-freq" min="40" max="12000" step="10" value="440">
    </div>
    <div class="st-field st-field-range">
      <label for="st-volume"><?php echo htmlspecialchars($L['volume'], ENT_QUOTES, 'UTF-8'); ?>: <span id="st-volume-v">30</span><?php echo htmlspecialchars($L['volume_value'], ENT_QUOTES, 'UTF-8'); ?></label>
      <input type="range" id="st-volume" min="0" max="100" step="1" value="30">
    </div>
  </div>

  <div class="st-actions">
    <button type="button" id="st-play" class="st-btn st-btn-primary"><?php echo htmlspecialchars($L['play'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" id="st-sweep" class="st-btn"><?php echo htmlspecialchars($L['sweep'], ENT_QUOTES, 'UTF-8'); ?></button>
    <button type="button" id="st-stop" class="st-btn" disabled><?php echo htmlspecialchars($L['stop'], ENT_QUOTES, 'UTF-8'); ?></button>
  </div>

  <div class="st-meter" id="st-meter">
    <div class="st-channels">
      <div class="st-ch" id="st-ch-l"><span class="st-ch-label">L</span><div class="st-ch-bar"></div></div>
      <div class="st-ch" id="st-ch-r"><span class="st-ch-label">R</span><div class="st-ch-bar"></div></div>
    </div>
    <div class="st-status"><?php echo htmlspecialchars($L['now_playing'], ENT_QUOTES, 'UTF-8'); ?>: <span id="st-status-v"><?php echo htmlspecialchars($L['idle'], ENT_QUOTES, 'UTF-8'); ?></span></div>
  </div>
  <div class="st-note"><?php echo htmlspecialchars($L['reference'], ENT_QUOTES, 'UTF-8'); ?></div>
</div>
<style>
  .st-tester { display:flex; flex-direction:column; gap:14px; max-width:1100px; margin:0 auto; padding:14px; font-family:-apple-system,sans-serif; }
  .st-tester *{ box-sizing:border-box; }
  .st-tip { padding:12px 16px; background:#f0f9ff; border:1px solid #bae6fd; border-left:4px solid #2563eb; border-radius:10px; font-size:0.95rem; }
  .st-form { display:grid; grid-template-columns:repeat(3,1fr); gap:14px; padding:16px; background:var(--surface,#fff); border:1px solid var(--border-color,#e2e8f0); border-radius:12px; }
  @media (max-width:720px) { .st-form { grid-template-columns:1fr; } }
  .st-field { display:flex; flex-direction:column; gap:6px; }
  .st-field label { font-size:0.84rem; font-weight:600; }
  .st-field select, .st-field input[type="range"] { padding:10px 12px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-size:0.95rem; }
  .st-actions { display:flex; gap:10px; justify-content:center; flex-wrap:wrap; }
  .st-btn { padding:12px 20px; border-radius:8px; border:1px solid var(--border-color,#cbd5e1); background:var(--surface,#fff); font:inherit; font-weight:600; cursor:pointer; }
  .st-btn-primary { background:#22c55e; color:#0f172a; border-color:#16a34a; }
  .st-btn-primary:hover { background:#16a34a; color:#fff; }
  .st-btn:disabled { opacity:0.5; cursor:not-allowed; }
  .st-meter { padding:20px; background:var(--surface,#0f172a); color:#fff; border-radius:12px; }
  .st-channels { display:flex; gap:20px; margin-bottom:14px; }
  .st-ch { flex:1; display:flex; align-items:center; gap:10px; }
  .st-ch-label { font-size:1.4rem; font-weight:800; width:20px; color:#94a3b8; }
  .st-ch.is-active .st-ch-label { color:#22c55e; }
  .st-ch-bar { flex:1; height:12px; background:rgba(255,255,255,0.1); border-radius:6px; overflow:hidden; position:relative; }
  .st-ch-bar::after { content:''; position:absolute; top:0; left:0; bottom:0; width:0%; background:linear-gradient(90deg,#22c55e,#fde047,#ef4444); transition:width 0.08s; }
  .st-ch.is-active .st-ch-bar::after { animation:st-bar 1.2s ease-in-out infinite alternate; }
  @keyframes st-bar { from { width:20%; } to { width:80%; } }
  .st-status { text-align:center; font-size:0.9rem; color:#cbd5e1; }
  .st-note { padding:10px 14px; background:#dcfce7; border:1px solid #86efac; border-left:4px solid #16a34a; border-radius:10px; font-size:0.88rem; color:#14532d; }
</style>
<script>
(function(){
  var ctx = null;
  var oscL = null, oscR = null;
  var gainL = null, gainR = null, merger = null;
  var running = false;
  var pingInt = 0, sweepInt = 0;

  var channelEl = document.getElementById('st-channel'), freqEl = document.getElementById('st-freq'), volumeEl = document.getElementById('st-volume');
  var freqVal = document.getElementById('st-freq-v'), volumeVal = document.getElementById('st-volume-v');
  var playBtn = document.getElementById('st-play'), stopBtn = document.getElementById('st-stop'), sweepBtn = document.getElementById('st-sweep');
  var chL = document.getElementById('st-ch-l'), chR = document.getElementById('st-ch-r'), statusEl = document.getElementById('st-status-v');
  var L = {
    left: <?php echo json_encode($L['ch_left']); ?>,
    right: <?php echo json_encode($L['ch_right']); ?>,
    both: <?php echo json_encode($L['ch_both']); ?>,
    ping: 'Ping-pong',
    sweep: 'Sweeping',
    idle: <?php echo json_encode($L['idle']); ?>,
  };

  function setup(){
    if (ctx) return;
    ctx = new (window.AudioContext || window.webkitAudioContext)();
    merger = ctx.createChannelMerger(2);
    oscL = ctx.createOscillator(); oscR = ctx.createOscillator();
    oscL.type = oscR.type = 'sine';
    oscL.frequency.value = oscR.frequency.value = parseFloat(freqEl.value);
    gainL = ctx.createGain(); gainR = ctx.createGain();
    gainL.gain.value = gainR.gain.value = 0;
    oscL.connect(gainL).connect(merger, 0, 0);
    oscR.connect(gainR).connect(merger, 0, 1);
    merger.connect(ctx.destination);
    oscL.start(); oscR.start();
  }

  function setChannelGains(mode){
    var v = parseInt(volumeEl.value, 10) / 100 * 0.5;
    if (mode === 'left') { gainL.gain.setTargetAtTime(v,ctx.currentTime,0.02); gainR.gain.setTargetAtTime(0,ctx.currentTime,0.02); chL.classList.add('is-active'); chR.classList.remove('is-active'); statusEl.textContent = L.left; }
    else if (mode === 'right') { gainL.gain.setTargetAtTime(0,ctx.currentTime,0.02); gainR.gain.setTargetAtTime(v,ctx.currentTime,0.02); chL.classList.remove('is-active'); chR.classList.add('is-active'); statusEl.textContent = L.right; }
    else { gainL.gain.setTargetAtTime(v,ctx.currentTime,0.02); gainR.gain.setTargetAtTime(v,ctx.currentTime,0.02); chL.classList.add('is-active'); chR.classList.add('is-active'); statusEl.textContent = L.both; }
  }
  function mute(){
    if (gainL) gainL.gain.setTargetAtTime(0,ctx.currentTime,0.02);
    if (gainR) gainR.gain.setTargetAtTime(0,ctx.currentTime,0.02);
    chL.classList.remove('is-active'); chR.classList.remove('is-active');
    statusEl.textContent = L.idle;
  }

  function play(){
    setup();
    running = true;
    playBtn.disabled = true; sweepBtn.disabled = true; stopBtn.disabled = false;
    var mode = channelEl.value;
    if (mode === 'pingpong') {
      var flip = 0;
      setChannelGains('left');
      pingInt = setInterval(function(){ flip = 1 - flip; setChannelGains(flip ? 'right' : 'left'); statusEl.textContent = L.ping + ' — ' + (flip ? 'R' : 'L'); }, 700);
    } else {
      setChannelGains(mode);
    }
  }
  function stop(){
    running = false;
    clearInterval(pingInt); pingInt = 0;
    clearInterval(sweepInt); sweepInt = 0;
    mute();
    playBtn.disabled = false; sweepBtn.disabled = false; stopBtn.disabled = true;
  }
  function sweep(){
    setup();
    running = true;
    playBtn.disabled = true; sweepBtn.disabled = true; stopBtn.disabled = false;
    setChannelGains(channelEl.value === 'pingpong' ? 'both' : channelEl.value);
    var start = performance.now();
    var dur = 8000;
    function step(){
      if (!running) return;
      var t = (performance.now() - start) / dur;
      if (t >= 1) { stop(); return; }
      // logarithmic 100 Hz -> 10000 Hz
      var f = 100 * Math.pow(100, t);
      oscL.frequency.setTargetAtTime(f, ctx.currentTime, 0.02);
      oscR.frequency.setTargetAtTime(f, ctx.currentTime, 0.02);
      freqEl.value = Math.round(f);
      freqVal.textContent = Math.round(f);
      statusEl.textContent = L.sweep + ' — ' + Math.round(f) + ' Hz';
    }
    sweepInt = setInterval(step, 40);
  }

  playBtn.addEventListener('click', play);
  stopBtn.addEventListener('click', stop);
  sweepBtn.addEventListener('click', sweep);
  freqEl.addEventListener('input', function(){
    freqVal.textContent = freqEl.value;
    if (ctx && oscL && oscR) { oscL.frequency.setTargetAtTime(parseFloat(freqEl.value),ctx.currentTime,0.02); oscR.frequency.setTargetAtTime(parseFloat(freqEl.value),ctx.currentTime,0.02); }
  });
  volumeEl.addEventListener('input', function(){
    volumeVal.textContent = volumeEl.value;
    if (running) setChannelGains(channelEl.value === 'pingpong' ? (chL.classList.contains('is-active') ? 'left' : 'right') : channelEl.value);
  });
  channelEl.addEventListener('change', function(){
    if (running) { stop(); play(); }
  });
  window.addEventListener('beforeunload', function(){ try { if (ctx) ctx.close(); } catch(_){} });
})();
</script>
