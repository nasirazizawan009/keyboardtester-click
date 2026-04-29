<?php
/**
 * Reusable keyboard pasture progress component.
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
            <div class="treat pasture-step step-sapling" data-treat="10" data-keys="10" title="10 keys - Fresh grass"><span class="pasture-tree"></span><span class="grass-clump"><i></i><i></i><i></i></span></div>
            <div class="treat pasture-step step-round" data-treat="20" data-keys="20" title="20 keys - Round tree"><span class="pasture-tree"></span><span class="grass-clump"><i></i><i></i><i></i></span></div>
            <div class="treat pasture-step step-pine" data-treat="30" data-keys="30" title="30 keys - Pine tree"><span class="pasture-tree"></span><span class="grass-clump"><i></i><i></i><i></i></span></div>
            <div class="treat pasture-step step-wide" data-treat="40" data-keys="40" title="40 keys - Wide tree"><span class="pasture-tree"></span><span class="grass-clump"><i></i><i></i><i></i></span></div>
            <div class="treat pasture-step step-tall" data-treat="50" data-keys="50" title="50 keys - Tall tree"><span class="pasture-tree"></span><span class="grass-clump"><i></i><i></i><i></i></span></div>
            <div class="treat pasture-step step-bent" data-treat="60" data-keys="60" title="60 keys - Bent tree"><span class="pasture-tree"></span><span class="grass-clump"><i></i><i></i><i></i></span></div>
            <div class="treat pasture-step step-bloom" data-treat="70" data-keys="70" title="70 keys - Bloom tree"><span class="pasture-tree"></span><span class="grass-clump"><i></i><i></i><i></i></span></div>
            <div class="treat pasture-step step-cypress" data-treat="80" data-keys="80" title="80 keys - Cypress tree"><span class="pasture-tree"></span><span class="grass-clump"><i></i><i></i><i></i></span></div>
            <div class="treat pasture-step step-apple" data-treat="90" data-keys="90" title="90 keys - Apple tree"><span class="pasture-tree"></span><span class="grass-clump"><i></i><i></i><i></i></span></div>
            <div class="treat pasture-step step-final" data-treat="100" data-keys="<?php echo $catProgressTotalKeys; ?>" title="<?php echo $catProgressTotalKeys; ?> keys - Pasture complete"><span class="pasture-tree"></span><span class="grass-clump"><i></i><i></i><i></i></span></div>

            <div class="progress-cat" data-cat-avatar>
                <div class="cat-body" aria-label="Horse">
                    <span class="horse-figure" aria-hidden="true">
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
                <div class="cat-message" data-cat-message>Press keys to help me graze!</div>
            </div>
        </div>

        <div class="cat-status">
            <span class="cat-mood" data-cat-mood>Grazing</span>
            <div class="cat-status-right">
                <span class="treats-eaten" data-cat-treats>Grass: 0/10</span>
                <span class="progress-percentage" data-cat-progress-percentage>0%</span>
            </div>
        </div>
    </div>
</div>
