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

use nystudio107\seomatic\models\jsonld\ListItem;

/**
 * HowToDirection - A direction indicating a single action to do in the
 * instructions for how to achieve a result.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/HowToDirection
 */
class HowToDirection extends ListItem
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'HowToDirection';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/HowToDirection';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A direction indicating a single action to do in the instructions for how to achieve a result.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'ListItem';

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
     * A media object representing the circumstances after performing this
     * direction.
     *
     * @var MediaObject [schema.org types: MediaObject]
     */
    public $afterMedia;

    /**
     * A media object representing the circumstances before performing this
     * direction.
     *
     * @var MediaObject [schema.org types: MediaObject]
     */
    public $beforeMedia;

    /**
     * A media object representing the circumstances while performing this
     * direction.
     *
     * @var MediaObject [schema.org types: MediaObject]
     */
    public $duringMedia;

    /**
     * The length of time it takes to perform instructions or a direction (not
     * including time to prepare the supplies), in ISO 8601 duration format.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $performTime;

    /**
     * The length of time it takes to prepare the items to be used in instructions
     * or a direction, in ISO 8601 duration format.
     *
     * @var Duration [schema.org types: Duration]
     */
    public $prepTime;

    /**
     * A sub-property of instrument. A supply consumed when performing
     * instructions or a direction.
     *
     * @var mixed|HowToSupply|string [schema.org types: HowToSupply, Text]
     */
    public $supply;

    /**
     * A sub property of instrument. An object used (but not consumed) when
     * performing instructions or a direction.
     *
     * @var mixed|HowToTool|string [schema.org types: HowToTool, Text]
     */
    public $tool;

    /**
     * The total time required to perform instructions or a direction (including
     * time to prepare the supplies), in ISO 8601 duration format.
     *
     * @var mixed|Duration [schema.org types: Duration]
     */
    public $totalTime;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'afterMedia',
        'beforeMedia',
        'duringMedia',
        'performTime',
        'prepTime',
        'supply',
        'tool',
        'totalTime'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'afterMedia' => ['MediaObject'],
        'beforeMedia' => ['MediaObject'],
        'duringMedia' => ['MediaObject'],
        'performTime' => ['Duration'],
        'prepTime' => ['Duration'],
        'supply' => ['HowToSupply','Text'],
        'tool' => ['HowToTool','Text'],
        'totalTime' => ['Duration']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'afterMedia' => 'A media object representing the circumstances after performing this direction.',
        'beforeMedia' => 'A media object representing the circumstances before performing this direction.',
        'duringMedia' => 'A media object representing the circumstances while performing this direction.',
        'performTime' => 'The length of time it takes to perform instructions or a direction (not including time to prepare the supplies), in ISO 8601 duration format.',
        'prepTime' => 'The length of time it takes to prepare the items to be used in instructions or a direction, in ISO 8601 duration format.',
        'supply' => 'A sub-property of instrument. A supply consumed when performing instructions or a direction.',
        'tool' => 'A sub property of instrument. An object used (but not consumed) when performing instructions or a direction.',
        'totalTime' => 'The total time required to perform instructions or a direction (including time to prepare the supplies), in ISO 8601 duration format.'
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
            [['afterMedia','beforeMedia','duringMedia','performTime','prepTime','supply','tool','totalTime'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
