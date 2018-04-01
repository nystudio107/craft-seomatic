<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2017 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\fields;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\assetbundles\seomatic\SeomaticAsset;
use nystudio107\seomatic\helpers\ArrayHelper;
use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\helpers\Field as FieldHelper;
use nystudio107\seomatic\helpers\ImageTransform as ImageTransformHelper;
use nystudio107\seomatic\models\MetaBundle;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\elements\Asset;
use craft\helpers\Json;

use yii\base\InvalidConfigException;
use yii\db\Schema;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SeoSettings extends Field
{
    // Public Properties
    // =========================================================================

    /**
     * @var bool
     */
    public $generalTabEnabled;

    /**
     * @var array
     */
    public $generalEnabledFields;

    /**
     * @var bool
     */
    public $twitterTabEnabled;

    /**
     * @var array
     */
    public $twitterEnabledFields;

    /**
     * @var bool
     */
    public $facebookTabEnabled;

    /**
     * @var array
     */
    public $facebookEnabledFields;

    /**
     * @var bool
     */
    public $sitemapTabEnabled;

    /**
     * @var array
     */
    public $sitemapEnabledFields;

    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('seomatic', 'SEO Settings');
    }

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function getContentColumnType(): string
    {
        return Schema::TYPE_TEXT;
    }

    /**
     * @inheritdoc
     */
    public function normalizeValue($value, ElementInterface $element = null)
    {
        $config = [];
        if (!empty($value) && is_string($value)) {
            $config = Json::decode($value);
        }
        if (is_array($value)) {
            $config = $value;
        }
        // Create a new meta bundle with propagated defaults
        $metaBundleDefaults = ArrayHelper::merge(
            ConfigHelper::getConfigFromFile('fieldmeta/Bundle'),
            $config
        );
        $model = MetaBundle::create($metaBundleDefaults);

        return $model;
    }

    /**
     * @inheritdoc
     */
    public function serializeValue($value, ElementInterface $element = null)
    {
        /** @var MetaBundle $value */
        return parent::serializeValue($value, $element);
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        $variables = [];
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
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
    public function getInputHtml($value, ElementInterface $element = null): string
    {
        $variables = [];
        // Asset bundle
        try {
            Seomatic::$view->registerAssetBundle(SeomaticAsset::class);
        } catch (InvalidConfigException $e) {
            Craft::error($e->getMessage(), __METHOD__);
        }
        $variables['baseAssetsUrl'] = Craft::$app->assetManager->getPublishedUrl(
            '@nystudio107/seomatic/assetbundles/seomatic/dist',
            true
        );
        // Basic variables
        $variables['name'] = $this->handle;
        $variables['value'] = $value;
        $variables['field'] = $this;
        $variables['currentSourceBundleType'] = 'entry';

        // Get our id and namespace
        $id = Craft::$app->getView()->formatInputId($this->handle);
        $nameSpacedId = Craft::$app->getView()->namespaceInputId($id);
        $variables['id'] = $id;
        $variables['nameSpacedId'] = $nameSpacedId;
        // Pull field sources
        $variables['assetVolumeTextFieldSources'] = array_merge(
            ['entryGroup' => ['optgroup' => 'Asset Volume Fields'], 'title' => 'Title'],
            FieldHelper::fieldsOfTypeFromAssetVolumes(
                FieldHelper::TEXT_FIELD_CLASS_KEY,
                false
            )
        );

        /** @var MetaBundle $value */
        $variables['elementType'] = Asset::class;
        $variables['seoImageElements'] = ImageTransformHelper::assetElementsFromIds(
            $value->metaBundleSettings->seoImageIds,
            null
        );
        $variables['twitterImageElements'] = ImageTransformHelper::assetElementsFromIds(
            $value->metaBundleSettings->twitterImageIds,
            null
        );
        $variables['ogImageElements'] = ImageTransformHelper::assetElementsFromIds(
            $value->metaBundleSettings->ogImageIds,
            null
        );

        // Variables to pass down to our field JavaScript to let it namespace properly
        $jsonVars = [
            'id' => $id,
            'name' => $this->handle,
            'namespace' => $nameSpacedId,
            'prefix' => Craft::$app->getView()->namespaceInputId(''),
        ];
        $jsonVars = Json::encode($jsonVars);
        //Craft::$app->getView()->registerJs("$('#{$nameSpacedId}-field').RecipeRecipe(".$jsonVars.");");

        // Render the input template
        return Craft::$app->getView()->renderTemplate('seomatic/_components/fields/SeoSettings_input', $variables);
    }
}
