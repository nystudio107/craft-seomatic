<?php

use craft\helpers\Html;

/* @var $value array */
/* @var $meta array */
$codeExamples = [];
$search = ['SERVICE_NAME', 'TAG_NAME', 'PROPERTY_NAME'];
$replace = [$meta['SERVICE_NAME'], $meta['TAG_NAME'], implode('.', $meta['PROPERTY_NAME'] ?? [])];
foreach ($meta['PROPERTY_STRINGS']['twig'] as $subject) {
    $codeExamples[] = str_replace($search, $replace, $subject);
}
$tooltip = implode(PHP_EOL, array_slice($codeExamples, 0, 4));
?>
<div class="seomatic-property-copy-wrapper" title="<?= $tooltip ?>">
    <?= Html::svg("@nystudio107/seomatic/debug/assets/img/copy-icon.svg") ?>
</div>
