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
use nystudio107\seomatic\services\MetaBundles;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'sourceElementType' => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceId' => null,
    'sourceName' => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceHandle' => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceType' => MetaBundles::GLOBAL_META_BUNDLE,
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

    'metaGlobalVars' => ConfigHelper::getConfigFromFile('GlobalMetaGlobalVars', 'defaults'),

    'metaTagContainer' => ConfigHelper::getConfigFromFile('GlobalMetaTagContainer', 'defaults'),
    'metaLinkContainer' => ConfigHelper::getConfigFromFile('GlobalMetaLinkContainer', 'defaults'),
    'metaScriptContainer' => ConfigHelper::getConfigFromFile('GlobalMetaScriptContainer', 'defaults'),
    'metaJsonLdContainer' => ConfigHelper::getConfigFromFile('GlobalMetaJsonLdContainer', 'defaults'),
    'metaTitleContainer' => ConfigHelper::getConfigFromFile('GlobalMetaTitleContainer', 'defaults'),
    'redirectsContainer' => ConfigHelper::getConfigFromFile('GlobalRedirectsContainer', 'defaults'),
    'frontendTemplatesContainer' => ConfigHelper::getConfigFromFile('GlobalFrontendTemplatesContainer', 'defaults'),
];
