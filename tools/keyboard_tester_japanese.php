<?php ob_start(); ?>
<section class="keyboard-tester" id="keyboard-tester">
    <div class="keyboard-container">
        <!-- Controls -->
        <div class="controls-wrapper">
            <div class="control-group">
                <button id="reset-btn" class="btn btn-control">
                    <span class="btn-icon">🔄</span>
                    <span class="btn-label">リセット</span>
                </button>
                <button id="toggle-history-btn" class="btn btn-control">
                    <span class="btn-icon">📋</span>
                    <span class="btn-label">キー履歴</span>
                </button>
            </div>
            <div class="control-group">
                <label for="theme-selector" class="control-label">テーマ:</label>
                <select id="theme-selector" class="theme-selector">
                    <option value="light">ライト</option>
                    <option value="dark">ダーク</option>
                    <option value="contrast">コントラスト</option>
                </select>
            </div>
            <div class="control-group">
                <label for="layout-selector" class="control-label">配列:</label>
                <select id="layout-selector" class="layout-selector">
                    <option value="japanese">日本語（ローマ字）</option>
                    <option value="qwerty">QWERTY</option>
                </select>
            </div>
        </div>

        <!-- Statistics -->
        <div class="statistics-wrapper">
            <div class="stat-item">
                <span class="stat-label">総キープレス数:</span>
                <span class="stat-value" id="total-presses">0</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">平均応答時間:</span>
                <span class="stat-value" id="avg-response">0ms</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">問題:</span>
                <span class="stat-value" id="issues-count">0</span>
            </div>
        </div>

        <!-- Keyboard - Japanese Romaji Layout -->
        <div class="keyboard-scale-wrapper" id="keyboard-scale-wrapper">
        <div class="keyboard" id="keyboard">
            <!-- Row 1 -->
            <div class="key-row">
                <div class="key" data-key="`" data-shift="~">`</div>
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

            <!-- Row 2 - Japanese row names in Hiragana -->
            <div class="key-row">
                <div class="key tab-key" data-key="Tab">Tab</div>
                <div class="key" data-key="q" data-shift="Q" title="た行">q</div>
                <div class="key" data-key="w" data-shift="W" title="て行">w</div>
                <div class="key" data-key="e" data-shift="E" title="い行">e</div>
                <div class="key" data-key="r" data-shift="R" title="り行">r</div>
                <div class="key" data-key="t" data-shift="T" title="と行">t</div>
                <div class="key" data-key="y" data-shift="Y" title="ゆ行">y</div>
                <div class="key" data-key="u" data-shift="U" title="う行">u</div>
                <div class="key" data-key="i" data-shift="I" title="い行">i</div>
                <div class="key" data-key="o" data-shift="O" title="お行">o</div>
                <div class="key" data-key="p" data-shift="P" title="ぱ行">p</div>
                <div class="key" data-key="[" data-shift="{">[</div>
                <div class="key" data-key="]" data-shift="}">]</div>
            </div>

            <!-- Row 3 - Japanese row names in Hiragana -->
            <div class="key-row">
                <div class="key caps-key" data-key="CapsLock">CapsLock</div>
                <div class="key" data-key="a" data-shift="A" title="あ行">a</div>
                <div class="key" data-key="s" data-shift="S" title="さ行">s</div>
                <div class="key" data-key="d" data-shift="D" title="だ行">d</div>
                <div class="key" data-key="f" data-shift="F" title="ふ行">f</div>
                <div class="key" data-key="g" data-shift="G" title="ぎ行">g</div>
                <div class="key" data-key="h" data-shift="H" title="は行">h</div>
                <div class="key" data-key="j" data-shift="J" title="じ行">j</div>
                <div class="key" data-key="k" data-shift="K" title="か行">k</div>
                <div class="key" data-key="l" data-shift="L" title="ぎ行">l</div>
                <div class="key" data-key=";" data-shift=":">::</div>
                <div class="key" data-key="'" data-shift="\"">\'</div>
                <div class="key enter-key" data-key="Enter">Enter</div>
            </div>

            <!-- Row 4 - Japanese row names in Hiragana -->
            <div class="key-row">
                <div class="key shift-key" data-key="Shift">Shift</div>
                <div class="key" data-key="z" data-shift="Z" title="ざ行">z</div>
                <div class="key" data-key="x" data-shift="X" title="しゃ">x</div>
                <div class="key" data-key="c" data-shift="C" title="ちゃ">c</div>
                <div class="key" data-key="v" data-shift="V" title="ぎ">v</div>
                <div class="key" data-key="b" data-shift="B" title="ぼ行">b</div>
                <div class="key" data-key="n" data-shift="N" title="な行">n</div>
                <div class="key" data-key="m" data-shift="M" title="ま行">m</div>
                <div class="key" data-key="," data-shift="<">,</div>
                <div class="key" data-key="." data-shift=">">.</div>
                <div class="key" data-key="/" data-shift="?">?</div>
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
                <h3>キー履歴</h3>
                <button class="close-btn" onclick="document.getElementById('history-panel').style.display = 'none'">✕</button>
            </div>
            <div class="history-content" id="history-content"></div>
        </div>

        <!-- Ghost Click Detection -->
        <div class="ghost-detection" id="ghost-detection" style="display: none;">
            <div class="detection-header">⚠️ キーボードの問題を検出</div>
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
