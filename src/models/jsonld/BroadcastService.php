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

use nystudio107\seomatic\models\jsonld\Service;

/**
 * BroadcastService - A delivery service through which content is provided via
 * broadcast over the air or online.
 *
 * @author    nystudio107
 * @package   Seomatic
 * @since     3.0.0
 * @see       http://schema.org/BroadcastService
 */
class BroadcastService extends Service
{
    // Static Public Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'BroadcastService';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/BroadcastService';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A delivery service through which content is provided via broadcast over the air or online.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'Service';

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
     * The media network(s) whose content is broadcast on this station.
     *
     * @var Organization [schema.org types: Organization]
     */
    public $broadcastAffiliateOf;

    /**
     * The name displayed in the channel guide. For many US affiliates, it is the
     * network name.
     *
     * @var string [schema.org types: Text]
     */
    public $broadcastDisplayName;

    /**
     * The frequency used for over-the-air broadcasts. Numeric values or simple
     * ranges e.g. 87-99. In addition a shortcut idiom is supported for frequences
     * of AM and FM radio channels, e.g. "87 FM".
     *
     * @var mixed|BroadcastFrequencySpecification|string [schema.org types: BroadcastFrequencySpecification, Text]
     */
    public $broadcastFrequency;

    /**
     * The timezone in ISO 8601 format for which the service bases its broadcasts
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $broadcastTimezone;

    /**
     * The organization owning or operating the broadcast service.
     *
     * @var mixed|Organization [schema.org types: Organization]
     */
    public $broadcaster;

    /**
     * A broadcast channel of a broadcast service. Inverse property:
     * providesBroadcastService.
     *
     * @var mixed|BroadcastChannel [schema.org types: BroadcastChannel]
     */
    public $hasBroadcastChannel;

    /**
     * A broadcast service to which the broadcast service may belong to such as
     * regional variations of a national channel.
     *
     * @var mixed|BroadcastService [schema.org types: BroadcastService]
     */
    public $parentService;

    /**
     * The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD,
     * etc.).
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $videoFormat;

    // Static Protected Properties
    // =========================================================================

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static protected $_schemaPropertyNames = [
        'broadcastAffiliateOf',
        'broadcastDisplayName',
        'broadcastFrequency',
        'broadcastTimezone',
        'broadcaster',
        'hasBroadcastChannel',
        'parentService',
        'videoFormat'
    ];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static protected $_schemaPropertyExpectedTypes = [
        'broadcastAffiliateOf' => ['Organization'],
        'broadcastDisplayName' => ['Text'],
        'broadcastFrequency' => ['BroadcastFrequencySpecification','Text'],
        'broadcastTimezone' => ['Text'],
        'broadcaster' => ['Organization'],
        'hasBroadcastChannel' => ['BroadcastChannel'],
        'parentService' => ['BroadcastService'],
        'videoFormat' => ['Text']
    ];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static protected $_schemaPropertyDescriptions = [
        'broadcastAffiliateOf' => 'The media network(s) whose content is broadcast on this station.',
        'broadcastDisplayName' => 'The name displayed in the channel guide. For many US affiliates, it is the network name.',
        'broadcastFrequency' => 'The frequency used for over-the-air broadcasts. Numeric values or simple ranges e.g. 87-99. In addition a shortcut idiom is supported for frequences of AM and FM radio channels, e.g. "87 FM".',
        'broadcastTimezone' => 'The timezone in ISO 8601 format for which the service bases its broadcasts',
        'broadcaster' => 'The organization owning or operating the broadcast service.',
        'hasBroadcastChannel' => 'A broadcast channel of a broadcast service. Inverse property: providesBroadcastService.',
        'parentService' => 'A broadcast service to which the broadcast service may belong to such as regional variations of a national channel.',
        'videoFormat' => 'The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD, etc.).'
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
            [['broadcastAffiliateOf','broadcastDisplayName','broadcastFrequency','broadcastTimezone','broadcaster','hasBroadcastChannel','parentService','videoFormat'], 'validateJsonSchema'],
            [self::$_googleRequiredSchema, 'required', 'on' => ['google'], 'message' => 'This property is required by Google.'],
            [self::$_googleRecommendedSchema, 'required', 'on' => ['google'], 'message' => 'This property is recommended by Google.']
        ]);

        return $rules;
    }
}
