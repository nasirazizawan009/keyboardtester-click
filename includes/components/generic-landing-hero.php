<?php
if (empty($heroData) || !is_array($heroData)) {
    return;
}
?>
<section class="landing-hero">
    <div class="container landing-hero-grid">
        <div class="hero-copy">
            <p class="hero-kicker"><?php echo htmlspecialchars($heroData['kicker'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            <h1 class="hero-title"><?php echo htmlspecialchars($heroData['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h1>
            <p class="hero-lede"><?php echo htmlspecialchars($heroData['lede'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
            <div class="hero-actions">
                <a class="landing-btn landing-btn-primary" href="<?php echo htmlspecialchars($heroData['primaryHref'] ?? '#tool-stage', ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($heroData['primaryLabel'] ?? 'Open tool', ENT_QUOTES, 'UTF-8'); ?>
                </a>
                <a class="landing-btn landing-btn-ghost" href="<?php echo htmlspecialchars($heroData['secondaryHref'] ?? '#tools', ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($heroData['secondaryLabel'] ?? 'Browse all tools', ENT_QUOTES, 'UTF-8'); ?>
                </a>
            </div>
            <?php if (!empty($heroData['badges'])): ?>
                <div class="hero-badges">
                    <?php foreach ($heroData['badges'] as $badge): ?>
                        <span class="hero-badge"><?php echo htmlspecialchars($badge, ENT_QUOTES, 'UTF-8'); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($heroData['metrics'])): ?>
                <div class="hero-metrics">
                    <?php foreach ($heroData['metrics'] as $metric): ?>
                        <div class="metric-card">
                            <span class="metric-value"><?php echo htmlspecialchars($metric['value'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                            <span class="metric-label"><?php echo htmlspecialchars($metric['label'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="hero-visual">
            <div class="hero-shot">
                <img src="<?php echo url($heroData['image'] ?? 'images/shared/keyboard-and-mouse.png'); ?>" alt="<?php echo htmlspecialchars($heroData['imageAlt'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" loading="eager">
            </div>
            <?php if (!empty($heroData['miniCards'])): ?>
                <div class="hero-stack">
                    <?php foreach ($heroData['miniCards'] as $card): ?>
                        <div class="mini-card">
                            <div class="mini-title"><?php echo htmlspecialchars($card['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></div>
                            <p><?php echo htmlspecialchars($card['text'] ?? '', ENT_QUOTES, 'UTF-8'); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

