<?php

require_once __DIR__ . '/adsense-slot.php';

if (!function_exists('kbtGetBlogArticleRailAdConfig')) {
    function kbtGetBlogArticleRailAdConfig()
    {
        $config = kbtGetAdSenseConfig();
        $client = trim((string) ($config['client'] ?? ''));
        $slots = [
            'left' => kbtGetAdSenseSlotId('blog_article_left_rail'),
            'right' => kbtGetAdSenseSlotId('blog_article_right_rail'),
        ];

        return [
            'client' => $client,
            'slots' => $slots,
            'enabled' => $client !== '' && $slots['left'] !== '' && $slots['right'] !== '',
        ];
    }
}

if (!function_exists('kbtRenderBlogArticleRailStyles')) {
    function kbtRenderBlogArticleRailStyles()
    {
        static $rendered = false;
        if ($rendered) {
            return;
        }
        $rendered = true;
        ?>
    <style>
    .post-layout {
        max-width: 1320px;
        margin: 0 auto;
        padding: 0 1.25rem;
    }
    .post-layout--with-rails .post-wrap {
        width: 100%;
    }
    .blog-rail-ad {
        display: none;
    }
    .blog-rail-ad-inner {
        width: 160px;
        min-height: 600px;
        margin-top: 2rem;
    }
    .blog-rail-ad-shell {
        position: sticky;
        top: 88px;
        width: 160px;
        min-height: 600px;
        border-radius: 12px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.58);
        border: 1px solid var(--border-color, #e2e8f0);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .blog-rail-ad .adsbygoogle {
        width: 160px;
        height: 600px;
        max-width: 160px;
        min-height: 600px;
        margin: 0 auto;
    }
    html.dark-theme .blog-rail-ad-shell,
    [data-theme="dark"] .blog-rail-ad-shell {
        background: rgba(15, 23, 42, 0.45);
        border-color: rgba(148, 163, 184, 0.24);
    }
    @media (min-width: 1280px) {
        .post-layout--with-rails {
            display: grid;
            grid-template-columns: 160px minmax(0, 900px) 160px;
            gap: 1.5rem;
            align-items: start;
        }
        .post-layout--with-rails .post-wrap {
            padding-left: 0;
            padding-right: 0;
        }
        .post-layout--with-rails .blog-rail-ad {
            display: block;
        }
    }
    </style>
        <?php
    }
}

if (!function_exists('kbtRenderBlogArticleLayoutOpen')) {
    function kbtRenderBlogArticleLayoutOpen()
    {
        $railConfig = kbtGetBlogArticleRailAdConfig();
        $classes = 'post-layout' . ($railConfig['enabled'] ? ' post-layout--with-rails' : '');
        echo "\n    <div class=\"" . htmlspecialchars($classes, ENT_QUOTES, 'UTF-8') . "\">\n";
    }
}

if (!function_exists('kbtRenderBlogArticleLayoutClose')) {
    function kbtRenderBlogArticleLayoutClose()
    {
        echo "    </div>\n";
    }
}

if (!function_exists('kbtRenderBlogArticleRail')) {
    function kbtRenderBlogArticleRail($side)
    {
        $side = $side === 'right' ? 'right' : 'left';
        $railConfig = kbtGetBlogArticleRailAdConfig();
        if (!$railConfig['enabled']) {
            return;
        }

        $slotId = $railConfig['slots'][$side] ?? '';
        if ($slotId === '') {
            return;
        }
        ?>
        <aside class="blog-rail-ad blog-rail-ad--<?php echo htmlspecialchars($side, ENT_QUOTES, 'UTF-8'); ?>" aria-label="Sponsored slot">
            <div class="blog-rail-ad-inner">
                <div class="blog-rail-ad-shell" data-blog-rail-ad data-ad-client="<?php echo htmlspecialchars($railConfig['client'], ENT_QUOTES, 'UTF-8'); ?>" data-ad-slot="<?php echo htmlspecialchars($slotId, ENT_QUOTES, 'UTF-8'); ?>">
                </div>
            </div>
        </aside>
        <?php
    }
}

if (!function_exists('kbtRenderBlogArticleRailScript')) {
    function kbtRenderBlogArticleRailScript()
    {
        static $rendered = false;
        $railConfig = kbtGetBlogArticleRailAdConfig();
        if ($rendered || !$railConfig['enabled']) {
            return;
        }
        $rendered = true;
        ?>
<script>
(function() {
    var desktopQuery = window.matchMedia ? window.matchMedia('(min-width: 1280px)') : null;
    var hosts = Array.prototype.slice.call(document.querySelectorAll('[data-blog-rail-ad]'));
    var resizeTimer = null;

    function isDesktop() {
        return desktopQuery ? desktopQuery.matches : window.innerWidth >= 1280;
    }

    function renderRailAd(host) {
        if (host.dataset.rendered === 'true') {
            return;
        }
        var ins = document.createElement('ins');
        ins.className = 'adsbygoogle';
        ins.style.display = 'block';
        ins.setAttribute('data-ad-client', host.dataset.adClient);
        ins.setAttribute('data-ad-slot', host.dataset.adSlot);
        ins.setAttribute('data-ad-format', 'vertical');
        ins.setAttribute('data-full-width-responsive', 'false');
        host.appendChild(ins);
        host.dataset.rendered = 'true';
        (window.adsbygoogle = window.adsbygoogle || []).push({});
    }

    function activateRailAds() {
        if (!isDesktop()) {
            return;
        }
        hosts.forEach(renderRailAd);
    }

    ['scroll', 'click', 'keydown', 'touchstart', 'mousemove'].forEach(function(eventName) {
        window.addEventListener(eventName, activateRailAds, { passive: true, once: true });
    });

    window.addEventListener('load', function() {
        window.setTimeout(activateRailAds, 5200);
    });

    window.addEventListener('resize', function() {
        window.clearTimeout(resizeTimer);
        resizeTimer = window.setTimeout(activateRailAds, 250);
    });
})();
</script>
        <?php
    }
}
