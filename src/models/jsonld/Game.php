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

use nystudio107\seomatic\models\jsonld\CreativeWork;

/**
 * Game - The Game type represents things which are games. These are typically
 * rule-governed recreational activities, e.g. role-playing games in which
 * players assume the role of characters in a fictional setting.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Game
 */
class Game extends CreativeWork
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Game';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Game';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'The Game type represents things which are games. These are typically rule-governed recreational activities, e.g. role-playing games in which players assume the role of characters in a fictional setting.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'CreativeWork';

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
     * A piece of data that represents a particular aspect of a fictional
     * character (skill, power, character points, advantage, disadvantage).
     *
     * @var Thing [schema.org types: Thing]
     */
    public $characterAttribute;

    /**
     * An item is an object within the game world that can be collected by a
     * player or, occasionally, a non-player character.
     *
     * @var Thing [schema.org types: Thing]
     */
    public $gameItem;

    /**
     * Real or fictional location of the game (or part of game).
     *
     * @var mixed|Place|PostalAddress|string [schema.org types: Place, PostalAddress, URL]
     */
    public $gameLocation;

    /**
     * Indicate how many people can play this game (minimum, maximum, or range).
     *
     * @var mixed|QuantitativeValue [schema.org types: QuantitativeValue]
     */
    public $numberOfPlayers;

    /**
     * The task that a player-controlled character, or group of characters may
     * complete in order to gain a reward.
     *
     * @var mixed|Thing [schema.org types: Thing]
     */
    public $quest;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'characterAttribute',
        'gameItem',
        'gameLocation',
        'numberOfPlayers',
        'quest'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'characterAttribute' => ['Thing'],
        'gameItem' => ['Thing'],
        'gameLocation' => ['Place','PostalAddress','URL'],
        'numberOfPlayers' => ['QuantitativeValue'],
        'quest' => ['Thing']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'characterAttribute' => 'A piece of data that represents a particular aspect of a fictional character (skill, power, character points, advantage, disadvantage).',
        'gameItem' => 'An item is an object within the game world that can be collected by a player or, occasionally, a non-player character.',
        'gameLocation' => 'Real or fictional location of the game (or part of game).',
        'numberOfPlayers' => 'Indicate how many people can play this game (minimum, maximum, or range).',
        'quest' => 'The task that a player-controlled character, or group of characters may complete in order to gain a reward.'
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
            [['characterAttribute','gameItem','gameLocation','numberOfPlayers','quest'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
