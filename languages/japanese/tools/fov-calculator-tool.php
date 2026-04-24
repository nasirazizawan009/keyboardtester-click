<?php
$fov_labels = [
    'aria' => 'FoV計算機 - アスペクト比間で視野角を変換',
    'instruction' => '現在のFoVと種類（水平・垂直・対角）を入力し、アスペクト比を選んでください。各形式・アスペクト比の等価FoVが表に表示されます。',
    'game_preset' => 'ゲームプリセット',
    'preset_custom' => 'カスタム',
    'fov_value' => 'FoV値（度）',
    'fov_type' => 'FoV種類',
    'type_h' => '水平', 'type_v' => '垂直', 'type_d' => '対角',
    'aspect_ratio' => 'アスペクト比',
    'table_heading' => 'アスペクト比ごとの等価FoV',
    'col_aspect' => '比率', 'col_h' => 'hFoV', 'col_v' => 'vFoV', 'col_d' => '対角',
    'reference' => 'ヒント：CS2は16:9で106 hFoVが標準。Apexは90 vFoV。CoDは4:3 hFoV（Hor+）で入力。',
];
include __DIR__ . '/../../../tools/fov_calculator_tool.php';
