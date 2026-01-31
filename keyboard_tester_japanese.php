<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="ja">
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
  <?php include 'tools/keyboard_tester_japanese_guideline.php'; ?>
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
      width: 40px;
      height: 40px;
      background-color: var(--key-bg);
      border: 1px solid var(--key-border);
      border-radius: 6px;
      color: var(--key-text);
      font-size: 12px;
      font-weight: bold;
      cursor: pointer;
      user-select: none;
      transition: all 0.2s;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      position: relative;
      text-align: center;
      line-height: 1.2;
    }

    .key.special { background-color: var(--keyboard-bg); }
    .key.space { width: 400px; }
    .key.active-1 { background-color: var(--key-active-1); }
    .key.active-2 { background-color: var(--key-active-2); }
    .key.active-3 { background-color: var(--key-active-3); }
    .key.active-4 { background-color: var(--key-active-4); }
    .key.active-5 { background-color: var(--key-active-5); }

    .key.enter { width: 120px; font-size: 10px; }
    .key.shift { width: 120px; font-size: 12px; }
    .key.tab { width: 75px; font-size: 12px; }
    .key.caps { width: 100px; font-size: 10px; }
    .key.backspace { width: 100px; font-size: 10px; }
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
    .arrow-key { width: 40px; height: 40px; }
    .numpad .key {
      width: 40px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      border: 1px solid var(--key-border);
      font-size: 12px;
    }
    .numpad .tall-key { height: 87px; }
    .numpad .zero { width: 85px; }
    .numpad [data-key="NumpadAdd"] { height: 87px; margin-left: 2px; }
    .numpad [data-key="NumpadEnter"] { height: 87px; margin-left: 2px; position: relative; font-size: 10px; }
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
  <script type="text/javascript">
    function setAttributeOnload(object, attribute, val) {
      if(window.addEventListener) {
        window.addEventListener('load', function(){ object[attribute] = val; }, false);
      } else {
        window.attachEvent('onload', function(){ object[attribute] = val; });
      }
    }
  </script>

  <?php include 'header.php'; ?>


  <!-- Keyboard Tester Section -->
  <div class="keyboard-tester" id="keyboard-tester">
    <div style="display: flex; align-items: center; justify-content: center; gap: 30px; margin-bottom: 5px;">
      <div><textarea class="text-box" id="key-history" rows="4" cols="80"></textarea></div>
      <button class="reset-button" id="reset-button">リセット</button>
    </div>

    <div class="container">
      <div class="main-keyboard">
        <!-- Main Keyboard (JIS Layout) -->
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
            <div class="key" data-key="Equal">^</div>
            <div class="key" data-key="IntlYen">¥</div>
            <div class="key special backspace" data-key="Backspace">バックスペース</div>
          </div>

          <div class="row">
            <div class="key special tab" data-key="Tab">タブ</div>
            <div class="key" data-key="KeyQ">た</div>
            <div class="key" data-key="KeyW">て</div>
            <div class="key" data-key="KeyE">い</div>
            <div class="key" data-key="KeyR">す</div>
            <div class="key" data-key="KeyT">か</div>
            <div class="key" data-key="KeyY">ん</div>
            <div class="key" data-key="KeyU">な</div>
            <div class="key" data-key="KeyI">に</div>
            <div class="key" data-key="KeyO">ら</div>
            <div class="key" data-key="KeyP">せ</div>
            <div class="key" data-key="BracketLeft">゛</div>
            <div class="key" data-key="BracketRight">゜</div>
            <div class="key special backslash" data-key="Backslash">@</div>
          </div>

          <div class="row">
            <div class="key special caps" data-key="CapsLock">カタカナ/ひらがな</div>
            <div class="key" data-key="KeyA">ち</div>
            <div class="key" data-key="KeyS">と</div>
            <div class="key" data-key="KeyD">し</div>
            <div class="key" data-key="KeyF">は</div>
            <div class="key" data-key="KeyG">き</div>
            <div class="key" data-key="KeyH">く</div>
            <div class="key" data-key="KeyJ">ま</div>
            <div class="key" data-key="KeyK">の</div>
            <div class="key" data-key="KeyL">り</div>
            <div class="key" data-key="Semicolon">れ</div>
            <div class="key" data-key="Quote">け</div>
            <div class="key special enter" data-key="Enter">↵ エンター</div>
          </div>

          <div class="row">
            <div class="key special shift" data-key="ShiftLeft">シフト</div>
            <div class="key" data-key="KeyZ">つ</div>
            <div class="key" data-key="KeyX">さ</div>
            <div class="key" data-key="KeyC">そ</div>
            <div class="key" data-key="KeyV">ひ</div>
            <div class="key" data-key="KeyB">こ</div>
            <div class="key" data-key="KeyN">み</div>
            <div class="key" data-key="KeyM">も</div>
            <div class="key" data-key="Comma">ね</div>
            <div class="key" data-key="Period">る</div>
            <div class="key" data-key="Slash">め</div>
            <div class="key" data-key="IntlRo">ろ</div>
            <div class="key special shift" data-key="ShiftRight">シフト</div>
          </div>

          <div class="row">
            <div class="key special" data-key="ControlLeft">Ctrl</div>
            <div class="key special" data-key="MetaLeft">Win</div>
            <div class="key special" data-key="AltLeft">Alt</div>
            <div class="key special" data-key="Lang2">英数</div>
            <div class="key space" data-key="Space"> </div>
            <div class="key special" data-key="Lang1">かな</div>
            <div class="key special" data-key="AltRight">Alt</div>
            <div class="key special" data-key="MetaRight">Win</div>
            <div class="key special" data-key="ContextMenu">☰</div>
            <div class="key special" data-key="ControlRight">Ctrl</div>
          </div>
        </div>

        <!-- Navigation Cluster -->
        <div class="nav-cluster">
          <div class="top-right-keys">
            <div class="key special" data-key="PrintScreen" style="font-size:10px;text-align:center;">プリントスクリーン</div>
            <div class="key special" data-key="ScrollLock" style="font-size:10px;text-align:center;">スクロールロック</div>
            <div class="key special" data-key="Pause" style="font-size:10px;text-align:center;">ポーズ</div>
          </div>
          <div class="nav-keys">
            <div class="key special" data-key="Insert" style="font-size:10px;text-align:center;">挿入</div>
            <div class="key special" data-key="Home" style="font-size:10px;text-align:center;">ホーム</div>
            <div class="key special" data-key="PageUp" style="font-size:10px;text-align:center;">ページアップ</div>
          </div>
          <div class="nav-keys">
            <div class="key special" data-key="Delete" style="font-size:10px;text-align:center;">削除</div>
            <div class="key special" data-key="End" style="font-size:10px;text-align:center;">エンド</div>
            <div class="key special" data-key="PageDown" style="font-size:10px;text-align:center;">ページダウン</div>
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
            <div class="key special" data-key="NumLock" style="font-size:10px;text-align:center;">ナムロック</div>
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
              <div class="key tall" data-key="NumpadEnter">エンター</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tools Section -->
  <div class="tools-section" style="margin: 20px auto; max-width: 900px; padding: 25px; background: linear-gradient(135deg, #2a2a72, #009ffd); border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); transition: transform 0.3s ease;">
    <h2 style="color: #ffffff; font-size: 2rem; text-align: center; margin-bottom: 15px; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);">✨ 素晴らしいツールを探索 ✨</h2>
    <p style="font-size: 1.1rem; text-align: center; color: #e0e0ff; margin-bottom: 20px; line-height: 1.5;">
      オンラインキーボードテスターやマウスツールなどでセットアップを強化しましょう！🚀 キー、クリック、スピードをテスト—今すぐチェック！
    </p>
    <div style="display: flex; flex-direction: column; gap: 12px; align-items: flex-start;">
      <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
        <a href="https://www.keyboardtester.click/mouse-test.html" style="text-decoration: none;">
          <span style="padding: 10px 20px; background: #00ddeb; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
            マウステスター 🖱️
          </span>
        </a>
        <span style="color: #d1d1ff; font-size: 0.95rem;">マウスのボタンとスクロールを簡単にテスト！🛠️</span>
      </div>
      <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
        <a href="https://www.keyboardtester.click/mouse_speed_tester.html" style="text-decoration: none;">
          <span style="padding: 10px 20px; background: #ff6f61; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
            マウスクリックスピードテスター ⚡
          </span>
        </a>
        <span style="color: #d1d1ff; font-size: 0.95rem;">クリック速度を1分あたりのクリック数で測定—楽しい！🎯</span>
      </div>
      <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
        <a href="https://www.keyboardtester.click/keyboard_typing_test.html" style="text-decoration: none;">
          <span style="padding: 10px 20px; background: #2ecc71; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
            タイピングスピードテスト ⌨️
          </span>
        </a>
        <span style="color: #d1d1ff; font-size: 0.95rem;">タイピング速度と正確さを向上—試してみて！📝</span>
      </div>
      <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
        <a href="https://www.keyboardtester.click/ghost-click-detector.html" style="text-decoration: none;">
          <span style="padding: 10px 20px; background: #e74c3c; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
            ゴーストクリック検出器 👻
          </span>
        </a>
        <span style="color: #d1d1ff; font-size: 0.95rem;">マウスが勝手にクリックしているか確認！🖱️</span>
      </div>
      <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
        <a href="https://www.keyboardtester.click/mouse_sensitivity_DPI_tester.html" style="text-decoration: none;">
          <span style="padding: 10px 20px; background: #9b59b6; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
            感度/DPIテスター 🎯
          </span>
        </a>
        <span style="color: #d1d1ff; font-size: 0.95rem;">マウスの感度をチェック！🖱️</span>
      </div>
      <div style="display: flex; align-items: center; gap: 15px; width: 100%; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 10px; transition: background 0.3s, transform 0.2s;">
        <a href="whatsapp-link-generator.html" style="text-decoration: none;">
          <span style="padding: 10px 20px; background: #25D366; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s;">
            WhatsAppリンクジェネレーター 📱
          </span>
        </a>
        <span style="color: #d1d1ff; font-size: 0.95rem;">番号を保存せずにWhatsAppチャットリンクを作成！💬</span>
      </div>
    </div>

    <!-- Language Selection in Tools Section -->
    <h2 style="color: #ffffff; font-size: 1.7rem; text-align: center; margin-top: 30px; margin-bottom: 15px; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);">🌍 あなたの言語でキーボードをテスト</h2>
    <div style="display: flex; flex-wrap: wrap; gap: 12px; justify-content: center;">
      <a href="https://www.keyboardtester.click/keyboard_tester_arabic.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #1abc9c; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s; display: inline-flex; align-items: center;">
          <img src="flags/arabic_flag.svg" alt="アラビア語の旗" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> العربية
        </span>
      </a>
      <a href="https://www.keyboardtester.click/keyboard_tester_german.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #8e44ad; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s; display: inline-flex; align-items: center;">
          <img src="flags/german_flag.svg" alt="ドイツの旗" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> Deutsch
        </span>
      </a>
      <a href="https://www.keyboardtester.click/keyboard_tester_russian.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #2ecc71; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s; display: inline-flex; align-items: center;">
          <img src="flags/russian_flag.svg" alt="ロシアの旗" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> Русский
        </span>
      </a>
      <a href="https://www.keyboardtester.click/keyboard_tester_spanish.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #3498db; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s; display: inline-flex; align-items: center;">
          <img src="flags/spanish_flag.svg" alt="スペインの旗" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> Español
        </span>
      </a>
      <a href="https://www.keyboardtester.click/keyboard_tester_portuguese.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #e67e22; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s; display: inline-flex; align-items: center;">
          <img src="flags/Portugal_flag.svg" alt="ポルトガルの旗" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> Português
        </span>
      </a>
      <a href="https://www.keyboardtester.click/keyboard_tester_french.html" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #e74c3c; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s; display: inline-flex; align-items: center;">
          <img src="flags/french_flag.svg" alt="フランスの旗" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> Français
        </span>
      </a>
      <a href="#" style="text-decoration: none;">
        <span style="padding: 10px 20px; background: #ff4757; color: #fff; border-radius: 8px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background 0.3s; display: inline-flex; align-items: center;">
          <img src="flags/japanese_flag.svg" alt="日本の旗" style="vertical-align: middle; width: 24px; height: 18px; margin-right: 10px;"> 日本語
        </span>
      </a>
    </div>
  </div>

  <!-- Guidelines Section -->
  <div class="guidelines" id="guidelines" style="margin: 20px auto; max-width: 900px; padding: 25px; background: linear-gradient(135deg, #1e1e2f, #2a2a3d); border-radius: 15px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); color: #ffffff;">
    <h1 style="font-size: 2.2rem; text-align: center; color: #3498db; margin-bottom: 20px; text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.15);">📜 ガイドライン</h1>
    <p style="font-size: 1.1rem; text-align: center; margin-bottom: 25px; line-height: 1.6;">
      <strong>KeyboardTester.clickへようこそ！</strong> キーボードのキーをテストするための最適なツールです。以下のヒントをご覧ください！
    </p>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🛠️ キーボードテスターの使い方</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      私たちの<a href="https://www.keyboardtester.click/" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">オンラインキーボードテスター</a>は無料で簡単です。キーボードをテストする方法はこちら：
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ キーを押す：</span> 仮想キーボード上でキーが光ります。</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ キーの状態を確認：</span> 色でキーが何回押されたかを確認できます。</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ リセット：</span> <strong>リセット</strong>ボタンですべてをクリア。</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ テーマ切り替え：</span> ライトモードとダークモードを切り替え。</li>
    </ul>

    <h2 id="understanding-key-press-colors" style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🎨 キー押下の色の意味</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      キーボード機能テストでの色の意味が気になりますか？以下に説明します：
    </p>
    <div style="display: flex; flex-wrap: wrap; gap: 10px; margin: 15px 0;">
      <span style="background: #1abc9c; color: white; padding: 8px 15px; border-radius: 8px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">1回目</span>
      <span style="background: #f1c40f; color: white; padding: 8px 15px; border-radius: 8px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">2回目</span>
      <span style="background: #e67e22; color: white; padding: 8px 15px; border-radius: 8px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">3回目</span>
      <span style="background: #e74c3c; color: white; padding: 8px 15px; border-radius: 8px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">4回目</span>
      <span style="background: #9b59b6; color: white; padding: 8px 15px; border-radius: 8px; box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);">5回以上</span>
    </div>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c;">✦ 1回目：</span> 初回は緑。</li>
      <li style="margin-bottom: 10px;"><span style="color: #f1c40f;">✦ 2回目：</span> 2回目は黄色。</li>
      <li style="margin-bottom: 10px;"><span style="color: #e67e22;">✦ 3回目：</span> 3回目はオレンジ。</li>
      <li style="margin-bottom: 10px;"><span style="color: #e74c3c;">✦ 4回目：</span> 4回目は赤。</li>
      <li style="margin-bottom: 10px;"><span style="color: #9b59b6;">✦ 5回以上：</span> 5回以上は紫。</li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🔍 特殊キーのテスト</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      キーボードトラブルシューティングツールを使って、以下のような特殊キーをチェック：
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ カタカナ/ひらがな：</span> オン時にインジケーターが光ります。</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ ナムロック：</span> アクティブ時に光ります。</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ スクロールロック：</span> 切り替えた時に光ります。</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ プリントスクリーン：</span> スクリーンキャプチャをテスト。</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ 矢印キー：</span> ナビゲーションをチェック (↑, ←, ↓, →)。</li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">❓ よくある質問 (FAQ)</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      オンラインキーボードテストについて質問がありますか？以下に回答：
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 15px;">
        <strong style="color: #ffffff;">キーボードテスターとは何ですか？</strong><br>
        キーボードのキーをテストし、問題を素早く解決する無料ツールです。
      </li>
      <li style="margin-bottom: 15px;">
        <strong style="color: #ffffff;">使い方は？</strong><br>
        キーを押して光るのを確認—カタカナ/ひらがなテストなどに最適。
      </li>
      <li style="margin-bottom: 15px;">
        <strong style="color: #ffffff;">すべてのキーボードで使えますか？</strong><br>
        はい—メカニカル、メンブレン、ノートパソコンのキーボードでも。
      </li>
      <li style="margin-bottom: 15px;">
        <strong style="color: #ffffff;">色の意味は？</strong><br>
        <a href="#understanding-key-press-colors" style="color: #3498db; text-decoration: none; transition: color 0.3s;">キー押下の色</a>セクションをご覧ください！
      </li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🔧 キーボードのメンテナンスのヒント</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      キーボードテスターの結果を完璧に保つためのヒント：
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ 定期的に掃除：</span> <a href="https://www.amazon.co.jp/s?k=キーボードクリーニングキット" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">クリーニングキット</a>でホコリを取り除く。</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ 液体を避ける：</span> 液体によるダメージを防ぐ。</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ キーの交換：</span> 摩耗したキーを<a href="https://www.amazon.co.jp/s?k=キーボード交換キー" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">交換用キー</a>で修理。</li>
      <li style="margin-bottom: 10px;"><span style="color: #1abc9c; font-weight: bold;">✦ 頻繁にテスト：</span> キーボード機能テストを使用。</li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🚀 さらにツールとリソースを探索</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      以下のキーボードトラブルシューティングツールでレベルアップ：
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 10px;"><a href="https://www.keyboardtester.click/mouse-test.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">マウステスター</a>：マウスのパフォーマンスをチェック。</li>
      <li style="margin-bottom: 10px;"><a href="https://www.keyboardtester.click/privacy-policy.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">プライバシーポリシー</a>：データは安全です。</li>
      <li style="margin-bottom: 10px;"><a href="https://www.keyboardtester.click/disclaimer.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">免責事項</a>：利用規約。</li>
      <li style="margin-bottom: 10px;"><a href="https://www.keyboardtester.click/about-us.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">私たちについて</a>：私たちは誰か。</li>
      <li style="margin-bottom: 10px;"><a href="https://www.amazon.co.jp/s?k=キーボード" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">キーボードを購入</a>：今すぐアップグレード。</li>
      <li style="margin-bottom: 10px;"><a href="https://www.amazon.co.jp/s?k=マウス" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">マウスを購入</a>：新しいものを入手。</li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🔑 SEO最適化キーワード</h2>
    <p style="font-size: 1rem; line-height: 1.6;">
      以下の人気キーボードテスターキーワードで私たちを見つけてください：
    </p>
    <ul style="list-style: none; padding: 0; margin: 15px 0;">
      <li style="margin-bottom: 8px;"><span style="background: #1abc9c; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">キーボードテスター</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #2ecc71; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">キーボードテスト</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #3498db; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">キー確認</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #e67e22; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">オンラインキーボードテスト</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #9b59b6; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">カタカナ/ひらがなテスト</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #1abc9c; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">ナムロックテスト</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #2ecc71; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">スクロールロックテスト</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #3498db; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">キーボード機能テスト</span></li>
      <li style="margin-bottom: 8px;"><span style="background: #e67e22; color: white; padding: 5px 10px; border-radius: 6px; display: inline-block;">キーボードトラブルシューティングツール</span></li>
    </ul>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🚀 今日から始める</h2>
    <p style="font-size: 1rem; line-height: 1.6; text-align: left;">
      オンラインキーボードテスターでキーを修正—ゲーマー、タイピスト、誰でも最適！今すぐスタート！
    </p>

    <h2 style="font-size: 1.7rem; color: #1abc9c; margin-top: 20px;">🆘 ヘルプが必要ですか？</h2>
    <p style="font-size: 1rem; line-height: 1.6; text-align: left;">
      <strong>ヘルプ</strong>をクリックするか、<a href="https://www.keyboardtester.click/about-us.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">私たちについて</a>、<a href="https://www.keyboardtester.click/privacy-policy.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">プライバシーポリシー</a>、または<a href="https://www.keyboardtester.click/disclaimer.html" target="_blank" style="color: #3498db; text-decoration: none; transition: color 0.3s;">免責事項</a>をご覧ください。
    </p>
  </div>

  <style>
    .tools-section a:hover span { transform: scale(1.05); background: #ffffff; color: #2a2a72; }
    .tools-section div:hover { background: rgba(255, 255, 255, 0.2); transform: scale(1.02); }
    .tools-section:hover { transform: translateY(-5px); }
    .guidelines a:hover span { transform: scale(1.05); box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); }
    .guidelines a:hover { color: #1abc9c; }
  </style>

  <!-- Footer -->
  <footer style="background-color: var(--secondary-color); color: var(--primary-color); padding: 10px 20px; text-align: center; box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1); width: 100%;">
    <p>© 2025 <a href="https://www.keyboardtester.click/" style="color: var(--key-active-1); text-decoration: underline;">オンラインキーボードテスター</a>. すべての権利を保有。詳細なリソースや専門家の洞察は<a href="https://keyboardtester.click/blog/" style="color: var(--key-active-2); text-decoration: underline;">ブログ</a>でご覧ください。</p>
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

