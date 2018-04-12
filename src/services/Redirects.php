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

namespace nystudio107\seomatic\services;

use Craft;
use craft\base\Component;

use yii\caching\TagDependency;

/**
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 */
class Redirects extends Component
{
    // Constants
    // =========================================================================

    const GLOBAL_REDIRECTS_CACHE_TAG = 'seomatic_redirects';

    // Protected Properties
    // =========================================================================

    /**
     * @var
     */
    protected $redirectsContainer;

    // Public Methods
    // =========================================================================

    /**
     *
     */
    public function init()
    {
        parent::init();
    }

    /**
     * Load in the redirects containers
     */
    public function loadRedirectsContainers()
    {
    }

    /**
     * Handle 404s by looking for redirects
     */
    public function handle404()
    {
    }

    /**
     * Invalidate all of the redirects caches
     */
    public function invalidateCaches()
    {
        $cache = Craft::$app->getCache();
        TagDependency::invalidate($cache, $this::GLOBAL_REDIRECTS_CACHE_TAG);
        Craft::info(
            'All redirect caches cleared',
            __METHOD__
        );
    }
}
