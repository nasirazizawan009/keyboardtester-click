<?php ob_start(); ?>

<div class="click-tester-section">
    <div class="click-tester">
        <div class="duration-select">
            <label for="duration">Выберите длительность: </label>
            <select id="duration">
                <option value="1">1 Секунда</option>
                <option value="5" selected>5 Секунд</option>
                <option value="10">10 Секунд</option>
                <option value="30">30 Секунд</option>
                <option value="60">60 Секунд</option>
            </select>
        </div>

        <div class="info-area">
            <div class="info-box">Длит. <span id="sel-dur">5s</span></div>
            <div class="info-box">Клики <span id="cur-clicks">—</span></div>
            <div class="info-box">Осталось <span id="time-left">5s</span></div>
        </div>

        <!-- Click target -->
        <div class="click-area" id="click-area">Нажмите здесь, чтобы начать!</div>

        <!-- Inline result — shown after test, hidden during/before -->
        <div class="result-strip" id="result-strip" style="display:none">
            <div class="result-row">
                <span class="result-label">CPS</span>
                <span class="result-val" id="res-cps">—</span>
            </div>
            <div class="result-row">
                <span class="result-label">Клики</span>
                <span class="result-val" id="res-clicks">—</span>
            </div>
            <p class="result-remark" id="res-remark"></p>
            <button class="new-test-btn" id="new-test-btn">Новый тест</button>
        </div>

        <!-- Session history -->
        <div class="test-history" id="test-history" style="display:none">
            <div class="history-header">
                <span>История</span>
                <button id="clear-history">Очистить</button>
            </div>
            <table class="history-table">
                <thead><tr><th>#</th><th>Длит.</th><th>Клики</th><th>CPS</th></tr></thead>
                <tbody id="history-body"></tbody>
            </table>
        </div>
    </div>
</div>

<script>
(function () {
    const clickArea    = document.getElementById('click-area');
    const durSel       = document.getElementById('duration');
    const selDur       = document.getElementById('sel-dur');
    const curClicks    = document.getElementById('cur-clicks');
    const timeLeftEl   = document.getElementById('time-left');
    const resultStrip  = document.getElementById('result-strip');
    const resCps       = document.getElementById('res-cps');
    const resClicks    = document.getElementById('res-clicks');
    const resRemark    = document.getElementById('res-remark');
    const newTestBtn   = document.getElementById('new-test-btn');
    const testHistory  = document.getElementById('test-history');
    const historyBody  = document.getElementById('history-body');
    const clearHistory = document.getElementById('clear-history');

    let state         = 'idle';
    let clickCount    = 0;
    let timer         = null;
    let timeRemaining = 0;
    let testLog       = [];
    let runNumber     = 0;

    durSel.addEventListener('change', () => {
        if (state !== 'running') {
            selDur.textContent    = durSel.value + 's';
            timeLeftEl.textContent = durSel.value + 's';
        }
    });

    clickArea.addEventListener('click', () => {
        if (state === 'idle')         startTest();
        else if (state === 'running') { clickCount++; curClicks.textContent = clickCount; }
    });

    newTestBtn.addEventListener('click', resetToIdle);
    clearHistory.addEventListener('click', () => {
        testLog = []; runNumber = 0;
        historyBody.innerHTML = '';
        testHistory.style.display = 'none';
    });

    function startTest() {
        state         = 'running';
        clickCount    = 0;
        const dur      = parseInt(durSel.value);
        timeRemaining  = dur;

        selDur.textContent    = dur + 's';
        curClicks.textContent = '0';
        timeLeftEl.textContent = dur + 's';

        resultStrip.style.display = 'none';
        clickArea.className       = 'click-area active';
        clickArea.textContent     = 'Продолжайте кликать!';
        durSel.disabled           = true;

        timer = setInterval(() => {
            timeRemaining--;
            timeLeftEl.textContent = timeRemaining + 's';
            if (timeRemaining <= 0) clearInterval(timer);
        }, 1000);

        setTimeout(endTest, dur * 1000);
    }

    function endTest() {
        state = 'done';
        clearInterval(timer);
        durSel.disabled = false;

        const dur = parseInt(durSel.value);
        const cps = (clickCount / dur).toFixed(2);

        clickArea.className   = 'click-area done';
        clickArea.textContent = 'Тест завершён';

        resCps.textContent    = cps;
        resClicks.textContent = `${clickCount} за ${dur}с`;
        resRemark.textContent = getRemark(parseFloat(cps));
        resultStrip.style.display = 'block';

        runNumber++;
        testLog.unshift({ n: runNumber, duration: dur, clicks: clickCount, cps: parseFloat(cps) });
        if (testLog.length > 10) testLog.pop();
        renderHistory();
    }

    function resetToIdle() {
        state = 'idle';
        clickCount = 0;
        clickArea.className   = 'click-area';
        clickArea.textContent = 'Нажмите здесь, чтобы начать!';
        curClicks.textContent = '—';
        timeLeftEl.textContent = durSel.value + 's';
        resultStrip.style.display = 'none';
    }

    function renderHistory() {
        testHistory.style.display = 'block';
        const bestCps = Math.max(...testLog.map(r => r.cps));
        historyBody.innerHTML = testLog.map(r => {
            const best = r.cps === bestCps && testLog.length > 1;
            return `<tr class="${best ? 'best-row' : ''}">
                <td>${r.n}</td><td>${r.duration}s</td>
                <td>${r.clicks}</td>
                <td>${r.cps.toFixed(2)}${best ? ' 🏆' : ''}</td>
            </tr>`;
        }).join('');
    }

    function getRemark(cps) {
        if (cps > 14) return "Уровень бога бабочка-клик. Вы вообще человек?";
        if (cps > 10) return "Джиттер-клик! Ваше предплечье не согласно.";
        if (cps > 7)  return "Выше среднего — отличный игровой темп!";
        if (cps > 4)  return "Средний диапазон. Есть куда расти!";
        return "Не торопитесь — разомните пальцы!";
    }

    selDur.textContent    = durSel.value + 's';
    timeLeftEl.textContent = durSel.value + 's';
})();
</script>

<style>
.click-tester-section { max-width: 1200px; margin: 0 auto; padding: 2rem; }
.click-tester {
    text-align: center; background: #1f2937; border-radius: 14px;
    padding: 2rem; box-shadow: 0 6px 12px rgba(0,0,0,.4);
}
.duration-select { margin-bottom: 1.5rem; }
.duration-select label { font-size: 1rem; color: #d1d5db; margin-right: .5rem; }
.duration-select select {
    padding: .6rem .9rem; font-size: 1rem; border-radius: 6px;
    background: #111827; color: #f3f4f6; border: 1px solid #4b5563; cursor: pointer;
}
.duration-select select:disabled { opacity: .5; cursor: not-allowed; }

.info-area { display: flex; justify-content: center; gap: 1.5rem; margin-bottom: 1.5rem; flex-wrap: wrap; }
.info-box {
    min-width: 110px; padding: .75rem 1rem; background: #111827;
    border-radius: 8px; font-size: 1rem; color: #9ca3af; text-align: center;
}
.info-box span { display: block; font-size: 1.4rem; font-weight: 700; color: #f3f4f6; margin-top: .2rem; }

.click-area {
    width: 400px; height: 240px; margin: 0 auto;
    background: #111827; border: 2px solid #22c55e; border-radius: 12px;
    display: flex; justify-content: center; align-items: center;
    font-size: 1.5rem; color: #d1d5db; cursor: pointer; user-select: none;
    box-shadow: 0 8px 16px rgba(0,0,0,.4); transition: background .2s, border-color .2s, color .2s;
}
.click-area.active  { background: #22c55e; color: #1f2937; border-color: #16a34a; }
.click-area.done    { background: #1e3a5f; color: #93c5fd;  border-color: #3b82f6; cursor: default; }

.result-strip {
    margin-top: 1.25rem; background: #111827; border-radius: 10px;
    padding: 1.25rem 1.5rem; display: flex; flex-direction: column; align-items: center; gap: .5rem;
}
.result-row { display: flex; gap: 1.5rem; align-items: baseline; }
.result-label { font-size: .85rem; color: #6b7280; text-transform: uppercase; letter-spacing: .05em; }
.result-val   { font-size: 2rem; font-weight: 700; color: #22c55e; }
.result-remark { font-size: .95rem; color: #9ca3af; margin: .25rem 0 .5rem; }
.new-test-btn {
    margin-top: .5rem; padding: .7rem 1.75rem; background: #22c55e;
    color: #111827; border: none; border-radius: 8px; font-weight: 700;
    font-size: 1rem; cursor: pointer; transition: background .2s;
}
.new-test-btn:hover { background: #4ade80; }

.test-history { margin-top: 1.5rem; border-top: 1px solid #374151; padding-top: 1rem; text-align: left; }
.history-header {
    display: flex; justify-content: space-between; align-items: center;
    margin-bottom: .6rem; color: #9ca3af; font-size: .85rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: .05em;
}
.history-header button {
    padding: .25rem .65rem; font-size: .8rem; background: #374151;
    color: #9ca3af; border: none; border-radius: 6px; cursor: pointer;
}
.history-header button:hover { background: #4b5563; color: #f3f4f6; }
.history-table { width: 100%; border-collapse: collapse; font-size: .95rem; }
.history-table th {
    padding: .4rem .6rem; text-align: left; color: #6b7280;
    font-size: .78rem; text-transform: uppercase; letter-spacing: .04em;
    border-bottom: 1px solid #374151;
}
.history-table td { padding: .4rem .6rem; color: #d1d5db; border-bottom: 1px solid #1a2535; }
.history-table .best-row td { color: #22c55e; font-weight: 600; }
.history-table tr:hover td { background: rgba(255,255,255,.03); }

@media (max-width: 768px) {
    .click-tester-section { padding: 1rem; }
    .click-tester { padding: 1.25rem; }
    .click-area { width: 100%; height: 200px; }
    .info-box { min-width: 90px; }
}
</style>

<?php echo ob_get_clean(); ?>
