<?php
/**
 * @var SeomaticPanel $panel
 * @var View $this
 * @var array $value
 * @var array $meta
 */

use craft\helpers\Html;
use nystudio107\seomatic\debug\assets\DebugAsset;
use nystudio107\seomatic\debug\panels\SeomaticPanel;
use yii\web\View;

/* @var $value array */
/* @var $meta array */
$codeExamples = [];
$search = ['SERVICE_NAME', 'TAG_NAME', 'TWIG_VAR_HINT', 'PROPERTY_NAME'];
$replace = [$meta['SERVICE_NAME'], $meta['TAG_NAME'], $meta['TWIG_VAR_HINT'], implode('.', $meta['PROPERTY_NAME'] ?? [])];
foreach ($meta['PROPERTY_STRINGS']['twig'] as $subject) {
    $codeExamples[] = str_replace($search, $replace, $subject);
}
$tooltip = implode(PHP_EOL, array_slice($codeExamples, 0, 4));
$bundle = $this->getAssetManager()->getBundle(DebugAsset::class);
$iconUrl = $bundle->baseUrl . "/img/copy-icon.svg";
?>
<div class="seomatic-property-copy-wrapper" title="<?= $tooltip ?>">
    <?= Html::img($iconUrl) ?>
</div>
