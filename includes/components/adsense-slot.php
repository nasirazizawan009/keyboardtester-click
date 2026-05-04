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
                echo "\n<aside class=\"" . htmlspecialchars($classes, ENT_QUOTES, 'UTF-8') . "\" aria-label=\"Ad slot placeholder\" data-ad-placement=\"" . htmlspecialchars($placement, ENT_QUOTES, 'UTF-8') . "\"><div class=\"kbt-ad-slot-inner\"><span class=\"kbt-ad-label\">Ad slot</span><strong>" . htmlspecialchars($placement, ENT_QUOTES, 'UTF-8') . "</strong></div></aside>\n";
                return;
            }
            echo "\n<!-- Ad slot " . htmlspecialchars($placement, ENT_QUOTES, 'UTF-8') . " disabled: configure includes/adsense-slots.php -->\n";
            return;
        }

        $config = kbtGetAdSenseConfig();
        $client = trim((string) ($config['client'] ?? ''));
        if ($client === '') {
            return;
        }

        $classes = trim('kbt-ad-slot ' . ($options['class'] ?? ''));
        $format = $options['format'] ?? 'auto';
        $layout = $options['layout'] ?? null;
        $fullWidthResponsive = array_key_exists('full_width_responsive', $options) ? (bool) $options['full_width_responsive'] : true;
        $ariaLabel = $options['aria_label'] ?? 'Sponsored slot';
        ?>
<aside class="<?php echo htmlspecialchars($classes, ENT_QUOTES, 'UTF-8'); ?>" aria-label="<?php echo htmlspecialchars($ariaLabel, ENT_QUOTES, 'UTF-8'); ?>" data-ad-placement="<?php echo htmlspecialchars($placement, ENT_QUOTES, 'UTF-8'); ?>">
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
    </div>
</aside>
<script>(window.adsbygoogle=window.adsbygoogle||[]).push({});</script>
        <?php
    }
}
