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
            <div class="arcade-score" data-arcade-score aria-hidden="true">SCORE 00000</div>
            <div class="maze-rail maze-rail-top" aria-hidden="true"></div>
            <div class="maze-rail maze-rail-bottom" aria-hidden="true"></div>
            <div class="maze-dots" aria-hidden="true"></div>
            <div class="arcade-enemies" aria-hidden="true">
                <span class="enemy-ghost enemy-pink" data-arcade-enemy>
                    <span class="enemy-eye enemy-eye-left"><span class="enemy-pupil"></span></span>
                    <span class="enemy-eye enemy-eye-right"><span class="enemy-pupil"></span></span>
                </span>
                <span class="enemy-ghost enemy-cyan" data-arcade-enemy>
                    <span class="enemy-eye enemy-eye-left"><span class="enemy-pupil"></span></span>
                    <span class="enemy-eye enemy-eye-right"><span class="enemy-pupil"></span></span>
                </span>
                <span class="enemy-ghost enemy-orange" data-arcade-enemy>
                    <span class="enemy-eye enemy-eye-left"><span class="enemy-pupil"></span></span>
                    <span class="enemy-eye enemy-eye-right"><span class="enemy-pupil"></span></span>
                </span>
            </div>
            <div class="treat runner-step pellet pellet-small" data-treat="10" data-keys="10" title="10 keys - Dot cleared"></div>
            <div class="treat runner-step pellet pellet-power" data-treat="20" data-keys="20" title="20 keys - Power pellet"></div>
            <div class="treat runner-step pellet ghost ghost-pink" data-treat="30" data-keys="30" title="30 keys - Pink ghost"></div>
            <div class="treat runner-step pellet pellet-small" data-treat="40" data-keys="40" title="40 keys - Dot cleared"></div>
            <div class="treat runner-step pellet ghost ghost-cyan" data-treat="50" data-keys="50" title="50 keys - Cyan ghost"></div>
            <div class="treat runner-step pellet pellet-power" data-treat="60" data-keys="60" title="60 keys - Power pellet"></div>
            <div class="treat runner-step pellet ghost ghost-orange" data-treat="70" data-keys="70" title="70 keys - Orange ghost"></div>
            <div class="treat runner-step pellet pellet-small" data-treat="80" data-keys="80" title="80 keys - Dot cleared"></div>
            <div class="treat runner-step pellet ghost ghost-blue" data-treat="90" data-keys="90" title="90 keys - Blue ghost"></div>
            <div class="treat runner-step pellet pellet-power final-pellet" data-treat="100" data-keys="<?php echo $catProgressTotalKeys; ?>" title="<?php echo $catProgressTotalKeys; ?> keys - Maze clear"></div>

            <div class="progress-cat" data-cat-avatar>
                <div class="cat-body" aria-label="Arcade chomper">
                    <span class="arcade-chomper" aria-hidden="true"></span>
                </div>
                <div class="cat-message" data-cat-message>Press keys to clear the maze!</div>
            </div>
        </div>

        <div class="cat-status">
            <span class="cat-mood" data-cat-mood>Ready</span>
            <div class="cat-status-right">
                <span class="treats-eaten" data-cat-treats>Dots: 0/10</span>
                <span class="progress-percentage" data-cat-progress-percentage>0%</span>
            </div>
        </div>
    </div>
</div>
