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
        'data'        => @include('metatags/General.php'),
    ],
    [
        'name'        => 'Standard SEO',
        'description' => 'Standard SEO Meta Tags',
        'handle'      => MetaContainers::METATAG_STANDARD_HANDLE,
        'include'     => 'true',
        'data'        => @include('metatags/Standard.php'),
    ],
    [
        'name'        => 'Facebook',
        'description' => 'FaceBook OpenGraph Meta Tags',
        'handle'      => MetaContainers::METATAG_OPENGRAPH_HANDLE,
        'include'     => 'true',
        'data'        => @include('metatags/OpenGraph.php'),
    ],
    [
        'name'        => 'Twitter',
        'description' => 'Twitter Meta Tags',
        'handle'      => MetaContainers::METATAG_TWITTER_HANDLE,
        'include'     => 'true',
        'data'        => @include('metatags/Twitter.php'),
    ],
    [
        'name'        => 'Miscellaneous',
        'description' => 'Miscellaneous Meta Tags',
        'handle'      => MetaContainers::METATAG_MISCELLANEOUS_HANDLE,
        'include'     => 'true',
        'data'        => @include('metatags/Misc.php'),
    ],
];
