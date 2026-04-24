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
require_once __DIR__ . '/../tool-icons.php';

if (!function_exists('url')) {
    require_once __DIR__ . '/../../config.php';
}

if (!function_exists('renderToolsListIcon')) {
    /**
     * Render a tool card icon by slug. Delegates to the shared Lucide icon
     * library (includes/tool-icons.php) — same set used by the all-tools pages.
     * @param string $iconKey    Icon slug (keyboard, mouse, gauge, sparkles, …)
     * @param string|null $catId Optional category ID as fallback (audio → headphones, utility → wrench, etc.)
     */
    function renderToolsListIcon($iconKey, $catId = null)
    {
        return kbtRenderToolIcon($iconKey, $catId);
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
                                <?php echo renderToolsListIcon($tool['icon'], $tool['category']); ?>
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
