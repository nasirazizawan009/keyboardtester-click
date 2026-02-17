<?php
// Korean Microphone Tester tool - 마이크 테스터
?>

<div class="kbt-tool kbt-mic-tool" id="mic-tool">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>마이크 입력</h3>
      <p>마이크 접근을 허용하여 실시간 오디오 레벨을 시각화합니다. 오디오는 녹음되거나 업로드되지 않습니다.</p>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="mic-start">마이크 시작</button>
        <button class="kbt-tool-button" id="mic-stop" disabled>중지</button>
      </div>
      <div class="kbt-tool-status" id="mic-status">상태: 대기 중</div>
    </div>
    <div class="kbt-tool-card">
      <h3>레벨 미터</h3>
      <div class="kbt-tool-meter">
        <div class="kbt-tool-meter-fill" id="mic-meter-fill"></div>
      </div>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>현재 레벨</span><strong id="mic-level">0%</strong></div>
        <div class="kbt-tool-stat"><span>최대값</span><strong id="mic-peak">0%</strong></div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const startBtn = document.getElementById('mic-start');
  const stopBtn = document.getElementById('mic-stop');
  const statusEl = document.getElementById('mic-status');
  const meterFill = document.getElementById('mic-meter-fill');
  const levelEl = document.getElementById('mic-level');
  const peakEl = document.getElementById('mic-peak');

  if (!startBtn || !stopBtn) return;

  let audioContext;
  let analyser;
  let dataArray;
  let animationId;
  let stream;
  let peak = 0;

  function updateMeter() {
    if (!analyser) return;
    analyser.getByteTimeDomainData(dataArray);
    let sum = 0;
    for (let i = 0; i < dataArray.length; i += 1) {
      const value = (dataArray[i] - 128) / 128;
      sum += value * value;
    }
    const rms = Math.sqrt(sum / dataArray.length);
    const level = Math.min(1, rms * 3);
    const percent = Math.round(level * 100);
    peak = Math.max(peak, percent);
    meterFill.style.width = `${percent}%`;
    levelEl.textContent = `${percent}%`;
    peakEl.textContent = `${peak}%`;
    animationId = requestAnimationFrame(updateMeter);
  }

  async function startMic() {
    if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
      statusEl.textContent = '상태: 마이크 지원되지 않음';
      return;
    }
    try {
      stream = await navigator.mediaDevices.getUserMedia({ audio: true });
      audioContext = new (window.AudioContext || window.webkitAudioContext)();
      analyser = audioContext.createAnalyser();
      analyser.fftSize = 2048;
      dataArray = new Uint8Array(analyser.fftSize);
      const source = audioContext.createMediaStreamSource(stream);
      source.connect(analyser);
      statusEl.textContent = '상태: 청취 중';
      startBtn.disabled = true;
      stopBtn.disabled = false;
      peak = 0;
      updateMeter();
    } catch (error) {
      statusEl.textContent = '상태: 권한 거부됨';
    }
  }

  async function stopMic() {
    if (animationId) {
      cancelAnimationFrame(animationId);
    }
    if (stream) {
      stream.getTracks().forEach((track) => track.stop());
    }
    if (audioContext) {
      await audioContext.close();
    }
    analyser = null;
    stream = null;
    statusEl.textContent = '상태: 중지됨';
    startBtn.disabled = false;
    stopBtn.disabled = true;
    meterFill.style.width = '0%';
  }

  startBtn.addEventListener('click', startMic);
  stopBtn.addEventListener('click', stopMic);
});
</script>
