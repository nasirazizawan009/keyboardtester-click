<?php
// Arabic Ghost Click Detector tool - كاشف النقرات الشبحية
?>

<div class="kbt-tool kbt-ghost-tool" id="ghost-click-tool" dir="rtl">
  <div class="kbt-tool-grid two">
    <div class="kbt-tool-card">
      <h3>منطقة اختبار النقر</h3>
      <p>انقر في المنطقة أدناه. النقرات المزدوجة السريعة جداً (أقل من 300 مللي ثانية) ستُحدد كنقرات شبحية محتملة.</p>
      <div class="ghost-click-area" id="ghost-click-area" tabindex="0" role="button" aria-label="منطقة اختبار النقر">
        انقر هنا للبدء
      </div>
      <div class="kbt-tool-actions">
        <button class="kbt-tool-button primary" id="ghost-start">بدء</button>
        <button class="kbt-tool-button" id="ghost-reset">إعادة التعيين</button>
      </div>
    </div>
    <div class="kbt-tool-card">
      <h3>النتائج</h3>
      <div class="kbt-tool-stats">
        <div class="kbt-tool-stat"><span>إجمالي النقرات</span><strong id="ghost-total">0</strong></div>
        <div class="kbt-tool-stat"><span>النقرات السريعة</span><strong id="ghost-fast">0</strong></div>
        <div class="kbt-tool-stat"><span>متوسط الفاصل</span><strong id="ghost-avg">-- مللي ثانية</strong></div>
      </div>
      <div class="kbt-tool-log" id="ghost-log">اضغط بدء وانقر داخل منطقة الاختبار.</div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const area = document.getElementById('ghost-click-area');
  const startBtn = document.getElementById('ghost-start');
  const resetBtn = document.getElementById('ghost-reset');
  const totalEl = document.getElementById('ghost-total');
  const fastEl = document.getElementById('ghost-fast');
  const avgEl = document.getElementById('ghost-avg');
  const logEl = document.getElementById('ghost-log');

  if (!area || !startBtn || !resetBtn) return;

  const threshold = 300;
  let active = false;
  let total = 0;
  let fast = 0;
  let lastTime = 0;
  let intervals = [];

  function updateStats() {
    totalEl.textContent = total;
    fastEl.textContent = fast;
    if (intervals.length) {
      const avg = intervals.reduce((a, b) => a + b, 0) / intervals.length;
      avgEl.textContent = `${avg.toFixed(1)} مللي ثانية`;
    } else {
      avgEl.textContent = '-- مللي ثانية';
    }
  }

  function addLog(message) {
    const item = document.createElement('div');
    item.textContent = message;
    logEl.prepend(item);
    while (logEl.children.length > 8) {
      logEl.removeChild(logEl.lastChild);
    }
  }

  function handleClick() {
    if (!active) return;
    const now = performance.now();
    total += 1;
    if (lastTime) {
      const interval = now - lastTime;
      intervals.push(interval);
      if (interval < threshold) {
        fast += 1;
        addLog(`نقرة سريعة: ${interval.toFixed(1)} مللي ثانية`);
      } else {
        addLog(`فاصل النقر: ${interval.toFixed(1)} مللي ثانية`);
      }
    } else {
      addLog('تم تسجيل النقرة الأولى');
    }
    lastTime = now;
    updateStats();
  }

  startBtn.addEventListener('click', function () {
    active = true;
    area.textContent = 'انقر كما تفعل عادةً';
    area.classList.add('active');
    logEl.textContent = '';
    addLog('بدأ الاختبار');
  });

  resetBtn.addEventListener('click', function () {
    active = false;
    total = 0;
    fast = 0;
    lastTime = 0;
    intervals = [];
    area.textContent = 'انقر هنا للبدء';
    area.classList.remove('active');
    logEl.textContent = 'اضغط بدء وانقر داخل منطقة الاختبار.';
    updateStats();
  });

  area.addEventListener('click', handleClick);
  area.addEventListener('keydown', function (event) {
    if (event.key === 'Enter' || event.key === ' ') {
      event.preventDefault();
      handleClick();
    }
  });
});
</script>
