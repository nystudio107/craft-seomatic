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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */


return [
    '*' => [
        'siteType' => '',
        'siteSubType' => '',
        'siteSpecificType' => '',

        'seoTitleSource' => 'fromCustom',
        'seoTitleField' => '',
        'siteNamePositionSource' => '',
        'seoDescriptionSource' => 'fromCustom',
        'seoDescriptionField' => '',
        'seoKeywordsSource' => 'fromCustom',
        'seoKeywordsField' => '',
        'seoImageIds' => [],
        'seoImageSource' => 'fromAsset',
        'seoImageField' => '',
        'seoImageTransform' => true,
        'seoImageTransformMode' => 'crop',
        'seoImageDescriptionSource' => 'fromCustom',
        'seoImageDescriptionField' => '',

        'twitterCreatorSource' => '',
        'twitterCreatorField' => '',
        'twitterTitleSource' => '',
        'twitterTitleField' => '',
        'twitterSiteNamePositionSource' => '',
        'twitterDescriptionSource' => '',
        'twitterDescriptionField' => '',
        'twitterImageIds' => [],
        'twitterImageSource' => '',
        'twitterImageField' => '',
        'twitterImageTransform' => false,
        'twitterImageTransformMode' => 'crop',
        'twitterImageDescriptionSource' => '',
        'twitterImageDescriptionField' => '',

        'ogTitleSource' => '',
        'ogTitleField' => '',
        'ogSiteNamePositionSource' => '',
        'ogDescriptionSource' => '',
        'ogDescriptionField' => '',
        'ogImageIds' => [],
        'ogImageSource' => '',
        'ogImageField' => '',
        'ogImageTransform' => false,
        'ogImageTransformMode' => 'crop',
        'ogImageDescriptionSource' => '',
        'ogImageDescriptionField' => '',
    ],
];
