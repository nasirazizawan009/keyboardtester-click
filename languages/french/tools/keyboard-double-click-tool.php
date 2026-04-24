<?php
$kdc_labels = [
    'aria_arena' => 'Detecteur de chatter clavier.',
    'start' => 'Demarrer', 'stop' => 'Arreter', 'reset' => 'Reinitialiser',
    'threshold' => 'Seuil chatter',
    'status_idle' => 'Inactif', 'status_listening' => 'Ecoute',
    'col_key' => 'Touche', 'col_total' => 'Pressions', 'col_chatter' => 'Evenements chatter', 'col_min_gap' => 'Min gap (ms)',
    'tip_listen' => 'Appuyez Demarrer puis chaque touche UNE fois lentement. Toute touche enregistree deux fois affichera des evenements chatter.',
    'no_chatter' => 'Aucun chatter detecte. Continuez a appuyer.',
];
include __DIR__ . '/../../../tools/keyboard_double_click_tool.php';
