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
 * Trait for InteractionCounter.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/InteractionCounter
 */
trait InteractionCounterTrait
{
    /**
     * The WebSite or SoftwareApplication where the interactions took place.
     *
     * @var array|WebSite|WebSite[]|array|SoftwareApplication|SoftwareApplication[]
     */
    public $interactionService;

    /**
     * The Action representing the type of interaction. For up votes, +1s, etc.
     * use [[LikeAction]]. For down votes use [[DislikeAction]]. Otherwise, use
     * the most specific Action.
     *
     * @var array|Action|Action[]
     */
    public $interactionType;

    /**
     * The location of, for example, where an event is happening, where an
     * organization is located, or where an action takes place.
     *
     * @var string|array|PostalAddress|PostalAddress[]|array|VirtualLocation|VirtualLocation[]|array|Text|Text[]|array|Place|Place[]
     */
    public $location;

    /**
     * The number of interactions for the CreativeWork using the WebSite or
     * SoftwareApplication.
     *
     * @var int|array|Integer|Integer[]
     */
    public $userInteractionCount;

    /**
     * The startTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to start. For
     * actions that span a period of time, when the action was performed. E.g.
     * John wrote a book from *January* to December. For media, including audio
     * and video, it's the time offset of the start of a clip within a larger
     * file.  Note that Event uses startDate/endDate instead of startTime/endTime,
     * even when describing dates with times. This situation may be clarified in
     * future revisions.
     *
     * @var array|Time|Time[]|array|DateTime|DateTime[]
     */
    public $startTime;

    /**
     * The endTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to end. For
     * actions that span a period of time, when the action was performed. E.g.
     * John wrote a book from January to *December*. For media, including audio
     * and video, it's the time offset of the end of a clip within a larger file.
     * Note that Event uses startDate/endDate instead of startTime/endTime, even
     * when describing dates with times. This situation may be clarified in future
     * revisions.
     *
     * @var array|Time|Time[]|array|DateTime|DateTime[]
     */
    public $endTime;
}
