<?php
/**
 * @var SeomaticPanel $panel
 * @var View $this
 * @var string|array $value
 * @var array $meta
 */

use nystudio107\seomatic\debug\panels\SeomaticPanel;
use yii\helpers\Html;
use yii\web\View;

$meta['PROPERTY_STRINGS'] = TAG_PROPERTY_STRINGS;

$colors = [
    'warning' => 'warning',
    'error' => 'danger',
];

$color = 'inherit';
if (!empty($value['__errors']['warning'])) {
    $color = $colors['warning'];
}
if (!empty($value['__errors']['error'])) {
    $color = $colors['error'];
}
// See if we should display this item
$display = true;
if (is_array($value)) {
    $test = $value;
    unset($test['__errors']);
    if (empty($test)) {
        $display = false;
    }
} else {
    $display = false;
}
?>
<?php if ($display): ?>
    <td>
        <details>
            <summary class="callout-<?= $color ?> seomatic-error">Expand Sub-Properties</summary>
            <div class="table-responsive">
                <table class="table table-condensed table-bordered table-striped table-hover seomatic-vars-sub-table"
                       style="table-layout: fixed;">
                    <thead>
                    <tr>
                        <th>Property</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($value as $subName => $subValue): ?>
                        <?php $meta['PROPERTY_NAME'] = [$subName]; ?>
                        <?php if ($subName === '__errors') {
    continue;
} ?>
                        <tr>
                            <th class="seomatic-property"><?= Html::encode($subName) ?><?= $this->render('render-copy-menu', [
                                    'value' => $subValue ?? '',
                                    'meta' => $meta,
                                ]) ?></th>
                            <?= $this->render('render-value', [
                                'value' => $subValue ?? '',
                                'meta' => $meta,
                            ]) ?>
                        </tr>
                    <?php endforeach; ?></tbody>
                </table><?php if (!empty($value['__errors'])): ?><?php foreach ($value['__errors'] as $logLevel => $errorCat): ?><?php if (!empty($errorCat)): ?>
                    <ul
                    class="callout callout-<?= $logLevel ?> seomatic-error"><?php foreach ($errorCat as $property => $errors): ?>
                        <li class="seomatic-error <?= $logLevel ?>"><?= $property ?></li>
                        <ul><?php foreach (array_unique($errors) as $error): ?>
                            <li><?= $error ?></li><?php endforeach; ?></ul><?php endforeach; ?>
                    </ul><?php endif; ?><?php endforeach; ?><?php endif; ?></div>
        </details>
    </td>
<?php else: ?>
    <td>
        <div class="callout callout-secondary seomatic-callout">not included</div>
    </td>
<?php endif; ?>
