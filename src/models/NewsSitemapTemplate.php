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
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\helpers\Queue as QueueHelper;
use nystudio107\seomatic\jobs\GenerateSitemap;

use Craft;
use craft\queue\QueueInterface;

use nystudio107\seomatic\services\Sitemaps;
use yii\caching\TagDependency;
use yii\web\NotFoundHttpException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.5.0i
 */
class NewsSitemapTemplate extends SitemapTemplate
{
    // Constants
    // =========================================================================

    const TEMPLATE_TYPE = 'NewsSitemapTemplate';

    const CACHE_KEY = 'seomatic_news_sitemap_';

    const QUEUE_JOB_CACHE_KEY = 'seomatic_news_sitemap_queue_job_';

    protected static $defaultConfig = [
        'path' => 'sitemaps-<groupId:\d+>-<type:[\w\.*]+>-<handle:[\w\.*]+>-<siteId:\d+>-news-sitemap.xml',
        'template' => '',
        'controller' => 'sitemap',
        'action' => 'news-sitemap',
    ];


    /**
     * @param MetaBundle $metaBundle
     * @return bool
     */
    protected function getIsSitemapEnabled(MetaBundle $metaBundle): bool
    {
        return $metaBundle->metaNewsSitemapVars->newsSitemapEnabled;
    }

    /**
     * @param MetaBundle $metaBundle
     * @return bool
     */
    protected function getForceCreatingSitemap(MetaBundle $metaBundle): bool
    {
        return Seomatic::$plugin->sitemaps->anyEntryTypeHasSitemapUrls($metaBundle, Sitemaps::SITEMAP_TYPE_NEWS);
    }
}
