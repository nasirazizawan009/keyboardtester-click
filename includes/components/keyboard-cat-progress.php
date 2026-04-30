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
            <div class="runner-cloud cloud-one" aria-hidden="true"></div>
            <div class="runner-cloud cloud-two" aria-hidden="true"></div>
            <div class="runner-cloud cloud-three" aria-hidden="true"></div>

            <div class="treat runner-step step-bush" data-treat="10" data-keys="10" title="10 keys - Grass patch"><span class="runner-grass"><i></i><i></i><i></i></span></div>
            <div class="treat runner-step step-twig" data-treat="20" data-keys="20" title="20 keys - Small bush"><span class="runner-grass"><i></i><i></i><i></i></span></div>
            <div class="treat runner-step step-cactus" data-treat="30" data-keys="30" title="30 keys - Tall grass"><span class="runner-grass"><i></i><i></i><i></i></span></div>
            <div class="treat runner-step step-double" data-treat="40" data-keys="40" title="40 keys - Double grass"><span class="runner-grass"><i></i><i></i><i></i></span></div>
            <div class="treat runner-step step-stump" data-treat="50" data-keys="50" title="50 keys - Low stump"><span class="runner-grass"><i></i><i></i><i></i></span></div>
            <div class="treat runner-step step-bush-tall" data-treat="60" data-keys="60" title="60 keys - Tall bush"><span class="runner-grass"><i></i><i></i><i></i></span></div>
            <div class="treat runner-step step-cactus-small" data-treat="70" data-keys="70" title="70 keys - Short grass"><span class="runner-grass"><i></i><i></i><i></i></span></div>
            <div class="treat runner-step step-tree" data-treat="80" data-keys="80" title="80 keys - Simple tree"><span class="runner-grass"><i></i><i></i><i></i></span></div>
            <div class="treat runner-step step-rock" data-treat="90" data-keys="90" title="90 keys - Rock and grass"><span class="runner-grass"><i></i><i></i><i></i></span></div>
            <div class="treat runner-step step-flag" data-treat="100" data-keys="<?php echo $catProgressTotalKeys; ?>" title="<?php echo $catProgressTotalKeys; ?> keys - Run complete"><span class="runner-grass"><i></i><i></i><i></i></span></div>

            <div class="progress-cat" data-cat-avatar>
                <div class="cat-body" aria-label="Horse">
                    <span class="runner-horse" aria-hidden="true">
                        <span class="horse-tail"></span>
                        <span class="horse-body"></span>
                        <span class="horse-neck"></span>
                        <span class="horse-head"></span>
                        <span class="horse-ear"></span>
                        <span class="horse-mane"></span>
                        <span class="horse-leg horse-leg-back"></span>
                        <span class="horse-leg horse-leg-mid-back"></span>
                        <span class="horse-leg horse-leg-mid-front"></span>
                        <span class="horse-leg horse-leg-front"></span>
                    </span>
                </div>
                <div class="cat-message" data-cat-message>Press keys to start the run!</div>
            </div>
        </div>

        <div class="cat-status">
            <span class="cat-mood" data-cat-mood>Ready</span>
            <div class="cat-status-right">
                <span class="treats-eaten" data-cat-treats>Checkpoints: 0/10</span>
                <span class="progress-percentage" data-cat-progress-percentage>0%</span>
            </div>
        </div>
    </div>
</div>
