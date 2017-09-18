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
use nystudio107\seomatic\services\MetaBundles;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'sourceBundleType'      => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceId'              => null,
    'sourceName'            => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceHandle'          => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceType'            => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceTemplate'        => '',
    'sourceSiteId'          => null,
    'sourceAltSiteSettings' => [
    ],
    'sourceDateUpdated'     => new \DateTime(),

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

    'metaGlobalVars'      => @include('GlobalVars.php'),
    'metaTagContainer'    => @include('TagContainer.php'),
    'metaLinkContainer'   => @include('LinkContainer.php'),
    'metaScriptContainer' => @include('ScriptContainer.php'),
    'metaJsonLdContainer' => @include('JsonLdContainer.php'),
    'metaTitleContainer'  => @include('TitleContainer.php'),
    'redirectsContainer'  => @include('RedirectsContainer.php'),
];
