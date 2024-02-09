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

use nystudio107\seomatic\helpers\Dependency;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\services\FrontendTemplates;
use nystudio107\seomatic\services\Link as LinkService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    MetaLinkContainer::CONTAINER_TYPE . LinkService::GENERAL_HANDLE => [
        'name' => 'General',
        'description' => 'Link Tags',
        'handle' => LinkService::GENERAL_HANDLE,
        'class' => (string)MetaLinkContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
            'canonical' => [
                'crossorigin' => '',
                'href' => '{{ seomatic.meta.canonicalUrl }}',
                'hreflang' => '',
                'media' => '',
                'rel' => 'canonical',
                'sizes' => '',
                'type' => '',
            ],
            'home' => [
                'crossorigin' => '',
                'href' => '{{ seomatic.helper.siteUrl("/") }}',
                'hreflang' => '',
                'media' => '',
                'rel' => 'home',
                'sizes' => '',
                'type' => '',
            ],
            'author' => [
                'dependencies' => [
                    Dependency::FRONTEND_TEMPLATE_DEPENDENCY => [FrontendTemplates::HUMANS_TXT_HANDLE],
                ],
                'crossorigin' => '',
                'href' => '{{ seomatic.helper.siteUrl("/humans.txt") }}',
                'hreflang' => '',
                'media' => '',
                'rel' => 'author',
                'sizes' => '',
                'type' => 'text/plain',
            ],
            'publisher' => [
                'dependencies' => [
                    Dependency::SITE_DEPENDENCY => ['googlePublisherLink'],
                ],
                'crossorigin' => '',
                'href' => '{{ seomatic.site.googlePublisherLink }}',
                'hreflang' => '',
                'media' => '',
                'rel' => 'publisher',
                'sizes' => '',
                'type' => '',
            ],
        ],
    ],
];
