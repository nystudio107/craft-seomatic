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

namespace nystudio107\seomatic\jobs;

use Craft;
use craft\queue\BaseJob;
use nystudio107\seomatic\helpers\Sitemap;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class GenerateSitemap extends BaseJob
{
    /**
     * @const The number of assets to return in a single paginated query
     */
    const SITEMAP_QUERY_PAGE_SIZE = 100;

    // Properties
    // =========================================================================

    public $groupId;

    public $type;

    public $handle;

    public $siteId;

    public $queueJobCacheKey;

    protected $queue;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function execute($queue): void
    {
        $params = [
            'groupId' => $this->groupId,
            'siteId' => $this->siteId,
            'handle' => $this->handle,
            'type' => $this->type,
            'queueJobCacheKey' => $this->queueJobCacheKey,
            'queue' => $queue,
            'job' => $this
        ];

        $this->queue = $queue;
        Sitemap::generateSitemap($params);
    }

    /**
     * Wrapper for `setProgress()`
     * @param float $progress
     */
    public function updateProgress(float $progress)
    {
        $this->setProgress($this->queue, $progress);
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function defaultDescription(): string
    {
        return Craft::t('app', 'Generating {handle} sitemap', [
            'handle' => $this->handle,
        ]);
    }
}
