<?php
$intentPage = [
    'meta' => [
        'title' => 'Scroll Wheel Test Online | Check Mouse Wheel Direction',
        'description' => 'Test your mouse scroll wheel online. Verify up/down wheel input, middle click, and inconsistent scrolling in a browser-based checker.',
        'keywords' => 'scroll wheel test, mouse wheel test, test mouse scroll wheel, middle click test',
        'ogImage' => 'images/mouse/hero.png',
        'ogImageAlt' => 'Scroll wheel test page for checking mouse wheel direction and count'
    ],
    'schemaKey' => 'scroll_wheel_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Scroll Wheel Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Mouse wheel diagnostics',
        'title' => 'Scroll Wheel Test Online',
        'lede' => 'Roll the wheel up and down inside the live tester to check direction, count, and middle-click behavior without installing any software.',
        'primaryHref' => '#scroll-wheel-tool',
        'primaryLabel' => 'Start scroll wheel test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Live wheel count', 'Direction status', 'Middle click'],
        'metrics' => [
            ['value' => 'Up/Down', 'label' => 'Direction check'],
            ['value' => 'Live', 'label' => 'Status updates'],
            ['value' => '0', 'label' => 'Installs']
        ],
        'image' => 'images/mouse/hero.png',
        'imageAlt' => 'Scroll wheel test page for mouse wheel direction and middle-click checks',
        'miniCards' => [
            ['title' => 'Wheel troubleshooting', 'text' => 'Useful when scrolling skips, reverses, or stops responding cleanly.'],
            ['title' => 'Middle-click check', 'text' => 'Press the wheel too if browser tab or link behavior feels wrong.']
        ]
    ],
    'toolStageId' => 'scroll-wheel-tool',
    'toolShellId' => 'scroll-wheel-shell',
    'toolSection' => [
        'kicker' => 'Live mouse wheel check',
        'title' => 'Scroll Wheel Test Tool',
        'lede' => 'Use the live mouse panel below to verify wheel input, direction, and middle-click response.'
    ],
    'toolInclude' => 'tools/mouse_click_test.php',
    'trustItems' => [
        ['title' => 'Direction readout', 'desc' => 'See whether the browser receives up or down wheel events'],
        ['title' => 'Scroll counter', 'desc' => 'Confirm repeated scrolling increments reliably'],
        ['title' => 'Middle click support', 'desc' => 'Check wheel press behavior in the same panel'],
        ['title' => 'Local only', 'desc' => 'No mouse data leaves your device']
    ],
    'featureSection' => [
        'kicker' => 'Built for wheel problems',
        'title' => 'What This Scroll Wheel Test Helps You Check',
        'lede' => 'Scroll-wheel issues often show up as skipped input, reverse movement, or weak middle clicks. This page focuses on those symptoms.',
        'cards' => [
            ['title' => 'Skipped scrolling', 'text' => 'If counts lag behind your movement, the wheel encoder or browser input may be inconsistent.'],
            ['title' => 'Reverse direction', 'text' => 'Unexpected up/down changes can reveal software settings or hardware encoder problems.'],
            ['title' => 'Middle click wear', 'text' => 'Many older mice develop weak wheel-click switches long before the main buttons fail.'],
            ['title' => 'Before replacement', 'text' => 'Run a quick browser check before deciding whether the mouse is actually failing.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Test a Scroll Wheel',
        'lede' => 'Roll up, roll down, then press the wheel once or twice to confirm the main wheel functions respond correctly.',
        'steps' => [
            ['image' => 'images/mouse/step-1.png', 'alt' => 'Scroll wheel test step 1 focus the mouse test area', 'title' => 'Focus the test area', 'text' => 'Move the pointer over the mouse panel so wheel events are captured by the browser.'],
            ['image' => 'images/mouse/step-2.png', 'alt' => 'Scroll wheel test step 2 roll the wheel up and down', 'title' => 'Scroll in both directions', 'text' => 'Roll up and down several times and confirm the counter plus status update cleanly.'],
            ['image' => 'images/mouse/step-3.png', 'alt' => 'Scroll wheel test step 3 press the wheel for middle click', 'title' => 'Press the wheel', 'text' => 'Use middle click too if you suspect the wheel button is weak or inconsistent.']
        ]
    ],
    'clusterTool' => 'mouse',
    'currentTool' => 'mouse',
    'seoContentInclude' => 'help/seo-content/scroll-wheel-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/mouse-click-test.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
