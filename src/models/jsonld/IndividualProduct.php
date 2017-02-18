<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Product;

/**
 * IndividualProduct - A single, identifiable product instance (e.g. a laptop
 * with a particular serial number).
 * Extends: Product
 * @see    http://schema.org/IndividualProduct
 */
class IndividualProduct extends Product
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'IndividualProduct';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/IndividualProduct';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A single, identifiable product instance (e.g. a laptop with a particular serial number).';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Product';

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
     * The serial number or any alphanumeric identifier of a particular product.
     * When attached to an offer, it is a shortcut for the serial number of the
     * product included in the offer.
     * @var string [schema.org types: Text]
     */
    public $serialNumber;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'serialNumber',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'serialNumber' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'serialNumber' => 'The serial number or any alphanumeric identifier of a particular product. When attached to an offer, it is a shortcut for the serial number of the product included in the offer.',
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
                [['serialNumber',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class IndividualProduct*/
