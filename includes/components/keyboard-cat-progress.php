<?php
/**
 * Reusable keyboard cat progress component.
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
            <div class="treat" data-treat="10" data-keys="10" title="10 keys - Fish">&#x1F41F;</div>
            <div class="treat" data-treat="20" data-keys="20" title="20 keys - Water">&#x1F4A7;</div>
            <div class="treat" data-treat="30" data-keys="30" title="30 keys - Mouse Toy">&#x1F42D;</div>
            <div class="treat" data-treat="40" data-keys="40" title="40 keys - Yarn">&#x1F9F6;</div>
            <div class="treat" data-treat="50" data-keys="50" title="50 keys - Tuna">&#x1F96B;</div>
            <div class="treat" data-treat="60" data-keys="60" title="60 keys - Chicken">&#x1F357;</div>
            <div class="treat" data-treat="70" data-keys="70" title="70 keys - Candy">&#x1F36C;</div>
            <div class="treat" data-treat="80" data-keys="80" title="80 keys - Star">&#x2B50;</div>
            <div class="treat" data-treat="90" data-keys="90" title="90 keys - Coin">&#x1FA99;</div>
            <div class="treat" data-treat="100" data-keys="<?php echo $catProgressTotalKeys; ?>" title="<?php echo $catProgressTotalKeys; ?> keys - Trophy">&#x1F3C6;</div>

            <div class="progress-cat" data-cat-avatar>
                <div class="cat-body">&#x1F431;</div>
                <div class="cat-message" data-cat-message>Press keys to feed me!</div>
            </div>
        </div>

        <div class="cat-status">
            <span class="cat-mood" data-cat-mood>&#x1F63A; Hungry</span>
            <div class="cat-status-right">
                <span class="treats-eaten" data-cat-treats>Treats: 0/10</span>
                <span class="progress-percentage" data-cat-progress-percentage>0%</span>
            </div>
        </div>
    </div>
</div>
