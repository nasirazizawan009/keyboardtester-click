<?php
$intentPage = [
    'meta' => [
        'title' => 'Double Click Test Online | Check Mouse Switch Bounce',
        'description' => 'Run a double click test online to inspect suspicious rapid clicks, switch bounce, and possible ghost-click behavior in your mouse.',
        'keywords' => 'double click test, mouse double click test, switch bounce test, ghost click test',
        'ogImage' => 'images/ghost-click/hero.png',
        'ogImageAlt' => 'Double click test page for checking mouse switch bounce'
    ],
    'schemaKey' => 'double_click_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Double Click Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Mouse switch diagnostics',
        'title' => 'Double Click Test Online',
        'lede' => 'Use the live click interval detector below to check whether single presses create suspicious rapid double-click behavior in the browser.',
        'primaryHref' => '#double-click-tool',
        'primaryLabel' => 'Start double click test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Rapid interval log', 'Browser based', 'Switch-bounce clue'],
        'metrics' => [
            ['value' => '300 ms', 'label' => 'Fast-click flag'],
            ['value' => 'Live', 'label' => 'Click log'],
            ['value' => '0', 'label' => 'Installs']
        ],
        'image' => 'images/ghost-click/hero.png',
        'imageAlt' => 'Double click test page with live click interval detector',
        'miniCards' => [
            ['title' => 'Switch-bounce checks', 'text' => 'Useful when a single press sometimes behaves like a double click.'],
            ['title' => 'Repeatable evidence', 'text' => 'Reset, retest, and compare behavior after cleaning or driver changes.']
        ]
    ],
    'toolStageId' => 'double-click-tool',
    'toolShellId' => 'double-click-shell',
    'toolSection' => [
        'kicker' => 'Live click interval check',
        'title' => 'Double Click Detector',
        'lede' => 'Start the tool below, click naturally, and review whether suspiciously fast intervals appear in the results log.'
    ],
    'toolInclude' => 'tools/ghost_click_detector_tool.php',
    'trustItems' => [
        ['title' => 'Fast interval logging', 'desc' => 'See timing between clicks in real time'],
        ['title' => 'Suspicious click flagging', 'desc' => 'Surface rapid repeated input that may point to switch wear'],
        ['title' => 'Reset and retest', 'desc' => 'Compare before and after driver or cleaning changes'],
        ['title' => 'Local only', 'desc' => 'The detector runs in your browser']
    ],
    'featureSection' => [
        'kicker' => 'Built for double-click issues',
        'title' => 'What This Double Click Test Helps You Catch',
        'lede' => 'Unwanted double clicks usually show up as extremely fast repeated events. This page makes those intervals easier to spot.',
        'cards' => [
            ['title' => 'Switch bounce suspicion', 'text' => 'Single presses that create rapid repeated events can point to a worn or unstable switch.'],
            ['title' => 'Warranty evidence', 'text' => 'A repeatable click log is useful when you need to explain the problem clearly.'],
            ['title' => 'Before buying a replacement', 'text' => 'Run a controlled browser check before deciding the hardware is truly failing.'],
            ['title' => 'After quick fixes', 'text' => 'Retest after cleaning, driver changes, or USB-port changes to see whether behavior improved.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Check for Double Click Issues',
        'lede' => 'Start the detector, click naturally, and watch the interval log for suspicious rapid repeats.',
        'steps' => [
            ['image' => 'images/ghost-click/step-1.png', 'alt' => 'Double click test step 1 start the detector', 'title' => 'Start the detector', 'text' => 'Activate the test so every click inside the area is logged.'],
            ['image' => 'images/ghost-click/step-2.png', 'alt' => 'Double click test step 2 click naturally in the test area', 'title' => 'Click naturally', 'text' => 'Use the button as you normally would instead of trying to game the result.'],
            ['image' => 'images/ghost-click/step-3.png', 'alt' => 'Double click test step 3 review suspicious rapid click intervals', 'title' => 'Review the log', 'text' => 'Look for repeated fast intervals, reset, and retest a few times before drawing conclusions.']
        ]
    ],
    'clusterTool' => 'mouse',
    'currentTool' => 'ghost-click',
    'seoContentInclude' => 'help/seo-content/double-click-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/ghost-click-detector.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
