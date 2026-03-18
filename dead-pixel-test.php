<?php
$intentPage = [
    'meta' => [
        'title' => 'Dead Pixel Test Online | Free Monitor Checker',
        'description' => 'Run a free dead pixel test online with full-screen solid colors. Check your monitor, laptop, or phone screen for black pixels that never light up.',
        'keywords' => 'dead pixel test, dead pixel checker, monitor dead pixel test, screen dead pixel test',
        'ogImage' => 'images/screen-test/hero.svg',
        'ogImageAlt' => 'Dead pixel test tool with full-screen monitor color checks'
    ],
    'schemaKey' => 'dead_pixel_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Dead Pixel Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Monitor diagnostics',
        'title' => 'Dead Pixel Test Online',
        'lede' => 'Use solid full-screen colors to find pixels that stay black on every test screen. The live checker runs entirely in your browser.',
        'primaryHref' => '#dead-pixel-tool',
        'primaryLabel' => 'Start dead pixel test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Full screen', 'No installs', 'Monitor friendly'],
        'metrics' => [
            ['value' => '8', 'label' => 'Color screens'],
            ['value' => '100%', 'label' => 'Browser based'],
            ['value' => 'Live', 'label' => 'Visual check']
        ],
        'image' => 'images/screen-test/hero.svg',
        'imageAlt' => 'Online dead pixel checker with solid monitor test colors',
        'miniCards' => [
            ['title' => 'Black-screen inspection', 'text' => 'Spot pixels that stay dark while the rest of the panel lights correctly.'],
            ['title' => 'Fast monitor triage', 'text' => 'Check a new display before the return window closes.']
        ]
    ],
    'toolStageId' => 'dead-pixel-tool',
    'toolShellId' => 'dead-pixel-shell',
    'toolSection' => [
        'kicker' => 'Live display check',
        'title' => 'Dead Pixel Test Tool',
        'lede' => 'Open the full-screen monitor test below and inspect every area of the panel for pixels that remain black.'
    ],
    'toolInclude' => 'screentesttool.php',
    'trustItems' => [
        ['title' => 'Solid colors', 'desc' => 'Check black, white, and RGB screens quickly'],
        ['title' => 'Full-screen mode', 'desc' => 'Inspect edges and corners without UI clutter'],
        ['title' => 'Local only', 'desc' => 'No screen data leaves your device'],
        ['title' => 'Repeatable', 'desc' => 'Retest multiple panels in the same browser session']
    ],
    'featureSection' => [
        'kicker' => 'Designed for panel inspection',
        'title' => 'What This Dead Pixel Checker Helps You Catch',
        'lede' => 'Dead pixels are easiest to confirm when the whole panel changes color and a bad pixel stays permanently dark.',
        'cards' => [
            ['title' => 'Black pixels on bright screens', 'text' => 'Dead pixels usually stand out when you switch to white, red, green, or blue backgrounds.'],
            ['title' => 'Corner and edge defects', 'text' => 'Full-screen mode helps you inspect the spots people often miss on quick checks.'],
            ['title' => 'Return-window verification', 'text' => 'Run a fast check on new monitors, laptops, and portable displays before keeping them.'],
            ['title' => 'Browser-safe workflow', 'text' => 'You do not need any software install or driver utility to complete the test.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Find Dead Pixels',
        'lede' => 'Switch through solid colors, go full screen, and scan each zone of the panel from left to right.',
        'steps' => [
            ['image' => 'images/screen-test/step-1.svg', 'alt' => 'Dead pixel test step 1 open the live monitor checker', 'title' => 'Open the tester', 'text' => 'Start with the live preview and click into full-screen mode for a clean inspection view.'],
            ['image' => 'images/screen-test/step-2.svg', 'alt' => 'Dead pixel test step 2 cycle color screens', 'title' => 'Cycle through color screens', 'text' => 'Use white plus the main RGB colors to reveal black pixels that stay unchanged.'],
            ['image' => 'images/screen-test/step-3.svg', 'alt' => 'Dead pixel test step 3 inspect corners and center', 'title' => 'Inspect the full panel', 'text' => 'Check the center, edges, and corners carefully before moving to the next color.']
        ]
    ],
    'clusterTool' => 'screen',
    'currentTool' => 'screen',
    'seoContentInclude' => 'help/seo-content/dead-pixel-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/screen-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';

