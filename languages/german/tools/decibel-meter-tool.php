<?php
$dm_labels = [
  'aria' => 'Dezibel-Messer via Mikrofon.',
  'instruction' => 'Druecke Start um dein Mikrofon fuer Live dB SPL Messung zu nutzen. Browser-Anzeigen sind RELATIV - echtes SPL benoetigt Hardware-Kalibrierung.',
  'start' => 'Starten', 'stop' => 'Stoppen',
  'current' => 'Aktuelle dB', 'peak' => 'Spitzen-dB', 'average' => 'Durchschn. dB',
  'permission_denied' => 'Mikrofonzugriff verweigert.',
  'no_mic' => 'Kein Mikrofon erkannt.',
];
include __DIR__ . '/../../../tools/decibel_meter_tool.php';
