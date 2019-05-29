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

use nystudio107\seomatic\models\jsonld\AnatomicalStructure;

/**
 * Muscle - A muscle is an anatomical structure consisting of a contractile
 * form of tissue that animals use to effect movement.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/Muscle
 */
class Muscle extends AnatomicalStructure
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'Muscle';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/Muscle';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A muscle is an anatomical structure consisting of a contractile form of tissue that animals use to effect movement.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'AnatomicalStructure';

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
     * Obsolete term for muscleAction. Not to be confused with potentialAction.
     *
     * @var string [schema.org types: Text]
     */
    public $action;

    /**
     * The muscle whose action counteracts the specified muscle.
     *
     * @var Muscle [schema.org types: Muscle]
     */
    public $antagonist;

    /**
     * The blood vessel that carries blood from the heart to the muscle.
     *
     * @var Vessel [schema.org types: Vessel]
     */
    public $bloodSupply;

    /**
     * The place of attachment of a muscle, or what the muscle moves.
     *
     * @var AnatomicalStructure [schema.org types: AnatomicalStructure]
     */
    public $insertion;

    /**
     * The movement the muscle generates.
     *
     * @var string [schema.org types: Text]
     */
    public $muscleAction;

    /**
     * The underlying innervation associated with the muscle.
     *
     * @var Nerve [schema.org types: Nerve]
     */
    public $nerve;

    /**
     * The place or point where a muscle arises.
     *
     * @var AnatomicalStructure [schema.org types: AnatomicalStructure]
     */
    public $origin;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'action',
        'antagonist',
        'bloodSupply',
        'insertion',
        'muscleAction',
        'nerve',
        'origin'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'action' => ['Text'],
        'antagonist' => ['Muscle'],
        'bloodSupply' => ['Vessel'],
        'insertion' => ['AnatomicalStructure'],
        'muscleAction' => ['Text'],
        'nerve' => ['Nerve'],
        'origin' => ['AnatomicalStructure']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'action' => 'Obsolete term for muscleAction. Not to be confused with potentialAction.',
        'antagonist' => 'The muscle whose action counteracts the specified muscle.',
        'bloodSupply' => 'The blood vessel that carries blood from the heart to the muscle.',
        'insertion' => 'The place of attachment of a muscle, or what the muscle moves.',
        'muscleAction' => 'The movement the muscle generates.',
        'nerve' => 'The underlying innervation associated with the muscle.',
        'origin' => 'The place or point where a muscle arises.'
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
            [['action','antagonist','bloodSupply','insertion','muscleAction','nerve','origin'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
