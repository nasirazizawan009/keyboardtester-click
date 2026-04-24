<?php
$fov_labels = [
    'aria' => 'FoV 계산기 - 화면 비율 간 시야각 변환',
    'instruction' => '현재 FoV와 종류(수평·수직·대각)를 입력하고 화면 비율을 선택하세요. 표에 각 형식과 비율별 동일한 FoV가 표시됩니다.',
    'game_preset' => '게임 프리셋',
    'preset_custom' => '직접 입력',
    'fov_value' => 'FoV 값(도)',
    'fov_type' => 'FoV 종류',
    'type_h' => '수평', 'type_v' => '수직', 'type_d' => '대각',
    'aspect_ratio' => '화면 비율',
    'table_heading' => '비율별 동일한 FoV',
    'col_aspect' => '비율', 'col_h' => 'hFoV', 'col_v' => 'vFoV', 'col_d' => '대각',
    'reference' => '팁: CS2는 16:9에서 106 hFoV 기본. Apex는 90 vFoV. CoD는 4:3 hFoV (Hor+) 기준.',
];
include __DIR__ . '/../../../tools/fov_calculator_tool.php';
