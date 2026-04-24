<?php
// French mouse DPI calculator tool - wraps the main tool with localized labels
$mdc_labels = [
    'aria' => 'Calculateur de DPI de souris - mesurez le vrai DPI',
    'instruction' => 'Glissez dans le pad avec votre souris puis entrez la distance physique exacte parcourue. Ou passez en mode manuel et saisissez les valeurs directement.',
    'mode_drag' => 'Glisser pour mesurer',
    'mode_manual' => 'Entrée manuelle',
    'pad_hint' => 'Maintenez le clic dans le pad. Déplacez la souris sur une distance fixe (utilisez une règle) puis relâchez.',
    'pixels' => 'Pixels déplacés',
    'phys_distance' => 'Distance physique',
    'unit_cm' => 'cm',
    'unit_in' => 'pouces',
    'advertised' => 'DPI annoncé (optionnel)',
    'dpi_result' => 'DPI réel',
    'accuracy' => 'Précision du capteur',
    'reset' => 'Réinitialiser',
    'reference' => 'Astuce : plus vous glissez loin, plus la mesure est précise. Visez 10 à 20 cm.',
    'press_to_start' => 'Relâchez la souris dans le pad pour valider le comptage de pixels.',
    'no_drag' => 'Aucun déplacement enregistré pour le moment',
];
include __DIR__ . '/../../../tools/mouse_dpi_calculator_tool.php';
