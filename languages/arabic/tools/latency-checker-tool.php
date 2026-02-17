<?php
// Arabic Latency Checker tool - فاحص زمن الاستجابة
?>

<div class="kbt-tool kbt-latency-tool" id="latency-tool" dir="rtl">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>اختبار زمن الاستجابة</h3>
      <p>اضغط على أي مفتاح أثناء تفعيل الاختبار. سنقوم بتقدير تأخير المعالجة لكل ضغطة مفتاح.</p>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="latency-start">بدء الاختبار</button>
        <button class="kbt-tool-button" id="latency-stop" disabled>إيقاف</button>
        <button class="kbt-tool-button ghost" id="latency-clear">مسح</button>
      </div>
      <div class="kbt-tool-status" id="latency-status">الحالة: جاهز</div>
    </div>
    <div class="kbt-tool-card">
      <h3>النتائج</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>الحالي</span><strong id="latency-current">-- مللي ثانية</strong></div>
        <div class="kbt-tool-stat"><span>المتوسط</span><strong id="latency-avg">-- مللي ثانية</strong></div>
        <div class="kbt-tool-stat"><span>الأفضل</span><strong id="latency-min">-- مللي ثانية</strong></div>
        <div class="kbt-tool-stat"><span>الأسوأ</span><strong id="latency-max">-- مللي ثانية</strong></div>
        <div class="kbt-tool-stat"><span>العينات</span><strong id="latency-count">0</strong></div>
      </div>
      <div class="kbt-tool-log" id="latency-log">اضغط على بدء ثم اضغط على المفاتيح لالتقاط العينات.</div>
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
      currentEl.textContent = `${value.toFixed(2)} مللي ثانية`;
    }
    if (samples.length === 0) {
      avgEl.textContent = '-- مللي ثانية';
      minEl.textContent = '-- مللي ثانية';
      maxEl.textContent = '-- مللي ثانية';
      countEl.textContent = '0';
      return;
    }
    const avg = samples.reduce((a, b) => a + b, 0) / samples.length;
    avgEl.textContent = `${avg.toFixed(2)} مللي ثانية`;
    minEl.textContent = `${Math.min(...samples).toFixed(2)} مللي ثانية`;
    maxEl.textContent = `${Math.max(...samples).toFixed(2)} مللي ثانية`;
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
    addLog(`${event.code || event.key}: ${latency.toFixed(2)} مللي ثانية`);
  }

  startBtn.addEventListener('click', function () {
    active = true;
    statusEl.textContent = 'الحالة: قيد الاختبار (اضغط على المفاتيح)';
    startBtn.disabled = true;
    stopBtn.disabled = false;
    logEl.textContent = '';
  });

  stopBtn.addEventListener('click', function () {
    active = false;
    statusEl.textContent = 'الحالة: متوقف';
    startBtn.disabled = false;
    stopBtn.disabled = true;
  });

  clearBtn.addEventListener('click', function () {
    samples = [];
    updateStats();
    currentEl.textContent = '-- مللي ثانية';
    logEl.textContent = 'اضغط على بدء ثم اضغط على المفاتيح لالتقاط العينات.';
  });

  document.addEventListener('keydown', handleKey);
});
</script>
