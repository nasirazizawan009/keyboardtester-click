<?php
// Japanese mouse accuracy tool - wraps the main tool with localized labels
$maa_labels = [
    'aria_arena' => 'ターゲットをクリックしてエイム精度を測定します。',
    'start' => '開始',
    'stop' => '停止',
    'reset' => 'リセット',
    'fullscreen' => 'フルスクリーン',
    'duration' => '時間',
    'target_size' => 'ターゲットサイズ',
    'size_small' => '小',
    'size_medium' => '中',
    'size_large' => '大',
    'hits' => 'ヒット',
    'misses' => 'ミス',
    'accuracy' => '精度',
    'avg_error' => '平均誤差',
    'avg_time' => '平均時間',
    'best' => 'ベスト',
    'score' => 'スコア',
    'instruction' => '開始を押してください。すべてのターゲットを可能な限り速く正確にクリック。',
    'time_left' => '残り時間',
    'complete' => 'セッション完了'
];
include __DIR__ . '/../../../tools/mouse_accuracy_tool.php';
