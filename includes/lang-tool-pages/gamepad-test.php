<?php
/**
 * Shared renderer: Gamepad Tester — multilingual
 * Included by per-language wrapper pages that set $lang before inclusion.
 * config.php (and therefore absoluteUrl() / url()) is already loaded.
 */

$langData = [
  'es' => [
    'html_lang'          => 'es',
    'dir'                => 'spanish',
    'hreflang'           => 'es',
    'title'              => 'Probador de Mando Online Gratis | PS5, Xbox, Switch | KeyboardTester.click',
    'description'        => 'Probador gratuito de mando online. Prueba botones, palancas analógicas, vibración y deriva en mandos PS5, Xbox, Switch y PC. Sin descarga.',
    'h1'                 => 'Probador de Mando',
    'subtitle'           => 'Conecta tu mando y pulsa cualquier botón. Compatible con PS5, Xbox, Switch y PC.',
    'connect_msg'        => 'Conecta tu mando y pulsa cualquier botón',
    'connected_prefix'   => 'Mando conectado:',
    'disconnected_msg'   => 'Mando desconectado. Reconecta y pulsa un botón.',
    'section_buttons'    => 'Botones',
    'section_sticks'     => 'Palancas Analógicas',
    'section_vibration'  => 'Prueba de Vibración',
    'left_stick'         => 'Palanca Izquierda',
    'right_stick'        => 'Palanca Derecha',
    'drift_label'        => 'Deriva:',
    'ok_text'            => 'OK',
    'vib_weak'           => 'Débil',
    'vib_med'            => 'Medio',
    'vib_strong'         => 'Fuerte',
    'reset_btn'          => 'Reiniciar',
    'privacy'            => 'Test ejecutado en tu navegador. No se recopilan datos.',
    'trust'              => ['PS5/Xbox/Switch','Detecta deriva','Prueba vibración','Sin descarga'],
    'trust_desc'         => ['Compatible con mandos principales','Umbral de deriva 0.05','Prueba motores de vibración','Funciona en el navegador'],
    'h2_how'             => 'Cómo Usar el Probador de Mando',
    'p_how'              => 'Conecta el mando vía USB o Bluetooth y pulsa cualquier botón. Todos los botones, gatillos y palancas se iluminan al pulsarlos.',
    'h2_drift'           => 'Prueba de Deriva de Palanca',
    'p_drift'            => 'Deja las palancas completamente sin tocar. Si los puntos se mueven solos, tu mando tiene deriva. Un valor superior a 0.05 sin tocar indica deriva.',
  ],
  'fr' => [
    'html_lang'          => 'fr',
    'dir'                => 'french',
    'hreflang'           => 'fr',
    'title'              => 'Test de Manette en Ligne Gratuit | PS5, Xbox, Switch | KeyboardTester.click',
    'description'        => 'Testeur gratuit de manette en ligne. Testez les boutons, sticks analogiques, vibration et dérive sur PS5, Xbox, Switch et PC. Sans téléchargement.',
    'h1'                 => 'Test de Manette',
    'subtitle'           => 'Connectez votre manette et appuyez sur n\'importe quel bouton',
    'connect_msg'        => 'Connectez votre manette et appuyez sur un bouton',
    'connected_prefix'   => 'Manette connectée :',
    'disconnected_msg'   => 'Manette déconnectée. Reconnectez et appuyez sur un bouton.',
    'section_buttons'    => 'Boutons',
    'section_sticks'     => 'Sticks Analogiques',
    'section_vibration'  => 'Test de Vibration',
    'left_stick'         => 'Stick Gauche',
    'right_stick'        => 'Stick Droit',
    'drift_label'        => 'Dérive :',
    'ok_text'            => 'OK',
    'vib_weak'           => 'Faible',
    'vib_med'            => 'Moyen',
    'vib_strong'         => 'Fort',
    'reset_btn'          => 'Réinitialiser',
    'privacy'            => 'Test dans votre navigateur. Aucune donnée collectée.',
    'trust'              => ['PS5/Xbox/Switch','Détecte la dérive','Test vibration','Sans téléchargement'],
    'trust_desc'         => ['Compatible toutes manettes','Seuil dérive 0.05','Teste les moteurs rumble','Dans le navigateur'],
    'h2_how'             => 'Comment Utiliser le Testeur de Manette',
    'p_how'              => 'Connectez via USB ou Bluetooth et appuyez sur un bouton. Tous les boutons, gâchettes et sticks s\'allument à la pression.',
    'h2_drift'           => 'Test de Dérive du Stick',
    'p_drift'            => 'Laissez les sticks complètement immobiles. Si les points se déplacent seuls, votre manette a de la dérive. Une valeur supérieure à 0.05 indique une dérive.',
  ],
  'de' => [
    'html_lang'          => 'de',
    'dir'                => 'german',
    'hreflang'           => 'de',
    'title'              => 'Gamepad-Tester Online Kostenlos | PS5, Xbox, Switch | KeyboardTester.click',
    'description'        => 'Kostenloser Gamepad-Tester online. Testen Sie Tasten, Analogsticks, Vibration und Drift bei PS5, Xbox, Switch und PC. Kein Download.',
    'h1'                 => 'Gamepad-Tester',
    'subtitle'           => 'Controller anschließen und einen Knopf drücken',
    'connect_msg'        => 'Controller anschließen und Knopf drücken',
    'connected_prefix'   => 'Controller verbunden:',
    'disconnected_msg'   => 'Controller getrennt. Neu anschließen und Knopf drücken.',
    'section_buttons'    => 'Tasten',
    'section_sticks'     => 'Analogsticks',
    'section_vibration'  => 'Vibrationstest',
    'left_stick'         => 'Linker Stick',
    'right_stick'        => 'Rechter Stick',
    'drift_label'        => 'Drift:',
    'ok_text'            => 'OK',
    'vib_weak'           => 'Schwach',
    'vib_med'            => 'Mittel',
    'vib_strong'         => 'Stark',
    'reset_btn'          => 'Zurücksetzen',
    'privacy'            => 'Test im Browser. Keine Daten erfasst.',
    'trust'              => ['PS5/Xbox/Switch','Erkennt Drift','Vibrationstest','Kein Download'],
    'trust_desc'         => ['Alle gängigen Controller','Drift-Schwellenwert 0.05','Rumble-Motoren testen','Im Browser'],
    'h2_how'             => 'Wie Man Den Controller-Tester Benutzt',
    'p_how'              => 'Per USB oder Bluetooth verbinden und einen Knopf drücken. Alle Tasten, Trigger und Sticks leuchten auf.',
    'h2_drift'           => 'Stick-Drift-Test',
    'p_drift'            => 'Lassen Sie beide Sticks vollständig unberührt. Wenn sich die Punkte von alleine bewegen, hat Ihr Controller Stick-Drift.',
  ],
  'ja' => [
    'html_lang'          => 'ja',
    'dir'                => 'japanese',
    'hreflang'           => 'ja',
    'title'              => 'ゲームパッドテスター 無料オンライン | PS5, Xbox, Switch | KeyboardTester.click',
    'description'        => '無料ゲームパッドテスターオンライン。PS5、Xbox、Switch、PCコントローラーのボタン・スティック・振動・ドリフトをテスト。ダウンロード不要。',
    'h1'                 => 'ゲームパッドテスター',
    'subtitle'           => 'コントローラーを接続してボタンを押してください',
    'connect_msg'        => 'コントローラーを接続してボタンを押してください',
    'connected_prefix'   => 'コントローラー接続中:',
    'disconnected_msg'   => 'コントローラーが切断されました。再接続してボタンを押してください。',
    'section_buttons'    => 'ボタン',
    'section_sticks'     => 'アナログスティック',
    'section_vibration'  => '振動テスト',
    'left_stick'         => '左スティック',
    'right_stick'        => '右スティック',
    'drift_label'        => 'ドリフト:',
    'ok_text'            => 'OK',
    'vib_weak'           => '弱',
    'vib_med'            => '中',
    'vib_strong'         => '強',
    'reset_btn'          => 'リセット',
    'privacy'            => 'ブラウザ内で動作。データ収集なし。',
    'trust'              => ['PS5/Xbox/Switch対応','ドリフト検出','振動テスト','ダウンロード不要'],
    'trust_desc'         => ['主要コントローラー対応','ドリフト閾値0.05','バイブレーションモーター確認','ブラウザで動作'],
    'h2_how'             => 'ゲームパッドテスターの使い方',
    'p_how'              => 'USBまたはBluetoothで接続し、ボタンを押してください。ボタン・トリガー・スティックを押すと反応します。',
    'h2_drift'           => 'スティックドリフトテスト',
    'p_drift'            => '両スティックを完全に離した状態にしてください。位置ドットが勝手に動く場合、コントローラーにドリフトがあります。',
  ],
  'ko' => [
    'html_lang'          => 'ko',
    'dir'                => 'korean',
    'hreflang'           => 'ko',
    'title'              => '게임패드 테스터 무료 온라인 | PS5, Xbox, Switch | KeyboardTester.click',
    'description'        => '무료 게임패드 테스터 온라인. PS5, Xbox, Switch, PC 컨트롤러의 버튼, 스틱, 진동, 드리프트 테스트. 다운로드 불필요.',
    'h1'                 => '게임패드 테스터',
    'subtitle'           => '컨트롤러를 연결하고 아무 버튼이나 누르세요',
    'connect_msg'        => '컨트롤러를 연결하고 아무 버튼이나 누르세요',
    'connected_prefix'   => '컨트롤러 연결됨:',
    'disconnected_msg'   => '컨트롤러 연결 해제됨. 다시 연결하고 버튼을 누르세요.',
    'section_buttons'    => '버튼',
    'section_sticks'     => '아날로그 스틱',
    'section_vibration'  => '진동 테스트',
    'left_stick'         => '왼쪽 스틱',
    'right_stick'        => '오른쪽 스틱',
    'drift_label'        => '드리프트:',
    'ok_text'            => 'OK',
    'vib_weak'           => '약함',
    'vib_med'            => '중간',
    'vib_strong'         => '강함',
    'reset_btn'          => '초기화',
    'privacy'            => '브라우저에서 실행됩니다. 데이터 수집 없음.',
    'trust'              => ['PS5/Xbox/Switch 지원','드리프트 감지','진동 테스트','다운로드 불필요'],
    'trust_desc'         => ['주요 컨트롤러 지원','드리프트 임계값 0.05','진동 모터 확인','브라우저 기반'],
    'h2_how'             => '게임패드 테스터 사용 방법',
    'p_how'              => 'USB 또는 블루투스로 연결하고 버튼을 누르세요. 모든 버튼, 트리거, 스틱이 누르면 반응합니다.',
    'h2_drift'           => '스틱 드리프트 테스트',
    'p_drift'            => '양쪽 스틱을 완전히 놓아두세요. 위치 점이 혼자 움직이면 드리프트가 있는 것입니다.',
  ],
  'pt' => [
    'html_lang'          => 'pt',
    'dir'                => 'portuguese',
    'hreflang'           => 'pt',
    'title'              => 'Testador de Gamepad Online Grátis | PS5, Xbox, Switch | KeyboardTester.click',
    'description'        => 'Testador gratuito de gamepad online. Teste botões, analógicos, vibração e desvio em controles PS5, Xbox, Switch e PC. Sem download.',
    'h1'                 => 'Testador de Gamepad',
    'subtitle'           => 'Conecte o controle e pressione qualquer botão',
    'connect_msg'        => 'Conecte o controle e pressione qualquer botão',
    'connected_prefix'   => 'Controle conectado:',
    'disconnected_msg'   => 'Controle desconectado. Reconecte e pressione um botão.',
    'section_buttons'    => 'Botões',
    'section_sticks'     => 'Analógicos',
    'section_vibration'  => 'Teste de Vibração',
    'left_stick'         => 'Analógico Esquerdo',
    'right_stick'        => 'Analógico Direito',
    'drift_label'        => 'Desvio:',
    'ok_text'            => 'OK',
    'vib_weak'           => 'Fraco',
    'vib_med'            => 'Médio',
    'vib_strong'         => 'Forte',
    'reset_btn'          => 'Reiniciar',
    'privacy'            => 'Teste no navegador. Nenhum dado coletado.',
    'trust'              => ['PS5/Xbox/Switch','Detecta desvio','Teste de vibração','Sem download'],
    'trust_desc'         => ['Controles principais suportados','Limiar desvio 0.05','Testa motores de vibração','No navegador'],
    'h2_how'             => 'Como Usar o Testador de Gamepad',
    'p_how'              => 'Conecte via USB ou Bluetooth e pressione qualquer botão. Todos os botões, gatilhos e analógicos acendem ao pressionar.',
    'h2_drift'           => 'Teste de Desvio do Analógico',
    'p_drift'            => 'Deixe ambos os analógicos completamente parados. Se os pontos se moverem sozinhos, há desvio. Valor acima de 0.05 indica desvio.',
  ],
  'ru' => [
    'html_lang'          => 'ru',
    'dir'                => 'russian',
    'hreflang'           => 'ru',
    'title'              => 'Тестирование Геймпада Онлайн Бесплатно | PS5, Xbox, Switch | KeyboardTester.click',
    'description'        => 'Бесплатный тестер геймпада онлайн. Тестируйте кнопки, стики, вибрацию и дрейф контроллеров PS5, Xbox, Switch и PC. Без скачивания.',
    'h1'                 => 'Тестирование Геймпада',
    'subtitle'           => 'Подключите контроллер и нажмите любую кнопку',
    'connect_msg'        => 'Подключите контроллер и нажмите любую кнопку',
    'connected_prefix'   => 'Контроллер подключён:',
    'disconnected_msg'   => 'Контроллер отключён. Переподключите и нажмите кнопку.',
    'section_buttons'    => 'Кнопки',
    'section_sticks'     => 'Аналоговые стики',
    'section_vibration'  => 'Тест вибрации',
    'left_stick'         => 'Левый стик',
    'right_stick'        => 'Правый стик',
    'drift_label'        => 'Дрейф:',
    'ok_text'            => 'OK',
    'vib_weak'           => 'Слабая',
    'vib_med'            => 'Средняя',
    'vib_strong'         => 'Сильная',
    'reset_btn'          => 'Сброс',
    'privacy'            => 'Тест в браузере. Данные не собираются.',
    'trust'              => ['PS5/Xbox/Switch','Обнаруживает дрейф','Тест вибрации','Без скачивания'],
    'trust_desc'         => ['Все основные контроллеры','Порог дрейфа 0.05','Тест моторов вибрации','В браузере'],
    'h2_how'             => 'Как Использовать Тестер Геймпада',
    'p_how'              => 'Подключите через USB или Bluetooth и нажмите любую кнопку. Все кнопки, триггеры и стики подсвечиваются при нажатии.',
    'h2_drift'           => 'Тест Дрейфа Стика',
    'p_drift'            => 'Оставьте оба стика полностью в покое. Если точки двигаются сами по себе — контроллер имеет дрейф стика.',
  ],
  'ar' => [
    'html_lang'          => 'ar',
    'dir'                => 'arabic',
    'hreflang'           => 'ar',
    'title'              => 'اختبار وحدة التحكم مجاني أونلاين | PS5, Xbox, Switch | KeyboardTester.click',
    'description'        => 'اختبار مجاني لوحدة التحكم أونلاين. اختبر الأزرار والرافعات والاهتزاز والانجراف في وحدات PS5 وXbox وSwitch والكمبيوتر. بدون تحميل.',
    'h1'                 => 'اختبار وحدة التحكم',
    'subtitle'           => 'وصّل وحدة التحكم واضغط على أي زر',
    'connect_msg'        => 'وصّل وحدة التحكم واضغط على أي زر',
    'connected_prefix'   => 'وحدة تحكم متصلة:',
    'disconnected_msg'   => 'انقطع الاتصال. أعد التوصيل واضغط زراً.',
    'section_buttons'    => 'الأزرار',
    'section_sticks'     => 'الرافعات التناظرية',
    'section_vibration'  => 'اختبار الاهتزاز',
    'left_stick'         => 'الرافعة اليسرى',
    'right_stick'        => 'الرافعة اليمنى',
    'drift_label'        => 'الانجراف:',
    'ok_text'            => 'OK',
    'vib_weak'           => 'ضعيف',
    'vib_med'            => 'متوسط',
    'vib_strong'         => 'قوي',
    'reset_btn'          => 'إعادة تعيين',
    'privacy'            => 'يعمل الاختبار في متصفحك. لا يتم جمع البيانات.',
    'trust'              => ['PS5/Xbox/Switch','يكتشف الانجراف','اختبار الاهتزاز','بدون تحميل'],
    'trust_desc'         => ['يدعم وحدات التحكم الرئيسية','عتبة الانجراف 0.05','يختبر محركات الاهتزاز','في المتصفح'],
    'h2_how'             => 'كيفية استخدام اختبار وحدة التحكم',
    'p_how'              => 'وصّل عبر USB أو Bluetooth واضغط أي زر. ستضيء جميع الأزرار والمشغلات والرافعات عند الضغط.',
    'h2_drift'           => 'اختبار انجراف الرافعة',
    'p_drift'            => 'اترك كلتا الرافعتين دون لمس تمامًا. إذا تحركت النقاط من تلقاء نفسها، فلديك انجراف. قيمة فوق 0.05 دون لمس تشير إلى الانجراف.',
  ],
];

$d    = $langData[$lang] ?? $langData['es'];
$isRtl = ($lang === 'ar');

$hreflangMap = [
  'en' => absoluteUrl('gamepad-test.php'),
  'es' => absoluteUrl('languages/spanish/gamepad-test.php'),
  'fr' => absoluteUrl('languages/french/gamepad-test.php'),
  'de' => absoluteUrl('languages/german/gamepad-test.php'),
  'ja' => absoluteUrl('languages/japanese/gamepad-test.php'),
  'ko' => absoluteUrl('languages/korean/gamepad-test.php'),
  'pt' => absoluteUrl('languages/portuguese/gamepad-test.php'),
  'ru' => absoluteUrl('languages/russian/gamepad-test.php'),
  'ar' => absoluteUrl('languages/arabic/gamepad-test.php'),
];
?>
<!DOCTYPE html>
<html lang="<?php echo $d['html_lang']; ?>"<?php if ($isRtl) echo ' dir="rtl"'; ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($d['title']); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($d['description']); ?>">
  <link rel="canonical" href="<?php echo $hreflangMap[$lang]; ?>">

  <?php foreach ($hreflangMap as $hl => $href): ?>
  <link rel="alternate" hreflang="<?php echo $hl; ?>" href="<?php echo $href; ?>">
  <?php endforeach; ?>
  <link rel="alternate" hreflang="x-default" href="<?php echo $hreflangMap['en']; ?>">

  <?php include __DIR__ . '/../../includes/head-common.php'; ?>

  <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

  <style>
    /* Gamepad Tester — scoped styles */
    .gamepad-tool {
      max-width: 720px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
    }
    .gamepad-tool h1 {
      font-size: clamp(1.75rem, 4vw, 2.5rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #f1f5f9);
    }
    .gamepad-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #94a3b8);
      margin-bottom: 1.5rem;
    }
    .connection-banner {
      padding: 0.75rem 1.25rem;
      border-radius: 10px;
      background: rgba(99,102,241,0.1);
      border: 1px solid var(--border-color, #334155);
      margin-bottom: 1rem;
      color: var(--text-muted, #94a3b8);
      font-size: 0.95rem;
    }
    .connection-banner.connected {
      background: rgba(34,197,94,0.1);
      border-color: #22c55e;
      color: #22c55e;
    }
    #controller-info {
      display: flex;
      gap: 1.5rem;
      flex-wrap: wrap;
      margin-bottom: 1rem;
      font-size: 0.9rem;
      color: var(--text-muted, #94a3b8);
    }
    .buttons-section { margin-bottom: 1.75rem; }
    .buttons-section h3,
    .sticks-section h3,
    .vibration-section h3 {
      font-size: 1rem;
      font-weight: 600;
      color: var(--heading-color, #f1f5f9);
      margin-bottom: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }
    .buttons-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }
    .gamepad-btn {
      width: 60px;
      height: 40px;
      border-radius: 8px;
      border: 1.5px solid var(--border-color, #334155);
      background: var(--card-bg, rgba(30,41,59,0.8));
      font-size: 0.75rem;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.1s, border-color 0.1s, transform 0.1s, color 0.1s;
      color: var(--text-muted, #94a3b8);
      font-family: inherit;
      cursor: default;
      user-select: none;
    }
    .gamepad-btn.active {
      background: var(--primary-color, #6366f1);
      border-color: var(--primary-color, #6366f1);
      color: #fff;
      transform: scale(1.1);
    }
    .sticks-section {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 1.75rem;
    }
    .stick-group { text-align: center; }
    .stick-group canvas {
      display: block;
      margin: 0 auto 0.5rem;
      border-radius: 50%;
      background: rgba(30,41,59,0.6);
      border: 1px solid var(--border-color, #334155);
    }
    .stick-group div {
      font-size: 0.85rem;
      color: var(--text-muted, #94a3b8);
      margin-bottom: 0.2rem;
      font-family: 'JetBrains Mono', monospace;
    }
    .vibration-section { margin-bottom: 1.75rem; }
    .vibration-section .vib-btns {
      display: flex;
      gap: 0.75rem;
      flex-wrap: wrap;
    }
    .vib-btn {
      padding: 0.5rem 1.25rem;
      border: 1.5px solid var(--border-color, #334155);
      border-radius: 8px;
      background: var(--card-bg, rgba(30,41,59,0.8));
      color: var(--text-muted, #94a3b8);
      font-family: inherit;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: border-color 0.15s, color 0.15s, background 0.15s;
    }
    .vib-btn:hover {
      border-color: var(--primary-color, #6366f1);
      color: var(--primary-color, #6366f1);
    }
    .vib-btn:active {
      background: var(--primary-color, #6366f1);
      border-color: var(--primary-color, #6366f1);
      color: #fff;
    }
    #reset-btn {
      display: block;
      padding: 0.6rem 1.75rem;
      border: none;
      border-radius: 8px;
      background: var(--primary-color, #6366f1);
      color: #fff;
      font-family: inherit;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      transition: opacity 0.15s, transform 0.1s;
      margin-bottom: 1.25rem;
    }
    #reset-btn:hover { opacity: 0.88; transform: translateY(-1px); }
    #reset-btn:active { transform: translateY(0); }
    .privacy-note {
      font-size: 0.82rem;
      color: var(--text-muted, #94a3b8);
    }
    .feature-band .section-body,
    .process-band .section-body {
      max-width: 720px;
      margin: 0 auto;
      color: var(--text-muted, #94a3b8);
      line-height: 1.7;
    }
    @media (max-width: 480px) {
      .gamepad-btn { width: 52px; height: 36px; font-size: 0.68rem; }
      .sticks-section { gap: 1.25rem; }
      .gamepad-tool { padding: 1.25rem 1rem 2rem; }
    }
  </style>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/header-' . $lang . '.php'; ?>

  <main id="main-content" class="landing-main">

    <section class="tool-stage" id="gamepad-tool" aria-labelledby="gamepad-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Controller diagnostics</p>
          <h1 id="gamepad-tool-title"><?php echo htmlspecialchars($d['h1']); ?></h1>
          <p class="section-lede"><?php echo htmlspecialchars($d['subtitle']); ?></p>
        </div>
      </div>

      <section class="tool-shell" aria-label="Gamepad test tool">
        <div class="gamepad-tool">

          <!-- Connection status -->
          <div id="connection-status" class="connection-banner"><?php echo htmlspecialchars($d['connect_msg']); ?></div>
          <div id="controller-info" style="display:none;">
            <span><?php echo htmlspecialchars($d['connected_prefix']); ?> <b id="controller-name">--</b></span>
            <span>Buttons: <b id="button-count">--</b></span>
            <span>Axes: <b id="axis-count">--</b></span>
          </div>

          <!-- Buttons grid -->
          <div class="buttons-section">
            <h3><?php echo htmlspecialchars($d['section_buttons']); ?></h3>
            <div class="buttons-grid" id="buttons-grid"></div>
          </div>

          <!-- Analog sticks -->
          <div class="sticks-section">
            <div class="stick-group">
              <h3><?php echo htmlspecialchars($d['left_stick']); ?></h3>
              <canvas id="left-stick-canvas" width="120" height="120" aria-label="Left analog stick position"></canvas>
              <div>X: <span id="left-x">0.000</span></div>
              <div>Y: <span id="left-y">0.000</span></div>
              <div><?php echo htmlspecialchars($d['drift_label']); ?> <span id="left-drift-val">0.000</span> — <b id="left-drift-status" style="color:#2ECC71"><?php echo htmlspecialchars($d['ok_text']); ?></b></div>
            </div>
            <div class="stick-group">
              <h3><?php echo htmlspecialchars($d['right_stick']); ?></h3>
              <canvas id="right-stick-canvas" width="120" height="120" aria-label="Right analog stick position"></canvas>
              <div>X: <span id="right-x">0.000</span></div>
              <div>Y: <span id="right-y">0.000</span></div>
              <div><?php echo htmlspecialchars($d['drift_label']); ?> <span id="right-drift-val">0.000</span> — <b id="right-drift-status" style="color:#2ECC71"><?php echo htmlspecialchars($d['ok_text']); ?></b></div>
            </div>
          </div>

          <!-- Vibration test -->
          <div class="vibration-section">
            <h3><?php echo htmlspecialchars($d['section_vibration']); ?></h3>
            <div class="vib-btns">
              <button class="vib-btn" onclick="testVibration(0.3)"><?php echo htmlspecialchars($d['vib_weak']); ?></button>
              <button class="vib-btn" onclick="testVibration(0.6)"><?php echo htmlspecialchars($d['vib_med']); ?></button>
              <button class="vib-btn" onclick="testVibration(1.0)"><?php echo htmlspecialchars($d['vib_strong']); ?></button>
            </div>
          </div>

          <!-- Reset -->
          <button id="reset-btn"><?php echo htmlspecialchars($d['reset_btn']); ?></button>

          <p class="privacy-note"><?php echo htmlspecialchars($d['privacy']); ?></p>
        </div>
      </section>
    </section>

    <!-- Trust strip -->
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

    <!-- SEO section 1 -->
    <section class="feature-band" aria-labelledby="gp-how-title-<?php echo $lang; ?>">
      <div class="container">
        <div class="section-head">
          <h2 id="gp-how-title-<?php echo $lang; ?>"><?php echo htmlspecialchars($d['h2_how']); ?></h2>
        </div>
        <div class="section-body">
          <p><?php echo htmlspecialchars($d['p_how']); ?></p>
        </div>
      </div>
    </section>

    <!-- SEO section 2 -->
    <section class="process-band" aria-labelledby="gp-drift-title-<?php echo $lang; ?>">
      <div class="container">
        <div class="section-head">
          <h2 id="gp-drift-title-<?php echo $lang; ?>"><?php echo htmlspecialchars($d['h2_drift']); ?></h2>
        </div>
        <div class="section-body">
          <p><?php echo htmlspecialchars($d['p_drift']); ?></p>
        </div>
      </div>
    </section>

  </main>

  <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/footer-' . $lang . '.php'; ?>

  <script>
  (function () {
    'use strict';

    var CONNECT_MSG      = <?php echo json_encode($d['connect_msg']); ?>;
    var CONNECTED_PREFIX = <?php echo json_encode($d['connected_prefix']); ?>;
    var DISCONNECTED_MSG = <?php echo json_encode($d['disconnected_msg']); ?>;
    var OK_TEXT          = <?php echo json_encode($d['ok_text']); ?>;

    var controllers = {};
    var rafId = null;
    var isPolling = false;
    var DRIFT_THRESHOLD = 0.05;

    var BUTTON_LABELS = ['A/\u2715','B/\u25CB','X/\u25A1','Y/\u25B3','LB','RB','LT','RT','Select','Start','L3','R3','D\u2191','D\u2193','D\u2190','D\u2192','Home'];
    var grid = document.getElementById('buttons-grid');
    BUTTON_LABELS.forEach(function (label, i) {
      var div = document.createElement('div');
      div.className = 'gamepad-btn';
      div.id = 'btn-' + i;
      div.textContent = label;
      grid.appendChild(div);
    });

    window.addEventListener('gamepadconnected', function (e) {
      controllers[e.gamepad.index] = e.gamepad;
      var statusEl = document.getElementById('connection-status');
      statusEl.textContent = CONNECTED_PREFIX + ' ' + e.gamepad.id.substring(0, 50);
      statusEl.className = 'connection-banner connected';
      document.getElementById('controller-info').style.display = 'flex';
      document.getElementById('controller-name').textContent = e.gamepad.id.substring(0, 50);
      document.getElementById('button-count').textContent = e.gamepad.buttons.length;
      document.getElementById('axis-count').textContent = e.gamepad.axes.length;
      if (!isPolling) startPolling();
    });

    window.addEventListener('gamepaddisconnected', function (e) {
      delete controllers[e.gamepad.index];
      if (Object.keys(controllers).length === 0) {
        stopPolling();
        var statusEl = document.getElementById('connection-status');
        statusEl.textContent = DISCONNECTED_MSG;
        statusEl.className = 'connection-banner';
        document.getElementById('controller-info').style.display = 'none';
      }
    });

    function startPolling() {
      isPolling = true;
      rafId = requestAnimationFrame(pollGamepads);
    }

    function stopPolling() {
      isPolling = false;
      if (rafId) cancelAnimationFrame(rafId);
    }

    function pollGamepads() {
      var gamepads = navigator.getGamepads ? navigator.getGamepads() : [];
      for (var i = 0; i < gamepads.length; i++) {
        var gp = gamepads[i];
        if (!gp) continue;
        updateButtons(gp.buttons);
        updateAxes(gp.axes);
        updateDrift(gp.axes);
      }
      if (isPolling) rafId = requestAnimationFrame(pollGamepads);
    }

    function updateButtons(buttons) {
      buttons.forEach(function (btn, i) {
        var el = document.getElementById('btn-' + i);
        if (!el) return;
        var pressed = btn.pressed || btn.value > 0.1;
        el.classList.toggle('active', pressed);
      });
    }

    function updateAxes(axes) {
      if (axes.length >= 2) {
        document.getElementById('left-x').textContent = axes[0].toFixed(3);
        document.getElementById('left-y').textContent = axes[1].toFixed(3);
        drawStick('left-stick-canvas', axes[0], axes[1]);
      }
      if (axes.length >= 4) {
        document.getElementById('right-x').textContent = axes[2].toFixed(3);
        document.getElementById('right-y').textContent = axes[3].toFixed(3);
        drawStick('right-stick-canvas', axes[2], axes[3]);
      }
    }

    function drawStick(canvasId, x, y) {
      var c = document.getElementById(canvasId);
      if (!c) return;
      var ctx = c.getContext('2d');
      var cx = c.width / 2, cy = c.height / 2, r = cx - 8;
      ctx.clearRect(0, 0, c.width, c.height);
      ctx.beginPath();
      ctx.arc(cx, cy, r, 0, Math.PI * 2);
      ctx.strokeStyle = '#555';
      ctx.lineWidth = 1.5;
      ctx.stroke();
      ctx.strokeStyle = '#444';
      ctx.lineWidth = 0.5;
      ctx.beginPath();
      ctx.moveTo(cx - r, cy);
      ctx.lineTo(cx + r, cy);
      ctx.stroke();
      ctx.beginPath();
      ctx.moveTo(cx, cy - r);
      ctx.lineTo(cx, cy + r);
      ctx.stroke();
      ctx.beginPath();
      ctx.arc(cx, cy, r * 0.1, 0, Math.PI * 2);
      ctx.strokeStyle = 'rgba(231,76,60,0.4)';
      ctx.lineWidth = 1;
      ctx.stroke();
      var dotX = cx + x * r, dotY = cy + y * r;
      ctx.beginPath();
      ctx.arc(dotX, dotY, 6, 0, Math.PI * 2);
      ctx.fillStyle = '#3498DB';
      ctx.fill();
    }

    function updateDrift(axes) {
      if (axes.length >= 2) {
        var mag = Math.sqrt(axes[0] * axes[0] + axes[1] * axes[1]);
        document.getElementById('left-drift-val').textContent = mag.toFixed(3);
        var isDrift = mag > DRIFT_THRESHOLD;
        document.getElementById('left-drift-status').textContent = isDrift ? 'DRIFT!' : OK_TEXT;
        document.getElementById('left-drift-status').style.color = isDrift ? '#E74C3C' : '#2ECC71';
      }
      if (axes.length >= 4) {
        var mag2 = Math.sqrt(axes[2] * axes[2] + axes[3] * axes[3]);
        document.getElementById('right-drift-val').textContent = mag2.toFixed(3);
        var isDrift2 = mag2 > DRIFT_THRESHOLD;
        document.getElementById('right-drift-status').textContent = isDrift2 ? 'DRIFT!' : OK_TEXT;
        document.getElementById('right-drift-status').style.color = isDrift2 ? '#E74C3C' : '#2ECC71';
      }
    }

    window.testVibration = function (intensity) {
      var gamepads = navigator.getGamepads ? navigator.getGamepads() : [];
      for (var i = 0; i < gamepads.length; i++) {
        var gp = gamepads[i];
        if (!gp || !gp.vibrationActuator) continue;
        gp.vibrationActuator.playEffect('dual-rumble', {
          startDelay: 0,
          duration: 500,
          weakMagnitude: intensity,
          strongMagnitude: intensity
        });
      }
    };

    document.getElementById('reset-btn').addEventListener('click', function () {
      BUTTON_LABELS.forEach(function (_, i) {
        var el = document.getElementById('btn-' + i);
        if (el) el.classList.remove('active');
      });
      ['left-x', 'left-y', 'right-x', 'right-y'].forEach(function (id) {
        document.getElementById(id).textContent = '0.000';
      });
      ['left-drift-val', 'right-drift-val'].forEach(function (id) {
        document.getElementById(id).textContent = '0.000';
      });
      ['left-drift-status', 'right-drift-status'].forEach(function (id) {
        var el = document.getElementById(id);
        el.textContent = OK_TEXT;
        el.style.color = '#2ECC71';
      });
      ['left-stick-canvas', 'right-stick-canvas'].forEach(function (id) {
        drawStick(id, 0, 0);
      });
    });

    drawStick('left-stick-canvas', 0, 0);
    drawStick('right-stick-canvas', 0, 0);

  }());
  </script>

</body>
</html>
