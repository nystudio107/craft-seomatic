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
use nystudio107\seomatic\seoelements\SeoDigitalProduct;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'bundleVersion' => '1.0.36',
    'sourceBundleType' => SeoDigitalProduct::getMetaBundleType(),
    'sourceId' => null,
    'sourceName' => null,
    'sourceHandle' => null,
    'sourceType' => 'digitalproduct',
    'typeId' => null,
    'sourceTemplate' => '',
    'sourceSiteId' => null,
    'sourceAltSiteSettings' => [
    ],
    'sourceDateUpdated' => new DateTime(),
    'metaGlobalVars' => Config::getConfigFromFile('digitalproductmeta/GlobalVars'),
    'metaSiteVars' => Config::getConfigFromFile('digitalproductmeta/SiteVars'),
    'metaSitemapVars' => Config::getConfigFromFile('digitalproductmeta/SitemapVars'),
    'metaBundleSettings' => Config::getConfigFromFile('digitalproductmeta/BundleSettings'),
    'metaContainers' => Config::getMergedConfigFromFiles([
        'digitalproductmeta/TagContainer',
        'digitalproductmeta/LinkContainer',
        'digitalproductmeta/ScriptContainer',
        'digitalproductmeta/JsonLdContainer',
        'digitalproductmeta/TitleContainer',
    ]),
    'redirectsContainer' => Config::getConfigFromFile('digitalproductmeta/RedirectsContainer'),
    'frontendTemplatesContainer' => Config::getConfigFromFile('digitalproductmeta/FrontendTemplatesContainer'),
];
