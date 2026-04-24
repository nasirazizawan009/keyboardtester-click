<?php
$ppi_labels = [
    'aria' => 'PPI 계산기 - 해상도와 대각선 크기로 인치당 픽셀 계산',
    'instruction' => '가로 해상도, 세로 해상도, 대각선(인치)을 입력하세요. PPI = √(w² + h²) / 대각선.',
    'preset' => '흔한 디스플레이', 'preset_custom' => '직접 입력',
    'width' => '가로 픽셀', 'height' => '세로 픽셀',
    'diagonal' => '대각선(인치)', 'diagonal_cm' => '대각선(cm)',
    'ppi' => '인치당 픽셀(PPI)', 'dot_pitch' => '도트 피치',
    'aspect' => '화면 비율', 'megapixels' => '총 픽셀',
    'density_tier' => '밀도 등급',
    'tier_low' => '낮은 밀도(100 PPI 미만)',
    'tier_standard' => '표준(100-150 PPI)',
    'tier_high' => '높은 밀도(150-220 PPI)',
    'tier_retina' => 'Retina / 4K(220+ PPI)',
    'unit' => '단위',
    'reference' => '팁: Apple은 노트북에서 ~220 PPI, 스마트폰에서 300 PPI를 "Retina"로 간주합니다. 1080p 24인치 ≈ 92 PPI, 4K 27인치 ≈ 163 PPI.',
];
include __DIR__ . '/../../../tools/ppi_calculator_tool.php';
