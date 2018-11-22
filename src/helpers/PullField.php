<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\helpers;

use Craft;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class PullField
{
    // Constants
    // =========================================================================


    const PULL_TEXT_FIELDS = [
        ['fieldName' => 'seoTitle', 'seoField' => 'seoTitle'],
        ['fieldName' => 'siteNamePosition', 'seoField' => 'siteNamePosition'],
        ['fieldName' => 'seoDescription', 'seoField' => 'seoDescription'],
        ['fieldName' => 'seoKeywords', 'seoField' => 'seoKeywords'],
        ['fieldName' => 'seoImageDescription', 'seoField' => 'seoImageDescription'],
        ['fieldName' => 'ogTitle', 'seoField' => 'seoTitle'],
        ['fieldName' => 'ogSiteNamePosition', 'seoField' => 'siteNamePosition'],
        ['fieldName' => 'ogDescription', 'seoField' => 'seoDescription'],
        ['fieldName' => 'ogImageDescription', 'seoField' => 'seoImageDescription'],
        ['fieldName' => 'twitterTitle', 'seoField' => 'seoTitle'],
        ['fieldName' => 'twitterSiteNamePosition', 'seoField' => 'siteNamePosition'],
        ['fieldName' => 'twitterCreator', 'seoField' => 'twitterHandle'],
        ['fieldName' => 'twitterDescription', 'seoField' => 'seoDescription'],
        ['fieldName' => 'twitterImageDescription', 'seoField' => 'seoImageDescription'],
    ];

    const PULL_ASSET_FIELDS = [
        ['fieldName' => 'seoImage', 'seoField' => 'seoImage', 'transformModeField' => 'seoImageTransformMode', 'transformName' => 'base'],
        ['fieldName' => 'ogImage', 'seoField' => 'seoImage', 'transformModeField' => 'ogImageTransformMode', 'transformName' => 'facebook'],
        ['fieldName' => 'twitterImage', 'seoField' => 'seoImage', 'transformModeField' => 'twitterImageTransformMode', 'transformName' => 'twitter'],
    ];

    // Static Methods
    // =========================================================================


    /**
     * Set the text sources depending on the field settings
     *
     * @param string $elementName
     * @param        $globalsSettings
     * @param        $bundleSettings
     */
    public static function parseTextSources(string $elementName, &$globalsSettings, &$bundleSettings)
    {
        $objectPrefix = '';
        if (!empty($elementName)) {
            $elementName .= '.';
            $objectPrefix = 'object.';
        }
        foreach (self::PULL_TEXT_FIELDS as $fields) {
            $fieldName = $fields['fieldName'];
            $source = $bundleSettings[$fieldName.'Source'] ?? '';
            $sourceField = $bundleSettings[$fieldName.'Field'] ?? '';
            if (!empty($source)) {
                $seoField = $fields['seoField'];
                switch ($source) {
                    case 'sameAsSeo':
                        $globalsSettings[$fieldName] =
                            '{seomatic.meta.'.$seoField.'}';
                        break;

                    case 'sameAsSiteTwitter':
                        $globalsSettings[$fieldName] =
                            '{seomatic.site.'.$seoField.'}';
                        break;

                    case 'sameAsGlobal':
                        $globalsSettings[$fieldName] =
                            '';
                        break;

                    case 'fromField':
                        $globalsSettings[$fieldName] =
                            '{seomatic.helper.extractTextFromField('
                            .$objectPrefix.$elementName.$sourceField
                            .')}';
                        break;

                    case 'fromUserField':
                        $globalsSettings[$fieldName] =
                            '{seomatic.helper.extractTextFromField('
                            .$objectPrefix.$elementName.'author.'.$sourceField
                            .')}';
                        break;

                    case 'summaryFromField':
                        $globalsSettings[$fieldName] =
                            '{seomatic.helper.extractSummary(seomatic.helper.extractTextFromField('
                            .$objectPrefix.$elementName.$sourceField
                            .'))}';
                        break;

                    case 'keywordsFromField':
                        $globalsSettings[$fieldName] =
                            '{seomatic.helper.extractKeywords(seomatic.helper.extractTextFromField('
                            .$objectPrefix.$elementName.$sourceField
                            .'))}';
                        break;

                    case 'fromCustom':
                        break;
                }
            }
        }
    }

    /**
     * Set the image sources depending on the field settings
     *
     * @param $elementName
     * @param $globalsSettings
     * @param $bundleSettings
     * @param $siteId
     */
    public static function parseImageSources($elementName, &$globalsSettings, &$bundleSettings, $siteId = 0)
    {
        if (empty($siteId)) {
            $siteId = 0;
        }
        $objectPrefix = '';
        if (!empty($elementName)) {
            $elementName .= '.';
            $objectPrefix = 'object.';
        }
        foreach (self::PULL_ASSET_FIELDS as $fields) {
            $fieldName = $fields['fieldName'];
            $fieldNameWidth = $fields['fieldName'].'Width';
            $fieldNameHeight = $fields['fieldName'].'Height';
            $source = $bundleSettings[$fieldName.'Source'] ?? '';
            $ids = $bundleSettings[$fieldName.'Ids'] ?? [];
            $sourceField = $bundleSettings[$fieldName.'Field'] ?? '';
            if (!empty($source)) {
                $transformImage = $bundleSettings[$fieldName.'Transform'] ?? true;
                $seoField = $fields['seoField'];
                $tranformModeField = $fields['transformModeField'];
                $transformMode = $bundleSettings[$tranformModeField] ?? 'crop';
                $seoFieldWidth = $fields['seoField'].'Width';
                $seoFieldHeight = $fields['seoField'].'Height';
                $transformName = $fields['transformName'] ?? 'base';
                // Quote all the things here for clarity
                $transformName = '"'.$transformName.'"';
                $transformMode = '"'.$transformMode.'"';
                // Special-case Twitter transforms
                if ($fieldName === 'twitterImage') {
                    $transformName = 'seomatic.helper.twitterTransform()';
                }
                // Reset the fields to empty by default
                if ($source !== 'fromUrl') {
                    $globalsSettings[$fieldName] = '';
                }
                $globalsSettings[$fieldNameWidth] = '';
                $globalsSettings[$fieldNameHeight] = '';
                // Handle transformed images
                if ($transformImage) {
                    switch ($source) {
                        case 'sameAsSeo':
                            $seoSource = $bundleSettings[$seoField.'Source'] ?? '';
                            $seoIds = $bundleSettings[$seoField.'Ids'] ?? [];
                            $seoSourceField = $bundleSettings[$seoField.'Field'] ?? '';
                            if (!empty($seoSource)) {
                                switch ($seoSource) {
                                    case 'fromField':
                                        if (!empty($seoSourceField)) {
                                            $globalsSettings[$fieldName] = '{seomatic.helper.socialTransform('
                                                .$objectPrefix.$elementName.$seoSourceField.'[0]'
                                                .', '.$transformName
                                                .', '.$siteId
                                                .', '.$transformMode
                                                .')}';
                                            $globalsSettings[$fieldNameWidth] = '{seomatic.helper.socialTransformWidth('
                                                .$objectPrefix.$elementName.$seoSourceField.'[0]'
                                                .', '.$transformName
                                                .', '.$siteId
                                                .', '.$transformMode
                                                .')}';
                                            $globalsSettings[$fieldNameHeight] = '{seomatic.helper.socialTransformHeight('
                                                .$objectPrefix.$elementName.$seoSourceField.'[0]'
                                                .', '.$transformName
                                                .', '.$siteId
                                                .', '.$transformMode
                                                .')}';
                                        }
                                        break;
                                    case 'fromAsset':
                                        if (!empty($seoIds)) {
                                            $globalsSettings[$fieldName] = '{seomatic.helper.socialTransform('
                                                .$seoIds[0]
                                                .', '.$transformName
                                                .', '.$siteId
                                                .', '.$transformMode
                                                .')}';
                                            $globalsSettings[$fieldNameWidth] = '{seomatic.helper.socialTransformWidth('
                                                .$seoIds[0]
                                                .', '.$transformName
                                                .', '.$siteId
                                                .', '.$transformMode
                                                .')}';
                                            $globalsSettings[$fieldNameHeight] = '{seomatic.helper.socialTransformHeight('
                                                .$seoIds[0]
                                                .', '.$transformName
                                                .', '.$siteId
                                                .', '.$transformMode
                                                .')}';
                                        }
                                        break;
                                    default:
                                        $globalsSettings[$fieldName] = '{seomatic.meta.'.$seoField.'}';
                                        $globalsSettings[$fieldNameWidth] = '{seomatic.meta.'.$seoFieldWidth.'}';
                                        $globalsSettings[$fieldNameHeight] = '{seomatic.meta.'.$seoFieldHeight.'}';
                                        break;
                                }
                            }
                            break;
                        case 'fromField':
                            if (!empty($sourceField)) {
                                $globalsSettings[$fieldName] = '{seomatic.helper.socialTransform('
                                    .$objectPrefix.$elementName.$sourceField.'[0]'
                                    .', '.$transformName
                                    .', '.$siteId
                                    .', '.$transformMode
                                    .')}';
                                $globalsSettings[$fieldNameWidth] = '{seomatic.helper.socialTransformWidth('
                                    .$objectPrefix.$elementName.$sourceField.'[0]'
                                    .', '.$transformName
                                    .', '.$siteId
                                    .', '.$transformMode
                                    .')}';
                                $globalsSettings[$fieldNameHeight] = '{seomatic.helper.socialTransformHeight('
                                    .$objectPrefix.$elementName.$sourceField.'[0]'
                                    .', '.$transformName
                                    .', '.$siteId
                                    .', '.$transformMode
                                    .')}';
                            }
                            break;
                        case 'fromAsset':
                            if (!empty($ids)) {
                                $globalsSettings[$fieldName] = '{seomatic.helper.socialTransform('
                                    .$ids[0]
                                    .', '.$transformName
                                    .', '.$siteId
                                    .', '.$transformMode
                                    .')}';
                                $globalsSettings[$fieldNameWidth] = '{seomatic.helper.socialTransformWidth('
                                    .$ids[0]
                                    .', '.$transformName
                                    .', '.$siteId
                                    .', '.$transformMode
                                    .')}';
                                $globalsSettings[$fieldNameHeight] = '{seomatic.helper.socialTransformHeight('
                                    .$ids[0]
                                    .', '.$transformName
                                    .', '.$siteId
                                    .', '.$transformMode
                                    .')}';
                            }
                            break;
                    }
                } else {
                    switch ($source) {
                        case 'sameAsSeo':
                            $globalsSettings[$fieldName] = '{seomatic.meta.'.$seoField.'}';
                            $globalsSettings[$fieldNameWidth] = '{seomatic.meta.'.$seoFieldWidth.'}';
                            $globalsSettings[$fieldNameHeight] = '{seomatic.meta.'.$seoFieldHeight.'}';
                            break;
                        case 'fromField':
                            if (!empty($sourceField)) {
                                $globalsSettings[$fieldName] = '{'
                                    .$elementName.$sourceField.'[0].url'
                                    .'}';
                                $globalsSettings[$fieldNameWidth] = '{'
                                    .$elementName.$sourceField.'[0].width'
                                    .'}';
                                $globalsSettings[$fieldNameHeight] = '{'
                                    .$elementName.$sourceField.'[0].height'
                                    .'}';
                            }
                            break;
                        case 'fromAsset':
                            if (!empty($ids)) {
                                $globalsSettings[$fieldName] = '{{ craft.app.assets.assetById('
                                    .$ids[0]
                                    .', '.$siteId.').url }}';
                                $globalsSettings[$fieldNameWidth] = '{{ craft.app.assets.assetById('
                                    .$ids[0]
                                    .', '.$siteId.').width }}';
                                $globalsSettings[$fieldNameHeight] = '{{ craft.app.assets.assetById('
                                    .$ids[0]
                                    .', '.$siteId.').height }}';
                            }
                            break;
                    }
                }
            }
        }
    }
}
