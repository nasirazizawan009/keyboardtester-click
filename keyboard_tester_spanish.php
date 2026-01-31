<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="es">
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
  <?php include 'tools/keyboard_tester_spanish_guideline.php'; ?>
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

  <?php include 'header.php'; ?>


  <!-- Keyboard Tester Section -->
  <div class="keyboard-tester" id="keyboard-tester">
    <!-- Text Box and Reset Button -->
    <div style="display: flex; align-items: center; justify-content: center; gap: 30px; margin-bottom: 5px;">
      <div><textarea class="text-box" id="key-history" rows="4" cols="80"></textarea></div>
      <button class="reset-button" id="reset-button">Reiniciar</button>
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
            <div class="key" data-key="Backquote">º</div>
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
            <div class="key" data-key="Minus">'</div>
            <div class="key" data-key="Equal">¡</div>
            <div class="key special backspace" data-key="Backspace">Retroceso</div>
          </div>

          <div class="row">
            <div class="key special tab" data-key="Tab">Tab</div>
            <div class="key" data-key="KeyQ">Q</div>
            <div class="key" data-key="KeyW">W</div>
            <div class="key" data-key="KeyE">E</div>
            <div class="key" data-key="KeyR">R</div>
            <div class="key" data-key="KeyT">T</div>
            <div class="key" data-key="KeyY">Y</div>
            <div class="key" data-key="KeyU">U</div>
            <div class="key" data-key="KeyI">I</div>
            <div class="key" data-key="KeyO">O</div>
            <div class="key" data-key="KeyP">P</div>
            <div class="key" data-key="BracketLeft">`</div>
            <div class="key" data-key="BracketRight">+</div>
            <div class="key special backslash" data-key="Backslash">Ç</div>
          </div>

          <div class="row">
            <div class="key special caps" data-key="CapsLock">Bloq Mayús</div>
            <div class="key" data-key="KeyA">A</div>
            <div class="key" data-key="KeyS">S</div>
            <div class="key" data-key="KeyD">D</div>
            <div class="key" data-key="KeyF">F</div>
            <div class="key" data-key="KeyG">G</div>
            <div class="key" data-key="KeyH">H</div>
            <div class="key" data-key="KeyJ">J</div>
            <div class="key" data-key="KeyK">K</div>
            <div class="key" data-key="KeyL">L</div>
            <div class="key" data-key="Semicolon">Ñ</div>
            <div class="key" data-key="Quote">´</div>
            <div class="key special enter" data-key="Enter">↵ Entrar</div>
          </div>

          <div class="row">
            <div class="key special shift" data-key="ShiftLeft">Shift</div>
            <div class="key" data-key="KeyZ">Z</div>
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
            <div class="key special" data-key="ControlLeft">Ctrl</div>
            <div class="key special" data-key="MetaLeft">Win</div>
            <div class="key special" data-key="AltLeft">Alt</div>
            <div class="key space" data-key="Space"> </div>
            <div class="key special" data-key="AltRight">Alt</div>
            <div class="key special" data-key="MetaRight">Win</div>
            <div class="key special" data-key="ContextMenu">☰</div>
            <div class="key special" data-key="ControlRight">Ctrl</div>
          </div>
        </div>

        <!-- Navigation Cluster -->
        <div class="nav-cluster">
          <div class="top-right-keys">
            <div class="key special" data-key="PrintScreen" style="font-size:12px;text-align:center;">Impr Pant</div>
            <div class="key special" data-key="ScrollLock" style="font-size:12px;text-align:center;">Bloq Despl</div>
            <div class="key special" data-key="Pause" style="font-size:12px;text-align:center;">Pausa</div>
          </div>
          <div class="nav-keys">
            <div class="key special" data-key="Insert" style="font-size:12px;text-align:center;">Insertar</div>
            <div class="key special" data-key="Home" style="font-size:12px;text-align:center;">Inicio</div>
            <div class="key special" data-key="PageUp" style="font-size:12px;text-align:center;">Re Pág</div>
          </div>
          <div class="nav-keys">
            <div class="key special" data-key="Delete" style="font-size:12px;text-align:center;">Supr</div>
            <div class="key special" data-key="End" style="font-size:12px;text-align:center;">Fin</div>
            <div class="key special" data-key="PageDown" style="font-size:12px;text-align:center;">Av Pág</div>
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
            <div class="key special" data-key="NumLock" style="font-size:12px;text-align:center;">Bloq Num</div>
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
                <div class="key" data-key="NumpadDecimal">.</div>
              </div>
            </div>

            <!-- Vertical Keys -->
            <div class="vertical-keys">
              <div class="key tall" data-key="NumpadAdd">+</div>
              <div class="key tall" data-key="NumpadEnter">Entrar</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Guidelines Section -->
  <div class="guidelines" id="guidelines">
    <h3>Guía Completa</h3>
    <p>
      <strong>¡Bienvenido al Probador de Teclado en Línea!</strong> Esta herramienta está diseñada para ayudarte a probar la funcionalidad de tu teclado y asegurarte de que todas las teclas funcionen perfectamente. A continuación, encontrarás instrucciones detalladas, consejos y explicaciones para aprovechar al máximo esta herramienta.
    </p>

    <h4>Cómo Usar el Probador de Teclado</h4>
    <p>
      Nuestro <a href="https://www.keyboardtester.click/" target="_blank">probador de teclado</a> es simple e intuitivo. Sigue estos pasos para comenzar:
    </p>
    <ul>
      <li><strong>Presiona Cualquier Tecla:</strong> Comienza presionando cualquier tecla en tu teclado físico. La tecla correspondiente en el teclado virtual se iluminará.</li>
      <li><strong>Verifica el Estado de las Teclas:</strong> Cada vez que presiones una tecla, cambiará de color para indicar cuántas veces ha sido presionada.</li>
      <li><strong>Reiniciar:</strong> Usa el botón <strong>Reiniciar</strong> para borrar todas las pulsaciones y comenzar de nuevo.</li>
      <li><strong>Cambiar Tema:</strong> Cambia entre los temas <strong>claro</strong> y <strong>oscuro</strong> para una experiencia visual cómoda.</li>
    </ul>

    <h4>Entendiendo los Colores de las Teclas</h4>
    <p>
      Cada vez que presionas una tecla, cambia de color para indicar cuántas veces ha sido presionada. Aquí está lo que significan los colores:
    </p>
    <div style="display: flex; gap: 10px; margin: 20px 0;">
      <button style="background-color: #1abc9c; color: white; border: none; padding: 10px 20px; border-radius: 5px;">1ª Pulsación</button>
      <button style="background-color: #f1c40f; color: white; border: none; padding: 10px 20px; border-radius: 5px;">2ª Pulsación</button>
      <button style="background-color: #e67e22; color: white; border: none; padding: 10px 20px; border-radius: 5px;">3ª Pulsación</button>
      <button style="background-color: #e74c3c; color: white; border: none; padding: 10px 20px; border-radius: 5px;">4ª Pulsación</button>
      <button style="background-color: #9b59b6; color: white; border: none; padding: 10px 20px; border-radius: 5px;">5+ Pulsaciones</button>
    </div>
    <ul>
      <li><strong>1ª Pulsación:</strong> La tecla se vuelve <span style="color: #1abc9c;">verde</span>.</li>
      <li><strong>2ª Pulsación:</strong> La tecla se vuelve <span style="color: #f1c40f;">amarilla</span>.</li>
      <li><strong>3ª Pulsación:</strong> La tecla se vuelve <span style="color: #e67e22;">naranja</span>.</li>
      <li><strong>4ª Pulsación:</strong> La tecla se vuelve <span style="color: #e74c3c;">roja</span>.</li>
      <li><strong>5+ Pulsaciones:</strong> La tecla se vuelve <span style="color: #9b59b6;">morada</span>.</li>
    </ul>

    <h4>Probando Teclas Especiales</h4>
    <p>
      Nuestro <a href="https://www.keyboardtester.click/" target="_blank">probador de teclado</a> te permite probar la funcionalidad de teclas especiales, incluyendo:
    </p>
    <ul>
      <li><strong>Bloq Mayús:</strong> Verifica si la tecla Bloq Mayús funciona correctamente. La luz indicadora se encenderá cuando esté activada.</li>
      <li><strong>Bloq Num:</strong> Prueba la tecla Bloq Num para asegurarte de que funciona correctamente. La luz indicadora se encenderá cuando esté activada.</li>
      <li><strong>Bloq Despl:</strong> Verifica la funcionalidad de la tecla Bloq Despl. La luz indicadora se encenderá cuando esté activada.</li>
      <li><strong>Impr Pant:</strong> Prueba la tecla Impr Pant para asegurarte de que captura correctamente tu pantalla.</li>
      <li><strong>Teclas de Flecha:</strong> Verifica la funcionalidad de las teclas de flecha (↑, ←, ↓, →).</li>
    </ul>

    <h4>Preguntas Frecuentes (FAQs)</h4>
    <p>
      Aquí tienes algunas preguntas comunes y respuestas sobre el uso del <a href="https://www.keyboardtester.click/" target="_blank">probador de teclado</a>:
    </p>
    <ul>
      <li>
        <strong>¿Qué es un Probador de Teclado?</strong><br>
        Un probador de teclado es una herramienta que te permite probar la funcionalidad de tu teclado. Te ayuda a identificar teclas que no funcionan correctamente y asegura que tu teclado esté en perfecto estado.
      </li>
      <li>
        <strong>¿Cómo Uso el Probador de Teclado?</strong><br>
        Simplemente presiona cualquier tecla en tu teclado físico, y la tecla correspondiente en el teclado virtual se iluminará. También puedes verificar el estado de teclas especiales como <strong>Bloq Mayús</strong>, <strong>Bloq Num</strong> y <strong>Bloq Despl</strong>.
      </li>
      <li>
        <strong>¿Puedo Usar Esta Herramienta con Cualquier Teclado?</strong><br>
        Sí, nuestro probador de teclado es compatible con todo tipo de teclados, incluyendo <strong>mecánicos</strong>, <strong>de membrana</strong> y <strong>teclados de portátil</strong>.
      </li>
      <li>
        <strong>¿Qué Significan los Colores de las Teclas?</strong><br>
        Cada vez que presionas una tecla, cambia de color para indicar cuántas veces ha sido presionada. Consulta la sección <strong>Entendiendo los Colores de las Teclas</strong> para más detalles.
      </li>
    </ul>

    <h4>Consejos para Mantener tu Teclado</h4>
    <p>
      Para asegurarte de que tu teclado se mantenga en buen estado, sigue estos consejos:
    </p>
    <ul>
      <li><strong>Limpia Regularmente:</strong> El polvo y los residuos pueden afectar el rendimiento de tu teclado. Límpialo regularmente con un cepillo suave o aire comprimido.</li>
      <li><strong>Evita Derrames:</strong> Mantén los líquidos alejados de tu teclado para evitar daños.</li>
      <li><strong>Revisa el Desgaste:</strong> Reemplaza las teclas o interruptores desgastados para mantener un rendimiento óptimo.</li>
      <li><strong>Prueba Frecuentemente:</strong> Usa nuestro <a href="https://www.keyboardtester.click/" target="_blank">probador de teclado</a> regularmente para asegurarte de que todas las teclas funcionan correctamente.</li>
    </ul>

    <h4>Explora Más Herramientas y Recursos</h4>
    <p>
      Además de probar tu teclado, ofrecemos otras herramientas y recursos para mejorar tu experiencia:
    </p>
    <ul>
      <li><a href="https://www.keyboardtester.click/mouse-test.html" target="_blank">Prueba de Ratón</a>: Prueba la funcionalidad de tu ratón y asegúrate de que funciona perfectamente.</li>
      <li><a href="https://www.keyboardtester.click/privacy-policy.html" target="_blank">Política de Privacidad</a>: Aprende cómo protegemos tus datos y privacidad.</li>
      <li><a href="https://www.keyboardtester.click/disclaimer.html" target="_blank">Descargo de Responsabilidad</a>: Lee nuestro descargo de responsabilidad para entender los términos de uso de nuestras herramientas.</li>
      <li><a href="https://www.keyboardtester.click/about-us.html" target="_blank">Sobre Nosotros</a>: Conoce más sobre nuestra misión y el equipo detrás de KeyboardTester.click.</li>
      <li><a href="https://www.amazon.com/s?k=keyboard" target="_blank">Comprar Teclado en Amazon</a>: Actualiza tu teclado con uno nuevo de Amazon.</li>
      <li><a href="https://www.amazon.com/s?k=mouse" target="_blank">Comprar Ratón en Amazon</a>: Encuentra el ratón perfecto para tus necesidades en Amazon.</li>
    </ul>

    <h4>Palabras Clave Optimizadas para SEO</h4>
    <p>
      Nuestro probador de teclado está diseñado para ayudarte con las siguientes palabras clave:
    </p>
    <ul>
      <li><strong>probador de teclado</strong></li>
      <li><strong>probar mi teclado</strong></li>
      <li><strong>verificar mis teclas</strong></li>
      <li><strong>prueba de teclado en línea</strong></li>
      <li><strong>prueba de Bloq Mayús</strong></li>
      <li><strong>prueba de Bloq Num</strong></li>
      <li><strong>prueba de Bloq Despl</strong></li>
      <li><strong>prueba de funcionalidad del teclado</strong></li>
      <li><strong>herramienta de solución de problemas del teclado</strong></li>
    </ul>

    <h4>Comienza Hoy</h4>
    <p>
      No dejes que un teclado defectuoso te frene. Usa nuestro <a href="https://www.keyboardtester.click/" target="_blank">probador de teclado en línea</a> para asegurarte de que tu teclado funciona perfectamente. Ya seas un <strong>jugador</strong>, <strong>programador</strong> o <strong>usuario casual</strong>, nuestra herramienta está aquí para ayudarte. ¡Presiona cualquier tecla para comenzar!
    </p>

    <h4>¿Necesitas Ayuda?</h4>
    <p>
      Si tienes alguna pregunta o necesitas asistencia, haz clic en el botón <strong>Ayuda</strong> para obtener instrucciones detalladas. Nuestra guía completa te guiará a través de todo lo que necesitas saber sobre el uso del probador de teclado. Para más información, visita nuestra página <a href="https://www.keyboardtester.click/about-us.html" target="_blank">Sobre Nosotros</a> o consulta nuestra <a href="https://www.keyboardtester.click/privacy-policy.html" target="_blank">Política de Privacidad</a> y <a href="https://www.keyboardtester.click/disclaimer.html" target="_blank">Descargo de Responsabilidad</a>.
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

  <script>
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

