<?php
$intentPage = [
    'meta' => [
        'title' => 'Left Right Speaker Test Online | Check Stereo Channels',
        'description' => 'Test left and right speakers or headphones online. Play isolated channel audio and confirm stereo output is mapped correctly in the browser.',
        'keywords' => 'left right speaker test, left right audio test, test left and right speakers, headphone left right test',
        'ogImage' => 'images/headphone-test/hero.svg',
        'ogImageAlt' => 'Left right speaker test page for stereo channel mapping'
    ],
    'schemaKey' => 'left_right_speaker_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Left Right Speaker Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Stereo channel diagnostics',
        'title' => 'Left Right Speaker Test Online',
        'lede' => 'Play isolated left and right channel audio to confirm your speakers or headphones are mapped correctly before calls, editing, or gaming.',
        'primaryHref' => '#left-right-speaker-tool',
        'primaryLabel' => 'Start left right test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Left channel', 'Right channel', 'Browser based'],
        'metrics' => [
            ['value' => 'L/R', 'label' => 'Channel isolation'],
            ['value' => 'Live', 'label' => 'Audio output'],
            ['value' => '0', 'label' => 'Installs']
        ],
        'image' => 'images/headphone-test/hero.svg',
        'imageAlt' => 'Left right speaker test page for headphone and speaker channels',
        'miniCards' => [
            ['title' => 'Swapped-channel checks', 'text' => 'Useful when left and right audio feel reversed in games, meetings, or editing work.'],
            ['title' => 'Headphone friendly', 'text' => 'Clear isolated channel playback works well with headphones and stereo speakers.']
        ]
    ],
    'toolStageId' => 'left-right-speaker-tool',
    'toolShellId' => 'left-right-speaker-shell',
    'toolSection' => [
        'kicker' => 'Live audio output check',
        'title' => 'Left Right Speaker Test Tool',
        'lede' => 'Use the audio panel below to play isolated left and right channel sounds and confirm stereo mapping.'
    ],
    'toolInclude' => 'tools/headphone_speaker_tester_tool.php',
    'trustItems' => [
        ['title' => 'Channel isolation', 'desc' => 'Play left and right audio separately'],
        ['title' => 'Stereo-friendly', 'desc' => 'Useful for speakers, headphones, and external audio interfaces'],
        ['title' => 'Quick retest', 'desc' => 'Compare behavior after cable or settings changes'],
        ['title' => 'Local playback', 'desc' => 'Audio stays in the browser']
    ],
    'featureSection' => [
        'kicker' => 'Built for channel mapping',
        'title' => 'What This Left Right Speaker Test Helps You Catch',
        'lede' => 'Stereo problems often come down to swapped channels, one silent side, or uneven output. This page focuses on those checks.',
        'cards' => [
            ['title' => 'Swapped channels', 'text' => 'Confirm that left output really reaches the left side and right output reaches the right side.'],
            ['title' => 'Silent side detection', 'text' => 'Find out quickly if one earcup or one speaker side is missing entirely.'],
            ['title' => 'Cable and adapter checks', 'text' => 'Retest after changing adapters, docks, or audio devices to see where the issue appears.'],
            ['title' => 'Fast setup verification', 'text' => 'Useful before gaming, editing, calls, or any work where stereo direction matters.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Test Left and Right Speakers',
        'lede' => 'Play the left channel, play the right channel, then confirm both match the correct side before moving on.',
        'steps' => [
            ['image' => 'images/headphone-test/step-1.svg', 'alt' => 'Left right speaker test step 1 connect speakers or headphones', 'title' => 'Connect your audio device', 'text' => 'Use the actual headphones or speakers you want to verify.'],
            ['image' => 'images/headphone-test/step-2.svg', 'alt' => 'Left right speaker test step 2 play isolated channel sounds', 'title' => 'Play each side separately', 'text' => 'Use the left and right channel controls to confirm the audio reaches the matching side.'],
            ['image' => 'images/headphone-test/step-3.svg', 'alt' => 'Left right speaker test step 3 confirm stereo mapping is correct', 'title' => 'Confirm the mapping', 'text' => 'If a side is swapped or silent, retest after changing cables, output devices, or system balance settings.']
        ]
    ],
    'clusterTool' => 'audio-output',
    'currentTool' => 'headphone',
    'seoContentInclude' => 'help/seo-content/left-right-speaker-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/headphone-speaker-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
