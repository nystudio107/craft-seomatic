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

use nystudio107\seomatic\helpers\Config as ConfigHelper;
use nystudio107\seomatic\services\MetaContainers;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    [
        'name'        => 'General',
        'description' => 'General Meta Tags',
        'handle'      => MetaContainers::METATAG_GENERAL_HANDLE,
        'include'     => 'true',
        'data'        => ConfigHelper::getConfigFromFile('GlobalGeneral', 'defaults/metatags'),
    ],
    [
        'name'        => 'Standard SEO',
        'description' => 'Standard SEO Meta Tags',
        'handle'      => MetaContainers::METATAG_STANDARD_HANDLE,
        'include'     => 'true',
        'data'        => ConfigHelper::getConfigFromFile('GlobalStandard', 'defaults/metatags'),
    ],
    [
        'name'        => 'Facebook',
        'description' => 'FaceBook OpenGraph Meta Tags',
        'handle'      => MetaContainers::METATAG_OPENGRAPH_HANDLE,
        'include'     => 'true',
        'data'        => ConfigHelper::getConfigFromFile('GlobalOpenGraph', 'defaults/metatags'),
    ],
    [
        'name'        => 'Twitter',
        'description' => 'Twitter Meta Tags',
        'handle'      => MetaContainers::METATAG_TWITTER_HANDLE,
        'include'     => 'true',
        'data'        => ConfigHelper::getConfigFromFile('GlobalTwitter', 'defaults/metatags'),
    ],
    [
        'name'        => 'Miscellaneous',
        'description' => 'Miscellaneous Meta Tags',
        'handle'      => MetaContainers::METATAG_MISCELLANEOUS_HANDLE,
        'include'     => 'true',
        'data'        => ConfigHelper::getConfigFromFile('GlobalMisc', 'defaults/metatags'),
    ],
];
