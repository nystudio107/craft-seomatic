<?php

/* @var $value array */
/* @var $meta array */
$codeExamples = [];
$search = ['SERVICE_NAME', 'TAG_NAME', 'TWIG_VAR_HINT', 'PROPERTY_NAME'];
$replace = [$meta['SERVICE_NAME'], $meta['TAG_NAME'], $meta['TWIG_VAR_HINT'], implode('.', $meta['PROPERTY_NAME'] ?? [])];
foreach ($meta['PROPERTY_STRINGS']['twig'] as $subject) {
    $codeExamples[] = str_replace($search, $replace, $subject);
}
$tooltip = implode(PHP_EOL, array_slice($codeExamples, 0, 4));
?>
<div class="seomatic-property-copy-wrapper" title="<?= $tooltip ?>">
    <?= @file_get_contents(Craft::getAlias("@nystudio107/seomatic/debug/assets/img/copy-icon.svg")) ?>
</div>
