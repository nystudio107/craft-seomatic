<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Event;

/**
 * ScreeningEvent - A screening of a movie or other video.
 * Extends: Event
 * @see    http://schema.org/ScreeningEvent
 */
class ScreeningEvent extends Event
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'ScreeningEvent';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/ScreeningEvent';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A screening of a movie or other video.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Event';

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
     * Languages in which subtitles/captions are available, in IETF BCP 47
     * standard format.
     * @var mixed Language, string [schema.org types: Language, Text]
     */
    public $subtitleLanguage;

    /**
     * The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD,
     * etc.).
     * @var mixed string [schema.org types: Text]
     */
    public $videoFormat;

    /**
     * The movie presented during this event.
     * @var mixed Movie [schema.org types: Movie]
     */
    public $workPresented;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'subtitleLanguage',
                'videoFormat',
                'workPresented',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'subtitleLanguage' => ['Language','Text'],
                'videoFormat' => ['Text'],
                'workPresented' => ['Movie'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'subtitleLanguage' => 'Languages in which subtitles/captions are available, in IETF BCP 47 standard format.',
                'videoFormat' => 'The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD, etc.).',
                'workPresented' => 'The movie presented during this event.',
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
                [['subtitleLanguage','videoFormat','workPresented',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class ScreeningEvent*/
