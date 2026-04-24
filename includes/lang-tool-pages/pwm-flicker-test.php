<?php
/**
 * Localized PWM Flicker Test renderer
 * Included by language wrapper pages. Expects: $lang (e.g. 'es')
 */

$langData = [
    'en' => [
        'dir' => '', 'html_lang' => 'en',
        'title' => 'PWM Flicker Test Online — Check If Your Monitor Has Backlight Flicker | KeyboardTester.click',
        'description' => 'Test your monitor for PWM backlight flicker online free. Select flicker frequency, go fullscreen, and film with your phone to detect eye-strain-causing PWM dimming. No software needed.',
        'keywords' => 'PWM flicker test, monitor backlight flicker test, does my monitor have PWM, monitor eye strain test, PWM free monitor test',
        'h1' => 'PWM Flicker Test Online',
        'subtitle' => 'Check if your monitor uses PWM backlight dimming — a common cause of eye strain and headaches',
        'section_kicker' => 'Primary tool',
        'section_h2' => 'PWM Flicker Test',
        'section_lede' => 'Select a frequency, go fullscreen, then film your screen with your phone.',
        'btn_start' => '▶ Start Flicker Test (Fullscreen)',
        'btn_stop' => '⏹ Stop Test',
        'btn_reset' => 'Reset',
        'hz_sub' => 'Selected test frequency',
        'preview_label' => 'Preview — click "Start Flicker Test" for fullscreen',
        'how_to' => 'How to test:',
        'steps' => [
            'Set your monitor to 50–75% brightness (PWM is inactive at 100%).',
            'Select a frequency above and click "Start Flicker Test".',
            'Open your phone\'s camera app and point it at the screen.',
            'Look for <strong>horizontal dark bands</strong> moving across the camera image.',
            'If you see bands, tap "I See Banding" below. If not, tap "No Banding".',
        ],
        'btn_yes_banding' => '⚠ I See Banding',
        'btn_no_banding' => '✓ No Banding',
        'result_detected_badge' => '⚠ PWM Likely Detected at {hz} Hz',
        'result_detected_sub' => 'Your monitor appears to use PWM backlight dimming at or near {hz} Hz. Consider switching to a flicker-free (DC dimming) monitor to reduce eye strain.',
        'result_not_detected_badge' => '✓ No PWM Detected at {hz} Hz',
        'result_not_detected_sub' => 'No banding visible at {hz} Hz. Try other frequencies to be thorough. If all frequencies show no banding your monitor is likely flicker-free or uses high-frequency PWM (>1000Hz) which is generally harmless.',
        'privacy' => 'This test runs entirely in your browser. No data is collected or transmitted.',
        'trust' => ['No Software', 'Works at Any Brightness', 'Phone Camera Method', '100% Free'],
        'trust_desc' => [
            'Runs entirely in your browser — nothing to install',
            'Test at 50–75% brightness where PWM is most active',
            'Most reliable detection method — no special equipment needed',
            'No signup, no download, no limits on retesting',
        ],
        'h2_1' => 'What Is PWM Dimming and Why Does It Cause Eye Strain?',
        'p_1' => 'PWM (Pulse Width Modulation) is a method monitors use to control brightness by rapidly switching the backlight on and off at a fixed frequency. Rather than continuously reducing the light output, the monitor flickers the backlight hundreds of times per second. Approximately 30% of LCD monitors on the market use PWM dimming below 1000 Hz. The alternative — DC dimming — reduces actual current to the backlight LEDs, producing a steady, flicker-free light at all brightness levels. If you experience headaches, eye fatigue, or difficulty focusing after long screen sessions, PWM flicker from your monitor could be a contributing factor.',
        'h2_2' => 'How to Use This PWM Flicker Test',
        'p_2' => 'The test uses a fast-alternating black-and-white canvas running in fullscreen mode. Step 1: Reduce your monitor brightness to 50–75% (PWM is generally only active below maximum). Step 2: Select a test frequency. Step 3: Click "Start Flicker Test" and the tool goes fullscreen. Step 4: Open your phone\'s camera app and aim it at your monitor from about 30–50 cm away. Step 5: Look for dark horizontal bands moving slowly through the camera image — this is the interference pattern between the camera\'s shutter and the PWM cycle.',
        'h2_3' => 'PWM Symptoms: Headaches, Eye Fatigue, and Blurry Text',
        'p_3' => 'The sensitivity to PWM flicker varies significantly between individuals. Research suggests that people with a history of migraines, photosensitivity, or visual stress disorders are more likely to notice discomfort from PWM frequencies below 1000 Hz. Common reported symptoms include frontal headaches that worsen after 2–3 hours of screen use, a feeling of eye strain or dryness, difficulty reading small text, and general fatigue. Many sufferers do not connect these symptoms to their monitor because the flicker is invisible to the naked eye.',
        'h2_4' => 'How to Find a PWM-Free Monitor',
        'p_4' => 'When shopping for a PWM-free monitor, look for displays explicitly certified as "Flicker-Free" by VESA or the manufacturer. DC dimming is the gold standard — monitors using DC dimming control brightness by adjusting LED current rather than switching, producing zero flicker at any brightness level. If you currently own a PWM monitor and cannot upgrade, keeping brightness at 100% eliminates PWM on most models.',
        'faq_h2' => 'Frequently Asked Questions',
        'faqs' => [
            ['q' => 'What phone camera settings work best?', 'a' => 'Use your phone\'s standard camera app (not portrait mode). Disable auto-exposure if possible — on iPhone tap and hold to lock AE/AF. On Android enable Pro mode and lower the shutter speed to 1/120s.'],
            ['q' => 'I see banding at 60Hz but not 120Hz — does that mean my monitor uses 60Hz PWM?', 'a' => 'Yes — if banding appears at a specific frequency, that matches your monitor\'s PWM frequency. Banding is most visible when the test frequency matches or is a harmonic of the monitor\'s actual PWM cycle.'],
            ['q' => 'My screen is at maximum brightness — does PWM still apply?', 'a' => 'PWM is typically only active below maximum brightness. At 100% most monitors switch to continuous DC dimming. Test at 50–75% brightness for the most accurate results.'],
            ['q' => 'Can this tool detect PWM automatically?', 'a' => 'The manual filming method is most reliable. Automatic webcam detection is experimental and requires a camera capable of 120fps+, which most laptop webcams do not support.'],
            ['q' => 'Is PWM harmful?', 'a' => 'For most people no. Sensitive individuals — those prone to migraines or photosensitivity — may experience eye strain at PWM frequencies below 1000Hz, especially during long work sessions.'],
        ],
        'hreflang_self' => 'pwm-flicker-test.php',
        'is_en' => true,
    ],
    'es' => [
        'dir' => 'spanish', 'html_lang' => 'es',
        'title' => 'Test PWM Flicker Online — Comprueba si tu Monitor Parpadea | KeyboardTester.click',
        'description' => 'Prueba de parpadeo PWM: detecta si tu monitor usa modulación por ancho de pulso para atenuar la retroiluminación, lo que causa fatiga ocular. Rápido, en el navegador.',
        'keywords' => 'test PWM flicker, test parpadeo monitor, mi monitor tiene PWM, test fatiga visual monitor, monitor sin PWM',
        'h1' => 'Test de Parpadeo PWM Online',
        'subtitle' => 'Comprueba si tu monitor usa dimming PWM — una causa común de fatiga ocular y dolores de cabeza',
        'section_kicker' => 'Herramienta principal',
        'section_h2' => 'Test de Parpadeo PWM',
        'section_lede' => 'Selecciona una frecuencia, activa pantalla completa y filma la pantalla con tu teléfono.',
        'btn_start' => '▶ Iniciar Test (Pantalla Completa)',
        'btn_stop' => '⏹ Detener Test',
        'btn_reset' => 'Reiniciar',
        'hz_sub' => 'Frecuencia de prueba seleccionada',
        'preview_label' => 'Vista previa — haz clic en "Iniciar Test" para pantalla completa',
        'how_to' => 'Cómo hacer la prueba:',
        'steps' => [
            'Ajusta el brillo de tu monitor al 50–75% (el PWM está inactivo al 100%).',
            'Selecciona una frecuencia y haz clic en "Iniciar Test".',
            'Abre la cámara de tu teléfono y apúntala a la pantalla.',
            'Busca <strong>bandas oscuras horizontales</strong> moviéndose por la imagen.',
            'Si ves bandas, pulsa "Veo Bandas". Si no, pulsa "Sin Bandas".',
        ],
        'btn_yes_banding' => '⚠ Veo Bandas',
        'btn_no_banding' => '✓ Sin Bandas',
        'result_detected_badge' => '⚠ PWM Detectado probablemente a {hz} Hz',
        'result_detected_sub' => 'Tu monitor parece usar dimming PWM en o cerca de {hz} Hz. Considera cambiar a un monitor libre de parpadeo (DC dimming) para reducir la fatiga visual.',
        'result_not_detected_badge' => '✓ Sin PWM a {hz} Hz',
        'result_not_detected_sub' => 'No se ven bandas a {hz} Hz. Prueba otras frecuencias para ser exhaustivo. Si ninguna frecuencia muestra bandas, tu monitor probablemente no usa PWM o usa alta frecuencia (>1000Hz).',
        'privacy' => 'Esta prueba se ejecuta completamente en tu navegador. No se recopilan ni transmiten datos.',
        'trust' => ['Sin Software', 'Cualquier Brillo', 'Método Cámara', '100% Gratis'],
        'trust_desc' => [
            'Se ejecuta en tu navegador — nada que instalar',
            'Prueba al 50–75% de brillo donde el PWM es más activo',
            'Método de detección más fiable — sin equipo especial',
            'Sin registro, sin descarga, sin límites de pruebas',
        ],
        'h2_1' => '¿Qué es el Dimming PWM y por qué causa fatiga ocular?',
        'p_1' => 'El PWM (Modulación por Ancho de Pulso) es un método que usan los monitores para controlar el brillo apagando y encendiendo la retroiluminación rápidamente. Aproximadamente el 30% de los monitores LCD usan dimming PWM por debajo de 1000 Hz. La alternativa — el dimming DC — reduce la corriente de los LEDs produciendo luz estable sin parpadeo. Si tienes dolores de cabeza o fatiga visual tras largas sesiones, el PWM de tu monitor podría ser la causa.',
        'h2_2' => 'Cómo usar este test de parpadeo PWM',
        'p_2' => 'El test usa un lienzo de pantalla completa que alterna rápidamente entre negro y blanco. Paso 1: Reduce el brillo al 50–75%. Paso 2: Selecciona una frecuencia. Paso 3: Haz clic en "Iniciar Test". Paso 4: Abre la cámara del teléfono y apúntala al monitor a 30–50 cm. Paso 5: Busca bandas oscuras horizontales en la imagen de la cámara.',
        'h2_3' => 'Síntomas del PWM: Dolores de cabeza, fatiga y texto borroso',
        'p_3' => 'La sensibilidad al parpadeo PWM varía mucho entre personas. Quienes padecen migrañas o fotosensibilidad son más propensos a sentir molestias con frecuencias inferiores a 1000 Hz. Los síntomas comunes incluyen dolores de cabeza frontales, sensación de sequedad ocular y dificultad para leer texto pequeño.',
        'h2_4' => 'Cómo encontrar un monitor sin PWM',
        'p_4' => 'Busca monitores certificados como "Flicker-Free" por VESA o el fabricante. El dimming DC es el estándar de oro: controla el brillo ajustando la corriente LED en lugar de conmutar, produciendo cero parpadeo. Si no puedes cambiar de monitor, mantener el brillo al 100% elimina el PWM en la mayoría de modelos.',
        'faq_h2' => 'Preguntas Frecuentes',
        'faqs' => [
            ['q' => '¿Qué ajustes de cámara funcionan mejor?', 'a' => 'Usa la app de cámara estándar de tu teléfono (no el modo retrato). Desactiva la exposición automática si es posible — en iPhone mantén pulsado para bloquear AE/AF.'],
            ['q' => 'Veo bandas a 60Hz pero no a 120Hz — ¿eso significa que mi monitor usa PWM a 60Hz?', 'a' => 'Sí — si aparecen bandas a una frecuencia específica, eso coincide con la frecuencia PWM de tu monitor.'],
            ['q' => 'Mi pantalla está al máximo de brillo — ¿el PWM sigue activo?', 'a' => 'El PWM generalmente solo está activo por debajo del brillo máximo. Al 100% la mayoría de monitores cambian a dimming DC continuo.'],
            ['q' => '¿Puede esta herramienta detectar PWM automáticamente?', 'a' => 'El método manual de filmación es más fiable. La detección automática por webcam requiere una cámara capaz de 120fps+.'],
            ['q' => '¿Es dañino el PWM?', 'a' => 'Para la mayoría no. Las personas sensibles — propensas a migrañas o fotosensibilidad — pueden sentir fatiga visual con frecuencias PWM inferiores a 1000Hz.'],
        ],
        'hreflang_self' => 'languages/spanish/pwm-flicker-test.php',
        'is_en' => false,
    ],
    'ar' => [
        'dir' => 'arabic', 'html_lang' => 'ar',
        'title' => 'اختبار وميض PWM — تحقق من خفت إضاءة الشاشة | KeyboardTester.click',
        'description' => 'اختبار وميض PWM: يكتشف ما إذا كانت شاشتك تستخدم تعديل عرض النبضة لخفض الإضاءة الخلفية، مما يسبب إجهاد العين. سريع في المتصفح، بدون تثبيت.',
        'keywords' => 'اختبار وميض PWM, اختبار وميض الشاشة, هل شاشتي بها PWM, اختبار إجهاد العين من الشاشة',
        'h1' => 'اختبار وميض PWM',
        'subtitle' => 'تحقق مما إذا كانت شاشتك تستخدم تعتيم PWM — سبب شائع لإجهاد العين والصداع',
        'section_kicker' => 'الأداة الرئيسية',
        'section_h2' => 'اختبار وميض PWM',
        'section_lede' => 'اختر تردداً، انتقل للشاشة الكاملة، ثم صوّر شاشتك بهاتفك.',
        'btn_start' => '▶ بدء اختبار الوميض (شاشة كاملة)',
        'btn_stop' => '⏹ إيقاف الاختبار',
        'btn_reset' => 'إعادة ضبط',
        'hz_sub' => 'تردد الاختبار المحدد',
        'preview_label' => 'معاينة — انقر على "بدء الاختبار" للشاشة الكاملة',
        'how_to' => 'كيفية الاختبار:',
        'steps' => [
            'اضبط سطوع الشاشة على 50-75٪ (PWM غير نشط عند 100٪).',
            'اختر تردداً أعلاه وانقر على "بدء اختبار الوميض".',
            'افتح تطبيق الكاميرا على هاتفك ووجّهه نحو الشاشة.',
            'ابحث عن <strong>أشرطة داكنة أفقية</strong> تتحرك عبر صورة الكاميرا.',
            'إذا رأيت أشرطة، انقر على "أرى أشرطة". وإلا انقر على "لا أشرطة".',
        ],
        'btn_yes_banding' => '⚠ أرى أشرطة',
        'btn_no_banding' => '✓ لا أشرطة',
        'result_detected_badge' => '⚠ تم اكتشاف PWM على الأرجح عند {hz} هرتز',
        'result_detected_sub' => 'يبدو أن شاشتك تستخدم تعتيم PWM عند أو بالقرب من {hz} هرتز. فكّر في التحول إلى شاشة خالية من الوميض (تعتيم DC) لتقليل إجهاد العين.',
        'result_not_detected_badge' => '✓ لم يُكتشف PWM عند {hz} هرتز',
        'result_not_detected_sub' => 'لا توجد أشرطة مرئية عند {hz} هرتز. جرّب ترددات أخرى للتأكد. إذا لم تظهر أشرطة عند أي تردد، فشاشتك على الأرجح خالية من الوميض.',
        'privacy' => 'يعمل هذا الاختبار بالكامل في متصفحك. لا يتم جمع أي بيانات أو إرسالها.',
        'trust' => ['بدون برامج', 'أي سطوع', 'طريقة الكاميرا', '100٪ مجاني'],
        'trust_desc' => [
            'يعمل في متصفحك — لا شيء للتثبيت',
            'اختبر عند 50-75٪ سطوع حيث يكون PWM أكثر نشاطاً',
            'طريقة الكشف الأكثر موثوقية — لا معدات خاصة مطلوبة',
            'بدون تسجيل، بدون تنزيل، بدون قيود',
        ],
        'h2_1' => 'ما هو تعتيم PWM ولماذا يسبب إجهاد العين؟',
        'p_1' => 'تعتيم PWM (تعديل عرض النبضة) هو طريقة تستخدمها الشاشات للتحكم في السطوع عن طريق تشغيل وإيقاف الإضاءة الخلفية بسرعة بتردد ثابت. حوالي 30٪ من شاشات LCD تستخدم تعتيم PWM أقل من 1000 هرتز. البديل — تعتيم DC — يقلل التيار الفعلي لمصابيح LED، مما ينتج ضوءاً ثابتاً بدون وميض.',
        'h2_2' => 'كيفية استخدام اختبار وميض PWM هذا',
        'p_2' => 'يستخدم الاختبار لوحة رسم متبادلة بالأبيض والأسود في وضع الشاشة الكاملة. الخطوة 1: اخفض السطوع إلى 50-75٪. الخطوة 2: اختر تردداً. الخطوة 3: انقر على "بدء الاختبار". الخطوة 4: افتح كاميرا هاتفك. الخطوة 5: ابحث عن أشرطة داكنة أفقية في صورة الكاميرا.',
        'h2_3' => 'أعراض PWM: الصداع وإجهاد العين والنص الضبابي',
        'p_3' => 'تتفاوت الحساسية لوميض PWM بشكل كبير بين الأفراد. الأشخاص المعرضون للصداع النصفي أو فرط الحساسية للضوء أكثر عرضة لعدم الراحة من الترددات أقل من 1000 هرتز.',
        'h2_4' => 'كيف تجد شاشة بدون PWM',
        'p_4' => 'ابحث عن شاشات معتمدة بـ "Flicker-Free" من VESA أو الشركة المصنعة. تعتيم DC هو المعيار الذهبي — يتحكم في السطوع عن طريق ضبط تيار LED بدلاً من التبديل.',
        'faq_h2' => 'الأسئلة الشائعة',
        'faqs' => [
            ['q' => 'ما هي أفضل إعدادات الكاميرا؟', 'a' => 'استخدم تطبيق الكاميرا القياسي في هاتفك (وليس وضع البورتريه). عطّل التعريض التلقائي إن أمكن.'],
            ['q' => 'أرى أشرطة عند 60 هرتز ولا أرى عند 120 هرتز — هل يعني ذلك أن شاشتي تستخدم PWM عند 60 هرتز؟', 'a' => 'نعم — إذا ظهرت أشرطة عند تردد معين، فهذا يتوافق مع تردد PWM الخاص بشاشتك.'],
            ['q' => 'شاشتي على أقصى سطوع — هل PWM لا يزال ينطبق؟', 'a' => 'عادةً ما يكون PWM نشطاً فقط دون السطوع الأقصى. عند 100٪ تتحول معظم الشاشات إلى تعتيم DC المستمر.'],
            ['q' => 'هل يمكن لهذه الأداة الكشف عن PWM تلقائياً؟', 'a' => 'طريقة التصوير اليدوية هي الأكثر موثوقية. الكشف التلقائي بكاميرا الويب تجريبي ويتطلب كاميرا قادرة على 120fps+.'],
            ['q' => 'هل PWM ضار؟', 'a' => 'بالنسبة لمعظم الناس لا. الأشخاص الحساسون — المعرضون للصداع النصفي أو فرط الحساسية للضوء — قد يعانون من إجهاد العين.'],
        ],
        'hreflang_self' => 'languages/arabic/pwm-flicker-test.php',
        'is_en' => false,
    ],
    'fr' => [
        'dir' => 'french', 'html_lang' => 'fr',
        'title' => 'Test Scintillement PWM en Ligne — Vérifier le Rétroéclairage de votre Écran | KeyboardTester.click',
        'description' => 'Test de scintillement PWM : détecte si votre écran utilise la modulation de largeur d\'impulsion pour atténuer le rétroéclairage, cause de fatigue oculaire. Rapide, dans le navigateur.',
        'keywords' => 'test scintillement PWM, test rétroéclairage écran, mon écran a-t-il PWM, test fatigue oculaire écran, écran sans PWM',
        'h1' => 'Test de Scintillement PWM en Ligne',
        'subtitle' => 'Vérifiez si votre écran utilise la gradation PWM — une cause fréquente de fatigue oculaire',
        'section_kicker' => 'Outil principal',
        'section_h2' => 'Test de Scintillement PWM',
        'section_lede' => 'Sélectionnez une fréquence, passez en plein écran, puis filmez votre écran avec votre téléphone.',
        'btn_start' => '▶ Démarrer le Test (Plein Écran)',
        'btn_stop' => '⏹ Arrêter le Test',
        'btn_reset' => 'Réinitialiser',
        'hz_sub' => 'Fréquence de test sélectionnée',
        'preview_label' => 'Aperçu — cliquez sur "Démarrer le Test" pour le plein écran',
        'how_to' => 'Comment tester :',
        'steps' => [
            'Réglez la luminosité de votre écran à 50-75% (le PWM est inactif à 100%).',
            'Sélectionnez une fréquence et cliquez sur "Démarrer le Test".',
            'Ouvrez l\'application appareil photo de votre téléphone et pointez-la vers l\'écran.',
            'Cherchez des <strong>bandes sombres horizontales</strong> se déplaçant sur l\'image.',
            'Si vous voyez des bandes, appuyez sur "Je Vois des Bandes". Sinon "Pas de Bandes".',
        ],
        'btn_yes_banding' => '⚠ Je Vois des Bandes',
        'btn_no_banding' => '✓ Pas de Bandes',
        'result_detected_badge' => '⚠ PWM Probablement Détecté à {hz} Hz',
        'result_detected_sub' => 'Votre écran semble utiliser la gradation PWM à ou près de {hz} Hz. Envisagez de passer à un écran sans scintillement (gradation DC) pour réduire la fatigue oculaire.',
        'result_not_detected_badge' => '✓ Pas de PWM Détecté à {hz} Hz',
        'result_not_detected_sub' => 'Aucune bande visible à {hz} Hz. Essayez d\'autres fréquences pour être complet. Si aucune fréquence ne montre de bandes, votre écran est probablement sans scintillement.',
        'privacy' => 'Ce test s\'exécute entièrement dans votre navigateur. Aucune donnée n\'est collectée ou transmise.',
        'trust' => ['Sans Logiciel', 'Toute Luminosité', 'Méthode Caméra', '100% Gratuit'],
        'trust_desc' => [
            'Fonctionne dans votre navigateur — rien à installer',
            'Testez à 50-75% de luminosité où le PWM est le plus actif',
            'Méthode de détection la plus fiable — aucun équipement spécial',
            'Sans inscription, sans téléchargement, sans limites',
        ],
        'h2_1' => 'Qu\'est-ce que la Gradation PWM et Pourquoi Cause-t-elle la Fatigue Oculaire ?',
        'p_1' => 'Le PWM (Modulation de Largeur d\'Impulsion) est une méthode utilisée par les écrans pour contrôler la luminosité en allumant et éteignant rapidement le rétroéclairage. Environ 30% des écrans LCD utilisent la gradation PWM en dessous de 1000 Hz. L\'alternative — la gradation DC — réduit le courant réel des LED, produisant une lumière stable sans scintillement.',
        'h2_2' => 'Comment Utiliser ce Test de Scintillement PWM',
        'p_2' => 'Le test utilise un canevas plein écran alternant rapidement entre noir et blanc. Étape 1 : Réduisez la luminosité à 50-75%. Étape 2 : Sélectionnez une fréquence. Étape 3 : Cliquez sur "Démarrer le Test". Étape 4 : Ouvrez l\'appareil photo et dirigez-le vers l\'écran. Étape 5 : Cherchez des bandes horizontales sombres dans l\'image.',
        'h2_3' => 'Symptômes PWM : Maux de Tête, Fatigue Visuelle et Texte Flou',
        'p_3' => 'La sensibilité au scintillement PWM varie significativement entre les individus. Les personnes souffrant de migraines ou de photosensibilité sont plus susceptibles de ressentir une gêne avec des fréquences inférieures à 1000 Hz.',
        'h2_4' => 'Comment Trouver un Écran Sans PWM',
        'p_4' => 'Recherchez des écrans certifiés "Flicker-Free" par VESA ou le fabricant. La gradation DC est la référence absolue — elle contrôle la luminosité en ajustant le courant LED plutôt qu\'en commutant.',
        'faq_h2' => 'Questions Fréquentes',
        'faqs' => [
            ['q' => 'Quels réglages d\'appareil photo fonctionnent le mieux ?', 'a' => 'Utilisez l\'application appareil photo standard de votre téléphone (pas le mode portrait). Désactivez l\'exposition automatique si possible.'],
            ['q' => 'Je vois des bandes à 60Hz mais pas à 120Hz — cela signifie-t-il que mon écran utilise le PWM à 60Hz ?', 'a' => 'Oui — si des bandes apparaissent à une fréquence spécifique, cela correspond à la fréquence PWM de votre écran.'],
            ['q' => 'Mon écran est à luminosité maximale — le PWM s\'applique-t-il encore ?', 'a' => 'Le PWM n\'est généralement actif qu\'en dessous de la luminosité maximale. À 100% la plupart des écrans passent à la gradation DC continue.'],
            ['q' => 'Cet outil peut-il détecter le PWM automatiquement ?', 'a' => 'La méthode de filmation manuelle est la plus fiable. La détection automatique par webcam nécessite une caméra capable de 120fps+.'],
            ['q' => 'Le PWM est-il nocif ?', 'a' => 'Pour la plupart des gens, non. Les personnes sensibles aux migraines peuvent ressentir une fatigue oculaire avec des fréquences PWM inférieures à 1000Hz.'],
        ],
        'hreflang_self' => 'languages/french/pwm-flicker-test.php',
        'is_en' => false,
    ],
    'de' => [
        'dir' => 'german', 'html_lang' => 'de',
        'title' => 'PWM Flicker Test Online — Monitor-Hintergrundbeleuchtung prüfen | KeyboardTester.click',
        'description' => 'PWM-Flimmer-Test: Erkennt, ob Ihr Monitor Pulsweitenmodulation zur Hintergrundbeleuchtungs-Dimmung verwendet, die Augenbelastung verursacht. Schnell, im Browser, ohne Installation.',
        'keywords' => 'PWM Flicker Test, Monitor Hintergrundbeleuchtung testen, hat mein Monitor PWM, Monitor Augenstrain Test, PWM-freier Monitor Test',
        'h1' => 'PWM Flicker Test Online',
        'subtitle' => 'Prüfen Sie, ob Ihr Monitor PWM-Hintergrundbeleuchtung verwendet — eine häufige Ursache von Augenbelastung',
        'section_kicker' => 'Hauptwerkzeug',
        'section_h2' => 'PWM Flicker Test',
        'section_lede' => 'Wählen Sie eine Frequenz, aktivieren Sie Vollbild und filmen Sie den Bildschirm mit Ihrem Handy.',
        'btn_start' => '▶ Flicker-Test starten (Vollbild)',
        'btn_stop' => '⏹ Test stoppen',
        'btn_reset' => 'Zurücksetzen',
        'hz_sub' => 'Ausgewählte Testfrequenz',
        'preview_label' => 'Vorschau — klicken Sie "Flicker-Test starten" für Vollbild',
        'how_to' => 'So testen Sie:',
        'steps' => [
            'Stellen Sie die Monitorhelligkeit auf 50-75% ein (PWM ist bei 100% inaktiv).',
            'Wählen Sie eine Frequenz und klicken Sie auf "Flicker-Test starten".',
            'Öffnen Sie die Kamera-App Ihres Handys und richten Sie sie auf den Bildschirm.',
            'Suchen Sie nach <strong>dunklen horizontalen Streifen</strong>, die sich über das Kamerabild bewegen.',
            'Wenn Sie Streifen sehen, tippen Sie auf "Ich sehe Streifen". Wenn nicht, auf "Keine Streifen".',
        ],
        'btn_yes_banding' => '⚠ Ich sehe Streifen',
        'btn_no_banding' => '✓ Keine Streifen',
        'result_detected_badge' => '⚠ PWM wahrscheinlich erkannt bei {hz} Hz',
        'result_detected_sub' => 'Ihr Monitor verwendet wahrscheinlich PWM-Hintergrundbeleuchtung bei oder nahe {hz} Hz. Erwägen Sie einen Wechsel zu einem flimmerfreien (DC-Dimming) Monitor.',
        'result_not_detected_badge' => '✓ Kein PWM erkannt bei {hz} Hz',
        'result_not_detected_sub' => 'Keine Streifen sichtbar bei {hz} Hz. Testen Sie andere Frequenzen für ein vollständiges Ergebnis. Wenn keine Frequenz Streifen zeigt, ist Ihr Monitor wahrscheinlich flimmerfrei.',
        'privacy' => 'Dieser Test läuft vollständig in Ihrem Browser. Es werden keine Daten gesammelt oder übertragen.',
        'trust' => ['Keine Software', 'Jede Helligkeit', 'Kamera-Methode', '100% Kostenlos'],
        'trust_desc' => [
            'Läuft in Ihrem Browser — nichts zu installieren',
            'Testen Sie bei 50-75% Helligkeit, wo PWM am aktivsten ist',
            'Zuverlässigste Erkennungsmethode — keine Spezialausrüstung nötig',
            'Kein Anmelden, kein Download, keine Limits',
        ],
        'h2_1' => 'Was ist PWM-Dimming und warum verursacht es Augenbelastung?',
        'p_1' => 'PWM (Pulsweitenmodulation) ist eine Methode, mit der Monitore die Helligkeit steuern, indem die Hintergrundbeleuchtung schnell ein- und ausgeschaltet wird. Etwa 30% der LCD-Monitore verwenden PWM-Dimming unter 1000 Hz. Die Alternative — DC-Dimming — reduziert den eigentlichen Strom zu den LED-Backlights und produziert ein stabiles, flimmerfreies Licht.',
        'h2_2' => 'So verwenden Sie diesen PWM Flicker Test',
        'p_2' => 'Der Test verwendet eine Vollbild-Leinwand, die schnell zwischen Schwarz und Weiß wechselt. Schritt 1: Helligkeit auf 50-75% reduzieren. Schritt 2: Frequenz auswählen. Schritt 3: Test starten. Schritt 4: Handy-Kamera auf den Monitor richten. Schritt 5: Dunkle Streifen in der Kamera suchen.',
        'h2_3' => 'PWM-Symptome: Kopfschmerzen, Augenermüdung und verschwommener Text',
        'p_3' => 'Die Empfindlichkeit für PWM-Flicker variiert stark zwischen Personen. Menschen mit Migräne oder Lichtempfindlichkeit leiden häufiger unter Frequenzen unter 1000 Hz.',
        'h2_4' => 'Wie finde ich einen PWM-freien Monitor?',
        'p_4' => 'Suchen Sie nach Monitoren, die von VESA oder dem Hersteller als "Flicker-Free" zertifiziert sind. DC-Dimming ist der Goldstandard — es steuert die Helligkeit durch Anpassung des LED-Stroms statt durch Schalten.',
        'faq_h2' => 'Häufige Fragen',
        'faqs' => [
            ['q' => 'Welche Kamera-Einstellungen funktionieren am besten?', 'a' => 'Verwenden Sie die Standard-Kamera-App Ihres Handys (nicht den Porträt-Modus). Deaktivieren Sie die automatische Belichtung wenn möglich.'],
            ['q' => 'Ich sehe Streifen bei 60Hz aber nicht bei 120Hz — bedeutet das, mein Monitor verwendet 60Hz PWM?', 'a' => 'Ja — wenn Streifen bei einer bestimmten Frequenz erscheinen, entspricht das der PWM-Frequenz Ihres Monitors.'],
            ['q' => 'Mein Bildschirm ist auf maximaler Helligkeit — gilt PWM noch?', 'a' => 'PWM ist normalerweise nur unterhalb der maximalen Helligkeit aktiv. Bei 100% schalten die meisten Monitore auf kontinuierliches DC-Dimming um.'],
            ['q' => 'Kann dieses Tool PWM automatisch erkennen?', 'a' => 'Die manuelle Filmaufnahme-Methode ist am zuverlässigsten. Die automatische Webcam-Erkennung erfordert eine Kamera mit 120fps+.'],
            ['q' => 'Ist PWM schädlich?', 'a' => 'Für die meisten Menschen nein. Empfindliche Personen — die zu Migräne neigen — können bei PWM-Frequenzen unter 1000Hz Augenbelastung erleben.'],
        ],
        'hreflang_self' => 'languages/german/pwm-flicker-test.php',
        'is_en' => false,
    ],
    'ja' => [
        'dir' => 'japanese', 'html_lang' => 'ja',
        'title' => 'PWMフリッカーテスト — モニターのバックライトちらつき確認 | KeyboardTester.click',
        'description' => 'PWMバックライトフリッカーをオンラインで無料テスト。周波数を選択してフルスクリーンにし、スマホで撮影してPWM調光を検出。ソフト不要。',
        'keywords' => 'PWMフリッカーテスト, モニターちらつきテスト, PWM調光テスト, 目の疲れモニター, フリッカーフリーモニター',
        'h1' => 'PWMフリッカーテスト',
        'subtitle' => 'モニターがPWMバックライト調光を使用しているか確認 — 眼精疲労や頭痛の一般的な原因',
        'section_kicker' => 'メインツール',
        'section_h2' => 'PWMフリッカーテスト',
        'section_lede' => '周波数を選択してフルスクリーンにし、スマホで画面を撮影してください。',
        'btn_start' => '▶ フリッカーテスト開始（全画面）',
        'btn_stop' => '⏹ テスト停止',
        'btn_reset' => 'リセット',
        'hz_sub' => '選択中のテスト周波数',
        'preview_label' => 'プレビュー — 「フリッカーテスト開始」で全画面',
        'how_to' => 'テスト方法：',
        'steps' => [
            'モニターの輝度を50〜75%に設定してください（100%ではPWMは無効）。',
            '上記から周波数を選び「フリッカーテスト開始」をクリック。',
            'スマホのカメラアプリを開き、画面に向ける。',
            'カメラ映像に<strong>横方向の暗いバンド</strong>が流れていないか確認。',
            'バンドが見えたら「バンドが見える」、見えなければ「バンドなし」をタップ。',
        ],
        'btn_yes_banding' => '⚠ バンドが見える',
        'btn_no_banding' => '✓ バンドなし',
        'result_detected_badge' => '⚠ {hz} Hz でPWMの可能性あり',
        'result_detected_sub' => 'モニターが{hz}Hz付近でPWMバックライト調光を使用している可能性があります。眼精疲労を減らすためフリッカーフリー（DC調光）モニターへの切り替えを検討してください。',
        'result_not_detected_badge' => '✓ {hz} Hz でPWMは検出されず',
        'result_not_detected_sub' => '{hz} Hzではバンドは見えません。他の周波数もテストしてみてください。すべての周波数でバンドが見えなければ、モニターはフリッカーフリーの可能性が高いです。',
        'privacy' => 'このテストはブラウザ内で完全に実行されます。データの収集や送信は一切行いません。',
        'trust' => ['ソフト不要', '任意の輝度', 'カメラ方式', '完全無料'],
        'trust_desc' => [
            'ブラウザで動作 — インストール不要',
            'PWMが最も活発な50〜75%輝度でテスト',
            '最も信頼性の高い検出方法 — 特別な機材不要',
            '登録不要、ダウンロード不要',
        ],
        'h2_1' => 'PWM調光とは何か、なぜ眼精疲労を引き起こすのか？',
        'p_1' => 'PWM（パルス幅変調）は、モニターが輝度を制御するためにバックライトを素早くオン/オフする方法です。市場のLCDモニターの約30%が1000Hz以下のPWM調光を使用しています。代替手段のDC調光はLEDの電流を直接調整し、すべての輝度レベルで安定したちらつきのない光を提供します。',
        'h2_2' => 'このPWMフリッカーテストの使い方',
        'p_2' => 'テストはフルスクリーンで黒と白を高速に切り替えるキャンバスを使用します。手順1：輝度を50〜75%に下げる。手順2：周波数を選択。手順3：テストを開始。手順4：スマホカメラを向ける。手順5：カメラ映像に暗いバンドが流れていないか確認。',
        'h2_3' => 'PWMの症状：頭痛、眼精疲労、ぼやけた文字',
        'p_3' => 'PWMフリッカーへの感受性は個人差が大きいです。片頭痛や光過敏症の傾向がある方は、1000Hz以下の周波数で不快感を感じやすいです。',
        'h2_4' => 'フリッカーフリーモニターの選び方',
        'p_4' => 'VESAまたはメーカーが「フリッカーフリー」として認証した製品を探してください。DC調光はスイッチングではなくLED電流を調整して輝度を制御するため、あらゆる輝度レベルでちらつきがありません。',
        'faq_h2' => 'よくある質問',
        'faqs' => [
            ['q' => 'カメラの最適な設定は？', 'a' => 'スマホの標準カメラアプリを使用してください（ポートレートモード以外）。可能であれば自動露出を無効にしてください。'],
            ['q' => '60Hzではバンドが見えるが120Hzでは見えない — モニターが60Hz PWMを使っているということ？', 'a' => 'はい — 特定の周波数でバンドが見える場合、それがモニターのPWM周波数に対応しています。'],
            ['q' => '画面が最大輝度の場合、PWMは関係ある？', 'a' => 'PWMは通常、最大輝度以下でのみ有効です。100%では多くのモニターが連続DC調光に切り替えます。'],
            ['q' => 'このツールはPWMを自動検出できる？', 'a' => '手動撮影方式が最も信頼性が高いです。自動ウェブカメラ検出は120fps+対応カメラが必要です。'],
            ['q' => 'PWMは有害？', 'a' => 'ほとんどの人には問題ありません。片頭痛や光過敏症の方は1000Hz以下のPWM周波数で眼精疲労を感じる場合があります。'],
        ],
        'hreflang_self' => 'languages/japanese/pwm-flicker-test.php',
        'is_en' => false,
    ],
    'ko' => [
        'dir' => 'korean', 'html_lang' => 'ko',
        'title' => 'PWM 깜박임 테스트 온라인 — 모니터 백라이트 플리커 확인 | KeyboardTester.click',
        'description' => '모니터 PWM 백라이트 깜박임을 온라인으로 무료 테스트하세요. 주파수를 선택하고 전체화면에서 스마트폰으로 촬영하여 PWM 조광을 감지하세요. 소프트웨어 불필요.',
        'keywords' => 'PWM 깜박임 테스트, 모니터 백라이트 테스트, 내 모니터 PWM 확인, 눈 피로 모니터 테스트, 플리커 프리 모니터',
        'h1' => 'PWM 깜박임 테스트 온라인',
        'subtitle' => '모니터가 PWM 백라이트 조광을 사용하는지 확인 — 눈 피로와 두통의 일반적인 원인',
        'section_kicker' => '기본 도구',
        'section_h2' => 'PWM 깜박임 테스트',
        'section_lede' => '주파수를 선택하고 전체화면으로 전환한 후 스마트폰으로 화면을 촬영하세요.',
        'btn_start' => '▶ 깜박임 테스트 시작 (전체화면)',
        'btn_stop' => '⏹ 테스트 중지',
        'btn_reset' => '초기화',
        'hz_sub' => '선택된 테스트 주파수',
        'preview_label' => '미리보기 — "깜박임 테스트 시작"을 클릭하여 전체화면으로',
        'how_to' => '테스트 방법:',
        'steps' => [
            '모니터 밝기를 50~75%로 설정하세요 (100%에서는 PWM이 비활성).',
            '위에서 주파수를 선택하고 "깜박임 테스트 시작"을 클릭하세요.',
            '스마트폰 카메라 앱을 열고 화면을 향하세요.',
            '카메라 이미지에서 <strong>가로로 움직이는 어두운 줄무늬</strong>를 찾아보세요.',
            '줄무늬가 보이면 "줄무늬 보임"을, 아니면 "줄무늬 없음"을 탭하세요.',
        ],
        'btn_yes_banding' => '⚠ 줄무늬 보임',
        'btn_no_banding' => '✓ 줄무늬 없음',
        'result_detected_badge' => '⚠ {hz} Hz에서 PWM 감지 가능성',
        'result_detected_sub' => '모니터가 {hz} Hz 부근에서 PWM 백라이트 조광을 사용하는 것 같습니다. 눈 피로를 줄이기 위해 플리커 프리(DC 조광) 모니터로 교체를 고려해보세요.',
        'result_not_detected_badge' => '✓ {hz} Hz에서 PWM 미감지',
        'result_not_detected_sub' => '{hz} Hz에서 줄무늬가 보이지 않습니다. 철저한 테스트를 위해 다른 주파수도 시도해보세요.',
        'privacy' => '이 테스트는 브라우저에서 완전히 실행됩니다. 데이터는 수집되거나 전송되지 않습니다.',
        'trust' => ['소프트웨어 불필요', '모든 밝기', '카메라 방식', '100% 무료'],
        'trust_desc' => [
            '브라우저에서 실행 — 설치 불필요',
            'PWM이 가장 활성화된 50~75% 밝기에서 테스트',
            '가장 신뢰할 수 있는 감지 방법 — 특수 장비 불필요',
            '가입 없음, 다운로드 없음, 제한 없음',
        ],
        'h2_1' => 'PWM 조광이란 무엇이며 왜 눈 피로를 유발하나요?',
        'p_1' => 'PWM(펄스 폭 변조)은 모니터가 백라이트를 빠르게 켜고 끄는 방식으로 밝기를 제어하는 방법입니다. LCD 모니터의 약 30%가 1000Hz 이하의 PWM 조광을 사용합니다. 대안인 DC 조광은 LED 전류를 직접 조정하여 모든 밝기 수준에서 안정적인 빛을 제공합니다.',
        'h2_2' => 'PWM 깜박임 테스트 사용 방법',
        'p_2' => '테스트는 전체화면에서 검정과 흰색을 빠르게 교차하는 캔버스를 사용합니다. 1단계: 밝기를 50~75%로 낮추기. 2단계: 주파수 선택. 3단계: 테스트 시작. 4단계: 스마트폰 카메라를 화면에 향하기. 5단계: 카메라 이미지에서 어두운 가로 줄무늬 확인.',
        'h2_3' => 'PWM 증상: 두통, 눈 피로, 흐릿한 텍스트',
        'p_3' => 'PWM 깜박임에 대한 민감도는 개인차가 큽니다. 편두통이나 광과민성이 있는 분들은 1000Hz 이하 주파수에서 불편함을 더 많이 느낄 수 있습니다.',
        'h2_4' => 'PWM 프리 모니터 찾는 방법',
        'p_4' => 'VESA 또는 제조사의 "Flicker-Free" 인증을 받은 디스플레이를 찾으세요. DC 조광은 스위칭 대신 LED 전류를 조정하여 밝기를 제어하므로 모든 밝기 수준에서 깜박임이 없습니다.',
        'faq_h2' => '자주 묻는 질문',
        'faqs' => [
            ['q' => '어떤 카메라 설정이 가장 좋나요?', 'a' => '스마트폰의 기본 카메라 앱을 사용하세요 (인물 사진 모드 제외). 가능하면 자동 노출을 비활성화하세요.'],
            ['q' => '60Hz에서는 줄무늬가 보이지만 120Hz에서는 안 보여요 — 모니터가 60Hz PWM을 사용한다는 뜻인가요?', 'a' => '네 — 특정 주파수에서 줄무늬가 나타나면 그게 모니터의 PWM 주파수에 해당합니다.'],
            ['q' => '화면이 최대 밝기인데 PWM이 적용되나요?', 'a' => 'PWM은 일반적으로 최대 밝기 이하에서만 활성화됩니다. 100%에서 대부분의 모니터는 연속 DC 조광으로 전환됩니다.'],
            ['q' => '이 도구가 PWM을 자동으로 감지할 수 있나요?', 'a' => '수동 촬영 방식이 가장 신뢰할 수 있습니다. 자동 웹캠 감지는 120fps+ 카메라가 필요합니다.'],
            ['q' => 'PWM이 해롭나요?', 'a' => '대부분의 사람들에게는 아닙니다. 편두통이나 광과민성이 있는 분들은 1000Hz 이하의 PWM 주파수에서 눈 피로를 경험할 수 있습니다.'],
        ],
        'hreflang_self' => 'languages/korean/pwm-flicker-test.php',
        'is_en' => false,
    ],
    'pt' => [
        'dir' => 'portuguese', 'html_lang' => 'pt',
        'title' => 'Teste de Flicker PWM Online — Verificar Retroiluminação do Monitor | KeyboardTester.click',
        'description' => 'Teste de flicker PWM: detecta se seu monitor usa modulação por largura de pulso para atenuar a iluminação, o que causa fadiga ocular. Rápido, no navegador, sem instalação.',
        'keywords' => 'teste flicker PWM, teste retroiluminação monitor, meu monitor tem PWM, teste fadiga visual monitor, monitor sem PWM',
        'h1' => 'Teste de Flicker PWM Online',
        'subtitle' => 'Verifique se o seu monitor usa modulação PWM — uma causa comum de fadiga visual e dores de cabeça',
        'section_kicker' => 'Ferramenta principal',
        'section_h2' => 'Teste de Flicker PWM',
        'section_lede' => 'Selecione uma frequência, ative a tela cheia e filme seu monitor com o celular.',
        'btn_start' => '▶ Iniciar Teste (Tela Cheia)',
        'btn_stop' => '⏹ Parar Teste',
        'btn_reset' => 'Redefinir',
        'hz_sub' => 'Frequência de teste selecionada',
        'preview_label' => 'Pré-visualização — clique em "Iniciar Teste" para tela cheia',
        'how_to' => 'Como testar:',
        'steps' => [
            'Ajuste o brilho do monitor para 50–75% (o PWM fica inativo a 100%).',
            'Selecione uma frequência acima e clique em "Iniciar Teste".',
            'Abra o aplicativo de câmera do celular e aponte para a tela.',
            'Procure <strong>faixas escuras horizontais</strong> movendo-se pela imagem da câmera.',
            'Se ver faixas, toque em "Vejo Faixas". Se não, toque em "Sem Faixas".',
        ],
        'btn_yes_banding' => '⚠ Vejo Faixas',
        'btn_no_banding' => '✓ Sem Faixas',
        'result_detected_badge' => '⚠ PWM Provável a {hz} Hz',
        'result_detected_sub' => 'Seu monitor parece usar modulação PWM em ou próximo de {hz} Hz. Considere mudar para um monitor sem flicker (DC dimming) para reduzir a fadiga visual.',
        'result_not_detected_badge' => '✓ Sem PWM a {hz} Hz',
        'result_not_detected_sub' => 'Nenhuma faixa visível a {hz} Hz. Tente outras frequências para um teste completo. Se nenhuma frequência mostrar faixas, seu monitor provavelmente é livre de flicker.',
        'privacy' => 'Este teste é executado inteiramente no seu navegador. Nenhum dado é coletado ou transmitido.',
        'trust' => ['Sem Software', 'Qualquer Brilho', 'Método Câmera', '100% Gratuito'],
        'trust_desc' => [
            'Funciona no seu navegador — nada para instalar',
            'Teste a 50–75% de brilho onde o PWM é mais ativo',
            'Método de detecção mais confiável — sem equipamento especial',
            'Sem cadastro, sem download, sem limites',
        ],
        'h2_1' => 'O que é Modulação PWM e Por que Causa Fadiga Visual?',
        'p_1' => 'PWM (Modulação por Largura de Pulso) é um método que os monitores usam para controlar o brilho ligando e desligando rapidamente a retroiluminação. Cerca de 30% dos monitores LCD usam modulação PWM abaixo de 1000 Hz. A alternativa — o DC dimming — reduz a corrente real para os LEDs, produzindo uma luz estável sem flicker.',
        'h2_2' => 'Como Usar Este Teste de Flicker PWM',
        'p_2' => 'O teste usa uma tela cheia que alterna rapidamente entre preto e branco. Passo 1: Reduza o brilho para 50–75%. Passo 2: Selecione uma frequência. Passo 3: Inicie o teste. Passo 4: Aponte a câmera para o monitor. Passo 5: Procure faixas horizontais escuras na imagem.',
        'h2_3' => 'Sintomas de PWM: Dores de Cabeça, Fadiga Visual e Texto Borrado',
        'p_3' => 'A sensibilidade ao flicker PWM varia significativamente entre indivíduos. Pessoas com histórico de enxaquecas ou fotossensibilidade têm maior probabilidade de sentir desconforto com frequências abaixo de 1000 Hz.',
        'h2_4' => 'Como Encontrar um Monitor Sem PWM',
        'p_4' => 'Procure monitores certificados como "Flicker-Free" pela VESA ou pelo fabricante. O DC dimming é o padrão ouro — controla o brilho ajustando a corrente do LED em vez de chavear.',
        'faq_h2' => 'Perguntas Frequentes',
        'faqs' => [
            ['q' => 'Quais configurações de câmera funcionam melhor?', 'a' => 'Use o aplicativo de câmera padrão do seu celular (não o modo retrato). Desative a exposição automática se possível.'],
            ['q' => 'Vejo faixas a 60Hz mas não a 120Hz — isso significa que meu monitor usa PWM a 60Hz?', 'a' => 'Sim — se aparecerem faixas a uma frequência específica, isso corresponde à frequência PWM do seu monitor.'],
            ['q' => 'Minha tela está no brilho máximo — o PWM ainda se aplica?', 'a' => 'O PWM geralmente só fica ativo abaixo do brilho máximo. A 100% a maioria dos monitores muda para DC dimming contínuo.'],
            ['q' => 'Esta ferramenta pode detectar PWM automaticamente?', 'a' => 'O método de filmagem manual é o mais confiável. A detecção automática por webcam requer uma câmera capaz de 120fps+.'],
            ['q' => 'O PWM é prejudicial?', 'a' => 'Para a maioria das pessoas não. Indivíduos sensíveis — propensos a enxaquecas — podem experimentar fadiga visual com frequências PWM abaixo de 1000Hz.'],
        ],
        'hreflang_self' => 'languages/portuguese/pwm-flicker-test.php',
        'is_en' => false,
    ],
    'ru' => [
        'dir' => 'russian', 'html_lang' => 'ru',
        'title' => 'Тест ШИМ-мерцания Монитора Онлайн — Проверить Подсветку | KeyboardTester.click',
        'description' => 'Тест мерцания PWM: определяет, использует ли монитор широтно-импульсную модуляцию для регулировки подсветки, вызывающую усталость глаз. Быстро, в браузере, без установки.',
        'keywords' => 'тест ШИМ мерцания, тест мерцания монитора, есть ли ШИМ в моём мониторе, тест усталости глаз монитор, монитор без ШИМ',
        'h1' => 'Тест ШИМ-мерцания Онлайн',
        'subtitle' => 'Проверьте, использует ли ваш монитор ШИМ-регулировку подсветки — распространённую причину усталости глаз',
        'section_kicker' => 'Основной инструмент',
        'section_h2' => 'Тест ШИМ-мерцания',
        'section_lede' => 'Выберите частоту, перейдите в полноэкранный режим, затем снимите экран телефоном.',
        'btn_start' => '▶ Начать тест (полный экран)',
        'btn_stop' => '⏹ Остановить тест',
        'btn_reset' => 'Сбросить',
        'hz_sub' => 'Выбранная тестовая частота',
        'preview_label' => 'Предпросмотр — нажмите "Начать тест" для полного экрана',
        'how_to' => 'Как тестировать:',
        'steps' => [
            'Установите яркость монитора 50–75% (ШИМ неактивен при 100%).',
            'Выберите частоту выше и нажмите "Начать тест мерцания".',
            'Откройте камеру телефона и направьте её на экран.',
            'Ищите <strong>тёмные горизонтальные полосы</strong>, движущиеся по изображению.',
            'Если видите полосы, нажмите "Вижу полосы". Если нет — "Нет полос".',
        ],
        'btn_yes_banding' => '⚠ Вижу полосы',
        'btn_no_banding' => '✓ Нет полос',
        'result_detected_badge' => '⚠ ШИМ, вероятно, обнаружен на {hz} Гц',
        'result_detected_sub' => 'Похоже, ваш монитор использует ШИМ-подсветку на частоте около {hz} Гц. Рассмотрите переход на монитор без мерцания (DC-диммер) для снижения нагрузки на глаза.',
        'result_not_detected_badge' => '✓ ШИМ не обнаружен на {hz} Гц',
        'result_not_detected_sub' => 'Полосы не видны на {hz} Гц. Попробуйте другие частоты для полноты теста. Если ни одна частота не показывает полос, монитор, скорее всего, без мерцания.',
        'privacy' => 'Этот тест работает полностью в вашем браузере. Никакие данные не собираются и не передаются.',
        'trust' => ['Без ПО', 'Любая яркость', 'Метод камеры', '100% Бесплатно'],
        'trust_desc' => [
            'Работает в браузере — ничего устанавливать не нужно',
            'Тестируйте при 50–75% яркости, где ШИМ наиболее активен',
            'Самый надёжный метод обнаружения — специального оборудования не нужно',
            'Без регистрации, без загрузки, без ограничений',
        ],
        'h2_1' => 'Что такое ШИМ-регулировка и почему она вызывает усталость глаз?',
        'p_1' => 'ШИМ (широтно-импульсная модуляция) — это метод управления яркостью монитора путём быстрого включения и выключения подсветки. Около 30% ЖК-мониторов используют ШИМ ниже 1000 Гц. Альтернатива — DC-диммер — снижает фактический ток через LED-подсветку, обеспечивая стабильный свет без мерцания.',
        'h2_2' => 'Как пользоваться этим тестом ШИМ-мерцания',
        'p_2' => 'Тест использует полноэкранный холст, быстро чередующий чёрный и белый цвета. Шаг 1: уменьшите яркость до 50–75%. Шаг 2: выберите частоту. Шаг 3: запустите тест. Шаг 4: направьте камеру телефона на монитор. Шаг 5: ищите тёмные горизонтальные полосы.',
        'h2_3' => 'Симптомы ШИМ: головная боль, усталость глаз и размытый текст',
        'p_3' => 'Чувствительность к ШИМ-мерцанию значительно варьируется. Люди с мигренью или светочувствительностью чаще испытывают дискомфорт при частотах ниже 1000 Гц.',
        'h2_4' => 'Как найти монитор без ШИМ',
        'p_4' => 'Ищите мониторы с сертификацией "Flicker-Free" от VESA или производителя. DC-диммер — золотой стандарт: управляет яркостью, регулируя ток LED, а не переключая его.',
        'faq_h2' => 'Часто задаваемые вопросы',
        'faqs' => [
            ['q' => 'Какие настройки камеры работают лучше всего?', 'a' => 'Используйте стандартное приложение камеры телефона (не портретный режим). Отключите автоэкспозицию, если возможно.'],
            ['q' => 'Вижу полосы на 60 Гц, но не на 120 Гц — значит, монитор использует ШИМ на 60 Гц?', 'a' => 'Да — если полосы появляются на определённой частоте, это соответствует частоте ШИМ вашего монитора.'],
            ['q' => 'Экран на максимальной яркости — ШИМ всё ещё применяется?', 'a' => 'ШИМ обычно активен только при яркости ниже максимальной. При 100% большинство мониторов переходят на непрерывный DC-диммер.'],
            ['q' => 'Может ли инструмент обнаруживать ШИМ автоматически?', 'a' => 'Ручной метод съёмки наиболее надёжен. Автоматическое обнаружение через веб-камеру требует камеры 120fps+.'],
            ['q' => 'ШИМ вреден?', 'a' => 'Для большинства людей — нет. Чувствительные люди, склонные к мигрени, могут испытывать усталость глаз при частотах ШИМ ниже 1000 Гц.'],
        ],
        'hreflang_self' => 'languages/russian/pwm-flicker-test.php',
        'is_en' => false,
    ],
];

$d      = $langData[$lang] ?? $langData['en'];
$isRtl  = ($lang === 'ar');

$allLangs = [
    'en' => 'pwm-flicker-test.php',
    'es' => 'languages/spanish/pwm-flicker-test.php',
    'ar' => 'languages/arabic/pwm-flicker-test.php',
    'fr' => 'languages/french/pwm-flicker-test.php',
    'de' => 'languages/german/pwm-flicker-test.php',
    'ja' => 'languages/japanese/pwm-flicker-test.php',
    'ko' => 'languages/korean/pwm-flicker-test.php',
    'pt' => 'languages/portuguese/pwm-flicker-test.php',
    'ru' => 'languages/russian/pwm-flicker-test.php',
];

// JS strings
$jsBtnStart            = json_encode($d['btn_start']);
$jsBtnStop             = json_encode($d['btn_stop']);
$jsYesBanding          = json_encode($d['btn_yes_banding']);
$jsNoBanding           = json_encode($d['btn_no_banding']);
$jsResultDetBadge      = json_encode($d['result_detected_badge']);
$jsResultDetSub        = json_encode($d['result_detected_sub']);
$jsResultNoBadge       = json_encode($d['result_not_detected_badge']);
$jsResultNoSub         = json_encode($d['result_not_detected_sub']);
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
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('pwm-flicker-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"WebApplication","name":<?php echo json_encode($d['h1']); ?>,"url":"<?php echo absoluteUrl($d['hreflang_self']); ?>","description":<?php echo json_encode($d['description']); ?>,"applicationCategory":"UtilityApplication","operatingSystem":"Any","isAccessibleForFree":true,"featureList":["5 selectable flicker frequencies (60–960Hz)","Fullscreen canvas flicker test","Phone camera filming method","Banding detection guide","PWM result badge"]}
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
    .pwm-tool{max-width:720px;margin:0 auto;padding:2rem 1.5rem 2.5rem;text-align:center}
    .pwm-tool h1{font-size:clamp(1.6rem,4vw,2.4rem);font-weight:700;margin-bottom:.4rem;color:var(--heading-color,#1e293b)}
    .pwm-tool .tool-subtitle{font-size:1rem;color:var(--text-muted,#475569);margin-bottom:1.75rem}
    .freq-selector{display:flex;justify-content:center;flex-wrap:wrap;gap:.5rem;margin-bottom:1.5rem}
    .freq-btn{padding:.55rem 1.1rem;min-height:44px;border:2px solid var(--border-color,#e2e8f0);border-radius:6px;background:transparent;color:var(--text-muted,#475569);font-family:'JetBrains Mono',monospace;font-size:.9rem;font-weight:600;cursor:pointer;transition:border-color .15s,color .15s,background .15s}
    .freq-btn:hover{border-color:var(--primary-color,#4b5eaa);color:var(--primary-color,#4b5eaa)}
    .freq-btn.active{border-color:var(--primary-color,#4b5eaa);background:var(--primary-color,#4b5eaa);color:#fff}
    .pwm-start-btn{display:inline-flex;align-items:center;gap:.5rem;padding:.75rem 2.25rem;min-height:48px;border:none;border-radius:10px;background:var(--primary-color,#4b5eaa);color:#fff;font-family:inherit;font-size:1rem;font-weight:700;cursor:pointer;transition:opacity .15s,transform .1s;margin-bottom:1.25rem}
    .pwm-start-btn:hover{opacity:.88;transform:translateY(-1px)}
    .pwm-start-btn.running{background:#dc2626}
    .pwm-preview-wrap{border:2px dashed var(--border-color,#e2e8f0);border-radius:12px;overflow:hidden;margin-bottom:1.25rem;position:relative;background:#000;height:180px}
    .pwm-preview-wrap canvas{display:block;width:100%;height:100%}
    .pwm-preview-label{position:absolute;bottom:8px;left:0;right:0;text-align:center;font-size:.8rem;color:rgba(255,255,255,.6);pointer-events:none}
    .pwm-instructions{background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:1rem 1.25rem;text-align:<?php echo $isRtl ? 'right' : 'left'; ?>;margin-bottom:1.25rem;font-size:.9rem;color:var(--text-color,#1e293b)}
    .pwm-instructions ol{margin:.5rem 0 0;padding-<?php echo $isRtl ? 'right' : 'left'; ?>:1.25rem;color:var(--text-color,#1e293b)}
    .pwm-instructions li{margin-bottom:.4rem}
    .pwm-hz-display{font-size:clamp(2.5rem,8vw,4rem);font-weight:700;font-family:'JetBrains Mono',monospace;color:var(--primary-color,#4b5eaa);line-height:1;margin-bottom:.25rem}
    .pwm-hz-sub{font-size:.9rem;color:var(--text-muted,#475569);margin-bottom:1.5rem}
    .pwm-result{display:none;border-radius:12px;padding:1.25rem;margin-bottom:1.5rem}
    .pwm-result.visible{display:block}
    .pwm-result.detected{background:rgba(239,68,68,.08);border:1px solid rgba(239,68,68,.3)}
    .pwm-result.not-detected{background:rgba(34,197,94,.08);border:1px solid rgba(34,197,94,.3)}
    .pwm-result-badge{font-size:1.1rem;font-weight:700;margin-bottom:.4rem}
    .pwm-result.detected .pwm-result-badge{color:#dc2626}
    .pwm-result.not-detected .pwm-result-badge{color:#16a34a}
    .pwm-result-sub{font-size:.9rem;color:var(--text-color,#1e293b)}
    .pwm-feedback{display:none;gap:.75rem;justify-content:center;flex-wrap:wrap;margin-bottom:1.25rem}
    .pwm-feedback.visible{display:flex}
    .pwm-feedback-btn{padding:.6rem 1.5rem;min-height:44px;border:2px solid var(--border-color,#e2e8f0);border-radius:8px;background:transparent;font-family:inherit;font-size:.9rem;font-weight:600;cursor:pointer;transition:border-color .15s,background .15s,color .15s;color:var(--text-color,#1e293b)}
    .pwm-feedback-btn.banding-yes{border-color:#dc2626;color:#dc2626}
    .pwm-feedback-btn.banding-no{border-color:#16a34a;color:#16a34a}
    .reset-btn{padding:.55rem 1.5rem;min-height:44px;border:1px solid var(--border-color,#e2e8f0);border-radius:8px;background:transparent;color:var(--text-muted,#475569);font-family:inherit;font-size:.9rem;font-weight:600;cursor:pointer;transition:border-color .15s,color .15s;margin-<?php echo $isRtl ? 'right' : 'left'; ?>:.5rem}
    .reset-btn:hover{border-color:var(--primary-color,#4b5eaa);color:var(--primary-color,#4b5eaa)}
    .privacy-note{font-size:.8rem;color:var(--text-muted,#475569);margin-top:.75rem}
    .pov-wrap{display:flex;justify-content:center;margin-bottom:1.25rem}
    .pov-wrap canvas{border-radius:50%;border:2px solid var(--border-color,#e2e8f0)}
    #pwm-fullscreen-canvas{display:none;position:fixed;inset:0;z-index:99999;cursor:pointer}
    @media(max-width:768px){.pwm-tool{padding:1.25rem 1rem 2rem}.freq-selector{gap:.4rem}}
  </style>
</head>
<body class="landing-page">
  <?php if ($d['is_en']): ?>
    <?php include __DIR__ . '/../../header.php'; ?>
  <?php else: ?>
    <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/header-' . $lang . '.php'; ?>
  <?php endif; ?>
  <main id="main-content" class="landing-main">

    <section class="tool-stage" aria-labelledby="pwm-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker"><?php echo htmlspecialchars($d['section_kicker']); ?></p>
          <h2 id="pwm-tool-title"><?php echo htmlspecialchars($d['section_h2']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['section_lede']); ?></p>
        </div>
      </div>

      <section class="tool-shell">
        <div class="pwm-tool">
          <h1><?php echo htmlspecialchars($d['h1']); ?></h1>
          <p class="tool-subtitle"><?php echo htmlspecialchars($d['subtitle']); ?></p>

          <!-- Frequency selector -->
          <div class="freq-selector" role="group" aria-label="Select test frequency">
            <button class="freq-btn active" data-hz="60"  aria-pressed="true">60 Hz</button>
            <button class="freq-btn" data-hz="120" aria-pressed="false">120 Hz</button>
            <button class="freq-btn" data-hz="240" aria-pressed="false">240 Hz</button>
            <button class="freq-btn" data-hz="480" aria-pressed="false">480 Hz</button>
            <button class="freq-btn" data-hz="960" aria-pressed="false">960 Hz</button>
          </div>

          <div class="pwm-hz-display" id="pwm-hz-display" aria-live="polite">60 Hz</div>
          <div class="pwm-hz-sub"><?php echo htmlspecialchars($d['hz_sub']); ?></div>

          <div class="pwm-preview-wrap" aria-label="Flicker preview">
            <canvas id="pwm-preview-canvas" aria-hidden="true"></canvas>
            <div class="pwm-preview-label"><?php echo htmlspecialchars($d['preview_label']); ?></div>
          </div>

          <div class="pov-wrap" aria-label="Persistence-of-vision color wheel">
            <canvas id="pwm-wheel-canvas" width="140" height="140" aria-hidden="true"></canvas>
          </div>

          <div>
            <button class="pwm-start-btn" id="pwm-start-btn"><?php echo htmlspecialchars($d['btn_start']); ?></button>
            <button class="reset-btn" id="pwm-reset-btn"><?php echo htmlspecialchars($d['btn_reset']); ?></button>
          </div>

          <div class="pwm-instructions">
            <strong><?php echo htmlspecialchars($d['how_to']); ?></strong>
            <ol>
              <?php foreach ($d['steps'] as $step): ?>
              <li><?php echo $step; ?></li>
              <?php endforeach; ?>
            </ol>
          </div>

          <div class="pwm-feedback" id="pwm-feedback" role="group">
            <button class="pwm-feedback-btn" id="pwm-yes-btn"><?php echo htmlspecialchars($d['btn_yes_banding']); ?></button>
            <button class="pwm-feedback-btn" id="pwm-no-btn"><?php echo htmlspecialchars($d['btn_no_banding']); ?></button>
          </div>

          <div class="pwm-result" id="pwm-result" role="status" aria-live="assertive">
            <div class="pwm-result-badge" id="pwm-result-badge"></div>
            <div class="pwm-result-sub" id="pwm-result-sub"></div>
          </div>

          <p class="privacy-note"><?php echo htmlspecialchars($d['privacy']); ?></p>
        </div>
      </section>
    </section>

    <canvas id="pwm-fullscreen-canvas" tabindex="0"></canvas>

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

    <section class="feature-band" aria-labelledby="pwm-h2-1">
      <div class="container">
        <div class="section-head">
          <h2 id="pwm-h2-1"><?php echo htmlspecialchars($d['h2_1']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_1']); ?></p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="pwm-h2-2">
      <div class="container">
        <div class="section-head">
          <h2 id="pwm-h2-2"><?php echo htmlspecialchars($d['h2_2']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_2']); ?></p>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="pwm-h2-3">
      <div class="container">
        <div class="section-head">
          <h2 id="pwm-h2-3"><?php echo htmlspecialchars($d['h2_3']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_3']); ?></p>
        </div>
      </div>
    </section>

    <section class="process-band" aria-labelledby="pwm-h2-4">
      <div class="container">
        <div class="section-head">
          <h2 id="pwm-h2-4"><?php echo htmlspecialchars($d['h2_4']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_4']); ?></p>
        </div>
      </div>
    </section>

    <section class="feature-band" aria-labelledby="pwm-faq">
      <div class="container">
        <div class="section-head">
          <h2 id="pwm-faq"><?php echo htmlspecialchars($d['faq_h2']); ?></h2>
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
    <?php $relatedToolKey = 'screen'; include __DIR__ . '/../../includes/related-tools.php'; ?>

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

      var freqBtns      = document.querySelectorAll('.freq-btn');
      var hzDisplay     = document.getElementById('pwm-hz-display');
      var startBtn      = document.getElementById('pwm-start-btn');
      var resetBtn      = document.getElementById('pwm-reset-btn');
      var feedbackEl    = document.getElementById('pwm-feedback');
      var yesBandingBtn = document.getElementById('pwm-yes-btn');
      var noBandingBtn  = document.getElementById('pwm-no-btn');
      var resultEl      = document.getElementById('pwm-result');
      var resultBadgeEl = document.getElementById('pwm-result-badge');
      var resultSubEl   = document.getElementById('pwm-result-sub');
      var previewCanvas = document.getElementById('pwm-preview-canvas');
      var fsCanvas      = document.getElementById('pwm-fullscreen-canvas');
      var wheelCanvas   = document.getElementById('pwm-wheel-canvas');

      var previewCtx = previewCanvas.getContext('2d');
      var fsCtx      = fsCanvas.getContext('2d');
      var wheelCtx   = wheelCanvas.getContext('2d');

      var btnStartText = <?php echo $jsBtnStart; ?>;
      var btnStopText  = <?php echo $jsBtnStop; ?>;
      var resBadgeDet  = <?php echo $jsResultDetBadge; ?>;
      var resSubDet    = <?php echo $jsResultDetSub; ?>;
      var resBadgeNo   = <?php echo $jsResultNoBadge; ?>;
      var resSubNo     = <?php echo $jsResultNoSub; ?>;

      var selectedHz    = 60;
      var running       = false;
      var rafId         = null;
      var startTime     = 0;
      var feedbackShown = false;
      var wheelAngle    = 0;

      function resizePreview() {
        previewCanvas.width  = previewCanvas.offsetWidth  || 640;
        previewCanvas.height = previewCanvas.offsetHeight || 180;
      }
      resizePreview();
      window.addEventListener('resize', resizePreview);

      freqBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
          if (running) return;
          freqBtns.forEach(function(b) { b.classList.remove('active'); b.setAttribute('aria-pressed','false'); });
          btn.classList.add('active'); btn.setAttribute('aria-pressed','true');
          selectedHz = parseInt(btn.dataset.hz, 10);
          hzDisplay.textContent = selectedHz + ' Hz';
        });
      });

      var segmentColors = ['#ef4444','#f97316','#eab308','#22c55e','#3b82f6','#8b5cf6'];
      var numSegments   = segmentColors.length;
      function drawWheel(angle) {
        var W = wheelCanvas.width, H = wheelCanvas.height;
        var cx = W/2, cy = H/2, r = Math.min(cx,cy) - 4;
        var seg = (Math.PI*2)/numSegments;
        for (var i = 0; i < numSegments; i++) {
          wheelCtx.beginPath(); wheelCtx.moveTo(cx,cy);
          wheelCtx.arc(cx,cy,r,angle+i*seg,angle+(i+1)*seg);
          wheelCtx.closePath(); wheelCtx.fillStyle = segmentColors[i]; wheelCtx.fill();
        }
      }
      drawWheel(0);

      var isBlack = true, frameCount = 0, framePeriod = 1;
      function computeFramePeriod(hz) { return Math.max(1, Math.round(30/hz)); }

      function loop(ts) {
        if (!running) return;
        rafId = requestAnimationFrame(loop);
        frameCount++;
        if (frameCount % framePeriod === 0) { isBlack = !isBlack; }
        var W = previewCanvas.width, H = previewCanvas.height;
        previewCtx.fillStyle = isBlack ? '#000' : '#fff';
        previewCtx.fillRect(0,0,W,H);
        if (document.fullscreenElement === fsCanvas || document.webkitFullscreenElement === fsCanvas) {
          fsCanvas.width  = window.screen.width;
          fsCanvas.height = window.screen.height;
          fsCtx.fillStyle = isBlack ? '#000' : '#fff';
          fsCtx.fillRect(0,0,fsCanvas.width,fsCanvas.height);
        }
        wheelAngle += 0.04; drawWheel(wheelAngle);
        if (!feedbackShown && (ts - startTime) > 3000) {
          feedbackShown = true; feedbackEl.classList.add('visible');
        }
      }

      function startTest() {
        running = true; frameCount = 0; feedbackShown = false;
        framePeriod = computeFramePeriod(selectedHz);
        startTime   = performance.now();
        startBtn.textContent = btnStopText; startBtn.classList.add('running');
        resultEl.classList.remove('visible','detected','not-detected');
        feedbackEl.classList.remove('visible');
        yesBandingBtn.classList.remove('banding-yes'); noBandingBtn.classList.remove('banding-no');
        fsCanvas.style.display = 'block';
        if (fsCanvas.requestFullscreen) {
          fsCanvas.requestFullscreen().catch(function(){});
        } else if (fsCanvas.webkitRequestFullscreen) {
          fsCanvas.webkitRequestFullscreen();
        }
        rafId = requestAnimationFrame(loop);
      }

      function stopTest() {
        running = false;
        if (rafId) { cancelAnimationFrame(rafId); rafId = null; }
        startBtn.textContent = btnStartText; startBtn.classList.remove('running');
        if (document.fullscreenElement || document.webkitFullscreenElement) {
          if (document.exitFullscreen) document.exitFullscreen();
          else if (document.webkitExitFullscreen) document.webkitExitFullscreen();
        }
        fsCanvas.style.display = 'none';
        previewCtx.fillStyle = '#000';
        previewCtx.fillRect(0,0,previewCanvas.width,previewCanvas.height);
      }

      startBtn.addEventListener('click', function() { running ? stopTest() : startTest(); });
      fsCanvas.addEventListener('click', function() { stopTest(); });
      document.addEventListener('keydown', function(e) { if (e.key==='Escape' && running) stopTest(); });
      document.addEventListener('fullscreenchange', function() { if (!document.fullscreenElement && running) stopTest(); });
      document.addEventListener('webkitfullscreenchange', function() { if (!document.webkitFullscreenElement && running) stopTest(); });

      function showResult(bandingDetected) {
        var badge = bandingDetected ? resBadgeDet : resBadgeNo;
        var sub   = bandingDetected ? resSubDet   : resSubNo;
        resultBadgeEl.textContent = badge.replace('{hz}', selectedHz);
        resultSubEl.textContent   = sub.replace(/\{hz\}/g, selectedHz);
        resultEl.classList.add('visible', bandingDetected ? 'detected' : 'not-detected');
        resultEl.classList.remove(bandingDetected ? 'not-detected' : 'detected');
      }

      yesBandingBtn.addEventListener('click', function() {
        yesBandingBtn.classList.add('banding-yes'); noBandingBtn.classList.remove('banding-no');
        showResult(true); stopTest();
      });
      noBandingBtn.addEventListener('click', function() {
        noBandingBtn.classList.add('banding-no'); yesBandingBtn.classList.remove('banding-yes');
        showResult(false); stopTest();
      });

      resetBtn.addEventListener('click', function() {
        stopTest();
        resultEl.classList.remove('visible','detected','not-detected');
        feedbackEl.classList.remove('visible');
        yesBandingBtn.classList.remove('banding-yes'); noBandingBtn.classList.remove('banding-no');
        resultBadgeEl.textContent = ''; resultSubEl.textContent = '';
        wheelAngle = 0; drawWheel(0);
      });

    }, 0); });
  });
  </script>
</body>
</html>
