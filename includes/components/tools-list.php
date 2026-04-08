<?php
/**
 * Tools List Component — English entry point.
 * Delegates to the shared renderer. To update tool data or add tools, edit:
 *   includes/components/tool-list-data.php
 */
require_once __DIR__ . '/tool-list-renderer.php';
renderToolsList('en');
