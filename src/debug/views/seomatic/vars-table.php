<?php

use yii\helpers\Html;

/* @var $caption string */
/* @var $values array */
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
                <tr>
                    <th class="seomatic-property"><?= Html::encode($name) ?>
                        <?= $this->render('render-copy-menu', [
                            'value' => $name ?? ''
                        ]) ?>
                    </th>
                    <?= $this->render('render-value', [
                        'value' => $values['unparsed'][$name] ?? ''
                    ]) ?>
                    <?= $this->render('render-value', [
                        'value' => $values['parsed'][$name] ?? ''
                    ]) ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>
