<?php
/**
 * Tools List Component.
 * Delegates to the shared renderer. To update tool data or add tools, edit:
 *   includes/components/tool-list-data.php
 *
 * Locale detection:
 *   1. $toolsListLocale if set explicitly by caller
 *   2. $siteChromeLocale set by header.php (from localized wrappers)
 *   3. fallback 'en'
 */
require_once __DIR__ . '/tool-list-renderer.php';
$__tlLocale = isset($toolsListLocale) ? $toolsListLocale : (isset($siteChromeLocale) ? $siteChromeLocale : 'en');
renderToolsList($__tlLocale);
