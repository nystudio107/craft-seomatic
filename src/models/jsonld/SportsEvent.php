<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Event;

/**
 * SportsEvent - Event type: Sports event.
 * Extends: Event
 * @see    http://schema.org/SportsEvent
 */
class SportsEvent extends Event
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'SportsEvent';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/SportsEvent';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Event type: Sports event.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Event';

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
     * The away team in a sports event.
     * @var mixed Person, SportsTeam [schema.org types: Person, SportsTeam]
     */
    public $awayTeam;

    /**
     * A competitor in a sports event.
     * @var mixed Person, SportsTeam [schema.org types: Person, SportsTeam]
     */
    public $competitor;

    /**
     * The home team in a sports event.
     * @var mixed Person, SportsTeam [schema.org types: Person, SportsTeam]
     */
    public $homeTeam;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'awayTeam',
                'competitor',
                'homeTeam',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'awayTeam' => ['Person','SportsTeam'],
                'competitor' => ['Person','SportsTeam'],
                'homeTeam' => ['Person','SportsTeam'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'awayTeam' => 'The away team in a sports event.',
                'competitor' => 'A competitor in a sports event.',
                'homeTeam' => 'The home team in a sports event.',
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
                [['awayTeam','competitor','homeTeam',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class SportsEvent*/
