<?php ob_start(); ?>
<section class="keyboard-tester" id="keyboard-tester">
    <div class="keyboard-container">
        <!-- Controls -->
        <div class="controls-wrapper">
            <div class="control-group">
                <button id="reset-btn" class="btn btn-control">
                    <span class="btn-icon">🔄</span>
                    <span class="btn-label">Réinitialiser</span>
                </button>
                <button id="toggle-history-btn" class="btn btn-control">
                    <span class="btn-icon">📋</span>
                    <span class="btn-label">Historique des touches</span>
                </button>
            </div>
            <div class="control-group">
                <label for="theme-selector" class="control-label">Thème:</label>
                <select id="theme-selector" class="theme-selector">
                    <option value="light">Clair</option>
                    <option value="dark">Sombre</option>
                    <option value="contrast">Contraste</option>
                </select>
            </div>
            <div class="control-group">
                <label for="layout-selector" class="control-label">Disposition:</label>
                <select id="layout-selector" class="layout-selector">
                    <option value="azerty">AZERTY Français</option>
                    <option value="qwerty">QWERTY</option>
                </select>
            </div>
        </div>

        <!-- Statistics -->
        <div class="statistics-wrapper">
            <div class="stat-item">
                <span class="stat-label">Total des appuis:</span>
                <span class="stat-value" id="total-presses">0</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Temps de réponse moyen:</span>
                <span class="stat-value" id="avg-response">0ms</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Problèmes:</span>
                <span class="stat-value" id="issues-count">0</span>
            </div>
        </div>

        <!-- Keyboard - AZERTY Layout -->
        <div class="keyboard" id="keyboard">
            <!-- Row 1 -->
            <div class="key-row">
                <div class="key" data-key="&" data-shift="1">&</div>
                <div class="key" data-key="é" data-shift="2">é</div>
                <div class="key" data-key="\"" data-shift="3">"</div>
                <div class="key" data-key="'" data-shift="4">'</div>
                <div class="key" data-key="(" data-shift="5">(</div>
                <div class="key" data-key="-" data-shift="6">-</div>
                <div class="key" data-key="è" data-shift="7">è</div>
                <div class="key" data-key="_" data-shift="8">_</div>
                <div class="key" data-key="ç" data-shift="9">ç</div>
                <div class="key" data-key="à" data-shift="0">à</div>
                <div class="key" data-key=")" data-shift="°">)</div>
                <div class="key" data-key="=" data-shift="+">+</div>
                <div class="key backspace-key" data-key="Backspace">Backspace</div>
            </div>

            <!-- Row 2 -->
            <div class="key-row">
                <div class="key tab-key" data-key="Tab">Tab</div>
                <div class="key" data-key="a" data-shift="A">a</div>
                <div class="key" data-key="z" data-shift="Z">z</div>
                <div class="key" data-key="e" data-shift="E">e</div>
                <div class="key" data-key="r" data-shift="R">r</div>
                <div class="key" data-key="t" data-shift="T">t</div>
                <div class="key" data-key="y" data-shift="Y">y</div>
                <div class="key" data-key="u" data-shift="U">u</div>
                <div class="key" data-key="i" data-shift="I">i</div>
                <div class="key" data-key="o" data-shift="O">o</div>
                <div class="key" data-key="p" data-shift="P">p</div>
                <div class="key" data-key="[" data-shift="{">ˆ</div>
                <div class="key" data-key="$" data-shift="£">$</div>
            </div>

            <!-- Row 3 -->
            <div class="key-row">
                <div class="key caps-key" data-key="CapsLock">CapsLock</div>
                <div class="key" data-key="q" data-shift="Q">q</div>
                <div class="key" data-key="s" data-shift="S">s</div>
                <div class="key" data-key="d" data-shift="D">d</div>
                <div class="key" data-key="f" data-shift="F">f</div>
                <div class="key" data-key="g" data-shift="G">g</div>
                <div class="key" data-key="h" data-shift="H">h</div>
                <div class="key" data-key="j" data-shift="J">j</div>
                <div class="key" data-key="k" data-shift="K">k</div>
                <div class="key" data-key="l" data-shift="L">l</div>
                <div class="key" data-key="m" data-shift="M">m</div>
                <div class="key" data-key="ù" data-shift="%">ù</div>
                <div class="key enter-key" data-key="Enter">Enter</div>
            </div>

            <!-- Row 4 -->
            <div class="key-row">
                <div class="key shift-key" data-key="Shift">Shift</div>
                <div class="key" data-key="<" data-shift=">">&lt;</div>
                <div class="key" data-key="w" data-shift="W">w</div>
                <div class="key" data-key="x" data-shift="X">x</div>
                <div class="key" data-key="c" data-shift="C">c</div>
                <div class="key" data-key="v" data-shift="V">v</div>
                <div class="key" data-key="b" data-shift="B">b</div>
                <div class="key" data-key="n" data-shift="N">n</div>
                <div class="key" data-key="," data-shift="?">;</div>
                <div class="key" data-key=":" data-shift="/">/</div>
                <div class="key" data-key="." data-shift=".">.</div>
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

        <!-- History -->
        <div class="history-panel" id="history-panel" style="display: none;">
            <div class="history-header">
                <h3>Historique des touches</h3>
                <button class="close-btn" onclick="document.getElementById('history-panel').style.display = 'none'">✕</button>
            </div>
            <div class="history-content" id="history-content"></div>
        </div>

        <!-- Ghost Click Detection -->
        <div class="ghost-detection" id="ghost-detection" style="display: none;">
            <div class="detection-header">⚠️ Problèmes de clavier détectés</div>
            <div class="detection-content" id="detection-content"></div>
        </div>
    </div>
</section>

<script>
<?php include __DIR__ . '/../keyboard-tester/sections/keyboard-tester.js'; ?>
</script>

<?php $content = ob_get_clean(); echo $content; ?>
