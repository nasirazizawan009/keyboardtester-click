<?php
/**
 * Localized support content for language-specific tool wrappers.
 *
 * Replaces English-only help/SEO/related-tool includes on localized pages with
 * compact language-matched guidance and translated related tool cards.
 */

require_once __DIR__ . '/tool-list-data.php';

if (!function_exists('url')) {
    require_once __DIR__ . '/../../config.php';
}

if (!function_exists('kbtLocalizedToolSupportLocale')) {
    function kbtLocalizedToolSupportLocale(): string
    {
        if (!empty($GLOBALS['toolsListLocale'])) {
            return (string)$GLOBALS['toolsListLocale'];
        }
        if (!empty($GLOBALS['siteChromeLocale'])) {
            return (string)$GLOBALS['siteChromeLocale'];
        }

        $path = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
        $map = [
            '/languages/spanish/' => 'es',
            '/languages/french/' => 'fr',
            '/languages/german/' => 'de',
            '/languages/portuguese/' => 'pt',
            '/languages/arabic/' => 'ar',
            '/languages/russian/' => 'ru',
            '/languages/japanese/' => 'ja',
            '/languages/korean/' => 'ko',
        ];
        foreach ($map as $needle => $locale) {
            if (strpos($path, $needle) !== false) {
                return $locale;
            }
        }
        return 'en';
    }
}

if (!function_exists('kbtLocalizedToolSupportText')) {
    function kbtLocalizedToolSupportText(string $locale): array
    {
        $text = [
            'es' => [
                'dir' => 'ltr',
                'guide_title' => 'Guía de uso',
                'overview_title' => 'Cómo usar %s',
                'overview' => '%s funciona directamente en tu navegador. Abre la herramienta, revisa las opciones principales y usa los resultados en la misma página sin instalar software.',
                'steps_title' => 'Pasos rápidos',
                'steps' => ['Abre el panel de la herramienta y concede permisos solo si el navegador los solicita.', 'Ajusta las opciones visibles, como unidades, duración, volumen, sensibilidad o modo de prueba.', 'Ejecuta la prueba una vez, revisa el resultado y repítela después de cambiar de dispositivo, monitor o navegador.'],
                'tips_title' => 'Consejos para mejores resultados',
                'tips' => ['Restablece el zoom del navegador al 100% cuando la herramienta dependa de medidas visuales.', 'Cierra pestañas pesadas si la prueba mide rendimiento, FPS, sonido o sensores.', 'Guarda o anota el resultado antes de recargar la página, porque la mayoría de pruebas se ejecutan localmente.'],
                'privacy_title' => 'Privacidad y compatibilidad',
                'privacy' => 'La prueba se ejecuta en el dispositivo actual. Los datos de entrada, sensores o medición se procesan en el navegador salvo que la propia página indique lo contrario.',
                'related_title' => 'Herramientas relacionadas en español',
                'open' => 'Abrir herramienta',
            ],
            'fr' => [
                'dir' => 'ltr',
                'guide_title' => 'Guide d’utilisation',
                'overview_title' => 'Comment utiliser %s',
                'overview' => '%s fonctionne directement dans votre navigateur. Ouvrez l’outil, vérifiez les options principales et lisez les résultats sur la même page, sans installation.',
                'steps_title' => 'Étapes rapides',
                'steps' => ['Ouvrez le panneau de l’outil et accordez une autorisation uniquement si le navigateur la demande.', 'Réglez les options visibles, comme les unités, la durée, le volume, la sensibilité ou le mode de test.', 'Lancez le test, vérifiez le résultat, puis recommencez après un changement d’appareil, d’écran ou de navigateur.'],
                'tips_title' => 'Conseils pour des résultats fiables',
                'tips' => ['Remettez le zoom du navigateur à 100% lorsque l’outil dépend de mesures visuelles.', 'Fermez les onglets lourds si le test mesure les performances, les FPS, le son ou les capteurs.', 'Notez le résultat avant de recharger la page, car la plupart des tests s’exécutent localement.'],
                'privacy_title' => 'Confidentialité et compatibilité',
                'privacy' => 'Le test s’exécute sur l’appareil actuel. Les données de saisie, capteurs ou mesure sont traitées dans le navigateur, sauf indication contraire sur la page.',
                'related_title' => 'Outils associés en français',
                'open' => 'Ouvrir l’outil',
            ],
            'de' => [
                'dir' => 'ltr',
                'guide_title' => 'Anleitung',
                'overview_title' => '%s verwenden',
                'overview' => '%s läuft direkt im Browser. Öffne das Tool, prüfe die wichtigsten Optionen und lies die Ergebnisse auf derselben Seite, ohne Software zu installieren.',
                'steps_title' => 'Schnelle Schritte',
                'steps' => ['Öffne das Tool-Feld und erteile Berechtigungen nur, wenn der Browser danach fragt.', 'Passe sichtbare Optionen wie Einheiten, Dauer, Lautstärke, Empfindlichkeit oder Testmodus an.', 'Starte den Test, prüfe das Ergebnis und wiederhole ihn nach einem Geräte-, Monitor- oder Browserwechsel.'],
                'tips_title' => 'Tipps für bessere Ergebnisse',
                'tips' => ['Setze den Browser-Zoom auf 100%, wenn das Tool von sichtbaren Maßen abhängt.', 'Schließe schwere Tabs, wenn der Test Leistung, FPS, Ton oder Sensoren misst.', 'Notiere das Ergebnis vor dem Neuladen, da die meisten Tests lokal im Browser laufen.'],
                'privacy_title' => 'Datenschutz und Kompatibilität',
                'privacy' => 'Der Test läuft auf dem aktuellen Gerät. Eingaben, Sensor- und Messdaten werden im Browser verarbeitet, sofern die Seite nichts anderes angibt.',
                'related_title' => 'Verwandte Tools auf Deutsch',
                'open' => 'Tool öffnen',
            ],
            'pt' => [
                'dir' => 'ltr',
                'guide_title' => 'Guia de uso',
                'overview_title' => 'Como usar %s',
                'overview' => '%s funciona diretamente no navegador. Abra a ferramenta, ajuste as opções principais e veja os resultados na mesma página, sem instalar software.',
                'steps_title' => 'Passos rápidos',
                'steps' => ['Abra o painel da ferramenta e permita acesso apenas se o navegador solicitar.', 'Ajuste as opções visíveis, como unidades, duração, volume, sensibilidade ou modo de teste.', 'Execute o teste, revise o resultado e repita após trocar de dispositivo, monitor ou navegador.'],
                'tips_title' => 'Dicas para melhores resultados',
                'tips' => ['Deixe o zoom do navegador em 100% quando a ferramenta depender de medidas visuais.', 'Feche abas pesadas se o teste medir desempenho, FPS, som ou sensores.', 'Anote o resultado antes de recarregar, pois a maioria dos testes roda localmente.'],
                'privacy_title' => 'Privacidade e compatibilidade',
                'privacy' => 'O teste roda no dispositivo atual. Dados de entrada, sensores ou medição são processados no navegador, salvo indicação diferente na própria página.',
                'related_title' => 'Ferramentas relacionadas em português',
                'open' => 'Abrir ferramenta',
            ],
            'ar' => [
                'dir' => 'rtl',
                'guide_title' => 'دليل الاستخدام',
                'overview_title' => 'طريقة استخدام %s',
                'overview' => 'تعمل أداة %s مباشرة داخل المتصفح. افتح الأداة، اضبط الخيارات الأساسية، ثم اقرأ النتيجة في الصفحة نفسها بدون تثبيت أي برنامج.',
                'steps_title' => 'خطوات سريعة',
                'steps' => ['افتح لوحة الأداة وامنح الإذن فقط إذا طلبه المتصفح.', 'اضبط الخيارات الظاهرة مثل الوحدات أو المدة أو الصوت أو الحساسية أو وضع الاختبار.', 'شغّل الاختبار، راجع النتيجة، وكرره بعد تغيير الجهاز أو الشاشة أو المتصفح.'],
                'tips_title' => 'نصائح لنتائج أدق',
                'tips' => ['اجعل تكبير المتصفح 100% عندما تعتمد الأداة على قياسات بصرية.', 'أغلق التبويبات الثقيلة إذا كان الاختبار يقيس الأداء أو FPS أو الصوت أو الحساسات.', 'سجل النتيجة قبل تحديث الصفحة لأن أغلب الاختبارات تعمل محليًا داخل المتصفح.'],
                'privacy_title' => 'الخصوصية والتوافق',
                'privacy' => 'يعمل الاختبار على الجهاز الحالي. تتم معالجة بيانات الإدخال أو الحساسات أو القياس داخل المتصفح ما لم توضّح الصفحة غير ذلك.',
                'related_title' => 'أدوات مرتبطة باللغة العربية',
                'open' => 'افتح الأداة',
            ],
            'ru' => [
                'dir' => 'ltr',
                'guide_title' => 'Руководство',
                'overview_title' => 'Как использовать %s',
                'overview' => '%s работает прямо в браузере. Откройте инструмент, проверьте основные параметры и смотрите результат на той же странице без установки программ.',
                'steps_title' => 'Быстрые шаги',
                'steps' => ['Откройте панель инструмента и разрешайте доступ только если браузер сам попросит.', 'Настройте видимые параметры: единицы, длительность, громкость, чувствительность или режим теста.', 'Запустите проверку, изучите результат и повторите её после смены устройства, монитора или браузера.'],
                'tips_title' => 'Советы для точных результатов',
                'tips' => ['Установите масштаб браузера на 100%, если инструмент зависит от визуальных размеров.', 'Закройте тяжёлые вкладки, если тест измеряет производительность, FPS, звук или датчики.', 'Запишите результат перед перезагрузкой страницы, потому что большинство тестов выполняется локально.'],
                'privacy_title' => 'Конфиденциальность и совместимость',
                'privacy' => 'Тест выполняется на текущем устройстве. Данные ввода, датчиков и измерений обрабатываются в браузере, если на странице не указано иное.',
                'related_title' => 'Похожие инструменты на русском',
                'open' => 'Открыть инструмент',
            ],
            'ja' => [
                'dir' => 'ltr',
                'guide_title' => '使い方ガイド',
                'overview_title' => '%s の使い方',
                'overview' => '%s はブラウザ上で直接動作します。ツールを開き、主な設定を確認して、同じページで結果を確認できます。インストールは不要です。',
                'steps_title' => '基本手順',
                'steps' => ['ツール画面を開き、ブラウザが求めた場合だけ権限を許可します。', '単位、時間、音量、感度、テストモードなど、表示されている設定を調整します。', 'テストを実行し、結果を確認します。端末、モニター、ブラウザを変えた場合は再度テストしてください。'],
                'tips_title' => '正確に使うためのヒント',
                'tips' => ['画面上の寸法に関係するツールでは、ブラウザのズームを100%に戻してください。', '性能、FPS、音、センサーを測るテストでは、重いタブを閉じてください。', '多くのテストはローカルで実行されるため、再読み込み前に結果を控えてください。'],
                'privacy_title' => 'プライバシーと互換性',
                'privacy' => 'テストは現在の端末上で実行されます。入力、センサー、測定データは、ページに別の説明がない限りブラウザ内で処理されます。',
                'related_title' => '日本語の関連ツール',
                'open' => 'ツールを開く',
            ],
            'ko' => [
                'dir' => 'ltr',
                'guide_title' => '사용 가이드',
                'overview_title' => '%s 사용 방법',
                'overview' => '%s는 브라우저에서 바로 실행됩니다. 도구를 열고 주요 옵션을 확인한 뒤, 설치 없이 같은 페이지에서 결과를 확인할 수 있습니다.',
                'steps_title' => '빠른 사용 순서',
                'steps' => ['도구 패널을 열고 브라우저가 요청할 때만 권한을 허용하세요.', '단위, 시간, 볼륨, 감도, 테스트 모드처럼 화면에 보이는 옵션을 조정하세요.', '테스트를 실행하고 결과를 확인한 뒤, 장치·모니터·브라우저를 바꾸면 다시 테스트하세요.'],
                'tips_title' => '더 정확한 결과를 위한 팁',
                'tips' => ['화면 크기나 실제 치수와 관련된 도구는 브라우저 확대/축소를 100%로 맞추세요.', '성능, FPS, 오디오, 센서를 측정하는 테스트에서는 무거운 탭을 닫아 주세요.', '대부분의 테스트는 로컬에서 실행되므로 새로고침 전에 결과를 기록해 두세요.'],
                'privacy_title' => '개인정보와 호환성',
                'privacy' => '테스트는 현재 장치에서 실행됩니다. 입력값, 센서, 측정 데이터는 페이지에 별도 안내가 없는 한 브라우저 안에서 처리됩니다.',
                'related_title' => '한국어 관련 도구',
                'open' => '도구 열기',
            ],
        ];

        return $text[$locale] ?? $text['es'];
    }
}

if (!function_exists('kbtLocalizedToolSupportCurrentTool')) {
    function kbtLocalizedToolSupportCurrentTool(array $data, string $locale, string $slug): array
    {
        $localeConfig = $data['locales'][$locale] ?? $data['locales']['en'];
        $target = $slug . '.php';

        foreach ($data['tools'] as $tool) {
            $localized = $tool['routes']['localized'] ?? '';
            $english = $tool['routes']['en'] ?? '';
            if ($localized === $target || basename($localized) === $target || basename($english) === $target || $tool['id'] === $slug) {
                $override = $localeConfig['tools'][$tool['id']] ?? [];
                return [
                    'id' => $tool['id'],
                    'category' => $tool['category'] ?? 'utility',
                    'name' => $override['name'] ?? $tool['name'],
                    'description' => $override['description'] ?? ($GLOBALS['pageDescription'] ?? $tool['description']),
                ];
            }
        }

        $title = $GLOBALS['pageTitle'] ?? ucfirst(str_replace('-', ' ', $slug));
        $name = trim(preg_split('/[-|]/u', $title)[0] ?? $title);
        return [
            'id' => $slug,
            'category' => 'utility',
            'name' => $name,
            'description' => $GLOBALS['pageDescription'] ?? '',
        ];
    }
}

if (!function_exists('kbtLocalizedToolSupportHref')) {
    function kbtLocalizedToolSupportHref(array $tool, array $localeConfig, string $locale): string
    {
        if ($locale === 'en') {
            return url($tool['routes']['en'] ?? '');
        }
        $directory = $localeConfig['directory'] ?? '';
        $slug = $tool['routes']['localized'] ?? '';
        if ($slug === '') {
            return url('languages/' . $directory . '/');
        }
        return url('languages/' . $directory . '/' . $slug);
    }
}

if (!function_exists('kbtRenderLocalizedToolSupport')) {
    function kbtRenderLocalizedToolSupport(): void
    {
        $locale = kbtLocalizedToolSupportLocale();
        $labels = kbtLocalizedToolSupportText($locale);
        $dirAttr = ($labels['dir'] ?? 'ltr') === 'rtl' ? ' dir="rtl"' : '';
        $slug = $GLOBALS['localizedToolSlug'] ?? basename($_SERVER['SCRIPT_NAME'] ?? '', '.php');
        $data = getSharedToolListData();
        $localeConfig = $data['locales'][$locale] ?? $data['locales']['en'];
        $current = kbtLocalizedToolSupportCurrentTool($data, $locale, $slug);
        $toolName = $current['name'];
        $description = $GLOBALS['pageDescription'] ?? $current['description'];
        $category = $GLOBALS['localizedRelatedCategory'] ?? $current['category'];
        $categoryMap = ['screen' => 'display', 'webcam' => 'camera'];
        $category = $categoryMap[$category] ?? $category;

        $related = [];
        foreach ($data['tools'] as $tool) {
            if (($tool['id'] ?? '') === $current['id']) {
                continue;
            }
            if (($tool['category'] ?? '') !== $category) {
                continue;
            }
            if (!empty($tool['visible_locales']) && !in_array($locale, $tool['visible_locales'], true)) {
                continue;
            }
            if ($locale !== 'en' && !array_key_exists('localized', $tool['routes'])) {
                continue;
            }
            $override = $localeConfig['tools'][$tool['id']] ?? [];
            $related[] = [
                'href' => kbtLocalizedToolSupportHref($tool, $localeConfig, $locale),
                'name' => $override['name'] ?? $tool['name'],
                'description' => $override['description'] ?? $tool['description'],
            ];
            if (count($related) >= 4) {
                break;
            }
        }
        ?>
        <section class="seo-content localized-tool-support" id="localized-guide"<?php echo $dirAttr; ?>>
          <style>
            .localized-tool-support .localized-related-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:14px;margin-top:16px}
            .localized-tool-support .localized-related-card{display:flex;flex-direction:column;gap:8px;padding:16px;border:1px solid #dbe3ef;border-radius:12px;background:#fff;text-decoration:none;color:#0f172a;box-shadow:0 8px 18px rgba(15,23,42,.06)}
            .localized-tool-support .localized-related-card:hover{border-color:#38bdf8;transform:translateY(-1px)}
            .localized-tool-support .localized-related-card strong{font-size:1rem}
            .localized-tool-support .localized-related-card span{color:#475569;line-height:1.55}
            .localized-tool-support .localized-related-card em{font-style:normal;color:#0369a1;font-weight:700}
            html.dark-theme .localized-tool-support .localized-related-card,[data-theme="dark"] .localized-tool-support .localized-related-card{background:#111827;border-color:#334155;color:#f8fafc}
            html.dark-theme .localized-tool-support .localized-related-card span,[data-theme="dark"] .localized-tool-support .localized-related-card span{color:#cbd5e1}
            html.dark-theme .localized-tool-support .localized-related-card em,[data-theme="dark"] .localized-tool-support .localized-related-card em{color:#7dd3fc}
          </style>
          <div class="container">
            <article class="seo-article">
              <h2><?php echo htmlspecialchars($labels['overview_title'] ? sprintf($labels['overview_title'], $toolName) : $labels['guide_title'], ENT_QUOTES, 'UTF-8'); ?></h2>
              <p><?php echo htmlspecialchars(sprintf($labels['overview'], $toolName), ENT_QUOTES, 'UTF-8'); ?></p>
              <?php if ($description): ?>
                <p><?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?></p>
              <?php endif; ?>
            </article>
            <article class="seo-article">
              <h2><?php echo htmlspecialchars($labels['steps_title'], ENT_QUOTES, 'UTF-8'); ?></h2>
              <ol>
                <?php foreach ($labels['steps'] as $step): ?>
                  <li><?php echo htmlspecialchars($step, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
              </ol>
            </article>
            <article class="seo-article">
              <h2><?php echo htmlspecialchars($labels['tips_title'], ENT_QUOTES, 'UTF-8'); ?></h2>
              <ul>
                <?php foreach ($labels['tips'] as $tip): ?>
                  <li><?php echo htmlspecialchars($tip, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
              </ul>
            </article>
            <article class="seo-article">
              <h2><?php echo htmlspecialchars($labels['privacy_title'], ENT_QUOTES, 'UTF-8'); ?></h2>
              <p><?php echo htmlspecialchars($labels['privacy'], ENT_QUOTES, 'UTF-8'); ?></p>
            </article>
            <?php if ($related): ?>
              <article class="seo-article">
                <h2><?php echo htmlspecialchars($labels['related_title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <div class="localized-related-grid">
                  <?php foreach ($related as $tool): ?>
                    <a class="localized-related-card" href="<?php echo htmlspecialchars($tool['href'], ENT_QUOTES, 'UTF-8'); ?>">
                      <strong><?php echo htmlspecialchars($tool['name'], ENT_QUOTES, 'UTF-8'); ?></strong>
                      <span><?php echo htmlspecialchars($tool['description'], ENT_QUOTES, 'UTF-8'); ?></span>
                      <em><?php echo htmlspecialchars($labels['open'], ENT_QUOTES, 'UTF-8'); ?></em>
                    </a>
                  <?php endforeach; ?>
                </div>
              </article>
            <?php endif; ?>
          </div>
        </section>
        <?php
    }
}

kbtRenderLocalizedToolSupport();
