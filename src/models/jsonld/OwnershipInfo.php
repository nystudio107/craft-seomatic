<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * OwnershipInfo - A structured value providing information about when a
 * certain organization or person owned a certain product.
 *
 * Extends: StructuredValue
 * @see    http://schema.org/OwnershipInfo
 */
class OwnershipInfo extends StructuredValue
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'OwnershipInfo';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/OwnershipInfo';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A structured value providing information about when a certain organization or person owned a certain product.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'StructuredValue';

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
     * The organization or person from which the product was acquired.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $acquiredFrom;

    /**
     * The date and time of obtaining the product.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $ownedFrom;

    /**
     * The date and time of giving up ownership on the product.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $ownedThrough;

    /**
     * The product that this structured value is referring to.
     *
     * @var mixed|Product|Service [schema.org types: Product, Service]
     */
    public $typeOfGood;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'acquiredFrom',
            'ownedFrom',
            'ownedThrough',
            'typeOfGood',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'acquiredFrom' => ['Organization','Person'],
            'ownedFrom' => ['DateTime'],
            'ownedThrough' => ['DateTime'],
            'typeOfGood' => ['Product','Service'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'acquiredFrom' => 'The organization or person from which the product was acquired.',
            'ownedFrom' => 'The date and time of obtaining the product.',
            'ownedThrough' => 'The date and time of giving up ownership on the product.',
            'typeOfGood' => 'The product that this structured value is referring to.',
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
            [['acquiredFrom','ownedFrom','ownedThrough','typeOfGood',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
