<?php
/**
 * Localized Keyboard Switch Sound Analyzer renderer
 * Included by language wrapper pages. Expects: $lang (e.g. 'es')
 */

$langData = [
    'en' => [
        'dir' => '', 'html_lang' => 'en',
        'title' => 'Keyboard Switch Sound Analyzer — Test If Your Keyboard Is Linear, Tactile or Clicky | KeyboardTester.click',
        'description' => 'Analyze your mechanical keyboard switch sound online free. Mic-based FFT analyzer classifies your switches as linear, tactile, or clicky in real time. No download needed.',
        'keywords' => 'keyboard sound test, mechanical keyboard sound analyzer, keyboard switch sound test, is my keyboard too loud, thock test online',
        'h1' => 'Keyboard Switch Sound Analyzer',
        'subtitle' => 'Real-time FFT analysis classifies your mechanical keyboard switches by their sound profile',
        'btn_start' => '🎤 Start Listening',
        'btn_stop' => '⏹ Stop Listening',
        'btn_reset' => 'Reset',
        'label_linear' => 'Linear (Thock)',
        'label_tactile' => 'Tactile',
        'label_clicky' => 'Clicky',
        'label_peak_freq' => 'Peak Frequency',
        'label_sound_level' => 'Sound Level',
        'label_result' => 'Result',
        'label_input_level' => 'Input Level',
        'label_listening' => 'Listening… Press a key near your microphone now.',
        'label_instructions' => 'Instructions',
        'hint_text' => 'Click "Start Listening", then press a key on your keyboard near your microphone. Hold the mic 10–20 cm from the board for best results.',
        'mic_denied' => 'Microphone access denied. Click the mic icon in your address bar and allow access, then try again.',
        'mic_unsupported' => 'Your browser does not support microphone access. Please use Chrome, Firefox, or Edge.',
        'classification_title' => 'Switch Classification',
        'tip_linear' => 'Deep, low-frequency profile — characteristic of smooth linear switches like MX Red, Gateron Yellow, or fully lubed linears.',
        'tip_tactile' => 'Mid-range frequency snap detected — typical of tactile switches such as MX Brown, Boba U4, or Holy Pandas.',
        'tip_clicky' => 'High-frequency bright profile — matches clicky switches like MX Blue, Box White, or Kailh Box Jade.',
        'privacy' => 'This test runs entirely in your browser. No data is collected or transmitted.',
        'trust' => ['Mic-based', 'Real FFT Analysis', 'Instant Classification', '100% Browser'],
        'trust_desc' => ['Uses your browser microphone — no external hardware needed', 'Web Audio API AnalyserNode processes 2048 frequency bins', 'Linear, Tactile, or Clicky result within 300ms of keypress', 'No download, no signup — works in Chrome, Firefox, Edge'],
        'h2_1' => 'Linear, Tactile, and Clicky — What Does Your Switch Sound Say?',
        'p_1' => 'Mechanical keyboard switches produce three distinctly different acoustic profiles. Linear switches (such as Cherry MX Red, Speed Silver, or Gateron Yellow) actuate smoothly without a bump, producing a low-frequency thud below 500 Hz — the coveted "thock" sound. Tactile switches (Brown, Clear, Boba U4) add a physical bump at the actuation point, generating a mid-range snap in the 500–2000 Hz band. Clicky switches (Blue, Green, Box White) include a dedicated click mechanism producing a sharp, bright sound rich in frequencies above 2000 Hz. This analyzer measures those exact frequency signatures in real time.',
        'h2_2' => 'How the Keyboard Sound Analyzer Works',
        'p_2' => 'When you click "Start Listening," the tool requests microphone access and creates a Web Audio API AudioContext with an AnalyserNode configured for 2048 FFT bins. The FFT breaks the raw audio waveform into individual frequency components. When the tool detects a keypress (amplitude spikes above the detection threshold), it captures a 300ms window, calls getByteFrequencyData() to read all 2048 frequency bins, identifies the peak bin, and converts it to Hz. The resulting frequency is compared against the three threshold bands to produce the Linear / Tactile / Clicky classification.',
        'h2_3' => 'Is My Keyboard Too Loud? Decibel Levels Explained',
        'p_3' => 'Office environments typically target 60–65 dB(A). Individual keystrokes from mechanical switches can reach peak levels of 45–70 dB(A). Linear switches on a desk mat typically measure 45–52 dB. Tactile switches sit around 50–58 dB. Clicky switches are the loudest, commonly measuring 55–70 dB — clearly audible on video calls. If co-workers regularly comment on your keyboard noise, switching to linear switches with O-ring dampeners typically cuts peak levels by 8–12 dB.',
        'h2_4' => 'How to Reduce Keyboard Noise',
        'p_4' => 'Even clicky keyboards can be tamed significantly. O-rings are silicone dampening rings that fit around the keycap stem and cushion the bottom-out impact — typically reducing noise by 5–10 dB. Desk mats absorb case resonance, cutting overall loudness by 3–6 dB. Case foam — placing craft foam inside the keyboard case — eliminates hollow case ping. Switch lubricant such as Krytox 205g0 applied to linear switch rails removes the friction-based rattle component. Combine all four for the best results.',
        'faq_h2' => 'Frequently Asked Questions',
        'faqs' => [
            ['q' => 'Can this tool identify my exact switch model?', 'a' => 'No — it classifies by sound profile (linear/tactile/clicky). Exact model identification requires manual lookup. The frequency signature tells you the acoustic character, not the specific brand or model of the switch.'],
            ['q' => 'My microphone isn\'t detected. What do I do?', 'a' => 'Check browser permissions — click the mic icon in your address bar and allow access. On Chrome go to Settings → Privacy and Security → Site Settings → Microphone. Make sure no other application is exclusively holding the mic device.'],
            ['q' => 'Why does it say "Clicky" when I have linear switches?', 'a' => 'Plate resonance or stabilizer rattle can add high-frequency components. Try pressing a key in the center of the keyboard, away from large stabilizers. Adding case foam and lubing stabilizers often fixes misclassification.'],
            ['q' => 'Does this work on mobile?', 'a' => 'Yes — tap a key on a connected Bluetooth keyboard or use any object to tap a surface near your phone\'s microphone. Hold the mic close (5–10 cm) to the keyboard for best results. Mobile browsers support getUserMedia in Safari 11+ and Chrome for Android.'],
            ['q' => 'Is my audio data stored?', 'a' => 'No — all processing runs locally in your browser. No audio is ever sent to any server. Your microphone stream is released as soon as you click Stop or leave the page.'],
        ],
        'hreflang_self' => 'keyboard-sound-test.php',
        'is_en' => true,
    ],
    'es' => [
        'dir' => 'spanish', 'html_lang' => 'es',
        'title' => 'Analizador de Sonido de Teclado Mecánico — Test Lineal, Táctil o Clicky | KeyboardTester.click',
        'description' => 'Analizador de sonido de switches de teclado: clasifica tus switches como lineales, táctiles o clicky mediante análisis de micrófono en el navegador. Rápido, sin carga de datos.',
        'keywords' => 'test sonido teclado, analizador teclado mecánico, test switch teclado, teclado ruidoso test, thock test online',
        'h1' => 'Analizador de Sonido de Switch de Teclado',
        'subtitle' => 'El análisis FFT en tiempo real clasifica tus switches mecánicos por su perfil de sonido',
        'btn_start' => '🎤 Empezar a Escuchar',
        'btn_stop' => '⏹ Detener',
        'btn_reset' => 'Reiniciar',
        'label_linear' => 'Lineal (Thock)',
        'label_tactile' => 'Táctil',
        'label_clicky' => 'Clicky',
        'label_peak_freq' => 'Frecuencia Pico',
        'label_sound_level' => 'Nivel de Sonido',
        'label_result' => 'Resultado',
        'label_input_level' => 'Nivel de Entrada',
        'label_listening' => 'Escuchando… Presiona una tecla cerca del micrófono.',
        'label_instructions' => 'Instrucciones',
        'hint_text' => 'Haz clic en "Empezar a Escuchar", luego presiona una tecla cerca del micrófono. Mantén el mic a 10–20 cm del teclado para mejores resultados.',
        'mic_denied' => 'Acceso al micrófono denegado. Haz clic en el icono del micrófono en la barra de direcciones y permite el acceso.',
        'mic_unsupported' => 'Tu navegador no soporta acceso al micrófono. Por favor usa Chrome, Firefox o Edge.',
        'classification_title' => 'Clasificación de Switch',
        'tip_linear' => 'Perfil de baja frecuencia — característico de switches lineales suaves como MX Red, Gateron Yellow o lineales lubricados.',
        'tip_tactile' => 'Snap de frecuencia media detectado — típico de switches táctiles como MX Brown, Boba U4 o Holy Pandas.',
        'tip_clicky' => 'Perfil brillante de alta frecuencia — coincide con switches clicky como MX Blue, Box White o Kailh Box Jade.',
        'privacy' => 'Este test corre completamente en tu navegador. No se recopilan ni transmiten datos.',
        'trust' => ['Basado en micrófono', 'Análisis FFT real', 'Clasificación instantánea', '100% Navegador'],
        'trust_desc' => ['Usa el micrófono del navegador — sin hardware adicional', 'AnalyserNode de Web Audio API procesa 2048 bins de frecuencia', 'Resultado lineal, táctil o clicky en 300ms', 'Sin descarga — funciona en Chrome, Firefox, Edge'],
        'h2_1' => 'Lineal, Táctil y Clicky — ¿Qué Dice el Sonido de tu Switch?',
        'p_1' => 'Los switches mecánicos producen tres perfiles acústicos diferentes. Los switches lineales (MX Red, Gateron Yellow) actuан suavemente produciendo un golpe de baja frecuencia por debajo de 500 Hz — el codiciado sonido "thock". Los switches táctiles (Brown, Boba U4) generan un snap de rango medio en 500–2000 Hz. Los switches clicky (Blue, Box White) producen un sonido brillante rico en frecuencias superiores a 2000 Hz. Este analizador mide esas firmas de frecuencia en tiempo real.',
        'h2_2' => 'Cómo Funciona el Analizador de Sonido de Teclado',
        'p_2' => 'Al hacer clic en "Empezar a Escuchar", la herramienta solicita acceso al micrófono y crea un AudioContext de Web Audio API con un AnalyserNode de 2048 bins FFT. Cuando detecta una pulsación de tecla (la amplitud supera el umbral), captura una ventana de 300ms, lee todos los bins de frecuencia e identifica el pico. La frecuencia resultante se compara con las tres bandas de umbral para producir la clasificación.',
        'h2_3' => '¿Es mi Teclado Demasiado Ruidoso? Niveles de Decibelios',
        'p_3' => 'Las oficinas suelen apuntar a 60–65 dB(A). Los switches lineales miden típicamente 45–52 dB. Los táctiles se sitúan en 50–58 dB. Los clicky son los más ruidosos, midiendo comúnmente 55–70 dB. Si tus compañeros se quejan del ruido, cambiar a switches lineales con O-rings reduce los niveles máximos en 8–12 dB.',
        'h2_4' => 'Cómo Reducir el Ruido del Teclado',
        'p_4' => 'Los O-rings de silicona reducen el ruido del golpe final en 5–10 dB. Los reposamuñecas y alfombrillas de escritorio absorben la resonancia de la carcasa, reduciendo el volumen en 3–6 dB. La espuma interior elimina el ping hueco del case. El lubricante Krytox 205g0 en los raíles lineales elimina el componente de alta frecuencia. Combina los cuatro para los mejores resultados.',
        'faq_h2' => 'Preguntas Frecuentes',
        'faqs' => [
            ['q' => '¿Puede esta herramienta identificar mi modelo exacto de switch?', 'a' => 'No — clasifica por perfil de sonido (lineal/táctil/clicky). La identificación exacta requiere búsqueda manual. La firma de frecuencia te dice el carácter acústico, no la marca ni el modelo.'],
            ['q' => 'Mi micrófono no se detecta. ¿Qué hago?', 'a' => 'Verifica los permisos del navegador — haz clic en el icono del micrófono en la barra de direcciones. En Chrome: Ajustes → Privacidad y seguridad → Configuración de sitios → Micrófono.'],
            ['q' => '¿Por qué dice "Clicky" si tengo switches lineales?', 'a' => 'La resonancia de la placa o el sonido de los estabilizadores puede añadir componentes de alta frecuencia. Intenta presionar una tecla en el centro del teclado y añade espuma de case.'],
            ['q' => '¿Funciona en móvil?', 'a' => 'Sí — toca una tecla de un teclado Bluetooth conectado o golpea una superficie cerca del micrófono de tu teléfono. Mantén el mic a 5–10 cm del teclado para mejores resultados.'],
            ['q' => '¿Se almacenan mis datos de audio?', 'a' => 'No — todo el procesamiento se realiza localmente en tu navegador. No se envía audio a ningún servidor. El stream del micrófono se libera al hacer clic en Detener.'],
        ],
        'hreflang_self' => 'languages/spanish/keyboard-sound-test.php',
        'is_en' => false,
    ],
    'ar' => [
        'dir' => 'arabic', 'html_lang' => 'ar',
        'title' => 'محلل صوت مفاتيح لوحة المفاتيح — اختبار خطي أو تكتيلي أو كليكي | KeyboardTester.click',
        'description' => 'محلل صوت مفاتيح لوحة المفاتيح: يصنّف مفاتيحك كخطية أو تكتيكية أو طقطقة عبر تحليل الميكروفون في المتصفح. سريع، بدون رفع بيانات، مع حماية الخصوصية.',
        'keywords' => 'اختبار صوت لوحة مفاتيح, محلل لوحة مفاتيح ميكانيكية, اختبار صوت مفاتيح',
        'h1' => 'محلل صوت مفاتيح لوحة المفاتيح',
        'subtitle' => 'يصنف تحليل FFT في الوقت الفعلي مفاتيحك الميكانيكية حسب ملفها الصوتي',
        'btn_start' => '🎤 بدء الاستماع',
        'btn_stop' => '⏹ إيقاف',
        'btn_reset' => 'إعادة تعيين',
        'label_linear' => 'خطي (ثوك)',
        'label_tactile' => 'تكتيلي',
        'label_clicky' => 'كليكي',
        'label_peak_freq' => 'الذروة التردد',
        'label_sound_level' => 'مستوى الصوت',
        'label_result' => 'النتيجة',
        'label_input_level' => 'مستوى الإدخال',
        'label_listening' => 'جارٍ الاستماع… اضغط مفتاحاً قريباً من الميكروفون الآن.',
        'label_instructions' => 'التعليمات',
        'hint_text' => 'انقر على "بدء الاستماع"، ثم اضغط مفتاحاً على لوحة المفاتيح قرب الميكروفون. أمسك الميكروفون على بعد 10–20 سم من اللوحة للحصول على أفضل النتائج.',
        'mic_denied' => 'تم رفض الوصول إلى الميكروفون. انقر على أيقونة الميكروفون في شريط العنوان واسمح بالوصول.',
        'mic_unsupported' => 'متصفحك لا يدعم الوصول إلى الميكروفون. الرجاء استخدام Chrome أو Firefox أو Edge.',
        'classification_title' => 'تصنيف المفتاح',
        'tip_linear' => 'ملف تردد منخفض عميق — مميزة للمفاتيح الخطية السلسة مثل MX Red أو Gateron Yellow.',
        'tip_tactile' => 'تم الكشف عن نقرة بتردد متوسط — نموذجية للمفاتيح التكتيلية مثل MX Brown أو Boba U4.',
        'tip_clicky' => 'ملف لامع بتردد عالٍ — يتطابق مع المفاتيح الكليكية مثل MX Blue أو Box White.',
        'privacy' => 'يعمل هذا الاختبار كلياً في متصفحك. لا يتم جمع أي بيانات أو إرسالها.',
        'trust' => ['قائم على الميكروفون', 'تحليل FFT حقيقي', 'تصنيف فوري', '100% في المتصفح'],
        'trust_desc' => ['يستخدم ميكروفون متصفحك — لا حاجة لأجهزة خارجية', 'يعالج AnalyserNode من Web Audio API 2048 حزمة تردد', 'نتيجة خطي أو تكتيلي أو كليكي في 300ms', 'بدون تنزيل — يعمل في Chrome و Firefox و Edge'],
        'h2_1' => 'خطي وتكتيلي وكليكي — ماذا يقول صوت مفتاحك؟',
        'p_1' => 'تنتج مفاتيح لوحات المفاتيح الميكانيكية ثلاثة ملفات صوتية مميزة. المفاتيح الخطية (MX Red، Gateron Yellow) تعمل بسلاسة منتجةً صوت طرق منخفض التردد أقل من 500 Hz. المفاتيح التكتيلية (Brown، Boba U4) تنتج نقرة متوسطة في نطاق 500–2000 Hz. المفاتيح الكليكية (Blue، Box White) تنتج صوتاً حاداً غنياً بترددات فوق 2000 Hz.',
        'h2_2' => 'كيف يعمل محلل صوت لوحة المفاتيح',
        'p_2' => 'عند النقر على "بدء الاستماع"، تطلب الأداة الوصول إلى الميكروفون وتنشئ AudioContext مع AnalyserNode بـ 2048 حزمة FFT. عند اكتشاف ضغطة مفتاح، تلتقط نافذة 300ms، تقرأ جميع حزم التردد، وتحدد الذروة. التردد الناتج يُقارَن مع ثلاثة نطاقات عتبة للتصنيف.',
        'h2_3' => 'هل لوحة مفاتيحي صاخبة جداً؟ شرح مستويات الديسيبل',
        'p_3' => 'تستهدف بيئات المكتب عادةً 60–65 dB. تقيس المفاتيح الخطية عادةً 45–52 dB. التكتيلية 50–58 dB. والكليكية 55–70 dB. إذا شكا زملاؤك من الضوضاء، يمكن أن يقلل التبديل إلى مفاتيح خطية مع حلقات O-ring من مستويات الذروة بمقدار 8–12 dB.',
        'h2_4' => 'كيف تقلل ضوضاء لوحة المفاتيح',
        'p_4' => 'حلقات O-ring تقلل ضوضاء الضربة النهائية بمقدار 5–10 dB. وسادات المكتب تمتص صدى الحافظة. رغوة الحافظة تزيل صوت الطنين. مادة التشحيم Krytox 205g0 تزيل مكوّن التردد العالي. اجمع الأربعة للحصول على أفضل النتائج.',
        'faq_h2' => 'الأسئلة الشائعة',
        'faqs' => [
            ['q' => 'هل تستطيع الأداة تحديد طراز المفتاح بالضبط؟', 'a' => 'لا — تُصنَّف حسب ملف الصوت (خطي/تكتيلي/كليكي). التحديد الدقيق يتطلب بحثاً يدوياً. توقيع التردد يخبرك بالطابع الصوتي وليس الماركة.'],
            ['q' => 'لم يتم اكتشاف الميكروفون. ماذا أفعل؟', 'a' => 'تحقق من أذونات المتصفح — انقر على أيقونة الميكروفون في شريط العنوان واسمح بالوصول. في Chrome: الإعدادات → الخصوصية → إعدادات الموقع → الميكروفون.'],
            ['q' => 'لماذا يقول "كليكي" وأنا أملك مفاتيح خطية؟', 'a' => 'رنين اللوحة أو ضوضاء المثبتات قد تضيف مكونات عالية التردد. جرب الضغط على مفتاح في وسط لوحة المفاتيح وأضف رغوة الحافظة.'],
            ['q' => 'هل يعمل على الهاتف المحمول؟', 'a' => 'نعم — اضغط مفتاحاً على لوحة مفاتيح Bluetooth متصلة أو اطرق سطحاً قرب ميكروفون هاتفك. أمسك الميكروفون على بعد 5–10 سم من اللوحة.'],
            ['q' => 'هل يتم تخزين بيانات صوتي؟', 'a' => 'لا — كل المعالجة تتم محلياً في متصفحك. لا يتم إرسال أي صوت إلى أي خادم. يتم تحرير ميكروفون عند النقر على إيقاف.'],
        ],
        'hreflang_self' => 'languages/arabic/keyboard-sound-test.php',
        'is_en' => false,
    ],
    'fr' => [
        'dir' => 'french', 'html_lang' => 'fr',
        'title' => 'Analyseur de Son de Switch Clavier — Test Linéaire, Tactile ou Clicky | KeyboardTester.click',
        'description' => 'Analyseur de son des switches du clavier : classe vos switches en linéaires, tactiles ou clicky via analyse du microphone dans le navigateur. Rapide, sans upload de données.',
        'keywords' => 'test son clavier, analyseur clavier mécanique, test switch clavier, clavier trop bruyant test, thock test en ligne',
        'h1' => 'Analyseur de Son de Switch de Clavier',
        'subtitle' => "L'analyse FFT en temps réel classe vos switches mécaniques selon leur profil sonore",
        'btn_start' => '🎤 Commencer l\'écoute',
        'btn_stop' => '⏹ Arrêter',
        'btn_reset' => 'Réinitialiser',
        'label_linear' => 'Linéaire (Thock)',
        'label_tactile' => 'Tactile',
        'label_clicky' => 'Clicky',
        'label_peak_freq' => 'Fréquence Pic',
        'label_sound_level' => 'Niveau Sonore',
        'label_result' => 'Résultat',
        'label_input_level' => "Niveau d'entrée",
        'label_listening' => 'Écoute en cours… Appuyez sur une touche près du microphone.',
        'label_instructions' => 'Instructions',
        'hint_text' => 'Cliquez sur "Commencer l\'écoute", puis appuyez sur une touche de votre clavier près du microphone. Tenez le micro à 10–20 cm du clavier pour de meilleurs résultats.',
        'mic_denied' => 'Accès au microphone refusé. Cliquez sur l\'icône micro dans la barre d\'adresse et autorisez l\'accès.',
        'mic_unsupported' => 'Votre navigateur ne prend pas en charge l\'accès au microphone. Veuillez utiliser Chrome, Firefox ou Edge.',
        'classification_title' => 'Classification du Switch',
        'tip_linear' => 'Profil basse fréquence profond — caractéristique des switches linéaires comme MX Red, Gateron Yellow ou linéaires lubrifiés.',
        'tip_tactile' => 'Snap de fréquence moyenne détecté — typique des switches tactiles comme MX Brown, Boba U4 ou Holy Pandas.',
        'tip_clicky' => 'Profil lumineux haute fréquence — correspond aux switches clicky comme MX Blue, Box White ou Kailh Box Jade.',
        'privacy' => 'Ce test s\'exécute entièrement dans votre navigateur. Aucune donnée n\'est collectée ou transmise.',
        'trust' => ['Basé sur micro', 'Analyse FFT réelle', 'Classification instantanée', '100% Navigateur'],
        'trust_desc' => ['Utilise votre microphone navigateur — aucun matériel externe requis', 'L\'AnalyserNode de Web Audio API traite 2048 bins de fréquence', 'Résultat linéaire, tactile ou clicky en 300ms', 'Sans téléchargement — fonctionne dans Chrome, Firefox, Edge'],
        'h2_1' => 'Linéaire, Tactile et Clicky — Que Dit le Son de Votre Switch ?',
        'p_1' => 'Les switches mécaniques produisent trois profils acoustiques distincts. Les switches linéaires (MX Red, Gateron Yellow) s\'actionnent sans à-coup, produisant un son grave sous 500 Hz — le "thock" tant convoité. Les switches tactiles (Brown, Boba U4) génèrent un snap en fréquence moyenne dans la bande 500–2000 Hz. Les switches clicky (Blue, Box White) produisent un son brillant riche en fréquences au-dessus de 2000 Hz.',
        'h2_2' => 'Comment Fonctionne l\'Analyseur de Son de Clavier',
        'p_2' => 'Lorsque vous cliquez sur "Commencer l\'écoute", l\'outil demande l\'accès au microphone et crée un AudioContext avec un AnalyserNode de 2048 bins FFT. Lorsqu\'une touche est détectée, il capture une fenêtre de 300ms, lit tous les bins de fréquence et identifie le pic. La fréquence résultante est comparée aux trois bandes pour produire la classification.',
        'h2_3' => 'Mon Clavier Est-il Trop Bruyant ? Niveaux en Décibels Expliqués',
        'p_3' => 'Les environnements de bureau ciblent généralement 60–65 dB(A). Les switches linéaires mesurent typiquement 45–52 dB. Les tactiles se situent autour de 50–58 dB. Les clicky sont les plus bruyants, mesurant 55–70 dB. Passer aux switches linéaires avec O-rings réduit généralement les niveaux de pointe de 8–12 dB.',
        'h2_4' => 'Comment Réduire le Bruit de Clavier',
        'p_4' => 'Les O-rings en silicone réduisent le bruit d\'impact de 5–10 dB. Les tapis de bureau absorbent la résonance du boîtier, réduisant le volume de 3–6 dB. La mousse intérieure élimine le ping creux. Le lubrifiant Krytox 205g0 supprime le composant haute fréquence. Combinez les quatre pour les meilleurs résultats.',
        'faq_h2' => 'Questions Fréquemment Posées',
        'faqs' => [
            ['q' => 'Cet outil peut-il identifier mon modèle exact de switch ?', 'a' => 'Non — il classe par profil sonore (linéaire/tactile/clicky). L\'identification exacte nécessite une recherche manuelle. La signature de fréquence vous indique le caractère acoustique, pas la marque ni le modèle.'],
            ['q' => 'Mon microphone n\'est pas détecté. Que faire ?', 'a' => 'Vérifiez les permissions du navigateur — cliquez sur l\'icône micro dans la barre d\'adresse. Sur Chrome : Paramètres → Confidentialité → Paramètres du site → Microphone.'],
            ['q' => 'Pourquoi dit-il "Clicky" alors que j\'ai des switches linéaires ?', 'a' => 'La résonance de la plaque ou le bruit des stabilisateurs peut ajouter des composantes haute fréquence. Essayez d\'appuyer sur une touche au centre du clavier et ajoutez de la mousse dans le boîtier.'],
            ['q' => 'Fonctionne-t-il sur mobile ?', 'a' => 'Oui — appuyez sur une touche d\'un clavier Bluetooth connecté ou tapez une surface près du microphone de votre téléphone. Tenez le micro à 5–10 cm du clavier.'],
            ['q' => 'Mes données audio sont-elles stockées ?', 'a' => 'Non — tout le traitement se fait localement dans votre navigateur. Aucun audio n\'est envoyé à un serveur. Le flux microphone est libéré dès que vous cliquez sur Arrêter.'],
        ],
        'hreflang_self' => 'languages/french/keyboard-sound-test.php',
        'is_en' => false,
    ],
    'de' => [
        'dir' => 'german', 'html_lang' => 'de',
        'title' => 'Tastatur-Switch-Sound-Analyse — Test auf Linear, Taktil oder Clicky | KeyboardTester.click',
        'description' => 'Tastatur-Switch-Sound-Analyzer: Klassifiziert Ihre Switches als linear, taktil oder clicky via Mikrofon-Analyse im Browser. Schnell, ohne Datenupload, mit Datenschutz.',
        'keywords' => 'Tastatur Sound Test, mechanische Tastatur Analysator, Switch Sound Test, Tastatur zu laut Test, Thock Test online',
        'h1' => 'Tastatur-Switch-Sound-Analysator',
        'subtitle' => 'Echtzeit-FFT-Analyse klassifiziert deine mechanischen Switches nach ihrem Klangprofil',
        'btn_start' => '🎤 Zuhören starten',
        'btn_stop' => '⏹ Stoppen',
        'btn_reset' => 'Zurücksetzen',
        'label_linear' => 'Linear (Thock)',
        'label_tactile' => 'Taktil',
        'label_clicky' => 'Clicky',
        'label_peak_freq' => 'Spitzenfrequenz',
        'label_sound_level' => 'Schallpegel',
        'label_result' => 'Ergebnis',
        'label_input_level' => 'Eingangspegel',
        'label_listening' => 'Wird gehört… Drücke jetzt eine Taste in der Nähe des Mikrofons.',
        'label_instructions' => 'Anleitung',
        'hint_text' => 'Klicke auf "Zuhören starten", dann drücke eine Taste auf deiner Tastatur in der Nähe des Mikrofons. Halte das Mic 10–20 cm von der Tastatur entfernt für beste Ergebnisse.',
        'mic_denied' => 'Mikrofonzugriff verweigert. Klicke auf das Mikrofon-Symbol in der Adressleiste und erlaube den Zugriff.',
        'mic_unsupported' => 'Dein Browser unterstützt keinen Mikrofonzugriff. Bitte verwende Chrome, Firefox oder Edge.',
        'classification_title' => 'Switch-Klassifikation',
        'tip_linear' => 'Tiefes Niederfrequenzprofil — charakteristisch für lineare Switches wie MX Red, Gateron Yellow oder vollständig geschmierte Linears.',
        'tip_tactile' => 'Mittlerer Frequenzschnappen erkannt — typisch für taktile Switches wie MX Brown, Boba U4 oder Holy Pandas.',
        'tip_clicky' => 'Helles Hochfrequenzprofil — entspricht Clicky-Switches wie MX Blue, Box White oder Kailh Box Jade.',
        'privacy' => 'Dieser Test läuft vollständig in deinem Browser. Es werden keine Daten erfasst oder übertragen.',
        'trust' => ['Mikrofon-basiert', 'Echte FFT-Analyse', 'Sofort-Klassifikation', '100% Browser'],
        'trust_desc' => ['Verwendet dein Browser-Mikrofon — keine externe Hardware', 'AnalyserNode verarbeitet 2048 Frequenz-Bins', 'Ergebnis linear, taktil oder clicky in 300ms', 'Kein Download — funktioniert in Chrome, Firefox, Edge'],
        'h2_1' => 'Linear, Taktil und Clicky — Was Sagt der Klang Deines Switches?',
        'p_1' => 'Mechanische Switches erzeugen drei verschiedene akustische Profile. Lineare Switches (MX Red, Gateron Yellow) betätigen sich sanft und erzeugen ein tieffrequentes Geräusch unter 500 Hz — das begehrte "Thock"-Geräusch. Taktile Switches (Brown, Boba U4) erzeugen einen mittleren Frequenzschnappen im 500–2000 Hz Bereich. Clicky-Switches (Blue, Box White) erzeugen ein helles Geräusch reich an Frequenzen über 2000 Hz.',
        'h2_2' => 'Wie der Tastatur-Sound-Analysator Funktioniert',
        'p_2' => 'Beim Klick auf "Zuhören starten" fordert das Tool Mikrofonzugriff an und erstellt einen AudioContext mit einem AnalyserNode mit 2048 FFT-Bins. Bei Erkennung eines Tastendrucks wird ein 300ms-Fenster aufgezeichnet, alle Frequenz-Bins gelesen und der Spitzenwert identifiziert. Die resultierende Frequenz wird mit drei Schwellenwertbändern verglichen.',
        'h2_3' => 'Ist Meine Tastatur Zu Laut? Dezibelpegel Erklärt',
        'p_3' => 'Büroumgebungen zielen typischerweise auf 60–65 dB(A). Lineare Switches messen typischerweise 45–52 dB. Taktile Switches liegen bei 50–58 dB. Clicky-Switches sind am lautesten mit 55–70 dB. Der Wechsel zu linearen Switches mit O-Ringen reduziert Spitzenpegel typischerweise um 8–12 dB.',
        'h2_4' => 'Tastaturlärm Reduzieren',
        'p_4' => 'O-Ringe aus Silikon reduzieren Anschlags-Geräusche um 5–10 dB. Schreibtischmatten absorbieren Gehäuseresonanz. Gehäuse-Schaumstoff eliminiert das Hohlgehäuse-Ping. Schmiermittel Krytox 205g0 entfernt die hochfrequente Ratter-Komponente. Kombiniere alle vier für beste Ergebnisse.',
        'faq_h2' => 'Häufig Gestellte Fragen',
        'faqs' => [
            ['q' => 'Kann dieses Tool mein genaues Switch-Modell identifizieren?', 'a' => 'Nein — es klassifiziert nach Klangprofil (linear/taktil/clicky). Genaue Modellidentifikation erfordert manuelle Recherche. Die Frequenzsignatur gibt den akustischen Charakter an, nicht die Marke.'],
            ['q' => 'Mein Mikrofon wird nicht erkannt. Was soll ich tun?', 'a' => 'Überprüfe Browser-Berechtigungen — klicke auf das Mikrofon-Symbol in der Adressleiste. In Chrome: Einstellungen → Datenschutz → Website-Einstellungen → Mikrofon.'],
            ['q' => 'Warum zeigt es "Clicky" obwohl ich lineare Switches habe?', 'a' => 'Plattenresonanz oder Stabilisatorrauschen können hochfrequente Komponenten hinzufügen. Versuche eine Taste in der Mitte der Tastatur zu drücken und füge Gehäuse-Schaumstoff hinzu.'],
            ['q' => 'Funktioniert es auf dem Handy?', 'a' => 'Ja — drücke eine Taste einer verbundenen Bluetooth-Tastatur oder klopfe auf eine Oberfläche nah am Telefonmikrofon. Halte das Mic 5–10 cm von der Tastatur entfernt.'],
            ['q' => 'Werden meine Audiodaten gespeichert?', 'a' => 'Nein — alle Verarbeitung erfolgt lokal in deinem Browser. Kein Audio wird an Server gesendet. Der Mikrofon-Stream wird beim Klicken auf Stoppen freigegeben.'],
        ],
        'hreflang_self' => 'languages/german/keyboard-sound-test.php',
        'is_en' => false,
    ],
    'ja' => [
        'dir' => 'japanese', 'html_lang' => 'ja',
        'title' => 'キーボードスイッチ音解析 — リニア・タクタイル・クリッキー判定 | KeyboardTester.click',
        'description' => 'メカニカルキーボードのスイッチ音をマイクでFFT解析。リニア・タクタイル・クリッキーをリアルタイム判定。ダウンロード不要で無料。',
        'keywords' => 'キーボード音テスト, メカニカルキーボード音解析, スイッチ音テスト, キーボードうるさい, サック音テスト',
        'h1' => 'キーボードスイッチ音アナライザー',
        'subtitle' => 'リアルタイムFFT解析でメカニカルキーボードスイッチを音響プロファイルで分類',
        'btn_start' => '🎤 聴き取り開始',
        'btn_stop' => '⏹ 停止',
        'btn_reset' => 'リセット',
        'label_linear' => 'リニア（サック）',
        'label_tactile' => 'タクタイル',
        'label_clicky' => 'クリッキー',
        'label_peak_freq' => 'ピーク周波数',
        'label_sound_level' => '音量レベル',
        'label_result' => '結果',
        'label_input_level' => '入力レベル',
        'label_listening' => '聴き取り中… マイク近くでキーを押してください。',
        'label_instructions' => '使い方',
        'hint_text' => '「聴き取り開始」をクリックし、キーボードのキーをマイクの近くで押してください。マイクをボードから10〜20cm離すと最良の結果が得られます。',
        'mic_denied' => 'マイクへのアクセスが拒否されました。アドレスバーのマイクアイコンをクリックしてアクセスを許可してください。',
        'mic_unsupported' => 'ブラウザがマイクアクセスをサポートしていません。Chrome、Firefox、またはEdgeを使用してください。',
        'classification_title' => 'スイッチ分類',
        'tip_linear' => '低周波の深いプロファイル — MX RedやGateron Yellowなどのリニアスイッチに特徴的です。',
        'tip_tactile' => '中周波スナップを検出 — MX BrownやBoba U4などのタクタイルスイッチに典型的です。',
        'tip_clicky' => '高周波の明るいプロファイル — MX BlueやBox Whiteなどのクリッキースイッチに一致します。',
        'privacy' => 'このテストはブラウザ内で完全に実行されます。データは収集・送信されません。',
        'trust' => ['マイク使用', '実FFT解析', '即時分類', '100%ブラウザ'],
        'trust_desc' => ['ブラウザのマイクを使用 — 外部ハードウェア不要', 'AnalyserNodeが2048周波数ビンを処理', 'キー押下後300msでリニア・タクタイル・クリッキーを判定', 'ダウンロード不要 — Chrome・Firefox・Edgeで動作'],
        'h2_1' => 'リニア・タクタイル・クリッキー — スイッチ音が語るもの',
        'p_1' => 'メカニカルキーボードスイッチは3つの異なる音響プロファイルを持ちます。リニアスイッチ（MX Red、Gateron Yellow）は500Hz以下の低周波の「サック」音が特徴。タクタイルスイッチ（Brown、Boba U4）は500〜2000Hzの中周波スナップ。クリッキースイッチ（Blue、Box White）は2000Hz以上の高周波の明るい音。このアナライザーはその周波数特性をリアルタイムで解析します。',
        'h2_2' => 'キーボード音アナライザーの仕組み',
        'p_2' => '「聴き取り開始」をクリックするとマイクアクセスを要求し、2048ビンFFTのAnalyserNodeを持つAudioContextを作成します。キー押下を検出すると300msのウィンドウをキャプチャし、すべての周波数ビンを読み込んでピークを特定。その周波数を3つの閾値バンドと比較して分類します。',
        'h2_3' => 'キーボードがうるさすぎる？デシベルレベルの解説',
        'p_3' => 'オフィス環境は通常60〜65dB(A)を目標とします。リニアスイッチは通常45〜52dB。タクタイルは50〜58dB。クリッキーは最も大きく55〜70dB。O-ringダンパー付きのリニアスイッチに替えると通常8〜12dBの騒音低減が可能です。',
        'h2_4' => 'キーボードの騒音を減らす方法',
        'p_4' => 'シリコン製O-ringはボトムアウトの衝撃音を5〜10dB低減。デスクマットはケースの共鳴を吸収して3〜6dB低減。ケースフォームは空洞音を除去。Krytox 205g0ルーブはリニアスイッチの高周波成分を除去。4つを組み合わせると最良の効果が得られます。',
        'faq_h2' => 'よくある質問',
        'faqs' => [
            ['q' => 'このツールはスイッチの正確なモデルを特定できますか？', 'a' => 'いいえ — 音響プロファイル（リニア/タクタイル/クリッキー）で分類します。正確なモデルの特定には手動調査が必要です。周波数特性は音響特性を示すものであり、特定のブランドやモデルを示すものではありません。'],
            ['q' => 'マイクが検出されません。どうすればよいですか？', 'a' => 'ブラウザの権限を確認してください — アドレスバーのマイクアイコンをクリックしてアクセスを許可します。Chromeでは: 設定 → プライバシーとセキュリティ → サイトの設定 → マイクを確認してください。'],
            ['q' => 'リニアスイッチなのに「クリッキー」と表示されるのはなぜですか？', 'a' => 'プレートの共鳴やスタビライザーのガタつきが高周波成分を追加する場合があります。キーボード中央部のキーを押してみて、ケースフォームを追加してください。'],
            ['q' => 'モバイルでも動作しますか？', 'a' => 'はい — 接続されたBluetoothキーボードのキーをタップするか、スマートフォンのマイク近くで物を叩いてください。最良の結果を得るためにマイクをキーボードから5〜10cm離してください。'],
            ['q' => 'オーディオデータは保存されますか？', 'a' => 'いいえ — すべての処理はブラウザ内でローカルに実行されます。音声はサーバーに送信されません。停止をクリックするとマイクストリームが解放されます。'],
        ],
        'hreflang_self' => 'languages/japanese/keyboard-sound-test.php',
        'is_en' => false,
    ],
    'ko' => [
        'dir' => 'korean', 'html_lang' => 'ko',
        'title' => '키보드 스위치 소리 분석기 — 리니어, 택타일, 클리키 판정 | KeyboardTester.click',
        'description' => '마이크 기반 FFT로 기계식 키보드 스위치를 리니어, 택타일, 클리키로 실시간 분류. 무료 온라인 키보드 소리 테스트. 다운로드 불필요.',
        'keywords' => '키보드 소리 테스트, 기계식 키보드 소리 분석, 스위치 소리 테스트, 키보드 소음 테스트',
        'h1' => '키보드 스위치 소리 분석기',
        'subtitle' => '실시간 FFT 분석으로 기계식 키보드 스위치를 소리 프로파일로 분류합니다',
        'btn_start' => '🎤 듣기 시작',
        'btn_stop' => '⏹ 중지',
        'btn_reset' => '초기화',
        'label_linear' => '리니어 (탁)',
        'label_tactile' => '택타일',
        'label_clicky' => '클리키',
        'label_peak_freq' => '피크 주파수',
        'label_sound_level' => '소리 레벨',
        'label_result' => '결과',
        'label_input_level' => '입력 레벨',
        'label_listening' => '듣는 중… 지금 마이크 근처에서 키를 눌러주세요.',
        'label_instructions' => '사용 방법',
        'hint_text' => '"듣기 시작"을 클릭한 다음 마이크 근처에서 키보드 키를 누르세요. 최상의 결과를 위해 마이크를 키보드에서 10~20cm 떨어뜨려 주세요.',
        'mic_denied' => '마이크 접근이 거부되었습니다. 주소창의 마이크 아이콘을 클릭하고 접근을 허용해주세요.',
        'mic_unsupported' => '브라우저가 마이크 접근을 지원하지 않습니다. Chrome, Firefox 또는 Edge를 사용해주세요.',
        'classification_title' => '스위치 분류',
        'tip_linear' => '낮은 주파수의 깊은 프로파일 — MX Red, Gateron Yellow와 같은 리니어 스위치의 특징입니다.',
        'tip_tactile' => '중간 주파수 스냅 감지 — MX Brown, Boba U4와 같은 택타일 스위치에 일반적입니다.',
        'tip_clicky' => '높은 주파수의 밝은 프로파일 — MX Blue, Box White와 같은 클리키 스위치에 해당합니다.',
        'privacy' => '이 테스트는 브라우저 내에서 완전히 실행됩니다. 데이터가 수집되거나 전송되지 않습니다.',
        'trust' => ['마이크 기반', '실제 FFT 분석', '즉시 분류', '100% 브라우저'],
        'trust_desc' => ['브라우저 마이크 사용 — 외부 하드웨어 불필요', 'AnalyserNode가 2048개의 주파수 빈을 처리', '키 입력 후 300ms 내에 결과 제공', '다운로드 없이 Chrome, Firefox, Edge에서 동작'],
        'h2_1' => '리니어, 택타일, 클리키 — 스위치 소리가 말하는 것',
        'p_1' => '기계식 키보드 스위치는 세 가지 음향 프로파일을 가집니다. 리니어 스위치(MX Red, Gateron Yellow)는 500Hz 이하의 낮은 주파수 소리를 냅니다. 택타일 스위치(Brown, Boba U4)는 500~2000Hz 범위의 중간 주파수 스냅을 생성합니다. 클리키 스위치(Blue, Box White)는 2000Hz 이상의 밝고 선명한 소리를 냅니다. 이 분석기는 해당 주파수 특성을 실시간으로 측정합니다.',
        'h2_2' => '키보드 소리 분석기의 작동 방식',
        'p_2' => '"듣기 시작"을 클릭하면 도구가 마이크 접근을 요청하고 2048개 FFT 빈의 AnalyserNode를 가진 AudioContext를 생성합니다. 키 입력을 감지하면 300ms 창을 캡처하고, 모든 주파수 빈을 읽어 피크를 식별합니다. 결과 주파수는 세 가지 임계 대역과 비교하여 분류됩니다.',
        'h2_3' => '내 키보드가 너무 시끄러운가요? 데시벨 레벨 설명',
        'p_3' => '사무실 환경은 일반적으로 60~65dB(A)를 목표로 합니다. 리니어 스위치는 45~52dB, 택타일은 50~58dB, 클리키는 55~70dB를 측정합니다. O-링 댐퍼가 있는 리니어 스위치로 교체하면 보통 8~12dB를 줄일 수 있습니다.',
        'h2_4' => '키보드 소음 줄이는 방법',
        'p_4' => '실리콘 O-링은 바닥 충격 소음을 5~10dB 줄입니다. 데스크 매트는 케이스 공명을 흡수해 3~6dB 감소. 케이스 폼은 빈 케이스 울림을 제거합니다. Krytox 205g0 윤활제는 고주파 성분을 제거합니다. 네 가지를 조합하면 최상의 결과를 얻을 수 있습니다.',
        'faq_h2' => '자주 묻는 질문',
        'faqs' => [
            ['q' => '이 도구가 내 스위치 모델을 정확히 식별할 수 있나요?', 'a' => '아니요 — 소리 프로파일(리니어/택타일/클리키)로 분류합니다. 정확한 모델 식별은 수동 검색이 필요합니다. 주파수 특성은 음향 특성을 알려주며 브랜드나 모델은 알려주지 않습니다.'],
            ['q' => '마이크가 감지되지 않습니다. 어떻게 해야 하나요?', 'a' => '브라우저 권한을 확인하세요 — 주소창의 마이크 아이콘을 클릭하고 접근을 허용합니다. Chrome: 설정 → 개인정보 → 사이트 설정 → 마이크.'],
            ['q' => '리니어 스위치인데 왜 "클리키"라고 표시되나요?', 'a' => '플레이트 공명이나 스태빌라이저 소음이 고주파 성분을 추가할 수 있습니다. 키보드 중앙의 키를 눌러보고 케이스 폼을 추가해 보세요.'],
            ['q' => '모바일에서도 작동하나요?', 'a' => '네 — 연결된 블루투스 키보드의 키를 탭하거나 스마트폰 마이크 근처에서 물건을 두드리세요. 최상의 결과를 위해 마이크를 키보드에서 5~10cm 떨어뜨려 주세요.'],
            ['q' => '오디오 데이터가 저장되나요?', 'a' => '아니요 — 모든 처리는 브라우저 내에서 로컬로 실행됩니다. 오디오는 서버로 전송되지 않습니다. 중지를 클릭하면 마이크 스트림이 해제됩니다.'],
        ],
        'hreflang_self' => 'languages/korean/keyboard-sound-test.php',
        'is_en' => false,
    ],
    'pt' => [
        'dir' => 'portuguese', 'html_lang' => 'pt',
        'title' => 'Analisador de Som de Switch de Teclado — Teste Linear, Tátil ou Clicky | KeyboardTester.click',
        'description' => 'Analisador de som de switches de teclado: classifica seus switches como lineares, táteis ou clicky via análise do microfone no navegador. Rápido, sem upload de dados.',
        'keywords' => 'teste som teclado, analisador teclado mecânico, teste switch teclado, teclado barulhento teste, thock teste online',
        'h1' => 'Analisador de Som de Switch de Teclado',
        'subtitle' => 'Análise FFT em tempo real classifica seus switches mecânicos pelo perfil sonoro',
        'btn_start' => '🎤 Iniciar Escuta',
        'btn_stop' => '⏹ Parar',
        'btn_reset' => 'Reiniciar',
        'label_linear' => 'Linear (Thock)',
        'label_tactile' => 'Tátil',
        'label_clicky' => 'Clicky',
        'label_peak_freq' => 'Frequência de Pico',
        'label_sound_level' => 'Nível de Som',
        'label_result' => 'Resultado',
        'label_input_level' => 'Nível de Entrada',
        'label_listening' => 'Ouvindo… Pressione uma tecla perto do microfone agora.',
        'label_instructions' => 'Instruções',
        'hint_text' => 'Clique em "Iniciar Escuta", depois pressione uma tecla no teclado perto do microfone. Segure o mic a 10–20 cm do teclado para melhores resultados.',
        'mic_denied' => 'Acesso ao microfone negado. Clique no ícone do microfone na barra de endereços e permita o acesso.',
        'mic_unsupported' => 'Seu navegador não suporta acesso ao microfone. Por favor, use Chrome, Firefox ou Edge.',
        'classification_title' => 'Classificação do Switch',
        'tip_linear' => 'Perfil de baixa frequência profundo — característico de switches lineares como MX Red, Gateron Yellow ou lineares totalmente lubrificados.',
        'tip_tactile' => 'Snap de frequência média detectado — típico de switches táteis como MX Brown, Boba U4 ou Holy Pandas.',
        'tip_clicky' => 'Perfil brilhante de alta frequência — corresponde a switches clicky como MX Blue, Box White ou Kailh Box Jade.',
        'privacy' => 'Este teste é executado inteiramente no seu navegador. Nenhum dado é coletado ou transmitido.',
        'trust' => ['Baseado em microfone', 'Análise FFT real', 'Classificação instantânea', '100% Navegador'],
        'trust_desc' => ['Usa o microfone do navegador — sem hardware externo', 'AnalyserNode processa 2048 bins de frequência', 'Resultado linear, tátil ou clicky em 300ms', 'Sem download — funciona no Chrome, Firefox, Edge'],
        'h2_1' => 'Linear, Tátil e Clicky — O Que o Som do Seu Switch Diz?',
        'p_1' => 'Os switches mecânicos produzem três perfis acústicos distintos. Switches lineares (MX Red, Gateron Yellow) atuam suavemente produzindo um golpe de baixa frequência abaixo de 500 Hz — o "thock" tão desejado. Switches táteis (Brown, Boba U4) geram um snap de frequência média na faixa de 500–2000 Hz. Switches clicky (Blue, Box White) produzem som brilhante rico em frequências acima de 2000 Hz.',
        'h2_2' => 'Como Funciona o Analisador de Som do Teclado',
        'p_2' => 'Ao clicar em "Iniciar Escuta", a ferramenta solicita acesso ao microfone e cria um AudioContext com AnalyserNode de 2048 bins FFT. Quando detecta um pressionamento de tecla, captura uma janela de 300ms, lê todos os bins de frequência e identifica o pico. A frequência resultante é comparada com três bandas de limite para produzir a classificação.',
        'h2_3' => 'Meu Teclado É Muito Barulhento? Níveis de Decibéis Explicados',
        'p_3' => 'Ambientes de escritório normalmente visam 60–65 dB(A). Switches lineares medem tipicamente 45–52 dB. Táteis ficam em 50–58 dB. Clicky são os mais barulhentos com 55–70 dB. Mudar para switches lineares com O-rings normalmente reduz os níveis de pico em 8–12 dB.',
        'h2_4' => 'Como Reduzir o Barulho do Teclado',
        'p_4' => 'O-rings de silicone reduzem o ruído de impacto em 5–10 dB. Tapetes de mesa absorvem ressonância do case em 3–6 dB. Espuma interna elimina o ping do case oco. Lubrificante Krytox 205g0 remove o componente de alta frequência. Combine os quatro para melhores resultados.',
        'faq_h2' => 'Perguntas Frequentes',
        'faqs' => [
            ['q' => 'Esta ferramenta pode identificar meu modelo exato de switch?', 'a' => 'Não — classifica por perfil sonoro (linear/tátil/clicky). A identificação exata requer pesquisa manual. A assinatura de frequência indica o caráter acústico, não a marca ou o modelo.'],
            ['q' => 'Meu microfone não é detectado. O que devo fazer?', 'a' => 'Verifique as permissões do navegador — clique no ícone do microfone na barra de endereços. No Chrome: Configurações → Privacidade → Configurações do site → Microfone.'],
            ['q' => 'Por que diz "Clicky" quando tenho switches lineares?', 'a' => 'Ressonância da placa ou ruído dos estabilizadores podem adicionar componentes de alta frequência. Tente pressionar uma tecla no centro do teclado e adicione espuma ao case.'],
            ['q' => 'Funciona no celular?', 'a' => 'Sim — toque uma tecla de um teclado Bluetooth conectado ou bata em uma superfície perto do microfone do seu telefone. Segure o mic a 5–10 cm do teclado.'],
            ['q' => 'Meus dados de áudio são armazenados?', 'a' => 'Não — todo o processamento é feito localmente no seu navegador. Nenhum áudio é enviado a servidores. O stream do microfone é liberado ao clicar em Parar.'],
        ],
        'hreflang_self' => 'languages/portuguese/keyboard-sound-test.php',
        'is_en' => false,
    ],
    'ru' => [
        'dir' => 'russian', 'html_lang' => 'ru',
        'title' => 'Анализатор Звука Переключателей Клавиатуры — Тест Линейный, Тактильный, Кликающий | KeyboardTester.click',
        'description' => 'Анализатор звука клавиатурных свитчей: классифицирует свитчи как linear, tactile или clicky через анализ микрофона в браузере. Быстро, без загрузки данных на сервер.',
        'keywords' => 'тест звука клавиатуры, анализатор механической клавиатуры, тест переключателя клавиатуры, клавиатура шумная тест',
        'h1' => 'Анализатор Звука Переключателей Клавиатуры',
        'subtitle' => 'FFT-анализ в реальном времени классифицирует переключатели по акустическому профилю',
        'btn_start' => '🎤 Начать прослушивание',
        'btn_stop' => '⏹ Остановить',
        'btn_reset' => 'Сброс',
        'label_linear' => 'Линейный (Тхок)',
        'label_tactile' => 'Тактильный',
        'label_clicky' => 'Кликающий',
        'label_peak_freq' => 'Пиковая частота',
        'label_sound_level' => 'Уровень звука',
        'label_result' => 'Результат',
        'label_input_level' => 'Уровень входного сигнала',
        'label_listening' => 'Прослушивание… Нажмите клавишу рядом с микрофоном.',
        'label_instructions' => 'Инструкции',
        'hint_text' => 'Нажмите "Начать прослушивание", затем нажмите клавишу на клавиатуре рядом с микрофоном. Держите микрофон на расстоянии 10–20 см от клавиатуры для лучших результатов.',
        'mic_denied' => 'Доступ к микрофону отклонён. Нажмите на иконку микрофона в адресной строке и разрешите доступ.',
        'mic_unsupported' => 'Ваш браузер не поддерживает доступ к микрофону. Пожалуйста, используйте Chrome, Firefox или Edge.',
        'classification_title' => 'Классификация переключателя',
        'tip_linear' => 'Глубокий низкочастотный профиль — характерен для линейных переключателей MX Red, Gateron Yellow или полностью смазанных линейных.',
        'tip_tactile' => 'Среднечастотный щелчок — типичен для тактильных переключателей MX Brown, Boba U4 или Holy Pandas.',
        'tip_clicky' => 'Яркий высокочастотный профиль — соответствует кликающим переключателям MX Blue, Box White или Kailh Box Jade.',
        'privacy' => 'Тест выполняется полностью в вашем браузере. Данные не собираются и не передаются.',
        'trust' => ['На основе микрофона', 'Реальный FFT-анализ', 'Мгновенная классификация', '100% в браузере'],
        'trust_desc' => ['Использует микрофон браузера — внешнее оборудование не нужно', 'AnalyserNode обрабатывает 2048 частотных бинов', 'Результат линейный/тактильный/кликающий за 300ms', 'Без установки — работает в Chrome, Firefox, Edge'],
        'h2_1' => 'Линейный, Тактильный и Кликающий — Что Говорит Звук Вашего Переключателя?',
        'p_1' => 'Механические переключатели производят три различных акустических профиля. Линейные (MX Red, Gateron Yellow) работают плавно, производя низкочастотный звук ниже 500 Гц — желанный звук "тхок". Тактильные (Brown, Boba U4) создают среднечастотный щелчок в диапазоне 500–2000 Гц. Кликающие (Blue, Box White) производят яркий звук, богатый частотами выше 2000 Гц.',
        'h2_2' => 'Как Работает Анализатор Звука Клавиатуры',
        'p_2' => 'При нажатии "Начать прослушивание" инструмент запрашивает доступ к микрофону и создаёт AudioContext с AnalyserNode на 2048 бинов FFT. При обнаружении нажатия клавиши захватывается окно 300ms, читаются все частотные бины и определяется пик. Результирующая частота сравнивается с тремя пороговыми диапазонами для классификации.',
        'h2_3' => 'Моя Клавиатура Слишком Шумная? Уровни Децибел',
        'p_3' => 'Офисная среда обычно целится в 60–65 дБ(А). Линейные переключатели измеряют 45–52 дБ. Тактильные около 50–58 дБ. Кликающие самые громкие — 55–70 дБ. Смена на линейные с O-кольцами обычно снижает пиковые уровни на 8–12 дБ.',
        'h2_4' => 'Как Снизить Шум Клавиатуры',
        'p_4' => 'Силиконовые O-кольца снижают шум удара на 5–10 дБ. Настольные коврики поглощают резонанс корпуса на 3–6 дБ. Внутренний поролон устраняет эхо пустого корпуса. Смазка Krytox 205g0 убирает высокочастотный компонент. Комбинируйте все четыре для лучших результатов.',
        'faq_h2' => 'Часто Задаваемые Вопросы',
        'faqs' => [
            ['q' => 'Может ли инструмент определить точную модель переключателя?', 'a' => 'Нет — классификация выполняется по акустическому профилю (линейный/тактильный/кликающий). Точная идентификация модели требует ручного поиска. Частотная сигнатура указывает на акустический характер, а не на марку или модель.'],
            ['q' => 'Микрофон не обнаруживается. Что делать?', 'a' => 'Проверьте разрешения браузера — нажмите на иконку микрофона в адресной строке и разрешите доступ. В Chrome: Настройки → Конфиденциальность → Настройки сайта → Микрофон.'],
            ['q' => 'Почему отображается "Кликающий", хотя у меня линейные переключатели?', 'a' => 'Резонанс платы или шум стабилизаторов могут добавлять высокочастотные компоненты. Попробуйте нажать клавишу в центре клавиатуры и добавьте поролон в корпус.'],
            ['q' => 'Работает ли на мобильном?', 'a' => 'Да — нажмите клавишу на подключённой Bluetooth-клавиатуре или постучите по поверхности рядом с микрофоном телефона. Держите микрофон в 5–10 см от клавиатуры.'],
            ['q' => 'Сохраняются ли мои аудиоданные?', 'a' => 'Нет — вся обработка выполняется локально в браузере. Аудио не отправляется на серверы. Поток микрофона освобождается при нажатии Остановить.'],
        ],
        'hreflang_self' => 'languages/russian/keyboard-sound-test.php',
        'is_en' => false,
    ],
];

$d    = $langData[$lang] ?? $langData['en'];
$isRtl = ($lang === 'ar');

$allLangs = [
    'en' => 'keyboard-sound-test.php',
    'es' => 'languages/spanish/keyboard-sound-test.php',
    'ar' => 'languages/arabic/keyboard-sound-test.php',
    'fr' => 'languages/french/keyboard-sound-test.php',
    'de' => 'languages/german/keyboard-sound-test.php',
    'ja' => 'languages/japanese/keyboard-sound-test.php',
    'ko' => 'languages/korean/keyboard-sound-test.php',
    'pt' => 'languages/portuguese/keyboard-sound-test.php',
    'ru' => 'languages/russian/keyboard-sound-test.php',
];

// JS strings
$jsBtnStart          = json_encode($d['btn_start']);
$jsBtnStop           = json_encode($d['btn_stop']);
$jsLabelLinear       = json_encode($d['label_linear']);
$jsLabelTactile      = json_encode($d['label_tactile']);
$jsLabelClicky       = json_encode($d['label_clicky']);
$jsLabelListening    = json_encode($d['label_listening']);
$jsLabelInstructions = json_encode($d['label_instructions']);
$jsHintText          = json_encode($d['hint_text']);
$jsMicDenied         = json_encode($d['mic_denied']);
$jsMicUnsupported    = json_encode($d['mic_unsupported']);
$jsTipLinear         = json_encode($d['tip_linear']);
$jsTipTactile        = json_encode($d['tip_tactile']);
$jsTipClicky         = json_encode($d['tip_clicky']);
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
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('keyboard-sound-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"WebApplication","name":<?php echo json_encode($d['h1']); ?>,"url":"<?php echo absoluteUrl($d['hreflang_self']); ?>","description":<?php echo json_encode($d['description']); ?>,"applicationCategory":"UtilityApplication","operatingSystem":"Any","isAccessibleForFree":true,"featureList":["Real-time FFT frequency analysis","Linear/Tactile/Clicky classification","Waveform visualization","Decibel level meter"]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"FAQPage","mainEntity":[<?php
    $faqItems = [];
    foreach ($d['faqs'] as $faq) {
        $faqItems[] = '{"@type":"Question","name":' . json_encode($faq['q']) . ',"acceptedAnswer":{"@type":"Answer","text":' . json_encode($faq['a']) . '}}';
    }
    echo implode(',', $faqItems);
  ?>]}
  </script>
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[{"@type":"ListItem","position":1,"name":"Home","item":"<?php echo absoluteUrl(''); ?>"},{"@type":"ListItem","position":2,"name":<?php echo json_encode($d['h1']); ?>,"item":"<?php echo absoluteUrl($d['hreflang_self']); ?>"}]}
  </script>
  <style>
    .kst-tool{max-width:740px;margin:0 auto;padding:2rem 1.5rem 2.5rem;text-align:center}
    .kst-tool h1{font-size:clamp(1.6rem,4vw,2.4rem);font-weight:700;margin-bottom:.4rem;color:var(--heading-color,#1e293b)}
    .kst-tool .tool-subtitle{font-size:1rem;color:var(--text-muted,#475569);margin-bottom:1.75rem}
    .kst-start-btn{display:inline-flex;align-items:center;gap:.5rem;padding:.75rem 2.25rem;min-height:48px;border:none;border-radius:10px;background:var(--primary-color,#4b5eaa);color:#fff;font-family:inherit;font-size:1rem;font-weight:700;cursor:pointer;transition:opacity .15s,transform .1s;margin-bottom:1.5rem}
    .kst-start-btn:hover{opacity:.88;transform:translateY(-1px)}
    .kst-start-btn.listening{background:#dc2626}
    .kst-error{display:none;background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.35);border-radius:8px;padding:.75rem 1rem;color:#dc2626;font-size:.9rem;margin-bottom:1.25rem}
    .kst-error.visible{display:block}
    .kst-db-wrap{margin-bottom:1.25rem;text-align:<?php echo $isRtl ? 'right' : 'left'; ?>}
    .kst-db-label{font-size:.78rem;text-transform:uppercase;letter-spacing:.05em;color:var(--text-muted,#475569);margin-bottom:.3rem}
    .kst-db-track{height:12px;background:var(--card-bg,#f1f5f9);border:1px solid var(--border-color,#e2e8f0);border-radius:6px;overflow:hidden}
    .kst-db-fill{height:100%;width:0%;background:linear-gradient(90deg,#22c55e,#f59e0b,#ef4444);border-radius:6px;transition:width .05s linear}
    .kst-db-value{font-size:.85rem;font-family:'JetBrains Mono',monospace;color:var(--text-muted,#475569);margin-top:.25rem;text-align:<?php echo $isRtl ? 'left' : 'right'; ?>}
    .kst-canvas-wrap{background:var(--card-bg,#0f172a);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;overflow:hidden;margin-bottom:1.25rem}
    .kst-canvas-wrap canvas{display:block;width:100%;height:120px}
    .kst-result{display:none;background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:12px;padding:1.5rem 1.25rem;margin-bottom:1.5rem}
    .kst-result.visible{display:block}
    .kst-result-title{font-size:1rem;font-weight:700;color:var(--heading-color,#1e293b);margin-bottom:.75rem}
    .kst-badge{display:inline-block;padding:.45rem 1.25rem;border-radius:50px;font-size:1.1rem;font-weight:700;margin-bottom:.6rem}
    .badge-linear{background:rgba(34,197,94,.15);color:#16a34a}
    .badge-tactile{background:rgba(234,179,8,.15);color:#a16207}
    .badge-clicky{background:rgba(99,102,241,.15);color:#4338ca}
    .kst-result-sub{font-size:.9rem;color:var(--text-muted,#475569)}
    .kst-freq-row{display:flex;justify-content:center;gap:1.5rem;flex-wrap:wrap;margin-top:.75rem}
    .kst-freq-item{text-align:center}
    .kst-freq-val{font-size:1.4rem;font-weight:700;font-family:'JetBrains Mono',monospace;color:var(--primary-color,#4b5eaa)}
    .kst-freq-lbl{font-size:.75rem;text-transform:uppercase;letter-spacing:.05em;color:var(--text-muted,#475569)}
    .kst-hint{background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:.75rem 1rem;font-size:.9rem;color:var(--text-color,#1e293b);margin-bottom:1.25rem;text-align:<?php echo $isRtl ? 'right' : 'left'; ?>}
    .kst-hint strong{color:var(--primary-color,#4b5eaa)}
    .reset-btn{padding:.55rem 1.5rem;min-height:44px;border:1px solid var(--border-color,#e2e8f0);border-radius:8px;background:transparent;color:var(--text-muted,#475569);font-family:inherit;font-size:.9rem;font-weight:600;cursor:pointer;transition:border-color .15s,color .15s;margin-left:.5rem}
    .reset-btn:hover{border-color:var(--primary-color,#4b5eaa);color:var(--primary-color,#4b5eaa)}
    .privacy-note{font-size:.8rem;color:var(--text-muted,#475569);margin-top:.75rem}
    @media(max-width:768px){.kst-tool{padding:1.25rem 1rem 2rem}.kst-freq-row{gap:1rem}}
  </style>
</head>
<body class="landing-page">
  <?php if ($d['is_en']): ?>
    <?php include __DIR__ . '/../../header.php'; ?>
  <?php else: ?>
    <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/header-' . $lang . '.php'; ?>
  <?php endif; ?>
  <main id="main-content" class="landing-main">

    <section class="tool-stage" aria-labelledby="kst-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="kst-tool-title"><?php echo htmlspecialchars($d['h1']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['subtitle']); ?></p>
        </div>
      </div>
      <section class="tool-shell">
        <div class="kst-tool">
          <h1><?php echo htmlspecialchars($d['h1']); ?></h1>
          <p class="tool-subtitle"><?php echo htmlspecialchars($d['subtitle']); ?></p>

          <div class="kst-error" id="kst-error" role="alert"></div>

          <button class="kst-start-btn" id="kst-start-btn" aria-label="<?php echo htmlspecialchars($d['btn_start']); ?>">
            <?php echo htmlspecialchars($d['btn_start']); ?>
          </button>
          <button class="reset-btn" id="kst-reset-btn"><?php echo htmlspecialchars($d['btn_reset']); ?></button>

          <div class="kst-hint" id="kst-hint">
            <strong><?php echo htmlspecialchars($d['label_instructions']); ?>:</strong> <?php echo htmlspecialchars($d['hint_text']); ?>
          </div>

          <div class="kst-db-wrap">
            <div class="kst-db-label"><?php echo htmlspecialchars($d['label_input_level']); ?></div>
            <div class="kst-db-track" role="progressbar" aria-label="<?php echo htmlspecialchars($d['label_input_level']); ?>" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
              <div class="kst-db-fill" id="kst-db-fill"></div>
            </div>
            <div class="kst-db-value" id="kst-db-value">— dB</div>
          </div>

          <div class="kst-canvas-wrap" aria-label="Waveform visualization">
            <canvas id="kst-canvas" height="120" aria-hidden="true"></canvas>
          </div>

          <div class="kst-result" id="kst-result" role="status" aria-live="assertive">
            <div class="kst-result-title"><?php echo htmlspecialchars($d['classification_title']); ?></div>
            <div class="kst-badge" id="kst-badge">—</div>
            <div class="kst-result-sub" id="kst-result-sub"></div>
            <div class="kst-freq-row">
              <div class="kst-freq-item">
                <div class="kst-freq-val" id="kst-peak-freq">—</div>
                <div class="kst-freq-lbl"><?php echo htmlspecialchars($d['label_peak_freq']); ?></div>
              </div>
              <div class="kst-freq-item">
                <div class="kst-freq-val" id="kst-db-peak">—</div>
                <div class="kst-freq-lbl"><?php echo htmlspecialchars($d['label_sound_level']); ?></div>
              </div>
            </div>
          </div>

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

    <section class="feature-band" aria-labelledby="kst-h2-1">
      <div class="container">
        <div class="section-head">
          <h2 id="kst-h2-1"><?php echo htmlspecialchars($d['h2_1']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_1']); ?></p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="kst-h2-2">
      <div class="container">
        <div class="section-head">
          <h2 id="kst-h2-2"><?php echo htmlspecialchars($d['h2_2']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_2']); ?></p>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="kst-h2-3">
      <div class="container">
        <div class="section-head">
          <h2 id="kst-h2-3"><?php echo htmlspecialchars($d['h2_3']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_3']); ?></p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="kst-h2-4">
      <div class="container">
        <div class="section-head">
          <h2 id="kst-h2-4"><?php echo htmlspecialchars($d['h2_4']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_4']); ?></p>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="kst-faq">
      <div class="container">
        <div class="section-head">
          <h2 id="kst-faq"><?php echo htmlspecialchars($d['faq_h2']); ?></h2>
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
  document.addEventListener('DOMContentLoaded', function() {
    requestAnimationFrame(function(){ setTimeout(function(){
      'use strict';

      var btnStart    = document.getElementById('kst-start-btn');
      var resetBtn    = document.getElementById('kst-reset-btn');
      var errorEl     = document.getElementById('kst-error');
      var hintEl      = document.getElementById('kst-hint');
      var dbFill      = document.getElementById('kst-db-fill');
      var dbValue     = document.getElementById('kst-db-value');
      var dbTrack     = document.querySelector('.kst-db-track');
      var canvas      = document.getElementById('kst-canvas');
      var resultEl    = document.getElementById('kst-result');
      var badgeEl     = document.getElementById('kst-badge');
      var subEl       = document.getElementById('kst-result-sub');
      var peakFreqEl  = document.getElementById('kst-peak-freq');
      var dbPeakEl    = document.getElementById('kst-db-peak');

      var btnStartText = <?php echo $jsBtnStart; ?>;
      var btnStopText  = <?php echo $jsBtnStop; ?>;
      var labelListening = <?php echo $jsLabelListening; ?>;
      var labelInstructions = <?php echo $jsLabelInstructions; ?>;
      var hintText     = <?php echo $jsHintText; ?>;
      var micDenied    = <?php echo $jsMicDenied; ?>;
      var micUnsupported = <?php echo $jsMicUnsupported; ?>;
      var labelLinear  = <?php echo $jsLabelLinear; ?>;
      var labelTactile = <?php echo $jsLabelTactile; ?>;
      var labelClicky  = <?php echo $jsLabelClicky; ?>;
      var tipLinear    = <?php echo $jsTipLinear; ?>;
      var tipTactile   = <?php echo $jsTipTactile; ?>;
      var tipClicky    = <?php echo $jsTipClicky; ?>;

      var audioCtx   = null;
      var analyser   = null;
      var source     = null;
      var stream     = null;
      var rafId      = null;
      var listening  = false;

      var ctx2d = canvas.getContext('2d');
      function resizeCanvas() {
        canvas.width  = canvas.offsetWidth || 680;
        canvas.height = 120;
      }
      resizeCanvas();
      window.addEventListener('resize', resizeCanvas);

      btnStart.addEventListener('click', function() {
        if (listening) {
          stopListening();
        } else {
          startListening();
        }
      });

      function startListening() {
        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
          showError(micUnsupported);
          return;
        }
        navigator.mediaDevices.getUserMedia({ audio: true, video: false })
          .then(function(s) {
            stream     = s;
            audioCtx   = new (window.AudioContext || window.webkitAudioContext)();
            analyser   = audioCtx.createAnalyser();
            analyser.fftSize = 2048;
            analyser.smoothingTimeConstant = 0.5;
            source     = audioCtx.createMediaStreamSource(stream);
            source.connect(analyser);
            listening  = true;
            btnStart.textContent = btnStopText;
            btnStart.classList.add('listening');
            hintEl.innerHTML = '<strong>' + labelInstructions + ':</strong> ' + labelListening;
            clearError();
            drawLoop();
          })
          .catch(function() {
            showError(micDenied);
          });
      }

      function stopListening() {
        listening = false;
        if (rafId) { cancelAnimationFrame(rafId); rafId = null; }
        if (source) { source.disconnect(); source = null; }
        if (audioCtx) { audioCtx.close(); audioCtx = null; }
        if (stream) {
          stream.getTracks().forEach(function(t) { t.stop(); });
          stream = null;
        }
        analyser = null;
        btnStart.textContent = btnStartText;
        btnStart.classList.remove('listening');
        hintEl.innerHTML = '<strong>' + labelInstructions + ':</strong> ' + hintText;
        dbFill.style.width = '0%';
        dbValue.textContent = '— dB';
        ctx2d.clearRect(0, 0, canvas.width, canvas.height);
      }

      var captureArmed    = true;
      var captureCooldown = 0;

      function drawLoop() {
        if (!listening || !analyser) return;
        rafId = requestAnimationFrame(drawLoop);

        var bufLen   = analyser.frequencyBinCount;
        var timeData = new Uint8Array(bufLen);
        var freqData = new Uint8Array(bufLen);
        analyser.getByteTimeDomainData(timeData);
        analyser.getByteFrequencyData(freqData);

        var sumSq = 0;
        for (var i = 0; i < bufLen; i++) {
          var v = (timeData[i] - 128) / 128;
          sumSq += v * v;
        }
        var rms   = Math.sqrt(sumSq / bufLen);
        var dbRaw = rms > 0 ? 20 * Math.log10(rms) : -80;
        var pct   = Math.max(0, Math.min(100, ((dbRaw + 60) / 60) * 100));
        dbFill.style.width = pct.toFixed(1) + '%';
        if (dbTrack) dbTrack.setAttribute('aria-valuenow', Math.round(pct));
        dbValue.textContent = dbRaw > -79 ? dbRaw.toFixed(1) + ' dB' : '— dB';

        var W = canvas.width, H = canvas.height;
        ctx2d.fillStyle = '#0f172a';
        ctx2d.fillRect(0, 0, W, H);
        ctx2d.lineWidth   = 2;
        ctx2d.strokeStyle = '#38bdf8';
        ctx2d.beginPath();
        var sliceW = W / bufLen;
        var x = 0;
        for (var j = 0; j < bufLen; j++) {
          var y = (timeData[j] / 255) * H;
          if (j === 0) ctx2d.moveTo(x, y);
          else         ctx2d.lineTo(x, y);
          x += sliceW;
        }
        ctx2d.stroke();

        if (captureCooldown > 0) { captureCooldown--; return; }
        if (captureArmed && rms > 0.04) {
          captureArmed    = false;
          captureCooldown = 18;
          analyseKeypress(freqData, dbRaw);
          setTimeout(function() { captureArmed = true; }, 600);
        }
      }

      function analyseKeypress(freqData, dbRaw) {
        var sampleRate = audioCtx ? audioCtx.sampleRate : 44100;
        var fftSize    = analyser ? analyser.fftSize : 2048;
        var binCount   = freqData.length;

        var peakBin = 0, peakVal = 0;
        for (var i = 1; i < binCount; i++) {
          if (freqData[i] > peakVal) { peakVal = freqData[i]; peakBin = i; }
        }
        var peakHz = Math.round((peakBin * sampleRate) / fftSize);

        var classification, badgeClass, tip;
        if (peakHz < 500) {
          classification = labelLinear;  badgeClass = 'badge-linear';  tip = tipLinear;
        } else if (peakHz <= 2000) {
          classification = labelTactile; badgeClass = 'badge-tactile'; tip = tipTactile;
        } else {
          classification = labelClicky;  badgeClass = 'badge-clicky';  tip = tipClicky;
        }

        badgeEl.textContent  = classification;
        badgeEl.className    = 'kst-badge ' + badgeClass;
        subEl.textContent    = tip;
        peakFreqEl.textContent = peakHz >= 1000 ? (peakHz / 1000).toFixed(1) + ' kHz' : peakHz + ' Hz';
        dbPeakEl.textContent   = dbRaw.toFixed(1) + ' dB';
        resultEl.classList.add('visible');
      }

      resetBtn.addEventListener('click', function() {
        stopListening();
        resultEl.classList.remove('visible');
        badgeEl.className   = 'kst-badge';
        badgeEl.textContent = '—';
        subEl.textContent   = '';
        peakFreqEl.textContent = '—';
        dbPeakEl.textContent   = '—';
        captureArmed    = true;
        captureCooldown = 0;
        clearError();
      });

      function showError(msg) { errorEl.textContent = msg; errorEl.classList.add('visible'); }
      function clearError()   { errorEl.textContent = ''; errorEl.classList.remove('visible'); }

    }, 0); });
  });
  </script>
</body>
</html>
