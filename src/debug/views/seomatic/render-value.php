<?php

use yii\helpers\Html;
use yii\helpers\VarDumper;

/* @var $value string|array */
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
                <?php foreach ($value as $subName => $subValue): ?>
                    <tr>
                        <th class="seomatic-property"><?= Html::encode($subName) ?>
                            <?= $this->render('render-copy-menu', [
                                'value' => $subValue ?? ''
                            ]) ?>
                        </th>
                        <?= $this->render('render-value', [
                                'value' => $subValue ?? ''
                            ]) ?>
                    </tr>
                <?php endforeach; ?></tbody></table></div></details></td>
<?php else: ?><td><?= htmlspecialchars(VarDumper::dumpAsString($value), ENT_QUOTES | ENT_SUBSTITUTE,
    \Yii::$app->charset, true) ?></td>
<?php endif; ?>
