<?php
/**
 * Shared renderer: Refresh Rate Test — multilingual
 * Included by per-language wrapper pages that set $lang before inclusion.
 * config.php (and therefore absoluteUrl() / url()) is already loaded.
 */

$langData = [
  'es' => [
    'html_lang'        => 'es',
    'dir'              => 'spanish',
    'hreflang'         => 'es',
    'title'            => 'Test de Tasa de Refresco del Monitor Online Gratis | KeyboardTester.click',
    'description'      => 'Test gratuito de tasa de refresco del monitor. Detecta si tu pantalla funciona a 60Hz, 144Hz, 240Hz o más. Resultado en 3 segundos. Sin descarga.',
    'h1'               => 'Test de Tasa de Refresco del Monitor',
    'subtitle'         => 'Detecta automáticamente si tu pantalla funciona a 60Hz, 144Hz, 240Hz o más',
    'start_btn'        => 'Iniciar Test',
    'reset_btn'        => 'Reiniciar',
    'status_init'      => 'Haz clic en Iniciar para medir tu tasa de refresco',
    'status_measuring' => 'Midiendo... espera 3 segundos',
    'status_complete'  => '¡Test completado!',
    'detected_label'   => 'Hz Detectado',
    'fps_label'        => 'FPS en Vivo',
    'jitter_label'     => 'Jitter',
    'frames_label'     => 'Fotogramas',
    'class_label'      => 'Clasificación',
    'privacy'          => 'Test ejecutado en tu navegador. No se recopilan datos.',
    'trust'            => ['Detección automática','Funciona en cualquier monitor','Solo 3 segundos','Sin instalación'],
    'trust_desc'       => ['Detecta tu Hz real automáticamente','Compatible con todos los monitores','Resultado en 3 segundos','Funciona en el navegador'],
    'h2_what'          => '¿Qué Es la Tasa de Refresco?',
    'p_what'           => 'La tasa de refresco es el número de veces por segundo que tu monitor redibuja la imagen. 60Hz=60 veces/seg. 144Hz=movimiento más suave y menos desenfoque.',
    'h2_how'           => '¿Por Qué Mi Monitor Muestra Menos Hz?',
    'p_how'            => 'Si tu monitor es 144Hz pero muestra 60Hz, no está configurado a su frecuencia máxima. Ve a: Configuración > Pantalla > Pantalla avanzada > Selecciona la frecuencia más alta.',
  ],
  'fr' => [
    'html_lang'        => 'fr',
    'dir'              => 'french',
    'hreflang'         => 'fr',
    'title'            => 'Test de Taux de Rafraîchissement du Moniteur Gratuit | KeyboardTester.click',
    'description'      => 'Test gratuit du taux de rafraîchissement. Détecte si votre écran fonctionne à 60Hz, 144Hz, 240Hz ou plus. Résultat en 3 secondes. Sans téléchargement.',
    'h1'               => 'Test de Taux de Rafraîchissement',
    'subtitle'         => 'Détecte si votre écran fonctionne à 60Hz, 144Hz, 240Hz ou plus',
    'start_btn'        => 'Démarrer',
    'reset_btn'        => 'Réinitialiser',
    'status_init'      => 'Cliquez sur Démarrer pour mesurer',
    'status_measuring' => 'Mesure en cours... 3 secondes',
    'status_complete'  => 'Test terminé !',
    'detected_label'   => 'Hz Détecté',
    'fps_label'        => 'FPS en Direct',
    'jitter_label'     => 'Gigue',
    'frames_label'     => 'Images',
    'class_label'      => 'Classification',
    'privacy'          => 'Test exécuté dans votre navigateur. Aucune donnée collectée.',
    'trust'            => ['Détection auto','Tout moniteur','3 secondes','Sans installation'],
    'trust_desc'       => ['Détecte votre Hz réel','Compatible avec tous les écrans','Résultat en 3 secondes','Fonctionne dans le navigateur'],
    'h2_what'          => 'Qu\'est-ce que le Taux de Rafraîchissement ?',
    'p_what'           => 'Le taux de rafraîchissement est le nombre de fois par seconde que votre moniteur redessine l\'image. 60Hz=standard, 144Hz=gaming fluide.',
    'h2_how'           => 'Pourquoi Mon Moniteur Affiche Moins ?',
    'p_how'            => 'Si votre moniteur 144Hz affiche 60Hz, il n\'est pas réglé sur sa fréquence maximale. Allez dans Paramètres > Affichage > Fréquence de rafraîchissement.',
  ],
  'de' => [
    'html_lang'        => 'de',
    'dir'              => 'german',
    'hreflang'         => 'de',
    'title'            => 'Monitor-Bildwiederholrate-Test Kostenlos Online | KeyboardTester.click',
    'description'      => 'Kostenloser Bildwiederholrate-Test. Erkennt ob dein Monitor bei 60Hz, 144Hz oder 240Hz läuft. Ergebnis in 3 Sekunden. Kein Download nötig.',
    'h1'               => 'Monitor-Bildwiederholrate-Test',
    'subtitle'         => 'Erkennt automatisch ob dein Monitor bei 60Hz, 144Hz oder 240Hz läuft',
    'start_btn'        => 'Test Starten',
    'reset_btn'        => 'Zurücksetzen',
    'status_init'      => 'Klicken Sie auf Start, um die Bildwiederholrate zu messen',
    'status_measuring' => 'Messen... bitte 3 Sekunden warten',
    'status_complete'  => 'Test abgeschlossen!',
    'detected_label'   => 'Erkannte Hz',
    'fps_label'        => 'Live FPS',
    'jitter_label'     => 'Jitter',
    'frames_label'     => 'Frames',
    'class_label'      => 'Klassifizierung',
    'privacy'          => 'Test läuft im Browser. Keine Daten werden erfasst.',
    'trust'            => ['Automatische Erkennung','Jeder Monitor','3 Sekunden','Kein Download'],
    'trust_desc'       => ['Erkennt echte Hz automatisch','Mit allen Monitoren kompatibel','Ergebnis in 3 Sekunden','Kein Download nötig'],
    'h2_what'          => 'Was Ist die Bildwiederholrate?',
    'p_what'           => 'Die Bildwiederholrate gibt an, wie oft pro Sekunde Ihr Monitor das Bild neu zeichnet. 60Hz=Standard, 144Hz=flüssiges Gaming.',
    'h2_how'           => 'Warum Zeigt Mein Monitor Weniger Hz?',
    'p_how'            => 'Wenn Ihr 144Hz-Monitor 60Hz anzeigt, ist er nicht auf maximale Frequenz eingestellt. Gehen Sie zu: Einstellungen > Anzeige > Erweiterte Anzeige > Bildwiederholrate.',
  ],
  'ja' => [
    'html_lang'        => 'ja',
    'dir'              => 'japanese',
    'hreflang'         => 'ja',
    'title'            => 'モニターリフレッシュレートテスト 無料オンライン | KeyboardTester.click',
    'description'      => '無料モニターリフレッシュレートテスト。60Hz・144Hz・240Hz以上で動作しているか自動検出。3秒で結果表示。ダウンロード不要。',
    'h1'               => 'モニターリフレッシュレートテスト',
    'subtitle'         => '60Hz・144Hz・240Hz以上で動作しているか自動検出',
    'start_btn'        => 'テスト開始',
    'reset_btn'        => 'リセット',
    'status_init'      => '開始をクリックしてリフレッシュレートを測定',
    'status_measuring' => '測定中... 3秒待ってください',
    'status_complete'  => 'テスト完了！',
    'detected_label'   => '検出Hz',
    'fps_label'        => 'ライブFPS',
    'jitter_label'     => 'ジッター',
    'frames_label'     => 'フレーム数',
    'class_label'      => '分類',
    'privacy'          => 'ブラウザ内で動作。データ収集なし。',
    'trust'            => ['自動検出','どのモニターでも対応','3秒で完了','ダウンロード不要'],
    'trust_desc'       => ['実際のHzを自動検出','全モニター対応','3秒で結果','インストール不要'],
    'h2_what'          => 'リフレッシュレートとは？',
    'p_what'           => 'リフレッシュレートはモニターが毎秒何回画像を描き直すかです。60Hz=標準、144Hz=滑らかなゲーミング。',
    'h2_how'           => 'なぜ期待より低いHzが表示されるの？',
    'p_how'            => '144HzモニターでChrome60Hzを表示する場合、最大リフレッシュレートに設定されていません。設定>ディスプレイ>詳細表示>リフレッシュレートから最高値を選択してください。',
  ],
  'ko' => [
    'html_lang'        => 'ko',
    'dir'              => 'korean',
    'hreflang'         => 'ko',
    'title'            => '모니터 주사율 테스트 무료 온라인 | KeyboardTester.click',
    'description'      => '무료 모니터 주사율 테스트. 60Hz, 144Hz, 240Hz 이상으로 작동하는지 자동 감지. 3초 내 결과. 다운로드 불필요.',
    'h1'               => '모니터 주사율 테스트',
    'subtitle'         => '60Hz, 144Hz, 240Hz 이상으로 작동하는지 자동 감지',
    'start_btn'        => '테스트 시작',
    'reset_btn'        => '초기화',
    'status_init'      => '시작을 클릭하여 주사율 측정',
    'status_measuring' => '측정 중... 3초 기다리세요',
    'status_complete'  => '테스트 완료!',
    'detected_label'   => '감지된 Hz',
    'fps_label'        => '실시간 FPS',
    'jitter_label'     => '지터',
    'frames_label'     => '프레임 수',
    'class_label'      => '분류',
    'privacy'          => '브라우저에서 실행됩니다. 데이터 수집 없음.',
    'trust'            => ['자동 감지','모든 모니터 지원','3초 소요','다운로드 불필요'],
    'trust_desc'       => ['실제 Hz 자동 감지','모든 모니터와 호환','3초 내 결과','설치 불필요'],
    'h2_what'          => '주사율이란?',
    'p_what'           => '주사율은 모니터가 초당 화면을 다시 그리는 횟수입니다. 60Hz=표준, 144Hz=부드러운 게이밍.',
    'h2_how'           => '왜 모니터 스펙보다 낮게 표시되나요?',
    'p_how'            => '144Hz 모니터인데 60Hz로 표시된다면 최대 주사율로 설정되지 않은 것입니다. 설정>디스플레이>고급 디스플레이>주사율에서 최고값을 선택하세요.',
  ],
  'pt' => [
    'html_lang'        => 'pt',
    'dir'              => 'portuguese',
    'hreflang'         => 'pt',
    'title'            => 'Teste de Taxa de Atualização do Monitor Online Grátis | KeyboardTester.click',
    'description'      => 'Teste gratuito de taxa de atualização do monitor. Detecta se seu monitor roda a 60Hz, 144Hz, 240Hz ou mais. Resultado em 3 segundos. Sem download.',
    'h1'               => 'Teste de Taxa de Atualização do Monitor',
    'subtitle'         => 'Detecta automaticamente se seu monitor roda a 60Hz, 144Hz, 240Hz ou mais',
    'start_btn'        => 'Iniciar Teste',
    'reset_btn'        => 'Reiniciar',
    'status_init'      => 'Clique em Iniciar para medir a taxa de atualização',
    'status_measuring' => 'Medindo... aguarde 3 segundos',
    'status_complete'  => 'Teste concluído!',
    'detected_label'   => 'Hz Detectado',
    'fps_label'        => 'FPS ao Vivo',
    'jitter_label'     => 'Jitter',
    'frames_label'     => 'Quadros',
    'class_label'      => 'Classificação',
    'privacy'          => 'Teste executado no navegador. Nenhum dado coletado.',
    'trust'            => ['Detecção automática','Qualquer monitor','3 segundos','Sem download'],
    'trust_desc'       => ['Detecta seu Hz real','Compatível com todos os monitores','Resultado em 3 segundos','Sem instalação'],
    'h2_what'          => 'O Que É Taxa de Atualização?',
    'p_what'           => 'A taxa de atualização é quantas vezes por segundo seu monitor redesenha a imagem. 60Hz=padrão, 144Hz=gaming fluido.',
    'h2_how'           => 'Por Que Meu Monitor Mostra Menos Hz?',
    'p_how'            => 'Se seu monitor é 144Hz mas mostra 60Hz, não está configurado na frequência máxima. Vá em Configurações>Vídeo>Avançado>Taxa de atualização.',
  ],
  'ru' => [
    'html_lang'        => 'ru',
    'dir'              => 'russian',
    'hreflang'         => 'ru',
    'title'            => 'Тест Частоты Обновления Монитора Онлайн Бесплатно | KeyboardTester.click',
    'description'      => 'Бесплатный тест частоты обновления монитора. Определяет работает ли монитор на 60Гц, 144Гц или 240Гц. Результат за 3 секунды. Без скачивания.',
    'h1'               => 'Тест Частоты Обновления Монитора',
    'subtitle'         => 'Автоматически определяет работает ли монитор на 60Гц, 144Гц, 240Гц или выше',
    'start_btn'        => 'Начать Тест',
    'reset_btn'        => 'Сброс',
    'status_init'      => 'Нажмите Начать для измерения частоты обновления',
    'status_measuring' => 'Измерение... подождите 3 секунды',
    'status_complete'  => 'Тест завершён!',
    'detected_label'   => 'Обнаружено Гц',
    'fps_label'        => 'Живой FPS',
    'jitter_label'     => 'Джиттер',
    'frames_label'     => 'Кадры',
    'class_label'      => 'Категория',
    'privacy'          => 'Тест выполняется в браузере. Данные не собираются.',
    'trust'            => ['Автоопределение','Любой монитор','3 секунды','Без скачивания'],
    'trust_desc'       => ['Определяет реальный Гц','Со всеми мониторами','Результат за 3 секунды','Без установки'],
    'h2_what'          => 'Что Такое Частота Обновления?',
    'p_what'           => 'Частота обновления — сколько раз в секунду монитор перерисовывает изображение. 60Гц=стандарт, 144Гц=плавный гейминг.',
    'h2_how'           => 'Почему Монитор Показывает Меньше Гц?',
    'p_how'            => 'Если монитор 144Гц показывает 60Гц, он не настроен на максимальную частоту. Зайдите в Настройки>Экран>Расширенные настройки экрана>Частота обновления.',
  ],
  'ar' => [
    'html_lang'        => 'ar',
    'dir'              => 'arabic',
    'hreflang'         => 'ar',
    'title'            => 'اختبار معدل تحديث الشاشة مجاني أونلاين | KeyboardTester.click',
    'description'      => 'اختبار مجاني لمعدل تحديث الشاشة. يكتشف تلقائيًا إذا كانت شاشتك تعمل بـ 60Hz أو 144Hz أو 240Hz. نتيجة في 3 ثوانٍ. بدون تحميل.',
    'h1'               => 'اختبار معدل تحديث الشاشة',
    'subtitle'         => 'يكتشف تلقائيًا إذا كانت شاشتك تعمل بـ 60Hz أو 144Hz أو 240Hz أو أكثر',
    'start_btn'        => 'بدء الاختبار',
    'reset_btn'        => 'إعادة تعيين',
    'status_init'      => 'انقر فوق بدء لقياس معدل التحديث',
    'status_measuring' => 'جارٍ القياس... انتظر 3 ثوانٍ',
    'status_complete'  => 'اكتمل الاختبار!',
    'detected_label'   => 'Hz المكتشف',
    'fps_label'        => 'FPS مباشر',
    'jitter_label'     => 'الاهتزاز',
    'frames_label'     => 'الإطارات',
    'class_label'      => 'التصنيف',
    'privacy'          => 'يعمل الاختبار في متصفحك. لا يتم جمع البيانات.',
    'trust'            => ['كشف تلقائي','أي شاشة','3 ثوانٍ','بدون تحميل'],
    'trust_desc'       => ['يكتشف Hz الفعلي تلقائيًا','متوافق مع جميع الشاشات','نتيجة في 3 ثوانٍ','بدون تثبيت'],
    'h2_what'          => 'ما هو معدل التحديث؟',
    'p_what'           => 'معدل التحديث هو عدد مرات إعادة رسم الصورة في الثانية. 60Hz=قياسي، 144Hz=ألعاب سلسة.',
    'h2_how'           => 'لماذا تظهر شاشتي أقل مما هو مكتوب؟',
    'p_how'            => 'إذا كانت شاشتك 144Hz وتظهر 60Hz، فهي غير مضبوطة على الحد الأقصى. اذهب إلى الإعدادات>العرض>إعدادات العرض المتقدمة>معدل التحديث.',
  ],
];

$d    = $langData[$lang] ?? $langData['es'];
$isRtl = ($lang === 'ar');

// hreflang map
$hreflangMap = [
  'en' => absoluteUrl('refresh-rate-test.php'),
  'es' => absoluteUrl('languages/spanish/refresh-rate-test.php'),
  'fr' => absoluteUrl('languages/french/refresh-rate-test.php'),
  'de' => absoluteUrl('languages/german/refresh-rate-test.php'),
  'ja' => absoluteUrl('languages/japanese/refresh-rate-test.php'),
  'ko' => absoluteUrl('languages/korean/refresh-rate-test.php'),
  'pt' => absoluteUrl('languages/portuguese/refresh-rate-test.php'),
  'ru' => absoluteUrl('languages/russian/refresh-rate-test.php'),
  'ar' => absoluteUrl('languages/arabic/refresh-rate-test.php'),
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
    .refresh-tool {
      max-width: 640px;
      margin: 0 auto;
      padding: 2rem 1rem;
      text-align: center;
    }
    .hz-display {
      font-size: 5rem;
      font-weight: 700;
      color: var(--heading-color, #f1f5f9);
      line-height: 1;
      margin-bottom: 1.5rem;
      font-variant-numeric: tabular-nums;
      letter-spacing: -2px;
    }
    .stats-row {
      display: flex;
      gap: 1rem;
      justify-content: center;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
    }
    .stat-card {
      background: var(--card-bg, rgba(30,41,59,0.8));
      border: 1px solid var(--border-color, #334155);
      border-radius: 10px;
      padding: 0.75rem 1.25rem;
      min-width: 130px;
    }
    .stat-label {
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: var(--text-muted, #94a3b8);
      margin-bottom: 0.25rem;
    }
    .stat-value {
      font-size: 1.25rem;
      font-weight: 600;
      color: var(--heading-color, #f1f5f9);
      font-variant-numeric: tabular-nums;
    }
    .progress-track {
      background: var(--border-color, #334155);
      border-radius: 999px;
      height: 8px;
      width: 100%;
      overflow: hidden;
      margin-bottom: 1.25rem;
    }
    .progress-fill {
      height: 100%;
      width: 0%;
      background: var(--primary-color, #6366f1);
      border-radius: 999px;
      transition: width 0.1s linear;
    }
    .hz-result-box {
      background: var(--card-bg, rgba(30,41,59,0.8));
      border: 1px solid var(--primary-color, #6366f1);
      border-radius: 12px;
      padding: 1.25rem;
      margin-bottom: 1.25rem;
      display: none;
    }
    .hz-result-box h3 {
      margin: 0 0 0.4rem;
      font-size: 1rem;
      color: var(--text-muted, #94a3b8);
      font-weight: 500;
    }
    .display-class {
      font-size: 1.1rem;
      font-weight: 600;
      color: var(--primary-color, #6366f1);
    }
    .status-msg {
      color: var(--text-muted, #94a3b8);
      font-size: 0.9rem;
      margin-bottom: 1.25rem;
      min-height: 1.4em;
    }
    .btn-row {
      display: flex;
      gap: 0.75rem;
      justify-content: center;
      margin-bottom: 1.25rem;
      flex-wrap: wrap;
    }
    .rr-btn {
      padding: 0.65rem 1.5rem;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      border: 2px solid transparent;
      transition: opacity 0.2s, background 0.2s;
    }
    .rr-btn-primary {
      background: var(--primary-color, #6366f1);
      color: #fff;
      border-color: var(--primary-color, #6366f1);
    }
    .rr-btn-primary:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }
    .rr-btn-ghost {
      background: transparent;
      color: var(--heading-color, #f1f5f9);
      border-color: var(--border-color, #334155);
    }
    .rr-btn-ghost:hover {
      border-color: var(--primary-color, #6366f1);
    }
    .privacy-note {
      font-size: 0.78rem;
      color: var(--text-muted, #94a3b8);
      margin-bottom: 1.25rem;
    }
    .feature-band .section-body,
    .process-band .section-body {
      max-width: 720px;
      margin: 0 auto;
      color: var(--text-muted, #94a3b8);
      line-height: 1.7;
    }
  </style>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/header-' . $lang . '.php'; ?>

  <main id="main-content" class="landing-main">

    <section class="tool-stage" id="refresh-rate-stage" aria-labelledby="refresh-rate-h1">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Display diagnostics</p>
          <h1 id="refresh-rate-h1"><?php echo htmlspecialchars($d['h1']); ?></h1>
          <p class="section-lede"><?php echo htmlspecialchars($d['subtitle']); ?></p>
        </div>
      </div>

      <section class="tool-shell">
        <div class="refresh-tool">

          <div class="hz-display" id="detected-hz">-- Hz</div>

          <div class="stats-row">
            <div class="stat-card">
              <div class="stat-label"><?php echo htmlspecialchars($d['fps_label']); ?></div>
              <div class="stat-value" id="live-fps">-- fps</div>
            </div>
            <div class="stat-card">
              <div class="stat-label"><?php echo htmlspecialchars($d['jitter_label']); ?></div>
              <div class="stat-value" id="jitter-ms">-- ms</div>
            </div>
            <div class="stat-card">
              <div class="stat-label"><?php echo htmlspecialchars($d['frames_label']); ?></div>
              <div class="stat-value" id="frame-count">0</div>
            </div>
          </div>

          <div class="progress-track">
            <div class="progress-fill" id="progress-bar"></div>
          </div>

          <div class="hz-result-box" id="hz-result-box">
            <h3><?php echo htmlspecialchars($d['class_label']); ?></h3>
            <div class="display-class" id="display-class"></div>
          </div>

          <p class="status-msg" id="status-msg"><?php echo htmlspecialchars($d['status_init']); ?></p>

          <div class="btn-row">
            <button class="rr-btn rr-btn-primary" id="start-btn" onclick="startTest()"><?php echo htmlspecialchars($d['start_btn']); ?></button>
            <button class="rr-btn rr-btn-ghost" onclick="resetTest()"><?php echo htmlspecialchars($d['reset_btn']); ?></button>
          </div>

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

    <?php require_once __DIR__ . '/../components/tool-list-renderer.php'; renderToolsList($lang); ?>

    <!-- SEO section 1 -->
    <section class="feature-band" aria-labelledby="rr-what-title-<?php echo $lang; ?>">
      <div class="container">
        <div class="section-head">
          <h2 id="rr-what-title-<?php echo $lang; ?>"><?php echo htmlspecialchars($d['h2_what']); ?></h2>
        </div>
        <div class="section-body">
          <p><?php echo htmlspecialchars($d['p_what']); ?></p>
        </div>
      </div>
    </section>

    <!-- SEO section 2 -->
    <section class="process-band" aria-labelledby="rr-how-title-<?php echo $lang; ?>">
      <div class="container">
        <div class="section-head">
          <h2 id="rr-how-title-<?php echo $lang; ?>"><?php echo htmlspecialchars($d['h2_how']); ?></h2>
        </div>
        <div class="section-body">
          <p><?php echo htmlspecialchars($d['p_how']); ?></p>
        </div>
      </div>
    </section>

  </main>

  <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/footer-' . $lang . '.php'; ?>

  <script>
  (function () {
    'use strict';
    var STATUS_INIT      = <?php echo json_encode($d['status_init']); ?>;
    var STATUS_MEASURING = <?php echo json_encode($d['status_measuring']); ?>;
    var STATUS_COMPLETE  = <?php echo json_encode($d['status_complete']); ?>;

    var frameTimestamps = [], rafId = null, isRunning = false, startTime = null;
    var SAMPLE_DURATION_MS = 3000;

    function startTest() {
      frameTimestamps = [];
      isRunning = true;
      startTime = null;
      document.getElementById('status-msg').textContent = STATUS_MEASURING;
      document.getElementById('hz-result-box').style.display = 'none';
      document.getElementById('start-btn').disabled = true;
      rafId = requestAnimationFrame(measureFrame);
    }

    function measureFrame(timestamp) {
      if (!startTime) startTime = timestamp;
      frameTimestamps.push(timestamp);
      var elapsed = timestamp - startTime;
      var pct = Math.min((elapsed / SAMPLE_DURATION_MS) * 100, 100);
      document.getElementById('progress-bar').style.width = pct + '%';
      document.getElementById('frame-count').textContent = frameTimestamps.length;
      if (frameTimestamps.length >= 2) {
        var recent = frameTimestamps.slice(-10);
        var avgDelta = (recent[recent.length - 1] - recent[0]) / (recent.length - 1);
        document.getElementById('live-fps').textContent = Math.round(1000 / avgDelta) + ' fps';
      }
      if (elapsed < SAMPLE_DURATION_MS) {
        rafId = requestAnimationFrame(measureFrame);
      } else {
        calculateResults();
      }
    }

    function calculateResults() {
      isRunning = false;
      var frames = frameTimestamps;
      if (frames.length < 10) {
        document.getElementById('status-msg').textContent = STATUS_INIT;
        document.getElementById('start-btn').disabled = false;
        return;
      }
      var deltas = [];
      for (var i = 1; i < frames.length; i++) deltas.push(frames[i] - frames[i - 1]);
      deltas.sort(function (a, b) { return a - b; });
      var trim = Math.floor(deltas.length * 0.05);
      var trimmed = deltas.slice(trim, deltas.length - trim);
      var avgDelta = trimmed.reduce(function (a, b) { return a + b; }, 0) / trimmed.length;
      var rawHz = 1000 / avgDelta;
      var standards = [24,30,48,60,75,90,100,120,144,165,180,240,280,360,480,500,1000];
      var snapped = rawHz;
      for (var s = 0; s < standards.length; s++) {
        if (Math.abs(rawHz - standards[s]) < 3) { snapped = standards[s]; break; }
      }
      var mean = avgDelta;
      var variance = trimmed.reduce(function (sum, d) { return sum + Math.pow(d - mean, 2); }, 0) / trimmed.length;
      var jitter = Math.sqrt(variance).toFixed(2);
      document.getElementById('detected-hz').textContent = snapped + ' Hz';
      document.getElementById('jitter-ms').textContent = jitter + ' ms';
      document.getElementById('hz-result-box').style.display = 'block';
      document.getElementById('status-msg').textContent = STATUS_COMPLETE;
      document.getElementById('start-btn').disabled = false;
      var cls = '';
      if (snapped >= 240) cls = 'Pro gaming / Esports';
      else if (snapped >= 144) cls = 'High-refresh gaming';
      else if (snapped >= 75) cls = 'Smooth gaming';
      else cls = 'Standard display';
      document.getElementById('display-class').textContent = cls;
    }

    function stopTest() {
      if (rafId) cancelAnimationFrame(rafId);
      isRunning = false;
      document.getElementById('start-btn').disabled = false;
    }

    function resetTest() {
      stopTest();
      frameTimestamps = [];
      startTime = null;
      document.getElementById('detected-hz').textContent = '-- Hz';
      document.getElementById('live-fps').textContent = '-- fps';
      document.getElementById('jitter-ms').textContent = '-- ms';
      document.getElementById('frame-count').textContent = '0';
      document.getElementById('progress-bar').style.width = '0%';
      document.getElementById('hz-result-box').style.display = 'none';
      document.getElementById('status-msg').textContent = STATUS_INIT;
    }

    window.startTest = startTest;
    window.resetTest = resetTest;
  }());
  </script>

</body>
</html>
