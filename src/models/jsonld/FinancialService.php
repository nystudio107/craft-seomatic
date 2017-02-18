<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\LocalBusiness;

/**
 * FinancialService - Financial services business.
 * Extends: LocalBusiness
 * @see    http://schema.org/FinancialService
 */
class FinancialService extends LocalBusiness
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'FinancialService';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/FinancialService';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Financial services business.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'LocalBusiness';

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
     * Description of fees, commissions, and other terms applied either to a class
     * of financial product, or by a financial service organization.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $feesAndCommissionsSpecification;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'feesAndCommissionsSpecification',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'feesAndCommissionsSpecification' => ['Text','URL'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'feesAndCommissionsSpecification' => 'Description of fees, commissions, and other terms applied either to a class of financial product, or by a financial service organization.',
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
                [['feesAndCommissionsSpecification',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class FinancialService*/
