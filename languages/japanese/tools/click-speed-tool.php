<?php
// Japanese Click Speed Test Tool - クリック速度テスト
ob_start();
?>

<div class="click-tester-section">
    <div class="click-tester">
        <div class="duration-select">
            <label for="duration">テスト時間を選択: </label>
            <select id="duration">
                <option value="1">1秒</option>
                <option value="10">10秒</option>
                <option value="30">30秒</option>
                <option value="60">60秒</option>
            </select>
        </div>
        <div class="info-area">
            <div class="info-box" id="duration-box">時間: <span id="selected-duration">1秒</span></div>
            <div class="info-box" id="clicks-box">クリック: <span id="current-clicks">0</span></div>
            <div class="info-box" id="time-left-box">残り時間: <span id="time-left">0秒</span></div>
        </div>
        <div class="click-area" id="click-area">ここをクリックして開始!</div>
        <button class="reset-button" id="reset-button">リセット</button>
        <div class="result-popup" id="result-popup">
            <h2>あなたの結果</h2>
            <p id="cpm-result"></p>
            <p id="funny-remark"></p>
            <button id="close-result">もう一度挑戦</button>
        </div>
    </div>
</div>

<script>
    const clickArea = document.getElementById('click-area');
    const durationSelect = document.getElementById('duration');
    const resetButton = document.getElementById('reset-button');
    const resultPopup = document.getElementById('result-popup');
    const cpmResult = document.getElementById('cpm-result');
    const funnyRemark = document.getElementById('funny-remark');
    const closeResult = document.getElementById('close-result');
    const selectedDuration = document.getElementById('selected-duration');
    const currentClicks = document.getElementById('current-clicks');
    const timeLeft = document.getElementById('time-left');

    let clickCount = 0;
    let testActive = false;
    let timer;
    let timeRemaining;

    durationSelect.addEventListener('change', () => {
        selectedDuration.textContent = durationSelect.value + '秒';
    });

    clickArea.addEventListener('click', () => {
        if (!testActive) {
            startTest();
        } else {
            clickCount++;
            currentClicks.textContent = clickCount;
        }
    });

    resetButton.addEventListener('click', resetTest);

    closeResult.addEventListener('click', () => {
        resultPopup.style.display = 'none';
        resetTest();
    });

    function startTest() {
        testActive = true;
        clickCount = 0;
        const duration = parseInt(durationSelect.value);
        timeRemaining = duration;
        selectedDuration.textContent = duration + '秒';
        currentClicks.textContent = clickCount;
        timeLeft.textContent = timeRemaining + '秒';
        clickArea.classList.add('active');
        clickArea.textContent = 'クリックを続けて!';

        timer = setInterval(updateTimer, 1000);
        setTimeout(endTest, duration * 1000);
    }

    function updateTimer() {
        timeRemaining--;
        timeLeft.textContent = timeRemaining + '秒';
        if (timeRemaining <= 0) {
            clearInterval(timer);
        }
    }

    function endTest() {
        testActive = false;
        clearInterval(timer);
        clickArea.classList.remove('active');
        const durationInMinutes = parseInt(durationSelect.value) / 60;
        const cpm = Math.round(clickCount / durationInMinutes);
        clickArea.textContent = 'ここをクリックして開始!';

        cpmResult.textContent = `あなたのCPM: ${cpm}`;
        funnyRemark.textContent = getFunnyRemark(cpm);
        resultPopup.style.display = 'block';
    }

    function resetTest() {
        testActive = false;
        clearInterval(timer);
        clickCount = 0;
        clickArea.classList.remove('active');
        clickArea.textContent = 'ここをクリックして開始!';
        currentClicks.textContent = '0';
        timeLeft.textContent = '0秒';
        selectedDuration.textContent = durationSelect.value + '秒';
    }

    function getFunnyRemark(cpm) {
        if (cpm > 300) return "すごい！チーターのような速さです！";
        if (cpm > 200) return "ハヤブサのように速い、素晴らしいクリック！";
        if (cpm > 100) return "うさぎのように速い、その調子！";
        if (cpm > 50) return "カメのペース、でも継続は力なり！";
        return "カタツムリのペース！ナマケモノも笑っているかも！";
    }

    // Initialize duration display
    selectedDuration.textContent = durationSelect.value + '秒';
</script>

<style>
    .click-tester-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .click-tester {
        text-align: center;
        background: #1f2937;
        border-radius: 14px;
        padding: 2rem;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.4);
    }

    .duration-select {
        margin-bottom: 1.5rem;
    }

    .duration-select label {
        font-size: 1rem;
        color: #d1d5db;
        margin-right: 0.5rem;
    }

    .duration-select select {
        padding: 0.8rem;
        font-size: 1rem;
        border-radius: 6px;
        background: #111827;
        color: #f3f4f6;
        border: 1px solid #4b5563;
        cursor: pointer;
    }

    .info-area {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .info-box {
        width: 150px;
        padding: 1rem;
        background: #111827;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        font-size: 1.1rem;
        color: #d1d5db;
        text-align: center;
    }

    .click-area {
        width: 400px;
        height: 300px;
        margin: 0 auto;
        background: #111827;
        border: 2px solid #22c55e;
        border-radius: 12px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        color: #d1d5db;
        cursor: pointer;
        user-select: none;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
        transition: background 0.3s ease;
    }

    .click-area.active {
        background: #22c55e;
        color: #1f2937;
    }

    .reset-button {
        margin-top: 1.5rem;
        padding: 0.8rem 1.5rem;
        background: #ef4444;
        color: #f3f4f6;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.3s ease;
    }

    .reset-button:hover {
        background: #dc2626;
        transform: translateY(-2px);
    }

    .result-popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #1f2937;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        text-align: center;
        display: none;
        color: #d1d5db;
        z-index: 1000;
    }

    .result-popup h2 {
        font-size: 1.8rem;
        color: #f3f4f6;
        margin-bottom: 1rem;
    }

    .result-popup p {
        font-size: 1.1rem;
        margin-bottom: 1rem;
    }

    .result-popup button {
        padding: 0.8rem 1.5rem;
        background: #22c55e;
        color: #1f2937;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .result-popup button:hover {
        background: #4ade80;
    }

    @media (max-width: 768px) {
        .click-tester-section {
            padding: 1rem;
        }

        .click-tester {
            padding: 1.5rem;
        }

        .click-area {
            width: 100%;
            height: 250px;
        }

        .info-box {
            width: 120px;
            font-size: 1rem;
        }
    }
</style>

<?php
echo ob_get_clean();
?>
