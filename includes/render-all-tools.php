<?php
/**
 * Shared renderer for the 9 locale-specific /pages/all-tools(-xx).php files.
 *
 * Callers set $lang (one of en,es,fr,de,ja,ko,pt,ar,ru) before include.
 * Each locale has its own real URL; hreflang cluster is emitted here.
 */

include_once __DIR__ . '/../config.php';
include_once __DIR__ . '/components/tool-list-data.php';
include_once __DIR__ . '/components/site-chrome.php';

$VALID_LOCALES = ['en','es','fr','de','ja','ko','pt','ar','ru'];
if (!isset($lang) || !in_array($lang, $VALID_LOCALES, true)) { $lang = 'en'; }
$siteChromeLocale = $lang;

$LOC = [
    'en' => ['kicker' => 'All Tools', 'title' => 'Every hardware test in one place', 'sub' => 'Browse %d free online testing tools organised by category — keyboard, mouse, display, camera, audio, utility and gaming diagnostics.', 'ntools' => '%d tools across %d categories', 'cat_count' => '%d tool', 'cat_count_p' => '%d tools', 'cta' => 'Open tool', 'meta_t' => 'All Tools — Every Hardware Test in One Place | KeyboardTester.click', 'meta_d' => 'Every free online testing tool on KeyboardTester.click — 70+ diagnostics for keyboard, mouse, display, camera, audio, and utilities, organised by category.'],
    'es' => ['kicker' => 'Todas las Herramientas', 'title' => 'Todas las pruebas de hardware en un solo lugar', 'sub' => 'Explora %d herramientas gratuitas de pruebas en línea organizadas por categoría.', 'ntools' => '%d herramientas en %d categorías', 'cat_count' => '%d herramienta', 'cat_count_p' => '%d herramientas', 'cta' => 'Abrir', 'meta_t' => 'Todas las herramientas | KeyboardTester.click', 'meta_d' => 'Todas las herramientas gratuitas de prueba de hardware en KeyboardTester.click — más de 70 diagnósticos de teclado, ratón, pantalla, cámara y audio por categoría.'],
    'fr' => ['kicker' => 'Tous les outils', 'title' => 'Tous les tests matériels au même endroit', 'sub' => 'Parcourez %d outils de test en ligne gratuits organisés par catégorie.', 'ntools' => '%d outils en %d catégories', 'cat_count' => '%d outil', 'cat_count_p' => '%d outils', 'cta' => 'Ouvrir', 'meta_t' => 'Tous les outils | KeyboardTester.click', 'meta_d' => 'Tous les outils gratuits de test matériel de KeyboardTester.click — plus de 70 diagnostics clavier, souris, écran, caméra, audio et utilitaires organisés par catégorie.'],
    'de' => ['kicker' => 'Alle Werkzeuge', 'title' => 'Jeder Hardwaretest an einem Ort', 'sub' => 'Durchsuche %d kostenlose Online-Testwerkzeuge nach Kategorie.', 'ntools' => '%d Werkzeuge in %d Kategorien', 'cat_count' => '%d Werkzeug', 'cat_count_p' => '%d Werkzeuge', 'cta' => 'Öffnen', 'meta_t' => 'Alle Werkzeuge | KeyboardTester.click', 'meta_d' => 'Alle kostenlosen Hardware-Testwerkzeuge von KeyboardTester.click — über 70 Diagnosen für Tastatur, Maus, Bildschirm, Kamera, Audio und Utility, nach Kategorie sortiert.'],
    'ja' => ['kicker' => 'すべてのツール', 'title' => 'すべてのハードウェアテストを1か所で', 'sub' => 'カテゴリー別に整理された%d個の無料オンラインテストツール。', 'ntools' => '%dツール（%dカテゴリー）', 'cat_count' => '%d ツール', 'cat_count_p' => '%d ツール', 'cta' => '開く', 'meta_t' => 'すべてのツール | KeyboardTester.click', 'meta_d' => 'カテゴリー別に整理された無料のハードウェアテストツール。'],
    'ko' => ['kicker' => '모든 도구', 'title' => '모든 하드웨어 테스트를 한곳에서', 'sub' => '카테고리별로 정리된 %d개의 무료 온라인 테스트 도구.', 'ntools' => '%d개 도구 / %d개 카테고리', 'cat_count' => '%d개 도구', 'cat_count_p' => '%d개 도구', 'cta' => '열기', 'meta_t' => '모든 도구 | KeyboardTester.click', 'meta_d' => '카테고리별로 정리된 모든 무료 하드웨어 테스트 도구.'],
    'pt' => ['kicker' => 'Todas as ferramentas', 'title' => 'Todos os testes de hardware em um só lugar', 'sub' => 'Navegue por %d ferramentas gratuitas de teste online organizadas por categoria.', 'ntools' => '%d ferramentas em %d categorias', 'cat_count' => '%d ferramenta', 'cat_count_p' => '%d ferramentas', 'cta' => 'Abrir', 'meta_t' => 'Todas as ferramentas | KeyboardTester.click', 'meta_d' => 'Todas as ferramentas gratuitas de teste de hardware em KeyboardTester.click — mais de 70 diagnósticos de teclado, mouse, tela, câmera, áudio e utilitários por categoria.'],
    'ar' => ['kicker' => 'جميع الأدوات', 'title' => 'كل اختبارات الأجهزة في مكان واحد', 'sub' => 'تصفح %d أداة اختبار مجانية منظمة حسب الفئة.', 'ntools' => '%d أداة في %d فئات', 'cat_count' => 'أداة واحدة', 'cat_count_p' => '%d أدوات', 'cta' => 'افتح', 'meta_t' => 'جميع الأدوات | KeyboardTester.click', 'meta_d' => 'جميع أدوات اختبار الأجهزة المجانية على KeyboardTester.click — أكثر من 70 أداة لاختبار لوحة المفاتيح والماوس والشاشة والكاميرا والصوت والأدوات المساعدة، منظمة حسب الفئة.'],
    'ru' => ['kicker' => 'Все инструменты', 'title' => 'Все тесты оборудования в одном месте', 'sub' => 'Просмотрите %d бесплатных онлайн-инструментов тестирования по категориям.', 'ntools' => '%d инструментов / %d категорий', 'cat_count' => '%d инструмент', 'cat_count_p' => '%d инструментов', 'cta' => 'Открыть', 'meta_t' => 'Все инструменты | KeyboardTester.click', 'meta_d' => 'Все бесплатные инструменты тестирования оборудования на KeyboardTester.click — более 70 диагностик клавиатуры, мыши, экрана, камеры и звука, сгруппированные по категориям.'],
];
$t = $LOC[$lang] ?? $LOC['en'];

// Per-locale URL paths (each is a real file on disk).
$LOCALE_PATHS = [
    'en' => 'pages/all-tools.php',
    'es' => 'pages/all-tools-es.php',
    'fr' => 'pages/all-tools-fr.php',
    'de' => 'pages/all-tools-de.php',
    'ja' => 'pages/all-tools-ja.php',
    'ko' => 'pages/all-tools-ko.php',
    'pt' => 'pages/all-tools-pt.php',
    'ar' => 'pages/all-tools-ar.php',
    'ru' => 'pages/all-tools-ru.php',
];

$pageTitle = $t['meta_t'];
$pageDescription = $t['meta_d'];
$pageCanonical = absoluteUrl($LOCALE_PATHS[$lang]);

$data = getSharedToolListData();
$labelIndex = kbtGetSiteChromeToolLabelIndex($lang);
$localeConfig = $data['locales'][$lang] ?? [];
$localeToolOverrides = $localeConfig['tools'] ?? [];
$localeCatLabels = $localeConfig['category_labels'] ?? [];

$CATEGORY_ICONS = [
    'keyboard' => '⌨', 'mouse' => '🖱', 'display' => '🖥',
    'camera' => '📷', 'audio' => '🎧', 'utility' => '🔧', 'gaming' => '🎮',
];
$CATEGORY_EN = [
    'keyboard' => 'Keyboard', 'mouse' => 'Mouse', 'display' => 'Display',
    'camera' => 'Camera', 'audio' => 'Audio', 'utility' => 'Utility', 'gaming' => 'Gaming',
];
$EXCLUDE = ['tools-page', 'arabic-keyboard'];

$buckets = [];
foreach ($data['categories'] as $catId => $catMeta) {
    $buckets[$catId] = [
        'id'     => $catId,
        'label'  => $localeCatLabels[$catId] ?? ($CATEGORY_EN[$catId] ?? ucfirst($catId)),
        'icon'   => $CATEGORY_ICONS[$catId] ?? '🛠',
        'accent' => $catMeta['accent'] ?? '#0ea5e9',
        'order'  => $catMeta['order'] ?? 99,
        'tools'  => [],
    ];
}
foreach ($data['tools'] as $tool) {
    $id = $tool['id'] ?? '';
    if (!$id || in_array($id, $EXCLUDE, true)) continue;
    $cat = $tool['category'] ?? 'utility';
    if (!isset($buckets[$cat])) continue;

    $localizedUrl = ($lang !== 'en') ? kbtBuildLangSwitchUrl($id, $tool, $lang) : null;
    $enRoute = $tool['routes']['en'] ?? '';
    $url = $localizedUrl ?: ($enRoute !== '' ? url(ltrim($enRoute, '/')) : null);
    if (!$url) continue;

    $override = $localeToolOverrides[$id] ?? [];
    $name = $override['name'] ?? ($tool['name'] ?? $id);
    $desc = $override['description'] ?? ($tool['description'] ?? '');

    $buckets[$cat]['tools'][] = [
        'id'   => $id,
        'name' => $name,
        'desc' => $desc,
        'cta'  => $t['cta'],
        'url'  => $url,
        'icon' => $tool['icon'] ?? '',
    ];
}
usort($buckets, function ($a, $b) { return $a['order'] <=> $b['order']; });
$buckets = array_values(array_filter($buckets, function ($c) { return !empty($c['tools']); }));
$totalTools = array_sum(array_map(function ($b) { return count($b['tools']); }, $buckets));

// Suppress head-common.php auto-hreflang — we emit our own cluster below.
$hreflangEmitted = true;
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($lang, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $lang === 'ar' ? ' dir="rtl"' : ''; ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <?php include __DIR__ . '/seo-meta.php'; ?>
    <?php foreach ($LOCALE_PATHS as $hlCode => $hlPath): ?>
    <link rel="alternate" hreflang="<?php echo htmlspecialchars($hlCode, ENT_QUOTES, 'UTF-8'); ?>" href="<?php echo htmlspecialchars(absoluteUrl($hlPath), ENT_QUOTES, 'UTF-8'); ?>">
    <?php endforeach; ?>
    <link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars(absoluteUrl($LOCALE_PATHS['en']), ENT_QUOTES, 'UTF-8'); ?>">
    <?php include __DIR__ . '/head-common.php'; ?>
    <style>
    .at-wrap { max-width: 1180px; margin: 0 auto; padding: 2.25rem 1.25rem 4rem; }
    .at-hero {
        position: relative;
        background: linear-gradient(135deg, rgba(14,165,233,0.08), rgba(168,85,247,0.08)), var(--surface, #ffffff);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 18px;
        padding: 38px 34px;
        margin-bottom: 30px;
        overflow: hidden;
        box-shadow: 0 1px 2px rgba(15,23,42,0.06), 0 2px 6px rgba(15,23,42,0.06);
    }
    .at-hero::before {
        content: ""; position: absolute; top: -40%; right: -10%;
        width: 420px; height: 420px;
        background: radial-gradient(closest-side, rgba(14,165,233,0.18), transparent 70%);
        pointer-events: none;
    }
    .at-kicker {
        font-size: 0.72rem; font-weight: 700; text-transform: uppercase;
        letter-spacing: 0.14em; color: var(--primary-color, #1e40af);
        margin-bottom: 10px;
    }
    .at-title { font-size: 1.9rem; font-weight: 800; margin: 0 0 10px; line-height: 1.2; color: var(--text-color); }
    .at-sub { font-size: 1rem; line-height: 1.65; color: var(--text-muted, #475569); max-width: 680px; margin: 0; }
    .at-hero-count {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 4px 12px;
        background: var(--surface, #f1f5f9);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 999px;
        font-size: 0.82rem; font-weight: 700;
        color: var(--primary-color, #1e40af);
        margin-top: 14px;
    }

    /* Category filter pills */
    .at-filter-title {
        font-size: 0.72rem; font-weight: 700;
        letter-spacing: 0.14em; text-transform: uppercase;
        color: var(--text-muted, #64748b);
        margin: 0 0 10px;
    }
    .at-filter {
        display: flex; flex-wrap: wrap; gap: 10px;
        margin-bottom: 28px;
    }
    .at-pill {
        display: inline-flex; align-items: center; gap: 9px;
        padding: 10px 14px;
        border-radius: 10px;
        background: var(--surface, #ffffff);
        border: 1px solid var(--border-color, #e2e8f0);
        color: var(--text-color);
        font: inherit; font-weight: 700; font-size: 0.9rem;
        letter-spacing: 0.02em;
        cursor: pointer;
        transition: background 0.15s, border-color 0.15s, transform 0.08s;
    }
    .at-pill:hover { border-color: #a78bfa; }
    .at-pill:active { transform: translateY(1px); }
    .at-pill.is-active {
        background: #8b5cf6;
        border-color: #8b5cf6;
        color: #ffffff;
    }
    .at-pill-icon {
        display: inline-flex; align-items: center; justify-content: center;
        width: 18px; height: 18px;
        flex-shrink: 0;
    }
    .at-pill.is-active .at-pill-icon { color: #ffffff; }
    .at-pill-label { text-transform: uppercase; letter-spacing: 0.08em; font-size: 0.76rem; }
    .at-pill-count {
        font-size: 0.72rem; font-weight: 700;
        padding: 2px 8px;
        border-radius: 999px;
        background: rgba(15,23,42,0.08);
        color: #64748b;
        min-width: 22px; text-align: center; line-height: 1;
    }
    .at-pill.is-active .at-pill-count {
        background: rgba(255,255,255,0.22); color: #ffffff;
    }

    .at-section.is-hidden { display: none; }
    .at-sections-wrap > .at-section + .at-section { margin-top: 24px; }
    .at-cat-head {
        display: flex; align-items: center; gap: 12px;
        margin-bottom: 16px;
        padding-bottom: 14px;
        border-bottom: 1px dashed var(--border-color, #e2e8f0);
    }
    .at-cat-head h2 { margin: 0; font-size: 1.35rem; font-weight: 800; color: var(--text-color); }
    .at-cat-count {
        font-size: 0.72rem; font-weight: 600;
        color: var(--text-muted, #64748b);
        padding: 3px 10px;
        background: var(--surface, #f1f5f9);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 999px;
    }

    .at-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 14px;
    }
    .at-card {
        background: var(--surface, #ffffff);
        border: 2px solid var(--border-color, #e2e8f0);
        border-radius: 14px;
        padding: 18px 20px 16px;
        text-decoration: none;
        color: var(--text-color);
        display: flex; flex-direction: column; gap: 8px;
        box-shadow: 0 1px 2px rgba(15,23,42,0.06), 0 2px 6px rgba(15,23,42,0.06);
        transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
        position: relative; overflow: hidden;
    }
    .at-card::before {
        content: ""; position: absolute; top: 0; left: 0; bottom: 0;
        width: 4px;
        background: var(--at-card-accent, #8b5cf6);
        opacity: 0.85;
    }
    .at-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px -8px rgba(15,23,42,0.18);
        border-color: var(--at-card-accent, #8b5cf6);
        text-decoration: none;
    }
    .at-card-head { display: flex; align-items: center; gap: 12px; margin-bottom: 4px; }
    .at-card-icon {
        width: 42px; height: 42px; flex-shrink: 0;
        border-radius: 11px;
        display: flex; align-items: center; justify-content: center;
        color: #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.18);
    }
    .at-card-icon svg { width: 22px; height: 22px; }
    .at-cat-head-icon {
        width: 32px; height: 32px; flex-shrink: 0;
        border-radius: 9px;
        display: inline-flex; align-items: center; justify-content: center;
        color: #fff;
        box-shadow: 0 3px 8px rgba(0,0,0,0.16);
    }
    .at-cat-head-icon svg { width: 18px; height: 18px; }
    .at-section {
        background: var(--surface-2, #fafbfc);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 16px;
        padding: 22px 22px 24px;
    }
    .at-card-title { font-weight: 700; font-size: 1.02rem; line-height: 1.3; color: var(--text-color); }
    .at-card-desc { font-size: 0.88rem; line-height: 1.55; color: var(--text-muted, #475569); flex: 1; margin: 0; }

    @media (max-width: 600px) {
        .at-hero { padding: 26px 22px; }
        .at-title { font-size: 1.45rem; }
        .at-wrap { padding: 1.5rem 1rem 3rem; }
    }
    </style>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "name": <?php echo json_encode($pageTitle); ?>,
        "description": <?php echo json_encode($pageDescription); ?>,
        "url": <?php echo json_encode($pageCanonical); ?>,
        "inLanguage": <?php echo json_encode($lang); ?>,
        "numberOfItems": <?php echo (int) $totalTools; ?>,
        "breadcrumb": {
            "@type": "BreadcrumbList",
            "itemListElement": [
                { "@type": "ListItem", "position": 1, "name": "Home", "item": <?php echo json_encode(absoluteUrl('')); ?> },
                { "@type": "ListItem", "position": 2, "name": <?php echo json_encode($t['kicker']); ?> }
            ]
        }
    }
    </script>
</head>
<body<?php echo $lang === 'ar' ? ' dir="rtl"' : ''; ?>>
<?php include __DIR__ . '/../header.php'; ?>
<main>
    <div class="at-wrap">
        <section class="at-hero">
            <div class="at-kicker"><?php echo htmlspecialchars($t['kicker'], ENT_QUOTES, 'UTF-8'); ?></div>
            <h1 class="at-title"><?php echo htmlspecialchars($t['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
            <p class="at-sub"><?php echo htmlspecialchars(sprintf($t['sub'], $totalTools), ENT_QUOTES, 'UTF-8'); ?></p>
            <span class="at-hero-count">🛠 <?php echo htmlspecialchars(sprintf($t['ntools'], $totalTools, count($buckets)), ENT_QUOTES, 'UTF-8'); ?></span>
        </section>

        <?php
        // Per-tool icon SVGs (Lucide, MIT-licensed). Keys match the 'icon' field in tool-list-data.php.
        $TOOL_SVG = [
            'keyboard' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 8h.01" /><path d="M12 12h.01" /><path d="M14 8h.01" /><path d="M16 12h.01" /><path d="M18 8h.01" /><path d="M6 8h.01" /><path d="M7 16h10" /><path d="M8 12h.01" /><rect width="20" height="16" x="2" y="4" rx="2" /></svg>',
            'mouse' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="7" /><path d="M12 6v4" /></svg>',
            'typing' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="7" cy="12" r="3" /><path d="M10 9v6" /><circle cx="17" cy="12" r="3" /><path d="M14 7v8" /><path d="M22 17v1c0 .5-.5 1-1 1H3c-.5 0-1-.5-1-1v-1" /></svg>',
            'clock' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="10" x2="14" y1="2" y2="2" /><line x1="12" x2="15" y1="14" y2="11" /><circle cx="12" cy="14" r="8" /></svg>',
            'screen' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="3" rx="2" /><line x1="8" x2="16" y1="21" y2="21" /><line x1="12" x2="12" y1="17" y2="21" /></svg>',
            'mic' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19v3" /><path d="M19 10v2a7 7 0 0 1-14 0v-2" /><rect x="9" y="2" width="6" height="13" rx="3" /></svg>',
            'camera' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13.997 4a2 2 0 0 1 1.76 1.05l.486.9A2 2 0 0 0 18.003 7H20a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h1.997a2 2 0 0 0 1.759-1.048l.489-.904A2 2 0 0 1 10.004 4z" /><circle cx="12" cy="13" r="3" /></svg>',
            'headphones' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3" /></svg>',
            'lock' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="16" r="1" /><rect x="3" y="10" width="18" height="12" rx="2" /><path d="M7 10V7a5 5 0 0 1 10 0v3" /></svg>',
            'ghost' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 10h.01" /><path d="M15 10h.01" /><path d="M12 2a8 8 0 0 0-8 8v12l3-3 2.5 2.5L12 19l2.5 2.5L17 19l3 3V10a8 8 0 0 0-8-8z" /></svg>',
            'polling' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2" /></svg>',
            'refresh' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8" /><path d="M21 3v5h-5" /><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16" /><path d="M8 16H3v5" /></svg>',
            'palette' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a1 1 0 0 1 0-20 10 9 0 0 1 10 9 5 5 0 0 1-5 5h-2.25a1.75 1.75 0 0 0-1.4 2.8l.3.4a1.75 1.75 0 0 1-1.4 2.8z" /><circle cx="13.5" cy="6.5" r=".5" fill="currentColor" /><circle cx="17.5" cy="10.5" r=".5" fill="currentColor" /><circle cx="6.5" cy="12.5" r=".5" fill="currentColor" /><circle cx="8.5" cy="7.5" r=".5" fill="currentColor" /></svg>',
            'touch' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 11V6a2 2 0 0 0-2-2a2 2 0 0 0-2 2" /><path d="M14 10V4a2 2 0 0 0-2-2a2 2 0 0 0-2 2v2" /><path d="M10 10.5V6a2 2 0 0 0-2-2a2 2 0 0 0-2 2v8" /><path d="M18 8a2 2 0 1 1 4 0v6a8 8 0 0 1-8 8h-2c-2.8 0-4.5-.86-5.99-2.34l-3.6-3.6a2 2 0 0 1 2.83-2.82L7 15" /></svg>',
            'gamepad' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="6" x2="10" y1="11" y2="11" /><line x1="8" x2="8" y1="9" y2="13" /><line x1="15" x2="15.01" y1="12" y2="12" /><line x1="18" x2="18.01" y1="10" y2="10" /><path d="M17.32 5H6.68a4 4 0 0 0-3.978 3.59c-.006.052-.01.101-.017.152C2.604 9.416 2 14.456 2 16a3 3 0 0 0 3 3c1 0 1.5-.5 2-1l1.414-1.414A2 2 0 0 1 9.828 16h4.344a2 2 0 0 1 1.414.586L17 18c.5.5 1 1 2 1a3 3 0 0 0 3-3c0-1.545-.604-6.584-.685-7.258-.007-.05-.011-.1-.017-.151A4 4 0 0 0 17.32 5z" /></svg>',
            'lightning' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z" /><path d="M20 2v4" /><path d="M22 4h-4" /><circle cx="4" cy="20" r="2" /></svg>',
            'target' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><circle cx="12" cy="12" r="6" /><circle cx="12" cy="12" r="2" /></svg>',
            'trail' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="19" cy="5" r="2" /><circle cx="5" cy="19" r="2" /><path d="M5 17A12 12 0 0 1 17 5" /></svg>',
            'spacebar' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 17v1c0 .5-.5 1-1 1H3c-.5 0-1-.5-1-1v-1" /></svg>',
            'reaction' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10 2h4" /><path d="M12 14v-4" /><path d="M4 13a8 8 0 0 1 8-7 8 8 0 1 1-5.3 14L4 17.6" /><path d="M9 17H4v5" /></svg>',
            'bleed' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5" /><path d="M9 18h6" /><path d="M10 22h4" /></svg>',
            'tag' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4" /><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8" /></svg>',
            'ocr' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7V5a2 2 0 0 1 2-2h2" /><path d="M17 3h2a2 2 0 0 1 2 2v2" /><path d="M21 17v2a2 2 0 0 1-2 2h-2" /><path d="M7 21H5a2 2 0 0 1-2-2v-2" /><path d="M7 8h8" /><path d="M7 12h10" /><path d="M7 16h6" /></svg>',
            'qr-generator' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="5" height="5" x="3" y="3" rx="1" /><rect width="5" height="5" x="16" y="3" rx="1" /><rect width="5" height="5" x="3" y="16" rx="1" /><path d="M21 16h-3a2 2 0 0 0-2 2v3" /><path d="M21 21v.01" /><path d="M12 7v3a2 2 0 0 1-2 2H7" /><path d="M3 12h.01" /><path d="M12 3h.01" /><path d="M12 16v.01" /><path d="M16 12h1" /><path d="M21 12v.01" /><path d="M12 21v-1" /></svg>',
            'qr-reader' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7V5a2 2 0 0 1 2-2h2" /><path d="M17 3h2a2 2 0 0 1 2 2v2" /><path d="M21 17v2a2 2 0 0 1-2 2h-2" /><path d="M7 21H5a2 2 0 0 1-2-2v-2" /><path d="M7 12h10" /></svg>',
            'whatsapp-link' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719" /></svg>',
            'sentiment' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11v1a10 10 0 1 1-9-10" /><path d="M8 14s1.5 2 4 2 4-2 4-2" /><line x1="9" x2="9.01" y1="9" y2="9" /><line x1="15" x2="15.01" y1="9" y2="9" /><path d="M16 5h6" /><path d="M19 2v6" /></svg>',
            'gauge' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 14 4-4" /><path d="M3.34 19a10 10 0 1 1 17.32 0" /></svg>',
            'eye' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" /><circle cx="12" cy="12" r="3" /></svg>',
            'flame' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3q1 4 4 6.5t3 5.5a1 1 0 0 1-14 0 5 5 0 0 1 1-3 1 1 0 0 0 5 0c0-2-1.5-3-1.5-5q0-2 2.5-4" /></svg>',
            'ruler' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.3 15.3a2.4 2.4 0 0 1 0 3.4l-2.6 2.6a2.4 2.4 0 0 1-3.4 0L2.7 8.7a2.41 2.41 0 0 1 0-3.4l2.6-2.6a2.41 2.41 0 0 1 3.4 0Z" /><path d="m14.5 12.5 2-2" /><path d="m11.5 9.5 2-2" /><path d="m8.5 6.5 2-2" /><path d="m17.5 15.5 2-2" /></svg>',
            'crosshair' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><line x1="22" x2="18" y1="12" y2="12" /><line x1="6" x2="2" y1="12" y2="12" /><line x1="12" x2="12" y1="6" y2="2" /><line x1="12" x2="12" y1="22" y2="18" /></svg>',
            'contrast' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><path d="M12 18a6 6 0 0 0 0-12v12z" /></svg>',
            'sun' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4" /><path d="M12 2v2" /><path d="M12 20v2" /><path d="m4.93 4.93 1.41 1.41" /><path d="m17.66 17.66 1.41 1.41" /><path d="M2 12h2" /><path d="M20 12h2" /><path d="m6.34 17.66-1.41 1.41" /><path d="m19.07 4.93-1.41 1.41" /></svg>',
            'moon' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.985 12.486a9 9 0 1 1-9.473-9.472c.405-.022.617.46.402.803a6 6 0 0 0 8.268 8.268c.344-.215.825-.004.803.401" /></svg>',
            'move' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20" /><path d="m15 19-3 3-3-3" /><path d="m19 9 3 3-3 3" /><path d="M2 12h20" /><path d="m5 9-3 3 3 3" /><path d="m9 5 3-3 3 3" /></svg>',
            'rotate' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.93 1 6.74 2.74L21 8" /><path d="M21 3v5h-5" /></svg>',
            'vibrate' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m2 8 2 2-2 2 2 2-2 2" /><path d="m22 8-2 2 2 2-2 2 2 2" /><rect width="8" height="14" x="8" y="5" rx="1" /></svg>',
            'calculator' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="20" x="4" y="2" rx="2" /><line x1="8" x2="16" y1="6" y2="6" /><line x1="16" x2="16" y1="14" y2="18" /><path d="M16 10h.01" /><path d="M12 10h.01" /><path d="M8 10h.01" /><path d="M12 14h.01" /><path d="M8 14h.01" /><path d="M12 18h.01" /><path d="M8 18h.01" /></svg>',
            'compass' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10" /><path d="m16.24 7.76-1.804 5.411a2 2 0 0 1-1.265 1.265L7.76 16.24l1.804-5.411a2 2 0 0 1 1.265-1.265z" /></svg>',
            'command' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3" /></svg>',
            'wrench' => '<svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.106-3.105c.32-.322.863-.22.983.218a6 6 0 0 1-8.259 7.057l-7.91 7.91a1 1 0 0 1-2.999-3l7.91-7.91a6 6 0 0 1 7.057-8.259c.438.12.54.662.219.984z" /></svg>',
        ];
        // Category heading icons — reuse the Lucide tool icons so every surface matches.
        $CAT_SVG = [
            'keyboard' => $TOOL_SVG['keyboard'],
            'mouse'    => $TOOL_SVG['mouse'],
            'display'  => $TOOL_SVG['screen'],
            'camera'   => $TOOL_SVG['camera'],
            'audio'    => $TOOL_SVG['headphones'],
            'utility'  => $TOOL_SVG['wrench'],
            'gaming'   => $TOOL_SVG['gamepad'],
        ];
        $ALL_SVG = '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>';
        ?>

        <div class="at-filter-title"><?php echo htmlspecialchars($t['kicker'], ENT_QUOTES, 'UTF-8'); ?></div>
        <div class="at-filter" id="at-filter" role="tablist" aria-label="<?php echo htmlspecialchars($t['kicker'], ENT_QUOTES, 'UTF-8'); ?>">
            <button type="button" class="at-pill is-active" data-cat="all" role="tab" aria-selected="true">
                <span class="at-pill-icon" style="color:#a78bfa"><?php echo $ALL_SVG; ?></span>
                <span class="at-pill-label"><?php echo htmlspecialchars($t['kicker'], ENT_QUOTES, 'UTF-8'); ?></span>
                <span class="at-pill-count"><?php echo (int) $totalTools; ?></span>
            </button>
            <?php foreach ($buckets as $bucket): ?>
                <button type="button" class="at-pill" data-cat="<?php echo htmlspecialchars($bucket['id'], ENT_QUOTES, 'UTF-8'); ?>" role="tab" aria-selected="false">
                    <span class="at-pill-icon" style="color: <?php echo htmlspecialchars($bucket['accent'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo $CAT_SVG[$bucket['id']] ?? $ALL_SVG; ?></span>
                    <span class="at-pill-label"><?php echo htmlspecialchars($bucket['label'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <span class="at-pill-count"><?php echo (int) count($bucket['tools']); ?></span>
                </button>
            <?php endforeach; ?>
        </div>

        <div class="at-sections-wrap">
        <?php foreach ($buckets as $bucket):
            $catAccent = htmlspecialchars($bucket['accent'], ENT_QUOTES, 'UTF-8');
            $catIconSvg = $CAT_SVG[$bucket['id']] ?? $ALL_SVG;
        ?>
            <section class="at-section" data-cat="<?php echo htmlspecialchars($bucket['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <div class="at-cat-head">
                    <span class="at-cat-head-icon" style="background: linear-gradient(135deg, <?php echo $catAccent; ?>, <?php echo $catAccent; ?>cc)"><?php echo $catIconSvg; ?></span>
                    <h2><?php echo htmlspecialchars($bucket['label'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <span class="at-cat-count"><?php $ct = count($bucket['tools']); echo htmlspecialchars(sprintf($ct === 1 ? $t['cat_count'] : $t['cat_count_p'], $ct), ENT_QUOTES, 'UTF-8'); ?></span>
                </div>
                <div class="at-grid">
                    <?php foreach ($bucket['tools'] as $tool):
                        $toolIconSvg = $TOOL_SVG[$tool['icon']] ?? $catIconSvg;
                    ?>
                        <a class="at-card" href="<?php echo htmlspecialchars($tool['url'], ENT_QUOTES, 'UTF-8'); ?>" style="--at-card-accent: <?php echo $catAccent; ?>">
                            <div class="at-card-head">
                                <div class="at-card-icon" style="background: linear-gradient(135deg, <?php echo $catAccent; ?>, <?php echo $catAccent; ?>cc)"><?php echo $toolIconSvg; ?></div>
                                <div class="at-card-title"><?php echo htmlspecialchars($tool['name'], ENT_QUOTES, 'UTF-8'); ?></div>
                            </div>
                            <?php if ($tool['desc']): ?>
                                <p class="at-card-desc"><?php echo htmlspecialchars($tool['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
        </div>
    </div>
</main>
<script>
(function(){
    var pills = document.querySelectorAll('.at-pill');
    var sections = document.querySelectorAll('.at-section[data-cat]');
    function apply(cat){
        pills.forEach(function(p){
            var isActive = p.getAttribute('data-cat') === cat;
            p.classList.toggle('is-active', isActive);
            p.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });
        sections.forEach(function(s){
            var match = (cat === 'all') || (s.getAttribute('data-cat') === cat);
            s.classList.toggle('is-hidden', !match);
        });
        if (cat === 'all') {
            if (window.location.hash) history.replaceState(null, '', window.location.pathname + window.location.search);
        } else {
            history.replaceState(null, '', '#' + cat);
        }
    }
    pills.forEach(function(p){
        p.addEventListener('click', function(){ apply(p.getAttribute('data-cat')); });
    });
    var initial = (window.location.hash || '').replace(/^#/, '').toLowerCase();
    if (initial) {
        var found = Array.from(pills).some(function(p){ return p.getAttribute('data-cat') === initial; });
        if (found) apply(initial);
    }
})();
</script>
<?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
