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
 * Trait for Action.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Action
 */
trait ActionTrait
{
    /**
     * Indicates the current disposition of the Action.
     *
     * @var array|ActionStatusType|ActionStatusType[]
     */
    public $actionStatus;

    /**
     * The direct performer or driver of the action (animate or inanimate). E.g.
     * *John* wrote a book.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $agent;

    /**
     * The result produced in the action. E.g. John wrote *a book*.
     *
     * @var array|Thing|Thing[]
     */
    public $result;

    /**
     * Indicates a target EntryPoint, or url, for an Action.
     *
     * @var array|EntryPoint|EntryPoint[]|array|URL|URL[]
     */
    public $target;

    /**
     * The object that helped the agent perform the action. E.g. John wrote a book
     * with *a pen*.
     *
     * @var array|Thing|Thing[]
     */
    public $instrument;

    /**
     * The location of, for example, where an event is happening, where an
     * organization is located, or where an action takes place.
     *
     * @var string|array|PostalAddress|PostalAddress[]|array|VirtualLocation|VirtualLocation[]|array|Text|Text[]|array|Place|Place[]
     */
    public $location;

    /**
     * For failed actions, more information on the cause of the failure.
     *
     * @var array|Thing|Thing[]
     */
    public $error;

    /**
     * Other co-agents that participated in the action indirectly. E.g. John wrote
     * a book with *Steve*.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $participant;

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
     * The object upon which the action is carried out, whose state is kept intact
     * or changed. Also known as the semantic roles patient, affected or undergoer
     * (which change their state) or theme (which doesn't). E.g. John read *a
     * book*.
     *
     * @var array|Thing|Thing[]
     */
    public $object;

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

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var array|Person|Person[]|array|Organization|Organization[]
     */
    public $provider;
}
