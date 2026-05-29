<?php
if (empty($intentPage) || !is_array($intentPage)) {
    throw new RuntimeException('Intent page configuration is required.');
}

include __DIR__ . '/../config.php';

require_once __DIR__ . '/components/adsense-slot.php';
require_once __DIR__ . '/components/microsoft-store-badge.php';
require_once __DIR__ . '/components/tool-page-context.php';
require_once __DIR__ . '/components/tool-popular-tools.php';

$GLOBALS['kbtTemplateFunctionsOnly'] = true;
require_once __DIR__ . '/render-english-tool-page.php';
unset($GLOBALS['kbtTemplateFunctionsOnly']);

if (!function_exists('kbtIntentTemplateContextId')) {
    function kbtIntentTemplateContextId($intentPage)
    {
        $aliases = [
            'keyboard' => 'keyboard-home',
            'mouse' => 'mouse-test',
            'screen' => 'screen-test',
            'display' => 'screen-test',
            'camera' => 'webcam-test',
            'webcam' => 'webcam-test',
            'mic' => 'mic-test',
            'microphone' => 'mic-test',
            'audio' => 'headphone-test',
            'ocr' => 'ocr-tool',
            'qr' => 'qr-reader',
        ];

        foreach (['currentTool', 'clusterTool'] as $key) {
            $value = (string) ($intentPage[$key] ?? '');
            if ($value === '') {
                continue;
            }
            return $aliases[$value] ?? $value;
        }

        return null;
    }
}

if (!function_exists('kbtIntentTemplateTitleLine')) {
    function kbtIntentTemplateTitleLine($title)
    {
        $title = trim((string) $title);
        $title = preg_replace('/^free\s+open\s+source\s+/i', '', $title);
        $title = preg_replace('/^free\s+online\s+/i', '', $title);
        $title = preg_replace('/^free\s+/i', '', $title);
        return trim($title) ?: 'Online Tool';
    }
}

$pageTitle = $intentPage['meta']['title'] ?? '';
$pageDescription = $intentPage['meta']['description'] ?? '';
$pageKeywords = $intentPage['meta']['keywords'] ?? '';
$pageOgImage = $intentPage['meta']['ogImage'] ?? 'images/shared/keyboard-and-mouse.png';
$pageOgImageAlt = $intentPage['meta']['ogImageAlt'] ?? $pageTitle;
$pageCanonical = $intentPage['meta']['canonical'] ?? null;

$hero = $intentPage['hero'] ?? [];
$toolSection = $intentPage['toolSection'] ?? [];
$contextId = kbtIntentTemplateContextId($intentPage);
$intentContext = $contextId ? kbtGetEnglishToolPageContext($contextId) : null;
$tool = $intentContext['tool'] ?? [];
$pool = kbtGetEnglishToolPagePool();
$category = $tool['category'] ?? ($intentPage['clusterTool'] ?? 'keyboard');
$categoryAliases = [
    'screen' => 'display',
    'webcam' => 'camera',
    'mic' => 'audio',
    'ocr' => 'utility',
    'qr-reader' => 'utility',
];
$category = $categoryAliases[$category] ?? $category;
$categoryLabel = $tool['category_label'] ?? ($pool['category_labels'][$category] ?? ucfirst((string) $category));

$heroTitle = $hero['title'] ?? ($toolSection['title'] ?? $pageTitle);
$heroTitleLine = kbtIntentTemplateTitleLine($heroTitle);
$heroLede = $hero['lede'] ?? ($toolSection['lede'] ?? $pageDescription);
$heroImage = $hero['image'] ?? $pageOgImage;
$heroAlt = $hero['imageAlt'] ?? $pageOgImageAlt;
$stageId = $intentPage['toolStageId'] ?? 'tool-stage';
$shellId = $intentPage['toolShellId'] ?? 'tool-shell';
$toolTitle = $toolSection['title'] ?? $heroTitleLine;
$toolLede = $toolSection['lede'] ?? $heroLede;
$schemaKey = $intentPage['schemaKey'] ?? '';
$seoContentInclude = $intentPage['seoContentInclude'] ?? '';

if (!$intentContext) {
    $intentContext = [
        'tool' => [
            'id' => $contextId ?: 'intent-tool',
            'name' => $toolTitle,
            'description' => $toolLede,
            'category' => $category,
            'category_label' => $categoryLabel,
        ],
        'tools' => $pool['tools'] ?? [],
        'categories' => $pool['categories'] ?? [],
        'category_labels' => $pool['category_labels'] ?? [],
    ];
}

$GLOBALS['kbtSuppressFooterAd'] = true;
$GLOBALS['__kbtToolPopularToolsRendered'] = false;
$GLOBALS['__kbtToolBlogPostsRendered'] = false;

// Match FAQPage schema to the fully-rendered legacy article's own FAQ (see render-english-tool-page.php).
$__kbtIntentSeoFaqs = function_exists('kbtSeoContentFaqs') ? kbtSeoContentFaqs($seoContentInclude) : null;
if ($__kbtIntentSeoFaqs !== null) {
    $GLOBALS['kbtFaqSchemaOverride'] = $__kbtIntentSeoFaqs;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/seo-meta.php'; ?>
    <link rel="icon" type="image/x-icon" href="<?php echo url('navigation.png'); ?>">
    <?php
    $loadBootstrapCss = $loadBootstrapCss ?? false;
    $loadBootstrapJs = $loadBootstrapJs ?? false;
    $loadMobileToolAdapters = $loadMobileToolAdapters ?? false;
    $loadInterFont = $loadInterFont ?? false;
    include __DIR__ . '/head-common.php';
    $imv = filemtime(__DIR__ . '/../assets/css/index-modern.min.css');
    ?>
    <link rel="preload" as="style" href="<?php echo url('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.min.css') . '?v=' . $imv; ?>">

    <?php
    include_once __DIR__ . '/schema.php';
    echo generateToolPageSchema($schemaKey, $intentPage['breadcrumbs'] ?? null);
    ?>
</head>
<body class="landing-page home-redesign">
<?php include __DIR__ . '/../header.php'; ?>

<main id="main-content" class="landing-main">
    <section class="landing-hero home-hero tool-template-hero">
        <div class="home-banner">
            <?php if ($heroImage): ?>
                <picture class="home-banner-media">
                    <?php kbtResponsivePictureSources($heroImage, '100vw'); ?>
                    <img src="<?php echo htmlspecialchars(url($heroImage), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($heroAlt, ENT_QUOTES, 'UTF-8'); ?>" width="1400" height="788" loading="eager" fetchpriority="high" decoding="async"<?php echo kbtResponsiveImgSrcsetAttributes($heroImage, '100vw'); ?>>
                </picture>
            <?php endif; ?>
            <div class="home-banner-content">
                <div class="home-banner-copy">
                    <p class="hero-kicker">KeyboardTester.click</p>
                    <h1 class="hero-title"><span class="hero-title-line">Free</span> <span class="hero-title-line"><?php echo htmlspecialchars($heroTitleLine, ENT_QUOTES, 'UTF-8'); ?></span></h1>
                    <p class="hero-lede"><?php echo htmlspecialchars($heroLede, ENT_QUOTES, 'UTF-8'); ?></p>
                    <div class="hero-actions">
                        <a class="landing-btn landing-btn-primary" href="#<?php echo htmlspecialchars($stageId, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($hero['primaryLabel'] ?? 'Start test', ENT_QUOTES, 'UTF-8'); ?></a>
                        <a class="landing-btn landing-btn-ghost" href="<?php echo htmlspecialchars(kbtTemplateCategoryHref($category), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($categoryLabel, ENT_QUOTES, 'UTF-8'); ?> tools <span class="btn-caret" aria-hidden="true">&gt;</span></a>
                    </div>
                </div>
            </div>
            <div class="home-hero-store-button">
                <?php kbtRenderMicrosoftStoreBadge(['class' => 'home-hero-store-badge', 'priority' => true]); ?>
            </div>
            <?php
            kbtRenderAdSlot('home_hero_banner', [
                'class' => 'kbt-ad-slot--home-hero-banner',
                'format' => 'horizontal',
                'aria_label' => 'Sponsored hero banner',
            ]);
            ?>
        </div>
    </section>

    <?php include __DIR__ . '/components/home-category-band.php'; ?>

    <section class="tool-stage tool-template-stage" id="<?php echo htmlspecialchars($stageId, ENT_QUOTES, 'UTF-8'); ?>" data-header-hide-stage aria-label="<?php echo htmlspecialchars($toolTitle, ENT_QUOTES, 'UTF-8'); ?> workspace">
        <section id="<?php echo htmlspecialchars($shellId, ENT_QUOTES, 'UTF-8'); ?>" class="tool-shell">
            <div class="tool-template-inline-head">
                <h2 id="tool-stage-title"><?php echo htmlspecialchars($toolTitle, ENT_QUOTES, 'UTF-8'); ?></h2>
                <p><?php echo htmlspecialchars($toolLede, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <?php
            if (!empty($intentPage['toolIncludeVars']) && is_array($intentPage['toolIncludeVars'])) {
                foreach ($intentPage['toolIncludeVars'] as $__toolVarKey => $__toolVarValue) {
                    ${$__toolVarKey} = $__toolVarValue;
                }
                unset($__toolVarKey, $__toolVarValue);
            }
            include __DIR__ . '/../' . ltrim($intentPage['toolInclude'], '/');
            ?>
        </section>
    </section>

    <section class="home-after-tool-banner" aria-label="Sponsored placement">
        <?php
        kbtRenderAdSlot('home_after_tool_banner', [
            'class' => 'kbt-ad-slot--after-tool-banner',
            'format' => 'auto',
            'aria_label' => 'Sponsored placement',
            'min_width' => 769,
        ]);
        ?>
    </section>

    <?php
    if (!kbtRenderToolPopularToolsIfEnglish(['currentToolId' => $contextId])) {
        include __DIR__ . '/components/tools-list.php';
    }
    ?>

    <div class="home-rails-region">
        <aside class="home-rails-side home-rails-side--left" aria-hidden="true">
            <div class="home-rails-side__sticky">
                <?php kbtRenderAdSlot('home_guidelines_left_rail', ['class' => 'kbt-ad-slot--home-guideline-rail kbt-ad-slot--home-guideline-left', 'format' => 'auto', 'aria_label' => 'Sponsored guide placement', 'min_width' => 1281]); ?>
            </div>
        </aside>
        <aside class="home-rails-side home-rails-side--right" aria-hidden="true">
            <div class="home-rails-side__sticky">
                <?php kbtRenderAdSlot('home_guidelines_right_rail', ['class' => 'kbt-ad-slot--home-guideline-rail kbt-ad-slot--home-guideline-right', 'format' => 'auto', 'aria_label' => 'Sponsored FAQ placement', 'min_width' => 1281]); ?>
            </div>
        </aside>

        <?php kbtRenderTemplateGuideFaq($intentContext, $seoContentInclude, $schemaKey); ?>
        <?php if (!empty($intentPage['relatedBlog'])) { $toolBlogSlug = $intentPage['relatedBlog']; } include __DIR__ . '/components/tool-blog-cta.php'; unset($toolBlogSlug); ?>
        <?php kbtRenderMicrosoftStoreSitewideBanner($siteChromeLocale ?? 'en'); ?>
        <?php $GLOBALS['kbtSuppressMicrosoftStoreBanner'] = true; ?>
    </div>
</main>

<?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
