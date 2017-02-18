<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * TypeAndQuantityNode - A structured value indicating the quantity, unit of
 * measurement, and business function of goods included in a bundle offer.
 * Extends: StructuredValue
 * @see    http://schema.org/TypeAndQuantityNode
 */
class TypeAndQuantityNode extends StructuredValue
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'TypeAndQuantityNode';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/TypeAndQuantityNode';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A structured value indicating the quantity, unit of measurement, and business function of goods included in a bundle offer.';

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
     * The quantity of the goods included in the offer.
     * @var float [schema.org types: Number]
     */
    public $amountOfThisGood;

    /**
     * The business function (e.g. sell, lease, repair, dispose) of the offer or
     * component of a bundle (TypeAndQuantityNode). The default is
     * http://purl.org/goodrelations/v1#Sell.
     * @var BusinessFunction [schema.org types: BusinessFunction]
     */
    public $businessFunction;

    /**
     * The product that this structured value is referring to.
     * @var mixed Product, Service [schema.org types: Product, Service]
     */
    public $typeOfGood;

    /**
     * The unit of measurement given using the UN/CEFACT Common Code (3
     * characters) or a URL. Other codes than the UN/CEFACT Common Code may be
     * used with a prefix followed by a colon.
     * @var mixed string, string [schema.org types: Text, URL]
     */
    public $unitCode;

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot
     * provide a standard unit code for unitCode.
     * @var mixed string [schema.org types: Text]
     */
    public $unitText;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'amountOfThisGood',
                'businessFunction',
                'typeOfGood',
                'unitCode',
                'unitText',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'amountOfThisGood' => ['Number'],
                'businessFunction' => ['BusinessFunction'],
                'typeOfGood' => ['Product','Service'],
                'unitCode' => ['Text','URL'],
                'unitText' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'amountOfThisGood' => 'The quantity of the goods included in the offer.',
                'businessFunction' => 'The business function (e.g. sell, lease, repair, dispose) of the offer or component of a bundle (TypeAndQuantityNode). The default is http://purl.org/goodrelations/v1#Sell.',
                'typeOfGood' => 'The product that this structured value is referring to.',
                'unitCode' => 'The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.',
                'unitText' => 'A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for unitCode.',
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
                [['amountOfThisGood','businessFunction','typeOfGood','unitCode','unitText',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class TypeAndQuantityNode*/
