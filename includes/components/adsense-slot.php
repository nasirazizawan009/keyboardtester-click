<?php

if (!function_exists('kbtGetAdSenseConfig')) {
    function kbtGetAdSenseConfig()
    {
        static $config = null;

        if ($config !== null) {
            return $config;
        }

        $configFile = dirname(__DIR__) . '/adsense-slots.php';
        $config = is_file($configFile) ? include $configFile : [];
        if (!is_array($config)) {
            $config = [];
        }

        $config['client'] = $config['client'] ?? 'ca-pub-7056306765580248';
        $config['slots'] = $config['slots'] ?? [];

        $localConfigFile = dirname(__DIR__) . '/adsense-slots.local.php';
        if (is_file($localConfigFile)) {
            $localConfig = include $localConfigFile;
            if (is_array($localConfig)) {
                if (!empty($localConfig['client'])) {
                    $config['client'] = $localConfig['client'];
                }
                if (!empty($localConfig['slots']) && is_array($localConfig['slots'])) {
                    $config['slots'] = array_merge($config['slots'], $localConfig['slots']);
                }
            }
        }

        $envClient = getenv('KBT_ADSENSE_CLIENT');
        if (is_string($envClient) && $envClient !== '') {
            $config['client'] = $envClient;
        }

        foreach (array_keys($config['slots']) as $placement) {
            $envName = 'KBT_ADSENSE_SLOT_' . strtoupper($placement);
            $envSlot = getenv($envName);
            if (is_string($envSlot) && $envSlot !== '') {
                $config['slots'][$placement] = $envSlot;
            }
        }

        return $config;
    }
}

if (!function_exists('kbtGetAdSenseSlotId')) {
    function kbtGetAdSenseSlotId($placement)
    {
        $config = kbtGetAdSenseConfig();
        $slotId = $config['slots'][$placement] ?? '';
        return is_scalar($slotId) ? trim((string) $slotId) : '';
    }
}

if (!function_exists('kbtHasConfiguredAdSenseSlots')) {
    function kbtHasConfiguredAdSenseSlots()
    {
        $config = kbtGetAdSenseConfig();
        foreach (($config['slots'] ?? []) as $slotId) {
            if (trim((string) $slotId) !== '') {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('kbtHouseAdUrl')) {
    function kbtHouseAdUrl($placement = 'site_house_ad', $package = 'three_month', $locale = '')
    {
        $placement = preg_replace('/[^a-z0-9_-]+/i', '-', (string) $placement);
        $placement = trim($placement, '-');
        if ($placement === '') {
            $placement = 'site_house_ad';
        }

        $package = preg_replace('/[^a-z0-9_-]+/i', '-', (string) $package);
        $package = trim($package, '-');
        if ($package === '') {
            $package = 'three_month';
        }

        $query = [
            'placement' => $placement,
            'package' => $package,
        ];

        $locale = kbtAdNormalizeLocale($locale);
        if ($locale !== 'en') {
            $query['locale'] = $locale;
        }

        $path = 'advertise.php?' . http_build_query($query);
        return function_exists('url') ? url($path) : '/' . $path;
    }
}

if (!function_exists('kbtAdInquiryPrivateEnv')) {
    function kbtAdInquiryPrivateEnvPaths()
    {
        $publicRoot = dirname(__DIR__, 2);
        return [
            dirname($publicRoot) . DIRECTORY_SEPARATOR . 'private-config' . DIRECTORY_SEPARATOR . '.env',
            $publicRoot . DIRECTORY_SEPARATOR . '.env',
        ];
    }

    function kbtAdInquiryPrivateEnv($key)
    {
        $value = getenv($key);
        if (is_string($value) && trim($value) !== '') {
            return trim($value);
        }

        foreach (kbtAdInquiryPrivateEnvPaths() as $envPath) {
            if (!is_readable($envPath)) {
                continue;
            }

            $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (!$lines) {
                continue;
            }

            foreach ($lines as $line) {
                $line = trim($line);
                if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) {
                    continue;
                }
                [$envKey, $envValue] = array_map('trim', explode('=', $line, 2));
                if ($envKey === $key) {
                    return trim($envValue, "\"' ");
                }
            }
        }

        return '';
    }
}

if (!function_exists('kbtAdInquirySecret')) {
    function kbtAdInquirySecret()
    {
        $secret = kbtAdInquiryPrivateEnv('KBT_AD_INQUIRY_SECRET');
        if ($secret !== '') {
            return $secret;
        }

        $apiFile = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'api' . DIRECTORY_SEPARATOR . 'send-ad-inquiry.php';
        return hash('sha256', $apiFile . '|' . ($_SERVER['SERVER_NAME'] ?? 'keyboardtester.click'));
    }
}

if (!function_exists('kbtAdInquiryBuildCaptchaToken')) {
    function kbtAdInquiryBuildCaptchaToken($answer)
    {
        $answer = (string) (int) $answer;
        $expires = time() + 3600;
        $nonce = bin2hex(random_bytes(12));
        $payload = $answer . '|' . $expires . '|' . $nonce;
        $signature = hash_hmac('sha256', $payload, kbtAdInquirySecret());

        return base64_encode(json_encode([
            'answer' => $answer,
            'expires' => $expires,
            'nonce' => $nonce,
            'signature' => $signature,
        ]));
    }
}

if (!function_exists('kbtAdNormalizeLocale')) {
    function kbtAdNormalizeLocale($locale)
    {
        $locale = strtolower(substr((string) $locale, 0, 2));
        $supported = ['en', 'es', 'fr', 'de', 'pt', 'ar', 'ru', 'ja', 'ko'];
        return in_array($locale, $supported, true) ? $locale : 'en';
    }
}

if (!function_exists('kbtAdCurrentLocale')) {
    function kbtAdCurrentLocale(array $options = [])
    {
        if (!empty($options['locale'])) {
            return kbtAdNormalizeLocale($options['locale']);
        }
        if (!empty($GLOBALS['siteChromeLocale'])) {
            return kbtAdNormalizeLocale($GLOBALS['siteChromeLocale']);
        }
        if (!empty($GLOBALS['kbtAdLocale'])) {
            return kbtAdNormalizeLocale($GLOBALS['kbtAdLocale']);
        }

        return 'en';
    }
}

if (!function_exists('kbtAdLocalizedContent')) {
    function kbtAdLocalizedContent($locale)
    {
        $locale = kbtAdNormalizeLocale($locale);
        $content = [
            'en' => [
                'default' => [
                    'eyebrow' => 'Ad slot',
                    'title' => 'Sponsor this tool',
                    'body' => 'Direct placement for tool users.',
                    'price' => 'From $59',
                    'term' => 'direct slot',
                    'chip_a' => 'Tool users',
                    'chip_b' => 'Direct',
                    'cta' => 'Book',
                ],
                'hero' => ['title' => 'Your brand here', 'body' => 'Top sponsor placement.', 'chip_a' => 'Top slot', 'chip_b' => 'Direct', 'cta' => 'Book'],
                'rail' => ['title' => 'Side rail slot', 'body' => 'Tall sponsor placement.', 'price' => '$149', 'term' => '90 days', 'chip_a' => 'Rail', 'chip_b' => 'Direct', 'cta' => 'Book'],
                'footer' => ['title' => 'Footer sponsor', 'body' => 'Sitewide sponsor card.', 'chip_a' => 'Footer', 'chip_b' => 'Direct', 'cta' => 'Book'],
                'grid' => ['title' => 'Tool card slot', 'body' => 'Sponsor card in the tool grid.', 'chip_a' => 'Grid', 'chip_b' => 'Direct', 'cta' => 'Book'],
                'after_tool' => ['title' => 'Post-test slot', 'body' => 'Sponsor placement after the tool.', 'chip_a' => 'After test', 'chip_b' => 'Direct', 'cta' => 'Book'],
                'modal' => [
                    'eyebrow' => 'Direct sponsor placement',
                    'title' => 'Advertise with us',
                    'desc' => 'Most users block standard ads. Direct sponsor placements keep your offer visible to real people using our tools.',
                    'close' => 'Close advertising form',
                    'choosePackage' => 'Choose a package',
                    'website' => 'Website',
                    'name' => 'Name',
                    'email' => 'Work email',
                    'company' => 'Company or brand',
                    'url' => 'Target URL',
                    'message' => 'Campaign details',
                    'messagePlaceholder' => 'Product category, preferred start date, ad text, landing page goal, and any creative notes.',
                    'captcha' => 'Security check',
                    'submit' => 'Send advertising request',
                    'sending' => 'Sending request...',
                    'unreadable' => 'The server returned an unreadable response.',
                    'success' => 'Request sent. We will review the campaign fit and reply soon.',
                    'error' => 'Request could not be sent. Please check the fields and try again.',
                    'network' => 'Network error. Please try again.',
                ],
                'packages' => [
                    ['id' => 'one_month', 'label' => '1 month', 'price' => '$59', 'term' => '30 days', 'note' => 'Starter test', 'features' => ['Direct sponsor placement for 30 days', 'One linked creative and short brand line', 'Reviewed for site relevance before publishing']],
                    ['id' => 'three_month', 'label' => '3 months', 'price' => '$149', 'term' => '90 days', 'note' => 'Recommended', 'features' => ['Direct sponsor placement for 90 days', 'One creative refresh during the campaign', 'Better value than month-to-month booking']],
                    ['id' => 'five_month', 'label' => '5 months', 'price' => '$229', 'term' => '150 days', 'note' => 'Best value', 'features' => ['Direct sponsor placement for 150 days', 'Two creative refreshes for seasonal offers', 'Lowest monthly rate in the launch pricing']],
                ],
            ],
            'es' => [
                'default' => ['eyebrow' => 'Anunciate con nosotros', 'title' => 'Llega a usuarios reales', 'body' => 'Muchos anuncios se bloquean. Los patrocinios directos siguen visibles para quienes usan nuestras herramientas.', 'price' => 'Desde $59', 'term' => 'paquetes de 1, 3 y 5 meses', 'chip_a' => 'Anuncio directo', 'chip_b' => 'Sin espacios vacios', 'cta' => 'Abrir formulario'],
                'hero' => ['title' => 'Anunciate aqui', 'body' => 'Los anuncios directos del sitio siguen visibles aunque se bloqueen las redes publicitarias.', 'chip_a' => 'Patrocinador', 'chip_b' => 'Usuarios reales', 'cta' => 'Anunciar aqui'],
                'rail' => ['title' => 'Anuncios visibles', 'body' => 'Muchos usuarios bloquean anuncios normales. Tu oferta queda visible en la pagina.', 'price' => '$149', 'term' => 'paquete lateral de 3 meses', 'chip_a' => 'Lateral directo', 'chip_b' => 'Sin huecos', 'cta' => 'Anunciar'],
                'footer' => ['title' => 'Anunciate en este sitio', 'body' => 'Un panel limpio para marcas que quieren visibilidad aunque se bloqueen anuncios.', 'chip_a' => 'Pie de pagina', 'chip_b' => 'Reserva directa', 'cta' => 'Abrir formulario'],
                'grid' => ['title' => 'Hazte visible aqui', 'body' => 'Las tarjetas directas siguen en el diseno cuando desaparecen los anuncios de red.', 'chip_a' => 'Usuarios de herramientas', 'chip_b' => 'Anuncio directo', 'cta' => 'Anunciar'],
                'after_tool' => ['title' => 'Llega al usuario despues del test', 'body' => 'Los patrocinios directos siguen visibles donde los anuncios normales suelen bloquearse.', 'chip_a' => 'Despues del test', 'chip_b' => 'Ad visible'],
                'modal' => ['eyebrow' => 'Patrocinio directo', 'title' => 'Anunciate con nosotros', 'desc' => 'Muchos usuarios bloquean anuncios normales. Los patrocinios directos mantienen tu oferta visible para usuarios reales.', 'close' => 'Cerrar formulario de publicidad', 'choosePackage' => 'Elige un paquete', 'website' => 'Sitio web', 'name' => 'Nombre', 'email' => 'Email de trabajo', 'company' => 'Empresa o marca', 'url' => 'URL de destino', 'message' => 'Detalles de la campana', 'messagePlaceholder' => 'Categoria del producto, fecha de inicio, texto del anuncio, objetivo y notas creativas.', 'captcha' => 'Verificacion de seguridad', 'submit' => 'Enviar solicitud de publicidad', 'sending' => 'Enviando solicitud...', 'unreadable' => 'El servidor devolvio una respuesta no legible.', 'success' => 'Solicitud enviada. Revisaremos el encaje de la campana y responderemos pronto.', 'error' => 'No se pudo enviar la solicitud. Revisa los campos e intentalo de nuevo.', 'network' => 'Error de red. Intentalo de nuevo.'],
                'packages' => [
                    ['id' => 'one_month', 'label' => '1 mes', 'price' => '$59', 'term' => '30 dias', 'note' => 'Prueba inicial', 'features' => ['Patrocinio directo durante 30 dias', 'Una creatividad enlazada y una linea de marca', 'Revision de relevancia antes de publicar']],
                    ['id' => 'three_month', 'label' => '3 meses', 'price' => '$149', 'term' => '90 dias', 'note' => 'Recomendado', 'features' => ['Patrocinio directo durante 90 dias', 'Una actualizacion creativa durante la campana', 'Mejor valor que reservar mes a mes']],
                    ['id' => 'five_month', 'label' => '5 meses', 'price' => '$229', 'term' => '150 dias', 'note' => 'Mejor valor', 'features' => ['Patrocinio directo durante 150 dias', 'Dos actualizaciones creativas para ofertas de temporada', 'Menor costo mensual en precio de lanzamiento']],
                ],
            ],
            'fr' => [
                'default' => ['eyebrow' => 'Annoncez avec nous', 'title' => 'Touchez de vrais utilisateurs', 'body' => 'Beaucoup de pubs sont bloquees. Les placements directs restent visibles pour les personnes qui utilisent nos outils.', 'price' => 'Des $59', 'term' => 'forfaits 1, 3 et 5 mois', 'chip_a' => 'Annonce directe', 'chip_b' => 'Pas de vide', 'cta' => 'Ouvrir le formulaire'],
                'hero' => ['title' => 'Annoncez ici', 'body' => 'Les annonces directes restent visibles meme quand les reseaux publicitaires sont bloques.', 'chip_a' => 'Sponsor du site', 'chip_b' => 'Vrais utilisateurs', 'cta' => 'Annoncez ici'],
                'rail' => ['title' => 'Des annonces visibles', 'body' => 'Beaucoup d utilisateurs bloquent les pubs classiques. Votre offre reste sur la page.', 'price' => '$149', 'term' => 'forfait lateral 3 mois', 'chip_a' => 'Rail direct', 'chip_b' => 'Sans trou ad-block', 'cta' => 'Annoncez'],
                'footer' => ['title' => 'Annoncez sur ce site', 'body' => 'Un panneau sponsor propre pour les marques qui veulent rester visibles.', 'chip_a' => 'Emplacement pied', 'chip_b' => 'Reservation directe', 'cta' => 'Ouvrir'],
                'grid' => ['title' => 'Soyez vu ici', 'body' => 'Les cartes sponsor directes restent dans la mise en page quand les pubs reseau disparaissent.', 'chip_a' => 'Utilisateurs outils', 'chip_b' => 'Annonce directe', 'cta' => 'Annoncez'],
                'after_tool' => ['title' => 'Touchez l utilisateur apres le test', 'body' => 'Les sponsors directs restent visibles la ou les pubs normales sont souvent bloquees.', 'chip_a' => 'Apres le test', 'chip_b' => 'Visible'],
                'modal' => ['eyebrow' => 'Placement sponsor direct', 'title' => 'Annoncez avec nous', 'desc' => 'Beaucoup d utilisateurs bloquent les pubs classiques. Les placements directs gardent votre offre visible.', 'close' => 'Fermer le formulaire publicitaire', 'choosePackage' => 'Choisir un forfait', 'website' => 'Site web', 'name' => 'Nom', 'email' => 'Email professionnel', 'company' => 'Entreprise ou marque', 'url' => 'URL cible', 'message' => 'Details de campagne', 'messagePlaceholder' => 'Categorie produit, date de debut souhaitee, texte annonce, objectif et notes creatives.', 'captcha' => 'Verification de securite', 'submit' => 'Envoyer la demande', 'sending' => 'Envoi en cours...', 'unreadable' => 'Le serveur a renvoye une reponse illisible.', 'success' => 'Demande envoyee. Nous verifierons la pertinence et repondrons bientot.', 'error' => 'La demande n a pas pu etre envoyee. Verifiez les champs et reessayez.', 'network' => 'Erreur reseau. Reessayez.'],
                'packages' => [
                    ['id' => 'one_month', 'label' => '1 mois', 'price' => '$59', 'term' => '30 jours', 'note' => 'Test de depart', 'features' => ['Placement sponsor direct pendant 30 jours', 'Une creation liee et une courte ligne de marque', 'Verification de pertinence avant publication']],
                    ['id' => 'three_month', 'label' => '3 mois', 'price' => '$149', 'term' => '90 jours', 'note' => 'Recommande', 'features' => ['Placement sponsor direct pendant 90 jours', 'Une actualisation creative pendant la campagne', 'Meilleur rapport valeur que le mois par mois']],
                    ['id' => 'five_month', 'label' => '5 mois', 'price' => '$229', 'term' => '150 jours', 'note' => 'Meilleure valeur', 'features' => ['Placement sponsor direct pendant 150 jours', 'Deux actualisations creatives pour offres saisonnieres', 'Tarif mensuel le plus bas au lancement']],
                ],
            ],
            'de' => [
                'default' => ['eyebrow' => 'Bei uns werben', 'title' => 'Echte Nutzer erreichen', 'body' => 'Viele Anzeigen werden blockiert. Direkte Sponsor-Platzierungen bleiben fur Tool-Nutzer sichtbar.', 'price' => 'Ab $59', 'term' => 'Pakete fur 1, 3 und 5 Monate', 'chip_a' => 'Direkte Anzeige', 'chip_b' => 'Keine leeren Boxen', 'cta' => 'Formular offnen'],
                'hero' => ['title' => 'Hier werben', 'body' => 'Direkte Site-Anzeigen bleiben sichtbar, auch wenn Werbenetzwerke blockiert sind.', 'chip_a' => 'Site-Sponsor', 'chip_b' => 'Echte Nutzer', 'cta' => 'Hier werben'],
                'rail' => ['title' => 'Anzeigen, die sichtbar bleiben', 'body' => 'Viele Nutzer blockieren normale Anzeigen. Deine Botschaft bleibt auf der Seite.', 'price' => '$149', 'term' => '3-Monats-Seitenpaket', 'chip_a' => 'Direkter Rail', 'chip_b' => 'Kein Adblock-Loch', 'cta' => 'Werben'],
                'footer' => ['title' => 'Auf dieser Seite werben', 'body' => 'Ein klares Sponsor-Feld fur Marken, die sichtbar bleiben wollen.', 'chip_a' => 'Footer Slot', 'chip_b' => 'Direkt buchen', 'cta' => 'Formular'],
                'grid' => ['title' => 'Hier sichtbar sein', 'body' => 'Direkte Sponsorkarten bleiben im Layout, wenn Netzwerk-Anzeigen verschwinden.', 'chip_a' => 'Tool-Nutzer', 'chip_b' => 'Direktanzeige', 'cta' => 'Werben'],
                'after_tool' => ['title' => 'Nutzer nach dem Test erreichen', 'body' => 'Direkte Sponsor-Anzeigen bleiben sichtbar, wo normale Anzeigen oft blockiert werden.', 'chip_a' => 'Nach dem Test', 'chip_b' => 'Sichtbar'],
                'modal' => ['eyebrow' => 'Direkte Sponsor-Platzierung', 'title' => 'Bei uns werben', 'desc' => 'Viele Nutzer blockieren Standardanzeigen. Direkte Platzierungen halten dein Angebot sichtbar.', 'close' => 'Werbeformular schliessen', 'choosePackage' => 'Paket wahlen', 'website' => 'Website', 'name' => 'Name', 'email' => 'Geschaftliche E-Mail', 'company' => 'Firma oder Marke', 'url' => 'Ziel-URL', 'message' => 'Kampagnendetails', 'messagePlaceholder' => 'Produktkategorie, Starttermin, Anzeigentext, Zielseite und Kreativnotizen.', 'captcha' => 'Sicherheitsprufung', 'submit' => 'Werbeanfrage senden', 'sending' => 'Anfrage wird gesendet...', 'unreadable' => 'Der Server gab eine unlesbare Antwort zuruck.', 'success' => 'Anfrage gesendet. Wir prufen die Kampagne und antworten bald.', 'error' => 'Anfrage konnte nicht gesendet werden. Bitte Felder prufen und erneut versuchen.', 'network' => 'Netzwerkfehler. Bitte erneut versuchen.'],
                'packages' => [
                    ['id' => 'one_month', 'label' => '1 Monat', 'price' => '$59', 'term' => '30 Tage', 'note' => 'Starttest', 'features' => ['Direkte Sponsor-Platzierung fur 30 Tage', 'Eine verlinkte Kreativflache und kurze Markenzeile', 'Relevanzprufung vor Veroffentlichung']],
                    ['id' => 'three_month', 'label' => '3 Monate', 'price' => '$149', 'term' => '90 Tage', 'note' => 'Empfohlen', 'features' => ['Direkte Sponsor-Platzierung fur 90 Tage', 'Eine Kreativ-Aktualisierung in der Kampagne', 'Besserer Wert als monatliche Buchung']],
                    ['id' => 'five_month', 'label' => '5 Monate', 'price' => '$229', 'term' => '150 Tage', 'note' => 'Bester Wert', 'features' => ['Direkte Sponsor-Platzierung fur 150 Tage', 'Zwei Kreativ-Aktualisierungen fur saisonale Angebote', 'Niedrigster Monatswert im Startpreis']],
                ],
            ],
            'pt' => [
                'default' => ['eyebrow' => 'Anuncie conosco', 'title' => 'Alcance usuarios reais', 'body' => 'Muitos anuncios sao bloqueados. Patrocinios diretos continuam visiveis para quem usa nossas ferramentas.', 'price' => 'A partir de $59', 'term' => 'pacotes de 1, 3 e 5 meses', 'chip_a' => 'Anuncio direto', 'chip_b' => 'Sem espaco vazio', 'cta' => 'Abrir formulario'],
                'hero' => ['title' => 'Anuncie aqui', 'body' => 'Anuncios diretos do site continuam visiveis mesmo com bloqueadores de redes de anuncios.', 'chip_a' => 'Patrocinador', 'chip_b' => 'Usuarios reais', 'cta' => 'Anunciar aqui'],
                'rail' => ['title' => 'Anuncios visiveis', 'body' => 'Muitos usuarios bloqueiam anuncios comuns. Sua oferta permanece na pagina.', 'price' => '$149', 'term' => 'pacote lateral de 3 meses', 'chip_a' => 'Lateral direto', 'chip_b' => 'Sem lacuna', 'cta' => 'Anunciar'],
                'footer' => ['title' => 'Anuncie neste site', 'body' => 'Um painel limpo para marcas que querem visibilidade alem dos bloqueadores.', 'chip_a' => 'Rodape', 'chip_b' => 'Reserva direta', 'cta' => 'Abrir'],
                'grid' => ['title' => 'Apareca aqui', 'body' => 'Cartoes de patrocinio direto ficam no layout quando anuncios de rede somem.', 'chip_a' => 'Usuarios de ferramentas', 'chip_b' => 'Anuncio direto', 'cta' => 'Anunciar'],
                'after_tool' => ['title' => 'Alcance usuarios apos o teste', 'body' => 'Patrocinios diretos continuam visiveis onde anuncios normais costumam ser bloqueados.', 'chip_a' => 'Apos o teste', 'chip_b' => 'Visivel'],
                'modal' => ['eyebrow' => 'Patrocinio direto', 'title' => 'Anuncie conosco', 'desc' => 'Muitos usuarios bloqueiam anuncios comuns. Patrocinios diretos mantem sua oferta visivel.', 'close' => 'Fechar formulario de anuncio', 'choosePackage' => 'Escolha um pacote', 'website' => 'Site', 'name' => 'Nome', 'email' => 'Email profissional', 'company' => 'Empresa ou marca', 'url' => 'URL de destino', 'message' => 'Detalhes da campanha', 'messagePlaceholder' => 'Categoria do produto, data desejada, texto do anuncio, objetivo e notas criativas.', 'captcha' => 'Verificacao de seguranca', 'submit' => 'Enviar pedido de anuncio', 'sending' => 'Enviando pedido...', 'unreadable' => 'O servidor retornou uma resposta ilegivel.', 'success' => 'Pedido enviado. Vamos revisar o encaixe da campanha e responder em breve.', 'error' => 'Nao foi possivel enviar o pedido. Verifique os campos e tente novamente.', 'network' => 'Erro de rede. Tente novamente.'],
                'packages' => [
                    ['id' => 'one_month', 'label' => '1 mes', 'price' => '$59', 'term' => '30 dias', 'note' => 'Teste inicial', 'features' => ['Patrocinio direto por 30 dias', 'Uma arte com link e uma linha curta da marca', 'Revisao de relevancia antes da publicacao']],
                    ['id' => 'three_month', 'label' => '3 meses', 'price' => '$149', 'term' => '90 dias', 'note' => 'Recomendado', 'features' => ['Patrocinio direto por 90 dias', 'Uma atualizacao criativa durante a campanha', 'Melhor valor que reservar mes a mes']],
                    ['id' => 'five_month', 'label' => '5 meses', 'price' => '$229', 'term' => '150 dias', 'note' => 'Melhor valor', 'features' => ['Patrocinio direto por 150 dias', 'Duas atualizacoes criativas para ofertas sazonais', 'Menor taxa mensal no preco de lancamento']],
                ],
            ],
            'ar' => [
                'default' => ['eyebrow' => 'أعلن معنا', 'title' => 'صل إلى مستخدمين حقيقيين', 'body' => 'كثير من الإعلانات يتم حظره. الرعاية المباشرة تبقى ظاهرة لمن يستخدم أدواتنا.', 'price' => 'من $59', 'term' => 'باقات 1 و 3 و 5 أشهر', 'chip_a' => 'إعلان مباشر', 'chip_b' => 'بدون مساحات فارغة', 'cta' => 'افتح النموذج'],
                'hero' => ['title' => 'أعلن هنا', 'body' => 'إعلانات الموقع المباشرة تبقى ظاهرة حتى عند حظر شبكات الإعلانات.', 'chip_a' => 'راعي الموقع', 'chip_b' => 'مستخدمون حقيقيون', 'cta' => 'أعلن هنا'],
                'rail' => ['title' => 'إعلانات تبقى ظاهرة', 'body' => 'كثير من المستخدمين يحظرون الإعلانات العادية. عرضك يبقى داخل الصفحة.', 'price' => '$149', 'term' => 'باقة جانبية 3 أشهر', 'chip_a' => 'مسار مباشر', 'chip_b' => 'بدون فجوة', 'cta' => 'أعلن'],
                'footer' => ['title' => 'أعلن على هذا الموقع', 'body' => 'مساحة رعاية نظيفة للعلامات التي تريد الظهور رغم الحظر.', 'chip_a' => 'مساحة التذييل', 'chip_b' => 'حجز مباشر', 'cta' => 'افتح النموذج'],
                'grid' => ['title' => 'اظهر هنا', 'body' => 'بطاقات الرعاية المباشرة تبقى في التخطيط عندما تختفي إعلانات الشبكات.', 'chip_a' => 'مستخدمو الأدوات', 'chip_b' => 'إعلان مباشر', 'cta' => 'أعلن'],
                'after_tool' => ['title' => 'صل إلى المستخدم بعد الاختبار', 'body' => 'الرعاية المباشرة تبقى ظاهرة حيث يتم غالبا حظر الإعلانات العادية.', 'chip_a' => 'بعد الاختبار', 'chip_b' => 'إعلان ظاهر'],
                'modal' => ['eyebrow' => 'رعاية مباشرة', 'title' => 'أعلن معنا', 'desc' => 'كثير من المستخدمين يحظرون الإعلانات العادية. الرعاية المباشرة تجعل عرضك ظاهرا للمستخدمين الحقيقيين.', 'close' => 'إغلاق نموذج الإعلان', 'choosePackage' => 'اختر باقة', 'website' => 'الموقع', 'name' => 'الاسم', 'email' => 'بريد العمل', 'company' => 'الشركة أو العلامة', 'url' => 'رابط الوجهة', 'message' => 'تفاصيل الحملة', 'messagePlaceholder' => 'فئة المنتج، تاريخ البدء، نص الإعلان، هدف الصفحة، وأي ملاحظات للتصميم.', 'captcha' => 'تحقق أمني', 'submit' => 'إرسال طلب الإعلان', 'sending' => 'جاري إرسال الطلب...', 'unreadable' => 'أعاد الخادم ردا غير مقروء.', 'success' => 'تم إرسال الطلب. سنراجع ملاءمة الحملة ونرد قريبا.', 'error' => 'تعذر إرسال الطلب. راجع الحقول وحاول مرة أخرى.', 'network' => 'خطأ في الشبكة. حاول مرة أخرى.'],
                'packages' => [
                    ['id' => 'one_month', 'label' => 'شهر واحد', 'price' => '$59', 'term' => '30 يوما', 'note' => 'اختبار أولي', 'features' => ['رعاية مباشرة لمدة 30 يوما', 'تصميم واحد برابط وسطر قصير للعلامة', 'مراجعة الملاءمة قبل النشر']],
                    ['id' => 'three_month', 'label' => '3 أشهر', 'price' => '$149', 'term' => '90 يوما', 'note' => 'موصى به', 'features' => ['رعاية مباشرة لمدة 90 يوما', 'تحديث تصميم واحد أثناء الحملة', 'قيمة أفضل من الحجز الشهري']],
                    ['id' => 'five_month', 'label' => '5 أشهر', 'price' => '$229', 'term' => '150 يوما', 'note' => 'أفضل قيمة', 'features' => ['رعاية مباشرة لمدة 150 يوما', 'تحديثان للتصميم للعروض الموسمية', 'أقل تكلفة شهرية ضمن سعر الإطلاق']],
                ],
            ],
            'ru' => [
                'default' => ['eyebrow' => 'Реклама у нас', 'title' => 'Достигайте реальных пользователей', 'body' => 'Многие объявления блокируются. Прямые спонсорские места остаются видимыми для пользователей инструментов.', 'price' => 'От $59', 'term' => 'пакеты на 1, 3 и 5 месяцев', 'chip_a' => 'Прямая реклама', 'chip_b' => 'Без пустых блоков', 'cta' => 'Открыть форму'],
                'hero' => ['title' => 'Разместите рекламу здесь', 'body' => 'Прямая реклама сайта остается видимой, даже если рекламные сети заблокированы.', 'chip_a' => 'Спонсор сайта', 'chip_b' => 'Реальные пользователи', 'cta' => 'Разместить'],
                'rail' => ['title' => 'Реклама, которая видна', 'body' => 'Многие пользователи блокируют обычную рекламу. Ваше предложение остается на странице.', 'price' => '$149', 'term' => 'боковой пакет на 3 месяца', 'chip_a' => 'Прямой блок', 'chip_b' => 'Без разрыва', 'cta' => 'Реклама'],
                'footer' => ['title' => 'Реклама на этом сайте', 'body' => 'Чистая спонсорская панель для брендов, которым нужна видимость.', 'chip_a' => 'Нижний блок', 'chip_b' => 'Прямое бронирование', 'cta' => 'Открыть'],
                'grid' => ['title' => 'Будьте видны здесь', 'body' => 'Прямые спонсорские карточки остаются в макете, когда сетевая реклама исчезает.', 'chip_a' => 'Пользователи инструментов', 'chip_b' => 'Прямая реклама', 'cta' => 'Реклама'],
                'after_tool' => ['title' => 'Охват после теста', 'body' => 'Прямая реклама остается видимой там, где обычные объявления часто блокируются.', 'chip_a' => 'После теста', 'chip_b' => 'Видимый блок'],
                'modal' => ['eyebrow' => 'Прямое спонсорское размещение', 'title' => 'Разместите рекламу у нас', 'desc' => 'Многие пользователи блокируют стандартную рекламу. Прямые размещения сохраняют ваше предложение видимым.', 'close' => 'Закрыть рекламную форму', 'choosePackage' => 'Выберите пакет', 'website' => 'Сайт', 'name' => 'Имя', 'email' => 'Рабочая почта', 'company' => 'Компания или бренд', 'url' => 'Целевой URL', 'message' => 'Детали кампании', 'messagePlaceholder' => 'Категория продукта, дата запуска, текст рекламы, цель страницы и креативные заметки.', 'captcha' => 'Проверка безопасности', 'submit' => 'Отправить заявку', 'sending' => 'Отправка заявки...', 'unreadable' => 'Сервер вернул нечитаемый ответ.', 'success' => 'Заявка отправлена. Мы проверим соответствие кампании и скоро ответим.', 'error' => 'Не удалось отправить заявку. Проверьте поля и попробуйте снова.', 'network' => 'Ошибка сети. Попробуйте снова.'],
                'packages' => [
                    ['id' => 'one_month', 'label' => '1 месяц', 'price' => '$59', 'term' => '30 дней', 'note' => 'Стартовый тест', 'features' => ['Прямое спонсорское размещение на 30 дней', 'Один креатив со ссылкой и короткой строкой бренда', 'Проверка релевантности перед публикацией']],
                    ['id' => 'three_month', 'label' => '3 месяца', 'price' => '$149', 'term' => '90 дней', 'note' => 'Рекомендуем', 'features' => ['Прямое спонсорское размещение на 90 дней', 'Одно обновление креатива в течение кампании', 'Выгоднее, чем помесячное бронирование']],
                    ['id' => 'five_month', 'label' => '5 месяцев', 'price' => '$229', 'term' => '150 дней', 'note' => 'Лучшая цена', 'features' => ['Прямое спонсорское размещение на 150 дней', 'Два обновления креатива для сезонных предложений', 'Самая низкая месячная ставка в стартовой цене']],
                ],
            ],
            'ja' => [
                'default' => ['eyebrow' => '広告掲載について', 'title' => '実ユーザーに届く広告', 'body' => '多くの広告はブロックされます。直接スポンサー枠ならツール利用者に表示され続けます。', 'price' => '$59から', 'term' => '1、3、5か月プラン', 'chip_a' => '直接広告', 'chip_b' => '空白なし', 'cta' => 'フォームを開く'],
                'hero' => ['title' => 'ここに広告掲載', 'body' => '広告ネットワークがブロックされても、直接掲載はページ上に残ります。', 'chip_a' => 'サイトスポンサー', 'chip_b' => '実ユーザー', 'cta' => '掲載する'],
                'rail' => ['title' => '表示され続ける広告', 'body' => '通常広告をブロックするユーザーにも、直接枠なら訴求が残ります。', 'price' => '$149', 'term' => '3か月サイド枠', 'chip_a' => '直接サイド枠', 'chip_b' => '空白なし', 'cta' => '広告掲載'],
                'footer' => ['title' => 'このサイトに広告掲載', 'body' => 'ブロックされにくい、見やすいスポンサー枠です。', 'chip_a' => 'フッター枠', 'chip_b' => '直接予約', 'cta' => '開く'],
                'grid' => ['title' => 'ここで見つけてもらう', 'body' => 'ネットワーク広告が消えても、直接スポンサー枠はレイアウト内に残ります。', 'chip_a' => 'ツール利用者', 'chip_b' => '直接広告', 'cta' => '掲載'],
                'after_tool' => ['title' => 'テスト後のユーザーに届く', 'body' => '通常広告がブロックされる場所でも、直接スポンサー広告は表示されます。', 'chip_a' => 'テスト後', 'chip_b' => '表示枠'],
                'modal' => ['eyebrow' => '直接スポンサー枠', 'title' => '広告掲載について', 'desc' => '多くのユーザーは標準広告をブロックします。直接スポンサー枠なら実ユーザーに表示されます。', 'close' => '広告フォームを閉じる', 'choosePackage' => 'プランを選択', 'website' => 'Webサイト', 'name' => '名前', 'email' => '仕事用メール', 'company' => '会社またはブランド', 'url' => 'リンク先URL', 'message' => 'キャンペーン詳細', 'messagePlaceholder' => '商品カテゴリ、希望開始日、広告文、リンク先の目的、クリエイティブのメモ。', 'captcha' => 'セキュリティ確認', 'submit' => '広告リクエストを送信', 'sending' => '送信中...', 'unreadable' => 'サーバーの応答を読み取れませんでした。', 'success' => 'リクエストを送信しました。内容を確認して返信します。', 'error' => '送信できませんでした。入力内容を確認してもう一度お試しください。', 'network' => 'ネットワークエラーです。もう一度お試しください。'],
                'packages' => [
                    ['id' => 'one_month', 'label' => '1か月', 'price' => '$59', 'term' => '30日', 'note' => 'お試し', 'features' => ['30日間の直接スポンサー掲載', 'リンク付きクリエイティブ1点と短いブランド文', '公開前にサイト関連性を確認']],
                    ['id' => 'three_month', 'label' => '3か月', 'price' => '$149', 'term' => '90日', 'note' => 'おすすめ', 'features' => ['90日間の直接スポンサー掲載', '期間中にクリエイティブを1回更新', '月ごとの予約より高い価値']],
                    ['id' => 'five_month', 'label' => '5か月', 'price' => '$229', 'term' => '150日', 'note' => '最良価格', 'features' => ['150日間の直接スポンサー掲載', '季節オファー向けに2回更新', '開始価格で最も低い月額']],
                ],
            ],
            'ko' => [
                'default' => ['eyebrow' => '광고 문의', 'title' => '실제 사용자에게 도달', 'body' => '많은 광고가 차단됩니다. 직접 스폰서 광고는 도구를 쓰는 사용자에게 계속 보입니다.', 'price' => '$59부터', 'term' => '1, 3, 5개월 패키지', 'chip_a' => '직접 광고', 'chip_b' => '빈 박스 없음', 'cta' => '폼 열기'],
                'hero' => ['title' => '여기에 광고하기', 'body' => '광고 네트워크가 차단되어도 직접 광고는 페이지에 남아 있습니다.', 'chip_a' => '사이트 스폰서', 'chip_b' => '실제 사용자', 'cta' => '광고하기'],
                'rail' => ['title' => '계속 보이는 광고', 'body' => '많은 사용자가 일반 광고를 차단합니다. 직접 배치는 제안을 페이지에 유지합니다.', 'price' => '$149', 'term' => '3개월 사이드 패키지', 'chip_a' => '직접 레일', 'chip_b' => '차단 공백 없음', 'cta' => '광고'],
                'footer' => ['title' => '이 사이트에 광고하기', 'body' => '차단을 넘어 보이길 원하는 브랜드를 위한 깔끔한 스폰서 영역입니다.', 'chip_a' => '푸터 슬롯', 'chip_b' => '직접 예약', 'cta' => '열기'],
                'grid' => ['title' => '여기에서 노출', 'body' => '네트워크 광고가 사라져도 직접 스폰서 카드는 레이아웃에 남습니다.', 'chip_a' => '도구 사용자', 'chip_b' => '직접 광고', 'cta' => '광고'],
                'after_tool' => ['title' => '테스트 후 사용자에게 도달', 'body' => '일반 광고가 차단되는 위치에서도 직접 스폰서 광고는 보입니다.', 'chip_a' => '테스트 후', 'chip_b' => '보이는 광고'],
                'modal' => ['eyebrow' => '직접 스폰서 배치', 'title' => '광고 문의', 'desc' => '많은 사용자가 일반 광고를 차단합니다. 직접 스폰서 배치는 실제 사용자에게 계속 보입니다.', 'close' => '광고 양식 닫기', 'choosePackage' => '패키지 선택', 'website' => '웹사이트', 'name' => '이름', 'email' => '업무용 이메일', 'company' => '회사 또는 브랜드', 'url' => '대상 URL', 'message' => '캠페인 세부 정보', 'messagePlaceholder' => '제품 카테고리, 시작 희망일, 광고 문구, 랜딩 목표, 크리에이티브 메모.', 'captcha' => '보안 확인', 'submit' => '광고 요청 보내기', 'sending' => '요청 보내는 중...', 'unreadable' => '서버 응답을 읽을 수 없습니다.', 'success' => '요청을 보냈습니다. 캠페인 적합성을 검토하고 곧 답장하겠습니다.', 'error' => '요청을 보낼 수 없습니다. 입력 항목을 확인하고 다시 시도하세요.', 'network' => '네트워크 오류입니다. 다시 시도하세요.'],
                'packages' => [
                    ['id' => 'one_month', 'label' => '1개월', 'price' => '$59', 'term' => '30일', 'note' => '시작 테스트', 'features' => ['30일 직접 스폰서 배치', '링크된 크리에이티브 1개와 짧은 브랜드 문구', '게시 전 사이트 관련성 검토']],
                    ['id' => 'three_month', 'label' => '3개월', 'price' => '$149', 'term' => '90일', 'note' => '추천', 'features' => ['90일 직접 스폰서 배치', '캠페인 중 크리에이티브 1회 교체', '월별 예약보다 더 좋은 가치']],
                    ['id' => 'five_month', 'label' => '5개월', 'price' => '$229', 'term' => '150일', 'note' => '최고 가치', 'features' => ['150일 직접 스폰서 배치', '시즌 오퍼용 크리에이티브 2회 교체', '출시 가격 중 가장 낮은 월 단가']],
                ],
            ],
        ];

        return $content[$locale] ?? $content['en'];
    }
}

if (!function_exists('kbtAdInquiryPackages')) {
    function kbtAdInquiryPackages($locale = 'en')
    {
        $copy = kbtAdLocalizedContent($locale);
        return $copy['packages'];
    }
}

if (!function_exists('kbtRenderAdInquiryModal')) {
    function kbtRenderAdInquiryModal(array $options = [])
    {
        static $rendered = false;
        if ($rendered) {
            return;
        }
        $rendered = true;

        $locale = kbtAdCurrentLocale($options);
        $localized = kbtAdLocalizedContent($locale);
        $modal = $localized['modal'];
        $packages = kbtAdInquiryPackages($locale);
        $dir = $locale === 'ar' ? 'rtl' : 'ltr';
        $statusMessages = [
            'sending' => $modal['sending'],
            'unreadable' => $modal['unreadable'],
            'success' => $modal['success'],
            'error' => $modal['error'],
            'network' => $modal['network'],
        ];
        $captchaLeft = random_int(4, 12);
        $captchaRight = random_int(2, 9);
        $captchaQuestion = $captchaLeft . ' + ' . $captchaRight;
        $captchaToken = kbtAdInquiryBuildCaptchaToken($captchaLeft + $captchaRight);
        $action = function_exists('url') ? url('api/send-ad-inquiry.php') : '/api/send-ad-inquiry.php';
        ?>
<div class="kbt-ad-modal" id="advertise-with-us" data-kbt-ad-modal hidden>
    <div class="kbt-ad-modal__backdrop" data-kbt-ad-close></div>
    <section class="kbt-ad-dialog" role="dialog" aria-modal="true" aria-labelledby="kbt-ad-dialog-title" aria-describedby="kbt-ad-dialog-desc" lang="<?php echo htmlspecialchars($locale, ENT_QUOTES, 'UTF-8'); ?>" dir="<?php echo htmlspecialchars($dir, ENT_QUOTES, 'UTF-8'); ?>">
        <div class="kbt-ad-dialog__head">
            <div>
                <p class="kbt-ad-dialog__eyebrow"><?php echo htmlspecialchars($modal['eyebrow'], ENT_QUOTES, 'UTF-8'); ?></p>
                <h2 id="kbt-ad-dialog-title"><?php echo htmlspecialchars($modal['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <p id="kbt-ad-dialog-desc"><?php echo htmlspecialchars($modal['desc'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <button type="button" class="kbt-ad-close" data-kbt-ad-close aria-label="<?php echo htmlspecialchars($modal['close'], ENT_QUOTES, 'UTF-8'); ?>">
                <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>
        <form class="kbt-ad-form" id="kbt-ad-form" action="<?php echo htmlspecialchars($action, ENT_QUOTES, 'UTF-8'); ?>" method="post" novalidate>
            <input type="hidden" name="captcha_token" value="<?php echo htmlspecialchars($captchaToken, ENT_QUOTES, 'UTF-8'); ?>">
            <input type="hidden" name="placement" id="kbt-ad-placement" value="site_house_ad">
            <div class="kbt-ad-hp" aria-hidden="true">
                <label for="kbt-ad-website-check"><?php echo htmlspecialchars($modal['website'], ENT_QUOTES, 'UTF-8'); ?></label>
                <input type="text" id="kbt-ad-website-check" name="website_check" tabindex="-1" autocomplete="off">
            </div>
            <div class="kbt-ad-form__grid">
                <fieldset class="kbt-ad-packages">
                    <legend class="kbt-ad-package-title"><?php echo htmlspecialchars($modal['choosePackage'], ENT_QUOTES, 'UTF-8'); ?></legend>
                    <?php foreach ($packages as $package): ?>
                        <label class="kbt-ad-package">
                            <input type="radio" name="package" value="<?php echo htmlspecialchars($package['id'], ENT_QUOTES, 'UTF-8'); ?>"<?php echo $package['id'] === 'three_month' ? ' checked' : ''; ?>>
                            <span>
                                <strong><?php echo htmlspecialchars($package['label'] . ' - ' . $package['price'], ENT_QUOTES, 'UTF-8'); ?></strong>
                                <small><?php echo htmlspecialchars($package['term'] . ' / ' . $package['note'], ENT_QUOTES, 'UTF-8'); ?></small>
                                <ul>
                                    <?php foreach ($package['features'] as $feature): ?>
                                        <li><?php echo htmlspecialchars($feature, ENT_QUOTES, 'UTF-8'); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </fieldset>

                <div class="kbt-ad-field">
                    <label for="kbt-ad-name"><?php echo htmlspecialchars($modal['name'], ENT_QUOTES, 'UTF-8'); ?></label>
                    <input type="text" id="kbt-ad-name" name="name" autocomplete="name" required maxlength="90">
                </div>
                <div class="kbt-ad-field">
                    <label for="kbt-ad-email"><?php echo htmlspecialchars($modal['email'], ENT_QUOTES, 'UTF-8'); ?></label>
                    <input type="email" id="kbt-ad-email" name="email" autocomplete="email" required maxlength="140">
                </div>
                <div class="kbt-ad-field">
                    <label for="kbt-ad-company"><?php echo htmlspecialchars($modal['company'], ENT_QUOTES, 'UTF-8'); ?></label>
                    <input type="text" id="kbt-ad-company" name="company" autocomplete="organization" required maxlength="120">
                </div>
                <div class="kbt-ad-field">
                    <label for="kbt-ad-url"><?php echo htmlspecialchars($modal['url'], ENT_QUOTES, 'UTF-8'); ?></label>
                    <input type="url" id="kbt-ad-url" name="target_url" placeholder="https://example.com/product" required maxlength="220">
                </div>
                <div class="kbt-ad-field kbt-ad-field--full">
                    <label for="kbt-ad-message"><?php echo htmlspecialchars($modal['message'], ENT_QUOTES, 'UTF-8'); ?></label>
                    <textarea id="kbt-ad-message" name="message" required maxlength="1200" placeholder="<?php echo htmlspecialchars($modal['messagePlaceholder'], ENT_QUOTES, 'UTF-8'); ?>"></textarea>
                </div>
                <div class="kbt-ad-field">
                    <label for="kbt-ad-captcha"><?php echo htmlspecialchars($modal['captcha'], ENT_QUOTES, 'UTF-8'); ?>: <?php echo htmlspecialchars($captchaQuestion, ENT_QUOTES, 'UTF-8'); ?> = ?</label>
                    <input type="number" id="kbt-ad-captcha" name="captcha" required inputmode="numeric" autocomplete="off">
                </div>
            </div>
            <div class="kbt-ad-form__actions">
                <button type="submit" class="kbt-ad-submit"><?php echo htmlspecialchars($modal['submit'], ENT_QUOTES, 'UTF-8'); ?></button>
                <span class="kbt-ad-status" data-kbt-ad-status role="status" aria-live="polite"></span>
            </div>
        </form>
    </section>
</div>
<script>
(function(){
    if (window.kbtAdInquiryReady) { return; }
    window.kbtAdInquiryReady = true;
    var modal = document.querySelector('[data-kbt-ad-modal]');
    var form = document.getElementById('kbt-ad-form');
    var placement = document.getElementById('kbt-ad-placement');
    var status = document.querySelector('[data-kbt-ad-status]');
    var lastFocus = null;
    var messages = <?php echo json_encode($statusMessages, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;

    function setStatus(message, type) {
        if (!status) { return; }
        status.textContent = message || '';
        status.classList.toggle('is-error', type === 'error');
        status.classList.toggle('is-success', type === 'success');
    }

    function selectPackage(packageId) {
        if (!form || !packageId) { return; }
        form.querySelectorAll('input[name="package"]').forEach(function(option) {
            if (option.value === packageId) {
                option.checked = true;
            }
        });
    }

    function openModal(trigger) {
        if (!modal || !form) { return; }
        lastFocus = trigger || document.activeElement;
        if (placement && trigger) {
            placement.value = trigger.getAttribute('data-placement') || 'site_house_ad';
        }
        if (trigger) {
            selectPackage(trigger.getAttribute('data-package') || 'three_month');
        }
        modal.hidden = false;
        document.body.classList.add('kbt-ad-modal-open');
        setStatus('', '');
        window.requestAnimationFrame(function() {
            var dialog = modal.querySelector('.kbt-ad-dialog');
            var firstField = form.querySelector('#kbt-ad-name');
            if (dialog) {
                dialog.scrollTop = 0;
            }
            if (firstField) {
                try {
                    firstField.focus({ preventScroll: true });
                } catch (error) {
                    firstField.focus();
                }
            }
            if (dialog) {
                dialog.scrollTop = 0;
            }
        });
    }

    function closeModal() {
        if (!modal) { return; }
        modal.hidden = true;
        document.body.classList.remove('kbt-ad-modal-open');
        setStatus('', '');
        if (lastFocus && typeof lastFocus.focus === 'function') {
            lastFocus.focus();
        }
    }

    window.kbtOpenAdInquiryModal = openModal;
    window.kbtCloseAdInquiryModal = closeModal;

    document.addEventListener('click', function(event) {
        if (event.defaultPrevented) { return; }
        var opener = event.target.closest && event.target.closest('[data-kbt-ad-open], [data-kbt-partner-open]');
        if (!opener) { return; }
        event.preventDefault();
        openModal(opener);
    });

    document.addEventListener('click', function(event) {
        var closer = event.target.closest && event.target.closest('[data-kbt-ad-close]');
        if (!closer) { return; }
        event.preventDefault();
        closeModal();
    });

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modal && !modal.hidden) {
            closeModal();
        }
    });

    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            var submitButton = form.querySelector('.kbt-ad-submit');
            var formData = new FormData(form);
            setStatus(messages.sending, '');
            if (submitButton) {
                submitButton.disabled = true;
            }
            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: { 'Accept': 'application/json' }
            }).then(function(response) {
                return response.json().catch(function() {
                    return { status: 'error', message: messages.unreadable };
                });
            }).then(function(result) {
                if (result && result.status === 'success') {
                    setStatus(messages.success, 'success');
                    form.reset();
                    selectPackage('three_month');
                } else {
                    setStatus((result && result.message) || messages.error, 'error');
                }
            }).catch(function() {
                setStatus(messages.network, 'error');
            }).finally(function() {
                if (submitButton) {
                    submitButton.disabled = false;
                }
            });
        });
    }
})();
</script>
        <?php
    }
}

if (!function_exists('kbtRenderPartnerFallback')) {
    function kbtRenderPartnerFallback($placement, array $options = [])
    {
        $locale = kbtAdCurrentLocale($options);
        $copy = kbtHouseAdCopy($placement, $locale);
        $variant = $options['variant'] ?? $copy['variant'];
        $variantClass = preg_replace('/[^a-z0-9_-]+/i', '-', (string) $variant);
        $template = kbtHouseAdTemplate($variant);
        $classes = trim('kbt-partner-fallback kbt-partner-fallback--' . $variantClass . ' ' . ($options['class'] ?? ''));
        $tileClasses = trim('kbt-partner-tile kbt-house-ad kbt-house-ad--' . $variantClass . ' kbt-house-ad--template-' . $template);
        $href = kbtHouseAdUrl($placement, 'three_month', $locale);
        ?>
<div class="<?php echo htmlspecialchars($classes, ENT_QUOTES, 'UTF-8'); ?>"
     data-kbt-partner-fallback
     data-partner-placement="<?php echo htmlspecialchars((string) $placement, ENT_QUOTES, 'UTF-8'); ?>"
     hidden>
    <a class="<?php echo htmlspecialchars($tileClasses, ENT_QUOTES, 'UTF-8'); ?>"
       href="<?php echo htmlspecialchars($href, ENT_QUOTES, 'UTF-8'); ?>"
       data-placement="<?php echo htmlspecialchars((string) $placement, ENT_QUOTES, 'UTF-8'); ?>"
       data-package="three_month">
        <?php kbtRenderHouseAdCreative($copy, $variant); ?>
    </a>
</div>
        <?php
    }
}

if (!function_exists('kbtHouseAdCopy')) {
    function kbtHouseAdCopy($placement, $locale = 'en')
    {
        $placement = (string) $placement;
        $variant = 'banner';
        $localized = kbtAdLocalizedContent($locale);
        $copy = $localized['default'];

        if (strpos($placement, 'hero') !== false) {
            $variant = 'pulse';
            $copy = array_merge($copy, $localized['hero']);
        } elseif (strpos($placement, 'rail') !== false || strpos($placement, 'side') !== false) {
            $variant = 'rail';
            $copy = array_merge($copy, $localized['rail']);
        } elseif (strpos($placement, 'footer') !== false) {
            $variant = 'footer';
            $copy = array_merge($copy, $localized['footer']);
        } elseif (strpos($placement, 'grid') !== false) {
            $variant = 'grid';
            $copy = array_merge($copy, $localized['grid']);
        } elseif (strpos($placement, 'after_tool') !== false) {
            $variant = 'sweep';
            $copy = array_merge($copy, $localized['after_tool']);
        }

        $copy['variant'] = $variant;
        $copy['title'] = 'Advertise on KeyboardTester.click';
        return $copy;
    }
}

if (!function_exists('kbtHouseAdTemplate')) {
    function kbtHouseAdTemplate($variant)
    {
        $variant = (string) $variant;
        if ($variant === 'rail') {
            return 'rail';
        }
        if ($variant === 'grid') {
            return 'grid';
        }
        if ($variant === 'sweep') {
            return 'post';
        }
        if ($variant === 'footer') {
            return 'footer';
        }
        if ($variant === 'pulse') {
            return 'hero';
        }

        return 'banner';
    }
}

if (!function_exists('kbtRenderHouseAdCreative')) {
    function kbtRenderHouseAdCreative(array $copy, $variant)
    {
        $template = kbtHouseAdTemplate($variant);
        $eyebrow = htmlspecialchars($copy['eyebrow'], ENT_QUOTES, 'UTF-8');
        $title = htmlspecialchars($copy['title'], ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars($copy['price'], ENT_QUOTES, 'UTF-8');
        $term = htmlspecialchars($copy['term'], ENT_QUOTES, 'UTF-8');
        $cta = htmlspecialchars($copy['cta'], ENT_QUOTES, 'UTF-8');

        if ($template === 'rail') {
            ?>
            <span class="kbt-house-ad__rail-head">
                <span class="kbt-house-ad__label"><?php echo $eyebrow; ?></span>
                <span class="kbt-house-ad__tag">AD</span>
            </span>
            <span class="kbt-house-ad__price-card">
                <b><?php echo $price; ?></b>
                <span><?php echo $term; ?></span>
            </span>
            <span class="kbt-house-ad__tower" aria-hidden="true">
                <span></span><span></span><span></span><span></span>
            </span>
            <span class="kbt-house-ad__copy">
                <strong class="kbt-house-ad__title"><?php echo $title; ?></strong>
                <span class="kbt-house-ad__button"><?php echo $cta; ?></span>
            </span>
            <?php
            return;
        }

        if ($template === 'grid') {
            ?>
            <span class="kbt-house-ad__panel" aria-hidden="true">
                <span class="kbt-house-ad__mark">AD</span>
                <span class="kbt-house-ad__spark"></span>
            </span>
            <span class="kbt-house-ad__copy">
                <span class="kbt-house-ad__label"><?php echo $eyebrow; ?></span>
                <strong class="kbt-house-ad__title"><?php echo $title; ?></strong>
            </span>
            <span class="kbt-house-ad__price-row">
                <b><?php echo $price; ?></b>
                <span><?php echo $term; ?></span>
            </span>
            <span class="kbt-house-ad__button"><?php echo $cta; ?></span>
            <?php
            return;
        }

        if ($template === 'post') {
            ?>
            <span class="kbt-house-ad__stripe" aria-hidden="true"></span>
            <span class="kbt-house-ad__copy">
                <span class="kbt-house-ad__label"><?php echo $eyebrow; ?></span>
                <strong class="kbt-house-ad__title"><?php echo $title; ?></strong>
            </span>
            <span class="kbt-house-ad__deal">
                <b><?php echo $price; ?></b>
                <span><?php echo $term; ?></span>
                <span class="kbt-house-ad__button"><?php echo $cta; ?></span>
            </span>
            <?php
            return;
        }

        if ($template === 'footer') {
            ?>
            <span class="kbt-house-ad__label"><?php echo $eyebrow; ?></span>
            <strong class="kbt-house-ad__title"><?php echo $title; ?></strong>
            <span class="kbt-house-ad__price"><?php echo $price; ?></span>
            <span class="kbt-house-ad__button"><?php echo $cta; ?></span>
            <?php
            return;
        }

        ?>
        <span class="kbt-house-ad__mark" aria-hidden="true">AD</span>
        <span class="kbt-house-ad__copy">
            <span class="kbt-house-ad__label"><?php echo $eyebrow; ?></span>
            <strong class="kbt-house-ad__title"><?php echo $title; ?></strong>
        </span>
        <span class="kbt-house-ad__price"><?php echo $price; ?></span>
        <span class="kbt-house-ad__button"><?php echo $cta; ?></span>
        <?php
    }
}

if (!function_exists('kbtRenderHouseAd')) {
    function kbtRenderHouseAd($placement, array $options = [])
    {
        $locale = kbtAdCurrentLocale($options);
        $copy = kbtHouseAdCopy($placement, $locale);
        $variant = $options['variant'] ?? $copy['variant'];
        $variantClass = preg_replace('/[^a-z0-9_-]+/i', '-', (string) $variant);
        $template = kbtHouseAdTemplate($variant);
        $classes = trim('kbt-house-ad kbt-house-ad--' . $variantClass . ' kbt-house-ad--template-' . $template . ' ' . ($options['class'] ?? ''));
        $href = kbtHouseAdUrl($placement, 'three_month', $locale);
        ?>
        <a class="<?php echo htmlspecialchars($classes, ENT_QUOTES, 'UTF-8'); ?>"
           href="<?php echo htmlspecialchars($href, ENT_QUOTES, 'UTF-8'); ?>"
           data-kbt-house-ad
           data-placement="<?php echo htmlspecialchars((string) $placement, ENT_QUOTES, 'UTF-8'); ?>"
           data-package="three_month">
            <?php kbtRenderHouseAdCreative($copy, $variant); ?>
        </a>
        <?php
    }
}

if (!function_exists('kbtRenderAdSlot')) {
    function kbtRenderAdSlot($placement, array $options = [])
    {
        global $loadAdSense, $isLocalhost;

        if (isset($loadAdSense) && !$loadAdSense) {
            return;
        }

        $slotId = kbtGetAdSenseSlotId($placement);
        if ($slotId === '') {
            if (!empty($isLocalhost) && empty($options['hide_placeholder'])) {
                $classes = trim('kbt-ad-slot kbt-ad-slot--placeholder ' . ($options['class'] ?? ''));
                echo "\n<aside class=\"" . htmlspecialchars($classes, ENT_QUOTES, 'UTF-8') . "\" aria-label=\"Sponsored placement\" data-ad-placement=\"" . htmlspecialchars($placement, ENT_QUOTES, 'UTF-8') . "\"><div class=\"kbt-ad-slot-inner\" aria-hidden=\"true\"></div></aside>\n";
                return;
            }
            echo "\n<!-- Sponsored placement " . htmlspecialchars($placement, ENT_QUOTES, 'UTF-8') . " disabled: configure includes/adsense-slots.php -->\n";
            return;
        }

        $config = kbtGetAdSenseConfig();
        $client = trim((string) ($config['client'] ?? ''));
        if ($client === '') {
            return;
        }

        $classes = trim('kbt-ad-slot kbt-ad-slot--pending ' . ($options['class'] ?? ''));
        $format = $options['format'] ?? 'auto';
        $layout = $options['layout'] ?? null;
        $fullWidthResponsive = array_key_exists('full_width_responsive', $options) ? (bool) $options['full_width_responsive'] : true;
        $ariaLabel = $options['aria_label'] ?? 'Sponsored slot';
        $minWidth = isset($options['min_width']) ? max(0, (int) $options['min_width']) : 0;
        $renderSafeFallback = array_key_exists('safe_fallback', $options) ? (bool) $options['safe_fallback'] : true;
        $adLocale = kbtAdCurrentLocale($options);
        $fallbackOptions = ['locale' => $adLocale];
        if (isset($options['variant'])) {
            $fallbackOptions['variant'] = $options['variant'];
        }
        if (isset($options['fallback_class'])) {
            $fallbackOptions['class'] = $options['fallback_class'];
        }
        ?>
<aside class="<?php echo htmlspecialchars($classes, ENT_QUOTES, 'UTF-8'); ?>" aria-label="<?php echo htmlspecialchars($ariaLabel, ENT_QUOTES, 'UTF-8'); ?>" data-ad-placement="<?php echo htmlspecialchars($placement, ENT_QUOTES, 'UTF-8'); ?>"<?php if ($minWidth > 0): ?> data-ad-min-width="<?php echo $minWidth; ?>"<?php endif; ?>>
    <div class="kbt-ad-slot-inner">
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="<?php echo htmlspecialchars($client, ENT_QUOTES, 'UTF-8'); ?>"
             data-ad-slot="<?php echo htmlspecialchars($slotId, ENT_QUOTES, 'UTF-8'); ?>"
<?php if ($layout !== null): ?>
             data-ad-layout="<?php echo htmlspecialchars((string) $layout, ENT_QUOTES, 'UTF-8'); ?>"
<?php endif; ?>
             data-ad-format="<?php echo htmlspecialchars((string) $format, ENT_QUOTES, 'UTF-8'); ?>"
             data-full-width-responsive="<?php echo $fullWidthResponsive ? 'true' : 'false'; ?>"></ins>
        <?php kbtRenderHouseAd($placement, $fallbackOptions); ?>
    </div>
</aside>
<?php if ($renderSafeFallback): ?>
<?php kbtRenderPartnerFallback($placement, $fallbackOptions); ?>
<?php endif; ?>
<script>
(function(){
    if (window.matchMedia && window.matchMedia('(max-width: 768px)').matches) { return; }
    var scripts = document.getElementsByTagName('script');
    var current = scripts[scripts.length - 1];
    var slot = current && current.previousElementSibling;
    if (slot && slot.hasAttribute('data-kbt-partner-fallback')) {
        slot = slot.previousElementSibling;
    }
    var ad = slot ? slot.querySelector('.adsbygoogle') : null;
    var minWidth = slot ? parseInt(slot.getAttribute('data-ad-min-width') || '0', 10) : 0;
    function showHouseAd(reason) {
        if (!slot) { return; }
        if (window.kbtShowHouseAdSlot) {
            window.kbtShowHouseAdSlot(slot, reason || 'blocked');
            return;
        }
        slot.classList.remove('kbt-ad-slot--pending', 'kbt-ad-slot--filled');
        slot.classList.add('kbt-ad-slot--house');
        slot.setAttribute('data-ad-fallback', reason || 'blocked');
    }
    function markFilled() {
        if (!slot) { return; }
        slot.classList.remove('kbt-ad-slot--pending', 'kbt-ad-slot--house', 'kbt-ad-slot--empty', 'kbt-ad-slot--blocked');
        slot.classList.add('kbt-ad-slot--filled');
        if (window.kbtHidePartnerFallbackSlot) {
            window.kbtHidePartnerFallbackSlot(slot);
        }
    }
    function monitorSlot() {
        if (!slot || !ad) { return; }
        var timer = window.setInterval(function() {
            var status = ad.getAttribute('data-ad-status');
            if (status === 'filled') {
                window.clearInterval(timer);
                markFilled();
                return;
            }
            if (status === 'unfilled') {
                window.clearInterval(timer);
                showHouseAd('empty');
                return;
            }
        }, 500);
    }
    if (minWidth && window.innerWidth < minWidth) { return; }
    if (slot && (slot.hidden || slot.getAttribute('aria-hidden') === 'true')) {
        showHouseAd('blocked');
        return;
    }
    if (document.documentElement.classList.contains('kbt-ads-blocked')) {
        showHouseAd('blocked');
        return;
    }
    try {
        (window.adsbygoogle = window.adsbygoogle || []).push({});
        monitorSlot();
    } catch (error) {
        showHouseAd('blocked');
    }
})();
</script>
        <?php
    }
}
