<?php
// Korean mouse DPI calculator tool - wraps the main tool with localized labels
$mdc_labels = [
    'aria' => '마우스 DPI 계산기 - 실제 DPI 측정',
    'instruction' => '패드 안에서 마우스를 드래그한 뒤 이동한 정확한 물리 거리를 입력하세요. 또는 수동 입력 모드로 전환해 값을 직접 입력할 수 있습니다.',
    'mode_drag' => '드래그로 측정',
    'mode_manual' => '수동 입력',
    'pad_hint' => '패드 안에서 누른 채 자 등으로 정한 일정한 물리 거리만큼 마우스를 움직인 뒤 떼세요.',
    'pixels' => '이동 픽셀',
    'phys_distance' => '물리 거리',
    'unit_cm' => 'cm',
    'unit_in' => '인치',
    'advertised' => '공인 DPI (선택)',
    'dpi_result' => '실제 DPI',
    'accuracy' => '센서 정확도',
    'reset' => '초기화',
    'reference' => '팁: 이동 거리가 길수록 오차가 줄어듭니다. 10~20cm를 권장합니다.',
    'press_to_start' => '패드 안에서 마우스를 떼면 픽셀 수가 확정됩니다.',
    'no_drag' => '아직 기록된 움직임이 없습니다',
];
include __DIR__ . '/../../../tools/mouse_dpi_calculator_tool.php';
