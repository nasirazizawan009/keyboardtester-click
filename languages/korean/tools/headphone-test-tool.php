<?php
// Korean Headphone/Speaker Tester tool - 헤드폰/스피커 테스터
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

  .hs-container { max-width: 1200px; margin: 0 auto; padding: clamp(8px, 1.5vw, 16px); }

  .hs-grid { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(12px, 2.2vw, 24px); align-items: start; }
  @media (max-width: 1080px) { .hs-grid { grid-template-columns: 1fr; } }

  .hs-card { background: var(--card); border: 1px solid var(--border); border-radius: 16px; box-shadow: var(--shadow); padding: 20px; }

  .hs-visualizer { position: relative; width: 100%; background: linear-gradient(135deg, #1e1e2f 0%, #2a2a3d 100%); border-radius: 12px; overflow: hidden; aspect-ratio: 16/9; display: flex; align-items: center; justify-content: center; }
  .hs-canvas { width: 100%; height: 100%; }
  .hs-placeholder { color: #e2e8f0; text-align: center; padding: 40px 20px; }
  .hs-placeholder-icon { font-size: 64px; margin-bottom: 16px; opacity: 0.7; }

  .hs-overlay { position: absolute; top: 12px; left: 12px; right: 12px; display: flex; justify-content: space-between; align-items: flex-start; z-index: 10; pointer-events: none; }
  .hs-badge { background: rgba(0,0,0,0.75); color: #fff; padding: 6px 12px; border-radius: 8px; font-size: 12px; backdrop-filter: blur(10px); }
  .hs-status-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--success); display: inline-block; margin-right: 6px; animation: hs-pulse 2s infinite; }
  @keyframes hs-pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }

  .hs-controls { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 16px; }
  .hs-btn { appearance: none; border: none; padding: 11px 15px; border-radius: 10px; font-weight: 700; cursor: pointer; transition: transform .05s ease, filter .2s ease; font-size: 14px; }
  .hs-btn:active { transform: translateY(1px); }
  .hs-btn:disabled { opacity: 0.5; cursor: not-allowed; }
  .hs-btn-primary { background: linear-gradient(180deg, var(--primary), var(--primary-2)); color: #fff; }
  .hs-btn-accent { background: var(--accent); color: #111827; }
  .hs-btn-danger { background: var(--danger); color: #fff; }
  .hs-btn-success { background: var(--success); color: #fff; }

  .hs-test-grid { display: grid; gap: 12px; margin-top: 16px; }
  .hs-test-item { padding: 16px; background: #f8fafc; border-radius: 10px; border: 1px solid var(--border); cursor: pointer; transition: all 0.2s; }
  .hs-test-item:hover { background: #e2e8f0; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
  .hs-test-item.active { background: linear-gradient(135deg, var(--primary), var(--primary-2)); color: white; border-color: var(--primary); }
  .hs-test-title { font-weight: 700; font-size: 15px; margin-bottom: 4px; display: flex; align-items: center; gap: 8px; }
  .hs-test-desc { font-size: 12px; opacity: 0.8; }

  .hs-info-grid { display: grid; gap: 12px; }
  .hs-info-item { display: flex; justify-content: space-between; align-items: center; padding: 12px; background: #f8fafc; border-radius: 8px; border: 1px solid var(--border); }
  .hs-info-label { color: var(--muted); font-size: 13px; font-weight: 600; }
  .hs-info-value { color: var(--text); font-weight: 700; font-size: 14px; }

  .hs-slider-container { display: grid; gap: 8px; }
  .hs-slider-label { display: flex; justify-content: space-between; font-size: 13px; font-weight: 600; color: var(--muted); }
  .hs-slider { width: 100%; height: 8px; border-radius: 5px; background: #e2e8f0; outline: none; appearance: none; cursor: pointer; }
  .hs-slider::-webkit-slider-thumb { appearance: none; width: 20px; height: 20px; border-radius: 50%; background: var(--primary); cursor: pointer; border: 3px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.2); }
  .hs-slider::-moz-range-thumb { width: 20px; height: 20px; border-radius: 50%; background: var(--primary); cursor: pointer; border: 3px solid white; box-shadow: 0 2px 4px rgba(0,0,0,0.2); }

  .hs-channel-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
  .hs-channel-btn { padding: 20px; text-align: center; background: #f8fafc; border: 2px solid var(--border); border-radius: 10px; cursor: pointer; transition: all 0.2s; font-weight: 700; font-size: 16px; }
  .hs-channel-btn:hover { background: #e2e8f0; transform: translateY(-2px); }
  .hs-channel-btn.playing { background: linear-gradient(135deg, var(--success), #059669); color: white; border-color: var(--success); }

  .hs-alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
  .hs-alert-info { background: #eff6ff; border: 1px solid #bfdbfe; color: #1e40af; }
  .hs-alert-warning { background: #fef3c7; border: 1px solid #fde68a; color: #92400e; }

  .hs-feature-list { display: grid; gap: 8px; margin-top: 12px; }
  .hs-feature-item { display: flex; align-items: center; gap: 10px; padding: 10px; background: #f8fafc; border-radius: 8px; }
  .hs-feature-icon { font-size: 20px; }
  .hs-feature-text { font-size: 13px; color: var(--text); }

  @media (max-width: 768px) {
    .hs-channel-grid { grid-template-columns: 1fr; }
  }
</style>

<div class="hs-container">
  <div class="hs-grid">
    <!-- Main Visualizer Section -->
    <div>
      <div class="hs-card">
        <div id="hs-infoAlert" class="hs-alert hs-alert-info">
          🎧 <strong>팁:</strong> 최상의 스테레오 테스트 경험을 위해 헤드폰을 사용하세요. 시작하기 전에 시스템 볼륨을 편안한 수준으로 조절하세요.
        </div>

        <div class="hs-visualizer" id="hs-visualizer">
          <div class="hs-placeholder" id="hs-placeholder">
            <div class="hs-placeholder-icon">🎵</div>
            <p style="margin: 0; font-size: 16px; font-weight: 600;">오디오 시각화</p>
            <p style="margin: 8px 0 0; font-size: 13px;">아래에서 테스트를 선택하여 시작하세요</p>
          </div>
          <canvas id="hs-canvas" class="hs-canvas" style="display: none;"></canvas>
          <div class="hs-overlay" id="hs-overlay" style="display: none;">
            <div class="hs-badge">
              <span class="hs-status-dot"></span>
              <span id="hs-statusText">재생 중</span>
            </div>
            <div class="hs-badge" id="hs-frequencyBadge">-</div>
          </div>
        </div>

        <div class="hs-controls">
          <button id="hs-stopBtn" class="hs-btn hs-btn-danger" disabled>오디오 중지</button>
        </div>

        <!-- Volume Control -->
        <div style="margin-top: 20px;">
          <div class="hs-slider-container">
            <div class="hs-slider-label">
              <span>볼륨</span>
              <span id="hs-volumeValue">50%</span>
            </div>
            <input type="range" id="hs-volumeSlider" class="hs-slider" min="0" max="100" value="50">
          </div>
        </div>
      </div>
    </div>

    <!-- Tests & Settings Section -->
    <div>
      <!-- Quick Channel Test -->
      <div class="hs-card" style="margin-bottom: 16px;">
        <h3 style="margin: 0 0 16px; font-size: 16px;">빠른 채널 테스트</h3>
        <div class="hs-channel-grid">
          <button class="hs-channel-btn" id="hs-leftBtn">
            <div style="font-size: 24px; margin-bottom: 8px;">⬅️</div>
            <div>왼쪽 채널</div>
          </button>
          <button class="hs-channel-btn" id="hs-rightBtn">
            <div style="font-size: 24px; margin-bottom: 8px;">➡️</div>
            <div>오른쪽 채널</div>
          </button>
        </div>
        <button class="hs-channel-btn" id="hs-stereoBtn" style="margin-top: 12px; width: 100%;">
          <div style="font-size: 24px; margin-bottom: 8px;">🔊</div>
          <div>양쪽 채널 (스테레오)</div>
        </button>
      </div>

      <!-- Audio Tests -->
      <div class="hs-card">
        <h3 style="margin: 0 0 16px; font-size: 16px;">오디오 테스트</h3>
        <div class="hs-test-grid">
          <div class="hs-test-item" data-test="sweep">
            <div class="hs-test-title">🎼 주파수 스위프</div>
            <div class="hs-test-desc">20Hz~20kHz 스위프로 전체 오디오 범위 테스트</div>
          </div>
          <div class="hs-test-item" data-test="bass">
            <div class="hs-test-title">🔉 저음 테스트 (100Hz)</div>
            <div class="hs-test-desc">저주파 응답 및 서브우퍼 테스트</div>
          </div>
          <div class="hs-test-item" data-test="mid">
            <div class="hs-test-title">🔊 중음역 (1kHz)</div>
            <div class="hs-test-desc">보컬 및 악기 선명도 테스트</div>
          </div>
          <div class="hs-test-item" data-test="treble">
            <div class="hs-test-title">🔔 고음 테스트 (10kHz)</div>
            <div class="hs-test-desc">고주파 응답 및 선명도 테스트</div>
          </div>
          <div class="hs-test-item" data-test="balance">
            <div class="hs-test-title">⚖️ 밸런스 테스트</div>
            <div class="hs-test-desc">왼쪽과 오른쪽 채널을 번갈아 재생</div>
          </div>
          <div class="hs-test-item" data-test="noise">
            <div class="hs-test-title">📻 화이트 노이즈</div>
            <div class="hs-test-desc">스피커 테스트를 위한 전체 스펙트럼 노이즈</div>
          </div>
        </div>
      </div>

      <!-- Audio Information -->
      <div class="hs-card" style="margin-top: 16px;">
        <h3 style="margin: 0 0 16px; font-size: 16px;">오디오 정보</h3>
        <div class="hs-info-grid">
          <div class="hs-info-item">
            <span class="hs-info-label">상태</span>
            <span class="hs-info-value" id="hs-infoStatus">준비</span>
          </div>
          <div class="hs-info-item">
            <span class="hs-info-label">현재 테스트</span>
            <span class="hs-info-value" id="hs-infoTest">없음</span>
          </div>
          <div class="hs-info-item">
            <span class="hs-info-label">주파수</span>
            <span class="hs-info-value" id="hs-infoFrequency">-</span>
          </div>
          <div class="hs-info-item">
            <span class="hs-info-label">채널</span>
            <span class="hs-info-value" id="hs-infoChannel">-</span>
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
  let panNode = null;
  let noiseBuffer = null;
  let noiseSource = null;
  let animationId = null;

  const canvas = document.getElementById('hs-canvas');
  const ctx = canvas.getContext('2d');
  const placeholder = document.getElementById('hs-placeholder');
  const overlay = document.getElementById('hs-overlay');
  const stopBtn = document.getElementById('hs-stopBtn');
  const volumeSlider = document.getElementById('hs-volumeSlider');
  const volumeValue = document.getElementById('hs-volumeValue');
  const statusText = document.getElementById('hs-statusText');
  const frequencyBadge = document.getElementById('hs-frequencyBadge');

  const infoStatus = document.getElementById('hs-infoStatus');
  const infoTest = document.getElementById('hs-infoTest');
  const infoFrequency = document.getElementById('hs-infoFrequency');
  const infoChannel = document.getElementById('hs-infoChannel');

  const leftBtn = document.getElementById('hs-leftBtn');
  const rightBtn = document.getElementById('hs-rightBtn');
  const stereoBtn = document.getElementById('hs-stereoBtn');

  const testItems = document.querySelectorAll('.hs-test-item');

  let currentTest = null;
  let sweepStartTime = null;

  // Initialize canvas size
  function resizeCanvas() {
    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;
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
      gainNode.gain.value = 0.5;
      panNode = audioContext.createStereoPanner();

      analyser.connect(audioContext.destination);
      gainNode.connect(analyser);

      // Create noise buffer
      createNoiseBuffer();
    }
  }

  // Create white noise buffer
  function createNoiseBuffer() {
    const bufferSize = audioContext.sampleRate * 2;
    noiseBuffer = audioContext.createBuffer(1, bufferSize, audioContext.sampleRate);
    const output = noiseBuffer.getChannelData(0);

    for (let i = 0; i < bufferSize; i++) {
      output[i] = Math.random() * 2 - 1;
    }
  }

  // Stop all audio
  function stopAudio() {
    if (oscillator) {
      oscillator.stop();
      oscillator.disconnect();
      oscillator = null;
    }
    if (noiseSource) {
      noiseSource.stop();
      noiseSource.disconnect();
      noiseSource = null;
    }
    if (animationId) {
      cancelAnimationFrame(animationId);
      animationId = null;
    }

    canvas.style.display = 'none';
    placeholder.style.display = 'block';
    overlay.style.display = 'none';
    stopBtn.disabled = true;

    // Remove active class from all buttons
    document.querySelectorAll('.hs-channel-btn, .hs-test-item').forEach(btn => {
      btn.classList.remove('playing', 'active');
    });

    updateInfo(true);
  }

  // Play tone
  function playTone(frequency, panValue = 0, channelName = '스테레오') {
    stopAudio();
    initAudioContext();

    oscillator = audioContext.createOscillator();
    oscillator.type = 'sine';
    oscillator.frequency.value = frequency;

    panNode = audioContext.createStereoPanner();
    panNode.pan.value = panValue;

    oscillator.connect(panNode);
    panNode.connect(gainNode);

    oscillator.start();

    startVisualization();
    stopBtn.disabled = false;

    updateInfo(false, `${frequency}Hz 톤`, frequency, channelName);
  }

  // Play white noise
  function playNoise() {
    stopAudio();
    initAudioContext();

    noiseSource = audioContext.createBufferSource();
    noiseSource.buffer = noiseBuffer;
    noiseSource.loop = true;

    noiseSource.connect(gainNode);
    noiseSource.start();

    startVisualization();
    stopBtn.disabled = false;

    updateInfo(false, '화이트 노이즈', '전체 스펙트럼', '스테레오');
  }

  // Play frequency sweep
  function playSweep() {
    stopAudio();
    initAudioContext();

    oscillator = audioContext.createOscillator();
    oscillator.type = 'sine';
    oscillator.frequency.value = 20;

    oscillator.connect(gainNode);
    oscillator.start();

    sweepStartTime = audioContext.currentTime;
    const sweepDuration = 10; // 10 seconds

    oscillator.frequency.exponentialRampToValueAtTime(
      20000,
      audioContext.currentTime + sweepDuration
    );

    setTimeout(() => {
      if (oscillator) {
        stopAudio();
      }
    }, sweepDuration * 1000);

    startVisualization(true);
    stopBtn.disabled = false;

    updateInfo(false, '주파수 스위프', '20Hz - 20kHz', '스테레오');
  }

  // Play balance test
  function playBalance() {
    stopAudio();
    initAudioContext();

    let panValue = -1;
    let direction = 1;

    oscillator = audioContext.createOscillator();
    oscillator.type = 'sine';
    oscillator.frequency.value = 440;

    panNode = audioContext.createStereoPanner();
    panNode.pan.value = panValue;

    oscillator.connect(panNode);
    panNode.connect(gainNode);

    oscillator.start();

    // Alternate between left and right every 2 seconds
    const balanceInterval = setInterval(() => {
      if (!oscillator) {
        clearInterval(balanceInterval);
        return;
      }

      panValue = panValue === -1 ? 1 : -1;
      panNode.pan.setValueAtTime(panValue, audioContext.currentTime);

      const channelName = panValue === -1 ? '왼쪽' : '오른쪽';
      infoChannel.textContent = channelName;
      frequencyBadge.textContent = channelName;
    }, 2000);

    startVisualization();
    stopBtn.disabled = false;

    updateInfo(false, '밸런스 테스트', '440Hz', '번갈아 재생');
  }

  // Start visualization
  function startVisualization(isSweep = false) {
    placeholder.style.display = 'none';
    canvas.style.display = 'block';
    overlay.style.display = 'flex';

    const bufferLength = analyser.frequencyBinCount;
    const dataArray = new Uint8Array(bufferLength);

    function draw() {
      animationId = requestAnimationFrame(draw);

      analyser.getByteFrequencyData(dataArray);

      ctx.fillStyle = '#1e1e2f';
      ctx.fillRect(0, 0, canvas.width, canvas.height);

      const barWidth = (canvas.width / bufferLength) * 2.5;
      let barHeight;
      let x = 0;

      for (let i = 0; i < bufferLength; i++) {
        barHeight = (dataArray[i] / 255) * canvas.height * 0.8;

        const hue = (i / bufferLength) * 360;
        ctx.fillStyle = `hsl(${hue}, 70%, 60%)`;

        ctx.fillRect(x, canvas.height - barHeight, barWidth, barHeight);

        x += barWidth + 1;
      }

      // Update frequency badge for sweep
      if (isSweep && oscillator && sweepStartTime) {
        const elapsed = audioContext.currentTime - sweepStartTime;
        const currentFreq = Math.round(20 * Math.pow(1000, elapsed / 10));
        if (currentFreq <= 20000) {
          frequencyBadge.textContent = `${currentFreq}Hz`;
          infoFrequency.textContent = `${currentFreq}Hz`;
        }
      }
    }

    draw();
  }

  // Update information
  function updateInfo(reset = false, testName = '', frequency = '', channel = '') {
    if (reset) {
      infoStatus.textContent = '준비';
      infoStatus.style.color = 'var(--muted)';
      infoTest.textContent = '없음';
      infoFrequency.textContent = '-';
      infoChannel.textContent = '-';
      currentTest = null;
      testItems.forEach(item => item.classList.remove('active'));
      return;
    }

    infoStatus.textContent = '재생 중';
    infoStatus.style.color = 'var(--success)';
    infoTest.textContent = testName;
    infoFrequency.textContent = frequency;
    infoChannel.textContent = channel;
    frequencyBadge.textContent = frequency;
  }

  // Channel button handlers
  leftBtn.addEventListener('click', function() {
    playTone(440, -1, '왼쪽만');
    this.classList.add('playing');
    rightBtn.classList.remove('playing');
    stereoBtn.classList.remove('playing');
  });

  rightBtn.addEventListener('click', function() {
    playTone(440, 1, '오른쪽만');
    this.classList.add('playing');
    leftBtn.classList.remove('playing');
    stereoBtn.classList.remove('playing');
  });

  stereoBtn.addEventListener('click', function() {
    playTone(440, 0, '양쪽 채널');
    this.classList.add('playing');
    leftBtn.classList.remove('playing');
    rightBtn.classList.remove('playing');
  });

  // Test item handlers
  testItems.forEach(item => {
    item.addEventListener('click', function() {
      const testType = this.dataset.test;

      testItems.forEach(t => t.classList.remove('active'));
      this.classList.add('active');

      document.querySelectorAll('.hs-channel-btn').forEach(btn => {
        btn.classList.remove('playing');
      });

      switch(testType) {
        case 'sweep':
          playSweep();
          break;
        case 'bass':
          playTone(100, 0, '스테레오');
          break;
        case 'mid':
          playTone(1000, 0, '스테레오');
          break;
        case 'treble':
          playTone(10000, 0, '스테레오');
          break;
        case 'balance':
          playBalance();
          break;
        case 'noise':
          playNoise();
          break;
      }
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
