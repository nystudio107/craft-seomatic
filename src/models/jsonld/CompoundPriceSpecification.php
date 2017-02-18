<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\PriceSpecification;

/**
 * CompoundPriceSpecification - A compound price specification is one that
 * bundles multiple prices that all apply in combination for different
 * dimensions of consumption. Use the name property of the attached unit price
 * specification for indicating the dimension of a price component (e.g.
 * "electricity" or "final cleaning").
 * Extends: PriceSpecification
 * @see    http://schema.org/CompoundPriceSpecification
 */
class CompoundPriceSpecification extends PriceSpecification
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'CompoundPriceSpecification';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/CompoundPriceSpecification';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A compound price specification is one that bundles multiple prices that all apply in combination for different dimensions of consumption. Use the name property of the attached unit price specification for indicating the dimension of a price component (e.g. "electricity" or "final cleaning").';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'PriceSpecification';

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
     * This property links to all UnitPriceSpecification nodes that apply in
     * parallel for the CompoundPriceSpecification node.
     * @var UnitPriceSpecification [schema.org types: UnitPriceSpecification]
     */
    public $priceComponent;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'priceComponent',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'priceComponent' => ['UnitPriceSpecification'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'priceComponent' => 'This property links to all UnitPriceSpecification nodes that apply in parallel for the CompoundPriceSpecification node.',
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
                [['priceComponent',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class CompoundPriceSpecification*/
