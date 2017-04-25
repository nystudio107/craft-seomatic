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

use nystudio107\seomatic\helpers\Config as ConfigHelper;

use craft\elements\Entry;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'sourceElementType' => Entry::class,
    'sourceId' => null,
    'sourceName' => null,
    'sourceHandle' => null,
    'sourceType' => null,
    'sourceTemplate' => '',
    'sourceSiteId' => null,
    'sourceAltSiteSettings' => [
    ],
    'sourceDateUpdated' => new \DateTime(),

    'sitemapUrls' => true,
    'sitemapAssets' => true,
    'sitemapFiles' => false,
    'sitemapAltLinks' => true,
    'sitemapChangeFreq' => 'weekly',
    'sitemapPriority' => 0.5,

    'metaGlobalVars' => ConfigHelper::getConfigFromFile('EntryMetaGlobalVars', 'defaults'),

    'metaTagContainer' => ConfigHelper::getConfigFromFile('EntryMetaTagContainer', 'defaults'),
    'metaLinkContainer' => ConfigHelper::getConfigFromFile('EntryMetaLinkContainer', 'defaults'),
    'metaScriptContainer' => ConfigHelper::getConfigFromFile('EntryMetaScriptContainer', 'defaults'),
    'metaJsonLdContainer' => ConfigHelper::getConfigFromFile('EntryMetaJsonLdContainer', 'defaults'),
    'metaTitleContainer' => ConfigHelper::getConfigFromFile('EntryMetaTitleContainer', 'defaults'),
    'redirectsContainer' => ConfigHelper::getConfigFromFile('EntryRedirectsContainer', 'defaults'),
    'frontendTemplatesContainer' => ConfigHelper::getConfigFromFile('EntryFrontendTemplatesContainer', 'defaults'),
];
