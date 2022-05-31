<?php
/**
 * SEOmatic plugin for Craft CMS 4
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2022 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

/**
 * schema.org version: v14.0-release
 * Trait for InteractionCounter.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/InteractionCounter
 */

trait InteractionCounterTrait
{
    
    /**
     * The startTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to start. For
     * actions that span a period of time, when the action was performed. e.g.
     * John wrote a book from *January* to December. For media, including audio
     * and video, it's the time offset of the start of a clip within a larger
     * file.  Note that Event uses startDate/endDate instead of startTime/endTime,
     * even when describing dates with times. This situation may be clarified in
     * future revisions.
     *
     * @var DateTime|Time
     */
    public $startTime;

    /**
     * The number of interactions for the CreativeWork using the WebSite or
     * SoftwareApplication.
     *
     * @var int|Integer
     */
    public $userInteractionCount;

    /**
     * The location of, for example, where an event is happening, where an
     * organization is located, or where an action takes place.
     *
     * @var string|PostalAddress|Text|Place|VirtualLocation
     */
    public $location;

    /**
     * The Action representing the type of interaction. For up votes, +1s, etc.
     * use [[LikeAction]]. For down votes use [[DislikeAction]]. Otherwise, use
     * the most specific Action.
     *
     * @var Action
     */
    public $interactionType;

    /**
     * The WebSite or SoftwareApplication where the interactions took place.
     *
     * @var SoftwareApplication|WebSite
     */
    public $interactionService;

    /**
     * The endTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to end. For
     * actions that span a period of time, when the action was performed. e.g.
     * John wrote a book from January to *December*. For media, including audio
     * and video, it's the time offset of the end of a clip within a larger file. 
     * Note that Event uses startDate/endDate instead of startTime/endTime, even
     * when describing dates with times. This situation may be clarified in future
     * revisions.
     *
     * @var DateTime|Time
     */
    public $endTime;

}
