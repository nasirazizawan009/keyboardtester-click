<?php
// Spanish mouse accuracy tool - wraps the main tool with localized labels
$maa_labels = [
    'aria_arena' => 'Haz clic en los objetivos para medir tu precision de punteria.',
    'start' => 'Iniciar',
    'stop' => 'Detener',
    'reset' => 'Reiniciar',
    'fullscreen' => 'Pantalla completa',
    'duration' => 'Duracion',
    'target_size' => 'Tamano del objetivo',
    'size_small' => 'Pequeno',
    'size_medium' => 'Medio',
    'size_large' => 'Grande',
    'hits' => 'Aciertos',
    'misses' => 'Fallos',
    'accuracy' => 'Precision',
    'avg_error' => 'Error medio',
    'avg_time' => 'Tiempo medio',
    'best' => 'Mejor',
    'score' => 'Puntuacion',
    'instruction' => 'Pulsa Iniciar. Haz clic en cada objetivo lo mas rapido y preciso posible.',
    'time_left' => 'Tiempo restante',
    'complete' => 'Sesion completada'
];
include __DIR__ . '/../../../tools/mouse_accuracy_tool.php';
