<?php
// Russian mouse accuracy tool - wraps the main tool with localized labels
$maa_labels = [
    'aria_arena' => 'Кликайте по целям для измерения точности прицеливания.',
    'start' => 'Начать',
    'stop' => 'Стоп',
    'reset' => 'Сброс',
    'fullscreen' => 'Полный экран',
    'duration' => 'Длительность',
    'target_size' => 'Размер цели',
    'size_small' => 'Малый',
    'size_medium' => 'Средний',
    'size_large' => 'Большой',
    'hits' => 'Попадания',
    'misses' => 'Промахи',
    'accuracy' => 'Точность',
    'avg_error' => 'Ср. промах',
    'avg_time' => 'Ср. время',
    'best' => 'Рекорд',
    'score' => 'Счёт',
    'instruction' => 'Нажмите Начать. Кликайте по каждой цели как можно быстрее и точнее.',
    'time_left' => 'Осталось',
    'complete' => 'Сессия завершена'
];
include __DIR__ . '/../../../tools/mouse_accuracy_tool.php';
