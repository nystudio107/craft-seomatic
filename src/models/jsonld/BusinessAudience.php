<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Audience;

/**
 * BusinessAudience - A set of characteristics belonging to businesses, e.g.
 * who compose an item's target audience.
 *
 * Extends: Audience
 * @see    http://schema.org/BusinessAudience
 */
class BusinessAudience extends Audience
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'BusinessAudience';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/BusinessAudience';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A set of characteristics belonging to businesses, e.g. who compose an item\'s target audience.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Audience';

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
     * The number of employees in an organization e.g. business.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $numberOfEmployees;

    /**
     * The size of the business in annual revenue.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $yearlyRevenue;

    /**
     * The age of the business.
     *
     * @var QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $yearsInOperation;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'numberOfEmployees',
            'yearlyRevenue',
            'yearsInOperation',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'numberOfEmployees' => ['QuantitativeValue'],
            'yearlyRevenue' => ['QuantitativeValue'],
            'yearsInOperation' => ['QuantitativeValue'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'numberOfEmployees' => 'The number of employees in an organization e.g. business.',
            'yearlyRevenue' => 'The size of the business in annual revenue.',
            'yearsInOperation' => 'The age of the business.',
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
            [['numberOfEmployees','yearlyRevenue','yearsInOperation',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
