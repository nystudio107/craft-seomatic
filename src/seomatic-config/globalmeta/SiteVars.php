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

use nystudio107\seomatic\helpers\Config;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    '*' => [
        'siteName' => '',
        'identity' => Config::getConfigFromFile('globalmeta/Identity'),
        'creator' => Config::getConfigFromFile('globalmeta/Creator'),
        'twitterHandle' => '',
        'facebookProfileId' => '',
        'facebookAppId' => '',
        'googleSiteVerification' => '',
        'bingSiteVerification' => '',
        'pinterestSiteVerification' => '',
        'sameAsLinks' => [
            'twitter' => [
                'siteName' => 'Twitter',
                'handle' => 'twitter',
                'url' => '',
            ],
            'facebook' => [
                'siteName' => 'Facebook',
                'handle' => 'facebook',
                'url' => '',
            ],
            'wikipedia' => [
                'siteName' => 'Wikipedia',
                'handle' => 'wikipedia',
                'url' => '',
            ],
            'linkedin' => [
                'siteName' => 'LinkedIn',
                'handle' => 'linkedin',
                'url' => '',
            ],
            'googleplus' => [
                'siteName' => 'Google+',
                'handle' => 'googleplus',
                'url' => '',
            ],
            'youtube' => [
                'siteName' => 'YouTube',
                'handle' => 'youtube',
                'url' => '',
            ],
            'instagram' => [
                'siteName' => 'Instagram',
                'handle' => 'instagram',
                'url' => '',
            ],
            'pinterest' => [
                'siteName' => 'Pinterest',
                'handle' => 'pinterest',
                'url' => '',
            ],
            'github' => [
                'siteName' => 'GitHub',
                'handle' => 'github',
                'url' => '',
            ],
            'vimeo' => [
                'siteName' => 'Vimeo',
                'handle' => 'vimeo',
                'url' => '',
            ],
        ],
        'siteLinksSearchTarget' => '',
        'siteLinksQueryInput' => '',
        'referrer' => 'no-referrer-when-downgrade',
        'additionalSitemapUrls' => [
        ],
        'additionalSitemaps' => [
        ],
    ],
];
