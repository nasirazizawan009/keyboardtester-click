<?php
// German mouse accuracy tool - wraps the main tool with localized labels
$maa_labels = [
    'aria_arena' => 'Klicke Ziele an um deine Zielgenauigkeit zu messen.',
    'start' => 'Starten',
    'stop' => 'Stoppen',
    'reset' => 'Zuruecksetzen',
    'fullscreen' => 'Vollbild',
    'duration' => 'Dauer',
    'target_size' => 'Zielgroesse',
    'size_small' => 'Klein',
    'size_medium' => 'Mittel',
    'size_large' => 'Gross',
    'hits' => 'Treffer',
    'misses' => 'Fehler',
    'accuracy' => 'Genauigkeit',
    'avg_error' => 'Durchschn. Fehler',
    'avg_time' => 'Durchschn. Zeit',
    'best' => 'Beste',
    'score' => 'Punkte',
    'instruction' => 'Druecke Start. Klicke jedes Ziel so schnell und praezise wie moeglich.',
    'time_left' => 'Zeit verbleibend',
    'complete' => 'Session beendet'
];
include __DIR__ . '/../../../tools/mouse_accuracy_tool.php';
