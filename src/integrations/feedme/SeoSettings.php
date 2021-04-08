<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * @link      https://nystudio107.com/
 * @copyright Copyright (c) 2020 nystudio107
 * @license   https://nystudio107.com/license
 */

namespace nystudio107\seomatic\integrations\feedme;

use nystudio107\seomatic\fields\SeoSettings as SeoSettingsField;

use Craft;
use craft\db\Query;
use craft\db\Table;
use craft\elements\Asset as AssetElement;
use craft\helpers\ArrayHelper;
use craft\helpers\Db;
use craft\helpers\UrlHelper;

use craft\feedme\base\Field as FeedMeField;
use craft\feedme\base\FieldInterface as FeedMeFieldInterface;
use craft\feedme\helpers\AssetHelper;
use craft\feedme\helpers\DataHelper;

use Cake\Utility\Hash;

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
    public function getMappingTemplate()
    {
        return 'seomatic/_includes/integrations/feedme/seo-settings';
    }

    /**
     * @inheritDoc
     */
    public function parseField()
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

        // Rip out the asset images to put them in the right place
        $assetMappings = array_filter([
            'seoImage' => ArrayHelper::remove($preppedData['metaGlobalVars'], 'seoImage'),
            'twitterImage' => ArrayHelper::remove($preppedData['metaGlobalVars'], 'twitterImage'),
            'ogImage' => ArrayHelper::remove($preppedData['metaGlobalVars'], 'ogImage'),
        ]);

        // Provide the respective mapping key to the destination property name. Done this way for
        // backward compatibility. This is because asset IDs are stored on `metaGlobalVars`.
        $assetPropertyMapping = [
            'seoImage' => 'seoImageIds',
            'twitterImage' => 'twitterImageIds',
            'ogImage' => 'ogImageIds',
        ];

        foreach ($assetMappings as $key => $assetMapping) {
            $fieldInfo = Hash::get($this->fieldInfo, "fields.metaGlobalVars.{$key}");

            if ($assetIds = $this->parseImage($assetMapping, $fieldInfo)) {
                $preppedData['metaBundleSettings'][$assetPropertyMapping[$key]] = $assetIds;
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
    protected function parseImage($value, $fieldInfo)
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
    }
}
