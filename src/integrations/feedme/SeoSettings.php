<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2020 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\integrations\feedme;

use Cake\Utility\Hash;
use craft\db\Query;
use craft\db\Table;
use craft\elements\Asset as AssetElement;
use craft\feedme\base\Field as FeedMeField;
use craft\feedme\base\FieldInterface as FeedMeFieldInterface;
use craft\feedme\helpers\AssetHelper;
use craft\feedme\helpers\DataHelper;
use craft\helpers\ArrayHelper;
use craft\helpers\UrlHelper;
use nystudio107\seomatic\fields\SeoSettings as SeoSettingsField;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.3.0
 */
class SeoSettings extends FeedMeField implements FeedMeFieldInterface
{
    // Public Static Properties
    // =========================================================================

    public static $name = 'SEO Settings';
    public static $class = SeoSettingsField::class;

    // Public Methods
    // =========================================================================

    /**
     * @inheritDoc
     */
    public function getMappingTemplate(): string
    {
        return 'seomatic/_includes/integrations/feedme/seo-settings';
    }

    /**
     * @inheritDoc
     */
    public function parseField(): mixed
    {
        $preppedData = [];

        $fields = Hash::get($this->fieldInfo, 'fields');

        if (!$fields) {
            return null;
        }

        foreach ($fields as $subGroupHandle => $subGroup) {
            foreach ($subGroup as $subFieldHandle => $subFieldInfo) {
                $preppedData[$subGroupHandle][$subFieldHandle] = DataHelper::fetchValue($this->feedData, $subFieldInfo);
            }
        }

        // Protect against sending an empty array
        if (!$preppedData) {
            return null;
        }

        // Rip out asset related settings to place in `metaBundleSettings`
        $preppedData['metaBundleSettings'] = array_filter([
            'seoImageSource' => ArrayHelper::remove($preppedData['metaGlobalVars'], 'seoImageSource'),
            'twitterImageSource' => ArrayHelper::remove($preppedData['metaGlobalVars'], 'twitterImageSource'),
            'ogImageSource' => ArrayHelper::remove($preppedData['metaGlobalVars'], 'ogImageSource'),
        ]);

        // Rip out asset images we need to upload or fetch as actual IDs
        $assetMappings = array_filter([
            'seoImageIds' => ArrayHelper::remove($preppedData['metaGlobalVars'], 'seoImageIds'),
            'twitterImageIds' => ArrayHelper::remove($preppedData['metaGlobalVars'], 'twitterImageIds'),
            'ogImageIds' => ArrayHelper::remove($preppedData['metaGlobalVars'], 'ogImageIds'),
        ]);

        // Handle image uploads
        foreach ($assetMappings as $key => $assetMapping) {
            $fieldInfo = Hash::get($this->fieldInfo, "fields.metaGlobalVars.{$key}");

            if ($assetIds = $this->parseImage($assetMapping, $fieldInfo)) {
                $preppedData['metaBundleSettings'][$key] = $assetIds;
            }
        }

        return $preppedData;
    }

    /**
     * @param $value
     * @param $fieldInfo
     * @return int|mixed|string|null
     * @throws \yii\base\Exception
     */
    protected function parseImage($value, $fieldInfo): mixed
    {
        $upload = Hash::get($fieldInfo, 'options.upload');
        $conflict = Hash::get($fieldInfo, 'options.conflict');

        // Try to find an existing element
        $urlToUpload = null;

        // If we're uploading files, this will need to be an absolute URL. If it is, save until later.
        // We also don't check for existing assets here, so break out instantly.
        if ($upload && is_string($value) && UrlHelper::isAbsoluteUrl($value)) {
            $urlToUpload = $value;

            // If we're opting to use the already uploaded asset, we can check here
            if ($conflict === AssetElement::SCENARIO_INDEX) {
                $value = AssetHelper::getRemoteUrlFilename($value);
            }
        }

        // See if its a default asset
        if (is_array($value) && isset($value[0])) {
            return $value[0];
        }

        // Fetch all folders to search for an existing asset with the provided name
        $folderIds = (new Query())
            ->select(['id'])
            ->from([Table::VOLUMEFOLDERS])
            ->where(['not', ['volumeId' => null]])
            ->column();

        // Search anywhere in Craft
        $foundElement = AssetElement::find()
            ->filename($value)
            ->folderId($folderIds)
            ->one();

        // Do we want to match existing elements, and was one found?
        if ($foundElement && $conflict === AssetElement::SCENARIO_INDEX) {
            return [$foundElement->id];
        }

        // We can't find an existing asset, we need to download it, or plain ignore it
        if ($urlToUpload) {
            // Just get the first available folder. SEOMatic doesn't really support a nominated folder.
            $folderId = $folderIds[0];

            return AssetHelper::fetchRemoteImage([$urlToUpload], $fieldInfo, $this->feed, null, $this->element, $folderId);
        }

        return null;
    }
}
