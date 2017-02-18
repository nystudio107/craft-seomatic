<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Audience;

/**
 * BusinessAudience - A set of characteristics belonging to businesses, e.g.
 * who compose an item's target audience.
 * Extends: Audience
 * @see    http://schema.org/BusinessAudience
 */
class BusinessAudience extends Audience
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'BusinessAudience';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/BusinessAudience';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A set of characteristics belonging to businesses, e.g. who compose an item\'s target audience.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Audience';

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
     * The number of employees in an organization e.g. business.
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $numberOfEmployees;

    /**
     * The size of the business in annual revenue.
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $yearlyRevenue;

    /**
     * The age of the business.
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $yearsInOperation;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'numberOfEmployees',
                'yearlyRevenue',
                'yearsInOperation',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'numberOfEmployees' => ['QuantitativeValue'],
                'yearlyRevenue' => ['QuantitativeValue'],
                'yearsInOperation' => ['QuantitativeValue'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'numberOfEmployees' => 'The number of employees in an organization e.g. business.',
                'yearlyRevenue' => 'The size of the business in annual revenue.',
                'yearsInOperation' => 'The age of the business.',
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
                [['numberOfEmployees','yearlyRevenue','yearsInOperation',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class BusinessAudience*/
