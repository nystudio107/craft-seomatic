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
    'bundleVersion'              => '1.0.22',
    'sourceBundleType'           => MetaBundles::CATEGORYGROUP_META_BUNDLE,
    'sourceId'                   => null,
    'sourceName'                 => null,
    'sourceHandle'               => null,
    'sourceType'                 => 'category',
    'sourceTemplate'             => '',
    'sourceSiteId'               => null,
    'sourceAltSiteSettings'      => [
    ],
    'sourceDateUpdated'          => new \DateTime(),
    'metaGlobalVars'             => Config::getConfigFromFile('categorymeta/GlobalVars'),
    'metaSiteVars'               => Config::getConfigFromFile('categorymeta/SiteVars'),
    'metaSitemapVars'            => Config::getConfigFromFile('categorymeta/SitemapVars'),
    'metaBundleSettings'         => Config::getConfigFromFile('categorymeta/BundleSettings'),
    'metaContainers'             => Config::getMergedConfigFromFiles([
        'categorymeta/TagContainer',
        'categorymeta/LinkContainer',
        'categorymeta/ScriptContainer',
        'categorymeta/JsonLdContainer',
        'categorymeta/TitleContainer',
    ]),
    'redirectsContainer'         => Config::getConfigFromFile('categorymeta/RedirectsContainer'),
    'frontendTemplatesContainer' => Config::getConfigFromFile('categorymeta/FrontendTemplatesContainer'),
];
