<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
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
  <?php include 'tools/keyboard_tester_arabic_guideline.php'; ?>
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
  <?php include 'header.php'; ?>

  <!-- Keyboard Tester Section -->
  <div class="keyboard-tester" id="keyboard-tester">
    <!-- Text Box and Reset Button -->
    <div style="display: flex; align-items: center; justify-content: center; gap: 30px; margin-bottom: 5px;">
      <div><textarea class="text-box" id="key-history" rows="4" cols="80"></textarea></div>
      <button class="reset-button" id="reset-button">إعادة تعيين</button>
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
            <div class="key special backspace" data-key="Backspace">Backspace</div>
          </div>

          <div class="row">
            <div class="key special tab" data-key="Tab">Tab</div>
            <div class="key" data-key="KeyQ">ض</div>
            <div class="key" data-key="KeyW">ص</div>
            <div class="key" data-key="KeyE">ث</div>
            <div class="key" data-key="KeyR">ق</div>
            <div class="key" data-key="KeyT">ف</div>
            <div class="key" data-key="KeyY">غ</div>
            <div class="key" data-key="KeyU">ع</div>
            <div class="key" data-key="KeyI">ه</div>
            <div class="key" data-key="KeyO">خ</div>
            <div class="key" data-key="KeyP">ح</div>
            <div class="key" data-key="BracketLeft">ج</div>
            <div class="key" data-key="BracketRight">د</div>
            <div class="key special backslash" data-key="Backslash">ذ</div>
          </div>

          <div class="row">
            <div class="key special caps" data-key="CapsLock">Caps Lock</div>
            <div class="key" data-key="KeyA">ش</div>
            <div class="key" data-key="KeyS">س</div>
            <div class="key" data-key="KeyD">ي</div>
            <div class="key" data-key="KeyF">ب</div>
            <div class="key" data-key="KeyG">ل</div>
            <div class="key" data-key="KeyH">ا</div>
            <div class="key" data-key="KeyJ">ت</div>
            <div class="key" data-key="KeyK">ن</div>
            <div class="key" data-key="KeyL">م</div>
            <div class="key" data-key="Semicolon">ك</div>
            <div class="key" data-key="Quote">ط</div>
            <div class="key special enter" data-key="Enter">↵ Enter</div>
          </div>

          <div class="row">
            <div class="key special shift" data-key="ShiftLeft">Shift</div>
            <div class="key" data-key="KeyZ">ئ</div>
            <div class="key" data-key="KeyX">ء</div>
            <div class="key" data-key="KeyC">ؤ</div>
            <div class="key" data-key="KeyV">ر</div>
            <div class="key" data-key="KeyB">لا</div>
            <div class="key" data-key="KeyN">ى</div>
            <div class="key" data-key="KeyM">ة</div>
            <div class="key" data-key="Comma">و</div>
            <div class="key" data-key="Period">ز</div>
            <div class="key" data-key="Slash">ظ</div>
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
            <div class="key special" data-key="PrintScreen" style="font-size:12px;text-align:center;">Print Screen</div>
            <div class="key special" data-key="ScrollLock" style="font-size:12px;text-align:center;">Scroll Lock</div>
            <div class="key special" data-key="Pause" style="font-size:12px;text-align:center;">Pause</div>
          </div>
          <div class="nav-keys">
            <div class="key special" data-key="Insert" style="font-size:12px;text-align:center;">Insert</div>
            <div class="key special" data-key="Home" style="font-size:12px;text-align:center;">Home</div>
            <div class="key special" data-key="PageUp" style="font-size:12px;text-align:center;">Page Up</div>
          </div>
          <div class="nav-keys">
            <div class="key special" data-key="Delete" style="font-size:12px;text-align:center;">Delete</div>
            <div class="key special" data-key="End" style="font-size:12px;text-align:center;">End</div>
            <div class="key special" data-key="PageDown" style="font-size:12px;text-align:center;">Page Down</div>
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
            <div class="key special" data-key="NumLock" style="font-size:12px;text-align:center;">Num Lock</div>
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
              <div class="key tall" data-key="NumpadEnter">Enter</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Guidelines Section -->
  <div class="guidelines" id="guidelines">
    <h3>إرشادات شاملة</h3>
    <p>
      <strong>مرحبًا بكم في اختبار لوحة المفاتيح عبر الإنترنت!</strong> تم تصميم هذه الأداة لمساعدتك في اختبار وظائف لوحة المفاتيح الخاصة بك والتأكد من أن جميع المفاتيح تعمل بشكل مثالي. ستجد أدناه تعليمات مفصلة ونصائح وشروحات لتحقيق أقصى استفادة من هذه الأداة.
    </p>

    <h4>كيفية استخدام اختبار لوحة المفاتيح</h4>
    <p>
      اختبار لوحة المفاتيح الخاص بنا بسيط وبديهي. اتبع هذه الخطوات للبدء:
    </p>
    <ul>
      <li><strong>اضغط على أي مفتاح:</strong> ابدأ بالضغط على أي مفتاح على لوحة المفاتيح الفعلية. سيضيء المفتاح المقابل على لوحة المفاتيح الافتراضية.</li>
      <li><strong>تحقق من حالة المفتاح:</strong> يتغير لون المفتاح مع كل ضغطة للإشارة إلى عدد المرات التي تم الضغط عليها.</li>
      <li><strong>إعادة تعيين:</strong> استخدم زر <strong>إعادة تعيين</strong> لمسح جميع الضغطات والبدء من جديد.</li>
      <li><strong>تبديل السمة:</strong> قم بالتبديل بين السمة <strong>الفاتحة</strong> و<strong>الداكنة</strong> لتجربة عرض مريحة.</li>
    </ul>

    <h4>فهم ألوان ضغطات المفاتيح</h4>
    <p>
      يتغير لون المفتاح مع كل ضغطة للإشارة إلى عدد المرات التي تم الضغط عليها. إليك ما تعنيه الألوان:
    </p>
    <div style="display: flex; gap: 10px; margin: 20px 0;">
      <button style="background-color: #1abc9c; color: white; border: none; padding: 10px 20px; border-radius: 5px;">الضغطة الأولى</button>
      <button style="background-color: #f1c40f; color: white; border: none; padding: 10px 20px; border-radius: 5px;">الضغطة الثانية</button>
      <button style="background-color: #e67e22; color: white; border: none; padding: 10px 20px; border-radius: 5px;">الضغطة الثالثة</button>
      <button style="background-color: #e74c3c; color: white; border: none; padding: 10px 20px; border-radius: 5px;">الضغطة الرابعة</button>
      <button style="background-color: #9b59b6; color: white; border: none; padding: 10px 20px; border-radius: 5px;">5+ ضغطات</button>
    </div>
    <ul>
      <li><strong>الضغطة الأولى:</strong> يتحول المفتاح إلى اللون <span style="color: #1abc9c;">الأخضر</span>.</li>
      <li><strong>الضغطة الثانية:</strong> يتحول المفتاح إلى اللون <span style="color: #f1c40f;">الأصفر</span>.</li>
      <li><strong>الضغطة الثالثة:</strong> يتحول المفتاح إلى اللون <span style="color: #e67e22;">البرتقالي</span>.</li>
      <li><strong>الضغطة الرابعة:</strong> يتحول المفتاح إلى اللون <span style="color: #e74c3c;">الأحمر</span>.</li>
      <li><strong>5+ ضغطات:</strong> يتحول المفتاح إلى اللون <span style="color: #9b59b6;">البنفسجي</span>.</li>
    </ul>

    <h4>اختبار المفاتيح الخاصة</h4>
    <p>
      يسمح لك اختبار لوحة المفاتيح الخاص بنا باختبار وظائف المفاتيح الخاصة، بما في ذلك:
    </p>
    <ul>
      <li><strong>Caps Lock:</strong> تحقق مما إذا كان مفتاح Caps Lock يعمل بشكل صحيح. سيضيء مؤشر الضوء عند التنشيط.</li>
      <li><strong>Num Lock:</strong> اختبر مفتاح Num Lock للتأكد من أنه يعمل بشكل صحيح. سيضيء مؤشر الضوء عند التنشيط.</li>
      <li><strong>Scroll Lock:</strong> تحقق من وظيفة مفتاح Scroll Lock. سيضيء مؤشر الضوء عند التنشيط.</li>
      <li><strong>Print Screen:</strong> اختبر مفتاح Print Screen للتأكد من أنه يلتقط الشاشة بشكل صحيح.</li>
      <li><strong>مفاتيح الأسهم:</strong> تحقق من وظائف مفاتيح الأسهم (↑، ←، ↓، →).</li>
    </ul>

    <h4>الأسئلة الشائعة (FAQs)</h4>
    <p>
      فيما يلي بعض الأسئلة الشائعة والإجابات حول استخدام اختبار لوحة المفاتيح:
    </p>
    <ul>
      <li>
        <strong>ما هو اختبار لوحة المفاتيح؟</strong><br>
        اختبار لوحة المفاتيح هو أداة تتيح لك اختبار وظائف لوحة المفاتيح الخاصة بك. يساعدك على تحديد أي مفاتيح معطلة ويضمن أن لوحة المفاتيح تعمل بشكل مثالي.
      </li>
      <li>
        <strong>كيف أستخدم اختبار لوحة المفاتيح؟</strong><br>
        ببساطة اضغط على أي مفتاح على لوحة المفاتيح الفعلية، وسيضيء المفتاح المقابل على لوحة المفاتيح الافتراضية. يمكنك أيضًا التحقق من حالة المفاتيح الخاصة مثل <strong>Caps Lock</strong> و<strong>Num Lock</strong> و<strong>Scroll Lock</strong>.
      </li>
      <li>
        <strong>هل يمكنني استخدام هذه الأداة على أي لوحة مفاتيح؟</strong><br>
        نعم، اختبار لوحة المفاتيح الخاص بنا متوافق مع جميع أنواع لوحات المفاتيح، بما في ذلك <strong>الميكانيكية</strong> و<strong>الغشائية</strong> و<strong>لوحات مفاتيح اللابتوب</strong>.
      </li>
      <li>
        <strong>ماذا تعني ألوان المفاتيح؟</strong><br>
        يتغير لون المفتاح مع كل ضغطة للإشارة إلى عدد المرات التي تم الضغط عليها. راجع قسم <strong>فهم ألوان ضغطات المفاتيح</strong> لمزيد من التفاصيل.
      </li>
    </ul>

    <h4>نصائح للحفاظ على لوحة المفاتيح</h4>
    <p>
      لضمان بقاء لوحة المفاتيح في حالة جيدة، اتبع هذه النصائح:
    </p>
    <ul>
      <li><strong>تنظيف منتظم:</strong> يمكن أن يؤثر الغبار والأوساخ على أداء لوحة المفاتيح. قم بتنظيفها بانتظام باستخدام فرشاة ناعمة أو هواء مضغوط.</li>
      <li><strong>تجنب الانسكابات:</strong> ابعد السوائل عن لوحة المفاتيح لمنع التلف.</li>
      <li><strong>تحقق من التآكل:</strong> استبدل المفاتيح أو المفاتيح البالية للحفاظ على الأداء الأمثل.</li>
      <li><strong>اختبار بشكل متكرر:</strong> استخدم اختبار لوحة المفاتيح الخاص بنا بانتظام للتأكد من أن جميع المفاتيح تعمل بشكل صحيح.</li>
    </ul>

    <h4>اكتشف المزيد من الأدوات والموارد</h4>
    <p>
      بالإضافة إلى اختبار لوحة المفاتيح، نقدم أدوات وموارد أخرى لتعزيز تجربتك:
    </p>
    <ul>
      <li><a href="https://www.keyboardtester.click/mouse-test.html" target="_blank">اختبار الماوس</a>: اختبر وظائف الماوس الخاص بك وتأكد من أنه يعمل بشكل مثالي.</li>
      <li><a href="https://www.keyboardtester.click/privacy-policy.html" target="_blank">سياسة الخصوصية</a>: تعرف على كيفية حماية بياناتك وخصوصيتك.</li>
      <li><a href="https://www.keyboardtester.click/disclaimer.html" target="_blank">إخلاء المسؤولية</a>: اقرأ إخلاء المسؤولية الخاص بنا لفهم شروط استخدام أدواتنا.</li>
      <li><a href="https://www.keyboardtester.click/about-us.html" target="_blank">من نحن</a>: تعرف على المزيد حول مهمتنا والفريق وراء KeyboardTester.click.</li>
      <li><a href="https://www.amazon.com/s?k=keyboard" target="_blank">شراء لوحة مفاتيح جديدة من أمازون</a>: قم بترقية لوحة المفاتيح الخاصة بك بواحدة جديدة من أمازون.</li>
      <li><a href="https://www.amazon.com/s?k=mouse" target="_blank">شراء ماوس جديد من أمازون</a>: ابحث عن الماوس المثالي لاحتياجاتك على أمازون.</li>
    </ul>

    <h4>الكلمات الرئيسية المثبتة لتحسين محركات البحث (SEO)</h4>
    <p>
      تم تصميم اختبار لوحة المفاتيح الخاص بنا لمساعدتك في الكلمات الرئيسية التالية:
    </p>
    <ul>
      <li><strong>اختبار لوحة المفاتيح</strong></li>
      <li><strong>اختبر لوحة المفاتيح</strong></li>
      <li><strong>تحقق من المفاتيح</strong></li>
      <li><strong>اختبار لوحة المفاتيح عبر الإنترنت</strong></li>
      <li><strong>اختبار Caps Lock</strong></li>
      <li><strong>اختبار Num Lock</strong></li>
      <li><strong>اختبار Scroll Lock</strong></li>
      <li><strong>اختبار وظائف لوحة المفاتيح</strong></li>
      <li><strong>أداة استكشاف أخطاء لوحة المفاتيح</strong></li>
    </ul>

    <h4>ابدأ اليوم</h4>
    <p>
      لا تدع لوحة مفاتيح معطلة تبطئك. استخدم اختبار لوحة المفاتيح الخاص بنا عبر الإنترنت للتأكد من أن لوحة المفاتيح تعمل بشكل مثالي. سواء كنت <strong>لاعبًا</strong> أو <strong>مبرمجًا</strong> أو <strong>مستخدمًا عاديًا</strong>، فإن أداةنا هنا لمساعدتك. اضغط على أي مفتاح للبدء!
    </p>

    <h4>هل تحتاج إلى مساعدة؟</h4>
    <p>
      إذا كان لديك أي أسئلة أو تحتاج إلى مساعدة، انقر فوق زر <strong>مساعدة</strong> للحصول على تعليمات مفصلة. ستأخذك الإرشادات الشاملة الخاصة بنا خلال كل ما تحتاج إلى معرفته حول استخدام اختبار لوحة المفاتيح. لمزيد من المعلومات، قم بزيارة صفحة <a href="https://www.keyboardtester.click/about-us.html" target="_blank">من نحن</a> أو اطلع على <a href="https://www.keyboardtester.click/privacy-policy.html" target="_blank">سياسة الخصوصية</a> و<a href="https://www.keyboardtester.click/disclaimer.html" target="_blank">إخلاء المسؤولية</a> الخاصة بنا.
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

