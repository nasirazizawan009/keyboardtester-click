<?php
$intentPage = [
    'meta' => [
        'title' => 'Stereo Test Online | Check Headphones and Speakers',
        'description' => 'Run a stereo test online to verify both audio channels, left-right balance, and speaker or headphone output in the browser.',
        'keywords' => 'stereo test online, stereo sound test, speaker stereo test, headphone stereo test',
        'ogImage' => 'images/headphone-test/hero.png',
        'ogImageAlt' => 'Stereo test page for headphones and speakers'
    ],
    'schemaKey' => 'stereo_test',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Stereo Test', 'url' => '']
    ],
    'hero' => [
        'kicker' => 'Stereo playback diagnostics',
        'title' => 'Stereo Test Online',
        'lede' => 'Run a fast stereo sound test in the browser to confirm both audio channels play correctly and your speakers or headphones sound balanced.',
        'primaryHref' => '#stereo-test-tool',
        'primaryLabel' => 'Start stereo test',
        'secondaryHref' => '#tools',
        'secondaryLabel' => 'Browse all tools',
        'badges' => ['Stereo playback', 'Balance check', 'Browser based'],
        'metrics' => [
            ['value' => 'Stereo', 'label' => 'Output check'],
            ['value' => '6', 'label' => 'Audio modes'],
            ['value' => '0', 'label' => 'Uploads']
        ],
        'image' => 'images/headphone-test/hero.png',
        'imageAlt' => 'Stereo test page for speaker and headphone output',
        'miniCards' => [
            ['title' => 'Balance testing', 'text' => 'Useful when one side sounds weaker, quieter, or missing.'],
            ['title' => 'Frequency coverage', 'text' => 'Go beyond one beep with sweeps, bass, treble, and noise tests.']
        ]
    ],
    'toolStageId' => 'stereo-test-tool',
    'toolShellId' => 'stereo-test-shell',
    'toolSection' => [
        'kicker' => 'Live audio output check',
        'title' => 'Stereo Test Tool',
        'lede' => 'Use the audio tester below to verify stereo playback, channel balance, and general output quality.'
    ],
    'toolInclude' => 'tools/headphone_speaker_tester_tool.php',
    'trustItems' => [
        ['title' => 'Stereo playback', 'desc' => 'Check both channels together and separately'],
        ['title' => 'Multiple sound modes', 'desc' => 'Run sweeps, bass, treble, balance, and noise tests'],
        ['title' => 'Volume control', 'desc' => 'Adjust playback level during testing'],
        ['title' => 'Local output', 'desc' => 'The audio test runs in your browser']
    ],
    'featureSection' => [
        'kicker' => 'Built for output verification',
        'title' => 'What This Stereo Test Helps You Check',
        'lede' => 'A proper stereo test should confirm both channels play, sound balanced, and stay mapped correctly across different sound modes.',
        'cards' => [
            ['title' => 'Both-channel playback', 'text' => 'Make sure left and right audio work together instead of one side disappearing.'],
            ['title' => 'Balance issues', 'text' => 'Compare whether one earcup or speaker side sounds weaker than the other.'],
            ['title' => 'Frequency gaps', 'text' => 'Use bass, mid, treble, and sweep modes to catch output that only fails in one range.'],
            ['title' => 'Pre-call or pre-edit checks', 'text' => 'Verify your audio chain before meetings, mixing, streaming, or gaming sessions.']
        ]
    ],
    'processSection' => [
        'kicker' => 'Simple workflow',
        'title' => 'How to Run a Stereo Test',
        'lede' => 'Start with channel isolation, then move to stereo playback and extra sound modes if you suspect a wider audio problem.',
        'steps' => [
            ['image' => 'images/headphone-test/step-1.png', 'alt' => 'Stereo test step 1 connect audio device', 'title' => 'Connect the device you want to test', 'text' => 'Use the exact speakers or headphones you want to verify.'],
            ['image' => 'images/headphone-test/step-2.png', 'alt' => 'Stereo test step 2 run stereo and channel playback', 'title' => 'Play stereo and channel tests', 'text' => 'Check left, right, and stereo playback before moving to deeper sound modes.'],
            ['image' => 'images/headphone-test/step-3.png', 'alt' => 'Stereo test step 3 compare balance and audio quality', 'title' => 'Compare the result', 'text' => 'Listen for missing channels, imbalanced sound, or weak frequency ranges and retest after any settings change.']
        ]
    ],
    'clusterTool' => 'audio-output',
    'currentTool' => 'headphone',
    'seoContentInclude' => 'help/seo-content/stereo-test.php',
    'showToolsList' => true,
    'helpInclude' => 'help/headphone-speaker-tester.php'
];

include __DIR__ . '/includes/render-tool-intent-page.php';
