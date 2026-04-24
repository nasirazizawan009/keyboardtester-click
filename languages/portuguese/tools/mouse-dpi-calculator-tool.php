<?php
// Portuguese mouse DPI calculator tool - wraps the main tool with localized labels
$mdc_labels = [
    'aria' => 'Calculadora de DPI do mouse - medir o DPI real',
    'instruction' => 'Arraste dentro do pad com o mouse e depois digite a distância física exata percorrida. Ou mude para entrada manual e digite os valores diretamente.',
    'mode_drag' => 'Arrastar para medir',
    'mode_manual' => 'Entrada manual',
    'pad_hint' => 'Mantenha pressionado dentro do pad. Mova o mouse por uma distância física fixa (use uma régua) e solte.',
    'pixels' => 'Pixels movidos',
    'phys_distance' => 'Distância física',
    'unit_cm' => 'cm',
    'unit_in' => 'polegadas',
    'advertised' => 'DPI anunciado (opcional)',
    'dpi_result' => 'DPI real',
    'accuracy' => 'Precisão do sensor',
    'reset' => 'Reiniciar',
    'reference' => 'Dica: quanto maior a distância, menor o erro. Mire entre 10 e 20 cm.',
    'press_to_start' => 'Solte o mouse dentro do pad para fixar a contagem de pixels.',
    'no_drag' => 'Nenhum movimento registrado ainda',
];
include __DIR__ . '/../../../tools/mouse_dpi_calculator_tool.php';
