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

/**
 * Throw an event after SEOmatic has cleared its caches.
 *
 * If both $uri and $sourceId are null, then SEOmatic is clearing ALL of its container
 * caches.
 *
 * If $uri is non-null, then SEOmatic is clearing its caches for just that $uri and
 * optional $siteId
 *
 * If $sourceId is non-null, then SEOmatic is clearing all caches that are owned by
 * the Section/Category/Product with the `id` of $sourceId
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.1.48
 */
class InvalidateContainerCachesEvent extends Event
{
    // Properties
    // =========================================================================

    /**
     * @var string|null $uri     The URI of the meta container cache that is being
     *                           invalidated
     */
    public $uri;

    /**
     * @var int|null    $siteId  The siteId of the meta container cache that is being
     *                           invalidated
     */
    public $siteId;

    /**
     * @var int|null    $siteId  The sourceId of the meta container Section/Category/Product
     *                           cache that is being invalidated
     */
    public $sourceId;
}
