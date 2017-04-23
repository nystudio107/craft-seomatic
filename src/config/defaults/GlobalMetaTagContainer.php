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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    [
        'name' => 'General',
        'description' => 'General Meta Tags',
        'handle' => 'general',
        'data' => ConfigHelper::getConfigFromFile('GlobalGeneral', 'defaults/metatags'),
    ],
    [
        'name' => 'OpenGraph',
        'description' => 'FaceBook OpenGraph Meta Tags',
        'handle' => 'opengraph',
        'data' => ConfigHelper::getConfigFromFile('GlobalOpenGraph', 'defaults/metatags'),
    ],
];
