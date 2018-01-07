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
    'sourceBundleType'      => MetaBundles::SECTION_META_BUNDLE,
    'sourceId'              => null,
    'sourceName'            => null,
    'sourceHandle'          => null,
    'sourceType'            => null,
    'sourceTemplate'        => '',
    'sourceSiteId'          => null,
    'sourceAltSiteSettings' => [
    ],
    'sourceDateUpdated'     => new \DateTime(),
    'metaGlobalVars'        => Config::getConfigFromFile('entrymeta/GlobalVars'),
    'metaSitemapVars'       => Config::getConfigFromFile('entrymeta/SitemapVars'),
    'metaTagContainer'      => Config::getConfigFromFile('entrymeta/TagContainer'),
    'metaLinkContainer'     => Config::getConfigFromFile('entrymeta/LinkContainer'),
    'metaScriptContainer'   => Config::getConfigFromFile('entrymeta/ScriptContainer'),
    'metaJsonLdContainer'   => Config::getConfigFromFile('entrymeta/JsonLdContainer'),
    'metaTitleContainer'    => Config::getConfigFromFile('entrymeta/TitleContainer'),
    'redirectsContainer'    => Config::getConfigFromFile('entrymeta/RedirectsContainer'),
];
