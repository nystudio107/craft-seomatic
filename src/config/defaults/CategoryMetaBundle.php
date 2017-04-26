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

use craft\elements\Category;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'sourceElementType' => Category::class,
    'sourceId' => null,
    'sourceName' => null,
    'sourceHandle' => null,
    'sourceType' => 'category',
    'sourceTemplate' => '',
    'sourceSiteId' => null,
    'sourceAltSiteSettings' => [
    ],
    'sourceDateUpdated' => new \DateTime(),

    'sitemapUrls' => true,
    'sitemapAssets' => true,
    'sitemapFiles' => true,
    'sitemapAltLinks' => true,
    'sitemapChangeFreq' => 'weekly',
    'sitemapPriority' => 0.5,

    'metaGlobalVars' => ConfigHelper::getConfigFromFile('CategoryMetaGlobalVars', 'defaults'),

    'metaTagContainer' => ConfigHelper::getConfigFromFile('CategoryMetaTagContainer', 'defaults'),
    'metaLinkContainer' => ConfigHelper::getConfigFromFile('CategoryMetaLinkContainer', 'defaults'),
    'metaScriptContainer' => ConfigHelper::getConfigFromFile('CategoryMetaScriptContainer', 'defaults'),
    'metaJsonLdContainer' => ConfigHelper::getConfigFromFile('CategoryMetaJsonLdContainer', 'defaults'),
    'metaTitleContainer' => ConfigHelper::getConfigFromFile('CategoryMetaTitleContainer', 'defaults'),
    'redirectsContainer' => ConfigHelper::getConfigFromFile('CategoryRedirectsContainer', 'defaults'),
    'frontendTemplatesContainer' => ConfigHelper::getConfigFromFile('CategoryFrontendTemplatesContainer', 'defaults'),
];
