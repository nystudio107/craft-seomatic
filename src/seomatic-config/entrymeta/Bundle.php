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
use nystudio107\seomatic\seoelements\SeoEntry;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'bundleVersion' => '1.0.31',
    'sourceBundleType' => SeoEntry::getMetaBundleType(),
    'sourceId' => null,
    'sourceName' => null,
    'sourceHandle' => null,
    'sourceType' => 'section',
    'typeId' => null,
    'sourceTemplate' => '',
    'sourceSiteId' => null,
    'sourceAltSiteSettings' => [
    ],
    'sourceDateUpdated' => new DateTime(),
    'metaGlobalVars' => Config::getConfigFromFile('entrymeta/GlobalVars'),
    'metaSiteVars' => Config::getConfigFromFile('entrymeta/SiteVars'),
    'metaSitemapVars' => Config::getConfigFromFile('entrymeta/SitemapVars'),
    'metaBundleSettings' => Config::getConfigFromFile('entrymeta/BundleSettings'),
    'metaContainers' => Config::getMergedConfigFromFiles([
        'entrymeta/TagContainer',
        'entrymeta/LinkContainer',
        'entrymeta/ScriptContainer',
        'entrymeta/JsonLdContainer',
        'entrymeta/TitleContainer',
    ]),
    'redirectsContainer' => Config::getConfigFromFile('entrymeta/RedirectsContainer'),
    'frontendTemplatesContainer' => Config::getConfigFromFile('entrymeta/FrontendTemplatesContainer'),
];
