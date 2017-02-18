<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Service;

/**
 * BroadcastService - A delivery service through which content is provided via
 * broadcast over the air or online.
 * Extends: Service
 * @see    http://schema.org/BroadcastService
 */
class BroadcastService extends Service
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'BroadcastService';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/BroadcastService';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A delivery service through which content is provided via broadcast over the air or online.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Service';

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
     * The media network(s) whose content is broadcast on this station.
     * @var Organization [schema.org types: Organization]
     */
    public $broadcastAffiliateOf;

    /**
     * The name displayed in the channel guide. For many US affiliates, it is the
     * network name.
     * @var string [schema.org types: Text]
     */
    public $broadcastDisplayName;

    /**
     * The timezone in ISO 8601 format for which the service bases its broadcasts
     * @var string [schema.org types: Text]
     */
    public $broadcastTimezone;

    /**
     * The organization owning or operating the broadcast service.
     * @var Organization [schema.org types: Organization]
     */
    public $broadcaster;

    /**
     * A broadcast service to which the broadcast service may belong to such as
     * regional variations of a national channel.
     * @var BroadcastService [schema.org types: BroadcastService]
     */
    public $parentService;

    /**
     * The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD,
     * etc.).
     * @var string [schema.org types: Text]
     */
    public $videoFormat;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'broadcastAffiliateOf',
                'broadcastDisplayName',
                'broadcastTimezone',
                'broadcaster',
                'parentService',
                'videoFormat',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'broadcastAffiliateOf' => ['Organization'],
                'broadcastDisplayName' => ['Text'],
                'broadcastTimezone' => ['Text'],
                'broadcaster' => ['Organization'],
                'parentService' => ['BroadcastService'],
                'videoFormat' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'broadcastAffiliateOf' => 'The media network(s) whose content is broadcast on this station.',
                'broadcastDisplayName' => 'The name displayed in the channel guide. For many US affiliates, it is the network name.',
                'broadcastTimezone' => 'The timezone in ISO 8601 format for which the service bases its broadcasts',
                'broadcaster' => 'The organization owning or operating the broadcast service.',
                'parentService' => 'A broadcast service to which the broadcast service may belong to such as regional variations of a national channel.',
                'videoFormat' => 'The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD, etc.).',
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
                [['broadcastAffiliateOf','broadcastDisplayName','broadcastTimezone','broadcaster','parentService','videoFormat',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class BroadcastService*/
