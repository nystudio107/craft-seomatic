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

    const FILE_TYPES = [
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

        $metaBundle = Seomatic::$plugin->metaBundles->getMetaBundleBySourceHandle($type, $handle, $siteId);
        // If it's disabled, just throw a 404
        if ($metaBundle === null || !$metaBundle->metaSitemapVars->sitemapUrls) {
            throw new NotFoundHttpException(Craft::t('seomatic', 'Page not found.'));
        }

        $cache = Craft::$app->getCache();
        $uniqueKey = $groupId.$type.$handle.$siteId;
        $cacheKey = $this::CACHE_KEY.$uniqueKey;
        $queueJobCacheKey = $this::QUEUE_JOB_CACHE_KEY.$uniqueKey;
        $result = $cache->get($cacheKey);
        // If the sitemap isn't cached, start a job to create it
        if ($result === false) {
            // If there's an existing queue job, release it so queue jobs don't stack
            $existingJobId = $cache->get($queueJobCacheKey);
            if ($existingJobId) {
                $queue = Craft::$app->getQueue();
                $queue->release($existingJobId);
                $cache->delete($queueJobCacheKey);
            }
            // Push a new queue job
            $queue = Craft::$app->getQueue();
            $jobId = $queue->push(new GenerateSitemap([
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
                    $this::GLOBAL_SITEMAP_CACHE_TAG,
                    $this::CACHE_KEY.$uniqueKey,
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
            // Return a 503 Service Unavailable an a Retry-After so bots will try back later
            $response = Craft::$app->getResponse();
            $response->setStatusCode(503);
            $response->headers->add('Retry-After', 60);
            // Return an empty XML document
            $lines[] = '<?xml version="1.0" encoding="UTF-8"?>';
            $lines[] = '<!-- ' . Craft::t('seomatic', 'This sitemap has not been generated yet.') . ' -->';
            $lines[] = '<!-- ' . Craft::t('seomatic', 'If you are seeing this in local dev or an') . ' -->';
            $lines[] = '<!-- ' . Craft::t('seomatic', 'environment with `devMode` on, caches only') . ' -->';
            $lines[] = '<!-- ' . Craft::t('seomatic', 'last for 30 seconds in local dev, so it is') . ' -->';
            $lines[] = '<!-- ' . Craft::t('seomatic', 'normal for the sitemap to not be cached.') . ' -->';
            $lines[] = '<urlset>';
            $lines[] = '</urlset>';
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
        TagDependency::invalidate($cache, $this::SITEMAP_CACHE_TAG.$handle.$siteId);
        Craft::info(
            'Sitemap cache cleared: '.$handle,
            __METHOD__
        );
    }

}
