<?php
/**
 * Plugin Name: KBT Custom Blog Style
 * Description: Clean, simple blog styling matching keyboardtester.click
 * Version: 2.0
 */

// Load fonts early in head
add_action('wp_head', function() {
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<?php
}, 5);

// Inject custom CSS AFTER all theme styles via wp_footer
add_action('wp_footer', function() {
?>
<style>
:root {
    --kbt-bg: #f5f7fa;
    --kbt-text: #1e293b;
    --kbt-heading: #0f172a;
    --kbt-accent: #4b5eAA;
    --kbt-accent-hover: #3d4e8f;
    --kbt-card-bg: #ffffff;
    --kbt-border: #e2e8f0;
    --kbt-muted: #64748b;
    --kbt-header-bg: #0b1220;
    --kbt-radius: 12px;
}

/* ===== Base ===== */
body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
    background: var(--kbt-bg) !important;
    color: var(--kbt-text) !important;
    line-height: 1.7 !important;
}

/* ===== Header - consistent on all pages ===== */
/* Astra theme selectors */
.ast-primary-header,
.ast-primary-header-bar,
.main-header-bar,
.ast-primary-header .ast-builder-layout-element,
.ast-header-break-point .ast-primary-header,
/* Bloghash theme selectors */
#bloghash-header,
#bloghash-header-inner,
#masthead,
/* Common selectors */
.site-header,
header.site-header {
    background: var(--kbt-header-bg) !important;
    border-bottom: none !important;
    box-shadow: 0 2px 10px rgba(0,0,0,0.15) !important;
}

/* Force all header text white */
/* Astra selectors */
.ast-site-identity .site-title a,
.main-header-bar .site-title a,
.ast-site-identity a,
.ast-builder-layout-element .site-title a,
/* Bloghash selectors */
.bloghash-logo .site-title,
.bloghash-logo .site-title a,
.bloghash-logo a,
#masthead h1.site-title,
#masthead .site-title a,
/* Common */
.site-title,
.site-title a,
header .site-title a {
    color: #ffffff !important;
    font-weight: 700 !important;
    font-size: 1.4rem !important;
    text-decoration: none !important;
}

.site-description,
.ast-site-identity .site-description,
.bloghash-logo .site-description,
#masthead .site-description,
header .site-description {
    color: #94a3b8 !important;
    font-size: 0.85rem !important;
}

/* Navigation links */
.main-navigation a,
.ast-header-sections-navigation a,
.main-header-menu a,
.ast-nav-menu a,
.ast-builder-menu a,
.ast-header-break-point .ast-builder-menu a,
.menu-toggle,
.ast-mobile-menu-trigger-fill,
/* Bloghash nav */
.bloghash-nav li > a,
.bloghash-header-widgets a,
#bloghash-header .nav-menu a,
header a {
    color: #e2e8f0 !important;
    font-weight: 500 !important;
}

.main-navigation a:hover,
.ast-nav-menu a:hover,
.main-header-menu a:hover,
.ast-builder-menu a:hover,
.bloghash-nav li > a:hover,
#bloghash-header .nav-menu a:hover,
header a:hover {
    color: #38bdf8 !important;
}

/* Mobile menu button & hamburger icon */
.ast-mobile-menu-trigger-fill,
.ast-button-wrap .ast-mobile-menu-trigger-fill,
.menu-toggle,
.ast-mobile-menu-trigger-minimal,
.ast-mobile-menu-trigger-outline,
.ast-mobile-menu-buttons svg,
.ast-mobile-svg,
#bloghash-header .menu-toggle,
#bloghash-header button {
    color: #ffffff !important;
    fill: #ffffff !important;
}

/* Override Astra color variables for header */
.ast-primary-header,
.ast-primary-header * {
    --ast-global-color-2: #ffffff;
    --ast-global-color-3: #94a3b8;
}

/* ===== Content ===== */
.ast-container,
.site-content .ast-container {
    max-width: 860px !important;
    margin: 0 auto !important;
}

.ast-separate-container .ast-article-post,
.ast-separate-container .ast-article-single,
.inside-article,
article.post,
.type-post {
    background: var(--kbt-card-bg) !important;
    border-radius: var(--kbt-radius) !important;
    border: 1px solid var(--kbt-border) !important;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06) !important;
    padding: 2.5rem !important;
    margin-bottom: 2rem !important;
}

/* ===== Post Titles ===== */
.entry-title,
.ast-blog-single-element .entry-title,
h1.entry-title,
h2.entry-title {
    font-size: 1.75rem !important;
    font-weight: 700 !important;
    color: var(--kbt-heading) !important;
    line-height: 1.3 !important;
}

.entry-title a {
    color: var(--kbt-heading) !important;
    text-decoration: none !important;
}

.entry-title a:hover {
    color: var(--kbt-accent) !important;
}

/* ===== Post Meta ===== */
.entry-meta,
.post-meta-wrapper,
.ast-blog-single-element.ast-taxonomy-container {
    color: var(--kbt-muted) !important;
    font-size: 0.85rem !important;
}

.entry-meta a {
    color: var(--kbt-accent) !important;
    text-decoration: none !important;
}

/* ===== Post Content ===== */
.entry-content {
    font-size: 1rem !important;
    line-height: 1.8 !important;
}

.entry-content h2 {
    font-size: 1.5rem !important;
    font-weight: 700 !important;
    color: var(--kbt-heading) !important;
    margin: 2rem 0 1rem !important;
    padding-bottom: 0.5rem !important;
    border-bottom: 2px solid var(--kbt-border) !important;
}

.entry-content h3 {
    font-size: 1.2rem !important;
    font-weight: 600 !important;
    color: var(--kbt-heading) !important;
    margin: 1.5rem 0 0.75rem !important;
}

.entry-content a {
    color: var(--kbt-accent) !important;
    text-decoration: underline !important;
    text-underline-offset: 2px !important;
}

.entry-content a:hover {
    color: var(--kbt-accent-hover) !important;
}

.entry-content img {
    border-radius: 10px !important;
    margin: 1.5rem 0 !important;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08) !important;
}

.entry-content strong {
    color: var(--kbt-heading) !important;
    font-weight: 600 !important;
}

.entry-content ul,
.entry-content ol {
    margin: 1rem 0 1.5rem 1.5rem !important;
}

.entry-content li {
    margin-bottom: 0.5rem !important;
}

/* ===== Read More ===== */
.ast-read-more-container a,
.read-more,
a.ast-button {
    display: inline-block !important;
    background: var(--kbt-accent) !important;
    color: #ffffff !important;
    padding: 0.6rem 1.5rem !important;
    border-radius: 8px !important;
    font-weight: 600 !important;
    font-size: 0.9rem !important;
    text-decoration: none !important;
    transition: background 0.2s, transform 0.15s !important;
}

.ast-read-more-container a:hover,
.read-more:hover {
    background: var(--kbt-accent-hover) !important;
    color: #ffffff !important;
    transform: translateY(-1px) !important;
}

/* ===== Category/Tag Badges ===== */
.cat-links a,
.tags-links a,
.ast-taxonomy-container a {
    display: inline-block !important;
    background: #f0f4ff !important;
    color: var(--kbt-accent) !important;
    padding: 0.2rem 0.75rem !important;
    border-radius: 20px !important;
    font-size: 0.8rem !important;
    font-weight: 500 !important;
    text-decoration: none !important;
    margin: 0.15rem !important;
}

.cat-links a:hover,
.tags-links a:hover,
.ast-taxonomy-container a:hover {
    background: var(--kbt-accent) !important;
    color: #ffffff !important;
}

/* ===== Sidebar ===== */
.widget-area .widget,
.ast-separate-container .widget {
    background: var(--kbt-card-bg) !important;
    border-radius: var(--kbt-radius) !important;
    border: 1px solid var(--kbt-border) !important;
    padding: 1.5rem !important;
    margin-bottom: 1.5rem !important;
}

.widget-title,
.widget .widget-title {
    font-size: 1rem !important;
    font-weight: 700 !important;
    color: var(--kbt-heading) !important;
    padding-bottom: 0.5rem !important;
    border-bottom: 2px solid var(--kbt-accent) !important;
}

/* ===== Footer ===== */
.ast-footer-overlay,
.site-footer,
.ast-small-footer,
footer.site-footer,
.ast-footer-copyright {
    background: var(--kbt-header-bg) !important;
    color: #94a3b8 !important;
    text-align: center !important;
}

.site-footer a,
.ast-small-footer a,
.ast-footer-copyright a {
    color: #38bdf8 !important;
}

/* ===== Pagination ===== */
.ast-pagination a,
.nav-links a,
.page-numbers {
    display: inline-block !important;
    padding: 0.5rem 1rem !important;
    border-radius: 8px !important;
    margin: 0.2rem !important;
    font-weight: 500 !important;
    text-decoration: none !important;
}

.nav-links a,
.ast-pagination a {
    background: var(--kbt-card-bg) !important;
    border: 1px solid var(--kbt-border) !important;
    color: var(--kbt-accent) !important;
}

.nav-links .current,
.page-numbers.current {
    background: var(--kbt-accent) !important;
    color: #ffffff !important;
    border: 1px solid var(--kbt-accent) !important;
}

/* ===== Featured Image ===== */
.post-thumb-img-content img,
.ast-article-image-container img,
.post-image img {
    border-radius: var(--kbt-radius) !important;
}

/* ===== Comments ===== */
.ast-comment-body,
.comment-body {
    background: var(--kbt-card-bg) !important;
    border-radius: var(--kbt-radius) !important;
    border: 1px solid var(--kbt-border) !important;
    padding: 1.5rem !important;
}

/* ===== Responsive ===== */
@media (max-width: 768px) {
    .ast-container {
        padding: 0 1rem !important;
    }
    .ast-separate-container .ast-article-post,
    .ast-separate-container .ast-article-single,
    .inside-article,
    article.post {
        padding: 1.5rem !important;
    }
    .entry-title {
        font-size: 1.4rem !important;
    }
    .entry-content h2 {
        font-size: 1.25rem !important;
    }
}

/* ===== Remove Astra branding ===== */
.ast-footer-copyright .ast-footer-html-inner a[href*="developer.wordpress.org"],
.ast-footer-copyright .ast-footer-html-inner a[href*="developer.wordpress"],
.ast-footer-copyright .ast-footer-html-inner a[href*="developer.wp"] {
    display: none !important;
}
</style>
<?php
}, 99);

// Customize footer + enforce header colors via JS
add_action('wp_footer', function() {
    echo '<script>
    (function(){
        // Fix header colors (works for both Astra and Bloghash themes)
        var hdr = document.querySelector("#bloghash-header, #masthead, .ast-primary-header, .site-header, .main-header-bar");
        if(hdr){
            hdr.style.cssText = "background:#0b1220!important;box-shadow:0 2px 10px rgba(0,0,0,.15)!important;border:none!important";
            hdr.querySelectorAll(".site-title, .site-title a, .bloghash-logo a, .ast-site-identity a, h1.site-title").forEach(function(el){
                el.style.color = "#fff";
            });
            var desc = hdr.querySelector(".site-description");
            if(desc) desc.style.color = "#94a3b8";
        }
        // Fix footer
        var els = document.querySelectorAll(".ast-small-footer-section, .site-info, .ast-footer-copyright, .ast-footer-html-inner");
        els.forEach(function(el){
            el.innerHTML = "<p style=\"margin:0\">Part of <a href=\"https://keyboardtester.click/\">KeyboardTester.Click</a> \u2014 Free Online Testing Tools</p><p style=\"margin:.5rem 0 0;font-size:.8rem\"><a href=\"https://keyboardtester.click/privacy-policy.php\">Privacy</a> \u00b7 <a href=\"https://keyboardtester.click/about-us.php\">About</a> \u00b7 <a href=\"https://keyboardtester.click/pages/tools.php\">All Tools</a></p>";
        });
    })();
    </script>';
});

// Add Google AdSense to blog
add_action('wp_head', function() {
    echo '<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7056306765580248" crossorigin="anonymous"></script>';
}, 1);
