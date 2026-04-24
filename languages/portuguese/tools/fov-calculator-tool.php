<?php
$fov_labels = [
    'aria' => 'Calculadora de FoV - converter campo de visao entre proporcoes',
    'instruction' => 'Digite seu FoV atual e o tipo (horizontal, vertical ou diagonal) e escolha a proporcao. A tabela mostra o FoV equivalente para cada formato e proporcao.',
    'game_preset' => 'Predefinição de jogo',
    'preset_custom' => 'Personalizado',
    'fov_value' => 'Valor de FoV (graus)',
    'fov_type' => 'Tipo de FoV',
    'type_h' => 'Horizontal', 'type_v' => 'Vertical', 'type_d' => 'Diagonal',
    'aspect_ratio' => 'Sua proporcao',
    'table_heading' => 'FoV equivalente por proporcao',
    'col_aspect' => 'Proporcao', 'col_h' => 'hFoV', 'col_v' => 'vFoV', 'col_d' => 'Diagonal',
    'reference' => 'Dica: CS2 padrao 106 hFoV em 16:9. Apex 90 vFoV. CoD pede hFoV 4:3 (Hor+).',
];
include __DIR__ . '/../../../tools/fov_calculator_tool.php';
