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

use nystudio107\seomatic\services\MetaContainers;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    [
        'name'        => 'General',
        'description' => 'General Meta Tags',
        'handle'      => MetaContainers::METATAG_GENERAL_HANDLE,
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
                'content'   => '{seomaticGlobals.seoTitle}',
                'httpEquiv' => '',
                'name'      => 'keywords',
            ],
            'description' => [
                'charset'   => '',
                'content'   => '{seomaticGlobals.seoDescription}',
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
                'content'   => '{seomaticSettings.googleSiteVerification}',
                'httpEquiv' => '',
                'name'      => 'google-site-verification',
            ],

            'twitter:card'        => [
                'charset'   => '',
                'content'   => 'summary',
                'httpEquiv' => '',
                'name'      => 'twitter:card',
            ],
            'twitter:site'        => [
                'charset'   => '',
                'content'   => '@{seomaticSettings.twitterHandle}',
                'httpEquiv' => '',
                'name'      => 'twitter:site',
            ],
            'twitter:title'       => [
                'charset'   => '',
                'content'   => '{seomaticGlobals.twitterTitle}',
                'httpEquiv' => '',
                'name'      => 'twitter:title',
            ],
            'twitter:description' => [
                'charset'   => '',
                'content'   => '{seomaticGlobals.twitterDescription}',
                'httpEquiv' => '',
                'name'      => 'twitter:description',
            ],
            'twitter:image' => [
                'charset'   => '',
                'content'   => '{seomaticGlobals.twitterImage}',
                'httpEquiv' => '',
                'name'      => 'twitter:image',
            ],

            'og:type'  => [
                'charset'   => '',
                'content'   => 'website',
                'httpEquiv' => '',
                'name'      => 'og:type',
            ],
            'og:title' => [
                'charset'   => '',
                'content'   => '{seomaticGlobals.ogTitle}',
                'httpEquiv' => '',
                'name'      => 'og:title',
            ],
            'og:description' => [
                'charset'   => '',
                'content'   => '{seomaticGlobals.ogDescription}',
                'httpEquiv' => '',
                'name'      => 'og:description',
            ],
            'og:image' => [
                'charset'   => '',
                'content'   => '{seomaticGlobals.ogImage}',
                'httpEquiv' => '',
                'name'      => 'og:image',
            ],

        ],
    ],
];
