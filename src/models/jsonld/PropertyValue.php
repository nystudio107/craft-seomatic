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
 * PropertyValue - A property-value pair, e.g. representing a feature of a
 * product or place. Use the 'name' property for the name of the property. If
 * there is an additional human-readable version of the value, put that into
 * the 'description' property. Always use specific schema.org properties when
 * a) they exist and b) you can populate them. Using PropertyValue as a
 * substitute will typically not trigger the same effect as using the
 * original, specific property.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/PropertyValue
 */
class PropertyValue extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'PropertyValue';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/PropertyValue';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A property-value pair, e.g. representing a feature of a product or place. Use the \'name\' property for the name of the property. If there is an additional human-readable version of the value, put that into the \'description\' property. Always use specific schema.org properties when a) they exist and b) you can populate them. Using PropertyValue as a substitute will typically not trigger the same effect as using the original, specific property.';

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
     * The upper value of some characteristic or property.
     *
     * @var float [schema.org types: Number]
     */
    public $maxValue;

    /**
     * A technique or technology used in a Dataset (or DataDownload, DataCatalog),
     * corresponding to the method used for measuring the corresponding
     * variable(s) (described using variableMeasured). This is oriented towards
     * scientific and scholarly dataset publication but may have broader
     * applicability; it is not intended as a full representation of measurement,
     * but rather as a high level summary for dataset discovery. For example, if
     * variableMeasured is: molecule concentration, measurementTechnique could be:
     * "mass spectrometry" or "nmr spectroscopy" or "colorimetry" or
     * "immunofluorescence". If the variableMeasured is "depression rating", the
     * measurementTechnique could be "Zung Scale" or "HAM-D" or "Beck Depression
     * Inventory". If there are several variableMeasured properties recorded for
     * some given data object, use a PropertyValue for each variableMeasured and
     * attach the corresponding measurementTechnique.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $measurementTechnique;

    /**
     * The lower value of some characteristic or property.
     *
     * @var mixed|float [schema.org types: Number]
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
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $propertyID;

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
        'maxValue',
        'measurementTechnique',
        'minValue',
        'propertyID',
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
        'maxValue' => ['Number'],
        'measurementTechnique' => ['Text','URL'],
        'minValue' => ['Number'],
        'propertyID' => ['Text','URL'],
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
        'maxValue' => 'The upper value of some characteristic or property.',
        'measurementTechnique' => 'A technique or technology used in a Dataset (or DataDownload, DataCatalog), corresponding to the method used for measuring the corresponding variable(s) (described using variableMeasured). This is oriented towards scientific and scholarly dataset publication but may have broader applicability; it is not intended as a full representation of measurement, but rather as a high level summary for dataset discovery. For example, if variableMeasured is: molecule concentration, measurementTechnique could be: "mass spectrometry" or "nmr spectroscopy" or "colorimetry" or "immunofluorescence". If the variableMeasured is "depression rating", the measurementTechnique could be "Zung Scale" or "HAM-D" or "Beck Depression Inventory". If there are several variableMeasured properties recorded for some given data object, use a PropertyValue for each variableMeasured and attach the corresponding measurementTechnique.',
        'minValue' => 'The lower value of some characteristic or property.',
        'propertyID' => 'A commonly used identifier for the characteristic represented by the property, e.g. a manufacturer or a standard code for a property. propertyID can be (1) a prefixed string, mainly meant to be used with standards for product properties; (2) a site-specific, non-prefixed string (e.g. the primary key of the property or the vendor-specific id of the property), or (3) a URL indicating the type of the property, either pointing to an external vocabulary, or a Web resource that describes the property (e.g. a glossary entry). Standards bodies should promote a standard prefix for the identifiers of properties from their standards.',
        'unitCode' => 'The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.',
        'unitText' => 'A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for unitCode.',
        'value' => 'The value of the quantitative value or property value node.For QuantitativeValue and MonetaryAmount, the recommended type for values is \'Number\'. For PropertyValue, it can be \'Text;\', \'Number\', \'Boolean\', or \'StructuredValue\'. Use values from 0123456789 (Unicode \'DIGIT ZERO\' (U+0030) to \'DIGIT NINE\' (U+0039)) rather than superficially similiar Unicode symbols. Use \'.\' (Unicode \'FULL STOP\' (U+002E)) rather than \',\' to indicate a decimal point. Avoid using these symbols as a readability separator.',
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
            [['maxValue','measurementTechnique','minValue','propertyID','unitCode','unitText','value','valueReference'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
