<?php
if (!isset($baseUrl)) {
    include_once __DIR__ . '/config.php';
}

require_once __DIR__ . '/includes/components/site-chrome.php';
require_once __DIR__ . '/includes/components/site-sidebar.php';

$siteChromeLocale = $siteChromeLocale ?? 'en';
kbtRenderSiteHeader($siteChromeLocale);
kbtRenderSiteSidebar();
