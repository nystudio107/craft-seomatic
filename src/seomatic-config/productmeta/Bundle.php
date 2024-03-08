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
use nystudio107\seomatic\seoelements\SeoProduct;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'bundleVersion' => '1.0.38',
    'sourceBundleType' => SeoProduct::getMetaBundleType(),
    'sourceId' => null,
    'sourceName' => null,
    'sourceHandle' => null,
    'sourceType' => 'product',
    'typeId' => null,
    'sourceTemplate' => '',
    'sourceSiteId' => null,
    'sourceAltSiteSettings' => [
    ],
    'sourceDateUpdated' => new DateTime(),
    'metaGlobalVars' => Config::getConfigFromFile('productmeta/GlobalVars'),
    'metaSiteVars' => Config::getConfigFromFile('productmeta/SiteVars'),
    'metaSitemapVars' => Config::getConfigFromFile('productmeta/SitemapVars'),
    'metaBundleSettings' => Config::getConfigFromFile('productmeta/BundleSettings'),
    'metaContainers' => Config::getMergedConfigFromFiles([
        'productmeta/TagContainer',
        'productmeta/LinkContainer',
        'productmeta/ScriptContainer',
        'productmeta/JsonLdContainer',
        'productmeta/TitleContainer',
    ]),
    'redirectsContainer' => Config::getConfigFromFile('productmeta/RedirectsContainer'),
    'frontendTemplatesContainer' => Config::getConfigFromFile('productmeta/FrontendTemplatesContainer'),
];
