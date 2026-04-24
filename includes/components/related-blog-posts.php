<?php
/**
 * Related blog posts component.
 * Expects $currentBlogSlug (filename only, e.g. 'ghost-click-detector-fix-double-clicking.php').
 * Renders 3 other posts as cards with images. Pool = posts-data.php minus current.
 * Selection order: same-topic-ish keyword matches first, then fills with most-recent.
 */
if (empty($currentBlogSlug)) { return; }

$__postsDataPath = __DIR__ . '/../../blog/posts-data.php';
if (!file_exists($__postsDataPath)) { return; }

$__allPosts = include $__postsDataPath;

// Find the current post to extract keyword context
$__currentPost = null;
$__candidates = [];
foreach ($__allPosts as $__p) {
    if (empty($__p['path'])) { continue; }
    $__slug = basename($__p['path']);
    if ($__slug === $currentBlogSlug) {
        $__currentPost = $__p;
    } else {
        $__candidates[] = $__p;
    }
}
if (!$__currentPost || empty($__candidates)) { return; }

// Simple relevance scoring: count shared keywords from current title in candidate titles
$__stopwords = ['the','a','an','to','of','and','or','for','in','on','how','why','your','my','is','are','with','from','vs'];
$__currentWords = preg_split('/[^a-z0-9]+/i', strtolower($__currentPost['title'] ?? ''));
$__currentWords = array_values(array_filter($__currentWords, function($w) use ($__stopwords) {
    return $w !== '' && strlen($w) > 2 && !in_array($w, $__stopwords, true);
}));

foreach ($__candidates as &$__c) {
    $__cwords = preg_split('/[^a-z0-9]+/i', strtolower($__c['title'] ?? ''));
    $__c['__score'] = count(array_intersect($__currentWords, $__cwords));
}
unset($__c);

// Sort: relevance desc, then by natural order (which is newest-first in posts-data.php)
$__indexed = [];
foreach ($__candidates as $__i => $__c) { $__indexed[] = ['i' => $__i, 'post' => $__c]; }
usort($__indexed, function($a, $b) {
    if ($a['post']['__score'] !== $b['post']['__score']) {
        return $b['post']['__score'] <=> $a['post']['__score'];
    }
    return $a['i'] <=> $b['i'];
});

$__related = array_slice(array_map(function($x) { return $x['post']; }, $__indexed), 0, 3);
if (count($__related) < 1) { return; }
?>
<section class="related-posts" aria-labelledby="related-posts-heading">
    <h2 id="related-posts-heading" class="related-posts-heading">You might also like</h2>
    <div class="related-posts-grid">
        <?php foreach ($__related as $__rp):
            $__rpUrl = $__rp['url'] ?? ('/' . ltrim($__rp['path'] ?? '', '/'));
            $__rpImg = !empty($__rp['image']) ? url($__rp['image']) : '';
            $__rpAlt = $__rp['alt'] ?? ($__rp['title'] ?? '');
            $__rpTitle = $__rp['title'] ?? '';
            $__rpDate = $__rp['date'] ?? '';
            $__rpExcerpt = $__rp['excerpt'] ?? '';
        ?>
            <a class="related-card" href="<?php echo htmlspecialchars($__rpUrl, ENT_QUOTES, 'UTF-8'); ?>">
                <?php if ($__rpImg): ?>
                    <img class="related-card-img" src="<?php echo htmlspecialchars($__rpImg, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($__rpAlt, ENT_QUOTES, 'UTF-8'); ?>" loading="lazy" decoding="async">
                <?php else: ?>
                    <div class="related-card-img-placeholder" aria-hidden="true">&#9654;</div>
                <?php endif; ?>
                <div class="related-card-body">
                    <?php if ($__rpDate): ?><span class="related-card-date"><?php echo htmlspecialchars($__rpDate, ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
                    <h3 class="related-card-title"><?php echo htmlspecialchars($__rpTitle, ENT_QUOTES, 'UTF-8'); ?></h3>
                    <?php if ($__rpExcerpt): ?>
                        <p class="related-card-excerpt"><?php echo htmlspecialchars(mb_strimwidth($__rpExcerpt, 0, 130, '…'), ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endif; ?>
                    <span class="related-card-cta">Read article &rarr;</span>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</section>
<style>
    .related-posts { max-width: 1100px; margin: 3rem auto 0; padding: 2rem 1.25rem 0; border-top: 1px solid var(--border-color, #e2e8f0); }
    .related-posts-heading { font-size: 1.35rem; font-weight: 700; color: var(--text-color); margin: 0 0 1.25rem; }
    .related-posts-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; }
    @media (max-width: 860px) { .related-posts-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 560px) { .related-posts-grid { grid-template-columns: 1fr; } }
    .related-card { display: flex; flex-direction: column; background: var(--surface, #ffffff); border: 1px solid var(--border-color, #e2e8f0); border-radius: 12px; overflow: hidden; text-decoration: none; color: inherit; transition: transform 0.18s ease, box-shadow 0.18s ease; }
    .related-card:hover { transform: translateY(-3px); box-shadow: 0 8px 22px rgba(0,0,0,0.08); }
    .related-card-img { width: 100%; aspect-ratio: 16 / 9; object-fit: cover; display: block; background: var(--border-color, #e2e8f0); }
    .related-card-img-placeholder { width: 100%; aspect-ratio: 16 / 9; background: var(--border-color, #e2e8f0); display: flex; align-items: center; justify-content: center; color: var(--text-muted, #94a3b8); font-size: 1.5rem; }
    .related-card-body { padding: 0.9rem 1rem 1.1rem; display: flex; flex-direction: column; gap: 0.35rem; flex: 1; }
    .related-card-date { font-size: 0.72rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted, #64748b); }
    .related-card-title { font-size: 0.98rem; font-weight: 700; line-height: 1.4; color: var(--text-color); margin: 0; }
    .related-card-excerpt { font-size: 0.85rem; line-height: 1.55; color: var(--text-muted, #64748b); margin: 0; flex: 1; }
    .related-card-cta { font-size: 0.82rem; font-weight: 600; color: var(--primary-color, #1e40af); margin-top: 0.35rem; }
</style>
<?php
unset($__allPosts, $__currentPost, $__candidates, $__indexed, $__related);
?>
