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

use nystudio107\seomatic\models\jsonld\RadioChannel;

/**
 * AMRadioChannel - A radio channel that uses AM.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/AMRadioChannel
 */
class AMRadioChannel extends RadioChannel
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'AMRadioChannel';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/AMRadioChannel';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A radio channel that uses AM.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'RadioChannel';

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
     * The unique address by which the BroadcastService can be identified in a
     * provider lineup. In US, this is typically a number.
     *
     * @var string [schema.org types: Text]
     */
    public $broadcastChannelId;

    /**
     * The frequency used for over-the-air broadcasts. Numeric values or simple
     * ranges e.g. 87-99. In addition a shortcut idiom is supported for frequences
     * of AM and FM radio channels, e.g. "87 FM".
     *
     * @var mixed|BroadcastFrequencySpecification|string [schema.org types: BroadcastFrequencySpecification, Text]
     */
    public $broadcastFrequency;

    /**
     * The type of service required to have access to the channel (e.g. Standard
     * or Premium).
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $broadcastServiceTier;

    /**
     * Genre of the creative work, broadcast channel or group.
     *
     * @var mixed|string|string [schema.org types: Text, URL]
     */
    public $genre;

    /**
     * The CableOrSatelliteService offering the channel.
     *
     * @var mixed|CableOrSatelliteService [schema.org types: CableOrSatelliteService]
     */
    public $inBroadcastLineup;

    /**
     * The BroadcastService offered on this channel. Inverse property:
     * hasBroadcastChannel.
     *
     * @var mixed|BroadcastService [schema.org types: BroadcastService]
     */
    public $providesBroadcastService;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'broadcastChannelId',
        'broadcastFrequency',
        'broadcastServiceTier',
        'genre',
        'inBroadcastLineup',
        'providesBroadcastService'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'broadcastChannelId' => ['Text'],
        'broadcastFrequency' => ['BroadcastFrequencySpecification','Text'],
        'broadcastServiceTier' => ['Text'],
        'genre' => ['Text','URL'],
        'inBroadcastLineup' => ['CableOrSatelliteService'],
        'providesBroadcastService' => ['BroadcastService']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'broadcastChannelId' => 'The unique address by which the BroadcastService can be identified in a provider lineup. In US, this is typically a number.',
        'broadcastFrequency' => 'The frequency used for over-the-air broadcasts. Numeric values or simple ranges e.g. 87-99. In addition a shortcut idiom is supported for frequences of AM and FM radio channels, e.g. "87 FM".',
        'broadcastServiceTier' => 'The type of service required to have access to the channel (e.g. Standard or Premium).',
        'genre' => 'Genre of the creative work, broadcast channel or group.',
        'inBroadcastLineup' => 'The CableOrSatelliteService offering the channel.',
        'providesBroadcastService' => 'The BroadcastService offered on this channel. Inverse property: hasBroadcastChannel.'
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
            [['broadcastChannelId','broadcastFrequency','broadcastServiceTier','genre','inBroadcastLineup','providesBroadcastService'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
