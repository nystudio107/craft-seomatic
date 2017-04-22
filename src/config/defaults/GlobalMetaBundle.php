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

use nystudio107\seomatic\services\MetaBundles;
use nystudio107\seomatic\models\MetaTagContainer;
use nystudio107\seomatic\models\MetaLinkContainer;
use nystudio107\seomatic\models\MetaScriptContainer;
use nystudio107\seomatic\models\MetaJsonLdContainer;
use nystudio107\seomatic\models\FrontendTemplateContainer;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */

return [
    'sourceElementType' => MetaBundles::GLOBAL_META_BUNDLE,
    'sourceId' => null,
    'sourceName' => 'Global',
    'sourceHandle' => 'global',
    'sourceType' => 'global',
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

    'metaTagContainer' => MetaTagContainer::create(),
    'metaLinkContainer' => MetaLinkContainer::create(),
    'metaScriptContainer' => MetaScriptContainer::create(),
    'metaJsonLdContainer' => MetaJsonLdContainer::create(),
    'redirectsContainer' => [
    ],
    'frontendTemplatesContainer' => FrontendTemplateContainer::create(),
];
