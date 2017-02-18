<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Enumeration;

/**
 * QualitativeValue - A predefined value for a product characteristic, e.g.
 * the power cord plug type 'US' or the garment sizes 'S', 'M', 'L', and 'XL'.
 * Extends: Enumeration
 * @see    http://schema.org/QualitativeValue
 */
class QualitativeValue extends Enumeration
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'QualitativeValue';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/QualitativeValue';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A predefined value for a product characteristic, e.g. the power cord plug type \'US\' or the garment sizes \'S\', \'M\', \'L\', and \'XL\'.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Enumeration';

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
     * This ordering relation for qualitative values indicates that the subject is
     * equal to the object.
     * @var QualitativeValue [schema.org types: QualitativeValue]
     */
    public $equal;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * greater than the object.
     * @var QualitativeValue [schema.org types: QualitativeValue]
     */
    public $greater;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * greater than or equal to the object.
     * @var QualitativeValue [schema.org types: QualitativeValue]
     */
    public $greaterOrEqual;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * lesser than the object.
     * @var QualitativeValue [schema.org types: QualitativeValue]
     */
    public $lesser;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * lesser than or equal to the object.
     * @var QualitativeValue [schema.org types: QualitativeValue]
     */
    public $lesserOrEqual;

    /**
     * This ordering relation for qualitative values indicates that the subject is
     * not equal to the object.
     * @var QualitativeValue [schema.org types: QualitativeValue]
     */
    public $nonEqual;

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
                'equal',
                'greater',
                'greaterOrEqual',
                'lesser',
                'lesserOrEqual',
                'nonEqual',
                'valueReference',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'additionalProperty' => ['PropertyValue'],
                'equal' => ['QualitativeValue'],
                'greater' => ['QualitativeValue'],
                'greaterOrEqual' => ['QualitativeValue'],
                'lesser' => ['QualitativeValue'],
                'lesserOrEqual' => ['QualitativeValue'],
                'nonEqual' => ['QualitativeValue'],
                'valueReference' => ['Enumeration','PropertyValue','QualitativeValue','QuantitativeValue','StructuredValue'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'additionalProperty' => 'A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org. Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism.',
                'equal' => 'This ordering relation for qualitative values indicates that the subject is equal to the object.',
                'greater' => 'This ordering relation for qualitative values indicates that the subject is greater than the object.',
                'greaterOrEqual' => 'This ordering relation for qualitative values indicates that the subject is greater than or equal to the object.',
                'lesser' => 'This ordering relation for qualitative values indicates that the subject is lesser than the object.',
                'lesserOrEqual' => 'This ordering relation for qualitative values indicates that the subject is lesser than or equal to the object.',
                'nonEqual' => 'This ordering relation for qualitative values indicates that the subject is not equal to the object.',
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
                [['additionalProperty','equal','greater','greaterOrEqual','lesser','lesserOrEqual','nonEqual','valueReference',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class QualitativeValue*/
