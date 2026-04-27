<?php // webcam_mirror_tool.php — live webcam preview as a virtual mirror, scoped to .wm- ?>
<style>
  .wm-wrap{max-width:1100px;margin:0 auto;padding:clamp(8px,1.5vw,16px)}
  .wm-card{background:#fff;border:1px solid #e2e8f0;border-radius:16px;box-shadow:0 10px 25px rgba(17,24,39,.08);padding:20px;margin-bottom:14px}
  .wm-card h3{margin:0 0 12px;font-size:16px;color:#0f172a}
  .wm-stage{position:relative;width:100%;background:#000;border-radius:12px;overflow:hidden;aspect-ratio:16/9;display:flex;align-items:center;justify-content:center}
  .wm-stage video{width:100%;height:100%;object-fit:cover;display:block;background:#000;transition:filter .15s ease}
  .wm-stage video.wm-mirror{transform:scaleX(-1)}
  .wm-placeholder{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;color:#94a3b8;text-align:center;padding:20px}
  .wm-placeholder-icon{font-size:56px;margin-bottom:10px;opacity:.6}
  .wm-stage.wm-active .wm-placeholder{display:none}
  .wm-grid{position:absolute;inset:0;pointer-events:none;display:none}
  .wm-stage.wm-grid-on .wm-grid{display:block}
  .wm-grid::before,.wm-grid::after{content:"";position:absolute;background:rgba(255,255,255,.55);box-shadow:0 0 1px rgba(0,0,0,.6)}
  .wm-grid::before{left:33.333%;top:0;bottom:0;width:1px;box-shadow:200% 0 0 rgba(255,255,255,.55), 0 0 1px rgba(0,0,0,.6)}
  .wm-grid::after{left:0;right:0;top:33.333%;height:1px}
  .wm-grid i{position:absolute;background:rgba(255,255,255,.55)}
  .wm-grid i.v2{left:66.666%;top:0;bottom:0;width:1px}
  .wm-grid i.h2{left:0;right:0;top:66.666%;height:1px}
  .wm-badge{position:absolute;top:10px;left:10px;background:rgba(0,0,0,.6);color:#fff;padding:5px 10px;border-radius:6px;font-size:12px;backdrop-filter:blur(6px);z-index:5}
  .wm-controls{display:flex;flex-wrap:wrap;gap:10px;margin-top:14px}
  .wm-btn{appearance:none;border:none;padding:11px 16px;border-radius:10px;font-weight:700;cursor:pointer;font-size:14px;transition:filter .15s, transform .05s}
  .wm-btn:active{transform:translateY(1px)}
  .wm-btn:disabled{opacity:.5;cursor:not-allowed}
  .wm-btn-primary{background:linear-gradient(180deg,#4b5eaa,#7d8bc1);color:#fff}
  .wm-btn-accent{background:#f59e0b;color:#111827}
  .wm-btn-danger{background:#ef4444;color:#fff}
  .wm-btn-ghost{background:#fff;color:#4b5eaa;border:1px solid #e2e8f0}
  .wm-btn-toggle{background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
  .wm-btn-toggle.wm-on{background:#dcfce7;color:#166534;border-color:#86efac}
  .wm-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}
  @media (max-width:720px){.wm-row{grid-template-columns:1fr}}
  .wm-field{display:grid;gap:6px}
  .wm-field label{font-size:13px;font-weight:600;color:#475569}
  .wm-select{width:100%;padding:10px 12px;border-radius:10px;border:1px solid #e2e8f0;background:#fff;color:#0f172a;font-size:14px;outline:none}
  .wm-select:focus{border-color:#7d8bc1;box-shadow:0 0 0 4px rgba(125,139,193,.25)}
  .wm-slider-row{display:grid;grid-template-columns:1fr auto;gap:10px;align-items:center}
  .wm-slider-row input[type=range]{width:100%}
  .wm-slider-val{font-variant-numeric:tabular-nums;color:#0f172a;font-weight:700;font-size:13px;min-width:48px;text-align:right}
  .wm-alert{padding:10px 14px;border-radius:10px;font-size:13px;margin-bottom:12px}
  .wm-alert-error{background:#fef2f2;border:1px solid #fecaca;color:#991b1b}
  .wm-alert-info{background:#eff6ff;border:1px solid #bfdbfe;color:#1e40af}
  .wm-privacy{margin-top:10px;font-size:12px;color:#64748b;text-align:center}
</style>

<div class="wm-wrap">
  <div class="wm-card">
    <div id="wm-error" class="wm-alert wm-alert-error" style="display:none" role="alert"></div>

    <div class="wm-stage" id="wm-stage">
      <div class="wm-badge" id="wm-badge" style="display:none">Mirror</div>
      <div class="wm-placeholder" id="wm-placeholder">
        <div class="wm-placeholder-icon">&#129517;</div>
        <p style="margin:0;font-size:16px;font-weight:700">Webcam Mirror</p>
        <p style="margin:6px 0 0;font-size:13px">Click <strong>Start mirror</strong> to allow your camera and see a live mirrored preview.</p>
      </div>
      <video id="wm-video" class="wm-mirror" autoplay playsinline muted></video>
      <div class="wm-grid"><i class="v2"></i><i class="h2"></i></div>
    </div>

    <div class="wm-controls">
      <button id="wm-start" class="wm-btn wm-btn-primary">Start mirror</button>
      <button id="wm-stop" class="wm-btn wm-btn-danger" disabled>Stop</button>
      <button id="wm-mirror" class="wm-btn wm-btn-toggle wm-on" aria-pressed="true">Mirror: ON</button>
      <button id="wm-grid" class="wm-btn wm-btn-toggle" aria-pressed="false">Grid: OFF</button>
      <button id="wm-snap" class="wm-btn wm-btn-accent" disabled>Snapshot</button>
      <button id="wm-fs" class="wm-btn wm-btn-ghost" disabled>Fullscreen</button>
      <button id="wm-reset" class="wm-btn wm-btn-ghost">Reset filters</button>
    </div>

    <div class="wm-privacy">Privacy: the video stream stays in your browser. Nothing is uploaded, recorded, or sent to a server.</div>
  </div>

  <div class="wm-card">
    <h3>Camera &amp; image</h3>
    <div class="wm-row">
      <div class="wm-field">
        <label for="wm-camera">Camera</label>
        <select id="wm-camera" class="wm-select"><option value="">Loading cameras&hellip;</option></select>
      </div>
      <div class="wm-field">
        <label for="wm-bright">Brightness <span class="wm-slider-val" id="wm-brightVal">100%</span></label>
        <input id="wm-bright" type="range" min="0" max="200" step="1" value="100" aria-label="Brightness">
      </div>
    </div>
    <div class="wm-row" style="margin-top:14px">
      <div class="wm-field">
        <label for="wm-contrast">Contrast <span class="wm-slider-val" id="wm-contrastVal">100%</span></label>
        <input id="wm-contrast" type="range" min="0" max="200" step="1" value="100" aria-label="Contrast">
      </div>
      <div class="wm-field">
        <label>&nbsp;</label>
        <div style="font-size:12px;color:#64748b">Brightness and contrast change only how the preview is displayed; the camera signal itself is untouched.</div>
      </div>
    </div>
  </div>
</div>

<canvas id="wm-canvas" style="display:none"></canvas>

<script>
(()=>{
  'use strict';
  const stage = document.getElementById('wm-stage');
  const video = document.getElementById('wm-video');
  const placeholder = document.getElementById('wm-placeholder');
  const badge = document.getElementById('wm-badge');
  const errEl = document.getElementById('wm-error');
  const startBtn = document.getElementById('wm-start');
  const stopBtn = document.getElementById('wm-stop');
  const mirrorBtn = document.getElementById('wm-mirror');
  const gridBtn = document.getElementById('wm-grid');
  const snapBtn = document.getElementById('wm-snap');
  const fsBtn = document.getElementById('wm-fs');
  const resetBtn = document.getElementById('wm-reset');
  const camSel = document.getElementById('wm-camera');
  const brightSlider = document.getElementById('wm-bright');
  const contrastSlider = document.getElementById('wm-contrast');
  const brightVal = document.getElementById('wm-brightVal');
  const contrastVal = document.getElementById('wm-contrastVal');
  const canvas = document.getElementById('wm-canvas');

  let stream = null;
  let mirrorOn = true;
  let gridOn = false;

  function showError(msg){ errEl.textContent = msg; errEl.style.display='block'; }
  function hideError(){ errEl.style.display='none'; }

  function applyFilter(){
    const b = brightSlider.value, c = contrastSlider.value;
    video.style.filter = 'brightness(' + b + '%) contrast(' + c + '%)';
    brightVal.textContent = b + '%';
    contrastVal.textContent = c + '%';
  }

  function setMirror(on){
    mirrorOn = !!on;
    video.classList.toggle('wm-mirror', mirrorOn);
    mirrorBtn.classList.toggle('wm-on', mirrorOn);
    mirrorBtn.textContent = 'Mirror: ' + (mirrorOn ? 'ON' : 'OFF');
    mirrorBtn.setAttribute('aria-pressed', mirrorOn ? 'true' : 'false');
    badge.textContent = mirrorOn ? 'Mirror' : 'Raw';
  }

  function setGrid(on){
    gridOn = !!on;
    stage.classList.toggle('wm-grid-on', gridOn);
    gridBtn.classList.toggle('wm-on', gridOn);
    gridBtn.textContent = 'Grid: ' + (gridOn ? 'ON' : 'OFF');
    gridBtn.setAttribute('aria-pressed', gridOn ? 'true' : 'false');
  }

  async function listCameras(){
    try {
      const devices = await navigator.mediaDevices.enumerateDevices();
      const cams = devices.filter(d => d.kind === 'videoinput');
      camSel.innerHTML = '';
      if (!cams.length){
        camSel.innerHTML = '<option value="">No cameras found</option>';
        return;
      }
      cams.forEach((c,i)=>{
        const o = document.createElement('option');
        o.value = c.deviceId;
        o.textContent = c.label || ('Camera ' + (i+1));
        camSel.appendChild(o);
      });
    } catch(e){
      camSel.innerHTML = '<option value="">Error loading cameras</option>';
    }
  }

  function stopStream(){
    if (stream){ stream.getTracks().forEach(t => t.stop()); stream = null; }
    video.srcObject = null;
    stage.classList.remove('wm-active');
    badge.style.display = 'none';
    placeholder.style.display = 'flex';
    startBtn.disabled = false;
    stopBtn.disabled = true;
    snapBtn.disabled = true;
    fsBtn.disabled = true;
  }

  async function startStream(){
    hideError();
    try {
      const dev = camSel.value;
      const constraints = { audio:false, video: dev ? { deviceId: { exact: dev } } : true };
      stream = await navigator.mediaDevices.getUserMedia(constraints);
      video.srcObject = stream;
      await video.play().catch(()=>{});
      stage.classList.add('wm-active');
      placeholder.style.display = 'none';
      badge.style.display = 'block';
      badge.textContent = mirrorOn ? 'Mirror' : 'Raw';
      startBtn.disabled = true;
      stopBtn.disabled = false;
      snapBtn.disabled = false;
      fsBtn.disabled = false;
      // Re-list cameras to pick up labels now that permission is granted
      listCameras();
    } catch(err){
      let msg = 'Could not access webcam.';
      if (err && err.name === 'NotAllowedError') msg = 'Camera permission was denied. Allow camera access from the address bar and try again.';
      else if (err && err.name === 'NotFoundError') msg = 'No camera was detected on this device.';
      else if (err && err.name === 'NotReadableError') msg = 'Another app (Zoom, Teams, OBS, etc.) is using the camera. Close it and try again.';
      showError(msg);
    }
  }

  function takeSnapshot(){
    if (!stream) return;
    const w = video.videoWidth, h = video.videoHeight;
    if (!w || !h) return;
    canvas.width = w; canvas.height = h;
    const ctx = canvas.getContext('2d');
    ctx.save();
    // Apply same brightness/contrast as preview
    ctx.filter = 'brightness(' + brightSlider.value + '%) contrast(' + contrastSlider.value + '%)';
    if (mirrorOn){ ctx.translate(w, 0); ctx.scale(-1, 1); }
    ctx.drawImage(video, 0, 0, w, h);
    ctx.restore();
    canvas.toBlob(blob => {
      if (!blob) return;
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      const ts = new Date().toISOString().replace(/[:.]/g,'-').slice(0,19);
      a.href = url;
      a.download = 'mirror-snapshot-' + ts + '.png';
      document.body.appendChild(a); a.click(); a.remove();
      setTimeout(()=>URL.revokeObjectURL(url), 1500);
    }, 'image/png');
  }

  function goFullscreen(){
    const el = stage;
    const req = el.requestFullscreen || el.webkitRequestFullscreen || el.msRequestFullscreen;
    if (req) req.call(el).catch(()=>{});
  }

  function resetFilters(){
    brightSlider.value = 100;
    contrastSlider.value = 100;
    applyFilter();
  }

  // Wire up
  startBtn.addEventListener('click', startStream);
  stopBtn.addEventListener('click', stopStream);
  mirrorBtn.addEventListener('click', () => setMirror(!mirrorOn));
  gridBtn.addEventListener('click', () => setGrid(!gridOn));
  snapBtn.addEventListener('click', takeSnapshot);
  fsBtn.addEventListener('click', goFullscreen);
  resetBtn.addEventListener('click', resetFilters);
  brightSlider.addEventListener('input', applyFilter);
  contrastSlider.addEventListener('input', applyFilter);
  camSel.addEventListener('change', () => { if (stream){ stopStream(); startStream(); } });

  // Init
  setMirror(true);
  setGrid(false);
  applyFilter();
  if (navigator.mediaDevices && navigator.mediaDevices.enumerateDevices){
    listCameras();
  } else {
    showError('This browser does not support camera access (getUserMedia).');
    startBtn.disabled = true;
  }
})();
</script>
