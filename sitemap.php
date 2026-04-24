<?php
/**
 * Clean sitemap endpoint.
 * Serves sitemap.xml with no security headers — needed because nginx (Engintron)
 * re-adds CSP/X-Frame-Options after Apache's .htaccess Header unset runs.
 * PHP header() calls override headers before the final response is sent.
 */

// Must be called before any output
header_remove('Content-Security-Policy');
header_remove('X-Frame-Options');
header_remove('X-Content-Type-Options');
header_remove('X-XSS-Protection');
header_remove('Referrer-Policy');
header_remove('Permissions-Policy');
header_remove('Feature-Policy');

// Set empty overrides so nginx proxy_hide_header has nothing to forward
header('Content-Security-Policy: ');
header('X-Frame-Options: ');

// Required headers only
header('Content-Type: application/xml; charset=utf-8');
header('Cache-Control: public, max-age=86400');
header('X-Robots-Tag: noindex');

$file = __DIR__ . '/sitemap.xml';
if (!file_exists($file)) {
    http_response_code(404);
    exit;
}

readfile($file);

