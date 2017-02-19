<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\GeoShape;

/**
 * GeoCircle - A GeoCircle is a GeoShape representing a circular geographic
 * area. As it is a GeoShape it provides the simple textual property 'circle',
 * but also allows the combination of postalCode alongside geoRadius. The
 * center of the circle can be indicated via the 'geoMidpoint' property, or
 * more approximately using 'address', 'postalCode'.
 *
 * Extends: GeoShape
 * @see    http://schema.org/GeoCircle
 */
class GeoCircle extends GeoShape
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'GeoCircle';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/GeoCircle';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A GeoCircle is a GeoShape representing a circular geographic area. As it is a GeoShape it provides the simple textual property \'circle\', but also allows the combination of postalCode alongside geoRadius. The center of the circle can be indicated via the \'geoMidpoint\' property, or more approximately using \'address\', \'postalCode\'.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'GeoShape';

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
     * Indicates the GeoCoordinates at the centre of a GeoShape e.g. GeoCircle.
     *
     * @var GeoCoordinates [schema.org types: GeoCoordinates]
     */
    public $geoMidpoint;

    /**
     * Indicates the approximate radius of a GeoCircle (metres unless indicated
     * otherwise via Distance notation).
     *
     * @var mixed|Distance|float|string [schema.org types: Distance, Number, Text]
     */
    public $geoRadius;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'geoMidpoint',
            'geoRadius',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'geoMidpoint' => ['GeoCoordinates'],
            'geoRadius' => ['Distance','Number','Text'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'geoMidpoint' => 'Indicates the GeoCoordinates at the centre of a GeoShape e.g. GeoCircle.',
            'geoRadius' => 'Indicates the approximate radius of a GeoCircle (metres unless indicated otherwise via Distance notation).',
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
            [['geoMidpoint','geoRadius',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
