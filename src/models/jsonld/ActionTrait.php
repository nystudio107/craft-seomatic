<?php
/**
 * SEOmatic plugin for Craft CMS 3
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
 * Trait for Action.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Action
 */

trait ActionTrait
{
    
    /**
     * The direct performer or driver of the action (animate or inanimate). e.g.
     * *John* wrote a book.
     *
     * @var Organization|Person
     */
    public $agent;

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
     * Indicates the current disposition of the Action.
     *
     * @var ActionStatusType
     */
    public $actionStatus;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller.
     *
     * @var Organization|Person
     */
    public $provider;

    /**
     * The result produced in the action. e.g. John wrote *a book*.
     *
     * @var Thing
     */
    public $result;

    /**
     * The location of, for example, where an event is happening, where an
     * organization is located, or where an action takes place.
     *
     * @var string|PostalAddress|Text|Place|VirtualLocation
     */
    public $location;

    /**
     * The object upon which the action is carried out, whose state is kept intact
     * or changed. Also known as the semantic roles patient, affected or undergoer
     * (which change their state) or theme (which doesn't). e.g. John read *a
     * book*.
     *
     * @var Thing
     */
    public $object;

    /**
     * Indicates a target EntryPoint for an Action.
     *
     * @var EntryPoint
     */
    public $target;

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

    /**
     * Other co-agents that participated in the action indirectly. e.g. John wrote
     * a book with *Steve*.
     *
     * @var Organization|Person
     */
    public $participant;

    /**
     * The object that helped the agent perform the action. e.g. John wrote a book
     * with *a pen*.
     *
     * @var Thing
     */
    public $instrument;

    /**
     * For failed actions, more information on the cause of the failure.
     *
     * @var Thing
     */
    public $error;

}
