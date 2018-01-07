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

use nystudio107\seomatic\base\MetaService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    [
        'name'        => 'General',
        'description' => 'General Meta Tags',
        'handle'      => MetaService::GENERAL_HANDLE,
        'include'     => 'true',
        'data'        => [
            'generator' => [
                'charset'   => '',
                'content'   => 'SEOmatic',
                'httpEquiv' => '',
                'name'      => 'generator',
            ],

            'keywords'    => [
                'charset'   => '',
                'content'   => '{seomatic.globals.seoTitle}',
                'httpEquiv' => '',
                'name'      => 'keywords',
            ],
            'description' => [
                'charset'   => '',
                'content'   => '{seomatic.globals.seoDescription}',
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

            'google-site-verification' => [
                'charset'   => '',
                'content'   => '{seomatic.settings.googleSiteVerification}',
                'httpEquiv' => '',
                'name'      => 'google-site-verification',
            ],

            'fb:profile_id'  => [
                'charset'   => '',
                'content'   => '{seomatic.settings.facebookProfileId}',
                'httpEquiv' => '',
                'name'      => 'fb:profile_id',
            ],
            'fb:app_id'      => [
                'charset'   => '',
                'content'   => '{seomatic.settings.facebookAppId}',
                'httpEquiv' => '',
                'name'      => 'fb:app_id',
            ],
            'og:locale'       => [
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
                'content'   => '{seomatic.globals.ogTitle}',
                'httpEquiv' => '',
                'name'      => 'og:title',
            ],
            'og:description' => [
                'charset'   => '',
                'content'   => '{seomatic.globals.ogDescription}',
                'httpEquiv' => '',
                'name'      => 'og:description',
            ],
            'og:image'       => [
                'charset'   => '',
                'content'   => '{seomatic.globals.ogImage}',
                'httpEquiv' => '',
                'name'      => 'og:image',
            ],

            'twitter:card'        => [
                'charset'   => '',
                'content'   => '{seomatic.globals.twitterCard}',
                'httpEquiv' => '',
                'name'      => 'twitter:card',
            ],
            'twitter:site'        => [
                'charset'   => '',
                'content'   => '@{seomatic.settings.twitterHandle}',
                'httpEquiv' => '',
                'name'      => 'twitter:site',
            ],
            'twitter:creator'     => [
                'charset'   => '',
                'content'   => '@{seomatic.globals.twitterCreator}',
                'httpEquiv' => '',
                'name'      => 'twitter:creator',
            ],
            'twitter:title'       => [
                'charset'   => '',
                'content'   => '{seomatic.globals.twitterTitle}',
                'httpEquiv' => '',
                'name'      => 'twitter:title',
            ],
            'twitter:description' => [
                'charset'   => '',
                'content'   => '{seomatic.globals.twitterDescription}',
                'httpEquiv' => '',
                'name'      => 'twitter:description',
            ],
            'twitter:image'       => [
                'charset'   => '',
                'content'   => '{seomatic.globals.twitterImage}',
                'httpEquiv' => '',
                'name'      => 'twitter:image',
            ],

        ],
    ],
];
