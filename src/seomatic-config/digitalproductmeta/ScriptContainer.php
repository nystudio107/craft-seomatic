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

use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\services\Script as ScriptService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    MetaScriptContainer::CONTAINER_TYPE . ScriptService::GENERAL_HANDLE => [
        'name' => 'General',
        'description' => 'Script Tags',
        'handle' => ScriptService::GENERAL_HANDLE,
        'class' => (string)MetaScriptContainer::class,
        'include' => true,
        'dependencies' => [
        ],
        'data' => [
        ],
    ],
];
