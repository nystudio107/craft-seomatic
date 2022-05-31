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

use nystudio107\seomatic\models\MetaJsonLd;

/**
 * schema.org version: v14.0-release
 * Flight - An airline flight.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/Flight
 */
class Flight extends MetaJsonLd implements FlightInterface, TripInterface, IntangibleInterface, ThingInterface
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public string $schemaTypeName = 'Flight';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public string $schemaTypeScope = 'https://schema.org/Flight';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public string $schemaTypeExtends = 'Trip';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public string $schemaTypeDescription = <<<SCHEMADESC
An airline flight.
SCHEMADESC;

    use FlightTrait;
    use TripTrait;
    use IntangibleTrait;
    use ThingTrait;

    // Public methods
    // =========================================================================

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
            'additionalType' => ['URL'],
            'aircraft' => ['Vehicle', 'Text'],
            'alternateName' => ['Text'],
            'arrivalAirport' => ['Airport'],
            'arrivalGate' => ['Text'],
            'arrivalTerminal' => ['Text'],
            'arrivalTime' => ['Time', 'DateTime'],
            'boardingPolicy' => ['BoardingPolicyType'],
            'carrier' => ['Organization'],
            'departureAirport' => ['Airport'],
            'departureGate' => ['Text'],
            'departureTerminal' => ['Text'],
            'departureTime' => ['Time', 'DateTime'],
            'description' => ['Text'],
            'disambiguatingDescription' => ['Text'],
            'estimatedFlightDuration' => ['Text', 'Duration'],
            'flightDistance' => ['Distance', 'Text'],
            'flightNumber' => ['Text'],
            'identifier' => ['URL', 'Text', 'PropertyValue'],
            'image' => ['URL', 'ImageObject'],
            'itinerary' => ['ItemList', 'Place'],
            'mainEntityOfPage' => ['CreativeWork', 'URL'],
            'mealService' => ['Text'],
            'name' => ['Text'],
            'offers' => ['Offer', 'Demand'],
            'partOfTrip' => ['Trip'],
            'potentialAction' => ['Action'],
            'provider' => ['Organization', 'Person'],
            'sameAs' => ['URL'],
            'seller' => ['Organization', 'Person'],
            'subTrip' => ['Trip'],
            'subjectOf' => ['Event', 'CreativeWork'],
            'url' => ['URL'],
            'webCheckinTime' => ['DateTime']
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the \'typeof\' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.',
            'aircraft' => 'The kind of aircraft (e.g., "Boeing 747").',
            'alternateName' => 'An alias for the item.',
            'arrivalAirport' => 'The airport where the flight terminates.',
            'arrivalGate' => 'Identifier of the flight\'s arrival gate.',
            'arrivalTerminal' => 'Identifier of the flight\'s arrival terminal.',
            'arrivalTime' => 'The expected arrival time.',
            'boardingPolicy' => 'The type of boarding policy used by the airline (e.g. zone-based or group-based).',
            'carrier' => '\'carrier\' is an out-dated term indicating the \'provider\' for parcel delivery and flights.',
            'departureAirport' => 'The airport where the flight originates.',
            'departureGate' => 'Identifier of the flight\'s departure gate.',
            'departureTerminal' => 'Identifier of the flight\'s departure terminal.',
            'departureTime' => 'The expected departure time.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'estimatedFlightDuration' => 'The estimated time the flight will take.',
            'flightDistance' => 'The distance of the flight.',
            'flightNumber' => 'The unique identifier for a flight including the airline IATA code. For example, if describing United flight 110, where the IATA code for United is \'UA\', the flightNumber is \'UA110\'.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'itinerary' => 'Destination(s) ( [[Place]] ) that make up a trip. For a trip where destination order is important use [[ItemList]] to specify that order (see examples).',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'mealService' => 'Description of the meals that will be provided or available for purchase.',
            'name' => 'The name of the item.',
            'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event. Use [[businessFunction]] to indicate the kind of transaction offered, i.e. sell, lease, etc. This property can also be used to describe a [[Demand]]. While this property is listed as expected on a number of common types, it can be used in others. In that case, using a second type, such as Product or a subtype of Product, can clarify the nature of the offer.       ',
            'partOfTrip' => 'Identifies that this [[Trip]] is a subTrip of another Trip.  For example Day 1, Day 2, etc. of a multi-day trip.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'seller' => 'An entity which offers (sells / leases / lends / loans) the services / goods.  A seller may also be a provider.',
            'subTrip' => 'Identifies a [[Trip]] that is a subTrip of this Trip.  For example Day 1, Day 2, etc. of a multi-day trip.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'url' => 'URL of the item.',
            'webCheckinTime' => 'The time when a passenger can check into the flight online.'
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
            [$this->getGoogleRecommendedSchema(), 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
