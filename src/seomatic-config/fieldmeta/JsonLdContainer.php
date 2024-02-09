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

use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\services\JsonLd as JsonLdService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    MetaJsonLdContainer::CONTAINER_TYPE . JsonLdService::GENERAL_HANDLE => [
        'name' => 'General',
        'description' => 'JsonLd Tags',
        'handle' => JsonLdService::GENERAL_HANDLE,
        'class' => (string)MetaJsonLdContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
        ],
    ],
];
