<?php
$dm_labels = [
  'aria' => 'Sonometre dB via microphone.',
  'instruction' => 'Appuyez Demarrer pour utiliser votre microphone pour mesure dB SPL en direct. Les lectures du navigateur sont RELATIVES - le SPL reel necessite une calibration materielle.',
  'start' => 'Demarrer', 'stop' => 'Arreter',
  'current' => 'dB actuel', 'peak' => 'dB pic', 'average' => 'dB moyen',
  'permission_denied' => 'Acces au microphone refuse.',
  'no_mic' => 'Aucun microphone detecte.',
];
include __DIR__ . '/../../../tools/decibel_meter_tool.php';
