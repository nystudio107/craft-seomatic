<?php
/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2019 nystudio107
 */

use nystudio107\seomatic\helpers\Config;
use nystudio107\seomatic\seoelements\SeoEvent;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.2.0
 */

return [
    'bundleVersion' => '1.0.3',
    'sourceBundleType' => SeoEvent::getMetaBundleType(),
    'sourceId' => null,
    'sourceName' => null,
    'sourceHandle' => null,
    'sourceType' => 'event',
    'typeId' => null,
    'sourceTemplate' => '',
    'sourceSiteId' => null,
    'sourceAltSiteSettings' => [
    ],
    'sourceDateUpdated' => new DateTime(),
    'metaGlobalVars' => Config::getConfigFromFile('eventmeta/GlobalVars'),
    'metaSiteVars' => Config::getConfigFromFile('eventmeta/SiteVars'),
    'metaSitemapVars' => Config::getConfigFromFile('eventmeta/SitemapVars'),
    'metaBundleSettings' => Config::getConfigFromFile('eventmeta/BundleSettings'),
    'metaContainers' => Config::getMergedConfigFromFiles([
        'eventmeta/TagContainer',
        'eventmeta/LinkContainer',
        'eventmeta/ScriptContainer',
        'eventmeta/JsonLdContainer',
        'eventmeta/TitleContainer',
    ]),
    'redirectsContainer' => Config::getConfigFromFile('eventmeta/RedirectsContainer'),
    'frontendTemplatesContainer' => Config::getConfigFromFile('eventmeta/FrontendTemplatesContainer'),
];
