<?php
$intentPage = [
    'meta' => [
        'title' => 'Stuck Key Test — Check Jammed or Repeating Keyboard Keys | KeyboardTester.click',
        'description' => 'Use a free stuck key test online to check repeating, jammed, or unresponsive keyboard keys. Press the problem key and verify how it behaves in real time.',
        'keywords' => 'stuck key test, repeating key test, stuck keyboard key, jammed keyboard key test',
        'ogImage' => 'images/keyboard/hero-keyboard-test-1400.png',
        'ogImageAlt' => 'Stuck key test using the live online keyboard tester'
    ],
    'schemaKey' => 'stuck_key_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Stuck Key Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Keyboard troubleshooting',
        'title' => 'Stuck Key Test',
        'lede' => 'Check whether a repeating, jammed, or unresponsive key is still registering correctly. Use the live keyboard tool below to inspect the exact problem key in real time.',
        'primaryHref' => '#stuck-key-tool',
        'primaryLabel' => 'Start stuck key test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Live key feedback', 'No installs', 'Keyboard troubleshooting'],
        'metrics' => [
            ['value' => '104+', 'label' => 'Keys mapped'],
            ['value' => 'Live', 'label' => 'Key response'],
            ['value' => '0', 'label' => 'Downloads']
        ],
        'image' => 'images/keyboard/hero-keyboard-test-900.png',
        'imageAlt' => 'Online stuck key tester with real-time keyboard highlights',
        'miniCards' => [
            ['title' => 'Repeating key check', 'text' => 'See whether a key triggers too often, stays active, or fails to release cleanly.'],
            ['title' => 'Support-ticket proof', 'text' => 'Use the page to confirm the problem before cleaning, repairing, or replacing the keyboard.']
        ]
    ],
    'toolStageId' => 'stuck-key-tool',
    'toolShellId' => 'stuck-key-shell',
    'toolSection' => [
        'kicker' => 'Live keyboard test',
        'title' => 'Stuck Key Checker',
        'lede' => 'Use the full keyboard tester below and press the suspected key several times to confirm whether it sticks, repeats, or fails to register.'
    ],
    'toolInclude' => 'tools/keyboard_tester_english.php',
    'trustItems' => [
        ['title' => 'Single-key diagnosis', 'desc' => 'Check one problem key without installing software'],
        ['title' => 'Real-time response', 'desc' => 'See whether the key lights normally and releases correctly'],
        ['title' => 'Works on laptops and keyboards', 'desc' => 'Useful for built-in laptop boards and external devices'],
        ['title' => 'Good before cleaning or replacement', 'desc' => 'Confirm the problem before opening hardware or ordering parts']
    ],
    'featureSection' => [
        'kicker' => 'Focused key troubleshooting',
        'title' => 'What This Stuck Key Test Helps You Confirm',
        'lede' => 'A bad key may repeat too often, stay active, or fail to register at all. This page lets you isolate the exact behavior.',
        'cards' => [
            ['title' => 'Repeating characters', 'text' => 'Check whether the key keeps firing even after you release it.'],
            ['title' => 'Intermittent response', 'text' => 'Some keys work only on hard presses or fail randomly over time.'],
            ['title' => 'Jammed or sticky feel', 'text' => 'Compare the key response on screen with what you feel physically under your finger.'],
            ['title' => 'Before-and-after testing', 'text' => 'Retest the key after cleaning, keycap removal, or keyboard replacement.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Test a Stuck Keyboard Key',
        'lede' => 'Focus the tester, press the problem key repeatedly, and compare its behavior against nearby keys that still work normally.',
        'steps' => [
            ['image' => 'images/keyboard/Press-any-key-512.png', 'alt' => 'Stuck key test step 1 open the live keyboard tester', 'title' => 'Open the keyboard tester', 'text' => 'Start the live key map and make sure the page is focused before testing the faulty key.'],
            ['image' => 'images/keyboard/special-keys-layout-640.png', 'alt' => 'Stuck key test step 2 press the suspected key multiple times', 'title' => 'Press the problem key several times', 'text' => 'Watch for repeated highlights, delayed release, or a key that does not appear at all.'],
            ['image' => 'images/keyboard/color-system-guide-640.png', 'alt' => 'Stuck key test step 3 compare with nearby working keys', 'title' => 'Compare with nearby keys', 'text' => 'Test neighboring keys so you can tell whether the issue is isolated or part of a larger keyboard fault.']
        ]
    ],
    'clusterTool' => 'keyboard',
    'currentTool' => 'keyboard',
    'seoContentInclude' => 'help/seo-content/stuck-key-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/keyboard-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';

