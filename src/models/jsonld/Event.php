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

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Thing;

/**
 * Event - An event happening at a certain time and location, such as a
 * concert, lecture, or festival. Ticketing information may be added via the
 * offers property. Repeated events may be structured as separate Event
 * objects.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Event
 */
class Event extends Thing
{
    // Static Public Properties
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
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The subject matter of the content. Inverse property: subjectOf.
     *
     * @var Thing [schema.org types: Thing]
     */
    public $about;

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
     * An intended audience, i.e. a group for whom something was created.
     * Supersedes serviceAudience.
     *
     * @var mixed|Audience [schema.org types: Audience]
     */
    public $audience;

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
     * A flag to signal that the item, event, or place is accessible for free.
     * Supersedes free.
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
     * The total number of individuals that may attend an event or venue.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $maximumAttendeeCapacity;

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
     * The number of attendee places for an event that remain unallocated.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $remainingAttendeeCapacity;

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

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'about',
        'actor',
        'aggregateRating',
        'attendee',
        'audience',
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
        'maximumAttendeeCapacity',
        'offers',
        'organizer',
        'performer',
        'previousStartDate',
        'recordedIn',
        'remainingAttendeeCapacity',
        'review',
        'sponsor',
        'startDate',
        'subEvent',
        'superEvent',
        'translator',
        'typicalAgeRange',
        'workFeatured',
        'workPerformed'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'about' => ['Thing'],
        'actor' => ['Person'],
        'aggregateRating' => ['AggregateRating'],
        'attendee' => ['Organization','Person'],
        'audience' => ['Audience'],
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
        'maximumAttendeeCapacity' => ['Integer'],
        'offers' => ['Offer'],
        'organizer' => ['Organization','Person'],
        'performer' => ['Organization','Person'],
        'previousStartDate' => ['Date'],
        'recordedIn' => ['CreativeWork'],
        'remainingAttendeeCapacity' => ['Integer'],
        'review' => ['Review'],
        'sponsor' => ['Organization','Person'],
        'startDate' => ['Date','DateTime'],
        'subEvent' => ['Event'],
        'superEvent' => ['Event'],
        'translator' => ['Organization','Person'],
        'typicalAgeRange' => ['Text'],
        'workFeatured' => ['CreativeWork'],
        'workPerformed' => ['CreativeWork']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'about' => 'The subject matter of the content. Inverse property: subjectOf.',
        'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
        'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
        'attendee' => 'A person or organization attending the event. Supersedes attendees.',
        'audience' => 'An intended audience, i.e. a group for whom something was created. Supersedes serviceAudience.',
        'composer' => 'The person or organization who wrote a composition, or who is the composer of a work performed at some event.',
        'contributor' => 'A secondary contributor to the CreativeWork or Event.',
        'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
        'doorTime' => 'The time admission will commence.',
        'duration' => 'The duration of the item (movie, audio recording, event, etc.) in ISO 8601 date format.',
        'endDate' => 'The end date and time of the item (in ISO 8601 date format).',
        'eventStatus' => 'An eventStatus of an event represents its status; particularly useful when an event is cancelled or rescheduled.',
        'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
        'inLanguage' => 'The language of the content or performance or used in an action. Please use one of the language codes from the IETF BCP 47 standard. See also availableLanguage. Supersedes language.',
        'isAccessibleForFree' => 'A flag to signal that the item, event, or place is accessible for free. Supersedes free.',
        'location' => 'The location of for example where the event is happening, an organization is located, or where an action takes place.',
        'maximumAttendeeCapacity' => 'The total number of individuals that may attend an event or venue.',
        'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.',
        'organizer' => 'An organizer of an Event.',
        'performer' => 'A performer at the event—for example, a presenter, musician, musical group or actor. Supersedes performers.',
        'previousStartDate' => 'Used in conjunction with eventStatus for rescheduled or cancelled events. This property contains the previously scheduled start date. For rescheduled events, the startDate property should be used for the newly scheduled start date. In the (rare) case of an event that has been postponed and rescheduled multiple times, this field may be repeated.',
        'recordedIn' => 'The CreativeWork that captured all or part of this Event. Inverse property: recordedAt.',
        'remainingAttendeeCapacity' => 'The number of attendee places for an event that remain unallocated.',
        'review' => 'A review of the item. Supersedes reviews.',
        'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. e.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
        'startDate' => 'The start date and time of the item (in ISO 8601 date format).',
        'subEvent' => 'An Event that is part of this event. For example, a conference event includes many presentations, each of which is a subEvent of the conference. Supersedes subEvents. Inverse property: superEvent.',
        'superEvent' => 'An event that this event is a part of. For example, a collection of individual music performances might each have a music festival as their superEvent. Inverse property: subEvent.',
        'translator' => 'Organization or person who adapts a creative work to different languages, regional differences and technical requirements of a target market, or that translates during some event.',
        'typicalAgeRange' => 'The typical expected age range, e.g. \'7-9\', \'11-\'.',
        'workFeatured' => 'A work featured in some event, e.g. exhibited in an ExhibitionEvent. Specific subproperties are available for workPerformed (e.g. a play), or a workPresented (a Movie at a ScreeningEvent).',
        'workPerformed' => 'A work performed in some event, for example a play performed in a TheaterEvent.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['about','actor','aggregateRating','attendee','audience','composer','contributor','director','doorTime','duration','endDate','eventStatus','funder','inLanguage','isAccessibleForFree','location','maximumAttendeeCapacity','offers','organizer','performer','previousStartDate','recordedIn','remainingAttendeeCapacity','review','sponsor','startDate','subEvent','superEvent','translator','typicalAgeRange','workFeatured','workPerformed'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
