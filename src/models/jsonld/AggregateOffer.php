<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Offer;

/**
 * AggregateOffer - When a single product is associated with multiple offers
 * (for example, the same pair of shoes is offered by different merchants),
 * then AggregateOffer can be used.
 *
 * Extends: Offer
 * @see    http://schema.org/AggregateOffer
 */
class AggregateOffer extends Offer
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'AggregateOffer';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/AggregateOffer';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'When a single product is associated with multiple offers (for example, the same pair of shoes is offered by different merchants), then AggregateOffer can be used.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Offer';

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
     * The highest price of all offers available.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $highPrice;

    /**
     * The lowest price of all offers available.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $lowPrice;

    /**
     * The number of offers for the product.
     *
     * @var mixed|int [schema.org types: Integer]
     */
    public $offerCount;

    /**
     * An offer to provide this item—for example, an offer to sell a product,
     * rent the DVD of a movie, perform a service, or give away tickets to an
     * event.
     *
     * @var mixed|Offer [schema.org types: Offer]
     */
    public $offers;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'highPrice',
            'lowPrice',
            'offerCount',
            'offers',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'highPrice' => ['Number','Text'],
            'lowPrice' => ['Number','Text'],
            'offerCount' => ['Integer'],
            'offers' => ['Offer'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'highPrice' => 'The highest price of all offers available.',
            'lowPrice' => 'The lowest price of all offers available.',
            'offerCount' => 'The number of offers for the product.',
            'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.',
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
            [['highPrice','lowPrice','offerCount','offers',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
