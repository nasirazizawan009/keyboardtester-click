<?php
if (!function_exists('getLocalizedIntentPhase6Catalog')) {
    function getLocalizedIntentPhase6Catalog() {
        $catalog = [
            'french' => [
                'htmlLang' => 'fr',
                'hreflang' => 'fr',
                'ogLocale' => 'fr_FR',
                'dir' => 'ltr',
                'mainClass' => 'landing-main',
                'configInclude' => 'languages/french/config-fr.php',
                'headerInclude' => 'languages/french/header-fr.php',
                'footerInclude' => 'languages/french/footer-fr.php',
                'toolsListInclude' => 'languages/french/sections/tools-list-fr.php',
                'clusterKicker' => 'Cluster associé',
                'openPageLabel' => 'Ouvrir la page',
                'clusters' => [
                    'screen' => [
                        'title' => 'Tests d\'écran associés',
                        'intro' => 'Utilisez le même test d\'écran pour repérer les pixels morts et les autres défauts visibles de la dalle.',
                        'pages' => [
                            [
                                'key' => 'screen-test',
                                'path' => 'languages/french/screen-test.php',
                                'name' => 'Test d\'Écran',
                                'description' => 'Affichez des couleurs unies en plein écran pour vérifier l\'uniformité, la luminosité et les défauts de l\'écran.'
                            ],
                            [
                                'key' => 'dead-pixel-test',
                                'path' => 'languages/french/dead-pixel-test.php',
                                'name' => 'Test de Pixels Morts',
                                'description' => 'Repérez les points noirs permanents ou les sous-pixels qui ne changent jamais pendant le test.'
                            ]
                        ]
                    ],
                    'mic' => [
                        'title' => 'Tests de micro associés',
                        'intro' => 'Utilisez le même test de microphone pour un contrôle général ou pour vérifier le niveau d\'entrée en direct.',
                        'pages' => [
                            [
                                'key' => 'mic-test',
                                'path' => 'languages/french/mic-test.php',
                                'name' => 'Test de Microphone',
                                'description' => 'Vérifiez les autorisations, l\'entrée audio et la réponse du micro directement dans le navigateur.'
                            ],
                            [
                                'key' => 'microphone-volume-test',
                                'path' => 'languages/french/microphone-volume-test.php',
                                'name' => 'Test de Volume du Microphone',
                                'description' => 'Mesurez le niveau d\'entrée actuel et le pic du micro avec un indicateur visuel en direct.'
                            ]
                        ]
                    ],
                    'webcam' => [
                        'title' => 'Tests de webcam associés',
                        'intro' => 'Le même outil webcam permet aussi de vérifier la résolution réellement fournie par votre caméra.',
                        'pages' => [
                            [
                                'key' => 'webcam-test',
                                'path' => 'languages/french/webcam-test.php',
                                'name' => 'Test de Webcam',
                                'description' => 'Ouvrez l\'aperçu, changez de caméra et vérifiez si le navigateur détecte bien votre appareil.'
                            ],
                            [
                                'key' => 'camera-resolution-test',
                                'path' => 'languages/french/camera-resolution-test.php',
                                'name' => 'Test de Résolution de la Caméra',
                                'description' => 'Vérifiez si votre webcam fournit vraiment du 480p, 720p ou 1080p dans le navigateur.'
                            ]
                        ]
                    ],
                    'qr-reader' => [
                        'title' => 'Tests QR associés',
                        'intro' => 'Utilisez le même lecteur QR pour scanner en direct ou pour lire un code déjà enregistré dans une image.',
                        'pages' => [
                            [
                                'key' => 'qr-reader',
                                'path' => 'languages/french/qr-reader.php',
                                'name' => 'Lecteur de QR Code',
                                'description' => 'Scannez un QR code avec la caméra ou en envoyant une image depuis votre appareil.'
                            ],
                            [
                                'key' => 'scan-qr-from-image',
                                'path' => 'languages/french/scan-qr-from-image.php',
                                'name' => 'Scanner un QR depuis une Image',
                                'description' => 'Envoyez une capture d\'écran, une photo ou un fichier téléchargé pour décoder un QR en quelques secondes.'
                            ]
                        ]
                    ]
                ],
                'pages' => [
                    'dead-pixel-test' => [
                        'path' => 'languages/french/dead-pixel-test.php',
                        'englishPath' => 'dead-pixel-test.php',
                        'cluster' => 'screen',
                        'toolInclude' => 'languages/french/tools/screen-test-tool.php',
                        'toolAnchor' => 'screen-test',
                        'meta' => [
                            'title' => 'Test de Pixels Morts en Ligne | KeyboardTester.click',
                            'description' => 'Repérez les pixels morts sur votre écran avec des couleurs unies et le mode plein écran. Vérifiez moniteurs, PC portables et écrans externes dans le navigateur.',
                            'keywords' => 'test de pixels morts, détecter pixels morts, test moniteur, vérifier écran',
                            'ogImage' => 'images/screen-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'Test de Pixels Morts',
                            'lede' => 'Affichez du noir, du blanc et des couleurs unies pour repérer les points qui restent toujours sombres.',
                            'primaryCta' => 'Vérifier l\'écran',
                            'secondaryCta' => 'Comment vérifier'
                        ],
                        'toolSection' => [
                            'kicker' => 'Outil principal',
                            'title' => 'Détecteur de pixels morts',
                            'lede' => 'Utilisez le même test d\'écran pour inspecter moniteurs, PC portables et écrans externes en plein écran.'
                        ],
                        'trustItems' => [
                            ['title' => 'Plein écran', 'desc' => 'Inspection claire'],
                            ['title' => 'Couleurs unies', 'desc' => 'Noir, blanc et RGB'],
                            ['title' => 'Sans installation', 'desc' => 'Tout dans le navigateur'],
                            ['title' => 'Changement rapide', 'desc' => 'Passez d\'un fond à l\'autre']
                        ],
                        'guide' => [
                            'kicker' => 'Guide rapide',
                            'title' => 'Comment repérer les pixels morts',
                            'steps' => [
                                ['title' => 'Ouvrez le test', 'text' => 'Chargez l\'outil et préparez l\'écran que vous voulez vérifier.'],
                                ['title' => 'Passez en plein écran', 'text' => 'Activez le mode plein écran pour voir plus facilement les bords et les défauts.'],
                                ['title' => 'Faites défiler les couleurs', 'text' => 'Alternez noir, blanc, rouge, vert et bleu pour trouver les points qui ne changent jamais.'],
                                ['title' => 'Confirmez le défaut', 'text' => 'Répétez plusieurs couleurs pour vérifier que le point sombre reste bloqué.']
                            ]
                        ],
                        'schema' => [
                            'name' => 'Test de Pixels Morts',
                            'description' => 'Outil en ligne pour détecter les pixels morts avec des couleurs unies et le mode plein écran.',
                            'url' => 'languages/french/dead-pixel-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/screen-test/hero.svg',
                            'features' => ['Plein écran', 'Couleurs unies', 'Inspection visuelle', 'Changement rapide de fond']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'Accueil', 'url' => '/languages/french/'],
                            ['name' => 'Test de Pixels Morts', 'url' => '']
                        ],
                        'priority' => '0.74',
                        'changefreq' => 'weekly'
                    ],
                    'microphone-volume-test' => [
                        'path' => 'languages/french/microphone-volume-test.php',
                        'englishPath' => 'microphone-volume-test.php',
                        'cluster' => 'mic',
                        'toolInclude' => 'languages/french/tools/mic-test-tool.php',
                        'toolAnchor' => 'mic-test',
                        'meta' => [
                            'title' => 'Test de Volume du Microphone | KeyboardTester.click',
                            'description' => 'Vérifiez le niveau d\'entrée et le pic de votre micro avec un indicateur visuel en direct. Utile pour les réunions, le streaming et l\'enregistrement.',
                            'keywords' => 'test volume microphone, niveau micro, mesurer micro, indicateur micro',
                            'ogImage' => 'images/mic-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'Test de Volume du Microphone',
                            'lede' => 'Vérifiez le niveau d\'entrée et le pic du micro avec un indicateur visuel en direct dans votre navigateur.',
                            'primaryCta' => 'Mesurer le micro',
                            'secondaryCta' => 'Comment l\'utiliser'
                        ],
                        'toolSection' => [
                            'kicker' => 'Outil principal',
                            'title' => 'Indicateur de volume du micro',
                            'lede' => 'Utilisez le même test de microphone pour voir si le niveau monte quand vous parlez normalement ou plus fort.'
                        ],
                        'trustItems' => [
                            ['title' => 'Indicateur en direct', 'desc' => 'Réponse immédiate'],
                            ['title' => 'Pic maximal', 'desc' => 'Crête visible'],
                            ['title' => 'Privé', 'desc' => 'Aucun envoi audio'],
                            ['title' => 'Sans enregistrement', 'desc' => 'Diagnostic uniquement']
                        ],
                        'guide' => [
                            'kicker' => 'Guide rapide',
                            'title' => 'Comment vérifier le volume du micro',
                            'steps' => [
                                ['title' => 'Autorisez l\'accès', 'text' => 'Donnez au navigateur l\'autorisation d\'utiliser votre microphone.'],
                                ['title' => 'Parlez normalement', 'text' => 'Dites une phrase courte et regardez si l\'indicateur bouge.'],
                                ['title' => 'Vérifiez le pic', 'text' => 'Parlez un peu plus fort pour voir le niveau maximal atteint par la barre.'],
                                ['title' => 'Ajustez le gain', 'text' => 'Si le signal est trop faible ou saturé, corrigez le niveau système puis recommencez.']
                            ]
                        ],
                        'schema' => [
                            'name' => 'Test de Volume du Microphone',
                            'description' => 'Outil en ligne pour mesurer le niveau et le pic du microphone dans le navigateur.',
                            'url' => 'languages/french/microphone-volume-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/mic-test/hero.svg',
                            'features' => ['Indicateur en direct', 'Niveau maximal', 'Permissions navigateur', 'Sans enregistrement']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'Accueil', 'url' => '/languages/french/'],
                            ['name' => 'Test de Volume du Microphone', 'url' => '']
                        ],
                        'priority' => '0.73',
                        'changefreq' => 'weekly'
                    ],
                    'camera-resolution-test' => [
                        'path' => 'languages/french/camera-resolution-test.php',
                        'englishPath' => 'camera-resolution-test.php',
                        'cluster' => 'webcam',
                        'toolInclude' => 'languages/french/tools/webcam-test-tool.php',
                        'toolAnchor' => 'webcam-test',
                        'meta' => [
                            'title' => 'Test de Résolution de la Caméra | KeyboardTester.click',
                            'description' => 'Vérifiez si votre webcam fournit du 480p, 720p ou 1080p dans le navigateur. Changez de résolution et confirmez la taille réelle de la vidéo.',
                            'keywords' => 'test résolution caméra, résolution webcam, test webcam 720p, test webcam 1080p',
                            'ogImage' => 'images/webcam-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'Test de Résolution de la Caméra',
                            'lede' => 'Vérifiez si votre webcam fournit réellement du 480p, 720p ou 1080p dans le navigateur.',
                            'primaryCta' => 'Tester la caméra',
                            'secondaryCta' => 'Guide rapide'
                        ],
                        'toolSection' => [
                            'kicker' => 'Outil principal',
                            'title' => 'Vérificateur de résolution caméra',
                            'lede' => 'Utilisez le même outil webcam pour changer de résolution, comparer les résultats et voir la taille réelle de la vidéo.'
                        ],
                        'trustItems' => [
                            ['title' => 'Aperçu en direct', 'desc' => 'Vidéo instantanée'],
                            ['title' => 'Résolutions', 'desc' => '480p, 720p et plus'],
                            ['title' => 'Valeur réelle', 'desc' => 'Taille signalée'],
                            ['title' => 'Sans installation', 'desc' => 'Prêt dans le navigateur']
                        ],
                        'guide' => [
                            'kicker' => 'Guide rapide',
                            'title' => 'Comment vérifier la résolution de la caméra',
                            'steps' => [
                                ['title' => 'Autorisez la caméra', 'text' => 'Donnez au navigateur l\'accès nécessaire pour ouvrir votre webcam.'],
                                ['title' => 'Choisissez une résolution', 'text' => 'Sélectionnez 480p, 720p ou 1080p avant de lancer le test.'],
                                ['title' => 'Vérifiez la taille réelle', 'text' => 'Regardez la résolution affichée par l\'outil une fois la caméra active.'],
                                ['title' => 'Comparez plusieurs réglages', 'text' => 'Relancez le test avec d\'autres valeurs pour voir ce que la webcam prend réellement en charge.']
                            ]
                        ],
                        'schema' => [
                            'name' => 'Test de Résolution de la Caméra',
                            'description' => 'Outil en ligne pour vérifier la résolution réelle fournie par une webcam.',
                            'url' => 'languages/french/camera-resolution-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/webcam-test/hero.svg',
                            'features' => ['Aperçu en direct', 'Résolutions prédéfinies', 'Taille réelle de la vidéo', 'Changement d\'appareil']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'Accueil', 'url' => '/languages/french/'],
                            ['name' => 'Test de Résolution de la Caméra', 'url' => '']
                        ],
                        'priority' => '0.73',
                        'changefreq' => 'weekly'
                    ],
                    'scan-qr-from-image' => [
                        'path' => 'languages/french/scan-qr-from-image.php',
                        'englishPath' => 'scan-qr-from-image.php',
                        'cluster' => 'qr-reader',
                        'toolInclude' => 'languages/french/tools/qr-reader-tool.php',
                        'toolAnchor' => 'qr-reader',
                        'meta' => [
                            'title' => 'Scanner un QR depuis une Image | KeyboardTester.click',
                            'description' => 'Envoyez une capture d\'écran, une photo ou un fichier enregistré pour lire un QR code en ligne. Décodez des images sans installer d\'application.',
                            'keywords' => 'scanner qr image, lire qr capture écran, décoder qr photo, lecteur qr fichier',
                            'ogImage' => 'images/qr-reader/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'Scanner un QR depuis une Image',
                            'lede' => 'Envoyez une capture d\'écran, une photo ou un fichier enregistré pour lire un QR code directement dans le navigateur.',
                            'primaryCta' => 'Lire l\'image QR',
                            'secondaryCta' => 'Comment ça marche'
                        ],
                        'toolSection' => [
                            'kicker' => 'Outil principal',
                            'title' => 'Lecteur QR depuis image',
                            'lede' => 'Utilisez le même lecteur QR pour décoder des captures d\'écran, des photos imprimées et des fichiers téléchargés.'
                        ],
                        'trustItems' => [
                            ['title' => 'Envoi d\'image', 'desc' => 'Captures et photos'],
                            ['title' => 'Décodage local', 'desc' => 'Sans service externe'],
                            ['title' => 'Résultat rapide', 'desc' => 'Texte ou lien'],
                            ['title' => 'Confidentiel', 'desc' => 'Tout reste dans le navigateur']
                        ],
                        'guide' => [
                            'kicker' => 'Guide rapide',
                            'title' => 'Comment lire un QR depuis une image',
                            'steps' => [
                                ['title' => 'Envoyez l\'image', 'text' => 'Choisissez une capture d\'écran, une photo ou un fichier où le QR code est clairement visible.'],
                                ['title' => 'Laissez l\'outil analyser', 'text' => 'Le lecteur cherche automatiquement un QR code dans l\'image téléchargée.'],
                                ['title' => 'Vérifiez le résultat', 'text' => 'Copiez le texte ou ouvrez le lien si le code est lu correctement.'],
                                ['title' => 'Essayez une image plus nette', 'text' => 'Si la lecture échoue, envoyez une image plus claire ou recadrez le QR pour améliorer la détection.']
                            ]
                        ],
                        'schema' => [
                            'name' => 'Scanner un QR depuis une Image',
                            'description' => 'Outil en ligne pour lire des QR codes à partir d\'images, de captures d\'écran et de fichiers enregistrés.',
                            'url' => 'languages/french/scan-qr-from-image.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/qr-reader/hero.svg',
                            'features' => ['Envoi d\'image', 'Décodage local', 'Résultats rapides', 'Sans application']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'Accueil', 'url' => '/languages/french/'],
                            ['name' => 'Scanner un QR depuis une Image', 'url' => '']
                        ],
                        'priority' => '0.72',
                        'changefreq' => 'weekly'
                    ]
                ]
            ],
            'russian' => [
                'htmlLang' => 'ru',
                'hreflang' => 'ru',
                'ogLocale' => 'ru_RU',
                'dir' => 'ltr',
                'mainClass' => 'landing-main',
                'configInclude' => 'languages/russian/config-ru.php',
                'headerInclude' => 'languages/russian/header-ru.php',
                'footerInclude' => 'languages/russian/footer-ru.php',
                'toolsListInclude' => 'languages/russian/sections/tools-list-ru.php',
                'clusterKicker' => 'Связанный кластер',
                'openPageLabel' => 'Открыть страницу',
                'clusters' => [
                    'screen' => [
                        'title' => 'Связанные проверки экрана',
                        'intro' => 'Используйте тот же тест экрана, чтобы искать битые пиксели и другие видимые дефекты панели.',
                        'pages' => [
                            [
                                'key' => 'screen-test',
                                'path' => 'languages/russian/screen-test.php',
                                'name' => 'Тестер Экрана',
                                'description' => 'Откройте сплошные цвета в полноэкранном режиме, чтобы проверить равномерность, яркость и дефекты дисплея.'
                            ],
                            [
                                'key' => 'dead-pixel-test',
                                'path' => 'languages/russian/dead-pixel-test.php',
                                'name' => 'Тест на Битые Пиксели',
                                'description' => 'Находите постоянно темные точки и субпиксели, которые не меняются при переключении цветов.'
                            ]
                        ]
                    ],
                    'mic' => [
                        'title' => 'Связанные проверки микрофона',
                        'intro' => 'Используйте тот же тест микрофона для общей проверки и для контроля уровня входного сигнала в реальном времени.',
                        'pages' => [
                            [
                                'key' => 'mic-test',
                                'path' => 'languages/russian/mic-test.php',
                                'name' => 'Тест Микрофона',
                                'description' => 'Проверьте разрешение браузера, входной сигнал и реакцию индикатора микрофона прямо на странице.'
                            ],
                            [
                                'key' => 'microphone-volume-test',
                                'path' => 'languages/russian/microphone-volume-test.php',
                                'name' => 'Тест Громкости Микрофона',
                                'description' => 'Измеряйте текущий уровень и пиковую громкость микрофона с помощью живого индикатора.'
                            ]
                        ]
                    ],
                    'webcam' => [
                        'title' => 'Связанные проверки камеры',
                        'intro' => 'Тот же инструмент для веб-камеры помогает проверить и реальное разрешение, которое выдает устройство.',
                        'pages' => [
                            [
                                'key' => 'webcam-test',
                                'path' => 'languages/russian/webcam-test.php',
                                'name' => 'Тест Веб-Камеры',
                                'description' => 'Откройте предпросмотр, переключайте камеры и проверьте, видит ли браузер ваше устройство.'
                            ],
                            [
                                'key' => 'camera-resolution-test',
                                'path' => 'languages/russian/camera-resolution-test.php',
                                'name' => 'Тест Разрешения Камеры',
                                'description' => 'Проверьте, выдает ли веб-камера 480p, 720p или 1080p прямо в браузере.'
                            ]
                        ]
                    ],
                    'qr-reader' => [
                        'title' => 'Связанные QR-проверки',
                        'intro' => 'Используйте тот же QR-ридер для сканирования в реальном времени или чтения кода из сохраненного изображения.',
                        'pages' => [
                            [
                                'key' => 'qr-reader',
                                'path' => 'languages/russian/qr-reader.php',
                                'name' => 'Считыватель QR-Кодов',
                                'description' => 'Сканируйте QR-коды с камеры или загружайте изображение прямо с устройства.'
                            ],
                            [
                                'key' => 'scan-qr-from-image',
                                'path' => 'languages/russian/scan-qr-from-image.php',
                                'name' => 'Сканировать QR с Изображения',
                                'description' => 'Загрузите скриншот, фотографию или сохраненный файл, чтобы быстро декодировать QR-код.'
                            ]
                        ]
                    ]
                ],
                'pages' => [
                    'dead-pixel-test' => [
                        'path' => 'languages/russian/dead-pixel-test.php',
                        'englishPath' => 'dead-pixel-test.php',
                        'cluster' => 'screen',
                        'toolInclude' => 'languages/russian/tools/screen-test-tool.php',
                        'toolAnchor' => 'screen-test',
                        'meta' => [
                            'title' => 'Тест на Битые Пиксели Онлайн | KeyboardTester.click',
                            'description' => 'Проверьте монитор на битые пиксели с помощью сплошных цветов и полноэкранного режима. Подходит для мониторов, ноутбуков и внешних дисплеев.',
                            'keywords' => 'тест битых пикселей, проверить пиксели, тест монитора, проверка экрана',
                            'ogImage' => 'images/screen-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'Тест на Битые Пиксели',
                            'lede' => 'Покажите черный, белый и сплошные цвета, чтобы найти точки, которые всегда остаются темными.',
                            'primaryCta' => 'Проверить экран',
                            'secondaryCta' => 'Как проверить'
                        ],
                        'toolSection' => [
                            'kicker' => 'Основной инструмент',
                            'title' => 'Проверка битых пикселей',
                            'lede' => 'Используйте тот же тест экрана, чтобы осматривать мониторы, ноутбуки и внешние дисплеи в полноэкранном режиме.'
                        ],
                        'trustItems' => [
                            ['title' => 'Полный экран', 'desc' => 'Чистый просмотр'],
                            ['title' => 'Сплошные цвета', 'desc' => 'Черный, белый и RGB'],
                            ['title' => 'Без установки', 'desc' => 'Все в браузере'],
                            ['title' => 'Быстрое переключение', 'desc' => 'Проверка на разных фонах']
                        ],
                        'guide' => [
                            'kicker' => 'Быстрый гид',
                            'title' => 'Как искать битые пиксели',
                            'steps' => [
                                ['title' => 'Откройте тест', 'text' => 'Запустите инструмент и подготовьте экран, который хотите проверить.'],
                                ['title' => 'Включите полный экран', 'text' => 'Полноэкранный режим помогает лучше видеть края и мелкие дефекты.'],
                                ['title' => 'Переключайте цвета', 'text' => 'Меняйте черный, белый, красный, зеленый и синий, чтобы найти точки, которые не меняются.'],
                                ['title' => 'Подтвердите дефект', 'text' => 'Повторите несколько цветов, чтобы убедиться, что темная точка остается на месте.']
                            ]
                        ],
                        'schema' => [
                            'name' => 'Тест на Битые Пиксели',
                            'description' => 'Онлайн-инструмент для поиска битых пикселей с помощью сплошных цветов и полноэкранного режима.',
                            'url' => 'languages/russian/dead-pixel-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/screen-test/hero.svg',
                            'features' => ['Полный экран', 'Сплошные цвета', 'Визуальный осмотр', 'Быстрое переключение фона']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'Главная', 'url' => '/languages/russian/'],
                            ['name' => 'Тест на Битые Пиксели', 'url' => '']
                        ],
                        'priority' => '0.74',
                        'changefreq' => 'weekly'
                    ],
                    'microphone-volume-test' => [
                        'path' => 'languages/russian/microphone-volume-test.php',
                        'englishPath' => 'microphone-volume-test.php',
                        'cluster' => 'mic',
                        'toolInclude' => 'languages/russian/tools/mic-test-tool.php',
                        'toolAnchor' => 'mic-test',
                        'meta' => [
                            'title' => 'Тест Громкости Микрофона | KeyboardTester.click',
                            'description' => 'Проверьте уровень входного сигнала и пик микрофона с помощью живого индикатора. Полезно для созвонов, стриминга и записи.',
                            'keywords' => 'тест громкости микрофона, уровень микрофона, измерить микрофон, индикатор микрофона',
                            'ogImage' => 'images/mic-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'Тест Громкости Микрофона',
                            'lede' => 'Проверьте уровень входного сигнала и пик микрофона с живым индикатором прямо в браузере.',
                            'primaryCta' => 'Измерить микрофон',
                            'secondaryCta' => 'Как использовать'
                        ],
                        'toolSection' => [
                            'kicker' => 'Основной инструмент',
                            'title' => 'Индикатор громкости микрофона',
                            'lede' => 'Используйте тот же тест микрофона, чтобы увидеть, как меняется уровень, когда вы говорите обычным и громким голосом.'
                        ],
                        'trustItems' => [
                            ['title' => 'Живой индикатор', 'desc' => 'Мгновенная реакция'],
                            ['title' => 'Пиковый уровень', 'desc' => 'Видимый максимум'],
                            ['title' => 'Приватно', 'desc' => 'Без отправки аудио'],
                            ['title' => 'Без записи', 'desc' => 'Только диагностика']
                        ],
                        'guide' => [
                            'kicker' => 'Быстрый гид',
                            'title' => 'Как проверить громкость микрофона',
                            'steps' => [
                                ['title' => 'Разрешите доступ', 'text' => 'Разрешите браузеру использовать ваш микрофон.'],
                                ['title' => 'Скажите фразу', 'text' => 'Произнесите короткую фразу и посмотрите, двигается ли индикатор.'],
                                ['title' => 'Проверьте пик', 'text' => 'Скажите немного громче, чтобы увидеть максимальный уровень на шкале.'],
                                ['title' => 'Настройте усиление', 'text' => 'Если сигнал слишком тихий или перегружен, измените уровень в системе и повторите тест.']
                            ]
                        ],
                        'schema' => [
                            'name' => 'Тест Громкости Микрофона',
                            'description' => 'Онлайн-инструмент для измерения уровня и пика микрофона в браузере.',
                            'url' => 'languages/russian/microphone-volume-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/mic-test/hero.svg',
                            'features' => ['Живой индикатор', 'Пиковый уровень', 'Разрешения браузера', 'Без записи']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'Главная', 'url' => '/languages/russian/'],
                            ['name' => 'Тест Громкости Микрофона', 'url' => '']
                        ],
                        'priority' => '0.73',
                        'changefreq' => 'weekly'
                    ],
                    'camera-resolution-test' => [
                        'path' => 'languages/russian/camera-resolution-test.php',
                        'englishPath' => 'camera-resolution-test.php',
                        'cluster' => 'webcam',
                        'toolInclude' => 'languages/russian/tools/webcam-test-tool.php',
                        'toolAnchor' => 'webcam-test',
                        'meta' => [
                            'title' => 'Тест Разрешения Камеры | KeyboardTester.click',
                            'description' => 'Проверьте, выдает ли ваша веб-камера 480p, 720p или 1080p в браузере. Меняйте режим и смотрите фактический размер видео.',
                            'keywords' => 'тест разрешения камеры, разрешение веб-камеры, тест 720p, тест 1080p',
                            'ogImage' => 'images/webcam-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'Тест Разрешения Камеры',
                            'lede' => 'Проверьте, действительно ли веб-камера выдает 480p, 720p или 1080p прямо в браузере.',
                            'primaryCta' => 'Проверить камеру',
                            'secondaryCta' => 'Быстрый гид'
                        ],
                        'toolSection' => [
                            'kicker' => 'Основной инструмент',
                            'title' => 'Проверка разрешения камеры',
                            'lede' => 'Используйте тот же инструмент веб-камеры, чтобы переключать разрешение, сравнивать результаты и видеть реальный размер видео.'
                        ],
                        'trustItems' => [
                            ['title' => 'Живой просмотр', 'desc' => 'Видео сразу'],
                            ['title' => 'Разрешения', 'desc' => '480p, 720p и выше'],
                            ['title' => 'Фактический размер', 'desc' => 'Реально выданное видео'],
                            ['title' => 'Без установки', 'desc' => 'Все в браузере']
                        ],
                        'guide' => [
                            'kicker' => 'Быстрый гид',
                            'title' => 'Как проверить разрешение камеры',
                            'steps' => [
                                ['title' => 'Разрешите камеру', 'text' => 'Дайте браузеру доступ к веб-камере.'],
                                ['title' => 'Выберите разрешение', 'text' => 'Установите 480p, 720p или 1080p перед запуском теста.'],
                                ['title' => 'Посмотрите реальный размер', 'text' => 'Проверьте разрешение, которое показывает инструмент после запуска камеры.'],
                                ['title' => 'Сравните несколько режимов', 'text' => 'Повторите тест с другими значениями, чтобы увидеть, что поддерживает камера на практике.']
                            ]
                        ],
                        'schema' => [
                            'name' => 'Тест Разрешения Камеры',
                            'description' => 'Онлайн-инструмент для проверки реального разрешения, которое выдает веб-камера.',
                            'url' => 'languages/russian/camera-resolution-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/webcam-test/hero.svg',
                            'features' => ['Живой просмотр', 'Предустановленные разрешения', 'Реальный размер видео', 'Смена устройства']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'Главная', 'url' => '/languages/russian/'],
                            ['name' => 'Тест Разрешения Камеры', 'url' => '']
                        ],
                        'priority' => '0.73',
                        'changefreq' => 'weekly'
                    ],
                    'scan-qr-from-image' => [
                        'path' => 'languages/russian/scan-qr-from-image.php',
                        'englishPath' => 'scan-qr-from-image.php',
                        'cluster' => 'qr-reader',
                        'toolInclude' => 'languages/russian/tools/qr-reader-tool.php',
                        'toolAnchor' => 'qr-reader',
                        'meta' => [
                            'title' => 'Сканировать QR с Изображения | KeyboardTester.click',
                            'description' => 'Загрузите скриншот, фотографию или сохраненный файл, чтобы считать QR-код онлайн. Декодируйте изображение без установки приложений.',
                            'keywords' => 'скан qr с изображения, qr со скриншота, декодировать qr фото, qr из файла',
                            'ogImage' => 'images/qr-reader/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'Сканировать QR с Изображения',
                            'lede' => 'Загрузите скриншот, фотографию или сохраненный файл, чтобы прочитать QR-код прямо в браузере.',
                            'primaryCta' => 'Прочитать QR с изображения',
                            'secondaryCta' => 'Как это работает'
                        ],
                        'toolSection' => [
                            'kicker' => 'Основной инструмент',
                            'title' => 'QR-ридер по изображению',
                            'lede' => 'Используйте тот же QR-ридер для декодирования скриншотов, печатных фотографий и загруженных файлов.'
                        ],
                        'trustItems' => [
                            ['title' => 'Загрузка изображения', 'desc' => 'Скриншоты и фото'],
                            ['title' => 'Локальное декодирование', 'desc' => 'Без внешних сервисов'],
                            ['title' => 'Быстрый результат', 'desc' => 'Текст или ссылка'],
                            ['title' => 'Конфиденциально', 'desc' => 'Все остается в браузере']
                        ],
                        'guide' => [
                            'kicker' => 'Быстрый гид',
                            'title' => 'Как считать QR с изображения',
                            'steps' => [
                                ['title' => 'Загрузите изображение', 'text' => 'Выберите скриншот, фотографию или файл, где QR-код хорошо виден.'],
                                ['title' => 'Подождите анализ', 'text' => 'Инструмент автоматически ищет QR-код в загруженном изображении.'],
                                ['title' => 'Проверьте результат', 'text' => 'Скопируйте текст или откройте ссылку, если код успешно прочитан.'],
                                ['title' => 'Попробуйте более четкое изображение', 'text' => 'Если чтение не удалось, загрузите более резкую картинку или обрежьте QR-код.']
                            ]
                        ],
                        'schema' => [
                            'name' => 'Сканировать QR с Изображения',
                            'description' => 'Онлайн-инструмент для чтения QR-кодов с изображений, скриншотов и сохраненных файлов.',
                            'url' => 'languages/russian/scan-qr-from-image.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/qr-reader/hero.svg',
                            'features' => ['Загрузка изображения', 'Локальное декодирование', 'Быстрый результат', 'Без приложения']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'Главная', 'url' => '/languages/russian/'],
                            ['name' => 'Сканировать QR с Изображения', 'url' => '']
                        ],
                        'priority' => '0.72',
                        'changefreq' => 'weekly'
                    ]
                ]
            ],
            'japanese' => [
                'htmlLang' => 'ja',
                'hreflang' => 'ja',
                'ogLocale' => 'ja_JP',
                'dir' => 'ltr',
                'mainClass' => 'landing-main',
                'configInclude' => 'languages/japanese/config-ja.php',
                'headerInclude' => 'languages/japanese/header-ja.php',
                'footerInclude' => 'languages/japanese/footer-ja.php',
                'toolsListInclude' => 'languages/japanese/sections/tools-list-ja.php',
                'fontHref' => 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap',
                'bodyFontFamily' => "'Noto Sans JP', 'Space Grotesk', sans-serif",
                'clusterKicker' => '関連クラスター',
                'openPageLabel' => 'ページを開く',
                'clusters' => [
                    'screen' => [
                        'title' => '関連する画面テスト',
                        'intro' => '同じ画面テストで、ドット抜けやその他の見えるパネル不良を確認できます。',
                        'pages' => [
                            [
                                'key' => 'screen-test',
                                'path' => 'languages/japanese/screen-test.php',
                                'name' => '画面テスト',
                                'description' => '全画面で単色表示を開き、表示ムラ、明るさ、パネル不良を確認します。'
                            ],
                            [
                                'key' => 'dead-pixel-test',
                                'path' => 'languages/japanese/dead-pixel-test.php',
                                'name' => 'ドット抜けテスト',
                                'description' => '色を切り替えても変わらない黒い点やサブピクセルを見つけます。'
                            ]
                        ]
                    ],
                    'mic' => [
                        'title' => '関連するマイクテスト',
                        'intro' => '同じマイクテストで、一般的な動作確認と入力レベルの確認をまとめて行えます。',
                        'pages' => [
                            [
                                'key' => 'mic-test',
                                'path' => 'languages/japanese/mic-test.php',
                                'name' => 'マイクテスト',
                                'description' => 'ブラウザ権限、音声入力、レベルの反応をページ上ですぐに確認できます。'
                            ],
                            [
                                'key' => 'microphone-volume-test',
                                'path' => 'languages/japanese/microphone-volume-test.php',
                                'name' => 'マイク音量テスト',
                                'description' => 'リアルタイムのメーターで現在の入力レベルとピークを確認します。'
                            ]
                        ]
                    ],
                    'webcam' => [
                        'title' => '関連するウェブカメラテスト',
                        'intro' => '同じウェブカメラツールで、映像確認だけでなく実際の解像度も検証できます。',
                        'pages' => [
                            [
                                'key' => 'webcam-test',
                                'path' => 'languages/japanese/webcam-test.php',
                                'name' => 'ウェブカメラテスト',
                                'description' => 'プレビューを開き、カメラを切り替え、ブラウザがデバイスを認識しているか確認します。'
                            ],
                            [
                                'key' => 'camera-resolution-test',
                                'path' => 'languages/japanese/camera-resolution-test.php',
                                'name' => 'カメラ解像度テスト',
                                'description' => 'ブラウザ内でウェブカメラが 480p、720p、1080p を本当に出しているか確認します。'
                            ]
                        ]
                    ],
                    'qr-reader' => [
                        'title' => '関連するQRテスト',
                        'intro' => '同じQRリーダーで、ライブ読み取りと画像保存済みのQRコード読み取りの両方に対応します。',
                        'pages' => [
                            [
                                'key' => 'qr-reader',
                                'path' => 'languages/japanese/qr-reader.php',
                                'name' => 'QRコードリーダー',
                                'description' => 'カメラやアップロード画像から QR コードをブラウザ内で読み取ります。'
                            ],
                            [
                                'key' => 'scan-qr-from-image',
                                'path' => 'languages/japanese/scan-qr-from-image.php',
                                'name' => '画像からQRをスキャン',
                                'description' => 'スクリーンショット、写真、保存済み画像から QR コードを数秒でデコードします。'
                            ]
                        ]
                    ]
                ],
                'pages' => [
                    'dead-pixel-test' => [
                        'path' => 'languages/japanese/dead-pixel-test.php',
                        'englishPath' => 'dead-pixel-test.php',
                        'cluster' => 'screen',
                        'toolInclude' => 'languages/japanese/tools/screen-test-tool.php',
                        'toolAnchor' => 'screen-test',
                        'meta' => [
                            'title' => 'ドット抜けテスト | KeyboardTester.click',
                            'description' => '単色表示と全画面モードでモニターのドット抜けを確認します。モニター、ノート PC、外部ディスプレイをブラウザでチェックできます。',
                            'keywords' => 'ドット抜けテスト, デッドピクセル, 画面チェック, モニターテスト',
                            'ogImage' => 'images/screen-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'ドット抜けテスト',
                            'lede' => '黒、白、単色画面を表示して、常に暗いままの点を見つけます。',
                            'primaryCta' => '画面を確認',
                            'secondaryCta' => '確認方法'
                        ],
                        'toolSection' => [
                            'kicker' => 'メインツール',
                            'title' => 'ドット抜けチェッカー',
                            'lede' => '同じ画面テストを使って、モニター、ノート PC、外部ディスプレイを全画面で確認できます。'
                        ],
                        'trustItems' => [
                            ['title' => '全画面表示', 'desc' => '見やすい確認'],
                            ['title' => '単色表示', 'desc' => '黒、白、RGB'],
                            ['title' => 'インストール不要', 'desc' => 'ブラウザだけで完結'],
                            ['title' => '素早い切替', 'desc' => '背景をすぐ変更']
                        ],
                        'guide' => [
                            'kicker' => 'クイックガイド',
                            'title' => 'ドット抜けの見つけ方',
                            'steps' => [
                                ['title' => 'テストを開く', 'text' => 'ツールを読み込み、確認したい画面を準備します。'],
                                ['title' => '全画面にする', 'text' => '全画面にすると端や細かな不良まで見つけやすくなります。'],
                                ['title' => '色を切り替える', 'text' => '黒、白、赤、緑、青を切り替えて変化しない点を探します。'],
                                ['title' => '不良を確認する', 'text' => '複数の色で繰り返し確認し、暗い点が固定されているか確かめます。']
                            ]
                        ],
                        'schema' => [
                            'name' => 'ドット抜けテスト',
                            'description' => '単色表示と全画面モードでドット抜けを探すためのオンラインツールです。',
                            'url' => 'languages/japanese/dead-pixel-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/screen-test/hero.svg',
                            'features' => ['全画面表示', '単色表示', '目視確認', '背景の素早い切替']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'ホーム', 'url' => '/languages/japanese/'],
                            ['name' => 'ドット抜けテスト', 'url' => '']
                        ],
                        'priority' => '0.74',
                        'changefreq' => 'weekly'
                    ],
                    'microphone-volume-test' => [
                        'path' => 'languages/japanese/microphone-volume-test.php',
                        'englishPath' => 'microphone-volume-test.php',
                        'cluster' => 'mic',
                        'toolInclude' => 'languages/japanese/tools/mic-test-tool.php',
                        'toolAnchor' => 'mic-test',
                        'meta' => [
                            'title' => 'マイク音量テスト | KeyboardTester.click',
                            'description' => 'リアルタイムメーターでマイクの入力レベルとピークを確認します。会議、配信、録音前の確認に便利です。',
                            'keywords' => 'マイク音量テスト, マイクレベル, マイク測定, マイクメーター',
                            'ogImage' => 'images/mic-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'マイク音量テスト',
                            'lede' => 'ブラウザ内のライブメーターでマイク入力レベルとピークを確認します。',
                            'primaryCta' => 'マイクを測定',
                            'secondaryCta' => '使い方'
                        ],
                        'toolSection' => [
                            'kicker' => 'メインツール',
                            'title' => 'マイク音量メーター',
                            'lede' => '同じマイクテストを使って、普通の声や大きな声で入力レベルがどう変わるか確認します。'
                        ],
                        'trustItems' => [
                            ['title' => 'ライブメーター', 'desc' => 'すぐ反応'],
                            ['title' => 'ピーク表示', 'desc' => '最大値を確認'],
                            ['title' => 'プライベート', 'desc' => '音声は送信しない'],
                            ['title' => '録音なし', 'desc' => '診断専用']
                        ],
                        'guide' => [
                            'kicker' => 'クイックガイド',
                            'title' => 'マイク音量の確認方法',
                            'steps' => [
                                ['title' => 'アクセスを許可する', 'text' => 'ブラウザにマイクの使用を許可します。'],
                                ['title' => '普通の声で話す', 'text' => '短いフレーズを話して、メーターが動くか確認します。'],
                                ['title' => 'ピークを見る', 'text' => '少し大きな声で話して、バーの最大値を確認します。'],
                                ['title' => '入力レベルを調整する', 'text' => '小さすぎたり大きすぎたりする場合は、システム側の入力レベルを調整して再確認します。']
                            ]
                        ],
                        'schema' => [
                            'name' => 'マイク音量テスト',
                            'description' => 'ブラウザ上でマイクの入力レベルとピークを測定するオンラインツールです。',
                            'url' => 'languages/japanese/microphone-volume-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/mic-test/hero.svg',
                            'features' => ['ライブメーター', 'ピーク表示', 'ブラウザ権限確認', '録音なし']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'ホーム', 'url' => '/languages/japanese/'],
                            ['name' => 'マイク音量テスト', 'url' => '']
                        ],
                        'priority' => '0.73',
                        'changefreq' => 'weekly'
                    ],
                    'camera-resolution-test' => [
                        'path' => 'languages/japanese/camera-resolution-test.php',
                        'englishPath' => 'camera-resolution-test.php',
                        'cluster' => 'webcam',
                        'toolInclude' => 'languages/japanese/tools/webcam-test-tool.php',
                        'toolAnchor' => 'webcam-test',
                        'meta' => [
                            'title' => 'カメラ解像度テスト | KeyboardTester.click',
                            'description' => 'ウェブカメラがブラウザ内で 480p、720p、1080p を本当に出しているか確認します。解像度を切り替えて実際の映像サイズを確認できます。',
                            'keywords' => 'カメラ解像度テスト, ウェブカメラ解像度, 720p テスト, 1080p テスト',
                            'ogImage' => 'images/webcam-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => 'カメラ解像度テスト',
                            'lede' => 'ウェブカメラがブラウザで実際に出している解像度を確認します。',
                            'primaryCta' => 'カメラを確認',
                            'secondaryCta' => 'クイックガイド'
                        ],
                        'toolSection' => [
                            'kicker' => 'メインツール',
                            'title' => 'カメラ解像度チェッカー',
                            'lede' => '同じウェブカメラツールで解像度を切り替え、結果を比較し、実際の映像サイズを確認できます。'
                        ],
                        'trustItems' => [
                            ['title' => 'ライブプレビュー', 'desc' => '映像をその場で確認'],
                            ['title' => '解像度切替', 'desc' => '480p、720p 以上'],
                            ['title' => '実測サイズ', 'desc' => '実際の映像サイズ'],
                            ['title' => 'インストール不要', 'desc' => 'ブラウザだけで実行']
                        ],
                        'guide' => [
                            'kicker' => 'クイックガイド',
                            'title' => 'カメラ解像度の確認方法',
                            'steps' => [
                                ['title' => 'カメラを許可する', 'text' => 'ブラウザにウェブカメラのアクセスを許可します。'],
                                ['title' => '解像度を選ぶ', 'text' => 'テスト前に 480p、720p、1080p などを選択します。'],
                                ['title' => '実際のサイズを見る', 'text' => 'カメラ起動後にツールが表示する解像度を確認します。'],
                                ['title' => '複数の設定を比べる', 'text' => '別の値でも試して、ウェブカメラが実際に対応している解像度を比較します。']
                            ]
                        ],
                        'schema' => [
                            'name' => 'カメラ解像度テスト',
                            'description' => 'ウェブカメラが実際に出力する解像度を確認するためのオンラインツールです。',
                            'url' => 'languages/japanese/camera-resolution-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/webcam-test/hero.svg',
                            'features' => ['ライブプレビュー', '解像度プリセット', '実際の映像サイズ', 'デバイス切替']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'ホーム', 'url' => '/languages/japanese/'],
                            ['name' => 'カメラ解像度テスト', 'url' => '']
                        ],
                        'priority' => '0.73',
                        'changefreq' => 'weekly'
                    ],
                    'scan-qr-from-image' => [
                        'path' => 'languages/japanese/scan-qr-from-image.php',
                        'englishPath' => 'scan-qr-from-image.php',
                        'cluster' => 'qr-reader',
                        'toolInclude' => 'languages/japanese/tools/qr-reader-tool.php',
                        'toolAnchor' => 'qr-reader',
                        'meta' => [
                            'title' => '画像からQRをスキャン | KeyboardTester.click',
                            'description' => 'スクリーンショット、写真、保存済みファイルをアップロードして QR コードをオンラインで読み取ります。アプリのインストールは不要です。',
                            'keywords' => '画像 qr 読み取り, スクリーンショット qr, 写真 qr デコード, qr 画像 読み込み',
                            'ogImage' => 'images/qr-reader/hero.svg'
                        ],
                        'hero' => [
                            'title' => '画像からQRをスキャン',
                            'lede' => 'スクリーンショット、写真、保存済みファイルから QR コードをブラウザ内で読み取ります。',
                            'primaryCta' => 'QR画像を読む',
                            'secondaryCta' => '使い方'
                        ],
                        'toolSection' => [
                            'kicker' => 'メインツール',
                            'title' => '画像QRリーダー',
                            'lede' => '同じ QR リーダーを使って、スクリーンショット、印刷物の写真、保存済みファイルをデコードできます。'
                        ],
                        'trustItems' => [
                            ['title' => '画像アップロード', 'desc' => 'スクリーンショットや写真'],
                            ['title' => 'ローカル解析', 'desc' => '外部サービス不要'],
                            ['title' => 'すばやい結果', 'desc' => '文字列や URL を表示'],
                            ['title' => 'プライバシー重視', 'desc' => '処理はブラウザ内のみ']
                        ],
                        'guide' => [
                            'kicker' => 'クイックガイド',
                            'title' => '画像からQRを読む方法',
                            'steps' => [
                                ['title' => '画像をアップロード', 'text' => 'QR コードがはっきり見えるスクリーンショット、写真、保存ファイルを選びます。'],
                                ['title' => '解析を待つ', 'text' => 'ツールがアップロード画像の中から自動で QR コードを探します。'],
                                ['title' => '結果を確認', 'text' => '読み取りに成功したら、文字列をコピーするかリンクを開きます。'],
                                ['title' => 'より鮮明な画像で再試行', 'text' => '読み取れない場合は、より鮮明な画像か QR 部分を切り抜いた画像で再試行します。']
                            ]
                        ],
                        'schema' => [
                            'name' => '画像からQRをスキャン',
                            'description' => '画像、スクリーンショット、保存済みファイルから QR コードを読むためのオンラインツールです。',
                            'url' => 'languages/japanese/scan-qr-from-image.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/qr-reader/hero.svg',
                            'features' => ['画像アップロード', 'ローカル解析', '高速結果', 'アプリ不要']
                        ],
                        'breadcrumbs' => [
                            ['name' => 'ホーム', 'url' => '/languages/japanese/'],
                            ['name' => '画像からQRをスキャン', 'url' => '']
                        ],
                        'priority' => '0.72',
                        'changefreq' => 'weekly'
                    ]
                ]
            ],
            'korean' => [
                'htmlLang' => 'ko',
                'hreflang' => 'ko',
                'ogLocale' => 'ko_KR',
                'dir' => 'ltr',
                'mainClass' => 'landing-main',
                'configInclude' => 'languages/korean/config-ko.php',
                'headerInclude' => 'languages/korean/header-ko.php',
                'footerInclude' => 'languages/korean/footer-ko.php',
                'toolsListInclude' => 'languages/korean/sections/tools-list-ko.php',
                'fontHref' => 'https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;600;700&display=swap',
                'bodyFontFamily' => "'Noto Sans KR', 'Space Grotesk', sans-serif",
                'clusterKicker' => '관련 클러스터',
                'openPageLabel' => '페이지 열기',
                'clusters' => [
                    'screen' => [
                        'title' => '관련 화면 테스트',
                        'intro' => '같은 화면 테스트로 죽은 픽셀과 기타 눈에 보이는 패널 문제를 확인할 수 있습니다.',
                        'pages' => [
                            [
                                'key' => 'screen-test',
                                'path' => 'languages/korean/screen-test.php',
                                'name' => '화면 테스트',
                                'description' => '전체 화면의 단색 화면으로 균일도, 밝기, 패널 결함을 확인합니다.'
                            ],
                            [
                                'key' => 'dead-pixel-test',
                                'path' => 'languages/korean/dead-pixel-test.php',
                                'name' => '죽은 픽셀 테스트',
                                'description' => '색을 바꿔도 변하지 않는 어두운 점이나 서브픽셀을 찾습니다.'
                            ]
                        ]
                    ],
                    'mic' => [
                        'title' => '관련 마이크 테스트',
                        'intro' => '같은 마이크 테스트로 기본 동작 확인과 실시간 입력 레벨 점검을 함께 할 수 있습니다.',
                        'pages' => [
                            [
                                'key' => 'mic-test',
                                'path' => 'languages/korean/mic-test.php',
                                'name' => '마이크 테스트',
                                'description' => '브라우저 권한, 오디오 입력, 레벨 반응을 페이지에서 바로 확인합니다.'
                            ],
                            [
                                'key' => 'microphone-volume-test',
                                'path' => 'languages/korean/microphone-volume-test.php',
                                'name' => '마이크 볼륨 테스트',
                                'description' => '실시간 미터로 현재 입력 레벨과 최고치를 확인합니다.'
                            ]
                        ]
                    ],
                    'webcam' => [
                        'title' => '관련 웹캠 테스트',
                        'intro' => '같은 웹캠 도구로 카메라 미리보기뿐 아니라 실제 해상도도 확인할 수 있습니다.',
                        'pages' => [
                            [
                                'key' => 'webcam-test',
                                'path' => 'languages/korean/webcam-test.php',
                                'name' => '웹캠 테스트',
                                'description' => '미리보기를 열고 카메라를 전환하며 브라우저가 장치를 인식하는지 확인합니다.'
                            ],
                            [
                                'key' => 'camera-resolution-test',
                                'path' => 'languages/korean/camera-resolution-test.php',
                                'name' => '카메라 해상도 테스트',
                                'description' => '브라우저에서 웹캠이 실제로 480p, 720p, 1080p를 출력하는지 확인합니다.'
                            ]
                        ]
                    ],
                    'qr-reader' => [
                        'title' => '관련 QR 테스트',
                        'intro' => '같은 QR 리더로 실시간 스캔과 저장된 이미지 속 QR 코드 읽기를 모두 처리할 수 있습니다.',
                        'pages' => [
                            [
                                'key' => 'qr-reader',
                                'path' => 'languages/korean/qr-reader.php',
                                'name' => 'QR 코드 리더',
                                'description' => '카메라나 업로드한 이미지에서 QR 코드를 브라우저 안에서 읽습니다.'
                            ],
                            [
                                'key' => 'scan-qr-from-image',
                                'path' => 'languages/korean/scan-qr-from-image.php',
                                'name' => '이미지에서 QR 스캔',
                                'description' => '스크린샷, 사진, 저장된 이미지를 업로드해 몇 초 안에 QR 코드를 해독합니다.'
                            ]
                        ]
                    ]
                ],
                'pages' => [
                    'dead-pixel-test' => [
                        'path' => 'languages/korean/dead-pixel-test.php',
                        'englishPath' => 'dead-pixel-test.php',
                        'cluster' => 'screen',
                        'toolInclude' => 'languages/korean/tools/screen-test-tool.php',
                        'toolAnchor' => 'screen-test',
                        'meta' => [
                            'title' => '죽은 픽셀 테스트 | KeyboardTester.click',
                            'description' => '단색 화면과 전체 화면 모드로 모니터의 죽은 픽셀을 확인합니다. 모니터, 노트북, 외부 디스플레이를 브라우저에서 점검할 수 있습니다.',
                            'keywords' => '죽은 픽셀 테스트, 데드 픽셀 확인, 모니터 테스트, 화면 검사',
                            'ogImage' => 'images/screen-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => '죽은 픽셀 테스트',
                            'lede' => '검정, 흰색, 단색 화면을 표시해 항상 어둡게 남는 점을 찾습니다.',
                            'primaryCta' => '화면 확인',
                            'secondaryCta' => '확인 방법'
                        ],
                        'toolSection' => [
                            'kicker' => '주요 도구',
                            'title' => '죽은 픽셀 검사기',
                            'lede' => '같은 화면 테스트를 사용해 모니터, 노트북, 외부 디스플레이를 전체 화면으로 점검합니다.'
                        ],
                        'trustItems' => [
                            ['title' => '전체 화면', 'desc' => '깔끔한 점검'],
                            ['title' => '단색 화면', 'desc' => '검정, 흰색, RGB'],
                            ['title' => '설치 불필요', 'desc' => '브라우저에서 바로 사용'],
                            ['title' => '빠른 전환', 'desc' => '배경을 즉시 변경']
                        ],
                        'guide' => [
                            'kicker' => '빠른 가이드',
                            'title' => '죽은 픽셀을 찾는 방법',
                            'steps' => [
                                ['title' => '테스트 열기', 'text' => '도구를 열고 점검할 화면을 준비합니다.'],
                                ['title' => '전체 화면 사용', 'text' => '전체 화면으로 전환하면 가장자리와 미세한 결함을 보기 쉽습니다.'],
                                ['title' => '색상 바꾸기', 'text' => '검정, 흰색, 빨강, 초록, 파랑을 바꿔가며 변하지 않는 점을 찾습니다.'],
                                ['title' => '결함 확인', 'text' => '여러 색상에서 반복 확인해 어두운 점이 계속 고정되는지 봅니다.']
                            ]
                        ],
                        'schema' => [
                            'name' => '죽은 픽셀 테스트',
                            'description' => '단색 화면과 전체 화면 모드로 죽은 픽셀을 찾는 온라인 도구입니다.',
                            'url' => 'languages/korean/dead-pixel-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/screen-test/hero.svg',
                            'features' => ['전체 화면', '단색 화면', '시각 점검', '빠른 배경 전환']
                        ],
                        'breadcrumbs' => [
                            ['name' => '홈', 'url' => '/languages/korean/'],
                            ['name' => '죽은 픽셀 테스트', 'url' => '']
                        ],
                        'priority' => '0.74',
                        'changefreq' => 'weekly'
                    ],
                    'microphone-volume-test' => [
                        'path' => 'languages/korean/microphone-volume-test.php',
                        'englishPath' => 'microphone-volume-test.php',
                        'cluster' => 'mic',
                        'toolInclude' => 'languages/korean/tools/mic-test-tool.php',
                        'toolAnchor' => 'mic-test',
                        'meta' => [
                            'title' => '마이크 볼륨 테스트 | KeyboardTester.click',
                            'description' => '실시간 미터로 마이크 입력 레벨과 최고치를 확인합니다. 회의, 스트리밍, 녹음 전에 빠르게 점검하기 좋습니다.',
                            'keywords' => '마이크 볼륨 테스트, 마이크 레벨, 마이크 측정, 마이크 미터',
                            'ogImage' => 'images/mic-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => '마이크 볼륨 테스트',
                            'lede' => '브라우저 안의 라이브 미터로 마이크 입력 레벨과 최고치를 확인합니다.',
                            'primaryCta' => '마이크 측정',
                            'secondaryCta' => '사용 방법'
                        ],
                        'toolSection' => [
                            'kicker' => '주요 도구',
                            'title' => '마이크 볼륨 미터',
                            'lede' => '같은 마이크 테스트로 평소 목소리와 큰 목소리에서 입력 레벨이 어떻게 달라지는지 확인합니다.'
                        ],
                        'trustItems' => [
                            ['title' => '라이브 미터', 'desc' => '즉시 반응'],
                            ['title' => '최고치 확인', 'desc' => '피크 표시'],
                            ['title' => '개인정보 보호', 'desc' => '오디오는 전송되지 않음'],
                            ['title' => '녹음 없음', 'desc' => '진단 전용']
                        ],
                        'guide' => [
                            'kicker' => '빠른 가이드',
                            'title' => '마이크 볼륨 확인 방법',
                            'steps' => [
                                ['title' => '접근 허용', 'text' => '브라우저가 마이크를 사용할 수 있도록 허용합니다.'],
                                ['title' => '평소처럼 말하기', 'text' => '짧은 문장을 말하면서 미터가 움직이는지 확인합니다.'],
                                ['title' => '피크 확인', 'text' => '조금 더 크게 말해 막대의 최대값을 확인합니다.'],
                                ['title' => '입력 레벨 조정', 'text' => '신호가 너무 작거나 과하면 시스템 입력 레벨을 조정한 뒤 다시 테스트합니다.']
                            ]
                        ],
                        'schema' => [
                            'name' => '마이크 볼륨 테스트',
                            'description' => '브라우저에서 마이크 입력 레벨과 최고치를 측정하는 온라인 도구입니다.',
                            'url' => 'languages/korean/microphone-volume-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/mic-test/hero.svg',
                            'features' => ['라이브 미터', '피크 표시', '브라우저 권한 확인', '녹음 없음']
                        ],
                        'breadcrumbs' => [
                            ['name' => '홈', 'url' => '/languages/korean/'],
                            ['name' => '마이크 볼륨 테스트', 'url' => '']
                        ],
                        'priority' => '0.73',
                        'changefreq' => 'weekly'
                    ],
                    'camera-resolution-test' => [
                        'path' => 'languages/korean/camera-resolution-test.php',
                        'englishPath' => 'camera-resolution-test.php',
                        'cluster' => 'webcam',
                        'toolInclude' => 'languages/korean/tools/webcam-test-tool.php',
                        'toolAnchor' => 'webcam-test',
                        'meta' => [
                            'title' => '카메라 해상도 테스트 | KeyboardTester.click',
                            'description' => '웹캠이 브라우저에서 실제로 480p, 720p, 1080p를 출력하는지 확인합니다. 해상도를 바꿔 실제 비디오 크기를 비교할 수 있습니다.',
                            'keywords' => '카메라 해상도 테스트, 웹캠 해상도, 720p 테스트, 1080p 테스트',
                            'ogImage' => 'images/webcam-test/hero.svg'
                        ],
                        'hero' => [
                            'title' => '카메라 해상도 테스트',
                            'lede' => '웹캠이 브라우저에서 실제로 출력하는 해상도를 확인합니다.',
                            'primaryCta' => '카메라 확인',
                            'secondaryCta' => '빠른 가이드'
                        ],
                        'toolSection' => [
                            'kicker' => '주요 도구',
                            'title' => '카메라 해상도 검사기',
                            'lede' => '같은 웹캠 도구로 해상도를 바꾸고 결과를 비교하며 실제 비디오 크기를 확인합니다.'
                        ],
                        'trustItems' => [
                            ['title' => '라이브 미리보기', 'desc' => '즉시 영상 확인'],
                            ['title' => '해상도 전환', 'desc' => '480p, 720p 이상'],
                            ['title' => '실제 크기', 'desc' => '보고된 비디오 크기'],
                            ['title' => '설치 불필요', 'desc' => '브라우저에서 바로 사용']
                        ],
                        'guide' => [
                            'kicker' => '빠른 가이드',
                            'title' => '카메라 해상도 확인 방법',
                            'steps' => [
                                ['title' => '카메라 허용', 'text' => '브라우저가 웹캠에 접근할 수 있도록 허용합니다.'],
                                ['title' => '해상도 선택', 'text' => '테스트 전에 480p, 720p, 1080p 중 하나를 선택합니다.'],
                                ['title' => '실제 크기 확인', 'text' => '카메라가 시작되면 도구가 표시하는 해상도를 확인합니다.'],
                                ['title' => '여러 설정 비교', 'text' => '다른 값으로 다시 테스트해 웹캠이 실제로 지원하는 해상도를 비교합니다.']
                            ]
                        ],
                        'schema' => [
                            'name' => '카메라 해상도 테스트',
                            'description' => '웹캠이 실제로 제공하는 해상도를 확인하는 온라인 도구입니다.',
                            'url' => 'languages/korean/camera-resolution-test.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/webcam-test/hero.svg',
                            'features' => ['라이브 미리보기', '해상도 프리셋', '실제 비디오 크기', '장치 전환']
                        ],
                        'breadcrumbs' => [
                            ['name' => '홈', 'url' => '/languages/korean/'],
                            ['name' => '카메라 해상도 테스트', 'url' => '']
                        ],
                        'priority' => '0.73',
                        'changefreq' => 'weekly'
                    ],
                    'scan-qr-from-image' => [
                        'path' => 'languages/korean/scan-qr-from-image.php',
                        'englishPath' => 'scan-qr-from-image.php',
                        'cluster' => 'qr-reader',
                        'toolInclude' => 'languages/korean/tools/qr-reader-tool.php',
                        'toolAnchor' => 'qr-reader',
                        'meta' => [
                            'title' => '이미지에서 QR 스캔 | KeyboardTester.click',
                            'description' => '스크린샷, 사진, 저장된 파일을 업로드해 QR 코드를 온라인으로 읽습니다. 앱 설치 없이 브라우저에서 바로 해독할 수 있습니다.',
                            'keywords' => '이미지 qr 읽기, 스크린샷 qr, 사진 qr 해독, qr 파일 읽기',
                            'ogImage' => 'images/qr-reader/hero.svg'
                        ],
                        'hero' => [
                            'title' => '이미지에서 QR 스캔',
                            'lede' => '스크린샷, 사진, 저장된 파일에서 QR 코드를 브라우저 안에서 바로 읽습니다.',
                            'primaryCta' => 'QR 이미지 읽기',
                            'secondaryCta' => '작동 방식'
                        ],
                        'toolSection' => [
                            'kicker' => '주요 도구',
                            'title' => '이미지 QR 리더',
                            'lede' => '같은 QR 리더를 사용해 스크린샷, 인쇄물 사진, 저장된 파일을 해독할 수 있습니다.'
                        ],
                        'trustItems' => [
                            ['title' => '이미지 업로드', 'desc' => '스크린샷과 사진 지원'],
                            ['title' => '로컬 해독', 'desc' => '외부 서비스 불필요'],
                            ['title' => '빠른 결과', 'desc' => '텍스트나 링크 표시'],
                            ['title' => '개인정보 보호', 'desc' => '모든 처리는 브라우저 안에서']
                        ],
                        'guide' => [
                            'kicker' => '빠른 가이드',
                            'title' => '이미지에서 QR을 읽는 방법',
                            'steps' => [
                                ['title' => '이미지 업로드', 'text' => 'QR 코드가 또렷하게 보이는 스크린샷, 사진 또는 저장된 파일을 선택합니다.'],
                                ['title' => '분석 기다리기', 'text' => '도구가 업로드한 이미지 안에서 QR 코드를 자동으로 찾습니다.'],
                                ['title' => '결과 확인', 'text' => '읽기에 성공하면 텍스트를 복사하거나 링크를 엽니다.'],
                                ['title' => '더 선명한 이미지로 다시 시도', 'text' => '읽지 못하면 더 선명한 이미지를 사용하거나 QR 부분만 잘라서 다시 시도합니다.']
                            ]
                        ],
                        'schema' => [
                            'name' => '이미지에서 QR 스캔',
                            'description' => '이미지, 스크린샷, 저장된 파일에서 QR 코드를 읽는 온라인 도구입니다.',
                            'url' => 'languages/korean/scan-qr-from-image.php',
                            'category' => 'UtilityApplication',
                            'screenshot' => 'images/qr-reader/hero.svg',
                            'features' => ['이미지 업로드', '로컬 해독', '빠른 결과', '앱 설치 불필요']
                        ],
                        'breadcrumbs' => [
                            ['name' => '홈', 'url' => '/languages/korean/'],
                            ['name' => '이미지에서 QR 스캔', 'url' => '']
                        ],
                        'priority' => '0.72',
                        'changefreq' => 'weekly'
                    ]
                ]
            ]
        ];

        foreach (['russian', 'japanese', 'korean'] as $language) {
            $extraFile = __DIR__ . '/localized-intent-pages-phase6-' . $language . '.php';
            if (file_exists($extraFile)) {
                $extraCatalog = require $extraFile;
                if (is_array($extraCatalog)) {
                    $catalog = array_replace($catalog, $extraCatalog);
                }
            }
        }

        return $catalog;
    }
}
