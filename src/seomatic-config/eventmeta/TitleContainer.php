<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

use nystudio107\seomatic\helpers\Dependency;
use nystudio107\seomatic\models\MetaTitleContainer;
use nystudio107\seomatic\services\Title as TitleService;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */

return [
    MetaTitleContainer::CONTAINER_TYPE.TitleService::GENERAL_HANDLE => [
        'name'         => 'General',
        'description'  => 'Meta Title Tag',
        'handle'       => TitleService::GENERAL_HANDLE,
        'class'        => (string)MetaTitleContainer::class,
        'include'      => true,
        'dependencies' => [
        ],
        'data'         => [
            'title' => [
                'title'            => '{seomatic.meta.seoTitle}',
                'siteName'         => '{seomatic.site.siteName}',
                'siteNamePosition' => '{seomatic.meta.siteNamePosition}',
                'separatorChar'    => '{seomatic.config.separatorChar}',
            ],
        ],
    ],
];
