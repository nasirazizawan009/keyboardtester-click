<?php
$intentPage = [
    'meta' => [
        'title' => 'Microphone Volume Test Online | Check Mic Input Level',
        'description' => 'Test microphone volume online with a live browser meter. See current level and peak mic volume without recording audio.',
        'keywords' => 'microphone volume test, mic volume test online, test mic input level, microphone level checker',
        'ogImage' => 'images/mic-test/hero.svg',
        'ogImageAlt' => 'Microphone volume test page with live browser meter'
    ],
    'schemaKey' => 'microphone_volume_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Microphone Volume Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Mic level diagnostics',
        'title' => 'Microphone Volume Test Online',
        'lede' => 'Check how strong your microphone input is with a live browser meter that shows current level and peak volume without recording your voice.',
        'primaryHref' => '#mic-volume-tool',
        'primaryLabel' => 'Start mic volume test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Live level', 'Peak tracking', 'No recording'],
        'metrics' => [
            ['value' => 'Live', 'label' => 'Current level'],
            ['value' => 'Peak', 'label' => 'Volume check'],
            ['value' => '0', 'label' => 'Uploads']
        ],
        'image' => 'images/mic-test/hero.svg',
        'imageAlt' => 'Microphone volume test page with current and peak input meter',
        'miniCards' => [
            ['title' => 'Pre-call volume check', 'text' => 'Useful before meetings, interviews, classes, or support calls.'],
            ['title' => 'Gain troubleshooting', 'text' => 'See quickly whether the mic is too quiet or completely silent in the browser.']
        ]
    ],
    'toolStageId' => 'mic-volume-tool',
    'toolShellId' => 'mic-volume-shell',
    'toolSection' => [
        'kicker' => 'Live mic level check',
        'title' => 'Microphone Volume Test Tool',
        'lede' => 'Use the live mic meter below to check whether your voice reaches a usable input level.'
    ],
    'toolInclude' => 'tools/mic_tester_tool.php',
    'trustItems' => [
        ['title' => 'Current level', 'desc' => 'See live meter movement while you speak'],
        ['title' => 'Peak value', 'desc' => 'Check how loud your voice gets during the test'],
        ['title' => 'No recording', 'desc' => 'This page checks levels without saving audio'],
        ['title' => 'Browser based', 'desc' => 'No install or account needed']
    ],
    'featureSection' => [
        'kicker' => 'Built for input level checks',
        'title' => 'What This Microphone Volume Test Helps You Confirm',
        'lede' => 'A mic can be detected and still be too quiet. This page focuses on whether the browser sees useful signal level from your voice.',
        'cards' => [
            ['title' => 'Very quiet microphones', 'text' => 'See whether the mic responds at all and whether normal speech barely moves the meter.'],
            ['title' => 'Permission vs level issues', 'text' => 'Separate silent-browser problems from simple input-volume problems.'],
            ['title' => 'Headset swap checks', 'text' => 'Retest quickly after plugging in a new headset or USB mic.'],
            ['title' => 'Meeting readiness', 'text' => 'Do a fast volume check before joining Zoom, Meet, Teams, Discord, or browser interviews.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Test Microphone Volume',
        'lede' => 'Start the meter, allow access, speak normally, then compare the current level and peak readout.',
        'steps' => [
            ['image' => 'images/mic-test/step-1.svg', 'alt' => 'Microphone volume test step 1 allow mic permission', 'title' => 'Start and allow access', 'text' => 'Click start and approve microphone access when the browser asks.'],
            ['image' => 'images/mic-test/step-2.svg', 'alt' => 'Microphone volume test step 2 speak and watch live meter', 'title' => 'Speak at normal volume', 'text' => 'Use the voice level you expect to use in a call or recording and watch the meter move.'],
            ['image' => 'images/mic-test/step-3.svg', 'alt' => 'Microphone volume test step 3 compare current level and peak value', 'title' => 'Check the peak', 'text' => 'Use the peak reading to see whether your voice ever reaches a healthy input level during the test.']
        ]
    ],
    'clusterTool' => 'mic',
    'currentTool' => 'mic',
    'seoContentInclude' => 'help/seo-content/microphone-volume-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/mic-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
