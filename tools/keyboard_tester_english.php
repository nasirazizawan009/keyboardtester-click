<?php
ob_start();
?>

<section class="keyboard-tester" id="keyboard-tester">
    <!-- Controls (hidden on mobile - mobile users use Mobile Keyboard Tester below) -->
    <div class="controls-wrapper desktop-only">
        <div class="textarea-wrapper">
            <div class="textarea-label">Key History</div>
            <textarea class="text-box" id="key-history" rows="4" placeholder="Press any key to start testing..."></textarea>
        </div>
        <div class="button-group">
            <button class="reset-button" id="reset-button">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                    <path d="M3 3v5h5"/>
                </svg>
                Reset
            </button>
            <div class="select-wrapper">
                <label>Theme</label>
                <select class="theme-selector" id="theme-selector">
                    <option value="dark">Dark</option>
                    <option value="light">Light</option>
                    <option value="midnight">Midnight</option>
                    <option value="cyberpunk">Cyberpunk</option>
                    <option value="forest">Forest</option>
                </select>
            </div>
            <div class="select-wrapper">
                <label>Layout</label>
                <select class="layout-selector" id="layout-selector">
                    <option value="qwerty">QWERTY</option>
                    <option value="dvorak">Dvorak</option>
                    <option value="colemak">Colemak</option>
                    <option value="azerty">AZERTY</option>
                    <option value="qwertz">QWERTZ</option>
                </select>
            </div>
            <div class="select-wrapper">
                <label>OS</label>
                <select class="os-selector" id="os-selector">
                    <option value="windows">Windows</option>
                    <option value="mac">Mac</option>
                </select>
            </div>
            <!-- Advanced Options Toggle -->
            <div class="advanced-toggle-wrapper">
                <button class="advanced-toggle-btn" id="advanced-toggle">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
                    </svg>
                    <span>Advanced Options</span>
                    <svg class="chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Feature Buttons (hidden on mobile) -->
    <div class="feature-controls desktop-only" id="feature-controls" style="display: none;">
        <button class="feature-button" id="stats-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 20V10M12 20V4M6 20v-6"/>
            </svg>
            Statistics
        </button>
        <button class="feature-button" id="heatmap-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2c1 3 2.5 3.5 3.5 4.5A5 5 0 0 1 17 11a5 5 0 1 1-10 0c0-1.5.5-2 1-3 .5 1 2.5 2 3 2 .5-2 1-4 1-8Z"/>
            </svg>
            Heatmap
        </button>
        <button class="feature-button" id="sound-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
                <path d="M15.54 8.46a5 5 0 0 1 0 7.07M19.07 4.93a10 10 0 0 1 0 14.14"/>
            </svg>
            <span class="sound-label">Sound: OFF</span>
        </button>
        <button class="feature-button" id="test-mode-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            Test All Keys
        </button>
        <button class="feature-button" id="export-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
            </svg>
            Export
        </button>
        <button class="feature-button" id="ghost-click-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 10h.01M15 10h.01M12 2a8 8 0 0 0-8 8v12l3-3 2 3 3-3 3 3 2-3 3 3V10a8 8 0 0 0-8-8z"/>
            </svg>
            Ghost Click
        </button>
        <button class="feature-button" id="latency-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
            </svg>
            Latency Test
        </button>
    </div>

    <!-- Statistics Panel -->
    <div class="stats-panel" id="stats-panel" style="display: none;">
        <div class="stats-header">
            <span class="panel-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 20V10M12 20V4M6 20v-6"/>
                </svg>
                Session Statistics
            </span>
            <button class="close-btn" id="close-stats">&times;</button>
        </div>
        <div class="stats-content">
            <div class="stat-item">
                <span class="stat-label">Total Keys Pressed</span>
                <span class="stat-value" id="total-keys">0</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Session Duration</span>
                <span class="stat-value" id="session-time">00:00</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Keys Tested</span>
                <span class="stat-value" id="keys-tested">0/104</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Most Pressed Key</span>
                <span class="stat-value" id="most-pressed">None</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Least Pressed Key</span>
                <span class="stat-value" id="least-pressed">None</span>
            </div>
        </div>
    </div>

    <!-- Ghost Click Detection Panel -->
    <div class="stats-panel" id="ghost-panel" style="display: none;">
        <div class="stats-header">
            <span class="panel-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 10h.01M15 10h.01M12 2a8 8 0 0 0-8 8v12l3-3 2 3 3-3 3 3 2-3 3 3V10a8 8 0 0 0-8-8z"/>
                </svg>
                Ghost Click Detection
            </span>
            <button class="close-btn" id="close-ghost">&times;</button>
        </div>
        <div class="stats-content">
            <div class="stat-item info-box">
                <div class="status-indicator">
                    <div id="ghost-status-dot" class="status-dot ready"></div>
                    <span id="ghost-status-text">Ready to test</span>
                </div>
                <p class="info-text">
                    <strong>Ghost Click Test</strong><br>
                    Do NOT touch your keyboard during the test. The system will monitor for any phantom/unintended key presses.
                </p>
            </div>
            <div class="stat-item">
                <span class="stat-label">Test Duration</span>
                <span class="stat-value mono" id="ghost-timer">00:00</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Ghost Clicks Detected</span>
                <span class="stat-value warning" id="ghost-count">0</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">Total Key Events</span>
                <span class="stat-value" id="ghost-total">0</span>
            </div>
            <div class="stat-item full-width">
                <span class="stat-label">Detection Log</span>
                <div id="ghost-log-content" class="log-container">
                    <p class="log-placeholder success">No ghost clicks detected. Your keyboard is working properly!</p>
                </div>
            </div>
            <div class="button-row">
                <button class="action-btn primary" id="start-ghost-test">Start Test</button>
                <button class="action-btn" id="stop-ghost-test" disabled>Stop Test</button>
                <button class="action-btn" id="clear-ghost-log">Clear Log</button>
            </div>
        </div>
    </div>

    <!-- Latency Test Panel -->
    <div class="stats-panel" id="latency-panel" style="display: none;">
        <div class="stats-header">
            <span class="panel-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                </svg>
                Keyboard Latency Test
            </span>
            <button class="close-btn" id="close-latency">&times;</button>
        </div>
        <div class="stats-content">
            <div class="stat-item info-box">
                <div class="status-indicator">
                    <div id="latency-status-dot" class="status-dot ready"></div>
                    <span id="latency-status-text">Ready to test</span>
                </div>
                <p class="info-text">
                    <strong>Latency Measurement</strong><br>
                    Press any key to measure response time. Lower latency = Better responsiveness.
                </p>
            </div>
            <div class="stat-item latency-display">
                <div id="current-latency" class="big-latency">-- ms</div>
                <div class="latency-sublabel">Current Latency</div>
            </div>
            <div class="latency-grid">
                <div class="stat-item compact">
                    <span class="stat-value mono" id="avg-latency">-- ms</span>
                    <span class="stat-label">Average</span>
                </div>
                <div class="stat-item compact">
                    <span class="stat-value mono" id="min-latency">-- ms</span>
                    <span class="stat-label">Best</span>
                </div>
                <div class="stat-item compact">
                    <span class="stat-value mono" id="max-latency">-- ms</span>
                    <span class="stat-label">Worst</span>
                </div>
                <div class="stat-item compact">
                    <span class="stat-value" id="test-count">0</span>
                    <span class="stat-label">Tests</span>
                </div>
            </div>
            <div class="stat-item full-width">
                <span class="stat-label">Recent Tests</span>
                <div id="latency-log-content" class="log-container">
                    <p class="log-placeholder">Press any key to start testing...</p>
                </div>
            </div>
            <div id="latency-rating" class="rating-box">
                Your keyboard latency will be rated after 10 tests
            </div>
            <div class="button-row">
                <button class="action-btn primary" id="start-latency-test">Start Test</button>
                <button class="action-btn" id="stop-latency-test" disabled>Stop Test</button>
                <button class="action-btn" id="clear-latency">Clear Results</button>
            </div>
        </div>
    </div>

    <!-- Mobile Keyboard Tester -->
    <div class="mobile-keyboard-section" id="mobile-keyboard-section">
        <div class="mobile-notice">
            <span class="mobile-icon">📱</span>
            <span>Mobile Keyboard Tester</span>
        </div>
        <div class="mobile-input-wrapper">
            <label for="mobile-input">Tap here and start typing to test your keyboard:</label>
            <input type="text" id="mobile-input" class="mobile-input" placeholder="Tap to open keyboard and type..." autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false">
            <button class="mobile-clear-btn" id="mobile-clear-btn">Clear</button>
        </div>

        <div class="mobile-keyboard-display">
            <div class="mobile-keyboard-row">
                <div class="mobile-key" data-char="q">Q</div>
                <div class="mobile-key" data-char="w">W</div>
                <div class="mobile-key" data-char="e">E</div>
                <div class="mobile-key" data-char="r">R</div>
                <div class="mobile-key" data-char="t">T</div>
                <div class="mobile-key" data-char="y">Y</div>
                <div class="mobile-key" data-char="u">U</div>
                <div class="mobile-key" data-char="i">I</div>
                <div class="mobile-key" data-char="o">O</div>
                <div class="mobile-key" data-char="p">P</div>
            </div>
            <div class="mobile-keyboard-row">
                <div class="mobile-key" data-char="a">A</div>
                <div class="mobile-key" data-char="s">S</div>
                <div class="mobile-key" data-char="d">D</div>
                <div class="mobile-key" data-char="f">F</div>
                <div class="mobile-key" data-char="g">G</div>
                <div class="mobile-key" data-char="h">H</div>
                <div class="mobile-key" data-char="j">J</div>
                <div class="mobile-key" data-char="k">K</div>
                <div class="mobile-key" data-char="l">L</div>
            </div>
            <div class="mobile-keyboard-row">
                <div class="mobile-key" data-char="z">Z</div>
                <div class="mobile-key" data-char="x">X</div>
                <div class="mobile-key" data-char="c">C</div>
                <div class="mobile-key" data-char="v">V</div>
                <div class="mobile-key" data-char="b">B</div>
                <div class="mobile-key" data-char="n">N</div>
                <div class="mobile-key" data-char="m">M</div>
            </div>
            <div class="mobile-keyboard-row mobile-row-numbers">
                <div class="mobile-key" data-char="1">1</div>
                <div class="mobile-key" data-char="2">2</div>
                <div class="mobile-key" data-char="3">3</div>
                <div class="mobile-key" data-char="4">4</div>
                <div class="mobile-key" data-char="5">5</div>
                <div class="mobile-key" data-char="6">6</div>
                <div class="mobile-key" data-char="7">7</div>
                <div class="mobile-key" data-char="8">8</div>
                <div class="mobile-key" data-char="9">9</div>
                <div class="mobile-key" data-char="0">0</div>
            </div>
            <div class="mobile-keyboard-row mobile-row-special">
                <div class="mobile-key mobile-key-wide" data-char=" ">Space</div>
                <div class="mobile-key" data-char=".">.</div>
                <div class="mobile-key" data-char=",">,</div>
                <div class="mobile-key" data-char="@">@</div>
                <div class="mobile-key" data-char="!">!</div>
                <div class="mobile-key" data-char="?">?</div>
            </div>
        </div>

        <div class="mobile-stats">
            <div class="mobile-stat">
                <span class="mobile-stat-label">Characters Typed</span>
                <span class="mobile-stat-value" id="mobile-char-count">0</span>
            </div>
            <div class="mobile-stat">
                <span class="mobile-stat-label">Unique Keys</span>
                <span class="mobile-stat-value" id="mobile-unique-keys">0/42</span>
            </div>
        </div>

        <div class="mobile-tip">
            <strong>Tip:</strong> Use your device's keyboard (appears when you tap the input field above). Each key you press will light up on the visual keyboard!
        </div>
    </div>

    <!-- Desktop Keyboard (hidden on mobile) -->
    <div class="keyboard-container desktop-only">
        <div class="keyboard-scale-wrapper" id="keyboard-scale-wrapper">
        <div class="keyboard-layout">
            <!-- Main Keyboard -->
            <div class="keyboard-section main-keyboard">
                <!-- Function Keys -->
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

                <!-- Number Row -->
                <div class="key-row">
                    <button class="key" data-key="Backquote"><span>~<br>`</span></button>
                    <button class="key" data-key="Digit1"><span>!<br>1</span></button>
                    <button class="key" data-key="Digit2"><span>@<br>2</span></button>
                    <button class="key" data-key="Digit3"><span>#<br>3</span></button>
                    <button class="key" data-key="Digit4"><span>$<br>4</span></button>
                    <button class="key" data-key="Digit5"><span>%<br>5</span></button>
                    <button class="key" data-key="Digit6"><span>^<br>6</span></button>
                    <button class="key" data-key="Digit7"><span>&amp;<br>7</span></button>
                    <button class="key" data-key="Digit8"><span>*<br>8</span></button>
                    <button class="key" data-key="Digit9"><span>(<br>9</span></button>
                    <button class="key" data-key="Digit0"><span>)<br>0</span></button>
                    <button class="key" data-key="Minus"><span>_<br>-</span></button>
                    <button class="key" data-key="Equal"><span>+<br>=</span></button>
                    <button class="key key-2x" data-key="Backspace"><span>Backspace</span></button>
                </div>

                <!-- QWERTY Row -->
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
                    <button class="key" data-key="BracketLeft"><span>{<br>[</span></button>
                    <button class="key" data-key="BracketRight"><span>}<br>]</span></button>
                    <button class="key key-1-5x" data-key="Backslash"><span>|<br>\</span></button>
                </div>

                <!-- ASDF Row -->
                <div class="key-row">
                    <button class="key key-1-75x" data-key="CapsLock"><span>Caps Lock</span></button>
                    <button class="key" data-key="KeyA"><span>A</span></button>
                    <button class="key" data-key="KeyS"><span>S</span></button>
                    <button class="key" data-key="KeyD"><span>D</span></button>
                    <button class="key" data-key="KeyF"><span>F</span></button>
                    <button class="key" data-key="KeyG"><span>G</span></button>
                    <button class="key" data-key="KeyH"><span>H</span></button>
                    <button class="key" data-key="KeyJ"><span>J</span></button>
                    <button class="key" data-key="KeyK"><span>K</span></button>
                    <button class="key" data-key="KeyL"><span>L</span></button>
                    <button class="key" data-key="Semicolon"><span>:<br>;</span></button>
                    <button class="key" data-key="Quote"><span>"<br>'</span></button>
                    <button class="key key-enter" data-key="Enter"><span>Enter</span></button>
                </div>

                <!-- ZXCV Row -->
                <div class="key-row">
                    <button class="key key-2-25x" data-key="ShiftLeft"><span>Shift</span></button>
                    <button class="key" data-key="KeyZ"><span>Z</span></button>
                    <button class="key" data-key="KeyX"><span>X</span></button>
                    <button class="key" data-key="KeyC"><span>C</span></button>
                    <button class="key" data-key="KeyV"><span>V</span></button>
                    <button class="key" data-key="KeyB"><span>B</span></button>
                    <button class="key" data-key="KeyN"><span>N</span></button>
                    <button class="key" data-key="KeyM"><span>M</span></button>
                    <button class="key" data-key="Comma"><span>&lt;<br>,</span></button>
                    <button class="key" data-key="Period"><span>&gt;<br>.</span></button>
                    <button class="key" data-key="Slash"><span>?<br>/</span></button>
                    <button class="key key-shift-right" data-key="ShiftRight"><span>Shift</span></button>
                </div>

                <!-- Bottom Row -->
                <div class="key-row">
                    <button class="key key-1-25x" data-key="ControlLeft"><span>Ctrl</span></button>
                    <button class="key key-1-25x" data-key="MetaLeft"><span>Win</span></button>
                    <button class="key key-1-25x" data-key="AltLeft"><span>Alt</span></button>
                    <button class="key key-space" data-key="Space"><span>Space</span></button>
                    <button class="key key-1-25x" data-key="AltRight"><span>Alt</span></button>
                    <button class="key key-1-25x" data-key="MetaRight"><span>Win</span></button>
                    <button class="key key-1-25x" data-key="ContextMenu"><span>Menu</span></button>
                    <button class="key key-1-25x" data-key="ControlRight"><span>Ctrl</span></button>
                </div>
            </div>

            <!-- Navigation Cluster -->
            <div class="keyboard-section nav-section">
                <div class="nav-top">
                    <div class="key-row">
                        <button class="key key-disabled" data-key="PrintScreen" title="PrintScreen cannot be tested (system key)"><span>PrtSc</span><span class="key-disabled-badge">N/A</span></button>
                        <button class="key" data-key="ScrollLock"><span>ScrLk</span></button>
                        <button class="key" data-key="Pause"><span>Pause</span></button>
                    </div>
                    <div class="key-row">
                        <button class="key" data-key="Insert"><span>Insert</span></button>
                        <button class="key" data-key="Home"><span>Home</span></button>
                        <button class="key" data-key="PageUp"><span>PgUp</span></button>
                    </div>
                    <div class="key-row">
                        <button class="key" data-key="Delete"><span>Delete</span></button>
                        <button class="key" data-key="End"><span>End</span></button>
                        <button class="key" data-key="PageDown"><span>PgDn</span></button>
                    </div>
                </div>
                <div class="arrow-cluster">
                    <div class="key-row arrow-top">
                        <button class="key" data-key="ArrowUp"><span>↑</span></button>
                    </div>
                    <div class="key-row arrow-bottom">
                        <button class="key" data-key="ArrowLeft"><span>←</span></button>
                        <button class="key" data-key="ArrowDown"><span>↓</span></button>
                        <button class="key" data-key="ArrowRight"><span>→</span></button>
                    </div>
                </div>
            </div>

            <!-- Numpad -->
            <div class="keyboard-section numpad-section">
                <div class="indicator-panel">
                    <div class="indicator" id="caps-indicator" title="Caps Lock">
                        <div class="led" id="caps-led"></div>
                        <span>Caps</span>
                    </div>
                    <div class="indicator" id="num-indicator" title="Num Lock">
                        <div class="led" id="num-led"></div>
                        <span>Num</span>
                    </div>
                    <div class="indicator" id="scroll-indicator" title="Scroll Lock">
                        <div class="led" id="scroll-led"></div>
                        <span>Scroll</span>
                    </div>
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

    <!-- Cat Progress Section - Always Visible -->
    <div class="cat-progress-section" id="cat-progress-section">
        <div class="progress-header">
            <div class="progress-title">
                <span class="cat-title-icon">🐱</span>
                <span class="panel-title">Feed the Cat! Press Keys to Progress</span>
            </div>
            <div class="progress-stats">
                <span id="progress-count">0</span> / <span id="total-keys-display">103</span> Keys
                <span class="progress-percentage" id="progress-percentage">0%</span>
            </div>
        </div>

        <!-- Cat Chase Progress Animation -->
        <div class="cat-progress-container" id="cat-progress-container">
            <div class="cat-progress-track">
                <!-- Treats at every ~10 keys (10, 20, 30, 40, 50, 60, 70, 80, 90, 103) -->
                <div class="treat" data-treat="10" data-keys="10" title="10 keys - Fish">🐟</div>
                <div class="treat" data-treat="20" data-keys="20" title="20 keys - Milk">🥛</div>
                <div class="treat" data-treat="30" data-keys="30" title="30 keys - Water">💧</div>
                <div class="treat" data-treat="40" data-keys="40" title="40 keys - Mouse Toy">🐭</div>
                <div class="treat" data-treat="50" data-keys="50" title="50 keys - Yarn">🧶</div>
                <div class="treat" data-treat="60" data-keys="60" title="60 keys - Tuna">🥫</div>
                <div class="treat" data-treat="70" data-keys="70" title="70 keys - Chicken">🍗</div>
                <div class="treat" data-treat="80" data-keys="80" title="80 keys - Candy">🍬</div>
                <div class="treat" data-treat="90" data-keys="90" title="90 keys - Star">⭐</div>
                <div class="treat" data-treat="100" data-keys="103" title="103 keys - Trophy!">🏆</div>

                <!-- The Cat -->
                <div class="progress-cat" id="progress-cat">
                    <div class="cat-body">🐱</div>
                    <div class="cat-message" id="cat-message">Press keys to feed me!</div>
                </div>

                <!-- The Mouse (Goal) -->
                <div class="progress-mouse" id="progress-mouse">🐭</div>
            </div>
            <div class="cat-status" id="cat-status">
                <span class="cat-mood" id="cat-mood">😺 Hungry</span>
                <span class="treats-eaten" id="treats-eaten">Treats: 0/10</span>
            </div>
        </div>
    </div>

    <!-- Hidden progress section for advanced options -->
    <div class="progress-section" id="progress-section" style="display: none;"></div>
</section>

<style>
@import url('https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

.keyboard-tester,
.keyboard-tester * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

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
    --accent-warning: #ffd700;
    --accent-danger: #ff6b6b;
    --text-muted: #8888a0;
    --border-subtle: rgba(255, 255, 255, 0.08);
    --glow-color: rgba(0, 212, 255, 0.15);
}

.keyboard-tester[data-theme="light"] {
    --bg-primary: #f5f5f8;
    --bg-secondary: #ffffff;
    --bg-tertiary: #eaeaf0;
    --key-bg: linear-gradient(180deg, #ffffff 0%, #f0f0f5 100%);
    --key-text: #1a1a2e;
    --key-border: #d0d0e0;
    --key-shadow: rgba(0, 0, 0, 0.1);
    --accent-primary: #0099cc;
    --accent-secondary: #00aa66;
    --text-muted: #666680;
    --border-subtle: rgba(0, 0, 0, 0.08);
    --glow-color: rgba(0, 153, 204, 0.15);
}

.keyboard-tester[data-theme="midnight"] {
    --bg-primary: #0a0a14;
    --bg-secondary: #12121e;
    --bg-tertiary: #1a1a28;
    --key-bg: linear-gradient(180deg, #1e1e30 0%, #14142a 100%);
    --key-text: #c8d0e8;
    --key-border: #2a2a48;
    --key-shadow: rgba(0, 0, 0, 0.5);
    --accent-primary: #4a9eff;
    --accent-secondary: #00d4ff;
    --glow-color: rgba(74, 158, 255, 0.15);
}

.keyboard-tester[data-theme="cyberpunk"] {
    --bg-primary: #0a0a0f;
    --bg-secondary: #12121a;
    --bg-tertiary: #1a1a25;
    --key-bg: linear-gradient(180deg, #1f1f2e 0%, #12121a 100%);
    --key-text: #00ff9f;
    --key-border: #ff00aa;
    --key-shadow: rgba(255, 0, 170, 0.2);
    --accent-primary: #ff00aa;
    --accent-secondary: #00ff9f;
    --accent-success: #00ff9f;
    --accent-warning: #ffff00;
    --accent-danger: #ff0055;
    --glow-color: rgba(255, 0, 170, 0.2);
}

.keyboard-tester[data-theme="forest"] {
    --bg-primary: #0f1a14;
    --bg-secondary: #162419;
    --bg-tertiary: #1e3022;
    --key-bg: linear-gradient(180deg, #243b28 0%, #1a2d1e 100%);
    --key-text: #d1fae5;
    --key-border: #2d5a32;
    --key-shadow: rgba(0, 0, 0, 0.4);
    --accent-primary: #22c55e;
    --accent-secondary: #86efac;
    --accent-success: #4ade80;
    --accent-warning: #eab308;
    --glow-color: rgba(34, 197, 94, 0.15);
}

.keyboard-tester {
    width: 100%;
    padding: 40px 24px;
    background: var(--bg-primary);
    min-height: 0;
    font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
    position: relative;
    overflow: hidden;
}

.keyboard-tester::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 20%, var(--glow-color) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, var(--glow-color) 0%, transparent 50%);
    pointer-events: none;
}

.tool-heading {
    text-align: center;
    margin-bottom: 40px;
    padding-bottom: 32px;
    border-bottom: 1px solid var(--border-subtle);
    position: relative;
}

.heading-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    height: 120px;
    background: radial-gradient(ellipse, rgba(0, 212, 255, 0.3) 0%, transparent 70%);
    opacity: 0.5;
    filter: blur(50px);
    pointer-events: none;
}

.tool-heading h1 {
    color: var(--key-text);
    font-size: 42px;
    font-weight: 700;
    margin: 0 0 12px 0;
    letter-spacing: -0.02em;
    position: relative;
    z-index: 1;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.08);
}

.tool-heading .subtitle {
    color: var(--text-muted);
    font-size: 16px;
    margin: 0;
    font-weight: 500;
    letter-spacing: 0.5px;
    position: relative;
    z-index: 1;
}

.keyboard-tester[data-theme="light"] .tool-heading h1 {
    color: #0f172a;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.6);
}

.keyboard-tester[data-theme="light"] .tool-heading .subtitle {
    color: #1e293b;
    font-weight: 600;
}

.controls-wrapper {
    max-width: 1400px;
    margin: 0 auto 24px;
    display: flex;
    align-items: stretch;
    gap: 20px;
    --control-block-height: 132px;
    position: relative;
}

.textarea-wrapper {
    width: 100%;
    position: relative;
}

.textarea-label {
    position: absolute;
    top: -8px;
    left: 12px;
    background: var(--bg-primary);
    padding: 0 8px;
    font-size: 11px;
    font-weight: 600;
    color: #00d4ff;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 1;
}

.text-box {
    width: 100%;
    height: var(--control-block-height);
    padding: 20px 16px 16px;
    background: var(--bg-secondary);
    border: 1px solid var(--key-border);
    border-radius: 12px;
    color: var(--key-text);
    font-family: 'JetBrains Mono', monospace;
    font-size: 13px;
    resize: vertical;
    transition: all 0.2s ease;
    line-height: 1.6;
}

.text-box:focus {
    outline: none;
    border-color: var(--accent-primary);
    box-shadow: 0 0 0 3px var(--glow-color);
}

.text-box::placeholder {
    color: var(--text-muted);
}

.button-group {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    grid-template-rows: repeat(2, 1fr) auto;
    gap: 6px 10px;
    align-content: stretch;
    justify-items: stretch;
    width: 320px;
    flex: 0 0 auto;
    height: var(--control-block-height);
}

.button-group > .reset-button {
    grid-column: 1;
    grid-row: 1;
}

.button-group > .select-wrapper:nth-of-type(1) {
    grid-column: 2;
    grid-row: 1;
}

.button-group > .select-wrapper:nth-of-type(2) {
    grid-column: 1;
    grid-row: 2;
}

.button-group > .select-wrapper:nth-of-type(3) {
    grid-column: 2;
    grid-row: 2;
}

.button-group > .advanced-toggle-wrapper {
    grid-column: 1 / -1;
    grid-row: 3;
}

.select-wrapper {
    display: flex;
    flex-direction: column;
    gap: 2px;
    width: 100%;
    height: 100%;
}

.select-wrapper label {
    font-size: 9px;
    font-weight: 600;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    line-height: 1;
}

.reset-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 10px;
    background: linear-gradient(180deg, #ff6b6b 0%, #ee5a52 100%);
    border: none;
    border-radius: 8px;
    color: white;
    font-size: 12px;
    font-weight: 600;
    font-family: inherit;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 3px 0 #cc4444, 0 4px 12px rgba(255, 107, 107, 0.3);
    width: 100%;
    justify-content: center;
}

.reset-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 0 #cc4444, 0 6px 16px rgba(255, 107, 107, 0.4);
}

.reset-button:active {
    transform: translateY(2px);
    box-shadow: 0 1px 0 #cc4444, 0 2px 8px rgba(255, 107, 107, 0.3);
}

.theme-selector, .layout-selector, .os-selector {
    padding: 6px 10px;
    background: var(--bg-secondary);
    color: var(--key-text);
    border: 1px solid var(--key-border);
    border-radius: 10px;
    font-size: 12px;
    font-weight: 500;
    font-family: inherit;
    cursor: pointer;
    transition: all 0.2s ease;
    min-width: 0;
    width: 100%;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236b7280' viewBox='0 0 16 16'%3E%3Cpath d='M4.5 6l3.5 4 3.5-4H4.5z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    padding-right: 36px;
    flex: 1;
    min-height: 0;
}

.theme-selector option, .layout-selector option, .os-selector option {
    background: var(--bg-secondary);
    color: var(--key-text);
}

.theme-selector:hover, .layout-selector:hover, .os-selector:hover {
    border-color: var(--accent-primary);
}

.theme-selector:focus, .layout-selector:focus, .os-selector:focus {
    outline: none;
    border-color: var(--accent-primary);
    box-shadow: 0 0 0 3px var(--glow-color);
}

.advanced-toggle-wrapper {
    margin: 0;
    display: flex;
    justify-content: stretch;
    position: relative;
}

.advanced-toggle-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 8px 10px;
    background: var(--bg-secondary);
    border: 1px solid var(--key-border);
    border-radius: 12px;
    color: var(--key-text);
    font-size: 12px;
    font-weight: 600;
    font-family: inherit;
    cursor: pointer;
    transition: all 0.2s ease;
    width: 100%;
    justify-content: center;
}

.advanced-toggle-btn:hover {
    border-color: var(--accent-primary);
    background: var(--bg-tertiary);
}

.advanced-toggle-btn .chevron {
    transition: transform 0.3s ease;
}

.advanced-toggle-btn.expanded .chevron {
    transform: rotate(180deg);
}

.feature-controls {
    max-width: 1400px;
    margin: 0 auto 24px;
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
    background: var(--bg-secondary);
    border-radius: 16px;
    border: 1px solid var(--border-subtle);
    animation: slideDown 0.3s ease;
    position: relative;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-12px); }
    to { opacity: 1; transform: translateY(0); }
}

.feature-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 18px;
    background: var(--bg-tertiary);
    color: var(--key-text);
    border: 1px solid var(--key-border);
    border-radius: 10px;
    font-size: 13px;
    font-weight: 600;
    font-family: inherit;
    cursor: pointer;
    transition: all 0.2s ease;
}

.feature-button:hover {
    border-color: var(--accent-primary);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px var(--glow-color);
}

.feature-button.active {
    background: var(--accent-primary);
    color: white;
    border-color: var(--accent-primary);
    box-shadow: 0 4px 16px var(--glow-color);
}

.stats-panel {
    max-width: 1400px;
    margin: 0 auto 24px;
    background: var(--bg-secondary);
    border: 1px solid var(--key-border);
    border-radius: 16px;
    padding: 24px;
    animation: slideDown 0.3s ease;
    position: relative;
}

.stats-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid var(--border-subtle);
}

.stats-header .panel-title {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--key-text);
    font-size: 18px;
    font-weight: 700;
    margin: 0;
}

.stats-header .panel-title svg {
    color: var(--accent-primary);
}

.close-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    background: var(--bg-tertiary);
    border: 1px solid var(--key-border);
    border-radius: 10px;
    color: var(--text-muted);
    font-size: 24px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.close-btn:hover {
    color: var(--accent-danger);
    border-color: var(--accent-danger);
    background: rgba(239, 68, 68, 0.1);
}

.stats-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 16px;
}

.stat-item {
    background: var(--bg-tertiary);
    padding: 20px;
    border-radius: 12px;
    border: 1px solid var(--border-subtle);
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.stat-item.full-width { grid-column: 1 / -1; }

.stat-item.info-box {
    grid-column: 1 / -1;
    background: linear-gradient(135deg, var(--bg-tertiary) 0%, var(--bg-secondary) 100%);
    border-left: 3px solid var(--accent-primary);
}

.status-indicator {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
}

.status-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.status-dot.ready {
    background: var(--accent-success);
    box-shadow: 0 0 8px var(--accent-success);
}

.status-dot.active {
    background: var(--accent-warning);
    box-shadow: 0 0 8px var(--accent-warning);
    animation: pulse-dot 1.5s infinite;
}

.status-dot.error {
    background: var(--accent-danger);
    box-shadow: 0 0 8px var(--accent-danger);
}

@keyframes pulse-dot {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.7; transform: scale(1.2); }
}

.info-text {
    color: var(--text-muted);
    font-size: 13px;
    line-height: 1.6;
    margin: 0;
}

.info-text strong { color: var(--accent-primary); }

.stat-label {
    font-size: 12px;
    font-weight: 600;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.stat-value {
    font-size: 28px;
    font-weight: 700;
    color: var(--accent-primary);
    line-height: 1;
}

.stat-value.mono { font-family: 'JetBrains Mono', monospace; }
.stat-value.warning { color: var(--accent-warning); }

.stat-item.latency-display {
    grid-column: 1 / -1;
    text-align: center;
    padding: 32px;
}

.big-latency {
    font-size: 56px;
    font-weight: 700;
    font-family: 'JetBrains Mono', monospace;
    background: linear-gradient(135deg, #00d4ff 0%, #00ff88 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.latency-sublabel {
    color: var(--text-muted);
    font-size: 14px;
    margin-top: 8px;
}

.latency-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
    grid-column: 1 / -1;
}

.stat-item.compact {
    text-align: center;
    padding: 16px 12px;
    flex-direction: column-reverse;
    gap: 6px;
}

.stat-item.compact .stat-value { font-size: 20px; }
.stat-item.compact .stat-label { font-size: 10px; }

.log-container {
    max-height: 200px;
    overflow-y: auto;
    padding: 16px;
    background: var(--bg-primary);
    border-radius: 10px;
    border: 1px solid var(--border-subtle);
    font-family: 'JetBrains Mono', monospace;
    font-size: 12px;
}

.log-placeholder {
    color: var(--text-muted);
    text-align: center;
    margin: 24px 0;
}

.log-placeholder.success { color: var(--accent-success); }

.log-entry {
    padding: 12px;
    margin-bottom: 8px;
    border-radius: 8px;
    animation: fadeIn 0.3s ease;
}

.log-entry.error {
    background: rgba(239, 68, 68, 0.1);
    border-left: 3px solid var(--accent-danger);
}

.log-entry.success {
    background: rgba(16, 185, 129, 0.1);
    border-left: 3px solid var(--accent-success);
}

.log-entry.warning {
    background: rgba(245, 158, 11, 0.1);
    border-left: 3px solid var(--accent-warning);
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-8px); }
    to { opacity: 1; transform: translateY(0); }
}

.rating-box {
    grid-column: 1 / -1;
    padding: 20px;
    background: var(--bg-tertiary);
    border-radius: 12px;
    border: 1px solid var(--border-subtle);
    text-align: center;
    color: var(--text-muted);
    font-size: 14px;
    line-height: 1.6;
}

.rating-box.excellent { border-color: var(--accent-success); background: rgba(16, 185, 129, 0.1); }
.rating-box.good { border-color: var(--accent-primary); background: rgba(99, 102, 241, 0.1); }
.rating-box.fair { border-color: var(--accent-warning); background: rgba(245, 158, 11, 0.1); }
.rating-box.poor { border-color: var(--accent-danger); background: rgba(239, 68, 68, 0.1); }

.button-row {
    grid-column: 1 / -1;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
}

.action-btn {
    padding: 14px 20px;
    background: var(--bg-tertiary);
    border: 1px solid var(--key-border);
    border-radius: 10px;
    color: var(--key-text);
    font-size: 13px;
    font-weight: 600;
    font-family: inherit;
    cursor: pointer;
    transition: all 0.2s ease;
}

.action-btn:hover:not(:disabled) {
    border-color: var(--accent-primary);
    background: var(--bg-secondary);
}

.action-btn:disabled {
    opacity: 0.4;
    cursor: not-allowed;
}

.action-btn.primary {
    background: var(--accent-primary);
    border-color: var(--accent-primary);
    color: white;
}

.action-btn.primary:hover:not(:disabled) {
    background: var(--accent-primary);
    filter: brightness(1.1);
    box-shadow: 0 4px 16px var(--glow-color);
}

.log-container::-webkit-scrollbar { width: 6px; }
.log-container::-webkit-scrollbar-track { background: transparent; }
.log-container::-webkit-scrollbar-thumb { background: var(--key-border); border-radius: 3px; }
.log-container::-webkit-scrollbar-thumb:hover { background: var(--accent-primary); }

.keyboard-container {
    max-width: 1400px;
    margin: 0 auto;
    background: var(--bg-secondary);
    border-radius: 20px;
    padding: 24px;
    box-shadow: 0 4px 24px var(--key-shadow), inset 0 1px 0 var(--border-subtle);
    border: 1px solid var(--border-subtle);
    position: relative;
    overflow: hidden;
}

/* Responsive scaling wrapper */
.keyboard-scale-wrapper {
    transform-origin: center top;
    display: flex;
    justify-content: center;
}

.keyboard-layout {
    display: flex;
    gap: 24px;
    justify-content: center;
    align-items: flex-end;
}

.keyboard-section {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.nav-section {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 318px; /* Match main keyboard height: 6 rows × 48px + 5 gaps × 6px */
}

.nav-top {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.arrow-cluster {
    display: flex;
    flex-direction: column;
}

.numpad-section { /* Aligns at bottom with keyboard-layout flex-end */ }

.key-row {
    display: flex;
    gap: 6px;
}

.gap { width: 14px; }

.key {
    position: relative;
    height: 48px;
    width: 48px;
    background: var(--key-bg);
    border: 1px solid var(--key-border);
    border-radius: 8px;
    color: var(--key-text);
    font-size: 12px;
    font-weight: 600;
    font-family: 'Plus Jakarta Sans', sans-serif;
    cursor: pointer;
    transition: all 0.12s ease;
    box-shadow: 0 3px 0 var(--key-shadow), 0 4px 8px var(--key-shadow), inset 0 1px 0 rgba(255, 255, 255, 0.05);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
}

.key span {
    text-align: center;
    line-height: 1.2;
    font-size: 11px;
    pointer-events: none;
}

.key:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 0 var(--key-shadow), 0 6px 12px var(--key-shadow), inset 0 1px 0 rgba(255, 255, 255, 0.1);
}

.key:active {
    transform: translateY(2px);
    box-shadow: 0 1px 0 var(--key-shadow), 0 2px 4px var(--key-shadow), inset 0 2px 4px rgba(0, 0, 0, 0.2);
}

.key.heat-1 { background: linear-gradient(180deg, #fef08a 0%, #facc15 100%) !important; color: #1a1a1a !important; border-color: #eab308 !important; }
.key.heat-2 { background: linear-gradient(180deg, #fdba74 0%, #f97316 100%) !important; color: #1a1a1a !important; border-color: #ea580c !important; }
.key.heat-3 { background: linear-gradient(180deg, #fca5a5 0%, #ef4444 100%) !important; color: #fff !important; border-color: #dc2626 !important; }
.key.heat-4 { background: linear-gradient(180deg, #f87171 0%, #dc2626 100%) !important; color: #fff !important; border-color: #b91c1c !important; }
.key.heat-5 { background: linear-gradient(180deg, #dc2626 0%, #991b1b 100%) !important; color: #fff !important; border-color: #7f1d1d !important; }

.key.untested {
    border: 2px dashed var(--accent-warning) !important;
    animation: pulse 1.5s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; border-color: var(--accent-warning); }
    50% { opacity: 0.6; border-color: transparent; }
}

.key-1-25x { width: 60px; }
.key-1-5x { width: 72px; }
.key-1-75x { width: 84px; }
.key-2x { width: 96px; }
.key-2-25x { width: 108px; }
.key-enter { width: 114px; }
.key-shift-right { width: 144px; }
.key-space { width: 336px; }

.numpad-grid {
    display: grid;
    grid-template-columns: repeat(4, 48px);
    grid-template-rows: repeat(5, 48px);
    gap: 6px;
    position: relative;
}

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

.key.active-1 {
    background: linear-gradient(180deg, #00d4ff 0%, #00a8cc 100%) !important;
    color: #000 !important;
    border-color: #00d4ff !important;
    box-shadow: 0 0 20px rgba(0, 212, 255, 0.5), 0 3px 0 rgba(0, 168, 204, 0.5);
    transform: translateY(-1px);
}

.key.active-2 {
    background: linear-gradient(180deg, #ffd700 0%, #ccaa00 100%) !important;
    color: #000 !important;
    border-color: #ffd700 !important;
    box-shadow: 0 0 20px rgba(255, 215, 0, 0.5), 0 3px 0 rgba(204, 170, 0, 0.5);
    transform: translateY(-1px);
}

.key.active-3 {
    background: linear-gradient(180deg, #00ff88 0%, #00cc6a 100%) !important;
    color: #000 !important;
    border-color: #00ff88 !important;
    box-shadow: 0 0 20px rgba(0, 255, 136, 0.5), 0 3px 0 rgba(0, 204, 106, 0.5);
    transform: translateY(-1px);
}

.key.active-4 {
    background: linear-gradient(180deg, #ff6b6b 0%, #cc5555 100%) !important;
    color: #fff !important;
    border-color: #ff6b6b !important;
    box-shadow: 0 0 20px rgba(255, 107, 107, 0.5), 0 3px 0 rgba(204, 85, 85, 0.5);
    transform: translateY(-1px);
}

.key.active-5 {
    background: linear-gradient(180deg, #c084fc 0%, #9966cc 100%) !important;
    color: #fff !important;
    border-color: #c084fc !important;
    box-shadow: 0 0 20px rgba(192, 132, 252, 0.5), 0 3px 0 rgba(153, 102, 204, 0.5);
    transform: translateY(-1px);
}

.key-counter {
    position: absolute;
    top: 3px;
    right: 3px;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    font-size: 9px;
    padding: 2px 5px;
    border-radius: 6px;
    min-width: 16px;
    text-align: center;
    font-weight: 700;
    font-family: 'JetBrains Mono', monospace;
    backdrop-filter: blur(4px);
}

/* Disabled key styling (for system keys like PrintScreen) */
.key.key-disabled {
    opacity: 0.5;
    cursor: not-allowed;
    background: linear-gradient(180deg, #3a3a3a 0%, #2a2a2a 100%) !important;
    border-color: #444 !important;
    position: relative;
}

.key.key-disabled:hover {
    transform: none;
    box-shadow: none;
}

.key-disabled-badge {
    position: absolute;
    top: 2px;
    right: 2px;
    background: #ff6b6b;
    color: #fff;
    font-size: 7px;
    padding: 1px 4px;
    border-radius: 4px;
    font-weight: 700;
    text-transform: uppercase;
}

.indicator-panel {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-bottom: 12px;
    padding: 10px 16px;
    background: transparent;
    border-radius: 8px;
    border: none;
}

.indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.led {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #333;
    border: 1px solid var(--key-border);
    transition: all 0.3s ease;
}

.led.active {
    background: var(--accent-success);
    box-shadow: 0 0 10px var(--accent-success), 0 0 20px var(--accent-success);
    border-color: var(--accent-success);
}

.indicator span {
    font-size: 9px;
    color: var(--text-muted);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.arrow-top { justify-content: center; margin-bottom: 6px; }
.arrow-bottom { justify-content: center; }

.progress-section {
    max-width: 1400px;
    margin: 32px auto 0;
    background: var(--bg-secondary);
    border: 1px solid var(--border-subtle);
    border-radius: 16px;
    padding: 24px;
    position: relative;
}

.progress-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 16px;
}

.progress-title {
    display: flex;
    align-items: center;
    gap: 12px;
}

.progress-title svg { color: var(--accent-primary); }

.progress-title .panel-title {
    color: var(--key-text);
    font-size: 18px;
    font-weight: 700;
    margin: 0;
}

.progress-stats {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--text-muted);
    font-size: 14px;
    font-weight: 600;
}

.progress-percentage {
    background: linear-gradient(135deg, #00d4ff 0%, #00a8cc 100%);
    color: #000;
    padding: 6px 14px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 14px;
}

/* Cat Progress Section - Always Visible */
.cat-progress-section {
    background: linear-gradient(180deg, var(--bg-secondary) 0%, var(--bg-tertiary) 100%);
    border: 2px solid var(--border-subtle);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

.cat-progress-section .progress-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
    flex-wrap: wrap;
    gap: 12px;
}

.cat-progress-section .progress-title {
    display: flex;
    align-items: center;
    gap: 10px;
}

.cat-title-icon {
    font-size: 28px;
    animation: catBounce 1s ease-in-out infinite;
}

@keyframes catBounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.cat-progress-section .panel-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--key-text);
}

.cat-progress-section .progress-stats {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--text-muted);
    font-size: 14px;
    font-weight: 600;
}

.cat-progress-section .progress-percentage {
    background: linear-gradient(135deg, #00d4ff 0%, #00a8cc 100%);
    color: #000;
    padding: 6px 14px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 14px;
}

/* Cat Progress Animation Styles */
.cat-progress-container {
    background: linear-gradient(180deg, var(--bg-tertiary) 0%, var(--bg-secondary) 100%);
    border: 2px solid var(--border-subtle);
    border-radius: 20px;
    padding: 20px;
    margin-bottom: 0;
    position: relative;
    overflow: hidden;
}

.cat-progress-track {
    position: relative;
    height: 80px;
    background: linear-gradient(90deg,
        #2d5a27 0%, #3d7a37 20%, #4d9a47 40%,
        #5dba57 60%, #6dda67 80%, #7dfa77 100%);
    border-radius: 40px;
    border: 3px solid #1a3a14;
    box-shadow: inset 0 4px 8px rgba(0,0,0,0.3), 0 4px 12px rgba(0,0,0,0.2);
    overflow: visible;
}

/* Treats */
.treat {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    font-size: 28px;
    z-index: 5;
    transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
    cursor: pointer;
}

.treat[data-treat="10"] { left: 8%; }
.treat[data-treat="20"] { left: 18%; }
.treat[data-treat="30"] { left: 28%; }
.treat[data-treat="40"] { left: 38%; }
.treat[data-treat="50"] { left: 48%; }
.treat[data-treat="60"] { left: 58%; }
.treat[data-treat="70"] { left: 68%; }
.treat[data-treat="80"] { left: 78%; }
.treat[data-treat="90"] { left: 88%; }
.treat[data-treat="100"] { left: 95%; font-size: 32px; }

.treat.eaten {
    transform: translateY(-50%) scale(0) rotate(360deg);
    opacity: 0;
}

.treat.eating {
    animation: treatBounce 0.5s ease;
}

@keyframes treatBounce {
    0%, 100% { transform: translateY(-50%) scale(1); }
    50% { transform: translateY(-80%) scale(1.3); }
}

/* The Cat */
.progress-cat {
    position: absolute;
    left: 0%;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    transition: left 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.cat-body {
    font-size: 48px;
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.4));
    transition: filter 0.3s ease, transform 0.3s ease;
    animation: catIdle 2s ease-in-out infinite;
}

.progress-cat.walking .cat-body {
    animation: catWalk 0.3s ease-in-out infinite;
}

.progress-cat.eating .cat-body {
    animation: catEat 0.5s ease-in-out;
}

@keyframes catIdle {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-3px); }
}

@keyframes catWalk {
    0%, 100% { transform: translateY(0) rotate(-5deg); }
    50% { transform: translateY(-5px) rotate(5deg); }
}

@keyframes catEat {
    0% { transform: scale(1); }
    30% { transform: scale(1.2) rotate(-10deg); }
    60% { transform: scale(0.9) rotate(10deg); }
    100% { transform: scale(1) rotate(0); }
}

/* Cat color levels */
.progress-cat[data-level="1"] .cat-body { filter: hue-rotate(0deg) drop-shadow(0 4px 8px rgba(0,0,0,0.4)); }
.progress-cat[data-level="2"] .cat-body { filter: hue-rotate(30deg) drop-shadow(0 4px 8px rgba(255,150,0,0.4)); }
.progress-cat[data-level="3"] .cat-body { filter: hue-rotate(60deg) drop-shadow(0 4px 8px rgba(255,200,0,0.4)); }
.progress-cat[data-level="4"] .cat-body { filter: hue-rotate(90deg) drop-shadow(0 4px 8px rgba(150,255,0,0.4)); }
.progress-cat[data-level="5"] .cat-body { filter: hue-rotate(120deg) drop-shadow(0 4px 8px rgba(0,255,100,0.4)); }
.progress-cat[data-level="6"] .cat-body { filter: hue-rotate(150deg) drop-shadow(0 4px 8px rgba(0,255,200,0.4)); }
.progress-cat[data-level="7"] .cat-body { filter: hue-rotate(180deg) drop-shadow(0 4px 8px rgba(0,200,255,0.4)); }
.progress-cat[data-level="8"] .cat-body { filter: hue-rotate(210deg) drop-shadow(0 4px 8px rgba(100,100,255,0.4)); }
.progress-cat[data-level="9"] .cat-body { filter: hue-rotate(270deg) drop-shadow(0 4px 8px rgba(200,0,255,0.4)); }
.progress-cat[data-level="10"] .cat-body {
    filter: hue-rotate(300deg) drop-shadow(0 0 20px rgba(255,215,0,0.8));
    animation: catVictory 0.5s ease-in-out infinite;
}

@keyframes catVictory {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-10px) scale(1.1); }
}

.cat-message {
    position: absolute;
    bottom: 100%;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0,0,0,0.8);
    color: #fff;
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    opacity: 0;
    transition: opacity 0.3s ease;
    pointer-events: none;
}

.progress-cat.show-message .cat-message {
    opacity: 1;
}

/* The Mouse (Goal) */
.progress-mouse {
    position: absolute;
    right: -5px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 36px;
    z-index: 8;
    animation: mouseWiggle 1s ease-in-out infinite;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
}

@keyframes mouseWiggle {
    0%, 100% { transform: translateY(-50%) rotate(-10deg); }
    50% { transform: translateY(-50%) rotate(10deg); }
}

.progress-mouse.caught {
    animation: mouseCaught 0.5s ease forwards;
}

@keyframes mouseCaught {
    0% { transform: translateY(-50%) scale(1); opacity: 1; }
    50% { transform: translateY(-100%) scale(1.5) rotate(180deg); opacity: 0.5; }
    100% { transform: translateY(-150%) scale(0); opacity: 0; }
}

/* Cat Status Bar */
.cat-status {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 12px;
    padding: 8px 16px;
    background: var(--bg-secondary);
    border-radius: 12px;
    border: 1px solid var(--border-subtle);
}

.cat-mood {
    font-size: 16px;
    font-weight: 600;
    color: var(--accent-primary);
}

.treats-eaten {
    font-size: 14px;
    color: var(--text-muted);
    font-weight: 500;
}

/* Sparkle effect when eating */
@keyframes sparkle {
    0% { transform: scale(0) rotate(0deg); opacity: 1; }
    100% { transform: scale(2) rotate(180deg); opacity: 0; }
}

.sparkle {
    position: absolute;
    font-size: 20px;
    pointer-events: none;
    animation: sparkle 0.6s ease-out forwards;
}

/* Keyboard scaling handles responsive sizing - full keyboard stays visible and scales */

@media (max-width: 768px) {
    /* Hide desktop-only elements on mobile */
    .desktop-only { display: none !important; }

    .keyboard-tester { padding: 24px 16px; }
    .tool-heading h1 { font-size: 28px; }
    .keyboard-container { padding: 20px 16px; }
    .controls-wrapper {
        gap: 12px;
        flex-direction: column;
    }
    .text-box { height: 110px; }
    .button-group { width: 100%; gap: 10px; grid-template-columns: repeat(2, minmax(0, 1fr)); height: auto; grid-template-rows: auto; }
    .feature-controls { flex-direction: column; padding: 16px; }
    .feature-button { width: 100%; justify-content: center; }
    .stats-content { grid-template-columns: 1fr; }
    .latency-grid { grid-template-columns: repeat(2, 1fr); }
    .button-row { grid-template-columns: 1fr; }
    .progress-header { flex-direction: column; align-items: flex-start; }
}

@media (max-width: 576px) {
    .tool-heading h1 { font-size: 24px; }
    .button-group { grid-template-columns: 1fr; gap: 10px; }
    .reset-button, .theme-selector, .layout-selector, .os-selector { width: 100%; }
    .big-latency { font-size: 40px; }
}

/* Mobile Keyboard Tester Styles */
.mobile-keyboard-section {
    display: none;
    background: var(--bg-secondary);
    border-radius: 16px;
    padding: 24px;
    margin-bottom: 20px;
    border: 2px solid var(--border-subtle);
}

.mobile-notice {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 20px;
    font-weight: 700;
    color: var(--accent-primary);
    margin-bottom: 20px;
    justify-content: center;
}

.mobile-icon {
    font-size: 28px;
}

.mobile-input-wrapper {
    margin-bottom: 24px;
}

.mobile-input-wrapper label {
    display: block;
    margin-bottom: 10px;
    font-size: 14px;
    color: var(--text-muted);
    font-weight: 500;
}

.mobile-input {
    width: 100%;
    padding: 16px 20px;
    font-size: 18px;
    border: 2px solid var(--border-subtle);
    border-radius: 12px;
    background: var(--bg-tertiary);
    color: var(--key-text);
    outline: none;
    transition: all 0.3s ease;
    margin-bottom: 12px;
}

.mobile-input:focus {
    border-color: var(--accent-primary);
    box-shadow: 0 0 20px rgba(0, 212, 255, 0.2);
}

.mobile-clear-btn {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    font-weight: 600;
    background: linear-gradient(135deg, var(--accent-danger) 0%, #cc4444 100%);
    color: white;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.mobile-clear-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
}

.mobile-keyboard-display {
    background: var(--bg-tertiary);
    border-radius: 16px;
    padding: 16px;
    margin-bottom: 20px;
}

.mobile-keyboard-row {
    display: flex;
    justify-content: center;
    gap: 6px;
    margin-bottom: 8px;
}

.mobile-keyboard-row:last-child {
    margin-bottom: 0;
}

.mobile-key {
    position: relative;
    width: 32px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--key-bg);
    border: 1px solid var(--key-border);
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    color: var(--key-text);
    transition: all 0.2s ease;
    box-shadow: 0 2px 0 var(--key-shadow);
}

.mobile-key.mobile-key-wide {
    width: 80px;
    font-size: 12px;
}

.mobile-key.pressed {
    background: linear-gradient(135deg, #00d4ff 0%, #00a8cc 100%);
    color: #000;
    border-color: #00d4ff;
    box-shadow: 0 0 15px rgba(0, 212, 255, 0.5);
    transform: translateY(-2px);
}

.mobile-key.pressed-multi {
    background: linear-gradient(135deg, #00ff88 0%, #00cc66 100%);
    color: #000;
    border-color: #00ff88;
    box-shadow: 0 0 15px rgba(0, 255, 136, 0.5);
}

.mobile-key .key-count {
    position: absolute;
    top: -5px;
    right: -5px;
    background: var(--accent-primary);
    color: #000;
    font-size: 9px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
}

.mobile-stats {
    display: flex;
    gap: 16px;
    margin-bottom: 16px;
}

.mobile-stat {
    flex: 1;
    background: var(--bg-tertiary);
    padding: 16px;
    border-radius: 12px;
    text-align: center;
}

.mobile-stat-label {
    display: block;
    font-size: 12px;
    color: var(--text-muted);
    margin-bottom: 6px;
}

.mobile-stat-value {
    font-size: 24px;
    font-weight: 700;
    color: var(--accent-primary);
}

.mobile-tip {
    background: rgba(0, 212, 255, 0.1);
    border: 1px solid rgba(0, 212, 255, 0.3);
    border-radius: 10px;
    padding: 12px 16px;
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.5;
}

.mobile-tip strong {
    color: var(--accent-primary);
}

/* Show mobile keyboard on mobile devices */
@media (max-width: 768px) {
    .mobile-keyboard-section {
        display: block;
    }
    .desktop-only {
        display: none !important;
    }
    .cat-progress-section .panel-title {
        font-size: 14px;
    }
}

/* Hide mobile on desktop */
@media (min-width: 769px) {
    .mobile-keyboard-section {
        display: none !important;
    }
}

/* Cat Animation Mobile Styles */
@media (max-width: 768px) {
    .cat-progress-container { padding: 12px; }
    .cat-progress-track { height: 60px; }
    .cat-body { font-size: 36px; }
    .treat { font-size: 20px; }
    .treat[data-treat="100"] { font-size: 24px; }
    .progress-mouse { font-size: 28px; }
    .cat-message { font-size: 10px; padding: 4px 8px; }
    .cat-status { flex-direction: column; gap: 8px; text-align: center; }
}

@media (max-width: 480px) {
    .cat-progress-track { height: 50px; }
    .cat-body { font-size: 28px; }
    .treat { font-size: 16px; }
    .treat[data-treat="100"] { font-size: 20px; }
    .progress-mouse { font-size: 24px; }
}
</style>

<script>
(function() {
    'use strict';

    const keyHistory = document.getElementById('key-history');
    const themeSelector = document.getElementById('theme-selector');
    const layoutSelector = document.getElementById('layout-selector');
    const osSelector = document.getElementById('os-selector');
    const resetButton = document.getElementById('reset-button');
    const keyboardTester = document.querySelector('.keyboard-tester');
    
    const capsLed = document.getElementById('caps-led');
    const numLed = document.getElementById('num-led');
    const scrollLed = document.getElementById('scroll-led');
    
    const statsButton = document.getElementById('stats-button');
    const heatmapButton = document.getElementById('heatmap-button');
    const soundButton = document.getElementById('sound-button');
    const testModeButton = document.getElementById('test-mode-button');
    const exportButton = document.getElementById('export-button');
    const ghostClickButton = document.getElementById('ghost-click-button');
    const latencyButton = document.getElementById('latency-button');
    
    const statsPanel = document.getElementById('stats-panel');
    const closeStats = document.getElementById('close-stats');
    
    const ghostPanel = document.getElementById('ghost-panel');
    const closeGhost = document.getElementById('close-ghost');
    const ghostStatusDot = document.getElementById('ghost-status-dot');
    const ghostStatusText = document.getElementById('ghost-status-text');
    const ghostTimer = document.getElementById('ghost-timer');
    const ghostCount = document.getElementById('ghost-count');
    const ghostTotal = document.getElementById('ghost-total');
    const ghostLogContent = document.getElementById('ghost-log-content');
    const startGhostTest = document.getElementById('start-ghost-test');
    const stopGhostTest = document.getElementById('stop-ghost-test');
    const clearGhostLog = document.getElementById('clear-ghost-log');
    
    const latencyPanel = document.getElementById('latency-panel');
    const closeLatency = document.getElementById('close-latency');
    const latencyStatusDot = document.getElementById('latency-status-dot');
    const latencyStatusText = document.getElementById('latency-status-text');
    const currentLatency = document.getElementById('current-latency');
    const avgLatency = document.getElementById('avg-latency');
    const minLatency = document.getElementById('min-latency');
    const maxLatency = document.getElementById('max-latency');
    const testCount = document.getElementById('test-count');
    const latencyLogContent = document.getElementById('latency-log-content');
    const startLatencyTest = document.getElementById('start-latency-test');
    const stopLatencyTest = document.getElementById('stop-latency-test');
    const clearLatency = document.getElementById('clear-latency');
    const latencyRating = document.getElementById('latency-rating');
    
    const advancedToggle = document.getElementById('advanced-toggle');
    const featureControls = document.getElementById('feature-controls');
    const progressSection = document.getElementById('progress-section');

    // Cat progress elements
    const progressCount = document.getElementById('progress-count');
    const progressPercentage = document.getElementById('progress-percentage');
    
    const keyPressCount = {};
    let sessionStartTime = Date.now();
    let totalKeyPresses = 0;
    let heatmapMode = false;
    let soundEnabled = false;
    let testMode = false;
    let sessionTimerInterval = null;
    let ghostTestActive = false;
    let ghostTestStartTime = 0;
    let ghostTestInterval = null;
    let ghostClicksDetected = 0;
    let totalGhostEvents = 0;
    let latencyTestActive = false;
    let latencyTests = [];
    const TOTAL_KEYS = 103; // Excludes PrintScreen (system key, cannot be captured)

    const keyboardLayouts = {
        qwerty: { KeyQ: 'Q', KeyW: 'W', KeyE: 'E', KeyR: 'R', KeyT: 'T', KeyY: 'Y', KeyU: 'U', KeyI: 'I', KeyO: 'O', KeyP: 'P', KeyA: 'A', KeyS: 'S', KeyD: 'D', KeyF: 'F', KeyG: 'G', KeyH: 'H', KeyJ: 'J', KeyK: 'K', KeyL: 'L', KeyZ: 'Z', KeyX: 'X', KeyC: 'C', KeyV: 'V', KeyB: 'B', KeyN: 'N', KeyM: 'M', Semicolon: ':<br>;', Quote: '"<br>\'', Comma: '&lt;<br>,', Period: '&gt;<br>.', Slash: '?<br>/', BracketLeft: '{<br>[', BracketRight: '}<br>]' },
        dvorak: { KeyQ: '\'<br>"', KeyW: ',<br>&lt;', KeyE: '.<br>&gt;', KeyR: 'P', KeyT: 'Y', KeyY: 'F', KeyU: 'G', KeyI: 'C', KeyO: 'R', KeyP: 'L', KeyA: 'A', KeyS: 'O', KeyD: 'E', KeyF: 'U', KeyG: 'I', KeyH: 'D', KeyJ: 'H', KeyK: 'T', KeyL: 'N', KeyZ: ':<br>;', KeyX: 'Q', KeyC: 'J', KeyV: 'K', KeyB: 'X', KeyN: 'B', KeyM: 'M', Semicolon: 'S', Quote: '-<br>_', Comma: 'W', Period: 'V', Slash: 'Z', BracketLeft: '/<br>?', BracketRight: '=<br>+' },
        colemak: { KeyQ: 'Q', KeyW: 'W', KeyE: 'F', KeyR: 'P', KeyT: 'G', KeyY: 'J', KeyU: 'L', KeyI: 'U', KeyO: 'Y', KeyP: ':<br>;', KeyA: 'A', KeyS: 'R', KeyD: 'S', KeyF: 'T', KeyG: 'D', KeyH: 'H', KeyJ: 'N', KeyK: 'E', KeyL: 'I', KeyZ: 'Z', KeyX: 'X', KeyC: 'C', KeyV: 'V', KeyB: 'B', KeyN: 'K', KeyM: 'M', Semicolon: 'O', Quote: '"<br>\'', Comma: '&lt;<br>,', Period: '&gt;<br>.', Slash: '?<br>/', BracketLeft: '{<br>[', BracketRight: '}<br>]' },
        azerty: { KeyQ: 'A', KeyW: 'Z', KeyE: 'E', KeyR: 'R', KeyT: 'T', KeyY: 'Y', KeyU: 'U', KeyI: 'I', KeyO: 'O', KeyP: 'P', KeyA: 'Q', KeyS: 'S', KeyD: 'D', KeyF: 'F', KeyG: 'G', KeyH: 'H', KeyJ: 'J', KeyK: 'K', KeyL: 'L', KeyZ: 'W', KeyX: 'X', KeyC: 'C', KeyV: 'V', KeyB: 'B', KeyN: 'N', KeyM: 'M', Semicolon: 'M', Quote: '%<br>ù', Comma: '?<br>,', Period: '.<br>;', Slash: '/<br>:', BracketLeft: '^<br>¨', BracketRight: '$<br>£' },
        qwertz: { KeyQ: 'Q', KeyW: 'W', KeyE: 'E', KeyR: 'R', KeyT: 'T', KeyY: 'Z', KeyU: 'U', KeyI: 'I', KeyO: 'O', KeyP: 'P', KeyA: 'A', KeyS: 'S', KeyD: 'D', KeyF: 'F', KeyG: 'G', KeyH: 'H', KeyJ: 'J', KeyK: 'K', KeyL: 'L', KeyZ: 'Y', KeyX: 'X', KeyC: 'C', KeyV: 'V', KeyB: 'B', KeyN: 'N', KeyM: 'M', Semicolon: 'Ö', Quote: 'Ä', Comma: ';<br>,', Period: ':<br>.', Slash: '_<br>-', BracketLeft: 'Ü', BracketRight: '+<br>*' }
    };

    const osModifiers = {
        windows: { ControlLeft: 'Ctrl', ControlRight: 'Ctrl', MetaLeft: 'Win', MetaRight: 'Win', AltLeft: 'Alt', AltRight: 'Alt', ContextMenu: 'Menu' },
        mac: { ControlLeft: 'Control', ControlRight: 'Control', MetaLeft: '⌘ Cmd', MetaRight: '⌘ Cmd', AltLeft: '⌥ Opt', AltRight: '⌥ Opt', ContextMenu: 'Fn' }
    };

    function playClickSound() {
        if (!soundEnabled) return;
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const oscillator = audioContext.createOscillator();
        const gainNode = audioContext.createGain();
        oscillator.connect(gainNode);
        gainNode.connect(audioContext.destination);
        oscillator.frequency.value = 800;
        oscillator.type = 'sine';
        gainNode.gain.setValueAtTime(0.3, audioContext.currentTime);
        gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.05);
        oscillator.start(audioContext.currentTime);
        oscillator.stop(audioContext.currentTime + 0.05);
    }

    // Cat Progress Animation State
    let lastCatLevel = 0;
    let treatsEatenCount = 0;
    const catMessages = [
        "Press keys to feed me!",
        "Yummy fish! 🐟",
        "Milk is purrfect! 🥛",
        "So refreshing! 💧",
        "Caught the mouse toy! 🐭",
        "Love this yarn! 🧶",
        "Tuna time! 🥫",
        "Chicken! My favorite! 🍗",
        "Mmm treats! 🍬",
        "I'm a star! ⭐",
        "VICTORY! I caught the mouse! 🏆"
    ];
    const catMoods = [
        "😺 Hungry",
        "😸 Happy",
        "😻 Loving it!",
        "😽 Content",
        "🙀 Excited!",
        "😹 Playful",
        "😺 Energized",
        "😸 Thriving",
        "😻 Amazing!",
        "🐱 SUPER CAT!",
        "👑 CHAMPION!"
    ];

    function updateProgressBar() {
        const keysPressed = Object.keys(keyPressCount).length;
        const percentage = Math.round((keysPressed / TOTAL_KEYS) * 100);
        progressCount.textContent = keysPressed;
        progressPercentage.textContent = `${percentage}%`;

        // Update Cat Animation with key count
        updateCatProgress(keysPressed, percentage);
    }

    // Treat milestones based on key counts
    const treatMilestones = [10, 20, 30, 40, 50, 60, 70, 80, 90, 103];

    function updateCatProgress(keysPressed, percentage) {
        const cat = document.getElementById('progress-cat');
        const catMessage = document.getElementById('cat-message');
        const catMood = document.getElementById('cat-mood');
        const treatsEaten = document.getElementById('treats-eaten');
        const mouse = document.getElementById('progress-mouse');

        if (!cat) return;

        // Calculate cat position based on percentage (0% to 92% of track width)
        const catPosition = Math.min(percentage * 0.92, 92);
        cat.style.left = catPosition + '%';

        // Add walking animation when moving
        cat.classList.add('walking');
        setTimeout(() => cat.classList.remove('walking'), 600);

        // Calculate current level based on key count milestones
        let currentLevel = 0;
        for (let i = 0; i < treatMilestones.length; i++) {
            if (keysPressed >= treatMilestones[i]) {
                currentLevel = i + 1;
            }
        }

        // Check if cat reached a new treat
        if (currentLevel > lastCatLevel && currentLevel <= 10) {
            const milestone = treatMilestones[currentLevel - 1];
            const treatPercent = currentLevel === 10 ? 100 : currentLevel * 10;
            const treatElement = document.querySelector(`.treat[data-treat="${treatPercent}"]`);

            if (treatElement && !treatElement.classList.contains('eaten')) {
                // Trigger eating animation
                treatElement.classList.add('eating');
                cat.classList.add('eating');
                cat.classList.add('show-message');

                // Create sparkle effect
                createSparkles(treatElement);

                // Update cat color/level
                cat.setAttribute('data-level', currentLevel);

                // Update message
                catMessage.textContent = catMessages[currentLevel] || catMessages[0];

                // Update mood
                catMood.textContent = catMoods[currentLevel] || catMoods[0];

                // Mark treat as eaten after animation
                setTimeout(() => {
                    treatElement.classList.remove('eating');
                    treatElement.classList.add('eaten');
                    cat.classList.remove('eating');
                    treatsEatenCount = currentLevel;
                    treatsEaten.textContent = `Treats: ${treatsEatenCount}/10`;
                }, 500);

                // Hide message after delay
                setTimeout(() => cat.classList.remove('show-message'), 2000);

                lastCatLevel = currentLevel;
            }
        }

        // Check if cat caught the mouse (all 103 keys pressed)
        if (keysPressed >= TOTAL_KEYS && !mouse.classList.contains('caught')) {
            mouse.classList.add('caught');
            cat.setAttribute('data-level', '10');
            catMood.textContent = "👑 CHAMPION!";
            catMessage.textContent = "I caught the mouse! 🎉";
            cat.classList.add('show-message');
            createSparkles(mouse);

            // Create celebration sparkles
            for (let i = 0; i < 5; i++) {
                setTimeout(() => createSparkles(cat), i * 200);
            }
        }
    }

    function createSparkles(element) {
        const sparkles = ['✨', '⭐', '💫', '🌟', '✧'];
        const rect = element.getBoundingClientRect();
        const container = document.querySelector('.cat-progress-track');
        const containerRect = container.getBoundingClientRect();

        for (let i = 0; i < 5; i++) {
            const sparkle = document.createElement('span');
            sparkle.className = 'sparkle';
            sparkle.textContent = sparkles[Math.floor(Math.random() * sparkles.length)];
            sparkle.style.left = (rect.left - containerRect.left + Math.random() * 40 - 20) + 'px';
            sparkle.style.top = (rect.top - containerRect.top + Math.random() * 40 - 20) + 'px';
            container.appendChild(sparkle);

            setTimeout(() => sparkle.remove(), 600);
        }
    }

    function resetCatProgress() {
        const cat = document.getElementById('progress-cat');
        const catMessage = document.getElementById('cat-message');
        const catMood = document.getElementById('cat-mood');
        const treatsEaten = document.getElementById('treats-eaten');
        const mouse = document.getElementById('progress-mouse');

        if (cat) {
            cat.style.left = '0%';
            cat.setAttribute('data-level', '0');
            cat.classList.remove('walking', 'eating', 'show-message');
        }
        if (catMessage) catMessage.textContent = 'Press keys to feed me!';
        if (catMood) catMood.textContent = '😺 Hungry';
        if (treatsEaten) treatsEaten.textContent = 'Treats: 0/10';
        if (mouse) mouse.classList.remove('caught');

        // Reset all treats
        document.querySelectorAll('.treat').forEach(treat => {
            treat.classList.remove('eaten', 'eating');
        });

        lastCatLevel = 0;
        treatsEatenCount = 0;
    }

    function updateStatistics() {
        const keysPressed = Object.keys(keyPressCount).length;
        document.getElementById('total-keys').textContent = totalKeyPresses;
        document.getElementById('keys-tested').textContent = `${keysPressed}/${TOTAL_KEYS}`;
        let maxKey = null, maxCount = 0;
        for (const [key, count] of Object.entries(keyPressCount)) { if (count > maxCount) { maxCount = count; maxKey = key; } }
        document.getElementById('most-pressed').textContent = maxKey ? `${maxKey} (${maxCount}x)` : 'None';
        let minKey = null, minCount = Infinity;
        for (const [key, count] of Object.entries(keyPressCount)) { if (count < minCount) { minCount = count; minKey = key; } }
        document.getElementById('least-pressed').textContent = minKey ? `${minKey} (${minCount}x)` : 'None';
    }

    function updateSessionTimer() {
        const elapsed = Math.floor((Date.now() - sessionStartTime) / 1000);
        const minutes = Math.floor(elapsed / 60);
        const seconds = elapsed % 60;
        document.getElementById('session-time').textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }

    function applyHeatmap() {
        if (!heatmapMode) { document.querySelectorAll('.key').forEach(key => key.classList.remove('heat-1', 'heat-2', 'heat-3', 'heat-4', 'heat-5')); return; }
        const counts = Object.values(keyPressCount);
        if (counts.length === 0) return;
        const maxCount = Math.max(...counts);
        document.querySelectorAll('.key').forEach(key => {
            const keyCode = key.getAttribute('data-key');
            const count = keyPressCount[keyCode] || 0;
            key.classList.remove('heat-1', 'heat-2', 'heat-3', 'heat-4', 'heat-5');
            if (count > 0) {
                const intensity = count / maxCount;
                if (intensity > 0.8) key.classList.add('heat-5');
                else if (intensity > 0.6) key.classList.add('heat-4');
                else if (intensity > 0.4) key.classList.add('heat-3');
                else if (intensity > 0.2) key.classList.add('heat-2');
                else key.classList.add('heat-1');
            }
        });
    }

    function updateTestMode() {
        if (!testMode) { document.querySelectorAll('.key').forEach(key => key.classList.remove('untested')); return; }
        document.querySelectorAll('.key').forEach(key => {
            // Skip disabled keys (like PrintScreen)
            if (key.classList.contains('key-disabled')) return;
            const keyCode = key.getAttribute('data-key');
            key.classList.toggle('untested', !keyPressCount[keyCode]);
        });
    }

    function exportResults() {
        const elapsed = Math.floor((Date.now() - sessionStartTime) / 1000);
        const minutes = Math.floor(elapsed / 60);
        const seconds = elapsed % 60;
        const keysPressed = Object.keys(keyPressCount).length;
        const percentage = Math.round((keysPressed / TOTAL_KEYS) * 100);
        let exportText = '=== KEYBOARD TEST RESULTS ===\n\n';
        exportText += `Session Duration: ${minutes}:${seconds.toString().padStart(2, '0')}\n`;
        exportText += `Total Keys Pressed: ${totalKeyPresses}\n`;
        exportText += `Unique Keys Tested: ${keysPressed}/${TOTAL_KEYS} (${percentage}%)\n\n`;
        exportText += '--- Key Press Counts ---\n';
        Object.entries(keyPressCount).sort((a, b) => b[1] - a[1]).forEach(([key, count]) => { exportText += `${key}: ${count}\n`; });
        exportText += `\n--- Key Press History ---\n${keyHistory.value}`;
        const blob = new Blob([exportText], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `keyboard-test-${Date.now()}.txt`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }

    function updateKeyboardLayout(layout) {
        const layoutMap = keyboardLayouts[layout];
        Object.keys(layoutMap).forEach(keyCode => {
            const keyElement = document.querySelector(`[data-key="${keyCode}"]`);
            if (keyElement) keyElement.querySelector('span').innerHTML = layoutMap[keyCode];
        });
    }

    function updateOSKeys(os) {
        const modifiers = osModifiers[os];
        Object.keys(modifiers).forEach(keyCode => {
            const keyElement = document.querySelector(`[data-key="${keyCode}"]`);
            if (keyElement) keyElement.querySelector('span').textContent = modifiers[keyCode];
        });
    }

    const savedTheme = localStorage.getItem('keyboardTheme') || 'dark';
    const savedLayout = localStorage.getItem('keyboardLayout') || 'qwerty';
    const savedOS = localStorage.getItem('keyboardOS') || 'windows';
    keyboardTester.setAttribute('data-theme', savedTheme);
    themeSelector.value = savedTheme;
    layoutSelector.value = savedLayout;
    osSelector.value = savedOS;
    updateKeyboardLayout(savedLayout);
    updateOSKeys(savedOS);
    sessionTimerInterval = setInterval(updateSessionTimer, 1000);

    themeSelector.addEventListener('change', (e) => { keyboardTester.setAttribute('data-theme', e.target.value); localStorage.setItem('keyboardTheme', e.target.value); });
    layoutSelector.addEventListener('change', (e) => { updateKeyboardLayout(e.target.value); localStorage.setItem('keyboardLayout', e.target.value); });
    osSelector.addEventListener('change', (e) => { updateOSKeys(e.target.value); localStorage.setItem('keyboardOS', e.target.value); });

    advancedToggle.addEventListener('click', () => {
        const isVisible = featureControls.style.display !== 'none';
        featureControls.style.display = isVisible ? 'none' : 'flex';
        progressSection.style.display = isVisible ? 'none' : 'block';
        advancedToggle.classList.toggle('expanded', !isVisible);
        localStorage.setItem('advancedOptionsVisible', !isVisible ? 'true' : 'false');
    });

    if (localStorage.getItem('advancedOptionsVisible') === 'true') {
        featureControls.style.display = 'flex';
        progressSection.style.display = 'block';
        advancedToggle.classList.add('expanded');
    }

    statsButton.addEventListener('click', () => { statsPanel.style.display = statsPanel.style.display === 'none' ? 'block' : 'none'; statsButton.classList.toggle('active'); updateStatistics(); });
    closeStats.addEventListener('click', () => { statsPanel.style.display = 'none'; statsButton.classList.remove('active'); });
    heatmapButton.addEventListener('click', () => { heatmapMode = !heatmapMode; heatmapButton.classList.toggle('active'); applyHeatmap(); });
    soundButton.addEventListener('click', () => { soundEnabled = !soundEnabled; soundButton.classList.toggle('active'); soundButton.querySelector('.sound-label').textContent = soundEnabled ? 'Sound: ON' : 'Sound: OFF'; });
    testModeButton.addEventListener('click', () => { testMode = !testMode; testModeButton.classList.toggle('active'); updateTestMode(); });
    exportButton.addEventListener('click', exportResults);

    ghostClickButton.addEventListener('click', () => { ghostPanel.style.display = ghostPanel.style.display === 'none' ? 'block' : 'none'; ghostClickButton.classList.toggle('active'); if (ghostPanel.style.display === 'none' && ghostTestActive) stopGhostClickTestFunc(); });
    closeGhost.addEventListener('click', () => { ghostPanel.style.display = 'none'; ghostClickButton.classList.remove('active'); if (ghostTestActive) stopGhostClickTestFunc(); });
    startGhostTest.addEventListener('click', startGhostClickTestFunc);
    stopGhostTest.addEventListener('click', stopGhostClickTestFunc);
    clearGhostLog.addEventListener('click', clearGhostClickLogFunc);

    latencyButton.addEventListener('click', () => { latencyPanel.style.display = latencyPanel.style.display === 'none' ? 'block' : 'none'; latencyButton.classList.toggle('active'); if (latencyPanel.style.display === 'none' && latencyTestActive) stopLatencyTestFunc(); });
    closeLatency.addEventListener('click', () => { latencyPanel.style.display = 'none'; latencyButton.classList.remove('active'); if (latencyTestActive) stopLatencyTestFunc(); });
    startLatencyTest.addEventListener('click', startLatencyTestFunc);
    stopLatencyTest.addEventListener('click', stopLatencyTestFunc);
    clearLatency.addEventListener('click', clearLatencyResultsFunc);

    document.addEventListener('keydown', (event) => {
        const keyElement = document.querySelector(`[data-key="${event.code}"]`);
        if (ghostTestActive) logGhostClick(event.code);
        if (latencyTestActive) measureLatency(event);
        // Skip disabled keys (like PrintScreen which cannot be captured)
        if (keyElement && keyElement.classList.contains('key-disabled')) {
            return;
        }
        if (keyElement) {
            event.preventDefault();
            playClickSound();
            keyPressCount[event.code] = (keyPressCount[event.code] || 0) + 1;
            totalKeyPresses++;
            const activeLevel = ((keyPressCount[event.code] - 1) % 5) + 1;
            keyElement.className = keyElement.className.replace(/active-\d+/g, '').trim();
            if (heatmapMode) applyHeatmap(); else keyElement.classList.add(`active-${activeLevel}`);
            let counter = keyElement.querySelector('.key-counter');
            if (!counter) { counter = document.createElement('div'); counter.className = 'key-counter'; keyElement.appendChild(counter); }
            counter.textContent = keyPressCount[event.code];
            const displayKey = event.key === ' ' ? '␣' : event.key.length > 1 ? `[${event.code}]` : event.key;
            keyHistory.value += displayKey + ' ';
            keyHistory.scrollTop = keyHistory.scrollHeight;
            if (event.code === 'CapsLock') capsLed.classList.toggle('active');
            if (event.code === 'NumLock') numLed.classList.toggle('active');
            if (event.code === 'ScrollLock') scrollLed.classList.toggle('active');
            updateProgressBar();
            if (testMode) updateTestMode();
            if (statsPanel.style.display !== 'none') updateStatistics();
        }
    });

    resetButton.addEventListener('click', () => {
        document.querySelectorAll('.key').forEach(key => { key.className = key.className.replace(/active-\d+/g, '').replace(/heat-\d+/g, '').replace('untested', '').trim(); const counter = key.querySelector('.key-counter'); if (counter) counter.remove(); });
        keyHistory.value = '';
        capsLed.classList.remove('active');
        numLed.classList.remove('active');
        scrollLed.classList.remove('active');
        Object.keys(keyPressCount).forEach(key => delete keyPressCount[key]);
        totalKeyPresses = 0;
        sessionStartTime = Date.now();
        updateProgressBar();
        resetCatProgress();
        updateStatistics();
        if (testMode) updateTestMode();
        if (heatmapMode) applyHeatmap();
    });

    function startGhostClickTestFunc() {
        ghostTestActive = true;
        ghostTestStartTime = Date.now();
        ghostClicksDetected = 0;
        totalGhostEvents = 0;
        ghostStatusDot.className = 'status-dot active';
        ghostStatusText.textContent = 'Test Active - Hands Off!';
        ghostCount.textContent = '0';
        ghostTotal.textContent = '0';
        ghostLogContent.innerHTML = '<p class="log-placeholder" style="color: var(--accent-warning);">Monitoring for ghost clicks...</p>';
        startGhostTest.disabled = true;
        stopGhostTest.disabled = false;
        ghostClickButton.classList.add('active');
        ghostTestInterval = setInterval(updateGhostTimer, 100);
    }

    function stopGhostClickTestFunc() {
        ghostTestActive = false;
        clearInterval(ghostTestInterval);
        ghostStatusDot.className = ghostClicksDetected === 0 ? 'status-dot ready' : 'status-dot error';
        ghostStatusText.textContent = ghostClicksDetected === 0 ? 'Test Complete - No Issues!' : `Test Complete - ${ghostClicksDetected} Ghost Clicks Found`;
        startGhostTest.disabled = false;
        stopGhostTest.disabled = true;
    }

    function updateGhostTimer() {
        const elapsed = Date.now() - ghostTestStartTime;
        const seconds = Math.floor(elapsed / 1000);
        const ms = Math.floor((elapsed % 1000) / 100);
        ghostTimer.textContent = `${seconds.toString().padStart(2, '0')}:${ms}`;
    }

    function logGhostClick(keyCode) {
        if (!ghostTestActive) return;
        totalGhostEvents++;
        ghostClicksDetected++;
        const timestamp = new Date().toLocaleTimeString();
        ghostCount.textContent = ghostClicksDetected;
        ghostTotal.textContent = totalGhostEvents;
        const logEntry = document.createElement('div');
        logEntry.className = 'log-entry error';
        logEntry.innerHTML = `<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;"><span style="color: var(--text-muted); font-size: 10px;">${timestamp}</span><span style="background: rgba(239, 68, 68, 0.2); padding: 2px 8px; border-radius: 4px; font-size: 10px; font-weight: 700; color: var(--accent-danger);">GHOST CLICK</span></div><div>Key Detected: <span style="color: var(--accent-danger); font-weight: 700;">${keyCode}</span></div>`;
        if (ghostLogContent.querySelector('.log-placeholder')) ghostLogContent.innerHTML = '';
        ghostLogContent.insertBefore(logEntry, ghostLogContent.firstChild);
        while (ghostLogContent.children.length > 50) ghostLogContent.removeChild(ghostLogContent.lastChild);
        ghostStatusDot.className = 'status-dot error';
    }

    function clearGhostClickLogFunc() {
        ghostClicksDetected = 0;
        totalGhostEvents = 0;
        ghostCount.textContent = '0';
        ghostTotal.textContent = '0';
        ghostLogContent.innerHTML = '<p class="log-placeholder success">No ghost clicks detected. Your keyboard is working properly!</p>';
        ghostStatusDot.className = 'status-dot ready';
        ghostStatusText.textContent = 'Ready to test';
        ghostTimer.textContent = '00:00';
    }

    function startLatencyTestFunc() {
        latencyTestActive = true;
        latencyTests = [];
        latencyStatusDot.className = 'status-dot active';
        latencyStatusText.textContent = 'Test Active - Press Any Key';
        latencyButton.classList.add('active');
        startLatencyTest.disabled = true;
        stopLatencyTest.disabled = false;
        currentLatency.textContent = '-- ms';
        avgLatency.textContent = '-- ms';
        minLatency.textContent = '-- ms';
        maxLatency.textContent = '-- ms';
        testCount.textContent = '0';
        latencyLogContent.innerHTML = '<p class="log-placeholder">Press keys to measure latency...</p>';
        updateLatencyRating();
    }

    function stopLatencyTestFunc() {
        latencyTestActive = false;
        latencyStatusDot.className = 'status-dot ready';
        latencyStatusText.textContent = 'Test Complete';
        startLatencyTest.disabled = false;
        stopLatencyTest.disabled = true;
    }

    function measureLatency(event) {
        if (!latencyTestActive) return;
        const currentTime = performance.now();
        const latency = event.timeStamp ? (currentTime - event.timeStamp) : Math.random() * 10 + 1;
        latencyTests.push({ key: event.code, latency: latency, timestamp: new Date().toLocaleTimeString() });
        currentLatency.textContent = latency.toFixed(2) + ' ms';
        const avg = latencyTests.reduce((sum, t) => sum + t.latency, 0) / latencyTests.length;
        const min = Math.min(...latencyTests.map(t => t.latency));
        const max = Math.max(...latencyTests.map(t => t.latency));
        avgLatency.textContent = avg.toFixed(2) + ' ms';
        minLatency.textContent = min.toFixed(2) + ' ms';
        maxLatency.textContent = max.toFixed(2) + ' ms';
        testCount.textContent = latencyTests.length;
        const logEntry = document.createElement('div');
        const entryClass = latency < 5 ? 'success' : latency > 15 ? 'warning' : '';
        const performanceLabel = latency < 5 ? 'EXCELLENT' : latency > 15 ? 'SLOW' : 'GOOD';
        const labelColor = latency < 5 ? 'var(--accent-success)' : latency > 15 ? 'var(--accent-warning)' : 'var(--accent-primary)';
        logEntry.className = `log-entry ${entryClass}`;
        logEntry.innerHTML = `<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;"><span style="color: var(--text-muted); font-size: 10px;">${latencyTests[latencyTests.length - 1].timestamp}</span><span style="background: ${latency < 5 ? 'rgba(16, 185, 129, 0.2)' : latency > 15 ? 'rgba(245, 158, 11, 0.2)' : 'rgba(99, 102, 241, 0.2)'}; padding: 2px 8px; border-radius: 4px; font-size: 10px; font-weight: 700; color: ${labelColor};">${performanceLabel}</span></div><div style="display: flex; justify-content: space-between; align-items: center;"><span>Key: <span style="font-weight: 700;">${event.code}</span></span><span style="color: ${labelColor}; font-weight: 700; font-size: 14px;">${latency.toFixed(2)} ms</span></div>`;
        if (latencyLogContent.querySelector('.log-placeholder')) latencyLogContent.innerHTML = '';
        latencyLogContent.insertBefore(logEntry, latencyLogContent.firstChild);
        while (latencyLogContent.children.length > 20) latencyLogContent.removeChild(latencyLogContent.lastChild);
        if (latencyTests.length >= 10) updateLatencyRating();
    }

    function updateLatencyRating() {
        if (latencyTests.length < 10) { latencyRating.className = 'rating-box'; latencyRating.innerHTML = 'Your keyboard latency will be rated after 10 tests'; return; }
        const avg = latencyTests.reduce((sum, t) => sum + t.latency, 0) / latencyTests.length;
        let ratingClass, message;
        if (avg < 5) { ratingClass = 'excellent'; message = '🏆 <strong>Excellent!</strong> Your keyboard has professional-grade latency.'; }
        else if (avg < 10) { ratingClass = 'good'; message = '✅ <strong>Good!</strong> Your keyboard latency is solid for general use.'; }
        else if (avg < 20) { ratingClass = 'fair'; message = '⚠️ <strong>Fair.</strong> Acceptable but may feel sluggish for gaming.'; }
        else { ratingClass = 'poor'; message = '❌ <strong>Poor.</strong> Consider checking drivers or replacing your keyboard.'; }
        latencyRating.className = `rating-box ${ratingClass}`;
        latencyRating.innerHTML = `<p style="margin: 0 0 8px 0;">${message}</p><p style="margin: 0; color: var(--text-muted);">Average Latency: ${avg.toFixed(2)} ms</p>`;
    }

    function clearLatencyResultsFunc() {
        latencyTests = [];
        currentLatency.textContent = '-- ms';
        avgLatency.textContent = '-- ms';
        minLatency.textContent = '-- ms';
        maxLatency.textContent = '-- ms';
        testCount.textContent = '0';
        latencyLogContent.innerHTML = '<p class="log-placeholder">Press any key to start testing...</p>';
        latencyRating.className = 'rating-box';
        latencyRating.innerHTML = 'Your keyboard latency will be rated after 10 tests';
    }

    // Responsive keyboard scaling
    function scaleKeyboard() {
        const wrapper = document.getElementById('keyboard-scale-wrapper');
        const container = document.querySelector('.keyboard-container');
        const layout = document.querySelector('.keyboard-layout');

        if (!wrapper || !container || !layout) return;

        // Reset scale to measure natural dimensions
        wrapper.style.transform = 'none';
        container.style.height = 'auto';

        // Force reflow to get accurate measurements
        void layout.offsetWidth;

        // Get natural dimensions of keyboard
        const layoutWidth = layout.scrollWidth;
        const layoutHeight = layout.scrollHeight;

        // Get available width (container width minus padding)
        const containerPadding = 48; // 24px * 2
        const availableWidth = container.clientWidth - containerPadding;

        // Calculate scale factor
        let scale = 1;
        if (layoutWidth > availableWidth && layoutWidth > 0) {
            scale = availableWidth / layoutWidth;
            scale = Math.max(scale, 0.3); // Minimum scale of 30%
        }

        // Apply scale transform
        wrapper.style.transform = scale < 1 ? `scale(${scale})` : 'none';

        // Set container height to exactly fit scaled keyboard
        const scaledHeight = layoutHeight * scale;
        container.style.height = Math.ceil(scaledHeight + containerPadding) + 'px';
    }

    // Run on load (with slight delay for fonts/layout) and on resize
    setTimeout(scaleKeyboard, 100);

    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(scaleKeyboard, 100);
    });

    // ============================================
    // Mobile Keyboard Tester
    // ============================================
    const mobileInput = document.getElementById('mobile-input');
    const mobileClearBtn = document.getElementById('mobile-clear-btn');
    const mobileCharCount = document.getElementById('mobile-char-count');
    const mobileUniqueKeys = document.getElementById('mobile-unique-keys');
    const MOBILE_TOTAL_KEYS = 42; // Total keys on mobile keyboard display

    const mobileKeyPresses = {};
    let mobileTotalChars = 0;

    if (mobileInput) {
        // Handle input on mobile
        mobileInput.addEventListener('input', function(e) {
            const inputValue = this.value;
            const lastChar = inputValue.slice(-1).toLowerCase();

            if (lastChar) {
                mobileTotalChars++;
                mobileCharCount.textContent = mobileTotalChars;

                // Track key press
                mobileKeyPresses[lastChar] = (mobileKeyPresses[lastChar] || 0) + 1;

                // Update unique keys count
                const uniqueCount = Object.keys(mobileKeyPresses).length;
                mobileUniqueKeys.textContent = `${uniqueCount}/${MOBILE_TOTAL_KEYS}`;

                // Highlight the key on visual keyboard
                const keyElement = document.querySelector(`.mobile-key[data-char="${lastChar}"]`);
                if (keyElement) {
                    keyElement.classList.add('pressed');
                    if (mobileKeyPresses[lastChar] > 1) {
                        keyElement.classList.add('pressed-multi');
                    }

                    // Add press animation
                    keyElement.style.transform = 'scale(1.1) translateY(-3px)';
                    setTimeout(() => {
                        keyElement.style.transform = '';
                    }, 150);
                }

                // Update progress for cat animation (use percentage based on mobile keys)
                const mobilePercentage = Math.round((uniqueCount / MOBILE_TOTAL_KEYS) * 100);
                updateMobileCatProgress(uniqueCount, mobilePercentage);
            }
        });

        // Handle special keys via keydown (space, etc.)
        mobileInput.addEventListener('keydown', function(e) {
            if (e.key === ' ') {
                const spaceKey = document.querySelector('.mobile-key[data-char=" "]');
                if (spaceKey) {
                    mobileKeyPresses[' '] = (mobileKeyPresses[' '] || 0) + 1;
                    spaceKey.classList.add('pressed');
                    if (mobileKeyPresses[' '] > 1) {
                        spaceKey.classList.add('pressed-multi');
                    }

                    // Update counts
                    const uniqueCount = Object.keys(mobileKeyPresses).length;
                    mobileUniqueKeys.textContent = `${uniqueCount}/${MOBILE_TOTAL_KEYS}`;

                    const mobilePercentage = Math.round((uniqueCount / MOBILE_TOTAL_KEYS) * 100);
                    updateMobileCatProgress(uniqueCount, mobilePercentage);
                }
            }
        });

        // Clear button
        mobileClearBtn.addEventListener('click', function() {
            mobileInput.value = '';
            mobileTotalChars = 0;
            mobileCharCount.textContent = '0';
            mobileUniqueKeys.textContent = '0/42';

            // Reset all keys
            Object.keys(mobileKeyPresses).forEach(key => delete mobileKeyPresses[key]);
            document.querySelectorAll('.mobile-key').forEach(key => {
                key.classList.remove('pressed', 'pressed-multi');
            });

            // Reset cat progress
            resetCatProgress();
            lastMobileCatLevel = 0;
        });
    }

    // Mobile cat progress tracking
    let lastMobileCatLevel = 0;
    const mobileTreatMilestones = [4, 8, 13, 17, 21, 25, 29, 34, 38, 42]; // Every ~4 keys for 42 total

    function updateMobileCatProgress(uniqueKeys, percentage) {
        const cat = document.getElementById('progress-cat');
        const catMessage = document.getElementById('cat-message');
        const catMood = document.getElementById('cat-mood');
        const treatsEaten = document.getElementById('treats-eaten');
        const mouse = document.getElementById('progress-mouse');
        const progressCount = document.getElementById('progress-count');
        const progressPercentage = document.getElementById('progress-percentage');

        if (!cat) return;

        // Update display counts for mobile
        if (progressCount) progressCount.textContent = uniqueKeys;
        if (progressPercentage) progressPercentage.textContent = `${percentage}%`;

        // Calculate cat position
        const catPosition = Math.min(percentage * 0.92, 92);
        cat.style.left = catPosition + '%';

        // Walking animation
        cat.classList.add('walking');
        setTimeout(() => cat.classList.remove('walking'), 600);

        // Calculate level based on mobile milestones
        let currentLevel = 0;
        for (let i = 0; i < mobileTreatMilestones.length; i++) {
            if (uniqueKeys >= mobileTreatMilestones[i]) {
                currentLevel = i + 1;
            }
        }

        // Trigger treat eating
        if (currentLevel > lastMobileCatLevel && currentLevel <= 10) {
            const treatPercent = currentLevel === 10 ? 100 : currentLevel * 10;
            const treatElement = document.querySelector(`.treat[data-treat="${treatPercent}"]`);

            if (treatElement && !treatElement.classList.contains('eaten')) {
                treatElement.classList.add('eating');
                cat.classList.add('eating');
                cat.classList.add('show-message');

                createSparkles(treatElement);

                cat.setAttribute('data-level', currentLevel);
                catMessage.textContent = catMessages[currentLevel] || catMessages[0];
                catMood.textContent = catMoods[currentLevel] || catMoods[0];

                setTimeout(() => {
                    treatElement.classList.remove('eating');
                    treatElement.classList.add('eaten');
                    cat.classList.remove('eating');
                    treatsEaten.textContent = `Treats: ${currentLevel}/10`;
                }, 500);

                setTimeout(() => cat.classList.remove('show-message'), 2000);

                lastMobileCatLevel = currentLevel;
            }
        }

        // Victory at 100%
        if (uniqueKeys >= MOBILE_TOTAL_KEYS && !mouse.classList.contains('caught')) {
            mouse.classList.add('caught');
            cat.setAttribute('data-level', '10');
            catMood.textContent = "👑 CHAMPION!";
            catMessage.textContent = "I caught the mouse! 🎉";
            cat.classList.add('show-message');
            createSparkles(mouse);

            for (let i = 0; i < 5; i++) {
                setTimeout(() => createSparkles(cat), i * 200);
            }
        }
    }

    // Update cat progress section header for mobile
    function updateMobileDisplay() {
        const isMobile = window.innerWidth <= 768;
        const totalKeysSpan = document.getElementById('total-keys-display');
        const panelTitle = document.querySelector('.cat-progress-section .panel-title');

        if (totalKeysSpan) {
            totalKeysSpan.textContent = isMobile ? '42' : '103';
        }
        if (panelTitle) {
            panelTitle.textContent = isMobile
                ? 'Tap & Type to Feed the Cat!'
                : 'Feed the Cat! Press Keys to Progress';
        }

        // Also reset cat progress when switching modes
        if (isMobile) {
            lastMobileCatLevel = 0;
        }
    }

    // Run on load and resize
    updateMobileDisplay();
    window.addEventListener('resize', updateMobileDisplay);
})();
</script>

<?php
echo ob_get_clean();
?>
