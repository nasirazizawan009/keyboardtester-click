<?php
$fov_labels = [
    'aria' => 'FoV-Rechner - Sichtfeld zwischen Seitenverhältnissen umrechnen',
    'instruction' => 'Gib dein aktuelles FoV und seinen Typ (horizontal, vertikal oder diagonal) ein und wähle das Seitenverhältnis. Die Tabelle zeigt das äquivalente FoV für jedes Format und Seitenverhältnis.',
    'game_preset' => 'Spiel-Preset',
    'preset_custom' => 'Benutzerdefiniert',
    'fov_value' => 'FoV-Wert (Grad)',
    'fov_type' => 'FoV-Typ',
    'type_h' => 'Horizontal', 'type_v' => 'Vertikal', 'type_d' => 'Diagonal',
    'aspect_ratio' => 'Dein Seitenverhältnis',
    'table_heading' => 'Äquivalente FoV-Werte je Seitenverhältnis',
    'col_aspect' => 'Seitenverhältnis', 'col_h' => 'hFoV', 'col_v' => 'vFoV', 'col_d' => 'Diagonal',
    'reference' => 'Tipp: CS2 standardmäßig 106 hFoV auf 16:9. Apex 90 vFoV. CoD verwendet 4:3 hFoV (Hor+).',
];
include __DIR__ . '/../../../tools/fov_calculator_tool.php';
