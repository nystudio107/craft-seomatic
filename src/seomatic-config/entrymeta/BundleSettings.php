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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    '*' => [
        'seoTitleSource'                => 'fromCustom',
        'seoTitleField'                 => '',
        'seoDescriptionSource'          => 'fromCustom',
        'seoDescriptionField'           => '',
        'seoKeywordsSource'             => 'fromCustom',
        'seoKeywordsField'              => '',
        'seoImageIds'                   => [],
        'seoImageSource'                => 'fromAsset',
        'seoImageField'                 => '',
        'seoImageDescriptionSource'     => 'fromCustom',
        'seoImageDescriptionField'      => '',

        'twitterTitleSource'            => 'sameAsSeo',
        'twitterTitleField'             => '',
        'twitterDescriptionSource'      => 'sameAsSeo',
        'twitterDescriptionField'       => '',
        'twitterKeywordsSource'         => 'sameAsSeo',
        'twitterKeywordsField'          => '',
        'twitterImageIds'               => [],
        'twitterImageSource'            => 'sameAsSeo',
        'twitterImageField'             => '',
        'twitterImageDescriptionSource' => 'sameAsSeo',
        'twitterImageDescriptionField'  => '',

        'ogTitleSource'                 => 'sameAsSeo',
        'ogTitleField'                  => '',
        'ogDescriptionSource'           => 'sameAsSeo',
        'ogDescriptionField'            => '',
        'ogKeywordsSource'              => 'sameAsSeo',
        'ogKeywordsField'               => '',
        'ogImageIds'                    => [],
        'ogImageSource'                 => 'sameAsSeo',
        'ogImageField'                  => '',
        'ogImageDescriptionSource'      => 'sameAsSeo',
        'ogImageDescriptionField'       => '',
    ],
];
