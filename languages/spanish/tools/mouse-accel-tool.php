<?php
$ma_labels = [
    'aria' => 'Prueba de aceleracion del raton - detecta aceleracion no lineal del sensor o SO',
    'instruction' => 'Registra dos deslizamientos de la MISMA distancia física: uno lento (unos 2 s) y uno rápido (menos de 0,5 s). Un sensor sin aceleración reporta los mismos píxeles. Ratios sobre 1,05 indican aceleración.',
    'step_slow' => 'Deslizamiento lento', 'step_fast' => 'Deslizamiento rápido',
    'hint_slow' => 'Paso 1: pulsa y arrastra despacio (unos 2 segundos).',
    'hint_fast' => 'Paso 2: pulsa y arrastra la MISMA distancia rápido (menos de 0,5 s).',
    'pixels' => 'Píxeles', 'duration' => 'Duración', 'speed' => 'Velocidad (px/s)',
    'ratio' => 'Ratio píxeles rápido/lento',
    'verdict_idle' => 'Arrastra lento primero, después rápido.',
    'verdict_slow_done' => 'Deslizamiento lento registrado. Ahora rápido, misma distancia.',
    'verdict_perfect' => 'Sin aceleración — ratio dentro del 5% de 1,00 (perfecto).',
    'verdict_minor' => 'Leve diferencia — probablemente ruido, no aceleración real.',
    'verdict_accel' => '¡Aceleración activa! Desactiva "Mejorar precisión del puntero" en Windows.',
    'verdict_decel' => 'Desaceleración — inusual, revisa el suavizado del driver.',
    'reset' => 'Reiniciar',
    'reference' => 'Consejo: "Mejorar precisión del puntero" de Windows es la causa más común. Desactívalo en Panel de Control > Ratón > Opciones de puntero.',
];
include __DIR__ . '/../../../tools/mouse_accel_tool.php';
