<?php
$ma_labels = [
    'aria' => 'Maus-Beschleunigungs-Test - erkennt nicht-lineare Sensor- oder OS-Beschleunigung',
    'instruction' => 'Erfasse zwei Bewegungen über die GLEICHE physische Strecke: eine langsam (ca. 2 s), eine schnell (unter 0,5 s). Ein Sensor ohne Beschleunigung meldet gleiche Pixel. Verhältnisse über 1,05 bedeuten Beschleunigung.',
    'step_slow' => 'Langsames Wischen', 'step_fast' => 'Schnelles Wischen',
    'hint_slow' => 'Schritt 1: gedrückt halten und langsam ziehen (ca. 2 s).',
    'hint_fast' => 'Schritt 2: gedrückt halten und GLEICHE Strecke schnell ziehen (unter 0,5 s).',
    'pixels' => 'Pixel', 'duration' => 'Dauer', 'speed' => 'Tempo (px/s)',
    'ratio' => 'Verhältnis Pixel schnell/langsam',
    'verdict_idle' => 'Erst langsam, dann schnell ziehen.',
    'verdict_slow_done' => 'Langsame Bewegung erfasst. Jetzt schnell, gleiche Strecke.',
    'verdict_perfect' => 'Keine Beschleunigung — Verhältnis innerhalb 5% von 1,00 (perfekt).',
    'verdict_minor' => 'Geringer Unterschied — eher Rauschen als echte Beschleunigung.',
    'verdict_accel' => 'Beschleunigung aktiv! Deaktiviere "Zeigergenauigkeit verbessern" in Windows.',
    'verdict_decel' => 'Verzögerung erkannt — ungewöhnlich, Treiber-Smoothing prüfen.',
    'reset' => 'Zurücksetzen',
    'reference' => 'Tipp: "Zeigergenauigkeit verbessern" von Windows ist die häufigste Ursache. Deaktiviere es in Systemsteuerung > Maus > Zeigeroptionen.',
];
include __DIR__ . '/../../../tools/mouse_accel_tool.php';
