<?php
$intentPage = [
    'meta' => [
        'title' => 'N-Key Rollover Test Online | Check NKRO and 6KRO',
        'description' => 'Use a free N-key rollover test online to see how many keys your keyboard can register at once. Check NKRO, 6KRO, and common gaming combos in the browser.',
        'keywords' => 'n key rollover test, nkro test, 6 key rollover test, simultaneous key press test',
        'ogImage' => 'images/keyboard/hero-keyboard-test-1400.png',
        'ogImageAlt' => 'N-key rollover test on an online keyboard tester'
    ],
    'schemaKey' => 'n_key_rollover',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'N-Key Rollover Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Keyboard rollover diagnostics',
        'title' => 'N-Key Rollover Test Online',
        'lede' => 'Measure how many simultaneous key presses your keyboard can handle. Check whether your board behaves like 2KRO, 6KRO, or full NKRO using the live tester below.',
        'primaryHref' => '#rollover-tool',
        'primaryLabel' => 'Start NKRO test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Simultaneous keys', 'Gaming friendly', 'Browser based'],
        'metrics' => [
            ['value' => '2KRO+', 'label' => 'Compare limits'],
            ['value' => 'Live', 'label' => 'Key feedback'],
            ['value' => '0', 'label' => 'Software installs']
        ],
        'image' => 'images/keyboard/hero-keyboard-test-900.png',
        'imageAlt' => 'N-key rollover checker showing multiple key press feedback',
        'miniCards' => [
            ['title' => 'Good for gamers', 'text' => 'Check whether movement, sprint, crouch, and ability combos register together.'],
            ['title' => 'Good for typists', 'text' => 'Fast typists can verify whether heavy key overlap causes missed inputs.']
        ]
    ],
    'toolStageId' => 'rollover-tool',
    'toolShellId' => 'rollover-shell',
    'toolSection' => [
        'kicker' => 'Live keyboard test',
        'title' => 'N-Key Rollover Checker',
        'lede' => 'Use the full keyboard tester below and hold more keys together each round to find your keyboard rollover limit.'
    ],
    'toolInclude' => 'tools/keyboard_tester_english.php',
    'trustItems' => [
        ['title' => 'Immediate feedback', 'desc' => 'Count how many keys stay lit during each combo'],
        ['title' => 'Works on common keyboards', 'desc' => 'Useful for office, laptop, wireless, and gaming boards'],
        ['title' => 'No setup friction', 'desc' => 'Open the page and start testing rollover'],
        ['title' => 'Repeatable results', 'desc' => 'Try different rows, modifiers, and layouts']
    ],
    'featureSection' => [
        'kicker' => 'Rollover-focused testing',
        'title' => 'What an NKRO Test Tells You',
        'lede' => 'Rollover testing is about how many keys the hardware can report together without dropping inputs.',
        'cards' => [
            ['title' => '2KRO vs 6KRO vs NKRO', 'text' => 'Understand whether your keyboard is limited to a few keys or handles large combinations well.'],
            ['title' => 'Gaming readiness', 'text' => 'Some keyboards advertise anti-ghosting but still fail on specific movement combinations.'],
            ['title' => 'Modifier stability', 'text' => 'Test how Ctrl, Shift, Alt, and Space affect the total number of recognized presses.'],
            ['title' => 'Shortcut reliability', 'text' => 'Work users can verify whether complicated shortcuts fail during heavy use.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Check N-Key Rollover',
        'lede' => 'Start small, then keep adding keys until the on-screen keyboard stops matching what your fingers are pressing.',
        'steps' => [
            ['image' => 'images/keyboard/Press-any-key-512.png', 'alt' => 'N-key rollover test step 1 verify normal single key input', 'title' => 'Verify single keys first', 'text' => 'Make sure the board works normally before testing large combinations.'],
            ['image' => 'images/keyboard/special-keys-layout-640.png', 'alt' => 'N-key rollover test step 2 hold more keys together', 'title' => 'Add keys gradually', 'text' => 'Start with two keys, then three, four, and more while watching the live highlights.'],
            ['image' => 'images/keyboard/color-system-guide-640.png', 'alt' => 'N-key rollover test step 3 compare how many keys stay active', 'title' => 'Find the limit', 'text' => 'When a held key disappears, you have reached the rollover boundary for that zone or combo.']
        ]
    ],
    'clusterTool' => 'keyboard',
    'currentTool' => 'keyboard',
    'seoContentInclude' => 'help/seo-content/n-key-rollover-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/keyboard-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';

