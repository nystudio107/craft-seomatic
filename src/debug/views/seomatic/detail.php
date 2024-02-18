<?php
/**
 * @var SeomaticPanel $panel
 * @var View $this
 */

use craft\web\View;
use nystudio107\codeeditor\assetbundles\codeeditor\CodeEditorAsset;
use nystudio107\seomatic\debug\assets\DebugAsset;
use nystudio107\seomatic\debug\panels\SeomaticPanel;
use nystudio107\seomatic\events\MetaBundleDebugDataEvent;
use yii\helpers\Html;

DebugAsset::register($this);
$bundle = CodeEditorAsset::register($this);
?>
<style>
    @font-face {
        font-family: "codicon-override";
        src: url("<?= $bundle->baseUrl ?>/fonts/codicon.ttf") format("truetype");
    }
</style>
<script>
  window.codeEditorBaseAssetsUrl = "<?= $bundle->baseUrl ?>/";
</script>

<h1>SEOmatic</h1>

<?php

const SECTIONS = [
    'Tags' => [],
    'Variables' => [],
];
const NAV_ITEMS = [
    'Combined' => MetaBundleDebugDataEvent::COMBINED_META_BUNDLE,
    'Entry SEO' => MetaBundleDebugDataEvent::FIELD_META_BUNDLE,
    'Content SEO' => MetaBundleDebugDataEvent::CONTENT_META_BUNDLE,
    'Global SEO' => MetaBundleDebugDataEvent::GLOBAL_META_BUNDLE,
];

const VARIABLE_PROPERTY_STRINGS = [
    'twig' => [
        'getComment' => '{#-- Get the value --#}',
        'get' => '{% set value = seomatic.SERVICE_NAME.PROPERTY_NAME %}',
        'setComment' => '{#-- Set the value --#}',
        'set' => '{% do seomatic.SERVICE_NAME.PROPERTY_NAME(value) %}',
    ],
    'php' => [
        'getComment' => '/*-- Get the value --*/',
        'get' => '$value = Seomatic::$seomaticVariable->SERVICE_NAME->PROPERTY_NAME;',
        'setComment' => '/*-- Set the value --*/',
        'set' => 'Seomatic::$seomaticVariable->SERVICE_NAME->PROPERTY_NAME($value);',
    ],
];

const TAG_STRINGS = [
    'twig' => [
        'getComment' => '{# TWIG_VAR_HINT #}',
        'get' => '{% set tag = seomatic.SERVICE_NAME.get(\'TAG_NAME\') %}',
    ],
    'php' => [
        'getComment' => '/*-- Get the tag --*/',
        'get' => '$tag = Seomatic::$seomaticVariable->SERVICE_NAME->get(\'TAG_NAME\');',
    ],
];

const TAG_PROPERTY_STRINGS = [
    'twig' => [
        'getComment' => '{#-- Get the value --#}',
        'get' => '{% set value = seomatic.SERVICE_NAME.get(\'TAG_NAME\').PROPERTY_NAME %}',
        'setComment' => '{#-- Set the value --#}',
        'set' => '{% do seomatic.SERVICE_NAME.get(\'TAG_NAME\').PROPERTY_NAME(value) %}',
    ],
    'php' => [
        'getComment' => '/*-- Get the value --*/',
        'get' => '$value = Seomatic::$seomaticVariable->SERVICE_NAME->get(\'TAG_NAME\')->PROPERTY_NAME;',
        'setComment' => '/*-- Set the value --*/',
        'set' => 'Seomatic::$seomaticVariable->SERVICE_NAME->get(\'TAG_NAME\')->PROPERTY_NAME($value);',
    ],
];

const METABUNDLE_VARS = [
    'metaGlobalVars' => [
        'caption' => 'Meta Global Vars',
        'SERVICE_NAME' => 'meta',
        'TWIG_VAR_HINT' => '@var vars \nystudio107\seomatic\models\MetaGlobalVars',
    ],
    'metaSiteVars' => [
        'caption' => 'Meta Site Vars',
        'SERVICE_NAME' => 'site',
        'TWIG_VAR_HINT' => '@var vars \nystudio107\seomatic\models\MetaSiteVars',
    ],
    'metaSitemapVars' => [
        'caption' => 'Meta Sitemap Vars',
        'SERVICE_NAME' => 'sitemap',
        'TWIG_VAR_HINT' => '@var vars \nystudio107\seomatic\models\MetaSitemapVars',
    ],
];

const METABUNDLE_CONTAINERS = [
    'MetaTagContainergeneral' => [
        'SERVICE_NAME' => 'tag',
        'TWIG_VAR_HINT' => '@var tag \nystudio107\seomatic\models\MetaTag',
    ],
    'MetaTagContaineropengraph' => [
        'SERVICE_NAME' => 'tag',
        'TWIG_VAR_HINT' => '@var tag \nystudio107\seomatic\models\MetaTag',
    ],
    'MetaTagContainertwitter' => [
        'SERVICE_NAME' => 'tag',
        'TWIG_VAR_HINT' => '@var tag \nystudio107\seomatic\models\MetaTag',
    ],
    'MetaTagContainermiscellaneous' => [
        'SERVICE_NAME' => 'tag',
        'TWIG_VAR_HINT' => '@var tag \nystudio107\seomatic\models\MetaTag',
    ],
    'MetaLinkContainergeneral' => [
        'SERVICE_NAME' => 'link',
        'TWIG_VAR_HINT' => '@var tag \nystudio107\seomatic\models\MetaLink',
    ],
    'MetaScriptContainergeneral' => [
        'SERVICE_NAME' => 'script',
        'TWIG_VAR_HINT' => '@var tag \nystudio107\seomatic\models\MetaScript',
    ],
    'MetaJsonLdContainergeneral' => [
        'SERVICE_NAME' => 'jsonLd',
        'TWIG_VAR_HINT' => '@var tag \nystudio107\seomatic\models\MetaJsonLd',
    ],
    'MetaTitleContainergeneral' => [
        'SERVICE_NAME' => 'title',
        'TWIG_VAR_HINT' => '@var tag \nystudio107\seomatic\models\MetaTitle',
    ],
];

$sections = [];
foreach (SECTIONS as $sectionName => $section) {
    $items = [
        'nav' => [],
        'heading' => '',
        'content' => [],
    ];

    foreach (NAV_ITEMS as $navTitle => $metaBundleCategory) {
        $content = '';
        $items['nav'][] = $navTitle;
        switch ($sectionName) {
            case 'Tags':
                $items['heading'] = '<p>Tags are objects that represent rendered HTML tags the in the webpage. Tags are grouped together into containers for organizational purposes.</p><p><a href="https://nystudio107.com/docs/seomatic/using.html#seomatic-tags-containers" target="_blank">SEOmatic Tags documentation</a></p>';
                $metaContainers = $panel->data[$metaBundleCategory]['unparsed']['metaContainers'] ?? [];
                if (empty($metaContainers)) {
                    $content .= '<div class="callout callout-secondary seomatic-callout">no containers present</div>';
                }
                foreach ($metaContainers as $metaContainerName => $metaContainer) {
                    $content .= $this->render('tag-table', [
                        'caption' => $metaContainer['description'],
                        'values' => [
                            'meta' => METABUNDLE_CONTAINERS[$metaContainerName],
                            'unparsed' => $panel->data[$metaBundleCategory]['unparsed']['metaContainers'][$metaContainerName]['data'] ?? [],
                            'parsed' => $panel->data[$metaBundleCategory]['parsed']['metaContainers'][$metaContainerName]['data'] ?? [],
                        ],
                    ]);
                    $editorLanguage = 'html';
                    if ($metaContainerName === 'MetaJsonLdContainergeneral') {
                        $editorLanguage = 'json';
                    }
                    $content .= $this->render('rendered-tags', [
                        'values' => [
                            'renderedTags' => $panel->data[$metaBundleCategory]['renderedTags'][$metaContainerName] ?? [],
                            'id' => $sectionName . '-' . $metaBundleCategory . '-' . $metaContainerName . '-rendered-tags',
                            'view' => $this,
                            'language' => $editorLanguage,
                        ],
                    ]);
                }
                break;
            case 'Variables':
                $items['heading'] = '<p>Variables are used throughout SEOmatic when rendering tags, or controlling how tags are rendered. Tag properties often reference these variables via Twig expressions.</p><p><a href="https://nystudio107.com/docs/seomatic/using.html#seomatic-variables" target="_blank">SEOmatic Variables documentation</a></p>';
                foreach (METABUNDLE_VARS as $varName => $varsMeta) {
                    $content .= $this->render('vars-table', [
                        'caption' => $varsMeta['caption'],
                        'values' => [
                            'meta' => $varsMeta,
                            'unparsed' => $panel->data[$metaBundleCategory]['unparsed'][$varName] ?? [],
                            'parsed' => $panel->data[$metaBundleCategory]['parsed'][$varName] ?? [],
                        ],
                    ]);
                }
                break;
            default:
                break;
        }

        $items['content'][] = $content;
    }

    $sections[$sectionName] = $items;
}
?>
<?php $firstLoop = true; ?>
<ul class="nav nav-tabs">
    <?php foreach ($sections as $sectionName => $section): ?>
        <?php
        echo Html::tag(
            'li',
            Html::a($sectionName, "#r-tab-{$sectionName}", [
                'class' => $firstLoop ? 'nav-link active' : 'nav-link',
                'data-toggle' => 'tab',
                'role' => 'tab',
                'aria-controls' => "r-tab-{$sectionName}",
                'aria-selected' => $firstLoop ? 'true' : 'false',
            ]),
            [
                'class' => 'nav-item',
            ]
        );
        ?>
        <?php $firstLoop = false; ?>
    <?php endforeach; ?>
</ul>
<?php $firstLoop = true; ?>
<?php foreach ($sections as $sectionName => $section): ?>
    <?php $items = $section; ?>
    <div class="tab-content">
        <div class="<?= $firstLoop ? 'tab-pane fade active show' : 'tab-pane fade' ?>"
             id="<?= "r-tab-{$sectionName}" ?>">
            <?php
            echo Html::tag('div', $items['heading'], [
            ]);
            ?>
            <ul class="nav nav-tabs bundle-tabs">
                <?php
                foreach ($items['nav'] as $k => $item) {
                    echo Html::tag(
                        'li',
                        Html::a($item, "#r-tab-{$sectionName}-{$k}", [
                            'class' => $k === 0 ? 'nav-link bundle-tabs active' : 'nav-link bundle-tabs',
                            'data-toggle' => 'tab',
                            'role' => 'tab',
                            'aria-controls' => "r-tab-{$sectionName}-{$k}",
                            'aria-selected' => $k === 0 ? 'true' : 'false',
                        ]),
                        [
                            'class' => 'nav-item',
                        ]
                    );
                }
                ?>
            </ul>
            <div class="tab-content">
                <?php
                foreach ($items['content'] as $k => $item) {
                    echo Html::tag('div', $item, [
                        'class' => $k === 0 ? 'tab-pane fade active show' : 'tab-pane fade',
                        'id' => "r-tab-{$sectionName}-{$k}",
                    ]);
                }
                ?>
            </div>
        </div>
    </div>
    <?php $firstLoop = false; ?>
<?php endforeach; ?>
