<?php
if (!function_exists('absoluteUrl')) {
    require_once __DIR__ . '/../config.php';
}

require_once __DIR__ . '/localized-intent-pages-phase6.php';

function getLocalizedIntentCatalog() {
    static $catalog = null;

    if ($catalog !== null) {
        return $catalog;
    }

    $catalog = [
        'spanish' => [
            'htmlLang' => 'es',
            'hreflang' => 'es',
            'ogLocale' => 'es_ES',
            'dir' => 'ltr',
            'mainClass' => 'landing-main',
            'configInclude' => 'languages/spanish/config-es.php',
            'headerInclude' => 'languages/spanish/header-es.php',
            'footerInclude' => 'languages/spanish/footer-es.php',
            'toolsListInclude' => 'languages/spanish/sections/tools-list-es.php',
            'clusterKicker' => 'Cluster relacionado',
            'openPageLabel' => 'Abrir página',
            'clusters' => [
                'screen' => [
                    'title' => 'Pruebas de pantalla relacionadas',
                    'intro' => 'Aprovecha la misma prueba de pantalla para revisar píxeles muertos y otros defectos visibles del panel.',
                    'pages' => [
                        [
                            'key' => 'screen-test',
                            'path' => 'languages/spanish/screen-test.php',
                            'name' => 'Prueba de Pantalla',
                            'description' => 'Abre colores sólidos y modo de pantalla completa para revisar uniformidad, brillo y defectos del panel.'
                        ],
                        [
                            'key' => 'dead-pixel-test',
                            'path' => 'languages/spanish/dead-pixel-test.php',
                            'name' => 'Prueba de Píxeles Muertos',
                            'description' => 'Detecta puntos negros permanentes o subpíxeles que nunca cambian al alternar colores.'
                        ]
                    ]
                ],
                'mic' => [
                    'title' => 'Pruebas de micrófono relacionadas',
                    'intro' => 'Usa el mismo comprobador de micrófono para una prueba general o para revisar el nivel de entrada en tiempo real.',
                    'pages' => [
                        [
                            'key' => 'mic-test',
                            'path' => 'languages/spanish/mic-test.php',
                            'name' => 'Prueba de Micrófono',
                            'description' => 'Comprueba permisos, entrada de audio y respuesta del micrófono directamente en el navegador.'
                        ],
                        [
                            'key' => 'microphone-volume-test',
                            'path' => 'languages/spanish/microphone-volume-test.php',
                            'name' => 'Prueba de Volumen del Micrófono',
                            'description' => 'Mide el nivel de entrada y el pico del micrófono con un medidor visual en vivo.'
                        ]
                    ]
                ],
                'webcam' => [
                    'title' => 'Pruebas de cámara relacionadas',
                    'intro' => 'La misma herramienta de webcam también sirve para confirmar la resolución real que entrega tu cámara.',
                    'pages' => [
                        [
                            'key' => 'webcam-test',
                            'path' => 'languages/spanish/webcam-test.php',
                            'name' => 'Prueba de Webcam',
                            'description' => 'Abre la vista previa, cambia de cámara y comprueba si el navegador detecta tu dispositivo.'
                        ],
                        [
                            'key' => 'camera-resolution-test',
                            'path' => 'languages/spanish/camera-resolution-test.php',
                            'name' => 'Prueba de Resolución de Cámara',
                            'description' => 'Comprueba si tu webcam realmente entrega 480p, 720p o 1080p en el navegador.'
                        ]
                    ]
                ],
                'qr-reader' => [
                    'title' => 'Pruebas QR relacionadas',
                    'intro' => 'Utiliza el mismo lector QR para escanear en vivo o para leer códigos guardados dentro de una imagen.',
                    'pages' => [
                        [
                            'key' => 'qr-reader',
                            'path' => 'languages/spanish/qr-reader.php',
                            'name' => 'Lector de Códigos QR',
                            'description' => 'Escanea códigos QR con la cámara o subiendo una imagen desde tu dispositivo.'
                        ],
                        [
                            'key' => 'scan-qr-from-image',
                            'path' => 'languages/spanish/scan-qr-from-image.php',
                            'name' => 'Escanear QR desde Imagen',
                            'description' => 'Sube capturas de pantalla, fotos o archivos descargados para decodificar un QR en segundos.'
                        ]
                    ]
                ]
            ],
            'pages' => [
                'dead-pixel-test' => [
                    'path' => 'languages/spanish/dead-pixel-test.php',
                    'englishPath' => 'dead-pixel-test.php',
                    'cluster' => 'screen',
                    'toolInclude' => 'languages/spanish/tools/screen-test-tool.php',
                    'toolAnchor' => 'screen-test',
                    'meta' => [
                        'title' => 'Prueba de Píxeles Muertos Online | KeyboardTester.click',
                        'description' => 'Detecta píxeles muertos en tu monitor con colores sólidos y pantalla completa. Revisa monitores, laptops y pantallas externas en el navegador.',
                        'keywords' => 'prueba de píxeles muertos, detectar píxeles muertos, test monitor, pantalla con píxeles muertos',
                        'ogImage' => 'images/screen-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Prueba de Píxeles Muertos',
                        'lede' => 'Muestra negro, blanco y colores sólidos para encontrar puntos que siempre permanecen oscuros.',
                        'primaryCta' => 'Revisar pantalla',
                        'secondaryCta' => 'Cómo revisar'
                    ],
                    'toolSection' => [
                        'kicker' => 'Herramienta principal',
                        'title' => 'Detector de píxeles muertos',
                        'lede' => 'Usa la misma prueba de pantalla para inspeccionar monitores, laptops y pantallas externas en modo de pantalla completa.'
                    ],
                    'trustItems' => [
                        ['title' => 'Pantalla completa', 'desc' => 'Inspección limpia'],
                        ['title' => 'Colores sólidos', 'desc' => 'Negro, blanco y RGB'],
                        ['title' => 'Sin instalación', 'desc' => 'Todo en el navegador'],
                        ['title' => 'Cambio rápido', 'desc' => 'Prueba varios fondos']
                    ],
                    'guide' => [
                        'kicker' => 'Guía rápida',
                        'title' => 'Cómo detectar píxeles muertos',
                        'steps' => [
                            ['title' => 'Abre la prueba', 'text' => 'Carga la herramienta y prepara la pantalla que quieres revisar.'],
                            ['title' => 'Activa pantalla completa', 'text' => 'Usa el modo completo para eliminar distracciones y ver mejor los bordes.'],
                            ['title' => 'Alterna colores', 'text' => 'Cambia entre negro, blanco, rojo, verde y azul para encontrar puntos que nunca cambian.'],
                            ['title' => 'Confirma el defecto', 'text' => 'Repite el cambio de colores para asegurarte de que el punto oscuro sigue fijo.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Prueba de Píxeles Muertos',
                        'description' => 'Herramienta online para detectar píxeles muertos con colores sólidos y pantalla completa.',
                        'url' => 'languages/spanish/dead-pixel-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/screen-test/hero.svg',
                        'features' => ['Pantalla completa', 'Colores sólidos', 'Inspección visual', 'Cambio rápido de fondo']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Inicio', 'url' => '/languages/spanish/'],
                        ['name' => 'Prueba de Píxeles Muertos', 'url' => '']
                    ],
                    'priority' => '0.74',
                    'changefreq' => 'weekly'
                ],
                'microphone-volume-test' => [
                    'path' => 'languages/spanish/microphone-volume-test.php',
                    'englishPath' => 'microphone-volume-test.php',
                    'cluster' => 'mic',
                    'toolInclude' => 'languages/spanish/tools/mic-test-tool.php',
                    'toolAnchor' => 'mic-test',
                    'meta' => [
                        'title' => 'Prueba de Volumen del Micrófono | KeyboardTester.click',
                        'description' => 'Comprueba el nivel de entrada y el pico de tu micrófono con un medidor visual en vivo. Útil para reuniones, streaming y grabación.',
                        'keywords' => 'prueba de volumen del micrófono, nivel de micrófono, medir micrófono, medidor de micrófono',
                        'ogImage' => 'images/mic-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Prueba de Volumen del Micrófono',
                        'lede' => 'Comprueba el nivel de entrada y el pico del micrófono con un medidor en vivo en tu navegador.',
                        'primaryCta' => 'Medir micrófono',
                        'secondaryCta' => 'Cómo usarlo'
                    ],
                    'toolSection' => [
                        'kicker' => 'Herramienta principal',
                        'title' => 'Medidor de volumen del micrófono',
                        'lede' => 'Usa el mismo comprobador de micrófono para verificar si el nivel sube cuando hablas a volumen normal o alto.'
                    ],
                    'trustItems' => [
                        ['title' => 'Medidor en vivo', 'desc' => 'Respuesta inmediata'],
                        ['title' => 'Nivel máximo', 'desc' => 'Pico visible'],
                        ['title' => 'Privado', 'desc' => 'Sin subir audio'],
                        ['title' => 'Sin grabación', 'desc' => 'Solo diagnóstico']
                    ],
                    'guide' => [
                        'kicker' => 'Guía rápida',
                        'title' => 'Cómo comprobar el volumen del micrófono',
                        'steps' => [
                            ['title' => 'Permite el acceso', 'text' => 'Concede permiso al navegador para usar tu micrófono.'],
                            ['title' => 'Habla a volumen normal', 'text' => 'Di una frase breve y observa si el medidor se mueve.'],
                            ['title' => 'Comprueba el pico', 'text' => 'Habla un poco más fuerte para revisar el nivel máximo que alcanza la barra.'],
                            ['title' => 'Ajusta la ganancia', 'text' => 'Si la señal es muy baja o satura, corrige el nivel en tu sistema y repite la prueba.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Prueba de Volumen del Micrófono',
                        'description' => 'Herramienta online para medir el nivel y pico del micrófono en el navegador.',
                        'url' => 'languages/spanish/microphone-volume-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/mic-test/hero.svg',
                        'features' => ['Medidor en vivo', 'Nivel máximo', 'Permisos del navegador', 'Sin grabación']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Inicio', 'url' => '/languages/spanish/'],
                        ['name' => 'Prueba de Volumen del Micrófono', 'url' => '']
                    ],
                    'priority' => '0.73',
                    'changefreq' => 'weekly'
                ],
                'camera-resolution-test' => [
                    'path' => 'languages/spanish/camera-resolution-test.php',
                    'englishPath' => 'camera-resolution-test.php',
                    'cluster' => 'webcam',
                    'toolInclude' => 'languages/spanish/tools/webcam-test-tool.php',
                    'toolAnchor' => 'webcam-test',
                    'meta' => [
                        'title' => 'Prueba de Resolución de Cámara | KeyboardTester.click',
                        'description' => 'Comprueba si tu webcam entrega 480p, 720p o 1080p en el navegador. Cambia la resolución y confirma el tamaño real del video.',
                        'keywords' => 'prueba de resolución de cámara, resolución webcam, test webcam 720p, test webcam 1080p',
                        'ogImage' => 'images/webcam-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Prueba de Resolución de Cámara',
                        'lede' => 'Comprueba si tu webcam realmente entrega 480p, 720p o 1080p dentro del navegador.',
                        'primaryCta' => 'Probar cámara',
                        'secondaryCta' => 'Guía rápida'
                    ],
                    'toolSection' => [
                        'kicker' => 'Herramienta principal',
                        'title' => 'Comprobador de resolución de cámara',
                        'lede' => 'Usa la misma herramienta de webcam para cambiar resolución, comparar resultados y revisar el tamaño real del video.'
                    ],
                    'trustItems' => [
                        ['title' => 'Vista previa', 'desc' => 'Video en vivo'],
                        ['title' => 'Resoluciones', 'desc' => '480p, 720p y más'],
                        ['title' => 'Detección real', 'desc' => 'Tamaño reportado'],
                        ['title' => 'Instantáneo', 'desc' => 'Sin instalar nada']
                    ],
                    'guide' => [
                        'kicker' => 'Guía rápida',
                        'title' => 'Cómo comprobar la resolución de la cámara',
                        'steps' => [
                            ['title' => 'Permite la cámara', 'text' => 'Concede permiso para abrir la webcam en el navegador.'],
                            ['title' => 'Elige una resolución', 'text' => 'Selecciona un ajuste como 480p, 720p o 1080p antes de iniciar la prueba.'],
                            ['title' => 'Revisa el tamaño real', 'text' => 'Comprueba la resolución que muestra la herramienta una vez que la cámara está activa.'],
                            ['title' => 'Compara varios ajustes', 'text' => 'Repite la prueba con otros valores para ver qué resoluciones soporta realmente tu webcam.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Prueba de Resolución de Cámara',
                        'description' => 'Herramienta online para comprobar la resolución real que entrega una webcam.',
                        'url' => 'languages/spanish/camera-resolution-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/webcam-test/hero.svg',
                        'features' => ['Vista previa en vivo', 'Resoluciones predefinidas', 'Tamaño real del video', 'Cambio de dispositivo']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Inicio', 'url' => '/languages/spanish/'],
                        ['name' => 'Prueba de Resolución de Cámara', 'url' => '']
                    ],
                    'priority' => '0.73',
                    'changefreq' => 'weekly'
                ],
                'scan-qr-from-image' => [
                    'path' => 'languages/spanish/scan-qr-from-image.php',
                    'englishPath' => 'scan-qr-from-image.php',
                    'cluster' => 'qr-reader',
                    'toolInclude' => 'languages/spanish/tools/qr-reader-tool.php',
                    'toolAnchor' => 'qr-reader',
                    'meta' => [
                        'title' => 'Escanear QR desde Imagen | KeyboardTester.click',
                        'description' => 'Sube una captura, foto o imagen guardada para leer un código QR online. Decodifica QR desde archivos sin instalar apps.',
                        'keywords' => 'escanear qr desde imagen, leer qr de una foto, qr desde captura, decodificar qr de imagen',
                        'ogImage' => 'images/qr-reader/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Escanear QR desde Imagen',
                        'lede' => 'Sube una captura, foto o archivo guardado para leer un código QR en el navegador.',
                        'primaryCta' => 'Leer imagen QR',
                        'secondaryCta' => 'Cómo funciona'
                    ],
                    'toolSection' => [
                        'kicker' => 'Herramienta principal',
                        'title' => 'Escáner QR desde imagen',
                        'lede' => 'Usa el mismo lector QR para decodificar capturas de pantalla, fotos impresas y archivos descargados.'
                    ],
                    'trustItems' => [
                        ['title' => 'Subida de imagen', 'desc' => 'Capturas y fotos'],
                        ['title' => 'Decodificación local', 'desc' => 'Sin apps externas'],
                        ['title' => 'Resultado rápido', 'desc' => 'Texto o URL'],
                        ['title' => 'Privado', 'desc' => 'Todo en el navegador']
                    ],
                    'guide' => [
                        'kicker' => 'Guía rápida',
                        'title' => 'Cómo leer un QR desde una imagen',
                        'steps' => [
                            ['title' => 'Sube la imagen', 'text' => 'Selecciona una captura, foto o archivo donde aparezca el código QR.'],
                            ['title' => 'Espera la lectura', 'text' => 'La herramienta analizará la imagen y buscará el código automáticamente.'],
                            ['title' => 'Revisa el resultado', 'text' => 'Copia el texto o abre la URL decodificada si la lectura fue correcta.'],
                            ['title' => 'Prueba otra imagen si falla', 'text' => 'Usa una captura más nítida o recorta el QR para mejorar la detección.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Escanear QR desde Imagen',
                        'description' => 'Herramienta online para leer códigos QR desde imágenes, capturas de pantalla y fotos.',
                        'url' => 'languages/spanish/scan-qr-from-image.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/qr-reader/hero.svg',
                        'features' => ['Subida de imágenes', 'Decodificación local', 'Resultados instantáneos', 'Sin instalar apps']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Inicio', 'url' => '/languages/spanish/'],
                        ['name' => 'Escanear QR desde Imagen', 'url' => '']
                    ],
                    'priority' => '0.72',
                    'changefreq' => 'weekly'
                ]
            ]
        ],
        'german' => [
            'htmlLang' => 'de',
            'hreflang' => 'de',
            'ogLocale' => 'de_DE',
            'dir' => 'ltr',
            'mainClass' => 'landing-main',
            'configInclude' => 'languages/german/config-de.php',
            'headerInclude' => 'languages/german/header-de.php',
            'footerInclude' => 'languages/german/footer-de.php',
            'toolsListInclude' => 'languages/german/sections/tools-list-de.php',
            'clusterKicker' => 'Verwandter Cluster',
            'openPageLabel' => 'Seite öffnen',
            'clusters' => [
                'screen' => [
                    'title' => 'Verwandte Bildschirmtests',
                    'intro' => 'Nutzen Sie denselben Bildschirmtest, um tote Pixel und andere sichtbare Panel-Fehler zu überprüfen.',
                    'pages' => [
                        [
                            'key' => 'screen-test',
                            'path' => 'languages/german/screen-test.php',
                            'name' => 'Bildschirmtest',
                            'description' => 'Öffnen Sie Vollfarben im Vollbildmodus, um Gleichmäßigkeit, Helligkeit und Displayfehler zu prüfen.'
                        ],
                        [
                            'key' => 'dead-pixel-test',
                            'path' => 'languages/german/dead-pixel-test.php',
                            'name' => 'Test für tote Pixel',
                            'description' => 'Erkennen Sie dauerhaft schwarze Punkte oder Pixel, die bei keinem Farbwechsel reagieren.'
                        ]
                    ]
                ],
                'mic' => [
                    'title' => 'Verwandte Mikrofontests',
                    'intro' => 'Mit demselben Mikrofontest können Sie den allgemeinen Zugriff oder gezielt die Eingangslautstärke prüfen.',
                    'pages' => [
                        [
                            'key' => 'mic-test',
                            'path' => 'languages/german/mic-test.php',
                            'name' => 'Mikrofontest',
                            'description' => 'Prüfen Sie Browser-Berechtigungen, Eingangspegel und die Reaktion Ihres Mikrofons.'
                        ],
                        [
                            'key' => 'microphone-volume-test',
                            'path' => 'languages/german/microphone-volume-test.php',
                            'name' => 'Mikrofon-Lautstärketest',
                            'description' => 'Messen Sie den Eingangspegel und den Spitzenwert Ihres Mikrofons mit einer Live-Anzeige.'
                        ]
                    ]
                ],
                'webcam' => [
                    'title' => 'Verwandte Kameratests',
                    'intro' => 'Dasselbe Webcam-Werkzeug hilft auch dabei, die tatsächlich gelieferte Auflösung Ihrer Kamera zu bestätigen.',
                    'pages' => [
                        [
                            'key' => 'webcam-test',
                            'path' => 'languages/german/webcam-test.php',
                            'name' => 'Webcam-Test',
                            'description' => 'Öffnen Sie die Vorschau, wechseln Sie Geräte und prüfen Sie, ob der Browser die Kamera erkennt.'
                        ],
                        [
                            'key' => 'camera-resolution-test',
                            'path' => 'languages/german/camera-resolution-test.php',
                            'name' => 'Kamera-Auflösungstest',
                            'description' => 'Prüfen Sie, ob Ihre Webcam im Browser wirklich 480p, 720p oder 1080p liefert.'
                        ]
                    ]
                ],
                'qr-reader' => [
                    'title' => 'Verwandte QR-Tests',
                    'intro' => 'Verwenden Sie denselben QR-Leser für Live-Scans oder zum Auslesen von QR-Codes aus gespeicherten Bildern.',
                    'pages' => [
                        [
                            'key' => 'qr-reader',
                            'path' => 'languages/german/qr-reader.php',
                            'name' => 'QR-Code-Leser',
                            'description' => 'Scannen Sie QR-Codes per Kamera oder durch Hochladen eines Bildes.'
                        ],
                        [
                            'key' => 'scan-qr-from-image',
                            'path' => 'languages/german/scan-qr-from-image.php',
                            'name' => 'QR aus Bild scannen',
                            'description' => 'Laden Sie Screenshots, Fotos oder gespeicherte Dateien hoch und lesen Sie den QR-Code direkt im Browser.'
                        ]
                    ]
                ]
            ],
            'pages' => [
                'dead-pixel-test' => [
                    'path' => 'languages/german/dead-pixel-test.php',
                    'englishPath' => 'dead-pixel-test.php',
                    'cluster' => 'screen',
                    'toolInclude' => 'languages/german/tools/screen-test-tool.php',
                    'toolAnchor' => 'screen-test',
                    'meta' => [
                        'title' => 'Test für tote Pixel Online | KeyboardTester.click',
                        'description' => 'Prüfen Sie Ihren Monitor mit Vollfarben und Vollbildmodus auf tote Pixel. Geeignet für Monitore, Laptops und externe Displays.',
                        'keywords' => 'test für tote pixel, tote pixel erkennen, monitor test, display fehler finden',
                        'ogImage' => 'images/screen-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Test für tote Pixel',
                        'lede' => 'Zeigen Sie Schwarz, Weiß und Vollfarben an, um Punkte zu finden, die dauerhaft dunkel bleiben.',
                        'primaryCta' => 'Bildschirm prüfen',
                        'secondaryCta' => 'Anleitung'
                    ],
                    'toolSection' => [
                        'kicker' => 'Hauptwerkzeug',
                        'title' => 'Erkennung für tote Pixel',
                        'lede' => 'Nutzen Sie denselben Bildschirmtest im Vollbildmodus, um Monitore, Laptops und externe Displays visuell zu prüfen.'
                    ],
                    'trustItems' => [
                        ['title' => 'Vollbildmodus', 'desc' => 'Klare Inspektion'],
                        ['title' => 'Vollfarben', 'desc' => 'Schwarz, Weiß und RGB'],
                        ['title' => 'Ohne Installation', 'desc' => 'Direkt im Browser'],
                        ['title' => 'Schneller Wechsel', 'desc' => 'Mehrere Hintergründe']
                    ],
                    'guide' => [
                        'kicker' => 'Kurzanleitung',
                        'title' => 'So finden Sie tote Pixel',
                        'steps' => [
                            ['title' => 'Test öffnen', 'text' => 'Laden Sie das Werkzeug und bereiten Sie den Bildschirm vor, den Sie prüfen möchten.'],
                            ['title' => 'Vollbild aktivieren', 'text' => 'Schalten Sie in den Vollbildmodus, damit Ränder und dunkle Punkte besser sichtbar sind.'],
                            ['title' => 'Farben wechseln', 'text' => 'Wechseln Sie zwischen Schwarz, Weiß, Rot, Grün und Blau, um Pixel ohne Reaktion zu finden.'],
                            ['title' => 'Defekt bestätigen', 'text' => 'Prüfen Sie denselben Punkt erneut bei mehreren Farben, bevor Sie von einem Defekt ausgehen.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Test für tote Pixel',
                        'description' => 'Online-Werkzeug zum Erkennen toter Pixel mit Vollfarben und Vollbildmodus.',
                        'url' => 'languages/german/dead-pixel-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/screen-test/hero.svg',
                        'features' => ['Vollbildmodus', 'Vollfarben', 'Visuelle Prüfung', 'Schneller Farbwechsel']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Startseite', 'url' => '/languages/german/'],
                        ['name' => 'Test für tote Pixel', 'url' => '']
                    ],
                    'priority' => '0.74',
                    'changefreq' => 'weekly'
                ],
                'microphone-volume-test' => [
                    'path' => 'languages/german/microphone-volume-test.php',
                    'englishPath' => 'microphone-volume-test.php',
                    'cluster' => 'mic',
                    'toolInclude' => 'languages/german/tools/mic-test-tool.php',
                    'toolAnchor' => 'mic-test',
                    'meta' => [
                        'title' => 'Mikrofon-Lautstärketest | KeyboardTester.click',
                        'description' => 'Prüfen Sie Eingangspegel und Spitzenwert Ihres Mikrofons mit einer Live-Anzeige. Ideal für Meetings, Streaming und Aufnahmen.',
                        'keywords' => 'mikrofon lautstärke test, mikrofon pegel prüfen, mikrofon lautstärke messen, mikrofon meter',
                        'ogImage' => 'images/mic-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Mikrofon-Lautstärketest',
                        'lede' => 'Prüfen Sie Eingangspegel und Spitzenwert Ihres Mikrofons mit einer Live-Anzeige im Browser.',
                        'primaryCta' => 'Mikrofon messen',
                        'secondaryCta' => 'Anleitung'
                    ],
                    'toolSection' => [
                        'kicker' => 'Hauptwerkzeug',
                        'title' => 'Mikrofon-Pegelmesser',
                        'lede' => 'Mit demselben Mikrofontest können Sie kontrollieren, ob der Pegel bei normaler oder lauter Sprache sichtbar ansteigt.'
                    ],
                    'trustItems' => [
                        ['title' => 'Live-Anzeige', 'desc' => 'Sofortige Reaktion'],
                        ['title' => 'Spitzenwert', 'desc' => 'Maximalpegel sichtbar'],
                        ['title' => 'Privat', 'desc' => 'Kein Upload'],
                        ['title' => 'Keine Aufnahme', 'desc' => 'Nur Diagnose']
                    ],
                    'guide' => [
                        'kicker' => 'Kurzanleitung',
                        'title' => 'So prüfen Sie die Mikrofon-Lautstärke',
                        'steps' => [
                            ['title' => 'Zugriff erlauben', 'text' => 'Erteilen Sie dem Browser die Berechtigung, Ihr Mikrofon zu verwenden.'],
                            ['title' => 'Normal sprechen', 'text' => 'Sprechen Sie einen kurzen Satz und prüfen Sie, ob sich der Pegel bewegt.'],
                            ['title' => 'Spitze testen', 'text' => 'Sprechen Sie etwas lauter, um den höchsten angezeigten Wert zu kontrollieren.'],
                            ['title' => 'Pegel anpassen', 'text' => 'Wenn das Signal zu schwach oder zu stark ist, ändern Sie die Mikrofoneinstellung und testen erneut.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Mikrofon-Lautstärketest',
                        'description' => 'Online-Werkzeug zum Messen von Mikrofonpegel und Spitzenlautstärke im Browser.',
                        'url' => 'languages/german/microphone-volume-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/mic-test/hero.svg',
                        'features' => ['Live-Anzeige', 'Spitzenwert', 'Browser-Berechtigung', 'Keine Aufnahme']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Startseite', 'url' => '/languages/german/'],
                        ['name' => 'Mikrofon-Lautstärketest', 'url' => '']
                    ],
                    'priority' => '0.73',
                    'changefreq' => 'weekly'
                ],
                'camera-resolution-test' => [
                    'path' => 'languages/german/camera-resolution-test.php',
                    'englishPath' => 'camera-resolution-test.php',
                    'cluster' => 'webcam',
                    'toolInclude' => 'languages/german/tools/webcam-test-tool.php',
                    'toolAnchor' => 'webcam-test',
                    'meta' => [
                        'title' => 'Kamera-Auflösungstest | KeyboardTester.click',
                        'description' => 'Prüfen Sie, ob Ihre Webcam im Browser 480p, 720p oder 1080p liefert. Wechseln Sie Auflösungen und vergleichen Sie die tatsächliche Größe.',
                        'keywords' => 'kamera auflösungstest, webcam auflösung testen, webcam 720p test, webcam 1080p prüfen',
                        'ogImage' => 'images/webcam-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Kamera-Auflösungstest',
                        'lede' => 'Prüfen Sie, ob Ihre Webcam im Browser wirklich 480p, 720p oder 1080p liefert.',
                        'primaryCta' => 'Kamera prüfen',
                        'secondaryCta' => 'Kurzanleitung'
                    ],
                    'toolSection' => [
                        'kicker' => 'Hauptwerkzeug',
                        'title' => 'Prüfer für Kamera-Auflösung',
                        'lede' => 'Mit demselben Webcam-Werkzeug können Sie Auflösungen wechseln, Ergebnisse vergleichen und die tatsächliche Videogröße prüfen.'
                    ],
                    'trustItems' => [
                        ['title' => 'Live-Vorschau', 'desc' => 'Video in Echtzeit'],
                        ['title' => 'Auflösungen', 'desc' => '480p, 720p und mehr'],
                        ['title' => 'Reale Größe', 'desc' => 'Gemeldete Auflösung'],
                        ['title' => 'Sofort nutzbar', 'desc' => 'Ohne Installation']
                    ],
                    'guide' => [
                        'kicker' => 'Kurzanleitung',
                        'title' => 'So prüfen Sie die Kamera-Auflösung',
                        'steps' => [
                            ['title' => 'Kamera erlauben', 'text' => 'Geben Sie dem Browser Zugriff auf Ihre Webcam.'],
                            ['title' => 'Auflösung wählen', 'text' => 'Wählen Sie vor dem Start eine Einstellung wie 480p, 720p oder 1080p aus.'],
                            ['title' => 'Tatsächliche Größe prüfen', 'text' => 'Kontrollieren Sie die Auflösung, die das Werkzeug nach dem Start anzeigt.'],
                            ['title' => 'Weitere Werte vergleichen', 'text' => 'Wiederholen Sie den Test mit anderen Presets, um die echte Unterstützung Ihrer Webcam zu sehen.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Kamera-Auflösungstest',
                        'description' => 'Online-Werkzeug zum Prüfen der tatsächlichen Webcam-Auflösung im Browser.',
                        'url' => 'languages/german/camera-resolution-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/webcam-test/hero.svg',
                        'features' => ['Live-Vorschau', 'Auflösungs-Presets', 'Reale Videogröße', 'Gerätewechsel']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Startseite', 'url' => '/languages/german/'],
                        ['name' => 'Kamera-Auflösungstest', 'url' => '']
                    ],
                    'priority' => '0.73',
                    'changefreq' => 'weekly'
                ],
                'scan-qr-from-image' => [
                    'path' => 'languages/german/scan-qr-from-image.php',
                    'englishPath' => 'scan-qr-from-image.php',
                    'cluster' => 'qr-reader',
                    'toolInclude' => 'languages/german/tools/qr-reader-tool.php',
                    'toolAnchor' => 'qr-reader',
                    'meta' => [
                        'title' => 'QR aus Bild scannen | KeyboardTester.click',
                        'description' => 'Laden Sie Screenshots, Fotos oder gespeicherte Bilder hoch, um QR-Codes online auszulesen. Kein App-Download erforderlich.',
                        'keywords' => 'qr aus bild scannen, qr code aus foto lesen, qr screenshot lesen, qr bild dekodieren',
                        'ogImage' => 'images/qr-reader/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'QR aus Bild scannen',
                        'lede' => 'Laden Sie einen Screenshot, ein Foto oder eine gespeicherte Datei hoch, um einen QR-Code direkt im Browser zu lesen.',
                        'primaryCta' => 'QR-Bild lesen',
                        'secondaryCta' => 'So funktioniert es'
                    ],
                    'toolSection' => [
                        'kicker' => 'Hauptwerkzeug',
                        'title' => 'QR-Scanner für Bilder',
                        'lede' => 'Mit demselben QR-Leser können Sie Screenshots, gedruckte Fotos und heruntergeladene Dateien dekodieren.'
                    ],
                    'trustItems' => [
                        ['title' => 'Bild-Upload', 'desc' => 'Screenshots und Fotos'],
                        ['title' => 'Lokale Dekodierung', 'desc' => 'Keine Fremd-App'],
                        ['title' => 'Schnelles Ergebnis', 'desc' => 'Text oder URL'],
                        ['title' => 'Privat', 'desc' => 'Alles im Browser']
                    ],
                    'guide' => [
                        'kicker' => 'Kurzanleitung',
                        'title' => 'So lesen Sie einen QR-Code aus einem Bild',
                        'steps' => [
                            ['title' => 'Bild hochladen', 'text' => 'Wählen Sie einen Screenshot, ein Foto oder eine Datei mit dem QR-Code aus.'],
                            ['title' => 'Analyse abwarten', 'text' => 'Das Werkzeug durchsucht das Bild automatisch nach einem QR-Code.'],
                            ['title' => 'Ergebnis prüfen', 'text' => 'Kopieren Sie den Text oder öffnen Sie die dekodierte URL, wenn der Code erfolgreich erkannt wurde.'],
                            ['title' => 'Schärferes Bild testen', 'text' => 'Wenn der Scan fehlschlägt, verwenden Sie ein klareres oder enger zugeschnittenes Bild.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'QR aus Bild scannen',
                        'description' => 'Online-Werkzeug zum Lesen von QR-Codes aus Screenshots, Fotos und gespeicherten Bildern.',
                        'url' => 'languages/german/scan-qr-from-image.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/qr-reader/hero.svg',
                        'features' => ['Bild-Upload', 'Lokale Dekodierung', 'Sofortige Ergebnisse', 'Kein App-Download']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Startseite', 'url' => '/languages/german/'],
                        ['name' => 'QR aus Bild scannen', 'url' => '']
                    ],
                    'priority' => '0.72',
                    'changefreq' => 'weekly'
                ]
            ]
        ],
        'portuguese' => [
            'htmlLang' => 'pt-BR',
            'hreflang' => 'pt',
            'ogLocale' => 'pt_BR',
            'dir' => 'ltr',
            'mainClass' => 'landing-main',
            'configInclude' => 'languages/portuguese/config-pt.php',
            'headerInclude' => 'languages/portuguese/header-pt.php',
            'footerInclude' => 'languages/portuguese/footer-pt.php',
            'toolsListInclude' => 'languages/portuguese/sections/tools-list-pt.php',
            'clusterKicker' => 'Cluster relacionado',
            'openPageLabel' => 'Abrir página',
            'clusters' => [
                'screen' => [
                    'title' => 'Testes de tela relacionados',
                    'intro' => 'Use o mesmo teste de tela para procurar pixels mortos e outros defeitos visíveis do painel.',
                    'pages' => [
                        [
                            'key' => 'screen-test',
                            'path' => 'languages/portuguese/screen-test.php',
                            'name' => 'Teste de Tela',
                            'description' => 'Abra cores sólidas em tela cheia para verificar uniformidade, brilho e falhas do display.'
                        ],
                        [
                            'key' => 'dead-pixel-test',
                            'path' => 'languages/portuguese/dead-pixel-test.php',
                            'name' => 'Teste de Pixel Morto',
                            'description' => 'Encontre pontos pretos permanentes ou pixels que não mudam ao alternar as cores.'
                        ]
                    ]
                ],
                'mic' => [
                    'title' => 'Testes de microfone relacionados',
                    'intro' => 'Com o mesmo testador de microfone você faz um teste geral ou verifica o nível de entrada em tempo real.',
                    'pages' => [
                        [
                            'key' => 'mic-test',
                            'path' => 'languages/portuguese/mic-test.php',
                            'name' => 'Teste de Microfone',
                            'description' => 'Verifique permissões, nível de entrada e resposta do microfone direto no navegador.'
                        ],
                        [
                            'key' => 'microphone-volume-test',
                            'path' => 'languages/portuguese/microphone-volume-test.php',
                            'name' => 'Teste de Volume do Microfone',
                            'description' => 'Meça o nível de entrada e o pico do microfone com um medidor visual ao vivo.'
                        ]
                    ]
                ],
                'webcam' => [
                    'title' => 'Testes de câmera relacionados',
                    'intro' => 'A mesma ferramenta de webcam também ajuda a confirmar a resolução real entregue pela sua câmera.',
                    'pages' => [
                        [
                            'key' => 'webcam-test',
                            'path' => 'languages/portuguese/webcam-test.php',
                            'name' => 'Teste de Webcam',
                            'description' => 'Abra a prévia, troque de câmera e confira se o navegador detecta o dispositivo.'
                        ],
                        [
                            'key' => 'camera-resolution-test',
                            'path' => 'languages/portuguese/camera-resolution-test.php',
                            'name' => 'Teste de Resolucao da Camera',
                            'description' => 'Confirme se a webcam realmente entrega 480p, 720p ou 1080p no navegador.'
                        ]
                    ]
                ],
                'qr-reader' => [
                    'title' => 'Testes QR relacionados',
                    'intro' => 'Use o mesmo leitor QR para escanear ao vivo ou para ler códigos salvos dentro de uma imagem.',
                    'pages' => [
                        [
                            'key' => 'qr-reader',
                            'path' => 'languages/portuguese/qr-reader.php',
                            'name' => 'Leitor de Codigo QR',
                            'description' => 'Leia codigos QR com a camera ou enviando uma imagem do dispositivo.'
                        ],
                        [
                            'key' => 'scan-qr-from-image',
                            'path' => 'languages/portuguese/scan-qr-from-image.php',
                            'name' => 'Escanear QR de Imagem',
                            'description' => 'Envie capturas de tela, fotos ou arquivos salvos para decodificar um QR no navegador.'
                        ]
                    ]
                ]
            ],
            'pages' => [
                'dead-pixel-test' => [
                    'path' => 'languages/portuguese/dead-pixel-test.php',
                    'englishPath' => 'dead-pixel-test.php',
                    'cluster' => 'screen',
                    'toolInclude' => 'languages/portuguese/tools/screen-test-tool.php',
                    'toolAnchor' => 'screen-test',
                    'meta' => [
                        'title' => 'Teste de Pixel Morto Online | KeyboardTester.click',
                        'description' => 'Procure pixels mortos com cores sólidas e modo de tela cheia. Teste monitores, notebooks e telas externas no navegador.',
                        'keywords' => 'teste de pixel morto, detectar pixel morto, teste monitor, defeito na tela',
                        'ogImage' => 'images/screen-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Teste de Pixel Morto',
                        'lede' => 'Mostre preto, branco e cores sólidas para encontrar pontos que ficam permanentemente escuros.',
                        'primaryCta' => 'Verificar tela',
                        'secondaryCta' => 'Como verificar'
                    ],
                    'toolSection' => [
                        'kicker' => 'Ferramenta principal',
                        'title' => 'Detector de pixel morto',
                        'lede' => 'Use o mesmo teste de tela em modo de tela cheia para inspecionar monitores, notebooks e displays externos.'
                    ],
                    'trustItems' => [
                        ['title' => 'Tela cheia', 'desc' => 'Inspecao limpa'],
                        ['title' => 'Cores solidas', 'desc' => 'Preto, branco e RGB'],
                        ['title' => 'Sem instalar', 'desc' => 'Tudo no navegador'],
                        ['title' => 'Troca rapida', 'desc' => 'Varios fundos']
                    ],
                    'guide' => [
                        'kicker' => 'Guia rapido',
                        'title' => 'Como encontrar pixels mortos',
                        'steps' => [
                            ['title' => 'Abra o teste', 'text' => 'Carregue a ferramenta e prepare a tela que voce quer inspecionar.'],
                            ['title' => 'Ative a tela cheia', 'text' => 'Use o modo de tela cheia para enxergar melhor cantos, bordas e pontos escuros.'],
                            ['title' => 'Alterne as cores', 'text' => 'Mude entre preto, branco, vermelho, verde e azul para achar pixels sem resposta.'],
                            ['title' => 'Confirme o defeito', 'text' => 'Repita a troca de cores para ter certeza de que o ponto continua igual em todos os fundos.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Teste de Pixel Morto',
                        'description' => 'Ferramenta online para detectar pixels mortos com cores sólidas e tela cheia.',
                        'url' => 'languages/portuguese/dead-pixel-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/screen-test/hero.svg',
                        'features' => ['Tela cheia', 'Cores sólidas', 'Inspeção visual', 'Troca rápida de fundo']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Inicio', 'url' => '/languages/portuguese/'],
                        ['name' => 'Teste de Pixel Morto', 'url' => '']
                    ],
                    'priority' => '0.74',
                    'changefreq' => 'weekly'
                ],
                'microphone-volume-test' => [
                    'path' => 'languages/portuguese/microphone-volume-test.php',
                    'englishPath' => 'microphone-volume-test.php',
                    'cluster' => 'mic',
                    'toolInclude' => 'languages/portuguese/tools/mic-test-tool.php',
                    'toolAnchor' => 'mic-test',
                    'meta' => [
                        'title' => 'Teste de Volume do Microfone | KeyboardTester.click',
                        'description' => 'Confira o nível de entrada e o pico do microfone com um medidor visual ao vivo. Útil para chamadas, streaming e gravações.',
                        'keywords' => 'teste de volume do microfone, nivel do microfone, medir microfone, medidor de microfone',
                        'ogImage' => 'images/mic-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Teste de Volume do Microfone',
                        'lede' => 'Confira o nível de entrada e o pico do microfone com um medidor ao vivo no navegador.',
                        'primaryCta' => 'Medir microfone',
                        'secondaryCta' => 'Guia rapido'
                    ],
                    'toolSection' => [
                        'kicker' => 'Ferramenta principal',
                        'title' => 'Medidor de volume do microfone',
                        'lede' => 'Use o mesmo testador de microfone para confirmar se o nível sobe quando voce fala em volume normal ou mais alto.'
                    ],
                    'trustItems' => [
                        ['title' => 'Medidor ao vivo', 'desc' => 'Resposta imediata'],
                        ['title' => 'Pico maximo', 'desc' => 'Nivel visivel'],
                        ['title' => 'Privado', 'desc' => 'Sem enviar audio'],
                        ['title' => 'Sem gravacao', 'desc' => 'Apenas diagnostico']
                    ],
                    'guide' => [
                        'kicker' => 'Guia rapido',
                        'title' => 'Como verificar o volume do microfone',
                        'steps' => [
                            ['title' => 'Permita o acesso', 'text' => 'Autorize o navegador a usar o microfone.'],
                            ['title' => 'Fale normalmente', 'text' => 'Diga uma frase curta e veja se a barra de nivel se move.'],
                            ['title' => 'Teste o pico', 'text' => 'Fale um pouco mais alto para verificar o valor maximo alcançado pelo medidor.'],
                            ['title' => 'Ajuste o ganho', 'text' => 'Se o sinal estiver fraco ou estourado, mude o nivel no sistema e repita o teste.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Teste de Volume do Microfone',
                        'description' => 'Ferramenta online para medir o nível e o pico do microfone no navegador.',
                        'url' => 'languages/portuguese/microphone-volume-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/mic-test/hero.svg',
                        'features' => ['Medidor ao vivo', 'Pico máximo', 'Permissão do navegador', 'Sem gravação']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Inicio', 'url' => '/languages/portuguese/'],
                        ['name' => 'Teste de Volume do Microfone', 'url' => '']
                    ],
                    'priority' => '0.73',
                    'changefreq' => 'weekly'
                ],
                'camera-resolution-test' => [
                    'path' => 'languages/portuguese/camera-resolution-test.php',
                    'englishPath' => 'camera-resolution-test.php',
                    'cluster' => 'webcam',
                    'toolInclude' => 'languages/portuguese/tools/webcam-test-tool.php',
                    'toolAnchor' => 'webcam-test',
                    'meta' => [
                        'title' => 'Teste de Resolucao da Camera | KeyboardTester.click',
                        'description' => 'Confira se sua webcam realmente entrega 480p, 720p ou 1080p no navegador. Troque a resolucao e compare o tamanho real do video.',
                        'keywords' => 'teste de resolucao da camera, resolucao webcam, teste webcam 720p, teste webcam 1080p',
                        'ogImage' => 'images/webcam-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Teste de Resolucao da Camera',
                        'lede' => 'Confirme se sua webcam realmente entrega 480p, 720p ou 1080p dentro do navegador.',
                        'primaryCta' => 'Testar camera',
                        'secondaryCta' => 'Guia rapido'
                    ],
                    'toolSection' => [
                        'kicker' => 'Ferramenta principal',
                        'title' => 'Verificador de resolucao da camera',
                        'lede' => 'Use a mesma ferramenta de webcam para trocar resolucoes, comparar resultados e conferir o tamanho real do video.'
                    ],
                    'trustItems' => [
                        ['title' => 'Previa ao vivo', 'desc' => 'Video em tempo real'],
                        ['title' => 'Resolucao', 'desc' => '480p, 720p e mais'],
                        ['title' => 'Tamanho real', 'desc' => 'Resolucao informada'],
                        ['title' => 'Sem instalar', 'desc' => 'Pronto no navegador']
                    ],
                    'guide' => [
                        'kicker' => 'Guia rapido',
                        'title' => 'Como verificar a resolucao da camera',
                        'steps' => [
                            ['title' => 'Permita a camera', 'text' => 'Autorize o navegador a abrir a webcam.'],
                            ['title' => 'Escolha a resolucao', 'text' => 'Selecione um preset como 480p, 720p ou 1080p antes de iniciar o teste.'],
                            ['title' => 'Confira o tamanho real', 'text' => 'Veja qual resolucao a ferramenta mostra depois que a camera ficar ativa.'],
                            ['title' => 'Compare outros presets', 'text' => 'Repita com outros valores para descobrir quais resolucoes sua webcam suporta de verdade.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Teste de Resolucao da Camera',
                        'description' => 'Ferramenta online para verificar a resolucao real entregue por uma webcam.',
                        'url' => 'languages/portuguese/camera-resolution-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/webcam-test/hero.svg',
                        'features' => ['Previa ao vivo', 'Presets de resolucao', 'Tamanho real do video', 'Troca de dispositivo']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Inicio', 'url' => '/languages/portuguese/'],
                        ['name' => 'Teste de Resolucao da Camera', 'url' => '']
                    ],
                    'priority' => '0.73',
                    'changefreq' => 'weekly'
                ],
                'scan-qr-from-image' => [
                    'path' => 'languages/portuguese/scan-qr-from-image.php',
                    'englishPath' => 'scan-qr-from-image.php',
                    'cluster' => 'qr-reader',
                    'toolInclude' => 'languages/portuguese/tools/qr-reader-tool.php',
                    'toolAnchor' => 'qr-reader',
                    'meta' => [
                        'title' => 'Escanear QR de Imagem | KeyboardTester.click',
                        'description' => 'Envie uma captura, foto ou imagem salva para ler um codigo QR online. Decodifique QR de arquivo sem instalar aplicativos.',
                        'keywords' => 'escanear qr de imagem, ler qr de foto, qr de captura de tela, decodificar qr de imagem',
                        'ogImage' => 'images/qr-reader/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'Escanear QR de Imagem',
                        'lede' => 'Envie uma captura, foto ou arquivo salvo para ler um codigo QR direto no navegador.',
                        'primaryCta' => 'Ler imagem QR',
                        'secondaryCta' => 'Como funciona'
                    ],
                    'toolSection' => [
                        'kicker' => 'Ferramenta principal',
                        'title' => 'Leitor QR a partir de imagem',
                        'lede' => 'Use o mesmo leitor QR para decodificar capturas de tela, fotos impressas e arquivos baixados.'
                    ],
                    'trustItems' => [
                        ['title' => 'Upload de imagem', 'desc' => 'Capturas e fotos'],
                        ['title' => 'Leitura local', 'desc' => 'Sem app externo'],
                        ['title' => 'Resultado rapido', 'desc' => 'Texto ou URL'],
                        ['title' => 'Privado', 'desc' => 'Tudo no navegador']
                    ],
                    'guide' => [
                        'kicker' => 'Guia rapido',
                        'title' => 'Como ler um QR a partir de uma imagem',
                        'steps' => [
                            ['title' => 'Envie a imagem', 'text' => 'Selecione uma captura, foto ou arquivo em que o QR apareça com clareza.'],
                            ['title' => 'Espere a leitura', 'text' => 'A ferramenta vai analisar a imagem e procurar o codigo automaticamente.'],
                            ['title' => 'Confira o resultado', 'text' => 'Copie o texto ou abra a URL decodificada se a leitura foi bem-sucedida.'],
                            ['title' => 'Teste outra imagem se precisar', 'text' => 'Se falhar, use uma foto mais nítida ou recorte o QR para melhorar a detecção.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'Escanear QR de Imagem',
                        'description' => 'Ferramenta online para ler codigos QR de imagens, capturas de tela e fotos.',
                        'url' => 'languages/portuguese/scan-qr-from-image.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/qr-reader/hero.svg',
                        'features' => ['Upload de imagem', 'Decodificacao local', 'Resultados rapidos', 'Sem instalar aplicativo']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'Inicio', 'url' => '/languages/portuguese/'],
                        ['name' => 'Escanear QR de Imagem', 'url' => '']
                    ],
                    'priority' => '0.72',
                    'changefreq' => 'weekly'
                ]
            ]
        ],
        'arabic' => [
            'htmlLang' => 'ar',
            'hreflang' => 'ar',
            'ogLocale' => 'ar_AR',
            'dir' => 'rtl',
            'mainClass' => 'landing-main arabic-page',
            'configInclude' => 'languages/arabic/config-ar.php',
            'headerInclude' => 'languages/arabic/header-ar.php',
            'footerInclude' => 'languages/arabic/footer-ar.php',
            'toolsListInclude' => 'languages/arabic/sections/tools-list-ar.php',
            'fontHref' => 'https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;600;700&display=swap',
            'clusterKicker' => 'مجموعة مرتبطة',
            'openPageLabel' => 'افتح الصفحة',
            'clusters' => [
                'screen' => [
                    'title' => 'اختبارات شاشة مرتبطة',
                    'intro' => 'استخدم أداة فحص الشاشة نفسها للبحث عن البكسلات الميتة وغيرها من عيوب اللوحة المرئية.',
                    'pages' => [
                        [
                            'key' => 'screen-test',
                            'path' => 'languages/arabic/screen-test.php',
                            'name' => 'اختبار الشاشة',
                            'description' => 'اعرض ألواناً كاملة في وضع ملء الشاشة للتحقق من التناسق والسطوع وعيوب الشاشة.'
                        ],
                        [
                            'key' => 'dead-pixel-test',
                            'path' => 'languages/arabic/dead-pixel-test.php',
                            'name' => 'اختبار البكسلات الميتة',
                            'description' => 'اكتشف النقاط السوداء الثابتة أو البكسلات التي لا تتغير عند تبديل الألوان.'
                        ]
                    ]
                ],
                'mic' => [
                    'title' => 'اختبارات ميكروفون مرتبطة',
                    'intro' => 'يمكنك استخدام أداة فحص الميكروفون نفسها للفحص العام أو لقياس مستوى الإدخال بشكل مباشر.',
                    'pages' => [
                        [
                            'key' => 'mic-test',
                            'path' => 'languages/arabic/mic-test.php',
                            'name' => 'اختبار الميكروفون',
                            'description' => 'تحقق من الأذونات ومستوى الإدخال واستجابة الميكروفون مباشرة من المتصفح.'
                        ],
                        [
                            'key' => 'microphone-volume-test',
                            'path' => 'languages/arabic/microphone-volume-test.php',
                            'name' => 'اختبار مستوى صوت الميكروفون',
                            'description' => 'قِس مستوى الإدخال وقمة الإشارة للميكروفون باستخدام مؤشر مباشر.'
                        ]
                    ]
                ],
                'webcam' => [
                    'title' => 'اختبارات كاميرا مرتبطة',
                    'intro' => 'الأداة نفسها تساعدك أيضاً على التأكد من الدقة الحقيقية التي تقدمها الكاميرا داخل المتصفح.',
                    'pages' => [
                        [
                            'key' => 'webcam-test',
                            'path' => 'languages/arabic/webcam-test.php',
                            'name' => 'اختبار كاميرا الويب',
                            'description' => 'افتح المعاينة المباشرة وبدّل بين الكاميرات وتحقق من اكتشاف الجهاز.'
                        ],
                        [
                            'key' => 'camera-resolution-test',
                            'path' => 'languages/arabic/camera-resolution-test.php',
                            'name' => 'اختبار دقة الكاميرا',
                            'description' => 'تحقق مما إذا كانت كاميرا الويب تقدم 480p أو 720p أو 1080p فعلياً داخل المتصفح.'
                        ]
                    ]
                ],
                'qr-reader' => [
                    'title' => 'اختبارات QR مرتبطة',
                    'intro' => 'استخدم قارئ QR نفسه للمسح المباشر أو لقراءة الرموز الموجودة داخل الصور المحفوظة.',
                    'pages' => [
                        [
                            'key' => 'qr-reader',
                            'path' => 'languages/arabic/qr-reader.php',
                            'name' => 'قارئ رمز QR',
                            'description' => 'اقرأ رموز QR باستخدام الكاميرا أو برفع صورة من جهازك.'
                        ],
                        [
                            'key' => 'scan-qr-from-image',
                            'path' => 'languages/arabic/scan-qr-from-image.php',
                            'name' => 'مسح رمز QR من صورة',
                            'description' => 'ارفع لقطة شاشة أو صورة أو ملفاً محفوظاً لقراءة رمز QR مباشرة من المتصفح.'
                        ]
                    ]
                ]
            ],
            'pages' => [
                'dead-pixel-test' => [
                    'path' => 'languages/arabic/dead-pixel-test.php',
                    'englishPath' => 'dead-pixel-test.php',
                    'cluster' => 'screen',
                    'toolInclude' => 'languages/arabic/tools/screen-test-tool.php',
                    'toolAnchor' => 'screen-test',
                    'meta' => [
                        'title' => 'اختبار البكسلات الميتة أونلاين | KeyboardTester.click',
                        'description' => 'افحص الشاشة بحثاً عن البكسلات الميتة باستخدام ألوان كاملة ووضع ملء الشاشة. مناسب للشاشات واللابتوبات والشاشات الخارجية.',
                        'keywords' => 'اختبار البكسلات الميتة, كشف البكسلات الميتة, فحص الشاشة, عيوب الشاشة',
                        'ogImage' => 'images/screen-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'اختبار البكسلات الميتة',
                        'lede' => 'اعرض الأسود والأبيض والألوان الكاملة لاكتشاف النقاط التي تبقى داكنة دائماً.',
                        'primaryCta' => 'افحص الشاشة',
                        'secondaryCta' => 'طريقة الفحص'
                    ],
                    'toolSection' => [
                        'kicker' => 'الأداة الرئيسية',
                        'title' => 'كاشف البكسلات الميتة',
                        'lede' => 'استخدم أداة فحص الشاشة نفسها في وضع ملء الشاشة لمراجعة الشاشات واللابتوبات والشاشات الخارجية بصرياً.'
                    ],
                    'trustItems' => [
                        ['title' => 'ملء الشاشة', 'desc' => 'فحص أوضح'],
                        ['title' => 'ألوان كاملة', 'desc' => 'أسود وأبيض وRGB'],
                        ['title' => 'بدون تثبيت', 'desc' => 'كل شيء في المتصفح'],
                        ['title' => 'تبديل سريع', 'desc' => 'خلفيات متعددة']
                    ],
                    'guide' => [
                        'kicker' => 'دليل سريع',
                        'title' => 'كيف تكتشف البكسلات الميتة',
                        'steps' => [
                            ['title' => 'افتح الأداة', 'text' => 'شغّل الأداة وجهّز الشاشة التي تريد فحصها.'],
                            ['title' => 'فعّل وضع ملء الشاشة', 'text' => 'استخدم الوضع الكامل حتى ترى الحواف والزوايا والنقاط الداكنة بوضوح.'],
                            ['title' => 'بدّل بين الألوان', 'text' => 'غيّر بين الأسود والأبيض والأحمر والأخضر والأزرق للعثور على البكسلات التي لا تستجيب.'],
                            ['title' => 'أكد وجود العيب', 'text' => 'كرر تبديل الألوان للتأكد من أن النقطة الداكنة ثابتة في كل الخلفيات.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'اختبار البكسلات الميتة',
                        'description' => 'أداة عبر المتصفح لاكتشاف البكسلات الميتة باستخدام ألوان كاملة ووضع ملء الشاشة.',
                        'url' => 'languages/arabic/dead-pixel-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/screen-test/hero.svg',
                        'features' => ['وضع ملء الشاشة', 'ألوان كاملة', 'فحص بصري', 'تبديل سريع للخلفيات']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'الرئيسية', 'url' => '/languages/arabic/'],
                        ['name' => 'اختبار البكسلات الميتة', 'url' => '']
                    ],
                    'priority' => '0.74',
                    'changefreq' => 'weekly'
                ],
                'microphone-volume-test' => [
                    'path' => 'languages/arabic/microphone-volume-test.php',
                    'englishPath' => 'microphone-volume-test.php',
                    'cluster' => 'mic',
                    'toolInclude' => 'languages/arabic/tools/mic-test-tool.php',
                    'toolAnchor' => 'mic-test',
                    'meta' => [
                        'title' => 'اختبار مستوى صوت الميكروفون | KeyboardTester.click',
                        'description' => 'تحقق من مستوى إدخال الميكروفون وقمة الإشارة بمؤشر مباشر داخل المتصفح. مناسب للاجتماعات والبث والتسجيل.',
                        'keywords' => 'اختبار مستوى صوت الميكروفون, قياس مستوى الميكروفون, مؤشر الميكروفون, فحص الميكروفون',
                        'ogImage' => 'images/mic-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'اختبار مستوى صوت الميكروفون',
                        'lede' => 'تحقق من مستوى إدخال الميكروفون وقمة الإشارة بمؤشر مباشر داخل المتصفح.',
                        'primaryCta' => 'قِس الميكروفون',
                        'secondaryCta' => 'دليل سريع'
                    ],
                    'toolSection' => [
                        'kicker' => 'الأداة الرئيسية',
                        'title' => 'مقياس مستوى الميكروفون',
                        'lede' => 'استخدم أداة فحص الميكروفون نفسها للتأكد من ارتفاع المستوى عندما تتحدث بصوت عادي أو مرتفع.'
                    ],
                    'trustItems' => [
                        ['title' => 'مؤشر مباشر', 'desc' => 'استجابة فورية'],
                        ['title' => 'قمة الإشارة', 'desc' => 'أعلى مستوى ظاهر'],
                        ['title' => 'خصوصية', 'desc' => 'بدون رفع صوت'],
                        ['title' => 'بدون تسجيل', 'desc' => 'تشخيص فقط']
                    ],
                    'guide' => [
                        'kicker' => 'دليل سريع',
                        'title' => 'كيف تتحقق من مستوى صوت الميكروفون',
                        'steps' => [
                            ['title' => 'اسمح بالوصول', 'text' => 'امنح المتصفح إذناً لاستخدام الميكروفون.'],
                            ['title' => 'تحدث بشكل طبيعي', 'text' => 'قل جملة قصيرة وتحقق من تحرك المؤشر.'],
                            ['title' => 'اختبر القمة', 'text' => 'تحدث بصوت أعلى قليلاً لمراجعة أعلى قيمة يصل إليها المؤشر.'],
                            ['title' => 'عدّل الكسب', 'text' => 'إذا كانت الإشارة ضعيفة أو مشوشة فعدّل إعداد الميكروفون في النظام وكرر الفحص.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'اختبار مستوى صوت الميكروفون',
                        'description' => 'أداة عبر المتصفح لقياس مستوى الميكروفون وقمة الإشارة بشكل مباشر.',
                        'url' => 'languages/arabic/microphone-volume-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/mic-test/hero.svg',
                        'features' => ['مؤشر مباشر', 'قمة الإشارة', 'أذونات المتصفح', 'بدون تسجيل']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'الرئيسية', 'url' => '/languages/arabic/'],
                        ['name' => 'اختبار مستوى صوت الميكروفون', 'url' => '']
                    ],
                    'priority' => '0.73',
                    'changefreq' => 'weekly'
                ],
                'camera-resolution-test' => [
                    'path' => 'languages/arabic/camera-resolution-test.php',
                    'englishPath' => 'camera-resolution-test.php',
                    'cluster' => 'webcam',
                    'toolInclude' => 'languages/arabic/tools/webcam-test-tool.php',
                    'toolAnchor' => 'webcam-test',
                    'meta' => [
                        'title' => 'اختبار دقة الكاميرا | KeyboardTester.click',
                        'description' => 'تحقق مما إذا كانت كاميرا الويب تقدم 480p أو 720p أو 1080p فعلياً داخل المتصفح. بدّل الدقة وقارن الحجم الحقيقي للفيديو.',
                        'keywords' => 'اختبار دقة الكاميرا, دقة كاميرا الويب, اختبار 720p, اختبار 1080p',
                        'ogImage' => 'images/webcam-test/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'اختبار دقة الكاميرا',
                        'lede' => 'تأكد مما إذا كانت كاميرا الويب تقدم 480p أو 720p أو 1080p فعلياً داخل المتصفح.',
                        'primaryCta' => 'اختبر الكاميرا',
                        'secondaryCta' => 'دليل سريع'
                    ],
                    'toolSection' => [
                        'kicker' => 'الأداة الرئيسية',
                        'title' => 'فاحص دقة الكاميرا',
                        'lede' => 'استخدم أداة كاميرا الويب نفسها لتبديل الدقات ومقارنة النتائج والتحقق من الحجم الحقيقي للفيديو.'
                    ],
                    'trustItems' => [
                        ['title' => 'معاينة مباشرة', 'desc' => 'فيديو حي'],
                        ['title' => 'دقات متعددة', 'desc' => '480p و720p وأكثر'],
                        ['title' => 'الحجم الحقيقي', 'desc' => 'الدقة المبلغ عنها'],
                        ['title' => 'بدون تثبيت', 'desc' => 'جاهز في المتصفح']
                    ],
                    'guide' => [
                        'kicker' => 'دليل سريع',
                        'title' => 'كيف تتحقق من دقة الكاميرا',
                        'steps' => [
                            ['title' => 'اسمح للكاميرا', 'text' => 'امنح المتصفح إذناً لفتح كاميرا الويب.'],
                            ['title' => 'اختر الدقة', 'text' => 'حدد قيمة مثل 480p أو 720p أو 1080p قبل بدء الاختبار.'],
                            ['title' => 'راجع الحجم الحقيقي', 'text' => 'تحقق من الدقة التي تعرضها الأداة بعد تشغيل الكاميرا.'],
                            ['title' => 'قارن أكثر من إعداد', 'text' => 'كرر الاختبار مع قيم مختلفة لمعرفة الدقات التي تدعمها الكاميرا فعلياً.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'اختبار دقة الكاميرا',
                        'description' => 'أداة عبر المتصفح للتحقق من الدقة الحقيقية التي تقدمها كاميرا الويب.',
                        'url' => 'languages/arabic/camera-resolution-test.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/webcam-test/hero.svg',
                        'features' => ['معاينة مباشرة', 'دقات محددة مسبقاً', 'الحجم الحقيقي للفيديو', 'تبديل الجهاز']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'الرئيسية', 'url' => '/languages/arabic/'],
                        ['name' => 'اختبار دقة الكاميرا', 'url' => '']
                    ],
                    'priority' => '0.73',
                    'changefreq' => 'weekly'
                ],
                'scan-qr-from-image' => [
                    'path' => 'languages/arabic/scan-qr-from-image.php',
                    'englishPath' => 'scan-qr-from-image.php',
                    'cluster' => 'qr-reader',
                    'toolInclude' => 'languages/arabic/tools/qr-reader-tool.php',
                    'toolAnchor' => 'qr-reader',
                    'meta' => [
                        'title' => 'مسح رمز QR من صورة | KeyboardTester.click',
                        'description' => 'ارفع لقطة شاشة أو صورة أو ملفاً محفوظاً لقراءة رمز QR أونلاين. فك التشفير من الصور بدون تثبيت تطبيقات.',
                        'keywords' => 'مسح qr من صورة, قراءة qr من لقطة شاشة, فك qr من صورة, قارئ qr من ملف',
                        'ogImage' => 'images/qr-reader/hero.svg'
                    ],
                    'hero' => [
                        'title' => 'مسح رمز QR من صورة',
                        'lede' => 'ارفع لقطة شاشة أو صورة أو ملفاً محفوظاً لقراءة رمز QR مباشرة من المتصفح.',
                        'primaryCta' => 'اقرأ صورة QR',
                        'secondaryCta' => 'كيف يعمل'
                    ],
                    'toolSection' => [
                        'kicker' => 'الأداة الرئيسية',
                        'title' => 'قارئ QR من صورة',
                        'lede' => 'استخدم قارئ QR نفسه لفك تشفير لقطات الشاشة والصور المطبوعة والملفات التي تم تنزيلها.'
                    ],
                    'trustItems' => [
                        ['title' => 'رفع صورة', 'desc' => 'لقطات وصور'],
                        ['title' => 'فك محلي', 'desc' => 'بدون تطبيق خارجي'],
                        ['title' => 'نتيجة سريعة', 'desc' => 'نص أو رابط'],
                        ['title' => 'خصوصية', 'desc' => 'كل شيء في المتصفح']
                    ],
                    'guide' => [
                        'kicker' => 'دليل سريع',
                        'title' => 'كيف تقرأ رمز QR من صورة',
                        'steps' => [
                            ['title' => 'ارفع الصورة', 'text' => 'اختر لقطة شاشة أو صورة أو ملفاً يظهر فيه رمز QR بوضوح.'],
                            ['title' => 'انتظر التحليل', 'text' => 'ستبحث الأداة داخل الصورة عن رمز QR بشكل تلقائي.'],
                            ['title' => 'راجع النتيجة', 'text' => 'انسخ النص أو افتح الرابط الذي تم فك تشفيره إذا تمت القراءة بنجاح.'],
                            ['title' => 'جرّب صورة أوضح', 'text' => 'إذا فشل الفحص فاستخدم صورة أشد وضوحاً أو قص الرمز لتحسين الكشف.']
                        ]
                    ],
                    'schema' => [
                        'name' => 'مسح رمز QR من صورة',
                        'description' => 'أداة عبر المتصفح لقراءة رموز QR من الصور ولقطات الشاشة والملفات المحفوظة.',
                        'url' => 'languages/arabic/scan-qr-from-image.php',
                        'category' => 'UtilityApplication',
                        'screenshot' => 'images/qr-reader/hero.svg',
                        'features' => ['رفع الصور', 'فك تشفير محلي', 'نتائج سريعة', 'بدون تثبيت تطبيق']
                    ],
                    'breadcrumbs' => [
                        ['name' => 'الرئيسية', 'url' => '/languages/arabic/'],
                        ['name' => 'مسح رمز QR من صورة', 'url' => '']
                    ],
                    'priority' => '0.72',
                    'changefreq' => 'weekly'
                ]
            ]
        ]
    ];

    if (function_exists('getLocalizedIntentPhase6Catalog')) {
        $catalog = array_merge($catalog, getLocalizedIntentPhase6Catalog());
    }

    return $catalog;
}

function getLocalizedIntentPage($language, $slug) {
    $catalog = getLocalizedIntentCatalog();
    return $catalog[$language]['pages'][$slug] ?? null;
}

function getLocalizedIntentLanguageConfig($language) {
    $catalog = getLocalizedIntentCatalog();
    return $catalog[$language] ?? null;
}

function getLocalizedIntentCluster($language, $cluster) {
    $catalog = getLocalizedIntentCatalog();
    return $catalog[$language]['clusters'][$cluster] ?? null;
}

function getLocalizedIntentUrlEntries() {
    $entries = [];
    foreach (getLocalizedIntentCatalog() as $language => $config) {
        foreach ($config['pages'] as $slug => $page) {
            $entries[] = [
                'language' => $language,
                'slug' => $slug,
                'path' => $page['path'],
                'url' => absoluteUrl($page['path']),
                'lastmodSource' => $page['path'],
                'changefreq' => $page['changefreq'] ?? 'weekly',
                'priority' => $page['priority'] ?? '0.7'
            ];
        }
    }
    return $entries;
}
