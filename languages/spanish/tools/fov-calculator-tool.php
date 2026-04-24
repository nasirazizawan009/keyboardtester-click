<?php
$fov_labels = [
    'aria' => 'Calculadora de FoV - convertir campo de vision entre proporciones',
    'instruction' => 'Introduce tu FoV actual y su tipo (horizontal, vertical o diagonal) y elige tu proporcion. La tabla muestra el FoV equivalente para cada formato y proporcion.',
    'game_preset' => 'Preajuste de juego',
    'preset_custom' => 'Personalizado',
    'fov_value' => 'Valor de FoV (grados)',
    'fov_type' => 'Tipo de FoV',
    'type_h' => 'Horizontal', 'type_v' => 'Vertical', 'type_d' => 'Diagonal',
    'aspect_ratio' => 'Tu proporcion',
    'table_heading' => 'FoV equivalente segun proporcion',
    'col_aspect' => 'Proporcion', 'col_h' => 'hFoV', 'col_v' => 'vFoV', 'col_d' => 'Diagonal',
    'reference' => 'Consejo: CS2 usa 106 hFoV a 16:9. Apex usa 90 vFoV. CoD pide hFoV 4:3 (Hor+).',
];
include __DIR__ . '/../../../tools/fov_calculator_tool.php';
