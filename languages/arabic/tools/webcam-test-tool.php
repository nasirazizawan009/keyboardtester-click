<?php
// Arabic Webcam Tester tool - اختبار الكاميرا
?>
<style>
  :root {
    --bg: #f6f8fc;
    --card: #ffffff;
    --text: #0f172a;
    --muted: #64748b;
    --primary: #4b5eaa;
    --primary-2: #7d8bc1;
    --accent: #f59e0b;
    --success: #10b981;
    --danger: #ef4444;
    --ring: rgba(125,139,193,0.35);
    --border: #e2e8f0;
    --shadow: 0 10px 25px rgba(17, 24, 39, 0.08);
  }

  .wc-container { max-width: 1200px; margin: 0 auto; padding: clamp(8px, 1.5vw, 16px); font-family: 'Tajawal', sans-serif; direction: rtl; }

  .wc-grid { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(12px, 2.2vw, 24px); align-items: start; }
  @media (max-width: 1080px) { .wc-grid { grid-template-columns: 1fr; } }

  .wc-card { background: var(--card); border: 1px solid var(--border); border-radius: 16px; box-shadow: var(--shadow); padding: 20px; }

  .wc-video-container { position: relative; width: 100%; background: #000; border-radius: 12px; overflow: hidden; aspect-ratio: 16/9; display: flex; align-items: center; justify-content: center; }
  .wc-video-container video { width: 100%; height: 100%; object-fit: cover; }
  .wc-placeholder { color: var(--muted); text-align: center; padding: 40px 20px; }
  .wc-placeholder-icon { font-size: 64px; margin-bottom: 16px; opacity: 0.5; }

  .wc-overlay { position: absolute; top: 12px; left: 12px; right: 12px; display: flex; justify-content: space-between; align-items: flex-start; z-index: 10; }
  .wc-badge { background: rgba(0,0,0,0.75); color: #fff; padding: 6px 12px; border-radius: 8px; font-size: 12px; backdrop-filter: blur(10px); }
  .wc-status-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--success); display: inline-block; margin-left: 6px; animation: wc-pulse 2s infinite; }
  @keyframes wc-pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }

  .wc-controls { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 16px; }
  .wc-btn { appearance: none; border: none; padding: 11px 15px; border-radius: 10px; font-weight: 700; cursor: pointer; transition: transform .05s ease, filter .2s ease; font-size: 14px; font-family: 'Tajawal', sans-serif; }
  .wc-btn:active { transform: translateY(1px); }
  .wc-btn:disabled { opacity: 0.5; cursor: not-allowed; }
  .wc-btn-primary { background: linear-gradient(180deg, var(--primary), var(--primary-2)); color: #fff; }
  .wc-btn-accent { background: var(--accent); color: #111827; }
  .wc-btn-danger { background: var(--danger); color: #fff; }
  .wc-btn-ghost { background: #fff; color: var(--primary); border: 1px solid var(--border); }

  .wc-info-grid { display: grid; gap: 12px; }
  .wc-info-item { display: flex; justify-content: space-between; align-items: center; padding: 12px; background: #f8fafc; border-radius: 8px; border: 1px solid var(--border); }
  .wc-info-label { color: var(--muted); font-size: 13px; font-weight: 600; }
  .wc-info-value { color: var(--text); font-weight: 700; font-size: 14px; }

  .wc-select { width: 100%; padding: 11px 13px; border-radius: 10px; border: 1px solid var(--border); outline: none; background: #fff; color: var(--text); transition: box-shadow .2s, border-color .2s; font-size: 14px; font-family: 'Tajawal', sans-serif; }
  .wc-select:focus { border-color: var(--primary-2); box-shadow: 0 0 0 4px var(--ring); }

  .wc-snapshots { display: grid; grid-template-columns: repeat(auto-fill, minmax(120px, 1fr)); gap: 12px; margin-top: 16px; }
  .wc-snapshot { position: relative; border-radius: 8px; overflow: hidden; border: 2px solid var(--border); aspect-ratio: 16/9; }
  .wc-snapshot img { width: 100%; height: 100%; object-fit: cover; }
  .wc-snapshot-delete { position: absolute; top: 4px; left: 4px; background: var(--danger); color: #fff; border: none; border-radius: 50%; width: 24px; height: 24px; cursor: pointer; font-size: 12px; display: flex; align-items: center; justify-content: center; }

  .wc-settings { display: grid; gap: 16px; }
  .wc-setting-item { display: grid; gap: 8px; }

  .wc-alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
  .wc-alert-error { background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; }
  .wc-alert-info { background: #eff6ff; border: 1px solid #bfdbfe; color: #1e40af; }

  .wc-feature-list { display: grid; gap: 8px; margin-top: 12px; }
  .wc-feature-item { display: flex; align-items: center; gap: 10px; padding: 10px; background: #f8fafc; border-radius: 8px; }
  .wc-feature-icon { font-size: 20px; }
  .wc-feature-text { font-size: 13px; color: var(--text); }

  @media (max-width: 768px) {
    .wc-snapshots { grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); }
  }
</style>

<div class="wc-container">
  <div class="wc-grid">
    <!-- Main Video Section -->
    <div>
      <div class="wc-card">
        <div id="wc-errorAlert" class="wc-alert wc-alert-error" style="display: none;"></div>
        <div id="wc-infoAlert" class="wc-alert wc-alert-info" style="display: none;"></div>

        <div class="wc-video-container" id="wc-videoContainer">
          <div class="wc-placeholder" id="wc-placeholder">
            <div class="wc-placeholder-icon">📹</div>
            <p style="margin: 0; font-size: 16px; font-weight: 600;">معاينة الكاميرا</p>
            <p style="margin: 8px 0 0; font-size: 13px;">انقر "بدء الكاميرا" لبدء الاختبار</p>
          </div>
          <video id="wc-video" autoplay playsinline style="display: none;"></video>
          <div class="wc-overlay" id="wc-overlay" style="display: none;">
            <div class="wc-badge">
              <span class="wc-status-dot"></span>
              <span id="wc-statusText">مباشر</span>
            </div>
            <div class="wc-badge" id="wc-resolutionBadge">جاري التحميل...</div>
          </div>
        </div>

        <div class="wc-controls">
          <button id="wc-startBtn" class="wc-btn wc-btn-primary">بدء الكاميرا</button>
          <button id="wc-stopBtn" class="wc-btn wc-btn-danger" disabled>إيقاف الكاميرا</button>
          <button id="wc-snapshotBtn" class="wc-btn wc-btn-accent" disabled>التقاط صورة</button>
          <button id="wc-downloadBtn" class="wc-btn wc-btn-ghost" disabled>تحميل الكل</button>
        </div>

        <!-- Snapshots Section -->
        <div id="wc-snapshotsSection" style="display: none;">
          <h4 style="margin: 20px 0 0; font-size: 14px; color: var(--muted);">الصور الملتقطة (<span id="wc-snapshotCount">0</span>)</h4>
          <div class="wc-snapshots" id="wc-snapshots"></div>
        </div>
      </div>
    </div>

    <!-- Info & Settings Section -->
    <div>
      <!-- Webcam Information -->
      <div class="wc-card" style="margin-bottom: 16px;">
        <h3 style="margin: 0 0 16px; font-size: 16px;">معلومات الكاميرا</h3>
        <div class="wc-info-grid">
          <div class="wc-info-item">
            <span class="wc-info-label">الحالة</span>
            <span class="wc-info-value" id="wc-infoStatus">قبل البدء</span>
          </div>
          <div class="wc-info-item">
            <span class="wc-info-label">الدقة</span>
            <span class="wc-info-value" id="wc-infoResolution">-</span>
          </div>
          <div class="wc-info-item">
            <span class="wc-info-label">نسبة العرض</span>
            <span class="wc-info-value" id="wc-infoAspect">-</span>
          </div>
          <div class="wc-info-item">
            <span class="wc-info-label">معدل الإطارات</span>
            <span class="wc-info-value" id="wc-infoFPS">-</span>
          </div>
          <div class="wc-info-item">
            <span class="wc-info-label">الجهاز</span>
            <span class="wc-info-value" id="wc-infoDevice">-</span>
          </div>
        </div>
      </div>

      <!-- Settings -->
      <div class="wc-card">
        <h3 style="margin: 0 0 16px; font-size: 16px;">الإعدادات</h3>
        <div class="wc-settings">
          <div class="wc-setting-item">
            <label for="wc-cameraSelect" style="font-size: 13px; font-weight: 600; color: var(--muted);">اختيار الكاميرا</label>
            <select id="wc-cameraSelect" class="wc-select">
              <option value="">جاري تحميل الكاميرات...</option>
            </select>
          </div>

          <div class="wc-setting-item">
            <label for="wc-resolutionSelect" style="font-size: 13px; font-weight: 600; color: var(--muted);">الدقة المفضلة</label>
            <select id="wc-resolutionSelect" class="wc-select">
              <option value="default">تلقائي (افتراضي)</option>
              <option value="4k">4K (3840x2160)</option>
              <option value="1080p">Full HD (1920x1080)</option>
              <option value="720p">HD (1280x720)</option>
              <option value="480p">SD (640x480)</option>
            </select>
          </div>
        </div>

        <!-- Quick Features -->
        <div style="margin-top: 20px;">
          <h4 style="margin: 0 0 12px; font-size: 14px; color: var(--muted);">الميزات</h4>
          <div class="wc-feature-list">
            <div class="wc-feature-item">
              <span class="wc-feature-icon">✓</span>
              <span class="wc-feature-text">معاينة فيديو مباشرة</span>
            </div>
            <div class="wc-feature-item">
              <span class="wc-feature-icon">✓</span>
              <span class="wc-feature-text">دعم كاميرات متعددة</span>
            </div>
            <div class="wc-feature-item">
              <span class="wc-feature-icon">✓</span>
              <span class="wc-feature-text">التقاط وتحميل الصور</span>
            </div>
            <div class="wc-feature-item">
              <span class="wc-feature-icon">✓</span>
              <span class="wc-feature-text">اكتشاف الدقة</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<canvas id="wc-canvas" style="display: none;"></canvas>

<script>
(()=>{
  'use strict';

  const video = document.getElementById('wc-video');
  const placeholder = document.getElementById('wc-placeholder');
  const overlay = document.getElementById('wc-overlay');
  const startBtn = document.getElementById('wc-startBtn');
  const stopBtn = document.getElementById('wc-stopBtn');
  const snapshotBtn = document.getElementById('wc-snapshotBtn');
  const downloadBtn = document.getElementById('wc-downloadBtn');
  const cameraSelect = document.getElementById('wc-cameraSelect');
  const resolutionSelect = document.getElementById('wc-resolutionSelect');
  const canvas = document.getElementById('wc-canvas');
  const ctx = canvas.getContext('2d');
  const snapshotsDiv = document.getElementById('wc-snapshots');
  const snapshotsSection = document.getElementById('wc-snapshotsSection');
  const snapshotCount = document.getElementById('wc-snapshotCount');
  const errorAlert = document.getElementById('wc-errorAlert');
  const infoAlert = document.getElementById('wc-infoAlert');

  let stream = null;
  let snapshots = [];

  // Get available cameras
  async function getCameras() {
    try {
      const devices = await navigator.mediaDevices.enumerateDevices();
      const cameras = devices.filter(device => device.kind === 'videoinput');

      cameraSelect.innerHTML = '';
      if (cameras.length === 0) {
        cameraSelect.innerHTML = '<option value="">لم يتم العثور على كاميرا</option>';
        return;
      }

      cameras.forEach((camera, index) => {
        const option = document.createElement('option');
        option.value = camera.deviceId;
        option.textContent = camera.label || `كاميرا ${index + 1}`;
        cameraSelect.appendChild(option);
      });
    } catch (err) {
      console.error('Error getting cameras:', err);
      cameraSelect.innerHTML = '<option value="">خطأ في تحميل الكاميرات</option>';
    }
  }

  // Get resolution constraints
  function getResolutionConstraints(preset) {
    const resolutions = {
      '4k': { width: 3840, height: 2160 },
      '1080p': { width: 1920, height: 1080 },
      '720p': { width: 1280, height: 720 },
      '480p': { width: 640, height: 480 }
    };
    return resolutions[preset] || {};
  }

  // Start webcam
  async function startWebcam() {
    try {
      hideError();
      const selectedCamera = cameraSelect.value;
      const selectedResolution = resolutionSelect.value;

      const constraints = {
        video: {
          deviceId: selectedCamera ? { exact: selectedCamera } : undefined,
          ...getResolutionConstraints(selectedResolution)
        },
        audio: false
      };

      stream = await navigator.mediaDevices.getUserMedia(constraints);
      video.srcObject = stream;

      video.onloadedmetadata = () => {
        placeholder.style.display = 'none';
        video.style.display = 'block';
        overlay.style.display = 'flex';

        updateInfo();
        startBtn.disabled = true;
        stopBtn.disabled = false;
        snapshotBtn.disabled = false;

        showInfo('تم بدء الكاميرا بنجاح!');
      };

    } catch (err) {
      console.error('Error accessing webcam:', err);
      showError('لا يمكن الوصول للكاميرا. تحقق من الأذونات وحاول مرة أخرى.');
    }
  }

  // Stop webcam
  function stopWebcam() {
    if (stream) {
      stream.getTracks().forEach(track => track.stop());
      stream = null;
    }

    video.style.display = 'none';
    placeholder.style.display = 'block';
    overlay.style.display = 'none';

    startBtn.disabled = false;
    stopBtn.disabled = true;
    snapshotBtn.disabled = true;

    updateInfo(true);
  }

  // Update information
  function updateInfo(reset = false) {
    if (reset) {
      document.getElementById('wc-infoStatus').textContent = 'قبل البدء';
      document.getElementById('wc-infoStatus').style.color = '';
      document.getElementById('wc-infoResolution').textContent = '-';
      document.getElementById('wc-infoAspect').textContent = '-';
      document.getElementById('wc-infoFPS').textContent = '-';
      document.getElementById('wc-infoDevice').textContent = '-';
      document.getElementById('wc-resolutionBadge').textContent = '-';
      return;
    }

    const videoTrack = stream.getVideoTracks()[0];
    const settings = videoTrack.getSettings();

    const width = settings.width || video.videoWidth;
    const height = settings.height || video.videoHeight;
    const fps = settings.frameRate || 30;
    const aspectRatio = (width / height).toFixed(2);

    document.getElementById('wc-infoStatus').textContent = 'نشط';
    document.getElementById('wc-infoStatus').style.color = 'var(--success)';
    document.getElementById('wc-infoResolution').textContent = `${width}x${height}`;
    document.getElementById('wc-infoAspect').textContent = `${aspectRatio}:1`;
    document.getElementById('wc-infoFPS').textContent = `${Math.round(fps)} إطار/ثانية`;
    document.getElementById('wc-infoDevice').textContent = videoTrack.label || 'الكاميرا الافتراضية';
    document.getElementById('wc-resolutionBadge').textContent = `${width}x${height}`;
  }

  // Take snapshot
  function takeSnapshot() {
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    ctx.drawImage(video, 0, 0);

    const dataUrl = canvas.toDataURL('image/png');
    snapshots.push({
      id: Date.now(),
      data: dataUrl,
      timestamp: new Date().toLocaleString('ar-SA')
    });

    renderSnapshots();
    snapshotsSection.style.display = 'block';
    downloadBtn.disabled = false;
  }

  // Render snapshots
  function renderSnapshots() {
    snapshotsDiv.innerHTML = '';
    snapshotCount.textContent = snapshots.length;

    snapshots.forEach(snapshot => {
      const div = document.createElement('div');
      div.className = 'wc-snapshot';

      const img = document.createElement('img');
      img.src = snapshot.data;
      img.alt = 'لقطة';

      const deleteBtn = document.createElement('button');
      deleteBtn.className = 'wc-snapshot-delete';
      deleteBtn.innerHTML = '×';
      deleteBtn.onclick = () => deleteSnapshot(snapshot.id);

      div.appendChild(img);
      div.appendChild(deleteBtn);
      snapshotsDiv.appendChild(div);
    });
  }

  // Delete snapshot
  function deleteSnapshot(id) {
    snapshots = snapshots.filter(s => s.id !== id);
    renderSnapshots();

    if (snapshots.length === 0) {
      snapshotsSection.style.display = 'none';
      downloadBtn.disabled = true;
    }
  }

  // Download all snapshots
  function downloadAll() {
    snapshots.forEach((snapshot, index) => {
      const link = document.createElement('a');
      link.href = snapshot.data;
      link.download = `لقطة-كاميرا-${index + 1}.png`;
      link.click();
    });
  }

  // Show error
  function showError(message) {
    errorAlert.textContent = message;
    errorAlert.style.display = 'block';
    setTimeout(() => errorAlert.style.display = 'none', 5000);
  }

  // Hide error
  function hideError() {
    errorAlert.style.display = 'none';
  }

  // Show info
  function showInfo(message) {
    infoAlert.textContent = message;
    infoAlert.style.display = 'block';
    setTimeout(() => infoAlert.style.display = 'none', 3000);
  }

  // Event listeners
  startBtn.addEventListener('click', startWebcam);
  stopBtn.addEventListener('click', stopWebcam);
  snapshotBtn.addEventListener('click', takeSnapshot);
  downloadBtn.addEventListener('click', downloadAll);

  cameraSelect.addEventListener('change', () => {
    if (stream) {
      stopWebcam();
      startWebcam();
    }
  });

  resolutionSelect.addEventListener('change', () => {
    if (stream) {
      stopWebcam();
      startWebcam();
    }
  });

  // Initialize
  getCameras();

  // Request camera permission to get labels
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
      stream.getTracks().forEach(track => track.stop());
      getCameras();
    })
    .catch(() => {
      // Permission denied, cameras will show as "كاميرا 1", "كاميرا 2", etc.
    });
})();
</script>
