<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="de">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/includes/seo-meta.php'; ?>
<link rel="icon" type="image/x-icon" href="navigation.png">
  <?php include 'includes/head-common.php'; ?>
  <link rel="stylesheet" href="assets/css/keyboard-tool.css">
</head>
<body>
  <?php include 'header.php'; ?>
  <?php include 'tools/keyboard_tester_english.php'; ?>
  <?php include 'tools/keyboard_tester_german_guideline.php'; ?>
  <?php include 'tools.php'; ?>
  <?php include 'footer.php'; ?>
</body>
</html>

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
      margin: 0;
      font-size: 2.5rem;
      color: var(--primary-color);
      flex-grow: 1;
      text-align: center;
    }

    /* Navigation */
    nav {
      display: flex;
      gap: 10px;
      align-items: center;
    }

    /* Theme Toggle Button */
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

    /* Reset and Help Buttons */
    .reset-button {
      padding: 10px 20px;
      background-color: #e74c3c;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      font-weight: bold;
      box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s, color 0.3s;
    }

    .reset-button:hover {
      background-color: #c0392b;
    }

    .help-button {
      padding: 10px 20px;
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      font-weight: bold;
      box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s, color 0.3s;
    }

    .help-button:hover {
      background-color: #2980b9;
    }

    /* Navigation Buttons */
    .nav-buttons {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-top: 10px;
      flex-wrap: wrap;
    }

    .nav-buttons a {
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-size: 14px;
      font-weight: bold;
      color: white;
      transition: background-color 0.3s;
    }

    .nav-buttons a.home,
    .nav-buttons a.mouse-test,
    .nav-buttons a.privacy-policy,
    .nav-buttons a.disclaimer,
    .nav-buttons a.about-us {
      background-color: #f39c12; /* Same color for first 5 buttons */
    }

    .nav-buttons a.buy-keyboard,
    .nav-buttons a.buy-mouse {
      background-color: #f1c40f; /* Different color for Buy buttons */
    }

    .nav-buttons a:hover {
      opacity: 0.9;
    }

    /* Homepage */
    .homepage {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      margin-top: 10px;
      margin-left: 150px;
      margin-right: 150px;
    }

    .homepage h2 {
      font-size: 2rem;
      margin-bottom: 20px;
      color: var(--primary-color);
    }

    .homepage p {
      font-size: 1.2rem;
      max-width: 800px;
      margin-bottom: 30px;
      line-height: 1.6;
    }

    /* Keyboard Tester Section */
    .keyboard-tester {
      padding: 20px;
    }

    .container {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .main-keyboard {
      display: flex;
      gap: 5px;
      flex-wrap: nowrap;
      justify-content: center;
      align-items: flex-start;
      max-width: 100%;
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
      padding: 8px;
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

    /* Larger Enter and Shift Keys */
    .key.enter, .key.shift { width: 120px; }
    .key.tab, .key.caps { width: 75px; }
    .key.backspace { width: 100px; }
    .key.zero { width: 90px; }
    .key.backslash { width: 70px; }

    /* Function Keys Row */
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
    .key[data-key="Escape"] {
      margin-right: 20px;
    }
    .key[data-key="F4"] {
      margin-right: 20px;
    }
    .key[data-key="F8"] {
      margin-right: 20px;
    }

    /* Navigation Cluster */
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
      margin-top: 45px;
      position: relative;
    }

    [data-key="ArrowUp"] { grid-area: up; }
    [data-key="ArrowLeft"] { grid-area: left; }
    [data-key="ArrowDown"] { grid-area: down; }
    [data-key="ArrowRight"] { grid-area: right; }

    /* Numpad */
    .numpad {
      display: flex;
      flex-direction: column;
      gap: 5px;
      align-items: flex-start;
      padding: 20px;
      background-color: var(--keyboard-bg);
      border-radius: 15px;
      position: relative;
      padding-top: 56px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .numpad .row {
      display: flex;
      gap: 5px;
      padding-bottom: 6px;
      align-items: flex-start;
    }
    .arrow-key { width: 30px; height: 30px; }
    .numpad .key {
      width: 30px;
      height: 30px;
      display: flex;
      justify-content: center;
      align-items: center;
      border: 1px solid var(--key-border);
    }
    .numpad .tall-key {
      height: 87px;
    }
    .numpad .zero {
      width: 85px;
    }
    .numpad [data-key="NumpadAdd"] {
      height: 87px;
      margin-left: 2px;
    }
    .numpad [data-key="NumpadEnter"] {
      height: 87px;
      margin-left: 2px;
      position: relative;
    }
    .numpad [data-key="Numpad0"] {
      width: 85px;
    }

    /* Adjustments for 7,8,9 row */
    .numpad .row:nth-child(2) {
      margin-bottom: 1px;
    }

    /* Indicator Lights */
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

    /* Print Screen, Scroll Lock, Pause Keys */
    .top-right-keys {
      display: flex;
      gap: 5px;
      margin-bottom: 10px;
    }

    /* Digits and Vertical Keys Container */
    .digits-and-vertical-keys {
      display: flex;
      gap: 5px;
    }

    /* Vertical Keys */
    .vertical-keys {
      display: flex;
      flex-direction: column;
      gap: 2px;
    }

    .key.tall {
      height: 87px;
    }

    /* Text Box */
    .text-box {
      width: 100%;
      padding: 10px;
      background-color: var(--text-box-bg);
      border-radius: 8px;
      color: var(--text-box-text);
      font-size: 16px;
      box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
      margin-bottom: 20px;
      text-align: center;
    }

    /* Guidelines Section */
    .guidelines {
      margin-top: 20px;
      padding: 20px;
      margin-left: 150px;
      margin-right: 150px;
      margin-bottom: 20px;
      background-color: var(--keyboard-bg);
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
      display: block;
    }

    .guidelines h3 {
      margin-top: 0;
      color: var(--primary-color);
    }

    .guidelines p {
      line-height: 1.6;
    }

    /* Key Count */
    .key-count {
      position: absolute;
      bottom: 2px;
      right: 2px;
      font-size: 10px;
      color: var(--key-text);
    }
  </style>
</head>
<body>
  <script type="text/javascript">
    function setAttributeOnload(object, attribute, val) {
      if(window.addEventListener) {
        window.addEventListener('load',
          function(){ object[attribute] = val; }, false);
      } else {
        window.attachEvent('onload', function(){ object[attribute] = val; });
      }
    }
  </script>

  <!-- Header -->
  <header>
    <h1>Online-Tastaturprüfer</h1>
    <nav>
      <button class="help-button" id="help-button">Hilfe</button>
      <div class="theme-toggle" id="theme-toggle"></div>
    </nav>
  </header>

  <!-- Navigation Buttons -->
  <div class="nav-buttons">
    <a href="https://www.keyboardtester.click/" class="home">Startseite</a>
    <a href="https://www.keyboardtester.click/mouse-test.html" class="mouse-test">Maus-Test</a>
    <a href="https://www.keyboardtester.click/privacy-policy.html" class="privacy-policy">Datenschutz</a>
    <a href="https://www.keyboardtester.click/disclaimer.html" class="disclaimer">Haftungsausschluss</a>
    <a href="https://www.keyboardtester.click/about-us.html" class="about-us">Über Uns</a>
    <a href="https://www.amazon.com/s?k=keyboard" class="buy-keyboard" target="_blank">Neue Tastatur auf Amazon kaufen</a>
    <a href="https://www.amazon.com/s?k=mouse" class="buy-mouse" target="_blank">Neue Maus auf Amazon kaufen</a>
  </div>

  <!-- Keyboard Tester Section -->
  <div class="keyboard-tester" id="keyboard-tester">
    <!-- Text Box and Reset Button -->
    <div style="display: flex; align-items: center; justify-content: center; gap: 30px; margin-bottom: 5px;">
      <div><textarea class="text-box" id="key-history" rows="4" cols="80"></textarea></div>
      <button class="reset-button" id="reset-button">Zurücksetzen</button>
    </div>

    <div class="container">
      <div class="main-keyboard">
        <!-- Main Keyboard -->
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

          <!-- Main Keyboard Rows -->
          <div class="row">
            <div class="key" data-key="Backquote">^</div>
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
            <div class="key" data-key="Minus">ß</div>
            <div class="key" data-key="Equal">´</div>
            <div class="key special backspace" data-key="Backspace">←</div>
          </div>

          <div class="row">
            <div class="key special tab" data-key="Tab">Tab</div>
            <div class="key" data-key="KeyQ">Q</div>
            <div class="key" data-key="KeyW">W</div>
            <div class="key" data-key="KeyE">E</div>
            <div class="key" data-key="KeyR">R</div>
            <div class="key" data-key="KeyT">T</div>
            <div class="key" data-key="KeyY">Z</div>
            <div class="key" data-key="KeyU">U</div>
            <div class="key" data-key="KeyI">I</div>
            <div class="key" data-key="KeyO">O</div>
            <div class="key" data-key="KeyP">P</div>
            <div class="key" data-key="BracketLeft">Ü</div>
            <div class="key" data-key="BracketRight">+</div>
            <div class="key special backslash" data-key="Backslash">#</div>
          </div>

          <div class="row">
            <div class="key special caps" data-key="CapsLock">Caps</div>
            <div class="key" data-key="KeyA">A</div>
            <div class="key" data-key="KeyS">S</div>
            <div class="key" data-key="KeyD">D</div>
            <div class="key" data-key="KeyF">F</div>
            <div class="key" data-key="KeyG">G</div>
            <div class="key" data-key="KeyH">H</div>
            <div class="key" data-key="KeyJ">J</div>
            <div class="key" data-key="KeyK">K</div>
            <div class="key" data-key="KeyL">L</div>
            <div class="key" data-key="Semicolon">Ö</div>
            <div class="key" data-key="Quote">Ä</div>
            <div class="key special enter" data-key="Enter">↵ Enter</div>
          </div>

          <div class="row">
            <div class="key special shift" data-key="ShiftLeft">Shift</div>
            <div class="key" data-key="KeyZ">Y</div>
            <div class="key" data-key="KeyX">X</div>
            <div class="key" data-key="KeyC">C</div>
            <div class="key" data-key="KeyV">V</div>
            <div class="key" data-key="KeyB">B</div>
            <div class="key" data-key="KeyN">N</div>
            <div class="key" data-key="KeyM">M</div>
            <div class="key" data-key="Comma">,</div>
            <div class="key" data-key="Period">.</div>
            <div class="key" data-key="Slash">-</div>
            <div class="key special shift" data-key="ShiftRight">Shift</div>
          </div>

          <div class="row">
            <div class="key special" data-key="ControlLeft">Strg</div>
            <div class="key special" data-key="MetaLeft">Win</div>
            <div class="key special" data-key="AltLeft">Alt</div>
            <div class="key space" data-key="Space"> </div>
            <div class="key special" data-key="AltRight">Alt</div>
            <div class="key special" data-key="MetaRight">Win</div>
            <div class="key special" data-key="ContextMenu">☰</div>
            <div class="key special" data-key="ControlRight">Strg</div>
          </div>
        </div>

        <!-- Navigation Cluster -->
        <div class="nav-cluster">
          <div class="top-right-keys">
            <div class="key special" data-key="PrintScreen" style="font-size:12px;text-align:center;">Druck</div>
            <div class="key special" data-key="ScrollLock" style="font-size:12px;text-align:center;">Rollen</div>
            <div class="key special" data-key="Pause" style="font-size:12px;text-align:center;">Pause</div>
          </div>
          <div class="nav-keys">
            <div class="key special" data-key="Insert" style="font-size:12px;text-align:center;">Einfg</div>
            <div class="key special" data-key="Home" style="font-size:12px;text-align:center;">Pos1</div>
            <div class="key special" data-key="PageUp" style="font-size:12px;text-align:center;">Bild↑</div>
          </div>
          <div class="nav-keys">
            <div class="key special" data-key="Delete" style="font-size:12px;text-align:center;">Entf</div>
            <div class="key special" data-key="End" style="font-size:12px;text-align:center;">Ende</div>
            <div class="key special" data-key="PageDown" style="font-size:12px;text-align:center;">Bild↓</div>
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
            <div class="key special" data-key="NumLock" style="font-size:12px;text-align:center;">Num</div>
            <div class="key special" data-key="NumpadDivide">/</div>
            <div class="key special" data-key="NumpadMultiply">*</div>
            <div class="key special" data-key="NumpadSubtract">-</div>
          </div>
          <div class="digits-and-vertical-keys">
            <!-- Digits -->
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
                <div class="key" data-key="NumpadDecimal">,</div>
              </div>
            </div>

            <!-- Vertical Keys -->
            <div class="vertical-keys">
              <div class="key tall" data-key="NumpadAdd">+</div>
              <div class="key tall" data-key="NumpadEnter">Enter</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Guidelines Section -->
  <div class="guidelines" id="guidelines">
    <h3>Umfassende Anleitung</h3>
    <p>
      <strong>Willkommen beim Online-Tastaturprüfer!</strong> Dieses Tool wurde entwickelt, um die Funktionalität Ihrer Tastatur zu testen und sicherzustellen, dass alle Tasten einwandfrei funktionieren. Im Folgenden finden Sie detaillierte Anweisungen, Tipps und Erklärungen, um das Beste aus diesem Tool herauszuholen.
    </p>

    <h4>Wie man den Tastaturprüfer verwendet</h4>
    <p>
      Unser <a href="https://www.keyboardtester.click/" target="_blank">Tastaturprüfer</a> ist einfach und intuitiv. Befolgen Sie diese Schritte, um zu beginnen:
    </p>
    <ul>
      <li><strong>Drücken Sie eine beliebige Taste:</strong> Beginnen Sie, indem Sie eine beliebige Taste auf Ihrer physischen Tastatur drücken. Die entsprechende Taste auf der virtuellen Tastatur leuchtet auf.</li>
      <li><strong>Überprüfen Sie den Tastenzustand:</strong> Jeder Tastendruck ändert die Farbe der Taste, um anzuzeigen, wie oft sie gedrückt wurde.</li>
      <li><strong>Zurücksetzen:</strong> Verwenden Sie die Schaltfläche <strong>Zurücksetzen</strong>, um alle Tastendrücke zu löschen und von vorne zu beginnen.</li>
      <li><strong>Thema wechseln:</strong> Wechseln Sie zwischen den Themen <strong>hell</strong> und <strong>dunkel</strong> für ein angenehmes Seherlebnis.</li>
    </ul>

    <h4>Verstehen der Tastenfarben</h4>
    <p>
      Jeder Tastendruck ändert die Farbe der Taste, um anzuzeigen, wie oft sie gedrückt wurde. Hier ist, was die Farben bedeuten:
    </p>
    <div style="display: flex; gap: 10px; margin: 20px 0;">
      <button style="background-color: #1abc9c; color: white; border: none; padding: 10px 20px; border-radius: 5px;">1. Druck</button>
      <button style="background-color: #f1c40f; color: white; border: none; padding: 10px 20px; border-radius: 5px;">2. Druck</button>
      <button style="background-color: #e67e22; color: white; border: none; padding: 10px 20px; border-radius: 5px;">3. Druck</button>
      <button style="background-color: #e74c3c; color: white; border: none; padding: 10px 20px; border-radius: 5px;">4. Druck</button>
      <button style="background-color: #9b59b6; color: white; border: none; padding: 10px 20px; border-radius: 5px;">5+ Drücke</button>
    </div>
    <ul>
      <li><strong>1. Druck:</strong> Die Taste wird <span style="color: #1abc9c;">grün</span>.</li>
      <li><strong>2. Druck:</strong> Die Taste wird <span style="color: #f1c40f;">gelb</span>.</li>
      <li><strong>3. Druck:</strong> Die Taste wird <span style="color: #e67e22;">orange</span>.</li>
      <li><strong>4. Druck:</strong> Die Taste wird <span style="color: #e74c3c;">rot</span>.</li>
      <li><strong>5+ Drücke:</strong> Die Taste wird <span style="color: #9b59b6;">lila</span>.</li>
    </ul>

    <h4>Testen von Sondertasten</h4>
    <p>
      Unser <a href="https://www.keyboardtester.click/" target="_blank">Tastaturprüfer</a> ermöglicht es Ihnen, die Funktionalität von Sondertasten zu testen, einschließlich:
    </p>
    <ul>
      <li><strong>Caps Lock:</strong> Überprüfen Sie, ob die Caps-Lock-Taste korrekt funktioniert. Die Anzeigeleuchte leuchtet, wenn sie aktiviert ist.</li>
      <li><strong>Num Lock:</strong> Testen Sie die Num-Lock-Taste, um sicherzustellen, dass sie korrekt funktioniert. Die Anzeigeleuchte leuchtet, wenn sie aktiviert ist.</li>
      <li><strong>Scroll Lock:</strong> Überprüfen Sie die Funktionalität der Scroll-Lock-Taste. Die Anzeigeleuchte leuchtet, wenn sie aktiviert ist.</li>
      <li><strong>Druck:</strong> Testen Sie die Druck-Taste, um sicherzustellen, dass sie Ihren Bildschirm korrekt erfasst.</li>
      <li><strong>Pfeiltasten:</strong> Überprüfen Sie die Funktionalität der Pfeiltasten (↑, ←, ↓, →).</li>
    </ul>

    <h4>Häufig gestellte Fragen (FAQs)</h4>
    <p>
      Hier sind einige häufig gestellte Fragen und Antworten zur Verwendung des <a href="https://www.keyboardtester.click/" target="_blank">Tastaturprüfers</a>:
    </p>
    <ul>
      <li>
        <strong>Was ist ein Tastaturprüfer?</strong><br>
        Ein Tastaturprüfer ist ein Tool, mit dem Sie die Funktionalität Ihrer Tastatur testen können. Es hilft Ihnen, defekte Tasten zu identifizieren und sicherzustellen, dass Ihre Tastatur einwandfrei funktioniert.
      </li>
      <li>
        <strong>Wie verwende ich den Tastaturprüfer?</strong><br>
        Drücken Sie einfach eine beliebige Taste auf Ihrer physischen Tastatur, und die entsprechende Taste auf der virtuellen Tastatur leuchtet auf. Sie können auch den Status von Sondertasten wie <strong>Caps Lock</strong>, <strong>Num Lock</strong> und <strong>Scroll Lock</strong> überprüfen.
      </li>
      <li>
        <strong>Kann ich dieses Tool mit jeder Tastatur verwenden?</strong><br>
        Ja, unser Tastaturprüfer ist mit allen Arten von Tastaturen kompatibel, einschließlich <strong>mechanischer</strong>, <strong>Membran</strong>- und <strong>Laptop-Tastaturen</strong>.
      </li>
      <li>
        <strong>Was bedeuten die Tastenfarben?</strong><br>
        Jeder Tastendruck ändert die Farbe der Taste, um anzuzeigen, wie oft sie gedrückt wurde. Weitere Informationen finden Sie im Abschnitt <strong>Verstehen der Tastenfarben</strong>.
      </li>
    </ul>

    <h4>Tipps zur Wartung Ihrer Tastatur</h4>
    <p>
      Um sicherzustellen, dass Ihre Tastatur in gutem Zustand bleibt, befolgen Sie diese Tipps:
    </p>
    <ul>
      <li><strong>Reinigen Sie regelmäßig:</strong> Staub und Schmutz können die Leistung Ihrer Tastatur beeinträchtigen. Reinigen Sie sie regelmäßig mit einem weichen Pinsel oder Druckluft.</li>
      <li><strong>Vermeiden Sie Verschüttungen:</strong> Halten Sie Flüssigkeiten von Ihrer Tastatur fern, um Schäden zu vermeiden.</li>
      <li><strong>Überprüfen Sie auf Verschleiß:</strong> Ersetzen Sie abgenutzte Tasten oder Schalter, um eine optimale Leistung zu gewährleisten.</li>
      <li><strong>Testen Sie häufig:</strong> Verwenden Sie unseren <a href="https://www.keyboardtester.click/" target="_blank">Tastaturprüfer</a> regelmäßig, um sicherzustellen, dass alle Tasten korrekt funktionieren.</li>
    </ul>

    <h4>Entdecken Sie weitere Tools und Ressourcen</h4>
    <p>
      Neben dem Testen Ihrer Tastatur bieten wir weitere Tools und Ressourcen, um Ihr Erlebnis zu verbessern:
    </p>
    <ul>
      <li><a href="https://www.keyboardtester.click/mouse-test.html" target="_blank">Maus-Test</a>: Testen Sie die Funktionalität Ihrer Maus und stellen Sie sicher, dass sie einwandfrei funktioniert.</li>
      <li><a href="https://www.keyboardtester.click/privacy-policy.html" target="_blank">Datenschutz</a>: Erfahren Sie, wie wir Ihre Daten und Privatsphäre schützen.</li>
      <li><a href="https://www.keyboardtester.click/disclaimer.html" target="_blank">Haftungsausschluss</a>: Lesen Sie unseren Haftungsausschluss, um die Nutzungsbedingungen unserer Tools zu verstehen.</li>
      <li><a href="https://www.keyboardtester.click/about-us.html" target="_blank">Über Uns</a>: Erfahren Sie mehr über unsere Mission und das Team hinter KeyboardTester.click.</li>
      <li><a href="https://www.amazon.com/s?k=keyboard" target="_blank">Neue Tastatur auf Amazon kaufen</a>: Aktualisieren Sie Ihre Tastatur mit einer neuen von Amazon.</li>
      <li><a href="https://www.amazon.com/s?k=mouse" target="_blank">Neue Maus auf Amazon kaufen</a>: Finden Sie die perfekte Maus für Ihre Bedürfnisse auf Amazon.</li>
    </ul>

    <h4>SEO-optimierte Schlüsselwörter</h4>
    <p>
      Unser Tastaturprüfer wurde entwickelt, um Ihnen bei den folgenden Schlüsselwörtern zu helfen:
    </p>
    <ul>
      <li><strong>Tastaturprüfer</strong></li>
      <li><strong>Tastatur testen</strong></li>
      <li><strong>Tasten überprüfen</strong></li>
      <li><strong>Online-Tastaturtest</strong></li>
      <li><strong>Caps Lock-Test</strong></li>
      <li><strong>Num Lock-Test</strong></li>
      <li><strong>Scroll Lock-Test</strong></li>
      <li><strong>Tastaturfunktionalität testen</strong></li>
      <li><strong>Tastatur-Fehlerbehebungs-Tool</strong></li>
    </ul>

    <h4>Beginnen Sie noch heute</h4>
    <p>
      Lassen Sie sich nicht von einer defekten Tastatur aufhalten. Verwenden Sie unseren <a href="https://www.keyboardtester.click/" target="_blank">Online-Tastaturprüfer</a>, um sicherzustellen, dass Ihre Tastatur einwandfrei funktioniert. Egal, ob Sie ein <strong>Spieler</strong>, <strong>Programmierer</strong> oder <strong>Gelegenheitsnutzer</strong> sind, unser Tool ist hier, um Ihnen zu helfen. Drücken Sie eine beliebige Taste, um zu beginnen!
    </p>

    <h4>Benötigen Sie Hilfe?</h4>
    <p>
      Wenn Sie Fragen haben oder Hilfe benötigen, klicken Sie auf die Schaltfläche <strong>Hilfe</strong>, um detaillierte Anweisungen zu erhalten. Unsere umfassende Anleitung führt Sie durch alles, was Sie über die Verwendung des Tastaturprüfers wissen müssen. Weitere Informationen finden Sie auf unserer Seite <a href="https://www.keyboardtester.click/about-us.html" target="_blank">Über Uns</a> oder lesen Sie unsere <a href="https://www.keyboardtester.click/privacy-policy.html" target="_blank">Datenschutzrichtlinie</a> und unseren <a href="https://www.keyboardtester.click/disclaimer.html" target="_blank">Haftungsausschluss</a>.
    </p>
  </div>

  <script>
    const keyHistory = document.getElementById('key-history');
    const keyPressCount = {};

    // Indicator Lights
    const capsLockLight = document.getElementById('caps-lock-light');
    const scrollLockLight = document.getElementById('scroll-lock-light');
    const numLockLight = document.getElementById('num-lock-light');

    document.addEventListener('keydown', (event) => {
      const key = event.code;
      const keyElement = document.querySelector(`[data-key="${key}"]`);

      if (keyElement) {
        event.preventDefault();
        keyPressCount[key] = (keyPressCount[key] || 0) + 1;
        const activeLevel = (keyPressCount[key] - 1) % 5 + 1;

        keyElement.className = keyElement.className
          .replace(/active-\d/g, '') + ` active-${activeLevel}`;

        // Update the key count display
        let keyCountElement = keyElement.querySelector('.key-count');
        if (!keyCountElement) {
          keyCountElement = document.createElement('div');
          keyCountElement.className = 'key-count';
          keyElement.appendChild(keyCountElement);
        }
        keyCountElement.textContent = keyPressCount[key];

        const displayKey = event.key === ' ' ? '␣' :
                          event.key.length > 1 ? `[${event.code}]` :
                          event.key;
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

    // Reset Button Functionality
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

      // Reset the keyPressCount object
      for (const key in keyPressCount) {
        delete keyPressCount[key];
      }
    });

  <?php include 'tools.php'; ?>

  <?php include 'footer.php'; ?>

  <script type="text/javascript">
    // Help Button Functionality
    const helpButton = document.getElementById('help-button');
    const guidelinesSection = document.getElementById('guidelines');
    if (helpButton && guidelinesSection) {
      helpButton.addEventListener('click', () => {
        guidelinesSection.scrollIntoView({ behavior: 'smooth' });
      });
    }

    // Theme Toggle Functionality
    const themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
      themeToggle.addEventListener('click', () => {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        if (currentTheme === 'dark') {
          document.documentElement.setAttribute('data-theme', 'light');
        } else {
          document.documentElement.setAttribute('data-theme', 'dark');
        }
      });
    }
  </script>
</body>
</html>

