<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\MediaObject;

/**
 * VideoObject - A video file.
 * Extends: MediaObject
 * @see    http://schema.org/VideoObject
 */
class VideoObject extends MediaObject
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'VideoObject';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/VideoObject';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A video file.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'MediaObject';

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
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip. Supersedes actors.
     * @var Person [schema.org types: Person]
     */
    public $actor;

    /**
     * The caption for this object.
     * @var string [schema.org types: Text]
     */
    public $caption;

    /**
     * Thumbnail image for an image or video.
     * @var ImageObject [schema.org types: ImageObject]
     */
    public $thumbnail;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'actor',
                'caption',
                'thumbnail',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'actor' => ['Person'],
                'caption' => ['Text'],
                'thumbnail' => ['ImageObject'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
                'caption' => 'The caption for this object.',
                'thumbnail' => 'Thumbnail image for an image or video.',
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
                [['actor','caption','thumbnail',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class VideoObject*/
