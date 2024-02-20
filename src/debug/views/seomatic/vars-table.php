<?php
/**
 * @var SeomaticPanel $panel
 * @var View $this
 * @var array $values
 * @var string $caption
 */

use nystudio107\seomatic\debug\panels\SeomaticPanel;
use yii\helpers\Html;
use yii\web\View;

$meta = $values['meta'];
$meta['PROPERTY_STRINGS'] = VARIABLE_PROPERTY_STRINGS;
$meta['TAG_NAME'] = '';
?>
<h3><?= $caption ?></h3>
<?php if (empty($values['unparsed'])): ?>
    <div class="callout callout-secondary seomatic-callout">no variables present</div>
<?php else: ?>
    <div class="table-responsive">
        <table class="table table-condensed table-bordered table-striped table-hover seomatic-vars-table"
               style="table-layout: fixed;">
            <thead>
            <tr>
                <th>Property</th>
                <th>Value</th>
                <th>Parsed Value</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($values['unparsed'] as $name => $value): ?>
                <?php $meta['PROPERTY_NAME'] = [$name] ?>
                <tr>
                    <th class="seomatic-property"><?= Html::encode($name) ?><?= $this->render('render-copy-menu', [
                            'value' => $name ?? '',
                            'meta' => $meta,
                        ]) ?></th>
                    <?= $this->render('render-value', [
                        'value' => $values['unparsed'][$name] ?? '',
                        'meta' => $meta,
                    ]) ?>
                    <?= $this->render('render-value', [
                        'value' => $values['parsed'][$name] ?? '',
                        'meta' => $meta,
                    ]) ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
