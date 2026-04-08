<?php
/**
 * Shared renderer: Touch Screen Test — multilingual
 * Included by per-language wrapper pages that set $lang before inclusion.
 * config.php (and therefore absoluteUrl() / url()) is already loaded.
 */

$langData = [
  'es' => [
    'html_lang'          => 'es',
    'dir'                => 'spanish',
    'hreflang'           => 'es',
    'title'              => 'Prueba de Pantalla Táctil Online Gratis | KeyboardTester.click',
    'description'        => 'Prueba gratuita de pantalla táctil. Detecta zonas muertas, toques fantasma y soporte multitáctil en móvil, tablet o laptop. Sin app necesaria.',
    'h1'                 => 'Prueba de Pantalla Táctil',
    'subtitle'           => 'Dibuja con los dedos para detectar zonas muertas. Funciona en móvil, tablet y laptop táctil.',
    'active_label'       => 'Dedos Activos',
    'max_label'          => 'Máx Simultáneos',
    'total_label'        => 'Total Toques',
    'clear_btn'          => 'Limpiar',
    'ghost_btn'          => 'Test de Toque Fantasma (10s)',
    'reset_btn'          => 'Reiniciar Todo',
    'ghost_panel_title'  => 'Test de Toque Fantasma',
    'ghost_status_init'  => 'NO toques la pantalla...',
    'ghost_detected'     => '⚠️ ¡Toques fantasma detectados!',
    'ghost_clean'        => '✅ Sin toques fantasma.',
    'countdown_prefix'   => 'Cuenta atrás:',
    'privacy'            => 'Test ejecutado en tu navegador. No se recopilan datos.',
    'tip_note'           => 'Para mejores resultados, abre esta página en tu móvil o tablet.',
    'trust'              => ['Detecta zonas muertas','Test de toque fantasma','Soporte multi-táctil','Sin app necesaria'],
    'trust_desc'         => ['Desliza por toda la pantalla','Detecta entradas sin contacto','Prueba varios dedos a la vez','Funciona en el navegador'],
    'h2_how'             => 'Cómo Probar tu Pantalla Táctil',
    'p_how'              => 'Desliza el dedo por toda la superficie de la pantalla. Cualquier área donde no aparezca rastro es una zona muerta. Cubre las cuatro esquinas y bordes.',
    'h2_ghost'           => '¿Qué Son los Toques Fantasma?',
    'p_ghost'            => 'Los toques fantasma son entradas que la pantalla registra sin que la toques. Causas comunes: digitalizador dañado, daño por agua o protector de pantalla defectuoso.',
  ],
  'fr' => [
    'html_lang'          => 'fr',
    'dir'                => 'french',
    'hreflang'           => 'fr',
    'title'              => 'Test d\'Écran Tactile Gratuit en Ligne | KeyboardTester.click',
    'description'        => 'Test gratuit d\'écran tactile. Détectez les zones mortes, les touches fantômes et le support multi-touch. Sans application.',
    'h1'                 => 'Test d\'Écran Tactile',
    'subtitle'           => 'Dessinez avec vos doigts pour détecter les zones mortes',
    'active_label'       => 'Doigts Actifs',
    'max_label'          => 'Max Simultanés',
    'total_label'        => 'Total Touches',
    'clear_btn'          => 'Effacer',
    'ghost_btn'          => 'Test Toucher Fantôme (10s)',
    'reset_btn'          => 'Tout Réinitialiser',
    'ghost_panel_title'  => 'Test Toucher Fantôme',
    'ghost_status_init'  => 'NE PAS toucher l\'écran...',
    'ghost_detected'     => '⚠️ Touches fantômes détectées !',
    'ghost_clean'        => '✅ Aucune touche fantôme.',
    'countdown_prefix'   => 'Compte à rebours:',
    'privacy'            => 'Test dans votre navigateur. Aucune donnée collectée.',
    'tip_note'           => 'Pour de meilleurs résultats, ouvrez sur téléphone ou tablette.',
    'trust'              => ['Détecte zones mortes','Test toucher fantôme','Multi-touch','Sans app'],
    'trust_desc'         => ['Glissez sur tout l\'écran','Détecte entrées sans contact','Testez plusieurs doigts','Dans le navigateur'],
    'h2_how'             => 'Comment Tester Votre Écran Tactile',
    'p_how'              => 'Faites glisser votre doigt sur toute la surface de l\'écran. Toute zone sans trace est une zone morte. Couvrez les quatre coins et les bords.',
    'h2_ghost'           => 'Que Sont les Touchers Fantômes ?',
    'p_ghost'            => 'Les touchers fantômes sont des entrées enregistrées sans contact. Causes: numériseur endommagé, dégâts des eaux ou protecteur défectueux.',
  ],
  'de' => [
    'html_lang'          => 'de',
    'dir'                => 'german',
    'hreflang'           => 'de',
    'title'              => 'Touchscreen-Test Kostenlos Online | KeyboardTester.click',
    'description'        => 'Kostenloser Touchscreen-Test. Erkennen Sie tote Zonen, Geisterberührungen und Multi-Touch-Unterstützung. Keine App nötig.',
    'h1'                 => 'Touchscreen-Test',
    'subtitle'           => 'Zeichnen Sie mit den Fingern, um tote Zonen zu erkennen',
    'active_label'       => 'Aktive Finger',
    'max_label'          => 'Max Gleichzeitig',
    'total_label'        => 'Berührungen Gesamt',
    'clear_btn'          => 'Löschen',
    'ghost_btn'          => 'Geisterberührungs-Test (10s)',
    'reset_btn'          => 'Alles Zurücksetzen',
    'ghost_panel_title'  => 'Geisterberührungs-Test',
    'ghost_status_init'  => 'Bildschirm NICHT berühren...',
    'ghost_detected'     => '⚠️ Geisterberührungen erkannt!',
    'ghost_clean'        => '✅ Keine Geisterberührungen.',
    'countdown_prefix'   => 'Countdown:',
    'privacy'            => 'Test im Browser. Keine Daten erfasst.',
    'tip_note'           => 'Für beste Ergebnisse auf Handy oder Tablet öffnen.',
    'trust'              => ['Erkennt tote Zonen','Geisterberührungs-Test','Multi-Touch','Keine App nötig'],
    'trust_desc'         => ['Über den gesamten Bildschirm wischen','Eingaben ohne Kontakt erkennen','Mehrere Finger testen','Im Browser'],
    'h2_how'             => 'Wie Testen Sie Ihren Touchscreen',
    'p_how'              => 'Wischen Sie mit dem Finger über die gesamte Bildschirmoberfläche. Bereiche ohne Spur sind tote Zonen. Decken Sie alle vier Ecken und Kanten ab.',
    'h2_ghost'           => 'Was Sind Geisterberührungen?',
    'p_ghost'            => 'Geisterberührungen sind Eingaben, die der Bildschirm ohne Berührung registriert. Ursachen: beschädigter Digitizer, Wasserschaden oder defektes Display.',
  ],
  'ja' => [
    'html_lang'          => 'ja',
    'dir'                => 'japanese',
    'hreflang'           => 'ja',
    'title'              => 'タッチスクリーンテスト 無料オンライン | KeyboardTester.click',
    'description'        => '無料タッチスクリーンテスト。デッドゾーン・ゴーストタッチ・マルチタッチ対応を検出。アプリ不要。',
    'h1'                 => 'タッチスクリーンテスト',
    'subtitle'           => '指で描いてデッドゾーンを検出',
    'active_label'       => 'アクティブな指',
    'max_label'          => '最大同時タッチ',
    'total_label'        => '総タッチ数',
    'clear_btn'          => 'クリア',
    'ghost_btn'          => 'ゴーストタッチテスト（10秒）',
    'reset_btn'          => '全リセット',
    'ghost_panel_title'  => 'ゴーストタッチテスト',
    'ghost_status_init'  => '画面に触れないでください...',
    'ghost_detected'     => '⚠️ ゴーストタッチを検出！',
    'ghost_clean'        => '✅ ゴーストタッチなし。',
    'countdown_prefix'   => 'カウントダウン:',
    'privacy'            => 'ブラウザ内で動作。データ収集なし。',
    'tip_note'           => '最良の結果のため、スマホやタブレットで開いてください。',
    'trust'              => ['デッドゾーン検出','ゴーストタッチテスト','マルチタッチ対応','アプリ不要'],
    'trust_desc'         => ['画面全体をスライド','接触なしの入力を検出','複数指同時テスト','ブラウザで動作'],
    'h2_how'             => 'タッチスクリーンのテスト方法',
    'p_how'              => '指で画面全体をスライドさせてください。軌跡が残らないエリアがデッドゾーンです。四隅とエッジを必ずカバーしてください。',
    'h2_ghost'           => 'ゴーストタッチとは？',
    'p_ghost'            => 'ゴーストタッチは触れていないのに画面が入力を検知する現象です。原因：損傷したデジタイザ、水濡れ、不良保護フィルムなど。',
  ],
  'ko' => [
    'html_lang'          => 'ko',
    'dir'                => 'korean',
    'hreflang'           => 'ko',
    'title'              => '터치 스크린 테스트 무료 온라인 | KeyboardTester.click',
    'description'        => '무료 터치 스크린 테스트. 데드 존, 고스트 터치, 멀티 터치 지원 감지. 앱 불필요.',
    'h1'                 => '터치 스크린 테스트',
    'subtitle'           => '손가락으로 그려서 데드 존 감지',
    'active_label'       => '활성 손가락',
    'max_label'          => '최대 동시 터치',
    'total_label'        => '총 터치 수',
    'clear_btn'          => '지우기',
    'ghost_btn'          => '고스트 터치 테스트 (10초)',
    'reset_btn'          => '전체 초기화',
    'ghost_panel_title'  => '고스트 터치 테스트',
    'ghost_status_init'  => '화면을 터치하지 마세요...',
    'ghost_detected'     => '⚠️ 고스트 터치 감지됨!',
    'ghost_clean'        => '✅ 고스트 터치 없음.',
    'countdown_prefix'   => '카운트다운:',
    'privacy'            => '브라우저에서 실행됩니다. 데이터 수집 없음.',
    'tip_note'           => '최상의 결과를 위해 폰이나 태블릿에서 열어주세요.',
    'trust'              => ['데드 존 감지','고스트 터치 테스트','멀티 터치 지원','앱 불필요'],
    'trust_desc'         => ['화면 전체 슬라이드','비접촉 입력 감지','여러 손가락 동시 테스트','브라우저 기반'],
    'h2_how'             => '터치 스크린 테스트 방법',
    'p_how'              => '화면 전체에 손가락을 슬라이드하세요. 흔적이 남지 않는 영역이 데드 존입니다. 네 모서리와 가장자리를 반드시 커버하세요.',
    'h2_ghost'           => '고스트 터치란?',
    'p_ghost'            => '고스트 터치는 터치하지 않았는데 화면이 입력을 감지하는 현상입니다. 원인: 손상된 디지타이저, 물 손상, 불량 화면 보호필름.',
  ],
  'pt' => [
    'html_lang'          => 'pt',
    'dir'                => 'portuguese',
    'hreflang'           => 'pt',
    'title'              => 'Teste de Tela Touch Online Grátis | KeyboardTester.click',
    'description'        => 'Teste gratuito de tela sensível ao toque. Detecta zonas mortas, toques fantasma e multi-toque em celular, tablet ou laptop. Sem app.',
    'h1'                 => 'Teste de Tela Sensível ao Toque',
    'subtitle'           => 'Desenhe com os dedos para detectar zonas mortas',
    'active_label'       => 'Dedos Ativos',
    'max_label'          => 'Máx Simultâneos',
    'total_label'        => 'Total de Toques',
    'clear_btn'          => 'Limpar',
    'ghost_btn'          => 'Teste de Toque Fantasma (10s)',
    'reset_btn'          => 'Reiniciar Tudo',
    'ghost_panel_title'  => 'Teste de Toque Fantasma',
    'ghost_status_init'  => 'NÃO toque a tela...',
    'ghost_detected'     => '⚠️ Toques fantasma detectados!',
    'ghost_clean'        => '✅ Sem toques fantasma.',
    'countdown_prefix'   => 'Contagem regressiva:',
    'privacy'            => 'Teste no navegador. Nenhum dado coletado.',
    'tip_note'           => 'Para melhores resultados, abra no celular ou tablet.',
    'trust'              => ['Detecta zonas mortas','Teste de toque fantasma','Suporte multi-toque','Sem app'],
    'trust_desc'         => ['Deslize por toda a tela','Detecta entradas sem contato','Teste vários dedos','No navegador'],
    'h2_how'             => 'Como Testar sua Tela Touch',
    'p_how'              => 'Deslize o dedo por toda a superfície da tela. Qualquer área sem rastro é uma zona morta. Cubra os quatro cantos e as bordas.',
    'h2_ghost'           => 'O Que São Toques Fantasma?',
    'p_ghost'            => 'Toques fantasma são entradas registradas sem contato. Causas: digitalizador danificado, dano por água ou protetor defeituoso.',
  ],
  'ru' => [
    'html_lang'          => 'ru',
    'dir'                => 'russian',
    'hreflang'           => 'ru',
    'title'              => 'Тест Сенсорного Экрана Бесплатно Онлайн | KeyboardTester.click',
    'description'        => 'Бесплатный тест сенсорного экрана. Обнаруживает мёртвые зоны, призрачные касания и поддержку мультитач. Без установки.',
    'h1'                 => 'Тест Сенсорного Экрана',
    'subtitle'           => 'Рисуйте пальцами чтобы обнаружить мёртвые зоны',
    'active_label'       => 'Активных пальцев',
    'max_label'          => 'Макс одновременно',
    'total_label'        => 'Всего касаний',
    'clear_btn'          => 'Очистить',
    'ghost_btn'          => 'Тест призрачных касаний (10с)',
    'reset_btn'          => 'Сброс всего',
    'ghost_panel_title'  => 'Тест призрачных касаний',
    'ghost_status_init'  => 'НЕ касайтесь экрана...',
    'ghost_detected'     => '⚠️ Обнаружены призрачные касания!',
    'ghost_clean'        => '✅ Призрачных касаний нет.',
    'countdown_prefix'   => 'Обратный отсчёт:',
    'privacy'            => 'Тест в браузере. Данные не собираются.',
    'tip_note'           => 'Для лучших результатов откройте на телефоне или планшете.',
    'trust'              => ['Обнаруживает мёртвые зоны','Тест призрачных касаний','Мульти-тач','Без приложения'],
    'trust_desc'         => ['Проведите по всему экрану','Обнаруживает касания без контакта','Тест нескольких пальцев','В браузере'],
    'h2_how'             => 'Как Проверить Сенсорный Экран',
    'p_how'              => 'Проведите пальцем по всей поверхности экрана. Области без следа — мёртвые зоны. Обязательно проверьте все четыре угла и края.',
    'h2_ghost'           => 'Что Такое Призрачные Касания?',
    'p_ghost'            => 'Призрачные касания — это входные данные, которые экран регистрирует без прикосновения. Причины: повреждённый дигитайзер, попадание воды или бракованная защитная плёнка.',
  ],
  'ar' => [
    'html_lang'          => 'ar',
    'dir'                => 'arabic',
    'hreflang'           => 'ar',
    'title'              => 'اختبار الشاشة اللمسية مجاني أونلاين | KeyboardTester.click',
    'description'        => 'اختبار مجاني للشاشة اللمسية. يكشف المناطق الميتة واللمسات الشبحية ودعم اللمس المتعدد. بدون تطبيق.',
    'h1'                 => 'اختبار الشاشة اللمسية',
    'subtitle'           => 'ارسم بأصابعك للكشف عن المناطق الميتة',
    'active_label'       => 'الأصابع النشطة',
    'max_label'          => 'الحد الأقصى المتزامن',
    'total_label'        => 'إجمالي اللمسات',
    'clear_btn'          => 'مسح',
    'ghost_btn'          => 'اختبار اللمس الشبحي (10ث)',
    'reset_btn'          => 'إعادة تعيين الكل',
    'ghost_panel_title'  => 'اختبار اللمس الشبحي',
    'ghost_status_init'  => 'لا تلمس الشاشة...',
    'ghost_detected'     => '⚠️ تم اكتشاف لمسات شبحية!',
    'ghost_clean'        => '✅ لا توجد لمسات شبحية.',
    'countdown_prefix'   => 'العد التنازلي:',
    'privacy'            => 'يعمل الاختبار في متصفحك. لا يتم جمع البيانات.',
    'tip_note'           => 'للحصول على أفضل النتائج، افتح الصفحة على هاتفك أو جهازك اللوحي.',
    'trust'              => ['تكتشف المناطق الميتة','اختبار اللمس الشبحي','دعم اللمس المتعدد','بدون تطبيق'],
    'trust_desc'         => ['مرر على الشاشة كاملة','تكتشف المدخلات بدون لمس','اختبر عدة أصابع معاً','في المتصفح'],
    'h2_how'             => 'كيفية اختبار شاشتك اللمسية',
    'p_how'              => 'مرر إصبعك على كامل سطح الشاشة. أي منطقة لا تظهر فيها آثار هي منطقة ميتة. غطِّ الزوايا الأربع والحواف.',
    'h2_ghost'           => 'ما هي اللمسات الشبحية؟',
    'p_ghost'            => 'اللمسات الشبحية هي مدخلات تسجلها الشاشة دون أن تلمسها. الأسباب الشائعة: رقمنة تالفة، ضرر مائي، أو حامي شاشة معيب.',
  ],
];

$d    = $langData[$lang] ?? $langData['es'];
$isRtl = ($lang === 'ar');

$hreflangMap = [
  'en' => absoluteUrl('touch-screen-test.php'),
  'es' => absoluteUrl('languages/spanish/touch-screen-test.php'),
  'fr' => absoluteUrl('languages/french/touch-screen-test.php'),
  'de' => absoluteUrl('languages/german/touch-screen-test.php'),
  'ja' => absoluteUrl('languages/japanese/touch-screen-test.php'),
  'ko' => absoluteUrl('languages/korean/touch-screen-test.php'),
  'pt' => absoluteUrl('languages/portuguese/touch-screen-test.php'),
  'ru' => absoluteUrl('languages/russian/touch-screen-test.php'),
  'ar' => absoluteUrl('languages/arabic/touch-screen-test.php'),
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
    /* Touch Screen Test — scoped styles */
    .touch-tool {
      max-width: 720px;
      margin: 0 auto;
      padding: 2rem 1.5rem 2.5rem;
      text-align: center;
    }
    .touch-tool h1 {
      font-size: clamp(1.75rem, 4vw, 2.5rem);
      font-weight: 700;
      margin-bottom: 0.4rem;
      color: var(--heading-color, #f1f5f9);
    }
    .touch-tool .tool-subtitle {
      font-size: 1rem;
      color: var(--text-muted, #94a3b8);
      margin-bottom: 1.75rem;
    }
    .touch-stats {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-bottom: 1.25rem;
      flex-wrap: wrap;
    }
    .touch-stat {
      background: var(--card-bg, rgba(30,41,59,0.8));
      border: 1px solid var(--border-color, #334155);
      border-radius: 8px;
      padding: 0.6rem 1.25rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-width: 110px;
    }
    .touch-stat .stat-val {
      font-size: 1.75rem;
      font-weight: 700;
      font-family: 'JetBrains Mono', monospace;
      color: var(--primary-color, #6366f1);
      line-height: 1;
    }
    .touch-stat .stat-lbl {
      font-size: 0.72rem;
      color: var(--text-muted, #94a3b8);
      text-transform: uppercase;
      letter-spacing: 0.05em;
      margin-top: 0.25rem;
    }
    #touch-canvas {
      display: block;
      width: 100%;
      height: 300px;
      border: 2px dashed var(--border-color, #334155);
      border-radius: 12px;
      touch-action: none;
      cursor: crosshair;
      margin-bottom: 1.25rem;
      background: var(--card-bg, rgba(30,41,59,0.5));
    }
    #touch-canvas.has-input {
      border-style: solid;
      border-color: var(--primary-color, #6366f1);
    }
    .touch-controls {
      display: flex;
      justify-content: center;
      gap: 0.75rem;
      flex-wrap: wrap;
      margin-bottom: 1.25rem;
    }
    .touch-controls button {
      padding: 0.55rem 1.35rem;
      border: 2px solid var(--border-color, #334155);
      border-radius: 8px;
      background: transparent;
      color: var(--text-muted, #94a3b8);
      font-family: inherit;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      transition: border-color 0.15s, color 0.15s, background 0.15s;
    }
    .touch-controls button:hover {
      border-color: var(--primary-color, #6366f1);
      color: var(--primary-color, #6366f1);
    }
    #ghost-test-btn.ghost-running {
      border-color: #f87171;
      color: #f87171;
      pointer-events: none;
    }
    #ghost-panel {
      background: var(--card-bg, rgba(30,41,59,0.8));
      border: 1px solid var(--border-color, #334155);
      border-radius: 10px;
      padding: 1rem 1.5rem;
      margin-bottom: 1.25rem;
      font-size: 0.95rem;
      color: var(--text-muted, #94a3b8);
    }
    #ghost-status {
      font-size: 1.05rem;
      font-weight: 600;
      color: var(--heading-color, #f1f5f9);
      margin-bottom: 0.35rem;
    }
    #ghost-status.ghost-ok   { color: #22c55e; }
    #ghost-status.ghost-warn { color: #f87171; }
    #ghost-countdown {
      font-family: 'JetBrains Mono', monospace;
      font-weight: 700;
      color: var(--primary-color, #6366f1);
    }
    .privacy-note, .tip-note {
      font-size: 0.83rem;
      color: var(--text-muted, #94a3b8);
      margin-top: 0.5rem;
    }
    .tip-note { font-weight: 500; }
    .feature-band .section-body,
    .process-band .section-body {
      max-width: 720px;
      margin: 0 auto;
      color: var(--text-muted, #94a3b8);
      line-height: 1.7;
    }
    @media (max-width: 480px) {
      .touch-tool { padding: 1.25rem 1rem 2rem; }
      .touch-stats { gap: 0.6rem; }
      .touch-stat { min-width: 90px; padding: 0.5rem 0.85rem; }
      #touch-canvas { height: 260px; }
    }
  </style>
</head>
<body class="landing-page">
  <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/header-' . $lang . '.php'; ?>

  <main id="main-content" class="landing-main">

    <section class="tool-stage" id="touch-screen-test-tool" aria-labelledby="touch-tool-title">
      <div class="container tool-stage-header">
        <div>
          <p class="section-kicker">Screen diagnostics</p>
          <h1 id="touch-tool-title"><?php echo htmlspecialchars($d['h1']); ?></h1>
          <p class="section-lede"><?php echo htmlspecialchars($d['subtitle']); ?></p>
        </div>
      </div>

      <section id="touch-tester" class="tool-shell" aria-label="Touch screen test tool">
        <div class="touch-tool">

          <!-- Stat bar -->
          <div class="touch-stats" role="status" aria-live="polite">
            <div class="touch-stat">
              <span class="stat-val" id="active-touches">0</span>
              <span class="stat-lbl"><?php echo htmlspecialchars($d['active_label']); ?></span>
            </div>
            <div class="touch-stat">
              <span class="stat-val" id="max-simultaneous">0</span>
              <span class="stat-lbl"><?php echo htmlspecialchars($d['max_label']); ?></span>
            </div>
            <div class="touch-stat">
              <span class="stat-val" id="total-touches">0</span>
              <span class="stat-lbl"><?php echo htmlspecialchars($d['total_label']); ?></span>
            </div>
          </div>

          <!-- Canvas -->
          <canvas id="touch-canvas" aria-label="Touch drawing area"></canvas>

          <!-- Buttons -->
          <div class="touch-controls" role="group">
            <button id="clear-btn"><?php echo htmlspecialchars($d['clear_btn']); ?></button>
            <button id="ghost-test-btn"><?php echo htmlspecialchars($d['ghost_btn']); ?></button>
            <button id="reset-btn"><?php echo htmlspecialchars($d['reset_btn']); ?></button>
          </div>

          <!-- Ghost touch status -->
          <div id="ghost-panel" style="display:none;" role="status" aria-live="assertive">
            <div id="ghost-status"><?php echo htmlspecialchars($d['ghost_status_init']); ?></div>
            <div><?php echo htmlspecialchars($d['countdown_prefix']); ?> <span id="ghost-countdown">10</span>s</div>
          </div>

          <p class="privacy-note"><?php echo htmlspecialchars($d['privacy']); ?></p>
          <p class="tip-note"><?php echo htmlspecialchars($d['tip_note']); ?></p>
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
    <section class="feature-band" aria-labelledby="ts-how-title-<?php echo $lang; ?>">
      <div class="container">
        <div class="section-head">
          <h2 id="ts-how-title-<?php echo $lang; ?>"><?php echo htmlspecialchars($d['h2_how']); ?></h2>
        </div>
        <div class="section-body">
          <p><?php echo htmlspecialchars($d['p_how']); ?></p>
        </div>
      </div>
    </section>

    <!-- SEO section 2 -->
    <section class="process-band" aria-labelledby="ts-ghost-title-<?php echo $lang; ?>">
      <div class="container">
        <div class="section-head">
          <h2 id="ts-ghost-title-<?php echo $lang; ?>"><?php echo htmlspecialchars($d['h2_ghost']); ?></h2>
        </div>
        <div class="section-body">
          <p><?php echo htmlspecialchars($d['p_ghost']); ?></p>
        </div>
      </div>
    </section>

  </main>

  <?php include __DIR__ . '/../../languages/' . $d['dir'] . '/footer-' . $lang . '.php'; ?>

  <script>
  (function () {
    'use strict';

    var GHOST_STATUS_INIT = <?php echo json_encode($d['ghost_status_init']); ?>;
    var GHOST_DETECTED    = <?php echo json_encode($d['ghost_detected']); ?>;
    var GHOST_CLEAN       = <?php echo json_encode($d['ghost_clean']); ?>;

    var canvas = document.getElementById('touch-canvas');
    var ctx    = canvas.getContext('2d');

    var activePointers    = new Map();
    var maxSimultaneous   = 0;
    var totalTouches      = 0;
    var ghostCheckActive  = false;
    var ghostTouchDetected = false;
    var ghostTimer        = null;

    var COLORS = [
      '#E74C3C', '#3498DB', '#2ECC71', '#F39C12', '#9B59B6',
      '#1ABC9C', '#E67E22', '#34495E', '#E91E63', '#00BCD4'
    ];

    function resizeCanvas() {
      var rect = canvas.getBoundingClientRect();
      canvas.width  = rect.width;
      canvas.height = rect.height;
    }
    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    canvas.addEventListener('pointerdown', function (e) {
      e.preventDefault();
      canvas.setPointerCapture(e.pointerId);
      if (ghostCheckActive) ghostTouchDetected = true;
      var color = COLORS[activePointers.size % COLORS.length];
      activePointers.set(e.pointerId, { x: e.offsetX, y: e.offsetY, color: color });
      totalTouches++;
      var count = activePointers.size;
      if (count > maxSimultaneous) maxSimultaneous = count;
      updateStats();
      canvas.classList.add('has-input');
      ctx.beginPath();
      ctx.arc(e.offsetX, e.offsetY, 16, 0, Math.PI * 2);
      ctx.fillStyle = color;
      ctx.fill();
      ctx.fillStyle = 'white';
      ctx.font = 'bold 12px sans-serif';
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillText(String(count), e.offsetX, e.offsetY);
    });

    canvas.addEventListener('pointermove', function (e) {
      e.preventDefault();
      var ptr = activePointers.get(e.pointerId);
      if (!ptr) return;
      ctx.beginPath();
      ctx.moveTo(ptr.x, ptr.y);
      ctx.lineTo(e.offsetX, e.offsetY);
      ctx.strokeStyle = ptr.color;
      ctx.lineWidth   = 6;
      ctx.lineCap     = 'round';
      ctx.stroke();
      ptr.x = e.offsetX;
      ptr.y = e.offsetY;
    });

    canvas.addEventListener('pointerup', function (e) {
      activePointers.delete(e.pointerId);
      updateStats();
    });

    canvas.addEventListener('pointercancel', function (e) {
      activePointers.delete(e.pointerId);
      updateStats();
    });

    function updateStats() {
      document.getElementById('active-touches').textContent   = activePointers.size;
      document.getElementById('max-simultaneous').textContent = maxSimultaneous;
      document.getElementById('total-touches').textContent    = totalTouches;
    }

    function clearCanvas() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      activePointers.clear();
      canvas.classList.remove('has-input');
      updateStats();
    }

    function startGhostTest() {
      ghostCheckActive   = true;
      ghostTouchDetected = false;
      var panel       = document.getElementById('ghost-panel');
      var statusEl    = document.getElementById('ghost-status');
      var countdownEl = document.getElementById('ghost-countdown');
      var ghostBtn    = document.getElementById('ghost-test-btn');
      panel.style.display = 'block';
      statusEl.textContent = GHOST_STATUS_INIT;
      statusEl.className   = '';
      ghostBtn.disabled    = true;
      ghostBtn.classList.add('ghost-running');
      var countdown = 10;
      countdownEl.textContent = countdown;
      ghostTimer = setInterval(function () {
        countdown--;
        countdownEl.textContent = countdown;
        if (countdown <= 0) {
          clearInterval(ghostTimer);
          ghostTimer        = null;
          ghostCheckActive  = false;
          ghostBtn.disabled = false;
          ghostBtn.classList.remove('ghost-running');
          if (ghostTouchDetected) {
            statusEl.textContent = GHOST_DETECTED;
            statusEl.className   = 'ghost-warn';
          } else {
            statusEl.textContent = GHOST_CLEAN;
            statusEl.className   = 'ghost-ok';
          }
        }
      }, 1000);
    }

    function resetAll() {
      if (ghostTimer) { clearInterval(ghostTimer); ghostTimer = null; }
      clearCanvas();
      maxSimultaneous    = 0;
      totalTouches       = 0;
      ghostCheckActive   = false;
      ghostTouchDetected = false;
      updateStats();
      document.getElementById('ghost-panel').style.display = 'none';
      var ghostBtn = document.getElementById('ghost-test-btn');
      ghostBtn.disabled = false;
      ghostBtn.classList.remove('ghost-running');
    }

    document.getElementById('clear-btn').addEventListener('click', clearCanvas);
    document.getElementById('ghost-test-btn').addEventListener('click', startGhostTest);
    document.getElementById('reset-btn').addEventListener('click', resetAll);

  }());
  </script>

</body>
</html>
