<?php
/**
 * @var \nystudio107\seomatic\debug\panels\SeomaticPanel $panel
 */

use nystudio107\codeeditor\assetbundles\codeeditor\CodeEditorAsset;
use nystudio107\seomatic\debug\assets\DebugAsset;
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

const METABUNDLE_VARS = [
    'metaGlobalVars' => [
        'caption' => 'Meta Global Vars',
        'twig' => [
            'get' => '{{ seomatic.meta.Property }}',
            'set' => '{% do seomatic.meta.Property("Value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->meta->Property;',
            'set' => 'Seomatic::$seomaticVariable->meta->Property("Value");',
        ],
    ],
    'metaSiteVars' => [
        'caption' => 'Meta Site Vars',
        'twig' => [
            'get' => '{{ seomatic.site.Property }}',
            'set' => '{% do seomatic.site.Property("value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->site->Property;',
            'set' => 'Seomatic::$seomaticVariable->site->Property("Value");',
        ],
    ],
    'metaSitemapVars' => [
        'caption' => 'Meta Sitemap Vars',
        'twig' => [
            'get' => '{{ seomatic.sitemap.Property }}',
            'set' => '{% do seomatic.sitemap.Property("Value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->sitemap->Property;',
            'set' => 'Seomatic::$seomaticVariable->sitemap->Property("Value");',
        ],
    ],
];

const METABUNDLE_CONTAINERS = [
    'MetaTagContainergeneral' => [
        'twig' => [
            'get' => '{{ seomatic.tag.get("Tag").Property }}',
            'set' => '{% do seomatic.tag.get("Tag").Property("Value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->tag->get("Tag")->Property;',
            'set' => 'Seomatic::$seomaticVariable->tag->get("Tag")->Property("Value");',
        ],
    ],
    'MetaTagContaineropengraph' => [
        'twig' => [
            'get' => '{{ seomatic.tag.get("Tag").Property }}',
            'set' => '{% do seomatic.tag.get("Tag").Property("Value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->tag->get("Tag")->Property;',
            'set' => 'Seomatic::$seomaticVariable->tag->get("Tag")->Property("Value");',
        ],
    ],
    'MetaTagContainertwitter' => [
        'twig' => [
            'get' => '{{ seomatic.tag.get("Tag").Property }}',
            'set' => '{% do seomatic.tag.get("Tag").Property("Value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->tag->get("Tag")->Property;',
            'set' => 'Seomatic::$seomaticVariable->tag->get("Tag")->Property("Value");',
        ],
    ],
    'MetaTagContainermiscellaneous' => [
        'twig' => [
            'get' => '{{ seomatic.tag.get("Tag").Property }}',
            'set' => '{% do seomatic.tag.get("Tag").Property("Value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->tag->get("Tag")->Property;',
            'set' => 'Seomatic::$seomaticVariable->tag->get("Tag")->Property("Value");',
        ],
    ],
    'MetaLinkContainergeneral' => [
        'twig' => [
            'get' => '{{ seomatic.link.get("Tag").Property }}',
            'set' => '{% do seomatic.link.get("Tag").Property("Value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->link->get("Tag")->Property;',
            'set' => 'Seomatic::$seomaticVariable->link->get("Tag")->Property("Value");',
        ],
    ],
    'MetaScriptContainergeneral' => [
        'twig' => [
            'get' => '{{ seomatic.script.get("Tag").Property }}',
            'set' => '{% do seomatic.script.get("Tag").Property("Value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->script->get("Tag")->Property;',
            'set' => 'Seomatic::$seomaticVariable->script->get("Tag")->Property("Value");',
        ],
    ],
    'MetaJsonLdContainergeneral' => [
        'twig' => [
            'get' => '{{ seomatic.jsonLd.get("Tag").Property }}',
            'set' => '{% do seomatic.jsonLd.get("Tag").Property("Value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->jsonLd->get("Tag")->Property;',
            'set' => 'Seomatic::$seomaticVariable->jsonLd->get("Tag")->Property("Value");',
        ],
    ],
    'MetaTitleContainergeneral' => [
        'twig' => [
            'get' => '{{ seomatic.title.get("Tag").Property }}',
            'set' => '{% do seomatic.title.get("Tag").Property("Value") %}',
        ],
        'php' => [
            'get' => 'Seomatic::$seomaticVariable->title->get("Tag")->Property;',
            'set' => 'Seomatic::$seomaticVariable->title->get("Tag")->Property("Value");',
        ],
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
                    $content .= $this->render('container-table', [
                        'caption' => $metaContainer['description'],
                        'values' => [
                            'meta' => METABUNDLE_CONTAINERS[$metaContainerName],
                            'unparsed' => $panel->data[$metaBundleCategory]['unparsed']['metaContainers'][$metaContainerName]['data'] ?? [],
                            'parsed' => $panel->data[$metaBundleCategory]['parsed']['metaContainers'][$metaContainerName]['data'] ?? [],
                        ]
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
                        ]
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
                        ]
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
                'aria-selected' => $firstLoop ? 'true' : 'false'
            ]),
            [
                'class' => 'nav-item'
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
                            'aria-selected' => $k === 0 ? 'true' : 'false'
                        ]),
                        [
                            'class' => 'nav-item'
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
