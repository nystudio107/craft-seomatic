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

use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\services\Tag as TagService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    MetaTagContainer::CONTAINER_TYPE . TagService::GENERAL_HANDLE => [
        'name' => 'General',
        'description' => 'General Meta Tags',
        'handle' => TagService::GENERAL_HANDLE,
        'class' => (string)MetaTagContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
        ],
    ],
    MetaTagContainer::CONTAINER_TYPE . TagService::FACEBOOK_HANDLE => [
        'name' => 'Facebook',
        'description' => 'Facebook OpenGraph Meta Tags',
        'handle' => TagService::FACEBOOK_HANDLE,
        'class' => (string)MetaTagContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
        ],
    ],
    MetaTagContainer::CONTAINER_TYPE . TagService::TWITTER_HANDLE => [
        'name' => 'Twitter',
        'description' => 'Twitter Card Meta Tags',
        'handle' => TagService::TWITTER_HANDLE,
        'class' => (string)MetaTagContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
        ],
    ],
    MetaTagContainer::CONTAINER_TYPE . TagService::MISC_HANDLE => [
        'name' => 'Miscellaneous',
        'description' => 'Miscellaneous Meta Tags',
        'handle' => TagService::MISC_HANDLE,
        'class' => (string)MetaTagContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
        ],
    ],
];
