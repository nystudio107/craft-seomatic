<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\PublicationEvent;

/**
 * BroadcastEvent - An over the air or online broadcast event.
 * Extends: PublicationEvent
 * @see    http://schema.org/BroadcastEvent
 */
class BroadcastEvent extends PublicationEvent
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'BroadcastEvent';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/BroadcastEvent';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'An over the air or online broadcast event.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'PublicationEvent';

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
     * The event being broadcast such as a sporting event or awards ceremony.
     * @var Event [schema.org types: Event]
     */
    public $broadcastOfEvent;

    /**
     * True is the broadcast is of a live event.
     * @var bool [schema.org types: Boolean]
     */
    public $isLiveBroadcast;

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
                'broadcastOfEvent',
                'isLiveBroadcast',
                'videoFormat',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'broadcastOfEvent' => ['Event'],
                'isLiveBroadcast' => ['Boolean'],
                'videoFormat' => ['Text'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'broadcastOfEvent' => 'The event being broadcast such as a sporting event or awards ceremony.',
                'isLiveBroadcast' => 'True is the broadcast is of a live event.',
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
                [['broadcastOfEvent','isLiveBroadcast','videoFormat',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class BroadcastEvent*/
