<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\fields;

use Craft;
use craft\base\Element;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\base\PreviewableFieldInterface;
use craft\elements\Asset;
use craft\helpers\Json;
use craft\helpers\StringHelper;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\Migration as MigrationHelper;
use nystudio107\seomatic\helpers\PullField as PullFieldHelper;
use nystudio107\seomatic\helpers\Schema as SchemaHelper;
use nystudio107\seomatic\models\MetaBundle;
use nystudio107\seomatic\seoelements\SeoEntry;
use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\MetaContainers;
use ReflectionClass;
use yii\base\InvalidConfigException;
use yii\caching\TagDependency;
use yii\db\Schema;
use function in_array;
use function is_array;
use function is_object;
use function is_string;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SeoSettings extends Field implements PreviewableFieldInterface
{
    // Constants
    // =========================================================================

    public const CACHE_KEY = 'seomatic_fieldmeta_';

    public const BUNDLE_COMPARE_FIELDS = [
        'metaGlobalVars',
    ];

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $elementDisplayPreviewType = 'google';

    /**
     * @var bool
     */
    public $generalTabEnabled = true;

    /**
     * @var array
     */
    public $generalEnabledFields = [
        'seoTitle',
        'seoDescription',
        'seoImage',
    ];

    /**
     * @var bool
     */
    public $twitterTabEnabled = false;

    /**
     * @var array
     */
    public $twitterEnabledFields = [];

    /**
     * @var bool
     */
    public $facebookTabEnabled = false;

    /**
     * @var array
     */
    public $facebookEnabledFields = [];

    /**
     * @var bool
     */
    public $sitemapTabEnabled = false;

    /**
     * @var array
     */
    public $sitemapEnabledFields = [];

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function dbType(): array|string|null
    {
        return Schema::TYPE_TEXT;
    }

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('seomatic', 'SEO Settings');
    }

    /**
     * @inheritdoc
     */
    public static function icon(): string
    {
        return '@nystudio107/seomatic/icon-mask.svg';
    }

    /**
     * @inheritdoc
     */
    public static function phpType(): string
    {
        return sprintf('\\%s', MetaBundle::class);
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [
                [
                    'elementDisplayPreviewType',
                ],
                'string',
            ],
            [
                [
                    'generalTabEnabled',
                    'twitterTabEnabled',
                    'facebookTabEnabled',
                    'sitemapTabEnabled',
                ],
                'boolean',
            ],
            [
                [
                    'generalEnabledFields',
                    'twitterEnabledFields',
                    'facebookEnabledFields',
                    'sitemapEnabledFields',
                ],
                'each', 'rule' => ['string'],
            ],

        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     * @since 2.0.0
     */
    public function useFieldset(): bool
    {
        return false;
    }

    /**
     * @inheritdoc
     */
    public function normalizeValue(mixed $value, ?ElementInterface $element = null): mixed
    {
        $config = [];
        // Handle incoming values potentially being JSON, an array, or an object
        if (!empty($value)) {
            if (is_string($value)) {
                // Decode any html entities
                $value = html_entity_decode($value, ENT_NOQUOTES, 'UTF-8');
                $config = Json::decodeIfJson($value);
            }
            if (is_array($value)) {
                $config = $value;
            }
            if (is_object($value) && $value instanceof MetaBundle) {
                $config = $value->toArray();
            }
        } else {
            /** @var null|Element $element */
            $config = MigrationHelper::configFromSeomaticMeta(
                $element,
                MigrationHelper::FIELD_MIGRATION_CONTEXT
            );
        }
        // If the config isn't empty, do some processing on the values
        if (!empty($config)) {
            $elementName = '';
            /** @var Element $element */
            if ($element !== null) {
                $reflector = new ReflectionClass($element);
                $elementName = strtolower($reflector->getShortName());
            }
            // Handle the pull fields
            if (!empty($config['metaGlobalVars']) && !empty($config['metaBundleSettings'])) {
                PullFieldHelper::parseTextSources(
                    $elementName,
                    $config['metaGlobalVars'],
                    $config['metaBundleSettings']
                );
                PullFieldHelper::parseImageSources(
                    $elementName,
                    $config['metaGlobalVars'],
                    $config['metaBundleSettings'],
                    null
                );
            }
            // Handle the mainEntityOfPage
            $mainEntity = '';
            if (in_array('mainEntityOfPage', (array)$this->generalEnabledFields, false) &&
                !empty($config['metaBundleSettings'])) {
                $mainEntity = SchemaHelper::getSpecificEntityType($config['metaBundleSettings'], true);
            }
            if (!empty($config['metaGlobalVars'])) {
                /* @var array $config */
                $config['metaGlobalVars']['mainEntityOfPage'] = $mainEntity;
            }
        }
        // Create a new meta bundle with propagated defaults
        $metaBundleDefaults = ArrayHelper::merge(
            ConfigHelper::getConfigFromFile('fieldmeta/Bundle'),
            $config
        );

        return MetaBundle::create($metaBundleDefaults);
    }

    /**
     * @inheritdoc
     */
    public function serializeValue(mixed $value, ?ElementInterface $element = null): mixed
    {
        $value = parent::serializeValue($value, $element);
        if (!Craft::$app->getDb()->getSupportsMb4()) {
            if (is_string($value)) {
                // Encode any 4-byte UTF-8 characters.
                $value = StringHelper::encodeMb4($value);
            }
            if (is_array($value)) {
                array_walk_recursive($value, function(&$arrayValue, $arrayKey) {
                    if ($arrayValue !== null && is_string($arrayValue)) {
                        $arrayValue = StringHelper::encodeMb4($arrayValue);
                    }
                });
            }
        }

        return $value;
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml(): ?string
    {
        $variables = [];
        $tagOptions = [
            'depends' => [
                'nystudio107\\seomatic\\assetbundles\\seomatic\\SeomaticAsset',
            ],
        ];
        // JS/CSS modules
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
            Seomatic::$plugin->vite->register('src/js/seomatic.js', false, $tagOptions, $tagOptions);
            Seomatic::$plugin->vite->register('src/js/seomatic-meta.js', false, $tagOptions, $tagOptions);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        // Asset bundle
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/web/assets/dist',
            true
        );
        $variables['field'] = $this;

        // Render the settings template
        return Craft::$app->getView()->renderTemplate(
            'seomatic/_components/fields/SeoSettings_settings',
            $variables
        );
    }

    /**
     * @inheritdoc
     */
    public function getInputHtml(mixed $value, ?ElementInterface $element = null): string
    {
        $variables = [];
        // JS/CSS modules
        $tagOptions = [
            'depends' => [
                'nystudio107\\seomatic\\assetbundles\\seomatic\\SeomaticAsset',
            ],
        ];
        // JS/CSS modules
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
            Seomatic::$plugin->vite->register('src/js/seomatic.js', false, $tagOptions, $tagOptions);
            Seomatic::$plugin->vite->register('src/js/seomatic-meta.js', false, $tagOptions, $tagOptions);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        // Asset bundle
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/web/assets/dist',
            true
        );
        // Basic variables
        $variables['name'] = $this->handle;
        $variables['value'] = $value;
        $variables['field'] = $this;
        $variables['currentSourceBundleType'] = 'entry';
        $variables['entitySchemaPath'] = SchemaHelper::getEntityPath($value->metaBundleSettings);

        // Get our id and namespace
        $id = Craft::$app->getView()->formatInputId($this->handle);
        $nameSpacedId = Craft::$app->getView()->namespaceInputId($id);
        $variables['id'] = $id;
        $variables['nameSpacedId'] = $nameSpacedId;

        // Make sure the *Sources variables at least exist, for things like the QuickPost widget
        $variables['textFieldSources'] = [];
        $variables['assetFieldSources'] = [];
        $variables['assetVolumeTextFieldSources'] = [];
        $variables['userFieldSources'] = [];
        // Pull field sources
        if ($element !== null) {
            /** @var Element $element */
            $this->setContentFieldSourceVariables($element, 'Entry', $variables);
        }

        /** @var MetaBundle $value */
        $variables['elementType'] = Asset::class;

        $variables['parentBundles'] = [];
        // Preview the containers so the preview is correct in the field
        if ($element !== null && $element->uri !== null) {
            Seomatic::$plugin->metaContainers->previewMetaContainers($element->uri, $element->siteId, true, true, $element);
            $contentMeta = Seomatic::$plugin->metaBundles->getContentMetaBundleForElement($element);
            $globalMeta = Seomatic::$plugin->metaBundles->getGlobalMetaBundle($element->siteId);
            $variables['parentBundles'] = [$contentMeta, $globalMeta];
        }

        // Render the input template
        return Craft::$app->getView()->renderTemplate(
            'seomatic/_components/fields/SeoSettings_input',
            $variables
        );
    }

    /**
     * @inheritdoc
     */
    public function getTableAttributeHtml(mixed $value, ElementInterface $element): string
    {
        $html = '';
        // Reset this each time to avoid caching issues
        Seomatic::$previewingMetaContainers = false;
        /** @var Element $element */
        if ($element !== null && $element->uri !== null) {
            $siteId = $element->siteId;
            $uri = $element->uri;
            $cacheKey = self::CACHE_KEY . $uri . $siteId . $this->elementDisplayPreviewType;
            $metaBundleSourceType = Seomatic::$plugin->seoElements->getMetaBundleTypeFromElement($element);
            $seoElement = Seomatic::$plugin->seoElements->getSeoElementByMetaBundleType($metaBundleSourceType);
            $metaBundleSourceType = SeoEntry::getMetaBundleType();
            $metaBundleSourceId = '';
            if ($seoElement !== null) {
                $metaBundleSourceId = $seoElement::sourceIdFromElement($element);
            }
            $dependency = new TagDependency([
                'tags' => [
                    MetaContainers::GLOBAL_METACONTAINER_CACHE_TAG,
                    MetaContainers::METACONTAINER_CACHE_TAG . $metaBundleSourceId . $metaBundleSourceType . $siteId,
                    MetaContainers::METACONTAINER_CACHE_TAG . $uri . $siteId,
                ],
            ]);
            $cache = Craft::$app->getCache();
            $cacheDuration = null;
            $html = $cache->getOrSet(
                self::CACHE_KEY . $cacheKey,
                function() use ($uri, $siteId, $element) {
                    Seomatic::$plugin->metaContainers->previewMetaContainers($uri, $siteId, true, true, $element);
                    $variables = [
                        'previewTypes' => [
                            $this->elementDisplayPreviewType,
                        ],
                        'previewElementId' => $element->id,
                    ];
                    // Render our preview table template
                    if (Seomatic::$matchedElement) {
                        return Craft::$app->getView()->renderTemplate(
                            'seomatic/_includes/table-preview.twig',
                            $variables
                        );
                    }

                    return '';
                },
                $cacheDuration,
                $dependency
            );
        }

        // Render the input template
        return $html;
    }

    // Protected Methods
    // =========================================================================

    /**
     * @param Element $element
     * @param string $groupName
     * @param array $variables
     */
    protected function setContentFieldSourceVariables(
        Element $element,
        string  $groupName,
        array   &$variables,
    ) {
        $variables['textFieldSources'] = array_merge(
            ['entryGroup' => ['optgroup' => $groupName . ' Fields'], 'title' => 'Title'],
            FieldHelper::fieldsOfTypeFromElement(
                $element,
                FieldHelper::TEXT_FIELD_CLASS_KEY,
                false
            )
        );
        $variables['assetFieldSources'] = array_merge(
            ['entryGroup' => ['optgroup' => $groupName . ' Fields']],
            FieldHelper::fieldsOfTypeFromElement(
                $element,
                FieldHelper::ASSET_FIELD_CLASS_KEY,
                false
            )
        );
        $variables['assetVolumeTextFieldSources'] = array_merge(
            ['entryGroup' => ['optgroup' => 'Asset Volume Fields'], 'title' => 'Title'],
            FieldHelper::fieldsOfTypeFromAssetVolumes(
                FieldHelper::TEXT_FIELD_CLASS_KEY,
                false
            )
        );
        $variables['userFieldSources'] = array_merge(
            ['entryGroup' => ['optgroup' => 'User Fields']],
            FieldHelper::fieldsOfTypeFromUsers(
                FieldHelper::TEXT_FIELD_CLASS_KEY,
                false
            )
        );
    }
}
