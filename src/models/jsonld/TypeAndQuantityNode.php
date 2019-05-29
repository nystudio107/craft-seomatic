<?php
/**
 * SEOmatic plugin for Craft CMS 3.x
 *
 * A turnkey SEO implementation for Craft CMS that is comprehensive, powerful,
 * and flexible
 *
 * @link      https://nystudio107.com
 * @copyright Copyright (c) 2017 nystudio107
 */

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\StructuredValue;

/**
 * TypeAndQuantityNode - A structured value indicating the quantity, unit of
 * measurement, and business function of goods included in a bundle offer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/TypeAndQuantityNode
 */
class TypeAndQuantityNode extends StructuredValue
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'TypeAndQuantityNode';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/TypeAndQuantityNode';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A structured value indicating the quantity, unit of measurement, and business function of goods included in a bundle offer.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'StructuredValue';

    /**
     * The Schema.org composed Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org composed Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org composed Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org composed Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * The quantity of the goods included in the offer.
     *
     * @var float [schema.org types: Number]
     */
    public $amountOfThisGood;

    /**
     * The business function (e.g. sell, lease, repair, dispose) of the offer or
     * component of a bundle (TypeAndQuantityNode). The default is
     * http://purl.org/goodrelations/v1#Sell.
     *
     * @var BusinessFunction [schema.org types: BusinessFunction]
     */
    public $businessFunction;

    /**
     * The product that this structured value is referring to.
     *
     * @var mixed|Product|Service [schema.org types: Product, Service]
     */
    public $typeOfGood;

    /**
     * The unit of measurement given using the UN/CEFACT Common Code (3
     * characters) or a URL. Other codes than the UN/CEFACT Common Code may be
     * used with a prefix followed by a colon.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $unitCode;

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot
     * provide a standard unit code for unitCode.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $unitText;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'amountOfThisGood',
        'businessFunction',
        'typeOfGood',
        'unitCode',
        'unitText'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'amountOfThisGood' => ['Number'],
        'businessFunction' => ['BusinessFunction'],
        'typeOfGood' => ['Product','Service'],
        'unitCode' => ['Text','URL'],
        'unitText' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'amountOfThisGood' => 'The quantity of the goods included in the offer.',
        'businessFunction' => 'The business function (e.g. sell, lease, repair, dispose) of the offer or component of a bundle (TypeAndQuantityNode). The default is http://purl.org/goodrelations/v1#Sell.',
        'typeOfGood' => 'The product that this structured value is referring to.',
        'unitCode' => 'The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.',
        'unitText' => 'A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for unitCode.'
    ];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static protected $_googleRequiredSchema = [
    ];

    /**
     * The Schema.org composed Google Recommended Schema for this type
     *
     * @var array
     */
    static protected $_googleRecommendedSchema = [
    ];

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(
            parent::$schemaPropertyNames,
            self::$_schemaPropertyNames
        );

        self::$schemaPropertyExpectedTypes = array_merge(
            parent::$schemaPropertyExpectedTypes,
            self::$_schemaPropertyExpectedTypes
        );

        self::$schemaPropertyDescriptions = array_merge(
            parent::$schemaPropertyDescriptions,
            self::$_schemaPropertyDescriptions
        );

        self::$googleRequiredSchema = array_merge(
            parent::$googleRequiredSchema,
            self::$_googleRequiredSchema
        );

        self::$googleRecommendedSchema = array_merge(
            parent::$googleRecommendedSchema,
            self::$_googleRecommendedSchema
        );
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['amountOfThisGood','businessFunction','typeOfGood','unitCode','unitText'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
