<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * MonetaryAmount - A monetary value or range. This type can be used to
 * describe an amount of money such as $50 USD, or a range as in describing a
 * bank account being suitable for a balance between £1,000 and £1,000,000
 * GBP, or the value of a salary, etc. It is recommended to use
 * PriceSpecification Types to describe the price of an Offer, Invoice, etc.
 *
 * Extends: StructuredValue
 * @see    http://schema.org/MonetaryAmount
 */
class MonetaryAmount extends StructuredValue
{
    // Static Properties
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
     * The currency in which the monetary amount is expressed (in 3-letter ISO
     * 4217 format).
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
     * The value of the quantitative value or property value node. For
     * QuantitativeValue and MonetaryAmount, the recommended type for values is
     * 'Number'. For PropertyValue, it can be 'Text;', 'Number', 'Boolean', or
     * 'StructuredValue'.
     *
     * @var mixed|bool|float|StructuredValue|string [schema.org types: Boolean, Number, StructuredValue, Text]
     */
    public $value;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'currency',
            'maxValue',
            'minValue',
            'validFrom',
            'validThrough',
            'value',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'currency' => ['Text'],
            'maxValue' => ['Number'],
            'minValue' => ['Number'],
            'validFrom' => ['DateTime'],
            'validThrough' => ['DateTime'],
            'value' => ['Boolean','Number','StructuredValue','Text'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'currency' => 'The currency in which the monetary amount is expressed (in 3-letter ISO 4217 format).',
            'maxValue' => 'The upper value of some characteristic or property.',
            'minValue' => 'The lower value of some characteristic or property.',
            'validFrom' => 'The date when the item becomes valid.',
            'validThrough' => 'The date after when the item is not valid. For example the end of an offer, salary period, or a period of opening hours.',
            'value' => 'The value of the quantitative value or property value node. For QuantitativeValue and MonetaryAmount, the recommended type for values is \'Number\'. For PropertyValue, it can be \'Text;\', \'Number\', \'Boolean\', or \'StructuredValue\'.',
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
            [['currency','maxValue','minValue','validFrom','validThrough','value',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
