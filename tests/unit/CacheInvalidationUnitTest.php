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

namespace nystudio107\seomatictests\unit;

use Codeception\Test\Unit;
use Craft;
use nystudio107\seomatic\models\SitemapIndexTemplate;
use nystudio107\seomatic\models\SitemapTemplate;
use nystudio107\seomatic\services\MetaContainers;
use nystudio107\seomatic\services\Sitemaps;
use yii\caching\TagDependency;

/**
 * Tests deferred cache invalidation for bulk operations.
 */
class CacheInvalidationUnitTest extends Unit
{
    /**
     * Verify that meta container invalidation can be deferred and resumed.
     *
     * @return void
     */
    public function testMetaContainerInvalidationCanBeDeferred(): void
    {
        $cache = Craft::$app->getCache();
        $service = new MetaContainers([
            'deferInvalidation' => true,
        ]);
        $sourceId = 123;
        $sourceType = 'section';
        $siteId = 1;
        $uri = 'example';
        $cacheItems = [
            'deferred-meta-global' => MetaContainers::GLOBAL_METACONTAINER_CACHE_TAG,
            'deferred-meta-source' => MetaContainers::METACONTAINER_CACHE_TAG . $sourceId . $sourceType . $siteId,
            'deferred-meta-path' => MetaContainers::METACONTAINER_CACHE_TAG . $uri . $siteId,
        ];

        foreach ($cacheItems as $key => $tag) {
            $cache->set($key, true, 0, new TagDependency(['tags' => $tag]));
        }

        $service->invalidateCaches();
        $service->invalidateContainerCacheById($sourceId, $sourceType, $siteId);
        $service->invalidateContainerCacheByPath($uri, $siteId);

        foreach (array_keys($cacheItems) as $key) {
            self::assertTrue($cache->get($key));
        }

        $service->deferInvalidation = false;
        $service->invalidateCaches();
        $service->invalidateContainerCacheById($sourceId, $sourceType, $siteId);
        $service->invalidateContainerCacheByPath($uri, $siteId);

        foreach (array_keys($cacheItems) as $key) {
            self::assertFalse($cache->get($key));
        }
    }

    /**
     * Verify that sitemap invalidation can be deferred and resumed.
     *
     * @return void
     */
    public function testSitemapInvalidationCanBeDeferred(): void
    {
        $cache = Craft::$app->getCache();
        $service = new Sitemaps([
            'deferInvalidation' => true,
        ]);
        $handle = 'news';
        $siteId = 1;
        $cacheItems = [
            'deferred-sitemap-global' => Sitemaps::GLOBAL_SITEMAP_CACHE_TAG,
            'deferred-sitemap' => SitemapTemplate::SITEMAP_CACHE_TAG . $handle . $siteId,
            'deferred-sitemap-index' => SitemapIndexTemplate::SITEMAP_INDEX_CACHE_TAG,
        ];

        foreach ($cacheItems as $key => $tag) {
            $cache->set($key, true, 0, new TagDependency(['tags' => $tag]));
        }

        $service->invalidateCaches();
        $service->invalidateSitemapCache($handle, $siteId, 'section');
        $service->invalidateSitemapIndexCache();

        foreach (array_keys($cacheItems) as $key) {
            self::assertTrue($cache->get($key));
        }

        $service->deferInvalidation = false;
        $service->invalidateCaches();
        $service->invalidateSitemapCache($handle, $siteId, 'section');
        $service->invalidateSitemapIndexCache();

        foreach (array_keys($cacheItems) as $key) {
            self::assertFalse($cache->get($key));
        }
    }
}
