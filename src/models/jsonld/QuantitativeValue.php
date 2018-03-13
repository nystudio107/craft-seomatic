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
 * QuantitativeValue - A point value or interval for product characteristics
 * and other purposes.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/QuantitativeValue
 */
class QuantitativeValue extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'QuantitativeValue';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/QuantitativeValue';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A point value or interval for product characteristics and other purposes.';

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
     * A property-value pair representing an additional characteristics of the
     * entitity, e.g. a product feature or another characteristic for which there
     * is no matching property in schema.org. Note: Publishers should be aware
     * that applications designed to use specific schema.org properties (e.g.
     * http://schema.org/width, http://schema.org/color, http://schema.org/gtin13,
     * ...) will typically expect such data to be provided using those properties,
     * rather than using the generic property/value mechanism.
     *
     * @var PropertyValue [schema.org types: PropertyValue]
     */
    public $additionalProperty;

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
     * The unit of measurement given using the UN/CEFACT Common Code (3
     * characters) or a URL. Other codes than the UN/CEFACT Common Code may be
     * used with a prefix followed by a colon.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $unitCode;

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot
     * provide a standard unit code for unitCode.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $unitText;

    /**
     * The value of the quantitative value or property value node. For
     * QuantitativeValue and MonetaryAmount, the recommended type for values is
     * 'Number'. For PropertyValue, it can be 'Text;', 'Number', 'Boolean', or
     * 'StructuredValue'.
     *
     * @var mixed|bool|float|StructuredValue|string [schema.org types: Boolean, Number, StructuredValue, Text]
     */
    public $value;

    /**
     * A pointer to a secondary value that provides additional information on the
     * original value, e.g. a reference temperature.
     *
     * @var mixed|Enumeration|PropertyValue|QualitativeValue|QuantitativeValue|StructuredValue [schema.org types: Enumeration, PropertyValue, QualitativeValue, QuantitativeValue, StructuredValue]
     */
    public $valueReference;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'additionalProperty',
        'maxValue',
        'minValue',
        'unitCode',
        'unitText',
        'value',
        'valueReference'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'additionalProperty' => ['PropertyValue'],
        'maxValue' => ['Number'],
        'minValue' => ['Number'],
        'unitCode' => ['Text','URL'],
        'unitText' => ['Text'],
        'value' => ['Boolean','Number','StructuredValue','Text'],
        'valueReference' => ['Enumeration','PropertyValue','QualitativeValue','QuantitativeValue','StructuredValue']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'additionalProperty' => 'A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org. Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism.',
        'maxValue' => 'The upper value of some characteristic or property.',
        'minValue' => 'The lower value of some characteristic or property.',
        'unitCode' => 'The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.',
        'unitText' => 'A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for unitCode.',
        'value' => 'The value of the quantitative value or property value node. For QuantitativeValue and MonetaryAmount, the recommended type for values is \'Number\'. For PropertyValue, it can be \'Text;\', \'Number\', \'Boolean\', or \'StructuredValue\'.',
        'valueReference' => 'A pointer to a secondary value that provides additional information on the original value, e.g. a reference temperature.'
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
            [['additionalProperty','maxValue','minValue','unitCode','unitText','value','valueReference'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
