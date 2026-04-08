<?php
/**
 * Tool List Renderer
 *
 * Renders the unified tools-list grid for any locale.
 *
 * Usage:
 *   require_once __DIR__ . '/tool-list-renderer.php';
 *   renderToolsList('fr');
 *
 * To add a new language in the future:
 *   1. Add the locale entry in tool-list-data.php under 'locales'.
 *   2. Create a thin wrapper at languages/{lang}/sections/tools-list-{code}.php:
 *        <?php
 *        require_once __DIR__ . '/../../../includes/components/tool-list-renderer.php';
 *        renderToolsList('{code}');
 *   3. Done — no other files need changing.
 *
 * To add a new tool in the future:
 *   1. Add the tool entry in tool-list-data.php under 'tools' with id, category, icon, routes.
 *   2. Add translations for each locale under locales.{code}.tools.{id}.
 *   3. Done — all language pages pick it up automatically.
 */

require_once __DIR__ . '/tool-list-data.php';

if (!function_exists('url')) {
    require_once __DIR__ . '/../../config.php';
}

if (!function_exists('renderToolsListIcon')) {
    function renderToolsListIcon($iconKey)
    {
        switch ($iconKey) {
            case 'keyboard':
                return '<svg viewBox="0 0 24 24"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 10h1M9 10h1M12 10h1M15 10h1M18 10h1"/><path d="M6 13h1M9 13h1M12 13h6"/><path d="M6 16h8"/></svg>';
            case 'mouse':
                return '<svg viewBox="0 0 24 24"><rect x="9" y="2" width="6" height="10" rx="3"/><path d="M9 7h6"/><path d="M6 12v4a6 6 0 0 0 12 0v-4"/></svg>';
            case 'lightning':
                return '<svg viewBox="0 0 24 24"><path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"/></svg>';
            case 'target':
                return '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="3"/><path d="M12 4v2M12 18v2M4 12h2M18 12h2"/></svg>';
            case 'trail':
                return '<svg viewBox="0 0 24 24"><path d="M4 18c4-6 8-8 16-10"/><circle cx="6" cy="16" r="1"/><circle cx="10" cy="13" r="1"/><circle cx="14" cy="11" r="1"/></svg>';
            case 'ghost':
                return '<svg viewBox="0 0 24 24"><path d="M6 10a6 6 0 0 1 12 0v8l-2-2-2 2-2-2-2 2-2-2-2 2z"/><circle cx="10" cy="10" r="1"/><circle cx="14" cy="10" r="1"/></svg>';
            case 'polling':
                return '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/><path d="M4 12H2M22 12h-2M12 2V4M12 20v2"/></svg>';
            case 'typing':
                return '<svg viewBox="0 0 24 24"><path d="M4 6h16"/><path d="M7 10h10"/><path d="M9 14h6"/><path d="M11 18h2"/></svg>';
            case 'clock':
                return '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><path d="M12 8v5l3 2"/></svg>';
            case 'spacebar':
                return '<svg viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M7 14h10"/></svg>';
            case 'screen':
                return '<svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="12" rx="2"/><path d="M8 21h8"/><path d="M12 17v4"/></svg>';
            case 'refresh':
                return '<svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/><path d="M9 10l2 2 4-4"/></svg>';
            case 'palette':
                return '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 3a9 9 0 0 1 0 18" fill="none"/><path d="M3 12h9"/><circle cx="12" cy="12" r="3" fill="currentColor"/></svg>';
            case 'bleed':
                return '<svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="14" rx="2"/><path d="M3 6c2 0 4 3 9 3s7-3 9-3"/><path d="M3 16c2 0 4-3 9-3s7 3 9 3"/></svg>';
            case 'touch':
                return '<svg viewBox="0 0 24 24"><path d="M9 11.5V6a2 2 0 1 1 4 0v5.5"/><path d="M13 10.5a2 2 0 1 1 4 0V14"/><path d="M17 12.5a2 2 0 1 1 4 0V15a7 7 0 0 1-7 7h-3a7 7 0 0 1-4.9-2"/><path d="M3 13l3-3"/></svg>';
            case 'camera':
                return '<svg viewBox="0 0 24 24"><rect x="3" y="7" width="14" height="10" rx="2"/><path d="M17 10l4-3v10l-4-3"/></svg>';
            case 'mic':
                return '<svg viewBox="0 0 24 24"><rect x="9" y="2" width="6" height="10" rx="3"/><path d="M5 11a7 7 0 0 0 14 0"/><path d="M12 18v4"/><path d="M8 22h8"/></svg>';
            case 'headphones':
                return '<svg viewBox="0 0 24 24"><path d="M4 12a8 8 0 0 1 16 0"/><rect x="3" y="12" width="4" height="7" rx="2"/><rect x="17" y="12" width="4" height="7" rx="2"/></svg>';
            case 'ocr':
                return '<svg viewBox="0 0 24 24"><path d="M4 7V4h3"/><path d="M20 7V4h-3"/><path d="M4 17v3h3"/><path d="M20 17v3h-3"/><path d="M8 12h8"/><path d="M10 9h4"/><path d="M10 15h4"/></svg>';
            case 'qr-reader':
                return '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="6" height="6"/><rect x="15" y="3" width="6" height="6"/><rect x="3" y="15" width="6" height="6"/><path d="M15 15h6v6h-6z"/><path d="M12 12h2"/><path d="M12 8h2"/><path d="M8 12h2"/></svg>';
            case 'qr-generator':
                return '<svg viewBox="0 0 24 24"><rect x="3" y="3" width="6" height="6"/><rect x="15" y="3" width="6" height="6"/><rect x="3" y="15" width="6" height="6"/><path d="M14 14h7v7h-7z"/><path d="M9 9h6"/></svg>';
            case 'whatsapp-link':
                return '<svg viewBox="0 0 24 24"><path d="M4 6a8 8 0 0 1 16 6 8 8 0 0 1-8 6 8 8 0 0 1-4-.9L4 19l1.9-3.1A8 8 0 0 1 4 6z"/><path d="M9 10l2 2 4-4"/></svg>';
            case 'tag':
                return '<svg viewBox="0 0 24 24"><path d="M4 7a3 3 0 0 1 3-3h6l7 7-7 7H7a3 3 0 0 1-3-3z"/><circle cx="10" cy="9" r="1.5"/></svg>';
            case 'sentiment':
                return '<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="8"/><circle cx="9" cy="10" r="1"/><circle cx="15" cy="10" r="1"/><path d="M9 15c1.5 1.2 4.5 1.2 6 0"/></svg>';
            case 'lock':
                return '<svg viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="10" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/><circle cx="12" cy="15" r="1.5"/></svg>';
            case 'gamepad':
                return '<svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="12" rx="5"/><path d="M7 12h4M9 10v4"/><circle cx="15" cy="11" r="1"/><circle cx="17" cy="13" r="1"/></svg>';
            case 'reaction':
                return '<svg viewBox="0 0 24 24"><circle cx="12" cy="13" r="8"/><path d="M12 9v5l3 2"/><path d="M10 2h4"/><path d="M12 2v2"/></svg>';
            default:
                return '';
        }
    }
}

if (!function_exists('renderToolsList')) {
    function renderToolsList($locale = 'en')
    {
        $data = getSharedToolListData();
        $categories = $data['categories'];
        $allTools = $data['tools'];

        $localeConfig = $data['locales'][$locale] ?? $data['locales']['en'];
        $directory = $localeConfig['directory'];
        $dir = $localeConfig['dir'];
        $localizedOverrides = $localeConfig['tools'];
        $categoryLabels = $localeConfig['category_labels'];

        // Build the visible tool list for this locale
        $tools = [];
        foreach ($allTools as $srcIndex => $tool) {
            $toolId = $tool['id'];

            // Skip if this tool is restricted to specific locales
            if (isset($tool['visible_locales']) && !in_array($locale, $tool['visible_locales'])) {
                continue;
            }

            // Resolve URL
            if ($locale === 'en') {
                $href = url($tool['routes']['en']);
            } else {
                if (!array_key_exists('localized', $tool['routes'])) {
                    continue; // no localized version exists
                }
                $slug = $tool['routes']['localized'];
                $href = ($slug === '')
                    ? url('languages/' . $directory . '/')
                    : url('languages/' . $directory . '/' . $slug);
            }

            // Resolve translated text
            $override = $localizedOverrides[$toolId] ?? [];
            $name = $override['name'] ?? $tool['name'];
            $description = $override['description'] ?? $tool['description'];
            $cta = ($locale === 'en')
                ? $tool['cta']
                : ($override['cta'] ?? $localeConfig['default_cta']);

            $tools[] = [
                '_src' => $srcIndex,
                'href' => $href,
                'category' => $tool['category'],
                'icon' => $tool['icon'],
                'name' => $name,
                'description' => $description,
                'cta' => $cta,
            ];
        }

        // Sort by category order, then by original source order within a category
        usort($tools, static function ($a, $b) use ($categories) {
            $ao = $categories[$a['category']]['order'] ?? 999;
            $bo = $categories[$b['category']]['order'] ?? 999;
            if ($ao !== $bo) {
                return $ao <=> $bo;
            }
            return ($a['_src'] ?? 0) <=> ($b['_src'] ?? 0);
        });

        // Build filter category list (preserves sorted order)
        $categoryCounts = [];
        $filterCategories = [];
        foreach ($tools as $tool) {
            $k = $tool['category'];
            if (!isset($categoryCounts[$k])) {
                $categoryCounts[$k] = 0;
                $filterCategories[$k] = $categories[$k];
                $filterCategories[$k]['label'] = $categoryLabels[$k] ?? ucfirst($k);
            }
            $categoryCounts[$k]++;
        }

        $title      = htmlspecialchars($localeConfig['title'],         ENT_QUOTES, 'UTF-8');
        $subtitle   = htmlspecialchars($localeConfig['subtitle'],      ENT_QUOTES, 'UTF-8');
        $note       = htmlspecialchars($localeConfig['note'],          ENT_QUOTES, 'UTF-8');
        $allLabel   = htmlspecialchars($localeConfig['all_label'],     ENT_QUOTES, 'UTF-8');
        $emptyMsg   = htmlspecialchars($localeConfig['empty_message'], ENT_QUOTES, 'UTF-8');
        $dirAttr    = ($dir === 'rtl') ? ' dir="rtl"' : '';
        $totalCount = count($tools);
        ?>
        <section
            class="tools-list-section tools-list-section--unified"
            id="tools"
            aria-labelledby="tools-hub-title"
            data-filterable="true"
            data-locale="<?php echo htmlspecialchars($locale, ENT_QUOTES, 'UTF-8'); ?>"
            <?php echo $dirAttr; ?>
        >
            <div class="container">
                <h2 id="tools-hub-title"><?php echo $title; ?></h2>
                <p class="section-subtitle"><?php echo $subtitle; ?></p>
                <p class="language-note"><?php echo $note; ?></p>

                <div class="tools-filter-bar" aria-label="<?php echo $allLabel; ?>">
                    <button type="button" class="tool-filter-button is-active" data-filter="all" aria-pressed="true">
                        <span class="tool-filter-label"><?php echo $allLabel; ?></span>
                        <span class="tool-filter-count"><?php echo $totalCount; ?></span>
                    </button>
                    <?php foreach ($filterCategories as $catKey => $catMeta): ?>
                        <button
                            type="button"
                            class="tool-filter-button"
                            data-filter="<?php echo htmlspecialchars($catKey, ENT_QUOTES, 'UTF-8'); ?>"
                            aria-pressed="false"
                            style="<?php echo htmlspecialchars(
                                '--tool-filter-accent:' . $catMeta['accent'] . ';' .
                                '--tool-filter-soft:'   . $catMeta['soft']   . ';' .
                                '--tool-filter-strong:' . $catMeta['strong'] . ';',
                                ENT_QUOTES, 'UTF-8'
                            ); ?>"
                        >
                            <span class="tool-filter-label"><?php echo htmlspecialchars($catMeta['label'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <span class="tool-filter-count"><?php echo $categoryCounts[$catKey]; ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>

                <div class="tools-grid">
                    <?php foreach ($tools as $index => $tool): ?>
                        <?php
                        $cat      = $categories[$tool['category']];
                        $catLabel = $filterCategories[$tool['category']]['label'] ?? ucfirst($tool['category']);
                        $number   = str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT);
                        $cardStyle = sprintf(
                            '--tool-accent:%1$s;--tool-accent-soft:%2$s;--tool-accent-strong:%3$s;',
                            $cat['accent'],
                            $cat['soft'],
                            $cat['strong']
                        );
                        ?>
                        <a
                            href="<?php echo $tool['href']; ?>"
                            class="tool-card tool-card--ranked"
                            data-category="<?php echo htmlspecialchars($tool['category'], ENT_QUOTES, 'UTF-8'); ?>"
                            style="<?php echo htmlspecialchars($cardStyle, ENT_QUOTES, 'UTF-8'); ?>"
                        >
                            <div class="tool-card-meta">
                                <span class="tool-card-category"><?php echo htmlspecialchars($catLabel, ENT_QUOTES, 'UTF-8'); ?></span>
                                <span class="tool-card-number" aria-hidden="true"><?php echo htmlspecialchars($number, ENT_QUOTES, 'UTF-8'); ?></span>
                            </div>
                            <div class="tool-card-icon" aria-hidden="true">
                                <?php echo renderToolsListIcon($tool['icon']); ?>
                            </div>
                            <span class="tool-name"><?php echo htmlspecialchars($tool['name'], ENT_QUOTES, 'UTF-8'); ?></span>
                            <p><?php echo htmlspecialchars($tool['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <span class="tool-card-link"><?php echo htmlspecialchars($tool['cta'], ENT_QUOTES, 'UTF-8'); ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
                <p class="tools-filter-empty" hidden><?php echo $emptyMsg; ?></p>
            </div>
        </section>
        <?php

        // Include styles once per page (static flag persists across calls in a request)
        static $stylesLoaded = false;
        if (!$stylesLoaded) {
            $stylesLoaded = true;
            include __DIR__ . '/tools-list-styles.php';
        }
        ?>
        <script>
        (function () {
            var sections = document.querySelectorAll('.tools-list-section--unified[data-filterable="true"]');
            if (!sections.length) { return; }

            sections.forEach(function (section) {
                var buttons    = section.querySelectorAll('.tool-filter-button');
                var cards      = section.querySelectorAll('.tool-card--ranked');
                var emptyState = section.querySelector('.tools-filter-empty');
                var activeFilter = 'all';

                function applyFilter(filterKey) {
                    if (filterKey === activeFilter) { return; }
                    activeFilter = filterKey;

                    var visibleCount = 0;

                    cards.forEach(function (card) {
                        var show = filterKey === 'all' || card.dataset.category === filterKey;

                        if (show) {
                            if (card.hasAttribute('hidden')) {
                                card.removeAttribute('hidden');
                                // Re-trigger entrance animation
                                card.style.animation = 'none';
                                void card.offsetWidth; // force reflow
                                card.style.animation = '';
                            }
                            visibleCount++;
                        } else {
                            card.setAttribute('hidden', '');
                        }
                    });

                    buttons.forEach(function (btn) {
                        var isActive = btn.dataset.filter === filterKey;
                        btn.classList.toggle('is-active', isActive);
                        btn.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                    });

                    if (emptyState) { emptyState.hidden = visibleCount !== 0; }
                }

                buttons.forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        applyFilter(btn.dataset.filter || 'all');
                    });
                });

                // Init: show all, no animation on page load flicker
                cards.forEach(function (card) { card.style.animation = 'none'; });
                void section.offsetWidth;
                cards.forEach(function (card) { card.style.animation = ''; });
                activeFilter = ''; // reset so first applyFilter('all') runs
                applyFilter('all');
            });
        })();
        </script>
        <?php
    }
}
