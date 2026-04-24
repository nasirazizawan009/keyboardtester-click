<?php
/**
 * Desktop app manifest endpoint.
 *
 * The KBT Keyboard Tester Desktop app fetches this on launch to populate its
 * tool sidebar AND check for shell-app updates. Edit $SHELL_APP below when you
 * release a new installer; tool list is auto-generated from the site's
 * existing tool-list-data.php, so a new tool appears in the desktop app the
 * next time any user opens it — zero manual work.
 *
 * Also readable by any HTTP client as CORS is relaxed here.
 */

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Cache-Control: public, max-age=300'); // 5-minute cache

include_once __DIR__ . '/config.php';
include_once __DIR__ . '/includes/components/tool-list-data.php';

// ──────────────────────────────────────────────────────────────────────
// App-shell release info — UPDATE THESE when publishing a new installer.
// ──────────────────────────────────────────────────────────────────────
$SHELL_APP = [
    'latestVersion'   => '1.1.0',
    'minSupportedVersion' => '1.0.0',
    'windowsInstallerUrl' => 'https://keyboardtester.click/desktop/KBT-Keyboard-Tester-1.1.0-Setup-x64.exe',
    'windowsPortableUrl'  => 'https://keyboardtester.click/desktop/KBT-Keyboard-Tester-1.1.0-Portable-x64.exe',
    'macArm64Url'         => 'https://keyboardtester.click/desktop/KBT-Keyboard-Tester-1.1.0-mac-arm64.dmg',
    'macX64Url'           => 'https://keyboardtester.click/desktop/KBT-Keyboard-Tester-1.1.0-mac-x64.dmg',
    'releaseNotes'        => 'Full tool suite: all 34 keyboard / mouse / display / camera / audio / utility tools from keyboardtester.click, plus the offline keyboard tester.',
    'electronUpdaterUrl'  => 'https://keyboardtester.click/desktop/', // electron-updater reads latest.yml here
];

// ──────────────────────────────────────────────────────────────────────
// Build categorized tool list from the site's shared data
// ──────────────────────────────────────────────────────────────────────
$data = getSharedToolListData();

$CATEGORY_LABELS = [
    'keyboard' => ['label' => 'Keyboard', 'icon' => 'keyboard'],
    'mouse'    => ['label' => 'Mouse',    'icon' => 'mouse'],
    'display'  => ['label' => 'Display',  'icon' => 'monitor'],
    'camera'   => ['label' => 'Camera',   'icon' => 'camera'],
    'audio'    => ['label' => 'Audio',    'icon' => 'headphones'],
    'utility'  => ['label' => 'Utility',  'icon' => 'wrench'],
    'gaming'   => ['label' => 'Gaming',   'icon' => 'gamepad'],
];

$origin = rtrim(absoluteUrl(''), '/');

$categories = [];
foreach ($data['categories'] as $catId => $catMeta) {
    $categories[$catId] = [
        'id'     => $catId,
        'label'  => $CATEGORY_LABELS[$catId]['label'] ?? ucfirst($catId),
        'icon'   => $CATEGORY_LABELS[$catId]['icon']  ?? 'tool',
        'accent' => $catMeta['accent'] ?? '#0ea5e9',
        'order'  => $catMeta['order']  ?? 99,
        'tools'  => [],
    ];
}

// Tools that don't belong in the desktop app shell view
$EXCLUDE = [
    'tools-page',         // tools index — the app IS the tools index
    'arabic-keyboard',    // localized variants — keep app English-only for now
];

foreach ($data['tools'] as $tool) {
    $id = $tool['id'] ?? '';
    if (!$id || in_array($id, $EXCLUDE, true)) continue;
    $category = $tool['category'] ?? 'utility';
    if (!isset($categories[$category])) continue;

    $route = $tool['routes']['en'] ?? '';
    if ($route === '' || $route === null) continue;

    $fullUrl = $origin . '/' . ltrim($route, '/');

    $categories[$category]['tools'][] = [
        'id'          => $id,
        'name'        => $tool['name'] ?? $id,
        'description' => $tool['description'] ?? '',
        'icon'        => $tool['icon'] ?? $categories[$category]['icon'],
        'url'         => $fullUrl,
        'cta'         => $tool['cta'] ?? 'Open',
    ];
}

// Sort categories by order, drop empty ones
usort($categories, function ($a, $b) { return $a['order'] <=> $b['order']; });
$categories = array_values(array_filter($categories, function ($c) { return !empty($c['tools']); }));

// Collect the blog posts too — shown as "Guides" in the app
$posts = include __DIR__ . '/blog/posts-data.php';
$guides = [];
if (is_array($posts)) {
    foreach ($posts as $p) {
        $guides[] = [
            'id'      => basename($p['path'] ?? ''),
            'title'   => $p['title'] ?? '',
            'excerpt' => $p['excerpt'] ?? '',
            'url'     => $p['url'] ?? ($origin . '/' . ltrim($p['path'] ?? '', '/')),
            'image'   => isset($p['image']) ? ($origin . '/' . ltrim($p['image'], '/')) : '',
            'date'    => $p['date'] ?? '',
        ];
    }
}

// ──────────────────────────────────────────────────────────────────────
// Output
// ──────────────────────────────────────────────────────────────────────
echo json_encode([
    'schema'     => 2,
    'updated'    => gmdate('c'),
    'origin'     => $origin,
    'brand'      => [
        'name'      => 'KeyboardTester.click',
        'subtitle'  => 'Desktop edition',
        'website'   => 'https://keyboardtester.click',
        'aboutUrl'  => 'https://keyboardtester.click/about-us.php',
        'blogUrl'   => 'https://keyboardtester.click/blog/',
    ],
    'shellApp'   => $SHELL_APP,
    'categories' => $categories,
    'guides'     => $guides,
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
