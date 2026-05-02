<?php
include __DIR__ . '/../config.php';

// Single source of truth — add new posts to blog/posts-data.php only
$posts = include __DIR__ . '/posts-data.php';

$topPerformerPaths = [
    'blog/best-laptops-with-good-gpu-2026.php',
    'blog/best-mechanical-keyboards-for-gaming-2026.php',
    'blog/keyboard-not-typing-lagging-sticky-fix-clean-guide.php',
    'blog/what-is-keyboard-ghosting-anti-ghosting-fix-guide.php',
];

$postsByPath = [];
foreach ($posts as $post) {
    $postsByPath[$post['path']] = $post;
}

$topPerformers = [];
foreach ($topPerformerPaths as $path) {
    if (isset($postsByPath[$path])) {
        $topPerformers[] = $postsByPath[$path];
    }
}

$topPerformerMap = array_flip($topPerformerPaths);
$archivePosts = array_values(array_filter($posts, static function ($post) use ($topPerformerMap) {
    return !isset($topPerformerMap[$post['path']]);
}));

$postsPerPage = 9;
$totalPosts = count($archivePosts);
$totalPages = max(1, (int) ceil($totalPosts / $postsPerPage));
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$currentPage = max(1, min($currentPage, $totalPages));
$offset = ($currentPage - 1) * $postsPerPage;
$visiblePosts = array_slice($archivePosts, $offset, $postsPerPage);
$isBlogHome = $currentPage === 1;
$featuredPost = $topPerformers[0] ?? ($posts[0] ?? null);
$topRailPosts = array_slice($topPerformers, 1);

function blogArchivePageUrl($pageNumber) {
    return $pageNumber <= 1 ? url('blog/') : url('blog/?page=' . (int) $pageNumber);
}

function blogRenderPostCard($post, $extraClass = '', $badge = '', $loading = 'lazy', $headingTag = 'h2') {
    $postImageMeta = $post['image'] !== '' ? getLocalImageMeta($post['image']) : null;
    $headingTag = in_array($headingTag, ['h2', 'h3'], true) ? $headingTag : 'h2';
    $classes = trim('post-card ' . $extraClass);
?>
        <a class="<?php echo htmlspecialchars($classes, ENT_QUOTES, 'UTF-8'); ?>" href="<?php echo url($post['path']); ?>">
<?php if ($postImageMeta !== null): ?>
            <div class="post-card-img-wrap">
                <?php if ($badge !== ''): ?><span class="post-card-badge"><?php echo htmlspecialchars($badge, ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
                <img class="post-card-img" src="<?php echo url($post['image']); ?>" alt="<?php echo htmlspecialchars($post['alt'], ENT_QUOTES, 'UTF-8'); ?>" width="<?php echo (int) $postImageMeta['width']; ?>" height="<?php echo (int) $postImageMeta['height']; ?>" loading="<?php echo htmlspecialchars($loading, ENT_QUOTES, 'UTF-8'); ?>" decoding="async">
                <div class="post-card-shade" aria-hidden="true"></div>
            </div>
<?php else: ?>
            <div class="post-card-img-placeholder" aria-hidden="true"><?php if ($badge !== ''): ?><span class="post-card-badge"><?php echo htmlspecialchars($badge, ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>Read</div>
<?php endif; ?>
            <div class="post-card-body">
                <span class="post-card-date"><?php echo htmlspecialchars($post['date'], ENT_QUOTES, 'UTF-8'); ?></span>
                <<?php echo $headingTag; ?> class="post-card-title"><?php echo htmlspecialchars($post['title'], ENT_QUOTES, 'UTF-8'); ?></<?php echo $headingTag; ?>>
                <p class="post-card-excerpt"><?php echo htmlspecialchars($post['excerpt'], ENT_QUOTES, 'UTF-8'); ?></p>
                <span class="post-card-cta">Read article</span>
            </div>
        </a>
<?php
}

$pageTitle = $currentPage > 1
    ? 'Blog - Page ' . $currentPage . ' - KeyboardTester.click'
    : 'KeyboardTester Blog - Guides, Reviews and Testing Tips';
$pageDescription = 'Practical keyboard, mouse, monitor, audio, privacy, and gaming setup guides from KeyboardTester.click.';
$pageCanonical = $currentPage > 1
    ? absoluteUrl('blog/?page=' . $currentPage)
    : absoluteUrl('blog/');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../includes/seo-meta.php'; ?>
    <?php include __DIR__ . '/../includes/head-common.php'; ?>
    <style>
    /* ── Blog shared styles ───────────────────────────────── */
    .blog-wrap {
        max-width: 1100px;
        margin: 0 auto;
        padding: 2rem 1.25rem 4rem;
    }
    .blog-page-title {
        font-size: 2rem;
        font-weight: 700;
        margin: 0 0 0.25rem;
        color: var(--text-color);
    }
    .blog-subtitle {
        color: var(--text-muted, #64748b);
        font-size: 1rem;
        margin: 0 0 2rem;
    }

    /* ── Post grid ─────────────────────────────────────────── */
    .post-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }
    @media (max-width: 900px) { .post-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 580px) { .post-grid { grid-template-columns: 1fr; } }

    .post-card {
        background: var(--surface, #fff);
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.18s ease, box-shadow 0.18s ease;
        text-decoration: none;
        color: inherit;
    }
    .post-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    }
    .post-card-img-wrap {
        position: relative;
        overflow: hidden;
        perspective: 900px;
    }
    .post-card-img {
        width: 100%;
        aspect-ratio: 16 / 9;
        object-fit: cover;
        display: block;
        background: var(--border-color, #e2e8f0);
    }
    .post-card-img-placeholder {
        width: 100%;
        aspect-ratio: 16 / 9;
        background: var(--border-color, #e2e8f0);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--text-muted, #94a3b8);
    }

    /* ── Curtain fold hover effect (blog index only) ──────────── */
    .post-card-curtain {
        position: absolute;
        inset: 50% 0 0 0;
        display: flex;
        pointer-events: none;
        transform-style: preserve-3d;
    }
    .curtain-fold {
        flex: 1;
        background: linear-gradient(180deg, rgba(10, 15, 30, 0.62) 0%, rgba(10, 15, 30, 0.48) 100%);
        border-right: 1px solid rgba(255, 255, 255, 0.06);
        transform-origin: top center;
        transition: transform 0.55s cubic-bezier(0.22, 1, 0.36, 1), opacity 0.35s ease;
        backface-visibility: hidden;
    }
    .curtain-fold:last-child { border-right: 0; }
    .post-card:hover .curtain-fold,
    .post-card:focus-visible .curtain-fold {
        transform: rotateX(-92deg);
        opacity: 0.15;
    }
    .post-card:hover .curtain-fold:nth-child(1) { transition-delay: 0s; }
    .post-card:hover .curtain-fold:nth-child(2) { transition-delay: 70ms; }
    .post-card:hover .curtain-fold:nth-child(3) { transition-delay: 140ms; }
    .post-card:hover .curtain-fold:nth-child(4) { transition-delay: 210ms; }
    .post-card:hover .curtain-fold:nth-child(5) { transition-delay: 280ms; }
    .post-card:hover .curtain-fold:nth-child(6) { transition-delay: 350ms; }
    @media (prefers-reduced-motion: reduce) {
        .curtain-fold { transition: opacity 0.25s ease; }
        .post-card:hover .curtain-fold { transform: none; opacity: 0; }
    }
    @media (hover: none) and (pointer: coarse) {
        /* On touch devices, fade the curtain over time so there is no permanent half-cover */
        .curtain-fold { opacity: 0.55; }
    }
    .post-card-body {
        padding: 1rem 1.1rem 1.2rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
    }
    .post-card-date {
        font-size: 0.78rem;
        color: var(--text-muted, #64748b);
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }
    .post-card-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-color);
        line-height: 1.4;
        margin: 0;
    }
    .post-card-excerpt {
        font-size: 0.88rem;
        color: var(--text-muted, #64748b);
        line-height: 1.6;
        flex: 1;
        margin: 0;
    }
    .post-card-cta {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--primary-color, #0ea5e9);
        margin-top: 0.5rem;
        text-decoration: none;
    }
    .pagination-nav {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.6rem;
        flex-wrap: wrap;
        margin-top: 2.5rem;
    }
    .pagination-link {
        min-width: 2.6rem;
        padding: 0.7rem 0.95rem;
        border: 1px solid var(--border-color, #e2e8f0);
        border-radius: 10px;
        background: var(--surface, #fff);
        color: var(--text-color);
        text-decoration: none;
        text-align: center;
        font-size: 0.95rem;
        font-weight: 600;
        transition: background 0.18s ease, border-color 0.18s ease, color 0.18s ease;
    }
    .pagination-link:hover {
        border-color: var(--primary-color, #0ea5e9);
        color: var(--primary-color, #0ea5e9);
    }
    .pagination-link.is-active {
        background: var(--primary-color, #0ea5e9);
        border-color: var(--primary-color, #0ea5e9);
        color: #fff;
        pointer-events: none;
    }
    .pagination-link.is-arrow {
        min-width: auto;
        padding-inline: 1rem;
    }

    /* Blog archive refresh */
    body.blog-page {
        background: #f6f8fb;
    }
    .blog-page main {
        background: #f6f8fb;
    }
    .blog-wrap {
        max-width: 1180px;
        padding: 2.25rem 1.25rem 4.5rem;
    }
    .blog-hero {
        display: grid;
        grid-template-columns: minmax(0, 0.88fr) minmax(340px, 1.12fr);
        gap: 1.25rem;
        align-items: stretch;
        margin-bottom: 2rem;
    }
    .blog-hero-copy {
        background: #10231f;
        color: #f8fafc;
        border: 1px solid rgba(15, 23, 42, 0.18);
        border-radius: 8px;
        padding: clamp(1.5rem, 3vw, 2.4rem);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-height: 420px;
    }
    .blog-kicker,
    .section-kicker,
    .post-card-date {
        letter-spacing: 0;
        text-transform: uppercase;
        font-weight: 800;
    }
    .blog-kicker {
        color: #fbbf24;
        font-size: 0.82rem;
        margin: 0 0 0.8rem;
    }
    .blog-page-title {
        color: inherit;
        font-size: clamp(2.2rem, 5vw, 4rem);
        line-height: 1.02;
        margin: 0;
        letter-spacing: 0;
    }
    body.blog-page .blog-hero-copy .blog-page-title {
        color: #f8fafc !important;
        -webkit-text-fill-color: #f8fafc;
    }
    .blog-subtitle {
        color: rgba(248, 250, 252, 0.78);
        font-size: 1.05rem;
        line-height: 1.7;
        margin: 1rem 0 1.4rem;
        max-width: 44rem;
    }
    body.blog-page .blog-hero-copy .blog-subtitle {
        color: rgba(248, 250, 252, 0.78) !important;
        -webkit-text-fill-color: rgba(248, 250, 252, 0.78);
    }
    .blog-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 0.65rem;
        margin-top: 1.1rem;
    }
    .blog-chip {
        display: inline-flex;
        align-items: center;
        min-height: 2.35rem;
        padding: 0.48rem 0.72rem;
        border-radius: 8px;
        background: rgba(255, 255, 255, 0.08);
        color: #f8fafc;
        border: 1px solid rgba(255, 255, 255, 0.12);
        font-size: 0.88rem;
        font-weight: 700;
        text-decoration: none;
    }
    .blog-hero-metrics {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.75rem;
        margin-top: 1.5rem;
    }
    .blog-metric {
        border-top: 3px solid #38bdf8;
        padding-top: 0.75rem;
    }
    .blog-metric:nth-child(2) { border-color: #f97316; }
    .blog-metric:nth-child(3) { border-color: #22c55e; }
    .blog-metric strong {
        display: block;
        color: #fff;
        font-size: 1.55rem;
        line-height: 1;
    }
    .blog-metric span {
        display: block;
        color: rgba(248, 250, 252, 0.72);
        font-size: 0.82rem;
        margin-top: 0.32rem;
    }
    .blog-featured {
        min-height: 420px;
    }
    .blog-featured .post-card-img {
        aspect-ratio: 16 / 8.9;
    }
    .blog-featured .post-card-title {
        font-size: clamp(1.35rem, 2vw, 1.9rem);
        line-height: 1.18;
    }
    .blog-featured .post-card-excerpt {
        font-size: 1rem;
    }
    .blog-section {
        margin-top: 2.25rem;
    }
    .blog-section-head {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 1rem;
        margin-bottom: 1rem;
        border-bottom: 1px solid #d8e1ea;
        padding-bottom: 0.9rem;
    }
    .section-kicker {
        color: #be123c;
        font-size: 0.78rem;
        margin: 0 0 0.25rem;
    }
    .blog-section-title {
        color: #10231f;
        font-size: clamp(1.45rem, 3vw, 2.15rem);
        line-height: 1.12;
        margin: 0;
        letter-spacing: 0;
    }
    .blog-section-note {
        color: #475569;
        line-height: 1.6;
        margin: 0;
        max-width: 34rem;
        font-size: 0.95rem;
    }
    .top-story-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
    }
    .post-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1rem;
    }
    .post-card {
        background: #fff;
        border: 1px solid #dbe3eb;
        border-radius: 8px;
        box-shadow: 0 12px 32px rgba(15, 23, 42, 0.06);
        transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
    }
    .post-card:hover,
    .post-card:focus-visible {
        transform: translateY(-4px);
        border-color: #7dd3fc;
        box-shadow: 0 18px 42px rgba(15, 23, 42, 0.12);
        outline: none;
    }
    .post-card-img-wrap {
        background: #dbeafe;
        isolation: isolate;
    }
    .post-card-img {
        aspect-ratio: 16 / 9;
        transition: transform 0.35s ease;
    }
    .post-card:hover .post-card-img,
    .post-card:focus-visible .post-card-img {
        transform: scale(1.035);
    }
    .post-card-shade {
        position: absolute;
        inset: auto 0 0;
        height: 45%;
        background: linear-gradient(180deg, rgba(15, 23, 42, 0) 0%, rgba(15, 23, 42, 0.55) 100%);
        pointer-events: none;
        z-index: 1;
    }
    .post-card-badge {
        position: absolute;
        top: 0.75rem;
        left: 0.75rem;
        z-index: 2;
        max-width: calc(100% - 1.5rem);
        padding: 0.42rem 0.62rem;
        border-radius: 8px;
        background: #fff7ed;
        color: #9a3412;
        border: 1px solid rgba(154, 52, 18, 0.16);
        font-size: 0.76rem;
        font-weight: 800;
        line-height: 1.2;
    }
    .post-card-body {
        padding: 1rem;
        gap: 0.5rem;
    }
    .post-card-date {
        color: #64748b;
        font-size: 0.74rem;
    }
    .post-card-title {
        color: #111827;
        font-size: 1.03rem;
        line-height: 1.32;
    }
    .post-card-excerpt {
        color: #526174;
        font-size: 0.9rem;
        line-height: 1.58;
    }
    .post-card-cta {
        color: #0369a1;
        font-size: 0.88rem;
    }
    .post-card--compact .post-card-title {
        font-size: 0.98rem;
    }
    .post-card--compact .post-card-excerpt {
        font-size: 0.86rem;
    }
    .post-card-img-placeholder {
        border-radius: 0;
        background: #e2e8f0;
        color: #475569;
        font-size: 0.95rem;
        font-weight: 800;
    }
    html.dark-theme body.blog-page,
    html.dark-theme body.blog-page main,
    [data-theme="dark"] body.blog-page,
    [data-theme="dark"] body.blog-page main {
        background: #0b1220 !important;
    }
    html.dark-theme body.blog-page .blog-section-title,
    [data-theme="dark"] body.blog-page .blog-section-title {
        color: #f8fafc !important;
    }
    html.dark-theme body.blog-page .blog-section-note,
    [data-theme="dark"] body.blog-page .blog-section-note {
        color: #cbd5e1 !important;
    }
    html.dark-theme body.blog-page .blog-section-head,
    [data-theme="dark"] body.blog-page .blog-section-head {
        border-bottom-color: #334155 !important;
    }
    html.dark-theme body.blog-page .post-card,
    [data-theme="dark"] body.blog-page .post-card {
        background: #111827 !important;
        border-color: #334155 !important;
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.28);
    }
    html.dark-theme body.blog-page .post-card:hover,
    html.dark-theme body.blog-page .post-card:focus-visible,
    [data-theme="dark"] body.blog-page .post-card:hover,
    [data-theme="dark"] body.blog-page .post-card:focus-visible {
        border-color: #38bdf8 !important;
        box-shadow: 0 18px 42px rgba(0, 0, 0, 0.36);
    }
    html.dark-theme body.blog-page .post-card-img-wrap,
    [data-theme="dark"] body.blog-page .post-card-img-wrap {
        background: #1e293b !important;
    }
    html.dark-theme body.blog-page .post-card-date,
    [data-theme="dark"] body.blog-page .post-card-date {
        color: #93a4b8 !important;
    }
    html.dark-theme body.blog-page .post-card-title,
    [data-theme="dark"] body.blog-page .post-card-title {
        color: #f8fafc !important;
    }
    html.dark-theme body.blog-page .post-card-excerpt,
    [data-theme="dark"] body.blog-page .post-card-excerpt {
        color: #cbd5e1 !important;
    }
    html.dark-theme body.blog-page .post-card-cta,
    [data-theme="dark"] body.blog-page .post-card-cta {
        color: #93c5fd !important;
    }
    html.dark-theme body.blog-page .post-card-img-placeholder,
    [data-theme="dark"] body.blog-page .post-card-img-placeholder {
        background: #1e293b !important;
        color: #cbd5e1 !important;
    }
    html.dark-theme body.blog-page .pagination-link,
    [data-theme="dark"] body.blog-page .pagination-link {
        background: #111827 !important;
        border-color: #334155 !important;
        color: #cbd5e1 !important;
    }
    html.dark-theme body.blog-page .pagination-link:hover,
    html.dark-theme body.blog-page .pagination-link:focus-visible,
    [data-theme="dark"] body.blog-page .pagination-link:hover,
    [data-theme="dark"] body.blog-page .pagination-link:focus-visible {
        border-color: #38bdf8 !important;
        color: #f8fafc !important;
    }
    .pagination-link {
        border-radius: 8px;
        background: #fff;
    }
    @media (max-width: 1080px) {
        .blog-hero {
            grid-template-columns: 1fr;
        }
        .blog-hero-copy,
        .blog-featured {
            min-height: auto;
        }
        .top-story-grid {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }
    }
    @media (max-width: 820px) {
        .blog-section-head {
            display: block;
        }
        .blog-section-note {
            margin-top: 0.55rem;
        }
        .post-grid,
        .top-story-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    @media (max-width: 580px) {
        .blog-wrap {
            padding-inline: 1rem;
        }
        .blog-hero-copy {
            padding: 1.25rem;
        }
        .blog-hero-metrics,
        .post-grid,
        .top-story-grid {
            grid-template-columns: 1fr;
        }
        .blog-hero-metrics {
            padding-left: 3.1rem;
        }
    }
    @media (prefers-reduced-motion: reduce) {
        .post-card,
        .post-card-img {
            transition: none;
        }
        .post-card:hover,
        .post-card:focus-visible,
        .post-card:hover .post-card-img,
        .post-card:focus-visible .post-card-img {
            transform: none;
        }
    }

    /* ── Single post ───────────────────────────────────────── */
    .post-wrap {
        max-width: 780px;
        margin: 0 auto;
        padding: 2rem 1.25rem 5rem;
    }
    .post-back {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.9rem;
        color: var(--primary-color, #0ea5e9);
        text-decoration: none;
        margin-bottom: 1.5rem;
    }
    .post-back:hover { text-decoration: underline; }
    .post-featured-img {
        width: 100%;
        max-height: 420px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 1.75rem;
        display: block;
    }
    .post-title {
        font-size: 1.9rem;
        font-weight: 700;
        line-height: 1.25;
        color: var(--text-color);
        margin: 0 0 0.5rem;
    }
    @media (max-width: 600px) { .post-title { font-size: 1.45rem; } }
    .post-meta {
        font-size: 0.85rem;
        color: var(--text-muted, #64748b);
        margin-bottom: 2rem;
    }

    /* ── Blog content typography ───────────────────────────── */
    .blog-content {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--text-color);
    }
    .blog-content h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 2.2rem 0 0.75rem;
        padding-bottom: 0.4rem;
        border-bottom: 2px solid var(--border-color, #e2e8f0);
        color: var(--text-color);
    }
    .blog-content h3 {
        font-size: 1.2rem;
        font-weight: 600;
        margin: 1.75rem 0 0.5rem;
        color: var(--primary-color, #0369a1);
    }
    .blog-content h4 {
        font-size: 1rem;
        font-weight: 600;
        margin: 1.25rem 0 0.4rem;
        color: var(--text-color);
    }
    .blog-content p {
        margin: 0 0 1.1rem;
    }
    .blog-content ul,
    .blog-content ol {
        margin: 0 0 1.1rem 1.5rem;
        padding: 0;
    }
    .blog-content li {
        margin-bottom: 0.35rem;
    }
    .blog-content a {
        color: var(--primary-color, #0369a1);
        text-decoration: underline;
        text-underline-offset: 2px;
    }
    .blog-content a:hover { opacity: 0.8; }
    .blog-content strong { font-weight: 700; }
    .blog-content em { font-style: italic; }
    .blog-content blockquote {
        border-left: 4px solid var(--primary-color, #0369a1);
        margin: 1.25rem 0;
        padding: 0.5rem 1rem;
        background: var(--surface, #f8fafc);
        border-radius: 0 8px 8px 0;
        color: var(--text-muted, #64748b);
    }
    .blog-content figure {
        margin: 1.5rem 0;
    }
    .blog-content figure img {
        width: 100%;
        height: auto;
        border-radius: 8px;
        display: block;
    }
    .blog-content figcaption {
        font-size: 0.85rem;
        color: var(--text-muted, #64748b);
        text-align: center;
        margin-top: 0.4rem;
    }
    .blog-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    /* ── Comparison tables ─────────────────────────────────── */
    .blog-content table {
        width: 100%;
        border-collapse: collapse;
        margin: 1.5rem 0;
        font-size: 0.92rem;
        overflow-x: auto;
        display: block;
    }
    .blog-content table thead th {
        background: var(--surface, #f1f5f9);
        border: 1px solid var(--border-color, #e2e8f0);
        padding: 0.65rem 0.85rem;
        text-align: left;
        font-weight: 600;
        color: var(--text-color);
    }
    .blog-content table tbody td {
        border: 1px solid var(--border-color, #e2e8f0);
        padding: 0.6rem 0.85rem;
        vertical-align: top;
    }
    .blog-content table tbody tr:nth-child(even) td {
        background: var(--surface, #f8fafc);
    }
    .blog-content table[style] { min-width: unset !important; }
    .blog-content th[style] { background: var(--surface, #f1f5f9) !important; }
    </style>
</head>
<body class="blog-page">
<?php include __DIR__ . '/../header.php'; ?>
<main>
    <div class="blog-wrap">
<?php if ($isBlogHome && $featuredPost !== null): ?>
        <section class="blog-hero" aria-labelledby="blog-page-title">
            <div class="blog-hero-copy">
                <div>
                    <p class="blog-kicker">KeyboardTester Journal</p>
                    <h1 class="blog-page-title" id="blog-page-title">Better gear choices start with better tests.</h1>
                    <p class="blog-subtitle">Practical guides for keyboards, mice, monitors, audio, privacy, and gaming setup decisions. The articles getting real search traction stay pinned here for faster access.</p>
                    <div class="blog-hero-actions" aria-label="Blog topics">
                        <a class="blog-chip" href="<?php echo url('blog/best-laptops-with-good-gpu-2026.php'); ?>">GPU laptops</a>
                        <a class="blog-chip" href="<?php echo url('blog/best-mechanical-keyboards-for-gaming-2026.php'); ?>">Gaming keyboards</a>
                        <a class="blog-chip" href="<?php echo url('blog/what-is-keyboard-ghosting-anti-ghosting-fix-guide.php'); ?>">Ghosting and NKRO</a>
                        <a class="blog-chip" href="<?php echo url('blog/mouse-dpi-tester-measure-sensitivity.php'); ?>">Mouse DPI</a>
                    </div>
                </div>
                <div class="blog-hero-metrics" aria-label="Blog highlights">
                    <div class="blog-metric"><strong><?php echo count($posts); ?></strong><span>published guides</span></div>
                    <div class="blog-metric"><strong><?php echo count($topRailPosts); ?></strong><span>pinned articles below</span></div>
                    <div class="blog-metric"><strong>2026</strong><span>fresh buying advice</span></div>
                </div>
            </div>
            <?php blogRenderPostCard($featuredPost, 'blog-featured', 'Top GSC performer', 'eager', 'h2'); ?>
        </section>

        <section class="blog-section" aria-labelledby="top-performing-title">
            <div class="blog-section-head">
                <div>
                    <p class="section-kicker">Pinned from Search Console</p>
                    <h2 class="blog-section-title" id="top-performing-title">Top performing articles</h2>
                </div>
                <p class="blog-section-note">These stay on the blog homepage even when newer posts are published, because they are already earning impressions or clicks.</p>
            </div>
            <div class="top-story-grid">
<?php foreach ($topRailPosts as $index => $post): ?>
<?php blogRenderPostCard($post, 'post-card--compact', $index === 0 ? 'Rising clicks' : 'Pinned', 'lazy', 'h3'); ?>
<?php endforeach; ?>
            </div>
        </section>
<?php else: ?>
        <section class="blog-section" aria-labelledby="blog-page-title">
            <div class="blog-section-head">
                <div>
                    <p class="section-kicker">Archive</p>
                    <h1 class="blog-section-title" id="blog-page-title">Blog page <?php echo (int) $currentPage; ?></h1>
                </div>
                <p class="blog-section-note">Older practical guides and reviews from KeyboardTester.click.</p>
            </div>
        </section>
<?php endif; ?>

        <section class="blog-section" aria-labelledby="latest-guides-title">
            <div class="blog-section-head">
                <div>
                    <p class="section-kicker"><?php echo $isBlogHome ? 'Latest without repeats' : 'More from the archive'; ?></p>
                    <h2 class="blog-section-title" id="latest-guides-title"><?php echo $isBlogHome ? 'Latest guides' : 'Article archive'; ?></h2>
                </div>
                <p class="blog-section-note"><?php echo $isBlogHome ? 'Fresh posts continue below the pinned performers, so readers can find both proven guides and new articles quickly.' : 'Browse the remaining posts in chronological order.'; ?></p>
            </div>
        <div class="post-grid">
<?php foreach ($visiblePosts as $post): ?>
<?php blogRenderPostCard($post, '', '', 'lazy', 'h3'); ?>
<?php endforeach; ?>
        </div>
        </section>
<?php if ($totalPages > 1): ?>
        <nav class="pagination-nav" aria-label="Blog pages">
<?php if ($currentPage > 1): ?>
            <a class="pagination-link is-arrow" href="<?php echo blogArchivePageUrl($currentPage - 1); ?>">&larr; Prev</a>
<?php endif; ?>
<?php for ($page = 1; $page <= $totalPages; $page++): ?>
            <a class="pagination-link<?php echo $page === $currentPage ? ' is-active' : ''; ?>" href="<?php echo blogArchivePageUrl($page); ?>"><?php echo $page; ?></a>
<?php endfor; ?>
<?php if ($currentPage < $totalPages): ?>
            <a class="pagination-link is-arrow" href="<?php echo blogArchivePageUrl($currentPage + 1); ?>">Next &rarr;</a>
<?php endif; ?>
        </nav>
<?php endif; ?>
    </div>
</main>
<?php include __DIR__ . '/../footer.php'; ?>
</body>
</html>
