<?php // pitch_detector_tool.php – Live pitch detection via getUserMedia + autocorrelation ?>
<style>
  .pd-wrap{max-width:960px;margin:0 auto;padding:clamp(8px,1.5vw,16px);font-family:-apple-system,BlinkMacSystemFont,Segoe UI,sans-serif;--pd-bg:#0f172a;--pd-accent:#22d3ee;--pd-good:#10b981;--pd-warn:#f59e0b;--pd-bad:#ef4444;--pd-mute:#94a3b8;--pd-border:#1e293b}
  .pd-wrap *{box-sizing:border-box}
  .pd-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.06);padding:18px;margin-bottom:14px}
  .pd-card h3{margin:0 0 10px;font-size:16px;color:#0f172a}
  .pd-tip{margin:0;color:#475569;font-size:14px;line-height:1.55}
  .pd-stage{background:var(--pd-bg);border-radius:16px;padding:24px 18px;color:#fff;display:flex;flex-direction:column;gap:14px}
  .pd-readout{display:grid;grid-template-columns:repeat(auto-fit,minmax(140px,1fr));gap:10px;text-align:center}
  .pd-cell{background:#1e293b;border:1px solid #334155;border-radius:12px;padding:12px 8px}
  .pd-cell b{display:block;font-variant-numeric:tabular-nums;font-weight:800;letter-spacing:-.5px;color:#fff;line-height:1.05}
  .pd-cell span{display:block;font-size:11px;color:var(--pd-mute);text-transform:uppercase;letter-spacing:.5px;margin-top:6px}
  .pd-cell.pd-note b{font-size:42px;color:var(--pd-accent)}
  .pd-cell.pd-hz b{font-size:28px}
  .pd-cell.pd-oct b{font-size:28px}
  .pd-cell.pd-cents b{font-size:28px;color:var(--pd-good)}
  .pd-cell.pd-cents.pd-flat b{color:var(--pd-warn)}
  .pd-cell.pd-cents.pd-sharp b{color:var(--pd-warn)}
  .pd-cell.pd-cents.pd-far b{color:var(--pd-bad)}
  .pd-cents-bar{position:relative;height:18px;background:#1e293b;border:1px solid #334155;border-radius:10px;overflow:hidden;margin-top:6px}
  .pd-cents-bar::before,.pd-cents-bar::after{content:'';position:absolute;top:0;bottom:0;width:1px;background:#475569}
  .pd-cents-bar::before{left:50%}
  .pd-cents-fill{position:absolute;top:0;bottom:0;left:50%;width:0;background:var(--pd-good);transition:width .08s linear,background .15s,left .08s linear}
  .pd-graph-wrap{background:#1e293b;border:1px solid #334155;border-radius:12px;padding:8px;position:relative}
  .pd-graph{display:block;width:100%;height:200px}
  .pd-graph-axis{position:absolute;left:8px;top:8px;bottom:8px;display:flex;flex-direction:column;justify-content:space-between;font-size:10px;color:var(--pd-mute);font-variant-numeric:tabular-nums;pointer-events:none}
  .pd-controls{display:flex;flex-wrap:wrap;gap:10px;align-items:center;justify-content:center;margin-top:4px}
  .pd-btn{padding:11px 22px;border:none;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px;transition:opacity .15s,background .15s}
  .pd-btn:disabled{opacity:.5;cursor:not-allowed}
  .pd-btn-primary{background:linear-gradient(180deg,#2563eb,#60a5fa);color:#fff}
  .pd-btn-primary.pd-running{background:linear-gradient(180deg,#dc2626,#f87171)}
  .pd-btn-ghost{background:#334155;color:#fff;border:1px solid #475569}
  .pd-btn-hold{background:#0891b2;color:#fff}
  .pd-btn-hold.pd-locked{background:var(--pd-warn)}
  .pd-thresh{display:flex;align-items:center;gap:8px;font-size:12px;color:var(--pd-mute);min-width:200px;flex:1 1 200px}
  .pd-thresh input[type=range]{flex:1}
  .pd-status{padding:10px 12px;text-align:center;color:#fbbf24;font-weight:600;min-height:20px;font-size:13px}
  .pd-hold-display{background:#0b2545;border-radius:10px;padding:10px;text-align:center;font-size:13px;color:#cbd5e1}
  .pd-hold-display b{color:#fff}
</style>

<div class="pd-wrap">
  <div class="pd-card">
    <h3>How to use</h3>
    <p class="pd-tip">Click <strong>Start</strong>, allow microphone access, then sing, hum, or play any note. The detector shows live frequency, the closest musical note, and how many cents you are off perfect pitch. Best results in a quiet room with the mic 15-30&nbsp;cm from the source. Use the threshold slider to ignore background noise.</p>
  </div>

  <div class="pd-stage">
    <div class="pd-readout">
      <div class="pd-cell pd-note"><b id="pd-note">--</b><span>Note</span></div>
      <div class="pd-cell pd-hz"><b id="pd-hz">--</b><span>Frequency (Hz)</span></div>
      <div class="pd-cell pd-oct"><b id="pd-oct">--</b><span>Octave</span></div>
      <div class="pd-cell pd-cents" id="pd-cents-cell"><b id="pd-cents">--</b><span>Cents</span></div>
    </div>
    <div class="pd-cents-bar" aria-hidden="true"><div class="pd-cents-fill" id="pd-cents-fill"></div></div>
    <div class="pd-graph-wrap">
      <canvas id="pd-graph" class="pd-graph" width="900" height="200"></canvas>
    </div>
    <div class="pd-hold-display">Held peak: <b id="pd-hold-text">none</b></div>
    <div class="pd-controls">
      <button type="button" id="pd-toggle" class="pd-btn pd-btn-primary">Start</button>
      <button type="button" id="pd-hold" class="pd-btn pd-btn-hold" disabled>Hold peak (2s)</button>
      <button type="button" id="pd-reset" class="pd-btn pd-btn-ghost">Reset graph</button>
      <label class="pd-thresh">Noise threshold
        <input type="range" id="pd-thresh" min="0" max="0.2" step="0.005" value="0.01">
        <span id="pd-thresh-val">0.010</span>
      </label>
    </div>
    <div class="pd-status" id="pd-status" role="status" aria-live="polite">Press Start to begin pitch detection.</div>
  </div>
</div>

<script>
(function(){
  'use strict';
  var $ = function(id){ return document.getElementById(id); };
  var noteEl=$('pd-note'), hzEl=$('pd-hz'), octEl=$('pd-oct'), centsEl=$('pd-cents');
  var centsCell=$('pd-cents-cell'), centsFill=$('pd-cents-fill');
  var holdText=$('pd-hold-text'), statusEl=$('pd-status');
  var toggleBtn=$('pd-toggle'), holdBtn=$('pd-hold'), resetBtn=$('pd-reset');
  var threshInput=$('pd-thresh'), threshVal=$('pd-thresh-val');
  var canvas=$('pd-graph'), gctx=canvas.getContext('2d');

  var NOTE_NAMES = ['C','C#','D','D#','E','F','F#','G','G#','A','A#','B'];
  var SAMPLE_HISTORY_SEC = 10;
  var ctx=null, analyser=null, micSrc=null, stream=null, raf=null;
  var running=false, buf=null, sampleRate=44100;
  var threshold = 0.01;
  var history = [];   // {t, freq, midi}
  var recent  = [];   // {t, freq, rms} for hold-peak (last 2s)
  var holdLocked = null;

  function noteFromHz(freq){
    if (!freq || freq <= 0) return null;
    var midiF = 69 + 12 * Math.log2(freq/440);
    var midi = Math.round(midiF);
    var cents = Math.round(100 * (midiF - midi));
    var name = NOTE_NAMES[((midi % 12) + 12) % 12];
    var octave = Math.floor(midi/12) - 1;
    return {midi: midi, name: name, octave: octave, cents: cents, midiF: midiF};
  }

  // Autocorrelation pitch detection (ACF + parabolic interpolation)
  function autoCorrelate(buf, sr){
    var SIZE = buf.length;
    var rms = 0;
    for (var i = 0; i < SIZE; i++) { var v = buf[i]; rms += v*v; }
    rms = Math.sqrt(rms / SIZE);
    if (rms < threshold) return {freq: -1, rms: rms};

    // Trim leading/trailing silence/quiet edges
    var thresholdEdge = 0.2;
    var r1 = 0, r2 = SIZE - 1;
    for (var i2 = 0; i2 < SIZE/2; i2++) if (Math.abs(buf[i2]) < thresholdEdge) { r1 = i2; break; }
    for (var j = 1; j < SIZE/2; j++) if (Math.abs(buf[SIZE-j]) < thresholdEdge) { r2 = SIZE - j; break; }
    var trimmed = buf.subarray(r1, r2);
    var T = trimmed.length;
    if (T < 256) return {freq: -1, rms: rms};

    // Compute autocorrelation
    var c = new Float32Array(T).fill(0);
    for (var lag = 0; lag < T; lag++) {
      var sum = 0;
      for (var k = 0; k < T - lag; k++) sum += trimmed[k] * trimmed[k+lag];
      c[lag] = sum;
    }
    // Find first dip past zero, then peak after
    var d = 0;
    while (d < T - 1 && c[d] > c[d+1]) d++;
    var maxVal = -1, maxIdx = -1;
    for (var p = d; p < T; p++) if (c[p] > maxVal) { maxVal = c[p]; maxIdx = p; }
    if (maxIdx <= 0) return {freq: -1, rms: rms};

    // Parabolic interpolation around max
    var T0 = maxIdx;
    if (maxIdx > 0 && maxIdx < T-1) {
      var x1 = c[maxIdx-1], x2 = c[maxIdx], x3 = c[maxIdx+1];
      var a = (x1 + x3 - 2*x2) / 2, b = (x3 - x1) / 2;
      if (a) T0 = maxIdx - b/(2*a);
    }
    var freq = sr / T0;
    if (freq < 30 || freq > 5000) return {freq: -1, rms: rms};
    return {freq: freq, rms: rms};
  }

  function setStatus(msg, kind){
    statusEl.textContent = msg || '';
    statusEl.style.color = (kind === 'error') ? '#fca5a5' : (kind === 'ok' ? '#86efac' : '#fbbf24');
  }

  function start(){
    if (running) return;
    setStatus('Requesting microphone...');
    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia){
      setStatus('Your browser does not support microphone access.', 'error'); return;
    }
    navigator.mediaDevices.getUserMedia({audio:{echoCancellation:false,noiseSuppression:false,autoGainControl:false}}).then(function(s){
      stream = s;
      ctx = new (window.AudioContext || window.webkitAudioContext)();
      sampleRate = ctx.sampleRate;
      analyser = ctx.createAnalyser();
      analyser.fftSize = 4096;
      analyser.smoothingTimeConstant = 0;
      buf = new Float32Array(analyser.fftSize);
      micSrc = ctx.createMediaStreamSource(s);
      micSrc.connect(analyser);
      running = true;
      toggleBtn.textContent = 'Stop';
      toggleBtn.classList.add('pd-running');
      holdBtn.disabled = false;
      setStatus('Listening. Sing or play a note.', 'ok');
      loop();
    }).catch(function(err){
      setStatus('Microphone access denied or unavailable: ' + (err && err.message ? err.message : err), 'error');
    });
  }

  function stop(){
    running = false;
    if (raf) cancelAnimationFrame(raf);
    if (stream) stream.getTracks().forEach(function(t){ t.stop(); });
    if (ctx) ctx.close();
    ctx=null; analyser=null; micSrc=null; stream=null;
    toggleBtn.textContent = 'Start';
    toggleBtn.classList.remove('pd-running');
    holdBtn.disabled = true;
    setStatus('Stopped.', 'ok');
  }

  function loop(){
    if (!running) return;
    analyser.getFloatTimeDomainData(buf);
    var res = autoCorrelate(buf, sampleRate);
    var now = performance.now();

    // Trim recent (last 2s) and history (last 10s)
    while (recent.length && now - recent[0].t > 2000) recent.shift();
    while (history.length && now - history[0].t > SAMPLE_HISTORY_SEC*1000) history.shift();

    if (res.freq > 0){
      var n = noteFromHz(res.freq);
      noteEl.textContent = n.name;
      hzEl.textContent = res.freq.toFixed(1);
      octEl.textContent = String(n.octave);
      centsEl.textContent = (n.cents > 0 ? '+' : '') + n.cents;
      var absC = Math.abs(n.cents);
      centsCell.classList.remove('pd-flat','pd-sharp','pd-far');
      if (absC > 25) centsCell.classList.add('pd-far');
      else if (n.cents < -5) centsCell.classList.add('pd-flat');
      else if (n.cents > 5) centsCell.classList.add('pd-sharp');
      // cents bar: pos 50% as zero, +/-50 cents = 0..100%
      var pct = Math.max(-50, Math.min(50, n.cents));
      var width = Math.abs(pct);
      var leftPct = pct < 0 ? (50 - width) : 50;
      centsFill.style.left = leftPct + '%';
      centsFill.style.width = width + '%';
      centsFill.style.background = absC > 25 ? 'var(--pd-bad)' : (absC > 5 ? 'var(--pd-warn)' : 'var(--pd-good)');

      history.push({t: now, freq: res.freq, midi: n.midiF, rms: res.rms});
      recent.push({t: now, freq: res.freq, rms: res.rms});
    } else {
      // below threshold -> show idle
      noteEl.textContent='--'; hzEl.textContent='--'; octEl.textContent='--'; centsEl.textContent='--';
      centsCell.classList.remove('pd-flat','pd-sharp','pd-far');
      centsFill.style.width='0%';
      history.push({t: now, freq: 0, midi: 0, rms: res.rms});
    }
    drawGraph();
    raf = requestAnimationFrame(loop);
  }

  function drawGraph(){
    var w = canvas.width, h = canvas.height;
    gctx.fillStyle = '#0f172a';
    gctx.fillRect(0,0,w,h);
    // Horizontal grid lines per octave (C2..C7 = midi 36..96)
    var minMidi = 36, maxMidi = 96;
    gctx.strokeStyle = '#1e293b'; gctx.lineWidth = 1;
    gctx.fillStyle = '#475569'; gctx.font = '10px sans-serif';
    for (var m = minMidi; m <= maxMidi; m += 12){
      var y = h - ((m - minMidi)/(maxMidi - minMidi)) * h;
      gctx.beginPath(); gctx.moveTo(0,y); gctx.lineTo(w,y); gctx.stroke();
      var oct = Math.floor(m/12) - 1;
      gctx.fillText('C' + oct, 4, y - 2);
    }
    // Plot pitch points
    if (!history.length) return;
    var t0 = history[0].t;
    var span = SAMPLE_HISTORY_SEC * 1000;
    gctx.fillStyle = '#22d3ee';
    for (var i = 0; i < history.length; i++){
      var p = history[i];
      if (!p.freq) continue;
      var x = ((p.t - t0) / span) * w;
      var y = h - ((p.midi - minMidi)/(maxMidi - minMidi)) * h;
      if (y < 0 || y > h) continue;
      gctx.fillRect(x - 1, y - 1, 2, 2);
    }
  }

  function holdPeak(){
    if (!recent.length){ setStatus('No recent pitch to hold. Sing first.', 'error'); return; }
    // Pick the entry with highest RMS in the last 2s
    var best = recent[0];
    for (var i = 1; i < recent.length; i++) if (recent[i].rms > best.rms) best = recent[i];
    var n = noteFromHz(best.freq);
    if (!n){ setStatus('No clear pitch in last 2 seconds.', 'error'); return; }
    holdLocked = {note: n, hz: best.freq};
    holdText.textContent = n.name + n.octave + ' (' + best.freq.toFixed(1) + ' Hz, ' + (n.cents>0?'+':'') + n.cents + ' cents)';
    holdBtn.classList.add('pd-locked');
  }

  function reset(){
    history.length = 0; recent.length = 0;
    holdLocked = null; holdText.textContent = 'none';
    holdBtn.classList.remove('pd-locked');
    drawGraph();
  }

  toggleBtn.addEventListener('click', function(){ if (running) stop(); else start(); });
  holdBtn.addEventListener('click', holdPeak);
  resetBtn.addEventListener('click', reset);
  threshInput.addEventListener('input', function(){
    threshold = parseFloat(threshInput.value);
    threshVal.textContent = threshold.toFixed(3);
  });

  drawGraph();
})();
</script>
