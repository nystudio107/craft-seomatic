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

use nystudio107\seomatic\models\jsonld\PriceSpecification;

/**
 * DeliveryChargeSpecification - The price for the delivery of an offer using
 * a particular delivery method.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/DeliveryChargeSpecification
 */
class DeliveryChargeSpecification extends PriceSpecification
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'DeliveryChargeSpecification';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/DeliveryChargeSpecification';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The price for the delivery of an offer using a particular delivery method.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'PriceSpecification';

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
     * The delivery method(s) to which the delivery charge or payment charge
     * specification applies.
     *
     * @var DeliveryMethod [schema.org types: DeliveryMethod]
     */
    public $appliesToDeliveryMethod;

    /**
     * The geographic area where a service or offered item is provided. Supersedes
     * serviceArea.
     *
     * @var mixed|AdministrativeArea|GeoShape|Place|string [schema.org types: AdministrativeArea, GeoShape, Place, Text]
     */
    public $areaServed;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is valid. See also ineligibleRegion.
     *
     * @var mixed|GeoShape|Place|string [schema.org types: GeoShape, Place, Text]
     */
    public $eligibleRegion;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is not valid, e.g. a region where the transaction is
     * not allowed. See also eligibleRegion.
     *
     * @var mixed|GeoShape|Place|string [schema.org types: GeoShape, Place, Text]
     */
    public $ineligibleRegion;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'appliesToDeliveryMethod',
        'areaServed',
        'eligibleRegion',
        'ineligibleRegion'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'appliesToDeliveryMethod' => ['DeliveryMethod'],
        'areaServed' => ['AdministrativeArea','GeoShape','Place','Text'],
        'eligibleRegion' => ['GeoShape','Place','Text'],
        'ineligibleRegion' => ['GeoShape','Place','Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'appliesToDeliveryMethod' => 'The delivery method(s) to which the delivery charge or payment charge specification applies.',
        'areaServed' => 'The geographic area where a service or offered item is provided. Supersedes serviceArea.',
        'eligibleRegion' => 'The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is valid. See also ineligibleRegion.',
        'ineligibleRegion' => 'The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is not valid, e.g. a region where the transaction is not allowed. See also eligibleRegion.'
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
            [['appliesToDeliveryMethod','areaServed','eligibleRegion','ineligibleRegion'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
