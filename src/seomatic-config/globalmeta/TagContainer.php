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

use nystudio107\seomatic\services\Tag as TagService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    [
        'name'         => 'General',
        'description'  => 'General Meta Tags',
        'handle'       => TagService::GENERAL_HANDLE,
        'include'      => 'true',
        'dependencies' => [
        ],
        'data'         => [
            'generator' => [
                'charset'   => '',
                'content'   => 'SEOmatic',
                'httpEquiv' => '',
                'name'      => 'generator',
            ],

            'keywords'    => [
                'charset'   => '',
                'content'   => '{seomatic.meta.seoTitle}',
                'httpEquiv' => '',
                'name'      => 'keywords',
            ],
            'description' => [
                'charset'   => '',
                'content'   => '{seomatic.meta.seoDescription}',
                'httpEquiv' => '',
                'name'      => 'description',
            ],
            'referrer'    => [
                'charset'   => '',
                'content'   => 'no-referrer-when-downgrade',
                'httpEquiv' => '',
                'name'      => 'referrer',
            ],
            'robots'      => [
                'charset'     => '',
                'content'     => 'index',
                'httpEquiv'   => '',
                'name'        => 'robots',
                'environment' => [
                    'live'    => [
                        'content' => 'index',
                    ],
                    'staging' => [
                        'content' => 'none',
                    ],
                    'local'   => [
                        'content' => 'none',
                    ],
                ],
            ],
        ],
    ],
    [
        'name'         => 'Facebook',
        'description'  => 'Facebook OpenGraph Meta Tags',
        'handle'       => TagService::FACEBOOK_HANDLE,
        'include'      => 'true',
        'dependencies' => [
        ],
        'data'         => [
            'fb:profile_id'  => [
                'charset'   => '',
                'content'   => '{seomatic.config.facebookProfileId}',
                'httpEquiv' => '',
                'name'      => 'fb:profile_id',
            ],
            'fb:app_id'      => [
                'charset'   => '',
                'content'   => '{seomatic.config.facebookAppId}',
                'httpEquiv' => '',
                'name'      => 'fb:app_id',
            ],
            'og:locale'      => [
                'charset'   => '',
                'content'   => '{{ craft.app.language }}',
                'httpEquiv' => '',
                'name'      => 'og:locale',
            ],
            'og:type'        => [
                'charset'   => '',
                'content'   => 'website',
                'httpEquiv' => '',
                'name'      => 'og:type',
            ],
            'og:title'       => [
                'charset'   => '',
                'content'   => '{seomatic.meta.ogTitle}',
                'httpEquiv' => '',
                'name'      => 'og:title',
            ],
            'og:description' => [
                'charset'   => '',
                'content'   => '{seomatic.meta.ogDescription}',
                'httpEquiv' => '',
                'name'      => 'og:description',
            ],
            'og:image'       => [
                'charset'   => '',
                'content'   => '{seomatic.meta.ogImage}',
                'httpEquiv' => '',
                'name'      => 'og:image',
            ],
        ],
    ],
    [
        'name'         => 'Twitter',
        'description'  => 'Twitter Card Meta Tags',
        'handle'       => TagService::TWITTER_HANDLE,
        'include'      => 'true',
        'dependencies' => [
        ],
        'data'         => [
            'twitter:card'        => [
                'charset'   => '',
                'content'   => '{seomatic.meta.twitterCard}',
                'httpEquiv' => '',
                'name'      => 'twitter:card',
            ],
            'twitter:site'        => [
                'charset'   => '',
                'content'   => '@{seomatic.config.twitterHandle}',
                'httpEquiv' => '',
                'name'      => 'twitter:site',
            ],
            'twitter:creator'     => [
                'charset'   => '',
                'content'   => '@{seomatic.meta.twitterCreator}',
                'httpEquiv' => '',
                'name'      => 'twitter:creator',
            ],
            'twitter:title'       => [
                'charset'   => '',
                'content'   => '{seomatic.meta.twitterTitle}',
                'httpEquiv' => '',
                'name'      => 'twitter:title',
            ],
            'twitter:description' => [
                'charset'   => '',
                'content'   => '{seomatic.meta.twitterDescription}',
                'httpEquiv' => '',
                'name'      => 'twitter:description',
            ],
            'twitter:image'       => [
                'charset'   => '',
                'content'   => '{seomatic.meta.twitterImage}',
                'httpEquiv' => '',
                'name'      => 'twitter:image',
            ],
        ],
    ],
    [
        'name'         => 'Miscellaneous',
        'description'  => 'Miscellaneous Meta Tags',
        'handle'       => TagService::MISC_HANDLE,
        'include'      => 'true',
        'dependencies' => [
        ],
        'data'         => [
            'google-site-verification' => [
                'charset'   => '',
                'content'   => '{seomatic.config.googleSiteVerification}',
                'httpEquiv' => '',
                'name'      => 'google-site-verification',
            ],
        ],
    ],
];
