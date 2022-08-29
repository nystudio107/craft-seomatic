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

namespace nystudio107\seomatic\events;

use yii\base\Event;
use yii\caching\Dependency;

/**
 * @author    yournextagency
 * @package   Seomatic
 * @since     3.1.0
 */
class SitemapGeneratedEvent extends Event
{
    // Properties
    // =========================================================================

    /**
     * @var int The site id
     */
    public $siteId;

    /**
     * @var int Group id
     */
    public $groupId;

    /**
     * @var string $handle
     */
    public $handle;

    /**
     * @var string type
     */
    public $type;

    /**
     * @var string The cache key
     */
    public $cacheKey;

    /**
     * @var Dependency Cache dependency
     */
    public $cacheDependency;
}
