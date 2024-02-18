<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\helpers;

use craft\base\Element;
use nystudio107\seomatic\helpers\Field as FieldHelper;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Migration
{
    // Constants
    // =========================================================================

    public const FIELD_MIGRATION_CONTEXT = 'field';
    public const SECTION_MIGRATION_CONTEXT = 'section';

    public const MIGRATION_CONTEXTS = [
        self::FIELD_MIGRATION_CONTEXT => [
            'metaGlobalVars' => [
                'mainEntityOfPage' => 'seoMainEntityOfPage',
                'seoTitle' => 'seoTitle',
                'seoDescription' => 'seoDescription',
                'seoKeywords' => 'seoKeywords',
                'canonicalUrl' => 'canonicalUrlOverride',
                'robots' => 'robots',
                'ogType' => 'openGraphType',
            ],
            'metaBundleSettings' => [
                'siteType' => 'seoMainEntityCategory',
                'siteSubType' => 'seoMainEntityOfPage',
                'seoTitleSource' => 'seoTitleSource',
                'seoTitleField' => 'seoTitleSourceField',
                'seoDescriptionSource' => 'seoDescriptionSource',
                'seoDescriptionField' => 'seoDescriptionSourceField',
                'seoKeywordsSource' => 'seoKeywordsSource',
                'seoKeywordsField' => 'seoKeywordsSourceField',
                'seoImageIds' => 'seoImageId',
                'seoImageSource' => 'seoImageIdSource',
                'seoImageField' => 'seoImageIdSourceField',
                'twitterImageIds' => 'seoTwitterImageId',
                'twitterImageSource' => 'seoTwitterImageIdSource',
                'twitterImageField' => 'seoTwitterImageIdSourceField',
                'ogImageIds' => 'seoFacebookImageId',
                'ogImageSource' => 'seoFacebookImageIdSource',
                'ogImageField' => 'seoFacebookImageIdSourceField',
            ],
        ],
        self::SECTION_MIGRATION_CONTEXT => [
            'metaGlobalVars' => [
                'mainEntityOfPage' => 'seoMainEntityOfPage',
                'robots' => 'robots',
                'ogType' => 'openGraphType',
            ],
            'metaBundleSettings' => [
                'siteType' => 'seoMainEntityCategory',
                'siteSubType' => 'seoMainEntityOfPage',
                'seoTitleSource' => 'seoTitleSource',
                'seoTitleField' => 'seoTitleSourceField',
                'seoDescriptionSource' => 'seoDescriptionSource',
                'seoDescriptionField' => 'seoDescriptionSourceField',
                'seoKeywordsSource' => 'seoKeywordsSource',
                'seoKeywordsField' => 'seoKeywordsSourceField',
                'seoImageIds' => 'seoImageId',
                'seoImageSource' => 'seoImageIdSource',
                'seoImageField' => 'seoImageIdSourceField',
                'twitterImageIds' => 'seoTwitterImageId',
                'twitterImageSource' => 'seoTwitterImageIdSource',
                'twitterImageField' => 'seoTwitterImageIdSourceField',
                'ogImageIds' => 'seoFacebookImageId',
                'ogImageSource' => 'seoFacebookImageIdSource',
                'ogImageField' => 'seoFacebookImageIdSourceField',
            ],
        ],
    ];

    public const ARRAY_VALUE_MAP = [
    ];

    public const FIELD_VALUE_MAP = [
        'seoTitleSource' => [
            'field' => 'fromField',
            'custom' => 'fromCustom',
        ],
        'seoDescriptionSource' => [
            'field' => 'fromField',
            'custom' => 'fromCustom',
        ],
        'seoKeywordsSource' => [
            'field' => 'fromField',
            'custom' => 'fromCustom',
            'keywords' => 'keywordsFromField',
        ],
        'seoImageSource' => [
            'field' => 'fromField',
            'custom' => 'fromAsset',
        ],
        'twitterImageSource' => [
            'field' => 'fromField',
            'custom' => 'fromAsset',
        ],
        'ogImageSource' => [
            'field' => 'fromField',
            'custom' => 'fromAsset',
        ],
    ];

    // Static Methods
    // =========================================================================

    /**
     * @param null|Element $element
     * @param string $mapContext
     *
     * @return array
     */
    public static function configFromSeomaticMeta($element, string $mapContext): array
    {
        $config = [];

        if ($element === null) {
            return $config;
        }
        if (empty(self::MIGRATION_CONTEXTS[$mapContext])) {
            return $config;
        }
        $migrationFieldsArrays = self::MIGRATION_CONTEXTS[$mapContext];

        $fieldHandles = FieldHelper::fieldsOfTypeFromElement($element, FieldHelper::OLD_SEOMATIC_META_CLASS_KEY, true);
        foreach ($fieldHandles as $fieldHandle) {
            if (!empty($element->$fieldHandle)) {
                $fieldValue = $element->$fieldHandle;
                $config = self::seomaticMetaFieldMappings($migrationFieldsArrays, $fieldValue);
            }
        }

        return $config;
    }

    // Protected Methods
    // =========================================================================

    /**
     * @param array $migrationFieldsArrays
     * @param       $fieldValue
     *
     * @return array
     */
    protected static function seomaticMetaFieldMappings(array $migrationFieldsArrays, $fieldValue): array
    {
        $config = [];

        foreach ($migrationFieldsArrays as $migrationFieldKey => $migrationFieldsArray) {
            /** @var array $migrationFieldsArray */
            foreach ($migrationFieldsArray as $mapFieldTo => $mapFieldFrom) {
                if (!empty($fieldValue[$mapFieldFrom])) {
                    $value = $fieldValue[$mapFieldFrom];
                    // Map the value if necessary
                    if (!empty(self::FIELD_VALUE_MAP[$mapFieldTo])
                        && !empty(self::FIELD_VALUE_MAP[$mapFieldTo][$value])) {
                        $value = self::FIELD_VALUE_MAP[$mapFieldTo][$value];
                    }
                    // Map it to an array of values if needs be
                    /* -- This never happens
                    if (\in_array($mapFieldTo, self::ARRAY_VALUE_MAP, true)) {
                        $value = [$value];
                    }
                    */
                    $config[$migrationFieldKey][$mapFieldTo] = $value;
                }
            }
        }

        return $config;
    }
}
