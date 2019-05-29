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

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * MonetaryAmount - A monetary value or range. This type can be used to
 * describe an amount of money such as $50 USD, or a range as in describing a
 * bank account being suitable for a balance between £1,000 and £1,000,000
 * GBP, or the value of a salary, etc. It is recommended to use
 * PriceSpecification Types to describe the price of an Offer, Invoice, etc.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/MonetaryAmount
 */
class MonetaryAmount extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'MonetaryAmount';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/MonetaryAmount';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A monetary value or range. This type can be used to describe an amount of money such as $50 USD, or a range as in describing a bank account being suitable for a balance between £1,000 and £1,000,000 GBP, or the value of a salary, etc. It is recommended to use PriceSpecification Types to describe the price of an Offer, Invoice, etc.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'StructuredValue';

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
     * The currency in which the monetary amount is expressed. Use standard
     * formats: ISO 4217 currency format e.g. "USD"; Ticker symbol for
     * cryptocurrencies e.g. "BTC"; well known names for Local Exchange Tradings
     * Systems (LETS) and other currency types e.g. "Ithaca HOUR".
     *
     * @var string [schema.org types: Text]
     */
    public $currency;

    /**
     * The upper value of some characteristic or property.
     *
     * @var float [schema.org types: Number]
     */
    public $maxValue;

    /**
     * The lower value of some characteristic or property.
     *
     * @var float [schema.org types: Number]
     */
    public $minValue;

    /**
     * The date when the item becomes valid.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $validFrom;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var DateTime [schema.org types: DateTime]
     */
    public $validThrough;

    /**
     * The value of the quantitative value or property value node.For
     * QuantitativeValue and MonetaryAmount, the recommended type for values is
     * 'Number'. For PropertyValue, it can be 'Text;', 'Number', 'Boolean', or
     * 'StructuredValue'. Use values from 0123456789 (Unicode 'DIGIT ZERO'
     * (U+0030) to 'DIGIT NINE' (U+0039)) rather than superficially similiar
     * Unicode symbols. Use '.' (Unicode 'FULL STOP' (U+002E)) rather than ',' to
     * indicate a decimal point. Avoid using these symbols as a readability
     * separator.
     *
     * @var mixed|bool|float|StructuredValue|string [schema.org types: Boolean, Number, StructuredValue, Text]
     */
    public $value;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'currency',
        'maxValue',
        'minValue',
        'validFrom',
        'validThrough',
        'value'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'currency' => ['Text'],
        'maxValue' => ['Number'],
        'minValue' => ['Number'],
        'validFrom' => ['DateTime'],
        'validThrough' => ['DateTime'],
        'value' => ['Boolean','Number','StructuredValue','Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'currency' => 'The currency in which the monetary amount is expressed. Use standard formats: ISO 4217 currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC"; well known names for Local Exchange Tradings Systems (LETS) and other currency types e.g. "Ithaca HOUR".',
        'maxValue' => 'The upper value of some characteristic or property.',
        'minValue' => 'The lower value of some characteristic or property.',
        'validFrom' => 'The date when the item becomes valid.',
        'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.',
        'value' => 'The value of the quantitative value or property value node.For QuantitativeValue and MonetaryAmount, the recommended type for values is \'Number\'. For PropertyValue, it can be \'Text;\', \'Number\', \'Boolean\', or \'StructuredValue\'. Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similiar Unicode symbols. Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator.'
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
            [['currency','maxValue','minValue','validFrom','validThrough','value'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
