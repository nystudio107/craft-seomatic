<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\OrganizationRole;

/**
 * EmployeeRole - A subclass of OrganizationRole used to describe employee
 * relationships.
 * Extends: OrganizationRole
 * @see    http://schema.org/EmployeeRole
 */
class EmployeeRole extends OrganizationRole
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'EmployeeRole';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/EmployeeRole';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A subclass of OrganizationRole used to describe employee relationships.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'OrganizationRole';

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
     * The base salary of the job or of an employee in an EmployeeRole.
     * @var mixed MonetaryAmount, float, PriceSpecification [schema.org types: MonetaryAmount, Number, PriceSpecification]
     */
    public $baseSalary;

    /**
     * The currency (coded using ISO 4217 ) used for the main salary information
     * in this job posting or for this employee.
     * @var mixed string [schema.org types: Text]
     */
    public $salaryCurrency;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'baseSalary',
                'salaryCurrency',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'baseSalary' => ['MonetaryAmount','Number','PriceSpecification'],
                'salaryCurrency' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'baseSalary' => 'The base salary of the job or of an employee in an EmployeeRole.',
                'salaryCurrency' => 'The currency (coded using ISO 4217 ) used for the main salary information in this job posting or for this employee.',
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
                [['baseSalary','salaryCurrency',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class EmployeeRole*/
