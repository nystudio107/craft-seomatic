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
        'description' => 'Meta Title Tag',
        'handle'      => MetaContainers::METATITLE_GENERAL_HANDLE,
        'include'     => 'true',
        'data'        => [
            'title' => [
                'title' => '{{ seomatic.seoTitle }}',
            ],
        ],
    ],
];
