<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\SportsOrganization;

/**
 * SportsTeam - Organization: Sports team.
 * Extends: SportsOrganization
 * @see    http://schema.org/SportsTeam
 */
class SportsTeam extends SportsOrganization
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'SportsTeam';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/SportsTeam';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'Organization: Sports team.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'SportsOrganization';

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
     * A person that acts as performing member of a sports team; a player as
     * opposed to a coach.
     * @var Person [schema.org types: Person]
     */
    public $athlete;

    /**
     * A person that acts in a coaching role for a sports team.
     * @var Person [schema.org types: Person]
     */
    public $coach;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'athlete',
                'coach',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'athlete' => ['Person'],
                'coach' => ['Person'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'athlete' => 'A person that acts as performing member of a sports team; a player as opposed to a coach.',
                'coach' => 'A person that acts in a coaching role for a sports team.',
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
                [['athlete','coach',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class SportsTeam*/
