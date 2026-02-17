<?php
// Start output buffering to capture all output
ob_start();
?>

<div class="click-tester-section">
    <div class="click-tester">
        <div class="duration-select">
            <label for="duration">Selecionar duracao do teste: </label>
            <select id="duration">
                <option value="1">1 Segundo</option>
                <option value="10">10 Segundos</option>
                <option value="30">30 Segundos</option>
                <option value="60">60 Segundos</option>
            </select>
        </div>
        <div class="info-area">
            <div class="info-box" id="duration-box">Duracao: <span id="selected-duration">1s</span></div>
            <div class="info-box" id="clicks-box">Cliques: <span id="current-clicks">0</span></div>
            <div class="info-box" id="time-left-box">Tempo restante: <span id="time-left">0s</span></div>
        </div>
        <div class="click-area" id="click-area">Clique aqui para comecar!</div>
        <button class="reset-button" id="reset-button">Reiniciar</button>
        <div class="result-popup" id="result-popup">
            <h2>Seu resultado</h2>
            <p id="cpm-result"></p>
            <p id="funny-remark"></p>
            <button id="close-result">Tentar novamente</button>
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
        selectedDuration.textContent = durationSelect.value + 's';
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
        selectedDuration.textContent = duration + 's';
        currentClicks.textContent = clickCount;
        timeLeft.textContent = timeRemaining + 's';
        clickArea.classList.add('active');
        clickArea.textContent = 'Continue clicando!';

        timer = setInterval(updateTimer, 1000);
        setTimeout(endTest, duration * 1000);
    }

    function updateTimer() {
        timeRemaining--;
        timeLeft.textContent = timeRemaining + 's';
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
        clickArea.textContent = 'Clique aqui para comecar!';

        cpmResult.textContent = `Seu CPM: ${cpm}`;
        funnyRemark.textContent = getFunnyRemark(cpm);
        resultPopup.style.display = 'block';
    }

    function resetTest() {
        testActive = false;
        clearInterval(timer);
        clickCount = 0;
        clickArea.classList.remove('active');
        clickArea.textContent = 'Clique aqui para comecar!';
        currentClicks.textContent = '0';
        timeLeft.textContent = '0s';
        selectedDuration.textContent = durationSelect.value + 's';
    }

    function getFunnyRemark(cpm) {
        if (cpm > 300) return "Uau, voce e uma Guepardo com esteroides!";
        if (cpm > 200) return "Rapido como um Falcao, bom clique!";
        if (cpm > 100) return "Voce e um Coelho veloz, continue assim!";
        if (cpm > 50) return "Velocidade de Tartaruga, mas a constancia vence!";
        return "Ritmo de Caracol! Ate uma Preguica riria!";
    }

    // Initialize duration display
    selectedDuration.textContent = durationSelect.value + 's';
</script>

<style>
    .click-tester-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .hero {
        text-align: center;
        padding: 3rem 1rem;
        background: #1f2937;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.5);
        margin-bottom: 2rem;
    }

    .hero h1 {
        font-size: 2.5rem;
        font-weight: 800;
        color: #f3f4f6;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    }

    .hero p {
        font-size: 1.2rem;
        color: #d1d5db;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
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

        .hero h1 {
            font-size: 2rem;
        }

        .hero p {
            font-size: 1rem;
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
// Output the buffered content and clean the buffer
echo ob_get_clean();
?>
