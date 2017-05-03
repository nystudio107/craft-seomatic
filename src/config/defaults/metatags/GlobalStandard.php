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
    'keywords'    => [
        'charset'   => '',
        'content'   => '{seomatic.seo.title}',
        'httpEquiv' => '',
        'name'      => 'keywords',
    ],
    'description' => [
        'charset'   => '',
        'content'   => '{seomatic.seo.description}',
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
];
