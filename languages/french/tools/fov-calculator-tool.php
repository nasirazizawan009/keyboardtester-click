<?php
$fov_labels = [
    'aria' => 'Calculateur de FoV - convertir le champ de vision entre ratios',
    'instruction' => 'Entrez votre FoV actuel et son type (horizontal, vertical ou diagonal) puis choisissez votre ratio. Le tableau affiche le FoV équivalent pour chaque format et ratio.',
    'game_preset' => 'Préréglage jeu',
    'preset_custom' => 'Personnalisé',
    'fov_value' => 'Valeur du FoV (degrés)',
    'fov_type' => 'Type de FoV',
    'type_h' => 'Horizontal', 'type_v' => 'Vertical', 'type_d' => 'Diagonal',
    'aspect_ratio' => 'Votre ratio',
    'table_heading' => 'FoV équivalent selon le ratio',
    'col_aspect' => 'Ratio', 'col_h' => 'hFoV', 'col_v' => 'vFoV', 'col_d' => 'Diagonal',
    'reference' => 'Astuce : CS2 à 106 hFoV en 16:9. Apex à 90 vFoV. CoD demande le hFoV 4:3 (Hor+).',
];
include __DIR__ . '/../../../tools/fov_calculator_tool.php';
