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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v26.0-release
 * FoodEvent - Event type: Food event.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/FoodEvent
 */
class FoodEvent extends MetaJsonLd implements FoodEventInterface, EventInterface, ThingInterface
{
    use FoodEventTrait;
    use EventTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'FoodEvent';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/FoodEvent';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'Event';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'Event type: Food event.';


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyNames(): array
    {
        return array_keys($this->getSchemaPropertyExpectedTypes());
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyExpectedTypes(): array
    {
        return [
            'about' => ['array', 'Thing', 'Thing[]'],
            'actor' => ['array', 'Person', 'Person[]'],
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'aggregateRating' => ['array', 'AggregateRating', 'AggregateRating[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'attendee' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'attendees' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'audience' => ['array', 'Audience', 'Audience[]'],
            'composer' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'contributor' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'director' => ['array', 'Person', 'Person[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'doorTime' => ['array', 'Time', 'Time[]', 'array', 'DateTime', 'DateTime[]'],
            'duration' => ['array', 'Duration', 'Duration[]'],
            'endDate' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'eventAttendanceMode' => ['array', 'EventAttendanceModeEnumeration', 'EventAttendanceModeEnumeration[]'],
            'eventSchedule' => ['array', 'Schedule', 'Schedule[]'],
            'eventStatus' => ['array', 'EventStatusType', 'EventStatusType[]'],
            'funder' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'funding' => ['array', 'Grant', 'Grant[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'inLanguage' => ['array', 'Text', 'Text[]', 'array', 'Language', 'Language[]'],
            'isAccessibleForFree' => ['array', 'Boolean', 'Boolean[]'],
            'keywords' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'DefinedTerm', 'DefinedTerm[]'],
            'location' => ['array', 'PostalAddress', 'PostalAddress[]', 'array', 'VirtualLocation', 'VirtualLocation[]', 'array', 'Text', 'Text[]', 'array', 'Place', 'Place[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'maximumAttendeeCapacity' => ['array', 'Integer', 'Integer[]'],
            'maximumPhysicalAttendeeCapacity' => ['array', 'Integer', 'Integer[]'],
            'maximumVirtualAttendeeCapacity' => ['array', 'Integer', 'Integer[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'offers' => ['array', 'Demand', 'Demand[]', 'array', 'Offer', 'Offer[]'],
            'organizer' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'performer' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'performers' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'previousStartDate' => ['array', 'Date', 'Date[]'],
            'recordedIn' => ['array', 'CreativeWork', 'CreativeWork[]'],
            'remainingAttendeeCapacity' => ['array', 'Integer', 'Integer[]'],
            'review' => ['array', 'Review', 'Review[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'sponsor' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'startDate' => ['array', 'Date', 'Date[]', 'array', 'DateTime', 'DateTime[]'],
            'subEvent' => ['array', 'Event', 'Event[]'],
            'subEvents' => ['array', 'Event', 'Event[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'superEvent' => ['array', 'Event', 'Event[]'],
            'translator' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'typicalAgeRange' => ['array', 'Text', 'Text[]'],
            'url' => ['array', 'URL', 'URL[]'],
            'workFeatured' => ['array', 'CreativeWork', 'CreativeWork[]'],
            'workPerformed' => ['array', 'CreativeWork', 'CreativeWork[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'about' => 'The subject matter of the content.',
            'actor' => 'An actor, e.g. in TV, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip.',
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'aggregateRating' => 'The overall rating, based on a collection of reviews or ratings, of the item.',
            'alternateName' => 'An alias for the item.',
            'attendee' => 'A person or organization attending the event.',
            'attendees' => 'A person attending the event.',
            'audience' => 'An intended audience, i.e. a group for whom something was created.',
            'composer' => 'The person or organization who wrote a composition, or who is the composer of a work performed at some event.',
            'contributor' => 'A secondary contributor to the CreativeWork or Event.',
            'description' => 'A description of the item.',
            'director' => 'A director of e.g. TV, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'doorTime' => 'The time admission will commence.',
            'duration' => 'The duration of the item (movie, audio recording, event, etc.) in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO_8601).',
            'endDate' => 'The end date and time of the item (in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO_8601)).',
            'eventAttendanceMode' => 'The eventAttendanceMode of an event indicates whether it occurs online, offline, or a mix.',
            'eventSchedule' => 'Associates an [[Event]] with a [[Schedule]]. There are circumstances where it is preferable to share a schedule for a series of       repeating events rather than data on the individual events themselves. For example, a website or application might prefer to publish a schedule for a weekly       gym class rather than provide data on every event. A schedule could be processed by applications to add forthcoming events to a calendar. An [[Event]] that       is associated with a [[Schedule]] using this property should not have [[startDate]] or [[endDate]] properties. These are instead defined within the associated       [[Schedule]], this avoids any ambiguity for clients using the data. The property might have repeated values to specify different schedules, e.g. for different months       or seasons.',
            'eventStatus' => 'An eventStatus of an event represents its status; particularly useful when an event is cancelled or rescheduled.',
            'funder' => 'A person or organization that supports (sponsors) something through some kind of financial contribution.',
            'funding' => 'A [[Grant]] that directly or indirectly provide funding or sponsorship for this item. See also [[ownershipFundingInfo]].',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'inLanguage' => 'The language of the content or performance or used in an action. Please use one of the language codes from the [IETF BCP 47 standard](http://tools.ietf.org/html/bcp47). See also [[availableLanguage]].',
            'isAccessibleForFree' => 'A flag to signal that the item, event, or place is accessible for free.',
            'keywords' => 'Keywords or tags used to describe some item. Multiple textual entries in a keywords list are typically delimited by commas, or by repeating the property.',
            'location' => 'The location of, for example, where an event is happening, where an organization is located, or where an action takes place.',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'maximumAttendeeCapacity' => 'The total number of individuals that may attend an event or venue.',
            'maximumPhysicalAttendeeCapacity' => 'The maximum physical attendee capacity of an [[Event]] whose [[eventAttendanceMode]] is [[OfflineEventAttendanceMode]] (or the offline aspects, in the case of a [[MixedEventAttendanceMode]]). ',
            'maximumVirtualAttendeeCapacity' => 'The maximum virtual attendee capacity of an [[Event]] whose [[eventAttendanceMode]] is [[OnlineEventAttendanceMode]] (or the online aspects, in the case of a [[MixedEventAttendanceMode]]). ',
            'name' => 'The name of the item.',
            'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event. Use [[businessFunction]] to indicate the kind of transaction offered, i.e. sell, lease, etc. This property can also be used to describe a [[Demand]]. While this property is listed as expected on a number of common types, it can be used in others. In that case, using a second type, such as Product or a subtype of Product, can clarify the nature of the offer.       ',
            'organizer' => 'An organizer of an Event.',
            'performer' => 'A performer at the event—for example, a presenter, musician, musical group or actor.',
            'performers' => 'The main performer or performers of the event—for example, a presenter, musician, or actor.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'previousStartDate' => 'Used in conjunction with eventStatus for rescheduled or cancelled events. This property contains the previously scheduled start date. For rescheduled events, the startDate property should be used for the newly scheduled start date. In the (rare) case of an event that has been postponed and rescheduled multiple times, this field may be repeated.',
            'recordedIn' => 'The CreativeWork that captured all or part of this Event.',
            'remainingAttendeeCapacity' => 'The number of attendee places for an event that remain unallocated.',
            'review' => 'A review of the item.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'sponsor' => 'A person or organization that supports a thing through a pledge, promise, or financial contribution. E.g. a sponsor of a Medical Study or a corporate sponsor of an event.',
            'startDate' => 'The start date and time of the item (in [ISO 8601 date format](http://en.wikipedia.org/wiki/ISO_8601)).',
            'subEvent' => 'An Event that is part of this event. For example, a conference event includes many presentations, each of which is a subEvent of the conference.',
            'subEvents' => 'Events that are a part of this event. For example, a conference event includes many presentations, each subEvents of the conference.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'superEvent' => 'An event that this event is a part of. For example, a collection of individual music performances might each have a music festival as their superEvent.',
            'translator' => 'Organization or person who adapts a creative work to different languages, regional differences and technical requirements of a target market, or that translates during some event.',
            'typicalAgeRange' => 'The typical expected age range, e.g. \'7-9\', \'11-\'.',
            'url' => 'URL of the item.',
            'workFeatured' => 'A work featured in some event, e.g. exhibited in an ExhibitionEvent.        Specific subproperties are available for workPerformed (e.g. a play), or a workPresented (a Movie at a ScreeningEvent).',
            'workPerformed' => 'A work performed in some event, for example a play performed in a TheaterEvent.',
        ];
    }


    /**
     * @inheritdoc
     */
    public function getGoogleRequiredSchema(): array
    {
        return ['description', 'name'];
    }


    /**
     * @inheritdoc
     */
    public function getGoogleRecommendedSchema(): array
    {
        return ['image', 'url'];
    }


    /**
     * @inheritdoc
     */
    public function defineRules(): array
    {
        $rules = parent::defineRules();
        $rules = array_merge($rules, [
                [$this->getSchemaPropertyNames(), 'validateJsonSchema'],
                [$this->getGoogleRequiredSchema(), 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
                [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.'],
            ]);

        return $rules;
    }
}
