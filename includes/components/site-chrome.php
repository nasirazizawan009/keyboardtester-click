<?php

require_once __DIR__ . '/tool-list-data.php';

if (!function_exists('kbtGetSiteChromeConfig')) {
    function kbtGetSiteChromeConfig()
    {
        return [
            'toolPageKeys' => [
                'keyboard-home' => 'home',
                'typing-test' => 'keyboard_typing',
                'latency-checker' => 'latency_check',
                'mouse-test' => 'mouse_test',
                'click-speed' => 'click_speed',
                'ghost-click' => 'ghost_click',
                'dpi-tester' => 'dpi_tester',
                'mouse-trail' => 'mouse_trail',
                'screen-test' => 'screen_test',
                'mic-test' => 'mic_test',
                'headphone-test' => 'headphone_test',
                'webcam-test' => 'webcam_test',
                'qr-generator' => 'qr_generator',
                'qr-reader' => 'qr_reader',
                'ocr-tool' => 'ocr_tool',
                'password-generator' => 'password_gen',
            ],
            'headerSections' => [
                ['category' => 'keyboard', 'icon' => '⌨️', 'tool_ids' => ['keyboard-home', 'typing-test', 'latency-checker', 'spacebar-test', 'reaction-time-test']],
                ['category' => 'mouse', 'icon' => '🖱️', 'tool_ids' => ['mouse-test', 'click-speed', 'ghost-click', 'dpi-tester', 'mouse-trail', 'polling-rate-test']],
                ['category' => 'display', 'icon' => '🖥️', 'tool_ids' => ['screen-test', 'webcam-test', 'refresh-rate-test', 'color-test', 'touch-screen-test']],
                ['category' => 'audio', 'icon' => '🎧', 'tool_ids' => ['mic-test', 'headphone-test']],
                ['category' => 'utility', 'icon' => '🛠️', 'tool_ids' => ['qr-generator', 'qr-reader', 'ocr-tool', 'password-generator', 'gamepad-test']],
            ],
            'footerSections' => [
                'testing' => ['keyboard-home', 'mouse-test', 'typing-test', 'click-speed', 'screen-test', 'mic-test', 'webcam-test', 'headphone-test'],
                'more' => ['qr-generator', 'ocr-tool', 'password-generator', 'ghost-click', 'polling-rate-test', 'refresh-rate-test', 'color-test', 'touch-screen-test', 'gamepad-test'],
            ],
            'locales' => [
                'en' => [
                    'dir' => 'ltr', 'language_code' => 'EN',
                    'menu' => ['home' => 'Home', 'tools' => 'Tools', 'privacy' => 'Privacy', 'about' => 'About', 'try_tools' => 'Try Tools'],
                    'footer' => ['about' => 'Modern testing tools for keyboards, mice, audio, screens, and more, built for clarity, accuracy, and speed.', 'quick_links' => 'Quick Links', 'testing_tools' => 'Testing Tools', 'more_tools' => 'More Tools', 'help_resources' => 'Help & Resources', 'stay_connected' => 'Stay Connected', 'newsletter' => 'Get updates on new tools and features', 'placeholder' => 'Your email address', 'subscribe' => 'Subscribe', 'rights' => 'All rights reserved.', 'tagline' => 'Built for tech enthusiasts worldwide'],
                    'quick' => ['home' => 'Home', 'blog' => 'Blog', 'about' => 'About Us', 'privacy' => 'Privacy Policy', 'disclaimer' => 'Disclaimer'],
                    'help' => ['feedback' => 'Feedback', 'privacy' => 'Privacy & Security', 'disclaimer' => 'Terms & Disclaimer', 'blog' => 'Guides & Tips'],
                    'aria' => ['menu' => 'Toggle menu', 'theme' => 'Toggle theme', 'language' => 'Choose language', 'tools_panel' => 'Browse testing tools', 'back_to_top' => 'Scroll to top'],
                ],
                'ar' => [
                    'dir' => 'rtl', 'language_code' => 'AR',
                    'menu' => ['home' => 'الرئيسية', 'tools' => 'الأدوات', 'privacy' => 'الخصوصية', 'about' => 'حول', 'try_tools' => 'جرّب الأدوات'],
                    'footer' => ['about' => 'أدوات اختبار حديثة للوحة المفاتيح والماوس والصوت والشاشات والمزيد، مصممة للوضوح والدقة والسرعة.', 'quick_links' => 'روابط سريعة', 'testing_tools' => 'أدوات الاختبار', 'more_tools' => 'المزيد من الأدوات', 'help_resources' => 'المساعدة والموارد', 'stay_connected' => 'ابقَ على تواصل', 'newsletter' => 'احصل على تحديثات حول الأدوات والميزات الجديدة', 'placeholder' => 'بريدك الإلكتروني', 'subscribe' => 'اشترك', 'rights' => 'جميع الحقوق محفوظة.', 'tagline' => 'صُمم لعشاق التقنية حول العالم'],
                    'quick' => ['home' => 'الرئيسية', 'blog' => 'المدونة', 'about' => 'من نحن', 'privacy' => 'سياسة الخصوصية', 'disclaimer' => 'إخلاء المسؤولية'],
                    'help' => ['feedback' => 'الملاحظات', 'privacy' => 'الخصوصية والأمان', 'disclaimer' => 'الشروط وإخلاء المسؤولية', 'blog' => 'أدلة ونصائح'],
                    'aria' => ['menu' => 'تبديل القائمة', 'theme' => 'تبديل المظهر', 'language' => 'اختيار اللغة', 'tools_panel' => 'تصفح أدوات الاختبار', 'back_to_top' => 'العودة إلى الأعلى'],
                ],
                'fr' => [
                    'dir' => 'ltr', 'language_code' => 'FR',
                    'menu' => ['home' => 'Accueil', 'tools' => 'Outils', 'privacy' => 'Confidentialité', 'about' => 'À propos', 'try_tools' => 'Tester'],
                    'footer' => ['about' => 'Outils de test modernes pour claviers, souris, audio, écrans et plus, conçus pour la clarté, la précision et la rapidité.', 'quick_links' => 'Liens rapides', 'testing_tools' => 'Outils de test', 'more_tools' => 'Plus d’outils', 'help_resources' => 'Aide et ressources', 'stay_connected' => 'Restez connecté', 'newsletter' => 'Recevez les nouveautés et mises à jour', 'placeholder' => 'Votre e-mail', 'subscribe' => 'S’abonner', 'rights' => 'Tous droits réservés.', 'tagline' => 'Conçu pour les passionnés de technologie du monde entier'],
                    'quick' => ['home' => 'Accueil', 'blog' => 'Blog', 'about' => 'À propos', 'privacy' => 'Politique de confidentialité', 'disclaimer' => 'Avertissement'],
                    'help' => ['feedback' => 'Retour', 'privacy' => 'Confidentialité et sécurité', 'disclaimer' => 'Conditions et avertissement', 'blog' => 'Guides et conseils'],
                    'aria' => ['menu' => 'Ouvrir le menu', 'theme' => 'Changer le thème', 'language' => 'Choisir la langue', 'tools_panel' => 'Parcourir les outils de test', 'back_to_top' => 'Revenir en haut'],
                ],
                'de' => [
                    'dir' => 'ltr', 'language_code' => 'DE',
                    'menu' => ['home' => 'Start', 'tools' => 'Tools', 'privacy' => 'Datenschutz', 'about' => 'Über uns', 'try_tools' => 'Tools testen'],
                    'footer' => ['about' => 'Moderne Testwerkzeuge für Tastaturen, Mäuse, Audio, Bildschirme und mehr, entwickelt für Klarheit, Genauigkeit und Geschwindigkeit.', 'quick_links' => 'Schnellzugriff', 'testing_tools' => 'Test-Tools', 'more_tools' => 'Weitere Tools', 'help_resources' => 'Hilfe & Ressourcen', 'stay_connected' => 'In Verbindung bleiben', 'newsletter' => 'Updates zu neuen Tools und Funktionen erhalten', 'placeholder' => 'Ihre E-Mail-Adresse', 'subscribe' => 'Abonnieren', 'rights' => 'Alle Rechte vorbehalten.', 'tagline' => 'Entwickelt für Technikbegeisterte weltweit'],
                    'quick' => ['home' => 'Start', 'blog' => 'Blog', 'about' => 'Über uns', 'privacy' => 'Datenschutz', 'disclaimer' => 'Haftungsausschluss'],
                    'help' => ['feedback' => 'Feedback', 'privacy' => 'Datenschutz & Sicherheit', 'disclaimer' => 'Bedingungen & Haftungsausschluss', 'blog' => 'Anleitungen & Tipps'],
                    'aria' => ['menu' => 'Menü umschalten', 'theme' => 'Thema wechseln', 'language' => 'Sprache wählen', 'tools_panel' => 'Test-Tools durchsuchen', 'back_to_top' => 'Nach oben scrollen'],
                ],
                'es' => [
                    'dir' => 'ltr', 'language_code' => 'ES',
                    'menu' => ['home' => 'Inicio', 'tools' => 'Herramientas', 'privacy' => 'Privacidad', 'about' => 'Acerca de', 'try_tools' => 'Probar herramientas'],
                    'footer' => ['about' => 'Herramientas modernas de prueba para teclados, ratones, audio, pantallas y más, diseñadas para claridad, precisión y velocidad.', 'quick_links' => 'Enlaces rápidos', 'testing_tools' => 'Herramientas de prueba', 'more_tools' => 'Más herramientas', 'help_resources' => 'Ayuda y recursos', 'stay_connected' => 'Mantente conectado', 'newsletter' => 'Recibe novedades sobre nuevas herramientas y funciones', 'placeholder' => 'Tu correo electrónico', 'subscribe' => 'Suscribirse', 'rights' => 'Todos los derechos reservados.', 'tagline' => 'Diseñado para entusiastas de la tecnología de todo el mundo'],
                    'quick' => ['home' => 'Inicio', 'blog' => 'Blog', 'about' => 'Sobre nosotros', 'privacy' => 'Política de privacidad', 'disclaimer' => 'Descargo de responsabilidad'],
                    'help' => ['feedback' => 'Comentarios', 'privacy' => 'Privacidad y seguridad', 'disclaimer' => 'Términos y descargo', 'blog' => 'Guías y consejos'],
                    'aria' => ['menu' => 'Abrir menú', 'theme' => 'Cambiar tema', 'language' => 'Elegir idioma', 'tools_panel' => 'Explorar herramientas de prueba', 'back_to_top' => 'Volver arriba'],
                ],
                'pt' => [
                    'dir' => 'ltr', 'language_code' => 'PT',
                    'menu' => ['home' => 'Início', 'tools' => 'Ferramentas', 'privacy' => 'Privacidade', 'about' => 'Sobre', 'try_tools' => 'Testar ferramentas'],
                    'footer' => ['about' => 'Ferramentas modernas de teste para teclados, mouses, áudio, telas e mais, criadas para clareza, precisão e velocidade.', 'quick_links' => 'Links rápidos', 'testing_tools' => 'Ferramentas de teste', 'more_tools' => 'Mais ferramentas', 'help_resources' => 'Ajuda e recursos', 'stay_connected' => 'Fique conectado', 'newsletter' => 'Receba atualizações sobre novas ferramentas e recursos', 'placeholder' => 'Seu e-mail', 'subscribe' => 'Inscrever-se', 'rights' => 'Todos os direitos reservados.', 'tagline' => 'Feito para entusiastas de tecnologia em todo o mundo'],
                    'quick' => ['home' => 'Início', 'blog' => 'Blog', 'about' => 'Sobre nós', 'privacy' => 'Política de privacidade', 'disclaimer' => 'Aviso legal'],
                    'help' => ['feedback' => 'Feedback', 'privacy' => 'Privacidade e segurança', 'disclaimer' => 'Termos e aviso legal', 'blog' => 'Guias e dicas'],
                    'aria' => ['menu' => 'Abrir menu', 'theme' => 'Alternar tema', 'language' => 'Escolher idioma', 'tools_panel' => 'Explorar ferramentas de teste', 'back_to_top' => 'Voltar ao topo'],
                ],
                'ru' => [
                    'dir' => 'ltr', 'language_code' => 'RU',
                    'menu' => ['home' => 'Главная', 'tools' => 'Инструменты', 'privacy' => 'Конфиденциальность', 'about' => 'О сайте', 'try_tools' => 'Попробовать инструменты'],
                    'footer' => ['about' => 'Современные инструменты тестирования для клавиатур, мышей, аудио, экранов и многого другого, созданные для точности, ясности и скорости.', 'quick_links' => 'Быстрые ссылки', 'testing_tools' => 'Инструменты тестирования', 'more_tools' => 'Больше инструментов', 'help_resources' => 'Помощь и ресурсы', 'stay_connected' => 'Оставайтесь на связи', 'newsletter' => 'Получайте обновления о новых инструментах и функциях', 'placeholder' => 'Ваш e-mail', 'subscribe' => 'Подписаться', 'rights' => 'Все права защищены.', 'tagline' => 'Создано для энтузиастов технологий по всему миру'],
                    'quick' => ['home' => 'Главная', 'blog' => 'Блог', 'about' => 'О нас', 'privacy' => 'Политика конфиденциальности', 'disclaimer' => 'Отказ от ответственности'],
                    'help' => ['feedback' => 'Обратная связь', 'privacy' => 'Конфиденциальность и безопасность', 'disclaimer' => 'Условия и отказ от ответственности', 'blog' => 'Руководства и советы'],
                    'aria' => ['menu' => 'Открыть меню', 'theme' => 'Сменить тему', 'language' => 'Выбрать язык', 'tools_panel' => 'Просмотреть инструменты тестирования', 'back_to_top' => 'Наверх'],
                ],
                'ja' => [
                    'dir' => 'ltr', 'language_code' => 'JP',
                    'menu' => ['home' => 'ホーム', 'tools' => 'ツール', 'privacy' => 'プライバシー', 'about' => '概要', 'try_tools' => 'ツールを試す'],
                    'footer' => ['about' => 'キーボード、マウス、オーディオ、ディスプレイなどを明確さ、精度、スピード重視でテストできる最新ツールです。', 'quick_links' => 'クイックリンク', 'testing_tools' => 'テストツール', 'more_tools' => 'その他のツール', 'help_resources' => 'ヘルプと情報', 'stay_connected' => 'つながる', 'newsletter' => '新しいツールや機能の更新情報を受け取る', 'placeholder' => 'メールアドレス', 'subscribe' => '購読する', 'rights' => 'すべての権利を保有します。', 'tagline' => '世界中のテック愛好家のために作られました'],
                    'quick' => ['home' => 'ホーム', 'blog' => 'ブログ', 'about' => '私たちについて', 'privacy' => 'プライバシーポリシー', 'disclaimer' => '免責事項'],
                    'help' => ['feedback' => 'フィードバック', 'privacy' => 'プライバシーと安全性', 'disclaimer' => '利用条件と免責事項', 'blog' => 'ガイドとヒント'],
                    'aria' => ['menu' => 'メニューを切り替える', 'theme' => 'テーマを切り替える', 'language' => '言語を選択', 'tools_panel' => 'テストツールを見る', 'back_to_top' => 'ページ上部へ戻る'],
                ],
                'ko' => [
                    'dir' => 'ltr', 'language_code' => 'KO',
                    'menu' => ['home' => '홈', 'tools' => '도구', 'privacy' => '개인정보', 'about' => '소개', 'try_tools' => '도구 체험'],
                    'footer' => ['about' => '키보드, 마우스, 오디오, 화면 등을 위한 현대적인 테스트 도구. 명확성, 정확성, 속도를 위해 설계되었습니다.', 'quick_links' => '빠른 링크', 'testing_tools' => '테스트 도구', 'more_tools' => '더 많은 도구', 'help_resources' => '도움말 및 리소스', 'stay_connected' => '새 소식 받기', 'newsletter' => '새로운 도구와 기능 업데이트를 받아보세요', 'placeholder' => '이메일 주소', 'subscribe' => '구독', 'rights' => '모든 권리 보유.', 'tagline' => '전 세계 기술 애호가들을 위해 제작되었습니다'],
                    'quick' => ['home' => '홈', 'blog' => '블로그', 'about' => '소개', 'privacy' => '개인정보 처리방침', 'disclaimer' => '면책조항'],
                    'help' => ['feedback' => '피드백', 'privacy' => '개인정보 및 보안', 'disclaimer' => '이용약관 및 면책조항', 'blog' => '가이드 및 팁'],
                    'aria' => ['menu' => '메뉴 열기', 'theme' => '테마 전환', 'language' => '언어 선택', 'tools_panel' => '테스트 도구 보기', 'back_to_top' => '맨 위로 이동'],
                ],
            ],
        ];
    }
}

if (!function_exists('kbtGetSiteChromeLocaleCopy')) {
    function kbtGetSiteChromeLocaleCopy($locale = 'en')
    {
        $config = kbtGetSiteChromeConfig();
        return $config['locales'][$locale] ?? $config['locales']['en'];
    }
}

if (!function_exists('kbtGetSiteChromeToolLabelIndex')) {
    function kbtGetSiteChromeToolLabelIndex($locale = 'en')
    {
        static $cache = [];

        if (isset($cache[$locale])) {
            return $cache[$locale];
        }

        $data = getSharedToolListData();
        $localeConfig = $data['locales'][$locale] ?? $data['locales']['en'];
        $copy = [];

        foreach ($data['tools'] as $tool) {
            $toolId = $tool['id'];
            if (isset($tool['visible_locales']) && !in_array($locale, $tool['visible_locales'], true)) {
                continue;
            }

            $override = $localeConfig['tools'][$toolId] ?? [];
            $copy[$toolId] = [
                'name' => $override['name'] ?? $tool['name'],
                'category' => $tool['category'],
                'routes' => $tool['routes'],
            ];
        }

        $cache[$locale] = $copy;
        return $copy;
    }
}

if (!function_exists('kbtResolveSiteChromeToolUrl')) {
    function kbtResolveSiteChromeToolUrl($toolId, $toolMeta, $locale = 'en')
    {
        global $pages;

        $config = kbtGetSiteChromeConfig();
        $pageKey = $config['toolPageKeys'][$toolId] ?? null;

        if ($pageKey !== null && isset($pages[$pageKey]) && $pages[$pageKey] !== '') {
            return $pages[$pageKey];
        }

        $data = getSharedToolListData();
        $localeConfig = $data['locales'][$locale] ?? $data['locales']['en'];
        $rootPath = dirname(__DIR__, 2);

        if ($locale === 'en') {
            $path = $toolMeta['routes']['en'] ?? null;
            if ($path === null) {
                return null;
            }

            $trimmed = trim($path, '/');
            if ($trimmed !== '') {
                $absolutePath = $rootPath . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $trimmed);
                if (substr($path, -1) === '/') {
                    if (!is_dir($absolutePath)) {
                        return null;
                    }
                } elseif (!is_file($absolutePath)) {
                    return null;
                }
            }

            return url($path);
        }

        $localizedPath = $toolMeta['routes']['localized'] ?? null;
        if ($localizedPath === null) {
            return null;
        }

        $localeDir = trim((string) ($localeConfig['directory'] ?? ''), '/');
        if ($localeDir === '') {
            return null;
        }

        if ($localizedPath === '') {
            return url('languages/' . $localeDir . '/');
        }

        $absolutePath = $rootPath . DIRECTORY_SEPARATOR . 'languages' . DIRECTORY_SEPARATOR . $localeDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $localizedPath);
        if (!is_file($absolutePath)) {
            return null;
        }

        return url('languages/' . $localeDir . '/' . $localizedPath);
    }
}

if (!function_exists('kbtBuildLangSwitchUrl')) {
    /**
     * Resolve a tool URL for the language switcher.
     * Unlike kbtResolveSiteChromeToolUrl(), this NEVER reads $pages — it always
     * uses the route definitions directly, so the target locale URL is always
     * returned regardless of which language the current page is in.
     */
    function kbtBuildLangSwitchUrl($toolId, $toolMeta, $targetLocale)
    {
        $data     = getSharedToolListData();
        $rootPath = dirname(__DIR__, 2);

        if ($targetLocale === 'en') {
            $path = $toolMeta['routes']['en'] ?? null;
            if ($path === null || $path === '') return null;
            $trimmed = trim($path, '/');
            $absPath = $rootPath . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $trimmed);
            if (substr($path, -1) === '/') {
                if (!is_dir($absPath)) return null;
            } elseif (!is_file($absPath)) {
                return null;
            }
            return url($path);
        }

        $localizedPath = $toolMeta['routes']['localized'] ?? null;
        if ($localizedPath === null) return null;

        $localeConfig = $data['locales'][$targetLocale] ?? null;
        if (!$localeConfig) return null;
        $localeDir = trim((string)($localeConfig['directory'] ?? ''), '/');
        if ($localeDir === '') return null;

        if ($localizedPath === '') {
            return url('languages/' . $localeDir . '/');
        }

        $absPath = $rootPath . DIRECTORY_SEPARATOR . 'languages' . DIRECTORY_SEPARATOR . $localeDir . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $localizedPath);
        if (!is_file($absPath)) return null;

        return url('languages/' . $localeDir . '/' . $localizedPath);
    }
}

if (!function_exists('kbtGetSiteChromeResolvedTools')) {
    function kbtGetSiteChromeResolvedTools($locale = 'en')
    {
        static $cache = [];

        if (isset($cache[$locale])) {
            return $cache[$locale];
        }

        $resolved = [];
        foreach (kbtGetSiteChromeToolLabelIndex($locale) as $toolId => $toolMeta) {
            $href = kbtResolveSiteChromeToolUrl($toolId, $toolMeta, $locale);
            if ($href === null) {
                continue;
            }

            $resolved[$toolId] = [
                'name' => $toolMeta['name'],
                'href' => $href,
                'category' => $toolMeta['category'],
            ];
        }

        $cache[$locale] = $resolved;
        return $resolved;
    }
}

if (!function_exists('kbtGetSiteChromeCategoryLabels')) {
    function kbtGetSiteChromeCategoryLabels($locale = 'en')
    {
        $data = getSharedToolListData();
        $localeConfig = $data['locales'][$locale] ?? $data['locales']['en'];
        return $localeConfig['category_labels'] ?? $data['locales']['en']['category_labels'];
    }
}

if (!function_exists('kbtRenderSiteChromeLinkList')) {
    function kbtRenderSiteChromeLinkList(array $links)
    {
        foreach ($links as $link) {
            if (empty($link['href']) || empty($link['label'])) {
                continue;
            }
            ?>
            <li>
                <a href="<?php echo htmlspecialchars($link['href'], ENT_QUOTES, 'UTF-8'); ?>">
                    <?php if (!empty($link['icon'])): ?>
                        <?php echo kbtRenderSiteChromeMiniIcon($link['icon']); ?>
                    <?php endif; ?>
                    <span><?php echo htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8'); ?></span>
                </a>
            </li>
            <?php
        }
    }
}

if (!function_exists('kbtRenderSiteChromeMiniIcon')) {
    function kbtRenderSiteChromeMiniIcon($iconKey, $className = 'footer-link-icon')
    {
        $svgIcons = [
            'github' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.44 9.8 8.21 11.39.6.1.82-.26.82-.58v-2.04c-3.34.73-4.04-1.41-4.04-1.41-.55-1.38-1.33-1.75-1.33-1.75-1.08-.75.08-.74.08-.74 1.19.08 1.81 1.22 1.81 1.22 1.06 1.81 2.78 1.29 3.46.98.11-.77.41-1.29.75-1.59-2.67-.31-5.47-1.34-5.47-5.96 0-1.31.47-2.38 1.23-3.22-.12-.3-.53-1.56.12-3.24 0 0 1-.32 3.29 1.23.96-.27 1.98-.4 3-.41 1.02.01 2.04.14 3 .41 2.29-1.55 3.29-1.23 3.29-1.23.65 1.68.24 2.94.12 3.24.77.84 1.23 1.91 1.23 3.22 0 4.63-2.8 5.64-5.48 5.95.42.36.8 1.08.8 2.19v3.24c0 .32.22.69.83.57C20.57 21.79 24 17.31 24 12 24 5.37 18.63 0 12 0Z"/></svg>',
            'gitlab' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.96 13.59 22.61 9.45l-2.66-8.19a.46.46 0 0 0-.87 0L16.42 9.45H7.58L4.92 1.26a.46.46 0 0 0-.87 0L1.39 9.45.04 13.59a.92.92 0 0 0 .33 1.02L12 22.82l11.63-8.21a.92.92 0 0 0 .33-1.02Z"/></svg>',
            'youtube' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.19a3.02 3.02 0 0 0-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.5A3.02 3.02 0 0 0 .5 6.19C0 8.07 0 12 0 12s0 3.93.5 5.81a3.02 3.02 0 0 0 2.12 2.14c1.88.5 9.38.5 9.38.5s7.5 0 9.38-.5a3.02 3.02 0 0 0 2.12-2.14C24 15.93 24 12 24 12s0-3.93-.5-5.81ZM9.55 15.57V8.43L15.82 12l-6.27 3.57Z"/></svg>',
            'facebook' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.07C24 5.45 18.63.07 12 .07S0 5.45 0 12.07c0 5.99 4.39 10.95 10.12 11.86v-8.39H7.08v-3.47h3.04V9.43c0-3.01 1.8-4.67 4.54-4.67 1.31 0 2.68.24 2.68.24v2.95h-1.51c-1.49 0-1.95.92-1.95 1.87v2.25h3.32l-.53 3.47h-2.79v8.39C19.61 23.03 24 18.06 24 12.07Z"/></svg>',
            'mail' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"></rect><path d="m4 7 8 6 8-6"></path></svg>',
            'home' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 10.5 12 4l8 6.5"></path><path d="M6.5 9.5V20h11V9.5"></path></svg>',
            'blog' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M7 4h8l4 4v12H7z"></path><path d="M15 4v4h4"></path><path d="M10 12h6M10 16h4"></path></svg>',
            'about' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"></circle><path d="M12 10v5"></path><path d="M12 7.5h.01"></path></svg>',
            'privacy' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3 5 6v5c0 5 3.4 8.2 7 10 3.6-1.8 7-5 7-10V6l-7-3Z"></path><path d="M9.5 12 11 13.5l3.5-3.5"></path></svg>',
            'disclaimer' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M7 3h8l4 4v14H7z"></path><path d="M15 3v4h4"></path><path d="M12 10v4"></path><path d="M12 17h.01"></path></svg>',
            'feedback' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a6 6 0 0 0-3 11.2V18l3-1.8 3 1.8v-3.8A6 6 0 0 0 12 3Z"></path><path d="M12 9v2.5"></path><path d="M12 14h.01"></path></svg>',
            'keyboard' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="6" width="18" height="12" rx="2"></rect><path d="M7 10h.01M10 10h.01M13 10h.01M16 10h.01M7 14h10"></path></svg>',
            'mouse' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="3" width="8" height="18" rx="4"></rect><path d="M12 7v3"></path></svg>',
            'typing' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7h16"></path><path d="M7 11h10"></path><path d="M9 15h6"></path></svg>',
            'lightning' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M13 2 4 14h6l-1 8 9-12h-6l1-8Z"/></svg>',
            'screen' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="12" rx="2"></rect><path d="M8 21h8M12 17v4"></path></svg>',
            'mic' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="2.5" width="6" height="11" rx="3"></rect><path d="M5 11.5a7 7 0 0 0 14 0M12 18v3.5M8.5 21.5h7"></path></svg>',
            'camera' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="13" height="10" rx="2"></rect><path d="m16 10 5-3v10l-5-3z"></path></svg>',
            'headphones' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12a8 8 0 0 1 16 0"></path><rect x="3" y="12" width="4" height="8" rx="2"></rect><rect x="17" y="12" width="4" height="8" rx="2"></rect></svg>',
            'qr' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="6" height="6"></rect><rect x="15" y="3" width="6" height="6"></rect><rect x="3" y="15" width="6" height="6"></rect><path d="M15 15h3v3h-3zM18 18h3v3h-3z"></path></svg>',
            'ocr' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 7V4h3M20 7V4h-3M4 17v3h3M20 17v3h-3"></path><path d="M8 12h8M10 9h4M10 15h4"></path></svg>',
            'lock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="10" width="14" height="10" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path></svg>',
            'ghost' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M6 18v-7a6 6 0 1 1 12 0v7l-2-2-2 2-2-2-2 2-2-2-2 2Z"></path><path d="M10 10h.01M14 10h.01"></path></svg>',
            'polling' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"></circle><path d="M12 8v4l3 2"></path></svg>',
            'refresh' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 11a8 8 0 1 0 1 4"></path><path d="M20 4v7h-7"></path></svg>',
            'palette' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3a9 9 0 1 0 0 18c1.4 0 2-.8 2-1.7 0-.8-.5-1.3-.5-2 0-1 1-1.6 1.9-1.6H17a4 4 0 0 0 0-8h-5Z"></path></svg>',
            'touch' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11V6a2 2 0 1 1 4 0v5"></path><path d="M13 10a2 2 0 1 1 4 0v4"></path><path d="M17 13a2 2 0 1 1 4 0v1a7 7 0 0 1-7 7h-3a7 7 0 0 1-5-2"></path><path d="m3 13 3-3"></path></svg>',
            'gamepad' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2.5" y="8" width="19" height="9" rx="4.5"></rect><path d="M8 12H5.5M6.75 10.75v2.5"></path><path d="M15.5 11.25h.01M18 13.75h.01"></path></svg>',
        ];

        $svg = $svgIcons[$iconKey] ?? null;
        if ($svg === null) {
            return '';
        }

        // Explicit width/height prevent CLS: browser knows size before CSS loads
        $svg = preg_replace('/^<svg\b/', '<svg width="15" height="15"', $svg, 1);

        $fullClassName = trim($className . ' ' . $className . '--' . preg_replace('/[^a-z0-9-]+/i', '-', $iconKey));
        return '<span class="' . htmlspecialchars($fullClassName, ENT_QUOTES, 'UTF-8') . '" aria-hidden="true">' . $svg . '</span>';
    }
}

if (!function_exists('kbtDetectCurrentToolId')) {
    /**
     * Detect which tool the current page is for, by matching REQUEST_URI
     * against known tool routes. Returns a tool ID (e.g. 'mouse-test') or null.
     */
    function kbtDetectCurrentToolId($locale = 'en')
    {
        global $baseUrl;

        $uri  = strtok($_SERVER['REQUEST_URI'] ?? '', '?');
        $base = rtrim($baseUrl ?? '/', '/');

        // Strip base path prefix to get a path like /mouse-test.php or /languages/french/mouse-test.php
        if ($base !== '' && strpos($uri, $base) === 0) {
            $path = substr($uri, strlen($base));
        } else {
            $path = $uri;
        }
        $path = '/' . ltrim($path, '/');

        $data = getSharedToolListData();

        foreach ($data['tools'] as $tool) {
            if ($locale === 'en') {
                $enRoute = $tool['routes']['en'] ?? '';
                if ($enRoute === '') continue;
                $expected = '/' . ltrim($enRoute, '/');
                if (rtrim($path, '/') === rtrim($expected, '/')) {
                    return $tool['id'];
                }
            } else {
                $localizedRoute = $tool['routes']['localized'] ?? '';
                if ($localizedRoute === '') continue;
                $localeConfig = $data['locales'][$locale] ?? null;
                if (!$localeConfig) continue;
                $localeDir = trim((string)($localeConfig['directory'] ?? ''), '/');
                if ($localeDir === '') continue;
                $expected = '/languages/' . $localeDir . '/' . $localizedRoute;
                if (rtrim($path, '/') === rtrim($expected, '/')) {
                    return $tool['id'];
                }
            }
        }

        return null;
    }
}

if (!function_exists('kbtRenderSiteHeader')) {
    function kbtRenderSiteHeader($locale = 'en')
    {
        global $pages, $keyboardLanguages;

        $copy = kbtGetSiteChromeLocaleCopy($locale);
        $resolvedTools = kbtGetSiteChromeResolvedTools($locale);
        $categoryLabels = kbtGetSiteChromeCategoryLabels($locale);
        $config = kbtGetSiteChromeConfig();
        $direction = $copy['dir'] ?? 'ltr';
        $currentLanguage = $keyboardLanguages[$locale] ?? ($keyboardLanguages['en'] ?? null);
        ?>
<style>
    .site-header { position: sticky; top: 0; z-index: 1000; background: var(--header-bg, #0b1220); color: var(--header-text, #ffffff); border-bottom: 1px solid var(--header-border, rgba(148, 163, 184, 0.2)); backdrop-filter: blur(16px); transition: box-shadow 0.2s ease, background-color 0.2s ease; }
    .site-header.scrolled { box-shadow: 0 18px 40px rgba(2, 6, 23, 0.18); }
    .site-header, .site-header * { box-sizing: border-box; }
    .site-header__container { max-width: 1200px; margin: 0 auto; padding: 14px 20px; display: flex; align-items: center; justify-content: space-between; gap: 16px; }
    .site-header__brand { display: inline-flex; align-items: center; gap: 10px; font-size: 1.08rem; font-weight: 700; color: var(--header-text, #e2e8f0); text-decoration: none; flex-shrink: 0; }
    .site-header__brand img { width: 32px; height: 32px; flex-shrink: 0; }
    .site-header__brand-accent { color: #38bdf8; }
    .site-header__menu-toggle, .site-header__theme-toggle, .site-header__lang-toggle, .site-header__nav-link, .site-header__cta { font: inherit; }
    .site-header__menu-toggle { display: none; align-items: center; justify-content: center; width: 42px; height: 42px; border: 1px solid rgba(148, 163, 184, 0.22); background: rgba(148, 163, 184, 0.08); border-radius: 12px; cursor: pointer; flex-shrink: 0; color: inherit; }
    .site-header__menu-toggle span { display: block; width: 20px; height: 2px; margin: 3px 0; background: currentColor; transition: transform 0.2s ease, opacity 0.2s ease; }
    .site-header__menu-toggle.is-active span:nth-child(1) { transform: translateY(5px) rotate(45deg); }
    .site-header__menu-toggle.is-active span:nth-child(2) { opacity: 0; }
    .site-header__menu-toggle.is-active span:nth-child(3) { transform: translateY(-5px) rotate(-45deg); }
    .site-header__nav { display: flex; align-items: center; gap: 18px; }
    .site-header__nav-link { display: inline-flex; align-items: center; justify-content: center; padding: 0; color: var(--header-text, #e2e8f0); text-decoration: none; font-weight: 600; background: transparent; border: none; cursor: pointer; }
    .site-header__nav-link:hover { color: #7dd3fc; }
    .site-header__actions { display: flex; align-items: center; gap: 12px; margin-left: 8px; }
    .site-header__theme-toggle, .site-header__lang-toggle { display: inline-flex; align-items: center; justify-content: center; min-height: 42px; padding: 0 14px; border: 1px solid rgba(148, 163, 184, 0.22); background: rgba(148, 163, 184, 0.08); color: var(--header-text, #e2e8f0); border-radius: 12px; cursor: pointer; transition: background-color 0.2s ease, border-color 0.2s ease, transform 0.2s ease; }
    .site-header__theme-toggle:hover, .site-header__lang-toggle:hover, .site-header__menu-toggle:hover { background: rgba(56, 189, 248, 0.14); border-color: rgba(56, 189, 248, 0.28); }
    .site-header__theme-toggle:hover { transform: translateY(-1px); }
    .site-header__lang { position: relative; }
    .site-header__lang-toggle { gap: 8px; font-size: 0.92rem; font-weight: 700; }
    .site-header__lang-toggle img, .site-header__lang-option img { border-radius: 999px; object-fit: cover; flex-shrink: 0; }
    .site-header__lang-toggle img { width: 18px; height: 18px; }
    .site-header__lang-label { line-height: 1; }
    .site-header__lang-dropdown { position: absolute; inset-inline-end: 0; top: calc(100% + 10px); min-width: 228px; padding: 10px; border: 1px solid rgba(148, 163, 184, 0.18); border-radius: 16px; background: var(--dropdown-bg, rgba(15, 23, 42, 0.98)); box-shadow: 0 20px 45px rgba(2, 6, 23, 0.34); opacity: 0; visibility: hidden; transform: translateY(-6px); transition: opacity 0.18s ease, transform 0.18s ease, visibility 0.18s ease; z-index: 1001; }
    .site-header__lang.is-open .site-header__lang-dropdown { opacity: 1; visibility: visible; transform: translateY(0); }
    .site-header__lang-option { display: flex; align-items: center; gap: 10px; width: 100%; padding: 10px 12px; border-radius: 12px; color: var(--text-color, #e2e8f0); text-decoration: none; font-size: 0.92rem; transition: background-color 0.18s ease, color 0.18s ease; }
    .site-header__lang-option:hover, .site-header__lang-option.is-active { background: var(--dropdown-hover-bg, rgba(56, 189, 248, 0.14)); color: var(--heading-color, #0f172a); }
    .site-header__lang-option img { width: 18px; height: 18px; }
    .site-header__lang-meta { display: flex; flex-direction: column; line-height: 1.2; }
    .site-header__lang-native { color: var(--footer-muted, #94a3b8); font-size: 0.82rem; }
    .site-header__lang-option:hover .site-header__lang-native, .site-header__lang-option.is-active .site-header__lang-native { color: var(--text-muted, #475569); }
    html.dark-theme .site-header__lang-option:hover, html.dark-theme .site-header__lang-option.is-active, [data-theme="dark"] .site-header__lang-option:hover, [data-theme="dark"] .site-header__lang-option.is-active { color: #e0f2fe; }
    html.dark-theme .site-header__lang-option:hover .site-header__lang-native, html.dark-theme .site-header__lang-option.is-active .site-header__lang-native, [data-theme="dark"] .site-header__lang-option:hover .site-header__lang-native, [data-theme="dark"] .site-header__lang-option.is-active .site-header__lang-native { color: #cbd5e1; }
    .site-header__cta { display: inline-flex; align-items: center; justify-content: center; min-height: 42px; padding: 0 18px; border-radius: 999px; background: linear-gradient(135deg, #38bdf8, #0ea5e9); color: #0f172a; font-weight: 700; text-decoration: none; white-space: nowrap; transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .site-header__cta:hover { transform: translateY(-1px); box-shadow: 0 10px 20px rgba(14, 165, 233, 0.24); }
    .site-header__panel { display: none; border-top: 1px solid rgba(148, 163, 184, 0.14); background: var(--dropdown-bg, rgba(15, 23, 42, 0.98)); box-shadow: 0 18px 40px rgba(2, 6, 23, 0.2); }
    .site-header__panel.is-open { display: block; }
    .site-header__panel-inner { max-width: 1200px; margin: 0 auto; padding: 24px 20px; display: grid; grid-template-columns: repeat(5, minmax(0, 1fr)); gap: 16px; }
    .site-header__panel-card { padding: 16px 14px 14px; border-radius: 16px; background: var(--card-bg, rgba(255, 255, 255, 0.04)); border: 1px solid rgba(148, 163, 184, 0.14); box-shadow: 0 12px 28px rgba(2, 6, 23, 0.18); }
    .site-header__panel-title { display: flex; align-items: center; gap: 8px; margin: 0 0 12px; padding-bottom: 10px; border-bottom: 1px solid rgba(148, 163, 184, 0.14); color: #38bdf8; font-size: 0.8rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase; }
    .site-header__panel-links { display: flex; flex-direction: column; gap: 4px; }
    .site-header__panel-links a, .site-header__mobile-tools a { display: block; padding: 7px 9px; color: var(--text-color, #e2e8f0); text-decoration: none; border-radius: 10px; transition: background-color 0.18s ease, color 0.18s ease, transform 0.18s ease; }
    .site-header__panel-links a:hover, .site-header__mobile-tools a:hover { background: rgba(56, 189, 248, 0.12); color: #e0f2fe; }
    .site-header__panel-links a:hover { transform: translateX(4px); }
    .site-header__mobile-tools { display: none; }
    .site-header[dir="rtl"] .site-header__container, .site-header[dir="rtl"] .site-header__nav, .site-header[dir="rtl"] .site-header__actions { direction: rtl; }
    .site-header[dir="rtl"] .site-header__actions { margin-left: 0; margin-right: 8px; }
    .site-header[dir="rtl"] .site-header__panel-links a:hover { transform: translateX(-4px); }
    @media (max-width: 1040px) { .site-header__panel-inner { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
    @media (max-width: 920px) {
        .site-header { overflow: visible; }
        .site-header__container { padding: 12px 16px; }
        .site-header__menu-toggle { display: inline-flex; }
        .site-header__nav { position: absolute; top: calc(100% + 1px); left: 0; right: 0; margin: 0; padding: 20px 16px 24px; flex-direction: column; align-items: stretch; background: var(--dropdown-bg, rgba(15, 23, 42, 0.98)); border-top: 1px solid rgba(148, 163, 184, 0.14); box-shadow: 0 24px 44px rgba(2, 6, 23, 0.24); max-height: calc(100dvh - 64px); overflow-y: auto; -webkit-overflow-scrolling: touch; overscroll-behavior: contain; gap: 10px; z-index: 1002; opacity: 0; visibility: hidden; pointer-events: none; transform: translateY(-10px); transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s ease; }
        .site-header__nav.is-open { opacity: 1; visibility: visible; pointer-events: auto; transform: translateY(0); }
        .site-header__nav-link, .site-header__cta, .site-header__theme-toggle, .site-header__lang-toggle { width: 100%; justify-content: flex-start; }
        .site-header__nav-link { min-height: 48px; padding: 0 14px; border-radius: 12px; background: rgba(148, 163, 184, 0.08); }
        .site-header__actions { width: 100%; flex-direction: column; align-items: stretch; gap: 10px; margin: 12px 0 0; padding-top: 16px; border-top: 1px solid rgba(148, 163, 184, 0.18); }
        .site-header__lang { width: 100%; }
        .site-header__lang-dropdown { position: static; margin-top: 8px; width: 100%; min-width: 0; }
        .site-header__panel { display: none !important; }
        .site-header__mobile-tools { display: none; padding: 8px; border-radius: 16px; background: rgba(148, 163, 184, 0.08); }
        .site-header__mobile-tools.is-open { display: block; }
    }
    @media (max-width: 520px) {
        .site-header__brand { font-size: 0.97rem; }
        .site-header__brand img { width: 28px; height: 28px; }
        .site-header__container { padding: 10px 12px; }
        .site-header__nav { max-height: calc(100dvh - 60px); padding-inline: 12px; }
    }
</style>

<header class="site-header" id="siteHeader" dir="<?php echo htmlspecialchars($direction, ENT_QUOTES, 'UTF-8'); ?>">
    <div class="site-header__container">
        <a href="<?php echo htmlspecialchars($pages['home'] ?? url(''), ENT_QUOTES, 'UTF-8'); ?>" class="site-header__brand">
            <img src="<?php echo htmlspecialchars(url('images/shared/logo.svg'), ENT_QUOTES, 'UTF-8'); ?>" alt="KeyboardTester logo" width="32" height="32" loading="eager" decoding="async" fetchpriority="high">
            <span>KeyboardTester<span class="site-header__brand-accent">.click</span></span>
        </a>

        <button class="site-header__menu-toggle" id="siteHeaderMenuToggle" type="button" aria-label="<?php echo htmlspecialchars($copy['aria']['menu'], ENT_QUOTES, 'UTF-8'); ?>" aria-expanded="false" aria-controls="siteHeaderNav">
            <span></span><span></span><span></span>
        </button>

        <nav class="site-header__nav" id="siteHeaderNav">
            <a class="site-header__nav-link" href="<?php echo htmlspecialchars($pages['home'] ?? url(''), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($copy['menu']['home'], ENT_QUOTES, 'UTF-8'); ?></a>
            <button class="site-header__nav-link" id="siteHeaderToolsToggle" type="button" aria-expanded="false" aria-controls="siteHeaderToolsPanel"><?php echo htmlspecialchars($copy['menu']['tools'], ENT_QUOTES, 'UTF-8'); ?></button>

            <div class="site-header__mobile-tools" id="siteHeaderMobileTools" aria-label="<?php echo htmlspecialchars($copy['aria']['tools_panel'], ENT_QUOTES, 'UTF-8'); ?>">
                <?php foreach ($config['headerSections'] as $section): ?>
                    <?php foreach ($section['tool_ids'] as $toolId): ?>
                        <?php if (!isset($resolvedTools[$toolId])) { continue; } ?>
                        <a href="<?php echo htmlspecialchars($resolvedTools[$toolId]['href'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($resolvedTools[$toolId]['name'], ENT_QUOTES, 'UTF-8'); ?></a>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>

            <a class="site-header__nav-link" href="<?php echo htmlspecialchars($pages['privacy'] ?? url('privacy-policy.php'), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($copy['menu']['privacy'], ENT_QUOTES, 'UTF-8'); ?></a>
            <a class="site-header__nav-link" href="<?php echo htmlspecialchars($pages['about'] ?? url('about-us.php'), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($copy['menu']['about'], ENT_QUOTES, 'UTF-8'); ?></a>

            <div class="site-header__actions">
                <div class="site-header__lang" id="siteHeaderLang">
                    <button class="site-header__lang-toggle" id="siteHeaderLangToggle" type="button" aria-label="<?php echo htmlspecialchars($copy['aria']['language'], ENT_QUOTES, 'UTF-8'); ?>" aria-expanded="false" aria-controls="siteHeaderLangDropdown">
                        <?php if (!empty($currentLanguage['flag'])): ?>
                            <img src="<?php echo htmlspecialchars(url($currentLanguage['flag']), ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($currentLanguage['name'] ?? $copy['language_code'], ENT_QUOTES, 'UTF-8'); ?>" loading="eager" width="18" height="18">
                        <?php else: ?>
                            <span>🌐</span>
                        <?php endif; ?>
                        <span class="site-header__lang-label"><?php echo htmlspecialchars($copy['language_code'], ENT_QUOTES, 'UTF-8'); ?></span>
                    </button>
                    <div class="site-header__lang-dropdown" id="siteHeaderLangDropdown">
                        <?php
                        // Detect the current tool so we can link directly to the
                        // equivalent tool page instead of the language home page.
                        $currentToolId = kbtDetectCurrentToolId($locale);
                        ?>
                        <?php foreach (($keyboardLanguages ?? []) as $langKey => $langMeta): ?>
                        <?php
                            // Default: language home page
                            $switchUrl = $langMeta['url'];
                            if ($currentToolId !== null) {
                                $langToolIndex = kbtGetSiteChromeToolLabelIndex($langKey);
                                if (isset($langToolIndex[$currentToolId])) {
                                    // Use kbtBuildLangSwitchUrl — bypasses $pages so the
                                    // target locale URL is always returned correctly
                                    $resolved = kbtBuildLangSwitchUrl($currentToolId, $langToolIndex[$currentToolId], $langKey);
                                    if ($resolved !== null) {
                                        $switchUrl = $resolved;
                                    }
                                }
                            }
                        ?>
                            <a class="site-header__lang-option<?php echo $langKey === $locale ? ' is-active' : ''; ?>" href="<?php echo htmlspecialchars($switchUrl, ENT_QUOTES, 'UTF-8'); ?>">
                                <img src="<?php echo htmlspecialchars(url($langMeta['flag']), ENT_QUOTES, 'UTF-8'); ?>" alt="" loading="lazy" width="18" height="18">
                                <span class="site-header__lang-meta">
                                    <span><?php echo htmlspecialchars($langMeta['name'], ENT_QUOTES, 'UTF-8'); ?></span>
                                    <span class="site-header__lang-native"><?php echo htmlspecialchars($langMeta['native'], ENT_QUOTES, 'UTF-8'); ?></span>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <button class="site-header__theme-toggle" id="siteHeaderThemeToggle" type="button" data-theme-toggle aria-label="<?php echo htmlspecialchars($copy['aria']['theme'], ENT_QUOTES, 'UTF-8'); ?>">🌙</button>
                <a class="site-header__cta" href="<?php echo htmlspecialchars(($pages['home'] ?? url('')) . '#tools', ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($copy['menu']['try_tools'], ENT_QUOTES, 'UTF-8'); ?></a>
            </div>
        </nav>
    </div>

    <div class="site-header__panel" id="siteHeaderToolsPanel">
        <div class="site-header__panel-inner" aria-label="<?php echo htmlspecialchars($copy['aria']['tools_panel'], ENT_QUOTES, 'UTF-8'); ?>">
            <?php foreach ($config['headerSections'] as $section): ?>
                <?php
                $panelLinks = [];
                foreach ($section['tool_ids'] as $toolId) {
                    if (isset($resolvedTools[$toolId])) {
                        $panelLinks[] = $resolvedTools[$toolId];
                    }
                }
                if ($panelLinks === []) { continue; }
                $title = $categoryLabels[$section['category']] ?? ucfirst($section['category']);
                ?>
                <div class="site-header__panel-card">
                    <p class="site-header__panel-title"><span><?php echo $section['icon']; ?></span><span><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></span></p>
                    <div class="site-header__panel-links">
                        <?php foreach ($panelLinks as $panelLink): ?>
                            <a href="<?php echo htmlspecialchars($panelLink['href'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($panelLink['name'], ENT_QUOTES, 'UTF-8'); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var header = document.getElementById('siteHeader');
    var menuToggle = document.getElementById('siteHeaderMenuToggle');
    var nav = document.getElementById('siteHeaderNav');
    var toolsToggle = document.getElementById('siteHeaderToolsToggle');
    var toolsPanel = document.getElementById('siteHeaderToolsPanel');
    var mobileTools = document.getElementById('siteHeaderMobileTools');
    var langWrap = document.getElementById('siteHeaderLang');
    var langToggle = document.getElementById('siteHeaderLangToggle');
    var themeToggle = document.getElementById('siteHeaderThemeToggle');

    function syncThemeIcon() {
        if (!themeToggle) { return; }
        themeToggle.textContent = document.documentElement.classList.contains('dark-theme') ? '☀️' : '🌙';
    }

    function closeDesktopTools() {
        if (toolsPanel) { toolsPanel.classList.remove('is-open'); }
        if (toolsToggle) { toolsToggle.setAttribute('aria-expanded', 'false'); }
    }

    function closeMobileTools() {
        if (mobileTools) { mobileTools.classList.remove('is-open'); }
        if (toolsToggle) { toolsToggle.setAttribute('aria-expanded', 'false'); }
    }

    function closeNav() {
        if (!nav || !menuToggle) { return; }
        nav.classList.remove('is-open');
        menuToggle.classList.remove('is-active');
        menuToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    syncThemeIcon();
    window.addEventListener('themechange', syncThemeIcon);
    window.addEventListener('scroll', function () { if (header) { header.classList.toggle('scrolled', window.scrollY > 24); } }, { passive: true });

    if (menuToggle && nav) {
        menuToggle.addEventListener('click', function () {
            var isOpen = nav.classList.toggle('is-open');
            menuToggle.classList.toggle('is-active', isOpen);
            menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            document.body.style.overflow = isOpen ? 'hidden' : '';
            if (!isOpen) { closeMobileTools(); }
        });
    }

    if (toolsToggle) {
        toolsToggle.addEventListener('click', function () {
            if (window.innerWidth <= 920) {
                if (!mobileTools) { return; }
                var mobileOpen = mobileTools.classList.toggle('is-open');
                toolsToggle.setAttribute('aria-expanded', mobileOpen ? 'true' : 'false');
                closeDesktopTools();
                return;
            }
            if (!toolsPanel) { return; }
            var desktopOpen = toolsPanel.classList.toggle('is-open');
            toolsToggle.setAttribute('aria-expanded', desktopOpen ? 'true' : 'false');
            closeMobileTools();
        });
    }

    if (langWrap && langToggle) {
        langToggle.addEventListener('click', function (event) {
            event.stopPropagation();
            var isOpen = langWrap.classList.toggle('is-open');
            langToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });
    }

    document.addEventListener('click', function (event) {
        if (langWrap && !langWrap.contains(event.target)) {
            langWrap.classList.remove('is-open');
            if (langToggle) { langToggle.setAttribute('aria-expanded', 'false'); }
        }

        if (header && !header.contains(event.target)) {
            closeDesktopTools();
            closeMobileTools();
        }
    });

    document.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') { return; }
        closeDesktopTools();
        closeMobileTools();
        closeNav();
        if (langWrap) { langWrap.classList.remove('is-open'); }
        if (langToggle) { langToggle.setAttribute('aria-expanded', 'false'); }
    });

    if (nav) {
        nav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                closeDesktopTools();
                closeMobileTools();
                closeNav();
            });
        });
    }
});
</script>
        <?php
    }
}

if (!function_exists('kbtRenderSiteFooter')) {
    function kbtRenderSiteFooter($locale = 'en')
    {
        global $pages, $socialLinks, $siteEmail, $siteName, $siteYear;

        $copy = kbtGetSiteChromeLocaleCopy($locale);
        $resolvedTools = kbtGetSiteChromeResolvedTools($locale);
        $config = kbtGetSiteChromeConfig();
        $direction = $copy['dir'] ?? 'ltr';
        $toolIconMap = [
            'keyboard-home' => 'keyboard',
            'mouse-test' => 'mouse',
            'typing-test' => 'typing',
            'click-speed' => 'lightning',
            'screen-test' => 'screen',
            'mic-test' => 'mic',
            'webcam-test' => 'camera',
            'headphone-test' => 'headphones',
            'qr-generator' => 'qr',
            'ocr-tool' => 'ocr',
            'password-generator' => 'lock',
            'ghost-click' => 'ghost',
            'polling-rate-test' => 'polling',
            'refresh-rate-test' => 'refresh',
            'color-test' => 'palette',
            'touch-screen-test' => 'touch',
            'gamepad-test' => 'gamepad',
        ];

        $quickLinks = [
            ['href' => $pages['home'] ?? url(''), 'label' => $copy['quick']['home'], 'icon' => 'home'],
            ['href' => $pages['blog'] ?? blogUrl(), 'label' => $copy['quick']['blog'], 'icon' => 'blog'],
            ['href' => $pages['about'] ?? url('about-us.php'), 'label' => $copy['quick']['about'], 'icon' => 'about'],
            ['href' => $pages['privacy'] ?? url('privacy-policy.php'), 'label' => $copy['quick']['privacy'], 'icon' => 'privacy'],
            ['href' => $pages['disclaimer'] ?? url('disclaimer.php'), 'label' => $copy['quick']['disclaimer'], 'icon' => 'disclaimer'],
        ];

        $helpLinks = [
            ['href' => $pages['feedback'] ?? url('feedback.php'), 'label' => $copy['help']['feedback'], 'icon' => 'feedback'],
            ['href' => $pages['privacy'] ?? url('privacy-policy.php'), 'label' => $copy['help']['privacy'], 'icon' => 'privacy'],
            ['href' => $pages['disclaimer'] ?? url('disclaimer.php'), 'label' => $copy['help']['disclaimer'], 'icon' => 'disclaimer'],
            ['href' => $pages['blog'] ?? blogUrl(), 'label' => $copy['help']['blog'], 'icon' => 'blog'],
        ];
        // NOTE: <style> intentionally output BEFORE footer HTML to prevent CLS from
        // SVG icons rendering at default 300x150 before CSS applies 15x15 constraint.
        ?><style>
    .site-footer { --footer-bg: #0b1220; --footer-surface: rgba(15, 23, 42, 0.78); --footer-border: rgba(148, 163, 184, 0.18); --footer-accent: #38bdf8; --footer-text: #e2e8f0; --footer-muted: #94a3b8; margin-top: 90px; padding: 80px 20px 28px; color: var(--footer-text); background: radial-gradient(900px 320px at 10% 0%, rgba(56, 189, 248, 0.16), transparent 60%), radial-gradient(700px 280px at 90% 20%, rgba(14, 165, 233, 0.14), transparent 60%), var(--footer-bg); border-top: 1px solid var(--footer-border); }
    .site-footer, .site-footer * { box-sizing: border-box; }
    .footer-container { max-width: 1200px; margin: 0 auto 36px; display: grid; grid-template-columns: minmax(0, 1.55fr) minmax(0, 1fr) minmax(0, 1fr); gap: 28px; align-items: stretch; }
    .footer-section { display: flex; flex-direction: column; height: 100%; padding: 22px; border-radius: 20px; background: var(--footer-surface); border: 1px solid var(--footer-border); box-shadow: 0 20px 44px rgba(2, 6, 23, 0.34); backdrop-filter: blur(12px); }
    .footer-logo { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }
    .footer-logo h3 { margin: 0; color: var(--footer-accent); font-size: 1.45rem; font-weight: 700; }
    .footer-description { margin: 0 0 22px; color: var(--footer-muted); line-height: 1.7; font-size: 0.96rem; }
    .social-links { display: flex; flex-wrap: wrap; gap: 12px; }
    .social-links a { display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 44px; padding: 0 16px; border-radius: 999px; border: 1px solid rgba(56, 189, 248, 0.22); background: rgba(56, 189, 248, 0.12); color: var(--footer-text); text-decoration: none; font-weight: 600; transition: transform 0.2s ease, background-color 0.2s ease, border-color 0.2s ease; }
    .social-links a:hover { transform: translateY(-1px); background: rgba(56, 189, 248, 0.2); border-color: rgba(125, 211, 252, 0.34); }
    .footer-heading { margin: 0 0 16px; padding-bottom: 10px; position: relative; color: var(--footer-accent); font-size: 1.06rem; font-weight: 700; }
    .footer-heading::after { content: ''; position: absolute; left: 0; bottom: 0; width: 42px; height: 3px; border-radius: 999px; background: var(--footer-accent); }
    .footer-links { list-style: none; margin: 0; padding: 0; display: flex; flex-direction: column; gap: 10px; }
    .footer-links a, .contact-item { color: var(--footer-muted); text-decoration: none; line-height: 1.55; transition: color 0.2s ease, transform 0.2s ease; }
    .footer-links a { display: inline-flex; align-items: flex-start; gap: 10px; width: fit-content; }
    .footer-links a:hover, .contact-item:hover { color: #e0f2fe; }
    .footer-links a:hover { transform: translateX(4px); }
    .contact-info { margin-bottom: 18px; }
    .contact-item { display: inline-flex; align-items: center; gap: 10px; }
    .footer-link-icon, .social-link-icon { display: inline-flex; align-items: center; justify-content: center; width: 15px; height: 15px; flex-shrink: 0; color: #67d4ff; opacity: 0.96; }
    .footer-link-icon { margin-top: 0.14rem; }
    .footer-link-icon svg, .social-link-icon svg { width: 100%; height: 100%; display: block; }
    .footer-link-icon--home, .footer-link-icon--mail, .footer-link-icon--screen, .footer-link-icon--refresh { color: #38bdf8; }
    .footer-link-icon--blog, .footer-link-icon--typing, .footer-link-icon--lightning, .footer-link-icon--lock { color: #f59e0b; }
    .footer-link-icon--about, .footer-link-icon--ghost, .footer-link-icon--gamepad { color: #a78bfa; }
    .footer-link-icon--privacy, .footer-link-icon--mouse, .footer-link-icon--polling { color: #22c55e; }
    .footer-link-icon--disclaimer, .footer-link-icon--palette { color: #fb923c; }
    .footer-link-icon--feedback, .footer-link-icon--qr { color: #facc15; }
    .footer-link-icon--keyboard, .footer-link-icon--touch { color: #2dd4bf; }
    .footer-link-icon--mic { color: #f87171; }
    .footer-link-icon--camera, .footer-link-icon--ocr { color: #8b5cf6; }
    .footer-link-icon--headphones { color: #ec4899; }
    .social-link-icon--github { color: #f8fafc; }
    .social-link-icon--gitlab { color: #fc6d26; }
    .social-link-icon--youtube { color: #ff4d4f; }
    .social-link-icon--facebook { color: #60a5fa; }
    .newsletter { margin-top: auto; }
    .newsletter p { margin: 0 0 12px; color: var(--footer-muted); line-height: 1.6; }
    .newsletter-form { display: grid; grid-template-columns: minmax(0, 1fr) auto; gap: 12px; align-items: stretch; }
    .newsletter-form input, .newsletter-form button { min-height: 46px; border-radius: 12px; }
    .newsletter-form input { width: 100%; min-width: 0; padding: 0 16px; border: 1px solid rgba(148, 163, 184, 0.2); background: rgba(255, 255, 255, 0.04); color: var(--footer-text); }
    .newsletter-form input::placeholder { color: var(--footer-muted); }
    .newsletter-form input:focus { outline: none; border-color: var(--footer-accent); background: rgba(255, 255, 255, 0.07); }
    .newsletter-form button { min-width: 128px; padding: 0 22px; border: none; white-space: nowrap; background: linear-gradient(135deg, #38bdf8, #0ea5e9); color: #0f172a; font-weight: 700; cursor: pointer; transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .newsletter-form button:hover { transform: translateY(-1px); box-shadow: 0 10px 22px rgba(14, 165, 233, 0.26); }
    .footer-bottom { max-width: 1200px; margin: 0 auto; padding-top: 28px; border-top: 1px solid var(--footer-border); text-align: center; }
    .copyright, .tagline { margin: 0; color: var(--footer-muted); line-height: 1.7; }
    .copyright { margin-bottom: 6px; font-size: 0.9rem; }
    .copyright a { color: var(--footer-accent); text-decoration: none; font-weight: 700; }
    .back-to-top { position: fixed; right: 20px; bottom: 24px; width: 46px; height: 46px; border: none; border-radius: 999px; background: linear-gradient(135deg, #38bdf8, #0ea5e9); color: #0f172a; font-weight: 700; box-shadow: 0 12px 28px rgba(2, 6, 23, 0.26); cursor: pointer; opacity: 0; pointer-events: none; transition: opacity 0.2s ease, transform 0.2s ease; z-index: 999; }
    .back-to-top.show { opacity: 1; pointer-events: auto; }
    .site-footer[dir="rtl"] { text-align: right; }
    .site-footer[dir="rtl"] .footer-heading::after { left: auto; right: 0; }
    .site-footer[dir="rtl"] .footer-links a:hover { transform: translateX(-4px); }
    @media (max-width: 1100px) {
        .footer-container { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .about-section { grid-column: 1 / -1; }
    }
    @media (max-width: 768px) {
        .site-footer { margin-top: 64px; padding: 52px 16px 22px; }
        .footer-container { grid-template-columns: 1fr; }
        .about-section { grid-column: auto; }
        .footer-section { padding: 20px; }
        .social-links { justify-content: center; }
        .footer-heading::after { left: 50%; transform: translateX(-50%); }
        .site-footer[dir="rtl"] .footer-heading::after { right: auto; left: 50%; transform: translateX(-50%); }
        .site-footer, .footer-section { text-align: center; }
        .footer-logo { justify-content: center; }
        .footer-links a, .contact-item { width: 100%; justify-content: center; }
        .footer-links a:hover { transform: none; }
        .newsletter { margin-top: 16px; }
        .newsletter-form { grid-template-columns: 1fr; }
        .newsletter-form button { width: 100%; }
    }
</style>
<footer class="site-footer" dir="<?php echo htmlspecialchars($direction, ENT_QUOTES, 'UTF-8'); ?>">
    <div class="footer-container">
        <section class="footer-section about-section">
            <div class="footer-logo">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M3 10H21M7 3V5M17 3V5M6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4802 21 18.9201 21 17.8V8.2C21 7.07989 21 6.51984 20.782 6.09202C20.5903 5.71569 20.2843 5.40973 19.908 5.21799C19.4802 5 18.9201 5 17.8 5H6.2C5.0799 5 4.51984 5 4.09202 5.21799C3.71569 5.40973 3.40973 5.71569 3.21799 6.09202C3 6.51984 3 7.07989 3 8.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21Z" stroke="#38bdf8" stroke-width="2" stroke-linecap="round"/>
                    <path d="M8 12H8.01M12 12H12.01M16 12H16.01M8 16H8.01M12 16H12.01M16 16H16.01" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h3>KeyboardTester</h3>
            </div>
            <p class="footer-description"><?php echo htmlspecialchars($copy['footer']['about'], ENT_QUOTES, 'UTF-8'); ?></p>
            <div class="social-links">
                <a href="<?php echo htmlspecialchars($socialLinks['github'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer"><?php echo kbtRenderSiteChromeMiniIcon('github', 'social-link-icon'); ?><span>GitHub</span></a>
                <a href="<?php echo htmlspecialchars($socialLinks['gitlab'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer"><?php echo kbtRenderSiteChromeMiniIcon('gitlab', 'social-link-icon'); ?><span>GitLab</span></a>
                <a href="<?php echo htmlspecialchars($socialLinks['youtube'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer"><?php echo kbtRenderSiteChromeMiniIcon('youtube', 'social-link-icon'); ?><span>YouTube</span></a>
                <a href="<?php echo htmlspecialchars($socialLinks['facebook'], ENT_QUOTES, 'UTF-8'); ?>" target="_blank" rel="noopener noreferrer"><?php echo kbtRenderSiteChromeMiniIcon('facebook', 'social-link-icon'); ?><span>Facebook</span></a>
            </div>
        </section>

        <section class="footer-section">
            <h4 class="footer-heading"><?php echo htmlspecialchars($copy['footer']['quick_links'], ENT_QUOTES, 'UTF-8'); ?></h4>
            <ul class="footer-links"><?php kbtRenderSiteChromeLinkList($quickLinks); ?></ul>
        </section>

        <section class="footer-section">
            <h4 class="footer-heading"><?php echo htmlspecialchars($copy['footer']['testing_tools'], ENT_QUOTES, 'UTF-8'); ?></h4>
            <ul class="footer-links">
                <?php
                $testingLinks = [];
                foreach ($config['footerSections']['testing'] as $toolId) {
                    if (!isset($resolvedTools[$toolId])) { continue; }
                    $testingLinks[] = ['href' => $resolvedTools[$toolId]['href'], 'label' => $resolvedTools[$toolId]['name'], 'icon' => $toolIconMap[$toolId] ?? null];
                }
                kbtRenderSiteChromeLinkList($testingLinks);
                ?>
            </ul>
        </section>

        <section class="footer-section">
            <h4 class="footer-heading"><?php echo htmlspecialchars($copy['footer']['more_tools'], ENT_QUOTES, 'UTF-8'); ?></h4>
            <ul class="footer-links">
                <?php
                $moreLinks = [];
                foreach ($config['footerSections']['more'] as $toolId) {
                    if (!isset($resolvedTools[$toolId])) { continue; }
                    $moreLinks[] = ['href' => $resolvedTools[$toolId]['href'], 'label' => $resolvedTools[$toolId]['name'], 'icon' => $toolIconMap[$toolId] ?? null];
                }
                kbtRenderSiteChromeLinkList($moreLinks);
                ?>
            </ul>
        </section>

        <section class="footer-section">
            <h4 class="footer-heading"><?php echo htmlspecialchars($copy['footer']['help_resources'], ENT_QUOTES, 'UTF-8'); ?></h4>
            <ul class="footer-links"><?php kbtRenderSiteChromeLinkList($helpLinks); ?></ul>
        </section>

        <section class="footer-section contact-section">
            <h4 class="footer-heading"><?php echo htmlspecialchars($copy['footer']['stay_connected'], ENT_QUOTES, 'UTF-8'); ?></h4>
            <div class="contact-info">
                <a href="mailto:<?php echo htmlspecialchars($siteEmail, ENT_QUOTES, 'UTF-8'); ?>" class="contact-item"><?php echo kbtRenderSiteChromeMiniIcon('mail'); ?><span><?php echo htmlspecialchars($siteEmail, ENT_QUOTES, 'UTF-8'); ?></span></a>
            </div>
            <div class="newsletter">
                <p><?php echo htmlspecialchars($copy['footer']['newsletter'], ENT_QUOTES, 'UTF-8'); ?></p>
                <form class="newsletter-form" data-noop="true" action="#" method="post">
                    <input type="email" name="email" placeholder="<?php echo htmlspecialchars($copy['footer']['placeholder'], ENT_QUOTES, 'UTF-8'); ?>" required aria-label="<?php echo htmlspecialchars($copy['footer']['placeholder'], ENT_QUOTES, 'UTF-8'); ?>">
                    <button type="submit"><?php echo htmlspecialchars($copy['footer']['subscribe'], ENT_QUOTES, 'UTF-8'); ?></button>
                </form>
            </div>
        </section>
    </div>

    <div class="footer-bottom">
        <p class="copyright">&copy; <?php echo htmlspecialchars((string) $siteYear, ENT_QUOTES, 'UTF-8'); ?> <a href="<?php echo htmlspecialchars($pages['home'] ?? url(''), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8'); ?></a>. <?php echo htmlspecialchars($copy['footer']['rights'], ENT_QUOTES, 'UTF-8'); ?></p>
        <p class="tagline"><?php echo htmlspecialchars($copy['footer']['tagline'], ENT_QUOTES, 'UTF-8'); ?></p>
    </div>
</footer>

<button id="back-to-top" class="back-to-top" type="button" aria-label="<?php echo htmlspecialchars($copy['aria']['back_to_top'], ENT_QUOTES, 'UTF-8'); ?>">↑</button>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var backToTop = document.getElementById('back-to-top');
    if (backToTop) {
        var onScroll = function () { backToTop.classList.toggle('show', window.scrollY > 320); };
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
        backToTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });
    }

    document.querySelectorAll('.newsletter-form[data-noop="true"]').forEach(function (form) {
        form.addEventListener('submit', function (event) { event.preventDefault(); });
    });
});
</script>
        <?php
    }
}
