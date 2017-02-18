<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\TradeAction;

/**
 * QuoteAction - An agent quotes/estimates/appraises an object/product/service
 * with a price at a location/store.
 * Extends: TradeAction
 * @see    http://schema.org/QuoteAction
 */
class QuoteAction extends TradeAction
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'QuoteAction';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/QuoteAction';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'An agent quotes/estimates/appraises an object/product/service with a price at a location/store.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'TradeAction';

    /**
     * The Schema.org Property Names
     * @var array
     */
    static $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     * @var array
     */
    static $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     * @var array
     */
    static $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     * @var array
     */
    static $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     * @var array
     */
    static $googleRecommendedSchema = [];

    // Properties
    // =========================================================================

    /**
     * The offer price of a product, or of a price component when attached to
     * PriceSpecification and its subtypes. Usage guidelines: Use the
     * priceCurrency property (with ISO 4217 codes e.g. "USD") instead of
     * including ambiguous symbols such as '$' in the value. Use '.' (Unicode
     * 'FULL STOP' (U+002E)) rather than ',' to indicate a decimal point. Avoid
     * using these symbols as a readability separator. Note that both RDFa and
     * Microdata syntax allow the use of a "content=" attribute for publishing
     * simple machine-readable values alongside more human-friendly formatting.
     * Use values from 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE'
     * (U+0039)) rather than superficially similiar Unicode symbols.
     * @var mixed float, string [schema.org types: Number, Text]
     */
    public $price;

    /**
     * One or more detailed price specifications, indicating the unit price and
     * delivery or payment charges.
     * @var mixed PriceSpecification [schema.org types: PriceSpecification]
     */
    public $priceSpecification;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'price',
                'priceSpecification',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'price' => ['Number','Text'],
                'priceSpecification' => ['PriceSpecification'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'price' => 'The offer price of a product, or of a price component when attached to PriceSpecification and its subtypes. Usage guidelines: Use the priceCurrency property (with ISO 4217 codes e.g. "USD") instead of including ambiguous symbols such as \'$\' in the value. Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator. Note that both RDFa and Microdata syntax allow the use of a "content=" attribute for publishing simple machine-readable values alongside more human-friendly formatting. Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similiar Unicode symbols.',
                'priceSpecification' => 'One or more detailed price specifications, indicating the unit price and delivery or payment charges.',
            ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema,
            [
            ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema,
            [
            ]);
    } /* -- init */

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules,
            [
                [['price','priceSpecification',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class QuoteAction*/
