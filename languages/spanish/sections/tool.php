<?php
/**
 * Spanish Keyboard Tester - Full Layout Tool
 */
?>

<section class="keyboard-tester" id="keyboard-tester">
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
            <div class="advanced-toggle-wrapper">
                <button class="advanced-toggle-btn" id="advanced-toggle">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
                    </svg>
                    <span>Opciones Avanzadas</span>
                    <svg class="chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="feature-controls" id="feature-controls" style="display: none;">
        <button class="feature-button" id="stats-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 20V10M12 20V4M6 20v-6"/>
            </svg>
            Estadísticas
        </button>
        <button class="feature-button" id="sound-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
                <path d="M15.54 8.46a5 5 0 0 1 0 7.07M19.07 4.93a10 10 0 0 1 0 14.14"/>
            </svg>
            <span class="sound-label">Sonido: Desactivado</span>
        </button>
        <button class="feature-button" id="latency-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
            </svg>
            Prueba de Latencia
        </button>
    </div>

    <div class="stats-panel" id="stats-panel" style="display: none;">
        <div class="stats-header">
            <h3><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 20V10M12 20V4M6 20v-6"/></svg> Estadísticas de Sesión</h3>
            <button class="close-btn" id="close-stats">&times;</button>
        </div>
        <div class="stats-content">
            <div class="stat-item"><span class="stat-label">Total de Pulsaciones</span><span class="stat-value" id="total-keys">0</span></div>
            <div class="stat-item"><span class="stat-label">Duración de Sesión</span><span class="stat-value" id="session-time">00:00</span></div>
            <div class="stat-item"><span class="stat-label">Teclas Probadas</span><span class="stat-value" id="keys-tested">0/104</span></div>
            <div class="stat-item"><span class="stat-label">Más Pulsada</span><span class="stat-value" id="most-pressed">Ninguna</span></div>
        </div>
    </div>

    <div class="stats-panel" id="latency-panel" style="display: none;">
        <div class="stats-header">
            <h3><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg> Prueba de Latencia</h3>
            <button class="close-btn" id="close-latency">&times;</button>
        </div>
        <div class="stats-content">
            <div class="stat-item latency-display">
                <div id="current-latency" class="big-latency">-- ms</div>
                <div class="latency-sublabel">Latencia Actual</div>
            </div>
            <div class="latency-grid">
                <div class="stat-item compact"><span class="stat-value mono" id="avg-latency">--</span><span class="stat-label">Promedio</span></div>
                <div class="stat-item compact"><span class="stat-value mono" id="min-latency">--</span><span class="stat-label">Mejor</span></div>
                <div class="stat-item compact"><span class="stat-value mono" id="max-latency">--</span><span class="stat-label">Peor</span></div>
            </div>
        </div>
    </div>

    <div class="keyboard-container">
        <div class="keyboard-scale-wrapper" id="keyboard-scale-wrapper">
        <div class="keyboard-layout">
            <div class="keyboard-section main-keyboard">
                <div class="key-row">
                    <button class="key" data-key="Escape"><span>Esc</span></button>
                    <div class="gap"></div>
                    <button class="key" data-key="F1"><span>F1</span></button>
                    <button class="key" data-key="F2"><span>F2</span></button>
                    <button class="key" data-key="F3"><span>F3</span></button>
                    <button class="key" data-key="F4"><span>F4</span></button>
                    <div class="gap"></div>
                    <button class="key" data-key="F5"><span>F5</span></button>
                    <button class="key" data-key="F6"><span>F6</span></button>
                    <button class="key" data-key="F7"><span>F7</span></button>
                    <button class="key" data-key="F8"><span>F8</span></button>
                    <div class="gap"></div>
                    <button class="key" data-key="F9"><span>F9</span></button>
                    <button class="key" data-key="F10"><span>F10</span></button>
                    <button class="key" data-key="F11"><span>F11</span></button>
                    <button class="key" data-key="F12"><span>F12</span></button>
                </div>
                <div class="key-row">
                    <button class="key" data-key="Backquote"><span class="dual">°<br>|</span></button>
                    <button class="key" data-key="Digit1"><span class="dual">!<br>1</span></button>
                    <button class="key" data-key="Digit2"><span class="dual">"<br>2</span></button>
                    <button class="key" data-key="Digit3"><span class="dual">#<br>3</span></button>
                    <button class="key" data-key="Digit4"><span class="dual">$<br>4</span></button>
                    <button class="key" data-key="Digit5"><span class="dual">%<br>5</span></button>
                    <button class="key" data-key="Digit6"><span class="dual">&amp;<br>6</span></button>
                    <button class="key" data-key="Digit7"><span class="dual">/<br>7</span></button>
                    <button class="key" data-key="Digit8"><span class="dual">(<br>8</span></button>
                    <button class="key" data-key="Digit9"><span class="dual">)<br>9</span></button>
                    <button class="key" data-key="Digit0"><span class="dual">=<br>0</span></button>
                    <button class="key" data-key="Minus"><span class="dual">?<br>'</span></button>
                    <button class="key" data-key="Equal"><span class="dual">¿<br>¡</span></button>
                    <button class="key key-2x" data-key="Backspace"><span>Retroceso</span></button>
                </div>
                <div class="key-row">
                    <button class="key key-1-5x" data-key="Tab"><span>Tab</span></button>
                    <button class="key" data-key="KeyQ"><span>Q</span></button>
                    <button class="key" data-key="KeyW"><span>W</span></button>
                    <button class="key" data-key="KeyE"><span>E</span></button>
                    <button class="key" data-key="KeyR"><span>R</span></button>
                    <button class="key" data-key="KeyT"><span>T</span></button>
                    <button class="key" data-key="KeyY"><span>Y</span></button>
                    <button class="key" data-key="KeyU"><span>U</span></button>
                    <button class="key" data-key="KeyI"><span>I</span></button>
                    <button class="key" data-key="KeyO"><span>O</span></button>
                    <button class="key" data-key="KeyP"><span>P</span></button>
                    <button class="key" data-key="BracketLeft"><span class="dual">^<br>`</span></button>
                    <button class="key" data-key="BracketRight"><span class="dual">*<br>+</span></button>
                    <button class="key key-1-5x" data-key="Backslash"><span class="dual">}<br>]</span></button>
                </div>
                <div class="key-row">
                    <button class="key key-1-75x" data-key="CapsLock"><span>Bloq Mayús</span></button>
                    <button class="key" data-key="KeyA"><span>A</span></button>
                    <button class="key" data-key="KeyS"><span>S</span></button>
                    <button class="key" data-key="KeyD"><span>D</span></button>
                    <button class="key" data-key="KeyF"><span>F</span></button>
                    <button class="key" data-key="KeyG"><span>G</span></button>
                    <button class="key" data-key="KeyH"><span>H</span></button>
                    <button class="key" data-key="KeyJ"><span>J</span></button>
                    <button class="key" data-key="KeyK"><span>K</span></button>
                    <button class="key" data-key="KeyL"><span>L</span></button>
                    <button class="key" data-key="Semicolon"><span>Ñ</span></button>
                    <button class="key" data-key="Quote"><span class="dual">[<br>{</span></button>
                    <button class="key key-enter" data-key="Enter"><span>Enter</span></button>
                </div>
                <div class="key-row">
                    <button class="key key-2-25x" data-key="ShiftLeft"><span>Mayús</span></button>
                    <button class="key" data-key="KeyZ"><span>Z</span></button>
                    <button class="key" data-key="KeyX"><span>X</span></button>
                    <button class="key" data-key="KeyC"><span>C</span></button>
                    <button class="key" data-key="KeyV"><span>V</span></button>
                    <button class="key" data-key="KeyB"><span>B</span></button>
                    <button class="key" data-key="KeyN"><span>N</span></button>
                    <button class="key" data-key="KeyM"><span>M</span></button>
                    <button class="key" data-key="Comma"><span class="dual">;<br>,</span></button>
                    <button class="key" data-key="Period"><span class="dual">:<br>.</span></button>
                    <button class="key" data-key="Slash"><span class="dual">_<br>-</span></button>
                    <button class="key key-shift-right" data-key="ShiftRight"><span>Mayús</span></button>
                </div>
                <div class="key-row">
                    <button class="key key-1-25x" data-key="ControlLeft"><span>Ctrl</span></button>
                    <button class="key key-1-25x" data-key="MetaLeft"><span>Win</span></button>
                    <button class="key key-1-25x" data-key="AltLeft"><span>Alt</span></button>
                    <button class="key key-space" data-key="Space"><span>Espacio</span></button>
                    <button class="key key-1-25x" data-key="AltRight"><span>Alt Gr</span></button>
                    <button class="key key-1-25x" data-key="MetaRight"><span>Win</span></button>
                    <button class="key key-1-25x" data-key="ContextMenu"><span>Menú</span></button>
                    <button class="key key-1-25x" data-key="ControlRight"><span>Ctrl</span></button>
                </div>
            </div>

            <div class="keyboard-section nav-section">
                <div class="nav-top">
                    <div class="key-row">
                        <button class="key" data-key="PrintScreen"><span>Impr</span></button>
                        <button class="key" data-key="ScrollLock"><span>Bloq</span></button>
                        <button class="key" data-key="Pause"><span>Pausa</span></button>
                    </div>
                    <div class="key-row">
                        <button class="key" data-key="Insert"><span>Ins</span></button>
                        <button class="key" data-key="Home"><span>Inicio</span></button>
                        <button class="key" data-key="PageUp"><span>RePág</span></button>
                    </div>
                    <div class="key-row">
                        <button class="key" data-key="Delete"><span>Supr</span></button>
                        <button class="key" data-key="End"><span>Fin</span></button>
                        <button class="key" data-key="PageDown"><span>AvPág</span></button>
                    </div>
                </div>
                <div class="arrow-cluster">
                    <div class="key-row arrow-top"><button class="key" data-key="ArrowUp"><span>↑</span></button></div>
                    <div class="key-row arrow-bottom">
                        <button class="key" data-key="ArrowLeft"><span>←</span></button>
                        <button class="key" data-key="ArrowDown"><span>↓</span></button>
                        <button class="key" data-key="ArrowRight"><span>→</span></button>
                    </div>
                </div>
            </div>

            <div class="keyboard-section numpad-section">
                <div class="indicator-panel">
                    <div class="indicator" id="caps-indicator"><div class="led" id="caps-led"></div><span>Mayús</span></div>
                    <div class="indicator" id="num-indicator"><div class="led" id="num-led"></div><span>Num</span></div>
                    <div class="indicator" id="scroll-indicator"><div class="led" id="scroll-led"></div><span>Bloq</span></div>
                </div>
                <div class="numpad-grid">
                    <div class="key-row">
                        <button class="key" data-key="NumLock"><span>Num</span></button>
                        <button class="key" data-key="NumpadDivide"><span>/</span></button>
                        <button class="key" data-key="NumpadMultiply"><span>*</span></button>
                        <button class="key" data-key="NumpadSubtract"><span>-</span></button>
                    </div>
                    <div class="key-row">
                        <button class="key" data-key="Numpad7"><span>7</span></button>
                        <button class="key" data-key="Numpad8"><span>8</span></button>
                        <button class="key" data-key="Numpad9"><span>9</span></button>
                        <button class="key key-tall" data-key="NumpadAdd"><span>+</span></button>
                    </div>
                    <div class="key-row">
                        <button class="key" data-key="Numpad4"><span>4</span></button>
                        <button class="key" data-key="Numpad5"><span>5</span></button>
                        <button class="key" data-key="Numpad6"><span>6</span></button>
                    </div>
                    <div class="key-row">
                        <button class="key" data-key="Numpad1"><span>1</span></button>
                        <button class="key" data-key="Numpad2"><span>2</span></button>
                        <button class="key" data-key="Numpad3"><span>3</span></button>
                        <button class="key key-tall key-enter-tall" data-key="NumpadEnter"><span>Enter</span></button>
                    </div>
                    <div class="key-row">
                        <button class="key key-2x" data-key="Numpad0"><span>0</span></button>
                        <button class="key" data-key="NumpadDecimal"><span>.</span></button>
                    </div>
                </div>
            </div>
        </div>
        </div><!-- /keyboard-scale-wrapper -->
    </div>
</section>

<style>
@import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

.keyboard-tester, .keyboard-tester * { margin: 0; padding: 0; box-sizing: border-box; }

.keyboard-tester {
    --bg-primary: #0f0f14;
    --bg-secondary: #1a1a24;
    --bg-tertiary: #22222e;
    --key-bg: linear-gradient(180deg, #2a2a3a 0%, #1e1e2a 100%);
    --key-text: #e8e8f0;
    --key-border: #3a3a4a;
    --key-shadow: rgba(0, 0, 0, 0.5);
    --accent-primary: #00d4ff;
    --accent-secondary: #00ff88;
    --accent-tertiary: #ffd700;
    --accent-success: #00ff88;
    --accent-danger: #ff6b6b;
    --text-muted: #8888a0;
    --border-subtle: rgba(255, 255, 255, 0.08);
    --glow-color: rgba(0, 212, 255, 0.15);
    width: 100%; padding: 40px 24px; background: var(--bg-primary); font-family: 'Plus Jakarta Sans', sans-serif; position: relative; overflow: hidden;
}

.keyboard-tester::before {
    content: ''; position: absolute; inset: 0;
    background-image: radial-gradient(circle at 20% 20%, var(--glow-color) 0%, transparent 50%), radial-gradient(circle at 80% 80%, var(--glow-color) 0%, transparent 50%);
    pointer-events: none;
}

.keyboard-tester[data-theme="light"] {
    --bg-primary: #f5f5f8; --bg-secondary: #ffffff; --bg-tertiary: #eaeaf0;
    --key-bg: linear-gradient(180deg, #ffffff 0%, #f0f0f5 100%);
    --key-text: #1a1a2e; --key-border: #d0d0e0; --key-shadow: rgba(0, 0, 0, 0.1);
    --accent-primary: #0099cc; --text-muted: #666680; --border-subtle: rgba(0, 0, 0, 0.08);
}

.keyboard-tester[data-theme="midnight"] {
    --bg-primary: #0a0a14; --bg-secondary: #12121e; --bg-tertiary: #1a1a28;
    --key-bg: linear-gradient(180deg, #1e1e30 0%, #14142a 100%);
    --key-text: #c8d0e8; --key-border: #2a2a48; --accent-primary: #4a9eff;
}

.keyboard-tester[data-theme="cyberpunk"] {
    --bg-primary: #0a0a0f; --bg-secondary: #12121a; --key-bg: linear-gradient(180deg, #1f1f2e 0%, #12121a 100%);
    --key-text: #ff00ff; --key-border: #ff00ff; --accent-primary: #ff00ff; --glow-color: rgba(255, 0, 255, 0.2);
}

.keyboard-tester[data-theme="forest"] {
    --bg-primary: #0a1410; --bg-secondary: #0f1f18; --key-bg: linear-gradient(180deg, #1a3528 0%, #0f1f18 100%);
    --key-text: #90eebb; --key-border: #2a5540; --accent-primary: #00ff88;
}

.controls-wrapper { max-width: 1400px; margin: 0 auto 24px; display: flex; align-items: stretch; gap: 20px; position: relative; }
.textarea-wrapper { flex: 1; position: relative; }
.textarea-label { position: absolute; top: -8px; left: 12px; background: var(--bg-primary); padding: 0 8px; font-size: 11px; font-weight: 600; color: #00d4ff; text-transform: uppercase; letter-spacing: 0.5px; z-index: 1; }
.text-box { width: 100%; height: 132px; padding: 20px 16px 16px; background: var(--bg-secondary); border: 1px solid var(--key-border); border-radius: 12px; color: var(--key-text); font-family: 'JetBrains Mono', monospace; font-size: 13px; resize: vertical; outline: none; transition: all 0.2s ease; line-height: 1.6; }
.text-box:focus { border-color: var(--accent-primary); box-shadow: 0 0 0 3px var(--glow-color); }
.text-box::placeholder { color: var(--text-muted); }

.button-group { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); grid-template-rows: auto auto auto; gap: 6px 10px; width: 320px; flex: 0 0 auto; min-height: 132px; align-content: start; }
.button-group > .reset-button { grid-column: 1; grid-row: 1; }
.button-group > .select-wrapper:nth-of-type(1) { grid-column: 2; grid-row: 1; }
.button-group > .advanced-toggle-wrapper { grid-column: 1 / -1; grid-row: 2; }

.reset-button { display: inline-flex; align-items: center; gap: 8px; padding: 6px 10px; background: linear-gradient(180deg, #ff6b6b 0%, #ee5a52 100%); border: none; border-radius: 8px; color: white; font-size: 12px; font-weight: 600; cursor: pointer; box-shadow: 0 3px 0 #cc4444, 0 4px 12px rgba(255, 107, 107, 0.3); width: 100%; justify-content: center; }
.reset-button:hover { transform: translateY(-2px); box-shadow: 0 5px 0 #cc4444, 0 6px 16px rgba(255, 107, 107, 0.4); }
.reset-button:active { transform: translateY(2px); box-shadow: 0 1px 0 #cc4444; }

.select-wrapper { display: flex; flex-direction: column; gap: 2px; width: 100%; height: 100%; }
.select-wrapper label { font-size: 9px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; }
.select-wrapper select { padding: 6px 10px; background: var(--bg-secondary); color: var(--key-text); border: 1px solid var(--key-border); border-radius: 10px; font-size: 12px; font-weight: 500; cursor: pointer; appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236b7280' viewBox='0 0 16 16'%3E%3Cpath d='M4.5 6l3.5 4 3.5-4H4.5z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; padding-right: 36px; flex: 1; outline: none; }
.select-wrapper select:hover { border-color: var(--accent-primary); }

.advanced-toggle-wrapper { margin: 0; display: flex; justify-content: stretch; }
.advanced-toggle-btn { display: inline-flex; align-items: center; gap: 10px; padding: 8px 10px; background: var(--bg-secondary); border: 1px solid var(--key-border); border-radius: 12px; color: var(--key-text); font-size: 12px; font-weight: 600; cursor: pointer; width: 100%; justify-content: center; }
.advanced-toggle-btn:hover { border-color: var(--accent-primary); background: var(--glow-color); }
.advanced-toggle-btn .chevron { transition: transform 0.2s ease; margin-left: auto; }
.advanced-toggle-btn.active .chevron { transform: rotate(180deg); }

.feature-controls { display: flex; gap: 10px; margin-bottom: 20px; flex-wrap: wrap; }
.feature-button { display: flex; align-items: center; gap: 8px; padding: 10px 18px; background: var(--bg-secondary); border: 1px solid var(--border-subtle); border-radius: 8px; color: var(--key-text); font-size: 13px; font-weight: 500; cursor: pointer; transition: all 0.2s; }
.feature-button:hover { border-color: var(--accent-primary); background: var(--glow-color); }
.feature-button.active { border-color: var(--accent-primary); background: var(--glow-color); color: var(--accent-primary); }

.stats-panel { background: var(--bg-secondary); border: 1px solid var(--border-subtle); border-radius: 16px; padding: 20px; margin-bottom: 20px; }
.stats-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; padding-bottom: 16px; border-bottom: 1px solid var(--border-subtle); }
.stats-header h3 { display: flex; align-items: center; gap: 10px; color: var(--accent-primary); font-size: 16px; font-weight: 600; }
.close-btn { width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; background: rgba(255, 107, 107, 0.1); border: none; border-radius: 8px; color: var(--accent-danger); font-size: 20px; cursor: pointer; }
.stats-content { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 16px; }
.stat-item { display: flex; flex-direction: column; align-items: center; padding: 16px; background: var(--bg-tertiary); border-radius: 10px; text-align: center; }
.stat-item .stat-label { font-size: 12px; color: var(--text-muted); margin-bottom: 8px; }
.stat-item .stat-value { font-size: 24px; font-weight: 700; color: var(--accent-primary); }
.stat-item .stat-value.mono { font-family: 'JetBrains Mono', monospace; }
.latency-display { grid-column: span 2; }
.big-latency { font-size: 48px; font-weight: 700; color: var(--accent-primary); font-family: 'JetBrains Mono', monospace; }
.latency-sublabel { font-size: 12px; color: var(--text-muted); margin-top: 8px; }
.latency-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; margin-top: 16px; }
.stat-item.compact { padding: 12px; }
.stat-item.compact .stat-value { font-size: 18px; }

.keyboard-container { max-width: 1400px; margin: 0 auto; background: var(--bg-secondary); border-radius: 20px; padding: 32px; box-shadow: 0 4px 24px var(--key-shadow), inset 0 1px 0 var(--border-subtle); border: 1px solid var(--border-subtle); overflow: hidden; position: relative; }
.keyboard-scale-wrapper { transform-origin: center top; display: flex; justify-content: center; }
.keyboard-layout { display: flex; gap: 24px; justify-content: center; align-items: flex-end; }
.keyboard-section { display: flex; flex-direction: column; gap: 6px; }
.nav-section { display: flex; flex-direction: column; justify-content: space-between; height: 318px; }
.nav-top { display: flex; flex-direction: column; gap: 6px; }
.arrow-cluster { display: flex; flex-direction: column; margin-top: auto; }
.arrow-top { justify-content: center; margin-bottom: 6px; }
.arrow-bottom { justify-content: center; }
.key-row { display: flex; gap: 6px; }
.key-row:first-child { margin-bottom: 10px; }
.gap { width: 14px; }

.key { position: relative; height: 48px; width: 48px; background: var(--key-bg); border: 1px solid var(--key-border); border-radius: 8px; color: var(--key-text); font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.12s ease; box-shadow: 0 3px 0 var(--key-shadow), 0 4px 8px var(--key-shadow), inset 0 1px 0 rgba(255, 255, 255, 0.05); display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 0; }
.key span { text-align: center; line-height: 1.2; font-size: 11px; pointer-events: none; }
.key:hover { transform: translateY(-2px); box-shadow: 0 5px 0 var(--key-shadow), 0 6px 12px var(--key-shadow); }
.key:active, .key.pressed { transform: translateY(2px); box-shadow: 0 1px 0 var(--key-shadow); }
.key .dual { font-size: 10px; line-height: 1.2; text-align: center; }

.key.active-1 { background: linear-gradient(180deg, #00d4ff 0%, #00a8cc 100%) !important; color: #000 !important; border-color: #00d4ff !important; box-shadow: 0 0 20px rgba(0, 212, 255, 0.5), 0 3px 0 rgba(0, 168, 204, 0.5) !important; transform: translateY(-1px); }
.key.active-2 { background: linear-gradient(180deg, #ffd700 0%, #ccaa00 100%) !important; color: #000 !important; border-color: #ffd700 !important; box-shadow: 0 0 20px rgba(255, 215, 0, 0.5), 0 3px 0 rgba(204, 170, 0, 0.5) !important; transform: translateY(-1px); }
.key.active-3 { background: linear-gradient(180deg, #00ff88 0%, #00cc6a 100%) !important; color: #000 !important; border-color: #00ff88 !important; box-shadow: 0 0 20px rgba(0, 255, 136, 0.5), 0 3px 0 rgba(0, 204, 106, 0.5) !important; transform: translateY(-1px); }
.key.active-4 { background: linear-gradient(180deg, #ff6b6b 0%, #cc5555 100%) !important; color: #fff !important; border-color: #ff6b6b !important; box-shadow: 0 0 20px rgba(255, 107, 107, 0.5), 0 3px 0 rgba(204, 85, 85, 0.5) !important; transform: translateY(-1px); }
.key.active-5 { background: linear-gradient(180deg, #c084fc 0%, #9966cc 100%) !important; color: #fff !important; border-color: #c084fc !important; box-shadow: 0 0 20px rgba(192, 132, 252, 0.5), 0 3px 0 rgba(153, 102, 204, 0.5) !important; transform: translateY(-1px); }

.key-counter { position: absolute; top: 3px; right: 3px; background: rgba(0, 0, 0, 0.7); color: white; font-size: 9px; padding: 2px 5px; border-radius: 6px; min-width: 16px; text-align: center; font-weight: 700; font-family: 'JetBrains Mono', monospace; backdrop-filter: blur(4px); }

.key-1-25x { width: 60px; } .key-1-5x { width: 72px; } .key-1-75x { width: 84px; } .key-2x { width: 96px; } .key-2-25x { width: 108px; } .key-enter { width: 114px; } .key-shift-right { width: 144px; } .key-space { width: 336px; }

.numpad-section { align-self: flex-end; }
.indicator-panel { display: flex; gap: 20px; justify-content: center; margin-bottom: 12px; padding: 10px 16px; }
.indicator { display: flex; flex-direction: column; align-items: center; gap: 5px; }
.indicator .led { width: 12px; height: 12px; border-radius: 50%; background: #333; border: 1px solid var(--key-border); transition: all 0.3s ease; }
.indicator.active .led { background: var(--accent-success); box-shadow: 0 0 10px var(--accent-success), 0 0 20px var(--accent-success); border-color: var(--accent-success); }
.indicator span { font-size: 9px; color: var(--text-muted); font-weight: 600; text-transform: uppercase; }

.numpad-grid { display: grid; grid-template-columns: repeat(4, 48px); grid-template-rows: repeat(5, 48px); gap: 6px; }
.numpad-grid .key-row { display: contents; }
.numpad-grid .key-row:nth-child(1) .key { grid-row: 1; }
.numpad-grid .key-row:nth-child(2) .key:nth-child(1) { grid-row: 2; grid-column: 1; }
.numpad-grid .key-row:nth-child(2) .key:nth-child(2) { grid-row: 2; grid-column: 2; }
.numpad-grid .key-row:nth-child(2) .key:nth-child(3) { grid-row: 2; grid-column: 3; }
.numpad-grid .key-row:nth-child(2) .key-tall { grid-row: 2 / 4; grid-column: 4; height: 102px; }
.numpad-grid .key-row:nth-child(3) .key { grid-row: 3; }
.numpad-grid .key-row:nth-child(4) .key:nth-child(1) { grid-row: 4; grid-column: 1; }
.numpad-grid .key-row:nth-child(4) .key:nth-child(2) { grid-row: 4; grid-column: 2; }
.numpad-grid .key-row:nth-child(4) .key:nth-child(3) { grid-row: 4; grid-column: 3; }
.numpad-grid .key-row:nth-child(4) .key-enter-tall { grid-row: 4 / 6; grid-column: 4; height: 102px; }
.numpad-grid .key-row:nth-child(5) .key-2x { grid-row: 5; grid-column: 1 / 3; width: 102px; }
.numpad-grid .key-row:nth-child(5) .key:nth-child(2) { grid-row: 5; grid-column: 3; }
.numpad-grid .key { width: 48px; height: 48px; min-width: auto; }

@media (max-width: 1200px) { .controls-wrapper { flex-direction: column; gap: 16px; } .button-group { width: 100%; max-width: 400px; margin: 0 auto; } }
@media (max-width: 768px) { .keyboard-tester { padding: 20px 12px; } .button-group { grid-template-columns: 1fr; height: auto; } .button-group > .select-wrapper:nth-of-type(1) { grid-column: 1; grid-row: 2; } .button-group > .advanced-toggle-wrapper { grid-row: 3; } }
</style>

<script>
(function() {
    'use strict';
    const tester = document.querySelector('.keyboard-tester');
    const state = { keyPressCount: {}, uniqueKeys: new Set(), totalPresses: 0, sessionStart: null, sessionTimer: null, soundEnabled: false, latencyData: [], lastKeyTime: 0 };
    let audioCtx = null;
    const $ = id => document.getElementById(id);
    const $$ = sel => document.querySelectorAll(sel);

    const themeSelector = $('theme-selector');
    if (themeSelector) themeSelector.addEventListener('change', (e) => tester.setAttribute('data-theme', e.target.value));

    const advancedToggle = $('advanced-toggle');
    const featureControls = $('feature-controls');
    if (advancedToggle && featureControls) advancedToggle.addEventListener('click', () => { advancedToggle.classList.toggle('active'); featureControls.style.display = featureControls.style.display === 'none' ? 'flex' : 'none'; });

    const statsButton = $('stats-button'), statsPanel = $('stats-panel'), closeStats = $('close-stats');
    if (statsButton && statsPanel) statsButton.addEventListener('click', () => { statsPanel.style.display = statsPanel.style.display === 'none' ? 'block' : 'none'; statsButton.classList.toggle('active'); });
    if (closeStats) closeStats.addEventListener('click', () => { statsPanel.style.display = 'none'; statsButton.classList.remove('active'); });

    const latencyButton = $('latency-button'), latencyPanel = $('latency-panel'), closeLatency = $('close-latency');
    if (latencyButton && latencyPanel) latencyButton.addEventListener('click', () => { latencyPanel.style.display = latencyPanel.style.display === 'none' ? 'block' : 'none'; latencyButton.classList.toggle('active'); });
    if (closeLatency) closeLatency.addEventListener('click', () => { latencyPanel.style.display = 'none'; latencyButton.classList.remove('active'); });

    const soundButton = $('sound-button');
    if (soundButton) soundButton.addEventListener('click', () => { state.soundEnabled = !state.soundEnabled; soundButton.classList.toggle('active', state.soundEnabled); soundButton.querySelector('.sound-label').textContent = state.soundEnabled ? 'Sonido: Activado' : 'Sonido: Desactivado'; });

    function playSound() { if (!state.soundEnabled) return; if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)(); const osc = audioCtx.createOscillator(), gain = audioCtx.createGain(); osc.connect(gain); gain.connect(audioCtx.destination); osc.frequency.value = 800; osc.type = 'sine'; gain.gain.setValueAtTime(0.1, audioCtx.currentTime); gain.gain.exponentialRampToValueAtTime(0.01, audioCtx.currentTime + 0.08); osc.start(); osc.stop(audioCtx.currentTime + 0.08); }
    function startTimer() { if (state.sessionTimer) return; state.sessionStart = Date.now(); state.sessionTimer = setInterval(() => { const elapsed = Math.floor((Date.now() - state.sessionStart) / 1000); const m = Math.floor(elapsed / 60).toString().padStart(2, '0'); const s = (elapsed % 60).toString().padStart(2, '0'); if ($('session-time')) $('session-time').textContent = `${m}:${s}`; }, 1000); }
    function updateStats() { if ($('total-keys')) $('total-keys').textContent = state.totalPresses; if ($('keys-tested')) $('keys-tested').textContent = `${state.uniqueKeys.size}/104`; let maxKey = null, maxCount = 0; for (const [key, count] of Object.entries(state.keyPressCount)) { if (count > maxCount) { maxCount = count; maxKey = key; } } if ($('most-pressed') && maxKey) $('most-pressed').textContent = `${maxKey} (${maxCount})`; if (state.latencyData.length > 0) { const avg = Math.round(state.latencyData.reduce((a, b) => a + b, 0) / state.latencyData.length); if ($('avg-latency')) $('avg-latency').textContent = avg + ' ms'; if ($('min-latency')) $('min-latency').textContent = Math.min(...state.latencyData) + ' ms'; if ($('max-latency')) $('max-latency').textContent = Math.max(...state.latencyData) + ' ms'; } }

    function handleKeyDown(e) {
        e.preventDefault();
        const now = performance.now();
        const latency = state.lastKeyTime ? Math.round(now - state.lastKeyTime) : 0;
        state.lastKeyTime = now;
        startTimer();
        state.keyPressCount[e.code] = (state.keyPressCount[e.code] || 0) + 1;
        const pressCount = state.keyPressCount[e.code];
        const activeLevel = ((pressCount - 1) % 5) + 1;
        state.totalPresses++;
        state.uniqueKeys.add(e.code);
        if (latency > 0) { state.latencyData.push(latency); if ($('current-latency')) $('current-latency').textContent = latency + ' ms'; }
        const keyEl = document.querySelector(`[data-key="${e.code}"]`);
        if (keyEl) { keyEl.classList.remove('pressed', 'active-1', 'active-2', 'active-3', 'active-4', 'active-5'); keyEl.classList.add('pressed', `active-${activeLevel}`); let counter = keyEl.querySelector('.key-counter'); if (!counter) { counter = document.createElement('div'); counter.className = 'key-counter'; keyEl.appendChild(counter); } counter.textContent = pressCount; }
        let keyName = e.key.length === 1 ? e.key : e.code;
        const history = $('key-history');
        if (history) history.value = keyName + (history.value ? ' ' + history.value : '');
        updateStats(); playSound();
        if (e.getModifierState) { const capsInd = $('caps-indicator'), numInd = $('num-indicator'), scrollInd = $('scroll-indicator'); if (capsInd) capsInd.classList.toggle('active', e.getModifierState('CapsLock')); if (numInd) numInd.classList.toggle('active', e.getModifierState('NumLock')); if (scrollInd) scrollInd.classList.toggle('active', e.getModifierState('ScrollLock')); }
    }
    function handleKeyUp(e) { const keyEl = document.querySelector(`[data-key="${e.code}"]`); if (keyEl) keyEl.classList.remove('pressed'); }
    function reset() { state.keyPressCount = {}; state.uniqueKeys.clear(); state.totalPresses = 0; state.sessionStart = null; state.latencyData = []; state.lastKeyTime = 0; if (state.sessionTimer) { clearInterval(state.sessionTimer); state.sessionTimer = null; } if ($('key-history')) $('key-history').value = ''; if ($('total-keys')) $('total-keys').textContent = '0'; if ($('session-time')) $('session-time').textContent = '00:00'; if ($('keys-tested')) $('keys-tested').textContent = '0/104'; if ($('most-pressed')) $('most-pressed').textContent = 'Ninguna'; if ($('current-latency')) $('current-latency').textContent = '-- ms'; if ($('avg-latency')) $('avg-latency').textContent = '--'; if ($('min-latency')) $('min-latency').textContent = '--'; if ($('max-latency')) $('max-latency').textContent = '--'; $$('.key').forEach(k => { k.classList.remove('pressed', 'active-1', 'active-2', 'active-3', 'active-4', 'active-5'); const counter = k.querySelector('.key-counter'); if (counter) counter.remove(); }); $$('.indicator').forEach(i => i.classList.remove('active')); }

    document.addEventListener('keydown', handleKeyDown);
    document.addEventListener('keyup', handleKeyUp);
    const resetButton = $('reset-button');
    if (resetButton) resetButton.addEventListener('click', reset);
    $$('.key').forEach(key => { key.addEventListener('click', () => { const code = key.dataset.key; const ev = new KeyboardEvent('keydown', { code: code, key: key.textContent.trim() || code, bubbles: true }); document.dispatchEvent(ev); setTimeout(() => document.dispatchEvent(new KeyboardEvent('keyup', { code, bubbles: true })), 100); }); });
})();

// Responsive keyboard scaling
(function() {
    function scaleKeyboard() {
        const wrapper = document.getElementById('keyboard-scale-wrapper');
        const container = document.querySelector('.keyboard-container');
        const layout = document.querySelector('.keyboard-layout');
        if (!wrapper || !container || !layout) return;
        wrapper.style.transform = 'none';
        container.style.height = 'auto';
        void layout.offsetWidth;
        const layoutWidth = layout.scrollWidth;
        const layoutHeight = layout.scrollHeight;
        const containerPadding = 64;
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
