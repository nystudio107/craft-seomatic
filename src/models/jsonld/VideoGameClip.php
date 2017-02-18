<?php

namespace nystudio107\seomatic\models\jsonld;

use nystudio107\seomatic\models\jsonld\Clip;

/**
 * VideoGameClip - A short segment/part of a video game.
 * Extends: Clip
 * @see    http://schema.org/VideoGameClip
 */
class VideoGameClip extends Clip
{

    // Static
    // =========================================================================

    /**
     * The Schema.org Type Name
     * @var string
     */
    static $schemaTypeName = 'VideoGameClip';

    /**
     * The Schema.org Type Scope
     * @var string
     */
    static $schemaTypeScope = 'https://schema.org/VideoGameClip';

    /**
     * The Schema.org Type Description
     * @var string
     */
    static $schemaTypeDescription = 'A short segment/part of a video game.';

    /**
     * The Schema.org Type Extends
     * @var string
     */
    static $schemaTypeExtends = 'Clip';

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
     * Position of the clip within an ordered group of clips.
     * @var mixed int, string [schema.org types: Integer, Text]
     */
    public $clipNumber;

    /**
     * A director of e.g. tv, radio, movie, video gaming etc. content, or of an
     * event. Directors can be associated with individual items or with a series,
     * episode, clip. Supersedes directors.
     * @var mixed Person [schema.org types: Person]
     */
    public $director;

    /**
     * The composer of the soundtrack.
     * @var mixed MusicGroup, Person [schema.org types: MusicGroup, Person]
     */
    public $musicBy;

    /**
     * The episode to which this clip belongs.
     * @var mixed Episode [schema.org types: Episode]
     */
    public $partOfEpisode;

    /**
     * The season to which this episode belongs.
     * @var mixed CreativeWorkSeason [schema.org types: CreativeWorkSeason]
     */
    public $partOfSeason;

    /**
     * The series to which this episode or season belongs. Supersedes
     * partOfTVSeries.
     * @var mixed CreativeWorkSeries [schema.org types: CreativeWorkSeries]
     */
    public $partOfSeries;

    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
        self::$schemaPropertyNames = array_merge(parent::$schemaPropertyNames,
            [
                'actor',
                'clipNumber',
                'director',
                'musicBy',
                'partOfEpisode',
                'partOfSeason',
                'partOfSeries',
            ]);

        self::$schemaPropertyExpectedTypes = array_merge(parent::$schemaPropertyExpectedTypes,
            [
                'actor' => ['Person'],
                'clipNumber' => ['Integer','Text'],
                'director' => ['Person'],
                'musicBy' => ['MusicGroup','Person'],
                'partOfEpisode' => ['Episode'],
                'partOfSeason' => ['CreativeWorkSeason'],
                'partOfSeries' => ['CreativeWorkSeries'],
            ]);

        self::$schemaPropertyDescriptions = array_merge(parent::$schemaPropertyDescriptions,
            [
                'actor' => 'An actor, e.g. in tv, radio, movie, video games etc., or in an event. Actors can be associated with individual items or with a series, episode, clip. Supersedes actors.',
                'clipNumber' => 'Position of the clip within an ordered group of clips.',
                'director' => 'A director of e.g. tv, radio, movie, video gaming etc. content, or of an event. Directors can be associated with individual items or with a series, episode, clip. Supersedes directors.',
                'musicBy' => 'The composer of the soundtrack.',
                'partOfEpisode' => 'The episode to which this clip belongs.',
                'partOfSeason' => 'The season to which this episode belongs.',
                'partOfSeries' => 'The series to which this episode or season belongs. Supersedes partOfTVSeries.',
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
                [['actor','clipNumber','director','musicBy','partOfEpisode','partOfSeason','partOfSeries',], 'validateJsonSchema'],
            ]);
        return $rules;
    } /* -- rules */

} /* -- class VideoGameClip*/
