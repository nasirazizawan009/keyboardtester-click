<?php
if (empty($intentPage) || !is_array($intentPage)) {
    throw new RuntimeException('Intent page configuration is required.');
}

include __DIR__ . '/../config.php';

$pageTitle = $intentPage['meta']['title'] ?? '';
$pageDescription = $intentPage['meta']['description'] ?? '';
$pageKeywords = $intentPage['meta']['keywords'] ?? '';
$pageOgImage = $intentPage['meta']['ogImage'] ?? 'images/shared/keyboard-and-mouse.png';
$pageOgImageAlt = $intentPage['meta']['ogImageAlt'] ?? $pageTitle;
$pageCanonical = $intentPage['meta']['canonical'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/seo-meta.php'; ?>
    <?php include __DIR__ . '/head-common.php'; ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&family=Space+Grotesk:wght@400;500;600;700&display=optional"></noscript>
    <link rel="stylesheet" href="<?php echo url('assets/css/index-modern.css'); ?>">

    <?php
    include_once __DIR__ . '/schema.php';
    echo generateToolPageSchema($intentPage['schemaKey'], $intentPage['breadcrumbs'] ?? null);
    ?>
</head>
<body class="landing-page">
<?php include __DIR__ . '/../header.php'; ?>

<main id="main-content" class="landing-main">
    <?php $heroData = $intentPage['hero']; include __DIR__ . '/components/generic-landing-hero.php'; ?>

    <section class="tool-stage" id="<?php echo htmlspecialchars($intentPage['toolStageId'], ENT_QUOTES, 'UTF-8'); ?>" aria-labelledby="tool-stage-title">
        <div class="container tool-stage-header">
            <div>
                <p class="section-kicker"><?php echo htmlspecialchars($intentPage['toolSection']['kicker'], ENT_QUOTES, 'UTF-8'); ?></p>
                <h2 id="tool-stage-title"><?php echo htmlspecialchars($intentPage['toolSection']['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <p class="section-lede"><?php echo htmlspecialchars($intentPage['toolSection']['lede'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="tool-stage-actions">
                <a class="landing-btn landing-btn-ghost" href="#seo-content">Read the guide</a>
            </div>
        </div>
        <section id="<?php echo htmlspecialchars($intentPage['toolShellId'], ENT_QUOTES, 'UTF-8'); ?>" class="tool-shell">
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

    <?php if (!empty($intentPage['trustItems'])): ?>
        <section class="trust-strip" aria-label="Key benefits">
            <div class="container trust-grid">
                <?php foreach ($intentPage['trustItems'] as $item): ?>
                    <div class="trust-item">
                        <div class="trust-title"><?php echo htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8'); ?></div>
                        <div class="trust-desc"><?php echo htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8'); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($intentPage['featureSection'])): ?>
        <section class="feature-band" aria-labelledby="feature-title">
            <div class="container">
                <div class="section-head">
                    <p class="section-kicker"><?php echo htmlspecialchars($intentPage['featureSection']['kicker'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <h2 id="feature-title"><?php echo htmlspecialchars($intentPage['featureSection']['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p class="section-lede"><?php echo htmlspecialchars($intentPage['featureSection']['lede'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="landing-feature-grid">
                    <?php foreach ($intentPage['featureSection']['cards'] as $card): ?>
                        <article class="landing-feature-card">
                            <h3><?php echo htmlspecialchars($card['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            <p><?php echo htmlspecialchars($card['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if (!empty($intentPage['processSection'])): ?>
        <section class="process-band" aria-labelledby="process-title">
            <div class="container">
                <div class="section-head split">
                    <div>
                        <p class="section-kicker"><?php echo htmlspecialchars($intentPage['processSection']['kicker'], ENT_QUOTES, 'UTF-8'); ?></p>
                        <h2 id="process-title"><?php echo htmlspecialchars($intentPage['processSection']['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    </div>
                    <p class="section-lede"><?php echo htmlspecialchars($intentPage['processSection']['lede'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
                <div class="process-grid">
                    <?php foreach ($intentPage['processSection']['steps'] as $index => $step): ?>
                        <article class="process-card">
                            <div class="process-media">
                                <img src="<?php echo url($step['image']); ?>" alt="<?php echo htmlspecialchars($step['alt'], ENT_QUOTES, 'UTF-8'); ?>" loading="lazy">
                            </div>
                            <div class="process-body">
                                <div class="step-number"><?php echo str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></div>
                                <h3><?php echo htmlspecialchars($step['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                <p><?php echo htmlspecialchars($step['text'], ENT_QUOTES, 'UTF-8'); ?></p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php
    $intentClusterTool = $intentPage['clusterTool'] ?? null;
    $currentTool = $intentPage['currentTool'] ?? null;
    include __DIR__ . '/components/intent-cluster-links.php';
    ?>

    <?php include __DIR__ . '/components/tools-list.php'; ?>
    <?php if (!empty($intentPage['seoContentInclude'])) include __DIR__ . '/../' . ltrim($intentPage['seoContentInclude'], '/'); ?>
    <?php if (!empty($intentPage['currentTool'])) include __DIR__ . '/related-tools.php'; ?>
    <?php if (!empty($intentPage['helpInclude'])) include __DIR__ . '/../' . ltrim($intentPage['helpInclude'], '/'); ?>
</main>

<?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
