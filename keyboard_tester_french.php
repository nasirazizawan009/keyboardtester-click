<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
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
  <?php include 'tools/keyboard_tester_french_guideline.php'; ?>
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

    .blog-button {
      padding: 10px 20px;
      background-color: #8e44ad;
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      font-weight: bold;
      box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
      transition: background-color 0.3s, color 0.3s;
    }

    .blog-button:hover {
      background-color: #7d3c98;
    }

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
      color: black;
      transition: background-color 0.3s;
    }

    .nav-buttons a.home,
    .nav-buttons a.mouse-test,
    .nav-buttons a.privacy-policy,
    .nav-buttons a.disclaimer,
    .nav-buttons a.about-us {
      background-color: #f39c12;
    }

    .nav-buttons a.buy-keyboard,
    .nav-buttons a.buy-mouse {
      background-color: #f1c40f;
    }

    .nav-buttons a:hover {
      opacity: 0.9;
    }

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

    .key.enter, .key.shift { width: 120px; }
    .key.tab, .key.caps { width: 75px; }
    .key.backspace { width: 100px; }
    .key.zero { width: 90px; }
    .key.backslash { width: 70px; }

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
      margin-top: 45px;
      position: relative;
    }

    [data-key="ArrowUp"] { grid-area: up; }
    [data-key="ArrowLeft"] { grid-area: left; }
    [data-key="ArrowDown"] { grid-area: down; }
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
    .indicator-light.active { background-color: var(--key-active-1); }

    .top-right-keys {
      display: flex;
      gap: 5px;
      margin-bottom: 10px;
    }

    .digits-and-vertical-keys { display: flex; gap: 5px; }

    .vertical-keys { display: flex; flex-direction: column; gap: 2px; }

    .key.tall { height: 87px; }

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

    .guidelines h3 { margin-top: 0; color: var(--primary-color); }

    .guidelines p { line-height: 1.6; }

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
  <?php include 'header.php'; ?>

  <!-- Navigation Buttons -->
  <div class="nav-buttons">
    <a href="https://www.keyboardtester.click/" class="home">Accueil</a>
    <a href="https://www.keyboardtester.click/mouse-test.html" class="mouse-test">Test de Souris</a>
    <a href="https://www.keyboardtester.click/privacy-policy.html" class="privacy-policy">Politique de Confidentialité</a>
    <a href="https://www.keyboardtester.click/disclaimer.html" class="disclaimer">Avertissement</a>
    <a href="https://www.keyboardtester.click/about-us.html" class="about-us">À Propos</a>
    <a href="https://www.amazon.fr/s?k=clavier" class="buy-keyboard" target="_blank">Acheter un Nouveau Clavier sur Amazon</a>
    <a href="https://www.amazon.fr/s?k=souris" class="buy-mouse" target="_blank">Acheter une Nouvelle Souris sur Amazon</a>
  </div>

  <!-- Keyboard Tester Section -->
  <div class="keyboard-tester" id="keyboard-tester">
    <div style="display: flex; align-items: center; justify-content: center; gap: 30px; margin-bottom: 5px;">
      <div><textarea class="text-box" id="key-history" rows="4" cols="80"></textarea></div>
      <button class="reset-button" id="reset-button">Réinitialiser</button>
    </div>

    <div class="container">
      <div class="main-keyboard">
        <!-- Main Keyboard (AZERTY Layout) -->
        <div class="keyboard">
          <div class="row function-row">
            <div class="key special" data-key="Escape">Échap</div>
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
            <div class="key" data-key="Backquote">²</div>
            <div class="key" data-key="Digit1">&</div>
            <div class="key" data-key="Digit2">é</div>
            <div class="key" data-key="Digit3">"</div>
            <div class="key" data-key="Digit4">'</div>
            <div class="key" data-key="Digit5">(</div>
            <div class="key" data-key="Digit6">-</div>
            <div class="key" data-key="Digit7">è</div>
            <div class="key" data-key="Digit8">_</div>
            <div class="key" data-key="Digit9">ç</div>
            <div class="key" data-key="Digit0">à</div>
            <div class="key" data-key="Minus">)</div>
            <div class="key" data-key="Equal">=</div>
            <div class="key special backspace" data-key="Backspace">Effacer</div>
          </div>

          <div class="row">
            <div class="key special tab" data-key="Tab">Tab</div>
            <div class="key" data-key="KeyA">A</div>
            <div class="key" data-key="KeyZ">Z</div>
            <div class="key" data-key="KeyE">E</div>
            <div class="key" data-key="KeyR">R</div>
            <div class="key" data-key="KeyT">T</div>
            <div class="key" data-key="KeyY">Y</div>
            <div class="key" data-key="KeyU">U</div>
            <div class="key" data-key="KeyI">I</div>
            <div class="key" data-key="KeyO">O</div>
            <div class="key" data-key="KeyP">P</div>
            <div class="key" data-key="BracketLeft">^</div>
            <div class="key" data-key="BracketRight">$</div>
            <div class="key special backslash" data-key="Backslash">*</div>
          </div>

          <div class="row">
            <div class="key special caps" data-key="CapsLock">Verr Maj</div>
            <div class="key" data-key="KeyQ">Q</div>
            <div class="key" data-key="KeyS">S</div>
            <div class="key" data-key="KeyD">D</div>
            <div class="key" data-key="KeyF">F</div>
            <div class="key" data-key="KeyG">G</div>
            <div class="key" data-key="KeyH">H</div>
            <div class="key" data-key="KeyJ">J</div>
            <div class="key" data-key="KeyK">K</div>
            <div class="key" data-key="KeyL">L</div>
            <div class="key" data-key="Semicolon">M</div>
            <div class="key" data-key="Quote">ù</div>
            <div class="key special enter" data-key="Enter">↵ Entrée</div>
          </div>

          <div class="row">
            <div class="key special shift" data-key="ShiftLeft">Maj</div>
            <div class="key" data-key="KeyW">W</div>
            <div class="key" data-key="KeyX">X</div>
            <div class="key" data-key="KeyC">C</div>
            <div class="key" data-key="KeyV">V</div>
            <div class="key" data-key="KeyB">B</div>
            <div class="key" data-key="KeyN">N</div>
            <div class="key" data-key="KeyM">,</div>
            <div class="key" data-key="Comma">;</div>
            <div class="key" data-key="Period">:</div>
            <div class="key" data-key="Slash">!</div>
            <div class="key special shift" data-key="ShiftRight">Maj</div>
          </div>

          <div class="row">
            <div class="key special" data-key="ControlLeft">Ctrl</div>
            <div class="key special" data-key="MetaLeft">Win</div>
            <div class="key special" data-key="AltLeft">Alt</div>
            <div class="key space" data-key="Space"> </div>
            <div class="key special" data-key="AltRight">Alt Gr</div>
            <div class="key special" data-key="MetaRight">Win</div>
            <div class="key special" data-key="ContextMenu">☰</div>
            <div class="key special" data-key="ControlRight">Ctrl</div>
          </div>
        </div>

        <!-- Navigation Cluster -->
        <div class="nav-cluster">
          <div class="top-right-keys">
            <div class="key special" data-key="PrintScreen" style="font-size:12px;text-align:center;">Impr Écran</div>
            <div class="key special" data-key="ScrollLock" style="font-size:12px;text-align:center;">Arrêt Défil</div>
            <div class="key special" data-key="Pause" style="font-size:12px;text-align:center;">Pause</div>
          </div>
          <div class="nav-keys">
            <div class="key special" data-key="Insert" style="font-size:12px;text-align:center;">Inser</div>
            <div class="key special" data-key="Home" style="font-size:12px;text-align:center;">Début</div>
            <div class="key special" data-key="PageUp" style="font-size:12px;text-align:center;">Page ↑</div>
          </div>
          <div class="nav-keys">
            <div class="key special" data-key="Delete" style="font-size:12px;text-align:center;">Suppr</div>
            <div class="key special" data-key="End" style="font-size:12px;text-align:center;">Fin</div>
            <div class="key special" data-key="PageDown" style="font-size:12px;text-align:center;">Page ↓</div>
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
            <div class="key special" data-key="NumLock" style="font-size:12px;text-align:center;">Verr Num</div>
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
                <div class="key" data-key="NumpadDecimal">,</div>
              </div>
            </div>
            <div class="vertical-keys">
              <div class="key tall" data-key="NumpadAdd">+</div>
              <div class="key tall" data-key="NumpadEnter">Entrée</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tools Section -->
  <div class="tools-section" style="margin: 20px auto; max-width: 900px; padding: 25px; background: linear-gradient(135deg, #2a2a72, #009ffd); border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); transition: transform 0.3s ease;">
  <h2 style="color: #ffffff; font-size: 2rem; text-align: center; margin-bottom: 15px; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);">✨ Découvrez Nos Outils Incroyables ✨</h2>
  <p style="font-size: 1.1rem; text-align: center; color: #e0e0ff; margin-bottom: 20px; line-height: 1.5;">
    Améliorez votre configuration avec notre <strong>testeur de clavier en ligne</strong>, nos outils pour souris et plus encore ! 🚀 Testez vos touches, clics et vitesse—découvrez-les maintenant !
  </p>
  <div style="display: flex; flex-direction: column; gap: 12px; align-items: flex-start;">
    <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
      <a href="https://www.keyboardtester.click/mouse-test.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #00ddeb; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
          Testeur de Souris 🖱️
        </span>
      </a>
      <span style="color: #d1d1ff; font-size: 0.95rem;">Testez vos <strong>boutons de souris</strong> et le défilement facilement ! 🛠️</span>
    </div>
    <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
      <a href="https://www.keyboardtester.click/mouse_speed_tester.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #ff6f61; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
          Testeur de Vitesse de Clic ⚡
        </span>
      </a>
      <span style="color: #d1d1ff; font-size: 0.95rem;">Mesurez votre <strong>vitesse de clic</strong> en clics par minute—super amusant ! 🎯</span>
    </div>
    <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
      <a href="https://www.keyboardtester.click/keyboard_typing_test.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #2ecc71; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
          Test de Vitesse de Frappe ⌨️
        </span>
      </a>
      <span style="color: #d1d1ff; font-size: 0.95rem;">Améliorez votre <strong>vitesse de frappe</strong> et précision—essayez-le ! 📝</span>
    </div>
    <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
      <a href="https://www.keyboardtester.click/ghost-click-detector.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #e74c3c; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
          Détecteur de Clics Fantômes 👻
        </span>
      </a>
      <span style="color: #d1d1ff; font-size: 0.95rem;">Découvrez si votre souris <strong>clique toute seule</strong> ! 🖱️</span>
    </div>
    <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
      <a href="https://www.keyboardtester.click/mouse_sensitivity_DPI_tester.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #9b59b6; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
          Testeur de Sensibilité/DPI 🎯
        </span>
      </a>
      <span style="color: #d1d1ff; font-size: 0.95rem;">Vérifiez la <strong>sensibilité</strong> de votre souris ! 🖱️</span>
    </div>
    <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
      <a href="https://www.keyboardtester.click/whatsapp-link-generator.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #25D366; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
          Générateur de Lien WhatsApp 📱
        </span>
      </a>
      <span style="color: #d1d1ff; font-size: 0.95rem;">Créez un <strong>lien de chat WhatsApp</strong> sans enregistrer le numéro ! 💬</span>
    </div>
    <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
      <a href="https://www.keyboardtester.click/keyboard-latency-checker.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #f1c40f; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
          Vérificateur de Latence du Clavier ⏱️
        </span>
      </a>
      <span style="color: #d1d1ff; font-size: 0.95rem;">Mesurez le <strong>délai</strong> de votre clavier—parfait pour les joueurs ! 🎮</span>
    </div>
    <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
      <a href="https://www.keyboardtester.click/microphone-tester.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #e67e22; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
          Testeur de Microphone 🎙️
        </span>
      </a>
      <span style="color: #d1d1ff; font-size: 0.95rem;">Vérifiez si votre <strong>micro</strong> fonctionne parfaitement ! 🔊</span>
    </div>
  </div>
</div>

  <!-- Guidelines Section -->
  <div class="guidelines" id="guidelines" style="margin: 20px auto; max-width: 900px; padding: 25px; background: linear-gradient(135deg, #1e1e2f, #2a2a3d); border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); color: #ffffff;">
    <p style="font-size: 1.1rem; text-align: center; margin-bottom: 20px; line-height: 1.5;">
      🌍 Testez votre clavier dans votre langue avec notre <strong>test de clavier en ligne</strong> ! Choisissez votre préféré ci-dessous :
    </p>
    <div style="display: flex; flex-wrap: nowrap; gap: 12px; overflow-x: auto; padding: 15px; justify-content: center; background: rgba(255, 255, 255, 0.05); border-radius: 12px;">
      <a href="https://www.keyboardtester.click/keyboard_tester_arabic.html" style="text-decoration: none;">
        <span style="display: inline-flex; align-items: center; padding: 10px 18px; background: #1abc9c; border-radius: 10px; color: #fff; font-weight: bold; transition: transform 0.3s ease;">
          <img src="flags/arabic_flag.svg" alt="Drapeau Arabe" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> العربية
        </span>
      </a>
      <a href="https://www.keyboardtester.click/keyboard_tester_german.html" style="text-decoration: none;">
        <span style="display: inline-flex; align-items: center; padding: 10px 18px; background: #8e44ad; border-radius: 10px; color: #fff; font-weight: bold; transition: transform 0.3s ease;">
          <img src="flags/german_flag.svg" alt="Drapeau Allemand" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> Deutsch
        </span>
      </a>
      <a href="https://www.keyboardtester.click/keyboard_tester_russian.html" style="text-decoration: none;">
        <span style="display: inline-flex; align-items: center; padding: 10px 18px; background: #2ecc71; border-radius: 10px; color: #fff; font-weight: bold; transition: transform 0.3s ease;">
          <img src="flags/russian_flag.svg" alt="Drapeau Russe" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> Русский
        </span>
      </a>
      <a href="https://www.keyboardtester.click/keyboard_tester_spanish.html" style="text-decoration: none;">
        <span style="display: inline-flex; align-items: center; padding: 10px 18px; background: #3498db; border-radius: 10px; color: #fff; font-weight: bold; transition: transform 0.3s ease;">
          <img src="flags/spanish_flag.svg" alt="Drapeau Espagnol" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> Español
        </span>
      </a>
      <a href="https://www.keyboardtester.click/keyboard_tester_portuguese.html" style="text-decoration: none;">
        <span style="display: inline-flex; align-items: center; padding: 10px 18px; background: #e67e22; border-radius: 10px; color: #fff; font-weight: bold; transition: transform 0.3s ease;">
          <img src="flags/Portugal_flag.svg" alt="Drapeau Portugais" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> Português
        </span>
      </a>
      <a href="#" style="text-decoration: none;">
        <span style="display: inline-flex; align-items: center; padding: 10px 18px; background: #e74c3c; border-radius: 10px; color: #fff; font-weight: bold; transition: transform 0.3s ease;">
          <img src="flags/french_flag.svg" alt="Drapeau Français" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> Français
        </span>
      </a>
    </div>

    <hr style="border: none; height: 2px; background: linear-gradient(to right, #3498db, #2ecc71); margin: 30px 0;">
    <h1 style="font-size: 2.2rem; text-align: center; color: #3498db; margin-bottom: 20px; text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.15);">📜 Directives</h1>
    <p style="font-size: 1.1rem; text-align: center; margin-bottom: 25px; line-height: 1.6;">
      <strong>Bienvenue sur KeyboardTester.click !</strong> Votre outil incontournable pour <strong>tester les touches du clavier</strong> et plus encore—plongez dans nos conseils ci-dessous !
    </p>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🛠️ Comment Utiliser le Testeur de Clavier</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      Notre <a href="https://www.keyboardtester.click/" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">testeur de clavier en ligne</a> est gratuit et facile. Voici comment <strong>tester mon clavier</strong> :
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Appuyez sur une Touche :</span> Voyez-la s’illuminer sur le clavier virtuel.</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Vérifiez l’État des Touches :</span> Les couleurs indiquent combien de fois une touche est pressée.</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Réinitialiser :</span> Effacez tout avec le bouton <strong>Réinitialiser</strong>.</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Changer de Thème :</span> Alternez entre les modes clair et sombre.</li>
    </ul>

    <h2 id="understanding-key-press-colors" style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🎨 Comprendre les Couleurs des Touches</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      Vous vous demandez à quoi servent les couleurs dans notre <strong>test de fonctionnalité du clavier</strong> ? Voici leur signification :
    </p>
    <div style="display: flex; flex-wrap: wrap; gap: 10px; margin: 15px 0;">
      <span style="background: #1abc9c; color: white; padding: 8px 15px; border-radius: 8px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">1ère Pression</span>
      <span style="background: #f1c40f; color: white; padding: 8px 15px; border-radius: 8px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">2ème Pression</span>
      <span style="background: #e67e22; color: white; padding: 8px 15px; border-radius: 8px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">3ème Pression</span>
      <span style="background: #e74c3c; color: white; padding: 8px 15px; border-radius: 8px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">4ème Pression</span>
      <span style="background: #9b59b6; color: white; padding: 8px 15px; border-radius: 8px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">5+ Pressions</span>
    </div>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c;">✦ 1ère Pression :</span> Vert pour la première fois.</li>
      <li style="margin-bottom: 10px;"><span style="color: #f1c40f;">✦ 2ème Pression :</span> Jaune pour la deuxième.</li>
      <li style="margin-bottom: 10px;"><span style="color: #e67e22;">✦ 3ème Pression :</span> Orange pour la troisième.</li>
      <li style="margin-bottom: 10px;"><span style="color: #e74c3c;">✦ 4ème Pression :</span> Rouge pour la quatrième.</li>
      <li style="margin-bottom: 10px;"><span style="color: #9b59b6;">✦ 5+ Pressions :</span> Violet pour cinq fois ou plus.</li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🔍 Tester les Touches Spéciales</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      Utilisez notre <strong>outil de dépannage de clavier</strong> pour vérifier les touches spéciales comme :
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Verr Maj :</span> Voyez l’indicateur s’allumer quand il est activé.</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Verr Num :</span> S’illumine quand il est actif.</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Arrêt Défil :</span> Brille quand il est enclenché.</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Impr Écran :</span> Testez la capture d’écran.</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Touches Fléchées :</span> Vérifiez la navigation (↑, ←, ↓, →).</li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">❓ Questions Fréquentes (FAQ)</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      Des questions sur notre <strong>test de clavier en ligne</strong> ? Voici des réponses :
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 15px;">
        <strong style="color: #ffffff;">Qu’est-ce qu’un Testeur de Clavier ?</strong><br>
        Un outil gratuit pour <strong>tester les touches du clavier</strong> et résoudre les problèmes rapidement.
      </li>
      <li style="margin-bottom: 15px;">
        <strong style="color: #ffffff;">Comment l’Utiliser ?</strong><br>
        Appuyez sur les touches pour les voir s’illuminer—parfait pour le <strong>test Verr Maj</strong> et plus.
      </li>
      <li style="margin-bottom: 15px;">
        <strong style="color: #ffffff;">Fonctionne avec Tous les Claviers ?</strong><br>
        Oui—<strong>mécaniques</strong>, <strong>à membrane</strong> ou <strong>claviers d’ordinateur portable</strong>.
      </li>
      <li style="margin-bottom: 15px;">
        <strong style="color: #ffffff;">Que Signifient les Couleurs ?</strong><br>
        Consultez la section <a href="#understanding-key-press-colors" style="color: #3498db; text-decoration: none; transition: color 0.3s;">Couleurs des Touches</a> !
      </li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🔧 Conseils pour Entretenir Votre Clavier</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      Gardez vos résultats parfaits avec notre <strong>testeur de clavier</strong> grâce à ces conseils :
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Nettoyez Régulièrement :</span> Enlevez la poussière avec un <a href="https://www.amazon.fr/s?k=kit+nettoyage+clavier" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">kit de nettoyage</a>.</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Évitez les Déversements :</span> Protégez des dégâts liquides.</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Remplacez les Touches :</span> Réparez les touches usées avec des <a href="https://www.amazon.fr/s?k=touches+remplacement+clavier" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">remplacements</a>.</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ Testez Souvent :</span> Utilisez notre <strong>test de fonctionnalité du clavier</strong>.</li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🚀 Explorez Plus d’Outils et Ressources</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      Montez en niveau avec ces <strong>outils de dépannage de clavier</strong> :
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 10px;"><a href="https://www.keyboardtester.click/mouse-test.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">Testeur de Souris</a> : Vérifiez les performances de la souris.</li>
      <li style="margin-bottom: 10px;"><a href="https://www.keyboardtester.click/privacy-policy.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">Politique de Confidentialité</a> : Vos données sont sécurisées.</li>
      <li style="margin-bottom: 10px;"><a href="https://www.keyboardtester.click/disclaimer.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">Avertissement</a> : Conditions d’utilisation.</li>
      <li style="margin-bottom: 10px;"><a href="https://www.keyboardtester.click/about-us.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">À Propos</a> : Qui nous sommes.</li>
      <li style="margin-bottom: 10px;"><a href="https://www.amazon.fr/s?k=clavier" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">Acheter un Clavier</a> : Mettez à jour maintenant.</li>
      <li style="margin-bottom: 10px;"><a href="https://www.amazon.fr/s?k=souris" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">Acheter une Souris</a> : Trouvez-en une nouvelle.</li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🔑 Mots-Clés Optimisés pour le SEO</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      Trouvez-nous avec ces mots-clés populaires pour <strong>testeur de clavier</strong> :
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 8px;"><span style="background: #1abc9c; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">testeur de clavier</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #2ecc71; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">tester mon clavier</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #3498db; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">vérifier mes touches</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #e67e22; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">test de clavier en ligne</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #9b59b6; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">test Verr Maj</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #1abc9c; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">test Verr Num</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #2ecc71; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">test Arrêt Défil</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #3498db; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">test de fonctionnalité du clavier</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #e67e22; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">outil de dépannage de clavier</span></li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🚀 Commencez Aujourd’hui</h2>
    <p style="font-size: 1rem; line-height: 1.6; text-align: left;">
      Réparez vos touches avec notre <a href="https://www.keyboardtester.click/" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">testeur de clavier en ligne</a>—idéal pour les <strong>joueurs</strong>, <strong>dactylos</strong> et <strong>tout le monde</strong> ! Commencez maintenant !
    </p>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🆘 Besoin d’Aide ?</h2>
    <p style="font-size: 1rem; line-height: 1.6; text-align: left;">
      Cliquez sur <strong>Aide</strong> ou visitez <a href="https://www.keyboardtester.click/about-us.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">À Propos</a>, <a href="https://www.keyboardtester.click/privacy-policy.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">Politique de Confidentialité</a> ou <a href="https://www.keyboardtester.click/disclaimer.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">Avertissement</a>.
    </p>
  </div>

  <style>
    .tools-section a:hover span { transform: scale(1.05); background: #ffffff; color: #2a2a72; }
    .tools-section div:hover { background: rgba(255, 255, 255, 0.2); transform: scale(1.02); }
    .tools-section:hover { transform: translateY(-5px); }
    .guidelines a:hover span { transform: scale(1.05); box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); }
    .guidelines a:hover { color: #1abc9c; }
    div[style*="overflow-x: auto"] { -webkit-overflow-scrolling: touch; }
  </style>

  <!-- Footer -->
  <footer style="background-color: var(--secondary-color); color: var(--primary-color); padding: 10px 20px; text-align: center; box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1); width: 100%;">
    <p>&copy; 2025 <a href="https://www.keyboardtester.click/" style="color: var(--key-active-1); text-decoration: underline;">Testeur de Clavier en Ligne</a>. Tous droits réservés. Découvrez plus de ressources et d’insights experts sur notre <a href="https://keyboardtester.click/blog/" style="color: var(--key-active-2); text-decoration: underline;">Blog</a>.</p>
  </footer>

  <script>
    const keyHistory = document.getElementById('key-history');
    const keyPressCount = {};

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

        keyElement.className = keyElement.className.replace(/active-\d/g, '') + ` active-${activeLevel}`;

        let keyCountElement = keyElement.querySelector('.key-count');
        if (!keyCountElement) {
          keyCountElement = document.createElement('div');
          keyCountElement.className = 'key-count';
          keyElement.appendChild(keyCountElement);
        }
        keyCountElement.textContent = keyPressCount[key];

        const displayKey = event.key === ' ' ? '␣' : event.key.length > 1 ? `[${event.code}]` : event.key;
        keyHistory.textContent += displayKey + ' ';

        if (key === 'CapsLock') capsLockLight.classList.toggle('active');
        if (key === 'ScrollLock') scrollLockLight.classList.toggle('active');
        if (key === 'NumLock') numLockLight.classList.toggle('active');
      }
    });

    const resetButton = document.getElementById('reset-button');
    resetButton.addEventListener('click', () => {
      const keys = document.querySelectorAll('.key');
      keys.forEach(key => {
        key.className = key.className.replace(/active-\d/g, '');
        const keyCountElement = key.querySelector('.key-count');
        if (keyCountElement) keyCountElement.remove();
      });
      keyHistory.textContent = '';
      capsLockLight.classList.remove('active');
      scrollLockLight.classList.remove('active');
      numLockLight.classList.remove('active');
      for (const key in keyPressCount) delete keyPressCount[key];
    });

    const helpButton = document.getElementById('help-button');
    const guidelinesSection = document.getElementById('guidelines');
    helpButton.addEventListener('click', () => {
      guidelinesSection.scrollIntoView({ behavior: 'smooth' });
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
</body>
</html>

