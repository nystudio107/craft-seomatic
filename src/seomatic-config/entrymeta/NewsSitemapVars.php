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

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.5.0
 */

return [
    'newsSitemapEnabled'   => true,
    'sitemapAltLinks'      => true,
    'sitemapChangeFreq'    => 'weekly',
    'sitemapPriority'      => 0.5,
    'sitemapLimit'         => null,
    'sitemapNewsFieldMap' => [
        ['property' => 'title', 'field' => 'title'],
        ['property' => 'publication_name', 'field' => ''],
        ['property' => 'publication_language', 'field' => ''],
    ],
];
