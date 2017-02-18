<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * PropertyValue - A property-value pair, e.g. representing a feature of a
 * product or place. Use the 'name' property for the name of the property. If
 * there is an additional human-readable version of the value, put that into
 * the 'description' property. Always use specific schema.org properties when
 * a) they exist and b) you can populate them. Using PropertyValue as a
 * substitute will typically not trigger the same effect as using the
 * original, specific property.
 * Extends: StructuredValue
 * @see    http://schema.org/PropertyValue
 */
class PropertyValue extends StructuredValue
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'PropertyValue';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/PropertyValue';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A property-value pair, e.g. representing a feature of a product or place. Use the \'name\' property for the name of the property. If there is an additional human-readable version of the value, put that into the \'description\' property. Always use specific schema.org properties when a) they exist and b) you can populate them. Using PropertyValue as a substitute will typically not trigger the same effect as using the original, specific property.';

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
     * A commonly used identifier for the characteristic represented by the
     * property, e.g. a manufacturer or a standard code for a property. propertyID
     * can be (1) a prefixed string, mainly meant to be used with standards for
     * product properties; (2) a site-specific, non-prefixed string (e.g. the
     * primary key of the property or the vendor-specific id of the property), or
     * (3) a URL indicating the type of the property, either pointing to an
     * external vocabulary, or a Web resource that describes the property (e.g. a
     * glossary entry). Standards bodies should promote a standard prefix for the
     * identifiers of properties from their standards.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $propertyID;

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
                'maxValue',
                'minValue',
                'propertyID',
                'unitCode',
                'unitText',
                'value',
                'valueReference',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'maxValue' => ['Number'],
                'minValue' => ['Number'],
                'propertyID' => ['Text','URL'],
                'unitCode' => ['Text','URL'],
                'unitText' => ['Text'],
                'value' => ['Boolean','Number','StructuredValue','Text'],
                'valueReference' => ['Enumeration','PropertyValue','QualitativeValue','QuantitativeValue','StructuredValue'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'maxValue' => 'The upper value of some characteristic or property.',
                'minValue' => 'The lower value of some characteristic or property.',
                'propertyID' => 'A commonly used identifier for the characteristic represented by the property, e.g. a manufacturer or a standard code for a property. propertyID can be (1) a prefixed string, mainly meant to be used with standards for product properties; (2) a site-specific, non-prefixed string (e.g. the primary key of the property or the vendor-specific id of the property), or (3) a URL indicating the type of the property, either pointing to an external vocabulary, or a Web resource that describes the property (e.g. a glossary entry). Standards bodies should promote a standard prefix for the identifiers of properties from their standards.',
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
                [['maxValue','minValue','propertyID','unitCode','unitText','value','valueReference',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class PropertyValue*/
