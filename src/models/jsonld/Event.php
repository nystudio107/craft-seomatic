<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Thing;

/**
 * Event - An event happening at a certain time and location, such as a
 * concert, lecture, or festival. Ticketing information may be added via the
 * offers property. Repeated events may be structured as separate Event
 * objects.
 *
 * Extends: Thing
 * @see    http://schema.org/Event
 */
class Event extends Thing
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Event';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Event';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'An event happening at a certain time and location, such as a concert, lecture, or festival. Ticketing information may be added via the offers property. Repeated events may be structured as separate Event objects.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Thing';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip. Supersedes actors.
     *
     * @var Person [schema.org types: Person]
     */
    public $actor;

    /**
     * The overall rating, based on a collection of reviews or ratings, of the
     * item.
     *
     * @var AggregateRating [schema.org types: AggregateRating]
     */
    public $aggregateRating;

    /**
     * A person or organization attending the event. Supersedes attendees.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $attendee;

    /**
     * The person or organization who wrote a composition, or who is the composer
     * of a work performed at some event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $composer;

    /**
     * A secondary contributor to the CreativeWork or Event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $contributor;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     *
     * @var mixed|Person [schema.org types: Person]
     */
    public $director;

    /**
     * The time admission will commence.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $doorTime;

    /**
     * The duration of the item (movie, audio recording, event, etc.) in ISO 8601
     * date format.
     *
     * @var mixed|Duration [schema.org types: Duration]
     */
    public $duration;

    /**
     * The end date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $endDate;

    /**
     * An eventStatus of an event represents its status; particularly useful when
     * an event is cancelled or rescheduled.
     *
     * @var mixed|EventStatusType [schema.org types: EventStatusType]
     */
    public $eventStatus;

    /**
     * A person or organization that supports (sponsors) something through some
     * kind of financial contribution.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $funder;

    /**
     * The language of the content or performance or used in an action. Please use
     * one of the language codes from the IETF BCP 47 standard. See also
     * availableLanguage. Supersedes language.
     *
     * @var mixed|Language|string [schema.org types: Language, Text]
     */
    public $inLanguage;

    /**
     * A flag to signal that the publication is accessible for free. Supersedes
     * free.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $isAccessibleForFree;

    /**
     * The location of for example where the event is happening, an organization
     * is located, or where an action takes place.
     *
     * @var mixed|Place|PostalAddress|string [schema.org types: Place, PostalAddress, Text]
     */
    public $location;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event.
     *
     * @var mixed|Offer [schema.org types: Offer]
     */
    public $offers;

    /**
     * An organizer of an Event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $organizer;

    /**
     * A performer at the event—for example, a presenter, musician, musical
     * group or actor. Supersedes performers.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $performer;

    /**
     * Used in conjunction with eventStatus for rescheduled or cancelled events.
     * This property contains the previously scheduled start date. For rescheduled
     * events, the startDate property should be used for the newly scheduled start
     * date. In the (rare) case of an event that has been postponed and
     * rescheduled multiple times, this field may be repeated.
     *
     * @var mixed|Date [schema.org types: Date]
     */
    public $previousStartDate;

    /**
     * The CreativeWork that captured all or part of this Event. Inverse property:
     * recordedAt.
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
     */
    public $recordedIn;

    /**
     * A review of the item. Supersedes reviews.
     *
     * @var mixed|Review [schema.org types: Review]
     */
    public $review;

    /**
     * A person or organization that supports a thing through a pledge, promise,
     * or financial contribution. e.g. a sponsor of a Medical Study or a corporate
     * sponsor of an event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $sponsor;

    /**
     * The start date and time of the item (in ISO 8601 date format).
     *
     * @var mixed|Date|DateTime [schema.org types: Date, DateTime]
     */
    public $startDate;

    /**
     * An Event that is part of this event. For example, a conference event
     * includes many presentations, each of which is a subEvent of the conference.
     * Supersedes subEvents. Inverse property: superEvent.
     *
     * @var mixed|Event [schema.org types: Event]
     */
    public $subEvent;

    /**
     * An event that this event is a part of. For example, a collection of
     * individual music performances might each have a music festival as their
     * superEvent. Inverse property: subEvent.
     *
     * @var mixed|Event [schema.org types: Event]
     */
    public $superEvent;

    /**
     * Organization or person who adapts a creative work to different languages,
     * regional differences and technical requirements of a target market, or that
     * translates during some event.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $translator;

    /**
     * The typical expected age range, e.g. '7-9', '11-'.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $typicalAgeRange;

    /**
     * A work featured in some event, e.g. exhibited in an ExhibitionEvent.
     * Specific subproperties are available for workPerformed (e.g. a play), or a
     * workPresented (a Movie at a ScreeningEvent).
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
     */
    public $workFeatured;

    /**
     * A work performed in some event, for example a play performed in a
     * TheaterEvent.
     *
     * @var mixed|CreativeWork [schema.org types: CreativeWork]
     */
    public $workPerformed;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'actor',
            'aggregateRating',
            'attendee',
            'composer',
            'contributor',
            'director',
            'doorTime',
            'duration',
            'endDate',
            'eventStatus',
            'funder',
            'inLanguage',
            'isAccessibleForFree',
            'location',
            'offers',
            'organizer',
            'performer',
            'previousStartDate',
            'recordedIn',
            'review',
            'sponsor',
            'startDate',
            'subEvent',
            'superEvent',
            'translator',
            'typicalAgeRange',
            'workFeatured',
            'workPerformed',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'actor' => ['Person'],
            'aggregateRating' => ['AggregateRating'],
            'attendee' => ['Organization','Person'],
            'composer' => ['Organization','Person'],
            'contributor' => ['Organization','Person'],
            'director' => ['Person'],
            'doorTime' => ['DateTime'],
            'duration' => ['Duration'],
            'endDate' => ['Date','DateTime'],
            'eventStatus' => ['EventStatusType'],
            'funder' => ['Organization','Person'],
            'inLanguage' => ['Language','Text'],
            'isAccessibleForFree' => ['Boolean'],
            'location' => ['Place','PostalAddress','Text'],
            'offers' => ['Offer'],
            'organizer' => ['Organization','Person'],
            'performer' => ['Organization','Person'],
            'previousStartDate' => ['Date'],
            'recordedIn' => ['CreativeWork'],
            'review' => ['Review'],
            'sponsor' => ['Organization','Person'],
            'startDate' => ['Date','DateTime'],
            'subEvent' => ['Event'],
            'superEvent' => ['Event'],
            'translator' => ['Organization','Person'],
            'typicalAgeRange' => ['Text'],
            'workFeatured' => ['CreativeWork'],
            'workPerformed' => ['CreativeWork'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'attendee' => 'A person or organization attending the event. Supersedes attendees.',
            'composer' => 'The person or organization who wrote a composition, or who is the composer of a work performed at some event.',
            'contributor' => 'A secondary contributor to the CreativeWork or Event.',
            'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
            'doorTime' => 'The time admission will commence.',
            'duration' => 'The duration of the item (movie, audio recording, event, etc.) in ISO 8601 date format.',
            'endDate' => 'The end date and time of the item (in ISO 8601 date format).',
            'eventStatus' => 'An eventStatus of an event represents its status; particularly useful when an event is cancelled or rescheduled.',
            'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
            'inLanguage' => 'The language of the content or performance or used in an action. Please use one of the language codes from the IETF BCP 47 standard. See also availableLanguage. Supersedes language.',
            'isAccessibleForFree' => 'A flag to signal that the publication is accessible for free. Supersedes free.',
            'location' => 'The location of for example where the event is happening, an organization is located, or where an action takes place.',
            'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.',
            'organizer' => 'An organizer of an Event.',
            'performer' => 'A performer at the event—for example, a presenter, musician, musical group or actor. Supersedes performers.',
            'previousStartDate' => 'Used in conjunction with eventStatus for rescheduled or cancelled events. This property contains the previously scheduled start date. For rescheduled events, the startDate property should be used for the newly scheduled start date. In the (rare) case of an event that has been postponed and rescheduled multiple times, this field may be repeated.',
            'recordedIn' => 'The CreativeWork that captured all or part of this Event. Inverse property: recordedAt.',
            'review' => 'A review of the item. Supersedes reviews.',
            'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
            'startDate' => 'The start date and time of the item (in ISO 8601 date format).',
            'subEvent' => 'An Event that is part of this event. For example, a conference event includes many presentations, each of which is a subEvent of the conference. Supersedes subEvents. Inverse property: superEvent.',
            'superEvent' => 'An event that this event is a part of. For example, a collection of individual music performances might each have a music festival as their superEvent. Inverse property: subEvent.',
            'translator' => 'Organization or person who adapts a creative work to different languages, regional differences and technical requirements of a target market, or that translates during some event.',
            'typicalAgeRange' => 'The typical expected age range, e.g. \'7-9\', \'11-\'.',
            'workFeatured' => 'A work featured in some event, e.g. exhibited in an ExhibitionEvent. Specific subproperties are available for workPerformed (e.g. a play), or a workPresented (a Movie at a ScreeningEvent).',
            'workPerformed' => 'A work performed in some event, for example a play performed in a TheaterEvent.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['actor','aggregateRating','attendee','composer','contributor','director','doorTime','duration','endDate','eventStatus','funder','inLanguage','isAccessibleForFree','location','offers','organizer','performer','previousStartDate','recordedIn','review','sponsor','startDate','subEvent','superEvent','translator','typicalAgeRange','workFeatured','workPerformed',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
