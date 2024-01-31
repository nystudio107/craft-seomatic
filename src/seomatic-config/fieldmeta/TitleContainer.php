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

use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\services\Title as TitleService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    MetaTitleContainer::CONTAINER_TYPE . TitleService::GENERAL_HANDLE => [
        'name' => 'General',
        'description' => 'Meta Title Tag',
        'handle' => TitleService::GENERAL_HANDLE,
        'class' => (string)MetaTitleContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
        ],
    ],
];
