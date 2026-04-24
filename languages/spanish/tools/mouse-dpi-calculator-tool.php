<?php
// Spanish mouse DPI calculator tool - wraps the main tool with localized labels
$mdc_labels = [
    'aria' => 'Calculadora de DPI del raton - mide el DPI real',
    'instruction' => 'Arrastra dentro de la pista con el raton y luego introduce la distancia fisica exacta que has movido. O cambia a entrada manual y escribe los valores directamente.',
    'mode_drag' => 'Arrastrar para medir',
    'mode_manual' => 'Entrada manual',
    'pad_hint' => 'Mantén pulsado dentro de la pista. Mueve el ratón una distancia física fija (usa una regla) y suelta.',
    'pixels' => 'Píxeles movidos',
    'phys_distance' => 'Distancia física',
    'unit_cm' => 'cm',
    'unit_in' => 'pulgadas',
    'advertised' => 'DPI anunciado (opcional)',
    'dpi_result' => 'DPI real',
    'accuracy' => 'Precisión del sensor',
    'reset' => 'Reiniciar',
    'reference' => 'Consejo: cuanto mayor sea la distancia, menor será el error. Intenta moverte entre 10 y 20 cm.',
    'press_to_start' => 'Suelta el ratón dentro de la pista para fijar el conteo de píxeles.',
    'no_drag' => 'Aún no se ha registrado ningún movimiento',
];
include __DIR__ . '/../../../tools/mouse_dpi_calculator_tool.php';
