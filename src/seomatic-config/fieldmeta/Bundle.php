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
    'sourceBundleType'           => MetaBundles::FIELD_META_BUNDLE,
    'sourceId'                   => null,
    'sourceName'                 => null,
    'sourceHandle'               => null,
    'sourceType'                 => 'field',
    'sourceTemplate'             => '',
    'sourceSiteId'               => null,
    'sourceAltSiteSettings'      => [
    ],
    'sourceDateUpdated'          => new \DateTime(),
    'metaGlobalVars'             => Config::getConfigFromFile('fieldmeta/GlobalVars'),
    'metaSiteVars'               => Config::getConfigFromFile('fieldmeta/SiteVars'),
    'metaSitemapVars'            => Config::getConfigFromFile('fieldmeta/SitemapVars'),
    'metaBundleSettings'         => Config::getConfigFromFile('fieldmeta/BundleSettings'),
    'metaContainers'             => Config::getMergedConfigFromFiles([
        'fieldmeta/TagContainer',
        'fieldmeta/LinkContainer',
        'fieldmeta/ScriptContainer',
        'fieldmeta/JsonLdContainer',
        'fieldmeta/TitleContainer',
    ]),
    'redirectsContainer'         => Config::getConfigFromFile('fieldmeta/RedirectsContainer'),
    'frontendTemplatesContainer' => Config::getConfigFromFile('fieldmeta/FrontendTemplatesContainer'),
];
