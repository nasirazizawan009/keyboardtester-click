<?php
$intentPage = [
    'meta' => [
        'title' => 'Keyboard Ghosting Test — Anti-Ghosting & N-Key Rollover Check Online | KeyboardTester.click',
        'description' => 'Free keyboard ghosting test online. Press multiple keys together to detect ghosting and check N-key rollover (NKRO). No download. Works in any browser. Instant results.',
        'keywords' => 'keyboard ghosting test, anti ghosting keyboard test, test keyboard ghosting, multiple key press test',
        'ogImage' => 'images/keyboard/hero-keyboard-test-1400.png',
        'ogImageAlt' => 'Keyboard ghosting test using a live online keyboard tester'
    ],
    'schemaKey' => 'keyboard_ghosting',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Keyboard Ghosting Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Gaming keyboard diagnostics',
        'title' => 'Keyboard Ghosting Test',
        'lede' => 'Press several keys together and see whether every combo registers. Use this live tester to find blocked combinations, phantom inputs, and weak anti-ghosting zones.',
        'primaryHref' => '#keyboard-ghosting-tool',
        'primaryLabel' => 'Start ghosting test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Multi-key check', 'Gaming friendly', 'No installs'],
        'metrics' => [
            ['value' => '104+', 'label' => 'Keys mapped'],
            ['value' => 'Live', 'label' => 'Combo feedback'],
            ['value' => '0', 'label' => 'Downloads']
        ],
        'image' => 'images/keyboard/hero-keyboard-test-900.png',
        'imageAlt' => 'Online keyboard ghosting test with real-time key highlighting',
        'miniCards' => [
            ['title' => 'Common gaming combos', 'text' => 'Check WASD, Shift, Ctrl, and Space combinations before competitive play.'],
            ['title' => 'Laptop keyboard checks', 'text' => 'Find weak zones on built-in keyboards where combos stop registering.']
        ]
    ],
    'toolStageId' => 'keyboard-ghosting-tool',
    'toolShellId' => 'keyboard-ghosting-shell',
    'toolSection' => [
        'kicker' => 'Live keyboard test',
        'title' => 'Ghosting and Multi-Key Checker',
        'lede' => 'Use the full keyboard tester below, then hold multiple keys at the same time to see whether every press appears on screen.'
    ],
    'toolInclude' => 'tools/keyboard_tester_english.php',
    'trustItems' => [
        ['title' => 'Real-time highlights', 'desc' => 'See every key that the browser actually receives'],
        ['title' => 'Layout aware', 'desc' => 'Useful for laptops, office boards, and gaming keyboards'],
        ['title' => 'No account', 'desc' => 'Open the tester and start pressing combos'],
        ['title' => 'Good for troubleshooting', 'desc' => 'Helpful before support tickets or returns']
    ],
    'featureSection' => [
        'kicker' => 'Made for combo checks',
        'title' => 'What a Ghosting Test Reveals',
        'lede' => 'Ghosting problems show up when some keys disappear from a combo or unexpected behavior appears under multi-key load.',
        'cards' => [
            ['title' => 'Blocked combinations', 'text' => 'Find movement and modifier combos that fail under real gameplay conditions.'],
            ['title' => 'Weak matrix zones', 'text' => 'Some keyboards fail only in specific rows or columns, not across the whole board.'],
            ['title' => 'Anti-ghosting limits', 'text' => 'Confirm whether the advertised gaming zones really support the combos you use.'],
            ['title' => 'Hardware comparison', 'text' => 'Compare a laptop keyboard with an external keyboard in the same browser.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Test Keyboard Ghosting',
        'lede' => 'Use the live key map, then repeat the combos that usually fail in games or shortcuts.',
        'steps' => [
            ['image' => 'images/keyboard/Press-any-key-512.png', 'alt' => 'Keyboard ghosting test step 1 open the live key map', 'title' => 'Open the live key map', 'text' => 'Focus the tester and make sure single key presses register normally first.'],
            ['image' => 'images/keyboard/special-keys-layout-640.png', 'alt' => 'Keyboard ghosting test step 2 press multi key combos', 'title' => 'Press multi-key combos', 'text' => 'Try WASD with Shift, Space, Ctrl, or the work shortcuts that often fail on your keyboard.'],
            ['image' => 'images/keyboard/color-system-guide-640.png', 'alt' => 'Keyboard ghosting test step 3 review missing key inputs', 'title' => 'Review missing keys', 'text' => 'If a pressed key does not light up, you have found a blocked combo or ghosting limitation.']
        ]
    ],
    'clusterTool' => 'keyboard',
    'currentTool' => 'keyboard',
    'seoContentInclude' => 'help/seo-content/keyboard-ghosting-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/keyboard-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
