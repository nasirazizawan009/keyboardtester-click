<?php
$dm_labels = [
  'aria' => 'Medidor de decibeis via microfone.',
  'instruction' => 'Pressione Iniciar para usar seu microfone para medicao dB SPL ao vivo. Leituras do navegador sao RELATIVAS - SPL real precisa de calibracao de hardware.',
  'start' => 'Iniciar', 'stop' => 'Parar',
  'current' => 'dB atual', 'peak' => 'dB pico', 'average' => 'dB media',
  'permission_denied' => 'Acesso ao microfone negado.',
  'no_mic' => 'Microfone nao detectado.',
];
include __DIR__ . '/../../../tools/decibel_meter_tool.php';
