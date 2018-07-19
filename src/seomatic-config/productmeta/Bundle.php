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

use nystudio107\seomatic\helpers\Config;
use nystudio107\seomatic\services\MetaBundles;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'bundleVersion'              => '1.0.30',
    'sourceBundleType'           => MetaBundles::PRODUCT_META_BUNDLE,
    'sourceId'                   => null,
    'sourceName'                 => null,
    'sourceHandle'               => null,
    'sourceType'                 => 'product',
    'sourceTemplate'             => '',
    'sourceSiteId'               => null,
    'sourceAltSiteSettings'      => [
    ],
    'sourceDateUpdated'          => new \DateTime(),
    'metaGlobalVars'             => Config::getConfigFromFile('productmeta/GlobalVars'),
    'metaSiteVars'               => Config::getConfigFromFile('productmeta/SiteVars'),
    'metaSitemapVars'            => Config::getConfigFromFile('productmeta/SitemapVars'),
    'metaBundleSettings'         => Config::getConfigFromFile('productmeta/BundleSettings'),
    'metaContainers'             => Config::getMergedConfigFromFiles([
        'productmeta/TagContainer',
        'productmeta/LinkContainer',
        'productmeta/ScriptContainer',
        'productmeta/JsonLdContainer',
        'productmeta/TitleContainer',
    ]),
    'redirectsContainer'         => Config::getConfigFromFile('productmeta/RedirectsContainer'),
    'frontendTemplatesContainer' => Config::getConfigFromFile('productmeta/FrontendTemplatesContainer'),
];
