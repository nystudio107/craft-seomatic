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

namespace nystudio107\seomatic\models;

use Craft;
use craft\console\Application as ConsoleApplication;
use nystudio107\fastcgicachebust\FastcgiCacheBust;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\helpers\SiteHelper;
use nystudio107\seomatic\helpers\Sitemap;
use nystudio107\seomatic\Seomatic;
use yii\caching\TagDependency;
use yii\web\NotFoundHttpException;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class SitemapTemplate extends FrontendTemplate implements SitemapInterface
{
    // Constants
    // =========================================================================

    public const TEMPLATE_TYPE = 'SitemapTemplate';

    public const CACHE_KEY = 'seomatic_sitemap_';

    public const QUEUE_JOB_CACHE_KEY = 'seomatic_sitemap_queue_job_';

    public const SITEMAP_CACHE_TAG = 'seomatic_sitemap_';

    public const FILE_TYPES = [
        'excel',
        'pdf',
        'illustrator',
        'powerpoint',
        'text',
        'word',
        'xml',
    ];

    // Static Methods
    // =========================================================================

    /**
     * @param array $config
     *
     * @return null|SitemapTemplate
     */
    public static function create(array $config = [])
    {
        $defaults = [
            'path' => 'sitemaps-<groupId:\d+>-<type:[\w\.*]+>-<handle:[\w\.*]+>-<siteId:\d+>-<file:[-\w\.*]+>',
            'template' => '',
            'controller' => 'sitemap',
            'action' => 'sitemap',
        ];
        $config = array_merge($config, $defaults);

        return new SitemapTemplate($config);
    }

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
        ]);

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function fields(): array
    {
        return parent::fields();
    }

    /**
     * @inheritdoc
     */
    public function render(array $params = []): string
    {
        $groupId = $params['groupId'];
        $type = $params['type'];
        $handle = $params['handle'];
        $siteId = $params['siteId'];
        $page = $params['page'] ?? 0;

        $request = Craft::$app->getRequest();
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle($type, $handle, $siteId);
        // If it doesn't exist, throw a 404
        if ($metaBundle === null) {
            if ($request->isCpRequest || $request->isConsoleRequest) {
                return '';
            }
            throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
        }
        // Check to see if robots is `none` or `no index`
        $robotsEnabled = true;
        if (!empty($metaBundle->metaGlobalVars->robots)) {
            $robotsEnabled = $metaBundle->metaGlobalVars->robots !== 'none' &&
                $metaBundle->metaGlobalVars->robots !== 'noindex';
        }
        $sitemapUrls = $metaBundle->metaSitemapVars->sitemapUrls;
        if (Seomatic::$plugin->sitemaps->anyEntryTypeHasSitemapUrls($metaBundle)) {
            $robotsEnabled = true;
            $sitemapUrls = true;
        }
        if ($sitemapUrls && !SiteHelper::siteEnabledWithUrls($siteId)) {
            $sitemapUrls = false;
        }
        // If it's disabled, just throw a 404
        if (!$sitemapUrls || !$robotsEnabled) {
            if ($request->isCpRequest || $request->isConsoleRequest) {
                return '';
            }
            throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
        }

        $cache = Craft::$app->getCache();
        $pageCacheSuffix = 's' . (int)$metaBundle->metaSitemapVars->sitemapPageSize . 'p' . $page;

        $uniqueKey = $groupId . $type . $handle . $siteId . $pageCacheSuffix;
        $cacheKey = self::CACHE_KEY . $uniqueKey;
        $result = $cache->get($cacheKey);

        // If the sitemap isn't cached, render it immediately
        if ($result === false) {
            $sitemap = Sitemap::generateSitemap([
                'groupId' => $groupId,
                'type' => $type,
                'handle' => $handle,
                'siteId' => $siteId,
                'page' => $page,
            ]);

            if ($sitemap) {
                $dependency = new TagDependency([
                    'tags' => [
                        self::GLOBAL_SITEMAP_CACHE_TAG,
                        self::SITEMAP_CACHE_TAG . $handle . $siteId,
                        self::SITEMAP_CACHE_TAG . $handle . $siteId . $pageCacheSuffix,
                    ],
                ]);

                $cacheDuration = Seomatic::$devMode
                    ? Seomatic::DEVMODE_CACHE_DURATION
                    : null;

                $result = $cache->set($cacheKey, $sitemap, $cacheDuration, $dependency);

                // Output some info if this is a console app
                if (Craft::$app instanceof ConsoleApplication) {
                    echo 'Sitemap cache result: ' . print_r($result, true) . ' for cache key: ' . $cacheKey . PHP_EOL;
                }

                // If the FastCGI Cache Bust plugin is installed, clear its caches too
                /** @var FastcgiCacheBust $plugin */
                $plugin = Craft::$app->getPlugins()->getPlugin('fastcgi-cache-bust');
                if ($plugin !== null) {
                    $plugin->cache->clearAll();
                }

                return $sitemap;
            }
        } else {
            if (Craft::$app instanceof ConsoleApplication) {
                echo 'Found in cache' . PHP_EOL;
            }
        }

        return $result;
    }

    /**
     * Invalidate a sitemap cache
     *
     * @param string $handle
     * @param int $siteId
     */
    public function invalidateCache(string $handle, int $siteId)
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, self::SITEMAP_CACHE_TAG . $handle . $siteId);
        Craft::info(
            'Sitemap cache cleared: ' . $handle,
            __METHOD__
        );
    }
}
