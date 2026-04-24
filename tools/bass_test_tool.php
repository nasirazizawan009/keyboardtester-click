<?php
// bass_test_tool.php – embeddable Bass Test module (no <html> shell)
// Low-frequency sweep and tone testing (20-200 Hz)
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

  .bass-container { max-width: 1200px; margin: 0 auto; padding: clamp(8px, 1.5vw, 16px); }

  .bass-grid { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(12px, 2.2vw, 24px); align-items: start; }
  @media (max-width: 1080px) { .bass-grid { grid-template-columns: 1fr; } }

  .bass-card { background: var(--card); border: 1px solid var(--border); border-radius: 16px; box-shadow: var(--shadow); padding: 20px; }

  .bass-visualizer { position: relative; width: 100%; background: linear-gradient(135deg, #1e1e2f 0%, #2a2a3d 100%); border-radius: 12px; overflow: hidden; aspect-ratio: 16/9; display: flex; align-items: center; justify-content: center; }
  .bass-canvas { width: 100%; height: 100%; }
  .bass-placeholder { color: #e2e8f0; text-align: center; padding: 40px 20px; }
  .bass-placeholder-icon { font-size: 64px; margin-bottom: 16px; opacity: 0.7; }

  .bass-overlay { position: absolute; top: 12px; left: 12px; right: 12px; display: flex; justify-content: space-between; align-items: flex-start; z-index: 10; pointer-events: none; }
  .bass-badge { background: rgba(0,0,0,0.75); color: #fff; padding: 6px 12px; border-radius: 8px; font-size: 12px; backdrop-filter: blur(10px); }
  .bass-status-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--success); display: inline-block; margin-right: 6px; animation: bass-pulse 2s infinite; }
  @keyframes bass-pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }

  .bass-controls { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 16px; }
  .bass-btn { appearance: none; border: none; padding: 11px 15px; border-radius: 10px; font-weight: 700; cursor: pointer; transition: transform .05s ease, filter .2s ease; font-size: 14px; }
  .bass-btn:active { transform: translateY(1px); }
  .bass-btn:disabled { opacity: 0.5; cursor: not-allowed; }
  .bass-btn-primary { background: linear-gradient(180deg, var(--primary), var(--primary-2)); color: #fff; }
  .bass-btn-danger { background: var(--danger); color: #fff; }

  .bass-freq-grid { display: grid; gap: 10px; margin-top: 16px; }
  .bass-freq-btn { padding: 16px; text-align: center; background: #f8fafc; border: 2px solid var(--border); border-radius: 10px; cursor: pointer; transition: all 0.2s; font-weight: 700; font-size: 15px; }
  .bass-freq-btn:hover { background: #e2e8f0; transform: translateY(-2px); }
  .bass-freq-btn.active { background: linear-gradient(135deg, var(--primary), var(--primary-2)); color: white; border-color: var(--primary); }
  .bass-freq-label { font-size: 13px; opacity: 0.8; margin-top: 4px; }

  .bass-sweep-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; margin-top: 16px; }
  .bass-sweep-item { padding: 16px; background: #f8fafc; border: 2px solid var(--border); border-radius: 10px; cursor: pointer; transition: all 0.2s; text-align: center; }
  .bass-sweep-item:hover { background: #e2e8f0; transform: translateY(-2px); }
  .bass-sweep-item.active { background: linear-gradient(135deg, var(--primary), var(--primary-2)); color: white; border-color: var(--primary); }
  .bass-sweep-title { font-weight: 700; font-size: 15px; }
  .bass-sweep-desc { font-size: 12px; opacity: 0.8; margin-top: 4px; }

  .bass-info-grid { display: grid; gap: 12px; margin-top: 16px; }
  .bass-info-item { display: flex; justify-content: space-between; align-items: center; padding: 12px; background: #f8fafc; border-radius: 8px; border: 1px solid var(--border); }
  .bass-info-label { color: var(--muted); font-size: 13px; font-weight: 600; }
  .bass-info-value { color: var(--text); font-weight: 700; font-size: 14px; }

  .bass-slider-container { display: grid; gap: 8px; margin-top: 16px; }
  .bass-slider-label { display: flex; justify-content: space-between; font-size: 13px; font-weight: 600; color: var(--muted); }
  .bass-slider { width: 100%; height: 8px; border-radius: 5px; background: #e2e8f0; outline: none; appearance: none; cursor: pointer; }
  .bass-slider::-webkit-slider-thumb { appearance: none; width: 20px; height: 20px; border-radius: 50%; background: var(--primary); cursor: pointer; border: 3px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.2); }
  .bass-slider::-moz-range-thumb { width: 20px; height: 20px; border-radius: 50%; background: var(--primary); cursor: pointer; border: 3px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.2); }

  .bass-alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
  .bass-alert-info { background: #eff6ff; border: 1px solid #bfdbfe; color: #1e40af; }
  .bass-alert-warning { background: #fef3c7; border: 1px solid #fde68a; color: #92400e; }

  .bass-waveform-container { position: relative; width: 100%; height: 120px; background: #f8fafc; border-radius: 8px; border: 1px solid var(--border); margin-top: 16px; overflow: hidden; }
  .bass-waveform { width: 100%; height: 100%; }

  @media (max-width: 768px) {
    .bass-sweep-grid { grid-template-columns: 1fr; }
  }
</style>

<div class="bass-container">
  <div class="bass-grid">
    <!-- Main Visualizer Section -->
    <div>
      <div class="bass-card">
        <div id="bass-infoAlert" class="bass-alert bass-alert-info">
          🔊 <strong>Tip:</strong> Use a subwoofer or bass-capable speaker for best results. Start with lower volumes and increase gradually to feel the bass frequencies.
        </div>

        <div class="bass-visualizer" id="bass-visualizer">
          <div class="bass-placeholder" id="bass-placeholder">
            <div class="bass-placeholder-icon">🔉</div>
            <p style="margin: 0; font-size: 16px; font-weight: 600;">Bass Visualizer</p>
            <p style="margin: 8px 0 0; font-size: 13px;">Select a frequency below to begin</p>
          </div>
          <canvas id="bass-canvas" class="bass-canvas" style="display: none;"></canvas>
          <div class="bass-overlay" id="bass-overlay" style="display: none;">
            <div class="bass-badge">
              <span class="bass-status-dot"></span>
              <span id="bass-statusText">Playing</span>
            </div>
            <div class="bass-badge" id="bass-frequencyBadge">-</div>
          </div>
        </div>

        <div class="bass-controls">
          <button id="bass-stopBtn" class="bass-btn bass-btn-danger" disabled>Stop Audio</button>
        </div>

        <!-- Waveform Meter -->
        <canvas id="bass-waveform" class="bass-waveform" style="display: none; margin-top: 16px;"></canvas>

        <!-- Volume Control -->
        <div class="bass-slider-container">
          <div class="bass-slider-label">
            <span>Volume</span>
            <span id="bass-volumeValue">30%</span>
          </div>
          <input type="range" id="bass-volumeSlider" class="bass-slider" min="0" max="100" value="30">
        </div>
      </div>
    </div>

    <!-- Tests & Settings Section -->
    <div>
      <!-- Quick Frequency Tests -->
      <div class="bass-card" style="margin-bottom: 16px;">
        <h3 style="margin: 0 0 16px; font-size: 16px;">Quick Bass Test Frequencies</h3>
        <div class="bass-freq-grid">
          <button class="bass-freq-btn" data-freq="40">
            <div>40 Hz</div>
            <div class="bass-freq-label">Sub-Bass</div>
          </button>
          <button class="bass-freq-btn" data-freq="60">
            <div>60 Hz</div>
            <div class="bass-freq-label">Deep Bass</div>
          </button>
          <button class="bass-freq-btn" data-freq="80">
            <div>80 Hz</div>
            <div class="bass-freq-label">Low Bass</div>
          </button>
          <button class="bass-freq-btn" data-freq="100">
            <div>100 Hz</div>
            <div class="bass-freq-label">Bass Kick</div>
          </button>
          <button class="bass-freq-btn" data-freq="150">
            <div>150 Hz</div>
            <div class="bass-freq-label">Mid Bass</div>
          </button>
          <button class="bass-freq-btn" data-freq="200">
            <div>200 Hz</div>
            <div class="bass-freq-label">Upper Bass</div>
          </button>
        </div>
      </div>

      <!-- Bass Sweep Tests -->
      <div class="bass-card" style="margin-bottom: 16px;">
        <h3 style="margin: 0 0 16px; font-size: 16px;">Sweep Tests</h3>
        <div class="bass-sweep-grid">
          <div class="bass-sweep-item" data-sweep="full">
            <div class="bass-sweep-title">📊 Full Sweep</div>
            <div class="bass-sweep-desc">20Hz to 200Hz</div>
          </div>
          <div class="bass-sweep-item" data-sweep="sub">
            <div class="bass-sweep-title">🎯 Sub-Bass</div>
            <div class="bass-sweep-desc">20Hz to 60Hz</div>
          </div>
          <div class="bass-sweep-item" data-sweep="mid">
            <div class="bass-sweep-title">📈 Mid Bass</div>
            <div class="bass-sweep-desc">80Hz to 150Hz</div>
          </div>
          <div class="bass-sweep-item" data-sweep="upper">
            <div class="bass-sweep-title">🎼 Upper Bass</div>
            <div class="bass-sweep-desc">150Hz to 200Hz</div>
          </div>
        </div>
      </div>

      <!-- Audio Information -->
      <div class="bass-card">
        <h3 style="margin: 0 0 16px; font-size: 16px;">Test Information</h3>
        <div class="bass-info-grid">
          <div class="bass-info-item">
            <span class="bass-info-label">Status</span>
            <span class="bass-info-value" id="bass-infoStatus">Ready</span>
          </div>
          <div class="bass-info-item">
            <span class="bass-info-label">Current Test</span>
            <span class="bass-info-value" id="bass-infoTest">None</span>
          </div>
          <div class="bass-info-item">
            <span class="bass-info-label">Frequency</span>
            <span class="bass-info-value" id="bass-infoFrequency">-</span>
          </div>
          <div class="bass-info-item">
            <span class="bass-info-label">Duration</span>
            <span class="bass-info-value" id="bass-infoDuration">-</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
(()=>{
  'use strict';

  // Audio Context and Elements
  let audioContext = null;
  let oscillator = null;
  let gainNode = null;
  let analyser = null;
  let animationId = null;
  let sweepStartTime = null;

  const canvas = document.getElementById('bass-canvas');
  const ctx = canvas.getContext('2d');
  const waveformCanvas = document.getElementById('bass-waveform');
  const waveformCtx = waveformCanvas ? waveformCanvas.getContext('2d') : null;

  const placeholder = document.getElementById('bass-placeholder');
  const overlay = document.getElementById('bass-overlay');
  const stopBtn = document.getElementById('bass-stopBtn');
  const volumeSlider = document.getElementById('bass-volumeSlider');
  const volumeValue = document.getElementById('bass-volumeValue');
  const statusText = document.getElementById('bass-statusText');
  const frequencyBadge = document.getElementById('bass-frequencyBadge');

  const infoStatus = document.getElementById('bass-infoStatus');
  const infoTest = document.getElementById('bass-infoTest');
  const infoFrequency = document.getElementById('bass-infoFrequency');
  const infoDuration = document.getElementById('bass-infoDuration');

  const freqButtons = document.querySelectorAll('.bass-freq-btn');
  const sweepItems = document.querySelectorAll('.bass-sweep-item');

  let currentFrequency = null;
  let sweepConfig = null;
  let elapsedTime = 0;
  let updateInterval = null;

  // Initialize canvas size
  function resizeCanvas() {
    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;

    if (waveformCanvas) {
      waveformCanvas.width = waveformCanvas.offsetWidth;
      waveformCanvas.height = waveformCanvas.offsetHeight;
    }
  }
  resizeCanvas();
  window.addEventListener('resize', resizeCanvas);

  // Initialize Audio Context
  function initAudioContext() {
    if (!audioContext) {
      audioContext = new (window.AudioContext || window.webkitAudioContext)();
      analyser = audioContext.createAnalyser();
      analyser.fftSize = 2048;
      gainNode = audioContext.createGain();
      gainNode.gain.value = 0.3;

      analyser.connect(audioContext.destination);
      gainNode.connect(analyser);
    }
  }

  // Stop all audio
  function stopAudio() {
    if (oscillator) {
      oscillator.stop();
      oscillator.disconnect();
      oscillator = null;
    }
    if (animationId) {
      cancelAnimationFrame(animationId);
      animationId = null;
    }
    if (updateInterval) {
      clearInterval(updateInterval);
      updateInterval = null;
    }

    canvas.style.display = 'none';
    if (waveformCanvas) waveformCanvas.style.display = 'none';
    placeholder.style.display = 'block';
    overlay.style.display = 'none';
    stopBtn.disabled = true;

    // Remove active class
    document.querySelectorAll('.bass-freq-btn, .bass-sweep-item').forEach(btn => {
      btn.classList.remove('active');
    });

    updateInfo(true);
  }

  // Play frequency tone
  function playFrequency(frequency, label = '') {
    stopAudio();
    initAudioContext();

    oscillator = audioContext.createOscillator();
    oscillator.type = 'sine';
    oscillator.frequency.value = frequency;

    oscillator.connect(gainNode);
    oscillator.start();

    currentFrequency = frequency;
    sweepStartTime = null;
    elapsedTime = 0;

    startVisualization(false);
    stopBtn.disabled = false;

    updateInfo(false, `${frequency}Hz Tone`, frequency, 'Continuous', label);

    // Update elapsed time
    updateInterval = setInterval(() => {
      elapsedTime++;
      infoDuration.textContent = formatTime(elapsedTime);
    }, 1000);
  }

  // Play sweep
  function playSweep(startFreq, endFreq, label = '', duration = 10) {
    stopAudio();
    initAudioContext();

    oscillator = audioContext.createOscillator();
    oscillator.type = 'sine';
    oscillator.frequency.value = startFreq;

    oscillator.connect(gainNode);
    oscillator.start();

    sweepStartTime = audioContext.currentTime;
    sweepConfig = { startFreq, endFreq, duration, label };
    elapsedTime = 0;

    oscillator.frequency.exponentialRampToValueAtTime(
      endFreq,
      audioContext.currentTime + duration
    );

    // Auto-stop after sweep completes
    setTimeout(() => {
      if (oscillator) {
        stopAudio();
      }
    }, duration * 1000);

    startVisualization(true);
    stopBtn.disabled = false;

    updateInfo(false, `Sweep ${startFreq}-${endFreq}Hz`, `${startFreq}-${endFreq}Hz`, `${duration}s`, label);

    // Update elapsed time
    updateInterval = setInterval(() => {
      elapsedTime++;
      if (elapsedTime <= duration) {
        infoDuration.textContent = `${elapsedTime}s / ${duration}s`;
      }
    }, 1000);
  }

  // Format time display
  function formatTime(seconds) {
    return `${seconds}s`;
  }

  // Start visualization
  function startVisualization(isSweep = false) {
    placeholder.style.display = 'none';
    canvas.style.display = 'block';
    if (waveformCanvas) waveformCanvas.style.display = 'block';
    overlay.style.display = 'flex';

    const bufferLength = analyser.frequencyBinCount;
    const dataArray = new Uint8Array(bufferLength);

    function draw() {
      animationId = requestAnimationFrame(draw);

      analyser.getByteFrequencyData(dataArray);

      // Main frequency visualization
      ctx.fillStyle = '#1e1e2f';
      ctx.fillRect(0, 0, canvas.width, canvas.height);

      const barWidth = (canvas.width / bufferLength) * 2.5;
      let barHeight;
      let x = 0;

      for (let i = 0; i < bufferLength; i++) {
        barHeight = (dataArray[i] / 255) * canvas.height * 0.9;

        // Color gradient - bass frequencies get emphasize
        const hue = (i / bufferLength) * 360;
        ctx.fillStyle = `hsl(${hue}, 70%, 50%)`;

        ctx.fillRect(x, canvas.height - barHeight, barWidth, barHeight);
        x += barWidth + 1;
      }

      // Waveform visualization
      if (waveformCtx) {
        waveformCtx.fillStyle = '#f8fafc';
        waveformCtx.fillRect(0, 0, waveformCanvas.width, waveformCanvas.height);

        // Draw center line
        waveformCtx.strokeStyle = '#e2e8f0';
        waveformCtx.beginPath();
        waveformCtx.moveTo(0, waveformCanvas.height / 2);
        waveformCtx.lineTo(waveformCanvas.width, waveformCanvas.height / 2);
        waveformCtx.stroke();

        // Draw waveform
        waveformCtx.strokeStyle = '#4b5eaa';
        waveformCtx.lineWidth = 2;
        waveformCtx.beginPath();

        const sliceWidth = waveformCanvas.width / bufferLength;
        let posX = 0;

        for (let i = 0; i < bufferLength; i++) {
          const value = dataArray[i] / 255;
          const y = (1 - value) * waveformCanvas.height / 2 + waveformCanvas.height / 4;

          if (i === 0) {
            waveformCtx.moveTo(posX, y);
          } else {
            waveformCtx.lineTo(posX, y);
          }

          posX += sliceWidth;
        }
        waveformCtx.stroke();
      }

      // Update frequency badge for sweep
      if (isSweep && oscillator && sweepStartTime) {
        const elapsed = audioContext.currentTime - sweepStartTime;
        if (sweepConfig && elapsed <= sweepConfig.duration) {
          const ratio = elapsed / sweepConfig.duration;
          const currentFreq = sweepConfig.startFreq * Math.pow(sweepConfig.endFreq / sweepConfig.startFreq, ratio);
          frequencyBadge.textContent = `${Math.round(currentFreq)}Hz`;
          infoFrequency.textContent = `${Math.round(currentFreq)}Hz`;
        }
      }
    }

    draw();
  }

  // Update information
  function updateInfo(reset = false, testName = '', frequency = '', duration = '', label = '') {
    if (reset) {
      infoStatus.textContent = 'Ready';
      infoStatus.style.color = 'var(--muted)';
      infoTest.textContent = 'None';
      infoFrequency.textContent = '-';
      infoDuration.textContent = '-';
      currentFrequency = null;
      sweepConfig = null;
      return;
    }

    infoStatus.textContent = 'Playing';
    infoStatus.style.color = 'var(--success)';
    infoTest.textContent = testName;
    infoFrequency.textContent = frequency;
    frequencyBadge.textContent = frequency;
  }

  // Frequency button handlers
  freqButtons.forEach(btn => {
    btn.addEventListener('click', function() {
      const freq = parseInt(this.dataset.freq);
      playFrequency(freq, this.querySelector('.bass-freq-label').textContent);

      freqButtons.forEach(b => b.classList.remove('active'));
      sweepItems.forEach(s => s.classList.remove('active'));
      this.classList.add('active');
    });
  });

  // Sweep item handlers
  sweepItems.forEach(item => {
    item.addEventListener('click', function() {
      const sweepType = this.dataset.sweep;

      let startFreq, endFreq, label;

      switch(sweepType) {
        case 'full':
          startFreq = 20;
          endFreq = 200;
          label = 'Full Sweep';
          break;
        case 'sub':
          startFreq = 20;
          endFreq = 60;
          label = 'Sub-Bass';
          break;
        case 'mid':
          startFreq = 80;
          endFreq = 150;
          label = 'Mid Bass';
          break;
        case 'upper':
          startFreq = 150;
          endFreq = 200;
          label = 'Upper Bass';
          break;
      }

      playSweep(startFreq, endFreq, label, 10);

      freqButtons.forEach(b => b.classList.remove('active'));
      sweepItems.forEach(s => s.classList.remove('active'));
      this.classList.add('active');
    });
  });

  // Volume control
  volumeSlider.addEventListener('input', function() {
    const volume = this.value / 100;
    volumeValue.textContent = this.value + '%';

    if (gainNode) {
      gainNode.gain.value = volume;
    }
  });

  // Stop button
  stopBtn.addEventListener('click', stopAudio);

  // Cleanup on page unload
  window.addEventListener('beforeunload', () => {
    stopAudio();
    if (audioContext) {
      audioContext.close();
    }
  });
})();
</script>
