<?php
/**
 * Localized Mouse Lift-Off Distance (LOD) Test renderer
 * Included by language wrapper pages. Expects: $lang (e.g. 'es')
 */

$langData = [
    'en' => [
        'dir' => '', 'html_lang' => 'en',
        'title' => 'Mouse Lift-Off Distance Test — Check Your Mouse LOD Online Free | KeyboardTester.click',
        'description' => 'Test your gaming mouse lift-off distance (LOD) online free. Move your mouse, lift and reposition it, and our tool measures cursor displacement to rate your LOD. No software needed.',
        'keywords' => 'mouse lift off distance test, mouse LOD test online, gaming mouse LOD checker, mouse sensor calibration test, LOD test',
        'h1' => 'Mouse Lift-Off Distance Test',
        'subtitle' => 'Move, lift, and reposition your mouse 5 times to get an averaged LOD classification',
        'section_kicker' => 'Primary tool',
        'section_h2' => 'Mouse Lift-Off Distance (LOD) Tester',
        'section_lede' => 'Move your mouse in the tracking area, lift and reposition it — the tool measures cursor displacement each time.',
        'hint' => 'Instructions: Move your mouse inside the tracking area below. Lift it off your mouse pad and put it back down. Repeat 5 times — the tool calculates the average cursor drift on each lift.',
        'label_avg' => 'Avg Displacement (px)',
        'label_lifts' => 'Lifts Recorded',
        'label_last' => 'Last Lift (px)',
        'track_msg' => 'Move your mouse in this area, then lift off the mouse pad',
        'scatter_title' => 'Lift displacement history',
        'btn_reset' => 'Reset',
        'privacy' => 'This test runs entirely in your browser. No data is collected or transmitted.',
        'lod_very_low' => 'Very Low LOD',
        'lod_low' => 'Low LOD',
        'lod_medium' => 'Medium LOD',
        'lod_high' => 'High LOD',
        'desc_very_low' => 'Excellent for competitive FPS gaming. Your mouse stops tracking almost immediately on lift — no measurable aim drift during repositioning.',
        'desc_low' => 'Good for most gaming. Slight cursor drift on lift is unlikely to affect your aim at typical gaming sensitivities.',
        'desc_medium' => 'Acceptable for casual gaming. Low-sensitivity FPS players may notice minor aim drift on lifts. Consider a hard mouse pad or LOD setting adjustment.',
        'desc_high' => 'May cause noticeable cursor drift during repositioning. Try a hard mouse pad, thinner mouse feet, or lower the LOD setting in your mouse software.',
        'trust' => ['No Hardware Tools', 'Real Displacement Tracking', '5-Lift Average', 'Works with Any Mouse'],
        'trust_desc' => [
            'No ruler or sensor equipment — just your browser and mouse',
            'Measures actual cursor offset between lift and reentry point',
            'Averages five lifts for a reliable, repeatable result',
            'USB, Bluetooth, wired, or wireless — any pointing device',
        ],
        'h2_1' => 'What Is Mouse Lift-Off Distance (LOD)?',
        'p_1' => 'Lift-off distance (LOD) is the height above a surface at which a mouse\'s optical or laser sensor stops tracking. When you physically lift your mouse off the pad, the sensor continues reading the surface briefly as the mouse rises — during this brief window the cursor can drift from where you intended to stop. A sensor with very low LOD stops tracking almost immediately when the mouse clears the surface. Modern gaming mice with Pixart PAW3395, PMW3370, or HERO sensors tend to have very low LOD by default, while older or budget sensors can exhibit significantly higher LOD.',
        'h2_2' => 'Why LOD Matters for FPS Gamers',
        'p_2' => 'In first-person shooters played at low sensitivity, players must frequently lift and reposition the mouse. At low sensitivity settings even a few pixels of cursor drift during a lift translates into a visible aim jump. High LOD mice effectively create a random aim error on every repositioning lift. Low LOD (under 5px in this test) eliminates this variable entirely. Casual gaming or mice used at high sensitivity are much less affected.',
        'h2_3' => 'High LOD vs Low LOD — Which Is Better?',
        'p_3' => 'For competitive FPS gaming at low sensitivity, lower is always better — a Very Low LOD rating (under 5px in this test) is the gold standard. For casual gaming and everyday desktop use, LOD makes no practical difference. Surface type matters more than you might expect: gaming mice paired with hard pads often exhibit measurably lower effective LOD than the same mouse on a thick woven cloth pad.',
        'h2_4' => 'How to Reduce Your Mouse\'s LOD',
        'p_4' => 'If this test shows High or Medium LOD and you want to improve it, there are several practical approaches. Switch to a hard mouse pad: hard pads present a perfectly flat surface that tends to produce lower LOD. Replace mouse feet: aftermarket PTFE feet are thinner and can reduce effective LOD. Check mouse software settings: some gaming mice expose an LOD adjustment in their companion software — Logitech G Hub, Razer Synapse, and SteelSeries GG all include LOD sliders on supported models.',
        'faq_h2' => 'Frequently Asked Questions',
        'faqs' => [
            ['q' => 'What counts as a "good" LOD?', 'a' => 'For competitive FPS gaming, very low LOD (less than 5px cursor shift) is ideal. For casual use, medium LOD is perfectly fine. Only players using very low sensitivity who frequently lift and reposition the mouse will notice the difference.'],
            ['q' => 'Why does my LOD vary between tests?', 'a' => 'Lift speed, angle, and surface texture all affect readings. A fast straight lift produces less sensor drift than a slow angled one. Test 10+ times at your natural lifting speed for an accurate average.'],
            ['q' => 'Does mouse pad material affect LOD?', 'a' => 'Yes — rough cloth pads can increase effective LOD compared to hard pads because the surface texture catches the sensor at a shallower angle. Hard pads provide a flatter surface that tends to give lower and more consistent LOD readings.'],
            ['q' => 'Can I test LOD on a laptop trackpad?', 'a' => 'This tool is designed for external mice with optical or laser sensors. Laptop trackpads do not have lift-off distance in the same physical sense — they detect finger presence via capacitance rather than optical surface reflection.'],
            ['q' => 'My cursor barely moves when I lift — is my LOD very low?', 'a' => 'Yes! Less than 5px average displacement means your mouse has excellent low LOD. This is ideal for FPS gaming. Most modern gaming mice with high-end sensors have very low LOD by default, especially when used on hard mouse pads.'],
        ],
        'table_col1' => 'Avg Displacement',
        'table_col2' => 'LOD Rating',
        'table_col3' => 'Suitability',
        'table_rows' => [
            ['< 5 px', 'Very Low LOD', 'Excellent for competitive FPS gaming'],
            ['5 – 15 px', 'Low LOD', 'Good for most gaming use cases'],
            ['15 – 30 px', 'Medium LOD', 'Acceptable — casual gaming fine'],
            ['> 30 px', 'High LOD', 'May cause aim drift — check sensor settings'],
        ],
        'hreflang_self' => 'mouse-lod-test.php',
        'is_en' => true,
    ],
    'es' => [
        'dir' => 'spanish', 'html_lang' => 'es',
        'title' => 'Test de Distancia de Despegue del Ratón (LOD) Online | KeyboardTester.click',
        'description' => 'Prueba de distancia de elevación del ratón (LOD): mide a qué altura el sensor deja de rastrear la superficie. Útil para ajustar ratones gaming en FPS, sin instalación.',
        'keywords' => 'test LOD ratón, distancia despegue ratón, test sensor ratón gaming, calibración ratón LOD, LOD test online',
        'h1' => 'Test de Distancia de Despegue del Ratón',
        'subtitle' => 'Mueve, levanta y reposiciona tu ratón 5 veces para obtener una clasificación LOD promediada',
        'section_kicker' => 'Herramienta principal',
        'section_h2' => 'Medidor de Distancia de Despegue (LOD)',
        'section_lede' => 'Mueve el ratón en el área de seguimiento, levántalo y reposiciónalo — la herramienta mide el desplazamiento cada vez.',
        'hint' => 'Instrucciones: Mueve el ratón dentro del área de seguimiento. Levántalo del mousepad y vuelve a colocarlo. Repite 5 veces — la herramienta calcula el desplazamiento promedio del cursor.',
        'label_avg' => 'Desplazamiento Promedio (px)',
        'label_lifts' => 'Levantamientos Registrados',
        'label_last' => 'Último Levantamiento (px)',
        'track_msg' => 'Mueve el ratón en esta área, luego levántalo del mousepad',
        'scatter_title' => 'Historial de desplazamiento',
        'btn_reset' => 'Reiniciar',
        'privacy' => 'Esta prueba se ejecuta completamente en tu navegador. No se recopilan ni transmiten datos.',
        'lod_very_low' => 'LOD Muy Bajo',
        'lod_low' => 'LOD Bajo',
        'lod_medium' => 'LOD Medio',
        'lod_high' => 'LOD Alto',
        'desc_very_low' => 'Excelente para juegos FPS competitivos. Tu ratón deja de rastrear casi inmediatamente al levantarlo — sin desviación de puntería apreciable.',
        'desc_low' => 'Bueno para la mayoría de juegos. La ligera deriva al levantar es poco probable que afecte tu puntería en sensibilidades normales.',
        'desc_medium' => 'Aceptable para juego casual. Los jugadores FPS de baja sensibilidad pueden notar pequeñas desviaciones. Considera un mousepad duro o ajustar el LOD.',
        'desc_high' => 'Puede causar deriva notable al reposicionar. Prueba un mousepad duro, pies más delgados o reduce el ajuste LOD en el software de tu ratón.',
        'trust' => ['Sin Herramientas Extra', 'Seguimiento Real', 'Promedio de 5 Levantamientos', 'Cualquier Ratón'],
        'trust_desc' => [
            'Solo necesitas tu navegador y ratón',
            'Mide el desplazamiento real del cursor entre levantamiento y reentrada',
            'Promedia cinco levantamientos para un resultado fiable',
            'USB, Bluetooth, con cable o inalámbrico',
        ],
        'h2_1' => '¿Qué es la Distancia de Despegue del Ratón (LOD)?',
        'p_1' => 'La distancia de despegue (LOD) es la altura sobre la superficie a la que el sensor óptico o láser del ratón deja de rastrear. Cuando levantas el ratón, el sensor continúa leyendo la superficie brevemente — durante ese tiempo el cursor puede moverse. Los ratones gaming modernos con sensores Pixart PAW3395 o HERO suelen tener LOD muy bajo, mientras que los sensores más antiguos pueden tener LOD significativamente mayor.',
        'h2_2' => 'Por qué el LOD importa para los jugadores FPS',
        'p_2' => 'En los shooters en primera persona con baja sensibilidad, los jugadores deben levantar y reposicionar el ratón con frecuencia. Con baja sensibilidad, incluso unos pocos píxeles de deriva del cursor durante un levantamiento se traducen en un salto visible de la mira. Un LOD bajo elimina completamente esta variable.',
        'h2_3' => 'LOD Alto vs LOD Bajo — ¿Cuál es mejor?',
        'p_3' => 'Para el juego FPS competitivo con baja sensibilidad, cuanto más bajo mejor. Un LOD Muy Bajo (menos de 5px) es el estándar de oro. Para uso casual, el LOD no tiene ninguna importancia práctica. El tipo de superficie también importa: los mousepads duros suelen dar lecturas de LOD más bajas y consistentes.',
        'h2_4' => 'Cómo reducir el LOD de tu ratón',
        'p_4' => 'Si este test muestra LOD Alto o Medio, hay varias formas de mejorar. Cambia a un mousepad duro: superficies acrílicas o de cristal presentan un plano más uniforme que tiende a dar LOD menor. Reemplaza los pies del ratón: los pies de PTFE aftermarket son más delgados. Revisa el software del ratón: Logitech G Hub, Razer Synapse y SteelSeries GG incluyen ajustes de LOD.',
        'faq_h2' => 'Preguntas Frecuentes',
        'faqs' => [
            ['q' => '¿Qué cuenta como un LOD "bueno"?', 'a' => 'Para juego FPS competitivo, un LOD muy bajo (menos de 5px) es ideal. Para uso casual, el LOD medio está perfectamente bien.'],
            ['q' => '¿Por qué varía mi LOD entre pruebas?', 'a' => 'La velocidad, el ángulo y la textura de la superficie afectan las lecturas. Un levantamiento rápido y recto produce menos deriva que uno lento y angular.'],
            ['q' => '¿Afecta el material del mousepad al LOD?', 'a' => 'Sí — los mousepads de tela rugosa pueden aumentar el LOD efectivo comparado con los duros porque la textura atrapa el sensor en un ángulo menor.'],
            ['q' => '¿Puedo probar el LOD en el trackpad del portátil?', 'a' => 'Esta herramienta está diseñada para ratones externos con sensores ópticos o láser. Los trackpads detectan la presencia del dedo por capacitancia, no por reflexión óptica.'],
            ['q' => 'El cursor apenas se mueve cuando levanto — ¿mi LOD es muy bajo?', 'a' => '¡Sí! Menos de 5px de desplazamiento promedio significa que tu ratón tiene un LOD excelente.'],
        ],
        'table_col1' => 'Desplazamiento Promedio',
        'table_col2' => 'Clasificación LOD',
        'table_col3' => 'Adecuado para',
        'table_rows' => [
            ['< 5 px', 'LOD Muy Bajo', 'Excelente para FPS competitivo'],
            ['5 – 15 px', 'LOD Bajo', 'Bueno para la mayoría de juegos'],
            ['15 – 30 px', 'LOD Medio', 'Aceptable — juego casual'],
            ['> 30 px', 'LOD Alto', 'Puede causar deriva — revisa ajustes del sensor'],
        ],
        'hreflang_self' => 'languages/spanish/mouse-lod-test.php',
        'is_en' => false,
    ],
    'ar' => [
        'dir' => 'arabic', 'html_lang' => 'ar',
        'title' => 'اختبار مسافة رفع الماوس (LOD) — قياس حساسية الرفع للماوس | KeyboardTester.click',
        'description' => 'اختبار مسافة رفع الماوس (LOD): يقيس الارتفاع الذي يتوقف عنده المستشعر عن تتبع السطح. مفيد لضبط ماوس الألعاب في FPS، يعمل في المتصفح بدون تثبيت.',
        'keywords' => 'اختبار LOD الماوس, مسافة رفع الماوس, اختبار حساسية الماوس, معايرة حساس الماوس',
        'h1' => 'اختبار مسافة رفع الماوس',
        'subtitle' => 'حرّك الماوس وارفعه 5 مرات للحصول على تصنيف LOD متوسط',
        'section_kicker' => 'الأداة الرئيسية',
        'section_h2' => 'مقياس مسافة رفع الماوس (LOD)',
        'section_lede' => 'حرّك الماوس في منطقة التتبع وارفعه وأعد وضعه — تقيس الأداة انزياح المؤشر في كل مرة.',
        'hint' => 'التعليمات: حرّك الماوس داخل منطقة التتبع. ارفعه عن لوحة الماوس وأعد وضعه. كرر ذلك 5 مرات — ستحسب الأداة متوسط انجراف المؤشر.',
        'label_avg' => 'متوسط الانزياح (بكسل)',
        'label_lifts' => 'عدد الرفعات المسجلة',
        'label_last' => 'آخر رفعة (بكسل)',
        'track_msg' => 'حرّك الماوس في هذه المنطقة، ثم ارفعه عن اللوحة',
        'scatter_title' => 'سجل انزياحات الرفع',
        'btn_reset' => 'إعادة ضبط',
        'privacy' => 'يعمل هذا الاختبار بالكامل في متصفحك. لا يتم جمع أي بيانات أو إرسالها.',
        'lod_very_low' => 'LOD منخفض جداً',
        'lod_low' => 'LOD منخفض',
        'lod_medium' => 'LOD متوسط',
        'lod_high' => 'LOD مرتفع',
        'desc_very_low' => 'ممتاز للألعاب التنافسية. يتوقف الماوس عن التتبع فور رفعه — لا انجراف ملحوظ في التصويب.',
        'desc_low' => 'جيد لمعظم ألعاب الفيديو. الانجراف الطفيف عند الرفع من غير المرجح أن يؤثر على التصويب.',
        'desc_medium' => 'مقبول للألعاب العادية. قد يلاحظ لاعبو FPS ذوو الحساسية المنخفضة انجرافاً طفيفاً. فكر في لوحة ماوس صلبة.',
        'desc_high' => 'قد يسبب انجراف ملحوظ عند إعادة التموضع. جرّب لوحة ماوس صلبة أو قلل إعداد LOD في برنامج الماوس.',
        'trust' => ['بدون أدوات إضافية', 'تتبع الانزياح الفعلي', 'متوسط 5 رفعات', 'يعمل مع أي ماوس'],
        'trust_desc' => [
            'تحتاج فقط إلى متصفحك وماوسك',
            'يقيس الانزياح الفعلي للمؤشر بين نقطة الرفع وإعادة الدخول',
            'يحسب متوسط خمس رفعات للحصول على نتيجة موثوقة',
            'USB أو بلوتوث أو سلكي أو لاسلكي — أي جهاز تأشير',
        ],
        'h2_1' => 'ما هي مسافة رفع الماوس (LOD)؟',
        'p_1' => 'مسافة رفع الماوس (LOD) هي الارتفاع فوق السطح الذي يتوقف عنده الحساس البصري أو الليزري للماوس عن التتبع. عندما ترفع الماوس، يستمر الحساس في قراءة السطح لفترة وجيزة — خلال هذه الفترة يمكن للمؤشر الانجراف. الماوسات الحديثة ذات حساسات Pixart أو HERO عادةً ما يكون LOD منخفضاً جداً.',
        'h2_2' => 'لماذا يهم LOD في ألعاب FPS',
        'p_2' => 'في ألعاب الرماية من منظور الشخص الأول بحساسية منخفضة، يضطر اللاعبون إلى رفع الماوس وإعادة تموضعه كثيراً. حتى بضعة بكسلات من الانجراف أثناء الرفع تُترجم إلى قفزة مرئية في التصويب. يُزيل LOD المنخفض هذا المتغير تماماً.',
        'h2_3' => 'LOD مرتفع مقابل LOD منخفض — أيهما أفضل؟',
        'p_3' => 'للألعاب التنافسية بحساسية منخفضة، المنخفض دائماً أفضل. تصنيف LOD منخفض جداً (أقل من 5 بكسل) هو المعيار الذهبي. للاستخدام اليومي، لا يُحدث LOD فرقاً عملياً.',
        'h2_4' => 'كيفية تقليل LOD الماوس',
        'p_4' => 'إذا أظهر الاختبار LOD مرتفعاً أو متوسطاً، هناك عدة نهج: التحول إلى لوحة ماوس صلبة تُقدم سطحاً مستوياً يُنتج LOD أقل. استبدال أقدام الماوس بنسخ أرق من PTFE. مراجعة إعدادات LOD في برنامج Logitech G Hub أو Razer Synapse.',
        'faq_h2' => 'الأسئلة الشائعة',
        'faqs' => [
            ['q' => 'ما الذي يُعدّ LOD "جيداً"؟', 'a' => 'للألعاب التنافسية، LOD منخفض جداً (أقل من 5 بكسل) هو المثالي. للاستخدام العادي، LOD المتوسط مقبول تماماً.'],
            ['q' => 'لماذا يتفاوت LOD بين الاختبارات؟', 'a' => 'تؤثر سرعة الرفع والزاوية وملمس السطح على القراءات. الرفع السريع المستقيم ينتج انجرافاً أقل من الرفع البطيء المائل.'],
            ['q' => 'هل تؤثر مادة لوحة الماوس على LOD؟', 'a' => 'نعم — اللوحات القماشية الخشنة يمكن أن تزيد LOD الفعلي مقارنة باللوحات الصلبة.'],
            ['q' => 'هل يمكنني اختبار LOD على لوحة تتبع اللاب توب؟', 'a' => 'هذه الأداة مصممة للماوسات الخارجية ذات الحساسات البصرية. لوحات التتبع تعمل بطريقة مختلفة تماماً.'],
            ['q' => 'المؤشر بالكاد يتحرك عند الرفع — هل LOD منخفض جداً؟', 'a' => 'نعم! أقل من 5 بكسل كمتوسط انزياح يعني أن ماوسك يتمتع بـ LOD ممتاز.'],
        ],
        'table_col1' => 'متوسط الانزياح',
        'table_col2' => 'تصنيف LOD',
        'table_col3' => 'الملاءمة',
        'table_rows' => [
            ['< 5 بكسل', 'LOD منخفض جداً', 'ممتاز للألعاب التنافسية'],
            ['5 – 15 بكسل', 'LOD منخفض', 'جيد لمعظم الألعاب'],
            ['15 – 30 بكسل', 'LOD متوسط', 'مقبول — الألعاب العادية'],
            ['> 30 بكسل', 'LOD مرتفع', 'قد يسبب انجراف — راجع إعدادات الحساس'],
        ],
        'hreflang_self' => 'languages/arabic/mouse-lod-test.php',
        'is_en' => false,
    ],
    'fr' => [
        'dir' => 'french', 'html_lang' => 'fr',
        'title' => 'Test LOD Souris en Ligne — Mesurer la Distance de Décollage | KeyboardTester.click',
        'description' => 'Test de distance de levage souris (LOD) : mesure à quelle hauteur le capteur cesse de suivre la surface. Utile pour ajuster les souris gaming en FPS, sans installation.',
        'keywords' => 'test LOD souris, distance décollage souris, test capteur souris gaming, calibration LOD souris, LOD test en ligne',
        'h1' => 'Test de Distance de Décollage de Souris',
        'subtitle' => 'Déplacez, soulevez et repositionnez votre souris 5 fois pour obtenir une classification LOD moyennée',
        'section_kicker' => 'Outil principal',
        'section_h2' => 'Testeur de Distance de Décollage (LOD)',
        'section_lede' => 'Déplacez votre souris dans la zone de suivi, soulevez-la et repositionnez-la — l\'outil mesure le déplacement du curseur à chaque fois.',
        'hint' => 'Instructions : Déplacez votre souris dans la zone de suivi ci-dessous. Soulevez-la de votre tapis et reposez-la. Répétez 5 fois — l\'outil calcule le déplacement moyen du curseur.',
        'label_avg' => 'Déplacement Moyen (px)',
        'label_lifts' => 'Soulevements Enregistrés',
        'label_last' => 'Dernier Soulèvement (px)',
        'track_msg' => 'Déplacez votre souris dans cette zone, puis soulevez-la du tapis',
        'scatter_title' => 'Historique des déplacements',
        'btn_reset' => 'Réinitialiser',
        'privacy' => 'Ce test s\'exécute entièrement dans votre navigateur. Aucune donnée n\'est collectée ou transmise.',
        'lod_very_low' => 'LOD Très Faible',
        'lod_low' => 'LOD Faible',
        'lod_medium' => 'LOD Moyen',
        'lod_high' => 'LOD Élevé',
        'desc_very_low' => 'Excellent pour le jeu FPS compétitif. Votre souris cesse de tracer presque immédiatement au soulèvement — aucune dérive de visée mesurable.',
        'desc_low' => 'Bon pour la plupart des jeux. La légère dérive au soulèvement n\'affectera pas votre visée à des sensibilités normales.',
        'desc_medium' => 'Acceptable pour le jeu casual. Les joueurs FPS à faible sensibilité peuvent remarquer une légère dérive. Envisagez un tapis dur.',
        'desc_high' => 'Peut causer une dérive notable lors du repositionnement. Essayez un tapis dur, des pieds plus minces ou réduisez le réglage LOD dans votre logiciel.',
        'trust' => ['Sans Équipement', 'Suivi Réel', 'Moyenne de 5 Soulevements', 'Toute Souris'],
        'trust_desc' => [
            'Seulement votre navigateur et votre souris',
            'Mesure le décalage réel du curseur entre soulèvement et reposition',
            'Moyenne de cinq soulevements pour un résultat fiable',
            'USB, Bluetooth, filaire ou sans fil',
        ],
        'h2_1' => 'Qu\'est-ce que la Distance de Décollage de Souris (LOD) ?',
        'p_1' => 'La distance de décollage (LOD) est la hauteur au-dessus d\'une surface à laquelle le capteur optique ou laser de la souris cesse de tracer. Lorsque vous soulevez physiquement la souris, le capteur continue à lire la surface brièvement — pendant cette fenêtre le curseur peut dériver. Les souris gaming modernes avec capteurs Pixart PAW3395 ou HERO ont tendance à avoir un LOD très faible.',
        'h2_2' => 'Pourquoi le LOD est Important pour les Joueurs FPS',
        'p_2' => 'Dans les jeux de tir à la première personne joués à faible sensibilité, les joueurs doivent fréquemment soulever et repositionner la souris. À faible sensibilité, même quelques pixels de dérive du curseur se traduisent par un saut visible de la visée. Un LOD faible élimine complètement cette variable.',
        'h2_3' => 'LOD Élevé vs LOD Faible — Lequel est Mieux ?',
        'p_3' => 'Pour le jeu FPS compétitif à faible sensibilité, plus bas est toujours mieux. Une note LOD Très Faible (moins de 5px) est le standard or. Pour le jeu casual, le LOD ne fait aucune différence pratique.',
        'h2_4' => 'Comment Réduire le LOD de votre Souris',
        'p_4' => 'Si ce test montre un LOD Élevé ou Moyen, il existe plusieurs approches. Passez à un tapis dur : les tapis durs présentent une surface parfaitement plane qui tend à donner un LOD plus faible. Remplacez les patins de souris par des patins PTFE aftermarket plus minces. Vérifiez les paramètres LOD dans Logitech G Hub, Razer Synapse ou SteelSeries GG.',
        'faq_h2' => 'Questions Fréquentes',
        'faqs' => [
            ['q' => 'Qu\'est-ce qui compte comme un "bon" LOD ?', 'a' => 'Pour le jeu FPS compétitif, un LOD très faible (moins de 5px) est idéal. Pour un usage casual, un LOD moyen est parfaitement bien.'],
            ['q' => 'Pourquoi mon LOD varie-t-il entre les tests ?', 'a' => 'La vitesse de soulèvement, l\'angle et la texture de surface affectent tous les lectures. Un soulèvement rapide et droit produit moins de dérive.'],
            ['q' => 'Le matériau du tapis affecte-t-il le LOD ?', 'a' => 'Oui — les tapis en tissu rugueux peuvent augmenter le LOD effectif par rapport aux tapis durs.'],
            ['q' => 'Puis-je tester le LOD sur un trackpad de laptop ?', 'a' => 'Cet outil est conçu pour les souris externes. Les trackpads détectent la présence du doigt par capacitance, pas par réflexion optique.'],
            ['q' => 'Mon curseur bouge à peine au soulèvement — mon LOD est-il très faible ?', 'a' => 'Oui ! Moins de 5px de déplacement moyen signifie que votre souris a un excellent LOD faible.'],
        ],
        'table_col1' => 'Déplacement Moyen',
        'table_col2' => 'Note LOD',
        'table_col3' => 'Convient pour',
        'table_rows' => [
            ['< 5 px', 'LOD Très Faible', 'Excellent pour FPS compétitif'],
            ['5 – 15 px', 'LOD Faible', 'Bon pour la plupart des jeux'],
            ['15 – 30 px', 'LOD Moyen', 'Acceptable — jeu casual'],
            ['> 30 px', 'LOD Élevé', 'Peut causer dérive — vérifiez les réglages'],
        ],
        'hreflang_self' => 'languages/french/mouse-lod-test.php',
        'is_en' => false,
    ],
    'de' => [
        'dir' => 'german', 'html_lang' => 'de',
        'title' => 'Maus LOD Test Online — Lift-Off-Distanz Messen | KeyboardTester.click',
        'description' => 'Maus-Lift-Off-Distance-Test (LOD): Misst, bei welcher Höhe der Sensor die Oberfläche nicht mehr erfasst. Nützlich zum Feintuning von Gaming-Mäusen in FPS-Spielen, im Browser.',
        'keywords' => 'Maus LOD Test, Lift Off Distanz Maus, Gaming Maus LOD prüfen, Maussensor Kalibrierung, LOD Test online',
        'h1' => 'Maus Lift-Off-Distanz Test',
        'subtitle' => 'Bewegen, heben und repositionieren Sie Ihre Maus 5 Mal für eine gemittelte LOD-Klassifizierung',
        'section_kicker' => 'Hauptwerkzeug',
        'section_h2' => 'Maus Lift-Off-Distanz (LOD) Tester',
        'section_lede' => 'Bewegen Sie die Maus im Tracking-Bereich, heben Sie sie an und repositionieren Sie — das Tool misst die Cursorbewegung jedes Mal.',
        'hint' => 'Anleitung: Bewegen Sie die Maus im Tracking-Bereich. Heben Sie sie vom Mauspad ab und setzen Sie sie wieder ab. Wiederholen Sie 5 Mal — das Tool berechnet die durchschnittliche Cursordrift.',
        'label_avg' => 'Ø Versatz (px)',
        'label_lifts' => 'Abhebungen',
        'label_last' => 'Letzte Abhebung (px)',
        'track_msg' => 'Bewegen Sie die Maus in diesem Bereich, dann heben Sie sie vom Pad ab',
        'scatter_title' => 'Versatz-Verlauf',
        'btn_reset' => 'Zurücksetzen',
        'privacy' => 'Dieser Test läuft vollständig in Ihrem Browser. Es werden keine Daten gesammelt.',
        'lod_very_low' => 'Sehr Niedriger LOD',
        'lod_low' => 'Niedriger LOD',
        'lod_medium' => 'Mittlerer LOD',
        'lod_high' => 'Hoher LOD',
        'desc_very_low' => 'Ausgezeichnet für kompetitives FPS-Gaming. Ihre Maus hört fast sofort beim Abheben auf zu tracken — kein messbarer Zielfehler.',
        'desc_low' => 'Gut für die meisten Spiele. Leichte Cursordrift beim Abheben beeinträchtigt kaum die Zielgenauigkeit.',
        'desc_medium' => 'Akzeptabel für Casual Gaming. FPS-Spieler mit niedriger Empfindlichkeit bemerken evtl. leichte Drift. Hartes Mauspad erwägen.',
        'desc_high' => 'Kann merkliche Cursordrift beim Repositionieren verursachen. Versuchen Sie ein hartes Mauspad oder reduzieren Sie die LOD-Einstellung.',
        'trust' => ['Kein Zubehör', 'Echter Versatz', 'Ø aus 5 Abhebungen', 'Jede Maus'],
        'trust_desc' => [
            'Nur Browser und Maus benötigt',
            'Misst tatsächlichen Cursorversatz zwischen Abheben und Wiederaufsetzen',
            'Mittelt fünf Abhebungen für ein zuverlässiges Ergebnis',
            'USB, Bluetooth, kabelgebunden oder kabellos',
        ],
        'h2_1' => 'Was ist die Maus Lift-Off-Distanz (LOD)?',
        'p_1' => 'Die Lift-Off-Distanz (LOD) ist die Höhe über einer Oberfläche, bei der der optische oder Laser-Sensor der Maus aufhört zu tracken. Moderne Gaming-Mäuse mit Pixart PAW3395 oder HERO Sensoren haben standardmäßig sehr niedrige LOD-Werte.',
        'h2_2' => 'Warum LOD für FPS-Spieler wichtig ist',
        'p_2' => 'In Ego-Shootern mit niedriger Empfindlichkeit müssen Spieler die Maus häufig abheben und repositionieren. Bei niedriger Empfindlichkeit führt selbst eine geringe Cursordrift zu einem sichtbaren Zielsprung. Niedriger LOD eliminiert diese Variable vollständig.',
        'h2_3' => 'Hoher LOD vs Niedriger LOD — Was ist besser?',
        'p_3' => 'Für kompetitives FPS-Gaming gilt: je niedriger, desto besser. Ein Sehr Niedriger LOD (unter 5px) ist der Goldstandard. Für Casual Gaming macht LOD keinen praktischen Unterschied.',
        'h2_4' => 'Wie man den LOD der Maus reduziert',
        'p_4' => 'Wechseln Sie zu einem harten Mauspad für eine flachere Oberfläche. Ersetzen Sie die Mausfüße durch dünnere PTFE-Nachmarktfüße. Prüfen Sie LOD-Einstellungen in Logitech G Hub, Razer Synapse oder SteelSeries GG.',
        'faq_h2' => 'Häufige Fragen',
        'faqs' => [
            ['q' => 'Was gilt als "guter" LOD?', 'a' => 'Für kompetitives FPS-Gaming ist sehr niedriger LOD (weniger als 5px) ideal. Für Casual Use ist mittlerer LOD vollkommen in Ordnung.'],
            ['q' => 'Warum variiert mein LOD zwischen Tests?', 'a' => 'Abhebegeschwindigkeit, Winkel und Oberflächenbeschaffenheit beeinflussen die Messwerte. Ein schnelles, gerades Abheben erzeugt weniger Drift.'],
            ['q' => 'Beeinflusst das Mauspad-Material den LOD?', 'a' => 'Ja — raue Stoffmauspads können den effektiven LOD gegenüber harten Pads erhöhen.'],
            ['q' => 'Kann ich LOD auf einem Laptop-Trackpad testen?', 'a' => 'Dieses Tool ist für externe Mäuse konzipiert. Trackpads erkennen Fingerpräsenz kapazitiv, nicht optisch.'],
            ['q' => 'Mein Cursor bewegt sich beim Abheben kaum — ist mein LOD sehr niedrig?', 'a' => 'Ja! Weniger als 5px durchschnittlicher Versatz bedeutet exzellenten niedrigen LOD.'],
        ],
        'table_col1' => 'Ø Versatz',
        'table_col2' => 'LOD-Bewertung',
        'table_col3' => 'Geeignet für',
        'table_rows' => [
            ['< 5 px', 'Sehr Niedriger LOD', 'Ausgezeichnet für kompetitives FPS'],
            ['5 – 15 px', 'Niedriger LOD', 'Gut für die meisten Spiele'],
            ['15 – 30 px', 'Mittlerer LOD', 'Akzeptabel — Casual Gaming'],
            ['> 30 px', 'Hoher LOD', 'Kann Drift verursachen — Einstellungen prüfen'],
        ],
        'hreflang_self' => 'languages/german/mouse-lod-test.php',
        'is_en' => false,
    ],
    'ja' => [
        'dir' => 'japanese', 'html_lang' => 'ja',
        'title' => 'マウスLODテスト — リフトオフディスタンス測定オンライン | KeyboardTester.click',
        'description' => 'ゲーミングマウスのリフトオフディスタンス（LOD）をオンラインで無料テスト。マウスを動かして持ち上げ再配置し、カーソル変位を計測。ソフト不要。',
        'keywords' => 'マウスLODテスト, リフトオフディスタンス, ゲーミングマウスLOD, マウスセンサー確認, LODテストオンライン',
        'h1' => 'マウスリフトオフディスタンステスト',
        'subtitle' => 'マウスを動かして5回持ち上げて再配置し、平均LOD分類を取得',
        'section_kicker' => 'メインツール',
        'section_h2' => 'マウスリフトオフディスタンス（LOD）テスター',
        'section_lede' => 'トラッキングエリアでマウスを動かし、持ち上げて再配置 — ツールが毎回カーソル変位を計測します。',
        'hint' => '手順：下のトラッキングエリアでマウスを動かしてください。マウスパッドから持ち上げて戻す。これを5回繰り返すと平均カーソルドリフトが計算されます。',
        'label_avg' => '平均変位 (px)',
        'label_lifts' => '記録したリフト数',
        'label_last' => '最後のリフト (px)',
        'track_msg' => 'このエリアでマウスを動かしてから、マウスパッドから持ち上げてください',
        'scatter_title' => 'リフト変位履歴',
        'btn_reset' => 'リセット',
        'privacy' => 'このテストはブラウザ内で完全に実行されます。データの収集や送信は一切行いません。',
        'lod_very_low' => 'LOD 非常に低い',
        'lod_low' => 'LOD 低い',
        'lod_medium' => 'LOD 中程度',
        'lod_high' => 'LOD 高い',
        'desc_very_low' => '競技FPSに最適。マウスはリフト直後にトラッキングを停止 — エイムのドリフトはほぼゼロ。',
        'desc_low' => 'ほとんどのゲームに適しています。リフト時のわずかなドリフトは通常の感度ではエイムにほぼ影響しません。',
        'desc_medium' => 'カジュアルゲームには問題なし。低感度FPSプレイヤーはわずかなドリフトを感じることがあります。ハードパッドを検討してください。',
        'desc_high' => '再配置時に顕著なカーソルドリフトが生じる可能性があります。ハードパッドや薄いマウスフィートを試すか、ソフトウェアでLOD設定を下げてください。',
        'trust' => ['追加機材不要', '実際の変位計測', '5回リフトの平均', 'あらゆるマウス対応'],
        'trust_desc' => [
            'ブラウザとマウスだけでOK',
            'リフトポイントと再配置ポイント間の実際のカーソルオフセットを計測',
            '5回のリフトを平均して信頼性の高い結果を算出',
            'USB・Bluetooth・有線・無線 — あらゆるポインティングデバイスに対応',
        ],
        'h2_1' => 'マウスリフトオフディスタンス（LOD）とは？',
        'p_1' => 'リフトオフディスタンス（LOD）は、マウスの光学またはレーザーセンサーがトラッキングを停止するまでの表面からの高さです。マウスを持ち上げると、センサーは少しの間表面を読み続け、その間カーソルがドリフトする可能性があります。Pixart PAW3395やHEROセンサーを搭載した現代のゲーミングマウスは標準で非常に低いLODを持ちます。',
        'h2_2' => 'LODがFPSゲーマーに重要な理由',
        'p_2' => '低感度で遊ぶFPSでは、プレイヤーは頻繁にマウスを持ち上げて再配置する必要があります。低感度では、リフト時のわずかなピクセルのドリフトが目に見えるエイムのジャンプに変換されます。低いLODはこの変数を完全に排除します。',
        'h2_3' => '高LOD vs 低LOD — どちらが良い？',
        'p_3' => '低感度での競技FPSには、低ければ低いほど良い。LOD非常に低い（5px未満）が金本位標準です。カジュアルゲームや日常的な使用では、LODは実際の差をもたらしません。',
        'h2_4' => 'マウスのLODを下げる方法',
        'p_4' => 'ハードマウスパッドに切り替えると低LODを得やすくなります。アフターマーケットのPTFEフィートに交換するとLODが若干下がることがあります。Logitech G Hub、Razer Synapse、SteelSeries GGでLOD設定を確認してください。',
        'faq_h2' => 'よくある質問',
        'faqs' => [
            ['q' => '「良い」LODとは？', 'a' => '競技FPSには非常に低いLOD（5px未満）が理想的。カジュアルには中程度でも問題ありません。'],
            ['q' => 'なぜテスト間でLODが変わるの？', 'a' => 'リフトの速度、角度、表面の質感がすべて影響します。速く真っ直ぐ持ち上げると遅くて斜めのものより少ないドリフトが生じます。'],
            ['q' => 'マウスパッドの素材はLODに影響する？', 'a' => 'はい — 粗い布製パッドはハードパッドと比べてLODを増やす可能性があります。'],
            ['q' => 'ラップトップのトラックパッドでLODをテストできる？', 'a' => 'このツールは光学またはレーザーセンサーを持つ外付けマウス用です。'],
            ['q' => '持ち上げてもカーソルがほとんど動かない — LODが非常に低いということ？', 'a' => 'はい！平均変位5px未満はマウスに優れた低LODがあることを意味します。'],
        ],
        'table_col1' => '平均変位',
        'table_col2' => 'LOD評価',
        'table_col3' => '適合用途',
        'table_rows' => [
            ['< 5 px', 'LOD 非常に低い', '競技FPSに最適'],
            ['5 – 15 px', 'LOD 低い', 'ほとんどのゲームに適合'],
            ['15 – 30 px', 'LOD 中程度', 'カジュアルゲームに問題なし'],
            ['> 30 px', 'LOD 高い', 'ドリフトの可能性あり — 設定確認'],
        ],
        'hreflang_self' => 'languages/japanese/mouse-lod-test.php',
        'is_en' => false,
    ],
    'ko' => [
        'dir' => 'korean', 'html_lang' => 'ko',
        'title' => '마우스 LOD 테스트 온라인 — 리프트오프 디스턴스 측정 | KeyboardTester.click',
        'description' => '게이밍 마우스의 리프트오프 디스턴스(LOD)를 온라인으로 무료 테스트하세요. 마우스를 움직이고 들어 재배치하여 커서 변위를 측정합니다. 소프트웨어 불필요.',
        'keywords' => '마우스 LOD 테스트, 리프트오프 디스턴스, 게이밍 마우스 LOD, 마우스 센서 확인, LOD 테스트 온라인',
        'h1' => '마우스 리프트오프 디스턴스 테스트',
        'subtitle' => '마우스를 5번 들어 재배치하여 평균 LOD 분류를 얻으세요',
        'section_kicker' => '기본 도구',
        'section_h2' => '마우스 리프트오프 디스턴스(LOD) 테스터',
        'section_lede' => '추적 영역에서 마우스를 움직이고 들어 재배치하세요 — 도구가 매번 커서 변위를 측정합니다.',
        'hint' => '사용법: 아래 추적 영역에서 마우스를 움직이세요. 마우스 패드에서 들어 다시 내려놓으세요. 5번 반복하면 평균 커서 드리프트를 계산합니다.',
        'label_avg' => '평균 변위 (px)',
        'label_lifts' => '기록된 리프트 수',
        'label_last' => '마지막 리프트 (px)',
        'track_msg' => '이 영역에서 마우스를 움직인 후 마우스 패드에서 들어올리세요',
        'scatter_title' => '리프트 변위 기록',
        'btn_reset' => '초기화',
        'privacy' => '이 테스트는 브라우저에서 완전히 실행됩니다. 데이터는 수집되거나 전송되지 않습니다.',
        'lod_very_low' => 'LOD 매우 낮음',
        'lod_low' => 'LOD 낮음',
        'lod_medium' => 'LOD 보통',
        'lod_high' => 'LOD 높음',
        'desc_very_low' => '경쟁 FPS 게임에 탁월합니다. 마우스가 들릴 때 거의 즉시 추적을 중단 — 재배치 시 에임 드리프트 없음.',
        'desc_low' => '대부분의 게임에 적합합니다. 들 때의 약간의 드리프트는 일반 감도에서 에임에 거의 영향을 주지 않습니다.',
        'desc_medium' => '캐주얼 게임에 허용 가능합니다. 낮은 감도 FPS 플레이어는 약간의 드리프트를 느낄 수 있습니다. 하드 패드를 고려하세요.',
        'desc_high' => '재배치 시 눈에 띄는 커서 드리프트가 발생할 수 있습니다. 하드 패드나 더 얇은 마우스 피트를 시도하거나 LOD 설정을 낮추세요.',
        'trust' => ['추가 장비 불필요', '실제 변위 추적', '5회 리프트 평균', '모든 마우스 호환'],
        'trust_desc' => [
            '브라우저와 마우스만 있으면 됩니다',
            '들어올린 지점과 재진입 지점 사이의 실제 커서 오프셋 측정',
            '5번의 리프트를 평균하여 신뢰할 수 있는 결과 산출',
            'USB, 블루투스, 유선 또는 무선 — 모든 포인팅 장치',
        ],
        'h2_1' => '마우스 리프트오프 디스턴스(LOD)란?',
        'p_1' => '리프트오프 디스턴스(LOD)는 마우스의 광학 또는 레이저 센서가 추적을 중단하는 표면으로부터의 높이입니다. 마우스를 들어올리면 센서는 잠시 동안 표면을 계속 읽으며 — 이 짧은 시간에 커서가 드리프트할 수 있습니다. Pixart PAW3395나 HERO 센서를 탑재한 최신 게이밍 마우스는 기본적으로 매우 낮은 LOD를 가집니다.',
        'h2_2' => 'LOD가 FPS 게이머에게 중요한 이유',
        'p_2' => '낮은 감도로 플레이하는 FPS에서 플레이어는 자주 마우스를 들어 재배치해야 합니다. 낮은 감도에서는 들 때 몇 픽셀의 드리프트도 눈에 띄는 에임 점프로 변환됩니다. 낮은 LOD는 이 변수를 완전히 제거합니다.',
        'h2_3' => '높은 LOD vs 낮은 LOD — 어느 것이 더 좋나요?',
        'p_3' => '낮은 감도의 경쟁 FPS에서는 낮을수록 항상 좋습니다. LOD 매우 낮음(5px 미만)이 황금 표준입니다. 캐주얼 게임이나 일상적인 데스크톱 사용에서는 LOD가 실질적인 차이를 만들지 않습니다.',
        'h2_4' => '마우스의 LOD를 줄이는 방법',
        'p_4' => '하드 마우스 패드로 전환하세요 — 딱딱한 패드는 평평한 표면을 제공하여 낮은 LOD를 산출하는 경향이 있습니다. 더 얇은 PTFE 애프터마켓 피트로 교체하세요. Logitech G Hub, Razer Synapse 또는 SteelSeries GG에서 LOD 설정을 확인하세요.',
        'faq_h2' => '자주 묻는 질문',
        'faqs' => [
            ['q' => '좋은 LOD란 무엇인가요?', 'a' => '경쟁 FPS에는 매우 낮은 LOD(5px 미만)가 이상적입니다. 캐주얼 사용에는 중간 LOD도 완벽하게 괜찮습니다.'],
            ['q' => '왜 테스트 간에 LOD가 변하나요?', 'a' => '들어올리는 속도, 각도, 표면 질감이 모두 영향을 미칩니다. 빠르고 직선적인 리프트는 느리고 기울어진 것보다 드리프트가 적습니다.'],
            ['q' => '마우스 패드 재질이 LOD에 영향을 미치나요?', 'a' => '예 — 거친 천 패드는 하드 패드에 비해 LOD를 증가시킬 수 있습니다.'],
            ['q' => '노트북 트랙패드에서 LOD를 테스트할 수 있나요?', 'a' => '이 도구는 광학 또는 레이저 센서가 있는 외부 마우스용으로 설계되었습니다.'],
            ['q' => '들어올릴 때 커서가 거의 움직이지 않아요 — LOD가 매우 낮은 건가요?', 'a' => '네! 평균 변위 5px 미만은 마우스에 훌륭한 낮은 LOD가 있음을 의미합니다.'],
        ],
        'table_col1' => '평균 변위',
        'table_col2' => 'LOD 등급',
        'table_col3' => '적합 용도',
        'table_rows' => [
            ['< 5 px', 'LOD 매우 낮음', '경쟁 FPS에 탁월'],
            ['5 – 15 px', 'LOD 낮음', '대부분의 게임에 적합'],
            ['15 – 30 px', 'LOD 보통', '캐주얼 게임 허용'],
            ['> 30 px', 'LOD 높음', '드리프트 가능성 — 설정 확인'],
        ],
        'hreflang_self' => 'languages/korean/mouse-lod-test.php',
        'is_en' => false,
    ],
    'pt' => [
        'dir' => 'portuguese', 'html_lang' => 'pt',
        'title' => 'Teste LOD do Mouse Online — Medir Distância de Levantamento | KeyboardTester.click',
        'description' => 'Teste de distância de levantamento do mouse (LOD): mede em que altura o sensor para de rastrear a superfície. Útil para ajustar mouses gamer em FPS, sem instalação.',
        'keywords' => 'teste LOD mouse, distância levantamento mouse, teste sensor mouse gaming, calibração LOD mouse, LOD test online',
        'h1' => 'Teste de Distância de Levantamento do Mouse',
        'subtitle' => 'Mova, levante e reposicione seu mouse 5 vezes para obter uma classificação LOD média',
        'section_kicker' => 'Ferramenta principal',
        'section_h2' => 'Testador de Distância de Levantamento (LOD)',
        'section_lede' => 'Mova o mouse na área de rastreamento, levante e reposicione — a ferramenta mede o deslocamento do cursor a cada vez.',
        'hint' => 'Instruções: Mova o mouse dentro da área de rastreamento. Levante-o do mousepad e coloque-o de volta. Repita 5 vezes — a ferramenta calcula o deslocamento médio do cursor.',
        'label_avg' => 'Deslocamento Médio (px)',
        'label_lifts' => 'Levantamentos Registrados',
        'label_last' => 'Último Levantamento (px)',
        'track_msg' => 'Mova o mouse nesta área e depois levante do mousepad',
        'scatter_title' => 'Histórico de deslocamentos',
        'btn_reset' => 'Redefinir',
        'privacy' => 'Este teste é executado inteiramente no seu navegador. Nenhum dado é coletado ou transmitido.',
        'lod_very_low' => 'LOD Muito Baixo',
        'lod_low' => 'LOD Baixo',
        'lod_medium' => 'LOD Médio',
        'lod_high' => 'LOD Alto',
        'desc_very_low' => 'Excelente para FPS competitivo. Seu mouse para de rastrear quase imediatamente ao levantar — sem desvio de mira mensurável.',
        'desc_low' => 'Bom para a maioria dos jogos. O leve desvio ao levantar dificilmente afetará sua mira em sensibilidades normais.',
        'desc_medium' => 'Aceitável para jogo casual. Jogadores de FPS com baixa sensibilidade podem notar um leve desvio. Considere um mousepad duro.',
        'desc_high' => 'Pode causar desvio notável durante o reposicionamento. Tente um mousepad duro, pés mais finos ou reduza a configuração LOD no software.',
        'trust' => ['Sem Equipamento', 'Rastreamento Real', 'Média de 5 Levantamentos', 'Qualquer Mouse'],
        'trust_desc' => [
            'Apenas seu navegador e mouse',
            'Mede o deslocamento real do cursor entre levantamento e reentrada',
            'Média de cinco levantamentos para resultado confiável',
            'USB, Bluetooth, com fio ou sem fio',
        ],
        'h2_1' => 'O que é Distância de Levantamento do Mouse (LOD)?',
        'p_1' => 'A distância de levantamento (LOD) é a altura acima de uma superfície na qual o sensor óptico ou laser do mouse para de rastrear. Ao levantar o mouse, o sensor continua lendo a superfície brevemente — durante essa janela o cursor pode derivar. Mouses gaming modernos com sensores Pixart PAW3395 ou HERO tendem a ter LOD muito baixo.',
        'h2_2' => 'Por que o LOD Importa para Jogadores de FPS',
        'p_2' => 'Em jogos de tiro em primeira pessoa com baixa sensibilidade, os jogadores devem levantar e reposicionar o mouse com frequência. Com baixa sensibilidade, mesmo alguns pixels de desvio durante um levantamento se traduzem em um salto de mira visível. LOD baixo elimina esta variável completamente.',
        'h2_3' => 'LOD Alto vs LOD Baixo — Qual é Melhor?',
        'p_3' => 'Para FPS competitivo com baixa sensibilidade, menor é sempre melhor. Uma classificação LOD Muito Baixo (menos de 5px) é o padrão ouro. Para jogo casual, o LOD não faz diferença prática.',
        'h2_4' => 'Como Reduzir o LOD do seu Mouse',
        'p_4' => 'Mude para um mousepad duro. Substitua os pés do mouse por pés de PTFE aftermarket mais finos. Verifique as configurações LOD no Logitech G Hub, Razer Synapse ou SteelSeries GG.',
        'faq_h2' => 'Perguntas Frequentes',
        'faqs' => [
            ['q' => 'O que conta como um LOD "bom"?', 'a' => 'Para FPS competitivo, LOD muito baixo (menos de 5px) é ideal. Para uso casual, LOD médio é perfeitamente adequado.'],
            ['q' => 'Por que meu LOD varia entre testes?', 'a' => 'Velocidade de levantamento, ângulo e textura da superfície afetam as leituras. Um levantamento rápido e reto produz menos desvio.'],
            ['q' => 'O material do mousepad afeta o LOD?', 'a' => 'Sim — pads de tecido rugoso podem aumentar o LOD efetivo em comparação com pads duros.'],
            ['q' => 'Posso testar LOD em um trackpad de laptop?', 'a' => 'Esta ferramenta é projetada para mouses externos com sensores ópticos ou laser. Trackpads detectam presença do dedo por capacitância.'],
            ['q' => 'O cursor mal se move ao levantar — meu LOD é muito baixo?', 'a' => 'Sim! Menos de 5px de deslocamento médio significa que seu mouse tem excelente LOD baixo.'],
        ],
        'table_col1' => 'Deslocamento Médio',
        'table_col2' => 'Classificação LOD',
        'table_col3' => 'Adequado para',
        'table_rows' => [
            ['< 5 px', 'LOD Muito Baixo', 'Excelente para FPS competitivo'],
            ['5 – 15 px', 'LOD Baixo', 'Bom para a maioria dos jogos'],
            ['15 – 30 px', 'LOD Médio', 'Aceitável — jogo casual'],
            ['> 30 px', 'LOD Alto', 'Pode causar desvio — verificar configurações'],
        ],
        'hreflang_self' => 'languages/portuguese/mouse-lod-test.php',
        'is_en' => false,
    ],
    'ru' => [
        'dir' => 'russian', 'html_lang' => 'ru',
        'title' => 'Тест LOD Мыши Онлайн — Измерить Дистанцию Отрыва | KeyboardTester.click',
        'description' => 'Тест Lift-Off Distance мыши (LOD): измеряет высоту, на которой сенсор перестаёт отслеживать поверхность. Полезно для настройки игровых мышей в FPS, без установки.',
        'keywords' => 'тест LOD мыши, дистанция отрыва мыши, проверка сенсора мыши, калибровка LOD мыши, LOD тест онлайн',
        'h1' => 'Тест Дистанции Отрыва Мыши (LOD)',
        'subtitle' => 'Двигайте, поднимайте и перемещайте мышь 5 раз для усреднённой классификации LOD',
        'section_kicker' => 'Основной инструмент',
        'section_h2' => 'Тестер Дистанции Отрыва (LOD)',
        'section_lede' => 'Двигайте мышь в области отслеживания, поднимайте и перемещайте — инструмент каждый раз измеряет смещение курсора.',
        'hint' => 'Инструкция: Двигайте мышь внутри области отслеживания. Поднимите её с коврика и положите обратно. Повторите 5 раз — инструмент вычислит среднее смещение курсора.',
        'label_avg' => 'Среднее смещение (пкс)',
        'label_lifts' => 'Зафиксировано подъёмов',
        'label_last' => 'Последний подъём (пкс)',
        'track_msg' => 'Двигайте мышь в этой области, затем поднимите её с коврика',
        'scatter_title' => 'История смещений',
        'btn_reset' => 'Сбросить',
        'privacy' => 'Тест работает полностью в вашем браузере. Данные не собираются и не передаются.',
        'lod_very_low' => 'Очень низкий LOD',
        'lod_low' => 'Низкий LOD',
        'lod_medium' => 'Средний LOD',
        'lod_high' => 'Высокий LOD',
        'desc_very_low' => 'Отлично для соревновательного FPS. Мышь почти сразу прекращает отслеживание при подъёме — дрейф прицела при перемещении минимален.',
        'desc_low' => 'Хорошо для большинства игр. Незначительный дрейф при подъёме вряд ли скажется на прицеливании при обычной чувствительности.',
        'desc_medium' => 'Приемлемо для казуальных игр. FPS-игроки с низкой чувствительностью могут замечать лёгкий дрейф. Рассмотрите жёсткий коврик.',
        'desc_high' => 'Может вызывать заметный дрейф при перемещении. Попробуйте жёсткий коврик, тонкие тефлоновые ножки или снизьте настройку LOD в ПО мыши.',
        'trust' => ['Без оборудования', 'Реальное смещение', 'Среднее из 5 подъёмов', 'Любая мышь'],
        'trust_desc' => [
            'Только браузер и мышь',
            'Измеряет реальное смещение курсора между подъёмом и возвратом',
            'Усредняет пять подъёмов для надёжного результата',
            'USB, Bluetooth, проводная или беспроводная',
        ],
        'h2_1' => 'Что такое дистанция отрыва мыши (LOD)?',
        'p_1' => 'Дистанция отрыва (LOD) — это высота над поверхностью, при которой оптический или лазерный сенсор мыши прекращает отслеживание. При поднятии мыши сенсор продолжает читать поверхность несколько мгновений — в это время курсор может смещаться. Современные игровые мыши с сенсорами Pixart PAW3395 или HERO имеют очень низкий LOD по умолчанию.',
        'h2_2' => 'Почему LOD важен для FPS-игроков',
        'p_2' => 'В шутерах от первого лица с низкой чувствительностью игроки часто поднимают и перемещают мышь. При низкой чувствительности даже несколько пикселей смещения курсора при подъёме превращаются в заметный скачок прицела. Низкий LOD полностью устраняет эту переменную.',
        'h2_3' => 'Высокий LOD vs низкий LOD — что лучше?',
        'p_3' => 'Для соревновательного FPS с низкой чувствительностью — чем ниже, тем лучше. Очень низкий LOD (менее 5px) — золотой стандарт. Для казуальных игр LOD не имеет практического значения.',
        'h2_4' => 'Как снизить LOD вашей мыши',
        'p_4' => 'Перейдите на жёсткий коврик — он даёт ровную поверхность с более низким LOD. Замените ножки мыши на тонкие тефлоновые. Проверьте настройку LOD в Logitech G Hub, Razer Synapse или SteelSeries GG.',
        'faq_h2' => 'Часто задаваемые вопросы',
        'faqs' => [
            ['q' => 'Что считается "хорошим" LOD?', 'a' => 'Для соревновательного FPS очень низкий LOD (менее 5px) идеален. Для казуального использования средний LOD совершенно нормален.'],
            ['q' => 'Почему мой LOD варьируется между тестами?', 'a' => 'Скорость подъёма, угол и текстура поверхности влияют на показания. Быстрый прямой подъём даёт меньше дрейфа.'],
            ['q' => 'Влияет ли материал коврика на LOD?', 'a' => 'Да — грубые тканевые коврики могут увеличивать LOD по сравнению с жёсткими.'],
            ['q' => 'Можно ли тестировать LOD на трекпаде ноутбука?', 'a' => 'Инструмент предназначен для внешних мышей с оптическими или лазерными сенсорами.'],
            ['q' => 'Курсор почти не двигается при подъёме — мой LOD очень низкий?', 'a' => 'Да! Среднее смещение менее 5px означает отличный низкий LOD.'],
        ],
        'table_col1' => 'Среднее смещение',
        'table_col2' => 'Рейтинг LOD',
        'table_col3' => 'Подходит для',
        'table_rows' => [
            ['< 5 пкс', 'Очень низкий LOD', 'Отлично для соревновательного FPS'],
            ['5 – 15 пкс', 'Низкий LOD', 'Хорошо для большинства игр'],
            ['15 – 30 пкс', 'Средний LOD', 'Приемлемо — казуальные игры'],
            ['> 30 пкс', 'Высокий LOD', 'Возможен дрейф — проверьте настройки'],
        ],
        'hreflang_self' => 'languages/russian/mouse-lod-test.php',
        'is_en' => false,
    ],
];

$d     = $langData[$lang] ?? $langData['en'];
$isRtl = ($lang === 'ar');

$allLangs = [
    'en' => 'mouse-lod-test.php',
    'es' => 'languages/spanish/mouse-lod-test.php',
    'ar' => 'languages/arabic/mouse-lod-test.php',
    'fr' => 'languages/french/mouse-lod-test.php',
    'de' => 'languages/german/mouse-lod-test.php',
    'ja' => 'languages/japanese/mouse-lod-test.php',
    'ko' => 'languages/korean/mouse-lod-test.php',
    'pt' => 'languages/portuguese/mouse-lod-test.php',
    'ru' => 'languages/russian/mouse-lod-test.php',
];

// JS strings
$jsTrackMsg    = json_encode($d['track_msg']);
$jsLodVeryLow  = json_encode($d['lod_very_low']);
$jsLodLow      = json_encode($d['lod_low']);
$jsLodMedium   = json_encode($d['lod_medium']);
$jsLodHigh     = json_encode($d['lod_high']);
$jsDescVeryLow = json_encode($d['desc_very_low']);
$jsDescLow     = json_encode($d['desc_low']);
$jsDescMedium  = json_encode($d['desc_medium']);
$jsDescHigh    = json_encode($d['desc_high']);
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
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('mouse-lod-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"WebApplication","name":<?php echo json_encode($d['h1']); ?>,"url":"<?php echo absoluteUrl($d['hreflang_self']); ?>","description":<?php echo json_encode($d['description']); ?>,"applicationCategory":"UtilityApplication","operatingSystem":"Any","isAccessibleForFree":true,"featureList":["Real cursor displacement tracking","5-lift averaged LOD measurement","Linear/Low/Medium/High LOD classification","Scatter plot of lift events","Works with any mouse"]}
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
    .lod-tool{max-width:760px;margin:0 auto;padding:2rem 1.5rem 2.5rem;text-align:center}
    .lod-tool h1{font-size:clamp(1.6rem,4vw,2.4rem);font-weight:700;margin-bottom:.4rem;color:var(--heading-color,#1e293b)}
    .lod-tool .tool-subtitle{font-size:1rem;color:var(--text-muted,#475569);margin-bottom:1.5rem}
    .lod-stats-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-bottom:1.25rem}
    .lod-stat{background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:1rem .5rem}
    .lod-stat-value{font-size:1.9rem;font-weight:700;font-family:'JetBrains Mono',monospace;color:var(--primary-color,#4b5eaa);line-height:1.1}
    .lod-stat-label{font-size:.75rem;color:var(--text-muted,#475569);text-transform:uppercase;letter-spacing:.05em;margin-top:.25rem}
    .lod-track-wrap{position:relative;border:2px dashed var(--border-color,#e2e8f0);border-radius:12px;overflow:hidden;margin-bottom:1.25rem;cursor:crosshair;background:var(--card-bg,#f8fafc);user-select:none}
    .lod-track-wrap canvas{display:block;width:100%;height:350px}
    .lod-track-overlay{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none}
    .lod-track-msg{font-size:1rem;font-weight:600;color:var(--text-muted,#475569);text-align:center;padding:0 1rem}
    .lod-scatter-wrap{border:1px solid var(--border-color,#e2e8f0);border-radius:10px;overflow:hidden;margin-bottom:1.25rem;background:var(--card-bg,#f8fafc)}
    .lod-scatter-title{font-size:.78rem;text-transform:uppercase;letter-spacing:.05em;color:var(--text-muted,#475569);padding:.5rem .75rem 0;text-align:<?php echo $isRtl ? 'right' : 'left'; ?>}
    .lod-scatter-wrap canvas{display:block;width:100%;height:80px}
    .lod-verdict{display:none;background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:12px;padding:1.25rem;margin-bottom:1.25rem}
    .lod-verdict.visible{display:block}
    .lod-verdict-badge{display:inline-block;padding:.4rem 1.25rem;border-radius:50px;font-size:1rem;font-weight:700;margin-bottom:.5rem}
    .badge-very-low{background:rgba(34,197,94,.15);color:#16a34a}
    .badge-low{background:rgba(99,102,241,.15);color:#4338ca}
    .badge-medium{background:rgba(234,179,8,.15);color:#a16207}
    .badge-high{background:rgba(239,68,68,.15);color:#dc2626}
    .lod-verdict-sub{font-size:.9rem;color:var(--text-muted,#475569)}
    .lod-lift-list{display:flex;flex-wrap:wrap;gap:.5rem;justify-content:center;margin-top:.75rem}
    .lod-lift-chip{padding:.2rem .65rem;border-radius:20px;font-size:.8rem;font-family:'JetBrains Mono',monospace;background:rgba(99,102,241,.1);color:var(--primary-color,#4b5eaa);border:1px solid rgba(99,102,241,.2)}
    .lod-hint{background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:.75rem 1rem;font-size:.9rem;color:var(--text-color,#1e293b);margin-bottom:1.25rem;text-align:<?php echo $isRtl ? 'right' : 'left'; ?>}
    .reset-btn{padding:.65rem 2rem;min-height:44px;border:none;border-radius:8px;background:var(--primary-color,#4b5eaa);color:#fff;font-family:inherit;font-size:1rem;font-weight:600;cursor:pointer;transition:opacity .15s,transform .1s}
    .reset-btn:hover{opacity:.88;transform:translateY(-1px)}
    .privacy-note{font-size:.8rem;color:var(--text-muted,#475569);margin-top:.75rem}
    .ratings-table{width:100%;border-collapse:collapse;margin-top:1rem;font-size:.95rem}
    .ratings-table th,.ratings-table td{padding:.6rem .9rem;text-align:<?php echo $isRtl ? 'right' : 'left'; ?>;border-bottom:1px solid var(--border-color,#e2e8f0)}
    .ratings-table th{font-weight:600;color:var(--heading-color,#1e293b);background:var(--card-bg,#f1f5f9)}
    .ratings-table td{color:var(--text-color,#1e293b)}
    .ratings-table tr:last-child td{border-bottom:none}
    @media(max-width:768px){.lod-tool{padding:1.25rem 1rem 2rem}.lod-stats-grid{grid-template-columns:repeat(2,1fr)}.lod-track-wrap canvas{height:240px}}
  </style>
</head>
<body class="landing-page">
  <?php if ($d['is_en']): ?>
    <?php include __DIR__ . '/../../header.php'; ?>
  <?php else: ?>
    <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/header-' . $lang . '.php'; ?>
  <?php endif; ?>
  <main id="main-content" class="landing-main">

    <section class="tool-stage" aria-labelledby="lod-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker"><?php echo htmlspecialchars($d['section_kicker']); ?></p>
          <h2 id="lod-tool-title"><?php echo htmlspecialchars($d['section_h2']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['section_lede']); ?></p>
        </div>
      </div>

      <section class="tool-shell">
        <div class="lod-tool">
          <h1><?php echo htmlspecialchars($d['h1']); ?></h1>
          <p class="tool-subtitle"><?php echo htmlspecialchars($d['subtitle']); ?></p>

          <div class="lod-hint"><?php echo htmlspecialchars($d['hint']); ?></div>

          <div class="lod-stats-grid">
            <div class="lod-stat">
              <div class="lod-stat-value" id="lod-avg-disp">—</div>
              <div class="lod-stat-label"><?php echo htmlspecialchars($d['label_avg']); ?></div>
            </div>
            <div class="lod-stat">
              <div class="lod-stat-value" id="lod-lift-count">0</div>
              <div class="lod-stat-label"><?php echo htmlspecialchars($d['label_lifts']); ?></div>
            </div>
            <div class="lod-stat">
              <div class="lod-stat-value" id="lod-last-disp">—</div>
              <div class="lod-stat-label"><?php echo htmlspecialchars($d['label_last']); ?></div>
            </div>
          </div>

          <div class="lod-track-wrap" aria-label="Mouse tracking area">
            <canvas id="lod-canvas" aria-hidden="true"></canvas>
            <div class="lod-track-overlay">
              <div class="lod-track-msg" id="lod-track-msg"><?php echo htmlspecialchars($d['track_msg']); ?></div>
            </div>
          </div>

          <div class="lod-scatter-wrap" aria-label="Lift displacement scatter plot">
            <div class="lod-scatter-title"><?php echo htmlspecialchars($d['scatter_title']); ?></div>
            <canvas id="lod-scatter" aria-hidden="true"></canvas>
          </div>

          <div class="lod-lift-list" id="lod-lift-list" aria-live="polite"></div>

          <div class="lod-verdict" id="lod-verdict" role="status" aria-live="assertive">
            <div class="lod-verdict-badge" id="lod-verdict-badge"></div>
            <div class="lod-verdict-sub" id="lod-verdict-sub"></div>
          </div>

          <button class="reset-btn" id="lod-reset-btn"><?php echo htmlspecialchars($d['btn_reset']); ?></button>
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

    <section class="feature-band" aria-labelledby="lod-h2-1">
      <div class="container">
        <div class="section-head">
          <h2 id="lod-h2-1"><?php echo htmlspecialchars($d['h2_1']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_1']); ?></p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="lod-h2-2">
      <div class="container">
        <div class="section-head">
          <h2 id="lod-h2-2"><?php echo htmlspecialchars($d['h2_2']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_2']); ?></p>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="lod-h2-3">
      <div class="container">
        <div class="section-head">
          <h2 id="lod-h2-3"><?php echo htmlspecialchars($d['h2_3']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_3']); ?></p>
        </div>
        <div style="margin-top:1.5rem;">
          <table class="ratings-table" aria-label="LOD rating classification">
            <thead>
              <tr>
                <th scope="col"><?php echo htmlspecialchars($d['table_col1']); ?></th>
                <th scope="col"><?php echo htmlspecialchars($d['table_col2']); ?></th>
                <th scope="col"><?php echo htmlspecialchars($d['table_col3']); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($d['table_rows'] as $row): ?>
              <tr>
                <td><?php echo htmlspecialchars($row[0]); ?></td>
                <td><?php echo htmlspecialchars($row[1]); ?></td>
                <td><?php echo htmlspecialchars($row[2]); ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="lod-h2-4">
      <div class="container">
        <div class="section-head">
          <h2 id="lod-h2-4"><?php echo htmlspecialchars($d['h2_4']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_4']); ?></p>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="lod-faq">
      <div class="container">
        <div class="section-head">
          <h2 id="lod-faq"><?php echo htmlspecialchars($d['faq_h2']); ?></h2>
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

    <?php include __DIR__ . '/../../includes/components/tools-list.php'; ?>
    <?php $relatedToolKey = 'mouse'; include __DIR__ . '/../../includes/related-tools.php'; ?>

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

      var canvas      = document.getElementById('lod-canvas');
      var scatterCvs  = document.getElementById('lod-scatter');
      var trackMsg    = document.getElementById('lod-track-msg');
      var avgDispEl   = document.getElementById('lod-avg-disp');
      var liftCountEl = document.getElementById('lod-lift-count');
      var lastDispEl  = document.getElementById('lod-last-disp');
      var verdictEl   = document.getElementById('lod-verdict');
      var verdictBadge= document.getElementById('lod-verdict-badge');
      var verdictSub  = document.getElementById('lod-verdict-sub');
      var liftListEl  = document.getElementById('lod-lift-list');
      var resetBtn    = document.getElementById('lod-reset-btn');

      var ctx        = canvas.getContext('2d');
      var scatterCtx = scatterCvs.getContext('2d');

      var labelVeryLow  = <?php echo $jsLodVeryLow; ?>;
      var labelLow      = <?php echo $jsLodLow; ?>;
      var labelMedium   = <?php echo $jsLodMedium; ?>;
      var labelHigh     = <?php echo $jsLodHigh; ?>;
      var descVeryLow   = <?php echo $jsDescVeryLow; ?>;
      var descLow       = <?php echo $jsDescLow; ?>;
      var descMedium    = <?php echo $jsDescMedium; ?>;
      var descHigh      = <?php echo $jsDescHigh; ?>;

      var samples    = [];
      var liftPoint  = null;
      var lastPos    = null;
      var isDrawing  = false;
      var lineColors = ['#3b82f6','#10b981','#f59e0b','#ef4444','#8b5cf6',
                        '#06b6d4','#84cc16','#f97316','#e11d48','#7c3aed'];
      var colorIndex = 0;

      function resizeCanvas() {
        var rect = canvas.parentElement.getBoundingClientRect();
        canvas.width     = Math.floor(rect.width) || 680;
        canvas.height    = canvas.offsetHeight || 350;
        scatterCvs.width = Math.floor(rect.width) || 680;
        scatterCvs.height = 80;
        drawScatter();
      }
      resizeCanvas();
      window.addEventListener('resize', function() { resizeCanvas(); });

      canvas.addEventListener('mouseenter', function(e) {
        if (liftPoint !== null) {
          var dx = e.offsetX - liftPoint.x, dy = e.offsetY - liftPoint.y;
          var dist = Math.round(Math.sqrt(dx*dx + dy*dy));
          recordLift(dist, e.offsetX, e.offsetY);
        }
        isDrawing = true;
        ctx.beginPath(); ctx.moveTo(e.offsetX, e.offsetY);
        lastPos = { x: e.offsetX, y: e.offsetY };
        liftPoint = null;
        trackMsg.style.opacity = '0';
      });

      canvas.addEventListener('mousemove', function(e) {
        if (!isDrawing) return;
        ctx.lineWidth = 2; ctx.strokeStyle = lineColors[colorIndex % lineColors.length];
        ctx.lineTo(e.offsetX, e.offsetY); ctx.stroke();
        lastPos = { x: e.offsetX, y: e.offsetY };
      });

      canvas.addEventListener('mouseleave', function() {
        if (!isDrawing) return;
        isDrawing = false;
        if (lastPos) {
          liftPoint = { x: lastPos.x, y: lastPos.y };
          ctx.beginPath(); ctx.arc(liftPoint.x, liftPoint.y, 5, 0, Math.PI*2);
          ctx.fillStyle = '#ef4444'; ctx.fill();
        }
        colorIndex++;
      });

      function recordLift(dist, rx, ry) {
        samples.push(dist);
        ctx.beginPath(); ctx.arc(rx, ry, 5, 0, Math.PI*2);
        ctx.fillStyle = '#22c55e'; ctx.fill();
        if (liftPoint) {
          ctx.beginPath(); ctx.setLineDash([4,4]); ctx.lineWidth = 1.5;
          ctx.strokeStyle = 'rgba(239,68,68,0.6)';
          ctx.moveTo(liftPoint.x, liftPoint.y); ctx.lineTo(rx, ry); ctx.stroke();
          ctx.setLineDash([]);
        }
        updateStats(dist);
        addLiftChip(dist, samples.length);
        if (samples.length >= 5) showVerdict();
      }

      function updateStats(lastDist) {
        var total = 0;
        for (var i = 0; i < samples.length; i++) total += samples[i];
        avgDispEl.textContent   = (total/samples.length).toFixed(1);
        liftCountEl.textContent = samples.length;
        lastDispEl.textContent  = lastDist;
        drawScatter();
      }

      function addLiftChip(dist, num) {
        var chip = document.createElement('span');
        chip.className = 'lod-lift-chip';
        chip.textContent = '#' + num + ': ' + dist + 'px';
        liftListEl.appendChild(chip);
      }

      function drawScatter() {
        var W = scatterCvs.width, H = scatterCvs.height;
        scatterCtx.clearRect(0, 0, W, H);
        if (samples.length === 0) return;
        var maxVal = Math.max.apply(null, samples);
        var maxDisp = Math.max(maxVal, 50);
        var padX = 20, padY = 8, plotW = W - padX*2, plotH = H - padY*2;
        scatterCtx.strokeStyle = 'rgba(148,163,184,0.4)'; scatterCtx.lineWidth = 1;
        scatterCtx.beginPath();
        scatterCtx.moveTo(padX, H-padY); scatterCtx.lineTo(W-padX, H-padY); scatterCtx.stroke();
        var thresholds = [{val:5,color:'rgba(34,197,94,0.3)'},{val:15,color:'rgba(234,179,8,0.3)'},{val:30,color:'rgba(239,68,68,0.3)'}];
        thresholds.forEach(function(t) {
          if (t.val <= maxDisp) {
            var ty = H - padY - (t.val/maxDisp)*plotH;
            scatterCtx.strokeStyle = t.color; scatterCtx.setLineDash([4,4]);
            scatterCtx.beginPath(); scatterCtx.moveTo(padX,ty); scatterCtx.lineTo(W-padX,ty); scatterCtx.stroke();
            scatterCtx.setLineDash([]);
          }
        });
        var spacing = samples.length > 1 ? plotW/(samples.length-1) : 0;
        samples.forEach(function(val, i) {
          var cx = padX + (samples.length > 1 ? i*spacing : plotW/2);
          var cy = H - padY - (val/maxDisp)*plotH;
          scatterCtx.beginPath(); scatterCtx.arc(cx, cy, 4, 0, Math.PI*2);
          scatterCtx.fillStyle = '#3b82f6'; scatterCtx.fill();
        });
      }

      function showVerdict() {
        var total = 0;
        for (var i = 0; i < samples.length; i++) total += samples[i];
        var avg = total/samples.length;
        var label, cls, desc;
        if (avg < 5)       { label = labelVeryLow;  cls = 'badge-very-low'; desc = descVeryLow; }
        else if (avg < 15) { label = labelLow;       cls = 'badge-low';      desc = descLow; }
        else if (avg < 30) { label = labelMedium;    cls = 'badge-medium';   desc = descMedium; }
        else               { label = labelHigh;      cls = 'badge-high';     desc = descHigh; }
        verdictBadge.textContent = label + ' — ' + avg.toFixed(1) + 'px avg';
        verdictBadge.className   = 'lod-verdict-badge ' + cls;
        verdictSub.textContent   = desc;
        verdictEl.classList.add('visible');
      }

      resetBtn.addEventListener('click', function() {
        samples = []; liftPoint = null; lastPos = null; isDrawing = false; colorIndex = 0;
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        scatterCtx.clearRect(0, 0, scatterCvs.width, scatterCvs.height);
        avgDispEl.textContent = '—'; liftCountEl.textContent = '0'; lastDispEl.textContent = '—';
        liftListEl.innerHTML = ''; verdictEl.classList.remove('visible');
        trackMsg.style.opacity = '1';
      });

    }, 0); });
  });
  </script>
</body>
</html>
