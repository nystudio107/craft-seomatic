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
 * @since     3.0.0
 */

return [
    'seoTitle'           => 'Global SEO Title',
    'seoDescription'     => 'Global SEO Description',
    'seoImage'           => 'Global SEO Image',
    'canonicalUrl'       => '{{ craft.request.url }}',
    'robots'             => 'all',
    'ogType'             => 'Website',
    'ogTitle'            => '{{ seomatic.seoTitle }}',
    'ogDescription'      => '{{ seomatic.seoDescription }}',
    'ogImage'            => 'Global SEO Image',
    'twitterTitle'       => '{{ seomatic.seoTitle }}',
    'twitterDescription' => '{{ seomatic.seoDescription }}',
    'twitterImage'       => 'Global SEO Image',
    'sitemapUrls'          => true,
    'sitemapAssets'        => true,
    'sitemapFiles'         => true,
    'sitemapAltLinks'      => true,
    'sitemapChangeFreq'    => 'weekly',
    'sitemapPriority'      => 0.5,
    'sitemapLimit'         => null,
    'sitemapImageFieldMap' => [
        'title'       => 'title',
        'caption'     => 'caption',
        'geoLocation' => 'geo_location',
        'license'     => 'license',
    ],
    'sitemapVideoFieldMap' => [
        'title'        => 'title',
        'description'  => 'description',
        'thumbnailLoc' => 'thumbnail_loc',
        'duration'     => 'duration',
        'category'     => 'category',
    ],
];
