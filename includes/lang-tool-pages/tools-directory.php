<?php
/**
 * Shared renderer: Localized Tools Directory Page
 * Usage: set $lang before including this file.
 */

if (!isset($lang)) $lang = 'en';

require_once __DIR__ . '/../../config.php';
require_once __DIR__ . '/../components/tool-list-renderer.php';
require_once __DIR__ . '/../components/site-chrome.php';

$langData = [
    'en' => [
        'dir' => '', 'html_lang' => 'en', 'dir_attr' => 'ltr',
        'title'       => 'Free Online Hardware Testing Tools | KeyboardTester.click',
        'description' => 'Browse all free online hardware testing tools: keyboard, mouse, screen, audio, webcam, and utilities. No download required.',
        'h1'          => 'All Testing Tools',
        'subtitle'    => 'Keyboard, mouse, screen, audio, webcam and more — all free in your browser.',
    ],
    'es' => [
        'dir' => 'spanish', 'html_lang' => 'es', 'dir_attr' => 'ltr',
        'title'       => 'Herramientas de Prueba Online Gratuitas | KeyboardTester.click',
        'description' => 'Explora todas las herramientas gratuitas de pruebas de hardware en línea: teclado, ratón, pantalla, audio, webcam y utilidades. Sin descarga, en el navegador, privacidad garantizada.',
        'h1'          => 'Todas las Herramientas',
        'subtitle'    => 'Teclado, ratón, pantalla, audio, cámara y más — gratis en tu navegador.',
    ],
    'ar' => [
        'dir' => 'arabic', 'html_lang' => 'ar', 'dir_attr' => 'rtl',
        'title'       => 'أدوات اختبار الأجهزة المجانية أونلاين | KeyboardTester.click',
        'description' => 'تصفح جميع أدوات اختبار الأجهزة المجانية عبر الإنترنت: لوحة المفاتيح والماوس والشاشة والصوت والكاميرا والأدوات المساعدة. بدون تنزيل، في المتصفح، مع خصوصية كاملة.',
        'h1'          => 'جميع أدوات الاختبار',
        'subtitle'    => 'لوحة المفاتيح والماوس والشاشة والصوت والكاميرا والمزيد — مجاناً في متصفحك.',
    ],
    'fr' => [
        'dir' => 'french', 'html_lang' => 'fr', 'dir_attr' => 'ltr',
        'title'       => 'Outils de Test Matériel Gratuits en Ligne | KeyboardTester.click',
        'description' => 'Parcourez tous les outils gratuits de test matériel en ligne : clavier, souris, écran, audio, webcam et utilitaires. Sans téléchargement, dans le navigateur, respect de la vie privée.',
        'h1'          => 'Tous les Outils',
        'subtitle'    => 'Clavier, souris, écran, audio, caméra et plus — gratuits dans votre navigateur.',
    ],
    'de' => [
        'dir' => 'german', 'html_lang' => 'de', 'dir_attr' => 'ltr',
        'title'       => 'Kostenlose Online Hardware-Test-Tools | KeyboardTester.click',
        'description' => 'Entdecken Sie alle kostenlosen Online-Hardware-Test-Tools: Tastatur, Maus, Bildschirm, Audio, Webcam und Utilities. Kein Download, im Browser, mit Datenschutz.',
        'h1'          => 'Alle Test-Tools',
        'subtitle'    => 'Tastatur, Maus, Bildschirm, Audio, Kamera und mehr — kostenlos im Browser.',
    ],
    'ja' => [
        'dir' => 'japanese', 'html_lang' => 'ja', 'dir_attr' => 'ltr',
        'title'       => '無料オンラインハードウェアテストツール | KeyboardTester.click',
        'description' => 'キーボード、マウス、画面、音声、ウェブカメラなど全ての無料ハードウェアテストツール。ダウンロード不要。',
        'h1'          => '全テストツール',
        'subtitle'    => 'キーボード、マウス、画面、音声、カメラなど — ブラウザで無料。',
    ],
    'ko' => [
        'dir' => 'korean', 'html_lang' => 'ko', 'dir_attr' => 'ltr',
        'title'       => '무료 온라인 하드웨어 테스트 도구 | KeyboardTester.click',
        'description' => '키보드, 마우스, 화면, 오디오, 웹캠 등 모든 무료 하드웨어 테스트 도구. 다운로드 불필요.',
        'h1'          => '모든 테스트 도구',
        'subtitle'    => '키보드, 마우스, 화면, 오디오, 카메라 등 — 브라우저에서 무료로.',
    ],
    'pt' => [
        'dir' => 'portuguese', 'html_lang' => 'pt', 'dir_attr' => 'ltr',
        'title'       => 'Ferramentas de Teste de Hardware Gratuitas Online | KeyboardTester.click',
        'description' => 'Explore todas as ferramentas gratuitas de teste de hardware online: teclado, mouse, tela, áudio, webcam e utilitários. Sem download, no navegador, com privacidade garantida.',
        'h1'          => 'Todas as Ferramentas',
        'subtitle'    => 'Teclado, mouse, tela, áudio, câmera e mais — grátis no seu navegador.',
    ],
    'ru' => [
        'dir' => 'russian', 'html_lang' => 'ru', 'dir_attr' => 'ltr',
        'title'       => 'Бесплатные Онлайн Инструменты Тестирования Оборудования | KeyboardTester.click',
        'description' => 'Просмотрите все бесплатные онлайн-инструменты тестирования оборудования: клавиатура, мышь, экран, аудио, веб-камера и утилиты. Без скачивания, в браузере, с защитой приватности.',
        'h1'          => 'Все Инструменты',
        'subtitle'    => 'Клавиатура, мышь, экран, аудио, камера и другое — бесплатно в браузере.',
    ],
];

$d = $langData[$lang] ?? $langData['en'];
$isRtl = ($d['dir_attr'] === 'rtl');

$pageTitle       = $d['title'];
$pageDescription = $d['description'];
$pageOgImage     = 'images/keyboard/hero-keyboard-test-1400.png';

// Canonical and hreflang
$langDirs = [
    'en' => '',
    'es' => 'spanish',
    'ar' => 'arabic',
    'fr' => 'french',
    'de' => 'german',
    'ja' => 'japanese',
    'ko' => 'korean',
    'pt' => 'portuguese',
    'ru' => 'russian',
];

$allToolsRoutes = [
    'en' => 'pages/all-tools.php',
    'es' => 'pages/all-tools-es.php',
    'ar' => 'pages/all-tools-ar.php',
    'fr' => 'pages/all-tools-fr.php',
    'de' => 'pages/all-tools-de.php',
    'ja' => 'pages/all-tools-ja.php',
    'ko' => 'pages/all-tools-ko.php',
    'pt' => 'pages/all-tools-pt.php',
    'ru' => 'pages/all-tools-ru.php',
];

$canonicalUrl = absoluteUrl($allToolsRoutes[$lang] ?? $allToolsRoutes['en']);

// Build hreflang list
$hreflangs = [];
foreach ($langDirs as $code => $_dir) {
    $hreflangs[$code] = absoluteUrl($allToolsRoutes[$code] ?? $allToolsRoutes['en']);
}
$hreflangs['x-default'] = absoluteUrl($allToolsRoutes['en']);
?>
<!DOCTYPE html>
<html lang="<?php echo $d['html_lang']; ?>" dir="<?php echo $d['dir_attr']; ?>">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($pageTitle); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">
  <?php foreach ($hreflangs as $hl => $url): ?>
  <link rel="alternate" hreflang="<?php echo $hl; ?>" href="<?php echo htmlspecialchars($url); ?>">
  <?php endforeach; ?>
  <?php include __DIR__ . '/../../includes/head-common.php'; ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
  <style>
    .tdir-hero {
      padding: 3rem 1.5rem 2rem;
      text-align: <?php echo $isRtl ? 'right' : 'center'; ?>;
      background: var(--bg-color);
      border-bottom: 1px solid var(--border-color, #e2e8f0);
    }
    .tdir-hero h1 {
      font-size: clamp(1.8rem, 4vw, 2.6rem);
      font-weight: 700;
      color: var(--heading-color, #1e293b);
      margin-bottom: 0.5rem;
    }
    .tdir-hero p {
      font-size: 1.05rem;
      color: var(--text-muted, #475569);
      max-width: 560px;
      margin: 0 auto;
    }
    .tdir-content {
      max-width: 1200px;
      margin: 0 auto;
      padding: 2rem 1.5rem 3rem;
    }
  </style>
</head>
<body>
<?php
// Include the appropriate header
if ($lang === 'en') {
    include __DIR__ . '/../../header.php';
} else {
    $headerFile = __DIR__ . '/../../languages/' . $d['dir'] . '/header-' . $lang . '.php';
    if (file_exists($headerFile)) {
        include $headerFile;
    } else {
        include __DIR__ . '/../../header.php';
    }
}
?>
<main id="main-content">
  <div class="tdir-hero">
    <h1><?php echo htmlspecialchars($d['h1']); ?></h1>
    <p><?php echo htmlspecialchars($d['subtitle']); ?></p>
  </div>
  <div class="tdir-content">
    <?php renderToolsList($lang); ?>
  </div>
</main>
<?php
if ($lang === 'en') {
    include __DIR__ . '/../../footer.php';
} else {
    $footerFile = __DIR__ . '/../../languages/' . $d['dir'] . '/footer-' . $lang . '.php';
    if (file_exists($footerFile)) {
        include $footerFile;
    } else {
        include __DIR__ . '/../../footer.php';
    }
}
?>
</body>
</html>
