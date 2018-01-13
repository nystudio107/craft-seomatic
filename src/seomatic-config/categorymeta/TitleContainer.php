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

use nystudio107\seomatic\services\Title as TitleService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    [
        'name'         => 'General',
        'description'  => 'Meta Title Tag',
        'handle'       => TitleService::GENERAL_HANDLE,
        'include'      => 'true',
        'dependencies' => [
        ],
        'data'         => [
            'title' => [
                'title' => '{seomatic.config.siteName} | {seomatic.meta.seoTitle}',
            ],
        ],
    ],
];
