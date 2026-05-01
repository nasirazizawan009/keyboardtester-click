<?php
/**
 * Foldable site-wide sidebar (ported visual language from the desktop app).
 * Data source: same tool-list-data.php used by the site and the desktop manifest.
 * Rendered as an overlay drawer — does not affect page layout when closed.
 */

if (!function_exists('kbtRenderSiteSidebar')) {
    function kbtRenderSiteSidebar($locale = 'en')
    {
        include_once __DIR__ . '/tool-list-data.php';
        include_once __DIR__ . '/../tool-icons.php';
        if (!function_exists('getSharedToolListData')) { return; }
        $data = getSharedToolListData();
        if (!isset($data['locales'][$locale])) {
            $locale = 'en';
        }

        // Locale-aware URL resolver: prefers localized route when available, falls back to EN
        $localeConfig = $data['locales'][$locale] ?? $data['locales']['en'];
        $localeToolOverrides = $localeConfig['tools'] ?? [];
        $localeCatLabels = $localeConfig['category_labels'] ?? [];
        $localeDir = trim((string)($localeConfig['directory'] ?? ''), '/');
        $direction = $localeConfig['dir'] ?? 'ltr';
        $rootPath = dirname(__DIR__, 2);
        $resolveToolUrl = function ($toolMeta) use ($locale, $localeDir, $rootPath) {
            $enPath = $toolMeta['routes']['en'] ?? '';
            if ($locale === 'en' || $localeDir === '') {
                return $enPath !== '' ? (function_exists('url') ? url(ltrim($enPath, '/')) : '/' . ltrim($enPath, '/')) : '';
            }
            $localized = $toolMeta['routes']['localized'] ?? null;
            if ($localized === null) {
                return $enPath !== '' ? (function_exists('url') ? url(ltrim($enPath, '/')) : '/' . ltrim($enPath, '/')) : '';
            }
            if ($localized === '') {
                return function_exists('url') ? url('languages/' . $localeDir . '/') : '/languages/' . $localeDir . '/';
            }
            $abs = $rootPath . DIRECTORY_SEPARATOR . 'languages' . DIRECTORY_SEPARATOR . $localeDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $localized);
            if (!is_file($abs)) {
                return $enPath !== '' ? (function_exists('url') ? url(ltrim($enPath, '/')) : '/' . ltrim($enPath, '/')) : '';
            }
            return function_exists('url') ? url('languages/' . $localeDir . '/' . $localized) : '/languages/' . $localeDir . '/' . $localized;
        };

        // Inline SVG icons per category — take currentColor so we can tint via CSS
        $SIDEBAR_COPY = [
            'en' => [
                'subtitle' => 'Hardware testing suite',
                'search_placeholder' => 'Search tools...',
                'search_aria' => 'Search tools',
                'open_sidebar' => 'Open tool sidebar',
                'close_sidebar' => 'Close tool sidebar',
                'site_nav' => 'Site navigation',
                'all_tools' => 'All Tools',
                'tool_categories' => 'Tool Categories',
                'blog' => 'Blog',
                'about' => 'About',
                'feedback' => 'Feedback',
                'download_app' => 'Download App',
                'new' => 'New',
                'new_title' => 'Added in the last 7 days',
            ],
            'ar' => [
                'subtitle' => 'مجموعة اختبار الأجهزة',
                'search_placeholder' => 'ابحث في الأدوات...',
                'search_aria' => 'البحث في الأدوات',
                'open_sidebar' => 'فتح شريط الأدوات الجانبي',
                'close_sidebar' => 'إغلاق شريط الأدوات الجانبي',
                'site_nav' => 'تنقل الموقع',
                'all_tools' => 'كل الأدوات',
                'tool_categories' => 'فئات الأدوات',
                'blog' => 'المدونة',
                'about' => 'حول',
                'feedback' => 'الملاحظات',
                'download_app' => 'تنزيل التطبيق',
                'new' => 'جديد',
                'new_title' => 'أضيف خلال آخر 7 أيام',
            ],
            'fr' => [
                'subtitle' => 'Suite de test matériel',
                'search_placeholder' => 'Rechercher des outils...',
                'search_aria' => 'Rechercher des outils',
                'open_sidebar' => 'Ouvrir la barre latérale des outils',
                'close_sidebar' => 'Fermer la barre latérale des outils',
                'site_nav' => 'Navigation du site',
                'all_tools' => 'Tous les outils',
                'tool_categories' => 'Catégories d’outils',
                'blog' => 'Blog',
                'about' => 'À propos',
                'feedback' => 'Retour',
                'download_app' => 'Télécharger l’app',
                'new' => 'Nouveau',
                'new_title' => 'Ajouté au cours des 7 derniers jours',
            ],
            'de' => [
                'subtitle' => 'Hardware-Test-Suite',
                'search_placeholder' => 'Tools suchen...',
                'search_aria' => 'Tools suchen',
                'open_sidebar' => 'Tool-Seitenleiste öffnen',
                'close_sidebar' => 'Tool-Seitenleiste schließen',
                'site_nav' => 'Seitennavigation',
                'all_tools' => 'Alle Tools',
                'tool_categories' => 'Tool-Kategorien',
                'blog' => 'Blog',
                'about' => 'Über uns',
                'feedback' => 'Feedback',
                'download_app' => 'App herunterladen',
                'new' => 'Neu',
                'new_title' => 'In den letzten 7 Tagen hinzugefügt',
            ],
            'es' => [
                'subtitle' => 'Suite de pruebas de hardware',
                'search_placeholder' => 'Buscar herramientas...',
                'search_aria' => 'Buscar herramientas',
                'open_sidebar' => 'Abrir barra lateral de herramientas',
                'close_sidebar' => 'Cerrar barra lateral de herramientas',
                'site_nav' => 'Navegación del sitio',
                'all_tools' => 'Todas las herramientas',
                'tool_categories' => 'Categorías de herramientas',
                'blog' => 'Blog',
                'about' => 'Acerca de',
                'feedback' => 'Comentarios',
                'download_app' => 'Descargar app',
                'new' => 'Nuevo',
                'new_title' => 'Añadido en los últimos 7 días',
            ],
            'pt' => [
                'subtitle' => 'Suite de testes de hardware',
                'search_placeholder' => 'Pesquisar ferramentas...',
                'search_aria' => 'Pesquisar ferramentas',
                'open_sidebar' => 'Abrir barra lateral de ferramentas',
                'close_sidebar' => 'Fechar barra lateral de ferramentas',
                'site_nav' => 'Navegação do site',
                'all_tools' => 'Todas as ferramentas',
                'tool_categories' => 'Categorias de ferramentas',
                'blog' => 'Blog',
                'about' => 'Sobre',
                'feedback' => 'Feedback',
                'download_app' => 'Baixar app',
                'new' => 'Novo',
                'new_title' => 'Adicionado nos últimos 7 dias',
            ],
            'ru' => [
                'subtitle' => 'Набор инструментов для проверки устройств',
                'search_placeholder' => 'Искать инструменты...',
                'search_aria' => 'Поиск инструментов',
                'open_sidebar' => 'Открыть боковую панель инструментов',
                'close_sidebar' => 'Закрыть боковую панель инструментов',
                'site_nav' => 'Навигация по сайту',
                'all_tools' => 'Все инструменты',
                'tool_categories' => 'Категории инструментов',
                'blog' => 'Блог',
                'about' => 'О сайте',
                'feedback' => 'Обратная связь',
                'download_app' => 'Скачать приложение',
                'new' => 'Новое',
                'new_title' => 'Добавлено за последние 7 дней',
            ],
            'ja' => [
                'subtitle' => 'ハードウェアテストスイート',
                'search_placeholder' => 'ツールを検索...',
                'search_aria' => 'ツールを検索',
                'open_sidebar' => 'ツールサイドバーを開く',
                'close_sidebar' => 'ツールサイドバーを閉じる',
                'site_nav' => 'サイトナビゲーション',
                'all_tools' => 'すべてのツール',
                'tool_categories' => 'ツールカテゴリ',
                'blog' => 'ブログ',
                'about' => '概要',
                'feedback' => 'フィードバック',
                'download_app' => 'アプリをダウンロード',
                'new' => '新着',
                'new_title' => '過去7日間に追加',
            ],
            'ko' => [
                'subtitle' => '하드웨어 테스트 도구 모음',
                'search_placeholder' => '도구 검색...',
                'search_aria' => '도구 검색',
                'open_sidebar' => '도구 사이드바 열기',
                'close_sidebar' => '도구 사이드바 닫기',
                'site_nav' => '사이트 탐색',
                'all_tools' => '모든 도구',
                'tool_categories' => '도구 카테고리',
                'blog' => '블로그',
                'about' => '소개',
                'feedback' => '피드백',
                'download_app' => '앱 다운로드',
                'new' => '신규',
                'new_title' => '최근 7일 안에 추가됨',
            ],
        ];
        $ui = array_merge($SIDEBAR_COPY['en'], $SIDEBAR_COPY[$locale] ?? []);

        $CATEGORY_LABELS = [
            'keyboard' => [
                'label' => 'Keyboard',
                'svg'   => '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="6" width="20" height="14" rx="2"/><path d="M6 10h.01M10 10h.01M14 10h.01M18 10h.01M6 14h.01M10 14h.01M14 14h.01M18 14h.01M7 18h10"/></svg>'
            ],
            'mouse' => [
                'label' => 'Mouse',
                'svg'   => '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="6" y="2" width="12" height="20" rx="6"/><path d="M12 6v5"/></svg>'
            ],
            'display' => [
                'label' => 'Display',
                'svg'   => '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>'
            ],
            'camera' => [
                'label' => 'Camera',
                'svg'   => '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="4"/></svg>'
            ],
            'audio' => [
                'label' => 'Audio',
                'svg'   => '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1v-7h3zM3 19a2 2 0 0 0 2 2h1v-7H3z"/></svg>'
            ],
            'utility' => [
                'label' => 'Utility',
                'svg'   => '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94z"/></svg>'
            ],
            'gaming' => [
                'label' => 'Gaming',
                'svg'   => '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 11h4M8 9v4"/><circle cx="15" cy="12" r="1"/><circle cx="17.5" cy="9.5" r="1"/><rect x="2" y="6" width="20" height="12" rx="4"/></svg>'
            ],
        ];

        // Build categorized tool buckets
        $EXCLUDE = ['tools-page', 'arabic-keyboard'];
        $buckets = [];
        $DEFAULT_SVG = '<svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="3"/></svg>';
        foreach ($data['categories'] as $catId => $catMeta) {
            $buckets[$catId] = [
                'id'     => $catId,
                'label'  => $localeCatLabels[$catId] ?? ($CATEGORY_LABELS[$catId]['label'] ?? ucfirst($catId)),
                'svg'    => $CATEGORY_LABELS[$catId]['svg'] ?? $DEFAULT_SVG,
                'accent' => $catMeta['accent'] ?? '#0ea5e9',
                'order'  => $catMeta['order'] ?? 99,
                'tools'  => [],
            ];
        }
        $NEW_WINDOW_SECONDS = 7 * 86400;
        $nowTs = time();
        foreach ($data['tools'] as $tool) {
            $id = $tool['id'] ?? '';
            if (!$id || in_array($id, $EXCLUDE, true)) continue;
            $cat = $tool['category'] ?? 'utility';
            if (!isset($buckets[$cat])) continue;
            $route = $tool['routes']['en'] ?? '';
            if ($route === '') continue;
            $resolvedUrl = $resolveToolUrl($tool);
            if ($resolvedUrl === '') continue;
            $isNew = false;
            if (!empty($tool['added'])) {
                $addedTs = strtotime($tool['added']);
                if ($addedTs && ($nowTs - $addedTs) <= $NEW_WINDOW_SECONDS) {
                    $isNew = true;
                }
            }
            $buckets[$cat]['tools'][] = [
                'id'    => $id,
                'name'  => $localeToolOverrides[$id]['name'] ?? ($tool['name'] ?? $id),
                'desc'  => $localeToolOverrides[$id]['description'] ?? ($tool['description'] ?? ''),
                'search' => trim(($localeToolOverrides[$id]['name'] ?? '') . ' ' . ($tool['name'] ?? '') . ' ' . $id),
                'url'   => $resolvedUrl,
                'is_new' => $isNew,
                'icon'  => $tool['icon'] ?? '',
            ];
        }
        usort($buckets, function ($a, $b) { return $a['order'] <=> $b['order']; });
        $buckets = array_values(array_filter($buckets, function ($c) { return !empty($c['tools']); }));

        if ($locale !== 'en' && $localeDir !== '') {
            $homeUrl     = function_exists('url') ? url('languages/' . $localeDir . '/') : '/languages/' . $localeDir . '/';
            $allToolsUrl = function_exists('url') ? url('pages/all-tools-' . $locale . '.php') : '/pages/all-tools-' . $locale . '.php';
        } else {
            $homeUrl     = function_exists('url') ? url('') : '/';
            $allToolsUrl = function_exists('url') ? url('pages/all-tools.php') : '/pages/all-tools.php';
        }
        $blogUrl     = function_exists('blogUrl') ? blogUrl() : (function_exists('url') ? url('blog/') : '/blog/');
        $aboutUrl    = function_exists('url') ? url('about-us.php') : '/about-us.php';
        $downloadUrl = function_exists('url') ? url('pages/download.php') : '/pages/download.php';
        ?>
<!-- KBT Site Sidebar -->
<style>
    .kbt-sb-fab {
        position: fixed; left: 14px; top: 50%;
        transform: translateY(-50%);
        z-index: 1200;
        width: 40px; height: 48px;
        display: inline-flex; align-items: center; justify-content: center;
        border-radius: 0 12px 12px 0;
        background: linear-gradient(135deg, #0ea5e9, #0284c7);
        color: #fff; border: none;
        font-size: 1.1rem; font-weight: 700;
        cursor: pointer;
        box-shadow: 0 6px 22px rgba(14, 165, 233, 0.35);
        transition: transform 0.2s ease, background 0.2s ease, left 0.3s ease;
        letter-spacing: 0.08em;
    }
    .kbt-sb-fab:hover { transform: translateY(-50%) translateX(2px); }
    .kbt-sb-fab:focus-visible { outline: 3px solid rgba(14,165,233,0.5); outline-offset: 2px; }
    .kbt-sb-open .kbt-sb-fab { left: 294px; }
    .kbt-sb-fab-icon::before {
        content: "☰";
        display: inline-block;
        font-size: 1.15rem;
        line-height: 1;
    }
    .kbt-sb-open .kbt-sb-fab-icon::before { content: "✕"; }

    .kbt-sb-backdrop {
        position: fixed; inset: 0;
        background: rgba(8, 15, 30, 0.5);
        backdrop-filter: blur(3px);
        z-index: 1180;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.22s ease;
    }
    .kbt-sb-open .kbt-sb-backdrop { opacity: 1; pointer-events: auto; }

    .kbt-sb {
        position: fixed; top: 0; left: 0; bottom: 0;
        width: 290px;
        background: #0b1628;
        color: #cbd5e1;
        z-index: 1190;
        transform: translateX(-100%);
        transition: transform 0.28s cubic-bezier(0.22, 1, 0.36, 1);
        display: flex; flex-direction: column;
        box-shadow: 20px 0 40px -10px rgba(0, 0, 0, 0.35);
        overflow: hidden;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, Roboto, sans-serif;
    }
    .kbt-sb-open .kbt-sb { transform: translateX(0); }
    .kbt-sb[dir="rtl"] .kbt-sb-link,
    .kbt-sb[dir="rtl"] .kbt-sb-cat-head,
    .kbt-sb[dir="rtl"] .kbt-sb-tool {
        text-align: right;
    }

    .kbt-sb-brand {
        display: flex; align-items: center; gap: 12px;
        padding: 18px 18px 16px;
        border-bottom: 1px solid rgba(148,163,184,0.18);
        color: inherit; text-decoration: none;
    }
    .kbt-sb-logo {
        width: 38px; height: 38px; flex-shrink: 0;
        border-radius: 10px;
        background: linear-gradient(135deg, #38bdf8, #0ea5e9);
        display: flex; align-items: center; justify-content: center;
        color: #0b1628;
        box-shadow: 0 4px 14px rgba(14,165,233,0.35);
    }
    .kbt-sb-logo svg { width: 22px; height: 22px; }
    .kbt-sb-brand-text { min-width: 0; }
    .kbt-sb-name { font-weight: 800; font-size: 0.98rem; color: #f1f5f9; letter-spacing: 0.01em; }
    .kbt-sb-name .kbt-sb-dot { color: #38bdf8; }
    .kbt-sb-sub { font-size: 0.72rem; color: #94a3b8; margin-top: 1px; }

    .kbt-sb-search { padding: 12px 14px 6px; }
    .kbt-sb-search input {
        width: 100%;
        padding: 9px 12px;
        border-radius: 8px;
        background: rgba(148,163,184,0.08);
        border: 1px solid rgba(148,163,184,0.18);
        color: #f1f5f9;
        font: inherit; font-size: 0.85rem;
        outline: none;
        transition: border-color 0.15s, background-color 0.15s;
    }
    .kbt-sb-search input::placeholder { color: #94a3b8; }
    .kbt-sb-search input:focus { border-color: #38bdf8; background: rgba(148,163,184,0.14); }

    .kbt-sb-nav {
        display: flex; flex-direction: column; gap: 2px;
        padding: 0;
    }
    .kbt-sb-nav-primary { padding: 4px 0 2px; }
    .kbt-sb-nav-secondary {
        border-top: 1px solid rgba(148,163,184,0.18);
        padding-top: 10px;
        margin-top: 10px;
    }
    .kbt-sb-link {
        display: flex; align-items: center; gap: 12px;
        padding: 9px 12px;
        background: transparent;
        border: none;
        border-radius: 9px;
        color: #e2e8f0;
        font: inherit; font-size: 0.95rem; font-weight: 600;
        cursor: pointer; text-align: left; width: 100%;
        text-decoration: none;
        transition: background-color 0.12s, color 0.12s;
    }
    .kbt-sb-link:hover, .kbt-sb-link:focus-visible {
        background: rgba(148,163,184,0.12);
        color: #f1f5f9;
    }
    .kbt-sb-link-icon {
        width: 20px; height: 20px;
        display: inline-flex; align-items: center; justify-content: center;
        color: #94a3b8;
        flex-shrink: 0;
    }
    .kbt-sb-link:hover .kbt-sb-link-icon { color: #e2e8f0; }

    .kbt-sb-categories {
        display: flex; flex-direction: column;
    }

    .kbt-sb-cats-title {
        padding: 16px 12px 10px;
        font-size: 0.68rem; font-weight: 700;
        letter-spacing: 0.14em; text-transform: uppercase;
        color: #64748b;
    }
    .kbt-sb-cat { margin-bottom: 2px; }
    .kbt-sb-cat-head {
        display: flex; align-items: center; gap: 12px;
        width: 100%;
        padding: 9px 10px;
        margin: 0;
        background: transparent;
        border: none;
        border-radius: 10px;
        font: inherit;
        font-size: 0.95rem; font-weight: 600;
        color: #e2e8f0;
        cursor: pointer;
        text-align: left;
        transition: background-color 0.15s;
    }
    .kbt-sb-cat-head:hover, .kbt-sb-cat-head:focus-visible { background: rgba(148,163,184,0.08); outline: none; }
    .kbt-sb-cat-icon {
        width: 34px; height: 34px;
        display: inline-flex; align-items: center; justify-content: center;
        border-radius: 9px;
        flex-shrink: 0;
        background: var(--kbt-accent-bg, rgba(139,92,246,0.14));
        color: var(--kbt-accent-fg, #a78bfa);
    }
    .kbt-sb-cat-label { flex: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .kbt-sb-cat-count {
        font-size: 0.72rem; font-weight: 700;
        color: #4ade80;
        background: rgba(34,197,94,0.14);
        border: 1px solid rgba(34,197,94,0.28);
        padding: 2px 9px;
        border-radius: 999px;
        font-variant-numeric: tabular-nums;
        line-height: 1;
        min-width: 22px; text-align: center;
    }
    .kbt-sb-cat-chevron {
        width: 18px; height: 18px;
        display: inline-flex; align-items: center; justify-content: center;
        color: #64748b;
        transition: transform 0.2s ease;
        flex-shrink: 0;
    }
    .kbt-sb-cat-head[aria-expanded="true"] .kbt-sb-cat-chevron { transform: rotate(90deg); }
    .kbt-sb-cat-list { display: flex; flex-direction: column; gap: 1px; overflow: hidden; transition: max-height 0.22s ease; padding-left: 24px; }
    .kbt-sb-cat-head[aria-expanded="false"] + .kbt-sb-cat-list { max-height: 0 !important; padding-top: 0; padding-bottom: 0; }
    .kbt-sb-tool {
        display: flex; align-items: center; gap: 10px;
        padding: 6px 10px;
        border-radius: 7px;
        color: #94a3b8; text-decoration: none;
        font-size: 0.86rem; font-weight: 500;
        transition: background-color 0.12s, color 0.12s;
    }
    .kbt-sb-tool:hover, .kbt-sb-tool:focus-visible {
        background: rgba(148,163,184,0.10);
        color: #f1f5f9;
    }
    .kbt-sb-tool-icon {
        width: 16px; height: 16px;
        display: inline-flex; align-items: center; justify-content: center;
        color: #64748b;
        flex-shrink: 0;
        transition: color 0.15s ease, transform 0.15s ease;
    }
    .kbt-sb-tool-icon svg { width: 16px; height: 16px; }
    .kbt-sb-tool:hover .kbt-sb-tool-icon,
    .kbt-sb-tool:focus-visible .kbt-sb-tool-icon {
        color: var(--kbt-accent-fg, #a3e635);
        transform: scale(1.08);
    }
    .kbt-sb-tool-name {
        flex: 1; min-width: 0;
        overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
    }
    .kbt-sb-tool-newdot {
        width: 8px; height: 8px;
        border-radius: 999px;
        background: #22c55e;
        box-shadow: 0 0 0 0 rgba(34,197,94,0.55);
        flex-shrink: 0;
        animation: kbtSbNewPulse 2s ease-out infinite;
    }
    @keyframes kbtSbNewPulse {
        0%   { box-shadow: 0 0 0 0 rgba(34,197,94,0.55); }
        70%  { box-shadow: 0 0 0 6px rgba(34,197,94,0); }
        100% { box-shadow: 0 0 0 0 rgba(34,197,94,0); }
    }
    @media (prefers-reduced-motion: reduce) {
        .kbt-sb-tool-newdot { animation: none; }
    }

    /* Everything between search and footer scrolls together */
    .kbt-sb-scroll {
        flex: 1;
        overflow-y: auto;
        overflow-x: hidden;
        padding: 4px 10px 12px;
    }
    .kbt-sb-scroll::-webkit-scrollbar { width: 10px; }
    .kbt-sb-scroll::-webkit-scrollbar-thumb { background: rgba(148,163,184,0.22); border-radius: 999px; }

    /* Sticky Download App button at the bottom */
    .kbt-sb-footer {
        flex-shrink: 0;
        border-top: 1px solid rgba(148,163,184,0.18);
        padding: 12px 12px 14px;
        background: #0b1628;
    }
    .kbt-sb-download {
        display: flex; align-items: center; justify-content: center; gap: 10px;
        width: 100%;
        padding: 12px 16px;
        border-radius: 10px;
        background: linear-gradient(135deg, #0ea5e9, #0284c7);
        color: #fff; font: inherit; font-weight: 700; font-size: 0.95rem;
        text-decoration: none; cursor: pointer;
        border: none;
        box-shadow: 0 6px 18px rgba(14,165,233,0.28);
        transition: transform 0.12s, box-shadow 0.15s;
    }
    .kbt-sb-download:hover { transform: translateY(-1px); box-shadow: 0 8px 22px rgba(14,165,233,0.36); color: #fff; }
    .kbt-sb-download:focus-visible { outline: 3px solid rgba(14,165,233,0.55); outline-offset: 2px; }
    .kbt-sb-download svg { flex-shrink: 0; }

    /* Tighter gutter on narrow viewports; FAB stays reachable */
    @media (max-width: 520px) {
        .kbt-sb { width: min(86vw, 320px); }
        .kbt-sb-open .kbt-sb-fab { left: calc(min(86vw, 320px) + 4px); }
        .kbt-sb-fab { left: 10px; width: 36px; height: 44px; }
    }

    @media (prefers-reduced-motion: reduce) {
        .kbt-sb, .kbt-sb-fab, .kbt-sb-backdrop { transition: none !important; }
    }
</style>

<button class="kbt-sb-fab" id="kbt-sb-fab" type="button" aria-expanded="false" aria-controls="kbt-sb-panel" aria-label="<?php echo htmlspecialchars($ui['open_sidebar'], ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($ui['open_sidebar'], ENT_QUOTES, 'UTF-8'); ?>" data-open-label="<?php echo htmlspecialchars($ui['open_sidebar'], ENT_QUOTES, 'UTF-8'); ?>" data-close-label="<?php echo htmlspecialchars($ui['close_sidebar'], ENT_QUOTES, 'UTF-8'); ?>">
    <span class="kbt-sb-fab-icon" aria-hidden="true"></span>
</button>

<div class="kbt-sb-backdrop" id="kbt-sb-backdrop" aria-hidden="true"></div>

<aside class="kbt-sb" id="kbt-sb-panel" inert aria-label="<?php echo htmlspecialchars($ui['site_nav'], ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo htmlspecialchars($direction, ENT_QUOTES, 'UTF-8'); ?>">
    <a class="kbt-sb-brand" href="<?php echo htmlspecialchars($homeUrl, ENT_QUOTES, 'UTF-8'); ?>">
        <div class="kbt-sb-logo">
            <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="2" y="6" width="20" height="14" rx="2" ry="2" fill="none" stroke="currentColor" stroke-width="1.6"/><path d="M5 10h1M8 10h1M11 10h1M14 10h1M17 10h1M5 13h1M8 13h1M11 13h1M14 13h1M17 13h1M7 16h10" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        </div>
        <div class="kbt-sb-brand-text">
            <div class="kbt-sb-name">KeyboardTester<span class="kbt-sb-dot">.click</span></div>
            <div class="kbt-sb-sub"><?php echo htmlspecialchars($ui['subtitle'], ENT_QUOTES, 'UTF-8'); ?></div>
        </div>
    </a>

    <div class="kbt-sb-search">
        <input type="search" id="kbt-sb-search-input" placeholder="<?php echo htmlspecialchars($ui['search_placeholder'], ENT_QUOTES, 'UTF-8'); ?>" aria-label="<?php echo htmlspecialchars($ui['search_aria'], ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div class="kbt-sb-scroll">
    <nav class="kbt-sb-nav kbt-sb-nav-primary">
        <a class="kbt-sb-link" href="<?php echo htmlspecialchars($allToolsUrl, ENT_QUOTES, 'UTF-8'); ?>">
            <span class="kbt-sb-link-icon"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></span>
            <?php echo htmlspecialchars($ui['all_tools'], ENT_QUOTES, 'UTF-8'); ?>
        </a>
    </nav>

    <div class="kbt-sb-cats-title"><?php echo htmlspecialchars($ui['tool_categories'], ENT_QUOTES, 'UTF-8'); ?></div>

    <div class="kbt-sb-categories" id="kbt-sb-categories">
        <?php foreach ($buckets as $bucket): ?>
            <?php
                $catId = 'kbt-sb-cat-' . htmlspecialchars($bucket['id'], ENT_QUOTES, 'UTF-8');
                $accent = htmlspecialchars($bucket['accent'], ENT_QUOTES, 'UTF-8');
                $iconStyle = '--kbt-accent-fg:' . $accent . ';--kbt-accent-bg:' . $accent . '26;';
            ?>
            <div class="kbt-sb-cat" data-cat-id="<?php echo htmlspecialchars($bucket['id'], ENT_QUOTES, 'UTF-8'); ?>">
                <button type="button" class="kbt-sb-cat-head" aria-expanded="false" aria-controls="<?php echo $catId; ?>">
                    <span class="kbt-sb-cat-icon" style="<?php echo $iconStyle; ?>"><?php echo $bucket['svg']; ?></span>
                    <span class="kbt-sb-cat-label"><?php echo htmlspecialchars($bucket['label'], ENT_QUOTES, 'UTF-8'); ?></span>
                    <span class="kbt-sb-cat-count"><?php echo count($bucket['tools']); ?></span>
                    <span class="kbt-sb-cat-chevron" aria-hidden="true">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg>
                    </span>
                </button>
                <div class="kbt-sb-cat-list" id="<?php echo $catId; ?>">
                    <?php foreach ($bucket['tools'] as $tool): ?>
                        <a class="kbt-sb-tool<?php echo !empty($tool['is_new']) ? ' is-new' : ''; ?>" href="<?php echo htmlspecialchars($tool['url'], ENT_QUOTES, 'UTF-8'); ?>" data-name="<?php echo htmlspecialchars(strtolower($tool['search'] ?: $tool['name']), ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($tool['desc'], ENT_QUOTES, 'UTF-8'); ?>" style="--kbt-accent-fg:<?php echo htmlspecialchars($bucket['accent'], ENT_QUOTES, 'UTF-8'); ?>">
                            <span class="kbt-sb-tool-icon" aria-hidden="true"><?php echo function_exists('kbtRenderToolIcon') ? kbtRenderToolIcon($tool['icon'] ?? '', $bucket['id']) : ''; ?></span>
                            <span class="kbt-sb-tool-name"><?php echo htmlspecialchars($tool['name'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <?php if (!empty($tool['is_new'])): ?><span class="kbt-sb-tool-newdot" aria-label="<?php echo htmlspecialchars($ui['new'], ENT_QUOTES, 'UTF-8'); ?>" title="<?php echo htmlspecialchars($ui['new_title'], ENT_QUOTES, 'UTF-8'); ?>"></span><?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <nav class="kbt-sb-nav kbt-sb-nav-secondary">
        <a class="kbt-sb-link" href="<?php echo htmlspecialchars($blogUrl, ENT_QUOTES, 'UTF-8'); ?>">
            <span class="kbt-sb-link-icon"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20V4H6.5A2.5 2.5 0 0 0 4 6.5z"/><path d="M4 19.5V22h14"/></svg></span>
            <?php echo htmlspecialchars($ui['blog'], ENT_QUOTES, 'UTF-8'); ?>
        </a>
        <a class="kbt-sb-link" href="<?php echo htmlspecialchars($aboutUrl, ENT_QUOTES, 'UTF-8'); ?>">
            <span class="kbt-sb-link-icon"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 16v-5M12 8h.01"/></svg></span>
            <?php echo htmlspecialchars($ui['about'], ENT_QUOTES, 'UTF-8'); ?>
        </a>
        <a class="kbt-sb-link" href="<?php echo htmlspecialchars(function_exists('url') ? url('feedback.php') : '/feedback.php', ENT_QUOTES, 'UTF-8'); ?>">
            <span class="kbt-sb-link-icon"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></span>
            <?php echo htmlspecialchars($ui['feedback'], ENT_QUOTES, 'UTF-8'); ?>
        </a>
    </nav>
    </div><!-- /.kbt-sb-scroll -->

    <div class="kbt-sb-footer">
        <a class="kbt-sb-download" href="<?php echo htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8'); ?>">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3v12m0 0 4-4m-4 4-4-4"/><path d="M5 21h14"/></svg>
            <?php echo htmlspecialchars($ui['download_app'], ENT_QUOTES, 'UTF-8'); ?>
        </a>
    </div>
</aside>

<script>
(function () {
    var root = document.documentElement;
    var fab = document.getElementById('kbt-sb-fab');
    var panel = document.getElementById('kbt-sb-panel');
    var backdrop = document.getElementById('kbt-sb-backdrop');
    var input = document.getElementById('kbt-sb-search-input');
    var tools = document.querySelectorAll('.kbt-sb-tool');
    var cats  = document.querySelectorAll('.kbt-sb-cat');

    function open() {
        root.classList.add('kbt-sb-open');
        fab.setAttribute('aria-expanded', 'true');
        fab.setAttribute('aria-label', fab.getAttribute('data-close-label') || '');
        fab.setAttribute('title', fab.getAttribute('data-close-label') || '');
        panel.removeAttribute('inert');
        backdrop.setAttribute('aria-hidden', 'false');
        try { localStorage.setItem('kbt-sb-state', 'open'); } catch (_) {}
        setTimeout(function () { input && input.focus(); }, 200);
    }
    function close() {
        root.classList.remove('kbt-sb-open');
        fab.setAttribute('aria-expanded', 'false');
        fab.setAttribute('aria-label', fab.getAttribute('data-open-label') || '');
        fab.setAttribute('title', fab.getAttribute('data-open-label') || '');
        panel.setAttribute('inert', '');
        backdrop.setAttribute('aria-hidden', 'true');
        try { localStorage.setItem('kbt-sb-state', 'closed'); } catch (_) {}
    }
    function toggle() {
        if (root.classList.contains('kbt-sb-open')) close(); else open();
    }

    fab.addEventListener('click', toggle);
    backdrop.addEventListener('click', close);
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && root.classList.contains('kbt-sb-open')) close();
    });

    if (input) {
        input.addEventListener('input', function () {
            var q = input.value.trim().toLowerCase();
            cats.forEach(function (cat) {
                var anyVisible = false;
                cat.querySelectorAll('.kbt-sb-tool').forEach(function (t) {
                    var n = t.getAttribute('data-name') || '';
                    var match = q === '' || n.indexOf(q) >= 0;
                    t.style.display = match ? '' : 'none';
                    if (match) anyVisible = true;
                });
                cat.style.display = anyVisible ? '' : 'none';
                // Force-expand any category with search matches, so results are visible.
                if (q !== '' && anyVisible) {
                    var h = cat.querySelector('.kbt-sb-cat-head');
                    if (h && h.getAttribute('aria-expanded') === 'false') setExpanded(h, true, false);
                }
            });
        });
    }

    // Foldable categories (per-category localStorage, default expanded)
    var FOLD_KEY_PREFIX = 'kbt-sb-cat-fold:';
    function setExpanded(head, expanded, persist) {
        head.setAttribute('aria-expanded', expanded ? 'true' : 'false');
        if (persist) {
            var cat = head.closest('.kbt-sb-cat');
            var id = cat && cat.getAttribute('data-cat-id');
            if (id) {
                try { localStorage.setItem(FOLD_KEY_PREFIX + id, expanded ? '1' : '0'); } catch (_) {}
            }
        }
    }
    document.querySelectorAll('.kbt-sb-cat-head').forEach(function (head) {
        var cat = head.closest('.kbt-sb-cat');
        var id = cat && cat.getAttribute('data-cat-id');
        if (id) {
            try {
                var saved = localStorage.getItem(FOLD_KEY_PREFIX + id);
                if (saved === '0') setExpanded(head, false, false);
            } catch (_) {}
        }
        head.addEventListener('click', function () {
            var isOpen = head.getAttribute('aria-expanded') === 'true';
            setExpanded(head, !isOpen, true);
        });
    });

    // Respect previous open state on desktop (> 920px); always start closed on mobile.
    try {
        var saved = localStorage.getItem('kbt-sb-state');
        if (saved === 'open' && window.innerWidth > 920) open();
    } catch (_) {}
})();
</script>
<?php
    }
}
