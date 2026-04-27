"""Generate localized wrapper pages for the 18 tools that currently ship EN-only.

Outputs 144 files: 18 tools x 8 languages.
Each file is a thin wrapper that:
  - uses localized meta title/description
  - includes the shared English tool partial from /tools/*.php
  - uses localized hero kicker / title / lede
  - includes localized header-{code}.php + footer-{code}.php (with fallback)

Pattern matches the existing bass-test localized wrappers.
"""
from __future__ import annotations
from pathlib import Path

ROOT = Path(__file__).resolve().parent.parent

LANGUAGES = [
    ('spanish',    'es'),
    ('french',     'fr'),
    ('german',     'de'),
    ('portuguese', 'pt'),
    ('arabic',     'ar'),
    ('russian',    'ru'),
    ('japanese',   'ja'),
    ('korean',     'ko'),
]

# UI strings per language
UI = {
    'es': {'primary_tool':'Herramienta principal','browse_all':'Ver todas las herramientas','dir':'ltr'},
    'fr': {'primary_tool':'Outil principal','browse_all':'Voir tous les outils','dir':'ltr'},
    'de': {'primary_tool':'Haupt-Tool','browse_all':'Alle Tools anzeigen','dir':'ltr'},
    'pt': {'primary_tool':'Ferramenta principal','browse_all':'Ver todas as ferramentas','dir':'ltr'},
    'ar': {'primary_tool':'الأداة الرئيسية','browse_all':'تصفح جميع الأدوات','dir':'rtl'},
    'ru': {'primary_tool':'Основной инструмент','browse_all':'Все инструменты','dir':'ltr'},
    'ja': {'primary_tool':'メインツール','browse_all':'すべてのツールを見る','dir':'ltr'},
    'ko': {'primary_tool':'주요 도구','browse_all':'모든 도구 보기','dir':'ltr'},
}

# Per-tool data: slug -> { tool_partial, kicker_key, per-lang translations }
# kicker_key values: 'gaming', 'audio', 'display', 'hardware', 'calculator', 'generator'
KICKER = {
    'gaming':     {'es':'Utilidad de gaming','fr':'Utilitaire gaming','de':'Gaming-Werkzeug','pt':'Utilitário de gaming','ar':'أداة ألعاب','ru':'Игровой инструмент','ja':'ゲーミングユーティリティ','ko':'게이밍 유틸리티'},
    'audio':      {'es':'Diagnóstico de audio','fr':'Diagnostic audio','de':'Audio-Diagnose','pt':'Diagnóstico de áudio','ar':'تشخيص الصوت','ru':'Аудиодиагностика','ja':'オーディオ診断','ko':'오디오 진단'},
    'display':    {'es':'Diagnóstico de pantalla','fr':'Diagnostic écran','de':'Display-Diagnose','pt':'Diagnóstico de tela','ar':'تشخيص الشاشة','ru':'Диагностика дисплея','ja':'ディスプレイ診断','ko':'디스플레이 진단'},
    'hardware':   {'es':'Benchmark de hardware','fr':'Benchmark matériel','de':'Hardware-Benchmark','pt':'Benchmark de hardware','ar':'اختبار الأداء','ru':'Тест оборудования','ja':'ハードウェアベンチマーク','ko':'하드웨어 벤치마크'},
    'sensor':     {'es':'Sensor del dispositivo','fr':'Capteur de l’appareil','de':'Gerätesensor','pt':'Sensor do dispositivo','ar':'مستشعر الجهاز','ru':'Датчик устройства','ja':'デバイスセンサー','ko':'기기 센서'},
    'calculator': {'es':'Calculadora','fr':'Calculatrice','de':'Rechner','pt':'Calculadora','ar':'حاسبة','ru':'Калькулятор','ja':'計算ツール','ko':'계산기'},
}

# Per-tool translations. Each tool has: tool_partial, kicker_key, start_btn, and per-lang {title, desc, lede, h1, h2}
TOOLS = {
    'frequency-response-test': {
        'tool': 'tools/frequency_response_tool.php',
        'kicker': 'audio',
        'trans': {
            'es': {'title':'Prueba de respuesta en frecuencia - Barrido 20 Hz a 20 kHz','desc':'Barrido de audio de 20 Hz a 20 kHz con marcas de paso para encontrar los límites de audición y evaluar auriculares o monitores.','h1':'Prueba de respuesta en frecuencia','lede':'Barrido de 20 Hz a 20 kHz con presets ISO de tercio de octava. Detecta los límites de tu audición y la respuesta real de tus auriculares o altavoces. Ondas senoidales puras generadas localmente en el navegador.','start':'Iniciar prueba','h2':'Prueba de respuesta en frecuencia'},
            'fr': {'title':'Test de réponse en fréquence - Balayage 20 Hz à 20 kHz','desc':'Balayage audio de 20 Hz à 20 kHz avec repères par tiers d’octave pour trouver vos limites auditives et évaluer casque ou moniteurs.','h1':'Test de réponse en fréquence','lede':'Balayage de 20 Hz à 20 kHz avec presets ISO par tiers d’octave. Détecte vos limites auditives et la réponse réelle de votre casque ou de vos enceintes. Sinusoïdes pures générées localement dans le navigateur.','start':'Lancer le test','h2':'Test de réponse en fréquence'},
            'de': {'title':'Frequenzgang-Test - Sweep 20 Hz bis 20 kHz','desc':'Audio-Sweep von 20 Hz bis 20 kHz mit Terz-Schrittmarken zur Ermittlung Ihrer Hörgrenzen und zur Bewertung von Kopfhörern oder Monitoren.','h1':'Frequenzgang-Test','lede':'Sweep von 20 Hz bis 20 kHz mit ISO-Terz-Presets. Findet Ihre Hörgrenzen und den tatsächlichen Frequenzgang Ihrer Kopfhörer oder Lautsprecher. Reine Sinuswellen, lokal im Browser erzeugt.','start':'Test starten','h2':'Frequenzgang-Test'},
            'pt': {'title':'Teste de resposta em frequência - Varredura 20 Hz a 20 kHz','desc':'Varredura de áudio de 20 Hz a 20 kHz com marcas de um terço de oitava para encontrar seus limites auditivos e avaliar fones ou monitores.','h1':'Teste de resposta em frequência','lede':'Varredura de 20 Hz a 20 kHz com presets ISO de terço de oitava. Encontra seus limites auditivos e a resposta real de fones ou alto-falantes. Ondas senoidais puras geradas localmente no navegador.','start':'Iniciar teste','h2':'Teste de resposta em frequência'},
            'ar': {'title':'اختبار استجابة التردد - مسح 20 هرتز إلى 20 كيلوهرتز','desc':'مسح صوتي من 20 هرتز إلى 20 كيلوهرتز مع علامات ثلث الأوكتاف لتحديد حدود السمع وتقييم سماعاتك.','h1':'اختبار استجابة التردد','lede':'مسح من 20 هرتز إلى 20 كيلوهرتز مع إعدادات ISO لثلث الأوكتاف. اكتشف حدود سمعك واستجابة سماعاتك الحقيقية. موجات جيبية نقية مولّدة محلياً في المتصفح.','start':'ابدأ الاختبار','h2':'اختبار استجابة التردد'},
            'ru': {'title':'Тест частотной характеристики - развёртка 20 Гц - 20 кГц','desc':'Аудио-развёртка от 20 Гц до 20 кГц с отметками третьоктавы для определения вашего диапазона слуха и оценки наушников.','h1':'Тест частотной характеристики','lede':'Развёртка от 20 Гц до 20 кГц с ISO-пресетами 1/3 октавы. Определяет пределы слуха и реальную АЧХ наушников или колонок. Чистые синусоиды, генерируемые локально в браузере.','start':'Запустить тест','h2':'Тест частотной характеристики'},
            'ja': {'title':'周波数特性テスト - 20 Hz から 20 kHz スイープ','desc':'20 Hz から 20 kHz までのオーディオスイープで、聴力の限界を知りヘッドホンやモニターを評価します。','h1':'周波数特性テスト','lede':'20 Hz から 20 kHz のスイープと ISO 1/3 オクターブプリセットで、聴力の上限とヘッドホン・スピーカーの実際の応答を確認します。ブラウザ内で生成される純粋な正弦波。','start':'テスト開始','h2':'周波数特性テスト'},
            'ko': {'title':'주파수 응답 테스트 - 20 Hz부터 20 kHz까지 스윕','desc':'20 Hz에서 20 kHz까지의 오디오 스윕으로 청각 한계를 확인하고 헤드폰이나 모니터를 평가합니다.','h1':'주파수 응답 테스트','lede':'20 Hz부터 20 kHz까지 스윕, ISO 1/3 옥타브 프리셋 포함. 청각의 상한과 헤드폰/스피커의 실제 주파수 응답을 확인합니다. 브라우저에서 로컬 생성되는 순수 사인파.','start':'테스트 시작','h2':'주파수 응답 테스트'},
        },
    },
    'accelerometer-test': {
        'tool': 'tools/accelerometer_tool.php',
        'kicker': 'sensor',
        'trans': {
            'es': {'title':'Prueba de acelerómetro - Sensor de movimiento del móvil','desc':'Lectura en vivo del acelerómetro del móvil o tablet con cubo 3D, detector de agitación y visualización de aceleración XYZ.','h1':'Prueba de acelerómetro','lede':'Lee en vivo el acelerómetro de tu móvil o tablet (DeviceMotionEvent). Muestra XYZ en m/s², orientación con un cubo 3D y un contador de sacudidas. iOS pide permiso explícito.','start':'Iniciar sensor','h2':'Prueba de acelerómetro'},
            'fr': {'title':'Test d’accéléromètre - Capteur de mouvement du téléphone','desc':'Lecture en direct de l’accéléromètre du téléphone ou de la tablette avec cube 3D, détecteur de secousses et visualisation de l’accélération XYZ.','h1':'Test d’accéléromètre','lede':'Lit en direct l’accéléromètre de votre téléphone ou tablette (DeviceMotionEvent). Affiche XYZ en m/s², l’orientation avec un cube 3D et un compteur de secousses. iOS demande une permission explicite.','start':'Démarrer le capteur','h2':'Test d’accéléromètre'},
            'de': {'title':'Beschleunigungssensor-Test - Handy-Bewegungssensor','desc':'Live-Auslesung des Beschleunigungssensors von Handy oder Tablet mit 3D-Würfel, Schütteldetektor und XYZ-Beschleunigungsanzeige.','h1':'Beschleunigungssensor-Test','lede':'Liest den Beschleunigungssensor Ihres Handys oder Tablets live aus (DeviceMotionEvent). Zeigt XYZ in m/s², Ausrichtung als 3D-Würfel und einen Schüttelzähler. iOS fragt explizit um Erlaubnis.','start':'Sensor starten','h2':'Beschleunigungssensor-Test'},
            'pt': {'title':'Teste de acelerômetro - Sensor de movimento do celular','desc':'Leitura ao vivo do acelerômetro do celular ou tablet com cubo 3D, detector de chacoalho e visualização de aceleração XYZ.','h1':'Teste de acelerômetro','lede':'Lê em tempo real o acelerômetro do seu celular ou tablet (DeviceMotionEvent). Mostra XYZ em m/s², orientação em um cubo 3D e um contador de chacoalhos. iOS pede permissão explícita.','start':'Iniciar sensor','h2':'Teste de acelerômetro'},
            'ar': {'title':'اختبار مقياس التسارع - مستشعر حركة الهاتف','desc':'قراءة مباشرة لمقياس التسارع في الهاتف أو الجهاز اللوحي مع مكعب ثلاثي الأبعاد وكاشف للاهتزاز.','h1':'اختبار مقياس التسارع','lede':'يقرأ مباشرة مستشعر التسارع في هاتفك أو جهازك اللوحي. يعرض XYZ بالمتر/ثانية²، الاتجاه في مكعب ثلاثي الأبعاد، وعداد الاهتزاز. iOS يطلب إذناً صريحاً.','start':'ابدأ المستشعر','h2':'اختبار مقياس التسارع'},
            'ru': {'title':'Тест акселерометра - датчик движения телефона','desc':'Живое чтение акселерометра телефона или планшета с 3D-кубом, детектором встряхивания и визуализацией XYZ.','h1':'Тест акселерометра','lede':'Читает акселерометр телефона или планшета в реальном времени. Показывает XYZ в м/с², ориентацию в 3D-кубе и счётчик встряхиваний. iOS требует явное разрешение.','start':'Запустить датчик','h2':'Тест акселерометра'},
            'ja': {'title':'加速度センサーテスト - スマホの動きセンサー','desc':'スマートフォンやタブレットの加速度センサーをリアルタイム表示。3D キューブとシェイク検出付き。','h1':'加速度センサーテスト','lede':'スマートフォンやタブレットの加速度センサー(DeviceMotionEvent)をリアルタイムで表示。XYZ を m/s² で、向きを 3D キューブで、シェイクカウンターも。iOS は明示的な許可を求めます。','start':'センサー開始','h2':'加速度センサーテスト'},
            'ko': {'title':'가속도계 테스트 - 모바일 모션 센서','desc':'휴대폰이나 태블릿의 가속도계를 실시간으로 읽고 3D 큐브와 흔들기 감지를 제공합니다.','h1':'가속도계 테스트','lede':'휴대폰이나 태블릿의 가속도계(DeviceMotionEvent)를 실시간으로 표시합니다. XYZ를 m/s²로, 방향을 3D 큐브로, 흔들기 카운터까지. iOS는 명시적 권한을 요청합니다.','start':'센서 시작','h2':'가속도계 테스트'},
        },
    },
    'gyroscope-test': {
        'tool': 'tools/gyroscope_tool.php',
        'kicker': 'sensor',
        'trans': {
            'es': {'title':'Prueba de giroscopio - Orientación del móvil','desc':'Lectura alfa, beta, gamma del giroscopio del móvil con cubo 3D, brújula alfa y calibración a cero.','h1':'Prueba de giroscopio','lede':'Lee el giroscopio de tu móvil o tablet (DeviceOrientationEvent). Muestra alfa/beta/gamma en grados, cubo 3D, anillo de brújula y botón para calibrar a cero desde la posición actual.','start':'Iniciar giroscopio','h2':'Prueba de giroscopio'},
            'fr': {'title':'Test de gyroscope - Orientation du téléphone','desc':'Lecture alpha, beta, gamma du gyroscope avec cube 3D, bague boussole et calibration à zéro.','h1':'Test de gyroscope','lede':'Lit le gyroscope de votre téléphone ou tablette (DeviceOrientationEvent). Affiche alpha/beta/gamma en degrés, un cube 3D, un anneau boussole et un bouton de calibration à zéro depuis la position actuelle.','start':'Démarrer gyroscope','h2':'Test de gyroscope'},
            'de': {'title':'Gyroskop-Test - Handy-Ausrichtung','desc':'Alpha-, Beta-, Gamma-Auslesung des Gyroskops mit 3D-Würfel, Kompassring und Nullkalibrierung.','h1':'Gyroskop-Test','lede':'Liest das Gyroskop Ihres Handys oder Tablets (DeviceOrientationEvent). Zeigt Alpha/Beta/Gamma in Grad, einen 3D-Würfel, einen Kompassring und eine Taste zum Nullen ab aktueller Position.','start':'Gyroskop starten','h2':'Gyroskop-Test'},
            'pt': {'title':'Teste de giroscópio - Orientação do celular','desc':'Leitura alfa, beta, gama do giroscópio com cubo 3D, anel de bússola e calibração a zero.','h1':'Teste de giroscópio','lede':'Lê o giroscópio do seu celular ou tablet (DeviceOrientationEvent). Mostra alfa/beta/gama em graus, cubo 3D, anel de bússola e botão para zerar a partir da posição atual.','start':'Iniciar giroscópio','h2':'Teste de giroscópio'},
            'ar': {'title':'اختبار الجيروسكوب - اتجاه الهاتف','desc':'قراءة ألفا وبيتا وجاما للجيروسكوب مع مكعب ثلاثي الأبعاد وحلقة بوصلة ومعايرة إلى الصفر.','h1':'اختبار الجيروسكوب','lede':'يقرأ الجيروسكوب في هاتفك أو جهازك اللوحي. يعرض ألفا وبيتا وجاما بالدرجات، مكعباً ثلاثي الأبعاد، حلقة بوصلة، وزرّاً لمعايرة الوضع الحالي إلى صفر.','start':'ابدأ الجيروسكوب','h2':'اختبار الجيروسكوب'},
            'ru': {'title':'Тест гироскопа - ориентация телефона','desc':'Чтение альфа, бета, гамма гироскопа с 3D-кубом, кольцом компаса и калибровкой на ноль.','h1':'Тест гироскопа','lede':'Читает гироскоп вашего телефона или планшета (DeviceOrientationEvent). Показывает альфа/бета/гамма в градусах, 3D-куб, кольцо компаса и кнопку обнуления от текущего положения.','start':'Запустить гироскоп','h2':'Тест гироскопа'},
            'ja': {'title':'ジャイロスコープテスト - 端末の向き','desc':'ジャイロスコープの alpha / beta / gamma をリアルタイム表示。3D キューブ、コンパスリング、ゼロ校正機能付き。','h1':'ジャイロスコープテスト','lede':'端末のジャイロスコープ(DeviceOrientationEvent)を表示。alpha / beta / gamma を度で、向きを 3D キューブと方位リングで、現在位置をゼロに校正するボタン付き。','start':'ジャイロ開始','h2':'ジャイロスコープテスト'},
            'ko': {'title':'자이로스코프 테스트 - 기기 방향','desc':'자이로스코프의 알파, 베타, 감마를 3D 큐브와 나침반 링, 영점 보정 기능과 함께 표시합니다.','h1':'자이로스코프 테스트','lede':'기기의 자이로스코프(DeviceOrientationEvent)를 읽습니다. 알파/베타/감마를 도 단위로, 방향을 3D 큐브와 나침반 링으로, 현재 위치를 영점으로 보정하는 버튼도 제공합니다.','start':'자이로 시작','h2':'자이로스코프 테스트'},
        },
    },
    'vibration-test': {
        'tool': 'tools/vibration_tool.php',
        'kicker': 'sensor',
        'trans': {
            'es': {'title':'Prueba de vibración - Haptic del móvil y rumble del gamepad','desc':'Prueba la API Vibration del móvil con patrones (pulso, SOS, latido) y el rumble del gamepad con sliders por motor.','h1':'Prueba de vibración','lede':'Prueba la vibración del móvil (Vibration API) con patrones presets y el rumble del mando con sliders por motor. Todo en el navegador, sin instalar nada.','start':'Iniciar vibración','h2':'Prueba de vibración'},
            'fr': {'title':'Test de vibration - Haptique du téléphone et rumble manette','desc':'Testez la Vibration API du téléphone avec des motifs (pulse, SOS, battement) et le rumble de la manette avec sliders par moteur.','h1':'Test de vibration','lede':'Teste la vibration du téléphone (Vibration API) avec des motifs préréglés et le rumble de la manette avec des sliders par moteur. Tout dans le navigateur, sans installation.','start':'Démarrer','h2':'Test de vibration'},
            'de': {'title':'Vibrationstest - Handy-Haptik und Gamepad-Rumble','desc':'Testen Sie die Vibration-API des Handys mit Mustern und das Gamepad-Rumble mit Reglern pro Motor.','h1':'Vibrationstest','lede':'Testet die Handy-Vibration (Vibration API) mit Preset-Mustern und das Gamepad-Rumble mit Reglern pro Motor. Alles im Browser, ohne Installation.','start':'Vibration starten','h2':'Vibrationstest'},
            'pt': {'title':'Teste de vibração - Háptica do celular e rumble do gamepad','desc':'Teste a Vibration API do celular com padrões (pulso, SOS, batida) e o rumble do gamepad com sliders por motor.','h1':'Teste de vibração','lede':'Testa a vibração do celular (Vibration API) com padrões predefinidos e o rumble do controle com sliders por motor. Tudo no navegador, sem instalação.','start':'Iniciar vibração','h2':'Teste de vibração'},
            'ar': {'title':'اختبار الاهتزاز - لمس الهاتف واهتزاز لوحة الألعاب','desc':'اختبر واجهة الاهتزاز في الهاتف بأنماط محددة واهتزاز لوحة التحكم مع تمرير لكل محرك.','h1':'اختبار الاهتزاز','lede':'يختبر اهتزاز الهاتف (Vibration API) بأنماط محددة واهتزاز يد التحكم بتمريرات لكل محرك. كل ذلك في المتصفح دون تثبيت.','start':'ابدأ الاهتزاز','h2':'اختبار الاهتزاز'},
            'ru': {'title':'Тест вибрации - тактильная отдача телефона и геймпада','desc':'Проверьте Vibration API телефона с пресетами и вибрацию геймпада с раздельными ползунками.','h1':'Тест вибрации','lede':'Проверяет вибрацию телефона (Vibration API) с пресетами паттернов и вибрацию геймпада со слайдерами отдельно для каждого мотора. Всё в браузере, без установки.','start':'Запустить','h2':'Тест вибрации'},
            'ja': {'title':'バイブレーションテスト - スマホの振動とコントローラーのランブル','desc':'スマホの Vibration API を定型パターンでテストし、コントローラーのランブルをモーター別スライダーで調整。','h1':'バイブレーションテスト','lede':'スマホの振動(Vibration API)をプリセットパターンでテストし、コントローラーのランブルをモーター別スライダーで調整。インストール不要、ブラウザだけで動作。','start':'テスト開始','h2':'バイブレーションテスト'},
            'ko': {'title':'진동 테스트 - 휴대폰 햅틱 및 게임패드 럼블','desc':'휴대폰의 Vibration API를 프리셋 패턴으로, 게임패드 럼블을 모터별 슬라이더로 테스트합니다.','h1':'진동 테스트','lede':'휴대폰 진동(Vibration API)을 프리셋 패턴으로 테스트하고, 게임패드 럼블을 모터별 슬라이더로 조정합니다. 설치 없이 브라우저에서만 동작합니다.','start':'진동 시작','h2':'진동 테스트'},
        },
    },
    'gamertag-generator': {
        'tool': 'tools/gamertag_tool.php',
        'kicker': 'gaming',
        'trans': {
            'es': {'title':'Generador de Gamertag - Nombres aleatorios para Xbox, PSN, Steam','desc':'Genera 10 gamertags al azar en 6 estilos (edgy, funny, cute, pro, fantasy, cyber) con límites de Xbox, PSN, Steam y Discord.','h1':'Generador de Gamertag','lede':'Genera 10 gamertags aleatorios en 6 estilos (edgy, funny, cute, pro, fantasy, cyber). Copia con un clic, guarda favoritos en tu navegador y limita la longitud para Xbox/PSN/Steam/Discord.','start':'Generar nombres','h2':'Generador de Gamertag'},
            'fr': {'title':'Générateur de Gamertag - Pseudos aléatoires Xbox, PSN, Steam','desc':'Générez 10 pseudos gamer aléatoires en 6 styles (edgy, funny, cute, pro, fantasy, cyber) avec limites Xbox, PSN, Steam et Discord.','h1':'Générateur de Gamertag','lede':'Génère 10 pseudos aléatoires en 6 styles (edgy, funny, cute, pro, fantasy, cyber). Copiez en un clic, enregistrez vos favoris et limitez la longueur pour Xbox/PSN/Steam/Discord.','start':'Générer des noms','h2':'Générateur de Gamertag'},
            'de': {'title':'Gamertag-Generator - Zufällige Namen für Xbox, PSN, Steam','desc':'Generieren Sie 10 zufällige Gamertags in 6 Stilen mit Längenlimits für Xbox, PSN, Steam und Discord.','h1':'Gamertag-Generator','lede':'Erzeugt 10 zufällige Gamertags in 6 Stilen (edgy, funny, cute, pro, fantasy, cyber). Mit einem Klick kopieren, Favoriten im Browser speichern, Längenlimits für Xbox/PSN/Steam/Discord.','start':'Namen generieren','h2':'Gamertag-Generator'},
            'pt': {'title':'Gerador de Gamertag - Nomes aleatórios para Xbox, PSN, Steam','desc':'Gere 10 gamertags aleatórios em 6 estilos (edgy, funny, cute, pro, fantasy, cyber) com limites de Xbox, PSN, Steam e Discord.','h1':'Gerador de Gamertag','lede':'Gera 10 gamertags aleatórios em 6 estilos (edgy, funny, cute, pro, fantasy, cyber). Copie com um clique, salve favoritos e limite o tamanho para Xbox/PSN/Steam/Discord.','start':'Gerar nomes','h2':'Gerador de Gamertag'},
            'ar': {'title':'مولد أسماء اللاعبين - أسماء عشوائية لـ Xbox و PSN و Steam','desc':'يولد 10 أسماء لاعبين عشوائية في 6 أنماط مع حدود طول Xbox و PSN و Steam و Discord.','h1':'مولد أسماء اللاعبين','lede':'يولد 10 أسماء لاعبين عشوائية في 6 أنماط. انسخ بنقرة واحدة، احفظ المفضلة في متصفحك، وحدد الطول ليناسب Xbox و PSN و Steam و Discord.','start':'إنشاء أسماء','h2':'مولد أسماء اللاعبين'},
            'ru': {'title':'Генератор геймертегов - случайные ники для Xbox, PSN, Steam','desc':'Генерирует 10 случайных геймертегов в 6 стилях с лимитами Xbox, PSN, Steam и Discord.','h1':'Генератор геймертегов','lede':'Генерирует 10 случайных ников в 6 стилях (edgy, funny, cute, pro, fantasy, cyber). Копирование в один клик, избранное в браузере, контроль длины под Xbox/PSN/Steam/Discord.','start':'Создать ники','h2':'Генератор геймертегов'},
            'ja': {'title':'ゲーマータグ生成 - Xbox・PSN・Steam 向けランダム名','desc':'6 スタイル(edgy / funny / cute / pro / fantasy / cyber)で 10 個のゲーマー名を生成。Xbox・PSN・Steam・Discord の長さ制限に対応。','h1':'ゲーマータグ生成','lede':'6 スタイルで 10 個のランダムなゲーマー名を生成。ワンクリックコピー、ブラウザ内のお気に入り保存、Xbox・PSN・Steam・Discord の長さ制限に合わせられます。','start':'名前を生成','h2':'ゲーマータグ生成'},
            'ko': {'title':'게이머태그 생성기 - Xbox, PSN, Steam용 랜덤 이름','desc':'6가지 스타일로 10개의 게이머 이름을 생성합니다. Xbox, PSN, Steam, Discord 길이 제한을 준수합니다.','h1':'게이머태그 생성기','lede':'6가지 스타일(edgy/funny/cute/pro/fantasy/cyber)로 랜덤 이름 10개 생성. 원클릭 복사, 브라우저에 즐겨찾기 저장, Xbox/PSN/Steam/Discord 길이 제한 준수.','start':'이름 생성','h2':'게이머태그 생성기'},
        },
    },
    # WAVE 4
    'guild-name-generator': {
        'tool': 'tools/guild_name_generator_tool.php',
        'kicker': 'gaming',
        'trans': {
            'es': {'title':'Generador de nombres de clan - Nombres de guild para MMO','desc':'Generador de nombres de clan y guild MMO en 6 temáticas y 5 plantillas, con límites de WoW, FFXIV, Destiny y Discord.','h1':'Generador de nombres de clan','lede':'Genera 10 nombres de guild aleatorios en 6 temáticas (fantasía, sci-fi, oscura, noble, rogue, mítica) con plantillas como "Orden de X", "Casa de X" o "Los X". Copia con un clic y guarda favoritos.','start':'Generar nombres','h2':'Generador de nombres de clan'},
            'fr': {'title':'Générateur de noms de guilde - Noms de clan MMO','desc':'Générateur de noms de guilde et clan MMO en 6 thèmes et 5 modèles, avec limites WoW, FFXIV, Destiny et Discord.','h1':'Générateur de noms de guilde','lede':'Génère 10 noms de guilde aléatoires en 6 thèmes (fantasy, sci-fi, sombre, noble, rogue, mythique) avec des modèles comme "Ordre de X", "Maison X", "Les X". Copie en un clic et favoris sauvegardés.','start':'Générer des noms','h2':'Générateur de noms de guilde'},
            'de': {'title':'Gilden-Namen-Generator - MMO-Clan-Namen','desc':'Generator für MMO-Gilden- und Clan-Namen in 6 Themen und 5 Vorlagen mit Limits für WoW, FFXIV, Destiny und Discord.','h1':'Gilden-Namen-Generator','lede':'Erzeugt 10 zufällige Gildennamen in 6 Themen (Fantasy, Sci-Fi, dunkel, edel, Schurken, Mythos) mit Vorlagen wie "Orden von X", "Haus X", "Die X". Mit einem Klick kopieren, Favoriten im Browser.','start':'Namen generieren','h2':'Gilden-Namen-Generator'},
            'pt': {'title':'Gerador de nomes de guild - Nomes de clã para MMO','desc':'Gerador de nomes de guild e clã em 6 temas e 5 modelos com limites de WoW, FFXIV, Destiny e Discord.','h1':'Gerador de nomes de guild','lede':'Gera 10 nomes de guild aleatórios em 6 temas (fantasia, ficção, sombrio, nobre, rogue, mítico) com modelos como "Ordem de X", "Casa X", "Os X". Cópia em um clique e favoritos.','start':'Gerar nomes','h2':'Gerador de nomes de guild'},
            'ar': {'title':'مولد أسماء الجيلد - أسماء عشائر MMO','desc':'مولد أسماء جيلد وعشائر MMO في 6 سمات و 5 قوالب، مع حدود WoW و FFXIV و Destiny و Discord.','h1':'مولد أسماء الجيلد','lede':'يولد 10 أسماء جيلد عشوائية في 6 سمات (خيالية، خيال علمي، مظلمة، نبيلة، خارجة عن القانون، أسطورية) بقوالب مثل "نظام X" و "بيت X" و "الـ X". نسخ بنقرة واحدة ومفضلات.','start':'إنشاء أسماء','h2':'مولد أسماء الجيلد'},
            'ru': {'title':'Генератор названий гильдий для MMO','desc':'Генератор названий гильдий и кланов в 6 темах и 5 шаблонах с лимитами WoW, FFXIV, Destiny и Discord.','h1':'Генератор названий гильдий','lede':'Создаёт 10 случайных названий гильдий в 6 темах (фэнтези, sci-fi, тёмная, благородная, разбойники, мифическая) с шаблонами "Орден X", "Дом X", "Те-самые X". Копирование в клик, избранное.','start':'Создать названия','h2':'Генератор названий гильдий'},
            'ja': {'title':'ギルド名ジェネレーター - MMO クラン名','desc':'MMO のギルド・クラン名を 6 テーマ・5 テンプレートで生成。WoW・FFXIV・Destiny・Discord の長さ制限に対応。','h1':'ギルド名ジェネレーター','lede':'6 テーマ(ファンタジー / SF / ダーク / 高貴 / ならず者 / 神話)で 10 個のギルド名を生成。"Order of X"、"House X"、"The Xs" などのテンプレート。ワンクリックコピー、お気に入り保存。','start':'名前を生成','h2':'ギルド名ジェネレーター'},
            'ko': {'title':'길드 이름 생성기 - MMO 클랜 이름','desc':'MMO 길드/클랜 이름을 6개 테마와 5개 템플릿으로 생성합니다. WoW, FFXIV, Destiny, Discord 길이 제한 준수.','h1':'길드 이름 생성기','lede':'6가지 테마(판타지/SF/다크/고귀/로그/신화)로 길드 이름 10개 생성. "Order of X", "House X", "The Xs" 등의 템플릿 사용. 원클릭 복사, 즐겨찾기 저장.','start':'이름 생성','h2':'길드 이름 생성기'},
        },
    },
    'auditory-reaction-time-test': {
        'tool': 'tools/auditory_reaction_time_tool.php',
        'kicker': 'audio',
        'trans': {
            'es': {'title':'Prueba de tiempo de reacción auditiva - Respuesta a un sonido','desc':'Prueba tu tiempo de reacción a un tono con la Web Audio API. 5 rondas con media, mejor, peor y detección de salida en falso.','h1':'Prueba de tiempo de reacción auditiva','lede':'Mide en milisegundos cuán rápido reaccionas a un tono. Un beep suena tras un retardo aleatorio de 1.5 a 4 segundos. Informa media, mejor y peor a lo largo de 5 rondas. Detecta clics antes de tiempo.','start':'Iniciar prueba','h2':'Prueba de reacción auditiva'},
            'fr': {'title':'Test de temps de réaction auditive - Répondre à un son','desc':'Testez votre temps de réaction à un son avec la Web Audio API. 5 tours avec moyenne, meilleur, pire et détection de faux départ.','h1':'Test de temps de réaction auditive','lede':'Mesure en millisecondes votre rapidité à réagir à un son. Un bip retentit après un délai aléatoire de 1,5 à 4 secondes. Moyenne, meilleur et pire sur 5 tours. Détecte les faux départs.','start':'Lancer le test','h2':'Test de réaction auditive'},
            'de': {'title':'Auditiver Reaktionstest - Reaktionszeit auf Töne','desc':'Testen Sie Ihre Reaktionszeit auf einen Ton mit der Web Audio API. 5 Runden mit Durchschnitt, Bestzeit, schlechtester Zeit und Fehlstart-Erkennung.','h1':'Auditiver Reaktionstest','lede':'Misst in Millisekunden, wie schnell Sie auf einen Ton reagieren. Ein Piepton ertönt nach zufälliger Verzögerung von 1,5 bis 4 Sekunden. Durchschnitt, Best- und Schlechtzeit über 5 Runden. Fehlstart-Erkennung inklusive.','start':'Test starten','h2':'Auditiver Reaktionstest'},
            'pt': {'title':'Teste de tempo de reação auditiva - Resposta a um som','desc':'Teste seu tempo de reação a um tom com a Web Audio API. 5 rodadas com média, melhor, pior e detecção de largada falsa.','h1':'Teste de tempo de reação auditiva','lede':'Mede em milissegundos o quão rápido você reage a um som. Um beep soa após atraso aleatório de 1,5 a 4 segundos. Média, melhor e pior em 5 rodadas. Detecta largadas falsas.','start':'Iniciar teste','h2':'Teste de reação auditiva'},
            'ar': {'title':'اختبار زمن رد الفعل السمعي - الاستجابة للصوت','desc':'اختبر زمن رد فعلك على نغمة باستخدام Web Audio API. 5 جولات مع متوسط وأفضل وأسوأ وكشف البدء المبكر.','h1':'اختبار زمن رد الفعل السمعي','lede':'يقيس بالمللي ثانية سرعة استجابتك لنغمة. يصدر الصفير بعد تأخير عشوائي من 1.5 إلى 4 ثوان. المتوسط والأفضل والأسوأ عبر 5 جولات وكشف البدء المبكر.','start':'ابدأ الاختبار','h2':'اختبار زمن رد الفعل السمعي'},
            'ru': {'title':'Тест слуховой реакции - Скорость отклика на звук','desc':'Тест скорости реакции на звук через Web Audio API. 5 раундов со средним, лучшим, худшим временем и детектором фальстарта.','h1':'Тест слуховой реакции','lede':'Измеряет в миллисекундах, как быстро вы реагируете на тон. Сигнал звучит после случайной задержки 1,5-4 с. Среднее, лучшее и худшее за 5 раундов. Детектор фальстарта.','start':'Запустить','h2':'Тест слуховой реакции'},
            'ja': {'title':'聴覚反応時間テスト - 音への反応速度','desc':'Web Audio API で音に対する反応時間を計測。5 ラウンドで平均・ベスト・ワースト、フライング検出付き。','h1':'聴覚反応時間テスト','lede':'音にどれだけ速く反応できるかをミリ秒で計測。1.5 から 4 秒のランダムな遅延の後にビープ音。5 ラウンドで平均・ベスト・ワーストを表示。フライング検出。','start':'テスト開始','h2':'聴覚反応時間テスト'},
            'ko': {'title':'청각 반응 시간 테스트 - 소리 반응 속도','desc':'Web Audio API로 소리 반응 시간을 측정합니다. 5라운드 평균/최고/최저, 조기 클릭 감지 포함.','h1':'청각 반응 시간 테스트','lede':'소리에 얼마나 빠르게 반응하는지 밀리초로 측정. 1.5-4초 랜덤 지연 후 비프음이 울립니다. 5라운드 평균/최고/최저 기록, 조기 클릭 감지 포함.','start':'테스트 시작','h2':'청각 반응 시간 테스트'},
        },
    },
    'frame-skipping-test': {
        'tool': 'tools/frame_skipping_tool.php',
        'kicker': 'display',
        'trans': {
            'es': {'title':'Prueba de frames saltados - Detecta frames perdidos','desc':'Detecta frames saltados o perdidos en tu frecuencia de refresco mediante análisis de rAF timestamp. Auto-calibra tu Hz.','h1':'Prueba de frames saltados','lede':'Detecta frames saltados o perdidos mediante análisis de timestamps de requestAnimationFrame. Auto-calibra tu frecuencia de refresco y marca como skip cualquier frame > 1.5x el intervalo esperado.','start':'Iniciar prueba','h2':'Prueba de frames saltados'},
            'fr': {'title':'Test de frames sautés - Détecte les frames perdues','desc':'Détecte les frames sautées ou perdues à votre taux de rafraîchissement via l’analyse des timestamps rAF. Auto-calibrage du Hz.','h1':'Test de frames sautés','lede':'Détecte les frames sautées ou perdues via l’analyse des timestamps de requestAnimationFrame. Auto-calibre votre taux de rafraîchissement et signale toute frame > 1,5x l’intervalle attendu.','start':'Lancer le test','h2':'Test de frames sautés'},
            'de': {'title':'Frame-Skipping-Test - Erkennt fallengelassene Frames','desc':'Erkennt fallengelassene oder übersprungene Frames bei Ihrer Bildwiederholrate durch rAF-Timestamp-Analyse. Auto-Kalibrierung.','h1':'Frame-Skipping-Test','lede':'Erkennt fallengelassene oder übersprungene Frames durch Analyse der requestAnimationFrame-Timestamps. Kalibriert Ihre Bildwiederholrate automatisch und markiert Frames > 1,5x des erwarteten Intervalls.','start':'Test starten','h2':'Frame-Skipping-Test'},
            'pt': {'title':'Teste de frames perdidos - Detecta frames descartados','desc':'Detecta frames perdidos ou descartados na sua taxa de atualização via análise de timestamps rAF. Auto-calibra o Hz.','h1':'Teste de frames perdidos','lede':'Detecta frames perdidos ou descartados analisando timestamps do requestAnimationFrame. Auto-calibra sua taxa de atualização e sinaliza qualquer frame > 1,5x o intervalo esperado.','start':'Iniciar teste','h2':'Teste de frames perdidos'},
            'ar': {'title':'اختبار تخطي الإطارات - يكتشف الإطارات المفقودة','desc':'يكتشف الإطارات المفقودة أو المتخطاة عند معدل التحديث عبر تحليل طوابع rAF الزمنية. معايرة تلقائية.','h1':'اختبار تخطي الإطارات','lede':'يكتشف الإطارات المفقودة عبر تحليل طوابع requestAnimationFrame. يعاير معدل التحديث تلقائياً ويضع علامة على أي إطار يتجاوز 1.5 من الفاصل المتوقع.','start':'ابدأ الاختبار','h2':'اختبار تخطي الإطارات'},
            'ru': {'title':'Тест пропуска кадров - Обнаружение потерянных кадров','desc':'Обнаруживает пропущенные кадры при вашей частоте обновления через анализ временных меток rAF. Автокалибровка Hz.','h1':'Тест пропуска кадров','lede':'Обнаруживает пропущенные кадры через анализ временных меток requestAnimationFrame. Автоматически калибрует частоту обновления и помечает кадры > 1,5x ожидаемого интервала.','start':'Запустить','h2':'Тест пропуска кадров'},
            'ja': {'title':'フレームスキップテスト - ドロップフレーム検出','desc':'requestAnimationFrame のタイムスタンプ解析で、現在のリフレッシュレートでのドロップフレームを検出。自動キャリブレーション。','h1':'フレームスキップテスト','lede':'requestAnimationFrame タイムスタンプ解析でフレームスキップを検出。リフレッシュレートを自動キャリブレーションし、想定間隔の 1.5 倍を超えるフレームを検出。','start':'テスト開始','h2':'フレームスキップテスト'},
            'ko': {'title':'프레임 스킵 테스트 - 드롭된 프레임 감지','desc':'requestAnimationFrame 타임스탬프 분석으로 현재 주사율에서 드롭된 프레임을 감지합니다. 자동 보정.','h1':'프레임 스킵 테스트','lede':'requestAnimationFrame 타임스탬프 분석으로 드롭 프레임을 감지합니다. 주사율을 자동 보정하고 예상 간격의 1.5배를 초과하는 프레임을 스킵으로 표시합니다.','start':'테스트 시작','h2':'프레임 스킵 테스트'},
        },
    },
    'surround-sound-test': {
        'tool': 'tools/surround_sound_tool.php',
        'kicker': 'audio',
        'trans': {
            'es': {'title':'Prueba de sonido envolvente - Canales 5.1 y 7.1','desc':'Recorrido por canales 5.1 y 7.1 para verificar cableado y colocación de altavoces. Fallback a paneo estéreo para auriculares.','h1':'Prueba de sonido envolvente','lede':'Recorre los canales 5.1 o 7.1 uno a uno para verificar que cada altavoz está conectado al canal correcto. Si el navegador no entrega multicanal, pasa a paneo estéreo para que los usuarios con auriculares también validen el orden.','start':'Iniciar prueba','h2':'Prueba de sonido envolvente'},
            'fr': {'title':'Test son surround - Canaux 5.1 et 7.1','desc':'Parcours des canaux 5.1 et 7.1 pour vérifier le câblage et le placement des enceintes. Fallback en panoramique stéréo pour casque.','h1':'Test son surround','lede':'Parcourt les canaux 5.1 ou 7.1 un par un pour vérifier que chaque enceinte est raccordée au bon canal. Si le navigateur ne délivre pas de multicanal, passage en panoramique stéréo pour que les utilisateurs au casque puissent valider l’ordre.','start':'Lancer le test','h2':'Test son surround'},
            'de': {'title':'Surround-Sound-Test - 5.1- und 7.1-Kanäle','desc':'Kanalrundgang für 5.1 und 7.1 zur Prüfung der Verkabelung und Lautsprecherpositionen. Stereo-Panning-Fallback für Kopfhörer.','h1':'Surround-Sound-Test','lede':'Geht die 5.1- oder 7.1-Kanäle einzeln durch, um die Verkabelung jedes Lautsprechers zu prüfen. Wenn der Browser keinen Mehrkanalton liefert, fällt der Test auf Stereo-Panning zurück, damit auch Kopfhörernutzer die Reihenfolge prüfen können.','start':'Test starten','h2':'Surround-Sound-Test'},
            'pt': {'title':'Teste de som surround - Canais 5.1 e 7.1','desc':'Percurso pelos canais 5.1 e 7.1 para verificar cabeamento e posicionamento de alto-falantes. Fallback para panorâmica estéreo em fones.','h1':'Teste de som surround','lede':'Percorre os canais 5.1 ou 7.1 um a um para verificar se cada caixa está conectada ao canal correto. Se o navegador não entregar multicanal, cai para panorâmica estéreo para quem estiver de fone de ouvido.','start':'Iniciar teste','h2':'Teste de som surround'},
            'ar': {'title':'اختبار الصوت المحيطي - قنوات 5.1 و 7.1','desc':'تجول عبر قنوات 5.1 و 7.1 للتحقق من توصيلات السماعات ومواقعها. يعود إلى التوزيع الاستريو للسماعات.','h1':'اختبار الصوت المحيطي','lede':'يمر على قنوات 5.1 أو 7.1 واحدة تلو الأخرى للتأكد من أن كل سماعة متصلة بالقناة الصحيحة. إذا لم يقدم المتصفح إخراجاً متعدد القنوات، يتم التبديل إلى التوزيع الاستريو لمستخدمي السماعات.','start':'ابدأ الاختبار','h2':'اختبار الصوت المحيطي'},
            'ru': {'title':'Тест объёмного звука - каналы 5.1 и 7.1','desc':'Обход каналов 5.1 и 7.1 для проверки подключения и размещения колонок. Стерео-панорамный фолбек для наушников.','h1':'Тест объёмного звука','lede':'Прогоняет каналы 5.1 или 7.1 по одному, чтобы убедиться, что каждый динамик подключён к правильному каналу. Если браузер не даёт многоканал, переключается на стерео-панораму для наушников.','start':'Запустить','h2':'Тест объёмного звука'},
            'ja': {'title':'サラウンドサウンドテスト - 5.1 / 7.1 チャンネル','desc':'5.1 / 7.1 チャンネルを順番に再生してスピーカー配線と配置を確認。ヘッドホンにはステレオパン代替モード。','h1':'サラウンドサウンドテスト','lede':'5.1 または 7.1 の各チャンネルを順番に鳴らし、各スピーカーが正しいチャンネルに繋がっているかを確認。ブラウザがマルチチャンネル出力に対応していなければステレオパンにフォールバック。','start':'テスト開始','h2':'サラウンドサウンドテスト'},
            'ko': {'title':'서라운드 사운드 테스트 - 5.1 / 7.1 채널','desc':'5.1 / 7.1 채널 워크어라운드로 스피커 배선과 배치를 확인합니다. 헤드폰용 스테레오 패닝 폴백 포함.','h1':'서라운드 사운드 테스트','lede':'5.1 또는 7.1 채널을 하나씩 재생하여 각 스피커가 올바른 채널에 연결되었는지 확인합니다. 브라우저가 멀티채널을 제공하지 못하면 스테레오 패닝으로 폴백되어 헤드폰 사용자도 순서를 확인할 수 있습니다.','start':'테스트 시작','h2':'서라운드 사운드 테스트'},
        },
    },
    'cpu-stress-test': {
        'tool': 'tools/cpu_stress_tool.php',
        'kicker': 'hardware',
        'trans': {
            'es': {'title':'Prueba de estrés de CPU - Benchmark WebWorker en el navegador','desc':'Prueba de estrés de CPU multihilo con loops SHA-256 en WebWorkers. Reporta ops/seg total y por hilo. Detecta throttling térmico.','h1':'Prueba de estrés de CPU','lede':'Lanza WebWorkers hasta el número de núcleos lógicos para cargar la CPU con loops SHA-256. Reporta operaciones por segundo totales y por hilo para detectar throttling térmico. Sin instalación.','start':'Iniciar estrés','h2':'Prueba de estrés de CPU'},
            'fr': {'title':'Test de stress CPU - Benchmark WebWorker dans le navigateur','desc':'Test de stress CPU multithread avec boucles SHA-256 dans WebWorkers. Reporte ops/s total et par thread. Détecte le throttling thermique.','h1':'Test de stress CPU','lede':'Lance des WebWorkers jusqu’au nombre de cœurs logiques pour charger le CPU avec des boucles SHA-256. Reporte ops/s total et par thread pour détecter le throttling thermique. Sans installation.','start':'Démarrer le stress','h2':'Test de stress CPU'},
            'de': {'title':'CPU-Stresstest - WebWorker-Benchmark im Browser','desc':'Multithreaded CPU-Stresstest mit SHA-256-Loops in WebWorkers. Berichtet Ops/s gesamt und pro Thread. Erkennt thermisches Throttling.','h1':'CPU-Stresstest','lede':'Startet WebWorkers bis zur Anzahl der logischen Kerne und belastet die CPU mit SHA-256-Loops. Ops/s gesamt und pro Thread zum Erkennen von thermischem Throttling. Ohne Installation.','start':'Stress starten','h2':'CPU-Stresstest'},
            'pt': {'title':'Teste de estresse de CPU - Benchmark WebWorker no navegador','desc':'Teste de estresse de CPU multithread com loops SHA-256 em WebWorkers. Informa ops/seg total e por thread. Detecta throttling térmico.','h1':'Teste de estresse de CPU','lede':'Dispara WebWorkers até o número de núcleos lógicos para carregar a CPU com loops SHA-256. Informa ops/s total e por thread para detectar throttling térmico. Sem instalação.','start':'Iniciar estresse','h2':'Teste de estresse de CPU'},
            'ar': {'title':'اختبار إجهاد المعالج - قياس أداء WebWorker في المتصفح','desc':'اختبار إجهاد متعدد الخيوط مع حلقات SHA-256 في WebWorkers. يقدم عمليات/ثانية إجمالاً ولكل خيط. يكتشف الخنق الحراري.','h1':'اختبار إجهاد المعالج','lede':'يطلق WebWorkers بعدد الأنوية المنطقية لتحميل المعالج بحلقات SHA-256. يقدم العمليات/الثانية إجماليا ولكل خيط لكشف الخنق الحراري. بدون تثبيت.','start':'ابدأ الإجهاد','h2':'اختبار إجهاد المعالج'},
            'ru': {'title':'Стресс-тест CPU - Бенчмарк WebWorker в браузере','desc':'Многопоточный стресс-тест CPU с циклами SHA-256 в WebWorker. Выдаёт операции/с всего и на поток. Обнаруживает тепловой троттлинг.','h1':'Стресс-тест CPU','lede':'Запускает WebWorker по числу логических ядер для нагрузки CPU циклами SHA-256. Выводит операции/с всего и на поток для выявления теплового троттлинга. Без установки.','start':'Запустить','h2':'Стресс-тест CPU'},
            'ja': {'title':'CPU ストレステスト - ブラウザの WebWorker ベンチマーク','desc':'WebWorker 上で SHA-256 ループを回すマルチスレッド CPU ストレステスト。総合 ops/s とスレッド別を報告、熱スロットリングを検出。','h1':'CPU ストレステスト','lede':'論理コア数まで WebWorker を起動し、SHA-256 ループで CPU を高負荷にします。総合およびスレッド別の ops/s を表示、熱スロットリングを検出。インストール不要。','start':'ストレス開始','h2':'CPU ストレステスト'},
            'ko': {'title':'CPU 스트레스 테스트 - 브라우저 WebWorker 벤치마크','desc':'WebWorker 위에서 SHA-256 루프를 도는 멀티스레드 CPU 스트레스 테스트. 총/스레드별 ops/s 보고, 열 스로틀링 감지.','h1':'CPU 스트레스 테스트','lede':'논리 코어 수만큼 WebWorker를 생성해 SHA-256 루프로 CPU에 부하를 겁니다. 총/스레드별 ops/s를 보여주어 열 스로틀링을 감지합니다. 설치 불필요.','start':'스트레스 시작','h2':'CPU 스트레스 테스트'},
        },
    },
    'gpu-stress-test': {
        'tool': 'tools/gpu_stress_tool.php',
        'kicker': 'hardware',
        'trans': {
            'es': {'title':'Prueba de estrés de GPU - Benchmark de shader WebGL','desc':'Shader fragment Mandelbrot en WebGL2 para estresar cualquier GPU. Reporta FPS, FPS mínimo y detecta fallback a software rendering.','h1':'Prueba de estrés de GPU','lede':'Renderiza un shader fragment Mandelbrot de alta iteración en WebGL2 para cargar cualquier GPU. Reporta FPS instantáneo, media de 1s, FPS mínimo y detecta si estás usando renderizado por software (SwiftShader).','start':'Iniciar estrés','h2':'Prueba de estrés de GPU'},
            'fr': {'title':'Test de stress GPU - Benchmark shader WebGL','desc':'Shader fragment Mandelbrot en WebGL2 pour stresser toute GPU. Rapporte FPS, FPS minimum et détecte le fallback rendu logiciel.','h1':'Test de stress GPU','lede':'Rend un shader fragment Mandelbrot à forte itération en WebGL2 pour charger n’importe quel GPU. Rapporte FPS instantané, moyenne 1 s, FPS minimum et détecte le rendu logiciel (SwiftShader).','start':'Démarrer le stress','h2':'Test de stress GPU'},
            'de': {'title':'GPU-Stresstest - WebGL-Shader-Benchmark','desc':'Mandelbrot-Fragment-Shader in WebGL2 zum Stressen jeder GPU. Meldet FPS, Minimum-FPS und erkennt Software-Rendering-Fallback.','h1':'GPU-Stresstest','lede':'Rendert einen hochiterativen Mandelbrot-Fragment-Shader in WebGL2, um jede GPU zu belasten. Sofort-FPS, 1-s-Durchschnitt, Minimum-FPS und Erkennung von Software-Rendering (SwiftShader).','start':'Stress starten','h2':'GPU-Stresstest'},
            'pt': {'title':'Teste de estresse de GPU - Benchmark de shader WebGL','desc':'Shader fragment Mandelbrot em WebGL2 para estressar qualquer GPU. Informa FPS, FPS mínimo e detecta fallback de renderização por software.','h1':'Teste de estresse de GPU','lede':'Renderiza um shader fragment Mandelbrot de alta iteração em WebGL2 para carregar qualquer GPU. Informa FPS instantâneo, média de 1 s, FPS mínimo e detecta renderização por software (SwiftShader).','start':'Iniciar estresse','h2':'Teste de estresse de GPU'},
            'ar': {'title':'اختبار إجهاد GPU - قياس أداء شادر WebGL','desc':'شادر جزيئي لمندلبرو في WebGL2 لإجهاد أي GPU. يقدم FPS وأدنى FPS ويكتشف التراجع إلى الرسم البرمجي.','h1':'اختبار إجهاد GPU','lede':'يرسم شادر جزيئي Mandelbrot عالي التكرار في WebGL2 لتحميل أي GPU. يقدم FPS اللحظي ومتوسط الثانية وأدنى FPS، ويكتشف الرسم البرمجي (SwiftShader).','start':'ابدأ الإجهاد','h2':'اختبار إجهاد GPU'},
            'ru': {'title':'Стресс-тест GPU - Бенчмарк шейдера WebGL','desc':'Фрагментный шейдер Мандельброта на WebGL2 для нагрузки любой GPU. Показывает FPS, минимум FPS и обнаруживает программный рендер.','h1':'Стресс-тест GPU','lede':'Рендерит высокоитерационный Mandelbrot-фрагментный шейдер на WebGL2, чтобы нагрузить любую GPU. Показывает мгновенный FPS, среднее за 1 с, минимум и обнаруживает программный рендер (SwiftShader).','start':'Запустить','h2':'Стресс-тест GPU'},
            'ja': {'title':'GPU ストレステスト - WebGL シェーダーベンチマーク','desc':'WebGL2 で Mandelbrot フラグメントシェーダーを回して任意の GPU を負荷試験。FPS、最低 FPS、ソフトウェアレンダリング検出。','h1':'GPU ストレステスト','lede':'WebGL2 で高反復 Mandelbrot フラグメントシェーダーをレンダリングし、GPU に負荷をかけます。瞬間 FPS、1 秒移動平均、最低 FPS、およびソフトウェアレンダリング(SwiftShader)検出。','start':'ストレス開始','h2':'GPU ストレステスト'},
            'ko': {'title':'GPU 스트레스 테스트 - WebGL 셰이더 벤치마크','desc':'WebGL2 Mandelbrot 프래그먼트 셰이더로 모든 GPU에 부하를 겁니다. FPS, 최저 FPS, 소프트웨어 렌더링 감지.','h1':'GPU 스트레스 테스트','lede':'WebGL2에서 고반복 Mandelbrot 프래그먼트 셰이더를 렌더링하여 모든 GPU에 부하를 줍니다. 즉시 FPS, 1초 평균, 최저 FPS를 보고하고 소프트웨어 렌더링(SwiftShader) 여부를 감지합니다.','start':'스트레스 시작','h2':'GPU 스트레스 테스트'},
        },
    },
    'memory-test': {
        'tool': 'tools/memory_test_tool.php',
        'kicker': 'hardware',
        'trans': {
            'es': {'title':'Prueba de memoria - Monitor de heap del navegador','desc':'Monitor de heap con performance.memory (Chrome/Edge) y estresador de asignación por chunks. Aborta automáticamente antes de OOM.','h1':'Prueba de memoria','lede':'Mide el heap del navegador en vivo mediante performance.memory en Chrome y Edge, y permite asignar arrays tipados en chunks de 10 MB para ver el crecimiento. Detiene la asignación automáticamente al 85% del límite.','start':'Abrir prueba','h2':'Prueba de memoria'},
            'fr': {'title':'Test de mémoire - Moniteur de heap du navigateur','desc':'Moniteur de heap avec performance.memory (Chrome/Edge) et stresseur par chunks. Arrêt automatique avant OOM.','h1':'Test de mémoire','lede':'Mesure le heap du navigateur en direct via performance.memory sur Chrome/Edge et permet d’allouer des typed arrays par chunks de 10 Mo pour observer la croissance. Arrêt automatique à 85% de la limite.','start':'Ouvrir le test','h2':'Test de mémoire'},
            'de': {'title':'Speichertest - Browser-Heap-Monitor','desc':'Heap-Monitor über performance.memory (Chrome/Edge) und Allocation-Stresser in Chunks. Automatischer Abbruch vor OOM.','h1':'Speichertest','lede':'Misst den Browser-Heap live über performance.memory in Chrome und Edge und ermöglicht Zuweisung typisierter Arrays in 10-MB-Chunks, um Wachstum zu beobachten. Automatischer Stopp bei 85% des Limits.','start':'Test öffnen','h2':'Speichertest'},
            'pt': {'title':'Teste de memória - Monitor de heap do navegador','desc':'Monitor de heap com performance.memory (Chrome/Edge) e estressador de alocação em chunks. Aborto automático antes do OOM.','h1':'Teste de memória','lede':'Mede o heap do navegador em tempo real via performance.memory em Chrome e Edge, e permite alocar typed arrays em chunks de 10 MB para observar o crescimento. Pára automaticamente a 85% do limite.','start':'Abrir teste','h2':'Teste de memória'},
            'ar': {'title':'اختبار الذاكرة - مراقب ذاكرة المتصفح','desc':'مراقب للكومة عبر performance.memory (Chrome/Edge) ومحمِّل تخصيص بالقطع. إيقاف تلقائي قبل نفاد الذاكرة.','h1':'اختبار الذاكرة','lede':'يقيس كومة المتصفح مباشرة عبر performance.memory في Chrome و Edge، ويسمح بتخصيص typed arrays بقطع 10 ميغابايت لمراقبة النمو. يتوقف تلقائياً عند 85% من الحد.','start':'فتح الاختبار','h2':'اختبار الذاكرة'},
            'ru': {'title':'Тест памяти - монитор кучи браузера','desc':'Монитор кучи через performance.memory (Chrome/Edge) и стрессер аллокаций по чанкам. Автостоп до OOM.','h1':'Тест памяти','lede':'Измеряет кучу браузера в реальном времени через performance.memory в Chrome и Edge, позволяет выделять typed arrays чанками по 10 МБ. Автоматически останавливается на 85% предела.','start':'Открыть тест','h2':'Тест памяти'},
            'ja': {'title':'メモリテスト - ブラウザヒープモニター','desc':'Chrome / Edge の performance.memory を使ったヒープ監視とチャンク単位のアロケーションストレステスト。OOM 前に自動停止。','h1':'メモリテスト','lede':'Chrome と Edge では performance.memory でブラウザヒープをリアルタイム計測。10 MB チャンクで typed array を割り当てヒープ成長を観察できます。上限の 85% で自動停止。','start':'テストを開く','h2':'メモリテスト'},
            'ko': {'title':'메모리 테스트 - 브라우저 힙 모니터','desc':'Chrome/Edge의 performance.memory로 힙을 모니터링하고 10 MB 청크 단위 할당 스트레서 제공. OOM 전에 자동 중단.','h1':'메모리 테스트','lede':'Chrome과 Edge에서 performance.memory로 브라우저 힙을 실시간 측정하고, 10 MB 청크 단위로 typed array를 할당하여 성장 추이를 확인합니다. 힙 한계의 85%에서 자동 중단.','start':'테스트 열기','h2':'메모리 테스트'},
        },
    },
    'ram-latency-calculator': {
        'tool': 'tools/ram_latency_calc_tool.php',
        'kicker': 'calculator',
        'trans': {
            'es': {'title':'Calculadora de latencia de RAM - CAS a nanosegundos','desc':'Convierte latencia CAS (CL) y velocidad (MT/s) a nanosegundos reales. Compara kits DDR4 y DDR5 lado a lado.','h1':'Calculadora de latencia de RAM','lede':'Convierte CL y MT/s en nanosegundos reales con la fórmula ns = (CL × 2000) / MT/s. Compara dos kits DDR4 o DDR5 lado a lado o resuelve al revés: qué CL necesitas para alcanzar un objetivo en ns.','start':'Calcular','h2':'Calculadora de latencia de RAM'},
            'fr': {'title':'Calculatrice de latence RAM - CAS vers nanosecondes','desc':'Convertit latence CAS (CL) et vitesse (MT/s) en nanosecondes réelles. Compare des kits DDR4 et DDR5 côte à côte.','h1':'Calculatrice de latence RAM','lede':'Convertit CL et MT/s en nanosecondes réelles avec la formule ns = (CL × 2000) / MT/s. Compare deux kits DDR4 ou DDR5 côte à côte ou résout à l’envers: quel CL vous faut-il pour une cible en ns.','start':'Calculer','h2':'Calculatrice de latence RAM'},
            'de': {'title':'RAM-Latenz-Rechner - CAS zu Nanosekunden','desc':'Wandelt CAS-Latenz (CL) und Geschwindigkeit (MT/s) in echte Nanosekunden um. Vergleicht DDR4- und DDR5-Kits nebeneinander.','h1':'RAM-Latenz-Rechner','lede':'Wandelt CL und MT/s mit der Formel ns = (CL × 2000) / MT/s in echte Nanosekunden um. Vergleicht zwei DDR4- oder DDR5-Kits nebeneinander oder löst rückwärts: welches CL nötig ist, um ein ns-Ziel zu erreichen.','start':'Berechnen','h2':'RAM-Latenz-Rechner'},
            'pt': {'title':'Calculadora de latência de RAM - CAS para nanossegundos','desc':'Converte latência CAS (CL) e velocidade (MT/s) em nanossegundos reais. Compara kits DDR4 e DDR5 lado a lado.','h1':'Calculadora de latência de RAM','lede':'Converte CL e MT/s em nanossegundos reais com a fórmula ns = (CL × 2000) / MT/s. Compara dois kits DDR4 ou DDR5 lado a lado ou resolve ao contrário: qual CL é preciso para atingir um alvo em ns.','start':'Calcular','h2':'Calculadora de latência de RAM'},
            'ar': {'title':'حاسبة زمن انتقال الذاكرة - CAS إلى النانو ثانية','desc':'تحول زمن CAS (CL) والسرعة (MT/s) إلى نانو ثانية حقيقية. قارن بين كيتات DDR4 و DDR5 جنباً إلى جنب.','h1':'حاسبة زمن انتقال الذاكرة','lede':'تحول CL و MT/s إلى نانو ثانية حقيقية باستخدام الصيغة ns = (CL × 2000) / MT/s. قارن كيتين من DDR4 أو DDR5 جنباً إلى جنب أو احسب بالعكس: ما هو CL اللازم لهدف بالنانو ثانية.','start':'احسب','h2':'حاسبة زمن انتقال الذاكرة'},
            'ru': {'title':'Калькулятор латентности RAM - CAS в наносекунды','desc':'Переводит латентность CAS (CL) и скорость (MT/s) в реальные наносекунды. Сравнивает наборы DDR4 и DDR5.','h1':'Калькулятор латентности RAM','lede':'Переводит CL и MT/s в реальные наносекунды по формуле ns = (CL × 2000) / MT/s. Сравнивает два набора DDR4 или DDR5 рядом или решает обратную задачу: какой CL нужен для заданного ns.','start':'Рассчитать','h2':'Калькулятор латентности RAM'},
            'ja': {'title':'RAM レイテンシ計算ツール - CAS からナノ秒へ','desc':'CAS レイテンシ(CL)と速度(MT/s)を実ナノ秒に変換。DDR4 と DDR5 キットを並べて比較。','h1':'RAM レイテンシ計算ツール','lede':'ns = (CL × 2000) / MT/s の式で CL と MT/s を実ナノ秒に変換。DDR4 または DDR5 キット 2 つを横に並べて比較したり、目標 ns に対応する CL を逆算したりできます。','start':'計算','h2':'RAM レイテンシ計算ツール'},
            'ko': {'title':'RAM 지연 시간 계산기 - CAS를 나노초로','desc':'CAS 지연(CL)과 속도(MT/s)를 실제 나노초로 변환합니다. DDR4와 DDR5 키트 비교.','h1':'RAM 지연 시간 계산기','lede':'ns = (CL × 2000) / MT/s 공식으로 CL과 MT/s를 실제 나노초로 변환합니다. DDR4나 DDR5 키트 2개를 나란히 비교하거나 목표 ns에 필요한 CL을 역산할 수 있습니다.','start':'계산','h2':'RAM 지연 시간 계산기'},
        },
    },
    'bandwidth-calculator': {
        'tool': 'tools/bandwidth_calc_tool.php',
        'kicker': 'calculator',
        'trans': {
            'es': {'title':'Calculadora de ancho de banda - Tamaño, velocidad y tiempo','desc':'Convierte tamaño de archivo y velocidad de conexión a tiempo de transferencia. Resuelve en 3 direcciones, convierte bits y bytes.','h1':'Calculadora de ancho de banda','lede':'Resuelve en 3 direcciones (tiempo, tamaño, velocidad necesaria) con cambios entre KB/MB/GB/TB y Kbps/Mbps/Gbps. Maneja la trampa bits-vs-bytes automáticamente.','start':'Calcular','h2':'Calculadora de ancho de banda'},
            'fr': {'title':'Calculatrice de bande passante - Taille, vitesse, durée','desc':'Convertit taille de fichier et débit en durée de transfert. Résout dans 3 directions, gère bits et octets automatiquement.','h1':'Calculatrice de bande passante','lede':'Résout dans 3 directions (durée, taille, vitesse requise) avec conversion KB/MB/GB/TB et Kbps/Mbps/Gbps. Gère le piège bits/octets automatiquement.','start':'Calculer','h2':'Calculatrice de bande passante'},
            'de': {'title':'Bandbreitenrechner - Größe, Geschwindigkeit, Dauer','desc':'Wandelt Dateigröße und Verbindungsgeschwindigkeit in Übertragungsdauer um. Löst in 3 Richtungen, handhabt Bits vs Bytes automatisch.','h1':'Bandbreitenrechner','lede':'Löst in 3 Richtungen (Dauer, Größe, benötigte Geschwindigkeit) mit Umschaltern für KB/MB/GB/TB und Kbps/Mbps/Gbps. Handhabt die Bits-vs-Bytes-Falle automatisch.','start':'Berechnen','h2':'Bandbreitenrechner'},
            'pt': {'title':'Calculadora de largura de banda - Tamanho, velocidade, tempo','desc':'Converte tamanho de arquivo e velocidade de conexão em tempo de transferência. Resolve em 3 direções, lida com bits vs bytes.','h1':'Calculadora de largura de banda','lede':'Resolve em 3 direções (tempo, tamanho, velocidade necessária) com troca entre KB/MB/GB/TB e Kbps/Mbps/Gbps. Trata a armadilha bits-vs-bytes automaticamente.','start':'Calcular','h2':'Calculadora de largura de banda'},
            'ar': {'title':'حاسبة عرض النطاق - الحجم والسرعة والوقت','desc':'تحول حجم الملف وسرعة الاتصال إلى وقت النقل. تحل في 3 اتجاهات، وتتعامل مع البت والبايت تلقائياً.','h1':'حاسبة عرض النطاق','lede':'تحل في 3 اتجاهات (الوقت، الحجم، السرعة المطلوبة) مع تبديل بين KB/MB/GB/TB و Kbps/Mbps/Gbps. تتعامل مع فخ البت مقابل البايت تلقائياً.','start':'احسب','h2':'حاسبة عرض النطاق'},
            'ru': {'title':'Калькулятор пропускной способности - Размер, скорость, время','desc':'Переводит размер файла и скорость соединения во время передачи. Решает в 3 направлениях, учитывает биты vs байты.','h1':'Калькулятор пропускной способности','lede':'Решает в 3 направлениях (время, размер, требуемая скорость) с переключателями KB/MB/GB/TB и Kbps/Mbps/Gbps. Автоматически обрабатывает проблему биты-vs-байты.','start':'Рассчитать','h2':'Калькулятор пропускной способности'},
            'ja': {'title':'帯域幅計算ツール - サイズ、速度、時間','desc':'ファイルサイズと回線速度を転送時間に変換。3 方向で計算可能、ビット vs バイトの変換を自動処理。','h1':'帯域幅計算ツール','lede':'3 方向(時間・サイズ・必要速度)で計算できます。KB/MB/GB/TB と Kbps/Mbps/Gbps の切替、ビット vs バイトの罠を自動処理します。','start':'計算','h2':'帯域幅計算ツール'},
            'ko': {'title':'대역폭 계산기 - 크기, 속도, 시간','desc':'파일 크기와 연결 속도를 전송 시간으로 변환합니다. 3방향 계산과 비트 vs 바이트 자동 처리.','h1':'대역폭 계산기','lede':'시간/크기/필요 속도 3방향 계산과 KB/MB/GB/TB, Kbps/Mbps/Gbps 단위 전환을 지원하고, 비트와 바이트 간의 혼동을 자동으로 처리합니다.','start':'계산','h2':'대역폭 계산기'},
        },
    },
    'download-time-calculator': {
        'tool': 'tools/download_time_calc_tool.php',
        'kicker': 'calculator',
        'trans': {
            'es': {'title':'Calculadora de tiempo de descarga - Juegos, películas, backups','desc':'Estima el tiempo de descarga de juegos, películas y backups a tu velocidad. 15+ presets de tamaños y estimaciones teórica, real y lenta.','h1':'Calculadora de tiempo de descarga','lede':'Elige un preset de tamaño (juego AAA, película 4K, ISO de Linux, backup de Steam) o introduce uno personalizado, y obtén el tiempo en Xh Ym Zs con estimaciones realista 85%, teórica 100% y red lenta 60%.','start':'Estimar descarga','h2':'Calculadora de tiempo de descarga'},
            'fr': {'title':'Calculatrice de temps de téléchargement - Jeux, films, backups','desc':'Estime la durée de téléchargement des jeux, films et backups selon votre débit. 15+ presets et estimations théorique, réaliste et pessimiste.','h1':'Calculatrice de temps de téléchargement','lede':'Choisissez un preset (jeu AAA, film 4K, ISO Linux, backup Steam) ou saisissez une taille personnalisée, et obtenez la durée en Xh Ym Zs avec estimations réaliste 85%, théorique 100% et réseau lent 60%.','start':'Estimer','h2':'Calculatrice de temps de téléchargement'},
            'de': {'title':'Download-Zeit-Rechner - Spiele, Filme, Backups','desc':'Schätzt die Download-Zeit für Spiele, Filme und Backups bei Ihrer Geschwindigkeit. 15+ Presets und Schätzungen theoretisch, real und langsam.','h1':'Download-Zeit-Rechner','lede':'Wählen Sie ein Preset (AAA-Spiel, 4K-Film, Linux-ISO, Steam-Backup) oder geben Sie eine Größe ein und erhalten Sie die Dauer in Xh Ym Zs mit Schätzungen realistisch 85%, theoretisch 100% und langsames Netz 60%.','start':'Schätzen','h2':'Download-Zeit-Rechner'},
            'pt': {'title':'Calculadora de tempo de download - Jogos, filmes, backups','desc':'Estima o tempo de download de jogos, filmes e backups pela sua velocidade. 15+ presets e estimativas teórica, realista e lenta.','h1':'Calculadora de tempo de download','lede':'Escolha um preset (jogo AAA, filme 4K, ISO Linux, backup do Steam) ou informe um tamanho personalizado, e obtenha o tempo em Xh Ym Zs com estimativas realista 85%, teórica 100% e rede lenta 60%.','start':'Estimar','h2':'Calculadora de tempo de download'},
            'ar': {'title':'حاسبة وقت التنزيل - الألعاب والأفلام والنسخ الاحتياطية','desc':'تقدر وقت تنزيل الألعاب والأفلام والنسخ الاحتياطية بناءً على سرعتك. أكثر من 15 إعداداً مسبقاً وتقديرات نظرية وواقعية وبطيئة.','h1':'حاسبة وقت التنزيل','lede':'اختر إعداداً مسبقاً (لعبة AAA، فيلم 4K، ISO لينكس، نسخة Steam) أو أدخل حجماً مخصصاً، واحصل على الوقت بصيغة Xh Ym Zs مع تقديرات واقعية 85% ونظرية 100% وشبكة بطيئة 60%.','start':'تقدير','h2':'حاسبة وقت التنزيل'},
            'ru': {'title':'Калькулятор времени загрузки - Игры, фильмы, бэкапы','desc':'Оценивает время загрузки игр, фильмов и бэкапов при вашей скорости. 15+ пресетов и оценки теоретическая, реалистичная и медленная.','h1':'Калькулятор времени загрузки','lede':'Выберите пресет (AAA-игра, фильм 4K, Linux ISO, бэкап Steam) или введите размер вручную, и получите время в формате Xч Ym Zс с оценками реалистичная 85%, теоретическая 100% и медленная сеть 60%.','start':'Оценить','h2':'Калькулятор времени загрузки'},
            'ja': {'title':'ダウンロード時間計算ツール - ゲーム・動画・バックアップ','desc':'回線速度に対するゲーム・動画・バックアップのダウンロード時間を推定。15 以上のプリセットと理論・現実・低速シナリオ。','h1':'ダウンロード時間計算ツール','lede':'プリセット(AAA タイトル、4K 映画、Linux ISO、Steam バックアップ)を選ぶかサイズを入力すれば、Xh Ym Zs 形式で時間を表示します。現実値 85%、理論値 100%、低速ネットワーク 60% の 3 本立て。','start':'推定','h2':'ダウンロード時間計算ツール'},
            'ko': {'title':'다운로드 시간 계산기 - 게임, 영화, 백업','desc':'연결 속도 기준 게임/영화/백업 다운로드 시간을 추정합니다. 15개 이상 프리셋과 이론/현실/느린 시나리오 제공.','h1':'다운로드 시간 계산기','lede':'프리셋(AAA 게임, 4K 영화, Linux ISO, Steam 백업)을 고르거나 사용자 지정 크기를 입력하면 Xh Ym Zs 형식으로 시간이 표시됩니다. 현실 85%, 이론 100%, 저속 네트워크 60% 3가지 추정치 제공.','start':'추정','h2':'다운로드 시간 계산기'},
        },
    },
    # WAVE 5
    'raid-calculator': {
        'tool': 'tools/raid_calc_tool.php',
        'kicker': 'calculator',
        'trans': {
            'es': {'title':'Calculadora RAID - Capacidad y tolerancia a fallos (0/1/5/6/10/50/60)','desc':'Capacidad útil, tolerancia a fallos y multiplicadores de lectura/escritura para RAID 0, 1, 5, 6, 10, 50 y 60.','h1':'Calculadora RAID','lede':'Elige un nivel de RAID (0, 1, 5, 6, 10, 50, 60), introduce número de discos y tamaño, y obtén capacidad útil, cuántos discos pueden fallar sin perder datos y factores de velocidad lectura/escritura &mdash; con tabla comparativa.','start':'Calcular RAID','h2':'Calculadora RAID'},
            'fr': {'title':'Calculatrice RAID - Capacité et tolérance aux pannes','desc':'Capacité utile, tolérance aux pannes et facteurs de vitesse lecture/écriture pour RAID 0, 1, 5, 6, 10, 50 et 60.','h1':'Calculatrice RAID','lede':'Choisissez un niveau RAID (0, 1, 5, 6, 10, 50, 60), entrez le nombre de disques et leur taille, et obtenez la capacité utile, combien de disques peuvent tomber sans perte de données et les facteurs de vitesse &mdash; avec tableau comparatif.','start':'Calculer RAID','h2':'Calculatrice RAID'},
            'de': {'title':'RAID-Rechner - Kapazität und Fehlertoleranz','desc':'Nutzbare Kapazität, Fehlertoleranz und Lese-/Schreib-Geschwindigkeitsfaktoren für RAID 0, 1, 5, 6, 10, 50 und 60.','h1':'RAID-Rechner','lede':'Wählen Sie ein RAID-Level (0, 1, 5, 6, 10, 50, 60), geben Sie Laufwerksanzahl und -größe ein, und erhalten Sie nutzbare Kapazität, wie viele Laufwerke ohne Datenverlust ausfallen dürfen und Geschwindigkeitsfaktoren &mdash; mit Vergleichstabelle.','start':'RAID berechnen','h2':'RAID-Rechner'},
            'pt': {'title':'Calculadora RAID - Capacidade e tolerância a falhas','desc':'Capacidade utilizável, tolerância a falhas e multiplicadores de velocidade para RAID 0, 1, 5, 6, 10, 50 e 60.','h1':'Calculadora RAID','lede':'Escolha um nível RAID (0, 1, 5, 6, 10, 50, 60), informe número e tamanho dos discos, e veja capacidade útil, quantos discos podem falhar sem perder dados e fatores de velocidade &mdash; com tabela comparativa.','start':'Calcular RAID','h2':'Calculadora RAID'},
            'ar': {'title':'حاسبة RAID - السعة وتحمل الأعطال','desc':'السعة القابلة للاستخدام وتحمل الأعطال ومضاعفات سرعة القراءة/الكتابة لـ RAID 0 و 1 و 5 و 6 و 10 و 50 و 60.','h1':'حاسبة RAID','lede':'اختر مستوى RAID (0، 1، 5، 6، 10، 50، 60)، أدخل عدد الأقراص وحجمها، واحصل على السعة القابلة للاستخدام وعدد الأقراص التي يمكن أن تفشل ومضاعفات السرعة &mdash; مع جدول مقارنة.','start':'احسب RAID','h2':'حاسبة RAID'},
            'ru': {'title':'Калькулятор RAID - ёмкость и отказоустойчивость','desc':'Полезная ёмкость, отказоустойчивость и множители скорости для RAID 0, 1, 5, 6, 10, 50 и 60.','h1':'Калькулятор RAID','lede':'Выберите уровень RAID (0, 1, 5, 6, 10, 50, 60), введите число и размер дисков &mdash; получите полезную ёмкость, сколько дисков может отказать без потери данных и множители скорости, плюс сравнительная таблица.','start':'Рассчитать','h2':'Калькулятор RAID'},
            'ja': {'title':'RAID 計算ツール - 容量と耐障害性(0/1/5/6/10/50/60)','desc':'RAID 0, 1, 5, 6, 10, 50, 60 の利用可能容量と耐障害性、読み書きの速度係数を即座に計算。','h1':'RAID 計算ツール','lede':'RAID レベル(0, 1, 5, 6, 10, 50, 60)を選び、ドライブ数とサイズを入力すると、利用可能容量、データ損失なしに壊れていいドライブ数、読み書き速度の係数、比較テーブルが表示されます。','start':'RAID を計算','h2':'RAID 計算ツール'},
            'ko': {'title':'RAID 계산기 - 용량과 장애 내구성','desc':'RAID 0, 1, 5, 6, 10, 50, 60의 사용 가능 용량, 장애 내구성, 읽기/쓰기 속도 배수 계산.','h1':'RAID 계산기','lede':'RAID 레벨(0, 1, 5, 6, 10, 50, 60)과 드라이브 수/크기를 입력하면 사용 가능 용량, 데이터 손실 없이 고장 가능한 드라이브 수, 읽기/쓰기 속도 배수와 비교표가 표시됩니다.','start':'RAID 계산','h2':'RAID 계산기'},
        },
    },
    'ttk-calculator': {
        'tool': 'tools/ttk_calc_tool.php',
        'kicker': 'gaming',
        'trans': {
            'es': {'title':'Calculadora de TTK - Tiempo hasta matar en FPS','desc':'TTK (tiempo hasta matar) en milisegundos para CS2, Valorant, Apex y Call of Duty. Balas para matar y comparación cuerpo vs cabeza.','h1':'Calculadora de TTK','lede':'Introduce daño, cadencia (RPM), HP del objetivo, armadura y multiplicador de headshot; la calculadora devuelve balas para matar y TTK en milisegundos para cuerpo y cabeza, lado a lado. Con presets para CS2, Valorant, Apex, CoD.','start':'Calcular TTK','h2':'Calculadora de TTK'},
            'fr': {'title':'Calculatrice TTK - Temps jusqu’à kill en FPS','desc':'TTK en millisecondes pour CS2, Valorant, Apex, CoD. Balles pour kill et comparaison corps vs tête.','h1':'Calculatrice TTK','lede':'Entrez dégâts, cadence (RPM), HP cible, armure et multiplicateur headshot; la calculatrice renvoie balles pour kill et TTK en ms pour corps et tête, côte à côte. Presets CS2, Valorant, Apex, CoD.','start':'Calculer TTK','h2':'Calculatrice TTK'},
            'de': {'title':'TTK-Rechner - Time-To-Kill für FPS-Spiele','desc':'TTK in Millisekunden für CS2, Valorant, Apex und Call of Duty. Kugeln zum Kill und Körper-vs-Kopf-Vergleich.','h1':'TTK-Rechner','lede':'Geben Sie Schaden, Feuerrate (RPM), Ziel-HP, Rüstung und Headshot-Multiplikator ein; der Rechner liefert Kugeln zum Kill und TTK in ms für Körper und Kopf nebeneinander. Presets für CS2, Valorant, Apex, CoD.','start':'TTK berechnen','h2':'TTK-Rechner'},
            'pt': {'title':'Calculadora de TTK - Tempo até matar em FPS','desc':'TTK em milissegundos para CS2, Valorant, Apex e Call of Duty. Balas para matar e comparação corpo vs cabeça.','h1':'Calculadora de TTK','lede':'Informe dano, cadência (RPM), HP do alvo, armadura e multiplicador de headshot; a calculadora retorna balas para matar e TTK em ms para corpo e cabeça, lado a lado. Presets para CS2, Valorant, Apex, CoD.','start':'Calcular TTK','h2':'Calculadora de TTK'},
            'ar': {'title':'حاسبة TTK - الوقت حتى القتل في ألعاب FPS','desc':'TTK بالملي ثانية لـ CS2 و Valorant و Apex و Call of Duty. الطلقات للقتل ومقارنة الجسم والرأس.','h1':'حاسبة TTK','lede':'أدخل الضرر وسرعة الإطلاق (RPM) و HP الهدف والدرع ومضاعف إصابة الرأس؛ تعيد الحاسبة عدد الطلقات و TTK بالملي ثانية للجسم والرأس جنباً إلى جنب. مع إعدادات مسبقة لـ CS2 و Valorant و Apex و CoD.','start':'احسب TTK','h2':'حاسبة TTK'},
            'ru': {'title':'Калькулятор TTK - Время до убийства в FPS','desc':'TTK в миллисекундах для CS2, Valorant, Apex и Call of Duty. Пули до убийства и сравнение тело/голова.','h1':'Калькулятор TTK','lede':'Введите урон, скорострельность (RPM), HP цели, броню и множитель хедшота; калькулятор вернёт пули до убийства и TTK в мс для тела и головы. Пресеты CS2, Valorant, Apex, CoD.','start':'Рассчитать TTK','h2':'Калькулятор TTK'},
            'ja': {'title':'TTK 計算ツール - FPS のキルまでの時間','desc':'CS2・Valorant・Apex・Call of Duty の TTK をミリ秒で計算。弾数とボディ vs ヘッド比較。','h1':'TTK 計算ツール','lede':'ダメージ、発射速度(RPM)、目標 HP、アーマー、ヘッドショット倍率を入力すると、ボディとヘッドの弾数と TTK(ミリ秒)を並べて表示。CS2・Valorant・Apex・CoD のプリセット付き。','start':'TTK を計算','h2':'TTK 計算ツール'},
            'ko': {'title':'TTK 계산기 - FPS 킬까지 시간','desc':'CS2, Valorant, Apex, Call of Duty의 TTK를 밀리초 단위로 계산. 킬 탄환 수와 몸통/헤드샷 비교.','h1':'TTK 계산기','lede':'데미지, 분당 발사 속도(RPM), 목표 HP, 아머, 헤드샷 배수를 입력하면 몸통과 헤드의 킬 탄환 수와 TTK(ms)를 나란히 표시합니다. CS2/Valorant/Apex/CoD 프리셋 제공.','start':'TTK 계산','h2':'TTK 계산기'},
        },
    },
    'monitor-sharpness-test': {
        'tool': 'tools/monitor_sharpness_tool.php',
        'kicker': 'display',
        'trans': {
            'es': {'title':'Prueba de nitidez del monitor - Claridad de texto online','desc':'Prueba gratuita de nitidez del monitor. Cuadricula de pixeles 1px estilo Lagom, muestras de texto en multiples tamanos, deteccion de halos de color y regla de subpixeles RGB.','h1':'Prueba gratuita de nitidez del monitor - Claridad de texto online','lede':'Renderiza una cuadricula de 1 px estilo Lagom, muestras de texto en serif, sans y monoespaciada, bloques de halo cromatico y una regla RGB de subpixeles para evaluar la nitidez de tu pantalla.','start':'Iniciar prueba','h2':'Prueba de nitidez del monitor'},
            'fr': {'title':'Test de nettete du moniteur - Clarte du texte en ligne','desc':'Test gratuit de nettete du moniteur. Grille 1px style Lagom, echantillons de texte multi-tailles, blocs de franges chromatiques et regle RGB des sous-pixels.','h1':'Test gratuit de nettete du moniteur - Clarte du texte en ligne','lede':'Affiche une grille 1 px de style Lagom, des echantillons de texte serif, sans et monospace, des blocs de franges chromatiques et une regle RGB de sous-pixels pour evaluer la nettete de votre ecran.','start':'Lancer le test','h2':'Test de nettete du moniteur'},
            'de': {'title':'Monitor-Schaerfe-Test - Textklarheit im Browser','desc':'Kostenloser Monitor-Schaerfe-Test. 1px-Pixelraster im Lagom-Stil, Textproben in mehreren Groessen, Farbsaum-Bloecke und RGB-Subpixel-Lineal.','h1':'Kostenloser Monitor-Schaerfe-Test - Online-Textklarheit','lede':'Rendert ein 1-px-Pixelraster im Lagom-Stil, Textproben in Serif, Sans und Monospace, Farbsaum-Bloecke und ein RGB-Subpixel-Lineal zur Beurteilung der Bildschirmschaerfe.','start':'Test starten','h2':'Monitor-Schaerfe-Test'},
            'pt': {'title':'Teste de nitidez do monitor - Clareza do texto online','desc':'Teste gratuito de nitidez do monitor. Grade de 1px estilo Lagom, amostras de texto em varios tamanhos, blocos de franjas cromaticas e regua RGB de subpixel.','h1':'Teste gratuito de nitidez do monitor - Clareza do texto online','lede':'Renderiza uma grade de 1 px estilo Lagom, amostras de texto em serif, sans e monoespacada, blocos de franjas cromaticas e uma regua RGB de subpixel para avaliar a nitidez do monitor.','start':'Iniciar teste','h2':'Teste de nitidez do monitor'},
            'ar': {'title':'اختبار حدة الشاشة - وضوح النص اونلاين','desc':'اختبار مجاني لحدة الشاشة. شبكة بكسل 1px على طراز Lagom، عينات نص بأحجام متعددة، كتل تحلل الالوان ومسطرة البكسلات الفرعية RGB.','h1':'اختبار حدة الشاشة المجاني - وضوح النص عبر الانترنت','lede':'يعرض شبكة 1 بكسل بأسلوب Lagom وعينات نصية بخطوط مختلفة وكتل تحلل الالوان ومسطرة RGB للبكسلات الفرعية لتقييم حدة شاشتك.','start':'ابدا الاختبار','h2':'اختبار حدة الشاشة'},
            'ru': {'title':'Тест чёткости монитора - онлайн проверка текста','desc':'Бесплатный тест чёткости монитора. Сетка 1 px в стиле Lagom, текстовые образцы разных размеров, блоки цветной каймы и RGB-линейка субпикселей.','h1':'Бесплатный тест чёткости монитора - онлайн проверка текста','lede':'Отрисовывает сетку 1 px в стиле Lagom, образцы текста (засечки, гротеск, моноширинный), блоки цветной каймы и RGB-линейку субпикселей для оценки чёткости дисплея.','start':'Запустить тест','h2':'Тест чёткости монитора'},
            'ja': {'title':'モニター鮮明度テスト - オンラインテキスト鮮明度','desc':'モニターの鮮明度を無料でテスト。Lagom風の1pxピクセルグリッド、複数サイズのテキスト見本、色フリンジブロック、RGBサブピクセル定規。','h1':'無料モニター鮮明度テスト - オンラインのテキスト鮮明度確認','lede':'Lagom風の1pxピクセルグリッド、セリフ・サンセリフ・等幅のテキスト見本、色フリンジブロック、RGBサブピクセル定規を表示してモニターの鮮明さを評価します。','start':'テスト開始','h2':'モニター鮮明度テスト'},
            'ko': {'title':'모니터 선명도 테스트 - 온라인 텍스트 선명도','desc':'무료 모니터 선명도 테스트. Lagom 스타일의 1픽셀 그리드, 다양한 크기의 텍스트 샘플, 색 번짐 블록, RGB 서브픽셀 자.','h1':'무료 모니터 선명도 테스트 - 온라인 텍스트 선명도 검사','lede':'Lagom 스타일의 1px 픽셀 그리드, 세리프·산세리프·고정폭 텍스트 샘플, 색 번짐 블록, RGB 서브픽셀 자를 그려 모니터의 선명도를 평가합니다.','start':'테스트 시작','h2':'모니터 선명도 테스트'},
        },
    },
    'pitch-detector': {
        'tool': 'tools/pitch_detector_tool.php',
        'kicker': 'audio',
        'trans': {
            'es': {'title':'Detector de Tono Online - Que Nota Estoy Cantando?','desc':'Detector de tono gratis online. Canta o toca al microfono y ve la frecuencia en Hz, la nota mas cercana (C0-C8), la octava y los cents desafinados en tiempo real.','h1':'Detector de Tono Online - Que Nota Estoy Cantando?','lede':'Canta, tararea o toca cualquier nota y ve al instante la frecuencia, la nota musical y los cents desafinados. Grafico desplazable de los ultimos 10 segundos.','start':'Iniciar detector','h2':'Detector de Tono'},
            'fr': {'title':'Detecteur de Hauteur en Ligne - Quelle Note Je Chante ?','desc':'Detecteur de hauteur gratuit en ligne. Chantez ou jouez dans le microphone pour voir la frequence en Hz, la note la plus proche (C0-C8), l octave et les cents en direct.','h1':'Detecteur de Hauteur en Ligne - Quelle Note Est-Ce Que Je Chante ?','lede':'Chantez, fredonnez ou jouez n importe quelle note pour voir instantanement la frequence, la note musicale et les cents. Graphique defilant des 10 dernieres secondes.','start':'Lancer le detecteur','h2':'Detecteur de Hauteur'},
            'de': {'title':'Tonhoehen-Detektor Online - Welche Note Singe Ich?','desc':'Kostenloser Tonhoehen-Detektor im Browser. Sing oder spiel ins Mikrofon und sieh live Frequenz in Hz, naechste Note (C0-C8), Oktave und Cent-Abweichung.','h1':'Kostenloser Online Tonhoehen-Detektor - Welche Note Singe Ich?','lede':'Sing, summe oder spiel eine beliebige Note. Sieh sofort Frequenz, Note und Cent-Abweichung. Scrollendes Diagramm der letzten 10 Sekunden.','start':'Detektor starten','h2':'Tonhoehen-Detektor'},
            'pt': {'title':'Detector de Tom Online - Que Nota Estou Cantando?','desc':'Detector de tom gratuito no navegador. Cante ou toque no microfone e veja em tempo real a frequencia em Hz, a nota mais proxima (C0-C8), a oitava e os cents.','h1':'Detector de Tom Online Gratis - Que Nota Estou Cantando?','lede':'Cante, cantarole ou toque qualquer nota e veja instantaneamente a frequencia, a nota musical e os cents. Grafico dos ultimos 10 segundos.','start':'Iniciar detector','h2':'Detector de Tom'},
            'ar': {'title':'كاشف طبقة الصوت اونلاين - ما النغمة التي اغنيها؟','desc':'كاشف طبقة الصوت مجاني عبر المتصفح. غنِّ او اعزف في الميكروفون وشاهد التردد بالهرتز والنغمة الاقرب (C0-C8) والاوكتاف ودرجة الانحراف بالسنت لحظياً.','h1':'كاشف طبقة الصوت اونلاين مجاني - ما النغمة التي اغنيها؟','lede':'غنِّ او همهم او اعزف اي نغمة لترى التردد والنغمة الموسيقية ومقدار الانحراف بالسنت. رسم بياني متمرر لآخر 10 ثوانٍ.','start':'بدء الكاشف','h2':'كاشف طبقة الصوت'},
            'ru': {'title':'Онлайн Детектор Высоты Тона - Какую Ноту Я Пою?','desc':'Бесплатный детектор высоты тона в браузере. Пойте или играйте в микрофон и видите частоту в Гц, ближайшую ноту (C0-C8), октаву и центы в реальном времени.','h1':'Бесплатный Онлайн Детектор Высоты Тона - Какую Ноту Я Пою?','lede':'Пойте, напевайте или играйте любую ноту - детектор покажет частоту, ноту и отклонение в центах. Прокручивающийся график за последние 10 секунд.','start':'Запустить детектор','h2':'Детектор Высоты Тона'},
            'ja': {'title':'オンラインピッチ検出器 - 歌っている音は何？','desc':'無料のオンラインピッチ検出器。マイクに歌うか演奏すると、周波数（Hz）、最も近い音名（C0〜C8）、オクターブ、セント単位のずれをリアルタイム表示。','h1':'無料オンラインピッチ検出器 - 歌っている音は何？','lede':'歌う、ハミングする、演奏する。周波数、音名、セントずれを瞬時に表示。直近10秒のスクロールグラフ付き。','start':'検出開始','h2':'ピッチ検出器'},
            'ko': {'title':'온라인 피치 디텍터 - 내가 부르는 음은?','desc':'브라우저에서 작동하는 무료 피치 디텍터. 마이크에 노래하거나 연주하면 주파수(Hz), 가장 가까운 음(C0-C8), 옥타브, 센트 편차를 실시간 표시.','h1':'무료 온라인 피치 디텍터 - 내가 부르는 음은?','lede':'노래하거나 흥얼거리거나 연주하세요. 주파수, 음 이름, 센트 편차를 즉시 표시합니다. 최근 10초간의 스크롤 그래프 제공.','start':'디텍터 시작','h2':'피치 디텍터'},
        },
    },
    'webcam-mirror': {
        'tool': 'tools/webcam_mirror_tool.php',
        'kicker': 'sensor',
        'trans': {
            'es': {'title':'Espejo de Webcam Online - Camara como Espejo Virtual','desc':'Espejo de webcam gratis. Usa tu camara como espejo virtual con volteo horizontal, sliders de brillo y contraste, cuadricula y descarga PNG. Nada se sube.','h1':'Espejo de Webcam Online - Usa Tu Camara como Espejo Virtual','lede':'Vista previa en vivo de tu camara con modo espejo, brillo, contraste, cuadricula de tercios y captura instantanea. Todo el video permanece en tu navegador.','start':'Abrir espejo','h2':'Espejo de Webcam'},
            'fr': {'title':'Miroir Webcam en Ligne - Camera Comme Miroir Virtuel','desc':'Miroir webcam gratuit. Utilisez votre camera comme miroir virtuel avec retournement horizontal, sliders luminosite/contraste, grille et capture PNG.','h1':'Miroir Webcam en Ligne - Utilisez Votre Camera Comme Miroir Virtuel','lede':'Apercu en direct de votre camera avec mode miroir, luminosite, contraste, grille des tiers et capture instantanee. La video reste dans votre navigateur.','start':'Ouvrir le miroir','h2':'Miroir Webcam'},
            'de': {'title':'Webcam-Spiegel Online - Kamera als Virtueller Spiegel','desc':'Kostenloser Webcam-Spiegel. Nutze deine Kamera als virtuellen Spiegel mit horizontaler Spiegelung, Helligkeits-/Kontrast-Slidern, Raster und PNG-Snapshot.','h1':'Webcam-Spiegel Online - Nutze deine Kamera als Spiegel','lede':'Live-Vorschau deiner Kamera mit Spiegelmodus, Helligkeit, Kontrast, Drittel-Raster und Snapshot. Das Video bleibt in deinem Browser.','start':'Spiegel oeffnen','h2':'Webcam-Spiegel'},
            'pt': {'title':'Espelho de Webcam Online - Camera como Espelho Virtual','desc':'Espelho de webcam gratis. Use sua camera como espelho virtual com inversao horizontal, sliders de brilho/contraste, grade e captura PNG.','h1':'Espelho de Webcam Online - Use Sua Camera como Espelho Virtual','lede':'Pre-visualizacao ao vivo da sua camera com modo espelho, brilho, contraste, grade de tercos e captura instantanea. O video permanece no seu navegador.','start':'Abrir espelho','h2':'Espelho de Webcam'},
            'ar': {'title':'مرآة كاميرا الويب اونلاين - استخدم كاميرتك كمرآة افتراضية','desc':'مرآة كاميرا ويب مجانية. استخدم كاميرتك كمرآة افتراضية مع قلب أفقي، شرائح للسطوع والتباين، شبكة ولقطة PNG. لا يتم رفع شيء.','h1':'مرآة كاميرا الويب اونلاين - استخدم كاميرتك كمرآة افتراضية','lede':'معاينة مباشرة لكاميرتك مع وضع المرآة والسطوع والتباين وشبكة الأثلاث ولقطة فورية. يبقى الفيديو في متصفحك فقط.','start':'فتح المرآة','h2':'مرآة كاميرا الويب'},
            'ru': {'title':'Онлайн Зеркало Веб-камеры - Камера как Виртуальное Зеркало','desc':'Бесплатное зеркало веб-камеры. Используйте камеру как виртуальное зеркало с горизонтальным отражением, ползунками яркости/контраста, сеткой и PNG-снимком.','h1':'Онлайн Зеркало Веб-камеры - Камера как Виртуальное Зеркало','lede':'Превью камеры в реальном времени с режимом зеркала, яркостью, контрастом, сеткой третей и снимком. Видео остаётся в вашем браузере.','start':'Открыть зеркало','h2':'Зеркало Веб-камеры'},
            'ja': {'title':'オンラインウェブカメラミラー - カメラをバーチャルミラーに','desc':'無料のウェブカメラミラー。水平反転、明るさ/コントラスト、三分割グリッド、PNG保存に対応。何もアップロードしません。','h1':'オンラインウェブカメラミラー - カメラをバーチャルミラーに','lede':'水平反転、明るさ・コントラスト、三分割グリッド、スナップショット保存に対応したライブカメラ。映像はブラウザ内のみで処理されます。','start':'ミラーを開く','h2':'ウェブカメラミラー'},
            'ko': {'title':'온라인 웹캠 거울 - 카메라를 가상 거울로','desc':'무료 웹캠 거울. 수평 반전, 밝기/대비 슬라이더, 그리드 오버레이, PNG 스냅샷 지원. 업로드 없음.','h1':'온라인 웹캠 거울 - 카메라를 가상 거울로 사용','lede':'미러 모드, 밝기·대비, 3등분 그리드, 즉시 스냅샷 다운로드 기능을 갖춘 실시간 카메라 미리보기. 영상은 브라우저에서만 처리.','start':'거울 열기','h2':'웹캠 거울'},
        },
    },
    'hearing-age-test': {
        'tool': 'tools/hearing_age_tool.php',
        'kicker': 'audio',
        'trans': {
            'es': {'title':'Test de Edad Auditiva - Tono Mosquito (Cuantos Anos Tienen Tus Oidos?)','desc':'Test de edad auditiva gratis. Barrido de 12 frecuencias de 8 kHz a 22 kHz incluyendo el tono mosquito de 17.4 kHz, con slider manual y volumen seguro.','h1':'Test de Edad Auditiva - Cuantos Anos Tienen Tus Oidos?','lede':'Test viral de edad auditiva con 12 frecuencias de 8 kHz a 22 kHz, incluido el tono mosquito de 17.4 kHz. Para resultados precisos, usa auriculares con cable.','start':'Iniciar test','h2':'Test de Edad Auditiva'},
            'fr': {'title':'Test d Age Auditif - Tonalite Mosquito (Quel Age Ont Vos Oreilles ?)','desc':'Test d age auditif gratuit. Balayage de 12 frequences de 8 kHz a 22 kHz incluant la tonalite mosquito 17.4 kHz, avec slider manuel et volume securise.','h1':'Test d Age Auditif - Quel Age Ont Vos Oreilles ?','lede':'Test viral d age auditif avec 12 frequences de 8 kHz a 22 kHz, incluant la tonalite mosquito de 17.4 kHz. Utilisez un casque filaire pour des resultats precis.','start':'Lancer le test','h2':'Test d Age Auditif'},
            'de': {'title':'Hoer-Alter-Test - Mosquito-Ton (Wie Alt Sind Deine Ohren?)','desc':'Kostenloser Hoer-Alter-Test. 12 Frequenzen von 8 kHz bis 22 kHz inklusive Mosquito-Ton 17.4 kHz, mit manuellem Slider und sicherer Lautstaerke.','h1':'Hoer-Alter-Test - Wie Alt Sind Deine Ohren?','lede':'Viraler Hoer-Alter-Test mit 12 Frequenzen von 8 kHz bis 22 kHz, inklusive Mosquito-Ton 17.4 kHz. Fuer genaue Ergebnisse kabelgebundene Kopfhoerer nutzen.','start':'Test starten','h2':'Hoer-Alter-Test'},
            'pt': {'title':'Teste de Idade Auditiva - Tom Mosquito (Que Idade Tem Seus Ouvidos?)','desc':'Teste de idade auditiva gratis. Varredura de 12 frequencias de 8 kHz a 22 kHz incluindo o tom mosquito de 17.4 kHz, com slider manual e volume seguro.','h1':'Teste de Idade Auditiva - Que Idade Tem Seus Ouvidos?','lede':'Teste viral de idade auditiva com 12 frequencias de 8 kHz a 22 kHz, incluindo o tom mosquito de 17.4 kHz. Use fones com fio para resultados precisos.','start':'Iniciar teste','h2':'Teste de Idade Auditiva'},
            'ar': {'title':'اختبار عمر السمع - نغمة البعوضة (كم عمر اذنيك؟)','desc':'اختبار مجاني لعمر السمع. مسح 12 ترددا من 8 كيلوهرتز الى 22 كيلوهرتز بما في ذلك نغمة البعوضة 17.4 كيلوهرتز، مع شريط تمرير يدوي وحجم آمن.','h1':'اختبار عمر السمع - كم عمر اذنيك؟','lede':'اختبار شائع لعمر السمع مع 12 ترددا من 8 كيلوهرتز الى 22 كيلوهرتز، بما في ذلك نغمة البعوضة 17.4 كيلوهرتز. استخدم سماعات سلكية للحصول على نتائج دقيقة.','start':'ابدا الاختبار','h2':'اختبار عمر السمع'},
            'ru': {'title':'Тест Возраста Слуха - Тон Комара (Сколько Лет Вашим Ушам?)','desc':'Бесплатный тест возраста слуха. Развёртка 12 частот от 8 кГц до 22 кГц включая комариный тон 17.4 кГц, с ручным слайдером и безопасной громкостью.','h1':'Тест Возраста Слуха - Сколько Лет Вашим Ушам?','lede':'Вирусный тест возраста слуха с 12 частотами от 8 кГц до 22 кГц, включая комариный тон 17.4 кГц. Для точности используйте проводные наушники.','start':'Запустить тест','h2':'Тест Возраста Слуха'},
            'ja': {'title':'聴覚年齢テスト - モスキート音（あなたの耳は何歳？）','desc':'無料の聴覚年齢テスト。8 kHzから22 kHzまでの12周波数（17.4 kHzのモスキート音を含む）、手動スライダーと安全な音量制限。','h1':'聴覚年齢テスト - あなたの耳は何歳？','lede':'12周波数（8 kHz〜22 kHz、モスキート音17.4 kHzを含む）で測る話題の聴覚年齢テスト。正確な結果には有線ヘッドホンを使用してください。','start':'テスト開始','h2':'聴覚年齢テスト'},
            'ko': {'title':'청각 나이 테스트 - 모기 소리 (당신의 귀는 몇 살?)','desc':'무료 청각 나이 테스트. 8 kHz부터 22 kHz까지 12개 주파수(17.4 kHz 모기 소리 포함), 수동 슬라이더와 안전 볼륨 제한.','h1':'청각 나이 테스트 - 당신의 귀는 몇 살?','lede':'8 kHz부터 22 kHz까지 12개 주파수(17.4 kHz 모기 소리 포함)로 측정하는 바이럴 청각 나이 테스트. 정확한 결과를 원하면 유선 헤드폰을 사용하세요.','start':'테스트 시작','h2':'청각 나이 테스트'},
        },
    },
    'online-ruler': {
        'tool': 'tools/online_ruler_tool.php',
        'kicker': 'calculator',
        'trans': {
            'es': {'title':'Regla Online en Tamano Real - cm e Pulgadas con Calibracion','desc':'Regla online gratuita en tamano real en pantalla. Mide en cm, mm e pulgadas. Calibra con tarjeta de credito (ISO ID-1) o introduciendo el DPI del monitor.','h1':'Regla Online en Tamano Real - cm e Pulgadas con Calibracion','lede':'Regla SVG en cm e pulgadas que ajustas a tu pantalla con una tarjeta de credito real (estandar ISO ID-1) o tu DPI. La calibracion se guarda en tu navegador.','start':'Abrir regla','h2':'Regla Online'},
            'fr': {'title':'Regle en Ligne Taille Reelle - cm et Pouces avec Calibrage','desc':'Regle en ligne gratuite a taille reelle a l ecran. Mesurez en cm, mm et pouces. Calibrez avec une carte bancaire (ISO ID-1) ou en saisissant le DPI du moniteur.','h1':'Regle en Ligne Taille Reelle - cm et Pouces avec Calibrage','lede':'Regle SVG en cm et pouces que vous ajustez a votre ecran avec une vraie carte bancaire (norme ISO ID-1) ou votre DPI. Le calibrage est enregistre dans le navigateur.','start':'Ouvrir la regle','h2':'Regle en Ligne'},
            'de': {'title':'Online-Lineal in Originalgroesse - cm und Zoll mit Kalibrierung','desc':'Kostenloses Online-Lineal in Originalgroesse am Bildschirm. Miss in cm, mm und Zoll. Kalibriere mit einer Kreditkarte (ISO ID-1) oder durch Eingabe des Monitor-DPI.','h1':'Online-Lineal in Originalgroesse - cm und Zoll mit Kalibrierung','lede':'SVG-Lineal in cm und Zoll, das du mit einer echten Kreditkarte (ISO ID-1) oder deinem DPI an deinen Bildschirm anpasst. Die Kalibrierung wird im Browser gespeichert.','start':'Lineal oeffnen','h2':'Online-Lineal'},
            'pt': {'title':'Regua Online em Tamanho Real - cm e Polegadas com Calibracao','desc':'Regua online gratuita em tamanho real na tela. Meca em cm, mm e polegadas. Calibre com cartao de credito (ISO ID-1) ou inserindo o DPI do monitor.','h1':'Regua Online em Tamanho Real - cm e Polegadas com Calibracao','lede':'Regua SVG em cm e polegadas que voce ajusta a tela com um cartao de credito real (padrao ISO ID-1) ou seu DPI. A calibracao e salva no navegador.','start':'Abrir regua','h2':'Regua Online'},
            'ar': {'title':'مسطرة اونلاين بالحجم الفعلي - سم و انش مع المعايرة','desc':'مسطرة اونلاين مجانية بالحجم الفعلي على الشاشة. قِس بالسنتيمتر والمليمتر والانش. عاير ببطاقة الائتمان (ISO ID-1) او ادخل DPI الشاشة.','h1':'مسطرة اونلاين بالحجم الفعلي - سم و انش مع المعايرة','lede':'مسطرة SVG بالسنتيمتر والانش تضبطها على شاشتك ببطاقة ائتمان حقيقية (معيار ISO ID-1) او بـ DPI شاشتك. تُحفظ المعايرة في متصفحك.','start':'فتح المسطرة','h2':'مسطرة اونلاين'},
            'ru': {'title':'Онлайн Линейка в Натуральную Величину - см и Дюймы с Калибровкой','desc':'Бесплатная онлайн-линейка в натуральную величину на экране. Измеряйте в см, мм и дюймах. Калибруйте по кредитной карте (ISO ID-1) или вводом DPI монитора.','h1':'Онлайн Линейка в Натуральную Величину - см и Дюймы с Калибровкой','lede':'SVG-линейка в см и дюймах, которую вы подгоняете к экрану реальной банковской картой (стандарт ISO ID-1) или DPI монитора. Калибровка сохраняется в браузере.','start':'Открыть линейку','h2':'Онлайн Линейка'},
            'ja': {'title':'オンライン定規 実寸表示 - cm・インチ、キャリブレーション対応','desc':'画面に実寸で表示される無料オンライン定規。cm、mm、インチで測定可能。クレジットカード（ISO ID-1）またはモニターDPIでキャリブレーション。','h1':'オンライン定規 実寸表示 - cm・インチ、キャリブレーション対応','lede':'実物のクレジットカード（ISO ID-1規格）または画面DPIで合わせて使うcm・インチ表示のSVG定規。キャリブレーションはブラウザに保存されます。','start':'定規を開く','h2':'オンライン定規'},
            'ko': {'title':'온라인 자 실제 크기 - cm와 인치, 캘리브레이션 지원','desc':'화면에 실제 크기로 표시되는 무료 온라인 자. cm, mm, 인치로 측정. 신용카드(ISO ID-1) 또는 모니터 DPI로 캘리브레이션.','h1':'온라인 자 실제 크기 - cm와 인치, 캘리브레이션 지원','lede':'실제 신용카드(ISO ID-1 표준)나 모니터 DPI로 보정하는 cm·인치 SVG 자. 보정값은 브라우저에 저장됩니다.','start':'자 열기','h2':'온라인 자'},
        },
    },
    'minecraft-circle-generator': {
        'tool': 'tools/minecraft_circle_tool.php',
        'kicker': 'gaming',
        'trans': {
            'es': {'title':'Generador de círculos Minecraft - Contorno, disco y esfera','desc':'Generador de círculos en píxeles para Minecraft: contorno, relleno, anillo grueso y capas de esfera. Radio 1 a 256.','h1':'Generador de círculos Minecraft','lede':'Traza círculos perfectos, discos rellenos, anillos gruesos y capas de esfera 3D con radio de 1 a 256 bloques. Cuenta bloques, descarga PNG para consulta en el otro monitor y copia el patrón capa a capa dentro del juego.','start':'Trazar círculo','h2':'Generador de círculos Minecraft'},
            'fr': {'title':'Générateur de cercles Minecraft - Contour, disque et sphère','desc':'Générateur de cercles en pixels pour Minecraft: contour, plein, anneau épais et couches de sphère. Rayon 1 à 256.','h1':'Générateur de cercles Minecraft','lede':'Trace des cercles parfaits, disques pleins, anneaux épais et couches de sphère 3D de rayon 1 à 256 blocs. Compte les blocs, télécharge en PNG pour le deuxième écran et copie le motif couche par couche dans le jeu.','start':'Tracer un cercle','h2':'Générateur de cercles Minecraft'},
            'de': {'title':'Minecraft-Kreis-Generator - Kontur, Scheibe und Kugel','desc':'Pixel-Kreis-Generator für Minecraft: Kontur, gefüllt, dicker Ring und Kugelschichten. Radius 1 bis 256.','h1':'Minecraft-Kreis-Generator','lede':'Zeichnet perfekte Kreise, gefüllte Scheiben, dicke Ringe und 3D-Kugelschichten mit Radius 1 bis 256 Blöcke. Zählt Blöcke, PNG-Download fürs Zweitdisplay, Muster Schicht für Schicht ins Spiel übertragen.','start':'Kreis zeichnen','h2':'Minecraft-Kreis-Generator'},
            'pt': {'title':'Gerador de círculos Minecraft - Contorno, disco e esfera','desc':'Gerador de círculos em pixels para Minecraft: contorno, preenchido, anel grosso e camadas de esfera. Raio 1 a 256.','h1':'Gerador de círculos Minecraft','lede':'Desenha círculos perfeitos, discos preenchidos, anéis grossos e camadas de esfera 3D com raio 1 a 256 blocos. Conta blocos, baixa PNG para consulta no outro monitor e copia o padrão camada a camada no jogo.','start':'Traçar círculo','h2':'Gerador de círculos Minecraft'},
            'ar': {'title':'مولد دوائر Minecraft - الحدود والقرص والكرة','desc':'مولد دوائر بكسل لـ Minecraft: الحدود، القرص المملوء، الحلقة السميكة وطبقات الكرة. نصف قطر من 1 إلى 256.','h1':'مولد دوائر Minecraft','lede':'يرسم دوائر مثالية وأقراصاً مملوءة وحلقات سميكة وطبقات كرة ثلاثية الأبعاد بنصف قطر من 1 إلى 256 كتلة. يعد الكتل وينزل PNG ويساعدك على النسخ طبقة تلو الأخرى في اللعبة.','start':'ارسم دائرة','h2':'مولد دوائر Minecraft'},
            'ru': {'title':'Генератор кругов Minecraft - контур, диск, сфера','desc':'Генератор пиксельных кругов для Minecraft: контур, заливка, толстое кольцо и слои сферы. Радиус 1-256.','h1':'Генератор кругов Minecraft','lede':'Рисует идеальные круги, заполненные диски, толстые кольца и слои 3D-сферы радиусом от 1 до 256 блоков. Считает блоки, скачивает PNG для второго монитора, копирует рисунок слой за слоем в игре.','start':'Нарисовать круг','h2':'Генератор кругов Minecraft'},
            'ja': {'title':'Minecraft 円ジェネレーター - アウトライン・ディスク・球','desc':'Minecraft 向けピクセル円ジェネレーター: アウトライン、塗りつぶし、太いリング、球の層。半径 1 から 256。','h1':'Minecraft 円ジェネレーター','lede':'半径 1 から 256 ブロックの完全な円、塗りつぶしディスク、太いリング、3D 球レイヤーを描画。ブロック数を数え、PNG をダウンロードしてセカンドモニターに表示し、ゲーム内で層ごとにコピーできます。','start':'円を描く','h2':'Minecraft 円ジェネレーター'},
            'ko': {'title':'Minecraft 원 생성기 - 윤곽선, 디스크, 구','desc':'Minecraft용 픽셀 원 생성기: 윤곽, 채움, 두꺼운 링, 구 레이어. 반지름 1-256.','h1':'Minecraft 원 생성기','lede':'반지름 1-256 블록의 완벽한 원, 채운 디스크, 두꺼운 링, 3D 구 레이어를 그립니다. 블록 수를 세고 PNG를 다운로드해 두 번째 모니터에 두며, 게임 내에서 레이어별로 복사할 수 있습니다.','start':'원 그리기','h2':'Minecraft 원 생성기'},
        },
    },
}


WRAPPER_TEMPLATE = """<?php
/**
 * {locale_dir} localized landing page for {slug}
 * Auto-generated by scripts/gen-localized-wrappers.py
 */
include __DIR__ . '/../../config.php';
$__c = __DIR__ . '/config-{code}.php'; if (file_exists($__c)) include $__c;
$pageTitle = '{title}';
$pageDescription = '{desc}';
?>
<!DOCTYPE html>
<html lang="{code}"{rtl_attr}>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <meta name="description" content="<?php echo $pageDescription; ?>">
  <link rel="alternate" hreflang="en" href="<?php echo absoluteUrl('{slug}.php'); ?>">
  <link rel="alternate" hreflang="{code}" href="<?php echo absoluteUrl('languages/{locale_dir}/{slug}.php'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo absoluteUrl('{slug}.php'); ?>">
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">
  <?php include_once __DIR__ . '/../../includes/schema.php'; echo generateToolPageSchema('{schema_key}', [['name'=>'Home','url'=>'/'],['name'=>'{h1}','url'=>'']]); ?>
</head>
<body class="landing-page">
  <?php $__h = __DIR__ . '/header-{code}.php'; if (file_exists($__h)) include $__h; else include __DIR__ . '/../../header.php'; ?>
  <main id="main-content" class="landing-main">
    <section class="landing-hero">
      <div class="container landing-hero-grid">
        <div class="hero-copy">
          <p class="hero-kicker">{kicker}</p>
          <h1 class="hero-title">{h1}</h1>
          <p class="hero-lede">{lede}</p>
          <div class="hero-actions">
            <a class="landing-btn landing-btn-primary" href="#{slug}">{start}</a>
            <a class="landing-btn landing-btn-ghost" href="#tools">{browse}</a>
          </div>
        </div>
        <div class="hero-visual">
          <div class="hero-shot">
            <img src="<?php echo url('images/{slug}/hero.jpg'); ?>" width="1200" height="800" alt="{h1}" loading="eager" decoding="async" fetchpriority="high">
          </div>
        </div>
      </div>
    </section>
    <section class="tool-stage" id="{slug}">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">{primary_tool}</p>
          <h2>{h2}</h2>
        </div>
      </div>
      <section class="tool-shell"><?php include __DIR__ . '/../../{tool}'; ?></section>
    </section>
    <?php include __DIR__ . '/../../includes/components/tools-list.php'; ?>
    <?php include __DIR__ . '/../../help/seo-content/{slug}.php'; ?>
    <?php $currentTool = '{related}'; include __DIR__ . '/../../includes/related-tools.php'; ?>
    <?php include __DIR__ . '/../../help/{slug}.php'; ?>
  </main>
  <?php $__f = __DIR__ . '/footer-{code}.php'; if (file_exists($__f)) include $__f; else include __DIR__ . '/../../footer.php'; ?>
</body>
</html>
"""


# Schema keys in includes/schema.php (getToolSchemaData / getToolFAQs) per slug
SCHEMA_KEYS = {
    'frequency-response-test':     'frequency_response_test',
    'accelerometer-test':          'accelerometer_test',
    'gyroscope-test':              'gyroscope_test',
    'vibration-test':              'vibration_test',
    'gamertag-generator':          'gamertag_generator',
    'guild-name-generator':        'guild_name_generator',
    'auditory-reaction-time-test': 'auditory_reaction_time',
    'frame-skipping-test':         'frame_skipping_test',
    'surround-sound-test':         'surround_sound_test',
    'cpu-stress-test':             'cpu_stress_test',
    'gpu-stress-test':             'gpu_stress_test',
    'memory-test':                 'memory_test',
    'ram-latency-calculator':      'ram_latency_calc',
    'bandwidth-calculator':        'bandwidth_calc',
    'download-time-calculator':    'download_time_calc',
    'raid-calculator':             'raid_calc',
    'ttk-calculator':              'ttk_calc',
    'minecraft-circle-generator':  'minecraft_circle',
    'monitor-sharpness-test':      'monitor_sharpness_test',
    'pitch-detector':              'pitch_detector',
    'webcam-mirror':               'webcam_mirror',
    'hearing-age-test':            'hearing_age_test',
    'online-ruler':                'online_ruler',
}

# related-tools.php currentTool category per slug (for the related-tools include)
RELATED = {
    'frequency-response-test':   'audio',
    'accelerometer-test':        'mouse',
    'gyroscope-test':            'mouse',
    'vibration-test':            'mouse',
    'gamertag-generator':        'mouse',
    'guild-name-generator':      'mouse',
    'auditory-reaction-time-test': 'audio',
    'frame-skipping-test':       'screen',
    'surround-sound-test':       'audio',
    'cpu-stress-test':           'mouse',
    'gpu-stress-test':           'screen',
    'memory-test':               'mouse',
    'ram-latency-calculator':    'mouse',
    'bandwidth-calculator':      'mouse',
    'download-time-calculator':  'mouse',
    'raid-calculator':           'mouse',
    'ttk-calculator':            'mouse',
    'minecraft-circle-generator':'mouse',
    'monitor-sharpness-test':    'screen',
    'pitch-detector':            'audio',
    'webcam-mirror':             'webcam',
    'hearing-age-test':          'audio',
    'online-ruler':              'mouse',
}


def main():
    count = 0
    missing_trans = []
    for slug, spec in TOOLS.items():
        tool_partial = spec['tool']
        kicker_key = spec['kicker']
        related_cat = RELATED.get(slug, 'mouse')
        schema_key = SCHEMA_KEYS.get(slug, '')
        for lang_dir, code in LANGUAGES:
            if code not in spec['trans']:
                missing_trans.append(f'{slug}/{code}')
                continue
            t = spec['trans'][code]
            ui = UI[code]
            kicker_txt = KICKER[kicker_key][code]
            out_dir = ROOT / 'languages' / lang_dir
            out_dir.mkdir(parents=True, exist_ok=True)
            out_path = out_dir / f'{slug}.php'
            rtl_attr = ' dir="rtl"' if ui['dir'] == 'rtl' else ''
            content = WRAPPER_TEMPLATE.format(
                locale_dir=lang_dir,
                code=code,
                slug=slug,
                title=t['title'].replace("'", "\\'"),
                desc=t['desc'].replace("'", "\\'"),
                rtl_attr=rtl_attr,
                kicker=kicker_txt,
                h1=t['h1'],
                lede=t['lede'],
                start=t['start'],
                browse=ui['browse_all'],
                primary_tool=ui['primary_tool'],
                h2=t['h2'],
                tool=tool_partial,
                related=related_cat,
                schema_key=schema_key,
            )
            out_path.write_text(content, encoding='utf-8')
            count += 1
    print(f'Generated {count} localized wrappers')
    if missing_trans:
        print('Missing translations:')
        for m in missing_trans:
            print('  ' + m)


if __name__ == '__main__':
    main()
