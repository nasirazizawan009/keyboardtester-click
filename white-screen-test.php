<?php
$intentPage = [
    'meta' => [
        'title' => 'White Screen Test Online | Full White Screen Checker',
        'description' => 'Use a white screen test online to inspect stuck pixels, dust, tint, and panel uniformity on monitors, laptops, and mobile displays.',
        'keywords' => 'white screen test, full white screen, monitor white screen test, stuck pixel white screen',
        'ogImage' => 'images/screen-test/hero.png',
        'ogImageAlt' => 'White screen test tool for stuck pixel and monitor checks'
    ],
    'schemaKey' => 'white_screen_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'White Screen Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Bright-screen diagnostics',
        'title' => 'White Screen Test Online',
        'lede' => 'Open a clean white screen, go full screen, and inspect your display for stuck pixels, tint, dust, and uneven brightness in the browser.',
        'primaryHref' => '#white-screen-tool',
        'primaryLabel' => 'Open white screen test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['White default', 'Full screen', 'No installs'],
        'metrics' => [
            ['value' => 'White', 'label' => 'Default view'],
            ['value' => 'Live', 'label' => 'Panel check'],
            ['value' => '0', 'label' => 'Uploads']
        ],
        'image' => 'images/screen-test/hero.png',
        'imageAlt' => 'White screen test page for stuck pixel and uniformity inspection',
        'miniCards' => [
            ['title' => 'Bright-background checks', 'text' => 'Good for finding colored dots, dust, and uneven white balance across the panel.'],
            ['title' => 'Fast cleaning check', 'text' => 'A full white screen makes smudges and panel marks easy to notice.']
        ]
    ],
    'toolStageId' => 'white-screen-tool',
    'toolShellId' => 'white-screen-shell',
    'toolSection' => [
        'kicker' => 'Live display check',
        'title' => 'White Screen Test Tool',
        'lede' => 'The tester below opens on white so you can inspect the full panel immediately.'
    ],
    'toolInclude' => 'screentesttool.php',
    'toolIncludeVars' => [
        'screenTestPreset' => 'white'
    ],
    'trustItems' => [
        ['title' => 'White default view', 'desc' => 'Start directly on a bright inspection surface'],
        ['title' => 'Uniformity checks', 'desc' => 'Spot tint and uneven brightness more easily'],
        ['title' => 'Stuck-pixel friendly', 'desc' => 'Colored defects show up clearly on white backgrounds'],
        ['title' => 'Local only', 'desc' => 'The test runs in your browser']
    ],
    'featureSection' => [
        'kicker' => 'Built for bright-screen checks',
        'title' => 'What a White Screen Test Helps You See',
        'lede' => 'A full white background makes tiny colored defects and panel uniformity problems easier to inspect than a normal desktop wallpaper.',
        'cards' => [
            ['title' => 'Stuck pixels', 'text' => 'Colored dots that stay lit often stand out quickly on a clean white screen.'],
            ['title' => 'Dust and marks', 'text' => 'Surface dirt, smudges, and stuck debris are much easier to notice on white.'],
            ['title' => 'Tint and uniformity', 'text' => 'Check whether one side of the display looks warmer, cooler, dimmer, or dirtier than the rest.'],
            ['title' => 'Brightness consistency', 'text' => 'Compare the center, edges, and corners for uneven luminance patterns.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Use the White Screen Test',
        'lede' => 'Open the page, go full screen, and scan the panel in slow rows from top to bottom.',
        'steps' => [
            ['image' => 'images/screen-test/step-1.png', 'alt' => 'White screen test step 1 open the full white monitor checker', 'title' => 'Open the white screen', 'text' => 'Start the page and confirm the preview opens directly on a white background.'],
            ['image' => 'images/screen-test/step-2.png', 'alt' => 'White screen test step 2 switch to full screen mode', 'title' => 'Go full screen', 'text' => 'Use full-screen mode for a cleaner inspection surface and fewer distractions.'],
            ['image' => 'images/screen-test/step-3.png', 'alt' => 'White screen test step 3 inspect the full panel for tint and stuck pixels', 'title' => 'Inspect the whole panel', 'text' => 'Look for colored dots, tint shifts, dust, and brightness differences before comparing with other colors.']
        ]
    ],
    'clusterTool' => 'screen',
    'currentTool' => 'screen',
    'seoContentInclude' => 'help/seo-content/white-screen-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/screen-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
