<?php
$dm_labels = [
  'aria' => '마이크 사용 데시벨 미터.',
  'instruction' => '시작을 눌러 마이크로 라이브 dB SPL 측정. 브라우저 판독은 상대값입니다 - 실제 SPL은 하드웨어 보정이 필요합니다.',
  'start' => '시작', 'stop' => '중지',
  'current' => '현재 dB', 'peak' => '피크 dB', 'average' => '평균 dB',
  'permission_denied' => '마이크 접근 거부됨.',
  'no_mic' => '마이크가 감지되지 않음.',
];
include __DIR__ . '/../../../tools/decibel_meter_tool.php';
