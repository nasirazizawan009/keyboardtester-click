<?php
if (empty($localizedIntentLanguage) || empty($localizedIntentSlug)) {
    throw new RuntimeException('Localized intent language and slug are required.');
}

require_once __DIR__ . '/localized-intent-pages.php';

$languageConfig = getLocalizedIntentLanguageConfig($localizedIntentLanguage);
$pageConfig = getLocalizedIntentPage($localizedIntentLanguage, $localizedIntentSlug);

if (!$languageConfig || !$pageConfig) {
    throw new RuntimeException('Localized intent page configuration not found.');
}

include_once __DIR__ . '/../config.php';
include_once __DIR__ . '/../' . $languageConfig['configInclude'];

$pageTitle = $pageConfig['meta']['title'] ?? '';
$pageDescription = $pageConfig['meta']['description'] ?? '';
$pageKeywords = $pageConfig['meta']['keywords'] ?? '';
$pageOgImage = $pageConfig['meta']['ogImage'] ?? 'images/shared/keyboard-and-mouse.png';
$pageOgImageAlt = $pageConfig['hero']['title'] ?? $pageTitle;
$pageOgLocale = $languageConfig['ogLocale'] ?? null;
$pageCanonical = absoluteUrl($pageConfig['path']);
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($languageConfig['htmlLang'], ENT_QUOTES, 'UTF-8'); ?>"<?php if (($languageConfig['dir'] ?? 'ltr') === 'rtl') echo ' dir="rtl"'; ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/seo-meta.php'; ?>

    <link rel="alternate" hreflang="en" href="<?php echo htmlspecialchars(absoluteUrl($pageConfig['englishPath']), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="alternate" hreflang="<?php echo htmlspecialchars($languageConfig['hreflang'], ENT_QUOTES, 'UTF-8'); ?>" href="<?php echo htmlspecialchars(absoluteUrl($pageConfig['path']), ENT_QUOTES, 'UTF-8'); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars(absoluteUrl($pageConfig['englishPath']), ENT_QUOTES, 'UTF-8'); ?>">

    <?php include __DIR__ . '/head-common.php'; ?>

    <?php if (!empty($languageConfig['fontHref'])): ?>
        <link href="<?php echo htmlspecialchars($languageConfig['fontHref'], ENT_QUOTES, 'UTF-8'); ?>" rel="stylesheet">
    <?php endif; ?>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

    <style>
    <?php if (!empty($languageConfig['bodyFontFamily'])): ?>
    body { font-family: <?php echo $languageConfig['bodyFontFamily']; ?>; }
    <?php endif; ?>
    <?php if (($languageConfig['dir'] ?? 'ltr') === 'rtl'): ?>
    body { font-family: 'Tajawal', 'Inter', -apple-system, sans-serif; }
    .site-header, .site-footer { direction: ltr; text-align: left; }
    .arabic-page { direction: rtl; text-align: right; }
    .arabic-page .tools-list-section { direction: rtl; text-align: right; }
    .arabic-page .tools-list-section h2,
    .arabic-page .tools-list-section .section-subtitle,
    .arabic-page .tools-list-section .language-note { text-align: right; }
    <?php endif; ?>
    </style>

    <?php
    include_once __DIR__ . '/schema.php';
    echo schemaOrganization();
    if (!empty($pageConfig['schema'])) {
        echo schemaWebApplication($pageConfig['schema']);
    }
    if (!empty($pageConfig['breadcrumbs'])) {
        echo schemaBreadcrumbs($pageConfig['breadcrumbs']);
    }
    ?>
</head>
<body class="landing-page">
<?php include __DIR__ . '/../' . $languageConfig['headerInclude']; ?>

<main id="main-content" class="<?php echo htmlspecialchars($languageConfig['mainClass'], ENT_QUOTES, 'UTF-8'); ?>">
    <section class="hero" aria-labelledby="hero-title">
        <div class="container hero-grid">
            <div class="hero-content">
                <h1 id="hero-title"><?php echo htmlspecialchars($pageConfig['hero']['title'], ENT_QUOTES, 'UTF-8'); ?></h1>
                <p class="hero-lede"><?php echo htmlspecialchars($pageConfig['hero']['lede'], ENT_QUOTES, 'UTF-8'); ?></p>
                <div class="hero-ctas">
                    <a href="#<?php echo htmlspecialchars($pageConfig['toolAnchor'], ENT_QUOTES, 'UTF-8'); ?>" class="landing-btn landing-btn-primary"><?php echo htmlspecialchars($pageConfig['hero']['primaryCta'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <a href="#guidelines" class="landing-btn landing-btn-ghost"><?php echo htmlspecialchars($pageConfig['hero']['secondaryCta'], ENT_QUOTES, 'UTF-8'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="tool-stage" aria-labelledby="tool-stage-title">
        <div class="container tool-stage-header">
            <div>
                <p class="section-kicker"><?php echo htmlspecialchars($pageConfig['toolSection']['kicker'], ENT_QUOTES, 'UTF-8'); ?></p>
                <h2 id="tool-stage-title"><?php echo htmlspecialchars($pageConfig['toolSection']['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <p class="section-lede"><?php echo htmlspecialchars($pageConfig['toolSection']['lede'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>
        <section id="<?php echo htmlspecialchars($pageConfig['toolAnchor'], ENT_QUOTES, 'UTF-8'); ?>" class="tool-shell">
            <?php include __DIR__ . '/../' . $pageConfig['toolInclude']; ?>
        </section>
    </section>

    <section class="trust-strip" aria-label="Key benefits">
        <div class="container trust-grid">
            <?php foreach ($pageConfig['trustItems'] as $item): ?>
                <div class="trust-item">
                    <div class="trust-title"><?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                    <div class="trust-desc"><?php echo htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8'); ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php
    $localizedClusterLanguage = $localizedIntentLanguage;
    $localizedClusterKey = $pageConfig['cluster'];
    $localizedClusterCurrent = $localizedIntentSlug;
    include __DIR__ . '/components/localized-intent-links.php';
    ?>

    <?php $currentTool = $localizedIntentSlug; include __DIR__ . '/../' . $languageConfig['toolsListInclude']; ?>

    <section id="guidelines" class="guidelines-section">
        <div class="container">
            <div class="section-head">
                <p class="section-kicker"><?php echo htmlspecialchars($pageConfig['guide']['kicker'], ENT_QUOTES, 'UTF-8'); ?></p>
                <h2><?php echo htmlspecialchars($pageConfig['guide']['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
            </div>
            <div class="guidelines-grid">
                <?php foreach ($pageConfig['guide']['steps'] as $step): ?>
                    <div class="guideline-card">
                        <h3><?php echo htmlspecialchars($step['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <p><?php echo htmlspecialchars($step['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../' . $languageConfig['footerInclude']; ?>
</body>
</html>
