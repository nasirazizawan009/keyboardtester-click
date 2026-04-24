<?php
$dm_labels = [
  'aria' => 'Medidor de decibeles via microfono.',
  'instruction' => 'Pulsa Iniciar para usar tu microfono para medicion dB SPL en vivo. Las lecturas del navegador son RELATIVAS - el SPL real necesita calibracion hardware.',
  'start' => 'Iniciar', 'stop' => 'Detener',
  'current' => 'dB actual', 'peak' => 'dB pico', 'average' => 'dB promedio',
  'permission_denied' => 'Acceso al microfono denegado.',
  'no_mic' => 'No se detecta microfono.',
];
include __DIR__ . '/../../../tools/decibel_meter_tool.php';
