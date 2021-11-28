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

namespace nystudio107\seomatic\queue;

use Craft;
use craft\queue\BaseJob;
use craft\queue\QueueInterface;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.4.0
 */
abstract class SingletonJob extends BaseJob
{
   protected $queueJobCacheKey = '';

   const CACHE_KEY = 'seomatic_singleton_job_';
   const CACHE_DURATION = 3600;

    // Public Methods
    // =========================================================================
    /**
     * @inheritDoc
     */
    public function __construct($config = [])
    {
        if (empty($config['queueJobCacheKey'])) {
            throw new \LogicException("Singleton jobs must have a cache key provided.");
        }

        $this->queueJobCacheKey = $config['queueJobCacheKey'];
        unset($config['queueJobCacheKey']);

        parent::__construct($config);
    }


    /**
     * Create a job with a class name and config. If a job exists, based on
     * the signature, it is released first.
     *
     * @param string $className
     * @param array $config
     * @param string $signature
     */
    public static function enqueueJob(string $className, array $config, string $signature)
    {
        if (!is_subclass_of($className, self::class)) {
            throw new \LogicException("Can only create singleton jobs this way.");
        }

        $cache = Craft::$app->getCache();
        $cacheKey = self::CACHE_KEY.$signature;
        $queue = Craft::$app->getQueue();

        if ($jobId = $cache->get($cacheKey)) {
            // If a job id is in the cache, find the job and release it.
            if ($jobId && $queue instanceof QueueInterface) {
                $queue = Craft::$app->getQueue();
                $queue->release($jobId);
                $cache->delete($cacheKey);
            }
        }

        /** @var SingletonJob $job */
        $job = new $className(array_merge($config, ['queueJobCacheKey' => $cacheKey]));

        // Push a new queue job
        $jobId = $queue->push($job);
        $cache->set($cacheKey, $jobId, self::CACHE_DURATION);
    }

    /**
     * Finish the job by removing the job id from cache.
     */
    protected function finishJob()
    {
        $cache = Craft::$app->getCache();
        $cache->delete($this->queueJobCacheKey);
    }
}
