<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\MediaObject;

/**
 * VideoObject - A video file.
 *
 * Extends: MediaObject
 * @see    http://schema.org/VideoObject
 */
class VideoObject extends MediaObject
{
    // Static Properties
    // =========================================================================

    /**
     * The Schema.org Type Name
     *
     * @var string
     */
    static public $schemaTypeName = 'VideoObject';

    /**
     * The Schema.org Type Scope
     *
     * @var string
     */
    static public $schemaTypeScope = 'https://schema.org/VideoObject';

    /**
     * The Schema.org Type Description
     *
     * @var string
     */
    static public $schemaTypeDescription = 'A video file.';

    /**
     * The Schema.org Type Extends
     *
     * @var string
     */
    static public $schemaTypeExtends = 'MediaObject';

    /**
     * The Schema.org Property Names
     *
     * @var array
     */
    static public $schemaPropertyNames = [];

    /**
     * The Schema.org Property Expected Types
     *
     * @var array
     */
    static public $schemaPropertyExpectedTypes = [];

    /**
     * The Schema.org Property Descriptions
     *
     * @var array
     */
    static public $schemaPropertyDescriptions = [];

    /**
     * The Schema.org Google Required Schema for this type
     *
     * @var array
     */
    static public $googleRequiredSchema = [];

    /**
     * The Schema.org Google Recommended Schema for this type
     *
     * @var array
     */
    static public $googleRecommendedSchema = [];

    // Public Properties
    // =========================================================================

    /**
     * An actor, e.g. in tv, radio, movie, video games etc., or in an event.
     * Actors can be associated with individual items or with a series, episode,
     * clip. Supersedes actors.
     *
     * @var Person [schema.org types: Person]
     */
    public $actor;

    /**
     * The caption for this object.
     *
     * @var string [schema.org types: Text]
     */
    public $caption;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     *
     * @var Person [schema.org types: Person]
     */
    public $director;

    /**
     * The composer of the soundtrack.
     *
     * @var mixed|MusicGroup|Person [schema.org types: MusicGroup, Person]
     */
    public $musicBy;

    /**
     * Thumbnail image for an image or video.
     *
     * @var mixed|ImageObject [schema.org types: ImageObject]
     */
    public $thumbnail;

    /**
     * If this MediaObject is an AudioObject or VideoObject, the transcript of
     * that object.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $transcript;

    /**
     * The frame size of the video.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $videoFrameSize;

    /**
     * The quality of the video.
     *
     * @var mixed|string [schema.org types: Text]
     */
    public $videoQuality;

    // Public Methods
    // =========================================================================

    /**
    * @inheritdoc
    */
    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames, [
            'actor',
            'caption',
            'director',
            'musicBy',
            'thumbnail',
            'transcript',
            'videoFrameSize',
            'videoQuality',
        ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes, [
            'actor' => ['Person'],
            'caption' => ['Text'],
            'director' => ['Person'],
            'musicBy' => ['MusicGroup','Person'],
            'thumbnail' => ['ImageObject'],
            'transcript' => ['Text'],
            'videoFrameSize' => ['Text'],
            'videoQuality' => ['Text'],
        ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions, [
            'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
            'caption' => 'The caption for this object.',
            'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
            'musicBy' => 'The composer of the soundtrack.',
            'thumbnail' => 'Thumbnail image for an image or video.',
            'transcript' => 'If this MediaObject is an AudioObject or VideoObject, the transcript of that object.',
            'videoFrameSize' => 'The frame size of the video.',
            'videoQuality' => 'The quality of the video.',
        ]);

        self::$googleRequiredSchema = array_merge(parent::$googleRequiredSchema, [
        ]);

        self::$googleRecommendedSchema = array_merge(parent::$googleRecommendedSchema, [
        ]);
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge($rules, [
            [['actor','caption','director','musicBy','thumbnail','transcript','videoFrameSize','videoQuality',], 'validateJsonSchema'],
        ]);

        return $rules;
    }
}
