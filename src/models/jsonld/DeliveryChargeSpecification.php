<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\PriceSpecification;

/**
 * DeliveryChargeSpecification - The price for the delivery of an offer using
 * a particular delivery method.
 * Extends: PriceSpecification
 * @see    http://schema.org/DeliveryChargeSpecification
 */
class DeliveryChargeSpecification extends PriceSpecification
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'DeliveryChargeSpecification';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/DeliveryChargeSpecification';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'The price for the delivery of an offer using a particular delivery method.';

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
     * The delivery method(s) to which the delivery charge or payment charge
     * specification applies.
     * @var DeliveryMethod [schema.org types: DeliveryMethod]
     */
    public $appliesToDeliveryMethod;

    /**
     * The geographic area where a service or offered item is provided. Supersedes
     * serviceArea.
     * @var mixed AdministrativeArea, GeoShape, Place, string [schema.org types: AdministrativeArea, GeoShape, Place, Text]
     */
    public $areaServed;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is valid. See also ineligibleRegion.
     * @var mixed GeoShape, Place, string [schema.org types: GeoShape, Place, Text]
     */
    public $eligibleRegion;

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the
     * GeoShape for the geo-political region(s) for which the offer or delivery
     * charge specification is not valid, e.g. a region where the transaction is
     * not allowed. See also eligibleRegion.
     * @var mixed GeoShape, Place, string [schema.org types: GeoShape, Place, Text]
     */
    public $ineligibleRegion;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'appliesToDeliveryMethod',
                'areaServed',
                'eligibleRegion',
                'ineligibleRegion',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'appliesToDeliveryMethod' => ['DeliveryMethod'],
                'areaServed' => ['AdministrativeArea','GeoShape','Place','Text'],
                'eligibleRegion' => ['GeoShape','Place','Text'],
                'ineligibleRegion' => ['GeoShape','Place','Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'appliesToDeliveryMethod' => 'The delivery method(s) to which the delivery charge or payment charge specification applies.',
                'areaServed' => 'The geographic area where a service or offered item is provided. Supersedes serviceArea.',
                'eligibleRegion' => 'The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is valid. See also ineligibleRegion.',
                'ineligibleRegion' => 'The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is not valid, e.g. a region where the transaction is not allowed. See also eligibleRegion.',
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
                [['appliesToDeliveryMethod','areaServed','eligibleRegion','ineligibleRegion',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class DeliveryChargeSpecification*/
