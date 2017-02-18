<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Intangible;

/**
 * TrainTrip - A trip on a commercial train line.
 * Extends: Intangible
 * @see    http://schema.org/TrainTrip
 */
class TrainTrip extends Intangible
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'TrainTrip';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/TrainTrip';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A trip on a commercial train line.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Intangible';

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
     * The platform where the train arrives.
     * @var string [schema.org types: Text]
     */
    public $arrivalPlatform;

    /**
     * The station where the train trip ends.
     * @var TrainStation [schema.org types: TrainStation]
     */
    public $arrivalStation;

    /**
     * The expected arrival time.
     * @var DateTime [schema.org types: DateTime]
     */
    public $arrivalTime;

    /**
     * The platform from which the train departs.
     * @var string [schema.org types: Text]
     */
    public $departurePlatform;

    /**
     * The station from which the train departs.
     * @var TrainStation [schema.org types: TrainStation]
     */
    public $departureStation;

    /**
     * The expected departure time.
     * @var DateTime [schema.org types: DateTime]
     */
    public $departureTime;

    /**
     * The service provider, service operator, or service performer; the goods
     * producer. Another party (a seller) may offer those services or goods on
     * behalf of the provider. A provider may also serve as the seller. Supersedes
     * carrier.
     * @var mixed Organization, Person [schema.org types: Organization, Person]
     */
    public $provider;

    /**
     * The name of the train (e.g. The Orient Express).
     * @var mixed string [schema.org types: Text]
     */
    public $trainName;

    /**
     * The unique identifier for the train.
     * @var mixed string [schema.org types: Text]
     */
    public $trainNumber;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'arrivalPlatform',
                'arrivalStation',
                'arrivalTime',
                'departurePlatform',
                'departureStation',
                'departureTime',
                'provider',
                'trainName',
                'trainNumber',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'arrivalPlatform' => ['Text'],
                'arrivalStation' => ['TrainStation'],
                'arrivalTime' => ['DateTime'],
                'departurePlatform' => ['Text'],
                'departureStation' => ['TrainStation'],
                'departureTime' => ['DateTime'],
                'provider' => ['Organization','Person'],
                'trainName' => ['Text'],
                'trainNumber' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'arrivalPlatform' => 'The platform where the train arrives.',
                'arrivalStation' => 'The station where the train trip ends.',
                'arrivalTime' => 'The expected arrival time.',
                'departurePlatform' => 'The platform from which the train departs.',
                'departureStation' => 'The station from which the train departs.',
                'departureTime' => 'The expected departure time.',
                'provider' => 'The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller. Supersedes carrier.',
                'trainName' => 'The name of the train (e.g. The Orient Express).',
                'trainNumber' => 'The unique identifier for the train.',
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
                [['arrivalPlatform','arrivalStation','arrivalTime','departurePlatform','departureStation','departureTime','provider','trainName','trainNumber',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class TrainTrip*/
