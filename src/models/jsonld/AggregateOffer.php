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

use nystudio107\seomatic\models\jsonld\Offer;

/**
 * AggregateOffer - When a single product is associated with multiple offers
 * (for example, the same pair of shoes is offered by different merchants),
 * then AggregateOffer can be used.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/AggregateOffer
 */
class AggregateOffer extends Offer
{
    // Static Public Properties
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
     * The highest price of all offers available. Usage guidelines:Use values from
     * 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather
     * than superficially similiar Unicode symbols. Use '.' (Unicode 'FULL STOP'
     * (U+002E)) rather than ',' to indicate a decimal point. Avoid using these
     * symbols as a readability separator.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $highPrice;

    /**
     * The lowest price of all offers available. Usage guidelines:Use values from
     * 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather
     * than superficially similiar Unicode symbols. Use '.' (Unicode 'FULL STOP'
     * (U+002E)) rather than ',' to indicate a decimal point. Avoid using these
     * symbols as a readability separator.
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

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'highPrice',
        'lowPrice',
        'offerCount',
        'offers'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'highPrice' => ['Number','Text'],
        'lowPrice' => ['Number','Text'],
        'offerCount' => ['Integer'],
        'offers' => ['Offer']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'highPrice' => 'The highest price of all offers available. Usage guidelines:Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similiar Unicode symbols. Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator.',
        'lowPrice' => 'The lowest price of all offers available. Usage guidelines:Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similiar Unicode symbols. Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator.',
        'offerCount' => 'The number of offers for the product.',
        'offers' => 'An offer to provide this item—for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.'
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
            [['highPrice','lowPrice','offerCount','offers'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
