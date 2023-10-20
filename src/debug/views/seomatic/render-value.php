<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;

/* @var $value string|array */
/* @var $meta array */
?>
<?php if (is_array($value) && !empty(reset($value))): ?><td><details><summary>Expand Sub-Properties</summary><div class="table-responsive"><table class="table table-condensed table-bordered table-striped table-hover seomatic-vars-sub-table"
                   style="table-layout: fixed;">
                <thead>
                <tr>
                    <th>Property</th>
                    <th>Value</th>
                </tr>
                </thead>
                <tbody>
                <?php $propNames = $meta['PROPERTY_NAME'] ?? [] ?>
                <?php foreach ($value as $subName => $subValue): ?>
                    <?php $meta['PROPERTY_NAME'] = $propNames ?>
                    <?php $meta['PROPERTY_NAME'][] = $subName ?>
                    <tr>
                        <th class="seomatic-property"><?= Html::encode($subName) ?>
                            <?= $this->render('render-copy-menu', [
                                'value' => $subValue ?? '',
                                'meta' => $meta,
                           ]) ?>
                        </th>
                        <?= $this->render('render-value', [
                                'value' => $subValue ?? '',
                                'meta' => $meta,
                        ]) ?>
                    </tr>
                <?php endforeach; ?></tbody></table></div></details></td>
<?php else: ?><td><?= htmlspecialchars(VarDumper::dumpAsString($value), ENT_QUOTES | ENT_SUBSTITUTE,
    \Yii::$app->charset, true) ?></td>
<?php endif; ?>
