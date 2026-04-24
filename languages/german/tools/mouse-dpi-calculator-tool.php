<?php
// German mouse DPI calculator tool - wraps the main tool with localized labels
$mdc_labels = [
    'aria' => 'Maus-DPI-Rechner - echte Maus-DPI messen',
    'instruction' => 'Ziehe im Pad mit der Maus und gib dann die exakte physische Strecke ein, die du bewegt hast. Oder wechsle in den manuellen Modus und tippe Werte direkt ein.',
    'mode_drag' => 'Zum Messen ziehen',
    'mode_manual' => 'Manuelle Eingabe',
    'pad_hint' => 'Halte im Pad gedrückt. Bewege die Maus eine feste physische Strecke (verwende ein Lineal) und lass los.',
    'pixels' => 'Pixel bewegt',
    'phys_distance' => 'Physische Strecke',
    'unit_cm' => 'cm',
    'unit_in' => 'Zoll',
    'advertised' => 'Angegebene DPI (optional)',
    'dpi_result' => 'Echte DPI',
    'accuracy' => 'Sensorgenauigkeit',
    'reset' => 'Zurücksetzen',
    'reference' => 'Tipp: Je länger die Strecke, desto genauer die Messung. Ziel 10 bis 20 cm.',
    'press_to_start' => 'Maus im Pad loslassen, um den Pixelwert zu fixieren.',
    'no_drag' => 'Noch keine Bewegung aufgezeichnet',
];
include __DIR__ . '/../../../tools/mouse_dpi_calculator_tool.php';
