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

use Craft;
use craft\queue\QueueInterface;
use nystudio107\seomatic\base\FrontendTemplate;
use nystudio107\seomatic\base\SitemapInterface;
use nystudio107\seomatic\helpers\Queue as QueueHelper;
use nystudio107\seomatic\jobs\GenerateSitemap;
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

    const TEMPLATE_TYPE = 'SitemapTemplate';

    const CACHE_KEY = 'seomatic_sitemap_';

    const QUEUE_JOB_CACHE_KEY = 'seomatic_sitemap_queue_job_';

    const SITEMAP_CACHE_TAG = 'seomatic_sitemap_';

    const SITEMAP_JOB_CLASS = GenerateSitemap::class;

    const FILE_TYPES = [
        'excel',
        'pdf',
        'illustrator',
        'powerpoint',
        'text',
        'word',
        'xml',
    ];

    protected static $defaultConfig = [
        'path' => 'sitemaps-<groupId:\d+>-<type:[\w\.*]+>-<handle:[\w\.*]+>-<siteId:\d+>-sitemap.xml',
        'template' => '',
        'controller' => 'sitemap',
        'action' => 'sitemap',
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

        $config = array_merge($config, static::$defaultConfig);

        return new static($config);
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
        $throwException = $params['throwException'] ?? true;
        $request = Craft::$app->getRequest();
        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle($type, $handle, $siteId);
        // If it doesn't exist, throw a 404
        if ($metaBundle === null ) {
            if ($request->isCpRequest || $request->isConsoleRequest) {
                return '';
            }
            if ($throwException) {
                throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
            }
            return '';
        }
        // Check to see if robots is `none` or `no index`
        $robotsEnabled = true;
        if (!empty($metaBundle->metaGlobalVars->robots)) {
            $robotsEnabled = $metaBundle->metaGlobalVars->robots !== 'none' &&
                $metaBundle->metaGlobalVars->robots !== 'noindex';
        }
        $sitemapEnabled = $this->getIsSitemapEnabled($metaBundle);
        if ($this->getForceCreatingSitemap($metaBundle)) {
            $robotsEnabled = true;
            $sitemapEnabled = true;
        }

        // If it's disabled, just throw a 404
        if (!$sitemapEnabled || !$robotsEnabled) {
            if ($request->isCpRequest || $request->isConsoleRequest) {
                return '';
            }
            if ($throwException) {
                throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
            }
        }

        $cache = Craft::$app->getCache();
        $uniqueKey = $groupId.$type.$handle.$siteId;
        $cacheKey = static::CACHE_KEY.$uniqueKey;
        $queueJobCacheKey = static::QUEUE_JOB_CACHE_KEY.$uniqueKey;
        $result = $cache->get($cacheKey);
        // If the sitemap isn't cached, start a job to create it
        if ($result === false) {
            $queue = Craft::$app->getQueue();
            // If there's an existing queue job, release it so queue jobs don't stack
            $existingJobId = $cache->get($queueJobCacheKey);
            // Make sure the queue uses the Craft web interface
            if ($existingJobId && $queue instanceof QueueInterface) {
                $queue = Craft::$app->getQueue();
                $queue->release($existingJobId);
                $cache->delete($queueJobCacheKey);
            }
            // Push a new queue job
            $class = static::SITEMAP_JOB_CLASS;

            $jobId = $queue->push(new $class([
                'groupId' => $groupId,
                'type' => $type,
                'handle' => $handle,
                'siteId' => $siteId,
                'queueJobCacheKey' => $queueJobCacheKey,
            ]));

            // Stash the queue job id in the cache for future reference
            $cacheDuration = 3600;
            $dependency = new TagDependency([
                'tags' => [
                    self::GLOBAL_SITEMAP_CACHE_TAG,
                    self::CACHE_KEY.$uniqueKey,
                ],
            ]);
            $cache->set($queueJobCacheKey, $jobId, $cacheDuration, $dependency);
            Craft::debug(
                Craft::t(
                    'seomatic',
                    'Started GenerateSitemap queue job id: {jobId} with cache key {cacheKey}',
                    [
                        'jobId' => $jobId,
                        'cacheKey' => $cacheKey,
                    ]
                ),
                __METHOD__
            );
            // Try to run the queue immediately
            QueueHelper::run();
            // Try it again now
            $result = $cache->get($cacheKey);
            if ($result !== false) {
                return $result;
            }
            // Return a 503 Service Unavailable and a Retry-After so bots will try back later
            $lines = [];
            $response = Craft::$app->getResponse();
            if (!$request->isConsoleRequest && $throwException) {
                $response->setStatusCode(503);
                $response->headers->add('Retry-After', 60);
                $response->headers->add('Cache-Control', 'no-cache, no-store');
                // Return an empty XML document
                $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
                $lines[] = '<?xml-stylesheet type="text/xsl" href="sitemap-empty.xsl"?>';
                $lines[] = '<!-- ' . Craft::t('seomatic', 'This sitemap has not been generated yet.') . ' -->';
                $lines[] = '<!-- ' . Craft::t('seomatic', 'If you are seeing this in local dev or an') . ' -->';
                $lines[] = '<!-- ' . Craft::t('seomatic', 'environment with `devMode` on, caches only') . ' -->';
                $lines[] = '<!-- ' . Craft::t('seomatic', 'last for 30 seconds in local dev, so it is') . ' -->';
                $lines[] = '<!-- ' . Craft::t('seomatic', 'normal for the sitemap to not be cached.') . ' -->';
                $lines[] = '<urlset>';
                $lines[] = '</urlset>';
            }
            $lines = implode("\r\n", $lines);

            return $lines;
        }

        return $result;
    }

    /**
     * Invalidate a sitemap cache
     *
     * @param string $handle
     * @param int    $siteId
     */
    public function invalidateCache(string $handle, int $siteId)
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, self::SITEMAP_CACHE_TAG.$handle.$siteId);
        Craft::info(
            'Sitemap cache cleared: '.$handle,
            __METHOD__
        );
    }

    /**
     * Return true whether the sitemap is enabled.
     *
     * @param MetaBundle $metaBundle
     * @return bool
     */
    protected function getIsSitemapEnabled(MetaBundle $metaBundle): bool
    {
        return $metaBundle->metaSitemapVars->sitemapUrls;
    }

    /**
     * Return whether sitemap should definitely be created for this section.
     *
     * @param MetaBundle $metaBundle
     * @return bool
     */
    protected function getForceCreatingSitemap(MetaBundle $metaBundle): bool
    {
        return Seomatic::$plugin->sitemaps->anyEntryTypeHasSitemapUrls($metaBundle);
    }
}
