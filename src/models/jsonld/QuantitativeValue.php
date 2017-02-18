<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * QuantitativeValue - A point value or interval for product characteristics
 * and other purposes.
 * Extends: StructuredValue
 * @see    http://schema.org/QuantitativeValue
 */
class QuantitativeValue extends StructuredValue
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'QuantitativeValue';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/QuantitativeValue';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A point value or interval for product characteristics and other purposes.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'StructuredValue';

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
     * A property-value pair representing an additional characteristics of the
     * entitity, e.g. a product feature or another characteristic for which there
     * is no matching property in schema.org. Note: Publishers should be aware
     * that applications designed to use specific schema.org properties (e.g.
     * http://schema.org/width, http://schema.org/color, http://schema.org/gtin13,
     * ...) will typically expect such data to be provided using those properties,
     * rather than using the generic property/value mechanism.
     * @var PropertyValue [schema.org types: PropertyValue]
     */
    public $additionalProperty;

    /**
     * The upper value of some characteristic or property.
     * @var float [schema.org types: Number]
     */
    public $maxValue;

    /**
     * The lower value of some characteristic or property.
     * @var float [schema.org types: Number]
     */
    public $minValue;

    /**
     * The unit of measurement given using the UN/CEFACT Common Code (3
     * characters) or a URL. Other codes than the UN/CEFACT Common Code may be
     * used with a prefix followed by a colon.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $unitCode;

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot
     * provide a standard unit code for unitCode.
     * @var mixed string [schema.org types: Text]
     */
    public $unitText;

    /**
     * The value of the quantitative value or property value node. For
     * QuantitativeValue and MonetaryAmount, the recommended type for values is
     * 'Number'. For PropertyValue, it can be 'Text;', 'Number', 'Boolean', or
     * 'StructuredValue'.
     * @var mixed bool, float, StructuredValue, string [schema.org types: Boolean, Number, StructuredValue, Text]
     */
    public $value;

    /**
     * A pointer to a secondary value that provides additional information on the
     * original value, e.g. a reference temperature.
     * @var mixed Enumeration, PropertyValue, QualitativeValue, QuantitativeValue, StructuredValue [schema.org types: Enumeration, PropertyValue, QualitativeValue, QuantitativeValue, StructuredValue]
     */
    public $valueReference;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'additionalProperty',
                'maxValue',
                'minValue',
                'unitCode',
                'unitText',
                'value',
                'valueReference',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'additionalProperty' => ['PropertyValue'],
                'maxValue' => ['Number'],
                'minValue' => ['Number'],
                'unitCode' => ['Text','URL'],
                'unitText' => ['Text'],
                'value' => ['Boolean','Number','StructuredValue','Text'],
                'valueReference' => ['Enumeration','PropertyValue','QualitativeValue','QuantitativeValue','StructuredValue'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'additionalProperty' => 'A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org. Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism.',
                'maxValue' => 'The upper value of some characteristic or property.',
                'minValue' => 'The lower value of some characteristic or property.',
                'unitCode' => 'The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.',
                'unitText' => 'A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for unitCode.',
                'value' => 'The value of the quantitative value or property value node. For QuantitativeValue and MonetaryAmount, the recommended type for values is \'Number\'. For PropertyValue, it can be \'Text;\', \'Number\', \'Boolean\', or \'StructuredValue\'.',
                'valueReference' => 'A pointer to a secondary value that provides additional information on the original value, e.g. a reference temperature.',
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
                [['additionalProperty','maxValue','minValue','unitCode','unitText','value','valueReference',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class QuantitativeValue*/
