<?php
/**
 * Breadcrumbs Component for SEO
 * Displays navigation path for better UX and SEO
 */

$breadcrumbs = $breadcrumbs ?? [];

if (!empty($breadcrumbs)):
$breadcrumbItems = [
    [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Home',
        'item' => function_exists('absoluteUrl') ? absoluteUrl('') : ($baseUrl ?? '/'),
    ],
];

foreach ($breadcrumbs as $index => $crumb) {
    $item = [
        '@type' => 'ListItem',
        'position' => $index + 2,
        'name' => (string) ($crumb['label'] ?? ''),
    ];

    if (!empty($crumb['url'])) {
        $url = (string) $crumb['url'];
        $item['item'] = preg_match('~^https?://~i', $url)
            ? $url
            : (function_exists('absoluteUrl') ? absoluteUrl(ltrim($url, '/')) : $url);
    }

    $breadcrumbItems[] = $item;
}
?>

<script type="application/ld+json"><?php echo json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => $breadcrumbItems,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>

<!-- Visible breadcrumb trail. Structured data is emitted as JSON-LD above (single source of truth — no microdata, to avoid duplicate BreadcrumbList). -->
<nav class="breadcrumbs" aria-label="Breadcrumb">
    <div class="container">
        <a href="<?php echo $baseUrl; ?>">Home</a>

        <?php foreach ($breadcrumbs as $index => $crumb): ?>
            <span class="separator">›</span>
            <?php if (!empty($crumb['url'])): ?>
                <a href="<?php echo $crumb['url']; ?>"><?php echo $crumb['label']; ?></a>
            <?php else: ?>
                <span><?php echo $crumb['label']; ?></span>
            <?php endif; ?>
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
