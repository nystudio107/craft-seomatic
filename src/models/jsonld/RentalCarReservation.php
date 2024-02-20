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
 * RentalCarReservation - A reservation for a rental car.  Note: This type is for information about
 * actual reservations, e.g. in confirmation emails or HTML pages with
 * individual confirmations of reservations.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @see       https://schema.org/RentalCarReservation
 */
class RentalCarReservation extends MetaJsonLd implements RentalCarReservationInterface, ReservationInterface, IntangibleInterface, ThingInterface
{
    use RentalCarReservationTrait;
    use ReservationTrait;
    use IntangibleTrait;
    use ThingTrait;

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    public static string $schemaTypeName = 'RentalCarReservation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    public static string $schemaTypeScope = 'https://schema.org/RentalCarReservation';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    public static string $schemaTypeExtends = 'Reservation';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    public static string $schemaTypeDescription = 'A reservation for a rental car.\n\nNote: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations.';


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
            'additionalType' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]'],
            'alternateName' => ['array', 'Text', 'Text[]'],
            'bookingAgent' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'bookingTime' => ['array', 'DateTime', 'DateTime[]'],
            'broker' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'description' => ['array', 'TextObject', 'TextObject[]', 'array', 'Text', 'Text[]'],
            'disambiguatingDescription' => ['array', 'Text', 'Text[]'],
            'dropoffLocation' => ['array', 'Place', 'Place[]'],
            'dropoffTime' => ['array', 'DateTime', 'DateTime[]'],
            'identifier' => ['array', 'Text', 'Text[]', 'array', 'URL', 'URL[]', 'array', 'PropertyValue', 'PropertyValue[]'],
            'image' => ['array', 'ImageObject', 'ImageObject[]', 'array', 'URL', 'URL[]'],
            'mainEntityOfPage' => ['array', 'URL', 'URL[]', 'array', 'CreativeWork', 'CreativeWork[]'],
            'modifiedTime' => ['array', 'DateTime', 'DateTime[]'],
            'name' => ['array', 'Text', 'Text[]'],
            'pickupLocation' => ['array', 'Place', 'Place[]'],
            'pickupTime' => ['array', 'DateTime', 'DateTime[]'],
            'potentialAction' => ['array', 'Action', 'Action[]'],
            'priceCurrency' => ['array', 'Text', 'Text[]'],
            'programMembershipUsed' => ['array', 'ProgramMembership', 'ProgramMembership[]'],
            'provider' => ['array', 'Person', 'Person[]', 'array', 'Organization', 'Organization[]'],
            'reservationFor' => ['array', 'Thing', 'Thing[]'],
            'reservationId' => ['array', 'Text', 'Text[]'],
            'reservationStatus' => ['array', 'ReservationStatusType', 'ReservationStatusType[]'],
            'reservedTicket' => ['array', 'Ticket', 'Ticket[]'],
            'sameAs' => ['array', 'URL', 'URL[]'],
            'subjectOf' => ['array', 'CreativeWork', 'CreativeWork[]', 'array', 'Event', 'Event[]'],
            'totalPrice' => ['array', 'PriceSpecification', 'PriceSpecification[]', 'array', 'Text', 'Text[]', 'array', 'Number', 'Number[]'],
            'underName' => ['array', 'Organization', 'Organization[]', 'array', 'Person', 'Person[]'],
            'url' => ['array', 'URL', 'URL[]'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function getSchemaPropertyDescriptions(): array
    {
        return [
            'additionalType' => 'An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. Typically the value is a URI-identified RDF class, and in this case corresponds to the     use of rdf:type in RDF. Text values can be used sparingly, for cases where useful information can be added without their being an appropriate schema to reference. In the case of text values, the class label should follow the schema.org <a href="https://schema.org/docs/styleguide.html">style guide</a>.',
            'alternateName' => 'An alias for the item.',
            'bookingAgent' => '\'bookingAgent\' is an out-dated term indicating a \'broker\' that serves as a booking agent.',
            'bookingTime' => 'The date and time the reservation was booked.',
            'broker' => 'An entity that arranges for an exchange between a buyer and a seller.  In most cases a broker never acquires or releases ownership of a product or service involved in an exchange.  If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred.',
            'description' => 'A description of the item.',
            'disambiguatingDescription' => 'A sub property of description. A short description of the item used to disambiguate from other, similar items. Information from other properties (in particular, name) may be necessary for the description to be useful for disambiguation.',
            'dropoffLocation' => 'Where a rental car can be dropped off.',
            'dropoffTime' => 'When a rental car can be dropped off.',
            'identifier' => 'The identifier property represents any kind of identifier for any kind of [[Thing]], such as ISBNs, GTIN codes, UUIDs etc. Schema.org provides dedicated properties for representing many of these, either as textual strings or as URL (URI) links. See [background notes](/docs/datamodel.html#identifierBg) for more details.         ',
            'image' => 'An image of the item. This can be a [[URL]] or a fully described [[ImageObject]].',
            'mainEntityOfPage' => 'Indicates a page (or other CreativeWork) for which this thing is the main entity being described. See [background notes](/docs/datamodel.html#mainEntityBackground) for details.',
            'modifiedTime' => 'The date and time the reservation was modified.',
            'name' => 'The name of the item.',
            'pickupLocation' => 'Where a taxi will pick up a passenger or a rental car can be picked up.',
            'pickupTime' => 'When a taxi will pick up a passenger or a rental car can be picked up.',
            'potentialAction' => 'Indicates a potential Action, which describes an idealized action in which this thing would play an \'object\' role.',
            'priceCurrency' => 'The currency of the price, or a price component when attached to [[PriceSpecification]] and its subtypes.  Use standard formats: [ISO 4217 currency format](http://en.wikipedia.org/wiki/ISO_4217), e.g. "USD"; [Ticker symbol](https://en.wikipedia.org/wiki/List_of_cryptocurrencies) for cryptocurrencies, e.g. "BTC"; well known names for [Local Exchange Trading Systems](https://en.wikipedia.org/wiki/Local_exchange_trading_system) (LETS) and other currency types, e.g. "Ithaca HOUR".',
            'programMembershipUsed' => 'Any membership in a frequent flyer, hotel loyalty program, etc. being applied to the reservation.',
            'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.',
            'reservationFor' => 'The thing -- flight, event, restaurant, etc. being reserved.',
            'reservationId' => 'A unique identifier for the reservation.',
            'reservationStatus' => 'The current status of the reservation.',
            'reservedTicket' => 'A ticket associated with the reservation.',
            'sameAs' => 'URL of a reference Web page that unambiguously indicates the item\'s identity. E.g. the URL of the item\'s Wikipedia page, Wikidata entry, or official website.',
            'subjectOf' => 'A CreativeWork or Event about this Thing.',
            'totalPrice' => 'The total price for the reservation or ticket, including applicable taxes, shipping, etc.  Usage guidelines:  * Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similar Unicode symbols. * Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator.',
            'underName' => 'The person or organization the reservation or ticket is for.',
            'url' => 'URL of the item.',
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
