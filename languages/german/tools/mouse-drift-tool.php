<?php
$md_labels = [
    'aria' => 'Maus-Drift-Test - erkennt Cursor-Bewegung im Ruhezustand',
    'instruction' => 'Halte die Hand WEG von der Maus. Bewege den Cursor einmal ins Feld, drücke Start und lass los.',
    'duration' => 'Dauer',
    'dur_10' => '10 Sekunden', 'dur_30' => '30 Sekunden', 'dur_60' => '60 Sekunden', 'dur_180' => '3 Minuten',
    'start' => 'Test starten', 'stop' => 'Stoppen', 'reset' => 'Zurücksetzen',
    'pad_hint' => 'Cursor ins Feld bewegen und Start drücken. Maus nicht berühren, bis der Timer endet.',
    'running' => 'Läuft — Maus nicht berühren', 'done' => 'Test fertig',
    'time_left' => 'Restzeit',
    'total_drift' => 'Gesamtdrift', 'max_delta' => 'Größter Sprung', 'samples' => 'Pointer-Events',
    'verdict' => 'Urteil',
    'verdict_perfect' => 'Perfekt — keine Drift',
    'verdict_minor' => 'Gering (unter 5 px) — normales Rauschen',
    'verdict_warn' => 'Deutlich — Sensor möglicherweise unruhig',
    'verdict_bad' => 'Stark — Sensor instabil, Austausch erwägen',
    'verdict_idle' => 'Start drücken und Maus nicht berühren',
    'reference' => 'Tipp: Lasersensoren driften auf glänzenden Flächen. Optische hassen Glas und sehr dunkle Flächen. Ein gutes Gaming-Pad beseitigt die meisten Fehlalarme.',
];
include __DIR__ . '/../../../tools/mouse_drift_tool.php';
