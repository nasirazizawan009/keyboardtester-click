<?php
// Japanese mouse DPI calculator tool - wraps the main tool with localized labels
$mdc_labels = [
    'aria' => 'マウスDPI計算機 - 本当のマウスDPIを測定',
    'instruction' => 'パッドの中でマウスをドラッグし、実際に動かした物理距離を入力してください。または手動入力モードに切り替えて値を直接入力できます。',
    'mode_drag' => 'ドラッグで測定',
    'mode_manual' => '手動入力',
    'pad_hint' => 'パッド内で押したまま、定規などで決めた一定の物理距離だけマウスを動かし、離してください。',
    'pixels' => '移動ピクセル',
    'phys_distance' => '物理距離',
    'unit_cm' => 'cm',
    'unit_in' => 'インチ',
    'advertised' => '公称DPI（任意）',
    'dpi_result' => '実DPI',
    'accuracy' => 'センサー精度',
    'reset' => 'リセット',
    'reference' => 'ヒント：距離が長いほど誤差は減ります。10～20cmが目安です。',
    'press_to_start' => 'パッド内でマウスを離すとピクセル数が確定します。',
    'no_drag' => 'まだ動きは記録されていません',
];
include __DIR__ . '/../../../tools/mouse_dpi_calculator_tool.php';
