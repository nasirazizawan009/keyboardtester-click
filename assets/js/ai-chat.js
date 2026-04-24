/* KBT AI Chat Widget v2.3 — model picker + drag + scroll-bounce + language switcher */
(function () {
    'use strict';

    var ENDPOINT = window.KBT_CHAT_ENDPOINT || '/ai-chat.php';
    var history  = [];
    var busy     = false;
    var currentLang  = 'en';

    var LANGUAGES = [
        { code: 'en', flag: '🇬🇧', name: 'English',   label: 'EN' },
        { code: 'es', flag: '🇪🇸', name: 'Español',   label: 'ES' },
        { code: 'fr', flag: '🇫🇷', name: 'Français',  label: 'FR' },
        { code: 'de', flag: '🇩🇪', name: 'Deutsch',   label: 'DE' },
        { code: 'ja', flag: '🇯🇵', name: '日本語',     label: 'JP' },
        { code: 'ko', flag: '🇰🇷', name: '한국어',     label: 'KO' },
        { code: 'pt', flag: '🇧🇷', name: 'Português', label: 'PT' },
        { code: 'ar', flag: '🇸🇦', name: 'العربية',   label: 'AR' },
    ];

    var WELCOME = {
        en: '👋 Hi! I\'m your KBT Assistant. Ask me about any tool on **KeyboardTester.click** — I\'ll point you to the right one and explain how to use it! 😄\n\n🌐 *Tip: You can chat in your own language! Tap the **🌐 EN** button above to switch.*',
        es: '👋 ¡Hola! Soy tu Asistente KBT 🤖 Pregúntame sobre cualquier herramienta en **KeyboardTester.click** — ¡te ayudaré a encontrar la correcta!\n\n🌐 *Puedes chatear en tu idioma. Pulsa el botón **🌐** de arriba para cambiar de idioma.*',
        fr: '👋 Salut! Je suis votre Assistant KBT 🤖 Posez-moi des questions sur les outils de **KeyboardTester.click** — je vous guiderai!\n\n🌐 *Vous pouvez chatter dans votre langue. Cliquez sur le bouton **🌐** en haut pour changer.*',
        de: '👋 Hallo! Ich bin dein KBT-Assistent 🤖 Frag mich nach einem Tool auf **KeyboardTester.click** — ich helfe dir weiter!\n\n🌐 *Du kannst auf Deutsch chatten! Klick oben auf den **🌐**-Button zum Wechseln.*',
        ja: '👋 こんにちは！KBTアシスタントです 🤖 **KeyboardTester.click** のツールについて何でも聞いてください！\n\n🌐 *上の **🌐** ボタンで言語を切り替えられます。日本語でどうぞ！*',
        ko: '👋 안녕하세요! KBT 어시스턴트입니다 🤖 **KeyboardTester.click**의 도구에 대해 무엇이든 물어보세요!\n\n🌐 *위의 **🌐** 버튼을 눌러 언어를 바꿀 수 있어요. 한국어로 대화해요!*',
        pt: '👋 Olá! Sou o seu Assistente KBT 🤖 Pergunte-me sobre qualquer ferramenta em **KeyboardTester.click**!\n\n🌐 *Você pode conversar em português! Clique no botão **🌐** acima para mudar o idioma.*',
        ar: '👋 مرحباً! أنا مساعد KBT 🤖 اسألني عن أي أداة على **KeyboardTester.click** وسأرشدك!\n\n🌐 *يمكنك الدردشة بالعربية! انقر على زر **🌐** في الأعلى لتغيير اللغة.*',
    };

    var SUGGESTIONS = {
        en: ['What tools are available?', 'How do I test my DPI?', 'Check dead pixels', 'Test my microphone'],
        es: ['¿Qué herramientas hay?', 'Probar mi ratón DPI', 'Verificar píxeles muertos', 'Probar micrófono'],
        fr: ['Quels outils sont disponibles?', 'Tester mon DPI', 'Tester les pixels morts', 'Tester le micro'],
        de: ['Welche Tools gibt es?', 'Meine DPI testen', 'Tote Pixel prüfen', 'Mikrofon testen'],
        ja: ['どんなツールがありますか？', 'DPIをテストしたい', '死んだピクセルを確認', 'マイクをテスト'],
        ko: ['어떤 도구가 있나요?', 'DPI 테스트하기', '죽은 픽셀 확인', '마이크 테스트'],
        pt: ['Quais ferramentas existem?', 'Testar meu DPI', 'Verificar pixels mortos', 'Testar microfone'],
        ar: ['ما هي الأدوات المتاحة؟', 'اختبار حساسية الفأرة', 'فحص البكسل الميت', 'اختبار الميكروفون'],
    };

    var PLACEHOLDER = {
        en: 'Ask about our tools…',
        es: 'Pregunta sobre nuestras herramientas…',
        fr: 'Posez une question sur nos outils…',
        de: 'Frag nach unseren Tools…',
        ja: 'ツールについて質問してください…',
        ko: '도구에 대해 질문하세요…',
        pt: 'Pergunte sobre nossas ferramentas…',
        ar: 'اسأل عن أدواتنا…',
    };

    var NAME_PROMPT = {
        en: 'Before we dive in — what should I call you? 😊 (Totally optional, just hit Skip!)',
        es: '¡Antes de empezar — cómo debería llamarte? 😊 (¡Opcional, puedes omitirlo!)',
        fr: 'Avant de commencer — comment devrais-je vous appeler? 😊 (Facultatif, passez si vous voulez!)',
        de: 'Bevor wir anfangen — wie soll ich dich nennen? 😊 (Optional, einfach überspringen!)',
        ja: '始める前に — なんとお呼びすればいいですか？ 😊 （任意です、スキップしても大丈夫！）',
        ko: '시작하기 전에 — 어떻게 불러드릴까요? 😊 (선택 사항이에요, 건너뛰셔도 돼요!)',
        pt: 'Antes de começar — como devo te chamar? 😊 (Opcional, pode pular!)',
        ar: 'قبل أن نبدأ — كيف يجب أن أناديك؟ 😊 (اختياري تمامًا، يمكنك التخطي!)',
    };

    var NAME_ACK = {
        en: function(n){ return 'Great to meet you, **' + n + '**! 🎉 Now, what can I help you with today?'; },
        es: function(n){ return '¡Encantado de conocerte, **' + n + '**! 🎉 ¿En qué puedo ayudarte hoy?'; },
        fr: function(n){ return 'Ravi de vous rencontrer, **' + n + '**! 🎉 En quoi puis-je vous aider?'; },
        de: function(n){ return 'Schön, dich kennenzulernen, **' + n + '**! 🎉 Womit kann ich dir heute helfen?'; },
        ja: function(n){ return '**' + n + '**さん、よろしくお願いします！ 🎉 今日は何をお手伝いできますか？'; },
        ko: function(n){ return '**' + n + '**님, 만나서 반가워요! 🎉 오늘 무엇을 도와드릴까요?'; },
        pt: function(n){ return 'Prazer em conhecê-lo, **' + n + '**! 🎉 Em que posso ajudar hoje?'; },
        ar: function(n){ return 'يسعدني لقاؤك، **' + n + '**! 🎉 كيف يمكنني مساعدتك اليوم؟'; },
    };

    var SKIP_LABEL = {
        en: 'Skip →', es: 'Omitir →', fr: 'Passer →', de: 'Überspringen →',
        ja: 'スキップ →', ko: '건너뛰기 →', pt: 'Pular →', ar: '← تخطي',
    };

    var namePending = false;   // true while waiting for user's name

    // ── Build HTML ──────────────────────────────────────────────────────────
    var langOptions = LANGUAGES.map(function (l) {
        return '<button class="kbt-lang-option" data-code="' + l.code + '" data-label="' + l.label + '" data-flag="' + l.flag + '">' +
               '<span>' + l.flag + '</span><span>' + l.name + '</span>' +
               '</button>';
    }).join('');

    var html = [
        '<button class="kbt-chat-btn" id="kbtChatBtn" aria-label="Ask KBT Assistant" aria-expanded="false">',
        '  <span class="kbt-ring"></span>',
        '  <img class="kbt-chat-robot" src="' + (window.KBT_ROBOT_IMG || '/images/robot_18357793.png') + '" width="42" height="42" alt="KBT Bot">',
        '  <span class="kbt-close-badge" aria-hidden="true">✕</span>',
        '  <span class="kbt-chat-dot" aria-hidden="true"></span>',
        '</button>',
        '<div class="kbt-chat-window" id="kbtChatWindow" role="dialog" aria-label="KBT AI Assistant">',
        '  <div class="kbt-chat-header" id="kbtChatHeader">',
        '    <div class="kbt-chat-header-info">',
        '      <img class="kbt-chat-avatar-img" src="' + (window.KBT_ROBOT_IMG || '/images/robot_18357793.png') + '" width="36" height="36" alt="KBT Bot">',
        '      <div>',
        '        <div class="kbt-chat-header-name">KBT Assistant</div>',
        '        <div class="kbt-chat-header-status">Online — powered by Groq</div>',
        '      </div>',
        '    </div>',
        '    <div class="kbt-chat-header-actions">',
        '      <div class="kbt-lang-picker" id="kbtLangPicker">',
        '        <button class="kbt-lang-btn" id="kbtLangBtn" title="Switch language">🌐 EN</button>',
        '        <div class="kbt-lang-dropdown" id="kbtLangDropdown">' + langOptions + '</div>',
        '      </div>',
        '      <button class="kbt-chat-close" id="kbtChatClose" aria-label="Close chat">✕</button>',
        '    </div>',
        '  </div>',
        '  <div class="kbt-chat-messages" id="kbtChatMessages"></div>',
        '  <div class="kbt-chat-suggestions" id="kbtChatSuggestions"></div>',
        '  <div class="kbt-chat-input-row">',
        '    <input type="text" class="kbt-chat-input" id="kbtChatInput" placeholder="Ask about our tools…" maxlength="350" autocomplete="off">',
        '    <button class="kbt-chat-send" id="kbtChatSend" aria-label="Send">',
        '      <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>',
        '    </button>',
        '  </div>',
        '</div>'
    ].join('\n');

    var wrap = document.createElement('div');
    wrap.innerHTML = html;
    document.body.appendChild(wrap);

    var btn          = document.getElementById('kbtChatBtn');
    var win          = document.getElementById('kbtChatWindow');
    var winHeader    = document.getElementById('kbtChatHeader');
    var closeBtn     = document.getElementById('kbtChatClose');
    var msgs         = document.getElementById('kbtChatMessages');
    var input        = document.getElementById('kbtChatInput');
    var sendBtn      = document.getElementById('kbtChatSend');
    var suggestions  = document.getElementById('kbtChatSuggestions');
    var langPicker   = document.getElementById('kbtLangPicker');
    var langBtn      = document.getElementById('kbtLangBtn');
    var langDropdown = document.getElementById('kbtLangDropdown');

    var opened = false;

    // ── Drag chat WINDOW by its header ──────────────────────────────────────
    var winDragOffX = 0, winDragOffY = 0;

    function onWinDragStart(e) {
        // Don't start if clicking a button/input inside header
        if (e.target.closest('button, input')) return;
        var p = e.touches ? e.touches[0] : e;
        var r = win.getBoundingClientRect();
        winDragOffX = p.clientX - r.left;
        winDragOffY = p.clientY - r.top;
        win.classList.add('kbt-win-dragging');
        document.addEventListener('mousemove', onWinDragMove);
        document.addEventListener('mouseup',   onWinDragEnd);
        document.addEventListener('touchmove', onWinDragMove, { passive: false });
        document.addEventListener('touchend',  onWinDragEnd);
    }
    function onWinDragMove(e) {
        var p = e.touches ? e.touches[0] : e;
        if (e.cancelable) e.preventDefault();
        var ww = win.offsetWidth, wh = win.offsetHeight;
        var x = Math.max(0, Math.min(p.clientX - winDragOffX, window.innerWidth  - ww));
        var y = Math.max(0, Math.min(p.clientY - winDragOffY, window.innerHeight - wh));
        win.style.left = x + 'px';
        win.style.top  = y + 'px';
    }
    function onWinDragEnd() {
        win.classList.remove('kbt-win-dragging');
        document.removeEventListener('mousemove', onWinDragMove);
        document.removeEventListener('mouseup',   onWinDragEnd);
        document.removeEventListener('touchmove', onWinDragMove);
        document.removeEventListener('touchend',  onWinDragEnd);
    }
    winHeader.addEventListener('mousedown',  onWinDragStart);
    winHeader.addEventListener('touchstart', onWinDragStart, { passive: true });

    // ── Drag-and-drop (floating button) ─────────────────────────────────────
    var dragOffsetX = 0, dragOffsetY = 0;
    var dragging    = false;
    var didDrag     = false;   // distinguishes click from drag
    var DRAG_THRESHOLD = 6;    // px before we consider it a drag
    var downX = 0, downY = 0;

    function getPointer(e) {
        return e.touches ? e.touches[0] : e;
    }

    function getBtnRect() {
        return btn.getBoundingClientRect();
    }

    // Restore saved position from localStorage
    (function restorePos() {
        try {
            var saved = JSON.parse(localStorage.getItem('kbt_btn_pos'));
            if (saved && typeof saved.x === 'number' && typeof saved.y === 'number') {
                // Clamp to current viewport in case screen size changed
                var bw = 62, bh = 62;
                var x = Math.max(0, Math.min(saved.x, window.innerWidth  - bw));
                var y = Math.max(0, Math.min(saved.y, window.innerHeight - bh));
                btn.style.left   = x + 'px';
                btn.style.top    = y + 'px';
                btn.style.right  = 'auto';
                btn.style.bottom = 'auto';
            }
        } catch(e) {}
    })();

    function onPointerDown(e) {
        // Only start drag on left mouse / first touch
        if (e.button !== undefined && e.button !== 0) return;
        var p = getPointer(e);
        downX = p.clientX;
        downY = p.clientY;
        var r = getBtnRect();
        dragOffsetX = p.clientX - r.left;
        dragOffsetY = p.clientY - r.top;
        dragging = false;
        didDrag  = false;
        document.addEventListener('mousemove', onPointerMove);
        document.addEventListener('mouseup',   onPointerUp);
        document.addEventListener('touchmove', onPointerMove, { passive: false });
        document.addEventListener('touchend',  onPointerUp);
    }

    function onPointerMove(e) {
        var p = getPointer(e);
        var dx = p.clientX - downX;
        var dy = p.clientY - downY;

        if (!dragging && Math.sqrt(dx*dx + dy*dy) < DRAG_THRESHOLD) return;

        if (e.cancelable) e.preventDefault();
        dragging = true;
        didDrag  = true;
        btn.classList.add('kbt-dragging');

        var bw = btn.offsetWidth;
        var bh = btn.offsetHeight;
        var x  = Math.max(0, Math.min(p.clientX - dragOffsetX, window.innerWidth  - bw));
        var y  = Math.max(0, Math.min(p.clientY - dragOffsetY, window.innerHeight - bh));

        btn.style.left   = x + 'px';
        btn.style.top    = y + 'px';
        btn.style.right  = 'auto';
        btn.style.bottom = 'auto';

        // If chat is open, reposition window in real time
        if (win.classList.contains('is-open')) positionWindow();
    }

    function onPointerUp() {
        document.removeEventListener('mousemove', onPointerMove);
        document.removeEventListener('mouseup',   onPointerUp);
        document.removeEventListener('touchmove', onPointerMove);
        document.removeEventListener('touchend',  onPointerUp);
        btn.classList.remove('kbt-dragging');
        dragging = false;

        if (didDrag) {
            var r = getBtnRect();
            try { localStorage.setItem('kbt_btn_pos', JSON.stringify({ x: r.left, y: r.top })); } catch(e) {}
        }
    }

    btn.addEventListener('mousedown',  onPointerDown);
    btn.addEventListener('touchstart', onPointerDown, { passive: true });

    // ── Position chat window near button ────────────────────────────────────
    function positionWindow() {
        var r      = getBtnRect();
        var ww     = 360;
        var wh     = 520;
        var margin = 12;
        var vw     = window.innerWidth;
        var vh     = window.innerHeight;

        // Prefer opening above the button
        var top = r.top - wh - margin;
        if (top < margin) top = r.bottom + margin;        // not enough space above → open below
        if (top + wh > vh - margin) top = vh - wh - margin; // clamp bottom

        // Align right edge of window with right edge of button
        var left = r.right - ww;
        if (left < margin) left = margin;                  // clamp left edge
        if (left + ww > vw - margin) left = vw - ww - margin;

        win.style.top    = Math.max(margin, top) + 'px';
        win.style.left   = left + 'px';
        win.style.bottom = 'auto';
        win.style.right  = 'auto';
    }

    // ── Scroll bounce ───────────────────────────────────────────────────────
    var scrollTimer = null;
    var bouncePending = false;
    window.addEventListener('scroll', function () {
        if (win.classList.contains('is-open')) return;
        if (bouncePending) return;
        bouncePending = true;
        btn.classList.remove('kbt-scroll-bounce');
        requestAnimationFrame(function () {
            btn.classList.add('kbt-scroll-bounce');
            bouncePending = false;
        });
        clearTimeout(scrollTimer);
        scrollTimer = setTimeout(function () {
            btn.classList.remove('kbt-scroll-bounce');
        }, 700);
    }, { passive: true });

    // ── Persistence (localStorage) ─────────────────────────────────────────
    var STORE_KEY = 'kbt_chat_v2';
    var MAX_MSGS  = 40;   // max messages to keep
    var FRESH_MS  = 60 * 60 * 1000;  // 1 hour = "same session"

    function persist_save() {
        try {
            var data = JSON.parse(localStorage.getItem(STORE_KEY) || '{}');
            data.messages  = history.slice(-MAX_MSGS);
            data.lang      = currentLang;
            data.model     = currentModel;
            data.ts        = Date.now();
            if (!data.firstVisit) data.firstVisit = Date.now();
            data.visits    = (data.visits || 0);   // incremented on first open
            localStorage.setItem(STORE_KEY, JSON.stringify(data));
        } catch(e) {}
    }

    function persist_load() {
        try { return JSON.parse(localStorage.getItem(STORE_KEY) || '{}'); }
        catch(e) { return {}; }
    }

    function persist_saveUserInfo(text) {
        // Detect name: "I'm X", "my name is X", "I am X", "call me X"
        var m = text.match(/(?:i['']?m|i am|my name is|call me)\s+([A-Z][a-z]{1,20})/i);
        if (!m) return;
        try {
            var data = persist_load();
            if (!data.user) data.user = {};
            data.user.name = m[1];
            localStorage.setItem(STORE_KEY, JSON.stringify(data));
        } catch(e) {}
    }

    function persist_getUserContext() {
        var data = persist_load();
        var parts = [];
        if (data.user && data.user.name) parts.push('User name: ' + data.user.name);
        if (data.visits > 1) parts.push('Return visitor (visit #' + data.visits + ')');
        if (data.lang && data.lang !== 'en') parts.push('Preferred language: ' + data.lang);
        return parts.join('. ');
    }

    // Render saved messages back into the chat bubble UI
    function persist_renderMessages(messages) {
        messages.forEach(function(m) {
            if (m.role === 'user') {
                var el = document.createElement('div');
                el.className = 'kbt-msg kbt-msg-user';
                el.textContent = m.content;
                msgs.appendChild(el);
            } else {
                var el = document.createElement('div');
                el.className = 'kbt-msg kbt-msg-bot';
                el.innerHTML = renderMarkdown(m.content);
                msgs.appendChild(el);
            }
        });
        scrollDown();
    }

    // ── Language switcher ───────────────────────────────────────────────────
    function renderSuggestions(lang) {
        var chips = (SUGGESTIONS[lang] || SUGGESTIONS.en).map(function (s) {
            return '<button class="kbt-chip">' + s + '</button>';
        }).join('');
        suggestions.innerHTML = chips;
        suggestions.classList.remove('hidden');
    }

    function switchLang(code, flag, label) {
        currentLang = code;
        langBtn.textContent = flag + ' ' + label;
        langDropdown.classList.remove('open');

        var isRtl = (code === 'ar');
        msgs.style.direction  = isRtl ? 'rtl' : 'ltr';
        input.style.direction = isRtl ? 'rtl' : 'ltr';
        input.style.textAlign = isRtl ? 'right' : 'left';
        input.placeholder = PLACEHOLDER[code] || PLACEHOLDER.en;

        history = [];
        msgs.innerHTML = '';
        renderSuggestions(code);
        addBotMsg(WELCOME[code] || WELCOME.en);
        persist_save();   // save language preference
        input.focus();
    }

    langBtn.addEventListener('click', function (e) {
        e.stopPropagation();
        langDropdown.classList.toggle('open');
    });

    langDropdown.addEventListener('click', function (e) {
        var opt = e.target.closest('.kbt-lang-option');
        if (!opt) return;
        switchLang(opt.dataset.code, opt.dataset.flag, opt.dataset.label);
    });

    // Close lang dropdown on outside click
    document.addEventListener('click', function (e) {
        if (!langPicker.contains(e.target)) langDropdown.classList.remove('open');
    });

    // ── Open / close ────────────────────────────────────────────────────────
    function openChat() {
        positionWindow();
        win.classList.add('is-open');
        btn.classList.add('is-open');
        btn.setAttribute('aria-expanded', 'true');

        if (!opened) {
            opened = true;
            var saved = persist_load();

            // Restore saved language
            if (saved.lang && saved.lang !== 'en') {
                var lObj = LANGUAGES.filter(function(l){ return l.code === saved.lang; })[0];
                if (lObj) {
                    currentLang = lObj.code;
                    langBtn.textContent = lObj.flag + ' ' + lObj.label;
                    var isRtl = (lObj.code === 'ar');
                    msgs.style.direction  = isRtl ? 'rtl' : 'ltr';
                    input.style.direction = isRtl ? 'rtl' : 'ltr';
                    input.style.textAlign = isRtl ? 'right' : 'left';
                    input.placeholder = PLACEHOLDER[lObj.code] || PLACEHOLDER.en;
                }
            }

            var hasSaved   = saved.messages && saved.messages.length > 0;
            var isFresh    = hasSaved && (Date.now() - (saved.ts || 0)) < FRESH_MS;
            var isReturner = hasSaved && !isFresh;
            var userName   = saved.user && saved.user.name ? saved.user.name : null;

            // Increment visit counter
            try {
                saved.visits = (saved.visits || 0) + 1;
                localStorage.setItem(STORE_KEY, JSON.stringify(saved));
            } catch(e) {}

            if (isFresh && hasSaved) {
                // Resume same session — restore messages silently
                history = saved.messages.slice();
                persist_renderMessages(history);
                var resumeNote = document.createElement('div');
                resumeNote.className = 'kbt-msg kbt-msg-system';
                resumeNote.textContent = '— Chat restored —';
                msgs.appendChild(resumeNote);
                scrollDown();
            } else if (isReturner) {
                // Return visitor — personalised welcome
                history = saved.messages.slice(-10);
                var greeting = userName ? '👋 Welcome back, **' + userName + '**! ' : '👋 Welcome back! ';
                greeting += 'Great to see you again 😄 I remember our last chat. Feel free to pick up where we left off or ask me anything new about **KeyboardTester.click**!';
                renderSuggestions(currentLang);
                addBotMsg(greeting);
            } else {
                // Brand new visitor — welcome + ask for name
                addBotMsg(WELCOME[currentLang] || WELCOME.en);
                setTimeout(function () {
                    namePending = true;
                    addBotMsg(NAME_PROMPT[currentLang] || NAME_PROMPT.en);
                    // Show Skip chip
                    var skipLabel = SKIP_LABEL[currentLang] || SKIP_LABEL.en;
                    suggestions.innerHTML = '<button class="kbt-chip kbt-chip-skip">' + skipLabel + '</button>';
                    suggestions.classList.remove('hidden');
                    input.placeholder = 'Type your name…';
                }, 700);
            }
        }
        setTimeout(function () { input.focus(); }, 120);
    }

    function closeChat() {
        win.classList.remove('is-open');
        btn.classList.remove('is-open');
        btn.setAttribute('aria-expanded', 'false');
        langDropdown.classList.remove('open');
    }

    btn.addEventListener('click', function () {
        if (didDrag) { didDrag = false; return; }  // was a drag, not a click
        win.classList.contains('is-open') ? closeChat() : openChat();
    });
    closeBtn.addEventListener('click', closeChat);
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && win.classList.contains('is-open')) closeChat();
    });

    // ── Suggestion chips ────────────────────────────────────────────────────
    suggestions.addEventListener('click', function (e) {
        var chip = e.target.closest('.kbt-chip');
        if (!chip) return;

        // Skip chip — dismiss name prompt without sending anything
        if (chip.classList.contains('kbt-chip-skip')) {
            namePending = false;
            suggestions.classList.add('hidden');
            input.placeholder = PLACEHOLDER[currentLang] || PLACEHOLDER.en;
            renderSuggestions(currentLang);
            return;
        }

        input.value = chip.textContent;
        suggestions.classList.add('hidden');
        sendMessage();
    });

    // ── Send message ────────────────────────────────────────────────────────
    ['keydown', 'keyup', 'keypress'].forEach(function (evt) {
        input.addEventListener(evt, function (e) { e.stopPropagation(); });
    });

    sendBtn.addEventListener('click', sendMessage);
    input.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); sendMessage(); }
    });

    function sendMessage() {
        var text = input.value.trim();
        if (!text || busy) return;
        input.value = '';

        // ── Handle name prompt response ───────────────────────────────────
        if (namePending) {
            namePending = false;
            suggestions.classList.add('hidden');
            input.placeholder = PLACEHOLDER[currentLang] || PLACEHOLDER.en;

            var isSkip = /^skip/i.test(text) || text === (SKIP_LABEL[currentLang] || '').replace(' →','').replace('← ','').trim();
            if (!isSkip && text.length > 0 && text.length <= 30 && text.split(' ').length <= 3) {
                // Looks like a name — save first word capitalised
                var name = text.charAt(0).toUpperCase() + text.slice(1).split(' ')[0];
                try {
                    var d = persist_load();
                    if (!d.user) d.user = {};
                    d.user.name = name;
                    localStorage.setItem(STORE_KEY, JSON.stringify(d));
                } catch(e) {}
                addUserMsg(text);
                var ackFn = NAME_ACK[currentLang] || NAME_ACK.en;
                addBotMsg(ackFn(name));
                renderSuggestions(currentLang);
                persist_save();
                return;
            }
            // Skipped or typed something long — treat as a regular question
            renderSuggestions(currentLang);
            if (isSkip) return;  // just dismissed, don't send "skip" to API
        }

        suggestions.classList.add('hidden');
        addUserMsg(text);
        setBusy(true);
        showTyping();

        persist_saveUserInfo(text);   // detect name etc from user message

        fetch(ENDPOINT, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                message:     text,
                history:     history.slice(-10),
                lang:        currentLang,
                userContext: persist_getUserContext()
            })
        })
        .then(function (r) { return r.json(); })
        .then(function (data) {
            removeTyping();
            if (data.error) {
                addBotMsg('⚠️ ' + data.error);
            } else {
                var reply = data.reply || 'Sorry, no response.';
                history.push({ role: 'user', content: text });
                history.push({ role: 'assistant', content: reply });
                addBotMsg(reply);
                persist_save();   // save after every exchange
            }
            setBusy(false);
        })
        .catch(function () {
            removeTyping();
            addBotMsg('⚠️ Network error — please check your connection and try again.');
            setBusy(false);
        });
    }

    // ── DOM helpers ─────────────────────────────────────────────────────────
    function addUserMsg(text) {
        var el = document.createElement('div');
        el.className = 'kbt-msg kbt-msg-user';
        if (currentLang === 'ar') el.style.direction = 'rtl';
        el.textContent = text;
        msgs.appendChild(el);
        scrollDown();
    }

    function addBotMsg(text) {
        var el = document.createElement('div');
        el.className = 'kbt-msg kbt-msg-bot';
        if (currentLang === 'ar') el.style.direction = 'rtl';
        el.innerHTML = renderMarkdown(text);
        msgs.appendChild(el);
        scrollDown();
    }

    var typingEl = null;
    function showTyping() {
        typingEl = document.createElement('div');
        typingEl.className = 'kbt-typing';
        typingEl.innerHTML = '<span></span><span></span><span></span>';
        msgs.appendChild(typingEl);
        scrollDown();
    }
    function removeTyping() {
        if (typingEl && typingEl.parentNode) typingEl.parentNode.removeChild(typingEl);
        typingEl = null;
    }
    function scrollDown() { msgs.scrollTop = msgs.scrollHeight; }
    function setBusy(state) {
        busy = state;
        sendBtn.disabled = state;
        input.disabled   = state;
    }

    // ── Markdown renderer ───────────────────────────────────────────────────
    function renderMarkdown(text) {
        var escaped = text
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
        return escaped
            .replace(/\[([^\]]+)\]\((https?:\/\/[^\)]+)\)/g, function (_, label, url) {
                return '<a href="' + url.replace(/"/g, '%22') + '" target="_blank" rel="noopener noreferrer">' + label + '</a>';
            })
            .replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>')
            .replace(/\*([^*]+)\*/g, '<em>$1</em>')
            .replace(/((?:^|\n)[*-] .+)+/g, function (block) {
                var items = block.trim().split('\n').map(function (line) {
                    return '<li>' + line.replace(/^[*-] /, '') + '</li>';
                });
                return '<ul>' + items.join('') + '</ul>';
            })
            .replace(/\n{2,}/g, '</p><p>')
            .replace(/\n/g, '<br>');
    }

})();
