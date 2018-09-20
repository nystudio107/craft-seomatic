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
    'bundleVersion'              => '1.0.39',
    'sourceBundleType'           => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceId'                   => 1,
    'sourceName'                 => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceHandle'               => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceType'                 => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceTemplate'             => '',
    'sourceSiteId'               => null,
    'sourceAltSiteSettings'      => [
    ],
    'sourceDateUpdated'          => new \DateTime(),
    'metaGlobalVars'             => Config::getConfigFromFile('globalmeta/GlobalVars'),
    'metaSiteVars'               => Config::getConfigFromFile('globalmeta/SiteVars'),
    'metaSitemapVars'            => Config::getConfigFromFile('globalmeta/SitemapVars'),
    'metaBundleSettings'         => Config::getConfigFromFile('globalmeta/BundleSettings'),
    'metaContainers'             => Config::getMergedConfigFromFiles([
        'globalmeta/TagContainer',
        'globalmeta/LinkContainer',
        'globalmeta/ScriptContainer',
        'globalmeta/JsonLdContainer',
        'globalmeta/TitleContainer',
    ]),
    'redirectsContainer'         => Config::getConfigFromFile('globalmeta/RedirectsContainer'),
    'frontendTemplatesContainer' => Config::getConfigFromFile('globalmeta/FrontendTemplatesContainer'),
];
