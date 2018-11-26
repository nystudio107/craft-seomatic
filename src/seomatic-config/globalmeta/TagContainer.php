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

use nystudio107\seomatic\helpers\Dependency;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\services\Tag as TagService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    MetaTagContainer::CONTAINER_TYPE.TagService::GENERAL_HANDLE  => [
        'name'         => 'General',
        'description'  => 'General Meta Tags',
        'handle'       => TagService::GENERAL_HANDLE,
        'class'        => (string)MetaTagContainer::class,
        'include'      => true,
        'dependencies' => [
        ],
        'data'         => [
            'generator' => [
                'dependencies' => [
                    Dependency::CONFIG_DEPENDENCY => ['generatorEnabled'],
                ],
                'charset'   => '',
                'content'   => 'SEOmatic',
                'httpEquiv' => '',
                'name'      => 'generator',
            ],

            'keywords'    => [
                'charset'   => '',
                'content'   => '{seomatic.meta.seoKeywords}',
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
                'content'     => '{seomatic.meta.robots}',
                'httpEquiv'   => '',
                'name'        => 'robots',
                'environment' => [
                    'live'    => [
                        'content' => '{seomatic.meta.robots}',
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
    MetaTagContainer::CONTAINER_TYPE.TagService::FACEBOOK_HANDLE => [
        'name'         => 'Facebook',
        'description'  => 'Facebook OpenGraph Meta Tags',
        'handle'       => TagService::FACEBOOK_HANDLE,
        'class'        => (string)MetaTagContainer::class,
        'include'      => true,
        'dependencies' => [
        ],
        'data'         => [
            'fb:profile_id'       => [
                'charset'   => '',
                'content'   => '{seomatic.site.facebookProfileId}',
                'httpEquiv' => '',
                'name'      => '',
                'property'  => 'fb:profile_id',
            ],
            'fb:app_id'           => [
                'charset'   => '',
                'content'   => '{seomatic.site.facebookAppId}',
                'httpEquiv' => '',
                'name'      => '',
                'property'  => 'fb:app_id',
            ],
            'og:locale'           => [
                'charset'   => '',
                'content'   => '{{ craft.app.language |replace({"-": "_"}) }}',
                'httpEquiv' => '',
                'name'      => '',
                'property'  => 'og:locale',
            ],
            'og:locale:alternate' => [
                'charset'   => '',
                'content'   => '',
                'httpEquiv' => '',
                'name'      => '',
                'property'  => 'og:locale:alternate',
            ],
            'og:site_name' => [
                'charset'   => '',
                'content'   => '{seomatic.site.siteName}',
                'httpEquiv' => '',
                'name'      => '',
                'property'  => 'og:site_name',
            ],
            'og:type'             => [
                'charset'   => '',
                'content'   => '{seomatic.meta.ogType}',
                'httpEquiv' => '',
                'name'      => '',
                'property'  => 'og:type',
            ],
            'og:url'              => [
                'charset'   => '',
                'content'   => '{seomatic.meta.canonicalUrl}',
                'httpEquiv' => '',
                'name'      => '',
                'property'  => 'og:url',
            ],
            'og:title'            => [
                'charset'          => '',
                'content'          => '{seomatic.meta.ogTitle}',
                'httpEquiv'        => '',
                'name'             => '',
                'property'         => 'og:title',
                'siteName'         => '{seomatic.site.siteName}',
                'siteNamePosition' => '{seomatic.meta.ogSiteNamePosition}',
                'separatorChar'    => '{seomatic.config.separatorChar}',
            ],
            'og:description'      => [
                'charset'   => '',
                'content'   => '{seomatic.meta.ogDescription}',
                'httpEquiv' => '',
                'name'      => '',
                'property'  => 'og:description',
            ],
            'og:image'            => [
                'charset'   => '',
                'content'   => '{seomatic.meta.ogImage}',
                'httpEquiv' => '',
                'name'      => '',
                'property'  => 'og:image',
            ],
            'og:image:width'        => [
                'dependencies' => [
                    Dependency::TAG_DEPENDENCY => ['og:image'],
                ],
                'charset'      => '',
                'content'      => '{seomatic.meta.ogImageWidth}',
                'httpEquiv'    => '',
                'name'         => '',
                'property'     => 'og:image:width',
            ],
            'og:image:height'        => [
                'dependencies' => [
                    Dependency::TAG_DEPENDENCY => ['og:image'],
                ],
                'charset'      => '',
                'content'      => '{seomatic.meta.ogImageHeight}',
                'httpEquiv'    => '',
                'name'         => '',
                'property'     => 'og:image:height',
            ],
            'og:image:alt'        => [
                'dependencies' => [
                    Dependency::TAG_DEPENDENCY => ['og:image'],
                ],
                'charset'      => '',
                'content'      => '{seomatic.meta.ogImageDescription}',
                'httpEquiv'    => '',
                'name'         => '',
                'property'     => 'og:image:alt',
            ],
            'og:see_also'         => [
                'charset'   => '',
                'content'   => '',
                'httpEquiv' => '',
                'name'      => '',
                'property'  => 'og:see_also',
            ],
        ],
    ],
    MetaTagContainer::CONTAINER_TYPE.TagService::TWITTER_HANDLE  => [
        'name'         => 'Twitter',
        'description'  => 'Twitter Card Meta Tags',
        'handle'       => TagService::TWITTER_HANDLE,
        'include'      => true,
        'class'        => (string)MetaTagContainer::class,
        'dependencies' => [
            Dependency::SITE_DEPENDENCY => ['twitterHandle'],
        ],
        'data'         => [
            'twitter:card'        => [
                'charset'   => '',
                'content'   => '{seomatic.meta.twitterCard}',
                'httpEquiv' => '',
                'name'      => 'twitter:card',
            ],
            'twitter:site'        => [
                'dependencies' => [
                    Dependency::SITE_DEPENDENCY => ['twitterHandle'],
                ],
                'charset'      => '',
                'content'      => '@{seomatic.site.twitterHandle}',
                'httpEquiv'    => '',
                'name'         => 'twitter:site',
            ],
            'twitter:creator'     => [
                'dependencies' => [
                    Dependency::META_DEPENDENCY => ['twitterCreator'],
                ],
                'charset'      => '',
                'content'      => '@{seomatic.meta.twitterCreator}',
                'httpEquiv'    => '',
                'name'         => 'twitter:creator',
            ],
            'twitter:title'       => [
                'charset'          => '',
                'content'          => '{seomatic.meta.twitterTitle}',
                'httpEquiv'        => '',
                'name'             => 'twitter:title',
                'siteName'         => '{seomatic.site.siteName}',
                'siteNamePosition' => '{seomatic.meta.twitterSiteNamePosition}',
                'separatorChar'    => '{seomatic.config.separatorChar}',
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
            'twitter:image:width'   => [
                'dependencies' => [
                    Dependency::TAG_DEPENDENCY => ['twitter:image'],
                ],
                'charset'      => '',
                'content'      => '{seomatic.meta.twitterImageWidth}',
                'httpEquiv'    => '',
                'name'         => 'twitter:image:width',
            ],
            'twitter:image:height'   => [
                'dependencies' => [
                    Dependency::TAG_DEPENDENCY => ['twitter:image'],
                ],
                'charset'      => '',
                'content'      => '{seomatic.meta.twitterImageHeight}',
                'httpEquiv'    => '',
                'name'         => 'twitter:image:height',
            ],
            'twitter:image:alt'   => [
                'dependencies' => [
                    Dependency::TAG_DEPENDENCY => ['twitter:image'],
                ],
                'charset'      => '',
                'content'      => '{seomatic.meta.twitterImageDescription}',
                'httpEquiv'    => '',
                'name'         => 'twitter:image:alt',
            ],
        ],
    ],
    MetaTagContainer::CONTAINER_TYPE.TagService::MISC_HANDLE     => [
        'name'         => 'Miscellaneous',
        'description'  => 'Miscellaneous Meta Tags',
        'handle'       => TagService::MISC_HANDLE,
        'class'        => (string)MetaTagContainer::class,
        'include'      => true,
        'dependencies' => [
        ],
        'data'         => [
            'google-site-verification'    => [
                'dependencies' => [
                    Dependency::SITE_DEPENDENCY => ['googleSiteVerification'],
                ],
                'charset'      => '',
                'content'      => '{seomatic.site.googleSiteVerification}',
                'httpEquiv'    => '',
                'name'         => 'google-site-verification',
            ],
            'bing-site-verification'      => [
                'dependencies' => [
                    Dependency::SITE_DEPENDENCY => ['bingSiteVerification'],
                ],
                'charset'      => '',
                'content'      => '{seomatic.site.bingSiteVerification}',
                'httpEquiv'    => '',
                'name'         => 'msvalidate.01',
            ],
            'pinterest-site-verification' => [
                'dependencies' => [
                    Dependency::SITE_DEPENDENCY => ['pinterestSiteVerification'],
                ],
                'charset'      => '',
                'content'      => '{seomatic.site.pinterestSiteVerification}',
                'httpEquiv'    => '',
                'name'         => 'p:domain_verify',
            ],
        ],
    ],
];
