<?php
$ma_labels = [
    'aria' => '마우스 가속 테스트 - 비선형 센서/OS 가속 감지',
    'instruction' => '같은 물리 거리의 스와이프 두 번을 기록하세요: 하나는 느리게(약 2초), 하나는 빠르게(0.5초 미만). 가속이 없는 센서는 같은 픽셀 수를 보고합니다. 1.05를 초과하면 가속이 적용 중입니다.',
    'step_slow' => '느린 스와이프', 'step_fast' => '빠른 스와이프',
    'hint_slow' => '1단계: 누른 채 느리게 드래그(약 2초).',
    'hint_fast' => '2단계: 누른 채 같은 거리를 빠르게 드래그(0.5초 미만).',
    'pixels' => '픽셀', 'duration' => '시간', 'speed' => '속도(px/초)',
    'ratio' => '빠름/느림 픽셀 비',
    'verdict_idle' => '먼저 느리게, 다음 빠르게.',
    'verdict_slow_done' => '느린 스와이프 기록됨. 이제 같은 거리를 빠르게.',
    'verdict_perfect' => '가속 없음 — 비율이 1.00의 ±5% 이내(완벽).',
    'verdict_minor' => '작은 차이 — 실제 가속보다는 노이즈일 가능성.',
    'verdict_accel' => '가속 활성! Windows의 "포인터 정확도 향상"을 끄세요.',
    'verdict_decel' => '감속 감지 — 드문 경우, 드라이버 스무딩 확인 필요.',
    'reset' => '초기화',
    'reference' => '팁: Windows의 "포인터 정확도 향상"이 가장 흔한 원인입니다. 제어판 > 마우스 > 포인터 옵션에서 끄세요.',
];
include __DIR__ . '/../../../tools/mouse_accel_tool.php';
