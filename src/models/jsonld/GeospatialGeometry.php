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

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * GeospatialGeometry - (Eventually to be defined as) a supertype of GeoShape
 * designed to accommodate definitions from Geo-Spatial best practices.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/GeospatialGeometry
 */
class GeospatialGeometry extends Intangible
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'GeospatialGeometry';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/GeospatialGeometry';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = '(Eventually to be defined as) a supertype of GeoShape designed to accommodate definitions from Geo-Spatial best practices.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Intangible';

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
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'geoContains',
        'geoCoveredBy',
        'geoCovers',
        'geoCrosses',
        'geoDisjoint',
        'geoEquals',
        'geoIntersects',
        'geoOverlaps',
        'geoTouches',
        'geoWithin'
    ];
    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'geoContains' => ['GeospatialGeometry', 'Place'],
        'geoCoveredBy' => ['GeospatialGeometry', 'Place'],
        'geoCovers' => ['GeospatialGeometry', 'Place'],
        'geoCrosses' => ['GeospatialGeometry', 'Place'],
        'geoDisjoint' => ['GeospatialGeometry', 'Place'],
        'geoEquals' => ['GeospatialGeometry', 'Place'],
        'geoIntersects' => ['GeospatialGeometry', 'Place'],
        'geoOverlaps' => ['GeospatialGeometry', 'Place'],
        'geoTouches' => ['GeospatialGeometry', 'Place'],
        'geoWithin' => ['GeospatialGeometry', 'Place']
    ];
    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'geoContains' => 'Represents a relationship between two geometries (or the places they represent), relating a containing geometry to a contained geometry. "a contains b iff no points of b lie in the exterior of a, and at least one point of the interior of b lies in the interior of a". As defined in DE-9IM.',
        'geoCoveredBy' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that covers it. As defined in DE-9IM.',
        'geoCovers' => 'Represents a relationship between two geometries (or the places they represent), relating a covering geometry to a covered geometry. "Every point of b is a point of (the interior or boundary of) a". As defined in DE-9IM.',
        'geoCrosses' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that crosses it: "a crosses b: they have some but not all interior points in common, and the dimension of the intersection is less than that of at least one of them". As defined in DE-9IM.',
        'geoDisjoint' => 'Represents spatial relations in which two geometries (or the places they represent) are topologically disjoint: they have no point in common. They form a set of disconnected geometries." (a symmetric relationship, as defined in DE-9IM)',
        'geoEquals' => 'Represents spatial relations in which two geometries (or the places they represent) are topologically equal, as defined in DE-9IM. "Two geometries are topologically equal if their interiors intersect and no part of the interior or boundary of one geometry intersects the exterior of the other" (a symmetric relationship)',
        'geoIntersects' => 'Represents spatial relations in which two geometries (or the places they represent) have at least one point in common. As defined in DE-9IM.',
        'geoOverlaps' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to another that geospatially overlaps it, i.e. they have some but not all points in common. As defined in DE-9IM.',
        'geoTouches' => 'Represents spatial relations in which two geometries (or the places they represent) touch: they have at least one boundary point in common, but no interior points." (a symmetric relationship, as defined in DE-9IM )',
        'geoWithin' => 'Represents a relationship between two geometries (or the places they represent), relating a geometry to one that contains it, i.e. it is inside (i.e. within) its interior. As defined in DE-9IM.'
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
    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a containing geometry to a contained geometry. "a
     * contains b iff no points of b lie in the exterior of a, and at least one
     * point of the interior of b lies in the interior of a". As defined in
     * DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geoContains;
    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that covers it. As defined in
     * DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geoCoveredBy;
    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a covering geometry to a covered geometry. "Every
     * point of b is a point of (the interior or boundary of) a". As defined in
     * DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geoCovers;
    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that crosses it: "a crosses b:
     * they have some but not all interior points in common, and the dimension of
     * the intersection is less than that of at least one of them". As defined in
     * DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geoCrosses;
    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) are topologically disjoint: they have no point in common. They
     * form a set of disconnected geometries." (a symmetric relationship, as
     * defined in DE-9IM)
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geoDisjoint;

    // Static Protected Properties
    // =========================================================================
    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) are topologically equal, as defined in DE-9IM. "Two geometries
     * are topologically equal if their interiors intersect and no part of the
     * interior or boundary of one geometry intersects the exterior of the other"
     * (a symmetric relationship)
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geoEquals;
    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) have at least one point in common. As defined in DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geoIntersects;
    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to another that geospatially overlaps it,
     * i.e. they have some but not all points in common. As defined in DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geoOverlaps;
    /**
     * Represents spatial relations in which two geometries (or the places they
     * represent) touch: they have at least one boundary point in common, but no
     * interior points." (a symmetric relationship, as defined in DE-9IM )
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geoTouches;
    /**
     * Represents a relationship between two geometries (or the places they
     * represent), relating a geometry to one that contains it, i.e. it is inside
     * (i.e. within) its interior. As defined in DE-9IM.
     *
     * @var mixed|GeospatialGeometry|Place [schema.org types: GeospatialGeometry, Place]
     */
    public $geoWithin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init(): void
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
    public function rules(): array
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['geoContains', 'geoCoveredBy', 'geoCovers', 'geoCrosses', 'geoDisjoint', 'geoEquals', 'geoIntersects', 'geoOverlaps', 'geoTouches', 'geoWithin'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
