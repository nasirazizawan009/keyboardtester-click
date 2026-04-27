"""Insert 18 missing tool translations × 8 languages into tool-list-data.php."""
from pathlib import Path
import re

ROOT = Path(__file__).resolve().parent.parent

# 18 tools × 8 languages.
# Format: TOOLS[tool_id][lang] = {'name': '...', 'description': '...'}
T = {
    'guild-name-generator': {
        'ar': {'name': 'مولد أسماء النقابات', 'description': 'أسماء عشوائية لنقابات MMO وعصابات في 6 سمات و5 قوالب'},
        'fr': {'name': 'Générateur de noms de guilde', 'description': 'Noms aléatoires de guildes MMO et clans en 6 thèmes et 5 modèles'},
        'de': {'name': 'Gilden-Namen-Generator', 'description': 'Zufällige MMO-Gilden- und Clan-Namen in 6 Themen und 5 Vorlagen'},
        'es': {'name': 'Generador de nombres de clan', 'description': 'Nombres aleatorios de clanes y guilds MMO en 6 temáticas y 5 plantillas'},
        'pt': {'name': 'Gerador de nomes de guild', 'description': 'Nomes aleatórios de guilds e clãs MMO em 6 temas e 5 modelos'},
        'ru': {'name': 'Генератор названий гильдий', 'description': 'Случайные названия MMO-гильдий и кланов в 6 темах и 5 шаблонах'},
        'ja': {'name': 'ギルド名ジェネレーター', 'description': 'MMO のギルド・クラン名を 6 テーマ・5 テンプレートで生成'},
        'ko': {'name': '길드 이름 생성기', 'description': 'MMO 길드/클랜 이름을 6개 테마와 5개 템플릿으로 생성'},
    },
    'auditory-reaction-time-test': {
        'ar': {'name': 'اختبار زمن رد الفعل السمعي', 'description': 'قياس زمن استجابتك لنغمة بدقة الميلي ثانية عبر Web Audio API'},
        'fr': {'name': 'Test de temps de réaction auditive', 'description': 'Mesure votre temps de réaction à un son en millisecondes via Web Audio'},
        'de': {'name': 'Auditiver Reaktionstest', 'description': 'Misst Ihre Reaktionszeit auf einen Ton in Millisekunden via Web Audio'},
        'es': {'name': 'Prueba de reacción auditiva', 'description': 'Mide tu tiempo de reacción a un sonido en milisegundos usando Web Audio'},
        'pt': {'name': 'Teste de tempo de reação auditiva', 'description': 'Mede o tempo de reação a um som em milissegundos via Web Audio'},
        'ru': {'name': 'Тест слуховой реакции', 'description': 'Измеряет скорость реакции на звук в миллисекундах через Web Audio'},
        'ja': {'name': '聴覚反応時間テスト', 'description': '音への反応時間を Web Audio API でミリ秒単位で計測'},
        'ko': {'name': '청각 반응 시간 테스트', 'description': 'Web Audio API로 소리 반응 시간을 밀리초 단위로 측정'},
    },
    'frame-skipping-test': {
        'ar': {'name': 'اختبار تخطي الإطارات', 'description': 'يكشف الإطارات المفقودة عبر تحليل طوابع rAF بمعايرة تلقائية للهرتز'},
        'fr': {'name': 'Test de frames sautés', 'description': 'Détecte les frames perdues via timestamps rAF avec auto-calibrage Hz'},
        'de': {'name': 'Frame-Skipping-Test', 'description': 'Erkennt fallengelassene Frames via rAF-Timestamps mit Hz-Auto-Kalibrierung'},
        'es': {'name': 'Prueba de frames saltados', 'description': 'Detecta frames perdidos vía timestamps rAF con auto-calibración de Hz'},
        'pt': {'name': 'Teste de frames perdidos', 'description': 'Detecta frames descartados via timestamps rAF com auto-calibração de Hz'},
        'ru': {'name': 'Тест пропуска кадров', 'description': 'Обнаруживает пропущенные кадры через rAF-метки с автокалибровкой Hz'},
        'ja': {'name': 'フレームスキップテスト', 'description': 'rAF タイムスタンプ解析でフレームスキップを検出（Hz 自動校正）'},
        'ko': {'name': '프레임 스킵 테스트', 'description': 'requestAnimationFrame 분석으로 드롭 프레임 감지, Hz 자동 보정'},
    },
    'surround-sound-test': {
        'ar': {'name': 'اختبار الصوت المحيطي', 'description': 'تجول قنوات 5.1 و7.1 للتحقق من توصيلات السماعات'},
        'fr': {'name': 'Test son surround', 'description': 'Parcours des canaux 5.1 et 7.1 pour vérifier le câblage des enceintes'},
        'de': {'name': 'Surround-Sound-Test', 'description': '5.1- und 7.1-Kanal-Rundgang zur Prüfung der Lautsprecher-Verkabelung'},
        'es': {'name': 'Prueba de sonido envolvente', 'description': 'Recorrido por canales 5.1 y 7.1 para verificar el cableado de altavoces'},
        'pt': {'name': 'Teste de som surround', 'description': 'Percurso pelos canais 5.1 e 7.1 para verificar cabeamento de alto-falantes'},
        'ru': {'name': 'Тест объёмного звука', 'description': 'Обход каналов 5.1 и 7.1 для проверки подключения колонок'},
        'ja': {'name': 'サラウンドサウンドテスト', 'description': '5.1/7.1 チャンネルを順番に再生してスピーカー配線を確認'},
        'ko': {'name': '서라운드 사운드 테스트', 'description': '5.1/7.1 채널 워크어라운드로 스피커 배선 확인'},
    },
    'cpu-stress-test': {
        'ar': {'name': 'اختبار إجهاد المعالج', 'description': 'إجهاد متعدد الخيوط بحلقات SHA-256 في WebWorkers'},
        'fr': {'name': 'Test de stress CPU', 'description': 'Stress CPU multithread avec boucles SHA-256 en WebWorkers'},
        'de': {'name': 'CPU-Stresstest', 'description': 'Multithreaded CPU-Stresstest mit SHA-256-Loops in WebWorkers'},
        'es': {'name': 'Prueba de estrés de CPU', 'description': 'Estrés multihilo con loops SHA-256 en WebWorkers'},
        'pt': {'name': 'Teste de estresse de CPU', 'description': 'Estresse multithread com loops SHA-256 em WebWorkers'},
        'ru': {'name': 'Стресс-тест CPU', 'description': 'Многопоточный стресс-тест с циклами SHA-256 в WebWorker'},
        'ja': {'name': 'CPU ストレステスト', 'description': 'WebWorker で SHA-256 ループを回すマルチスレッド CPU 負荷試験'},
        'ko': {'name': 'CPU 스트레스 테스트', 'description': 'WebWorker SHA-256 루프로 멀티스레드 CPU 부하 테스트'},
    },
    'gpu-stress-test': {
        'ar': {'name': 'اختبار إجهاد GPU', 'description': 'شادر مندلبرو في WebGL2 لإجهاد أي بطاقة رسومات'},
        'fr': {'name': 'Test de stress GPU', 'description': 'Shader Mandelbrot en WebGL2 pour stresser toute GPU'},
        'de': {'name': 'GPU-Stresstest', 'description': 'Mandelbrot-Shader in WebGL2 zum Stressen jeder GPU'},
        'es': {'name': 'Prueba de estrés de GPU', 'description': 'Shader Mandelbrot en WebGL2 para estresar cualquier GPU'},
        'pt': {'name': 'Teste de estresse de GPU', 'description': 'Shader Mandelbrot em WebGL2 para estressar qualquer GPU'},
        'ru': {'name': 'Стресс-тест GPU', 'description': 'Шейдер Мандельброта на WebGL2 для нагрузки любой GPU'},
        'ja': {'name': 'GPU ストレステスト', 'description': 'WebGL2 Mandelbrot シェーダーで任意の GPU を負荷試験'},
        'ko': {'name': 'GPU 스트레스 테스트', 'description': 'WebGL2 Mandelbrot 셰이더로 모든 GPU에 부하 테스트'},
    },
    'memory-test': {
        'ar': {'name': 'اختبار الذاكرة', 'description': 'مراقب كومة المتصفح عبر performance.memory مع مُحمِّل تخصيص'},
        'fr': {'name': 'Test de mémoire', 'description': 'Moniteur de heap navigateur via performance.memory avec stresseur'},
        'de': {'name': 'Speichertest', 'description': 'Browser-Heap-Monitor via performance.memory mit Allocation-Stresser'},
        'es': {'name': 'Prueba de memoria', 'description': 'Monitor de heap del navegador con performance.memory y estresador'},
        'pt': {'name': 'Teste de memória', 'description': 'Monitor de heap do navegador via performance.memory com estressador'},
        'ru': {'name': 'Тест памяти', 'description': 'Монитор кучи браузера через performance.memory со стрессером'},
        'ja': {'name': 'メモリテスト', 'description': 'performance.memory によるブラウザヒープ監視と割当ストレステスト'},
        'ko': {'name': '메모리 테스트', 'description': 'performance.memory 기반 브라우저 힙 모니터 및 할당 스트레스'},
    },
    'ram-latency-calculator': {
        'ar': {'name': 'حاسبة زمن انتقال الذاكرة', 'description': 'حساب زمن CAS بالنانو ثانية ومقارنة كيتات DDR4 و DDR5'},
        'fr': {'name': 'Calculatrice de latence RAM', 'description': 'Convertit CAS en nanosecondes et compare des kits DDR4 et DDR5'},
        'de': {'name': 'RAM-Latenz-Rechner', 'description': 'CAS in Nanosekunden umrechnen und DDR4-/DDR5-Kits vergleichen'},
        'es': {'name': 'Calculadora de latencia de RAM', 'description': 'Convierte CAS a nanosegundos y compara kits DDR4 y DDR5'},
        'pt': {'name': 'Calculadora de latência de RAM', 'description': 'Converte CAS para nanossegundos e compara kits DDR4 e DDR5'},
        'ru': {'name': 'Калькулятор латентности RAM', 'description': 'Перевод CAS в наносекунды и сравнение наборов DDR4 и DDR5'},
        'ja': {'name': 'RAM レイテンシ計算ツール', 'description': 'CAS をナノ秒に変換し DDR4 と DDR5 キットを比較'},
        'ko': {'name': 'RAM 지연 시간 계산기', 'description': 'CAS를 나노초로 변환하고 DDR4와 DDR5 키트 비교'},
    },
    'bandwidth-calculator': {
        'ar': {'name': 'حاسبة عرض النطاق', 'description': 'تحويل الحجم والسرعة إلى وقت النقل مع مفاتيح الوحدات'},
        'fr': {'name': 'Calculatrice de bande passante', 'description': 'Convertit taille et vitesse en durée de transfert avec unités'},
        'de': {'name': 'Bandbreitenrechner', 'description': 'Wandelt Größe und Geschwindigkeit in Übertragungsdauer um'},
        'es': {'name': 'Calculadora de ancho de banda', 'description': 'Convierte tamaño y velocidad en tiempo de transferencia'},
        'pt': {'name': 'Calculadora de largura de banda', 'description': 'Converte tamanho e velocidade em tempo de transferência'},
        'ru': {'name': 'Калькулятор пропускной способности', 'description': 'Перевод размера и скорости во время передачи'},
        'ja': {'name': '帯域幅計算ツール', 'description': 'ファイルサイズと回線速度を転送時間に変換'},
        'ko': {'name': '대역폭 계산기', 'description': '파일 크기와 연결 속도를 전송 시간으로 변환'},
    },
    'download-time-calculator': {
        'ar': {'name': 'حاسبة وقت التنزيل', 'description': 'تقدير وقت تنزيل الألعاب والأفلام والنسخ الاحتياطية'},
        'fr': {'name': 'Calculatrice de temps de téléchargement', 'description': 'Estime la durée de téléchargement de jeux, films et backups'},
        'de': {'name': 'Download-Zeit-Rechner', 'description': 'Schätzt die Download-Zeit für Spiele, Filme und Backups'},
        'es': {'name': 'Calculadora de tiempo de descarga', 'description': 'Estima el tiempo de descarga de juegos, películas y backups'},
        'pt': {'name': 'Calculadora de tempo de download', 'description': 'Estima o tempo de download de jogos, filmes e backups'},
        'ru': {'name': 'Калькулятор времени загрузки', 'description': 'Оценивает время загрузки игр, фильмов и бэкапов'},
        'ja': {'name': 'ダウンロード時間計算ツール', 'description': 'ゲーム・動画・バックアップのダウンロード時間を推定'},
        'ko': {'name': '다운로드 시간 계산기', 'description': '게임, 영화, 백업의 다운로드 시간 추정'},
    },
    'raid-calculator': {
        'ar': {'name': 'حاسبة RAID', 'description': 'سعة وتحمل أعطال RAID 0/1/5/6/10/50/60'},
        'fr': {'name': 'Calculatrice RAID', 'description': 'Capacité et tolérance aux pannes pour RAID 0/1/5/6/10/50/60'},
        'de': {'name': 'RAID-Rechner', 'description': 'Kapazität und Fehlertoleranz für RAID 0/1/5/6/10/50/60'},
        'es': {'name': 'Calculadora RAID', 'description': 'Capacidad y tolerancia a fallos para RAID 0/1/5/6/10/50/60'},
        'pt': {'name': 'Calculadora RAID', 'description': 'Capacidade e tolerância a falhas para RAID 0/1/5/6/10/50/60'},
        'ru': {'name': 'Калькулятор RAID', 'description': 'Ёмкость и отказоустойчивость для RAID 0/1/5/6/10/50/60'},
        'ja': {'name': 'RAID 計算ツール', 'description': 'RAID 0/1/5/6/10/50/60 の容量と耐障害性'},
        'ko': {'name': 'RAID 계산기', 'description': 'RAID 0/1/5/6/10/50/60 용량 및 장애 내구성'},
    },
    'ttk-calculator': {
        'ar': {'name': 'حاسبة TTK', 'description': 'حساب وقت القتل في ألعاب FPS مع إعدادات لـ CS2 و Valorant و Apex'},
        'fr': {'name': 'Calculatrice TTK', 'description': 'Calcul du temps jusqu’à kill en FPS avec presets CS2/Valorant/Apex'},
        'de': {'name': 'TTK-Rechner', 'description': 'Time-to-Kill für FPS-Spiele mit Presets für CS2/Valorant/Apex'},
        'es': {'name': 'Calculadora de TTK', 'description': 'Tiempo hasta matar en FPS con presets para CS2/Valorant/Apex'},
        'pt': {'name': 'Calculadora de TTK', 'description': 'Tempo até matar em FPS com presets para CS2/Valorant/Apex'},
        'ru': {'name': 'Калькулятор TTK', 'description': 'Время до убийства в FPS с пресетами CS2/Valorant/Apex'},
        'ja': {'name': 'TTK 計算ツール', 'description': 'FPS のキルまでの時間（CS2・Valorant・Apex プリセット）'},
        'ko': {'name': 'TTK 계산기', 'description': 'FPS 킬까지 시간(CS2/Valorant/Apex 프리셋)'},
    },
    'minecraft-circle-generator': {
        'ar': {'name': 'مولد دوائر Minecraft', 'description': 'دوائر بكسل وكرات للبناء في Minecraft، نصف قطر 1-256'},
        'fr': {'name': 'Générateur de cercles Minecraft', 'description': 'Cercles en pixels et sphères pour les bâtisseurs Minecraft, rayon 1-256'},
        'de': {'name': 'Minecraft-Kreis-Generator', 'description': 'Pixel-Kreise und Kugeln für Minecraft-Builder, Radius 1-256'},
        'es': {'name': 'Generador de círculos Minecraft', 'description': 'Círculos en píxeles y esferas para constructores de Minecraft, radio 1-256'},
        'pt': {'name': 'Gerador de círculos Minecraft', 'description': 'Círculos em pixels e esferas para construtores de Minecraft, raio 1-256'},
        'ru': {'name': 'Генератор кругов Minecraft', 'description': 'Пиксельные круги и сферы для строителей Minecraft, радиус 1-256'},
        'ja': {'name': 'Minecraft 円ジェネレーター', 'description': 'Minecraft ビルダー向けピクセル円と球、半径 1-256'},
        'ko': {'name': 'Minecraft 원 생성기', 'description': 'Minecraft 빌더를 위한 픽셀 원과 구, 반지름 1-256'},
    },
    'monitor-sharpness-test': {
        'ar': {'name': 'اختبار حدة الشاشة', 'description': 'شبكة بكسل 1px وعينات نص ومسطرة البكسلات الفرعية RGB'},
        'fr': {'name': 'Test de netteté du moniteur', 'description': 'Grille 1px, échantillons de texte et règle des sous-pixels RGB'},
        'de': {'name': 'Monitor-Schärfe-Test', 'description': '1px-Pixelraster, Textproben und RGB-Subpixel-Lineal'},
        'es': {'name': 'Prueba de nitidez del monitor', 'description': 'Cuadrícula 1px, muestras de texto y regla de subpíxeles RGB'},
        'pt': {'name': 'Teste de nitidez do monitor', 'description': 'Grade 1px, amostras de texto e régua de subpixel RGB'},
        'ru': {'name': 'Тест чёткости монитора', 'description': 'Сетка 1px, текстовые образцы и линейка субпикселей RGB'},
        'ja': {'name': 'モニター鮮明度テスト', 'description': '1pxピクセルグリッド、テキスト見本、RGBサブピクセル定規'},
        'ko': {'name': '모니터 선명도 테스트', 'description': '1픽셀 그리드, 텍스트 샘플, RGB 서브픽셀 자'},
    },
    'pitch-detector': {
        'ar': {'name': 'كاشف طبقة الصوت', 'description': 'كشف الترددات والنغمات الموسيقية مباشرة من الميكروفون'},
        'fr': {'name': 'Détecteur de hauteur', 'description': 'Détection en direct de fréquence et note musicale via microphone'},
        'de': {'name': 'Tonhöhen-Detektor', 'description': 'Live-Erkennung von Frequenz und Musiknote via Mikrofon'},
        'es': {'name': 'Detector de tono', 'description': 'Detección en vivo de frecuencia y nota musical por micrófono'},
        'pt': {'name': 'Detector de tom', 'description': 'Detecção ao vivo de frequência e nota musical via microfone'},
        'ru': {'name': 'Детектор высоты тона', 'description': 'Определение частоты и музыкальной ноты с микрофона в реальном времени'},
        'ja': {'name': 'ピッチ検出器', 'description': 'マイクから周波数と音名をリアルタイム検出'},
        'ko': {'name': '피치 디텍터', 'description': '마이크로 주파수와 음 이름을 실시간 감지'},
    },
    'webcam-mirror': {
        'ar': {'name': 'مرآة كاميرا الويب', 'description': 'استخدم الكاميرا كمرآة افتراضية مع قلب أفقي وأخذ لقطات'},
        'fr': {'name': 'Miroir webcam', 'description': 'Utilisez votre caméra comme miroir virtuel avec retournement et capture'},
        'de': {'name': 'Webcam-Spiegel', 'description': 'Kamera als virtueller Spiegel mit Spiegelung und Snapshot'},
        'es': {'name': 'Espejo de webcam', 'description': 'Usa la cámara como espejo virtual con volteo y captura'},
        'pt': {'name': 'Espelho de webcam', 'description': 'Use a câmera como espelho virtual com inversão e captura'},
        'ru': {'name': 'Зеркало веб-камеры', 'description': 'Камера как виртуальное зеркало с отражением и снимком'},
        'ja': {'name': 'ウェブカメラミラー', 'description': 'カメラを反転表示の仮想ミラーとして使用、スナップショット保存'},
        'ko': {'name': '웹캠 거울', 'description': '카메라를 가상 거울로 사용, 반전 및 스냅샷 지원'},
    },
    'hearing-age-test': {
        'ar': {'name': 'اختبار عمر السمع', 'description': 'فحص سمع 12 ترددًا (8-22 كيلوهرتز) مع نغمة البعوضة 17.4 كيلوهرتز'},
        'fr': {'name': 'Test d’âge auditif', 'description': '12 fréquences (8-22 kHz) avec la tonalité mosquito 17,4 kHz'},
        'de': {'name': 'Hör-Alter-Test', 'description': '12 Frequenzen (8-22 kHz) inklusive 17,4-kHz-Mosquito-Ton'},
        'es': {'name': 'Test de edad auditiva', 'description': '12 frecuencias (8-22 kHz) con tono mosquito de 17.4 kHz'},
        'pt': {'name': 'Teste de idade auditiva', 'description': '12 frequências (8-22 kHz) com tom mosquito de 17,4 kHz'},
        'ru': {'name': 'Тест возраста слуха', 'description': '12 частот (8-22 кГц) включая комариный тон 17,4 кГц'},
        'ja': {'name': '聴覚年齢テスト', 'description': '12 周波数（8-22 kHz）モスキート音 17.4 kHz 対応'},
        'ko': {'name': '청각 나이 테스트', 'description': '12개 주파수(8-22 kHz)와 17.4 kHz 모기 소리 포함'},
    },
    'online-ruler': {
        'ar': {'name': 'مسطرة اونلاين', 'description': 'مسطرة بالحجم الفعلي بالسنتيمتر والإنش مع معايرة بطاقة الائتمان'},
        'fr': {'name': 'Règle en ligne', 'description': 'Règle taille réelle en cm et pouces avec calibrage par carte bancaire'},
        'de': {'name': 'Online-Lineal', 'description': 'Lineal in Originalgröße in cm und Zoll, kalibriert per Kreditkarte'},
        'es': {'name': 'Regla online', 'description': 'Regla a tamaño real en cm y pulgadas con calibración por tarjeta'},
        'pt': {'name': 'Régua online', 'description': 'Régua em tamanho real em cm e polegadas com calibração por cartão'},
        'ru': {'name': 'Онлайн-линейка', 'description': 'Линейка в натуральную величину в см и дюймах, калибровка по карте'},
        'ja': {'name': 'オンライン定規', 'description': 'cm／インチ実寸定規、クレジットカードで校正'},
        'ko': {'name': '온라인 자', 'description': 'cm·인치 실제 크기 자, 신용카드로 캘리브레이션'},
    },
}


def main():
    p = ROOT / 'includes' / 'components' / 'tool-list-data.php'
    text = p.read_text(encoding='utf-8')
    LANGS = ['ar', 'fr', 'de', 'es', 'pt', 'ru', 'ja', 'ko']
    inserted = 0
    for lang in LANGS:
        # Find the gamertag-generator line for this language and insert new entries after it
        # We look for the pattern with the gamertag-generator entry uniquely per locale block
        # The gamertag-generator entries are at distinct line numbers per locale, so we use a unique-per-locale anchor
        # by combining the locale's directory marker
        for tool, langs in T.items():
            if lang not in langs: continue
            entry = langs[lang]
            # Build the new line matching existing format
            new_line = f"                        '{tool}' => ['name' => '{entry['name']}', 'description' => '{entry['description']}'],\n"
            # Skip if already present
            if f"'{tool}' => " in text and text.count(f"'{tool}' => ") >= 8:  # already has 8+ entries
                # Check this specific lang block has the entry
                pass
            # We'll do single-pass insertion: find the gamertag entry per locale, append after the newline
            pass
    # Simpler approach: parse the file blocks per language and append each tool entry after the locale's gamertag-generator line.
    # Use a robust regex that finds the gamertag-generator line for each lang block.
    # Each lang appears once with a unique 'directory' string nearby (e.g. 'french', 'german', etc.)
    LANG_DIR = {'ar':'arabic','fr':'french','de':'german','es':'spanish','pt':'portuguese','ru':'russian','ja':'japanese','ko':'korean'}
    new_text = text
    for lang in LANGS:
        for tool, langs in T.items():
            if lang not in langs: continue
            entry = langs[lang]
            # Already present? scan around the lang block.
            # Locate the lang block
            lang_block_re = re.compile(rf"'{lang}' => \[\s*'directory' => '{LANG_DIR[lang]}'.*?(?='[a-z][a-z]?' => \[|\s*\];?\s*\n\s*\];)", re.S)
            mblk = lang_block_re.search(new_text)
            if not mblk:
                print(f'WARN: could not find {lang} block')
                continue
            block_start, block_end = mblk.start(), mblk.end()
            block = new_text[block_start:block_end]
            if f"'{tool}' => " in block:
                continue  # already translated
            # Find the gamertag-generator line in this block
            anchor_re = re.compile(rf"^([\t ]+)'gamertag-generator' => .*?\n", re.M)
            ma = anchor_re.search(block)
            if not ma:
                # insert before the closing ] of 'tools' => [ block
                close_re = re.compile(r"^([\t ]+)\],\s*\n([\t ]+)\],\s*\n", re.M)
                mc = close_re.search(block)
                if not mc:
                    print(f'WARN: no anchor in {lang}'); continue
                insert_at = block_start + mc.start()
                indent = mc.group(1)
                new_line = f"{indent}    '{tool}' => ['name' => '{entry['name']}', 'description' => '{entry['description']}'],\n"
                new_text = new_text[:insert_at] + new_line + new_text[insert_at:]
            else:
                insert_at = block_start + ma.end()
                indent = ma.group(1)
                new_line = f"{indent}'{tool}' => ['name' => '{entry['name']}', 'description' => '{entry['description']}'],\n"
                new_text = new_text[:insert_at] + new_line + new_text[insert_at:]
            inserted += 1
    p.write_text(new_text, encoding='utf-8')
    print(f'Inserted {inserted} translation entries.')


if __name__ == '__main__':
    main()
