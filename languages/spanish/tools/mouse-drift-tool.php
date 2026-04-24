<?php
$md_labels = [
    'aria' => 'Prueba de deriva del raton - detecta movimiento del cursor en reposo',
    'instruction' => 'Mantén las manos FUERA del raton durante la prueba. Mueve el cursor una vez al panel, pulsa Iniciar y suelta. Muestreamos cada evento de puntero.',
    'duration' => 'Duración',
    'dur_10' => '10 segundos', 'dur_30' => '30 segundos', 'dur_60' => '60 segundos', 'dur_180' => '3 minutos',
    'start' => 'Iniciar prueba', 'stop' => 'Detener', 'reset' => 'Reiniciar',
    'pad_hint' => 'Pon el cursor en este panel y pulsa Iniciar. No toques el raton hasta que acabe.',
    'running' => 'Ejecutando — no toques el raton', 'done' => 'Prueba completada',
    'time_left' => 'Tiempo restante',
    'total_drift' => 'Deriva total', 'max_delta' => 'Mayor salto por evento', 'samples' => 'Eventos de puntero',
    'verdict' => 'Veredicto',
    'verdict_perfect' => 'Perfecto — sin deriva detectada',
    'verdict_minor' => 'Leve (menos de 5 px) — probablemente ruido normal',
    'verdict_warn' => 'Notable — el sensor puede tener vibración',
    'verdict_bad' => 'Fuerte — sensor inestable, considera reemplazarlo',
    'verdict_idle' => 'Pulsa Iniciar y no toques el raton',
    'reference' => 'Consejo: los sensores laser derivan en superficies brillantes. Los opticos odian vidrio y negros profundos. Una alfombrilla gaming elimina la mayoria de falsos positivos.',
];
include __DIR__ . '/../../../tools/mouse_drift_tool.php';
