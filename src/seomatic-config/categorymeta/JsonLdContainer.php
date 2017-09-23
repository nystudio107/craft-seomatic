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
        'description' => 'JsonLd Tags',
        'handle'      => MetaContainers::METAJSONLD_GENERAL_HANDLE,
        'include'     => 'true',
        'data'        => [
            'mainEntityOfPage' => [
                'type'             => 'WebPage',
                'name'             => '{{ seomatic.seoTitle }}',
                'description'      => '{{ seomatic.seoDescription }}',
                'image'            => [
                    'type'   => 'ImageObject',
                    'url'    => '{{ seomatic.seoImage }}',
                    'width'  => '1200',
                    'height' => '804',
                ],
                'url'              => '{{ seomatic.canonicalUrl }}',
                'mainEntityOfPage' => '{{ seomatic.canonicalUrl }}',
                'inLanguage'       => '{language}',
            ],
        ],
    ],
];
