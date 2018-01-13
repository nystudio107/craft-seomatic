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
        ],
    ],
];
