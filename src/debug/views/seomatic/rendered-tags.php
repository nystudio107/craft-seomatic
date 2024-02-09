<?php

use craft\helpers\Json;

/* @var $values array */
$view = $values['view'];
/* @var $view \yii\web\View */
?>
<details open class="seomatic-rendered-tags-details">
    <summary>Rendered Tags</summary>
    <div class="seomatic-rendered-tags-container">
        <textarea id="<?= $values['id'] ?>"><?= htmlspecialchars($values['renderedTags']) ?></textarea>
    </div>
</details>
<?php
$codeEditorId = $values['id'];
$codeEditorOptions = Json::encode([
    'singleLineEditor' => false,
    'placeholderText' => '',
    'wrapperClass' => 'monaco-editor-inline-frame',
    'fixedHeightEditor' => false,
    'displayLanguageIcon' => true,
]);
$monacoOptions = Json::encode([
    'language' => $values['language'],
    'domReadOnly' => true,
    'readOnly' => true,
]);
$endpointAlias = Craft::getAlias('@codeEditorEndpointUrl');
$view->registerJs("makeMonacoEditor('{$codeEditorId}', 'CodeEditor', '{$monacoOptions}', '{$codeEditorOptions}', '{$endpointAlias}');");
?>

<p></p>
