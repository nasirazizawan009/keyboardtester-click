<?php
// Korean mouse accuracy tool - wraps the main tool with localized labels
$maa_labels = [
    'aria_arena' => '타깃을 클릭하여 에임 정확도를 측정하세요.',
    'start' => '시작',
    'stop' => '중지',
    'reset' => '리셋',
    'fullscreen' => '전체 화면',
    'duration' => '시간',
    'target_size' => '타깃 크기',
    'size_small' => '작음',
    'size_medium' => '중간',
    'size_large' => '큼',
    'hits' => '명중',
    'misses' => '미스',
    'accuracy' => '정확도',
    'avg_error' => '평균 오차',
    'avg_time' => '평균 시간',
    'best' => '최고',
    'score' => '점수',
    'instruction' => '시작을 누르세요. 모든 타깃을 가능한 한 빠르고 정확하게 클릭.',
    'time_left' => '남은 시간',
    'complete' => '세션 완료'
];
include __DIR__ . '/../../../tools/mouse_accuracy_tool.php';
