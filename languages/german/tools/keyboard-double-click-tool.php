<?php
$kdc_labels = [
    'aria_arena' => 'Tastatur-Chatter-Detektor.',
    'start' => 'Starten', 'stop' => 'Stoppen', 'reset' => 'Zuruecksetzen',
    'threshold' => 'Chatter-Schwelle',
    'status_idle' => 'Inaktiv', 'status_listening' => 'Hoert zu',
    'col_key' => 'Taste', 'col_total' => 'Druecke', 'col_chatter' => 'Chatter-Ereignisse', 'col_min_gap' => 'Min Abstand (ms)',
    'tip_listen' => 'Druecke Start dann jede Taste EINMAL langsam. Jede Taste die zweimal registriert zeigt Chatter-Ereignisse.',
    'no_chatter' => 'Kein Chatter erkannt. Weiter Tasten druecken.',
];
include __DIR__ . '/../../../tools/keyboard_double_click_tool.php';
