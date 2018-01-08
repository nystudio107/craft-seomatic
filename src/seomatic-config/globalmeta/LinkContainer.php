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
        'description' => 'Link Tags',
        'handle'      => MetaService::GENERAL_HANDLE,
        'include'     => 'true',
        'data'        => [
            'canonical' => [
                'crossorigin' => '',
                'href'        => '{seomatic.meta.canonicalUrl}',
                'hreflang'    => '',
                'media'       => '',
                'rel'         => 'canonical',
                'sizes'       => '',
                'type'        => '',
            ],
            'author'    => [
                'crossorigin' => '',
                'href'        => '/humans.txt',
                'hreflang'    => '',
                'media'       => '',
                'rel'         => 'author',
                'sizes'       => '',
                'type'        => 'text/plain',
            ],
            'publisher' => [
                'crossorigin' => '',
                'href'        => '{seomatic.config.googlePublisherLink}',
                'hreflang'    => '',
                'media'       => '',
                'rel'         => 'publisher',
                'sizes'       => '',
                'type'        => '',
            ],
        ],
    ],
];
