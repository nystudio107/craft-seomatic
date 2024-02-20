<?php

/**
 * SEOmatic plugin for Craft CMS
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful, and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v26.0-release
 * Trait for PublicationEvent.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/PublicationEvent
 */
trait PublicationEventTrait
{
    /**
     * An agent associated with the publication event.
     *
     * @var array|Organization|Organization[]|array|Person|Person[]
     */
    public $publishedBy;

    /**
     * A flag to signal that the item, event, or place is accessible for free.
     *
     * @var bool|array|Boolean|Boolean[]
     */
    public $free;

    /**
     * A broadcast service associated with the publication event.
     *
     * @var array|BroadcastService|BroadcastService[]
     */
    public $publishedOn;
}
