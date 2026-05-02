<?php
/**
 * Homepage latest blog posts.
 * Pulls the newest three posts from blog/posts-data.php and renders them above the footer.
 */
$__latestBlogDataPath = __DIR__ . '/../../blog/posts-data.php';
if (!file_exists($__latestBlogDataPath)) { return; }

$__latestBlogPosts = include $__latestBlogDataPath;
if (!is_array($__latestBlogPosts) || empty($__latestBlogPosts)) { return; }

$__indexedLatestBlogPosts = [];
foreach ($__latestBlogPosts as $__latestBlogIndex => $__latestBlogPost) {
    if (empty($__latestBlogPost['path']) || empty($__latestBlogPost['title'])) { continue; }
    $__indexedLatestBlogPosts[] = [
        'index' => $__latestBlogIndex,
        'time' => strtotime($__latestBlogPost['date'] ?? '') ?: 0,
        'post' => $__latestBlogPost,
    ];
}

usort($__indexedLatestBlogPosts, static function ($a, $b) {
    if ($a['time'] !== $b['time']) {
        return $b['time'] <=> $a['time'];
    }
    return $a['index'] <=> $b['index'];
});

$__latestBlogCards = array_slice(array_column($__indexedLatestBlogPosts, 'post'), 0, 3);
if (empty($__latestBlogCards)) { return; }

$__latestBlogTrim = static function ($text, $limit = 132) {
    $text = trim((string) $text);
    if (function_exists('mb_strimwidth')) {
        return mb_strimwidth($text, 0, $limit, '...');
    }
    return strlen($text) > $limit ? substr($text, 0, max(0, $limit - 3)) . '...' : $text;
};
?>
<section class="homepage-latest-blog" aria-labelledby="homepage-latest-blog-title">
    <div class="container">
        <div class="homepage-latest-blog-head">
            <div>
                <p class="section-kicker">Latest guides</p>
                <h2 id="homepage-latest-blog-title">Fresh hardware testing guides</h2>
                <p class="section-lede">Read the newest troubleshooting and setup guides from KeyboardTester.click.</p>
            </div>
            <a class="landing-btn landing-btn-ghost homepage-latest-blog-all" href="<?php echo htmlspecialchars(blogUrl(), ENT_QUOTES, 'UTF-8'); ?>">View all guides</a>
        </div>
        <div class="homepage-latest-blog-grid">
            <?php foreach ($__latestBlogCards as $__latestBlogPost):
                $__postPath = $__latestBlogPost['path'] ?? '';
                $__postImage = $__latestBlogPost['image'] ?? '';
                $__postImageMeta = $__postImage !== '' && function_exists('getLocalImageMeta') ? getLocalImageMeta($__postImage) : null;
                $__postUrl = function_exists('url') ? url($__postPath) : '/' . ltrim($__postPath, '/');
                $__postImageUrl = $__postImage !== '' && function_exists('url') ? url($__postImage) : $__postImage;
                $__postAlt = $__latestBlogPost['alt'] ?? ($__latestBlogPost['title'] ?? '');
            ?>
                <a class="homepage-latest-blog-card" href="<?php echo htmlspecialchars($__postUrl, ENT_QUOTES, 'UTF-8'); ?>">
                    <?php if ($__postImage !== ''): ?>
                        <img class="homepage-latest-blog-img" src="<?php echo htmlspecialchars($__postImageUrl, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($__postAlt, ENT_QUOTES, 'UTF-8'); ?>" width="<?php echo (int) ($__postImageMeta['width'] ?? 640); ?>" height="<?php echo (int) ($__postImageMeta['height'] ?? 360); ?>" loading="lazy" decoding="async">
                    <?php endif; ?>
                    <span class="homepage-latest-blog-date"><?php echo htmlspecialchars($__latestBlogPost['date'] ?? '', ENT_QUOTES, 'UTF-8'); ?></span>
                    <h3><?php echo htmlspecialchars($__latestBlogPost['title'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>
                    <?php if (!empty($__latestBlogPost['excerpt'])): ?>
                        <p><?php echo htmlspecialchars($__latestBlogTrim($__latestBlogPost['excerpt']), ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endif; ?>
                    <span class="homepage-latest-blog-cta">Read guide &rarr;</span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<style>
    .homepage-latest-blog {
        padding: 2.75rem 0 4rem;
        background: var(--landing-bg);
    }
    .homepage-latest-blog-head {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 1.5rem;
        margin-bottom: 1.35rem;
    }
    .homepage-latest-blog-head .section-lede {
        margin-bottom: 0;
    }
    .homepage-latest-blog-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.15rem;
    }
    .homepage-latest-blog-card {
        display: flex;
        flex-direction: column;
        min-height: 100%;
        padding: 0.85rem;
        border: 1px solid var(--landing-border);
        border-radius: 14px;
        background: var(--landing-surface);
        color: var(--landing-ink);
        text-decoration: none;
        box-shadow: 0 14px 30px rgba(15, 23, 42, 0.08);
        transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
    }
    .homepage-latest-blog-card:hover {
        transform: translateY(-2px);
        border-color: rgba(14, 165, 233, 0.35);
        box-shadow: 0 18px 36px rgba(15, 23, 42, 0.12);
        text-decoration: none;
    }
    .homepage-latest-blog-img {
        width: 100%;
        aspect-ratio: 16 / 9;
        object-fit: cover;
        display: block;
        border-radius: 10px;
        margin-bottom: 0.9rem;
        background: rgba(15, 23, 42, 0.06);
    }
    .homepage-latest-blog-date {
        display: block;
        margin-bottom: 0.35rem;
        color: var(--landing-muted);
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        line-height: 1.3;
        text-transform: uppercase;
    }
    .homepage-latest-blog-card h3 {
        margin: 0 0 0.5rem;
        color: var(--landing-ink);
        font-size: 1rem;
        line-height: 1.35;
    }
    .homepage-latest-blog-card p {
        flex: 1;
        margin: 0;
        color: var(--landing-muted);
        font-size: 0.9rem;
        line-height: 1.55;
    }
    .homepage-latest-blog-cta {
        margin-top: 0.8rem;
        color: var(--landing-accent);
        font-size: 0.86rem;
        font-weight: 700;
    }
    @media (max-width: 900px) {
        .homepage-latest-blog-head {
            align-items: flex-start;
            flex-direction: column;
        }
        .homepage-latest-blog-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    @media (max-width: 620px) {
        .homepage-latest-blog {
            padding: 2rem 0 3rem;
        }
        .homepage-latest-blog-grid {
            grid-template-columns: 1fr;
        }
        .homepage-latest-blog-all {
            width: 100%;
        }
    }
</style>
<?php
unset(
    $__latestBlogDataPath,
    $__latestBlogPosts,
    $__indexedLatestBlogPosts,
    $__latestBlogCards,
    $__latestBlogTrim,
    $__latestBlogPost,
    $__postPath,
    $__postImage,
    $__postImageMeta,
    $__postUrl,
    $__postImageUrl,
    $__postAlt
);
?>
