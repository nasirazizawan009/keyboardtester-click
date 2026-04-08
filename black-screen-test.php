<?php
$intentPage = [
    'meta' => [
        'title' => 'Black Screen Test Online | Full Screen Monitor Check',
        'description' => 'Use a black screen test online to inspect backlight bleed, IPS glow, bright defects, and display issues on monitors, laptops, and TVs.',
        'keywords' => 'black screen test, full black screen, monitor black screen test, backlight bleed test',
        'ogImage' => 'images/screen-test/hero.png',
        'ogImageAlt' => 'Black screen test tool for monitor and laptop inspection'
    ],
    'schemaKey' => 'black_screen_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Black Screen Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Dark-screen diagnostics',
        'title' => 'Black Screen Test Online',
        'lede' => 'Open a clean black screen, go full screen, and inspect your display for edge glow, backlight bleed, and bright defects without installing anything.',
        'primaryHref' => '#black-screen-tool',
        'primaryLabel' => 'Open black screen test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Full screen', 'Monitor friendly', 'Browser based'],
        'metrics' => [
            ['value' => 'Black', 'label' => 'Default view'],
            ['value' => 'Live', 'label' => 'Full-screen check'],
            ['value' => '0', 'label' => 'Installs']
        ],
        'image' => 'images/screen-test/hero.png',
        'imageAlt' => 'Black screen test page for monitor backlight bleed inspection',
        'miniCards' => [
            ['title' => 'Dark-room friendly', 'text' => 'Useful for edge glow and bleed checks that only show clearly on a dark screen.'],
            ['title' => 'Quick monitor triage', 'text' => 'Helpful right after buying a monitor, laptop, or portable display.']
        ]
    ],
    'toolStageId' => 'black-screen-tool',
    'toolShellId' => 'black-screen-shell',
    'toolSection' => [
        'kicker' => 'Live display check',
        'title' => 'Black Screen Test Tool',
        'lede' => 'Start below, switch to full screen, and inspect the entire panel on a clean black background.'
    ],
    'toolInclude' => 'screentesttool.php',
    'toolIncludeVars' => [
        'screenTestPreset' => 'black'
    ],
    'trustItems' => [
        ['title' => 'Black default view', 'desc' => 'Open directly on a dark inspection screen'],
        ['title' => 'Full-screen mode', 'desc' => 'Check edges and corners without extra UI'],
        ['title' => 'Useful in dim rooms', 'desc' => 'Dark environments reveal bleed and glow more clearly'],
        ['title' => 'Local only', 'desc' => 'The test runs in your browser']
    ],
    'featureSection' => [
        'kicker' => 'Built for dark-screen checks',
        'title' => 'What a Black Screen Test Helps You Catch',
        'lede' => 'A clean black background is useful when bright defects stand out more clearly than they do on a normal desktop.',
        'cards' => [
            ['title' => 'Backlight bleed', 'text' => 'Look for uneven bright patches around edges or corners when the room is dim.'],
            ['title' => 'IPS glow and haze', 'text' => 'Dark screens make glow, haze, and panel flare easier to compare from your normal viewing angle.'],
            ['title' => 'Bright defect spots', 'text' => 'Hot pixels and stray bright points stand out against a black background.'],
            ['title' => 'Return-window inspection', 'text' => 'Run a quick screen check before deciding whether to keep a new panel.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Use the Black Screen Test',
        'lede' => 'Darken the room, open the full-screen test, and scan the panel slowly from the center outward.',
        'steps' => [
            ['image' => 'images/screen-test/step-1.png', 'alt' => 'Black screen test step 1 open the monitor checker', 'title' => 'Open the black screen', 'text' => 'Start the page and confirm the preview is already on a black background.'],
            ['image' => 'images/screen-test/step-2.png', 'alt' => 'Black screen test step 2 switch to full screen mode', 'title' => 'Go full screen', 'text' => 'Use the full-screen mode so the display can be checked without browser chrome around it.'],
            ['image' => 'images/screen-test/step-3.png', 'alt' => 'Black screen test step 3 inspect edges and corners', 'title' => 'Inspect edges and corners', 'text' => 'Check for glow, bleed, or bright defects before comparing with white or RGB screens if needed.']
        ]
    ],
    'clusterTool' => 'screen',
    'currentTool' => 'screen',
    'seoContentInclude' => 'help/seo-content/black-screen-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/screen-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
