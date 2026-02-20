<?php
ob_start();
?>

<section class="keyboard-tester" id="keyboard-tester" dir="rtl">
    <!-- Controls -->
    <div class="controls-wrapper">
        <div class="textarea-wrapper">
            <div class="textarea-label">سجل المفاتيح</div>
            <textarea class="text-box" id="key-history" rows="4" placeholder="اضغط أي مفتاح لبدء الاختبار..." dir="rtl"></textarea>
        </div>
        <div class="button-group">
            <button class="reset-button" id="reset-button">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                    <path d="M3 3v5h5"/>
                </svg>
                إعادة تعيين
            </button>
            <div class="select-wrapper">
                <label>المظهر</label>
                <select class="theme-selector" id="theme-selector">
                    <option value="dark">داكن</option>
                    <option value="light">فاتح</option>
                    <option value="midnight">منتصف الليل</option>
                    <option value="cyberpunk">سايبربانك</option>
                    <option value="forest">الغابة</option>
                </select>
            </div>
            <div class="select-wrapper">
                <label>التخطيط</label>
                <select class="layout-selector" id="layout-selector">
                    <option value="arabic">العربية</option>
                    <option value="qwerty">QWERTY</option>
                    <option value="dvorak">Dvorak</option>
                    <option value="colemak">Colemak</option>
                    <option value="azerty">AZERTY</option>
                    <option value="qwertz">QWERTZ</option>
                </select>
            </div>
            <div class="select-wrapper">
                <label>نظام التشغيل</label>
                <select class="os-selector" id="os-selector">
                    <option value="windows">ويندوز</option>
                    <option value="mac">ماك</option>
                </select>
            </div>
            <!-- خيارات متقدمة Toggle -->
            <div class="advanced-toggle-wrapper">
                <button class="advanced-toggle-btn" id="advanced-toggle">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
                    </svg>
                    <span>خيارات متقدمة</span>
                    <svg class="chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Feature Buttons -->
    <div class="feature-controls" id="feature-controls" style="display: none;">
        <button class="feature-button" id="stats-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M18 20V10M12 20V4M6 20v-6"/>
            </svg>
            الإحصائيات
        </button>
        <button class="feature-button" id="heatmap-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2c1 3 2.5 3.5 3.5 4.5A5 5 0 0 1 17 11a5 5 0 1 1-10 0c0-1.5.5-2 1-3 .5 1 2.5 2 3 2 .5-2 1-4 1-8Z"/>
            </svg>
            خريطة الحرارة
        </button>
        <button class="feature-button" id="sound-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/>
                <path d="M15.54 8.46a5 5 0 0 1 0 7.07M19.07 4.93a10 10 0 0 1 0 14.14"/>
            </svg>
            <span class="sound-label">الصوت: إيقاف</span>
        </button>
        <button class="feature-button" id="test-mode-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            اختبار جميع المفاتيح
        </button>
        <button class="feature-button" id="export-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
            </svg>
            تصدير
        </button>
        <button class="feature-button" id="ghost-click-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M9 10h.01M15 10h.01M12 2a8 8 0 0 0-8 8v12l3-3 2 3 3-3 3 3 2-3 3 3V10a8 8 0 0 0-8-8z"/>
            </svg>
            الضغطات الوهمية
        </button>
        <button class="feature-button" id="latency-button">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
            </svg>
            اختبار زمن الاستجابة
        </button>
    </div>

    <!-- الإحصائيات Panel -->
    <div class="stats-panel" id="stats-panel" style="display: none;">
        <div class="stats-header">
            <h3>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 20V10M12 20V4M6 20v-6"/>
                </svg>
                إحصائيات الجلسة
            </h3>
            <button class="close-btn" id="close-stats">&times;</button>
        </div>
        <div class="stats-content">
            <div class="stat-item">
                <span class="stat-label">إجمالي الضغطات</span>
                <span class="stat-value" id="total-keys">0</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">مدة الجلسة</span>
                <span class="stat-value" id="session-time">00:00</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">المفاتيح المختبرة</span>
                <span class="stat-value" id="keys-tested">0/104</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">أكثر مفتاح ضغطًا</span>
                <span class="stat-value" id="most-pressed">لا يوجد</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">أقل مفتاح ضغطًا</span>
                <span class="stat-value" id="least-pressed">لا يوجد</span>
            </div>
        </div>
    </div>

    <!-- كشف الضغطات الوهمية Panel -->
    <div class="stats-panel" id="ghost-panel" style="display: none;">
        <div class="stats-header">
            <h3>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M9 10h.01M15 10h.01M12 2a8 8 0 0 0-8 8v12l3-3 2 3 3-3 3 3 2-3 3 3V10a8 8 0 0 0-8-8z"/>
                </svg>
                كشف الضغطات الوهمية
            </h3>
            <button class="close-btn" id="close-ghost">&times;</button>
        </div>
        <div class="stats-content">
            <div class="stat-item info-box">
                <div class="status-indicator">
                    <div id="ghost-status-dot" class="status-dot ready"></div>
                    <span id="ghost-status-text">جاهز للاختبار</span>
                </div>
                <p class="info-text">
                    <strong>اختبار الضغطات الوهمية</strong><br>
                    لا تلمس لوحة المفاتيح أثناء الاختبار. سيراقب النظام أي ضغطات وهمية أو غير مقصودة.
                </p>
            </div>
            <div class="stat-item">
                <span class="stat-label">مدة الاختبار</span>
                <span class="stat-value mono" id="ghost-timer">00:00</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">الضغطات الوهمية المكتشفة</span>
                <span class="stat-value warning" id="ghost-count">0</span>
            </div>
            <div class="stat-item">
                <span class="stat-label">إجمالي أحداث المفاتيح</span>
                <span class="stat-value" id="ghost-total">0</span>
            </div>
            <div class="stat-item full-width">
                <span class="stat-label">سجل الكشف</span>
                <div id="ghost-log-content" class="log-container">
                    <p class="log-placeholder success">لم يتم اكتشاف ضغطات وهمية. لوحة المفاتيح تعمل بشكل سليم!</p>
                </div>
            </div>
            <div class="button-row">
                <button class="action-btn primary" id="start-ghost-test">بدء الاختبار</button>
                <button class="action-btn" id="stop-ghost-test" disabled>إيقاف الاختبار</button>
                <button class="action-btn" id="clear-ghost-log">مسح السجل</button>
            </div>
        </div>
    </div>

    <!-- اختبار زمن الاستجابة Panel -->
    <div class="stats-panel" id="latency-panel" style="display: none;">
        <div class="stats-header">
            <h3>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                </svg>
                اختبار زمن استجابة لوحة المفاتيح
            </h3>
            <button class="close-btn" id="close-latency">&times;</button>
        </div>
        <div class="stats-content">
            <div class="stat-item info-box">
                <div class="status-indicator">
                    <div id="latency-status-dot" class="status-dot ready"></div>
                    <span id="latency-status-text">جاهز للاختبار</span>
                </div>
                <p class="info-text">
                    <strong>قياس زمن الاستجابة</strong><br>
                    اضغط أي مفتاح لقياس زمن الاستجابة. كلما كان الزمن أقل كانت الاستجابة أفضل.
                </p>
            </div>
            <div class="stat-item latency-display">
                <div id="current-latency" class="big-latency">-- ms</div>
                <div class="latency-sublabel">زمن الاستجابة الحالي</div>
            </div>
            <div class="latency-grid">
                <div class="stat-item compact">
                    <span class="stat-value mono" id="avg-latency">-- ms</span>
                    <span class="stat-label">المتوسط</span>
                </div>
                <div class="stat-item compact">
                    <span class="stat-value mono" id="min-latency">-- ms</span>
                    <span class="stat-label">الأفضل</span>
                </div>
                <div class="stat-item compact">
                    <span class="stat-value mono" id="max-latency">-- ms</span>
                    <span class="stat-label">الأسوأ</span>
                </div>
                <div class="stat-item compact">
                    <span class="stat-value" id="test-count">0</span>
                    <span class="stat-label">الاختبارات</span>
                </div>
            </div>
            <div class="stat-item full-width">
                <span class="stat-label">آخر الاختبارات</span>
                <div id="latency-log-content" class="log-container">
                    <p class="log-placeholder">اضغط أي مفتاح لبدء الاختبار...</p>
                </div>
            </div>
            <div id="latency-rating" class="rating-box">
                سيتم تقييم زمن استجابة لوحة المفاتيح بعد 10 اختبارات
            </div>
            <div class="button-row">
                <button class="action-btn primary" id="start-latency-test">بدء الاختبار</button>
                <button class="action-btn" id="stop-latency-test" disabled>إيقاف الاختبار</button>
                <button class="action-btn" id="clear-latency">مسح النتائج</button>
            </div>
        </div>
    </div>

    <div class="keyboard-container">
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
                    <button class="key" data-key="Backquote"><span>~<br>ذ</span></button>
                    <button class="key" data-key="Digit1"><span>!<br>١</span></button>
                    <button class="key" data-key="Digit2"><span>@<br>٢</span></button>
                    <button class="key" data-key="Digit3"><span>#<br>٣</span></button>
                    <button class="key" data-key="Digit4"><span>$<br>٤</span></button>
                    <button class="key" data-key="Digit5"><span>%<br>٥</span></button>
                    <button class="key" data-key="Digit6"><span>^<br>٦</span></button>
                    <button class="key" data-key="Digit7"><span>&amp;<br>٧</span></button>
                    <button class="key" data-key="Digit8"><span>*<br>٨</span></button>
                    <button class="key" data-key="Digit9"><span>(<br>٩</span></button>
                    <button class="key" data-key="Digit0"><span>)<br>٠</span></button>
                    <button class="key" data-key="Minus"><span>_<br>-</span></button>
                    <button class="key" data-key="Equal"><span>+<br>=</span></button>
                    <button class="key key-2x" data-key="Backspace"><span>Backspace</span></button>
                </div>

                <!-- QWERTY Row -->
                <div class="key-row">
                    <button class="key key-1-5x" data-key="Tab"><span>Tab</span></button>
                    <button class="key" data-key="KeyQ"><span>ض</span></button>
                    <button class="key" data-key="KeyW"><span>ص</span></button>
                    <button class="key" data-key="KeyE"><span>ث</span></button>
                    <button class="key" data-key="KeyR"><span>ق</span></button>
                    <button class="key" data-key="KeyT"><span>ف</span></button>
                    <button class="key" data-key="KeyY"><span>غ</span></button>
                    <button class="key" data-key="KeyU"><span>ع</span></button>
                    <button class="key" data-key="KeyI"><span>ه</span></button>
                    <button class="key" data-key="KeyO"><span>خ</span></button>
                    <button class="key" data-key="KeyP"><span>ح</span></button>
                    <button class="key" data-key="BracketLeft"><span>&lt;<br>ج</span></button>
                    <button class="key" data-key="BracketRight"><span>&gt;<br>د</span></button>
                    <button class="key key-1-5x" data-key="Backslash"><span>|<br>\</span></button>
                    <button class="key" data-key="KeyA"><span>ش</span></button>
                    <button class="key" data-key="KeyS"><span>س</span></button>
                    <button class="key" data-key="KeyD"><span>ي</span></button>
                    <button class="key" data-key="KeyF"><span>ب</span></button>
                    <button class="key" data-key="KeyG"><span>ل</span></button>
                    <button class="key" data-key="KeyH"><span>ا</span></button>
                    <button class="key" data-key="KeyJ"><span>ت</span></button>
                    <button class="key" data-key="KeyK"><span>ن</span></button>
                    <button class="key" data-key="KeyL"><span>م</span></button>
                    <button class="key" data-key="Semicolon"><span>:<br>ك</span></button>
                    <button class="key" data-key="Quote"><span>"<br>ط</span></button>
                    <button class="key key-enter" data-key="Enter"><span>Enter</span></button>
                </div>

                <!-- ZXCV Row -->
                <div class="key-row">
                    <button class="key key-2-25x" data-key="ShiftLeft"><span>Shift</span></button>
                    <button class="key" data-key="KeyZ"><span>ئ</span></button>
                    <button class="key" data-key="KeyX"><span>ء</span></button>
                    <button class="key" data-key="KeyC"><span>ؤ</span></button>
                    <button class="key" data-key="KeyV"><span>ر</span></button>
                    <button class="key" data-key="KeyB"><span>لا</span></button>
                    <button class="key" data-key="KeyN"><span>ى</span></button>
                    <button class="key" data-key="KeyM"><span>ة</span></button>
                    <button class="key" data-key="Comma"><span>,<br>و</span></button>
                    <button class="key" data-key="Period"><span>.<br>ز</span></button>
                    <button class="key" data-key="Slash"><span>؟<br>ظ</span></button>
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
                        <button class="key" data-key="PrintScreen"><span>PrtSc</span></button>
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

    <!-- Progress Bar Section -->
    <div class="progress-section" id="progress-section" style="display: none;">
        <div class="progress-header">
            <div class="progress-title">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <rect x="2" y="4" width="20" height="16" rx="2"/>
                    <path d="M6 8h.01M10 8h.01M14 8h.01"/>
                </svg>
                <h3>تقدم الاختبار</h3>
            </div>
            <div class="progress-stats">
                <span id="progress-count">0</span> / <span>104</span> مفاتيح
                <span class="progress-percentage" id="progress-percentage">0%</span>
            </div>
        </div>
        <div class="progress-bar-container">
            <div class="progress-bar-fill" id="progress-bar-fill"></div>
            <div class="progress-bar-text" id="progress-bar-text">ابدأ اختبار لوحة المفاتيح...</div>
        </div>
        <div class="progress-milestones">
            <div class="milestone" data-milestone="25">
                <div class="milestone-marker"></div>
                <span>25%</span>
            </div>
            <div class="milestone" data-milestone="50">
                <div class="milestone-marker"></div>
                <span>50%</span>
            </div>
            <div class="milestone" data-milestone="75">
                <div class="milestone-marker"></div>
                <span>75%</span>
            </div>
            <div class="milestone" data-milestone="100">
                <div class="milestone-marker"></div>
                <span>100%</span>
            </div>
        </div>
    </div>
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

.stats-header h3 {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--key-text);
    font-size: 18px;
    font-weight: 700;
    margin: 0;
}

.stats-header h3 svg {
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
    padding: 32px;
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
    height: 318px;
}

.nav-top {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.arrow-cluster {
    display: flex;
    flex-direction: column;
    margin-top: auto;
}

.numpad-section { align-self: flex-end; }

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

.progress-title h3 {
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

.progress-bar-container {
    position: relative;
    height: 48px;
    background: var(--bg-tertiary);
    border: 1px solid var(--border-subtle);
    border-radius: 24px;
    overflow: hidden;
    margin-bottom: 16px;
}

.progress-bar-fill {
    height: 100%;
    width: 0%;
    background: linear-gradient(90deg, #00d4ff 0%, #00ff88 50%, #ffd700 100%);
    border-radius: 24px;
    transition: width 0.4s ease;
    position: relative;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 212, 255, 0.4);
}

.progress-bar-fill::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.2) 50%, transparent 100%);
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% { transform: translateX(-100%); }
    100% { transform: translateX(100%); }
}

.progress-bar-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: var(--key-text);
    font-weight: 600;
    font-size: 14px;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
    z-index: 1;
    white-space: nowrap;
}

.progress-milestones {
    display: flex;
    justify-content: space-between;
    padding: 0 12px;
}

.milestone {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
}

.milestone-marker {
    width: 3px;
    height: 10px;
    background: var(--key-border);
    border-radius: 2px;
    transition: all 0.3s ease;
}

.milestone.reached .milestone-marker {
    background: var(--accent-primary);
    box-shadow: 0 0 8px var(--accent-primary);
    height: 14px;
}

.milestone span {
    color: var(--text-muted);
    font-size: 11px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.milestone.reached span { color: var(--accent-primary); }

@media (max-width: 1200px) {
    /* Scaling handled by JavaScript - do NOT change flex-direction */
    .nav-section { height: auto; }
    .numpad-section { align-self: auto; }
    .key { height: 44px; width: 44px; }
    .key-1-25x { width: 55px; }
    .key-1-5x { width: 66px; }
    .key-1-75x { width: 77px; }
    .key-2x { width: 88px; }
    .key-2-25x { width: 99px; }
    .key-enter { width: 105px; }
    .key-shift-right { width: 132px; }
    .key-space { width: 308px; }
    .numpad-grid { grid-template-columns: repeat(4, 44px); grid-template-rows: repeat(5, 44px); }
    .numpad-grid .key-row:nth-child(2) .key-tall, .numpad-grid .key-row:nth-child(4) .key-enter-tall { height: 94px; }
    .numpad-grid .key-row:nth-child(5) .key-2x { width: 94px; }
}

@media (max-width: 768px) {
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
    .progress-bar-container { height: 40px; }
    .key { height: 40px; width: 40px; font-size: 10px; }
    .key span { font-size: 9px; }
    .key-1-25x { width: 50px; }
    .key-1-5x { width: 60px; }
    .key-1-75x { width: 70px; }
    .key-2x { width: 80px; }
    .key-2-25x { width: 90px; }
    .key-enter { width: 95px; }
    .key-shift-right { width: 120px; }
    .key-space { width: 280px; }
    .gap { width: 8px; }
    .numpad-grid { grid-template-columns: repeat(4, 40px); grid-template-rows: repeat(5, 40px); }
    .numpad-grid .key-row:nth-child(2) .key-tall, .numpad-grid .key-row:nth-child(4) .key-enter-tall { height: 86px; }
    .numpad-grid .key-row:nth-child(5) .key-2x { width: 86px; }
}

@media (max-width: 576px) {
    .tool-heading h1 { font-size: 24px; }
    .button-group { grid-template-columns: 1fr; gap: 10px; }
    .reset-button, .theme-selector, .layout-selector, .os-selector { width: 100%; }
    .big-latency { font-size: 40px; }
    .key { height: 36px; width: 36px; }
    .key-1-25x { width: 45px; }
    .key-1-5x { width: 54px; }
    .key-1-75x { width: 63px; }
    .key-2x { width: 72px; }
    .key-2-25x { width: 81px; }
    .key-enter { width: 86px; }
    .key-shift-right { width: 108px; }
    .key-space { width: 252px; }
    .numpad-grid { grid-template-columns: repeat(4, 36px); grid-template-rows: repeat(5, 36px); }
    .numpad-grid .key-row:nth-child(2) .key-tall, .numpad-grid .key-row:nth-child(4) .key-enter-tall { height: 78px; }
    .numpad-grid .key-row:nth-child(5) .key-2x { width: 78px; }
}

/* RTL Adjustments */
.keyboard-tester[dir="rtl"] {
    direction: rtl;
    text-align: right;
}
.keyboard-tester[dir="rtl"] .textarea-label {
    left: auto;
    right: 12px;
    text-align: right;
}
.keyboard-tester[dir="rtl"] .text-box {
    direction: rtl;
    text-align: right;
}
.keyboard-tester[dir="rtl"] .select-wrapper label,
.keyboard-tester[dir="rtl"] .stat-item,
.keyboard-tester[dir="rtl"] .info-text,
.keyboard-tester[dir="rtl"] .progress-header {
    text-align: right;
}
.keyboard-tester[dir="rtl"] .keyboard-layout {
    direction: ltr;
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
    
    const progressBarFill = document.getElementById('progress-bar-fill');
    const progressBarText = document.getElementById('progress-bar-text');
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
    const TOTAL_KEYS = 104;

    const keyboardLayouts = {
        arabic: {
            Backquote: '~<br>ذ',
            Digit1: '!<br>١',
            Digit2: '@<br>٢',
            Digit3: '#<br>٣',
            Digit4: '$<br>٤',
            Digit5: '%<br>٥',
            Digit6: '^<br>٦',
            Digit7: '&amp;<br>٧',
            Digit8: '*<br>٨',
            Digit9: '(<br>٩',
            Digit0: ')<br>٠',
            Minus: '_<br>-',
            Equal: '+<br>=',
            BracketLeft: '&lt;<br>ج',
            BracketRight: '&gt;<br>د',
            Backslash: '|<br>\\',
            Semicolon: ':<br>ك',
            Quote: '"<br>ط',
            Comma: ',<br>و',
            Period: '.<br>ز',
            Slash: '؟<br>ظ',
            KeyQ: 'ض',
            KeyW: 'ص',
            KeyE: 'ث',
            KeyR: 'ق',
            KeyT: 'ف',
            KeyY: 'غ',
            KeyU: 'ع',
            KeyI: 'ه',
            KeyO: 'خ',
            KeyP: 'ح',
            KeyA: 'ش',
            KeyS: 'س',
            KeyD: 'ي',
            KeyF: 'ب',
            KeyG: 'ل',
            KeyH: 'ا',
            KeyJ: 'ت',
            KeyK: 'ن',
            KeyL: 'م',
            KeyZ: 'ئ',
            KeyX: 'ء',
            KeyC: 'ؤ',
            KeyV: 'ر',
            KeyB: 'لا',
            KeyN: 'ى',
            KeyM: 'ة'
        },
        
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

    function updateProgressBar() {
        const keysPressed = Object.keys(keyPressCount).length;
        const percentage = Math.round((keysPressed / TOTAL_KEYS) * 100);
        progressCount.textContent = keysPressed;
        progressPercentage.textContent = `${percentage}%`;
        progressBarFill.style.width = `${percentage}%`;
        if (percentage === 0) progressBarText.textContent = 'ابدأ اختبار لوحة المفاتيح...';
        else if (percentage < 25) progressBarText.textContent = 'بداية جيدة! تابع...';
        else if (percentage < 50) progressBarText.textContent = 'تقدم جيد! اكتملت 25%';
        else if (percentage < 75) progressBarText.textContent = 'لقد وصلت إلى المنتصف! واصل الاختبار';
        else if (percentage < 100) progressBarText.textContent = 'قاربنا على الانتهاء! اكتملت 75%';
        else progressBarText.textContent = '🎉 تم اختبار جميع المفاتيح! ممتاز!';
        document.querySelectorAll('.milestone').forEach(milestone => {
            const milestoneValue = parseInt(milestone.getAttribute('data-milestone'));
            milestone.classList.toggle('reached', percentage >= milestoneValue);
        });
    }

    function updateStatistics() {
        const keysPressed = Object.keys(keyPressCount).length;
        document.getElementById('total-keys').textContent = totalKeyPresses;
        document.getElementById('keys-tested').textContent = `${keysPressed}/${TOTAL_KEYS}`;
        let maxKey = null, maxCount = 0;
        for (const [key, count] of Object.entries(keyPressCount)) { if (count > maxCount) { maxCount = count; maxKey = key; } }
        document.getElementById('most-pressed').textContent = maxKey ? `${maxKey} (${maxCount}x)` : 'لا يوجد';
        let minKey = null, minCount = Infinity;
        for (const [key, count] of Object.entries(keyPressCount)) { if (count < minCount) { minCount = count; minKey = key; } }
        document.getElementById('least-pressed').textContent = minKey ? `${minKey} (${minCount}x)` : 'لا يوجد';
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
        let exportText = '=== نتائج اختبار لوحة المفاتيح ===\n\n';
        exportText += `مدة الجلسة: ${minutes}:${seconds.toString().padStart(2, '0')}\n`;
        exportText += `إجمالي الضغطات: ${totalKeyPresses}\n`;
        exportText += `المفاتيح الفريدة المختبرة: ${keysPressed}/${TOTAL_KEYS} (${percentage}%)\n\n`;
        exportText += '--- عدد الضغطات لكل مفتاح ---\n';
        Object.entries(keyPressCount).sort((a, b) => b[1] - a[1]).forEach(([key, count]) => { exportText += `${key}: ${count}\n`; });
        exportText += `\n--- سجل ضغطات المفاتيح ---\n${keyHistory.value}`;
        const blob = new Blob([exportText], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `keyboard-test-ar-${Date.now()}.txt`;
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
    // Always start with the Arabic layout on the Arabic page.
    const savedLayout = 'arabic';
    const savedOS = localStorage.getItem('keyboardOS') || 'windows';
    keyboardTester.setAttribute('data-theme', savedTheme);
    themeSelector.value = savedTheme;
    layoutSelector.value = savedLayout;
    osSelector.value = savedOS;
    updateKeyboardLayout(savedLayout);
    localStorage.setItem('keyboardLayout_ar', savedLayout);
    updateOSKeys(savedOS);
    sessionTimerInterval = setInterval(updateSessionTimer, 1000);

    themeSelector.addEventListener('change', (e) => { keyboardTester.setAttribute('data-theme', e.target.value); localStorage.setItem('keyboardTheme', e.target.value); });
    layoutSelector.addEventListener('change', (e) => { updateKeyboardLayout(e.target.value); localStorage.setItem('keyboardLayout_ar', e.target.value); });
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
    soundButton.addEventListener('click', () => { soundEnabled = !soundEnabled; soundButton.classList.toggle('active'); soundButton.querySelector('.sound-label').textContent = soundEnabled ? 'الصوت: تشغيل' : 'الصوت: إيقاف'; });
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
        ghostStatusText.textContent = 'الاختبار جارٍ - لا تلمس لوحة المفاتيح!';
        ghostCount.textContent = '0';
        ghostTotal.textContent = '0';
        ghostLogContent.innerHTML = '<p class="log-placeholder" style="color: var(--accent-warning);">جارٍ مراقبة الضغطات الوهمية...</p>';
        startGhostTest.disabled = true;
        stopGhostTest.disabled = false;
        ghostClickButton.classList.add('active');
        ghostTestInterval = setInterval(updateGhostTimer, 100);
    }

    function stopGhostClickTestFunc() {
        ghostTestActive = false;
        clearInterval(ghostTestInterval);
        ghostStatusDot.className = ghostClicksDetected === 0 ? 'status-dot ready' : 'status-dot error';
        ghostStatusText.textContent = ghostClicksDetected === 0 ? 'اكتمل الاختبار - لا مشاكل!' : `اكتمل الاختبار - تم العثور على ${ghostClicksDetected} ضغطة وهمية`;
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
        logEntry.innerHTML = `<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;"><span style="color: var(--text-muted); font-size: 10px;">${timestamp}</span><span style="background: rgba(239, 68, 68, 0.2); padding: 2px 8px; border-radius: 4px; font-size: 10px; font-weight: 700; color: var(--accent-danger);">ضغطة وهمية</span></div><div>المفتاح المكتشف: <span style="color: var(--accent-danger); font-weight: 700;">${keyCode}</span></div>`;
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
        ghostLogContent.innerHTML = '<p class="log-placeholder success">لم يتم اكتشاف ضغطات وهمية. لوحة المفاتيح تعمل بشكل سليم!</p>';
        ghostStatusDot.className = 'status-dot ready';
        ghostStatusText.textContent = 'جاهز للاختبار';
        ghostTimer.textContent = '00:00';
    }

    function startLatencyTestFunc() {
        latencyTestActive = true;
        latencyTests = [];
        latencyStatusDot.className = 'status-dot active';
        latencyStatusText.textContent = 'الاختبار جارٍ - اضغط أي مفتاح';
        latencyButton.classList.add('active');
        startLatencyTest.disabled = true;
        stopLatencyTest.disabled = false;
        currentLatency.textContent = '-- ms';
        avgLatency.textContent = '-- ms';
        minLatency.textContent = '-- ms';
        maxLatency.textContent = '-- ms';
        testCount.textContent = '0';
        latencyLogContent.innerHTML = '<p class="log-placeholder">اضغط المفاتيح لقياس زمن الاستجابة...</p>';
        updateLatencyRating();
    }

    function stopLatencyTestFunc() {
        latencyTestActive = false;
        latencyStatusDot.className = 'status-dot ready';
        latencyStatusText.textContent = 'اكتمل الاختبار';
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
        const performanceLabel = latency < 5 ? 'ممتاز' : latency > 15 ? 'بطيء' : 'جيد';
        const labelColor = latency < 5 ? 'var(--accent-success)' : latency > 15 ? 'var(--accent-warning)' : 'var(--accent-primary)';
        logEntry.className = `log-entry ${entryClass}`;
        logEntry.innerHTML = `<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;"><span style="color: var(--text-muted); font-size: 10px;">${latencyTests[latencyTests.length - 1].timestamp}</span><span style="background: ${latency < 5 ? 'rgba(16, 185, 129, 0.2)' : latency > 15 ? 'rgba(245, 158, 11, 0.2)' : 'rgba(99, 102, 241, 0.2)'}; padding: 2px 8px; border-radius: 4px; font-size: 10px; font-weight: 700; color: ${labelColor};">${performanceLabel}</span></div><div style="display: flex; justify-content: space-between; align-items: center;"><span>المفتاح: <span style="font-weight: 700;">${event.code}</span></span><span style="color: ${labelColor}; font-weight: 700; font-size: 14px;">${latency.toFixed(2)} ms</span></div>`;
        if (latencyLogContent.querySelector('.log-placeholder')) latencyLogContent.innerHTML = '';
        latencyLogContent.insertBefore(logEntry, latencyLogContent.firstChild);
        while (latencyLogContent.children.length > 20) latencyLogContent.removeChild(latencyLogContent.lastChild);
        if (latencyTests.length >= 10) updateLatencyRating();
    }

    function updateLatencyRating() {
        if (latencyTests.length < 10) { latencyRating.className = 'rating-box'; latencyRating.innerHTML = 'سيتم تقييم زمن استجابة لوحة المفاتيح بعد 10 اختبارات'; return; }
        const avg = latencyTests.reduce((sum, t) => sum + t.latency, 0) / latencyTests.length;
        let ratingClass, message;
        if (avg < 5) { ratingClass = 'excellent'; message = '🏆 <strong>ممتاز!</strong> زمن استجابة لوحة المفاتيح احترافي.'; }
        else if (avg < 10) { ratingClass = 'good'; message = '✅ <strong>جيد!</strong> زمن الاستجابة مناسب للاستخدام العام.'; }
        else if (avg < 20) { ratingClass = 'fair'; message = '⚠️ <strong>مقبول.</strong> مناسب لكنه قد يبدو بطيئًا للألعاب.'; }
        else { ratingClass = 'poor'; message = '❌ <strong>ضعيف.</strong> جرّب فحص التعريفات أو استبدال لوحة المفاتيح.'; }
        latencyRating.className = `rating-box ${ratingClass}`;
        latencyRating.innerHTML = `<p style="margin: 0 0 8px 0;">${message}</p><p style="margin: 0; color: var(--text-muted);">متوسط زمن الاستجابة: ${avg.toFixed(2)} ms</p>`;
    }

    function clearLatencyResultsFunc() {
        latencyTests = [];
        currentLatency.textContent = '-- ms';
        avgLatency.textContent = '-- ms';
        minLatency.textContent = '-- ms';
        maxLatency.textContent = '-- ms';
        testCount.textContent = '0';
        latencyLogContent.innerHTML = '<p class="log-placeholder">اضغط أي مفتاح لبدء الاختبار...</p>';
        latencyRating.className = 'rating-box';
        latencyRating.innerHTML = 'سيتم تقييم زمن استجابة لوحة المفاتيح بعد 10 اختبارات';
    }

    // Responsive keyboard scaling
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

        const containerPadding = 64; // 32px * 2
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
echo ob_get_clean();
?>
