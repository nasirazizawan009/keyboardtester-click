<?php ob_start(); ?>
<section class="keyboard-tester" id="keyboard-tester">
    <div class="keyboard-container">
        <!-- Controls -->
        <div class="controls-wrapper">
            <div class="control-group">
                <button id="reset-btn" class="btn btn-control">
                    <span class="btn-icon">🔄</span>
                    <span class="btn-label">초기화</span>
                </button>
                <button id="toggle-history-btn" class="btn btn-control">
                    <span class="btn-icon">📋</span>
                    <span class="btn-label">키 기록</span>
                </button>
            </div>
            <div class="control-group">
                <label for="theme-selector" class="control-label">테마:</label>
                <select id="theme-selector" class="theme-selector">
                    <option value="light">밝음</option>
                    <option value="dark">어두움</option>
                    <option value="contrast">대비</option>
                </select>
            </div>
            <div class="control-group">
                <label for="layout-selector" class="control-label">배열:</label>
                <select id="layout-selector" class="layout-selector">
                    <option value="korean">한글 (한글/영문)</option>
                    <option value="qwerty">QWERTY</option>
                </select>
            </div>
        </div>

        <!-- Statistics -->
        <div class="statistics-wrapper">
            <div class="stat-item">
                <span class="stat-label">총 키 누름:</span>
                <span class="stat-value" id="total-presses">0</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">평균 응답시간:</span>
                <span class="stat-value" id="avg-response">0ms</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">문제:</span>
                <span class="stat-value" id="issues-count">0</span>
            </div>
        </div>

        <!-- Keyboard - Korean Hangul Layout -->
        <div class="keyboard" id="keyboard">
            <!-- Row 1 -->
            <div class="key-row">
                <div class="key" data-key="`" data-shift="~" title="백틱">`</div>
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

            <!-- Row 2 - Korean Hangul with English equivalents -->
            <div class="key-row">
                <div class="key tab-key" data-key="Tab">Tab</div>
                <div class="key" data-key="q" data-shift="Q" title="ㅂ/ㅃ">q</div>
                <div class="key" data-key="w" data-shift="W" title="ㅈ/ㅉ">w</div>
                <div class="key" data-key="e" data-shift="E" title="ㄷ/ㄸ">e</div>
                <div class="key" data-key="r" data-shift="R" title="ㄱ/ㄲ">r</div>
                <div class="key" data-key="t" data-shift="T" title="ㅅ/ㅆ">t</div>
                <div class="key" data-key="y" data-shift="Y" title="ㅛ">y</div>
                <div class="key" data-key="u" data-shift="U" title="ㅕ">u</div>
                <div class="key" data-key="i" data-shift="I" title="ㅑ">i</div>
                <div class="key" data-key="o" data-shift="O" title="ㅐ">o</div>
                <div class="key" data-key="p" data-shift="P" title="ㅔ">p</div>
                <div class="key" data-key="[" data-shift="{" title="ㅗ">[</div>
                <div class="key" data-key="]" data-shift="}" title="ㅓ">]</div>
            </div>

            <!-- Row 3 - Korean Hangul -->
            <div class="key-row">
                <div class="key caps-key" data-key="CapsLock">CapsLock</div>
                <div class="key" data-key="a" data-shift="A" title="ㅁ">a</div>
                <div class="key" data-key="s" data-shift="S" title="ㄴ">s</div>
                <div class="key" data-key="d" data-shift="D" title="ㅇ">d</div>
                <div class="key" data-key="f" data-shift="F" title="ㄹ">f</div>
                <div class="key" data-key="g" data-shift="G" title="ㅎ">g</div>
                <div class="key" data-key="h" data-shift="H" title="ㅌ">h</div>
                <div class="key" data-key="j" data-shift="J" title="ㅡ">j</div>
                <div class="key" data-key="k" data-shift="K" title="ㅣ">k</div>
                <div class="key" data-key="l" data-shift="L" title="ㅢ">l</div>
                <div class="key" data-key=";" data-shift=":" title="ㅤ">:</div>
                <div class="key" data-key="'" data-shift="\"">\'</div>
                <div class="key enter-key" data-key="Enter">Enter</div>
            </div>

            <!-- Row 4 - Korean Hangul -->
            <div class="key-row">
                <div class="key shift-key" data-key="Shift">Shift</div>
                <div class="key" data-key="z" data-shift="Z" title="ㅃ">z</div>
                <div class="key" data-key="x" data-shift="X" title="ㅉ">x</div>
                <div class="key" data-key="c" data-shift="C" title="ㄸ">c</div>
                <div class="key" data-key="v" data-shift="V" title="ㄲ">v</div>
                <div class="key" data-key="b" data-shift="B" title="ㅆ">b</div>
                <div class="key" data-key="n" data-shift="N" title="ㅀ">n</div>
                <div class="key" data-key="m" data-shift="M" title="ㅒ">m</div>
                <div class="key" data-key="," data-shift="<" title="ㅖ">,</div>
                <div class="key" data-key="." data-shift=">" title="ㅘ">.</div>
                <div class="key" data-key="/" data-shift="?" title="ㅙ">/</div>
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
                <h3>키 기록</h3>
                <button class="close-btn" onclick="document.getElementById('history-panel').style.display = 'none'">✕</button>
            </div>
            <div class="history-content" id="history-content"></div>
        </div>

        <!-- Ghost Click Detection -->
        <div class="ghost-detection" id="ghost-detection" style="display: none;">
            <div class="detection-header">⚠️ 키보드 문제 감지</div>
            <div class="detection-content" id="detection-content"></div>
        </div>
    </div>
</section>

<script>
<?php include __DIR__ . '/../keyboard-tester/sections/keyboard-tester.js'; ?>
</script>

<?php $content = ob_get_clean(); echo $content; ?>

<style>
  /* Light Theme */
  :root {
    --bg-color: #f0f0f0;
    --text-color: #333333;
    --primary-color: #1abc9c;
    --secondary-color: #34495e;
    --keyboard-bg: #ffffff;
    --key-bg: #e0e0e0;
    --key-text: #333333;
    --key-active-1: #1abc9c;
    --key-active-2: #f1c40f;
    --key-active-3: #e67e22;
    --key-active-4: #e74c3c;
    --key-active-5: #9b59b6;
    --text-box-bg: #e0e0e0;
    --text-box-text: #333333;
    --key-border: #cccccc;
  }

  /* Dark Theme */
  [data-theme="dark"] {
    --bg-color: #2c3e50;
    --text-color: #ecf0f1;
    --primary-color: #1abc9c;
    --secondary-color: #34495e;
    --keyboard-bg: #34495e;
    --key-bg: #4a627a;
    --key-text: #ecf0f1;
    --key-active-1: #1abc9c;
    --key-active-2: #f1c40f;
    --key-active-3: #e67e22;
    --key-active-4: #e74c3c;
    --key-active-5: #9b59b6;
    --text-box-bg: #4a627a;
    --text-box-text: #ecf0f1;
    --key-border: #666666;
  }

  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: var(--bg-color);
    color: var(--text-color);
    transition: background-color 0.3s, color 0.3s;
  }

  /* Header */
  header {
    background-color: var(--secondary-color);
    color: var(--text-color);
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  header h1 {
    margin 약속어 있지 않다.
    font-size: 2.5rem;
    color: var(--primary-color);
    flex-grow: 1;
    text-align: center;
  }

  nav {
    display: flex;
    gap: 10px;
    align-items: center;
  }

  .theme-toggle {
    width: 60px;
    height: 30px;
    background-color: var(--primary-color);
    border-radius: 15px;
    position: relative;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .theme-toggle::before {
    content: '';
    position: absolute;
    width: 26px;
    height: 26px;
    background-color: var(--bg-color);
    border-radius: 50%;
    top: 2px;
    left: 2px;
    transition: transform 0.3s;
  }

  [data-theme="dark"] .theme-toggle::before {
    transform: translateX(30px);
  }

  .reset-button, .help-button {
    padding: 10px 20px;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s, color 0.3s;
  }

  .reset-button {
    background-color: #e74c3c;
  }

  .reset-button:hover {
    background-color: #c0392b;
  }

  .help-button {
    background-color: #3498db;
  }

  .help-button:hover {
    background-color: #2980b9;
  }

  .keyboard-tester {
    padding: 20px;
    transform: scale(0.93); /* Scale down to 93% */
    transform-origin: top center;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .container {
    display: flex;
    gap: 20px;
    justify-content: center;
  }

  .main-keyboard {
    display: flex;
    gap: 5px;
    justify-content: center;
    align-items: flex-start;
  }

  .keyboard {
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 20px;
    background-color: var(--keyboard-bg);
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
  }

  .row {
    display: flex;
    gap: 5px;
    justify-content: space-between;
  }

  .key {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    width: 30px;
    height: 30px;
    background-color: var(--key-bg);
    border: 1px solid var(--key-border);
    border-radius: 6px;
    color: var(--key-text);
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    user-select: none;
    transition: all 0.2s;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    position: relative;
  }

  .key.special { background-color: var(--keyboard-bg); }
  .key.space { width: 400px; }
  .key.active-1 { background-color: var(--key-active-1); }
  .key.active-2 { background-color: var(--key-active-2); }
  .key.active-3 { background-color: var(--key-active-3); }
  .key.active-4 { background-color: var(--key-active-4); }
  .key.active-5 { background-color: var(--key-active-5); }

  .key.enter, .key.shift { width: 120px; }
  .key.tab, .key.caps { width: 75px; }
  .key.backspace { width: 100px; }
  .key.zero { width: 90px; }
  .key.backslash { width: 70px; }
  .key.hangul, .key.hanja { width: 75px; }

  .function-row {
    display: flex;
    gap: 5px;
    align-items: center;
    justify-content: space-between;
  }

  .key-group {
    display: flex;
    gap: 5px;
  }

  .key[data-key="Escape"] { margin-right: 20px; }
  .key[data-key="F4"] { margin-right: 20px; }
  .key[data-key="F8"] { margin-right: 20px; }

  .nav-cluster {
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 20px;
    background-color: var(--keyboard-bg);
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
  }

  .nav-keys {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 5px;
  }

  .arrow-keys {
    display: grid;
    grid-template-areas:
      ". up ."
      "left down right";
    gap: 5px;
    margin-top: 40px;
    position: relative;
  }

  [data-key="ArrowUp"] { grid-area: up; }
  [data-key="ArrowLeft"] { grid-area: left; }
  [data-key="ArrowDown"] { grid veulent-area: down; }
  [data-key="ArrowRight"] { grid-area: right; }

  .numpad {
    display: flex;
    flex-direction: column;
    gap: 5px;
    align-items: flex-start;
    padding: 20px;
    background-color: var(--keyboard-bg);
    border-radius: 15px;
    position: relative;
    padding-top: 60px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
  }

  .numpad .row {
    display: flex;
    gap: 5px;
    padding-bottom: 5px;
    align-items: flex-start;
  }

  .arrow-key { 
    width: 30px; 
    height: 30px; 
  }

  .numpad .key {
    width: 30px;
    height: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid var(--key-border);
  }

  .numpad .tall-key { height: 87px; }
  .numpad .zero { width: 85px; }
  .numpad [data-key="NumpadAdd"] { height: 87px; margin-left: 2px; }
  .numpad [data-key="NumpadEnter"] { height: 87px; margin-left: 2px; position: relative; }
  .numpad [data-key="Numpad0"] { width: 85px; }

  .numpad .row:nth-child(2) { margin-bottom: 1px; }

  .indicator-lights {
    display: flex;
    gap: 10px;
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
  }

  .indicator-light {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: var(--key-bg);
    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3);
  }

  .indicator-light.active {
    background-color: var(--key-active-1);
  }

  .top-right-keys {
    display: flex;
    gap: 5px;
    margin-bottom: 10px;
  }

  .digits-and-vertical-keys {
    display: flex;
    gap: 5px;
  }

  .vertical-keys {
    display: flex;
    flex-direction: column;
    gap: 2px;
  }

  .key.tall { height: 87px; }

  .text-box {
    width: 100%;
    max-width: 600px;
    padding: 10px;
    background-color: var(--text-box-bg);
    border-radius: 8px;
    color: var(--text-box-text);
    font-size: 16px;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
    text-align: center;
  }

  .key-count {
    position: absolute;
    bottom: 2px;
    right: 2px;
    font-size: 10px;
    color: var(--key-text);
  }
</style>


<div class="keyboard-tester" id="keyboard-tester">
  <div style="display: flex; align-items: center; justify-content: center; gap: 30px; margin-bottom: 5px;">
    <div><textarea class="text-box" id="key-history" rows="4" cols="80"></textarea></div>
    <button class="reset-button" id="reset-button">초기화</button>
  </div>

  <div class="container">
    <div class="main-keyboard">
      <!-- Main Keyboard (Korean 2-Set Layout) -->
      <div class="keyboard">
        <div class="row function-row">
          <div class="key special" data-key="Escape">Esc</div>
          <div class="key-group">
            <div class="key special" data-key="F1">F1</div>
            <div class="key special" data-key="F2">F2</div>
            <div class="key special" data-key="F3">F3</div>
            <div class="key special" data-key="F4">F4</div>
          </div>
          <div class="key-group">
            <div class="key special" data-key="F5">F5</div>
            <div class="key special" data-key="F6">F6</div>
            <div class="key special" data-key="F7">F7</div>
            <div class="key special" data-key="F8">F8</div>
          </div>
          <div class="key-group">
            <div class="key special" data-key="F9">F9</div>
            <div class="key special" data-key="F10">F10</div>
            <div class="key special" data-key="F11">F11</div>
            <div class="key special" data-key="F12">F12</div>
          </div>
        </div>

        <div class="row">
          <div class="key" data-key="Backquote">`</div>
          <div class="key" data-key="Digit1">1</div>
          <div class="key" data-key="Digit2">2</div>
          <div class="key" data-key="Digit3">3</div>
          <div class="key" data-key="Digit4">4</div>
          <div class="key" data-key="Digit5">5</div>
          <div class="key" data-key="Digit6">6</div>
          <div class="key" data-key="Digit7">7</div>
          <div class="key" data-key="Digit8">8</div>
          <div class="key" data-key="Digit9">9</div>
          <div class="key" data-key="Digit0">0</div>
          <div class="key" data-key="Minus">-</div>
          <div class="key" data-key="Equal">=</div>
          <div class="key special backspace" data-key="Backspace">백스페이스</div>
        </div>

        <div class="row">
          <div class="key special tab" data-key="Tab">탭</div>
          <div class="key" data-key="KeyQ">ㅂ</div>
          <div class="key" data-key="KeyW">ㅈ</div>
          <div class="key" data-key="KeyE">ㄷ</div>
          <div class="key" data-key="KeyR">ㄱ</div>
          <div class="key" data-key="KeyT">ㅅ</div>
          <div class="key" data-key="KeyY">ㅛ</div>
          <div class="key" data-key="KeyU">ㅕ</div>
          <div class="key" data-key="KeyI">ㅑ</div>
          <div class="key" data-key="KeyO">ㅐ</div>
          <div class="key" data-key="KeyP">ㅔ</div>
          <div class="key" data-key="BracketLeft">[</div>
          <div class="key" data-key="BracketRight">]</div>
          <div class="key special backslash" data-key="Backslash">\</div>
        </div>

        <div class="row">
          <div class="key special caps" data-key="CapsLock">Caps Lock</div>
          <div class="key" data-key="KeyA">ㅁ</div>
          <div class="key" data-key="KeyS">ㄴ</div>
          <div class="key" data-key="KeyD">ㅇ</div>
          <div class="key" data-key="KeyF">ㄹ</div>
          <div class="key" data-key="KeyG">ㅎ</div>
          <div class="key" data-key="KeyH">ㅗ</div>
          <div class="key" data-key="KeyJ">ㅓ</div>
          <div class="key" data-key="KeyK">ㅏ</div>
          <div class="key" data-key="KeyL">ㅣ</div>
          <div class="key" data-key="Semicolon">;</div>
          <div class="key" data-key="Quote">'</div>
          <div class="key special enter" data-key="Enter">엔터</div>
        </div>

        <div class="row">
          <div class="key special shift" data-key="ShiftLeft">Shift</div>
          <div class="key" data-key="KeyZ">ㅋ</div>
          <div class="key" data-key="KeyX">ㅌ</div>
          <div class="key" data-key="KeyC">ㅊ</div>
          <div class="key" data-key="KeyV">ㅍ</div>
          <div class="key" data-key="KeyB">ㅠ</div>
          <div class="key" data-key="KeyN">ㅜ</div>
          <div class="key" data-key="KeyM">ㅡ</div>
          <div class="key" data-key="Comma">,</div>
          <div class="key" data-key="Period">.</div>
          <div class="key" data-key="Slash">/</div>
          <div class="key special shift" data-key="ShiftRight">Shift</div>
        </div>

        <div class="row">
          <div class="key special" data-key="ControlLeft">Ctrl</div>
          <div class="key special" data-key="MetaLeft">Win</div>
          <div class="key special" data-key="AltLeft">Alt</div>
          <div class="key special hangul" data-key="HangulMode">한글</div>
          <div class="key space" data-key="Space"> </div>
          <div class="key special hanja" data-key="Hanja">한자</div>
          <div class="key special" data-key="AltRight">Alt</div>
          <div class="key special" data-key="MetaRight">Win</div>
          <div class="key special" data-key="ControlRight">Ctrl</div>
        </div>
      </div>

      <!-- Navigation Cluster -->
      <div class="nav-cluster">
        <div class="top-right-keys">
          <div class="key special" data-key="PrintScreen" style="font-size:12px;text-align:center;">프린트 스크린</div>
          <div class="key special" data-key="ScrollLock" style="font-size:12px;text-align:center;">스크롤 락</div>
          <div class="key special" data-key="Pause" style="font-size:12px;text-align:center;">일시 중지</div>
        </div>
        <div class="nav-keys">
          <div class="key special" data-key="Insert" style="font-size:12px;text-align:center;">삽입</div>
          <div class="key special" data-key="Home" style="font-size:12px;text-align:center;">홈</div>
          <div class="key special" data-key="PageUp" style="font-size:12px;text-align:center;">페이지 업</div>
        </div>
        <div class="nav-keys">
          <div class="key special" data-key="Delete" style="font-size:12px;text-align:center;">삭제</div>
          <div class="key special" data-key="End" style="font-size:12px;text-align:center;">끝</div>
          <div class="key special" data-key="PageDown" style="font-size:12px;text-align:center;">페이지 다운</div>
        </div>
        <div class="arrow-keys">
          <div class="key arrow-key" data-key="ArrowUp">↑</div>
          <div class="key arrow-key" data-key="ArrowLeft">←</div>
          <div class="key arrow-key" data-key="ArrowDown">↓</div>
          <div class="key arrow-key" data-key="ArrowRight">→</div>
        </div>
      </div>

      <!-- Numpad -->
      <div class="numpad">
        <div class="indicator-lights">
          <div class="indicator-light" id="caps-lock-light"></div>
          <div class="indicator-light" id="scroll-lock-light"></div>
          <div class="indicator-light" id="num-lock-light"></div>
        </div>
        <div class="row">
          <div class="key special" data-key="NumLock" style="font-size:12px;text-align:center;">넘 락</div>
          <div class="key special" data-key="NumpadDivide">/</div>
          <div class="key special" data-key="NumpadMultiply">*</div>
          <div class="key special" data-key="NumpadSubtract">-</div>
        </div>
        <div class="digits-and-vertical-keys">
          <div class="digits">
            <div class="row">
              <div class="key" data-key="Numpad7">7</div>
              <div class="key" data-key="Numpad8">8</div>
              <div class="key" data-key="Numpad9">9</div>
            </div>
            <div class="row">
              <div class="key" data-key="Numpad4">4</div>
              <div class="key" data-key="Numpad5">5</div>
              <div class="key" data-key="Numpad6">6</div>
            </div>
            <div class="row">
              <div class="key" data-key="Numpad1">1</div>
              <div class="key" data-key="Numpad2">2</div>
              <div class="key" data-key="Numpad3">3</div>
            </div>
            <div class="row">
              <div class="key zero" data-key="Numpad0">0</div>
              <div class="key" data-key="NumpadDecimal">.</div>
            </div>
          </div>
          <div class="vertical-keys">
            <div class="key tall" data-key="NumpadAdd">+</div>
            <div class="key tall" data-key="NumpadEnter">엔터</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const keyHistory = document.getElementById('key-history');
  const keyPressCount = {};

  const capsLockLight = document.getElementById('caps-lock-light');
  const scrollLockLight = document.getElementById('scroll-lock-light');
  const numLockLight = document.getElementById('num-lock-light');

  // Map key codes to Korean display characters/labels
  const keyDisplayMap = {
    'Backquote': '`',
    'Digit1': '1',
    'Digit2': '2',
    'Digit3': '3',
    'Digit4': '4',
    'Digit5': '5',
    'Digit6': '6',
    'Digit7': '7',
    'Digit8': '8',
    'Digit9': '9',
    'Digit0': '0',
    'Minus': '-',
    'Equal': '=',
    'Backspace': '백스페이스',
    'Tab': '탭',
    'KeyQ': 'ㅂ',
    'KeyW': 'ㅈ',
    'KeyE': 'ㄷ',
    'KeyR': 'ㄱ',
    'KeyT': 'ㅅ',
    'KeyY': 'ㅛ',
    'KeyU': 'ㅕ',
    'KeyI': 'ㅑ',
    'KeyO': 'ㅐ',
    'KeyP': 'ㅔ',
    'BracketLeft': '[',
    'BracketRight': ']',
    'Backslash': '\\',
    'CapsLock': 'Caps Lock',
    'KeyA': 'ㅁ',
    'KeyS': 'ㄴ',
    'KeyD': 'ㅇ',
    'KeyF': 'ㄹ',
    'KeyG': 'ㅎ',
    'KeyH': 'ㅗ',
    'KeyJ': 'ㅓ',
    'KeyK': 'ㅏ',
    'KeyL': 'ㅣ',
    'Semicolon': ';',
    'Quote': "'",
    'Enter': '엔터',
    'ShiftLeft': 'Shift',
    'KeyZ': 'ㅋ',
    'KeyX': 'ㅌ',
    'KeyC': 'ㅊ',
    'KeyV': 'ㅍ',
    'KeyB': 'ㅠ',
    'KeyN': 'ㅜ',
    'KeyM': 'ㅡ',
    'Comma': ',',
    'Period': '.',
    'Slash': '/',
    'ShiftRight': 'Shift',
    'ControlLeft': 'Ctrl',
    'MetaLeft': 'Win',
    'AltLeft': 'Alt',
    'HangulMode': '한글',
    'Space': '␣',
    'Hanja': '한자',
    'AltRight': 'Alt',
    'MetaRight': 'Win',
    'ControlRight': 'Ctrl',
    'Escape': 'Esc',
    'F1': 'F1',
    'F2': 'F2',
    'F3': 'F3',
    'F4': 'F4',
    'F5': 'F5',
    'F6': 'F6',
    'F7': 'F7',
    'F8': 'F8',
    'F9': 'F9',
    'F10': 'F10',
    'F11': 'F11',
    'F12': 'F12',
    'PrintScreen': '프린트 스크린',
    'ScrollLock': '스크롤 락',
    'Pause': '일시 중지',
    'Insert': '삽입',
    'Home': '홈',
    'PageUp': '페이지 업',
    'Delete': '삭제',
    'End': '끝',
    'PageDown': '페이지 다운',
    'ArrowUp': '↑',
    'ArrowLeft': '←',
    'ArrowDown': '↓',
    'ArrowRight': '→',
    'NumLock': '넘 락',
    'NumpadDivide': '/',
    'NumpadMultiply': '*',
    'NumpadSubtract': '-',
    'Numpad7': '7',
    'Numpad8': '8',
    'Numpad9': '9',
    'Numpad4': '4',
    'Numpad5': '5',
    'Numpad6': '6',
    'Numpad1': '1',
    'Numpad2': '2',
    'Numpad3': '3',
    'Numpad0': '0',
    'NumpadDecimal': '.',
    'NumpadAdd': '+',
    'NumpadEnter': '엔터'
  };

  document.addEventListener('keydown', (event) => {
    const key = event.code;
    const keyElement = document.querySelector(`[data-key="${key}"]`);

    if (keyElement) {
      event.preventDefault();
      keyPressCount[key] = (keyPressCount[key] || 0) + 1;
      const activeLevel = (keyPressCount[key] - 1) % 5 + 1;

      keyElement.className = keyElement.className
        .replace(/active-\d/g, '') + ` active-${activeLevel}`;

      let keyCountElement = keyElement.querySelector('.key-count');
      if (!keyCountElement) {
        keyCountElement = document.createElement('div');
        keyCountElement.className = 'key-count';
        keyElement.appendChild(keyCountElement);
      }
      keyCountElement.textContent = keyPressCount[key];

      const displayKey = keyDisplayMap[key] || 
                        (event.key.length > 1 ? `[${event.code}]` : event.key);
      keyHistory.textContent += displayKey + ' ';

      if (key === 'CapsLock') {
        capsLockLight.classList.toggle('active');
      }
      if (key === 'ScrollLock') {
        scrollLockLight.classList.toggle('active');
      }
      if (key === 'NumLock') {
        numLockLight.classList.toggle('active');
      }
    }
  });

  const resetButton = document.getElementById('reset-button');
  resetButton.addEventListener('click', () => {
    const keys = document.querySelectorAll('.key');
    keys.forEach(key => {
      key.className = key.className.replace(/active-\d/g, '');
      const keyCountElement = key.querySelector('.key-count');
      if (keyCountElement) {
        keyCountElement.remove();
      }
    });
    keyHistory.textContent = '';
    capsLockLight.classList.remove('active');
    scrollLockLight.classList.remove('active');
    numLockLight.classList.remove('active');

    for (const key in keyPressCount) {
      delete keyPressCount[key];
    }
  });

  const helpButton = document.getElementById('help-button');
  helpButton.addEventListener('click', () => {
    alert('키보드 테스터 사용 방법:\n1. 키를 눌러 가상 키보드에서 반응을 확인하세요.\n2. 키 색상은 누른 횟수를 나타냅니다.\n3. 초기화 버튼으로 모든 상태를 리셋할 수 있습니다.\n4. 테마 토글로 밝은/어두운 모드를 전환하세요.');
  });

  const themeToggle = document.getElementById('theme-toggle');
  themeToggle.addEventListener('click', () => {
    const currentTheme = document.documentElement.getAttribute('data-theme');
    if (currentTheme === 'dark') {
      document.documentElement.setAttribute('data-theme', 'light');
    } else {
      document.documentElement.setAttribute('data-theme', 'dark');
    }
  });
</script>

<?php
echo ob_get_clean();
?>