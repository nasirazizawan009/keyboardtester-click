<?php
/**
 * Localized Key Repeat Rate & Delay Tester renderer
 * Included by language wrapper pages. Expects: $lang (e.g. 'es')
 */

$langData = [
    'en' => [
        'dir' => '', 'html_lang' => 'en',
        'title' => 'Free Key Repeat Rate & Delay Tester — Keyboard Repeat Speed Online | KeyboardTester.click',
        'description' => 'Free key repeat rate and delay tester online. Measure your keyboard initial delay and repeat speed in Hz. Compare to gaming benchmarks instantly. No download needed.',
        'keywords' => 'keyboard repeat rate test, key repeat delay test online, keyboard repeat speed, key repeat hz test',
        'h1' => 'Key Repeat Rate & Delay Tester',
        'subtitle' => 'Hold any key — the tool measures initial delay (ms) and repeat rate (Hz)',
        'hold_instruction' => 'Hold any key to start the measurement',
        'holding_prefix' => 'Holding',
        'holding_suffix' => '— keep holding…',
        'hold_again' => 'Hold any key to start again',
        'label_delay' => 'Initial Delay (ms)',
        'label_hz' => 'Repeat Rate (Hz)',
        'label_events' => 'Repeat Events',
        'chart_title' => 'Key event timeline',
        'verdict_title' => 'Your Keyboard Results',
        'verdict_delay' => 'Initial Delay',
        'verdict_hz' => 'Repeat Rate',
        'verdict_rating' => 'Gaming Rating',
        'badge_good' => 'Gaming-Ready',
        'badge_ok' => 'Average',
        'badge_slow' => 'Below Average',
        'btn_reset' => 'Reset',
        'privacy' => 'This test runs entirely in your browser. No data is collected.',
        'trust' => ['Millisecond precision', 'Gaming benchmarks', 'Live bar chart', 'Browser based'],
        'trust_desc' => ['Uses performance.now() for sub-ms timing accuracy', 'Compares your settings to optimal gaming thresholds', 'Visualise every keydown event as it fires', 'No install, no signup — works in any modern browser'],
        'h2_what' => 'What Is Key Repeat Rate?',
        'p_what' => 'Key repeat rate is the number of keydown events your keyboard sends per second while a key is held down, measured in Hz. When you hold a key, your OS first fires one event, pauses for the initial delay, then starts firing repeated events at the repeat rate. Most systems default to ~31 Hz, but gaming keyboards can push this to 50 Hz or higher.',
        'h2_settings' => 'Gaming vs Typing Optimal Settings',
        'p_settings' => 'For gaming, a repeat delay of 200–250 ms and a repeat rate of 30–50 Hz is generally optimal. For everyday typing, 400–500 ms delay and 20–31 Hz prevents accidental repeats while keeping navigation comfortable.',
        'h2_how_change' => 'How to Change Key Repeat Speed in Windows & Mac',
        'p_how_change' => 'Windows: Open Control Panel → Keyboard → Speed tab. Drag "Repeat delay" left and "Repeat rate" right. macOS: System Settings → Keyboard. Use the Key Repeat Rate and Delay Until Repeat sliders. Linux: Use xset r rate <delay_ms> <rate_hz> — for example xset r rate 200 50.',
        'h2_why' => 'Why Repeat Delay Matters for Gamers',
        'p_why' => 'In many games, movement keys rely on the OS key-repeat mechanism. A long initial delay means your character hesitates before continuously moving. A low delay of 200 ms or less eliminates that pause. A high repeat rate ensures held-key actions fire as often as the game loop polls for input.',
        'faq_h2' => 'Frequently Asked Questions',
        'faqs' => [
            ['q' => 'What is a good key repeat delay?', 'a' => 'For gaming, 200–250 ms is optimal. For everyday typing, 400–500 ms prevents accidental repeats. The Windows minimum via Control Panel is 250 ms; macOS can go to ~15 ms via Terminal commands.'],
            ['q' => 'Why does my key repeat rate show lower than expected?', 'a' => 'Browser keydown events are throttled by the OS repeat rate setting, not the hardware rate. If your OS is set to 30 Hz, this tool will show ~30 Hz regardless of your keyboard\'s hardware capability.'],
            ['q' => 'Does key repeat rate affect gaming performance?', 'a' => 'It depends on the game. Games that use key-repeat events for movement benefit from higher rates. Games that poll raw input state every frame are unaffected.'],
            ['q' => 'What is the default key repeat rate on Windows?', 'a' => 'Windows defaults to approximately 31 Hz (one repeat event every ~32 ms) after an initial delay of 500–1000 ms, depending on the slider position.'],
            ['q' => 'Does this test work on all keyboards?', 'a' => 'Yes. The tester works on any USB, Bluetooth, or wireless keyboard connected to a computer running a modern browser. It reads standard browser keydown events — no special drivers required.'],
        ],
        'hreflang_self' => 'key-repeat-rate-test.php',
        'is_en' => true,
    ],
    'es' => [
        'dir' => 'spanish', 'html_lang' => 'es',
        'title' => 'Test de Velocidad de Repetición de Teclas — Medir Retraso y Hz | KeyboardTester.click',
        'description' => 'Test de frecuencia de auto-repetición del teclado: mide la velocidad de repetición y el delay inicial con precisión. Ideal para gamers que ajustan respuesta de entrada.',
        'keywords' => 'test repetición teclas, velocidad repetición teclado, test retraso tecla, frecuencia repetición hz',
        'h1' => 'Tester de Velocidad de Repetición de Teclas',
        'subtitle' => 'Mantén cualquier tecla presionada — la herramienta mide el retraso inicial (ms) y la frecuencia de repetición (Hz)',
        'hold_instruction' => 'Mantén cualquier tecla para iniciar la medición',
        'holding_prefix' => 'Manteniendo',
        'holding_suffix' => '— sigue manteniendo…',
        'hold_again' => 'Mantén cualquier tecla para comenzar de nuevo',
        'label_delay' => 'Retraso Inicial (ms)',
        'label_hz' => 'Frecuencia de Repetición (Hz)',
        'label_events' => 'Eventos de Repetición',
        'chart_title' => 'Línea de tiempo de eventos de tecla',
        'verdict_title' => 'Resultados de tu Teclado',
        'verdict_delay' => 'Retraso Inicial',
        'verdict_hz' => 'Frecuencia de Repetición',
        'verdict_rating' => 'Puntuación Gaming',
        'badge_good' => 'Listo para Gaming',
        'badge_ok' => 'Promedio',
        'badge_slow' => 'Por Debajo del Promedio',
        'btn_reset' => 'Reiniciar',
        'privacy' => 'Este test corre completamente en tu navegador. No se recopilan datos.',
        'trust' => ['Precisión en milisegundos', 'Benchmarks de gaming', 'Gráfico en tiempo real', 'En el navegador'],
        'trust_desc' => ['Usa performance.now() para precisión sub-ms', 'Compara tus ajustes con umbrales de gaming óptimos', 'Visualiza cada evento keydown al producirse', 'Sin instalación — funciona en cualquier navegador moderno'],
        'h2_what' => '¿Qué Es la Frecuencia de Repetición de Teclas?',
        'p_what' => 'La frecuencia de repetición es el número de eventos keydown por segundo que envía el teclado mientras se mantiene una tecla presionada, medida en Hz. El sistema operativo primero envía un evento, pausa durante el retraso inicial y luego envía eventos repetidos. La mayoría de sistemas usan ~31 Hz por defecto.',
        'h2_settings' => 'Configuración Óptima para Gaming vs Escritura',
        'p_settings' => 'Para gaming, un retraso de 200–250 ms y una frecuencia de 30–50 Hz es óptimo. Para escritura diaria, 400–500 ms de retraso y 20–31 Hz evita repeticiones accidentales.',
        'h2_how_change' => 'Cómo Cambiar la Velocidad de Repetición en Windows y Mac',
        'p_how_change' => 'Windows: Panel de Control → Teclado → pestaña Velocidad. Arrastra "Retraso de repetición" a la izquierda y "Velocidad de repetición" a la derecha. macOS: Configuración del Sistema → Teclado. Linux: xset r rate <retraso_ms> <frecuencia_hz>.',
        'h2_why' => 'Por Qué el Retraso de Repetición Importa para Jugadores',
        'p_why' => 'En muchos juegos, las teclas de movimiento dependen del mecanismo de repetición del SO. Un retraso largo significa que el personaje vacila antes de moverse continuamente. Un retraso bajo de 200 ms o menos elimina esa pausa.',
        'faq_h2' => 'Preguntas Frecuentes',
        'faqs' => [
            ['q' => '¿Cuál es un buen retraso de repetición de tecla?', 'a' => 'Para gaming, 200–250 ms es óptimo. Para escritura diaria, 400–500 ms evita repeticiones accidentales.'],
            ['q' => '¿Por qué mi frecuencia de repetición es menor de lo esperado?', 'a' => 'Los eventos keydown del navegador están limitados por la configuración del SO, no por la velocidad del hardware. Si el SO está a 30 Hz, la herramienta mostrará ~30 Hz.'],
            ['q' => '¿Afecta la frecuencia de repetición al rendimiento en juegos?', 'a' => 'Depende del juego. Los que usan eventos de repetición de teclas para el movimiento se benefician de frecuencias más altas.'],
            ['q' => '¿Cuál es la frecuencia de repetición predeterminada en Windows?', 'a' => 'Windows predetermina aproximadamente 31 Hz después de un retraso inicial de 500–1000 ms.'],
            ['q' => '¿Funciona este test con todos los teclados?', 'a' => 'Sí. Funciona con cualquier teclado USB, Bluetooth o inalámbrico conectado a un ordenador con un navegador moderno.'],
        ],
        'hreflang_self' => 'languages/spanish/key-repeat-rate-test.php',
        'is_en' => false,
    ],
    'ar' => [
        'dir' => 'arabic', 'html_lang' => 'ar',
        'title' => 'اختبار معدل تكرار المفاتيح — قياس التأخير والتردد | KeyboardTester.click',
        'description' => 'اختبار معدل تكرار المفاتيح: قِس سرعة التكرار التلقائي والتأخير الأولي بدقة. مثالي للاعبين الذين يضبطون استجابة الإدخال، يعمل في المتصفح بدون تثبيت.',
        'keywords' => 'اختبار تكرار المفاتيح, تأخير المفتاح, تردد تكرار لوحة المفاتيح, هرتز',
        'h1' => 'اختبار معدل تكرار المفاتيح',
        'subtitle' => 'اضغط مع الاستمرار على أي مفتاح — تقيس الأداة التأخير الأولي (ms) ومعدل التكرار (Hz)',
        'hold_instruction' => 'اضغط باستمرار على أي مفتاح لبدء القياس',
        'holding_prefix' => 'ضغط',
        'holding_suffix' => '— استمر في الضغط…',
        'hold_again' => 'اضغط باستمرار على أي مفتاح للبدء مجدداً',
        'label_delay' => 'التأخير الأولي (ms)',
        'label_hz' => 'معدل التكرار (Hz)',
        'label_events' => 'أحداث التكرار',
        'chart_title' => 'الجدول الزمني لأحداث المفتاح',
        'verdict_title' => 'نتائج لوحة مفاتيحك',
        'verdict_delay' => 'التأخير الأولي',
        'verdict_hz' => 'معدل التكرار',
        'verdict_rating' => 'تقييم الألعاب',
        'badge_good' => 'جاهز للألعاب',
        'badge_ok' => 'متوسط',
        'badge_slow' => 'أقل من المتوسط',
        'btn_reset' => 'إعادة تعيين',
        'privacy' => 'يعمل هذا الاختبار كليًا في متصفحك. لا يتم جمع أي بيانات.',
        'trust' => ['دقة بالميلي ثانية', 'معايير الألعاب', 'مخطط مباشر', 'في المتصفح'],
        'trust_desc' => ['يستخدم performance.now() لدقة فائقة', 'يقارن إعداداتك بالمعايير المثلى للألعاب', 'يُظهر كل حدث ضغط فور حدوثه', 'بدون تثبيت — يعمل في أي متصفح حديث'],
        'h2_what' => 'ما هو معدل تكرار المفاتيح؟',
        'p_what' => 'معدل تكرار المفاتيح هو عدد أحداث keydown التي يرسلها لوحة المفاتيح في الثانية عند الضغط المستمر على مفتاح، ويُقاس بالهرتز. تُرسل الأنظمة حدثاً واحداً أولاً، ثم تتوقف للتأخير الأولي، ثم تبدأ بإرسال أحداث متكررة. معظم الأنظمة تستخدم ~31 Hz افتراضياً.',
        'h2_settings' => 'الإعدادات المثلى للألعاب مقابل الكتابة',
        'p_settings' => 'للألعاب، تأخير 200–250 ms وتردد 30–50 Hz هو الأمثل. للكتابة اليومية، تأخير 400–500 ms وتردد 20–31 Hz يمنع التكرار العرضي.',
        'h2_how_change' => 'كيفية تغيير سرعة التكرار في Windows و Mac',
        'p_how_change' => 'Windows: لوحة التحكم ← لوحة المفاتيح ← تبويب السرعة. macOS: إعدادات النظام ← لوحة المفاتيح. Linux: xset r rate <التأخير> <التردد>.',
        'h2_why' => 'لماذا يهم تأخير التكرار للاعبين',
        'p_why' => 'في كثير من الألعاب، تعتمد مفاتيح الحركة على آلية تكرار نظام التشغيل. التأخير الطويل يجعل الشخصية تتردد قبل الحركة المستمرة. تأخير منخفض 200 ms أو أقل يُزيل هذه التوقف.',
        'faq_h2' => 'الأسئلة الشائعة',
        'faqs' => [
            ['q' => 'ما هو التأخير الجيد لتكرار المفتاح؟', 'a' => 'للألعاب، 200–250 ms هو الأمثل. للكتابة اليومية، 400–500 ms يمنع التكرار العرضي.'],
            ['q' => 'لماذا يظهر معدل التكرار أقل من المتوقع؟', 'a' => 'أحداث keydown في المتصفح تتحكم فيها إعدادات نظام التشغيل وليس سرعة الأجهزة.'],
            ['q' => 'هل يؤثر معدل التكرار على أداء الألعاب؟', 'a' => 'يعتمد على اللعبة. الألعاب التي تستخدم أحداث تكرار المفاتيح للحركة تستفيد من معدلات أعلى.'],
            ['q' => 'ما هو معدل التكرار الافتراضي في Windows؟', 'a' => 'يُعيِّن Windows افتراضياً حوالي 31 Hz بعد تأخير أولي من 500 إلى 1000 ms.'],
            ['q' => 'هل يعمل الاختبار مع جميع لوحات المفاتيح؟', 'a' => 'نعم. يعمل مع أي لوحة مفاتيح USB أو Bluetooth أو لاسلكية متصلة بمتصفح حديث.'],
        ],
        'hreflang_self' => 'languages/arabic/key-repeat-rate-test.php',
        'is_en' => false,
    ],
    'fr' => [
        'dir' => 'french', 'html_lang' => 'fr',
        'title' => 'Test de Vitesse de Répétition des Touches — Mesurer Délai et Hz | KeyboardTester.click',
        'description' => 'Test de fréquence d\'auto-répétition clavier : mesure la vitesse de répétition et le délai initial avec précision. Idéal pour les joueurs qui optimisent la réponse d\'entrée.',
        'keywords' => 'test répétition touche, délai répétition clavier, vitesse répétition touche, test hz clavier',
        'h1' => 'Testeur de Répétition de Touches',
        'subtitle' => 'Maintenez n\'importe quelle touche — l\'outil mesure le délai initial (ms) et la fréquence de répétition (Hz)',
        'hold_instruction' => 'Maintenez n\'importe quelle touche pour démarrer la mesure',
        'holding_prefix' => 'Maintien de',
        'holding_suffix' => '— continuez à maintenir…',
        'hold_again' => 'Maintenez n\'importe quelle touche pour recommencer',
        'label_delay' => 'Délai Initial (ms)',
        'label_hz' => 'Fréquence de Répétition (Hz)',
        'label_events' => 'Événements de Répétition',
        'chart_title' => 'Chronologie des événements de touche',
        'verdict_title' => 'Résultats de votre Clavier',
        'verdict_delay' => 'Délai Initial',
        'verdict_hz' => 'Fréquence de Répétition',
        'verdict_rating' => 'Note Gaming',
        'badge_good' => 'Prêt pour le Gaming',
        'badge_ok' => 'Moyen',
        'badge_slow' => 'En dessous de la Moyenne',
        'btn_reset' => 'Réinitialiser',
        'privacy' => 'Ce test s\'exécute entièrement dans votre navigateur. Aucune donnée n\'est collectée.',
        'trust' => ['Précision en millisecondes', 'Benchmarks gaming', 'Graphique en direct', 'Dans le navigateur'],
        'trust_desc' => ['Utilise performance.now() pour une précision sub-ms', 'Compare vos paramètres aux seuils gaming optimaux', 'Visualisez chaque événement keydown en temps réel', 'Sans installation — fonctionne dans tout navigateur moderne'],
        'h2_what' => 'Qu\'est-ce que la Fréquence de Répétition des Touches ?',
        'p_what' => 'La fréquence de répétition est le nombre d\'événements keydown par seconde envoyés par le clavier quand une touche est maintenue enfoncée, mesurée en Hz. Le système envoie d\'abord un événement, marque une pause pour le délai initial, puis commence à envoyer des événements répétés. La plupart des systèmes sont réglés à ~31 Hz par défaut.',
        'h2_settings' => 'Paramètres Optimaux pour Gaming vs Frappe',
        'p_settings' => 'Pour le gaming, un délai de 200–250 ms et une fréquence de 30–50 Hz est généralement optimal. Pour la frappe quotidienne, 400–500 ms de délai et 20–31 Hz évite les répétitions accidentelles.',
        'h2_how_change' => 'Comment Modifier la Vitesse de Répétition sous Windows et Mac',
        'p_how_change' => 'Windows : Panneau de configuration → Clavier → onglet Vitesse. macOS : Réglages système → Clavier. Linux : xset r rate <délai_ms> <fréquence_hz>.',
        'h2_why' => 'Pourquoi le Délai de Répétition Compte pour les Joueurs',
        'p_why' => 'Dans beaucoup de jeux, les touches de mouvement dépendent du mécanisme de répétition du système. Un long délai initial fait hésiter le personnage avant de se déplacer en continu. Un délai bas de 200 ms ou moins supprime cette pause.',
        'faq_h2' => 'Foire Aux Questions',
        'faqs' => [
            ['q' => 'Quel est un bon délai de répétition de touche ?', 'a' => 'Pour le gaming, 200–250 ms est optimal. Pour la frappe quotidienne, 400–500 ms évite les répétitions accidentelles.'],
            ['q' => 'Pourquoi ma fréquence de répétition est-elle inférieure à celle attendue ?', 'a' => 'Les événements keydown du navigateur sont limités par les paramètres OS, pas par la vitesse matérielle.'],
            ['q' => 'La fréquence de répétition affecte-t-elle les performances en jeu ?', 'a' => 'Cela dépend du jeu. Les jeux utilisant des événements de répétition pour le mouvement bénéficient de fréquences plus élevées.'],
            ['q' => 'Quelle est la fréquence de répétition par défaut sous Windows ?', 'a' => 'Windows utilise environ 31 Hz par défaut après un délai initial de 500–1000 ms.'],
            ['q' => 'Ce test fonctionne-t-il avec tous les claviers ?', 'a' => 'Oui. Il fonctionne avec tout clavier USB, Bluetooth ou sans fil connecté à un navigateur moderne.'],
        ],
        'hreflang_self' => 'languages/french/key-repeat-rate-test.php',
        'is_en' => false,
    ],
    'de' => [
        'dir' => 'german', 'html_lang' => 'de',
        'title' => 'Tastenwiederholrate-Test — Verzögerung und Hz messen | KeyboardTester.click',
        'description' => 'Tastatur-Auto-Repeat-Raten-Test: Misst Wiederholgeschwindigkeit und Initial-Delay präzise. Ideal für Gamer, die Eingabe-Response optimieren, im Browser ohne Installation.',
        'keywords' => 'Tastenwiederholrate Test, Tastenverzögerung messen, Tastaturwiederholung Hz, Keyboard Repeat Rate Test',
        'h1' => 'Tastenwiederholrate & Verzögerungs-Tester',
        'subtitle' => 'Halte eine beliebige Taste gedrückt — das Tool misst die anfängliche Verzögerung (ms) und Wiederholrate (Hz)',
        'hold_instruction' => 'Halte eine beliebige Taste gedrückt, um die Messung zu starten',
        'holding_prefix' => 'Halte',
        'holding_suffix' => '— weiter gedrückt halten…',
        'hold_again' => 'Halte eine beliebige Taste gedrückt, um neu zu starten',
        'label_delay' => 'Anfangsverzögerung (ms)',
        'label_hz' => 'Wiederholrate (Hz)',
        'label_events' => 'Wiederholungsereignisse',
        'chart_title' => 'Zeitleiste der Tastenereignisse',
        'verdict_title' => 'Deine Tastaturergebnisse',
        'verdict_delay' => 'Anfangsverzögerung',
        'verdict_hz' => 'Wiederholrate',
        'verdict_rating' => 'Gaming-Bewertung',
        'badge_good' => 'Gaming-tauglich',
        'badge_ok' => 'Durchschnittlich',
        'badge_slow' => 'Unterdurchschnittlich',
        'btn_reset' => 'Zurücksetzen',
        'privacy' => 'Dieser Test läuft vollständig in Ihrem Browser. Es werden keine Daten erfasst.',
        'trust' => ['Millisekunden-Präzision', 'Gaming-Benchmarks', 'Live-Balkendiagramm', 'Browserbasiert'],
        'trust_desc' => ['Nutzt performance.now() für sub-ms Genauigkeit', 'Vergleicht deine Einstellungen mit optimalen Gaming-Schwellenwerten', 'Visualisiere jeden Keydown-Event in Echtzeit', 'Keine Installation — funktioniert in jedem modernen Browser'],
        'h2_what' => 'Was Ist die Tastenwiederholrate?',
        'p_what' => 'Die Tastenwiederholrate ist die Anzahl der Keydown-Events pro Sekunde, die die Tastatur sendet, während eine Taste gedrückt gehalten wird, gemessen in Hz. Das System sendet zunächst ein Event, pausiert für die Anfangsverzögerung und sendet dann wiederholte Events. Die meisten Systeme sind standardmäßig auf ~31 Hz eingestellt.',
        'h2_settings' => 'Optimale Einstellungen für Gaming vs. Tippen',
        'p_settings' => 'Für Gaming ist eine Verzögerung von 200–250 ms und eine Wiederholrate von 30–50 Hz optimal. Für alltägliches Tippen verhindert 400–500 ms Verzögerung und 20–31 Hz versehentliche Wiederholungen.',
        'h2_how_change' => 'Wie man die Wiederholgeschwindigkeit unter Windows und Mac ändert',
        'p_how_change' => 'Windows: Systemsteuerung → Tastatur → Registerkarte Geschwindigkeit. macOS: Systemeinstellungen → Tastatur. Linux: xset r rate <Verzögerung_ms> <Rate_hz>.',
        'h2_why' => 'Warum die Wiederholungsverzögerung für Gamer wichtig ist',
        'p_why' => 'In vielen Spielen verlassen sich Bewegungstasten auf den OS-Wiederholungsmechanismus. Eine lange Anfangsverzögerung lässt den Charakter zögern. Eine niedrige Verzögerung von 200 ms oder weniger beseitigt diese Pause.',
        'faq_h2' => 'Häufig Gestellte Fragen',
        'faqs' => [
            ['q' => 'Was ist eine gute Tastenwiederholverzögerung?', 'a' => 'Für Gaming sind 200–250 ms optimal. Für alltägliches Tippen verhindern 400–500 ms versehentliche Wiederholungen.'],
            ['q' => 'Warum zeigt meine Wiederholrate weniger als erwartet?', 'a' => 'Browser-Keydown-Events werden durch die OS-Einstellungen gedrosselt, nicht durch die Hardware-Geschwindigkeit.'],
            ['q' => 'Beeinflusst die Wiederholrate die Gaming-Leistung?', 'a' => 'Das hängt vom Spiel ab. Spiele, die Wiederholungsereignisse für Bewegung nutzen, profitieren von höheren Raten.'],
            ['q' => 'Was ist die Standard-Wiederholrate unter Windows?', 'a' => 'Windows verwendet standardmäßig ca. 31 Hz nach einer anfänglichen Verzögerung von 500–1000 ms.'],
            ['q' => 'Funktioniert dieser Test mit allen Tastaturen?', 'a' => 'Ja. Er funktioniert mit jeder USB-, Bluetooth- oder kabellosen Tastatur, die an einen Computer mit einem modernen Browser angeschlossen ist.'],
        ],
        'hreflang_self' => 'languages/german/key-repeat-rate-test.php',
        'is_en' => false,
    ],
    'ja' => [
        'dir' => 'japanese', 'html_lang' => 'ja',
        'title' => 'キーリピートレートテスト — 遅延とHzを測定 | KeyboardTester.click',
        'description' => '無料キーリピートレートテスト。初期遅延とHz単位の繰り返し速度を測定。ゲーミング基準と比較。ダウンロード不要。',
        'keywords' => 'キーリピートレートテスト, キーボード繰り返し速度, キーリピート遅延, Hz測定',
        'h1' => 'キーリピートレート & 遅延テスター',
        'subtitle' => 'キーを押し続けると、初期遅延（ms）とリピートレート（Hz）を測定します',
        'hold_instruction' => 'キーを押し続けて測定を開始',
        'holding_prefix' => '押し続け中',
        'holding_suffix' => '— 押し続けてください…',
        'hold_again' => 'キーを押し続けて再開',
        'label_delay' => '初期遅延 (ms)',
        'label_hz' => 'リピートレート (Hz)',
        'label_events' => 'リピートイベント数',
        'chart_title' => 'キーイベントタイムライン',
        'verdict_title' => 'キーボード測定結果',
        'verdict_delay' => '初期遅延',
        'verdict_hz' => 'リピートレート',
        'verdict_rating' => 'ゲーミング評価',
        'badge_good' => 'ゲーミング対応',
        'badge_ok' => '標準',
        'badge_slow' => '平均以下',
        'btn_reset' => 'リセット',
        'privacy' => 'このテストはブラウザ内で完全に実行されます。データは収集されません。',
        'trust' => ['ミリ秒精度', 'ゲーミング基準', 'ライブグラフ', 'ブラウザのみ'],
        'trust_desc' => ['performance.now()によるサブms精度', '最適なゲーミング閾値と比較', 'キーダウンイベントをリアルタイム表示', 'インストール不要 — あらゆる現代ブラウザで動作'],
        'h2_what' => 'キーリピートレートとは？',
        'p_what' => 'キーリピートレートは、キーを押し続けたときにキーボードが毎秒送るkeydownイベント数です（Hz単位）。OSは最初に1つのイベントを送り、初期遅延の後、繰り返しイベントを送り始めます。ほとんどのシステムはデフォルトで約31Hzです。',
        'h2_settings' => 'ゲーミング vs タイピングの最適設定',
        'p_settings' => 'ゲーミングには200〜250msの遅延と30〜50HzのHz数が最適です。日常的なタイピングには、400〜500msの遅延と20〜31Hzが誤リピートを防ぎます。',
        'h2_how_change' => 'Windowsとmacでキーリピート速度を変更する方法',
        'p_how_change' => 'Windows：コントロールパネル → キーボード → 速度タブ。macOS：システム設定 → キーボード。Linux：xset r rate <遅延ms> <レートhz>。',
        'h2_why' => 'リピート遅延がゲーマーに重要な理由',
        'p_why' => '多くのゲームでは、移動キーはOSのキーリピートメカニズムに依存しています。長い初期遅延はキャラクターが連続移動前に躊躇します。200ms以下の低遅延でその間を解消できます。',
        'faq_h2' => 'よくある質問',
        'faqs' => [
            ['q' => '良いキーリピート遅延とはどれくらいですか？', 'a' => 'ゲーミングには200〜250msが最適です。日常タイピングには400〜500msが誤リピートを防ぎます。'],
            ['q' => 'リピートレートが予想より低いのはなぜですか？', 'a' => 'ブラウザのkeydownイベントはハードウェアではなくOS設定で制限されます。'],
            ['q' => 'リピートレートはゲーム性能に影響しますか？', 'a' => 'ゲームによります。移動にリピートイベントを使うゲームは高いレートで有利です。'],
            ['q' => 'Windowsのデフォルトリピートレートは？', 'a' => 'Windowsは500〜1000msの初期遅延後に約31Hzがデフォルトです。'],
            ['q' => 'すべてのキーボードで動作しますか？', 'a' => 'はい。USB、Bluetooth、ワイヤレスを問わず、現代ブラウザと接続されたキーボードで動作します。'],
        ],
        'hreflang_self' => 'languages/japanese/key-repeat-rate-test.php',
        'is_en' => false,
    ],
    'ko' => [
        'dir' => 'korean', 'html_lang' => 'ko',
        'title' => '키 반복 속도 테스터 — 딜레이와 Hz 측정 | KeyboardTester.click',
        'description' => '무료 키 반복 속도 테스트. 초기 딜레이와 반복 속도를 Hz로 측정. 게이밍 기준과 즉시 비교. 다운로드 불필요.',
        'keywords' => '키 반복 속도 테스트, 키보드 반복 딜레이, 키 반복 Hz 테스트, 키보드 속도',
        'h1' => '키 반복 속도 & 딜레이 테스터',
        'subtitle' => '아무 키나 누르고 있으면 — 초기 딜레이(ms)와 반복 속도(Hz)를 측정합니다',
        'hold_instruction' => '아무 키나 누르고 있으면 측정이 시작됩니다',
        'holding_prefix' => '누르는 중',
        'holding_suffix' => '— 계속 누르고 있으세요…',
        'hold_again' => '다시 시작하려면 아무 키나 누르고 있으세요',
        'label_delay' => '초기 딜레이 (ms)',
        'label_hz' => '반복 속도 (Hz)',
        'label_events' => '반복 이벤트 수',
        'chart_title' => '키 이벤트 타임라인',
        'verdict_title' => '키보드 측정 결과',
        'verdict_delay' => '초기 딜레이',
        'verdict_hz' => '반복 속도',
        'verdict_rating' => '게이밍 평가',
        'badge_good' => '게이밍 최적',
        'badge_ok' => '평균',
        'badge_slow' => '평균 이하',
        'btn_reset' => '초기화',
        'privacy' => '이 테스트는 브라우저 내에서 완전히 실행됩니다. 데이터가 수집되지 않습니다.',
        'trust' => ['밀리초 정밀도', '게이밍 기준', '실시간 차트', '브라우저 기반'],
        'trust_desc' => ['performance.now()로 서브ms 정확도', '최적 게이밍 임계값과 비교', '키다운 이벤트를 실시간 시각화', '설치 불필요 — 모든 현대 브라우저에서 작동'],
        'h2_what' => '키 반복 속도란 무엇인가요?',
        'p_what' => '키 반복 속도는 키를 누르고 있을 때 키보드가 매초 보내는 keydown 이벤트 수로, Hz로 측정합니다. OS는 먼저 하나의 이벤트를 보내고, 초기 딜레이 후 반복 이벤트를 보내기 시작합니다. 대부분의 시스템은 기본값으로 ~31Hz를 사용합니다.',
        'h2_settings' => '게이밍 vs 타이핑 최적 설정',
        'p_settings' => '게이밍에는 200~250ms 딜레이와 30~50Hz가 최적입니다. 일상 타이핑에는 400~500ms 딜레이와 20~31Hz가 실수로 인한 반복을 방지합니다.',
        'h2_how_change' => 'Windows와 Mac에서 키 반복 속도 변경 방법',
        'p_how_change' => 'Windows: 제어판 → 키보드 → 속도 탭. macOS: 시스템 설정 → 키보드. Linux: xset r rate <딜레이ms> <속도hz>.',
        'h2_why' => '반복 딜레이가 게이머에게 중요한 이유',
        'p_why' => '많은 게임에서 이동 키는 OS 키 반복 메커니즘에 의존합니다. 긴 초기 딜레이는 캐릭터가 연속 이동 전에 머뭇거리게 합니다. 200ms 이하의 낮은 딜레이로 그 멈춤을 없앨 수 있습니다.',
        'faq_h2' => '자주 묻는 질문',
        'faqs' => [
            ['q' => '좋은 키 반복 딜레이는 얼마인가요?', 'a' => '게이밍에는 200~250ms가 최적입니다. 일상 타이핑에는 400~500ms가 실수 반복을 방지합니다.'],
            ['q' => '왜 반복 속도가 예상보다 낮게 나오나요?', 'a' => '브라우저의 keydown 이벤트는 하드웨어가 아닌 OS 설정에 의해 제한됩니다.'],
            ['q' => '반복 속도가 게임 성능에 영향을 미치나요?', 'a' => '게임에 따라 다릅니다. 이동에 반복 이벤트를 사용하는 게임은 높은 속도에서 유리합니다.'],
            ['q' => 'Windows의 기본 반복 속도는 얼마인가요?', 'a' => 'Windows는 500~1000ms의 초기 딜레이 후 약 31Hz를 기본값으로 사용합니다.'],
            ['q' => '모든 키보드에서 작동하나요?', 'a' => '예. USB, Bluetooth, 무선 키보드 모두 현대 브라우저와 함께 작동합니다.'],
        ],
        'hreflang_self' => 'languages/korean/key-repeat-rate-test.php',
        'is_en' => false,
    ],
    'pt' => [
        'dir' => 'portuguese', 'html_lang' => 'pt',
        'title' => 'Teste de Taxa de Repetição de Teclas — Medir Atraso e Hz | KeyboardTester.click',
        'description' => 'Teste de taxa de auto-repetição do teclado: mede a velocidade de repetição e o delay inicial com precisão. Ideal para gamers que ajustam a resposta de entrada.',
        'keywords' => 'teste repetição teclas, atraso repetição teclado, frequência repetição hz, teste teclado gaming',
        'h1' => 'Testador de Taxa de Repetição de Teclas',
        'subtitle' => 'Mantenha qualquer tecla pressionada — a ferramenta mede o atraso inicial (ms) e a taxa de repetição (Hz)',
        'hold_instruction' => 'Mantenha qualquer tecla pressionada para iniciar a medição',
        'holding_prefix' => 'Mantendo',
        'holding_suffix' => '— continue mantendo…',
        'hold_again' => 'Mantenha qualquer tecla para recomeçar',
        'label_delay' => 'Atraso Inicial (ms)',
        'label_hz' => 'Taxa de Repetição (Hz)',
        'label_events' => 'Eventos de Repetição',
        'chart_title' => 'Linha do tempo de eventos de tecla',
        'verdict_title' => 'Resultados do seu Teclado',
        'verdict_delay' => 'Atraso Inicial',
        'verdict_hz' => 'Taxa de Repetição',
        'verdict_rating' => 'Avaliação Gaming',
        'badge_good' => 'Pronto para Gaming',
        'badge_ok' => 'Médio',
        'badge_slow' => 'Abaixo da Média',
        'btn_reset' => 'Reiniciar',
        'privacy' => 'Este teste é executado inteiramente no seu navegador. Nenhum dado é coletado.',
        'trust' => ['Precisão em milissegundos', 'Benchmarks gaming', 'Gráfico ao vivo', 'No navegador'],
        'trust_desc' => ['Usa performance.now() para precisão sub-ms', 'Compara suas configurações com limites ideais de gaming', 'Visualize cada evento keydown em tempo real', 'Sem instalação — funciona em qualquer navegador moderno'],
        'h2_what' => 'O Que É a Taxa de Repetição de Teclas?',
        'p_what' => 'A taxa de repetição é o número de eventos keydown por segundo enviados pelo teclado enquanto uma tecla é mantida pressionada, medida em Hz. O sistema envia primeiro um evento, pausa para o atraso inicial e depois começa a enviar eventos repetidos. A maioria dos sistemas usa ~31 Hz por padrão.',
        'h2_settings' => 'Configurações Ideais para Gaming vs Digitação',
        'p_settings' => 'Para gaming, um atraso de 200–250 ms e uma frequência de 30–50 Hz é geralmente ideal. Para digitação diária, 400–500 ms de atraso e 20–31 Hz evita repetições acidentais.',
        'h2_how_change' => 'Como Alterar a Velocidade de Repetição no Windows e Mac',
        'p_how_change' => 'Windows: Painel de Controle → Teclado → aba Velocidade. macOS: Configurações do Sistema → Teclado. Linux: xset r rate <atraso_ms> <taxa_hz>.',
        'h2_why' => 'Por Que o Atraso de Repetição Importa para Jogadores',
        'p_why' => 'Em muitos jogos, as teclas de movimento dependem do mecanismo de repetição do SO. Um longo atraso inicial faz o personagem hesitar antes de se mover continuamente. Um atraso baixo de 200 ms ou menos elimina essa pausa.',
        'faq_h2' => 'Perguntas Frequentes',
        'faqs' => [
            ['q' => 'Qual é um bom atraso de repetição de tecla?', 'a' => 'Para gaming, 200–250 ms é ideal. Para digitação diária, 400–500 ms evita repetições acidentais.'],
            ['q' => 'Por que minha taxa de repetição aparece menor do que o esperado?', 'a' => 'Os eventos keydown do navegador são limitados pelas configurações do SO, não pela velocidade do hardware.'],
            ['q' => 'A taxa de repetição afeta o desempenho nos jogos?', 'a' => 'Depende do jogo. Jogos que usam eventos de repetição para movimento se beneficiam de taxas mais altas.'],
            ['q' => 'Qual é a taxa de repetição padrão no Windows?', 'a' => 'O Windows usa aproximadamente 31 Hz por padrão após um atraso inicial de 500–1000 ms.'],
            ['q' => 'Este teste funciona com todos os teclados?', 'a' => 'Sim. Funciona com qualquer teclado USB, Bluetooth ou sem fio conectado a um navegador moderno.'],
        ],
        'hreflang_self' => 'languages/portuguese/key-repeat-rate-test.php',
        'is_en' => false,
    ],
    'ru' => [
        'dir' => 'russian', 'html_lang' => 'ru',
        'title' => 'Тест Скорости Повторения Клавиши — Измерить Задержку и Hz | KeyboardTester.click',
        'description' => 'Тест частоты автоповтора клавиатуры: измеряет скорость повтора и начальную задержку точно. Идеально для геймеров, настраивающих отклик ввода, в браузере без установки.',
        'keywords' => 'тест повторения клавиши, задержка клавиши, скорость повторения клавиатуры, частота повторения hz',
        'h1' => 'Тестер Скорости Повторения Клавиш',
        'subtitle' => 'Удерживайте любую клавишу — инструмент измеряет начальную задержку (мс) и частоту повторения (Hz)',
        'hold_instruction' => 'Удерживайте любую клавишу для начала измерения',
        'holding_prefix' => 'Удержание',
        'holding_suffix' => '— продолжайте удерживать…',
        'hold_again' => 'Удерживайте любую клавишу, чтобы начать снова',
        'label_delay' => 'Начальная задержка (мс)',
        'label_hz' => 'Частота повторения (Hz)',
        'label_events' => 'Событий повторения',
        'chart_title' => 'Временная шкала событий нажатия клавиш',
        'verdict_title' => 'Результаты вашей клавиатуры',
        'verdict_delay' => 'Начальная задержка',
        'verdict_hz' => 'Частота повторения',
        'verdict_rating' => 'Игровая оценка',
        'badge_good' => 'Готово к играм',
        'badge_ok' => 'Среднее',
        'badge_slow' => 'Ниже среднего',
        'btn_reset' => 'Сброс',
        'privacy' => 'Тест выполняется полностью в вашем браузере. Данные не собираются.',
        'trust' => ['Точность в миллисекундах', 'Игровые ориентиры', 'Живая диаграмма', 'В браузере'],
        'trust_desc' => ['Использует performance.now() для точности до мс', 'Сравнивает настройки с оптимальными игровыми порогами', 'Визуализирует каждое нажатие клавиши в реальном времени', 'Без установки — работает в любом современном браузере'],
        'h2_what' => 'Что Такое Частота Повторения Клавиш?',
        'p_what' => 'Частота повторения клавиш — это количество событий keydown в секунду, которые отправляет клавиатура при удержании клавиши, измеряемое в Hz. ОС сначала отправляет одно событие, делает паузу на начальную задержку, затем начинает отправлять повторяющиеся события. Большинство систем по умолчанию ~31 Hz.',
        'h2_settings' => 'Оптимальные Настройки для Игр vs Набора текста',
        'p_settings' => 'Для игр оптимальны задержка 200–250 мс и частота 30–50 Hz. Для повседневного набора текста задержка 400–500 мс и 20–31 Hz предотвращает случайные повторения.',
        'h2_how_change' => 'Как Изменить Скорость Повторения в Windows и Mac',
        'p_how_change' => 'Windows: Панель управления → Клавиатура → вкладка Скорость. macOS: Системные настройки → Клавиатура. Linux: xset r rate <задержка_мс> <частота_hz>.',
        'h2_why' => 'Почему Задержка Повторения Важна для Геймеров',
        'p_why' => 'Во многих играх клавиши перемещения зависят от механизма повторения ОС. Большая начальная задержка заставляет персонажа медлить перед непрерывным движением. Низкая задержка 200 мс и менее устраняет эту паузу.',
        'faq_h2' => 'Часто Задаваемые Вопросы',
        'faqs' => [
            ['q' => 'Какая хорошая задержка повторения клавиши?', 'a' => 'Для игр оптимальны 200–250 мс. Для повседневного набора текста 400–500 мс предотвращает случайные повторения.'],
            ['q' => 'Почему частота повторения ниже ожидаемой?', 'a' => 'События keydown в браузере ограничены настройками ОС, а не скоростью аппаратного обеспечения.'],
            ['q' => 'Влияет ли частота повторения на игровую производительность?', 'a' => 'Зависит от игры. Игры, использующие события повторения клавиш для движения, выигрывают от более высоких частот.'],
            ['q' => 'Какая частота повторения по умолчанию в Windows?', 'a' => 'Windows по умолчанию использует около 31 Hz после начальной задержки 500–1000 мс.'],
            ['q' => 'Работает ли тест со всеми клавиатурами?', 'a' => 'Да. Работает с любой USB, Bluetooth или беспроводной клавиатурой, подключённой к компьютеру с современным браузером.'],
        ],
        'hreflang_self' => 'languages/russian/key-repeat-rate-test.php',
        'is_en' => false,
    ],
];

$d = $langData[$lang] ?? $langData['en'];
$isRtl = ($lang === 'ar');

$allLangs = [
    'en' => 'key-repeat-rate-test.php',
    'es' => 'languages/spanish/key-repeat-rate-test.php',
    'ar' => 'languages/arabic/key-repeat-rate-test.php',
    'fr' => 'languages/french/key-repeat-rate-test.php',
    'de' => 'languages/german/key-repeat-rate-test.php',
    'ja' => 'languages/japanese/key-repeat-rate-test.php',
    'ko' => 'languages/korean/key-repeat-rate-test.php',
    'pt' => 'languages/portuguese/key-repeat-rate-test.php',
    'ru' => 'languages/russian/key-repeat-rate-test.php',
];

// JS strings injected safely
$jsHoldInstruction = json_encode($d['hold_instruction']);
$jsHoldingPrefix   = json_encode($d['holding_prefix']);
$jsHoldingSuffix   = json_encode($d['holding_suffix']);
$jsHoldAgain       = json_encode($d['hold_again']);
$jsBadgeGood       = json_encode($d['badge_good']);
$jsBadgeOk         = json_encode($d['badge_ok']);
$jsBadgeSlow       = json_encode($d['badge_slow']);
?>
<!DOCTYPE html>
<html lang="<?php echo $d['html_lang']; ?>"<?php if ($isRtl) echo ' dir="rtl"'; ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($d['title']); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($d['description']); ?>">
  <meta name="keywords" content="<?php echo htmlspecialchars($d['keywords']); ?>">
  <link rel="canonical" href="<?php echo absoluteUrl($d['hreflang_self']); ?>">
  <?php foreach ($allLangs as $hl => $hlPath): ?>
  <link rel="alternate" hreflang="<?php echo $hl; ?>" href="<?php echo absoluteUrl($hlPath); ?>">
  <?php endforeach; ?>
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('key-repeat-rate-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"WebApplication","name":<?php echo json_encode($d['h1']); ?>,"url":"<?php echo absoluteUrl($d['hreflang_self']); ?>","description":<?php echo json_encode($d['description']); ?>,"applicationCategory":"UtilityApplication","operatingSystem":"Any","isAccessibleForFree":true,"featureList":["Initial delay measurement in milliseconds","Repeat rate measurement in Hz","Live oscilloscope bar chart","Gaming benchmark comparison","Instant results, no download"]}
  </script>
  <style>
    .krr-tool{max-width:720px;margin:0 auto;padding:2rem 1.5rem 2.5rem;text-align:center}
    .krr-tool h1{font-size:clamp(1.6rem,4vw,2.4rem);font-weight:700;margin-bottom:.4rem;color:var(--heading-color,#1e293b)}
    .krr-tool .tool-subtitle{font-size:1rem;color:var(--text-muted,#475569);margin-bottom:1.5rem}
    .krr-key-area{display:flex;align-items:center;justify-content:center;min-height:130px;border:2px dashed var(--border-color,#e2e8f0);border-radius:12px;font-size:1.1rem;font-weight:600;color:var(--text-muted,#475569);margin-bottom:1.5rem;cursor:default;user-select:none;transition:border-color .15s,background .15s;background:transparent}
    .krr-key-area.active{border-style:solid;border-color:var(--primary-color,#4b5eaa);background:rgba(99,102,241,.06);color:var(--heading-color,#1e293b)}
    .krr-stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-bottom:1.5rem}
    .krr-stat{background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:1rem .5rem}
    .krr-stat-value{font-size:1.9rem;font-weight:700;font-family:'JetBrains Mono',monospace;color:var(--primary-color,#4b5eaa);line-height:1.1}
    .krr-stat-label{font-size:.75rem;color:var(--text-muted,#475569);text-transform:uppercase;letter-spacing:.05em;margin-top:.25rem}
    .krr-chart-wrap{background:var(--card-bg,#f1f5f9);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:.75rem 1rem;margin-bottom:1.5rem;overflow:hidden}
    .krr-chart-title{font-size:.8rem;color:var(--text-muted,#475569);text-align:<?php echo $isRtl ? 'right' : 'left'; ?>;margin-bottom:.4rem;text-transform:uppercase;letter-spacing:.04em}
    .krr-bars{display:flex;align-items:flex-end;gap:3px;height:60px;overflow:hidden}
    .krr-bar{flex:1;min-width:6px;background:var(--primary-color,#4b5eaa);border-radius:2px 2px 0 0;transition:height .05s}
    .krr-verdict{display:none;background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:1rem 1.25rem;margin-bottom:1.5rem;text-align:<?php echo $isRtl ? 'right' : 'left'; ?>}
    .krr-verdict.visible{display:block}
    .krr-verdict-title{font-size:1rem;font-weight:700;color:var(--heading-color,#1e293b);margin-bottom:.5rem}
    .krr-verdict-row{display:flex;justify-content:space-between;font-size:.9rem;color:var(--text-color,#1e293b);padding:.25rem 0;border-bottom:1px solid var(--border-color,#e2e8f0)}
    .krr-verdict-row:last-child{border-bottom:none}
    .krr-verdict-badge{font-weight:700;padding:.1rem .5rem;border-radius:4px;font-size:.8rem}
    .badge-good{background:rgba(34,197,94,.15);color:#16a34a}
    .badge-ok{background:rgba(234,179,8,.15);color:#a16207}
    .badge-slow{background:rgba(239,68,68,.15);color:#dc2626}
    .krr-reset-btn{padding:.65rem 2rem;border:none;border-radius:8px;background:var(--primary-color,#4b5eaa);color:#fff;font-family:inherit;font-size:1rem;font-weight:600;cursor:pointer;transition:opacity .15s,transform .1s;min-height:44px}
    .krr-reset-btn:hover{opacity:.88;transform:translateY(-1px)}
    .privacy-note{font-size:.8rem;color:var(--text-muted,#475569);margin-top:1rem}
    @media(max-width:480px){.krr-stats-grid{grid-template-columns:repeat(2,1fr)}.krr-tool{padding:1.25rem 1rem 2rem}}
  </style>
</head>
<body class="landing-page">
  <?php if ($d['is_en']): ?>
    <?php include __DIR__ . '/../../header.php'; ?>
  <?php else: ?>
    <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/header-' . $lang . '.php'; ?>
  <?php endif; ?>
  <main id="main-content" class="landing-main">

    <section class="tool-stage" aria-labelledby="krr-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="krr-tool-title"><?php echo htmlspecialchars($d['h1']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['subtitle']); ?></p>
        </div>
      </div>
      <section class="tool-shell">
        <div class="krr-tool">
          <h1><?php echo htmlspecialchars($d['h1']); ?></h1>
          <p class="tool-subtitle"><?php echo htmlspecialchars($d['subtitle']); ?></p>

          <div class="krr-key-area" id="krr-key-area" role="status" aria-live="polite">
            <?php echo htmlspecialchars($d['hold_instruction']); ?>
          </div>

          <div class="krr-stats-grid">
            <div class="krr-stat">
              <div class="krr-stat-value" id="krr-delay">—</div>
              <div class="krr-stat-label"><?php echo htmlspecialchars($d['label_delay']); ?></div>
            </div>
            <div class="krr-stat">
              <div class="krr-stat-value" id="krr-hz">—</div>
              <div class="krr-stat-label"><?php echo htmlspecialchars($d['label_hz']); ?></div>
            </div>
            <div class="krr-stat">
              <div class="krr-stat-value" id="krr-events">0</div>
              <div class="krr-stat-label"><?php echo htmlspecialchars($d['label_events']); ?></div>
            </div>
          </div>

          <div class="krr-chart-wrap" aria-label="<?php echo htmlspecialchars($d['chart_title']); ?>">
            <div class="krr-chart-title"><?php echo htmlspecialchars($d['chart_title']); ?></div>
            <div class="krr-bars" id="krr-bars" aria-hidden="true"></div>
          </div>

          <div class="krr-verdict" id="krr-verdict" role="status" aria-live="assertive">
            <div class="krr-verdict-title"><?php echo htmlspecialchars($d['verdict_title']); ?></div>
            <div class="krr-verdict-row">
              <span><?php echo htmlspecialchars($d['verdict_delay']); ?></span>
              <span id="krr-v-delay"></span>
            </div>
            <div class="krr-verdict-row">
              <span><?php echo htmlspecialchars($d['verdict_hz']); ?></span>
              <span id="krr-v-hz"></span>
            </div>
            <div class="krr-verdict-row">
              <span><?php echo htmlspecialchars($d['verdict_rating']); ?></span>
              <span id="krr-v-badge" class="krr-verdict-badge"></span>
            </div>
          </div>

          <button class="krr-reset-btn" id="krr-reset"><?php echo htmlspecialchars($d['btn_reset']); ?></button>
          <p class="privacy-note"><?php echo htmlspecialchars($d['privacy']); ?></p>
        </div>
      </section>
    </section>

    <section class="trust-strip" aria-label="Key benefits">
      <div class="container trust-grid">
        <?php for ($i = 0; $i < 4; $i++): ?>
        <div class="trust-item">
          <div class="trust-title"><?php echo htmlspecialchars($d['trust'][$i]); ?></div>
          <div class="trust-desc"><?php echo htmlspecialchars($d['trust_desc'][$i]); ?></div>
        </div>
        <?php endfor; ?>
      </div>
    </section>

    <section class="feature-band">
      <div class="container">
        <div class="section-head">
          <h2><?php echo htmlspecialchars($d['h2_what']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_what']); ?></p>
        </div>
      </div>
    </section>

    <section class="process-band">
      <div class="container">
        <div class="section-head">
          <h2><?php echo htmlspecialchars($d['h2_settings']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_settings']); ?></p>
        </div>
      </div>
    </section>

    <section class="feature-band">
      <div class="container">
        <div class="section-head">
          <h2><?php echo htmlspecialchars($d['h2_how_change']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_how_change']); ?></p>
        </div>
      </div>
    </section>

    <section class="process-band">
      <div class="container">
        <div class="section-head">
          <h2><?php echo htmlspecialchars($d['h2_why']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_why']); ?></p>
        </div>
      </div>
    </section>

    <section class="feature-band">
      <div class="container">
        <div class="section-head">
          <h2><?php echo htmlspecialchars($d['faq_h2']); ?></h2>
        </div>
        <div style="margin-top:1rem;">
          <?php foreach ($d['faqs'] as $faq): ?>
          <details style="background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:1rem;margin-bottom:.75rem;">
            <summary style="font-weight:600;cursor:pointer;color:var(--heading-color,#1e293b);"><?php echo htmlspecialchars($faq['q']); ?></summary>
            <p style="margin-top:.5rem;color:var(--text-color,#1e293b);"><?php echo htmlspecialchars($faq['a']); ?></p>
          </details>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <?php require_once __DIR__ . '/../components/tool-list-renderer.php'; renderToolsList($lang); ?>

  </main>
  <?php if ($d['is_en']): ?>
    <?php include __DIR__ . '/../../footer.php'; ?>
  <?php else: ?>
    <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/footer-' . $lang . '.php'; ?>
  <?php endif; ?>
  <script>
  requestAnimationFrame(function(){ setTimeout(function(){
    'use strict';
    var keyArea  = document.getElementById('krr-key-area');
    var delayEl  = document.getElementById('krr-delay');
    var hzEl     = document.getElementById('krr-hz');
    var eventsEl = document.getElementById('krr-events');
    var barsEl   = document.getElementById('krr-bars');
    var verdict  = document.getElementById('krr-verdict');
    var vDelay   = document.getElementById('krr-v-delay');
    var vHz      = document.getElementById('krr-v-hz');
    var vBadge   = document.getElementById('krr-v-badge');
    var resetBtn = document.getElementById('krr-reset');

    var holdInstruction = <?php echo $jsHoldInstruction; ?>;
    var holdingPrefix   = <?php echo $jsHoldingPrefix; ?>;
    var holdingSuffix   = <?php echo $jsHoldingSuffix; ?>;
    var holdAgain       = <?php echo $jsHoldAgain; ?>;
    var badgeGood       = <?php echo $jsBadgeGood; ?>;
    var badgeOk         = <?php echo $jsBadgeOk; ?>;
    var badgeSlow       = <?php echo $jsBadgeSlow; ?>;

    var pressTime   = 0;
    var firstRepeat = 0;
    var eventTimes  = [];
    var MAX_BARS    = 40;
    var barData     = [];
    var measuring   = false;

    for (var i = 0; i < MAX_BARS; i++) {
      var bar = document.createElement('div');
      bar.className = 'krr-bar';
      bar.style.height = '2px';
      barsEl.appendChild(bar);
      barData.push(bar);
    }

    document.addEventListener('keydown', function(e) {
      var now = performance.now();
      if (!measuring) {
        measuring   = true;
        pressTime   = now;
        firstRepeat = 0;
        eventTimes  = [];
        keyArea.classList.add('active');
        keyArea.textContent = holdingPrefix + ' "' + (e.key.length === 1 ? e.key.toUpperCase() : e.key) + '" ' + holdingSuffix;
        return;
      }
      if (e.repeat) {
        eventTimes.push(now);
        eventsEl.textContent = eventTimes.length;
        if (firstRepeat === 0) {
          firstRepeat = now;
          var initDelay = Math.round(firstRepeat - pressTime);
          delayEl.textContent = initDelay;
          vDelay.textContent  = initDelay + ' ms';
        }
        if (eventTimes.length >= 2) {
          var intervals = [];
          for (var j = 1; j < eventTimes.length; j++) {
            intervals.push(eventTimes[j] - eventTimes[j-1]);
          }
          var avgInterval = intervals.reduce(function(a,b){return a+b;},0) / intervals.length;
          var hz = Math.round(1000 / avgInterval);
          hzEl.textContent = hz;
          vHz.textContent  = hz + ' Hz';
          if (eventTimes.length >= 5) { showVerdict(parseInt(delayEl.textContent, 10) || 0, hz); }
        }
        var height = Math.min(60, Math.max(4, 60 - (eventTimes.length > 1 ?
          (eventTimes[eventTimes.length-1] - eventTimes[eventTimes.length-2]) / 2 : 30)));
        shiftBars(height);
      }
    });

    document.addEventListener('keyup', function() {
      if (measuring) {
        measuring = false;
        pressTime = 0;
        keyArea.classList.remove('active');
        keyArea.textContent = holdAgain;
      }
    });

    function shiftBars(height) {
      for (var k = 0; k < barData.length - 1; k++) {
        barData[k].style.height = barData[k+1].style.height;
      }
      barData[barData.length - 1].style.height = Math.round(height) + 'px';
    }

    function showVerdict(delay, hz) {
      var delayGood = delay <= 300;
      var delaySlow = delay > 500;
      var hzGood    = hz >= 28;
      var hzSlow    = hz < 20;
      var overall   = (delayGood && hzGood) ? 'good' : ((delaySlow || hzSlow) ? 'slow' : 'ok');
      vBadge.textContent = overall === 'good' ? badgeGood : (overall === 'slow' ? badgeSlow : badgeOk);
      vBadge.className   = 'krr-verdict-badge ' + (overall === 'good' ? 'badge-good' : (overall === 'slow' ? 'badge-slow' : 'badge-ok'));
      verdict.classList.add('visible');
    }

    resetBtn.addEventListener('click', function() {
      measuring   = false;
      pressTime   = 0;
      firstRepeat = 0;
      eventTimes  = [];
      delayEl.textContent  = '—';
      hzEl.textContent     = '—';
      eventsEl.textContent = '0';
      keyArea.classList.remove('active');
      keyArea.textContent = holdInstruction;
      verdict.classList.remove('visible');
      for (var m = 0; m < barData.length; m++) { barData[m].style.height = '2px'; }
    });
  }, 0); });
  </script>
</body>
</html>
