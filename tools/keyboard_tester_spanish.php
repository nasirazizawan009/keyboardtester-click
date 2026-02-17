<?php
ob_start();
?>

<section class="keyboard-tester" id="keyboard-tester">
    <!-- Controls -->
    <div class="controls-wrapper">
        <div class="textarea-wrapper">
            <div class="textarea-label">Historial de Teclas</div>
            <textarea class="text-box" id="key-history" rows="4" placeholder="Presiona cualquier tecla para comenzar la prueba..."></textarea>
        </div>
        <div class="button-group">
            <button class="reset-button" id="reset-button">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                    <path d="M3 3v5h5"/>
                </svg>
                Reiniciar
            </button>
            <div class="select-wrapper">
                <label>Tema</label>
                <select class="theme-selector" id="theme-selector">
                    <option value="dark">Oscuro</option>
                    <option value="light">Claro</option>
                    <option value="midnight">Medianoche</option>
                    <option value="cyberpunk">Cyberpunk</option>
                    <option value="forest">Bosque</option>
                </select>
            </div>
            <div class="select-wrapper">
                <label>Distribución</label>
                <select class="layout-selector" id="layout-selector">
                    <option value="qwerty">QWERTY</option>
                    <option value="dvorak">Dvorak</option>
                    <option value="colemak">Colemak</option>
                </select>
            </div>
            <div class="select-wrapper">
                <label>SO</label>
                <select class="os-selector" id="os-selector">
                    <option value="windows">Windows</option>
                    <option value="mac">Mac</option>
                </select>
            </div>
            <div class="advanced-toggle-wrapper">
                <button class="advanced-toggle-btn" id="advanced-toggle">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
                    </svg>
                    <span>Opciones Avanzadas</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Spanish Keyboard Layout (QWERTY) -->
    <div class="keyboard-container">
    <div class="keyboard-scale-wrapper" id="keyboard-scale-wrapper">
    <div class="keyboard" id="keyboard">
        <div class="key-row">
            <div class="key" data-key="Escape"><span>Esc</span></div>
            <div class="key" data-key="F1"><span>F1</span></div>
            <div class="key" data-key="F2"><span>F2</span></div>
            <div class="key" data-key="F3"><span>F3</span></div>
            <div class="key" data-key="F4"><span>F4</span></div>
            <div class="key" data-key="F5"><span>F5</span></div>
            <div class="key" data-key="F6"><span>F6</span></div>
            <div class="key" data-key="F7"><span>F7</span></div>
            <div class="key" data-key="F8"><span>F8</span></div>
            <div class="key" data-key="F9"><span>F9</span></div>
            <div class="key" data-key="F10"><span>F10</span></div>
            <div class="key" data-key="F11"><span>F11</span></div>
            <div class="key" data-key="F12"><span>F12</span></div>
            <div class="key" data-key="PrintScreen"><span>PrtSc</span></div>
            <div class="key" data-key="ScrollLock"><span>Scr Lk</span></div>
            <div class="key" data-key="Pause"><span>Pause</span></div>
        </div>

        <div class="key-row">
            <div class="key" data-key="Backquote"><span>º</span><span class="shift">ª</span></div>
            <div class="key" data-key="Digit1"><span>1</span><span class="shift">!</span></div>
            <div class="key" data-key="Digit2"><span>2</span><span class="shift">@</span></div>
            <div class="key" data-key="Digit3"><span>3</span><span class="shift">#</span></div>
            <div class="key" data-key="Digit4"><span>4</span><span class="shift">$</span></div>
            <div class="key" data-key="Digit5"><span>5</span><span class="shift">%</span></div>
            <div class="key" data-key="Digit6"><span>6</span><span class="shift">^</span></div>
            <div class="key" data-key="Digit7"><span>7</span><span class="shift">&</span></div>
            <div class="key" data-key="Digit8"><span>8</span><span class="shift">*</span></div>
            <div class="key" data-key="Digit9"><span>9</span><span class="shift">(</span></div>
            <div class="key" data-key="Digit0"><span>0</span><span class="shift">)</span></div>
            <div class="key" data-key="Minus"><span>-</span><span class="shift">_</span></div>
            <div class="key" data-key="Equal"><span">=</span><span class="shift">+</span></div>
            <div class="key long" data-key="Backspace"><span>Backspace</span></div>
        </div>

        <div class="key-row">
            <div class="key long" data-key="Tab"><span>Tab</span></div>
            <div class="key" data-key="KeyQ"><span>Q</span></div>
            <div class="key" data-key="KeyW"><span>W</span></div>
            <div class="key" data-key="KeyE"><span>E</span></div>
            <div class="key" data-key="KeyR"><span>R</span></div>
            <div class="key" data-key="KeyT"><span>T</span></div>
            <div class="key" data-key="KeyY"><span>Y</span></div>
            <div class="key" data-key="KeyU"><span>U</span></div>
            <div class="key" data-key="KeyI"><span>I</span></div>
            <div class="key" data-key="KeyO"><span>O</span></div>
            <div class="key" data-key="KeyP"><span>P</span></div>
            <div class="key" data-key="BracketLeft"><span>[</span><span class="shift">{</span></div>
            <div class="key" data-key="BracketRight"><span>]</span><span class="shift">}</span></div>
            <div class="key long" data-key="Backslash"><span>Enter</span></div>
        </div>

        <div class="key-row">
            <div class="key long" data-key="CapsLock"><span>Caps Lock</span></div>
            <div class="key" data-key="KeyA"><span>A</span></div>
            <div class="key" data-key="KeyS"><span>S</span></div>
            <div class="key" data-key="KeyD"><span>D</span></div>
            <div class="key" data-key="KeyF"><span>F</span></div>
            <div class="key" data-key="KeyG"><span>G</span></div>
            <div class="key" data-key="KeyH"><span>H</span></div>
            <div class="key" data-key="KeyJ"><span>J</span></div>
            <div class="key" data-key="KeyK"><span>K</span></div>
            <div class="key" data-key="KeyL"><span>L</span></div>
            <div class="key" data-key="Semicolon"><span>ñ</span></div>
            <div class="key" data-key="Quote"><span>'</span><span class="shift">"</span></div>
            <div class="key" data-key="Enter"><span>Enter</span></div>
        </div>

        <div class="key-row">
            <div class="key long" data-key="ShiftLeft"><span>Shift</span></div>
            <div class="key" data-key="KeyZ"><span>Z</span></div>
            <div class="key" data-key="KeyX"><span>X</span></div>
            <div class="key" data-key="KeyC"><span>C</span></div>
            <div class="key" data-key="KeyV"><span>V</span></div>
            <div class="key" data-key="KeyB"><span>B</span></div>
            <div class="key" data-key="KeyN"><span>N</span></div>
            <div class="key" data-key="KeyM"><span>M</span></div>
            <div class="key" data-key="Comma"><span>,</span><span class="shift"><</span></div>
            <div class="key" data-key="Period"><span>.</span><span class="shift">></span></div>
            <div class="key" data-key="Slash"><span>/</span><span class="shift">?</span></div>
            <div class="key long" data-key="ShiftRight"><span>Shift</span></div>
        </div>

        <div class="key-row">
            <div class="key" data-key="ControlLeft"><span>Ctrl</span></div>
            <div class="key" data-key="MetaLeft"><span>Win</span></div>
            <div class="key" data-key="AltLeft"><span>Alt</span></div>
            <div class="key long" data-key="Space"><span>Space</span></div>
            <div class="key" data-key="AltRight"><span>Alt</span></div>
            <div class="key" data-key="MetaRight"><span>Win</span></div>
            <div class="key" data-key="ContextMenu"><span>Menu</span></div>
            <div class="key" data-key="ControlRight"><span>Ctrl</span></div>
        </div>

        <div class="key-row">
            <div class="key" data-key="Insert"><span>Ins</span></div>
            <div class="key" data-key="Home"><span>Inicio</span></div>
            <div class="key" data-key="PageUp"><span>Av Pág</span></div>
            <div class="key" data-key="Delete"><span>Supr</span></div>
            <div class="key" data-key="End"><span>Fin</span></div>
            <div class="key" data-key="PageDown"><span>Re Pág</span></div>
            <div class="key" data-key="ArrowUp"><span>↑</span></div>
            <div class="key" data-key="ArrowLeft"><span>←</span></div>
            <div class="key" data-key="ArrowDown"><span>↓</span></div>
            <div class="key" data-key="ArrowRight"><span>→</span></div>
        </div>
    </div>
    </div><!-- /keyboard-scale-wrapper -->
    </div><!-- /keyboard-container -->
</section>

<style>
.keyboard-container { position: relative; overflow: hidden; max-width: 1400px; margin: 0 auto; padding: 20px; }
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

<?php
$content = ob_get_clean();
echo $content;
?>
