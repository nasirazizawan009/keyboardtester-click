<?php
$intentPage = [
    'meta' => [
        'title' => 'Test My Mic Online | Quick Microphone Check',
        'description' => 'Test my mic online with a quick browser-based microphone check. Verify mic access, live voice input, and peak level before meetings or recordings.',
        'keywords' => 'test my mic, test my microphone, quick mic test, microphone check online',
        'ogImage' => 'images/mic-test/hero.svg',
        'ogImageAlt' => 'Quick test my mic page with live browser microphone meter'
    ],
    'schemaKey' => 'test_my_mic',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Test My Mic', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Quick mic check',
        'title' => 'Test My Mic Online',
        'lede' => 'Need a fast answer before a call or interview? Start the live mic checker below, allow permission, and confirm your voice is reaching the browser.',
        'primaryHref' => '#test-my-mic-tool',
        'primaryLabel' => 'Test my mic now',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Fast check', 'Browser based', 'No recording'],
        'metrics' => [
            ['value' => 'Live', 'label' => 'Meter response'],
            ['value' => 'Peak', 'label' => 'Volume check'],
            ['value' => '0', 'label' => 'Uploads']
        ],
        'image' => 'images/mic-test/hero.svg',
        'imageAlt' => 'Test my mic page with real-time browser input meter',
        'miniCards' => [
            ['title' => 'Meeting-ready', 'text' => 'Useful right before Zoom, Meet, Teams, classes, and interviews.'],
            ['title' => 'Simple answer', 'text' => 'If the meter moves when you speak, your mic is reaching the browser.']
        ]
    ],
    'toolStageId' => 'test-my-mic-tool',
    'toolShellId' => 'test-my-mic-shell',
    'toolSection' => [
        'kicker' => 'Live microphone check',
        'title' => 'Quick Mic Tester',
        'lede' => 'Use the mic tool below for a fast pass/fail check before you join a call or start recording.'
    ],
    'toolInclude' => 'tools/mic_tester_tool.php',
    'trustItems' => [
        ['title' => 'Fast answer', 'desc' => 'Confirm mic activity in seconds'],
        ['title' => 'No account', 'desc' => 'Open the page and start testing immediately'],
        ['title' => 'Live peak tracking', 'desc' => 'See whether your voice reaches usable levels'],
        ['title' => 'Private workflow', 'desc' => 'This page checks live input instead of recording or uploading audio']
    ],
    'featureSection' => [
        'kicker' => 'Built for quick checks',
        'title' => 'When a Test My Mic Page Is More Useful Than a Full Audio App',
        'lede' => 'Sometimes you do not need a studio workflow. You just need to know whether the browser can hear your microphone right now.',
        'cards' => [
            ['title' => 'Before meetings', 'text' => 'Run a fast mic check before Zoom, Meet, Teams, Discord, or a browser interview.'],
            ['title' => 'After plugging in a headset', 'text' => 'Confirm the new device is active before you join a live call.'],
            ['title' => 'Permission troubleshooting', 'text' => 'A silent meter often points to blocked browser permission or a muted microphone.'],
            ['title' => 'Peak volume check', 'text' => 'See whether your voice is too quiet or reaches a healthy level when you speak normally.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Test My Mic Quickly',
        'lede' => 'Start the live meter, allow access, speak normally, and make sure the level display reacts immediately.',
        'steps' => [
            ['image' => 'images/mic-test/step-1.svg', 'alt' => 'Test my mic step 1 allow microphone permission', 'title' => 'Start and allow access', 'text' => 'Click the start button and allow microphone permission when the browser asks.'],
            ['image' => 'images/mic-test/step-2.svg', 'alt' => 'Test my mic step 2 speak into microphone and watch levels', 'title' => 'Speak into the mic', 'text' => 'Use your normal voice and watch whether the level meter and peak value rise.'],
            ['image' => 'images/mic-test/step-3.svg', 'alt' => 'Test my mic step 3 confirm the browser receives audio input', 'title' => 'Confirm the result', 'text' => 'If the meter moves, the browser is receiving your microphone input and the check passes.']
        ]
    ],
    'clusterTool' => 'mic',
    'currentTool' => 'mic',
    'seoContentInclude' => 'help/seo-content/test-my-mic.php',
    'showToolsList' => true,
    'helpInclude' => 'help/mic-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
