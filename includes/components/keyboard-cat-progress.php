<?php
/**
 * Reusable keyboard runner progress component.
 *
 * Optional variables before include:
 * - $catProgressId (string)
 * - $catProgressTotalKeys (int)
 */
$catProgressId = isset($catProgressId) ? (string) $catProgressId : 'cat-progress-section';
$catProgressId = preg_replace('/[^a-zA-Z0-9_-]/', '', $catProgressId);
if ($catProgressId === '') {
    $catProgressId = 'cat-progress-section';
}

$catProgressTotalKeys = isset($catProgressTotalKeys) ? (int) $catProgressTotalKeys : 103;
if ($catProgressTotalKeys < 1) {
    $catProgressTotalKeys = 103;
}
?>
<div class="cat-progress-section" id="<?php echo htmlspecialchars($catProgressId, ENT_QUOTES, 'UTF-8'); ?>">
    <div class="cat-progress-container">
        <div class="cat-progress-track">
            <div class="dino-score" data-dino-score aria-hidden="true">00000</div>
            <div class="treat runner-step step-cactus-small" data-treat="10" data-keys="10" title="10 keys - Small cactus"></div>
            <div class="treat runner-step step-cactus-tall" data-treat="20" data-keys="20" title="20 keys - Tall cactus"></div>
            <div class="treat runner-step step-bird-high" data-treat="30" data-keys="30" title="30 keys - Pterodactyl"><span class="bird-wing bird-wing-up"></span><span class="bird-body"></span><span class="bird-head"></span><span class="bird-wing bird-wing-down"></span></div>
            <div class="treat runner-step step-cactus-double" data-treat="40" data-keys="40" title="40 keys - Double cactus"></div>
            <div class="treat runner-step step-cactus-triple" data-treat="50" data-keys="50" title="50 keys - Triple cactus"></div>
            <div class="treat runner-step step-bird-low" data-treat="60" data-keys="60" title="60 keys - Low pterodactyl"><span class="bird-wing bird-wing-up"></span><span class="bird-body"></span><span class="bird-head"></span><span class="bird-wing bird-wing-down"></span></div>
            <div class="treat runner-step step-cactus-wide" data-treat="70" data-keys="70" title="70 keys - Wide cactus"></div>
            <div class="treat runner-step step-cactus-small" data-treat="80" data-keys="80" title="80 keys - Small cactus"></div>
            <div class="treat runner-step step-bird-high" data-treat="90" data-keys="90" title="90 keys - Pterodactyl"><span class="bird-wing bird-wing-up"></span><span class="bird-body"></span><span class="bird-head"></span><span class="bird-wing bird-wing-down"></span></div>
            <div class="treat runner-step step-cactus-triple" data-treat="100" data-keys="<?php echo $catProgressTotalKeys; ?>" title="<?php echo $catProgressTotalKeys; ?> keys - Dino run complete"></div>

            <div class="progress-cat" data-cat-avatar>
                <div class="cat-body" aria-label="Chrome dino">
                    <span class="runner-trex" aria-hidden="true"></span>
                </div>
                <div class="cat-message" data-cat-message>Press keys to start the Dino run!</div>
            </div>
        </div>

        <div class="cat-status">
            <span class="cat-mood" data-cat-mood>Ready</span>
            <div class="cat-status-right">
                <span class="treats-eaten" data-cat-treats>Obstacles: 0/10</span>
                <span class="progress-percentage" data-cat-progress-percentage>0%</span>
            </div>
        </div>
    </div>
</div>
