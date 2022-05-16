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
 * Trait for Event.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Event
 */

trait EventTrait
{
    
    /**
     * An event that this event is a part of. For example, a collection of
     * individual music performances might each have a music festival as their
     * superEvent.
     *
     * @var Event
     */
    public $superEvent;

    /**
     * The eventAttendanceMode of an event indicates whether it occurs online,
     * offline, or a mix.
     *
     * @var EventAttendanceModeEnumeration
     */
    public $eventAttendanceMode;

    /**
     * A review of the item.
     *
     * @var Review
     */
    public $review;

    /**
     * Organization or person who adapts a creative work to different languages,
     * regional differences and technical requirements of a target market, or that
     * translates during some event.
     *
     * @var Person|Organization
     */
    public $translator;

    /**
     * The start date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var DateTime|Date
     */
    public $startDate;

    /**
     * The person or organization who wrote a composition, or who is the composer
     * of a work performed at some event.
     *
     * @var Organization|Person
     */
    public $composer;

    /**
     * The total number of individuals that may attend an event or venue.
     *
     * @var int|Integer
     */
    public $maximumAttendeeCapacity;

    /**
     * The maximum physical attendee capacity of an [[Event]] whose
     * [[eventAttendanceMode]] is [[OnlineEventAttendanceMode]] (or the online
     * aspects, in the case of a [[MixedEventAttendanceMode]]). 
     *
     * @var int|Integer
     */
    public $maximumVirtualAttendeeCapacity;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip.
     *
     * @var Person
     */
    public $director;

    /**
     * A [[Grant]] that directly or indirectly provide funding or sponsorship for
     * this item. See also [[ownershipFundingInfo]].
     *
     * @var Grant
     */
    public $funding;

    /**
     * Keywords or tags used to describe some item. Multiple textual entries in a
     * keywords list are typically delimited by commas, or by repeating the
     * property.
     *
     * @var string|DefinedTerm|Text|URL
     */
    public $keywords;

    /**
     * An intended audience, i.e. a group for whom something was created.
     *
     * @var Audience
     */
    public $audience;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event. Use [[businessFunction]] to indicate the kind of transaction
     * offered, i.e. sell, lease, etc. This property can also be used to describe
     * a [[Demand]]. While this property is listed as expected on a number of
     * common types, it can be used in others. In that case, using a second type,
     * such as Product or a subtype of Product, can clarify the nature of the
     * offer.       
     *
     * @var Offer|Demand
     */
    public $offers;

    /**
     * An Event that is part of this event. For example, a conference event
     * includes many presentations, each of which is a subEvent of the conference.
     *
     * @var Event
     */
    public $subEvent;

    /**
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip.
     *
     * @var Person
     */
    public $actor;

    /**
     * An eventStatus of an event represents its status; particularly useful when
     * an event is cancelled or rescheduled.
     *
     * @var EventStatusType
     */
    public $eventStatus;

    /**
     * The end date and time of the item (in [ISO 8601 date
     * format](http://en.wikipedia.org/wiki/ISO_8601)).
     *
     * @var Date|DateTime
     */
    public $endDate;

    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var Organization|Person
     */
    public $funder;

    /**
     * A performer at the event—for example, a presenter, musician, musical
     * group or actor.
     *
     * @var Organization|Person
     */
    public $performer;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var AggregateRating
     */
    public $aggregateRating;

    /**
     * The typical expected age range, e.g. '7-9', '11-'.
     *
     * @var string|Text
     */
    public $typicalAgeRange;

    /**
     * The location of, for example, where an event is happening, where an
     * organization is located, or where an action takes place.
     *
     * @var string|PostalAddress|Text|Place|VirtualLocation
     */
    public $location;

    /**
     * The main performer or performers of the event—for example, a presenter,
     * musician, or actor.
     *
     * @var Person|Organization
     */
    public $performers;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in [ISO 8601
     * date format](http://en.wikipedia.org/wiki/ISO_8601).
     *
     * @var Duration
     */
    public $duration;

    /**
     * An organizer of an Event.
     *
     * @var Person|Organization
     */
    public $organizer;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. e.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var Organization|Person
     */
    public $sponsor;

    /**
     * Used in conjunction with eventStatus for rescheduled or cancelled events.
     * This property contains the previously scheduled start date. For rescheduled
     * events, the startDate property should be used for the newly scheduled start
     * date. In the (rare) case of an event that has been postponed and
     * rescheduled multiple times, this field may be repeated.
     *
     * @var Date
     */
    public $previousStartDate;

    /**
     * A flag to signal that the item, event, or place is accessible for free.
     *
     * @var bool|Boolean
     */
    public $isAccessibleForFree;

    /**
     * The number of attendee places for an event that remain unallocated.
     *
     * @var int|Integer
     */
    public $remainingAttendeeCapacity;

    /**
     * Events that are a part of this event. For example, a conference event
     * includes many presentations, each subEvents of the conference.
     *
     * @var Event
     */
    public $subEvents;

    /**
     * A work performed in some event, for example a play performed in a
     * TheaterEvent.
     *
     * @var CreativeWork
     */
    public $workPerformed;

    /**
     * The time admission will commence.
     *
     * @var Time|DateTime
     */
    public $doorTime;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the [IETF BCP 47
     * standard](http://tools.ietf.org/html/bcp47). See also
     * [[availableLanguage]].
     *
     * @var string|Text|Language
     */
    public $inLanguage;

    /**
     * The subject matter of the content.
     *
     * @var Thing
     */
    public $about;

    /**
     * The CreativeWork that captured all or part of this Event.
     *
     * @var CreativeWork
     */
    public $recordedIn;

    /**
     * The maximum physical attendee capacity of an [[Event]] whose
     * [[eventAttendanceMode]] is [[OfflineEventAttendanceMode]] (or the offline
     * aspects, in the case of a [[MixedEventAttendanceMode]]). 
     *
     * @var int|Integer
     */
    public $maximumPhysicalAttendeeCapacity;

    /**
     * A person or organization attending the event.
     *
     * @var Person|Organization
     */
    public $attendee;

    /**
     * A work featured in some event, e.g. exhibited in an ExhibitionEvent.       
     * Specific subproperties are available for workPerformed (e.g. a play), or a
     * workPresented (a Movie at a ScreeningEvent).
     *
     * @var CreativeWork
     */
    public $workFeatured;

    /**
     * Associates an [[Event]] with a [[Schedule]]. There are circumstances where
     * it is preferable to share a schedule for a series of       repeating events
     * rather than data on the individual events themselves. For example, a
     * website or application might prefer to publish a schedule for a weekly     
     *  gym class rather than provide data on every event. A schedule could be
     * processed by applications to add forthcoming events to a calendar. An
     * [[Event]] that       is associated with a [[Schedule]] using this property
     * should not have [[startDate]] or [[endDate]] properties. These are instead
     * defined within the associated       [[Schedule]], this avoids any ambiguity
     * for clients using the data. The property might have repeated values to
     * specify different schedules, e.g. for different months       or seasons.
     *
     * @var Schedule
     */
    public $eventSchedule;

    /**
     * A secondary contributor to the CreativeWork or Event.
     *
     * @var Organization|Person
     */
    public $contributor;

    /**
     * A person attending the event.
     *
     * @var Person|Organization
     */
    public $attendees;

}
