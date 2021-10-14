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

namespace nystudio107\seomatic\models;

use nystudio107\seomatic\Seomatic;
use nystudio107\seomatic\services\Sitemaps;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.5.0
 */
class NewsSitemapIndexTemplate extends SitemapIndexTemplate
{
    const TEMPLATE_TYPE = 'NewsSitemapIndexTemplate';
    const CACHE_KEY = 'seomatic_news_sitemap_index';

    protected static $defaultConfig = [
        'path' => 'sitemaps-<groupId:\d+>-news-sitemap.xml',
        'template' => '',
        'controller' => 'sitemap',
        'action' => 'news-sitemap-index',
    ];

    /**
     * @param MetaBundle $metaBundle
     * @return string
     */
    protected function getSitemapUrlForBundle(MetaBundle $metaBundle): string
    {
        return Seomatic::$plugin->sitemaps->sitemapUrlForBundle(
            $metaBundle->sourceBundleType,
            $metaBundle->sourceHandle,
            $metaBundle->sourceSiteId,
            Sitemaps::SITEMAP_TYPE_NEWS
        );
    }

    /**
     * @inheritdoc
     */
    protected function getIsSitemapEnabled(MetaBundle $metaBundle): bool
    {
        return (bool)$metaBundle->metaNewsSitemapVars->newsSitemapEnabled;
    }

    /**
     * @inheritdoc
     */
    protected function getForceCreatingSitemap(MetaBundle $metaBundle): bool
    {
        return Seomatic::$plugin->sitemaps->anyEntryTypeHasSitemapUrls($metaBundle, Sitemaps::SITEMAP_TYPE_NEWS);
    }

    /**
     * @inheritdoc
     */
    protected function getAdditionalSitemapData(int $siteId): string
    {
        return '';
    }
}
