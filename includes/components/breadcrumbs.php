<?php
/**
 * Breadcrumbs Component for SEO
 * Displays navigation path for better UX and SEO
 */

$breadcrumbs = $breadcrumbs ?? [];

if (!empty($breadcrumbs)):
?>

<nav class="breadcrumbs" aria-label="Breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <div class="container">
        <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="<?php echo $baseUrl; ?>" itemprop="item">
                <span itemprop="name">Home</span>
            </a>
            <meta itemprop="position" content="1">
        </span>

        <?php foreach ($breadcrumbs as $index => $crumb): ?>
            <span class="separator">›</span>
            <span itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <?php if (!empty($crumb['url'])): ?>
                    <a href="<?php echo $crumb['url']; ?>" itemprop="item">
                        <span itemprop="name"><?php echo $crumb['label']; ?></span>
                    </a>
                <?php else: ?>
                    <span itemprop="name"><?php echo $crumb['label']; ?></span>
                <?php endif; ?>
                <meta itemprop="position" content="<?php echo $index + 2; ?>">
            </span>
        <?php endforeach; ?>
    </div>
</nav>

<style>
.breadcrumbs {
    padding: 20px 0;
    background: var(--surface);
    border-bottom: 1px solid var(--border);
}

.breadcrumbs .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
    font-size: 0.95rem;
}

.breadcrumbs a {
    color: var(--accent-primary);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumbs a:hover {
    color: var(--accent-secondary);
    text-decoration: underline;
}

.breadcrumbs .separator {
    color: var(--text-muted);
    margin: 0 4px;
}

.breadcrumbs span {
    color: var(--text-secondary);
}

@media (max-width: 768px) {
    .breadcrumbs .container {
        font-size: 0.85rem;
    }
}
</style>

<?php endif; ?>
