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

use nystudio107\seomatic\models\jsonld\AssessAction;

/**
 * IgnoreAction - The act of intentionally disregarding the object. An agent
 * ignores an object.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/IgnoreAction
 */
class IgnoreAction extends AssessAction
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'IgnoreAction';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/IgnoreAction';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The act of intentionally disregarding the object. An agent ignores an object.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'AssessAction';

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
     * Indicates the current disposition of the Action.
     *
     * @var ActionStatusType [schema.org types: ActionStatusType]
     */
    public $actionStatus;

    /**
     * The direct performer or driver of the action (animate or inanimate). e.g.
     * John wrote a book.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $agent;

    /**
     * The endTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to end. For
     * actions that span a period of time, when the action was performed. e.g.
     * John wrote a book from January to December. Note that Event uses
     * startDate/endDate instead of startTime/endTime, even when describing dates
     * with times. This situation may be clarified in future revisions.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $endTime;

    /**
     * For failed actions, more information on the cause of the failure.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $error;

    /**
     * The object that helped the agent perform the action. e.g. John wrote a book
     * with a pen.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $instrument;

    /**
     * The location of for example where the event is happening, an organization
     * is located, or where an action takes place.
     *
     * @var mixed|Place|PostalAddress|string [schema.org types: Place, PostalAddress, Text]
     */
    public $location;

    /**
     * The object upon which the action is carried out, whose state is kept intact
     * or changed. Also known as the semantic roles patient, affected or undergoer
     * (which change their state) or theme (which doesn't). e.g. John read a book.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $object;

    /**
     * Other co-agents that participated in the action indirectly. e.g. John wrote
     * a book with Steve.
     *
     * @var mixed|Organization|Person [schema.org types: Organization, Person]
     */
    public $participant;

    /**
     * The result produced in the action. e.g. John wrote a book.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $result;

    /**
     * The startTime of something. For a reserved event or service (e.g.
     * FoodEstablishmentReservation), the time that it is expected to start. For
     * actions that span a period of time, when the action was performed. e.g.
     * John wrote a book from January to December. Note that Event uses
     * startDate/endDate instead of startTime/endTime, even when describing dates
     * with times. This situation may be clarified in future revisions.
     *
     * @var mixed|DateTime [schema.org types: DateTime]
     */
    public $startTime;

    /**
     * Indicates a target EntryPoint for an Action.
     *
     * @var mixed|EntryPoint [schema.org types: EntryPoint]
     */
    public $target;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'actionStatus',
        'agent',
        'endTime',
        'error',
        'instrument',
        'location',
        'object',
        'participant',
        'result',
        'startTime',
        'target'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'actionStatus' => ['ActionStatusType'],
        'agent' => ['Organization','Person'],
        'endTime' => ['DateTime'],
        'error' => ['Thing'],
        'instrument' => ['Thing'],
        'location' => ['Place','PostalAddress','Text'],
        'object' => ['Thing'],
        'participant' => ['Organization','Person'],
        'result' => ['Thing'],
        'startTime' => ['DateTime'],
        'target' => ['EntryPoint']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'actionStatus' => 'Indicates the current disposition of the Action.',
        'agent' => 'The direct performer or driver of the action (animate or inanimate). e.g. John wrote a book.',
        'endTime' => 'The endTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to end. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to December. Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.',
        'error' => 'For failed actions, more information on the cause of the failure.',
        'instrument' => 'The object that helped the agent perform the action. e.g. John wrote a book with a pen.',
        'location' => 'The location of for example where the event is happening, an organization is located, or where an action takes place.',
        'object' => 'The object upon which the action is carried out, whose state is kept intact or changed. Also known as the semantic roles patient, affected or undergoer (which change their state) or theme (which doesn\'t). e.g. John read a book.',
        'participant' => 'Other co-agents that participated in the action indirectly. e.g. John wrote a book with Steve.',
        'result' => 'The result produced in the action. e.g. John wrote a book.',
        'startTime' => 'The startTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to start. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to December. Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.',
        'target' => 'Indicates a target EntryPoint for an Action.'
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
            [['actionStatus','agent','endTime','error','instrument','location','object','participant','result','startTime','target'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
