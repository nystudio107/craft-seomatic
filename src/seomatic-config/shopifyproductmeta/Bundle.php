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

use nystudio107\seomatic\helpers\Config;
use nystudio107\seomatic\seoelements\SeoShopifyProduct;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'bundleVersion' => '1.0.39',
    'sourceBundleType' => SeoShopifyProduct::getMetaBundleType(),
    'sourceId' => null,
    'sourceName' => null,
    'sourceHandle' => null,
    'sourceType' => 'shopifyproduct',
    'typeId' => null,
    'sourceTemplate' => '',
    'sourceSiteId' => null,
    'sourceAltSiteSettings' => [
    ],
    'sourceDateUpdated' => new DateTime(),
    'metaGlobalVars' => Config::getConfigFromFile('shopifyproductmeta/GlobalVars'),
    'metaSiteVars' => Config::getConfigFromFile('shopifyproductmeta/SiteVars'),
    'metaSitemapVars' => Config::getConfigFromFile('shopifyproductmeta/SitemapVars'),
    'metaBundleSettings' => Config::getConfigFromFile('shopifyproductmeta/BundleSettings'),
    'metaContainers' => Config::getMergedConfigFromFiles([
        'shopifyproductmeta/TagContainer',
        'shopifyproductmeta/LinkContainer',
        'shopifyproductmeta/ScriptContainer',
        'shopifyproductmeta/JsonLdContainer',
        'shopifyproductmeta/TitleContainer',
    ]),
    'redirectsContainer' => Config::getConfigFromFile('shopifyproductmeta/RedirectsContainer'),
    'frontendTemplatesContainer' => Config::getConfigFromFile('shopifyproductmeta/FrontendTemplatesContainer'),
];
