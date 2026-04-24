<?php
$ppi_labels = [
    'aria' => 'PPI計算機 - 解像度と対角サイズから1インチあたりピクセルを算出',
    'instruction' => '横解像度・縦解像度・対角（インチ）を入力。PPI = √(w² + h²) / 対角。',
    'preset' => '一般的なディスプレイ', 'preset_custom' => 'カスタム',
    'width' => '横ピクセル', 'height' => '縦ピクセル',
    'diagonal' => '対角（インチ）', 'diagonal_cm' => '対角（cm）',
    'ppi' => '1インチあたりピクセル（PPI）', 'dot_pitch' => 'ドットピッチ',
    'aspect' => 'アスペクト比', 'megapixels' => '総ピクセル',
    'density_tier' => '密度ランク',
    'tier_low' => '低密度（100 PPI未満）',
    'tier_standard' => '標準（100-150 PPI）',
    'tier_high' => '高密度（150-220 PPI）',
    'tier_retina' => 'Retina / 4K（220+ PPI）',
    'unit' => '単位',
    'reference' => 'ヒント：AppleはノートPCで約220 PPI、スマホで300 PPIを「Retina」と定義。1080p 24インチ ≈ 92 PPI、4K 27インチ ≈ 163 PPI。',
];
include __DIR__ . '/../../../tools/ppi_calculator_tool.php';
