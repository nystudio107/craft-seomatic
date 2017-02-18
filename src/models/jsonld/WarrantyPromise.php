<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * WarrantyPromise - A structured value representing the duration and scope of
 * services that will be provided to a customer free of charge in case of a
 * defect or malfunction of a product.
 * Extends: StructuredValue
 * @see    http://schema.org/WarrantyPromise
 */
class WarrantyPromise extends StructuredValue
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'WarrantyPromise';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/WarrantyPromise';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A structured value representing the duration and scope of services that will be provided to a customer free of charge in case of a defect or malfunction of a product.';

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
     * The duration of the warranty promise. Common unitCode values are ANN for
     * year, MON for months, or DAY for days.
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $durationOfWarranty;

    /**
     * The scope of the warranty promise.
     * @var WarrantyScope [schema.org types: WarrantyScope]
     */
    public $warrantyScope;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'durationOfWarranty',
                'warrantyScope',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'durationOfWarranty' => ['QuantitativeValue'],
                'warrantyScope' => ['WarrantyScope'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'durationOfWarranty' => 'The duration of the warranty promise. Common unitCode values are ANN for year, MON for months, or DAY for days.',
                'warrantyScope' => 'The scope of the warranty promise.',
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
                [['durationOfWarranty','warrantyScope',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class WarrantyPromise*/
