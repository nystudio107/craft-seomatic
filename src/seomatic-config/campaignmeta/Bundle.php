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
use nystudio107\seomatic\seoelements\SeoCampaign;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'bundleVersion' => '1.0.35',
    'sourceBundleType' => SeoCampaign::getMetaBundleType(),
    'sourceId' => null,
    'sourceName' => null,
    'sourceHandle' => null,
    'sourceType' => 'campaign',
    'typeId' => null,
    'sourceTemplate' => '',
    'sourceSiteId' => null,
    'sourceAltSiteSettings' => [
    ],
    'sourceDateUpdated' => new DateTime(),
    'metaGlobalVars' => Config::getConfigFromFile('campaignmeta/GlobalVars'),
    'metaSiteVars' => Config::getConfigFromFile('campaignmeta/SiteVars'),
    'metaSitemapVars' => Config::getConfigFromFile('campaignmeta/SitemapVars'),
    'metaBundleSettings' => Config::getConfigFromFile('campaignmeta/BundleSettings'),
    'metaContainers' => Config::getMergedConfigFromFiles([
        'campaignmeta/TagContainer',
        'campaignmeta/LinkContainer',
        'campaignmeta/ScriptContainer',
        'campaignmeta/JsonLdContainer',
        'campaignmeta/TitleContainer',
    ]),
    'redirectsContainer' => Config::getConfigFromFile('campaignmeta/RedirectsContainer'),
    'frontendTemplatesContainer' => Config::getConfigFromFile('campaignmeta/FrontendTemplatesContainer'),
];
