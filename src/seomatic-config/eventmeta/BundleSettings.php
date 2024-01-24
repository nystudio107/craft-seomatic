<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */

return [
    '*' => [
        'siteType' => 'Event',
        'siteSubType' => '',
        'siteSpecificType' => '',

        'seoTitleSource' => 'fromField',
        'seoTitleField' => 'title',
        'siteNamePositionSource' => 'sameAsGlobal',
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

        'twitterCreatorSource' => 'sameAsSite',
        'twitterCreatorField' => '',
        'twitterTitleSource' => 'sameAsSeo',
        'twitterTitleField' => '',
        'twitterSiteNamePositionSource' => 'sameAsGlobal',
        'twitterDescriptionSource' => 'sameAsSeo',
        'twitterDescriptionField' => '',
        'twitterImageIds' => [],
        'twitterImageSource' => 'sameAsSeo',
        'twitterImageField' => '',
        'twitterImageTransform' => false,
        'twitterImageTransformMode' => 'crop',
        'twitterImageDescriptionSource' => 'sameAsSeo',
        'twitterImageDescriptionField' => '',

        'ogTitleSource' => 'sameAsSeo',
        'ogTitleField' => '',
        'ogSiteNamePositionSource' => 'sameAsGlobal',
        'ogDescriptionSource' => 'sameAsSeo',
        'ogDescriptionField' => '',
        'ogImageIds' => [],
        'ogImageSource' => 'sameAsSeo',
        'ogImageField' => '',
        'ogImageTransform' => false,
        'ogImageTransformMode' => 'crop',
        'ogImageDescriptionSource' => 'sameAsSeo',
        'ogImageDescriptionField' => '',
    ],
];
