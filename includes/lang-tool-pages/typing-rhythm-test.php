<?php
/**
 * Localized Typing Rhythm Fingerprint Test renderer
 * Included by language wrapper pages. Expects: $lang (e.g. 'es')
 */

$langData = [
    'en' => [
        'dir' => '', 'html_lang' => 'en',
        'title' => 'Free Typing Rhythm Fingerprint Test — Consistency & Bigram Heatmap Online | KeyboardTester.click',
        'description' => 'Free typing rhythm test online. Measure keystroke dwell time, flight time, and get a bigram heatmap showing your fastest and slowest key transitions. No download needed.',
        'keywords' => 'typing rhythm test, typing fingerprint test, typing consistency test, keystroke dynamics test, bigram timing heatmap',
        'h1' => 'Typing Rhythm Fingerprint Test',
        'subtitle' => 'Type the passage — your dwell times, flight times, and bigram heatmap appear as you type',
        'instruction' => 'Type the passage below to measure your rhythm',
        'input_placeholder' => 'Click here and start typing the passage above…',
        'label_chars' => 'Chars typed',
        'label_dwell' => 'Avg Dwell (ms)',
        'label_flight' => 'Avg Flight (ms)',
        'label_consistency' => 'Consistency',
        'heatmap_label' => 'Bigram transition heatmap (cool = fast, warm = slow)',
        'results_title' => 'Rhythm Fingerprint Results',
        'label_rhythm_score' => 'Rhythm Consistency Score',
        'label_avg_dwell' => 'Avg Dwell Time',
        'label_avg_flight' => 'Avg Flight Time',
        'label_fastest' => 'Fastest Bigram',
        'label_slowest' => 'Slowest Bigram',
        'label_rating' => 'Rating',
        'rating_excellent' => 'Expert',
        'rating_good' => 'Proficient',
        'rating_avg' => 'Average',
        'rating_developing' => 'Developing',
        'btn_reset' => 'Reset',
        'privacy' => 'This test runs entirely in your browser. No data is collected.',
        'trust' => ['Bigram heatmap', 'Consistency score', 'Dwell & flight times', 'Browser only'],
        'trust_desc' => ['See which key pairs you type fast and which you hesitate on', 'Quantified rhythm uniformity on a 0–100 scale', 'Millisecond precision for every keystroke transition', 'No server, no keystroke logging — fully private'],
        'h2_what' => 'What Is Typing Rhythm?',
        'p_what' => 'Typing rhythm refers to the temporal pattern of your keystrokes — how long you hold each key (dwell time) and how quickly you move to the next (flight time). Expert typists develop a consistent, almost musical rhythm that lets them type faster with fewer errors.',
        'h2_vs_wpm' => 'How Rhythm Differs from WPM',
        'p_vs_wpm' => 'WPM measures raw throughput — how much text you produce. Rhythm consistency measures how uniform your timing is regardless of speed. Two typists can both achieve 80 WPM, but the one with higher rhythm consistency makes fewer typos and sustains speed for longer.',
        'h2_fingerprint' => 'What Your Rhythm Fingerprint Reveals',
        'p_fingerprint' => 'The bigram heatmap is your personal typing fingerprint. Warm cells (red/orange) show transitions where you consistently slow down. Cool cells (blue/green) show well-practiced pairs your fingers navigate without conscious effort.',
        'h2_improve' => 'How to Improve Typing Consistency',
        'p_improve' => 'Slow down first: type at 60–70% of your top speed while maintaining an even beat. Drill your weak bigrams — copy them in isolation, repeating each pair 50 times per session. Consistency gains typically show in the heatmap within 5–10 practice sessions.',
        'faq_h2' => 'Frequently Asked Questions',
        'faqs' => [
            ['q' => 'Is my keystroke data sent to any server?', 'a' => 'No. All timing measurements happen entirely in JavaScript in your browser tab. Nothing is stored locally or transmitted to any server.'],
            ['q' => 'What score is considered good?', 'a' => '70+ is good for everyday typists, 80+ is strong, and 90+ is expert level. Beginners typically score 40–60.'],
            ['q' => 'How many characters do I need to type to see results?', 'a' => 'Results appear after 30+ characters. Full results and heatmap appear after completing the entire passage (~150 characters).'],
            ['q' => 'What is a bigram?', 'a' => 'A bigram is any pair of consecutive keys — for example "th", "he", "in". The heatmap visualises how quickly you transition between common bigrams.'],
            ['q' => 'What is flight time in typing?', 'a' => 'Flight time is the interval between releasing one key and pressing the next. Short, consistent flight times indicate smooth, practiced typing.'],
        ],
        'hreflang_self' => 'typing-rhythm-test.php',
        'is_en' => true,
    ],
    'es' => [
        'dir' => 'spanish', 'html_lang' => 'es',
        'title' => 'Test de Ritmo de Escritura — Heatmap de Bígramas y Consistencia | KeyboardTester.click',
        'description' => 'Huella digital de ritmo de tecleo: visualiza los patrones de tiempo entre pulsaciones y obtiene una puntuación de consistencia. Análisis vivo en navegador, sin registro.',
        'keywords' => 'test ritmo escritura, test huella escritura, test consistencia escritura, bigrama teclado, heatmap tipeo',
        'h1' => 'Test de Ritmo de Escritura',
        'subtitle' => 'Escribe el pasaje — tus tiempos de permanencia, vuelo y heatmap de bígramas aparecen mientras escribes',
        'instruction' => 'Escribe el pasaje a continuación para medir tu ritmo',
        'input_placeholder' => 'Haz clic aquí y empieza a escribir el pasaje de arriba…',
        'label_chars' => 'Caracteres',
        'label_dwell' => 'Perm. prom. (ms)',
        'label_flight' => 'Vuelo prom. (ms)',
        'label_consistency' => 'Consistencia',
        'heatmap_label' => 'Heatmap de bígramas (frío = rápido, cálido = lento)',
        'results_title' => 'Resultados de Ritmo',
        'label_rhythm_score' => 'Puntuación de Consistencia',
        'label_avg_dwell' => 'Tiempo Permanencia Prom.',
        'label_avg_flight' => 'Tiempo Vuelo Prom.',
        'label_fastest' => 'Bígrama Más Rápido',
        'label_slowest' => 'Bígrama Más Lento',
        'label_rating' => 'Calificación',
        'rating_excellent' => 'Experto',
        'rating_good' => 'Competente',
        'rating_avg' => 'Promedio',
        'rating_developing' => 'En Desarrollo',
        'btn_reset' => 'Reiniciar',
        'privacy' => 'Este test corre completamente en tu navegador. No se recopilan datos.',
        'trust' => ['Heatmap de bígramas', 'Puntuación de consistencia', 'Tiempos de permanencia y vuelo', 'Solo en el navegador'],
        'trust_desc' => ['Ver qué pares de teclas escribes rápido y en cuáles dudas', 'Uniformidad de ritmo cuantificada en escala 0–100', 'Precisión en milisegundos para cada transición', 'Sin servidor, sin registro de teclas — totalmente privado'],
        'h2_what' => '¿Qué Es el Ritmo de Escritura?',
        'p_what' => 'El ritmo de escritura se refiere al patrón temporal de tus pulsaciones — cuánto tiempo mantienes cada tecla (tiempo de permanencia) y qué tan rápido pasas a la siguiente (tiempo de vuelo). Los escritores expertos desarrollan un ritmo consistente que les permite escribir más rápido con menos errores.',
        'h2_vs_wpm' => 'Cómo Difiere el Ritmo de las PPM',
        'p_vs_wpm' => 'Las PPM miden el rendimiento bruto — cuánto texto produces. La consistencia del ritmo mide qué tan uniforme es tu sincronización independientemente de la velocidad. Dos escritores pueden lograr 80 PPM, pero el que tiene mayor consistencia comete menos errores.',
        'h2_fingerprint' => 'Qué Revela tu Huella de Ritmo',
        'p_fingerprint' => 'El heatmap de bígramas es tu huella de escritura personal. Las celdas cálidas muestran transiciones donde consistentemente desaceleran. Las celdas frías muestran pares bien practicados que tus dedos navegan sin esfuerzo consciente.',
        'h2_improve' => 'Cómo Mejorar la Consistencia de Escritura',
        'p_improve' => 'Primero reduce la velocidad: escribe al 60–70% de tu velocidad máxima manteniendo un ritmo uniforme. Practica tus bígramas débiles — repite cada par 50 veces por sesión. Las mejoras de consistencia suelen aparecer en el heatmap en 5–10 sesiones.',
        'faq_h2' => 'Preguntas Frecuentes',
        'faqs' => [
            ['q' => '¿Se envían mis pulsaciones a algún servidor?', 'a' => 'No. Todas las mediciones de tiempo ocurren en JavaScript en tu pestaña del navegador. Nada se almacena localmente ni se transmite.'],
            ['q' => '¿Qué puntuación se considera buena?', 'a' => '70+ es bueno para escritores cotidianos, 80+ es fuerte y 90+ es nivel experto. Los principiantes suelen obtener 40–60.'],
            ['q' => '¿Cuántos caracteres necesito escribir para ver resultados?', 'a' => 'Los resultados aparecen después de 30+ caracteres. Los resultados completos aparecen al terminar el pasaje (~150 caracteres).'],
            ['q' => '¿Qué es un bígrama?', 'a' => 'Un bígrama es cualquier par de teclas consecutivas — por ejemplo "th", "he", "in". El heatmap visualiza qué tan rápido transicionas entre bígramas comunes.'],
            ['q' => '¿Qué es el tiempo de vuelo en escritura?', 'a' => 'Es el intervalo entre soltar una tecla y presionar la siguiente. Tiempos cortos y consistentes indican escritura fluida y practicada.'],
        ],
        'hreflang_self' => 'languages/spanish/typing-rhythm-test.php',
        'is_en' => false,
    ],
    'ar' => [
        'dir' => 'arabic', 'html_lang' => 'ar',
        'title' => 'اختبار إيقاع الكتابة — خريطة الثنائيات والاتساق | KeyboardTester.click',
        'description' => 'بصمة إيقاع الكتابة: تصور أنماط التوقيت بين النقرات واحصل على درجة اتساق. تحليل مباشر في المتصفح، بدون تسجيل أو رفع بيانات، مع حماية الخصوصية.',
        'keywords' => 'اختبار إيقاع الكتابة, اتساق الكتابة, خريطة الثنائيات, ديناميكيات ضربات المفاتيح',
        'h1' => 'اختبار إيقاع الكتابة',
        'subtitle' => 'اكتب النص — تظهر أوقات الضغط والتنقل وخريطة الثنائيات الحرارية أثناء الكتابة',
        'instruction' => 'اكتب النص أدناه لقياس إيقاعك',
        'input_placeholder' => 'انقر هنا وابدأ بكتابة النص أعلاه…',
        'label_chars' => 'الأحرف',
        'label_dwell' => 'متوسط الضغط (ms)',
        'label_flight' => 'متوسط التنقل (ms)',
        'label_consistency' => 'الاتساق',
        'heatmap_label' => 'خريطة الثنائيات الحرارية (بارد = سريع، دافئ = بطيء)',
        'results_title' => 'نتائج إيقاع الكتابة',
        'label_rhythm_score' => 'نقاط الاتساق',
        'label_avg_dwell' => 'متوسط وقت الضغط',
        'label_avg_flight' => 'متوسط وقت التنقل',
        'label_fastest' => 'أسرع ثنائي',
        'label_slowest' => 'أبطأ ثنائي',
        'label_rating' => 'التقييم',
        'rating_excellent' => 'خبير',
        'rating_good' => 'متقدم',
        'rating_avg' => 'متوسط',
        'rating_developing' => 'في التطور',
        'btn_reset' => 'إعادة تعيين',
        'privacy' => 'يعمل هذا الاختبار كليًا في متصفحك. لا يتم جمع أي بيانات.',
        'trust' => ['خريطة الثنائيات الحرارية', 'نقاط الاتساق', 'أوقات الضغط والتنقل', 'في المتصفح فقط'],
        'trust_desc' => ['شاهد أزواج المفاتيح التي تكتبها بسرعة وتلك التي تتردد فيها', 'اتساق الإيقاع على مقياس 0–100', 'دقة بالميلي ثانية لكل انتقال', 'بدون خادم، بدون تسجيل — خاص تماماً'],
        'h2_what' => 'ما هو إيقاع الكتابة؟',
        'p_what' => 'يشير إيقاع الكتابة إلى النمط الزمني لضربات المفاتيح — كم تمسك كل مفتاح (وقت الضغط) وكم تنتقل إلى التالي (وقت التنقل). يطور الكتّاب الخبراء إيقاعاً ثابتاً يتيح لهم الكتابة بشكل أسرع مع أخطاء أقل.',
        'h2_vs_wpm' => 'كيف يختلف الإيقاع عن سرعة الكتابة',
        'p_vs_wpm' => 'تقيس سرعة الكتابة الإنتاجية الإجمالية، بينما يقيس اتساق الإيقاع مدى انتظام التوقيت بغض النظر عن السرعة. كاتبان بنفس السرعة قد يختلفان في الاتساق، والأكثر اتساقاً يرتكب أخطاء أقل.',
        'h2_fingerprint' => 'ما تكشفه بصمة إيقاعك',
        'p_fingerprint' => 'الخريطة الحرارية للثنائيات هي بصمتك الشخصية في الكتابة. الخلايا الدافئة تُظهر انتقالات تتباطأ فيها باستمرار، بينما الخلايا الباردة تُظهر الأزواج التي يتنقل فيها أصابعك بسهولة.',
        'h2_improve' => 'كيفية تحسين اتساق الكتابة',
        'p_improve' => 'ابدأ بإبطاء سرعتك: اكتب بنسبة 60–70% من سرعتك القصوى مع الحفاظ على إيقاع منتظم. تدرب على ثنائياتك الضعيفة — كرر كل زوج 50 مرة في كل جلسة. عادةً ما تظهر تحسينات الاتساق في الخريطة خلال 5–10 جلسات.',
        'faq_h2' => 'الأسئلة الشائعة',
        'faqs' => [
            ['q' => 'هل يتم إرسال بيانات ضغطاتي إلى أي خادم؟', 'a' => 'لا. جميع قياسات التوقيت تحدث في JavaScript في تبويبة المتصفح. لا يتم تخزين أي شيء أو إرساله.'],
            ['q' => 'ما النقاط التي تُعدّ جيدة؟', 'a' => '70+ جيد للكتّاب اليوميين، 80+ قوي، و90+ مستوى خبير. المبتدئون يحصلون عادةً على 40–60.'],
            ['q' => 'كم عدد الأحرف التي أحتاج لكتابتها لرؤية النتائج؟', 'a' => 'تظهر النتائج بعد 30+ حرف. تظهر النتائج الكاملة عند إتمام النص الكامل (~150 حرف).'],
            ['q' => 'ما هو الثنائي؟', 'a' => 'الثنائي هو أي زوج من المفاتيح المتتالية — مثل "th"، "he"، "in". تُظهر الخريطة مدى سرعة انتقالك بين الثنائيات الشائعة.'],
            ['q' => 'ما هو وقت التنقل في الكتابة؟', 'a' => 'هو الفاصل بين إطلاق مفتاح والضغط على التالي. أوقات قصيرة ومتسقة تدل على كتابة سلسة ومتدربة.'],
        ],
        'hreflang_self' => 'languages/arabic/typing-rhythm-test.php',
        'is_en' => false,
    ],
    'fr' => [
        'dir' => 'french', 'html_lang' => 'fr',
        'title' => 'Test de Rythme de Frappe — Heatmap de Bigrammes et Cohérence | KeyboardTester.click',
        'description' => 'Empreinte rythmique de frappe : visualisez les motifs de temps entre pressions et obtenez une note de régularité. Analyse en direct dans le navigateur, sans inscription.',
        'keywords' => 'test rythme frappe, empreinte frappe, test cohérence frappe, dynamique touches clavier, heatmap bigrammes',
        'h1' => 'Test de Rythme de Frappe',
        'subtitle' => 'Tapez le passage — vos temps de maintien, de vol et la heatmap de bigrammes apparaissent au fil de la frappe',
        'instruction' => 'Tapez le passage ci-dessous pour mesurer votre rythme',
        'input_placeholder' => 'Cliquez ici et commencez à taper le passage ci-dessus…',
        'label_chars' => 'Caractères',
        'label_dwell' => 'Maintien moy. (ms)',
        'label_flight' => 'Vol moy. (ms)',
        'label_consistency' => 'Cohérence',
        'heatmap_label' => 'Heatmap de bigrammes (froid = rapide, chaud = lent)',
        'results_title' => 'Résultats du Rythme de Frappe',
        'label_rhythm_score' => 'Score de Cohérence de Rythme',
        'label_avg_dwell' => 'Temps de Maintien Moy.',
        'label_avg_flight' => 'Temps de Vol Moy.',
        'label_fastest' => 'Bigramme le Plus Rapide',
        'label_slowest' => 'Bigramme le Plus Lent',
        'label_rating' => 'Évaluation',
        'rating_excellent' => 'Expert',
        'rating_good' => 'Compétent',
        'rating_avg' => 'Moyen',
        'rating_developing' => 'En Développement',
        'btn_reset' => 'Réinitialiser',
        'privacy' => 'Ce test s\'exécute entièrement dans votre navigateur. Aucune donnée n\'est collectée.',
        'trust' => ['Heatmap de bigrammes', 'Score de cohérence', 'Temps de maintien & vol', 'Navigateur uniquement'],
        'trust_desc' => ['Voyez les paires de touches rapides et celles où vous hésitez', 'Uniformité rythmique quantifiée sur 0–100', 'Précision en millisecondes pour chaque transition', 'Aucun serveur, aucun journal de frappe — entièrement privé'],
        'h2_what' => 'Qu\'est-ce que le Rythme de Frappe ?',
        'p_what' => 'Le rythme de frappe désigne le pattern temporel de vos frappes — combien de temps vous maintenez chaque touche (temps de maintien) et à quelle vitesse vous passez à la suivante (temps de vol). Les dactylographes experts développent un rythme régulier qui les aide à taper plus vite avec moins d\'erreurs.',
        'h2_vs_wpm' => 'Comment le Rythme Diffère des MPM',
        'p_vs_wpm' => 'Les MPM mesurent le débit brut. La cohérence rythmique mesure l\'uniformité de votre timing quelle que soit la vitesse. Deux dactylographes à 80 MPM peuvent différer en cohérence, et le plus cohérent fait moins de fautes.',
        'h2_fingerprint' => 'Ce que Révèle Votre Empreinte Rythmique',
        'p_fingerprint' => 'La heatmap de bigrammes est votre empreinte personnelle de frappe. Les cellules chaudes montrent les transitions où vous ralentissez systématiquement. Les cellules froides montrent les paires bien maîtrisées que vos doigts parcourent sans effort.',
        'h2_improve' => 'Comment Améliorer la Cohérence de Frappe',
        'p_improve' => 'Ralentissez d\'abord : tapez à 60–70% de votre vitesse maximale en maintenant un rythme régulier. Entraînez vos bigrammes faibles — répétez chaque paire 50 fois par session. Les gains de cohérence apparaissent généralement dans la heatmap en 5–10 sessions.',
        'faq_h2' => 'Foire Aux Questions',
        'faqs' => [
            ['q' => 'Mes données de frappe sont-elles envoyées à un serveur ?', 'a' => 'Non. Toutes les mesures de timing se font en JavaScript dans votre onglet. Rien n\'est stocké ni transmis.'],
            ['q' => 'Quel score est considéré bon ?', 'a' => '70+ est bon pour les dactylographes quotidiens, 80+ est fort et 90+ est niveau expert. Les débutants obtiennent généralement 40–60.'],
            ['q' => 'Combien de caractères dois-je taper pour voir les résultats ?', 'a' => 'Les résultats apparaissent après 30+ caractères. Les résultats complets apparaissent à la fin du passage (~150 caractères).'],
            ['q' => 'Qu\'est-ce qu\'un bigramme ?', 'a' => 'Un bigramme est toute paire de touches consécutives — par ex. "th", "he", "in". La heatmap visualise votre vitesse de transition.'],
            ['q' => 'Qu\'est-ce que le temps de vol en dactylographie ?', 'a' => 'C\'est l\'intervalle entre le relâchement d\'une touche et l\'appui sur la suivante. Des temps courts et cohérents indiquent une frappe fluide.'],
        ],
        'hreflang_self' => 'languages/french/typing-rhythm-test.php',
        'is_en' => false,
    ],
    'de' => [
        'dir' => 'german', 'html_lang' => 'de',
        'title' => 'Tipp-Rhythmus-Test — Bigramm-Heatmap und Konsistenz online | KeyboardTester.click',
        'description' => 'Tipp-Rhythmus-Fingerabdruck: Visualisiert Zeitmuster zwischen Tastenanschlägen und gibt einen Konsistenz-Score. Live-Analyse im Browser, ohne Registrierung oder Installation.',
        'keywords' => 'Tipp Rhythmus Test, Schreibkonsistenz Test, Bigramm Heatmap, Tastendynamik Test, Fingerabdruck Tippen',
        'h1' => 'Tipp-Rhythmus-Fingerabdruck-Test',
        'subtitle' => 'Tippe den Text — Verweildauer, Flugzeit und Bigramm-Heatmap erscheinen während du tippst',
        'instruction' => 'Tippe den Text unten, um deinen Rhythmus zu messen',
        'input_placeholder' => 'Hier klicken und den Text oben eintippen…',
        'label_chars' => 'Zeichen',
        'label_dwell' => 'Ø Verweildauer (ms)',
        'label_flight' => 'Ø Flugzeit (ms)',
        'label_consistency' => 'Konsistenz',
        'heatmap_label' => 'Bigramm-Heatmap (kalt = schnell, warm = langsam)',
        'results_title' => 'Rhythmus-Fingerabdruck-Ergebnisse',
        'label_rhythm_score' => 'Rhythmus-Konsistenz-Score',
        'label_avg_dwell' => 'Ø Verweildauer',
        'label_avg_flight' => 'Ø Flugzeit',
        'label_fastest' => 'Schnellstes Bigramm',
        'label_slowest' => 'Langsamtes Bigramm',
        'label_rating' => 'Bewertung',
        'rating_excellent' => 'Experte',
        'rating_good' => 'Kompetent',
        'rating_avg' => 'Durchschnittlich',
        'rating_developing' => 'In Entwicklung',
        'btn_reset' => 'Zurücksetzen',
        'privacy' => 'Dieser Test läuft vollständig in Ihrem Browser. Es werden keine Daten erfasst.',
        'trust' => ['Bigramm-Heatmap', 'Konsistenz-Score', 'Verweil- & Flugzeiten', 'Nur im Browser'],
        'trust_desc' => ['Sieh, welche Tastenpaare du schnell tippst und wo du zögerst', 'Rhythmische Gleichmäßigkeit auf einer Skala von 0–100', 'Millisekunden-Präzision für jeden Tasten-Übergang', 'Kein Server, kein Tasten-Logging — vollständig privat'],
        'h2_what' => 'Was Ist Tipp-Rhythmus?',
        'p_what' => 'Tipp-Rhythmus bezeichnet das zeitliche Muster deiner Tastenanschläge — wie lange du jede Taste hältst (Verweildauer) und wie schnell du zur nächsten wechselst (Flugzeit). Experten-Tipper entwickeln einen konsistenten Rhythmus, der schnelleres Tippen mit weniger Fehlern ermöglicht.',
        'h2_vs_wpm' => 'Wie Rhythmus sich von WPM Unterscheidet',
        'p_vs_wpm' => 'WPM misst den Rohdutsatz — wie viel Text du produzierst. Rhythmus-Konsistenz misst die Gleichmäßigkeit deines Timings unabhängig von der Geschwindigkeit. Zwei Tipper mit 80 WPM können unterschiedliche Konsistenz haben; der konsistentere macht weniger Tippfehler.',
        'h2_fingerprint' => 'Was dein Rhythmus-Fingerabdruck Zeigt',
        'p_fingerprint' => 'Die Bigramm-Heatmap ist dein persönlicher Tipp-Fingerabdruck. Warme Zellen zeigen Übergänge, bei denen du durchgehend langsamer wirst. Kühle Zellen zeigen gut geübte Paare, die deine Finger mühelos navigieren.',
        'h2_improve' => 'Wie man die Tipp-Konsistenz Verbessert',
        'p_improve' => 'Zuerst verlangsamen: Tippe mit 60–70% deiner Höchstgeschwindigkeit mit gleichmäßigem Rhythmus. Übe deine schwachen Bigramme — wiederhole jedes Paar 50-mal pro Sitzung. Konsistenzgewinne zeigen sich typischerweise in 5–10 Übungssitzungen in der Heatmap.',
        'faq_h2' => 'Häufig Gestellte Fragen',
        'faqs' => [
            ['q' => 'Werden meine Tastenanschlagdaten an einen Server gesendet?', 'a' => 'Nein. Alle Zeitmessungen erfolgen vollständig in JavaScript in deinem Browser-Tab. Nichts wird gespeichert oder übertragen.'],
            ['q' => 'Welcher Score gilt als gut?', 'a' => '70+ ist gut für alltägliche Tipper, 80+ ist stark und 90+ ist Experten-Niveau. Anfänger erzielen typischerweise 40–60.'],
            ['q' => 'Wie viele Zeichen muss ich tippen, um Ergebnisse zu sehen?', 'a' => 'Ergebnisse erscheinen nach 30+ Zeichen. Vollständige Ergebnisse erscheinen nach dem Abschluss des gesamten Textes (~150 Zeichen).'],
            ['q' => 'Was ist ein Bigramm?', 'a' => 'Ein Bigramm ist jedes Paar aufeinanderfolgender Tasten — z. B. "th", "he", "in". Die Heatmap zeigt, wie schnell du zwischen häufigen Bigrammen wechselst.'],
            ['q' => 'Was ist Flugzeit beim Tippen?', 'a' => 'Flugzeit ist das Intervall zwischen dem Loslassen einer Taste und dem Drücken der nächsten. Kurze, konsistente Flugzeiten zeigen flüssiges, geübtes Tippen.'],
        ],
        'hreflang_self' => 'languages/german/typing-rhythm-test.php',
        'is_en' => false,
    ],
    'ja' => [
        'dir' => 'japanese', 'html_lang' => 'ja',
        'title' => 'タイピングリズムテスト — バイグラムヒートマップと一貫性 | KeyboardTester.click',
        'description' => '無料タイピングリズムテスト。キーの押下時間、フライト時間、バイグラムヒートマップを測定。ダウンロード不要。',
        'keywords' => 'タイピングリズムテスト, タイピング一貫性, バイグラムヒートマップ, キーストローク測定',
        'h1' => 'タイピングリズム指紋テスト',
        'subtitle' => '文章を入力してください — 押下時間・フライト時間・バイグラムヒートマップがリアルタイムで表示されます',
        'instruction' => '下の文章を入力してリズムを測定',
        'input_placeholder' => 'ここをクリックして上の文章を入力してください…',
        'label_chars' => '入力文字数',
        'label_dwell' => '平均押下時間 (ms)',
        'label_flight' => '平均フライト時間 (ms)',
        'label_consistency' => '一貫性',
        'heatmap_label' => 'バイグラムヒートマップ（青=速い、赤=遅い）',
        'results_title' => 'リズム指紋の結果',
        'label_rhythm_score' => 'リズム一貫性スコア',
        'label_avg_dwell' => '平均押下時間',
        'label_avg_flight' => '平均フライト時間',
        'label_fastest' => '最速バイグラム',
        'label_slowest' => '最遅バイグラム',
        'label_rating' => '評価',
        'rating_excellent' => 'エキスパート',
        'rating_good' => '上級者',
        'rating_avg' => '平均',
        'rating_developing' => '練習中',
        'btn_reset' => 'リセット',
        'privacy' => 'このテストはブラウザ内で完全に実行されます。データは収集されません。',
        'trust' => ['バイグラムヒートマップ', '一貫性スコア', '押下・フライト時間', 'ブラウザのみ'],
        'trust_desc' => ['素早いキーペアと躊躇するキーペアを確認', '0〜100スケールでリズムの均一性を定量化', '各キー遷移のミリ秒精度', 'サーバー不要・ログなし — 完全プライベート'],
        'h2_what' => 'タイピングリズムとは？',
        'p_what' => 'タイピングリズムとはキー入力の時間的パターン — 各キーを押し続ける時間（押下時間）と次のキーへ移る速さ（フライト時間）です。熟練したタイパーは一貫したリズムを身に付け、より速く、ミスを少なく入力できます。',
        'h2_vs_wpm' => 'リズムとWPMの違い',
        'p_vs_wpm' => 'WPMは処理量（生産したテキスト量）を測ります。リズム一貫性はスピードに関わらずタイミングの均一性を測ります。同じ80WPMでも一貫性が高い方がミスが少なく、長時間速度を維持できます。',
        'h2_fingerprint' => 'リズム指紋が明かすこと',
        'p_fingerprint' => 'バイグラムヒートマップはあなた個人のタイピング指紋です。暖色セルは一貫して遅くなるキー遷移を示し、寒色セルは無意識に素早く打てる練習済みのペアを示します。',
        'h2_improve' => 'タイピングの一貫性を改善する方法',
        'p_improve' => 'まずは速度を落とし、最高速度の60〜70%で均一なリズムを保って入力しましょう。弱いバイグラムを集中的に練習し、1セッションに各ペアを50回繰り返します。一貫性の改善は通常5〜10回の練習でヒートマップに現れます。',
        'faq_h2' => 'よくある質問',
        'faqs' => [
            ['q' => 'キー入力データはサーバーに送られますか？', 'a' => 'いいえ。すべてのタイミング測定はブラウザのタブ内のJavaScriptで行われます。何もローカルに保存・送信されません。'],
            ['q' => '良いスコアはどれくらいですか？', 'a' => '70以上が日常的なタイパーに良い、80以上は優秀、90以上はエキスパートレベルです。初心者は通常40〜60点です。'],
            ['q' => '結果を見るには何文字入力が必要ですか？', 'a' => '30文字以上で結果が表示されます。文章全体（約150文字）を入力すると完全な結果が表示されます。'],
            ['q' => 'バイグラムとは何ですか？', 'a' => 'バイグラムとは連続する2つのキーのペアです — 例：「th」「he」「in」。ヒートマップは一般的なバイグラムの遷移速度を視覚化します。'],
            ['q' => 'タイピングにおけるフライト時間とは？', 'a' => 'フライト時間はキーを離してから次のキーを押すまでの間隔です。短くて一貫したフライト時間はスムーズな練習されたタイピングを示します。'],
        ],
        'hreflang_self' => 'languages/japanese/typing-rhythm-test.php',
        'is_en' => false,
    ],
    'ko' => [
        'dir' => 'korean', 'html_lang' => 'ko',
        'title' => '타이핑 리듬 테스트 — 바이그램 히트맵과 일관성 측정 | KeyboardTester.click',
        'description' => '무료 타이핑 리듬 테스트. 키 누름 시간, 비행 시간, 바이그램 히트맵을 측정. 다운로드 불필요.',
        'keywords' => '타이핑 리듬 테스트, 타이핑 일관성, 바이그램 히트맵, 키스트로크 측정',
        'h1' => '타이핑 리듬 지문 테스트',
        'subtitle' => '문장을 입력하세요 — 누름 시간, 비행 시간, 바이그램 히트맵이 실시간으로 표시됩니다',
        'instruction' => '아래 문장을 입력하여 리듬을 측정하세요',
        'input_placeholder' => '여기를 클릭하고 위의 문장을 입력하세요…',
        'label_chars' => '입력 문자',
        'label_dwell' => '평균 누름 (ms)',
        'label_flight' => '평균 비행 (ms)',
        'label_consistency' => '일관성',
        'heatmap_label' => '바이그램 히트맵 (파랑=빠름, 빨강=느림)',
        'results_title' => '리듬 지문 결과',
        'label_rhythm_score' => '리듬 일관성 점수',
        'label_avg_dwell' => '평균 누름 시간',
        'label_avg_flight' => '평균 비행 시간',
        'label_fastest' => '가장 빠른 바이그램',
        'label_slowest' => '가장 느린 바이그램',
        'label_rating' => '평가',
        'rating_excellent' => '전문가',
        'rating_good' => '숙련자',
        'rating_avg' => '평균',
        'rating_developing' => '연습 중',
        'btn_reset' => '초기화',
        'privacy' => '이 테스트는 브라우저 내에서 완전히 실행됩니다. 데이터가 수집되지 않습니다.',
        'trust' => ['바이그램 히트맵', '일관성 점수', '누름 & 비행 시간', '브라우저 전용'],
        'trust_desc' => ['빠른 키 쌍과 망설이는 키 쌍 확인', '0–100 척도로 리듬 균일성 정량화', '각 키 전환의 밀리초 정밀도', '서버 없음, 키 기록 없음 — 완전 비공개'],
        'h2_what' => '타이핑 리듬이란?',
        'p_what' => '타이핑 리듬은 키 입력의 시간적 패턴을 말합니다 — 각 키를 누르는 시간(누름 시간)과 다음 키로 이동하는 속도(비행 시간)입니다. 숙련된 타이피스트는 일관된 리듬을 개발하여 더 빠르고 오류가 적게 입력합니다.',
        'h2_vs_wpm' => '리듬이 타자 속도(WPM)와 다른 점',
        'p_vs_wpm' => 'WPM은 처리량을 측정합니다. 리듬 일관성은 속도에 관계없이 타이밍의 균일성을 측정합니다. 같은 80WPM 두 명 중 일관성이 높은 쪽이 오타를 적게 내고 더 오래 속도를 유지합니다.',
        'h2_fingerprint' => '리듬 지문이 드러내는 것',
        'p_fingerprint' => '바이그램 히트맵은 개인 타이핑 지문입니다. 따뜻한 색 셀은 일관되게 느려지는 전환을 보여주고, 차가운 색 셀은 무의식적으로 빠르게 치는 잘 연습된 쌍을 보여줍니다.',
        'h2_improve' => '타이핑 일관성을 향상시키는 방법',
        'p_improve' => '먼저 속도를 줄이세요: 최고 속도의 60–70%로 균일한 박자를 유지하며 입력하세요. 약한 바이그램을 집중 연습하고 세션당 각 쌍을 50번 반복하세요. 일관성 향상은 보통 5–10회 연습 후 히트맵에 나타납니다.',
        'faq_h2' => '자주 묻는 질문',
        'faqs' => [
            ['q' => '내 키 입력 데이터가 서버로 전송되나요?', 'a' => '아니요. 모든 타이밍 측정은 브라우저 탭의 JavaScript에서만 이루어집니다. 아무것도 저장되거나 전송되지 않습니다.'],
            ['q' => '좋은 점수는 얼마인가요?', 'a' => '70 이상이 일반 타이피스트에게 좋고, 80 이상은 우수, 90 이상은 전문가 수준입니다. 초보자는 보통 40–60점입니다.'],
            ['q' => '결과를 보려면 몇 글자를 입력해야 하나요?', 'a' => '30글자 이상 입력하면 결과가 나타납니다. 전체 문장(약 150글자)을 완성하면 전체 결과가 표시됩니다.'],
            ['q' => '바이그램이란 무엇인가요?', 'a' => '바이그램은 연속적인 두 키의 쌍입니다 — 예: "th", "he", "in". 히트맵은 일반적인 바이그램 간 전환 속도를 시각화합니다.'],
            ['q' => '타이핑에서 비행 시간이란?', 'a' => '비행 시간은 한 키를 놓고 다음 키를 누를 때까지의 간격입니다. 짧고 일관된 비행 시간은 유창하고 연습된 타이핑을 나타냅니다.'],
        ],
        'hreflang_self' => 'languages/korean/typing-rhythm-test.php',
        'is_en' => false,
    ],
    'pt' => [
        'dir' => 'portuguese', 'html_lang' => 'pt',
        'title' => 'Teste de Ritmo de Digitação — Heatmap de Bigramas e Consistência | KeyboardTester.click',
        'description' => 'Impressão digital de ritmo de digitação: visualize padrões de tempo entre teclas e receba uma nota de consistência. Análise em tempo real no navegador, sem cadastro.',
        'keywords' => 'teste ritmo digitação, impressão digital digitação, teste consistência digitação, heatmap bigramas, dinâmica teclas',
        'h1' => 'Teste de Ritmo de Digitação',
        'subtitle' => 'Digite a passagem — seus tempos de permanência, voo e heatmap de bigramas aparecem enquanto você digita',
        'instruction' => 'Digite a passagem abaixo para medir seu ritmo',
        'input_placeholder' => 'Clique aqui e comece a digitar a passagem acima…',
        'label_chars' => 'Caracteres',
        'label_dwell' => 'Perm. médio (ms)',
        'label_flight' => 'Voo médio (ms)',
        'label_consistency' => 'Consistência',
        'heatmap_label' => 'Heatmap de bigramas (frio = rápido, quente = lento)',
        'results_title' => 'Resultados do Ritmo de Digitação',
        'label_rhythm_score' => 'Pontuação de Consistência de Ritmo',
        'label_avg_dwell' => 'Tempo Permanência Médio',
        'label_avg_flight' => 'Tempo Voo Médio',
        'label_fastest' => 'Bigrama Mais Rápido',
        'label_slowest' => 'Bigrama Mais Lento',
        'label_rating' => 'Avaliação',
        'rating_excellent' => 'Especialista',
        'rating_good' => 'Proficiente',
        'rating_avg' => 'Médio',
        'rating_developing' => 'Em Desenvolvimento',
        'btn_reset' => 'Reiniciar',
        'privacy' => 'Este teste é executado inteiramente no seu navegador. Nenhum dado é coletado.',
        'trust' => ['Heatmap de bigramas', 'Pontuação de consistência', 'Tempos de permanência & voo', 'Apenas no navegador'],
        'trust_desc' => ['Veja quais pares de teclas você digita rápido e em quais hesita', 'Uniformidade rítmica quantificada em escala 0–100', 'Precisão em milissegundos para cada transição', 'Sem servidor, sem registro de teclas — totalmente privado'],
        'h2_what' => 'O Que É Ritmo de Digitação?',
        'p_what' => 'O ritmo de digitação refere-se ao padrão temporal das suas teclas — quanto tempo você mantém cada tecla (tempo de permanência) e com que rapidez passa para a próxima (tempo de voo). Digitadores especialistas desenvolvem um ritmo consistente que permite digitar mais rápido com menos erros.',
        'h2_vs_wpm' => 'Como o Ritmo Difere das PPM',
        'p_vs_wpm' => 'PPM mede a produção bruta. A consistência rítmica mede a uniformidade do timing independentemente da velocidade. Dois digitadores com 80 PPM podem ter consistências diferentes; o mais consistente comete menos erros.',
        'h2_fingerprint' => 'O Que sua Impressão Digital Rítmica Revela',
        'p_fingerprint' => 'O heatmap de bigramas é sua impressão digital pessoal de digitação. Células quentes mostram transições onde você consistentemente desacelera. Células frias mostram pares bem praticados que seus dedos navegam sem esforço.',
        'h2_improve' => 'Como Melhorar a Consistência de Digitação',
        'p_improve' => 'Comece devagar: digite a 60–70% da sua velocidade máxima mantendo um ritmo uniforme. Pratique seus bigramas fracos — repita cada par 50 vezes por sessão. Ganhos de consistência geralmente aparecem no heatmap em 5–10 sessões.',
        'faq_h2' => 'Perguntas Frequentes',
        'faqs' => [
            ['q' => 'Meus dados de teclas são enviados a algum servidor?', 'a' => 'Não. Todas as medições de timing ocorrem em JavaScript na sua aba do navegador. Nada é armazenado ou transmitido.'],
            ['q' => 'Qual pontuação é considerada boa?', 'a' => '70+ é bom para digitadores cotidianos, 80+ é forte e 90+ é nível especialista. Iniciantes geralmente obtêm 40–60.'],
            ['q' => 'Quantos caracteres preciso digitar para ver resultados?', 'a' => 'Resultados aparecem após 30+ caracteres. Resultados completos aparecem ao terminar a passagem (~150 caracteres).'],
            ['q' => 'O que é um bigrama?', 'a' => 'Um bigrama é qualquer par de teclas consecutivas — por ex. "th", "he", "in". O heatmap visualiza sua velocidade de transição.'],
            ['q' => 'O que é tempo de voo na digitação?', 'a' => 'É o intervalo entre soltar uma tecla e pressionar a próxima. Tempos curtos e consistentes indicam digitação fluida e praticada.'],
        ],
        'hreflang_self' => 'languages/portuguese/typing-rhythm-test.php',
        'is_en' => false,
    ],
    'ru' => [
        'dir' => 'russian', 'html_lang' => 'ru',
        'title' => 'Тест Ритма Набора Текста — Тепловая карта Биграмм и Согласованность | KeyboardTester.click',
        'description' => 'Ритмический отпечаток набора: визуализирует паттерны тайминга между нажатиями и выставляет оценку стабильности. Живой анализ в браузере, без регистрации.',
        'keywords' => 'тест ритм набора, отпечаток печати, согласованность набора, динамика клавиш, тепловая карта биграмм',
        'h1' => 'Тест Ритма Набора Текста',
        'subtitle' => 'Введите текст — время удержания, полёта и тепловая карта биграмм появляются по мере набора',
        'instruction' => 'Введите текст ниже, чтобы измерить свой ритм',
        'input_placeholder' => 'Нажмите здесь и начните вводить текст выше…',
        'label_chars' => 'Символов',
        'label_dwell' => 'Ср. удержание (мс)',
        'label_flight' => 'Ср. полёт (мс)',
        'label_consistency' => 'Согласованность',
        'heatmap_label' => 'Тепловая карта биграмм (холодный = быстро, тёплый = медленно)',
        'results_title' => 'Результаты Ритма Набора',
        'label_rhythm_score' => 'Оценка Согласованности Ритма',
        'label_avg_dwell' => 'Среднее время удержания',
        'label_avg_flight' => 'Среднее время полёта',
        'label_fastest' => 'Самая быстрая биграмма',
        'label_slowest' => 'Самая медленная биграмма',
        'label_rating' => 'Оценка',
        'rating_excellent' => 'Эксперт',
        'rating_good' => 'Опытный',
        'rating_avg' => 'Среднее',
        'rating_developing' => 'Развивающийся',
        'btn_reset' => 'Сброс',
        'privacy' => 'Тест выполняется полностью в вашем браузере. Данные не собираются.',
        'trust' => ['Тепловая карта биграмм', 'Оценка согласованности', 'Время удержания и полёта', 'Только браузер'],
        'trust_desc' => ['Смотри, какие пары клавиш ты нажимаешь быстро и где колеблешься', 'Равномерность ритма по шкале 0–100', 'Точность в миллисекундах для каждого перехода', 'Без сервера, без логирования — полная конфиденциальность'],
        'h2_what' => 'Что Такое Ритм Набора?',
        'p_what' => 'Ритм набора — это временной паттерн ваших нажатий клавиш: как долго вы удерживаете каждую клавишу (время удержания) и как быстро переходите к следующей (время полёта). Опытные пользователи развивают стабильный ритм, позволяющий набирать текст быстрее с меньшим количеством ошибок.',
        'h2_vs_wpm' => 'Чем Ритм Отличается от WPM',
        'p_vs_wpm' => 'WPM измеряет сырую производительность. Согласованность ритма измеряет равномерность тайминга вне зависимости от скорости. Два печатника с 80 WPM могут иметь разную согласованность; более согласованный делает меньше опечаток.',
        'h2_fingerprint' => 'Что Показывает Ваш Ритмический Отпечаток',
        'p_fingerprint' => 'Тепловая карта биграмм — ваш личный отпечаток набора. Тёплые ячейки показывают переходы, где вы постоянно замедляетесь. Холодные ячейки — хорошо отработанные пары, которые пальцы проходят без усилий.',
        'h2_improve' => 'Как Улучшить Согласованность Набора',
        'p_improve' => 'Сначала замедлитесь: набирайте на 60–70% от максимальной скорости, сохраняя ровный ритм. Отрабатывайте слабые биграммы — повторяйте каждую пару 50 раз за сессию. Улучшения согласованности обычно видны на тепловой карте через 5–10 тренировок.',
        'faq_h2' => 'Часто Задаваемые Вопросы',
        'faqs' => [
            ['q' => 'Отправляются ли данные о нажатиях клавиш на сервер?', 'a' => 'Нет. Все измерения времени происходят в JavaScript в вашей вкладке браузера. Ничего не сохраняется и не передаётся.'],
            ['q' => 'Какой балл считается хорошим?', 'a' => '70+ хорошо для повседневных пользователей, 80+ — сильный результат, 90+ — уровень эксперта. Новички обычно получают 40–60.'],
            ['q' => 'Сколько символов нужно ввести для результатов?', 'a' => 'Результаты появляются после 30+ символов. Полные результаты — после завершения всего текста (~150 символов).'],
            ['q' => 'Что такое биграмма?', 'a' => 'Биграмма — любая пара последовательных клавиш — например «th», «he», «in». Тепловая карта показывает скорость вашего перехода.'],
            ['q' => 'Что такое время полёта при наборе?', 'a' => 'Время полёта — интервал между отпусканием одной клавиши и нажатием следующей. Короткое стабильное время полёта говорит о плавном наборе.'],
        ],
        'hreflang_self' => 'languages/russian/typing-rhythm-test.php',
        'is_en' => false,
    ],
];

$d = $langData[$lang] ?? $langData['en'];
$isRtl = ($lang === 'ar');

$PASSAGE = 'The quick brown fox jumps over the lazy dog. Pack my box with five dozen liquor jugs. How quickly daft jumping zebras vex.';

$allLangs = [
    'en' => 'typing-rhythm-test.php',
    'es' => 'languages/spanish/typing-rhythm-test.php',
    'ar' => 'languages/arabic/typing-rhythm-test.php',
    'fr' => 'languages/french/typing-rhythm-test.php',
    'de' => 'languages/german/typing-rhythm-test.php',
    'ja' => 'languages/japanese/typing-rhythm-test.php',
    'ko' => 'languages/korean/typing-rhythm-test.php',
    'pt' => 'languages/portuguese/typing-rhythm-test.php',
    'ru' => 'languages/russian/typing-rhythm-test.php',
];

// JS strings
$jsPassage         = json_encode($PASSAGE);
$jsLabelChars      = json_encode($d['label_chars']);
$jsResultsTitle    = json_encode($d['results_title']);
$jsRatingExcellent = json_encode($d['rating_excellent']);
$jsRatingGood      = json_encode($d['rating_good']);
$jsRatingAvg       = json_encode($d['rating_avg']);
$jsRatingDev       = json_encode($d['rating_developing']);
$jsLabelRhythm     = json_encode($d['label_rhythm_score']);
$jsLabelDwell      = json_encode($d['label_avg_dwell']);
$jsLabelFlight     = json_encode($d['label_avg_flight']);
$jsLabelFastest    = json_encode($d['label_fastest']);
$jsLabelSlowest    = json_encode($d['label_slowest']);
$jsLabelRating     = json_encode($d['label_rating']);
$jsPrivacy         = json_encode($d['privacy']);
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
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('typing-rhythm-test.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
  <script type="application/ld+json">
  {"@context":"https://schema.org","@type":"WebApplication","name":<?php echo json_encode($d['h1']); ?>,"url":"<?php echo absoluteUrl($d['hreflang_self']); ?>","description":<?php echo json_encode($d['description']); ?>,"applicationCategory":"UtilityApplication","operatingSystem":"Any","isAccessibleForFree":true,"featureList":["Keystroke dwell time measurement","Flight time measurement between keys","Bigram heatmap canvas visualization","Rhythm Consistency Score (0-100)","Fastest and slowest transition display"]}
  </script>
  <style>
    .trt-tool{max-width:760px;margin:0 auto;padding:2rem 1.5rem 2.5rem}
    .trt-tool h1{font-size:clamp(1.6rem,4vw,2.4rem);font-weight:700;margin-bottom:.4rem;color:var(--heading-color,#1e293b);text-align:center}
    .trt-tool .tool-subtitle{font-size:1rem;color:var(--text-muted,#475569);margin-bottom:1.5rem;text-align:center}
    .trt-passage{background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:1rem 1.25rem;font-size:1rem;line-height:1.7;color:var(--text-color,#1e293b);margin-bottom:1rem;user-select:none;direction:ltr;text-align:left}
    .trt-passage .typed-char{color:var(--text-muted,#475569)}
    .trt-passage .cursor-char{background:var(--primary-color,#4b5eaa);color:#fff;border-radius:2px}
    .trt-input{width:100%;min-height:48px;border:2px solid var(--border-color,#e2e8f0);border-radius:8px;padding:.75rem 1rem;font-family:inherit;font-size:1rem;background:transparent;color:var(--text-color,#1e293b);outline:none;box-sizing:border-box;transition:border-color .15s;margin-bottom:1rem;direction:ltr}
    .trt-input:focus{border-color:var(--primary-color,#4b5eaa)}
    .trt-progress-bar-wrap{background:var(--card-bg,#e2e8f0);border-radius:4px;height:8px;margin-bottom:1rem;overflow:hidden}
    .trt-progress-bar{height:100%;background:var(--primary-color,#4b5eaa);border-radius:4px;transition:width .1s;width:0%}
    .trt-stats-row{display:flex;gap:1rem;flex-wrap:wrap;margin-bottom:1rem}
    .trt-stat{flex:1;min-width:120px;background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:8px;padding:.75rem .5rem;text-align:center}
    .trt-stat-value{font-size:1.6rem;font-weight:700;font-family:'JetBrains Mono',monospace;color:var(--primary-color,#4b5eaa)}
    .trt-stat-label{font-size:.75rem;color:var(--text-muted,#475569);text-transform:uppercase;letter-spacing:.05em;margin-top:.2rem}
    .trt-canvas-wrap{margin-bottom:1rem}
    .trt-canvas-label{font-size:.8rem;color:var(--text-muted,#475569);margin-bottom:.4rem;text-transform:uppercase;letter-spacing:.04em}
    #trt-canvas{width:100%;border-radius:8px;border:1px solid var(--border-color,#e2e8f0);display:block}
    .trt-results{display:none;background:var(--card-bg,#f8fafc);border:1px solid var(--border-color,#e2e8f0);border-radius:10px;padding:1.25rem;margin-bottom:1rem}
    .trt-results.visible{display:block}
    .trt-results-title{font-size:1.1rem;font-weight:700;color:var(--heading-color,#1e293b);margin-bottom:.75rem}
    .trt-results-row{display:flex;justify-content:space-between;font-size:.9rem;color:var(--text-color,#1e293b);padding:.3rem 0;border-bottom:1px solid var(--border-color,#e2e8f0)}
    .trt-results-row:last-child{border-bottom:none}
    .trt-score-badge{font-size:2rem;font-weight:700;font-family:'JetBrains Mono',monospace;color:var(--primary-color,#4b5eaa);text-align:center;margin-bottom:.5rem}
    .trt-btn{padding:.65rem 1.75rem;border:none;border-radius:8px;background:var(--primary-color,#4b5eaa);color:#fff;font-family:inherit;font-size:1rem;font-weight:600;cursor:pointer;transition:opacity .15s;min-height:44px;margin-<?php echo $isRtl ? 'left' : 'right'; ?>:.5rem}
    .trt-btn:hover{opacity:.88}
    .privacy-note{font-size:.8rem;color:var(--text-muted,#475569);margin-top:1rem}
    @media(max-width:480px){.trt-tool{padding:1.25rem 1rem 2rem}.trt-stats-row{flex-direction:column}}
  </style>
</head>
<body class="landing-page">
  <?php if ($d['is_en']): ?>
    <?php include __DIR__ . '/../../header.php'; ?>
  <?php else: ?>
    <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/header-' . $lang . '.php'; ?>
  <?php endif; ?>
  <main id="main-content" class="landing-main">

    <section class="tool-stage" aria-labelledby="trt-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Primary tool</p>
          <h2 id="trt-title"><?php echo htmlspecialchars($d['h1']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['subtitle']); ?></p>
        </div>
      </div>
      <section class="tool-shell">
        <div class="trt-tool">
          <h1><?php echo htmlspecialchars($d['h1']); ?></h1>
          <p class="tool-subtitle"><?php echo htmlspecialchars($d['subtitle']); ?></p>

          <div class="trt-passage" id="trt-passage" aria-label="<?php echo htmlspecialchars($d['instruction']); ?>" aria-live="polite"></div>

          <input
            type="text"
            id="trt-input"
            class="trt-input"
            placeholder="<?php echo htmlspecialchars($d['input_placeholder']); ?>"
            autocomplete="off"
            autocorrect="off"
            autocapitalize="off"
            spellcheck="false"
            aria-label="<?php echo htmlspecialchars($d['instruction']); ?>"
          >

          <div class="trt-progress-bar-wrap" role="progressbar" aria-valuemin="0" aria-valuemax="100" id="trt-progress-aria" aria-valuenow="0">
            <div class="trt-progress-bar" id="trt-progress"></div>
          </div>

          <div class="trt-stats-row">
            <div class="trt-stat">
              <div class="trt-stat-value" id="trt-chars">0</div>
              <div class="trt-stat-label"><?php echo htmlspecialchars($d['label_chars']); ?></div>
            </div>
            <div class="trt-stat">
              <div class="trt-stat-value" id="trt-avg-dwell">—</div>
              <div class="trt-stat-label"><?php echo htmlspecialchars($d['label_dwell']); ?></div>
            </div>
            <div class="trt-stat">
              <div class="trt-stat-value" id="trt-avg-flight">—</div>
              <div class="trt-stat-label"><?php echo htmlspecialchars($d['label_flight']); ?></div>
            </div>
            <div class="trt-stat">
              <div class="trt-stat-value" id="trt-score">—</div>
              <div class="trt-stat-label"><?php echo htmlspecialchars($d['label_consistency']); ?></div>
            </div>
          </div>

          <div class="trt-canvas-wrap">
            <div class="trt-canvas-label"><?php echo htmlspecialchars($d['heatmap_label']); ?></div>
            <canvas id="trt-canvas" width="700" height="200" aria-label="<?php echo htmlspecialchars($d['heatmap_label']); ?>"></canvas>
          </div>

          <div class="trt-results" id="trt-results" role="status" aria-live="assertive">
            <div class="trt-results-title" id="trt-results-title"><?php echo htmlspecialchars($d['results_title']); ?></div>
            <div class="trt-score-badge" id="trt-final-score">—</div>
            <div class="trt-results-row"><span><?php echo htmlspecialchars($d['label_rhythm_score']); ?></span><span id="trt-r-score"></span></div>
            <div class="trt-results-row"><span><?php echo htmlspecialchars($d['label_avg_dwell']); ?></span><span id="trt-r-dwell"></span></div>
            <div class="trt-results-row"><span><?php echo htmlspecialchars($d['label_avg_flight']); ?></span><span id="trt-r-flight"></span></div>
            <div class="trt-results-row"><span><?php echo htmlspecialchars($d['label_fastest']); ?></span><span id="trt-r-fastest"></span></div>
            <div class="trt-results-row"><span><?php echo htmlspecialchars($d['label_slowest']); ?></span><span id="trt-r-slowest"></span></div>
            <div class="trt-results-row"><span><?php echo htmlspecialchars($d['label_rating']); ?></span><span id="trt-r-rating" style="font-weight:700;"></span></div>
          </div>

          <div style="margin-bottom:.5rem;">
            <button class="trt-btn" id="trt-reset"><?php echo htmlspecialchars($d['btn_reset']); ?></button>
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
          <h2><?php echo htmlspecialchars($d['h2_vs_wpm']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_vs_wpm']); ?></p>
        </div>
      </div>
    </section>

    <section class="feature-band">
      <div class="container">
        <div class="section-head">
          <h2><?php echo htmlspecialchars($d['h2_fingerprint']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_fingerprint']); ?></p>
        </div>
      </div>
    </section>

    <section class="process-band">
      <div class="container">
        <div class="section-head">
          <h2><?php echo htmlspecialchars($d['h2_improve']); ?></h2>
          <p class="section-lede"><?php echo htmlspecialchars($d['p_improve']); ?></p>
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

    var PASSAGE     = <?php echo $jsPassage; ?>;
    var HOME_KEYS   = 'asdfghjklqwertyuiopzxcvbnm';

    var ratingExcellent = <?php echo $jsRatingExcellent; ?>;
    var ratingGood      = <?php echo $jsRatingGood; ?>;
    var ratingAvg       = <?php echo $jsRatingAvg; ?>;
    var ratingDev       = <?php echo $jsRatingDev; ?>;

    var passageEl    = document.getElementById('trt-passage');
    var inputEl      = document.getElementById('trt-input');
    var progressEl   = document.getElementById('trt-progress');
    var progressAria = document.getElementById('trt-progress-aria');
    var charsEl      = document.getElementById('trt-chars');
    var dwellEl      = document.getElementById('trt-avg-dwell');
    var flightEl     = document.getElementById('trt-avg-flight');
    var scoreEl      = document.getElementById('trt-score');
    var resultsEl    = document.getElementById('trt-results');
    var finalScore   = document.getElementById('trt-final-score');
    var rScore       = document.getElementById('trt-r-score');
    var rDwell       = document.getElementById('trt-r-dwell');
    var rFlight      = document.getElementById('trt-r-flight');
    var rFastest     = document.getElementById('trt-r-fastest');
    var rSlowest     = document.getElementById('trt-r-slowest');
    var rRating      = document.getElementById('trt-r-rating');
    var resetBtn     = document.getElementById('trt-reset');
    var canvas       = document.getElementById('trt-canvas');
    var ctx          = canvas.getContext('2d');

    var keyDownTimes = {};
    var dwellTimes   = [];
    var flightTimes  = [];
    var lastUpTime   = 0;
    var lastUpKey    = '';
    var bigramMap    = {};
    var finished     = false;

    function escapeHtml(s) {
      return s.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    function renderPassage(idx) {
      var html = '';
      for (var i = 0; i < PASSAGE.length; i++) {
        var ch = PASSAGE[i] === ' ' ? '\u00a0' : PASSAGE[i];
        if (i < idx) {
          html += '<span class="typed-char">' + escapeHtml(ch) + '</span>';
        } else if (i === idx) {
          html += '<span class="cursor-char">' + escapeHtml(ch) + '</span>';
        } else {
          html += '<span>' + escapeHtml(ch) + '</span>';
        }
      }
      passageEl.innerHTML = html;
    }

    renderPassage(0);

    inputEl.addEventListener('keydown', function(e) {
      if (finished) return;
      var now = performance.now();
      keyDownTimes[e.key] = now;
    });

    inputEl.addEventListener('keyup', function(e) {
      if (finished) return;
      var now = performance.now();
      var key = e.key;
      if (keyDownTimes[key] !== undefined) {
        var dwell = now - keyDownTimes[key];
        dwellTimes.push(dwell);
        delete keyDownTimes[key];
        if (lastUpTime > 0 && lastUpKey !== '' && key.length === 1 && lastUpKey.length === 1) {
          var fd = now - dwell - lastUpTime;
          if (fd > 0 && fd < 2000) {
            flightTimes.push(fd);
            var bigram = (lastUpKey + key).toLowerCase();
            if (!bigramMap[bigram]) bigramMap[bigram] = [];
            bigramMap[bigram].push(fd);
          }
        }
        lastUpTime = now;
        lastUpKey  = key;
      }
    });

    inputEl.addEventListener('input', function() {
      if (finished) return;
      var val = inputEl.value;
      var matchLen = 0;
      for (var i = 0; i < val.length && i < PASSAGE.length; i++) {
        if (val[i] === PASSAGE[i]) matchLen++;
        else break;
      }
      renderPassage(matchLen);
      var pct = Math.min(100, Math.round((matchLen / PASSAGE.length) * 100));
      progressEl.style.width = pct + '%';
      progressAria.setAttribute('aria-valuenow', pct);
      charsEl.textContent = matchLen;
      if (dwellTimes.length > 0) {
        dwellEl.textContent = Math.round(avg(dwellTimes));
      }
      if (flightTimes.length > 0) {
        var avgF = avg(flightTimes);
        flightEl.textContent = Math.round(avgF);
        var cv = stddev(flightTimes) / avgF;
        scoreEl.textContent = Math.max(0, Math.min(100, Math.round(100 - cv * 100)));
        updateHeatmap();
      }
      if (matchLen >= PASSAGE.length) {
        finished = true;
        showFinalResults();
      }
    });

    function avg(arr) {
      return arr.reduce(function(a,b){return a+b;},0) / arr.length;
    }

    function stddev(arr) {
      var m = avg(arr);
      var variance = arr.reduce(function(s,v){return s + Math.pow(v-m,2);},0) / arr.length;
      return Math.sqrt(variance);
    }

    function updateHeatmap() {
      var W = canvas.width, H = canvas.height;
      ctx.clearRect(0, 0, W, H);
      var allFlights = [];
      Object.keys(bigramMap).forEach(function(bg) { allFlights.push(avg(bigramMap[bg])); });
      if (allFlights.length === 0) return;
      var minF = Math.min.apply(null, allFlights);
      var maxF = Math.max.apply(null, allFlights);
      var sorted = Object.keys(bigramMap).sort(function(a,b){ return avg(bigramMap[a]) - avg(bigramMap[b]); });
      var rowH = Math.max(Math.floor(H / Math.max(1, sorted.length)), 4);
      var y = 0;
      sorted.forEach(function(bg) {
        if (y >= H) return;
        var a = avg(bigramMap[bg]);
        var t = maxF > minF ? (a - minF) / (maxF - minF) : 0;
        var r = Math.round(t * 220);
        var g = Math.round((1 - Math.abs(t - 0.5) * 2) * 180);
        var b = Math.round((1 - t) * 220);
        ctx.fillStyle = 'rgb(' + r + ',' + g + ',' + b + ')';
        var barW = Math.max(10, Math.round((a / maxF) * (W - 80)));
        ctx.fillRect(0, y, barW, Math.max(rowH - 1, 3));
        ctx.fillStyle = '#fff';
        ctx.font = '11px monospace';
        ctx.fillText(bg, barW + 4, y + rowH - 2);
        y += rowH;
      });
    }

    function showFinalResults() {
      if (flightTimes.length < 2) return;
      var avgD  = avg(dwellTimes);
      var avgF  = avg(flightTimes);
      var cv    = stddev(flightTimes) / avgF;
      var score = Math.max(0, Math.min(100, Math.round(100 - cv * 100)));
      finalScore.textContent = score;
      rScore.textContent  = score + ' / 100';
      rDwell.textContent  = Math.round(avgD) + ' ms';
      rFlight.textContent = Math.round(avgF) + ' ms';
      var bgEntries = Object.keys(bigramMap).map(function(bg){
        return {bg: bg, avg: avg(bigramMap[bg])};
      }).sort(function(a,b){ return a.avg - b.avg; });
      rFastest.textContent = bgEntries.length > 0 ? '"' + bgEntries[0].bg + '" — ' + Math.round(bgEntries[0].avg) + ' ms' : '—';
      rSlowest.textContent = bgEntries.length > 0 ? '"' + bgEntries[bgEntries.length-1].bg + '" — ' + Math.round(bgEntries[bgEntries.length-1].avg) + ' ms' : '—';
      rRating.textContent = score >= 85 ? ratingExcellent : score >= 70 ? ratingGood : score >= 55 ? ratingAvg : ratingDev;
      resultsEl.classList.add('visible');
      updateHeatmap();
    }

    resetBtn.addEventListener('click', function() {
      finished     = false;
      dwellTimes   = [];
      flightTimes  = [];
      bigramMap    = {};
      keyDownTimes = {};
      lastUpTime   = 0;
      lastUpKey    = '';
      inputEl.value = '';
      progressEl.style.width = '0%';
      progressAria.setAttribute('aria-valuenow', 0);
      charsEl.textContent  = '0';
      dwellEl.textContent  = '—';
      flightEl.textContent = '—';
      scoreEl.textContent  = '—';
      resultsEl.classList.remove('visible');
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      renderPassage(0);
      inputEl.focus();
    });

  }, 0); });
  </script>
</body>
</html>
