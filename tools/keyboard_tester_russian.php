<?php ob_start(); ?>
<section class="keyboard-tester" id="keyboard-tester">
    <div class="keyboard-container">
        <!-- Controls -->
        <div class="controls-wrapper">
            <div class="control-group">
                <button id="reset-btn" class="btn btn-control">
                    <span class="btn-icon">🔄</span>
                    <span class="btn-label">Переинициализация</span>
                </button>
                <button id="toggle-history-btn" class="btn btn-control">
                    <span class="btn-icon">📋</span>
                    <span class="btn-label">История клавиш</span>
                </button>
            </div>
            <div class="control-group">
                <label for="theme-selector" class="control-label">Тема:</label>
                <select id="theme-selector" class="theme-selector">
                    <option value="light">Светлая</option>
                    <option value="dark">Темная</option>
                    <option value="contrast">Контраст</option>
                </select>
            </div>
            <div class="control-group">
                <label for="layout-selector" class="control-label">Раскладка:</label>
                <select id="layout-selector" class="layout-selector">
                    <option value="russian">Русская (ЙЦУКЕН)</option>
                    <option value="qwerty">QWERTY</option>
                </select>
            </div>
        </div>

        <!-- Statistics -->
        <div class="statistics-wrapper">
            <div class="stat-item">
                <span class="stat-label">Всего нажатий:</span>
                <span class="stat-value" id="total-presses">0</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Ср. время отклика:</span>
                <span class="stat-value" id="avg-response">0ms</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Проблемы:</span>
                <span class="stat-value" id="issues-count">0</span>
            </div>
        </div>

        <!-- Keyboard -->
        <div class="keyboard-scale-wrapper" id="keyboard-scale-wrapper">
        <div class="keyboard" id="keyboard">
            <!-- Row 1 -->
            <div class="key-row">
                <div class="key" data-key="1" data-shift="!">1</div>
                <div class="key" data-key="2" data-shift="@">2</div>
                <div class="key" data-key="3" data-shift="#">3</div>
                <div class="key" data-key="4" data-shift="$">4</div>
                <div class="key" data-key="5" data-shift="%">5</div>
                <div class="key" data-key="6" data-shift="^">6</div>
                <div class="key" data-key="7" data-shift="&">7</div>
                <div class="key" data-key="8" data-shift="*">8</div>
                <div class="key" data-key="9" data-shift="(">9</div>
                <div class="key" data-key="0" data-shift=")">0</div>
                <div class="key" data-key="-" data-shift="_">-</div>
                <div class="key" data-key="=" data-shift="+">+</div>
                <div class="key backspace-key" data-key="Backspace">Backspace</div>
            </div>

            <!-- Row 2 -->
            <div class="key-row">
                <div class="key tab-key" data-key="Tab">Tab</div>
                <div class="key" data-key="й" data-shift="Й">й</div>
                <div class="key" data-key="ц" data-shift="Ц">ц</div>
                <div class="key" data-key="у" data-shift="У">у</div>
                <div class="key" data-key="к" data-shift="К">к</div>
                <div class="key" data-key="е" data-shift="Е">е</div>
                <div class="key" data-key="н" data-shift="Н">н</div>
                <div class="key" data-key="г" data-shift="Г">г</div>
                <div class="key" data-key="ш" data-shift="Ш">ш</div>
                <div class="key" data-key="щ" data-shift="Щ">щ</div>
                <div class="key" data-key="з" data-shift="З">з</div>
                <div class="key" data-key="х" data-shift="Х">х</div>
                <div class="key" data-key="ъ" data-shift="Ъ">ъ</div>
            </div>

            <!-- Row 3 -->
            <div class="key-row">
                <div class="key caps-key" data-key="CapsLock">CapsLock</div>
                <div class="key" data-key="ф" data-shift="Ф">ф</div>
                <div class="key" data-key="ы" data-shift="Ы">ы</div>
                <div class="key" data-key="в" data-shift="В">в</div>
                <div class="key" data-key="а" data-shift="А">а</div>
                <div class="key" data-key="п" data-shift="П">п</div>
                <div class="key" data-key="р" data-shift="Р">р</div>
                <div class="key" data-key="о" data-shift="О">о</div>
                <div class="key" data-key="л" data-shift="Л">л</div>
                <div class="key" data-key="д" data-shift="Д">д</div>
                <div class="key" data-key="ж" data-shift="Ж">ж</div>
                <div class="key" data-key="э" data-shift="Э">э</div>
                <div class="key enter-key" data-key="Enter">Enter</div>
            </div>

            <!-- Row 4 -->
            <div class="key-row">
                <div class="key shift-key" data-key="Shift">Shift</div>
                <div class="key" data-key="я" data-shift="Я">я</div>
                <div class="key" data-key="ч" data-shift="Ч">ч</div>
                <div class="key" data-key="с" data-shift="С">с</div>
                <div class="key" data-key="м" data-shift="М">м</div>
                <div class="key" data-key="и" data-shift="И">и</div>
                <div class="key" data-key="т" data-shift="Т">т</div>
                <div class="key" data-key="ь" data-shift="Ь">ь</div>
                <div class="key" data-key="б" data-shift="Б">б</div>
                <div class="key" data-key="ю" data-shift="Ю">ю</div>
                <div class="key" data-key="." data-shift=",">.</div>
                <div class="key shift-key" data-key="Shift">Shift</div>
            </div>

            <!-- Row 5 -->
            <div class="key-row">
                <div class="key ctrl-key" data-key="Control">Ctrl</div>
                <div class="key alt-key" data-key="Alt">Alt</div>
                <div class="key space-key" data-key=" "> </div>
                <div class="key alt-key" data-key="Alt">Alt</div>
                <div class="key ctrl-key" data-key="Control">Ctrl</div>
            </div>
        </div>
        </div><!-- /keyboard-scale-wrapper -->

        <!-- History -->
        <div class="history-panel" id="history-panel" style="display: none;">
            <div class="history-header">
                <h3>История нажатий</h3>
                <button class="close-btn" onclick="document.getElementById('history-panel').style.display = 'none'">✕</button>
            </div>
            <div class="history-content" id="history-content"></div>
        </div>

        <!-- Ghost Click Detection -->
        <div class="ghost-detection" id="ghost-detection" style="display: none;">
            <div class="detection-header">⚠️ Обнаружены проблемы с клавиатурой</div>
            <div class="detection-content" id="detection-content"></div>
        </div>
    </div>
</section>

<style>
.keyboard-container { position: relative; overflow: hidden; }
.keyboard-scale-wrapper { transform-origin: center top; display: flex; justify-content: center; }
</style>

<script>
<?php include __DIR__ . '/../keyboard-tester/sections/keyboard-tester.js'; ?>

(function() {
    function scaleKeyboard() {
        const wrapper = document.getElementById('keyboard-scale-wrapper');
        const container = document.querySelector('.keyboard-container');
        const layout = document.querySelector('.keyboard');
        if (!wrapper || !container || !layout) return;
        wrapper.style.transform = 'none';
        container.style.height = 'auto';
        void layout.offsetWidth;
        const layoutWidth = layout.scrollWidth;
        const layoutHeight = layout.scrollHeight;
        const containerPadding = 40;
        const availableWidth = container.clientWidth - containerPadding;
        let scale = 1;
        if (layoutWidth > availableWidth && layoutWidth > 0) {
            scale = availableWidth / layoutWidth;
            scale = Math.max(scale, 0.3);
        }
        wrapper.style.transform = scale < 1 ? `scale(${scale})` : 'none';
        const scaledHeight = layoutHeight * scale;
        container.style.height = Math.ceil(scaledHeight + containerPadding) + 'px';
    }
    setTimeout(scaleKeyboard, 100);
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(scaleKeyboard, 100);
    });
})();
</script>

<?php $content = ob_get_clean(); echo $content; ?>
