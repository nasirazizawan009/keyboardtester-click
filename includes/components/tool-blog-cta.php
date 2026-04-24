<?php
/**
 * Tool → Blog CTA component.
 * Expects $toolBlogSlug (filename only, e.g. 'ghost-click-detector-fix-double-clicking.php').
 * Silently renders nothing if the slug is missing from blog/posts-data.php.
 */
if (empty($toolBlogSlug)) { return; }

$__postsDataPath = __DIR__ . '/../../blog/posts-data.php';
if (!file_exists($__postsDataPath)) { return; }
$__postsData = include $__postsDataPath;
$__toolBlog = null;
foreach ($__postsData as $__p) {
    if (!empty($__p['path']) && basename($__p['path']) === $toolBlogSlug) {
        $__toolBlog = $__p;
        break;
    }
}
if (!$__toolBlog) { return; }

$__blogUrl = $__toolBlog['url'] ?? ('/' . ltrim($__toolBlog['path'], '/'));
?>
<section class="tool-blog-cta" aria-label="Related blog guide" style="padding:2.5rem 1rem;">
    <div style="max-width:900px;margin:0 auto;">
        <a class="tool-blog-cta-card" href="<?php echo htmlspecialchars($__blogUrl, ENT_QUOTES, 'UTF-8'); ?>" style="display:block;padding:1.5rem 1.75rem;border-radius:14px;background:var(--surface,#ffffff);border:1px solid var(--border-color,#e2e8f0);text-decoration:none;color:var(--text-color,#1e293b);transition:transform 0.18s ease, box-shadow 0.18s ease;">
            <div style="display:flex;align-items:center;gap:0.4rem;font-size:0.72rem;font-weight:700;color:var(--primary-color,#1e40af);letter-spacing:0.08em;text-transform:uppercase;margin-bottom:0.55rem;">
                <span aria-hidden="true">📖</span>
                <span>Read the full guide</span>
            </div>
            <div style="font-size:1.15rem;font-weight:700;line-height:1.35;margin-bottom:0.45rem;color:var(--text-color,#1e293b);">
                <?php echo htmlspecialchars($__toolBlog['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?>
            </div>
            <?php if (!empty($__toolBlog['excerpt'])): ?>
                <div style="font-size:0.92rem;line-height:1.6;color:var(--text-muted,#475569);margin-bottom:0.7rem;">
                    <?php echo htmlspecialchars($__toolBlog['excerpt'], ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>
            <div style="font-size:0.9rem;font-weight:600;color:var(--primary-color,#1e40af);">
                Read the full article &rarr;
            </div>
        </a>
    </div>
</section>
<style>
    .tool-blog-cta-card:hover { transform: translateY(-2px); box-shadow: 0 10px 26px rgba(0,0,0,0.09); }
</style>
<?php
unset($__postsData, $__toolBlog, $__blogUrl, $__postsDataPath);
?>
