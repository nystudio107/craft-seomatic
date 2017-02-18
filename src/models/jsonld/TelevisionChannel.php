<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\BroadcastChannel;

/**
 * TelevisionChannel - A unique instance of a television BroadcastService on a
 * CableOrSatelliteService lineup.
 * Extends: BroadcastChannel
 * @see    http://schema.org/TelevisionChannel
 */
class TelevisionChannel extends BroadcastChannel
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'TelevisionChannel';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/TelevisionChannel';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A unique instance of a television BroadcastService on a CableOrSatelliteService lineup.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'BroadcastChannel';

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
     * The unique address by which the BroadcastService can be identified in a
     * provider lineup. In US, this is typically a number.
     * @var string [schema.org types: Text]
     */
    public $broadcastChannelId;

    /**
     * The type of service required to have access to the channel (e.g. Standard
     * or Premium).
     * @var string [schema.org types: Text]
     */
    public $broadcastServiceTier;

    /**
     * The CableOrSatelliteService offering the channel.
     * @var CableOrSatelliteService [schema.org types: CableOrSatelliteService]
     */
    public $inBroadcastLineup;

    /**
     * The BroadcastService offered on this channel.
     * @var BroadcastService [schema.org types: BroadcastService]
     */
    public $providesBroadcastService;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'broadcastChannelId',
                'broadcastServiceTier',
                'inBroadcastLineup',
                'providesBroadcastService',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'broadcastChannelId' => ['Text'],
                'broadcastServiceTier' => ['Text'],
                'inBroadcastLineup' => ['CableOrSatelliteService'],
                'providesBroadcastService' => ['BroadcastService'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'broadcastChannelId' => 'The unique address by which the BroadcastService can be identified in a provider lineup. In US, this is typically a number.',
                'broadcastServiceTier' => 'The type of service required to have access to the channel (e.g. Standard or Premium).',
                'inBroadcastLineup' => 'The CableOrSatelliteService offering the channel.',
                'providesBroadcastService' => 'The BroadcastService offered on this channel.',
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
                [['broadcastChannelId','broadcastServiceTier','inBroadcastLineup','providesBroadcastService',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class TelevisionChannel*/
