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
 * PriceSpecification - A structured value representing a price or price
 * range. Typically, only the subclasses of this type are used for markup. It
 * is recommended to use MonetaryAmount to describe independent amounts of
 * money such as a salary, credit card limits, etc.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/PriceSpecification
 */
class PriceSpecification extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'PriceSpecification';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/PriceSpecification';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A structured value representing a price or price range. Typically, only the subclasses of this type are used for markup. It is recommended to use MonetaryAmount to describe independent amounts of money such as a salary, credit card limits, etc.';

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
     * The interval and unit of measurement of ordering quantities for which the
     * offer or price specification is valid. This allows e.g. specifying that a
     * certain freight charge is valid only for a certain quantity.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $eligibleQuantity;

    /**
     * The transaction volume, in a monetary unit, for which the offer or price
     * specification is valid, e.g. for indicating a minimal purchasing volume, to
     * express free shipping above a certain order volume, or to limit the
     * acceptance of credit cards to purchases to a certain minimal amount.
     *
     * @var PriceSpecification [schema.org types: PriceSpecification]
     */
    public $eligibleTransactionVolume;

    /**
     * The highest price if the price is a range.
     *
     * @var float [schema.org types: Number]
     */
    public $maxPrice;

    /**
     * The lowest price if the price is a range.
     *
     * @var float [schema.org types: Number]
     */
    public $minPrice;

    /**
     * The offer price of a product, or of a price component when attached to
     * PriceSpecification and its subtypes. Usage guidelines:Use the priceCurrency
     * property (with standard formats: ISO 4217 currency format e.g. "USD";
     * Ticker symbol for cryptocurrencies e.g. "BTC"; well known names for Local
     * Exchange Tradings Systems (LETS) and other currency types e.g. "Ithaca
     * HOUR") instead of including ambiguous symbols such as '$' in the value. Use
     * '.' (Unicode 'FULL STOP' (U+002E)) rather than ',' to indicate a decimal
     * point. Avoid using these symbols as a readability separator. Note that both
     * RDFa and Microdata syntax allow the use of a "content=" attribute for
     * publishing simple machine-readable values alongside more human-friendly
     * formatting. Use values from 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to
     * 'DIGIT NINE' (U+0039)) rather than superficially similiar Unicode symbols.
     *
     * @var mixed|float|string [schema.org types: Number, Text]
     */
    public $price;

    /**
     * The currency of the price, or a price component when attached to
     * PriceSpecification and its subtypes. Use standard formats: ISO 4217
     * currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC";
     * well known names for Local Exchange Tradings Systems (LETS) and other
     * currency types e.g. "Ithaca HOUR".
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $priceCurrency;

    /**
     * The date when the item becomes valid.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $validFrom;

    /**
     * The date after when the item is not valid. For example the end of an offer,
     * salary period, or a period of opening hours.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $validThrough;

    /**
     * Specifies whether the applicable value-added tax (VAT) is included in the
     * price specification or not.
     *
     * @var mixed|bool [schema.org types: Boolean]
     */
    public $valueAddedTaxIncluded;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'eligibleQuantity',
        'eligibleTransactionVolume',
        'maxPrice',
        'minPrice',
        'price',
        'priceCurrency',
        'validFrom',
        'validThrough',
        'valueAddedTaxIncluded'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'eligibleQuantity' => ['QuantitativeValue'],
        'eligibleTransactionVolume' => ['PriceSpecification'],
        'maxPrice' => ['Number'],
        'minPrice' => ['Number'],
        'price' => ['Number','Text'],
        'priceCurrency' => ['Text'],
        'validFrom' => ['DateTime'],
        'validThrough' => ['DateTime'],
        'valueAddedTaxIncluded' => ['Boolean']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'eligibleQuantity' => 'The interval and unit of measurement of ordering quantities for which the offer or price specification is valid. This allows e.g. specifying that a certain freight charge is valid only for a certain quantity.',
        'eligibleTransactionVolume' => 'The transaction volume, in a monetary unit, for which the offer or price specification is valid, e.g. for indicating a minimal purchasing volume, to express free shipping above a certain order volume, or to limit the acceptance of credit cards to purchases to a certain minimal amount.',
        'maxPrice' => 'The highest price if the price is a range.',
        'minPrice' => 'The lowest price if the price is a range.',
        'price' => 'The offer price of a product, or of a price component when attached to PriceSpecification and its subtypes. Usage guidelines:Use the priceCurrency property (with standard formats: ISO 4217 currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC"; well known names for Local Exchange Tradings Systems (LETS) and other currency types e.g. "Ithaca HOUR") instead of including ambiguous symbols such as \'$\' in the value. Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator. Note that both RDFa and Microdata syntax allow the use of a "content=" attribute for publishing simple machine-readable values alongside more human-friendly formatting. Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similiar Unicode symbols.',
        'priceCurrency' => 'The currency of the price, or a price component when attached to PriceSpecification and its subtypes. Use standard formats: ISO 4217 currency format e.g. "USD"; Ticker symbol for cryptocurrencies e.g. "BTC"; well known names for Local Exchange Tradings Systems (LETS) and other currency types e.g. "Ithaca HOUR".',
        'validFrom' => 'The date when the item becomes valid.',
        'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.',
        'valueAddedTaxIncluded' => 'Specifies whether the applicable value-added tax (VAT) is included in the price specification or not.'
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
            [['eligibleQuantity','eligibleTransactionVolume','maxPrice','minPrice','price','priceCurrency','validFrom','validThrough','valueAddedTaxIncluded'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
