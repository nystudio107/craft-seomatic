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

use nystudio107\seomatic\models\jsonld\Reservation;

/**
 * FlightReservation - A reservation for air travel. Note: This type is for
 * information about actual reservations, e.g. in confirmation emails or HTML
 * pages with individual confirmations of reservations. For offers of tickets,
 * use Offer.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/FlightReservation
 */
class FlightReservation extends Reservation
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'FlightReservation';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/FlightReservation';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A reservation for air travel. Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations. For offers of tickets, use Offer.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Reservation';

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
     * The airline-specific indicator of boarding order / preference.
     *
     * @var string [schema.org types: Text]
     */
    public $boardingGroup;

    /**
     * The priority status assigned to a passenger for security or boarding (e.g.
     * FastTrack or Priority).
     *
     * @var mixed|QualitativeValue|string [schema.org types: QualitativeValue, Text]
     */
    public $passengerPriorityStatus;

    /**
     * The passenger's sequence number as assigned by the airline.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $passengerSequenceNumber;

    /**
     * The type of security screening the passenger is subject to.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $securityScreening;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'boardingGroup',
        'passengerPriorityStatus',
        'passengerSequenceNumber',
        'securityScreening'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'boardingGroup' => ['Text'],
        'passengerPriorityStatus' => ['QualitativeValue','Text'],
        'passengerSequenceNumber' => ['Text'],
        'securityScreening' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'boardingGroup' => 'The airline-specific indicator of boarding order / preference.',
        'passengerPriorityStatus' => 'The priority status assigned to a passenger for security or boarding (e.g. FastTrack or Priority).',
        'passengerSequenceNumber' => 'The passenger\'s sequence number as assigned by the airline.',
        'securityScreening' => 'The type of security screening the passenger is subject to.'
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
            [['boardingGroup','passengerPriorityStatus','passengerSequenceNumber','securityScreening'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
